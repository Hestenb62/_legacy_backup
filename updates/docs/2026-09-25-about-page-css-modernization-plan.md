---
title: "About Page CSS Modernization & Design System Alignment Plan"
date: "2026-09-25"
category: "Implementation Plan"
tags: ["CSS", "About Us", "Design System", "A11y", "Responsive"]
summary: "Plan for modernizing the About Us page with dedicated Vanilla CSS, glassmorphic feature cards, platform impact stats, founder and mission spotlights, and full WCAG/UDL compliance."
author: "Antigravity & Hesten"
---

# About Page CSS Modernization & Design System Alignment Plan

## 1. Overview
The current About Us page (`pages/about.php`) uses outdated placeholder layout structures without a dedicated stylesheet, lacks the platform footer include, and misses key WCAG landmarks (`id="main-content"`). This initiative upgrades `pages/about.php` with a bespoke, responsive Vanilla CSS stylesheet (`assets/css/pages/about.css`), incorporating rich glassmorphic cards, platform impact metrics, interactive values showcase, founder spotlight, and seamless dark-mode and accessibility support.

## 2. Goals & Objectives
1. **Dedicated Stylesheet (`about.css`)**: Build a modular, theme-reactive stylesheet using CSS tokens (`--color-primary`, `--color-bg-surface`, `--glass-bg`, etc.).
2. **Feature Grid & Values Showcase**:
   - Platform impact stats bar (100% WCAG/UDL compliant, Research-backed, Community-centered).
   - Mission & Vision spotlight card bridging to `pages/mission.php`.
   - Founder spotlight card highlighting Hesten Allison and linking to `pages/about-me.php`.
   - Core Values interactive grid with icon badges and subtle micro-interactions.
   - Streamlined Team & History narrative cards.
   - Contact CTA card with direct email and link to `/pages/contact.php`.
3. **Accessibility & WCAG Compliance**:
   - Add `id="main-content"` for the skip navigation link.
   - Minimum 4.5:1 text contrast in light and dark modes (7:1 in high contrast).
   - High-contrast `:focus-visible` rings on all interactive elements.
   - Fully user-scalable and reflowing without horizontal overflow down to 320px width.
4. **Structural & Layout Fixes**:
   - Link `assets/css/pages/about.css` via `assetVersion()`.
   - Append `include '../src/footer.php';` to properly close the HTML structure and load global sync scripts.

## 3. Implementation Steps
- **Step 1**: Create `assets/css/pages/about.css` with layer structure, token variables, glassmorphism, responsive grid, dark mode overrides, and print styles.
- **Step 2**: Update `pages/about.php` with the modern markup, linking the stylesheet, fixing missing landmark IDs, and including `footer.php`.
- **Step 3**: Verify visual rendering, contrast, accessibility landmarks, and responsive breakpoints.
- **Step 4**: Produce the walkthrough log in `updates/docs/2026-09-25-about-page-css-modernization-walkthrough.md`.
