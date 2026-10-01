---
title: "Assets JS Architecture Modular Reorganization Walkthrough"
date: "2026-09-30"
version: "v2.9.0"
category: "Walkthrough"
tags: ["JavaScript", "Architecture", "Modular Directory Structure", "Core", "Pages", "Components"]
summary: "Successfully relocated all 34 loose JavaScript files from assets/js root into 7 structured subdirectories (pages, assessment, standards, labs, accessibility, components, core) and updated all consumer templates, partials, and service worker caches."
author: "Antigravity & Hesten"
---

# Assets JS Architecture Modular Reorganization Walkthrough

## 1. Executive Summary
In accordance with user instructions, all **34 loose JavaScript files** residing directly in `assets/js/` have been systematically relocated into **7 domain-aligned modular subdirectories** (`pages/`, `assessment/`, `standards/`, `labs/`, `accessibility/`, `components/`, and `core/`).

The root directory of `assets/js/` is now completely decluttered with **0 loose files**, mirroring the established architecture in `assets/css/`. Every consumer script tag across the entire codebase—including `src/header.php`, `src/footer.php`, `src/partials/`, primary page templates, and `service-worker.js`—was synchronized, verified, and validated with zero broken references or syntax errors.

---

## 2. Directory Structure & File Migration Roster

All 34 loose files were allocated to appropriate functional directories:

### 1. `assets/js/pages/` (Page Controllers)
| File | Role & Target Page |
| :--- | :--- |
| `index-main.js` | Landing page controller, search filtering & curriculum modal runner (`index.php`, `pages/accessibility.php`) |
| `profile-main.js` | Student profile dashboard, avatar customizer & mastery history (`pages/profile.php`) |
| `skills-passport.js` | Interactive skills radar & standards credential passport (`pages/skills.php`) |
| `teachers-main.js` | Teacher diagnostic dashboard, classroom roster & gradebook (`pages/teachers.php`) |
| `ged-prep.js` | GED practice test modules & timer engine (`levels/practice-ged.php`) |
| `student-stories-poems.js` | Anthology reader & daily literary spotlight engine |

### 2. `assets/js/assessment/` (Assessment Suite)
| File | Role |
| :--- | :--- |
| `assessment-ap.js` | AP test practice question generator & scoring matrix |
| `assessment-core.js` | Core assessment state manager & test harness |
| `assessment-main.js` | Diagnostic assessment runner & question interface |
| `assessment-p-12.js` | Pre-K through Grade 12 diagnostic item bank & router |
| `assessment-questionGenerator.js` | Dynamic algorithmic problem synthesis engine |

### 3. `assets/js/standards/` (Standards & Outlines)
| File | Role |
| :--- | :--- |
| `standards-ccss-math-ela.js` | Common Core State Standards data parser & explorer bridge |
| `curriculum-teks.js` | Texas Essential Knowledge & Skills curriculum outline loader |

### 4. `assets/js/labs/` (Virtual Manipulatives & Labs)
| File | Role |
| :--- | :--- |
| `manipulatives-lab.js` | Interactive math manipulatives lab runner (`pages/manipulatives.php`) |

### 5. `assets/js/accessibility/` (UDL & Accessibility Engine)
| File | Role |
| :--- | :--- |
| `global-a11y.js` | Universal accessibility switcher (dyslexia font, contrast, line spacing, Irlen tints) |
| `audio-feedback.js` | Procedural Web Audio API synthesizer for UI interactions and calming soundscapes |
| `sensory-chamber.js` | Mindful sensory retreat chamber, breathing visualizer & reset modal |

### 6. `assets/js/components/` (Shared UI Widgets & Modals)
| File | Role |
| :--- | :--- |
| `command-palette.js` | Omnipresent keyboard quick-launcher & search spotlight (`Ctrl+K` / `?`) |
| `flashcard-studio.js` | 3D interactive flip-card study runner & mastery tracker |
| `scratchpad-studio.js` | Floating canvas scratchpad with drawing, equation rendering & LaTeX insertion |
| `certificate-generator.js` | Dynamic SVG/Canvas academic mastery certificate generator |
| `header-search-autocomplete.js` | Header search bar live autocomplete & keyboard navigation |
| `global-announcements.js` | Site-wide dismissible announcement banner & detail modal |
| `global-overhaul-notice.js` | Platform modernization welcome dialog for new visitors |
| `global-shortcuts.js` | Universal keyboard hotkeys listener (`Ctrl+/`, `H`, `S`, `M`) |
| `global-study-tools.js` | Floating FAB menu and study tools launcher |
| `universal-bookmarks.js` | Cross-page bookmark storage and persistence runner |
| `offline-storage-manager.js` | Offline course pack and reading material storage manager |

