---
title: "Implementation Plan: Updates Superpowers, Reading Fluency Benchmark & Offline Indicator"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Updates Portal", "Reading Benchmark", "IEP 504 Exporter", "Offline Indicator", "Accessibility", "Research"]
summary: "Comprehensive plan to add download, print, TOC, and tag filtering to the Updates Portal, a reading fluency benchmark and IEP/504 accommodation exporter to the Accessibility Hub, and a global offline connectivity indicator."
author: "Antigravity & Hesten"
---

# Implementation Plan: Updates Superpowers, Reading Fluency Benchmark & Offline Indicator

## Overview
This update introduces advanced workflow and research utilities across the platform:
1. **Updates & Planning Portal Superpowers**: Direct `.md` file download, dedicated document print formatting, auto-generated Table of Contents (TOC) jump navigation, and interactive tag filtering.
2. **Accessibility Research & Clinical Tools**: A live Reading Fluency Benchmark measuring Words Per Minute (WPM) under baseline vs. accommodated conditions, and an IEP/504 Accommodation Profile Exporter.
3. **Site-Wide Offline Connectivity Indicator**: Instant notification when internet connectivity drops, reassuring learners that cached offline materials remain available.

---

## 1. Updates Portal Enhancements (`updates/index.php`, `assets/css/pages/updates.css`)
- **Download `.md` Button**: Uses Blob download with `[filename].md` for easy offline archival.
- **Dedicated Print Button**: Fires print styling isolating only the rendered document body.
- **Dynamic Table of Contents (TOC)**: Scans rendered `<h2>` and `<h3>` tags to render an outline navigation bar with smooth scrolling.
- **Interactive Tag Filtering**: Clicking tags in the document header or sidebar cards updates the search filter query automatically.

---

## 2. Accessibility Research Tools (`pages/accessibility.php`, `assets/css/pages/accessibility.css`)
- **Reading Fluency Benchmark Tool**:
  - Educational reading passage with word count tracking.
  - Timer mechanism tracking elapsed reading seconds.
  - Generates calculated WPM score.
  - Allows side-by-side comparison of baseline vs. Bionic Reading vs. OpenDyslexic.
- **IEP / 504 Accommodation Profile Exporter**:
  - Reads active user accessibility settings from `localStorage`.
  - Generates a clinical brief formatted for parent-teacher conferences and 504 meetings.

---

## 3. Site-Wide Offline Connectivity Indicator (`assets/js/offline-status.js`)
- Listens to `window.addEventListener('offline')` and `'online'`.
- Displays an accessible floating toast pill with polite ARIA live region announcement.

---

## 4. Verification Plan
- Validate JS syntax with `node -c`.
- Live test fetching endpoints via Node.js on `http://localhost:5500/`.
