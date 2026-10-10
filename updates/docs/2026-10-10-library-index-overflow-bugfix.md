---
title: "Fix Library Index Page Horizontal Layout Overflow"
date: "2026-10-10"
version: "v2.12.1"
category: "Bugfix"
tags: ["Library", "A11y", "Responsive", "CSS", "WCAG"]
summary: "Resolves horizontal scrollbar overflow on /library/index.php across desktop and mobile viewports by fixing unconstrained flex containers, grid blowout, subnav ribbons, and carousel scroll bounds."
author: "Antigravity & Hesten"
---

# Fix: Library Index Page Horizontal Layout Overflow

## 1. Problem Description
Users encountered an unwanted horizontal scrollbar and layout overflow on the right side of the main Digital Library index page (`/library/index.php`). The page scrolled horizontally beyond the browser viewport on desktop and mobile screens, breaking the clean visual boundaries and violating the WCAG 1.4.10 Reflow mandate.

## 2. Root Cause Analysis
Thorough inspection revealed multiple compounding factors responsible for the layout blowout:

1. **Unconstrained Flex Container in Main Layout**:
   `.library-main` was configured with `display: flex; gap: 2rem;`. Because `.library-workspace` was treated as a flex child, children with horizontal scroll capabilities were not bounded by standard block flow width constraints.
2. **Carousel Flex Min-Content Blowout**:
   `.library-content-container` was configured with `display: flex; flex-direction: column;`. In CSS flexbox, flex children default to `min-width: auto`. Within each `.library-row-section`, the carousel row (`.view-carousel .library-books-row`) contained up to 30 book cards of 220px width each (~5,000px total content width). Because `.library-row-section` lacked `min-width: 0` and `max-width: 100%`, browsers calculated the flex item's min-content width as the sum of all cards, expanding the entire row section far beyond the viewport width.
3. **Subnav Ribbon Overflow on Narrow Viewports**:
   In `library_header_nav.php`, `.library-subnav-links` (with `overflow-x: auto`) was a child of the flex container `.library-subnav-container`. Without `min-width: 0; flex: 1 1 auto;`, the flex container was pushed wider than the screen whenever the combined links and utility buttons exceeded the viewport width (~800px).
4. **CSS Grid Column Blowout in Modern Hero & Dashboard**:
   `.library-modern-hero` utilized `grid-template-columns: 1.6fr 1fr;`. In CSS Grid, `1fr` defaults to `minmax(auto, 1fr)`. If stat cards inside `.dashboard-stats-grid` or featured book actions exceeded their track width, the right grid column expanded past 100% of the container.
5. **GPU Parallax Blob Boundary Bleed**:
   `.library-aurora-bg` had large blurred blobs (`width: 50vw; right: -5%; filter: blur(90px)`) that animated and responded to mouse movements. Without `contain: paint; max-width: 100vw; max-height: 100vh;`, hardware-accelerated layers could register as scrollable document overflow.
6. **Row Header Title Non-Wrapping**:
   `.library-row-title` had `white-space: nowrap;` and only wrapped below 640px. On medium viewports with long category titles, the title and controls collided and exceeded container bounds.

## 3. Changes Implemented

### A. Layout Container Containment (`assets/css/library/lib-base-variables.css`)
- Converted `.library-main` from `display: flex; gap: 2rem;` to `display: block; width: 100%; max-width: 1440px; box-sizing: border-box; overflow-x: clip;`.
- Set `width: 100%; max-width: 100%; min-width: 0; box-sizing: border-box;` on `.library-workspace` and `.workspace-panel`.
- Clamped `.library-aurora-bg` with `width: 100%; height: 100%; max-width: 100vw; max-height: 100vh; contain: paint;`.

### B. Subnav Ribbon & Links Clamping (`assets/css/library/lib-portal-pages.css`)
- Clamped `.library-subnav-ribbon` with `width: 100%; max-width: 100%; box-sizing: border-box; overflow-x: clip;`.
- Clamped `.library-subnav-container` with `width: 100%; max-width: 1360px; min-width: 0; box-sizing: border-box;`.
- Assigned `min-width: 0; flex: 1 1 auto; -webkit-overflow-scrolling: touch;` to `.library-subnav-links` so internal horizontal scrolling functions cleanly without forcing container expansion.

### C. Catalog Container, Row Sections & Carousels (`assets/css/library/lib-library-catalog-container.css`)
- Added `width: 100%; max-width: 100%; min-width: 0; box-sizing: border-box;` to `.library-content-container`, `.library-row-section`, and `.library-row-header`.
- Removed `white-space: nowrap;` from `.library-row-title` and added `min-width: 0; word-break: break-word;`.
- Elevated `.library-row-header` wrap breakpoint to `max-width: 768px` for smooth tablet reflow.
- Added `width: 100%; max-width: 100%; min-width: 0; box-sizing: border-box; overflow-y: hidden;` to `.view-carousel .library-books-row`.
- Clamped `.view-carousel .library-book-card` to `max-width: 220px; box-sizing: border-box;`.
- Clamped `.view-grid .library-books-row`, `.view-list .library-books-row`, and added mobile column stacking for `.view-list .library-book-card`.

### D. Hero & Scholar Dashboard Grid Containment (`assets/css/library-main.css`)
- Defined hero grid columns as `minmax(0, 1.6fr) minmax(0, 1fr)` to prevent grid item expansion.
- Assigned `min-width: 0; max-width: 100%; box-sizing: border-box;` to `.hero-featured-book.hero-welcome-card` and `.hero-academic-dashboard`.
- Defined `.dashboard-stats-grid` columns as `repeat(2, minmax(0, 1fr))` with 1-column mobile reflow below 480px.
- Clamped masonry grid `.view-grid.masonry-active .library-books-row` with `width: 100%; max-width: 100%; min-width: 0; box-sizing: border-box;` and added single-column layout below 540px.

### E. Search Filters, Breakpoints & Secondary Panels
- In `lib-hero-section.css`, clamped `.library-search-wrapper`, `.library-search-input-container`, and `.library-filter-select-container`.
- In `lib-responsive-breakpoints.css`, normalized `.library-main` padding and ensured 100% width on inputs below 768px.
- In `lib-continue-reading-shelf.css`, clamped `.continue-reading-section` and `.continue-reading-grid`.
- In `lib-subject-research-workspace-pan.css`, clamped `.desk-switcher-bar`, `.drawer-section-grid`, and `.drawer-external-links-grid`.

## 4. Verification & Testing
- **Viewport Testing**: Verified layout containment across 320px, 375px, 480px, 640px, 768px, 1024px, 1280px, 1440px, and 1920px.
- **Scroll Behavior**: Horizontal scrolling is strictly isolated to intentional interactive components (book carousels, subnav links, and subject switcher bar). The document-level window has zero horizontal scrollbars.
- **WCAG & A11y Compliance**: Fully complies with WCAG 2.1/2.2 AA & AAA Criterion 1.4.10 (Reflow), requiring vertical reflow down to 320px without two-dimensional scrolling.
- **Platform Version Sync**: Bumped semantic version to `v2.12.1` in `src/header.php`, `src/footer.php`, and updated release notes in the footer version modal.
