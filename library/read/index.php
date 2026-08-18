<?php
// Secure session start for teacher authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];
$queryString = $_SERVER['QUERY_STRING'] ?? '';

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
        $bookId = $_GET['book'];
    } else {
        $decodedQuery = urldecode($queryString);
        $firstParam = explode('&', $decodedQuery)[0];

        if (strpos($firstParam, '=') === 0) {
            $bookId = substr($firstParam, 1);
        } elseif ($firstParam !== '' && strpos($firstParam, '=') === false) {
            $bookId = $firstParam;
        }
    }
}

// Fallback: extract book ID from URL folder segment if accessing folder indices directly
if ($bookId === '') {
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    if (preg_match('/\/library\/read\/([a-zA-Z0-9\-]+)\//', $requestPath, $matches)) {
        $bookId = $matches[1];
    } elseif (preg_match('/\/library\/read\/([a-zA-Z0-9\-]+)\//', $scriptName, $matches)) {
        $bookId = $matches[1];
    }
}

$bookId = preg_replace('/[^a-zA-Z0-9\-]/', '', $bookId);

// Load book data
$jsonString = file_get_contents(__DIR__ . '/../bookd.json');
$categories = json_decode($jsonString, true);
$book = null;

if (is_array($categories)) {
    foreach ($categories as $books) {
        foreach ($books as $candidate) {
            if (($candidate['id'] ?? '') === $bookId) {
                $book = $candidate;
                break 2;
            }
        }
    }
}

$error = '';
$contentHtml = '';
$bookTitle = '';
$bookAuthor = '';
$chapterNum = 1;
$totalChapters = 0;
$isTeacherUnlocked = isset($_SESSION['teacher_unlocked']) && $_SESSION['teacher_unlocked'] === true;
$authError = '';
$quizQuestions = [];

if ($bookId === '') {
    $error = 'No book specified.';
} elseif (!$book) {
    $error = 'Book not found in library catalog.';
} else {
    $bookTitle = $book['title'] ?? 'Untitled';
    $bookAuthor = $book['author'] ?? 'Unknown Author';

    // Scan for chapters in book folder
    $bookFolder = __DIR__ . '/' . $bookId;
    $chapterFiles = glob($bookFolder . '/chapter-*.php');
    
    // Sort chapters numerically to get correct count
    natsort($chapterFiles);
    $totalChapters = count($chapterFiles);

    if ($totalChapters > 0) {
        // Resolve active chapter
        $chapter = 'chapter-1';
        if (isset($_GET['chapter']) && $_GET['chapter'] !== '') {
            $chapter = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['chapter']);
        }
        
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

        // Handle teacher resources password authorization
        if ($chapterNum === $totalChapters) {
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
        }

        // Load Quiz questions from quiz database
        $quizJsonPath = __DIR__ . '/1984_quiz.json';
        if (is_file($quizJsonPath)) {
            $quizData = json_decode(file_get_contents($quizJsonPath), true);
            if (is_array($quizData)) {
                $quizQuestions = $quizData['chapter-' . $chapterNum] ?? $quizData['default'] ?? [];
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
    include '../../src/header.php';
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
    include '../../src/footer.php';
} else {
    // Render unified template
    require __DIR__ . '/reader_template.php';
}
