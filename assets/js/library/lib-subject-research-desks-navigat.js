    /* ==========================================================================
       6. Subject Research Desks Navigation & Workspace Panel
       ========================================================================== */
    function setupSidebarToggle() {
        // Obsolete sidebar toggle retained as safe no-op
    }

    const DESK_ICONS = {
        'General Resources': 'fa-layer-group',
        'US History': 'fa-university',
        'World History': 'fa-globe-americas',
        'WW1': 'fa-shield-halved',
        'WW2': 'fa-award',
        'Math': 'fa-calculator',
        'ELA': 'fa-spell-check',
        'Science': 'fa-atom',
        'Civics': 'fa-landmark'
    };

    // Opaque 8-character cryptographic hashes for Subject Research Desks (non-obvious URLs)
    const DESK_HASH_CODES = {
        'General Resources': 'e27d1c34',
        'US History': 'cd90fec6',
        'World History': '2a870513',
        'WW1': '85e68cd6',
        'WW2': 'ae6f5594',
        'Math': '6b3a0fb1',
        'ELA': '2593f14f',
        'Science': '79d226aa',
        'Civics': '2396a9be'
    };

    // Comprehensive reverse-lookup map supporting opaque hashes, prefixed hashes, and readable aliases
    const HASH_TO_DESK = {
        // 1. Opaque 8-character cryptographic hashes
        'e27d1c34': 'General Resources',
        'cd90fec6': 'US History',
        '2a870513': 'World History',
        '85e68cd6': 'WW1',
        'ae6f5594': 'WW2',
        '6b3a0fb1': 'Math',
        '2593f14f': 'ELA',
        '79d226aa': 'Science',
        '2396a9be': 'Civics',

        // 2. Prefixed opaque hashes
        'desk-e27d1c34': 'General Resources',
        'desk-cd90fec6': 'US History',
        'desk-2a870513': 'World History',
        'desk-85e68cd6': 'WW1',
        'desk-ae6f5594': 'WW2',
        'desk-6b3a0fb1': 'Math',
        'desk-2593f14f': 'ELA',
        'desk-79d226aa': 'Science',
        'desk-2396a9be': 'Civics',

        // 3. Readable fallback aliases
        'general-resources': 'General Resources',
        'desk-general': 'General Resources',
        'general': 'General Resources',
        'us-history': 'US History',
        'desk-us-history': 'US History',
        'ushistory': 'US History',
        'world-history': 'World History',
        'desk-world-history': 'World History',
        'worldhistory': 'World History',
        'ww1': 'WW1',
        'desk-ww1': 'WW1',
        'world-war-1': 'WW1',
        'ww2': 'WW2',
        'desk-ww2': 'WW2',
        'world-war-2': 'WW2',
        'math': 'Math',
        'desk-math': 'Math',
        'mathematics': 'Math',
        'ela': 'ELA',
        'desk-ela': 'ELA',
        'reading': 'ELA',
        'english': 'ELA',
        'science': 'Science',
        'desk-science': 'Science',
        'civics': 'Civics',
        'desk-civics': 'Civics',
        'government': 'Civics'
    };

    window.openResourcePortal = function (deskName, updateHash = true) {
        activeDeskName = deskName;
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');
        const drawerTitle = document.getElementById('drawer-title');
        const drawerSubtitle = document.getElementById('drawer-subtitle');
        const breadcrumbCurrent = document.getElementById('drawer-breadcrumb-current');
        const iconBadge = document.getElementById('drawer-icon-badge');

        if (!mainLanding || !deskWorkspace) return;

        // Synchronize browser URL hash with opaque hashed value without scroll jumping
        if (updateHash && DESK_HASH_CODES[deskName]) {
            const hashCode = DESK_HASH_CODES[deskName];
            if (window.location.hash !== '#' + hashCode) {
                history.replaceState(null, '', '#' + hashCode);
            }
        }

        // Highlight active desk tab in top switcher bar
        document.querySelectorAll('.desk-switcher-tab').forEach(tab => {
            const isActive = tab.dataset.desk === deskName;
            tab.classList.toggle('active', isActive);
            if (isActive) {
                tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
        });

        mainLanding.classList.add('hidden');
        mainLanding.classList.remove('active');
        deskWorkspace.classList.remove('hidden');
        deskWorkspace.classList.add('active');

        if (drawerTitle) drawerTitle.textContent = `${deskName} Research Desk`;
        if (drawerSubtitle) drawerSubtitle.textContent = `Curated primary sources, critical readings, and academic references.`;
        if (breadcrumbCurrent) breadcrumbCurrent.textContent = `${deskName} Desk`;

        if (iconBadge) {
            const iconClass = DESK_ICONS[deskName] || 'fa-book-reader';
            iconBadge.innerHTML = `<i class="fas ${iconClass}"></i>`;
        }

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

        // Reset drawer search & clear button
        const drawerSearch = document.getElementById('drawer-search');
        const searchClear = document.getElementById('drawer-search-clear');
        if (drawerSearch) drawerSearch.value = '';
        if (searchClear) searchClear.classList.add('hidden');

        // Reset sort dropdown
        const sortSelect = document.getElementById('drawer-sort');
        if (sortSelect) sortSelect.value = 'title-asc';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.closeResourcePortal = function (updateHash = true) {
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');

        document.querySelectorAll('.desk-switcher-tab').forEach(tab => {
            tab.classList.remove('active');
        });

        if (mainLanding && deskWorkspace) {
            deskWorkspace.classList.add('hidden');
            deskWorkspace.classList.remove('active');
            mainLanding.classList.remove('hidden');
            mainLanding.classList.add('active');
        }

        // Clean URL hash if closing active research desk
        if (updateHash && window.location.hash) {
            const rawHash = window.location.hash.replace(/^#/, '').toLowerCase().trim();
            if (HASH_TO_DESK[rawHash]) {
                history.replaceState(null, '', window.location.pathname + window.location.search);
            }
        }
    };

    window.copyDeskShareLink = function () {
        if (!activeDeskName) return;
        const hashCode = DESK_HASH_CODES[activeDeskName];
        const shareUrl = window.location.origin + window.location.pathname + (hashCode ? '#' + hashCode : '');

        navigator.clipboard.writeText(shareUrl).then(() => {
            const shareBtn = document.getElementById('desk-share-btn');
            const shareText = document.getElementById('desk-share-btn-text');
            const icon = shareBtn ? shareBtn.querySelector('i') : null;

            if (shareBtn) shareBtn.classList.add('copied');
            if (icon) icon.className = 'fas fa-check text-emerald-400';
            if (shareText) shareText.textContent = 'Link Copied!';

            if (typeof window.announceA11y === 'function') {
                window.announceA11y(`Direct hashed link copied for ${activeDeskName} research desk.`);
            }

            setTimeout(() => {
                if (shareBtn) shareBtn.classList.remove('copied');
                if (icon) icon.className = 'fas fa-link';
                if (shareText) shareText.textContent = 'Share Desk';
            }, 2500);
        }).catch(err => {
            console.error('Failed to copy link:', err);
        });
    };

    window.clearDrawerSearch = function () {
        const drawerSearch = document.getElementById('drawer-search');
        const searchClear = document.getElementById('drawer-search-clear');
        if (drawerSearch) {
            drawerSearch.value = '';
            drawerSearch.focus();
        }
        if (searchClear) searchClear.classList.add('hidden');
        filterDrawerBooks();
    };

    window.filterDrawerBooks = function () {
        const searchInput = document.getElementById('drawer-search');
        const searchClear = document.getElementById('drawer-search-clear');
        const query = searchInput ? searchInput.value.trim().toLowerCase() : '';

        if (searchClear) {
            searchClear.classList.toggle('hidden', query === '');
        }

        let total = 0;

        document.querySelectorAll('#drawer-grid .drawer-section').forEach(sec => {
            if (sec.dataset.category?.toLowerCase() !== activeDeskName.toLowerCase()) return;

            let sectionCount = 0;
            sec.querySelectorAll('.library-book-card').forEach(card => {
                const title = (card.dataset.title || '').toLowerCase();
                const author = (card.dataset.author || '').toLowerCase();
                const description = (card.dataset.description || '').toLowerCase();
                const matches = query === '' || title.includes(query) || author.includes(query) || description.includes(query);

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
        const sortBy = sortSelect ? sortSelect.value : 'title-asc';

        document.querySelectorAll('#drawer-grid .drawer-section-grid').forEach(grid => {
            const cards = Array.from(grid.querySelectorAll('.library-book-card'));
            cards.sort((a, b) => {
                const titleA = (a.dataset.title || '').toLowerCase();
                const titleB = (b.dataset.title || '').toLowerCase();
                const dateA = a.dataset.date || '';
                const dateB = b.dataset.date || '';
                const lexA = parseInt((a.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;
                const lexB = parseInt((b.dataset.lexile || '').replace(/\D/g, ''), 10) || 0;
                const ddcA = a.dataset.dewey || '';
                const ddcB = b.dataset.dewey || '';

                if (sortBy === 'title-asc') {
                    return titleA.localeCompare(titleB);
                } else if (sortBy === 'title-desc') {
                    return titleB.localeCompare(titleA);
                } else if (sortBy === 'date-desc') {
                    return dateB.localeCompare(dateA);
                } else if (sortBy === 'date-asc') {
                    return dateA.localeCompare(dateB);
                } else if (sortBy === 'lexile-asc') {
                    return lexA - lexB;
                } else if (sortBy === 'lexile-desc') {
                    return lexB - lexA;
                } else if (sortBy === 'ddc') {
                    return ddcA.localeCompare(ddcB);
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

    window.openCategoryResources = function (categoryName) {
        const categoryDeskMap = {
            'Classic Fiction': 'ELA',
            'Fantasy & Sci-Fi': 'ELA',
            'Literature': 'ELA',
            'English Language Arts': 'ELA',
            'US History': 'US History',
            'World History': 'World History',
            'WW1': 'WW1',
            'WW2': 'WW2',
            'Math': 'Math',
            'Mathematics': 'Math',
            'Science': 'Science',
            'Civics': 'Civics',
            'General Resources': 'General Resources'
        };

        const targetDesk = categoryDeskMap[categoryName] || categoryName;

        // Check if matching desk exists
        const matchingSidebarItem = document.querySelector(`.sidebar-item[data-desk="${targetDesk}"]`);
        if (matchingSidebarItem || (window.DESK_EXTERNAL_LINKS && window.DESK_EXTERNAL_LINKS[targetDesk])) {
            window.openResourcePortal(targetDesk);
        } else {
            // Fallback: Filter catalog by category or open General Resources
            const catFilter = document.getElementById('category-filter');
            if (catFilter) {
                catFilter.value = categoryName;
                catFilter.dispatchEvent(new Event('change'));
                const container = document.getElementById('library-catalog-container');
                if (container) {
                    container.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                window.openResourcePortal('General Resources');
            }
        }
    };

    /* ==========================================================================
       Hash Routing & Deep-Linking Resolution Engine
       ========================================================================== */
    function resolveDeskFromHash(hashStr) {
        if (!hashStr) return null;
        const clean = hashStr.replace(/^#/, '').toLowerCase().trim();
        return HASH_TO_DESK[clean] || null;
    }

    function checkDeskHash() {
        if (!window.location.hash) return;
        const desk = resolveDeskFromHash(window.location.hash);
        if (desk) {
            window.openResourcePortal(desk, false);
        }
    }

    // React to browser Back/Forward navigation or direct hash code alterations
    window.addEventListener('hashchange', () => {
        const desk = resolveDeskFromHash(window.location.hash);
        if (desk) {
            window.openResourcePortal(desk, false);
        } else if (!window.location.hash || !window.location.hash.trim()) {
            const deskWorkspace = document.getElementById('subject-desk-workspace');
            if (deskWorkspace && !deskWorkspace.classList.contains('hidden')) {
                window.closeResourcePortal(false);
            }
        }
    });

    // Check initial URL hash on page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => setTimeout(checkDeskHash, 60));
    } else {
        setTimeout(checkDeskHash, 60);
    }