### 7. `assets/js/core/` (Core Platform Plumbing)
| File | Role |
| :--- | :--- |
| `global-error-handler.js` | Global error interceptor, runtime guard & user-friendly error banners |
| `global-core-ui.js` | Core UI initialization, theme detection & responsive navigation |
| `global-site-layout.js` | Page shell sizing, sticky header observers & layout helpers |
| `global-standard.js` | Standard formatting utilities, date formatters & DOM helpers |
| `gdrive-sync.js` | Bidirectional Google Drive cloud auto-sync and storage debounce engine |
| `offline-status.js` | Real-time network connectivity listener & offline status indicator |

---

## 3. Synchronized Consumer Endpoints

1. **`src/header.php`**: Updated global script tags to `/assets/js/accessibility/global-a11y.js`, `/assets/js/core/global-core-ui.js`, `/assets/js/components/universal-bookmarks.js`, `/assets/js/components/command-palette.js`, `/assets/js/components/global-shortcuts.js`, `/assets/js/components/header-search-autocomplete.js`, and `/assets/js/core/offline-status.js`.
2. **`src/footer.php`**: Updated footer scripts to `/assets/js/core/global-error-handler.js`, `/assets/js/accessibility/audio-feedback.js`, `/assets/js/accessibility/sensory-chamber.js`, `/assets/js/components/scratchpad-studio.js`, `/assets/js/components/global-study-tools.js`, `/assets/js/components/flashcard-studio.js`, `/assets/js/components/certificate-generator.js`, `/assets/js/components/command-palette.js`, `/assets/js/core/global-standard.js`, and `/assets/js/core/gdrive-sync.js`.
3. **Template Partials (`src/partials/`)**:
   - `announcement-bar.php` &rarr; `/assets/js/components/global-announcements.js`
   - `overhaul-modal.php` &rarr; `/assets/js/components/global-overhaul-notice.js`
   - `sticky-reading-bar.php` &rarr; `/assets/js/components/offline-storage-manager.js`
   - `command-palette.php` &rarr; Updated internal component reference docstring.
4. **Primary Pages**:
   - `index.php` &rarr; `/assets/js/standards/standards-ccss-math-ela.js`, `/assets/js/pages/index-main.js`
   - `pages/accessibility.php` &rarr; `/assets/js/pages/index-main.js`
   - `pages/profile.php` &rarr; `../assets/js/pages/profile-main.js`
   - `pages/skills.php` &rarr; `/assets/js/standards/standards-ccss-math-ela.js`, `/assets/js/pages/skills-passport.js`
   - `pages/standards.php` &rarr; `/assets/js/standards/standards-ccss-math-ela.js`, `/assets/js/standards/curriculum-teks.js`
   - `pages/teachers.php` &rarr; `/assets/js/standards/standards-ccss-math-ela.js`, `/assets/js/pages/teachers-main.js`
   - `pages/manipulatives.php` &rarr; `/assets/js/labs/manipulatives-lab.js`
   - `assessment/index.php` &rarr; `/assets/js/assessment/assessment-p-12.js`, `/assets/js/assessment/assessment-ap.js`, `/assets/js/assessment/assessment-main.js`
   - `levels/practice-ged.php` &rarr; `/assets/js/pages/ged-prep.js`
5. **Service Worker (`service-worker.js`)**:
   - Bumped cache identifier to **`hestens-learning-v20`** to invalidate old caches.
   - Updated all `ASSETS_TO_CACHE` paths to match the new modular directory paths.

---

## 4. Verification & Quality Assurance

- **Zero Root Script Clutter**: `Get-ChildItem -Path "assets\js" -File` returned **0 files**.
- **Complete Reference Alignment**: Automated codebase scan across all `.php`, `.js`, and `.html` files confirmed **0 unmigrated references**.
- **Full Syntax Integrity**: Executed `node -c` on all **78 JavaScript files** in the `assets/js` hierarchy: 78/78 passed with **zero syntax errors**.
- **Platform Version Elevation**: Bumped semantic version to **`v2.9.0`** across `src/header.php` and `src/footer.php`.
- **Help Center Documentation**: Published comprehensive architecture guide in [`assets/text/hc-js-architecture.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-js-architecture.md).
