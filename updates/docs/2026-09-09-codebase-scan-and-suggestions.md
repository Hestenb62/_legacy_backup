---
title: "Comprehensive Codebase Architecture Scan & Section Suggestions"
date: "2026-09-09"
category: "Architecture"
tags: ["Architecture", "Codebase Scan", "Accessibility", "A11y", "Curriculum", "PWA", "Suggestions"]
summary: "Full-spectrum architectural audit across all 14 major sections of Hesten's Learning platform, identifying core strengths, critical findings, and prioritized suggestions."
author: "Antigravity & Hesten"
---

# Comprehensive Codebase Scan & Section Suggestions

An architectural scan of **Hesten's Learning** platform across all 14 core sections of the site.

---

## Executive Summary & Key Highlights

Hesten's Learning is an educational platform with accessibility and neurodiversity features (dyslexia typography, bionic reading, Irlen color tints, reading masks, and dyscalculia MathJax coloring). The system architecture uses Vanilla CSS (`@layer`), modular PHP templating (`src/header.php`, `src/footer.php`, `src/partials/`), and client-side state in `localStorage` with Google Drive cloud synchronization.

During this comprehensive scan, we identified several strong architectural foundations alongside a few high-priority fixes and feature enhancements across every section.

---

## Section-by-Section Analysis & Suggestions

### 1. Welcome & Landing Portal (`/`, `index.php`)
* **Current Implementation**:
  - Modular structure loading [hero.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/hero.php), [resume-banner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/resume-banner.php), [learning-streak.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/learning-streak.php), and [academic-path-header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/academic-path-header.php).
  - Dynamically populates learning cards using `assets/data/global-learningLevels.js`.
* **Observations & Strengths**:
  - Clean separation of UI partials and fast initial page load.
  - Good use of segmented tabs (All, Elementary, Middle, High, Extra) with mobile select fallback.
* **Actionable Suggestions**:
  - **Dynamic Level Progress Indicators**: Connect the card completion rings directly to completed lessons recorded in `localStorage.getItem('hl_lesson_progress')` so students immediately see their % completion on the home grid.
  - **Search Bar A11y Live Region**: Wire `#results-count` in [academic-path-header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/academic-path-header.php) to an `aria-live="polite"` region so screen reader users hear how many levels matched their filter query.

---

### 2. Core Layout & Application Shell (`src/header.php`, `src/footer.php`, `src/partials/`)
* **Current Implementation**:
  - Standardized HTML5 shell with OpenGraph tags, PWA meta, preconnects, and dynamic cache busting (`assetVersion()`).
  - Resources mega-menu with viewport collision repositioning in [header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php).
  - Centralized floating action button (FAB) menu in [fixed-tools.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/fixed-tools.php) hosting 10 cognitive tools.
* **Findings & Critical Fix**:
  - ⚠️ **Missing Closing HTML Tags**: [src/footer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) ends at line 177 with `</script>` inside an IIFE and lacks `</body>` and `</html>`. Pages throughout the site rely on `footer.php` to close these tags.
  - ⚠️ **FAB Vertical Overflow on Mobile**: With 10 tool buttons expanding vertically, the FAB menu can extend beyond the viewport on mobile devices (especially in landscape orientation).
* **Actionable Suggestions**:
  - Append `</body></html>` to the very bottom of [src/footer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php).
  - Add a responsive 2-column grid or radial layout to `.fab-menu` when viewport height is `< 640px` to prevent clipping tools.

---

### 3. Academic Levels & Dashboards (`levels/`, `src/level_template.php`)
* **Current Implementation**:
  - Dynamic hydration engine in [level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php) pulling modules from `curriculum-engageny-math.json` when minimal data is passed.
  - Direct deep linking into assessments via `/assessment/#standard={code}`.
* **Observations & Inconsistencies**:
  - In [levels/k.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/k.php), lesson URLs alternate between `k.php?k-math-m1-a-1` and `../lessons/k-math-m1-a-2.php`.
  - In other levels ([levels/a.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/a.php) through [levels/j.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/j.php)), skills lack explicit `'url'` properties, resulting in unclickable text titles.
* **Actionable Suggestions**:
  - **Universal Fallback Router**: In [level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php), when a skill does not specify a `'url'`, auto-generate a fallback link to `../lessons/{skillId}.php` or `/src/lesson_renderer.php?id={skillId}`.
  - Standardize lesson routing across all levels so query string routing (`?lesson=...`) is handled uniformly.

---

### 4. Curriculum Lessons Engine (`lessons/`, `src/lesson_runner.php`, `src/lesson_renderer.php`)
* **Current Implementation**:
  - Rich, custom-built lesson in [lessons/k-math-m1-a-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/k-math-m1-a-1.php) with an interactive SVG ladder coordinate simulator and student/teacher outcomes.
  - Universal docked runner in [src/lesson_runner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php) with sticky status bar and "Check Understanding" quiz modal.
  - Dynamic JSON-driven lesson renderer in [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php) powered by `assets/data/lessons.json`.
