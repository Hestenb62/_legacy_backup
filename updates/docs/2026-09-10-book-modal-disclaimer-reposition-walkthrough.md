---
title: "Walkthrough: Relocate Sourcing & Content Disclaimer Under Book Actions"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Library", "Modals", "UI Polish", "Accessibility"]
summary: "Moved the Sourcing & Content Disclaimer trigger from the right-hand info pane footer to sit neatly centered directly beneath the 'Save to List' and 'Cite Book' buttons in the cover pane."
author: "Antigravity & Hesten"
---

# Walkthrough: Relocate Sourcing & Content Disclaimer Under Book Actions

## Overview
In the Book Overview modal, the "Sourcing & Content Disclaimer" button previously sat at the bottom of the right-hand details pane under the Read Online and download buttons. The user requested moving it directly under the "Save to List" and "Cite Book" buttons in the left cover pane to balance the layout and fill that section naturally.

---

## Changes Made

### 1. Modal Markup (`library/modals.php`)
- **Relocated Disclaimer Element**: Moved `.library-modal-disclaimer-row` out of `.library-modal-footer-section` in the details pane and placed it directly inside `.library-modal-cover-pane` immediately following `.library-modal-cover-actions`.
- **Accessibility**: Preserved standard `type="button"`, semantic accessible icon, descriptive label, and `onclick="openDisclaimerModal()"`.

### 2. Styling & Layout (`assets/css/library/lib-modals.css`)
- **Container Sizing**: Set `width: 100%; max-width: 200px;` so the disclaimer row aligns with the cover action buttons and cover image.
- **Visual Separation**: Added a subtle top border separator (`border-top: 1px solid var(--lib-border)`) and centered layout (`display: flex; justify-content: center;`).
- **WCAG Compliance**: Added high-contrast `:focus-visible` focus ring (`outline: 2px solid var(--lib-primary); outline-offset: 2px;`) and smooth hover styling.
