---
title: "Header Resources Expansion Dropdown Plan"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Navigation", "Header", "Accessibility", "UI"]
summary: "Implementation plan for an expandable Resources navigation dropdown in the header with direct links to the digital library, grade-level assessments, and curriculum level pages."
author: "Antigravity & Hesten"
---

# Header Resources Expansion Dropdown Implementation Plan

The user requested an expandable resource navigation menu in the site header with an expansion arrow that provides direct links to the platform's core resources:
1. **Digital Library & Featured Books**
2. **Assessment Grade Bands & Diagnostic Evaluation**
3. **Core Curriculum Level Pages**

## User Review Required

> [!IMPORTANT]
> - **Entire Button Target:** To comply with WCAG 2.1 touch target guidelines (Success Criterion 2.5.5 / 2.5.8), the entire button (icon + "Resources" label + chevron) will serve as the click/tap target rather than just the chevron alone.
> - **Responsive Display:** On desktop (`>= 1024px`), this expands as an accessible multi-column flyout menu. On mobile (`< 1024px`), it expands inline as an accordion within the mobile navigation drawer.

---

## Proposed Changes

### Header Layout & Markup

#### [MODIFY] [src/header.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Inside `.header-nav-links`, add the expandable Resources container:
  ```html
  <div class="nav-dropdown-container" id="resources-dropdown-container">
      <button type="button" class="nav-link nav-dropdown-btn" id="resources-dropdown-btn" aria-expanded="false" aria-haspopup="true" aria-controls="resources-dropdown-menu">
          <i class="fas fa-th-large" style="margin-right: 0.35rem; opacity: 0.8;" aria-hidden="true"></i>
          <span>Resources</span>
          <i class="fas fa-chevron-down nav-chevron" aria-hidden="true"></i>
      </button>
      <div class="nav-mega-dropdown hidden" id="resources-dropdown-menu" role="menu" aria-labelledby="resources-dropdown-btn">
          <!-- Column 1: Books & Library -->
          <!-- Column 2: Assessment by Grade -->
          <!-- Column 3: Curriculum Levels -->
          <!-- Bottom Bar: Quick Utilities (Standards Explorer, Interactive Labs, Research) -->
      </div>
  </div>
  ```
- In the `<script>` section at the bottom of `src/header.php`:
  - Add click toggle for `#resources-dropdown-btn`.
  - Add outside-click dismissal.
  - Add `Escape` key listener to close and return focus to the toggle button.
  - Auto-close when resizing or when another dropdown opens.

---

### Header Stylesheet

#### [MODIFY] [assets/css/layouts/header.css](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/header.css)
- Add styles for `.nav-dropdown-container`, `.nav-dropdown-btn`, `.nav-chevron`.
- Add styles for `.nav-mega-dropdown`:
  - Multi-column responsive layout (3 columns on desktop, clean single-column accordion on mobile).
  - Categorized section headers with distinctive icon colors.
  - Glassmorphic backdrop with theme support (`data-theme="dark"`, high contrast support).
  - Hover and keyboard focus states on all items.

---

## Direct Links Included in the Dropdown

1. **Books & Library**
   - **Digital Library Catalog** (`/library/index.php`)
   - **The Time Machine** (`/library/read/?book=the-time-machine`)
   - **Frankenstein** (`/library/read/?book=frankenstein`)
   - **The American Yawp Reader** (`/library/read/?book=the-american-yawp`)

2. **Assessments by Grade Band**
   - **Adaptive Diagnostic & Growth** (`/assessment/diagnostic.php`)
   - **Early & Kindergarten Tests** (`/assessment/index.php#elem`)
   - **Elementary Tests (Grades 1–5)** (`/assessment/index.php#elem`)
   - **Middle School Tests (Grades 6–8)** (`/assessment/index.php#middle`)
   - **High School Tests (Grades 9–12)** (`/assessment/index.php#high`)

3. **Curriculum Levels**
   - **Level A (Pre-K Readiness)** (`/levels/a.php`)
   - **Level B (Kindergarten)** (`/levels/b.php`)
   - **Level G (5th Grade Transition)** (`/levels/g.php`)
   - **Level K (High School Algebra 1 & Bio)** (`/levels/k.php`)
   - **AP U.S. History** (`/levels/ap-us-history.php`)
   - **Practice GED Preparation** (`/levels/practice-ged.php`)

---

## Verification Plan

### Automated Tests
- JavaScript syntax check with `node -c`.
- Mobile/desktop CSS media query checks.

### Manual Verification
1. **Desktop Expansion:** Click "Resources" in header; verify the 3-column flyout appears smoothly.
2. **Keyboard Accessibility:** Focus the button and press `Enter` or `Space` to toggle; press `Escape` to close.
3. **Mobile Responsiveness:** Resize below 1024px, open mobile menu; verify the Resources section expands cleanly as an accordion.
4. **Link Navigation:** Click a book, assessment grade, and level link to ensure all navigate to active endpoints.
