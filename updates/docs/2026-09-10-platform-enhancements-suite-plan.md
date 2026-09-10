---
title: "Comprehensive Platform Enhancements Suite Plan: Soundscapes, Exit Tickets, TTS, Workbenches & Diplomas"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Accessibility", "Curriculum", "Workbenches", "Text-to-Speech", "Exit Tickets", "Reporting"]
summary: "Implementation plan outlining 5 strategic platform enhancements: Brownian noise focus soundscapes, formative exit tickets in lesson_renderer, Web Speech TTS narration, bespoke interactive workbenches for lessons 4 & 5, and printable achievement certificates."
author: "Antigravity & Hesten"
---

# Comprehensive Platform Enhancements Suite: Implementation Plan

This implementation plan details the full-spectrum execution of 5 major feature sets designed to elevate pedagogy, accessibility, student engagement, and educator/parent utility across Hesten's Learning:

1. **Ambient Focus Soundscape Generator Expansion** (Brownian noise synthesis, active audio indicator, and 1-click quick toggles)
2. **Interactive Formative Exit Tickets & Mastery Checks** in `src/lesson_renderer.php`
3. **Web Speech API "Read Aloud" Narration Engine** across curriculum lessons and the Digital Library
4. **Bespoke Interactive Workbenches** for `lessons/k-math-m1-a-4.php` (Water Consumption Rate Simulator) and `lessons/k-math-m1-a-5.php` (Two Graphing Stories Animated Scrubber)
5. **Printable Achievement Certificates & IEP Report Card Suite** for students, parents, and educators

---

## 1. Architectural Principles & Key Decisions

- **Zero External Audio Dependencies**: All ambient soundscapes (Pink Noise, Brownian Noise, Gentle Rain, Ocean Surf) are 100% synthesized client-side via the browser's native Web Audio API (`AudioContext`). They require 0 external audio files, stream no data, and function completely offline.
- **Print Layouts**: The new Achievement Certificate and enhanced IEP Report Card use specialized CSS `@media print` rules formatted for 8.5" x 11" standard paper (diploma in landscape, report card in portrait) so they can be saved directly as PDF or printed for student homeschool binders and IEP portfolio meetings.
- **Mastery Data Persistence**: Exit tickets and practice checks record results into the existing `localStorage` key (`hesten_standards_mastery`), instantly reflecting on the student profile and report card without requiring a server backend.

---

## 2. Component Specifications

### 1. Ambient Focus Soundscape Generator Expansion
- **File**: `assets/js/accessibility/accommodation-engine.js`
  - Implement mathematical synthesis for **Brownian (Brown) Noise**: integrating white noise with a -6dB/octave slope for a deep, soothing rumble widely praised in ADHD executive function research.
  - Add an active soundscape status banner/pill with a 1-click stop button (`🎧 Focus: Brown Noise • [Stop]`) so students always know when background audio is running.
  - Expose `window.accommodationEngine.toggleSoundscape(type)` for direct button triggering.
- **File**: `src/partials/accommodations-modal.php`
  - Add `<option value="brown">🤎 Deep Brownian Noise (ADHD Focus)</option>` to the soundscape selection dropdown.
  - Add quick soundscape audition chips for 1-tap switching between Pink, Brown, Rain, and Ocean.

### 2. Formative Exit Tickets & Mastery Checks in Universal Lesson Renderer
- **File**: `src/lesson_renderer.php`
  - Add a new **"Exit Ticket: Formative Mastery Check"** section right below the vocabulary section for all 119 scaffolding lessons.
  - Includes 3 standard-aligned conceptual questions with accessible radio selections.
  - Features an interactive **"Submit & Check Mastery"** evaluation button:
    - Validates answers in real time with instant visual feedback (green checkmarks / amber hints).
    - Displays step-by-step MathJax worked solutions.
    - Automatically calculates student score and records it to `localStorage.getItem('hesten_standards_mastery')`.
    - Displays a celebratory mastery badge if score $\ge 80\%$.

### 3. Web Speech API "Read Aloud" Narration Engine
- **File**: `src/lesson_runner.php`
  - Add a **"Listen Aloud" (TTS)** button to the sticky lesson runner dock (`runner-dock-center`).
  - When clicked, it activates native `window.speechSynthesis` with speech rate controls (0.75x, 1.0x, 1.25x, 1.5x), speaks the lesson title, overview, student outcomes, and key vocabulary, and highlights the active text block.
  - Add Play, Pause, Resume, and Stop controls with active speaking wave animations.
