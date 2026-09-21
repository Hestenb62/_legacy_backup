---
title: "Implementation Plan: Comprehensive Home Page Overhaul"
date: "2026-09-20"
category: "Implementation Plan"
tags: ["Home Page", "UX", "A11y", "UDL", "Personalization", "Tripartite Role Sync"]
summary: "Comprehensive architectural and UI implementation plan to modernize the home page with student personalization, tripartite role gateways, unified streak tracking, bookmarked/in-progress filters, and full WCAG AAA/UDL accessibility."
author: "Antigravity & Hesten"
---

# Implementation Plan: Comprehensive Home Page Overhaul

Transform the Hesten's Learning home page into a personalized, role-adaptive, fully accessible, and engaging educational gateway. This overhaul unifies progress and streak tracking across the platform, introduces direct on-ramps for Students, Parents, and Educators, adds bookmarked and in-progress filtering, implements strict WAI-ARIA tab navigation, and integrates daily quest motivation while honoring Universal Design for Learning (UDL) and WCAG 2.2 AAA standards.

## User Review Required

> [!IMPORTANT]
> **Tripartite Role Portals Placement**: A new partial `src/partials/role-portals.php` will be introduced in `index.php` directly beneath the Aurora Hero section. It provides prominent, glassmorphic launchpads for **Students** (`/student/index.php`), **Parents & Caregivers** (`/pages/parents.php`), and **Educators** (`/pages/teachers.php`).
>
> **Filter Categories Expansion**: The Academic Path filter tabs will now include **"⭐ Saved"** (bookmarked levels) and **"In Progress"**, allowing students and teachers to instantly view active or saved grade pathways.
>
> **Streak & Progress Unification**: Hero stats and the Daily Goal widget will both utilize the canonical key `hesten_learning_streak`, resolving the previous mismatch between `hl_streak` and `hesten_learning_streak`.

## Proposed Changes

### 1. Hero Personalization & Motion Safety

#### [MODIFY] `src/partials/hero.php`
- Add student profile greeting container and optional 1-click grade-jump button (`#hero-grade-jump`).
- Wrap the mouse parallax script in `window.matchMedia('(prefers-reduced-motion: reduce)')` checks and throttle updates with `requestAnimationFrame`.
- Ensure `#streak-stat` synchronizes with the canonical streak data.

---

### 2. Role-Based Quick Launch Gateway

#### [NEW] `src/partials/role-portals.php`
- Create a modern, responsive 3-column glassmorphism gateway:
  1. **Student Hub**: Quests, badges, interactive labs, study tools (`/student/index.php`).
  2. **Parent Portal**: Accommodations engine, sensory chamber, learning schedule, IEP/504 support (`/pages/parents.php`).
  3. **Educator Dashboard**: Standards mastery matrix, diagnostic dossiers, classroom roster (`/pages/teachers.php`).
- Fully accessible semantic structure with keyboard focus states and ARIA descriptions.

#### [NEW] `assets/css/components/role-portals.css`
- Implement modern glassmorphic styles with CSS custom property theming, responsive breakpoints (desktop, tablet, mobile), hover micro-interactions, and high-contrast `:focus-visible` rings.

#### [MODIFY] `assets/css/global-components.css`
- Import `components/role-portals.css` into the components layer.

#### [MODIFY] `index.php`
- Include `src/partials/role-portals.php` between the hero and the main content container.

---

### 3. Academic Path & Filter Enhancements

#### [MODIFY] `src/partials/academic-path-header.php`
- Add **"⭐ Saved"** (`bookmarked`) and **"In Progress"** (`in-progress`) tabs.
- Add roving `tabindex="0"` for active tab, `tabindex="-1"` for inactive tabs.
- Add corresponding options to the mobile `<select>`.

#### [MODIFY] `assets/js/index-main.js`
- **Filter Logic**: Enhance `applyFilters()` to handle `currentCategory === 'bookmarked'` and `currentCategory === 'in-progress'`.
- **Keyboard ARIA Navigation**: Implement `keydown` event listener for `.path-tab` (`ArrowRight`, `ArrowLeft`, `Home`, `End`) with automatic focus shifting and roving `tabindex`.
- **Personalized Greeting**: Update `updateHeroGreeting()` to read `hesten-user-profile` (e.g. `firstName`, `grade`) and display a welcoming personalized message and dynamic grade jump button.
- **Streak & Stats Sync**: Unify `checkStreak()` to read and write to canonical `hesten_learning_streak`, ensuring `#streak-stat` and `#home-streak-count` always match.
- **Audio Feedback State**: Enhance `speakCard()` to toggle playing/stopped state with visual indicator on the button.
- **Cleanup**: Remove orphaned reference to `#hero-search`.

---

### 4. Streak Widget & Daily Challenge Preview

#### [MODIFY] `src/partials/learning-streak.php`
- Integrate a mini "Today's Quest" or "Daily Brain Boost" teaser connected with `assets/js/gamification/daily-quests.js`.
- Ensure real-time broadcast of streak updates to the hero stats card.

---

## Verification Plan

### Automated / Syntax Verification
- Run syntax checks on all modified PHP files:
  ```powershell
  php -l index.php
  php -l src/partials/hero.php
  php -l src/partials/role-portals.php
  php -l src/partials/academic-path-header.php
  php -l src/partials/learning-streak.php
  ```
- Run linter / node syntax checks on JavaScript files:
  ```powershell
  node -c assets/js/index-main.js
  ```

### Manual Verification
1. **Personalization**: Test with and without `hesten-user-profile` in `localStorage` to verify the personalized greeting vs. default greeting.
2. **Role Portals**: Verify that clicking each portal navigates to the correct hub and keyboard tab focus outlines are clearly visible.
3. **Saved & In-Progress Filtering**: Bookmark a level, mark another complete, and toggle "⭐ Saved" and "In Progress" tabs to confirm correct filtering and count displays.
4. **Keyboard Accessibility**: Use `Tab`, `ArrowLeft`, `ArrowRight`, `Home`, `End` to navigate the filter tabs. Verify that screen readers announce selected states correctly.
5. **Reduced Motion**: Emulate `prefers-reduced-motion: reduce` in browser devtools and confirm parallax motion in the hero is disabled.
6. **Streak Consistency**: Verify that the streak in the hero glass card and in the learning streak widget show identical values.
