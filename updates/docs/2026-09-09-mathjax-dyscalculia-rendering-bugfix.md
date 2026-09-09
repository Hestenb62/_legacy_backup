---
title: "Bugfix: MathJax LaTeX Formula Preservation under Dyscalculia Highlighting"
date: "2026-09-09"
category: "Bugfix"
tags: ["MathJax", "LaTeX", "Dyscalculia", "Accessibility", "Standards Page"]
summary: "Resolved issue where plain text regex replacements corrupted LaTeX delimiters and math syntax before MathJax SVG typesetting on the Standards page."
author: "Antigravity & Hesten"
---

# Bugfix Report: MathJax LaTeX Formula Preservation under Dyscalculia Highlighting

## 1. Problem Description
On [`pages/standards.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php) (e.g., standard `8.EE.A.1`), MathJax equations were displaying corrupted raw HTML tokens (e.g. `$3^2 \times 3^{="math-op math-minus" ...} = ...`) instead of rendered mathematical typography.

## 2. Root Cause
In `accommodation-engine.js`, the `colorizeMathSymbols()` function was executing sequential regex replacements across `.curr-standard-desc` text nodes containing unparsed LaTeX delimiters (`$...$`). This caused two critical issues:
1. Splicing `<span class="math-op ...">` HTML tags directly into LaTeX math expressions (such as exponents and fractions), breaking MathJax's TeX parser.
2. In subsequent replacement passes, regexes matching `/` matched the slash inside closing `</span>` tags, creating corrupted artifacts like `<... >÷span>`.

## 3. Resolution
1. **Protected LaTeX Math Expressions**:
   - `colorizeMathSymbols()` now strictly ignores any text nodes containing TeX delimiters (`$`, `\(`, `\[`). MathJax is left completely untampered to parse and render equations into crisp SVG output.
2. **Safe Tokenized Replacement**:
   - For non-LaTeX plain text elements (e.g. `.formula-list li`), regex tokenization was unified into a single-pass matcher to eliminate any possibility of recursive tag corruption.
3. **Pure MathJax SVG & CHTML Glyph Styling**:
   - Operator colorizing for MathJax expressions is handled cleanly post-render via SVG glyph attributes (`data-c="2B"`, `data-c="2212"`, `data-c="D7"`, `data-c="F7"`, `data-c="3D"`) and dedicated CSS rules in `accommodations.css`.
