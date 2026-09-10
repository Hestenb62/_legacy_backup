---
title: "Implementation Plan: Digital Library Overhaul & General Resources Desks"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Library", "Research Desks", "Reference", "Math", "Language", "Science"]
summary: "Plan for streamlining the Research Desks workspace by removing desk-level search and sort controls, adding a top-level General Resources desk, and creating multi-chapter reference compendiums for Math Facts, Language & Grammar Facts, and Science Laws."
author: "Antigravity & Hesten"
---

# Implementation Plan: Library Research Desks Overhaul & General Resources Repositories

Overhaul the digital library's research desk experience by streamlining desk controls and introducing a new, featured **General Resources Desk** housing comprehensive, multi-chapter repositories for **Math Facts & Formulas**, **Language & Grammar Facts**, and **Science Laws & Constants**.

## User Review Required

> [!IMPORTANT]
> - The main catalog search, category dropdown, lexile filter, view mode switcher, and "Jump Back In" Continue Reading shelf on the main landing page remain untouched and preserved.
> - Within the Research Desks drawer (`#subject-desk-workspace`), the internal search bar (`#drawer-search`) and sort dropdown (`#drawer-sort`) will be removed per user request.
> - The new **General Resources** desk will be placed at the top of the research desks sidebar for immediate scholar access.
> - Each of the 3 books will be created with structured multi-chapter content containing detailed fact tables, formulas with MathJax typography, rules, and reference cheat sheets.

---

## Proposed Changes

### 1. Library Index Markup (`library/index.php`)

#### [MODIFY] [library/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php)
- **Sidebar Menu**: Add `General Resources` at the very top of `<ul class="sidebar-menu">` with `data-desk="General Resources"` and icon `fa-book-atlas` / `fa-layer-group`.
- **Drawer Header Controls**: Remove the search bar container (`#drawer-search-container`) and sort dropdown (`#drawer-sort-container`) from `<div class="drawer-header-right">`, leaving clean header title, breadcrumbs, back button, and close button.
- **Holdings Counter**: Ensure `#drawer-count` reflects the total references in the active desk.

---

### 2. Research Desks Controller (`assets/js/library/lib-subject-research-desks-navigat.js`)

#### [MODIFY] [assets/js/library/lib-subject-research-desks-navigat.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-subject-research-desks-navigat.js)
- Register `'General Resources': 'fa-book-atlas'` in `DESK_ICONS`.
- Add null-checks for `#drawer-search` and `#drawer-sort` so `openResourcePortal()` initializes without exceptions.
- Ensure all sections and cards in the active desk display cleanly.

---

### 3. Educational Desk Data (`library/assets/edu-side-drawer.json`)

#### [MODIFY] [library/assets/edu-side-drawer.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/edu-side-drawer.json)
- Add `"General Resources"` category array containing:
  1. `math-facts-repo`: **Mathematical Facts, Constants & Formulas Compendium**
     - Section: *Foundational Mathematics & Number Theory*
     - Read-online-link: `/library/read/index.php?book=math-facts-repo`
     - Covers arithmetic laws, primes, algebra, geometry theorems, trigonometry identities, calculus.
  2. `language-facts-repo`: **Language, Grammar & Linguistics Compendium**
     - Section: *Language Arts & Rhetoric*
     - Read-online-link: `/library/read/index.php?book=language-facts-repo`
     - Covers 8 parts of speech, syntax, punctuation rules, 30+ literary devices, Greek/Latin roots.
  3. `science-facts-repo`: **Scientific Laws, Physical Constants & Taxonomy Compendium**
     - Section: *Natural Sciences & Scientific Laws*
     - Read-online-link: `/library/read/index.php?book=science-facts-repo`
     - Covers physical constants, SI units, periodic table groups, cell biology, genetics, thermodynamics.

---

### 4. Table of Contents Files (`library/assets/*-toc.json`)

