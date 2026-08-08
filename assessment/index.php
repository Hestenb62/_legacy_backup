<?php
$pageTitle = "Assessment | Hesten's Learning";
include '../src/header.php';
?>

<!-- Link Assessment Page Specific Stylesheet -->
<link rel="stylesheet" href="/assets/css/pages/assessment.css?v=1.2">

<!-- Assessment Selection View (Hidden by default, shown if no grade selected) -->
<div id="assessment-selection" class="assessment-select-section hidden">
    <div class="assessment-select-header">
        <h1 class="assessment-select-title">
            Select Your Assessment Level
        </h1>
        <p class="assessment-select-subtitle">
            Choose a grade level to begin your personalized knowledge check. We'll track your progress as you go.
        </p>
    </div>

    <div id="grade-selection-grid" class="grade-selection-grid">
        <!-- Grid items injected by JS -->
    </div>
</div>

<!-- QUIZ CONTENT (Hidden if no grade selected) -->
<header id="quiz-header" class="assessment-hero-header hidden">
    <!-- Abstract Background Shapes -->
    <div class="assessment-hero-decorations">
        <i class="fas fa-tasks" style="top: 2.5rem; left: 2.5rem; font-size: 8rem;"></i>
        <i class="fas fa-check-circle" style="bottom: 5rem; right: 2.5rem; font-size: 14rem;"></i>
    </div>

    <div style="position: relative; z-index: 10;">
        <div class="assessment-badge-tag">
            <i class="fas fa-star" style="color: var(--color-warning);"></i> Assessment Mode
        </div>
        <h1 class="assessment-hero-title">
            <span id="header-grade-name">Loading...</span> Knowledge Check
        </h1>
        <p class="assessment-hero-desc">
            Test your skills across all major subjects to earn badges and track your growth.
        </p>

        <!-- Navigation Group -->
        <div class="assessment-hero-nav">
            <!-- Previous Button -->
            <a id="btn-prev" href="#" class="hero-nav-btn hero-nav-btn-outline hidden">
                <i class="fas fa-chevron-left"></i>
                <span id="btn-prev-label">Previous</span>
            </a>

            <!-- Spacer -->
            <div id="spacer-prev" class="hidden" style="width: 8rem;"></div>

            <!-- Main Curriculum Link -->
            <a id="link-curriculum" href="#" class="hero-nav-btn hero-nav-btn-primary">
                <i class="fas fa-th"></i> Return to Curriculum
            </a>

            <!-- Next Button -->
            <a id="btn-next" href="#" class="hero-nav-btn hero-nav-btn-outline hidden">
                <span id="btn-next-label">Next</span>
                <i class="fas fa-chevron-right"></i>
            </a>

            <!-- Spacer -->
            <div id="spacer-next" class="hidden" style="width: 8rem;"></div>
        </div>
    </div>
</header>

