<?php
/**
 * library/read/index.php - Unified Digital Reader Controller
 * Resolves book routing, multi-chapter pagination, TOC metadata, single-file documents,
 * study quizzes, and teacher authorization.
 */

// Secure session start for teacher authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- DEV SERVER PROXY FIX ---
// Recovers query string if a local dev proxy stripped it, using a cookie set by JS fallback.
if (empty($_GET) && isset($_COOKIE['dev_fallback_query'])) {
    parse_str($_COOKIE['dev_fallback_query'], $_GET);
    $_SERVER['QUERY_STRING'] = $_COOKIE['dev_fallback_query'];
    setcookie('dev_fallback_query', '', time() - 3600, '/');
}

$requestUri = $_SERVER['REQUEST_URI'] ?? (getenv('REQUEST_URI') ?: '');
$requestPath = explode('?', $requestUri)[0];
$queryString = $_SERVER['QUERY_STRING'] ?? (getenv('QUERY_STRING') ?: '');

// If QUERY_STRING is empty but REQUEST_URI contains a query, extract it
if (empty($queryString) && strpos($requestUri, '?') !== false) {
    $queryString = substr($requestUri, strpos($requestUri, '?') + 1);
}

// Fallback to CLI arguments if executed in CLI mode without QUERY_STRING
if (empty($queryString) && !empty($_SERVER['argv'][1])) {
    $queryString = $_SERVER['argv'][1];
}

// Populate $_GET manually if empty
if (empty($_GET) && !empty($queryString)) {
    parse_str($queryString, $_GET);
}

// Preserve old reader.php URL as a redirect into index.php
if (basename($requestPath) === 'reader.php') {
    $redirectUrl = 'index.php' . ($queryString ? '?' . $queryString : '');
    header('Location: ' . $redirectUrl, true, 301);
    exit;
}

if (!isset($bookId) || $bookId === '') {
    $bookId = '';
    
    if (isset($_GET['book']) && $_GET['book'] !== '') {
        $bookId = trim($_GET['book']);
    } else {
        $decodedQuery = urldecode($queryString);
        $firstParam = explode('&', $decodedQuery)[0];

        if (strpos($firstParam, 'book=') === 0) {
            $bookId = substr($firstParam, 5);
        } elseif (strpos($firstParam, '=') === 0) {
            $bookId = substr($firstParam, 1);
        } elseif ($firstParam !== '' && strpos($firstParam, '=') === false) {
            $bookId = $firstParam;
        }
    }
}

// Fallback: extract book ID from URL folder segment if accessing folder indices directly
if ($bookId === '') {
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $phpSelf = $_SERVER['PHP_SELF'] ?? '';
    if (preg_match('/\/library\/read\/([a-zA-Z0-9\-_]+)(\/|$)/i', $requestPath, $matches)) {
        if ($matches[1] !== 'index.php' && $matches[1] !== 'reader.php') {
            $bookId = $matches[1];
        }
    } elseif (preg_match('/\/library\/read\/([a-zA-Z0-9\-_]+)(\/|$)/i', $scriptName, $matches)) {
        if ($matches[1] !== 'index.php' && $matches[1] !== 'reader.php') {
            $bookId = $matches[1];
        }
    } elseif (preg_match('/\/library\/read\/([a-zA-Z0-9\-_]+)(\/|$)/i', $phpSelf, $matches)) {
        if ($matches[1] !== 'index.php' && $matches[1] !== 'reader.php') {
            $bookId = $matches[1];
        }
    }
}

$rawBookParam = trim($bookId);
// Normalize slug: lowercase and replace non-alphanumerics with single dash
$normalizedSlug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $rawBookParam), '-'));
$bookId = $normalizedSlug;

// Load book data from both main catalog and educational drawer resources
$allBooksList = [];

$bookdJsonPath = __DIR__ . '/../assets/bookd.json';
if (is_file($bookdJsonPath)) {
    $categories = json_decode(file_get_contents($bookdJsonPath), true) ?: [];
    foreach ($categories as $catName => $books) {
        if (is_array($books)) {
            foreach ($books as $b) {
                if (is_array($b)) {
                    $b['category'] = $catName;
                    $allBooksList[] = $b;
                }
            }
        }
    }
}

$drawerJsonPath = __DIR__ . '/../assets/edu-side-drawer.json';
if (is_file($drawerJsonPath)) {
    $drawerCategories = json_decode(file_get_contents($drawerJsonPath), true) ?: [];
    foreach ($drawerCategories as $catName => $books) {
        if (is_array($books)) {
            foreach ($books as $b) {
                if (is_array($b)) {
                    $b['category'] = $catName;
                    $allBooksList[] = $b;
                }
            }
        }
    }
}

