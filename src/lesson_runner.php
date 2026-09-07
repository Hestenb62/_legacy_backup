<?php
/**
 * Hesten's Learning - Universal Lesson Runner
 * Provides a sticky lesson navigation dock, status sync, CCSS alignment,
 * and an interactive "Check Understanding" modal with real-time mastery tracking.
 */

if (!isset($lessonId)) {
    $lessonId = basename($_SERVER['PHP_SELF'], '.php');
}
if (!isset($lessonCode)) {
    $lessonCode = strtoupper(str_replace('-', '.', $lessonId));
}
if (!isset($lessonTitle)) {
    $lessonTitle = $pageTitle ?? 'Curriculum Lesson';
}
if (!isset($lessonStandard)) {
    $lessonStandard = 'CCSS.MATH.CONTENT.HSF.IF.B.4';
}
if (!isset($levelId)) {
    $levelId = 'k';
}
if (!isset($levelUrl)) {
    $levelUrl = '../levels/' . $levelId . '.php';
}
if (!isset($prevLessonUrl)) {
    $prevLessonUrl = '';
}
if (!isset($nextLessonUrl)) {
    $nextLessonUrl = '';
}
if (!isset($practiceQuestions) || empty($practiceQuestions)) {
    $practiceQuestions = [
        [
            'question' => 'How does understanding this lesson\'s core concept help you analyze real-world patterns?',
            'options' => [
                'It lets us model rate of change and predict outputs accurately',
                'It only applies to theoretical problems with no practical use',
                'It replaces the need to identify variables or units',
                'It means graphs always remain in a straight horizontal line'
            ],
            'correct' => 0,
            'explanation' => 'Mathematical and analytical models allow us to quantify rates of change, identify key constraints, and predict real-world outcomes reliably.'
        ]
    ];
}
?>

<!-- Lesson Runner Dock -->
<div id="lesson-runner-dock" class="lesson-runner-dock" role="region" aria-label="Lesson Controls and Practice Bar">
    <div class="runner-dock-container">
        <!-- Left: Grade Curriculum & Standard Alignment -->
        <div class="runner-dock-left">
            <a href="<?= htmlspecialchars($levelUrl) ?>" class="runner-btn runner-btn-subtle" title="Back to Grade Curriculum">
                <i class="fas fa-th-large"></i>
                <span class="runner-btn-text">Curriculum</span>
            </a>
            <div class="runner-lesson-meta">
                <span class="runner-lesson-code"><?= htmlspecialchars($lessonCode) ?></span>
                <a href="/assessment/#standard=<?= urlencode($lessonStandard) ?>" class="runner-standard-chip" title="Test standard <?= htmlspecialchars($lessonStandard) ?> on the Assessment Engine">
                    <i class="fas fa-bullseye"></i> <?= htmlspecialchars($lessonStandard) ?>
                </a>
            </div>
        </div>

        <!-- Center: Interactive Check Understanding & Assessment -->
        <div class="runner-dock-center">
            <button type="button" class="runner-btn runner-btn-practice" onclick="openLessonPracticeModal()" title="Take a quick 2-minute practice check">
                <i class="fas fa-lightbulb"></i>
                <span>Check Understanding</span>
            </button>
            <a href="/assessment/#standard=<?= urlencode($lessonStandard) ?>" class="runner-btn runner-btn-assess" title="Take full standard quiz on assessment engine">
                <i class="fas fa-clipboard-check"></i>
                <span class="runner-btn-text">Standard Quiz</span>
            </a>
        </div>

        <!-- Right: Lesson Completion Toggle & Sequential Nav -->
        <div class="runner-dock-right">
            <button type="button" id="runner-bookmark-btn" class="runner-btn runner-btn-subtle runner-btn-bookmark" onclick="toggleRunnerLessonBookmark()" title="Bookmark this lesson" aria-label="Bookmark this lesson">
                <i class="far fa-bookmark" id="runner-bookmark-icon"></i>
                <span id="runner-bookmark-text">Save</span>
            </button>
            <button type="button" id="runner-toggle-complete-btn" class="runner-btn runner-btn-toggle" onclick="toggleRunnerComplete()" aria-label="Mark lesson as complete">
                <i class="fas fa-check" id="runner-complete-icon"></i>
                <span id="runner-complete-text">Mark Complete</span>
            </button>
            <div class="runner-nav-group">
                <?php if (!empty($prevLessonUrl)): ?>
                    <a href="<?= htmlspecialchars($prevLessonUrl) ?>" class="runner-btn runner-btn-nav" title="Previous Lesson" aria-label="Previous Lesson">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                <?php endif; ?>
                <?php if (!empty($nextLessonUrl)): ?>
                    <a href="<?= htmlspecialchars($nextLessonUrl) ?>" class="runner-btn runner-btn-nav runner-btn-next" title="Next Lesson" aria-label="Next Lesson">
                        <span>Next</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Interactive "Check Understanding" Practice Modal -->
