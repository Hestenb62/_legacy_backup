---
title: "Senayan Library Management System (SLiMS OPAC) Redesign & Deep-Linked Bibliographic Pages Walkthrough"
date: "2026-10-16"
version: "v2.18.0"
category: "Walkthrough"
tags: ["Library", "SLiMS", "OPAC", "Bibliographic Record", "URL Hash Routing", "Accessibility", "A11y", "UDL"]
summary: "Complete redesign of the digital library portal into an academic Senayan Library Management System (SLiMS) OPAC with field-scoped catalog search, real-time collection record counters, General Material Designation badges, and responsive full-page bibliographic record overlays with dedicated #book-{id} URL hash deep linking and browser history navigation."
author: "Antigravity & Hesten"
---

# Senayan Library Management System (SLiMS OPAC) Redesign & Deep-Linked Bibliographic Pages

## 1. Overview & Objectives

The goal of this platform enhancement was twofold:
1. **SLiMS OPAC Redesign**: Transform the visual design, search experience, and catalog categorization of the main library portal (`/library/index.php`) to reflect the academic aesthetics and utility of the **Senayan Library Management System (SLiMS)** Online Public Access Catalog (OPAC).
2. **Dedicated "Own Page" Bibliographic Overlays with `#book-{id}` Hash Routing**: Convert the book overview modal into an expansive, dedicated bibliographic record view that operates like an independent page while maintaining quick closability. Each book record receives its own distinct URL hash (e.g., `#book-dracula` or `#dracula`), synchronizes with browser history (back/forward button operability), supports direct deep-linking on initial page load, and provides 1-click shareable URLs.

---

## 2. Key Architecture & File Modifications

