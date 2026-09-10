---
title: "Bugfix: Resolve Display Invisibility on Disclaimer General Terms Tab"
date: "2026-09-10"
category: "Bugfix"
tags: ["Library", "Modals", "CSS", "JavaScript", "Bugfix"]
summary: "Fixed an issue where the General Terms & Full License tab appeared empty when clicked due to the .hidden CSS !important override and unremoved class names during tab switching."
author: "Antigravity & Hesten"
---

# Bugfix: Resolve Display Invisibility on Disclaimer General Terms Tab

## Root Cause
1. In [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php), `#disclaimer-standard-view` had the CSS class `class="library-disclaimer-body-box hidden"`.
2. Global styles in [`assets/css/global-primitives.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-primitives.css) declare `.hidden { display: none !important; }`.
3. In [`assets/js/library/lib-explainer.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-explainer.js), `switchDisclaimerTab('standard')` set `stdView.style.display = 'block'` but did not remove the `hidden` class from `stdView`. As a consequence, `display: none !important` overrode the inline style, preventing the General Terms and Full Gutenberg License view from ever rendering on screen.

## Resolution
1. **Removed `.hidden` from HTML**: In [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php), removed `hidden` from `#disclaimer-standard-view` so its initial visibility is controlled cleanly via `style="display: none;"`.
2. **Updated Tab Switching Logic**: In [`assets/js/library/lib-explainer.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/library/lib-explainer.js), updated `switchDisclaimerTab(tab)` to explicitly call `stdView.classList.remove('hidden')` and `licView.classList.add('hidden')` (and vice-versa), while simultaneously updating `style.display = 'block'|'none'` and `aria-selected` attributes.
3. The General Terms & Full Gutenberg License view now renders immediately and completely when selecting the tab.
