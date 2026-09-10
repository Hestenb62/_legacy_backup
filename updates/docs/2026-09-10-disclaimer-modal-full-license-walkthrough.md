---
title: "Walkthrough: Content Sourcing Modal Tabs & Full Platform License Integration"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Library", "Modals", "Licensing", "OER", "Accessibility", "A11y"]
summary: "Structured the Content Sourcing & Terms modal so the resource details card and metadata pills remain strictly under the 'Book License & Source' tab, and expanded the 'General Terms' tab to deliver the comprehensive full platform licensing and open educational resources agreement."
author: "Antigravity & Hesten"
---

# Walkthrough: Content Sourcing Modal Tabs & Full Platform License Integration

## Overview
Refactored the Content Sourcing & Terms modal in the digital library to clearly delineate title-specific book licensing from the platform-wide legal agreements:
- **Book License & Source Tab**: Keeps the individual book context box ("RESOURCE" title and author), source/metadata/license pill badges, and dynamic volume attribution statement.
- **General Terms & Full License Tab**: Houses the comprehensive 7-section Platform Terms and Open Educational Resources (OER) licensing agreement with dedicated, styled text cards.

---

## Key Changes

### 1. Modal Markup & Semantic Tab Navigation (`library/modals.php`)
- **Semantic ARIA Tablist**: Updated `.disclaimer-tabs-row` to `role="tablist"` with `role="tab"` buttons, `aria-selected`, and `aria-controls` referencing their respective panels.
- **Book License & Source Panel (`#disclaimer-license-view`)**: Contains:
  - Resource Title & Author Card (`#modal-disc-book-context`)
  - Source, Metadata, and License Pill Badges (`.disclaimer-badges-row`)
  - Dynamic Volume Attribution Statement (`#modal-license-text`)
- **General Terms & Full License Panel (`#disclaimer-standard-view`)**: Populated with 7 structured legal sections:
  1. *Educational Fair Use & Open Access Policy* (17 U.S.C. § 107)
  2. *Public Domain Verification & Dedication* (Pre-1928, Gutenberg, Internet Archive)
  3. *Open Educational Licensing (Creative Commons)* (CC BY 4.0, CC BY-SA 4.0, CC0)
  4. *Intellectual Property & Trademarks*
  5. *Academic Integrity & Mandatory Scholarly Citation*
  6. *Disclaimer of Warranties & Limitation of Liability*
  7. *DMCA Compliance & Rights Inquiries* (`admin@hestena62.com`)

### 2. Tab Controller & State Management (`assets/js/library/lib-explainer.js`)
- Enhanced `window.switchDisclaimerTab(tab)` to toggle both CSS active classes and screen-reader `aria-selected="true/false"` attributes when switching between the book-specific view and the full license view.

### 3. Styling & Responsive Scroll (`assets/css/library/lib-modals.css`)
- **Container Sizing**: Set `.library-disclaimer-content` to `max-width: 620px` with `max-height: calc(90vh - 2rem)` and vertical flexbox orientation.
- **Dedicated Scroll Area**: Added `overflow-y: auto` with custom scrollbars to `.library-disclaimer-body-box` (`max-height: 52vh`) so the modal header, tabs, and "Got It" action button remain pinned while long license text scrolls smoothly.
- **Card Spacing**: Refined `.disclaimer-text-card` padding and margins for clean visual hierarchy.
