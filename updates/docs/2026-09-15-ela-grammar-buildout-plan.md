---
title: "Implementation Plan: Modernized Grammar & Vocabulary Hub with Lecture Modal, Lexile Modes, & Sentence Playground"
date: "2026-09-15"
category: "Implementation Plan"
tags: ["ELA", "Grammar", "Vocabulary", "Lecture Modal", "Lexile", "Playground", "WCAG"]
summary: "Refined plan preserving existing 6 resource cards, modernizing page styling, upgrading popups to expansive lecture style with Standard vs Basic English Lexile toggle, and adding an interactive sentence playground at the bottom."
author: "Antigravity & Hesten"
---

# Implementation Plan: Modernized Grammar & Vocabulary Hub (`student/ela-grammar.php`)

## Overview & User Requirements
Based on user specifications:
1. **Preserve Content & Structure**: Retain all current 6 resource cards and 30 topics on `student/ela-grammar.php`.
2. **No Breadcrumbs**: Do not add breadcrumbs.
3. **Modernized Page Styling**: Update styling to reflect the platform's sleek, modern design language (radial gradients, glassmorphism surface elevations, rounded pill badges, high-contrast borders, dark mode support).
4. **Expansive Lecture-Style Popups with Lexile Toggle**:
   - Make popups noticeably larger (`max-width: 860px`).
   - Format them in a rich lecture style: in-depth concept breakdown, subject explanation (e.g. noun classes, syntactic roles), clear annotated examples, and common pitfalls.
   - Include a **Lexile Level / English Mode Toggle**:
     - **Current / Standard English**: Comprehensive academic vocabulary and standard Lexile reading depth.
     - **Basic English**: Simplified vocabulary, direct short sentences, and plain language explanations for ESL/ELL and neurodiversity-friendly accessibility.
5. **Interactive Sentence Playground at Bottom**:
   - Live interactive sandbox at the bottom of `student/ela-grammar.php`:
     - Text input with sample presets.
     - Dynamic **Parts of Speech Colorizer** (tagging nouns, verbs, adjectives, adverbs, prepositions, conjunctions).
     - **Sentence Structure & Voice Inspector** (clauses, active vs passive voice, reading complexity metrics).
     - **Grammar & Homophone Doctor** (real-time diagnostics).

---

## Proposed Changes

### 1. Lecture-Style Popup & Lexile Support
#### [MODIFY] [`src/resource-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/resource-modal.php)
- Upgrade modal card width from `620px` to expansive `860px` with responsive padding.
- Add **Lexile Level Switcher** in the modal toolbar:
  - Toggle between `Current / Standard English` and `Basic English`.
- Enrich grammar lesson entries with structured lecture data:
  - `standardDefinition` & `basicDefinition` (tailored Lexile levels).
  - `conceptBreakdown`: Structured explanation of subject types, functions, and rules.
  - `standardExample` & `basicExample`: Highlighted real-world sentences with grammatical callouts.
  - `proTip`: Key pitfall or test-taking strategy.
  - `quiz`: Quick interactive practice check.
- Update `openDynamicModal(topicName)` and TTS speech synthesis to dynamically respect the selected Lexile mode.

#### [MODIFY] [`assets/css/components/resource-modal.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/resource-modal.css)
- Increase modal content `max-width` to `860px`.
- Add lecture-style card styling: concept breakdown badges, color-coded callouts, Lexile toggle pill controls, and responsive grid layouts.

---

### 2. Modernized Page Styling & Preserved Resources
#### [MODIFY] [`student/ela-grammar.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/ela-grammar.php)
- **Hero & Search Header**:
  - Elevate visual hierarchy with gradient badges, refined typography, and search input with instant clear action.
  - Retain all 7 filter tabs (`All Topics`, `Parts of Speech`, `Punctuation`, `Vocabulary`, `Common Errors`, `Sentences`, `Figurative Language`).
- **Retain Existing 6 Resource Cards**:
  - Keep all 30 topics across Parts of Speech, Punctuation, Vocabulary, Common Errors, Sentence Structure, and Figurative Language.
  - Elevate cards with sleek border glows, category-specific icons, and refined topic pills.
- **Sentence Mechanics Workshop**:
  - Modernize workbench card styling, streak badge animations, and responsive token buttons.

---

### 3. Interactive Sentence Playground
#### [MODIFY] [`student/ela-grammar.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/ela-grammar.php)
- Add `<section id="grammar-playground" class="grammar-playground-workbench">` directly above footer:
  - **Sentence Input & Presets**: Live typing area with one-click presets (e.g. Action Adventure, Science Mystery, Complex Clause).
  - **Parts of Speech Live Highlighter**: Parses and color-codes each word into interactive tokens (Nouns, Verbs, Adjectives, Adverbs, Prepositions, Conjunctions, Pronouns).
  - **Voice & Clause Analyzer**: Automatically detects sentence type (Simple, Compound, Complex) and Active vs Passive voice.
  - **Grammar & Mechanics Diagnostics**: Real-time error checks (capitalization, double spacing, missing punctuation, homophone cautions).
  - **Metrics Dashboard**: Word count, clause count, and readability index.

#### [MODIFY] [`assets/css/pages/student-resources.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/student-resources.css)
- Add styling for the Grammar Playground: interactive sandbox, token badges, live feedback indicators, and responsive controls.

---

## Verification Plan

### Automated Verification
1. `node -e "..."` PHP tag balance check on `student/ela-grammar.php` and `src/resource-modal.php`.
2. Node.js `vm.Script` syntax verification on JavaScript engines.

### Manual Verification
1. Open multiple topic pills (e.g., *Nouns & Pronouns*, *Comma Usage*, *Active vs. Passive Voice*) and verify:
   - Popup is wider and formatted in lecture style.
   - Lexile toggle between "Current" and "Basic English" instantly updates the explanation and examples.
   - Listen / TTS button reads the active Lexile level.
2. Verify all 6 resource cards and 30 topics remain present and functional.
3. Test the Sentence Playground at the bottom:
   - Type custom sentences and click presets.
   - Verify parts of speech token highlighting, active/passive voice detection, and grammar diagnostics.
