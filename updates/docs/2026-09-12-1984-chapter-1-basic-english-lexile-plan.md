---
title: "Implementation Plan: 1984 Chapter 1 Basic English (450L) Lexile Tier"
date: "2026-09-12"
category: "Implementation Plan"
tags: ["Library", "1984", "Lexile", "Basic English", "Accessibility", "UDL"]
summary: "Plan for adding a C. K. Ogden Basic English (450L) Lexile tier to Chapter 1 of 1984 with reader switching, local persistence, and UDL integration."
author: "Antigravity & Hesten"
---

# Implementation Plan - 1984 Chapter 1 Basic English Lexile Tier

Introduce an accessible, low-barrier **Basic English** reading tier to Chapter 1 of George Orwell's *1984*, based on C. K. Ogden's 850 Basic English standard (Lexile ~450L), fully integrated with the Hesten's Learning digital reader switcher, text-to-speech, and accessibility ecosystem.

## User Review Required

> [!IMPORTANT]
> - **Lexile Rating & Labeling**: The tier will be designated with `data-lexile="basic"` and label `"Basic English (450L)"`. This directly complements the existing `"Original (1090L)"` and `"Adapted (800L)"` tiers.
> - **Basic English Linguistic Standard**: The text will be meticulously adapted adhering to C. K. Ogden's 850 Basic English vocabulary and syntactic rules (simple operators, concrete nouns, minimal subordination) while faithfully preserving all narrative events, characters, tension, and thematic nuance of Chapter 1.
> - **Coverage**: A full chapter adaptation will be provided across all 24 core narrative beats of Chapter 1 (Victory Mansions, Big Brother posters, telescreen surveillance, Ministry of Truth & slogans, gin & paper diary, film memory, Two Minutes Hate, Emmanuel Goldstein, the dark-haired girl & O'Brien, "DOWN WITH BIG BROTHER", panic & the knock on the door).

## Proposed Changes

### Digital Reader & Chapter Content

#### [MODIFY] [library/read/1984/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/chapter-1.php)
- Add `<div class="lexile-version" data-lexile="basic" data-lexile-label="Basic English (450L)" style="display: none;">` inside `<div class="cdn-book-reader-content">`.
- Insert the full Chapter 1 adaptation in Ogden's Basic English (~450L).
- Clean up minor character encoding artifacts (`â€™`, `â€”`) in the existing adapted tier.
- Add an in-page `#lexile-switcher-wrap` toolbar container and include `lib-reader-lexile.js` so direct visits to `chapter-1.php` enjoy the exact same switcher controls as the unified reader (`index.php?book=1984&chapter=chapter-1`).

---

### Lexile Switcher & Reader Enhancements

#### [MODIFY] [assets/js/library/lib-reader-lexile.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-reader-lexile.js)
- Enhance `lib-reader-lexile.js` to:
  - Remember user choice in `localStorage.getItem('hl_preferred_lexile')`.
  - Respect URL query parameter if present (`?lexile=basic`).
  - Announce reading level change to assistive technology via `window.announceA11y` or `aria-live`.
  - Dispatch `hl:content-changed` event to update word counts and reading time calculations in `sticky-reading-bar.js`.
  - Handle multiple `#lexile-switcher-select` instances if present (e.g. top toolbar and in-page header) seamlessly without duplicated options.

---

### Update Documentation Persistence

#### [NEW] [updates/docs/2026-09-12-1984-chapter-1-basic-english-lexile-plan.md](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-09-12-1984-chapter-1-basic-english-lexile-plan.md)
- Write implementation plan with mandatory YAML frontmatter to comply with rule `AGENTS.md` and `planning-updates.md`.

## Verification Plan

### Automated / Syntax Tests
- Run PHP lint check on `library/read/1984/chapter-1.php` to guarantee zero syntax or parsing errors:
  ```powershell
  php -l library/read/1984/chapter-1.php
  ```
- Run PHP lint check on `library/read/index.php`:
  ```powershell
  php -l library/read/index.php
  ```

### Manual Verification
1. Open `library/read/1984/chapter-1.php` directly:
   - Verify the Lexile dropdown displays:
     - `Original (1090L)`
     - `Adapted (800L)`
     - `Basic English (450L)`
   - Select `Basic English (450L)`: verify the text transitions to the Ogden Basic English adaptation smoothly.
2. Open `library/read/index.php?book=1984&chapter=chapter-1`:
   - Verify the sticky top bar Lexile dropdown populates all three options.
   - Verify changing to `Basic English (450L)` works seamlessly with Text-to-Speech (TTS) narration, font scaler, and dark/contrast themes.
   - Refresh page to confirm `localStorage` persistence restores the chosen level.
