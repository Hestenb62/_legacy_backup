---
title: "Universal MathJax Typography & Dynamic Rendering Architecture Plan"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["MathJax", "LaTeX", "Mathematics", "Architecture", "Accessibility", "CSS"]
summary: "Technical implementation plan and behavioral invariants to ensure mathematical formulas render crisply, responsively, and reliably across all static and dynamic modules in Hesten's Learning."
author: "Antigravity & Hesten"
---

# Universal MathJax Typography & Dynamic Rendering Architecture Plan

## 1. Executive Summary
This proposal establishes universal behavioral rules and architectural standards to ensure that all mathematical notation across **Hesten's Learning**—including Common Core standards, adaptive practice exercises, exit tickets, and interactive labs—renders reliably with crisp SVG typography, responsive overflow wrapping, theme color inheritance, and automatic typesetting for dynamically injected elements.

---

## 2. Problem Analysis & Root Cause

### A. Missing CSS for `mjx-container`
- MathJax outputs mathematical expressions within `<mjx-container jax="SVG">`.
- Without global CSS rules:
  - Inline equations distort line-heights and text baselines.
  - Multi-line block equations clip or break horizontal container bounds on mobile screens.
  - SVGs fail to inherit text colors in dark mode or accessibility high-contrast themes.

### B. Detection Gaps in Header
- `src/header.php` only checks for single-line inline math: `/\$[^$\n]+\$|\\\([^\\]+\\\)/`.
- Misses:
  - Multi-line display math: `$$ ... $$`
  - LaTeX display blocks: `\[ ... \]`
  - LaTeX environments: `\begin{equation}`, `\begin{matrix}`, `\begin{align}`
  - Content injected dynamically via AJAX/fetch or client-side DOM generators.

### C. Promise Collisions & Script Loader Edge Cases
- Calling `MathJax.typesetPromise()` concurrently from multiple elements causes MathJax to throw or reject.
- If `#MathJax-script` has already finished loading, registering a new `load` event listener hangs indefinitely.
- Missing CDN fallback if the local `tex-svg.js` asset encounters an unexpected network/path error.

---

## 3. Architecture Specification

### 1. Global Mathematical CSS (`assets/css/global-components.css`)
```css
/* Universal MathJax Container Typography & Responsive Layout */
mjx-container[jax="SVG"] {
  outline: none;
}

mjx-container[jax="SVG"]:not([display="true"]) {
  display: inline-block;
  vertical-align: -0.22ex;
  margin: 0 0.15em;
  font-size: inherit;
  line-height: 0;
}

mjx-container[jax="SVG"][display="true"] {
  display: block;
  text-align: center;
  margin: 1.25rem auto;
  max-width: 100%;
  overflow-x: auto;
  overflow-y: hidden;
  padding: 0.5rem 0;
  -webkit-overflow-scrolling: touch;
}

mjx-container[jax="SVG"] > svg {
  fill: currentColor;
  stroke: currentColor;
  max-width: 100%;
  height: auto;
  vertical-align: middle;
}
```

### 2. Robust Loader & Dynamic MutationObserver (`src/header.php`)
- **Expanded Delimiter Detection**: `/\$\$[\s\S]+?\$\$|\$[^$\n]+\$|\\\[[\s\S]+?\\\]|\\\([\s\S]+?\\\)|\begin\{[a-z*]+\}/i`.
- **Sequential Promise Queue**: `typesetQueue = typesetQueue.then(() => mj.typesetPromise(targets))`.
- **Dynamic Mutation Observer**: Listens for added nodes containing TeX delimiters and triggers `window.ensureMathJax(node)` automatically.
- **Resilient Fallback**: Falls back to official CDN if local file encounters an error.

---

## 4. Verification & Testing Plan
1. **Math Practice Suite**: Open `/student/math-practice.php`, generate multiple problem types, and verify MathJax proofs display with proper baseline and colors.
2. **Standards Explorer**: Open `/pages/standards.php`, filter by high school algebra and geometry, verify multi-line LaTeX renders correctly.
3. **Mobile Responsive Overflow**: Verify wide equations in block displays scroll smoothly on narrow viewports without clipping or overflowing cards.
