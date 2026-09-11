---
title: "Library Research Desks Redesign & Sidebar Removal"
date: "2026-09-11"
category: "Implementation Plan"
tags: ["Library", "UI/UX Redesign", "Subject Desks", "Accessibility"]
summary: "Plan to remove the left sidebar in the digital library catalog to provide a clean full-width browsing experience, routing 'More Resources' shelf buttons directly to a redesigned full-width Subject Research Workspace equipped with a top desk switcher tab bar."
author: "Antigravity & Hesten"
---

# Implementation Plan: Library Research Desks Redesign & Sidebar Removal

## Overview
We are streamlining the Library UI by removing the sticky left sidebar (`#library-sidebar`), giving the main book catalog 100% of the screen width for a clean, modern aesthetic. In its place, the **"More Resources"** button on each shelf opens the full **Subject Research Workspace**, which now features an interactive **Subject Switcher Tab Bar** along the top for seamless navigation between subjects.

---

## Proposed Changes

### 1. Structure Updates ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))
- **Remove Sidebar**: Remove `<aside id="library-sidebar">` and its toggle controls.
- **Add Top Subject Desk Switcher**: In `#subject-desk-workspace`, introduce a responsive, accessible `<nav class="desk-switcher-bar">` containing interactive tabs for:
  - *General Resources*, *US History*, *World History*, *WW1*, *WW2*, *Math*, *ELA*, *Science*, *Civics*.
- **Back to Catalog Button**: Maintain the prominent `← Back to Catalog` action in the header to return to the main shelves instantly.

### 2. Styling Enhancements ([`assets/css/library/lib-subject-research-workspace-pan.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-subject-research-workspace-pan.css) & [`assets/css/library/lib-base-variables.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-base-variables.css))
- Update `.library-main` to span the full grid width smoothly without sidebar margins.
- Style `.desk-switcher-bar` and `.desk-switcher-tab` with:
  - Glassmorphic surface cards with active glowing accent pill indicator.
  - Horizontal scroll containment with momentum touch scrolling on mobile devices.
  - High-contrast `:focus-visible` accessible keyboard focus rings (WCAG AAA).

### 3. Navigation Logic ([`assets/js/library/lib-subject-research-desks-navigat.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-subject-research-desks-navigat.js))
- Update `openResourcePortal(deskName)` to activate the current `.desk-switcher-tab[data-desk="..."]`.
- Remove obsolete sidebar toggle listeners (`setupSidebarToggle`).
- Retain keyboard shortcuts (`Esc` or `Alt+Left` to return to catalog).

---

## Verification Plan
1. **Catalog View**: Verify catalog renders full-width with clean margins across desktop, tablet, and mobile.
2. **"More Resources" Interaction**: Click "More Resources" on various shelves (*Fantasy & Sci-Fi*, *US History*, *General Resources*) and verify the Subject Workspace opens seamlessly with the correct topic active.
3. **Desk Switcher**: Click across the top subject tabs (*WW1*, *Math*, *Civics*, etc.) and confirm holdings and external links switch immediately.
4. **Return Flow**: Click `← Back to Catalog` or `✕` close button and ensure the main catalog view restores smoothly.
5. **Accessibility Check**: Verify keyboard navigation (`Tab`, `Enter`, `Space`) and screen reader labels.
