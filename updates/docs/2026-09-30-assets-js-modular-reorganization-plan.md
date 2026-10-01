---
title: "Assets JS Architecture Modular Reorganization Plan"
date: "2026-09-30"
version: "v2.9.0"
category: "Implementation Plan"
tags: ["JavaScript", "Architecture", "Modular Directory Structure", "Core", "Pages", "Components"]
summary: "Comprehensive architectural reorganization plan to relocate all 34 loose JavaScript files from assets/js root into 7 structured subdirectories (pages/, assessment/, standards/, labs/, accessibility/, components/, core/) and synchronize all consumer endpoints."
author: "Antigravity & Hesten"
---

# Assets JS Architecture Modular Reorganization Plan

## 1. Overview & Objectives
Currently, 34 loose JavaScript files reside directly in the root of `assets/js/`, cluttering the top-level script directory. This project will relocate all 34 files into appropriate, domain-aligned subdirectories matching the clean architectural pattern already established across the platform (`assets/css/` and existing `assets/js/` modules).

All consumer references across PHP templates, partials, modals, service worker pre-caches, and documentation will be systematically updated to ensure zero broken scripts or 404 network errors.

---

## 2. Target Directory Mapping & File Allocations

A total of **34 loose files** will be moved across **7 structured subdirectories**:

### 1. `assets/js/pages/` (Page-Specific Scripts — 6 files)
- `index-main.js` &rarr; `assets/js/pages/index-main.js` (Homepage controller & curriculum modal)
- `profile-main.js` &rarr; `assets/js/pages/profile-main.js` (Student profile & settings hub)
- `skills-passport.js` &rarr; `assets/js/pages/skills-passport.js` (Mastery radar & credential passport)
- `teachers-main.js` &rarr; `assets/js/pages/teachers-main.js` (Teacher classroom dossier & roster)
- `ged-prep.js` &rarr; `assets/js/pages/ged-prep.js` (GED practice module controller)
- `student-stories-poems.js` &rarr; `assets/js/pages/student-stories-poems.js` (Literature showcase engine)

### 2. `assets/js/assessment/` (Diagnostic & Assessment Engines — 5 files)
- `assessment-ap.js` &rarr; `assets/js/assessment/assessment-ap.js`
- `assessment-core.js` &rarr; `assets/js/assessment/assessment-core.js`
- `assessment-main.js` &rarr; `assets/js/assessment/assessment-main.js`
- `assessment-p-12.js` &rarr; `assets/js/assessment/assessment-p-12.js`
- `assessment-questionGenerator.js` &rarr; `assets/js/assessment/assessment-questionGenerator.js`

### 3. `assets/js/standards/` (Standards Curricula & Crosswalks — 2 files)
- `standards-ccss-math-ela.js` &rarr; `assets/js/standards/standards-ccss-math-ela.js`
- `curriculum-teks.js` &rarr; `assets/js/standards/curriculum-teks.js`

### 4. `assets/js/labs/` (Interactive Virtual Manipulatives & Labs — 1 file)
- `manipulatives-lab.js` &rarr; `assets/js/labs/manipulatives-lab.js`

### 5. `assets/js/accessibility/` (UDL & Accessibility Accommodations — 3 files)
- `global-a11y.js` &rarr; `assets/js/accessibility/global-a11y.js`
- `audio-feedback.js` &rarr; `assets/js/accessibility/audio-feedback.js`
- `sensory-chamber.js` &rarr; `assets/js/accessibility/sensory-chamber.js`

### 6. `assets/js/components/` (Interactive UI Modals, Bars & Toolkits — 11 files)
- `command-palette.js` &rarr; `assets/js/components/command-palette.js`
- `flashcard-studio.js` &rarr; `assets/js/components/flashcard-studio.js`
- `scratchpad-studio.js` &rarr; `assets/js/components/scratchpad-studio.js`
- `certificate-generator.js` &rarr; `assets/js/components/certificate-generator.js`
- `header-search-autocomplete.js` &rarr; `assets/js/components/header-search-autocomplete.js`
- `global-announcements.js` &rarr; `assets/js/components/global-announcements.js`
- `global-overhaul-notice.js` &rarr; `assets/js/components/global-overhaul-notice.js`
- `global-shortcuts.js` &rarr; `assets/js/components/global-shortcuts.js`
- `global-study-tools.js` &rarr; `assets/js/components/global-study-tools.js`
- `universal-bookmarks.js` &rarr; `assets/js/components/universal-bookmarks.js`
- `offline-storage-manager.js` &rarr; `assets/js/components/offline-storage-manager.js`

