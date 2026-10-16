---
title: "Resolution of ReferenceError: openModal is not defined in Library Catalog"
date: "2026-10-16"
version: "v2.18.0"
category: "Bugfix"
tags: ["Library", "Bugfix", "JavaScript", "Scope", "openModal", "SLiMS"]
summary: "Resolved Uncaught ReferenceError: openModal is not defined caused by a duplicate top-level let declaration of currentBookData between lib-bookmarks.js and lib-book-overview-modal.js that halted script evaluation."
author: "Antigravity & Hesten"
---

# Resolution: `Uncaught ReferenceError: openModal is not defined`

## 1. Problem Description

When clicking any book card on the Library Catalog (`/library/`), an uncaught runtime error was reported by the global error handler:
```
Uncaught ReferenceError: openModal is not defined
Code: ERR-2F9158-4CD4EB | Loc: /:9457:20
URL: http://127.0.0.1:5500/library/
```

This occurred because clicking any book card calls the inline event handler `onclick="openModal(this)"`, but at execution time, `openModal` was undefined on the global `window` object.

---

## 2. Root Cause Analysis

In non-module browser scripts loaded in global lexical scope:
1. [`assets/js/library/lib-bookmarks.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-bookmarks.js) is loaded before `lib-book-overview-modal.js` and declares `let currentBookData = null;` in top-level script scope.
2. [`assets/js/library/lib-book-overview-modal.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-book-overview-modal.js) was also declaring `let currentBookData = null;` at top-level.
3. In ES6, declaring the same `let` identifier in the global lexical scope across sequential scripts immediately throws:
   ```
   Uncaught SyntaxError: Identifier 'currentBookData' has already been declared
   ```
4. This syntax error prevented `lib-book-overview-modal.js` from ever executing its body. Consequently, `window.openModal` was never registered, causing `Uncaught ReferenceError: openModal is not defined` whenever a book card was clicked.

---

## 3. Resolution & Code Changes

In [`assets/js/library/lib-book-overview-modal.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-book-overview-modal.js):
1. **Removed Duplicate `let` Declaration**:
   Replaced `let currentBookData = null;` with a guarded assignment that re-uses the existing variable or attaches to `window`:
   ```javascript
   window.currentBookId = null;
   if (typeof currentBookData === 'undefined') {
       window.currentBookData = null;
   }
   ```
2. **Updated State Assignment**:
   When populating modal data, safely set both `window.currentBookData` and the shared `currentBookData` variable:
   ```javascript
   window.currentBookId = bookId;
   window.currentBookData = d;
   if (typeof currentBookData !== 'undefined') {
       try { currentBookData = d; } catch (_) {}
   }
   ```
3. **Explicit Global Function Declarations & Attachment**:
   Converted `openModal` and `closeModal` to function declarations and explicitly bound them to `window.openModal` and `window.closeModal`, ensuring inline event handlers (`onclick="openModal(this)"`) and programmatic callers can always invoke them.

---

## 4. Verification

- Tested sequential execution of all 14 library scripts in Node.js VM:
  - `lib-bookmarks.js` &rarr; PASS
  - `lib-view-mode-switcher.js` &rarr; PASS
  - `lib-real.js` &rarr; PASS
  - `lib-horizontal-carousel-scroll-but.js` &rarr; PASS
  - `lib-continue-reading-shelf.js` &rarr; PASS
  - `lib-subject-research-desks-navigat.js` &rarr; PASS
  - `lib-book-overview-modal.js` &rarr; PASS
  - `lib-explainer.js` &rarr; PASS
  - `lib-academic-citation-generator.js` &rarr; PASS
  - `lib-inline-lexile-customization.js` &rarr; PASS
  - `lib-reading-gamification.js` &rarr; PASS
  - `lib-study-notebook.js` &rarr; PASS
  - `lib-classroom-share.js` &rarr; PASS
  - `lib-keyboard-shortcuts.js` &rarr; PASS
- Verified `typeof window.openModal === 'function'` and `typeof openModal === 'function'`.
