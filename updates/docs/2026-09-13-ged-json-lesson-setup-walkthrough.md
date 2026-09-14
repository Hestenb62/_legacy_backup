---
title: "GED Dynamic JSON Lesson Engine Setup"
date: "2026-09-13"
category: "Walkthrough"
tags: ["GED", "Lessons", "JSON", "Routing", "MathJax", "A11y"]
summary: "Configured practice-ged.php with dynamic JSON lesson routing, open side-by-side vocabulary cards, and modal Check Understanding practice tests."
author: "Antigravity & Hesten"
---

# GED Dynamic JSON Lesson Engine Setup — Walkthrough

We have configured the **Practice GED** portal (`levels/practice-ged.php`) to use the dynamic JSON-driven lesson architecture:

1. **Direct Query Routing**: Any skill click (such as `levels/practice-ged.php?ged-m-1-1` or `?lesson=ged-m-1-1`) routes directly to `src/lesson_renderer.php`.
2. **Open Horizontal Vocabulary Grid**: All vocabulary cards render open by default, displayed side-by-side in a responsive horizontal grid (`.lesson-vocab-card-open`).
3. **Modal "Check Understanding" Integration**: The old in-page exit ticket form is removed. Practice questions are accessed exclusively via the interactive **Check Understanding** action card, opening the docked runner modal with instant feedback, explanations, and MathJax typesetting.
4. **Subject Auto-Normalization**: `src/lesson_renderer.php` maps all GED subtests (`ged-m-` to Mathematics, `ged-r-`/`ged-w-` to ELA, `ged-s-` to Science, `ged-ss-` to Social Studies) and sets back links to `/levels/practice-ged.php`.
5. **Inaugural GED Lesson Definition**: Created `assets/data/lessons/ged-m-1-1.json` for *Order of Operations & Absolute Value with Rational Numbers* (`GED.M.1.1` / `GED.M.Q.1.a`) with interactive GEMDAS visual explorer, concept notes, 4 open vocabulary cards, and 3 test-aligned practice questions.

---

## Changes Summary

### 1. Portal Router
- **[levels/practice-ged.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/practice-ged.php)**: Added top-level query router intercepting `?ged-...` and `?lesson=ged-...`. Directs to `src/lesson_renderer.php` with `$levelUrl = 'practice-ged.php'` and `$levelTitle = 'Practice GED'`.

### 2. Universal Lesson Renderer
- **[src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)**:
  - Added GED prefix parsing and subject normalization (`m` $\to$ `math`, `r`/`w` $\to$ `ela`, `s` $\to$ `science`, `ss` $\to$ `social`).
  - Added `'ged' => 'Practice GED (High School Equivalency)'` level display and default back URL pointing to `/levels/practice-ged.php`.
  - Added standard code fallback `GED.{SUBJ}.{MOD}.{TOPIC}` for GED skills.

### 3. Inaugural GED Lesson Data
- **[assets/data/lessons/ged-m-1-1.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons/ged-m-1-1.json)**:
  - **Standard**: `GED.M.1.1` / `GED.M.Q.1.a`
  - **Title**: *Order of Operations & Absolute Value with Rational Numbers*
  - **Overview**: Focus on Part 1 (No Calculator) requirements, objectives, and teacher insights.
  - **Interactive Component**: Visual GEMDAS hierarchy breakdown with worked step-by-step rational evaluation.
  - **Concepts**: Geometric distance definition of absolute value, fraction bar implied grouping, and $-x^2$ vs $(-x)^2$ sign pitfalls.
  - **Vocabulary**: 4 open side-by-side cards (*Order of Operations*, *Absolute Value*, *Rational Number*, *Base & Exponent*).
  - **Practice Questions**: 3 rigorous GED test-aligned problems with detailed solution steps.
- **[assets/data/lessons.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json)**:
  - Registered `ged-m-1-1` in central curriculum database.

---

## Verification Results

Verified via automated PHP CLI evaluation:
- `practice-ged.php?ged-m-1-1` generates 203,348 bytes of valid HTML.
- In-page exit ticket form (`id="lesson-exit-ticket"`) is **absent**.
- Vocabulary cards render in open horizontal layout (`.lesson-vocab-card-open`).
- Check Understanding action card invokes `openLessonPracticeModal()`.
- MathJax SVG formulas render cleanly.
- Back navigation correctly points to `/levels/practice-ged.php`.
- GED Science skill (`ged-s-1-1`) verified for universal fallback scaffolding.
