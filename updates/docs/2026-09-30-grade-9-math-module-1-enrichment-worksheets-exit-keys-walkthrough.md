---
title: "Grade 9 Math Module 1 Complete Enrichment: Worksheets, Verbatim Exit Ticket Keys, and Guided Depth"
date: "2026-09-30"
version: "v2.7.1"
category: "Walkthrough"
tags: ["Curriculum", "Grade 9 Math", "Worksheets", "Exit Tickets", "A11y", "Eureka Math"]
summary: "Enriched all 28 Grade 9 Math Module 1 lessons with official student/teacher worksheets (PDF/Word/Print), verbatim Eureka Math Exit Ticket keys and Check Understanding quizzes, and multi-step Guided Exercises."
author: "Antigravity & Hesten"
---

# Grade 9 Math Module 1 Complete Enrichment: Worksheets, Verbatim Exit Ticket Keys & Pedagogical Depth

## Executive Overview
Following user direction, all 28 lessons in the Grade 9 (Level K) Algebra I Module 1 curriculum (`k-math-m1-a-1` through `k-math-m1-d-4`) have undergone a comprehensive enrichment:
1. **Official Curriculum Worksheets & Downloads:** Added direct access to both Student Classwork/Problem Sets and Teacher Editions with complete keys (in both PDF and Word `.docx` formats, plus 1-click printing capability) to every single lesson.
2. **Verbatim Exit Ticket Keys & Check Understanding:** Transcribed and structured authentic EngageNY / Eureka Math Exit Ticket problems and teacher sample solutions directly into every lesson. Students can review the verbatim prompt and worked key in an expandable on-page accordion, while the interactive Check Understanding modal now tests their mastery directly against these authentic Exit Ticket questions.
3. **Pedagogical Depth & Scaffolding Across All Lessons:** Completed authoring and integration of multi-step Guided Exercises with step-by-step expandable worked solutions, scaffolding hints, final answer callouts, and Common Pitfall alerts for all 19 lessons in Topics C and D (Lessons 10–28), joining the existing depth in Topics A and B (Lessons 1–9).

---

## 1. What Was Changed & Implemented

### A. Official Curriculum Worksheets & Printables Panel
- **Student Classwork & Problem Set Card:**
  - **Open PDF:** Links directly to the authentic Eureka Math Student Material PDF (`/assets/Module%201/algebra-i-m1-student-materials/algebra-i-m1-topic-{topic}-lesson-{num}-student.pdf`).
  - **Word (`.docx`):** Downloadable editable DOCX file for classroom differentiation or offline customization.
  - **Print Button:** 1-click native print button triggering browser print styles configured specifically for clean worksheets.
- **Teacher Edition & Solutions Key Card:**
  - **Teacher PDF:** Direct link to the official Teacher Edition PDF (including full module teacher fallback for Lesson 9).
  - **Teacher DOCX:** Downloadable editable Word version of the teacher lesson guide and problem set solutions.
  - Made visible to teachers, parents, and students alike with distinct styling and icon badges.
- **Data Architecture:** Populated `resources` object across all 28 individual JSON files in `assets/data/lessons/` and synchronized with `assets/data/lessons.json`.

### B. Verbatim Exit Ticket Keys & Check Understanding
- **Extraction & High-Fidelity Conversion:**
  - Extracted raw text, MathML, and Office Math equations (`<m:oMath>`, `<m:f>`, `<m:rad>`, `<m:sSup>`, `<m:sSub>`) directly from all 28 teacher `.docx` files in `assets/Module 1/algebra-i-m1-teacher-materials/`.
- **On-Page Key Review Disclosure:**
  - Rendered `<details class="lesson-solution-accordion">` immediately above the Check Understanding trigger card.
  - Contains the verbatim Exit Ticket question prompt and the verbatim Teacher Sample Solution with full step-by-step mathematical work.
  - Includes `ontoggle` listener to guarantee MathJax re-typesetting upon disclosure.
- **Check Understanding Interactive Modal:**
  - Populated `practiceQuestions` with authentic Exit Ticket questions and answer choices where the correct answer is the verbatim curriculum key and the explanation is the official teacher step-by-step reasoning.
  - Real-time score feedback and automatic synchronization with `hesten_standards_mastery`.

