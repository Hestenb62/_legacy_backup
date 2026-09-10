---
title: "Classroom Roster Report Card JSON Upload & Diagnostic Dossier Modal"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Teacher Suite", "Classroom Roster", "Report Card", "Diagnostic Modal", "Remediation"]
summary: "Enabled teachers to upload student report card JSON files, auto-populating mastery scores in the classroom roster and launching a diagnostic dossier modal with instant remediation workflows."
author: "Antigravity & Hesten"
---

# Classroom Roster Report Card JSON Upload & Diagnostic Dossier Modal

The Student Classroom Roster & Progress Tracker on `pages/teachers.php` has been upgraded to support direct **Student Report Card JSON Upload**. Teachers can import either individual student report cards or platform-wide portfolio backup exports. The platform automatically calculates subject competency across Math, ELA, Science, and Social Studies, updates or creates the student entry in the class roster, opens an interactive **Student Diagnostic Dossier Modal**, and provides one-click action paths for targeted remediation.

---

## What Was Implemented

### 1. Dual-Format Report Card JSON Parser
- In [`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js):
  - **Standalone Student Report Card Format**: Accepts JSON with `student` / `studentName`, `grade`, `mastery` percentages, granular `standards` mastery dictionary, `accommodations` list, and `notes`.
  - **Platform Backup Export Format**: Accepts full platform exports produced by `/pages/settings.php` (`meta` + `data` dictionary with `hesten-user-profile`, `hesten_student_mastery_*`, `hesten_parent_accommodations`, and `hesten_diagnostic_standards`).
  - Normalizes scores, clamps percentages between 0–100%, and extracts priority intervention standards ($<70\%$) vs. mastered standards ($\ge 80\%$).

### 2. Classroom Roster Table Auto-Population
- Integrated into Tab 5: **Class Roster & Progress Tracker**:
  - Added **"Upload Student Report Card (.json)"** toolbar button (`#btn-upload-report-card`) with hidden file reader.
  - Automatically matches existing students by name or generates new cohort entries.
  - Computes the 4-subject average and assigns status badges:
    - **Honors Proficient** ($\ge 85\%$)
    - **On Track** ($70\% - 84\%$)
    - **Targeted Support** ($< 70\%$)
  - Added a dedicated **Dossier Action Button** (`.dossier-btn` with `fa-id-card`) in every roster row, enabling educators to view any student's diagnostic profile at any time.

### 3. Student Diagnostic Dossier Modal
- In [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php) and [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css):
  - **Header Banner**: Dynamic avatar badge with student initial, student name, grade level, evaluation date, and overall competency score chip.
  - **Subject Competency Breakdown**: 4 color-coded progress bars with live percentages for Mathematics, Language Arts, Science & Labs, and Social Studies.
  - **Standards Proficiency Matrix**:
    - **Demonstrated Competencies ($\ge 80\%$)**: Green pill badges highlighting student strengths.
    - **Priority Intervention Needs ($< 70\%$)**: Crimson pill badges highlighting skill gaps requiring remediation.
  - **IEP & Neurodiversity Profile**: Displays active accommodations (e.g. *Extended Time*, *Visual Scaffolding*, *Chunked Assignments*).
  - **Educator Notes & Diagnostic Observations**: Editable notes textarea synced directly to the roster.

### 4. Direct Action Pathways ("Go From There")
- The modal features high-leverage action buttons:
  - **Generate Targeted Remediation Lesson**:
    - Scans the student's evaluated standards for the lowest-performing skill (e.g., `5.MD.C.5` or `5.NBT.B.6`).
    - Closes modal and smoothly switches to **Tab 3: Lesson Plan & Quiz Customizer**.
    - Pre-populates the Grade, Subject, and Standard dropdowns, automatically triggers syllabus generation, and scrolls to the 5-stage lesson plan (CRA / Inquiry pedagogy).
  - **Launch Diagnostic Quiz**: Opens `/assessment/index.php` targeted directly to the student's weakest standard.
  - **Save & Sync to Roster**: Persists updated educator observations to `localStorage`.
  - **Print Dossier**: Activates print layout styling (`@media print`) for printable IEP/parent-teacher conference reports.

---

## Verification & Validation Results

### 1. Automated Unit Tests
Executed `scratch/test_report_card_upload.js` via Node.js verifying:
- **Test 1**: Direct Standalone Report Card JSON parsed cleanly with correct name, grade, scores, standards, and accommodations.
- **Test 2**: Platform Portfolio Export JSON (`meta` + `data` with stringified JSON) normalized with exact fidelity.
- **Test 3**: Weakest standard detection correctly isolated `5.NBT.B.6` ($58\%$) for targeted intervention.
- **Test 4**: Subject routing mapped standards (`5.NBT.B.6` $\to$ Math, `RL.4.2` $\to$ Language Arts, `5-PS1-1` $\to$ Science) accurately.
- **Result**: All 4 tests passed with zero errors.

### 2. Syntax & Balance Validations
- `php -l pages/teachers.php`: Syntax OK, no errors detected.
- `node -c assets/js/teachers-main.js`: Syntax valid, zero parsing errors.
- `assets/css/pages/teachers.css`: 212 open braces, 212 closing braces. Clean balance.

---

## File Summary
- [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php): Added report card upload button in roster toolbar, and `#modal-student-dossier` markup.
- [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css): Added styles for `.dossier-modal-overlay`, `.dossier-subjects-grid`, `.dossier-tags-wrap`, `.dossier-tag` variants, and `@media print` rules.
- [`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js): Added `normalizeReportCard`, `processStudentReportCard`, `openStudentDossier`, `closeDossierModal`, `printStudentDossier`, dossier row buttons, and remediation workflow handlers.
