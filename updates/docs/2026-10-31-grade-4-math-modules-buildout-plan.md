---
title: "Grade 4 (Level F) EngageNY Math Curriculum Buildout Plan"
date: "2026-10-31"
version: "v2.33.0"
category: "Implementation Plan"
tags: ["Grade 4", "Level F", "EngageNY", "Curriculum Buildout", "MathJax", "Worksheets", "Elementary Math"]
summary: "Comprehensive implementation plan to extract, structure, and deploy all 7 modules (153 lessons) of Grade 4 EngageNY Mathematics into Level F with streamlined worksheet-first problem sets and teacher keys."
author: "Antigravity & Hesten"
---

# Grade 4 (Level F) EngageNY Math Curriculum Buildout Plan

## Executive Overview
Following the successful buildout of Grade 5 (Level G), Grade 6 (Level H), Grade 8 (Level J), and High School (Grades 9–12), this plan outlines the end-to-end integration of **Grade 4 Mathematics (Level F)** from the official EngageNY / Eureka Math materials located in `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Grade 4`.

Grade 4 contains **7 comprehensive modules** covering **153 lessons** spanning multi-digit place value and algorithms, metric unit conversions, multi-digit multiplication and division, angle measure and plane figures, fraction equivalence and operations, decimal fractions, and measurement exploration. All lessons will be built following our streamlined worksheet-first architecture, ensuring embedded interactive problem sets, printable worksheets, and full WCAG AA/AAA and MathJax compliance.

---

## 1. Scope & Module Architecture
Grade 4 (Level F) is organized into 7 sequential modules:

| Module | Title | Topics & Lessons | Target File |
| :--- | :--- | :--- | :--- |
| **Module 1** | Place Value, Rounding, and Algorithms for Addition and Subtraction | Topics A–F (19 Lessons) | `assets/data/lessons/f-math-m1.json` |
| **Module 2** | Unit Conversions and Problem Solving with Metric Measurement | Topics A–B (5 Lessons) | `assets/data/lessons/f-math-m2.json` |
| **Module 3** | Multi-Digit Multiplication and Division | Topics A–H (38 Lessons) | `assets/data/lessons/f-math-m3.json` |
| **Module 4** | Angle Measure and Plane Figures | Topics A–D (16 Lessons) | `assets/data/lessons/f-math-m4.json` |
| **Module 5** | Fraction Equivalence, Ordering, and Operations | Topics A–H (41 Lessons) | `assets/data/lessons/f-math-m5.json` |
| **Module 6** | Decimal Fractions | Topics A–E (16 Lessons) | `assets/data/lessons/f-math-m6.json` |
| **Module 7** | Exploring Measurement with Multiplication | Topics A–D (18 Lessons) | `assets/data/lessons/f-math-m7.json` |
| **Total** | **7 Modules** | **37 Topics / 153 Lessons** | **7 Module JSON Datasets** |

---

## 2. Ingestion & Extraction Pipeline
We will implement an automated Python extractor `scratch/build_grade_4_math.py`:
1. **Document Parsing**:
   - Parse unified lesson docx files located across `Grade 4\Module X`.
   - Convert OpenXML Math (`m:oMath`, `m:f`, `m:rad`, `m:sSup`, `m:sSub`) into clean LaTeX formulas (`\frac{}{}`, `\sqrt{}`, `x^{2}`, etc.).
2. **Schema & Resiliency Guarantees**:
   - Guarantee `meta` block (`title`, `pageTitle`, `description`, `pageDescription`, `author`, `badge`, `badgeIcon`).
   - Guarantee `overview` block (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
   - Populate **both** `prompt` and `problem` in each item of `problemSet.problems` to satisfy renderer compatibility.
   - Include guided exercises and conceptual check questions.
3. **Registry Integration**:
   - Update `assets/data/curriculum-engageny-math.json` with the complete `"4th Grade"` hierarchy.
   - Register all 153 lesson identifiers in `assets/data/lessons.json`.

---

## 3. UI, Routing & Template Integration
1. **Router Enhancement (`levels/f.php`)**:
   - Add single-lesson query router (`?lesson=f-math-m1-a-1` or `?f-math-m1-a-1`) with tiered fallback resolution.
   - Define complete `$modules` array representing all 7 modules and 37 topics for native rendering.
   - Fix include path to robust `include dirname(__DIR__) . '/src/level_template.php';`.
2. **Template Hydration (`src/level_template.php`)**:
   - Include `'f'` in the EngageNY math hydration whitelist: `in_array(strtolower($levelId), ['f', 'g', 'h', 'j', 'k', 'l', 'm', 'n'])`.
3. **Renderer Streamlining (`src/lesson_renderer.php`)**:
   - Direct problem set focus, zero research links, and one-click printing (`printProblemSet()`).

---

## 4. Verification & Quality Assurance
- Run CLI PHP rendering tests via `C:\xampp1\php\php.exe` across multiple lessons in each module.
- Verify `levels/f.php` renders cleanly without errors or warnings.
- Create Help Center article `assets/text/hc-grade-4-math-complete.md`.
- Bump platform version to `v2.33.0` in `src/header.php` and `src/footer.php` and document changes in `#footer-version-modal`.
- Publish completion walkthrough: `updates/docs/2026-10-31-grade-4-math-modules-buildout-walkthrough.md`.

