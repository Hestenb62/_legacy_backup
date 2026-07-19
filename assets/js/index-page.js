// index-page.js - Logic for the main landing page

// --- STATE ---
let completedLevels = [];
let bookmarkedLevels = [];
let currentCategory = 'all';

// --- INIT ---
document.addEventListener("DOMContentLoaded", () => {
    loadState();
    if (typeof learningLevels !== 'undefined') {
        renderLevels(learningLevels); // Render grid from JS data
        applyFilters(); // Apply category filters immediately on load
    }
    checkStreak();
    updateHeroGreeting();
    renderFocusRecommendations(); // NEW: Diagnostic Recommendations Loop

    // Search & Filter Listeners
    const searchInput = document.getElementById('level-search');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const heroSearch = document.getElementById('hero-search');
            if (heroSearch) heroSearch.value = e.target.value;
            debounce(applyFilters, 200)();
        });
    }
});

const THEME_MAP = {
    'elem': { 'icon_bg': 'theme-elem-bg', 'icon_text': 'theme-elem-text', 'label': 'Elementary' },
    'middle': { 'icon_bg': 'theme-middle-bg', 'icon_text': 'theme-middle-text', 'label': 'Middle School' },
    'high': { 'icon_bg': 'theme-high-bg', 'icon_text': 'theme-high-text', 'label': 'High School' },
    'extra': { 'icon_bg': 'theme-extra-bg', 'icon_text': 'theme-extra-text', 'label': 'Extra' }
};

