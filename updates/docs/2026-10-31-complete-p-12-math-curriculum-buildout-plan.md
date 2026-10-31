---
title: "Complete P-12 EngageNY Mathematics Curriculum Buildout Plan"
date: "2026-10-31"
version: "v2.34.0"
category: "Implementation Plan"
tags: ["Elementary Math", "EngageNY", "Curriculum Buildout", "MathJax", "Worksheets", "P-12"]
summary: "Comprehensive master implementation plan to extract, structure, and deploy all remaining elementary grades (Grade 3, Grade 2, Grade 1, Kindergarten, Prekindergarten) to achieve 100% full-spectrum P-12 EngageNY Mathematics coverage across Levels A through N."
author: "Antigravity & Hesten"
---

# Complete P-12 EngageNY Mathematics Curriculum Buildout Plan

## Executive Overview
With High School (Grades 9–12: 453 lessons), Middle School (Grades 6 & 8: 265 lessons), and Upper Elementary (Grades 4 & 5: 302 lessons) complete—totaling **1,020 lessons** across 44 modules—this plan governs the completion of all remaining elementary and early childhood mathematics grades:
1. **Grade 3 (Level E)**: Modules 1–7 (152 Lessons)
2. **Grade 2 (Level D)**: Modules 1–8 (149 Lessons)
3. **Grade 1 (Level C)**: Modules 1–6 (153 Lessons)
4. **Kindergarten (Level B)**: Modules 1–6 (152 Lessons)
5. **Prekindergarten (Level A)**: Modules 1–5 (146 Lessons)

Upon completion of this phase, Hesten's Learning will achieve **100% full-spectrum P-12 Mathematics curriculum coverage** with over **1,770 authentic EngageNY / Eureka Math lessons** formatted into our clean, distraction-free worksheet-first architecture.

---

## 1. Scope & Target Datasets

| Grade Level | Platform Level | Modules & Lessons | Target Files |
| :--- | :--- | :--- | :--- |
| **Grade 3** | Level E (`levels/e.php`) | Modules 1–7 (152 Lessons) | `assets/data/lessons/e-math-m1.json` to `m7.json` |
| **Grade 2** | Level D (`levels/d.php`) | Modules 1–8 (149 Lessons) | `assets/data/lessons/d-math-m1.json` to `m8.json` |
| **Grade 1** | Level C (`levels/c.php`) | Modules 1–6 (153 Lessons) | `assets/data/lessons/c-math-m1.json` to `m6.json` |
| **Kindergarten** | Level B (`levels/b.php`) | Modules 1–6 (152 Lessons) | `assets/data/lessons/b-math-m1.json` to `m6.json` |
| **Pre-K** | Level A (`levels/a.php`) | Modules 1–5 (146 Lessons) | `assets/data/lessons/a-math-m1.json` to `m5.json` |
| **Total Remaining** | **5 Grade Levels** | **32 Modules / 752 Lessons** | **32 Module JSON Datasets** |

---

## 2. Ingestion & Extraction Architecture
We will build a high-throughput, unified batch extractor `scratch/build_all_elementary_math.py` that processes each grade level systematically:
1. **Document Parsing**:
   - Recursively discover and parse lesson docx files across `Grade 3`, `Grade 2`, `Grade 1`, `Kindergarten`, and `Prekindergarten`.
   - Convert OpenXML Math (`m:oMath`, `m:f`, `m:rad`, `m:sSup`, `m:sSub`) into clean LaTeX formulas (`\frac{}{}`, `\sqrt{}`, etc.).
2. **Schema & Resiliency Guarantees**:
   - Guarantee `meta` block (`title`, `pageTitle`, `description`, `pageDescription`, `author`, `badge`, `badgeIcon`).
   - Guarantee `overview` block (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
   - Populate **both** `prompt` and `problem` in each item of `problemSet.problems` to satisfy renderer compatibility.
   - Include guided exercises and conceptual check questions.
3. **Registry Integration**:
   - Register all 5 grades into `assets/data/curriculum-engageny-math.json` under `"3rd Grade"`, `"2nd Grade"`, `"1st Grade"`, `"Kindergarten"`, and `"Pre-K"`.
   - Register all 752 lesson identifiers in `assets/data/lessons.json`.

---

## 3. UI, Routing & Template Integration
1. **Router Enhancement (`levels/[a-e].php`)**:
   - Add single-lesson query router (`?lesson=<level>-math-m...` or `?<level>-math-m...`) with tiered fallback resolution across `levels/a.php`, `levels/b.php`, `levels/c.php`, `levels/d.php`, and `levels/e.php`.
   - Generate full native `$modules` arrays detailing all modules and topics.
   - Fix include path to robust `include dirname(__DIR__) . '/src/level_template.php';`.
2. **Template Hydration (`src/level_template.php`)**:
   - Hydrate across all levels: `in_array(strtolower($levelId), ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n'])`.
3. **Renderer Streamlining (`src/lesson_renderer.php`)**:
   - Pure problem set focus, zero research links, and one-click printing (`printProblemSet()`).

---

## 4. Verification & Quality Assurance
- Run CLI PHP rendering tests via `C:\xampp1\php\php.exe` across sample lessons in every single grade.
- Verify `levels/a.php`, `levels/b.php`, `levels/c.php`, `levels/d.php`, and `levels/e.php` render cleanly without errors.
- Create companion Help Center articles:
  - `assets/text/hc-grade-3-math-complete.md`
  - `assets/text/hc-grade-2-math-complete.md`
  - `assets/text/hc-grade-1-math-complete.md`
  - `assets/text/hc-kindergarten-math-complete.md`
  - `assets/text/hc-pre-k-math-complete.md`
- Bump platform version to `v2.34.0` in `src/header.php` and `src/footer.php` and document changes in `#footer-version-modal`.
- Publish completion walkthrough: `updates/docs/2026-10-31-complete-p-12-math-curriculum-buildout-walkthrough.md`.

