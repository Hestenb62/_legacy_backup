---
title: "Library Reader Comprehensive Overhaul: Active Study, Karaoke TTS, Wiktionary & Ergonomics"
date: "2026-09-23"
category: "Implementation Plan"
tags: ["Library Reader", "Wiktionary", "TTS Karaoke", "Flashcard Studio", "Margin Notes", "Spread Mode", "UDL"]
summary: "Comprehensive enhancement plan for the digital library reader incorporating Wiktionary definition fetching, interactive margin sticky notes, 1-click quote-to-flashcard generation, karaoke-style TTS word/sentence tracking, dual-column book spread layout, and sticky bar decluttering."
author: "Antigravity & Hesten"
---

# Library Reader Comprehensive Overhaul: Active Study, Karaoke TTS, Wiktionary & Ergonomics

## User Review Required

> [!IMPORTANT]
> This plan covers all 3 requested improvement areas with Wiktionary integration:
> 1. **Active Studying & Wiktionary Definitions**:
>    - Primary dictionary lookup from the official **Wiktionary API** (`https://en.wiktionary.org/api/rest_v1/page/definition/{word}`) with automatic tag sanitization, part-of-speech parsing, and fallback to Free Dictionary API & Datamuse.
>    - Interactive **Margin Sticky Notes** popover replacing the legacy `alert(...)`, allowing inline viewing, editing, and deleting of annotations.
>    - 1-click **Quote-to-Flashcard** generator directly from any passage selection or highlight into the Leitner Flashcard Studio.
> 2. **Multi-Sensory UDL & Karaoke-Style TTS**:
>    - Sentence-level and word-level real-time synchronized highlighting during audio read-aloud via `SpeechSynthesisUtterance.onboundary` with auto-scrolling focus.
> 3. **Layout Ergonomics & Two-Page Spread**:
>    - Streamlined **Sticky Reading Bar** grouping secondary utilities into a compact "More Tools" dock to eliminate mobile/split-screen clutter.
>    - **Two-Page Book Spread Mode** (dual-column realistic layout) toggleable alongside continuous scroll and single-page modes.

---

## Proposed Changes

### Component 1: Wiktionary API & Vocabulary Tooltip
#### [MODIFY] [`assets/js/reader/read-vocab-tooltip.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-vocab-tooltip.js)
- Upgrade `fetchOnlineDefinition(cleanWord)` to prioritize Wiktionary REST API (`https://en.wiktionary.org/api/rest_v1/page/definition/{word}`).
- Parse English (`en`) section, sanitize MediaWiki link markup (`<a rel="mw:WikiLink"...>`), extract part of speech, definition, and example sentences.
- Update tooltip badge to display `<i class="fab fa-wikipedia-w"></i> Wiktionary`.
- Provide graceful fallback chain: `Wiktionary` &rarr; `Free Dictionary API` &rarr; `Datamuse API` &rarr; `Core Lexicon`.

---

### Component 2: Interactive Margin Sticky Notes & Quote-to-Flashcards
#### [MODIFY] [`assets/js/reader/read-inline-text-highlighting.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-inline-text-highlighting.js)
- Replace legacy `alert(...)` note popup with an interactive **Margin Sticky Note Card** (`#margin-note-popover`).
- Support inline editing, updating `localStorage` records, and deleting notes.
- Enhance `#hl-btn-flashcard` to extract quote context (sentence, chapter title, book title, and author) and dispatch to `window.addFlashcardToDeck` / `hl_leitner_decks`.
- Add an "Export Annotations & Margin Notes" markdown generator in the study drawer.

#### [MODIFY] [`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css)
- Style `#margin-note-popover`: floating glassmorphism card with note icon, timestamp, editable area, and delete/save buttons.
- Style visual indicators on text marks that contain attached margin notes (small badge/pencil indicator).

---

### Component 3: Karaoke-Style Real-Time TTS Sentence & Word Tracking
#### [MODIFY] [`assets/js/reader/read-text.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-text.js)
- Replace whole-paragraph highlighting (`tts-active-sentence` on `<p>`) with precision sentence isolation.
- Wrap the current sentence in a temporary `<span class="tts-current-sentence">` during speech.
- Listen to `utterance.onboundary` with event name `'word'`: calculate word span and dynamically apply `.tts-active-word` to the word being articulated.
- Auto-scroll smoothly to keep the current sentence centered in the reader viewport.
- Provide clean teardown on stop, pause, or end of chapter.

#### [MODIFY] [`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css)
- Add distinct high-contrast, accessible styles for `.tts-current-sentence` (soft background glow) and `.tts-active-word` (amber/cyan pulse highlight meeting WCAG contrast).

---

### Component 4: Sticky Bar Reorganization & Two-Page Book Spread Mode
#### [MODIFY] [`library/read/reader_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)
- Reorganize `sticky-bar-right`:
  - Keep primary controls accessible: `Font Scaler (A- / A+)`, `Layout Toggle (Continuous / Spread)`, `Aa Settings`, and `Study Suite`.
  - Group secondary tools (`TOC`, `Bookmark`, `Offline Cache`, `Reading Mask`, `Book Info & Citation`) inside a consolidated **"More Tools"** menu (`#reader-more-tools-dropdown`).
- Add Two-Page Spread layout toggle in settings and sticky bar.

#### [MODIFY] [`assets/css/reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css) & [`assets/css/components/sticky-reading-bar.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/sticky-reading-bar.css)
- Implement CSS column spread styling for `.mode-spread .reader-main-content` (`columns: 2; column-gap: 3.5rem; column-rule: 1px solid var(--color-border);`).
- Style the new "More Tools" dropdown menu and responsive breakpoints for mobile screens.

---

## Verification Plan

### Automated / Syntax Tests
- Inspect modified JS files for syntax errors and correct scoping.
- Verify live Wiktionary API endpoint responses across academic and literature vocabulary terms.

### Manual Verification
1. **Wiktionary Lookup**:
   - Double-click or select single words (e.g., "courage", "revolution", "inexorable", "metamorphosis") in literature chapters.
   - Verify definitions, parts of speech, and Wiktionary attribution badge appear properly without unparsed HTML tags.
2. **Margin Sticky Notes**:
   - Highlight text and attach a margin note.
   - Click the highlight and verify the new margin sticky card opens with edit and delete capabilities.
   - Refresh the page and confirm notes persist from `localStorage`.
3. **1-Click Flashcards**:
   - Highlight a quote and click "Add to Flashcard Studio".
   - Verify the flashcard is saved into `hl_leitner_decks` with accurate book metadata and quote prompt.
4. **Karaoke TTS**:
   - Click "Listen" in the reader bar.
   - Verify the current sentence receives a focus highlight, and words light up dynamically in sync with the audio voice.
5. **Two-Page Spread & Sticky Bar Reorganization**:
   - Toggle Spread mode and verify clean 2-column book appearance on desktop.
   - Resize browser to mobile width (<768px) and verify the sticky bar does not wrap or overflow.
