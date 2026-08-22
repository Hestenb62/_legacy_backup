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

    // --- Scroll progress & Session Resume Bookmarking ---
    const SCROLL_POS_KEY = `hesten_scroll_pos_${bookId}_chapter_${currentChapter}`;
    const COMPLETION_KEY = `hesten_completion_pct_${bookId}`;

    function debounce(func, wait) {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    const saveScrollPosition = debounce((scrollTop, scrollPct) => {
        try {
            localStorage.setItem(SCROLL_POS_KEY, scrollTop);
            const totalCh = window.BOOK_METADATA ? (window.BOOK_METADATA.totalChapters || 1) : 1;
            const overallPct = Math.round(((currentChapter - 1) / totalCh) * 100 + (scrollPct / totalCh));
            localStorage.setItem(COMPLETION_KEY, overallPct);
        } catch (e) {}
    }, 150);

    window.addEventListener("scroll", () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        
        if (progressFill) progressFill.style.width = scrollPct + '%';
        if (goToTopBtn) goToTopBtn.style.display = scrollTop > 300 ? "block" : "none";

        saveScrollPosition(scrollTop, scrollPct);
    });

    // Prompt to resume reading if scrolled past 150px previously
    setTimeout(() => {
        try {
            const savedPos = parseFloat(localStorage.getItem(SCROLL_POS_KEY));
            if (savedPos > 150) {
                const toast = document.getElementById("resume-toast");
                const confirmBtn = document.getElementById("resume-toast-confirm");
                const dismissBtn = document.getElementById("resume-toast-dismiss");
                
                if (toast && confirmBtn && dismissBtn) {
                    toast.classList.remove("hidden");
                    toast.style.display = "block";
                    
                    confirmBtn.onclick = () => {
                        window.scrollTo({ top: savedPos, behavior: "smooth" });
                        toast.classList.add("hidden");
                        toast.style.display = "none";
                    };
                    
                    dismissBtn.onclick = () => {
                        toast.classList.add("hidden");
                        toast.style.display = "none";
                    };
                }
            }
        } catch (e) {}
    }, 600);

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
    const hlColorYellow = document.getElementById("hl-color-yellow");
    const hlColorPink = document.getElementById("hl-color-pink");
    const hlColorGreen = document.getElementById("hl-color-green");
    const hlNoteBtn = document.getElementById("hl-btn-note");
    const hlCopyBtn = document.getElementById("hl-btn-copy");

    // Initialize Assistant Engines
    calculateReadingTime();
    initBionicReading();
    initDoubleclickDictionary();
    initPersistentHighlights();

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
        document.body.classList.remove('sepia', 'dark');

        // Apply new classes
        bookContent.classList.add(prefs.font);
        bookContent.classList.add(prefs.size);
        bookContent.classList.add(prefs.lineheight);
        bookContent.classList.add(prefs.letterspacing);
        
        let activeTheme = prefs.theme;
        if (activeTheme === 'theme-sepia') activeTheme = 'sepia';
        if (activeTheme === 'theme-oled') activeTheme = 'dark';
        
        if (activeTheme !== 'default') {
            document.body.classList.add(activeTheme);
        }

        // Sync active states on buttons
        document.querySelectorAll('.settings-font, .settings-size, .settings-theme, .settings-lineheight, .settings-letterspacing').forEach(el => {
            el.classList.remove('active');
            let elTheme = el.dataset.theme;
            if (elTheme === 'theme-sepia') elTheme = 'sepia';
            if (elTheme === 'theme-oled') elTheme = 'dark';
            
            if (el.dataset.font === prefs.font || 
                el.dataset.size === prefs.size || 
                (el.dataset.theme && elTheme === activeTheme) || 
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

    // --- Progress Tracking & Go To Top ---
    if (goToTopBtn) {
        goToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    // --- Text to Speech (TTS) ---
    if ('speechSynthesis' in window && ttsSpeakBtn && ttsStopBtn) {
        let utterance = new SpeechSynthesisUtterance();
        let activeTextNodes = [];
        let currentParaIndex = -1;

        const voiceSelect = document.getElementById("tts-voice-select");
        let voices = [];

        function loadVoices() {
            voices = window.speechSynthesis.getVoices();
            if (voiceSelect) {
                const currentVal = voiceSelect.value;
                voiceSelect.innerHTML = '<option value="default">Default System Voice</option>';
                voices.forEach((v, idx) => {
                    const option = document.createElement("option");
                    option.value = idx;
                    option.textContent = `${v.name} (${v.lang})`;
                    voiceSelect.appendChild(option);
                });
                
                try {
                    const savedVoiceIdx = localStorage.getItem("hl_tts_voice_idx");
                    if (savedVoiceIdx !== null && voiceSelect.options[parseInt(savedVoiceIdx) + 1]) {
                        voiceSelect.value = savedVoiceIdx;
                        utterance.voice = voices[parseInt(savedVoiceIdx)];
                    }
                } catch (e) {}
            }
        }

        if (window.speechSynthesis.onvoiceschanged !== undefined) {
            window.speechSynthesis.onvoiceschanged = loadVoices;
        }
        loadVoices();

        if (voiceSelect) {
            voiceSelect.addEventListener("change", () => {
                const idx = voiceSelect.value;
                if (idx === "default") {
                    utterance.voice = null;
                    localStorage.removeItem("hl_tts_voice_idx");
                } else {
                    utterance.voice = voices[parseInt(idx)];
                    localStorage.setItem("hl_tts_voice_idx", idx);
                }
                
                if (window.speechSynthesis.speaking) {
                    window.speechSynthesis.cancel();
                }
            });
        }

        if (ttsSpeedSlider) {
            ttsSpeedSlider.addEventListener("input", () => {
                if (ttsSpeedVal) ttsSpeedVal.textContent = ttsSpeedSlider.value + 'x';
                if (window.speechSynthesis.speaking) {
                    // Update speed on the fly requires re-queue or restart. We will store it for next utterances.
                    utterance.rate = parseFloat(ttsSpeedSlider.value);
                }
            });
        }

        function wrapParagraphWords(element) {
            if (!element.dataset.originalHtml) {
                element.dataset.originalHtml = element.innerHTML;
            }
            let wordIndex = 0;
            function recurse(node) {
                if (node.nodeType === 3) {
                    const text = node.textContent;
                    const words = text.split(/(\s+)/);
                    const fragment = document.createDocumentFragment();
                    words.forEach(w => {
                        if (w.trim() === "") {
                            fragment.appendChild(document.createTextNode(w));
                        } else {
                            const span = document.createElement("span");
                            span.className = "tts-word";
                            span.dataset.wordIndex = wordIndex++;
                            span.textContent = w;
                            fragment.appendChild(span);
                        }
                    });
                    node.replaceWith(fragment);
                } else if (node.nodeType === 1 && !node.classList.contains("tooltiptext")) {
                    Array.from(node.childNodes).forEach(recurse);
                }
            }
            recurse(element);
        }

        function restoreParagraphWords(element) {
            if (element && element.dataset.originalHtml) {
                element.innerHTML = element.dataset.originalHtml;
                delete element.dataset.originalHtml;
            }
        }

        ttsSpeakBtn.addEventListener("click", () => {
            window.speechSynthesis.cancel();

            const paras = Array.from(bookContent.querySelectorAll('p, h1, h2, h3, li'));
            activeTextNodes = paras;
            currentParaIndex = -1; // Start at -1 to force wrapping on the first paragraph

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
            if (e.name !== 'word') return;
            let accumulated = 0;
            for (let i = 0; i < activeTextNodes.length; i++) {
                const clone = activeTextNodes[i].cloneNode(true);
                clone.querySelectorAll('.tooltiptext').forEach(t => t.remove());
                const len = clone.textContent.trim().length;

                if (e.charIndex >= accumulated && e.charIndex <= accumulated + len + 5) {
                    if (currentParaIndex !== i) {
                        if (activeTextNodes[currentParaIndex]) {
                            activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                            restoreParagraphWords(activeTextNodes[currentParaIndex]);
                        }
                        currentParaIndex = i;
                        wrapParagraphWords(activeTextNodes[currentParaIndex]);
                        activeTextNodes[currentParaIndex].classList.add('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                        activeTextNodes[currentParaIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }

                    const relativeCharIndex = e.charIndex - accumulated;
                    const pText = clone.textContent.trim();
                    const wordsBefore = pText.substring(0, relativeCharIndex).trim().split(/\s+/).filter(Boolean);
                    const wordIdx = wordsBefore.length;

                    activeTextNodes[currentParaIndex].querySelectorAll('.tts-word-active').forEach(w => w.classList.remove('tts-word-active'));
                    const wordSpan = activeTextNodes[currentParaIndex].querySelector(`.tts-word[data-word-index="${wordIdx}"]`);
                    if (wordSpan) {
                        wordSpan.classList.add('tts-word-active');
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
                restoreParagraphWords(activeTextNodes[currentParaIndex]);
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
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function highlightTextVocabulary() {
        if (!window.BOOK_JSON_VOCAB || window.BOOK_JSON_VOCAB.length === 0) return;
        const vocab = window.BOOK_JSON_VOCAB;

        const textNodes = [];
        function findTextNodes(node) {
            if (node.nodeType === 3) {
                if (node.textContent.trim().length > 3) {
                    textNodes.push(node);
                }
            } else if (node.nodeType === 1) {
                const tagName = node.tagName.toLowerCase();
                if (tagName !== 'script' && tagName !== 'style' && tagName !== 'a' && 
                    !node.classList.contains('tooltip') && !node.classList.contains('tooltiptext') &&
                    !node.classList.contains('chapter-title') && tagName !== 'h1' && tagName !== 'h2' && tagName !== 'h3') {
                    Array.from(node.childNodes).forEach(findTextNodes);
                }
            }
        }
        findTextNodes(bookContent);

        textNodes.forEach(node => {
            let text = node.textContent;
            const sortedVocab = [...vocab].sort((a, b) => b.word.length - a.word.length);

            for (const v of sortedVocab) {
                const word = v.word;
                const def = v.definition;
                const regex = new RegExp(`\\b(${escapeRegExp(word)})\\b`, 'i');
                const match = text.match(regex);
                if (match) {
                    const matchIndex = match.index;
                    const matchedWord = match[1];
                    
                    const beforeText = text.substring(0, matchIndex);
                    const afterText = text.substring(matchIndex + matchedWord.length);

                    const container = document.createElement('span');
                    container.innerHTML = `${beforeText}<span class="tooltip">${matchedWord}<span class="tooltiptext">${def}</span></span>${afterText}`;
                    
                    node.replaceWith(...container.childNodes);
                    break;
                }
            }
        });
    }

    function initTooltips() {
        highlightTextVocabulary();
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

    // --- Assistant Engine: Estimated Reading Time & Word Count ---
    function calculateReadingTime() {
        const contentEl = document.getElementById("book-content");
        const badgeText = document.getElementById("reading-time-text");
        if (!contentEl || !badgeText) return;

        const text = contentEl.innerText || contentEl.textContent || '';
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        const wordCount = words.length;
        const minutes = Math.max(1, Math.ceil(wordCount / 200));

        badgeText.textContent = `${minutes} min (${wordCount.toLocaleString()} words)`;
    }

    // --- Assistant Engine: Bionic Fixation Reading Mode ---
    let isBionicActive = false;
    let rawOriginalHtml = '';

    function initBionicReading() {
        const bionicBtn = document.getElementById("toggle-bionic-btn");
        if (!bionicBtn) return;

        const savedBionic = localStorage.getItem("hesten_reader_bionic") === "true";
        if (savedBionic) {
            toggleBionic(true);
        }

        bionicBtn.addEventListener("click", () => {
            toggleBionic(!isBionicActive);
        });
    }

    function toggleBionic(enable) {
        const bionicBtn = document.getElementById("toggle-bionic-btn");
        const contentEl = document.getElementById("book-content");
        if (!contentEl) return;

        if (enable && !isBionicActive) {
            rawOriginalHtml = contentEl.innerHTML;
            applyBionicFixation(contentEl);
            isBionicActive = true;
            if (bionicBtn) bionicBtn.classList.add("active");
            try { localStorage.setItem("hesten_reader_bionic", "true"); } catch(e) {}
        } else if (!enable && isBionicActive) {
            if (rawOriginalHtml) {
                contentEl.innerHTML = rawOriginalHtml;
                initTooltips();
                restoreHighlights();
            }
            isBionicActive = false;
            if (bionicBtn) bionicBtn.classList.remove("active");
            try { localStorage.setItem("hesten_reader_bionic", "false"); } catch(e) {}
        }
    }

    function applyBionicFixation(root) {
        const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
            acceptNode: (node) => {
                if (node.parentElement.closest('.tooltiptext, script, style, mark, button, code')) {
                    return NodeFilter.FILTER_REJECT;
                }
                return node.nodeValue.trim().length > 0 ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
            }
        });

        const textNodes = [];
        while (walker.nextNode()) {
            textNodes.push(walker.currentNode);
        }

        textNodes.forEach(node => {
            const span = document.createElement('span');
            const words = node.nodeValue.split(/(\s+)/);
            span.innerHTML = words.map(chunk => {
                if (/^\s+$/.test(chunk) || chunk.length === 0) return chunk;
                const mid = Math.ceil(chunk.length / 2);
                const boldPart = chunk.slice(0, mid);
                const restPart = chunk.slice(mid);
                return `<strong class="bionic-fixation" style="font-weight: 800;">${boldPart}</strong>${restPart}`;
            }).join('');
            node.parentNode.replaceChild(span, node);
        });
    }

    // --- Assistant Engine: Double-Click / Tap Dictionary Lookup ---
    let currentAudioUrl = null;

    function initDoubleclickDictionary() {
        const contentEl = document.getElementById("book-content");
        const popover = document.getElementById("reader-dict-popover");
        const audioBtn = document.getElementById("dict-pop-audio-btn");

        if (!contentEl || !popover) return;

        contentEl.addEventListener("dblclick", (e) => {
            const selection = window.getSelection();
            const selectedWord = selection.toString().trim().replace(/[^a-zA-Z]/g, '');
            if (!selectedWord || selectedWord.length < 2) return;

            lookupWord(selectedWord, e.clientX, e.clientY);
        });

        if (audioBtn) {
            audioBtn.addEventListener("click", () => {
                if (currentAudioUrl) {
                    const sound = new Audio(currentAudioUrl);
                    sound.play().catch(e => console.log("Audio play error", e));
                }
            });
        }

        document.addEventListener("click", (e) => {
            if (popover && !popover.classList.contains("hidden") && !popover.contains(e.target)) {
                window.closeDictPopover();
            }
        });
    }

    function lookupWord(word, clientX, clientY) {
        const popover = document.getElementById("reader-dict-popover");
        const wordEl = document.getElementById("dict-pop-word");
        const phoneticEl = document.getElementById("dict-pop-phonetic");
        const partEl = document.getElementById("dict-pop-part");
        const meaningEl = document.getElementById("dict-pop-meaning");
        const audioBtn = document.getElementById("dict-pop-audio-btn");
        const fullLink = document.getElementById("dict-pop-full-link");
        if (!popover) return;

        wordEl.textContent = word;
        phoneticEl.textContent = "...";
        partEl.textContent = "lookup";
        meaningEl.textContent = "Fetching definition from dictionary database...";
        if (audioBtn) audioBtn.classList.add("hidden");
        currentAudioUrl = null;

        if (fullLink) {
            fullLink.href = `https://www.merriam-webster.com/dictionary/${encodeURIComponent(word)}`;
        }

        // Position popover
        const popWidth = 300;
        let left = clientX + window.scrollX - 50;
        let top = clientY + window.scrollY + 20;

        if (left + popWidth > window.innerWidth - 20) {
            left = window.innerWidth - popWidth - 20;
        }
        if (left < 10) left = 10;

        popover.style.left = `${left}px`;
        popover.style.top = `${top}px`;
        popover.classList.remove("hidden");

        fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(word.toLowerCase())}`)
            .then(res => {
                if (!res.ok) throw new Error("Not found");
                return res.json();
            })
            .then(data => {
                if (Array.isArray(data) && data.length > 0) {
                    const entry = data[0];
                    phoneticEl.textContent = entry.phonetic || (entry.phonetics && entry.phonetics[0] ? entry.phonetics[0].text : '');
                    
                    const audioItem = entry.phonetics ? entry.phonetics.find(p => p.audio && p.audio.length > 0) : null;
                    if (audioItem && audioItem.audio) {
                        currentAudioUrl = audioItem.audio;
                        if (audioBtn) audioBtn.classList.remove("hidden");
                    }

                    if (entry.meanings && entry.meanings.length > 0) {
                        const m = entry.meanings[0];
                        partEl.textContent = m.partOfSpeech || 'definition';
                        meaningEl.textContent = m.definitions && m.definitions[0] ? m.definitions[0].definition : 'No definition found.';
                    }
                }
            })
            .catch(() => {
                meaningEl.textContent = "No standard quick definition found. Click 'Open in Lexicon' for full dictionary entry.";
                phoneticEl.textContent = "";
                partEl.textContent = "term";
            });
    }

    window.closeDictPopover = function() {
        const popover = document.getElementById("reader-dict-popover");
        if (popover) popover.classList.add("hidden");
    };

    // --- Assistant Engine: Persistent In-Text Highlighting & Study Notes ---
    const HL_STORAGE_KEY = `hesten_highlights_${bookId}_chapter_${currentChapter}`;
    let chapterHighlights = [];

    try {
        chapterHighlights = JSON.parse(localStorage.getItem(HL_STORAGE_KEY) || '[]');
    } catch(e) {
        chapterHighlights = [];
    }

    function initPersistentHighlights() {
        if (!hlToolbar) return;
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
            hlToolbar.style.top = `${rect.top + window.scrollY - 45}px`;
            hlToolbar.classList.remove("hidden");
        });

        function applyHighlight(colorName, customNote = '') {
            if (!currentRange) return;
            const selectedText = currentRange.toString().trim();
            if (!selectedText) return;

            const hlId = 'hl_' + Date.now();
            const hlObj = {
                id: hlId,
                text: selectedText,
                color: colorName,
                note: customNote,
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            };

            try {
                const mark = document.createElement("mark");
                mark.className = `reader-highlight hl-${colorName}`;
                mark.dataset.hlId = hlId;
                if (customNote) mark.title = `Note: ${customNote}`;

                currentRange.surroundContents(mark);
                window.getSelection().removeAllRanges();

                chapterHighlights.push(hlObj);
                localStorage.setItem(HL_STORAGE_KEY, JSON.stringify(chapterHighlights));
            } catch(e) {
                console.log("Boundary crossed highlighting error", e);
            }
            hlToolbar.classList.add("hidden");
        }

        if (hlColorYellow) hlColorYellow.addEventListener("click", () => applyHighlight('yellow'));
        if (hlColorPink) hlColorPink.addEventListener("click", () => applyHighlight('pink'));
        if (hlColorGreen) hlColorGreen.addEventListener("click", () => applyHighlight('green'));

        if (hlCopyBtn) {
            hlCopyBtn.addEventListener("click", () => {
                if (!currentRange) return;
                navigator.clipboard.writeText(currentRange.toString()).then(() => {
                    const originalHTML = hlCopyBtn.innerHTML;
                    hlCopyBtn.innerHTML = '<i class="fas fa-check text-green-400"></i> Copied';
                    setTimeout(() => hlCopyBtn.innerHTML = originalHTML, 1500);
                });
            });
        }

        if (hlNoteBtn) {
            hlNoteBtn.addEventListener("click", () => {
                if (!currentRange) return;
                const selectedText = currentRange.toString().trim();
                if (!selectedText) return;

                const noteText = prompt(`Add a study note for: "${selectedText.substring(0, 30)}${selectedText.length > 30 ? '...' : ''}"`);
                if (noteText === null) return;

                applyHighlight('green', noteText);
            });
        }

        restoreHighlights();
    }

    function restoreHighlights() {
        // Highlight restores or study list
    }

    function renderHighlightsList() {
        const listContainer = document.getElementById("highlights-list-container");
        if (!listContainer) return;

        if (chapterHighlights.length === 0) {
            listContainer.innerHTML = `
                <div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);">
                    <i class="fas fa-highlighter" style="font-size: 2rem; opacity: 0.3; margin-bottom: 1rem; display: block;"></i>
                    <p style="margin: 0; font-weight: 700;">No highlights or study notes saved yet in this chapter.</p>
                    <p style="margin: 0.5rem 0 0 0; font-size: 0.85rem;">Select any sentence or paragraph in the text to highlight in yellow, pink, or green.</p>
                </div>
            `;
        } else {
            listContainer.innerHTML = chapterHighlights.map((hl, idx) => `
                <div class="highlight-item-card hl-card-${hl.color}" style="background: var(--color-base-bg); border: 1px solid var(--color-border); border-left: 4px solid ${hl.color === 'yellow' ? '#facc15' : (hl.color === 'pink' ? '#f472b6' : '#4ade80')}; border-radius: 0.75rem; padding: 1rem; margin-bottom: 0.85rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-secondary);"><i class="fas fa-bookmark"></i> Passage #${idx + 1} (${hl.time})</span>
                    </div>
                    <blockquote style="margin: 0 0 0.5rem 0; font-size: 0.95rem; font-style: italic; color: var(--color-text-default); line-height: 1.5;">"${hl.text}"</blockquote>
                    ${hl.note ? `<div style="font-size: 0.85rem; background: var(--color-content-bg); padding: 0.5rem 0.75rem; border-radius: 0.5rem; color: var(--color-text-default); border: 1px dashed var(--color-border);"><strong style="color: var(--color-primary);"><i class="fas fa-sticky-note"></i> Note:</strong> ${hl.note}</div>` : ''}
                </div>
            `).join('');
        }
    }

    window.openHighlightsModal = function() {
        const vocabModal = document.getElementById("vocab-modal");
        const tabHighlights = document.getElementById("tab-highlights");
        if (vocabModal && tabHighlights) {
            buildVocabList();
            buildQuiz();
            tabHighlights.click();
            vocabModal.classList.remove("hidden");
        }
    };

    window.closeHighlightsModal = function() {
        const vocabModal = document.getElementById("vocab-modal");
        if (vocabModal) vocabModal.classList.add("hidden");
    };

    window.clearChapterHighlights = function() {
        if (!confirm("Are you sure you want to clear all highlights for this chapter?")) return;
        chapterHighlights = [];
        try { localStorage.removeItem(HL_STORAGE_KEY); } catch(e) {}
        renderHighlightsList();
    };

    window.exportHighlightsMarkdown = function() {
        if (chapterHighlights.length === 0) {
            alert("No highlights to export.");
            return;
        }

        const title = window.BOOK_METADATA ? window.BOOK_METADATA.title : 'Book';
        const ch = window.BOOK_METADATA ? window.BOOK_METADATA.chapterNum : 1;

        let md = `# Study Notes: ${title} (Chapter ${ch})\n\n`;
        chapterHighlights.forEach((hl, i) => {
            md += `### Highlight ${i + 1} (${hl.color.toUpperCase()})\n> ${hl.text}\n\n`;
            if (hl.note) {
                md += `**Note:** ${hl.note}\n\n`;
            }
        });

        navigator.clipboard.writeText(md).then(() => {
            alert("Highlights exported as Markdown to your clipboard!");
        });
    };

    // --- Assistant Engine: Academic Citation Generator ---
    let currentCitationStyle = 'mla';

    window.openChapterCitationModal = function() {
        const modal = document.getElementById("citation-modal");
        if (!modal) return;
        switchCitationStyle(currentCitationStyle);
        modal.classList.remove("hidden");
    };

    window.closeChapterCitationModal = function() {
        const modal = document.getElementById("citation-modal");
        if (modal) modal.classList.add("hidden");
    };

    window.switchCitationStyle = function(style) {
        currentCitationStyle = style;
        document.querySelectorAll("#citation-modal .vocab-tab-btn").forEach(btn => {
            btn.classList.toggle("active", btn.id === `tab-cite-${style}`);
        });

        const box = document.getElementById("citation-text-box");
        if (!box) return;

        const title = window.BOOK_METADATA ? window.BOOK_METADATA.title : 'Book Title';
        const ch = window.BOOK_METADATA ? window.BOOK_METADATA.chapterNum : 1;
        const author = "Author";
        const url = window.location.href;
        const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        const year = new Date().getFullYear();

        let citation = '';
        if (style === 'mla') {
            citation = `${author}. *${title}*. Chapter ${ch}, Hesten's Learning Library Digital Edition, ${year}, <${url}>. Accessed ${today}.`;
        } else if (style === 'apa') {
            citation = `${author}. (${year}). *${title}* (Chapter ${ch}). Hesten's Learning Library. ${url}`;
        } else if (style === 'chicago') {
            citation = `${author}. *${title}*. Chapter ${ch}. Hesten's Learning Library Digital Archive, ${year}. ${url}.`;
        }

        box.innerHTML = `<p style="margin: 0; font-family: monospace; font-size: 0.95rem; line-height: 1.6; color: var(--color-text-default);">${citation}</p>`;
    };

    window.copyCitationToClipboard = function() {
        const box = document.getElementById("citation-text-box");
        const btnLabel = document.getElementById("copy-citation-label");
        if (!box) return;

        navigator.clipboard.writeText(box.textContent.trim()).then(() => {
            if (btnLabel) {
                btnLabel.textContent = "Copied!";
                setTimeout(() => btnLabel.textContent = "Copy Citation", 2000);
            }
        });
    };

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
        
        // Option 2 Fallback: If no inline tooltips exist, check window.BOOK_JSON_VOCAB
        if (activeVocabList.length === 0 && window.BOOK_JSON_VOCAB && window.BOOK_JSON_VOCAB.length > 0) {
            activeVocabList = window.BOOK_JSON_VOCAB.map(v => ({
                term: v.word,
                defText: v.definition
            })).sort((a, b) => a.term.localeCompare(b.term));
        }
        
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

    // --- Quiz Building & Rendering (Wizard Mode) ---
    let currentQuestionIndex = 0;
    let quizAnswersState = [];

    function buildQuiz() {
        const questions = window.BOOK_QUIZ_QUESTIONS;
        if (!quizContainer) return;

        if (!questions || questions.length === 0) {
            quizContainer.innerHTML = '<div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);"><i class="fas fa-smile" style="font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.5;"></i><p>No quiz questions available for this chapter.</p></div>';
            return;
        }

        // If quiz is finished, show result screen
        if (currentQuestionIndex >= questions.length) {
            showQuizResults(questions);
            return;
        }

        const q = questions[currentQuestionIndex];
        const progressPct = (currentQuestionIndex / questions.length) * 100;

        quizContainer.innerHTML = `
            <div class="quiz-wizard" style="display: flex; flex-direction: column; gap: 1rem; text-align: left;">
                <!-- Progress Header -->
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; font-weight: 700; color: var(--color-text-secondary);">
                    <span>Question ${currentQuestionIndex + 1} of ${questions.length}</span>
                    <span>${Math.round(progressPct)}% Complete</span>
                </div>
                <!-- Progress Bar -->
                <div style="width: 100%; height: 6px; background-color: var(--color-border); border-radius: 9999px; overflow: hidden; margin-bottom: 0.5rem;">
                    <div style="width: ${progressPct}%; height: 100%; background: var(--color-primary); transition: width 0.3s ease;"></div>
                </div>

                <!-- Question Card -->
                <div class="quiz-question-card" style="margin: 0; padding: 1.5rem; background-color: var(--color-base-bg); border: 1px solid var(--color-border); border-radius: 1.25rem;">
                    <p class="quiz-question-text" style="font-size: 1.05rem; font-weight: 800; margin: 0 0 1.25rem 0; line-height: 1.4; color: var(--color-text-default);">${q.question}</p>
                    <div class="quiz-options-list" style="display: flex; flex-direction: column; gap: 0.75rem;">
                        ${q.options.map((opt, oIdx) => `
                            <button class="quiz-option-btn" data-oidx="${oIdx}" style="text-align: left; padding: 0.85rem 1.25rem; border-radius: 0.75rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; transition: all 0.2s ease;">
                                <i class="far fa-circle"></i> <span>${opt}</span>
                            </button>
                        `).join("")}
                    </div>
                    <div class="quiz-explanation hidden" style="margin-top: 1.25rem; padding: 1rem; background-color: rgba(99, 102, 241, 0.08); border-left: 4px solid var(--color-primary); border-radius: 0 0.75rem 0.75rem 0; font-size: 0.9rem; line-height: 1.5; color: var(--color-text-default);">${q.explanation}</div>
                </div>

                <!-- Navigation Controls -->
                <div style="display: flex; justify-content: flex-end; margin-top: 0.5rem;">
                    <button id="quiz-next-btn" class="tooltip-btn" style="padding: 0.65rem 1.5rem; border-radius: 9999px; display: none; align-items: center; gap: 0.5rem; font-weight: 700;">
                        ${currentQuestionIndex === questions.length - 1 ? 'Finish Quiz' : 'Next Question'} <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        `;

        // Bind Option clicks
        const optionBtns = quizContainer.querySelectorAll(".quiz-option-btn");
        const explanationEl = quizContainer.querySelector(".quiz-explanation");
        const nextBtn = document.getElementById("quiz-next-btn");

        optionBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const selectedOIdx = parseInt(btn.dataset.oidx);
                const isCorrect = selectedOIdx === q.correctIndex;

                // Save result to answers state
                quizAnswersState[currentQuestionIndex] = {
                    question: q.question,
                    isCorrect: isCorrect,
                    selectedOption: q.options[selectedOIdx],
                    correctOption: q.options[q.correctIndex]
                };

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
                    optionBtns[q.correctIndex].classList.add("correct");
                    optionBtns[q.correctIndex].querySelector("i").className = "fas fa-check-circle";
                }

                // Reveal explanation and Next button
                if (explanationEl) explanationEl.classList.remove("hidden");
                if (nextBtn) nextBtn.style.display = "inline-flex";
            });
        });

        if (nextBtn) {
            nextBtn.addEventListener("click", () => {
                currentQuestionIndex++;
                buildQuiz();
            });
        }
    }

    function showQuizResults(questions) {
        const correctCount = quizAnswersState.filter(a => a.isCorrect).length;
        const totalCount = questions.length;
        const scorePct = Math.round((correctCount / totalCount) * 100);

        let ratingMessage = "Keep practicing! Re-read the chapter to strengthen your understanding.";
        let ratingIcon = "fa-redo";
        let ratingColor = "#ef4444";

        if (scorePct === 100) {
            ratingMessage = "Perfect score! Outstanding mastery of the material.";
            ratingIcon = "fa-trophy";
            ratingColor = "#eab308";
        } else if (scorePct >= 70) {
            ratingMessage = "Great job! You have a solid grasp on this chapter.";
            ratingIcon = "fa-thumbs-up";
            ratingColor = "#10b981";
        }

        quizContainer.innerHTML = `
            <div class="quiz-results" style="display: flex; flex-direction: column; gap: 1.5rem; text-align: center; padding: 1rem 0;">
                <!-- Icon & Score -->
                <div>
                    <div style="width: 4rem; height: 4rem; border-radius: 50%; background-color: rgba(99, 102, 241, 0.1); color: ${ratingColor}; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; font-size: 1.75rem;">
                        <i class="fas ${ratingIcon}"></i>
                    </div>
                    <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 900; margin: 0 0 0.25rem 0; color: var(--color-text-default);">Quiz Completed!</h3>
                    <p style="color: var(--color-text-secondary); font-size: 0.9rem; max-width: 320px; margin: 0 auto 1.5rem auto; line-height: 1.4;">${ratingMessage}</p>
                </div>

                <!-- Large Score Card -->
                <div style="background-color: var(--color-base-bg); border: 1px solid var(--color-border); border-radius: 1.5rem; padding: 1.5rem; display: flex; justify-content: space-around; align-items: center; max-width: 400px; margin: 0 auto; width: 100%;">
                    <div style="text-align: left;">
                        <span style="font-size: 0.8rem; font-weight: 800; color: var(--color-text-secondary); text-transform: uppercase;">Score</span>
                        <h2 style="margin: 0; font-size: 2.25rem; font-weight: 900; color: ${ratingColor}; line-height: 1;">${scorePct}%</h2>
                    </div>
                    <div style="width: 1px; height: 2.5rem; background-color: var(--color-border);"></div>
                    <div style="text-align: left;">
                        <span style="font-size: 0.8rem; font-weight: 800; color: var(--color-text-secondary); text-transform: uppercase;">Correct</span>
                        <h2 style="margin: 0; font-size: 2.25rem; font-weight: 900; color: var(--color-text-default); line-height: 1;">${correctCount} / ${totalCount}</h2>
                    </div>
                </div>

                <!-- Actions -->
                <div style="margin-top: 1rem;">
                    <button id="quiz-retry-btn" class="tooltip-btn" style="padding: 0.75rem 2rem; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 700; background-color: var(--color-primary); color: white; border: none; cursor: pointer; margin: 0 auto;">
                        <i class="fas fa-undo"></i> Retry Quiz
                    </button>
                </div>
            </div>
        `;

        document.getElementById("quiz-retry-btn").addEventListener("click", () => {
            currentQuestionIndex = 0;
            quizAnswersState = [];
            buildQuiz();
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
    const tabHighlights = document.getElementById("tab-highlights");
    const vocabHighlightsContainer = document.getElementById("vocab-highlights-container");

    if (tabVocabList && tabVocabFlash && tabQuiz) {
        tabVocabList.addEventListener("click", () => {
            tabVocabList.classList.add("active");
            if (tabHighlights) tabHighlights.classList.remove("active");
            tabVocabFlash.classList.remove("active");
            if (tabQuiz) tabQuiz.classList.remove("active");

            vocabListContainer.classList.remove("hidden");
            vocabFlashContainer.classList.add("hidden");
            if (quizContainer) quizContainer.classList.add("hidden");
            if (vocabHighlightsContainer) vocabHighlightsContainer.classList.add("hidden");

            vocabListContainer.style.display = "flex";
            vocabFlashContainer.style.display = "none";
            if (quizContainer) quizContainer.style.display = "none";
            if (vocabHighlightsContainer) vocabHighlightsContainer.style.display = "none";
        });

        if (tabHighlights && vocabHighlightsContainer) {
            tabHighlights.addEventListener("click", () => {
                tabHighlights.classList.add("active");
                tabVocabList.classList.remove("active");
                tabVocabFlash.classList.remove("active");
                if (tabQuiz) tabQuiz.classList.remove("active");

                renderHighlightsList();

                vocabListContainer.classList.add("hidden");
                vocabFlashContainer.classList.add("hidden");
                if (quizContainer) quizContainer.classList.add("hidden");
                vocabHighlightsContainer.classList.remove("hidden");

                vocabListContainer.style.display = "none";
                vocabFlashContainer.style.display = "none";
                if (quizContainer) quizContainer.style.display = "none";
                vocabHighlightsContainer.style.display = "flex";
            });
        }

        tabVocabFlash.addEventListener("click", () => {
            tabVocabFlash.classList.add("active");
            tabVocabList.classList.remove("active");
            if (tabHighlights) tabHighlights.classList.remove("active");
            if (tabQuiz) tabQuiz.classList.remove("active");

            vocabListContainer.classList.add("hidden");
            vocabFlashContainer.classList.remove("hidden");
            if (quizContainer) quizContainer.classList.add("hidden");
            if (vocabHighlightsContainer) vocabHighlightsContainer.classList.add("hidden");

            vocabListContainer.style.display = "none";
            vocabFlashContainer.style.display = "flex";
            if (quizContainer) quizContainer.style.display = "none";
            if (vocabHighlightsContainer) vocabHighlightsContainer.style.display = "none";
            
            currentFlashIndex = 0;
            updateFlashcard();
        });

        tabQuiz.addEventListener("click", () => {
            tabQuiz.classList.add("active");
            tabVocabList.classList.remove("active");
            if (tabHighlights) tabHighlights.classList.remove("active");
            tabVocabFlash.classList.remove("active");

            vocabListContainer.classList.add("hidden");
            vocabFlashContainer.classList.add("hidden");
            if (quizContainer) quizContainer.classList.remove("hidden");
            if (vocabHighlightsContainer) vocabHighlightsContainer.classList.add("hidden");

            vocabListContainer.style.display = "none";
            vocabFlashContainer.style.display = "none";
            if (quizContainer) quizContainer.style.display = "flex";
            if (vocabHighlightsContainer) vocabHighlightsContainer.style.display = "none";
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
            const fetchPath = `/library/read/${urlBook}/${urlChapter}.php`;
            
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
