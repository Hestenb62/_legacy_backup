    /* ==========================================================================
       3. SLiMS OPAC Real-Time Search, Multi-Facet Filtering & Scope Routing
       ========================================================================== */
    let activeQuickChip = 'all';

    function setupFilters() {
        const searchInput = document.getElementById('library-search');
        const clearBtn = document.getElementById('library-search-clear');
        const scopeSelect = document.getElementById('slims-search-scope');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');
        const sortFilter = document.getElementById('catalog-sort');

        if (searchInput) {
            searchInput.addEventListener('input', () => {
                if (clearBtn) {
                    clearBtn.classList.toggle('hidden', searchInput.value.trim() === '');
                }
                applyCatalogFilters();
            });
            searchInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    applyCatalogFilters();
                }
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

        if (scopeSelect) {
            scopeSelect.addEventListener('change', applyCatalogFilters);
        }

        if (catFilter) {
            catFilter.addEventListener('change', applyCatalogFilters);
        }

        if (lexileFilter) {
            lexileFilter.addEventListener('change', applyCatalogFilters);
        }

        if (sortFilter) {
            sortFilter.addEventListener('change', applyCatalogFilters);
        }

        // SLiMS Quick Topic / Discipline Chips
        document.querySelectorAll('.library-chip-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.library-chip-btn').forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
                activeQuickChip = btn.dataset.chip || 'all';
                applyCatalogFilters();
            });
        });
    }

    function applyCatalogFilters() {
        const searchInput = document.getElementById('library-search');
        const scopeSelect = document.getElementById('slims-search-scope');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');
        const sortFilter = document.getElementById('catalog-sort');
        const noResults = document.getElementById('no-results');
        const recordCountEl = document.getElementById('slims-record-count');

        const query = searchInput ? searchInput.value.trim().toLowerCase() : '';
        const searchScope = scopeSelect ? scopeSelect.value : 'all';
        const selectedCat = catFilter ? catFilter.value : 'all';
        const selectedLexile = lexileFilter ? lexileFilter.value : 'all';
        const sortBy = sortFilter ? sortFilter.value : 'default';

        let totalVisibleBooks = 0;
        const rowSections = document.querySelectorAll('#library-catalog-container .library-row-section');

        rowSections.forEach(section => {
            const sectionCat = section.dataset.category || '';
            const booksRow = section.querySelector('.library-books-row');
            if (!booksRow) return;

            const cards = Array.from(booksRow.querySelectorAll('.library-book-card'));
            let sectionVisibleCount = 0;

            // Check if section matches category dropdown
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
                const callNumber = (card.dataset.callNumber || '').toLowerCase();
                const grade = (card.dataset.grade || '').toLowerCase();
                const curriculum = (card.dataset.curriculum || '').toLowerCase();
                const category = (card.dataset.category || sectionCat).toLowerCase();
                const description = (card.dataset.description || '').toLowerCase();
                const lexileStr = (card.dataset.lexile || '').replace(/[^0-9]/g, '');
                const lexileNum = parseInt(lexileStr, 10);

                // 1. Category / Saved filter
                if (!catMatches) {
                    card.style.display = 'none';
                    return;
                }
                const bmkList = Array.isArray(window.bookmarkList) ? window.bookmarkList : [];
                if (selectedCat === 'saved' && !bmkList.includes(id)) {
                    card.style.display = 'none';
                    return;
                }

                // 2. SLiMS Quick Topic Chip Filter
                let chipMatches = true;
                if (activeQuickChip === 'fiction') {
                    chipMatches = category.includes('fiction') || category.includes('fantasy') || title.includes('pride') || title.includes('frankenstein') || title.includes('dracula') || title.includes('1984') || title.includes('room');
                } else if (activeQuickChip === 'us-history') {
                    chipMatches = category.includes('us history') || title.includes('constitution') || title.includes('declaration') || title.includes('yawp') || title.includes('liberty') || title.includes('america');
                } else if (activeQuickChip === 'world-history') {
                    chipMatches = category.includes('world history') || title.includes('negro') || title.includes('karamazov') || title.includes('peace') || title.includes('odyssey') || title.includes('republic');
                } else if (activeQuickChip === 'stem') {
                    chipMatches = category.includes('math') || title.includes('math') || title.includes('formula') || title.includes('algebra') || title.includes('geometry') || title.includes('calculus');
                } else if (activeQuickChip === 'science') {
                    chipMatches = category.includes('science') || title.includes('science') || title.includes('geology') || title.includes('physics') || title.includes('park');
                } else if (activeQuickChip === 'civics') {
                    chipMatches = category.includes('civics') || title.includes('suffrage') || title.includes('rights') || title.includes('government') || title.includes('liberty');
                } else if (activeQuickChip === 'saved') {
                    chipMatches = bmkList.includes(id);
                } else if (activeQuickChip === 'elementary') {
                    chipMatches = grade.includes('k-') || grade.includes('k -') || grade.includes('elem') || (lexileNum > 0 && lexileNum < 500);
                } else if (activeQuickChip === 'middle') {
                    chipMatches = grade.includes('6-8') || grade.includes('middle') || (lexileNum >= 500 && lexileNum <= 900);
                } else if (activeQuickChip === 'high') {
                    chipMatches = grade.includes('9-12') || grade.includes('10-12') || grade.includes('11-12') || grade.includes('high') || lexileNum > 900;
                }

                if (!chipMatches) {
                    card.style.display = 'none';
                    return;
                }

                // 3. SLiMS Field Scope & Query Search
                let queryMatches = true;
                if (query !== '') {
                    if (searchScope === 'title') {
                        queryMatches = title.includes(query);
                    } else if (searchScope === 'author') {
                        queryMatches = author.includes(query);
                    } else if (searchScope === 'subject') {
                        queryMatches = category.includes(query) || curriculum.includes(query) || grade.includes(query);
                    } else if (searchScope === 'callnumber') {
                        queryMatches = callNumber.includes(query) || (card.dataset.dewey || '').toLowerCase().includes(query) || (card.dataset.lc || '').toLowerCase().includes(query);
                    } else if (searchScope === 'isbn') {
                        queryMatches = isbn.includes(query);
                    } else {
                        // All Fields
                        queryMatches = title.includes(query) ||
                                       author.includes(query) ||
                                       isbn.includes(query) ||
                                       callNumber.includes(query) ||
                                       grade.includes(query) ||
                                       curriculum.includes(query) ||
                                       category.includes(query) ||
                                       description.includes(query);
                    }
                }

                // 4. Lexile Level Filter
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

            // Sorting within row
            if (sortBy !== 'default') {
                cards.sort((a, b) => {
                    const titleA = (a.dataset.title || '').toLowerCase();
                    const titleB = (b.dataset.title || '').toLowerCase();
                    const callA = (a.dataset.callNumber || '').toLowerCase();
                    const callB = (b.dataset.callNumber || '').toLowerCase();
                    const lexA = parseInt((a.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;
                    const lexB = parseInt((b.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;

                    if (sortBy === 'title-asc') return titleA.localeCompare(titleB);
                    if (sortBy === 'title-desc') return titleB.localeCompare(titleA);
                    if (sortBy === 'callno-asc') return callA.localeCompare(callB);
                    if (sortBy === 'lexile-asc') return lexA - lexB;
                    if (sortBy === 'lexile-desc') return lexB - lexA;
                    return 0;
                });
                cards.forEach(c => booksRow.appendChild(c));
            }

            section.style.display = sectionVisibleCount > 0 ? '' : 'none';
        });

        if (recordCountEl) {
            recordCountEl.textContent = totalVisibleBooks;
        }

        if (noResults) {
            noResults.classList.toggle('hidden', totalVisibleBooks > 0);
        }
    }

    window.resetLibraryFilters = function () {
        const searchInput = document.getElementById('library-search');
        const clearBtn = document.getElementById('library-search-clear');
        const scopeSelect = document.getElementById('slims-search-scope');
        const catFilter = document.getElementById('category-filter');
        const lexileFilter = document.getElementById('lexile-filter');
        const sortFilter = document.getElementById('catalog-sort');

        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.classList.add('hidden');
        if (scopeSelect) scopeSelect.value = 'all';
        if (catFilter) catFilter.value = 'all';
        if (lexileFilter) lexileFilter.value = 'all';
        if (sortFilter) sortFilter.value = 'default';

        activeQuickChip = 'all';
        document.querySelectorAll('.library-chip-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.chip === 'all');
            btn.setAttribute('aria-selected', btn.dataset.chip === 'all' ? 'true' : 'false');
        });

        applyCatalogFilters();
    };
