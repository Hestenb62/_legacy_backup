## Grade 9 Algebra I Module 1: Relationships Between Quantities & Reasoning with Equations

The Grade 9 (Level K) Algebra I Module 1 curriculum provides a comprehensive, rigorous high school mathematics course aligned with Eureka Math / EngageNY standards. Accessible directly through the Level K Curriculum Hub (`/levels/k.php`), each of the 28 lessons features structured student outcomes, deep teacher pedagogical insights, interactive STEM workbenches, MathJax typography, and formative exit tickets.

### Curriculum Structure & Topics

- **Topic A: Introduction to Functions Studied this Year (Lessons 1–5):**
  - **Lesson 1 (`K.M1.A.1`):** Graphs of Piecewise Linear Functions (Elevation vs. Time, Video Playback).
  - **Lesson 2 (`K.M1.A.2`):** Growth of Square Areas and Functions (Geometric Area vs. Side Length).
  - **Lesson 3 (`K.M1.A.3`):** Graphs of Exponential Functions (Paper Folding, Bacteria Growth).
  - **Lesson 4 (`K.M1.A.4`):** Analyzing Graphs — Water Usage During a Typical Day at School.
  - **Lesson 5 (`K.M1.A.5`):** Two Graphing Stories (Elevation & Water Level vs. Time).

- **Topic B: The Structure of Expressions (Lessons 6–9):**
  - **Lesson 6 (`K.M1.B.1`):** Algebraic Expressions — The Distributive Property.
  - **Lesson 7 (`K.M1.B.2`):** Algebraic Expressions — The Commutative and Associative Properties.
  - **Lesson 8 (`K.M1.B.3`):** Adding and Subtracting Polynomials (Standard Form, Degree, Leading Coefficients).
  - **Lesson 9 (`K.M1.B.4`):** Multiplying Polynomials (Tabular/Area Model, FOIL, Expanding Binomials).

- **Topic C: Solving Equations and Inequalities (Lessons 10–24):**
  - **Lessons 10–12 (`K.M1.C.1`–`C.3`):** True and False Equations, Solution Sets, and Deductive Step Justifications.
  - **Lessons 13–14 (`K.M1.C.4`–`C.5`):** Potential Dangers (Extraneous Roots, Division by Zero) & Solving Inequalities.
  - **Lessons 15–16 (`K.M1.C.6`–`C.7`):** Compound Equations and Inequalities Joined by "And" (Intersection) or "Or" (Union).
  - **Lessons 17–19 (`K.M1.C.8`–`C.10`):** Factored Expressions (Zero Product Property), Denominator Variables, and Rearranging Formulas.
  - **Lessons 20–21 (`K.M1.C.11`–`C.12`):** Equations and Inequalities with Two Variables (Half-Planes & Coordinate Graphs).
  - **Lessons 22–24 (`K.M1.C.13`–`C.15`):** Systems of Equations & Inequalities (Substitution, Elimination, Feasible Regions).

- **Topic D: Creating Equations to Solve Problems (Lessons 25–28):**
  - **Lesson 25 (`K.M1.D.1`):** Solving Problems in Two Ways — Arithmetic Rates vs. Algebraic Variables.
  - **Lessons 26–27 (`K.M1.D.2`–`D.3`):** Recursive Challenge Problem — The Double and Add 5 Game (Parts 1 & 2).
  - **Lesson 28 (`K.M1.D.4`):** Modeling Real-World Constraints — Progressive Federal Income Tax Brackets.

### Core Interactive Features & Study Tools

- **Official Embedded Worksheets & Problem Sets:**
  - Every lesson features an on-page **Official Curriculum Worksheet: Problem Set & Practice** section directly beneath the overview.
  - **Authentic Practice Problems:** Students can solve the authentic Eureka Math / EngageNY Problem Set exercises directly in the lesson interface without downloading external files.
  - **Teacher Solution Keys:** Each problem includes a keyboard-accessible disclosure accordion with step-by-step mathematical reasoning and final answers.
  - **1-Click Printing:** A clean browser print button enables printing the worksheet on demand.
- **Verbatim Exit Ticket Keys & Check Understanding:**
  - **On-Page Key Review:** Expandable "Official Exit Ticket & Teacher Key" disclosure accordion directly presents the authentic Eureka Math / EngageNY problem statements alongside verbatim teacher sample solutions and mathematical justifications.
  - **Interactive Check Understanding Modal:** Scored practice checks faithfully replicate the curriculum Exit Ticket questions, allowing students to verify their mastery with immediate feedback and complete worked steps.
- **Guided Exercises & Step-by-Step Worked Solutions:**
  - Every lesson across Topics A, B, C, and D features in-depth Guided Exercises.
  - Interactive disclosure accordions reveal step-by-step mathematical reasoning, intermediate formulas, final answers, and Common Pitfall alerts.
- **Dedicated JSON-First Architecture:**
  - Each lesson is defined in an isolated JSON module (`assets/data/lessons/k-math-m1-*.json`), loaded dynamically by the central renderer (`/levels/k.php?k-math-m1-...`).
  - Seamless navigation between lessons without page reloading or legacy static PHP stubs.
- **Embedded STEM Workbenches:**
  - Interactive sliders, coordinate plotters, algebra tile simulators, and balance scales allow students to visualize abstract operations.
- **Universal MathJax Typography:**
  - Mathematical formulas ($\LaTeX$) adapt automatically to light, dark, and high-contrast themes using SVG vector rendering with horizontal overflow containment.

### Universal Accessibility (UDL) & Accommodations

- **100% Keyboard Operability:** Navigate between lesson tabs, workbench controls, and quiz answers with `Tab`, `Shift+Tab`, `Enter`, `Space`, and Arrow keys.
- **Screen Reader Semantics:** Every equation includes clean LaTeX and screen-reader alt text; interactive question state changes announce via ARIA live regions.
- **Dyslexia & Sensory Friendly:** Integrates with OpenDyslexic typography, Irlen colored overlays, low-anxiety mode (untimed drills), and high-contrast AAA color modes.
- **Offline Resilient:** Fully cached by the Progressive Web App service worker for uninterrupted learning without an active internet connection.
