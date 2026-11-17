---
title: "Grade 5 (Level G) ELA Curriculum and Digital Library Buildout Plan"
date: "2026-11-17"
version: "v2.48.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 5", "Level G", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive implementation plan for the full Grade 5 (Level G) ELA curriculum buildout (6 modules, 225 lessons) and companion Digital Library reading pages, launching the Upper Elementary ELA band."
author: "Antigravity & Hesten"
---

# Grade 5 (Level G) ELA Curriculum and Digital Library Buildout Plan

## 1. Overview & Architectural Scope
This implementation plan establishes the full Grade 5 (Level G) English Language Arts curriculum on Hesten's Learning platform, parsing source materials from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 5`. Grade 5 encompasses 6 full modules (Modules 1, 2A, 2B, 3A, 3B, and 4), totaling 225 interactive, standards-aligned lessons.

All literary and informational anchor texts will be authored as standalone reading pages (`/library/?page=<slug>`), ensuring they are **not displayed as catalog books** (`bookd.json` / `books.json`), while linking directly to and from corresponding ELA lesson problem sets.

---

## 2. Curriculum Structure & Module Breakdown
1. **Module 1: Human Rights and Social Justice — *Esperanza Rising***
   - Anchor Texts: *Esperanza Rising* (Pam Muñoz Ryan), *Universal Declaration of Human Rights* (Plain Language Youth Edition).
   - Units: Unit 1 (11 lessons), Unit 2 (18 lessons), Unit 3 (12 lessons) -> 41 lessons (`g-ela-m1.json`).
2. **Module 2A: Biodiversity in the Rainforest — *The Most Beautiful Roof in the World***
   - Anchor Texts: *The Most Beautiful Roof in the World* (Kathryn Lasky & Meg Lowman), *"The Wings of the Butterfly"* (Aaron Shepard).
   - Units: Unit 1 (10 lessons), Unit 2 (15 lessons), Unit 3 (16 lessons) -> 41 lessons (`g-ela-m2a.json`).
3. **Module 2B: Investigating the Scientific Method & Inventions — *Max Axiom***
   - Anchor Texts: *Investigating the Scientific Method with Max Axiom, Super Scientist* (Donald B. Lemke), Graphic-style scientific inquiry and inventions that changed people's lives.
   - Units: Unit 1 (10 lessons), Unit 2 (13 lessons), Unit 3 (17 lessons) -> 40 lessons (`g-ela-m2b.json`).
4. **Module 3A: Athletes Breaking Barriers — *Promises to Keep: Jackie Robinson***
   - Anchor Texts: *Promises to Keep: How Jackie Robinson Changed America* (Sharon Robinson), Biographical studies of Roberto Clemente and Althea Gibson.
   - Units: Unit 1 (7 lessons), Unit 2 (17 lessons), Unit 3 (15 lessons) -> 39 lessons (`g-ela-m3a.json`).
5. **Module 3B: Arctic Innovations & Culture — *The Inuit Thought of It***
   - Anchor Texts: *The Inuit Thought of It: Amazing Arctic Innovations* (Alootook Ipellie with David MacDonald), Arctic survival technology and Inuit traditions.
   - Units: Unit 1 (9 lessons), Unit 2 (10 lessons), Unit 3 (12 lessons) -> 31 lessons (`g-ela-m3b.json`).
6. **Module 4: Science and Society — Natural Disasters & Humanitarian Aid**
   - Anchor Texts: The Science of Natural Disasters (Hurricanes, Earthquakes, the 2010 Haiti Earthquake), American Red Cross and emergency relief response.
   - Units: Unit 1 (8 lessons), Unit 2 (9 lessons), Unit 3 (16 lessons) -> 33 lessons (`g-ela-m4.json`).

**Total Lessons**: 225 lessons across 6 comprehensive modules.

---

## 3. Companion Digital Library Reading Pages
The following reading pages will be generated in `library/assets/pages/<slug>.json` with `type: "reading"` (never shown in `bookd.json` or `books.json`):
1. `ryan-esperanza-rising.json` — Pam Muñoz Ryan (*Esperanza Rising* core selections)
2. `universal-declaration-of-human-rights-youth.json` — United Nations (*Universal Declaration of Human Rights: Youth Edition*)
3. `lasky-most-beautiful-roof.json` — Kathryn Lasky (*The Most Beautiful Roof in the World*)
4. `shepard-wings-of-the-butterfly.json` — Aaron Shepard (*The Wings of the Butterfly: An Amazon Legend*)
5. `lemke-max-axiom.json` — Donald B. Lemke (*Investigating the Scientific Method with Max Axiom*)
6. `robinson-promises-to-keep.json` — Sharon Robinson (*Promises to Keep: Jackie Robinson*)
7. `barriers-in-sports-athletes.json` — Historical Biographies (*Athletes Who Broke Barriers: Robinson, Clemente, Gibson*)
8. `ipellie-the-inuit-thought-of-it.json` — Alootook Ipellie (*The Inuit Thought of It: Arctic Innovations*)
9. `natural-disasters-hurricanes-earthquakes.json` — Science of Extreme Events (*Hurricanes, Earthquakes & Haiti 2010*)
10. `humanitarian-aid-red-cross.json` — Humanitarian Relief (*The American Red Cross & Global Crisis Response*)

---

## 4. Technical Implementation & Verification Plan
- Author all 10 reading pages in `library/assets/pages/`.
- Build modular datasets: `assets/data/lessons/g-ela-m1.json`, `g-ela-m2a.json`, `g-ela-m2b.json`, `g-ela-m3a.json`, `g-ela-m3b.json`, `g-ela-m4.json`.
- Register `"5th Grade"` in `assets/data/curriculum-engageny-ela.json`.
- Append all 225 Grade 5 lessons to `assets/data/lessons.json` (bringing total platform lessons to 3,237).
- Update `levels/g.php` (Grade 5 Level G) for dynamic subject switching (`levels/g.php?subject=ela`).
- Bump version constants to `v2.48.0` in `src/header.php`, `src/footer.php`, and update `#footer-version-modal`.
- Create `assets/text/hc-grade-5-ela-complete.md` and `updates/docs/2026-11-17-grade-5-ela-and-readings-walkthrough.md`.
- Verify with PHP CLI.
