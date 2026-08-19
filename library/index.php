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

// --- General Book Data Array ---
$jsonString = file_get_contents(__DIR__ . '/bookd.json');
$categories = json_decode($jsonString, true) ?: [];

// --- Drawer Academic Data Array ---
$drawerJsonString = file_get_contents(__DIR__ . '/edu-side-drawer.json');
$drawerCategories = json_decode($drawerJsonString, true) ?: [];

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<main id="main-content" class="library-main" style="display: flex; gap: 2rem; position: relative;">

    <!-- Collapsible left sidebar for resource desks -->
    <aside id="library-sidebar" class="library-sidebar collapsed">
        <ul class="sidebar-menu">
            <li class="sidebar-item" title="US History">
                <button onclick="openResourcePortal('US History')" class="sidebar-item-btn">
                    <i class="fas fa-university"></i>
                    <span class="sidebar-label">US History</span>
                </button>
            </li>
            <li class="sidebar-item" title="World History">
                <button onclick="openResourcePortal('World History')" class="sidebar-item-btn">
                    <i class="fas fa-globe-americas"></i>
                    <span class="sidebar-label">World History</span>
                </button>
            </li>
            <li class="sidebar-item" title="WW1">
                <button onclick="openResourcePortal('WW1')" class="sidebar-item-btn">
                    <i class="fas fa-shield-halved"></i>
                    <span class="sidebar-label">WW1</span>
                </button>
            </li>
            <li class="sidebar-item" title="WW2">
                <button onclick="openResourcePortal('WW2')" class="sidebar-item-btn">
                    <i class="fas fa-award"></i>
                    <span class="sidebar-label">WW2</span>
                </button>
            </li>
            <li class="sidebar-item" title="Math">
                <button onclick="openResourcePortal('Math')" class="sidebar-item-btn">
                    <i class="fas fa-calculator"></i>
                    <span class="sidebar-label">Math</span>
                </button>
            </li>
            <li class="sidebar-item" title="ELA">
                <button onclick="openResourcePortal('ELA')" class="sidebar-item-btn">
                    <i class="fas fa-spell-check"></i>
                    <span class="sidebar-label">ELA</span>
                </button>
            </li>
        </ul>
        <button id="sidebar-toggle" class="sidebar-toggle-btn" aria-label="Toggle Sidebar">
            <i class="fas fa-chevron-right"></i>
        </button>
    </aside>

    <div class="library-workspace" style="flex-grow: 1; min-width: 0;">

        <!-- Top Sub-Navigation Tabs (Below Main Nav Bar) -->
        <div class="library-tabs-row library-animate-reveal" style="animation-delay: 0.05s; display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; margin-bottom: 2.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--color-border); width: 100%;">
        <button onclick="switchLibraryTab('all')" class="library-tab-btn active-tab" data-tab-id="all">
            All Items
        </button>
        <button onclick="switchLibraryTab('Classic Fiction')" class="library-tab-btn" data-tab-id="Classic Fiction">
            📚 Classic Fiction
        </button>
        <button onclick="switchLibraryTab('Fantasy & Sci-Fi')" class="library-tab-btn" data-tab-id="Fantasy & Sci-Fi">
            🌌 Fantasy & Sci-Fi
        </button>
    </div>

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
                <input type="text" id="library-search" aria-label="Search Library" placeholder="Search title, author, or ISBN..." class="library-search-input library-glass-shine">
                <i class="fas fa-search library-search-icon"></i>
            </div>

            <div class="library-filter-select-container">
                <select id="category-filter" aria-label="Select Category" class="library-category-select library-glass-shine">
                    <option value="all">All Categories</option>
                    <option value="Primary Documents">US Primary Docs</option>
                    <option value="other">Other Docs</option>
                    <?php foreach (array_keys($categories) as $cat): ?>
                        <?php if ($cat !== 'Primary Documents'): ?>
                            <option value="<?php echo htmlspecialchars($cat); ?>"><?php echo htmlspecialchars($cat); ?></option>
                        <?php endif; ?>
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
                    <?php foreach ($books as $book): 
                        $book['category'] = $categoryName;
                        include 'book_card.php';
                    endforeach; ?>
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

    </div> <!-- Close library-content-container -->
    </div> <!-- Close library-workspace -->

    <!-- Full-Screen Resource Portal Drawer (Slides in on category selection) -->
    <div id="resource-portal-drawer" class="library-drawer hidden" style="position: fixed; inset: 0; z-index: 2500; background-color: var(--color-bg-base); display: flex; flex-direction: column; opacity: 0; pointer-events: none; transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.16, 1, 0.3, 1); transform: translateX(100%);">
        
        <!-- Drawer Header Bar -->
        <header class="library-drawer-header" style="padding: 1.5rem 2.5rem; border-bottom: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; background-color: var(--color-content-bg); box-shadow: var(--shadow-sm); z-index: 10; flex-shrink: 0; flex-wrap: wrap; gap: 1rem;">
            <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                <button onclick="closeResourcePortal()" class="library-disclaimer-action-btn" style="background-color: transparent; border: 1px solid var(--color-border); color: var(--color-text-default); padding: 0.5rem 1.25rem; border-radius: var(--radius-md); font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-arrow-left"></i> Back to Desk
                </button>
                <div>
                    <h2 id="drawer-title" style="margin: 0; font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.6rem; font-weight: 900; color: var(--color-text-default);">Subject Guide</h2>
                    <p id="drawer-subtitle" style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--color-text-muted);"></p>
                </div>
            </div>
            
            <!-- Controls row (Search & Sort inside drawer) -->
            <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                <!-- Drawer Search -->
                <div class="library-search-input-container" style="margin: 0; width: 280px; height: 2.25rem; position: relative;">
                    <input type="text" id="drawer-search" oninput="filterDrawerBooks()" placeholder="Search in this desk..." class="library-search-input" style="height: 100%; font-size: 0.85rem; padding-left: 2.5rem; width: 100%; border-radius: var(--radius-md); border: 1px solid var(--color-border); background-color: var(--color-base-bg); color: var(--color-text-default); outline: none;">
                    <i class="fas fa-search library-search-icon" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); font-size: 0.85rem; color: var(--color-text-muted);"></i>
                </div>
                
                <!-- Drawer Sort -->
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <select id="drawer-sort" onchange="sortDrawerBooks()" class="library-sort-select library-glass-shine" style="padding: 0.4rem 1.5rem 0.4rem 0.75rem; font-size: 0.85rem; font-weight: 700; border-radius: var(--radius-md); background-color: var(--color-content-bg); border: 1px solid var(--color-border); color: var(--color-text-default); cursor: pointer; outline: none; height: 2.25rem;">
                        <option value="title">Title (A-Z)</option>
                        <option value="ddc">Call Number (DDC)</option>
                        <option value="lexile">Reading Level (Lexile)</option>
                        <option value="date">Publication Date</option>
                    </select>
                </div>

                <!-- Dedicated X Close Button -->
                <button onclick="closeResourcePortal()" class="library-drawer-close-btn" aria-label="Close Subject Portal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </header>

        <!-- Drawer Content Area -->
        <div class="library-drawer-content" style="flex-grow: 1; overflow-y: auto; padding: 3rem 2.5rem; box-sizing: border-box; background: linear-gradient(135deg, rgba(255,255,255,0.02), transparent);">
            
            <div style="margin-bottom: 2rem; border-bottom: 1px solid var(--color-border); padding-bottom: 1rem; max-width: 1400px; margin-left: auto; margin-right: auto; text-align: left;">
                <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-text-secondary); text-transform: uppercase; letter-spacing: 0.1em;">Subject Holdings</span>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--color-text-secondary); margin: 0.25rem 0 0 0;">
                    Showing <span id="drawer-count" style="color: var(--color-primary);">0</span> references
                </h3>
            </div>

            <div id="drawer-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; max-width: 1400px; margin: 0 auto;">
                <?php 
                // Render all books in a single catalog grid inside the drawer wrapper
                foreach ($drawerCategories as $categoryName => $books) {
                    foreach ($books as $book) {
                        $book['category'] = $categoryName;
                        include 'book_card.php';
                    }
                }
                ?>
            </div>
            
            <!-- Local Drawer Empty State -->
            <div id="drawer-empty" style="display: none; text-align: center; padding: 4rem 2rem;">
                <i class="fas fa-search" style="font-size: 3rem; color: var(--color-text-muted); opacity: 0.3; margin-bottom: 1rem;"></i>
                <h3 style="font-size: 1.25rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-default);">No items found</h3>
                <p style="font-size: 0.9rem; color: var(--color-text-muted); margin: 0;">We couldn't find any resources in this subject.</p>
            </div>
        </div>
    </div>

</main>

<link rel="stylesheet" href="library.css">
<?php include __DIR__ . '/modals.php'; ?>
<script src="library.js" defer></script>

<?php include '../src/footer.php'; ?>