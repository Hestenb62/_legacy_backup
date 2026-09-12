---
title: "Bugfix: AccommodationEngine setAccommodation TypeError Resolution"
date: "2026-09-11"
category: "Bugfix"
tags: ["Accessibility", "A11y", "Accommodation Engine", "JavaScript", "Bugfix", "Defensive Programming"]
summary: "Resolved runtime TypeError (ERR-EA640B-2CBF78) where window.accommodationEngine.setAccommodation was undefined when setting reading ruler height and dim opacity in global-a11y.js, adding the setAccommodation method to AccommodationEngine and implementing defensive fallback handling."
author: "Antigravity & Hesten"
---

# Bugfix: AccommodationEngine setAccommodation TypeError Resolution

## Error Diagnosis
- **Error**: `Uncaught TypeError: window.accommodationEngine.setAccommodation is not a function`
- **Error Code**: `ERR-EA640B-2CBF78`
- **Location**: `global-a11y.js:121:36`
- **Root Cause**:
  When users adjusted reading ruler controls (such as toggling `readingRuler`, adjusting `rulerHeight`, or modifying `rulerDimOpacity`) via the Accessibility Hub, the global settings updater attempted to synchronize state via:
  ```javascript
  window.accommodationEngine.setAccommodation('rulerHeight', parseInt(value, 10));
  ```
  However, while the `AccommodationEngine` class supported preset toggles (`setPreset`), soundscapes (`setSoundscape`), and ruler toggles (`toggleRuler`), it lacked a generic `setAccommodation(key, value)` method. Consequently, whenever `rulerHeight` or `rulerDimOpacity` was updated in the accessibility settings, invoking `setAccommodation` threw an unhandled `TypeError`.

---

## Technical Remediation Applied

### 1. Added `setAccommodation()` to AccommodationEngine ([`assets/js/accessibility/accommodation-engine.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/accessibility/accommodation-engine.js))
- Implemented `setAccommodation(key, value)` directly on the `AccommodationEngine` class:
  ```javascript
  setAccommodation(key, value) {
    if (!this.profile) this.profile = Object.assign({}, defaultProfile);

    // Support alternative and alias property keys
    if (key === 'readingRuler') key = 'rulerEnabled';
    if (key === 'bionicReading') key = 'bionicEnabled';
    if (key === 'dyscalculia') key = 'dyscalculiaEnabled';
    if (key === 'colorTint') key = 'tintEnabled';

    if (key in this.profile) {
      this.profile[key] = value;
      this.saveProfile();
    }
  }
  ```
- Enhanced `saveProfile()` to dispatch `hl:accommodations-updated` with the updated profile object so all accessibility panels and listeners across the site stay synchronized.

### 2. Hardened Calling Site in Global Accessibility Controller ([`assets/js/global-a11y.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-a11y.js))
- Wrapped the synchronization in defensive checks verifying that `typeof window.accommodationEngine.setAccommodation === 'function'`.
- Added a fallback directly mutating `window.accommodationEngine.profile` and triggering `saveProfile()` if `setAccommodation` is not present, completely eliminating any possibility of a runtime crash:
  ```javascript
  if (window.accommodationEngine) {
      if (typeof window.accommodationEngine.setAccommodation === 'function') {
          if (key === 'readingRuler') {
              window.accommodationEngine.setAccommodation('rulerEnabled', !!value);
          } else if (key === 'rulerHeight') {
              window.accommodationEngine.setAccommodation('rulerHeight', parseInt(value, 10));
          } else if (key === 'rulerDimOpacity') {
              window.accommodationEngine.setAccommodation('rulerDimOpacity', parseFloat(value));
          }
      } else if (window.accommodationEngine.profile) {
          if (key === 'readingRuler') {
              window.accommodationEngine.profile.rulerEnabled = !!value;
          } else if (key === 'rulerHeight') {
              window.accommodationEngine.profile.rulerHeight = parseInt(value, 10);
          } else if (key === 'rulerDimOpacity') {
              window.accommodationEngine.profile.rulerDimOpacity = parseFloat(value);
          }
          if (typeof window.accommodationEngine.saveProfile === 'function') {
              window.accommodationEngine.saveProfile();
          }
      }
  }
  ```

---

## Verification & Automated Testing

1. **Syntax Verification**:
   - `node -c assets/js/global-a11y.js assets/js/accessibility/accommodation-engine.js` &rarr; **Pass** (Exit Code `0`).

2. **Automated Unit Testing** (`scratch/test_accommodation_engine.js`):
   - Verified `engine.setAccommodation('rulerEnabled', true)` &rarr; `rulerEnabled === true`.
   - Verified `engine.setAccommodation('rulerHeight', 75)` &rarr; `rulerHeight === 75`.
   - Verified `engine.setAccommodation('rulerDimOpacity', 0.6)` &rarr; `rulerDimOpacity === 0.6`.
   - Verified alias mapping for `readingRuler` &rarr; `rulerEnabled`.
   - Verified `testGlobalA11yUpdate` fallback execution when `setAccommodation` is missing.
   - Verified resilience when `window.accommodationEngine` is null/undefined.
   - Test suite passed with **0 errors**.
