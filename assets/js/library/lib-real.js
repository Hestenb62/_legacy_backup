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
