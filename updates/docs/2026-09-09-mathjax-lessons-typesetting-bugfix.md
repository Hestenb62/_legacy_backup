---
title: "Bugfix: MathJax Typesetting on Math Lessons k-math-m1-a-1 through a-3"
date: "2026-09-09"
category: "Bugfix"
tags: ["MathJax", "LaTeX", "Curriculum", "Bugfix", "Mathematics"]
summary: "Resolved issue where MathJax was not initializing or rendering LaTeX formulas across math lessons k-math-m1-a-1 through k-math-m1-a-3 by implementing automatic typeset execution in window.ensureMathJax, URL/content auto-detection, and lesson runner typeset hooks."
author: "Antigravity & Hesten"
---

# Bugfix: MathJax Typesetting on Math Lessons k-math-m1-a-1 through a-3

## Problem Statement
On math lessons (such as `k.php?k-math-m1-a-1`, `k.php?k-math-m1-a-2`, and `k.php?k-math-m1-a-3`), mathematical formulas and variables were rendering as raw unparsed LaTeX strings (e.g. `$y = 2^x$`, `$2.5\text{ ft/min}$`, `$P(s) = 4s$`, `$\frac{-7}{6}$`) instead of rendered mathematical typography.

## Root Cause Analysis
1. **Omission of Typesetting Call in `ensureMathJax`**: In [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php), `window.ensureMathJax` resolved the promise once the script was ready, but never actually invoked `MathJax.typesetPromise()` unless explicitly called by page-specific code (which only `pages/standards.php` did).
2. **Missing Flag in Math Lessons**: The math lesson templates did not declare `$requiresMathJax = true;`, so `src/header.php` never loaded MathJax.
3. **No Dynamic Auto-Detection**: When lessons were loaded through the single-lesson query router (`k.php?{skillId}`), there was no check in `level_template.php` to flag MathJax for math curricula.
4. **Dynamic Content in Lesson Runner**: The practice questions and explanations in `src/lesson_runner.php` were injected dynamically into the DOM via innerHTML without notifying MathJax to typeset the newly added nodes.

## Solutions Implemented
1. **Automatic Typesetting Execution in [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)**:
   - Updated `window.ensureMathJax(elements)` so that whenever invoked, it automatically schedules and executes `MathJax.typesetPromise(targets)` on DOM ready or immediately if the DOM is already parsed.
   - Added `processEscapes: true` to MathJax TeX configuration.
   - Increased script initialization polling threshold from 20 tries (1s) to 100 tries (5s) for reliable execution.
2. **Double-Layer Auto-Detection in [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)**:
   - **Server-Side**: If `$requiresMathJax` is not explicitly set, auto-detects `math` in `REQUEST_URI`, `QUERY_STRING`, or `$lessonId`.
   - **Client-Side**: Added a `DOMContentLoaded` content scanner that checks for LaTeX math notation (`$...$` or `\(...\)`) and automatically triggers `window.ensureMathJax()`.
3. **Explicit Flags in Lessons**:
   - Added `$requiresMathJax = true;` to [lessons/k-math-m1-a-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/k-math-m1-a-1.php), [lessons/k-math-m1-a-2.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/k-math-m1-a-2.php), and [lessons/k-math-m1-a-3.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/k-math-m1-a-3.php).
   - Added auto-flagging in [src/level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php) and [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php).
4. **Dynamic Typesetting in [src/lesson_runner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php)**:
   - Hooked `window.ensureMathJax(container)` immediately after rendering practice question blocks.
   - Hooked `window.ensureMathJax(expBox)` when an explanation box is revealed upon user answer selection.

## Verification
- All 7 modified files passed syntax verification (`php.exe -l`) with 0 errors.
- Verified output of `k.php?k-math-m1-a-1`, `k-math-m1-a-2`, and `k-math-m1-a-3` contains active MathJax initialization and runner typeset hooks.
