---
title: "Curriculum Subject Printing & Profile Simplification"
date: "2026-09-12"
category: "Walkthrough"
tags: ["Curriculum", "Print", "Profile", "A11y", "UX"]
summary: "Removed diploma and certificate print options from the student profile page, and introduced dedicated per-subject curriculum printing options directly from curriculum popups."
author: "Antigravity & Hesten"
---

# Curriculum Subject Printing & Profile Simplification Walkthrough

## Summary of Changes

### 1. Profile Page Simplification
- **Removed Diploma and Cert Options**:
  - Removed the "Certificate of Mastery" and "Official Report Card" buttons from the header in [`pages/profile.php`](/pages/profile.php).
  - Removed the `#student-report-card-modal` DOM structure from `pages/profile.php` to completely eliminate diploma and certificate print clutter from the profile dashboard.

### 2. Dedicated Per-Subject Curriculum Printing in Popups
- **In-Pane Subject Action Toolbar**:
  - Added a `.doc-modal-subject-toolbar` at the top of each subject's curriculum pane with a **"Print [Subject]"** button (e.g. *Print Mathematics*, *Print ELA*, *Print Science*, *Print Social Studies*).
- **Curriculum Popup Footer Controls**:
  - Upgraded [`src/partials/doc-modal.php`](/src/partials/doc-modal.php) with dynamic segmented printing controls:
    - **"Print [Current Subject]"** (`#modal-print-subject-btn`): Prints only the active subject tab currently being viewed. Automatically updates its label as the user toggles tabs.
    - **"Print All"** (`.doc-modal-print-all-btn`): Retained the option to print the entire multi-subject curriculum when desired.
- **High-Fidelity Subject Print Formatting**:
  - Implemented `printCurriculumSubject(subjectIndex)` and `printActiveCurriculumSubject()` in [`assets/js/index-main.js`](/assets/js/index-main.js).
  - Isolates subject data (Course overview card, core competencies, instructional modules, topics, and lessons).
  - Strips out nested UI buttons and unneeded icons during printing.
  - Automatically expands all module accordions in the print document so parents and teachers receive complete course outlines.
  - Styled with clean 8.5" x 11" portrait page borders, institutional headers, and verified footer notations without trailing blank pages.
- **Polished Stylesheet Tokens**:
  - Added design system tokens and micro-interactions for `.doc-modal-subject-toolbar`, `.doc-modal-subject-tag`, and `.doc-modal-subject-print-btn` in [`assets/css/components/doc-modal.css`](/assets/css/components/doc-modal.css).

---

## Verification
- Syntax verified: `node -c assets/js/index-main.js` passed with 0 errors.
- Print architecture verified: `node scratch/verify_print_architecture.js` passed with 0 errors.
- Master platform test suite: `node scratch/verify_master_suite.js` passed with 0 errors.
