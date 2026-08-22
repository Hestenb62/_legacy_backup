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

            // Sync settings panel buttons
            document.querySelectorAll(".settings-font").forEach(b => b.classList.toggle("active", b.dataset.font === prefs.font));
            document.querySelectorAll(".settings-size").forEach(b => b.classList.toggle("active", b.dataset.size === prefs.size));
            document.querySelectorAll(".settings-lh").forEach(b => b.classList.toggle("active", b.dataset.lh === prefs.lh));
            document.querySelectorAll(".settings-theme").forEach(b => b.classList.toggle("active", b.dataset.theme === prefs.theme));

            try {
                localStorage.setItem(prefsKey, JSON.stringify(prefs));
            } catch (e) {}
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
                targetP.scrollIntoView({ behavior: "smooth", block: "center" });
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

        let selectedRange = null;

        document.addEventListener("selectionchange", () => {
            const sel = window.getSelection();
            if (sel && sel.toString().trim().length > 0 && bookContent.contains(sel.anchorNode)) {
                try {
                    selectedRange = sel.getRangeAt(0);
                    const rect = selectedRange.getBoundingClientRect();
                    toolbar.style.position = "fixed";
                    toolbar.style.top = `${Math.max(rect.top - 48, 10)}px`;
                    toolbar.style.left = `${rect.left + (rect.width / 2) - 80}px`;
                    toolbar.style.display = "flex";
                    toolbar.classList.remove("hidden");
                } catch (e) {}
            } else {
                if (toolbar) toolbar.classList.add("hidden");
            }
        });

        function applyHighlight(colorClass) {
            if (!selectedRange) return;
            const text = selectedRange.toString();
            if (!text) return;

            const span = document.createElement("mark");
            span.className = colorClass;
            span.textContent = text;

            selectedRange.deleteContents();
            selectedRange.insertNode(span);
            window.getSelection().removeAllRanges();
            toolbar.classList.add("hidden");

            saveHighlight(text, colorClass, highlightsKey);
        }

        if (hlYellow) hlYellow.addEventListener("click", () => applyHighlight("hl-yellow"));
        if (hlPink) hlPink.addEventListener("click", () => applyHighlight("hl-pink"));
        if (hlGreen) hlGreen.addEventListener("click", () => applyHighlight("hl-green"));

        if (hlCopy) {
            hlCopy.addEventListener("click", () => {
                if (selectedRange) {
                    navigator.clipboard.writeText(selectedRange.toString());
                    toolbar.classList.add("hidden");
                }
            });
        }

        if (hlNote) {
            hlNote.addEventListener("click", () => {
                if (selectedRange) {
                    const note = prompt("Add a study note for this selection:");
                    if (note) {
                        applyHighlight("hl-yellow");
                        saveHighlight(selectedRange.toString(), "hl-yellow", highlightsKey, note);
                    }
                }
            });
        }
    }

    function saveHighlight(text, color, key, note = '') {
        try {
            const list = JSON.parse(localStorage.getItem(key) || '[]');
            list.push({ text: text, color: color, note: note, date: new Date().toLocaleDateString() });
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
                const card = document.createElement("div");
                card.style.padding = "1rem";
                card.style.marginBottom = "0.75rem";
                card.style.border = "1px solid var(--color-border)";
                card.style.borderRadius = "0.75rem";
                card.style.background = "var(--color-base-bg)";
                card.innerHTML = `
                    <div style="font-size: 0.75rem; color: var(--color-text-secondary); margin-bottom: 0.35rem;">Saved on ${item.date}</div>
                    <blockquote style="margin: 0 0 0.5rem 0; font-style: italic; border-left: 3px solid var(--color-primary); padding-left: 0.75rem; color: var(--color-text-default);">${item.text}</blockquote>
                    ${item.note ? `<p style="margin: 0; font-size: 0.85rem; font-weight: 700; color: var(--color-primary);"><i class="fas fa-sticky-note mr-1"></i> Note: ${item.note}</p>` : ''}
                `;
                container.appendChild(card);
            });
        } else {
            container.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No text highlights saved for this chapter yet.</p>`;
        }
    }

    /* ==========================================================================
       6. Modals & Drawers (TOC, Vocab, License)
       ========================================================================== */
    function initModalsAndDrawers() {
        // TOC Drawer
        const openTocBtn = document.getElementById("open-toc-modal");
        const tocModal = document.getElementById("toc-modal");
        const closeTocBtn = document.getElementById("close-toc-modal");

        if (openTocBtn && tocModal) {
            openTocBtn.addEventListener("click", () => tocModal.classList.remove("hidden"));
        }
        if (closeTocBtn && tocModal) {
            closeTocBtn.addEventListener("click", () => tocModal.classList.add("hidden"));
        }
        if (tocModal) {
            tocModal.addEventListener("click", (e) => {
                if (e.target === tocModal) tocModal.classList.add("hidden");
            });
        }

        // Vocab & Study Guide Modal
        const openVocabBtn = document.getElementById("open-vocab-btn");
        const vocabModal = document.getElementById("vocab-modal");
        const closeVocabBtn = document.getElementById("close-vocab-modal");

        if (openVocabBtn && vocabModal) {
            openVocabBtn.addEventListener("click", () => vocabModal.classList.remove("hidden"));
        }
        if (closeVocabBtn && vocabModal) {
            closeVocabBtn.addEventListener("click", () => vocabModal.classList.add("hidden"));
        }
        if (vocabModal) {
            vocabModal.addEventListener("click", (e) => {
                if (e.target === vocabModal) vocabModal.classList.add("hidden");
            });
        }

        // License Modal
        const closeLicenseBtn = document.getElementById("close-license-modal");
        const licenseModal = document.getElementById("license-modal");

        window.openLicenseModal = function () {
            if (licenseModal) licenseModal.classList.remove("hidden");
        };
        if (closeLicenseBtn && licenseModal) {
            closeLicenseBtn.addEventListener("click", () => licenseModal.classList.add("hidden"));
        }
        if (licenseModal) {
            licenseModal.addEventListener("click", (e) => {
                if (e.target === licenseModal) licenseModal.classList.add("hidden");
            });
        }
    }

    /* ==========================================================================
       7. Chapter Citation Generator
       ========================================================================== */
    let readerCitationStyle = 'mla';

    function initChapterCitationGenerator(meta) {
        window.openChapterCitationModal = function () {
            const m = document.getElementById("chapterCitationModal");
            if (m) {
                renderReaderCitation(meta);
                m.classList.remove("hidden");
            }
        };

        const closeBtn = document.getElementById("close-chapter-cite-modal");
        const modal = document.getElementById("chapterCitationModal");
        if (closeBtn && modal) {
            closeBtn.addEventListener("click", () => modal.classList.add("hidden"));
        }
        if (modal) {
            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
            });
        }
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

})();
