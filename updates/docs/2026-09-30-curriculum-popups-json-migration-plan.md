---
title: "Universal Curriculum Pop-Ups JSON Directory Migration Plan"
date: "2026-09-30"
version: "v2.8.2"
category: "Implementation Plan"
tags: ["Curriculum", "JSON", "Architecture", "File System", "Directory Migration"]
summary: "Architectural plan to relocate all 56 Pre-K through Grade 12 curriculum pop-up JSON files into assets/data/curr pop-ups/ and update client-side loaders."
author: "Antigravity & Hesten"
---

# Universal Curriculum Pop-Ups JSON Directory Migration Plan

## 1. Overview & Objectives
To streamline and organize the data directory hierarchy within `assets/data/`, all dedicated curriculum pop-up JSON files (`curriculum-pre-k-*.json`, `curriculum-kindergarten-*.json`, and `curriculum-grade-1-*.json` through `curriculum-grade-12-*.json` — 56 files total across Math, ELA, Science, and Social Studies) will be relocated into the dedicated directory `assets/data/curr pop-ups/`.

Concurrently, all client loader references in `assets/js/index-main.js` will be updated to point to `/assets/data/curr pop-ups/curriculum-${targetSlug}-${subj}.json` (with robust URL path encoding for web requests), ensuring uninterrupted on-demand modal loading and zero disruption to curriculum browsing.

---

## 2. Inventory of Target Files to Relocate
A total of **56 JSON files** will be moved from `assets/data/` to `assets/data/curr pop-ups/`:

1. **Pre-Kindergarten (4 files)**:
   - `curriculum-pre-k-ela.json`
   - `curriculum-pre-k-math.json`
   - `curriculum-pre-k-science.json`
   - `curriculum-pre-k-social.json`
2. **Kindergarten (4 files)**:
   - `curriculum-kindergarten-ela.json`
   - `curriculum-kindergarten-math.json`
   - `curriculum-kindergarten-science.json`
   - `curriculum-kindergarten-social.json`
3. **Elementary Grades 1–5 (20 files)**:
   - `curriculum-grade-[1..5]-ela.json`
   - `curriculum-grade-[1..5]-math.json`
   - `curriculum-grade-[1..5]-science.json`
   - `curriculum-grade-[1..5]-social.json`
4. **Middle School Grades 6–8 (12 files)**:
   - `curriculum-grade-[6..8]-ela.json`
   - `curriculum-grade-[6..8]-math.json`
   - `curriculum-grade-[6..8]-science.json`
   - `curriculum-grade-[6..8]-social.json`
5. **High School Grades 9–12 (16 files)**:
   - `curriculum-grade-[9..12]-ela.json`
   - `curriculum-grade-[9..12]-math.json`
   - `curriculum-grade-[9..12]-science.json`
   - `curriculum-grade-[9..12]-social.json`

*(Note: `curriculum-engageny-math.json` remains in `assets/data/` as a core standards outline dataset).*

---

## 3. Technical Changes Required
1. **File System Migration**:
   - Ensure destination directory `assets/data/curr pop-ups/` exists.
   - Move all 56 files cleanly from `assets/data/` to `assets/data/curr pop-ups/`.
   - Verify all 56 files exist and remain valid JSON with identical file hashes/sizes.
2. **Client-Side Loader Update (`assets/js/index-main.js`)**:
   - Update `openDocModal(btn)` lines 553-558:
     ```javascript
     const curriculumFiles = [
         { key: 'math', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-math.json` },
         { key: 'ela', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-ela.json` },
         { key: 'science', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-science.json` },
         { key: 'social', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-social.json` }
     ];
     ```
   - Note: Using URL-encoded `%20` or `/assets/data/curr pop-ups/` ensures universal compatibility across all browser fetch implementations and server HTTP configurations.
3. **Platform Version & Release Notes Sync**:
   - Elevate platform version from `v2.8.1` to `v2.8.2` in `src/header.php` and `src/footer.php`.
   - Update `#footer-version-modal` in `src/footer.php` with release details.
4. **Walkthrough Documentation**:
   - Publish `updates/docs/2026-09-30-curriculum-popups-json-migration-walkthrough.md`.

---

## 4. Verification & Quality Assurance
- Automated node/powershell verification script to ensure all 56 files exist in `assets/data/curr pop-ups/` and none remain in `assets/data/`.
- Syntax check on `assets/js/index-main.js`, `src/header.php`, and `src/footer.php`.
- Check fetch response status for simulated requests against the new paths.
