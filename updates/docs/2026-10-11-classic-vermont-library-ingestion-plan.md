---
title: "Implementation Plan: 11 Classical Literature, Vermont Geological & Civil War Titles Ingestion"
date: "2026-10-11"
version: "v2.15.0"
category: "Implementation Plan"
tags: ["Library", "Project Gutenberg", "Vermont History", "Earth Science", "Bible", "UDL"]
summary: "Comprehensive architectural and ingestion plan for integrating 11 Project Gutenberg titles into the digital library and universal single-column reader."
author: "Antigravity & Hesten"
---

# Implementation Plan: Ingestion of 11 Project Gutenberg Titles

## 1. Overview & Objectives
The goal of this initiative is to expand Hesten's Learning digital library with 11 requested historical, scientific, and literary works from Project Gutenberg, maintaining the standardized **single-column normal page reading flow**, robust metadata cataloging, and full UDL accessibility:

1. **Wuthering Heights** by Emily Brontë (eBook #768, Classic Fiction)
2. **The Geology of Button Bay State Park** by Harry W. Dodge (eBook #61230, Science)
3. **The Geology of Calvin Coolidge State Forest** by Harry W. Dodge (eBook #61400, Science)
4. **The Geology of Darling State Park** by Harry W. Dodge (eBook #60730, Science)
5. **The Geology of D.A.R. State Park, Mt. Philo State Forest Park, Sand Bar State Park** by Harry W. Dodge (eBook #60989, Science)
6. **The Geology of Groton State Forest** by Robert A. Christman (eBook #60710, Science)
7. **The Geology of Mt. Mansfield State Forest** by Robert A. Christman (eBook #62053, Science)
8. **The Green Mountain Boys : or, Vermont and the New York land jobbers** by Philip H. Smith (eBook #74334, US History)
9. **Vermont: A Study of Independence** by Rowland Evans Robinson (eBook #35573, US History)
10. **Vermont riflemen in the war for the union, 1861 to 1865** by William Y. W. Ripley (eBook #35088, US History)
11. **The King James Version of the Bible** (eBook #10, General Resources)

---

## 2. Ingestion & Architectural Strategy

### A. Raw Content Processing
- Download and verify clean HTML source files from Project Gutenberg mirrors into `scratch/new_books_raw/`.
- Strip Gutenberg legal boilerplate headers and footers using regex markers (`*** START OF THE PROJECT GUTENBERG EBOOK... ***`).
- Sanitize markup, rewrite relative image paths (`images/*` -> `https://www.gutenberg.org/cache/epub/{gid}/images/*`), and add responsive image containers (`max-width: 100%; height: auto;`).

### B. Logical Chapterization
- **Wuthering Heights (768):** 34 chapters matching `CHAPTER I` through `CHAPTER XXXIV`.
- **Vermont Geology Booklets (61230, 61400, 60730, 60989, 60710, 62053):** 4 to 5 thematic field chapters each (Introduction, Rock Formations, Glacial History, Field Trips, References).
- **The Green Mountain Boys (74334):** 13 chapters (Preface/Introduction + Chapters I–XII).
- **Vermont: A Study of Independence (35573):** 25 chapters (Chapters I–XXV with descriptive titles).
- **Vermont Riflemen in the War for the Union (35088):** 8 chapters (Chapters I–VII + Conclusion & Roster).
- **King James Bible (10):** 66 discrete chapters corresponding to each canonical book across Old and New Testaments.

### C. Digital Reader & Navigation
- Write individual chapter views into `library/read/<book-slug>/chapter-<N>.php`.
- Write high-speed TOC datasets to `library/assets/<book-slug>-toc.json` containing chapter titles, numbers, word counts, and estimated reading minutes.
- Add local routers in `library/read/<book-slug>/index.php` pointing to `reader_template.php`.
- Support numeric and short slug queries in `library/read/index.php`.

### D. Catalog Integration
- Ingest all 11 titles into `library/assets/bookd.json` under appropriate categories (`Classic Fiction`, `Science`, `US History`, `General Resources`).
- Include complete metadata: Library of Congress call numbers, Lexile metrics, publication dates, and cover images.

---

## 3. Verification & Compliance
- Validate JSON structures and verify 100% of chapter files exist on disk.
- Verify single-column layout invariant (no column dividing lines or 2-column styles).
- Ensure WCAG 2.1/2.2 AA & AAA contrast and UDL features (read-aloud, dyslexic fonts, high contrast).
- Update platform version constants in `src/header.php` and `src/footer.php` to `v2.15.0`.
- Generate companion Help Center guide in `assets/text/hc-classic-vermont-library-additions.md`.
- Regenerate `sitemap.xml`.
