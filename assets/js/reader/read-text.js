/**
 * assets/js/reader/read-text.js
 * Comprehensive Text-to-Speech (TTS) Narration Engine & Bookmark Auto-Sync:
 * - Sentence-level active synchronized highlighting with auto-scroll
 * - Play, Pause, Resume, and Stop speech controls
 * - Multi-speed rate selection (0.75x, 1.0x, 1.25x, 1.5x) with persistent preference
 * - Natural voice selection prioritization (Google, Microsoft, Apple natural voices)
 * - Real-time reading bookmark toggle linked to Google Drive auto-sync
 */

function initTextToSpeech(bookContent) {
    const speakBtn = document.getElementById("tts-speak-btn");
    const pauseBtn = document.getElementById("tts-pause-btn");
    const resumeBtn = document.getElementById("tts-resume-btn");
    const stopBtn = document.getElementById("tts-stop-btn");
    const speedBtn = document.getElementById("tts-speed-btn");

    if (!('speechSynthesis' in window) || !speakBtn || !stopBtn) return;

    let sentences = [];
    let sentenceNodes = [];
    let currentIdx = 0;
    let isSpeaking = false;
    let isPaused = false;

    // Speeds: 0.75x -> 1.0x -> 1.25x -> 1.5x
    const speedOptions = [0.75, 1.0, 1.25, 1.5];
    let currentRate = parseFloat(localStorage.getItem('hesten_tts_rate')) || 1.0;
    if (!speedOptions.includes(currentRate)) currentRate = 1.0;

    if (speedBtn) {
        speedBtn.textContent = `${currentRate.toFixed(2).replace(/\.00$/, '.0').replace(/\.0$/, '')}x`;
        speedBtn.addEventListener('click', () => {
            const nextIdx = (speedOptions.indexOf(currentRate) + 1) % speedOptions.length;
            currentRate = speedOptions[nextIdx];
            localStorage.setItem('hesten_tts_rate', currentRate);
            speedBtn.textContent = `${currentRate}x`;
            if (isSpeaking && !isPaused) {
                // Restart current sentence at new speed
                window.speechSynthesis.cancel();
                speakCurrentSentence();
            }
        });
    }

    // Voice selection: prioritize natural English voices
    let preferredVoice = null;
    function selectBestVoice() {
        const voices = window.speechSynthesis.getVoices();
        if (!voices || voices.length === 0) return;

        // Try natural/neural or reputable English voices first
        preferredVoice = voices.find(v => 
            v.lang.startsWith('en') && 
            (v.name.includes('Natural') || v.name.includes('Google') || v.name.includes('Samantha') || v.name.includes('Karen') || v.name.includes('Daniel'))
        ) || voices.find(v => v.lang.startsWith('en')) || voices[0];
    }

    if (window.speechSynthesis.onvoiceschanged !== undefined) {
        window.speechSynthesis.onvoiceschanged = selectBestVoice;
    }
    selectBestVoice();

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

    function updateControlUI(state) {
        // state: 'idle' | 'playing' | 'paused'
        if (state === 'playing') {
            speakBtn.classList.add("hidden");
            if (pauseBtn) pauseBtn.classList.remove("hidden");
            if (resumeBtn) resumeBtn.classList.add("hidden");
            stopBtn.classList.remove("hidden");
            if (speedBtn) speedBtn.classList.remove("hidden");
        } else if (state === 'paused') {
            speakBtn.classList.add("hidden");
            if (pauseBtn) pauseBtn.classList.add("hidden");
            if (resumeBtn) resumeBtn.classList.remove("hidden");
            stopBtn.classList.remove("hidden");
            if (speedBtn) speedBtn.classList.remove("hidden");
        } else { // 'idle'
            speakBtn.classList.remove("hidden");
            if (pauseBtn) pauseBtn.classList.add("hidden");
            if (resumeBtn) resumeBtn.classList.add("hidden");
            stopBtn.classList.add("hidden");
            if (speedBtn) speedBtn.classList.remove("hidden");
        }
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
        utterance.rate = currentRate;
        if (preferredVoice) utterance.voice = preferredVoice;

        utterance.onboundary = (event) => {
            if (event.name === 'word' && targetP) {
                const charIdx = event.charIndex;
                const sentenceText = sentences[currentIdx];
                const wordsBefore = (sentenceText.slice(0, charIdx).match(/\S+/g) || []).length;
                targetP.setAttribute('data-word-idx', wordsBefore);
            }
        };

        utterance.onend = () => {
            if (isSpeaking && !isPaused) {
                currentIdx++;
                speakCurrentSentence();
            }
        };

        utterance.onerror = () => {
            if (isSpeaking && !isPaused) {
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
            isPaused = false;
            currentIdx = 0;
            updateControlUI('playing');
            speakCurrentSentence();
        }
    }

    function pauseNarration() {
        if (isSpeaking && !isPaused) {
            isPaused = true;
            window.speechSynthesis.pause();
            updateControlUI('paused');
        }
    }

    function resumeNarration() {
        if (isSpeaking && isPaused) {
            isPaused = false;
            window.speechSynthesis.resume();
            updateControlUI('playing');
        }
    }

    function stopNarration() {
        isSpeaking = false;
        isPaused = false;
        window.speechSynthesis.cancel();
        document.querySelectorAll(".tts-active-sentence").forEach(el => el.classList.remove("tts-active-sentence"));
        updateControlUI('idle');
    }

    speakBtn.addEventListener("click", startNarration);
    if (pauseBtn) pauseBtn.addEventListener("click", pauseNarration);
    if (resumeBtn) resumeBtn.addEventListener("click", resumeNarration);
    stopBtn.addEventListener("click", stopNarration);

    window.addEventListener("beforeunload", () => {
        window.speechSynthesis.cancel();
    });
}

/**
 * Bookmark & Reading Progress Auto-Sync Controller
 */
(function initBookmarkAndSync() {
    const meta = window.BOOK_METADATA || {};
    const bookId = meta.id;
    if (!bookId) return;

    const BOOKMARKS_KEY = 'hesten_library_bookmarks';

    function isBookmarked() {
        try {
            const list = JSON.parse(localStorage.getItem(BOOKMARKS_KEY)) || [];
            return list.includes(bookId);
        } catch(e) {
            return false;
        }
    }

    function updateBookmarkIcon() {
        const btn = document.getElementById("reader-bookmark-btn");
        const icon = document.getElementById("reader-bookmark-icon");
        if (!btn || !icon) return;

        const bookmarked = isBookmarked();
        if (bookmarked) {
            btn.classList.add("active");
            icon.className = "fas fa-bookmark";
            btn.title = "Bookmarked (Saved in Reading List & Google Drive)";
        } else {
            btn.classList.remove("active");
            icon.className = "far fa-bookmark";
            btn.title = "Bookmark this Book";
        }
    }

    window.toggleBookBookmark = function() {
        try {
            let list = JSON.parse(localStorage.getItem(BOOKMARKS_KEY)) || [];
            const idx = list.indexOf(bookId);
            if (idx === -1) {
                list.push(bookId);
                if (window.showMessageBox) {
                    window.showMessageBox(`"${meta.title || 'Book'}" saved to your reading list!`);
                }
            } else {
                list.splice(idx, 1);
                if (window.showMessageBox) {
                    window.showMessageBox(`"${meta.title || 'Book'}" removed from reading list.`);
                }
            }
            localStorage.setItem(BOOKMARKS_KEY, JSON.stringify(list));
            updateBookmarkIcon();

            // Trigger Google Drive sync if connected
            if (typeof window.scheduleAutoSync === 'function') {
                window.scheduleAutoSync();
            }
        } catch(e) {
            console.warn("Bookmark toggle error:", e);
        }
    };

    // Initialize icon on DOM load
    document.addEventListener("DOMContentLoaded", () => {
        updateBookmarkIcon();

        // Initialize Text-to-Speech narration
        const bookContent = document.getElementById("book-content");
        if (bookContent) {
            initTextToSpeech(bookContent);
        }

        // Also ensure current reading chapter is saved & synced
        try {
            const progressKey = `hesten_progress_${bookId}_lastChapter`;
            const currentChapter = meta.chapterNum || 1;
            localStorage.setItem(progressKey, currentChapter);
            if (typeof window.scheduleAutoSync === 'function') {
                window.scheduleAutoSync();
            }
        } catch(e) {}
    });
})();