| Component / File | Changes & Enhancements |
| :--- | :--- |
| [`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php) | **SLiMS OPAC Institutional Hero & Clean Catalog Layout**: Features SLiMS OPAC Institutional header, field scope selector (All Fields, Title, Author, Subject, Call Number, ISBN), OPAC search console with keyboard shortcut (`/`), trending academic topic pills, inlined `window.ALL_LIBRARY_BOOKS` dictionary for instant deep-linking, and streamlined catalog layout with redundant toolbar elements removed for a clean, distraction-free reading experience. |
| [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php) | **Full-Page Bibliographic Record Overlay & 3-Tab Workspace**: Upgraded `#bookModal` into a dedicated SLiMS Bibliographic Detail Page featuring a sticky navigation header (`< Back to Catalog`, Category / Title breadcrumb, `Share Link` button, bookmark button, and `✕` close button), 3D spine cover art, Dewey/LC call tags, streamlined left media sidebar with primary **Read Online** action, Lexile reading tag positioned beside Grade and Subject badges, non-redundant metadata table, and 3-tab workspace: (1) **Bibliographic Information**, (2) **Abstract / Notes**, and (3) **Barcode / Inventory** (SLiMS Code-128 vector barcode, `HL-[ID]-01` identifier, call number, and isolated single-page label printing). |
| [`library/book_card.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/book_card.php) | **Minimalist Book Cover Cards**: Streamlined book cards to display clean book cover art with top-right bookmark star button and on-hover centered "Detail" button. Removed cluttering badges (GMD, Grade, Call Number) and text below the image (Title, Author, Availability/Lexile strip), preserving all `data-*` attributes for instant filtering, sorting, and full detail overlay access. |
| [`assets/js/library/lib-book-overview-modal.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-book-overview-modal.js) | **URL Hash Routing, SLiMS Tab Engine & Barcode Circulation Slip**: Implemented `window.checkBookHash()` for automatic modal opening on page load, `resolveBookIdFromHash()` supporting `#book-{id}` and `#{id}`, `history.pushState` on modal open and hash cleanup on close, `window.addEventListener('hashchange')` and `popstate` for native browser back/forward navigation, `copyBookShareLink()` with clipboard feedback, dynamic tab switcher (`switchSlimsModalTab`), Code-128 vector SVG barcode generator (`renderBarcodeSvg`), `copyBarcodeToClipboard()`, and enhanced isolated single-page `printBarcodeLabel()` generating a rich SLiMS Bibliographic Record & Barcode Circulation Slip (including the Barcode graphic, complete Bibliographic specs table, and Abstract/Notes on exactly 1 printed page or PDF export). |
| [`assets/js/library/lib-real.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-real.js) | **Scoped SLiMS Catalog Filtering**: Added support for SLiMS search field scopes (`all`, `title`, `author`, `subject`, `callnumber`, `isbn`), trending topic chip filters, real-time bibliographic counter updates (`#slims-record-count`), and Call Number ascending sorting (`callno-asc`). |
| [`assets/css/library/lib-modals.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-modals.css) | **Dedicated Full-Page Bibliographic Overlay & Print Styles**: Styled `.slims-page-modal` as a 100vw/100vh full-page view covering the catalog, full-width sticky navigation bar (`< Back to Catalog`, breadcrumbs, SLiMS status badge, share link), centered 1400px academic page layout, `.slims-formats-grid` with dedicated cards for PDF, ePUB, MOBI, and TXT, `.slims-barcode-card` with crisp Code-128 barcode rendering and metadata table, and `@media print` rules suppressing catalog background elements. |
| [`assets/css/library/lib-hero-section.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-hero-section.css) | **SLiMS OPAC Hero & Toolbar Styles**: Created styles for `.slims-opac-hero`, `.slims-search-console`, field scope dropdown, `.slims-trending-chips`, and catalog control bar. |
| [`assets/css/library/lib-book-card-styling.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-book-card-styling.css) | **SLiMS Book Card Badges**: Styled `.slims-badge-gmd`, `.slims-call-tag`, `.slims-availability-strip`, `.slims-avail-pill`, `.slims-avail-dot`, and `.slims-lexile-pill` across light, dark, and AAA high-contrast themes. |
| [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) & [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) | **Platform Version Bump**: Bumped version to `v2.18.0` (`October 2026 Senayan Library Management System (SLiMS OPAC) & Deep-Linked Bibliographic Pages Release`) and added detailed release notes in `#footer-version-modal`. |
| [`assets/text/hc-slims-library-opac.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-slims-library-opac.md) | **Companion Help Center User Guide**: Documented SLiMS OPAC capabilities, search scopes, URL hash format (`#book-{id}`), keyboard shortcuts, and UDL accommodations. |

---

## 3. Deep-Linking & URL Hash Architecture

### Hash Syntax
The system natively recognizes and handles both canonical and shorthand URL hash patterns:
- **Canonical Format (Recommended & Shared)**: `https://.../library/#book-{bookId}` (e.g., `/library/#book-1984`, `/library/#book-dracula`, `/library/#book-american-yawp`)
- **Shorthand Fallback**: `https://.../library/#{bookId}` (e.g., `/library/#1984`)

### Collision Prevention
The library also features Subject Research Desks that use 8-character hex hash identifiers (e.g. `#cd90fec6`, `#general-resources`). `lib-book-overview-modal.js` automatically skips hashes that match subject research desk anchors or known IDs, ensuring zero interference with existing category desk navigation.

### History Lifecycle
```
User Clicks Book Card / Enters URL with #book-dracula
        │
        ▼
checkBookHash() / openBookModal()
        │
        ├─► history.pushState(..., '#book-dracula') (if user clicked)
        ├─► Sets modal state, populates SLiMS MARC data, stacks, abstract
        ├─► Traps keyboard focus, updates document title
        │
User Presses Back Button (or Clicks '< Back to Catalog' / '✕' / 'Esc')
        │
        ▼
popstate / closeBookModal()
        │
        ├─► Cleans hash via history.pushState(..., currentPath)
        ├─► Restores focus to triggering book card
        └─► Restores previous document title
```

---

## 4. Universal Accessibility (WCAG 2.1/2.2 AA/AAA & UDL)

1. **Keyboard Accessibility**:
   - `/` shortcut focuses the SLiMS OPAC search console instantly.
   - `Enter` / `Space` on any book card opens the full-page bibliographic overlay.
   - `Tab` navigates seamlessly through `< Back to Catalog`, `Share Link`, `Bookmark`, `Close`, tabs, and action links.
   - `Esc` immediately closes the overlay and returns focus to the previously active element.
   - Native browser `Alt + Left Arrow` (Back) closes the overlay.
2. **Visual Contrast & Screen Adaptation**:
   - Tested across light mode, dark mode (`[data-theme="dark"]`), and high contrast mode (`[data-theme="high-contrast"]`).
   - High-contrast `:focus-visible` outlines meet WCAG AAA ≥7:1 ratio with yellow/cyan borders.
3. **Screen Readers**:
   - Accessible roles (`role="dialog"`, `aria-modal="true"`, `aria-labelledby="modalTitle"`).
   - Holdings table features semantic `<th>` headers with `scope="col"`.
   - Real-time catalog search count announces updates via `aria-live="polite"`.

---

## 5. Verification Checklist

- [x] **SLiMS OPAC UI**: Institutional header, search console with field scopes, and trending chips render properly.
- [x] **Full-Page Overlay**: Book modal opens as a dedicated detail view with sticky header, back button, and MARC tabs.
- [x] **URL Hash Deep Linking**: Opening a book card updates URL to `#book-{id}`; direct loading of `/library/#book-{id}` opens the book immediately.
- [x] **Browser History**: Pressing Back closes the modal; pressing Forward reopens it.
- [x] **Share Link**: Clicking "Share Link" copies the exact URL to clipboard and displays user feedback.
- [x] **SLiMS Book Cards**: GMD badges (`[Text]`, `[E-Book]`), spine call tags, and availability status pills display cleanly.
- [x] **Single-Page Barcode & Bibliographic Slip**: "Print Barcode & Record Slip" generates a comprehensive, single-page printout/PDF slip containing the Code-128 SVG barcode, identifier, Call Number, bibliographic specifications table, and abstract/synopsis notes without multi-page page breaks.
- [x] **Platform Versioning**: `HL_SITE_VERSION` bumped to `v2.18.0` in `src/header.php`, `src/footer.php`, and version modal.
- [x] **Help Center Guide**: User guide created in `assets/text/hc-slims-library-opac.md`.
- [x] **Mandatory Docs**: Plan and walkthrough persisted in `updates/docs/`.
