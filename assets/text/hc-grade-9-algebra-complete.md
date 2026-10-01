## Grade 9 Algebra I Complete Curriculum (Modules 1–5): Authoritative Guide

The complete Grade 9 (Level K) Algebra I curriculum on Hesten's Learning delivers an authentic, comprehensive, high school mathematics experience built directly upon Eureka Math / EngageNY standards. Accessible directly through the Level K Curriculum Hub (`/levels/k.php`), all **105 lessons** across Modules 1 through 5 feature structured student outcomes, deep teacher pedagogical insights, multi-step guided exercises, embedded Problem Set worksheets with teacher keys, verbatim Exit Ticket solutions, and interactive formative quizzes.

### Curriculum Structure & Module Inventory

- **Module 1: Relationships Between Quantities & Reasoning with Equations (28 Lessons)**
  - **Topic A (Lessons 1–5):** Introduction to Functions Studied this Year (Piecewise linear, exponential growth, graphing stories).
  - **Topic B (Lessons 6–9):** The Structure of Expressions (Distributive, commutative, associative properties, adding/multiplying polynomials).
  - **Topic C (Lessons 10–24):** Solving Equations and Inequalities (Solution sets, extraneous solutions, compound inequalities, systems).
  - **Topic D (Lessons 25–28):** Creating Equations to Solve Problems (Rates vs. algebra, recursive sequences, progressive taxation).

- **Module 2: Descriptive Statistics (20 Lessons)**
  - **Topic A (Lessons 1–3):** Shapes and Centers of Distributions (Histograms, dot plots, box plots, mean as a balance point).
  - **Topic B (Lessons 4–8):** Calculating and Interpreting Measures of Center and Variability (Deviations from mean, standard deviation, IQR, skewed vs symmetrical distributions).
  - **Topic C (Lessons 9–11):** Categorical Data on Two Variables (Two-way frequency tables, marginal/conditional relative frequencies, association).
  - **Topic D (Lessons 12–20):** Numerical Data on Two Variables (Scatter plots, lines of best fit, residuals, correlation coefficient $r$, bivariate data analysis).

- **Module 3: Linear and Exponential Functions (24 Lessons)**
  - **Topic A (Lessons 1–7):** Linear and Exponential Sequences (Integer sequences, explicit vs recursive formulas, arithmetic and geometric sequences, exponential decay).
  - **Topic B (Lessons 8–14):** Functions and Their Graphs (Function notation $f(x)$, domain and range, graphs of $y=f(x)$, comparing linear vs exponential growth rates).
  - **Topic C (Lessons 15–20):** Transformations of Functions (Piecewise functions, graphical solutions, vertical shifts $f(x)+k$, horizontal shifts $f(x+k)$, vertical stretches $k \cdot f(x)$).
  - **Topic D (Lessons 21–24):** Using Functions and Graphs to Solve Problems (Population modeling, Newton's law of cooling, step functions in context).

- **Module 4: Polynomial and Quadratic Expressions, Equations, and Functions (24 Lessons)**
  - **Topic A (Lessons 1–10):** Quadratic Expressions, Equations, and Functions (Factoring polynomials, zero product property, symmetry of parabolas, vertex and axis of symmetry).
  - **Topic B (Lessons 11–17):** Using Different Forms for Quadratic Functions (Completing the square, deriving the quadratic formula, standard form vs vertex form).
  - **Topic C (Lessons 18–24):** Function Transformations and Modeling (Cubic and square root parent functions, stretching/shrinking parabolas, projectile motion and quadratic modeling).

- **Module 5: A Synthesis of Modeling with Equations and Functions (9 Lessons)**
  - **Topic A (Lessons 1–3):** Elements of Modeling (Analyzing function types from graphs, bivariate data sets, and contextual verbal descriptions).
  - **Topic B (Lessons 4–9):** Completing the Modeling Cycle (Formulating mathematical models from sequences, fitting data curves, interpreting rate of change in context, validating model viability).

### Core Interactive Features & Curriculum Capabilities

- **Embedded Official Problem Sets (No Download Links):**
  - Every lesson features the authentic Eureka Math Problem Set worksheet embedded directly onto the page.
  - Zero external `.docx` or `.pdf` file download buttons; all questions and graphs render on-page with responsive typography.
  - **Expandable Teacher Solution Keys:** Each problem includes a high-contrast accordion disclosing step-by-step worked calculations and mathematical justifications.
  - **1-Click Browser Printing:** Clean printable layout via the dedicated "Print Worksheet" button.
- **Verbatim Exit Ticket Keys & Formative Quizzes:**
  - Dedicated "Official Exit Ticket & Teacher Key" panel presenting verbatim student prompts and worked teacher answer keys.
  - Interactive "Check Understanding" modal faithfully reproduces the Exit Ticket challenge, providing immediate scored feedback and explanatory remediation.
- **Multi-Step Guided Exercises:**
  - 2 scaffolded classroom exploration exercises per lesson featuring step-by-step mathematical reasoning, LaTeX expressions, and Common Pitfall alerts.
- **Unified Mathematics Codex & Vocabulary Hub (`/pages/math-vocab.php`):**
  - Aggregates **195 mathematical terms** across all 12 grade bands and 5 high school modules.
  - Features 3D Active Recall Flashcards, A–Z ribbon navigation, audio pronunciation, and the interactive Formula Sandbox & Solver.
- **Modular Module-Level JSON Architecture:**
  - Lessons are consolidated into 5 high-performance, cohesive module datasets (`assets/data/lessons/k-math-m1.json` through `k-math-m5.json`). The dynamic router in `levels/k.php` resolves lessons via a fast tiered pipeline (Module JSON &rarr; Standalone JSON &rarr; Master Registry).
- **Universal MathJax SVG Typography:**
  - Automatically typesets all inline and display LaTeX equations with responsive overflow containment, baseline alignment, and theme-adaptive coloring.

### Universal Accessibility (UDL) & Standards Compliance

- **100% Keyboard Operability:** All accordions, study tools, inputs, and quiz buttons are fully navigable via `Tab`, `Shift+Tab`, `Enter`, `Space`, and `Esc`.
- **High-Contrast Focus Rings:** Prominent `:focus-visible` rings with ≥7:1 contrast in AAA mode and ≥4.5:1 in standard AA mode.
- **Multi-Modal Accommodations:** Seamlessly integrates with OpenDyslexic typography, Irlen color overlays, audio text-to-speech read-aloud, and untimed low-anxiety mode.
- **Offline Resilient:** Fully cached by the Progressive Web App service worker for uninterrupted offline study.
