<?php
/**
 * pages/skills.php - Cosmic Skill Tree & Gamified Mastery Passport
 * Visual RPG-style constellation skill tree mapping Common Core State Standards (CCSS)
 * across Math, ELA, Science, and Social Studies.
 * 
 * Features:
 * - Interactive Constellation Node Grid (Gold/Silver/Bronze mastery halos)
 * - Daily Learning Quests & Streak Tracker
 * - Academic Achievement Badges & Heraldic Crests
 * - Seamless integration with hesten_standards_mastery and hl_gamification_profile
 * 
 * 100% Offline-First, WCAG AAA Accessible, MathJax SVG typeset.
 */

$pageTitle = "Cosmic Skill Tree & Mastery Passport | Hesten's Learning";
$pageDescription = "Interactive visual skill constellation tree and academic mastery passport tracking Common Core standards, daily learning quests, and achievement badges.";
$pageKeywords = "skill tree, standards mastery, learning passport, common core visualizer, student badges, daily quests, gamified learning";
$requiresMathJax = true;

include '../src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/skills.css') : '/assets/css/pages/skills.css' ?>">

<main id="main-content" class="skills-main" tabindex="-1">

    <!-- Cosmic Hero Section -->
    <header class="skills-hero">
        <div class="skills-hero-bg-stars" aria-hidden="true"></div>
        <div class="skills-hero-container">
            <span class="skills-hero-badge">
                <i class="fas fa-project-diagram" aria-hidden="true"></i> Academic Constellation
            </span>
            <h1 class="skills-hero-title">
                Cosmic Skill Tree &amp; Mastery Passport
            </h1>
            <p class="skills-hero-desc">
                Chart your educational universe. Explore interconnected learning nodes across Math, ELA, and Science, complete daily study quests, and unlock heraldic achievement badges as you master standards.
            </p>

            <!-- Passport Quick Stats HUD -->
            <div class="skills-hud-grid">
                <div class="skills-hud-card">
                    <span class="hud-card-icon hud-gold"><i class="fas fa-crown" aria-hidden="true"></i></span>
                    <div class="hud-card-info">
                        <span class="hud-card-val" id="hud-mastered-count">0</span>
                        <span class="hud-card-label">Standards Mastered</span>
                    </div>
                </div>
                <div class="skills-hud-card">
                    <span class="hud-card-icon hud-blue"><i class="fas fa-star" aria-hidden="true"></i></span>
                    <div class="hud-card-info">
                        <span class="hud-card-val" id="hud-total-xp">0 XP</span>
                        <span class="hud-card-label">Learner Experience</span>
                    </div>
                </div>
                <div class="skills-hud-card">
                    <span class="hud-card-icon hud-amber"><i class="fas fa-fire" aria-hidden="true"></i></span>
                    <div class="hud-card-info">
                        <span class="hud-card-val" id="hud-streak-count">1 Day</span>
                        <span class="hud-card-label">Active Study Streak</span>
                    </div>
                </div>
                <div class="skills-hud-card">
                    <span class="hud-card-icon hud-purple"><i class="fas fa-award" aria-hidden="true"></i></span>
                    <div class="hud-card-info">
                        <span class="hud-card-val" id="hud-badges-count">0 / 8</span>
                        <span class="hud-card-label">Crests Unlocked</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="skills-content-container">

        <!-- ========================================== -->
        <!-- 1. DAILY LEARNING QUESTS SECTION           -->
        <!-- ========================================== -->
        <section id="quests" class="skills-section quests-section" aria-labelledby="quests-heading">
            <div class="skills-section-header">
                <div class="section-title-wrap">
                    <span class="section-icon-badge badge-quest"><i class="fas fa-tasks" aria-hidden="true"></i></span>
                    <div>
                        <h2 id="quests-heading" class="section-title">Daily Learning Quests</h2>
                        <p class="section-subtitle">Complete daily missions to maintain your streak and earn bonus experience.</p>
                    </div>
                </div>
                <div class="quest-progress-pill" id="quest-overall-pill">
                    <span id="quest-progress-text">0 / 3 Completed</span>
                </div>
            </div>

            <div class="quests-grid" role="list">
                <!-- Quest 1 -->
                <div class="quest-card glass-card" id="quest-card-math" role="listitem">
                    <div class="quest-card-top">
                        <span class="quest-badge"><i class="fas fa-calculator" aria-hidden="true"></i> Math Practice</span>
                        <span class="quest-xp-reward">+50 XP</span>
                    </div>
                    <h3 class="quest-name">Formula Explorer</h3>
                    <p class="quest-desc">Solve 5 math problems in the Diagnostic Assessment or explore 2 formulas in the Math Codex.</p>
                    <div class="quest-progress-bar-wrap">
                        <div class="quest-progress-bar" id="quest-bar-math" style="width: 0%;"></div>
                    </div>
                    <div class="quest-card-footer">
                        <span class="quest-step-label" id="quest-label-math">0 / 5 Complete</span>
                        <a href="/assessment/diagnostic.php" class="quest-action-link">Start Quiz <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Quest 2 -->
                <div class="quest-card glass-card" id="quest-card-ela" role="listitem">
                    <div class="quest-card-top">
                        <span class="quest-badge"><i class="fas fa-book-open" aria-hidden="true"></i> Literature Reading</span>
                        <span class="quest-xp-reward">+50 XP</span>
                    </div>
                    <h3 class="quest-name">Literary Journey</h3>
                    <p class="quest-desc">Read at least one chapter in the Gutenberg Library or review 2 grammar syntax rules.</p>
                    <div class="quest-progress-bar-wrap">
                        <div class="quest-progress-bar" id="quest-bar-ela" style="width: 0%;"></div>
                    </div>
                    <div class="quest-card-footer">
                        <span class="quest-step-label" id="quest-label-ela">0 / 1 Chapters</span>
                        <a href="/library/index.php" class="quest-action-link">Open Library <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Quest 3 -->
                <div class="quest-card glass-card" id="quest-card-tools" role="listitem">
                    <div class="quest-card-top">
                        <span class="quest-badge"><i class="fas fa-pen-nib" aria-hidden="true"></i> Scratchpad &amp; Whiteboard</span>
                        <span class="quest-xp-reward">+50 XP</span>
                    </div>
                    <h3 class="quest-name">Active Notes &amp; Sketches</h3>
                    <p class="quest-desc">Create or update a study note in the Scratchpad or draw a math diagram on the Whiteboard.</p>
                    <div class="quest-progress-bar-wrap">
                        <div class="quest-progress-bar" id="quest-bar-tools" style="width: 0%;"></div>
                    </div>
                    <div class="quest-card-footer">
                        <span class="quest-step-label" id="quest-label-tools">0 / 1 Notes</span>
                        <button type="button" class="quest-action-btn" onclick="if(window.HLScratchpad){window.HLScratchpad.open('notes');}">Open Studio <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 2. COSMIC SKILL TREE CONSTELLATION         -->
        <!-- ========================================== -->
        <section id="constellation" class="skills-section constellation-section" aria-labelledby="tree-heading">
            <div class="skills-section-header">
                <div class="section-title-wrap">
                    <span class="section-icon-badge badge-tree"><i class="fas fa-network-wired" aria-hidden="true"></i></span>
                    <div>
                        <h2 id="tree-heading" class="section-title">Standards Constellation Tree</h2>
                        <p class="section-subtitle">Click any node to view learning expectations, worked exemplars, and launch focused lessons.</p>
                    </div>
                </div>

                <!-- Filter Controls -->
                <div class="tree-controls-group">
                    <div class="tree-subject-toggle" role="tablist" aria-label="Filter subject constellation">
                        <button type="button" class="tree-subject-btn active" data-subject="math" role="tab" aria-selected="true">
                            <i class="fas fa-square-root-variable" aria-hidden="true"></i> Mathematics
                        </button>
                        <button type="button" class="tree-subject-btn" data-subject="ela" role="tab" aria-selected="false">
                            <i class="fas fa-feather" aria-hidden="true"></i> English Language Arts
                        </button>
                        <button type="button" class="tree-subject-btn" data-subject="science" role="tab" aria-selected="false">
                            <i class="fas fa-atom" aria-hidden="true"></i> Science (NGSS)
                        </button>
                    </div>

                    <div class="tree-grade-filter">
                        <label for="tree-grade-select" class="sr-only">Grade Band</label>
                        <select id="tree-grade-select" class="skills-select" aria-label="Filter Grade Band">
                            <option value="all">All Grade Bands</option>
                            <option value="early" selected>Elementary (K – Grade 5)</option>
                            <option value="middle">Middle School (Grades 6 – 8)</option>
                            <option value="high">High School (Grades 9 – 12)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Constellation Map Viewport -->
            <div class="constellation-viewport glass-card" id="constellation-canvas-wrap">
                <!-- Legend -->
                <div class="constellation-legend" aria-label="Constellation node status legend">
                    <span class="legend-item"><span class="legend-dot dot-mastered"></span> Mastered (80%+)</span>
                    <span class="legend-item"><span class="legend-dot dot-progress"></span> Practiced (1-79%)</span>
                    <span class="legend-item"><span class="legend-dot dot-discovered"></span> Ready to Learn</span>
                </div>

                <!-- Interactive SVG Connecting Web -->
                <svg id="constellation-svg-lines" class="constellation-lines-layer" aria-hidden="true">
                    <!-- Lines generated dynamically via JS -->
                </svg>

                <!-- Interactive Nodes Grid -->
                <div class="constellation-nodes-container" id="constellation-nodes-container" role="region" aria-label="Standards Nodes">
                    <!-- Injected via JS -->
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 3. MASTERY BADGES & CRESTS SHOWCASE        -->
        <!-- ========================================== -->
        <section id="badges" class="skills-section badges-section" aria-labelledby="badges-heading">
            <div class="skills-section-header">
                <div class="section-title-wrap">
                    <span class="section-icon-badge badge-crest"><i class="fas fa-shield-halved" aria-hidden="true"></i></span>
                    <div>
                        <h2 id="badges-heading" class="section-title">Academic Achievement Badges &amp; Crests</h2>
                        <p class="section-subtitle">Unlockable heraldic honors celebrating mastery and perseverance.</p>
                    </div>
                </div>
            </div>

            <div class="badges-grid" id="badges-showcase-grid" role="list">
                <!-- Injected via JS -->
            </div>
        </section>

    </div>

    <!-- ========================================== -->
    <!-- STANDARD NODE DETAIL MODAL                 -->
    <!-- ========================================== -->
    <div id="skill-node-modal" class="skill-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="skill-modal-dialog glass-card">
            <div class="skill-modal-header">
                <div class="modal-code-badge" id="modal-standard-code">CCSS.MATH.K.CC.1</div>
                <button type="button" class="skill-modal-close-btn" id="modal-close-btn" aria-label="Close standard details">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="skill-modal-body">
                <h3 class="modal-standard-title" id="modal-standard-title">Count to 100 by Ones and by Tens</h3>
                <div class="modal-grade-band" id="modal-standard-band">Grade: Kindergarten • Domain: Counting &amp; Cardinality</div>

                <div class="modal-desc-box">
                    <h4 class="modal-subheading">Learning Objective</h4>
                    <p id="modal-standard-desc" class="modal-desc-text">Count to 100 by ones and by tens with accuracy and number sequence fluency.</p>
                </div>

                <div class="modal-exemplar-box">
                    <h4 class="modal-subheading">Worked Exemplar Problem</h4>
                    <div id="modal-exemplar-content" class="modal-exemplar-content">
                        <!-- Typeset MathJax or Text -->
                    </div>
                </div>

                <div class="modal-mastery-status-box">
                    <span class="status-label">Your Current Mastery:</span>
                    <span class="status-badge" id="modal-user-mastery">Not Started (0%)</span>
                </div>
            </div>
            <div class="skill-modal-footer">
                <a href="/assessment/diagnostic.php" id="modal-launch-quiz-btn" class="modal-btn modal-btn-secondary">
                    <i class="fas fa-bullseye" aria-hidden="true"></i> Assess Standard
                </a>
                <a href="/src/lesson_runner.php" id="modal-launch-lesson-btn" class="modal-btn modal-btn-primary">
                    <i class="fas fa-play" aria-hidden="true"></i> Launch Lesson
                </a>
            </div>
        </div>
    </div>

</main>

<!-- Load CCSS Standards Dataset -->
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/standards/standards-ccss-math-ela.js') : '/assets/js/standards/standards-ccss-math-ela.js' ?>"></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/skills-passport.js') : '/assets/js/pages/skills-passport.js' ?>"></script>

<?php include '../src/footer.php'; ?>
