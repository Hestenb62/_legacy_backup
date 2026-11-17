---
title: "Grade 8 (Level J) ELA Curriculum and Digital Library Buildout Plan"
date: "2026-11-16"
version: "v2.45.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 8", "Level J", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive implementation plan for the full Grade 8 (Level J) ELA curriculum buildout (6 modules, 239 lessons) and companion Digital Library reading pages."
author: "Antigravity & Hesten"
---

# Grade 8 (Level J) ELA Curriculum and Digital Library Buildout Plan

## 1. Overview & Architectural Scope
This implementation plan establishes the full Grade 8 (Level J) English Language Arts curriculum on Hesten's Learning, parsing source curriculum materials from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 8`. Grade 8 encompasses both primary and alternate thematic tracks (Modules 1, 2A, 2B, 3A, 3B, and 4), totaling 239 comprehensive lessons.

All literary and historical anchor texts are integrated into the Digital Library as standalone reading pages (`/library/?page=<slug>`), ensuring they are **not displayed as catalog books** (`bookd.json` / `books.json`), while linking directly to and from corresponding ELA lesson problem sets.

---

## 2. Curriculum Structure & Module Breakdown
1. **Module 1: Study of Character and Thematic Development — *Inside Out & Back Again* & The Fall of Saigon**
   - Anchor Texts: *Inside Out & Back Again* (Thanhha Lai), "The Vietnam Wars" (Tod Olson), "Children of War" (Arthur Brice), UNHCR refugee reports.
   - Units: Unit 1 (14 lessons), Unit 2 (20 lessons), Unit 3 (6 lessons) -> 40 lessons (`j-ela-m1.json`).
2. **Module 2A: Taking a Stand — *To Kill a Mockingbird* & The Golden Rule**
   - Anchor Texts: Shirley Chisholm ("Equal Rights for Women"), Sojourner Truth ("Ain't I a Woman?"), Lyndon B. Johnson ("The Great Society"), Harper Lee (*To Kill a Mockingbird*), Rudyard Kipling ("If").
   - Units: Unit 1 (19 lessons), Unit 2 (16 lessons), Unit 3 (5 lessons) -> 40 lessons (`j-ela-m2a.json`).
3. **Module 2B: The Universal Theme of Control — *A Midsummer Night's Dream***
   - Anchor Texts: William Shakespeare (*A Midsummer Night's Dream*), Ovid ("Pyramus and Thisbe"), Shakespeare authorship essays.
   - Units: Unit 1 (18 lessons), Unit 2 (18 lessons), Unit 3 (4 lessons) -> 40 lessons (`j-ela-m2b.json`).
4. **Module 3A: Human Resilience and World War II — *Unbroken* & Internment**
   - Anchor Texts: Laura Hillenbrand (*Unbroken: Louie Zamperini*), Miné Okubo (*Citizen 13660*), President Roosevelt (Executive Order 9066).
   - Units: Unit 1 (13 lessons), Unit 2 (19 lessons), Unit 3 (8 lessons) -> 40 lessons (`j-ela-m3a.json`).
5. **Module 3B: Civil Rights & Desegregation — *A Mighty Long Way* & The Little Rock Nine**
   - Anchor Texts: Carlotta Walls LaNier (*A Mighty Long Way*), Shelley Tougas (*Little Rock Girl 1957*), President Eisenhower's Address on Little Rock.
   - Units: Unit 1 (13 lessons), Unit 2 (20 lessons), Unit 3 (8 lessons) -> 41 lessons (`j-ela-m3b.json`).
6. **Module 4: Sustainability & Food Systems — *The Omnivore's Dilemma***
   - Anchor Texts: Michael Pollan (*The Omnivore's Dilemma*), Industrial Organic vs Local Sustainable agriculture research.
   - Units: Unit 1 (15 lessons), Unit 2 (17 lessons), Unit 3 (6 lessons) -> 38 lessons (`j-ela-m4.json`).

**Total Lessons**: 239 lessons across 6 comprehensive modules.

---

## 3. Companion Digital Library Reading Pages
The following reading pages will be generated in `library/assets/pages/<slug>.json` with `type: "reading"`:
1. `lai-inside-out-and-back-again.json` — Thanhha Lai (*Inside Out & Back Again* core poetry selections)
2. `olson-the-vietnam-wars.json` — Tod Olson ("The Vietnam Wars: 1945–1975")
3. `brice-children-of-war.json` — Arthur Brice ("Children of War: Stories of Resilience")
4. `chisholm-equal-rights-for-women.json` — Shirley Chisholm ("Equal Rights for Women", 1969)
5. `truth-aint-i-a-woman.json` — Sojourner Truth ("Ain't I a Woman?", 1851)
6. `johnson-the-great-society.json` — Lyndon B. Johnson ("The Great Society", 1964)
7. `lee-to-kill-a-mockingbird.json` — Harper Lee (*To Kill a Mockingbird* selections: Atticus's Defense, Mrs. Dubose, Scout's Realization)
8. `kipling-if.json` — Rudyard Kipling ("If—")
9. `shakespeare-a-midsummer-nights-dream.json` — William Shakespeare (*A Midsummer Night's Dream* key scenes)
10. `ovid-pyramus-and-thisbe.json` — Ovid ("Pyramus and Thisbe" myth)
11. `hillenbrand-unbroken.json` — Laura Hillenbrand (*Unbroken: Louie Zamperini*)
12. `okubo-citizen-13660.json` — Miné Okubo (*Citizen 13660* memoir)
13. `fdr-executive-order-9066.json` — President Franklin D. Roosevelt (Executive Order 9066)
14. `lanier-a-mighty-long-way.json` — Carlotta Walls LaNier (*A Mighty Long Way*)
15. `eisenhower-address-on-little-rock.json` — President Dwight D. Eisenhower (Address on the Situation in Little Rock)
16. `pollan-the-omnivores-dilemma.json` — Michael Pollan (*The Omnivore's Dilemma* selections)

---

## 4. Technical Implementation & Data Sync
- Build modular JSON files: `assets/data/lessons/j-ela-m1.json`, `j-ela-m2a.json`, `j-ela-m2b.json`, `j-ela-m3a.json`, `j-ela-m3b.json`, `j-ela-m4.json`.
- Register Grade 8 in `assets/data/curriculum-engageny-ela.json`.
- Synchronize all 239 lessons into `assets/data/lessons.json`.
- Update `levels/j.php` subject routing and metadata.
- Bump platform version constants in `src/header.php` and `src/footer.php` to `v2.45.0`.
- Generate user guide at `assets/text/hc-grade-8-ela-complete.md`.
- Generate walkthrough at `updates/docs/2026-11-16-grade-8-ela-and-readings-walkthrough.md`.