* **Findings & Critical Fix**:
  - ⚠️ **119 Empty Lesson Files**: Out of 122 files in `lessons/`, 119 files are 0 bytes. If a student navigates to any ELA, Science, Social Studies, or higher Math lesson, a blank page is returned.
* **Actionable Suggestions**:
  - **Universal Router Stubs**: Populate empty lesson stubs to forward directly to [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php) or use a single fallback template:
    ```php
    <?php
    $lessonId = basename(__FILE__, '.php');
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    ```
  - Expand `assets/data/lessons.json` schema to encompass foundational ELA and science lessons.

---

### 5. Assessment & Diagnostic Suite (`assessment/`)
* **Current Implementation**:
  - Full-featured quiz runner in [assessment/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/index.php) supporting 15 grade levels (P-12 + AP) with hash routing (`#all`, `#elem`, `#middle`, `#high`).
  - Adaptive diagnostic screener in [assessment/diagnostic.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/diagnostic.php).
  - Formative teacher observation rubrics in [assessment/rubrics.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/rubrics.php).
  - Printable worksheets with customizable question counts and teacher answer keys.
* **Actionable Suggestions**:
  - **Gamification Integration**: Connect diagnostic and quiz completion events directly to `quest-manager.js` to automatically unlock achievement badges ("Diagnostic Master", "Quiz Whiz") and grant XP.
  - **Print CSS Cleanliness**: Enhance [assets/css/layouts/print.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/print.css) to force clean page breaks between worksheet questions (`break-inside: avoid`) to prevent split questions across printed pages.

---

### 6. Digital Library & Reader (`library/`, `library/read/`)
* **Current Implementation**:
  - Catalog portal in [library/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php) featuring subject research desks (US History, World History, WW1, WW2, Math), Lexile difficulty filters, and book cards.
  - Digital reader template in [library/read/reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php) with word-by-word TTS highlighting, scroll resume bookmarking, and chapter drawer.
* **Actionable Suggestions**:
  - **Zen / Distraction-Free Mode**: Add a toggle in `reader_template.php` to hide all chrome (breadcrumbs, fixed tools, and global header) with a quick keyboard shortcut (`Z`), maximizing screen area for students with severe ADHD.
  - **Highlight Sync**: Sync user-highlighted excerpts from `localStorage` directly to the "Saved Study Notes" panel in [pages/profile.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/profile.php) and through Google Drive auto-sync.

---

### 7. Student Hub & Interactive Labs (`student/`)
* **Current Implementation**:
  - Subject wikis for Math, ELA, Science, and Social Studies.
  - Interactive skill tree in [student/skill-tree.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/skill-tree.php).
  - Multi-sensory virtual manipulatives in [student/interactive-labs.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/interactive-labs.php): Fraction Strips, Phonics & Morphemes, Balance & Torque, and Chrono-Timeline.
* **Actionable Suggestions**:
  - **Save Lab State to Scratchpad**: In [student/interactive-labs.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/interactive-labs.php), provide an "Export Solution to Scratchpad" button so students can capture their lab answers directly into their notes.
  - **Accessibility Modals**: Standardize modal backdrop dismissals and `aria-modal="true"` bindings across all legacy resource pages (`math-practice.php`, `science-experiments.php`).

---

### 8. Standards Explorer (`pages/standards.php`)
* **Current Implementation**:
  - Full curriculum outlines across Math, ELA, Science, and Social Studies for Pre-K through 12th Grade.
  - On-demand MathJax rendering.
* **Actionable Suggestions**:
  - **Compliance with Standards Explorer Rule**: Ensure domain filter buttons strictly display concise standard numbers and letters (e.g. `K.MP`, `K.CC`, `K.OA`, `8.EE`, `HSA-SSE`) rather than verbose multi-word titles.
  - **Accordion Virtualization**: For smoother scrolling on low-end Chromebooks, lazy-render collapsed grade card bodies when opened.

---

### 9. Accessibility & Cognitive Tooling (`assets/js/global-a11y.js`, `accommodation-engine.js`, `pages/accessibility.php`)
* **Current Implementation**:
  - Reading mask, spotlight focus mode, line-height/word spacing controls, dyslexic fonts, bionic reading, dyscalculia colorizer, and high contrast themes.
* **Actionable Suggestions**:
  - **Contrast Ratio Guardian**: When Irlen color overlays (rose, yellow, aqua, mint) are applied on top of custom themes, dynamically check that text-to-background contrast maintains WCAG AA (4.5:1) compliance and automatically adjust text luminance if necessary.
  - **Panel State Synchronization**: Bind the sliding panel in [a11y-settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/a11y-settings.php) to listen for `storage` events so changes made in [pages/settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/settings.php) instantly update the widget in real time without refreshing.

