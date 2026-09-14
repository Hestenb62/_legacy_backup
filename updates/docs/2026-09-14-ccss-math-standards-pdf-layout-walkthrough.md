---
title: "Common Core Mathematics Authentic Publication PDF Layout"
date: "2026-09-14"
category: "Walkthrough"
tags: ["Standards", "CCSS", "Mathematics", "A11y", "Typography", "UI/UX"]
summary: "Re-engineered pages/standards.php for Mathematics into an authentic publication sheet mirroring the official Common Core State Standards for Mathematics PDF publication, complete with running crimson headers, 2-column Grade Overviews, Mathematical Practices shaded cards, tinted domain banners, and footnotes."
author: "Antigravity & Hesten"
---

# Common Core Mathematics Authentic Publication PDF Layout

## Overview
To fulfill the user request (*"i would like to have the standatds page (math for now) look exactly as the ccss math standards pdf does"*), we redesigned the presentation of Mathematics on `pages/standards.php` to faithfully mirror the layout and typography of the official CCSS publication document (`assets/data/k.pdf`, pages 9–12).

---

## Key Changes & Architecture

### 1. Data Layer (`assets/data/standards-ccss-math.json`)
- **Verbatim Kindergarten Publication Content**: Injected the full narrative from `k.pdf`, including the lead instructional time focus paragraph and full Critical Area paragraphs:
  - **(1) Whole Numbers & Quantities**: Exploring number relationships, small set cardinalities, and representations including simple equations like $5 + 2 = 7$ and $7 - 2 = 5$.
  - **(2) Shapes and Space**: Describing the physical world using geometric ideas, 2D and 3D shapes, and spatial modeling.
- **Cluster Subheadings & Footnotes**: Structured all 5 Kindergarten domains (`K.CC`, `K.OA`, `K.NBT`, `K.MD`, `K.G`) with official cluster titles (`Know number names and the count sequence`, etc.) and official CCSS footnotes ($^1$, $^2$, $^3$).
- **Mathematical Practices Array**: Added the canonical 8 Mathematical Practices (MP.1 through MP.8) to the grade schema.

### 2. Stylesheet Architecture (`assets/css/pages/standards.css`)
- **Document Mode Container (`.curr-grid.is-ccss-doc`)**:
  - Restructures the standard split grid (2/3 + 1/3) into a publication document sheet (max-width `62rem`, centered).
  - Unifies `.curr-card-overview` and `.curr-card-standards` into a seamless publication sheet with zero awkward gap.
  - Automatically suppresses external duplicate sidebar widgets (Key Competencies, separate Practices widget) as these are now embedded natively inside the Grade Overview document.
- **Publication Typography & Components (`.ccss-pdf-*`)**:
  - `.ccss-pdf-running-header`: Official top crimson banner with uppercase tracking and quick jump button to the CCSS Glossary & situation tables.
  - `.ccss-pdf-page-stamp`: Subtitle edge stamp with grade indication.
  - `.ccss-pdf-main-title`: Bicolor publication title (`Mathematics | Kindergarten`).
  - `.ccss-pdf-critical-area`: Shaded crimson callout boxes for Critical Areas (1) and (2).
  - `.ccss-pdf-overview-grid`: 2-column Grade Overview matching PDF page 10:
    - **Left Column**: Domain cluster summary bullet list grouped by domain.
    - **Right Column (`.ccss-pdf-practices-card`)**: Shaded neutral box containing the 8 Mathematical Practices.
  - `.ccss-pdf-domain-strip`: Tinted domain banner (`#f4ecee` light / dark crimson in dark mode) with left-aligned bold domain name and right-aligned crimson code badge (e.g. `K.CC`).
  - `.ccss-pdf-cluster-header` & `.curr-cluster-heading`: Bold lettered cluster subheadings preceding standard items.
  - `.ccss-pdf-footnotes`: Dedicated bottom footnote list.
  - Comprehensive Dark Mode (`[data-theme="dark"]`) adaptations ensuring high contrast (WCAG AAA) compliance.

### 3. Standards Page Logic (`pages/standards.php`)
- **Adaptive Presentation Mode**: In `renderGrade()`, checks `currentSubject === 'math'`:
  - When `math`, applies `.is-ccss-doc` to `.curr-grid`, constructs the running crimson header, 2-column Grade Overview, and shaded Mathematical Practices box.
  - When non-math subjects are selected, removes `.is-ccss-doc` and gracefully preserves the standard 2/3 + 1/3 split layout.
- **Domain Accordion Headers**:
  - In math mode, wraps each domain header as a `.ccss-pdf-domain-strip` displaying the clean domain title and the short domain code pill (e.g., `K.CC`).
  - Retains 100% accessible accordion functionality (`role="button"`, `aria-expanded="true"`, `tabindex="0"`, Enter/Space key triggers).
- **Hoisted Code Extraction**: Hoisted `getDomainShortCode(domainStr)` above domain iteration so both the domain filter buttons and publication domain banners utilize concise, standardized codes (`K.CC`, `K.OA`, `K.NBT`, `K.MD`, `K.G`).
- **MathJax Typography**: Enhanced MathJax rendering queue to typeset both the standards container and the newly rendered publication overview card.

---

## Verification Results

| Requirement | Implementation / Status | Verification |
|---|---|---|
| **Publication Running Header** | `.ccss-pdf-running-header` with uppercase text and Glossary jump | Verified |
| **Bicolor Main Title** | `Mathematics \| [Grade]` matching PDF cover | Verified |
| **Critical Areas** | Narrative lead + Critical Areas (1) & (2) callouts | Verified |
| **Two-Column Grade Overview** | Domain clusters on left, shaded Mathematical Practices on right | Verified |
| **Domain Header Banners** | Tinted `#f4ecee` strip with crimson title & right-aligned code badge (`K.CC`, `K.OA`, etc.) | Verified |
| **Cluster Headings** | Official bold subheadings grouping standard items | Verified |
| **Footnotes** | Official footnotes ($^1$, $^2$, $^3$) appended at document base | Verified |
| **A11y & Keyboard Navigation** | 100% keyboard operability, visible focus rings, aria tags | Verified |
| **Non-Math Integrity** | Clean fallback to 2/3 + 1/3 layout when switching subjects | Verified |
| **JS Syntax & JSON Validity** | Node.js syntax & JSON parse validation passed with 0 errors | Verified |
