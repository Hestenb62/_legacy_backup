---
title: "Implementation Plan: Comprehensive Site-Wide & Sectional Platform Overhaul"
date: "2026-09-20"
category: "Implementation Plan"
tags: ["Platform Overhaul", "A11y", "UDL", "Reader", "Assessments", "Curriculum", "Parent Suite", "Teacher Suite"]
summary: "Strategic implementation plan to elevate Hesten's Learning platform across universal accessibility, audio feedback, digital reader vocabulary lookups, skill-level mastery tracking, adaptive assessment remediation, and parent/teacher diagnostic tools."
author: "Antigravity & Hesten"
---

# Implementation Plan: Comprehensive Site-Wide & Sectional Platform Overhaul

A strategic, multi-phased implementation plan to elevate Hesten's Learning platform across all layers—unifying universal accessibility and audio feedback, enriching the digital reader and curriculum levels, enhancing adaptive assessments and student gamification, and empowering parents and educators with diagnostic dossier exports.

## User Review Required

> [!IMPORTANT]
> **Phased Architecture**: Because this overhaul touches multiple major sections across the platform, changes are organized into four logical phases. Each phase maintains backward compatibility with existing data schemas (`hesten-user-profile`, `hesten_standards_mastery`, `hl_gamification_profile`, `hesten_parent_accommodations`, `hesten_teacher_roster`).
>
> **Universal Accessibility & UDL**: All changes adhere strictly to WCAG 2.2 AAA standards, including modal focus trapping, color contrast compliance, and full keyboard operability.

## Proposed Phases & Changes

---

### Phase 1: Site-Wide Enhancements (Systemic Improvements)

#### 1. Universal Keyboard Shortcuts Discovery & Focus Trapping
- **[MODIFY] `src/footer.php`**:
  - Add a visible, accessible keyboard shortcut indicator button (`Press '?' for Shortcuts`) in the footer bottom bar.
- **[MODIFY] `src/partials/shortcuts-modal.php`**:
  - Implement strict WAI-ARIA modal focus trapping (`Tab` / `Shift+Tab` cycle inside the active dialog).
  - Store previously focused element and return focus to it on `Esc` or close.
- **[MODIFY] `assets/js/global-core-ui.js`**:
  - Add reusable focus-trap helper `window.HLFocusTrap(modalEl, closeBtn)` used across `accommodations-modal.php`, `doc-modal.php`, and `flashcard-studio.php`.

#### 2. Universal Sound Feedback & Audio Accents
- **[MODIFY] `assets/js/audio-feedback.js`**:
  - Expose helper dispatchers for UI interactions (`HLSound.playSuccessChime()`, `HLSound.playStarPop()`, `HLSound.playMilestoneFanfare()`).
- **[MODIFY] `assets/js/index-main.js`**:
  - Trigger `HLSound.playStarPop()` on bookmark star toggle.
  - Trigger `HLSound.playSuccessChime()` on level completion toggle.
- **[MODIFY] `src/partials/learning-streak.php`**:
  - Trigger fanfare sound on achieving daily 20-minute target.

#### 3. PWA Offline Content Caching
- **[MODIFY] `service-worker.js`**:
  - Add dynamic caching route for active book chapters and level lesson files under `/lessons/` and `/library/read/`.

---

### Phase 2: Curriculum Levels & Digital Literature Reader

#### 1. Curriculum Levels & Lesson Runner
- **[MODIFY] `src/level_template.php`**:
  - **Skill-Level Mastery Checkmarks**: Populate `<span class="skill-mastery-slot"></span>` by reading `hesten_standards_mastery`. If mastery score ≥ 80%, render a green badge with score/check.
  - **Sticky Subject Navigation**: Add sticky CSS positioning for `.subject-tabs` on mobile screens so students can switch subjects while scrolling long modules.
  - **Step-by-Step Problem Scaffolding**: Add collapsible strategy hints to math skills.
