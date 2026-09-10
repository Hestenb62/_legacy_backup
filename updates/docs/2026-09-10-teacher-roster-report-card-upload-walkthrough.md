---
title: "Classroom Roster Report Card JSON Upload & Diagnostic Dossier Modal"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Teacher Suite", "Classroom Roster", "Report Card", "Diagnostic Modal", "Remediation", "Bugfix"]
summary: "Resolved student dossier modal display and interaction states, enabled teachers to open diagnostic dossiers by clicking student names or action buttons, and auto-populate report card JSON."
author: "Antigravity & Hesten"
---

# Classroom Roster Report Card JSON Upload & Diagnostic Dossier Modal

The Student Classroom Roster & Progress Tracker on `pages/teachers.php` supports direct **Student Report Card JSON Upload** and on-demand **Diagnostic Dossiers**. Teachers can view individual student dossiers, auto-populate live classroom metrics, and initiate remediation lesson plans or diagnostic quizzes.

---

## What Was Implemented & Fixed

### 1. Diagnostic Dossier Popup Display Resolution
- **Issue**: The modal had an inline `style="display: none;"` in `pages/teachers.php` that collided with JavaScript's `modal.classList.add('active')`, and `.dossier-modal-overlay` lacked an explicit default hidden state with an active flex state in CSS.
- **Fix**:
  - In [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css):
    - `.dossier-modal-overlay` set to `display: none;` by default.
    - Added `.dossier-modal-overlay.active { display: flex !important; animation: fadeInDossier 0.25s ease-out; }`.
    - Added `.dossier-close-btn` for top-right modal dismissal.
    - Added `.roster-student-cell.interactive-cell:hover` for hover indicator on student name cells.
  - In [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php):
    - Removed inline `style="display: none;"` from `#modal-student-dossier`.
    - Added a top-right `<button class="dossier-close-btn" onclick="window.closeDossierModal()">` in the modal header.
  - In [`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js):
    - `openStudentDossier`: Sets both `modal.style.display = 'flex'` and `modal.classList.add('active')`.
    - `closeDossierModal`: Sets both `modal.style.display = 'none'` and `modal.classList.remove('active')`.
    - Provided fallback standards and accommodations synthesis for legacy students without prior diagnostic data.
    - Updated `renderRoster()` so clicking either the student name, avatar cell, status badge, or the **Dossier** button triggers the dossier popup immediately.
    - Made `window.viewStudentDossier` robust with string identifier comparison and name fallback.

### 2. Dual-Format Report Card JSON Parser
- Standalone Report Card JSON and Platform Portfolio Export JSON (`meta` + `data`) both supported.
- Normalizes scores, clamps percentages between 0–100%, and extracts priority intervention standards ($<70\%$) vs. mastered standards ($\ge 80\%$).

### 3. Action Pathways ("Go From There")
- **Generate Targeted Remediation Lesson**: Pre-selects standard, grade, and subject in Tab 3 (Lesson Plan & Quiz Customizer) and immediately generates a 5-stage syllabus.
- **Launch Diagnostic Quiz**: Opens `/assessment/index.php` targeted directly to the student's intervention standard.
- **Save & Sync to Roster**: Persists updated educator observations to `localStorage`.
- **Print Dossier**: Activates print layout styling (`@media print`) for printable IEP/parent-teacher conference reports.

---

## Verification & Validation Results

### 1. Automated Tests
- **DOM Simulation Test** (`scratch/test_dossier_modal.js`):
  - `window.viewStudentDossier('s1')` opens `#modal-student-dossier` with `display: flex` and `active` class.
  - Student name ("Maya Chen") and Math score ("92%") populated correctly.
  - `window.closeDossierModal()` cleanly closes modal (`display: none`, removes `active`).
  - Legacy student without standards automatically synthesizes standards matrix.
  - All tests passed with zero errors.
- **Report Card Normalization Test** (`scratch/test_report_card_upload.js`): All 4 test cases passed.

### 2. Syntax & Balance Validations
- `php -l pages/teachers.php`: Syntax OK, no errors detected.
- `node -c assets/js/teachers-main.js`: Syntax valid, zero parsing errors.
- `assets/css/pages/teachers.css`: 218 open braces, 218 closing braces. Clean balance.

---

## File Summary
- [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php): Removed conflicting inline style, added header close button.
- [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css): Added `.dossier-modal-overlay.active` flex rule, `.dossier-close-btn`, and student cell interactive hover styles.
- [`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js): Enhanced `openStudentDossier`, `closeDossierModal`, `renderRoster`, and `viewStudentDossier`.
