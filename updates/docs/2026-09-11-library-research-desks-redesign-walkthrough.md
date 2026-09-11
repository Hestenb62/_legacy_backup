---
title: "Library Research Desks Redesign: Full-Width Layout & Top Desk Switcher"
date: "2026-09-11"
category: "Walkthrough"
tags: ["Library", "UI/UX Redesign", "Subject Desks", "Accessibility"]
summary: "Removed the left sidebar from the digital library catalog to provide full-width browsing, and added a sleek top Subject Switcher tab bar inside the Subject Research Workspace triggered by shelf 'More Resources' buttons."
author: "Antigravity & Hesten"
---

# Library Research Desks Redesign: Full-Width Layout & Top Desk Switcher

## Overview
We transformed the digital library browsing experience by removing the persistent left sidebar (`#library-sidebar`) and giving the book shelves 100% of the available screen width. The Subject Research Desks are now accessed directly via the **"More Resources"** button on each shelf, and scholars can switch subjects on the fly using a new, modern **Subject Switcher Tab Bar** inside the dedicated workspace.

---

## Changes Implemented

### 1. Main Layout & Catalog Markup ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))
- Removed the left sidebar aside element and its toggle button.
- Embedded the `<nav class="desk-switcher-bar">` into `#subject-desk-workspace`:
  ```html
  <nav class="desk-switcher-bar" aria-label="Switch Subject Research Desk">
      <button type="button" class="desk-switcher-tab" data-desk="General Resources" onclick="openResourcePortal('General Resources')">
          <i class="fas fa-layer-group"></i> <span>General</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="US History" onclick="openResourcePortal('US History')">
          <i class="fas fa-university"></i> <span>US History</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="World History" onclick="openResourcePortal('World History')">
          <i class="fas fa-globe-americas"></i> <span>World History</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="WW1" onclick="openResourcePortal('WW1')">
          <i class="fas fa-shield-halved"></i> <span>WW1</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="WW2" onclick="openResourcePortal('WW2')">
          <i class="fas fa-award"></i> <span>WW2</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="Math" onclick="openResourcePortal('Math')">
          <i class="fas fa-calculator"></i> <span>Math</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="ELA" onclick="openResourcePortal('ELA')">
          <i class="fas fa-spell-check"></i> <span>ELA</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="Science" onclick="openResourcePortal('Science')">
          <i class="fas fa-atom"></i> <span>Science</span>
      </button>
      <button type="button" class="desk-switcher-tab" data-desk="Civics" onclick="openResourcePortal('Civics')">
          <i class="fas fa-landmark"></i> <span>Civics</span>
      </button>
  </nav>
  ```

### 2. Styling & Pill Tab Bar ([`assets/css/library/lib-subject-research-workspace-pan.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-subject-research-workspace-pan.css))
- Designed `.desk-switcher-bar` and `.desk-switcher-tab` with:
  - Rounded pill cards with subtle border and elevation.
  - Active state gradient highlight (`linear-gradient(135deg, var(--lib-primary), #6366f1)`) and soft glow.
  - Smooth horizontal scrolling for mobile devices with `-webkit-overflow-scrolling: touch`.
  - Accessible `:focus-visible` outline rings for full keyboard navigation (WCAG AAA).

### 3. Subject Switcher Interaction ([`assets/js/library/lib-subject-research-desks-navigat.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-subject-research-desks-navigat.js))
- Updated `openResourcePortal(deskName)` to dynamically mark the corresponding `.desk-switcher-tab` as active and smoothly auto-scroll it into view.
- Maintained seamless bidirectional navigation with `← Back to Catalog` and close controls.

---

## Verification
- **Full-Width Browsing**: The main catalog has expanded to full width without any side clutter.
- **Shelf Integration**: Clicking "More Resources" on *Fantasy & Sci-Fi* opens the *ELA* desk; clicking on *US History* opens the *US History* desk.
- **Desk Switching**: Clicking any subject tab switches primary documents, textbooks, and external links in real time.
- **Accessibility**: 100% keyboard navigable with clear visual indicators and screen reader attributes.
