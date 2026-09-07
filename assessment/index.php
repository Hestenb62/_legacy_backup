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

<!-- START MENU (Shown after selecting a grade, before starting the quiz) -->
<div id="assessment-start-menu" class="assessment-container hidden" style="margin-top: 2rem; margin-bottom: 4rem;">
    <div class="assessment-quiz-card" style="max-width: 800px; margin: 0 auto; padding: 2.5rem; position: relative;">
        <!-- Background Decoration -->
        <div style="position: absolute; top: 0; right: 0; padding: 1rem; opacity: 0.05; pointer-events: none;">
            <i class="fas fa-clipboard-list" style="font-size: 8rem; color: var(--color-text-main);"></i>
        </div>
        
        <h2 class="assessment-hero-title" style="font-size: 2.25rem; text-align: center; margin-bottom: 1rem; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; font-family: 'Outfit', sans-serif; font-weight: 800;">
            Ready to Begin?
        </h2>
        <p style="text-align: center; margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto; color: var(--color-text-muted); line-height: 1.6;">
            Select how you would like to test your skills today. You can take a mixed Entrance Exam to evaluate your grade-level placement, or focus on a single subject.
        </p>
        
        <div class="assessment-card assessment-card-accent-top" style="border-color: var(--color-primary); padding: 2rem; margin-bottom: 2rem;">
            <div style="display: flex; flex-direction: column; gap: 1.5rem; justify-content: space-between;">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.75rem;">
                        <i class="fas fa-layer-group"></i> Comprehensive Diagnostic
                    </div>
                    <h3 class="assessment-card-title" style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.5rem;">Grade Placement Entrance Exam</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-text-muted); line-height: 1.6; max-width: 650px; margin: 0;">
                        A comprehensive multi-subject evaluation that tests knowledge across Math, Language Arts, Science, and Social Studies. Generates personalized lesson recommendations upon completion.
                    </p>
                </div>
                <div>
                    <button onclick="startAssessmentMode('All')" class="hero-nav-btn hero-nav-btn-primary" style="border: none; text-align: center; justify-content: center; padding: 0.85rem 2rem; border-radius: var(--radius-lg); font-weight: 700; cursor: pointer;">
                        <i class="fas fa-play" style="margin-right: 0.5rem;"></i> Start Entrance Exam
                    </button>
                </div>
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                <h3 style="font-size: 1.25rem; font-weight: 800; margin: 0; color: var(--color-text-main);">
                    <i class="fas fa-crosshairs" style="color: var(--color-secondary); margin-right: 0.5rem;"></i> Dedicated Subject Tests
                </h3>
                <span style="font-size: 0.8125rem; color: var(--color-text-muted);">Select a specific subject benchmark</span>
            </div>
            
            <div class="subject-test-grid">
                <!-- Math -->
                <div class="subject-test-card">
                    <div>
                        <div class="subject-test-card-header">
                            <div class="subject-test-card-icon" style="background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary);">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div>
                                <span style="font-size: 0.6875rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); letter-spacing: 0.05em;">CCSS.MATH & TEKS §111</span>
                                <h4 class="subject-test-card-title">Mathematics</h4>
                            </div>
                        </div>
                        <p class="subject-test-card-desc">Operations, algebraic thinking, fractions, numbers in base ten, and geometric concepts.</p>
                    </div>
                    <button onclick="startAssessmentMode('Math')" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.65rem 1.25rem; border-radius: var(--radius-md); font-size: 0.875rem; cursor: pointer;">
                        <i class="fas fa-play" style="margin-right: 0.5rem;"></i> Start Math Test
                    </button>
                </div>

                <!-- Language Arts -->
                <div class="subject-test-card">
                    <div>
                        <div class="subject-test-card-header">
                            <div class="subject-test-card-icon" style="background: color-mix(in srgb, #ec4899 15%, transparent); color: #ec4899;">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div>
                                <span style="font-size: 0.6875rem; font-weight: 800; text-transform: uppercase; color: #ec4899; letter-spacing: 0.05em;">CCSS.ELA & TEKS §110</span>
                                <h4 class="subject-test-card-title">Language Arts</h4>
                            </div>
                        </div>
                        <p class="subject-test-card-desc">Reading comprehension, literary analysis, grammar conventions, and textual vocabulary.</p>
                    </div>
                    <button onclick="startAssessmentMode('Language Arts')" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.65rem 1.25rem; border-radius: var(--radius-md); font-size: 0.875rem; cursor: pointer;">
                        <i class="fas fa-play" style="margin-right: 0.5rem;"></i> Start ELA Test
                    </button>
                </div>

                <!-- Science -->
                <div class="subject-test-card">
                    <div>
                        <div class="subject-test-card-header">
                            <div class="subject-test-card-icon" style="background: color-mix(in srgb, #10b981 15%, transparent); color: #10b981;">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div>
                                <span style="font-size: 0.6875rem; font-weight: 800; text-transform: uppercase; color: #10b981; letter-spacing: 0.05em;">NGSS & TEKS §112</span>
                                <h4 class="subject-test-card-title">Science</h4>
                            </div>
                        </div>
                        <p class="subject-test-card-desc">Physical sciences, ecosystems, earth and space systems, and scientific inquiry principles.</p>
                    </div>
                    <button onclick="startAssessmentMode('Science')" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.65rem 1.25rem; border-radius: var(--radius-md); font-size: 0.875rem; cursor: pointer;">
                        <i class="fas fa-play" style="margin-right: 0.5rem;"></i> Start Science Test
                    </button>
                </div>

                <!-- Social Studies -->
                <div class="subject-test-card">
                    <div>
                        <div class="subject-test-card-header">
                            <div class="subject-test-card-icon" style="background: color-mix(in srgb, #f59e0b 15%, transparent); color: #f59e0b;">
                                <i class="fas fa-globe-americas"></i>
                            </div>
                            <div>
                                <span style="font-size: 0.6875rem; font-weight: 800; text-transform: uppercase; color: #f59e0b; letter-spacing: 0.05em;">NCSS Strands & TEKS §113</span>
                                <h4 class="subject-test-card-title">Social Studies</h4>
                            </div>
                        </div>
                        <p class="subject-test-card-desc">History, geography, civic principles, community economics, and global cultures.</p>
                    </div>
                    <button onclick="startAssessmentMode('Social Studies')" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.65rem 1.25rem; border-radius: var(--radius-md); font-size: 0.875rem; cursor: pointer;">
                        <i class="fas fa-play" style="margin-right: 0.5rem;"></i> Start Social Studies Test
                    </button>
                </div>
            </div>
        </div>

        <!-- Additional Testing Modes (Fluency Sprint & Printable Worksheet) -->
        <div style="margin-top: 2rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
            <!-- 60-Second Fluency Sprint Mode -->
            <div class="assessment-card" style="padding: 1.5rem; border-top: 4px solid var(--color-accent); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.2rem 0.65rem; border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-accent) 15%, transparent); color: var(--color-accent); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.5rem;">
                        <i class="fas fa-bolt"></i> Speed Challenge
                    </div>
                    <h4 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">
                        60-Second Fluency Sprint
                    </h4>
                    <p style="font-size: 0.85rem; color: var(--color-text-muted); line-height: 1.5; margin: 0 0 1rem 0;">
                        Rapid-fire fluency sprint testing mental arithmetic and vocabulary under a 60-second timer. Auto-advances immediately on answer selection!
                    </p>
                </div>
                <button type="button" onclick="startFluencySprintMode()" class="hero-nav-btn hero-nav-btn-primary" style="width: 100%; justify-content: center; padding: 0.65rem 1rem; border-radius: var(--radius-md); font-size: 0.875rem; border: none; cursor: pointer;">
                    <i class="fas fa-stopwatch" style="margin-right: 0.5rem;"></i> Launch 60s Sprint
                </button>
            </div>

            <!-- Printable Worksheet & Teacher Key -->
            <div class="assessment-card" style="padding: 1.5rem; border-top: 4px solid var(--color-primary); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.2rem 0.65rem; border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.5rem;">
                        <i class="fas fa-file-alt"></i> Offline / Classroom
                    </div>
                    <h4 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">
                        Printable Worksheet & Answer Key
                    </h4>
                    <p style="font-size: 0.85rem; color: var(--color-text-muted); line-height: 1.5; margin: 0 0 1rem 0;">
                        Generate a printable PDF test worksheet with student name headers, multiple-choice bubbles, standard codes, and an educator answer key.
                    </p>
                </div>
                <button type="button" onclick="openPrintableWorksheetModal()" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.65rem 1rem; border-radius: var(--radius-md); font-size: 0.875rem; cursor: pointer;">
                    <i class="fas fa-print" style="margin-right: 0.5rem;"></i> Generate Printable Worksheet
                </button>
            </div>
        </div>
    </div>
