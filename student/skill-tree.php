<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Skill & Knowledge Tree - Hesten's Learning";
$pageDescription = "Interactive visual learning pathway mapping core academic standards across Math, ELA, Science, and Social Studies with Bloom's Taxonomy mastery.";
$pageAuthor = "Hesten's Learning Team";

// Include platform header
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/skill-tree.css">

<div class="skill-tree-page-wrapper">
    <!-- Hero & Discipline Filter Bar -->
    <header class="skill-tree-hero">
        <div class="skill-tree-hero-content">
            <div class="skill-tree-badge">
                <i class="fas fa-sitemap" aria-hidden="true"></i> <span>Visual Knowledge Map</span>
            </div>
            <h1 class="skill-tree-hero-title">Academic Skill &amp; Mastery Tree</h1>
            <p class="skill-tree-hero-desc">Explore interconnected concepts across disciplines. Advance through Bloom's Taxonomy tiers from foundational recall to diamond synthesis.</p>
        </div>

        <!-- Discipline Filter Tabs -->
        <div class="discipline-nav-pills" role="tablist" aria-label="Academic Discipline Pathways">
            <button type="button" class="discipline-btn active" data-discipline="math" role="tab" aria-selected="true">
                <i class="fas fa-calculator" aria-hidden="true"></i> <span>Mathematics</span>
            </button>
            <button type="button" class="discipline-btn" data-discipline="ela" role="tab" aria-selected="false">
                <i class="fas fa-book-reader" aria-hidden="true"></i> <span>English &amp; Reading</span>
            </button>
            <button type="button" class="discipline-btn" data-discipline="science" role="tab" aria-selected="false">
                <i class="fas fa-flask" aria-hidden="true"></i> <span>Natural Science</span>
            </button>
            <button type="button" class="discipline-btn" data-discipline="social" data-tab="social" role="tab" aria-selected="false">
                <i class="fas fa-landmark" aria-hidden="true"></i> <span>Civics &amp; History</span>
            </button>
        </div>
    </header>

    <!-- Main Tree Canvas Viewport -->
    <main class="skill-tree-main-layout" id="main-content">
        <!-- Control Toolbar & Bloom's Legend -->
        <div class="skill-tree-toolbar">
            <div class="blooms-legend-bar" aria-label="Bloom's Taxonomy Mastery Progression">
                <span class="blooms-legend-title">Bloom's Mastery:</span>
                <span class="bloom-pill tier-1" title="Tier 1: Remember / Recall facts"><i class="fas fa-circle"></i> Remember (Bronze)</span>
                <span class="bloom-pill tier-2" title="Tier 2: Understand / Explain concepts"><i class="fas fa-circle"></i> Understand (Silver)</span>
                <span class="bloom-pill tier-3" title="Tier 3: Apply / Solve problems"><i class="fas fa-circle"></i> Apply (Gold)</span>
                <span class="bloom-pill tier-4" title="Tier 4: Analyze / Synthesize & Master"><i class="fas fa-gem"></i> Master (Diamond)</span>
            </div>

            <div class="canvas-zoom-controls">
                <button type="button" class="zoom-btn" id="btn-zoom-in" title="Zoom In" aria-label="Zoom In">
                    <i class="fas fa-search-plus"></i>
                </button>
                <button type="button" class="zoom-btn" id="btn-zoom-out" title="Zoom Out" aria-label="Zoom Out">
                    <i class="fas fa-search-minus"></i>
                </button>
                <button type="button" class="zoom-btn" id="btn-zoom-reset" title="Reset View" aria-label="Reset View">
                    <i class="fas fa-compress-arrows-alt"></i>
                </button>
            </div>
        </div>

        <!-- Interactive Tree Graph Area -->
        <div class="skill-tree-viewport" id="skill-tree-viewport" tabindex="0" role="region" aria-label="Interactive Skill Tree Graph. Click nodes to view requirements.">
            <svg id="skill-tree-svg" class="skill-tree-svg-canvas" width="1600" height="900" viewBox="0 0 1600 900">
                <defs>
                    <linearGradient id="line-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#4f46e5" stop-opacity="0.8" />
                        <stop offset="100%" stop-color="#06b6d4" stop-opacity="0.8" />
                    </linearGradient>
                    <filter id="node-glow" x="-20%" y="-20%" width="140%" height="140%">
                        <feGaussianBlur stdDeviation="6" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                </defs>
                <!-- Dynamic SVG Connections Path Layer -->
                <g id="svg-connections-layer"></g>
                <!-- Dynamic SVG Nodes Layer -->
                <g id="svg-nodes-layer"></g>
            </svg>
        </div>

        <!-- Node Details Drawer / Slide-Over -->
        <aside class="node-detail-drawer" id="node-detail-drawer" aria-labelledby="drawer-node-title" aria-hidden="true" style="display: none;">
            <div class="drawer-header">
                <div class="drawer-discipline-tag" id="drawer-discipline-tag">Mathematics</div>
                <button type="button" class="drawer-close-btn" id="btn-close-drawer" aria-label="Close node details">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="drawer-body">
                <div class="drawer-title-row">
                    <div class="drawer-node-icon" id="drawer-node-icon">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <div>
                        <h3 class="drawer-node-title" id="drawer-node-title">Linear Equations &amp; Slope</h3>
                        <span class="drawer-code-badge" id="drawer-code-badge">CCSS 8.EE.B.5</span>
                    </div>
                </div>

                <!-- Bloom's Taxonomy Tier Status -->
                <div class="drawer-bloom-card" id="drawer-bloom-card">
                    <div class="drawer-bloom-header">
                        <span class="drawer-bloom-label">Current Mastery Level:</span>
                        <strong class="drawer-bloom-value" id="drawer-bloom-value">Tier 3 (Gold • Apply)</strong>
                    </div>
                    <div class="drawer-bloom-progress-track">
                        <div class="drawer-bloom-progress-fill" id="drawer-bloom-progress-fill" style="width: 75%;"></div>
                    </div>
                </div>

                <div class="drawer-section">
                    <h4 class="drawer-section-title"><i class="fas fa-info-circle"></i> Concept Description</h4>
                    <p class="drawer-desc" id="drawer-desc">Graph proportional relationships, interpreting the unit rate as the slope of the graph.</p>
                </div>

                <div class="drawer-section">
                    <h4 class="drawer-section-title"><i class="fas fa-project-diagram"></i> Prerequisites &amp; Unlocks</h4>
                    <div class="prereq-chips-list" id="drawer-prereq-list">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <div class="drawer-actions">
                    <button type="button" class="drawer-btn primary" id="btn-drawer-practice">
                        <i class="fas fa-play"></i> <span>Launch Practice Quiz</span>
                    </button>
                    <button type="button" class="drawer-btn secondary" id="btn-drawer-flashcards">
                        <i class="fas fa-layer-group"></i> <span>Drill in Flashcard Studio</span>
                    </button>
                </div>
            </div>
        </aside>
    </main>
</div>

<script src="<?= assetVersion('/assets/js/gamification/skill-tree.js') ?>"></script>

<?php 
// Include platform footer
include '../src/footer.php'; 
?>
