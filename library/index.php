<?php
// --- Redirect to trailing slash URL to resolve relative asset paths in dev servers ---
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];
if (basename($requestPath) === 'library' && substr($requestPath, -1) !== '/') {
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    $redirectUrl = $requestPath . '/' . ($queryString ? '?' . $queryString : '');
    header('Location: ' . $redirectUrl, true, 301);
    exit;
}

// --- Page-Specific Variables ---
$pageTitle = 'Hesten\'s Learning Library';
$pageDescription = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords = 'library, books, epub, pdf, digital library, collection, education, textbooks';
$pageAuthor = 'Hesten\'s Learning';
$welcomeMessage = "Welcome to Hesten's Learning Library";
$welcomeParagraph = "Explore our vast collection of fiction classics and comprehensive educational resources for all grade levels.";

// --- Book Data Array ---
$jsonString = file_get_contents(__DIR__ . '/bookd.json');
$categories = json_decode($jsonString, true);
if (!$categories) {
    $categories = []; // Fallback in case of JSON error
}

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<main id="main-content" class="library-main">

    <!-- Hero Section -->
    <section class="library-hero">
        <div class="library-animate-reveal">
            <!-- Pill Badge -->
            <div class="library-hero-badge">
                <span class="library-badge-dot"></span>
                <span class="library-badge-text"><i class="fas fa-book-reader"></i> DIGITAL ARCHIVE</span>
            </div>

            <h1 class="library-hero-title">
                The <span class="library-hero-title-gradient">Library</span>
            </h1>
        </div>

        <!-- Real-time Search and Filters -->
        <div class="library-search-wrapper library-animate-reveal" style="animation-delay: 0.1s;">
            <!-- Redesigned Search bar -->
            <div class="library-search-input-container">
                <input type="text" id="library-search" aria-label="Search Library" placeholder="Search title, author, or ISBN..." class="library-search-input">
                <i class="fas fa-search library-search-icon"></i>
            </div>

            <div class="library-filter-select-container">
                <select id="category-filter" aria-label="Select Category" class="library-category-select">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categories) as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat); ?>"><?php echo htmlspecialchars($cat); ?></option>
                    <?php endforeach; ?>
                </select>
                <i class="fas fa-filter library-filter-icon"></i>
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="library-content-container">

        <?php foreach ($categories as $categoryName => $books): ?>
            <section class="library-row-section library-animate-reveal" data-category="<?php echo htmlspecialchars($categoryName); ?>">
                <!-- Category Header -->
                <div class="library-row-header">
                    <h2 class="library-row-title">
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
                    <div class="library-row-divider"></div>
                    <div class="library-scroll-buttons">
                        <button class="library-scroll-btn scroll-left" aria-label="Scroll left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="library-scroll-btn scroll-right" aria-label="Scroll right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="library-books-row">
                    <?php foreach ($books as $book): ?>
                        <?php include 'book_card.php'; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results" class="library-no-results">
            <div class="library-no-results-icon-wrap">
                <i class="fas fa-search"></i>
                <div class="library-ping-overlay"></div>
            </div>
            <h3 class="library-no-results-title">No books found</h3>
            <p class="library-no-results-desc">We couldn't find anything matching your search criteria.</p>
        </div>

    </div>

</main>

<link rel="stylesheet" href="library.css">
<?php include __DIR__ . '/modals.php'; ?>
<script src="library.js" defer></script>

<?php include '../src/footer.php'; ?>