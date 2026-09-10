---
title: "Comprehensive Platform Enhancements: Teacher Suite, Homeschool Hub & Global Palette"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Teacher Suite", "Worksheets", "Intervention Clusters", "Homeschool Hub", "Certificates", "Command Palette", "Ctrl+K"]
summary: "Detailed architecture for differentiated intervention clusters, universal printable worksheets across all grades and subjects, homeschool schedule matrix, milestone certificates, and global Ctrl+K search."
author: "Antigravity & Hesten"
---

# Comprehensive Platform Enhancements Suite Plan

This implementation plan delivers three high-value capabilities across Hesten's Learning platform:
1. **Teacher Differentiated Intervention Groups & Universal Worksheet Generator**: Auto-clustering student skill gaps from classroom roster records and generating printable 2-page student worksheets & educator rubric/answer keys across **ALL Grades (Pre-K through High School)** and **ALL Subjects (Math, Language Arts, Science, Social Studies)**.
2. **Parent Homeschool Schedule Matrix & Milestone Certificate Generator**: A subject-aligned weekly homeschool checklist tied directly into the 36-Week Pacing Guide across all grade levels and subjects, plus an official high-resolution, printable Milestone Mastery Certificate generator.
3. **Global `Ctrl+K` Spotlight Search & Command Palette**: A lightning-fast, keyboard-driven universal command palette and spotlight search modal embedded across the entire site via `src/header.php`.

---

## Proposed Changes

### Component 1: Teacher Suite — Differentiated Groups & Universal Worksheet Generator

#### [MODIFY] [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php)
- **Tab 3: Lesson Plan & Quiz Customizer**:
  - Add a dedicated **"Generate Printable Student Worksheet & Answer Key"** action button (`#btn-generate-worksheet`).
  - Add modal / printable sheet container for dual-page formatted output:
    - **Page 1: Student Practice Sheet**: Name, Date, Grade, Aligned Standard, Essential Question / Summary, Step-by-Step Guided Model, 4 Curated Independent Exercises with work grids, and Self-Reflection Rating.
    - **Page 2: Educator Answer Key & Rubric**: Detailed worked solutions, common misconception alerts, and 4-level standards-based grading rubric (Exemplary 4, Proficient 3, Developing 2, Beginning 1).
- **Tab 5: Class Roster & Progress Tracker**:
  - Add a **"Differentiated Intervention Clusters"** section / toolbar button (`#btn-cluster-groups`).
  - Renders dynamic cards grouping students who share intervention needs in specific standards (Math, ELA, Science, Social Studies).
  - Each cluster includes a **"Plan Group Lesson"** button that directly pre-fills and launches Tab 3.

#### [MODIFY] [`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js)
- Implement `buildWorksheetData(grade, subject, standardCode, standardTitle)` supporting **all grades (Pre-K to HS)** and **all subjects (Math, Language Arts, Science, Social Studies)** with tailored exercises, work boxes, and solutions.
- Implement `renderInterventionClusters()` that analyzes all students in `getRoster()`, groups them by weak standard codes ($<70\%$), and renders interactive cluster cards.
- Add event listeners and print triggers for the worksheet.

#### [MODIFY] [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css)
- Add styles for `.worksheet-sheet`, `.worksheet-problem-card`, `.worksheet-grid-box`, `.worksheet-rubric-table`, `.cluster-cards-grid`, `.cluster-student-chip`, and `@media print` rules for clean 2-page worksheet pagination.

---

### Component 2: Parent Portal — Homeschool Schedule Matrix & Milestone Certificates

#### [MODIFY] [`pages/parents.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php)
- **Enhanced Homeschool Routine & Weekly Checklist (`#schedule`)**:
  - Add Grade Selector (`Pre-K` through `High School`) and Quarter/Week selector (Weeks 1–36) pulling active curriculum pacing across **Math, ELA, Science, and Social Studies**.
  - Interactive daily task cards (Monday through Friday) with checkable boxes and completion progress tracker saved in `localStorage` (`hesten_homeschool_checklist`).
  - **"Print Weekly Homeschool Planner"** button.
- **Milestone Mastery Certificate Generator (`#milestones`)**:
  - Interactive certificate builder: Student Name, Grade Level (Pre-K to HS), Academic Domain / Standard, Achievement Level (*Honors Master*, *Domain Distinction*, *Curriculum Completer*), and Date.
  - Live visual certificate canvas with gold/navy royal crest, laurel wreath border, official platform watermark, and signature lines.
  - **"Print Official Certificate"** button with specialized `@media print` certificate styling.

#### [MODIFY] [`assets/css/pages/parents.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/parents.css)
- Add styles for `.homeschool-week-grid`, `.homeschool-day-col`, `.homeschool-task-item`, `.certificate-canvas-wrapper`, `.certificate-frame`, `.certificate-seal`, and `@media print` certificate styling.

---

### Component 3: Universal `Ctrl+K` Spotlight Search & Command Palette

#### [NEW] [`assets/js/command-palette.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/command-palette.js)
- Universal searchable database indexing:
  - All lessons & levels (Pre-K through High School).
  - Core standards (CCSS Math, CCSS ELA, NGSS Science, Social Studies).
  - Interactive Tools & Readers (Assessment Checkpoint, Math Sprints, Dyslexia Reader, Pacing Guide).
  - Educator & Parent Portals.
  - Library Classics & Stories.
  - System Settings & Updates.
- Features:
  - Instant fuzzy matching with category tags.
  - Keyboard navigation (`ArrowUp`, `ArrowDown`, `Enter`, `Escape`).
  - Quick action filters (typing `#math`, `#ela`, `#tools`, `#grade5`, `#teacher`).
  - Recent searches saved in `localStorage`.

#### [NEW] [`assets/css/components/command-palette.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/command-palette.css)
- Glassmorphic modal overlay, highlighted search result cards, keyboard shortcut tags (`<kbd>`), and dark/light mode responsive theme integration.

#### [MODIFY] [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Include `command-palette.css` and `command-palette.js`.
- Add a modern header search trigger button with `Ctrl K` badge in `.header-actions`.
- Embed `#global-command-palette` modal markup before `</body>` or at top-level.

---

## Verification Plan

### Automated Tests
1. **Worksheet & Cluster Test** (`scratch/test_worksheet_and_clusters.js`):
   - Verify worksheet generation for all 11 grade levels across all 4 subjects (44 combinations).
   - Verify cluster grouping logic groups students with matching weak standards.
2. **Homeschool & Certificate Test** (`scratch/test_homeschool_and_cert.js`):
   - Verify homeschool schedule generation across all grades and weeks.
   - Verify certificate metadata validation and HTML formatting.
3. **Command Palette Index Test** (`scratch/test_command_palette.js`):
   - Verify command palette database indices and search query resolution.

### Manual & Visual Verification
1. Test `Ctrl+K` / `Cmd+K` from any page, type queries like "fractions", "grade 5", "#teacher", and navigate with arrow keys.
2. Generate worksheets in Tab 3 of `pages/teachers.php` across various grade and subject combinations.
3. Generate and preview a Milestone Certificate in `pages/parents.php` and test printing.
