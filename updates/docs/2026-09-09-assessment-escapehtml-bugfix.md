---
title: "Fix: ReferenceError escapeHtml is not defined in assessment-main.js"
date: "2026-09-09"
category: "Bugfix"
tags: ["Assessment", "JavaScript", "Bugfix", "Printable Worksheets"]
summary: "Fixed an Uncaught ReferenceError in assessment-main.js where escapeHtml was invoked during printable worksheet generation without being defined."
author: "Antigravity & Hesten"
---

# Fix: ReferenceError escapeHtml is not defined in assessment-main.js

## Issue Description
When opening the **Printable Quiz Worksheet & Answer Key Modal** (`openPrintableWorksheetModal()`), a runtime exception occurred:
```
Uncaught ReferenceError: escapeHtml is not defined
Code: ERR-FD8C0F-AC5496 | Loc: assessment-main.js:1699:39
```

## Root Cause
In [`assets/js/assessment-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js), `escapeHtml()` was invoked across multiple template string interpolations for question text, answer choices, and standard codes, but the helper function definition was missing from the module scope.

## Solution Implemented
1. Defined `escapeHtml(str)` at the top of `assets/js/assessment-main.js` with null-safe handling and standard character replacements (`&`, `<`, `>`, `"`, `'`).
2. Exported `window.escapeHtml = escapeHtml` to ensure global accessibility across all assessment scripts.
3. Verified syntax with `node -c assets/js/assessment-main.js`.
