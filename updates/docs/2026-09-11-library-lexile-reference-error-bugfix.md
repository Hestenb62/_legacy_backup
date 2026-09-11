---
title: "Fix ReferenceError for applyStoredLexileOverrides in Library Index"
date: "2026-09-11"
category: "Bugfix"
tags: ["Library", "Bugfix", "JavaScript", "Lexile"]
summary: "Restored missing lib-inline-lexile-customization.js script tag in library/index.php and added defensive type checks to all DOMContentLoaded module initialization calls in lib-bookmarks.js."
author: "Antigravity & Hesten"
---

# Bugfix Report: Fix Uncaught ReferenceError applyStoredLexileOverrides

## Problem
When browsing `/library/index.php`, the console threw:
`Uncaught ReferenceError: applyStoredLexileOverrides is not defined` at `lib-bookmarks.js:23:9`.

## Root Cause
When inserting the new script tags for gamification, study notebook, and classroom sharing, the script tag for `lib-inline-lexile-customization.js` was accidentally replaced, causing `applyStoredLexileOverrides()` to be undefined when called in `lib-bookmarks.js`.

## Solution
1. **Script Restoration ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))**:
   - Re-added `<script src="../assets/js/library/lib-inline-lexile-customization.js" defer></script>` in the module script queue.
2. **Defensive Guarding ([`assets/js/library/lib-bookmarks.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-bookmarks.js))**:
   - Wrapped all `DOMContentLoaded` startup function calls in `typeof ... === 'function'` safety checks to guarantee resilient loading across all browser contexts and bundle configurations.
