<?php
// --- Redirect to trailing slash URL if needed (optional ref) ---
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];

// --- 1. Get and Sanitize Book Parameter ---
$bookId = '';

$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$parts = explode('?', $requestUri);
$queryString = count($parts) > 1 ? $parts[1] : '';

// 1. Check if 'book' parameter is passed via standard $_GET
if (isset($_GET['book']) && !empty($_GET['book'])) {
    $bookId = $_GET['book'];
} else {
    // 2. Decode the query string to handle URL encoding
    $decodedQuery = urldecode($queryString);
    
    // Split by & to isolate the first parameter
    $firstParam = explode('&', $decodedQuery)[0];
    
    if (strpos($firstParam, '=') === 0) {
        // e.g. ?=frankenstein
        $bookId = substr($firstParam, 1);
    } elseif (!empty($firstParam) && strpos($firstParam, '=') === false) {
        // e.g. ?frankenstein
        $bookId = $firstParam;
    }
}

// Sanitize to alphanumeric + hyphens to prevent path traversal
$bookId = preg_replace('/[^a-zA-Z0-9\-]/', '', $bookId);

$book = null;
$error = '';
$contentHtml = '';

if (empty($bookId)) {
    $error = 'No book specified.';
} else {
    // --- 2. Load bookd.json to find Book Metadata ---
    $jsonString = file_get_contents(__DIR__ . '/bookd.json');
    $categories = json_decode($jsonString, true);
    if ($categories) {
        foreach ($categories as $categoryName => $books) {
            foreach ($books as $b) {
                if (($b['id'] ?? '') === $bookId) {
                    $book = $b;
                    break 2;
                }
            }
        }
    }
    
    if (!$book) {
        $error = 'Book not found in library catalog.';
    } else {
        // --- 3. Determine Local or CDN Path ---
        $localFile = $book['local-file'] ?? '';
        if (empty($localFile)) {
            $error = 'This book does not support online reading.';
        } else {
            $localPath = __DIR__ . '/' . $localFile;
            $rawHtml = false;
            
            // First check local file
            if (file_exists($localPath)) {
                $rawHtml = file_get_contents($localPath);
            }
            
            // Fall back to CDN if local file is missing
            if ($rawHtml === false) {
                $cdnUrl = "https://cdn.hestena62.com/library/" . urlencode($localFile);
                $rawHtml = @file_get_contents($cdnUrl);
            }
            
            if ($rawHtml === false) {
                $error = 'Failed to load book text from storage.';
            } else {
                // --- 4. Clean HTML Content ---
                // Strip the Gutenberg style block
                $cleanedHtml = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $rawHtml);
                
                // Strip outer wrapping structural tags (doctype, html, head, body, meta, link tags that might break layout)
                $cleanedHtml = preg_replace('/<\/?(!DOCTYPE|html|head|body|meta)[^>]*>/i', '', $cleanedHtml);
                
                // Extract only what's inside the main container if it exists, or output clean html
                $contentHtml = $cleanedHtml;
            }
        }
    }
}

// --- 5. Page-Specific Variables ---
$pageTitle = $book ? htmlspecialchars($book['title']) . " | Hesten's Learning Library" : "Book Reader | Hesten's Learning";
$pageDescription = $book ? htmlspecialchars($book['description']) : "Read digital classics online with our accessible reader.";
$pageKeywords = "ebook, online reader, accessible learning, reading classics";
$pageAuthor = "Hesten Allison";

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- Include Unified Library Styles -->
<link rel="stylesheet" href="library.css">

<main id="main-content" class="library-main reader-main-layout">
    <div class="reader-back-nav">
        <a href="index.php" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Library
        </a>
    </div>

    <?php if (!empty($error)): ?>
        <div class="reader-error-container">
            <i class="fas fa-exclamation-triangle reader-error-icon"></i>
            <h2>Unable to load book</h2>
            <p><?php echo htmlspecialchars($error); ?></p>
            <a href="index.php" class="reader-error-btn">Return to Catalog</a>
        </div>
    <?php else: ?>
        <article class="cdn-book-reader-container animate-reveal">
            <!-- Reader Header -->
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

            <!-- Book Content Block -->
            <div id="book-content" class="cdn-book-reader-content">
                <?php echo $contentHtml; ?>
            </div>

            <!-- Reader Footer Actions (Disclaimer & License Trigger) -->
            <div class="reader-footer-actions">
                <button onclick="openBookDisclaimer()" class="reader-disclaimer-btn">
                    <i class="fas fa-balance-scale"></i> Show Book Disclaimer & License
                </button>
            </div>
        </article>

        <!-- Book Disclaimer & License Modal -->
        <div id="bookDisclaimerModal" class="library-modal hidden" role="dialog" aria-modal="true">
            <div class="library-modal-backdrop" onclick="closeBookDisclaimer()"></div>
            <div class="library-modal-content" style="max-width: 48rem; padding: 2.5rem; max-height: 80vh; overflow-y: auto;" onclick="event.stopPropagation()">
                <button onclick="closeBookDisclaimer()" class="library-modal-close-btn" aria-label="Close disclaimer">
                    <i class="fas fa-times"></i>
                </button>
                <h2 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.75rem; margin-bottom: 1.5rem; color: var(--color-primary); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-info-circle"></i> Disclaimer & License
                </h2>
                <div id="book-disclaimer-modal-body" class="book-disclaimer-modal-body">
                    <!-- Dynamic Content populated via JavaScript -->
                </div>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Extract the Project Gutenberg header and footer content dynamically
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

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeBookDisclaimer();
            }
        });
        </script>
    <?php endif; ?>
</main>

<?php include '../src/footer.php'; ?>
