---
title: "Grade 9 Multi-Subject Dedicated JSON Curriculum Architecture Walkthrough"
date: "2026-09-27"
category: "Walkthrough"
tags: ["Curriculum", "Grade 9", "JSON", "Architecture", "Math", "ELA", "Science", "Social Studies"]
summary: "Detailed walkthrough of dedicated on-demand JSON curriculum files in /assets/data/ for all 4 Grade 9 subjects (Math, ELA, Science, Social Studies) with rich module overviews and topic descriptions."
author: "Antigravity & Hesten"
---

# Grade 9 Multi-Subject Dedicated JSON Curriculum Architecture Walkthrough

## Overview

All four Grade 9 subjects—**Mathematics (Algebra I)**, **English Language Arts (English 9)**, **Science (Biology)**, and **Social Studies (World History & Geography)**—now load on-demand from their own dedicated JSON curriculum files located in `/assets/data/`.

These files are **only accessed when the Grade 9 curriculum modal is opened**, preserving page load performance while providing comprehensive module overviews, detailed topic descriptions, and focus standards without the clutter of individual lesson links.

---

## Architectural Breakdown

### 1. Dedicated JSON Files in `/assets/data/`

| Subject | JSON File Path | Course Title | Scope & Sequence |
|---|---|---|---|
| **Mathematics** | [`/assets/data/curriculum-grade-9-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-math.json) | Algebra I: Relationships, Equations & Functions | **5 Modules, 17 Topics**: Equations & Graphs, Descriptive Statistics, Linear & Exponential Functions, Polynomial & Quadratic Functions, Modeling Synthesis. |
| **English Language Arts** | [`/assets/data/curriculum-grade-9-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-ela.json) | English 9: Literary Analysis, Rhetoric & Composition | **4 Modules, 16 Topics**: Narrative Craft & Epic Traditions, Informational Rhetoric & Argumentation, Dramatic Literature & Poetic Forms, Multi-Source Research & Synthesis. |
| **Science** | [`/assets/data/curriculum-grade-9-science.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-science.json) | Biology: Living Earth & Life Systems | **4 Modules, 16 Topics**: Biomolecules & Bioenergetics, Molecular Genetics & Heredity, Evolution & Biological Diversity, Dynamic Ecosystems & Biosphere. |
| **Social Studies** | [`/assets/data/curriculum-grade-9-social.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-social.json) | World History & Geography: Civilizations & Global Transformations | **4 Modules, 16 Topics**: River Valley Civilizations & Classical Empires, Medieval Crossroads & Trade, Global Encounters & Revolutions, Industrialization & Modern World. |

### 2. On-Demand (Lazy) Loading Mechanism
- On initial page load of `index.php`, no Grade 9 curriculum JSON files are fetched.
- When the user clicks the **Curriculum** button on the Grade 9 card:
  1. `openDocModal(btn)` detects `curriculumGradeKey === '9th Grade'`.
  2. If data is not yet in `window._grade9CurriculumCache`, it displays a subtle, themed loading spinner and initiates a parallel `Promise.all` fetch for the 4 JSON files.
  3. Once fetched, data is saved in memory (`window._grade9CurriculumCache`) so subsequent modal openings are instant.
  4. `renderGrade9AllSubjectsModal` populates the modal with the 4 subject tabs and full course content.

### 3. Unified Clean UI Layout
Every subject tab provides:
- **Subject Toolbar & Print Button**: Accessible button to print that specific subject's syllabus.
- **Course Card**: Subject icon, course badge, course title, and comprehensive overview.
- **Core Competencies**: List of key skills and learning objectives.
- **Instructional Modules & Topics Accordion**:
  - Module header showing title and topic count.
  - **Module Overview Box** (`.doc-modal-module-overview-box`): Explaining what the module covers.
  - **Topic Cards** (`.doc-modal-topic-card`): Topic pill (e.g. `Topic A`), topic title, thorough description of what it covers, and clickable focus standards chips linking to `/pages/standards.php`.
  - **No cluttered individual lesson links**.

---

## Files Modified

| File | Purpose |
|---|---|
| [`assets/data/curriculum-grade-9-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-math.json) | Dedicated Grade 9 Math (Algebra I) curriculum file. |
| [`assets/data/curriculum-grade-9-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-ela.json) | Dedicated Grade 9 ELA (English 9) curriculum file. |
| [`assets/data/curriculum-grade-9-science.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-science.json) | Dedicated Grade 9 Science (Biology) curriculum file. |
| [`assets/data/curriculum-grade-9-social.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-social.json) | Dedicated Grade 9 Social Studies (World History & Geography) curriculum file. |
| [`assets/js/index-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/index-main.js) | Implemented on-demand lazy loading in `openDocModal` and `renderGrade9AllSubjectsModal`. |
| [`updates/docs/2026-09-27-grade-9-all-subjects-json-curriculum-plan.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-09-27-grade-9-all-subjects-json-curriculum-plan.md) | Architectural plan document. |
| [`updates/docs/2026-09-27-grade-9-all-subjects-json-curriculum-walkthrough.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-09-27-grade-9-all-subjects-json-curriculum-walkthrough.md) | Walkthrough document (this file). |

---

## Verification & Testing

1. **JSON Validation**:
   - All 4 JSON files were validated with Node.js parser (`JSON.parse`). Total modules: 17; total topics: 65 across all 4 subjects.
2. **On-Demand Loading Verification**:
   - Verified that `openDocModal` only triggers JSON network requests when Grade 9 is clicked.
   - Verified that subsequent clicks reuse `window._grade9CurriculumCache`.
3. **Modal Rendering**:
   - Verified that all 4 subject tabs render with course cards, module overviews, and topic cards without individual lesson links.
4. **Non-Regression**:
   - Verified that non-Grade-9 grade cards (Pre-K to Grade 8, Grades 10–12) continue to load their standard curriculum without interruption.
