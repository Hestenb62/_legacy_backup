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
    $redirectUrl = './'.($queryString ? '?'.$queryString : '');
    header('Location: '.$redirectUrl, true, 301);
    exit;
    }

// --- Check for Dynamic Repository Pages (?pages=slug or ?page=slug) ---
$requestedPage = $_GET['pages'] ?? ($_GET['page'] ?? '');
$pageSlug = strtolower(trim(preg_replace('/[^a-zA-Z0-9_-]/', '', (string)$requestedPage)));

$pageData = null;
$isPageMode = false;

if (!empty($pageSlug)) {
    $candidatePaths = [
        __DIR__ . '/assets/pages/' . $pageSlug . '.json',
        __DIR__ . '/assets/' . $pageSlug . '.json'
    ];
    foreach ($candidatePaths as $cPath) {
        if (is_file($cPath)) {
            $jsonRaw = file_get_contents($cPath);
            $parsed = json_decode($jsonRaw, true);
            if (is_array($parsed)) {
                $pageData = $parsed;
                $isPageMode = true;
                break;
            }
        }
    }
}

// --- Page-Specific SEO & Meta Variables ---
if ($isPageMode && $pageData) {
    $pageTitle = ($pageData['title'] ?? 'Repository') . ' - Hesten\'s Learning Digital Library';
    $pageDescription = ($pageData['subtitle'] ?? 'Comprehensive educational repository and interactive reference guide.') . ' - Standards-aligned reference with canonical rules, contrasting exemplars, and mastery diagnostics.';
    $pageKeywords = 'punctuation, grammar, syntax, mechanics, comma, semicolon, colon, dashes, apostrophe, quotes, CCSS, English conventions';
} else {
    $pageTitle = 'Digital Library & Research Desks - Hesten\'s Learning';
    $pageDescription = 'Browse your digital collection of classic literature, historical primary sources, and comprehensive academic textbooks.';
    $pageKeywords = 'library, books, reading, digital archive, primary sources, textbooks, history, literature, study guides';
}
$pageAuthor = 'Hesten\'s Learning';

// --- Load Book Data from both Repositories ---
$bookdJsonPath = __DIR__.'/assets/bookd.json';
$drawerJsonPath = __DIR__.'/assets/edu-side-drawer.json';

$bookdCategories = is_file($bookdJsonPath) ? (json_decode(file_get_contents($bookdJsonPath), true) ?: []) : [];
$drawerCategories = is_file($drawerJsonPath) ? (json_decode(file_get_contents($drawerJsonPath), true) ?: []) : [];

// Merge and deduplicate all books across primary archive and academic subject collections
$preferredCategoryOrder = [
    'Classic Fiction',
    'Fantasy & Sci-Fi',
    'US History',
    'World History',
    'WW1',
    'WW2',
    'Math',
    'ELA',
    'Science',
    'Civics',
    'General Resources'
];

$categories = [];
foreach ($preferredCategoryOrder as $catName) {
    $categories[$catName] = [];
}

$seenBookIds = [];

// 1. Ingest books from primary reading collection (bookd.json)
foreach ($bookdCategories as $catName => $books) {
    if (!is_array($books)) continue;
    if (!isset($categories[$catName])) {
        $categories[$catName] = [];
    }
    foreach ($books as $b) {
        $id = $b['id'] ?? '';
        if ($id && !isset($seenBookIds[$id])) {
            $b['category'] = $catName;
            $categories[$catName][] = $b;
            $seenBookIds[$id] = true;
        }
    }
}

// 2. Ingest books from academic drawer repository (edu-side-drawer.json)
foreach ($drawerCategories as $catName => $books) {
    if (!is_array($books)) continue;
    if (!isset($categories[$catName])) {
        $categories[$catName] = [];
    }
    foreach ($books as $b) {
        $id = $b['id'] ?? '';
        if ($id && !isset($seenBookIds[$id])) {
            $b['category'] = $catName;
            $categories[$catName][] = $b;
            $seenBookIds[$id] = true;
        }
    }
}

