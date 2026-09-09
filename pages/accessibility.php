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
</script>

<?php
include '../src/footer.php';
?>
