---
title: "Grade 5 (Level G) EngageNY Math Curriculum Buildout Plan"
date: "2026-10-31"
version: "v2.32.0"
category: "Implementation Plan"
tags: ["Grade 5", "Level G", "EngageNY", "Curriculum Buildout", "MathJax", "Worksheets", "Elementary Math"]
summary: "Comprehensive implementation plan to extract, structure, and deploy all 6 modules (149 lessons) of Grade 5 EngageNY Mathematics into Level G with streamlined worksheet-first problem sets and teacher keys."
author: "Antigravity & Hesten"
---

# Grade 5 (Level G) EngageNY Math Curriculum Buildout Plan

## Executive Overview
Following the successful buildout of middle school mathematics (Grade 8 Level J, Grade 6 Level H) and high school mathematics (Grades 9–12), this plan outlines the end-to-end integration of **Grade 5 Mathematics (Level G)** from the official EngageNY / Eureka Math materials located in `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Grade 5`.

Grade 5 contains **6 comprehensive modules** covering **149 lessons** across place value, decimal fractions, multi-digit operations, fraction arithmetic, volume, area, and coordinate plane problem solving. All lessons will be built following our streamlined worksheet-first architecture, ensuring embedded interactive problem sets, printable worksheets, and full WCAG AA/AAA and MathJax compliance.

---

## 1. Scope & Module Architecture
Grade 5 (Level G) is organized into 6 sequential modules:

| Module | Title | Topics & Lessons | Target File |
| :--- | :--- | :--- | :--- |
| **Module 1** | Place Value and Decimal Fractions | Topics A–F (16 Lessons) | `assets/data/lessons/g-math-m1.json` |
| **Module 2** | Multi-Digit Whole Number and Decimal Fraction Operations | Topics A–H (29 Lessons) | `assets/data/lessons/g-math-m2.json` |
| **Module 3** | Addition and Subtraction of Fractions | Topics A–D (16 Lessons) | `assets/data/lessons/g-math-m3.json` |
| **Module 4** | Multiplication and Division of Fractions and Decimal Fractions | Topics A–H (33 Lessons) | `assets/data/lessons/g-math-m4.json` |
| **Module 5** | Addition and Multiplication with Volume and Area | Topics A–D (21 Lessons) | `assets/data/lessons/g-math-m5.json` |
| **Module 6** | Problem Solving with the Coordinate Plane | Topics A–F (34 Lessons) | `assets/data/lessons/g-math-m6.json` |
| **Total** | **6 Modules** | **34 Topics / 149 Lessons** | **6 Module JSON Datasets** |

---

## 2. Ingestion & Extraction Pipeline
We will implement an automated Python extractor `scratch/build_grade_5_math.py`:
1. **Document Parsing**:
   - Parse unified lesson docx files located in `Grade 5\Module X\Math G5-MX Lessons\Math-G5-MX-Topic-Y-Lessons\math-g5-mX-topic-y-lesson-Z.docx`.
   - Convert OpenXML Math (`m:oMath`, `m:f`, `m:rad`, `m:sSup`, `m:sSub`) into clean LaTeX formulas (`\frac{}{}`, `\sqrt{}`, `x^{2}`, etc.).
2. **Schema & Resiliency Guarantees**:
   - Guarantee `meta` block (`title`, `pageTitle`, `description`, `pageDescription`, `author`, `badge`, `badgeIcon`).
   - Guarantee `overview` block (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
   - Populate **both** `prompt` and `problem` in each item of `problemSet.problems` to satisfy renderer compatibility.
   - Include guided exercises and conceptual check questions.
3. **Registry Integration**:
   - Update `assets/data/curriculum-engageny-math.json` with the complete `"5th Grade"` hierarchy.
   - Register all 149 lesson identifiers in `assets/data/lessons.json`.

---

## 3. UI, Routing & Template Integration
1. **Router Enhancement (`levels/g.php`)**:
   - Add single-lesson query router (`?lesson=g-math-m1-a-1` or `?g-math-m1-a-1`) with tiered fallback resolution.
   - Define complete `$modules` array representing all 6 modules and 34 topics for native rendering.
   - Fix include path to robust `include dirname(__DIR__) . '/src/level_template.php';`.
2. **Template Hydration (`src/level_template.php`)**:
   - Include `'g'` in the EngageNY math hydration whitelist: `in_array(strtolower($levelId), ['g', 'h', 'j', 'k', 'l', 'm', 'n'])`.
3. **Renderer Streamlining (`src/lesson_renderer.php`)**:
   - Direct problem set focus, zero research links, and one-click printing (`printProblemSet()`).

---

## 4. Verification & Quality Assurance
- Run CLI PHP rendering tests via `C:\xampp1\php\php.exe` across multiple lessons in each module.
- Verify `levels/g.php` renders cleanly without errors or warnings.
- Create Help Center article `assets/text/hc-grade-5-math-complete.md`.
- Bump platform version to `v2.32.0` in `src/header.php` and `src/footer.php` and document changes in `#footer-version-modal`.
- Publish completion walkthrough: `updates/docs/2026-10-31-grade-5-math-modules-buildout-walkthrough.md`.

