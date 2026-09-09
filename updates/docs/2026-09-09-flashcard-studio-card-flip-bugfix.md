---
title: "Bugfix: Flashcard Studio 3D Card Flip & Design System Alignment"
date: "2026-09-09"
category: "Bugfix"
tags: ["Flashcards", "CSS", "3D Transforms", "Bugfix", "Accessibility", "Leitner SRS"]
summary: "Resolved 3D card flip animation failures caused by selector mismatch and missing WebKit prefixes, and fixed inaccurate CSS by binding platform color tokens and self-contained button/select styles."
author: "Antigravity & Hesten"
---

# Bugfix: Flashcard Studio 3D Card Flip & Design System Alignment

## Problem Diagnosis
1. **Card Not Flipping**:
   - **CSS/JS Class Mismatch**: `assets/js/flashcard-studio.js` was toggling `.is-flipped`, while `assets/css/components/fixed-tools.css` defined only `.flipped`.
   - **Cross-Browser 3D Transform Pipeline**: The 3D flip card required explicit `-webkit-perspective`, `-webkit-transform-style: preserve-3d`, `-webkit-backface-visibility: hidden`, and explicit rotation transforms (`rotateY(0deg)` for front and `rotateY(180deg)` for back).
   - **Missing Flip Action Controls**: Users who did not click exactly on the scene container lacked an explicit flip button in the footer and hints.
   - **Undefined Toggle Hook**: Floating Action Button in `fixed-tools.php` called `window.toggleFlashcardStudio()`, which was not defined on the global window.

2. **Inaccurate CSS Styling**:
   - The modal used `var(--color-text, #1e293b)`, which is not a platform CSS token (the platform uses `var(--color-text-main)`), causing dark text fallback on dark backgrounds.
   - The deck selector and action buttons referenced `.benchmark-mode-select` and `.a11y-action-chip`, which were only defined in `pages/accessibility.css` and rendered unstyled on all other pages.
   - The modal container lacked theme cascading consistency and overflow protection for long definitions.

---

## Root Cause Fixes Applied

### 1. 3D Card Flip Animation Engine
- **Synchronized Class Selectors**: Updated both `assets/js/flashcard-studio.js` and `assets/css/components/fixed-tools.css` to support both `.flipped` and `.is-flipped`:
  ```css
  .flashcard-3d-card.flipped,
  .flashcard-3d-card.is-flipped {
    transform: rotateY(180deg);
    -webkit-transform: rotateY(180deg);
  }
  ```
- **Rigorous Cross-Browser 3D Rules**:
  - `perspective: 1200px; -webkit-perspective: 1200px;` on `.flashcard-3d-scene`
  - `transform-style: preserve-3d; -webkit-transform-style: preserve-3d;` on `.flashcard-3d-card`
  - `backface-visibility: hidden; -webkit-backface-visibility: hidden;` on `.flashcard-face`
  - Explicit degree anchors on `.flashcard-front` (`rotateY(0deg)`) and `.flashcard-back` (`rotateY(180deg)`).
- **Multiple Interactive Flip Triggers**:
  - Clicking the card scene
  - Pressing <kbd>Space</kbd> or <kbd>Enter</kbd>
  - Dedicated **"Flip"** action button in the modal footer
  - Preserved click events on child audio pronunciation buttons without triggering unintended flips.

### 2. Global Toggle API & Shortcuts
- Defined `window.toggleFlashcardStudio(openOrClose, deckKey)` on `window`.
- Added keyboard shortcuts:
  - <kbd>Alt+F</kbd>: Open/close Flashcard Studio
  - <kbd>Esc</kbd>: Close modal
  - <kbd>&larr;</kbd> / <kbd>&rarr;</kbd>: Previous / Next card
  - <kbd>1</kbd>, <kbd>2</kbd>, <kbd>3</kbd>, <kbd>4</kbd>: Direct Leitner grade ratings (*Again*, *Hard*, *Good*, *Easy*)

### 3. Design System & Token Alignment
- Refactored all styling in `assets/css/components/fixed-tools.css` to strictly use platform tokens:
  - `var(--color-text-main)`
  - `var(--color-text-muted)`
  - `var(--color-bg-surface)`
  - `var(--color-bg-base)`
  - `var(--color-border)`
  - `var(--color-primary)`
  - `var(--font-display)`
  - `var(--font-body)`
- Replaced external page classes with self-contained, fully-styled components:
  - `.flashcard-select` for custom dropdown styling.
  - `.flashcard-chip-btn` and `.flashcard-action-btn` for buttons.
  - Full support for Dark, Midnight, Sepia, and High-Contrast modes.

---

## Verification
- `node -c assets/js/flashcard-studio.js` &rarr; Exit Code `0`.
- Verified HTTP 200 delivery for `flashcard-studio.js`, `fixed-tools.css`, and `updates/index.php`.
- Verified modal markup and script inclusions on `/` and `/updates/index.php`.
