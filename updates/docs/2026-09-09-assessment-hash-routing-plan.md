---
title: "Assessment Hash Routing & Starters (#elem, #middle, #high)"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Assessment", "Hash Routing", "Grade Selection", "Starters", "Diagnostics"]
summary: "Enable URL hash routing (#elem, #middle, #high) on the main assessment portal with level-filtered grade cards and curated starter diagnostics."
author: "Antigravity & Hesten"
---

# Implementation Plan: Assessment Page Hash Routing & Starters (#elem, #middle, #high)

Enable hash-based URL routing on the main assessment portal (`assessment/index.php`) so that `#elem`, `#middle`, and `#high` dynamically filter grade level cards and display curated starter assessments (diagnostic screeners, observational rubrics, and rapid sprints).

## Proposed Architecture & Workflow

1. **URL Hash Routing Support**:
   - `assessment/index.php#elem` (aliases: `#elementary`, `#p-5`):
     - Displays Elementary grades (Pre-K, Kindergarten, Grades 1–5).
     - Displays Elementary starters (Pre-K Mid-Module 1 Rubric, Kindergarten Phonics & Numbers check, Grade 3 Sprint, Adaptive Diagnostic).
   - `assessment/index.php#middle` (aliases: `#ms`, `#6-8`):
     - Displays Middle School grades (Grades 6, 7, 8).
     - Displays Middle School starters (Grade 8 Pre-Algebra 8.EE, Grade 7 Ratios 7.RP, Grade 6 Sprint, Adaptive Diagnostic).
   - `assessment/index.php#high` (aliases: `#hs`, `#highschool`, `#9-12`):
     - Displays High School grades (Grades 9, 10, 11, 12, AP).
     - Displays High School starters (Algebra I HSA-SSE, Biology HS-LS1, AP Computer Science A, Adaptive Diagnostic).
   - `assessment/index.php#all` (or no hash):
     - Displays all 15 grades and a cross-cutting starter suite.

2. **UI & Navigation Components**:
   - Add accessible category filter pills (`All Levels`, `Elementary`, `Middle School`, `High School`) above the grids in `assessment/index.php`.
   - Clicking a filter pill updates `window.location.hash`, keeping the browser history updated and smooth.
   - Listen to `window.addEventListener('hashchange', ...)` so browser back/forward and direct hash URLs instantly update without full page reload.

3. **Curated Starters & Quick Checks**:
   - Introduce `.assessment-starters-section` with interactive starter cards featuring standard badges, timed sprint tags, and direct launch links.
   - Grade levels count pill dynamically indicates how many levels are currently displayed (e.g. "Showing 5 High School Levels").

## Proposed Changes

### Assessment Page Markup & Logic

#### [MODIFY] [assessment/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/index.php)
- Add level filter pill tabs (`#all`, `#elem`, `#middle`, `#high`).
- Add `#assessment-starters-section` containing starters header, description, and `#assessment-starters-grid`.
- Add grade section header with grade count badge.

#### [MODIFY] [assets/js/assessment-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js)
- Define `startersConfig` data structure containing rich metadata, standards, and links for Elementary, Middle, and High School starters.
- Add `getCategoryFromHash()` helper with alias matching (`elem`, `middle`, `high`, `all`).
- Refactor Mode 1 (Landing Page) logic into a reactive `renderLandingSelection(category)` function:
  - Filters `gradeConfig` entries according to category.
  - Renders the relevant starters into `#assessment-starters-grid`.
  - Updates active class on category tabs.
  - Updates page titles, subtitles, and counter pills.
- Add `window.addEventListener("hashchange", ...)` to re-render the view whenever the URL hash changes.

#### [MODIFY] [assets/css/pages/assessment.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/assessment.css)
- Add styling for `.assessment-level-tabs` and `.assessment-level-tab.active`.
- Add styling for `.assessment-starters-section`, `.assessment-starters-grid`, `.assessment-starter-card`, badges, and icon treatments.
- Add responsive grid layouts and dark mode contrast tokens.

## Verification Plan

### Automated Tests / Syntax Validation
- Run `node -c assets/js/assessment-main.js` to verify JavaScript syntax.
- Run `php -l assessment/index.php` to verify PHP syntax.

### Manual / Browser Verification
- Test direct navigation to:
  - `assessment/index.php#high` -> Verify only Grades 9, 10, 11, 12, AP and HS starters appear.
  - `assessment/index.php#middle` -> Verify only Grades 6, 7, 8 and MS starters appear.
  - `assessment/index.php#elem` -> Verify only Pre-K through 5th grade and elementary starters appear.
  - `assessment/index.php#all` / `assessment/index.php` -> Verify all 15 grades appear.
- Test clicking filter tab pills to ensure smooth hash update without reload.