#### [NEW] [library/assets/math-facts-repo-toc.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/math-facts-repo-toc.json)
- Chapter 1: Arithmetic, Primes & Number Systems
- Chapter 2: Algebraic Identities & Equations
- Chapter 3: Geometry Theorems & Trigonometric Identities
- Chapter 4: Calculus Essentials & Mathematical Constants

#### [NEW] [library/assets/language-facts-repo-toc.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/language-facts-repo-toc.json)
- Chapter 1: Parts of Speech & Grammatical Roles
- Chapter 2: Syntax, Sentence Architecture & Punctuation
- Chapter 3: Literary Devices, Figures of Speech & Rhetoric
- Chapter 4: Etymology, Greek/Latin Roots & Morphology

#### [NEW] [library/assets/science-facts-repo-toc.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/science-facts-repo-toc.json)
- Chapter 1: Fundamental Physical Constants & Laws of Motion
- Chapter 2: Atomic Structure, Periodic Table & Chemical Principles
- Chapter 3: Biological Kingdoms, Cell Theory & Genetics
- Chapter 4: Earth Systems, Thermodynamics & Astrophysics

---

### 5. Multi-Chapter Repositories in Digital Reader (`library/read/`)

#### [NEW] [library/read/math-facts-repo/](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/math-facts-repo)
- `index.php`: Controller stub pointing to reader.
- `chapter-1.php`: Arithmetic properties, primes, divisibility rules, number hierarchy.
- `chapter-2.php`: Polynomial laws, quadratic formula, logarithms, exponents, factoring rules.
- `chapter-3.php`: Pythagorean theorem, Euclidean postulates, circle theorems, trig ratios & identities ($sin, cos, tan$).
- `chapter-4.php`: Derivatives, integrals, fundamental theorem of calculus, key constants ($\pi, e, \phi$).

#### [NEW] [library/read/language-facts-repo/](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/language-facts-repo)
- `index.php`: Controller stub.
- `chapter-1.php`: Deep breakdown of 8 parts of speech with examples, irregular verbs, noun classes.
- `chapter-2.php`: Clauses, punctuation mechanics (semicolons, dashes, colons), common usage traps.
- `chapter-3.php`: 30+ literary devices (metaphor, oxymoron, chiasmus, synecdoche) with historical citations.
- `chapter-4.php`: Prefix/suffix/root directory from Latin & Greek with word-building tables.

#### [NEW] [library/read/science-facts-repo/](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/science-facts-repo)
- `index.php`: Controller stub.
- `chapter-1.php`: Newton's laws, universal gravitation, speed of light, Planck constant, electromagnetism.
- `chapter-2.php`: Periodic table groupings, valence rules, stoichiometry, acid-base pH scale.
- `chapter-3.php`: Linnaean taxonomy, organelle functions, DNA replication, Mendel's laws.
- `chapter-4.php`: 4 laws of thermodynamics, plate tectonics, geological eons, astronomical units.

---

## Verification Plan

### Automated Checks
- Validate JSON files syntax (`edu-side-drawer.json`, toc files) with `node -e "JSON.parse(fs.readFileSync(...))"`.
- Validate PHP files syntax with `php -l`.

### Manual & Visual Verification
1. **Research Desk Navigation**:
   - Open `/library/index.php`.
   - Verify "General Resources" appears at the top of the sidebar.
   - Click "General Resources" to open the desk.
   - Verify the 3 books appear with correct titles, descriptions, sections, and cover graphics.
   - Verify search input and sort select are completely absent from the drawer header.
   - Test "Back to Catalog" button returns smoothly to main catalog.
2. **Catalog & Continue Reading**:
   - Verify "Jump Back In" Continue Reading shelf is present and functional.
   - Verify catalog carousel/grid/list views and filters still function on the main page.
3. **Reader Deep-Dive**:
   - Click "Start Reading" on "Math Facts & Formulas".
   - Verify chapters 1-4 load, TOC works, MathJax formulas render sharply with baseline alignment.
   - Test "Language & Grammar Facts" chapters and tables.
   - Test "Science Laws & Constants" chapters.
