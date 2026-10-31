---
title: "Grade 9 ELA Module 2 Curriculum Buildout & Library Readings Walkthrough"
date: "2026-10-31"
version: "v2.36.0"
category: "Walkthrough"
tags: ["ELA", "Grade 9", "EngageNY", "Curriculum", "Worksheets", "Level K", "Library", "Readings"]
summary: "Successful extraction and deployment of Grade 9 ELA Module 2 (46 lessons across Units 1–3), dedicated standalone library reading pages for Edgar Allan Poe, Emily Dickinson, Sophocles, and Walter Mosley, and streamlined close-reading worksheets with auto-saving digital scratchpads."
author: "Antigravity & Hesten"
---

# Grade 9 ELA Module 2 Curriculum Buildout & Library Readings Walkthrough (v2.36.0)

## Executive Summary

Following the deployment of Module 1, we proceeded with the buildout of **Grade 9 English Language Arts Module 2: Understanding Perspectives and Writing to Convince** from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 9\grade-9-ela-module-2-word`.

Module 2 delivers **46 sequential lessons** organized across three profound literature and informational text units, fully supported by our dedicated non-book Library Reading Pages system:
1. **Dedicated Standalone Library Readings:** Anchor literature texts have been integrated into the digital library as standalone reading pages (`/library/?page=<slug>`), avoiding display as books on catalog shelves.
2. **Direct Cross-Section Linking:** Every ELA lesson features a prominent banner button linking directly to its corresponding reading page in the library.
3. **Streamlined Close-Reading Worksheets:** Distraction-free problem sets featuring text-dependent questions, vocabulary definitions, synthesizing Quick Writes, digital student textareas (`localStorage` auto-saving), expandable teacher keys, and 1-click printing.

---

## 1. Grade 9 ELA Module 2 Architecture & Inventory

| Unit | Title / Focus | Anchor Literature | Lessons | Reading Endpoint | Lesson Range |
| :--- | :--- | :--- | :---: | :--- | :--- |
| **Unit 1** | Literary Perspective & Psychological Obsession | *The Tell-Tale Heart* (Edgar Allan Poe) & *I felt a Funeral, in my Brain* (Emily Dickinson) | **13** | [`/library/?page=the-tell-tale-heart`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=the-tell-tale-heart)<br>[`/library/?page=i-felt-a-funeral-in-my-brain`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=i-felt-a-funeral-in-my-brain) | `k-ela-m2-a-1` to `k-ela-m2-a-13` |
| **Unit 2** | Classical Tragedy, Fate & Dramatic Irony | *Oedipus the King* (Sophocles) | **20** | [`/library/?page=oedipus-the-king`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=oedipus-the-king) | `k-ela-m2-b-1` to `k-ela-m2-b-20` |
| **Unit 3** | Informational Analysis & Cultural Fascination | *True Crime: The Roots of an American Obsession* (Walter Mosley) | **13** | [`/library/?page=true-crime-walter-mosley`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=true-crime-walter-mosley) | `k-ela-m2-c-1` to `k-ela-m2-c-13` |
| **Total** | **Module 2: Understanding Perspectives** | **4 Major Literary & Essay Selections** | **46 Lessons** | **4 Library Reading Pages** | **Full Module 2 Coverage** |

---

## 2. Dedicated Library Reading Pages (Non-Book System)

Four new reading article definitions were deployed under [`library/assets/pages/`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/pages/):
- `the-tell-tale-heart.json`: Complete 18-paragraph short story by Edgar Allan Poe with epigraph and paragraph anchor IDs (`#p1` through `#p18`).
- `i-felt-a-funeral-in-my-brain.json`: 5 stanzas of Emily Dickinson's Poem 280 with line-by-line formatting.
- `oedipus-the-king.json`: Excerpts and pivotal dramatic episodes from Sophocles' masterpiece (Prologue, Tiresias debate, Jocasta crossroads revelation, and catastrophic catastrophe).
- `true-crime-walter-mosley.json`: Walter Mosley's cultural critique on American fascination with criminal transgression.

None of these readings appear on the public library book shelves or drawer menus (`bookd.json` / `edu-side-drawer.json`), fulfilling the non-book requirement.

---

## 3. Technical Verification & Output Samples

All 46 lessons in `k-ela-m2.json` and all 4 reading pages were verified with PHP CLI 8.2:
- **Sample Lesson CLI Test:**
  - `k-ela-m2-a-1`: `len=353828, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m2-a-10`: `len=373953, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m2-b-1`: `len=415307, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m2-c-1`: `len=382537, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
- **Landing Page CLI Test:**
  - `levels/k.php` rendered `919,772` bytes displaying both Module 1 (48 lessons) and Module 2 (46 lessons) totaling **94 active ELA lessons**!

---

## 4. Platform Version & Help Center Synchronization

1. **Platform Release Constants:** Bumped to `v2.36.0` in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) and [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) with updated release modal details.
2. **Help Center Guide:** Published user guide in [`assets/text/hc-grade-9-ela-module-2.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-grade-9-ela-module-2.md).
3. **Master Registries Updated:**
   - [`assets/data/lessons/k-ela-m2.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons/k-ela-m2.json)
   - [`assets/data/curriculum-engageny-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-engageny-ela.json)
   - [`assets/data/lessons.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json) (1,653 total platform lessons)