</div>

<div id="quiz-container" class="assessment-container">
    <!-- Hidden inputs for JavaScript -->
    <input type="hidden" id="force-grade" value="" />
    <input type="hidden" id="grade-key" value="" />

    <!-- TARGETED STANDARD TEST BANNER (Shown when visiting /assessment/#standard=...) -->
    <div id="targeted-standard-banner" class="targeted-standard-banner hidden" style="margin-bottom: 1.75rem;">
        <div class="targeted-standard-content">
            <div id="targeted-standard-icon" class="targeted-standard-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <div>
                <div class="targeted-standard-pill-row">
                    <span class="targeted-standard-pill"><i class="fas fa-crosshairs" style="margin-right: 0.35rem;"></i> Targeted Standard Evaluation</span>
                    <span id="targeted-standard-subject-pill" class="targeted-standard-pill pill-subtle">Core Subject</span>
                </div>
                <h3 id="targeted-standard-title" class="targeted-standard-title">Standard Check</h3>
                <p id="targeted-standard-desc" class="targeted-standard-desc">Assessing student proficiency and conceptual mastery for this specific learning benchmark.</p>
            </div>
        </div>
        <button type="button" class="targeted-standard-exit-btn" onclick="exitStandardTargetedTest()">
            <i class="fas fa-arrow-left"></i> Exit to All Assessments
        </button>
    </div>

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
                <div id="hintText" class="hint-box hidden">
                    <strong>Hint:</strong> <span id="hint-content"></span>
                </div>
            </div>
            
            <!-- Diagnostic Recommendations Card (Hidden initially) -->
            <div id="diagnostic-container" class="assessment-card assessment-card-accent-top" style="display: none; margin-top: 2rem; border-color: var(--color-success);">
                <h3 class="assessment-card-title" style="margin-bottom: 0.5rem;">
                    <i class="fas fa-lightbulb" style="color: var(--color-success);"></i> Diagnostic Recommendations
                </h3>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: 1.5rem; line-height: 1.6;">
                    Based on your Entrance Exam performance, we suggest focusing on the following curriculum levels to strengthen your skills:
                </p>
                <div id="diagnostic-list" style="display: flex; flex-direction: column; gap: 1rem;">
                    <!-- Suggested lessons injected by JS -->
                </div>
            </div>
            
            <!-- Review Mode Container (Hidden initially) -->
            <div id="review-container" class="assessment-card" style="display: none; margin-top: 2rem;">
                <div class="review-header-row">
                    <h3 class="assessment-card-title" style="margin: 0;">
                        <i class="fas fa-clipboard-list" style="color: var(--color-primary);"></i> Question-by-Question Review & Explanations
                    </h3>
                    <div class="review-filter-pills" id="review-filter-pills" role="tablist">
                        <button type="button" class="review-pill-btn active" data-filter="all" onclick="filterReviewItems('all')">
                            All Questions <span class="pill-count" id="review-count-all">0</span>
                        </button>
                        <button type="button" class="review-pill-btn text-success" data-filter="correct" onclick="filterReviewItems('correct')">
                            <i class="fas fa-check-circle"></i> Correct <span class="pill-count" id="review-count-correct">0</span>
                        </button>
                        <button type="button" class="review-pill-btn text-error" data-filter="incorrect" onclick="filterReviewItems('incorrect')">
                            <i class="fas fa-times-circle"></i> Missed <span class="pill-count" id="review-count-incorrect">0</span>
                        </button>
                    </div>
                </div>
                <div id="review-content" class="review-content-list">
                    <!-- Review items injected by JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Diagnostic Mastery Report Card Modal -->
<div id="mastery-report-modal" class="mastery-report-modal" role="dialog" aria-modal="true" aria-labelledby="report-modal-title" style="display: none;">
    <div class="mastery-report-backdrop" onclick="closeMasteryReportCard()"></div>
    <div class="mastery-report-dialog card-surface">
        <div class="mastery-report-toolbar no-print">
            <div class="toolbar-title" id="report-modal-title">
                <i class="fas fa-file-invoice" style="color: var(--color-primary);"></i> Diagnostic Mastery Report Card
            </div>
            <div class="toolbar-actions">
                <button type="button" class="hero-nav-btn hero-nav-btn-primary" onclick="window.print()" style="padding: 0.5rem 1.25rem; font-size: 0.875rem;">
                    <i class="fas fa-print"></i> Print / Save as PDF
                </button>
                <button type="button" class="report-modal-close" onclick="closeMasteryReportCard()" aria-label="Close Report">&times;</button>
            </div>
        </div>

        <div id="mastery-report-printable-area" class="mastery-printable-document">
            <!-- Dynamically populated report content -->
        </div>
    </div>
</div>

<!-- Printable Quiz Worksheet & Teacher Answer Key Modal -->
<div id="quiz-worksheet-modal" class="mastery-report-modal" role="dialog" aria-modal="true" aria-labelledby="worksheet-modal-title" style="display: none;">
    <div class="mastery-report-backdrop" onclick="closePrintableWorksheetModal()"></div>
    <div class="mastery-report-dialog card-surface">
        <div class="mastery-report-toolbar no-print">
            <div class="toolbar-title" id="worksheet-modal-title">
                <i class="fas fa-print" style="color: var(--color-primary);"></i> Printable Quiz Worksheet & Answer Key
            </div>
            <div class="toolbar-actions" style="display: flex; align-items: center; gap: 0.75rem;">
                <label style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.8125rem; font-weight: 700; cursor: pointer; user-select: none; color: var(--color-text-main);">
                    <input type="checkbox" id="worksheet-include-key" checked onchange="toggleWorksheetAnswerKey(this.checked)">
                    <span>Include Educator Answer Key</span>
                </label>
                <button type="button" class="hero-nav-btn hero-nav-btn-primary" onclick="window.print()" style="padding: 0.5rem 1.25rem; font-size: 0.875rem;">
                    <i class="fas fa-print"></i> Print Worksheet
                </button>
                <button type="button" class="report-modal-close" onclick="closePrintableWorksheetModal()" aria-label="Close Worksheet">&times;</button>
            </div>
        </div>

        <div id="quiz-worksheet-printable-area" class="mastery-printable-document worksheet-printable-sheet">
            <!-- Dynamically populated worksheet content -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="/assets/js/assessment-p-12.js"></script>
<script src="/assets/js/assessment-ap.js"></script>
<script src="/assets/js/assessment-main.js?v=1.3"></script>

<?php include '../src/footer.php'; ?>