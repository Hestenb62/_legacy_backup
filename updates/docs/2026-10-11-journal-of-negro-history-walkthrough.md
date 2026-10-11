---
title: "Walkthrough: Journal of Negro History (Volumes 1–7) Ingestion"
date: "2026-10-11"
version: "v2.16.0"
category: "Walkthrough"
tags: ["Library", "Project Gutenberg", "Black History", "Carter G Woodson", "US History", "UDL"]
summary: "Verification walkthrough documenting the complete ingestion, chapterization, and single-column reader integration of The Journal of Negro History Volumes 1 through 7."
author: "Antigravity & Hesten"
---

# Walkthrough: Ingestion of The Journal of Negro History (Volumes 1–7)

## 1. Summary of Changes
Volumes 1 through 7 of **The Journal of Negro History** (1916–1922) have been ingested from Project Gutenberg, segmented into 232 discrete, navigable scholarly articles and primary source chapters, and integrated into Hesten's Learning library and single-column digital reader.

### Newly Ingested Volumes:
1. **Volume 1 (1916)**: eBook #13642 — 36 Chapters (`journal-of-negro-history-vol-1`)
2. **Volume 2 (1917)**: eBook #20752 — 33 Chapters (`journal-of-negro-history-vol-2`)
3. **Volume 3 (1918)**: eBook #20906 — 32 Chapters (`journal-of-negro-history-vol-3`)
4. **Volume 4 (1919)**: eBook #21093 — 27 Chapters (`journal-of-negro-history-vol-4`)
5. **Volume 5 (1920)**: eBook #23200 — 37 Chapters (`journal-of-negro-history-vol-5`)
6. **Volume 6 (1921)**: eBook #22149 — 35 Chapters (`journal-of-negro-history-vol-6`)
7. **Volume 7 (1922)**: eBook #24484 — 32 Chapters (`journal-of-negro-history-vol-7`)

Total: **232 scholarly chapters** across all 7 volumes.

---

## 2. Key Verification Points

### A. On-Disk Verification & Precomputed TOCs
Every volume has its folder under `library/read/journal-of-negro-history-vol-<N>/`, local `index.php` router, stub `book.html`, and precomputed `library/assets/journal-of-negro-history-vol-<N>-toc.json` with word counts and reading estimates:
- Vol 1: 36 chapters on disk, 36 TOC records
- Vol 2: 33 chapters on disk, 33 TOC records
- Vol 3: 32 chapters on disk, 32 TOC records
- Vol 4: 27 chapters on disk, 27 TOC records
- Vol 5: 37 chapters on disk, 37 TOC records
- Vol 6: 35 chapters on disk, 35 TOC records
- Vol 7: 32 chapters on disk, 32 TOC records

### B. Distraction-Free Single-Column Reading Flow
All chapters render strictly within the single-column normal page reading flow, without any artificial column breaks or dividing lines.

### C. Issue-Aware Chapter Disambiguation
Generic recurring headings such as `Documents`, `Book Reviews`, `Notes`, and `Communications` are automatically augmented with their quarterly issue dates (e.g., `Historical Documents & Primary Sources (April)`), providing unambiguous navigation in the drawer modal.

### D. Universal Routing & Multi-Volume Handling
`library/read/index.php` was updated to support:
- Numeric eBook queries: `?book=13642`, `?book=20752`, `?book=20906`, `?book=21093`, `?book=23200`, `?book=22149`, `?book=24484`.
- Short aliases: `jnh-vol-1` through `jnh-vol-7`, `jnh-1` through `jnh-7`.
- Multi-volume queries: `?book=journal-of-negro-history&vol=1` through `vol=7`.

### E. Catalog Integration & Platform Synchronization
- All 7 volumes cataloged under `US History` in `library/assets/bookd.json` with Library of Congress call numbers (`E185 .J86`), Lexile estimates, and official Gutenberg cover art.
- Platform release bumped to **`v2.16.0`** in `src/header.php` and `src/footer.php`.
- Version modal updated in `src/footer.php` with a dedicated feature card.
- User guide created at `assets/text/hc-journal-of-negro-history.md`.
- Regenerated `sitemap.xml`.
