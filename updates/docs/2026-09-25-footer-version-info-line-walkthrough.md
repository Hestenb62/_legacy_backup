---
title: "Footer Version Info Line & Release Modal Walkthrough"
date: "2026-09-25"
category: "Walkthrough"
tags: ["Footer", "Version", "Modal", "UI/UX", "A11y"]
summary: "Walkthrough of the newly implemented platform version info line in the footer, complete with active status pulse, version details trigger, and accessible What's New modal linking to the Updates Portal."
author: "Antigravity & Hesten"
---

# Footer Version Info Line & Release Modal Walkthrough

## Summary of Changes
A persistent, responsive platform version information bar and interactive "What's in Version 2.4.0" modal have been added to the global footer ([`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php)) and styled via ([`assets/css/layouts/footer.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/footer.css)).

## Key Enhancements

### 1. Centralized Version Constants ([`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php))
- Defined standard platform version constants:
  - `HL_SITE_VERSION = 'v2.4.0'`
  - `HL_SITE_VERSION_DATE = 'September 2026'`
  - `HL_SITE_VERSION_LABEL = 'September 2026 Release'`
  - `HL_SITE_VERSION_SUMMARY = 'Accessible UDL & Modern Design System'`

### 2. Footer Version Info Strip ([`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php))
- Positioned directly beneath the 4-column footer navigation grid and above the footer divider line.
- Contains:
  - **Version Badge**: Pill badge with active green pulsing status indicator (`Version v2.4.0`).
  - **Release Meta**: Label and summary text (`September 2026 Release • Accessible UDL & Modern Design System`).
  - **Interactive Action Button**: Sparkle icon trigger (`What's New in v2.4.0`) with clear hover states and high-contrast focus rings.

### 3. Accessible "What's New" Release Modal
- Fully accessible dialog (`role="dialog"`, `aria-modal="true"`, `aria-labelledby`).
- Highlights release features:
  - WCAG AAA & UDL Compliance (OpenDyslexic typography, dyscalculia colorizer, Irlen overlays).
  - Educational Guides & Multi-Lexile Reader.
  - Modern Vanilla CSS Design System.
  - Tripartite Cloud Sync & Offline Resiliency.
- Includes quick-action button linking directly to the full [Platform Updates & Planning Portal](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/).
- Supports keyboard navigation: `Escape` key close, focus trap/restoration, and backdrop click dismiss.

### 4. Styling & Theming ([`assets/css/layouts/footer.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/footer.css))
- Glassmorphic styling with blurred backdrop.
- Full dark mode and high-contrast accessibility mode support.
- Fully responsive across mobile, tablet, and desktop breakpoints.

## Verification
- Validated PHP syntax across both `src/header.php` and `src/footer.php` with zero errors.
- Verified keyboard accessibility (`Tab`, `Enter`, `Escape`) and ARIA landmark compliance.
