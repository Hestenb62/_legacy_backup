---
title: "Digital Library Portal Design System Harmonization Plan"
date: "2026-09-21"
category: "Implementation Plan"
tags: ["Library", "Design System", "Accessibility", "UI/UX", "Theming"]
summary: "Comprehensive architectural and aesthetic plan to modernize library/index.php, aligning it with Hesten's Learning design tokens, hero patterns, glassmorphism, and multi-theme accessibility standards without redundant breadcrumbs."
author: "Antigravity & Hesten"
---

# Implementation Plan: Digital Library Design System Alignment

Modernize the Main Digital Library portal (`library/index.php`) and its companion stylesheet suite to achieve full visual, aesthetic, and architectural harmony with the rest of the Hesten's Learning platform (as seen on the Home Hero, Standards Explorer, and Universal Grammar Codex).

## Proposed Architecture & Design Changes

### 1. Unified Page Hero & Academic Scholar Dashboard
- Replace the legacy `.library-modern-hero` and dark blurred box with the platform's standard **Hero Banner Architecture** (`.hero-section` / `.page-hero`):
  - **Dynamic Pill Badge with Radar Ping Dot**: Replace static text badge with the canonical animated radar pulse (`.hero-pill`, `.hero-ping-dot`, `.ping-anim`).
  - **Fluid Display Typography**: Apply `--font-display` (`Outfit`), large fluid sizing, and three-stop gradient text highlights (`.hero-title-highlight`).
  - **Unified Action Buttons**: Replace custom glowing buttons with the design system's `.btn-premium.btn-primary` and `.btn-premium.btn-secondary`.
  - **Glassmorphic Scholar Dashboard**: Refactor reading goals, streaks, saved books, highlights, and notes into `.stats-card.glass-panel` components using `--glass-bg`, `--glass-border`, and token-based state colors.
  - **Interactive Aurora Mesh Depth**: Integrate gentle mousemove parallax on background aurora blobs matching `src/partials/hero.php`.

### 2. Theme Engine & Token Synchronization
- Refactor `assets/css/library/lib-base-variables.css` and `assets/css/library-main.css` to eliminate hardcoded hex colors and link directly to `assets/css/global-tokens.css`:
  - Surfaces: `var(--color-bg-base)`, `var(--color-bg-surface)`, `var(--color-bg-elevated)`
  - Text & Accents: `var(--color-text-main)`, `var(--color-text-muted)`, `var(--color-primary)`
  - Full parity across all 5 platform themes:
    - **Light**
    - **Dark**
    - **Midnight**
    - **Sepia** (warm academic parchment for reading ease)
    - **High-Contrast (AAA)** (high contrast yellow/cyan/black)

### 3. Search, Filtering & View Mode Controls
- **Frosted Search Pill**: Align the catalog search bar with the search styling used on `pages/grammar.php` and `src/header.php` (`--radius-2xl`, `--glass-bg`, clear button, and accessible `:focus-visible` high-contrast outline).
- **Curriculum Filter Chips**: Restyle the quick filter chips (`All Works`, `Elementary`, `Middle School`, `High School`, `Primary Documents`, `Math Reference`, `My Saved List`) to match the platform's active pill tabs with glowing gradients and elevation on hover.
- **Subject Research Desks Tabs**: Enhance the 9 subject desk switcher buttons (`Math`, `ELA`, `Science`, `US History`, `World History`, `WW1`, `WW2`, `Civics`, `General`) with curriculum-aligned accent badges:
  - **Math**: Indigo
  - **ELA**: Rose
  - **Science**: Emerald
  - **History**: Amber
  - **Civics**: Cyan

### 4. Asset Delivery Optimization & FOUC Elimination
- In `library/index.php`, move `<link rel="stylesheet" href="<?= assetVersion('/assets/css/library-main.css') ?>">` from the footer to immediately below the header include.
- Update script tags to use root-relative, version-controlled paths (`<?= assetVersion('/assets/js/library/...') ?>`).

---

## User Decisions
- **Breadcrumbs**: Per user instructions, breadcrumbs are omitted to keep the top of the library page clean and focused directly on the hero and catalog.

---

## Proposed Changes

### Library Core Files

#### [MODIFY] [library/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php)
- Reposition CSS imports to the top using `assetVersion`.
- Rebuild the Hero section with the site-wide radar pill badge, display heading, `.btn-premium` buttons, and frosted KPI cards.
- Restyle search, filters, view mode switcher, and curriculum chips.
- Add mousemove parallax script for aurora ambient lighting.
- Update script references with `assetVersion`.

#### [MODIFY] [library/book_card.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/book_card.php)
- Ensure card container and cover image wrappers use `--radius-2xl`, subtle glass border, and tokenized badges.
- Ensure high-contrast focus rings for keyboard navigation.

### Stylesheet Modernization

#### [MODIFY] [assets/css/library/lib-base-variables.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-base-variables.css)
- Bind `--lib-*` custom properties directly to global tokens.
- Add theme overrides for `midnight`, `sepia`, and `high-contrast`.

#### [MODIFY] [assets/css/library-main.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library-main.css)
- Restyle the hero and academic dashboard with glassmorphism, responsive grid reflow, and fluid spacing.
- Clean up redundant hardcoded declarations.

#### [MODIFY] [assets/css/library/lib-hero-section.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-hero-section.css)
- Enhance search input, filter dropdowns, and chip buttons with site-wide glass and focus ring styles.

#### [MODIFY] [assets/css/library/lib-subject-research-workspace-pan.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-subject-research-workspace-pan.css)
- Update Subject Desk header, share button, and subject tab navigation with curriculum color themes and glassmorphic styling.

---

## Verification Plan

### Automated / Syntax Verification
- Run PHP syntax check (`php -l library/index.php`, `php -l library/book_card.php`) to ensure zero syntax errors.
- Validate asset URLs and cache-busting file timestamps.

### Manual Verification
1. **Visual Aesthetics & Consistency**:
   - Inspect Hero banner against `src/partials/hero.php` and `pages/grammar.php`.
   - Verify radar badge pulse animation, display title gradient, and `.btn-premium` button styling.
   - Verify Scholar Dashboard stat cards render cleanly with live counts from `localStorage`.
2. **Multi-Theme Compatibility**:
   - Test Light, Dark, Midnight, Sepia, and High-Contrast modes using the site accessibility drawer.
   - Verify text contrast meets WCAG AAA (≥ 7:1 in High-Contrast, ≥ 4.5:1 in normal themes).
3. **Interactive Functionality**:
   - Verify search bar real-time filtering and clear button.
   - Verify curriculum chips toggle correctly (`Elementary`, `Middle`, `High School`, `Primary Documents`, `Saved`).
   - Verify view switcher switches between Carousel, Grid, and Academic List modes.
   - Verify clicking "More Resources" opens the dedicated Subject Research Desk with subject-colored tabs.
   - Verify bookmarking, book detail modal, and reading goal adjustment modals continue to operate seamlessly.
4. **Responsive Layout**:
   - Verify page reflows seamlessly from mobile (320px) up to 4K desktop without horizontal overflow.
