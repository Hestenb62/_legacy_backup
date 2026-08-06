<?php
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
<div class="aurora-bg noise-grain">
    <div class="aurora-circle aurora-circle-1"></div>
    <div class="aurora-circle aurora-circle-2"></div>
    <div class="aurora-circle aurora-circle-3"></div>
</div>

<main id="main-content" class="library-main">

    <!-- Hero Section -->
    <section class="library-hero">
        <div class="animate-reveal">
            <!-- Pill Badge -->
            <div class="pill-badge">
                <span class="pulse-dot">
                    <span class="pulse-dot-ring"></span>
                    <span class="pulse-dot-core"></span>
                </span>
                <span class="pill-badge-text"><i class="fas fa-book-reader mr-2"></i> DIGITAL ARCHIVE</span>
            </div>

            <h1 class="library-title">
                The <span class="gradient-text">Library</span>
            </h1>
        </div>

        <!-- Real-time Search and Filters -->
        <div class="search-filter-wrapper animate-reveal" style="animation-delay: 0.1s;">
            <!-- Redesigned Search bar -->
            <div class="search-input-group">
                <input type="text" id="library-search" aria-label="Search Library"
                    placeholder="Search title, author, or ISBN..."
                    class="library-search-input">
                <i class="fas fa-search library-search-icon"></i>
            </div>

            <div class="filter-select-group">
                <select id="category-filter" aria-label="Select Category"
                    class="library-filter-select">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categories) as $cat)
                        echo '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($cat) . '</option>'; ?>
                </select>
                <i class="fas fa-filter library-filter-icon"></i>
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="library-content-container">

        <?php foreach ($categories as $categoryName => $books): ?>
            <section class="library-category animate-reveal">
                <!-- Category Header -->
                <div class="category-header">
                    <h2 class="category-title">
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
                    <div class="category-divider"></div>
                    <div class="scroll-buttons">
                        <button class="scroll-btn left" aria-label="Scroll left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="scroll-btn right" aria-label="Scroll right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="book-scroll-container scrollbar-none book-container">
                    <?php foreach ($books as $book): ?>
                        <?php include 'book_card.php'; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results" class="no-results-container">
            <div class="no-results-icon-wrapper">
                <i class="fas fa-search"></i>
                <div class="no-results-ping"></div>
            </div>
            <h3 class="no-results-title">No books found</h3>
            <p class="no-results-text">We couldn't find anything matching your search criteria.</p>
        </div>

    </div>

</main>

<link rel="stylesheet" href="library.css">
<?php include 'modals.php'; ?>
<script src="library.js" defer></script>

<?php include '../src/footer.php'; ?>