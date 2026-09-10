---
title: "Implementation Plan: Comprehensive Platform Fixes & Enhancements Suite"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Plan", "Architecture", "Lessons", "PWA", "Accessibility", "Shell", "A11y"]
summary: "5-phase implementation plan executing the full recommendations from the codebase scan across all 14 platform sections."
author: "Antigravity & Hesten"
---

# Comprehensive Platform Fixes & Enhancements Plan

Implementation plan to execute the full recommendations from the codebase architectural scan across all 14 sections of **Hesten's Learning**.

---

## User Review Required

> [!IMPORTANT]
> **Curriculum Bridging Strategy (119 Empty Lesson Files)**:
> Currently, 119 files in `/lessons/` are 0 bytes. Rather than leaving them blank or hand-authoring 119 separate monolithic PHP files, we propose making each empty lesson file invoke `src/lesson_renderer.php` dynamically with automatic title/subject/grade parsing and interactive practice checkpoints from `src/lesson_runner.php`. When specific lesson data is not yet in `assets/data/lessons.json`, a rich standard-aligned scaffold is rendered instead of a 404 error page.

---

## Proposed Changes

The implementation is divided into **5 logical phases** to ensure stability, maintainability, and clean commits.

---

### Phase 1: Critical Shell, HTML Validity & PWA Cache Fixes

#### [MODIFY] [src/footer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php)
- Append missing `</body>` and `</html>` closing tags at the very bottom of the file (after line 177).

#### [MODIFY] [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js)
- Fix typo in `ASSETS_TO_CACHE`: change `/assets/texts/accessability-*.md` to `/assets/text/accessability-*.md`.
- Add missing static stylesheets and assets to ensure complete offline caching.

#### [MODIFY] [manifest.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/manifest.json)
- Add standard `512x512` icons (standard and maskable) alongside existing `192x192` entries to satisfy modern PWA install criteria.

#### [MODIFY] [assets/css/components/fixed-tools.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/fixed-tools.css)
- Add responsive constraints for `.fab-menu`: introduce `max-height: calc(100vh - 7.5rem); overflow-y: auto;` with custom thin scrollbar styling and a 2-column grid when viewport height is `< 640px` to prevent tool buttons from being clipped on mobile screens.

#### [MODIFY] [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Remove inline `style="display: none;"` on `#nav-content` and replace with CSS-driven display toggling to eliminate flash of unstyled content during mobile navigation.

---

### Phase 2: Curriculum Lesson Engine & Level Routing

#### [MODIFY] [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)
- Update lesson resolution to check `$lessonId` variable first (when included by a lesson file), then `$_GET['id']`, and finally `basename($_SERVER['PHP_SELF'], '.php')`.
- When `$lessonId` is not explicitly defined in `assets/data/lessons.json`, instead of sending an HTTP 404 dead end:
  - Intelligently parse grade, subject, module, topic, and lesson number from the slug (e.g. `k-math-m2-a-1`).
  - Render an interactive lesson scaffold displaying core curriculum objectives, vocabulary terms, study scratchpad integration, and the docked `src/lesson_runner.php` bar.

#### [MODIFY] 119 Empty Lesson Files in [lessons/](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/)
- Populate each 0-byte lesson file with the universal renderer delegate:
  ```php
  <?php
  $lessonId = basename(__FILE__, '.php');
  include dirname(__DIR__) . '/src/lesson_renderer.php';
  ```

#### [MODIFY] [src/lesson_runner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php)
- Add keyboard hotkeys `[` and `]` for rapid navigation between previous and next lessons.

#### [MODIFY] [src/level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php)
- In the skill card rendering loop, when `$skill['url']` is absent, automatically generate a fallback URL to `../lessons/{$skill['id']}.php` instead of rendering unclickable plain text.

#### [MODIFY] [levels/k.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/k.php)
- Standardize all skill URLs so they route uniformly (e.g. `k.php?{skillId}`).

---

### Phase 3: Search, Standards & Content Corrections

#### [MODIFY] [pages/search.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php)
- Fix `formatLessonTitle`: correct `'k'` to map to `'Grade 9 (Level K)'` instead of `'Kindergarten'`.
- Ensure search results breadcrumbs adhere to user rule: `Level K Math`, `Level K ELA`.

