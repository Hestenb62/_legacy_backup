---
title: "Site Overhaul Full-Screen Visitor Announcement Walkthrough"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Announcements", "UX", "A11y", "WCAG", "Settings", "Data Sync", "Overhaul"]
summary: "Comprehensive walkthrough of the newly deployed full-screen visitor overhaul announcement modal, highlighting active development, shifting aesthetics, potential missing features, and guiding users to Google Drive Data Sync."
author: "Antigravity & Hesten"
---

# Site Overhaul Full-Screen Visitor Announcement Walkthrough

## 1. Overview & Purpose
In accordance with the approved **Implementation Plan**, we deployed an accessible, full-screen visitor announcement modal across **Hesten's Learning**. First-time visitors are automatically presented with a clear, transparent explanation that the platform is undergoing a major site-wide overhaul, that layouts and features may evolve, and that they should enable the **Data Sync** feature on the Settings page to preserve their progress.

---

## 2. Key Components & Implementation Details

### A. Accessible Modal Partial (`src/partials/overhaul-modal.php`)
- **Semantic Structure**: Rendered with `role="dialog"`, `aria-modal="true"`, `aria-labelledby="overhaul-modal-title"`, and `aria-describedby="overhaul-modal-desc"`.
- **Four Core Notice Highlights**:
  1. **Active Site Overhaul**: Continuous refactoring across curriculum modules, study tools, and accessibility engines.
  2. **Evolving & Missing Features**: Notification that certain buttons or exercises may be work-in-progress or temporarily absent.
  3. **Dynamic Looks & Layouts**: Transparency regarding visual styles, colors, and layouts adjusting across page reloads.
  4. **Enable Cloud Data Sync**: Direct recommendation and call-to-action guiding users to connect **Google Drive Auto-Sync** and local backups on `/pages/settings.php`.
- **Dual Action Buttons**:
  - `I Understand & Explore` (Acknowledges and closes modal).
  - `Go to Settings & Data Sync` (Direct navigation to `/pages/settings.php`).

### B. Global Inclusion (`src/header.php`)
- Injected universally across all site endpoints immediately following skip navigation and interactive panel containers:
  ```php
  <?php include __DIR__ . '/partials/overhaul-modal.php'; ?>
  ```

### C. Glassmorphic Styling (`assets/css/components/fixed-tools.css`)
- **Backdrop Blur**: `background: rgba(15, 23, 42, 0.82); backdrop-filter: blur(14px);` preventing background distractions.
- **Body Freeze**: Locks `body.overhaul-modal-open { overflow: hidden; }` to prevent scroll bleeding.
- **Theme Adaptation**:
  - Light mode: Clean surface card with shadow.
  - Dark & Midnight modes: `#0f172a` canvas with subtle contrast borders.
  - High Contrast mode: Strict `#000000` canvas, `#ffffff` borders (3px solid), and `#ffff00` primary buttons meeting WCAG AAA requirements.
- **Smooth Animations**: Responsive dialog scaling from `scale(0.95)` to `scale(1)` with cubic-bezier easing.

### D. Client-Side Controller (`assets/js/global-overhaul-notice.js`)
- **First-Time Detection**: Checks `localStorage['hl_overhaul_notice_dismissed'] === 'v1.0'`. Only displays for new visitors (or when version updates).
- **Accessible Keyboard Trap**:
  - `Escape` key immediately dismisses the modal.
  - `Tab` and `Shift+Tab` loop focus within the modal dialog.
  - Focus is restored to the previous active element upon closing.
- **Reopen API**: Exposes `window.hlShowOverhaulNotice()` for help links or testing.

---

## 3. Verification & Compliance Results
- **Keyboard Access**: Tested focus trap within modal and `Esc` key dismissal.
- **Persistence**: Validated that clicking `I Understand & Explore` writes `hl_overhaul_notice_dismissed: 'v1.0'` to `localStorage` and suppresses future automatic displays.
- **Reflow**: Verified modal dialog reflows cleanly on narrow mobile viewports down to 320px with dedicated internal touch scrolling.
- **Accessibility**: Full compliance with WCAG 2.1 AA/AAA and UDL representation guidelines.
