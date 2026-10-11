---
title: "Project Gutenberg Top 31 Downloaded Classics Library Integration"
date: "2026-10-11"
version: "v2.5.0"
category: "Implementation Plan"
tags: ["Library", "Gutenberg", "Digital Reader", "Literature", "Accessibility"]
summary: "Comprehensive architectural and ingestion plan for integrating all 31 most-downloaded books from Project Gutenberg (October 2026 archive) into Hesten's Learning digital library catalog and unified digital reader."
author: "Antigravity & Hesten"
---

# Project Gutenberg Top 31 Downloaded Classics Integration Plan

## Executive Overview
This implementation plan establishes the ingestion, categorization, catalog indexing, and digital reader formatting for all 31 titles identified in the Project Gutenberg daily top downloads archive (`library\Most Downloaded Today (101026).mht`). Every title will be fully playable in the Hesten's Learning Unified Digital Reader (`library/read/index.php` and `library/read/reader_template.php`) with multi-chapter pagination, authentic tables of contents, text-to-speech audio narration, customizable typography, and full WCAG/UDL accessibility compliance.

---

## 1. Catalog Inventory (31 Volumes)

The following 31 works from the Project Gutenberg archive will be ingested:

| # | Gutenberg ID | Title | Author | Target Category | LOC Call Number |
|---|--------------|-------|--------|-----------------|-----------------|
| 1 | 37683 | Chambers's Twentieth Century Dictionary (Part 1: A-D) | Thomas Davidson (Ed.) | General Resources | PE1628 .C45 1908 |
| 2 | 1342 | Pride and Prejudice | Jane Austen | Classic Fiction | PR4034 .P7 1813 |
| 3 | 84 | Frankenstein; or, The Modern Prometheus | Mary Wollstonecraft Shelley | Classic Fiction | PR5397 .F7 1818 |
| 4 | 2701 | Moby Dick; Or, The Whale | Herman Melville | Classic Fiction | PS2384 .M6 1851 |
| 5 | 11 | Alice's Adventures in Wonderland | Lewis Carroll | Classic Fiction | PR4611 .A7 1865 |
| 6 | 345 | Dracula | Bram Stoker | Classic Fiction | PR6037.T617 D7 1897 |
| 7 | 100 | The Complete Works of William Shakespeare | William Shakespeare | ELA | PR2754 .C66 1623 |
| 8 | 1513 | Romeo and Juliet | William Shakespeare | ELA | PR2831 .A2 1597 |
| 9 | 145 | Middlemarch | George Eliot | Classic Fiction | PR4662 .A1 1871 |
| 10 | 1280 (26471) | Spoon River Anthology | Edgar Lee Masters | ELA | PS3525.A83 S6 1915 |
| 11 | 49297 | The Works of William Shakespeare (Cambridge Ed., Vol. 5) | William Shakespeare | ELA | PR2753 .C3 1891 |
| 12 | 98 | A Tale of Two Cities | Charles Dickens | Classic Fiction | PR4571 .A1 1859 |
| 13 | 64317 | The Great Gatsby | F. Scott Fitzgerald | Classic Fiction | PS3511.I9 G7 1925 |
| 14 | 2641 | A Room with a View | E. M. Forster | Classic Fiction | PR6011.O58 R6 1908 |
| 15 | 1727 | The Odyssey | Homer (trans. Samuel Butler) | Classic Fiction | PA4025.A1 B8 1900 |
| 16 | 2600 | War and Peace | Leo Tolstoy (trans. Louise & Aylmer Maude) | Classic Fiction | PG3366 .V6 1869 |
| 17 | 25851 | The Life of Charles Dickens (Vol. I-III Complete) | John Forster | World History | PR4581 .F67 1872 |
| 18 | 55 | The Wonderful Wizard of Oz | L. Frank Baum | Classic Fiction | PZ8.B327 Wo 1900 |
| 19 | 76 | Adventures of Huckleberry Finn | Mark Twain | Classic Fiction | PS1305 .A1 1884 |
| 20 | 47715 | The Works of William Shakespeare (Cambridge Ed., Vol. 7) | William Shakespeare | ELA | PR2753 .C3 1892 |
| 21 | 4300 | Ulysses | James Joyce | Classic Fiction | PR6019.O9 U4 1922 |
| 22 | 35 | The Time Machine | H. G. Wells | Classic Fiction | PR5774 .T5 1895 |
| 23 | 45 | Anne of Green Gables | L. M. Montgomery | Classic Fiction | PZ7.M76 An 1908 |
| 24 | 25344 | The Scarlet Letter | Nathaniel Hawthorne | Classic Fiction | PS1868 .A1 1850 |
| 25 | 28556 | History of Woman Suffrage, Volume III | Anthony, Gage, & Stanton | Civics | JK1896 .S8 1886 |
| 26 | 20872 | The Best Short Stories of 1917 | Edward J. O'Brien (Ed.) | Classic Fiction | PS659 .B4 1917 |
| 27 | 1497 | The Republic | Plato (trans. Benjamin Jowett) | Civics | JC71 .P35 1871 |
| 28 | 7370 | Second Treatise of Government | John Locke | Civics | JC153 .L85 1689 |
| 29 | 28054 | The Brothers Karamazov | Fyodor Dostoyevsky (trans. Constance Garnett) | Classic Fiction | PG3326 .B7 1880 |
| 30 | 24780 | The Letters of Queen Victoria (Vol. 2, 1844-1853) | Queen Victoria (Benson & Esher, Eds.) | World History | DA552 .A2 1907 |
| 31 | 34901 | On Liberty | John Stuart Mill | Civics | JC585 .M6 1859 |

