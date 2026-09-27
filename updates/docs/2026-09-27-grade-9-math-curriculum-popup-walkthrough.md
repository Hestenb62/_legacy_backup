---
title: "Grade 9 Algebra I Curriculum Modal Overhaul Walkthrough"
date: "2026-09-27"
category: "Walkthrough"
tags: ["Curriculum", "Grade 9", "Algebra I", "Modal", "EngageNY", "CCSS"]
summary: "Detailed walkthrough of the revised Grade 9 Algebra I curriculum modal, featuring clear module overviews and comprehensive topic descriptions with focus standards, eliminating individual lesson link clutter."
author: "Antigravity & Hesten"
---

# Grade 9 Algebra I Curriculum Modal Overhaul Walkthrough

## Overview

Based on user feedback, the Grade 9 Mathematics curriculum modal (`#doc-modal`) on `index.php` was refined to restore the clean, classic document flow while streamlining how course content is presented. Instead of overwhelming students and educators with 103 individual lesson links, each module is now presented with a clear **Module Overview** and detailed **Topic Descriptions** explaining what each topic covers alongside its focal CCSS standards.

---

## Key Features & Visual Design

### 1. Consistent Document Flow & Course Header
- Preserves the classic, uncluttered modal layout with standard subject tabs (`Mathematics`, `English Language Arts`, `Science`, `Social Studies`) and sliding pill selector.
- Retains the standard subject toolbar and course card:
  - **Algebra I Badge**: `<i class="fas fa-graduation-cap"></i> Algebra I`
  - **Title**: `Algebra I (EngageNY / CCSS Aligned)`
  - **Course Overview**: Highlighting relationships between quantities, equations, functions, statistics, and modeling.

### 2. Module Overviews Explaining What Each Module Covers
Inside each module accordion card (`.doc-modal-module-card`):
- A prominent **Module Overview Box** provides a clear narrative of the module's instructional scope and real-world mathematical applications.
- Accordion cards support smooth expand/collapse with keyboard access (`Enter` / `Space`) and dynamic topic count badges (e.g. `4 Topics`).

### 3. Detailed Topic Descriptions Without Lesson Link Clutter
- Rather than listing dozens of individual lesson links per module, each topic is presented as a structured **Topic Card** (`.doc-modal-topic-card`):
  - **Topic Badge**: Pill tag indicating the topic letter (e.g. `Topic A`, `Topic B`).
  - **Topic Name**: Human-readable topic title.
  - **Topic Description**: Detailed explanation of the concepts, algebraic techniques, and real-world phenomena covered in that topic.
  - **Focus Standards**: Clickable CCSS standard chips linking directly into the Standards Explorer on `/pages/standards.php`.

### 4. Summary of Modules & Topic Coverage

| Module | Title | Topic Count | Key Areas Covered |
|---|---|---|---|
| **Module 1** | Relationships Between Quantities and Reasoning with Equations and Their Graphs | 4 Topics (A–D) | Narrative function graphs, algebraic structure of expressions, polynomial operations, equation solving logic, creating equations. |
| **Module 2** | Descriptive Statistics | 4 Topics (A–D) | Dot plots, histograms, box plots, standard deviation, IQR, two-way frequency tables, linear regression, residuals. |
| **Module 3** | Linear and Exponential Functions | 4 Topics (A–D) | Arithmetic & geometric sequences, formal function notation, vertical/horizontal graph shifts, exponential growth vs. linear models. |
| **Module 4** | Polynomial and Quadratic Expressions, Equations, and Functions | 3 Topics (A–C) | Rectangle area factoring models, trinomial factoring, standard/vertex/factored forms, completing the square, quadratic formula. |
| **Module 5** | A Synthesis of Modeling with Equations and Functions | 2 Topics (A–B) | Formulation of real-world problems, model selection (linear/quadratic/exponential), parameter interpretation, error analysis. |

### 5. Multi-Subject & Cross-Grade Non-Regression
- Other subjects under Grade 9 (ELA, Science, Social Studies) continue to render cleanly.
- Other grade levels (Pre-K to Grade 8, Grades 10–12) remain completely unaffected.
- Print stylesheets (`printCurriculumSubject`) automatically format the module overviews and topic cards for crisp printing and PDF export.

---

## Files Modified

| File | Changes Made |
|---|---|
| [`assets/data/curriculum-engageny-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-engageny-math.json) | Added `description` and `standards` attributes to all 17 topics across Modules 1–5 in Grade 9 Algebra I. |
| [`assets/css/components/doc-modal.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/doc-modal.css) | Added styles for `.doc-modal-module-overview-box`, `.doc-modal-topic-card`, `.doc-modal-topic-badge`, `.doc-modal-topic-desc`, and `.doc-modal-topic-standards`. |
| [`assets/js/index-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/index-main.js) | Updated `renderGrade9AlgebraPaneHTML` to render the clean classic course card, module overviews, and topic cards without lesson links. |
| [`updates/docs/2026-09-27-grade-9-math-curriculum-popup-walkthrough.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-09-27-grade-9-math-curriculum-popup-walkthrough.md) | Updated walkthrough documentation. |

---

## Verification & Testing

1. **Syntax Check**: `node -c assets/js/index-main.js` passed with exit code 0.
2. **HTML Structure & Output Test**:
   - Confirmed 5 module cards, 17 topic cards, and complete absence of individual lesson item links (`.doc-modal-lesson-item`).
   - Verified that each topic displays its comprehensive narrative description and CCSS standard tags.
3. **Accessibility**:
   - High-contrast text compliance across themes.
   - Accordion controls retain `role="button"`, `tabindex="0"`, and `aria-expanded` attributes.
