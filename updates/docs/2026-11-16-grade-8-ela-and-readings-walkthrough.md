---
title: "Grade 8 (Level J) ELA Full Curriculum & Digital Library Walkthrough"
date: "2026-11-16"
version: "v2.45.0"
category: "Walkthrough"
tags: ["ELA", "Grade 8", "Level J", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Comprehensive walkthrough and verification report for the complete Grade 8 (Level J) ELA curriculum buildout (6 modules, 239 lessons) and 16 Digital Library reading pages."
author: "Antigravity & Hesten"
---

# Grade 8 (Level J) ELA Full Curriculum & Digital Library Walkthrough

## 1. Executive Summary
The Grade 8 (Level J) English Language Arts curriculum has been fully built out on Hesten's Learning platform from source materials located in `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 8`. Spanning both core and alternate tracks across 6 comprehensive modules, Level J now provides **239 interactive lessons** with worksheet-first problem sets, close reading prompts, auto-saving textareas (`localStorage`), expandable teacher answer keys, and direct links to **16 newly authored Digital Library reading pages**.

With this milestone, the platform's total lesson count in `assets/data/lessons.json` expands from 2,308 to **2,547 lessons**.

---

## 2. Curriculum Architecture & Modular Scope

| Module Code | Module Title | Source Literature & History | Units | Lessons |
| :--- | :--- | :--- | :--- | :--- |
| **`j-ela-m1`** | **Module 1**: Study of Character & Thematic Development | Thanhha Lai's *Inside Out & Back Again*, Tod Olson's *"The Vietnam Wars"*, Arthur Brice's *"Children of War"* | 3 | 40 |
| **`j-ela-m2a`** | **Module 2A**: Taking a Stand & The Golden Rule | Shirley Chisholm, Sojourner Truth, Lyndon B. Johnson, Harper Lee's *To Kill a Mockingbird*, Rudyard Kipling's *"If—"* | 3 | 40 |
| **`j-ela-m2b`** | **Module 2B**: The Universal Theme of Control | William Shakespeare's *A Midsummer Night's Dream*, Ovid's *"Pyramus and Thisbe"* | 3 | 40 |
| **`j-ela-m3a`** | **Module 3A**: Human Resilience & World War II | Laura Hillenbrand's *Unbroken*, Miné Okubo's *Citizen 13660*, Franklin D. Roosevelt's *Executive Order 9066* | 3 | 40 |
| **`j-ela-m3b`** | **Module 3B**: Civil Rights & Desegregation | Carlotta Walls LaNier's *A Mighty Long Way*, Dwight D. Eisenhower's *Address on Little Rock* | 3 | 41 |
| **`j-ela-m4`** | **Module 4**: Sustainability & Food Systems | Michael Pollan's *The Omnivore's Dilemma* (Four Food Chains, Industrial Organic, Polyface Farm) | 3 | 38 |
| **Total** | **Grade 8 ELA (Level J)** | **Complete 6-Module Expeditionary Learning Scope** | **18 Units** | **239 Lessons** |

---

## 3. Digital Library Reading Pages
The following 16 reading pages were authored in `library/assets/pages/<slug>.json` with `type: "reading"`. In compliance with project invariants, **none of these entries appear in `bookd.json` or `books.json`**; they function as standalone reading pages accessible via `/library/?page=<slug>`:
1. `inside-out-and-back-again.json` — Thanhha Lai (*Inside Out & Back Again* selection)
2. `the-vietnam-wars.json` — Tod Olson (*The Vietnam Wars: 1945–1975*)
3. `children-of-war.json` — Arthur Brice (*Children of War*)
4. `chisholm-equal-rights-for-women.json` — Shirley Chisholm (*Equal Rights for Women*, 1969)
5. `truth-aint-i-a-woman.json` — Sojourner Truth (*Ain't I a Woman?*, 1851)
6. `johnson-the-great-society.json` — Lyndon B. Johnson (*The Great Society*, 1964)
7. `to-kill-a-mockingbird-selections.json` — Harper Lee (*To Kill a Mockingbird* selections)
8. `kipling-if.json` — Rudyard Kipling (*If—*)
9. `shakespeare-a-midsummer-nights-dream.json` — William Shakespeare (*A Midsummer Night's Dream* key scenes)
10. `ovid-pyramus-and-thisbe.json` — Ovid (*Pyramus and Thisbe*)
11. `hillenbrand-unbroken.json` — Laura Hillenbrand (*Unbroken: Louie Zamperini*)
12. `okubo-citizen-13660.json` — Miné Okubo (*Citizen 13660*)
13. `fdr-executive-order-9066.json` — Franklin D. Roosevelt (*Executive Order 9066*)
14. `lanier-a-mighty-long-way.json` — Carlotta Walls LaNier (*A Mighty Long Way*)
15. `eisenhower-address-on-little-rock.json` — Dwight D. Eisenhower (*Address on Little Rock*, 1957)
16. `pollan-the-omnivores-dilemma.json` — Michael Pollan (*The Omnivore's Dilemma*)

---

## 4. Key Verification Checks
- **JSON Schemas**: Validated across all 6 modular files (`j-ela-m1.json` through `j-ela-m4.json`), `curriculum-engageny-ela.json`, and `lessons.json`.
- **Level J Subject Switcher**: Verified `levels/j.php?subject=ela` hydrates Level J ELA modules and renders lesson cards.
- **Single-Lesson Router**: Tiered lookup (`$moduleKey.json` -> `$requestedLesson.json` -> `lessons.json`) renders individual lessons with full worksheet problem sets, MathJax formatting, and print support.
- **Accessibility & UDL**: Full keyboard accessibility (`Tab`, `Enter`, `Space`, `Esc`), high-contrast focus rings, screen reader ARIA labels, and OpenDyslexic / Irlen tint compatibility.
- **Platform Version**: Synchronized constants in `src/header.php` and `src/footer.php` to `v2.45.0`.