- **[MODIFY] `assets/css/level-style.css`**:
  - Add responsive styles for sticky navigation and mastery badge slots.

#### 2. Digital Literature Library & Unified Reader
- **[MODIFY] `library/read/reader_template.php`**:
  - **Vocabulary Word Lookup Tooltip**: Add double-click / double-tap listener on reader text to display a lightweight definition card with phonetic pronunciation.
  - **Reading Mask Floating Toggle**: Add a 1-click Guided Reading Ruler toggle in the sticky reading bar.
  - **TTS Narration Word Highlight**: Highlight current spoken sentence during Web Speech synthesis.

---

### Phase 3: Adaptive Assessments & Gamified Student Hub

#### 1. Adaptive Assessments & Diagnostics
- **[MODIFY] `assessment/index.php`**:
  - **Remediation Practice from Missed Standards**: When assessment results display, render a **"Generate 3 Review Problems"** button reading from `hl_missed_standards`.
  - **Untimed Mode Indicator**: When untimed mode is active in accommodations, show a calming "Untimed Practice" indicator instead of a countdown clock.

#### 2. Student Hub & Gamification
- **[MODIFY] `student/skill-tree.php`**:
  - Connect skill tree nodes directly to curriculum levels (`/levels/a.php` through `/levels/o.php`).
- **[MODIFY] `student/index.php`**:
  - Add prompt to launch Honors Certificate modal when a level's core skills reach 100% completion.

---

### Phase 4: Standards Codex & Parent/Educator Suites

#### 1. Standards Explorer & Math Reference
- **[MODIFY] `pages/standards.php`**:
  - Add direct **"Practice in Grade [X]"** buttons on standard cards, linking directly to the corresponding level module.
- **[MODIFY] `pages/math.php`**:
  - Add an interactive Math formula test bench where students can type expressions and evaluate them with MathJax rendering.

#### 2. Parent & Educator Dashboards
- **[MODIFY] `pages/parents.php`**:
  - Add **"Export IEP/504 Accommodation Dossier (Printable Summary)"** in the accommodations section, creating a print-ready report of active accommodations for school meetings.
- **[MODIFY] `pages/teachers.php`**:
  - Add **"Export Class Roster (CSV)"** and **"Import Class Roster (CSV)"** buttons in the class roster tab (`tab-roster`).

---

## Verification Plan

### Automated / Syntax Verification
- Run PHP syntax checks across all modified templates:
  ```powershell
  & "C:\xampp\php\php.exe" -l src/footer.php
  & "C:\xampp\php\php.exe" -l src/level_template.php
  & "C:\xampp\php\php.exe" -l library/read/reader_template.php
  & "C:\xampp\php\php.exe" -l assessment/index.php
  & "C:\xampp\php\php.exe" -l pages/standards.php
  & "C:\xampp\php\php.exe" -l pages/parents.php
  & "C:\xampp\php\php.exe" -l pages/teachers.php
  ```
- Run Node compilation checks on all JavaScript files:
  ```powershell
  node -c assets/js/audio-feedback.js
  node -c assets/js/global-core-ui.js
  node -c assets/js/index-main.js
  ```

### Manual Verification
1. **Focus Trapping**: Open the Shortcuts modal (`?`) and verify `Tab` cycles exclusively within the modal. Press `Esc` and verify focus returns to previous element.
2. **Audio Feedback**: Bookmark a card or mark a level complete and confirm subtle earcon chime plays (and silences when muted).
3. **Level Mastery Checkmarks**: Ensure skills marked in `hesten_standards_mastery` display checkmark badges on level pages.
4. **Library Vocabulary**: Double-click a word in a book chapter and verify the definition popover appears.
5. **Parent IEP Export**: Click "Export IEP/504 Dossier" in `pages/parents.php` and verify the print dialog opens with a clean, formatted accommodation summary.
6. **Teacher CSV Roster**: Export student roster to CSV, verify columns, and test re-importing.