$book = null;

// 1. Exact ID match
foreach ($allBooksList as $candidate) {
    if (($candidate['id'] ?? '') === $rawBookParam || ($candidate['id'] ?? '') === $normalizedSlug) {
        $book = $candidate;
        $bookId = $candidate['id'];
        break;
    }
}

// 2. Normalized slug match
if (!$book) {
    foreach ($allBooksList as $candidate) {
        $cSlug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $candidate['id'] ?? ''), '-'));
        if ($cSlug === $normalizedSlug) {
            $book = $candidate;
            $bookId = $candidate['id'];
            break;
        }
    }
}

// 3. Title / Fuzzy match
if (!$book && $rawBookParam !== '') {
    $cleanRaw = strtolower($rawBookParam);
    foreach ($allBooksList as $candidate) {
        $cTitle = strtolower(trim($candidate['title'] ?? ''));
        if ($cTitle === $cleanRaw || stripos($cTitle, $cleanRaw) !== false || stripos($cleanRaw, strtolower($candidate['id'] ?? '')) !== false) {
            $book = $candidate;
            $bookId = $candidate['id'];
            break;
        }
    }
}

// 4. On-disk directory fallback
if (!$book && is_dir(__DIR__ . '/' . $normalizedSlug)) {
    $folderName = $normalizedSlug;
    $prettyTitle = ucwords(str_replace(['-', '_'], ' ', $folderName));
    if ($folderName === 'who-built-america') {
        $prettyTitle = "Who Built America? Working People and the Nation's History";
    }
    $book = [
        'id' => $folderName,
        'title' => $prettyTitle,
        'author' => ($folderName === 'who-built-america' ? 'American Social History Project' : 'Author Unknown'),
        'description' => 'Digital reading collection',
        'hasTeacherResources' => false
    ];
    $bookId = $folderName;
}

$error = '';
$contentHtml = '';
$bookTitle = '';
$bookAuthor = '';
$chapter = 'chapter-1';
$chapterNum = 1;
$totalChapters = 0;
$isTeacherUnlocked = isset($_SESSION['teacher_unlocked']) && $_SESSION['teacher_unlocked'] === true;
$authError = '';
$quizQuestions = [];
$vocabList = [];
$bookToc = [];

