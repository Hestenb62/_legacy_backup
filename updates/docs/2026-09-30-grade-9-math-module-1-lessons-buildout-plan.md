---
title: "Grade 9 Math Module 1 Complete 28-Lesson Buildout Plan (JSON-First Architecture)"
date: "2026-09-30"
version: "v2.7.0"
category: "Implementation Plan"
tags: ["Math", "Grade 9", "Algebra I", "Curriculum", "EngageNY", "Module 1", "JSON", "MathJax"]
summary: "Plan to build out all 28 Algebra I Module 1 lessons as dedicated standalone JSON files in assets/data/lessons/ using Eureka Math/EngageNY teacher and student source files, phasing out individual PHP lesson files."
author: "Antigravity & Hesten"
---

# Grade 9 Math Module 1 Complete 28-Lesson Buildout Plan (JSON-First Architecture)

## 1. Overview & Architectural Direction
Build out the complete Grade 9 (Level K) Algebra I Module 1 curriculum ("Relationships Between Quantities and Reasoning with Equations and Their Graphs") using all source materials in `assets/Module 1/`.

### Architectural Decision
- **Individual PHP lesson files in `lessons/` are being retired.**
- **Each lesson has its own dedicated JSON file** in `assets/data/lessons/` (e.g., `assets/data/lessons/k-math-m1-b-1.json`). (In the future, topics/modules can optionally be bundled together into module/topic JSON files, but each currently maintains its clean, isolated JSON definition).
- `levels/k.php` routes lesson requests directly via query string (`k.php?k-math-m1-...` or `k.php?lesson=k-math-m1-...`) into `src/lesson_renderer.php`, which loads the dedicated JSON file.
- The existing lessons `k-math-m1-a-2` through `k-math-m1-a-5` will also be captured into dedicated JSON files in `assets/data/lessons/` to ensure 100% uniformity across all 28 Module 1 lessons.

The buildout covers all 28 lessons across 4 core topics:
- **Topic A (Lessons 1–5)**: Introduction to Functions Studied this Year (`k-math-m1-a-1` to `k-math-m1-a-5`)
- **Topic B (Lessons 6–9)**: The Structure of Expressions (`k-math-m1-b-1` to `k-math-m1-b-4`)
- **Topic C (Lessons 10–24)**: Solving Equations and Inequalities (`k-math-m1-c-1` to `k-math-m1-c-15`, 15 lessons)
- **Topic D (Lessons 25–28)**: Creating Equations to Solve Problems (`k-math-m1-d-1` to `k-math-m1-d-4`, 4 lessons)

Each lesson integrates:
1. **Teacher Materials**: Mathematical rationale, scaffolding tips, teacher insights, classroom discussion prompts, worked examples with step-by-step reasoning, and sample solutions.
2. **Student Materials**: Interactive exercises, problem sets, and formative check-for-understanding assessments.
3. **Universal Accessibility & UDL**: MathJax LaTeX rendering with responsive overflow, high-contrast WCAG 2.1/2.2 AA/AAA color palettes, keyboard accessibility, dyslexia font compatibility, and scratchpad integration.
4. **Platform Data Synchronization**: Automatic standards mastery updates to `hesten_standards_mastery`, XP gamification rewards, and Google Drive auto-sync.

---

## 2. Inventory & Source File Mapping (All 28 Lessons)

