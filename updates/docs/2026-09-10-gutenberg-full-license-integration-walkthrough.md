---
title: "Walkthrough: Dynamic Gutenberg Full License Integration & Tab Layout Refinement"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Library", "Modals", "Licensing", "Project Gutenberg", "A11y"]
summary: "Positioned the License & Attribution Statement under the Book License & Source tab, removed the 3 metadata pills for a clean presentation, and delivered the full Project Gutenberg license under the General Terms & Full License tab from assets/text/library-gutenburg.md."
author: "Antigravity & Hesten"
---

# Walkthrough: Dynamic Gutenberg Full License Integration & Tab Layout Refinement

## Overview
Refined the digital library's Content Sourcing & Terms modal based on user feedback:
1. **Tab 1 ("Book License & Source")**:
   - Houses the title-specific Resource card ("RESOURCE" title and author).
   - Houses the dynamic **License & Attribution Statement** box (`#modal-license-text`).
   - Removed the 3 metadata badge pills (Source, Metadata, License) for a clean, direct layout.
2. **Tab 2 ("General Terms & Full License")**:
   - Houses the complete, verbatim **Project Gutenberg™ Full License Agreement** pulled directly from [`assets/text/library-gutenburg.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/library-gutenburg.md).
   - Followed by the comprehensive platform-wide legal policies (Educational Fair Use, Public Domain Verification, Creative Commons, Intellectual Property, and DMCA contact).

---

## Changes Made

### 1. Modal Markup Layout (`library/modals.php`)
- **Removed Pills**: Removed `.disclaimer-badges-row` from Tab 1.
- **Relocated Attribution Box**: Moved `.disclaimer-text-card` (containing `#modal-license-text`) back into Tab 1 (`#disclaimer-license-view`) directly beneath the Resource card.
- **Full License in Tab 2**: Tab 2 (`#disclaimer-standard-view`) cleanly opens with the Full Gutenberg License card (`#modal-gutenberg-card`), followed by the platform policies.

### 2. Tab Visibility & Switching Logic (`assets/js/library/lib-explainer.js`)
- `switchDisclaimerTab` removes/adds the `.hidden` class and updates `style.display` as well as `aria-selected` attributes to ensure instantaneous and reliable tab rendering without CSS override collisions.

### 3. File Assets & Offline Availability
- [`assets/text/library-gutenburg.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/library-gutenburg.md) contains the official Project Gutenberg License.
- Registered in [`service-worker.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) for full offline caching.