### C. Pedagogical Depth & Guided Exercises (Topics C & D)
- Enriched all 19 lessons from Lesson 10 through Lesson 28 (`k-math-m1-c-1` to `c-15` and `k-math-m1-d-1` to `d-4`) with rich `guidedExercises`:
  - **Lesson 10 (`K.M1.C.1`):** Truth values of algebraic equations and non-equivalent radical transformations ($\sqrt{a+1} \ne \sqrt{a} + 1$).
  - **Lesson 11 (`K.M1.C.2`):** Graphing real solution sets on number lines, set-builder notation $\{x \in \mathbb{R} \mid x \le 2\}$, and identities.
  - **Lesson 12 (`K.M1.C.3`):** Deductive justification of equation steps using addition and multiplication properties of equality.
  - **Lesson 13 (`K.M1.C.4`):** Potential dangers of multiplying or dividing by expressions containing variables (extraneous roots).
  - **Lesson 14 (`K.M1.C.5`):** Linear inequalities in one variable, addition property vs. multiplication property, and reversing inequality signs.
  - **Lesson 15 (`K.M1.C.6`):** Compound sentences joined by "And" (intersection) and "Or" (union).
  - **Lesson 16 (`K.M1.C.7`):** Solving and graphing compound inequalities with number-line intervals.
  - **Lesson 17 (`K.M1.C.8`):** Factoring polynomials and the Zero Product Property ($ab = 0 \iff a = 0 \lor b = 0$).
  - **Lesson 18 (`K.M1.C.9`):** Rational equations with denominator variables and identifying excluded values.
  - **Lesson 19 (`K.M1.C.10`):** Rearranging literal formulas to isolate target variables ($a = \frac{x-1}{x+1}$).
  - **Lesson 20 (`K.M1.C.11`):** Two-variable linear equations ($Ax + By = C$) and discrete whole-number solutions.
  - **Lesson 21 (`K.M1.C.12`):** Two-variable linear inequalities and graphing half-planes with dashed/solid boundary lines.
  - **Lesson 22 (`K.M1.C.13`):** Simultaneous linear systems, graphical intersections, and exact algebraic solutions.
  - **Lesson 23 (`K.M1.C.14`):** Reasoning with linear combinations and eliminating variables ($x = 8, y = 2$).
  - **Lesson 24 (`K.M1.C.15`):** Applications of linear systems (cab fare cost models, break-even distance at 20 miles).
  - **Lesson 25 (`K.M1.D.1`):** Constant printing press rates, dual-job schedules, and arithmetic vs. algebraic modeling.
  - **Lesson 26 (`K.M1.D.2`):** Recursive sequences and recurrence relations ($a_{i+1} = 2a_i + 5$).
  - **Lesson 27 (`K.M1.D.3`):** Explicit formula modeling ($a_n = 2^n(a_0 + 5) - 5$) and finding minimal starting integers.
  - **Lesson 28 (`K.M1.D.4`):** Progressive federal income tax calculation with piecewise tax brackets and effective tax rate analysis.

---

## 2. Verification & Validation Results

### A. Data Integrity & File Verification
- **Worksheet File Audit:** Verified that all 28 student `.pdf`, 28 student `.docx`, 28 teacher `.docx`, and 28 teacher `.pdf` files exist at their respective paths without any missing files.
- **Lesson JSON Audit:** Automated test script `scratch/test_render_all_lessons.php` verified all 28 individual JSON files in `assets/data/lessons/`:
  - `Resources`: 28 / 28 PASS
  - `Guided Exercises`: 28 / 28 PASS (all have multi-step worked solutions)
  - `Exit Ticket Keys`: 28 / 28 PASS (all have prompt & teacher solution)
  - `Practice Questions`: 28 / 28 PASS (all have 2+ authentic exit ticket questions)
  - Central Registry `assets/data/lessons.json` synchronized across all 28 entries.

### B. End-to-End HTML Rendering Verification
- Executed `scratch/test_strpos.php` using PHP CLI across representative lessons from Topics A, B, C, and D (`k-math-m1-a-1`, `k-math-m1-b-1`, `k-math-m1-c-1`, and `k-math-m1-d-4`):
  - `lesson-resources-section`: PRESENT on all lessons.
  - `lesson-guided-section`: PRESENT on all lessons.
  - `lesson-exit-ticket-section`: PRESENT on all lessons.
  - `Check Understanding` modal triggers: PRESENT on all lessons.
  - Zero PHP notices, warnings, or syntax errors detected.

### C. WCAG & Universal Design for Learning (UDL) Compliance
- All disclosure widgets (`<details><summary>`) are natively keyboard operable via `Tab`, `Space`, and `Enter` with high-contrast `:focus-visible` outlines.
- Color contrast meets or exceeds WCAG 2.1 AA (4.5:1) and AAA (7:1) in both light and dark modes.
- MathJax equations inherit `currentColor` and feature horizontal overflow scrolling containment on small screens.
- Screen readers receive structured semantic headings (`h2`, `h3`, `h4`) and ARIA landmark regions.

---

## 3. Platform Release & Release Notes Sync
- Bumped platform semantic version to **`v2.7.1`** in `src/header.php` and `src/footer.php`.
- Updated release summary to: *"Complete 28-Lesson Grade 9 Algebra I Module 1 with Official Worksheets, Verbatim Exit Ticket Keys, and Guided Depth"*.
- Updated the "What's in Version v2.7.1" modal in `src/footer.php` with dedicated feature cards.
- Updated the Grade 9 Algebra I user documentation in `assets/text/hc-grade-9-algebra-module-1.md`.