| Lesson | Code | JSON Target File | Title | Standard | Source Files |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **L01** | `K.M1.A.1` | `assets/data/lessons/k-math-m1-a-1.json` | Graphs of Piecewise Linear Functions | `HSF-IF.B.4` | Topic A Lesson 1 (Teacher + Student) |
| **L02** | `K.M1.A.2` | `assets/data/lessons/k-math-m1-a-2.json` | Growth of Square Areas and Functions | `HSA-CED.A.2` | Topic A Lesson 2 (Teacher + Student) |
| **L03** | `K.M1.A.3` | `assets/data/lessons/k-math-m1-a-3.json` | Graphs of Exponential Functions | `HSF-LE.A.1` | Topic A Lesson 3 (Teacher + Student) |
| **L04** | `K.M1.A.4` | `assets/data/lessons/k-math-m1-a-4.json` | Analyzing Graphs — Water Usage During a School Day | `HSF-IF.B.4` | Topic A Lesson 4 (Teacher + Student) |
| **L05** | `K.M1.A.5` | `assets/data/lessons/k-math-m1-a-5.json` | Two Graphing Stories | `HSF-IF.B.4` | Topic A Lesson 5 (Teacher + Student) |
| **L06** | `K.M1.B.1` | `assets/data/lessons/k-math-m1-b-1.json` | Algebraic Expressions — The Distributive Property | `HSA-SSE.A.1` | Topic B Lesson 6 (Teacher + Student) |
| **L07** | `K.M1.B.2` | `assets/data/lessons/k-math-m1-b-2.json` | Algebraic Expressions — Commutative and Associative | `HSA-SSE.A.2` | Topic B Lesson 7 (Teacher + Student) |
| **L08** | `K.M1.B.3` | `assets/data/lessons/k-math-m1-b-3.json` | Adding and Subtracting Polynomials | `HSA-APR.A.1` | Topic B Lesson 8 (Teacher + Student) |
| **L09** | `K.M1.B.4` | `assets/data/lessons/k-math-m1-b-4.json` | Multiplying Polynomials | `HSA-APR.A.1` | Topic B Lesson 9 (Teacher + Student) |
| **L10** | `K.M1.C.1` | `assets/data/lessons/k-math-m1-c-1.json` | True and False Equations | `HSA-CED.A.1` | Topic C Lesson 10 (Teacher + Student) |
| **L11** | `K.M1.C.2` | `assets/data/lessons/k-math-m1-c-2.json` | Solution Sets for Equations and Inequalities | `HSA-REI.B.3` | Topic C Lesson 11 (Teacher + Student) |
| **L12** | `K.M1.C.3` | `assets/data/lessons/k-math-m1-c-3.json` | Solving Equations | `HSA-REI.A.1` | Topic C Lesson 12 (Teacher + Student) |
| **L13** | `K.M1.C.4` | `assets/data/lessons/k-math-m1-c-4.json` | Some Potential Dangers When Solving Equations | `HSA-REI.A.1` | Topic C Lesson 13 (Teacher + Student) |
| **L14** | `K.M1.C.5` | `assets/data/lessons/k-math-m1-c-5.json` | Solving Inequalities | `HSA-REI.B.3` | Topic C Lesson 14 (Teacher + Student) |
| **L15** | `K.M1.C.6` | `assets/data/lessons/k-math-m1-c-6.json` | Solution Sets of Equations/Inequalities with And/Or | `HSA-CED.A.1` | Topic C Lesson 15 (Teacher + Student) |
| **L16** | `K.M1.C.7` | `assets/data/lessons/k-math-m1-c-7.json` | Solving and Graphing Inequalities with "And" or "Or" | `HSA-REI.B.3` | Topic C Lesson 16 (Teacher + Student) |
| **L17** | `K.M1.C.8` | `assets/data/lessons/k-math-m1-c-8.json` | Equations Involving Factored Expressions | `HSA-SSE.A.2` | Topic C Lesson 17 (Teacher + Student) |
| **L18** | `K.M1.C.9` | `assets/data/lessons/k-math-m1-c-9.json` | Equations with a Variable in the Denominator | `HSA-REI.A.2` | Topic C Lesson 18 (Teacher + Student) |
| **L19** | `K.M1.C.10`| `assets/data/lessons/k-math-m1-c-10.json`| Rearranging Formulas | `HSA-CED.A.4` | Topic C Lesson 19 (Teacher + Student) |
| **L20** | `K.M1.C.11`| `assets/data/lessons/k-math-m1-c-11.json`| Solution Sets to Equations with Two Variables | `HSA-REI.D.10`| Topic C Lesson 20 (Teacher + Student) |
| **L21** | `K.M1.C.12`| `assets/data/lessons/k-math-m1-c-12.json`| Solution Sets to Inequalities with Two Variables | `HSA-REI.D.12`| Topic C Lesson 21 (Teacher + Student) |
| **L22** | `K.M1.C.13`| `assets/data/lessons/k-math-m1-c-13.json`| Solution Sets to Simultaneous Equations (Part 1) | `HSA-REI.C.6` | Topic C Lesson 22 (Teacher + Student) |
| **L23** | `K.M1.C.14`| `assets/data/lessons/k-math-m1-c-14.json`| Solution Sets to Simultaneous Equations (Part 2) | `HSA-REI.C.5` | Topic C Lesson 23 (Teacher + Student) |
| **L24** | `K.M1.C.15`| `assets/data/lessons/k-math-m1-c-15.json`| Applications of Systems of Equations & Inequalities | `HSA-CED.A.3` | Topic C Lesson 24 (Teacher + Student) |
| **L25** | `K.M1.D.1` | `assets/data/lessons/k-math-m1-d-1.json` | Solving Problems in Two Ways — Rates and Algebra | `HSN-Q.A.1`  | Topic D Lesson 25 (Teacher + Student) |
| **L26** | `K.M1.D.2` | `assets/data/lessons/k-math-m1-d-2.json` | Recursive Challenge — Double and Add 5 (Part 1) | `HSA-CED.A.1`| Topic D Lesson 26 (Teacher + Student) |
| **L27** | `K.M1.D.3` | `assets/data/lessons/k-math-m1-d-3.json` | Recursive Challenge — Double and Add 5 (Part 2) | `HSA-CED.A.3`| Topic D Lesson 27 (Teacher + Student) |
| **L28** | `K.M1.D.4` | `assets/data/lessons/k-math-m1-d-4.json` | Federal Income Tax | `HSN-Q.A.1`  | Topic D Lesson 28 (Teacher + Student) |

