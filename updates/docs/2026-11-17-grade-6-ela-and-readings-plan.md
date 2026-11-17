---
title: "Grade 6 (Level H) ELA Curriculum and Digital Library Buildout Plan"
date: "2026-11-17"
version: "v2.47.0"
category: "Implementation Plan"
tags: ["ELA", "Grade 6", "Level H", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive implementation plan for the full Grade 6 (Level H) ELA curriculum buildout (6 modules, 227 lessons) and companion Digital Library reading pages, completing the entire Middle School ELA band (Grades 6–8)."
author: "Antigravity & Hesten"
---

# Grade 6 (Level H) ELA Curriculum and Digital Library Buildout Plan

## 1. Overview & Architectural Scope
This implementation plan establishes the full Grade 6 (Level H) English Language Arts curriculum on Hesten's Learning platform, parsing source materials from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 6`. Spanning both core and alternate tracks across 6 comprehensive modules, Level H delivers **227 interactive lessons** with worksheet-first problem sets, close reading prompts, auto-saving textareas (`localStorage`), expandable teacher answer keys, and direct links to **10 dedicated Digital Library reading pages**.

With this release, the **entire Middle School ELA band (Grades 6–8, Levels H, I, J) is 100% complete**, encompassing 704 middle school lessons across 18 modules. Across the entire platform, verified curriculum lessons expand beyond 3,000 to **3,012 total lessons**.

---

## 2. Curriculum Structure & Module Breakdown
1. **Module 1: Myth, Ritual, and The Hero's Journey — *The Lightning Thief***
   - Anchor Texts: *The Lightning Thief* (Rick Riordan), *The Hero with a Thousand Faces* (Joseph Campbell), Ancient Greek myths (Cronus, Medusa, Prometheus).
   - Units: Unit 1 (13 lessons), Unit 2 (20 lessons), Unit 3 (7 lessons) -> 40 lessons (`h-ela-m1.json`).
2. **Module 2A: Rules to Live By — *Bud, Not Buddy***
   - Anchor Texts: *Bud, Not Buddy* (Christopher Paul Curtis), Steve Jobs's 2005 Stanford Commencement Address, Rudyard Kipling's *"If—"*.
   - Units: Unit 1 (12 lessons), Unit 2 (17 lessons), Unit 3 (9 lessons) -> 38 lessons (`h-ela-m2a.json`).
3. **Module 2B: Voices of Adversity — *Good Masters! Sweet Ladies!***
   - Anchor Texts: *Good Masters! Sweet Ladies! Voices from a Medieval Village* (Laura Amy Schlitz), Medieval feudal history and dramatic monologues.
   - Units: Unit 1 (13 lessons), Unit 2 (16 lessons), Unit 3 (10 lessons) -> 39 lessons (`h-ela-m2b.json`).
4. **Module 3A: Point of View and Cultural Perspective — *Dragonwings***
   - Anchor Texts: *Dragonwings* (Laurence Yep), *The Lost Garden* (Laurence Yep's memoir), Chinatown history and early aviation.
   - Units: Unit 1 (10 lessons), Unit 2 (14 lessons), Unit 3 (12 lessons) -> 36 lessons (`h-ela-m3a.json`).
5. **Module 3B: Point of View and Marine Conservation — *World Without Fish***
   - Anchor Texts: *World Without Fish* (Mark Kurlansky), Marine ecosystems, commercial trawling, and sustainable ocean policy.
   - Units: Unit 1 (11 lessons), Unit 2 (12 lessons), Unit 3 (13 lessons) -> 36 lessons (`h-ela-m3b.json`).
6. **Module 4: Decision Making & The Environment — *Frightful's Mountain***
   - Anchor Texts: *Frightful's Mountain* (Jean Craighead George), *Silent Spring* & Rachel Carson biographical reports on DDT and pesticide bioaccumulation.
   - Units: Unit 1 (13 lessons), Unit 2 (15 lessons), Unit 3 (10 lessons) -> 38 lessons (`h-ela-m4.json`).

**Total Lessons**: 227 lessons across 6 comprehensive modules.

---

## 3. Companion Digital Library Reading Pages
The following reading pages will be generated in `library/assets/pages/<slug>.json` with `type: "reading"` (never shown in `bookd.json` or `books.json`):
1. `riordan-the-lightning-thief.json` — Rick Riordan (*The Lightning Thief* core selections)
2. `campbell-the-heros-journey.json` — Joseph Campbell (*The Hero's Journey: Monomyth Archetype*)
3. `curtis-bud-not-buddy.json` — Christopher Paul Curtis (*Bud, Not Buddy* selections & Bud's Rules)
4. `steve-jobs-commencement-address.json` — Steve Jobs (*Stanford Commencement Address*, 2005)
5. `schlitz-good-masters-sweet-ladies.json` — Laura Amy Schlitz (*Good Masters! Sweet Ladies!* monologues)
6. `yep-dragonwings.json` — Laurence Yep (*Dragonwings* selections)
7. `yep-the-lost-garden.json` — Laurence Yep (*The Lost Garden* memoir selections)
8. `kurlansky-world-without-fish.json` — Mark Kurlansky (*World Without Fish* core selections)
9. `george-frightfuls-mountain.json` — Jean Craighead George (*Frightful's Mountain* selections)
10. `carson-silent-spring-and-ddt.json` — Rachel Carson & Robert Peterson (*Silent Spring & Sounding the Alarm*)

---

## 4. Technical Implementation & Verification Plan
- Author all 10 reading pages in `library/assets/pages/`.
- Build modular datasets: `assets/data/lessons/h-ela-m1.json`, `h-ela-m2a.json`, `h-ela-m2b.json`, `h-ela-m3a.json`, `h-ela-m3b.json`, `h-ela-m4.json`.
- Register `"6th Grade"` in `assets/data/curriculum-engageny-ela.json`.
- Append all 227 Grade 6 lessons to `assets/data/lessons.json` (bringing total platform lessons to 3,012).
- Update `levels/h.php` (Grade 6 Level H) for dynamic subject switching (`levels/h.php?subject=ela`).
- Bump version constants to `v2.47.0` in `src/header.php`, `src/footer.php`, and update `#footer-version-modal`.
- Create `assets/text/hc-grade-6-ela-complete.md` and `updates/docs/2026-11-17-grade-6-ela-and-readings-walkthrough.md`.
- Verify with PHP CLI.
