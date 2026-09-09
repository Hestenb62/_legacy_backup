/**
 * assets/js/header-search-autocomplete.js
 * Instant Search Autocomplete & Quick Jumper for Header Search
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    // Curated catalog of direct destinations and subjects for instant autocomplete
    const QUICK_INDEX = [
        { title: 'Home Dashboard', category: 'Navigation', url: '/', icon: 'fa-home' },
        { title: 'Curriculum Standards Explorer', category: 'Curriculum', url: '/pages/standards.php', icon: 'fa-graduation-cap' },
        { title: 'Kindergarten Math & ELA', category: 'Grade Level', url: '/levels/level-k.php', icon: 'fa-shapes' },
        { title: 'Level 1 Elementary', category: 'Grade Level', url: '/levels/level-1.php', icon: 'fa-book-open' },
        { title: 'Level 2 Elementary', category: 'Grade Level', url: '/levels/level-2.php', icon: 'fa-book-open' },
        { title: 'Level 3 Elementary', category: 'Grade Level', url: '/levels/level-3.php', icon: 'fa-book-open' },
        { title: 'Level 4 Elementary', category: 'Grade Level', url: '/levels/level-4.php', icon: 'fa-book-open' },
        { title: 'Level 5 Elementary', category: 'Grade Level', url: '/levels/level-5.php', icon: 'fa-book-open' },
        { title: 'Level 6 Middle School', category: 'Grade Level', url: '/levels/level-6.php', icon: 'fa-book-open' },
        { title: 'Assessments & Quizzes', category: 'Testing', url: '/assessment/', icon: 'fa-clipboard-check' },
        { title: 'Curriculum Library & Readers', category: 'Library', url: '/library/', icon: 'fa-book' },
        { title: 'Interactive Lesson Runner', category: 'Learning Tool', url: '/src/lesson_runner.php', icon: 'fa-play' },
        { title: 'Teacher Suite & Pacing Guide', category: 'Educator', url: '/pages/teachers.php', icon: 'fa-chalkboard-teacher' },
        { title: 'Updates & Planning Portal', category: 'Documentation', url: '/updates/', icon: 'fa-newspaper' },
        { title: 'Study Timer & Focus', category: 'Tool', action: 'timer', icon: 'fa-stopwatch' },
        { title: 'Scratchpad Notes', category: 'Tool', action: 'scratchpad', icon: 'fa-pen' },
        { title: 'Citation Helper', category: 'Tool', action: 'citation', icon: 'fa-quote-right' },
        { title: 'Accessibility Settings', category: 'Tool', action: 'a11y', icon: 'fa-universal-access' },
        { title: 'Accessibility & Accommodations Hub', category: 'Support & A11y', url: '/pages/accessibility.php', icon: 'fa-universal-access' }
    ];

    function initAutocomplete() {
        const searchInput = document.getElementById('header-search');
        if (!searchInput) return;

        const form = searchInput.closest('form');
        if (!form) return;

        // Position wrapper
        form.style.position = 'relative';

        // Create dropdown container
        let dropdown = document.getElementById('header-search-autocomplete');
        if (!dropdown) {
            dropdown = document.createElement('div');
            dropdown.id = 'header-search-autocomplete';
            dropdown.className = 'header-search-autocomplete-menu hidden';
            dropdown.setAttribute('role', 'listbox');
            dropdown.setAttribute('aria-label', 'Search Suggestions');
            form.appendChild(dropdown);
        }

        let activeIndex = -1;
        let visibleItems = [];

        function renderResults(query) {
            const trimmed = query.trim().toLowerCase();
            if (!trimmed) {
                dropdown.classList.add('hidden');
                dropdown.innerHTML = '';
                activeIndex = -1;
                visibleItems = [];
                return;
            }

            const matches = QUICK_INDEX.filter(item => {
                return (
                    item.title.toLowerCase().includes(trimmed) ||
                    item.category.toLowerCase().includes(trimmed)
                );
            }).slice(0, 6);

            let html = '';
            visibleItems = matches;

            if (matches.length > 0) {
                matches.forEach((item, idx) => {
                    html += `
                        <div class="search-ac-item" role="option" data-index="${idx}" id="search-ac-opt-${idx}">
                            <div class="search-ac-icon"><i class="fas ${item.icon}"></i></div>
                            <div class="search-ac-info">
                                <span class="search-ac-title">${escapeHTML(item.title)}</span>
                                <span class="search-ac-category">${escapeHTML(item.category)}</span>
                            </div>
                        </div>
                    `;
                });
            }

            // Always provide "Search full site for '...'" option
            html += `
                <div class="search-ac-item search-ac-all" role="option" data-index="${matches.length}" id="search-ac-opt-${matches.length}">
                    <div class="search-ac-icon"><i class="fas fa-search"></i></div>
                    <div class="search-ac-info">
                        <span class="search-ac-title">Search entire site for "<strong>${escapeHTML(query)}</strong>"</span>
                    </div>
                </div>
            `;

            dropdown.innerHTML = html;
            dropdown.classList.remove('hidden');
            activeIndex = -1;

            // Click listener on options
            dropdown.querySelectorAll('.search-ac-item').forEach(el => {
                el.addEventListener('click', function (e) {
                    e.preventDefault();
                    const idx = parseInt(this.getAttribute('data-index'), 10);
                    selectIndex(idx, query);
                });
            });
        }

        function selectIndex(idx, rawQuery) {
            if (idx >= 0 && idx < visibleItems.length) {
                const item = visibleItems[idx];
                if (item.url) {
                    window.location.href = item.url;
                } else if (item.action) {
                    dropdown.classList.add('hidden');
                    if (item.action === 'timer' && typeof window.toggleStudyTimer === 'function') window.toggleStudyTimer();
                    if (item.action === 'scratchpad' && typeof window.toggleScratchpad === 'function') window.toggleScratchpad();
                    if (item.action === 'citation' && typeof window.toggleCitationModal === 'function') window.toggleCitationModal();
                    if (item.action === 'a11y' && typeof window.toggleA11ySettings === 'function') window.toggleA11ySettings();
                }
            } else {
                // Submit form for full search
                form.submit();
            }
        }

        function updateActiveHighlight() {
            const items = dropdown.querySelectorAll('.search-ac-item');
            items.forEach((el, idx) => {
                if (idx === activeIndex) {
                    el.classList.add('is-active');
                    el.setAttribute('aria-selected', 'true');
                    searchInput.setAttribute('aria-activedescendant', el.id);
                    el.scrollIntoView({ block: 'nearest' });
                } else {
                    el.classList.remove('is-active');
                    el.setAttribute('aria-selected', 'false');
                }
            });
        }

        function escapeHTML(str) {
            return str.replace(/[&<>'"]/g, tag => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                "'": '&#39;',
                '"': '&quot;'
            }[tag] || tag));
        }

        // Input events with debounce
        let debounceTimer = null;
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                renderResults(searchInput.value);
            }, 120);
        });

        searchInput.addEventListener('focus', function () {
            if (searchInput.value.trim().length > 0) {
                renderResults(searchInput.value);
            }
        });

        // Keydown navigation in dropdown
        searchInput.addEventListener('keydown', function (e) {
            if (dropdown.classList.contains('hidden')) return;

            const totalCount = visibleItems.length + 1; // including "search all"

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = (activeIndex + 1) % totalCount;
                updateActiveHighlight();
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = (activeIndex - 1 + totalCount) % totalCount;
                updateActiveHighlight();
            } else if (e.key === 'Enter') {
                if (activeIndex >= 0) {
                    e.preventDefault();
                    selectIndex(activeIndex, searchInput.value);
                }
            } else if (e.key === 'Escape') {
                dropdown.classList.add('hidden');
                activeIndex = -1;
            }
        });

        // Hide when clicking outside
        document.addEventListener('click', function (e) {
            if (!form.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAutocomplete);
    } else {
        initAutocomplete();
    }
})();
