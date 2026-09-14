---
title: "JSON-Driven Lesson Migration Plan for k-math-m1-a-1"
date: "2026-09-13"
category: "Implementation Plan"
tags: ["Lessons", "JSON", "Router", "Math", "Level K"]
summary: "Plan to migrate lessons/k-math-m1-a-1.php into JSON and enable dynamic rendering from levels/k.php?k-math-m1-a-1 without the standalone PHP file."
author: "Antigravity & Hesten"
---

# Implementation Plan: JSON-Driven Lesson Migration for k-math-m1-a-1

Transition lesson `k-math-m1-a-1` from a hardcoded PHP file (`lessons/k-math-m1-a-1.php`) to a structured JSON definition, and update `levels/k.php` and `src/lesson_renderer.php` to dynamically load and render it when accessed via `levels/k.php?k-math-m1-a-1`.

## User Review Required

> [!IMPORTANT]
> - `lessons/k-math-m1-a-1.php` will be archived/renamed to `lessons/k-math-m1-a-1.php.bak` to ensure it is NOT accessed directly via PHP file, fulfilling the requirement "without its currant php file".
> - Lesson data will be placed in both `assets/data/lessons/k-math-m1-a-1.json` (for isolated experiments/modifications) and updated in `assets/data/lessons.json` (central repository) so you can easily play with either format.

## Proposed Changes

### 1. JSON Data Migration
#### [NEW] [k-math-m1-a-1.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons/k-math-m1-a-1.json)
- Create standalone dedicated JSON file containing full schema:
  - `meta`: title, pageTitle, description, author, badge, badgeIcon, requiresMathJax, standard (`HSF.IF.B.4`).
  - `overview`: title, pill, text, outcomes list, teacherInsight.
  - `content`: modular interactive blocks (e.g. `interactive-ladder`, `teacher-concepts`, `story-builder`, `study-guides`, or custom HTML/components).
  - `vocabulary`: definitions for Piecewise Linear Function, Average Rate of Change, Independent Variable, Dependent Variable.
  - `practiceQuestions`: the 2 curriculum exit ticket questions with explanations and option arrays.
  - `citation`: MLA citation metadata for Eureka Math / Great Minds.
  - `scripts`: client-side simulation and interactivity logic.

#### [MODIFY] [lessons.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json)
- Update entry for `"k-math-m1-a-1"` to match this complete, rich JSON structure.

---

### 2. Lesson Renderer Enhancements
#### [MODIFY] [lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)
- Add standalone file lookup: check `assets/data/lessons/{$lessonId}.json` first, then fall back to `assets/data/lessons.json`.
- Support rendering `practiceQuestions` from JSON definition in the exit ticket section.
- Support rendering custom interactive scripts (`$lesson['scripts']`) cleanly.
- Support `html` block type in addition to modular component blocks (`$block['type']`).
- Support source citation rendering if defined in JSON.

#### [NEW / MODIFY] Components in `src/components/`
- [MODIFY] [interactive-ladder.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/interactive-ladder.php): Ensure the full SVG ladder graphic, axes, labels, animation markers, and segment explanation cards match the full visual fidelity of the original lesson.
- [NEW] [story-builder.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/story-builder.php): Custom interactive story plotter component.
- [NEW] [study-guides.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/study-guides.php): Visual study guides with tabs and mini SVGs.

---

### 3. Level Router Update
#### [MODIFY] [levels/k.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/k.php)
- Update the dynamic lesson query router:
  - If a requested lesson PHP file does not exist, check if JSON exists (either in `assets/data/lessons/{id}.json` or `assets/data/lessons.json`), set `$lessonId`, `$levelUrl = 'k.php'`, and load `src/lesson_renderer.php`.

---

### 4. Archive Current PHP Lesson File
#### [RENAME] `lessons/k-math-m1-a-1.php` -> `lessons/k-math-m1-a-1.php.bak`
- Disables the static PHP file so requests to `levels/k.php?k-math-m1-a-1` strictly execute via the dynamic JSON engine.

---

## Verification Plan

### Automated / Browser Verification
1. Verify JSON syntax of `assets/data/lessons/k-math-m1-a-1.json` and `assets/data/lessons.json` using PHP CLI `json_decode`.
2. Run local PHP built-in server or CLI test on `levels/k.php?k-math-m1-a-1` to confirm:
   - It routes properly to `lesson_renderer.php`.
   - The interactive ladder simulation and SVG graph render.
   - Sliders and custom graph builder render.
   - Vocabulary cards expand/collapse.
   - Practice questions display and evaluate properly.
   - MathJax expressions typeset cleanly.
3. Confirm `lessons/k-math-m1-a-1.php` does not exist (is renamed to `.bak`).
