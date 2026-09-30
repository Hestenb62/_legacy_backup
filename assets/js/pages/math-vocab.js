/**
 * assets/js/pages/math-vocab.js
 * Universal Mathematics Codex & Active Recall Review Controller
 * Handles 3D flashcard studio, interactive formula sandbox & solver,
 * live search, multi-grade band & domain filtering, mastery tracking,
 * speech synthesis, and MathJax typesetting.
 */

(function () {
    'use strict';

    // State Constants
    const STORAGE_KEY = 'hl_math_vocab_state';

    // Application State
    let vocabData = [];
    let filteredTerms = [];
    let currentFcIndex = 0;
    let isFlipped = false;
    let activeMode = 'codex'; // 'codex' | 'flashcard'
    let activeCategory = 'all';
    let activeGrade = 'all'; // 'all' | 'elem' | 'mid' | 'high'
    let activeModule = 'all';
    let activeQueue = 'all'; // 'all' | 'starred' | 'learning' | 'mastered'
    let currentSearchQuery = '';

    // User Study Progress
    let studyState = {
        starred: [],
        mastered: [],
        learning: []
    };

    // DOM Elements Cache
    let searchInput, clearSearchBtn, matchCountEl, azRibbon, sectionsContainer;
    let flashcardStage, flashcardEl, fcFront, fcBack, fcIdxEl, fcTotalEl, fcProgressFill;
    let modeTabs, categoryPills, gradePills, queuePills;

    /**
     * Load Persistent Study State
     */
    function loadStudyState() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) {
                const parsed = JSON.parse(raw);
                studyState.starred = Array.isArray(parsed.starred) ? parsed.starred : [];
                studyState.mastered = Array.isArray(parsed.mastered) ? parsed.mastered : [];
                studyState.learning = Array.isArray(parsed.learning) ? parsed.learning : [];
            }
        } catch (e) {
            console.warn('[MathVocab] Error loading study state:', e);
        }
    }

    /**
     * Save Persistent Study State & Dispatch Sync Event
     */
    function saveStudyState() {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(studyState));
            window.dispatchEvent(new CustomEvent('hl:data-sync', {
                detail: { key: STORAGE_KEY, value: studyState }
            }));
            updateBadgeCounters();
        } catch (e) {
            console.warn('[MathVocab] Error saving study state:', e);
        }
    }

    /**
     * Speech Synthesis Pronunciation
     */
    function speakTerm(term, definition) {
        if (!('speechSynthesis' in window)) {
            alert('Speech synthesis is not supported on this browser.');
            return;
        }

        window.speechSynthesis.cancel(); // Stop any pending speech

        // Clean out math latex symbols for auditory clarity
        const cleanTerm = term.replace(/[\$\{\}\\\^_\*]/g, '');
        const cleanDef = (definition || '').replace(/[\$\{\}\\\^_\*]/g, '').replace(/\\frac\{([^}]+)\}\{([^}]+)\}/g, '$1 over $2');

        const textToSpeak = `${cleanTerm}. Definition: ${cleanDef}`;
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        utterance.rate = 0.95;
        utterance.pitch = 1.0;
        utterance.lang = 'en-US';

        window.speechSynthesis.speak(utterance);
    }

    /**
     * Copy Formula to Clipboard
     */
    function copyFormula(formulaText) {
        if (!formulaText) return;
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(formulaText).then(() => {
                alert('Formula copied to clipboard!');
            }).catch(() => {
                fallbackCopy(formulaText);
            });
        } else {
            fallbackCopy(formulaText);
        }
    }

    function fallbackCopy(text) {
        const ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.left = '-9999px';
        document.body.appendChild(ta);
        ta.focus();
        ta.select();
        try {
            document.execCommand('copy');
            alert('Formula copied to clipboard!');
        } catch (err) {
            alert('Unable to copy formula.');
        }
        document.body.removeChild(ta);
    }

    /**
     * Initialize Math Vocabulary & Codex Page
     */
    function init() {
        loadStudyState();

        // Bind DOM Elements
        searchInput = document.getElementById('math-vocab-search-input');
        clearSearchBtn = document.getElementById('math-vocab-clear-search');
        matchCountEl = document.getElementById('vocab-visible-count');
        azRibbon = document.getElementById('math-vocab-az-ribbon');
        sectionsContainer = document.getElementById('math-vocab-az-container');

        flashcardStage = document.getElementById('math-flashcard-stage');
        flashcardEl = document.getElementById('math-flashcard');
        fcFront = document.getElementById('fc-front-body');
        fcBack = document.getElementById('fc-back-body');
        fcIdxEl = document.getElementById('fc-current-idx');
        fcTotalEl = document.getElementById('fc-total-count');
        fcProgressFill = document.getElementById('fc-progress-fill');

        modeTabs = document.querySelectorAll('.math-vocab-mode-tab');
        categoryPills = document.querySelectorAll('.math-vocab-cat-pill');
        gradePills = document.querySelectorAll('.math-vocab-grade-pill');
        queuePills = document.querySelectorAll('.math-vocab-queue-pill');

        // Extract vocabulary array embedded into the page
        if (window.__MATH_VOCAB_DATA__ && Array.isArray(window.__MATH_VOCAB_DATA__)) {
            vocabData = window.__MATH_VOCAB_DATA__;
            filteredTerms = [...vocabData];
        }

        setupEventListeners();
        updateBadgeCounters();
        renderCardGridState();
        setupFlashcard();
        initFormulaSandbox();

        // Typeset initial MathJax equations
        if (window.ensureMathJax) {
            window.ensureMathJax(document.getElementById('main-content') || document.body);
        }
    }

    /**
     * Update Badge Counters (Starred, Learning, Mastered)
     */
    function updateBadgeCounters() {
        const starCountEl = document.getElementById('queue-count-starred');
        const learnCountEl = document.getElementById('queue-count-learning');
        const mastCountEl = document.getElementById('queue-count-mastered');
        const allCountEl = document.getElementById('queue-count-all');

        if (starCountEl) starCountEl.textContent = studyState.starred.length;
        if (learnCountEl) learnCountEl.textContent = studyState.learning.length;
        if (mastCountEl) mastCountEl.textContent = studyState.mastered.length;
        if (allCountEl) allCountEl.textContent = vocabData.length;

        // Update card button active states in DOM
        document.querySelectorAll('.math-term-card').forEach(card => {
            const id = card.getAttribute('data-term-id');
            const starBtn = card.querySelector('.vocab-btn-star');
            const mastBtn = card.querySelector('.vocab-btn-mastered');

            if (starBtn) {
                if (studyState.starred.includes(id)) {
                    starBtn.classList.add('active-star');
                    starBtn.setAttribute('title', 'Remove from Starred List');
                } else {
                    starBtn.classList.remove('active-star');
                    starBtn.setAttribute('title', 'Star for Later Review');
                }
            }

            if (mastBtn) {
                if (studyState.mastered.includes(id)) {
                    mastBtn.classList.add('active-mastered');
                    mastBtn.setAttribute('title', 'Mark as In-Progress');
                } else {
                    mastBtn.classList.remove('active-mastered');
                    mastBtn.setAttribute('title', 'Mark as Mastered');
                }
            }
        });
    }

    /**
     * Apply Filters and Update Both Grid and Flashcards
     */
    function applyFilters() {
        const q = currentSearchQuery.trim().toLowerCase();

        filteredTerms = vocabData.filter(term => {
            // 1. Search Query Filter
            if (q) {
                const termMatch = term.term.toLowerCase().includes(q);
                const defMatch = (term.definition || '').toLowerCase().includes(q);
                const catMatch = (term.category || '').toLowerCase().includes(q);
                const exMatch = (term.example || '').toLowerCase().includes(q);
                const whatMatch = (term.whatItDoes || '').toLowerCase().includes(q);
                const stdMatch = (term.standards || []).some(s => s.toLowerCase().includes(q));
                const lessonMatch = (term.lessons || []).some(l => l.title.toLowerCase().includes(q) || l.id.toLowerCase().includes(q));

                if (!termMatch && !defMatch && !catMatch && !exMatch && !whatMatch && !stdMatch && !lessonMatch) {
                    return false;
                }
            }

            // 2. Grade Band Filter
            if (activeGrade !== 'all') {
                const grades = (term.grades || []).map(g => parseInt(String(g).replace(/[^0-9]/g, ''), 10)).filter(n => !isNaN(n));
                const hasElem = grades.some(n => n >= 1 && n <= 5);
                const hasMid = grades.some(n => n >= 6 && n <= 8);
                const hasHigh = grades.some(n => n >= 9 && n <= 12) || (term.grades || []).some(g => String(g).toLowerCase().includes('high') || String(g).toLowerCase().includes('algebra'));

                if (activeGrade === 'elem' && !hasElem) return false;
                if (activeGrade === 'mid' && !hasMid) return false;
                if (activeGrade === 'high' && !hasHigh) return false;
            }

            // 3. Category Filter
            if (activeCategory !== 'all') {
                if (term.category !== activeCategory) {
                    return false;
                }
            }

            // 4. Module Filter
            if (activeModule !== 'all') {
                if (!term.modules || !term.modules.includes(activeModule)) {
                    return false;
                }
            }

            // 5. Mastery Queue Filter
            if (activeQueue === 'starred') {
                if (!studyState.starred.includes(term.id)) return false;
            } else if (activeQueue === 'learning') {
                if (!studyState.learning.includes(term.id)) return false;
            } else if (activeQueue === 'mastered') {
                if (!studyState.mastered.includes(term.id)) return false;
            }

            return true;
        });

        // Update match count display
        if (matchCountEl) {
            matchCountEl.textContent = filteredTerms.length;
        }

        renderCardGridState();

        // Reset Flashcards to index 0 with current filtered set
        currentFcIndex = 0;
        isFlipped = false;
        if (flashcardEl) {
            flashcardEl.classList.remove('flipped');
        }
        setupFlashcard();

        // Typeset MathJax
        if (window.ensureMathJax) {
            window.ensureMathJax(sectionsContainer || document.body);
        }
    }

    /**
     * Render Visibility of Cards and Letter Sections in Grid View
     */
    function renderCardGridState() {
        const visibleIds = new Set(filteredTerms.map(t => t.id));
        const activeLetters = new Set();

        document.querySelectorAll('.math-term-card').forEach(card => {
            const id = card.getAttribute('data-term-id');
            const letter = card.getAttribute('data-letter');

            if (visibleIds.has(id)) {
                card.style.display = '';
                if (letter) activeLetters.add(letter);
            } else {
                card.style.display = 'none';
            }
        });

        // Toggle Letter Section Visibility
        document.querySelectorAll('.math-vocab-section').forEach(section => {
            const letter = section.getAttribute('data-letter');
            if (activeLetters.has(letter)) {
                section.style.display = '';
            } else {
                section.style.display = 'none';
            }
        });

        // Update A-Z Ribbon disabled buttons
        document.querySelectorAll('.math-vocab-az-btn').forEach(btn => {
            const letter = btn.getAttribute('data-letter');
            if (activeLetters.has(letter)) {
                btn.classList.remove('disabled');
                btn.removeAttribute('aria-disabled');
            } else {
                btn.classList.add('disabled');
                btn.setAttribute('aria-disabled', 'true');
            }
        });
    }

    /**
     * Setup Current Flashcard
     */
    function setupFlashcard() {
        if (!flashcardStage || filteredTerms.length === 0) {
            if (flashcardStage && filteredTerms.length === 0) {
                fcFront.innerHTML = `
                    <div style="padding: 3rem 1rem;">
                        <i class="fas fa-search" style="font-size: 2.5rem; color: var(--color-text-muted); margin-bottom: 1rem;"></i>
                        <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-text-default); margin-bottom: 0.5rem;">No Mathematical Terms Match Filter</h3>
                        <p style="color: var(--color-text-secondary); font-size: 0.95rem;">Try adjusting your search query, domain, or grade band filter.</p>
                    </div>
                `;
                fcBack.innerHTML = fcFront.innerHTML;
                if (fcIdxEl) fcIdxEl.textContent = '0';
                if (fcTotalEl) fcTotalEl.textContent = '0';
                if (fcProgressFill) fcProgressFill.style.width = '0%';
            }
            return;
        }

        // Clamp Index
        if (currentFcIndex >= filteredTerms.length) currentFcIndex = filteredTerms.length - 1;
        if (currentFcIndex < 0) currentFcIndex = 0;

        const term = filteredTerms[currentFcIndex];

        // Update Counters
        if (fcIdxEl) fcIdxEl.textContent = currentFcIndex + 1;
        if (fcTotalEl) fcTotalEl.textContent = filteredTerms.length;
        if (fcProgressFill) {
            const pct = Math.round(((currentFcIndex + 1) / filteredTerms.length) * 100);
            fcProgressFill.style.width = `${pct}%`;
        }

        // Render Front Face
        fcFront.innerHTML = `
            <div class="fc-header">
                <span class="fc-cat-badge">${escapeHtml(term.category || 'General Math')}</span>
                <button type="button" class="math-card-btn fc-btn-speak" title="Listen to pronunciation" aria-label="Listen to ${escapeHtml(term.term)}">
                    <i class="fas fa-volume-up" aria-hidden="true"></i>
                </button>
            </div>
            <div class="fc-center-content">
                <div class="fc-term-title">${escapeHtml(term.term)}</div>
                <div class="fc-module-hint">${escapeHtml((term.modules && term.modules[0]) ? term.modules[0] : (term.grades && term.grades[0] ? term.grades[0] : 'Mathematics'))}</div>
            </div>
            <div class="fc-flip-hint">
                <i class="fas fa-sync-alt" aria-hidden="true"></i> Click card or press <strong>Spacebar</strong> to flip
            </div>
        `;

        // Render Back Face
        let formulaHtml = '';
        if (term.example) {
            formulaHtml = `
                <div class="fc-formula-box" title="Mathematical Example / Formula">
                    <div style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); margin-bottom: 0.35rem;">
                        <i class="fas fa-square-root-variable" aria-hidden="true"></i> Exemplar / Formula
                    </div>
                    <div>${term.example}</div>
                </div>
            `;
        }

        let whatItDoesHtml = '';
        if (term.whatItDoes) {
            whatItDoesHtml = `
                <div style="font-size: 0.85rem; color: var(--color-text-secondary); margin-bottom: 0.75rem; font-style: italic;">
                    <strong>Intuition:</strong> ${escapeHtml(term.whatItDoes)}
                </div>
            `;
        }

        let lessonLinksHtml = '';
        if (term.lessons && term.lessons.length > 0) {
            lessonLinksHtml = term.lessons.map(l => `
                <a href="${escapeHtml(l.url)}" class="fc-lesson-link" title="Open Lesson: ${escapeHtml(l.title)}">
                    <i class="fas fa-book-open" aria-hidden="true"></i> ${escapeHtml(l.title)}
                </a>
            `).join(' ');
        }

        const isStarred = studyState.starred.includes(term.id);
        const isLearning = studyState.learning.includes(term.id);
        const isMastered = studyState.mastered.includes(term.id);

        fcBack.innerHTML = `
            <div class="fc-header">
                <span class="fc-cat-badge">${escapeHtml(term.category || 'General Math')}</span>
                <button type="button" class="math-card-btn fc-btn-speak" title="Listen to pronunciation" aria-label="Listen to definition">
                    <i class="fas fa-volume-up" aria-hidden="true"></i>
                </button>
            </div>
            <div class="fc-center-content">
                <p class="fc-definition-text">${escapeHtml(term.definition)}</p>
                ${whatItDoesHtml}
                ${formulaHtml}
                <div style="margin-top: 0.5rem; display: flex; flex-wrap: wrap; gap: 0.5rem; justify-content: center;">
                    ${lessonLinksHtml}
                </div>
            </div>
            <div class="fc-mastery-actions">
                <button type="button" class="fc-action-rate fc-rate-star ${isStarred ? 'active-star' : ''}" data-id="${term.id}">
                    <i class="fas fa-star" aria-hidden="true"></i> ${isStarred ? 'Starred' : 'Star for Later'}
                </button>
                <button type="button" class="fc-action-rate fc-rate-learning ${isLearning ? 'active-learning' : ''}" data-id="${term.id}">
                    <i class="fas fa-clock" aria-hidden="true"></i> Still Learning
                </button>
                <button type="button" class="fc-action-rate fc-rate-mastered ${isMastered ? 'active-mastered' : ''}" data-id="${term.id}">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> Mastered
                </button>
            </div>
        `;

        // Typeset MathJax on flashcard elements
        if (window.ensureMathJax) {
            window.ensureMathJax(flashcardEl);
        }
    }

    /**
     * Flip Current Flashcard
     */
    function flipFlashcard() {
        if (!flashcardEl) return;
        isFlipped = !isFlipped;
        if (isFlipped) {
            flashcardEl.classList.add('flipped');
        } else {
            flashcardEl.classList.remove('flipped');
        }
    }

    /**
     * Move to Next Flashcard
     */
    function nextFlashcard() {
        if (filteredTerms.length === 0) return;
        currentFcIndex = (currentFcIndex + 1) % filteredTerms.length;
        isFlipped = false;
        flashcardEl.classList.remove('flipped');
        setupFlashcard();
    }

    /**
     * Move to Previous Flashcard
     */
    function prevFlashcard() {
        if (filteredTerms.length === 0) return;
        currentFcIndex = (currentFcIndex - 1 + filteredTerms.length) % filteredTerms.length;
        isFlipped = false;
        flashcardEl.classList.remove('flipped');
        setupFlashcard();
    }

    /**
     * Shuffle Flashcards
     */
    function shuffleFlashcards() {
        if (filteredTerms.length <= 1) return;
        for (let i = filteredTerms.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [filteredTerms[i], filteredTerms[j]] = [filteredTerms[j], filteredTerms[i]];
        }
        currentFcIndex = 0;
        isFlipped = false;
        flashcardEl.classList.remove('flipped');
        setupFlashcard();
    }

    /**
     * Toggle Starred State
     */
    function toggleStar(termId) {
        const idx = studyState.starred.indexOf(termId);
        if (idx >= 0) {
            studyState.starred.splice(idx, 1);
        } else {
            studyState.starred.push(termId);
        }
        saveStudyState();
        if (activeQueue === 'starred') {
            applyFilters();
        } else {
            updateBadgeCounters();
            setupFlashcard();
        }
    }

    /**
     * Toggle Mastered State
     */
    function toggleMastered(termId) {
        const idx = studyState.mastered.indexOf(termId);
        if (idx >= 0) {
            studyState.mastered.splice(idx, 1);
        } else {
            studyState.mastered.push(termId);
            const learnIdx = studyState.learning.indexOf(termId);
            if (learnIdx >= 0) studyState.learning.splice(learnIdx, 1);
        }
        saveStudyState();
        if (activeQueue === 'mastered') {
            applyFilters();
        } else {
            updateBadgeCounters();
            setupFlashcard();
        }
    }

    /**
     * Toggle Learning State
     */
    function toggleLearning(termId) {
        const idx = studyState.learning.indexOf(termId);
        if (idx >= 0) {
            studyState.learning.splice(idx, 1);
        } else {
            studyState.learning.push(termId);
            const mastIdx = studyState.mastered.indexOf(termId);
            if (mastIdx >= 0) studyState.mastered.splice(mastIdx, 1);
        }
        saveStudyState();
        if (activeQueue === 'learning') {
            applyFilters();
        } else {
            updateBadgeCounters();
            setupFlashcard();
        }
    }

    /**
     * Plain Text Export of Visible Vocabulary
     */
    function exportStudyGuide() {
        if (filteredTerms.length === 0) {
            alert('No vocabulary terms match current filters to export.');
            return;
        }

        let content = `HESTEN'S LEARNING - MATHEMATICS CODEX & VOCABULARY STUDY GUIDE\n`;
        content += `Export Date: ${new Date().toLocaleDateString()}\n`;
        content += `Total Terms: ${filteredTerms.length}\n`;
        content += `============================================================\n\n`;

        filteredTerms.forEach((t, i) => {
            content += `${i + 1}. ${t.term.toUpperCase()}\n`;
            content += `Category: ${t.category || 'General Math'}\n`;
            content += `Grades: ${(t.grades || []).join(', ')}\n`;
            content += `Definition: ${t.definition}\n`;
            if (t.whatItDoes) {
                content += `Mechanism: ${t.whatItDoes}\n`;
            }
            if (t.example) {
                content += `Formula / Exemplar: ${t.example}\n`;
            }
            if (t.lessons && t.lessons.length > 0) {
                content += `Lessons / References: ${t.lessons.map(l => l.title).join(', ')}\n`;
            }
            content += `------------------------------------------------------------\n\n`;
        });

        const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `Math_Codex_Study_Guide_${new Date().toISOString().slice(0, 10)}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    /**
     * Escape HTML Utility
     */
    function escapeHtml(text) {
        if (!text) return '';
        return String(text)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    /**
     * Interactive Formula Sandbox & Step-by-Step Solver
     */
    function initFormulaSandbox() {
        const formulaSelect = document.getElementById('sandbox-formula-select');
        const inputsContainer = document.getElementById('sandbox-inputs-container');
        const solveBtn = document.getElementById('sandbox-solve-btn');
        const randomBtn = document.getElementById('sandbox-random-btn');
        const toggleBtn = document.getElementById('sandbox-toggle-btn');
        const toggleLabel = document.getElementById('sandbox-toggle-label');
        const sandboxBody = document.getElementById('sandbox-body');
        const resultContent = document.getElementById('sandbox-result-content');

        if (!formulaSelect || !inputsContainer || !solveBtn || !resultContent) return;

        const FORMULA_SCHEMAS = {
            pythagorean: {
                fields: [
                    { id: 'sb-a', label: 'Side a', default: 3, type: 'number', step: 'any' },
                    { id: 'sb-b', label: 'Side b', default: 4, type: 'number', step: 'any' }
                ],
                examples: [
                    { a: 3, b: 4 },
                    { a: 5, b: 12 },
                    { a: 8, b: 15 },
                    { a: 6, b: 8 }
                ],
                solve: (vals) => {
                    const a = parseFloat(vals['sb-a']) || 0;
                    const b = parseFloat(vals['sb-b']) || 0;
                    const aSq = Math.round(a * a * 1000) / 1000;
                    const bSq = Math.round(b * b * 1000) / 1000;
                    const sum = aSq + bSq;
                    const c = Math.round(Math.sqrt(sum) * 1000) / 1000;
                    return {
                        title: 'Pythagorean Theorem: Hypotenuse Calculation',
                        latex: `\\begin{align*}\\text{Formula: } & c = \\sqrt{a^2 + b^2} \\\\[6pt] \\text{Substitution: } & c = \\sqrt{(${a})^2 + (${b})^2} \\\\[6pt] \\text{Squares: } & c = \\sqrt{${aSq} + ${bSq}} = \\sqrt{${sum}} \\\\[6pt] \\mathbf{Result: } & \\mathbf{c \\approx ${c}}\\end{align*}`,
                        summary: `For right triangle with legs a = ${a} and b = ${b}, the hypotenuse is c ≈ ${c}.`
                    };
                }
            },
            quadratic: {
                fields: [
                    { id: 'sb-a', label: 'Coefficient a', default: 1, type: 'number', step: 'any' },
                    { id: 'sb-b', label: 'Coefficient b', default: -5, type: 'number', step: 'any' },
                    { id: 'sb-c', label: 'Constant c', default: 6, type: 'number', step: 'any' }
                ],
                examples: [
                    { a: 1, b: -5, c: 6 },
                    { a: 1, b: 2, c: 1 },
                    { a: 2, b: -4, c: -6 },
                    { a: 1, b: -7, c: 12 }
                ],
                solve: (vals) => {
                    const a = parseFloat(vals['sb-a']) || 1;
                    const b = parseFloat(vals['sb-b']) || 0;
                    const c = parseFloat(vals['sb-c']) || 0;
                    if (a === 0) {
                        return {
                            title: 'Linear Equation (a = 0)',
                            latex: `\\text{Since } a = 0, \\text{ this is linear: } ${b}x + ${c} = 0 \\implies x = ${-c / b}`,
                            summary: 'Not a quadratic equation.'
                        };
                    }
                    const disc = b * b - 4 * a * c;
                    const twoA = 2 * a;
                    let resultLatex = '';
                    if (disc > 0) {
                        const root1 = Math.round(((-b + Math.sqrt(disc)) / twoA) * 1000) / 1000;
                        const root2 = Math.round(((-b - Math.sqrt(disc)) / twoA) * 1000) / 1000;
                        resultLatex = `\\mathbf{x_1 = ${root1}}, \\quad \\mathbf{x_2 = ${root2}} \\quad \\text{(Two Distinct Real Roots)}`;
                    } else if (disc === 0) {
                        const root = Math.round((-b / twoA) * 1000) / 1000;
                        resultLatex = `\\mathbf{x = ${root}} \\quad \\text{(One Repeated Real Root)}`;
                    } else {
                        const realPart = Math.round((-b / twoA) * 1000) / 1000;
                        const imagPart = Math.round((Math.sqrt(-disc) / twoA) * 1000) / 1000;
                        resultLatex = `\\mathbf{x = ${realPart} \\pm ${imagPart}i} \\quad \\text{(Complex Conjugate Pair)}`;
                    }
                    return {
                        title: 'Quadratic Formula Solution',
                        latex: `\\begin{align*}\\text{Equation: } & ${a}x^2 + (${b})x + (${c}) = 0 \\\\[6pt] \\text{Formula: } & x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a} \\\\[6pt] \\text{Discriminant: } & \\Delta = (${b})^2 - 4(${a})(${c}) = ${disc} \\\\[6pt] \\text{Substitution: } & x = \\frac{-(${b}) \\pm \\sqrt{${disc}}}{2(${a})} = \\frac{${-b} \\pm \\sqrt{${disc}}}{${twoA}} \\\\[6pt] ${resultLatex}\\end{align*}`,
                        summary: `Discriminant Δ = ${disc}. Evaluated with quadratic formula.`
                    };
                }
            },
            slope: {
                fields: [
                    { id: 'sb-x1', label: 'x₁', default: 1, type: 'number', step: 'any' },
                    { id: 'sb-y1', label: 'y₁', default: 2, type: 'number', step: 'any' },
                    { id: 'sb-x2', label: 'x₂', default: 5, type: 'number', step: 'any' },
                    { id: 'sb-y2', label: 'y₂', default: 10, type: 'number', step: 'any' }
                ],
                examples: [
                    { x1: 1, y1: 2, x2: 5, y2: 10 },
                    { x1: 0, y1: 0, x2: 4, y2: 8 },
                    { x1: -2, y1: 3, x2: 4, y2: -3 }
                ],
                solve: (vals) => {
                    const x1 = parseFloat(vals['sb-x1']) || 0;
                    const y1 = parseFloat(vals['sb-y1']) || 0;
                    const x2 = parseFloat(vals['sb-x2']) || 0;
                    const y2 = parseFloat(vals['sb-y2']) || 0;
                    const dy = y2 - y1;
                    const dx = x2 - x1;
                    if (dx === 0) {
                        return {
                            title: 'Vertical Line (Undefined Slope)',
                            latex: `m = \\frac{${y2} - (${y1})}{${x2} - (${x1})} = \\frac{${dy}}{0} \\implies \\mathbf{\\text{Undefined (Vertical Line)}}`,
                            summary: 'Line is perpendicular to the x-axis.'
                        };
                    }
                    const m = Math.round((dy / dx) * 1000) / 1000;
                    return {
                        title: 'Slope of a Line Through Two Points',
                        latex: `\\begin{align*}\\text{Points: } & P_1(${x1}, ${y1}), \\quad P_2(${x2}, ${y2}) \\\\[6pt] \\text{Formula: } & m = \\frac{y_2 - y_1}{x_2 - x_1} \\\\[6pt] \\text{Rise/Run: } & m = \\frac{${y2} - (${y1})}{${x2} - (${x1})} = \\frac{${dy}}{${dx}} \\\\[6pt] \\mathbf{Result: } & \\mathbf{m = ${m}}\\end{align*}`,
                        summary: `The slope between (${x1}, ${y1}) and (${x2}, ${y2}) is m = ${m}.`
                    };
                }
            },
            distance: {
                fields: [
                    { id: 'sb-x1', label: 'x₁', default: 0, type: 'number', step: 'any' },
                    { id: 'sb-y1', label: 'y₁', default: 0, type: 'number', step: 'any' },
                    { id: 'sb-x2', label: 'x₂', default: 3, type: 'number', step: 'any' },
                    { id: 'sb-y2', label: 'y₂', default: 4, type: 'number', step: 'any' }
                ],
                examples: [
                    { x1: 0, y1: 0, x2: 3, y2: 4 },
                    { x1: 1, y1: 1, x2: 7, y2: 9 },
                    { x1: -3, y1: 2, x2: 5, y2: -4 }
                ],
                solve: (vals) => {
                    const x1 = parseFloat(vals['sb-x1']) || 0;
                    const y1 = parseFloat(vals['sb-y1']) || 0;
                    const x2 = parseFloat(vals['sb-x2']) || 0;
                    const y2 = parseFloat(vals['sb-y2']) || 0;
                    const dx = x2 - x1;
                    const dy = y2 - y1;
                    const dx2 = dx * dx;
                    const dy2 = dy * dy;
                    const sum = dx2 + dy2;
                    const d = Math.round(Math.sqrt(sum) * 1000) / 1000;
                    return {
                        title: 'Euclidean Distance Formula',
                        latex: `\\begin{align*}\\text{Formula: } & d = \\sqrt{(x_2 - x_1)^2 + (y_2 - y_1)^2} \\\\[6pt] \\text{Delta: } & \\Delta x = ${dx}, \\quad \\Delta y = ${dy} \\\\[6pt] \\text{Squares: } & d = \\sqrt{(${dx})^2 + (${dy})^2} = \\sqrt{${dx2} + ${dy2}} = \\sqrt{${sum}} \\\\[6pt] \\mathbf{Result: } & \\mathbf{d \\approx ${d}}\\end{align*}`,
                        summary: `Distance between (${x1}, ${y1}) and (${x2}, ${y2}) is d ≈ ${d}.`
                    };
                }
            },
            circle: {
                fields: [
                    { id: 'sb-r', label: 'Radius r', default: 5, type: 'number', step: 'any' }
                ],
                examples: [
                    { r: 5 },
                    { r: 7 },
                    { r: 10 },
                    { r: 3.5 }
                ],
                solve: (vals) => {
                    const r = Math.max(0, parseFloat(vals['sb-r']) || 0);
                    const area = Math.round(Math.PI * r * r * 1000) / 1000;
                    const circum = Math.round(2 * Math.PI * r * 1000) / 1000;
                    return {
                        title: 'Circle Area and Circumference',
                        latex: `\\begin{align*}\\text{Radius: } & r = ${r} \\\\[6pt] \\text{Area: } & A = \\pi r^2 = \\pi (${r})^2 = ${r * r}\\pi \\approx \\mathbf{${area}} \\\\[6pt] \\text{Circumference: } & C = 2\\pi r = 2\\pi (${r}) = ${2 * r}\\pi \\approx \\mathbf{${circum}}\\end{align*}`,
                        summary: `A circle of radius r = ${r} has area A ≈ ${area} and circumference C ≈ ${circum}.`
                    };
                }
            },
            interest: {
                fields: [
                    { id: 'sb-p', label: 'Principal P ($)', default: 1000, type: 'number', step: 'any' },
                    { id: 'sb-rate', label: 'Annual Rate r (%)', default: 5, type: 'number', step: 'any' },
                    { id: 'sb-n', label: 'Compounds/Year n', default: 12, type: 'number', step: '1' },
                    { id: 'sb-t', label: 'Time t (years)', default: 3, type: 'number', step: 'any' }
                ],
                examples: [
                    { p: 1000, rate: 5, n: 12, t: 3 },
                    { p: 5000, rate: 4.5, n: 4, t: 5 },
                    { p: 10000, rate: 7, n: 1, t: 10 }
                ],
                solve: (vals) => {
                    const P = parseFloat(vals['sb-p']) || 1000;
                    const rPct = parseFloat(vals['sb-rate']) || 5;
                    const r = rPct / 100;
                    const n = Math.max(1, parseInt(vals['sb-n'], 10) || 1);
                    const t = parseFloat(vals['sb-t']) || 1;
                    const nt = n * t;
                    const base = 1 + (r / n);
                    const A = Math.round(P * Math.pow(base, nt) * 100) / 100;
                    const interestEarned = Math.round((A - P) * 100) / 100;
                    return {
                        title: 'Compound Interest Calculation',
                        latex: `\\begin{align*}\\text{Formula: } & A = P\\left(1 + \\frac{r}{n}\\right)^{nt} \\\\[6pt] \\text{Parameters: } & P = \\$${P}, \\; r = ${rPct}\\% = ${r}, \\; n = ${n}, \\; t = ${t} \\text{ yrs} \\\\[6pt] \\text{Substitution: } & A = ${P}\\left(1 + \\frac{${r}}{${n}}\\right)^{(${n})(${t})} \\\\[6pt] \\mathbf{Final \\; Amount: } & \\mathbf{A = \\$${A}} \\quad (\\text{Interest Earned: } \\$${interestEarned})\\end{align*}`,
                        summary: `A principal of $${P} compounded ${n} times/year at ${rPct}% for ${t} years yields $${A}.`
                    };
                }
            }
        };

        function renderFields() {
            const schema = FORMULA_SCHEMAS[formulaSelect.value] || FORMULA_SCHEMAS.pythagorean;
            inputsContainer.innerHTML = schema.fields.map(f => `
                <div style="flex: 1 1 120px;">
                    <label for="${f.id}" style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--color-text-default); margin-bottom: 0.25rem;">${f.label}:</label>
                    <input type="${f.type}" id="${f.id}" value="${f.default}" step="${f.step || 'any'}" style="width: 100%; height: 38px; border-radius: 0.5rem; padding: 0.35rem 0.65rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-default); border: 1px solid var(--color-border);">
                </div>
            `).join('');
            runCalculation();
        }

        function runCalculation() {
            const schema = FORMULA_SCHEMAS[formulaSelect.value] || FORMULA_SCHEMAS.pythagorean;
            const vals = {};
            schema.fields.forEach(f => {
                const el = document.getElementById(f.id);
                vals[f.id] = el ? el.value : f.default;
            });
            const result = schema.solve(vals);
            resultContent.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem; flex-wrap: wrap;">
                    <strong style="font-size: 0.95rem; color: var(--color-text-default);"><i class="fas fa-check-circle" style="color: var(--color-primary); margin-right: 0.35rem;"></i>${result.title}</strong>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-primary); background: color-mix(in srgb, var(--color-primary) 12%, transparent); padding: 0.2rem 0.5rem; border-radius: 9999px;">Step-by-Step Proof</span>
                </div>
                <div class="math-sandbox-latex" style="overflow-x: auto; margin: 0.5rem 0; font-size: 1rem;">
                    $$${result.latex}$$
                </div>
                <p style="font-size: 0.85rem; color: var(--color-text-secondary); margin: 0.5rem 0 0 0; line-height: 1.5;">${result.summary}</p>
            `;

            if (typeof window.ensureMathJax === 'function') {
                window.ensureMathJax().then(mj => {
                    if (mj && mj.typesetPromise) {
                        mj.typesetPromise([resultContent]).catch(err => console.debug('Sandbox MathJax error:', err));
                    }
                }).catch(e => console.debug('ensureMathJax error:', e));
            }
        }

        formulaSelect.addEventListener('change', renderFields);
        solveBtn.addEventListener('click', () => {
            runCalculation();
        });

        randomBtn.addEventListener('click', () => {
            const schema = FORMULA_SCHEMAS[formulaSelect.value] || FORMULA_SCHEMAS.pythagorean;
            if (schema.examples && schema.examples.length > 0) {
                const ex = schema.examples[Math.floor(Math.random() * schema.examples.length)];
                Object.keys(ex).forEach(k => {
                    const inputEl = document.getElementById(`sb-${k}`);
                    if (inputEl) inputEl.value = ex[k];
                });
                runCalculation();
            }
        });

        if (toggleBtn && sandboxBody && toggleLabel) {
            toggleBtn.addEventListener('click', () => {
                const isHidden = sandboxBody.style.display === 'none';
                sandboxBody.style.display = isHidden ? 'block' : 'none';
                toggleLabel.textContent = isHidden ? 'Hide Sandbox' : 'Show Sandbox';
                toggleBtn.classList.toggle('active', isHidden);
            });
        }

        renderFields();
    }

    /**
     * Attach Event Listeners
     */
    function setupEventListeners() {
        // Search Input Listener
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentSearchQuery = this.value;
                if (clearSearchBtn) {
                    clearSearchBtn.style.display = currentSearchQuery ? 'inline-flex' : 'none';
                }
                applyFilters();
            });
        }

        // Clear Search Button
        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', function () {
                if (searchInput) {
                    searchInput.value = '';
                    currentSearchQuery = '';
                    this.style.display = 'none';
                    searchInput.focus();
                    applyFilters();
                }
            });
        }

        // View Mode Switcher
        modeTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const mode = this.getAttribute('data-mode');
                modeTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                activeMode = mode;
                if (mode === 'flashcard') {
                    if (flashcardStage) flashcardStage.style.display = 'block';
                    if (sectionsContainer) sectionsContainer.style.display = 'none';
                    if (azRibbon) azRibbon.style.display = 'none';
                    setupFlashcard();
                } else {
                    if (flashcardStage) flashcardStage.style.display = 'none';
                    if (sectionsContainer) sectionsContainer.style.display = 'block';
                    if (azRibbon) azRibbon.style.display = '';
                    renderCardGridState();
                }
            });
        });

        // Flashcard Stage Controls
        const flipBtn = document.getElementById('fc-flip-btn');
        const nextBtn = document.getElementById('fc-next-btn');
        const prevBtn = document.getElementById('fc-prev-btn');
        const shuffleBtn = document.getElementById('fc-shuffle-btn');

        if (flipBtn) flipBtn.addEventListener('click', flipFlashcard);
        if (nextBtn) nextBtn.addEventListener('click', nextFlashcard);
        if (prevBtn) prevBtn.addEventListener('click', prevFlashcard);
        if (shuffleBtn) shuffleBtn.addEventListener('click', shuffleFlashcards);

        // Flashcard Click to Flip
        if (flashcardEl) {
            flashcardEl.addEventListener('click', function (e) {
                if (e.target.closest('button') || e.target.closest('a')) {
                    return;
                }
                flipFlashcard();
            });
        }

        // Category Pills
        categoryPills.forEach(pill => {
            pill.addEventListener('click', function () {
                categoryPills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                activeCategory = this.getAttribute('data-category');
                applyFilters();
            });
        });

        // Grade Band Pills
        gradePills.forEach(pill => {
            pill.addEventListener('click', function () {
                gradePills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                activeGrade = this.getAttribute('data-grade');
                applyFilters();
            });
        });

        // Queue Pills
        queuePills.forEach(pill => {
            pill.addEventListener('click', function () {
                queuePills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                activeQueue = this.getAttribute('data-queue');
                applyFilters();
            });
        });

        // Module Filter Dropdown
        const moduleSelect = document.getElementById('math-vocab-module-select');
        if (moduleSelect) {
            moduleSelect.addEventListener('change', function () {
                activeModule = this.value;
                applyFilters();
            });
        }

        // Delegate Card Buttons (Grid & Flashcards)
        document.addEventListener('click', function (e) {
            // Star Button
            const starBtn = e.target.closest('.vocab-btn-star');
            if (starBtn) {
                const termId = starBtn.getAttribute('data-id');
                if (termId) toggleStar(termId);
                return;
            }

            // Mastered Button
            const mastBtn = e.target.closest('.vocab-btn-mastered');
            if (mastBtn) {
                const termId = mastBtn.getAttribute('data-id');
                if (termId) toggleMastered(termId);
                return;
            }

            // Copy Formula Button
            const copyBtn = e.target.closest('.vocab-btn-copy');
            if (copyBtn) {
                const formula = copyBtn.getAttribute('data-formula');
                if (formula) copyFormula(formula);
                return;
            }

            // Speech Button
            const speakBtn = e.target.closest('.vocab-btn-speak, .fc-btn-speak');
            if (speakBtn) {
                let termText = '';
                let defText = '';
                const card = speakBtn.closest('.math-term-card');
                if (card) {
                    const titleEl = card.querySelector('.math-term-card-title');
                    const defEl = card.querySelector('.math-idx-def-text, .math-term-definition');
                    termText = titleEl ? titleEl.textContent.trim() : '';
                    defText = defEl ? defEl.textContent.trim() : '';
                } else if (filteredTerms[currentFcIndex]) {
                    termText = filteredTerms[currentFcIndex].term;
                    defText = filteredTerms[currentFcIndex].definition;
                }
                if (termText) speakTerm(termText, defText);
                return;
            }

            // Flashcard Rate Buttons
            const rateStar = e.target.closest('.fc-rate-star');
            if (rateStar) {
                const id = rateStar.getAttribute('data-id');
                if (id) toggleStar(id);
                return;
            }

            const rateLearn = e.target.closest('.fc-rate-learning');
            if (rateLearn) {
                const id = rateLearn.getAttribute('data-id');
                if (id) toggleLearning(id);
                return;
            }

            const rateMast = e.target.closest('.fc-rate-mastered');
            if (rateMast) {
                const id = rateMast.getAttribute('data-id');
                if (id) toggleMastered(id);
                return;
            }
        });

        // Global Keyboard Hotkeys
        document.addEventListener('keydown', function (e) {
            if (document.activeElement && document.activeElement.tagName === 'INPUT') {
                return;
            }

            if (activeMode === 'flashcard') {
                if (e.code === 'Space') {
                    e.preventDefault();
                    flipFlashcard();
                } else if (e.code === 'ArrowRight') {
                    e.preventDefault();
                    nextFlashcard();
                } else if (e.code === 'ArrowLeft') {
                    e.preventDefault();
                    prevFlashcard();
                } else if (e.key === 's' || e.key === 'S') {
                    if (filteredTerms[currentFcIndex]) {
                        toggleStar(filteredTerms[currentFcIndex].id);
                    }
                }
            }
        });

        // Export and Print Buttons
        const exportBtn = document.getElementById('math-vocab-export-btn');
        if (exportBtn) exportBtn.addEventListener('click', exportStudyGuide);

        const printBtn = document.getElementById('math-vocab-print-btn');
        if (printBtn) printBtn.addEventListener('click', () => window.print());
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
