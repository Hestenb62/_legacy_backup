---
title: "Research Portal Elevation & Student Practice Notebook Implementation Plan"
date: "2026-09-30"
version: "v2.10.0"
category: "Implementation Plan"
tags: ["Research", "Practice Notebook", "Local Storage", "Data Sync", "Service Worker", "Accessibility"]
summary: "Comprehensive architectural plan to elevate the Research Portal into offline PWA and Command Palette search, and implement an interactive Student Practice Notebook with local storage and cloud auto-sync across all curriculum lessons."
author: "Antigravity & Hesten"
---

# Research Portal Elevation & Student Practice Notebook Implementation Plan

## 1. Overview & Objectives
This release combines two major platform advancements:
1. **Elevate the Research Portal (`/research/index.php`)**: Fully integrate Hesten's Learning's academic journals (**Dyslexia & Learning Disabilities Research - DLDR** and **Dysgraphia Studies & Motor Skills - DSMS**) into the platform infrastructure, including offline PWA pre-caching, Command Palette (`Ctrl+K`) spotlight indexing, header search autocomplete, and evidence-based pedagogical links within curriculum lessons.
2. **Interactive Student Practice Notebook**: Transform the static Eureka Math Problem Sets on curriculum lessons into an interactive, accessible digital workbook where students can type algebraic working, launch the Super Scratchpad, track solved status with progress meters, auto-save to `localStorage` with cloud Google Drive synchronization, and export/print solved homework sheets.

---

## 2. Technical Specifications & File Changes

### Component A: Research Portal Infrastructure Elevation
1. **Service Worker Offline Pre-Caching (`service-worker.js`)**:
   - Add `/research/index.php`, `/research/DLDR/index.php`, `/research/DSMS/index.php`, `/assets/data/research/journals.json`, `/assets/css/research-main.css`, and `/assets/js/research/journal-engine.js` to `ASSETS_TO_CACHE`.
   - Bump cache version to `hestens-learning-v21`.
2. **Command Palette Indexing (`assets/js/components/command-palette.js`)**:
   - Add dedicated `"Research"` section in `SEARCH_DATABASE` covering the Research Hub, DLDR journal, DSMS journal, and specific research papers (phonological awareness, dysgraphia accommodations, kinematic handwriting analysis).
3. **Header Search Autocomplete (`assets/js/components/header-search-autocomplete.js`)**:
   - Include research papers and journal keywords in default suggestions.
4. **Lesson Research Badge & Evidence-Based Callouts (`src/lesson_renderer.php`)**:
   - Embed an evidence-based pedagogy note in lesson overviews connecting learning disability research to classroom strategies.

### Component B: Interactive Student Practice Notebook
1. **Lesson Renderer Interface (`src/lesson_renderer.php`)**:
   - In `.lesson-problem-card`, add:
     - Student work textarea (`.lesson-student-workspace`).
     - Problem status toggle button (`.lesson-problem-status-btn` with checkmark icon and live badge: "Solved" / "In Progress").
     - "Open Scratchpad" button launching floating scratchpad pre-loaded with problem reference.
     - Auto-save feedback pill (`.lesson-save-indicator`).
   - In `.lesson-problem-set-header`:
     - Live progress bar: "X of Y Solved (Z%)".
     - "Print My Solved Work" button alongside "Print Worksheet (Blank)".
     - "Clear My Work" reset button with accessible confirmation.
2. **Client-Side Notebook Engine (`assets/js/components/practice-notebook.js`)**:
   - Initializes on any page containing `#problem-set`.
   - Canonical storage key: `hl_practice_notebook_${lessonId}`.
   - Debounced (350ms) input listener saves text, timestamps, and solved status.
   - Dispatches `window.dispatchEvent(new CustomEvent('hl:data-sync'))` to trigger Google Drive cloud auto-sync.
   - Listens to `window.addEventListener('storage')` for multi-tab reactivity.
3. **Styling & Print Optimization (`assets/css/pages/lesson.css`)**:
   - Accessible styling with high-contrast `:focus-visible` rings.
   - Print stylesheet formatting ensuring student typed answers render cleanly under problem prompts for homework submission.

### Component C: Platform Version & Documentation
1. **Version Elevation**: Bump from `v2.9.1` to `v2.10.0` in `src/header.php` and `src/footer.php`.
2. **Release Notes**: Update `#footer-version-modal` in `src/footer.php`.
3. **Help Center User Guides**: Publish `assets/text/hc-research-hub.md` and `assets/text/hc-practice-notebook.md`.
4. **Walkthrough Document**: Save `updates/docs/2026-09-30-research-and-practice-notebook-walkthrough.md`.

---

## 3. Verification & Validation Protocol
- Test service worker offline caching for `/research/` endpoints.
- Test Command Palette search for research articles (`Ctrl+K` -> "dyslexia", "kinematics", "research").
- Test student practice notebook typing, local storage saving, and live progress updating.
- Verify print styles format student answers cleanly.
- Validate JavaScript syntax with `node -c`.