if ($bookId === '') {
    $error = 'No book specified. Please select a book from the library catalog.';
} elseif (!$book) {
    $error = 'Book not found in library catalog.';
} else {
    $bookTitle = $book['title'] ?? 'Untitled Book';
    $bookAuthor = $book['author'] ?? 'Unknown Author';
    $hasTeacherResources = !empty($book['hasTeacherResources']);

    // Load Table of Contents metadata if present
    $tocJsonPath = __DIR__ . '/../assets/' . $bookId . '-toc.json';
    if (is_file($tocJsonPath)) {
        $bookToc = json_decode(file_get_contents($tocJsonPath), true) ?: [];
    }

    // Scan for chapters in book folder
    $bookFolder = __DIR__ . '/' . $bookId;
    $chapterFiles = is_dir($bookFolder) ? glob($bookFolder . '/chapter-*.php') : [];
    
    // Sort chapters numerically to get correct count
    natsort($chapterFiles);
    $totalChapters = count($chapterFiles);

    if ($totalChapters > 0) {
        // Resolve active chapter
        $hasIntro = (!empty($book['authorBio']) || !empty($book['introWhy']) || !empty($book['introHow']) || !empty($book['introWhat']));
        
        $chapter = '';
        if (isset($_GET['chapter']) && $_GET['chapter'] !== '') {
            $chapter = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['chapter']);
        } else {
            $chapter = $hasIntro ? 'intro' : 'chapter-1';
        }

        // Detect if this is the Teacher Resources page (after all chapters)
        $isTeacherPage = false;
        if ($hasTeacherResources) {
            if ($chapter === 'teacher-resources' || $chapter === 'teacher' || $chapter === 'resources') {
                $isTeacherPage = true;
            } elseif (preg_match('/^chapter-(\d+)$/', $chapter, $matches)) {
                $requestedChapterNum = intval($matches[1]);
                if ($requestedChapterNum > $totalChapters) {
                    // Redirect legacy chapter requests (e.g. chapter-26) to teacher-resources
                    header('Location: index.php?book=' . urlencode($bookId) . '&chapter=teacher-resources', true, 301);
                    exit;
                }
            }
        }

        if ($isTeacherPage) {
            $chapter = 'teacher-resources';
            $chapterNum = 0; // Does not count as a chapter number
            $chapterFile = $bookFolder . '/teacher-resources.php';
            if (!is_file($chapterFile)) {
                $chapterFile = $bookFolder . '/chapter-' . ($totalChapters + 1) . '.php';
            }
        } elseif ($chapter === 'intro') {
            $chapterNum = 0;
            $chapterFile = '';
        } else {
            if (preg_match('/^chapter-(\d+)$/', $chapter, $matches)) {
                $chapterNum = intval($matches[1]);
            } else {
                $chapter = 'chapter-1';
                $chapterNum = 1;
            }

            // Validate chapter file
            $chapterFile = $bookFolder . '/' . $chapter . '.php';
            if (!is_file($chapterFile)) {
                $chapter = 'chapter-1';
                $chapterNum = 1;
                $chapterFile = $bookFolder . '/chapter-1.php';
            }
        }

        // Handle teacher resources password authorization
        if ($isTeacherPage) {
            $verifyConfigFile = dirname(__DIR__, 2) . '/assets/verify.php';
            $teacherPassword = '8675309';
            if (file_exists($verifyConfigFile)) {
                require_once $verifyConfigFile;
            }

            // Allow relocking / signing out
            if (isset($_GET['lock']) && $_GET['lock'] === '1') {
                unset($_SESSION['teacher_unlocked']);
                $isTeacherUnlocked = false;
                header('Location: index.php?book=' . urlencode($bookId) . '&chapter=teacher-resources');
                exit;
            }

            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['teacher_password'])) {
                $submittedPassword = trim($_POST['teacher_password']);
                $expectedPassword = (string)($teacherPassword ?? ($teacher_password ?? '8675309'));
                if ($submittedPassword === $expectedPassword) {
                    $_SESSION['teacher_unlocked'] = true;
                    $isTeacherUnlocked = true;
                    header('Location: index.php?book=' . urlencode($bookId) . '&chapter=teacher-resources');
                    exit;
                } else {
                    $authError = 'Incorrect password. Access Denied.';
                }
            }
        }

        if ($chapter === 'intro') {
            $contentHtml = '';
        } else {
            // Load content from chapter file
            $chapterHtml = file_get_contents($chapterFile);
            if ($chapterHtml === false) {
                $error = 'Failed to load chapter content.';
            } else {
                // Extract core reader content cleanly without truncation
                $cleaned = preg_replace('/<\?php.*?\?>/is', '', $chapterHtml);
                $cleaned = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $cleaned);
                $cleaned = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $cleaned);
                $cleaned = preg_replace('/<nav\b[^>]*class="[^"]*reader-chapter-nav[^"]*"[^>]*>(.*?)<\/nav>/is', '', $cleaned);
                $cleaned = preg_replace('/<nav\b[^>]*id="reader-controls"[^>]*>(.*?)<\/nav>/is', '', $cleaned);

                if (preg_match('/<main\b[^>]*>(.*?)<\/main>/is', $cleaned, $mainMatch)) {
                    $cleaned = $mainMatch[1];
                }

                if (preg_match('/<div\b[^>]*class="[^"]*cdn-book-reader-content[^"]*"[^>]*>(.*)/is', $cleaned, $cdnMatch)) {
                    $inner = $cdnMatch[1];
                    $lastDivPos = strrpos($inner, '</div>');
                    if ($lastDivPos !== false) {
                        $inner = substr($inner, 0, $lastDivPos);
                    }
                    $cleaned = $inner;
                }

                // Clean empty heading tags and empty anchors
                $cleaned = preg_replace('/<a\b[^>]*>\s*<h[1-6]\b[^>]*>\s*<\/h[1-6]>\s*<\/a>/is', '', $cleaned);
                $cleaned = preg_replace('/<h[1-6]\b[^>]*>\s*<\/h[1-6]>/is', '', $cleaned);

                $contentHtml = trim($cleaned);

                // Auto-inject book credits from credits.json if defined
                $creditsJsonPath = __DIR__ . '/../assets/credits.json';
                if (is_file($creditsJsonPath)) {
                    $creditsData = json_decode(file_get_contents($creditsJsonPath), true);
                    if (is_array($creditsData) && isset($creditsData[$bookId]) && trim($creditsData[$bookId]) !== '') {
                        $rawCredits = $creditsData[$bookId];
                        $escapedCredits = htmlspecialchars($rawCredits, ENT_QUOTES, 'UTF-8');
                        $clickableCredits = preg_replace(
                            '/(https?:\/\/[^\s\)\<\>]+)/i',
                            '<a href="$1" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); text-decoration: underline;">$1</a>',
                            $escapedCredits
                        );
                        $contentHtml .= '<div class="book-credits-container" style="margin-top: 3.5rem; padding-top: 1.5rem; border-top: 1px dashed var(--color-border); font-size: 0.85rem; color: var(--color-text-secondary); line-height: 1.6;">' . 
                                        '<strong>Credits & Primary Sources:</strong> <span class="book-credits-text">' . $clickableCredits . '</span>' .
                                        '</div>';
                    }
                }
            }
        }

        // Load Quiz questions and vocab list from assets directory
        $quizJsonPath = __DIR__ . '/../assets/' . $bookId . '.json';
        if (is_file($quizJsonPath) && !$isTeacherPage) {
            $quizData = json_decode(file_get_contents($quizJsonPath), true);
            if (is_array($quizData)) {
                $quizQuestions = $quizData['chapter-' . $chapterNum] ?? $quizData['default'] ?? [];
                $vocabList = $quizData['vocab-chapter-' . $chapterNum] ?? $quizData['vocab-default'] ?? [];
            }
        }

    } else {
        // Single file document or external HTML
        $localFile = $book['local-file'] ?? '';
        $localPath1 = __DIR__ . '/../' . $localFile;
        $localPath2 = __DIR__ . '/../../' . $localFile;
        $rawHtml = false;

        if ($localFile !== '') {
            if (is_file($localPath1)) {
                $rawHtml = file_get_contents($localPath1);
            } elseif (is_file($localPath2)) {
                $rawHtml = file_get_contents($localPath2);
            }
        }

        if ($rawHtml === false && $localFile !== '') {
            $cdnUrl = 'https://cdn.hestena62.com/library/' . urlencode($localFile);
            $rawHtml = @file_get_contents($cdnUrl);
        }

        // Check if there is an index.php directly in book subfolder
        if ($rawHtml === false && is_dir($bookFolder)) {
            $folderIndex = $bookFolder . '/index.php';
            if (is_file($folderIndex)) {
                $rawHtml = file_get_contents($folderIndex);
            }
        }

        if ($rawHtml === false) {
            $error = 'This book does not support inline browser reading, or content is unavailable.';
        } else {
            // Clean styles and base HTML structures to prevent layout breakage in the reader template
            $cleanedHtml = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $rawHtml);
            $cleanedHtml = preg_replace('/<\/?(!DOCTYPE|html|head|body|meta)[^>]*>/i', '', $cleanedHtml);
            $contentHtml = $cleanedHtml;
        }
    }
}

