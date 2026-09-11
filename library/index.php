<?php
/**
 * library/index.php - Main Digital Library Portal
 * High-performance, accessible digital book catalog with subject research desks,
 * multi-facet filters, and interactive view switchers.
 */

// --- Redirect to trailing slash URL to resolve relative asset paths in dev servers ---
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];
if (basename($requestPath) === 'library' && substr($requestPath, -1) !== '/') {
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    $redirectUrl = './' . ($queryString ? '?' . $queryString : '');
    header('Location: ' . $redirectUrl, true, 301);
    exit;
}

// --- Page-Specific SEO & Meta Variables ---
$pageTitle = 'Digital Library & Research Desks - Hesten\'s Learning';
$pageDescription = 'Browse your digital collection of classic literature, historical primary sources, and comprehensive academic textbooks.';
$pageKeywords = 'library, books, reading, digital archive, primary sources, textbooks, history, literature, study guides';
$pageAuthor = 'Hesten\'s Learning';

// --- Load Book Data ---
$bookdJsonPath = __DIR__ . '/assets/bookd.json';
$categories = is_file($bookdJsonPath) ? (json_decode(file_get_contents($bookdJsonPath), true) ?: []) : [];

// --- Load Drawer Academic Data ---
$drawerJsonPath = __DIR__ . '/assets/edu-side-drawer.json';
$drawerCategories = is_file($drawerJsonPath) ? (json_decode(file_get_contents($drawerJsonPath), true) ?: []) : [];

// --- Load Desk External Links ---
$linksJsonPath = __DIR__ . '/assets/desk_links.json';
$deskLinks = is_file($linksJsonPath) ? (json_decode(file_get_contents($linksJsonPath), true) ?: []) : [];

// --- Load Disclaimers Data ---
$disclaimersJsonPath = __DIR__ . '/assets/disclaimers.json';
$disclaimersData = is_file($disclaimersJsonPath) ? (json_decode(file_get_contents($disclaimersJsonPath), true) ?: []) : [];

