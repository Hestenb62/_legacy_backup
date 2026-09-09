---
title: "Complete Platform Superpowers: Assistive Voice Dictation, Vision & Colorblindness Simulation Studio, Karaoke Read-Aloud, PWA Storage & Updates Companion Linking"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Accessibility", "Voice Dictation", "Vision Simulation", "Karaoke TTS", "Offline Storage", "Updates Portal", "Architecture"]
summary: "Technical implementation plan for assistive voice dictation (STT) in Scratchpad, clinical vision simulation studio, synchronized word-by-word read aloud, PWA offline storage manager, and Updates Portal companion linking."
author: "Antigravity & Hesten"
---

# Implementation Plan: Complete Platform Superpowers Suite

This plan details the implementation of 5 interconnected platform superpowers across **Hesten's Learning**:
1. **Assistive Voice Dictation (Speech-to-Text) Studio** in Scratchpad (`src/partials/scratchpad.php`, `assets/js/global-study-tools.js`).
2. **Clinical Vision & Colorblindness Simulation Studio** in `pages/accessibility.php` and `assets/css/pages/accessibility.css`.
3. **Karaoke Synchronized Word-by-Word Read-Aloud Engine** in `assets/js/reader/read-text.js` and `pages/accessibility.php`.
4. **PWA Storage & Offline Cache Management Dashboard** in `pages/accessibility.php` and `assets/js/offline-storage-manager.js`.
5. **Updates Portal Companion Linking, Word Count Analytics & Search Snippets** in `updates/index.php` and `assets/css/pages/updates.css`.

---

## User Review Required

> [!IMPORTANT]
> - **Microphone Permissions**: The Speech-to-Text (STT) voice dictation feature relies on the browser's native `SpeechRecognition` / `webkitSpeechRecognition` API. When first activated by the user, the browser will request standard microphone permission.
> - **Storage Estimation**: The PWA Storage Dashboard uses `navigator.storage.estimate()` which is fully supported across modern browsers (Chromium, Firefox, Safari iOS 17+).
> - **SVG Color Matrix Filters**: Colorblindness simulations use standards-compliant SVG `feColorMatrix` filters, ensuring zero external library dependencies and instant CSS hardware-accelerated rendering.

---

## Proposed Changes

### 1. Assistive Voice Dictation & Speech-to-Text (STT)

#### [MODIFY] [scratchpad.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/scratchpad.php)
- Add a dictation microphone toggle button (`#scratchpad-dictate-btn`) with an audio wave indicator to the Scratchpad toolbar.

#### [MODIFY] [global-study-tools.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-study-tools.js)
- Implement `SpeechRecognition` controller with continuous listening, pause, resume, and real-time streaming into `#quick-notes-area`.
- Handle voice commands: `"new line"`, `"clear notes"`, `"period"`, `"comma"`.
- Provide screen reader status feedback via `window.announceA11y()`.

---

### 2. Clinical Vision & Colorblindness Simulation Studio

#### [MODIFY] [accessibility.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/accessibility.php)
- Embed SVG filter definitions in the DOM:
  - `protanopia-filter` (Red-blind / Protanopia)
  - `deuteranopia-filter` (Green-blind / Deuteranopia)
  - `tritanopia-filter` (Blue-blind / Tritanopia)
  - `achromatopsia-filter` (Total monochromacy)
  - `cataracts-filter` (Diffused blur and severe contrast attenuation)
- Add the **Vision & Colorblindness Simulation Studio** section:
  - Multi-condition selector dropdown.
  - Interactive Educational Visual Specimen displaying color spectrum bars, math formulas, reading text, and charts.
  - "Apply Simulation to Entire Viewport" toggle allowing educators to audit any part of the site under that condition.

#### [MODIFY] [accessibility.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/accessibility.css)
- Add styles for `.vision-sim-wrapper`, `.vision-specimen-box`, `.vision-controls-bar`, and viewport filter classes.
- Ensure full compatibility with all 5 themes including High Contrast.

---

### 3. Karaoke Synchronized Word-by-Word Read-Aloud Engine

#### [MODIFY] [read-text.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-text.js)
- Enhance the Text-to-Speech narration engine using `SpeechSynthesisUtterance.onboundary` to detect word boundaries (`event.name === 'word'`).
- Dynamically wrap or highlight each individual word with `.tts-word-highlight` inside the active sentence in real time.

#### [MODIFY] [accessibility.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/accessibility.php)
- Add an interactive **Karaoke Word-Tracking Demonstration** widget under Dyslexia & Reading Comprehension with live controls (Play/Pause/Rate/Stop) so users can immediately test synchronized word-level highlighting.

---

### 4. PWA Storage & Offline Cache Management Dashboard

#### [NEW] [offline-storage-manager.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/offline-storage-manager.js)
- Query `navigator.storage.estimate()` for quota and usage in megabytes.
- Inspect `window.caches.keys()` for cache names and item counts.
- Provide:
  - "Download Complete Offline Course Pack" button (prefetches key learning endpoints).
  - "Purge Outdated Caches" button (clears stale caches without touching localStorage).

#### [MODIFY] [accessibility.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/accessibility.php)
- Insert the **PWA Storage & Offline Diagnostics** card displaying storage gauge, cache inventory, and offline course pack download buttons.

#### [MODIFY] [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js)
- Add `/assets/js/offline-storage-manager.js` to the pre-cached assets list.

---

### 5. Updates Portal: Companion Linking, Word Count Analytics & Search Snippets

#### [MODIFY] [index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/index.php)
- Add `#viewer-word-count` metric chip in the viewer header displaying exact word count.
- In `selectDocument()`, automatically detect if the document has a matching counterpart (e.g., `-plan.md` matching `-walkthrough.md`) and display a direct jump card: *"View Related Implementation Plan / Walkthrough"*.
- In `applyFilters()`, highlight matching search keywords in card titles and descriptions using `<mark>`.

#### [MODIFY] [updates.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/updates.css)
- Add styling for `.upd-companion-card`, `.upd-companion-btn`, and search highlight `<mark>` tags.

---

## Verification Plan

### Automated & Programmatic Verification
1. **JavaScript Syntax Verification**:
   - `node -c assets/js/offline-storage-manager.js`
   - `node -c assets/js/reader/read-text.js`
   - `node -c assets/js/global-study-tools.js`
2. **Server Endpoint Integrity**:
   - Fetch `http://localhost:5500/pages/accessibility.php` and verify:
     - Vision Simulation Studio markup and SVG filters.
     - Karaoke word-tracking widget.
     - PWA Storage & Cache manager.
   - Fetch `http://localhost:5500/updates/index.php` and verify:
     - Word count chip, search `<mark>` highlighting, and companion plan/walkthrough detection.
   - Fetch `http://localhost:5500/` and verify voice dictation in Scratchpad.

### Manual Verification
1. Test Scratchpad dictation mic toggle in browser with voice input.
2. Test vision simulation selector on `pages/accessibility.php` (Protanopia, Deuteranopia, Tritanopia, Achromatopsia, Cataracts).
3. Test Karaoke read-aloud and observe word-by-word tracking.
4. Test PWA Storage quota gauge and course pack download.
5. Search on Updates Portal and test companion jump link between plan and walkthrough.
