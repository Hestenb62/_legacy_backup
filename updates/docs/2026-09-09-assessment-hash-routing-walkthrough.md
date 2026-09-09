---
title: "Assessment Hash Routing & Starters (#elem, #middle, #high)"
date: "2026-09-09"
category: "Walkthrough"
tags: ["Assessment", "Hash Routing", "Grade Selection", "Starters", "Diagnostics"]
summary: "Implemented URL hash routing (#elem, #middle, #high) on assessment/index.php to filter grade level cards and render curated starter assessments."
author: "Antigravity & Hesten"
---

# Walkthrough: Assessment Hash Routing & Starters (#elem, #middle, #high)

Implemented dynamic URL hash routing on the main assessment portal (`assessment/index.php`) so that `#elem`, `#middle`, and `#high` filter the visible grade levels and present curated starter assessments.

## Key Changes

### 1. Assessment Selection Portal Markup
- **File**: [assessment/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/index.php)
- Added accessible category level pill tabs:
  - `All Levels` (`#all`)
  - `Elementary (P–5)` (`#elem`)
  - `Middle School (6–8)` (`#middle`)
  - `High School (9–12 & AP)` (`#high`)
- Added `#assessment-starters-section` with interactive cards for diagnostic screeners, foundational rubrics, and timed sprints.
- Added `#grade-count-badge` and dynamic section headers.

### 2. Hash Routing & Starters Logic
- **File**: [assets/js/assessment-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js)
- Grouped grade levels into grade bands:
  - `elem`: Pre-K, K, 1, 2, 3, 4, 5
  - `middle`: 6, 7, 8
  - `high`: 9, 10, 11, 12, AP
- Configured curated starter assessments:
  - **Elementary (`#elem`)**:
    * Pre-K Mid-Module 1 Observational Rubric (`/assessment/GPK-MID-M1.php`)
    * Kindergarten Phonics & Numbers Quick Check (`?grade=k&count=5`)
    * Grade 3 Math & ELA 5-Minute Sprint (`?grade=3&mode=sprint&count=5`)
    * Elementary Adaptive Growth Diagnostic (`/assessment/diagnostic.php`)
  - **Middle School (`#middle`)**:
    * Grade 8 Expressions & Equations Starter (`?grade=8&standard=8.EE&count=5`)
    * Grade 7 Ratios & Proportional Reasoning (`?grade=7&standard=7.RP&count=5`)
    * Grade 6 Rapid Diagnostic Sprint (`?grade=6&mode=sprint&count=5`)
    * Middle School Adaptive Growth Diagnostic (`/assessment/diagnostic.php`)
  - **High School (`#high`)**:
    * High School Algebra I Starter (`?grade=9&standard=HSA-SSE&count=5`)
    * High School Biology & Life Systems (`?grade=10&standard=HS-LS1&count=5`)
    * AP Computer Science A Starter (`?grade=ap&standard=AP-CSA&count=5`)
    * High School Adaptive Placement Diagnostic (`/assessment/diagnostic.php`)
- Added `getLevelCategoryFromHash()` supporting aliases (`#high`, `#hs`, `#middle`, `#elem`, etc.).
- Implemented `renderLandingSelection(category)` which updates active tab pills, header titles, counts, starters grid, and grade cards.
- Attached `window.addEventListener("hashchange", ...)` so navigating between hashes updates the view immediately without a full page reload.

### 3. Responsive Styling
- **File**: [assets/css/pages/assessment.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/assessment.css)
- Added styling for:
  - `.assessment-level-tabs` and `.assessment-level-tab.active` gradient pills
  - `.assessment-starters-grid` and `.assessment-starter-card` with hover elevation
  - Starters icon boxes, category badges, count pills, and typography

## Verification Results

- **JavaScript Syntax Check**:
  `node -c assets/js/assessment-main.js` -> Exited 0 (No syntax errors).
- **PHP Syntax Check**:
  `C:\xampp\php\php.exe -l assessment/index.php` -> `No syntax errors detected in assessment/index.php`.
- **URL Hash Support Verified**:
  - `assessment/index.php#high`: Shows High School (Grades 9–12 & AP) and HS Starters.
  - `assessment/index.php#middle`: Shows Middle School (Grades 6–8) and MS Starters.
  - `assessment/index.php#elem`: Shows Elementary (Pre-K–5) and Elementary Starters.
  - `assessment/index.php#all`: Shows All 15 Grades and cross-cutting Starters.
