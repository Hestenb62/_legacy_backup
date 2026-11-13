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
        <h1 id="print-pacing-title">Hesten's Learning • Curriculum Pacing Syllabus</h1>
        <p id="print-pacing-subtitle">Standards-Aligned Academic Scope &amp; Sequence (CCSS, NGSS &amp; C3) • hestena62.com</p>
    </div>

    <!-- Page Hero Banner -->
    <div class="teacher-hero">
        <div class="teacher-hero-bg" aria-hidden="true">
            <i class="fas fa-chalkboard-teacher teacher-hero-icon-left"></i>
            <i class="fas fa-apple-alt teacher-hero-icon-right"></i>
        </div>

        <div class="teacher-hero-inner">
            <span class="teacher-hero-badge">
                <i class="fas fa-graduation-cap"></i> Educator &amp; Homeschool Suite
            </span>
            <h1 class="teacher-hero-title">
                Teacher Toolkit &amp; Pacing Guide
            </h1>
            <p class="teacher-hero-subtitle">
                Generate direct student assignment links, dispatch standard-targeted assessments, and navigate structured 36-week or 48-week curriculum plans.
            </p>

            <div class="teacher-hero-stats no-print">
                <span class="teacher-hero-pill">
                    <i class="fas fa-link"></i> Direct Assignment Builder
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-bolt"></i> 60s Fluency Sprint Dispatcher
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-calendar-alt"></i> 36-Week Scope &amp; Sequence
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-water"></i> 48-Week Wave Blueprint
                </span>
                <span class="teacher-hero-pill">
                    <i class="fas fa-print"></i> Printable Binder Worksheets
                </span>
            </div>
        </div>
    </div>

    <!-- Main Workspace Container -->
    <div class="teacher-page-container">
        <!-- Active Development Notice Banner -->
        <div class="hl-dev-notice-banner no-print" id="hl-dev-notice-banner" role="region" aria-label="Active Platform Updates Notice">
            <div class="hl-dev-notice-glow" aria-hidden="true"></div>
            <div class="hl-dev-notice-content">
                <div class="hl-dev-notice-icon-box" aria-hidden="true">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="hl-dev-notice-text-wrap">
                    <div class="hl-dev-notice-header-row">
                        <span class="hl-dev-notice-badge">
                            <i class="fas fa-hammer"></i> Active Improvements in Progress
                        </span>
                        <span class="hl-dev-notice-author">A Message from Hesten</span>
                    </div>
                    <p class="hl-dev-notice-message">
                        <strong>Pardon our progress!</strong> I am currently actively working on updating and enhancing the <strong>Parents</strong>, <strong>Teachers</strong>, and <strong>Students</strong> sections of the site. Not everything may work completely while new features and upgrades are being implemented, so please sit tight as these changes are rolled out. Thank you for your patience and support!
                    </p>
                </div>
            </div>
            <button type="button" class="hl-dev-notice-close" onclick="window.dismissHlDevNotice(this)" aria-label="Dismiss active update notice">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Navigation Tabs Bar -->
        <div class="teacher-tab-nav no-print" role="tablist" aria-label="Teacher Hub Navigation">
            <button type="button" class="teacher-tab-btn active" data-tab="tab-builder" role="tab" aria-selected="true">
                <i class="fas fa-magic"></i> Assignment Link Builder
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-pacing" role="tab" aria-selected="false">
                <i class="fas fa-calendar-check"></i> 36-Week Pacing Guide
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-lesson-plan" role="tab" aria-selected="false">
                <i class="fas fa-file-alt"></i> Lesson Plan &amp; Quiz Customizer
            </button>
            <button type="button" class="teacher-tab-btn" data-tab="tab-resources" role="tab" aria-selected="false">
                <i class="fas fa-toolbox"></i> Educator Resources &amp; Keys
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

                <!-- 2-Column Responsive Builder Layout -->
                <div class="builder-layout-grid">
                    <!-- Form Controls Column -->
                    <div class="builder-form-col">
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
                            <div class="builder-field-group builder-field-full">
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
                    </div>

                    <!-- Output & Action Column (Sticky on Desktop) -->
                    <div class="builder-output-col-sticky">
                        <div class="builder-output-box">
                            <div class="builder-output-header">
                                <span class="builder-output-label">
                                    <i class="fas fa-share-alt"></i> Generated Student Launch URL
                                </span>
                                <a id="builder-lesson-shortcut" href="/src/lesson_runner.php?subject=math&level=e" target="_blank" class="pacing-lesson-link">
                                    Lesson Runner <i class="fas fa-external-link-alt"></i>
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
                                    <i class="fas fa-chalkboard"></i> Copy LMS Prompt
                                </button>
                                <button type="button" id="builder-test-student-btn" class="builder-action-btn builder-btn-test">
                                    <i class="fas fa-external-link-alt"></i> Test as Student
                                </button>
                                <button type="button" id="builder-toggle-prompt-btn" class="builder-action-btn builder-btn-secondary">
                                    <i class="fas fa-eye"></i> Preview Prompt
                                </button>
                            </div>

                            <!-- Collapsible LMS Prompt Preview -->
                            <pre id="builder-prompt-preview" class="lms-prompt-preview" style="display: none;"></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 2: 36-WEEK & 48-WEEK MASTER CURRICULUM PACING GUIDE          -->
        <!-- ================================================================= -->
        <section id="tab-pacing" class="teacher-tab-panel" role="tabpanel" aria-label="Curriculum Pacing Guide">
            <div class="pacing-command-bar">
                <!-- Top Row: Grade Selection, Pacing Model, Print -->
                <div class="pacing-command-header">
                    <div class="pacing-grade-control">
                        <label for="pacing-grade-select" class="pacing-control-label">
                            <i class="fas fa-graduation-cap text-indigo-600"></i> Grade Level:
                        </label>
                        <select id="pacing-grade-select" class="pacing-control-select" aria-label="Select grade level for pacing syllabus">
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
                        <span id="pacing-grade-badge" class="pacing-grade-pill">
                            <i class="fas fa-book-reader"></i> Active Grade: 3rd Grade (Level E)
                        </span>
                    </div>

                    <!-- Pacing Model Switcher -->
                    <div class="pacing-model-control">
                        <span class="pacing-control-label">
                            <i class="fas fa-layer-group text-indigo-600"></i> Structure:
                        </span>
                        <div class="pacing-model-pills" role="radiogroup" aria-label="Select pacing model">
                            <button type="button" class="pacing-model-btn active" data-pacing-model="traditional" role="radio" aria-checked="true">
                                <i class="fas fa-calendar-alt"></i> 36-Week Traditional
                            </button>
                            <button type="button" class="pacing-model-btn" data-pacing-model="wave" role="radio" aria-checked="false">
                                <i class="fas fa-water"></i> 48-Week Year-Round Waves
                            </button>
                        </div>
                    </div>

                    <div class="pacing-print-control no-print">
                        <button type="button" id="pacing-print-btn" class="builder-action-btn builder-btn-secondary">
                            <i class="fas fa-print"></i> Print Pacing Syllabus
                        </button>
                    </div>
                </div>

                <!-- Bottom Row: Filter Pills (Traditional Quarters vs Fiscal Waves) -->
                <div class="pacing-command-filters">
                    <!-- Traditional Quarter Filters -->
                    <div class="pacing-filter-group" id="pacing-traditional-filters">
                        <span class="pacing-filter-label">
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

                    <!-- Wave Filters (Hidden by Default) -->
                    <div class="pacing-filter-group" id="pacing-wave-filters" style="display: none;">
                        <span class="pacing-filter-label" style="color: #0d9488;">
                            <i class="fas fa-water"></i> Active Fiscal Wave:
                        </span>
                        <div class="quarter-pills-bar">
                            <button type="button" class="wave-pill-btn active" data-wave="all">All 6 Waves (July 1 – June 30 • 48 Wks)</button>
                            <button type="button" class="wave-pill-btn" data-wave="1">Wave 1 (July–Aug • Wks 1–8)</button>
                            <button type="button" class="wave-pill-btn" data-wave="2">Wave 2 (Sept–Oct • Wks 9–16)</button>
                            <button type="button" class="wave-pill-btn" data-wave="3">Wave 3 (Nov–Dec • Wks 17–24)</button>
                            <button type="button" class="wave-pill-btn" data-wave="4">Wave 4 (Jan–Feb • Wks 25–32)</button>
                            <button type="button" class="wave-pill-btn" data-wave="5">Wave 5 (Mar–Apr • Wks 33–40)</button>
                            <button type="button" class="wave-pill-btn" data-wave="6">Wave 6 (May–Jun 30 • Wks 41–48)</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wave Structure Explainer Banner (Visible in Wave Mode) -->
            <div id="pacing-wave-explainer" class="wave-explainer-card" style="display: none;">
                <div class="wave-explainer-icon"><i class="fas fa-water"></i></div>
                <div class="wave-explainer-content">
                    <h4 class="wave-explainer-title">Year-Round Wave Schedule (6 Waves • 48 Weeks • Fiscal Calendar: July 1 – June 30)</h4>
                    <p class="wave-explainer-desc">
                        The Wave Structure is a <strong>fully independent, year-round educational framework</strong> following the fiscal calendar (Wave 1 begins July 1, Wave 6 concludes June 30). Each of the 6 waves spans <strong>8 full weeks</strong> using the proven <strong>7+1 learning cycle</strong>: <strong>7 uninterrupted weeks of instructional immersion</strong> followed by an intentional <strong>Week 8 dedicated to formative/summative testing, finishing up pending assignments, and planning for the next wave</strong>.
                    </p>
                </div>
            </div>

            <!-- Weekly Schedule Container (Dynamically rendered by teachers-main.js) -->
            <div id="pacing-schedule-container">
                <!-- Populated dynamically -->
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 3: LESSON PLAN & QUIZ CUSTOMIZER                              -->
        <!-- ================================================================= -->
        <section id="tab-lesson-plan" class="teacher-tab-panel" role="tabpanel" aria-label="Lesson Plan & Quiz Customizer">
            <div class="teacher-card">
                <div class="teacher-card-header">
                    <div>
                        <h2 class="teacher-card-title">
                            <i class="fas fa-file-signature text-indigo-600"></i> Standards-Aligned Lesson Plan &amp; Quiz Generator
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
                            <option value="inquiry">5E Guided Inquiry &amp; Discovery</option>
                            <option value="workshop">Reader/Writer Workshop &amp; Socratic Dialogue</option>
                        </select>
                    </div>
                </div>

                <div class="builder-actions-row" style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <button type="button" id="btn-generate-lesson-plan" class="builder-action-btn builder-btn-primary">
                        <i class="fas fa-magic"></i> Generate 5-Stage Lesson Plan &amp; Formative Quiz
                    </button>
                    <button type="button" id="btn-generate-worksheet" class="builder-action-btn builder-btn-secondary" style="border-color: #6366f1; color: #4f46e5; background: #ffffff;">
                        <i class="fas fa-print"></i> Generate Printable Student Worksheet &amp; Answer Key
                    </button>
                </div>

                <!-- Generated Output Container -->
                <div id="lp-output-container" class="lp-output-card" style="display: none; margin-top: 2rem;">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ================================================================= -->
        <!-- TAB 4: EDUCATOR RESOURCES & PRINTABLES                            -->
        <!-- ================================================================= -->
        <section id="tab-resources" class="teacher-tab-panel" role="tabpanel" aria-label="Educator Resources">
            <div class="resource-cards-grid">
                <!-- Card 1 -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper icon-blue">
                            <i class="fas fa-print"></i>
                        </div>
                        <h3 class="resource-card-title">Printable Worksheets &amp; Answer Keys</h3>
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
                        <h3 class="resource-card-title">Curriculum Library &amp; Citations</h3>
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

                <!-- Card 7: Community Hub & Educator Exchanges -->
                <div class="resource-feature-card">
                    <div>
                        <div class="resource-icon-wrapper" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h3 class="resource-card-title">Community &amp; Educator Exchanges</h3>
                        <p class="resource-card-desc">
                            Discover open educational resource (OER) networks, peer lesson review collaboratives, neurodiversity advocacy coalitions, and share platform suggestions.
                        </p>
                    </div>
                    <a href="/pages/community.php" class="resource-action-link" style="color: #059669;">
                        <span>Explore Community Hub</span> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

    </div>