<div id="quiz-container" class="assessment-container">
    <!-- Hidden inputs for JavaScript -->
    <input type="hidden" id="force-grade" value="" />
    <input type="hidden" id="grade-key" value="" />

    <div class="assessment-grid">
        <!-- Sidebar -->
        <div class="assessment-sidebar">
            <!-- Stats -->
            <div class="assessment-card assessment-card-accent-top">
                <h3 class="assessment-card-title">
                    <i class="fas fa-chart-pie" style="color: var(--color-primary);"></i> Your Progress
                </h3>
                <div style="margin-top: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--color-primary); background-color: color-mix(in srgb, var(--color-primary) 10%, transparent); padding: 0.25rem 0.75rem; border-radius: var(--radius-full);">
                            Current Score
                        </span>
                        <span class="progress-bar-text" style="font-size: 1.125rem; font-weight: 700; color: var(--color-primary);">
                            0%
                        </span>
                    </div>
                    <div class="assessment-progress-wrapper">
                        <div style="width: 0%;" class="assessment-progress-bar progress-bar-animated"></div>
                    </div>
                </div>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); font-style: italic; display: flex; align-items: center; gap: 0.5rem; margin-top: 1rem;">
                    <i class="fas fa-info-circle"></i> Complete questions to earn badges!
                </p>
            </div>

            <!-- Subject Filter -->
            <div class="assessment-card">
                <h3 class="assessment-card-title">
                    <i class="fas fa-filter" style="color: var(--color-secondary);"></i> Focus Area
                </h3>
                <div class="focus-filter-list">
                    <button onclick="filterQuestions('All')" class="focus-filter-btn">
                        <i class="fas fa-layer-group" style="opacity: 0.7;"></i>
                        Mix All Subjects
                    </button>
                    <button onclick="filterQuestions('Math')" class="focus-filter-btn">
                        <i class="fas fa-calculator" style="color: var(--color-primary);"></i>
                        Math
                    </button>
                    <button onclick="filterQuestions('Language Arts')" class="focus-filter-btn">
                        <i class="fas fa-book-reader" style="color: #ec4899;"></i>
                        Language Arts
                    </button>
                    <button onclick="filterQuestions('Science')" class="focus-filter-btn">
                        <i class="fas fa-flask" style="color: #10b981;"></i>
                        Science
                    </button>
                    <button onclick="filterQuestions('Social Studies')" class="focus-filter-btn">
                        <i class="fas fa-globe-americas" style="color: #f59e0b;"></i>
                        Social Studies
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Quiz Area -->
        <div class="assessment-main-content">
            <div class="assessment-quiz-card">
                <!-- Background Decoration -->
                <div style="position: absolute; top: 0; right: 0; padding: 1rem; opacity: 0.05; pointer-events: none;">
                    <i class="fas fa-puzzle-piece" style="font-size: 8rem; color: var(--color-text-main);"></i>
                </div>

                <div class="assessment-quiz-header">
                    <div>
                        <span class="question-counter-label">Question</span>
                        <div id="question-count" class="question-counter-big">
                            1<span class="question-counter-total">/10</span>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 0.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <button id="sound-toggle-btn" style="color: var(--color-text-muted); background: transparent; border: none; cursor: pointer; transition: color 0.2s;" title="Toggle Sound">
                                <i class="fas fa-volume-up" style="font-size: 1.25rem;"></i>
                            </button>
                            <div style="display: flex; align-items: center; background-color: var(--color-bg-base); border-radius: var(--radius-md); padding: 0.25rem; border: 1px solid var(--color-border);">
                                <button id="timer-toggle-btn" style="background: transparent; border: none; padding: 0 0.5rem; color: var(--color-text-muted); cursor: pointer;" title="Hide/Show Timer">
                                    <i class="fas fa-eye" style="font-size: 0.875rem;"></i>
                                </button>
                                <span id="session-timer" style="font-family: monospace; font-size: 1.125rem; font-weight: 700; color: var(--color-primary); padding: 0 0.5rem; min-width: 70px; text-align: center;">
                                    00:00
                                </span>
                            </div>
                        </div>
                        <span id="streak-counter" style="padding: 0.25rem 0.75rem; background-color: color-mix(in srgb, var(--color-warning) 10%, transparent); color: var(--color-warning); border-radius: var(--radius-full); font-size: 0.875rem; font-weight: 700; display: none;">
                            🔥 0 streak
                        </span>
                    </div>
                </div>

                <div style="flex-grow: 1; margin-bottom: 2rem;">
                    <h2 id="question" style="font-size: 1.5rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 2rem; line-height: 1.4; min-height: 4rem;">
                        Loading Question...
                    </h2>

                    <div id="options" class="options-grid">
                        <!-- Options injected by JS -->
                    </div>
                </div>

                <!-- Feedback Area -->
                <div id="feedback-area" class="feedback-box">
                    <div style="display: flex; align-items: start; gap: 0.75rem;">
                        <div id="feedback-icon" style="font-size: 1.5rem;"></div>
                        <div>
                            <h4 id="feedback-title" style="font-weight: 700; font-size: 1.125rem; margin: 0 0 0.25rem 0;"></h4>
                            <p id="feedback" style="font-size: 0.875rem; margin: 0; opacity: 0.9;"></p>
                        </div>
                    </div>
                </div>

                <div class="assessment-card-actions">
                    <div style="display: flex; gap: 0.5rem;">
                        <button onclick="showHint()" style="color: var(--color-secondary); background-color: color-mix(in srgb, var(--color-secondary) 10%, transparent); border: none; padding: 0.5rem 1rem; border-radius: var(--radius-md); font-weight: 700; font-size: 0.875rem; cursor: pointer; transition: background 0.2s; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="far fa-lightbulb"></i> Need a Hint?
                        </button>
                        <button id="skip-btn" onclick="skipQuestion()" style="color: var(--color-warning); background-color: color-mix(in srgb, var(--color-warning) 10%, transparent); border: none; padding: 0.5rem 1rem; border-radius: var(--radius-md); font-weight: 700; font-size: 0.875rem; cursor: pointer; transition: background 0.2s; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-forward"></i> Skip
                        </button>
                    </div>

                    <button id="next-btn" onclick="nextQuestionAdapter()" class="hero-nav-btn-primary hidden" style="border: none; padding: 0.75rem 2rem; border-radius: var(--radius-lg); font-weight: 700; font-size: 1rem; cursor: pointer;">
                        Next Question <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                    </button>
                </div>

                <!-- Hint Modal (Inline) -->
                <div id="hintText" class="hint-box" style="display: none;">
                    <strong>Hint:</strong> <span id="hint-content"></span>
                </div>
            </div>
            
            <!-- Review Mode Container (Hidden initially) -->
            <div id="review-container" class="assessment-card" style="display: none; margin-top: 2rem;">
                <h3 class="assessment-card-title">
                    <i class="fas fa-clipboard-list" style="color: var(--color-primary);"></i> Assessment Review
                </h3>
                <div id="review-content" style="display: flex; flex-direction: column; gap: 1rem; max-height: 500px; overflow-y: auto; padding-right: 0.5rem;">
                    <!-- Review items injected by JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="/assets/js/p-12.js"></script>
<script src="/assets/js/AP.js"></script>
<script src="/assets/js/assessment-page.js?v=1.2"></script>

<?php include '../src/footer.php'; ?>