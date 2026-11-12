---
title: "Cerebral Palsy Toolkit Law Firm Disclosure (i) Icon & Popover Walkthrough"
date: "2026-11-11"
version: "v2.38.3"
category: "Walkthrough"
tags: ["Parent Hub", "Community Hub", "Cerebral Palsy", "Disclosure Popover", "Accessibility", "A11y"]
summary: "Added an accessible corner (i) information disclosure button and modal popover on the Cerebral Palsy Toolkit card in both the Parent Hub and Community Hub to transparently identify Levin & Perconti Law Firm as the provider."
author: "Antigravity & Hesten"
---

# Cerebral Palsy Toolkit Law Firm Disclosure (i) Icon & Popover Walkthrough

## Executive Summary
In response to community transparency standards and user feedback, we implemented a corner **`(i)` information disclosure button** and **accessible popover** on the Cerebral Palsy Toolkit card across both the **Parent Hub** ([`pages/parents.php`](/pages/parents.php)) and the **Community Hub** ([`pages/community.php`](/pages/community.php)).

The disclosure clarifies to families and educators that while the guide provides helpful resources on Section 504 / IEP school accommodations, therapies, and assistive technology, it is published and provided by **Levin & Perconti**, a personal injury and medical malpractice law firm.

---

## 1. UI & Visual Implementation

### Corner `(i)` Trigger Button
- **Placement**: Positioned in the top-right corner of the Cerebral Palsy Toolkit card (`top: 0.65rem; right: 0.65rem; z-index: 15`).
- **Affordance**: Circular pill button with a centered info icon (`<i class="fas fa-info"></i>`).
- **Interaction Styling**: Transitions smoothly to high-contrast rose (`#e11d48`) on `:hover`, `:focus-visible`, and when open (`aria-expanded="true"`), with a prominent focus glow ring.

### Disclosure Popover Card
- **Layout & Positioning**: Appears directly below the trigger icon with smooth fade-in animation (`animation: resourceDisclosureFadeIn 0.18s ease-out`).
- **Content Structure**:
  1. **Category Badge**: `<span class="resource-disclosure-badge"><i class="fas fa-balance-scale"></i> Law Firm Resource</span>`
  2. **Close Button**: Accessible `&times;` button to dismiss the popover.
  3. **Body Disclosure**: *"This educational guide and toolkit is provided by **Levin & Perconti**, a personal injury and medical malpractice law firm."*
  4. **Sub-Note**: Highlights coverage of Section 504 / IEP accommodations, special education rights, assistive technology, and family therapies.
- **Card-Level Link Independence**: Clicking the `(i)` button or inside the disclosure popover stops event propagation, preventing unwanted navigation to the external URL while allowing the rest of the card to remain clickable.

---

## 2. Interaction & Keyboard Accessibility (WCAG 2.1 AA/AAA)

| Feature | Behavior |
| :--- | :--- |
| **Mouse / Touch Toggle** | Clicking the `(i)` button toggles the popover open/closed. |
| **Keyboard Operability** | Focusable via `Tab`; toggled via `Enter` or `Space`. |
| **Escape Key Dismissal** | Pressing `Esc` immediately closes the popover and restores keyboard focus to the `(i)` trigger button. |
| **Click-Outside Dismissal** | Clicking anywhere outside the `.resource-disclosure-wrap` dismisses open popovers automatically. |
| **Screen Reader Semantics** | Semantic `aria-haspopup="dialog"`, `role="dialog"`, `aria-labelledby`, and `aria-expanded="true/false"`. |
| **High Contrast Mode** | Explicit overrides for `data-theme="high-contrast"` ensuring a minimum 7:1 contrast ratio with high-visibility borders and gold accent highlights. |
| **Reflow / Mobile 320px** | Constrained to `max-width: min(270px, calc(100vw - 32px))` preventing horizontal scrollbars on mobile viewports. |

---

## 3. Files Modified
- [`assets/js/core/global-standard.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/core/global-standard.js): Added global `toggleResourceDisclosure`, `closeResourceDisclosure`, click-outside dismiss, and `Esc` key listeners.
- [`assets/css/pages/parents.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/parents.css): Added `.resource-disclosure-*` component styling and High Contrast theme rules.
- [`assets/css/pages/community.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/community.css): Added `.resource-disclosure-*` component styling and High Contrast theme rules.
- [`pages/parents.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php): Updated Card 6 to include the corner disclosure trigger and popover dialog.
- [`pages/community.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/community.php): Updated Card 10 to include the corner disclosure trigger and popover dialog.
- [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php): Bumped version to `v2.38.3`.
- [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php): Bumped fallback version to `v2.38.3` and updated What's New modal release notes.

