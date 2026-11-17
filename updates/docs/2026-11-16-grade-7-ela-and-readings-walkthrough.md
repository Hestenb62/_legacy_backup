---
title: "Grade 7 (Level I) ELA Full Curriculum & Digital Library Walkthrough"
date: "2026-11-16"
version: "v2.46.0"
category: "Walkthrough"
tags: ["ELA", "Grade 7", "Level I", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive walkthrough and verification report for the complete Grade 7 (Level I) ELA curriculum buildout (6 modules, 238 lessons) and 11 Digital Library reading pages."
author: "Antigravity & Hesten"
---

# Grade 7 (Level I) ELA Full Curriculum & Digital Library Walkthrough

## 1. Executive Summary
The Grade 7 (Level I) English Language Arts curriculum has been fully built out on Hesten's Learning platform from source materials located in `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 7`. Spanning both core and alternate tracks across 6 comprehensive modules, Level I now provides **238 interactive lessons** with worksheet-first problem sets, close reading prompts, auto-saving textareas (`localStorage`), expandable teacher answer keys, and direct links to **11 newly authored Digital Library reading pages**.

With this milestone, the platform's total lesson count in `assets/data/lessons.json` expands from 2,547 to **2,785 lessons**.

---

## 2. Curriculum Architecture & Modular Scope

| Module Code | Module Title | Source Literature & Nonfiction | Units | Lessons |
| :--- | :--- | :--- | :--- | :--- |
| **`i-ela-m1`** | **Module 1**: Journeys and Survival | Linda Sue Park's *A Long Walk to Water*, Lost Boys of Sudan, Dinka & Nuer history | 3 | 39 |
| **`i-ela-m2a`** | **Module 2A**: Working Conditions | Katherine Paterson's *Lyddie*, César Chávez's *Commonwealth Club Address* (1984), Garment industry research | 3 | 38 |
| **`i-ela-m2b`** | **Module 2B**: Identity & Transformation | George Bernard Shaw's *Pygmalion*, personal identity narratives, gender stereotypes & counter-ads | 3 | 42 |
| **`i-ela-m3`** | **Module 3**: What Gives Stories Power? | *Narrative of the Life of Frederick Douglass*, Philip Freneau's *"The African Chief"*, Paul Laurence Dunbar's *"We Wear the Mask"* | 3 | 43 |
| **`i-ela-m4a`** | **Module 4A**: Adolescent Brain & Screen Time | Dr. Jay Giedd, NIDA, Matt Richtel's *"Growing Up Digital"*, NPR *"The Teen Brain"* | 3 | 39 |
| **`i-ela-m4b`** | **Module 4B**: Water Sustainability & Management | Charles Fishman's *The Big Thirst*, Barbara Kingsolver's *"Water Is Life"* (National Geographic) | 3 | 37 |
| **Total** | **Grade 7 ELA (Level I)** | **Complete 6-Module Expeditionary Learning Scope** | **18 Units** | **238 Lessons** |

---

## 3. Digital Library Reading Pages
The following 11 reading pages were authored in `library/assets/pages/<slug>.json` with `type: "reading"`. In compliance with project invariants, **none of these entries appear in `bookd.json` or `books.json`**; they function as standalone reading pages accessible via `/library/?page=<slug>`:
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

## 4. Key Verification Checks
- **JSON Schemas**: Validated across all 6 modular files (`i-ela-m1.json` through `i-ela-m4b.json`), `curriculum-engageny-ela.json`, and `lessons.json`.
- **Level I Subject Switcher**: Verified `levels/i.php?subject=ela` hydrates Level I ELA modules and renders lesson cards.
- **Single-Lesson Router**: Tiered lookup (`$moduleKey.json` -> `$requestedLesson.json` -> `lessons.json`) renders individual lessons with full worksheet problem sets, MathJax formatting, and print support.
- **Accessibility & UDL**: Full keyboard accessibility (`Tab`, `Enter`, `Space`, `Esc`), high-contrast focus rings, screen reader ARIA labels, and OpenDyslexic / Irlen tint compatibility.
- **Platform Version**: Synchronized constants in `src/header.php` and `src/footer.php` to `v2.46.0`.