function renderLevels(data) {
    const grid = document.getElementById('level-grid');
    if (!grid) return;

    grid.innerHTML = data.map((level, index) => {
        const theme = THEME_MAP[level.category] || THEME_MAP.elem;
        const keywords = level.keywords ? level.keywords.toLowerCase() : '';
        const safeTitle = level.title.replace(/'/g, "\\'");
        const safeDesc = level.description.replace(/'/g, "\\'");

        return `
        <article class="level-card group relative flex flex-col h-full animate-reveal"
            style="animation-delay: ${index * 50}ms"
            data-category="${level.category}"
            data-display-title="${level.title}"
            data-title="${level.title.toLowerCase()}"
            data-desc="${level.description}"
            data-keywords="${keywords}"
            data-icon="${level.icon}"
            data-doc="${encodeURIComponent(level.documentation || '')}"
            data-id="${level.id}">

            <div class="level-card-inner">
                <div class="level-card-glow group-hover-glow"></div>
                
                <div class="level-card-header">
                    <div class="level-card-title-group">
                        <div class="level-card-icon ${theme.icon_bg} ${theme.icon_text}">
                            <i class="${level.icon}"></i>
                        </div>
                        <div>
                            <h3 class="level-card-title">${level.title}</h3>
                            <span class="level-card-category">${theme.label}</span>
                        </div>
                    </div>
                    <div class="level-card-actions">
                        <button type="button" class="bookmark-btn level-action-btn"
                            onclick="toggleBookmark('${level.id}', this)" aria-label="Bookmark ${level.title}">
                            <i class="far fa-star"></i>
                        </button>
                        <button type="button" class="complete-btn level-action-btn"
                            onclick="toggleCompletion('${level.id}', this)" aria-label="Mark ${level.title} as Complete">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

                <p class="level-card-desc">${level.description}</p>

                <div class="level-card-footer">
                    <button type="button" aria-haspopup="dialog" class="level-doc-btn"
                        onclick="openDocModal(this)">
                        <i class="fas fa-book-open"></i> Curriculum
                    </button>
                    <div class="level-card-links">
                        <button type="button" class="level-listen-btn"
                            onclick="speakCard(this, '${safeTitle}', '${safeDesc}')" aria-label="Listen to description">
                            <i class="fas fa-volume-up"></i>
                        </button>
                        <a href="${level.link}" aria-label="Explore ${level.title}" class="level-open-btn">
                            <span>Open</span>
                            <i class="fas fa-arrow-right icon-sm"></i>
                        </a>
                    </div>
                </div>
                <div class="completion-bar"></div>
            </div>
        </article>`;
    }).join('');

    // Apply saved state to new elements
    hydrateGrid();

    // Setup Intersection Observer for the new elements
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-reveal');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.level-card').forEach(el => {
        revealObserver.observe(el);
    });

    // Ensure filtering logic hides new extra tiles on initial render
    applyFilters();
}

function loadState() {
    try {
        completedLevels = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
        bookmarkedLevels = JSON.parse(localStorage.getItem('hl_bookmarked_levels') || '[]');
    } catch (e) { console.error(e); }
}

function hydrateGrid() {
    // Complete Buttons & Styles
    completedLevels.forEach(id => {
        const card = document.querySelector(`.level-card[data-id="${id}"]`);
        if (card) markCardComplete(card, true);
    });

    // Bookmarks
    bookmarkedLevels.forEach(id => {
        const btn = document.querySelector(`.level-card[data-id="${id}"] .bookmark-btn`);
        if (btn) markBtnBookmarked(btn, true);
    });

    // Stats
    updateStats();

    // Resume Banner
    checkResumeLearning();
}

// --- ACTIONS ---

function openDocModal(btn) {
    const card = btn.closest('.level-card');
    const title = card.dataset.displayTitle;
    const desc = card.dataset.desc;
    const iconClass = card.dataset.icon;
    const docs = decodeURIComponent(card.dataset.doc);

    const category = card.dataset.category;

    const modal = document.getElementById('doc-modal');
    const modalContainer = document.getElementById('modal-container');
    const modalContent = modal.querySelector('.doc-modal-content');

    // Theme mapping for Modal
    const themes = {
        'elem': { color: '#14b8a6', bg: 'rgba(20, 184, 166, 0.1)', text: 'Elementary Path' },
        'middle': { color: '#f59e0b', bg: 'rgba(245, 158, 11, 0.1)', text: 'Middle School Path' },
        'high': { color: '#e11d48', bg: 'rgba(225, 29, 72, 0.1)', text: 'High School Path' },
        'extra': { color: '#7c3aed', bg: 'rgba(124, 58, 237, 0.1)', text: 'Extra Resources' }
    };
    const activeTheme = themes[category] || themes['elem'];

    // Apply Theme to Modal
    modalContainer.style.borderTopColor = activeTheme.color;
    document.documentElement.style.setProperty('--color-primary', activeTheme.color);
    document.documentElement.style.setProperty('--color-primary-rgb', category === 'elem' ? '20, 184, 166' : (category === 'middle' ? '245, 158, 11' : (category === 'high' ? '225, 29, 72' : '124, 58, 237')));

    const iconContainer = document.getElementById('modal-icon-container');
    iconContainer.style.backgroundColor = activeTheme.bg;

    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-subtitle').textContent = activeTheme.text;
    document.getElementById('modal-icon').className = iconClass;
    document.getElementById('modal-icon').style.color = activeTheme.color;
    document.getElementById('modal-desc').textContent = desc;

    const docsContainer = document.getElementById('modal-docs');
    if (docs && docs.trim() !== '') {
        const parser = new DOMParser();
        const docEl = parser.parseFromString(docs, 'text/html');
        const h4 = docEl.querySelector('h4');
        const subjectsDiv = docEl.querySelector('div.space-y-4');

        if (h4 && subjectsDiv) {
            const titleText = h4.textContent;
            const items = Array.from(subjectsDiv.children);

            let tabHeaders = '<div class="doc-modal-tab-container">';
            // Add sliding pill background
            tabHeaders += '<div id="modal-tab-slider" class="doc-modal-tab-slider"></div>';
            let tabContents = '<div class="doc-modal-pane-container">';

            items.forEach((item, index) => {
                const h5 = item.querySelector('h5');
                const subjectName = h5 ? h5.textContent : `Module ${index + 1}`;
                let bodyHtml = item.innerHTML;
                if (h5) {
                    bodyHtml = bodyHtml.replace(h5.outerHTML, '');
                }

                const isActive = index === 0;
                const activeClass = isActive ? 'active' : '';

                tabHeaders += `<button type="button" class="modal-tab-pill ${activeClass}" data-index="${index}" onclick="switchModalTab(this, ${index})">
                    ${subjectName}
                </button>`;

                const contentClass = isActive ? 'doc-modal-pane active' : 'doc-modal-pane';
                const staggerDelay = isActive ? '0s' : `${index * 0.05}s`;
                tabContents += `<div class="${contentClass}" data-index="${index}" style="animation-delay: ${staggerDelay}">
                    <div class="doc-modal-pane-inner">
                        <div class="doc-modal-pane-glow"></div>
                        <div class="doc-modal-pane-content prose-content">
                            ${bodyHtml}
                        </div>
                    </div>
                </div>`;
            });

            tabHeaders += '</div>';
            tabContents += '</div>';

            docsContainer.innerHTML = `<h4 class="doc-modal-curriculum-title">
                <span class="doc-modal-curriculum-dot"></span> ${titleText}
            </h4>${tabHeaders}${tabContents}`;

            // Initialize slider position
            setTimeout(() => {
                const firstTab = document.querySelector('.modal-tab-pill');
                if (firstTab) updateModalTabSlider(firstTab);
            }, 50);
        } else {
            docsContainer.innerHTML = `<div class="doc-modal-fallback-box">${docs}</div>`;
        }
    } else {
        docsContainer.innerHTML = '<div class="doc-modal-empty-box"><i class="fas fa-sparkles doc-modal-empty-icon"></i><p class="doc-modal-empty-text">Detailed curriculum is being prepared for this journey.</p></div>';
    }

    // Position modal container centered horizontally, aligned vertically with tile height
    if (card) {
        const rect = card.getBoundingClientRect();
        const viewportHeight = window.innerHeight;
        const modalHeight = Math.min(viewportHeight * 0.85, 750);
        
        let targetTop = rect.top;
        if (targetTop + modalHeight > viewportHeight - 20) {
            targetTop = Math.max(20, viewportHeight - modalHeight - 20);
        } else {
            targetTop = Math.max(20, targetTop);
        }

        modalContainer.style.position = 'fixed';
        modalContainer.style.top = `${targetTop}px`;
        modalContainer.style.left = '50%';
        modalContainer.style.transform = 'translateX(-50%)';
        modalContainer.style.margin = '0';
    }

    // Show modal
    modal.classList.remove('hidden');
    void modal.offsetWidth;
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100');
    modalContent.classList.remove('scale-90', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
    document.body.style.overflow = 'hidden';
}

function closeDocModal() {
    const modal = document.getElementById('doc-modal');
    const modalContent = modal.querySelector('.doc-modal-content');

    // Animate out
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');

    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-90', 'opacity-0');

    // Wait for transition before hiding
    setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        modalContent.style.position = '';
        modalContent.style.top = '';
        modalContent.style.left = '';
        modalContent.style.transform = '';
        modalContent.style.margin = '';
        // Re-enable body scrolling
        document.body.style.overflow = '';
    }, 300);
}

