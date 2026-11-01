---
title: "Grade 9 English Language Arts Complete 153-Lesson Buildout & Dedicated Library Reading Pages"
date: "2026-10-31"
version: "v2.37.0"
category: "Walkthrough"
tags: ["Grade 9", "ELA", "EngageNY", "Curriculum", "Digital Library", "Accessibility", "WCAG", "UDL"]
summary: "Comprehensive completion of the entire Grade 9 ELA curriculum across all 4 modules (153 lessons) with 10 dedicated standalone Digital Library reading pages, close-reading worksheets, and auto-saving practice areas."
author: "Antigravity & Hesten"
---

# Grade 9 English Language Arts Complete 153-Lesson Buildout

## Executive Summary
This release marks the full completion of the **Grade 9 English Language Arts Curriculum** on Hesten's Learning, converting all 153 authentic EngageNY / Core Knowledge lessons across Modules 1, 2, 3, and 4 into modular, high-speed JSON datasets. Core literary and informational readings have been cleanly separated from book catalog shelves and deployed into dedicated standalone Digital Library reading pages (`/library/?page=<slug>`), linked directly from each lesson's close-reading analysis tools.

---

## 1. Full 4-Module Scope & Architecture (153 Lessons)

### Module 1: Reading Closely and Writing to Learn (48 Lessons)
* **Dataset:** `assets/data/lessons/k-ela-m1.json` (48 lessons)
* **Unit 1 (17 Lessons):** Karen Russell's *St. Lucy's Home for Girls Raised by Wolves*
  * *Reading Page:* `/library/?page=st-lucys-home` (101 paragraphs with epigraphs)
* **Unit 2 (11 Lessons):** Rainer Maria Rilke's *Letters to a Young Poet* & David Mitchell's *Black Swan Green*
  * *Reading Page:* `/library/?page=letters-to-a-young-poet`
* **Unit 3 (20 Lessons):** William Shakespeare's *The Tragedy of Romeo and Juliet*
  * *Reading Page:* `/library/?page=romeo-and-juliet-module-1` (Prologue and Acts 1–3)

### Module 2: Understanding Perspectives and Writing to Convince (46 Lessons)
* **Dataset:** `assets/data/lessons/k-ela-m2.json` (46 lessons)
* **Unit 1 (13 Lessons):** Edgar Allan Poe's *The Tell-Tale Heart* & Emily Dickinson's *I felt a Funeral, in my Brain*
  * *Reading Pages:* `/library/?page=the-tell-tale-heart` & `/library/?page=i-felt-a-funeral-in-my-brain`
* **Unit 2 (20 Lessons):** Sophocles' *Oedipus the King*
  * *Reading Page:* `/library/?page=oedipus-the-king` (4 major episodes)
* **Unit 3 (13 Lessons):** Walter Mosley's *True Crime: The Roots of an American Obsession*
  * *Reading Page:* `/library/?page=true-crime-walter-mosley`

### Module 3: Researching to Deepen Understanding (30 Lessons)
* **Dataset:** `assets/data/lessons/k-ela-m3.json` (30 lessons)
* **Unit 1 (10 Lessons):** Temple Grandin's *Animals in Translation* Seed Text Analysis
  * *Reading Page:* `/library/?page=animals-in-translation`
* **Unit 2 (12 Lessons):** Inquiry-Based Research, Pre-Searching & Source Evaluation
* **Unit 3 (8 Lessons):** Evidence-Based Perspective & Research Paper Drafting

### Module 4: Sugar Changed the World & Historical Argument (29 Lessons)
* **Dataset:** `assets/data/lessons/k-ela-m4.json` (29 lessons)
* **Unit 1 (29 Lessons):** Marc Aronson & Marina Budhos' *Sugar Changed the World* and modern globalization studies
  * *Reading Pages:* `/library/?page=sugar-changed-the-world` & `/library/?page=globalization`

---

