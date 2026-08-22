/**
 * library/assets/library.js - Digital Library Hub & Research Desks Controller
 * Pure Vanilla ES6+: Fast Fuzzy Search, Multi-Facet Filters, Responsive View Modes,
 * Subject Workspace Portals, Continue Reading Shelf, and Knowledge Modals.
 */

(function () {
    'use strict';

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
            modalBtn.innerHTML = isSaved ? '<i class="fas fa-star"></i> <span>Saved</span>' : '<i class="far fa-star"></i> <span>Save</span>';
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

    /* ==========================================================================
       2. View Mode Switcher (Carousel, Grid, List)
       ========================================================================== */
    function initViewSwitcher() {
        const savedMode = localStorage.getItem('hesten_library_view_mode') || 'carousel';
        window.switchLibraryView(savedMode, false);
    }

    window.switchLibraryView = function (mode, save = true) {
        const container = document.getElementById('library-catalog-container');
        if (!container) return;

        container.classList.remove('view-carousel', 'view-grid', 'view-list');
        container.classList.add(`view-${mode}`);

        document.querySelectorAll('.view-switch-btn').forEach(btn => {
            btn.classList.toggle('active', btn.id === `view-mode-${mode}`);
        });

        if (save) {
            try {
                localStorage.setItem('hesten_library_view_mode', mode);
            } catch (err) {}
        }
    };

    /* ==========================================================================
       3. Real-Time Search & Multi-Facet Filtering
       ========================================================================== */
    function setupFilters() {
        const searchInput = document.getElementById('library-search');
        const clearBtn = document.getElementById('library-search-clear');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');

        if (searchInput) {
            searchInput.addEventListener('input', () => {
                if (clearBtn) {
                    clearBtn.classList.toggle('hidden', searchInput.value.trim() === '');
                }
                applyCatalogFilters();
            });
        }

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (searchInput) {
                    searchInput.value = '';
                    clearBtn.classList.add('hidden');
                    searchInput.focus();
                    applyCatalogFilters();
                }
            });
        }

        if (catFilter) {
            catFilter.addEventListener('change', applyCatalogFilters);
        }

        if (lexileFilter) {
            lexileFilter.addEventListener('change', applyCatalogFilters);
        }
    }

    function applyCatalogFilters() {
        const searchInput = document.getElementById('library-search');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');
        const noResults = document.getElementById('no-results');

        const query = searchInput ? searchInput.value.trim().toLowerCase() : '';
        const selectedCat = catFilter ? catFilter.value : 'all';
        const selectedLexile = lexileFilter ? lexileFilter.value : 'all';

        let totalVisibleBooks = 0;
        const rowSections = document.querySelectorAll('#library-catalog-container .library-row-section');

        rowSections.forEach(section => {
            const sectionCat = section.dataset.category || '';
            const cards = section.querySelectorAll('.library-book-card');
            let sectionVisibleCount = 0;

            // Check if section matches category filter
            let catMatches = false;
            if (selectedCat === 'all' || selectedCat === sectionCat) {
                catMatches = true;
            } else if (selectedCat === 'saved') {
                catMatches = true; // individual cards will be filtered
            }

            cards.forEach(card => {
                const id = card.dataset.id || '';
                const title = (card.dataset.title || '').toLowerCase();
                const author = (card.dataset.author || '').toLowerCase();
                const isbn = (card.dataset.isbn || '').toLowerCase();
                const grade = (card.dataset.grade || '').toLowerCase();
                const curriculum = (card.dataset.curriculum || '').toLowerCase();
                const lexileStr = (card.dataset.lexile || '').replace(/[^0-9]/g, '');
                const lexileNum = parseInt(lexileStr, 10);

                // 1. Category / Saved filter
                if (!catMatches) {
                    card.style.display = 'none';
                    return;
                }
                if (selectedCat === 'saved' && !bookmarkList.includes(id)) {
                    card.style.display = 'none';
                    return;
                }

                // 2. Query search
                let queryMatches = true;
                if (query !== '') {
                    queryMatches = title.includes(query) ||
                                   author.includes(query) ||
                                   isbn.includes(query) ||
                                   grade.includes(query) ||
                                   curriculum.includes(query);
                }

                // 3. Lexile level filter
                let lexileMatches = true;
                if (selectedLexile === 'easy') {
                    lexileMatches = !isNaN(lexileNum) && lexileNum < 500;
                } else if (selectedLexile === 'medium') {
                    lexileMatches = !isNaN(lexileNum) && lexileNum >= 500 && lexileNum <= 900;
                } else if (selectedLexile === 'hard') {
                    lexileMatches = !isNaN(lexileNum) && lexileNum > 900;
                }

                if (queryMatches && lexileMatches) {
                    card.style.display = '';
                    sectionVisibleCount++;
                    totalVisibleBooks++;
                } else {
                    card.style.display = 'none';
                }
            });

            section.style.display = sectionVisibleCount > 0 ? '' : 'none';
        });

        if (noResults) {
            noResults.classList.toggle('hidden', totalVisibleBooks > 0);
        }
    }

    window.resetLibraryFilters = function () {
        const searchInput = document.getElementById('library-search');
        const clearBtn = document.getElementById('library-search-clear');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');

        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.classList.add('hidden');
        if (catFilter) catFilter.value = 'all';
        if (lexileFilter) lexileFilter.value = 'all';

        applyCatalogFilters();
    };

    /* ==========================================================================
       4. Horizontal Carousel Scroll Buttons
       ========================================================================== */
    function setupScrollButtons() {
        document.querySelectorAll('.library-row-section').forEach(section => {
            const row = section.querySelector('.library-books-row');
            const leftBtn = section.querySelector('.scroll-left');
            const rightBtn = section.querySelector('.scroll-right');

            if (row && leftBtn && rightBtn) {
                leftBtn.addEventListener('click', () => {
                    row.scrollBy({ left: -400, behavior: 'smooth' });
                });
                rightBtn.addEventListener('click', () => {
                    row.scrollBy({ left: 400, behavior: 'smooth' });
                });
            }
        });
    }

    /* ==========================================================================
       5. Continue Reading Shelf ("Jump Back In")
       ========================================================================== */
    function initContinueReadingShelf() {
        const shelf = document.getElementById('continue-reading-shelf');
        const cardsContainer = document.getElementById('continue-reading-cards');
        if (!shelf || !cardsContainer) return;

        const progressItems = [];

        // Scan localStorage for books in progress
        try {
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if (key && key.startsWith('hesten_progress_') && key.endsWith('_lastChapter')) {
                    const bookId = key.replace('hesten_progress_', '').replace('_lastChapter', '');
                    const chapterNum = parseInt(localStorage.getItem(key) || '1', 10);
                    const pctKey = `hesten_completion_pct_${bookId}`;
                    const pct = parseInt(localStorage.getItem(pctKey) || '10', 10);

                    // Locate card in DOM for metadata
                    const card = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
                    if (card) {
                        progressItems.push({
                            id: bookId,
                            title: card.dataset.title || bookId,
                            img: card.dataset.img || card.dataset.fallbackImg,
                            chapterNum: chapterNum,
                            pct: Math.min(Math.max(pct, 5), 100),
                            readLink: card.dataset.readOnlineLink || `/library/read/index.php?book=${bookId}&chapter=chapter-${chapterNum}`
                        });
                    }
                }
            }
        } catch (e) {}

        if (progressItems.length > 0) {
            cardsContainer.innerHTML = '';
            progressItems.slice(0, 4).forEach(item => {
                const cardEl = document.createElement('a');
                cardEl.className = 'continue-reading-card';
                cardEl.href = item.readLink;
                cardEl.innerHTML = `
                    <img src="${item.img}" alt="${item.title}" class="continue-card-cover" onerror="this.onerror=null; this.src='https://placehold.co/100x150/1e293b/ffffff?text=Book';">
                    <div class="continue-card-details">
                        <h4 class="continue-card-title">${item.title}</h4>
                        <p class="continue-card-chapter"><i class="fas fa-bookmark mr-1"></i> Chapter ${item.chapterNum} &bull; ${item.pct}%</p>
                        <div class="continue-card-bar-wrap">
                            <div class="continue-card-bar-fill" style="width: ${item.pct}%;"></div>
                        </div>
                    </div>
                `;
                cardsContainer.appendChild(cardEl);
            });
            shelf.classList.remove('hidden');
        } else {
            shelf.classList.add('hidden');
        }
    }

    function setupProgressBars() {
        document.querySelectorAll('.book-progress-track').forEach(track => {
            const id = track.dataset.progressId;
            if (id) {
                try {
                    const pct = localStorage.getItem(`hesten_completion_pct_${id}`);
                    if (pct && parseInt(pct, 10) > 0) {
                        const fill = track.querySelector('.book-progress-fill');
                        if (fill) fill.style.width = `${Math.min(parseInt(pct, 10), 100)}%`;
                        track.classList.remove('hidden');
                    }
                } catch (e) {}
            }
        });
    }

    /* ==========================================================================
       6. Subject Research Desks Navigation & Workspace Panel
       ========================================================================== */
    function setupSidebarToggle() {
        const sidebar = document.getElementById('library-sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle');
        if (sidebar && toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('expanded');
                sidebar.classList.toggle('collapsed');
            });
        }
    }

    window.openResourcePortal = function (deskName) {
        activeDeskName = deskName;
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');
        const drawerTitle = document.getElementById('drawer-title');
        const drawerSubtitle = document.getElementById('drawer-subtitle');

        if (!mainLanding || !deskWorkspace) return;

        mainLanding.classList.add('hidden');
        mainLanding.classList.remove('active');
        deskWorkspace.classList.remove('hidden');
        deskWorkspace.classList.add('active');

        if (drawerTitle) drawerTitle.textContent = `${deskName} Research Desk`;
        if (drawerSubtitle) drawerSubtitle.textContent = `Curated primary sources, critical readings, and academic references.`;

        // Filter sections by deskName
        let visibleCount = 0;
        document.querySelectorAll('#drawer-grid .drawer-section').forEach(sec => {
            const cat = sec.dataset.category || '';
            const match = cat.toLowerCase() === deskName.toLowerCase();
            sec.style.display = match ? '' : 'none';
            if (match) {
                visibleCount += sec.querySelectorAll('.library-book-card').length;
            }
        });

        const countEl = document.getElementById('drawer-count');
        if (countEl) countEl.textContent = visibleCount;

        // Render External Links
        renderDeskExternalLinks(deskName);

        // Reset drawer search
        const drawerSearch = document.getElementById('drawer-search');
        if (drawerSearch) drawerSearch.value = '';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.closeResourcePortal = function () {
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');
        if (mainLanding && deskWorkspace) {
            deskWorkspace.classList.add('hidden');
            deskWorkspace.classList.remove('active');
            mainLanding.classList.remove('hidden');
            mainLanding.classList.add('active');
        }
    };

    window.filterDrawerBooks = function () {
        const searchInput = document.getElementById('drawer-search');
        const query = searchInput ? searchInput.value.trim().toLowerCase() : '';
        let total = 0;

        document.querySelectorAll('#drawer-grid .drawer-section').forEach(sec => {
            if (sec.dataset.category?.toLowerCase() !== activeDeskName.toLowerCase()) return;

            let sectionCount = 0;
            sec.querySelectorAll('.library-book-card').forEach(card => {
                const title = (card.dataset.title || '').toLowerCase();
                const author = (card.dataset.author || '').toLowerCase();
                const matches = query === '' || title.includes(query) || author.includes(query);

                card.style.display = matches ? '' : 'none';
                if (matches) {
                    sectionCount++;
                    total++;
                }
            });
            sec.style.display = sectionCount > 0 ? '' : 'none';
        });

        const countEl = document.getElementById('drawer-count');
        if (countEl) countEl.textContent = total;

        const emptyState = document.getElementById('drawer-empty');
        if (emptyState) emptyState.style.display = total === 0 ? 'block' : 'none';
    };

    window.sortDrawerBooks = function () {
        const sortSelect = document.getElementById('drawer-sort');
        const sortBy = sortSelect ? sortSelect.value : 'title';

        document.querySelectorAll('#drawer-grid .drawer-section-grid').forEach(grid => {
            const cards = Array.from(grid.querySelectorAll('.library-book-card'));
            cards.sort((a, b) => {
                if (sortBy === 'title') {
                    return (a.dataset.title || '').localeCompare(b.dataset.title || '');
                } else if (sortBy === 'date') {
                    return (b.dataset.date || '').localeCompare(a.dataset.date || '');
                } else if (sortBy === 'lexile') {
                    const lA = parseInt((a.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;
                    const lB = parseInt((b.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;
                    return lA - lB;
                } else if (sortBy === 'ddc') {
                    return (a.dataset.dewey || '').localeCompare(b.dataset.dewey || '');
                }
                return 0;
            });
            cards.forEach(card => grid.appendChild(card));
        });
    };

    function renderDeskExternalLinks(deskName) {
        const container = document.getElementById('drawer-external-links-container');
        const list = document.getElementById('drawer-external-links-list');
        if (!container || !list) return;

        const links = window.DESK_EXTERNAL_LINKS && window.DESK_EXTERNAL_LINKS[deskName] ? window.DESK_EXTERNAL_LINKS[deskName] : [];

        if (links.length > 0) {
            list.innerHTML = '';
            links.forEach(item => {
                const card = document.createElement('a');
                card.className = 'external-resource-card';
                card.href = item.url;
                card.target = '_blank';
                card.rel = 'noopener noreferrer';
                card.innerHTML = `
                    <div class="ext-card-header">
                        <h4 class="ext-card-title">${item.title}</h4>
                        <i class="fas fa-external-link-alt text-muted"></i>
                    </div>
                    <p class="ext-card-desc">${item.desc || 'Explore external educational and research portal.'}</p>
                    <div class="ext-card-footer">
                        <span>Access Resource</span> <i class="fas fa-arrow-right"></i>
                    </div>
                `;
                list.appendChild(card);
            });
            container.classList.remove('hidden');
            container.style.display = 'block';
        } else {
            container.classList.add('hidden');
            container.style.display = 'none';
        }
    }

    /* ==========================================================================
       7. Book Overview Modal (Knowledge Portal)
       ========================================================================== */
    window.openModal = function (card) {
        if (!card) return;
        const d = card.dataset;
        window.currentBookId = d.id;
        currentBookData = d;

        const modal = document.getElementById('bookModal');
        if (!modal) return;

        // Cover & Title
        const imgEl = document.getElementById('modal-img');
        if (imgEl) {
            imgEl.src = d.img || d.fallbackImg || 'https://placehold.co/300x450/1e293b/ffffff?text=Book';
            imgEl.alt = d.title || 'Book Cover';
        }

        const titleEl = document.getElementById('modal-title');
        if (titleEl) titleEl.textContent = d.title || 'Untitled Book';

        const authorEl = document.getElementById('modal-author');
        if (authorEl) authorEl.textContent = d.author ? `by ${d.author}` : '';

        // Published & ISBN
        const dateEl = document.getElementById('modal-date');
        const dateCont = document.getElementById('modal-date-container');
        if (dateEl) dateEl.textContent = d.date || 'Unknown';
        if (dateCont) dateCont.classList.toggle('hidden', !d.date || d.date === '#');

        const isbnEl = document.getElementById('modal-isbn');
        const isbnCont = document.getElementById('modal-isbn-container');
        if (isbnEl) isbnEl.textContent = d.isbn || 'N/A';
        if (isbnCont) isbnCont.classList.toggle('hidden', !d.isbn || d.isbn === '#');

        // Lexile
        const lexileEl = document.getElementById('modal-lexile');
        const lexileCont = document.getElementById('modal-lexile-container');
        if (lexileEl) lexileEl.textContent = d.lexile || 'Unrated';
        if (lexileCont) lexileCont.classList.toggle('hidden', !d.lexile || d.lexile === '#');

        // Dewey Decimal
        const deweyEl = document.getElementById('modal-dewey');
        const deweyCont = document.getElementById('modal-dewey-container');
        if (deweyEl) deweyEl.textContent = d.dewey || '';
        if (deweyCont) deweyCont.classList.toggle('hidden', !d.dewey);

        // LC Class
        const lcEl = document.getElementById('modal-lc');
        const lcCont = document.getElementById('modal-lc-container');
        if (lcEl) lcEl.textContent = d.lc || '';
        if (lcCont) lcCont.classList.toggle('hidden', !d.lc);

        // Grade Band
        const gradeEl = document.getElementById('modal-grade');
        const gradeCont = document.getElementById('modal-grade-container');
        if (gradeEl) gradeEl.textContent = d.grade || '';
        if (gradeCont) gradeCont.classList.toggle('hidden', !d.grade || d.grade === '#');

        // Description
        const descEl = document.getElementById('modal-description');
        if (descEl) descEl.textContent = d.description || 'No description available.';

        // Read Online Button
        const readBtn = document.getElementById('modal-read-online-link');
        if (readBtn) {
            const hasReadLink = d.readOnlineLink && d.readOnlineLink !== '#' && d.readOnlineLink !== '';
            readBtn.href = hasReadLink ? d.readOnlineLink : `/library/read/index.php?book=${d.id}`;
        }

        // Bookmark button state
        const modalBmkBtn = document.getElementById('modal-bookmark-btn');
        if (modalBmkBtn) {
            const isSaved = bookmarkList.includes(d.id);
            modalBmkBtn.innerHTML = isSaved ? '<i class="fas fa-star"></i> <span>Saved</span>' : '<i class="far fa-star"></i> <span>Save</span>';
            modalBmkBtn.classList.toggle('active', isSaved);
        }

        // Download Links
        const pdfLink = document.getElementById('modal-pdf-link');
        if (pdfLink) {
            pdfLink.href = d.pdfLink || '#';
            pdfLink.style.display = (d.pdfLink && d.pdfLink !== '#') ? 'inline-flex' : 'none';
        }
        const epubLink = document.getElementById('modal-epub-link');
        if (epubLink) {
            epubLink.href = d.epubLink || '#';
            epubLink.style.display = (d.epubLink && d.epubLink !== '#') ? 'inline-flex' : 'none';
        }
        const mobiLink = document.getElementById('modal-mobi-link');
        if (mobiLink) {
            mobiLink.href = d.mobiLink || '#';
            mobiLink.style.display = (d.mobiLink && d.mobiLink !== '#') ? 'inline-flex' : 'none';
        }
        const txtLink = document.getElementById('modal-txt-link');
        if (txtLink) {
            txtLink.href = d.txtLink || '#';
            txtLink.style.display = (d.txtLink && d.txtLink !== '#') ? 'inline-flex' : 'none';
        }

        // Sourcing text
        window.currentDisclaimerKey = d.disclaimerKey || '';
        window.currentDisclaimerText = d.disclaimerText || '';

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeModal = function () {
        const modal = document.getElementById('bookModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    /* ==========================================================================
       8. Explainer & Disclaimer Modals
       ========================================================================== */
    function loadDisclaimers() {
        fetch('/library/assets/disclaimers.json')
            .then(res => res.json())
            .then(data => { disclaimersData = data; })
            .catch(() => {});
    }

    window.openDisclaimerModal = function () {
        const modal = document.getElementById('disclaimerModal');
        const licenseText = document.getElementById('modal-license-text');
        if (!modal) return;

        if (licenseText) {
            const key = window.currentDisclaimerKey;
            const customText = window.currentDisclaimerText;
            if (customText) {
                licenseText.textContent = customText;
            } else if (key && disclaimersData[key]) {
                licenseText.textContent = disclaimersData[key];
            } else {
                licenseText.textContent = "Provided under open educational fair use for study and teaching purposes.";
            }
        }

        window.switchDisclaimerTab('standard');
        modal.classList.remove('hidden');
    };

    window.closeDisclaimerModal = function () {
        const modal = document.getElementById('disclaimerModal');
        if (modal) modal.classList.add('hidden');
    };

    window.switchDisclaimerTab = function (tab) {
        const stdView = document.getElementById('disclaimer-standard-view');
        const licView = document.getElementById('disclaimer-license-view');
        const tabStd = document.getElementById('tab-disc-standard');
        const tabLic = document.getElementById('tab-disc-license');

        if (tab === 'standard') {
            if (stdView) stdView.style.display = 'block';
            if (licView) licView.style.display = 'none';
            if (tabStd) tabStd.classList.add('active');
            if (tabLic) tabLic.classList.remove('active');
        } else {
            if (stdView) stdView.style.display = 'none';
            if (licView) licView.style.display = 'block';
            if (tabStd) tabStd.classList.remove('active');
            if (tabLic) tabLic.classList.add('active');
        }
    };

    window.openLexileInfoModal = function () {
        const m = document.getElementById('lexileInfoModal');
        if (m) m.classList.remove('hidden');
    };

    window.closeLexileInfoModal = function () {
        const m = document.getElementById('lexileInfoModal');
        if (m) m.classList.add('hidden');
    };

    window.openDdcInfoModal = function () {
        const m = document.getElementById('ddcInfoModal');
        if (m) m.classList.remove('hidden');
    };

    window.closeDdcInfoModal = function () {
        const m = document.getElementById('ddcInfoModal');
        if (m) m.classList.add('hidden');
    };

    /* ==========================================================================
       9. Academic Citation Generator
       ========================================================================== */
    window.openBookCitationModal = function () {
        const modal = document.getElementById('bookCitationModal');
        if (!modal || !currentBookData) return;

        renderCitation();
        modal.classList.remove('hidden');
    };

    window.closeBookCitationModal = function () {
        const modal = document.getElementById('bookCitationModal');
        if (modal) modal.classList.add('hidden');
    };

    window.switchCitationStyle = function (style) {
        currentCitationStyle = style;
        document.querySelectorAll('.citation-tab-btn').forEach(btn => {
            btn.classList.toggle('active', btn.textContent.toLowerCase().includes(style));
        });
        renderCitation();
    };

    function renderCitation() {
        const renderBox = document.getElementById('citation-text');
        if (!renderBox || !currentBookData) return;

        const author = currentBookData.author || 'Author Unknown';
        const title = currentBookData.title || 'Untitled';
        const date = currentBookData.date || 'n.d.';
        const year = date.match(/\d{4}/) ? date.match(/\d{4}/)[0] : 'n.d.';
        const url = window.location.origin + (currentBookData.readOnlineLink || `/library/read/index.php?book=${currentBookData.id}`);

        let citation = '';
        if (currentCitationStyle === 'mla') {
            citation = `${author}. <em>${title}</em>. Hesten's Learning Digital Library, ${year}, <a href="${url}" target="_blank">${url}</a>.`;
        } else if (currentCitationStyle === 'apa') {
            citation = `${author} (${year}). <em>${title}</em>. Hesten's Learning. ${url}`;
        } else if (currentCitationStyle === 'chicago') {
            citation = `${author}. <em>${title}</em>. Hesten's Learning Digital Library, ${year}. ${url}.`;
        } else if (currentCitationStyle === 'harvard') {
            citation = `${author}, ${year}. <em>${title}</em>, Hesten's Learning Digital Library, available at: &lt;${url}&gt;.`;
        }

        renderBox.innerHTML = citation;
    }

    window.copyCitationText = function () {
        const renderBox = document.getElementById('citation-text');
        const copyBtn = document.getElementById('citation-copy-btn');
        if (!renderBox) return;

        const text = renderBox.textContent || renderBox.innerText;
        navigator.clipboard.writeText(text).then(() => {
            if (copyBtn) {
                copyBtn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fas fa-copy"></i> <span>Copy Citation</span>';
                }, 2000);
            }
        });
    };

    /* ==========================================================================
       10. Inline Lexile Customization
       ========================================================================== */
    function setupLexileEditing() {
        const editBtn = document.getElementById('edit-lexile-btn');
        const saveBtn = document.getElementById('save-lexile-btn');
        const cancelBtn = document.getElementById('cancel-lexile-btn');
        const editCont = document.getElementById('modal-lexile-edit-container');
        const input = document.getElementById('modal-lexile-input');
        const lexileVal = document.getElementById('modal-lexile');

        if (!editBtn || !saveBtn || !cancelBtn || !editCont || !input || !lexileVal) return;

        editBtn.addEventListener('click', () => {
            input.value = lexileVal.textContent.trim();
            editCont.style.display = 'flex';
            editBtn.style.display = 'none';
            input.focus();
        });

        saveBtn.addEventListener('click', () => {
            const newVal = input.value.trim();
            if (newVal && window.currentBookId) {
                lexileVal.textContent = newVal;
                saveLexileOverride(window.currentBookId, newVal);
            }
            editCont.style.display = 'none';
            editBtn.style.display = 'inline-flex';
        });

        cancelBtn.addEventListener('click', () => {
            editCont.style.display = 'none';
            editBtn.style.display = 'inline-flex';
        });
    }

    function saveLexileOverride(bookId, val) {
        try {
            const overrides = JSON.parse(localStorage.getItem('hesten_lexile_overrides') || '{}');
            overrides[bookId] = val;
            localStorage.setItem('hesten_lexile_overrides', JSON.stringify(overrides));
            applyStoredLexileOverrides();
        } catch (e) {}
    }

    function applyStoredLexileOverrides() {
        try {
            const overrides = JSON.parse(localStorage.getItem('hesten_lexile_overrides') || '{}');
            Object.keys(overrides).forEach(id => {
                const cards = document.querySelectorAll(`.library-book-card[data-id="${id}"]`);
                cards.forEach(c => {
                    c.dataset.lexile = overrides[id];
                    const tag = c.querySelector('.lexile-tag');
                    if (tag) tag.innerHTML = `<i class="fas fa-brain"></i> ${overrides[id]}`;
                });
            });
        } catch (e) {}
    }

    /* ==========================================================================
       11. Keyboard Shortcuts & Global Handlers
       ========================================================================== */
    function setupKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                window.closeModal();
                window.closeDisclaimerModal();
                window.closeLexileInfoModal();
                window.closeDdcInfoModal();
                window.closeBookCitationModal();
            }
            // Press '/' to search catalog
            if (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                const search = document.getElementById('library-search');
                if (search) {
                    e.preventDefault();
                    search.focus();
                }
            }
        });
    }

})();
