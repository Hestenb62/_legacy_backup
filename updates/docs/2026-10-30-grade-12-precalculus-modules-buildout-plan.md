---
title: "Grade 12 Precalculus Complete 111-Lesson Curriculum Buildout Plan"
date: "2026-10-30"
version: "v2.29.0"
category: "Implementation Plan"
tags: ["Grade 12", "Precalculus", "EngageNY", "Eureka Math", "Curriculum Buildout", "Problem Sets", "Worksheets", "A11y", "UDL"]
summary: "Plan for the complete buildout of Grade 12 Precalculus across Modules 1–5 (111 lessons total) from EngageNY materials, compiling module JSON datasets, updating Level N, streamlining math lessons exclusively to worksheets, and synchronizing platform codices."
author: "Antigravity & Hesten"
---

# Grade 12 Precalculus Complete 111-Lesson Curriculum Buildout Plan

## 1. Executive Summary & Objective
Following the completion of Grade 10 Geometry (117 lessons) and Grade 11 Algebra II (120 lessons), this plan directs the end-to-end extraction and platform integration of **Grade 12 Precalculus** (111 lessons across all 5 modules) from `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Precalculus`.

In accordance with user instructions, the math lessons are streamlined specifically to focus on the authentic curriculum worksheets (Problem Sets with comprehensive exercise prompts, student work areas, print stylesheets, and teacher solution keys), eliminating research links and extraneous cognitive overhead.

---

## 2. Curriculum Scope & Module Breakdown

| Module | Title | Topic Breakdown | Lessons | Target JSON |
| :--- | :--- | :--- | :--- | :--- |
| **Module 1** | Complex Numbers and Transformations | Topics A–C (Question of Linearity, Complex Number Operations as Transformations, Matrices & Notation) | Lessons 1–30 | `assets/data/lessons/n-math-m1.json` |
| **Module 2** | Vectors and Matrices | Topics A–E (Networks & Matrices, Linear Transformations of Planes/Space, Systems of Linear Equations, Vectors in Plane & Space, Projection Matrices in 3D) | Lessons 1–27 | `assets/data/lessons/n-math-m2.json` |
| **Module 3** | Rational and Exponential Functions | Topics A–C (Fundamental Theorem of Algebra, Rational Functions & Composition, Inverse Functions & Logarithmic Problem Solving) | Lessons 1–21 | `assets/data/lessons/n-math-m3.json` |
| **Module 4** | Trigonometry | Topics A–C (Trigonometric Functions, Trigonometry and Triangles / Law of Sines & Cosines, Inverse Trigonometric Functions) | Lessons 1–14 | `assets/data/lessons/n-math-m4.json` |
| **Module 5** | Probability and Statistics | Topics A–C (Combinatorics & Probability Rules, Random Variables & Discrete Distributions, Expected Value & Decision Analysis) | Lessons 1–19 | `assets/data/lessons/n-math-m5.json` |
| **Total** | **Grade 12 Precalculus Full Course** | **5 Modules / 17 Topics** | **111 Lessons** | **5 Master Datasets** |

---

## 3. Data Schema & Component Specifications
Every generated lesson in `n-math-m[1-5].json` adheres to the master schema:
1. **Metadata & CCSS Standards**: Unique lesson ID (`n-math-m[mod]-[topic]-[num]`), standard code (`N.M[mod].[topic].[num]`), official CCSS Plus/Advanced alignments (e.g. `HSN.CN.B.4`, `HSN.VM.C.8`, `HSA.REI.C.9`, `HSF.TF.C.9`, `HSS.MD.B.5`).
2. **Student Outcomes & Pedagogical Insights**: Verbatim pedagogical focus points and teacher instructional rationale.
3. **Embedded Official Problem Sets**: Comprehensive student worksheet exercises with MathJax LaTeX typography, student working textareas, print support (`printProblemSet()`), and expandable teacher solution keys.
4. **Streamlined UI Architecture**: Research links removed; lesson view centered strictly on the interactive practice worksheet.

---

## 4. Platform Architecture & Integration Steps
1. **Extraction Pipeline**: Run `scratch/build_grade_12_precalculus.py` to compile `assets/data/lessons/n-math-m1.json` through `n-math-m5.json`.
2. **Course Hub & Routing**: Update `levels/n.php` with all 5 modules, 17 topics, and 111 lesson links, with direct query routing (`n.php?n-math-m1-a-1`).
3. **Template Outline Hydration**: Update `src/level_template.php` to include Level N (`['k', 'l', 'm', 'n']`).
4. **Registries & Vocabulary**: Sync 111 lessons into `assets/data/lessons.json` and `assets/data/curriculum-engageny-math.json`, and compile advanced Precalculus concepts into `assets/data/math-vocab.json`.
5. **Help Center & Release Sync**: Create `assets/text/hc-grade-12-precalculus-complete.md`, bump platform release to `v2.29.0`, and update `#footer-version-modal` in `src/footer.php`.
6. **Testing & Walkthrough**: Execute test verification script and save `updates/docs/2026-10-30-grade-12-precalculus-modules-buildout-walkthrough.md`.

