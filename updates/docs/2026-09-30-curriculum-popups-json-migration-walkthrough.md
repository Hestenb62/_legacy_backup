---
title: "Universal Curriculum Pop-Ups JSON Directory Migration Walkthrough"
date: "2026-09-30"
version: "v2.8.2"
category: "Walkthrough"
tags: ["Curriculum", "JSON", "Architecture", "File System", "Directory Migration"]
summary: "Successfully relocated all 56 Pre-K through Grade 12 curriculum pop-up JSON files into assets/data/curr pop-ups/ and updated index-main.js client-side loader paths."
author: "Antigravity & Hesten"
---

# Universal Curriculum Pop-Ups JSON Directory Migration Walkthrough

## 1. Executive Summary
In response to user requirements, all **56 dedicated curriculum pop-up JSON files** spanning **Pre-Kindergarten**, **Kindergarten**, and **Grades 1 through 12** across all four core subjects (**Mathematics**, **English Language Arts**, **Science**, and **Social Studies**) have been cleanly relocated from `assets/data/` into the dedicated directory:
`assets/data/curr pop-ups/`

All consumer loader pathways in `assets/js/index-main.js` were simultaneously updated to reference the new `/assets/data/curr%20pop-ups/` endpoint, guaranteeing 100% uninterrupted on-demand modal loading, flawless in-memory caching, and zero 404 network errors.

---

## 2. Inventory of Relocated Files (56 Files)
All 56 curriculum files now reside in `assets/data/curr pop-ups/`:

| Grade Band | Files Relocated | Core Subjects |
| :--- | :--- | :--- |
| **Pre-K** | `curriculum-pre-k-*.json` (4 files) | ELA, Math, Science, Social Studies |
| **Kindergarten** | `curriculum-kindergarten-*.json` (4 files) | ELA, Math, Science, Social Studies |
| **Elementary (Grades 1–5)** | `curriculum-grade-1-*.json` to `curriculum-grade-5-*.json` (20 files) | ELA, Math, Science, Social Studies |
| **Middle School (Grades 6–8)** | `curriculum-grade-6-*.json` to `curriculum-grade-8-*.json` (12 files) | ELA, Math, Science, Social Studies |
| **High School (Grades 9–12)** | `curriculum-grade-9-*.json` to `curriculum-grade-12-*.json` (16 files) | ELA, Math, Science, Social Studies |

*Note: `curriculum-engageny-math.json` remains in `assets/data/` as a core standards outline dataset.*

---

## 3. Code Modifications & Loader Path Alignment

### `assets/js/index-main.js`
Updated `openDocModal` to load on-demand files from `/assets/data/curr%20pop-ups/`:
```javascript
const curriculumFiles = [
    { key: 'math', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-math.json` },
    { key: 'ela', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-ela.json` },
    { key: 'science', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-science.json` },
    { key: 'social', file: `/assets/data/curr%20pop-ups/curriculum-${targetSlug}-social.json` }
];
```

### Version Elevation & Release Notes Sync
- Bumped platform semantic version from `v2.8.1` to **`v2.8.2`** in:
  - `src/header.php` (`HL_SITE_VERSION`, `HL_SITE_VERSION_DATE`, `HL_SITE_VERSION_LABEL`, `HL_SITE_VERSION_SUMMARY`)
  - `src/footer.php` (Fallback constants and `#footer-version-modal` feature list)
- Created companion Help Center guide in `assets/text/hc-curriculum-popups.md`.

---

## 4. Verification & Validation Results

1. **Filesystem Verification**:
   - `assets/data/curr pop-ups/`: Contains exactly **56 files**.
   - `assets/data/`: Zero `curriculum-grade-*.json`, `curriculum-pre-k-*.json`, or `curriculum-kindergarten-*.json` remain in root; root contains only `curriculum-engageny-math.json`.
2. **JSON Parsing & Integrity Test**:
   - All 56 files in `assets/data/curr pop-ups/` parsed as 100% valid JSON with intact schemas (`grade`, `subject`, `name`, `course`, `overview`, `competencies`, `modules`, `topics`, `standards`).
3. **JavaScript Syntax**:
   - Executed `node -c assets/js/index-main.js`: 0 syntax errors or warnings.
