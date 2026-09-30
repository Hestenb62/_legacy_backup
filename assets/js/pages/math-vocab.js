/**
 * assets/js/pages/math-vocab.js
 * Universal Mathematics Vocabulary Codex & Active Recall Review
 * Handles 3D flashcard studio, live search, multi-domain filtering,
 * mastery tracking, speech synthesis, and MathJax typesetting.
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
    let modeTabs, categoryPills, queuePills;

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
        const cleanDef = definition.replace(/[\$\{\}\\\^_\*]/g, '').replace(/\\frac\{([^}]+)\}\{([^}]+)\}/g, '$1 over $2');

        const textToSpeak = `${cleanTerm}. Definition: ${cleanDef}`;
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        utterance.rate = 0.95;
        utterance.pitch = 1.0;
        utterance.lang = 'en-US';

        window.speechSynthesis.speak(utterance);
    }

    /**
     * Initialize Math Vocabulary Page
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
                const defMatch = term.definition.toLowerCase().includes(q);
                const catMatch = (term.category || '').toLowerCase().includes(q);
                const exMatch = (term.example || '').toLowerCase().includes(q);
                const stdMatch = (term.standards || []).some(s => s.toLowerCase().includes(q));
                const lessonMatch = (term.lessons || []).some(l => l.title.toLowerCase().includes(q) || l.id.toLowerCase().includes(q));

                if (!termMatch && !defMatch && !catMatch && !exMatch && !stdMatch && !lessonMatch) {
                    return false;
                }
            }

            // 2. Category Filter
            if (activeCategory !== 'all') {
                if (term.category !== activeCategory) {
                    return false;
                }
            }

            // 3. Module Filter
            if (activeModule !== 'all') {
                if (!term.modules || !term.modules.includes(activeModule)) {
                    return false;
                }
            }

            // 4. Mastery Queue Filter
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
                        <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-text-default); margin-bottom: 0.5rem;">No Vocabulary Terms Match Filter</h3>
                        <p style="color: var(--color-text-secondary); font-size: 0.95rem;">Try adjusting your search query, domain filter, or review queue.</p>
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
                    <i class="fas fa-volume-up"></i>
                </button>
            </div>
            <div class="fc-center-content">
                <div class="fc-term-title">${escapeHtml(term.term)}</div>
                <div class="fc-module-hint">${escapeHtml((term.modules && term.modules[0]) ? term.modules[0] : 'High School Mathematics')}</div>
            </div>
            <div class="fc-flip-hint">
                <i class="fas fa-sync-alt"></i> Click card or press <strong>Spacebar</strong> to flip
            </div>
        `;

        // Render Back Face
        let formulaHtml = '';
        if (term.example) {
            formulaHtml = `
                <div class="fc-formula-box" title="Mathematical Example / Formula">
                    <div style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); margin-bottom: 0.35rem;">
                        <i class="fas fa-square-root-variable"></i> Mathematical Exemplar / Formula
                    </div>
                    <div>${term.example}</div>
                </div>
            `;
        }

        let lessonLinksHtml = '';
        if (term.lessons && term.lessons.length > 0) {
            lessonLinksHtml = term.lessons.map(l => `
                <a href="${escapeHtml(l.url)}" class="fc-lesson-link" title="Open Lesson: ${escapeHtml(l.title)}">
                    <i class="fas fa-book-open"></i> ${escapeHtml(l.title)}
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
                    <i class="fas fa-volume-up"></i>
                </button>
            </div>
            <div class="fc-center-content">
                <p class="fc-definition-text">${escapeHtml(term.definition)}</p>
                ${formulaHtml}
                <div style="margin-top: 0.5rem; display: flex; flex-wrap: wrap; gap: 0.5rem; justify-content: center;">
                    ${lessonLinksHtml}
                </div>
            </div>
            <div class="fc-mastery-actions">
                <button type="button" class="fc-action-rate fc-rate-star ${isStarred ? 'active-star' : ''}" data-id="${term.id}">
                    <i class="fas fa-star"></i> ${isStarred ? 'Starred' : 'Star for Later'}
                </button>
                <button type="button" class="fc-action-rate fc-rate-learning ${isLearning ? 'active-learning' : ''}" data-id="${term.id}">
                    <i class="fas fa-clock"></i> Still Learning
                </button>
                <button type="button" class="fc-action-rate fc-rate-mastered ${isMastered ? 'active-mastered' : ''}" data-id="${term.id}">
                    <i class="fas fa-check-circle"></i> Mastered
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
            // Remove from learning if mastered
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
            // Remove from mastered if still learning
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

        let content = `HESTEN'S LEARNING - MATHEMATICS VOCABULARY STUDY GUIDE\n`;
        content += `Export Date: ${new Date().toLocaleDateString()}\n`;
        content += `Total Terms: ${filteredTerms.length}\n`;
        content += `============================================================\n\n`;

        filteredTerms.forEach((t, i) => {
            content += `${i + 1}. ${t.term.toUpperCase()}\n`;
            content += `Category: ${t.category || 'General Math'}\n`;
            content += `Definition: ${t.definition}\n`;
            if (t.example) {
                content += `Exemplar / Formula: ${t.example}\n`;
            }
            if (t.lessons && t.lessons.length > 0) {
                content += `Curriculum Lessons: ${t.lessons.map(l => l.title).join(', ')}\n`;
            }
            content += `------------------------------------------------------------\n\n`;
        });

        const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `Math_Vocabulary_Study_Guide_${new Date().toISOString().slice(0, 10)}.txt`;
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

        // Flashcard Click to Flip (excluding action buttons/links)
        if (flashcardEl) {
            flashcardEl.addEventListener('click', function (e) {
                if (e.target.closest('button') || e.target.closest('a')) {
                    return; // Don't flip when clicking buttons/links
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

        // Queue Pills (Starred, Learning, Mastered)
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

            // Speech Button
            const speakBtn = e.target.closest('.vocab-btn-speak, .fc-btn-speak');
            if (speakBtn) {
                let termText = '';
                let defText = '';
                const card = speakBtn.closest('.math-term-card');
                if (card) {
                    const titleEl = card.querySelector('.math-term-card-title');
                    const defEl = card.querySelector('.math-term-definition');
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
            // Don't intercept when user is typing in search input
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
