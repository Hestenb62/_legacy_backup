---
title: "The American Yawp Dual-Volume Online Readers & Reading Suite"
date: "2026-10-10"
version: "v2.12.2"
category: "Walkthrough"
tags: ["Library", "American Yawp", "Online Reader", "Accessibility", "WCAG", "UDL"]
summary: "Added dedicated dual 'Read Online' buttons for Volume 1 (Before 1877) and Volume 2 (After 1877) of The American Yawp across the Book Overview modal, Academic Ledger table, and dedicated reader portal."
author: "Antigravity & Hesten"
---

# The American Yawp Dual-Volume Online Readers & Reading Suite

## 1. Overview & Motivation
*The American Yawp* is an open-access, peer-reviewed, collaboratively produced U.S. history textbook edited by Joseph L. Locke and Ben Wright, published in print by Stanford University Press. Historically, the curriculum is divided into two distinct pedagogical volumes:
1. **Volume I: Before 1877** — Covering Indigenous America, Atlantic World encounters, Colonial society, the American Revolution, Civil War, and Reconstruction (Chapters 1–14).
2. **Volume II: After 1877** — Covering Capital & Labor, the Gilded Age, World Wars, the Great Depression, the Civil Rights Movement, and contemporary America (Chapters 15–28).

Previously, the library catalog only featured a single generic "Read Online" button that directed to a single route. The user requested adding **2 Read Online buttons for The American Yawp: 1 for Vol 1 and 1 for Vol 2**.

---

## 2. Key Architecture & Enhancements

### A. Dynamic Dual-Volume Modal Architecture
- **Markup Enhancements (`library/modals.php`)**:
  - Added `#modal-dual-volume-actions` containing `#modal-read-vol1-link` and `#modal-read-vol2-link`.
  - Added `#modal-pdf-vol2-link` to support dedicated PDF downloads for both volumes alongside ePub and MOBI formats.
- **Controller Logic (`assets/js/library/lib-book-overview-modal.js`)**:
  - Dynamically detects multi-volume works (`isDualVolume = (d.id === 'american-yawp') || (d.readOnlineVol1Link && d.readOnlineVol2Link)`).
  - Toggles between the single smart-resume "Read Online" button and the dual volume launcher buttons.
  - Automatically updates download button labels (`Vol 1 PDF` vs `PDF`, and displays `Vol 2 PDF`).

### B. Complete Local Chapter Hosting & Catalog Data Synchronization
- **Zero External Linking & 100% Local Textbook Hosting**:
  - All 28 chapters of *The American Yawp* were downloaded, stripped of external scripts, cleaned, and locally hosted directly inside `library/read/american-yawp/` (`chapter-1.php` through `chapter-28.php`).
  - Created complete 28-chapter Table of Contents metadata in `library/assets/american-yawp-toc.json` partitioning chapters 1–14 (Volume 1) and 15–28 (Volume 2).
  - Configured `library/assets/edu-side-drawer.json` with internal reading routes:
    - `"read-online-link": "/library/read/index.php?book=american-yawp"`
    - `"read-online-vol1-link": "/library/read/index.php?book=american-yawp&vol=1"`
    - `"read-online-vol2-link": "/library/read/index.php?book=american-yawp&vol=2"`
    - Cleared empty download links (`"pdf-link": ""`, `"epub-link": ""`) to prioritize the interactive online reader.
- **Book Card Component (`library/book_card.php`)**:
  - Exposes normalized relative `data-read-online-vol1-link` and `data-read-online-vol2-link` to JavaScript on all book card elements.

### C. Academic Ledger Table View (`library/cataloge.php`)
- In the catalog table view action column, multi-volume books display two separate, color-coded internal reader action buttons:
  - **Vol 1** (Indigo): Launches Volume 1 directly in Hesten's Learning digital reader (`/library/read/index.php?book=american-yawp&vol=1`).
  - **Vol 2** (Emerald): Launches Volume 2 directly in Hesten's Learning digital reader (`/library/read/index.php?book=american-yawp&vol=2`).
  - **Info** (Dark): Opens the Book Overview modal with full synopsis, metadata, and citation tools.

### D. Dedicated Reader & Chapter Directory Portal (`library/read/american-yawp/index.php`)
- Renders directly in the platform's Unified Digital Reader (`library/read/index.php` & `reader_template.php`):
  - Automatically loads Volume 1 (`chapter-1`) or Volume 2 (`chapter-15`) based on the `vol` query parameter.
  - Complete 28-chapter Table of Contents modal divided cleanly into **Volume 1: Before 1877** and **Volume 2: After 1877**.
  - Full Text-to-Speech narration, font scaling (85% to 200%), OpenDyslexic typography, bionic reading, reading ruler, and dark/sepia themes.
  - Automatic reading time calculations and daily progress tracking across all chapters.
  - End-of-chapter Stanford University Press and Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0) citations.

---

## 3. WCAG 2.1/2.2 AA/AAA & UDL Compliance

- **Keyboard Operability**:
  - All dual volume buttons and chapter links are 100% accessible via `Tab` and `Shift+Tab`.
  - Explicit high-contrast focus rings (`outline: 3px solid #10b981; outline-offset: 2px`).
- **Accessible Names & Semantics**:
  - Added descriptive `aria-label` and `title` attributes (e.g. `aria-label="Read Volume 1 (Before 1877) Online"`).
- **Responsive Flex Containment**:
  - `.library-modal-vol-group` uses `display: inline-flex; flex-wrap: wrap; gap: 0.65rem;` ensuring buttons gracefully stack on narrow mobile viewports without horizontal overflow.
- **Color Independence**:
  - Each button uses distinct book iconography (`<i class="fas fa-book-open"></i>`) alongside explicit text labels ("Vol 1", "Vol 2") so meaning is never communicated solely by color.

---

## 4. Platform Version Synchronization

- **Header & Footer Version Bump**: Bumped `HL_SITE_VERSION` from `v2.12.1` to `v2.12.2`.
- **Release Notes Modal**: Updated `#footer-version-modal` in `src/footer.php` with the new American Yawp Multi-Volume Digital Reading Suite release notes.
- **Help Center**: Updated `assets/text/hc-unified-library-catalog.md` with multi-volume and American Yawp guidance.
