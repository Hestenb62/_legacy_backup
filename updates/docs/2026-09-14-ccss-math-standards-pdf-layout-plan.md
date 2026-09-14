---
title: "Implementation Plan: CCSS Mathematics Standards Authentic PDF Document Layout"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Standards", "CCSS", "Math", "Typography", "UI/UX"]
summary: "Transform the Standards Explorer (Math) to mirror the exact visual design, typography, cluster hierarchy, and editorial layout of the official CCSS Mathematics standards document."
author: "Antigravity & Hesten"
---

# Implementation Plan: CCSS Mathematics Standards Authentic PDF Document Layout

## 1. Goal Description
Redesign the presentation of the Mathematics standards in `pages/standards.php` so that it faithfully reproduces the official Common Core State Standards (CCSS) Mathematics publication layout (as exemplified in `assets/data/k.pdf`).

This transforms the page from a generic accordion list into an authentic, publication-grade digital standards document with:
- The distinctive CCSS dark crimson header banner (`COMMON CORE STATE STANDARDS for MATHEMATICS`).
- Authentic `Mathematics | [Grade Name]` cover title and Critical Areas narrative blocks.
- The official two-column Grade Overview (Domain cluster summary on the left, shaded Mathematical Practices callout box on the right).
- Authentic domain banners (warm tinted horizontal bar with bold domain name on the left and dark crimson code pill on the right).
- Lettered cluster headings (`A. Know number names and the count sequence.`).
- Hierarchical standard numbering (`1.` + standard code badge `K.CC.A.1` + indented body text + lettered sub-standards `a.`, `b.`, `c.`).
- Authentic publication footnotes (`¹`, `²`, `³`) at the bottom of the standards section.

---

## 2. Proposed Architecture & Visual Design

### A. Authentic CCSS Color Palette & Styling Tokens
- **CCSS Crimson Accent**: `#802834` (Deep Crimson / Maroon)
- **CCSS Crimson Dark / Border**: `#5C1D26`
- **Domain Banner Tint**: `#F4ECEE` (Light warm blush / taupe tint; dark mode: `rgba(128, 40, 52, 0.25)`)
- **Document Sheet Surface**: `#FFFFFF` / warm paper surface (`#FCFBF9`) with subtle page shadow
- **Mathematical Practices Box**: `#F3F4F6` shaded card with crisp border
- **Typography**: Clean, high-legibility sans-serif with refined editorial kerning and line-height matching the print document.

### B. Layout Components (Three-Part Authentic Structure)
1. **Document Header**:
   - Running crimson band across the document top with `COMMON CORE STATE STANDARDS for MATHEMATICS`.
   - Running grade stamp (e.g. `KINDERGARTEN | 9`).
   - Major title: `Mathematics | Kindergarten` with crimson accent.
   - Lead paragraph and numbered Critical Areas `(1)`, `(2)` formatted as elegant editorial callouts.

2. **Grade Overview (Side-by-Side Grid)**:
   - Left side: Domain categories in crimson with bulleted cluster objectives.
   - Right side: Shaded Mathematical Practices card with numbered practices (1–8).

3. **Standards Specification**:
   - Full-width domain banner: Domain Name (left) and Domain Code Badge (right, e.g. `K.CC`).
   - Cluster Subheading: `A. Know number names and the count sequence.`
   - Standard item: Indented with standard number (`1.`), code pill (`K.CC.A.1`), and standard description.
   - Sub-items: Indented lowercase letters (`a.`, `b.`, `c.`).
   - Footnotes block: Thin horizontal rule with superscripted footnotes corresponding to references in the text.

4. **Preserved Functionalities**:
   - Interactive search and domain filtering buttons.
   - Click-to-copy standard codes (`.std-code-badge`).
   - Standard info trigger (`.std-info-btn`) opening the detailed dossier.
   - Student mastery checkmark indicators.
   - Print guide and Export utilities.

---

## 3. Files to Modify

### 1. [`pages/standards.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php)
- Add CCSS document container markup (`.ccss-doc-sheet`) when Subject is Math.
- Render the authentic 3-part layout:
  - Running header banner
  - Critical areas narrative
  - Side-by-side Grade Overview & Mathematical Practices card
  - Domain bars with lettered cluster headers and hierarchical standards
  - Footnotes section
- Maintain compatibility with search filtering and domain pill selection.

### 2. [`assets/css/pages/standards.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/standards.css)
- Implement `.ccss-doc-*` styling rules:
  - `.ccss-doc-running-header`
  - `.ccss-doc-title-row`
  - `.ccss-doc-critical-areas`
  - `.ccss-doc-overview-grid`
  - `.ccss-doc-practices-box`
  - `.ccss-doc-domain-banner`
  - `.ccss-doc-cluster-heading`
  - `.ccss-doc-standard-row`
  - `.ccss-doc-substandard`
  - `.ccss-doc-footnotes`
- Ensure full responsive reflow (stacks on mobile `< 768px`) and high-contrast dark mode support.

### 3. [`assets/data/standards-ccss-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-ccss-math.json)
- Ensure Kindergarten entry has the full Critical Areas narrative and footnotes from `k.pdf` so the renderer has complete text for all sections.

---

## 4. Verification Plan
- **Visual Accuracy**: Verify layout against `assets/data/k.pdf` side-by-side (Header banner, Critical Areas 1 & 2, Grade K Overview two-column layout, Domain banners, Cluster headers, Standards indentation, Footnotes).
- **Functionality**: Verify search filter, domain filter buttons, click-to-copy standard codes, print guide, and dossier modals.
- **Accessibility & Responsiveness**: Test keyboard navigation (`Tab`, `Space`, `Enter`), responsive reflow at 320px, 768px, and 1200px+, and color contrast compliance.
