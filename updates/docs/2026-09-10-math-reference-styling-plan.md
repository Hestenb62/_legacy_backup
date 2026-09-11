---
title: "Math Reference Book Styling, MathJax Typography & Textbook Architecture Plan"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Mathematics", "MathJax", "Typography", "Digital Reader", "Reference Book"]
summary: "Comprehensive technical roadmap to style the Math Reference Book, adapt MathJax SVG typography to reader font scaling, and structure the compendium into a publication-grade mathematical reference handbook."
author: "Antigravity & Hesten"
---

# Math Reference Book Styling, MathJax Typography & Textbook Architecture Plan

Enhance the digital **Mathematical Facts, Constants & Formulas Compendium** (`math-facts-repo`) into a publication-grade mathematical reference handbook. This includes designing a custom math reference stylesheet, ensuring the reader's active font family and dynamic scale seamlessly adjust MathJax SVG equations, and restructuring all four chapters with formal textbook architecture (definitions, theorems, formula cards, worked examples, cautions, and quick-reference cheat sheets).

## Proposed Architectural Modules

### 1. Dedicated Math Reference Stylesheet & Theme System
- **File**: `assets/css/reader/read-math-reference.css` (imported in `assets/css/reader-main.css`).
- **Math Callout Containers**:
  - `.math-def-box`: Formal definition callouts with domain tag chips and notation summaries.
  - `.math-theorem-box`: Theorems, Lemmas, Corollaries with numbered pill badges.
  - `.math-formula-card` & `.math-formula-grid`: Highlighted key equation blocks with variable breakdowns.
  - `.math-example-box`: Worked reference examples with Problem, Step-by-Step Solution, and highlighted Result.
  - `.math-property-grid` / `.math-rule-card`: Quick-reference law chips.
  - `.math-pitfall-box` / `.math-caution-box`: Common algebraic pitfalls and domain restrictions.
  - `.math-constant-card`: Mathematical constants with symbols, values, and historical context.
  - `.math-summary-sheet`: Chapter-end cheat sheets.
- **Ref-Table Design**:
  - Enhance `.ref-table` and `.ref-table-wrap` with sticky-feel headers, subtle grid borders, zebra rows, monospace/math alignment, and responsive horizontal touch scroll.
- **Color Theme Integration**:
  - Full support for `light`, `sepia`, `dark`, and `midnight` reading themes with WCAG AAA contrast (≥7:1).

### 2. MathJax Typography & Dynamic Page Font Adaptation
- **Files**: `assets/css/reader/read-reader-typography.css`, `assets/js/reader/read-typography.js`, `library/read/reader_template.php`.
- Ensure `mjx-container[jax="SVG"]` and inner `text` elements inherit the active reader font family (`.font-sans`, `.font-serif`, `.font-dyslexic`, `.font-hyperlegible`, `.font-mono`).
- Connect MathJax container sizing to the reader's `--reader-font-size` CSS variable so formula scale updates in lockstep with the font scaler.
- Update `applyPrefs` in the reader typography engine to trigger MathJax font re-flow / typesetting when the user toggles font families or scales the text size.
- Explicitly set `$requiresMathJax = true;` whenever reading `math-facts-repo` or when LaTeX math delimiters (`$`, `$$`, `\(`, `\[`) are detected in `$contentHtml`.

### 3. Comprehensive Textbook Restructuring of Reference Chapters
- **Chapters**:
  - `library/read/math-facts-repo/chapter-1.php`: **Arithmetic, Primes, Number Theory & Real Number Systems**
  - `library/read/math-facts-repo/chapter-2.php`: **Algebraic Identities, Polynomials, Equations & Functions**
  - `library/read/math-facts-repo/chapter-3.php`: **Geometry Theorems, Trigonometric Identities & Analytic Geometry**
  - `library/read/math-facts-repo/chapter-4.php`: **Calculus Essentials, Series & Fundamental Mathematical Constants**

### 4. Interactive Study Suite & Quiz Metadata
- **File**: `library/assets/math-facts-repo.json`
- Flashcard definitions and chapter comprehension quiz questions for all 4 chapters with MathJax formula support.

## Verification Plan
- Automated PHP syntax validation (`php -l`).
- Automated JSON validation via Node.js.
- Multi-theme contrast and keyboard accessibility validation.
