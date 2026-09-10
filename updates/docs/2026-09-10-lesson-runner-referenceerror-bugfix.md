---
title: "Bugfix: Lesson Runner ReferenceError LESSON_TITLE is not defined"
date: "2026-09-10"
category: "Bugfix"
tags: ["Bugfix", "JavaScript", "Lesson Runner", "Bookmarks", "Error Handling"]
summary: "Resolved Uncaught ReferenceError LESSON_TITLE is not defined in src/lesson_runner.php by initializing const LESSON_TITLE from PHP lessonTitle and enhancing bookmark URL retention with query parameters."
author: "Antigravity & Hesten"
---

# Bugfix: Lesson Runner ReferenceError LESSON_TITLE is not defined

## Issue Summary
When viewing any lesson running the docked runner (e.g., `k.php?k-math-m1-a-3`), the Global Error Handler displayed:
```text
Uncaught ReferenceError: LESSON_TITLE is not defined
Code: ERR-87D04E-86D942 | Loc: k.php:2588:20
```

## Root Cause
In [src/lesson_runner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php), the bookmark toggle function (`toggleRunnerLessonBookmark`) referenced `LESSON_TITLE`:
```javascript
window.UniversalBookmarks.toggle({
    id: LESSON_ID,
    title: LESSON_TITLE,
    ...
});
```
However, the script initialization block at the top of the runner defined `LESSON_ID`, `LEVEL_ID`, `STANDARD_CODE`, `PRACTICE_QUESTIONS`, `PREV_URL`, and `NEXT_URL`, but omitted the declaration of `const LESSON_TITLE = <?= json_encode($lessonTitle) ?>;`. Consequently, whenever the bookmark toggle was invoked (or evaluated), JavaScript threw a runtime `ReferenceError`.

Additionally, the bookmark URL was previously recorded as `window.location.pathname`, which stripped the query string on single-lesson pages (saving `/levels/k.php` rather than `/levels/k.php?k-math-m1-a-3`).

## Solution Implemented
1. **Added `LESSON_TITLE` Definition**:
   In [src/lesson_runner.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php), added:
   ```javascript
   const LESSON_TITLE = <?= json_encode($lessonTitle) ?>;
   ```
2. **Defensive Fallback & Query String URL**:
   Updated `toggleRunnerLessonBookmark`:
   ```javascript
   const currentUrl = window.location.pathname + (window.location.search || '');
   const safeTitle = (typeof LESSON_TITLE !== 'undefined' && LESSON_TITLE) ? LESSON_TITLE : (document.title || LESSON_ID);
   const nowBookmarked = window.UniversalBookmarks.toggle({
       id: LESSON_ID,
       title: safeTitle,
       type: 'lesson',
       url: currentUrl,
       category: (LEVEL_ID ? LEVEL_ID.toUpperCase() : 'General') + ' Grade',
       icon: 'fa-graduation-cap'
   });
   ```

## Verification
- Verified with PHP syntax check (`php.exe -l src/lesson_runner.php`): Passed with 0 errors.
- Executed `levels/k.php?k-math-m1-a-3` and verified that `const LESSON_TITLE = "Graphs of Exponential Functions";` is properly output in the client script block.
- Tested bookmark toggle safety with defensive fallbacks.
