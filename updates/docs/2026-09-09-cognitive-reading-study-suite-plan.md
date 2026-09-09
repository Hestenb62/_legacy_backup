---
title: "Phase 1 Implementation Plan: Cognitive Reading & Study Mastery Suite"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Reading Laboratory", "Flashcards", "Leitner SRS", "Annotations", "Morphemes", "Study Suite", "Architecture"]
summary: "Technical implementation plan for Phase 1 of the expanded roadmap: Leitner Spaced-Repetition Flashcard Studio with 3 study modes, 4-color semantic margin annotation studio with study guide synthesis, and morphemic phonetic anatomy breakdown."
author: "Antigravity & Hesten"
---

# Implementation Plan: Phase 1 — Cognitive Reading & Study Mastery Suite

This technical plan details the architecture and step-by-step implementation of **Phase 1: The Cognitive & Multi-Sensory Reading Laboratory** across **Hesten's Learning**:
1. **Universal Leitner Spaced-Repetition System (SRS) Flashcard Studio**
2. **Multi-Color Persistent Annotation & Semantic Marginalia Studio**
3. **Morpheme & Phonetic Anatomy Breakdown Engine**

---

## User Review Required

> [!IMPORTANT]
> - **Keyboard Shortcut**: `<kbd>Alt+F</kbd>` will be registered globally to toggle the Flashcard Studio from any page, alongside `<kbd>Alt+T</kbd>` (Timer), `<kbd>Alt+S</kbd>` (Scratchpad), and `<kbd>Alt+A</kbd>` (Accessibility).
> - **Local Data Persistence**: Flashcard decks, Leitner box progress, margin notes, and highlighters persist locally in `localStorage` under `hl_leitner_decks` and `hl_reader_annotations`, maintaining 100% offline functionality.
> - **Theme Adaptability**: All new highlighters, sticky margin notes, and 3D flashcards adapt seamlessly across Light, Dark, Midnight, Sepia, and High Contrast (`#000000` / `#ffffff` / `#ffff00`).

---

## Proposed Changes

### 1. Universal Leitner Spaced-Repetition (SRS) Flashcard Studio

#### [NEW] [flashcard-studio.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/flashcard-studio.php)
- Accessible modal dialog (`#flashcard-studio-modal`) with accessible focus trapping, keyboard navigation, and aria live regions.
- Deck selector (Pre-loaded curriculum decks + custom student decks).
- **Leitner Box Tracker (Boxes 1–5)**:
  - Box 1: Daily review
  - Box 2: Every 3 days
  - Box 3: Weekly review
  - Box 4: Bi-weekly review
  - Box 5: Mastered
- **Tri-Modal Practice Modes**:
  1. *Classic Flashcard Flip*: Interactive 3D flip card with self-graded recall (*Again*, *Hard*, *Good*, *Easy*).
  2. *Cloze Recall (Fill-in-the-Blank)*: Sentence context with key term hidden.
  3. *Audio Spelling Bee*: Text-to-speech pronunciation with auto-graded spelling entry.
- Visual retention meter displaying calculated memory strength and cards due today.

#### [NEW] [flashcard-studio.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/flashcard-studio.js)
- Leitner box calculation algorithm (calculates next due timestamps).
- Audio speech synthesis integration for spelling bee mode.
- 1-Click "Create Deck from Current Highlights / Notes" importer.

#### [MODIFY] [fixed-tools.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/fixed-tools.css)
- Add 3D perspective flip card styling, Leitner box progress tracks, and responsive modal styling with 5-theme support.

#### [MODIFY] [header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Include `src/partials/flashcard-studio.php` and load `assets/js/flashcard-studio.js`.
- Add `<kbd>Alt+F</kbd>` shortcut to shortcuts registry.

---

### 2. Multi-Color Persistent Annotation & Semantic Marginalia Studio

#### [MODIFY] [read-inline-text-highlighting.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-inline-text-highlighting.js)
- Upgrade highlighter toolbar with 4 semantic color chips:
  - **Goldenrod** (`#fef08a`): Core Concepts
  - **Seafoam Mint** (`#bbf7d0`): Key Definitions
  - **Cyan Blue** (`#bae6fd`): Evidence & Citations
  - **Coral Peach** (`#fecdd3`): Questions & Confusion
- Add **Sticky Margin Notes** capability: Click any paragraph to anchor personal reflections or voice dictations right in the margin.
- Add **1-Click Study Guide Synthesizer**: Extracts all highlights, colors, and margin notes into a formatted Markdown document with print and download buttons.

#### [MODIFY] [read-modern.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader/read-modern.css)
- Add styling for `.margin-note-card`, `.margin-note-anchor`, and semantic highlight tags across all themes.

---

### 3. Morpheme & Phonetic Anatomy Breakdown Engine

#### [MODIFY] [read-vocab-tooltip.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-vocab-tooltip.js)
- Enrich vocabulary popups with:
  - **Syllabification Display**: Dot-separated syllable beats (e.g., *pho • to • syn • the • sis*).
  - **Morphemic Decomposition**: Visual breakdown of prefixes, Latin/Greek roots, and suffixes with etymological definitions.
  - **Slow-Motion Audio Pronunciation**: Dual audio buttons for standard (1.0x) and phonics-paced (0.6x) playback.

---

## Verification Plan

### Automated & Programmatic Verification
1. **JavaScript Syntax Verification**:
   - `node -c assets/js/flashcard-studio.js`
   - `node -c assets/js/reader/read-inline-text-highlighting.js`
   - `node -c assets/js/reader/read-vocab-tooltip.js`
2. **Server & Route Testing**:
   - Fetch `http://localhost:5500/` and verify `#flashcard-studio-modal` is present.
   - Fetch `http://localhost:5500/library/index.php` and verify highlighter toolbar, margin notes, and vocabulary morpheme tooltips.
   - Test Leitner box interval calculation via a Node.js test script.

### Manual Verification
1. Press `<kbd>Alt+F</kbd>` to open the Flashcard Studio. Practice cards in Classic Flip, Cloze, and Spelling Bee modes.
2. Select text in any reader chapter and highlight with Goldenrod, Seafoam, Cyan, and Coral.
3. Add a sticky margin note to a paragraph and verify it persists after browser refresh.
4. Click "Generate Study Guide" and verify formatted Markdown output.
5. Click any vocabulary tooltip in the reader and inspect the syllabification and morpheme breakdown.
