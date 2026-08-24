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

        const contListWrap = document.getElementById("vocab-list-container-wrap") || document.getElementById("vocab-list-container");
        const contFlash = document.getElementById("vocab-flash-container");
        const contQuizWrap = document.getElementById("quiz-container-wrap") || document.getElementById("quiz-container");
        const contHl = document.getElementById("vocab-highlights-container");
        
        const contList = document.getElementById("vocab-list-container");
        const contQuiz = document.getElementById("quiz-container");

        function switchStudyTab(tab) {
            [tabList, tabFlash, tabQuiz, tabHl].forEach(t => t && t.classList.remove("active"));
            [contListWrap, contFlash, contQuizWrap, contHl].forEach(c => c && c.classList.add("hidden"));

            if (tab === 'list') {
                if (tabList) tabList.classList.add("active");
                if (contListWrap) contListWrap.classList.remove("hidden");
            } else if (tab === 'flash') {
                if (tabFlash) tabFlash.classList.add("active");
                if (contFlash) contFlash.classList.remove("hidden");
            } else if (tab === 'quiz') {
                if (tabQuiz) tabQuiz.classList.add("active");
                if (contQuizWrap) contQuizWrap.classList.remove("hidden");
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
        
        const dlBtn = document.getElementById("download-quiz-txt-btn");
        if (dlBtn) {
            dlBtn.classList.remove("hidden");
        }
    };
    
    // --- Download Functions ---
    document.addEventListener("click", (e) => {
        if (e.target.closest("#download-vocab-txt-btn")) {
            const vocabList = window.BOOK_JSON_VOCAB || [];
            if (vocabList.length === 0) return alert("No vocabulary to download.");
            let txt = `Vocabulary List\n==========================\n\n`;
            vocabList.forEach(item => {
                txt += `${item.word || item.term}: ${item.def || item.definition}\n\n`;
            });
            downloadTxt(txt, `vocabulary_chapter_${window.BOOK_METADATA?.chapterNum || 1}.txt`);
        }
        if (e.target.closest("#download-quiz-txt-btn")) {
            const questions = window.activeQuizData || [];
            const answers = window.selectedQuizAnswers || {};
            if (questions.length === 0) return;
            let txt = `Quiz Results\n==========================\n\n`;
            let score = 0;
            questions.forEach((q, idx) => {
                const userChoice = answers[idx];
                const isCorrect = userChoice === q.correctAnswer;
                if (isCorrect) score++;
                txt += `Q${idx + 1}: ${q.question}\n`;
                txt += `Your Answer: ${userChoice !== undefined && q.options ? q.options[userChoice] : 'No Answer'}\n`;
                txt += `Correct Answer: ${q.options ? q.options[q.correctAnswer] : ''}\n`;
                txt += `Result: ${isCorrect ? 'Correct' : 'Incorrect'}\n`;
                txt += `Explanation: ${q.explanation || 'N/A'}\n\n`;
            });
            const pct = Math.round((score / questions.length) * 100);
            txt += `Final Score: ${score} / ${questions.length} (${pct}%)\n`;
            downloadTxt(txt, `quiz_results_chapter_${window.BOOK_METADATA?.chapterNum || 1}.txt`);
        }
    });

    function downloadTxt(content, filename) {
        const blob = new Blob([content], { type: 'text/plain' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(a.href);
    }
