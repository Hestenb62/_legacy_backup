---
title: "Implementation Plan: Accessibility Standards & Policy Research Popups"
date: "2026-09-08"
category: "Implementation Plan"
tags: ["Accessibility", "WCAG", "Section 508", "UDL", "Research", "Documentation"]
summary: "Implementation plan to integrate interactive (i) research info buttons next to WCAG 2.1 AA, Level AAA, Section 508, and UDL terms on the accessibility hub, with a dynamic modal loading word-for-word statutory text from assets/texts/."
author: "Antigravity & Hesten"
---

# Implementation Plan: Research & Standards Popups on Accessibility Hub

## Overview
Implement interactive `(i)` research info buttons next to **(WCAG) 2.1 Level AA**, **Level AAA**, **Section 508 of the Rehabilitation Act**, and **Universal Design for Learning (UDL)** on `pages/accessibility.php`. Each button opens a dedicated research dialog displaying a policy overview and verbatim word-for-word statutory/standards text loaded dynamically from Markdown files in `assets/texts/`.

---

## 1. Verbatim Documents Architecture (`assets/texts/`)
We will create four comprehensive, authoritative Markdown files containing the word-for-word standards:
1. `assets/texts/wcag-2-1-aa.md`: Full W3C Web Content Accessibility Guidelines (WCAG) 2.1 Level AA principles and success criteria.
2. `assets/texts/wcag-aaa.md`: Full W3C WCAG Level AAA success criteria relevant to cognitive, visual, contrast, timing, and reading accessibility.
3. `assets/texts/section-508.md`: Section 508 of the Rehabilitation Act (29 U.S.C. § 794d) and Access Board Electronic and Information Technology Accessibility Standards.
4. `assets/texts/udl-guidelines.md`: CAST Universal Design for Learning Guidelines (UDL 2.2) official framework.

---

## 2. Interactive Standards Modal UI
- Add styled `(i)` info buttons next to the compliance terms in `pages/accessibility.php`:
  ```html
  <button type="button" class="a11y-info-btn" data-standard="wcag-2-1-aa" aria-label="Learn about WCAG 2.1 Level AA">
      <i class="fas fa-info-circle" aria-hidden="true"></i>
  </button>
  ```
- Build an accessible modal popup (`#standards-research-modal`) featuring:
  - **Tabs**:
    1. *Overview & Clinical Context*: Plain-language explanation of what the law or framework governs, who it protects, and how Hesten's Learning complies.
    2. *Word-for-Word Official Text*: Verbatim statutory/regulatory text loaded from the respective `.md` file.
  - **In-Document Search Filter**: Live filter bar allowing researchers to search for specific sections or keywords within long standards documents.
  - **Copy Citation & Verbatim Text Button**: Instant clipboard copy formatted with formal citation.
  - **Keyboard & Accessibility**: Full focus trapping, <kbd>Esc</kbd> dismissal, ARIA live region announcements, and full theme compatibility (including High Contrast).

---

## 3. Verification Plan
- Syntax validation of JS and PHP files.
- Live server test verifying that clicking each of the 4 `(i)` buttons opens the modal, correctly fetches the markdown document from `http://localhost:5500/assets/texts/`, and renders verbatim text with live searching.
