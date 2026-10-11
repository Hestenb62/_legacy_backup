---
title: "Removal of Center Dividing Line in Digital Reader"
date: "2026-10-11"
version: "v2.13.0"
category: "Bugfix"
tags: ["Digital Reader", "CSS", "UI Refinement", "Accessibility"]
summary: "Eliminated the vertical center column-rule line dividing the digital reader surface, ensuring an uninterrupted and clean reading layout."
author: "Antigravity & Hesten"
---

# Removal of Center Dividing Line in Digital Reader

## Overview & User Issue
When reading books on the digital reader ([`library/read/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/index.php) and [`library/read/reader_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)), a solid vertical rule line was rendered down the exact center of the page between columns. The user requested:
> *"I dont want the center line dividing the rwaders page"*

## Root Cause Analysis
In [`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css) (line 1115), the spread-mode styles defined:
```css
body.mode-spread.mode-scroll .reader-main-content,
body.mode-spread .reader-main-content {
    column-count: 2 !important;
    column-gap: 3.5rem !important;
    column-rule: 1px solid var(--color-border, rgba(0, 0, 0, 0.12)) !important;
    ...
}
```
The `column-rule` property generated a persistent vertical border splitting the reader's central reading stage.

## Changes Applied
1. **Disabled `column-rule` in [`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css)**:
   - Replaced `column-rule: 1px solid var(--color-border, rgba(0, 0, 0, 0.12)) !important;` with `column-rule: none !important;`.
   - Verified that neither single-column mode nor two-column book mode draws a center divider line.

## Verification
- Checked reader layout styles across light, sepia, dark, and midnight themes.
- Confirmed text columns flow cleanly across the page without any intrusive vertical borders or gutters.
