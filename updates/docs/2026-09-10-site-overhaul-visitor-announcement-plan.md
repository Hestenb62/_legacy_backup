---
title: "Implementation Plan: Site Overhaul Full-Screen Visitor Announcement"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Announcements", "UX", "A11y", "WCAG", "Settings", "Data Sync", "Overhaul"]
summary: "Detailed implementation plan for a full-screen, accessible site overhaul notification modal displayed to new visitors, explaining ongoing development, evolving layouts, and guiding users to enable Google Drive Data Sync."
author: "Antigravity & Hesten"
---

# Implementation Plan: Site Overhaul Full-Screen Visitor Announcement

## 1. Overview
This feature introduces an accessible, full-screen visitor notice modal across **Hesten's Learning**. When a first-time visitor opens the platform, the modal informs them that the site is actively undergoing a major overhaul, that features may be evolving or temporarily missing, that layouts may shift across reloads, and encourages them to protect their learning records by enabling the Data Sync feature in Settings.

---

## 2. Key Architecture & Components

### A. Partial Template (`src/partials/overhaul-modal.php`)
- Standard semantic markup with `role="dialog"`, `aria-modal="true"`, and `aria-labelledby="overhaul-modal-title"`.
- Four structured message highlights:
  1. **Active Platform Overhaul**: Modernizing curriculum engines and accessibility features.
  2. **Work-in-Progress Elements**: Some features may not work or be temporarily missing.
  3. **Visual & Layout Shifts**: Designs and component styles may change between reloads.
  4. **Data Sync & Backup Safety**: Guidance to visit the Settings page to activate Google Drive auto-sync.
- Primary acknowledgment button and direct link to `/pages/settings.php`.

### B. Global Inclusion (`src/header.php`)
- Injected into universal header so it is present across all landing pages, level hubs, lessons, and utility views.

### C. Glassmorphic Styling (`assets/css/components/fixed-tools.css`)
- Fullscreen backdrop blur with responsive scaling.
- Dark mode and strict WCAG AAA high-contrast styling.
- Non-interfering reflow down to 320px screen width.

### D. Dismissal Controller (`assets/js/global-overhaul-notice.js`)
- Reads and writes `localStorage['hl_overhaul_notice_dismissed']`.
- Accessible focus trapping while active and restoration on close.
- Keyboard dismissal via `Escape`.

---

## 3. Verification & Compliance
- Full keyboard trap testing and screen reader announcement testing.
- Persistence verification in `localStorage`.
- Contrast ratio testing under standard and high-contrast accessibility themes.