---

## 2. Ingestion & Reader Architecture

### A. Catalog Integration (`library/assets/bookd.json`)
1. Integrate all 31 entries with complete metadata:
   - Unique alphanumeric IDs matching platform slug rules.
   - Accurate titles, authors, descriptions, publication dates, and Library of Congress call numbers.
   - Lexile estimates and grade band recommendations.
   - Direct download links (`epub-link`, `pdf-link`, `txt-link`).
   - Standard read-online link: `/library/read/index.php?book=<bookId>`.
   - Project Gutenberg cover images with high-contrast SVG fallbacks.
   - Project Gutenberg sourcing and licensing disclaimers (`"disclaimer-key": "gutenberg"`).

### B. Chapterized Content Delivery (`library/read/<bookId>/`)
1. Ingest text/HTML from Project Gutenberg CDN (`https://www.gutenberg.org/cache/epub/<id>/pg<id>-images.html` or `pg<id>.txt`).
2. Clean Gutenberg header/footer licensing noise while strictly maintaining scholarly copyright notices in the citation/credits metadata.
3. Divide each work into semantic chapters (`chapter-1.php`, `chapter-2.php`, etc.) inside `library/read/<bookId>/`.
4. Generate a companion Table of Contents (`library/assets/<bookId>-toc.json`) storing chapter titles, Roman numerals, and volume indicators.
5. Provide a root index controller (`library/read/<bookId>/index.php`) redirecting into the unified digital reader.

### C. Digital Reader Engine Enhancements (`library/read/index.php`)
1. Ensure the reader seamlessly supports both multi-chapter works and single-file fallback documents.
2. Enable full integration with:
   - Sticky reading bar with chapter progress and daily session timer.
   - Table of Contents drawer modal.
   - Responsive font scalers (A- / 100% / A+).
   - Theme switchers (Light, Sepia, Dark, Midnight).
   - Dyslexia font (OpenDyslexic) and Bionic Reading fixations.
   - Web Speech API text-to-speech audio reader.
   - Offline caching support.

---

## 3. Step-by-Step Implementation Workflow

1. **Step 1: Automated Fetch & Parse Script**:
   - Create a Python batch script to download, parse, clean, and chapterize all 31 books into `library/read/<bookId>/`.
   - Generate `library/assets/<bookId>-toc.json` for all books.
2. **Step 2: Update Catalog Database**:
   - Merge all 31 books into `library/assets/bookd.json` without duplicating existing entries (`frankenstein` and `pride-and-prejudice`).
3. **Step 3: Controller & Routing Validation**:
   - Ensure `library/read/index.php` routes smoothly to all 31 books.
4. **Step 4: Platform Version & Release Synchronization**:
   - Bump platform release version from `v2.4.0` to `v2.5.0` in `src/header.php` and `src/footer.php`.
   - Update the "What's New in Version 2.5.0" modal feature list in `src/footer.php`.
5. **Step 5: Help Center Documentation**:
   - Create user guide `assets/text/hc-gutenberg-classics.md` explaining how to browse, read, and listen to the newly added classics.
6. **Step 6: Verification & Walkthrough**:
   - Verify catalog cards in `library/index.php` and `library/cataloge.php`.
   - Verify digital reader rendering across various devices and reading settings.
   - Save completion walkthrough to `updates/docs/2026-10-11-gutenberg-library-integration-walkthrough.md`.
