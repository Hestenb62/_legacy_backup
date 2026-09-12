<?php
$pageTitle = "Teacher & Homeschool Suite - Hesten's Learning";
$pageDescription = "Interactive assignment link builder, 36-week curriculum pacing guides, and standards-aligned classroom dispatchers for educators and homeschool families.";
$pageKeywords = "teacher resources, lesson plans, assignment builder, pacing guide, common core, ccss, ngss, homeschool syllabus";
include '../src/header.php';
?>

<!-- Teacher Suite Page Stylesheet -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/teachers.css') ?>">
<link rel="stylesheet" href="<?= assetVersion('/assets/css/teacher/mastery-heatmap.css') ?>">

<main class="flex-grow" id="main-content">

    <!-- Print-Only Header (Appears only when printing pacing guides for physical binders/portfolios) -->
    <div class="print-header-banner" style="display: none;">
        <h1>Hesten's Learning • 36-Week Curriculum Pacing Syllabus</h1>
        <p>Standards-Aligned Academic Scope & Sequence (CCSS & NGSS Aligned) • hestenslearning.com</p>
    </div>

    <!-- Page Hero Banner -->
    <div class="page-hero">
        <div class="page-hero-bg">
            <i class="fas fa-chalkboard-teacher absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
            <i class="fas fa-apple-alt absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="page-hero-badge">
                <i class="fas fa-graduation-cap"></i> Educator & Homeschool Suite
            </span>
            <h1 class="page-hero-title">
                Teacher Toolkit & Pacing Guide
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Generate direct student assignment links, dispatch standard-targeted assessments, and navigate structured 36-week curriculum plans.
            </p>

            <div class="teacher-hero-stats no-print">
                <span class="teacher-hero-pill">
                    <i class="fas fa-link"></i> Direct Assignment Builder
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-bolt"></i> 60s Fluency Sprint Dispatcher
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-calendar-alt"></i> 36-Week Scope & Sequence
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-print"></i> Printable Binder Worksheets
                </span>
            </div>
        </div>
    </div>

    <!-- Main Workspace Container -->
    <div class="teacher-page-container">

        <!-- Navigation Tabs Bar -->
        <div class="teacher-tab-nav no-print" role="tablist" aria-label="Teacher Hub Navigation">
            <button type="button" class="teacher-tab-btn active" data-tab="tab-builder" role="tab" aria-selected="true">
                <i class="fas fa-magic"></i> Assignment Link Builder
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-pacing" role="tab" aria-selected="false">
                <i class="fas fa-calendar-check"></i> 36-Week Pacing Guide
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-lesson-plan" role="tab" aria-selected="false">
                <i class="fas fa-file-alt"></i> Lesson Plan & Quiz Customizer
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-roster" role="tab" aria-selected="false">
                <i class="fas fa-users"></i> Class Roster & Progress
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-resources" role="tab" aria-selected="false">
                <i class="fas fa-toolbox"></i> Educator Resources & Keys
            </button>
        </div>

        <!-- ================================================================= -->
        <!-- TAB 1: INTERACTIVE ASSIGNMENT LINK BUILDER                        -->
        <!-- ================================================================= -->
        <section id="tab-builder" class="teacher-tab-panel active" role="tabpanel" aria-label="Assignment Link Builder">
            <div class="teacher-card builder-card-interactive">
                <div class="teacher-card-header">
                    <div>
                        <h2 class="teacher-card-title">
                            <i class="fas fa-paper-plane text-indigo-600"></i> Standard Assignment URL Generator
                        </h2>
                        <p class="teacher-card-subtitle">
                            Configure standard-targeted practice sessions and copy one-click links directly into Google Classroom, Canvas, or student messages.
                        </p>
                    </div>
                </div>

                <!-- Builder Form -->
                <div class="builder-form-grid">
                    <!-- Grade Select -->
                    <div class="builder-field-group">
                        <label class="builder-field-label" for="builder-grade-select">
                            <i class="fas fa-graduation-cap"></i> Grade Level
                        </label>
                        <select id="builder-grade-select" class="builder-select">
                            <option value="pre-k">Pre-K (Level A)</option>
                            <option value="k">Kindergarten (Level B)</option>
                            <option value="1">1st Grade (Level C)</option>
                            <option value="2">2nd Grade (Level D)</option>
                            <option value="3" selected>3rd Grade (Level E)</option>
                            <option value="4">4th Grade (Level F)</option>
                            <option value="5">5th Grade (Level G)</option>
                            <option value="6">6th Grade (Level H)</option>
                            <option value="7">7th Grade (Level I)</option>
                            <option value="8">8th Grade (Level J)</option>
                            <option value="hs">High School (Level K-N)</option>
                        </select>
                    </div>

                    <!-- Subject Select -->
                    <div class="builder-field-group">
                        <label class="builder-field-label" for="builder-subject-select">
                            <i class="fas fa-book"></i> Subject Area
                        </label>
                        <select id="builder-subject-select" class="builder-select">
                            <option value="Math" selected>Mathematics (CCSS)</option>
                            <option value="Language Arts">English Language Arts (CCSS)</option>
                            <option value="Science">Science (NGSS)</option>
                            <option value="Social Studies">Social Studies (C3)</option>
                        </select>
                    </div>

                    <!-- Standard Benchmark Select -->
                    <div class="builder-field-group" style="grid-column: span 2;">
                        <label class="builder-field-label" for="builder-standard-select">
                            <i class="fas fa-bullseye"></i> Academic Standard Target
                        </label>
                        <select id="builder-standard-select" class="builder-select">
                            <!-- Populated dynamically by teachers-main.js -->
                        </select>
                    </div>

                    <!-- Assessment Mode -->
                    <div class="builder-field-group">
                        <label class="builder-field-label" for="builder-mode-select">
                            <i class="fas fa-sliders-h"></i> Assessment Mode
                        </label>
                        <select id="builder-mode-select" class="builder-select">
                            <option value="practice" selected>Standard Mastery (Untimed + Explanations)</option>
                            <option value="sprint">⚡ 60-Second Fluency Sprint (Speed Recall)</option>
                        </select>
                    </div>

                    <!-- Question Count -->
                    <div class="builder-field-group">
                        <label class="builder-field-label" for="builder-count-select">
                            <i class="fas fa-list-ol"></i> Question Count
                        </label>
                        <select id="builder-count-select" class="builder-select">
                            <option value="5">5 Questions (Quick Check)</option>
                            <option value="10" selected>10 Questions (Standard Quiz)</option>
                            <option value="15">15 Questions (Unit Benchmark)</option>
                            <option value="20">20 Questions (Cumulative Exam)</option>
                        </select>
                    </div>
                </div>

                <!-- Live Output Display -->
                <div class="builder-output-box">
                    <div class="builder-output-header">
                        <span class="builder-output-label">
                            <i class="fas fa-share-alt"></i> Generated Student Launch URL
                        </span>
                        <a id="builder-lesson-shortcut" href="/src/lesson_runner.php?subject=math&level=e" target="_blank" class="pacing-lesson-link">
                            Open Matching Lesson Runner <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>

                    <div class="builder-url-display">
                        <span id="builder-url-text">Loading direct assignment URL...</span>
                    </div>

                    <div class="builder-actions-row">
                        <button type="button" id="builder-copy-url-btn" class="builder-action-btn builder-btn-primary">
                            <i class="fas fa-copy"></i> Copy Student Link
                        </button>
                        <button type="button" id="builder-copy-prompt-btn" class="builder-action-btn builder-btn-secondary">
                            <i class="fas fa-chalkboard"></i> Copy LMS / Classroom Prompt
                        </button>
                        <button type="button" id="builder-test-student-btn" class="builder-action-btn builder-btn-test">
                            <i class="fas fa-external-link-alt"></i> Test as Student
                        </button>
                        <button type="button" id="builder-toggle-prompt-btn" class="builder-action-btn builder-btn-secondary">
                            <i class="fas fa-eye"></i> Preview Prompt Text
                        </button>
                    </div>

                    <!-- Collapsible LMS Prompt Preview -->
                    <pre id="builder-prompt-preview" class="lms-prompt-preview" style="display: none;"></pre>
                </div>
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 2: 36-WEEK MASTER CURRICULUM PACING GUIDE                     -->
        <!-- ================================================================= -->
        <section id="tab-pacing" class="teacher-tab-panel" role="tabpanel" aria-label="36-Week Pacing Guide">
            <div class="pacing-toolbar">
                <div class="pacing-filter-group">
                    <span style="font-size: 0.875rem; font-weight: 700; color: var(--color-text-main);">
                        <i class="fas fa-filter text-indigo-600"></i> Academic Quarter:
                    </span>
                    <div class="quarter-pills-bar">
                        <button type="button" class="quarter-pill-btn active" data-quarter="all">Full 36-Week Syllabus</button>
                        <button type="button" class="quarter-pill-btn" data-quarter="1">Quarter 1 (Wks 1–9)</button>
                        <button type="button" class="quarter-pill-btn" data-quarter="2">Quarter 2 (Wks 10–18)</button>
                        <button type="button" class="quarter-pill-btn" data-quarter="3">Quarter 3 (Wks 19–27)</button>
                        <button type="button" class="quarter-pill-btn" data-quarter="4">Quarter 4 (Wks 28–36)</button>
                    </div>
                </div>

                <div class="no-print">
                    <button type="button" id="pacing-print-btn" class="builder-action-btn builder-btn-secondary">
                        <i class="fas fa-print"></i> Print Pacing Syllabus
                    </button>
                </div>
            </div>

            <!-- Weekly Schedule Container (Dynamically rendered by teachers-main.js) -->
            <div id="pacing-schedule-container">
                <!-- Populated dynamically -->
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 3: EDUCATOR RESOURCES & PRINTABLES                            -->
        <!-- ================================================================= -->
        <section id="tab-resources" class="teacher-tab-panel" role="tabpanel" aria-label="Educator Resources">
            <div class="resource-cards-grid">
                <!-- Card 1 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-blue">
                            <i class="fas fa-print"></i>
                        </div>
                        <h3 class="resource-card-title">Printable Worksheets & Answer Keys</h3>
                        <p class="resource-card-desc">
                            Instantly format clean assessment worksheets for classroom test packets, complete with educator answer keys and pedagogical rationale matrices.
                        </p>
                    </div>
                    <a href="/assessment/" class="resource-action-link">
                        Launch Worksheet Generator <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-purple">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <h3 class="resource-card-title">Academic Standards Matrix</h3>
                        <p class="resource-card-desc">
                            Explore comprehensive Common Core and NGSS standards across Math, ELA, Science, and Social Studies with live student progress overlays.
                        </p>
                    </div>
                    <a href="/pages/standards.php" class="resource-action-link">
                        View Standards Directory <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-emerald">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3 class="resource-card-title">Student Competency Transcripts</h3>
                        <p class="resource-card-desc">
                            Access official printable student report cards featuring letter grades, GPA calculation, domain mastery percentages, and attendance tracking.
                        </p>
                    </div>
                    <a href="/pages/profile.php" class="resource-action-link">
                        Open Report Card Portal <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-amber">
                            <i class="fas fa-chalkboard"></i>
                        </div>
                        <h3 class="resource-card-title">Universal Interactive Lesson Runner</h3>
                        <p class="resource-card-desc">
                            Project interactive lessons featuring synchronized text-to-speech audio, in-text vocabulary popovers, and interactive "Check Understanding" widgets.
                        </p>
                    </div>
                    <a href="/src/lesson_runner.php" class="resource-action-link">
                        Open Lesson Runner <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 5 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-rose">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <h3 class="resource-card-title">Curriculum Library & Citations</h3>
                        <p class="resource-card-desc">
                            Access public-domain literature, historical documents, and research readers with built-in reading streak trackers and BibTeX/RIS export tools.
                        </p>
                    </div>
                    <a href="/library/" class="resource-action-link">
                        Browse Digital Library <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 6: Official Certificate of Mastery -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b;">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="resource-card-title">Official Achievement Diplomas</h3>
                        <p class="resource-card-desc">
                            Generate and print official 8.5" x 11" landscape mastery diplomas with gold seals, credential IDs, and educator/parent signatures for homeschool portfolios.
                        </p>
                    </div>
                    <button type="button" class="resource-action-link" style="background: none; border: none; cursor: pointer; padding: 0; font-weight: 800; font-size: 0.9rem; color: #d97706; display: inline-flex; align-items: center; gap: 0.4rem;" onclick="window.openCertificateModal && window.openCertificateModal()">
                        <span>Generate Student Diploma</span> <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 4: LESSON PLAN & QUIZ CUSTOMIZER                              -->
        <!-- ================================================================= -->
        <section id="tab-lesson-plan" class="teacher-tab-panel" role="tabpanel" aria-label="Lesson Plan & Quiz Customizer">
            <div class="teacher-card">
                <div class="teacher-card-header">
                    <div>
                        <h2 class="teacher-card-title">
                            <i class="fas fa-file-signature text-indigo-600"></i> Standards-Aligned Lesson Plan & Quiz Generator
                        </h2>
                        <p class="teacher-card-subtitle">
                            Configure standard-aligned pedagogical frameworks and formative quizzes ready for classroom instruction, print binders, or LMS dispatch.
                        </p>
                    </div>
                </div>

                <!-- Form Controls -->
                <div class="builder-form-grid">
                    <div class="builder-field-group">
                        <label class="builder-field-label" for="lp-grade-select">
                            <i class="fas fa-graduation-cap"></i> Target Grade Level
                        </label>
                        <select id="lp-grade-select" class="builder-select">
                            <option value="pre-k">Pre-K (Level A)</option>
                            <option value="k">Kindergarten (Level B)</option>
                            <option value="1">1st Grade (Level C)</option>
                            <option value="2">2nd Grade (Level D)</option>
                            <option value="3" selected>3rd Grade (Level E)</option>
                            <option value="4">4th Grade (Level F)</option>
                            <option value="5">5th Grade (Level G)</option>
                            <option value="6">6th Grade (Level H)</option>
                            <option value="7">7th Grade (Level I)</option>
                            <option value="8">8th Grade (Level J)</option>
                            <option value="hs">High School (Level K-N)</option>
                        </select>
                    </div>

                    <div class="builder-field-group">
                        <label class="builder-field-label" for="lp-subject-select">
                            <i class="fas fa-book"></i> Subject Area
                        </label>
                        <select id="lp-subject-select" class="builder-select">
                            <option value="Math" selected>Mathematics (CCSS)</option>
                            <option value="Language Arts">English Language Arts (CCSS)</option>
                            <option value="Science">Science (NGSS)</option>
                            <option value="Social Studies">Social Studies (C3)</option>
                        </select>
                    </div>

                    <div class="builder-field-group" style="grid-column: span 2;">
                        <label class="builder-field-label" for="lp-standard-select">
                            <i class="fas fa-bullseye"></i> Academic Standard Target
                        </label>
                        <select id="lp-standard-select" class="builder-select">
                            <!-- Populated dynamically -->
                        </select>
                    </div>

                    <div class="builder-field-group">
                        <label class="builder-field-label" for="lp-duration-select">
                            <i class="fas fa-clock"></i> Target Lesson Duration
                        </label>
                        <select id="lp-duration-select" class="builder-select">
                            <option value="30">30 Minutes (Direct Focused Lesson)</option>
                            <option value="45" selected>45 Minutes (Standard Class Period)</option>
                            <option value="60">60 Minutes (In-Depth Block Period)</option>
                        </select>
                    </div>

                    <div class="builder-field-group">
                        <label class="builder-field-label" for="lp-model-select">
                            <i class="fas fa-chalkboard-teacher"></i> Instructional Model
                        </label>
                        <select id="lp-model-select" class="builder-select">
                            <option value="cra" selected>Concrete-Representational-Abstract (CRA)</option>
                            <option value="inquiry">5E Guided Inquiry & Discovery</option>
                            <option value="workshop">Reader/Writer Workshop & Socratic Dialogue</option>
                        </select>
                    </div>
                </div>

                <div class="builder-actions-row" style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <button type="button" id="btn-generate-lesson-plan" class="builder-action-btn builder-btn-primary">
                        <i class="fas fa-magic"></i> Generate 5-Stage Lesson Plan & Formative Quiz
                    </button>
                    <button type="button" id="btn-generate-worksheet" class="builder-action-btn builder-btn-secondary" style="border-color: #6366f1; color: #4f46e5; background: #ffffff;">
                        <i class="fas fa-print"></i> Generate Printable Student Worksheet & Answer Key
                    </button>
                </div>

                <!-- Generated Output Container -->
                <div id="lp-output-container" class="lp-output-card" style="display: none; margin-top: 2rem;">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 5: CLASS ROSTER & STUDENT PROGRESS TRACKER                    -->
        <!-- ================================================================= -->
        <section id="tab-roster" class="teacher-tab-panel" role="tabpanel" aria-label="Class Roster & Progress Tracker">
            <div class="teacher-card">
                <div class="teacher-card-header">
                    <div>
                        <h2 class="teacher-card-title">
                            <i class="fas fa-users-cog text-indigo-600"></i> Classroom Roster & Standards Progress
                        </h2>
                        <p class="teacher-card-subtitle">
                            Monitor multi-student competency mastery, log assessment benchmarks, and export gradebook records in standardized CSV format.
                        </p>
                    </div>
                </div>

                <!-- Summary Metrics Bar -->
                <div class="roster-metrics-grid">
                    <div class="roster-metric-chip">
                        <span class="roster-metric-label"><i class="fas fa-user-graduate" style="color:#6366f1;"></i> Enrolled Students</span>
                        <span class="roster-metric-val" id="roster-stat-total">5</span>
                    </div>
                    <div class="roster-metric-chip">
                        <span class="roster-metric-label"><i class="fas fa-chart-line" style="color:#10b981;"></i> Class Average Mastery</span>
                        <span class="roster-metric-val" style="color:#10b981;" id="roster-stat-avg">84%</span>
                    </div>
                    <div class="roster-metric-chip">
                        <span class="roster-metric-label"><i class="fas fa-award" style="color:#f59e0b;"></i> Honors Proficient (85%+)</span>
                        <span class="roster-metric-val" style="color:#f59e0b;" id="roster-stat-honors">3</span>
                    </div>
                    <div class="roster-metric-chip">
                        <span class="roster-metric-label"><i class="fas fa-life-ring" style="color:#ef4444;"></i> Targeted Intervention</span>
                        <span class="roster-metric-val" style="color:#ef4444;" id="roster-stat-support">1</span>
                    </div>
                </div>

                <!-- Toolbar -->
                <div class="roster-toolbar no-print">
                    <div class="roster-add-form">
                        <input type="text" id="roster-new-name" placeholder="Student Name (e.g. Elena Rostova)" class="builder-input" style="max-width: 260px;">
                        <select id="roster-new-grade" class="builder-select" style="max-width: 160px;">
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5" selected>Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                        </select>
                        <button type="button" id="btn-add-roster-student" class="builder-action-btn builder-btn-primary">
                            <i class="fas fa-user-plus"></i> Add Student
                        </button>
                    </div>

                    <div class="roster-export-group">
                        <button type="button" id="btn-cluster-groups" class="builder-action-btn builder-btn-secondary" style="border-color: #ec4899; color: #db2777; background: #ffffff;">
                            <i class="fas fa-layer-group"></i> Intervention Clusters
                        </button>
                        <button type="button" id="btn-upload-report-card" class="builder-action-btn builder-btn-primary" style="background: linear-gradient(135deg, #4f46e5, #6366f1); border: none;">
                            <i class="fas fa-file-upload"></i> Upload Report Card (.json)
                        </button>
                        <input type="file" id="roster-report-card-file" accept=".json,application/json" style="display: none;">
                        <button type="button" id="btn-reset-roster" class="builder-action-btn builder-btn-secondary" title="Reset to standard 5-student sample class">
                            <i class="fas fa-undo"></i> Reset Demo
                        </button>
                        <button type="button" id="btn-export-roster-csv" class="builder-action-btn builder-btn-primary" style="background:#059669; border-color:#059669;">
                            <i class="fas fa-file-csv"></i> Export CSV
                        </button>
                    </div>
                </div>

                <!-- Differentiated Intervention Clusters Container -->
                <div id="intervention-clusters-container" class="intervention-clusters-section no-print" style="display: none; margin-bottom: 1.5rem;">
                    <!-- Rendered dynamically by JS -->
                </div>

                <!-- Classroom Standards Mastery Heatmap -->
                <div id="class-mastery-heatmap-root"></div>

                <!-- Roster Data Table Container -->
                <div class="roster-table-wrapper">
                    <table class="roster-table" id="roster-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Grade</th>
                                <th>Math Mastery</th>
                                <th>ELA Mastery</th>
                                <th>Science Mastery</th>
                                <th>Overall Competency</th>
                                <th>Status</th>
                                <th class="no-print">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="roster-table-body">
                            <!-- Populated dynamically by teachers-main.js -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>

