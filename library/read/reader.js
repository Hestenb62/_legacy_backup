/* library/read/reader.js - Unified Digital Reader client-side engine */

document.addEventListener("DOMContentLoaded", () => {
    const bookContent = document.getElementById("book-content");
    if (!bookContent) return;

    const bookId = window.BOOK_METADATA ? window.BOOK_METADATA.id : 'default';
    const currentChapter = window.BOOK_METADATA ? window.BOOK_METADATA.chapterNum : 1;

    // --- State Storage Keys ---
    const PREFS_KEY = 'hesten_reader_prefs';
    const PROGRESS_KEY = `hesten_progress_${bookId}_lastChapter`;
    const BOOKMARK_KEY = `hesten_bookmark_${bookId}_chapter_${currentChapter}`;

    // Save last read chapter to progress
    try {
        localStorage.setItem(PROGRESS_KEY, currentChapter);
    } catch (e) {}

    // --- Init Elements ---
    const progressFill = document.getElementById("progress-bar");
    const goToTopBtn = document.getElementById("go-to-top-btn");
    const openSettingsBtn = document.getElementById("open-settings-btn");
    const settingsPanel = document.getElementById("settings-panel");
    const openTocBtn = document.getElementById("open-toc-modal");
    const tocModal = document.getElementById("toc-modal");
    const closeTocBtn = document.getElementById("close-toc-modal");

    // Vocab & Quiz Elements
    const openVocabBtn = document.getElementById("open-vocab-btn");
    const vocabModal = document.getElementById("vocab-modal");
    const closeVocabBtn = document.getElementById("close-vocab-modal");
    const vocabListContainer = document.getElementById("vocab-list-container");
    const vocabFlashContainer = document.getElementById("vocab-flash-container");
    const tabVocabList = document.getElementById("tab-vocab-list");
    const tabVocabFlash = document.getElementById("tab-vocab-flash");
    const tabQuiz = document.getElementById("tab-quiz");
    const quizContainer = document.getElementById("quiz-container");
    const downloadVocabBtn = document.getElementById("download-vocab-btn");

    // Flashcard components
    const flashcard = document.getElementById("vocab-flashcard");
    const flashcardFront = document.getElementById("flashcard-front-word");
    const flashcardBack = document.getElementById("flashcard-back-definition");
    const flashcardCounter = document.getElementById("flashcard-counter");
    const flashcardPrev = document.getElementById("flashcard-prev-btn");
    const flashcardNext = document.getElementById("flashcard-next-btn");

    // TTS Elements
    const ttsSpeakBtn = document.getElementById("tts-speak-btn");
    const ttsStopBtn = document.getElementById("tts-stop-btn");
    const ttsSpeedSlider = document.getElementById("tts-speed-slider");
    const ttsSpeedVal = document.getElementById("tts-speed-val");

    // Highlight Toolbar Elements
    const hlToolbar = document.getElementById("highlight-toolbar");
    const hlMarkBtn = document.getElementById("hl-btn-mark");
    const hlCopyBtn = document.getElementById("hl-btn-copy");

    // --- Settings Panel Toggle ---
    if (openSettingsBtn && settingsPanel) {
        let settingsOpen = false;
        openSettingsBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            settingsOpen = !settingsOpen;
            settingsPanel.classList.toggle("hidden", !settingsOpen);
        });

        document.addEventListener("click", (e) => {
            if (settingsOpen && !settingsPanel.contains(e.target) && e.target !== openSettingsBtn) {
                settingsOpen = false;
                settingsPanel.classList.add("hidden");
            }
        });
    }

    // --- Apply Typography & Theme Preferences ---
    let prefs = {
        font: "font-sans",
        size: "prose-lg",
        theme: "default",
        lineheight: "lh-normal",
        letterspacing: "ls-normal"
    };

    try {
        const stored = localStorage.getItem(PREFS_KEY);
        if (stored) prefs = JSON.parse(stored);
    } catch (e) {}

    function applyPrefs() {
        // Reset classes
        bookContent.classList.remove(
            'font-sans', 'font-serif', 'font-dyslexic',
            'prose-base', 'prose-lg', 'prose-2xl',
            'lh-normal', 'lh-wide', 'lh-extra',
            'ls-normal', 'ls-wide', 'ls-extra'
        );
        document.body.classList.remove('theme-sepia', 'theme-oled');

        // Apply new classes
        bookContent.classList.add(prefs.font);
        bookContent.classList.add(prefs.size);
        bookContent.classList.add(prefs.lineheight);
        bookContent.classList.add(prefs.letterspacing);
        if (prefs.theme !== 'default') {
            document.body.classList.add(prefs.theme);
        }

        // Sync active states on buttons
        document.querySelectorAll('.settings-font, .settings-size, .settings-theme, .settings-lineheight, .settings-letterspacing').forEach(el => {
            el.classList.remove('active');
            if (el.dataset.font === prefs.font || 
                el.dataset.size === prefs.size || 
                el.dataset.theme === prefs.theme || 
                el.dataset.lineheight === prefs.lineheight || 
                el.dataset.letterspacing === prefs.letterspacing) {
                el.classList.add('active');
            }
        });

        // Save
        try {
            localStorage.setItem(PREFS_KEY, JSON.stringify(prefs));
        } catch (e) {}
    }

    // Bind preference clicks
    document.querySelectorAll('.settings-font').forEach(btn => {
        btn.addEventListener('click', () => { prefs.font = btn.dataset.font; applyPrefs(); });
    });
    document.querySelectorAll('.settings-size').forEach(btn => {
        btn.addEventListener('click', () => { prefs.size = btn.dataset.size; applyPrefs(); });
    });
    document.querySelectorAll('.settings-lineheight').forEach(btn => {
        btn.addEventListener('click', () => { prefs.lineheight = btn.dataset.lineheight; applyPrefs(); });
    });
    document.querySelectorAll('.settings-letterspacing').forEach(btn => {
        btn.addEventListener('click', () => { prefs.letterspacing = btn.dataset.letterspacing; applyPrefs(); });
    });
    document.querySelectorAll('.settings-theme').forEach(btn => {
        btn.addEventListener('click', () => { prefs.theme = btn.dataset.theme; applyPrefs(); });
    });

    applyPrefs();

    // --- Table of Contents Modal ---
    if (openTocBtn && tocModal) {
        openTocBtn.addEventListener("click", () => tocModal.classList.add("active"));
        if (closeTocBtn) {
            closeTocBtn.addEventListener("click", () => tocModal.classList.remove("active"));
        }
        tocModal.addEventListener("click", (e) => {
            if (e.target === tocModal) tocModal.classList.remove("active");
        });
    }

    // --- License Modal ---
    const openLicenseBtn = document.getElementById("open-license-btn");
    const licenseModal = document.getElementById("license-modal");
    const closeLicenseBtn = document.getElementById("close-license-modal");

    if (openLicenseBtn && licenseModal) {
        openLicenseBtn.addEventListener("click", () => {
            licenseModal.classList.remove("hidden");
            licenseModal.offsetHeight; // force reflow
            licenseModal.classList.add("active");
        });
        if (closeLicenseBtn) {
            closeLicenseBtn.addEventListener("click", () => {
                licenseModal.classList.remove("active");
                setTimeout(() => licenseModal.classList.add("hidden"), 300);
            });
        }
        licenseModal.addEventListener("click", (e) => {
            if (e.target === licenseModal) {
                licenseModal.classList.remove("active");
                setTimeout(() => licenseModal.classList.add("hidden"), 300);
            }
        });
    }

    // --- Global Keyboard Accessibility ---
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            if (licenseModal && licenseModal.classList.contains("active")) {
                closeLicenseBtn.click();
            }
            if (tocModal && tocModal.classList.contains("active")) {
                tocModal.classList.remove("active");
            }
            if (vocabModal && !vocabModal.classList.contains("hidden")) {
                vocabModal.classList.add("hidden");
            }
        }
    });

    // --- Progress Tracking & Go To Top & Bookmark Restore ---
    window.addEventListener("scroll", () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        
        if (progressFill) progressFill.style.width = pct + '%';
        if (goToTopBtn) goToTopBtn.style.display = scrollTop > 300 ? "block" : "none";

        // Auto bookmark scroll percentage
        try {
            if (docHeight > 0) {
                localStorage.setItem(BOOKMARK_KEY, scrollTop / docHeight);
            }
        } catch (e) {}
    });

    if (goToTopBtn) {
        goToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    function restoreBookmark() {
        try {
            const savedPct = localStorage.getItem(BOOKMARK_KEY);
            if (savedPct) {
                const pct = parseFloat(savedPct);
                setTimeout(() => {
                    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    if (docHeight > 0) {
                        window.scrollTo({
                            top: docHeight * pct,
                            behavior: "smooth"
                        });
                    }
                }, 400);
            }
        } catch (e) {}
    }

    restoreBookmark();

    // --- Text to Speech (TTS) ---
    if ('speechSynthesis' in window && ttsSpeakBtn && ttsStopBtn) {
        let utterance = new SpeechSynthesisUtterance();
        let activeTextNodes = [];
        let currentParaIndex = -1;

        if (ttsSpeedSlider) {
            ttsSpeedSlider.addEventListener("input", () => {
                if (ttsSpeedVal) ttsSpeedVal.textContent = ttsSpeedSlider.value + 'x';
                if (window.speechSynthesis.speaking) {
                    // Update speed on the fly requires re-queue or restart. We will store it for next utterances.
                    utterance.rate = parseFloat(ttsSpeedSlider.value);
                }
            });
        }

        ttsSpeakBtn.addEventListener("click", () => {
            // Cancel any running speech
            window.speechSynthesis.cancel();

            const paras = Array.from(bookContent.querySelectorAll('p, h1, h2, h3, li'));
            activeTextNodes = paras;
            currentParaIndex = 0;

            const fullText = paras.map(p => {
                const clone = p.cloneNode(true);
                clone.querySelectorAll('.tooltiptext').forEach(t => t.remove());
                return clone.textContent.trim();
            }).join(" ... ");

            utterance.text = fullText;
            utterance.rate = ttsSpeedSlider ? parseFloat(ttsSpeedSlider.value) : 1.0;
            
            window.speechSynthesis.speak(utterance);
            ttsSpeakBtn.classList.add("hidden");
            ttsStopBtn.classList.remove("hidden");
        });

        utterance.onboundary = (e) => {
            let accumulated = 0;
            for (let i = 0; i < activeTextNodes.length; i++) {
                const clone = activeTextNodes[i].cloneNode(true);
                clone.querySelectorAll('.tooltiptext').forEach(t => t.remove());
                const len = clone.textContent.trim().length;

                if (e.charIndex >= accumulated && e.charIndex <= accumulated + len + 5) {
                    if (currentParaIndex !== i) {
                        if (activeTextNodes[currentParaIndex]) {
                            activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                        }
                        currentParaIndex = i;
                        activeTextNodes[currentParaIndex].classList.add('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                        activeTextNodes[currentParaIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    break;
                }
                accumulated += len + 5;
            }
        };

        const stopSpeech = () => {
            window.speechSynthesis.cancel();
            if (activeTextNodes[currentParaIndex]) {
                activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
            }
            ttsSpeakBtn.classList.remove("hidden");
            ttsStopBtn.classList.add("hidden");
        };

        ttsStopBtn.addEventListener("click", stopSpeech);
        utterance.onend = stopSpeech;
        utterance.onerror = stopSpeech;

        // Stop TTS on navigation/close
        window.addEventListener("beforeunload", () => {
            window.speechSynthesis.cancel();
        });
    } else if (ttsSpeakBtn) {
        ttsSpeakBtn.textContent = "TTS Not Supported";
        ttsSpeakBtn.disabled = true;
    }

    // --- Interactive Tooltips Dictionary ---
    function initTooltips() {
        const tooltips = document.querySelectorAll(".tooltiptext");
        tooltips.forEach(tt => {
            const definition = tt.textContent.replace(/\s+/g, ' ').trim();
            if (!definition) return;

            tt.innerHTML = `
                <div class="tooltip-def-text" style="margin-bottom: 8px;">${definition}</div>
                <div class="tooltip-actions" onclick="event.stopPropagation()">
                    <button class="tooltip-btn copy-btn" title="Copy definition">
                        <i class="fas fa-copy"></i> Copy
                    </button>
                    <button class="tooltip-btn speak-btn" title="Read definition aloud">
                        <i class="fas fa-volume-up"></i> Listen
                    </button>
                </div>
            `;

            const copyBtn = tt.querySelector(".copy-btn");
            copyBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                navigator.clipboard.writeText(definition).then(() => {
                    const originalHTML = copyBtn.innerHTML;
                    copyBtn.innerHTML = '<i class="fas fa-check text-green-400"></i> Copied!';
                    setTimeout(() => { copyBtn.innerHTML = originalHTML; }, 2000);
                });
            });

            const speakBtn = tt.querySelector(".speak-btn");
            speakBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                if ('speechSynthesis' in window) {
                    window.speechSynthesis.cancel();
                    const defUtterance = new SpeechSynthesisUtterance(definition);
                    defUtterance.rate = 0.9;
                    window.speechSynthesis.speak(defUtterance);

                    const originalHTML = speakBtn.innerHTML;
                    speakBtn.innerHTML = '<i class="fas fa-wave-square text-blue-400"></i> Reading...';
                    defUtterance.onend = () => { speakBtn.innerHTML = originalHTML; };
                }
            });
        });
    }
    initTooltips();

    // --- Highlight Selection Toolbar ---
    if (hlToolbar && hlMarkBtn && hlCopyBtn) {
        let currentRange = null;

        document.addEventListener("selectionchange", () => {
            const selection = window.getSelection();
            if (!selection.rangeCount || selection.isCollapsed) {
                hlToolbar.classList.add("hidden");
                return;
            }

            const range = selection.getRangeAt(0);
            if (!bookContent.contains(range.commonAncestorContainer)) {
                hlToolbar.classList.add("hidden");
                return;
            }

            currentRange = range;
            const rect = range.getBoundingClientRect();

            hlToolbar.style.left = `${rect.left + rect.width / 2 + window.scrollX}px`;
            hlToolbar.style.top = `${rect.top + window.scrollY - 10}px`;
            hlToolbar.classList.remove("hidden");
        });

        hlMarkBtn.addEventListener("click", () => {
            if (!currentRange) return;
            try {
                const mark = document.createElement("mark");
                mark.style.backgroundColor = "rgba(253, 224, 71, 0.6)";
                mark.style.borderRadius = "0.25rem";
                mark.style.padding = "0 0.25rem";
                mark.style.cursor = "pointer";
                currentRange.surroundContents(mark);
                window.getSelection().removeAllRanges();
            } catch (e) {
                console.log("Boundary crossed highlighting", e);
            }
            hlToolbar.classList.add("hidden");
        });

        hlCopyBtn.addEventListener("click", () => {
            if (!currentRange) return;
            navigator.clipboard.writeText(currentRange.toString()).then(() => {
                const originalHTML = hlCopyBtn.innerHTML;
                hlCopyBtn.innerHTML = '<i class="fas fa-check text-green-400"></i> Copied';
                setTimeout(() => hlCopyBtn.innerHTML = originalHTML, 1500);
            });
        });
    }

    // --- Vocabulary Study Guide Modal & Flashcards & Quiz Router ---
    let activeVocabList = [];
    let currentFlashIndex = 0;

    function buildVocabList() {
        const tooltips = bookContent.querySelectorAll(".tooltip");
        const vocabMap = {};

        tooltips.forEach(tt => {
            const termNode = Array.from(tt.childNodes).find(n => n.nodeType === 3 || (n.nodeType === 1 && !n.classList.contains('tooltiptext')));
            const term = termNode ? termNode.textContent.trim() : '';
            const defNode = tt.querySelector('.tooltiptext');
            
            let defText = '';
            if (defNode) {
                const defTextEl = defNode.querySelector('.tooltip-def-text');
                defText = defTextEl ? defTextEl.textContent.trim() : defNode.textContent.replace(/\s+/g, ' ').trim();
            }

            if (term && defText) {
                vocabMap[term.toLowerCase()] = { term, defText };
            }
        });

        activeVocabList = Object.values(vocabMap).sort((a, b) => a.term.localeCompare(b.term));
        
        // Show/hide download button
        if (downloadVocabBtn) {
            downloadVocabBtn.style.display = activeVocabList.length === 0 ? "none" : "inline-flex";
        }

        // Render List HTML
        if (vocabListContainer) {
            if (activeVocabList.length === 0) {
                vocabListContainer.innerHTML = '<div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);"><i class="fas fa-ghost" style="font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.5;"></i><p>No vocabulary words marked in this chapter.</p></div>';
            } else {
                vocabListContainer.innerHTML = activeVocabList.map(v => `
                    <div class="vocab-card">
                        <h4 class="vocab-term">${v.term}</h4>
                        <p class="vocab-definition">${v.defText}</p>
                    </div>
                `).join("");
            }
        }
    }

    function updateFlashcard() {
        if (!activeVocabList || activeVocabList.length === 0) {
            if (flashcard) flashcard.style.display = "none";
            document.querySelector(".flashcard-nav").style.display = "none";
            vocabFlashContainer.innerHTML = '<div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);"><i class="fas fa-ghost" style="font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.5;"></i><p>No vocabulary words found in this chapter.</p></div>';
            return;
        }

        if (flashcard) {
            flashcard.style.display = "block";
            flashcard.classList.remove("flipped");
            flashcardFront.textContent = activeVocabList[currentFlashIndex].term;
            flashcardBack.textContent = activeVocabList[currentFlashIndex].defText;
        }
        if (flashcardCounter) {
            flashcardCounter.textContent = `${currentFlashIndex + 1} of ${activeVocabList.length}`;
        }
    }

    if (flashcard) {
        flashcard.addEventListener("click", () => {
            flashcard.classList.toggle("flipped");
        });
    }

    if (flashcardPrev) {
        flashcardPrev.addEventListener("click", () => {
            if (currentFlashIndex > 0) {
                currentFlashIndex--;
                updateFlashcard();
            }
        });
    }

    if (flashcardNext) {
        flashcardNext.addEventListener("click", () => {
            if (currentFlashIndex < activeVocabList.length - 1) {
                currentFlashIndex++;
                updateFlashcard();
            }
        });
    }

    if (downloadVocabBtn) {
        downloadVocabBtn.addEventListener("click", () => {
            if (activeVocabList.length === 0) return;
            let txt = `${window.BOOK_METADATA.title} - Chapter ${currentChapter} Vocabulary\n`;
            txt += `==================================================\n\n`;
            activeVocabList.forEach((v, idx) => {
                txt += `${idx + 1}. ${v.term.toUpperCase()}\n`;
                txt += `   Definition: ${v.defText}\n\n`;
            });

            const blob = new Blob([txt], { type: 'text/plain;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `${bookId}_Chapter_${currentChapter}_Vocabulary.txt`;
            link.click();
        });
    }

    // --- Quiz Building & Rendering ---
    function buildQuiz() {
        const questions = window.BOOK_QUIZ_QUESTIONS;
        if (!quizContainer) return;

        if (!questions || questions.length === 0) {
            quizContainer.innerHTML = '<div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);"><i class="fas fa-smile" style="font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.5;"></i><p>No quiz questions available for this chapter.</p></div>';
            return;
        }

        quizContainer.innerHTML = questions.map((q, qIdx) => `
            <div class="quiz-question-card" data-qidx="${qIdx}">
                <p class="quiz-question-text">${qIdx + 1}. ${q.question}</p>
                <div class="quiz-options-list">
                    ${q.options.map((opt, oIdx) => `
                        <button class="quiz-option-btn" data-oidx="${oIdx}">
                            <i class="far fa-circle"></i> ${opt}
                        </button>
                    `).join("")}
                </div>
                <div class="quiz-explanation hidden" id="explain-${qIdx}">${q.explanation}</div>
            </div>
        `).join("");

        // Bind Quiz Option clicks
        quizContainer.querySelectorAll(".quiz-question-card").forEach(card => {
            const qIdx = parseInt(card.dataset.qidx);
            const questionData = questions[qIdx];
            const optionBtns = card.querySelectorAll(".quiz-option-btn");
            const explanationEl = card.querySelector(".quiz-explanation");

            optionBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    const selectedOIdx = parseInt(btn.dataset.oidx);
                    const isCorrect = selectedOIdx === questionData.correctIndex;

                    // Disable all buttons in this question
                    optionBtns.forEach(b => {
                        b.classList.add("disabled");
                        b.disabled = true;
                    });

                    // Highlight answer
                    if (isCorrect) {
                        btn.classList.add("correct");
                        btn.querySelector("i").className = "fas fa-check-circle";
                    } else {
                        btn.classList.add("incorrect");
                        btn.querySelector("i").className = "fas fa-times-circle";
                        // Highlight the correct option
                        optionBtns[questionData.correctIndex].classList.add("correct");
                        optionBtns[questionData.correctIndex].querySelector("i").className = "fas fa-check-circle";
                    }

                    // Reveal explanation
                    if (explanationEl) {
                        explanationEl.classList.remove("hidden");
                    }
                });
            });
        });
    }

    // Modal Trigger Actions
    if (openVocabBtn && vocabModal && closeVocabBtn) {
        openVocabBtn.addEventListener("click", () => {
            buildVocabList();
            buildQuiz();
            
            // Default to Vocab List Tab
            if (tabVocabList) tabVocabList.click();

            vocabModal.classList.remove("hidden");
        });

        closeVocabBtn.addEventListener("click", () => {
            vocabModal.classList.add("hidden");
        });

        vocabModal.addEventListener("click", (e) => {
            if (e.target === vocabModal) vocabModal.classList.add("hidden");
        });
    }

    // Tab bindings
    if (tabVocabList && tabVocabFlash && tabQuiz) {
        tabVocabList.addEventListener("click", () => {
            tabVocabList.classList.add("active");
            tabVocabFlash.classList.remove("active");
            if (tabQuiz) tabQuiz.classList.remove("active");

            vocabListContainer.style.display = "flex";
            vocabFlashContainer.style.display = "none";
            if (quizContainer) quizContainer.style.display = "none";
        });

        tabVocabFlash.addEventListener("click", () => {
            tabVocabFlash.classList.add("active");
            tabVocabList.classList.remove("active");
            if (tabQuiz) tabQuiz.classList.remove("active");

            vocabListContainer.style.display = "none";
            vocabFlashContainer.style.display = "flex";
            if (quizContainer) quizContainer.style.display = "none";
            
            currentFlashIndex = 0;
            updateFlashcard();
        });

        tabQuiz.addEventListener("click", () => {
            tabQuiz.classList.add("active");
            tabVocabList.classList.remove("active");
            tabVocabFlash.classList.remove("active");

            vocabListContainer.style.display = "none";
            vocabFlashContainer.style.display = "none";
            if (quizContainer) quizContainer.style.display = "flex";
        });
    }

    // --- Five Server Client-side Routing Fallback ---
    const params = new URLSearchParams(window.location.search);
    const urlChapter = params.get('chapter');
    const urlBook = params.get('book') || bookId;

    if (urlChapter && urlChapter !== 'chapter-' + currentChapter) {
        const match = urlChapter.match(/^chapter-(\d+)$/);
        if (match) {
            const targetChapterNum = parseInt(match[1], 10);
            const fetchPath = `${urlBook}/${urlChapter}.php`;
            
            fetch(fetchPath)
                .then(res => {
                    if (!res.ok) throw new Error("Chapter file not found");
                    return res.text();
                })
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContent = doc.querySelector('.cdn-book-reader-content');
                    if (newContent) {
                        // Update active chapter text
                        bookContent.innerHTML = newContent.innerHTML;
                        
                        // Update chapter title in page
                        const chapterTitleEl = document.querySelector('.chapter-title');
                        if (chapterTitleEl) {
                            chapterTitleEl.textContent = 'Chapter ' + targetChapterNum;
                        }
                        
                        // Update active chapter label in navigation controls
                        const currentChapterEl = document.getElementById('current-chapter');
                        if (currentChapterEl) {
                            currentChapterEl.textContent = 'Ch ' + targetChapterNum;
                        }

                        // Re-initialize tooltips, bookmarks, and quiz
                        initTooltips();
                        restoreBookmark();
                    }
                })
                .catch(err => console.log("AJAX routing fallback failed", err));
        }
    }
});
