---
title: "Grade 9 ELA Curriculum Buildout & Interactive Worksheets Implementation Plan"
date: "2026-10-31"
version: "v2.34.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 9", "EngageNY", "Curriculum", "Worksheets", "Level K"]
summary: "Architectural blueprint for building out the Grade 9 English Language Arts curriculum from EngageNY materials in P12EngageNY-ELA-EXTA, delivering 153 lessons across 4 modules with close reading analysis, vocabulary codices, and quick write worksheets."
author: "Antigravity & Hesten"
---

# Grade 9 ELA Curriculum Buildout Implementation Plan

## 1. Overview & Objective
Building upon the successful completion of the P-12 Mathematics Curriculum milestone and the clean decommissioning of the legacy math-vocab page, this plan establishes the architecture and buildout strategy for the **Grade 9 English Language Arts (ELA)** curriculum (Level K) sourced from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 9`.

Grade 9 ELA encompasses **153 total lessons** across 4 modules:
- **Module 1 (48 Lessons):** Reading Closely and Writing to Learn: How Do Authors Develop Character, Theme, and Perspective?
  - *Unit 1 (17 Lessons):* Karen Russell, "St. Lucy's Home for Girls Raised by Wolves" (Lessons 1–17)
  - *Unit 2 (11 Lessons):* Rainer Maria Rilke, "Letters to a Young Poet" (Lessons 1–11)
  - *Unit 3 (20 Lessons):* William Shakespeare, *Romeo and Juliet* (Lessons 1–20)
- **Module 2 (46 Lessons):** Understanding Perspectives and Writing to Convince
  - *Unit 1 (13 Lessons):* Atticus Finch's closing argument from *To Kill a Mockingbird*
  - *Unit 2 (20 Lessons):* Informational analysis and argumentative perspectives
  - *Unit 3 (13 Lessons):* Synthesis and multi-perspective comparative writing
- **Module 3 (30 Lessons):** Researching to Deepen Understanding
  - *Unit 1 (10 Lessons):* Formulating inquiry questions and pre-searching
  - *Unit 2 (12 Lessons):* Gathering, evaluating, and synthesizing research sources
  - *Unit 3 (8 Lessons):* Developing evidence-based perspective and synthesis synthesis
- **Module 4 (29 Lessons):** Writing Argument to Clarify Thinking
  - *Unit 1 (29 Lessons):* Developing arguments on globalization and international trade

---

## 2. Interactive Worksheet-First ELA Standard

In alignment with platform guidelines and user preferences:
1. **Curriculum Alignment & Metadata:**
   - Assessed and addressed Common Core ELA standards (e.g., `RL.9-10.1`, `RL.9-10.4`, `W.9-10.2`).
   - Clear reading section citations (pages, line numbers, acts/scenes).
2. **Key Vocabulary Table:**
   - Direct vocabulary definitions provided by the curriculum.
   - Contextual vocabulary to analyze in close reading.
3. **Close-Reading Text-Dependent Problem Set:**
   - Structured analysis questions extracted directly from EngageNY lesson plans.
   - Digital student scratchpad textareas (`localStorage` auto-saving per question).
   - Expandable teacher solutions displaying exemplar student answers and citations.
4. **Quick Write / Analytical Synthesis Prompt:**
   - Formal writing task with Short Response Rubric guidance.
   - Dedicated long-form digital student essay/response box.
   - Exemplar High Performance Response in teacher accordion.
5. **1-Click High-Fidelity Printing:**
   - **Print Blank Worksheet:** Paper-ready printable reading and writing analysis packet.
   - **Print Completed Work:** Formats typed notes and essay responses for submission.
6. **Zero Pedagogy/Research Clutter:**
   - Free of external linking badges, leaving pure focus on literature and writing.

---

## 3. Data Architecture & Storage Schema

- Datasets stored in `assets/data/lessons/`:
  - `k-ela-m1.json` (Module 1, 48 lessons)
  - `k-ela-m2.json` (Module 2, 46 lessons)
  - `k-ela-m3.json` (Module 3, 30 lessons)
  - `k-ela-m4.json` (Module 4, 29 lessons)
- Curriculum sequence catalog:
  - `assets/data/curriculum-engageny-ela.json`
- Master lesson registry:
  - `assets/data/lessons.json` (synchronized with all 153 lessons)
- Level router integration:
  - `levels/k.php` updated with `$ela_modules` reflecting authentic units and lessons.

---

## 4. Phased Execution Roadmap

1. **Phase 1: Module 1 Extraction & Buildout (Units 1, 2, and 3 — 48 lessons)**
   - Extract `9.1.1.l1` through `9.1.1.l17`, `9.1.2.l1` through `9.1.2.l11`, `9.1.3.l1` through `9.1.3.l20`.
   - Compile into `assets/data/lessons/k-ela-m1.json`.
2. **Phase 2: Router & Renderer Integration**
   - Update `levels/k.php` with Module 1 outline and single-lesson query router support for `k-ela-*`.
   - Verify lesson rendering with student workspace, teacher keys, and print output.
3. **Phase 3: Modules 2, 3, and 4 Buildout**
   - Extract and compile `k-ela-m2.json`, `k-ela-m3.json`, and `k-ela-m4.json`.
4. **Phase 4: Registries, Help Center & Platform Version Bump**
   - Register in `curriculum-engageny-ela.json` and `lessons.json`.
   - Create Help Center guide `assets/text/hc-grade-9-ela-complete.md`.
   - Bump platform release version and publish walkthrough.