// Total books count calculation
$totalCatalogBooks = 0;
foreach ($categories as $catBooks) {
    if (is_array($catBooks)) {
        $totalCatalogBooks += count($catBooks);
    }
}

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// Include Global Site Header
include ABSPATH . 'src/header.php';
?>

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg" aria-hidden="true">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<main id="main-content" class="library-main">

    <div class="library-workspace">

        <!-- Panel 1: General Library Landing Page -->
        <div id="main-desk-landing" class="workspace-panel active">

            <!-- Hero Section -->
            
            <!-- Modern Cinematic Welcome Hero & Academic Dashboard -->
            <section class="library-modern-hero library-animate-reveal">
                <div class="hero-featured-book hero-welcome-card">
                    <div class="featured-bg-blur"></div>
                    <div class="featured-content">
                        <span class="featured-label"><i class="fas fa-book-reader"></i> Digital Archive &amp; Research Portal</span>
                        <h1 class="featured-title">Welcome to Hesten's Learning Library</h1>
                        <p class="featured-desc">Explore our curated collection of classic literature, foundational textbooks, and historical primary sources. Learn how to search, research, and use accessible learning tools.</p>
                        <div class="featured-actions">
                            <button type="button" onclick="openLibraryGuideModal()" class="btn-primary-glow" id="hero-read-more-btn" aria-label="Open library user guide modal">
                                <i class="fas fa-compass"></i> <span>Read More &amp; User Guide</span>
                            </button>
                            <a href="#library-catalog-container" class="btn-secondary-glass">
                                <i class="fas fa-book-open"></i> <span>Browse Catalog</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Academic Dashboard Stats & Goals -->
                <div class="hero-academic-dashboard">
                    <div class="dashboard-greeting">
                        <div class="greeting-header-row">
                            <div>
                                <h2>Welcome back, Scholar</h2>
                                <p>Your digital archive holds <span class="highlight-stat"><?php echo $totalCatalogBooks; ?></span> volumes.</p>
                            </div>
                            <div class="dashboard-streak-badge" title="Consecutive days reading">
                                <i class="fas fa-fire text-amber-500"></i> <span id="dash-streak-count">1</span> Day Streak
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-stats-grid">
                        <div class="dash-stat-card goal-card" onclick="openGoalModal()" style="cursor: pointer;" title="Set or adjust your daily reading goal">
                            <div class="goal-ring-wrap">
                                <svg class="goal-ring-svg" viewBox="0 0 40 40">
                                    <circle class="goal-ring-bg" cx="20" cy="20" r="18" fill="none" stroke-width="3"></circle>
                                    <circle id="dash-goal-ring-fill" class="goal-ring-fill" cx="20" cy="20" r="18" fill="none" stroke-width="3" stroke-dasharray="113.1" stroke-dashoffset="75"></circle>
                                </svg>
                                <i class="fas fa-bullseye stat-icon-center"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-goal-progress">5/15m</span>
                                <span class="stat-label">Daily Goal <i class="fas fa-pencil-alt opacity-60" style="font-size: 0.65rem;"></i></span>
                            </div>
                        </div>
                        <div class="dash-stat-card" onclick="document.querySelector('.library-chip-btn[data-chip=saved]')?.click()" style="cursor: pointer;" title="Filter by saved books">
                            <i class="fas fa-bookmark stat-icon" style="color: #6366f1;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-saved-count">0</span>
                                <span class="stat-label">Saved Books</span>
                            </div>
                        </div>
                        <div class="dash-stat-card" onclick="openStudyNotebookModal()" style="cursor: pointer;" title="Open Study Notebook with all highlights">
                            <i class="fas fa-highlighter stat-icon" style="color: #ec4899;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-highlights-count">0</span>
                                <span class="stat-label">Highlights</span>
                            </div>
                        </div>
                        <div class="dash-stat-card" onclick="openStudyNotebookModal()" style="cursor: pointer;" title="Open Study Notebook with notes & flashcards">
                            <i class="fas fa-sticky-note stat-icon" style="color: #f59e0b;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-notes-count">0</span>
                                <span class="stat-label">Study Notes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Populate Dashboard Stats
                const bookmarks = JSON.parse(localStorage.getItem('hesten_library_bookmarks')) || [];
                const savedEl = document.getElementById('dash-saved-count');
                if (savedEl) savedEl.textContent = bookmarks.length;

                let allHighlights = 0;
                let allNotes = 0;
                for (let i = 0; i < localStorage.length; i++) {
                    const key = localStorage.key(i);
                    if (key && key.startsWith('hesten_highlights_')) {
                        try {
                            const hls = JSON.parse(localStorage.getItem(key)) || [];
                            allHighlights += hls.length;
                            hls.forEach(hl => { if (hl.note) allNotes++; });
                        } catch(e) {}
                    }
                }
                const hlsEl = document.getElementById('dash-highlights-count');
                const notesEl = document.getElementById('dash-notes-count');
                if (hlsEl) hlsEl.textContent = allHighlights;
                if (notesEl) notesEl.textContent = allNotes;
            });
            </script>


            <!-- Real-time Search and Multi-Facet Filters (Moved below hero) -->
            <section class="library-search-wrapper library-animate-reveal" style="margin-top: 2rem;">
                    <!-- Search bar -->
                    <div class="library-search-input-container">
                        <input type="text" 
                               id="library-search" 
                               aria-label="Search Library Catalog" 
                               placeholder="Search title, author, grade, or curriculum..." 
                               class="library-search-input library-glass-shine"
                               autocomplete="off">
                        <i class="fas fa-search library-search-icon"></i>
                        <button type="button" id="library-search-clear" class="library-search-clear-btn hidden" aria-label="Clear search input">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Category Filter -->
                    <div class="library-filter-select-container">
                        <select id="category-filter" aria-label="Select Category" class="library-category-select library-glass-shine">
                            <option value="all">All Categories</option>
                            <option value="saved">⭐ My Reading List</option>
                            <?php foreach (array_keys($categories) as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat); ?>"><?php echo htmlspecialchars($cat); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-filter library-filter-icon"></i>
                    </div>

                    <!-- Lexile Reading Level Filter -->
                    <div class="library-filter-select-container">
                        <select id="lexile-filter" aria-label="Select Reading Level" class="library-category-select library-glass-shine">
                            <option value="all">All Reading Levels</option>
                            <option value="easy">Elementary (Under 500L)</option>
                            <option value="medium">Middle School (500L - 900L)</option>
                            <option value="hard">High School (Above 900L)</option>
                        </select>
                        <i class="fas fa-graduation-cap library-filter-icon"></i>
                    </div>

                    <!-- Multi-Facet Sort Dropdown -->
                    <div class="library-filter-select-container">
                        <select id="catalog-sort" aria-label="Sort Catalog" class="library-category-select library-glass-shine">
                            <option value="default">Sort: Default</option>
                            <option value="title-asc">Title: A to Z</option>
                            <option value="title-desc">Title: Z to A</option>
                            <option value="lexile-asc">Lexile: Low to High</option>
                            <option value="lexile-desc">Lexile: High to Low</option>
                        </select>
                        <i class="fas fa-sort-amount-down library-filter-icon"></i>
                    </div>

                    <!-- Catalog View Switcher -->
                    <div class="library-view-switcher" role="group" aria-label="Catalog View Mode">
                        <button id="view-mode-carousel" class="view-switch-btn active" onclick="switchLibraryView('carousel')" title="Carousel Rows View" aria-label="Carousel Rows View">
                            <i class="fas fa-layer-group"></i>
                        </button>
                        <button id="view-mode-grid" class="view-switch-btn" onclick="switchLibraryView('grid')" title="Multi-Column Grid View" aria-label="Multi-Column Grid View">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button id="view-mode-list" class="view-switch-btn" onclick="switchLibraryView('list')" title="Academic List / Table View" aria-label="Academic List / Table View">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </section>

                <!-- Quick Curriculum & Grade Filter Chips -->
                <div class="library-chips-wrapper library-animate-reveal">
                    <div class="library-chips-scroll" role="tablist" aria-label="Curriculum quick filter chips">
                        <button type="button" class="library-chip-btn active" data-chip="all" role="tab" aria-selected="true">
                            <i class="fas fa-sparkles"></i> <span>All Works</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="elementary" role="tab" aria-selected="false">
                            <i class="fas fa-child"></i> <span>Elementary (K-5)</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="middle" role="tab" aria-selected="false">
                            <i class="fas fa-user-graduate"></i> <span>Middle School (6-8)</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="high" role="tab" aria-selected="false">
                            <i class="fas fa-university"></i> <span>High School (9-12)</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="primary-sources" role="tab" aria-selected="false">
                            <i class="fas fa-scroll"></i> <span>Primary Documents</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="math-ref" role="tab" aria-selected="false">
                            <i class="fas fa-calculator"></i> <span>Math Reference</span>
                        </button>
                        <button type="button" class="library-chip-btn" data-chip="saved" role="tab" aria-selected="false">
                            <i class="fas fa-star text-amber-400"></i> <span>My Saved List</span>
                        </button>
                    </div>
                </div>

            <!-- Continue Reading Shelf (Populated dynamically from localStorage) -->
            <section id="continue-reading-shelf" class="continue-reading-section hidden library-animate-reveal">
                <div class="continue-reading-header">
                    <div class="continue-reading-title-wrap">
                        <div class="continue-reading-icon-pulse">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <div>
                            <h2 class="continue-reading-title">Jump Back In</h2>
                            <p class="continue-reading-subtitle">Pick up right where you left off</p>
                        </div>
                    </div>
                </div>
                <div id="continue-reading-cards" class="continue-reading-grid">
                    <!-- Injected by library.js -->
                </div>
            </section>

            <!-- Library Content Container -->
            <div id="library-catalog-container" class="library-content-container view-grid masonry-active">
                <?php foreach ($categories as $categoryName => $books): ?>
                    <section class="library-row-section library-animate-reveal" data-category="<?php echo htmlspecialchars($categoryName); ?>">
                        <!-- Category Header -->
                        <div class="library-row-header">
                            <h2 class="library-row-title">
                                <?php echo htmlspecialchars($categoryName); ?>
                            </h2>
                            <div class="library-row-controls">
                                <button type="button" 
                                        class="library-more-resources-btn" 
                                        onclick="openCategoryResources('<?php echo htmlspecialchars($categoryName, ENT_QUOTES); ?>')" 
                                        aria-label="More resources for <?php echo htmlspecialchars($categoryName); ?>"
                                        title="Explore additional academic resources and primary texts for <?php echo htmlspecialchars($categoryName); ?>">
                                    <i class="fas fa-layer-group" aria-hidden="true"></i>
                                    <span>More Resources</span>
                                </button>
                                <div class="library-scroll-buttons">
                                    <button class="library-scroll-btn scroll-left" aria-label="Scroll left in <?php echo htmlspecialchars($categoryName); ?>">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="library-scroll-btn scroll-right" aria-label="Scroll right in <?php echo htmlspecialchars($categoryName); ?>">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Horizontal Scroll / Grid / List Container -->
                        <div class="library-books-row">
                            <?php foreach ($books as $book): 
                                $book['category'] = $categoryName;
                                include __DIR__ . '/book_card.php';
                            endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- No Results Message -->
                <div id="no-results" class="library-no-results hidden">
                    <div class="library-no-results-icon-wrap">
                        <i class="fas fa-search"></i>
                        <div class="library-ping-overlay"></div>
                    </div>
                    <h3 class="library-no-results-title">No books found</h3>
                    <p class="library-no-results-desc">We couldn't find anything matching your search criteria. Try clearing some filters or searching for something else.</p>
                    <button type="button" onclick="resetLibraryFilters()" class="library-reset-filters-btn">
                        <i class="fas fa-undo"></i> Reset Filters
                    </button>
                </div>
            </div> <!-- Close library-content-container -->
        </div> <!-- Close Panel 1 main-desk-landing -->

        <!-- Panel 2: Dedicated Subject Research Workspace -->
        <div id="subject-desk-workspace" class="workspace-panel hidden">
            <!-- Workspace Header Bar -->
            <header class="library-drawer-header">
                <div class="drawer-header-left">
                    <div id="drawer-icon-badge" class="drawer-header-icon-badge">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="drawer-header-text">
                        <h2 id="drawer-title" class="drawer-header-title">Subject Guide</h2>
                        <p id="drawer-subtitle" class="drawer-header-subtitle"></p>
                    </div>
                </div>
                
                <!-- Controls row -->
                <div class="drawer-header-right">
                    <!-- Dedicated Close Button -->
                    <button onclick="closeResourcePortal()" class="library-drawer-close-btn" aria-label="Close Subject Portal" title="Close Subject Portal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </header>

            <!-- Subject Switcher Tabs Bar -->
            <nav class="desk-switcher-bar" aria-label="Switch Subject Research Desk">
                <button type="button" class="desk-switcher-tab" data-desk="General Resources" onclick="openResourcePortal('General Resources')">
                    <i class="fas fa-layer-group"></i> <span>General</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="US History" onclick="openResourcePortal('US History')">
                    <i class="fas fa-university"></i> <span>US History</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="World History" onclick="openResourcePortal('World History')">
                    <i class="fas fa-globe-americas"></i> <span>World History</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="WW1" onclick="openResourcePortal('WW1')">
                    <i class="fas fa-shield-halved"></i> <span>WW1</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="WW2" onclick="openResourcePortal('WW2')">
                    <i class="fas fa-award"></i> <span>WW2</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="Math" onclick="openResourcePortal('Math')">
                    <i class="fas fa-calculator"></i> <span>Math</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="ELA" onclick="openResourcePortal('ELA')">
                    <i class="fas fa-spell-check"></i> <span>ELA</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="Science" onclick="openResourcePortal('Science')">
                    <i class="fas fa-atom"></i> <span>Science</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="Civics" onclick="openResourcePortal('Civics')">
                    <i class="fas fa-landmark"></i> <span>Civics</span>
                </button>
            </nav>

            <!-- Workspace Content Area -->
            <div class="library-drawer-content">
                
                <div class="drawer-holdings-bar">
                    <span class="drawer-holdings-label">Subject Holdings</span>
                    <h3 class="drawer-holdings-count">
                        Showing <span id="drawer-count">0</span> references
                    </h3>
                </div>

                <div id="drawer-grid" class="drawer-grid-container">
                    <?php 
                    // Render all books grouped by category and section inside the drawer wrapper
                    foreach ($drawerCategories as $categoryName => $books) {
                        $grouped = [];
                        foreach ($books as $book) {
                            $sect = $book['section'] ?? '';
                            $grouped[$sect][] = $book;
                        }
                        
                        foreach ($grouped as $sectionName => $sectionBooks) {
                            ?>
                            <div class="drawer-section" data-category="<?php echo htmlspecialchars($categoryName); ?>">
                                <?php if ($sectionName !== ''): ?>
                                    <div class="drawer-section-header">
                                        <?php echo htmlspecialchars($sectionName); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="drawer-section-grid">
                                    <?php 
                                    foreach ($sectionBooks as $book) {
                                        $book['category'] = $categoryName;
                                        include __DIR__ . '/book_card.php';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                
                <!-- Local Drawer Empty State -->
                <div id="drawer-empty" class="drawer-empty-state hidden">
                    <i class="fas fa-search drawer-empty-icon"></i>
                    <h3 class="drawer-empty-title">No items found</h3>
                    <p class="drawer-empty-desc">We couldn't find any resources matching your search in this subject desk.</p>
                </div>

                <!-- External Links Section -->
                <div id="drawer-external-links-container" class="drawer-external-links-container hidden">
                    <h3 class="drawer-external-links-title">
                        <i class="fas fa-external-link-alt"></i> Additional Online Resources
                    </h3>
                    <div id="drawer-external-links-list" class="drawer-external-links-grid">
                        <!-- Populated dynamically by library.js -->
                    </div>
                </div>
            </div>
        </div> <!-- Close Panel 2 subject-desk-workspace -->

    </div> <!-- Close library-workspace -->

</main>

<link rel="stylesheet" href="../assets/css/library-main.css">
<?php include __DIR__ . '/modals.php'; ?>

<script>
  window.DESK_EXTERNAL_LINKS = <?php echo json_encode($deskLinks, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  window.DISCLAIMERS_DATA = <?php echo json_encode($disclaimersData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
</script>
<script src="../assets/js/library/lib-bookmarks.js" defer></script>
<script src="../assets/js/library/lib-view-mode-switcher.js" defer></script>
<script src="../assets/js/library/lib-real.js" defer></script>
<script src="../assets/js/library/lib-horizontal-carousel-scroll-but.js" defer></script>
<script src="../assets/js/library/lib-continue-reading-shelf.js" defer></script>
<script src="../assets/js/library/lib-subject-research-desks-navigat.js" defer></script>
<script src="../assets/js/library/lib-book-overview-modal.js" defer></script>
<script src="../assets/js/library/lib-explainer.js" defer></script>
<script src="../assets/js/library/lib-academic-citation-generator.js" defer></script>
<script src="../assets/js/library/lib-inline-lexile-customization.js" defer></script>
<script src="../assets/js/library/lib-reading-gamification.js" defer></script>
<script src="../assets/js/library/lib-study-notebook.js" defer></script>
<script src="../assets/js/library/lib-classroom-share.js" defer></script>
<script src="../assets/js/library/lib-keyboard-shortcuts.js" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>