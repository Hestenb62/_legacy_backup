---
title: "Removal of Platform Guide Popup from Index Page"
date: "2026-10-10"
version: "v2.12.4"
category: "Walkthrough"
tags: ["Home Page", "UI Refinement", "Accessibility", "Clean Layout"]
summary: "Removed the legacy Platform Guide popup banner, associated CSS stylesheet, and Academic Path header trigger button from the main index landing page."
author: "Antigravity & Hesten"
---

# Walkthrough: Removal of Platform Guide Popup from the Index Page

## 1. Overview
At user request, the **Platform Guide** popup banner and its toggle mechanism have been cleanly removed from the main platform landing page ([`index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/index.php)). This streamlines the initial landing view, eliminates layout shifting and popup dismiss states, and focuses learner attention directly on the **Academic Path** curriculum grid and quick-access learning tools.

---

## 2. Changes Made

### A. Index Page Layout & Styles ([`index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/index.php))
- Removed the stylesheet link `<link rel="stylesheet" href="<?= assetVersion('/assets/css/components/welcome-guide.css') ?>">`.
- Removed the partial include `<?php include __DIR__ . '/src/partials/welcome-guide.php'; ?>` above the Academic Path section.

### B. Academic Path Header ([`src/partials/academic-path-header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/academic-path-header.php))
- Removed the `<button class="path-guide-btn">` that previously toggled the Platform Guide popup (`window.toggleWelcomeGuide()`), ensuring no dead controls or orphaned trigger buttons remain in the UI.

### C. Version Constants & Release Notes
- Bumped platform semantic version to **v2.12.4** in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) and [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php).
- Updated the "What's New in Version [X]" release notes modal in [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) to document the streamlined home landing experience.

---

## 3. Verification & Compliance
- **No Residual Popups**: Neither the `#welcome-guide-banner` element nor its FOUC inline style tag are injected into [`index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/index.php).
- **Clean Keyboard & Screen Reader Flow**: Tab order moves directly from the hero CTAs/skip link into the Academic Path heading, filter tabs, and grade cards with zero intermediate dismissed elements.
- **WCAG & UDL**: Full keyboard accessibility, contrast standards, and responsive reflow are preserved.
