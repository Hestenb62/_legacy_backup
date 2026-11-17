---
title: "Implementation Plan: Grade 10 ELA Full Curriculum & Digital Library Reading Pages"
date: "2026-11-16"
version: "v2.42.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 10", "EngageNY", "Curriculum", "Library", "Accessibility"]
summary: "Comprehensive architectural and implementation plan for building Grade 10 ELA (Level L) across all 4 modules (148 lessons), extracting anchor literature into dedicated Library reading pages, updating curriculum indexes, and ensuring universal WCAG AA/AAA and UDL compliance."
author: "Antigravity & Hesten"
---

# Implementation Plan: Grade 10 ELA Full Curriculum & Digital Library Reading Pages

## Executive Summary
This implementation plan establishes the end-to-end strategy for delivering Grade 10 English Language Arts (Level L) on Hesten's Learning platform, sourcing directly from the EngageNY ELA Grade 10 curriculum repository (`C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 10`).

Grade 10 ELA consists of 4 core modules spanning 148 rigorous lessons, integrating seminal literature, poetry, Shakespearean tragedy, investigative journalism, civil rights rhetoric, bioethics research, and philosophical treatises:
- **Module 1 (34 Lessons)**: *Identity, Expectation, and Culture*
  - Topic A (Unit 1, 7 lessons): Christopher Marlowe, Sir Walter Raleigh, William Carlos Williams (Pastoral Poetry dialogue)
  - Topic B (Unit 2, 13 lessons): Ethan Canin's *"The Palace Thief"*
  - Topic C (Unit 3, 14 lessons): H.G. Bissinger's *Friday Night Lights*
- **Module 2 (37 Lessons)**: *Rhetoric, Human Rights, and Argument*
  - Topic A (Unit 1, 11 lessons): Martin Luther King, Jr.'s *"Letter from Birmingham Jail"*
  - Topic B (Unit 2, 11 lessons): Julia Alvarez's *"A Genetics of Justice"*
  - Topic C (Unit 3, 15 lessons): *The Universal Declaration of Human Rights* & Eleanor Roosevelt's *"On the Adoption of the Universal Declaration of Human Rights"*
- **Module 3 (39 Lessons)**: *Researching Complex Questions*
  - Topic A (Unit 1, 11 lessons): Rebecca Skloot's *The Immortal Life of Henrietta Lacks* & Bioethics
  - Topic B (Unit 2, 14 lessons): Inquiry, Source Evaluation, and Perspective Analysis
  - Topic C (Unit 3, 14 lessons): Synthesis, Argumentation, and Research Drafting
- **Module 4 (38 Lessons)**: *Fate, Ambition, and Power*
  - Topic A (Unit 1, 14 lessons): E.B. White's *"Death of a Pig"* & Tragic Arc
  - Topic B (Unit 2, 24 lessons): William Shakespeare's *The Tragedy of Macbeth*
  - Topic C (Unit 3, 10+ lessons): Niccolò Machiavelli's *The Prince*

All anchor literary selections will be ingested into the Digital Library as standalone reading pages (`/library/?page=<slug>`), ensuring they are **strictly decoupled from the Book catalog shelves** (`bookd.json` / `books.json`).

---

## 1. Architectural Strategy & Directory Map

### 1.1 Digital Library Anchor Reading Pages (`library/assets/pages/<slug>.json`)
All anchor texts will be parsed and formatted with rich structural markup (epigraphs, scene dividers, stanzas, paragraph indices, and citations):
1. `the-passionate-shepherd-to-his-love.json` (Christopher Marlowe)
2. `the-nymphs-reply-to-the-shepherd.json` (Sir Walter Raleigh)
3. `raleigh-was-right.json` (William Carlos Williams)
4. `the-palace-thief.json` (Ethan Canin)
5. `friday-night-lights.json` (H.G. Bissinger)
6. `letter-from-birmingham-jail.json` (Martin Luther King, Jr.)
7. `a-genetics-of-justice.json` (Julia Alvarez)
8. `universal-declaration-of-human-rights.json` (United Nations General Assembly)
9. `on-the-adoption-of-the-udhr.json` (Eleanor Roosevelt)
10. `the-immortal-life-of-henrietta-lacks.json` (Rebecca Skloot)
11. `death-of-a-pig.json` (E.B. White)
12. `macbeth-grade-10.json` (William Shakespeare)
13. `the-prince-excerpts.json` (Niccolò Machiavelli)

