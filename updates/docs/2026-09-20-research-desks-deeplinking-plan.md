---
title: "Library Research Desks & Decks Deep Linking (#) Architecture"
date: "2026-09-20"
category: "Implementation Plan"
tags: ["Library", "Research Desks", "Deep Linking", "Routing", "Accessibility"]
summary: "Architecture and implementation plan to provide direct URL hash deep-linking (#) codes, browser history synchronization, and one-click shareable links for all Subject Research Desks and research decks."
author: "Antigravity & Hesten"
---

# Library Research Desks & Decks Deep Linking (#) Architecture

## Overview
Enable robust URL hash deep-linking (`#`) codes across all Subject Research Desks in the digital library, as well as Academic Research manuscripts and study decks, so scholars and educators can directly bookmark, share, and link to any specific desk or research item.

## Target Hashed Codes & Mapping
To keep the URLs opaque and not super obvious from the link what subject desk is being accessed, each Subject Research Desk is assigned a deterministic 8-character hashed code:

| Subject Research Desk | Opaque Hashed Code (#) | Fallback / Readable Aliases |
| :--- | :--- | :--- |
| **General Resources** | `#e27d1c34` | `#general-resources`, `#desk-general`, `#general` |
| **US History** | `#cd90fec6` | `#us-history`, `#desk-us-history`, `#ushistory` |
| **World History** | `#2a870513` | `#world-history`, `#desk-world-history`, `#worldhistory` |
| **WW1** | `#85e68cd6` | `#ww1`, `#desk-ww1`, `#world-war-1` |
| **WW2** | `#ae6f5594` | `#ww2`, `#desk-ww2`, `#world-war-2` |
| **Math** | `#6b3a0fb1` | `#math`, `#desk-math`, `#mathematics` |
| **ELA** | `#2593f14f` | `#ela`, `#desk-ela`, `#reading`, `#english` |
| **Science** | `#79d226aa` | `#science`, `#desk-science` |
| **Civics** | `#2396a9be` | `#civics`, `#desk-civics`, `#government` |

## Components to Modify

1. **`assets/js/library/lib-subject-research-desks-navigat.js`**:
   - Slug mapping, URL synchronization, auto-open hash parser, `hashchange` listener, and `copyDeskShareLink()`.
2. **`library/index.php`**:
   - Add "Share Desk" button to drawer header right, add desk `#hash` tooltips to tab buttons.
3. **`assets/css/library/lib-subject-research-workspace-pan.css`**:
   - High-contrast, glassmorphic styling for `.library-drawer-share-btn` with focus rings and copied state.
4. **`assets/js/research/journal-engine.js`**:
   - Support `#paperId` hashes (e.g. `research/DLDR/#entry-1`) and hash change listening for academic manuscripts.
5. **`assets/js/flashcard-studio.js`**:
   - Add `#deck-[key]` hash detection to automatically load specified flashcard decks.

## Verification
- Unit test slug and alias resolution for 100% of desks.
- Manual test in-browser deep-linking, tab switching, and browser Back/Forward navigation.
