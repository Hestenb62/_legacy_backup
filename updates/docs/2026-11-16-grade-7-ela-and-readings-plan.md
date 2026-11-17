---
title: "Grade 7 (Level I) ELA Curriculum and Digital Library Buildout Plan"
date: "2026-11-16"
version: "v2.46.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 7", "Level I", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive implementation plan for the full Grade 7 (Level I) ELA curriculum buildout (6 modules, 238 lessons) and companion Digital Library reading pages."
author: "Antigravity & Hesten"
---

# Grade 7 (Level I) ELA Curriculum and Digital Library Buildout Plan

## 1. Overview & Architectural Scope
This implementation plan establishes the full Grade 7 (Level I) English Language Arts curriculum on Hesten's Learning platform, parsing source materials from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 7`. Grade 7 encompasses 6 full modules (Modules 1, 2A, 2B, 3, 4A, and 4B), totaling 238 rigorous, evidence-based lessons.

All literary and informational anchor texts will be authored as standalone reading pages (`/library/?page=<slug>`), ensuring they are **not displayed as catalog books** (`bookd.json` / `books.json`), while linking directly to and from corresponding ELA lesson problem sets.

---

## 2. Curriculum Structure & Module Breakdown
1. **Module 1: Journeys and Survival — *A Long Walk to Water* & The Second Sudanese Civil War**
   - Anchor Texts: *A Long Walk to Water* (Linda Sue Park), Sudanese Civil War and Lost Boys informational texts.
   - Units: Unit 1 (14 lessons), Unit 2 (19 lessons), Unit 3 (6 lessons) -> 39 lessons (`i-ela-m1.json`).
2. **Module 2A: Working Conditions — *Lyddie* & The Labor Movement**
   - Anchor Texts: *Lyddie* (Katherine Paterson), César Chávez's Commonwealth Club Address (1984), Modern garment industry reports.
   - Units: Unit 1 (20 lessons), Unit 2 (8 lessons), Unit 3 (10 lessons) -> 38 lessons (`i-ela-m2a.json`).
3. **Module 2B: Personal Identity & Transformation — *Pygmalion***
   - Anchor Texts: *Pygmalion* (George Bernard Shaw), Identity personal narratives, Gender stereotypes and counter-advertising.
   - Units: Unit 1 (10 lessons), Unit 2 (19 lessons), Unit 3 (13 lessons) -> 42 lessons (`i-ela-m2b.json`).
4. **Module 3: What Gives Stories Power? — *Narrative of the Life of Frederick Douglass***
   - Anchor Texts: *Narrative of the Life of Frederick Douglass*, Abolitionist poetry (Philip Freneau, Paul Laurence Dunbar).
   - Units: Unit 1 (15 lessons), Unit 2 (16 lessons), Unit 3 (12 lessons) -> 43 lessons (`i-ela-m3.json`).
5. **Module 4A: Science and Society — Adolescent Brain Development & Entertainment Screen Time**
   - Anchor Texts: NIDA / Scholastic ("Teens and Decision Making"), NPR ("The Teen Brain"), Dr. Jay Giedd, Matt Richtel ("Growing Up Digital").
   - Units: Unit 1 (10 lessons), Unit 2 (19 lessons), Unit 3 (10 lessons) -> 39 lessons (`i-ela-m4a.json`).
6. **Module 4B: Science and Society — Water Sustainability & Freshwater Management**
   - Anchor Texts: *The Big Thirst* (Charles Fishman), Barbara Kingsolver ("Water Is Life"), Agricultural and industrial water conservation.
   - Units: Unit 1 (10 lessons), Unit 2 (17 lessons), Unit 3 (10 lessons) -> 37 lessons (`i-ela-m4b.json`).

**Total Lessons**: 238 lessons across 6 comprehensive modules.

---

## 3. Companion Digital Library Reading Pages
The following reading pages will be generated in `library/assets/pages/<slug>.json` with `type: "reading"`:
1. `park-a-long-walk-to-water.json` — Linda Sue Park (*A Long Walk to Water* core selections)
2. `sudanese-civil-war-and-lost-boys.json` — Informational History on the Lost Boys of Sudan
3. `paterson-lyddie.json` — Katherine Paterson (*Lyddie* selections)
4. `chavez-commonwealth-club-address.json` — César Chávez (*Commonwealth Club Address*, 1984)
5. `shaw-pygmalion.json` — George Bernard Shaw (*Pygmalion* selections)
6. `douglass-narrative-of-the-life.json` — Frederick Douglass (*Narrative of the Life of Frederick Douglass*)
7. `freneau-the-african-chief.json` — Philip Freneau & Paul Laurence Dunbar (*Abolitionist & Resistance Poetry*)
8. `giedd-the-teen-brain.json` — Dr. Jay Giedd & NIDA (*Teens and Decision Making*)
9. `richtel-growing-up-digital.json` — Matt Richtel (*Growing Up Digital*)
10. `kingsolver-water-is-life.json` — Barbara Kingsolver (*Water Is Life*, 2010)
11. `fishman-the-big-thirst.json` — Charles Fishman (*The Big Thirst* selections)

---

## 4. Technical Implementation & Verification Plan
- Author all 11 reading pages in `library/assets/pages/`.
- Build modular datasets: `assets/data/lessons/i-ela-m1.json`, `i-ela-m2a.json`, `i-ela-m2b.json`, `i-ela-m3.json`, `i-ela-m4a.json`, `i-ela-m4b.json`.
- Register `"7th Grade"` in `assets/data/curriculum-engageny-ela.json`.
- Append all 238 Grade 7 lessons to `assets/data/lessons.json` (bringing total platform lessons to 2,785).
- Update `levels/i.php` (Grade 7 Level I) for dynamic subject switching (`levels/i.php?subject=ela`).
- Bump version constants to `v2.46.0` in `src/header.php`, `src/footer.php`, and update `#footer-version-modal`.
- Create `assets/text/hc-grade-7-ela-complete.md` and `updates/docs/2026-11-16-grade-7-ela-and-readings-walkthrough.md`.
- Verify with PHP CLI.
