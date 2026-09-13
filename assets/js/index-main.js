
function escapeHtml(str) {
    if (str === null || str === undefined) return '';
    return String(str).replace(/[&<>"']/g, m => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    }[m]));
}

window.toggleModalModuleAccordion = function(headerEl) {
    const card = headerEl.closest('.doc-modal-module-card');
    if (card) {
        card.classList.toggle('collapsed');
        card.classList.toggle('expanded');
    }
};
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
    
    // Attempt dynamic curriculum loading from window.curriculumData
    let subjectsWithData = [];
    const activeCurr = (window.currentSettings && window.currentSettings.curriculum) || 'engageny';
    const resolvedCurr = (activeCurr === 'engageny') ? 'ccss' : activeCurr;

    const GRADE_MAP = {
        'Pre-K': 'Pre-K',
        'Kindergarten': 'Kindergarten',
        'Grade 1': '1st Grade',
        'Grade 2': '2nd Grade',
        'Grade 3': '3rd Grade',
        'Grade 4': '4th Grade',
        'Grade 5': '5th Grade',
        'Grade 6': '6th Grade',
        'Grade 7': '7th Grade',
        'Grade 8': '8th Grade',
        'Grade 9': '9th Grade',
        'Grade 10': '10th Grade',
        'Grade 11': '11th Grade',
        'Grade 12': '12th Grade'
    };
    const curriculumGradeKey = GRADE_MAP[title] || title;

    if (typeof window.curriculumData !== 'undefined') {
        const subjects = ['math', 'ela', 'science', 'social'];
        const activeCurrKey = (activeCurr === 'engageny' || activeCurr === 'ccss') ? 'engageny' : activeCurr;
        subjects.forEach(subjectKey => {
            const subject = window.curriculumData[subjectKey];
            const gradeData = (subject && subject.grades && subject.grades[curriculumGradeKey]) ? subject.grades[curriculumGradeKey] : null;
            
            // Check for dedicated curriculum outlines (e.g. EngageNY Modules & Lessons)
            const outline = (window.curriculumOutlines && window.curriculumOutlines[activeCurrKey] && window.curriculumOutlines[activeCurrKey][subjectKey] && window.curriculumOutlines[activeCurrKey][subjectKey].grades && window.curriculumOutlines[activeCurrKey][subjectKey].grades[curriculumGradeKey])
                ? window.curriculumOutlines[activeCurrKey][subjectKey].grades[curriculumGradeKey]
                : null;

            if (gradeData || outline) {
                const specData = gradeData ? (gradeData[resolvedCurr] || gradeData['ccss'] || gradeData['teks'] || gradeData['custom']) : null;
                if (specData || outline) {
                    subjectsWithData.push({
                        key: subjectKey,
                        name: subjectKey === 'math' ? 'Mathematics' : (subjectKey === 'ela' ? 'English Language Arts' : (subject && subject.desc ? subjectKey.charAt(0).toUpperCase() + subjectKey.slice(1) : subjectKey)),
                        data: specData || { overview: '', competencies: [], standards: '' },
                        outline: outline
                    });
                }
            }
        });
    }

    if (subjectsWithData.length > 0) {
        let tabHeaders = '<div class="doc-modal-tab-container">';
        tabHeaders += '<div id="modal-tab-slider" class="doc-modal-tab-slider"></div>';
        let tabContents = '<div class="doc-modal-pane-container">';

        subjectsWithData.forEach((subj, index) => {
            const isActive = index === 0;
            const activeClass = isActive ? 'active' : '';

            tabHeaders += `<button type="button" class="modal-tab-pill ${activeClass}" data-index="${index}" onclick="switchModalTab(this, ${index})">
                ${subj.name}
            </button>`;

            const contentClass = isActive ? 'doc-modal-pane active' : 'doc-modal-pane';
            const staggerDelay = isActive ? '0s' : `${index * 0.05}s`;
            
            let paneHTML = `
                <div class="doc-modal-pane-inner">
                    <div class="doc-modal-pane-glow"></div>
                    <div class="doc-modal-subject-toolbar">
                        <div class="doc-modal-subject-tag">
                            <i class="fas fa-book-open"></i>
                            <span>${escapeHtml(subj.name)}</span>
                        </div>
                        <button type="button" class="doc-modal-subject-print-btn" onclick="printCurriculumSubject(${index})" title="Print ${escapeHtml(subj.name)} Curriculum">
                            <i class="fas fa-print"></i>
                            <span>Print ${escapeHtml(subj.name)}</span>
                        </button>
                    </div>
                    <div class="doc-modal-pane-content prose-content">
                        <h5 class="text-lg font-bold text-primary mb-2">Overview</h5>
                        <div class="mb-4">${subj.data.overview}</div>
            `;
            
            if (subj.data.competencies && subj.data.competencies.length > 0) {
                paneHTML += `
                        <h5 class="text-lg font-bold text-primary mb-2 mt-4">Core Competencies</h5>
                        <ul class="list-disc pl-5 mb-4">
                            ${subj.data.competencies.map(comp => `<li>${comp}</li>`).join('')}
                        </ul>
                `;
            }
            
            if (subj.outline && subj.outline.modules && subj.outline.modules.length > 0) {
                const outline = subj.outline;
                paneHTML += `
                    <div class="doc-modal-outline-wrap">
                        <div class="doc-modal-course-card">
                            <div class="doc-modal-course-badge">
                                <i class="fas fa-graduation-cap"></i> ${escapeHtml(outline.course || 'Curriculum Path')}
                            </div>
                            <h5 class="doc-modal-course-title">${escapeHtml(outline.title || (curriculumGradeKey + ' ' + subj.name))}</h5>
                            ${outline.overview ? `<p class="doc-modal-course-overview">${escapeHtml(outline.overview)}</p>` : ''}
                        </div>

                        <h5 class="text-lg font-bold text-primary mb-3 mt-6 flex items-center gap-2">
                            <i class="fas fa-layer-group"></i> Instructional Modules & Lessons
                        </h5>

                        <div class="doc-modal-modules-accordion">
                `;

                outline.modules.forEach((mod, modIdx) => {
                    const isModExpanded = modIdx === 0;
                    const totalLessons = (mod.topics || []).reduce((acc, t) => acc + (t.lessons ? t.lessons.length : 0), 0);
                    paneHTML += `
                        <div class="doc-modal-module-card ${isModExpanded ? 'expanded' : 'collapsed'}" data-module="${mod.moduleNumber}">
                            <div class="doc-modal-module-header" onclick="toggleModalModuleAccordion(this)">
                                <div class="doc-modal-module-title-wrap">
                                    <span class="doc-modal-module-pill">Module ${mod.moduleNumber}</span>
                                    <h6 class="doc-modal-module-title">${escapeHtml(mod.title)}</h6>
                                </div>
                                <div class="doc-modal-module-meta">
                                    <span class="doc-modal-module-lessons-count">${totalLessons} Lessons</span>
                                    <i class="fas fa-chevron-down doc-modal-module-chevron"></i>
                                </div>
                            </div>
                            <div class="doc-modal-module-body">
                                ${mod.description ? `<p class="doc-modal-module-desc">${escapeHtml(mod.description)}</p>` : ''}
                                <div class="doc-modal-topics-list">
                    `;

                    (mod.topics || []).forEach(top => {
                        paneHTML += `
                            <div class="doc-modal-topic-block">
                                <div class="doc-modal-topic-header">
                                    <span class="doc-modal-topic-badge">Topic ${escapeHtml(top.letter)}</span>
                                    <span class="doc-modal-topic-name">${escapeHtml(top.title)}</span>
                                </div>
                                <ul class="doc-modal-lessons-list">
                        `;

                        (top.lessons || []).forEach(les => {
                            const hasUrl = Boolean(les.url);
                            paneHTML += `
                                <li class="doc-modal-lesson-item">
                                    <div class="doc-modal-lesson-primary">
                                        <span class="doc-modal-lesson-num">Lesson ${les.lessonNumber || ''}</span>
                                        ${hasUrl ? `
                                            <a href="${les.url}" class="doc-modal-lesson-link" title="Open Lesson: ${escapeHtml(les.title)}">
                                                <span>${escapeHtml(les.title)}</span>
                                                <i class="fas fa-external-link-alt doc-modal-link-icon"></i>
                                            </a>
                                        ` : `
                                            <span class="doc-modal-lesson-name">${escapeHtml(les.title)}</span>
                                        `}
                                    </div>
                                    ${(les.standards && les.standards.length > 0) ? `
                                        <div class="doc-modal-std-badges">
                                            ${les.standards.map(st => `
                                                <a href="/pages/standards.php?subject=${subj.key}&grade=${encodeURIComponent(curriculumGradeKey)}&code=${encodeURIComponent(st)}" 
                                                   class="doc-modal-std-chip" 
                                                   title="View ${escapeHtml(st)} on Standards page" 
                                                   target="_blank">
                                                    <i class="fas fa-bookmark doc-modal-chip-icon"></i>
                                                    <span>${escapeHtml(st)}</span>
                                                </a>
                                            `).join('')}
                                        </div>
                                    ` : ''}
                                </li>
                            `;
                        });

                        paneHTML += `
                                </ul>
                            </div>
                        `;
                    });

                    paneHTML += `
                                </div>
                            </div>
                        </div>
                    `;
                });

                paneHTML += `
                        </div>
                    </div>
                `;
            } else if (subj.data.standards && (Array.isArray(subj.data.standards) ? subj.data.standards.length > 0 : subj.data.standards.trim() !== '')) {
                const stdsHtml = Array.isArray(subj.data.standards) ? subj.data.standards.join('\n') : subj.data.standards;
                paneHTML += `
                        <h5 class="text-lg font-bold text-primary mb-2 mt-4">Curriculum Standards</h5>
                        <div class="curr-standards-list">${stdsHtml}</div>
                `;
            }
            
            paneHTML += `
                    </div>
                </div>
            `;

            tabContents += `<div class="${contentClass}" data-index="${index}" style="animation-delay: ${staggerDelay}">
                ${paneHTML}
            </div>`;
        });

        tabHeaders += '</div>';
        tabContents += '</div>';

        docsContainer.innerHTML = `<h4 class="doc-modal-curriculum-title">
            <span class="doc-modal-curriculum-dot"></span> Core Subjects & Standards
        </h4>${tabHeaders}${tabContents}`;

        // Initialize slider position & footer subject print label
        setTimeout(() => {
            const firstTab = document.querySelector('.modal-tab-pill');
            if (firstTab) {
                updateModalTabSlider(firstTab);
                const printSubjLabel = document.getElementById('modal-print-subject-label');
                if (printSubjLabel) printSubjLabel.textContent = `Print ${firstTab.textContent.trim()}`;
            }
        }, 50);
    } else if (docs && docs.trim() !== '') {
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
                        <div class="doc-modal-subject-toolbar">
                            <div class="doc-modal-subject-tag">
                                <i class="fas fa-book-open"></i>
                                <span>${escapeHtml(subjectName)}</span>
                            </div>
                            <button type="button" class="doc-modal-subject-print-btn" onclick="printCurriculumSubject(${index})" title="Print ${escapeHtml(subjectName)} Curriculum">
                                <i class="fas fa-print"></i>
                                <span>Print ${escapeHtml(subjectName)}</span>
                            </button>
                        </div>
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

            // Initialize slider position & footer subject print label
            setTimeout(() => {
                const firstTab = document.querySelector('.modal-tab-pill');
                if (firstTab) {
                    updateModalTabSlider(firstTab);
                    const printSubjLabel = document.getElementById('modal-print-subject-label');
                    if (printSubjLabel) printSubjLabel.textContent = `Print ${firstTab.textContent.trim()}`;
                }
            }, 50);
        } else {
            docsContainer.innerHTML = `<div class="doc-modal-fallback-box">${docs}</div>`;
        }
    } else {
        docsContainer.innerHTML = '<div class="doc-modal-empty-box"><i class="fas fa-sparkles doc-modal-empty-icon"></i><p class="doc-modal-empty-text">Detailed curriculum is being prepared for this journey.</p></div>';
    }

    // Let CSS Flexbox handle centering. Calculate dynamic transform-origin relative to the clicked grade tile
    if (card) {
        const rect = card.getBoundingClientRect();
        const viewportHeight = window.innerHeight;
        const modalHeight = Math.min(viewportHeight * 0.85, 750);
        const modalWidth = Math.min(window.innerWidth * 0.9, 896); // max-width is 56rem (896px)

        const tileCenterX = rect.left + rect.width / 2;
        const tileCenterY = rect.top + rect.height / 2;
        
        const modalLeft = window.innerWidth / 2 - modalWidth / 2;
        const modalTop = window.innerHeight / 2 - modalHeight / 2;
        
        const relX = tileCenterX - modalLeft;
        const relY = tileCenterY - modalTop;
        modalContainer.style.transformOrigin = `${relX}px ${relY}px`;
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
            const clone = content.cloneNode(true);
            clone.querySelectorAll('.doc-modal-subject-toolbar, .doc-modal-subject-print-btn, button').forEach(el => el.remove());
            curriculumSectionsHtml += `
                <div style="margin-bottom: 2rem; page-break-inside: avoid;">
                    <h2 style="font-size: 1.2rem; font-weight: 700; color: #1e40af; border-bottom: 2px solid #3b82f6; padding-bottom: 0.35rem; margin-bottom: 0.75rem;">
                        ${subjectName}
                    </h2>
                    <div class="prose-content" style="font-size: 0.95rem; color: #1f2937; line-height: 1.6;">
                        ${clone.innerHTML}
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
            <title>${modalTitle} - Printed Curriculum | Hesten's Learning</title>
            <style>
                @page {
                    size: letter portrait;
                    margin: 0.6in 0.7in;
                }
                *, *::before, *::after {
                    box-sizing: border-box;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                body {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    color: #111827;
                    background: #fff;
                    font-size: 10pt;
                    line-height: 1.55;
                }
                .header {
                    margin-bottom: 1.5rem;
                    padding-bottom: 1rem;
                    border-bottom: 2px solid #e5e7eb;
                }
                .title {
                    font-size: 1.75rem;
                    font-weight: 800;
                    margin: 0 0 0.35rem 0;
                    color: #0f172a;
                }
                .subtitle {
                    font-size: 1rem;
                    font-weight: 600;
                    color: #64748b;
                    margin: 0;
                }
                .desc-box {
                    background: #f8fafc;
                    border-left: 4px solid #3b82f6;
                    padding: 0.85rem 1rem;
                    margin-bottom: 1.5rem;
                    border-radius: 0 0.5rem 0.5rem 0;
                    font-size: 0.9rem;
                    color: #334155;
                }
                .prose-content h5 {
                    font-size: 1.05rem;
                    font-weight: 700;
                    color: #1d4ed8;
                    margin: 1.15rem 0 0.35rem 0;
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
                .doc-modal-module-card {
                    border: 1px solid #e2e8f0;
                    border-radius: 6px;
                    margin-bottom: 0.85rem;
                    page-break-inside: avoid;
                    break-inside: avoid;
                }
                .doc-modal-module-header {
                    padding: 0.5rem 0.75rem;
                    background: #f8fafc;
                    border-bottom: 1px solid #e2e8f0;
                    display: flex;
                    justify-content: space-between;
                }
                .doc-modal-module-pill {
                    font-size: 7.5pt;
                    font-weight: 700;
                    background: #2563eb;
                    color: #fff;
                    padding: 0.15rem 0.45rem;
                    border-radius: 4px;
                    margin-right: 0.4rem;
                }
                .doc-modal-module-title {
                    font-size: 9pt;
                    font-weight: 700;
                    display: inline;
                }
                .doc-modal-module-body {
                    padding: 0.5rem 0.75rem;
                    display: block !important;
                }
                .doc-modal-module-chevron,
                .doc-modal-link-icon {
                    display: none !important;
                }
                .footer {
                    margin-top: 2rem;
                    padding-top: 1rem;
                    border-top: 1px solid #e2e8f0;
                    font-size: 8pt;
                    color: #94a3b8;
                    text-align: center;
                }
                @media print {
                    body { padding: 0; }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1 class="title">${modalTitle}</h1>
                <p class="subtitle">${modalSubtitle} • Complete Curriculum Scope & Sequence</p>
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

function printActiveCurriculumSubject() {
    const docsContainer = document.getElementById('modal-docs');
    if (!docsContainer) {
        printCurriculum();
        return;
    }
    const activePill = docsContainer.querySelector('.modal-tab-pill.active');
    const activeIndex = activePill ? parseInt(activePill.dataset.index || '0', 10) : 0;
    printCurriculumSubject(activeIndex);
}

function printCurriculumSubject(subjectIndex) {
    const modalTitle = document.getElementById('modal-title')?.textContent.trim() || 'Curriculum';
    const modalSubtitle = document.getElementById('modal-subtitle')?.textContent.trim() || '';
    const docsContainer = document.getElementById('modal-docs');

    if (!docsContainer) {
        window.print();
        return;
    }

    const pills = Array.from(docsContainer.querySelectorAll('.modal-tab-pill'));
    const panes = Array.from(docsContainer.querySelectorAll('.doc-modal-pane'));

    const targetPill = pills[subjectIndex] || pills[0];
    const targetPane = panes[subjectIndex] || panes[0];

    if (!targetPane) {
        printCurriculum();
        return;
    }

    const subjectName = targetPill ? targetPill.textContent.trim() : 'Subject Curriculum';
    const contentEl = targetPane.querySelector('.doc-modal-pane-content, .prose-content') || targetPane;
    
    // Clone content and remove nested print buttons
    const clonedContent = contentEl.cloneNode(true);
    clonedContent.querySelectorAll('.doc-modal-subject-toolbar, .doc-modal-subject-print-btn, button').forEach(b => b.remove());

    const printWin = window.open('', '_blank', 'width=900,height=750');
    if (!printWin) {
        window.print();
        return;
    }

    const printDoc = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>${subjectName} - ${modalTitle} Curriculum | Hesten's Learning</title>
            <style>
                @page {
                    size: letter portrait;
                    margin: 0.6in 0.7in;
                }
                *, *::before, *::after {
                    box-sizing: border-box;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                body {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    color: #0f172a;
                    background: #ffffff;
                    font-size: 10pt;
                    line-height: 1.55;
                }
                .header {
                    margin-bottom: 1.5rem;
                    padding-bottom: 1rem;
                    border-bottom: 2px solid #0f172a;
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    gap: 1rem;
                }
                .title-group h1 {
                    font-size: 18pt;
                    font-weight: 800;
                    margin: 0 0 0.25rem 0;
                    color: #0f172a;
                }
                .title-group h2 {
                    font-size: 12pt;
                    font-weight: 700;
                    color: #2563eb;
                    margin: 0 0 0.2rem 0;
                }
                .title-group p {
                    font-size: 9pt;
                    color: #64748b;
                    margin: 0;
                    font-weight: 600;
                }
                .header-badge {
                    border: 1px solid #cbd5e1;
                    border-radius: 6px;
                    padding: 0.35rem 0.65rem;
                    font-size: 8pt;
                    font-weight: 700;
                    color: #334155;
                    text-transform: uppercase;
                    background: #f8fafc;
                    text-align: right;
                    white-space: nowrap;
                }
                .prose-content {
                    overflow: visible;
                }
                .prose-content h5 {
                    font-size: 11pt;
                    font-weight: 700;
                    color: #1e3a8a;
                    margin: 1.25rem 0 0.4rem 0;
                    border-bottom: 1px solid #e2e8f0;
                    padding-bottom: 0.25rem;
                    page-break-after: avoid;
                    break-after: avoid;
                }
                .prose-content p {
                    margin: 0 0 0.65rem 0;
                    line-height: 1.6;
                    color: #334155;
                }
                .prose-content ul {
                    margin: 0.35rem 0 1rem 1.25rem;
                    padding: 0;
                    color: #334155;
                }
                .prose-content li {
                    margin-bottom: 0.35rem;
                }
                .doc-modal-course-card {
                    background: #f8fafc !important;
                    border: 1px solid #cbd5e1 !important;
                    border-radius: 6px !important;
                    padding: 0.85rem !important;
                    margin-bottom: 1.25rem !important;
                    page-break-inside: avoid;
                    break-inside: avoid;
                }
                .doc-modal-course-badge {
                    font-size: 8pt;
                    font-weight: 700;
                    color: #2563eb;
                    text-transform: uppercase;
                    margin-bottom: 0.25rem;
                }
                .doc-modal-course-title {
                    font-size: 13pt;
                    font-weight: 800;
                    color: #0f172a;
                    margin: 0 0 0.35rem 0;
                }
                .doc-modal-course-overview {
                    font-size: 9pt;
                    color: #475569;
                    margin: 0;
                }
                .doc-modal-module-card {
                    border: 1px solid #e2e8f0 !important;
                    border-radius: 6px !important;
                    margin-bottom: 0.85rem !important;
                    page-break-inside: avoid;
                    break-inside: avoid;
                    background: #ffffff !important;
                }
                .doc-modal-module-header {
                    padding: 0.5rem 0.75rem !important;
                    background: #f1f5f9 !important;
                    border-bottom: 1px solid #e2e8f0 !important;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .doc-modal-module-pill {
                    font-size: 7.5pt;
                    font-weight: 800;
                    background: #2563eb;
                    color: #ffffff;
                    padding: 0.15rem 0.45rem;
                    border-radius: 4px;
                    margin-right: 0.5rem;
                }
                .doc-modal-module-title {
                    font-size: 9.5pt;
                    font-weight: 700;
                    color: #0f172a;
                    display: inline;
                    margin: 0;
                }
                .doc-modal-module-lessons-count {
                    font-size: 8pt;
                    font-weight: 600;
                    color: #64748b;
                }
                .doc-modal-module-body {
                    padding: 0.65rem 0.75rem !important;
                    display: block !important;
                }
                .doc-modal-module-desc {
                    font-size: 8.5pt;
                    color: #475569;
                    margin: 0 0 0.5rem 0;
                }
                .doc-modal-topic-block {
                    margin-bottom: 0.5rem;
                    padding-left: 0.5rem;
                    border-left: 2px solid #e2e8f0;
                }
                .doc-modal-topic-badge {
                    font-size: 7.5pt;
                    font-weight: 700;
                    color: #4338ca;
                    margin-right: 0.35rem;
                }
                .doc-modal-topic-name {
                    font-size: 8.5pt;
                    font-weight: 700;
                    color: #1e293b;
                }
                .doc-modal-lessons-list {
                    list-style: none;
                    padding: 0;
                    margin: 0.25rem 0 0 0;
                }
                .doc-modal-lesson-item {
                    font-size: 8pt;
                    padding: 0.2rem 0;
                    color: #334155;
                    display: flex;
                    justify-content: space-between;
                    border-bottom: 1px dashed #f1f5f9;
                }
                .doc-modal-lesson-num {
                    font-weight: 700;
                    color: #64748b;
                    margin-right: 0.5rem;
                    min-width: 60px;
                }
                .doc-modal-std-tag {
                    font-size: 7pt;
                    font-weight: 700;
                    background: #e0e7ff;
                    color: #3730a3;
                    padding: 0.1rem 0.3rem;
                    border-radius: 3px;
                    margin-left: 0.25rem;
                }
                .doc-modal-module-chevron,
                .doc-modal-link-icon {
                    display: none !important;
                }
                .footer {
                    margin-top: 2rem;
                    padding-top: 0.75rem;
                    border-top: 1px solid #cbd5e1;
                    font-size: 8pt;
                    color: #64748b;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    page-break-inside: avoid;
                }
                @media print {
                    body { padding: 0; }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="title-group">
                    <h2>${escapeHtml(modalTitle)}</h2>
                    <h1>${escapeHtml(subjectName)}</h1>
                    <p>${escapeHtml(modalSubtitle)} • Scope, Sequence & Instructional Modules</p>
                </div>
                <div class="header-badge">
                    <div>HESTEN'S LEARNING</div>
                    <div style="font-weight: normal; font-size: 7pt; margin-top: 2px;">Curriculum Syllabus</div>
                </div>
            </div>
            <div class="prose-content">
                ${clonedContent.innerHTML}
            </div>
            <div class="footer">
                <div>Hesten's Learning Academy &copy; ${new Date().getFullYear()} • Printed Curriculum</div>
                <div>Subject: <strong>${escapeHtml(subjectName)}</strong> • Grade: <strong>${escapeHtml(modalTitle)}</strong></div>
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

// Global Exports
window.printCurriculum = printCurriculum;
window.printActiveCurriculumSubject = printActiveCurriculumSubject;
window.printCurriculumSubject = printCurriculumSubject;

function switchModalTab(btn, index) {
    const container = btn.closest('#modal-docs');
    const btns = container.querySelectorAll('.modal-tab-pill');
    const panes = container.querySelectorAll('.doc-modal-pane');

    btns.forEach(b => {
        b.classList.remove('active');
    });

    btn.classList.add('active');

    updateModalTabSlider(btn);

    const printSubjLabel = document.getElementById('modal-print-subject-label');
    if (printSubjLabel) {
        printSubjLabel.textContent = `Print ${btn.textContent.trim()}`;
    }

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
    const contentDiv = card.querySelector('.level-card-inner');

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
        btn.classList.add('btn-bookmarked');
        btn.innerHTML = '<i class="fas fa-star text-sm"></i>'; // Solid star
    } else {
        btn.classList.remove('btn-bookmarked');
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

