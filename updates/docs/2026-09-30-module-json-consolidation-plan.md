---
title: "Implementation Plan: Grade 9 Math Module-Level JSON Architecture"
date: "2026-09-30"
version: "v2.8.1"
category: "Implementation Plan"
tags: ["Grade 9", "Mathematics", "Architecture", "JSON Consolidation", "Eureka Math"]
summary: "Consolidate 105 individual lesson JSON files across Grade 9 Algebra I into 5 modular, cohesive module JSON files (k-math-m1.json through k-math-m5.json) with tiered router resolution."
author: "Antigravity & Hesten"
---

# Implementation Plan: Grade 9 Math Module-Level JSON Architecture

## 1. Overview & Objective
Currently, Grade 9 Algebra I maintains 105 individual JSON files in `assets/data/lessons/` (`k-math-m1-a-1.json` to `k-math-m5-b-6.json`). To optimize repository cleanliness, streamline filesystem indexing, improve caching efficiency, and align with the module-centric structure of Eureka Math, we are consolidating all lessons into **5 module-level JSON files**:
- `assets/data/lessons/k-math-m1.json` (28 lessons)
- `assets/data/lessons/k-math-m2.json` (20 lessons)
- `assets/data/lessons/k-math-m3.json` (24 lessons)
- `assets/data/lessons/k-math-m4.json` (24 lessons)
- `assets/data/lessons/k-math-m5.json` (9 lessons)

The dynamic lesson loaders in `levels/k.php` and `src/lesson_renderer.php` will be updated with tiered resolution to seamlessly load lessons from their parent module files with zero breaking changes.

---

## 2. Technical Design & Schema

### Module JSON File Structure
Each module file encapsulates the module's metadata alongside a map of all its lessons:

```json
{
  "id": "k-math-m1",
  "module": 1,
  "subject": "math",
  "grade": "9",
  "title": "Module 1: Relationships Between Quantities and Reasoning with Equations",
  "description": "Reasoning with equations and their graphs, setting the foundation for high school algebra.",
  "lessonsCount": 28,
  "lessons": {
    "k-math-m1-a-1": { /* Complete lesson object with overview, guidedExercises, problemSet, exitTicket, etc. */ },
    "k-math-m1-a-2": { /* ... */ }
  }
}
```

### Tiered Router Resolution Pipeline
When a lesson is requested (e.g., `?k-math-m2-a-1`):
1. **Module-Level Lookup (Primary):**
   - Parse `$requestedLesson` into parts (`level = k`, `subj = math`, `mod = m2`).
   - Construct `$moduleKey = "{$parts[0]}-{$parts[1]}-{$parts[2]}"` (e.g. `k-math-m2`).
   - Check if `assets/data/lessons/{$moduleKey}.json` exists.
   - If found, load the file and retrieve `$lesson = $modData['lessons'][$requestedLesson]`.
2. **Standalone Lesson Lookup (Fallback):**
   - Check `assets/data/lessons/{$requestedLesson}.json`.
3. **Master Lessons Registry (Fallback):**
   - Check `assets/data/lessons.json` -> `$data['lessons'][$requestedLesson]`.
4. **Dynamic Curriculum Scaffolder (Safety Net):**
   - Render standard-aligned intelligent scaffold if no custom data exists.

---

## 3. Implementation Steps

1. **Module Bundling Engine (`scratch/consolidate_module_jsons.py`):**
   - Read all individual JSON files in `assets/data/lessons/k-math-*.json`.
   - Group by module (`k-math-m1`, `k-math-m2`, `k-math-m3`, `k-math-m4`, `k-math-m5`).
   - Write formatted JSON files to `assets/data/lessons/k-math-m{1..5}.json`.
   - Remove the 105 individual files once verified.
2. **Update Dynamic Single-Lesson Routers:**
   - Update `levels/k.php` to check module-level JSONs first.
   - Update `src/lesson_renderer.php` to check module-level JSONs first.
3. **Update Vocabulary Aggregator:**
   - Update `scratch/compile_math_vocab.py` to inspect module JSON files (`k-math-m*.json`) and crawl all child lessons.
   - Re-compile `assets/data/math-vocab.json`.
4. **Testing & Verification:**
   - Run PHP CLI syntax validation on all touched files.
   - Run isolated render tests across sample lessons from all 5 modules.
   - Verify `pages/math-vocab.php` loads all 195 vocabulary terms with valid links.
5. **Platform Version Bump & Documentation:**
   - Bump version to `v2.8.1` in `src/header.php` and `src/footer.php`.
   - Write walkthrough report in `updates/docs/2026-09-30-module-json-consolidation-walkthrough.md`.
