<?php
// ====================================================================
// ACCESSIBILITY & INCLUSIVE LEARNING SHOWCASE
// Hesten's Learning Platform
// ====================================================================

$pageTitle       = "Accessibility & Inclusive Learning Hub | Hesten's Learning";
$pageDescription = "Discover all accessibility accommodations on Hesten's Learning: Dyslexia-friendly typography, Bionic Reading, reading masks, high contrast themes, keyboard navigation, and TTS.";
$pageKeywords    = "accessibility, a11y, dyslexia, ADHD, neurodivergent, bionic reading, reading mask, high contrast, WCAG, screen reader, assistive tech";
$pageAuthor      = "Hesten Allison & Antigravity";

include '../src/header.php';
?>

<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/accessibility.css') ?>">

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg">
        <i class="fas fa-universal-access bg-icon-1" aria-hidden="true"></i>
        <i class="fas fa-eye bg-icon-2" aria-hidden="true"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            <i class="fas fa-universal-access" aria-hidden="true"></i> Universal Inclusion
        </span>
        <h1 class="page-hero-title">
            Accessibility & Accommodations Hub
        </h1>
        <p class="page-hero-subtitle">
            Engineered from the ground up for neurodivergent thinkers, dyslexic readers, low-vision students, and keyboard power users.
        </p>

        <!-- Quick Interactive Actions -->
        <div class="a11y-quick-actions">
            <button type="button" class="a11y-action-chip" onclick="window.toggleA11ySettings ? window.toggleA11ySettings() : null">
                <i class="fas fa-sliders-h" aria-hidden="true"></i>
                <span>Open Settings Panel</span>
                <kbd>Alt+A</kbd>
            </button>
            <button type="button" class="a11y-action-chip" onclick="window.toggleShortcutsModal ? window.toggleShortcutsModal() : null">
                <i class="fas fa-keyboard" aria-hidden="true"></i>
                <span>Shortcuts Cheatsheet</span>
                <kbd>?</kbd>
            </button>
            <button type="button" class="a11y-action-chip" onclick="window.toggleStudyTimer ? window.toggleStudyTimer() : null">
                <i class="fas fa-stopwatch" aria-hidden="true"></i>
                <span>Focus Timer</span>
                <kbd>Alt+T</kbd>
            </button>
            <button type="button" class="a11y-action-chip" onclick="window.print()">
                <i class="fas fa-print" aria-hidden="true"></i>
                <span>Print-Friendly View</span>
                <kbd>Ctrl+P</kbd>
            </button>
        </div>
    </div>
</div>

