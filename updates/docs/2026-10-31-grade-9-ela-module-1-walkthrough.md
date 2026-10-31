---
title: "Grade 9 ELA Module 1 Curriculum Buildout & Library Readings Walkthrough"
date: "2026-10-31"
version: "v2.35.0"
category: "Walkthrough"
tags: ["ELA", "Grade 9", "EngageNY", "Curriculum", "Worksheets", "Level K", "Library", "Readings"]
summary: "Successful extraction and deployment of Grade 9 ELA Module 1 (48 lessons across Units 1–3), dedicated standalone library reading pages for Karen Russell, Rainer Maria Rilke, and William Shakespeare, and streamlined close-reading worksheets with auto-saving digital scratchpads."
author: "Antigravity & Hesten"
---

# Grade 9 ELA Module 1 Curriculum Buildout & Library Readings Walkthrough (v2.35.0)

## Executive Summary

Following the completion of the P-12 Mathematics Curriculum milestone and the decommissioning of the legacy math-vocab hub, we initiated the buildout of the **Grade 9 English Language Arts (ELA)** curriculum sourced from `C:\Users\Heste\OneDrive\Documents\P12EngageNY-ELA-EXTA\Grade 9`.

In accordance with user specifications:
1. **Dedicated Standalone Library Readings:** Anchor literature texts have been integrated into the digital library as standalone reading pages (`/library/?page=<slug>`), avoiding display as books on catalog shelves.
2. **Direct Cross-Section Linking:** Every ELA lesson features a prominent banner button linking directly to its corresponding reading page in the library.
3. **Streamlined Close-Reading Worksheets:** Distraction-free problem sets featuring text-dependent questions, vocabulary definitions, synthesizing Quick Writes, digital student textareas (`localStorage` auto-saving), expandable teacher keys, and 1-click printing.

---

## 1. Grade 9 ELA Module 1 Architecture & Inventory

| Unit | Title / Focus | Anchor Literature | Lessons | Reading Endpoint | Lesson Range |
| :--- | :--- | :--- | :---: | :--- | :--- |
| **Unit 1** | Reading Literature: Epigraph & Lycanthropic Culture Shock | *St. Lucy’s Home for Girls Raised by Wolves* (Karen Russell) | **17** | [`/library/?page=st-lucys-home`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=st-lucys-home) | `k-ela-m1-a-1` to `k-ela-m1-a-17` |
| **Unit 2** | Literary & Informational Dialogue | *Letters to a Young Poet* (Letter One, Rainer Maria Rilke) & *Black Swan Green* (David Mitchell) | **11** | [`/library/?page=letters-to-a-young-poet`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=letters-to-a-young-poet) | `k-ela-m1-b-1` to `k-ela-m1-b-11` |
| **Unit 3** | Classical Drama & Poetic Structure | *The Tragedy of Romeo and Juliet* (William Shakespeare) | **20** | [`/library/?page=romeo-and-juliet-module-1`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php?page=romeo-and-juliet-module-1) | `k-ela-m1-c-1` to `k-ela-m1-c-20` |
| **Total** | **Module 1: Reading Closely and Writing to Learn** | **3 Major Anchor Selections** | **48 Lessons** | **3 Library Reading Pages** | **Full Module 1 Coverage** |

---

## 2. Dedicated Library Reading Pages (Non-Book System)

A dedicated reading article controller was implemented at [`library/reading_page.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/reading_page.php) and hooked into [`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php):
- **Hidden from Book Catalogs:** Because reading pages operate via `?page=<slug>` pointing to `library/assets/pages/*.json` with `"type": "reading"`, they never appear in `bookd.json` or `edu-side-drawer.json`, ensuring the book catalog remains pristine.
- **Permanent Anchor Numbering:** Every paragraph has an explicit index (`#p1`, `#p2`, etc.), allowing lesson prompts to cite exact paragraphs for close reading.
- **Accessibility & Assistance Suite:**
  - Built-in Web Speech Synthesis read-aloud (`toggleReadAloud()`).
  - Dynamic font size adjuster (`adjustReadingFontSize()`).
  - OpenDyslexic accessible font toggle (`toggleReadingDyslexicFont()`).
  - 1-click printer stylesheet (`window.print()`).
  - Formal MLA/APA citation helper.
  - Return link navigating directly back to the ELA lesson.

---

## 3. Technical Verification & Output Samples

All 48 lessons in `k-ela-m1.json` and all 3 reading pages were verified with PHP CLI 8.2:
- **Sample Lesson CLI Test:**
  - `k-ela-m1-a-1`: `len=357667, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m1-a-5`: `len=391293, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m1-b-1`: `len=388752, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
  - `k-ela-m1-c-1`: `len=442430, problem_set=YES, reading_card=YES, vocab=YES, library_link=YES, scratchpad=YES, solution=YES, print=YES`
- **Landing Page CLI Test:**
  - `levels/k.php` rendered `803,413` bytes with active ELA tabs displaying all 48 lessons across Units 1, 2, and 3.

---

## 4. Platform Version & Help Center Synchronization

1. **Platform Release Constants:** Bumped to `v2.35.0` in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) and [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) with updated release modal details.
2. **Help Center Guide:** Published user guide in [`assets/text/hc-grade-9-ela-module-1.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-grade-9-ela-module-1.md).
3. **Master Registries Updated:**
   - [`assets/data/lessons/k-ela-m1.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons/k-ela-m1.json)
   - [`assets/data/curriculum-engageny-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-engageny-ela.json)
   - [`assets/data/lessons.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json) (1,611 total platform lessons)

