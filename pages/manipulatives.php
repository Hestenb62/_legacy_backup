<?php
/**
 * pages/manipulatives.php - Interactive Digital Math & Science Manipulatives Lab
 * Tactile visual learning tools for conceptual exploration:
 * 1. Fraction Bars & Slices Equivalency Visualizer
 * 2. Place Value & Base-10 Blocks (Units, Rods, Flats, Cubes)
 * 3. Dynamic Cartesian Function & Curve Grapher
 * 
 * 100% Offline-First, WCAG AAA Accessible, MathJax SVG typeset.
 */

$pageTitle = "Interactive Math & Science Manipulatives Lab | Hesten's Learning";
$pageDescription = "Tactile digital manipulatives for conceptual math learning: fraction strips, base-10 place value blocks, and dynamic Cartesian grapher.";
$pageKeywords = "math manipulatives, fraction bars, base 10 blocks, place value, interactive grapher, visual math, common core math";
$requiresMathJax = true;

include '../src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/manipulatives.css') : '/assets/css/pages/manipulatives.css' ?>">

<main id="main-content" class="manipulatives-main" tabindex="-1">

    <!-- Lab Hero -->
    <header class="manip-hero">
        <div class="manip-hero-container">
            <span class="manip-hero-badge">
                <i class="fas fa-cubes-stacked" aria-hidden="true"></i> Visual Conceptual Mathematics
            </span>
            <h1 class="manip-hero-title">
                Interactive Manipulatives Lab
            </h1>
            <p class="manip-hero-desc">
                Transform abstract mathematical formulas into tangible, visual models. Experiment with interactive fraction bars, place-value base-10 blocks, and dynamic Cartesian function curves.
            </p>

            <!-- Quick Jump Ribbon -->
            <nav class="manip-nav-ribbon" aria-label="Manipulatives Laboratories">
                <button type="button" class="manip-tab-btn active" data-tab="fractions" aria-selected="true" role="tab">
                    <i class="fas fa-chart-pie" aria-hidden="true"></i> Fraction Bars &amp; Equivalency
                </button>
                <button type="button" class="manip-tab-btn" data-tab="base10" aria-selected="false" role="tab">
                    <i class="fas fa-cubes" aria-hidden="true"></i> Place Value &amp; Base-10
                </button>
                <button type="button" class="manip-tab-btn" data-tab="grapher" aria-selected="false" role="tab">
                    <i class="fas fa-chart-line" aria-hidden="true"></i> Dynamic Function Grapher
                </button>
            </nav>
        </div>
    </header>

    <div class="manip-content-container">

        <!-- ========================================== -->
        <!-- LAB 1: FRACTION BARS & EQUIVALENCY LAB     -->
        <!-- ========================================== -->
        <section id="pane-fractions" class="manip-lab-pane active" role="tabpanel" aria-label="Fraction Bars Laboratory">
            <div class="manip-panel-header">
                <div class="manip-panel-title-group">
                    <div class="manip-panel-icon"><i class="fas fa-chart-pie" aria-hidden="true"></i></div>
                    <div>
                        <h2 class="manip-panel-title">Visual Fraction Strips &amp; Equivalency</h2>
                        <p class="manip-panel-desc">Click or press number keys to shade parts. Compare values side-by-side or combine two fractions to find common denominators.</p>
                    </div>
                </div>
                <div class="manip-panel-actions">
                    <button type="button" id="frac-reset-btn" class="manip-btn manip-btn-secondary" aria-label="Reset fraction bars">
                        <i class="fas fa-rotate-left" aria-hidden="true"></i> Reset Bars
                    </button>
                    <button type="button" id="frac-copy-scratchpad-btn" class="manip-btn manip-btn-primary" aria-label="Send equation to Scratchpad">
                        <i class="fas fa-pen-nib" aria-hidden="true"></i> Copy to Scratchpad
                    </button>
                </div>
            </div>

            <!-- Interactive Fraction Comparison Rig -->
            <div class="frac-workspace-grid">
                <!-- Fraction A Controller -->
                <div class="frac-card glass-card">
                    <div class="frac-card-header">
                        <span class="frac-badge badge-a">Fraction A</span>
                        <div class="frac-control-group">
                            <label for="frac-a-denom" class="frac-select-label">Denominator:</label>
                            <select id="frac-a-denom" class="manip-select" aria-label="Fraction A Denominator">
                                <option value="1">1 (Wholes)</option>
                                <option value="2">2 (Halves)</option>
                                <option value="3">3 (Thirds)</option>
                                <option value="4" selected>4 (Fourths)</option>
                                <option value="5">5 (Fifths)</option>
                                <option value="6">6 (Sixths)</option>
                                <option value="8">8 (Eighths)</option>
                                <option value="10">10 (Tenths)</option>
                                <option value="12">12 (Twelfths)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Strip Container -->
                    <div class="frac-strip-track" id="frac-a-strip" role="group" aria-label="Fraction A parts">
                        <!-- Injected dynamically via JS -->
                    </div>

                    <div class="frac-value-summary">
                        <span>Shaded: <strong id="frac-a-numerator">1</strong> / <strong id="frac-a-denom-text">4</strong></span>
                        <span class="frac-decimal" id="frac-a-decimal">0.25 (25%)</span>
                    </div>
                </div>

                <!-- Fraction B Controller -->
                <div class="frac-card glass-card">
                    <div class="frac-card-header">
                        <span class="frac-badge badge-b">Fraction B</span>
                        <div class="frac-control-group">
                            <label for="frac-b-denom" class="frac-select-label">Denominator:</label>
                            <select id="frac-b-denom" class="manip-select" aria-label="Fraction B Denominator">
                                <option value="1">1 (Wholes)</option>
                                <option value="2" selected>2 (Halves)</option>
                                <option value="3">3 (Thirds)</option>
                                <option value="4">4 (Fourths)</option>
                                <option value="5">5 (Fifths)</option>
                                <option value="6">6 (Sixths)</option>
                                <option value="8">8 (Eighths)</option>
                                <option value="10">10 (Tenths)</option>
                                <option value="12">12 (Twelfths)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Strip Container -->
                    <div class="frac-strip-track" id="frac-b-strip" role="group" aria-label="Fraction B parts">
                        <!-- Injected dynamically via JS -->
                    </div>

                    <div class="frac-value-summary">
                        <span>Shaded: <strong id="frac-b-numerator">1</strong> / <strong id="frac-b-denom-text">2</strong></span>
                        <span class="frac-decimal" id="frac-b-decimal">0.50 (50%)</span>
                    </div>
                </div>
            </div>

            <!-- Mathematical Synthesis Callout (Comparison & Sum) -->
            <div class="frac-synthesis-card glass-card">
                <div class="frac-synthesis-column">
                    <h3 class="synthesis-title"><i class="fas fa-scale-balanced" aria-hidden="true"></i> Comparison</h3>
                    <div id="frac-math-comparison" class="synthesis-math-box" aria-live="polite">
                        <!-- Rendered MathJax Comparison -->
                        $$\frac{1}{4} < \frac{1}{2}$$
                    </div>
                </div>
                <div class="frac-synthesis-divider" aria-hidden="true"></div>
                <div class="frac-synthesis-column">
                    <h3 class="synthesis-title"><i class="fas fa-plus" aria-hidden="true"></i> Combined Sum</h3>
                    <div id="frac-math-addition" class="synthesis-math-box" aria-live="polite">
                        <!-- Rendered MathJax Addition -->
                        $$\frac{1}{4} + \frac{1}{2} = \frac{1}{4} + \frac{2}{4} = \frac{3}{4}$$
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- LAB 2: PLACE VALUE & BASE-10 BLOCKS LAB   -->
        <!-- ========================================== -->
        <section id="pane-base10" class="manip-lab-pane" role="tabpanel" aria-label="Place Value Laboratory" hidden>
            <div class="manip-panel-header">
                <div class="manip-panel-title-group">
                    <div class="manip-panel-icon"><i class="fas fa-cubes" aria-hidden="true"></i></div>
                    <div>
                        <h2 class="manip-panel-title">Place Value &amp; Base-10 Manipulatives</h2>
                        <p class="manip-panel-desc">Assemble numbers using Thousands (Cubes), Hundreds (Flats), Tens (Rods), and Ones (Units). Compose and decompose groups of 10.</p>
                    </div>
                </div>
                <div class="manip-panel-actions">
                    <button type="button" id="base10-reset-btn" class="manip-btn manip-btn-secondary" aria-label="Clear all blocks">
                        <i class="fas fa-trash-alt" aria-hidden="true"></i> Clear Board
                    </button>
                    <button type="button" id="base10-copy-scratchpad-btn" class="manip-btn manip-btn-primary" aria-label="Send expanded form to Scratchpad">
                        <i class="fas fa-pen-nib" aria-hidden="true"></i> Copy to Scratchpad
                    </button>
                </div>
            </div>

            <!-- Live Value HUD Banner -->
            <div class="base10-hud-banner glass-card">
                <div class="base10-total-display">
                    <span class="base10-total-label">Total Represented:</span>
                    <span class="base10-total-number" id="base10-total-val" aria-live="polite">1,245</span>
                </div>
                <div class="base10-expanded-form" id="base10-expanded-text" aria-live="polite">
                    1,000 + 200 + 40 + 5
                </div>
            </div>

            <!-- 4 Place-Value Columns -->
            <div class="base10-columns-grid">
                <!-- Thousands -->
                <div class="base10-col" data-unit="thousands">
                    <div class="base10-col-header">
                        <span class="col-title">Thousands (1,000)</span>
                        <span class="col-count-badge" id="count-thousands">1</span>
                    </div>
                    <div class="base10-controls-row">
                        <button type="button" class="btn-step" data-action="dec" data-unit="thousands" aria-label="Remove 1,000">-1</button>
                        <button type="button" class="btn-step" data-action="inc" data-unit="thousands" aria-label="Add 1,000">+1</button>
                    </div>
                    <div class="base10-stage" id="stage-thousands" role="region" aria-label="Thousands cubes">
                        <!-- Dynamically populated cubes -->
                    </div>
                </div>

                <!-- Hundreds -->
                <div class="base10-col" data-unit="hundreds">
                    <div class="base10-col-header">
                        <span class="col-title">Hundreds (100)</span>
                        <span class="col-count-badge" id="count-hundreds">2</span>
                    </div>
                    <div class="base10-controls-row">
                        <button type="button" class="btn-step" data-action="dec" data-unit="hundreds" aria-label="Remove 100">-1</button>
                        <button type="button" class="btn-step" data-action="inc" data-unit="hundreds" aria-label="Add 100">+1</button>
                    </div>
                    <div class="base10-stage" id="stage-hundreds" role="region" aria-label="Hundreds flats">
                        <!-- Dynamically populated flats -->
                    </div>
                </div>

                <!-- Tens -->
                <div class="base10-col" data-unit="tens">
                    <div class="base10-col-header">
                        <span class="col-title">Tens (10)</span>
                        <span class="col-count-badge" id="count-tens">4</span>
                    </div>
                    <div class="base10-controls-row">
                        <button type="button" class="btn-step" data-action="dec" data-unit="tens" aria-label="Remove 10">-1</button>
                        <button type="button" class="btn-step" data-action="inc" data-unit="tens" aria-label="Add 10">+1</button>
                    </div>
                    <div class="base10-stage" id="stage-tens" role="region" aria-label="Tens rods">
                        <!-- Dynamically populated rods -->
                    </div>
                </div>

                <!-- Ones -->
                <div class="base10-col" data-unit="ones">
                    <div class="base10-col-header">
                        <span class="col-title">Ones (1)</span>
                        <span class="col-count-badge" id="count-ones">5</span>
                    </div>
                    <div class="base10-controls-row">
                        <button type="button" class="btn-step" data-action="dec" data-unit="ones" aria-label="Remove 1">-1</button>
                        <button type="button" class="btn-step" data-action="inc" data-unit="ones" aria-label="Add 1">+1</button>
                    </div>
                    <div class="base10-stage" id="stage-ones" role="region" aria-label="Ones units">
                        <!-- Dynamically populated units -->
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- LAB 3: DYNAMIC FUNCTION & CURVE GRAPHER   -->
        <!-- ========================================== -->
        <section id="pane-grapher" class="manip-lab-pane" role="tabpanel" aria-label="Function Grapher Laboratory" hidden>
            <div class="manip-panel-header">
                <div class="manip-panel-title-group">
                    <div class="manip-panel-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></div>
                    <div>
                        <h2 class="manip-panel-title">Dynamic Coordinate Grapher</h2>
                        <p class="manip-panel-desc">Interact with algebraic function families. Adjust slopes, intercepts, and vertex parameters to observe coordinate transformations in real time.</p>
                    </div>
                </div>
                <div class="manip-panel-actions">
                    <button type="button" id="graph-reset-btn" class="manip-btn manip-btn-secondary" aria-label="Reset sliders">
                        <i class="fas fa-undo" aria-hidden="true"></i> Reset Function
                    </button>
                    <button type="button" id="graph-copy-scratchpad-btn" class="manip-btn manip-btn-primary" aria-label="Send equation to Scratchpad">
                        <i class="fas fa-pen-nib" aria-hidden="true"></i> Copy to Scratchpad
                    </button>
                </div>
            </div>

            <div class="grapher-layout-grid">
                <!-- Controls Sidebar -->
                <div class="grapher-controls-sidebar glass-card">
                    <div class="graph-type-selector">
                        <label for="graph-family-select" class="graph-label">Function Family:</label>
                        <select id="graph-family-select" class="manip-select" aria-label="Select function family">
                            <option value="linear" selected>Linear: y = mx + b</option>
                            <option value="quadratic">Quadratic: y = ax² + bx + c</option>
                            <option value="absolute">Absolute Value: y = a|x - h| + k</option>
                        </select>
                    </div>

                    <!-- Dynamic Sliders Container -->
                    <div id="graph-sliders-box" class="graph-sliders-box">
                        <!-- Injected via JS -->
                    </div>

                    <!-- Live MathJax Formula Readout -->
                    <div class="graph-formula-box">
                        <span class="formula-label">Active Function:</span>
                        <div id="graph-equation-mathjax" class="active-formula-math" aria-live="polite">
                            $$y = 1.0x + 0.0$$
                        </div>
                    </div>

                    <!-- Key Features (Roots, Vertex, Y-Intercept) -->
                    <div class="graph-features-list" id="graph-features-list">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- SVG Coordinate Plane Canvas -->
                <div class="grapher-canvas-container glass-card">
                    <svg id="coordinate-plane-svg" class="coordinate-plane" viewBox="0 0 500 500" aria-label="Interactive Cartesian coordinate plane" role="img">
                        <!-- Grid lines, axes, and curve drawn via JS -->
                    </svg>
                    <div class="graph-zoom-indicator">Scale: 1 unit = 25px | Origin: (0,0)</div>
                </div>
            </div>
        </section>

    </div>
</main>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/labs/manipulatives-lab.js') : '/assets/js/labs/manipulatives-lab.js' ?>"></script>

<?php include '../src/footer.php'; ?>