function printCurriculum() {
    const modalTitle = document.getElementById('modal-title')?.textContent || 'Curriculum';
    const modalSubtitle = document.getElementById('modal-subtitle')?.textContent || '';
    const modalDesc = document.getElementById('modal-desc')?.textContent || '';
    const docsContainer = document.getElementById('modal-docs');

    if (!docsContainer) {
        window.print();
        return;
    }

    let curriculumSectionsHtml = '';
    const pills = Array.from(docsContainer.querySelectorAll('.modal-tab-pill'));
    const panes = Array.from(docsContainer.querySelectorAll('.doc-modal-pane, .modal-tab-pane'));

    if (panes.length > 0) {
        panes.forEach((pane, idx) => {
            const subjectName = pills[idx] ? pills[idx].textContent.trim() : `Module ${idx + 1}`;
            const content = pane.querySelector('.doc-modal-pane-content, .prose-content') || pane;
            curriculumSectionsHtml += `
                <div style="margin-bottom: 2rem; page-break-inside: avoid;">
                    <h2 style="font-size: 1.2rem; font-weight: 700; color: #1e40af; border-bottom: 2px solid #3b82f6; padding-bottom: 0.35rem; margin-bottom: 0.75rem;">
                        ${subjectName}
                    </h2>
                    <div class="prose-content" style="font-size: 0.95rem; color: #1f2937; line-height: 1.6;">
                        ${content.innerHTML}
                    </div>
                </div>
            `;
        });
    } else {
        curriculumSectionsHtml = docsContainer.innerHTML;
    }

    const printWin = window.open('', '_blank', 'width=900,height=750');
    if (!printWin) {
        window.print();
        return;
    }

    const printDoc = `
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>${modalTitle} - Printed Curriculum</title>
            <style>
                body {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                    margin: 0;
                    padding: 2.5rem;
                    color: #111827;
                    background: #fff;
                }
                .header {
                    margin-bottom: 2rem;
                    padding-bottom: 1rem;
                    border-bottom: 2px solid #e5e7eb;
                }
                .title {
                    font-size: 2rem;
                    font-weight: 800;
                    margin: 0 0 0.35rem 0;
                    color: #0f172a;
                }
                .subtitle {
                    font-size: 1.05rem;
                    font-weight: 600;
                    color: #64748b;
                    margin: 0;
                }
                .desc-box {
                    background: #f8fafc;
                    border-left: 4px solid #3b82f6;
                    padding: 1rem;
                    margin-bottom: 2rem;
                    border-radius: 0 0.5rem 0.5rem 0;
                    font-size: 0.95rem;
                    color: #334155;
                }
                .prose-content h5 {
                    font-size: 1.1rem;
                    font-weight: 700;
                    color: #1d4ed8;
                    margin: 1.25rem 0 0.35rem 0;
                }
                .prose-content p {
                    margin: 0 0 0.5rem 0;
                    line-height: 1.6;
                }
                .prose-content span {
                    display: inline-block;
                    font-size: 0.75rem;
                    font-weight: 700;
                    background: #f1f5f9;
                    color: #475569;
                    border: 1px solid #cbd5e1;
                    padding: 0.2rem 0.5rem;
                    border-radius: 0.25rem;
                    margin-top: 0.35rem;
                }
                .footer {
                    margin-top: 3rem;
                    padding-top: 1rem;
                    border-top: 1px solid #e2e8f0;
                    font-size: 0.85rem;
                    color: #94a3b8;
                    text-align: center;
                }
                @media print {
                    body { padding: 1.5rem; }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1 class="title">${modalTitle}</h1>
                <p class="subtitle">${modalSubtitle} • Hesten's Learning</p>
            </div>
            ${modalDesc ? `<div class="desc-box">${modalDesc}</div>` : ''}
            <div>
                ${curriculumSectionsHtml}
            </div>
            <div class="footer">
                <p>Hesten's Learning &copy; ${new Date().getFullYear()} • Printed Curriculum</p>
            </div>
            <script>
                window.onload = function() {
                    window.print();
                    setTimeout(function() { window.close(); }, 500);
                };
            </script>
        </body>
        </html>
    `;

    printWin.document.write(printDoc);
    printWin.document.close();
}

