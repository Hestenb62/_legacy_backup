/**
 * Universal Mathematics Codex & Index Controller (assets/js/pages/math-index.js)
 * Live search, multi-grade band filters, audio pronunciation (TTS),
 * formula clipboard copying, local study-list favorites, and synoptic export.
 */

(function () {
    'use strict';

    // State Variables
    let activeGrade = 'all';
    let activeBranch = 'all';
    let searchQuery = '';
    let showFavoritesOnly = false;
    let favorites = new Set();

    // DOM Elements
    const searchInput = document.getElementById('math-search-input');
    const clearSearchBtn = document.getElementById('math-clear-search');
    const gradePills = document.querySelectorAll('.math-pill-btn[data-grade]');
    const branchPills = document.querySelectorAll('.math-pill-btn[data-branch]');
    const favToggleBtn = document.getElementById('math-fav-toggle');
    const matchCountEl = document.getElementById('math-match-count-num');
    const totalCountEl = document.getElementById('math-total-count-num');
    const cardsGrid = document.getElementById('math-cards-grid');
    const emptyState = document.getElementById('math-empty-state');
    const resetFiltersBtn = document.getElementById('math-reset-filters');
    const exportBtn = document.getElementById('math-export-btn');
    const printBtn = document.getElementById('math-print-btn');
    const toastEl = document.getElementById('math-toast');
    const toastMsg = document.getElementById('math-toast-msg');

    // Load Favorites from LocalStorage
    try {
        const stored = localStorage.getItem('hl_math_favorites');
        if (stored) {
            favorites = new Set(JSON.parse(stored));
        }
    } catch (e) {
        console.warn('Could not read math favorites from localStorage:', e);
    }

    // Initialize Toast Notification
    let toastTimeout = null;
    function showToast(msg) {
        if (!toastEl || !toastMsg) return;
        toastMsg.textContent = msg;
        toastEl.classList.add('show');
        if (toastTimeout) clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toastEl.classList.remove('show');
        }, 2400);
    }

    // Speech Synthesis for Term Pronunciation
    function speakTerm(term, definition) {
        if (!('speechSynthesis' in window)) {
            showToast('Speech synthesis not supported in this browser.');
            return;
        }
        window.speechSynthesis.cancel(); // Stop any active utterance
        const textToRead = `${term}. ${definition}`;
        const utterance = new SpeechSynthesisUtterance(textToRead);
        utterance.rate = 0.95;
        utterance.pitch = 1.0;
        window.speechSynthesis.speak(utterance);
        showToast(`Pronouncing: "${term}"`);
    }

    // Formula Clipboard Copy
    function copyFormula(formulaText) {
        if (!formulaText) return;
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(formulaText).then(() => {
                showToast('Formula copied to clipboard!');
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
            showToast('Formula copied to clipboard!');
        } catch (err) {
            showToast('Unable to copy formula.');
        }
        document.body.removeChild(ta);
    }

    // Save Favorites to LocalStorage
    function saveFavorites() {
        try {
            localStorage.setItem('hl_math_favorites', JSON.stringify(Array.from(favorites)));
            window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_math_favorites' } }));
        } catch (e) {
            console.warn('Could not save math favorites:', e);
        }
    }

    // Toggle Favorite on a Card
    function toggleFavorite(cardId, starBtn) {
        if (favorites.has(cardId)) {
            favorites.delete(cardId);
            starBtn.classList.remove('active');
            starBtn.setAttribute('aria-pressed', 'false');
            starBtn.querySelector('i').className = 'far fa-star';
            showToast('Removed from Study List');
        } else {
            favorites.add(cardId);
            starBtn.classList.add('active');
            starBtn.setAttribute('aria-pressed', 'true');
            starBtn.querySelector('i').className = 'fas fa-star';
            showToast('Added to Study List ★');
        }
        saveFavorites();
        updateFavoritesBadge();
        if (showFavoritesOnly) {
            filterCards();
        }
    }

    function updateFavoritesBadge() {
        const favCountBadge = document.getElementById('math-fav-count');
        if (favCountBadge) {
            favCountBadge.textContent = favorites.size;
        }
    }

    // Core Filter Logic
    function filterCards() {
        const cards = document.querySelectorAll('.math-term-card');
        let visibleCount = 0;
        const q = searchQuery.toLowerCase().trim();

        cards.forEach((card) => {
            const cardGrade = parseInt(card.getAttribute('data-grade'), 10) || 0;
            const cardBranch = card.getAttribute('data-branch') || '';
            const cardId = card.getAttribute('data-term-id') || '';
            const cardKeywords = card.getAttribute('data-keywords') || '';
            const cardText = card.innerText.toLowerCase();

            // 1. Grade Match
            let gradeMatch = false;
            if (activeGrade === 'all') {
                gradeMatch = true;
            } else if (activeGrade === 'elem') {
                gradeMatch = (cardGrade >= 1 && cardGrade <= 5);
            } else if (activeGrade === 'mid') {
                gradeMatch = (cardGrade >= 6 && cardGrade <= 8);
            } else if (activeGrade === 'high') {
                gradeMatch = (cardGrade >= 9 && cardGrade <= 12);
            } else if (activeGrade.startsWith('grade-')) {
                const targetGradeNum = parseInt(activeGrade.replace('grade-', ''), 10);
                gradeMatch = (cardGrade === targetGradeNum);
            }

            // 2. Branch Match
            let branchMatch = (activeBranch === 'all' || cardBranch === activeBranch);

            // 3. Favorites Match
            let favMatch = (!showFavoritesOnly || favorites.has(cardId));

            // 4. Search Query Match
            let searchMatch = true;
            if (q) {
                searchMatch = cardKeywords.toLowerCase().includes(q) || cardText.includes(q);
            }

            if (gradeMatch && branchMatch && favMatch && searchMatch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update Letter Sections Visibility & Counts
        const letterSections = document.querySelectorAll('.math-az-letter-section');
        const visibleLetters = new Set();

        letterSections.forEach((section) => {
            const letter = section.getAttribute('data-letter');
            const visibleEntries = section.querySelectorAll('.math-term-card:not([style*="display: none"])').length;
            if (visibleEntries > 0) {
                section.style.display = '';
                visibleLetters.add(letter);
                const countBadge = section.querySelector('.math-az-letter-count');
                if (countBadge) {
                    countBadge.textContent = `${visibleEntries} ${visibleEntries === 1 ? 'term' : 'terms'}`;
                }
            } else {
                section.style.display = 'none';
            }
        });

        // Synchronize A-Z Navigation Ribbon Buttons
        document.querySelectorAll('.math-az-letter-btn[data-az-letter]').forEach((btn) => {
            const l = btn.getAttribute('data-az-letter');
            if (visibleLetters.has(l)) {
                btn.classList.remove('disabled');
                btn.removeAttribute('aria-disabled');
            } else {
                btn.classList.add('disabled');
                btn.setAttribute('aria-disabled', 'true');
            }
        });

        // Update Counter
        if (matchCountEl) matchCountEl.textContent = visibleCount;

        // Toggle Empty State
        if (emptyState) {
            emptyState.style.display = (visibleCount === 0) ? 'block' : 'none';
        }

        // Trigger MathJax typesetting if newly visible math elements need it
        if (typeof window.ensureMathJax === 'function') {
            window.ensureMathJax();
        }
    }

    // Export Currently Visible Terms as Plain Text Study Sheet
    function exportStudySheet() {
        const visibleCards = document.querySelectorAll('.math-term-card:not([style*="display: none"])');
        if (visibleCards.length === 0) {
            showToast('No terms visible to export.');
            return;
        }

        let out = '========================================================================\n';
        out += "HESTEN'S LEARNING UNIVERSAL MATHEMATICS INDEX & STUDY CONCORDANCE\n";
        out += `Exported on: ${new Date().toLocaleDateString()} | Active Filter Count: ${visibleCards.length} Terms\n`;
        out += '========================================================================\n\n';

        visibleCards.forEach((card, idx) => {
            const title = card.querySelector('.math-term-title')?.childNodes[0]?.textContent?.trim() || 'Mathematical Concept';
            const grade = card.querySelector('.math-badge-grade')?.innerText || '';
            const branch = card.querySelector('.math-badge-branch')?.innerText || '';
            const def = card.querySelector('.math-idx-def-text')?.innerText?.replace(/\s+/g, ' ')?.trim() || '';
            const does = card.querySelector('.math-idx-does-text')?.innerText?.replace(/\s+/g, ' ')?.trim() || '';
            const steps = Array.from(card.querySelectorAll('.math-idx-step-item')).map(s => s.innerText.replace(/\s+/g, ' ').trim());
            const problem = card.querySelector('.math-idx-problem')?.innerText?.replace(/\s+/g, ' ')?.trim() || '';
            const solution = card.querySelector('.math-idx-solution')?.innerText?.replace(/\s+/g, ' ')?.trim() || '';

            out += `[${idx + 1}] ${title.toUpperCase()} (${grade} • ${branch})\n`;
            out += `------------------------------------------------------------------------\n`;
            out += `* DEFINITION:\n  ${def}\n\n`;
            out += `* WHAT IT DOES & WHY IT MATTERS:\n  ${does}\n\n`;
            if (steps.length > 0) {
                out += `* HOW TO DO IT:\n`;
                steps.forEach((st, sIdx) => {
                    out += `  ${sIdx + 1}. ${st}\n`;
                });
                out += `\n`;
            }
            if (problem) {
                out += `* WORKED EXEMPLUM:\n  Problem:  ${problem}\n  Solution: ${solution}\n\n`;
            }
            out += `\n`;
        });

        const blob = new Blob([out], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `hestens-math-index-study-sheet-${new Date().toISOString().slice(0, 10)}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showToast('Study sheet exported successfully!');
    }

    // Initialize Event Listeners
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Star Status from LocalStorage
        document.querySelectorAll('.math-term-card').forEach((card) => {
            const cardId = card.getAttribute('data-term-id');
            const starBtn = card.querySelector('.math-btn-fav');
            if (cardId && starBtn && favorites.has(cardId)) {
                starBtn.classList.add('active');
                starBtn.setAttribute('aria-pressed', 'true');
                starBtn.querySelector('i').className = 'fas fa-star';
            }
        });
        updateFavoritesBadge();

        // Search Input with Debounce
        let searchDebounce = null;
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                clearTimeout(searchDebounce);
                searchQuery = searchInput.value;
                if (clearSearchBtn) {
                    clearSearchBtn.style.display = searchQuery ? 'inline-flex' : 'none';
                }
                searchDebounce = setTimeout(filterCards, 120);
            });
        }

        // Clear Search Button
        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', () => {
                if (searchInput) {
                    searchInput.value = '';
                    searchInput.focus();
                }
                searchQuery = '';
                clearSearchBtn.style.display = 'none';
                filterCards();
            });
        }

        // Smooth Scroll & Active Indicator for A-Z Navigation Ribbon
        document.querySelectorAll('.math-az-letter-btn[data-az-letter]').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const targetId = btn.getAttribute('href');
                if (targetId && targetId.startsWith('#')) {
                    e.preventDefault();
                    const targetEl = document.querySelector(targetId);
                    if (targetEl && targetEl.style.display !== 'none') {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        // Interactive focal pulse on letter badge
                        const badge = targetEl.querySelector('.math-az-letter-badge');
                        if (badge) {
                            badge.style.transform = 'scale(1.15)';
                            badge.style.boxShadow = '0 0 16px var(--color-primary)';
                            setTimeout(() => {
                                badge.style.transform = '';
                                badge.style.boxShadow = '';
                            }, 450);
                        }
                    }
                }
            });
        });

        // Grade Pill Buttons
        gradePills.forEach((pill) => {
            pill.addEventListener('click', () => {
                gradePills.forEach(p => {
                    p.classList.remove('active');
                    p.setAttribute('aria-selected', 'false');
                });
                pill.classList.add('active');
                pill.setAttribute('aria-selected', 'true');
                activeGrade = pill.getAttribute('data-grade') || 'all';
                filterCards();
            });
        });

        // Branch Pill Buttons
        branchPills.forEach((pill) => {
            pill.addEventListener('click', () => {
                branchPills.forEach(p => {
                    p.classList.remove('active');
                    p.setAttribute('aria-selected', 'false');
                });
                pill.classList.add('active');
                pill.setAttribute('aria-selected', 'true');
                activeBranch = pill.getAttribute('data-branch') || 'all';
                filterCards();
            });
        });

        // Favorites Toggle Button
        if (favToggleBtn) {
            favToggleBtn.addEventListener('click', () => {
                showFavoritesOnly = !showFavoritesOnly;
                favToggleBtn.classList.toggle('active', showFavoritesOnly);
                favToggleBtn.setAttribute('aria-selected', showFavoritesOnly ? 'true' : 'false');
                filterCards();
                if (showFavoritesOnly) {
                    showToast(`Showing ${favorites.size} saved concept(s) in your Study List`);
                }
            });
        }

        // Reset Filters Button in Empty State
        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', () => {
                activeGrade = 'all';
                activeBranch = 'all';
                showFavoritesOnly = false;
                searchQuery = '';
                if (searchInput) searchInput.value = '';
                if (clearSearchBtn) clearSearchBtn.style.display = 'none';

                gradePills.forEach(p => p.classList.toggle('active', p.getAttribute('data-grade') === 'all'));
                branchPills.forEach(p => p.classList.toggle('active', p.getAttribute('data-branch') === 'all'));
                if (favToggleBtn) favToggleBtn.classList.remove('active');

                filterCards();
                showToast('All filters cleared');
            });
        }

        // Delegated Card Actions (Audio Pronounce, Copy Formula, Star Favorite)
        if (cardsGrid) {
            cardsGrid.addEventListener('click', (e) => {
                const target = e.target.closest('button');
                if (!target) return;

                // Favorite Toggle
                if (target.classList.contains('math-btn-fav')) {
                    const card = target.closest('.math-term-card');
                    if (card) {
                        const cardId = card.getAttribute('data-term-id');
                        toggleFavorite(cardId, target);
                    }
                }

                // Audio Pronounce
                if (target.classList.contains('math-btn-speak')) {
                    const card = target.closest('.math-term-card');
                    if (card) {
                        const title = card.querySelector('.math-term-title')?.childNodes[0]?.textContent?.trim() || '';
                        const def = card.querySelector('.math-idx-def-text')?.innerText?.replace(/\s+/g, ' ')?.trim() || '';
                        speakTerm(title, def);
                    }
                }

                // Copy Formula
                if (target.classList.contains('math-btn-copy')) {
                    const formula = target.getAttribute('data-formula') || '';
                    copyFormula(formula);
                }
            });
        }

        // Export Button
        if (exportBtn) {
            exportBtn.addEventListener('click', exportStudySheet);
        }

        // Print Button
        if (printBtn) {
            printBtn.addEventListener('click', () => {
                window.print();
            });
        }

        // Initialize Formula Sandbox & Solver
        initFormulaSandbox();
    });

    // =========================================================================
    // Interactive Formula Sandbox & Step-by-Step Solver
    // =========================================================================
    function initFormulaSandbox() {
        const formulaSelect = document.getElementById('sandbox-formula-select');
        const inputsContainer = document.getElementById('sandbox-inputs-container');
        const solveBtn = document.getElementById('sandbox-solve-btn');
        const randomBtn = document.getElementById('sandbox-random-btn');
        const toggleBtn = document.getElementById('sandbox-toggle-btn');
        const toggleLabel = document.getElementById('sandbox-toggle-label');
        const sandboxBody = document.getElementById('sandbox-body');
        const resultContent = document.getElementById('sandbox-result-content');

        if (!formulaSelect || !inputsContainer || !solveBtn) return;

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
                    <label for="${f.id}" style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 0.25rem;">${f.label}:</label>
                    <input type="${f.type}" id="${f.id}" value="${f.default}" step="${f.step || 'any'}" style="width: 100%; height: 38px; border-radius: var(--radius-md); padding: 0.35rem 0.65rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border);">
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
                    <strong style="font-size: 0.95rem; color: var(--color-text-main);"><i class="fas fa-check-circle" style="color: var(--color-primary); margin-right: 0.35rem;"></i>${result.title}</strong>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-primary); background: color-mix(in srgb, var(--color-primary) 12%, transparent); padding: 0.2rem 0.5rem; border-radius: 9999px;">Step-by-Step Proof</span>
                </div>
                <div class="math-sandbox-latex" style="overflow-x: auto; margin: 0.5rem 0; font-size: 1rem;">
                    $$${result.latex}$$
                </div>
                <p style="font-size: 0.85rem; color: var(--color-text-muted); margin: 0.5rem 0 0 0; line-height: 1.5;">${result.summary}</p>
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
            if (window.HLSound && typeof window.HLSound.playCorrect === 'function') {
                window.HLSound.playCorrect();
            }
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
                if (window.HLSound && typeof window.HLSound.playClick === 'function') {
                    window.HLSound.playClick();
                }
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

    // Expose helpers globally if needed
    window.mathIndexController = {
        filterCards,
        exportStudySheet,
        speakTerm,
        copyFormula
    };
})();
