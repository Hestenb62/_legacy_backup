<?php
// FILE: parents.php
// DESCRIPTION: This PHP file serves as a resource hub (wiki) for parents.
// Pure Vanilla CSS architecture without TailwindCSS dependencies.

// --- Page-Specific Variables for Header ---
$pageTitle       = 'Parents Hub - Hesten\'s Learning';
$pageDescription = 'Parent resource hub. Find guides, tracking tools, and interactive homeschool law maps.';
$pageKeywords    = 'parents, wiki, resource, homeschool, learning support, laws';
$pageAuthor      = 'Hesten\'s Learning';

// --- Include Header Template ---
include '../src/header.php';
?>
<!-- Parents Hub Page Stylesheet -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/parents.css') ?>">

<!-- HERO SECTION -->
<div class="page-hero">
    <!-- Abstract Background Shapes -->
    <div class="page-hero-bg">
        <i class="fas fa-users page-hero-icon-bg-1"></i>
        <i class="fas fa-heart page-hero-icon-bg-2"></i>
    </div>

    <div class="parents-container" style="text-align: center;">
        <span class="page-hero-badge">
            Parent Resource Center
        </span>
        <h1 class="page-hero-title">
            Support Your Child's Learning Journey
        </h1>
        <p class="page-hero-subtitle">
            Everything you need to guide their education. From state laws to wellness tips, we've curated the best tools for you.
        </p>
    </div>
</div>

