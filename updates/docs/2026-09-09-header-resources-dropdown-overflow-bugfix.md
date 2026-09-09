---
title: "Fix: Header Resources Mega Dropdown Viewport Horizontal Overflow"
date: "2026-09-09"
category: "Bugfix"
tags: ["UI", "Header", "Mega Dropdown", "Responsive", "CSS", "JavaScript"]
summary: "Resolved horizontal screen overflow for the Header Resources mega dropdown flyout using dynamic viewport boundary clamping and fluid CSS sizing."
author: "Antigravity & Hesten"
---

# Fix: Header Resources Mega Dropdown Viewport Horizontal Overflow

## Issue Description
On desktop screens (specifically 1280px, 1366px, or zoomed viewports), opening the **Resources** expandable dropdown menu in the top navigation bar caused the 3rd column (*Curriculum Levels*) to extend beyond the right edge of the viewport.

### Root Cause
1. In `assets/css/layouts/header.css`, `.nav-mega-dropdown` was styled with `position: absolute; left: 0; width: min(92vw, 780px);` inside `#resources-dropdown-container`.
2. Because the *Resources* button is positioned toward the middle of the navigation bar, anchoring the left edge of a 780px flyout to the button forced the right side of the menu to overhang past the browser window.

## Solution Implemented

### 1. Fluid & Contained CSS ([`header.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/header.css))
- Updated `.nav-mega-dropdown` to use `width: min(calc(100vw - 2rem), 760px);` and `max-width: calc(100vw - 2rem);`.
- Added `box-sizing: border-box;`, `max-height: calc(100vh - 5rem);`, and `overflow-y: auto;` to prevent both horizontal and vertical clipping on short displays.
- In mobile view (`< 1023px`), reset `max-width: 100%`, `max-height: none`, and `overflow-y: visible` to maintain accordion behavior in the mobile drawer.

### 2. Viewport Boundary Clamping in JS ([`header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php))
- Added `repositionMegaMenu()` to calculate the dropdown's rendered geometry on open and resize:
  ```javascript
  const rect = resMenu.getBoundingClientRect();
  const padding = 16;
  const viewportWidth = window.innerWidth;

  if (rect.right > viewportWidth - padding) {
      const overflowRight = rect.right - (viewportWidth - padding);
      resMenu.style.left = `-${overflowRight}px`;
  }
  ```
- Added safety check to ensure `rect.left` does not push past the left viewport boundary.
- Hooked `window.addEventListener('resize', ...)` to automatically recalculate alignment if the window is resized while open.

## Verification
- Confirmed that on standard resolutions (1280px–1440px), the dropdown automatically shifts left so that all 3 columns (*Books & Library*, *Assessments*, *Curriculum Levels*) remain within the screen margins.
- Verified mobile drawer behavior remains intact with full width accordion expansion.