</main>

<!-- ================================================================= -->
<!-- STUDENT DIAGNOSTIC DOSSIER POPUP MODAL                            -->
<!-- ================================================================= -->
<div id="modal-student-dossier" class="dossier-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="dossier-student-name">
    <div class="dossier-modal-container">
        <!-- Header Banner -->
        <div class="dossier-header">
            <div class="dossier-header-main">
                <div class="dossier-avatar" id="dossier-avatar">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="dossier-title-group">
                    <div class="dossier-meta-tags">
                        <span class="dossier-grade-badge" id="dossier-grade-badge">Grade 5</span>
                        <span class="dossier-date-badge" id="dossier-date-badge"><i class="fas fa-calendar-alt"></i> Evaluated: Today</span>
                        <span class="dossier-source-badge" id="dossier-source-badge"><i class="fas fa-file-code"></i> Report Card JSON</span>
                    </div>
                    <h3 class="dossier-student-name" id="dossier-student-name">Student Name</h3>
                </div>
            </div>
            <div class="dossier-header-actions" style="display: flex; align-items: center; gap: 1rem;">
                <div class="dossier-score-chip" id="dossier-score-chip">
                    <span class="dossier-score-num" id="dossier-score-num">85%</span>
                    <span class="dossier-score-label" id="dossier-score-status">Honors Proficient</span>
                </div>
                <button type="button" class="dossier-close-btn" onclick="window.closeDossierModal()" aria-label="Close Dossier" title="Close Dossier">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Dossier Body Content -->
        <div class="dossier-body">
            <!-- 1. Subject Mastery Progress Cards -->
            <div class="dossier-section-title">
                <i class="fas fa-chart-pie text-indigo-600"></i> Subject Competency Breakdown
            </div>
            <div class="dossier-subjects-grid">
                <div class="dossier-subj-card">
                    <div class="dossier-subj-header">
                        <span><i class="fas fa-calculator" style="color: #3b82f6;"></i> Mathematics</span>
                        <strong id="dossier-math-pct">--%</strong>
                    </div>
                    <div class="dossier-progress-track">
                        <div class="dossier-progress-fill math-fill" id="dossier-math-fill" style="width: 0%;"></div>
                    </div>
                </div>
                <div class="dossier-subj-card">
                    <div class="dossier-subj-header">
                        <span><i class="fas fa-book-reader" style="color: #8b5cf6;"></i> Language Arts</span>
                        <strong id="dossier-ela-pct">--%</strong>
                    </div>
                    <div class="dossier-progress-track">
                        <div class="dossier-progress-fill ela-fill" id="dossier-ela-fill" style="width: 0%;"></div>
                    </div>
                </div>
                <div class="dossier-subj-card">
                    <div class="dossier-subj-header">
                        <span><i class="fas fa-flask" style="color: #10b981;"></i> Science & Labs</span>
                        <strong id="dossier-science-pct">--%</strong>
                    </div>
                    <div class="dossier-progress-track">
                        <div class="dossier-progress-fill science-fill" id="dossier-science-fill" style="width: 0%;"></div>
                    </div>
                </div>
                <div class="dossier-subj-card">
                    <div class="dossier-subj-header">
                        <span><i class="fas fa-landmark" style="color: #f59e0b;"></i> Social Studies</span>
                        <strong id="dossier-social-pct">--%</strong>
                    </div>
                    <div class="dossier-progress-track">
                        <div class="dossier-progress-fill social-fill" id="dossier-social-fill" style="width: 0%;"></div>
                    </div>
                </div>
            </div>

            <!-- 2. Targeted Standards Matrix -->
            <div class="dossier-section-title mt-4">
                <i class="fas fa-bullseye text-indigo-600"></i> Standards Proficiency & Targeted Remediation
            </div>
            <div class="dossier-standards-split">
                <div class="dossier-standards-block">
                    <span class="dossier-sub-label text-emerald-600"><i class="fas fa-check-circle"></i> Demonstrated Competencies (80%+)</span>
                    <div class="dossier-tags-wrap" id="dossier-mastered-standards">
                        <!-- Injected via JS -->
                    </div>
                </div>
                <div class="dossier-standards-block">
                    <span class="dossier-sub-label text-rose-600"><i class="fas fa-exclamation-triangle"></i> Priority Intervention Needs (&lt;70%)</span>
                    <div class="dossier-tags-wrap" id="dossier-weak-standards">
                        <!-- Injected via JS -->
                    </div>
                </div>
            </div>

            <!-- 3. Active Accommodations & Neurodiversity Profile -->
            <div class="dossier-section-title mt-4">
                <i class="fas fa-universal-access text-indigo-600"></i> Active IEP / Neurodiversity Accommodations
            </div>
            <div class="dossier-tags-wrap" id="dossier-accommodations-list">
                <!-- Injected via JS -->
            </div>

            <!-- 4. Teacher Observational Notes -->
            <div class="dossier-section-title mt-4">
                <i class="fas fa-edit text-indigo-600"></i> Educator Notes & Diagnostic Observations
            </div>
            <textarea id="dossier-teacher-notes" class="dossier-notes-textarea" placeholder="Record qualitative insights, intervention strategy, or student strengths..."></textarea>
        </div>

        <!-- Actions Footer -->
        <div class="dossier-footer no-print">
            <button type="button" id="btn-dossier-gen-lesson" class="builder-action-btn builder-btn-primary" style="background: linear-gradient(135deg, #4f46e5, #6366f1); border: none;">
                <i class="fas fa-magic"></i> Generate Targeted Remediation Lesson
            </button>
            <button type="button" id="btn-dossier-launch-quiz" class="builder-action-btn builder-btn-secondary" style="border-color: #6366f1; color: #4f46e5;">
                <i class="fas fa-external-link-alt"></i> Launch Diagnostic Quiz
            </button>
            <button type="button" id="btn-dossier-save-roster" class="builder-action-btn builder-btn-primary" style="background: #059669; border-color: #059669;">
                <i class="fas fa-save"></i> Save & Sync to Roster
            </button>
            <button type="button" id="btn-dossier-print" class="builder-action-btn builder-btn-secondary" onclick="window.printStudentDossier()">
                <i class="fas fa-print"></i> Print Dossier
            </button>
            <button type="button" id="btn-dossier-close" class="builder-action-btn builder-btn-secondary" onclick="window.closeDossierModal()">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Load Curriculum Standards Data Loader -->
<script src="<?= assetVersion('/assets/js/standards-ccss-math-ela.js') ?>"></script>
<!-- Load Teacher Hub Script -->
<script src="<?= assetVersion('/assets/js/teachers-main.js') ?>"></script>
<script src="<?= assetVersion('/assets/js/teacher/mastery-heatmap.js') ?>"></script>

<?php include '../src/footer.php'; ?>