// Filter out any empty categories
$categories = array_filter($categories, fn($catBooks) => !empty($catBooks));

// --- Load Desk External Links ---
$linksJsonPath = __DIR__.'/assets/desk_links.json';
$deskLinks = is_file($linksJsonPath) ? (json_decode(file_get_contents($linksJsonPath), true) ?: []) : [];

// --- Load Disclaimers Data ---
$disclaimersJsonPath = __DIR__.'/assets/disclaimers.json';
$disclaimersData = is_file($disclaimersJsonPath) ? (json_decode(file_get_contents($disclaimersJsonPath), true) ?: []) : [];

// Total books count calculation
$totalCatalogBooks = 0;
foreach ($categories as $catBooks) {
    if (is_array($catBooks)) {
        $totalCatalogBooks += count($catBooks);
    }
}

if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__).'/');
    }

// Include Global Site Header
include ABSPATH.'src/header.php';
?>

<link rel="stylesheet"
    href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/library-main.css') : '/assets/css/library-main.css' ?>">

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg" aria-hidden="true">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<!-- REUSABLE LIBRARY SUBNAV -->
<?php 
$currentLibraryPage = 'home';
include __DIR__ . '/library_header_nav.php'; 
?>

<main id="main-content" class="library-main" style="padding-top: 0.5rem;">

<?php if ($isPageMode && $pageData): ?>
    <?php include __DIR__ . '/repository_page.php'; ?>
<?php elseif (!empty($pageSlug)): ?>
    <div class="repo-page-container">
        <header class="repo-hero-card">
            <a href="/library/" class="repo-back-catalog-btn"><i class="fas fa-arrow-left"></i> Return to Library Catalog</a>
            <h1 class="repo-hero-title">Topic Repository In Development</h1>
            <p class="repo-hero-subtitle">The subject repository for "<strong><?= htmlspecialchars($pageSlug) ?></strong>" is currently being curated by the Hesten's Learning academic council.</p>
            <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="/library/index.php?pages=punctuation" class="repo-action-btn primary"><i class="fas fa-book"></i> Explore Master Punctuation Guide</a>
                <a href="/library/" class="repo-action-btn"><i class="fas fa-arrow-left"></i> Browse Digital Library Catalog</a>
            </div>
        </header>
    </div>
