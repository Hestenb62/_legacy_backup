---
title: "Comprehensive Platform Enhancements Plan"
date: "2026-09-20"
category: "Implementation Plan"
tags: ["Math Codex", "Interactive Labs", "Transcripts", "Standards TTS", "Bionic Reader", "A11y"]
summary: "Technical implementation plan for formula sandbox in Math Codex, tactile audio in labs, homeschool transcript generator, standards read-aloud, and bionic reading in the literature reader."
author: "Antigravity & Hesten"
---

# Implementation Plan: Comprehensive Platform Enhancements Suite

Deliver a high-impact suite of educational and accessibility enhancements across the Mathematics Codex, Multi-Sensory Science Labs, Student Profile Transcripts, Standards Explorer, and Literature Reader.

---

## Proposed Changes

### 1. Mathematics Codex: Interactive Formula Sandbox & Step-by-Step Solver
Add an interactive algebraic sandbox in the Math Codex where students select formulas, input variables, and view full step-by-step mathematical derivations rendered with MathJax and sound feedback.

#### [MODIFY] [`pages/math.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/math.php)
- Add `#math-formula-sandbox` workbench component above the A–Z catalog with formula selection:
  - Pythagorean Theorem ($a^2 + b^2 = c^2$)
  - Quadratic Formula ($x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$)
  - Slope of a Line ($m = \frac{y_2 - y_1}{x_2 - x_1}$)
  - Distance Formula ($d = \sqrt{(x_2 - x_1)^2 + (y_2 - y_1)^2}$)
  - Circle Area & Circumference ($A = \pi r^2$, $C = 2\pi r$)
  - Compound Interest ($A = P(1 + r/n)^{nt}$)
- Dynamic variable input fields based on selected formula.
- Results container rendering step-by-step algebraic evaluation via MathJax SVG.

#### [MODIFY] [`assets/js/pages/math-index.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/math-index.js)
- Implement formula calculation algorithms with validation, step-by-step LaTeX generation, and `window.ensureMathJax` rendering.
- Wire `window.HLSound` audio click and success sounds into calculation triggers.

---

### 2. Multi-Sensory Interactive Labs: Tactile Audio & Keyboard Accessibility
Empower tactile learning and accessibility in the 5 multi-sensory lab workbenches.

#### [MODIFY] [`assets/js/labs/interactive-labs.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/labs/interactive-labs.js)
- Wire `window.HLSound` audio feedback into fraction strip snaps, torque balance beam adjustments, and pH chemical litmus testing.
- Add keyboard accessibility listener (`ArrowLeft`, `ArrowRight`, `Enter`, `Space`) for adjusting lab controls without a mouse.

---

### 3. Student Profile: Official Homeschool Transcript & Trophy Showcase
Provide official homeschool portfolio documentation and gamified milestone showcases.

#### [MODIFY] [`pages/profile.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/profile.php)
- Add **"Official Homeschool Transcript (PDF)"** action button in hero section.
- Add `#transcript-modal` dialogue displaying official student transcript with:
  - Cumulative GPA and grade level
  - Formative assessment standards mastery scores across Math, ELA, Science, and Social Studies
  - Total learning hours and reading logs
  - Educator / Parent signature lines
- Add dynamic **Quest Trophy Showcase** displaying earned streaks, mastery medals, and badge tiers.

#### [MODIFY] [`assets/js/profile-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/profile-main.js)
- Implement `window.generateHomeschoolTranscript()` reading `hesten_standards_mastery`, `hesten_teacher_roster`, and `hesten-user-profile`.
- Wire `window.printTranscript()` with print-optimized CSS classes.

---

## Verification Plan

### Automated & Syntax Tests
- `& "C:\xampp\php\php.exe" -l` across all modified PHP templates (`pages/math.php`, `pages/profile.php`, `pages/standards.php`, `library/read/reader_template.php`, `student/interactive-labs.php`).
- `node -c` on all modified JavaScript files (`math-index.js`, `interactive-labs.js`, `profile-main.js`, `reader-main.js`).

### Manual Verification
- Test formula sandbox with different equations and verify MathJax typesets correctly.
- Test transcript generator modal in profile and confirm standard mastery calculations populate.
- Test TTS button on standard dossier modal.
- Test Bionic reading mode in digital reader and verify words toggle cleanly.
