---
title: "Grade 8 (Level J) EngageNY Math Curriculum Buildout Plan"
date: "2026-10-31"
version: "v2.30.0"
category: "Implementation Plan"
tags: ["Grade 8", "Level J", "EngageNY", "Curriculum Buildout", "MathJax", "Worksheets"]
summary: "Comprehensive implementation plan to extract, structure, and deploy all 7 modules (124 lessons) of Grade 8 EngageNY Mathematics into Level J with streamlined worksheet-first problem sets and teacher keys."
author: "Antigravity & Hesten"
---

# Grade 8 (Level J) EngageNY Math Curriculum Buildout Plan

## Executive Overview
Following the successful buildout of high school mathematics (Grade 9 Algebra I, Grade 10 Geometry, Grade 11 Algebra II, Grade 12 Precalculus), this plan outlines the end-to-end integration of **Grade 8 Mathematics (Level J)** from the official EngageNY / Eureka Math materials located in `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Grade 8`.

Grade 8 contains **7 comprehensive modules** covering **124 lessons** across integer exponents, scientific notation, rigid transformations, congruence, similarity, linear equations, bivariate data, and irrational numbers. All lessons will be built following our streamlined worksheet-first architecture, ensuring embedded interactive problem sets, printable worksheets, and full WCAG AA/AAA and MathJax compliance.

---

## 1. Scope & Module Architecture
Grade 8 (Level J) is organized into 7 sequential modules:

| Module | Title | Topics & Lessons | Target File |
| :--- | :--- | :--- | :--- |
| **Module 1** | Integer Exponents and Scientific Notation | Topics A–B (15 Lessons) | `assets/data/lessons/j-math-m1.json` |
| **Module 2** | The Concept of Congruence | Topics A–D (16 Lessons) | `assets/data/lessons/j-math-m2.json` |
| **Module 3** | Similarity | Topics A–C (14 Lessons) | `assets/data/lessons/j-math-m3.json` |
| **Module 4** | Linear Equations | Topics A–E (31 Lessons) | `assets/data/lessons/j-math-m4.json` |
| **Module 5** | Examples of Functions from Geometry | Topics A–B (11 Lessons) | `assets/data/lessons/j-math-m5.json` |
| **Module 6** | Linear Functions | Topics A–D (14 Lessons) | `assets/data/lessons/j-math-m6.json` |
| **Module 7** | Introduction to Irrational Numbers Using Geometry | Topics A–D (23 Lessons) | `assets/data/lessons/j-math-m7.json` |
| **Total** | **7 Modules** | **22 Topics / 124 Lessons** | **7 Module JSON Datasets** |

---

## 2. Ingestion & Extraction Pipeline
We will implement an automated Python extractor `scratch/build_grade_8_math.py`:
1. **Document Parsing**:
   - Parse paired teacher and student docx files from `Grade 8\Module X\math-g8-mX-teacher-materials` and `Grade 8\Module X\math-g8-mX-student-materials`.
   - Convert OpenXML Math (`m:oMath`, `m:f`, `m:rad`, `m:sSup`, `m:sSub`) into clean LaTeX formulas (`\frac{}{}`, `\sqrt{}`, `x^{2}`, etc.).
2. **Schema & Resiliency Guarantees**:
   - Guarantee `meta` block (`title`, `pageTitle`, `description`, `pageDescription`, `author`, `badge`, `badgeIcon`).
   - Guarantee `overview` block (`title`, `pill`, `text`, `outcomes`, `teacherInsight`).
   - Populate **both** `prompt` and `problem` in each item of `problemSet.problems` to satisfy renderer compatibility.
   - Include guided exercises and conceptual check questions.
3. **Registry Integration**:
   - Update `assets/data/curriculum-engageny-math.json` with the complete `"8th Grade"` hierarchy.
   - Register all 124 lesson identifiers in `assets/data/lessons.json`.
   - Ingest Grade 8 mathematical vocabulary terms into `assets/data/math-vocab.json`.

---

## 3. UI, Routing & Template Integration
1. **Router Enhancement (`levels/j.php`)**:
   - Add single-lesson query router (`?lesson=j-math-m1-a-1` or `?j-math-m1-a-1`) with tiered fallback resolution.
   - Define complete `$modules` array representing all 7 modules and 22 topics for native rendering.
   - Fix include path to robust `include dirname(__DIR__) . '/src/level_template.php';`.
2. **Template Hydration (`src/level_template.php`)**:
   - Include `'j'` in the EngageNY math hydration whitelist: `in_array(strtolower($levelId), ['k', 'l', 'm', 'n', 'j'])`.
3. **Renderer Streamlining (`src/lesson_renderer.php`)**:
   - Maintain the streamlined worksheet layout: direct problem set focus, zero research links, and one-click printing (`printProblemSet()`).

---

## 4. Verification & Quality Assurance
- Run CLI PHP rendering tests via `C:\xampp1\php\php.exe` across multiple lessons in each module.
- Verify `levels/j.php` renders cleanly without errors or warnings.
- Verify MathJax typesetting and responsive worksheet container reflow.
- Create Help Center article `assets/text/hc-grade-8-math-complete.md`.
- Bump platform version to `v2.30.0` in `src/header.php` and `src/footer.php` and document changes in `#footer-version-modal`.
- Publish completion walkthrough: `updates/docs/2026-10-31-grade-8-math-modules-buildout-walkthrough.md`.

