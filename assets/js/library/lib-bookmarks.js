/**
 * library/assets/library.js - Digital Library Hub & Research Desks Controller
 * Pure Vanilla ES6+: Fast Fuzzy Search, Multi-Facet Filters, Responsive View Modes,
 * Subject Workspace Portals, Continue Reading Shelf, and Knowledge Modals.
 */



    let disclaimersData = {};
    let activeDeskName = '';
    let bookmarkList = [];
    let currentBookData = null;
    let currentCitationStyle = 'mla';

    // Safe localStorage accessor
    try {
        bookmarkList = JSON.parse(localStorage.getItem('hesten_library_bookmarks') || '[]');
    } catch (e) {
        bookmarkList = [];
    }

    document.addEventListener("DOMContentLoaded", () => {
        applyStoredLexileOverrides();
        setupScrollButtons();
        setupFilters();
        loadDisclaimers();
        setupSidebarToggle();
        setupProgressBars();
        setupLexileEditing();
        initBookmarks();
        initContinueReadingShelf();
        initViewSwitcher();
        setupKeyboardShortcuts();
    });

    /* ==========================================================================
       1. Bookmarks & Favorites
       ========================================================================== */
    function initBookmarks() {
        syncBookmarkIcons();
    }

    function syncBookmarkIcons() {
        document.querySelectorAll('.library-book-card').forEach(card => {
            const id = card.dataset.id;
            const btn = card.querySelector('.library-book-bookmark-btn i');
            if (id && btn) {
                if (bookmarkList.includes(id)) {
                    btn.className = 'fas fa-star';
                    btn.parentElement.classList.add('bookmarked');
                } else {
                    btn.className = 'far fa-star';
                    btn.parentElement.classList.remove('bookmarked');
                }
            }
        });
    }

    window.toggleBookmark = function (e, bookId) {
        if (e) e.stopPropagation();
        if (!bookId) return;

        const idx = bookmarkList.indexOf(bookId);
        if (idx > -1) {
            bookmarkList.splice(idx, 1);
        } else {
            bookmarkList.push(bookId);
        }

        try {
            localStorage.setItem('hesten_library_bookmarks', JSON.stringify(bookmarkList));
        } catch (err) {}

        syncBookmarkIcons();

        // Update modal bookmark button if open
        const modalBtn = document.getElementById('modal-bookmark-btn');
        if (modalBtn && window.currentBookId === bookId) {
            const isSaved = bookmarkList.includes(bookId);
            modalBtn.innerHTML = isSaved ? '<i class="fas fa-star"></i> <span>Saved to List</span>' : '<i class="far fa-star"></i> <span>Save to List</span>';
            modalBtn.classList.toggle('active', isSaved);
        }

        // Re-filter if on "My Reading List"
        const catFilter = document.getElementById('category-filter');
        if (catFilter && catFilter.value === 'saved') {
            applyCatalogFilters();
        }
    };

    window.toggleModalBookmark = function () {
        if (window.currentBookId) {
            window.toggleBookmark(null, window.currentBookId);
        }
    };
