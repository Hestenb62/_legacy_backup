---
title: "Walkthrough: Library Continue Reading Chapter & Reading Percentage Auto-Resume"
date: "2026-09-11"
category: "Walkthrough"
tags: ["Library", "Unified Reader", "Continue Reading", "Auto-Resume", "Scroll Progress", "UX"]
summary: "Enhanced the Library Index Continue Reading ('Jump Back In') shelf to dynamically link directly to the user's active chapter and specific reading percentage, with automatic smooth scroll restoration and visual progress indicators."
author: "Antigravity & Hesten"
---

# Walkthrough: Library Continue Reading Chapter & Reading Percentage Auto-Resume

## Overview & Objective
When users browse the Digital Library Index (`/library/index.php`), the **"Jump Back In" (Continue Reading)** shelf displays recently opened books. Previously, the shelf links pointed only to the book's default base URL (often Chapter 1 or top of page), losing both the active chapter and the user's in-chapter reading depth.

This update upgrades the entire reading resumption pipeline:
1. **Accurate Chapter & Percentage Links**: Continue Reading cards now link directly to the specific chapter slug and exact reading percentage (e.g. `read/index.php?book=1984&chapter=chapter-3&pct=42&resume=true`).
2. **Automated Reader Scroll Restoration**: When arriving via a resume link, the Reader instantly and smoothly scrolls to the exact reading percentage/position the user previously reached.
3. **Dynamic Visual Indicators**: The top progress bar and the sticky reading bar immediately reflect the restored percentage.
4. **Layout Stabilization**: Re-checks and ensures accurate scroll alignment after late-loading webfonts, images, or MathJax notation settle.
5. **Smart Book Modal Integration**: Opening a book modal in the library dynamically changes the "Read Online" button to **"Continue Reading (Ch. X • Y%)"** with the direct resume link.

---

## Technical Changes Applied

### 1. Library Continue Reading Shelf ([`assets/js/library/lib-continue-reading-shelf.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-continue-reading-shelf.js))
- **Detailed Progress Extraction**:
  - Extracts active chapter number, chapter slug (`hesten_progress_${bookId}_lastChapterSlug`), chapter scroll percentage (`hesten_scroll_pct_${bookId}_chapter_${ch}`), overall completion percentage, and last read timestamp.
  - Sorts cards by `lastRead` timestamp descending, placing the most recently read books first.
- **Deep Linking**:
  - Generates URLs with parameters: `read/index.php?book=${bookId}&chapter=${chapterSlug}&pct=${targetPct}&resume=true`.
  - Accurately handles `intro`, regular chapters, and `teacher-resources`.
- **Card UI & A11y**:
  - Progress bar on each continue-reading card visually matches the chapter reading percentage.
  - Added descriptive `aria-label` and `title` tags for screen readers.
- **Reactive Live Sync**:
  - Added listeners to `storage` and `hl:data-sync` events so progress made in other browser tabs reflects immediately without page reloads.

### 2. Digital Reader Scroll Engine ([`assets/js/reader/read-scroll-progress.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-scroll-progress.js))
- **Enhanced Save Pipeline**:
  - On scroll (debounced) and on `beforeunload`/`pagehide` (flushed immediately), saves:
    - Pixel scroll top (`scrollPosKey`)
    - Chapter scroll percentage (`scrollPctKey`)
    - Overall book completion (`completionKey`)
    - Last active chapter number and slug
    - Last read timestamp (`hesten_last_read_${bookId}`)
- **Auto-Resume Detection & Scroll**:
  - Detects `resume=true` or `pct=...` in URL query parameters.
  - Calculates proportional scroll target: `targetY = Math.round((pct / 100) * docHeight)`.
  - Performs smooth auto-scroll to the target point.
  - Updates the top progress bar and sticky compact reading bar immediately to the target percentage.
  - Shows an unobtrusive confirmation toast: `Resumed at [X]%` with a quick **"Start at Top"** button to jump back if desired.
  - Includes a stabilization check after window `load` to guard against late layout shifts (MathJax rendering, high-res images).

### 3. Reader Typography Engine ([`assets/js/reader/read-typography.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-typography.js))
- Passed `SCROLL_PCT_KEY`, `bookId`, and `meta` into `initScrollProgress()` to ensure all keys and chapter metadata are synchronized cleanly.

### 4. Book Overview Modal ([`assets/js/library/lib-book-overview-modal.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-book-overview-modal.js))
- When viewing a book's detail modal in the library, checks `localStorage` for prior reading activity.
- If progress exists, updates the primary button from "Read Online" to:
  `Continue Reading (Ch. [X] • [Y]%)` and links directly to the resume URL.

---

## Verification & Automated Testing

1. **Syntax Verification**:
   - `node -c assets/js/reader/read-scroll-progress.js` &rarr; **Pass** (Exit Code `0`).
   - `node -c assets/js/reader/read-typography.js` &rarr; **Pass** (Exit Code `0`).
   - `node -c assets/js/library/lib-continue-reading-shelf.js` &rarr; **Pass** (Exit Code `0`).
   - `node -c assets/js/library/lib-book-overview-modal.js` &rarr; **Pass** (Exit Code `0`).

2. **Automated Unit Testing** (`scratch/test_resume_feature.js`):
   - Verified URL link generation for numbered chapters (`1984` Ch. 3 at 42% &rarr; `read/index.php?book=1984&chapter=chapter-3&pct=42&resume=true`).
   - Verified slug normalization for non-numbered chapters (`frankenstein` Intro at 75% &rarr; `read/index.php?book=frankenstein&chapter=intro&pct=75&resume=true`).
   - Verified proportional document height scroll calculation (42% of 10,000px document &rarr; 4,200px scroll target).
   - Test suite passed with **0 errors**.
