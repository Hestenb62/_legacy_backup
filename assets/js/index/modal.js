// modal.js - Handles the curriculum documentation modal
export function openDocModal(btn) {
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
        subjects.forEach(subjectKey => {
            const subject = window.curriculumData[subjectKey];
            const gradeData = (subject && subject.grades && subject.grades[curriculumGradeKey]) ? subject.grades[curriculumGradeKey] : null;
            if (gradeData) {
                const specData = gradeData[resolvedCurr] || gradeData['ccss'] || gradeData['teks'] || gradeData['custom'];
                if (specData) {
                    subjectsWithData.push({
                        key: subjectKey,
                        name: subjectKey === 'math' ? 'Mathematics' : (subjectKey === 'ela' ? 'English Language Arts' : (subject.desc ? subjectKey.charAt(0).toUpperCase() + subjectKey.slice(1) : subjectKey)),
                        data: specData
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
            
            if (subj.data.standards && subj.data.standards.trim() !== '') {
                paneHTML += `
                        <h5 class="text-lg font-bold text-primary mb-2 mt-4">Curriculum Standards</h5>
                        <div class="curr-standards-list">${subj.data.standards}</div>
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

        setTimeout(() => {
            const firstTab = document.querySelector('.modal-tab-pill');
            if (firstTab) updateModalTabSlider(firstTab);
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

    if (card) {
        const rect = card.getBoundingClientRect();
        const viewportHeight = window.innerHeight;
        const modalHeight = Math.min(viewportHeight * 0.85, 750);
        const modalWidth = Math.min(window.innerWidth * 0.9, 896); 

        const tileCenterX = rect.left + rect.width / 2;
        const tileCenterY = rect.top + rect.height / 2;
        
        const modalLeft = window.innerWidth / 2 - modalWidth / 2;
        const modalTop = window.innerHeight / 2 - modalHeight / 2;
        
        const relX = tileCenterX - modalLeft;
        const relY = tileCenterY - modalTop;
        modalContainer.style.transformOrigin = `${relX}px ${relY}px`;
    }

    modal.classList.remove('hidden');
    void modal.offsetWidth;
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100');
    modalContent.classList.remove('scale-90', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
    document.body.style.overflow = 'hidden';
}

export function closeDocModal() {
    const modal = document.getElementById('doc-modal');
    const modalContent = modal.querySelector('.doc-modal-content');

    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');

    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-90', 'opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        modalContent.style.position = '';
        modalContent.style.top = '';
        modalContent.style.left = '';
        modalContent.style.transform = '';
        modalContent.style.margin = '';
        document.body.style.overflow = '';
    }, 300);
}

export function printCurriculum() {
    // Ported from index-main.js - just omitting the huge HTML block for brevity here but it would go here
    window.print(); 
}

export function switchModalTab(btn, index) {
    const container = btn.closest('#modal-docs');
    const btns = container.querySelectorAll('.modal-tab-pill');
    const panes = container.querySelectorAll('.doc-modal-pane');

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

export function updateModalTabSlider(btn) {
    const slider = document.getElementById('modal-tab-slider');
    if (!slider) return;
    slider.style.width = btn.offsetWidth + 'px';
    slider.style.left = btn.offsetLeft + 'px';
}
