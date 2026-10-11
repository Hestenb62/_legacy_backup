---
title: "American Civics & Historic Freedom Classics Gutenberg Ingestion Walkthrough"
date: "2026-10-11"
version: "v2.14.0"
category: "Walkthrough"
tags: ["Gutenberg", "Civics", "American History", "Digital Library", "Audiobooks"]
summary: "Verification and walkthrough of the complete ingestion of foundational American civics classics into Hesten's Learning Library and Universal Reader."
author: "Antigravity & Hesten"
---

# American Civics & Historic Freedom Classics Gutenberg Ingestion Walkthrough

## Summary of Accomplishments
Successfully integrated 5 foundational American civics and freedom documents from Project Gutenberg's historical archive into Hesten's Learning Library and Digital Reader:
1. **The Declaration of Independence of the United States of America** by Thomas Jefferson & Continental Congress (eBook #1)
2. **The United States Bill of Rights** by United States Congress & James Madison (eBook #2)
3. **The United States Constitution** by Constitutional Convention of 1787 (eBook #5)
4. **Give Me Liberty or Give Me Death** by Patrick Henry (eBook #6)
5. **Give Me Liberty or Give Me Death (Audio Edition)** by Patrick Henry / LibriVox (eBook #20046)

---

## Ingested Volumes & Chapter Architecture

| Title | Gutenberg ID | Book Slug | Chapters | LoC Call No. | Lexile |
| :--- | :---: | :--- | :---: | :--- | :---: |
| **The Declaration of Independence** | `1` | `the-declaration-of-independence` | 3 | `E221 .U5 1776` | 1250L |
| **The United States Bill of Rights** | `2` | `the-united-states-bill-of-rights` | 2 | `KF4744 .A2 1791` | 1180L |
| **The United States Constitution** | `5` | `the-united-states-constitution` | 7 | `KF4501 .A2 1787` | 1320L |
| **Give Me Liberty or Give Me Death** | `6` | `give-me-liberty-or-give-me-death` | 2 | `E201 .H52 1775` | 1120L |
| **Give Me Liberty or Give Me Death (Audio)** | `20046` | `give-me-liberty-or-give-me-death-audio` | 1 | `E201 .H52 1775a` | 1120L |

---

## Technical Implementations

1. **Chapterization & Pedagogical Structure:**
   - Generated clean semantic HTML chapter files under `library/read/<bookId>/chapter-<N>.php`.
   - Included full source backups in `library/read/<bookId>/book.html` and chapter router controllers in `library/read/<bookId>/index.php`.
   - Precalculated word counts and estimated reading times saved in `library/assets/<bookId>-toc.json`.

2. **Multimedia & Spoken Word Audio Integration:**
   - Both text (eBook #6) and audio (eBook #20046) editions of Patrick Henry's speech feature an embedded HTML5 audio player streaming public domain LibriVox recordings directly from Project Gutenberg's audio servers.

3. **Master Catalog Registration:**
   - Added all 5 titles under the `"Civics"` category in [`library/assets/bookd.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/bookd.json).
   - Configured official Gutenberg cover artwork, Library of Congress classifications, and download links for PDF, EPUB, and plain text.

4. **Universal Router Aliases:**
   - Enhanced [`library/read/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/index.php) to support numeric IDs (`?book=1`, `?book=2`, `?book=5`, `?book=6`, `?book=20046`) and slug aliases (`declaration-of-independence`, `united-states-constitution`, `bill-of-rights`).

5. **Release Notes & Documentation:**
   - Bumped platform version constants to `v2.14.0` in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) and [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php).
   - Updated the release notes modal feature list in `src/footer.php`.
   - Created a comprehensive Help Center guide in [`assets/text/hc-american-civics-classics.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-american-civics-classics.md).
   - Regenerated [`sitemap.xml`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/sitemap.xml) and [`sitemap.xsl`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/sitemap.xsl) via `sitemap.py`.
