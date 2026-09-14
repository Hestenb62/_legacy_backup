---
title: "Walkthrough: JSON-Driven Lesson Migration for k-math-m1-a-1"
date: "2026-09-13"
category: "Walkthrough"
tags: ["Lessons", "JSON", "Router", "Math", "Level K"]
summary: "Successfully migrated lessons/k-math-m1-a-1.php into JSON and verified dynamic rendering through levels/k.php?k-math-m1-a-1 without the standalone PHP file."
author: "Antigravity & Hesten"
---

# Walkthrough: JSON-Driven Lesson Migration for k-math-m1-a-1

We successfully converted lesson `k-math-m1-a-1` from a static PHP file (`lessons/k-math-m1-a-1.php`) into a structured JSON definition. The lesson is now dynamically rendered when accessed via `levels/k.php?k-math-m1-a-1` without relying on its original PHP file.

---

## Changes Summary

### 1. JSON Data Extraction & Architecture
- **[k-math-m1-a-1.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons/k-math-m1-a-1.json)**:
  - Created a dedicated standalone JSON file containing the full curriculum schema:
    - Metadata (`title`, `pageTitle`, `description`, `badge`, `badgeIcon`, `requiresMathJax`, `standard`).
    - Pedagogical overview (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
    - Interactive components (`interactive-ladder`, `teacher-concepts`, `story-builder`, `study-guides`).
    - Vocabulary (`Piecewise Linear Function`, `Average Rate of Change`, `Independent Variable`, `Dependent Variable`).
    - Practice & Exit Ticket Questions with answer choices, correct indices, and pedagogical explanations.
    - Citation (`title`, `text`, `subtext`, `lessonId`).
    - Simulation script (`toggleLadderAnimation`, `updateLadderState`, `updateCustomGraph`, `toggleVocabCard`, `switchExplainerTab`).
- **[lessons.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json)**:
  - Updated the central registry entry for `"k-math-m1-a-1"` with the exact same structure.

---

### 2. Universal Lesson Renderer Enhancements
- **[lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)**:
  - **Standalone JSON Priority**: Checks for `assets/data/lessons/{$lessonId}.json` before falling back to `assets/data/lessons.json` or automatic scaffolding.
  - **Modular Block Dispatcher**: Executes component PHP files from `src/components/` and supports raw `html` blocks.
  - **Dynamic Practice Questions**: Evaluates and displays practice questions directly from the JSON definition.
  - **Script & Citation Injection**: Automatically injects client-side simulation scripts and MLA citation footers when declared in JSON.
  - **Open Side-by-Side Vocabulary**: Displayed full-width with vocabulary cards rendered open by default next to one another in a responsive 4-column grid rather than stacked or collapsed into accordions.
  - **Standard Integration**: Binds standards mastery tracking (`localStorage.hesten_standards_mastery`) to the standard and code defined in JSON.

---

### 3. Modular Interactive Components
- **[interactive-ladder.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/interactive-ladder.php)**: Full SVG coordinate plane, climber avatar, step markers, time controls, and interactive segment explanation cards.
- **[teacher-concepts.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/teacher-concepts.php)**: Deep-dive concept cards with LaTeX formula display and curriculum intervals.
- **[story-builder.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/story-builder.php)**: Real-time custom piecewise story builder with 3 range sliders, live SVG polyline generator, and verbal interpretations.
- **[study-guides.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/study-guides.php)**: Visual study guide tab panel with mini SVG diagrams explaining slope and motion, domain time intervals, and velocity vs. speed.

---

### 4. Router Update & PHP File Archival
- **[levels/k.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/k.php)**:
  - Updated the router so that if `lessons/{$requestedLesson}.php` does not exist, it checks if a JSON definition exists in `assets/data/lessons/{$requestedLesson}.json` or `assets/data/lessons.json`, and routes directly through `src/lesson_renderer.php`.
- **`lessons/k-math-m1-a-1.php` -> `lessons/k-math-m1-a-1.php.bak`**:
  - Renamed the static PHP file to `.bak` so it cannot be loaded as a PHP script.

---

## Verification Results

We verified the complete execution pipeline via PHP CLI:
- `lessons/k-math-m1-a-1.php` presence test: **Returned False** (File does not exist).
- URL request simulation `levels/k.php?k-math-m1-a-1`:
  - **Title Rendered**: `Graphs of Piecewise Linear Functions` (PASS)
  - **Interactive Ladder Simulation**: PASS
  - **Custom Story Builder**: PASS
  - **Visual Study Guides & Tabs**: PASS
  - **Practice / Exit Questions**: PASS
  - **Eureka Math Citation**: PASS
  - **Client-Side Simulation Scripts**: PASS
  - **Generated Output Size**: 235,803 bytes with zero PHP errors or warnings.
