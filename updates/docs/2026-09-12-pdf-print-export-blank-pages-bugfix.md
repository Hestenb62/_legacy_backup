---
title: "Resolution of Universal PDF Export & Print Blank Page Issues"
date: "2026-09-12"
category: "Bugfix"
tags: ["PDF Export", "Print Stylesheet", "Pagination", "A11y", "CSS"]
summary: "Resolved systemic PDF print export errors where exported documents were invisible, truncated to one page, or generating dozens of blank pages due to unscoped visibility rules and indiscriminate break-inside constraints."
author: "Antigravity & Hesten"
---

# Universal PDF Export & Print Engine Resolution

## 1. Problem Identification & Root Causes
Users reported that file exports (PDF / print) across the platform were either failing to print any content, printing only partial pages, or generating numerous blank pages. Comprehensive code inspection revealed three major systemic causes:

1. **Global `body * { visibility: hidden !important; }` Pollution**:
   - In [`src/partials/certificate-modal.php`](/src/partials/certificate-modal.php), [`assets/css/pages/assessment.css`](/assets/css/pages/assessment.css), and [`assets/css/pages/profile.css`](/assets/css/pages/profile.css), un-scoped `@media print` blocks applied `body * { visibility: hidden; }` globally whenever the modal file was loaded.
   - Because `certificate-modal.php` was loaded globally via `src/footer.php`, printing *any* standard page (e.g. book chapters, standards, study guides) made the entire page invisible and printed an empty certificate box instead.

2. **Indiscriminate `break-inside: avoid;` on Long Containers**:
   - In [`assets/css/layouts/print.css`](/assets/css/layouts/print.css), `article, section` were assigned `break-inside: avoid;` and `page-break-inside: avoid;`.
   - In [`assets/css/pages/standards.css`](/assets/css/pages/standards.css), `.curr-card` (which wraps all standards for a subject/grade) had `break-inside: avoid;`.
   - When elements taller than a single physical sheet of paper are forbidden from breaking across pages, browser print layout engines attempt to push them to the next page (creating blank initial pages) and then clip or truncate subsequent pages.

3. **Un-scoped Modal Printing & Fixed Positioning Overflow**:
   - Modal print styles (such as the diagnostic mastery report, student transcript, and quiz worksheet) used `position: absolute; inset: 0;`, trapping printable content inside a single viewport height and cutting off subsequent pages.

---

## 2. Technical Fixes Implemented

### A. Scoped Modal Class-Gating
- **Certificate Modal** ([`src/partials/certificate-modal.php`](/src/partials/certificate-modal.php)): Scoped all certificate print display rules strictly to `body.printing-certificate`.
- **Mastery Report Card & Quiz Worksheet** ([`assets/css/pages/assessment.css`](/assets/css/pages/assessment.css)): Removed `body * { visibility: hidden !important; }`. Scoped modal isolation to `body.printing-mastery-report` and `body.printing-worksheet`.
- **Student Academic Transcript** ([`assets/css/pages/profile.css`](/assets/css/pages/profile.css)): Removed `body * { visibility: hidden; }`. Scoped print styles to `body.printing-transcript`.
- **Button Triggers** ([`assessment/index.php`](/assessment/index.php), [`pages/profile.php`](/pages/profile.php), [`assets/js/certificate-generator.js`](/assets/js/certificate-generator.js)): Attached and detached the appropriate modal printing class during print execution.

### B. Natural Fluid Pagination in `assets/css/layouts/print.css`
- Changed `article` and `section` to:
  ```css
  article, section {
      break-inside: auto !important;
      page-break-inside: auto !important;
      overflow: visible !important;
      height: auto !important;
  }
  ```
- Restricted `break-inside: avoid;` strictly to discrete, atomic elements (e.g. individual question cards, standard badges, table rows, and MathJax blocks):
  ```css
  .worksheet-question-card,
  .ws-question-block,
  .question-card,
  .level-card,
  .standard-item,
  .stat-card {
      page-break-inside: avoid !important;
      break-inside: avoid !important;
  }
  ```
- Unwrapped main layout containers (`main`, `#main-content`, `.library-main`, `.cdn-book-reader-container`, `.cdn-book-reader-content`, `.container`) with `overflow: visible !important; height: auto !important; position: static !important;`.

### C. Standards Domain Pagination in `assets/css/pages/standards.css`
- Changed `.curr-card` from `break-inside: avoid;` to `break-inside: auto !important; page-break-inside: auto !important;`. Each individual `.curr-standard-item` continues to avoid breaking mid-standard.

---

## 3. Verification & Results
- Ran `node scratch/verify_print_architecture.js`:
  - Verified 0 un-scoped `body *` rules across all partials, templates, and stylesheets.
  - Verified no `break-inside: avoid;` rules on parent containers.
  - Verified all modal triggers cleanly handle print classes.
- Ran `node scratch/verify_master_suite.js`:
  - 100% test pass across all core platform features and views.
