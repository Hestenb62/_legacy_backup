/**
 * Global Command Palette & Keyboard Launcher
 * File: assets/js/command-palette.js
 * Pure Vanilla JavaScript (Zero Dependencies)
 */

(function () {
    'use strict';

    // Command Catalog
    const COMMAND_ITEMS = [
        // Navigation Destinations
        {
            id: 'nav-levels',
            title: 'Curriculum Levels',
            desc: 'Browse Kindergarten through 6th grade skill maps',
            icon: 'fa-layer-group',
            iconColor: 'icon-purple',
            category: 'nav',
            badge: 'Navigation',
            url: '/levels/',
            keywords: ['curriculum', 'grade', 'kindergarten', 'elementary', 'skills', 'maps']
        },
        {
            id: 'nav-runner',
            title: 'Universal Lesson Runner',
            desc: 'Interactive lesson player with step-by-step guidance',
            icon: 'fa-play',
            iconColor: 'icon-blue',
            category: 'nav',
            badge: 'Launcher',
            url: '/src/lesson_runner.php',
            keywords: ['lesson', 'runner', 'player', 'practice', 'start', 'interactive']
        },
        {
            id: 'nav-assessment',
            title: 'Assessments & Diagnostic Quizzes',
            desc: 'Subject testing, fluency sprints, and printable sheets',
            icon: 'fa-clipboard-check',
            iconColor: 'icon-teal',
            category: 'nav',
            badge: 'Testing',
            url: '/assessment/',
            keywords: ['assessment', 'test', 'quiz', 'sprint', 'fluency', 'diagnostic', 'worksheet']
        },
        {
            id: 'nav-teachers',
            title: 'Teacher Suite & 36-Week Pacing',
            desc: 'Standards alignment, lesson plans, and classroom pacing',
            icon: 'fa-chalkboard-teacher',
            iconColor: 'icon-amber',
            category: 'nav',
            badge: 'Educator',
            url: '/pages/teachers.php',
            keywords: ['teacher', 'educator', 'pacing', 'standards', 'lesson plan', 'curriculum']
        },
        {
            id: 'nav-parents',
            title: 'Parents Resource Hub',
            desc: 'Home practice guides, IEP support, and progress trackers',
            icon: 'fa-heart',
            iconColor: 'icon-rose',
            category: 'nav',
            badge: 'Family',
            url: '/pages/parents.php',
            keywords: ['parents', 'family', 'home', 'iep', 'support', 'guide']
        },
        {
            id: 'nav-library',
            title: 'Digital Story Library',
            desc: 'Accessible story reader with multi-level books and audio',
            icon: 'fa-book-reader',
            iconColor: 'icon-emerald',
            category: 'nav',
            badge: 'Reading',
            url: '/library/',
            keywords: ['library', 'books', 'stories', 'reading', 'read', 'literature']
        },
        {
            id: 'nav-student',
            title: 'Student Hub & Daily Quests',
            desc: 'View daily challenges, streak counter, and earned XP',
            icon: 'fa-user-graduate',
            iconColor: 'icon-blue',
            category: 'nav',
            badge: 'Dashboard',
            url: '/student/',
            keywords: ['student', 'quests', 'xp', 'streak', 'rewards', 'dashboard']
        },
        {
            id: 'nav-games',
            title: 'Accessible Games Zone',
            desc: 'Phonics bingo, math sprint, memory match, and sound games',
            icon: 'fa-gamepad',
            iconColor: 'icon-purple',
            category: 'nav',
            badge: 'Games',
            url: '/pages/games.php',
            keywords: ['games', 'play', 'arcade', 'bingo', 'math race', 'fun', 'activities']
        },
        {
            id: 'nav-search',
            title: 'Full-Site Search Engine',
            desc: 'Search all levels, books, guides, and lessons instantaneously',
            icon: 'fa-search',
            iconColor: 'icon-teal',
            category: 'nav',
            badge: 'Search',
            url: '/pages/search.php',
            keywords: ['search', 'find', 'lookup', 'index', 'explore']
        },
        {
            id: 'nav-standards',
            title: 'Academic Standards Directory',
            desc: 'CCSS, TEKS, and national curriculum benchmarks',
            icon: 'fa-award',
            iconColor: 'icon-amber',
            category: 'nav',
            badge: 'Standards',
            url: '/pages/standards.php',
            keywords: ['standards', 'ccss', 'teks', 'common core', 'benchmarks']
        },
        {
            id: 'nav-about',
            title: 'About the Creator',
            desc: 'Hesten\'s background, educational mission, and classroom roots',
            icon: 'fa-address-card',
            iconColor: 'icon-rose',
            category: 'nav',
            badge: 'About',
            url: '/pages/about-me.php',
            keywords: ['about', 'hesten', 'creator', 'bio', 'story', 'mission']
        },
        {
            id: 'nav-updates',
            title: 'Platform Updates & Planning Docs',
            desc: 'Engineering changelogs, implementation plans, and release walkthroughs',
            icon: 'fa-code-branch',
            iconColor: 'icon-indigo',
            category: 'nav',
            badge: 'Docs',
            url: '/updates.php',
            keywords: ['updates', 'plans', 'walkthroughs', 'changelog', 'roadmap', 'release', 'notes', 'docs']
        },
        {
            id: 'nav-profile',
            title: 'Official Report Card & Mastery',
            desc: 'Review mastery velocity, grades, and completed lessons',
            icon: 'fa-chart-line',
            iconColor: 'icon-emerald',
            category: 'nav',
            badge: 'Profile',
            url: '/pages/profile.php',
            keywords: ['profile', 'report card', 'mastery', 'grades', 'progress', 'stats']
        },

        // Platform Actions
        {
            id: 'action-theme',
            title: 'Toggle Light / Dark Theme',
            desc: 'Switch between crisp daytime and eye-friendly dark mode',
            icon: 'fa-moon',
            iconColor: 'icon-purple',
            category: 'actions',
            badge: 'Theme',
            action: function () {
                if (typeof window.toggleTheme === 'function') {
                    window.toggleTheme();
                } else {
                    const html = document.documentElement;
                    const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                    html.setAttribute('data-theme', next);
                    try { localStorage.setItem('theme', next); } catch (e) {}
                }
            },
            keywords: ['theme', 'dark', 'light', 'mode', 'contrast', 'color']
        },
        {
            id: 'action-timer',
            title: 'Open Focus Timer & Stopwatch',
            desc: 'Track study sessions with the floating countdown tool',
            icon: 'fa-stopwatch',
            iconColor: 'icon-rose',
            category: 'actions',
            badge: 'Utility',
            action: function () {
                const btn = document.getElementById('timer-toggle');
                if (btn) btn.click();
            },
            keywords: ['timer', 'stopwatch', 'clock', 'sprint', 'pomodoro']
        },
        {
            id: 'action-scratchpad',
            title: 'Open Scratchpad & Notepad',
            desc: 'Sketch math problems or jot down quick ideas on screen',
            icon: 'fa-pen',
            iconColor: 'icon-emerald',
            category: 'actions',
            badge: 'Utility',
            action: function () {
                const btn = document.getElementById('scratchpad-toggle');
                if (btn) btn.click();
            },
            keywords: ['scratchpad', 'notes', 'draw', 'sketch', 'notepad']
        },
        {
            id: 'action-citation',
            title: 'Generate Academic Citation',
            desc: 'APA, MLA, and Chicago reference generator for this page',
            icon: 'fa-quote-right',
            iconColor: 'icon-blue',
            category: 'actions',
            badge: 'Cite',
            action: function () {
                const btn = document.getElementById('citation-toggle');
                if (btn) btn.click();
            },
            keywords: ['citation', 'cite', 'apa', 'mla', 'bib', 'reference']
        },
        {
            id: 'action-print',
            title: 'Print Current Page',
            desc: 'Clean, printable layout optimized for worksheets and notes',
            icon: 'fa-print',
            iconColor: 'icon-amber',
            category: 'actions',
            badge: 'Print',
            action: function () {
                window.print();
            },
            keywords: ['print', 'pdf', 'paper', 'export', 'hardcopy']
        },

        // Accessibility Controls
        {
            id: 'a11y-dyslexia',
            title: 'Toggle Dyslexia-Friendly Font',
            desc: 'Enable OpenDyslexic weighted typeface across the whole site',
            icon: 'fa-font',
            iconColor: 'icon-blue',
            category: 'a11y',
            badge: 'A11y',
            action: function () {
                if (typeof window.toggleDyslexiaFont === 'function') {
                    window.toggleDyslexiaFont();
                } else {
                    document.body.classList.toggle('dyslexia-font');
                }
            },
            keywords: ['dyslexia', 'font', 'opendyslexic', 'typography', 'accessibility', 'a11y']
        },
        {
            id: 'a11y-reading-mask',
            title: 'Toggle Reading Focus Mask',
            desc: 'Dim surrounding content with a customizable horizontal window',
            icon: 'fa-eye',
            iconColor: 'icon-teal',
            category: 'a11y',
            badge: 'A11y',
            action: function () {
                if (typeof window.toggleReadingMask === 'function') {
                    window.toggleReadingMask();
                } else {
                    const mask = document.getElementById('reading-mask');
                    if (mask) mask.classList.toggle('active');
                }
            },
            keywords: ['reading mask', 'focus', 'adhd', 'ruler', 'guide', 'tracking']
        },
        {
            id: 'a11y-panel',
            title: 'Open Accessibility Settings Panel',
            desc: 'Adjust line spacing, contrast, cursor size, and motion',
            icon: 'fa-universal-access',
            iconColor: 'icon-purple',
            category: 'a11y',
            badge: 'A11y',
            action: function () {
                const btn = document.getElementById('a11y-toggle-button');
                if (btn) btn.click();
            },
            keywords: ['accessibility', 'contrast', 'text size', 'cursor', 'reduce motion']
        }
    ];

    let overlay = null;
    let searchInput = null;
    let resultsContainer = null;
    let activeCategory = 'all';
    let filteredItems = [];
    let selectedIndex = 0;
    let lastActiveElement = null;

    function init() {
        overlay = document.getElementById('cmd-palette-overlay');
        if (!overlay) return;

        searchInput = document.getElementById('cmd-search-input');
        resultsContainer = document.getElementById('cmd-palette-results');
        const closeBtn = document.getElementById('cmd-close-btn');
        const backdrop = document.getElementById('cmd-palette-backdrop');
        const tabBtns = overlay.querySelectorAll('.cmd-tab-btn');

        // Close handlers
        if (closeBtn) closeBtn.addEventListener('click', closePalette);
        if (backdrop) backdrop.addEventListener('click', closePalette);

        // Tab selection
        tabBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                tabBtns.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
                activeCategory = btn.getAttribute('data-category') || 'all';
                renderResults();
            });
        });

        // Search typing
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                renderResults();
            });

            // Keyboard navigation inside search input
            searchInput.addEventListener('keydown', handleKeyNavigation);
        }

        // Global hotkeys (Ctrl+K, Cmd+K, ?)
        document.addEventListener('keydown', function (e) {
            // Check for Ctrl+K or Cmd+K
            if ((e.ctrlKey || e.metaKey) && (e.key === 'k' || e.key === 'K')) {
                e.preventDefault();
                togglePalette();
                return;
            }

            // Check for '?' when not typing in an editable field
            if (e.key === '?' && !isEditingText(e.target)) {
                e.preventDefault();
                openPalette();
                return;
            }

            // ESC to close when palette is open
            if (e.key === 'Escape' && overlay.style.display !== 'none') {
                e.preventDefault();
                closePalette();
            }
        });

        // Expose global methods
        window.openCommandPalette = openPalette;
        window.closeCommandPalette = closePalette;
        window.toggleCommandPalette = togglePalette;
    }

    function isEditingText(element) {
        if (!element) return false;
        const tag = element.tagName.toLowerCase();
        if (tag === 'input' || tag === 'textarea' || tag === 'select') return true;
        if (element.isContentEditable) return true;
        return false;
    }

    function openPalette() {
        if (!overlay) return;
        lastActiveElement = document.activeElement;
        overlay.style.display = 'flex';
        if (searchInput) {
            searchInput.value = '';
            searchInput.focus();
        }
        selectedIndex = 0;
        renderResults();
    }

    function closePalette() {
        if (!overlay) return;
        overlay.style.display = 'none';
        if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
            lastActiveElement.focus();
        }
    }

    function togglePalette() {
        if (overlay && overlay.style.display !== 'none') {
            closePalette();
        } else {
            openPalette();
        }
    }

    function renderResults() {
        if (!resultsContainer) return;

        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();

        // Filter items
        filteredItems = COMMAND_ITEMS.filter(function (item) {
            // Category match
            if (activeCategory !== 'all') {
                if (activeCategory === 'a11y' && item.category !== 'a11y') return false;
                if (activeCategory === 'actions' && item.category !== 'actions') return false;
                if (activeCategory === 'nav' && item.category !== 'nav') return false;
            }

            // Query match
            if (!query) return true;
            if (item.title.toLowerCase().includes(query)) return true;
            if (item.desc.toLowerCase().includes(query)) return true;
            if (item.keywords && item.keywords.some(k => k.toLowerCase().includes(query))) return true;

            return false;
        });

        // Ensure selected index is valid
        if (selectedIndex >= filteredItems.length) {
            selectedIndex = Math.max(0, filteredItems.length - 1);
        }

        // Render empty state or items
        if (filteredItems.length === 0) {
            resultsContainer.innerHTML = `
                <div class="cmd-empty-state">
                    <i class="fas fa-search-minus"></i>
                    <p style="font-weight: 700; margin-bottom: 0.25rem;">No commands or destinations found</p>
                    <p style="font-size: 0.8125rem;">Try searching for "levels", "theme", "games", or "a11y"</p>
                </div>
            `;
            return;
        }

        // Group by category if viewing 'all'
        let html = '';
        filteredItems.forEach(function (item, index) {
            const isSelected = index === selectedIndex;
            html += `
                <div class="cmd-item ${isSelected ? 'is-selected' : ''}" 
                     data-index="${index}" 
                     role="option" 
                     aria-selected="${isSelected}">
                    <div class="cmd-item-left">
                        <div class="cmd-item-icon ${item.iconColor}">
                            <i class="fas ${item.icon}" aria-hidden="true"></i>
                        </div>
                        <div class="cmd-item-text">
                            <span class="cmd-item-title">${escapeHtml(item.title)}</span>
                            <span class="cmd-item-desc">${escapeHtml(item.desc)}</span>
                        </div>
                    </div>
                    <span class="cmd-item-badge">${escapeHtml(item.badge)}</span>
                </div>
            `;
        });

        resultsContainer.innerHTML = html;

        // Wire click and hover events on rendered items
        const itemEls = resultsContainer.querySelectorAll('.cmd-item');
        itemEls.forEach(function (el) {
            el.addEventListener('click', function () {
                const idx = parseInt(el.getAttribute('data-index'), 10);
                executeItem(filteredItems[idx]);
            });

            el.addEventListener('mouseenter', function () {
                const idx = parseInt(el.getAttribute('data-index'), 10);
                selectedIndex = idx;
                updateSelectionUI();
            });
        });

        scrollSelectedIntoView();
    }

    function updateSelectionUI() {
        if (!resultsContainer) return;
        const itemEls = resultsContainer.querySelectorAll('.cmd-item');
        itemEls.forEach(function (el, idx) {
            if (idx === selectedIndex) {
                el.classList.add('is-selected');
                el.setAttribute('aria-selected', 'true');
            } else {
                el.classList.remove('is-selected');
                el.setAttribute('aria-selected', 'false');
            }
        });
    }

    function scrollSelectedIntoView() {
        if (!resultsContainer) return;
        const selectedEl = resultsContainer.querySelector('.cmd-item.is-selected');
        if (selectedEl) {
            selectedEl.scrollIntoView({ block: 'nearest' });
        }
    }

    function handleKeyNavigation(e) {
        if (filteredItems.length === 0) return;

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            selectedIndex = (selectedIndex + 1) % filteredItems.length;
            updateSelectionUI();
            scrollSelectedIntoView();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            selectedIndex = (selectedIndex - 1 + filteredItems.length) % filteredItems.length;
            updateSelectionUI();
            scrollSelectedIntoView();
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (filteredItems[selectedIndex]) {
                executeItem(filteredItems[selectedIndex]);
            }
        }
    }

    function executeItem(item) {
        if (!item) return;
        closePalette();

        if (typeof item.action === 'function') {
            try {
                item.action();
            } catch (err) {
                console.error('[CommandPalette] Action error:', err);
            }
        } else if (item.url) {
            window.location.href = item.url;
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // Auto-init on DOMContentLoaded or immediately if ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
