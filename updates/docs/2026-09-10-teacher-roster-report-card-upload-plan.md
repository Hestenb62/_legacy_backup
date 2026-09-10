---
title: "Teacher Roster Student Report Card Upload & Diagnostic Dossier Plan"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Educators Hub", "Student Roster", "JSON Upload", "Diagnostic Dossier", "Remediation Pipeline"]
summary: "Implementation plan enabling educators to upload student report cards (JSON) in the Teachers Hub roster, automatically auto-populating competencies into an interactive Diagnostic Dossier popup with 1-click remediation lesson planning."
author: "Antigravity & Hesten"
---

# Teacher Roster Student Report Card Upload & Diagnostic Dossier Implementation Plan

## Overview
Enable educators in the **Parents & Educators Hub** (`pages/teachers.php`) to upload a student's Report Card or Portfolio (`.json`) file. The system will automatically parse and auto-populate the student's mastery scores across subjects, identify strengths and intervention areas, render a comprehensive **Student Diagnostic Dossier Popup (Modal)**, and provide immediate actionable pathways for the teacher to "go from there" (such as 1-click targeted lesson plan generation, diagnostic quiz launching, and roster synchronization).

---

## User Review Required
> [!IMPORTANT]
> - **Dual Schema Support**: The JSON upload parser will seamlessly accept **both** the platform-wide complete portfolio export (exported from `/pages/settings.php`) and standalone student report cards formatted with `{ student, grade, mastery, standards, accommodations }`.
> - **Direct Action Pathways**: From the Student Dossier popup, educators will have direct 1-click actions:
>   1. **"Generate Targeted Lesson Plan"**: Auto-switches to Tab 4 with the student's grade, subject, and weakest standard pre-selected and auto-generated.
>   2. **"Launch Diagnostic Quiz"**: Launches `/assessment/` pre-filtered to the student's intervention standard.
>   3. **"Import & Sync Roster"**: Commits student scores, grade, and notes to the live classroom roster in `localStorage`.
>   4. **"Print Diagnostic Dossier"**: Formats a clean printable report card for IEP/parent meetings.

---

## Proposed Changes

### 1. Presentation & Structure Layer
#### [MODIFY] `pages/teachers.php`
- Add an **"Upload Student Report Card (.json)"** button and hidden file input in the roster toolbar.
- Add a **"View Report Card / Dossier"** action button on every student row in the roster table.
- Add the **Student Diagnostic Dossier Modal (`#modal-student-dossier`)**:
  - Student identity banner (name, grade pill, competency gauge, evaluation date).
  - Subject Mastery Breakdown grid (Math, ELA, Science, Social Studies).
  - Targeted Standards Matrix (Mastered $\ge 80\%$ vs. Priority Intervention $< 70\%$).
  - Active Accommodations & Neurodiversity profile tags.
  - Teacher Notes & Observations field.
  - Primary Action Bar ("Generate Remediation Lesson", "Launch Diagnostic Quiz", "Save to Roster", "Print Dossier", "Close").

---

### 2. Styling & Visual Aesthetics Layer
#### [MODIFY] `assets/css/pages/teachers.css`
- Add modal container and backdrop styles (`.dossier-modal-overlay`, `.dossier-modal-container`).
- Add dossier metric cards, standards chip grids, and intervention alert styling.
- Add print media query styles for printing clean individual student dossiers.

---

### 3. Logic & Engine Layer
#### [MODIFY] `assets/js/teachers-main.js`
- Implement `initReportCardUploader()`:
  - Listens for file input changes (`.json`).
  - Implements robust parsing supporting both Portfolio JSON and Report Card JSON.
  - Calculates Math, ELA, Science, and Social Studies scores.
  - Detects weakest standard for targeted remediation.
- Implement `openStudentDossier(studentData)`:
  - Populates all modal fields, subject bars, standards tags, and accommodations.
  - Opens the modal with smooth focus management.
- Implement actionable button handlers:
  - `generateLessonForStudent(studentData)`: Transitions to Tab 4, pre-fills grade/subject/weak-standard, and triggers `generateLessonPlan()`.
  - `launchQuizForStudent(studentData)`: Opens `/assessment/#standard=[weak]&count=10` in a new window.
  - `saveStudentDossierToRoster(studentData)`: Updates or adds student to `hesten_teacher_roster` and re-renders the table.

---

## Verification Plan

### Automated & Scratch Tests
- Create `scratch/test_report_card_upload.js`:
  - Test parsing of both Full Portfolio JSON and standalone Report Card JSON.
  - Verify calculation of subject averages, overall competency %, and identification of weakest standard.
  - Verify roster updating with new student data and persistence in `localStorage`.

### Manual / Browser Verification
- Load `pages/teachers.php#roster`.
- Click "Upload Student Report Card (.json)" and select a sample JSON report card.
- Confirm popup modal appears with student name, subject bars, and standards breakdown.
- Click "Generate Targeted Lesson Plan" and verify transition to Tab 4 with pre-filled inputs.