<div id="lesson-practice-modal" class="lesson-practice-modal" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="practice-modal-title">
    <div class="practice-modal-backdrop" onclick="closeLessonPracticeModal()"></div>
    <div class="practice-modal-card">
        <div class="practice-modal-header">
            <div>
                <span class="practice-badge">
                    <i class="fas fa-bullseye"></i> Aligned Standard: <?= htmlspecialchars($lessonStandard) ?>
                </span>
                <h3 id="practice-modal-title" class="practice-modal-title">Check Understanding</h3>
                <p class="practice-modal-subtitle"><?= htmlspecialchars($lessonTitle) ?></p>
            </div>
            <button type="button" class="practice-modal-close" onclick="closeLessonPracticeModal()" aria-label="Close practice modal">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="practice-modal-body" id="practice-questions-container">
            <!-- Questions dynamically generated by JavaScript -->
        </div>

        <div class="practice-modal-footer">
            <div id="practice-score-summary" class="practice-score-summary">
                Answer each question to check your mastery.
            </div>
            <div class="practice-footer-actions">
                <button type="button" class="runner-btn runner-btn-subtle" onclick="closeLessonPracticeModal()">Close</button>
                <a href="/assessment/#standard=<?= urlencode($lessonStandard) ?>" class="runner-btn runner-btn-assess">
                    <i class="fas fa-external-link-alt"></i> Full Assessment
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const LESSON_ID = <?= json_encode($lessonId) ?>;
    const LEVEL_ID = <?= json_encode($levelId) ?>;
    const STANDARD_CODE = <?= json_encode($lessonStandard) ?>;
    const PRACTICE_QUESTIONS = <?= json_encode($practiceQuestions) ?>;

    let userAnswers = {};

    function initRunner() {
        // 1. Sync completion status from localStorage
        try {
            const rawProgress = localStorage.getItem(`hl_progress_${LEVEL_ID}`);
            const completedLessons = rawProgress ? JSON.parse(rawProgress) : [];
            updateCompletionButton(completedLessons.includes(LESSON_ID));
        } catch (e) {
            console.warn("Could not load lesson completion:", e);
        }

        // 2. Pre-render practice questions
        renderPracticeQuestions();

        // 3. Sync bookmark status
        updateBookmarkButton();

        // 4. Ensure confetti helper is loaded
        if (typeof confetti === 'undefined') {
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js';
            document.head.appendChild(s);
        }
    }

    function updateCompletionButton(isCompleted) {
        const btn = document.getElementById('runner-toggle-complete-btn');
        const text = document.getElementById('runner-complete-text');
        const icon = document.getElementById('runner-complete-icon');
        if (!btn || !text || !icon) return;

        if (isCompleted) {
            btn.classList.add('completed');
            text.textContent = 'Completed ✓';
            icon.className = 'fas fa-check-circle';
        } else {
            btn.classList.remove('completed');
            text.textContent = 'Mark Complete';
            icon.className = 'fas fa-check';
        }
    }

    function toggleRunnerComplete() {
        let completedLessons = [];
        try {
            const rawProgress = localStorage.getItem(`hl_progress_${LEVEL_ID}`);
            if (rawProgress) completedLessons = JSON.parse(rawProgress);
        } catch (e) {}

        const idx = completedLessons.indexOf(LESSON_ID);
        let nowComplete = false;
        if (idx > -1) {
            completedLessons.splice(idx, 1);
            nowComplete = false;
        } else {
            completedLessons.push(LESSON_ID);
            nowComplete = true;
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 80,
                    spread: 60,
                    origin: { y: 0.85 }
                });
            }
        }

        try {
            localStorage.setItem(`hl_progress_${LEVEL_ID}`, JSON.stringify(completedLessons));
        } catch (e) {}

        updateCompletionButton(nowComplete);
    }

    function openLessonPracticeModal() {
        const modal = document.getElementById('lesson-practice-modal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.classList.add('modal-open');
        }
    }

    function closeLessonPracticeModal() {
        const modal = document.getElementById('lesson-practice-modal');
        if (modal) {
            modal.style.display = 'none';
            document.body.classList.remove('modal-open');
        }
    }

    function renderPracticeQuestions() {
        const container = document.getElementById('practice-questions-container');
        if (!container || !PRACTICE_QUESTIONS || PRACTICE_QUESTIONS.length === 0) return;

        const letters = ['A', 'B', 'C', 'D'];
        let html = '';

        PRACTICE_QUESTIONS.forEach((q, qIdx) => {
            html += `
                <div class="practice-question-block" id="practice-q-${qIdx}">
                    <div class="practice-q-header">
                        <span class="practice-q-number">Question ${qIdx + 1} of ${PRACTICE_QUESTIONS.length}</span>
                    </div>
                    <div class="practice-q-text">${q.question}</div>
                    <div class="practice-options-grid">
            `;

            q.options.forEach((opt, optIdx) => {
                html += `
                    <button type="button" class="practice-opt-btn" onclick="window.__hlSelectPracticeOption(${qIdx}, ${optIdx})" id="practice-opt-${qIdx}-${optIdx}">
                        <span class="practice-opt-letter">${letters[optIdx]}</span>
                        <span class="practice-opt-text">${opt}</span>
                    </button>
                `;
            });

            html += `
                    </div>
                    <div class="practice-explanation-box" id="practice-exp-${qIdx}" style="display: none;">
                        <div class="practice-exp-title"><i class="fas fa-info-circle"></i> Explanation</div>
                        <div class="practice-exp-text">${q.explanation || 'Step-by-step reasoning completed.'}</div>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    window.__hlSelectPracticeOption = function(qIdx, optIdx) {
        if (userAnswers[qIdx] !== undefined) return; // Already answered

        userAnswers[qIdx] = optIdx;
        const qData = PRACTICE_QUESTIONS[qIdx];
        const isCorrect = (optIdx === qData.correct);

        // Highlight options
        qData.options.forEach((_, idx) => {
            const btn = document.getElementById(`practice-opt-${qIdx}-${idx}`);
            if (!btn) return;
            btn.disabled = true;
            if (idx === qData.correct) {
                btn.classList.add('correct');
            } else if (idx === optIdx && !isCorrect) {
                btn.classList.add('incorrect');
            }
        });

        // Show explanation
        const expBox = document.getElementById(`practice-exp-${qIdx}`);
        if (expBox) {
            expBox.style.display = 'block';
            expBox.classList.add(isCorrect ? 'exp-correct' : 'exp-incorrect');
        }

        // Check if all answered
        checkAllPracticeCompleted();
    };

    function checkAllPracticeCompleted() {
        const total = PRACTICE_QUESTIONS.length;
        const answeredCount = Object.keys(userAnswers).length;
        if (answeredCount < total) return;

        let correctCount = 0;
        PRACTICE_QUESTIONS.forEach((q, idx) => {
            if (userAnswers[idx] === q.correct) correctCount++;
        });

        const pct = Math.round((correctCount / total) * 100);
        const summary = document.getElementById('practice-score-summary');
        if (summary) {
            summary.innerHTML = `
                <span class="practice-result-pill ${pct >= 80 ? 'result-mastered' : (pct >= 60 ? 'result-proficient' : 'result-developing')}">
                    <i class="fas ${pct >= 80 ? 'fa-award' : (pct >= 60 ? 'fa-chart-line' : 'fa-redo')}"></i>
                    Score: ${correctCount}/${total} (${pct}%)
                </span>
                <span class="practice-result-desc">${pct >= 80 ? 'Mastery demonstrated! Awesome work.' : (pct >= 60 ? 'Good practice! Keep refining your skills.' : 'Review the steps above and try again.')}</span>
            `;
        }

        // Auto-save into hesten_standards_mastery
        try {
            let mastery = {};
            const raw = localStorage.getItem('hesten_standards_mastery');
            if (raw) mastery = JSON.parse(raw);

            const existing = mastery[STANDARD_CODE] || {
                code: STANDARD_CODE,
                attempts: 0,
                bestScore: 0,
                history: []
            };

            existing.attempts = (existing.attempts || 0) + 1;
            existing.latestScore = pct;
            existing.bestScore = Math.max(existing.bestScore || 0, pct);
            existing.percentage = existing.bestScore;
            existing.status = existing.bestScore >= 80 ? 'mastered' : (existing.bestScore >= 60 ? 'proficient' : 'developing');
            existing.lastTested = new Date().toISOString();
            mastery[STANDARD_CODE] = existing;

            localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));
        } catch (e) {
            console.warn("Could not save standard mastery:", e);
        }

        // Auto-mark lesson complete if >= 80%
        if (pct >= 80) {
            let completedLessons = [];
            try {
                const rawProgress = localStorage.getItem(`hl_progress_${LEVEL_ID}`);
                if (rawProgress) completedLessons = JSON.parse(rawProgress);
                if (!completedLessons.includes(LESSON_ID)) {
                    completedLessons.push(LESSON_ID);
                    localStorage.setItem(`hl_progress_${LEVEL_ID}`, JSON.stringify(completedLessons));
                    updateCompletionButton(true);
                }
            } catch (e) {}

            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: { y: 0.6 }
                });
            }
        }
    }

    function updateBookmarkButton() {
        const btn = document.getElementById('runner-bookmark-btn');
        const text = document.getElementById('runner-bookmark-text');
        const icon = document.getElementById('runner-bookmark-icon');
        if (!btn || !text || !icon) return;

        const isBm = window.UniversalBookmarks ? window.UniversalBookmarks.isBookmarked(LESSON_ID) : false;
        if (isBm) {
            btn.classList.add('bookmarked');
            text.textContent = 'Saved';
            icon.className = 'fas fa-bookmark';
            btn.title = 'Saved to your Bookmarks';
        } else {
            btn.classList.remove('bookmarked');
            text.textContent = 'Save';
            icon.className = 'far fa-bookmark';
            btn.title = 'Bookmark this lesson';
        }
    }

    function toggleRunnerLessonBookmark() {
        if (!window.UniversalBookmarks) return;
        const nowBookmarked = window.UniversalBookmarks.toggle({
            id: LESSON_ID,
            title: LESSON_TITLE,
            type: 'lesson',
            url: window.location.pathname,
            category: LEVEL_ID.toUpperCase() + ' Grade',
            icon: 'fa-graduation-cap'
        });
        updateBookmarkButton();
        if (typeof window.announceA11y === 'function') {
            window.announceA11y(nowBookmarked ? 'Lesson saved to bookmarks' : 'Lesson removed from bookmarks');
        }
    }

    window.addEventListener('bookmarks-updated', updateBookmarkButton);

    // Expose globals
    window.openLessonPracticeModal = openLessonPracticeModal;
    window.closeLessonPracticeModal = closeLessonPracticeModal;
    window.toggleRunnerComplete = toggleRunnerComplete;
    window.toggleRunnerLessonBookmark = toggleRunnerLessonBookmark;

    // Run on load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initRunner);
    } else {
        initRunner();
    }
})();
</script>
