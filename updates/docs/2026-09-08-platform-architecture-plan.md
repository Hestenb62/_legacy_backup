---
title: "Platform-Wide Architectural Implementation Plan"
date: "2026-09-08"
category: "Implementation Plan"
tags: ["Architecture", "Planning", "Roadmap", "Offline", "A11y"]
summary: "Original engineering plan detailing multi-phase improvements for offline capabilities, universal accessibility tools, digital library enhancements, low-anxiety assessment modes, and student curriculum navigation."
author: "Antigravity & Hesten"
---

# Platform-Wide Architectural Implementation Plan

## Overview & Background
An in-depth review of Hesten's Learning platform identified critical areas across key systems requiring consolidation, bug resolution, and modern pedagogical tooling:
- **Offline Reliability**: Solidifying service worker caching around `offline.php` without redundant HTML entry points.
- **Curriculum Hydration**: Dynamic scope and sequence module hydration from CCSS, TEKS, NGSS, and C3 standard datasets.
- **Universal Accessibility**: Introducing saccadic fixation / bionic reading, focus sound synthesis (Brown/Pink/White/Rain noise), and Flowmodoro work pacing.
- **Digital Library Reader**: Word counts, reading times in sticky header and TOC popout, Zen Mode, and unblocked narration speed controls.
- **Assessments**: Low-anxiety untimed practice mode and constructive step-by-step standard guidance on missed questions.

---

## Architectural Decisions & Constraints

> [!IMPORTANT]
> **Core Decisions Agreed With User**:
> 1. **Keep `offline.php`**: Maintain `offline.php` as the primary offline application shell; do not introduce `offline.html`.
> 2. **Avoid Redundant Stubs**: Do not generate placeholder stub files (e.g. `documents.php`). Instead, direct links to active sections like `/library/index.php`.
> 3. **Subject Breadcrumb Hierarchy**: Dynamic breadcrumb trail must format as `Level K Math`, `Level K ELA`, `Level L Science`, etc.
> 4. **Low-Distraction Reader**: Reading time estimates must appear in both sticky header and TOC popout without cluttering reading surfaces.
> 5. **Clean Domain Codes**: Domain filter buttons on the standards explorer must display concise standard numbers and letters (e.g. `K.CC`, `K.OA`) rather than full titles.

---

## Phase Breakdown

### Phase 1: Core Reliability & Navigation
- Solidify service worker cache (`hestens-learning-v6`) caching `offline.php`.
- Fix asset 404s (`assets/js/assessment-ap.js`).
- Clean up dead promotional banners on student homepage.

### Phase 2: Dynamic Subject-Aware Curriculum
- Implement `hydrateLevelModules()` in `src/level_template.php`.
- Dynamic breadcrumb updates in `src/header.php`.
- Preserve subject state across tab switches and URL sync.

### Phase 3: Universal Accessibility & Focus Suite
- Bionic / Saccadic reading toggle in accessibility drawer and library reader.
- Multi-frequency Web Audio ambient sound synthesizer.
- Flowmodoro timer widget.

### Phase 4: Assessment & Standards Polish
- Untimed accommodation mode for formative assessments.
- Real centered modal popup for global error handler with dismiss and copy buttons.
- Short domain buttons and guarded string transforms on `standards.php`.