<div class="parents-container">
    <div class="parents-layout">

        <!-- LEFT SIDEBAR (Navigation) -->
        <aside class="parents-sidebar">

            <!-- Nav Menu -->
            <div class="glass-panel parents-nav-card">
                <nav aria-label="Quick Navigation">
                    <ul class="parents-nav-list">
                        <li class="parents-nav-item">
                            <a href="#resources" class="parents-nav-link nav-link-blue">
                                <span class="parents-nav-icon nav-icon-blue">
                                    <i class="fas fa-book-open"></i>
                                </span>
                                Resources
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#tools" class="parents-nav-link nav-link-purple">
                                <span class="parents-nav-icon nav-icon-purple">
                                    <i class="fas fa-toolbox"></i>
                                </span>
                                Tools
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#accommodations" class="parents-nav-link nav-link-green">
                                <span class="parents-nav-icon nav-icon-green">
                                    <i class="fas fa-universal-access"></i>
                                </span>
                                IEP & Accommodations
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#schedule" class="parents-nav-link nav-link-amber">
                                <span class="parents-nav-icon nav-icon-amber">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                Daily & Weekly Schedule
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#certificates" class="parents-nav-link" style="color: #d97706;">
                                <span class="parents-nav-icon" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                                    <i class="fas fa-award"></i>
                                </span>
                                Milestone Diplomas
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#laws" class="parents-nav-link nav-link-teal">
                                <span class="parents-nav-icon nav-icon-teal">
                                    <i class="fas fa-map-marked-alt"></i>
                                </span>
                                State Laws
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#feedback" class="parents-nav-link nav-link-rose">
                                <span class="parents-nav-icon nav-icon-rose">
                                    <i class="fas fa-heart"></i>
                                </span>
                                Feedback
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Help Card -->
            <div class="parents-help-card">
                <div class="parents-help-glow"></div>
                <i class="fas fa-headset parents-help-icon"></i>
                <h3 class="parents-help-title">Need Support?</h3>
                <p class="parents-help-desc">Our education specialists are here to help you.</p>
                <a href="#contact" class="parents-help-btn">
                    Contact Us
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="parents-main-content">

            <!-- Weekly Growth Digest & Family Conversation Starters -->
            <section id="weekly-digest" class="parents-section" style="margin-bottom: 2.5rem;">
                <div class="glass-panel" style="padding: 1.75rem 2rem; border-radius: 20px; border: 1px solid var(--color-border); background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                        <div>
                            <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(37, 99, 235, 0.15); color: #2563eb; padding: 0.2rem 0.6rem; border-radius: 9999px;">Family Insights</span>
                            <h2 style="margin: 0.5rem 0 0 0; font-size: 1.35rem; font-weight: 800;"><i class="fas fa-seedling" style="color: #10b981;"></i> Weekly Growth Digest &amp; Discussion Prompts</h2>
                        </div>
                        <!-- 20-20-20 Screen Hygiene Timer Trigger -->
                        <button type="button" class="hl-btn" onclick="if(window.HLSensory)window.HLSensory.open();" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 9999px; background: #0ea5e9; color: white; border: none; font-weight: 700; cursor: pointer;">
                            <i class="fas fa-eye"></i> <span>20-20-20 Eye Break</span>
                        </button>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
                        <div style="background: var(--color-bg-surface); padding: 1.25rem; border-radius: 14px; border: 1px solid var(--color-border);">
                            <h4 style="margin: 0 0 0.5rem 0; font-size: 1rem; color: #2563eb;"><i class="fas fa-book-reader"></i> Reading Accomplishments</h4>
                            <p style="margin: 0; font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5;">
                                Your learner explored <strong>George Orwell's 1984</strong> in both Original and Plain English Lexile modes this week.
                            </p>
                            <div style="margin-top: 0.75rem; font-size: 0.82rem; font-weight: 700; color: #10b981;">
                                <i class="fas fa-check-circle"></i> 100% Reading Goal Achieved
                            </div>
                        </div>

                        <div style="background: var(--color-bg-surface); padding: 1.25rem; border-radius: 14px; border: 1px solid var(--color-border);">
                            <h4 style="margin: 0 0 0.5rem 0; font-size: 1rem; color: #f59e0b;"><i class="fas fa-comments"></i> Dinner Table Conversation Starters</h4>
                            <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5;">
                                <li>"Why do you think the characters in 1984 had to be so careful about what they wrote?"</li>
                                <li>"How did breaking down fractions with the fraction bars help today?"</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Resources Section -->
            <section id="resources" class="parents-section">
                <div class="parents-section-header">
                    <h2 class="parents-section-title">Curated Resources</h2>
                </div>

                <div class="parents-resources-grid">
                    <!-- Card 1 -->
                    <a href="https://example.com/parent-guide.pdf" target="_blank" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-red">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Parent Guide</h3>
                            <p class="parents-resource-desc">The complete handbook for our curriculum.</p>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-green">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Learning Hacks</h3>
                            <p class="parents-resource-desc">Smart strategies for home education.</p>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-amber">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Digital Safety</h3>
                            <p class="parents-resource-desc">Protecting your child in the digital age.</p>
                        </div>
                    </a>

                    <!-- Card 4 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-pink">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Wellness</h3>
                            <p class="parents-resource-desc">Mental health resources for students.</p>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Essential Tools & Student Portal Section (Bento Grid) -->
            <section id="tools" class="parents-section">
                <div class="parents-section-header">
                    <h2 class="parents-section-title">
                        <i class="fas fa-toolbox" style="color: #8b5cf6;"></i> Essential Tools &amp; Student Portal
                    </h2>
                    <p class="parents-section-desc">Key academic dashboards, curriculum builders, and printable resources to power your homeschool environment.</p>
                </div>

                <div class="parents-tools-grid">
                    <!-- Featured Hero Card: Student Competency & Academic Portal -->
                    <div class="parents-tool-featured">
                        <div class="parents-tool-glow"></div>
                        <div class="parents-tool-featured-top">
                            <div class="parents-tool-badges-row">
                                <span class="parents-tool-badge">
                                    <i class="fas fa-user-graduate"></i> Student Portal &amp; Gradebook
                                </span>
                                <span class="parents-tool-live-pill">
                                    <span class="live-dot"></span> Live Transcripts
                                </span>
                            </div>
                            <h3 class="parents-tool-title-featured">Student Competency &amp; Academic Honors Dashboard</h3>
                            <p class="parents-tool-desc-featured">
                                Monitor real-time letter grades, GPA calculation, daily quest milestones, and printable official report cards formatted for state compliance and homeschool portfolios.
                            </p>
                        </div>

                        <!-- Highlights Micro-Row -->
                        <div class="parents-tool-metrics-preview">
                            <div class="tool-metric-item">
                                <span class="tool-metric-val"><i class="fas fa-chart-pie" style="color:#60a5fa;"></i> CCSS &amp; NGSS</span>
                                <span class="tool-metric-lbl">Standards Mastery</span>
                            </div>
                            <div class="tool-metric-item">
                                <span class="tool-metric-val"><i class="fas fa-award" style="color:#fbbf24;"></i> 4.0 Scale</span>
                                <span class="tool-metric-lbl">Official GPA</span>
                            </div>
                            <div class="tool-metric-item">
                                <span class="tool-metric-val"><i class="fas fa-file-invoice" style="color:#34d399;"></i> PDF &amp; Print</span>
                                <span class="tool-metric-lbl">Report Cards</span>
                            </div>
                        </div>

                        <!-- Action Buttons Row -->
                        <div class="parents-tool-actions-row">
                            <a href="/pages/profile.php" class="parents-tool-btn parents-tool-btn-primary">
                                <i class="fas fa-user-circle"></i> Open Student Gradebook <i class="fas fa-arrow-right"></i>
                            </a>
                            <button type="button" class="parents-tool-btn parents-tool-btn-gold" onclick="window.openCertificateModal && window.openCertificateModal()">
                                <i class="fas fa-award"></i> Print Official Diploma
                            </button>
                        </div>
                    </div>

                    <!-- Companion Tool 1: 36-Week Pacing Guide -->
                    <a href="/pages/teachers.php#pacing" class="parents-tool-card hover-lift">
                        <div class="parents-tool-card-content">
                            <div class="parents-tool-icon icon-purple">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h3 class="parents-tool-title">36-Week Pacing Guide</h3>
                            <p class="parents-tool-desc">Structured quarter-by-quarter curriculum scope, weekly milestones, and printable syllabus.</p>
                        </div>
                        <span class="parents-tool-action action-purple">
                            Open Pacing Guide <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>

                    <!-- Companion Tool 2: Assignment & Quiz Builder -->
                    <a href="/pages/teachers.php#builder" class="parents-tool-card hover-lift">
                        <div class="parents-tool-card-content">
                            <div class="parents-tool-icon icon-teal">
                                <i class="fas fa-magic"></i>
                            </div>
                            <h3 class="parents-tool-title">Assignment Builder</h3>
                            <p class="parents-tool-desc">Generate targeted quiz links, 60-second fluency sprints, and classroom assignments.</p>
                        </div>
                        <span class="parents-tool-action action-teal">
                            Build Assignment <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>

                    <!-- Companion Tool 3: Printable Worksheets & Rubrics -->
                    <a href="/assessment/" class="parents-tool-card hover-lift">
                        <div class="parents-tool-card-content">
                            <div class="parents-tool-icon icon-amber">
                                <i class="fas fa-print"></i>
                            </div>
                            <h3 class="parents-tool-title">Printable Worksheets</h3>
                            <p class="parents-tool-desc">Download clean 2-page practice packets with educator answer keys and scoring rubrics.</p>
                        </div>
                        <span class="parents-tool-action action-amber">
                            Generate Worksheets <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </section>

            <!-- IEP & Neurodiversity Accommodations Guide -->
            <section id="accommodations" class="parents-section">
                <div class="glass-panel parents-accommodations-card">
                    <div class="parents-section-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                        <div>
                            <h2 class="parents-section-title">
                                <i class="fas fa-universal-access" style="color:#10b981;"></i> IEP & Neurodiversity Accommodations Guide
                            </h2>
                            <p class="parents-section-desc">Interactive checklist of evidence-based accommodations for ADHD, Autism, Dyslexia, and Sensory Processing.</p>
                        </div>
                        <div class="no-print" style="display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                            <span class="accommodations-counter-pill" id="accommodations-counter-pill">
                                <i class="fas fa-check-circle" style="color:#10b981;"></i> <span id="accommodations-active-count">0</span> Active Supports
                            </span>
                            <button type="button" onclick="window.openIepBriefModal()" class="parents-tool-btn" style="background: linear-gradient(135deg, #10b981, #059669); padding: 0.45rem 1rem; font-size: 0.85rem; border: none; cursor: pointer; color: #ffffff; font-weight: 700; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem;" aria-label="Generate IEP or 504 Meeting Brief">
                                <i class="fas fa-file-signature"></i> IEP/504 Meeting Brief
                            </button>
                            <button type="button" onclick="window.printAccommodationsGuide()" class="parents-tool-btn" style="background: var(--color-primary, #4f46e5); padding: 0.45rem 1rem; font-size: 0.85rem; border: none; cursor: pointer;">
                                <i class="fas fa-print"></i> Print Accommodations Plan (PDF)
                            </button>
                        </div>
                    </div>

                    <div class="accommodations-grid" id="accommodations-grid">
                        <!-- Category 1: Sensory & Emotional Regulation -->
                        <div class="accommodation-category-card">
                            <h3 class="accommodation-cat-title"><i class="fas fa-spa" style="color:#0d9488;"></i> Sensory & Emotional Regulation</h3>
                            <div class="accommodation-items-list">
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="sensory-retreat" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Dedicated Calm Focus Retreat</span>
                                        <span class="acc-tip">Establish a designated low-stimulus nook free from bright lighting and foot traffic for emotional regulation.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="movement-breaks" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Scheduled 5-Minute Movement Resets</span>
                                        <span class="acc-tip">Insert structured kinesthetic stretches, jumping jacks, or balance exercises between seated focus blocks.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="sensory-tools" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Sensory Fidget & Proprioceptive Tools</span>
                                        <span class="acc-tip">Allow textured grips, weighted lap pads, or wobble cushions to maintain tactile engagement during study.</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Category 2: Dyslexia & Reading Accessibility -->
                        <div class="accommodation-category-card">
                            <h3 class="accommodation-cat-title"><i class="fas fa-book-reader" style="color:#7c3aed;"></i> Dyslexia & Reading Supports</h3>
                            <div class="accommodation-items-list">
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="opendyslexic" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">OpenDyslexic Typeface & High Contrast</span>
                                        <span class="acc-tip">Enable bottom-heavy letterforms and warm background tint via the global Accessibility menu to prevent visual crowding.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="reading-ruler" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Line-Highlight Reading Ruler Guide</span>
                                        <span class="acc-tip">Utilize focused line-by-line reading guides to eliminate skipping lines while reading literature or word problems.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="tts-audio" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Bimodal Text-to-Speech Synchronized Audio</span>
                                        <span class="acc-tip">Use the built-in TTS audio speech player across lessons and library readers for simultaneous auditory and visual decoding.</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Category 3: Executive Functioning & Focus -->
                        <div class="accommodation-category-card">
                            <h3 class="accommodation-cat-title"><i class="fas fa-stopwatch" style="color:#ea580c;"></i> Executive Functioning & Pacing</h3>
                            <div class="accommodation-items-list">
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="untimed-mode" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Low-Anxiety Untimed Practice Mode</span>
                                        <span class="acc-tip">Suppress countdown timers and high-pressure counters on quizzes using our Calm Focus Practice toggle.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="chunked-tasks" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Chunked Task Presentation (5 at a time)</span>
                                        <span class="acc-tip">Break extended problem sets into 5-question micro-milestones to protect executive working memory.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="visual-schedule" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Visible Visual Checklists & Milestones</span>
                                        <span class="acc-tip">Display checkable task timelines on the wall or screen so children anticipate upcoming transitions easily.</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Category 4: Mastery Progression & Sovereignty -->
                        <div class="accommodation-category-card">
                            <h3 class="accommodation-cat-title"><i class="fas fa-medal" style="color:#2563eb;"></i> Mastery-Based Progression</h3>
                            <div class="accommodation-items-list">
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="mastery-gate" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Competency-Based Advancement</span>
                                        <span class="acc-tip">Advance subjects based on demonstrated mastery (80%+) rather than rigid age-locked grade levels.</span>
                                    </div>
                                </label>
                                <label class="accommodation-item">
                                    <input type="checkbox" data-acc="offline-sovereignty" onchange="toggleAccommodation(this)">
                                    <div class="acc-text-wrap">
                                        <span class="acc-title">Offline Resilient Study Sessions</span>
                                        <span class="acc-tip">Complete lessons and literature reading without active internet connections to prevent online distractions.</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Visual Home Routine & Daily/Weekly Schedule Builder -->
            <section id="schedule" class="parents-section">
                <div class="glass-panel parents-schedule-card">
                    <!-- Schedule Tabs Navigation -->
                    <div class="schedule-tabs-bar no-print">
                        <button type="button" class="schedule-tab-btn active" id="btn-tab-sched-daily" onclick="switchScheduleView('daily')">
                            <i class="fas fa-clock"></i> Daily Time Rhythm
                        </button>
                        <button type="button" class="schedule-tab-btn" id="btn-tab-sched-weekly" onclick="switchScheduleView('weekly')">
                            <i class="fas fa-calendar-check"></i> 36-Week Homeschool Checklist
                        </button>
                    </div>

                    <!-- VIEW 1: DAILY TIME RHYTHM -->
                    <div id="schedule-daily-view">
                        <div class="parents-section-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                            <div>
                                <h2 class="parents-section-title">
                                    <i class="fas fa-calendar-alt" style="color:#d97706;"></i> Visual Home Routine & Daily Schedule
                                </h2>
                                <p class="parents-section-desc">Design a balanced, neurodiversity-friendly daily routine and print a wall schedule for your homeschool space.</p>
                            </div>
                            <div class="no-print" style="display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                                <button type="button" onclick="window.printDailySchedule()" class="parents-tool-btn" style="background: linear-gradient(135deg, #f59e0b, #d97706); padding: 0.45rem 1rem; font-size: 0.85rem; border: none; cursor: pointer;">
                                    <i class="fas fa-print"></i> Print Refrigerator Schedule
                                </button>
                            </div>
                        </div>

                        <!-- Schedule Configuration Toolbar -->
                        <div class="schedule-config-bar no-print">
                            <div class="schedule-config-item">
                                <label for="sched-start-time" class="schedule-config-label"><i class="fas fa-sun" style="color:#f59e0b;"></i> Morning Start Time:</label>
                                <select id="sched-start-time" onchange="updateScheduleTimes()" class="parents-form-input" style="padding: 0.4rem 0.75rem; width: auto; font-size: 0.875rem;">
                                    <option value="8:00">8:00 AM</option>
                                    <option value="8:30" selected>8:30 AM</option>
                                    <option value="9:00">9:00 AM</option>
                                    <option value="9:30">9:30 AM</option>
                                </select>
                            </div>
                            <div class="schedule-config-item">
                                <label for="sched-pacing-style" class="schedule-config-label"><i class="fas fa-sliders-h" style="color:#6366f1;"></i> Pacing Rhythm:</label>
                                <select id="sched-pacing-style" onchange="updateScheduleTimes()" class="parents-form-input" style="padding: 0.4rem 0.75rem; width: auto; font-size: 0.875rem;">
                                    <option value="standard" selected>Balanced Focus (40m blocks / 15m breaks)</option>
                                    <option value="pomodoro">Pomodoro (25m blocks / 5m sensory resets)</option>
                                    <option value="gentle">Gentle Pacing (30m blocks / 20m breaks)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Interactive Timeline Block Cards -->
                        <div class="schedule-blocks-container" id="schedule-blocks-container">
                            <!-- Populated dynamically via JS -->
                        </div>
                    </div>

                    <!-- VIEW 2: 36-WEEK HOMESCHOOL PACING CHECKLIST -->
                    <div id="schedule-weekly-view" style="display: none;">
                        <div class="parents-section-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                            <div>
                                <h2 class="parents-section-title">
                                    <i class="fas fa-tasks text-emerald-600"></i> 36-Week Homeschool Pacing Checklist
                                </h2>
                                <p class="parents-section-desc">Interactive Monday–Friday curriculum matrix covering all subjects across all grades. Check off completed lessons in real time.</p>
                            </div>
                            <div class="no-print" style="display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                                <button type="button" onclick="window.printWeeklySchedule()" class="parents-tool-btn" style="background: #059669; padding: 0.45rem 1rem; font-size: 0.85rem; border: none; cursor: pointer;">
                                    <i class="fas fa-print"></i> Print Weekly Checklist
                                </button>
                            </div>
                        </div>

                        <!-- Weekly Matrix Toolbar -->
                        <div class="weekly-matrix-toolbar no-print">
                            <div class="weekly-selector-group">
                                <label for="week-grade-select" class="weekly-selector-label"><i class="fas fa-graduation-cap" style="color:#6366f1;"></i> Target Grade:</label>
                                <select id="week-grade-select" class="parents-form-input" style="padding: 0.4rem 0.75rem; width: auto; font-size: 0.875rem;" onchange="renderWeeklyPacingMatrix()">
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

                            <div class="weekly-selector-group">
                                <label for="week-quarter-select" class="weekly-selector-label"><i class="fas fa-chart-pie" style="color:#f59e0b;"></i> Quarter:</label>
                                <select id="week-quarter-select" class="parents-form-input" style="padding: 0.4rem 0.75rem; width: auto; font-size: 0.875rem;" onchange="handleQuarterChange()">
                                    <option value="1" selected>Quarter 1 (Weeks 1–9)</option>
                                    <option value="2">Quarter 2 (Weeks 10–18)</option>
                                    <option value="3">Quarter 3 (Weeks 19–27)</option>
                                    <option value="4">Quarter 4 (Weeks 28–36)</option>
                                </select>
                            </div>

                            <div class="weekly-selector-group">
                                <label for="week-number-select" class="weekly-selector-label"><i class="fas fa-list-ol" style="color:#10b981;"></i> Week Number:</label>
                                <select id="week-number-select" class="parents-form-input" style="padding: 0.4rem 0.75rem; width: auto; font-size: 0.875rem;" onchange="renderWeeklyPacingMatrix()">
                                    <!-- Populated dynamically -->
                                </select>
                            </div>

                            <!-- Progress Track -->
                            <div class="weekly-progress-wrap">
                                <div class="weekly-progress-track">
                                    <div class="weekly-progress-fill" id="weekly-prog-fill" style="width: 0%;"></div>
                                </div>
                                <span class="weekly-progress-text" id="weekly-prog-text">0 / 5 Completed (0%)</span>
                            </div>
                        </div>

                        <!-- 5-Day Monday to Friday Grid -->
                        <div class="week-days-grid" id="week-days-grid">
                            <!-- Rendered dynamically by JS -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Milestone Mastery & Achievement Diplomas -->
            <section id="certificates" class="parents-section">
                <div class="certificate-customizer-card">
                    <div class="parents-section-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                        <div>
                            <span class="parents-tool-badge" style="background: rgba(245,158,11,0.15); color: #d97706; margin-bottom: 0.5rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                                <i class="fas fa-award"></i> Homeschool Milestone Credentials
                            </span>
                            <h2 class="parents-section-title">
                                Official Achievement Diplomas & Certificate Generator
                            </h2>
                            <p class="parents-section-desc">Generate official 8.5" x 11" landscape mastery diplomas with gold foil seals, credential IDs, and customizable signatures for student portfolios.</p>
                        </div>
                    </div>

                    <!-- Customizer Form Grid -->
                    <div class="cert-form-grid no-print">
                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-name">
                                <i class="fas fa-user-graduate" style="color:#6366f1;"></i> Student Scholar Name:
                            </label>
                            <input type="text" id="cert-input-name" class="parents-form-input" placeholder="e.g. Leo Vance" oninput="updateCertPreview()">
                        </div>

                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-grade">
                                <i class="fas fa-graduation-cap" style="color:#10b981;"></i> Grade Level:
                            </label>
                            <select id="cert-input-grade" class="parents-form-input" onchange="updateCertPreview()">
                                <option value="Pre-K (Level A)">Pre-K (Level A)</option>
                                <option value="Kindergarten (Level B)">Kindergarten (Level B)</option>
                                <option value="1st Grade (Level C)">1st Grade (Level C)</option>
                                <option value="2nd Grade (Level D)">2nd Grade (Level D)</option>
                                <option value="3rd Grade (Level E)" selected>3rd Grade (Level E)</option>
                                <option value="4th Grade (Level F)">4th Grade (Level F)</option>
                                <option value="5th Grade (Level G)">5th Grade (Level G)</option>
                                <option value="6th Grade (Level H)">6th Grade (Level H)</option>
                                <option value="7th Grade (Level I)">7th Grade (Level I)</option>
                                <option value="8th Grade (Level J)">8th Grade (Level J)</option>
                                <option value="High School (Level K-N)">High School (Level K-N)</option>
                            </select>
                        </div>

                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-subject">
                                <i class="fas fa-book" style="color:#f59e0b;"></i> Subject or Field:
                            </label>
                            <select id="cert-input-subject" class="parents-form-input" onchange="updateCertPreview()">
                                <option value="Mathematics Competency & Problem Solving" selected>Mathematics (CCSS)</option>
                                <option value="English Language Arts & Literature Analysis">English Language Arts (CCSS)</option>
                                <option value="Science & Empirical Inquiry (NGSS)">Science (NGSS)</option>
                                <option value="Social Studies & Civic Inquiry (C3)">Social Studies (C3)</option>
                                <option value="All-Subject Academic Honor Roll & Pacing Mastery">Cumulative All-Subject Mastery</option>
                            </select>
                        </div>

                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-milestone">
                                <i class="fas fa-flag-checkered" style="color:#ec4899;"></i> Milestone / Benchmark Title:
                            </label>
                            <input type="text" id="cert-input-milestone" class="parents-form-input" placeholder="e.g. Quarter 1 36-Week Pacing Completion" value="Quarter 1 Master Curriculum Completion" oninput="updateCertPreview()">
                        </div>

                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-honors">
                                <i class="fas fa-medal" style="color:#d97706;"></i> Honors Distinction:
                            </label>
                            <select id="cert-input-honors" class="parents-form-input" onchange="updateCertPreview()">
                                <option value="Summa Cum Laude Honors (95%+)" selected>Summa Cum Laude (95%+ Mastery)</option>
                                <option value="High Honors Distinction (90%+)">High Honors Distinction (90%+)</option>
                                <option value="Academic Mastery (80%+)">Academic Mastery (80%+)</option>
                                <option value="Exemplary Effort & Persistence">Exemplary Effort & Persistence</option>
                            </select>
                        </div>

                        <div class="builder-field-group">
                            <label class="weekly-selector-label" for="cert-input-coach">
                                <i class="fas fa-signature" style="color:#0d9488;"></i> Parent / Educator Signature:
                            </label>
                            <input type="text" id="cert-input-coach" class="parents-form-input" placeholder="e.g. Eleanor Vance, Learning Coach" value="Homeschool Learning Coach" oninput="updateCertPreview()">
                        </div>
                    </div>

                    <!-- Live Diploma Preview Box -->
                    <div class="cert-preview-card">
                        <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 800; color: #b45309; letter-spacing: 0.05em; margin-bottom: 0.5rem;">
                            <i class="fas fa-eye"></i> Live Credential Preview
                        </div>
                        <h3 id="prev-cert-name" style="margin: 0; font-size: 1.5rem; font-weight: 800; color: #78350f; font-family: 'Cinzel', serif, Georgia;">Student Scholar</h3>
                        <p id="prev-cert-course" style="margin: 0.35rem 0 0 0; font-size: 0.95rem; color: #92400e; font-weight: 600;">
                            Quarter 1 Master Curriculum Completion (3rd Grade - Level E) — Summa Cum Laude Honors
                        </p>
                        <div style="margin-top: 1.25rem; display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
                            <button type="button" class="parents-tool-btn" style="background: linear-gradient(135deg, #f59e0b, #d97706); border: none; cursor: pointer; padding: 0.6rem 1.5rem; font-size: 0.95rem;" onclick="launchGeneratedDiploma()">
                                <i class="fas fa-print"></i> Generate & Print Official Diploma
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Interactive Laws Map -->
            <section id="laws" class="parents-section">
                <div class="glass-panel parents-laws-outer-card">
                    <div class="parents-laws-inner-card">
                        <div class="parents-laws-header">
                            <div>
                                <h2 class="parents-section-title">
                                    <i class="fas fa-gavel text-teal"></i> Homeschool Laws
                                </h2>
                                <p class="parents-section-desc">Select a state to view HSLDA legal requirements.</p>
                            </div>

                            <!-- Modern Search Bar -->
                            <div class="parents-laws-search-box">
                                <input type="text" id="stateSearch" placeholder="Find state..." class="parents-laws-search-input">
                                <i class="fas fa-search parents-laws-search-icon"></i>
                            </div>
                        </div>

                        <!-- States Grid (Chips Style) -->
                        <div id="stateGrid" class="parents-state-grid no-scrollbar">
                            <!-- Populated by JS -->
                        </div>

                        <div id="no-states-msg" class="parents-no-states" style="display: none;">
                            <i class="fas fa-search-location"></i>
                            <p>No states found.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feedback -->
            <section id="feedback" class="parents-section">
                <div class="parents-feedback-card">
                    <div class="parents-feedback-glow"></div>

                    <div class="parents-feedback-grid">
                        <div class="parents-feedback-info">
                            <h2 class="parents-feedback-title">We're Listening</h2>
                            <p class="parents-feedback-desc">Your feedback shapes our platform. Let us know how we can make your homeschooling journey easier.</p>
                            <div class="parents-feedback-human-check">
                                <i class="fas fa-check-circle"></i>
                                <span>Read by real humans</span>
                            </div>
                        </div>

                        <form id="feedbackForm" action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56" method="POST" target="_blank" class="parents-feedback-form">
                            <input type="hidden" name="_next" value="https://hestena62.com/thanks.html">
                            <input type="text" name="honey_check" style="display:none">

                            <input type="email" id="email" name="email" required placeholder="Your Email" class="parents-form-input">

                            <textarea id="feedbackText" name="feedback" rows="3" placeholder="What's on your mind?" class="parents-form-textarea"></textarea>

                            <button type="submit" class="parents-form-submit-btn">
                                Send Feedback
                            </button>
                        </form>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- Direct Support Strip -->
<div id="contact" class="parents-contact-strip">
    <div class="parents-contact-container">
        <p class="parents-contact-label">Direct Support</p>
        <div class="parents-contact-links">
            <a href="mailto:admin@hestena62.com" class="parents-contact-link">
                <i class="fas fa-envelope"></i> admin@hestena62.com
            </a>
        </div>
    </div>
</div>

<!-- State Requirements Modal Dialog (Pure Vanilla CSS) -->
<div id="state-modal" class="parents-modal-wrapper" aria-labelledby="modal-state-name" role="dialog" aria-modal="true" style="display: none;">
    <div class="parents-modal-backdrop" id="modal-backdrop"></div>

    <div class="parents-modal-container">
        <div class="parents-modal-dialog" id="modal-panel">
            <div class="parents-modal-banner"></div>
            <button id="modal-close" class="parents-modal-close-btn" aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>

            <div class="parents-modal-body">
                <div class="parents-modal-icon-badge">
                    <i class="fas fa-landmark"></i>
                </div>

                <h3 class="parents-modal-title" id="modal-state-name">State Name</h3>
                <p class="parents-modal-subtitle">Legal Requirements Summary</p>

                <div class="parents-modal-summary-box">
                    <p id="modal-summary">Loading...</p>
                </div>

                <a id="modal-hslda-link" href="#" target="_blank" class="parents-modal-cta-btn">
                    View Official Requirements <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // --- Data ---
    const states = [{
        name: "Alabama",
        url: "https://hslda.org/legal/alabama"
    },
    {
        name: "Alaska",
        url: "https://hslda.org/legal/alaska"
    },
    {
        name: "Arizona",
        url: "https://hslda.org/legal/arizona"
    },
    {
        name: "Arkansas",
        url: "https://hslda.org/legal/arkansas"
    },
    {
        name: "California",
        url: "https://hslda.org/legal/california"
    },
    {
        name: "Colorado",
        url: "https://hslda.org/legal/colorado"
    },
    {
        name: "Connecticut",
        url: "https://hslda.org/legal/connecticut"
    },
    {
        name: "Delaware",
        url: "https://hslda.org/legal/delaware"
    },
    {
        name: "Florida",
        url: "https://hslda.org/legal/florida"
    },
    {
        name: "Georgia",
        url: "https://hslda.org/legal/georgia"
    },
    {
        name: "Hawaii",
        url: "https://hslda.org/legal/hawaii"
    },
    {
        name: "Idaho",
        url: "https://hslda.org/legal/idaho"
    },
    {
        name: "Illinois",
        url: "https://hslda.org/legal/illinois"
    },
    {
        name: "Indiana",
        url: "https://hslda.org/legal/indiana"
    },
    {
        name: "Iowa",
        url: "https://hslda.org/legal/iowa"
    },
    {
        name: "Kansas",
        url: "https://hslda.org/legal/kansas"
    },
    {
        name: "Kentucky",
        url: "https://hslda.org/legal/kentucky"
    },
    {
        name: "Louisiana",
        url: "https://hslda.org/legal/louisiana"
    },
    {
        name: "Maine",
        url: "https://hslda.org/legal/maine"
    },
    {
        name: "Maryland",
        url: "https://hslda.org/legal/maryland"
    },
    {
        name: "Massachusetts",
        url: "https://hslda.org/legal/massachusetts"
    },
    {
        name: "Michigan",
        url: "https://hslda.org/legal/michigan"
    },
    {
        name: "Minnesota",
        url: "https://hslda.org/legal/minnesota"
    },
    {
        name: "Mississippi",
        url: "https://hslda.org/legal/mississippi"
    },
    {
        name: "Missouri",
        url: "https://hslda.org/legal/missouri"
    },
    {
        name: "Montana",
        url: "https://hslda.org/legal/montana"
    },
    {
        name: "Nebraska",
        url: "https://hslda.org/legal/nebraska"
    },
    {
        name: "Nevada",
        url: "https://hslda.org/legal/nevada"
    },
    {
        name: "New Hampshire",
        url: "https://hslda.org/legal/new-hampshire"
    },
    {
        name: "New Jersey",
        url: "https://hslda.org/legal/new-jersey"
    },
    {
        name: "New Mexico",
        url: "https://hslda.org/legal/new-mexico"
    },
    {
        name: "New York",
        url: "https://hslda.org/legal/new-york"
    },
    {
        name: "North Carolina",
        url: "https://hslda.org/legal/north-carolina"
    },
    {
        name: "North Dakota",
        url: "https://hslda.org/legal/north-dakota"
    },
    {
        name: "Ohio",
        url: "https://hslda.org/legal/ohio"
    },
    {
        name: "Oklahoma",
        url: "https://hslda.org/legal/oklahoma"
    },
    {
        name: "Oregon",
        url: "https://hslda.org/legal/oregon"
    },
    {
        name: "Pennsylvania",
        url: "https://hslda.org/legal/pennsylvania"
    },
    {
        name: "Rhode Island",
        url: "https://hslda.org/legal/rhode-island"
    },
    {
        name: "South Carolina",
        url: "https://hslda.org/legal/south-carolina"
    },
    {
        name: "South Dakota",
        url: "https://hslda.org/legal/south-dakota"
    },
    {
        name: "Tennessee",
        url: "https://hslda.org/legal/tennessee"
    },
    {
        name: "Texas",
        url: "https://hslda.org/legal/texas"
    },
    {
        name: "Utah",
        url: "https://hslda.org/legal/utah"
    },
    {
        name: "Vermont",
        url: "https://hslda.org/legal/vermont"
    },
    {
        name: "Virginia",
        url: "https://hslda.org/legal/virginia"
    },
    {
        name: "Washington",
        url: "https://hslda.org/legal/washington"
    },
    {
        name: "West Virginia",
        url: "https://hslda.org/legal/west-virginia"
    },
    {
        name: "Wisconsin",
        url: "https://hslda.org/legal/wisconsin"
    },
    {
        name: "Wyoming",
        url: "https://hslda.org/legal/wyoming"
    }
    ];

    // --- State Grid Logic ---
    const grid = document.getElementById('stateGrid');
    const searchInput = document.getElementById('stateSearch');
    const noStatesMsg = document.getElementById('no-states-msg');

    function renderStates(filterText = '') {
        grid.innerHTML = '';
        let count = 0;
        const lowerFilter = filterText.toLowerCase();

        states.forEach(state => {
            if (state.name.toLowerCase().includes(lowerFilter)) {
                const btn = document.createElement('button');
                btn.className = 'state-chip-btn';
                btn.textContent = state.name;
                btn.onclick = () => openModal(state);
                grid.appendChild(btn);
                count++;
            }
        });

        if (count === 0) {
            noStatesMsg.style.display = 'block';
        } else {
            noStatesMsg.style.display = 'none';
        }
    }

    renderStates();
    searchInput.addEventListener('input', (e) => renderStates(e.target.value));

    // --- Modal Logic ---
    const modal = document.getElementById('state-modal');
    const backdrop = document.getElementById('modal-backdrop');
    const panel = document.getElementById('modal-panel');
    const modalClose = document.getElementById('modal-close');
    const modalName = document.getElementById('modal-state-name');
    const modalLink = document.getElementById('modal-hslda-link');
    const modalSummary = document.getElementById('modal-summary');

    function openModal(state) {
        modalName.textContent = state.name;
        modalLink.href = state.url;
        modalSummary.textContent = `Homeschooling in ${state.name} is regulated by state statute. Tap the button below to see the specific forms and Notice of Intent requirements.`;

        modal.style.display = 'flex';
        setTimeout(() => {
            backdrop.classList.add('is-active');
            panel.classList.add('is-active');
        }, 10);
    }

    function closeModal() {
        backdrop.classList.remove('is-active');
        panel.classList.remove('is-active');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 250);
    }

    modalClose.onclick = closeModal;
    backdrop.onclick = closeModal;
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display !== 'none') closeModal();
    });

    // --- Feedback ---
    document.getElementById('feedbackForm').addEventListener('submit', function (event) {
        const feedback = document.getElementById('feedbackText').value.trim();
        if (!feedback) {
            event.preventDefault();
            if (typeof showMessageBox === 'function') showMessageBox('Please enter your feedback.');
            else alert('Feedback cannot be empty.');
        }
    });

    // --- IEP & Accommodations Persistence ---
    const STORAGE_KEY_ACC = 'hesten_parent_accommodations';

    function getSavedAccommodations() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY_ACC);
            if (raw) return JSON.parse(raw);
        } catch (e) {}
        return ['sensory-retreat', 'movement-breaks', 'opendyslexic', 'untimed-mode'];
    }

    function saveAccommodations(arr) {
        try {
            localStorage.setItem(STORAGE_KEY_ACC, JSON.stringify(arr));
            if (typeof window.hlBroadcastSync === 'function') {
                window.hlBroadcastSync('accommodations', arr);
            }
        } catch (e) {}
    }

    function toggleAccommodation(checkbox) {
        const key = checkbox.getAttribute('data-acc');
        let current = getSavedAccommodations();
        if (checkbox.checked) {
            if (!current.includes(key)) current.push(key);
        } else {
            current = current.filter(k => k !== key);
        }
        saveAccommodations(current);
        updateAccommodationsCountBadge();
    }

    function updateAccommodationsCountBadge() {
        const active = getSavedAccommodations();
        const countEl = document.getElementById('accommodations-active-count');
        if (countEl) countEl.textContent = active.length;
    }

    function loadSavedAccommodations() {
        const saved = getSavedAccommodations();
        const checkboxes = document.querySelectorAll('#accommodations-grid input[type="checkbox"]');
        checkboxes.forEach(cb => {
            const key = cb.getAttribute('data-acc');
            cb.checked = saved.includes(key);
        });
        updateAccommodationsCountBadge();
    }

    window.printAccommodationsGuide = function() {
        window.print();
    };

    // --- Daily Schedule Builder ---
    function formatMinutesToTime(totalMins) {
        let hours = Math.floor(totalMins / 60);
        let mins = totalMins % 60;
        let period = hours >= 12 ? 'PM' : 'AM';
        let displayHour = hours % 12;
        if (displayHour === 0) displayHour = 12;
        let displayMins = mins < 10 ? '0' + mins : mins;
        return `${displayHour}:${displayMins} ${period}`;
    }

    function updateScheduleTimes() {
        const startSelect = document.getElementById('sched-start-time');
        const pacingSelect = document.getElementById('sched-pacing-style');
        const container = document.getElementById('schedule-blocks-container');
        if (!container) return;

        const startVal = startSelect ? startSelect.value : '8:30';
        const [sH, sM] = startVal.split(':').map(Number);
        let currentMinutes = sH * 60 + sM;

        const pacing = pacingSelect ? pacingSelect.value : 'standard';
        let focusMins = 40, breakMins = 15, lunchMins = 50;
        if (pacing === 'pomodoro') {
            focusMins = 25; breakMins = 5; lunchMins = 45;
        } else if (pacing === 'gentle') {
            focusMins = 30; breakMins = 20; lunchMins = 60;
        }

        const routineBlocks = [
            {
                title: "Morning Launch & Mindful Warmup",
                desc: "Check-in conversation, daily goal setting, and sensory breathing warmup.",
                duration: 15,
                icon: "fa-sun",
                color: "#4f46e5",
                tag: "Mindset"
            },
            {
                title: "Core Mathematics Mastery",
                desc: "Standard-aligned math exploration with concrete manipulatives or interactive curriculum lessons.",
                duration: focusMins,
                icon: "fa-calculator",
                color: "#059669",
                tag: "Academic",
                link: "/levels/"
            },
            {
                title: "Sensory Movement Reset & Healthy Snack",
                desc: "Proprioceptive stretching, water hydration, and healthy brain-fuel nourishment.",
                duration: breakMins,
                icon: "fa-apple-alt",
                color: "#0d9488",
                tag: "Wellness"
            },
            {
                title: "English Language Arts & Literature Reading",
                desc: "Reading comprehension, vocabulary popovers, or Parts of Speech grammar investigation.",
                duration: focusMins,
                icon: "fa-book-reader",
                color: "#7c3aed",
                tag: "Academic",
                link: "/library/"
            },
            {
                title: "Science Inquiry & Multimodal Lab Exploration",
                desc: "Hands-on Chemistry pH testing, timeline investigation, or interactive simulation labs.",
                duration: focusMins,
                icon: "fa-flask",
                color: "#ea580c",
                tag: "Discovery",
                link: "/student/interactive-labs.php"
            },
            {
                title: "Nourishing Lunch & Outdoor Kinesthetic Play",
                desc: "Social family mealtime, sunshine, and unstructured physical movement.",
                duration: lunchMins,
                icon: "fa-running",
                color: "#10b981",
                tag: "Recharge"
            },
            {
                title: "Educational Play & Speed Sprint Fluency",
                desc: "Celebratory educational play: 60-Second Speed Sprint arithmetic or Memory Match.",
                duration: 25,
                icon: "fa-bolt",
                color: "#f59e0b",
                tag: "Fluency",
                link: "/pages/games.php"
            }
        ];

        let html = '';
        routineBlocks.forEach((block, idx) => {
            const blockStart = formatMinutesToTime(currentMinutes);
            currentMinutes += block.duration;
            const blockEnd = formatMinutesToTime(currentMinutes);

            html += `
                <div class="schedule-block-row">
                    <div class="schedule-time-badge">
                        <span class="sched-start">${blockStart}</span>
                        <span class="sched-to">to</span>
                        <span class="sched-end">${blockEnd}</span>
                        <span class="sched-dur">(${block.duration} min)</span>
                    </div>
                    <div class="schedule-block-content">
                        <div class="sched-icon-pill" style="background: ${block.color}15; color: ${block.color};">
                            <i class="fas ${block.icon}"></i>
                        </div>
                        <div class="sched-details">
                            <div class="sched-header-line">
                                <h4 class="sched-title">${block.title}</h4>
                                <span class="sched-tag" style="border-color: ${block.color}40; color: ${block.color};">${block.tag}</span>
                            </div>
                            <p class="sched-desc">${block.desc}</p>
                            ${block.link ? `<a href="${block.link}" class="sched-link no-print" target="_blank">Open Resource <i class="fas fa-arrow-right"></i></a>` : ''}
                        </div>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    window.printDailySchedule = function() {
        window.print();
    };

    // =========================================================================
    // 36-WEEK INTERACTIVE WEEKLY HOMESCHOOL PACING MATRIX
    // =========================================================================
    const STORAGE_KEY_CHECKLIST = 'hesten_homeschool_checklist';

    function getChecklistState() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY_CHECKLIST);
            if (raw) return JSON.parse(raw);
        } catch (e) {}
        return {};
    }

    function saveChecklistState(state) {
        try {
            localStorage.setItem(STORAGE_KEY_CHECKLIST, JSON.stringify(state));
        } catch (e) {}
    }

    window.switchScheduleView = function(view) {
        const dailyBtn = document.getElementById('btn-tab-sched-daily');
        const weeklyBtn = document.getElementById('btn-tab-sched-weekly');
        const dailyView = document.getElementById('schedule-daily-view');
        const weeklyView = document.getElementById('schedule-weekly-view');

        if (view === 'weekly') {
            if (dailyBtn) dailyBtn.classList.remove('active');
            if (weeklyBtn) weeklyBtn.classList.add('active');
            if (dailyView) dailyView.style.display = 'none';
            if (weeklyView) weeklyView.style.display = 'block';
            handleQuarterChange();
        } else {
            if (weeklyBtn) weeklyBtn.classList.remove('active');
            if (dailyBtn) dailyBtn.classList.add('active');
            if (weeklyView) weeklyView.style.display = 'none';
            if (dailyView) dailyView.style.display = 'block';
        }
    };

    window.handleQuarterChange = function() {
        const qSelect = document.getElementById('week-quarter-select');
        const wSelect = document.getElementById('week-number-select');
        if (!qSelect || !wSelect) return;

        const q = parseInt(qSelect.value, 10) || 1;
        const startWeek = (q - 1) * 9 + 1;
        const endWeek = q * 9;

        wSelect.innerHTML = '';
        for (let w = startWeek; w <= endWeek; w++) {
            const opt = document.createElement('option');
            opt.value = w;
            opt.textContent = `Week ${w}`;
            wSelect.appendChild(opt);
        }

        renderWeeklyPacingMatrix();
    };

    window.renderWeeklyPacingMatrix = function() {
        const gradeSelect = document.getElementById('week-grade-select');
        const weekSelect = document.getElementById('week-number-select');
        const grid = document.getElementById('week-days-grid');
        if (!grid) return;

        const grade = gradeSelect ? gradeSelect.value : '3';
        const week = weekSelect ? parseInt(weekSelect.value, 10) || 1 : 1;
        const checklist = getChecklistState();

        const gradeNames = {
            'pre-k': 'Pre-K', 'k': 'Kindergarten', '1': 'Grade 1', '2': 'Grade 2',
            '3': 'Grade 3', '4': 'Grade 4', '5': 'Grade 5', '6': 'Grade 6',
            '7': 'Grade 7', '8': 'Grade 8', 'hs': 'High School'
        };
        const gradeLabel = gradeNames[grade] || `Grade ${grade}`;

        // Generate 5 days of structured homeschool curriculum tasks
        const weekData = [
            {
                day: 'Monday',
                focus: 'Math Mastery',
                badge: 'badge-math',
                subject: 'Mathematics Core',
                taskTitle: `${gradeLabel} Mathematics (Week ${week})`,
                desc: `Standard benchmark focus: procedural fluency, conceptual modeling, and visual representation.`,
                link: `/pages/teachers.php#builder`
            },
            {
                day: 'Tuesday',
                focus: 'ELA & Literature',
                badge: 'badge-ela',
                subject: 'English Language Arts',
                taskTitle: `${gradeLabel} Text Analysis & Writing`,
                desc: `Guided close reading, vocabulary context clues, and central theme textual evidence.`,
                link: `/library/`
            },
            {
                day: 'Wednesday',
                focus: 'Science Inquiry',
                badge: 'badge-sci',
                subject: 'Science & Discovery',
                taskTitle: `${gradeLabel} Empirical Investigation`,
                desc: `Hands-on inquiry lab, data observation tables, and Claim-Evidence-Reasoning (CER) synthesis.`,
                link: `/student/interactive-labs.php`
            },
            {
                day: 'Thursday',
                focus: 'Social Studies',
                badge: 'badge-soc',
                subject: 'Social Studies & Civics',
                taskTitle: `${gradeLabel} Historical & Civic Inquiry`,
                desc: `Primary source document exploration, geographical spatial mapping, and civic principles.`,
                link: `/pages/standards.php`
            },
            {
                day: 'Friday',
                focus: 'Review & Sprints',
                badge: 'badge-read',
                subject: 'Fluency & Independent Reading',
                taskTitle: `Weekly Sprint & Reading Log`,
                desc: `60-Second Speed Sprint fluency checkpoint, independent library reading streak, and portfolio update.`,
                link: `/pages/games.php`
            }
        ];

        let completedCount = 0;
        let html = '';

        weekData.forEach((dayItem, idx) => {
            const taskId = `task_${grade}_w${week}_d${idx+1}`;
            const isDone = !!checklist[taskId];
            if (isDone) completedCount++;

            html += `
                <div class="week-day-col">
                    <div class="week-day-header">
                        <h4 class="week-day-title">${dayItem.day}</h4>
                        <span class="week-day-tag">${dayItem.focus}</span>
                    </div>
                    <div class="week-task-list">
                        <label class="week-task-card ${isDone ? 'completed' : ''}" for="${taskId}">
                            <input type="checkbox" id="${taskId}" class="week-task-checkbox" ${isDone ? 'checked' : ''} onchange="toggleWeeklyTask('${taskId}')">
                            <div class="week-task-info">
                                <span class="week-task-badge ${dayItem.badge}">${dayItem.subject}</span>
                                <div class="week-task-subject">${dayItem.taskTitle}</div>
                                <div class="week-task-desc">${dayItem.desc}</div>
                                ${dayItem.link ? `<a href="${dayItem.link}" class="sched-link no-print" target="_blank">Open Lesson <i class="fas fa-arrow-right"></i></a>` : ''}
                            </div>
                        </label>
                    </div>
                </div>
            `;
        });

        grid.innerHTML = html;

        // Update progress track
        const pct = Math.round((completedCount / 5) * 100);
        const fillEl = document.getElementById('weekly-prog-fill');
        const textEl = document.getElementById('weekly-prog-text');
        if (fillEl) fillEl.style.width = `${pct}%`;
        if (textEl) textEl.textContent = `${completedCount} / 5 Completed (${pct}%)`;
    };

    window.toggleWeeklyTask = function(taskId) {
        const checklist = getChecklistState();
        checklist[taskId] = !checklist[taskId];
        saveChecklistState(checklist);
        renderWeeklyPacingMatrix();
    };

    window.printWeeklySchedule = function() {
        window.print();
    };

    // =========================================================================
    // MILESTONE MASTERY CERTIFICATE GENERATOR CONTROLS
    // =========================================================================
    window.updateCertPreview = function() {
        const nameInput = document.getElementById('cert-input-name');
        const gradeInput = document.getElementById('cert-input-grade');
        const subjectInput = document.getElementById('cert-input-subject');
        const milestoneInput = document.getElementById('cert-input-milestone');
        const honorsInput = document.getElementById('cert-input-honors');

        const prevName = document.getElementById('prev-cert-name');
        const prevCourse = document.getElementById('prev-cert-course');

        let studentName = nameInput ? nameInput.value.trim() : '';
        if (!studentName) {
            try {
                const profileRaw = localStorage.getItem('hesten_user_profile') || localStorage.getItem('hesten-user-profile');
                if (profileRaw) {
                    const prof = JSON.parse(profileRaw);
                    if (prof.firstName) studentName = prof.firstName;
                }
            } catch (e) {}
        }
        if (!studentName) studentName = 'Student Scholar';

        const grade = gradeInput ? gradeInput.value : '3rd Grade (Level E)';
        const milestone = milestoneInput ? milestoneInput.value.trim() : 'Academic Milestone Mastery';
        const honors = honorsInput ? honorsInput.value : 'Summa Cum Laude Honors';

        if (prevName) prevName.textContent = studentName;
        if (prevCourse) prevCourse.textContent = `${milestone} (${grade}) — ${honors}`;
    };

    window.launchGeneratedDiploma = function() {
        const nameInput = document.getElementById('cert-input-name');
        const gradeInput = document.getElementById('cert-input-grade');
        const subjectInput = document.getElementById('cert-input-subject');
        const milestoneInput = document.getElementById('cert-input-milestone');
        const honorsInput = document.getElementById('cert-input-honors');
        const coachInput = document.getElementById('cert-input-coach');

        let studentName = nameInput ? nameInput.value.trim() : '';
        const grade = gradeInput ? gradeInput.value : '3rd Grade (Level E)';
        const milestone = milestoneInput ? milestoneInput.value.trim() : 'Mastery Benchmark';
        const honors = honorsInput ? honorsInput.value : 'Summa Cum Laude Honors';
        const coach = coachInput ? coachInput.value.trim() : 'Homeschool Learning Coach';

        if (window.openCertificateModal) {
            window.openCertificateModal({
                studentName: studentName,
                courseTitle: milestone,
                gradeLevel: grade,
                honorsDistinction: honors,
                parentName: coach
            });
        }
    };

    // =========================================================================
    // IEP / 504 MEETING BRIEF GENERATOR
    // =========================================================================
    const ACC_DETAILS_MAP = {
        'sensory-retreat': { title: 'Dedicated Calm Focus Retreat', cat: 'Sensory & Regulation', desc: 'Designated low-stimulus workspace free from visual and auditory distractions.' },
        'movement-breaks': { title: 'Scheduled 5-Minute Movement Resets', cat: 'Sensory & Regulation', desc: 'Kinesthetic breaks and proprioceptive stretching between seated focus blocks.' },
        'sensory-tools': { title: 'Sensory Fidget & Proprioceptive Tools', cat: 'Sensory & Regulation', desc: 'Textured grips, weighted lap pads, or wobble cushions to sustain tactile focus.' },
        'opendyslexic': { title: 'OpenDyslexic Typeface & Contrast Tints', cat: 'Dyslexia & Reading', desc: 'High-contrast bottom-weighted typography to prevent letter flipping and crowding.' },
        'reading-ruler': { title: 'Guided Line-Highlight Reading Ruler', cat: 'Dyslexia & Reading', desc: 'Focus aperture to guide eye tracking and eliminate line skipping.' },
        'tts-audio': { title: 'Synchronized Text-to-Speech Audio', cat: 'Dyslexia & Reading', desc: 'Bimodal auditory and visual decoding for all texts, word problems, and questions.' },
        'untimed-mode': { title: 'Low-Anxiety Untimed Practice Mode', cat: 'Executive Function', desc: 'Elimination of countdown timers to protect against executive processing anxiety.' },
        'chunked-tasks': { title: 'Chunked Problem Sets (5 at a time)', cat: 'Executive Function', desc: 'Micro-milestones to manage working memory and prevent cognitive overload.' },
        'visual-schedule': { title: 'Visual Checklists & Daily Pacing Timelines', cat: 'Executive Function', desc: 'Predictable visual schedule to ease task switching and transitions.' },
        'mastery-gate': { title: 'Competency-Based Advancement (80%+)', cat: 'Mastery Progression', desc: 'Progress based on verified mastery rather than arbitrary seat-time.' },
        'offline-sovereignty': { title: 'Offline-Resilient Study Sessions', cat: 'Mastery Progression', desc: 'Distraction-free offline access for literature and core curriculum practice.' }
    };

    window.openIepBriefModal = function() {
        const modal = document.getElementById('iep-brief-modal');
        if (!modal) return;

        // Auto-fill student profile
        let studentName = '';
        let gradeLevel = '3rd Grade (Level E)';
        try {
            const rawProf = localStorage.getItem('hesten_user_profile') || localStorage.getItem('hesten-user-profile');
            if (rawProf) {
                const p = JSON.parse(rawProf);
                if (p.firstName) studentName = p.firstName + (p.lastName ? (' ' + p.lastName) : '');
                if (p.grade) gradeLevel = p.grade;
            }
        } catch (e) {}

        const nameInput = document.getElementById('iep-student-name');
        const gradeInput = document.getElementById('iep-student-grade');
        const dateInput = document.getElementById('iep-meeting-date');
        const mgrInput = document.getElementById('iep-case-manager');

        if (nameInput) nameInput.value = studentName || 'Student Scholar';
        if (gradeInput) gradeInput.value = gradeLevel;
        if (dateInput && !dateInput.value) dateInput.value = new Date().toISOString().split('T')[0];
        if (mgrInput && !mgrInput.value) mgrInput.value = 'Homeschool Learning Coach';

        window.syncIepBriefPreview();
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    };

    window.closeIepBriefModal = function() {
        const modal = document.getElementById('iep-brief-modal');
        if (modal) modal.style.display = 'none';
        document.body.style.overflow = '';
    };

    window.syncIepBriefPreview = function() {
        const container = document.getElementById('iep-brief-sheet');
        if (!container) return;

        const name = (document.getElementById('iep-student-name')?.value || 'Student Scholar').trim();
        const grade = (document.getElementById('iep-student-grade')?.value || 'Current Grade').trim();
        const meetingDate = document.getElementById('iep-meeting-date')?.value || new Date().toLocaleDateString();
        const manager = (document.getElementById('iep-case-manager')?.value || 'Homeschool Learning Coach').trim();

        // Active Accommodations
        const activeKeys = getSavedAccommodations();
        const activeAccs = activeKeys.map(k => ACC_DETAILS_MAP[k]).filter(Boolean);

        // Standards Mastery Statistics
        let standards = {};
        try {
            const rawStd = localStorage.getItem('hesten_standards_mastery');
            if (rawStd) standards = JSON.parse(rawStd);
        } catch (e) {}

        const stdEntries = Object.entries(standards);
        const totalAssessed = stdEntries.length;
        let masteredCount = 0;
        let proficientCount = 0;
        let developingCount = 0;

        stdEntries.forEach(([_, data]) => {
            const score = data.percentage ?? (data.bestScore ?? (data.score ?? 0));
            if (score >= 80) masteredCount++;
            else if (score >= 60) proficientCount++;
            else developingCount++;
        });

        // HTML Sheet
        container.innerHTML = `
            <div class="iep-sheet-header">
                <div>
                    <h3 class="iep-sheet-title">INDIVIDUALIZED ACCOMMODATION &amp; MASTERY BRIEF</h3>
                    <p class="iep-sheet-subtitle">Official Student Portfolio Document for IEP, 504 Plan, and Committee Reviews</p>
                </div>
                <div style="text-align: right; font-size: 0.75rem; color: #64748b;">
                    <strong>Hesten's Learning Platform</strong><br>
                    Standards-Aligned Portfolio
                </div>
            </div>

            <table class="iep-meta-table">
                <tr>
                    <td class="meta-label">Student Name:</td>
                    <td><strong>${name}</strong></td>
                    <td class="meta-label">Grade / Academic Level:</td>
                    <td>${grade}</td>
                </tr>
                <tr>
                    <td class="meta-label">Meeting / Effective Date:</td>
                    <td>${meetingDate}</td>
                    <td class="meta-label">Case Manager / Coach:</td>
                    <td>${manager}</td>
                </tr>
            </table>

            <h4 class="iep-sheet-section-title">
                <i class="fas fa-check-circle" style="color: #10b981;"></i> Active Section 504 / IEP Instructional Accommodations
            </h4>
            ${activeAccs.length > 0 ? `
                <div class="iep-acc-list">
                    ${activeAccs.map(a => `
                        <div class="iep-acc-item">
                            <strong>${a.title}</strong> (${a.cat})<br>
                            <span style="font-size: 0.75rem; color: #475569;">${a.desc}</span>
                        </div>
                    `).join('')}
                </div>
            ` : `
                <p style="font-size: 0.85rem; color: #64748b; font-style: italic;">No specific platform accommodations currently checked. Student is utilizing standard accessible baseline settings.</p>
            `}

            <h4 class="iep-sheet-section-title">
                <i class="fas fa-chart-line" style="color: #3b82f6;"></i> Standardized Formative Mastery &amp; Performance Summary
            </h4>
            <div class="iep-mastery-stats-grid">
                <div class="iep-mastery-stat-box">
                    <div class="iep-stat-num" style="color: #10b981;">${masteredCount}</div>
                    <div class="iep-stat-label">Standards Mastered (80%+)</div>
                </div>
                <div class="iep-mastery-stat-box">
                    <div class="iep-stat-num" style="color: #3b82f6;">${proficientCount}</div>
                    <div class="iep-stat-label">Proficient Competencies (60–79%)</div>
                </div>
                <div class="iep-mastery-stat-box">
                    <div class="iep-stat-num" style="color: #f59e0b;">${totalAssessed}</div>
                    <div class="iep-stat-label">Total Standards Evaluated</div>
                </div>
            </div>

            <h4 class="iep-sheet-section-title">
                <i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Universal Design for Learning (UDL) Scaffolds In Effect
            </h4>
            <ul style="font-size: 0.825rem; line-height: 1.6; color: #334155; margin: 0 0 1.5rem 1.25rem; padding: 0;">
                <li><strong>Multimodal Representation:</strong> Synchronized text-to-speech audio with visual word and option highlighting across all formative assessments and reading passages.</li>
                <li><strong>Flexible Expression:</strong> Keyboard shortcuts (1-4 option hotkeys, Enter navigation) and digital scratchpad support for multi-step reasoning.</li>
                <li><strong>Cognitive Regulation:</strong> Untimed low-anxiety mode and sensory retreat options protecting against test anxiety and cognitive overload.</li>
            </ul>

            <div class="iep-signature-grid">
                <div class="iep-sig-line">
                    Parent / Guardian Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date
                </div>
                <div class="iep-sig-line">
                    Special Education Case Manager / Educator &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date
                </div>
            </div>
        `;
    };

    window.printIepBrief = function() {
        document.body.classList.add('printing-iep-brief');
        window.print();
        window.addEventListener('afterprint', () => {
            document.body.classList.remove('printing-iep-brief');
        }, { once: true });
    };

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            window.closeIepBriefModal();
        }
    });

    // Load initial parents hub states
    document.addEventListener('DOMContentLoaded', () => {
        loadSavedAccommodations();
        updateScheduleTimes();
        handleQuarterChange();
        updateCertPreview();

        window.addEventListener('hl:accommodations-updated', () => {
            loadSavedAccommodations();
        });
    });