- **File**: `library/read/reader_template.php`
  - Verify that `initTextToSpeech` from `assets/js/reader/read-text.js` initializes cleanly with the existing `#tts-speak-btn`, `#tts-pause-btn`, `#tts-resume-btn`, `#tts-stop-btn`, and `#tts-speed-btn` buttons in the reader controls bar.

### 4. Bespoke Interactive Workbenches for Lessons 4 & 5
- **File**: `lessons/k-math-m1-a-4.php`
  - Complete, bespoke interactive lesson for **Lesson 4: Analyzing Graphs — Water Usage During a Typical Day at School** (CCSS.MATH.CONTENT.HSF.IF.B.4, HSN.Q.A.1, HSN.Q.A.2).
  - **Interactive School Day Water Consumption Simulator**:
    - SVG coordinate plane displaying cumulative gallons consumed vs. time of day (6:00 AM – 8:00 PM).
    - Key school events plotted: Arrival (7:30 AM), Class Periods, Lunch Rush (11:45 AM – 1:00 PM), Science Labs, After-School Sports (3:30 PM), and Janitorial Shift (6:00 PM).
    - Interactive **Time Scrubber Slider**: Drag through the school day to see the animated water flow meter, instantaneous rate of change, and slope interpretation ($\text{rate} = 0$ during classes vs. steep slope during lunch).
    - Interval Average Rate of Change Calculator ($\frac{\Delta V}{\Delta t} = \frac{V(t_2) - V(t_1)}{t_2 - t_1}$).
    - Full EngageNY math curriculum content, MathJax formulas, student outcomes, and sticky runner dock.
- **File**: `lessons/k-math-m1-a-5.php`
  - Complete, bespoke interactive lesson for **Lesson 5: Two Graphing Stories** (CCSS.MATH.CONTENT.HSF.IF.B.4, HSN.Q.A.1, HSN.Q.A.2).
  - **Interactive Story Graphing Simulator**:
    - **Story 1: Elevation vs. Time** (A canyon hiker descending, resting at a vista, and climbing a steep bluff).
    - **Story 2: Speed vs. Time** (A skateboarder accelerating down a ramp, coasting on flat pavement, braking, and coming to a stop).
    - Interactive animated Canvas/SVG visualization showing character movement synchronized with coordinate graph tracking.
    - Interactive scrubbing and play/pause controls.
    - Full EngageNY math curriculum content, MathJax formulas, student outcomes, teacher insights, and sticky runner dock.

### 5. Printable Achievement Certificates & IEP Report Card Suite
- **File**: `src/partials/certificate-modal.php`
  - Accessible modal dialog rendering a high-resolution, vector Certificate of Academic Mastery.
  - Ornate gold border, official Hesten's Learning seal, customizable student name, course/standard title, completion date, verification credential ID (e.g. `HL-CERT-749201`), and dual signature lines (Educator / Proctor & Parent / Guardian).
  - Print button optimized with `@media print` rules for 8.5" x 11" landscape diploma printing.
- **File**: `assets/js/certificate-generator.js`
  - Client-side certificate generator pulling student profile name, active standard/level, and mastery metrics with PDF/print dispatch.
- **File**: `pages/profile.php`
  - Add "Claim Achievement Certificate" button in the header alongside "Official Report Card".
  - In the Official Report Card modal, add an **IEP / 504 Active Accommodations Portfolio Box** displaying the student's active visual tints, reading ruler, bionic fixations, dyscalculia colorizer, and focus soundscape preferences.
- **Files**: `pages/parents.php` & `pages/teachers.php`
  - Add 1-click launch buttons for the Official Report Card and Certificate of Mastery in their respective tools/assessment sections.
- **File**: `src/footer.php`
  - Include `src/partials/certificate-modal.php` and load `assets/js/certificate-generator.js`.

---

## 3. Verification & Testing

- PHP linting on all modified and newly created `.php` files using `C:\xampp\php\php.exe -l`.
- Full verification of Web Audio synthesis, Web Speech API voices, interactive workbenches, and diploma print preview.