### 7. `assets/js/core/` (Core Platform Plumbing & Global Systems — 6 files)
- `global-error-handler.js` &rarr; `assets/js/core/global-error-handler.js`
- `global-core-ui.js` &rarr; `assets/js/core/global-core-ui.js`
- `global-site-layout.js` &rarr; `assets/js/core/global-site-layout.js`
- `global-standard.js` &rarr; `assets/js/core/global-standard.js`
- `gdrive-sync.js` &rarr; `assets/js/core/gdrive-sync.js`
- `offline-status.js` &rarr; `assets/js/core/offline-status.js`

---

## 3. Consumer Endpoints to Update

1. **`src/header.php`**:
   - `global-a11y.js` &rarr; `/assets/js/accessibility/global-a11y.js`
   - `global-core-ui.js` &rarr; `/assets/js/core/global-core-ui.js`
   - `universal-bookmarks.js` &rarr; `/assets/js/components/universal-bookmarks.js`
   - `command-palette.js` &rarr; `/assets/js/components/command-palette.js`
   - `global-shortcuts.js` &rarr; `/assets/js/components/global-shortcuts.js`
   - `header-search-autocomplete.js` &rarr; `/assets/js/components/header-search-autocomplete.js`
   - `offline-status.js` &rarr; `/assets/js/core/offline-status.js`
2. **`src/footer.php`**:
   - `global-error-handler.js` &rarr; `/assets/js/core/global-error-handler.js`
   - `audio-feedback.js` &rarr; `/assets/js/accessibility/audio-feedback.js`
   - `sensory-chamber.js` &rarr; `/assets/js/accessibility/sensory-chamber.js`
   - `scratchpad-studio.js` &rarr; `/assets/js/components/scratchpad-studio.js`
   - `global-study-tools.js` &rarr; `/assets/js/components/global-study-tools.js`
   - `flashcard-studio.js` &rarr; `/assets/js/components/flashcard-studio.js`
   - `certificate-generator.js` &rarr; `/assets/js/components/certificate-generator.js`
   - `command-palette.js` &rarr; `/assets/js/components/command-palette.js`
   - `global-standard.js` &rarr; `/assets/js/core/global-standard.js`
   - `gdrive-sync.js` &rarr; `/assets/js/core/gdrive-sync.js`
3. **Template Partials (`src/partials/`)**:
   - `command-palette.php` &rarr; verify `/assets/js/components/command-palette.js`
   - `announcement-bar.php` &rarr; `/assets/js/components/global-announcements.js`
   - `overhaul-modal.php` &rarr; `/assets/js/components/global-overhaul-notice.js`
   - `sticky-reading-bar.php` &rarr; `/assets/js/components/offline-storage-manager.js`
4. **Primary Pages & Assessment**:
   - `index.php` &rarr; `pages/index-main.js`, `standards/standards-ccss-math-ela.js`, `standards/curriculum-teks.js`
   - `pages/accessibility.php` &rarr; `pages/index-main.js`
   - `pages/profile.php` &rarr; `pages/profile-main.js`
   - `pages/skills.php` &rarr; `pages/skills-passport.js`, `standards/standards-ccss-math-ela.js`
   - `pages/standards.php` &rarr; `standards/standards-ccss-math-ela.js`, `standards/curriculum-teks.js`
   - `pages/teachers.php` &rarr; `pages/teachers-main.js`, `standards/standards-ccss-math-ela.js`
   - `pages/manipulatives.php` &rarr; `labs/manipulatives-lab.js`
   - `assessment/index.php` &rarr; `assessment/assessment-main.js`, `assessment/assessment-p-12.js`, `assessment/assessment-ap.js`
   - `levels/practice-ged.php` &rarr; `pages/ged-prep.js`
5. **Service Worker (`service-worker.js`)**:
   - Update `CACHE_NAME` to `hestens-learning-v20`
   - Update all `ASSETS_TO_CACHE` paths to their new subdirectories.

---

## 4. Verification & Validation Protocol
- Automated scan verifying that `assets/js` root contains 0 `.js` files (only subdirectories).
- Verification that all 34 files exist in their target subdirectories.
- Node syntax verification across all moved files.
- Endpoint inspection verifying that every consumer script tag resolves to an existing file on disk.
