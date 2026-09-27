---
title: "Grade 9 Multi-Subject Dedicated JSON Curriculum Architecture Plan"
date: "2026-09-27"
category: "Implementation Plan"
tags: ["Curriculum", "Grade 9", "JSON", "Architecture", "Math", "ELA", "Science", "Social Studies"]
summary: "Plan for establishing dedicated, on-demand JSON curriculum files in /assets/data/ for all four Grade 9 subjects (Math, ELA, Social Studies, Science) with rich module overviews and topic descriptions."
author: "Antigravity & Hesten"
---

# Grade 9 Multi-Subject Dedicated JSON Curriculum Architecture Plan

## Problem Statement & Goals
Currently, Grade 9 Mathematics references EngageNY outline data, while ELA, Science, and Social Studies rely on general standards blurbs. The user requested:
1. Four dedicated JSON files in `/assets/data/` for Grade 9:
   - `curriculum-grade-9-math.json` (Algebra I)
   - `curriculum-grade-9-ela.json` (English 9: Literary Analysis, Rhetoric & Composition)
   - `curriculum-grade-9-science.json` (Biology & Integrated High School Physical Science)
   - `curriculum-grade-9-social.json` (World History, Human Geography & Global Studies)
2. Each file must provide:
   - Subject metadata (name, key, icon, course title, course overview).
   - Core competencies list.
   - Full modules list with **Module Overview** (explaining what the module covers).
   - Topic breakdown within each module with **Topic Description** (what it covers) and **Focus Standards**.
3. **On-Demand (Lazy) Loading**:
   - The JSON files must **only be fetched when the curriculum popup is opened for Grade 9**, keeping the initial landing page load fast and efficient.
   - Cached in memory after first load so subsequent opens are instant.
4. **Visual Layout & Multi-Subject Tabs**:
   - Maintains multi-subject tabs (`Mathematics`, `English Language Arts`, `Science`, `Social Studies`) at the top of the modal.
   - Each subject pane renders in the approved clean format (Course Card, Module Overview, Topic Cards with descriptions and focus standard chips).

---

## Technical Architecture & File Structure

### 1. Data Files in `/assets/data/`
- [`/assets/data/curriculum-grade-9-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-math.json): 5 Modules (Relationships & Equations, Descriptive Statistics, Linear & Exponential Functions, Polynomial & Quadratic Functions, Modeling Synthesis) with 17 topics.
- [`/assets/data/curriculum-grade-9-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-ela.json): 4 Modules (Narrative Craft & Foundational Fiction, Informational Rhetoric & Argumentation, Dramatic Literature & Poetic Structure, Research Synthesis & Multimedia Presentations) with 16 topics.
- [`/assets/data/curriculum-grade-9-science.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-science.json): 4 Modules (Cellular Biology & Biomolecules, Genetics & Heredity, Ecology & Dynamic Ecosystems, Evolution & Biological Diversity) with 16 topics.
- [`/assets/data/curriculum-grade-9-social.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-grade-9-social.json): 4 Modules (Global Geographies & Early Civilizations, Empires & Cultural Exchange, The Age of Revolutions & Industrialization, Modern Global Conflicts & Contemporary Society) with 16 topics.

### 2. Lazy Loading & Modal Integration in `assets/js/index-main.js`
- Create `async function loadGrade9CurriculumData()`:
  - Checks if `window._grade9CurriculumCache` exists.
  - If not, triggers `Promise.all` fetching the 4 JSON endpoints from `/assets/data/curriculum-grade-9-[subject].json`.
  - Stores result in `window._grade9CurriculumCache`.
- Update `openDocModal(title, docs, card)`:
  - If `title === 'Grade 9'` or `curriculumGradeKey === '9th Grade'`, display a smooth loading indicator inside the modal container and trigger `loadGrade9CurriculumData()`.
  - Once resolved, render the multi-subject tabbed layout using the loaded JSON modules.
  - If any fetch error occurs, gracefully fall back to the existing default rendering.

### 3. Rendering Pipeline
- Unified renderer `renderCurriculumSubjectPane(subjData, index, curriculumGradeKey)`:
  - Subject toolbar & print button.
  - Course card with badge, course title, and course overview.
  - Optional core competencies bullet points.
  - "Instructional Modules & Topics" heading.
  - Collapsible module cards with:
    - Module Overview Box.
    - Topic Cards with badge, title, detailed description of what it covers, and clickable focus standards.

---

## Verification Plan
1. Check that files exist in `/assets/data/` and validate JSON syntax using `node`.
2. Verify `openDocModal` for Grade 9 performs on-demand fetch and renders all 4 subjects with their module overviews and topic descriptions.
3. Verify keyboard navigation (`Tab`, `Space`, `Enter`, `Esc`), high contrast, and dark mode.
4. Verify non-Grade-9 grade cards are completely unaffected.
5. Create walkthrough documentation upon completion in `updates/docs/2026-09-27-grade-9-all-subjects-json-curriculum-walkthrough.md`.
