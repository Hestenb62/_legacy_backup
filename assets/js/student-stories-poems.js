/**
 * Hesten's Learning - Student Short Stories & Poems Interactive Showcase & AI Daily Generator
 * Fully accessible (WCAG 2.1/2.2 AA & AAA, Section 508, UDL).
 * Features:
 * - Comprehensive Grades K-12 curriculum coverage with grade picker
 * - Automatic Daily Spotlight (Story of the Day & Poem of the Day, rotating daily)
 * - AI Story & Poem Generator Studio for on-demand & daily generation across all 13 grade levels
 * - Accessible reader modal with Dyslexia font toggle, font scaler, Irlen reading tints
 * - Web Speech API Text-to-Speech (TTS) read-aloud
 * - Pure pedagogical comprehension checks (XP mechanics removed)
 * - Offline-first PWA resiliency
 */

(function() {
    'use strict';

    let baseWorksData = [];
    let allWorks = [];
    let currentCategory = 'all';
    let currentGradeFilter = 'all';
    let searchQuery = '';
    let activeWork = null;
    let isSpeaking = false;
    let speechUtterance = null;
    let currentFontSize = 100;

    let currentTint = 'none';
    let isDyslexicFont = false;

    // DOM References
    let gridEl, searchInputEl, clearSearchEl, filterTabsEl, gradeSelectEl, modalEl, spotlightEl;

    // Helper: Get today's ISO date string YYYY-MM-DD
    function getTodayString() {
        const d = new Date();
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Helper: Simple deterministic hash from date string
    function getDateSeed(dateStr) {
        let hash = 0;
        for (let i = 0; i < dateStr.length; i++) {
            hash = (hash << 5) - hash + dateStr.charCodeAt(i);
            hash |= 0;
        }
        return Math.abs(hash);
    }

    // Initialization
    function init() {
        gridEl = document.getElementById('story-poem-grid');
        searchInputEl = document.getElementById('story-poem-search');
        clearSearchEl = document.getElementById('story-poem-clear-search');
        filterTabsEl = document.querySelectorAll('.story-poem-filter-tab');
        gradeSelectEl = document.getElementById('story-poem-grade-select');
        modalEl = document.getElementById('story-poem-modal');
        spotlightEl = document.getElementById('story-poem-spotlight');

        if (!gridEl) return;

        // Fetch dataset
        fetch('/assets/data/student-stories-poems.json')
            .then(res => {
                if (!res.ok) throw new Error('Network error');
                return res.json();
            })
            .then(data => {
                baseWorksData = Array.isArray(data) ? data : [];
                loadWorks();
            })
            .catch(() => {
                baseWorksData = [];
                loadWorks();
            });

        // Setup filter tabs
        filterTabsEl.forEach(tab => {
            tab.addEventListener('click', () => {
                filterTabsEl.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                currentCategory = tab.getAttribute('data-filter') || 'all';
                renderCards();
            });
        });

        // Setup grade dropdown
        if (gradeSelectEl) {
            gradeSelectEl.addEventListener('change', (e) => {
                currentGradeFilter = e.target.value;
                renderCards();
            });
        }

        // Setup search
        if (searchInputEl) {
            searchInputEl.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase().trim();
                if (clearSearchEl) {
                    clearSearchEl.style.display = searchQuery.length > 0 ? 'inline-flex' : 'none';
                }
                renderCards();
            });
        }

        if (clearSearchEl) {
            clearSearchEl.addEventListener('click', () => {
                if (searchInputEl) searchInputEl.value = '';
                searchQuery = '';
                clearSearchEl.style.display = 'none';
                renderCards();
                if (searchInputEl) searchInputEl.focus();
            });
        }

        // Global Esc key listener for modal
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (modalEl && modalEl.getAttribute('aria-hidden') === 'false') {
                    closeStoryModal();
                }
            }
        });
    }

    // Load curriculum short stories (poems and AI studio removed)
    function loadWorks() {
        allWorks = baseWorksData.filter(item => item.type === 'story');
        const todayStr = getTodayString();
        renderDailySpotlight(todayStr);
        renderCards();
    }

    // Render Daily Spotlight Banner (Featured Story of the Day)
    function renderDailySpotlight(todayStr) {
        if (!spotlightEl) return;

        const seed = getDateSeed(todayStr);
        const stories = allWorks.filter(w => w.type === 'story');

        if (stories.length === 0) return;

        const dailyStory = stories[seed % stories.length];

        const dateObj = new Date();
        const formattedDate = dateObj.toLocaleDateString(undefined, { weekday: 'long', month: 'short', day: 'numeric', year: 'numeric' });

        spotlightEl.innerHTML = `
            <div class="daily-spotlight-card">
                <div class="spotlight-header">
                    <div class="spotlight-badge-wrap">
                        <span class="spotlight-badge"><i class="fas fa-calendar-star"></i> Featured Literature</span>
                        <span class="spotlight-date"><i class="far fa-clock"></i> ${formattedDate}</span>
                    </div>
                </div>

                <div class="spotlight-items-grid">
                    <!-- Daily Story -->
                    <div class="spotlight-item story-spotlight">
                        <div class="spotlight-item-tag"><i class="fas fa-book-open"></i> Story of the Day</div>
                        <h3 class="spotlight-item-title">${escapeHtml(dailyStory.title)}</h3>
                        <p class="spotlight-item-meta"><i class="fas fa-feather"></i> ${escapeHtml(dailyStory.author)} &bull; <span class="badge-grade">${escapeHtml(dailyStory.gradeLabel)}</span> &bull; <span>${escapeHtml(dailyStory.readTime)}</span></p>
                        <p class="spotlight-item-desc">${escapeHtml(dailyStory.summary)}</p>
                        <button type="button" class="spotlight-action-btn" onclick="window.openStoryModal('${dailyStory.id}')">
                            <span>Read Story of the Day</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    // Render Cards Grid
    function renderCards() {
        if (!gridEl) return;

        const filtered = allWorks.filter(item => {
            // Grade Band Filter
            if (currentCategory === 'k-2' && item.gradeBand !== 'k-2') return false;
            if (currentCategory === '3-5' && item.gradeBand !== '3-5') return false;
            if (currentCategory === '6-8' && item.gradeBand !== '6-8') return false;
            if (currentCategory === '9-12' && item.gradeBand !== '9-12') return false;

            // Specific Grade Dropdown Filter (K, 1, 2, ..., 12)
            if (currentGradeFilter !== 'all') {
                if (item.grade !== currentGradeFilter) return false;
            }

            // Keyword Search Filter
            if (searchQuery) {
                const searchCorpus = [
                    item.title,
                    item.author,
                    item.genre,
                    item.gradeLabel,
                    item.summary,
                    ...(item.tags || [])
                ].join(' ').toLowerCase();

                if (!searchCorpus.includes(searchQuery)) return false;
            }

            return true;
        });

        if (filtered.length === 0) {
            gridEl.innerHTML = `
                <div class="story-empty-state" style="grid-column: 1 / -1; text-align: center; padding: 3rem 1.5rem; background: var(--color-bg-surface); border: 1px dashed var(--color-border); border-radius: var(--radius-xl);">
                    <i class="fas fa-book-open" style="font-size: 2.5rem; color: var(--color-text-muted); margin-bottom: 1rem; opacity: 0.5;"></i>
                    <h3 style="margin: 0 0 0.5rem 0; font-size: 1.15rem; font-weight: 800; color: var(--color-text-main);">No matching short stories found</h3>
                    <p style="margin: 0 0 1rem 0; font-size: 0.9rem; color: var(--color-text-muted);">Try selecting another grade or resetting the search filters.</p>
                    <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
                        <button type="button" class="btn" onclick="window.resetStoryFilter()" style="padding: 0.5rem 1.25rem; border-radius: var(--radius-full); background: var(--color-primary); color: white; border: none; font-weight: 700; cursor: pointer;">
                            Reset Filters
                        </button>
                    </div>
                </div>
            `;
            return;
        }

        gridEl.innerHTML = filtered.map(item => {
            const tagsHtml = (item.tags || []).slice(0, 3).map(tag => 
                `<span class="story-card-tag">${escapeHtml(tag)}</span>`
            ).join('');

            return `
                <article class="story-card" data-id="${item.id}" data-type="${item.type}">
                    <div class="story-card-header">
                        <div class="story-card-badges">
                            <span class="story-type-badge" style="background: rgba(5, 150, 105, 0.12); color: #059669; border: 1px solid rgba(5, 150, 105, 0.25);">
                                <i class="fas fa-book-open"></i> Short Story
                            </span>
                            <span class="story-grade-badge">
                                <i class="fas fa-graduation-cap"></i> ${escapeHtml(item.gradeLabel)}
                            </span>
                        </div>
                        <span class="story-time-badge" title="Estimated reading time">
                            <i class="far fa-clock"></i> ${escapeHtml(item.readTime)}
                        </span>
                    </div>

                    <div class="story-card-body">
                        <h3 class="story-card-title">${escapeHtml(item.title)}</h3>
                        <p class="story-card-author"><i class="fas fa-pen-fancy"></i> by ${escapeHtml(item.author)}</p>
                        <p class="story-card-summary">${escapeHtml(item.summary)}</p>
                    </div>

                    <div class="story-card-tags">
                        ${tagsHtml}
                    </div>

                    <div class="story-card-footer">
                        <button type="button" class="story-read-btn" onclick="window.openStoryModal('${item.id}')" aria-label="Read and analyze ${escapeHtml(item.title)}">
                            <span>Read &amp; Analyze</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </article>
            `;
        }).join('');
    }

    // Modal open handler
    window.openStoryModal = function(id) {
        activeWork = allWorks.find(w => w.id === id);
        if (!activeWork) return;

        modalEl = document.getElementById('story-poem-modal');
        if (!modalEl) return;

        stopSpeech();
        currentFontSize = 100;

        const isPoem = activeWork.type === 'poem';
        const typeBadge = document.getElementById('modal-work-type-badge');
        const titleEl = document.getElementById('modal-work-title');
        const authorEl = document.getElementById('modal-work-author');
        const gradeEl = document.getElementById('modal-work-grade');
        const lexileEl = document.getElementById('modal-work-lexile');
        const genreEl = document.getElementById('modal-work-genre');

        if (typeBadge) {
            typeBadge.innerHTML = isPoem ? '<i class="fas fa-feather-alt"></i> Poem' : '<i class="fas fa-book-open"></i> Short Story';
            typeBadge.style.background = isPoem ? 'rgba(139, 92, 246, 0.15)' : 'rgba(5, 150, 105, 0.15)';
            typeBadge.style.color = isPoem ? '#8b5cf6' : '#059669';
        }
        if (titleEl) titleEl.textContent = activeWork.title;
        if (authorEl) authorEl.textContent = `by ${activeWork.author}`;
        if (gradeEl) gradeEl.textContent = activeWork.gradeLabel;
        if (lexileEl) lexileEl.textContent = activeWork.lexile || 'Curriculum Standard';
        if (genreEl) genreEl.textContent = activeWork.genre || 'Literature';

        // Reader text
        const textContainer = document.getElementById('modal-reader-text');
        if (textContainer) {
            textContainer.innerHTML = activeWork.fullText;
            textContainer.className = `modal-reader-text ${isPoem ? 'poem-layout' : 'prose-layout'}`;
            applyReaderStyles();
        }

        // Literary Analysis
        const themeEl = document.getElementById('modal-analysis-theme');
        const devicesListEl = document.getElementById('modal-analysis-devices');
        const vocabListEl = document.getElementById('modal-analysis-vocab');

        if (themeEl && activeWork.literaryElements) {
            themeEl.textContent = activeWork.literaryElements.theme || 'Thematic reflection.';
        }
        if (devicesListEl && activeWork.literaryElements) {
            devicesListEl.innerHTML = (activeWork.literaryElements.devices || []).map(d => `<li>${escapeHtml(d)}</li>`).join('');
        }
        if (vocabListEl && activeWork.literaryElements) {
            vocabListEl.innerHTML = (activeWork.literaryElements.vocabulary || []).map(v => `<li>${escapeHtml(v)}</li>`).join('');
        }

        // Quiz (No XP mechanics)
        renderModalQuiz();

        // Switch to Read tab
        switchModalTab('read');

        modalEl.style.display = 'flex';
        modalEl.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        const closeBtn = document.getElementById('modal-story-close-btn');
        if (closeBtn) closeBtn.focus();
    };

    window.closeStoryModal = function() {
        if (!modalEl) modalEl = document.getElementById('story-poem-modal');
        if (modalEl) {
            stopSpeech();
            modalEl.style.display = 'none';
            modalEl.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    };

    window.switchModalTab = function(tabName) {
        const tabs = document.querySelectorAll('.modal-tab-btn');
        const panels = document.querySelectorAll('.modal-tab-panel');

        tabs.forEach(tab => {
            const isMatch = tab.getAttribute('data-tab') === tabName;
            tab.classList.toggle('active', isMatch);
            tab.setAttribute('aria-selected', isMatch ? 'true' : 'false');
        });

        panels.forEach(panel => {
            const isMatch = panel.getAttribute('id') === `modal-panel-${tabName}`;
            panel.style.display = isMatch ? 'block' : 'none';
        });
    };

    // Text-to-Speech
    window.toggleStoryTTS = function() {
        if (!('speechSynthesis' in window)) {
            alert('Speech synthesis is not supported in this browser.');
            return;
        }

        if (isSpeaking) {
            stopSpeech();
            return;
        }

        if (!activeWork) return;

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = activeWork.fullText;
        const textContent = `${activeWork.title}. By ${activeWork.author}. ${tempDiv.textContent || tempDiv.innerText || ''}`;

        window.speechSynthesis.cancel();
        speechUtterance = new SpeechSynthesisUtterance(textContent);
        speechUtterance.rate = 0.92;

        const btn = document.getElementById('btn-tts-listen');
        const label = document.getElementById('lbl-tts-listen');

        speechUtterance.onstart = function() {
            isSpeaking = true;
            if (btn) btn.classList.add('speaking');
            if (label) label.textContent = 'Pause Reading';
        };

        speechUtterance.onend = function() {
            stopSpeech();
        };

        speechUtterance.onerror = function() {
            stopSpeech();
        };

        window.speechSynthesis.speak(speechUtterance);
    };

    function stopSpeech() {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
        isSpeaking = false;
        const btn = document.getElementById('btn-tts-listen');
        const label = document.getElementById('lbl-tts-listen');
        if (btn) btn.classList.remove('speaking');
        if (label) label.textContent = 'Listen Aloud';
    }

    // Font & Style Controls
    window.adjustFontSize = function(delta) {
        currentFontSize = Math.max(80, Math.min(160, currentFontSize + delta));
        applyReaderStyles();
    };

    window.toggleDyslexicFont = function() {
        isDyslexicFont = !isDyslexicFont;
        const btn = document.getElementById('btn-dyslexia-toggle');
        if (btn) {
            btn.classList.toggle('active', isDyslexicFont);
            btn.setAttribute('aria-pressed', isDyslexicFont ? 'true' : 'false');
        }
        applyReaderStyles();
    };

    window.setReadingTint = function(tintColor) {
        currentTint = tintColor;
        applyReaderStyles();
    };

    function applyReaderStyles() {
        const textContainer = document.getElementById('modal-reader-text');
        if (!textContainer) return;

        textContainer.style.fontSize = `${currentFontSize}%`;
        textContainer.classList.toggle('opendyslexic-font', isDyslexicFont);

        const tintMap = {
            'none': '',
            'peach': '#fff8f0',
            'mint': '#f0fbf4',
            'rose': '#fff0f3',
            'blue': '#f0f7ff'
        };
        textContainer.style.backgroundColor = tintMap[currentTint] || '';
    }

    // Quiz Rendering (Purely Pedagogical - No XP)
    function renderModalQuiz() {
        const container = document.getElementById('modal-quiz-container');
        if (!container || !activeWork || !activeWork.quiz) return;

        container.innerHTML = activeWork.quiz.map((q, qIndex) => `
            <div class="story-quiz-card" data-qindex="${qIndex}" style="margin-bottom: 1.5rem; padding: 1.25rem; border-radius: var(--radius-xl); border: 1px solid var(--color-border); background: var(--color-bg-surface);">
                <h4 style="margin: 0 0 0.85rem 0; font-size: 1rem; font-weight: 800; color: var(--color-text-main); display: flex; align-items: center; gap: 0.5rem;">
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 1.6rem; height: 1.6rem; border-radius: 50%; background: var(--color-primary); color: white; font-size: 0.8rem;">${qIndex + 1}</span>
                    <span>${escapeHtml(q.question)}</span>
                </h4>
                <div class="quiz-options-group" style="display: flex; flex-direction: column; gap: 0.5rem;">
                    ${q.options.map((opt, optIndex) => `
                        <button type="button" class="quiz-opt-btn" onclick="window.checkStoryQuizAnswer(${qIndex}, ${optIndex})" style="text-align: left; padding: 0.75rem 1rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 600; font-size: 0.875rem; cursor: pointer; transition: all 0.2s ease;">
                            <span style="font-weight: 800; margin-right: 0.4rem; color: var(--color-primary);">${String.fromCharCode(65 + optIndex)}.</span>
                            <span>${escapeHtml(opt)}</span>
                        </button>
                    `).join('')}
                </div>
                <div id="quiz-feedback-${qIndex}" class="quiz-feedback-banner" style="display: none; margin-top: 0.85rem; padding: 0.75rem 1rem; border-radius: var(--radius-md); font-size: 0.875rem; font-weight: 700;"></div>
            </div>
        `).join('') + `
            <div id="quiz-completion-banner" style="display: none; text-align: center; padding: 1.25rem; border-radius: var(--radius-xl); background: color-mix(in srgb, var(--color-success, #10b981) 15%, var(--color-bg-surface)); border: 1px solid var(--color-success, #10b981);">
                <i class="fas fa-check-circle" style="font-size: 2rem; color: #10b981; margin-bottom: 0.5rem;"></i>
                <h4 style="margin: 0 0 0.25rem 0; font-size: 1.15rem; font-weight: 900; color: var(--color-text-main);">Reading Check Complete!</h4>
                <p style="margin: 0; font-size: 0.875rem; color: var(--color-text-muted);">Great job reviewing key literary themes and comprehension points.</p>
            </div>
        `;
    }

    window.checkStoryQuizAnswer = function(qIndex, optIndex) {
        if (!activeWork || !activeWork.quiz || !activeWork.quiz[qIndex]) return;

        const q = activeWork.quiz[qIndex];
        const card = document.querySelector(`.story-quiz-card[data-qindex="${qIndex}"]`);
        const feedbackEl = document.getElementById(`quiz-feedback-${qIndex}`);
        if (!card || !feedbackEl) return;

        const buttons = card.querySelectorAll('.quiz-opt-btn');
        buttons.forEach((btn, idx) => {
            btn.disabled = true;
            if (idx === q.answerIndex) {
                btn.style.background = 'rgba(16, 185, 129, 0.15)';
                btn.style.borderColor = '#10b981';
                btn.style.color = '#065f46';
            } else if (idx === optIndex && optIndex !== q.answerIndex) {
                btn.style.background = 'rgba(239, 68, 68, 0.15)';
                btn.style.borderColor = '#ef4444';
                btn.style.color = '#991b1b';
            }
        });

        const isCorrect = optIndex === q.answerIndex;
        feedbackEl.style.display = 'block';
        if (isCorrect) {
            feedbackEl.style.background = 'rgba(16, 185, 129, 0.12)';
            feedbackEl.style.color = '#065f46';
            feedbackEl.innerHTML = `<i class="fas fa-check-circle"></i> Correct! ${escapeHtml(q.explanation)}`;
            card.setAttribute('data-passed', 'true');
        } else {
            feedbackEl.style.background = 'rgba(239, 68, 68, 0.12)';
            feedbackEl.style.color = '#991b1b';
            feedbackEl.innerHTML = `<i class="fas fa-times-circle"></i> Insight: ${escapeHtml(q.explanation)}`;
            card.setAttribute('data-passed', 'false');
        }

        const allCards = document.querySelectorAll('.story-quiz-card');
        const allAnswered = Array.from(allCards).every(c => c.getAttribute('data-passed') !== null);

        if (allAnswered) {
            const completionBanner = document.getElementById('quiz-completion-banner');
            if (completionBanner) completionBanner.style.display = 'block';
        }
    };


    // Universal Bookmarks & Notes
    window.bookmarkActiveWork = function() {
        if (!activeWork) return;

        try {
            let bookmarks = JSON.parse(localStorage.getItem('library-bookmarks')) || [];
            const bookmarkId = `work-${activeWork.id}`;

            if (!bookmarks.includes(bookmarkId)) {
                bookmarks.push(bookmarkId);
                localStorage.setItem('library-bookmarks', JSON.stringify(bookmarks));
                alert(`"${activeWork.title}" saved to your reading bookmarks!`);
            } else {
                alert(`"${activeWork.title}" is already bookmarked.`);
            }

            window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'library-bookmarks', value: bookmarks } }));
        } catch(e) {}
    };

    window.exportWorkToScratchpad = function() {
        if (!activeWork) return;

        try {
            const currentNotes = localStorage.getItem('scratchpad_notes') || '';
            const theme = activeWork.literaryElements ? activeWork.literaryElements.theme : '';
            const newEntry = `\n\n--- [Reading Notes: ${activeWork.title} by ${activeWork.author}] ---\nGrade: ${activeWork.gradeLabel} (${activeWork.type === 'poem' ? 'Poem' : 'Short Story'})\nTheme: ${theme}\nDate: ${new Date().toLocaleDateString()}\n`;

            localStorage.setItem('scratchpad_notes', currentNotes + newEntry);

            if (window.HLScratchpad && window.HLScratchpad.refresh) {
                window.HLScratchpad.refresh();
            }

            alert(`Notes outline for "${activeWork.title}" exported to your Scratchpad!`);
        } catch(e) {}
    };

    window.resetStoryFilter = function() {
        currentCategory = 'all';
        currentGradeFilter = 'all';
        searchQuery = '';
        if (searchInputEl) searchInputEl.value = '';
        if (clearSearchEl) clearSearchEl.style.display = 'none';
        if (gradeSelectEl) gradeSelectEl.value = 'all';

        if (filterTabsEl) {
            filterTabsEl.forEach(t => {
                const isAll = t.getAttribute('data-filter') === 'all';
                t.classList.toggle('active', isAll);
                t.setAttribute('aria-selected', isAll ? 'true' : 'false');
            });
        }
        renderCards();
    };

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
