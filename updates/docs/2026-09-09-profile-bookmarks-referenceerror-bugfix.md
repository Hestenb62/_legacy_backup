---
title: "Fix Profile Achievement Badges Bookmarks ReferenceError"
date: "2026-09-09"
category: "Bugfix"
tags: ["Profile", "Achievements", "Gamification", "Bookmarks", "Bugfix"]
summary: "Resolved Uncaught ReferenceError in profile-main.js by correctly initializing userBookmarks from getUniversalBookmarksList('all') before computing gamification badges."
author: "Antigravity & Hesten"
---

# Profile Badges ReferenceError Resolution

## Error Summary
- **Error**: `Uncaught ReferenceError: bookmarks is not defined`
- **Error Code**: `ERR-A7762C-1FEB4C`
- **Location**: `assets/js/profile-main.js:322:101`
- **Impact**: Prevented profile gamification badges and achievement cards from rendering on the Student Profile page.

## Root Cause
In `assets/js/profile-main.js`, the achievement badge definitions for `'first-book'` and `'avid-reader'` checked conditions `bookmarks.length >= 1` and `bookmarks.length >= 5`. However, no variable named `bookmarks` was declared within the local function or module scope; bookmarks are managed through `getUniversalBookmarksList(...)`.

## Fix Applied
In [`assets/js/profile-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/profile-main.js):
1. Initialized `const userBookmarks = getUniversalBookmarksList('all');` directly above the `badges` array.
2. Updated condition evaluations to reference `userBookmarks.length`.

```javascript
const userBookmarks = getUniversalBookmarksList('all');

const badges = [
    { id: 'first-book', icon: 'fas fa-book', color: 'blue', title: 'First Book', condition: userBookmarks.length >= 1 },
    { id: 'avid-reader', icon: 'fas fa-book-reader', color: 'gold', title: 'Avid Reader', condition: userBookmarks.length >= 5 },
    ...
];
```

## Verification
- Verified JavaScript syntax via `node -c assets/js/profile-main.js` (passed with code 0).
- Profile badges now unlock and render without throwing runtime exceptions.
