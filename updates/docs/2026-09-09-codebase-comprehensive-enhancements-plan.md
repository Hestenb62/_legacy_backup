---
title: "Comprehensive Codebase Improvements Plan"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Accessibility", "PWA", "Performance", "Security", "Routing"]
summary: "Full plan addressing WCAG viewport scaling, Bionic reading synchronization, service worker caching hardening, search disk-crawling optimization, canvas avatar compression, error handling filtering, and routing consistency."
author: "Antigravity & Hesten"
---

# Comprehensive Codebase Improvements Implementation Plan

This plan addresses all items discovered in the architectural and code-quality audit across Hesten's Learning platform.

## Proposed Changes

### 1. Accessibility & Neurodivergent UX

#### [MODIFY] [header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Remove `maximum-scale=1.0, user-scalable=no` from line 65 to restore WCAG 1.4.4 & 1.4.10 compliance for mobile/tablet zoom.

#### [MODIFY] [accommodations.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/accommodations.css)
- Add CSS rule ensuring that when `body:not(.bionic-reading-active)` is present, `.bionic-fix` explicitly renders with `font-weight: inherit !important` so deactivated bionic reading cleanly reverts without requiring page reloads.

#### [MODIFY] [accommodation-engine.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/accessibility/accommodation-engine.js) & [global-a11y.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-a11y.js)
- Wire up a cross-module event `hl-bionic-sync` so toggling Bionic Reading in either the Accessibility Hub or the Accommodations Modal keeps both checkboxes and states in sync.

---

### 2. PWA, Service Worker & Offline Caching

#### [MODIFY] [service-worker.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js)
- Guard `cache.put` calls with `if (event.request.method !== 'GET' || !event.request.url.startsWith('http')) return;` to avoid `TypeError: Request method 'POST' is unsupported`.
- Add missing core UI assets to `ASSETS_TO_CACHE`:
  - `/assets/css/components/command-palette.css`
  - `/assets/css/components/shortcuts-modal.css`
  - `/assets/css/layouts/print.css`
  - `/assets/js/global-error-handler.js`
- Improve cache/network fallback logic so offline asset fetch rejections safely fallback rather than returning `undefined`.

---

### 3. Performance & Server Scalability

#### [MODIFY] [footer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php)
- Wrap `/assets/js/global-error-handler.js` and `/assets/js/global-standard.js` in `assetVersion()` to ensure automatic cache-busting.
- Load Google API scripts (`api.js` and `gsi/client`) only when Google Drive sync is enabled or needed, rather than downloading ~150KB on every page.

#### [MODIFY] [index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/index.php)
- Update data imports to use root-relative paths (`/assets/data/...`), `assetVersion()`, and `defer` attributes.

#### [MODIFY] [search.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php)
- Implement a cached disk catalog scan (with file modification check / time-based cache) so repeated searches avoid synchronous recursive whole-disk filesystem walks on every keystroke.

---

### 4. Reliability, Client Storage & Audio Coordination

#### [MODIFY] [profile-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/profile-main.js)
- Add client-side `<canvas>` image downscaling (max 192x192 JPEG/WebP) on avatar file selection before writing to `localStorage`, preventing fatal `QuotaExceededError` crashes from large phone photos.

#### [MODIFY] [global-error-handler.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-error-handler.js)
- In `unhandledrejection` and `error` listeners, filter out cross-origin scripts, browser extension errors, and blocked external CDNs (GTranslate, BuyMeACoffee, Google Identity Services) so false-positive full-screen red error modals do not interrupt students mid-lesson.

#### [MODIFY] [global-study-tools.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-study-tools.js) & [accommodation-engine.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/accessibility/accommodation-engine.js)
- Coordinate audio synthesizers via a shared event (`hl-audio-play`) so activating sound in the study companion pauses accommodation soundscapes, and vice versa.

---

### 5. Routing, Cleanliness & Security

#### [NEW] [levels/index.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/index.php)
- Create a directory index for `/levels/` that gracefully redirects to `/index.php#levels` or presents a clean Grade Levels hub, preventing 403 Forbidden / 404 errors.

#### [MODIFY] [command-palette.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/command-palette.js)
- Update command targets: change `/levels/` to `/levels/index.php` and `/src/lesson_runner.php` to `/lessons/k-math-m1-a-1.php` (or `/student/`).

#### [MODIFY] [global-learningLevels.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/global-learningLevels.js)
- Prefix all `"link"` properties with leading `/` (e.g. `"/levels/a.php"`) so links never fail when rendered from nested paths.

#### [MODIFY] [robots.txt](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/robots.txt)
- Populate `robots.txt` with standard search engine crawling directives, Disallow rules for private directories (`/src/`), and sitemap link.

#### [MODIFY] [lesson_renderer.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php)
- Escape JSON-derived output with `htmlspecialchars()` to prevent XSS vulnerabilities in dynamic lesson rendering.

---

## Verification Plan

### Automated Tests
- Syntax validation of all modified PHP and JavaScript files via shell:
  - `php -l <file>` for all changed `.php` files.
  - `node -c <file>` for all changed `.js` files.

### Manual Verification
1. **Viewport & Zoom:** Verify viewport meta tag no longer contains `user-scalable=no`.
2. **Bionic Reading Toggle & Revert:** Toggle Bionic Reading on and off in both panels; verify state syncs and text weights revert cleanly.
3. **Avatar Upload:** Test uploading a large test image; verify it is compressed onto canvas before saving into `localStorage`.
4. **Service Worker:** Inspect `service-worker.js` caching lists and ensure non-GET requests are bypassed.
5. **Levels Navigation:** Navigate to `/levels/` in browser; verify it redirects cleanly to `/index.php#levels`.
6. **Command Palette:** Test navigation links in command palette (`Ctrl+K` or `Alt+K`).
