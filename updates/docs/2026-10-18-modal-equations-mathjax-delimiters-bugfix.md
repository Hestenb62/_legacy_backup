---
title: "Universal MathJax TeX Delimiter Enclosure & Modal Equation Typesetting Bugfix"
date: "2026-10-18"
version: "v2.23.1"
category: "Bugfix"
tags: ["MathJax", "LaTeX", "ELA Grammar", "Modals", "Accessibility"]
summary: "Resolved raw LaTeX strings appearing in ELA Grammar and academic popups by automatically wrapping equation formulas in TeX display delimiters, pre-priming MathJax background loading, and enforcing active modal typesetting."
author: "Antigravity & Hesten"
---

# Universal MathJax TeX Delimiter Enclosure & Modal Equation Typesetting Bugfix

## Executive Summary
An issue was identified where formulas in the **Grammar & Vocabulary** popups (`student/ela-grammar.php`) were displayed as raw unformatted LaTeX strings (such as `\text{Current Prose} \xrightarrow{\text{Allusion}} \text{Mythological / Historical Canon} \implies \text{Instant Context Evocation}`). 

Investigation revealed that while `src/header.php` properly loads and configures MathJax with TeX input and SVG output, MathJax's TeX preprocessor strictly scans DOM content for explicit mathematical delimiters (`$$...$$`, `\[...\]`, `$...$`, or `\(...\)`). In `src/resource-modal.php`, all 162 academic equations across Math, Science, Social Studies, and ELA were being injected directly as unadorned strings without delimiters inside `<div class="equation-vault-latex">${eq.latex}</div>`. Consequently, MathJax's text scanner ignored the raw LaTeX strings as plain text.

## Root Cause Analysis
1. **Missing TeX Display Delimiters**: MathJax's TeX input processor relies on configured delimiters (`inlineMath` and `displayMath`) to locate mathematical expressions in text nodes. In `src/resource-modal.php`, `renderModalTopic` rendered `${eq.latex}` directly into `.equation-vault-latex` without wrapping them in `$$...$$`.
2. **On-Demand MathJax Deferral**: On non-math landing pages like `student/ela-grammar.php`, MathJax was not preloaded during initial page parse, creating a potential race condition where modal content was injected before the MathJax bundle was loaded and initialized.
3. **Hidden Layout Measurement**: Calling `ensureMathJax` before the modal container transitioned to `display: flex` prevented the SVG renderer from measuring container metrics accurately.

## Key Changes Implemented

### 1. Automated TeX Delimiter Enclosure (`src/resource-modal.php`)
- Implemented `formatEquationLatex(latex)` in `renderModalTopic`:
  ```javascript
  const formatEquationLatex = (latex) => {
      if (!latex) return '';
      const trimmed = String(latex).trim();
      if (trimmed.startsWith('$$') && trimmed.endsWith('$$')) return trimmed;
      if (trimmed.startsWith('\\[') && trimmed.endsWith('\\]')) return trimmed;
      if (trimmed.startsWith('\\(') && trimmed.endsWith('\\)')) return trimmed;
      if (trimmed.startsWith('$') && trimmed.endsWith('$')) return trimmed;
      return `$$${trimmed}$$`;
  };
  ```
- All formula items inside `.equation-vault-latex` now reliably output enclosed in display math delimiters (`$$...$$`).

### 2. Proactive MathJax Priming & Active Modal Typesetting (`src/resource-modal.php`)
- Added background pre-priming at the dataset loader stage:
  ```javascript
  if (typeof window !== 'undefined' && typeof window.ensureMathJax === 'function') {
      window.ensureMathJax();
  }
  ```
- Enforced active modal typesetting in `openDynamicModal`:
  ```javascript
  if (typeof window.ensureMathJax === 'function') {
      const eqWrap = document.getElementById('dynamic-modal-equations-wrap');
      if (eqWrap && eqWrap.style.display !== 'none') {
          window.ensureMathJax(eqWrap).then(mj => {
              if (mj && mj.typesetPromise) {
                  mj.typesetPromise([eqWrap]).catch(e => console.debug('MathJax active modal typeset note:', e));
              }
          }).catch(e => console.debug('ensureMathJax active modal note:', e));
      }
  }
  ```

### 3. Immediate MathJax Preloading for ELA Grammar (`student/ela-grammar.php`)
- Added `$requiresMathJax = true;` before including `../src/header.php`, ensuring MathJax loads immediately on page load.

### 4. Balanced Equation Vault Typography (`assets/css/components/resource-modal.css`)
- Added vertical margin overrides for MathJax display SVGs inside equation vault cards:
  ```css
  .equation-vault-latex mjx-container[display="true"] {
      margin: 0.35rem 0 !important;
  }
  ```

### 5. Platform Version & Footer Documentation Synchronization
- Bumped platform semantic version to `v2.23.1` across `src/header.php` and `src/footer.php`.
- Updated release constants and added the feature breakdown in the "What's in Version [X]" release modal.

## Verification & Testing
- **PHP Tag Balance**: Verified balanced `<?php` and `?>` tags across all modified files.
- **JavaScript Syntax**: Validated `src/resource-modal.php` using Node.js `vm.Script` with 0 errors.
- **Delimiter Enclosure**: Tested `formatEquationLatex` against the user-reported string `\text{Current Prose} \xrightarrow{\text{Allusion}} \text{Mythological / Historical Canon} \implies \text{Instant Context Evocation}` and all 162 equation items; 100% formatted with valid TeX delimiters.
