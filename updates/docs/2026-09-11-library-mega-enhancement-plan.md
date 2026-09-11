---
title: "Comprehensive Digital Library Mega-Enhancement Plan"
date: "2026-09-11"
category: "Implementation Plan"
tags: ["Library", "Gamification", "Study Notebook", "Filters", "Audio", "Classroom", "Offline"]
summary: "Comprehensive multi-phase roadmap to implement reading goals & gamification streaks, centralized study notebook & flashcard export, curriculum quick filter pills, enhanced audio read-aloud, teacher assignment links, interactive math widgets, and offline study packs."
author: "Antigravity & Hesten"
---

# Comprehensive Digital Library Mega-Enhancement Roadmap

## Overview
We are expanding Hesten's Digital Library into an all-in-one academic reading and research ecosystem. This plan breaks down the implementation into six structured phases:
1. **Curriculum Quick Filter Pills & Catalog Sorting**
2. **Reading Goals, Gamified Streaks & XP Rewards**
3. **Centralized "My Study Notebook" & 1-Click Flashcard Exporter**
4. **Teacher / Parent "Assign to Classroom" & Deep-Link Share System**
5. **Enhanced Audio Read-Aloud with Sentence-Level Karaoke Highlighting**
6. **Interactive Reference Math Sandbox & Offline Study Packs**

---

## Proposed Phases & Architecture

### Phase 1: Curriculum Quick-Filter Pills & Catalog Sorting
- **UI Markup ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))**:
  - Add quick filter chips below the search bar: `All`, `Elementary (K-5)`, `Middle (6-8)`, `High School (9-12)`, `Primary Sources`, `Math Reference`, `⭐ My Saved`.
  - Add Catalog Sort Dropdown: `Title (A–Z / Z–A)`, `Lexile (Low–High / High–Low)`, `Grade Level`.
- **Filtering Logic ([`assets/js/library/lib-real.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-real.js))**:
  - Upgrade filter pipeline to support simultaneous query, quick pill, category select, Lexile band, and sort order.

### Phase 2: Reading Goals, Gamified Streaks & XP Integration
- **Academic Dashboard ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))**:
  - Add a circular SVG Daily Reading Goal Progress Ring (e.g. *15/30/45 mins/day*).
  - Add a Streak Counter (`🔥 5 Day Streak`) and Reading Achievement Badges (*Historical Scholar*, *Formula Master*, *Avid Reader*).
- **Gamification Controller ([`assets/js/library/lib-reading-gamification.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-reading-gamification.js))**:
  - Tracks reading time per session, checks off daily reading goals, and awards XP into `hl_gamification_profile` and `hesten-user-profile`.

### Phase 3: Centralized "My Study Notebook" & Flashcard Exporter
- **Modal Component ([`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php))**:
  - Create `#studyNotebookModal` to aggregate all user highlights, book notes, and bookmarks across all read titles.
  - Search and tag filtering across all personal notes.
  - 1-click **Export to Markdown**, **Printable Study Guide**, or **Anki / Flashcards CSV**.

### Phase 4: Teacher & Parent "Assign to Classroom" Sharing System
- **Share Modal ([`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php))**:
  - Create `#shareAssignmentModal` on book cards and modals.
  - Generates custom direct links with pre-set accommodations (e.g., OpenDyslexic font, Irlen tint, untimed mode) and printable QR codes for worksheets.

### Phase 5: Enhanced Audio Read-Aloud & Sentence Highlighting in Reader
- **Speech Engine ([`assets/js/reader/read-speech.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-speech.js))**:
  - Sentence-by-sentence boundary detection with synchronized karaoke word/sentence highlighting.
  - Multi-voice selector with speed control chips (`0.75x`, `1.0x`, `1.25x`, `1.5x`).

### Phase 6: Interactive Math Sandbox Widgets & Offline Study Packs
- **Interactive Widgets**:
  - Interactive formula popups in math reference chapters (`math-facts-repo`).
- **Offline Pack Exporter**:
  - 1-click bundle generator for offline study packs.

---

## Verification & Execution Strategy
- We will execute Phase 1 and Phase 2 immediately, verify, and proceed sequentially across all phases, logging updates into `updates/docs/` and walkthrough artifacts.