#### [MODIFY] [pages/about.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/about.php)
- Replace unrendered markdown syntax `**empowering students with learning disabilities**` with semantic `<strong>` HTML tags.

#### [MODIFY] [pages/standards.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php)
- Audit and confirm domain filter button labels strictly display concise standard notation (e.g. `K.MP`, `K.CC`, `K.OA`, `8.EE`, `HSA-SSE`) per workspace rules.

#### [MODIFY] [pages/contact.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/contact.php)
- Add a direct `mailto:admin@hestena62.com` fallback button with prepopulated subject and body to support offline/local users without an active mail transfer agent.

---

### Phase 4: Reader, Labs, Gamification & Accessibility Enhancements

#### [MODIFY] [library/read/reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)
- Add **Zen / Distraction-Free Reading Mode**:
  - Toggle button in the reader toolbar and keyboard shortcut (`Z`).
  - Hides header, breadcrumbs, and floating tools while maximizing column width and typography readability for ADHD and dyslexic readers.
- Sync active reader text highlights into student profile study notes.

#### [MODIFY] [student/interactive-labs.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/interactive-labs.php)
- Add an "Export Solution to Scratchpad" action in each lab workstation (Fraction Strips, Morphemes, Torque, Chrono-Timeline) that formats the current manipulative state and appends it to `localStorage['hl_scratchpad_notes']`.

#### [MODIFY] [assets/js/gamification/quest-manager.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/gamification/quest-manager.js)
- Guard streak calculation with timezone offset checks to prevent mid-evening streak resets.
- Add an event listener for `hl:assessment-complete` to award XP and unlock assessment badges automatically.

#### [MODIFY] [assessment/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/index.php) & [assets/js/assessment-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js)
- Dispatch `hl:assessment-complete` with score and grade upon finishing quizzes.
- Update [assets/css/layouts/print.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/print.css) with `break-inside: avoid;` for worksheet questions.

#### [MODIFY] [assets/js/accessibility/accommodation-engine.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/accessibility/accommodation-engine.js)
- Add a dynamic contrast safety check when Irlen color overlays are active, automatically adjusting text luminance to guarantee WCAG AA (4.5:1) compliance.
- Add `storage` event listener so changes made on [pages/settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/settings.php) immediately sync across open tabs.

---

### Phase 5: Resiliency, Error Handling & Updates Portal

#### [MODIFY] [assets/js/global-error-handler.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-error-handler.js)
- Add a "Don't show this error again this session" checkbox to the error modal that stores suppressed error hashes in `sessionStorage`.

#### [MODIFY] [offline.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/offline.php)
- Add client-side interactive offline cards for:
  - Saved Scratchpad Notes (`localStorage['hl_scratchpad_notes']`).
  - Cached Library Books from CacheStorage.
  - Offline Math Practice mini-sprints.

#### [NEW] [updates/feed.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/feed.php)
- Create a lightweight JSON and RSS feed generator that reads `updates/docs/*.md` using the existing frontmatter parser, allowing external subscribers and educators to track platform releases.

---

## Verification Plan

### Automated & Structural Verification
- **Empty Lesson Check**: Run PowerShell script to verify 0 empty files remain in `lessons/`.
  ```powershell
  Get-ChildItem lessons -File | Where-Object { $_.Length -eq 0 } | Measure-Object | Select-Object -ExpandProperty Count
  # Target: 0
  ```
- **Service Worker Cache Test**: Verify `service-worker.js` contains no references to `/assets/texts/`.
- **HTML Validation**: Inspect output of rendered pages to confirm proper `</body></html>` termination and lack of raw markdown asterisks.

### Manual Verification
1. **Lessons**: Open `/lessons/k-ela-m1-a-1.php` and verify it loads the rich lesson scaffold and docked runner without errors.
2. **FAB Menu**: Resize browser height to `< 600px` and open FAB menu; verify scrolling/2-column layout prevents tool clipping.
3. **Reader Zen Mode**: Open `/library/read/?book=frankenstein`, press `Z`, verify distraction-free mode toggles smoothly.
4. **Offline Mode**: Toggle Chrome DevTools Network to "Offline", refresh, and verify `offline.php` displays cached cards and notes.
5. **Updates Portal**: Visit `/updates.php` and verify both the scan doc and this implementation plan appear in the index with working links.
