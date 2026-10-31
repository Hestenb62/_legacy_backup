---
title: "Grade 6 (Level H) EngageNY Math Curriculum Buildout Plan"
date: "2026-10-31"
version: "v2.31.0"
category: "Implementation Plan"
tags: ["Grade 6", "Level H", "EngageNY", "Curriculum Buildout", "MathJax", "Worksheets"]
summary: "Comprehensive implementation plan to extract, structure, and deploy all 6 modules (143 lessons) of Grade 6 EngageNY Mathematics into Level H with streamlined worksheet-first problem sets and teacher keys."
author: "Antigravity & Hesten"
---

# Grade 6 (Level H) EngageNY Math Curriculum Buildout Plan

## Executive Overview
Following the successful completion of Grade 8 (Level J), this plan covers the complete integration of **Grade 6 Mathematics (Level H)** from the official EngageNY / Eureka Math materials located in `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Grade 6`.

Grade 6 contains **6 comprehensive modules** covering **143 lessons** spanning ratios, unit rates, fraction and decimal operations, negative numbers and rational numbers on the coordinate plane, expressions and equations, area/volume/surface area, and statistical distributions. All lessons will be built following our streamlined worksheet-first architecture, ensuring embedded interactive problem sets, printable worksheets, and full WCAG AA/AAA and MathJax compliance.

---

## 1. Scope & Module Architecture
Grade 6 (Level H) is organized into 6 sequential modules:

| Module | Title | Topics & Lessons | Target File |
| :--- | :--- | :--- | :--- |
| **Module 1** | Ratios and Unit Rates | Topics A–D (29 Lessons) | `assets/data/lessons/h-math-m1.json` |
| **Module 2** | Arithmetic Operations Including Division of Fractions | Topics A–D (19 Lessons) | `assets/data/lessons/h-math-m2.json` |
| **Module 3** | Rational Numbers | Topics A–C (19 Lessons) | `assets/data/lessons/h-math-m3.json` |
| **Module 4** | Expressions and Equations | Topics A–H (34 Lessons) | `assets/data/lessons/h-math-m4.json` |
| **Module 5** | Area, Surface Area, and Volume Problems | Topics A–D (20 Lessons, incl. 19A) | `assets/data/lessons/h-math-m5.json` |
| **Module 6** | Statistics | Topics A–D (22 Lessons) | `assets/data/lessons/h-math-m6.json` |
| **Total** | **6 Modules** | **27 Topics / 143 Lessons** | **6 Module JSON Datasets** |

---

## 2. Ingestion & Extraction Pipeline
We will implement an automated Python extractor `scratch/build_grade_6_math.py`:
1. **Document Parsing**:
   - Parse paired teacher and student docx files from `Grade 6\Module X\math-g6-mX-teacher-materials` and `Grade 6\Module X\math-g6-mX-student-materials` (filtering out temporary lock files starting with `~$`).
   - Convert OpenXML Math (`m:oMath`, `m:f`, `m:rad`, `m:sSup`, `m:sSub`) into clean LaTeX formulas (`\frac{}{}`, `\sqrt{}`, `x^{2}`, etc.).
2. **Schema & Resiliency Guarantees**:
   - Guarantee `meta` block (`title`, `pageTitle`, `description`, `pageDescription`, `author`, `badge`, `badgeIcon`).
   - Guarantee `overview` block (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
   - Populate **both** `prompt` and `problem` in each item of `problemSet.problems` to satisfy renderer compatibility.
   - Include guided exercises and conceptual check questions.
3. **Registry Integration**:
   - Update `assets/data/curriculum-engageny-math.json` with the complete `"6th Grade"` hierarchy.
   - Register all 143 lesson identifiers in `assets/data/lessons.json`.

---

## 3. UI, Routing & Template Integration
1. **Router Enhancement (`levels/h.php`)**:
   - Add single-lesson query router (`?lesson=h-math-m1-a-1` or `?h-math-m1-a-1`) with tiered fallback resolution.
   - Define complete `$modules` array representing all 6 modules and 27 topics for native rendering.
   - Fix include path to robust `include dirname(__DIR__) . '/src/level_template.php';`.
2. **Template Hydration (`src/level_template.php`)**:
   - Include `'h'` in the EngageNY math hydration whitelist: `in_array(strtolower($levelId), ['h', 'j', 'k', 'l', 'm', 'n'])`.
3. **Renderer Streamlining (`src/lesson_renderer.php`)**:
   - Direct problem set focus, zero research links, and one-click printing (`printProblemSet()`).

---

## 4. Verification & Quality Assurance
- Run CLI PHP rendering tests via `C:\xampp1\php\php.exe` across multiple lessons in each module.
- Verify `levels/h.php` renders cleanly without errors or warnings.
- Create Help Center article `assets/text/hc-grade-6-math-complete.md`.
- Bump platform version to `v2.31.0` in `src/header.php` and `src/footer.php` and document changes in `#footer-version-modal`.
- Publish completion walkthrough: `updates/docs/2026-10-31-grade-6-math-modules-buildout-walkthrough.md`.