</script>

<!-- One-Click IEP / 504 Meeting Brief Modal -->
<div id="iep-brief-modal" class="iep-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="iep-modal-title" style="display: none;">
    <div class="iep-modal-card">
        <div class="iep-modal-header">
            <div>
                <span class="parents-tool-badge" style="background: rgba(16, 185, 129, 0.15); color: #059669; margin-bottom: 0.35rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <i class="fas fa-file-signature"></i> Official Meeting Documentation
                </span>
                <h2 id="iep-modal-title" class="iep-modal-title">IEP / 504 Accommodation &amp; Progress Brief</h2>
            </div>
            <button type="button" class="iep-modal-close" onclick="window.closeIepBriefModal()" aria-label="Close modal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <div class="iep-modal-body">
            <p class="iep-modal-desc">
                Synthesize active platform accommodations, formative standards mastery, and educator notes into an official brief for ARD, Section 504, or IEP committee meetings.
            </p>

            <div class="iep-form-grid no-print">
                <div class="iep-field-group">
                    <label for="iep-student-name">Student Scholar Name:</label>
                    <input type="text" id="iep-student-name" class="parents-form-input" placeholder="e.g. Leo Vance" oninput="window.syncIepBriefPreview()">
                </div>
                <div class="iep-field-group">
                    <label for="iep-student-grade">Current Academic Grade:</label>
                    <input type="text" id="iep-student-grade" class="parents-form-input" placeholder="e.g. 3rd Grade (Level E)" oninput="window.syncIepBriefPreview()">
                </div>
                <div class="iep-field-group">
                    <label for="iep-meeting-date">Meeting / Effective Date:</label>
                    <input type="date" id="iep-meeting-date" class="parents-form-input" onchange="window.syncIepBriefPreview()">
                </div>
                <div class="iep-field-group">
                    <label for="iep-case-manager">Parent Coach / Educator:</label>
                    <input type="text" id="iep-case-manager" class="parents-form-input" placeholder="e.g. Sarah Vance, M.Ed." oninput="window.syncIepBriefPreview()">
                </div>
            </div>

            <!-- Printable Sheet Preview Container -->
            <div id="iep-brief-sheet" class="iep-brief-sheet">
                <!-- Rendered dynamically -->
            </div>
        </div>

        <div class="iep-modal-footer no-print">
            <button type="button" class="iep-modal-btn iep-btn-secondary" onclick="window.closeIepBriefModal()">
                Close
            </button>
            <button type="button" class="iep-modal-btn iep-btn-primary" onclick="window.printIepBrief()">
                <i class="fas fa-print"></i> Print Official IEP/504 Brief (PDF)
            </button>
        </div>
    </div>
</div>

<?php include '../src/footer.php'; ?>