if ($error !== '') {
    $pageTitle = "Error | Hesten's Learning Digital Reader";
    include __DIR__ . '/../../src/header.php';
    ?>
    <main id="main-content" class="library-main reader-main-layout">
        <!-- Client-side proxy fallback script -->
        <script>
            // If the browser URL has a query string but PHP generated this error, 
            // the dev server proxy likely stripped the query string.
            if (window.location.search.length > 1 && !document.cookie.includes('dev_fallback_query')) {
                document.cookie = "dev_fallback_query=" + encodeURIComponent(window.location.search.substring(1)) + "; path=/; max-age=10";
                window.location.reload();
            }
        </script>
        <div class="reader-back-nav" style="margin-bottom: 2rem;">
            <a href="../index.php" class="reader-back-btn" style="text-decoration: none; padding: 0.65rem 1.5rem; background: var(--color-content-bg); border-radius: 9999px; border: 1px solid var(--color-border); font-weight: 700; color: var(--color-text-default); display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-arrow-left"></i> Return to Catalog
            </a>
        </div>
        <div style="max-width: 520px; margin: 4rem auto; text-align: center; padding: 2.5rem; background: var(--color-content-bg); border-radius: 1.5rem; border: 1px solid var(--color-border); box-shadow: var(--shadow-xl);">
            <div style="width: 4rem; height: 4rem; border-radius: 50%; background: rgba(239, 68, 68, 0.1); color: #ef4444; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto; font-size: 1.75rem;">
                <i class="fas fa-book-dead"></i>
            </div>
            <h2 style="font-size: 1.6rem; font-weight: 900; margin-bottom: 0.75rem; color: var(--color-text-default);">Unable to Load Book</h2>
            <p style="color: var(--color-text-secondary); margin-bottom: 2rem; line-height: 1.6; font-size: 0.95rem;"><?php echo htmlspecialchars($error); ?></p>
            <a href="../index.php" class="controls-nav-btn" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 2rem; border-radius: 9999px; background: var(--color-primary); color: white; font-weight: 800;">
                <i class="fas fa-search"></i> Browse Library Catalog
            </a>
        </div>
    </main>
    <?php
    include __DIR__ . '/../../src/footer.php';
} else {
    // Render unified reader template
    require __DIR__ . '/reader_template.php';
}
