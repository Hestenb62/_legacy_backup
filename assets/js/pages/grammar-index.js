/**
 * grammar-index.js - Universal English Grammar Codex & Syntax Analyzer Controller
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    class GrammarCodex {
        constructor() {
            this.searchInput = document.getElementById('grammar-search-input');
            this.clearSearchBtn = document.getElementById('grammar-clear-search');
            this.cards = Array.from(document.querySelectorAll('.grammar-term-card'));
            this.sections = Array.from(document.querySelectorAll('.grammar-az-letter-section'));
            this.ribbonBtns = Array.from(document.querySelectorAll('.grammar-az-letter-btn'));
            this.matchCountEl = document.getElementById('grammar-match-count-num');
            this.emptyState = document.getElementById('grammar-empty-state');
            this.toastEl = document.getElementById('grammar-toast');
            this.toastMsg = document.getElementById('grammar-toast-msg');

            this.currentGradeBand = 'all';
            this.currentSpecificGrade = 'all';
            this.currentBranch = 'all';
            this.showFavoritesOnly = false;
            this.favorites = this.loadFavorites();

            this.init();
        }

        init() {
            this.initSearch();
            this.initFilters();
            this.initFavorites();
            this.initCardActions();
            this.initExportAndPrint();
            this.initScrollSpy();
            this.initSyntaxSandbox();
            this.updateView();
        }

        // =========================================================================
        // Favorites / Study List Management
        // =========================================================================
        loadFavorites() {
            try {
                return JSON.parse(localStorage.getItem('hl_grammar_favorites')) || [];
            } catch (e) {
                return [];
            }
        }

        saveFavorites() {
            try {
                localStorage.setItem('hl_grammar_favorites', JSON.stringify(this.favorites));
                window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_grammar_favorites' } }));
            } catch (e) {}
            this.updateFavoriteCounts();
        }

        updateFavoriteCounts() {
            const favCountEl = document.getElementById('grammar-fav-count');
            if (favCountEl) {
                favCountEl.textContent = this.favorites.length;
            }
        }

        showToast(msg) {
            if (!this.toastEl) return;
            if (this.toastMsg) this.toastMsg.textContent = msg;
            this.toastEl.classList.add('show');
            clearTimeout(this.toastTimeout);
            this.toastTimeout = setTimeout(() => {
                this.toastEl.classList.remove('show');
            }, 2500);
        }

        // =========================================================================
        // Live Search
        // =========================================================================
        initSearch() {
            if (!this.searchInput) return;

            let debounceTimer;
            this.searchInput.addEventListener('input', () => {
                clearTimeout(debounceTimer);
                if (this.clearSearchBtn) {
                    this.clearSearchBtn.style.display = this.searchInput.value.trim() ? 'block' : 'none';
                }
                debounceTimer = setTimeout(() => this.updateView(), 120);
            });

            if (this.clearSearchBtn) {
                this.clearSearchBtn.addEventListener('click', () => {
                    this.searchInput.value = '';
                    this.clearSearchBtn.style.display = 'none';
                    this.searchInput.focus();
                    this.updateView();
                });
            }

            // Keyboard shortcut Ctrl+K or '/'
            document.addEventListener('keydown', (e) => {
                if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                    e.preventDefault();
                    this.searchInput.focus();
                    this.searchInput.select();
                } else if (e.key === '/' && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
                    e.preventDefault();
                    this.searchInput.focus();
                    this.searchInput.select();
                } else if (e.key === 'Escape' && document.activeElement === this.searchInput) {
                    this.searchInput.blur();
                }
            });
        }

        // =========================================================================
        // Filter Controls
        // =========================================================================
        initFilters() {
            // Grade Band buttons
            const gradeBandBtns = document.querySelectorAll('[data-grade="all"], [data-grade="elem"], [data-grade="mid"], [data-grade="high"]');
            gradeBandBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    gradeBandBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    this.currentGradeBand = btn.dataset.grade;
                    this.currentSpecificGrade = 'all';
                    document.querySelectorAll('[data-grade^="grade-"]').forEach(b => b.classList.remove('active'));
                    this.playClick();
                    this.updateView();
                });
            });

            // Specific Grade buttons
            const specificGradeBtns = document.querySelectorAll('[data-grade^="grade-"]');
            specificGradeBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const isAlreadyActive = btn.classList.contains('active');
                    specificGradeBtns.forEach(b => b.classList.remove('active'));
                    if (isAlreadyActive) {
                        this.currentSpecificGrade = 'all';
                    } else {
                        btn.classList.add('active');
                        this.currentSpecificGrade = btn.dataset.grade;
                        // Deselect broad grade band
                        gradeBandBtns.forEach(b => b.classList.remove('active'));
                    }
                    this.playClick();
                    this.updateView();
                });
            });

            // Domain / Branch buttons
            const branchBtns = document.querySelectorAll('[data-branch]');
            branchBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    branchBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    this.currentBranch = btn.dataset.branch;
                    this.playClick();
                    this.updateView();
                });
            });

            // Reset filters
            const resetBtn = document.getElementById('grammar-reset-filters');
            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    if (this.searchInput) this.searchInput.value = '';
                    if (this.clearSearchBtn) this.clearSearchBtn.style.display = 'none';
                    this.currentGradeBand = 'all';
                    this.currentSpecificGrade = 'all';
                    this.currentBranch = 'all';
                    this.showFavoritesOnly = false;

                    document.querySelectorAll('.grammar-pill-btn').forEach(b => b.classList.remove('active'));
                    document.querySelector('[data-grade="all"]')?.classList.add('active');
                    document.querySelector('[data-branch="all"]')?.classList.add('active');
                    document.getElementById('grammar-fav-toggle')?.classList.remove('active');

                    this.playClick();
                    this.updateView();
                });
            }
        }

        initFavorites() {
            const favToggle = document.getElementById('grammar-fav-toggle');
            if (favToggle) {
                favToggle.addEventListener('click', () => {
                    this.showFavoritesOnly = !this.showFavoritesOnly;
                    favToggle.classList.toggle('active', this.showFavoritesOnly);
                    this.playClick();
                    this.updateView();
                });
            }
            this.updateFavoriteCounts();
        }

        // =========================================================================
        // Card Interactive Actions (TTS, Copy, Fav, Note)
        // =========================================================================
        initCardActions() {
            this.cards.forEach(card => {
                const termId = card.dataset.termId;
                const favBtn = card.querySelector('.grammar-btn-fav');
                if (favBtn) {
                    favBtn.classList.toggle('active', this.favorites.includes(termId));
                    favBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        if (this.favorites.includes(termId)) {
                            this.favorites = this.favorites.filter(id => id !== termId);
                            favBtn.classList.remove('active');
                            this.showToast('Removed from Study List');
                        } else {
                            this.favorites.push(termId);
                            favBtn.classList.add('active');
                            this.showToast('Saved to Study List ⭐');
                        }
                        this.saveFavorites();
                        if (this.showFavoritesOnly) this.updateView();
                    });
                }

                // Copy Formula/Rule
                const copyBtn = card.querySelector('.grammar-btn-copy');
                if (copyBtn) {
                    copyBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const formula = copyBtn.dataset.formula || card.querySelector('.grammar-formula-display')?.innerText || '';
                        if (navigator.clipboard && formula) {
                            navigator.clipboard.writeText(formula).then(() => {
                                this.showToast('Copied rule syntax to clipboard!');
                                if (window.HLSound) window.HLSound.playClick();
                            });
                        }
                    });
                }

                // TTS Pronounce & Definition
                const speakBtn = card.querySelector('.grammar-btn-speak');
                if (speakBtn) {
                    speakBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const title = card.querySelector('.grammar-term-title')?.innerText || '';
                        const def = card.querySelector('.grammar-definition-text')?.innerText || '';
                        const what = card.querySelector('.grammar-what-it-does')?.innerText || '';

                        if ('speechSynthesis' in window) {
                            if (window.speechSynthesis.speaking) {
                                window.speechSynthesis.cancel();
                                speakBtn.classList.remove('active');
                                return;
                            }
                            const utter = new SpeechSynthesisUtterance(`${title}. Definition: ${def}. Key grammatical role: ${what}`);
                            utter.rate = 0.92;
                            utter.pitch = 1.0;
                            utter.onstart = () => speakBtn.classList.add('active');
                            utter.onend = () => speakBtn.classList.remove('active');
                            utter.onerror = () => speakBtn.classList.remove('active');
                            window.speechSynthesis.speak(utter);
                        }
                    });
                }

                // Note to Scratchpad
                const noteBtn = card.querySelector('.grammar-btn-note');
                if (noteBtn) {
                    noteBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const title = card.querySelector('.grammar-term-title')?.innerText || '';
                        const formula = card.querySelector('.grammar-formula-display')?.innerText || '';
                        const note = `\n--- 📖 Grammar Rule: ${title} ---\nSyntax: ${formula}\nSaved from English Grammar Codex\n`;
                        try {
                            const cur = localStorage.getItem('hl_scratchpad_notes') || '';
                            localStorage.setItem('hl_scratchpad_notes', cur + note);
                            this.showToast('Saved rule to Digital Scratchpad (Alt+S)');
                            if (window.HLSound) window.HLSound.playCorrect();
                        } catch (err) {}
                    });
                }
            });
        }

        // =========================================================================
        // Export & Print
        // =========================================================================
        initExportAndPrint() {
            const exportBtn = document.getElementById('grammar-export-btn');
            if (exportBtn) {
                exportBtn.addEventListener('click', () => {
                    const visibleCards = this.cards.filter(c => c.style.display !== 'none');
                    let content = `=== HESTEN'S LEARNING: ENGLISH GRAMMAR STUDY GUIDE ===\n`;
                    content += `Generated: ${new Date().toLocaleDateString()} | Total Rules: ${visibleCards.length}\n\n`;

                    visibleCards.forEach((c, idx) => {
                        const title = c.querySelector('.grammar-term-title')?.innerText.trim();
                        const etym = c.querySelector('.grammar-term-etymology')?.innerText.trim();
                        const formula = c.querySelector('.grammar-formula-display')?.innerText.trim();
                        const def = c.querySelector('.grammar-definition-text')?.innerText.trim();
                        const what = c.querySelector('.grammar-what-it-does')?.innerText.trim();

                        content += `[${idx + 1}] ${title}\n`;
                        if (etym) content += `Origin: ${etym}\n`;
                        if (formula) content += `Pattern/Rule: ${formula}\n`;
                        if (def) content += `Definition: ${def}\n`;
                        if (what) content += `Function: ${what}\n`;
                        content += `----------------------------------------------------\n\n`;
                    });

                    const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = `grammar-study-guide-${new Date().toISOString().slice(0, 10)}.txt`;
                    a.click();
                    URL.revokeObjectURL(url);
                    this.showToast('Downloaded Grammar Study Sheet!');
                });
            }

            const printBtn = document.getElementById('grammar-print-btn');
            if (printBtn) {
                printBtn.addEventListener('click', () => {
                    window.print();
                });
            }
        }

        // =========================================================================
        // Sticky Ribbon Scroll Spy
        // =========================================================================
        initScrollSpy() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const letter = entry.target.dataset.letter;
                        this.ribbonBtns.forEach(btn => {
                            btn.classList.toggle('active', btn.dataset.azLetter === letter);
                        });
                    }
                });
            }, { rootMargin: '-20% 0px -70% 0px' });

            this.sections.forEach(sec => observer.observe(sec));
        }

        // =========================================================================
        // Interactive Sentence Diagrammer & Syntax Analyzer
        // =========================================================================
        initSyntaxSandbox() {
            const selectEl = document.getElementById('sandbox-sentence-select');
            const customInput = document.getElementById('sandbox-custom-input');
            const analyzeBtn = document.getElementById('sandbox-analyze-btn');
            const randomBtn = document.getElementById('sandbox-random-btn');
            const resultBox = document.getElementById('sandbox-analysis-result');
            const toggleBtn = document.getElementById('sandbox-toggle-btn');
            const sandboxBody = document.getElementById('sandbox-body');
            const toggleLabel = document.getElementById('sandbox-toggle-label');

            if (!selectEl || !resultBox) return;

            const presets = {
                'simple': {
                    text: 'The brilliant astronomer calibrated the optical telescope.',
                    type: 'Simple Sentence (1 Independent Clause)',
                    voice: 'Active Voice',
                    tokens: [
                        { word: 'The', role: 'Article / Determiner', cls: 'syntax-token-mod' },
                        { word: 'brilliant', role: 'Adjective', cls: 'syntax-token-mod' },
                        { word: 'astronomer', role: 'Subject Noun', cls: 'syntax-token-subj' },
                        { word: 'calibrated', role: 'Transitive Verb', cls: 'syntax-token-verb' },
                        { word: 'the', role: 'Article', cls: 'syntax-token-mod' },
                        { word: 'optical', role: 'Adjective', cls: 'syntax-token-mod' },
                        { word: 'telescope.', role: 'Direct Object', cls: 'syntax-token-obj' }
                    ],
                    breakdown: 'A single complete independent clause containing one subject noun phrase ("The brilliant astronomer") and a transitive predicate transferring action to the direct object ("the optical telescope").'
                },
                'compound': {
                    text: 'The severe blizzard severed electrical lines, but the emergency generator activated immediately.',
                    type: 'Compound Sentence (2 Independent Clauses + Coordinating Conjunction)',
                    voice: 'Active Voice',
                    tokens: [
                        { word: 'The severe blizzard', role: 'Subject 1', cls: 'syntax-token-subj' },
                        { word: 'severed', role: 'Verb 1', cls: 'syntax-token-verb' },
                        { word: 'electrical lines,', role: 'Direct Object 1', cls: 'syntax-token-obj' },
                        { word: 'but', role: 'Coordinating Conjunction (FANBOYS)', cls: 'syntax-token-conj' },
                        { word: 'the emergency generator', role: 'Subject 2', cls: 'syntax-token-subj' },
                        { word: 'activated', role: 'Intransitive Verb 2', cls: 'syntax-token-verb' },
                        { word: 'immediately.', role: 'Adverbial Modifier', cls: 'syntax-token-mod' }
                    ],
                    breakdown: 'Two balanced independent clauses joined with a comma and the coordinating conjunction "but". Each clause can stand independently as an autonomous sentence.'
                },
                'complex': {
                    text: 'Although the orbital probe lost contact, the mission team recovered the telemetry signals.',
                    type: 'Complex Sentence (1 Subordinate Dependent Clause + 1 Independent Clause)',
                    voice: 'Active Voice',
                    tokens: [
                        { word: 'Although', role: 'Subordinating Conjunction', cls: 'syntax-token-conj' },
                        { word: 'the orbital probe', role: 'Dependent Subject', cls: 'syntax-token-subj' },
                        { word: 'lost', role: 'Dependent Verb', cls: 'syntax-token-verb' },
                        { word: 'contact,', role: 'Dependent Object', cls: 'syntax-token-obj' },
                        { word: 'the mission team', role: 'Independent Subject', cls: 'syntax-token-subj' },
                        { word: 'recovered', role: 'Independent Verb', cls: 'syntax-token-verb' },
                        { word: 'the telemetry signals.', role: 'Independent Direct Object', cls: 'syntax-token-obj' }
                    ],
                    breakdown: 'Opens with an introductory adverbial dependent clause ("Although the orbital probe lost contact") setting up condition, followed by the resolving main clause.'
                },
                'passive': {
                    text: 'The ancient papyrus scrolls were meticulously translated by archaeological scholars.',
                    type: 'Simple Sentence (Passive Voice Transformation)',
                    voice: 'Passive Voice ("were translated by")',
                    tokens: [
                        { word: 'The ancient papyrus scrolls', role: 'Grammatical Subject (Patient)', cls: 'syntax-token-obj' },
                        { word: 'were translated', role: 'Passive Verb (Be + Participle)', cls: 'syntax-token-verb' },
                        { word: 'meticulously', role: 'Manner Adverb', cls: 'syntax-token-mod' },
                        { word: 'by archaeological scholars.', role: 'Prepositional Agent (True Doer)', cls: 'syntax-token-prep' }
                    ],
                    breakdown: 'Passive voice construction: the patient ("scrolls") occupies the grammatical subject position while the actual agents ("scholars") are placed inside a trailing prepositional phrase.'
                },
                'subjunctive': {
                    text: 'If the climate were completely static, atmospheric prediction would be effortless.',
                    type: 'Complex Sentence (Counterfactual Subjunctive Mood)',
                    voice: 'Active Voice / Hypothetical Condition',
                    tokens: [
                        { word: 'If', role: 'Conditional Subordinator', cls: 'syntax-token-conj' },
                        { word: 'the climate', role: 'Subject', cls: 'syntax-token-subj' },
                        { word: 'were', role: 'Subjunctive Verb (Unreal Past)', cls: 'syntax-token-verb' },
                        { word: 'completely static,', role: 'Predicate Adjective Complement', cls: 'syntax-token-mod' },
                        { word: 'atmospheric prediction', role: 'Independent Subject', cls: 'syntax-token-subj' },
                        { word: 'would be', role: 'Modal Conditional Verb', cls: 'syntax-token-verb' },
                        { word: 'effortless.', role: 'Subject Complement', cls: 'syntax-token-mod' }
                    ],
                    breakdown: 'Uses the subjunctive "were" with singular noun "climate" to mark a counterfactual hypothesis contrary to reality, paired with the conditional modal "would be".'
                }
            };

            const runAnalysis = (key, customVal) => {
                let data = presets[key] || presets['simple'];
                if (customVal && customVal.trim()) {
                    const words = customVal.trim().split(/\s+/);
                    const isPassive = customVal.includes(' was ') || customVal.includes(' were ') || customVal.includes(' by ');
                    const hasSubordinator = /^(although|because|since|if|while|unless|when)\b/i.test(customVal) || /,\s*(although|because|since|if|while|unless)\b/i.test(customVal);
                    const hasCoordinator = /,\s*(and|but|or|so|yet|for|nor)\b/i.test(customVal);

                    let detectedType = 'Simple Sentence (1 Independent Clause)';
                    if (hasSubordinator && hasCoordinator) {
                        detectedType = 'Compound-Complex Sentence (Multiple Independent + Dependent Clauses)';
                    } else if (hasSubordinator) {
                        detectedType = 'Complex Sentence (Independent + Subordinate Clause)';
                    } else if (hasCoordinator) {
                        detectedType = 'Compound Sentence (2 Independent Clauses with Conjunction)';
                    }

                    data = {
                        text: customVal.trim(),
                        type: detectedType,
                        voice: isPassive ? 'Passive Voice Detected' : 'Active Voice',
                        tokens: words.map((w, idx) => {
                            let role = 'Word / Modifier';
                            let cls = 'syntax-token-mod';
                            const clean = w.toLowerCase().replace(/[^a-z]/g, '');
                            if (idx === 0 || idx === 1) {
                                role = 'Subject / Determiner';
                                cls = 'syntax-token-subj';
                            } else if (['is', 'are', 'was', 'were', 'have', 'had', 'calibrated', 'analyzed', 'wrote', 'discovered', 'made', 'created'].includes(clean)) {
                                role = 'Verb';
                                cls = 'syntax-token-verb';
                            } else if (['and', 'but', 'or', 'so', 'yet', 'although', 'because', 'if', 'while'].includes(clean)) {
                                role = 'Conjunction';
                                cls = 'syntax-token-conj';
                            } else if (['in', 'on', 'at', 'by', 'for', 'with', 'from', 'under'].includes(clean)) {
                                role = 'Preposition';
                                cls = 'syntax-token-prep';
                            }
                            return { word: w, role, cls };
                        }),
                        breakdown: `Sentence parsed into ${words.length} grammatical tokens. Classified as ${detectedType} (${isPassive ? 'Passive Voice' : 'Active Voice'}).`
                    };
                }

                // Render token stream
                const tokensHtml = data.tokens.map(t => `
                    <div class="syntax-token ${t.cls}">
                        <span>${t.word}</span>
                        <span class="token-role">${t.role}</span>
                    </div>
                `).join('');

                resultBox.innerHTML = `
                    <div style="margin-bottom: 0.75rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                        <span style="font-weight: 800; color: #059669; font-size: 0.85rem; text-transform: uppercase;">
                            <i class="fas fa-sitemap mr-1"></i> ${data.type}
                        </span>
                        <span style="font-size: 0.775rem; font-weight: 800; padding: 0.2rem 0.6rem; border-radius: 9999px; background: rgba(79,70,229,0.1); color: #4f46e5;">
                            ${data.voice}
                        </span>
                    </div>
                    <div style="background: var(--color-bg-base, #f8fafc); border: 1px solid var(--color-border, #e2e8f0); border-radius: 0.75rem; padding: 0.75rem; margin-bottom: 0.75rem; display: flex; flex-wrap: wrap; gap: 0.25rem;">
                        ${tokensHtml}
                    </div>
                    <div style="font-size: 0.85rem; color: var(--color-text-muted, #475569); line-height: 1.5; border-left: 3px solid #10b981; padding-left: 0.75rem;">
                        <strong>Grammatical Dissection:</strong> ${data.breakdown}
                    </div>
                `;

                if (window.HLSound && typeof window.HLSound.playCorrect === 'function') {
                    window.HLSound.playCorrect();
                }
            };

            selectEl.addEventListener('change', () => {
                if (customInput) customInput.value = '';
                runAnalysis(selectEl.value);
            });

            if (analyzeBtn) {
                analyzeBtn.addEventListener('click', () => {
                    const custom = customInput ? customInput.value.trim() : '';
                    runAnalysis(selectEl.value, custom);
                });
            }

            if (randomBtn) {
                randomBtn.addEventListener('click', () => {
                    const keys = Object.keys(presets);
                    const nextKey = keys[Math.floor(Math.random() * keys.length)];
                    selectEl.value = nextKey;
                    if (customInput) customInput.value = '';
                    runAnalysis(nextKey);
                });
            }

            if (toggleBtn && sandboxBody) {
                toggleBtn.addEventListener('click', () => {
                    const isHidden = sandboxBody.style.display === 'none';
                    sandboxBody.style.display = isHidden ? 'block' : 'none';
                    toggleLabel.textContent = isHidden ? 'Hide Analyzer' : 'Show Analyzer';
                    toggleBtn.classList.toggle('active', isHidden);
                });
            }

            // Initial run
            runAnalysis('simple');
        }

        playClick() {
            if (window.HLSound && typeof window.HLSound.playClick === 'function') {
                window.HLSound.playClick();
            }
        }

        // =========================================================================
        // Master View Rendering & Filtering
        // =========================================================================
        updateView() {
            const query = (this.searchInput?.value || '').trim().toLowerCase();
            let visibleCount = 0;
            const letterCountMap = {};

            this.cards.forEach(card => {
                const termId = card.dataset.termId;
                const letter = card.dataset.letter;
                const grade = parseInt(card.dataset.grade, 10);
                const branch = card.dataset.branch;
                const keywords = (card.dataset.keywords || '').toLowerCase();
                const title = (card.querySelector('.grammar-term-title')?.innerText || '').toLowerCase();
                const def = (card.querySelector('.grammar-definition-text')?.innerText || '').toLowerCase();

                // 1. Search Query filter
                let matchesSearch = true;
                if (query) {
                    matchesSearch = title.includes(query) || def.includes(query) || keywords.includes(query);
                }

                // 2. Grade Band filter
                let matchesGrade = true;
                if (this.currentSpecificGrade !== 'all') {
                    const targetG = parseInt(this.currentSpecificGrade.replace('grade-', ''), 10);
                    matchesGrade = (grade === targetG);
                } else if (this.currentGradeBand === 'elem') {
                    matchesGrade = (grade <= 5);
                } else if (this.currentGradeBand === 'mid') {
                    matchesGrade = (grade >= 6 && grade <= 8);
                } else if (this.currentGradeBand === 'high') {
                    matchesGrade = (grade >= 9 && grade <= 12);
                }

                // 3. Branch / Domain filter
                let matchesBranch = true;
                if (this.currentBranch !== 'all') {
                    matchesBranch = (branch === this.currentBranch);
                }

                // 4. Favorites filter
                let matchesFav = true;
                if (this.showFavoritesOnly) {
                    matchesFav = this.favorites.includes(termId);
                }

                const isVisible = matchesSearch && matchesGrade && matchesBranch && matchesFav;
                card.style.display = isVisible ? 'flex' : 'none';

                if (isVisible) {
                    visibleCount++;
                    letterCountMap[letter] = (letterCountMap[letter] || 0) + 1;
                }
            });

            // Update letter section visibility and ribbon badges
            this.sections.forEach(sec => {
                const letter = sec.dataset.letter;
                const count = letterCountMap[letter] || 0;
                sec.style.display = count > 0 ? 'block' : 'none';

                const secCountEl = sec.querySelector('.grammar-az-letter-count');
                if (secCountEl) {
                    secCountEl.textContent = `${count} ${count === 1 ? 'rule' : 'rules'}`;
                }

                const ribbonBtn = document.querySelector(`.grammar-az-letter-btn[data-az-letter="${letter}"]`);
                if (ribbonBtn) {
                    ribbonBtn.classList.toggle('disabled', count === 0);
                    ribbonBtn.setAttribute('aria-disabled', count === 0 ? 'true' : 'false');
                }
            });

            // Status count & Empty State
            if (this.matchCountEl) {
                this.matchCountEl.textContent = visibleCount;
            }
            if (this.emptyState) {
                this.emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        window.grammarCodex = new GrammarCodex();
    });
})();
