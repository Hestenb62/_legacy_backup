<?php
// Set variables required by header.php
$pageTitle = "Multi-Sensory Interactive Practice Labs - Hesten's Learning";
$pageDescription = "Hands-on multi-sensory virtual manipulatives and interactive labs designed for learners with diverse learning styles and IEP accommodations.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/interactive-labs.css">

<div class="labs-container">
    <!-- Hero Header -->
    <div class="labs-hero">
        <div>
            <h1 class="labs-hero-title">
                <i class="fas fa-flask" style="color: var(--color-primary);" aria-hidden="true"></i>
                <span>Multi-Sensory Interactive Labs</span>
            </h1>
            <p class="labs-hero-desc">
                Engage with tactile manipulatives, audio-assisted phonics puzzles, interactive physics scales, and chronological historical threads built to reinforce core standard competencies.
            </p>
        </div>
        <div>
            <a href="/student/skill-tree.php" class="btn" style="padding: 0.75rem 1.5rem; border-radius: var(--radius-full); background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border); font-weight: 800; font-size: 0.9rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-sitemap" style="color: var(--color-primary);"></i>
                <span>View Skill Tree</span>
            </a>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="labs-tabs-nav" role="tablist" aria-label="Lab Workstations">
        <button type="button" class="lab-tab-btn active" data-lab="math" role="tab" aria-selected="true">
            <i class="fas fa-cubes"></i>
            <span>1. Math Fraction Strips</span>
        </button>
        <button type="button" class="lab-tab-btn" data-lab="ela" role="tab" aria-selected="false">
            <i class="fas fa-puzzle-piece"></i>
            <span>2. ELA Phonics & Morphemes</span>
        </button>
        <button type="button" class="lab-tab-btn" data-lab="science" role="tab" aria-selected="false">
            <i class="fas fa-balance-scale"></i>
            <span>3. Science Balance & Torque</span>
        </button>
        <button type="button" class="lab-tab-btn" data-lab="social" role="tab" aria-selected="false">
            <i class="fas fa-history"></i>
            <span>4. History Chrono-Timeline</span>
        </button>
        <button type="button" class="lab-tab-btn" data-lab="chem" role="tab" aria-selected="false">
            <i class="fas fa-vial"></i>
            <span>5. Chemistry pH Scale</span>
        </button>
    </div>

    <!-- =================================================================== -->
    <!-- 1. MATH FRACTION STRIPS WORKBENCH -->
    <!-- =================================================================== -->
    <div id="lab-math" class="lab-workbench active">
        <div class="wb-header">
            <div>
                <h2 class="wb-title"><i class="fas fa-cubes" style="color: #3b82f6;"></i> Fraction Strips Equivalence Lab</h2>
                <p class="wb-desc">Click fraction strips from the palette below to fill the drop zone and build an exact 1 Whole (100%) equivalence bar.</p>
            </div>
            <div style="font-size: 0.85rem; font-weight: 800; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); background: color-mix(in srgb, #3b82f6 15%, transparent); color: #3b82f6;">
                Standard: 3.NF.A.3 & 4.NF.A.1
            </div>
        </div>

        <!-- Palette -->
        <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted); margin-bottom: 0.5rem; display: block;">Fraction Strip Palette:</span>
        <div class="fraction-palette">
            <button type="button" class="fraction-strip-item" data-val="1.0" data-label="1 Whole" data-color="#3b82f6" style="background-color: #3b82f6;">1 Whole</button>
            <button type="button" class="fraction-strip-item" data-val="0.5" data-label="1/2" data-color="#8b5cf6" style="background-color: #8b5cf6;">1/2</button>
            <button type="button" class="fraction-strip-item" data-val="0.3333" data-label="1/3" data-color="#ec4899" style="background-color: #ec4899;">1/3</button>
            <button type="button" class="fraction-strip-item" data-val="0.25" data-label="1/4" data-color="#f59e0b" style="background-color: #f59e0b;">1/4</button>
            <button type="button" class="fraction-strip-item" data-val="0.1666" data-label="1/6" data-color="#10b981" style="background-color: #10b981;">1/6</button>
            <button type="button" class="fraction-strip-item" data-val="0.125" data-label="1/8" data-color="#06b6d4" style="background-color: #06b6d4;">1/8</button>
            <button type="button" class="fraction-strip-item" data-val="0.0833" data-label="1/12" data-color="#6366f1" style="background-color: #6366f1;">1/12</button>
        </div>

        <!-- Target Progress Bar -->
        <div class="math-target-bar-wrap">
            <div class="target-bar-label">
                <span>Equivalence Target: 1.0 Whole</span>
                <span>Current Total: <strong id="math-fraction-total">0% (0.00)</strong></span>
            </div>
            <div class="math-target-track">
                <div id="math-target-bar-fill" class="math-target-fill" style="width: 0%;"></div>
            </div>
        </div>

        <!-- Drop / Assemble Zone -->
        <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted); margin-bottom: 0.5rem; display: block;">Assembled Fraction Bar:</span>
        <div id="math-drop-zone" class="math-drop-zone"></div>

        <!-- Actions -->
        <div class="wb-actions">
            <div id="math-feedback-msg" class="feedback-container"></div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" onclick="const t = document.getElementById('math-fraction-total')?.innerText || '0%'; window.exportLabToScratchpad && window.exportLabToScratchpad('Fraction Strips', 'Target 1.0 Whole | Total assembled: ' + t);" class="btn" style="padding: 0.6rem 1rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;" title="Save findings to digital scratchpad"><i class="fas fa-pen"></i> Note</button>
                <button type="button" id="math-reset-btn" class="btn" style="padding: 0.6rem 1.25rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;">Reset</button>
                <button type="button" id="math-check-btn" class="btn" style="padding: 0.6rem 1.5rem; border-radius: var(--radius-md); background: var(--color-primary); color: white; border: none; font-weight: 800; cursor: pointer;">Check Equivalence</button>
            </div>
        </div>
    </div>

    <!-- =================================================================== -->
    <!-- 2. ELA PHONICS & MORPHEME DECONSTRUCTOR -->
    <!-- =================================================================== -->
    <div id="lab-ela" class="lab-workbench">
        <div class="wb-header">
            <div>
                <h2 class="wb-title"><i class="fas fa-puzzle-piece" style="color: #ec4899;"></i> Phonics & Morpheme Constructor</h2>
                <p class="wb-desc">Assemble word building blocks (prefixes, roots, and suffixes) to discover meaning, pronunciation, and spelling rules.</p>
            </div>
            <div style="font-size: 0.85rem; font-weight: 800; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); background: color-mix(in srgb, #ec4899 15%, transparent); color: #ec4899;">
                Standard: CCSS.ELA-LITERACY.RF.3.3 & L.4.4.B
            </div>
        </div>

        <!-- Morpheme Columns -->
        <div class="morpheme-palette">
            <div class="morpheme-column">
                <h4><i class="fas fa-arrow-right"></i> Prefixes</h4>
                <div class="morpheme-piece-list">
                    <button type="button" class="morpheme-piece" data-type="prefix" data-text="un-">un- (not)</button>
                    <button type="button" class="morpheme-piece" data-type="prefix" data-text="re-">re- (again)</button>
                    <button type="button" class="morpheme-piece" data-type="prefix" data-text="dis-">dis- (opposite)</button>
                    <button type="button" class="morpheme-piece" data-type="prefix" data-text="pre-">pre- (before)</button>
                    <button type="button" class="morpheme-piece" data-type="prefix" data-text="trans-">trans- (across)</button>
                </div>
            </div>
            <div class="morpheme-column">
                <h4><i class="fas fa-gem"></i> Root Words / Base</h4>
                <div class="morpheme-piece-list">
                    <button type="button" class="morpheme-piece" data-type="root" data-text="break">break</button>
                    <button type="button" class="morpheme-piece" data-type="root" data-text="construct">construct</button>
                    <button type="button" class="morpheme-piece" data-type="root" data-text="agree">agree</button>
                    <button type="button" class="morpheme-piece" data-type="root" data-text="historic">historic</button>
                    <button type="button" class="morpheme-piece" data-type="root" data-text="form">form</button>
                </div>
            </div>
            <div class="morpheme-column">
                <h4><i class="fas fa-arrow-left"></i> Suffixes</h4>
                <div class="morpheme-piece-list">
                    <button type="button" class="morpheme-piece" data-type="suffix" data-text="-able">-able (can be)</button>
                    <button type="button" class="morpheme-piece" data-type="suffix" data-text="-ion">-ion (state of)</button>
                    <button type="button" class="morpheme-piece" data-type="suffix" data-text="-ment">-ment (action)</button>
                    <button type="button" class="morpheme-piece" data-type="suffix" data-text="-ation">-ation (process)</button>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
            <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted);">Constructed Word:</span>
            <span style="font-size: 1.1rem; font-weight: 900; color: var(--color-primary);" id="ela-full-word-display">---</span>
        </div>
        <div id="ela-drop-zone" class="ela-drop-zone">
            <span class="drop-placeholder" style="color: var(--color-text-muted); font-size: 0.875rem;">Click prefix, root, and suffix tiles above to construct a word</span>
        </div>

        <div class="wb-actions">
            <div id="ela-feedback-msg" class="feedback-container"></div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" onclick="const w = document.getElementById('ela-full-word-display')?.innerText || '---'; window.exportLabToScratchpad && window.exportLabToScratchpad('Phonics & Morphemes', 'Constructed word analysis: ' + w);" class="btn" style="padding: 0.6rem 1rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;" title="Save findings to digital scratchpad"><i class="fas fa-pen"></i> Note</button>
                <button type="button" id="ela-speak-btn" class="btn" style="padding: 0.6rem 1.25rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;"><i class="fas fa-volume-up"></i> Pronounce</button>
                <button type="button" id="ela-clear-btn" class="btn" style="padding: 0.6rem 1.25rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;">Clear</button>
                <button type="button" id="ela-check-btn" class="btn" style="padding: 0.6rem 1.5rem; border-radius: var(--radius-md); background: var(--color-primary); color: white; border: none; font-weight: 800; cursor: pointer;">Validate Word</button>
            </div>
        </div>
    </div>

    <!-- =================================================================== -->
    <!-- 3. SCIENCE BALANCE & TORQUE WORKBENCH -->
    <!-- =================================================================== -->
    <div id="lab-science" class="lab-workbench">
        <div class="wb-header">
            <div>
                <h2 class="wb-title"><i class="fas fa-balance-scale" style="color: #10b981;"></i> Torque & Balance Scale Simulator</h2>
                <p class="wb-desc">Explore rotational equilibrium ($\tau = \text{Force} \times \text{Distance}$). Add masses and adjust distance to balance the lever beam.</p>
            </div>
            <div style="font-size: 0.85rem; font-weight: 800; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); background: color-mix(in srgb, #10b981 15%, transparent); color: #10b981;">
                Standard: NGSS MS-PS2-2 & MS-PS3-1
            </div>
        </div>

        <div class="science-scale-stage">
            <div class="scale-fulcrum-wrap">
                <div id="science-balance-beam" class="scale-beam">
                    <div class="scale-pan-left">Left Pan</div>
                    <div class="scale-pan-right">Right Pan</div>
                </div>
                <div class="scale-fulcrum"></div>
            </div>

            <div class="scale-controls-grid">
                <div class="scale-pan-control-card">
                    <h4 style="margin: 0; font-size: 1rem; color: var(--color-text-main); font-weight: 800;"><i class="fas fa-arrow-left"></i> Left Pan Setup</h4>
                    <div>Mass: <strong id="sci-left-mass-val">0g (Torque: 0)</strong></div>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <span>Distance:</span>
                        <select id="sci-left-dist" style="padding: 0.35rem 0.6rem; border-radius: var(--radius-sm); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 700;">
                            <option value="1">1 Notch (Near)</option>
                            <option value="2">2 Notches (Mid)</option>
                            <option value="3" selected>3 Notches (Far)</option>
                        </select>
                    </div>
                    <button type="button" id="sci-add-left-5g" class="btn" style="padding: 0.5rem 1rem; border-radius: var(--radius-md); background: var(--color-primary); color: white; border: none; font-weight: 800; cursor: pointer;">+ Add 5g Weight</button>
                </div>

                <div class="scale-pan-control-card">
                    <h4 style="margin: 0; font-size: 1rem; color: var(--color-text-main); font-weight: 800;"><i class="fas fa-arrow-right"></i> Right Pan Setup</h4>
                    <div>Mass: <strong id="sci-right-mass-val">0g (Torque: 0)</strong></div>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <span>Distance:</span>
                        <select id="sci-right-dist" style="padding: 0.35rem 0.6rem; border-radius: var(--radius-sm); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 700;">
                            <option value="1">1 Notch (Near)</option>
                            <option value="2">2 Notches (Mid)</option>
                            <option value="3" selected>3 Notches (Far)</option>
                        </select>
                    </div>
                    <button type="button" id="sci-add-right-5g" class="btn" style="padding: 0.5rem 1rem; border-radius: var(--radius-md); background: #10b981; color: white; border: none; font-weight: 800; cursor: pointer;">+ Add 5g Weight</button>
                </div>
            </div>
        </div>

        <div class="wb-actions">
            <div id="sci-balance-status" class="feedback-container">
                <span style="color: var(--color-text-muted);">Scale is empty. Add masses to test balance!</span>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" onclick="const l = document.getElementById('sci-left-mass-val')?.innerText || '0'; const r = document.getElementById('sci-right-mass-val')?.innerText || '0'; window.exportLabToScratchpad && window.exportLabToScratchpad('Torque Balance', 'Left pan: ' + l + ' vs Right pan: ' + r);" class="btn" style="padding: 0.6rem 1rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;" title="Save findings to digital scratchpad"><i class="fas fa-pen"></i> Note</button>
                <button type="button" id="sci-reset-btn" class="btn" style="padding: 0.6rem 1.25rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;">Reset Scale</button>
            </div>
        </div>
    </div>

    <!-- =================================================================== -->
    <!-- 4. SOCIAL STUDIES CHRONO-TIMELINE WORKBENCH -->
    <!-- =================================================================== -->
    <div id="lab-social" class="lab-workbench">
        <div class="wb-header">
            <div>
                <h2 class="wb-title"><i class="fas fa-history" style="color: #f59e0b;"></i> Chrono-Timeline Sorter</h2>
                <p class="wb-desc">Arrange foundational American history milestones in exact chronological order using the shift controls.</p>
            </div>
            <div style="font-size: 0.85rem; font-weight: 800; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); background: color-mix(in srgb, #f59e0b 15%, transparent); color: #f59e0b;">
                Standard: NCSS D2.His.1.6-8
            </div>
        </div>

        <div id="social-timeline-slots" class="timeline-slots-wrap">
            <!-- Rendered by JS -->
        </div>

        <div class="wb-actions">
            <div id="soc-timeline-feedback" class="feedback-container"></div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" onclick="window.exportLabToScratchpad && window.exportLabToScratchpad('Chrono-Timeline', 'Milestones: 1775 Lexington & Concord -> 1776 Dec of Independence -> 1787 Constitutional Convention -> 1791 Bill of Rights');" class="btn" style="padding: 0.6rem 1rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;" title="Save findings to digital scratchpad"><i class="fas fa-pen"></i> Note</button>
                <button type="button" id="soc-reset-timeline" class="btn" style="padding: 0.6rem 1.25rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;">Shuffle Again</button>
                <button type="button" id="soc-check-timeline" class="btn" style="padding: 0.6rem 1.5rem; border-radius: var(--radius-md); background: var(--color-primary); color: white; border: none; font-weight: 800; cursor: pointer;">Verify Sequence</button>
            </div>
        </div>
    </div>

    <!-- =================================================================== -->
    <!-- 5. CHEMISTRY PH SCALE & ACID-BASE WORKBENCH -->
    <!-- =================================================================== -->
    <div id="lab-chem" class="lab-workbench">
        <div class="wb-header">
            <div>
                <h2 class="wb-title"><i class="fas fa-vial" style="color: #ec4899;"></i> Chemistry pH Scale & Chemical Indicator Station</h2>
                <p class="wb-desc">Dip simulated universal litmus paper into acidic, neutral, and alkaline solutions to measure logarithmic hydronium \([H^+]\) concentrations.</p>
            </div>
            <div style="font-size: 0.85rem; font-weight: 800; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); background: color-mix(in srgb, #ec4899 15%, transparent); color: #ec4899;">
                Standard: NGSS MS-PS1-2 & HS-PS1-2
            </div>
        </div>

        <div class="chem-lab-stage" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1rem; align-items: start;">
            <!-- Left: Substance Palette & Controls -->
            <div class="chem-controls-card" style="background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: 1.25rem; padding: 1.5rem;">
                <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: 0.75rem;">Select Test Liquid:</span>
                <div class="chem-substance-list" style="display: flex; flex-direction: column; gap: 0.5rem;" role="radiogroup" aria-label="Chemical Solutions">
                    <button type="button" class="chem-substance-btn active" data-ph="2.0" data-name="Lemon Juice (Citric Acid)" data-color="#ef4444" data-desc="Strong natural acid. High [H+] concentration." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1.5px solid #ef4444; background: rgba(239, 68, 68, 0.08); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">🍋 Lemon Juice</span>
                        <strong style="color: #ef4444; font-size: 0.85rem;">pH 2.0 (Acid)</strong>
                    </button>
                    <button type="button" class="chem-substance-btn" data-ph="5.0" data-name="Black Coffee" data-color="#f59e0b" data-desc="Weak organic acid commonly consumed." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-surface); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">☕ Black Coffee</span>
                        <strong style="color: #f59e0b; font-size: 0.85rem;">pH 5.0 (Weak Acid)</strong>
                    </button>
                    <button type="button" class="chem-substance-btn" data-ph="7.0" data-name="Pure Distilled Water" data-color="#10b981" data-desc="Neutral chemical baseline: [H+] = [OH-]." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-surface); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">💧 Pure Water</span>
                        <strong style="color: #10b981; font-size: 0.85rem;">pH 7.0 (Neutral)</strong>
                    </button>
                    <button type="button" class="chem-substance-btn" data-ph="8.5" data-name="Baking Soda Solution" data-color="#06b6d4" data-desc="Mild alkaline base that neutralizes stomach acid." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-surface); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">🥄 Baking Soda</span>
                        <strong style="color: #06b6d4; font-size: 0.85rem;">pH 8.5 (Mild Base)</strong>
                    </button>
                    <button type="button" class="chem-substance-btn" data-ph="11.5" data-name="Household Ammonia" data-color="#6366f1" data-desc="Concentrated alkaline cleaning agent. High [OH-]." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-surface); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">🧴 Ammonia</span>
                        <strong style="color: #6366f1; font-size: 0.85rem;">pH 11.5 (Strong Base)</strong>
                    </button>
                    <button type="button" class="chem-substance-btn" data-ph="13.0" data-name="Chlorine Bleach" data-color="#8b5cf6" data-desc="Caustic alkaline solution with extreme basicity." style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-surface); cursor: pointer; text-align: left;">
                        <span style="font-weight: 700;">🧼 Bleach</span>
                        <strong style="color: #8b5cf6; font-size: 0.85rem;">pH 13.0 (Extreme Base)</strong>
                    </button>
                </div>
            </div>

            <!-- Right: Interactive Beaker & Litmus Strip -->
            <div class="chem-beaker-card" style="background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: 1.25rem; padding: 1.5rem; text-align: center;">
                <div style="margin-bottom: 1rem;">
                    <h3 id="chem-liquid-name" style="margin: 0; font-size: 1.15rem; font-weight: 800; color: var(--color-text-main);">Lemon Juice (Citric Acid)</h3>
                    <p id="chem-liquid-desc" style="font-size: 0.85rem; color: var(--color-text-muted); margin: 0.25rem 0 0 0;">Strong natural acid. High [H+] concentration.</p>
                </div>

                <!-- Animated Beaker Graphic -->
                <div class="chem-beaker-graphic" style="position: relative; width: 140px; height: 180px; margin: 0 auto 1.5rem auto; border: 4px solid var(--color-border); border-top: none; border-radius: 0 0 1.5rem 1.5rem; overflow: hidden; background: rgba(0,0,0,0.02);">
                    <!-- Litmus Paper Strip dipped -->
                    <div id="chem-litmus-strip" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 28px; height: 110px; background: #e2e8f0; border: 1px solid #cbd5e1; border-radius: 3px; z-index: 5; transition: all 0.5s ease;">
                        <span style="font-size: 0.6rem; writing-mode: vertical-rl; transform: rotate(180deg); color: #64748b; font-weight: 700; margin-top: 6px; display: block;">LITMUS</span>
                    </div>
                    <!-- Liquid in Beaker -->
                    <div id="chem-beaker-liquid" style="position: absolute; bottom: 0; left: 0; right: 0; height: 120px; background: rgba(239, 68, 68, 0.35); border-top: 2px solid rgba(239, 68, 68, 0.8); transition: all 0.5s ease;"></div>
                </div>

                <!-- pH Color Spectrum Scale -->
                <div class="chem-ph-gauge" style="margin-top: 1rem;">
                    <div style="display: flex; justify-content: space-between; font-size: 0.75rem; font-weight: 800; margin-bottom: 0.35rem;">
                        <span style="color: #ef4444;">0 (Acid)</span>
                        <span style="color: #10b981;">7 (Neutral)</span>
                        <span style="color: #8b5cf6;">14 (Base)</span>
                    </div>
                    <div style="height: 12px; border-radius: 9999px; background: linear-gradient(90deg, #ef4444 0%, #f59e0b 25%, #10b981 50%, #06b6d4 70%, #6366f1 85%, #8b5cf6 100%); position: relative;">
                        <div id="chem-ph-pointer" style="position: absolute; top: -4px; left: 14.3%; width: 20px; height: 20px; border-radius: 50%; background: #ffffff; border: 3px solid #0f172a; transform: translateX(-50%); box-shadow: 0 2px 5px rgba(0,0,0,0.3); transition: left 0.4s ease;"></div>
                    </div>
                    <div style="margin-top: 0.85rem; font-size: 1.25rem; font-weight: 900; color: var(--color-text-main);" id="chem-ph-reading">
                        pH: 2.0
                    </div>
                </div>
            </div>
        </div>

        <div class="wb-actions">
            <div id="chem-feedback-msg" class="feedback-container">
                <span style="color: #10b981;"><i class="fas fa-check-circle"></i> Indicator reading matches acid baseline. +35 XP awarded on testing!</span>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" onclick="const n = document.getElementById('chem-liquid-name')?.innerText || ''; const p = document.getElementById('chem-ph-reading')?.innerText || ''; window.exportLabToScratchpad && window.exportLabToScratchpad('Chemistry pH Scale', n + ' measured at ' + p); " class="btn" style="padding: 0.6rem 1rem; border-radius: var(--radius-md); background: var(--color-bg-base); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 800; cursor: pointer;" title="Save findings to digital scratchpad"><i class="fas fa-pen"></i> Note</button>
                <button type="button" id="chem-dip-strip-btn" class="btn" style="padding: 0.6rem 1.5rem; border-radius: var(--radius-md); background: #ec4899; color: white; border: none; font-weight: 800; cursor: pointer;"><i class="fas fa-vial"></i> Dip Litmus Paper</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= assetVersion('/assets/js/labs/interactive-labs.js') ?>"></script>

<?php
// Include footer
include '../src/footer.php';
?>
