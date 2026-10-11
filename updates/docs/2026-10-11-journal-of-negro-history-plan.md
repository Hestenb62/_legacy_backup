---
title: "Implementation Plan: Journal of Negro History (Volumes 1–7) Ingestion"
date: "2026-10-11"
version: "v2.16.0"
category: "Implementation Plan"
tags: ["Library", "Project Gutenberg", "Black History", "Carter G Woodson", "US History", "UDL"]
summary: "Implementation plan for ingesting and chapterizing Volumes 1 through 7 of The Journal of Negro History into the digital library and universal single-column reader."
author: "Antigravity & Hesten"
---

# Implementation Plan: Ingestion of The Journal of Negro History (Volumes 1–7)

## 1. Executive Summary & Goals
The objective of this task is to ingest and integrate the foundational early volumes of **The Journal of Negro History** (Volumes 1 through 7, spanning 1916 to 1922) from Project Gutenberg into Hesten's Learning digital library. Founded by Dr. Carter G. Woodson, this collection represents one of the most critical primary source archives in African American historiography, African diaspora studies, and civil rights legal scholarship.

Target Volumes:
1. **Volume 1 (1916)**: Project Gutenberg eBook #13642
2. **Volume 2 (1917)**: Project Gutenberg eBook #20752
3. **Volume 3 (1918)**: Project Gutenberg eBook #20906
4. **Volume 4 (1919)**: Project Gutenberg eBook #21093
5. **Volume 5 (1920)**: Project Gutenberg eBook #23200
6. **Volume 6 (1921)**: Project Gutenberg eBook #22149
7. **Volume 7 (1922)**: Project Gutenberg eBook #24484

---

## 2. Ingestion & Architecture Strategy

### A. Raw Content Processing & Sanitization
- Download raw HTML files directly from Project Gutenberg mirrors into `scratch/jnh_raw/`.
- Strip Gutenberg license preambles and footers using regex anchor boundaries.
- Sanitize markup and rewrite all relative image paths (`images/*` -> `https://www.gutenberg.org/cache/epub/{gid}/images/*`) with responsive image constraints (`max-width: 100%; height: auto;`).

### B. Chapterization & Quarterly Issue Mapping
- Each volume contains four quarterly issues (January, April, July, October).
- Detect quarterly issue markers across `<h1>`, `<h2>`, and `<h3>` tags to maintain chronological context.
- Segment each volume by `<h2>` articles and monographs, merging microscopic title banners (< 300 bytes) into their corresponding chapters.
- Disambiguate recurring section titles (`Documents`, `Book Reviews`, `Notes`) by appending their issue date (e.g. `Historical Documents & Primary Sources (April)`).

### C. Digital Reader Delivery & Routing
- Render every chapter in the distraction-free **single-column normal page layout**.
- Generate precomputed metadata in `library/assets/<slug>-toc.json` containing chapter titles, numbers, word counts, and estimated reading times.
- Configure local routers in `library/read/<slug>/index.php` and update the universal router in `library/read/index.php` to handle direct numeric IDs (`?book=13642`, `?book=20752`, etc.), short slugs (`jnh-vol-1`), and multi-volume query strings (`?book=journal-of-negro-history&vol=2`).

### D. Catalog Integration & Platform Synchronization
- Ingest all 7 volumes into `library/assets/bookd.json` under `US History` with complete Library of Congress call numbers (`E185 .J86`), Lexile ratings (1230L–1270L), and cover imagery.
- Bump platform version constants across `src/header.php` and `src/footer.php` to `v2.16.0`.
- Update the "What's New in Version [X]" modal feature list in `src/footer.php`.
- Create companion Help Center guide at `assets/text/hc-journal-of-negro-history.md`.
- Regenerate `sitemap.xml`.