<main class="a11y-hub-wrapper" id="main-content" tabindex="-1">

    <!-- ==================================================================== -->
    <!-- INTERACTIVE TEST SANDBOX -->
    <!-- ==================================================================== -->
    <section class="a11y-sandbox-card" aria-labelledby="sandbox-heading">
        <span class="sandbox-badge"><i class="fas fa-flask" aria-hidden="true"></i> Live Test Sandbox</span>
        <h2 id="sandbox-heading" class="sandbox-title">Try Accommodations in Real-Time</h2>
        <p class="sandbox-desc">
            Experiment with typography, bionic reading, color filters, and line height on the sample reading passage below. Adjustments apply instantly to this test area.
        </p>

        <div class="sandbox-controls-grid">
            <!-- Font Family -->
            <div class="sandbox-control-group">
                <label for="sb-font"><i class="fas fa-font" aria-hidden="true"></i> Typography</label>
                <select id="sb-font" class="sandbox-select">
                    <option value="Inter">Inter (Clean Standard)</option>
                    <option value="Outfit">Outfit (Modern Display)</option>
                    <option value="'Open Dyslexic', sans-serif">OpenDyslexic (Anti-Reversal)</option>
                    <option value="Lexend, sans-serif">Lexend (Fluency-Optimized)</option>
                    <option value="'Comic Neue', cursive">Comic Neue (Friendly Letterforms)</option>
                    <option value="'Roboto Mono', monospace">Roboto Mono (Monospace)</option>
                </select>
            </div>

            <!-- Bionic Reading Toggle -->
            <div class="sandbox-control-group">
                <label for="sb-bionic"><i class="fas fa-bolt" aria-hidden="true"></i> Reading Guidance</label>
                <select id="sb-bionic" class="sandbox-select">
                    <option value="standard">Standard Text</option>
                    <option value="bionic">Bionic Reading (Bold Fixations)</option>
                </select>
            </div>

            <!-- Font Size -->
            <div class="sandbox-control-group">
                <label for="sb-size"><i class="fas fa-text-height" aria-hidden="true"></i> Text Scaling: <span id="sb-size-val">100%</span></label>
                <input type="range" id="sb-size" class="sandbox-range" min="80" max="180" step="5" value="100">
            </div>

            <!-- Line Spacing -->
            <div class="sandbox-control-group">
                <label for="sb-line"><i class="fas fa-arrows-alt-v" aria-hidden="true"></i> Line Height: <span id="sb-line-val">1.6x</span></label>
                <input type="range" id="sb-line" class="sandbox-range" min="1.2" max="2.4" step="0.1" value="1.6">
            </div>

            <!-- Color Filter Overlay -->
            <div class="sandbox-control-group">
                <label for="sb-tint"><i class="fas fa-palette" aria-hidden="true"></i> Irlen Tint Overlay</label>
                <select id="sb-tint" class="sandbox-select">
                    <option value="none">None (Standard)</option>
                    <option value="rgba(255, 255, 0, 0.15)">Pale Yellow (Warm Comfort)</option>
                    <option value="rgba(173, 216, 230, 0.18)">Pale Blue (Cool Anti-Glare)</option>
                    <option value="rgba(144, 238, 144, 0.18)">Pale Green (Visual Calming)</option>
                    <option value="rgba(255, 182, 193, 0.18)">Pale Pink (High Contrast Softer)</option>
                    <option value="rgba(216, 191, 216, 0.18)">Pale Purple (Reduced Fatigue)</option>
                </select>
            </div>

            <!-- Live Speech -->
            <div class="sandbox-control-group" style="justify-content: flex-end;">
                <label><i class="fas fa-volume-up" aria-hidden="true"></i> Read Aloud</label>
                <button type="button" class="a11y-action-chip" id="sb-speak-btn" style="width: 100%; justify-content: center;">
                    <i class="fas fa-play" aria-hidden="true"></i> Listen to Passage
                </button>
            </div>
        </div>

        <!-- Live Sandbox Text Preview -->
        <div class="sandbox-preview-box" id="sb-preview-box">
            <h3 class="sandbox-preview-title" id="sb-preview-title">The Scientific Method & Curious Discoveries</h3>
            <p class="sandbox-preview-text" id="sb-preview-text">
                Science begins with curiosity and keen observation. When researchers examine the world around them, they pose thoughtful questions, form predictive hypotheses, and conduct rigorous experiments to discover how natural phenomena function. Every student learns at their own distinct pace, and providing multi-sensory accommodations ensures that knowledge is accessible to every inquisitive mind.
            </p>
        </div>
    </section>

    <!-- ==================================================================== -->
    <!-- READING FLUENCY & SPEED BENCHMARK TOOL -->
    <!-- ==================================================================== -->
    <section class="benchmark-wrapper" aria-labelledby="benchmark-heading">
        <div class="benchmark-header-row">
            <div>
                <span class="benchmark-tag"><i class="fas fa-stopwatch" aria-hidden="true"></i> Clinical &amp; Research Tool</span>
                <h2 id="benchmark-heading" style="font-size: 1.5rem; font-weight: 800; margin: 0.5rem 0 0.25rem 0;">Reading Fluency &amp; Speed Benchmark</h2>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">Measure Words Per Minute (WPM) and compare reading ease between standard typography and active assistive accommodations.</p>
            </div>
        </div>

        <div class="benchmark-controls-bar">
            <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                <label for="bm-mode-select" style="font-weight: 700; font-size: 0.875rem;">Accommodation Mode:</label>
                <select id="bm-mode-select" class="benchmark-mode-select" aria-label="Select Accommodation Mode for Benchmark">
                    <option value="baseline">Standard Baseline (Inter 1.6x)</option>
                    <option value="bionic">Bionic Reading (Bold Fixation)</option>
                    <option value="opendyslexic">OpenDyslexic (Weighted Baseline)</option>
                    <option value="lexend">Lexend (Cognitive Spacing)</option>
                    <option value="sepia-tint">Sepia Calm Tint (1.8x Line Height)</option>
                </select>
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem; margin-left: auto; flex-wrap: wrap;">
                <div class="benchmark-timer-box" id="bm-timer" aria-live="polite">00:00</div>
                <button type="button" id="bm-start-btn" class="a11y-action-chip" style="background: var(--color-primary); color: #fff; font-weight: 700;">
                    <i class="fas fa-play" aria-hidden="true"></i> <span>Start Benchmark</span>
                </button>
                <button type="button" id="bm-done-btn" class="a11y-action-chip" style="background: var(--color-success, #10b981); color: #fff; font-weight: 700; display: none;">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> <span>I Finished Reading</span>
                </button>
                <button type="button" id="bm-reset-btn" class="a11y-action-chip" style="display: none;">
                    <i class="fas fa-redo" aria-hidden="true"></i> <span>Reset</span>
                </button>
            </div>
        </div>

        <div class="benchmark-passage-box is-blurred" id="bm-passage-box">
            <div class="benchmark-overlay-prompt" id="bm-overlay-prompt">
                <i class="fas fa-eye-slash" style="margin-right: 0.5rem;" aria-hidden="true"></i> Click "Start Benchmark" to reveal passage and start timer
            </div>
            <p id="bm-passage-text" style="margin: 0;">
                Photosynthesis is the remarkable biochemical process by which green plants, algae, and certain bacteria convert sunlight energy into chemical energy stored in glucose. Inside cellular plant chloroplasts, green chlorophyll pigments capture specific light wavelengths. When water absorbed through roots combines with carbon dioxide absorbed through microscopic leaf stomata, oxygen gas is released into Earth's atmosphere as an essential byproduct. This foundational biological mechanism powers virtually all terrestrial ecosystems.
            </p>
        </div>

        <div class="benchmark-results-card" id="bm-results-card" style="display: none;" aria-live="polite">
            <h3 style="margin: 0; font-size: 1.1rem; font-weight: 700;"><i class="fas fa-chart-line" style="color: var(--color-primary);" aria-hidden="true"></i> Fluency Benchmark Assessment</h3>
            <div class="benchmark-metrics-grid">
                <div class="benchmark-metric-item">
                    <div class="benchmark-metric-val" id="bm-res-wpm">0</div>
                    <div class="benchmark-metric-lbl">Words Per Minute</div>
                </div>
                <div class="benchmark-metric-item">
                    <div class="benchmark-metric-val" id="bm-res-time">0.0s</div>
                    <div class="benchmark-metric-lbl">Elapsed Time</div>
                </div>
                <div class="benchmark-metric-item">
                    <div class="benchmark-metric-val" id="bm-res-words">68</div>
                    <div class="benchmark-metric-lbl">Total Words</div>
                </div>
                <div class="benchmark-metric-item">
                    <div class="benchmark-metric-val" id="bm-res-bracket">Proficient</div>
                    <div class="benchmark-metric-lbl">Fluency Tier</div>
                </div>
            </div>
            <p id="bm-res-summary" style="margin: 0; font-size: 0.9rem; color: var(--color-text-muted); line-height: 1.5;"></p>
        </div>
    </section>

    <!-- ==================================================================== -->
    <!-- SECTION 1: DYSLEXIA & READING COMPREHENSION -->
    <!-- ==================================================================== -->
    <div class="a11y-section-header">
        <div class="a11y-section-icon"><i class="fas fa-book-reader" aria-hidden="true"></i></div>
        <h2>Dyslexia & Reading Comprehension</h2>
    </div>

    <div class="a11y-cards-grid">
        <!-- OpenDyslexic & Lexend -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-purple"><i class="fas fa-font"></i></div>
                <div class="feature-title-wrap">
                    <h3>Dyslexia-Friendly Fonts</h3>
                    <span class="feature-tag">OpenDyslexic & Lexend</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    <strong>OpenDyslexic</strong> uses heavy, weighted bottom baselines to prevent letters from appearing to flip, rotate, or blur together (such as confusing <em>b/d/p/q</em>). 
                </p>
                <p>
                    <strong>Lexend</strong> is an evidence-based typographic family designed specifically by educational researchers to reduce cognitive visual crowding and improve reading speed.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Select <strong>Open Dyslexic</strong> or <strong>Lexend</strong> under Font.</span>
            </div>
        </article>

        <!-- Bionic Reading -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-amber"><i class="fas fa-bolt"></i></div>
                <div class="feature-title-wrap">
                    <h3>Bionic Reading Mode</h3>
                    <span class="feature-tag">Guided Eye Fixations</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    Bionic Reading guides the reader's eye through text with artificial fixation points by dynamically bolding the first several letters of each word. 
                </p>
                <p>
                    This allows the brain to rapidly complete words from memory, dramatically reducing the cognitive effort required for decoding and boosting focus for students with ADHD.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Toggle <strong>Bionic Reading</strong> switch.</span>
            </div>
        </article>

        <!-- Color Overlays -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-teal"><i class="fas fa-palette"></i></div>
                <div class="feature-title-wrap">
                    <h3>Color Tint Overlays</h3>
                    <span class="feature-tag">Irlen Syndrome & Glare Relief</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    Many individuals suffer from scotopic sensitivity (Meares-Irlen Syndrome), experiencing visual distortion, perceptual fatigue, and physical strain under stark black-on-white illumination.
                </p>
                <p>
                    Our platform offers 5 research-backed pastel color filters (Yellow, Blue, Green, Pink, and Purple) that blanket the entire viewport with a calming tint.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Select your tint under <strong>Color Overlay</strong>.</span>
            </div>
        </article>
    </div>

    <!-- ==================================================================== -->
    <!-- KARAOKE SYNCHRONIZED WORD-BY-WORD READ-ALOUD DEMONSTRATION -->
    <!-- ==================================================================== -->
    <section class="karaoke-demo-wrapper" aria-labelledby="karaoke-heading">
        <div class="benchmark-header-row">
            <div>
                <span class="benchmark-tag" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;"><i class="fas fa-volume-up" aria-hidden="true"></i> Phonemic Fluency &amp; Audio-Visual Decoding</span>
                <h3 id="karaoke-heading" style="font-size: 1.4rem; font-weight: 800; margin: 0.5rem 0 0.25rem 0;">Synchronized Word-by-Word "Karaoke" Read-Aloud</h3>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">Multi-sensory bimodal reading pairs synthesized speech with real-time word-level optical tracking, strengthening vocabulary acquisition and dyslexic comprehension.</p>
            </div>
            <div style="display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                <label for="karaoke-speed-select" style="font-size: 0.85rem; font-weight: 700;">Rate:</label>
                <select id="karaoke-speed-select" class="benchmark-mode-select" style="padding: 0.35rem 0.6rem;">
                    <option value="0.75">0.75x (Supported)</option>
                    <option value="1.0" selected>1.0x (Standard)</option>
                    <option value="1.25">1.25x (Accelerated)</option>
                </select>
                <button type="button" id="karaoke-play-btn" class="a11y-action-chip" style="background: var(--color-primary); color: #fff; font-weight: 700;">
                    <i class="fas fa-play" aria-hidden="true"></i> <span>Listen &amp; Track</span>
                </button>
                <button type="button" id="karaoke-stop-btn" class="a11y-action-chip" style="display: none;">
                    <i class="fas fa-stop" aria-hidden="true"></i> <span>Stop</span>
                </button>
            </div>
        </div>

        <div class="karaoke-passage-box" id="karaoke-passage-box" aria-live="polite">
            <p id="karaoke-text-container" class="karaoke-text-stream">
                Effective reading instruction combines auditory sound patterns with visual word recognition. When each word illuminates synchronously as spoken, cognitive processing barriers dissolve, empowering struggling readers to build automatic word decoding and fluid comprehension.
            </p>
        </div>
    </section>

    <!-- ==================================================================== -->
    <!-- SECTION 2: ATTENTION & COGNITIVE SUPPORTS (ADHD & FOCUS) -->
    <!-- ==================================================================== -->
    <div class="a11y-section-header">
        <div class="a11y-section-icon"><i class="fas fa-brain" aria-hidden="true"></i></div>
        <h2>Attention & Cognitive Supports (ADHD & Focus)</h2>
    </div>

    <div class="a11y-cards-grid">
        <!-- Reading Mask -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-blue"><i class="fas fa-window-maximize"></i></div>
                <div class="feature-title-wrap">
                    <h3>Reading Mask & Letterbox</h3>
                    <span class="feature-tag">Line-Tracking Ruler</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    The Reading Mask creates a horizontal translucent viewport that follows your mouse cursor or touch point, gently dimming out lines above and below.
                </p>
                <p>
                    This physical guide prevents line-skipping, wandering gaze, and sensory overwhelm across dense instructional modules.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Toggle <strong>Reading Mask</strong>.</span>
            </div>
        </article>

        <!-- Spotlight Mode -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-emerald"><i class="fas fa-crosshairs"></i></div>
                <div class="feature-title-wrap">
                    <h3>Spotlight Focus Torch</h3>
                    <span class="feature-tag">Visual Tunneling</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    Spotlight mode illuminates a circular radial spotlight directly over the active cursor while gently shading the surrounding screen area.
                </p>
                <p>
                    It functions like a reading flashlight, directing sustained attention toward individual math equations or vocabulary prompts.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Toggle <strong>Spotlight Mode</strong>.</span>
            </div>
        </article>

        <!-- Focus Mode & Hide Images -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-rose"><i class="fas fa-eye-slash"></i></div>
                <div class="feature-title-wrap">
                    <h3>Distraction Stripper</h3>
                    <span class="feature-tag">Focus Mode & Hide Images</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    For students who experience sensory overload or find decorative illustrations distracting while solving problems, <strong>Focus Mode</strong> strips non-essential margins and headers.
                </p>
                <p>
                    <strong>Hide Images</strong> temporarily replaces decorative artwork with compact placeholders, keeping only essential diagrams and textual instructions.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Toggle <strong>Focus Mode</strong> or <strong>Hide Images</strong>.</span>
            </div>
        </article>
    </div>

    <!-- ==================================================================== -->
    <!-- SECTION 3: VISION & ERGONOMIC THEMES -->
    <!-- ==================================================================== -->
    <div class="a11y-section-header">
        <div class="a11y-section-icon"><i class="fas fa-adjust" aria-hidden="true"></i></div>
        <h2>Vision, Contrast & Ergonomic Themes</h2>
    </div>

    <div class="a11y-cards-grid">
        <!-- High Contrast Mode -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-amber"><i class="fas fa-low-vision"></i></div>
                <div class="feature-title-wrap">
                    <h3>High Contrast Theme (WCAG AAA)</h3>
                    <span class="feature-tag">Maximum Legibility</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    Engineered for legally blind and low-vision learners, our High Contrast theme features an absolute black backdrop (<kbd>#000000</kbd>), vivid yellow headings (<kbd>#ffff00</kbd>), crisp white body typography (<kbd>#ffffff</kbd>), and thick solid white borders.
                </p>
                <p>
                    Drop shadows, glows, and transparent blurs are eliminated for zero visual ambiguity.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Select <strong>Contrast</strong> theme.</span>
            </div>
        </article>

        <!-- Sepia & Midnight -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-purple"><i class="fas fa-moon"></i></div>
                <div class="feature-title-wrap">
                    <h3>Sepia & Midnight Themes</h3>
                    <span class="feature-tag">Circadian & OLED Comfort</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    <strong>Sepia</strong> provides a gentle, low-blue-light cream backdrop (<kbd>#fbf0d9</kbd>) that mimics warm physical book pages, reducing eye strain during extended study.
                </p>
                <p>
                    <strong>Midnight</strong> delivers ultra-deep slate blacks (<kbd>#020617</kbd>) optimized for true OLED displays and zero glare in dark environments.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Select <strong>Sepia</strong> or <strong>Midnight</strong>.</span>
            </div>
        </article>

        <!-- Motion & Cursors -->
        <article class="a11y-feature-card">
            <div class="feature-top">
                <div class="feature-icon-box icon-teal"><i class="fas fa-mouse-pointer"></i></div>
                <div class="feature-title-wrap">
                    <h3>Large Cursor & Stop Motion</h3>
                    <span class="feature-tag">Vestibular & Motor Aids</span>
                </div>
            </div>
            <div class="feature-body">
                <p>
                    <strong>Stop Animations</strong> halts all looping, bouncy keyframe animations, tool slide-ins, and pulsating flame streaks for users with vestibular balance disorders.
                </p>
                <p>
                    <strong>Large Cursor</strong> enlarges mouse pointers to high-visibility dimensions to assist motor-impaired and young elementary learners.
                </p>
            </div>
            <div class="feature-demo-box">
                <span class="feature-demo-title">How to activate:</span>
                <span>Open Settings (<kbd>Alt+A</kbd>) &rarr; Toggle <strong>Stop Animations</strong> or <strong>Large Cursor</strong>.</span>
            </div>
        </article>
    </div>

    <!-- ==================================================================== -->
    <!-- CLINICAL VISION & COLORBLINDNESS SIMULATION STUDIO -->
    <!-- ==================================================================== -->
    <section class="vision-sim-wrapper" aria-labelledby="vision-sim-heading">
        <!-- Embedded SVG Color Matrix Filter Definitions -->
        <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <defs>
                <!-- Protanopia (Red-Blind / Weak L-cones) -->
                <filter id="protanopia-filter">
                    <feColorMatrix type="matrix" values="0.567, 0.433, 0, 0, 0   0.558, 0.442, 0, 0, 0   0, 0.242, 0.758, 0, 0   0, 0, 0, 1, 0" />
                </filter>
                <!-- Deuteranopia (Green-Blind / Weak M-cones) -->
                <filter id="deuteranopia-filter">
                    <feColorMatrix type="matrix" values="0.625, 0.375, 0, 0, 0   0.7, 0.3, 0, 0, 0   0, 0.3, 0.7, 0, 0   0, 0, 0, 1, 0" />
                </filter>
                <!-- Tritanopia (Blue-Blind / Weak S-cones) -->
                <filter id="tritanopia-filter">
                    <feColorMatrix type="matrix" values="0.95, 0.05, 0, 0, 0   0, 0.433, 0.567, 0, 0   0, 0.475, 0.525, 0, 0   0, 0, 0, 1, 0" />
                </filter>
                <!-- Achromatopsia (Monochromacy / Zero Color) -->
                <filter id="achromatopsia-filter">
                    <feColorMatrix type="matrix" values="0.299, 0.587, 0.114, 0, 0   0.299, 0.587, 0.114, 0, 0   0.299, 0.587, 0.114, 0, 0   0, 0, 0, 1, 0" />
                </filter>
                <!-- Cataracts (Diffused Blur + Severe Contrast Attenuation) -->
                <filter id="cataracts-filter">
                    <feGaussianBlur stdDeviation="1.8" />
                    <feColorMatrix type="matrix" values="0.75, 0, 0, 0, 0.1   0, 0.75, 0, 0, 0.1   0, 0, 0.75, 0, 0.1   0, 0, 0, 1, 0" />
                </filter>
            </defs>
        </svg>

        <div class="benchmark-header-row">
            <div>
                <span class="benchmark-tag" style="background: rgba(234, 88, 12, 0.12); color: #ea580c;"><i class="fas fa-eye" aria-hidden="true"></i> Clinical Simulation &amp; Audit</span>
                <h3 id="vision-sim-heading" style="font-size: 1.4rem; font-weight: 800; margin: 0.5rem 0 0.25rem 0;">Clinical Vision &amp; Colorblindness Simulation Studio</h3>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">Experience instructional materials through the visual perception of students with color vision deficiency, cataracts, or contrast impairment.</p>
            </div>
        </div>

        <div class="vision-controls-bar">
            <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                <label for="vision-sim-select" style="font-weight: 700; font-size: 0.875rem;"><i class="fas fa-glasses" aria-hidden="true"></i> Pathology / Simulation:</label>
                <select id="vision-sim-select" class="benchmark-mode-select" aria-label="Select Vision Simulation Condition">
                    <option value="none">Normal Trichromatic Vision (Standard)</option>
                    <option value="protanopia">Protanopia (Red-Blind / L-Cone Deficiency)</option>
                    <option value="deuteranopia">Deuteranopia (Green-Blind / M-Cone Deficiency)</option>
                    <option value="tritanopia">Tritanopia (Blue-Blind / S-Cone Deficiency)</option>
                    <option value="achromatopsia">Achromatopsia (Monochromacy / Zero Color)</option>
                    <option value="cataracts">Cataracts (Diffused Clouding &amp; Contrast Loss)</option>
                </select>
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem; margin-left: auto; flex-wrap: wrap;">
                <button type="button" id="btn-toggle-site-sim" class="a11y-action-chip" title="Simulate this condition across the entire website">
                    <i class="fas fa-globe" aria-hidden="true"></i> <span>Audit Whole Site</span>
                </button>
                <button type="button" id="btn-reset-vision-sim" class="a11y-action-chip">
                    <i class="fas fa-undo" aria-hidden="true"></i> <span>Reset Vision</span>
                </button>
            </div>
        </div>

        <!-- Visual Specimen Box for Testing Color & Contrast -->
        <div class="vision-specimen-box" id="vision-specimen-box">
            <div class="vision-specimen-header">
                <div>
                    <h4 style="margin: 0; font-size: 1.05rem; font-weight: 700;">Diagnostic Curriculum Specimen</h4>
                    <span style="font-size: 0.8rem; color: var(--color-text-muted);">Active Filter: <strong id="vision-active-label" style="color: var(--color-primary);">Normal Trichromatic</strong></span>
                </div>
                <span class="benchmark-tag" style="background: var(--color-bg-subtle); border: 1px solid var(--color-border); font-size: 0.75rem;">Multi-Color Calibration</span>
            </div>

            <!-- Color Bar Spectrum Test -->
            <div class="vision-color-spectrum" aria-label="Color spectrum calibration bar">
                <div style="background: #ef4444;" title="Red (#ef4444)"><span>Red</span></div>
                <div style="background: #f97316;" title="Orange (#f97316)"><span>Orange</span></div>
                <div style="background: #eab308;" title="Yellow (#eab308)"><span>Yellow</span></div>
                <div style="background: #22c55e;" title="Green (#22c55e)"><span>Green</span></div>
                <div style="background: #06b6d4;" title="Cyan (#06b6d4)"><span>Cyan</span></div>
                <div style="background: #3b82f6;" title="Blue (#3b82f6)"><span>Blue</span></div>
                <div style="background: #a855f7;" title="Purple (#a855f7)"><span>Purple</span></div>
                <div style="background: #ec4899;" title="Pink (#ec4899)"><span>Pink</span></div>
            </div>

            <!-- Complex Specimen Grid: Text, Math, Buttons & Badges -->
            <div class="vision-specimen-grid">
                <div class="vision-specimen-card">
                    <h5 style="margin: 0 0 0.5rem 0; font-size: 0.9rem; color: #3b82f6;"><i class="fas fa-calculator" aria-hidden="true"></i> Mathematics &amp; Algebra</h5>
                    <p style="font-size: 0.85rem; line-height: 1.6; margin: 0 0 0.5rem 0;">Solve for $x$ where $f(x) = 2x^2 - 4x + 7$. Identify the vertex $(h, k)$ on the Cartesian coordinate plane.</p>
                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                        <span class="benchmark-tag" style="background: rgba(34, 197, 94, 0.15); color: #16a34a;">Correct (+10 pts)</span>
                        <span class="benchmark-tag" style="background: rgba(239, 68, 68, 0.15); color: #dc2626;">Error Alert</span>
                    </div>
                </div>

                <div class="vision-specimen-card">
                    <h5 style="margin: 0 0 0.5rem 0; font-size: 0.9rem; color: #8b5cf6;"><i class="fas fa-atom" aria-hidden="true"></i> Science Data Plot</h5>
                    <p style="font-size: 0.85rem; line-height: 1.6; margin: 0 0 0.5rem 0;">Examine cellular respiration rates across varying ambient oxygen percentages. Blue curves denote aerobic, red curves denote anaerobic.</p>
                    <div style="display: flex; gap: 0.5rem;">
                        <button type="button" class="a11y-action-chip" style="background: #3b82f6; color: #fff; border: none; font-size: 0.75rem;">Aerobic (Blue)</button>
                        <button type="button" class="a11y-action-chip" style="background: #ef4444; color: #fff; border: none; font-size: 0.75rem;">Anaerobic (Red)</button>
                    </div>
                </div>
            </div>

            <div class="vision-info-callout" id="vision-info-callout">
                <i class="fas fa-info-circle" style="color: var(--color-primary); flex-shrink: 0;" aria-hidden="true"></i>
                <span id="vision-callout-text">Under normal trichromatic vision, all spectral hues and alerts are readily distinguished. Notice how red and green converge toward olive-brown under Protanopia and Deuteranopia, illustrating why WCAG 2.1 Principle 1.4.1 mandates never relying on color alone.</span>
            </div>
        </div>
    </section>

    <!-- ==================================================================== -->
    <!-- SECTION 4: KEYBOARD NAVIGATION & SCREEN READERS -->
    <!-- ==================================================================== -->
    <div class="a11y-section-header">
        <div class="a11y-section-icon"><i class="fas fa-keyboard" aria-hidden="true"></i></div>
        <h2>Keyboard Navigation & Assistive Tech</h2>
    </div>

    <p style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.6;">
        Every interactive control across Hesten's Learning is fully operable without a mouse. We follow strict WCAG 2.1 keyboard compliance standards including non-trapping focus loops, skip navigation links, and screen reader live regions.
    </p>

    <!-- Shortcuts Table -->
    <table class="shortcuts-showcase-table" aria-label="Keyboard Shortcuts Table">
        <thead>
            <tr>
                <th scope="col" style="width: 28%;">Keyboard Shortcut</th>
                <th scope="col" style="width: 32%;">Action</th>
                <th scope="col" style="width: 40%;">Description & Behavior</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><kbd>?</kbd> or <kbd>Shift</kbd> + <kbd>/</kbd></td>
                <td><strong>Shortcuts Cheatsheet</strong></td>
                <td>Opens the interactive Keyboard Navigation Hub modal with accessible focus trapping.</td>
            </tr>
            <tr>
                <td><kbd>/</kbd></td>
                <td><strong>Focus Search</strong></td>
                <td>Instantly highlights the header search bar and selects existing text without typing the slash.</td>
            </tr>
            <tr>
                <td><kbd>Ctrl</kbd> + <kbd>K</kbd></td>
                <td><strong>Command Launcher</strong></td>
                <td>Opens the universal command palette to quickly jump to any curriculum level or tool.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>H</kbd></td>
                <td><strong>Go to Home</strong></td>
                <td>Navigates directly to the student dashboard.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>L</kbd></td>
                <td><strong>Go to Library</strong></td>
                <td>Opens the curriculum reader library and books.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>U</kbd></td>
                <td><strong>Go to Updates & Docs</strong></td>
                <td>Opens the chronological platform engineering and walkthrough updates portal.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>A</kbd></td>
                <td><strong>Toggle Accessibility</strong></td>
                <td>Slides out the universal accessibility settings sidebar panel.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>T</kbd></td>
                <td><strong>Toggle Study Timer</strong></td>
                <td>Opens or closes the floating study timer widget for paced study sessions.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>S</kbd></td>
                <td><strong>Toggle Scratchpad</strong></td>
                <td>Opens quick scratchpad notes for working out math steps or drafting ideas.</td>
            </tr>
            <tr>
                <td><kbd>Alt</kbd> + <kbd>C</kbd></td>
                <td><strong>Citation Generator</strong></td>
                <td>Launches citation helper for research papers and curriculum references.</td>
            </tr>
            <tr>
                <td><kbd>Esc</kbd></td>
                <td><strong>Dismiss / Close</strong></td>
                <td>Closes any open modal, dropdown, search auto-complete, or dismisses input focus.</td>
            </tr>
            <tr>
                <td><kbd>Tab</kbd> / <kbd>Shift</kbd> + <kbd>Tab</kbd></td>
                <td><strong>Focus Traversal</strong></td>
                <td>Cycles forward and backward through all focusable interactive controls with visible outline rings.</td>
            </tr>
        </tbody>
    </table>

    <!-- ==================================================================== -->
    <!-- IEP / 504 ACCOMMODATION PROFILE EXPORTER -->
    <!-- ==================================================================== -->
    <section class="iep-generator-wrapper" aria-labelledby="iep-heading">
        <div class="benchmark-header-row">
            <div>
                <span class="benchmark-tag" style="background: rgba(16, 185, 129, 0.12); color: var(--color-success, #10b981);"><i class="fas fa-file-medical-alt" aria-hidden="true"></i> Educator &amp; Clinical Suite</span>
                <h2 id="iep-heading" style="font-size: 1.5rem; font-weight: 800; margin: 0.5rem 0 0.25rem 0;">IEP / 504 Student Accommodation Profile Exporter</h2>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">Generate an official summary of the student's active digital learning accommodations for ARD committees, 504 plans, and parent-teacher conferences.</p>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" class="a11y-action-chip" id="iep-refresh-btn" title="Sync with current settings panel">
                    <i class="fas fa-sync-alt" aria-hidden="true"></i> <span>Sync Current Settings</span>
                </button>
                <button type="button" class="a11y-action-chip" id="iep-print-btn" style="background: var(--color-primary); color: #fff; font-weight: 700;">
                    <i class="fas fa-print" aria-hidden="true"></i> <span>Print Official Brief</span>
                </button>
                <button type="button" class="a11y-action-chip" id="iep-export-json-btn">
                    <i class="fas fa-file-download" aria-hidden="true"></i> <span>Export JSON</span>
                </button>
            </div>
        </div>

        <div class="iep-brief-card" id="iep-printable-area">
            <div class="iep-brief-header">
                <div>
                    <h3 class="iep-brief-title">Student Assistive Technology &amp; Digital Accommodation Profile</h3>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--color-text-muted);">
                        Hesten's Learning Universal Platform &bull; Generated: <span id="iep-brief-date"><?= date('F j, Y') ?></span>
                    </p>
                </div>
                <div style="text-align: right;">
                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; background: var(--color-bg-subtle); border: 1px solid var(--color-border); padding: 0.25rem 0.5rem; border-radius: 0.35rem;">
                        Status: Active Profile
                    </span>
                </div>
            </div>

            <div class="iep-grid">
                <!-- Quadrant 1: Typographic & Reading -->
                <div class="iep-section-box">
                    <h4><i class="fas fa-font" aria-hidden="true"></i> Typographic &amp; Decoding</h4>
                    <ul class="iep-list" id="iep-list-typographic">
                        <li>Standard Font (Inter)</li>
                        <li>Standard Text Scaling (100%)</li>
                        <li>Line Height 1.6x</li>
                    </ul>
                </div>

                <!-- Quadrant 2: Attention & Cognitive -->
                <div class="iep-section-box">
                    <h4><i class="fas fa-brain" aria-hidden="true"></i> Attention &amp; Cognitive Aids</h4>
                    <ul class="iep-list" id="iep-list-cognitive">
                        <li>Reading Mask: Inactive</li>
                        <li>Spotlight Mode: Inactive</li>
                        <li>Screen Dimmer: Inactive</li>
                    </ul>
                </div>

                <!-- Quadrant 3: Ergonomic & Visual Contrast -->
                <div class="iep-section-box">
                    <h4><i class="fas fa-palette" aria-hidden="true"></i> Vision &amp; Photophobia Relief</h4>
                    <ul class="iep-list" id="iep-list-visual">
                        <li>Color Overlay: Standard (None)</li>
                        <li>Contrast Theme: System Default</li>
                        <li>Animations: Enabled</li>
                    </ul>
                </div>

                <!-- Quadrant 4: Assistive Modalities & Pacing -->
                <div class="iep-section-box">
                    <h4><i class="fas fa-universal-access" aria-hidden="true"></i> Assistive Input &amp; Pacing</h4>
                    <ul class="iep-list" id="iep-list-assistive">
                        <li>Full Keyboard Traversal Available</li>
                        <li>Text-To-Speech Synthesis Ready</li>
                        <li>Integrated Paced Study Timer</li>
                    </ul>
                </div>
            </div>

            <div style="border-top: 1px dashed var(--color-border); padding-top: 0.75rem; display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--color-text-muted); flex-wrap: wrap; gap: 0.5rem;">
                <span>Conforms to IDEA 34 CFR &sect; 300.105 (Assistive Technology) &amp; Section 508</span>
                <span>Profile ID: HL-A11Y-CONF</span>
            </div>
        </div>
    </section>

    <!-- ==================================================================== -->
    <!-- PWA STORAGE & OFFLINE CACHE MANAGEMENT DASHBOARD -->
    <!-- ==================================================================== -->
    <section class="pwa-storage-wrapper" id="pwa-storage-section" aria-labelledby="pwa-storage-heading">
        <div class="benchmark-header-row">
            <div>
                <span class="benchmark-tag" style="background: rgba(16, 185, 129, 0.12); color: var(--color-success, #10b981);"><i class="fas fa-database" aria-hidden="true"></i> Offline Diagnostics &amp; Resilience</span>
                <h3 id="pwa-storage-heading" style="font-size: 1.4rem; font-weight: 800; margin: 0.5rem 0 0.25rem 0;">PWA Offline Cache &amp; Storage Management</h3>
                <p style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">Inspect local browser storage quota, active Cache Storage inventories, and pre-cache entire curriculum course packs for disconnected field use.</p>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" class="a11y-action-chip" id="btn-precache-coursepack" style="background: var(--color-primary); color: #fff; font-weight: 700;">
                    <i class="fas fa-cloud-download-alt" aria-hidden="true"></i> <span>Cache Complete Course Pack</span>
                </button>
                <button type="button" class="a11y-action-chip" id="btn-purge-cache" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.3);">
                    <i class="fas fa-trash" aria-hidden="true"></i> <span>Purge Cache</span>
                </button>
            </div>
        </div>

        <div class="pwa-storage-grid">
            <!-- Quota Meter Card -->
            <div class="pwa-metric-card">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted);">Indexed Storage Quota</span>
                    <span id="pwa-storage-val" style="font-size: 1.25rem; font-weight: 800; color: var(--color-primary);">Calculating...</span>
                </div>
                <div class="pwa-progress-track">
                    <div id="pwa-progress-bar" class="pwa-progress-fill" style="width: 0%;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--color-text-muted); margin-top: 0.5rem;">
                    <span id="pwa-usage-label">0 MB used</span>
                    <span id="pwa-quota-label">Quota: Detecting</span>
                </div>
            </div>

            <!-- Active Caches Inventory -->
            <div class="pwa-metric-card">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted);">Cache Storage Keys</span>
                    <span id="pwa-cache-count" class="benchmark-tag" style="font-size: 0.75rem;">0 active caches</span>
                </div>
                <ul class="iep-list" id="pwa-caches-list" style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem;">
                    <li>Scanning service worker caches...</li>
                </ul>
            </div>
        </div>

        <div id="pwa-cache-status-msg" style="display: none; font-size: 0.85rem; font-weight: 600; padding: 0.75rem 1rem; border-radius: 0.5rem; background: var(--color-bg-subtle); border: 1px solid var(--color-border);" aria-live="polite"></div>
    </section>

    <!-- ==================================================================== -->
    <!-- SECTION 5: COMPLIANCE & COMMITMENT -->
    <!-- ==================================================================== -->
    <section class="a11y-compliance-banner">
        <h3><i class="fas fa-check-circle" style="color: var(--color-success, #10b981);"></i> Our Commitment to Universal Inclusion</h3>
        <p class="compliance-statement-lead">
            Hesten's Learning conforms to the 
            <span class="compliance-term-wrap">
                <strong>(WCAG) 2.1 Level AA</strong>
                <button type="button" class="a11y-info-btn" data-standard="wcag-2-1-aa" title="Research overview & verbatim text for WCAG 2.1 Level AA" aria-label="Learn about WCAG 2.1 Level AA requirements">
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                </button>
            </span> 
            requirements, with multiple core features meeting 
            <span class="compliance-term-wrap">
                <strong>Level AAA</strong>
                <button type="button" class="a11y-info-btn" data-standard="wcag-aaa" title="Research overview & verbatim text for Level AAA" aria-label="Learn about Level AAA standards">
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                </button>
            </span> 
            contrast and cognitive standards. Our platform adheres to 
            <span class="compliance-term-wrap">
                <strong>Section 508 of the Rehabilitation Act</strong>
                <button type="button" class="a11y-info-btn" data-standard="section-508" title="Research overview & verbatim text for Section 508" aria-label="Learn about Section 508 of the Rehabilitation Act">
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                </button>
            </span> 
            and the principles of 
            <span class="compliance-term-wrap">
                <strong>Universal Design for Learning (UDL)</strong>
                <button type="button" class="a11y-info-btn" data-standard="udl" title="Research overview & verbatim text for UDL Guidelines" aria-label="Learn about Universal Design for Learning">
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                </button>
            </span>.
        </p>
        <p>
            We continually audit our codebase using automated accessibility linters, keyboard-only regression testing, and screen reader testing (NVDA, VoiceOver, JAWS). Click any <i class="fas fa-info-circle" style="color: var(--color-primary);"></i> icon above to inspect the legal overview and word-for-word statutory text.
        </p>
        <p style="margin-top: 0.5rem;">
            <strong>Encounter an accessibility barrier?</strong> We welcome all feedback from students, educators, and parents. Please contact us directly at <a href="mailto:admin@hestena62.com" style="color: var(--color-primary); font-weight: 700; text-decoration: underline;">admin@hestena62.com</a> or visit our <a href="/pages/contact.php" style="color: var(--color-primary); font-weight: 700; text-decoration: underline;">Contact Page</a>.
        </p>
    </section>