</main>

<!-- ================================================================= -->
<!-- WAVE WEEK PLAYBOOK & DIFFERENTIATION POPUP MODAL                  -->
<!-- ================================================================= -->
<div id="modal-wave-week-playbook" class="playbook-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="playbook-modal-title" style="display: none;">
    <div class="playbook-modal-card">
        <!-- Modal Header -->
        <div class="playbook-modal-header">
            <div class="playbook-modal-header-info">
                <div class="playbook-icon-badge">
                    <i class="fas fa-compass" aria-hidden="true"></i>
                </div>
                <div>
                    <h2 id="playbook-modal-title" class="playbook-modal-title">
                        Wave Week Playbook &amp; Blueprint
                    </h2>
                    <p id="playbook-modal-subtitle" class="playbook-modal-subtitle">
                        Comprehensive weekly scope, differentiated pacing suggestions, and curated library resources.
                    </p>
                </div>
            </div>
            <button type="button" class="playbook-modal-close" onclick="window.closeWaveWeekPlaybook()" aria-label="Close Weekly Playbook">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Real-Time Differentiation Customizer Toolbar -->
        <div class="playbook-toolbar no-print">
            <div class="playbook-toolbar-title">
                <i class="fas fa-sliders-h" style="color: #4f46e5;"></i>
                <span>Differentiation &amp; Pacing Settings:</span>
            </div>
            <div class="playbook-toolbar-controls">
                <div class="playbook-control-item">
                    <label for="playbook-grade-select"><i class="fas fa-graduation-cap"></i> Grade Level:</label>
                    <select id="playbook-grade-select" class="playbook-select" onchange="window.handlePlaybookDifferentiationChange()">
                        <option value="pre-k">Pre-K (Level A)</option>
                        <option value="k">Kindergarten (Level B)</option>
                        <option value="1">1st Grade (Level C)</option>
                        <option value="2">2nd Grade (Level D)</option>
                        <option value="3">3rd Grade (Level E)</option>
                        <option value="4">4th Grade (Level F)</option>
                        <option value="5">5th Grade (Level G)</option>
                        <option value="6">6th Grade (Level H)</option>
                        <option value="7">7th Grade (Level I)</option>
                        <option value="8">8th Grade (Level J)</option>
                        <option value="hs">High School (Level K-N)</option>
                    </select>
                </div>

                <div class="playbook-control-item">
                    <label for="playbook-lexile-select"><i class="fas fa-book-reader"></i> Reading Lexile:</label>
                    <select id="playbook-lexile-select" class="playbook-select" onchange="window.handlePlaybookDifferentiationChange()">
                        <!-- Populated dynamically -->
                    </select>
                </div>

                <div class="playbook-control-item">
                    <label for="playbook-pacing-select"><i class="fas fa-stopwatch"></i> Pacing Rhythm:</label>
                    <select id="playbook-pacing-select" class="playbook-select" onchange="window.handlePlaybookDifferentiationChange()">
                        <option value="standard">Standard Spiral (45m / 15m)</option>
                        <option value="accelerated">Accelerated Deep-Dive</option>
                        <option value="scaffolded">Scaffolded &amp; Low-Anxiety (20m / Untimed)</option>
                        <option value="intensive">Intensive 1-on-1 (Tier 3 CRA)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Dynamic Body Content -->
        <div id="playbook-dynamic-content" class="playbook-modal-body">
            <!-- Injected dynamically by pacing-weekly-playbook.js -->
        </div>

        <!-- Modal Actions Footer -->
        <div class="playbook-modal-footer no-print">
            <button type="button" class="builder-action-btn builder-btn-secondary" onclick="window.closeWaveWeekPlaybook()">
                Close
            </button>
            <button type="button" class="builder-action-btn builder-btn-primary" style="background: linear-gradient(135deg, #059669, #10b981); border: none;" onclick="window.printWaveWeekBlueprint()">
                <i class="fas fa-print"></i> Print Weekly Blueprint (PDF)
            </button>
        </div>
    </div>
</div>

<!-- Load Curriculum Standards Data Loader -->
<script src="<?= assetVersion('/assets/js/standards/standards-ccss-math-ela.js') ?>"></script>
<!-- Load Teacher Hub Script -->
<script src="<?= assetVersion('/assets/js/standards/pacing-curriculum-registry.js') ?>"></script>
<script src="<?= assetVersion('/assets/js/standards/pacing-weekly-playbook.js') ?>"></script>
<script src="<?= assetVersion('/assets/js/pages/teachers-main.js') ?>"></script>

<?php include '../src/footer.php'; ?>
