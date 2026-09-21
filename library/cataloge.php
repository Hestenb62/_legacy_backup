<?php
/**
 * library/cataloge.php - Master Library Catalog & Call Number Index
 * Scholarly catalog indexing every volume across Hesten's Learning platform
 * by Library of Congress call numbers, subjects, reading levels, and authors.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// --- Page-Specific SEO & Meta Variables ---
$pageTitle = 'Master Book Catalog & Call Number Index - Hesten\'s Learning';
$pageDescription = 'Browse, search, and locate every volume in the Hesten\'s Learning archive cataloged by Library of Congress call numbers, subjects, and authors.';
$pageKeywords = 'library catalog, call numbers, Library of Congress, book index, master bibliography, primary sources, textbooks';
$pageAuthor = 'Hesten\'s Learning';

// --- Load Book Data from both Repositories ---
$bookdJsonPath = __DIR__ . '/assets/bookd.json';
$drawerJsonPath = __DIR__ . '/assets/edu-side-drawer.json';

$bookdCategories = is_file($bookdJsonPath) ? (json_decode(file_get_contents($bookdJsonPath), true) ?: []) : [];
$drawerCategories = is_file($drawerJsonPath) ? (json_decode(file_get_contents($drawerJsonPath), true) ?: []) : [];

// Merge and deduplicate all books
$allBooks = [];
$categorySet = [];

foreach ($bookdCategories as $cat => $books) {
    if (!is_array($books)) continue;
    $categorySet[$cat] = true;
    foreach ($books as $b) {
        $id = $b['id'] ?? '';
        if (!$id) continue;
        $b['category'] = $cat;
        $allBooks[$id] = $b;
    }
}

foreach ($drawerCategories as $cat => $books) {
    if (!is_array($books)) continue;
    $categorySet[$cat] = true;
    foreach ($books as $b) {
        $id = $b['id'] ?? '';
        if (!$id) continue;
        if (!isset($allBooks[$id])) {
            $b['category'] = $cat;
            $allBooks[$id] = $b;
        } else {
            $allBooks[$id] = array_merge($b, $allBooks[$id]);
        }
    }
}

// Ensure Call Numbers and Sort by Call Number initially
$catalogBooks = array_values($allBooks);
usort($catalogBooks, function ($a, $b) {
    $callA = $a['call_number'] ?? '';
    $callB = $b['call_number'] ?? '';
    return strnatcasecmp($callA, $callB);
});

// Calculate statistics
$totalVolumes = count($catalogBooks);
$primarySourcesCount = 0;
$textbooksCount = 0;
$classCounts = [];

foreach ($catalogBooks as $bk) {
    $sec = strtolower($bk['section'] ?? '');
    if (strpos($sec, 'primary') !== false) {
        $primarySourcesCount++;
    } elseif (strpos($sec, 'text') !== false) {
        $textbooksCount++;
    }
    
    $call = $bk['call_number'] ?? '';
    preg_match('/^[A-Z]+/i', $call, $matches);
    $cls = strtoupper($matches[0] ?? 'MISC');
    $classCounts[$cls] = ($classCounts[$cls] ?? 0) + 1;
}

// Current page indicator for navigation
$currentLibraryPage = 'cataloge';

// Include Global Site Header
include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/library-main.css') : '/assets/css/library-main.css' ?>">

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg" aria-hidden="true">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<!-- REUSABLE LIBRARY SUBNAV -->
<?php include __DIR__ . '/library_header_nav.php'; ?>

<main id="main-content" class="library-main" style="padding-top: 0.5rem;">
    <div class="library-workspace" style="max-width: 1360px; margin: 0 auto; padding: 0 1.25rem;">

        <!-- Master Catalog Header Hero -->
        <header class="catalog-page-hero library-animate-reveal">
            <div class="catalog-hero-card">
                <div class="catalog-hero-top">
                    <div class="catalog-title-group">
                        <div class="hero-pill" style="margin-bottom: 0.85rem;">
                            <span class="hero-ping-dot">
                                <span class="ping-anim"></span>
                                <span class="ping-core"></span>
                            </span>
                            <span>Standard Academic Index</span>
                        </div>
                        <h1>Master Catalog &amp; <span class="hero-title-highlight">Call Number Index</span></h1>
                        <p>Search, reference, and locate every volume in the Hesten's Learning digital repository. Systematically indexed by Library of Congress Classification (LCC) call numbers, reading levels, and academic subject disciplines.</p>
                    </div>
                    <div class="catalog-stats-badges" role="region" aria-label="Catalog Collection Metrics">
                        <div class="catalog-stat-pill">
                            <span class="stat-num" id="stat-total-volumes"><?= $totalVolumes ?></span>
                            <span class="stat-label">Volumes</span>
                        </div>
                        <div class="catalog-stat-pill">
                            <span class="stat-num"><?= count($classCounts) ?></span>
                            <span class="stat-label">LCC Classes</span>
                        </div>
                        <div class="catalog-stat-pill">
                            <span class="stat-num"><?= $primarySourcesCount ?></span>
                            <span class="stat-label">Charters</span>
                        </div>
                        <div class="catalog-stat-pill">
                            <span class="stat-num"><?= $textbooksCount ?></span>
                            <span class="stat-label">Textbooks</span>
                        </div>
                    </div>
                </div>

                <!-- Call Number Anatomy Explainer Banner -->
                <div class="call-anatomy-box" role="note" aria-label="How Call Numbers Work">
                    <div class="call-anatomy-content">
                        <div class="call-anatomy-sample" id="sample-call-badge" title="Example Library of Congress Call Number">
                            PR6029.R8 N56 1949
                        </div>
                        <div class="call-anatomy-breakdown">
                            <span class="call-tag"><i class="fas fa-layer-group text-indigo-500"></i> <strong>PR:</strong> English Literature</span>
                            <span class="call-tag"><i class="fas fa-user-pen text-blue-500"></i> <strong>.R8:</strong> Orwell (Cutter)</span>
                            <span class="call-tag"><i class="fas fa-book text-emerald-500"></i> <strong>N56:</strong> 1984 (Title)</span>
                            <span class="call-tag"><i class="fas fa-calendar text-amber-500"></i> <strong>1949:</strong> Pub Year</span>
                        </div>
                    </div>
                    <div>
                        <a href="/library/how-to.php#call-numbers" class="btn-premium btn-secondary" style="padding: 0.45rem 0.95rem; font-size: 0.82rem;">
                            <i class="fas fa-circle-question"></i> <span>Call # Guide</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search & Control Toolbar -->
        <section class="catalog-toolbar-grid" aria-label="Catalog Filtering and View Options">
            <!-- Search Input -->
            <div class="library-search-input-container" style="min-width: 0;">
                <input type="text" id="catalog-search" 
                       placeholder="Search call # (e.g. PR6029), title, author, ISBN..." 
                       class="library-search-input library-glass-shine"
                       aria-label="Search Master Catalog">
                <i class="fas fa-search library-search-icon" aria-hidden="true"></i>
                <button type="button" id="catalog-search-clear" class="library-search-clear-btn hidden" aria-label="Clear search">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Category Filter Dropdown -->
            <div class="library-filter-select-container">
                <select id="catalog-category-select" class="library-category-select library-glass-shine" aria-label="Filter by Category">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categorySet) as $catName): ?>
                        <option value="<?= htmlspecialchars($catName) ?>"><?= htmlspecialchars($catName) ?></option>
                    <?php endforeach; ?>
                </select>
                <i class="fas fa-filter library-filter-icon" aria-hidden="true"></i>
            </div>

            <!-- Sort By Dropdown -->
            <div class="library-filter-select-container">
                <select id="catalog-sort-select" class="library-category-select library-glass-shine" aria-label="Sort Catalog Items">
                    <option value="call-asc">Call # (A &rarr; Z)</option>
                    <option value="call-desc">Call # (Z &rarr; A)</option>
                    <option value="title-asc">Title (A &rarr; Z)</option>
                    <option value="title-desc">Title (Z &rarr; A)</option>
                    <option value="date-asc">Date (Oldest First)</option>
                    <option value="date-desc">Date (Newest First)</option>
                    <option value="author-asc">Author (A &rarr; Z)</option>
                </select>
                <i class="fas fa-arrow-down-a-z library-filter-icon" aria-hidden="true"></i>
            </div>

            <!-- View Toggle Switcher (Table Ledger vs Shelf Cards) -->
            <div class="catalog-view-toggle" role="radiogroup" aria-label="Display View">
                <button type="button" id="btn-view-table" class="view-toggle-btn active" role="radio" aria-checked="true" title="Academic Ledger Table View">
                    <i class="fas fa-table-list" aria-hidden="true"></i> <span>Ledger</span>
                </button>
                <button type="button" id="btn-view-grid" class="view-toggle-btn" role="radio" aria-checked="false" title="Virtual Card Shelf View">
                    <i class="fas fa-grip" aria-hidden="true"></i> <span>Cards</span>
                </button>
            </div>
        </section>

        <!-- Live Status Bar -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; font-size: 0.88rem; color: var(--color-text-muted);">
            <div>
                Showing <strong id="catalog-visible-count" style="color: var(--color-primary);"><?= $totalVolumes ?></strong> of <?= $totalVolumes ?> cataloged volumes
            </div>
            <div id="catalog-active-filter-badge" class="hidden" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.82rem; background: rgba(79, 70, 229, 0.1); color: var(--color-primary); padding: 0.2rem 0.65rem; border-radius: 9999px;">
                <span id="active-filter-text">Filtered</span>
                <button type="button" id="catalog-reset-filters" style="background: none; border: none; color: inherit; cursor: pointer; padding: 0;" aria-label="Reset filters">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- 1. ACADEMIC LEDGER TABLE VIEW -->
        <div id="catalog-table-view" class="catalog-ledger-table-wrap">
            <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                <table class="catalog-ledger-table" id="master-catalog-table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 210px;">Call Number</th>
                            <th scope="col">Title &amp; Work</th>
                            <th scope="col" style="width: 190px;">Author</th>
                            <th scope="col" style="width: 95px;">Year</th>
                            <th scope="col" style="width: 140px;">Discipline</th>
                            <th scope="col" style="width: 110px;">Lexile</th>
                            <th scope="col" style="width: 170px; text-align: right;">Access</th>
                        </tr>
                    </thead>
                    <tbody id="catalog-table-body">
                        <?php foreach ($catalogBooks as $book): 
                            $bookId = $book['id'] ?? '';
                            $bookTitle = $book['title'] ?? 'Untitled';
                            $bookAuthor = $book['author'] ?? 'Unknown Author';
                            $bookCall = $book['call_number'] ?? 'N/A';
                            $bookDate = $book['date'] ?? '';
                            $bookYear = (!empty($bookDate) && $bookDate !== '#') ? substr($bookDate, 0, 4) : '&mdash;';
                            $bookCat = $book['category'] ?? 'General';
                            $bookLexile = $book['lexile'] ?? '&mdash;';
                            $bookImg = !empty($book['img']) ? $book['img'] : ($book['fallback-img'] ?? 'https://placehold.co/100x150/1e293b/ffffff?text=' . urlencode($bookTitle));
                            $readLink = $book['read-online-link'] ?? '#';
                            $hasOnlineReader = ($readLink !== '#' && !empty($readLink));
                        ?>
                            <tr class="catalog-ledger-row" 
                                data-id="<?= htmlspecialchars($bookId) ?>"
                                data-call="<?= htmlspecialchars($bookCall) ?>"
                                data-title="<?= htmlspecialchars(strtolower($bookTitle)) ?>"
                                data-author="<?= htmlspecialchars(strtolower($bookAuthor)) ?>"
                                data-category="<?= htmlspecialchars($bookCat) ?>"
                                data-year="<?= htmlspecialchars($bookYear) ?>"
                                data-isbn="<?= htmlspecialchars($book['isbn'] ?? '') ?>">
                                <td>
                                    <div class="call-cell-badge">
                                        <i class="fas fa-barcode" style="color: var(--color-primary); font-size: 0.85rem;" aria-hidden="true"></i>
                                        <span><?= htmlspecialchars($bookCall) ?></span>
                                        <button type="button" class="call-copy-btn" 
                                                onclick="copyCallNumber('<?= htmlspecialchars(addslashes($bookCall)) ?>', this)" 
                                                title="Copy call number to clipboard"
                                                aria-label="Copy call number <?= htmlspecialchars($bookCall) ?>">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-book-title-cell">
                                        <img src="<?= htmlspecialchars($bookImg) ?>" 
                                             alt="Cover thumbnail of <?= htmlspecialchars($bookTitle) ?>" 
                                             class="table-book-thumb" 
                                             loading="lazy" 
                                             onerror="this.src='https://placehold.co/100x150/1e293b/ffffff?text=Book';">
                                        <div>
                                            <a href="<?= $hasOnlineReader ? htmlspecialchars($readLink) : 'javascript:void(0)' ?>" 
                                               class="table-book-title-text"
                                               <?php if (!$hasOnlineReader): ?> onclick="openCatalogModalById('<?= htmlspecialchars($bookId) ?>')" <?php endif; ?>>
                                                <?= htmlspecialchars($bookTitle) ?>
                                            </a>
                                            <?php if (!empty($book['isbn'])): ?>
                                                <div style="font-size: 0.75rem; color: var(--color-text-muted); font-family: monospace;">
                                                    ISBN: <?= htmlspecialchars($book['isbn']) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span style="font-weight: 600;"><?= htmlspecialchars($bookAuthor) ?></span>
                                </td>
                                <td>
                                    <span><?= $bookYear ?></span>
                                </td>
                                <td>
                                    <span class="library-book-badge-grade" style="position: static; display: inline-flex; font-size: 0.72rem; padding: 0.2rem 0.55rem;">
                                        <?= htmlspecialchars($bookCat) ?>
                                    </span>
                                </td>
                                <td>
                                    <span style="font-family: monospace; font-size: 0.82rem; font-weight: 600;">
                                        <?= htmlspecialchars($bookLexile) ?>
                                    </span>
                                </td>
                                <td style="text-align: right;">
                                    <div class="table-action-btns" style="justify-content: flex-end;">
                                        <?php if ($hasOnlineReader): ?>
                                            <a href="<?= htmlspecialchars($readLink) ?>" class="btn-table-action btn-table-read" title="Read Online">
                                                <i class="fas fa-book-open"></i> <span>Read</span>
                                            </a>
                                        <?php endif; ?>
                                        <button type="button" class="btn-table-action btn-table-info" 
                                                onclick="openCatalogModalById('<?= htmlspecialchars($bookId) ?>')" 
                                                title="View Volume Overview">
                                            <i class="fas fa-circle-info"></i> <span>Info</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 2. VIRTUAL CARD SHELF VIEW (Hidden by default, toggled via switcher) -->
        <div id="catalog-cards-view" class="hidden" style="margin-bottom: 2.5rem;">
            <div class="library-grid-shelf" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.5rem;">
                <?php foreach ($catalogBooks as $book): ?>
                    <?php include __DIR__ . '/book_card.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Empty Results Message -->
        <div id="catalog-empty-state" class="hidden" style="text-align: center; padding: 4rem 1.5rem; background: var(--glass-bg); border-radius: var(--radius-2xl); border: 1px dashed var(--glass-border); margin-bottom: 3rem;">
            <i class="fas fa-magnifying-glass" style="font-size: 3rem; color: var(--color-text-muted); opacity: 0.4; margin-bottom: 1rem;"></i>
            <h3 style="font-size: 1.4rem; font-weight: 800; margin-bottom: 0.5rem;">No Cataloged Books Found</h3>
            <p style="color: var(--color-text-muted); max-width: 480px; margin: 0 auto 1.5rem auto;">No volumes match your current search query or filter combination. Try adjusting your search term or selecting All Classes.</p>
            <button type="button" onclick="resetCatalogFilters()" class="btn-premium btn-primary">
                <i class="fas fa-rotate-left"></i> <span>Reset Filters</span>
            </button>
        </div>

    </div>
</main>

<!-- Copy Toast Notification Container -->
<div id="call-copy-toast" style="position: fixed; bottom: 2rem; right: 2rem; z-index: 1000; background: #0f172a; color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.4); border-radius: 0.75rem; padding: 0.75rem 1.25rem; font-weight: 600; font-size: 0.9rem; box-shadow: 0 10px 25px rgba(0,0,0,0.5); display: flex; align-items: center; gap: 0.6rem; transform: translateY(150%); transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);" role="status" aria-live="polite">
    <i class="fas fa-check-circle text-emerald-400"></i>
    <span id="call-copy-toast-msg">Call number copied to clipboard!</span>
</div>

<!-- Modal Includes -->
<?php include __DIR__ . '/modals.php'; ?>

<!-- Client-side Interactive Logic -->
<script>
    // Copy Call Number Helper
    function copyCallNumber(callNum, btn) {
        if (!navigator.clipboard) {
            const temp = document.createElement('input');
            temp.value = callNum;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);
        } else {
            navigator.clipboard.writeText(callNum);
        }

        const toast = document.getElementById('call-copy-toast');
        const msg = document.getElementById('call-copy-toast-msg');
        if (toast && msg) {
            msg.textContent = `Call # "${callNum}" copied!`;
            toast.style.transform = 'translateY(0)';
            setTimeout(() => {
                toast.style.transform = 'translateY(150%)';
            }, 2500);
        }

        if (btn) {
            const icon = btn.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-check text-emerald-500';
                setTimeout(() => { icon.className = 'far fa-copy'; }, 1500);
            }
        }
    }

    // Open Modal by Book ID from Table Row
    function openCatalogModalById(bookId) {
        // Try finding card in cards view
        const card = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
        if (card && typeof openModal === 'function') {
            openModal(card);
        }
    }

    // Interactive Filter & Sort Engine for Master Catalog
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('catalog-search');
        const clearBtn = document.getElementById('catalog-search-clear');
        const categorySelect = document.getElementById('catalog-category-select');
        const sortSelect = document.getElementById('catalog-sort-select');
        const classChips = document.querySelectorAll('.catalog-class-chip');
        const tableBody = document.getElementById('catalog-table-body');
        const tableRows = Array.from(document.querySelectorAll('.catalog-ledger-row'));
        const cardsContainer = document.querySelector('#catalog-cards-view .library-grid-shelf');
        const bookCards = Array.from(document.querySelectorAll('#catalog-cards-view .library-book-card'));
        const visibleCountEl = document.getElementById('catalog-visible-count');
        const emptyState = document.getElementById('catalog-empty-state');
        const tableView = document.getElementById('catalog-table-view');
        const cardsView = document.getElementById('catalog-cards-view');
        const btnViewTable = document.getElementById('btn-view-table');
        const btnViewGrid = document.getElementById('btn-view-grid');
        const activeFilterBadge = document.getElementById('catalog-active-filter-badge');
        const resetFiltersBtn = document.getElementById('catalog-reset-filters');

        let activeClassFilter = 'all';

        // View Mode Switcher
        function setViewMode(mode) {
            if (mode === 'grid') {
                tableView.classList.add('hidden');
                cardsView.classList.remove('hidden');
                btnViewGrid.classList.add('active');
                btnViewGrid.setAttribute('aria-checked', 'true');
                btnViewTable.classList.remove('active');
                btnViewTable.setAttribute('aria-checked', 'false');
                localStorage.setItem('hesten_catalog_view_mode', 'grid');
            } else {
                tableView.classList.remove('hidden');
                cardsView.classList.add('hidden');
                btnViewTable.classList.add('active');
                btnViewTable.setAttribute('aria-checked', 'true');
                btnViewGrid.classList.remove('active');
                btnViewGrid.setAttribute('aria-checked', 'false');
                localStorage.setItem('hesten_catalog_view_mode', 'table');
            }
        }

        const savedMode = localStorage.getItem('hesten_catalog_view_mode') || 'table';
        setViewMode(savedMode);

        btnViewTable.addEventListener('click', () => setViewMode('table'));
        btnViewGrid.addEventListener('click', () => setViewMode('grid'));

        // Class Chip selection
        classChips.forEach(chip => {
            chip.addEventListener('click', () => {
                classChips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
                activeClassFilter = chip.dataset.class;
                applyFilters();
            });
        });

        // Filter and Search Evaluation
        function applyFilters() {
            const query = (searchInput.value || '').trim().toLowerCase();
            const selectedCategory = categorySelect.value;
            clearBtn.classList.toggle('hidden', query.length === 0);

            let visibleCount = 0;
            const isFiltered = query.length > 0 || selectedCategory !== 'all' || activeClassFilter !== 'all';
            activeFilterBadge.classList.toggle('hidden', !isFiltered);

            // Filter Table Rows
            tableRows.forEach(row => {
                const call = (row.dataset.call || '').toUpperCase();
                const title = row.dataset.title || '';
                const author = row.dataset.author || '';
                const cat = row.dataset.category || '';
                const isbn = (row.dataset.isbn || '').toLowerCase();
                const year = row.dataset.year || '';

                // Check Class Filter
                let matchesClass = true;
                if (activeClassFilter !== 'all') {
                    if (activeClassFilter === 'HD') {
                        matchesClass = call.startsWith('HD') || call.startsWith('H');
                    } else if (activeClassFilter === 'J') {
                        matchesClass = call.startsWith('J') || call.startsWith('JK');
                    } else if (activeClassFilter === 'KF') {
                        matchesClass = call.startsWith('KF') || call.startsWith('K');
                    } else if (activeClassFilter === 'P') {
                        matchesClass = call.startsWith('P') || call.startsWith('PR') || call.startsWith('PS') || call.startsWith('PE');
                    } else if (activeClassFilter === 'Q') {
                        matchesClass = call.startsWith('Q') || call.startsWith('QA') || call.startsWith('QB') || call.startsWith('QC') || call.startsWith('QH');
                    } else {
                        matchesClass = call.startsWith(activeClassFilter);
                    }
                }

                // Check Category Filter
                let matchesCategory = (selectedCategory === 'all' || cat === selectedCategory);

                // Check Text Query
                let matchesQuery = true;
                if (query) {
                    matchesQuery = call.toLowerCase().includes(query) ||
                                   title.includes(query) ||
                                   author.includes(query) ||
                                   isbn.includes(query) ||
                                   year.includes(query) ||
                                   cat.toLowerCase().includes(query);
                }

                const visible = matchesClass && matchesCategory && matchesQuery;
                row.style.display = visible ? '' : 'none';
                if (visible) visibleCount++;
            });

            // Filter Corresponding Book Cards
            bookCards.forEach(card => {
                const id = card.dataset.id;
                const matchingRow = tableRows.find(r => r.dataset.id === id);
                if (matchingRow) {
                    card.style.display = matchingRow.style.display;
                }
            });

            if (visibleCountEl) visibleCountEl.textContent = visibleCount;
            if (emptyState) emptyState.classList.toggle('hidden', visibleCount > 0);
            if (tableView) tableView.classList.toggle('hidden', savedMode === 'grid' || visibleCount === 0);
            if (cardsView) cardsView.classList.toggle('hidden', savedMode === 'table' || visibleCount === 0);
        }

        // Sorting
        function applySort() {
            const sortMode = sortSelect.value;
            
            tableRows.sort((a, b) => {
                switch (sortMode) {
                    case 'call-asc':
                        return (a.dataset.call || '').localeCompare(b.dataset.call || '', undefined, { numeric: true, sensitivity: 'base' });
                    case 'call-desc':
                        return (b.dataset.call || '').localeCompare(a.dataset.call || '', undefined, { numeric: true, sensitivity: 'base' });
                    case 'title-asc':
                        return (a.dataset.title || '').localeCompare(b.dataset.title || '');
                    case 'title-desc':
                        return (b.dataset.title || '').localeCompare(a.dataset.title || '');
                    case 'author-asc':
                        return (a.dataset.author || '').localeCompare(b.dataset.author || '');
                    case 'date-asc':
                        return (parseInt(a.dataset.year, 10) || 9999) - (parseInt(b.dataset.year, 10) || 9999);
                    case 'date-desc':
                        return (parseInt(b.dataset.year, 10) || 0) - (parseInt(a.dataset.year, 10) || 0);
                    default:
                        return 0;
                }
            });

            // Re-append sorted rows to table body
            tableRows.forEach(row => tableBody.appendChild(row));

            // Re-append cards in matching order
            tableRows.forEach(row => {
                const card = bookCards.find(c => c.dataset.id === row.dataset.id);
                if (card && cardsContainer) cardsContainer.appendChild(card);
            });
        }

        // Event Listeners
        searchInput.addEventListener('input', applyFilters);
        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            applyFilters();
            searchInput.focus();
        });
        categorySelect.addEventListener('change', applyFilters);
        sortSelect.addEventListener('change', () => {
            applySort();
            applyFilters();
        });

        window.resetCatalogFilters = function() {
            searchInput.value = '';
            categorySelect.value = 'all';
            sortSelect.value = 'call-asc';
            activeClassFilter = 'all';
            classChips.forEach(c => c.classList.toggle('active', c.dataset.class === 'all'));
            applySort();
            applyFilters();
        };

        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', window.resetCatalogFilters);
        }
    });
</script>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-bookmarks.js') : '/assets/js/library/lib-bookmarks.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-book-overview-modal.js') : '/assets/js/library/lib-book-overview-modal.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-academic-citation-generator.js') : '/assets/js/library/lib-academic-citation-generator.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-study-notebook.js') : '/assets/js/library/lib-study-notebook.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-keyboard-shortcuts.js') : '/assets/js/library/lib-keyboard-shortcuts.js' ?>" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>
