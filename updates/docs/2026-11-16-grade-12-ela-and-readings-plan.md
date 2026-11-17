---
title: "Implementation Plan: Grade 12 ELA Full Curriculum & Digital Library Reading Pages"
date: "2026-11-16"
version: "v2.44.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 12", "Level N", "EngageNY", "Curriculum", "Library", "Accessibility"]
summary: "Comprehensive architectural and implementation plan for building Grade 12 ELA (Level N) across all 4 modules (154 lessons), extracting anchor literature into dedicated Library reading pages, updating curriculum indexes, and ensuring universal WCAG AA/AAA and UDL compliance."
author: "Antigravity & Hesten"
---

# Implementation Plan: Grade 12 ELA Full Curriculum & Digital Library Reading Pages

## Executive Summary
This implementation plan establishes the architectural roadmap for Grade 12 English Language Arts (Level N) on Hesten's Learning platform, sourcing directly from the official EngageNY ELA Grade 12 curriculum repository (`C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 12`).

Grade 12 ELA represents the capstone of secondary English education, spanning 154 rigorous lessons across 4 core modules that bridge personal narrative self-definition, political philosophy, Roman tragedy, anthropological history, dramatic tension, and cross-cultural identity:
- **Module 1 (41 Lessons)**: *Personal Narrative, Cultural Heritage, and Self-Definition*
  - Topic A (Unit 1, 28 lessons): *The Autobiography of Malcolm X* (as told to Alex Haley)
  - Topic B (Unit 2, 6 lessons): Leslie Marmon Silko's *"Yellow Woman and a Beauty of the Spirit"*
  - Topic C (Unit 3, 7 lessons): College Application Narrative Writing Workshop
- **Module 2 (38 Lessons)**: *Civil Resistance, Power, and Roman Tragedy*
  - Topic A (Unit 1, 16 lessons): Henry David Thoreau's *Civil Disobedience*
  - Topic B (Unit 2, 22 lessons): William Shakespeare's *The Tragedy of Julius Caesar*
- **Module 3 (38 Lessons)**: *Anthropological Inquiry and Global Argumentation*
  - Topic A (Unit 1, 27 lessons): Jared Diamond's *Guns, Germs, and Steel* & Inquiry Synthesis
  - Topic B (Unit 2, 11 lessons): Academic Research-Based Argument Essay Drafting & Citation
- **Module 4 (37 Lessons)**: *Desire, Illusion, and Cross-Cultural Identity*
  - Topic A (Unit 1, 14 lessons): Tennessee Williams's *A Streetcar Named Desire* & Jimmy Santiago Baca's *"A Daily Joy to Be Alive"*
  - Topic B (Unit 2, 23 lessons): Nikolai Gogol's *"The Overcoat"* & Jhumpa Lahiri's *The Namesake*

All anchor literary selections will be ingested into the Digital Library as standalone reading pages (`/library/?page=<slug>`), ensuring they are **strictly decoupled from book catalog shelves** (`bookd.json` / `books.json`).

---

## 1. Architectural Strategy & Directory Map

### 1.1 Digital Library Anchor Reading Pages (`library/assets/pages/<slug>.json`)
1. `the-autobiography-of-malcolm-x.json` (Malcolm X & Alex Haley)
2. `yellow-woman-and-a-beauty-of-the-spirit.json` (Leslie Marmon Silko)
3. `civil-disobedience.json` (Henry David Thoreau)
4. `julius-caesar-grade-12.json` (William Shakespeare)
5. `guns-germs-and-steel.json` (Jared Diamond)
6. `a-streetcar-named-desire.json` (Tennessee Williams)
7. `a-daily-joy-to-be-alive.json` (Jimmy Santiago Baca)
8. `the-overcoat.json` (Nikolai Gogol)
9. `the-namesake.json` (Jhumpa Lahiri)

Each page adheres to the canonical schema:
```json
{
  "slug": "<slug>",
  "type": "reading",
  "title": "<Title>",
  "author": "<Author>",
  "source": "<EngageNY Edition / Original Publication>",
  "gradeLevel": "Grade 12 ELA (Level N)",
  "moduleInfo": "Module 12.<X>, Unit <Y>",
  "backLessonUrl": "/levels/n.php?lesson=n-ela-m<X>-<topic>-1",
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

### 1.2 Modular Lesson JSON Datasets (`assets/data/lessons/n-ela-m[1-4].json`)
- `assets/data/lessons/n-ela-m1.json`: 41 lessons
- `assets/data/lessons/n-ela-m2.json`: 38 lessons
- `assets/data/lessons/n-ela-m3.json`: 38 lessons
- `assets/data/lessons/n-ela-m4.json`: 37 lessons
Total: 154 lessons.

### 1.3 Routing & UI Hub Integration
1. **Level N Hub (`levels/n.php`)**:
   - Dynamic single-lesson router intercepting `$_GET['lesson']` or query string `?n-ela-m...` and dispatching to `lesson_renderer.php`.
   - Dynamic `$modules` loader reading `$subject === 'ela'` from `assets/data/curriculum-engageny-ela.json`.
2. **Curriculum Registry (`assets/data/curriculum-engageny-ela.json`)**:
   - Register `grades["12th Grade"]` with complete module and topic hierarchies.
3. **Master Lessons Index (`assets/data/lessons.json`)**:
   - Append all 154 Grade 12 ELA lessons for universal search and cross-referencing.

---

## 2. Universal A11y & UDL Compliance
- **Keyboard Navigation**: 100% keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`).
- **Focus Indicators**: `:focus-visible` high-contrast outline replacement.
- **Cognitive Accommodations**: Auto-saving textareas (`localStorage`), expandable teacher answer keys, untimed practice, and 1-click printing (`printProblemSet()`).

---

## 3. Execution Phases

| Phase | Milestone | Deliverable |
|-------|-----------|-------------|
| **Phase 1** | Ingest & Generate Grade 12 Library Reading Pages | `library/assets/pages/*.json` (9 anchor texts) |
| **Phase 2** | Build Grade 12 ELA Datasets (Modules 1–4) | `assets/data/lessons/n-ela-m[1-4].json` (154 lessons) |
| **Phase 3** | Update Curriculum Registries & Master Lesson Index | `curriculum-engageny-ela.json`, `lessons.json` |
| **Phase 4** | Verify Level N Hub & Dynamic Single-Lesson Router | `levels/n.php` |
| **Phase 5** | Verification & CLI Testing | PHP CLI route tests, JSON validation, A11y checks |
| **Phase 6** | Platform Release Sync & Documentation | `src/header.php`, `src/footer.php`, `hc-grade-12-ela-complete.md`, walkthrough |
