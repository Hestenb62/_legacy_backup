<?php
// Secure session start for teacher authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

// Populate $_GET manually if empty (e.g. running under Five Server with CLI php binary)
if (empty($_GET) && !empty($queryString)) {
    parse_str($queryString, $_GET);
}

// Preserve the old reader.php URL as a redirect into the new index.php.
if (basename($requestPath) === 'reader.php') {
    $redirectUrl = '/library/read/index.php' . ($queryString ? '?' . $queryString : '');
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
    $error = 'No book specified.';
} elseif (!$book) {
    $error = 'Book not found in library catalog.';
} else {
    $bookTitle = $book['title'] ?? 'Untitled';
    $bookAuthor = $book['author'] ?? 'Unknown Author';
    $hasTeacherResources = !empty($book['hasTeacherResources']);

    // Load Table of Contents metadata if present
    $tocJsonPath = __DIR__ . '/../assets/' . $bookId . '-toc.json';
    if (is_file($tocJsonPath)) {
        $bookToc = json_decode(file_get_contents($tocJsonPath), true) ?: [];
    }

    // Scan for chapters in book folder
    $bookFolder = __DIR__ . '/' . $bookId;
    $chapterFiles = glob($bookFolder . '/chapter-*.php');
    
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

        if ($chapter === 'intro') {
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

        // Handle teacher resources password authorization only if book has teacher resources enabled
        if ($hasTeacherResources && $chapterNum === $totalChapters) {
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['teacher_password'])) {
                if (trim($_POST['teacher_password']) === '8675309') {
                    $_SESSION['teacher_unlocked'] = true;
                    $isTeacherUnlocked = true;
                    header('Location: /library/read/index.php?book=' . urlencode($bookId) . '&chapter=chapter-' . $totalChapters);
                    exit;
                } else {
                    $authError = 'Incorrect answer. Access Denied.';
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
                // Extract the core reader content inside class "cdn-book-reader-content"
                if (preg_match('/<div class="cdn-book-reader-content">(.*?)<\/div>\s*<nav class="reader-chapter-nav"/is', $chapterHtml, $matches)) {
                    $contentHtml = $matches[1];
                } elseif (preg_match('/<div class="cdn-book-reader-content">(.*?)<\/div>/is', $chapterHtml, $matches)) {
                    $contentHtml = $matches[1];
                } else {
                    // Strip tags if structure unrecognized
                    $contentHtml = $chapterHtml;
                }

                // Auto-inject book credits from credits.json if defined
                $creditsJsonPath = __DIR__ . '/../assets/credits.json';
                if (is_file($creditsJsonPath)) {
                    $creditsData = json_decode(file_get_contents($creditsJsonPath), true);
                    if (is_array($creditsData) && isset($creditsData[$bookId]) && trim($creditsData[$bookId]) !== '') {
                        $contentHtml .= '<div class="book-credits-container" style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px dashed var(--color-border); font-size: 0.85rem; color: var(--color-text-secondary); line-height: 1.5;">' . 
                                        '<strong>Credits & Sources:</strong> <span class="book-credits-text">' . htmlspecialchars($creditsData[$bookId]) . '</span>' .
                                        '</div>';
                    }
                }
            }
        }

        // Load Quiz questions and vocab list from assets directory dynamically based on bookId
        $quizJsonPath = __DIR__ . '/../assets/' . $bookId . '.json';
        if (is_file($quizJsonPath)) {
            $quizData = json_decode(file_get_contents($quizJsonPath), true);
            if (is_array($quizData)) {
                $quizQuestions = $quizData['chapter-' . $chapterNum] ?? $quizData['default'] ?? [];
                $vocabList = $quizData['vocab-chapter-' . $chapterNum] ?? $quizData['vocab-default'] ?? [];
            }
        }

    } else {
        // Single file book
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

        // Check if there is an index.php directly in the book subfolder (e.g., usa-constitution/index.php)
        if ($rawHtml === false) {
            $folderIndex = $bookFolder . '/index.php';
            if (is_file($folderIndex)) {
                $rawHtml = file_get_contents($folderIndex);
            }
        }

        if ($rawHtml === false) {
            $error = 'This book does not support online reading, or content could not be retrieved.';
        } else {
            // Clean styles and base HTML structures to prevent layout breakage in the reader template
            $cleanedHtml = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $rawHtml);
            $cleanedHtml = preg_replace('/<\/?(!DOCTYPE|html|head|body|meta)[^>]*>/i', '', $cleanedHtml);
            $contentHtml = $cleanedHtml;
        }
    }
}

if ($error !== '') {
    $pageTitle = "Error | Hesten's Learning Library";
    include __DIR__ . '/../../src/header.php';
    ?>
    <main id="main-content" class="library-main reader-main-layout">
        <div class="reader-back-nav">
            <a href="/library/" class="reader-back-btn" style="text-decoration: none; padding: 0.75rem 1.5rem; background: var(--color-content-bg); border-radius: 9999px; border: 1px solid var(--color-border); font-weight: 700; color: var(--color-text-default); display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-arrow-left"></i> Return to Catalog
            </a>
        </div>
        <div style="max-width: 500px; margin: 5rem auto; text-align: center; padding: 2rem; background: var(--color-content-bg); border-radius: 1.5rem; border: 1px solid var(--color-border); box-shadow: var(--shadow-lg);">
            <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: #ef4444; margin-bottom: 1.5rem;"></i>
            <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">Unable to load book</h2>
            <p style="color: var(--color-text-secondary); margin-bottom: 1.5rem;"><?php echo htmlspecialchars($error); ?></p>
            <a href="/library/" class="controls-nav-btn" style="text-decoration: none; display: inline-block;">Browse Catalog</a>
        </div>
    </main>
    <?php
    include __DIR__ . '/../../src/footer.php';
} else {
    // Render unified template
    require __DIR__ . '/reader_template.php';
}