<?php else: ?>
    <div class="library-workspace">

        <!-- Panel 1: General Library Landing Page -->
        <div id="main-desk-landing" class="workspace-panel active">

            <!-- Hesten's Learning Library Hero & Dashboard -->
            <section class="slims-opac-hero library-animate-reveal" aria-label="Hesten's Learning Library Search and Dashboard">
                <div class="slims-hero-grid">
                    <!-- Main SLiMS OPAC Search Console -->
                    <div class="slims-opac-banner">

                        <h1 class="slims-opac-title">
                            Hesten's Learning <span class="hero-title-highlight">Library</span>
                        </h1>
                        <p class="slims-opac-desc">
                            Search our digital academic repository of classic literature, historical primary sources, and comprehensive textbooks cataloged with Library of Congress and Dewey Decimal classifications.
                        </p>

                        <!-- SLiMS Unified Search Console -->
                        <div class="slims-search-console" role="search" aria-label="Catalog Search">
                            <div class="slims-search-box-wrap">
                                <!-- Field Scope Selector -->
                                <div class="slims-scope-selector-wrap">
                                    <label for="slims-search-scope" class="sr-only">Search Field</label>
                                    <select id="slims-search-scope" class="slims-scope-select" aria-label="Search Scope">
                                        <option value="all">All Fields</option>
                                        <option value="title">Title</option>
                                        <option value="author">Author</option>
                                        <option value="subject">Subject</option>
                                        <option value="callnumber">Call Number</option>
                                        <option value="isbn">ISBN</option>
                                    </select>
                                    <i class="fas fa-chevron-down slims-scope-arrow" aria-hidden="true"></i>
                                </div>

                                <!-- Input Box -->
                                <div class="slims-input-group">
                                    <input type="text" id="library-search" aria-label="Search Library Catalog"
                                        placeholder="Type keywords (title, author, subject, call number, ISBN)..."
                                        class="slims-main-search-input" autocomplete="off">
                                    <button type="button" id="library-search-clear" class="library-search-clear-btn hidden"
                                        aria-label="Clear search input">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <!-- Instant Search Preview Dropdown Container -->
                                    <div id="library-search-preview-dropdown" class="library-search-preview-dropdown hidden" role="listbox" aria-label="Live Search Suggestions"></div>
                                </div>

                                <!-- Search Action Button -->
                                <button type="button" id="slims-search-action-btn" class="slims-search-btn"
                                    onclick="applyCatalogFilters()" aria-label="Execute Catalog Search">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                    <span>Search Catalog</span>
                                </button>
                            </div>

                            <!-- Quick Topic / Discipline Chips (Trending Searches) & Live Holdings Count -->
                            <div class="slims-trending-chips" role="region" aria-label="Quick Topic Searches">
                                <div class="trending-chips-wrap" role="tablist" aria-label="Popular Catalog Topics">
                                    <span class="slims-trending-label"><i class="fas fa-tags text-primary" aria-hidden="true"></i> Popular Topics:</span>
                                    <button type="button" class="library-chip-btn slims-chip active" data-chip="all" role="tab" aria-selected="true">All</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="fiction" role="tab" aria-selected="false">Fiction</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="us-history" role="tab" aria-selected="false">US History</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="world-history" role="tab" aria-selected="false">World History</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="stem" role="tab" aria-selected="false">STEM &amp; Math</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="science" role="tab" aria-selected="false">Science</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="civics" role="tab" aria-selected="false">Civics</button>
                                    <button type="button" class="library-chip-btn slims-chip" data-chip="saved" role="tab" aria-selected="false">⭐ My Reading List</button>
                                </div>
                                <div class="trending-chips-status" aria-live="polite">
                                    <span class="catalog-live-count-badge" title="Number of books currently displayed">
                                        <i class="fas fa-book-bookmark text-primary" aria-hidden="true"></i>
                                        <span>Showing <strong id="slims-record-count"><?php echo $totalCatalogBooks; ?></strong> titles</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Academic Dashboard Stats & Member Circulation Card -->
                    <div class="hero-academic-dashboard slims-dashboard-card" aria-label="Scholar Circulation Hub">
                        <div class="scholar-circulation-header">
                            <div class="scholar-patron-badge">
                                <div class="scholar-avatar-circle" id="dash-scholar-avatar" aria-hidden="true">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="scholar-patron-info">
                                    <div class="scholar-patron-name-row">
                                        <h2 class="slims-dash-h2" id="dash-scholar-name">Scholar Circulation</h2>
                                        <span class="scholar-grade-badge" id="dash-scholar-grade">Active Patron</span>
                                    </div>
                                    <div class="scholar-id-row">
                                        <span class="scholar-barcode-id" id="dash-scholar-id" title="Library Patron Circulation ID"><i class="fas fa-barcode" aria-hidden="true"></i> HL-SCHOLAR</span>
                                        <span class="scholar-catalog-holdings">Holdings: <span class="highlight-stat"><?php echo $totalCatalogBooks; ?></span> titles</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-stats-grid">
                            <div class="dash-stat-card goal-card" onclick="openGoalModal()" style="cursor: pointer;"
                                title="Set or adjust your daily reading goal" tabindex="0" role="button"
                                aria-label="Daily Reading Goal. Click to adjust target."
                                onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openGoalModal();}">
                                <div class="goal-ring-wrap">
                                    <svg class="goal-ring-svg" viewBox="0 0 40 40" aria-hidden="true">
                                        <circle class="goal-ring-bg" cx="20" cy="20" r="18" fill="none" stroke-width="3"></circle>
                                        <circle id="dash-goal-ring-fill" class="goal-ring-fill" cx="20" cy="20" r="18"
                                            fill="none" stroke-width="3" stroke-dasharray="113.1" stroke-dashoffset="75"></circle>
                                    </svg>
                                    <i class="fas fa-bullseye stat-icon-center" aria-hidden="true"></i>
                                </div>
                                <div class="stat-info">
                                    <span class="stat-value" id="dash-goal-progress">5/15m</span>
                                    <span class="stat-label">Daily Goal <i class="fas fa-pencil-alt opacity-60" style="font-size: 0.65rem;" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="dash-stat-card"
                                onclick="const cf = document.getElementById('category-filter'); if(cf){cf.value='saved'; cf.dispatchEvent(new Event('change')); document.getElementById('library-catalog-container')?.scrollIntoView({behavior:'smooth'});}"
                                style="cursor: pointer;" title="Filter by saved books" tabindex="0" role="button"
                                aria-label="Filter by saved books in reading list"
                                onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault(); const cf = document.getElementById('category-filter'); if(cf){cf.value='saved'; cf.dispatchEvent(new Event('change')); document.getElementById('library-catalog-container')?.scrollIntoView({behavior:'smooth'});}}">
                                <i class="fas fa-bookmark stat-icon" style="color: var(--color-primary);" aria-hidden="true"></i>
                                <div class="stat-info">
                                    <span class="stat-value" id="dash-saved-count">0</span>
                                    <span class="stat-label">Saved</span>
                                </div>
                            </div>
                            <div class="dash-stat-card" onclick="openStudyNotebookModal()" style="cursor: pointer;"
                                title="Open Study Notebook with all highlights" tabindex="0" role="button"
                                aria-label="Open Study Notebook with highlights"
                                onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openStudyNotebookModal();}">
                                <i class="fas fa-highlighter stat-icon" style="color: var(--color-secondary);" aria-hidden="true"></i>
                                <div class="stat-info">
                                    <span class="stat-value" id="dash-highlights-count">0</span>
                                    <span class="stat-label">Highlights</span>
                                </div>
                            </div>
                            <div class="dash-stat-card" onclick="openStudyNotebookModal()" style="cursor: pointer;"
                                title="Open Study Notebook with notes & flashcards" tabindex="0" role="button"
                                aria-label="Open Study Notebook with notes and flashcards"
                                onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openStudyNotebookModal();}">
                                <i class="fas fa-sticky-note stat-icon" style="color: var(--color-warning);" aria-hidden="true"></i>
                                <div class="stat-info">
                                    <span class="stat-value" id="dash-notes-count">0</span>
                                    <span class="stat-label">Study Notes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function updateScholarCardData() {
                    try {
                        const uProfile = JSON.parse(localStorage.getItem('hesten-user-profile')) || {};
                        const nameEl = document.getElementById('dash-scholar-name');
                        const gradeEl = document.getElementById('dash-scholar-grade');
                        const idEl = document.getElementById('dash-scholar-id');
                        const avatarEl = document.getElementById('dash-scholar-avatar');

                        if (nameEl) {
                            nameEl.textContent = uProfile.firstName ? `${uProfile.firstName}'s Circulation` : 'Scholar Circulation';
                        }
                        if (gradeEl) {
                            gradeEl.textContent = uProfile.grade ? (uProfile.grade === 'K' ? 'Kindergarten' : `Grade ${uProfile.grade}`) : 'Active Patron';
                        }
                        if (idEl) {
                            const rawId = (uProfile.id || uProfile.firstName || '2026').toString().toUpperCase().replace(/[^A-Z0-9]/g, '');
                            const idPart = rawId.slice(-4) || '2026';
                            idEl.innerHTML = `<i class="fas fa-barcode" aria-hidden="true"></i> HL-${idPart}`;
                        }
                        if (avatarEl && uProfile.avatarData) {
                            avatarEl.innerHTML = `<img src="${uProfile.avatarData}" alt="" class="scholar-avatar-img">`;
                        }
                    } catch (e) {}

                    // Bookmarks / Saved
                    try {
                        const bookmarks = JSON.parse(localStorage.getItem('hesten_library_bookmarks')) || [];
                        const savedEl = document.getElementById('dash-saved-count');
                        if (savedEl) savedEl.textContent = bookmarks.length;
                    } catch (e) {}

                    // Highlights & Study Notes
                    try {
                        let allHighlights = 0;
                        let allNotes = 0;
                        for (let i = 0; i < localStorage.length; i++) {
                            const key = localStorage.key(i);
                            if (key && key.startsWith('hesten_highlights_')) {
                                try {
                                    const hls = JSON.parse(localStorage.getItem(key)) || [];
                                    allHighlights += hls.length;
                                    hls.forEach(hl => { if (hl.note) allNotes++; });
                                } catch (e) {}
                            }
                        }
                        const hlsEl = document.getElementById('dash-highlights-count');
                        const notesEl = document.getElementById('dash-notes-count');
                        if (hlsEl) hlsEl.textContent = allHighlights;
                        if (notesEl) notesEl.textContent = allNotes;
                    } catch (e) {}
                }

                document.addEventListener("DOMContentLoaded", updateScholarCardData);
                window.addEventListener('hl:profile-updated', updateScholarCardData);
                window.addEventListener('hl:data-sync', updateScholarCardData);
                window.addEventListener('storage', (e) => {
                    if (!e.key || e.key === 'hesten-user-profile' || e.key === 'hesten_library_bookmarks' || e.key.startsWith('hesten_highlights_')) {
                        updateScholarCardData();
                    }
                });
            </script>



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
                <?php foreach ($categories as $categoryName => $books) : ?>
                    <section class="library-row-section library-animate-reveal"
                        data-category="<?php echo htmlspecialchars($categoryName); ?>">
                        <!-- Category Header -->
                        <div class="library-row-header">
                            <h2 class="library-row-title">
                                <?php echo htmlspecialchars($categoryName); ?>
                            </h2>
                            <div class="library-row-controls">
                                <button type="button" class="library-more-resources-btn"
                                    onclick="openCategoryResources('<?php echo htmlspecialchars($categoryName, ENT_QUOTES); ?>')"
                                    aria-label="More resources for <?php echo htmlspecialchars($categoryName); ?>"
                                    title="Explore additional academic resources and primary texts for <?php echo htmlspecialchars($categoryName); ?>">
                                    <i class="fas fa-layer-group" aria-hidden="true"></i>
                                    <span>More Resources</span>
                                </button>
                                <div class="library-scroll-buttons">
                                    <button class="library-scroll-btn scroll-left"
                                        aria-label="Scroll left in <?php echo htmlspecialchars($categoryName); ?>">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="library-scroll-btn scroll-right"
                                        aria-label="Scroll right in <?php echo htmlspecialchars($categoryName); ?>">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Horizontal Scroll / Grid / List Container -->
                        <div class="library-books-row">
                            <?php foreach ($books as $book) :
                                $book['category'] = $categoryName;
                                include __DIR__.'/book_card.php';
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
                    <p class="library-no-results-desc">We couldn't find anything matching your search criteria. Try
                        clearing some filters or searching for something else.</p>
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
                    <!-- Share Desk Button with Hashed Deeplink (#) Code -->
                    <button type="button" id="desk-share-btn" onclick="copyDeskShareLink()"
                        class="library-drawer-share-btn" aria-label="Copy direct link for this research desk"
                        title="Copy direct link to this research desk">
                        <i class="fas fa-link"></i> <span id="desk-share-btn-text">Share Desk</span>
                    </button>
                    <!-- Dedicated Close Button -->
                    <button onclick="closeResourcePortal()" class="library-drawer-close-btn"
                        aria-label="Close Subject Portal" title="Close Subject Portal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </header>

            <!-- Subject Switcher Tabs Bar -->
            <nav class="desk-switcher-bar" aria-label="Switch Subject Research Desk">
                <button type="button" class="desk-switcher-tab" data-desk="General Resources"
                    onclick="openResourcePortal('General Resources')">
                    <i class="fas fa-layer-group"></i> <span>General</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="US History"
                    onclick="openResourcePortal('US History')">
                    <i class="fas fa-university"></i> <span>US History</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="World History"
                    onclick="openResourcePortal('World History')">
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
                <button type="button" class="desk-switcher-tab" data-desk="Science"
                    onclick="openResourcePortal('Science')">
                    <i class="fas fa-atom"></i> <span>Science</span>
                </button>
                <button type="button" class="desk-switcher-tab" data-desk="Civics"
                    onclick="openResourcePortal('Civics')">
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
                                <?php if ($sectionName !== '') : ?>
                                    <div class="drawer-section-header">
                                        <?php echo htmlspecialchars($sectionName); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="drawer-section-grid">
                                    <?php
                                    foreach ($sectionBooks as $book) {
                                        $book['category'] = $categoryName;
                                        include __DIR__.'/book_card.php';
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
                    <p class="drawer-empty-desc">We couldn't find any resources matching your search in this subject
                        desk.</p>
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
<?php endif; ?>

</main>

<?php include __DIR__.'/modals.php'; ?>

<?php if (!$isPageMode): ?>
<script>
    window.DESK_EXTERNAL_LINKS = <?php echo json_encode($deskLinks, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    window.DISCLAIMERS_DATA = <?php echo json_encode($disclaimersData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    window.ALL_LIBRARY_BOOKS = <?php 
        $allBooksCatalogMap = [];
        foreach ($categories as $catName => $bList) {
            foreach ($bList as $bk) {
                $bk['category'] = $catName;
                if (!empty($bk['id'])) {
                    $allBooksCatalogMap[$bk['id']] = $bk;
                }
            }
        }
        echo json_encode($allBooksCatalogMap, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    ?>;

    // Interactive Aurora Parallax
    document.addEventListener('mousemove', (e) => {
        const blobs = document.querySelectorAll('.library-aurora-blob');
        if (!blobs.length) return;
        const x = (e.clientX / window.innerWidth - 0.5) * 30;
        const y = (e.clientY / window.innerHeight - 0.5) * 30;
        blobs.forEach((b, i) => {
            const factor = (i + 1) * 0.35;
            b.style.transform = `translate(${x * factor}px, ${y * factor}px)`;
        });
    });
</script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-bookmarks.js') : '/assets/js/library/lib-bookmarks.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-view-mode-switcher.js') : '/assets/js/library/lib-view-mode-switcher.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-real.js') : '/assets/js/library/lib-real.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-horizontal-carousel-scroll-but.js') : '/assets/js/library/lib-horizontal-carousel-scroll-but.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-continue-reading-shelf.js') : '/assets/js/library/lib-continue-reading-shelf.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-subject-research-desks-navigat.js') : '/assets/js/library/lib-subject-research-desks-navigat.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-book-overview-modal.js') : '/assets/js/library/lib-book-overview-modal.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-explainer.js') : '/assets/js/library/lib-explainer.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-academic-citation-generator.js') : '/assets/js/library/lib-academic-citation-generator.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-inline-lexile-customization.js') : '/assets/js/library/lib-inline-lexile-customization.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-reading-gamification.js') : '/assets/js/library/lib-reading-gamification.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-study-notebook.js') : '/assets/js/library/lib-study-notebook.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-classroom-share.js') : '/assets/js/library/lib-classroom-share.js' ?>"
    defer></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-keyboard-shortcuts.js') : '/assets/js/library/lib-keyboard-shortcuts.js' ?>"
    defer></script>
<?php endif; ?>

<?php include ABSPATH.'src/footer.php'; ?>