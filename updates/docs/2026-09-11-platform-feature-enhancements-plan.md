---
title: "Implementation Plan: Comprehensive Learning Platform Feature Enhancements"
date: "2026-09-11"
category: "Implementation Plan"
tags: ["Reading", "Accessibility", "UDL", "Assessments", "IEP", "Offline", "Gamification"]
summary: "Comprehensive implementation plan covering the approved platform feature suite: Sticky Compact Reading Bar, Reading Ruler Quick-Access, Assessment Audio Read-Aloud, Live Level Progress Rings, One-Click IEP/504 Brief Generator, and Offline Material Downloader."
author: "Antigravity & Hesten"
---

# Implementation Plan: Comprehensive Learning Platform Feature Enhancements

This implementation plan covers the suite of platform enhancements approved by the user, focusing on student reading flow, UDL accommodations, assessment accessibility, gamified progress visualization, educator IEP reporting, and offline material caching.

## User Review Required

> [!IMPORTANT]
> - **Sticky Compact Reading Bar**: Will be integrated into the unified reader ([`library/read/reader_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)), individual reader chapters ([`library/read/1984/`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/)), and interactive lessons ([`src/lesson_renderer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)). It slides down smoothly when scrolling past 160px and displays book/lesson title, live progress %, estimated time remaining, and zen-mode quick action.
> - **Streamlined Header Actions Excluded**: Per your explicit direction, the main header action bar will remain untouched, leaving the search and profile layout intact.

## Proposed Changes

---

### 1. Sticky Compact Reading Bar (`library/read/`, `src/lesson_renderer.php`)

#### [NEW] [assets/css/components/sticky-reading-bar.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/sticky-reading-bar.css)
- Lightweight, glassmorphic sticky reading bar styles:
  - Sticky/fixed positioned at `top: 0` with subtle backdrop blur (`backdrop-filter: blur(12px)`).
  - Smooth translateY transition when entering/exiting view.
  - Micro-progress indicator bar integrated along the bottom edge.
  - High-contrast text, chapter badge, and remaining time calculation.
  - Zen-mode toggle button and chapter navigation quick-actions.

#### [NEW] [assets/js/components/sticky-reading-bar.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/components/sticky-reading-bar.js)
- Reusable scroll observer and reading metrics calculator:
  - Tracks scroll depth through the `<article>` or `<main>` content container.
  - Calculates remaining minutes dynamically based on unread words (default ~180 wpm).
  - Updates progress percentage badge and progress fill.
  - Handles keyboard shortcuts and zen mode toggling.

#### [MODIFY] [library/read/reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)
- Mount sticky reading bar markup and include `sticky-reading-bar.css` and `sticky-reading-bar.js`.

#### [MODIFY] [library/read/1984/chapter-1.php ... chapter-25.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/) & [frankenstein/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/frankenstein/chapter-1.php)
- Include sticky reading bar styles and script so all standalone chapters benefit from the reading bar.

#### [MODIFY] [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)
- Mount the sticky reading bar for curriculum lessons, displaying lesson title, standard badge, and completion progress.

---

### 2. Reading Ruler / Focus Guide Quick-Access (UDL Reading Accommodation)

#### [MODIFY] [src/partials/a11y-settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/a11y-settings.php)
- Add a dedicated Reading Ruler controls card:
  - Enable/disable toggle switch.
  - Height selector: 1 Line (40px), 2 Lines (70px), 3 Lines (100px).
  - Backdrop dimming opacity slider.
  - Hotkey reminder badge (`Alt+R`).

#### [MODIFY] [assets/js/accessibility/accommodation-engine.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/accessibility/accommodation-engine.js)
- Ensure ruler height options (1, 2, 3 lines) update smoothly.
- Dispatch `hl:accommodations-updated` on toggle to synchronize across open reader tabs.

---

### 3. Audio Read-Aloud for Assessment Diagnostics & Quizzes

#### [MODIFY] [assessment/diagnostic.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/diagnostic.php) & [assets/js/assessment/adaptive-diagnostic.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment/adaptive-diagnostic.js)
- Add speech synthesis audio button (`#diagnostic-tts-btn`) to the diagnostic screener interface.
- Read question prompt and answer options on demand using Web Speech API with rate matching user settings.

#### [MODIFY] [assets/js/assessment-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js)
- Enhance `readCurrentQuestionAloud`:
  - Visually highlight the question and then each answer choice sequentially as it is read aloud (dual-modality karaoke reading).
  - Add active audio equalizer pulse animation to the speaker icon while audio is playing.

---

### 4. Live Level Radial Progress Rings (`src/level_template.php`)

#### [MODIFY] [src/level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php)
- In `renderSubjectModules()`:
  - Add an SVG circular radial progress ring (circumference stroke-dasharray animation) in each module header next to "Module Mastery".
  - Update progress ring live from `localStorage.getItem('hl_progress_' + LEVEL_ID)`.
  - Display congratulatory badge when module achieves 100% completion.

---

### 5. One-Click IEP/504 Meeting Brief Generator (`pages/parents.php`)

#### [MODIFY] [pages/parents.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php)
- Add "Export IEP/504 Accommodation Brief" modal:
  - Pulls active accommodations from `hl_accommodations_profile` and `hesten_parent_accommodations`.
  - Pulls student profile (`hesten-user-profile`) and standards mastery overview (`hesten_standards_mastery`).
  - Formats into a professional, printable 1-page CSE/504 Brief document with:
    - Student name, grade level, and active date.
    - Active classroom & test accommodations table (reading mask, extended time, dyslexia font, color overlays, calculator).
    - Summary of academic strengths and focus standards.
    - Parent and Special Education Case Manager sign-off lines.

---

### 6. Offline Material Downloader & Offline Station (`library/read/`, `offline.php`)

#### [MODIFY] [library/read/reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php) & [src/lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)
- Add a "Save for Offline" button with download icon.
- When clicked:
  - Opens `caches.open('hestens-learning-v14')` and caches current URL and assets.
  - Appends book/lesson metadata into `localStorage.getItem('hl_offline_downloads')`.
  - Dispatches visual toast: "Saved to Offline Station".

#### [MODIFY] [offline.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/offline.php)
- Add "My Downloaded Books & Lessons" section:
  - Reads `hl_offline_downloads` from `localStorage` and renders quick-launch cards.
  - Allows 1-click opening of cached literature and lessons while offline.
  - Includes a "Remove" button to clear cached items.
- Add an Offline Sync Status indicator showing pending updates queued for Google Drive.

---

## Verification Plan

### Automated Tests
- Verify all new JS files compile without errors via `node --check`.
- Validate that CacheStorage API calls handle offline fallbacks gracefully.
- Run automated link and syntax checks across modified files.

### Manual Verification
1. **Sticky Reading Bar**: Scroll through `library/read/1984/chapter-1.php` and `library/read/reader_template.php?book=1984` — confirm bar appears past 160px, reflects accurate read percentage, and shows remaining time.
2. **Reading Ruler**: Press `Alt+R` or toggle in settings — verify ruler follows cursor with adjustable height.
3. **Assessment TTS**: Launch diagnostic and grade quizzes — click speaker button to test audio read-aloud and choice highlighting.
4. **Radial Progress Rings**: Toggle skill completion checkmarks in `levels/k.php` — confirm circular progress rings animate smoothly.
5. **IEP/504 Brief**: Open `pages/parents.php`, click "Export IEP/504 Accommodation Brief", verify modal displays student accommodations and generates clean print preview.
6. **Offline Downloader**: Click "Save for Offline" on a book chapter, disconnect network, visit `offline.php` — confirm chapter appears in offline downloads and opens offline.
