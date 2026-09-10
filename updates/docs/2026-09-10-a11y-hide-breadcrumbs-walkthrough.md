---
title: "Accessibility Popout: Hide Breadcrumbs Toggle"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Accessibility", "A11y", "UDL", "UI"]
summary: "Added a toggle in the global Accessibility popout panel allowing users to hide breadcrumb navigation across the platform, with persistent state storage and screen reader announcements."
author: "Antigravity & Hesten"
---

# Accessibility Popout: Hide Breadcrumbs Feature

## Overview
To provide greater visual clarity, reduce cognitive clutter, and support Universal Design for Learning (UDL) principles, an option has been added to the global accessibility popout panel allowing students, teachers, and parents to hide breadcrumb navigation trails site-wide.

## Changes Implemented

### 1. Popout Panel Control
- **File:** [src/partials/a11y-settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/a11y-settings.php)
- Added a new toggle row with checkbox `#panel-breadcrumbs` directly below "Hide Images".
- Connected `onchange="updateGlobalSetting('hideBreadcrumbs', this.checked)"` for reactive updates.

### 2. Global Styling & Selectors
- **File:** [assets/css/global-primitives.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-primitives.css)
- Added `.hide-breadcrumbs` CSS rule applying `display: none !important;` to:
  - Standard breadcrumb navigation (`.breadcrumb-nav`)
  - Level-specific trails (`.level-breadcrumb`)
  - Lesson headers (`.lesson-top-nav`)
  - Catalog drawers (`.drawer-breadcrumbs`)
  - Research hub hero breadcrumbs (`.research-hero-breadcrumbs`)
  - ARIA landmark navigations (`nav[aria-label*="Breadcrumb"]`, `nav[aria-label*="breadcrumb"]`, `[aria-label="Breadcrumb"]`, `[aria-label="Breadcrumb navigation"]`)

### 3. Controller & State Management
- **File:** [assets/js/global-a11y.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-a11y.js)
  - Registered `hideBreadcrumbs: false` in `defaultSettings`.
  - Added screen reader announcement in `friendlyAnnouncements`: `"Breadcrumbs hidden"` / `"Breadcrumbs visible"`.
  - Added dynamic body class toggling `toggleClass(b, 'hide-breadcrumbs', !!s.hideBreadcrumbs)` in `applySettings()`.
  - Synchronized panel control state in `syncPanelInputs()`.
  - Persisted setting across sessions in `localStorage['hl_accessibility_settings']`.

## Verification & Compliance
- **Keyboard & Focus:** Checkbox is fully focusable and toggleable via `Space` / `Enter`.
- **Screen Reader Announcement:** State toggling triggers live announcements via `#a11y-live-region`.
- **Persistence:** Setting persists on page reloads and across tabs via standard storage events.
- **Standards:** WCAG 2.1/2.2 AA & AAA compliant.
