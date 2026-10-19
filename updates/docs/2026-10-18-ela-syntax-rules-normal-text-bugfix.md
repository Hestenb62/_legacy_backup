---
title: "ELA Syntax Rules & Structural Formulations Normal Text Display"
date: "2026-10-18"
version: "v2.23.2"
category: "Bugfix"
tags: ["ELA Grammar", "ELA Literature", "Syntax Rules", "Typography", "Accessibility"]
summary: "Decoupled MathJax from all English Language Arts pages and popups, converting all 162 grammar formulations and literary mappings into clean, high-contrast native text with clear Unicode symbols."
author: "Antigravity & Hesten"
---

# ELA Syntax Rules & Structural Formulations Normal Text Display

## Executive Summary
Per user direction, MathJax mathematical rendering was completely removed from all **English Language Arts (ELA)** pages and study popups (including `student/ela-grammar.php` and `student/ela-literature.php`). In place of pseudo-mathematical LaTeX typesetting, all 162 syntax rules, concord formulas, and narratological structures across all 54 ELA topics now render directly as clean, human-readable normal text with intuitive Unicode indicators (`➔`, `⟹`, `⟺`, `≠`, `+`, `×`).

## Problem Description
Previously, ELA lessons in `src/resource-modal.php` stored linguistic and grammar rules in LaTeX notation (e.g. `\text{Current Prose} \xrightarrow{\text{Allusion}} \text{Mythological / Historical Canon} \implies \text{Instant Context Evocation}`). This created several user experience issues:
1. MathJax script loading and typesetting were unnecessarily forced onto non-math English language learning environments.
2. English sentences, parts of speech, and literature principles were formatted as mathematical equations, creating visual confusion for students.
3. Attempting to parse text rules through MathJax caused raw LaTeX markup or typesetting delay.

## Solution & Architecture Changes

### 1. Converted All 162 ELA Formulas to Native Normal Text (`src/resource-modal.php`)
Every formula across all 54 ELA lessons in `grammarLessons` was converted into clean, human-readable text. For example:
- **Idioms & Allusions**:
  - `Current Prose ➔ [Allusion] ➔ Mythological / Historical Canon ⟹ Instant Context Evocation`
  - `Meaning(Idiom) ≠ Sum of LiteralDefinition(Word (i))`
  - `Idiom(Surface Words) ➔ [Cultural Heritage Base] ➔ Intended Pragmatic Message`
- **Nouns & Pronouns**:
  - `Antecedent(N (gender, number)) ⟺ Pronoun(P (gender, number))`
  - `Subjective (Nominative) ➔ [action] ➔ Objective (Accusative) ➔ [possession] ➔ Possessive (Genitive)`
  - `NP = (Determiner) + (Adjective Phrase) + Noun (Head) + (Prepositional / Relative Clause)`
- **Verbs & Tenses**:
  - `Verb Formulation = Tense (Past / Present / Future) × Aspect (Simple / Continuous / Perfect / Perfect-Cont)`
  - `Present Perfect = [have / has] + V (3) and Past Perfect = [had] + V (3)`
  - `Subject (agent) + V (transitive) + Object ⟹ Object + [be] + V (3) + (by Subject (agent))`

### 2. ELA MathJax Decoupling & Specialized DOM Rendering (`src/resource-modal.php`)
- `renderModalTopic()` now checks `isELA`. For ELA topics, equations render as `<div class="syntax-rule-text">${eq.latex}</div>` without MathJax delimiters.
- MathJax typesetting is strictly skipped when `isELA` is true:
  ```javascript
  if (!isELA && typeof window.ensureMathJax === 'function') {
      window.ensureMathJax(modalCard);
  }
  ```
- In `openDynamicModal()`, MathJax is bypassed when opening any ELA modal.
- Background MathJax pre-priming is skipped on all ELA pages (`ela-*`).

### 3. Removed `$requiresMathJax` from `student/ela-grammar.php`
- Stripped `$requiresMathJax = true;` from `student/ela-grammar.php`. ELA pages now load cleanly with zero MathJax script overhead.

### 4. High-Contrast Accessible Typography (`assets/css/components/resource-modal.css`)
- Styled `.syntax-rule-card` and `.syntax-rule-text`:
  ```css
  .syntax-rule-card {
      border-left: 3px solid var(--color-primary, #0284c7);
  }
  .syntax-rule-text {
      font-family: var(--font-sans, 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif);
      font-size: 0.98rem;
      font-weight: 600;
      line-height: 1.6;
      color: var(--color-text-main, #0f172a);
      background: color-mix(in srgb, var(--color-primary, #0284c7) 5%, var(--color-surface, #ffffff));
      border: 1px solid color-mix(in srgb, var(--color-primary, #0284c7) 16%, transparent);
      border-radius: 0.5rem;
      padding: 0.65rem 0.85rem;
  }
  ```

### 5. Help Center & Platform Release Sync
- Updated `assets/text/hc-ela-grammar-popups.md` to document native normal-text syntax rules.
- Bumped platform release version to `v2.23.2` in `src/header.php` and `src/footer.php`.

## Verification & Validation
- **Node.js Script Validation**: `new vm.Script()` syntax checks on all inline JavaScript in `src/resource-modal.php` passed with 0 errors.
- **PHP Tag Balance**: Verified balanced open and close PHP tags across all modified files.
- **No LaTeX / Zero MathJax on ELA**: Confirmed that all 54 ELA topics render readable native text in `.syntax-rule-text` with no `\text`, `\xrightarrow`, or `$$` delimiters.
