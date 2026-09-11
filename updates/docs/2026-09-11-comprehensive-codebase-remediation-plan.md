---
title: "Comprehensive Codebase Remediation & Multi-Section Optimization Plan"
date: "2026-09-11"
category: "Implementation Plan"
tags: ["Accessibility", "WCAG", "Architecture", "Bugfix", "Library", "Routing"]
summary: "Comprehensive implementation plan addressing all identified bugs, 404 broken stylesheets, routing gaps, accessibility defects, focus ring overrides, and asset errors across every section of the platform."
author: "Antigravity & Hesten"
---

# Comprehensive Codebase Remediation & Multi-Section Optimization Plan

This implementation plan outlines the end-to-end fixes and enhancements across all sections of the Hesten's Learning platform, resolving critical 404 stylesheet failures, curriculum routing gaps, WCAG/accessibility non-compliances, focus ring overrides, and broken asset requests.

## User Review Required

> [!IMPORTANT]
> - **Reader Stylesheet Update**: 26 reader chapter files (`library/read/1984/chapter-*.php` and `library/read/frankenstein/chapter-1.php`) currently point to a non-existent `/library/library.css`. We will update them to use `/assets/css/reader-main.css` and also create a fallback `library/library.css` for backward compatibility.
> - **Lesson Routing Enhancement**: We will create `lessons/index.php` and adjust `src/level_template.php` so skill cards route directly to interactive lessons (`/lessons/{skillId}.php` or `/lessons/index.php?lesson={skillId}`) instead of reloading the level page with an unhandled query string.

## Open Questions

None at this time. All requirements and architectural invariants are defined by the workspace rules and platform guidelines.

## Proposed Changes

---

### 1. Digital Library & Reader Engine (`library/`)

#### [NEW] [library/library.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/library.css)
- Create fallback CSS stylesheet importing `/assets/css/reader-main.css` so any legacy or external references to `/library/library.css` resolve with 200 OK.

#### [MODIFY] [library/read/1984/chapter-1.php ... chapter-25.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/1984/)
- Update line 10 from `<link rel="stylesheet" href="/library/library.css">` to:
  ```php
  <link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/reader-main.css') : '/assets/css/reader-main.css' ?>">
  ```

#### [MODIFY] [library/read/frankenstein/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/frankenstein/chapter-1.php)
- Update stylesheet link to `/assets/css/reader-main.css`.

#### [MODIFY] [library/read/who-built-america/ (chapters 4, 5, 6, 7, 9, 35, 36, 37, 38)](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/who-built-america/)
- Clean up empty `<a href="#slug-"><h3 id="slug-"></h3></a>` tags and empty external links that lack accessible text.

---

### 2. Curriculum Lessons & Levels (`lessons/`, `levels/`, `src/`)

#### [NEW] [lessons/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/lessons/index.php)
- Create index entry file in `lessons/` that loads `src/lesson_renderer.php`, enabling dynamic routing for `/lessons/?lesson=<id>` and `/lessons/?<id>`.

#### [MODIFY] [src/level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php)
- Update skill card link generation:
  - Check if static file `lessons/{$skill['id']}.php` exists:
    - If yes: link to `/lessons/{$skill['id']}.php`.
    - If no: link to `/lessons/index.php?lesson={$skill['id']}`.
  - Retain anchor `#skill-{id}` support for deep-linking.

---

### 3. Universal Accessibility (WCAG 2.1/2.2 AA & AAA)

#### [MODIFY] [src/partials/fixed-tools.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/fixed-tools.php)
- Add `aria-label="Scroll to top of page"` to `#scroll-to-top`.
- Add `aria-label="Open learning tools menu"` and `aria-expanded="false"` to `#fab-main-toggle`.

#### [MODIFY] [src/partials/a11y-settings.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/a11y-settings.php)
- Add `aria-label="Close accessibility settings"` to `#a11y-close-button`.
- Add `aria-label="Align text left"`, `aria-label="Align text center"`, and `aria-label="Justify text"` to the text alignment buttons.

#### [MODIFY] [assets/css/global-primitives.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-primitives.css)
- Replace `.skip-link:focus { outline: none; }` with a high-contrast focus outline:
  ```css
  .skip-link:focus {
    top: 0;
    outline: 3px solid var(--color-accent, #06b6d4);
    outline-offset: 2px;
  }
  ```

#### [MODIFY] [assets/css/reader-main.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css)
- Add `:focus-visible` rule for `#lexile-switcher-select` with high-contrast ring and remove blanket `outline: none !important`.

#### [MODIFY] [assets/css/pages/standards.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/standards.css)
- Add `:focus-visible` focus ring for `.curr-select`.

#### [MODIFY] [assets/css/components/accommodations.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/accommodations.css)
- Add `:focus-visible` focus ring and outline for `.acc-select`.

---

### 4. Core Shell, Search & Asset Verification

#### [MODIFY] [pages/mission.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/mission.php)
- Replace missing image `<img src="/assets/images/signature-placeholder.png" ...>` with an inline SVG signature of Hesten Allison to eliminate 404 network failure.

#### [MODIFY] [pages/search.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php)
- Replace deprecated `$filename !== 'offline.html'` with `$filename !== 'offline.php'`.

---

### 5. Student Portal & Research Platform

#### [MODIFY] [student/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/index.php)
- Add listeners for `storage` and `hl:assessment-complete` to update streak and study statistics dynamically across open tabs.

#### [MODIFY] [research/DSMS/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/research/DSMS/index.php) & [research/DLDR/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/research/DLDR/index.php)
- Add `aria-live="polite"` feedback container when copying academic citations to clipboard.

---

## Verification Plan

### Automated Tests
- Run Node.js audit script verifying:
  - 0 broken CSS links across all files in `library/read/`.
  - HTTP 200 / file existence for all `href` and `src` attributes.
  - Zero unlabelled `<button>` elements across `src/partials/`.
  - All PHP files compile cleanly.
- Verify `lessons/index.php` loads correctly without errors.

### Manual Verification
- Test keyboard tab navigation into skip link, lexile switcher, standards curriculum dropdown, and fixed tools buttons to ensure high-contrast `:focus-visible` indicators.
- Test clicking skills on `levels/a.php` and `levels/k.php` to confirm smooth routing into interactive lessons.
- Verify mission page renders the signature cleanly without console 404 errors.