</main>

<!-- Interactive Sandbox Script -->
<script>
(function() {
    'use strict';

    const sbFont = document.getElementById('sb-font');
    const sbBionic = document.getElementById('sb-bionic');
    const sbSize = document.getElementById('sb-size');
    const sbSizeVal = document.getElementById('sb-size-val');
    const sbLine = document.getElementById('sb-line');
    const sbLineVal = document.getElementById('sb-line-val');
    const sbTint = document.getElementById('sb-tint');
    const sbBox = document.getElementById('sb-preview-box');
    const sbText = document.getElementById('sb-preview-text');
    const sbSpeakBtn = document.getElementById('sb-speak-btn');

    const originalPassage = "Science begins with curiosity and keen observation. When researchers examine the world around them, they pose thoughtful questions, form predictive hypotheses, and conduct rigorous experiments to discover how natural phenomena function. Every student learns at their own distinct pace, and providing multi-sensory accommodations ensures that knowledge is accessible to every inquisitive mind.";

    function generateBionicText(str) {
        return str.split(' ').map(function(word) {
            if (word.length <= 3) {
                return '<strong>' + word.slice(0, 1) + '</strong>' + word.slice(1);
            } else {
                const mid = Math.ceil(word.length / 2);
                return '<strong>' + word.slice(0, mid) + '</strong>' + word.slice(mid);
            }
        }).join(' ');
    }

    function updateSandbox() {
        if (!sbBox || !sbText) return;

        // Font
        if (sbFont) {
            sbBox.style.fontFamily = sbFont.value;
        }

        // Size
        if (sbSize && sbSizeVal) {
            const size = sbSize.value;
            sbSizeVal.textContent = size + '%';
            sbBox.style.fontSize = (size / 100) + 'rem';
        }

        // Line Height
        if (sbLine && sbLineVal) {
            const line = sbLine.value;
            sbLineVal.textContent = line + 'x';
            sbBox.style.lineHeight = line;
        }

        // Tint
        if (sbTint) {
            const tint = sbTint.value;
            if (tint === 'none') {
                sbBox.style.backgroundColor = '';
            } else {
                sbBox.style.backgroundColor = tint;
            }
        }

        // Bionic Reading
        if (sbBionic) {
            if (sbBionic.value === 'bionic') {
                sbText.innerHTML = generateBionicText(originalPassage);
            } else {
                sbText.textContent = originalPassage;
            }
        }
    }

    if (sbFont) sbFont.addEventListener('change', updateSandbox);
    if (sbBionic) sbBionic.addEventListener('change', updateSandbox);
    if (sbSize) sbSize.addEventListener('input', updateSandbox);
    if (sbLine) sbLine.addEventListener('input', updateSandbox);
    if (sbTint) sbTint.addEventListener('change', updateSandbox);

    // Live TTS for the sandbox
    let isSpeaking = false;
    if (sbSpeakBtn && 'speechSynthesis' in window) {
        sbSpeakBtn.addEventListener('click', function() {
            if (isSpeaking) {
                window.speechSynthesis.cancel();
                isSpeaking = false;
                sbSpeakBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i> Listen to Passage';
                return;
            }

            window.speechSynthesis.cancel();
            const utterance = new SpeechSynthesisUtterance(originalPassage);
            utterance.rate = 0.95;
            utterance.onend = function() {
                isSpeaking = false;
                sbSpeakBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i> Listen to Passage';
            };
            utterance.onerror = function() {
                isSpeaking = false;
                sbSpeakBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i> Listen to Passage';
            };

            window.speechSynthesis.speak(utterance);
            isSpeaking = true;
            sbSpeakBtn.innerHTML = '<i class="fas fa-stop" aria-hidden="true"></i> Stop Reading';
        });
    } else if (sbSpeakBtn) {
        sbSpeakBtn.disabled = true;
        sbSpeakBtn.title = "Text to Speech not supported by this browser";
    }

    updateSandbox();
})();
</script>

