<?php
$pageTitle = "Teacher & Homeschool Suite - Hesten's Learning";
$pageDescription = "Interactive assignment link builder, 36-week curriculum pacing guides, and standards-aligned classroom dispatchers for educators and homeschool families.";
$pageKeywords = "teacher resources, lesson plans, assignment builder, pacing guide, common core, ccss, ngss, homeschool syllabus";
include '../src/header.php';
?>

<!-- Teacher Suite Page Stylesheet -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/teachers.css') ?>">

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

    </div>

</main>

<!-- Load Curriculum Standards Data Loader -->
<script src="<?= assetVersion('/assets/js/standards-ccss-math-ela.js') ?>"></script>
<!-- Load Teacher Hub Script -->
<script src="<?= assetVersion('/assets/js/teachers-main.js') ?>"></script>

<?php include '../src/footer.php'; ?>