---

### 10. Gamification & Motivation (`assets/js/gamification/`, `pages/profile.php`, `pages/games.php`)
* **Current Implementation**:
  - Quest manager tracking study streaks, levels, XP, and rank tiers.
  - Badge celebration modals with confetti triggers.
  - Accessible, stress-free games hub in [pages/games.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/games.php).
* **Actionable Suggestions**:
  - **Timezone-Safe Streak Resets**: Guard midnight streak check logic against device clock shifts and timezone crossings.
  - **Audio Celebrations**: Use the existing Web Audio API synthesizer in `global-study-tools.js` to play pleasant, soft celebratory chimes upon leveling up or completing daily quests (with an explicit mute toggle in a11y settings).

---

### 11. Updates & Planning Portal (`updates/`, `updates.php`)
* **Current Implementation**:
  - Auto-indexes all Markdown files in `updates/docs/` with YAML frontmatter parsing, search, category filtering, reading time estimates, and tag filtering.
* **Actionable Suggestions**:
  - **Changelog RSS/JSON Feed**: Expose a lightweight `updates/feed.php` endpoint emitting JSON/RSS so external aggregators, parents, or educators can subscribe to platform releases.

---

### 12. Community & Informational Pages (`pages/`)
* **Current Implementation**:
  - Dedicated suites for educators ([pages/teachers.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php)) and homeschool families ([pages/parents.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php)).
  - Help Center ([pages/help-center.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/help-center.php)) reading Markdown docs from `assets/text/`.
* **Findings & Suggestions**:
  - ⚠️ **Unrendered Markdown in HTML**: In [pages/about.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/about.php) line 49, `**empowering students with learning disabilities**` is rendered literally as raw asterisks instead of HTML `<strong>`.
  - ⚠️ **Search Title Naming Bug**: In [pages/search.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php) lines 40–42, `formatLessonTitle` maps `'k'` to `'Kindergarten'` instead of `'Grade 9 (Level K)'`.
  - **Contact Form UX**: In [pages/contact.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/contact.php), add a fallback `mailto:` action button alongside the simulated POST request so users can send messages even when running locally without a mail server.

---

### 13. PWA, Service Worker & Offline Resiliency (`service-worker.js`, `offline.php`)
* **Current Implementation**:
  - Service worker caching core app shell, CSS layers, and JavaScript bundles.
  - Sole offline shell in [offline.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/offline.php) displaying cached capabilities.
* **Findings & Critical Fix**:
  - ⚠️ **Typo in Cache URLs**: In [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) lines 59–62, the cache list specifies `/assets/texts/accessability-*.md`. The actual directory is `/assets/text/` (singular). This causes 4 non-critical cache fetch failures during service worker installation.
* **Actionable Suggestions**:
  - Correct the paths in [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) from `/assets/texts/` to `/assets/text/`.
  - In [offline.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/offline.php), render direct client-side cards for previously visited books, saved scratchpad notes, and offline math practice modules.

---

### 14. Error Handling & Data Persistence (`global-error-handler.js`, `gdrive-sync.js`)
* **Current Implementation**:
  - Global error modal trapping unhandled JS exceptions and promise rejections with unique error codes, clipboard copying, and ignore lists for benign 3rd-party noise.
  - Google Drive cloud auto-sync for student profiles and settings.
* **Actionable Suggestions**:
  - **Session Error Suppression**: Add a "Don't show this error again this session" option to the global error modal so repeated non-breaking script warnings don't disrupt student workflow.
  - **Sync Conflict Resolution**: In [assets/js/gdrive-sync.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/gdrive-sync.js), add a timestamp comparison ("Last modified locally vs cloud") to prevent accidental overwrite when switching between devices.

---

## Priority Action Matrix

| Priority | Section | Issue / Opportunity | Recommended Action |
| :--- | :--- | :--- | :--- |
| **High** | Core Shell | Missing `</body></html>` in `src/footer.php` | Add closing tags at end of [src/footer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) |
| **High** | Lessons | 119 empty files in `lessons/` | Forward empty stubs to [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php) |
| **High** | PWA / Offline | Typo `/assets/texts/` in `service-worker.js` | Fix directory path to `/assets/text/` in [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) |
| **Medium** | Levels | Unclickable skills across Levels A–J & L–O | Add fallback URL generator in [level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php) |
| **Medium** | Search | `'k'` mapped to Kindergarten in `search.php` | Fix grade map in [pages/search.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php) to Level K / Grade 9 |
| **Medium** | Informational | Raw `**` markdown in `pages/about.php` | Replace with `<strong>` tags in [pages/about.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/about.php) |
| **Low** | Reader | Zen / Distraction-free mode | Add Zen mode toggle to [reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php) |
| **Low** | Mobile FAB | 10 tools vertically overflowing on short screens | Add 2-column or radial menu layout for `< 640px` |