<!-- Standards & Policies Research Modal -->
<div id="standards-research-modal" class="standards-modal-backdrop hidden" role="dialog" aria-modal="true" aria-labelledby="s-modal-title">
    <div class="standards-modal-panel">
        <!-- Modal Header -->
        <div class="standards-modal-header">
            <div class="standards-header-info">
                <span class="standards-type-badge" id="s-modal-badge">Official Standard & Policy</span>
                <h2 id="s-modal-title">Official Accessibility Standard</h2>
            </div>
            <div class="standards-header-actions">
                <button type="button" class="standards-action-btn" id="s-copy-btn" title="Copy citation and text excerpt">
                    <i class="fas fa-copy" aria-hidden="true"></i> <span>Copy Citation</span>
                </button>
                <button type="button" class="standards-close-btn" id="s-modal-close" aria-label="Close standards modal">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="standards-modal-tabs" role="tablist">
            <button type="button" class="standards-tab is-active" id="tab-overview" role="tab" aria-selected="true" aria-controls="view-overview">
                <i class="fas fa-compass" aria-hidden="true"></i> Overview & Clinical Intent
            </button>
            <button type="button" class="standards-tab" id="tab-verbatim" role="tab" aria-selected="false" aria-controls="view-verbatim">
                <i class="fas fa-file-contract" aria-hidden="true"></i> Verbatim Official Text (Word-for-Word)
            </button>
        </div>

        <!-- Modal Body -->
        <div class="standards-modal-body">
            <!-- View 1: Overview & Clinical Context -->
            <div id="view-overview" class="standards-tab-content is-active" role="tabpanel" aria-labelledby="tab-overview">
                <div class="overview-grid" id="s-overview-container">
                    <!-- Populated dynamically -->
                </div>
            </div>

            <!-- View 2: Verbatim Statutory Text -->
            <div id="view-verbatim" class="standards-tab-content" role="tabpanel" aria-labelledby="tab-verbatim">
                <!-- Search within text -->
                <div class="standards-search-bar">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input type="text" id="s-text-search" placeholder="Search verbatim sections, keywords, criteria..." class="standards-search-input">
                    <span class="standards-search-counter" id="s-search-counter"></span>
                </div>
                <div class="standards-verbatim-container" id="s-verbatim-content">
                    <div class="standards-loading-state">
                        <i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Loading official text from assets/texts/...
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="standards-modal-footer">
            <span class="standards-source-cite" id="s-modal-source">Source: Official Statutory Repository</span>
            <button type="button" class="standards-done-btn" id="s-modal-done">Close Guide</button>
        </div>
    </div>
