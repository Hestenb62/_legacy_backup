---
title: "Implementation Plan: History of Woman Suffrage (Volumes I, II, IV, V, VI) Ingestion"
date: "2026-10-11"
version: "v2.17.0"
category: "Implementation Plan"
tags: ["Library", "Project Gutenberg", "Woman Suffrage", "Civics", "US History", "19th Amendment", "UDL"]
summary: "Implementation plan for completing the ingestion of all remaining volumes of The History of Woman Suffrage (Volumes I, II, IV, V, and VI) into the digital library and universal single-column reader."
author: "Antigravity & Hesten"
---

# Implementation Plan: Completing the Six-Volume History of Woman Suffrage

## 1. Executive Summary & Goals
The goal of this initiative is to ingest the remaining five volumes of the seminal **History of Woman Suffrage** archive from Project Gutenberg (Volumes I, II, IV, V, and VI), joining the already-ingested Volume III to complete the entire six-volume monumental chronicle of the American women's voting rights movement.

Target Volumes:
1. **Volume I (1848–1861)**: Project Gutenberg eBook #28020
2. **Volume II (1861–1876)**: Project Gutenberg eBook #28039
3. **Volume IV (1883–1900)**: Project Gutenberg eBook #29870
4. **Volume V (1900–1920)**: Project Gutenberg eBook #29878
5. **Volume VI (1900–1920)**: Project Gutenberg eBook #30051

---

## 2. Ingestion & Architecture Strategy

### A. Raw Content Processing & Image Sanitation
- Download raw HTML files from Project Gutenberg mirrors into `scratch/suffrage_raw/`.
- Strip Gutenberg license preambles and footers using regex anchor boundaries.
- Sanitize markup and rewrite relative image paths (`images/*` -> `https://www.gutenberg.org/cache/epub/{gid}/images/*`) with responsive constraints (`max-width: 100%; height: auto;`).

### B. Logical Chapterization & Heading Polishing
- Identify `<h2>` chapter markers and associated `<h3>` subtitles.
- Extract descriptive titles for each chapter (e.g. `Chapter I: Preceding Causes`, `Chapter XVI: Woman's Patriotism in the War`, `Chapter I: Alabama`).
- Normalize Roman numeral formatting (`Chapter XVI` instead of `Chapter Xvi`) and clean possessive apostrophe casing (`Woman's`).
- Segment sections into individual chapter files (`chapter-<N>.php`) with word count and read time calculations.

### C. Digital Reader Delivery & Routing
- Render each chapter strictly in the **single-column normal page layout**.
- Generate precomputed metadata in `library/assets/<slug>-toc.json`.
- Add local routers in `library/read/<slug>/index.php` and configure universal routing aliases in `library/read/index.php` for direct numeric eBook queries (`?book=28020`, `?book=28039`, etc.) and multi-volume query parameters (`?book=history-of-woman-suffrage&vol=<N>`).

### D. Catalog Integration & Platform Synchronization
- Ingest all 5 newly added volumes into `library/assets/bookd.json` under `Civics` with Library of Congress call numbers (`JK1896 .S8`), Lexile ratings (1310L–1360L), and cover art.
- Bump platform version constants across `src/header.php` and `src/footer.php` to `v2.17.0`.
- Update the "What's New in Version [X]" modal feature list in `src/footer.php`.
- Create companion Help Center guide at `assets/text/hc-history-of-woman-suffrage.md`.
- Regenerate `sitemap.xml`.