Each page adheres to the canonical schema:
```json
{
  "slug": "the-passionate-shepherd-to-his-love",
  "type": "reading",
  "title": "The Passionate Shepherd to His Love",
  "author": "Christopher Marlowe",
  "source": "EngageNY Grade 10 ELA Module 1 Unit 1 Selection",
  "gradeLevel": "Grade 10",
  "moduleInfo": "Module 10.1, Unit 1",
  "backLessonUrl": "/levels/l.php?subject=ela&module=1&lesson=1",
  "citation": "Marlowe, Christopher. 'The Passionate Shepherd to His Love' (1599).",
  "sections": [
    {
      "heading": "Stanzas 1–6",
      "paragraphs": [
        "Come live with me and be my love...",
        "..."
      ]
    }
  ]
}
```

### 1.2 Modular Lesson JSON Datasets (`assets/data/lessons/l-ela-m[1-4].json`)
Each module file is structured as:
- `assets/data/lessons/l-ela-m1.json`: 34 lessons
- `assets/data/lessons/l-ela-m2.json`: 37 lessons
- `assets/data/lessons/l-ela-m3.json`: 39 lessons
- `assets/data/lessons/l-ela-m4.json`: 38 lessons

Every lesson features:
- Standards alignment (`RL.9-10.*`, `RI.9-10.*`, `W.9-10.*`, `L.9-10.*`)
- Tier-2 and Tier-3 contextual vocabulary with parts of speech and definitions
- Distraction-free problem set containing text-dependent questions and a culminating Quick Write analytical prompt
- Expandable teacher answer keys with evidence-based criteria
- Direct 1-click printing (`printProblemSet()`)
- Auto-saving student response areas persisting in `localStorage`

### 1.3 Routing & UI Hub Integration
1. **Level L Hub (`levels/l.php`)**:
   - Dynamic single-lesson router intercepting `$_GET['lesson']` or `$_GET['mod']` and rendering the interactive reader.
   - Dynamic `$ela_modules` loader pulling from `assets/data/lessons/l-ela-m[1-4].json`.
   - Complete Grade 10 module grid with topic tabs, vocabulary preview pills, and progress indicators.
2. **Curriculum Registry (`assets/data/curriculum-engageny-ela.json`)**:
   - Register `grades["10th Grade"]` with complete module and topic hierarchies.
3. **Master Lessons Index (`assets/data/lessons.json`)**:
   - Append all 148 Grade 10 ELA lessons for universal search and cross-referencing.

---

## 2. Universal A11y & UDL Compliance
- **Keyboard Navigation**: All tab switchers, accordions, and textareas operable via `Tab`, `Enter`, `Space`, `Esc`.
- **High-Contrast Focus Indicators**: `3px solid var(--accent)` outline replacement.
- **Multimodal Support**: Screen reader live announcements (`aria-live="polite"`), dyslexia font toggling, and clean typography reflow down to 320px viewports.
- **Cognitive Accommodations**: Low-anxiety untimed practice, immediate hint reveals, and step-by-step close reading scaffolds.

---

## 3. Execution Phases

| Phase | Milestone | Deliverable |
|-------|-----------|-------------|
| **Phase 1** | Ingest & Generate Grade 10 Library Reading Pages | `library/assets/pages/*.json` (13 anchor texts) |
| **Phase 2** | Build Grade 10 ELA Datasets (Modules 1–4) | `assets/data/lessons/l-ela-m[1-4].json` (148 lessons) |
| **Phase 3** | Update Curriculum Registries & Master Lesson Index | `curriculum-engageny-ela.json`, `lessons.json` |
| **Phase 4** | Hydrate Level L Hub & Dynamic Single-Lesson Router | `levels/l.php` |
| **Phase 5** | Verification & CLI Testing | PHP CLI route tests, JSON validation, A11y checks |
| **Phase 6** | Platform Release Sync & Documentation | `src/header.php`, `src/footer.php`, `hc-grade-10-ela-complete.md`, walkthrough |