---

## 3. Implementation Steps

1. **Extraction & Mathematical Parsing Script**:
   - Write custom python script `scratch/build_module1_lessons.py` that processes both teacher and student `.docx` files.
   - Use recursive XML parsing to convert `m:oMath` math elements into standard LaTeX expressions (`$...$`, `$$...$$`).
   - Extract student outcomes, teacher insights, classwork exercises, worked examples, vocabulary terms, and formative exit tickets.
2. **JSON Generation**:
   - Generate complete, rich standalone JSON files in `assets/data/lessons/` for all 28 lessons (`k-math-m1-a-1.json` through `k-math-m1-d-4.json`).
   - Also sync central `assets/data/lessons.json` so both isolated file lookup and central registry are fully updated.
3. **Dynamic Router Updates (`levels/k.php`)**:
   - Update `levels/k.php` dynamic query router to check `assets/data/lessons/{$requestedLesson}.json` directly.
   - Update `$modules[0]` in `levels/k.php` so all 28 lessons link via `k.php?{lessonId}` (e.g. `k.php?k-math-m1-b-1`).
   - Clean up redundant PHP lesson stubs in `lessons/k-math-m1-*.php`.
4. **Curriculum Roster Updates**:
   - Update `assets/data/curriculum-grade-9-math.json` and `assets/data/curriculum-engageny-math.json` with the complete 28-lesson rosters and standards.
5. **Platform Version & Help Center**:
   - Bump platform version to `v2.7.0` in `src/header.php` and `src/footer.php`.
   - Update footer release notes modal with the Grade 9 Algebra I Module 1 Curriculum release.
   - Create companion Help Center article `assets/text/hc-grade-9-algebra-module-1.md`.
6. **Verification & Testing**:
   - Verify JSON syntax across all 28 generated lesson files.
   - Test rendering of lessons via `levels/k.php?k-math-m1-...`.
   - Verify MathJax typesetting, keyboard navigation, and standards mastery logging.
