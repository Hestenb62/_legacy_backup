---
title: "Grade-Level Alignment & Custom Curriculum Resources Plan"
date: "2026-10-30"
version: "v2.26.0"
category: "Implementation Plan"
tags: ["Curriculum", "Grade Levels", "Custom Resources", "Breadcrumbs", "Accessibility", "A11y", "UDL"]
summary: "Plan to align all grade pages with appropriate grade levels, implement grade-specific literature, tools, and study strategies, and add dynamic subject breadcrumbs."
author: "Antigravity & Hesten"
---

# Grade-Level Alignment & Custom Curriculum Resources Plan

## 1. Executive Overview
Currently, the curriculum level pages (`levels/a.php` through `levels/o.php`) suffer from two critical discrepancies:
1. **Generic Grade Labels**: Multiple grades are labeled generically rather than by their specific developmental grade levels (e.g. Levels H, I, and J are all labeled "Middle School" instead of Grade 6, Grade 7, Grade 8; Levels K, L, M, and N are all labeled "High School" instead of Grade 9, Grade 10, Grade 11, Grade 12). Additionally, the hero headers do not prominently present the grade level, and there is no accessible breadcrumb trail reflecting the grade and current subject.
2. **Identical Static Resources**: Every grade level from Pre-K to Grade 12 shares the exact same hardcoded high school literature list (*1984*, *Frankenstein*, *The Federalist Papers*) and a static study tip, rather than developmentally appropriate reading, virtual manipulatives, and tailored learning workbenches.

## 2. Proposed Architecture & Enhancements

### A. Grade-Level Metadata & Breadcrumb Trail Alignment
- **Specific Grade Nomenclature**:
  - `levels/a.php`: Level A &rarr; `Pre-K`
  - `levels/b.php`: Level B &rarr; `Kindergarten`
  - `levels/c.php`: Level C &rarr; `1st Grade`
  - `levels/d.php`: Level D &rarr; `2nd Grade`
  - `levels/e.php`: Level E &rarr; `3rd Grade`
  - `levels/f.php`: Level F &rarr; `4th Grade`
  - `levels/g.php`: Level G &rarr; `5th Grade`
  - `levels/h.php`: Level H &rarr; `6th Grade` (Formerly generic "Middle School")
  - `levels/i.php`: Level I &rarr; `7th Grade` (Formerly generic "Middle School")
  - `levels/j.php`: Level J &rarr; `8th Grade` (Formerly generic "Middle School")
  - `levels/k.php`: Level K &rarr; `9th Grade` (Formerly generic "High School")
  - `levels/l.php`: Level L &rarr; `10th Grade` (Formerly generic "High School")
  - `levels/m.php`: Level M &rarr; `11th Grade` (Formerly generic "High School")
  - `levels/n.php`: Level N &rarr; `12th Grade` (Formerly generic "High School")
  - `levels/o.php`: Level O &rarr; `AP & College Prep` (Formerly generic "Extra Resources")
- **Dynamic Subject Breadcrumbs**:
  - Implement an accessible `<nav class="level-breadcrumbs" aria-label="Breadcrumb Trail">` on all grade pages.
  - Follow the mandate: `Breadcrumb trails must reflect current grade and subject, e.g. Level K Math, Level K ELA`.
  - Trail: `Home / Levels / Level [X] ([Grade]) / [Subject]`.
  - Dynamically updates the active subject in the breadcrumb upon clicking tab buttons (`switchTab()`).
- **Prominent Grade Badge in Hero**:
  - Add `<span class="hero-grade-badge"><i class="fas fa-graduation-cap"></i> <?= htmlspecialchars($gradeText) ?></span>` alongside the title.

### B. Custom Grade-Level Resources Architecture
Implement a centralized resource resolver `getGradeCustomResources(string $levelId, string $gradeText)` delivering three tailored resource pillars for each grade:
1. **Grade-Appropriate Literature & Classic Readers**:
   - Primary and elementary grades receive story classics (*Alice's Adventures in Wonderland*, *The Wonderful Wizard of Oz*, *Anne of Green Gables*, *Math & Science Facts Repositories*).
   - Middle school grades receive classic narratives (*The Time Machine*, *Huckleberry Finn*, *A Tale of Two Cities*, *The Declaration of Independence*).
   - High school grades receive foundational literary and civic texts (*Romeo & Juliet*, *Frankenstein*, *1984*, *The Great Gatsby*, *The American Yawp*, *The Federalist Papers*, *The Republic*).
2. **Custom Interactive Learning Tools**:
   - Pre-K & Kindergarten: Virtual Manipulatives (Ten-frames, counters, color tiles), Alphabet & phonics games.
   - 1st & 2nd Grade: Interactive Clocks, Base-10 blocks, Number lines, Elementary Math Practice.
   - 3rd to 5th Grade: Fraction strips, Geoboard, Math Vocabulary flashcards, Grammar drills, Crossword & Word Search.
   - 6th to 8th Grade: Middle School Math Workbench (ratios, integers), Standards Explorer, Syntax lab.
   - 9th to 12th Grade: High School Math Workbench (functions, quadratics), Primary source archives, AP & GED exam tools.
3. **Developmentally Targeted Study Strategy Tips**:
   - Custom pedagogical tips for each grade (tactile counting, phonemic awareness, number bonds, array models, unit rates, balancing equations, coordinate geometry, historical synthesis).

### C. Standards & Module Hydration Resiliency
- Refactor `hydrateLevelModules()` in `src/level_template.php`:
  - Allow rich standards hydration for grades where minimal placeholder skills are present (`$skillCount <= 4`).
  - Add fallback mapping for grades 9–12 in ELA, Science, and Social Studies to `'High School'`, ensuring all subjects render comprehensive standards instead of empty "Coming Soon" states.

### D. Platform Version & Help Center Synchronization
- Bump `HL_SITE_VERSION` from `v2.25.0` to `v2.26.0`.
- Update `HL_SITE_VERSION_LABEL` to `"October 2026 Grade-Level Alignment & Custom Curriculum Resources Release"`.
- Update `HL_SITE_VERSION_SUMMARY` and the What's New modal in `src/footer.php`.
- Create companion Help Center user guide: `assets/text/hc-grade-levels-custom-resources.md`.

## 3. Verification Plan
- Verify all 15 level pages (`levels/a.php` through `levels/o.php`) load with correct titles, grade tags, and themes.
- Confirm breadcrumb trail renders properly and updates when switching subjects (Math &rarr; ELA &rarr; Science &rarr; Social Studies).
- Verify custom literature, interactive tools, and study tips match the respective grade level on every page.
- Test keyboard navigation (`Tab`, `Shift+Tab`, `Enter`, `Space`) and high-contrast styling across all newly rendered resource cards.

