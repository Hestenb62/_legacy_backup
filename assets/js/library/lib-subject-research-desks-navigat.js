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

    const DESK_ICONS = {
        'US History': 'fa-university',
        'World History': 'fa-globe-americas',
        'WW1': 'fa-shield-halved',
        'WW2': 'fa-award',
        'Math': 'fa-calculator',
        'ELA': 'fa-spell-check',
        'Science': 'fa-atom',
        'Civics': 'fa-landmark'
    };

    window.openResourcePortal = function (deskName) {
        activeDeskName = deskName;
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');
        const drawerTitle = document.getElementById('drawer-title');
        const drawerSubtitle = document.getElementById('drawer-subtitle');
        const breadcrumbCurrent = document.getElementById('drawer-breadcrumb-current');
        const iconBadge = document.getElementById('drawer-icon-badge');

        if (!mainLanding || !deskWorkspace) return;

        // Highlight active desk item in sidebar
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.classList.toggle('active', item.dataset.desk === deskName);
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

    window.closeResourcePortal = function () {
        const mainLanding = document.getElementById('main-desk-landing');
        const deskWorkspace = document.getElementById('subject-desk-workspace');

        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.classList.remove('active');
        });

        if (mainLanding && deskWorkspace) {
            deskWorkspace.classList.add('hidden');
            deskWorkspace.classList.remove('active');
            mainLanding.classList.remove('hidden');
            mainLanding.classList.add('active');
        }
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
