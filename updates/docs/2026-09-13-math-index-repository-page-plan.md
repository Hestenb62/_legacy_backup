---
title: "Implementation Plan: Universal Mathematics Codex & Index (pages/math.php)"
date: "2026-09-13"
category: "Implementation Plan"
tags: ["Math Codex", "Index", "Repository", "Pedagogy", "MathJax", "Curriculum"]
summary: "Architectural blueprint and curricular design for pages/math.php, a repository-style Mathematics Codex & Index providing comprehensive definitions, conceptual mechanisms ('what it does'), procedures ('how to do it'), and worked exemplars across all 12 grades."
author: "Antigravity & Hesten"
---

# Implementation Plan: Universal Mathematics Codex & Index (`pages/math.php`)

Build `pages/math.php` as a comprehensive, repository-style Mathematics Codex and Index for Hesten's Learning, cataloging core mathematical definitions, conceptual mechanisms ("what it does"), step-by-step procedures ("how to do it"), and worked step-by-step exemplars across all 12 grades (Kindergarten/Grade 1 through Grade 12 / Calculus).

---

## 1. Executive Summary & Architectural Goals

The platform currently features a 12-volume Math Facts Reference Book in the digital library (`library/read/math-facts-repo/chapter-1.php` through `chapter-12.php`). While students can read through these chapter books sequentially, there is a clear pedagogical need for an **interactive, cross-grade index and lexicon** where students, teachers, and parents can:
1. Instantly look up any mathematical term, axiom, theorem, or procedure across Grades 1 through 12.
2. Read not only the formal academic definition, but also an intuitive explanation of **what it does & why it matters**, followed by an actionable **how-to guide** and a complete **step-by-step worked example**.
3. Filter by grade bands (Elementary K–2 & 3–5, Middle School 6–8, High School 9–12) or math branches (Arithmetic, Algebra, Geometry, Fractions, Trigonometry, Calculus, Statistics).
4. Seamlessly jump into the corresponding library reference codex volume for deep-dive reading.
5. Export custom printable study cheat-sheets and bookmark favorite concepts to `localStorage`.

---

## 2. Curricular Scope Across All 12 Grades

