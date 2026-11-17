---
title: "Implementation Plan: Grade 11 ELA Full Curriculum & Digital Library Reading Pages"
date: "2026-11-16"
version: "v2.43.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 11", "Level M", "EngageNY", "Curriculum", "Library", "Accessibility"]
summary: "Comprehensive architectural and implementation plan for building Grade 11 ELA (Level M) across all 4 modules (155 lessons), extracting anchor literature into dedicated Library reading pages, updating curriculum indexes, and ensuring universal WCAG AA/AAA and UDL compliance."
author: "Antigravity & Hesten"
---

# Implementation Plan: Grade 11 ELA Full Curriculum & Digital Library Reading Pages

## Executive Summary
This implementation plan establishes the architectural roadmap for Grade 11 English Language Arts (Level M) on Hesten's Learning platform, sourcing directly from the official EngageNY ELA Grade 11 curriculum repository (`C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 11`).

Grade 11 ELA spans 155 rigorous lessons across 4 core modules, immersing junior students in psychological drama, American rhetoric, the African American intellectual tradition, women's suffrage and agency, iterative research synthesis, and modernist narrative craft:
- **Module 1 (39 Lessons)**: *Interactions of Elements, Tragic Flaw, and Gender Autonomy*
  - Topic A (Unit 1, 6 lessons): Robert Browning's *"My Last Duchess"*
  - Topic B (Unit 2, 25 lessons): William Shakespeare's *The Tragedy of Hamlet*
  - Topic C (Unit 3, 8 lessons): Virginia Woolf's *A Room of One's Own*
- **Module 2 (40 Lessons)**: *Rhetoric, Identity, and Agency in American Democracy*
  - Topic A (Unit 1, 26 lessons): W.E.B. Du Bois's *"Of Our Spiritual Strivings"* (*The Souls of Black Folk*), Booker T. Washington's *"Atlanta Compromise Speech"*, and Thomas Jefferson's *The Declaration of Independence*
  - Topic B (Unit 2, 14 lessons): Elizabeth Cady Stanton's *"An Address by Elizabeth Cady Stanton"* and Audre Lorde's *"From the House of Yemanjá"*
- **Module 3 (38 Lessons)**: *Inquiry, Investigation, and Synthesis: Researching Complex Questions*
  - Topic A (Unit 1, 11 lessons): Seed Inquiries & Source Mapping
  - Topic B (Unit 2, 15 lessons): Evaluating Credibility & Synthesizing Multi-Perspective Evidence
  - Topic C (Unit 3, 12 lessons): Evidence-Based Argument Writing & Formal Citation
- **Module 4 (38 Lessons)**: *Narrative Technique, Selfhood, and Social Awakening*
  - Topic A (Unit 1, 16 lessons): Tim O'Brien's *"On the Rainy River"* (*The Things They Carried*) and Louise Erdrich's *"The Red Convertible"*
  - Topic B (Unit 2, 22 lessons): Kate Chopin's *The Awakening*

All anchor literary selections will be ingested into the Digital Library as standalone reading pages (`/library/?page=<slug>`), ensuring they are **strictly decoupled from book catalog shelves** (`bookd.json` / `books.json`).

---

## 1. Architectural Strategy & Directory Map

### 1.1 Digital Library Anchor Reading Pages (`library/assets/pages/<slug>.json`)
1. `my-last-duchess.json` (Robert Browning)
2. `hamlet-grade-11.json` (William Shakespeare)
3. `a-room-of-ones-own.json` (Virginia Woolf)
4. `the-souls-of-black-folk.json` (W.E.B. Du Bois)
5. `atlanta-compromise-speech.json` (Booker T. Washington)
6. `declaration-of-independence.json` (Thomas Jefferson)
7. `an-address-by-elizabeth-cady-stanton.json` (Elizabeth Cady Stanton)
8. `from-the-house-of-yemanja.json` (Audre Lorde)
9. `on-the-rainy-river.json` (Tim O'Brien)
10. `the-red-convertible.json` (Louise Erdrich)
11. `the-awakening.json` (Kate Chopin)

Each page adheres to the canonical schema:
```json
{
  "slug": "<slug>",
  "type": "reading",
  "title": "<Title>",
  "author": "<Author>",
  "source": "<EngageNY Edition / Original Publication>",
  "gradeLevel": "Grade 11 ELA (Level M)",
  "moduleInfo": "Module 11.<X>, Unit <Y>",
  "backLessonUrl": "/levels/m.php?lesson=m-ela-m<X>-<topic>-1",
  "citation": "<Formal MLA Citation>",
  "sections": [
    {
      "heading": "<Section / Act / Chapter Heading>",
      "epigraph": { "quote": "...", "attribution": "..." },
      "paragraphs": [...]
    }
  ]
}
```

### 1.2 Modular Lesson JSON Datasets (`assets/data/lessons/m-ela-m[1-4].json`)
- `assets/data/lessons/m-ela-m1.json`: 39 lessons
- `assets/data/lessons/m-ela-m2.json`: 40 lessons
- `assets/data/lessons/m-ela-m3.json`: 38 lessons
- `assets/data/lessons/m-ela-m4.json`: 38 lessons
Total: 155 lessons.

### 1.3 Routing & UI Hub Integration
1. **Level M Hub (`levels/m.php`)**:
   - Dynamic single-lesson router intercepting `$_GET['lesson']` or query string `?m-ela-m...` and dispatching to `lesson_renderer.php`.
   - Dynamic `$modules` loader reading `$subject === 'ela'` from `assets/data/curriculum-engageny-ela.json`.
2. **Curriculum Registry (`assets/data/curriculum-engageny-ela.json`)**:
   - Register `grades["11th Grade"]` with complete module and topic hierarchies.
3. **Master Lessons Index (`assets/data/lessons.json`)**:
   - Append all 155 Grade 11 ELA lessons for universal search and cross-referencing.

---

## 2. Universal A11y & UDL Compliance
- **Keyboard Navigation**: 100% keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`).
- **Focus Rings**: `:focus-visible` high-contrast outline replacement.
- **Cognitive Accommodations**: Auto-saving textareas (`localStorage`), expandable teacher answer keys, untimed practice, and 1-click printing (`printProblemSet()`).

---

## 3. Execution Phases

| Phase | Milestone | Deliverable |
|-------|-----------|-------------|
| **Phase 1** | Ingest & Generate Grade 11 Library Reading Pages | `library/assets/pages/*.json` (11 anchor texts) |
| **Phase 2** | Build Grade 11 ELA Datasets (Modules 1–4) | `assets/data/lessons/m-ela-m[1-4].json` (155 lessons) |
| **Phase 3** | Update Curriculum Registries & Master Lesson Index | `curriculum-engageny-ela.json`, `lessons.json` |
| **Phase 4** | Verify Level M Hub & Dynamic Single-Lesson Router | `levels/m.php` |
| **Phase 5** | Verification & CLI Testing | PHP CLI route tests, JSON validation, A11y checks |
| **Phase 6** | Platform Release Sync & Documentation | `src/header.php`, `src/footer.php`, `hc-grade-11-ela-complete.md`, walkthrough |
