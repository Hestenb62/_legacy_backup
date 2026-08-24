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