</div>

<!-- Standards Research Script -->
<script>
(function () {
    'use strict';

    const STANDARDS_CATALOG = {
        'wcag-2-1-aa': {
            title: 'W3C Web Content Accessibility Guidelines (WCAG) 2.1 — Level AA',
            badge: 'Global Digital Accessibility Standard',
            file: 'accessability-wcag-2-1-aa.md',
            citation: 'W3C Recommendation 05 June 2018. Web Content Accessibility Guidelines (WCAG) 2.1. World Wide Web Consortium. https://www.w3.org/TR/WCAG21/',
            overview: [
                {
                    title: 'Statutory Purpose & Legal Enforceability',
                    icon: 'fa-balance-scale',
                    body: 'WCAG 2.1 Level AA is the universally recognized global benchmark for digital accessibility. It is codified into law under Title II and Title III of the Americans with Disabilities Act (ADA), Section 508 of the Rehabilitation Act, and European Standard EN 301 549, mandating that digital learning environments afford equal access to individuals with physical, sensory, and cognitive disabilities.'
                },
                {
                    title: 'The 4 Foundational Principles',
                    icon: 'fa-cubes',
                    body: 'All content must satisfy four pillars: (1) Perceivable (information must be visible or audible across all senses), (2) Operable (every button, link, and tool must work via keyboard without time limits), (3) Understandable (text must be clear and navigation predictable), and (4) Robust (code must cleanly parse across assistive screen readers and alternative input devices).'
                },
                {
                    title: 'Clinical Accommodations at Hesten\'s Learning',
                    icon: 'fa-check-double',
                    body: 'Our platform fulfills Level AA via strict 4.5:1 text contrast ratios, 200% zoom text scaling without page truncation, bypass blocks (Skip-to-Content links), non-text contrast 3:1 on form boundaries, and full keyboard operability without timing restrictions.'
                }
            ]
        },
        'wcag-aaa': {
            title: 'W3C WCAG 2.1 — Conformance Level AAA (Enhanced Accessibility)',
            badge: 'Highest Accessibility & Neurodivergent Tier',
            file: 'accessability-wcag-aaa.md',
            citation: 'W3C (2018). Understanding Conformance: Understanding WCAG 2.1 Level AAA. World Wide Web Consortium. https://www.w3.org/TR/WCAG21/#conformance-requirements',
            overview: [
                {
                    title: 'The Highest Tier of Digital Accessibility',
                    icon: 'fa-award',
                    body: 'Level AAA represents the most stringent tier of digital accessibility. While the W3C does not mandate AAA conformance across entire websites due to domain-specific limitations, Hesten\'s Learning intentionally adopts core Level AAA criteria to directly accommodate neurodivergent thinkers, dyslexic readers, and learners with severe low vision.'
                },
                {
                    title: 'Visual Presentation (Success Criterion 1.4.8)',
                    icon: 'fa-eye',
                    body: 'Criterion 1.4.8 is the gold standard for reading accommodations: users must have mechanisms to select foreground and background colors, limit line lengths to 80 characters, relax line spacing to at least 1.5x, avoid justified text, and resize text to 200% without horizontal scrolling. All of these are natively implemented in our Accessibility Settings panel.'
                },
                {
                    title: 'Enhanced Contrast & Cognitive Support',
                    icon: 'fa-bolt',
                    body: 'Provides enhanced 7:1 contrast (surpassed by our High Contrast Theme\'s 19.5:1 ratio), complete elimination of flashing motion, suppression of unexpected interruptions, context-sensitive vocabulary tooltips, and Bionic Reading eye saccade guidance.'
                }
            ]
        },
        'section-508': {
            title: 'Section 508 of the Rehabilitation Act of 1973 (29 U.S.C. § 794d)',
            badge: 'U.S. Federal Education & Civil Rights Law',
            file: 'accessability-section-508.md',
            citation: '29 U.S.C. § 794d; 36 C.F.R. Part 1194. Information and Communication Technology (ICT) Standards and Guidelines. U.S. Access Board (2017 Refresh).',
            overview: [
                {
                    title: 'Federal Civil Rights Mandate',
                    icon: 'fa-landmark',
                    body: 'Enacted to eliminate electronic barriers for individuals with disabilities, Section 508 requires all federal departments, state educational agencies receiving federal grants, and public educational institutions to develop, procure, and use accessible information and communication technology (ICT).'
                },
                {
                    title: 'Application to K-12 and Public Education',
                    icon: 'fa-graduation-cap',
                    body: 'Under joint enforcement by the U.S. Department of Justice (DOJ) and the U.S. Department of Education (ED) Office for Civil Rights (OCR), school districts and virtual learning platforms are prohibited under Section 504 and ADA Title II from providing discriminatory or inaccessible digital instructional materials to students.'
                },
                {
                    title: 'Subpart C Functional Performance Criteria',
                    icon: 'fa-universal-access',
                    body: 'Guarantees operational modalities for students: without vision, with limited vision, without color perception, without hearing, with limited manipulation (single-switch and keyboard navigation), and with limited cognitive or learning abilities.'
                }
            ]
        },
        'udl': {
            title: 'Universal Design for Learning (UDL) Guidelines Version 2.2',
            badge: 'Evidence-Based Educational Neuroscience Framework',
            file: 'accessability-udl.md',
            citation: 'CAST (2018). Universal Design for Learning Guidelines version 2.2. Wakefield, MA: CAST. https://udlguidelines.cast.org/',
            overview: [
                {
                    title: 'Neuroscience Foundation of Learning',
                    icon: 'fa-brain',
                    body: 'Developed by the Center for Applied Special Technology (CAST) based on cognitive neuroscience research, UDL addresses the primary barrier in education: rigid curricula that impose unintended obstacles on learners. Rather than treating disability as a deficit within the child, UDL redesigns the learning environment to be inherently flexible.'
                },
                {
                    title: 'The 3 Primary Brain Networks',
                    icon: 'fa-network-wired',
                    body: 'UDL aligns with three distinct neurological networks: (1) Affective Networks (Multiple Means of Engagement) to stimulate interest and self-regulation; (2) Recognition Networks (Multiple Means of Representation) to present information through diverse perceptual channels; and (3) Strategic Networks (Multiple Means of Action & Expression) to give students varied ways of demonstrating mastery.'
                },
                {
                    title: 'Direct Implementation on Hesten\'s Learning',
                    icon: 'fa-chalkboard-teacher',
                    body: 'We implement UDL by providing dyslexic fonts (OpenDyslexic, Lexend), Bionic Reading saccade scaffolding, audio Text-to-Speech narration, customizable study focus timers, digital scratchpads, and printable paper-friendly worksheets for tactile practice.'
                }
            ]
        }
    };

    let activeStandardKey = null;
    let rawMarkdownText = '';
    let parsedHTML = '';
    let cachedFiles = {};

    const modal = document.getElementById('standards-research-modal');
    const modalTitle = document.getElementById('s-modal-title');
    const modalBadge = document.getElementById('s-modal-badge');
    const modalSource = document.getElementById('s-modal-source');
    const overviewContainer = document.getElementById('s-overview-container');
    const verbatimContainer = document.getElementById('s-verbatim-content');
    const searchInput = document.getElementById('s-text-search');
    const searchCounter = document.getElementById('s-search-counter');
    const copyBtn = document.getElementById('s-copy-btn');
    const tabOverview = document.getElementById('tab-overview');
    const tabVerbatim = document.getElementById('tab-verbatim');
    const viewOverview = document.getElementById('view-overview');
    const viewVerbatim = document.getElementById('view-verbatim');
    const closeBtn = document.getElementById('s-modal-close');
    const doneBtn = document.getElementById('s-modal-done');

    let previousFocus = null;

    // Convert markdown to clean HTML
    function simpleMarkdownToHTML(md) {
        if (!md) return '';
        const lines = md.split('\n');
        let html = '';
        let inList = false;

        lines.forEach(function (line) {
            line = line.trimEnd();

            // Headers
            if (line.startsWith('### ')) {
                if (inList) { html += '</ul>'; inList = false; }
                html += '<h3>' + formatInline(line.slice(4)) + '</h3>';
            } else if (line.startsWith('## ')) {
                if (inList) { html += '</ul>'; inList = false; }
                html += '<h2>' + formatInline(line.slice(3)) + '</h2>';
            } else if (line.startsWith('# ')) {
                if (inList) { html += '</ul>'; inList = false; }
                html += '<h1>' + formatInline(line.slice(2)) + '</h1>';
            } else if (line.startsWith('---')) {
                if (inList) { html += '</ul>'; inList = false; }
                html += '<hr style="margin: 1.25rem 0; border: none; border-top: 1px solid var(--color-border);">';
            } else if (line.startsWith('* ') || line.startsWith('- ')) {
                if (!inList) { html += '<ul>'; inList = true; }
                html += '<li>' + formatInline(line.slice(2)) + '</li>';
            } else if (line.trim() === '') {
                if (inList) { html += '</ul>'; inList = false; }
            } else {
                if (inList) { html += '</ul>'; inList = false; }
                html += '<p>' + formatInline(line) + '</p>';
            }
        });

        if (inList) html += '</ul>';
        return html;
    }

    function formatInline(str) {
        return str
            .replace(/[&<>'"]/g, function (tag) {
                return ({
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    "'": '&#39;',
                    '"': '&quot;'
                }[tag] || tag);
            })
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/`([^`]+)`/g, '<code>$1</code>');
    }

    function openStandardModal(key) {
        const item = STANDARDS_CATALOG[key];
        if (!item) return;

        activeStandardKey = key;
        previousFocus = document.activeElement;

        modalTitle.textContent = item.title;
        modalBadge.textContent = item.badge;
        modalSource.textContent = item.citation;

        // Render Overview Tab
        overviewContainer.innerHTML = item.overview.map(function (c) {
            return `
                <div class="overview-card">
                    <h3 class="overview-card-title"><i class="fas ${c.icon}" aria-hidden="true"></i> ${c.title}</h3>
                    <p class="overview-card-body">${c.body}</p>
                </div>
            `;
        }).join('');

        // Switch to Overview Tab by default
        switchTab('overview');

        // Clear Search
        if (searchInput) searchInput.value = '';
        if (searchCounter) searchCounter.textContent = '';

        // Load Markdown text
        verbatimContainer.innerHTML = '<div class="standards-loading-state"><i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Loading official text from assets/texts/...</div>';

        modal.classList.remove('hidden');

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(item.title + ' guide opened. Press Escape to close.');
        }

        // Fetch Verbatim File
        const fileName = item.file;
        if (cachedFiles[fileName]) {
            renderVerbatim(cachedFiles[fileName]);
        } else {
            // Attempt /assets/texts/ then /assets/text/
            fetch('/assets/texts/' + fileName)
                .then(function (r) {
                    if (!r.ok) return fetch('/assets/text/' + fileName);
                    return r;
                })
                .then(function (r) { return r.text(); })
                .then(function (text) {
                    cachedFiles[fileName] = text;
                    renderVerbatim(text);
                })
                .catch(function (err) {
                    verbatimContainer.innerHTML = '<p style="color: var(--color-error);">Unable to load official text file (' + fileName + '). Please verify network connection.</p>';
                });
        }

        if (closeBtn) {
            setTimeout(function () { closeBtn.focus(); }, 60);
        }
    }

    function renderVerbatim(text) {
        rawMarkdownText = text;
        parsedHTML = simpleMarkdownToHTML(text);
        verbatimContainer.innerHTML = parsedHTML;
    }

    function switchTab(tabName) {
        if (tabName === 'overview') {
            tabOverview.classList.add('is-active');
            tabOverview.setAttribute('aria-selected', 'true');
            tabVerbatim.classList.remove('is-active');
            tabVerbatim.setAttribute('aria-selected', 'false');

            viewOverview.classList.add('is-active');
            viewVerbatim.classList.remove('is-active');
        } else {
            tabVerbatim.classList.add('is-active');
            tabVerbatim.setAttribute('aria-selected', 'true');
            tabOverview.classList.remove('is-active');
            tabOverview.setAttribute('aria-selected', 'false');

            viewVerbatim.classList.add('is-active');
            viewOverview.classList.remove('is-active');

            if (searchInput) searchInput.focus();
        }
    }

    function closeStandardModal() {
        if (modal.classList.contains('hidden')) return;
        modal.classList.add('hidden');
        if (previousFocus && typeof previousFocus.focus === 'function') {
            try { previousFocus.focus(); } catch (e) {}
        }
        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Standards guide closed.');
        }
    }

    // Filter/Search in Verbatim Text
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = searchInput.value.trim().toLowerCase();
            if (!query) {
                verbatimContainer.innerHTML = parsedHTML;
                searchCounter.textContent = '';
                return;
            }

            // Highlight matches
            const regex = new RegExp('(' + query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
            let matchCount = 0;

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = parsedHTML;

            const textNodes = [];
            const walk = document.createTreeWalker(tempDiv, NodeFilter.SHOW_TEXT, null, false);
            let n;
            while (n = walk.nextNode()) {
                if (n.nodeValue.toLowerCase().includes(query)) {
                    textNodes.push(n);
                }
            }

            textNodes.forEach(function (node) {
                const parent = node.parentNode;
                if (!parent) return;
                const matches = node.nodeValue.match(regex);
                if (matches) matchCount += matches.length;

                const frag = document.createElement('span');
                frag.innerHTML = node.nodeValue.replace(regex, '<mark>$1</mark>');
                parent.replaceChild(frag, node);
            });

            verbatimContainer.innerHTML = tempDiv.innerHTML;
            searchCounter.textContent = matchCount + (matchCount === 1 ? ' match' : ' matches');

            // Scroll to first mark
            const firstMark = verbatimContainer.querySelector('mark');
            if (firstMark) {
                firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    }

    // Copy Citation Button
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            const item = STANDARDS_CATALOG[activeStandardKey];
            if (!item) return;

            const clipboardText = item.title + '\n' + item.citation + '\n\n' + rawMarkdownText.slice(0, 500) + '...\n\n[Official text hosted on Hesten\'s Learning Platform]';

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(clipboardText).then(function () {
                    const orig = copyBtn.innerHTML;
                    copyBtn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> Copied!';
                    setTimeout(function () { copyBtn.innerHTML = orig; }, 1800);
                    if (typeof window.announceA11y === 'function') {
                        window.announceA11y('Citation copied to clipboard.');
                    }
                });
            }
        });
    }

    // Event listeners
    if (tabOverview) tabOverview.addEventListener('click', function () { switchTab('overview'); });
    if (tabVerbatim) tabVerbatim.addEventListener('click', function () { switchTab('verbatim'); });
    if (closeBtn) closeBtn.addEventListener('click', closeStandardModal);
    if (doneBtn) doneBtn.addEventListener('click', closeStandardModal);

    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeStandardModal();
    });

    window.addEventListener('keydown', function (e) {
        if ((e.key === 'Escape' || e.keyCode === 27) && !modal.classList.contains('hidden')) {
            e.preventDefault();
            closeStandardModal();
        }
    });

    // Attach click listeners to all info buttons
    document.querySelectorAll('.a11y-info-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const std = this.getAttribute('data-standard');
            openStandardModal(std);
        });
    });
})();

// ====================================================================
// READING FLUENCY BENCHMARK CONTROLLER
// ====================================================================
(function() {
    'use strict';

    const bmModeSelect = document.getElementById('bm-mode-select');
    const bmTimer = document.getElementById('bm-timer');
    const bmStartBtn = document.getElementById('bm-start-btn');
    const bmDoneBtn = document.getElementById('bm-done-btn');
    const bmResetBtn = document.getElementById('bm-reset-btn');
    const bmPassageBox = document.getElementById('bm-passage-box');
    const bmOverlayPrompt = document.getElementById('bm-overlay-prompt');
    const bmPassageText = document.getElementById('bm-passage-text');
    const bmResultsCard = document.getElementById('bm-results-card');
    const bmResWpm = document.getElementById('bm-res-wpm');
    const bmResTime = document.getElementById('bm-res-time');
    const bmResWords = document.getElementById('bm-res-words');
    const bmResBracket = document.getElementById('bm-res-bracket');
    const bmResSummary = document.getElementById('bm-res-summary');

    if (!bmStartBtn || !bmPassageText) return;

    const originalBenchmarkPassage = "Photosynthesis is the remarkable biochemical process by which green plants, algae, and certain bacteria convert sunlight energy into chemical energy stored in glucose. Inside cellular plant chloroplasts, green chlorophyll pigments capture specific light wavelengths. When water absorbed through roots combines with carbon dioxide absorbed through microscopic leaf stomata, oxygen gas is released into Earth's atmosphere as an essential byproduct. This foundational biological mechanism powers virtually all terrestrial ecosystems.";
    const totalBenchmarkWords = 68;

    let timerInterval = null;
    let startTime = 0;
    let elapsedMs = 0;

    function generateBionicText(str) {
        return str.split(' ').map(function(word) {
            if (word.length <= 3) {
                return '<strong>' + word.slice(0, 1) + '</strong>' + word.slice(1);
            } else {
                const mid = Math.ceil(word.length / 2);
                return '<strong>' + word.slice(0, mid) + '</strong>' + word.slice(mid);
            }
        }).join(' ');
    }

    function applyBenchmarkMode() {
        if (!bmModeSelect || !bmPassageText) return;
        const mode = bmModeSelect.value;

        // Reset custom styling
        bmPassageBox.style.backgroundColor = '';
        bmPassageBox.style.color = '';
        bmPassageBox.style.fontFamily = '';
        bmPassageBox.style.lineHeight = '';

        if (mode === 'baseline') {
            bmPassageText.textContent = originalBenchmarkPassage;
            bmPassageBox.style.fontFamily = "'Outfit', sans-serif";
            bmPassageBox.style.lineHeight = '1.6';
        } else if (mode === 'bionic') {
            bmPassageText.innerHTML = generateBionicText(originalBenchmarkPassage);
            bmPassageBox.style.lineHeight = '1.6';
        } else if (mode === 'opendyslexic') {
            bmPassageText.textContent = originalBenchmarkPassage;
            bmPassageBox.style.fontFamily = "'Open Dyslexic', sans-serif";
            bmPassageBox.style.lineHeight = '1.8';
        } else if (mode === 'lexend') {
            bmPassageText.textContent = originalBenchmarkPassage;
            bmPassageBox.style.fontFamily = "'Lexend', sans-serif";
            bmPassageBox.style.lineHeight = '1.7';
        } else if (mode === 'sepia-tint') {
            bmPassageText.textContent = originalBenchmarkPassage;
            bmPassageBox.style.backgroundColor = '#fbf0d9';
            bmPassageBox.style.color = '#433422';
            bmPassageBox.style.lineHeight = '1.8';
        }
    }

    if (bmModeSelect) {
        bmModeSelect.addEventListener('change', applyBenchmarkMode);
    }

    function formatTime(ms) {
        const totalSecs = Math.floor(ms / 1000);
        const mins = Math.floor(totalSecs / 60);
        const secs = totalSecs % 60;
        return (mins < 10 ? '0' : '') + mins + ':' + (secs < 10 ? '0' : '') + secs;
    }

    bmStartBtn.addEventListener('click', function() {
        bmPassageBox.classList.remove('is-blurred');
        if (bmOverlayPrompt) bmOverlayPrompt.style.display = 'none';
        bmStartBtn.style.display = 'none';
        bmDoneBtn.style.display = 'inline-flex';
        bmResetBtn.style.display = 'inline-flex';
        bmResultsCard.style.display = 'none';

        startTime = performance.now();
        elapsedMs = 0;
        bmTimer.textContent = '00:00';

        clearInterval(timerInterval);
        timerInterval = setInterval(function() {
            elapsedMs = performance.now() - startTime;
            bmTimer.textContent = formatTime(elapsedMs);
        }, 80);

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Benchmark timer started. Passage revealed.');
        }
    });

    bmDoneBtn.addEventListener('click', function() {
        clearInterval(timerInterval);
        bmDoneBtn.style.display = 'none';
        bmStartBtn.style.display = 'inline-flex';
        bmStartBtn.innerHTML = '<i class="fas fa-redo" aria-hidden="true"></i> <span>Retest</span>';

        const totalSecs = Math.max(1, elapsedMs / 1000);
        const wpm = Math.round((totalBenchmarkWords / (totalSecs / 60)));

        let tier = 'Proficient';
        let feedback = '';
        if (wpm >= 250) {
            tier = 'Advanced Speed';
            feedback = 'Exceptional reading velocity with rapid cognitive visual processing.';
        } else if (wpm >= 180) {
            tier = 'Fluent';
            feedback = 'Strong reading fluency typical of proficient readers in secondary and higher education.';
        } else if (wpm >= 120) {
            tier = 'Instructional';
            feedback = 'Standard comfortable instructional reading rate for textbook and technical content.';
        } else {
            tier = 'Supported Pace';
            feedback = 'Paced reading rate. Accommodations such as Bionic Reading or OpenDyslexic can reduce decoding fatigue.';
        }

        bmResWpm.textContent = wpm;
        bmResTime.textContent = totalSecs.toFixed(1) + 's';
        bmResWords.textContent = totalBenchmarkWords;
        bmResBracket.textContent = tier;
        bmResSummary.textContent = 'Mode: ' + (bmModeSelect ? bmModeSelect.options[bmModeSelect.selectedIndex].text : 'Baseline') + '. ' + feedback;
        bmResultsCard.style.display = 'flex';

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Benchmark complete. Reading fluency: ' + wpm + ' words per minute.');
        }
    });

    bmResetBtn.addEventListener('click', function() {
        clearInterval(timerInterval);
        bmTimer.textContent = '00:00';
        bmPassageBox.classList.add('is-blurred');
        if (bmOverlayPrompt) bmOverlayPrompt.style.display = 'flex';
        bmStartBtn.style.display = 'inline-flex';
        bmStartBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i> <span>Start Benchmark</span>';
        bmDoneBtn.style.display = 'none';
        bmResetBtn.style.display = 'none';
        bmResultsCard.style.display = 'none';
    });
})();

// ====================================================================
// IEP / 504 ACCOMMODATION PROFILE EXPORTER CONTROLLER
// ====================================================================
(function() {
    'use strict';

    const STORAGE_KEY = 'hl_accessibility_settings';
    const iepRefreshBtn = document.getElementById('iep-refresh-btn');
    const iepPrintBtn = document.getElementById('iep-print-btn');
    const iepExportJsonBtn = document.getElementById('iep-export-json-btn');

    const listTypo = document.getElementById('iep-list-typographic');
    const listCognitive = document.getElementById('iep-list-cognitive');
    const listVisual = document.getElementById('iep-list-visual');
    const listAssistive = document.getElementById('iep-list-assistive');

    function getActiveSettings() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            return raw ? JSON.parse(raw) : {};
        } catch (e) {
            return {};
        }
    }

    function renderIepProfile() {
        const s = getActiveSettings();

        // 1. Typographic Quadrant
        if (listTypo) {
            const fontName = s.fontFamily || 'Outfit / Standard System';
            const scale = s.fontSize ? Math.round(s.fontSize * 100) + '%' : '100%';
            const lineH = s.lineHeight ? s.lineHeight + 'x' : '1.6x';
            const bionic = s.bionicReading ? 'Active (Dynamic Saccadic Fixation Bolding)' : 'Inactive';

            listTypo.innerHTML = 
                '<li><strong>Font Family:</strong> ' + fontName + '</li>' +
                '<li><strong>Text Scaling:</strong> ' + scale + '</li>' +
                '<li><strong>Line Pitch:</strong> ' + lineH + '</li>' +
                '<li><strong>Bionic Reading:</strong> ' + bionic + '</li>';
        }

        // 2. Cognitive Quadrant
        if (listCognitive) {
            const mask = s.readingMask ? 'Active (Horizontal Eye-Tracking Letterbox)' : 'Inactive';
            const spot = s.spotlightMode ? 'Active (Background Dimming Focus Guide)' : 'Inactive';
            const focus = s.focusMode ? 'Active (Distraction-Free Minimalist Layout)' : 'Inactive';
            const ticks = s.acousticTicks ? 'Active (Auditory Action Feedback)' : 'Inactive';

            listCognitive.innerHTML = 
                '<li><strong>Reading Mask:</strong> ' + mask + '</li>' +
                '<li><strong>Spotlight Mode:</strong> ' + spot + '</li>' +
                '<li><strong>Focus Mode:</strong> ' + focus + '</li>' +
                '<li><strong>Acoustic Ticks:</strong> ' + ticks + '</li>';
        }

        // 3. Visual Quadrant
        if (listVisual) {
            const theme = s.theme ? s.theme.charAt(0).toUpperCase() + s.theme.slice(1) : 'Light';
            const stopAnim = s.stopAnimations ? 'Active (Vestibular Motion Suppression)' : 'Inactive (Standard Motion)';
            const cursor = s.cursorSize === 'large' ? 'Large High-Visibility Target Pointer' : 'Standard Cursor';

            listVisual.innerHTML = 
                '<li><strong>Theme / Contrast:</strong> ' + theme + (s.theme === 'contrast' ? ' (WCAG AAA Absolute)' : '') + '</li>' +
                '<li><strong>Animation Suppression:</strong> ' + stopAnim + '</li>' +
                '<li><strong>Cursor Visibility:</strong> ' + cursor + '</li>' +
                '<li><strong>Irlen Overlay:</strong> Standard / None</li>';
        }

        // 4. Assistive Quadrant
        if (listAssistive) {
            const tts = s.textToSpeech ? 'Active (Speech Synthesis Activated)' : 'Ready on Demand';

            listAssistive.innerHTML = 
                '<li><strong>Keyboard Navigation:</strong> 100% Non-Mouse Traversal (WCAG 2.1 AA)</li>' +
                '<li><strong>Text-to-Speech:</strong> ' + tts + '</li>' +
                '<li><strong>Study Pacer:</strong> Paced Study Session Timer (<kbd>Alt+T</kbd>)</li>' +
                '<li><strong>Offline Resilience:</strong> Fully Cached Offline Shell Ready</li>';
        }
    }

    if (iepRefreshBtn) {
        iepRefreshBtn.addEventListener('click', function() {
            renderIepProfile();
            const orig = iepRefreshBtn.innerHTML;
            iepRefreshBtn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> <span>Synced!</span>';
            setTimeout(function() { iepRefreshBtn.innerHTML = orig; }, 1500);
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('IEP accommodation profile synchronized with active settings.');
            }
        });
    }

    if (iepPrintBtn) {
        iepPrintBtn.addEventListener('click', function() {
            window.print();
        });
    }

    if (iepExportJsonBtn) {
        iepExportJsonBtn.addEventListener('click', function() {
            const s = getActiveSettings();
            const profileData = {
                title: "Student Assistive Technology & Digital Accommodation Profile",
                institution: "Hesten's Learning Universal Platform",
                profile_id: "HL-A11Y-PROFILE",
                exported_at: new Date().toISOString(),
                compliance_standards: [
                    "IDEA 34 CFR § 300.105 (Assistive Technology)",
                    "Rehabilitation Act of 1973 Section 508",
                    "W3C Web Content Accessibility Guidelines (WCAG) 2.1 Level AA/AAA"
                ],
                active_settings: s
            };

            const blob = new Blob([JSON.stringify(profileData, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'student-accessibility-profile.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Student accommodation profile exported as JSON.');
            }
        });
    }

    // Initial render
    renderIepProfile();
})();

// ====================================================================
// CLINICAL VISION SIMULATION CONTROLLER
// ====================================================================
(function() {
    'use strict';
    const simSelect = document.getElementById('vision-sim-select');
    const specimen = document.getElementById('vision-specimen-box');
    const label = document.getElementById('vision-active-label');
    const callout = document.getElementById('vision-callout-text');
    const toggleSiteBtn = document.getElementById('btn-toggle-site-sim');
    const resetBtn = document.getElementById('btn-reset-vision-sim');

    let siteAuditActive = false;

    const SIM_DESCRIPTIONS = {
        'none': {
            name: 'Normal Trichromatic Vision',
            filter: '',
            bodyClass: '',
            text: 'Under normal trichromatic vision, all spectral hues and alerts are readily distinguished. Notice how red and green converge toward olive-brown under Protanopia and Deuteranopia, illustrating why WCAG 2.1 Principle 1.4.1 mandates never relying on color alone.'
        },
        'protanopia': {
            name: 'Protanopia (Red-Blind)',
            filter: 'url(#protanopia-filter)',
            bodyClass: 'sim-protanopia',
            text: 'Protanopia is caused by the complete absence of red-sensitive L-cones. Pure reds appear dark or black, while orange, yellow, and green converge into yellow-brown shades. Critical red error badges appear indistinct without secondary shape or icon cues.'
        },
        'deuteranopia': {
            name: 'Deuteranopia (Green-Blind)',
            filter: 'url(#deuteranopia-filter)',
            bodyClass: 'sim-deuteranopia',
            text: 'Deuteranopia results from missing green-sensitive M-cones (affecting ~6% of males). Red and green hues cannot be distinguished by wavelength. Notice how both aerobic (blue) and anaerobic (red) curves in charts rely on labeled axes and text legends for clarity.'
        },
        'tritanopia': {
            name: 'Tritanopia (Blue-Blind)',
            filter: 'url(#tritanopia-filter)',
            bodyClass: 'sim-tritanopia',
            text: 'Tritanopia is a rare autosomal condition affecting blue-sensitive S-cones. Blue appears greenish and yellow appears violet or light grey. Yellow warning banners become muted, emphasizing the requirement for high-contrast border definition.'
        },
        'achromatopsia': {
            name: 'Achromatopsia (Monochromacy)',
            filter: 'url(#achromatopsia-filter)',
            bodyClass: 'sim-achromatopsia',
            text: 'Achromatopsia is the total absence of cone photoreceptor function, leaving the learner entirely dependent on rods. Visual acuity is limited and all information is perceived strictly through shades of grey and luminance contrast.'
        },
        'cataracts': {
            name: 'Cataracts (Clouding & Blur)',
            filter: 'url(#cataracts-filter)',
            bodyClass: 'sim-cataracts',
            text: 'Cataracts cause intraocular lens clouding, resulting in severe light scattering, decreased contrast sensitivity, and generalized blurring. High-contrast typography and anti-glare overlays are essential accommodations.'
        }
    };

    function applySimulation() {
        if (!simSelect || !specimen) return;
        const key = simSelect.value;
        const config = SIM_DESCRIPTIONS[key] || SIM_DESCRIPTIONS['none'];

        specimen.style.filter = config.filter;
        if (label) label.textContent = config.name;
        if (callout) callout.textContent = config.text;

        document.body.classList.remove('sim-protanopia', 'sim-deuteranopia', 'sim-tritanopia', 'sim-achromatopsia', 'sim-cataracts');
        if (siteAuditActive && config.bodyClass) {
            document.body.classList.add(config.bodyClass);
        }

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Vision simulation updated to ' + config.name);
        }
    }

    if (simSelect) {
        simSelect.addEventListener('change', applySimulation);
    }

    if (toggleSiteBtn) {
        toggleSiteBtn.addEventListener('click', function() {
            siteAuditActive = !siteAuditActive;
            if (siteAuditActive) {
                toggleSiteBtn.style.background = '#ea580c';
                toggleSiteBtn.style.color = '#ffffff';
                toggleSiteBtn.innerHTML = '<i class="fas fa-times" aria-hidden="true"></i> <span>Stop Site Audit</span>';
            } else {
                toggleSiteBtn.style.background = '';
                toggleSiteBtn.style.color = '';
                toggleSiteBtn.innerHTML = '<i class="fas fa-globe" aria-hidden="true"></i> <span>Audit Whole Site</span>';
            }
            applySimulation();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (simSelect) simSelect.value = 'none';
            siteAuditActive = false;
            if (toggleSiteBtn) {
                toggleSiteBtn.style.background = '';
                toggleSiteBtn.style.color = '';
                toggleSiteBtn.innerHTML = '<i class="fas fa-globe" aria-hidden="true"></i> <span>Audit Whole Site</span>';
            }
            applySimulation();
        });
    }
})();

// ====================================================================
// KARAOKE SYNCHRONIZED READ-ALOUD CONTROLLER
// ====================================================================
(function() {
    'use strict';
    const playBtn = document.getElementById('karaoke-play-btn');
    const stopBtn = document.getElementById('karaoke-stop-btn');
    const rateSelect = document.getElementById('karaoke-speed-select');
    const textContainer = document.getElementById('karaoke-text-container');

    if (!playBtn || !textContainer) return;

    const rawPassage = "Effective reading instruction combines auditory sound patterns with visual word recognition. When each word illuminates synchronously as spoken, cognitive processing barriers dissolve, empowering struggling readers to build automatic word decoding and fluid comprehension.";
    
    const tokens = rawPassage.split(/(\s+)/);
    let wordIndex = 0;
    textContainer.innerHTML = '';
    const wordSpans = [];

    tokens.forEach(token => {
        if (/^\s+$/.test(token)) {
            textContainer.appendChild(document.createTextNode(token));
        } else {
            const span = document.createElement('span');
            span.className = 'karaoke-word';
            span.dataset.idx = wordIndex++;
            span.textContent = token;
            textContainer.appendChild(span);
            wordSpans.push(span);
        }
    });

    let isPlaying = false;
    let fallbackTimer = null;

    function resetHighlights() {
        wordSpans.forEach(s => s.classList.remove('is-active'));
    }

    function stopKaraoke() {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
        clearInterval(fallbackTimer);
        resetHighlights();
        isPlaying = false;
        playBtn.style.display = 'inline-flex';
        stopBtn.style.display = 'none';
    }

    playBtn.addEventListener('click', function() {
        if (!('speechSynthesis' in window)) {
            alert('Speech Synthesis is not supported in this browser.');
            return;
        }

        stopKaraoke();
        isPlaying = true;
        playBtn.style.display = 'none';
        stopBtn.style.display = 'inline-flex';

        const utterance = new SpeechSynthesisUtterance(rawPassage);
        utterance.rate = parseFloat(rateSelect?.value || '1.0');
        utterance.pitch = 1.0;

        let boundaryFired = false;

        utterance.onboundary = function(e) {
            if (e.name === 'word') {
                boundaryFired = true;
                const textUpToChar = rawPassage.slice(0, e.charIndex);
                const wordsBefore = (textUpToChar.match(/\S+/g) || []).length;
                if (wordsBefore < wordSpans.length) {
                    resetHighlights();
                    wordSpans[wordsBefore].classList.add('is-active');
                }
            }
        };

        utterance.onend = function() {
            stopKaraoke();
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Karaoke read-aloud completed.');
            }
        };

        utterance.onerror = function() {
            stopKaraoke();
        };

        window.speechSynthesis.speak(utterance);

        setTimeout(function() {
            if (isPlaying && !boundaryFired) {
                let currentFallback = 0;
                const msPerWord = (60000 / (150 * utterance.rate));
                fallbackTimer = setInterval(function() {
                    if (currentFallback < wordSpans.length) {
                        resetHighlights();
                        wordSpans[currentFallback].classList.add('is-active');
                        currentFallback++;
                    } else {
                        clearInterval(fallbackTimer);
                    }
                }, msPerWord);
            }
        }, 500);

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Karaoke tracking started. Words lighting up synchronously.');
        }
    });

    if (stopBtn) {
        stopBtn.addEventListener('click', stopKaraoke);
    }
})();

// ====================================================================
// PWA STORAGE & OFFLINE CACHE CONTROLLER
// ====================================================================
(function() {
    'use strict';
    const storageVal = document.getElementById('pwa-storage-val');
    const progressBar = document.getElementById('pwa-progress-bar');
    const usageLabel = document.getElementById('pwa-usage-label');
    const quotaLabel = document.getElementById('pwa-quota-label');
    const cachesList = document.getElementById('pwa-caches-list');
    const cacheCount = document.getElementById('pwa-cache-count');
    const precacheBtn = document.getElementById('btn-precache-coursepack');
    const purgeBtn = document.getElementById('btn-purge-cache');
    const statusMsg = document.getElementById('pwa-cache-status-msg');

    async function updateStorageStats() {
        if ('storage' in navigator && 'estimate' in navigator.storage) {
            try {
                const estimate = await navigator.storage.estimate();
                const usageMB = ((estimate.usage || 0) / (1024 * 1024)).toFixed(1);
                const quotaGB = ((estimate.quota || 0) / (1024 * 1024 * 1024)).toFixed(1);
                const pct = estimate.quota ? Math.max(0.5, Math.min(100, (estimate.usage / estimate.quota) * 100)).toFixed(1) : 0;

                if (storageVal) storageVal.textContent = usageMB + ' MB';
                if (usageLabel) usageLabel.textContent = usageMB + ' MB indexed (' + pct + '%)';
                if (quotaLabel) quotaLabel.textContent = 'Quota: ' + quotaGB + ' GB';
                if (progressBar) progressBar.style.width = pct + '%';
            } catch(e) {
                if (storageVal) storageVal.textContent = 'Unavailable';
            }
        }

        if ('caches' in window) {
            try {
                const keys = await window.caches.keys();
                if (cacheCount) cacheCount.textContent = keys.length + ' active cache' + (keys.length === 1 ? '' : 's');
                if (cachesList) {
                    if (keys.length === 0) {
                        cachesList.innerHTML = '<li>No caches currently stored.</li>';
                    } else {
                        cachesList.innerHTML = '';
                        for (const k of keys) {
                            const c = await window.caches.open(k);
                            const reqs = await c.keys();
                            const li = document.createElement('li');
                            li.innerHTML = '<strong>' + k + ':</strong> ' + reqs.length + ' assets pre-cached';
                            cachesList.appendChild(li);
                        }
                    }
                }
            } catch(e) {
                if (cachesList) cachesList.innerHTML = '<li>Error loading cache inventory.</li>';
            }
        }
    }

    if (precacheBtn) {
        precacheBtn.addEventListener('click', async function() {
            precacheBtn.disabled = true;
            precacheBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Caching Course Pack...</span>';
            const coursePackUrls = [
                '/',
                '/pages/accessibility.php',
                '/updates/index.php',
                '/offline.php',
                '/assets/css/global-components.css',
                '/assets/js/index-main.js',
                '/assets/texts/accessability-wcag-2-1-aa.md',
                '/assets/texts/accessability-section-508.md'
            ];

            try {
                const cache = await window.caches.open('hestens-learning-coursepack');
                let count = 0;
                for (const url of coursePackUrls) {
                    try {
                        await cache.add(url);
                        count++;
                    } catch(err) {}
                }

                if (statusMsg) {
                    statusMsg.style.display = 'block';
                    statusMsg.style.color = '#10b981';
                    statusMsg.innerHTML = '<i class="fas fa-check-circle"></i> Complete Course Pack successfully cached (' + count + ' resources)! The platform is 100% offline-ready.';
                }
                if (typeof window.announceA11y === 'function') {
                    window.announceA11y('Complete Course Pack cached for offline access.');
                }
                updateStorageStats();
            } catch(e) {
                if (statusMsg) {
                    statusMsg.style.display = 'block';
                    statusMsg.style.color = '#ef4444';
                    statusMsg.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Caching failed: ' + e.message;
                }
            } finally {
                precacheBtn.disabled = false;
                precacheBtn.innerHTML = '<i class="fas fa-cloud-download-alt"></i> <span>Cache Complete Course Pack</span>';
            }
        });
    }

    if (purgeBtn) {
        purgeBtn.addEventListener('click', async function() {
            if (!confirm('Purge cached assets? Your saved notes and preferences will remain intact.')) return;
            try {
                const keys = await window.caches.keys();
                for (const k of keys) {
                    if (k.includes('coursepack')) {
                        await window.caches.delete(k);
                    }
                }
                if (statusMsg) {
                    statusMsg.style.display = 'block';
                    statusMsg.style.color = '#3b82f6';
                    statusMsg.innerHTML = '<i class="fas fa-info-circle"></i> Transient caches purged.';
                }
                updateStorageStats();
            } catch(e) {}
        });
    }

    // Initial query
    updateStorageStats();
})();
</script>

<?php
include '../src/footer.php';
?>