## 2. Dedicated Digital Library Reading Page Architecture
To satisfy user instructions that readings must be hosted as standalone reading pages and **not shown as books** in catalog shelves or drawers:
1. **Dynamic Route:** `/library/?page=<slug>` rendered via `library/reading_page.php`.
2. **Numbered Paragraph Anchors:** Every paragraph is tagged with `#p1`, `#p2`, etc., allowing direct textual citation during close reading.
3. **Integrated Accessibility Tools:**
   * **Web Speech Synthesis (TTS):** 1-click read-aloud with Play, Pause, and Stop.
   * **Font Zoom:** Seamless font size scaling from 0.9rem to 1.4rem.
   * **OpenDyslexic Mode:** Dynamic typeface switching for dyslexic readers.
   * **Clean Print View:** 1-click browser printing removing headers and navigation.
4. **Non-Book Catalog Isolation:** Reading pages reside exclusively in `library/assets/pages/` and are not included in `library/assets/data/books.json` or drawer shelves.

---

## 3. Streamlined Worksheet-First UI & Auto-Save
* **Distraction-Free Problem Sets:** Eliminated external pedagogy and research links from lesson bodies.
* **Text-Dependent Questions & Synthesizing Quick Writes:** Structured practice cards matching authentic EngageNY student materials.
* **Client-Side Persistence:** Worksheet input areas automatically synchronize with `localStorage` upon typing, preventing progress loss.
* **Expandable Teacher Solution Keys:** Formative rubrics, claim exemplars, and textual evidence citations.
* **1-Click Printing:** `printProblemSet()` formats clean 8.5x11 printable worksheets.

---

## 4. Verification & Testing Results

| Test Category | Target / Scope | Result | Details |
|---|---|---|---|
| **Level K Landing Page** | `levels/k.php` | **PASS** | 1.07 MB DOM, all 4 modules rendered, 153 lesson links active |
| **Module 1 Lessons** | Sample `k-ela-m1-a-1` | **PASS** | 361 KB HTML, close reading cards, library reading link verified |
| **Module 2 Lessons** | Sample `k-ela-m2-a-1` | **PASS** | 355 KB HTML, close reading cards, library reading link verified |
| **Module 3 Lessons** | Sample `k-ela-m3-a-1` | **PASS** | 378 KB HTML, inquiry practice cards, library reading link verified |
| **Module 4 Lessons** | Sample `k-ela-m4-a-1` | **PASS** | 409 KB HTML, historical argument cards, library reading link verified |
| **Library Reading Pages** | All 10 Reading Slugs | **PASS** | `st-lucys-home`, `letters-to-a-young-poet`, `romeo-and-juliet`, `the-tell-tale-heart`, `i-felt-a-funeral`, `oedipus-the-king`, `true-crime`, `animals-in-translation`, `sugar-changed-the-world`, `globalization` all pass layout, `#p1` anchor, and TTS tests |
| **PHP Syntax Check** | `src/header.php`, `src/footer.php`, `levels/k.php` | **PASS** | Zero syntax errors detected |
| **Master Catalogs** | `curriculum-engageny-ela.json`, `lessons.json` | **PASS** | 153 Grade 9 ELA lessons registered |

---

## 5. Artifacts and Platform Updates
* **Updated Files:**
  * `assets/data/lessons/k-ela-m3.json` (30 lessons)
  * `assets/data/lessons/k-ela-m4.json` (29 lessons)
  * `assets/data/curriculum-engageny-ela.json` (4 modules, 153 lessons)
  * `assets/data/lessons.json` (153 Grade 9 ELA lessons registered)
  * `levels/k.php` (Integrated `k-ela-m1` through `k-ela-m4`)
  * `src/header.php` & `src/footer.php` (Bumped to `v2.37.0`)
* **New Digital Library Readings:**
  * `library/assets/pages/animals-in-translation.json`
  * `library/assets/pages/sugar-changed-the-world.json`
  * `library/assets/pages/globalization.json`
* **New Help Center User Guides:**
  * `assets/text/hc-grade-9-ela-module-3.md`
  * `assets/text/hc-grade-9-ela-module-4.md`
  * `assets/text/hc-grade-9-ela-complete.md`

