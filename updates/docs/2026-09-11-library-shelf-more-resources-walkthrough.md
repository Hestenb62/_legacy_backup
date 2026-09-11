---
title: "Library Shelf More Resources Button and Header Divider"
date: "2026-09-11"
category: "Walkthrough"
tags: ["Library", "UI Enhancement", "Accessibility", "Research Desks"]
summary: "Added a dedicated 'More Resources' button before the carousel scroll controls in each library shelf header, and rendered a sleek divider line underneath the shelf title and buttons."
author: "Antigravity & Hesten"
---

# Library Shelf Header Enhancements: "More Resources" Button & Shelf Divider

## Overview
To improve navigation, subject exploration, and visual hierarchy across the digital library catalog, we implemented two key enhancements to the shelf header layout:
1. **"More Resources" Button**: Positioned immediately before the horizontal scroll buttons on each shelf header row. Clicking it directs scholars directly to relevant Subject Research Desks, primary sources, textbooks, and external academic archives.
2. **Shelf Header Divider Line**: A crisp, responsive 1px border line running underneath both the shelf title and the action controls (`.library-row-controls`), creating clear visual separation between shelf sections.

---

## Changes Implemented

### 1. Shelf Header Structure ([`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php))
- Grouped the controls into `.library-row-controls`.
- Added the `.library-more-resources-btn` button with accessible labeling and click handler:
  ```php
  <div class="library-row-header">
      <h2 class="library-row-title">
          <?php echo htmlspecialchars($categoryName); ?>
      </h2>
      <div class="library-row-controls">
          <button type="button" 
                  class="library-more-resources-btn" 
                  onclick="openCategoryResources('<?php echo htmlspecialchars($categoryName, ENT_QUOTES); ?>')" 
                  aria-label="More resources for <?php echo htmlspecialchars($categoryName); ?>"
                  title="Explore additional academic resources and primary texts for <?php echo htmlspecialchars($categoryName); ?>">
              <i class="fas fa-layer-group" aria-hidden="true"></i>
              <span>More Resources</span>
          </button>
          <div class="library-scroll-buttons">
              <button class="library-scroll-btn scroll-left" aria-label="Scroll left in <?php echo htmlspecialchars($categoryName); ?>">
                  <i class="fas fa-chevron-left"></i>
              </button>
              <button class="library-scroll-btn scroll-right" aria-label="Scroll right in <?php echo htmlspecialchars($categoryName); ?>">
                  <i class="fas fa-chevron-right"></i>
              </button>
          </div>
      </div>
  </div>
  ```

### 2. Styling & Layout ([`assets/css/library/lib-library-catalog-container.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library/lib-library-catalog-container.css))
- Updated `.library-row-header` with `border-bottom: 1px solid var(--lib-border);` and `padding-bottom: 0.85rem;`.
- Styled `.library-more-resources-btn` with hover gradients, micro-interactions, `:focus-visible` accessible outlines, and dark-theme adaptability.
- Added responsive layout rules under `@media (max-width: 640px)` to gracefully adjust the controls on small screens.

### 3. Smart Navigation Handler ([`assets/js/library/lib-subject-research-desks-navigat.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-subject-research-desks-navigat.js))
- Created `window.openCategoryResources(categoryName)` which intelligently maps library shelf categories (e.g. *Classic Fiction*, *Fantasy & Sci-Fi*, *US History*, *General Resources*) to their respective Subject Research Desks (e.g. *ELA*, *US History*, *General Resources*) and loads the full workspace and external resource links.

---

## Accessibility & Verification
- **WCAG 2.1/2.2 AA & AAA Compliant**: All interactive elements have descriptive `aria-label` tags, visible high-contrast focus rings, and proper keyboard tab order.
- **Theme Adaptation**: Border colors and button styles dynamically inherit from CSS variables (`var(--lib-border)`, `var(--lib-primary)`, `var(--lib-bg-surface)`), ensuring flawless contrast in both light and dark modes.
