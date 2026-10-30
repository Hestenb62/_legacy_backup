---
title: "Grade 11 Algebra II Complete 121-Lesson Curriculum Buildout Plan"
date: "2026-10-30"
version: "v2.28.0"
category: "Implementation Plan"
tags: ["Grade 11", "Algebra II", "EngageNY", "Eureka Math", "Curriculum Buildout", "Problem Sets", "Exit Tickets", "A11y", "UDL"]
summary: "Plan for the complete buildout of Grade 11 Algebra II across Modules 1–4 (121 lessons total) from EngageNY materials, compiling module JSON datasets, updating Level M, synchronizing vocabulary, and registering Help Center guidance."
author: "Antigravity & Hesten"
---

# Grade 11 Algebra II Complete 121-Lesson Curriculum Buildout Plan

## 1. Executive Summary & Objective
Following the successful completion of Grade 9 Algebra I and Grade 10 Geometry, this plan directs the end-to-end extraction and platform integration of **Grade 11 Algebra II** (121 lessons total across 4 modules) using the authentic teacher and student materials in `C:\Users\Heste\OneDrive\Documents\P-12 EngageNY - Math\Algebra II`.

Each module will be compiled into a dedicated, high-performance JSON dataset in `assets/data/lessons/` (`m-math-m1.json` through `m-math-m4.json`), establishing Level M ([`levels/m.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/m.php)) as a comprehensive, standards-aligned interactive high school mathematics environment.

---

## 2. Curriculum Scope & Module Breakdown

| Module | Module Title | Topic Breakdown | Lessons | Target JSON Dataset |
| :--- | :--- | :--- | :--- | :--- |
| **Module 1** | Polynomial, Rational, and Radical Relationships | Topics A–D (Base Ten to Base X, Factoring & Radicals, Complex Numbers & Polynomial Identities, Rational Expressions & Equations) | Lessons 1–40 | `assets/data/lessons/m-math-m1.json` |
| **Module 2** | Trigonometric Functions | Topics A–B (The Story of Trigonometry & Contexts, Unit Circle, Graphs, Co-Functions, Identities & Modeling Periodic Motion) | Lessons 1–18 | `assets/data/lessons/m-math-m2.json` |
| **Module 3** | Exponential and Logarithmic Functions | Topics A–E (Real Numbers & Radicals, Logarithms & 'WhatPower', Exponential Modeling, Logarithmic Properties & Inverses, Financial Math & Compounding) | Lessons 1–33 | `assets/data/lessons/m-math-m3.json` |
| **Module 4** | Inferences and Conclusions from Data | Topics A–D (Probability & Two-Way Tables, Modeling Data Distributions & Normal Curves, Drawing Conclusions from Samples, Margin of Error & Simulations) | Lessons 1–30 | `assets/data/lessons/m-math-m4.json` |
| **Total** | **Grade 11 Algebra II** | **4 Modules / 15 Topics** | **121 Lessons** | **4 Master Datasets** |

---

## 3. Data Schema & Component Specifications
Every generated lesson in `m-math-m[1-4].json` will conform strictly to the master schema:
1. **Metadata & CCSS Standards**: Unique lesson ID (`m-math-m[mod]-[topic]-[num]`), standard code (`M.M[mod].[topic].[num]`), official CCSS alignment (e.g. `HSA.APR.C.4`, `HSF.TF.A.2`, `HSF.LE.A.4`, `HSS.IC.A.2`).
2. **Student Outcomes & Teacher Notes**: Verbatim pedagogical focus points and teacher instructional rationale.
3. **Mathematical Vocabulary**: Extracted definitions (e.g., *fundamental theorem of algebra, complex conjugate, radian, amplitude, period, asymptote, natural logarithm, margin of error, standard normal distribution*).
4. **Guided Classwork & Examples**: Step-by-step mathematical examples with LaTeX equation formatting (`$...$`, `$$...$$`).
5. **Embedded Official Problem Sets**: Verbatim practice problems with expandable teacher solution steps and browser printing capabilities (`printProblemSet()`).
6. **Exit Tickets & Solution Keys**: Daily conceptual assessments with official solutions.
7. **Check Understanding Quizzes**: Multiple-choice assessment questions with detailed explanatory feedback.

---

## 4. Platform Architecture & Integration Steps

1. **Extraction & Compilation**:
   - Create and run `scratch/build_grade_11_algebra2.py` to extract text, tables, outcomes, examples, problem sets, and solutions from all 121 teacher & student `.docx` pairs.
   - Output `assets/data/lessons/m-math-m1.json`, `m-math-m2.json`, `m-math-m3.json`, and `m-math-m4.json`.

2. **Course Hub & Lesson Delivery**:
   - Update `levels/m.php` to render all 4 modules, 15 topics, and 121 lesson links, with automatic routing for single lesson viewing (`m.php?m-math-m1-a-1`).
   - Enable Level M outline hydration in `src/level_template.php` (`in_array(strtolower($levelId), ['k', 'l', 'm'])`).

3. **Global Registries & Vocabulary Sync**:
   - Register all 121 lessons into `assets/data/lessons.json` and `assets/data/curriculum-engageny-math.json`.
   - Compile advanced Algebra II terminology into `assets/data/math-vocab.json`.

4. **Documentation, Release & Verification**:
   - Create Help Center guide `assets/text/hc-grade-11-algebra-2-complete.md`.
   - Bump platform release version to `v2.28.0` in `src/header.php` and `src/footer.php`, updating the "What's New" modal.
   - Execute verification tests on sample lessons across all 4 modules.
   - Produce permanent walkthrough document `updates/docs/2026-10-30-grade-11-algebra-2-modules-buildout-walkthrough.md`.

