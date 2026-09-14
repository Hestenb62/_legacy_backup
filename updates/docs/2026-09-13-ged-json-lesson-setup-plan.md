---
title: "GED Dynamic JSON Lesson Engine Setup"
date: "2026-09-13"
category: "Implementation Plan"
tags: ["GED", "Lessons", "JSON", "Routing", "MathJax", "A11y"]
summary: "Implement dynamic JSON-driven lesson architecture for the GED portal (practice-ged.php and ged.php) with open vocabulary cards and modal Check Understanding practice questions."
author: "Antigravity & Hesten"
---

# Implementation Plan: GED Dynamic JSON Lesson Engine Setup

Implement the dynamic JSON-driven lesson architecture on the GED portal (`levels/practice-ged.php` and `levels/ged.php`), enabling all GED skills to render interactive lessons dynamically with open side-by-side vocabulary and the modal "Check Understanding" practice check.

## Architecture & Objectives

1. **Seamless Routing**:
   - `levels/practice-ged.php` detects single-lesson query strings (`?ged-m-1-1` or `?lesson=ged-m-1-1`).
   - If a static PHP file exists at `lessons/{id}.php`, it renders that file.
   - If no static PHP file exists, it routes to `src/lesson_renderer.php` to render from JSON (or intelligent scaffolding).
   - Create `levels/ged.php` as an alias router so both URLs work seamlessly.

2. **Universal Lesson Renderer GED Parsing**:
   - Parse `ged-` prefix:
     - `m` -> Mathematics (`math`)
     - `r`, `w`, `rla` -> Reasoning Through Language Arts (`ela`)
     - `s`, `sci` -> Science Reasoning (`science`)
     - `ss`, `soc` -> Social Studies Reasoning (`social`)
   - Set `$levelDisplay = 'Practice GED (High School Equivalency)'` and back link to `/levels/practice-ged.php`.

3. **Curriculum & Display Standards**:
   - Vocabulary cards displayed side-by-side in an open horizontal grid (`.lesson-vocab-card-open`).
   - In-page exit tickets replaced by the interactive "Check Understanding" action card.
   - Questions delivered via `openLessonPracticeModal()` with instant feedback, explanations, and MathJax typesetting.

4. **Inaugural Lesson**:
   - `assets/data/lessons/ged-m-1-1.json`: *Order of Operations & Absolute Value with Rational Numbers* (`GED.M.1.1`).
   - Registered in `assets/data/lessons.json`.
