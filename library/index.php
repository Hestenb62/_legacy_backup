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
    $redirectUrl = $requestPath . '/' . ($queryString ? '?' . $queryString : '');
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

    <!-- Collapsible left sidebar for Subject Desks -->
    <aside id="library-sidebar" class="library-sidebar collapsed" aria-label="Subject Research Desks">
        <div class="sidebar-header">
            <span class="sidebar-header-title">Research Desks</span>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item" data-desk="US History" title="US History">
                <button type="button" onclick="openResourcePortal('US History')" class="sidebar-item-btn" aria-label="Open US History Desk">
                    <i class="fas fa-university"></i>
                    <span class="sidebar-label">US History</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="World History" title="World History">
                <button type="button" onclick="openResourcePortal('World History')" class="sidebar-item-btn" aria-label="Open World History Desk">
                    <i class="fas fa-globe-americas"></i>
                    <span class="sidebar-label">World History</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="WW1" title="WW1">
                <button type="button" onclick="openResourcePortal('WW1')" class="sidebar-item-btn" aria-label="Open World War 1 Desk">
                    <i class="fas fa-shield-halved"></i>
                    <span class="sidebar-label">WW1</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="WW2" title="WW2">
                <button type="button" onclick="openResourcePortal('WW2')" class="sidebar-item-btn" aria-label="Open World War 2 Desk">
                    <i class="fas fa-award"></i>
                    <span class="sidebar-label">WW2</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="Math" title="Math">
                <button type="button" onclick="openResourcePortal('Math')" class="sidebar-item-btn" aria-label="Open Mathematics Desk">
                    <i class="fas fa-calculator"></i>
                    <span class="sidebar-label">Math</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="ELA" title="ELA">
                <button type="button" onclick="openResourcePortal('ELA')" class="sidebar-item-btn" aria-label="Open English Language Arts Desk">
                    <i class="fas fa-spell-check"></i>
                    <span class="sidebar-label">ELA</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="Science" title="Science">
                <button type="button" onclick="openResourcePortal('Science')" class="sidebar-item-btn" aria-label="Open Science Desk">
                    <i class="fas fa-atom"></i>
                    <span class="sidebar-label">Science</span>
                </button>
            </li>
            <li class="sidebar-item" data-desk="Civics" title="Civics">
                <button type="button" onclick="openResourcePortal('Civics')" class="sidebar-item-btn" aria-label="Open Civics Desk">
                    <i class="fas fa-landmark"></i>
                    <span class="sidebar-label">Civics</span>
                </button>
            </li>
        </ul>
        <button id="sidebar-toggle" class="sidebar-toggle-btn" aria-label="Toggle Subject Desks Sidebar" title="Toggle Sidebar">
            <i class="fas fa-chevron-right"></i>
        </button>
    </aside>

    <div class="library-workspace">

        <!-- Panel 1: General Library Landing Page -->
        <div id="main-desk-landing" class="workspace-panel active">

            <!-- Hero Section -->
            <section class="library-hero">
                <div class="library-animate-reveal">
                    <!-- Pill Badge -->
                    <div class="library-hero-badge">
                        <span class="library-badge-dot"></span>
                        <span class="library-badge-text"><i class="fas fa-book-reader mr-1"></i> DIGITAL ARCHIVE &bull; <?php echo $totalCatalogBooks; ?> VOLUMES</span>
                    </div>

                    <h1 class="library-hero-title">
                        The <span class="library-hero-title-gradient">Library</span>
                    </h1>
                    <p class="library-hero-subtitle">
                        Immerse yourself in classic literature, primary documents, and interactive study suites.
                    </p>
                </div>

                <!-- Real-time Search and Multi-Facet Filters -->
                <div class="library-search-wrapper library-animate-reveal" style="animation-delay: 0.1s;">
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
                </div>
            </section>

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
            <div id="library-catalog-container" class="library-content-container view-carousel">
                <?php foreach ($categories as $categoryName => $books): ?>
                    <section class="library-row-section library-animate-reveal" data-category="<?php echo htmlspecialchars($categoryName); ?>">
                        <!-- Category Header -->
                        <div class="library-row-header">
                            <h2 class="library-row-title">
                                <?php echo htmlspecialchars($categoryName); ?>
                            </h2>
                            <div class="library-row-divider"></div>
                            <div class="library-scroll-buttons">
                                <button class="library-scroll-btn scroll-left" aria-label="Scroll left in <?php echo htmlspecialchars($categoryName); ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="library-scroll-btn scroll-right" aria-label="Scroll right in <?php echo htmlspecialchars($categoryName); ?>">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
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
                    <button onclick="closeResourcePortal()" class="library-desk-back-btn" aria-label="Back to main catalog">
                        <i class="fas fa-arrow-left"></i> <span>Back to Catalog</span>
                    </button>
                    <div id="drawer-icon-badge" class="drawer-header-icon-badge">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="drawer-header-text">
                        <div class="drawer-breadcrumbs">
                            <span onclick="closeResourcePortal()" class="breadcrumb-crumb linkable">Catalog</span>
                            <i class="fas fa-chevron-right breadcrumb-sep"></i>
                            <span id="drawer-breadcrumb-current" class="breadcrumb-crumb active">Research Desk</span>
                        </div>
                        <h2 id="drawer-title" class="drawer-header-title">Subject Guide</h2>
                        <p id="drawer-subtitle" class="drawer-header-subtitle"></p>
                    </div>
                </div>
                
                <!-- Controls row (Search & Sort inside drawer) -->
                <div class="drawer-header-right">
                    <!-- Drawer Search -->
                    <div class="drawer-search-container">
                        <input type="text" 
                               id="drawer-search" 
                               oninput="filterDrawerBooks()" 
                               placeholder="Search in this desk..." 
                               class="drawer-search-input"
                               autocomplete="off">
                        <i class="fas fa-search drawer-search-icon"></i>
                        <button type="button" id="drawer-search-clear" onclick="clearDrawerSearch()" class="drawer-search-clear-btn hidden" aria-label="Clear search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <!-- Drawer Sort -->
                    <div class="drawer-sort-container">
                        <select id="drawer-sort" onchange="sortDrawerBooks()" class="drawer-sort-select library-glass-shine" aria-label="Sort books">
                            <option value="title-asc">Title (A-Z)</option>
                            <option value="title-desc">Title (Z-A)</option>
                            <option value="ddc">Call Number (DDC)</option>
                            <option value="lexile-asc">Reading Level (Lowest First)</option>
                            <option value="lexile-desc">Reading Level (Highest First)</option>
                            <option value="date-desc">Publication Date (Newest)</option>
                            <option value="date-asc">Publication Date (Oldest)</option>
                        </select>
                    </div>

                    <!-- Dedicated Close Button -->
                    <button onclick="closeResourcePortal()" class="library-drawer-close-btn" aria-label="Close Subject Portal" title="Close Subject Portal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </header>

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

<link rel="stylesheet" href="/library/library.css">
<?php include __DIR__ . '/modals.php'; ?>

<script>
  window.DESK_EXTERNAL_LINKS = <?php echo json_encode($deskLinks, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  window.DISCLAIMERS_DATA = <?php echo json_encode($disclaimersData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
</script>
<script src="/library/assets/library.js" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>