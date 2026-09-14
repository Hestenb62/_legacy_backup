---
title: "Ingestion of Full CCSS Mathematics Standards from Math_Standards1.pdf (Grades 1–12)"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Standards", "CCSS", "Mathematics", "Curriculum", "Data Ingestion"]
summary: "Comprehensive architectural plan to parse assets/data/Math_Standards1.pdf and systematically ingest authentic Common Core State Standards data for all remaining grades (1st through 8th Grade and High School 9th–12th) into assets/data/standards-ccss-math.json."
author: "Antigravity & Hesten"
---

# Ingestion of Full CCSS Mathematics Standards from Math_Standards1.pdf (Grades 1–12)

## Goal Description
Ingest the complete, authentic text, critical areas, domain cluster overviews, standards specifications, cluster headings, and footnotes from `assets/data/Math_Standards1.pdf` (93 pages) for all remaining grades:
- **Elementary School**: Grade 1, Grade 2, Grade 3, Grade 4, Grade 5
- **Middle School**: Grade 6, Grade 7, Grade 8
- **High School**: Grades 9–12 (Algebra I, Geometry, Algebra II, Pre-Calculus/Advanced Modeling)
into `assets/data/standards-ccss-math.json`.

---

## User Review Required
> [!IMPORTANT]
> - All grades will be upgraded from 1-sentence summaries to authentic CCSS publications containing full Critical Areas, cluster headings, domain summaries, and footnotes.
> - Kindergarten is already fully migrated and verified; Pre-K foundations will remain untouched.
> - High School standards will be mapped to the existing course sequences (9th Grade Algebra I, 10th Grade Geometry, 11th Grade Algebra II / Functions, 12th Grade Pre-Calculus / Modeling & Advanced (+)) while also maintaining a unified `High School` entry if referenced.

---

## Proposed Changes

### Data Pipeline & Parsing
1. **Automated High-Fidelity Extraction Script (`scratch/parse_math_pdf.js`)**:
   - Extract page ranges per grade from `assets/data/Math_Standards1.pdf` using our scratch `pdf-parse` engine:
     - **Grade 1**: Pages 13–16
     - **Grade 2**: Pages 17–20
     - **Grade 3**: Pages 21–26
     - **Grade 4**: Pages 27–32
     - **Grade 5**: Pages 33–38
     - **Grade 6**: Pages 39–45
     - **Grade 7**: Pages 46–51
     - **Grade 8**: Pages 52–57
     - **High School (9th–12th)**: Pages 58–84
   - Extract:
     - `overview`: Lead paragraph + `<div class="ccss-critical-area"><p><strong>(N) Title:</strong> Description...</p></div>`
     - `competencies`: Array of `"Domain Name: Cluster Title"` entries matching the Grade Overview left column
     - `practices`: Canonical 8 Mathematical Practices (MP.1–MP.8)
     - `standards`: HTML strings grouping standards by domain, with `<h5 class="curr-cluster-heading">Cluster Title</h5>` and `<p class="curr-standard-desc"><strong>CODE:</strong> Description</p>`
     - `footnotes`: Array of official footnotes (e.g. `<sup>1</sup> ...`)
   - Validate extracted data against the PDF source.

2. **Update `assets/data/standards-ccss-math.json`**:
   - Safely update `math.grades["1st Grade"]` through `math.grades["12th Grade"]`.
   - Preserve Pre-K and Kindergarten data.
   - Ensure 100% valid JSON formatting via Node `JSON.parse`.

---

## Verification Plan

### Automated Verification
- Run Node verification script on `assets/data/standards-ccss-math.json`:
  - Ensure `JSON.parse()` passes without syntax errors.
  - Assert that all 12 grades contain valid `overview`, `standards`, `competencies`, `practices`, and `footnotes`.
  - Check that total standards count across all grades exceeds 400+ authentic CCSS math standards.

### Functional UI Verification
- Load `pages/standards.php` for:
  - 1st Grade Math: check running header, 4 critical areas, 2-column Grade 1 Overview, domain strips (`1.OA`, `1.NBT`, `1.MD`, `1.G`), cluster headings, and footnotes.
  - 4th Grade Math: check fractions, operations, measurement & data (`4.OA`, `4.NBT`, `4.NF`, `4.MD`, `4.G`).
  - 8th Grade Math: check linear equations, functions, Pythagorean theorem (`8.NS`, `8.EE`, `8.F`, `8.G`, `8.SP`).
  - High School (9th-12th): verify algebra, functions, geometry, and modeling standards with `is-ccss-doc` styling.
