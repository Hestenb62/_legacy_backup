---
title: "Grade 5 (Level G) ELA Full Curriculum and Digital Library Buildout Walkthrough"
date: "2026-11-17"
version: "v2.48.0"
category: "Walkthrough"
tags: ["ELA", "Grade 5", "Level G", "EngageNY", "Curriculum", "Digital Library", "Accessibility"]
summary: "Detailed walkthrough of the complete Grade 5 (Level G) ELA curriculum buildout across all 6 modules (224 lessons), 10 Digital Library reading pages, curriculum registration, master dataset synchronization, and PHP CLI verification."
author: "Antigravity & Hesten"
---

# Grade 5 (Level G) ELA Full Curriculum & Digital Library Buildout Walkthrough

## 1. Executive Summary
The Grade 5 (Level G) English Language Arts curriculum is now **100% complete** on Hesten's Learning platform. This milestone launches the **Upper Elementary ELA Band**, delivering full coverage of EngageNY / Expeditionary Learning Grade 5 across all 6 core and alternate modules (Modules 1, 2A, 2B, 3A, 3B, and 4), encompassing **224 interactive, standards-aligned lessons** and **10 dedicated Digital Library reading pages**.

Total platform lessons in `assets/data/lessons.json` have now grown to **3,236 lessons**, verified and operational through both single-lesson routing and level hub browsing.

---

## 2. Invariant Verification & Architectural Safeguards
1. **Digital Library Reading Invariant**:
   - All 10 anchor readings were created in `library/assets/pages/<slug>.json` with `type: "reading"`.
   - **Crucial Invariant Preserved**: None of the reading page slugs appear in `library/assets/data/books.json` or `library/assets/data/bookd.json`. They are strictly decoupled from catalog bookshelves and accessible only as standalone reading pages (`/library/?page=<slug>`).
2. **Offline-First & PWA Support**:
   - `offline.php` serves as the sole resilient offline shell.
   - All lesson problem sets utilize persistent `localStorage` auto-saving.
3. **WCAG 2.1/2.2 AA/AAA & UDL Standards**:
   - 100% keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`).
   - High-contrast `:focus-visible` outlines.
   - Multimodal presentation with text-to-speech, OpenDyslexic font support, and Irlen color filters.
   - Printable worksheet mode via `printProblemSet()`.

---

## 3. Curriculum Scope & Lesson Breakdown

| Module Key | Module Title & Anchor Literature | Units | Lessons Built |
|---|---|---|---|
| `g-ela-m1` | **Module 1**: Human Rights & Social Justice — *Esperanza Rising* (Pam Muñoz Ryan) & UN UDHR | Unit 1 (11), Unit 2 (18), Unit 3 (12) | **41** |
| `g-ela-m2a` | **Module 2A**: Rainforest Canopy Biodiversity — *The Most Beautiful Roof in the World* (Kathryn Lasky) & *The Wings of the Butterfly* (Aaron Shepard) | Unit 1 (10), Unit 2 (15), Unit 3 (15) | **40** |
| `g-ela-m2b` | **Module 2B**: Scientific Method & Inventions — *Max Axiom, Super Scientist* (Donald B. Lemke) | Unit 1 (10), Unit 2 (13), Unit 3 (17) | **40** |
| `g-ela-m3a` | **Module 3A**: Athletes Breaking Barriers — *Promises to Keep: Jackie Robinson* (Sharon Robinson), Roberto Clemente, Althea Gibson | Unit 1 (7), Unit 2 (17), Unit 3 (15) | **39** |
| `g-ela-m3b` | **Module 3B**: Arctic Innovations & Culture — *The Inuit Thought of It: Amazing Arctic Innovations* (Alootook Ipellie) | Unit 1 (9), Unit 2 (10), Unit 3 (12) | **31** |
| `g-ela-m4` | **Module 4**: Natural Disasters & Humanitarian Aid — Hurricanes, Earthquakes, American Red Cross | Unit 1 (8), Unit 2 (9), Unit 3 (16) | **33** |
| **Total** | **Grade 5 (Level G) Complete Curriculum** | **18 Units** | **224 Lessons** |

---

## 4. Digital Library Reading Pages Created

The following 10 reading pages are active in `library/assets/pages/`:
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

## 5. Verification & Testing Results

All tests were executed against the live platform codebase via PHP CLI:

```bash
& 'C:\xampp1\php\php.exe' scratch\verify_grade5.php
```
**Output:**
```
=== Verifying Grade 5 (Level G) ELA and Readings ===

[PASS] Invariant Verified: None of the 10 Grade 5 reading pages appear in book catalogs.
[PASS] All 10 Grade 5 reading JSON files exist and have type='reading'.
[PASS] All 6 Grade 5 modular lesson files valid. Total lessons: 224.
[PASS] Curriculum registry contains 5th Grade with 6 modules.
[PASS] Master lessons.json contains 224 Grade 5 ELA lessons.

Verification complete!
```

```bash
& 'C:\xampp1\php\php.exe' scratch\test_render_g.php
```
**Output:**
```
Rendered Level G (subject=ela) HTML length: 1474382 bytes
[PASS] Level G ELA content rendered successfully in HTML!
[PASS] Module 2A rendered successfully!
[PASS] Module 2B rendered successfully!
[PASS] Module 3A rendered successfully!
[PASS] Module 3B rendered successfully!
[PASS] Module 4 rendered successfully!
```

```bash
& 'C:\xampp1\php\php.exe' scratch\test_single_lesson_g.php
```
**Output:**
```
Rendered Lesson g-ela-m1-u1-l1 successfully with full problem set, textareas, expandable solutions, and anchor reading links.
```

---

## 6. Platform Version & Documentation Synchronization
- **Version Bump**: Bumped to `v2.48.0` across `src/header.php` and `src/footer.php`.
- **Release Label**: `November 2026 Grade 5 ELA & Upper Elementary Launch Release`.
- **Version Modal**: Updated `#footer-version-modal` feature list with comprehensive Grade 5 details.
- **Help Center**: Created companion user guide in `assets/text/hc-grade-5-ela-complete.md`.
- **Engineering Persistence**: This walkthrough document saved permanently in `updates/docs/2026-11-17-grade-5-ela-and-readings-walkthrough.md`.

---

## 7. Next Steps in the Full ELA Buildout Roadmap
With High School (Grades 9–12), Middle School (Grades 6–8), and Grade 5 complete, the remaining grades in the Elementary & Early Childhood bands are:
1. **Grade 4 (Level F)**: Modules 1–4 (Inventions, American Revolution, Poetry, etc.)
2. **Grade 3 (Level E)**: Modules 1–4 (Overcoming Learning Challenges, Frogs, Peter Pan, Water)
3. **Grade 2 (Level D)**: Domains 1–12 (Core Knowledge Listening & Learning + Skills)
4. **Grade 1 (Level C)**: Domains 1–11
5. **Kindergarten (Level B)**: Domains 1–12
6. **Pre-K (Level A)**: Domains 1–10
