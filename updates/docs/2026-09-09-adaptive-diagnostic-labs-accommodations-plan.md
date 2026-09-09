---
title: "Phase 3: Adaptive Diagnostic & Remediation Engine, Multi-Sensory Labs & IEP/504 Accommodation Presets Plan"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Adaptive Assessment", "Diagnostic", "Multi-Sensory Labs", "IEP/504", "Accommodations", "Reading Ruler", "Audio Soundscapes"]
summary: "Comprehensive technical roadmap for Phase 3 introducing an Adaptive Diagnostic & Remediation Engine, Multi-Sensory Interactive Practice Labs, and IEP/504 Personalized Accommodation Presets."
author: "Antigravity & Hesten"
---

# Implementation Plan - Phase 3: Adaptive Diagnostic & Remediation Engine, Multi-Sensory Labs & IEP/504 Accommodation Presets

Phase 3 expands Hesten's Learning platform into a personalized learning and accessibility powerhouse. This phase introduces an **Adaptive Diagnostic & Remediation Engine**, **Multi-Sensory Interactive Practice Labs** (designed specifically for learners with dyslexia, dyscalculia, and ADHD), and a comprehensive **IEP/504 Accommodation Profile Suite** featuring a Reading Ruler, Bionic Reading, Tint Overlays, and Web Audio synthesized Focus Soundscapes.

---

## 1. Objectives & Architectural Overview

1. **Adaptive Diagnostic & Remediation Engine (`/assessment/diagnostic.php`)**:
   - Dynamic standard-by-standard branching that adjusts question difficulty in real time based on student confidence and accuracy.
   - Generates an actionable **Personalized Learning Prescription Roadmap** with 1-click links to lessons, practice problems, flashcards, and labs.
   - Syncs diagnostic mastery directly into the gamification profile and standards matrix.

2. **Multi-Sensory Interactive Practice Labs (`/student/interactive-labs.php`)**:
   - Hands-on visual, tactile, and auditory manipulatives:
     - **Math Fraction Strips & Base-10 Blocks**: Draggable snap-to-grid fraction bars and regrouping blocks with tactile click audio.
     - **ELA Phonics & Syllable Deconstructor**: Syllable segmenter, morpheme puzzle pieces (prefix, root, suffix), and Web Speech API phoneme vocalization.
     - **Science Motion & Energy Simulator**: Draggable pendulum and balance scale with live mass/gravity adjustments.
     - **Social Studies Chrono-Timeline**: Historical event sorting puzzle with cause-and-effect connection threads.

3. **IEP / 504 Personalized Accommodation Suite (`/pages/accommodations.php` & Modal `<kbd>Alt+O</kbd>`)**:
   - **Guided Reading Ruler (`<kbd>Alt+R</kbd>`)**: Dynamic focus strip with adjustable height and background opacity to assist ADHD and visual tracking differences.
   - **Bionic Reading Mode**: Algorithmic fixation bolding to enhance reading speed and comprehension for dyslexic readers.
   - **Color Tint Overlays (Irlen Syndrome)**: Soft peach, aqua, rose, yellow, and mint screen overlays with opacity sliders.
   - **Web Audio Focus Soundscapes**: 100% offline synthesized Pink Noise, Gentle Rain, and Ocean Surf without external audio files.
   - **Dyscalculia Math Operator Colorizer**: Visual distinction of arithmetic symbols to prevent confusion.

---

## 2. File & Component Breakdown

### New Files to Create:
- `assets/js/accessibility/accommodation-engine.js`: Core controller for reading ruler, bionic reading, color tints, and Web Audio soundscapes.
- `assets/css/components/accommodations.css`: Stylesheet for ruler, tint overlays, and accommodation modals.
- `src/partials/accommodations-modal.php`: Universal modal dialog (`Alt+O`) for quick toggles and soundscape player.
- `student/interactive-labs.php`: Multi-sensory interactive workbench page.
- `assets/js/labs/interactive-labs.js`: Canvas interactions, drag-and-drop physics, and audio feedback for labs.
- `assets/css/pages/interactive-labs.css`: Modern visual lab layout and interactive element styling.
- `assessment/diagnostic.php`: Full-screen adaptive diagnostic test suite and prescription generator.
- `assets/js/assessment/adaptive-diagnostic.js`: Adaptive branching algorithm, question bank, and prescription engine.
- `assets/css/pages/diagnostic.css`: Diagnostic UI, question cards, and prescription report card styles.

### Files to Modify:
- `src/header.php`: Include `accommodations.css` and `src/partials/accommodations-modal.php`.
- `src/footer.php`: Include `accommodation-engine.js`.
- `src/partials/fixed-tools.php`: Add Accommodation & Focus FAB button.
- `src/partials/shortcuts-modal.php`: Register `Alt+O` and `Alt+R`.
- `student/index.php`: Add launch banners for Interactive Labs and Diagnostic Assessments.
- `service-worker.js`: Precache new assets and bump cache version to `hestens-learning-v12`.

---

## 3. Verification & Testing Plan

1. **Automated Validation**:
   - `node -c` syntax check on all JS controllers.
   - HTTP status check (200 OK) on all new endpoints.
2. **Interactive Testing**:
   - Test Reading Ruler (`Alt+R`) mouse tracking and shortcut toggling.
   - Verify Web Audio soundscapes (Pink noise, Rain) play smoothly and quietly without clipping.
   - Verify Interactive Labs work with both mouse drag-and-drop and touch/keyboard controls.
   - Run adaptive diagnostic test and confirm growth prescription generation and XP awards.
