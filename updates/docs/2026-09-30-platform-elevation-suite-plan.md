---
title: "Platform Elevation Suite Implementation Plan"
date: "2026-09-30"
version: "v2.6.0"
category: "Implementation Plan"
tags: ["Command-Palette", "Manipulatives", "Skills-Tree", "Gutenberg-Reader", "IEP-Report", "Games", "A11y", "UDL"]
summary: "Comprehensive architectural and implementation plan for the v2.6.0 Platform Elevation Suite covering the Global Command Palette (Ctrl+K), Interactive Manipulatives Lab, Cosmic Skill Tree at /pages/skills.php, Gutenberg E-Reader upgrades, Printable IEP / Standards Progress Report, and ELA games."
author: "Antigravity & Hesten"
---

# Platform Elevation Suite Implementation Plan (v2.6.0)

## Executive Summary
This plan details the phased architectural design and implementation of six major platform elevation features for **Hesten's Learning (`hestena62.com`)**:
1. **Global Command Palette & Instant Jump (`Ctrl + K` / `Cmd + K`)**
2. **Interactive Digital Math & Science Manipulatives Lab** (`pages/manipulatives.php` & modal launcher)
3. **Cosmic Skill Tree & Gamified Mastery Passport** (`pages/skills.php`)
4. **Gutenberg Literature E-Reader Upgrades** (Dictionary lookup, progress indicator, comprehension checks)
5. **Printable Comprehensive Student Progress & IEP Report** (Teacher & Parent hubs with `hestena62.com` branding)
6. **Expanded Accessible Games Hub** (Word Scramble & Grammar Detective in `pages/games.php`)

All implementations strictly adhere to:
- WCAG 2.1/2.2 AA & AAA accessibility (100% keyboard operability, high contrast focus rings, ARIA live regions).
- Universal Design for Learning (UDL) principles.
- Tripartite role data synchronization across student, parent, and teacher schemas with offline-first local storage and Google Drive auto-sync.
- Official platform branding: `hestena62.com`.

---

## Architecture & Phased Roadmap

### Phase 1: Global Command Palette (`Ctrl + K` / `Cmd + K`)
- **Components**:
  - `src/partials/command-palette.php`: Floating dialog with search input, categories (Standards, Lessons, Books, Definitions, Tools, Actions), keyboard navigation (`ArrowUp`/`ArrowDown`, `Enter`, `Escape`), and voice-input button.
  - `assets/css/components/command-palette.css`: Sleek glassmorphic dark/light/midnight theme styling with `:focus-visible` high-contrast outlines.
  - `assets/js/command-palette.js`: Global keyboard listener (`Ctrl+K`, `Cmd+K`, `/`), debounced search index compiled from site standards, math codex, grammar codex, library books, and study tools.
  - Integration in `src/header.php` and `src/footer.php`.

### Phase 2: Interactive Math Manipulatives Lab (`pages/manipulatives.php`)
- **Components**:
  - Dedicated interactive studio at `pages/manipulatives.php` and quick-launcher in `src/partials/learning-launchpad.php`.
  - **Fraction Bars & Slices Lab**: Interactive dynamic fraction strips with live equivalence calculator and addition visualizer ($1/2 + 1/4 = 3/4$).
  - **Base-10 Place Value Blocks**: Units (1), Rods (10), Flats (100), and Blocks (1,000) with compose/decompose actions.
  - **Dynamic Function Grapher**: Coordinate grid with real-time slider controls ($y = mx + b$, $y = ax^2 + c$) rendered via SVG with live MathJax equations.
  - `assets/css/pages/manipulatives.css` & `assets/js/manipulatives-lab.js`.

### Phase 3: Cosmic Skill Tree & Gamified Mastery Passport (`pages/skills.php`)
- **Components**:
  - Hosted at `/pages/skills.php` as explicitly requested.
  - Constellation / RPG-style visual skill tree mapping Common Core State Standards (CCSS) across Math, ELA, and Science.
  - Integrated with `hesten_standards_mastery` and `hl_gamification_profile`:
    - Gold node: Mastered (Score $\ge 80\%$)
    - Silver node: Practiced (Score $> 0\%$)
    - Bronze / Dim node: Discovered / Locked
  - Node modal with standard description, exemplar problem, and direct jump to lesson/quiz.
  - Daily Learning Quests widget (3 daily challenges, XP rewards, streak counter).
  - Collectible Badges & Mastery Crests showcase.

### Phase 4: Gutenberg Literature Reader Upgrades (`library/read/reader_template.php`)
- **Components**:
  - **Offline Word Dictionary & Phonetics Popover**: Double-click or select any word to trigger a clean definition/pronunciation card.
  - **Reading Progress Indicator**: Sticky reading progress bar at top of reader showing % completion and estimated minutes remaining.
  - **End-of-Chapter Comprehension Checks**: 3-question quick quiz at chapter bottom with instant feedback, awarding +25 XP to student gamification profile.
  - **Enhanced Typography Overlays**: Bionic reading bolding toggle and Irlen color contrast overlays.

### Phase 5: Printable Comprehensive Student Progress & IEP Summary
- **Components**:
  - Added to `pages/teachers.php` and `pages/parents.php`.
  - "Generate Official Progress Dossier (PDF)" action button.
  - Clean printable document containing:
    - Official platform header (`hestena62.com`).
    - Student profile summary & grade placement.
    - Standards mastery breakdown by domain (Math, ELA, Science, Social Studies).
    - Assessment history & quiz scores.
    - Active IEP accommodations verification list (Untimed, OpenDyslexic, Irlen tint, Sensory retreat).
    - Teacher notes & parent acknowledgment signatures.
  - Ink-friendly print stylesheet preventing page breaks inside tables and cards.

### Phase 6: Expanded Accessible Games Hub (`pages/games.php`)
- **Components**:
  - **Word Scramble / Etymology Builder**: Reorder scrambled educational vocabulary terms with hint definitions and root-word insights.
  - **Grammar Detective**: Identify syntax errors (run-ons, comma splices, incorrect tenses) within engaging mini-mystery case files.
  - High-contrast keyboard controls, zero-timer stress-free options, and ARIA live announcements.

### Phase 7: Verification, Documentation & Release
- Bump platform version constants to `v2.6.0` (`HL_SITE_VERSION`, `HL_SITE_VERSION_LABEL`, `HL_SITE_VERSION_SUMMARY`).
- Update What's New modal in `src/footer.php`.
- Create companion Help Center guides in `assets/text/`:
  - `assets/text/hc-command-palette.md`
  - `assets/text/hc-manipulatives.md`
  - `assets/text/hc-skills-passport.md`
  - `assets/text/hc-progress-dossier.md`
  - `assets/text/hc-ela-games.md`
- Register all new assets in `service-worker.js`.
- Execute automated syntax, a11y, and integration test scripts.
- Publish `updates/docs/2026-09-30-platform-elevation-suite-walkthrough.md`.
