---
title: "Universal Single-Column Normal Page Digital Reader Layout"
date: "2026-10-11"
version: "v2.14.0"
category: "Walkthrough"
tags: ["Digital Reader", "CSS", "UI Refinement", "Accessibility", "Typography"]
summary: "Retired the 2-column spread setup from the digital reader, ensuring all books across the library present in a clean, standard single-column normal page flow."
author: "Antigravity & Hesten"
---

# Universal Single-Column Normal Page Digital Reader Layout

## Overview & User Intent
The user requested the permanent removal of the dual-column layout on the digital reader:
> *"I do not want the 2 colum setup for the reader anymore., I want it to show as a normal page"*

Previously, a desktop two-page spread mode split the `.reader-main-content` into `column-count: 2`, dividing text into two side-by-side columns. If a user previously toggled this mode or had it stored in `localStorage`, every book loaded in this split format.

## Implementation Details

1. **CSS Normal Page Enforcement ([`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css)):**
   - Completely removed the `@media (min-width: 900px) { body.mode-spread ... column-count: 2 !important; }` block.
   - Enforced single-column normal page rules across all themes and viewports:
     ```css
     .reader-main-content,
     body.mode-scroll .reader-main-content,
     body.mode-spread .reader-main-content,
     body .reader-main-content {
         column-count: 1 !important;
         columns: auto !important;
         column-gap: normal !important;
         column-rule: none !important;
         column-width: auto !important;
         column-fill: auto !important;
     }

     .reader-main-content p,
     body.mode-spread .reader-main-content p {
         break-inside: auto !important;
     }

     .reader-main-content h1,
     .reader-main-content h2,
     .reader-main-content h3,
     .book-running-header,
     .reader-chapter-end-row {
         column-span: none !important;
     }

     #spread-mode-toggle {
         display: none !important;
     }
     ```

2. **Template & Navigation Controls ([`library/read/reader_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)):**
   - Removed the `#spread-mode-toggle` button from the sticky reading toolbar.
   - Replaced the spread mode toggle script with an automatic cleanup script that clears legacy `hesten_reader_spread_mode` storage keys and removes `mode-spread` from `document.body`.

3. **Documentation & Help Center Sync:**
   - Updated the feature list in [`assets/text/hc-gutenberg-classics.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-gutenberg-classics.md) to describe standard single-column vertical scroll flow.

## Verification
- Confirmed that opening any book across the library renders as a unified, natural reading surface with standard paragraph flow.
- Verified that widescreen monitors retain the optimal editorial reading width (`max-width: min(94vw, 1080px)`) with user width overrides (Compact, Adaptive, Wide, Full) working cleanly without any column splits.
