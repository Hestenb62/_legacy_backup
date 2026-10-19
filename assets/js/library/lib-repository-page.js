/**
 * assets/js/library/lib-repository-page.js
 * Interactive controller for Library Subject Repositories (Punctuation & Syntactic Guides)
 * Features:
 * - Live fuzzy filtering by category & keyword search
 * - Deep-link hash routing (#comma, #semicolon, #quiz, etc.) with auto-scroll and highlight
 * - Interactive Diagnostic Quiz with immediate feedback & score tracker
 * - Copy glyph & copy citation generators
 * - Web Speech synthesis read-aloud support
 * - Accessible keyboard navigation (WCAG 2.1/2.2 AA & AAA)
 */

(function () {
    'use strict';

    let activeCategory = 'all';
    let quizScore = 0;
    let answeredQuestions = new Set();
    let repoUtterance = null;

    document.addEventListener('DOMContentLoaded', () => {
        initCategoryFilter();
        initSearchFilter();
        initQuizEngine();
        initCopyGlyphButtons();
        initDeepHashNavigation();
        initTextToSpeech();
    });

    // 1. Category Tab Filtering
    function initCategoryFilter() {
        const tabs = document.querySelectorAll('.repo-cat-tab');
        const cards = document.querySelectorAll('.repo-mark-card');
        const countBadge = document.getElementById('repo-visible-marks-count');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');

                activeCategory = tab.dataset.category || 'all';
                applyFilters();
            });
        });
    }

    // 2. Search Keyword Filtering
    function initSearchFilter() {
        const input = document.getElementById('repo-search-input');
        const clearBtn = document.getElementById('repo-search-clear');

        if (!input) return;

        input.addEventListener('input', () => {
            if (clearBtn) {
                clearBtn.classList.toggle('visible', input.value.trim().length > 0);
            }
            applyFilters();
        });

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                input.value = '';
                clearBtn.classList.remove('visible');
                input.focus();
                applyFilters();
            });
        }
    }

    function applyFilters() {
        const input = document.getElementById('repo-search-input');
        const query = input ? input.value.trim().toLowerCase() : '';
        const cards = document.querySelectorAll('.repo-mark-card');
        const countBadge = document.getElementById('repo-visible-marks-count');
        const noResults = document.getElementById('repo-no-marks-found');

        let visibleCount = 0;

        cards.forEach(card => {
            const cardCat = card.dataset.category || '';
            const cardText = (card.textContent || '').toLowerCase();

            const matchesCategory = (activeCategory === 'all' || activeCategory === cardCat);
            const matchesQuery = (query === '' || cardText.includes(query));

            if (matchesCategory && matchesQuery) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countBadge) {
            countBadge.textContent = visibleCount;
        }

        if (noResults) {
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    }

    // 3. Deep-Link Hash Navigation & Auto-Highlight
    function initDeepHashNavigation() {
        const checkHash = () => {
            const rawHash = (window.location.hash || '').replace(/^#/, '').trim();
            if (!rawHash) return;

            const targetEl = document.getElementById(rawHash);
            if (targetEl) {
                // If it's a mark card, ensure it is visible by resetting filters if needed
                if (targetEl.classList.contains('repo-mark-card')) {
                    const cardCat = targetEl.dataset.category;
                    if (activeCategory !== 'all' && activeCategory !== cardCat) {
                        const allTab = document.querySelector('.repo-cat-tab[data-category="all"]');
                        if (allTab) allTab.click();
                    }
                }

                setTimeout(() => {
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    targetEl.classList.add('highlighted');
                    setTimeout(() => targetEl.classList.remove('highlighted'), 3000);
                }, 100);
            }
        };

        window.addEventListener('hashchange', checkHash);
        setTimeout(checkHash, 150);
    }

    // 4. Interactive Mastery Quiz Engine
    function initQuizEngine() {
        const quizItems = document.querySelectorAll('.repo-quiz-item');
        const totalCount = quizItems.length;
        const scoreEl = document.getElementById('repo-quiz-score-val');
        const totalEl = document.getElementById('repo-quiz-total-val');

        if (totalEl) totalEl.textContent = totalCount;

        quizItems.forEach(item => {
            const qId = item.dataset.qid;
            const correctIndex = parseInt(item.dataset.correctIndex, 10);
            const buttons = item.querySelectorAll('.repo-quiz-choice-btn');
            const feedbackEl = item.querySelector('.repo-quiz-feedback');

            buttons.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    if (answeredQuestions.has(qId)) return;
                    answeredQuestions.add(qId);

                    buttons.forEach(b => b.disabled = true);

                    if (index === correctIndex) {
                        btn.classList.add('selected-correct');
                        btn.innerHTML += ' <i class="fas fa-check-circle" style="color: #10b981; margin-left: auto;"></i>';
                        quizScore++;
                        if (feedbackEl) {
                            feedbackEl.classList.add('show', 'correct');
                            feedbackEl.innerHTML = `<strong><i class="fas fa-check-circle"></i> Outstanding! Correct.</strong> ${item.dataset.explanation || ''}`;
                        }
                    } else {
                        btn.classList.add('selected-incorrect');
                        btn.innerHTML += ' <i class="fas fa-times-circle" style="color: #ef4444; margin-left: auto;"></i>';
                        // Also show the correct choice
                        if (buttons[correctIndex]) {
                            buttons[correctIndex].classList.add('selected-correct');
                        }
                        if (feedbackEl) {
                            feedbackEl.classList.add('show', 'incorrect');
                            feedbackEl.innerHTML = `<strong><i class="fas fa-times-circle"></i> Not quite.</strong> ${item.dataset.explanation || ''}`;
                        }
                    }

                    if (scoreEl) scoreEl.textContent = quizScore;
                });
            });
        });
    }

    // 5. Copy Glyph to Clipboard with Feedback Toast
    function initCopyGlyphButtons() {
        document.querySelectorAll('.repo-copy-glyph-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const glyph = btn.dataset.glyph || '';
                if (!glyph) return;

                navigator.clipboard.writeText(glyph).then(() => {
                    const originalHtml = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check" style="color: #10b981;"></i> Copied!';
                    btn.setAttribute('aria-label', `Glyph ${glyph} copied to clipboard`);
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                    }, 2000);
                }).catch(() => {
                    btn.innerHTML = 'Press Ctrl+C';
                });
            });
        });
    }

    // 6. Text-to-Speech Accessibility Reader
    function initTextToSpeech() {
        if (!('speechSynthesis' in window)) return;

        document.querySelectorAll('.repo-speak-mark-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const card = btn.closest('.repo-mark-card');
                if (!card) return;

                if (window.speechSynthesis.speaking) {
                    window.speechSynthesis.cancel();
                    btn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
                    return;
                }

                const title = card.querySelector('.repo-mark-title-wrap h2')?.textContent || '';
                const role = card.querySelector('.repo-mark-role')?.textContent || '';
                const overview = card.querySelector('.repo-overview-text')?.textContent || '';

                const textToRead = `${title}. Role: ${role}. Overview: ${overview}`;

                repoUtterance = new SpeechSynthesisUtterance(textToRead);
                repoUtterance.rate = 1.0;

                repoUtterance.onstart = () => {
                    btn.innerHTML = '<i class="fas fa-stop"></i> Stop';
                };

                repoUtterance.onend = () => {
                    btn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
                };

                repoUtterance.onerror = () => {
                    btn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
                };

                window.speechSynthesis.speak(repoUtterance);
            });
        });
    }

    // 7. Global Actions: Copy Citation & Print Guide
    window.copyRepositoryCitation = function (style = 'mla') {
        const title = "Master Repository of English Punctuation & Syntactic Mechanics";
        const publisher = "Hesten's Learning Digital Library";
        const date = "Oct. 2026";
        const url = window.location.href.split('#')[0];

        let citation = '';
        if (style === 'apa') {
            citation = `Hesten's Learning. (2026). ${title}. ${publisher}. ${url}`;
        } else if (style === 'chicago') {
            citation = `Hesten's Learning. "${title}." ${publisher}, ${date}. ${url}.`;
        } else {
            // MLA
            citation = `"${title}." ${publisher}, Oct. 2026, ${url}. Accessed ${new Date().toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })}.`;
        }

        navigator.clipboard.writeText(citation).then(() => {
            alert(`Citation copied to clipboard (${style.toUpperCase()}):\n\n${citation}`);
        }).catch(() => {
            prompt("Copy citation:", citation);
        });
    };

    window.printRepositoryGuide = function () {
        window.print();
    };

})();