Each grade level is represented with foundational definitions and worked exemplars:
- **Grade 1 (Foundations & Fact Fluency)**: Counting & Cardinality, Place Value (Tens & Ones), Addition Fact Families, Subtraction Difference, Commutative Property of Addition, The Number Line.
- **Grade 2 (Base-Ten & Grouping)**: Hundreds/Tens/Ones, Regrouping in Addition, Decomposition in Subtraction, Skip Counting & Rectangular Arrays, Analog Clocks & Time Intervals, Money & Coin Combinations.
- **Grade 3 (Multiplication & Fractions)**: Multiplication as Equal Groups & Arrays, Division as Equal Sharing (Partitive & Quotative), Distributive Property of Multiplication, Unit Fractions ($1/b$), Fractions on the Number Line, Perimeter vs. Area ($A = l \times w$).
- **Grade 4 (Multi-Digit Operations & Decimals)**: Multi-Digit Multiplication (Standard Algorithm & Area Model), Long Division with Remainders, Prime vs. Composite Numbers, Equivalent Fractions, Fraction Addition & Subtraction, Decimal Notation (Tenths & Hundredths), Angles & Protractor Measurement.
- **Grade 5 (Fraction Operations & Coordinate Geometry)**: Addition & Subtraction of Fractions with Unlike Denominators (LCM/LCD), Multiplying Fractions, Dividing Unit Fractions by Whole Numbers, Decimal Place Value to Thousandths, Volume of Prisms ($V = l \times w \times h$), First-Quadrant Coordinate Plane ($(x, y)$).
- **Grade 6 (Ratios, Integers & Expressions)**: Ratios & Unit Rates, Dividing Fractions via Reciprocal (Keep-Change-Flip), Signed Numbers & Absolute Value ($|x|$), Order of Operations (PEMDAS/GEMS), One-Variable Algebraic Equations, Measures of Center & Spread (Mean, Median, Mode, Range, IQR).
- **Grade 7 (Proportions, Geometry & Probability)**: Constant of Proportionality ($y = kx$), Percent of Change (Increase & Decrease), Operations with Rational Numbers, Circumference & Area of Circles ($C = 2\pi r$, $A = \pi r^2$), Scale Factor & Similar Figures, Probability of Simple & Compound Events.
- **Grade 8 (Linear Relationships, Roots & Exponents)**: Linear Functions & Slope-Intercept Form ($y = mx + b$), Systems of Linear Equations (Substitution & Elimination), Laws of Integer Exponents & Scientific Notation, Square Roots & Cube Roots, The Pythagorean Theorem ($a^2 + b^2 = c^2$), Bivariate Data & Scatter Plots.
- **Grade 9 / Algebra I (Quadratics & Polynomials)**: Quadratic Equations & Factoring (Difference of Squares, Trinomials), The Quadratic Formula ($x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$), Standard Form vs. Vertex Form ($y = a(x-h)^2 + k$), Polynomial Addition, Subtraction & Multiplication, Linear Inequalities & Systems, Exponential Growth & Decay Models ($y = a(1 \pm r)^t$).
- **Grade 10 / Geometry (Proofs, Trig & Solids)**: Axiomatic Deductive Proofs, Triangle Congruence Postulates (SSS, SAS, ASA, AAS, HL), Right Triangle Trigonometry ($\sin, \cos, \tan$, SOH-CAH-TOA), Circle Theorems (Inscribed Angles, Secants, Tangents), Surface Area & Volume of Spheres, Cones, Cylinders, Coordinate Distance & Midpoint Formulas.
- **Grade 11 / Algebra II & Trigonometry (Complex Numbers & Transcendental Functions)**: Complex Number Arithmetic ($i = \sqrt{-1}, i^2 = -1$), Logarithmic Laws ($\log_b(xy) = \log_b x + \log_b y$), Polynomial Division & The Remainder Theorem, Rational & Radical Equations, The Unit Circle & Radian Angle Measure, Arithmetic & Geometric Sequences & Series.
- **Grade 12 / Pre-Calculus & Calculus (Limits, Derivatives & Integrals)**: Limits & Continuity ($\lim_{x \to c} f(x)$), The Derivative via Difference Quotient ($f'(x) = \lim_{h \to 0} \frac{f(x+h)-f(x)}{h}$), Differentiation Rules (Power, Product, Quotient, Chain Rule), Tangent Lines & Extrema Optimization, Indefinite & Definite Integrals, The Fundamental Theorem of Calculus ($\int_a^b f(x)dx = F(b) - F(a)$).

---

## 3. Component Design & Structural Layout

### A. Dedicated Stylesheet: `assets/css/pages/math.css`
- Modern hero layout with academic badge, search bar with clear button, and real-time counter.
- Sticky or top-anchored grade navigation pills and domain filters.
- Term card architecture:
  - Header: Term name, Grade badge, Domain tag, Quick actions (TTS speech pronunciation, Copy formula button, Study list star).
  - Formal Definition box with LaTeX MathJax formula cards.
  - "What It Does" callout box explaining real-world intuition and conceptual purpose.
  - "How to Do It" numbered procedural badge steps.
  - "Exemplum" worked problem with step-by-step resolution and Q.E.D. mark.
  - Footer with direct deep-link into the Math Facts Repository (`/library/read/index.php?book=math-facts-repo&chapter=chapter-X`).
- Full support for Light, Dark, Midnight, and Sepia themes.
- Responsive design reflowing down to 320px without horizontal scrollbars.

### B. Interactive Script: `assets/js/pages/math-index.js`
- Instant debounced search filtering terms in real-time across name, definition, keywords, and grade.
- Multi-dimensional filtering (Grade level + Subject branch + My Study List favorites).
- Web Speech API integration for high-clarity term pronunciation and read-aloud.
- Clipboard API integration for instant copying of LaTeX formulas with toast feedback.
- Persistent Study List saved to `localStorage` (`hl_math_favorites`).
- One-click export of current filtered terms to downloadable ASCII/Markdown `.txt` file.

### C. Page Template: `pages/math.php`
- Standard headers and footers (`src/header.php`, `src/footer.php`).
- Auto-initialization of MathJax SVG typography (`$requiresMathJax = true`).
- WCAG 2.1/2.2 AA & AAA keyboard accessibility, skip links, semantic landmarks, and screen-reader announcements.

---

## 4. Verification & Testing Plan
1. **Curriculum Verification**: Ensure terms across all 12 grades contain valid MathJax delimiters and complete definition/what/how/example quadruplets.
2. **Interactive Search & Filter**: Test live search with single/multi-word queries, grade filter buttons, and domain tabs.
3. **Speech & Clipboard**: Test audio pronunciation fallback and formula copy actions.
4. **Platform Regression Suite**: Run `scratch/verify_master_suite.js` to ensure zero platform regressions.
