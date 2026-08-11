<?php
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];
$queryString = $_SERVER['QUERY_STRING'] ?? '';

// Preserve the old /library/reader.php URL as a redirect into the new reader folder.
if (basename($requestPath) === 'reader.php' && dirname($requestPath) !== '/library/read') {
    $redirectUrl = '/library/read/reader.php' . ($queryString ? '?' . $queryString : '');
    header('Location: ' . $redirectUrl, true, 301);
    exit;
}

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

$bookId = preg_replace('/[^a-zA-Z0-9\-]/', '', $bookId);

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

$bookFolderIndex = $bookId !== '' ? __DIR__ . '/' . $bookId . '/index.php' : '';
if ($bookFolderIndex !== '' && is_file($bookFolderIndex)) {
    $bookFolder = dirname($bookFolderIndex);
    $chapter = '';

    if (isset($_GET['chapter']) && $_GET['chapter'] !== '') {
        $chapter = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['chapter']);
    }

    require $bookFolderIndex;
    exit;
}

$error = '';
$contentHtml = '';

if ($bookId === '') {
    $error = 'No book specified.';
} elseif (!$book) {
    $error = 'Book not found in library catalog.';
} else {
    $localFile = $book['local-file'] ?? '';
    if ($localFile === '') {
        $error = 'This book does not support online reading.';
    } else {
        $localPath = __DIR__ . '/../' . $localFile;
        $rawHtml = false;

        if (is_file($localPath)) {
            $rawHtml = file_get_contents($localPath);
        }

        if ($rawHtml === false) {
            $cdnUrl = 'https://cdn.hestena62.com/library/' . urlencode($localFile);
            $rawHtml = @file_get_contents($cdnUrl);
        }

        if ($rawHtml === false) {
            $error = 'Failed to load book text from storage.';
        } else {
            $cleanedHtml = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $rawHtml);
            $cleanedHtml = preg_replace('/<\/?(!DOCTYPE|html|head|body|meta)[^>]*>/i', '', $cleanedHtml);
            $contentHtml = $cleanedHtml;
        }
    }
}

$pageTitle = $book ? htmlspecialchars($book['title']) . " | Hesten's Learning Library" : "Book Reader | Hesten's Learning";
$pageDescription = $book ? htmlspecialchars($book['description']) : 'Read digital classics online with our accessible reader.';
$pageKeywords = 'ebook, online reader, accessible learning, reading classics';
$pageAuthor = 'Hesten Allison';

include '../../src/header.php';
?>

<link rel="stylesheet" href="/library/library.css">

<main id="main-content" class="library-main reader-main-layout">
    <div class="reader-back-nav">
        <a href="/library/" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Library
        </a>
    </div>

    <?php if (!empty($error)): ?>
        <div class="reader-error-container">
            <i class="fas fa-exclamation-triangle reader-error-icon"></i>
            <h2>Unable to load book</h2>
            <p><?php echo htmlspecialchars($error); ?></p>
            <a href="/library/" class="reader-error-btn">Return to Catalog</a>
        </div>
    <?php else: ?>
        <article class="cdn-book-reader-container animate-reveal">
            <header class="reader-header">
                <span class="reader-meta-badge"><i class="fas fa-book-open"></i> ONLINE PORTAL</span>
                <h1 class="reader-title"><?php echo htmlspecialchars($book['title']); ?></h1>
                <p class="reader-author">by <?php echo htmlspecialchars($book['author']); ?></p>
                <div class="reader-specs-bar">
                    <?php if (!empty($book['grade'])): ?>
                        <span><i class="fas fa-graduation-cap"></i> <?php echo htmlspecialchars($book['grade']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($book['lexile'])): ?>
                        <span><i class="fas fa-brain"></i> Lexile <?php echo htmlspecialchars($book['lexile']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($book['isbn'])): ?>
                        <span><i class="fas fa-barcode"></i> ISBN <?php echo htmlspecialchars($book['isbn']); ?></span>
                    <?php endif; ?>
                </div>
            </header>

            <div id="book-content" class="cdn-book-reader-content">
                <?php echo $contentHtml; ?>
            </div>

            <div class="reader-footer-actions">
                <button onclick="openBookDisclaimer()" class="reader-disclaimer-btn">
                    <i class="fas fa-balance-scale"></i> Show Book Disclaimer & License
                </button>
            </div>
        </article>

        <div id="bookDisclaimerModal" class="library-modal hidden" role="dialog" aria-modal="true">
            <div class="library-modal-backdrop" onclick="closeBookDisclaimer()"></div>
            <div class="library-modal-content" style="max-width: 48rem; padding: 2.5rem; max-height: 80vh; overflow-y: auto;" onclick="event.stopPropagation()">
                <button onclick="closeBookDisclaimer()" class="library-modal-close-btn" aria-label="Close disclaimer">
                    <i class="fas fa-times"></i>
                </button>
                <h2 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.75rem; margin-bottom: 1.5rem; color: var(--color-primary); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-info-circle"></i> Disclaimer & License
                </h2>
                <div id="book-disclaimer-modal-body" class="book-disclaimer-modal-body"></div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.querySelector('#book-content #pg-header');
            const footer = document.querySelector('#book-content footer, #book-content #pg-footer');
            const modalBody = document.getElementById('book-disclaimer-modal-body');

            if (modalBody) {
                let content = '';

                if (header) {
                    content += '<div class="modal-disclaimer-section"><h3>Book Header & Disclaimer</h3>' + header.innerHTML + '</div>';
                }

                if (header && footer) {
                    content += '<hr style="margin: 2rem 0; border: none; border-top: 1px solid var(--color-border);">';
                }

                if (footer) {
                    content += '<div class="modal-disclaimer-section"><h3>License & Distribution Terms</h3>' + footer.innerHTML + '</div>';
                }

                modalBody.innerHTML = content || '<p style="font-style: italic; color: var(--color-text-secondary);">No Gutenberg headers or license information found in this book.</p>';
            }
        });

        function openBookDisclaimer() {
            const modal = document.getElementById('bookDisclaimerModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.offsetHeight;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeBookDisclaimer() {
            const modal = document.getElementById('bookDisclaimerModal');
            if (modal) {
                modal.classList.remove('active');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }, 400);
            }
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeBookDisclaimer();
            }
        });
        </script>
    <?php endif; ?>
</main>

<?php include '../../src/footer.php'; ?>