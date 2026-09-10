---
title: "Universal MathJax Typography & Dynamic Rendering Architecture Walkthrough"
date: "2026-09-10"
category: "Walkthrough"
tags: ["MathJax", "LaTeX", "Mathematics", "Architecture", "CSS", "Accessibility"]
summary: "Comprehensive walkthrough of the newly established MathJax rendering standard, container typography styling, baseline preservation, responsive touch scrolling, sequential promise queueing, and automated mutation-observer typesetting."
author: "Antigravity & Hesten"
---

# Universal MathJax Typography & Dynamic Rendering Architecture Walkthrough

## 1. Overview & Objectives
Following user review and approval of the **Learning Proposal**, we established a permanent workspace rule and platform upgrades ensuring that mathematical notation (LaTeX, TeX delimiters `$...$`, `$$...$$`, `\(...\)`, `\[...\]`) rendered anywhere across **Hesten's Learning** displays with crisp SVG typography, preserved text baseline, responsive horizontal containment, theme color adaptation, and automatic typesetting for dynamically generated questions and proofs.

---

## 2. Key Changes & Architectural Upgrades

### A. New Workspace Rule & Master Guidelines
- **Created [`.agents/rules/mathjax-rendering.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/.agents/rules/mathjax-rendering.md)**:
  - Enforces baseline alignment for inline math (`vertical-align: -0.22ex`).
  - Enforces responsive block formatting with touch scrolling (`overflow-x: auto`) for multi-line display math.
  - Mandates sequential promise queueing and dynamic mutation-observer typesetting.
- **Updated [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md)**:
  - Added **MathJax Typography & Universal Rendering** under Section 2 (Core Architectural Principles).

### B. Global Container Typography (`assets/css/global-components.css`)
- **Inline Math Alignment**:
  ```css
  mjx-container[jax="SVG"]:not([display="true"]) {
    display: inline-block;
    vertical-align: -0.22ex;
    margin: 0 0.15em;
    font-size: inherit;
    line-height: 0;
  }
  ```
  Prevents inline formulas from disturbing text line-heights or misaligning with surrounding prose.
- **Display Math Centering & Touch Overflow**:
  ```css
  mjx-container[jax="SVG"][display="true"] {
    display: block;
    text-align: center;
    margin: 1.25rem auto;
    max-width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    padding: 0.35rem 0.25rem;
    -webkit-overflow-scrolling: touch;
  }
  ```
  Guarantees that complex algebraic equations never clip or break card layouts on mobile screens.
- **Color Theme Inheritance**:
  ```css
  mjx-container[jax="SVG"] > svg {
    fill: currentColor;
    stroke: currentColor;
    max-width: 100%;
    height: auto;
    vertical-align: middle;
  }
  ```
  Allows mathematical glyphs to effortlessly adapt to dark mode, light mode, and high-contrast themes.

### C. Resilient Loader & Dynamic Observer (`src/header.php`)
- **Expanded Delimiter Regex**:
  - Detects `$$...$$`, `$...$`, `\[...\]`, `\(...\)`, and `\begin{...}` blocks across all static pages.
- **Sequential Typeset Promise Queue**:
  - Chains all calls onto an internal `mathJaxTypesetQueue` to prevent concurrent promise collision errors (`Error: MathJax is already typesetting`).
- **Dynamic Mutation Observer**:
  - Automatically detects asynchronously injected math notation (such as randomly generated questions in `student/math-practice.php`, exit tickets in `lesson_renderer.php`, and interactive lab solutions) and triggers typesetting without requiring manual callbacks.
- **Resilient Fallback**:
  - Automatically falls back to CDN (`https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.2.2/es5/tex-svg.js`) if local asset loading encounters network or path interruptions.

---

## 3. Verification & Validation
- Verified clean syntax in [assets/css/global-components.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-components.css).
- Verified valid JavaScript and PHP blocks in [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php).
- Validated that the new rule in [`.agents/rules/mathjax-rendering.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/.agents/rules/mathjax-rendering.md) and updates in [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md) are saved and indexed.
- Verified that all documentation files are indexed on the Updates Portal.
