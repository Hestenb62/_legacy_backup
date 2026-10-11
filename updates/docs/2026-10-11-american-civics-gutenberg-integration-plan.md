---
title: "American Civics & Historic Freedom Classics Gutenberg Ingestion Plan"
date: "2026-10-11"
version: "v2.14.0"
category: "Implementation Plan"
tags: ["Gutenberg", "Civics", "American History", "Digital Library", "Audiobooks"]
summary: "Architectural plan for ingesting and integrating core American civics documents from Project Gutenberg Bookshelf 196 (The Declaration of Independence, Bill of Rights, US Constitution, and Patrick Henry's Liberty speech with LibriVox audio)."
author: "Antigravity & Hesten"
---

# American Civics & Historic Freedom Classics Gutenberg Ingestion Plan

## 1. Objectives & Context
The user requested the addition of core American historical documents and speeches from Project Gutenberg Bookshelf 196 (U.S. American History & Freedom):
- [The Declaration of Independence of the United States of America (Thomas Jefferson, eBook #1)](https://www.gutenberg.org/ebooks/1)
- [The United States Constitution (United States, eBook #5)](https://www.gutenberg.org/ebooks/5)
- [The United States Bill of Rights (United States, eBook #2)](https://www.gutenberg.org/ebooks/2)
- [Give Me Liberty or Give Me Death (Patrick Henry, eBook #6)](https://www.gutenberg.org/ebooks/6)
- [Give Me Liberty or Give Me Death (Patrick Henry Audio Edition, eBook #20046)](https://www.gutenberg.org/ebooks/20046)

## 2. Ingestion & Transformation Strategy
1. **Source Retrieval & Cleaning:**
   - Fetch clean HTML and plain text directly from Project Gutenberg cache servers.
   - Strip licensing boilerplate headers and footers while preserving primary source annotations.
2. **Pedagogical Chapterization:**
   - *The Declaration of Independence (3 Chapters):* Historical Origins (eBook #1 context), The Unanimous Declaration (Preamble, Grievances, Signers), and Jefferson's Handwritten Drafts.
   - *The United States Bill of Rights (2 Chapters):* Preamble & Amendments I–V, Amendments VI–X.
   - *The United States Constitution (7 Chapters):* Dedicated chapters for Articles I through VII with Framer signatures.
   - *Give Me Liberty or Give Me Death (2 Chapters):* Historical Setting at St. John's Church and the Complete Address.
   - *Give Me Liberty or Give Me Death (Audio Edition, 1 Chapter):* Synchronized transcript with embedded HTML5 audio streaming the LibriVox MP3/OGG recording.
3. **Master Catalog & Metadata Registration:**
   - Add all 5 volumes to `library/assets/bookd.json` under the `"Civics"` category with full Library of Congress call numbers, Lexile estimates, grade levels, and cover artwork.
   - Generate precomputed Table of Contents JSON files in `library/assets/<bookId>-toc.json`.
4. **Router & Alias Support:**
   - Update `library/read/index.php` to resolve both slug forms (with or without `the-`) and numeric Gutenberg IDs (`?book=1`, `?book=2`, `?book=5`, `?book=6`, `?book=20046`).
5. **Platform Versioning & Sitemap Indexing:**
   - Bump platform constants to `v2.14.0` in `src/header.php` and `src/footer.php`.
   - Update "What's New in Version [X]" release modal.
   - Create companion Help Center user guide in `assets/text/hc-american-civics-classics.md`.
   - Run `python sitemap.py` to index all newly added chapters and documents in `sitemap.xml`.
