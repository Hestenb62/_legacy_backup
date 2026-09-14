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
    });

    // Expose helpers globally if needed
    window.mathIndexController = {
        filterCards,
        exportStudySheet,
        speakTerm,
        copyFormula
    };
})();
