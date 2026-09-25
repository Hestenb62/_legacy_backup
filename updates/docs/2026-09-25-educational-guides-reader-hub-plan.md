---
title: "Educational Guides & School System Reader Hub: Implementation Plan"
date: "2026-09-25"
category: "Implementation Plan"
tags: ["Guides Hub", "American School System", "Common Core", "IEP 504", "Reader Engine", "TTS Audio", "UDL"]
summary: "Architectural and implementation plan for a new dynamic Educational Guides reader hub at /pages/guides.php and /pages/guide.php, supporting catalog browsing, search/filter, and deep distraction-free reading via ?slug query strings with TTS read-aloud and accessibility controls."
author: "Antigravity & Hesten"
---

# Educational Guides & School System Reader Hub: Implementation Plan

## Overview & User Objective
The user requested a dedicated page under `/pages/` (specifically accessible via `page-name.php?reader-name`) where in-depth educational explainers can be browsed and read. Topics include:
1. **How the American School System Works** (K-12 grade bands, local/state/federal governance, funding mechanisms, Carnegie credits, and high school graduation requirements).
2. **Demystifying Common Core** (Origins, CCSS for Mathematics & English Language Arts, conceptual vs. procedural understanding, debunking common myths, and state adaptations).
3. **Special Education, IEPs & 504 Plans** (Individuals with Disabilities Education Act [IDEA], IEP vs. 504 plan distinctions, accommodations vs. modifications, and parental procedural safeguards).
4. **Standardized Testing & Assessment in the U.S.** (State summative exams, NAEP 'The Nation's Report Card', SAT/ACT, diagnostic screening, and accommodations for diverse learners).
5. **Public, Charter, Magnet, Private & Homeschooling** (Comparative taxonomy of U.S. schooling models, legal structures, curriculum freedom, and considerations for neurodivergent learners).

---

## Architecture & URL Routing

### 1. Dual-Mode Unified Controller (`/pages/guides.php` & `/pages/guide.php`)
- **Catalog View** (`/pages/guides.php`):
  - Hero search bar with instant client-side filtering.
  - Category and audience filters (All, Parents, Educators, Students, School Systems, Special Ed).
  - Clean card grid displaying guide title, reading time, difficulty/audience badge, excerpt, and "Read Guide" action.
- **Reader View** (`/pages/guides.php?<slug>` or `/pages/guides.php?guide=<slug>`):
  - When a query parameter matches an existing guide slug (e.g. `?american-school-system` or `?common-core`), the page automatically transitions into an immersive reader.
  - Provides a back navigation link to the catalog view.
  - Includes sticky toolbar with TTS read-aloud, font sizing (`A-` / `A+`), OpenDyslexic font toggle, and reading progress indicator.
  - Interactive Table of Contents (TOC) with active section tracking.
  - Rich callout boxes (Myth vs. Fact, Parent Takeaway, Classroom Reality).
  - Print/Export optimization for educator handouts and parent conferences.

### 2. File-Based Markdown Guide Storage (`assets/guides/*.md`)
- Guides will be stored in Markdown files under `assets/guides/` with YAML-style frontmatter.
- Allows rapid authoring and drop-in additions of future guides without touching PHP code.
- Dynamic markdown parser renders headings, lists, tables, callout quotes, and diagrams into clean, semantic HTML.

---

## Proposed Changes

### Component 1: Educational Guides Data (`assets/guides/*.md`)
Create 5 in-depth, authoritative, research-backed guides:
1. `assets/guides/american-school-system.md`
2. `assets/guides/demystifying-common-core.md`
3. `assets/guides/special-education-ieps-504.md`
4. `assets/guides/standardized-testing-assessments.md`
5. `assets/guides/school-options-public-charter-private-homeschool.md`

Each guide will feature:
- Clear multi-level structure (`##`, `###`)
- Practical visual diagrams and tables
- Real-world actionable guidance for students, parents, and educators
- Key takeaways and discussion questions

---

### Component 2: Unified Reader Controller (`pages/guides.php` & `pages/guide.php`)
- **File**: [`pages/guides.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guides.php)
  - PHP controller to inspect `$_SERVER['QUERY_STRING']` and `$_GET['guide']`.
  - Scans `assets/guides/*.md` for guide metadata.
  - Renders either the Catalog Hub or the Full Deep Reader.
  - Incorporates MathJax universal rendering, OpenDyslexic font support, and breadcrumbs.
- **File**: [`pages/guide.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guide.php)
  - Alias file that includes `pages/guides.php` to support both singular and plural URL structures.

---

### Component 3: Dedicated Styling & Accessibility (`assets/css/pages/guides.css`)
- **File**: [`assets/css/pages/guides.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/guides.css)
  - Card layouts for catalog hub with hover micro-interactions.
  - Reader layout with sticky header toolbar and reading progress bar.
  - High-contrast callout boxes (`.guide-callout-myth`, `.guide-callout-tip`, `.guide-callout-law`).
  - Table of contents side-nav and scrollspy active indicators.
  - WCAG 2.1/2.2 AAA color contrast compliance in both light and dark modes.
  - Print styles (`@media print`) for clean offline study sheets.

---

### Component 4: Interactive Reader Engine (`assets/js/pages/guides-reader.js`)
- **File**: [`assets/js/pages/guides-reader.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/guides-reader.js)
  - Catalog search and category pill filtering.
  - Text-to-Speech (TTS) audio narration using the Web Speech API with sentence highlighting and speed controls.
  - Dynamic Table of Contents generator and IntersectionObserver scrollspy.
  - Typography adjustments (Font size, OpenDyslexic, line spacing) synced with `localStorage`.
  - Top scroll progress bar tracking reading percentage.

---

## Accessibility & UDL Guarantees
- **Keyboard Navigation**: All interactive elements (filters, audio controls, typography toggles, TOC links) are accessible via `Tab` and `Shift+Tab` with clear `:focus-visible` outlines.
- **Multi-Modal Representation**: Every guide offers dual representation: rich visual layout with callouts/tables, plus full speech synthesis read-aloud.
- **Screen Reader Compatibility**: Semantic `<article>`, `<aside>`, `<nav>`, and `<main>` roles with proper `aria-expanded`, `aria-label`, and `aria-current` states.

---

## Verification Plan

### Automated / Browser Verification
1. Access `/pages/guides.php`: verify catalog display, search filtering, and category pill selection.
2. Access `/pages/guides.php?american-school-system`: verify automatic loading of the deep reader view.
3. Access `/pages/guide.php?common-core`: verify the alias endpoint correctly renders the Common Core guide.
4. Verify all 5 guides load with complete frontmatter, TOC, and callout sections.
5. Verify TTS audio playback (`Listen`, `Pause`, `Resume`, `Stop`) and speed toggling.
6. Verify Dyslexia font toggle and font scaling (`A-` / `A+`).
7. Verify responsive reflow on mobile viewport widths (320px - 768px).
