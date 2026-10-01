---
title: "Legacy Root Lessons Folder Removal & Router Simplification Plan"
date: "2026-09-30"
version: "v2.9.1"
category: "Implementation Plan"
tags: ["Lessons", "Architecture", "Cleanup", "Router", "File System"]
summary: "Plan to delete the obsolete root /lessons/ directory containing 95 redundant PHP stubs and streamline level routers directly to src/lesson_renderer.php."
author: "Antigravity & Hesten"
---

# Legacy Root Lessons Folder Removal & Router Simplification Plan

## 1. Overview & Objectives
With the implementation of the Universal Lesson Renderer (`src/lesson_renderer.php`), the consolidated module-level JSON datasets (`assets/data/lessons/k-math-m1.json` through `k-math-m5.json`), and the central lessons registry (`assets/data/lessons.json`), the root `/lessons/` directory containing 95 individual 3-line PHP stub files is completely obsolete and no longer used.

All 129 lessons in Grade 9 (105 Math, 8 ELA, 8 Science, 8 Social) are dynamically resolved in memory and rendered on-demand. Deleting root `/lessons/` cleans up unnecessary filesystem clutter while preserving the core lesson data in `assets/data/lessons/`.

---

## 2. Steps to Execute
1. **Remove Obsolete Root Directory**:
   - Delete `C:\Users\Heste\OneDrive\Documents\_legacy_backup\lessons\` (95 PHP stub files + index.php).
   - Also remove temporary `scratch/retired_php_lessons/`.
2. **Streamline Router Endpoints**:
   - `levels/k.php`: Remove lines 54-60 (fallback to `/lessons/*.php`) and ensure direct invocation of `src/lesson_renderer.php`.
   - `levels/practice-ged.php`: Remove lines 20-27 (fallback to `/lessons/*.php`).
   - `src/level_template.php`: Remove lines 25 & 31-34 (fallback to `/lessons/*.php`), directly routing to `src/lesson_renderer.php`.
3. **Platform Version Bump**:
   - Bump platform release version from `v2.9.0` to `v2.9.1` in `src/header.php` and `src/footer.php`.
   - Update `#footer-version-modal` in `src/footer.php`.
4. **Validation & Verification**:
   - Confirm root `/lessons/` does not exist.
   - Confirm `assets/data/lessons/` remains 100% intact with all 5 module JSON datasets.
   - Execute verification tests on lesson rendering via `src/lesson_renderer.php`.
   - Publish walkthrough documentation in `updates/docs/2026-09-30-delete-legacy-lessons-stubs-walkthrough.md`.
