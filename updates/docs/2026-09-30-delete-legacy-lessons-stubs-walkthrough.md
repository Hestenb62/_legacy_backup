---
title: "Legacy Root Lessons Folder Removal & Router Streamlining Walkthrough"
date: "2026-09-30"
version: "v2.9.1"
category: "Walkthrough"
tags: ["Lessons", "Architecture", "Cleanup", "Router", "File System"]
summary: "Successfully deleted the obsolete root /lessons/ directory (95 redundant PHP stubs) and updated level routers to dispatch directly to the Universal Lesson Renderer and module JSON datasets."
author: "Antigravity & Hesten"
---

# Legacy Root Lessons Folder Removal & Router Streamlining Walkthrough

## 1. Executive Summary
Following the complete consolidation of all 105 Grade 9 Algebra I lessons into modular JSON datasets (`assets/data/lessons/k-math-m1.json` through `k-math-m5.json`) and the central registry (`assets/data/lessons.json`), the root `/lessons/` folder containing **95 individual 3-line PHP stub files** became completely redundant.

In accordance with user confirmation, the root `/lessons/` folder was deleted in its entirety. The routing pipelines in `levels/k.php`, `levels/practice-ged.php`, and `src/level_template.php` were streamlined to dispatch requests directly to `src/lesson_renderer.php`, eliminating obsolete filesystem checks while preserving all 129 rich curriculum lessons and datasets in `assets/data/lessons/`.

---

## 2. Changes Summary

### 1. File System Cleanup
- **Deleted Directory**: `C:\Users\Heste\OneDrive\Documents\_legacy_backup\lessons\` (95 `.php` stub files + `index.php`).
- **Deleted Scratch Directory**: `C:\Users\Heste\OneDrive\Documents\_legacy_backup\scratch\retired_php_lessons\`.
- **Preserved Core Data**: All 5 high-performance module JSON datasets (`k-math-m1.json` through `k-math-m5.json`) remain securely in `assets/data/lessons/`.

### 2. Router Modernization
- **`levels/k.php`**: Removed legacy fallback checks to `dirname(__DIR__) . '/lessons/' . $requestedLesson . '.php'`. All lesson requests dispatch directly to `src/lesson_renderer.php`.
- **`levels/practice-ged.php`**: Removed obsolete `file_exists($lessonFile)` checks against `/lessons/`, dispatching straight into the dynamic JSON router and scaffolding engine.
- **`src/level_template.php`**: Removed legacy `$lessonFile` check, dispatching requests directly into `$lessonRenderer`.

### 3. Platform Version Elevation
- Bumped platform semantic version to **`v2.9.1`** in:
  - `src/header.php` (`HL_SITE_VERSION`, `HL_SITE_VERSION_DATE`, `HL_SITE_VERSION_LABEL`, `HL_SITE_VERSION_SUMMARY`)
  - `src/footer.php` (Fallback constants and `#footer-version-modal` release feature list)

---

## 3. Verification & Validation Results

1. **Filesystem State**:
   - `Test-Path "lessons"` returned **`False`** (cleanly deleted).
   - `Test-Path "assets\data\lessons"` returned **`True`** (all 5 module datasets intact).
2. **Lesson Resolution Verification**:
   - Automated scan across all 129 lesson IDs referenced in `levels/k.php`:
     - **105** resolved in Module JSON (`k-math-m*.json`).
     - **24** resolved in Central `lessons.json` (ELA, Science, Social).
     - **0** missing.
3. **End-to-End Lesson Rendering**:
   - Every lesson route (`k.php?k-math-m1-a-1`, `k.php?k-math-m2-a-1`, etc.) resolves dynamically without looking for or requiring any `.php` files in root `/lessons/`.
