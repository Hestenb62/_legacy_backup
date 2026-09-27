---
title: "Theme Color Customization & Palette Selection Plan"
date: "2026-09-26"
category: "Implementation Plan"
tags: ["Accessibility", "Settings", "Design System", "Themes", "WCAG", "CSS Variables"]
summary: "Plan for enabling users to customize site theme colors and choose from curated color palettes in the settings page, with real-time preview, FOUC-prevention, and WCAG contrast validation."
author: "Antigravity & Hesten"
---

# Theme Color Customization & Palette Selection Plan

## Objective
Enable students, teachers, and parents to customize the site's primary, secondary, and accent theme colors from the Accessibility & Preferences Settings page (`/pages/settings.php`). The system will provide curated accessible color palette presets, fine-grained custom color pickers, real-time live preview with WCAG AA/AAA contrast feedback, zero-flash instant page rendering (`src/header.php`), and cross-tab/cloud synchronization (`assets/js/global-a11y.js`).

---

## Architectural Analysis & Invariants

1. **CSS Custom Properties Foundation**:
   - `assets/css/global-tokens.css` governs `--color-primary`, `--color-primary-hover`, `--color-secondary`, `--color-secondary-hover`, `--color-accent`, `--color-accent-hover`, and `--color-link`.
   - Custom theme colors dynamically override these tokens via inline document root properties (`document.documentElement.style.setProperty`).

2. **Zero-Flash Execution (FOUC Prevention)**:
   - Early execution in `<head>` of `src/header.php` reads `hl_accessibility_settings` from `localStorage` and immediately applies theme color overrides before DOM/CSS rendering.
   - For High Contrast mode (`theme === 'high-contrast'`), custom colors yield to high-contrast invariants (`#ffff00`, `#00ffff`, `#ff00ff` on `#000000`).

3. **Curated Accessible Palettes**:
   - **Indigo Classic (Default)**: Primary `#4f46e5`, Secondary `#ec4899`, Accent `#06b6d4`
   - **Ocean Sapphire**: Primary `#0284c7`, Secondary `#0d9488`, Accent `#38bdf8`
   - **Emerald Forest**: Primary `#059669`, Secondary `#0284c7`, Accent `#10b981`
   - **Sunset Amber**: Primary `#ea580c`, Secondary `#db2777`, Accent `#f59e0b`
   - **Royal Amethyst**: Primary `#7c3aed`, Secondary `#db2777`, Accent `#c084fc`
   - **Crimson Ruby**: Primary `#e11d48`, Secondary `#7c3aed`, Accent `#fb7185`
   - **Teal Wave**: Primary `#0d9488`, Secondary `#4f46e5`, Accent `#14b8a6`
   - **Cyber Neon**: Primary `#2563eb`, Secondary `#f43f5e`, Accent `#06b6d4`

4. **Custom Color Pickers & Contrast Engine**:
   - Native `<input type="color">` pickers synchronized with hexadecimal inputs.
   - Dynamic luminance and contrast calculator against current theme background.
   - Real-time indicator displaying WCAG AA compliance (4.5:1 ratio threshold).
   - "Reset to Theme Default" button to cleanly clear custom overrides.

5. **State Synchronization**:
   - Persisted in `hl_accessibility_settings`.
   - Dispatches `settings-changed`, `hl:data-sync`, and triggers screen reader announcement via `announceA11y`.
   - Reflected dynamically in the Live Preview card in `pages/settings.php` and quick panel in `src/partials/a11y-settings.php`.

---

## Action Items

- [ ] **1. Extend Header Immediate Loader (`src/header.php`)**:
  - In the inline head script, read `primaryColor`, `secondaryColor`, `accentColor`, `primaryHover`, `secondaryHover`, `accentHover` and apply them directly to `document.documentElement.style`.

- [ ] **2. Upgrade Global Accessibility Engine (`assets/js/global-a11y.js`)**:
  - Add `themeColorPreset`, `primaryColor`, `secondaryColor`, `accentColor`, `primaryHover`, `secondaryHover`, `accentHover` to `defaultSettings`.
  - Update `applySettings(s)` to handle custom colors and hover derivations (or clear them if reset).
  - Add helper functions: `updateThemeColors(presetKey, primary, secondary, accent)`, `resetThemeColors()`, `adjustBrightness(hex, percent)`.
  - Add `loadSettings()` helper to `window`.

- [ ] **3. Update Settings Page UI & Live Preview (`pages/settings.php`)**:
  - Add "Theme Color Palette" card grid to the Visuals & Themes section.
  - Add "Custom Theme Colors" panel with color pickers, hex inputs, and reset button.
  - Add real-time contrast ratio readout with WCAG AA badge.
  - Update Live Preview sidebar to show themed button, badge, tag, and link.
  - Update `syncPageUI(s)` to reflect selected preset and custom color inputs.

- [ ] **4. Add Styling in Settings Stylesheet (`assets/css/pages/settings.css`)**:
  - Define styles for palette cards, swatch circles, color picker inputs, and contrast badge.

- [ ] **5. Verification & Testing**:
  - Test selecting presets and verifying instant CSS variable update.
  - Test picking custom hex colors and checking contrast badge.
  - Test resetting to defaults.
  - Test page reload to ensure zero flash of default colors.
  - Test across themes (Light, Dark, Midnight, Sepia, High Contrast).
  - Validate keyboard navigation, focus visible rings, and screen reader announcements.
