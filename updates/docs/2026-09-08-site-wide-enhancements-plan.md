---
title: "Site-Wide Enhancements: Keyboard Navigation, SEO, Print Styles, & Search Autocomplete"
date: "2026-09-08"
category: "Implementation Plan"
tags: ["Keyboard", "A11y", "SEO", "Search", "Print", "Student"]
summary: "Implementation plan for global keyboard shortcuts hub, dynamic page titles and SEO metadata, universal print stylesheet, search autocomplete, and student study streak tracking."
author: "Antigravity & Hesten"
---

# Site-Wide Enhancements Implementation Plan

## Proposed Improvements

### 1. Global Keyboard Navigation & Shortcuts Modal (`?`)
- **Objective**: Provide a fast, accessible, keyboard-first navigation experience across all sections.
- **Shortcuts Hub (`src/partials/shortcuts-modal.php`)**:
  - Activated by pressing <kbd>?</kbd> (Shift + `/`) anywhere on the site.
  - Interactive modal displaying all registered keyboard shortcuts grouped by category (Navigation, Accessibility, Tools, and Reader).
  - Fully accessible: trap focus, close on <kbd>Esc</kbd> or click outside, screen reader announcements.
  - Key bindings:
    - <kbd>?</kbd>: Open keyboard shortcuts cheatsheet.
    - <kbd>/</kbd>: Instantly focus search bar (when not typing in an input).
    - <kbd>Ctrl</kbd> + <kbd>K</kbd>: Open Command Palette.
    - <kbd>Alt</kbd> + <kbd>A</kbd>: Toggle Accessibility drawer.
    - <kbd>Alt</kbd> + <kbd>T</kbd>: Toggle Study Tools / Timer.
    - <kbd>Alt</kbd> + <kbd>H</kbd>: Return to Home.
    - <kbd>Esc</kbd>: Dismiss any active modal or panel.

### 2. Dynamic SEO & Social Sharing Metadata (`src/header.php`)
- **Objective**: Fix hardcoded titles and inject dynamic metadata so browser tabs, bookmarks, and search engines display accurate page context.
- **Changes**:
  - Dynamic `<title>` tag using `$pageTitle` with standard fallback.
  - `<meta name="description">` populated from `$pageDescription`.
  - OpenGraph tags (`og:title`, `og:description`, `og:url`) dynamically resolved.
  - Canonical URL tags.

### 3. Universal Print Optimization (`assets/css/layouts/print.css`)
- **Objective**: Ensure students, parents, and teachers can print study guides, standards, and reading materials cleanly on paper or PDF.
- **Rules**:
  - Strip headers, footers, floating widgets, and background fills.
  - Force high-contrast black typography on crisp white paper.
  - Automatically expand collapsed curriculum accordions when printing so the full outline is captured.
  - Clean page-break controls (`break-inside: avoid`).

### 4. Interactive Search Autocomplete Dropdown (`assets/js/header-search-autocomplete.js`)
- **Objective**: Provide instant search recommendations as students type.
- **Features**:
  - Debounced autocomplete querying curriculum levels, library books, and standards.
  - Arrow key navigation (<kbd>↑</kbd>, <kbd>↓</kbd>) through recommendations.
  - Highlight matching query substrings.

### 5. Student Learning Streak & Target Widget (`src/partials/learning-streak.php`)
- **Objective**: Provide encouraging daily feedback on the homepage.
- **Features**:
  - Daily active streak counter stored in `localStorage`.
  - Progress bar for daily practice goals.
  - Seamless support for all 5 themes.

---

## Verification Plan
1. Test <kbd>?</kbd> modal across all pages and verify keyboard navigation and focus trapping.
2. Verify dynamic `<title>` and `<meta name="description">` on `index.php`, `standards.php`, and `updates.php`.
3. Test print preview in browser (`Ctrl+P`) on standards and study guides.
4. Test search autocomplete with typing, arrow selection, and direct navigation.
5. Confirm zero linter warnings and strict compatibility with all 5 themes.
