---
title: "Universal Mandatory WCAG, A11y & UDL Compliance Standards Plan"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Accessibility", "A11y", "WCAG", "UDL", "Section 508", "Architecture", "Invariants"]
summary: "Permanent implementation plan establishing non-negotiable compliance invariants across all pages, templates, scripts, and components for WCAG 2.1/2.2 AA & AAA, digital accessibility (A11y), and Universal Design for Learning (UDL)."
author: "Antigravity & Hesten"
---

# Universal Mandatory WCAG, A11y & UDL Compliance Standards Plan

## 1. Executive Summary
This document codifies a strict, non-negotiable platform mandate: **Hesten's Learning must comply with WCAG 2.1/2.2 Level AA & AAA, Assistive Technology (A11y), and CAST Universal Design for Learning (UDL) guidelines at all times and across all modules without exception.**

---

## 2. Core Architectural Principles & Invariants

### A. WCAG 2.1 / 2.2 Level AA & AAA Invariants
1. **Perceivable**:
   - **Accessible Names**: All buttons, links, controls, and form inputs must have programmatic and descriptive accessible names (`aria-label`, visible text, or `<label for="...">`).
   - **Alternative Text**: Informative graphics require descriptive `alt` text; decorative graphics must feature empty `alt=""` and `aria-hidden="true"`.
   - **Contrast Minimums**: Minimum 4.5:1 for standard body text (AA), 3:1 for large text/icons, and 7:1 for enhanced High Contrast mode (AAA). Never rely exclusively on color to convey meaning.
   - **Viewport Scaling**: `user-scalable=no` and `maximum-scale=1.0` are strictly prohibited. The interface must zoom up to 200%+ and reflow down to 320px width without horizontal blowout.

2. **Operable**:
   - **100% Keyboard Operability**: Every interactive element must be keyboard focusable (`Tab`/`Shift+Tab`) and activatable (`Enter`/`Space`).
   - **Focus Preservation**: Outlines must never be removed (`outline: none`) without an explicit high-visibility `:focus-visible` indicator.
   - **Skip Links**: The global skip navigation anchor (`#main-content`) must remain intact at the top of every page.
   - **Target Dimensions**: Interactive tap targets must measure at least 44×44px.

3. **Understandable**:
   - Semantic HTML5 structure (single `<h1>` heading per page, hierarchical `<h2>`-`<h6>` sections).
   - Clear language and cognitive aids: OpenDyslexic typography, bionic reading, reading masks, and line/letter spacing adjusters.

4. **Robust**:
   - Clean ARIA state attributes (`aria-expanded`, `aria-selected`, `aria-controls`, `aria-modal="true"`).
   - ARIA live regions (`aria-live="polite"`) for asynchronous status notifications and score changes.

### B. Universal Design for Learning (UDL) Standards
1. **Multiple Means of Representation**:
   - Pair text with auditory synthesized read-aloud (TTS), synchronized karaoke highlighting, and MathJax mathematical notation.
2. **Multiple Means of Action & Expression**:
   - Provide diverse interaction options: keyboard hotkeys, clickable multiple choice, draggable manipulatives, and speech-to-text dictation.
3. **Multiple Means of Engagement**:
   - Support low-anxiety modes, untimed assessments, customizable study goals, sensory retreat presets, and IEP/504 accommodation persistence.

---

## 3. Enforcement & Verification Protocol
- Any pull request, refactor, or feature generation must run an accessibility checklist.
- Violations of contrast, focus visibility, keyboard navigation, or viewport zoom are treated as critical blocking regressions.
