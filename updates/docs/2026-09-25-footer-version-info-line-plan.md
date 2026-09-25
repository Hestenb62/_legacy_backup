---
title: "Footer Version Info Line & Release Modal Implementation Plan"
date: "2026-09-25"
category: "Implementation Plan"
tags: ["Footer", "Version", "Modal", "UI/UX", "A11y"]
summary: "Plan for adding a current platform version info line in the footer with an interactive release modal showcasing what is new in v2.4.0, with links to the Updates Portal."
author: "Antigravity & Hesten"
---

# Footer Version Info Line & Release Modal Implementation Plan

## 1. Overview
The user requested a version info line in the site footer directly below the main navigation columns (where marked in the user's diagram). This info line will state the current site version (`v2.4.0 • September 2026 Release`) and provide an interactive trigger to display what the release entails, featuring key highlights and a direct bridge to the full Platform Updates Portal at `/updates/`.

## 2. Requirements & Design
- **Location**: Between `.footer-grid` and `.footer-divider` in [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php).
- **Display**:
  - Version pill badge (`v2.4.0`) with active green pulse indicator.
  - Release title: `September 2026 Release • Accessible UDL & Modern Design System`.
  - Action link / button: `What's New in this Version ›` with icon and accessible button trigger.
- **Interactive Modal**:
  - Accessible modal dialog (`role="dialog"`, `aria-modal="true"`, `aria-labelledby="footer-version-modal-title"`).
  - Highlights what's new in v2.4.0:
    - Dedicated accessible reader hubs and guides.
    - Full WCAG 2.1/2.2 AAA & UDL learning accommodation engine.
    - Modern Vanilla CSS design system alignment across About, Research, and Standards.
    - Tripartite student/teacher/parent cloud synchronization.
  - Action buttons: "Explore All Updates & Logs" (linking to `/updates/`) and "Close".
  - Full keyboard accessibility (`Escape` to close, focus trapped/restored, focus rings).
- **Styles**:
  - Update [`assets/css/layouts/footer.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/footer.css) with responsive flex layout, glassmorphic card styling, theme support (light and dark mode), and high-contrast overrides.

## 3. Implementation Steps
1. Add CSS definitions for `.footer-version-strip`, `.footer-version-badge`, `.footer-version-modal`, and modal backdrop in `assets/css/layouts/footer.css`.
2. Update `src/footer.php` to include:
   - The version information bar below the footer grid.
   - The interactive accessible modal for version details.
   - Small inline script or hook to open/close the modal with keyboard handling.
3. Validate keyboard navigation (`Tab`, `Enter`, `Escape`), contrast, responsive reflow, and dark mode.
4. Record walkthrough in `updates/docs/2026-09-25-footer-version-info-line-walkthrough.md`.