function switchModalTab(btn, index) {
    const container = btn.closest('#modal-docs');
    const btns = container.querySelectorAll('.modal-tab-pill');
    const panes = container.querySelectorAll('.modal-tab-pane');

    btns.forEach(b => {
        b.classList.remove('active');
    });

    btn.classList.add('active');

    updateModalTabSlider(btn);

    panes.forEach(p => {
        if (parseInt(p.dataset.index) === index) {
            p.classList.add('active');
            p.style.animationDelay = '0s';
        } else {
            p.classList.remove('active');
        }
    });
}

function updateModalTabSlider(btn) {
    const slider = document.getElementById('modal-tab-slider');
    if (!slider) return;
    slider.style.width = btn.offsetWidth + 'px';
    slider.style.left = btn.offsetLeft + 'px';
}

function toggleCompletion(id, btn) {
    const card = btn.closest('.level-card');
    const index = completedLevels.indexOf(id);
    const isComplete = index === -1;

    if (isComplete) {
        completedLevels.push(id);
        triggerConfettiBtn(btn);
        markCardComplete(card, true);
    } else {
        completedLevels.splice(index, 1);
        markCardComplete(card, false);
    }

    saveState();
    updateStats();
    checkResumeLearning();
}

function markCardComplete(card, isComplete) {
    const bar = card.querySelector('.completion-bar');
    const btn = card.querySelector('.complete-btn');
    const contentDiv = card.querySelector('.shadow-premium');

    if (isComplete) {
        if (bar) bar.style.width = '100%';
        if (btn) {
            btn.classList.add('btn-completed');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.add('card-completed');
    } else {
        if (bar) bar.style.width = '0%';
        if (btn) {
            btn.classList.remove('btn-completed');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.remove('card-completed');
    }
}

function toggleBookmark(id, btn) {
    const index = bookmarkedLevels.indexOf(id);
    const isBookmarked = index === -1;

    if (isBookmarked) {
        bookmarkedLevels.push(id);
        markBtnBookmarked(btn, true);
    } else {
        bookmarkedLevels.splice(index, 1);
        markBtnBookmarked(btn, false);
    }
    saveState();
}

function markBtnBookmarked(btn, active) {
    if (active) {
        btn.classList.add('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
        btn.classList.remove('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
        btn.innerHTML = '<i class="fas fa-star text-sm"></i>'; // Solid star
    } else {
        btn.classList.remove('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
        btn.classList.add('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
        btn.innerHTML = '<i class="far fa-star text-sm"></i>'; // Outline star
    }
}

function saveState() {
    localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
    localStorage.setItem('hl_bookmarked_levels', JSON.stringify(bookmarkedLevels));
}

function updateStats() {
    const total = typeof learningLevels !== 'undefined' ? learningLevels.length : 0;
    const count = completedLevels.length;
    const pct = total ? Math.round((count / total) * 100) : 0;
    const el = document.getElementById('user-progress-stat');
    if (el) el.textContent = pct + '%';
}


// --- FILTERING ---

function setCategory(btn, cat, scrollToGrid = false) {
    currentCategory = cat;

    // Update Tab active states
    document.querySelectorAll('.path-tab').forEach(t => {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
    });

    if (btn && btn.classList.contains('path-tab')) {
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
    }

    // Update Path Cards
    document.querySelectorAll('.path-card').forEach(b => {
        b.classList.remove('journey-path-active', 'ring-4', 'ring-primary/20');
    });

    if (cat !== 'all' && btn && btn.classList.contains('path-card')) {
        btn.classList.add('journey-path-active', 'ring-4', 'ring-primary/20');
    }

    applyFilters();

    if (scrollToGrid) {
        const grid = document.getElementById('main-content');
        grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function applyFilters() {
    const term = document.getElementById('level-search').value.toLowerCase().trim();
    const cards = document.querySelectorAll('.level-card');
    const clearBtn = document.getElementById('clear-search');
    let visibleCount = 0;

    if (term) clearBtn.classList.remove('hidden');
    else clearBtn.classList.add('hidden');

    cards.forEach(card => {
        const cat = card.dataset.category;
        const cardId = card.dataset.id;
        
        // 'all' shows main academic paths + Test/Extra tile after Grade 12
        // 'extra' tab shows ONLY the 3 new tiles: AP US History, American Yawp, and Practice GED
        let matchesCat = false;
        if (currentCategory === 'all') {
            matchesCat = cat !== 'extra' || cardId === 'test-section';
        } else if (currentCategory === 'extra') {
            matchesCat = cat === 'extra' && cardId !== 'test-section';
        } else {
            matchesCat = cat === currentCategory;
        }
        const matchesSearch = !term ||
            card.dataset.title.includes(term) ||
            card.dataset.desc.includes(term) ||
            (card.dataset.keywords && card.dataset.keywords.includes(term));

        if (matchesCat && matchesSearch) {
            card.classList.remove('hidden');
            card.style.display = 'flex';
            visibleCount++;
        } else {
            card.classList.add('hidden');
            card.style.display = 'none';
        }
    });

    // Update UI
    const grid = document.getElementById('level-grid');
    const noRes = document.getElementById('no-results');
    const countLabel = document.getElementById('results-count');
    const sectionTitle = document.getElementById('section-title');

    if (visibleCount === 0) {
        grid.classList.add('hidden');
        noRes.classList.remove('hidden');
    } else {
        grid.classList.remove('hidden');
        noRes.classList.add('hidden');
    }

    const catNames = {
        'all': 'Full Journey',
        'elem': 'Elementary Path',
        'middle': 'Middle School Path',
        'high': 'High School Path',
        'extra': 'Extra Resources'
    };

    sectionTitle.textContent = catNames[currentCategory] || 'Academic Path';
    countLabel.textContent = `${visibleCount} levels available`;
}

function resetFilters() {
    document.getElementById('level-search').value = '';
    setCategory(null, 'all');
}

// --- UTILS ---

function debounce(func, wait) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

function checkStreak() {
    const lastVisit = localStorage.getItem('hl_last_visit');
    const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');
    const today = new Date().toDateString();
    const el = document.getElementById('streak-stat');

    if (!el) return;

    if (lastVisit === today) {
        el.textContent = streakCount;
    } else if (lastVisit) {
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);
        if (lastVisit === yesterday.toDateString()) {
            const newStreak = streakCount + 1;
            localStorage.setItem('hl_streak', newStreak);
            el.textContent = newStreak;
            localStorage.setItem('hl_last_visit', today);
        } else {
            localStorage.setItem('hl_streak', 1);
            el.textContent = 1;
            localStorage.setItem('hl_last_visit', today);
        }
    } else {
        localStorage.setItem('hl_streak', 1);
        el.textContent = 1;
        localStorage.setItem('hl_last_visit', today);
    }
}

function triggerConfettiBtn(btn) {
    // Simple confetti effect centered on button
    const rect = btn.getBoundingClientRect();
    const x = (rect.left + rect.width / 2) / window.innerWidth;
    const y = (rect.top + rect.height / 2) / window.innerHeight;

    if (typeof triggerConfetti === 'function') {
        triggerConfetti({ x, y });
    }
}

function checkResumeLearning() {
    const banner = document.getElementById('resume-banner');
    if (!banner) return;

    const allCards = Array.from(document.querySelectorAll('.level-card'));
    const nextLevelCard = allCards.find(c => !completedLevels.includes(c.dataset.id));

    if (nextLevelCard && completedLevels.length > 0) {
        const levelName = nextLevelCard.querySelector('h3').textContent.trim();
        document.getElementById('next-level-name').textContent = levelName;

        const link = nextLevelCard.querySelector('a').href;
        const clickArea = document.getElementById('resume-click-area');
        if (clickArea) clickArea.onclick = () => window.location.href = link;

        banner.classList.remove('hidden');
        banner.classList.add('animate-reveal');
    } else {
        banner.classList.add('hidden');
    }
}

function updateHeroGreeting() {
    const hour = new Date().getHours();
    const el = document.getElementById('hero-dynamic-greeting');
    if (!el) return;

    let greeting = "THE LEARNING ODYSSEY";
    if (hour < 12) greeting = "Good Morning Odyssey";
    else if (hour < 18) greeting = "Good Afternoon Journey";
    else greeting = "Good Evening Odyssey";

    el.textContent = greeting.toUpperCase();
}

function syncSearch(val) {
    const mainSearch = document.getElementById('level-search');
    if (mainSearch) {
        mainSearch.value = val;
        applyFilters();
    }
}

function speakCard(btn, title, desc) {
    if ('speechSynthesis' in window) {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
        }
        const utterance = new SpeechSynthesisUtterance(title + ". " + desc);
        window.speechSynthesis.speak(utterance);
    }
}

// --- DIAGNOSTIC RECOMMENDED FOCUS AREAS ---
function renderFocusRecommendations() {
    const STORAGE_KEY = "hl_missed_standards";
    let missed = [];
    try {
        missed = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
    } catch (e) {}

    if (missed.length === 0) return;

    const mainContent = document.getElementById('main-content');
    if (!mainContent) return;

    const container = document.createElement('section');
    container.id = 'a11y-focus-recommendations';
    container.className = 'focus-rec-section animate-reveal';
    
    container.innerHTML = `
        <div class="focus-rec-glow-1"></div>
        <div class="focus-rec-glow-2"></div>
        
        <header class="focus-rec-header">
            <div>
                <h3 class="focus-rec-title">
                    <span class="focus-rec-icon-box">
                        <i class="fas fa-bullseye"></i>
                    </span>
                    Recommended Focus Areas
                </h3>
                <p class="focus-rec-subtitle">Based on your latest assessments, practicing these levels will help you grow!</p>
            </div>
            <button onclick="clearFocusRecommendations()" class="focus-rec-clear-btn">
                <i class="fas fa-trash-alt icon-sm"></i> Clear Recommendations
            </button>
        </header>
        
        <div class="focus-rec-grid" id="recommendations-grid">
            <!-- Focus cards injected here -->
        </div>
    `;

    // Insert right after the resume-banner, or as the first element inside mainContent
    const resumeBanner = document.getElementById('resume-banner');
    if (resumeBanner) {
        resumeBanner.parentNode.insertBefore(container, resumeBanner.nextSibling);
    } else {
        mainContent.insertBefore(container, mainContent.firstChild);
    }

    const grid = document.getElementById('recommendations-grid');
    if (!grid) return;

    let cardsHtml = '';
    missed.forEach(item => {
        const levelData = typeof learningLevels !== 'undefined' ? learningLevels.find(l => l.id === item.id) : null;
        if (!levelData) return;

        const link = levelData.link || '#';
        const title = levelData.title || item.gradeName;
        const icon = levelData.icon || 'fas fa-star';
        const subjectTag = item.subject.toLowerCase() === 'language arts' ? 'ela' : item.subject.toLowerCase();
        
        cardsHtml += `
            <div class="focus-card stats-card">
                <div class="focus-card-header">
                    <div class="focus-card-icon">
                        <i class="${icon}"></i>
                    </div>
                    <div>
                        <h4 class="focus-card-title">${title}</h4>
                        <span class="focus-card-tag">${item.subject} Focus</span>
                    </div>
                </div>
                
                <p class="focus-card-desc">
                    Review and practice your ${item.subject} skills to boost your mastery level and build confidence.
                </p>
                
                <div class="focus-card-footer">
                    <span class="focus-card-warning">
                        <i class="fas fa-exclamation-triangle warning-icon"></i> Needs Practice
                    </span>
                    <a href="${link}?tab=${subjectTag}" class="focus-card-btn">
                        <span>Practice</span>
                        <i class="fas fa-arrow-right icon-sm"></i>
                    </a>
                </div>
            </div>
        `;
    });

    grid.innerHTML = cardsHtml;
}

function clearFocusRecommendations() {
    if (confirm("Are you sure you want to clear your current personalized recommendations?")) {
        localStorage.removeItem("hl_missed_standards");
        const panel = document.getElementById('a11y-focus-recommendations');
        if (panel) {
            panel.style.transition = 'all 0.3s ease-out';
            panel.style.opacity = '0';
            panel.style.transform = 'translateY(15px) scale(0.98)';
            setTimeout(() => panel.remove(), 300);
        }
    }
}

