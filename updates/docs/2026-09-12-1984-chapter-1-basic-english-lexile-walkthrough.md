---
title: "Walkthrough: 1984 Chapter 1 Basic English (450L) Lexile Implementation"
date: "2026-09-12"
category: "Walkthrough"
tags: ["Library", "1984", "Lexile", "Basic English", "Accessibility", "UDL", "TTS"]
summary: "Integrated a C. K. Ogden Basic English (450L) Lexile tier into Chapter 1 of 1984, complete with dual-context reader controls, TTS integration, and local persistence."
author: "Antigravity & Hesten"
---

# Walkthrough: 1984 Chapter 1 Basic English (450L) Lexile Tier

We added an accessible, foundational **Basic English (450L)** reading tier to Chapter 1 of George Orwell's *1984*, utilizing C. K. Ogden's 850 Basic English linguistic framework. The implementation works across both the unified reader (`index.php?book=1984&chapter=chapter-1`) and direct chapter views (`chapter-1.php`), and integrates with Text-to-Speech (TTS) narration and reading progress estimators.

## Changes Completed

### 1. Basic English Linguistic Adaptation
- **Location**: [library/read/1984/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/chapter-1.php)
- **Container**: `<div class="lexile-version" data-lexile="basic" data-lexile-label="Basic English (450L)" style="display: none;">`
- **Linguistic Rules**: Adheres to C. K. Ogden's 850 Basic English standard (concrete nouns, core operators `be`, `come`, `do`, `get`, `give`, `go`, `have`, `keep`, `let`, `make`, `may`, `say`, `see`, `seem`, `send`, `take`, `will`, reduced subordination).
- **Scope**: Complete scene-by-scene adaptation of Chapter 1 across all 24 narrative beats:
  - Victory Mansions, the April cold, clocks striking thirteen.
  - The Big Brother posters ("BIG BROTHER IS WATCHING YOU") and the broken elevator.
  - The telescreen with its iron production announcements and inescapable surveillance.
  - London vista, Thought Police helicopters, and the Ministry of Truth with the three slogans: *WAR IS PEACE*, *FREEDOM IS SLAVERY*, *IGNORANCE IS STRENGTH*.
  - The Four Ministries (Minitrue, Minipax, Miniluv, Miniplenty) and the windowless Ministry of Love.
  - Victory Gin and Victory Cigarettes in the kitchen.
  - The alcove hideaway and the blank cream-paper diary bought in the junk shop.
  - The date: *April 4th, 1984*, and the moral challenge of writing to the unborn future.
  - The cinema memory: war films, refugee boats, helicopter bombings, and the prole woman's protest.
  - The morning's Two Minutes Hate: the dark-haired girl in the Junior Anti-Sex League sash and the enigmatic Inner Party member O'Brien.
  - Emmanuel Goldstein's speech, the audience frenzy, the dictionary thrown at the screen, and the sheep-face transition into Big Brother.
  - The moment of eye contact between Winston and O'Brien ("*I am with you*").
  - The panic of finding "DOWN WITH BIG BROTHER" repeatedly scribbled across the page.
  - The concept of Thoughtcrime and being vaporized.
  - The sudden, terror-inducing knock on the door.

### 2. Standalone & Unified Reading Switchers
- **Location**: [library/read/1984/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/chapter-1.php) & [assets/js/library/lib-reader-lexile.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-reader-lexile.js)
- Added an in-page Lexile toolbar above `.cdn-book-reader-content` with accessible select dropdown for standalone visits to `chapter-1.php`.
- Attached `lib-reader-lexile.js` at the base of `chapter-1.php`.
- Enhanced `lib-reader-lexile.js` to:
  - Scan all `.lexile-switcher-wrap` and `#lexile-switcher-select` elements.
  - Dynamically populate all available reading levels:
    - **Original (1090L)**
    - **Adapted (800L)**
    - **Basic English (450L)**
  - Synchronize dropdown selections across multiple toolbars simultaneously.
  - Remember reader preferences in `localStorage.getItem('hl_preferred_lexile')`.
  - Respect URL query overrides (`?lexile=basic`).
  - Announce reading level transitions to screen readers via `window.announceA11y`.
  - Dispatch `hl:lexile-changed` and `hl:content-changed` events.

### 3. Text-to-Speech & Sticky Progress Bar Reactivity
- **Location**: [assets/js/reader/read-text.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-text.js) & [assets/js/components/sticky-reading-bar.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/components/sticky-reading-bar.js)
- **TTS Engine**: Updated `prepareSentences()` to filter paragraphs by active visibility (`p.closest('.lexile-version')`), guaranteeing that TTS voice narration only reads the currently selected Lexile tier.
- **Dynamic Re-parsing**: Added event listener for `hl:lexile-changed` to cancel speaking and re-parse sentences when a user changes Lexile level.
- **Reading Time**: Added event listener for `hl:content-changed` in `sticky-reading-bar.js` so estimated word count and reading time recalculate accurately based on the active Lexile level.

### 4. Encoding Cleanup
- Fixed legacy Windows-1252 character artifacts (`Winstonâ€™s` &rarr; `Winston's`, `grayâ€”except` &rarr; `gray—except`) in the `Adapted (800L)` version of `chapter-1.php`.

## Verification Results

1. **Chapter 1 Standalone Page**:
   - `library/read/1984/chapter-1.php` includes the in-page selector, 3 distinct Lexile containers, and `lib-reader-lexile.js`.
2. **Unified Reader**:
   - `library/read/index.php?book=1984&chapter=chapter-1` extracts all 3 `.lexile-version` containers cleanly into `$contentHtml`.
   - The sticky top bar dropdown in `reader_template.php` populates and controls the tiers.
3. **TTS & Progress**:
   - Voice narration respects the chosen Lexile version, and `sticky-reading-bar.js` updates estimated word count and remaining time.
