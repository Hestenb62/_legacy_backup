/**
 * library/read/reader.js - Unified Digital Reader Client Engine
 * Pure Vanilla ES6+: Typography & Themes, SpeechSynthesis (TTS) with Synchronized
 * Sentence Highlighting, Flashcard Flip Drill, Chapter Quizzes, Persistent Text
 * Highlighting & Notes, Table of Contents Slide Drawer, and Citations.
 */

(function () {
    'use strict';

    document.addEventListener("DOMContentLoaded", () => {
        const bookContent = document.getElementById("book-content");
        if (!bookContent) return;

        const meta = window.BOOK_METADATA || {};
        const bookId = meta.id || 'default';
        const currentChapter = meta.chapterNum || 1;
        const totalChapters = meta.totalChapters || 1;

        // --- Storage Keys ---
        const PREFS_KEY = 'hesten_reader_prefs';
        const PROGRESS_KEY = `hesten_progress_${bookId}_lastChapter`;
        const SCROLL_POS_KEY = `hesten_scroll_pos_${bookId}_chapter_${currentChapter}`;
        const COMPLETION_KEY = `hesten_completion_pct_${bookId}`;
        const HIGHLIGHTS_KEY = `hesten_highlights_${bookId}_chapter_${currentChapter}`;

        // Save last active chapter
        try {
            localStorage.setItem(PROGRESS_KEY, currentChapter);
        } catch (e) {}

        // --- 1. Typography & Theme Settings ---
        initTypographyAndTheme(PREFS_KEY);

        // --- 2. Scroll Progress & Resume Toast ---
        initScrollProgress(SCROLL_POS_KEY, COMPLETION_KEY, currentChapter, totalChapters);

        // --- 3. Text-to-Speech (TTS) Narration Engine ---
        initTextToSpeech(bookContent);

        // --- 4. Study Suite (Vocab, Flashcards, Quizzes, Highlights) ---
        initStudySuite(bookId, currentChapter, HIGHLIGHTS_KEY);

        // --- 5. Inline Highlighting & Annotation Floating Toolbar ---
        initHighlightToolbar(bookContent, HIGHLIGHTS_KEY);

        // --- 6. Table of Contents & Info Modals ---
        initModalsAndDrawers();

        // --- 7. Chapter Citation Generator ---
        initChapterCitationGenerator(meta);

        // --- 8. Realistic Single-Page Book Mode & Page-Flip Engine ---
        initSinglePageBookMode(meta, PREFS_KEY);
    });

    /* ==========================================================================
       1. Typography & Theme Engine
       ========================================================================== */
    function initTypographyAndTheme(prefsKey) {
        const bookContent = document.getElementById("book-content");
        const openSettingsBtn = document.getElementById("open-settings-btn");
        const settingsPanel = document.getElementById("settings-panel");

        let defaultPrefs = {
            font: "font-sans",
            size: "prose-lg",
            lh: "lh-wide",
            theme: "theme-light"
        };

        try {
            const saved = localStorage.getItem(prefsKey);
            if (saved) {
                defaultPrefs = Object.assign(defaultPrefs, JSON.parse(saved));
            }
        } catch (e) {}

        function applyPrefs(prefs) {
            if (!bookContent) return;

            // Reset fonts
            bookContent.classList.remove("font-sans", "font-serif", "font-dyslexic");
            bookContent.classList.add(prefs.font);

            // Reset sizes
            bookContent.classList.remove("prose-base", "prose-lg", "prose-2xl");
            bookContent.classList.add(prefs.size);

            // Reset line height
            bookContent.classList.remove("lh-normal", "lh-wide", "lh-extra");
            bookContent.classList.add(prefs.lh);

            // Reset theme
            document.body.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.body.classList.add(prefs.theme);
            const cleanTheme = prefs.theme.replace("theme-", "");
            document.documentElement.setAttribute("data-theme", cleanTheme);
            document.documentElement.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.documentElement.classList.add(prefs.theme);

            // Sync settings panel buttons
            document.querySelectorAll(".settings-font").forEach(b => b.classList.toggle("active", b.dataset.font === prefs.font));
            document.querySelectorAll(".settings-size").forEach(b => b.classList.toggle("active", b.dataset.size === prefs.size));
            document.querySelectorAll(".settings-lh").forEach(b => b.classList.toggle("active", b.dataset.lh === prefs.lh));
            document.querySelectorAll(".settings-theme").forEach(b => b.classList.toggle("active", b.dataset.theme === prefs.theme));

            try {
                localStorage.setItem(prefsKey, JSON.stringify(prefs));
            } catch (e) {}

            if (window.recalculateReaderPages) {
                setTimeout(window.recalculateReaderPages, 60);
            }
        }

        applyPrefs(defaultPrefs);

        // Toggle panel
        if (openSettingsBtn && settingsPanel) {
            openSettingsBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                settingsPanel.classList.toggle("hidden");
            });

            document.addEventListener("click", (e) => {
                if (!settingsPanel.contains(e.target) && e.target !== openSettingsBtn) {
                    settingsPanel.classList.add("hidden");
                }
            });
        }

        // Settings Buttons Click Handlers
        document.querySelectorAll(".settings-font").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.font = btn.dataset.font;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-size").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.size = btn.dataset.size;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-lh").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.lh = btn.dataset.lh;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-theme").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.theme = btn.dataset.theme;
                applyPrefs(defaultPrefs);
            });
        });
    }

    /* ==========================================================================
       2. Scroll Progress & Floating Resume Alert Banner
       ========================================================================== */
    function initScrollProgress(scrollPosKey, completionKey, currentChapter, totalChapters) {
        const progressBar = document.getElementById("progress-bar");

        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        const saveScrollPos = debounce((scrollTop, scrollPct) => {
            try {
                localStorage.setItem(scrollPosKey, scrollTop);
                const overallPct = Math.round(((currentChapter - 1) / totalChapters) * 100 + (scrollPct / totalChapters));
                localStorage.setItem(completionKey, overallPct);
            } catch (e) {}
        }, 150);

        window.addEventListener("scroll", () => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

            if (progressBar) {
                progressBar.style.width = `${Math.min(Math.max(scrollPct, 0), 100)}%`;
            }

            saveScrollPos(scrollTop, scrollPct);
        });

        // Prompt to resume reading if previous scroll position was saved
        setTimeout(() => {
            try {
                const savedPos = parseFloat(localStorage.getItem(scrollPosKey));
                if (savedPos > 200) {
                    const toast = document.getElementById("resume-toast");
                    const confirmBtn = document.getElementById("resume-toast-confirm");
                    const dismissBtn = document.getElementById("resume-toast-dismiss");

                    if (toast && confirmBtn && dismissBtn) {
                        toast.classList.remove("hidden");

                        confirmBtn.onclick = () => {
                            window.scrollTo({ top: savedPos, behavior: "smooth" });
                            toast.classList.add("hidden");
                        };

                        dismissBtn.onclick = () => {
                            toast.classList.add("hidden");
                        };
                    }
                }
            } catch (e) {}
        }, 500);
    }

    /* ==========================================================================
       3. Text-to-Speech (TTS) Engine with Synchronized Highlighting
       ========================================================================== */
    function initTextToSpeech(bookContent) {
        const speakBtn = document.getElementById("tts-speak-btn");
        const stopBtn = document.getElementById("tts-stop-btn");
        if (!('speechSynthesis' in window) || !speakBtn || !stopBtn) return;

        let sentences = [];
        let sentenceNodes = [];
        let currentIdx = 0;
        let isSpeaking = false;

        // Parse content into sentences
        function prepareSentences() {
            sentences = [];
            sentenceNodes = [];

            const paragraphs = bookContent.querySelectorAll("p, h2, h3, h4, li, blockquote");
            paragraphs.forEach(p => {
                const rawText = p.textContent.trim();
                if (rawText.length > 0) {
                    const parts = rawText.match(/[^.!?]+[.!?]+/g) || [rawText];
                    parts.forEach(part => {
                        const trimmed = part.trim();
                        if (trimmed.length > 0) {
                            sentences.push(trimmed);
                            sentenceNodes.push(p);
                        }
                    });
                }
            });
        }

        function speakCurrentSentence() {
            if (currentIdx >= sentences.length) {
                stopNarration();
                return;
            }

            // Remove previous sentence highlight
            document.querySelectorAll(".tts-active-sentence").forEach(el => el.classList.remove("tts-active-sentence"));

            const targetP = sentenceNodes[currentIdx];
            if (targetP) {
                targetP.classList.add("tts-active-sentence");
                if (document.body.classList.contains("mode-book")) {
                    const bookViewport = document.getElementById("book-page-viewport");
                    if (bookViewport) {
                        const viewportRect = bookViewport.getBoundingClientRect();
                        const targetRect = targetP.getBoundingClientRect();
                        const stride = bookViewport.clientWidth + 64;
                        const currentOffset = ((window.CURRENT_READER_PAGE || 1) - 1) * stride;
                        const absoluteX = (targetRect.left - viewportRect.left) + currentOffset;
                        const targetPage = Math.max(1, Math.min(window.TOTAL_READER_PAGES || 1, Math.floor(absoluteX / stride) + 1));
                        if (targetPage !== window.CURRENT_READER_PAGE && window.jumpToReaderPage) {
                            window.jumpToReaderPage(targetPage);
                        }
                    }
                } else {
                    targetP.scrollIntoView({ behavior: "smooth", block: "center" });
                }
            }

            const utterance = new SpeechSynthesisUtterance(sentences[currentIdx]);
            utterance.rate = 1.0;

            utterance.onend = () => {
                if (isSpeaking) {
                    currentIdx++;
                    speakCurrentSentence();
                }
            };

            utterance.onerror = () => {
                if (isSpeaking) {
                    currentIdx++;
                    speakCurrentSentence();
                }
            };

            window.speechSynthesis.speak(utterance);
        }

        function startNarration() {
            if (!isSpeaking) {
                window.speechSynthesis.cancel();
                prepareSentences();
                if (sentences.length === 0) return;

                isSpeaking = true;
                currentIdx = 0;
                speakBtn.classList.add("hidden");
                stopBtn.classList.remove("hidden");
                speakCurrentSentence();
            }
        }

        function stopNarration() {
            isSpeaking = false;
            window.speechSynthesis.cancel();
            document.querySelectorAll(".tts-active-sentence").forEach(el => el.classList.remove("tts-active-sentence"));
            speakBtn.classList.remove("hidden");
            stopBtn.classList.add("hidden");
        }

        speakBtn.addEventListener("click", startNarration);
        stopBtn.addEventListener("click", stopNarration);

        window.addEventListener("beforeunload", () => {
            window.speechSynthesis.cancel();
        });
    }

    /* ==========================================================================
       4. Study Suite (Vocab List, Flashcard Flip Drill, Chapter Quizzes)
       ========================================================================== */
    function initStudySuite(bookId, currentChapter, highlightsKey) {
        const vocabList = window.BOOK_JSON_VOCAB || [];
        const quizList = window.BOOK_QUIZ_QUESTIONS || [];

        // Tab Switchers
        const tabList = document.getElementById("tab-vocab-list");
        const tabFlash = document.getElementById("tab-vocab-flash");
        const tabQuiz = document.getElementById("tab-quiz");
        const tabHl = document.getElementById("tab-highlights");

        const contList = document.getElementById("vocab-list-container");
        const contFlash = document.getElementById("vocab-flash-container");
        const contQuiz = document.getElementById("quiz-container");
        const contHl = document.getElementById("vocab-highlights-container");

        function switchStudyTab(tab) {
            [tabList, tabFlash, tabQuiz, tabHl].forEach(t => t && t.classList.remove("active"));
            [contList, contFlash, contQuiz, contHl].forEach(c => c && c.classList.add("hidden"));

            if (tab === 'list') {
                if (tabList) tabList.classList.add("active");
                if (contList) contList.classList.remove("hidden");
            } else if (tab === 'flash') {
                if (tabFlash) tabFlash.classList.add("active");
                if (contFlash) contFlash.classList.remove("hidden");
            } else if (tab === 'quiz') {
                if (tabQuiz) tabQuiz.classList.add("active");
                if (contQuiz) contQuiz.classList.remove("hidden");
            } else if (tab === 'highlights') {
                if (tabHl) tabHl.classList.add("active");
                if (contHl) contHl.classList.remove("hidden");
                renderSavedHighlightsList(highlightsKey);
            }
        }

        if (tabList) tabList.addEventListener("click", () => switchStudyTab('list'));
        if (tabFlash) tabFlash.addEventListener("click", () => switchStudyTab('flash'));
        if (tabQuiz) tabQuiz.addEventListener("click", () => switchStudyTab('quiz'));
        if (tabHl) tabHl.addEventListener("click", () => switchStudyTab('highlights'));

        // Render Vocab List
        if (contList) {
            contList.innerHTML = '';
            if (vocabList.length > 0) {
                vocabList.forEach(item => {
                    const card = document.createElement("div");
                    card.className = "vocab-item-card";
                    card.style.padding = "1rem";
                    card.style.marginBottom = "1rem";
                    card.style.border = "1px solid var(--color-border)";
                    card.style.borderRadius = "0.75rem";
                    card.style.background = "var(--color-base-bg)";
                    card.innerHTML = `
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                            <h4 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: var(--color-primary);">${item.word || item.term}</h4>
                            <button type="button" class="spec-action-icon-btn" title="Pronounce Word" onclick="window.pronounceWord('${item.word || item.term}')"><i class="fas fa-volume-up"></i></button>
                        </div>
                        <p style="margin: 0; font-size: 0.95rem; color: var(--color-text-secondary); line-height: 1.5;">${item.def || item.definition}</p>
                    `;
                    contList.appendChild(card);
                });
            } else {
                contList.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No vocabulary terms indexed for this chapter.</p>`;
            }
        }

        // Render Flashcard Component
        let flashcardIdx = 0;
        const flashcardBox = document.getElementById("vocab-flashcard");
        const flashWord = document.getElementById("flashcard-front-word");
        const flashDef = document.getElementById("flashcard-back-definition");
        const flashCounter = document.getElementById("flashcard-counter");
        const prevFlashBtn = document.getElementById("flashcard-prev-btn");
        const nextFlashBtn = document.getElementById("flashcard-next-btn");

        function updateFlashcard() {
            if (!flashcardBox || vocabList.length === 0) return;
            flashcardBox.classList.remove("flipped");
            const item = vocabList[flashcardIdx];
            if (flashWord) flashWord.textContent = item.word || item.term || '';
            if (flashDef) flashDef.textContent = item.def || item.definition || '';
            if (flashCounter) flashCounter.textContent = `${flashcardIdx + 1} of ${vocabList.length}`;
        }

        if (flashcardBox) {
            flashcardBox.addEventListener("click", () => {
                flashcardBox.classList.toggle("flipped");
            });
        }

        if (prevFlashBtn) {
            prevFlashBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                if (flashcardIdx > 0) {
                    flashcardIdx--;
                    updateFlashcard();
                }
            });
        }

        if (nextFlashBtn) {
            nextFlashBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                if (flashcardIdx < vocabList.length - 1) {
                    flashcardIdx++;
                    updateFlashcard();
                }
            });
        }

        if (vocabList.length > 0) {
            updateFlashcard();
        }

        // Render Chapter Comprehension Quiz
        if (contQuiz) {
            renderChapterQuiz(contQuiz, quizList);
        }
    }

    window.pronounceWord = function (word) {
        if ('speechSynthesis' in window && word) {
            const u = new SpeechSynthesisUtterance(word);
            u.rate = 0.9;
            window.speechSynthesis.speak(u);
        }
    };

    function renderChapterQuiz(container, questions) {
        container.innerHTML = '';
        if (!questions || questions.length === 0) {
            container.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No comprehension quiz available for this chapter.</p>`;
            return;
        }

        let userAnswers = {};

        questions.forEach((q, qIdx) => {
            const card = document.createElement("div");
            card.className = "quiz-question-card";
            card.style.marginBottom = "2rem";
            card.style.padding = "1.5rem";
            card.style.background = "var(--color-base-bg)";
            card.style.border = "1px solid var(--color-border)";
            card.style.borderRadius = "1rem";

            let optionsHtml = '';
            (q.options || []).forEach((opt, optIdx) => {
                optionsHtml += `
                    <label style="display: flex; align-items: center; gap: 0.75rem; padding: 0.65rem 1rem; border-radius: 0.5rem; background: var(--color-content-bg); border: 1px solid var(--color-border); margin-bottom: 0.5rem; cursor: pointer;">
                        <input type="radio" name="quiz_q_${qIdx}" value="${optIdx}" onchange="window.selectQuizAnswer(${qIdx}, ${optIdx})">
                        <span style="font-size: 0.92rem; color: var(--color-text-default);">${opt}</span>
                    </label>
                `;
            });

            card.innerHTML = `
                <div style="font-size: 0.75rem; font-weight: 800; color: var(--color-primary); text-transform: uppercase; margin-bottom: 0.4rem;">Question ${qIdx + 1}</div>
                <h4 style="font-size: 1.05rem; font-weight: 800; margin: 0 0 1rem 0; color: var(--color-text-default);">${q.question}</h4>
                <div class="quiz-options-wrap">${optionsHtml}</div>
                <div id="quiz-feedback-${qIdx}" class="quiz-feedback hidden" style="margin-top: 0.75rem; font-size: 0.88rem; font-weight: 700;"></div>
            `;
            container.appendChild(card);
        });

        // Submit Button
        const submitWrap = document.createElement("div");
        submitWrap.style.textAlign = "center";
        submitWrap.style.marginTop = "1.5rem";
        submitWrap.innerHTML = `
            <button type="button" class="intro-start-btn" onclick="window.gradeQuiz()" style="font-size: 0.95rem; padding: 0.65rem 2rem;">
                Check Quiz Answers
            </button>
            <div id="quiz-total-score" style="margin-top: 1rem; font-weight: 900; font-size: 1.15rem;"></div>
        `;
        container.appendChild(submitWrap);

        window.selectedQuizAnswers = userAnswers;
        window.activeQuizData = questions;
    }

    window.selectQuizAnswer = function (qIdx, optIdx) {
        if (!window.selectedQuizAnswers) window.selectedQuizAnswers = {};
        window.selectedQuizAnswers[qIdx] = optIdx;
    };

    window.gradeQuiz = function () {
        const questions = window.activeQuizData || [];
        const answers = window.selectedQuizAnswers || {};
        let score = 0;

        questions.forEach((q, idx) => {
            const fb = document.getElementById(`quiz-feedback-${idx}`);
            const userChoice = answers[idx];
            const correctChoice = q.correctAnswer;

            if (fb) {
                fb.classList.remove("hidden");
                if (userChoice === correctChoice) {
                    score++;
                    fb.style.color = "#10b981";
                    fb.innerHTML = `<i class="fas fa-check-circle mr-1"></i> Correct! ${q.explanation || ''}`;
                } else {
                    fb.style.color = "#ef4444";
                    fb.innerHTML = `<i class="fas fa-times-circle mr-1"></i> Incorrect. ${q.explanation || ''}`;
                }
            }
        });

        const scoreEl = document.getElementById("quiz-total-score");
        if (scoreEl) {
            const pct = Math.round((score / questions.length) * 100);
            scoreEl.textContent = `Your Score: ${score} / ${questions.length} (${pct}%)`;
            scoreEl.style.color = pct >= 70 ? "#10b981" : "#ef4444";
        }
    };

    /* ==========================================================================
       5. Inline Text Highlighting & Annotations
       ========================================================================== */
    function initHighlightToolbar(bookContent, highlightsKey) {
        const toolbar = document.getElementById("highlight-toolbar");
        const hlYellow = document.getElementById("hl-color-yellow");
        const hlPink = document.getElementById("hl-color-pink");
        const hlGreen = document.getElementById("hl-color-green");
        const hlCopy = document.getElementById("hl-btn-copy");
        const hlNote = document.getElementById("hl-btn-note");

        if (!toolbar) return;

        // Prevent clicking inside toolbar from losing DOM text selection
        toolbar.addEventListener("mousedown", (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
        toolbar.addEventListener("touchstart", (e) => {
            e.stopPropagation();
        });

        let currentSelectedRange = null;

        function checkSelection() {
            const sel = window.getSelection();
            if (sel && sel.rangeCount > 0 && !sel.isCollapsed) {
                const text = sel.toString().trim();
                const range = sel.getRangeAt(0);

                if (text.length > 0 && (bookContent.contains(range.commonAncestorContainer) || bookContent.contains(sel.anchorNode))) {
                    currentSelectedRange = range.cloneRange();
                    const rect = range.getBoundingClientRect();

                    const top = Math.max(rect.top - 52, 12);
                    const left = Math.max(rect.left + (rect.width / 2) - 110, 16);

                    toolbar.style.top = `${top}px`;
                    toolbar.style.left = `${left}px`;
                    toolbar.style.display = "flex";
                    toolbar.classList.remove("hidden");
                    return;
                }
            }

            toolbar.classList.add("hidden");
            toolbar.style.display = "none";
            currentSelectedRange = null;
        }

        document.addEventListener("mouseup", (e) => {
            if (toolbar.contains(e.target)) return;
            setTimeout(checkSelection, 30);
        });

        document.addEventListener("keyup", (e) => {
            if (toolbar.contains(e.target)) return;
            setTimeout(checkSelection, 30);
        });

        function applyHighlight(colorClass) {
            if (!currentSelectedRange) return;
            const text = currentSelectedRange.toString();
            if (!text) return;

            const span = document.createElement("mark");
            span.className = colorClass;
            span.textContent = text;

            try {
                currentSelectedRange.deleteContents();
                currentSelectedRange.insertNode(span);
            } catch (e) {}

            window.getSelection().removeAllRanges();
            toolbar.classList.add("hidden");
            toolbar.style.display = "none";

            saveHighlight(text, colorClass, highlightsKey);
        }

        if (hlYellow) hlYellow.addEventListener("click", () => applyHighlight("hl-yellow"));
        if (hlPink) hlPink.addEventListener("click", () => applyHighlight("hl-pink"));
        if (hlGreen) hlGreen.addEventListener("click", () => applyHighlight("hl-green"));

        if (hlCopy) {
            hlCopy.addEventListener("click", () => {
                if (currentSelectedRange) {
                    navigator.clipboard.writeText(currentSelectedRange.toString());
                    toolbar.classList.add("hidden");
                    toolbar.style.display = "none";
                    window.getSelection().removeAllRanges();
                }
            });
        }

        if (hlNote) {
            hlNote.addEventListener("click", () => {
                if (currentSelectedRange) {
                    const note = prompt("Add a study note for this selection:");
                    if (note) {
                        applyHighlight("hl-yellow");
                        saveHighlight(currentSelectedRange.toString(), "hl-yellow", highlightsKey, note);
                    }
                }
            });
        }
    }

    function saveHighlight(text, color, key, note = '') {
        try {
            const list = JSON.parse(localStorage.getItem(key) || '[]');
            const currentPage = window.CURRENT_READER_PAGE || 1;
            list.push({ text: text, color: color, note: note, page: currentPage, date: new Date().toLocaleDateString() });
            localStorage.setItem(key, JSON.stringify(list));
        } catch (e) {}
    }

    function renderSavedHighlightsList(key) {
        const container = document.getElementById("vocab-highlights-container");
        if (!container) return;

        let list = [];
        try {
            list = JSON.parse(localStorage.getItem(key) || '[]');
        } catch (e) {}

        container.innerHTML = '';
        if (list.length > 0) {
            list.forEach((item, idx) => {
                const pageNum = item.page || 1;
                const card = document.createElement("div");
                card.style.padding = "1.25rem";
                card.style.marginBottom = "0.85rem";
                card.style.border = "1px solid var(--color-border)";
                card.style.borderRadius = "1rem";
                card.style.background = "var(--color-base-bg)";
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span class="highlight-page-badge"><i class="fas fa-bookmark"></i> Page ${pageNum}</span>
                        <span style="font-size: 0.75rem; color: var(--color-text-secondary);">Saved on ${item.date}</span>
                    </div>
                    <blockquote style="margin: 0 0 0.75rem 0; font-style: italic; border-left: 3px solid var(--color-primary); padding-left: 0.75rem; color: var(--color-text-default); line-height: 1.5;">${item.text}</blockquote>
                    ${item.note ? `<p style="margin: 0 0 0.75rem 0; font-size: 0.85rem; font-weight: 700; color: var(--color-primary);"><i class="fas fa-sticky-note mr-1"></i> Note: ${item.note}</p>` : ''}
                    <div style="display: flex; justify-content: flex-end;">
                        <button type="button" class="highlight-jump-btn" onclick="if(window.jumpToReaderPage) window.jumpToReaderPage(${pageNum}); if(window.closeVocabModal) window.closeVocabModal();">
                            <i class="fas fa-external-link-alt"></i> Jump to Page ${pageNum}
                        </button>
                    </div>
                `;
                container.appendChild(card);
            });
        } else {
            container.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No text highlights or notes saved for this chapter yet.</p>`;
        }
    }

    /* ==========================================================================
       6. Modals & Drawers (TOC, Vocab, License)
       ========================================================================== */
    function initModalsAndDrawers() {
        const tocModal = document.getElementById("toc-modal");
        const vocabModal = document.getElementById("vocab-modal");
        const licenseModal = document.getElementById("license-modal");
        const citeModal = document.getElementById("chapterCitationModal");
        const settingsPanel = document.getElementById("settings-panel");

        window.openTocModal = function () {
            if (tocModal) {
                tocModal.classList.remove("hidden");
                tocModal.style.display = "flex";
            }
        };

        window.closeTocModal = function () {
            if (tocModal) {
                tocModal.classList.add("hidden");
                tocModal.style.display = "none";
            }
        };

        window.openVocabModal = function () {
            if (vocabModal) {
                vocabModal.classList.remove("hidden");
                vocabModal.style.display = "flex";
            }
        };

        window.closeVocabModal = function () {
            if (vocabModal) {
                vocabModal.classList.add("hidden");
                vocabModal.style.display = "none";
            }
        };

        window.openLicenseModal = function () {
            if (licenseModal) {
                licenseModal.classList.remove("hidden");
                licenseModal.style.display = "flex";
            }
        };

        window.closeLicenseModal = function () {
            if (licenseModal) {
                licenseModal.classList.add("hidden");
                licenseModal.style.display = "none";
            }
        };

        window.openChapterCitationModal = function () {
            if (citeModal) {
                renderReaderCitation(window.BOOK_METADATA || {});
                citeModal.classList.remove("hidden");
                citeModal.style.display = "flex";
            }
        };

        window.closeChapterCitationModal = function () {
            if (citeModal) {
                citeModal.classList.add("hidden");
                citeModal.style.display = "none";
            }
        };

        // DOM Click bindings
        const openTocBtn = document.getElementById("open-toc-modal");
        const closeTocBtn = document.getElementById("close-toc-modal");
        if (openTocBtn) openTocBtn.addEventListener("click", window.openTocModal);
        if (closeTocBtn) closeTocBtn.addEventListener("click", window.closeTocModal);
        if (tocModal) {
            tocModal.addEventListener("click", (e) => {
                if (e.target === tocModal) window.closeTocModal();
            });
        }

        const openVocabBtn = document.getElementById("open-vocab-btn");
        const closeVocabBtn = document.getElementById("close-vocab-modal");
        if (openVocabBtn) openVocabBtn.addEventListener("click", window.openVocabModal);
        if (closeVocabBtn) closeVocabBtn.addEventListener("click", window.closeVocabModal);
        if (vocabModal) {
            vocabModal.addEventListener("click", (e) => {
                if (e.target === vocabModal) window.closeVocabModal();
            });
        }

        const closeLicenseBtn = document.getElementById("close-license-modal");
        if (closeLicenseBtn) closeLicenseBtn.addEventListener("click", window.closeLicenseModal);
        if (licenseModal) {
            licenseModal.addEventListener("click", (e) => {
                if (e.target === licenseModal) window.closeLicenseModal();
            });
        }

        const closeCiteBtn = document.getElementById("close-chapter-cite-modal");
        if (closeCiteBtn) closeCiteBtn.addEventListener("click", window.closeChapterCitationModal);
        if (citeModal) {
            citeModal.addEventListener("click", (e) => {
                if (e.target === citeModal) window.closeChapterCitationModal();
            });
        }

        // Global ESC key to close all modals & panels
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                window.closeTocModal();
                window.closeVocabModal();
                window.closeLicenseModal();
                window.closeChapterCitationModal();
                if (settingsPanel) settingsPanel.classList.add("hidden");
            }
        });
    }

    /* ==========================================================================
       7. Chapter Citation Generator
       ========================================================================== */
    let readerCitationStyle = 'mla';

    function initChapterCitationGenerator(meta) {
        // Initialized in initModalsAndDrawers
    }

    window.switchReaderCitationStyle = function (style) {
        readerCitationStyle = style;
        document.querySelectorAll("#chapterCitationModal .citation-tab-btn").forEach(btn => {
            btn.classList.toggle("active", btn.textContent.toLowerCase().includes(style));
        });
        renderReaderCitation(window.BOOK_METADATA || {});
    };

    function renderReaderCitation(meta) {
        const box = document.getElementById("reader-citation-text");
        if (!box) return;

        const author = meta.author || "Author Unknown";
        const title = meta.title || "Untitled";
        const chTitle = meta.chapterTitle || `Chapter ${meta.chapterNum || 1}`;
        const url = window.location.href;
        const year = new Date().getFullYear();

        let citation = '';
        if (readerCitationStyle === 'mla') {
            citation = `${author}. "${chTitle}." <em>${title}</em>, Hesten's Learning Digital Library, <a href="${url}" target="_blank">${url}</a>.`;
        } else if (readerCitationStyle === 'apa') {
            citation = `${author} (${year}). ${chTitle}. In <em>${title}</em>. Hesten's Learning. ${url}`;
        } else if (readerCitationStyle === 'chicago') {
            citation = `${author}. "${chTitle}." In <em>${title}</em>. Hesten's Learning Digital Library. ${url}.`;
        } else if (readerCitationStyle === 'harvard') {
            citation = `${author}, ${year}. '${chTitle}', in <em>${title}</em>, Hesten's Learning Digital Library, available at: &lt;${url}&gt;.`;
        }

        box.innerHTML = citation;
    }

    window.copyReaderCitationText = function () {
        const box = document.getElementById("reader-citation-text");
        const copyBtn = document.getElementById("reader-citation-copy-btn");
        if (!box) return;

        const text = box.textContent || box.innerText;
        navigator.clipboard.writeText(text).then(() => {
            if (copyBtn) {
                copyBtn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fas fa-copy"></i> <span>Copy Citation</span>';
                }, 2000);
            }
        });
    };

    /* ==========================================================================
       8. Single-Page Realistic Book Mode & Page-Flip Engine
       ========================================================================== */
    function initSinglePageBookMode(meta, prefsKey) {
        const bookStage = document.getElementById("book-stage");
        const bookFrame = document.getElementById("book-frame");
        const bookViewport = document.getElementById("book-page-viewport");
        const bookContent = document.getElementById("book-content");
        const prevPageBtn = document.getElementById("book-page-prev-btn");
        const nextPageBtn = document.getElementById("book-page-next-btn");
        const pageIndicator = document.getElementById("book-page-indicator");
        const readingTimePill = document.getElementById("book-reading-time-pill");
        const scrubberTrack = document.getElementById("book-scrubber-track");
        const scrubberFill = document.getElementById("book-scrubber-fill");
        const toggleViewModeBtn = document.getElementById("toggle-view-mode-btn");

        if (!bookContent || !bookViewport) return;

        const VIEW_MODE_KEY = 'hesten_reader_view_mode';
        let currentViewMode = 'book';
        try {
            const savedMode = localStorage.getItem(VIEW_MODE_KEY);
            if (savedMode === 'scroll' || savedMode === 'book') {
                currentViewMode = savedMode;
            }
        } catch (e) {}

        let currentPage = 1;
        let totalPages = 1;
        let columnStride = 0;
        let totalWordCount = 0;

        // Standard Educational Grade-Level WPM Benchmark Mapper
        function getGradeLevelWpm(gradeStr) {
            if (!gradeStr) return 225;
            const str = String(gradeStr).toLowerCase();
            if (str.includes('k') || str.includes('1') || str.includes('2')) return 100;
            if (str.includes('3') || str.includes('4')) return 135;
            if (str.includes('5') || str.includes('6')) return 165;
            if (str.includes('7') || str.includes('8')) return 195;
            if (str.includes('9') || str.includes('10') || str.includes('11') || str.includes('12') || str.includes('high')) return 225;
            if (str.includes('college') || str.includes('adult') || str.includes('advanced')) return 260;
            return 225;
        }

        const gradeWpm = getGradeLevelWpm(meta.grade || 'Grades 9-12');

        // Count words in chapter
        function countWords() {
            const text = bookContent.innerText || bookContent.textContent || '';
            const words = text.trim().split(/\s+/).filter(w => w.length > 0);
            totalWordCount = Math.max(1, words.length);
        }
        countWords();

        function setViewMode(mode) {
            currentViewMode = mode;
            try {
                localStorage.setItem(VIEW_MODE_KEY, mode);
            } catch (e) {}

            document.body.classList.remove('mode-book', 'mode-scroll');
            document.body.classList.add(`mode-${mode}`);

            if (toggleViewModeBtn) {
                toggleViewModeBtn.innerHTML = mode === 'book' ? '<i class="fas fa-book-open"></i>' : '<i class="fas fa-scroll"></i>';
                toggleViewModeBtn.title = mode === 'book' ? 'Switch to Continuous Scroll View' : 'Switch to Realistic Book Page-Flip View';
            }

            document.querySelectorAll('.settings-mode').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.mode === mode);
            });

            if (mode === 'book') {
                recalculatePagination();
                handleUrlHash();
            } else {
                bookContent.style.transform = '';
            }
        }

        function recalculatePagination() {
            if (currentViewMode !== 'book') return;

            const viewportWidth = bookViewport.clientWidth;
            const viewportHeight = bookViewport.clientHeight;
            if (viewportWidth <= 0 || viewportHeight <= 0) return;

            const columnGap = 64; // matching CSS column-gap (4rem)
            bookContent.style.columnWidth = `${viewportWidth}px`;
            bookContent.style.columnGap = `${columnGap}px`;

            const contentScrollWidth = bookContent.scrollWidth;
            columnStride = viewportWidth + columnGap;
            totalPages = Math.max(1, Math.ceil((contentScrollWidth + (columnGap / 2)) / columnStride));

            if (currentPage > totalPages) {
                currentPage = totalPages;
            } else if (currentPage < 1) {
                currentPage = 1;
            }

            window.CURRENT_READER_PAGE = currentPage;
            window.TOTAL_READER_PAGES = totalPages;

            updatePageDisplay(false);
        }

        function updatePageDisplay(animate = false, direction = 'forward') {
            if (currentViewMode !== 'book') return;

            const offset = (currentPage - 1) * columnStride;
            bookContent.style.transform = `translateX(-${offset}px)`;

            if (pageIndicator) {
                pageIndicator.innerHTML = `<i class="fas fa-file-alt"></i> Page ${currentPage} of ${totalPages}`;
            }

            if (readingTimePill) {
                const wordsRemaining = Math.max(0, Math.round(totalWordCount * ((totalPages - currentPage) / totalPages)));
                const minutesRemaining = Math.ceil(wordsRemaining / gradeWpm);
                const timeText = minutesRemaining <= 1 ? '< 1 min left' : `~${minutesRemaining} min left`;
                readingTimePill.innerHTML = `<i class="fas fa-clock"></i> ${timeText}`;
                readingTimePill.title = `Estimated time remaining at ${gradeWpm} WPM (${meta.grade || 'Grades 9-12'} pace)`;
            }

            if (scrubberFill) {
                const pct = totalPages > 1 ? Math.round(((currentPage - 1) / (totalPages - 1)) * 100) : 100;
                scrubberFill.style.width = `${pct}%`;
            }

            if (prevPageBtn) {
                prevPageBtn.disabled = currentPage <= 1;
                prevPageBtn.classList.toggle('disabled', currentPage <= 1);
            }
            if (nextPageBtn) {
                nextPageBtn.disabled = currentPage >= totalPages;
                nextPageBtn.classList.toggle('disabled', currentPage >= totalPages);
            }

            if (animate && bookFrame) {
                const animClass = direction === 'forward' ? 'flip-forward' : 'flip-backward';
                bookFrame.classList.remove('flip-forward', 'flip-backward');
                void bookFrame.offsetWidth;
                bookFrame.classList.add(animClass);
                setTimeout(() => {
                    bookFrame.classList.remove(animClass);
                }, 420);
            }
        }

        function goToPage(targetPage, updateHash = true, animate = true, direction = null) {
            const clamped = Math.max(1, Math.min(targetPage, totalPages));
            if (clamped === currentPage && !animate) return;

            const dir = direction || (clamped >= currentPage ? 'forward' : 'backward');
            currentPage = clamped;
            window.CURRENT_READER_PAGE = currentPage;

            updatePageDisplay(animate, dir);

            if (updateHash) {
                const targetHash = `#page-${currentPage}`;
                if (window.location.hash !== targetHash) {
                    history.pushState(null, '', targetHash);
                }
            }
        }

        function handleUrlHash() {
            const hash = window.location.hash;
            if (hash && /^#page-\d+$/i.test(hash)) {
                const pageNum = parseInt(hash.replace('#page-', ''), 10);
                if (!isNaN(pageNum) && pageNum >= 1) {
                    goToPage(pageNum, false, false);
                }
            }
        }

        window.jumpToReaderPage = function (pageNum) {
            setViewMode('book');
            setTimeout(() => {
                goToPage(pageNum, true, true);
            }, 50);
        };
        window.recalculateReaderPages = recalculatePagination;

        if (toggleViewModeBtn) {
            toggleViewModeBtn.addEventListener("click", () => {
                setViewMode(currentViewMode === 'book' ? 'scroll' : 'book');
            });
        }

        document.querySelectorAll(".settings-mode").forEach(btn => {
            btn.addEventListener("click", () => {
                setViewMode(btn.dataset.mode);
            });
        });

        if (prevPageBtn) {
            prevPageBtn.addEventListener("click", () => {
                if (currentPage > 1) {
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            });
        }

        if (nextPageBtn) {
            nextPageBtn.addEventListener("click", () => {
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            });
        }

        if (scrubberTrack) {
            scrubberTrack.addEventListener("click", (e) => {
                const rect = scrubberTrack.getBoundingClientRect();
                const clickX = e.clientX - rect.left;
                const pct = Math.max(0, Math.min(1, clickX / rect.width));
                const targetPage = Math.max(1, Math.min(totalPages, Math.round(pct * (totalPages - 1)) + 1));
                goToPage(targetPage, true, true);
            });
        }

        document.addEventListener("keydown", (e) => {
            if (['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName)) return;
            const openModal = document.querySelector(".modal-overlay:not(.hidden)");
            if (openModal && openModal.style.display !== "none") return;

            if (currentViewMode !== 'book') return;

            if (e.key === "ArrowRight" || e.key === "PageDown") {
                if (currentPage < totalPages) {
                    e.preventDefault();
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            } else if (e.key === "ArrowLeft" || e.key === "PageUp") {
                if (currentPage > 1) {
                    e.preventDefault();
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            } else if (e.key === " " && !e.shiftKey) {
                if (currentPage < totalPages) {
                    e.preventDefault();
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            } else if (e.key === " " && e.shiftKey) {
                if (currentPage > 1) {
                    e.preventDefault();
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            }
        });

        let touchStartX = 0;
        let touchStartY = 0;
        bookViewport.addEventListener("touchstart", (e) => {
            if (e.touches && e.touches.length === 1) {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
            }
        }, { passive: true });

        bookViewport.addEventListener("touchend", (e) => {
            if (e.changedTouches && e.changedTouches.length === 1) {
                const diffX = e.changedTouches[0].clientX - touchStartX;
                const diffY = e.changedTouches[0].clientY - touchStartY;
                if (Math.abs(diffX) > 45 && Math.abs(diffX) > Math.abs(diffY) * 1.5) {
                    if (diffX < 0 && currentPage < totalPages) {
                        goToPage(currentPage + 1, true, true, 'forward');
                    } else if (diffX > 0 && currentPage > 1) {
                        goToPage(currentPage - 1, true, true, 'backward');
                    }
                }
            }
        }, { passive: true });

        window.addEventListener("hashchange", handleUrlHash);
        window.addEventListener("popstate", handleUrlHash);

        if (window.ResizeObserver) {
            const ro = new ResizeObserver(() => {
                recalculatePagination();
            });
            ro.observe(bookViewport);
        } else {
            window.addEventListener("resize", recalculatePagination);
        }

        setViewMode(currentViewMode);
        setTimeout(() => {
            recalculatePagination();
            handleUrlHash();
        }, 120);
    }

})();
