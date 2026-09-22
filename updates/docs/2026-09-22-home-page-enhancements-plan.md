---
title: "Home Page Enhancements: Learning Launchpad, Modern Aesthetics & Student Personalization"
date: "2026-09-22"
category: "Implementation Plan"
tags: ["Home Page", "Launchpad", "Aesthetic", "Personalization", "WCAG"]
summary: "Detailed plan for elevating the Hesten's Learning landing page with a 5-tool quick launchpad, personalized student hero and mastery progress, and modern glassmorphic aesthetics."
author: "Antigravity & Hesten"
---

# Home Page Enhancements: Learning Launchpad, Modern Aesthetics & Student Personalization

This plan details the implementation of three major improvements for the Hesten's Learning home page (`index.php`):
1. **The Learning Launchpad** (Area 1): A quick-access hub for core tools (Library, Flashcard Studio, Sensory Chamber, Scratchpad, Diagnostic Assessment).
2. **Hero & Aesthetic Modernization** (Area 4): Polished glassmorphism, dynamic animated counters, ambient glowing accents, and motion safety.
3. **Student Profile Personalization** (Area 3): Dynamic first-name greeting, avatar badge, "Jump to My Grade" shortcut, and grade-card mastery progress bars powered by `hesten-user-profile` and `hesten_standards_mastery`.

---

## User Review Required

> [!IMPORTANT]
> - **Learning Tools Placement**: The new **Learning Launchpad** will sit right below the Hero section and above the Learning Streak widget, providing immediate access to flagship tools.
> - **Tripartite Data Adherence**: Personalization strictly adheres to existing canonical keys (`hesten-user-profile`, `hl_gamification_profile`, `hesten_standards_mastery`) with zero breaking changes for existing users.
> - **A11y & Reduced Motion**: All animations (aurora blobs, counter rollups, card glows) respect `prefers-reduced-motion` and the Sensory Retreat accommodation.

---

## Proposed Changes

### Component 1: Learning Launchpad (`src/partials/learning-launchpad.php` & CSS)

#### [NEW] `src/partials/learning-launchpad.php`
- Creates a modern, glassmorphic 5-tile quick launcher for essential interactive study tools (excluding Library which is already in the site header):
  1. 🗂️ **Flashcard Studio**: Interactive button invoking `window.toggleFlashcardStudio()`.
  2. 🧘 **Sensory Chamber**: Low-stimulation calm reset invoking `window.SensoryChamber.open()`.
  3. 📝 **Interactive Scratchpad**: Interactive button invoking `scratchpad-toggle`.
  4. ⏱️ **Focus & Study Timer**: Interactive button invoking `window.toggleStudyTimer()`.
  5. 🎯 **Diagnostic Assessment**: Adaptive skill evaluation at `/assessment/index.php`.
- Full WCAG semantic structure with `role="region"`, `aria-label="Learning Launchpad"`, and keyboard shortcuts.

#### [NEW] `assets/css/components/learning-launchpad.css`
- Curated color tokens, glassmorphic panel styling (`backdrop-filter: blur(20px)`), glowing hover state, and responsive reflow down to mobile screens (320px).

---

### Component 2: Hero & Aesthetic Modernization (`src/partials/hero.php` & `hero.css`)

#### [MODIFY] `src/partials/hero.php`
- Enhance the Aurora hero with a skip link to the academic grid (`#level-grid`).
- Upgrade hero quick stats into dynamic glass cards:
  - **Overall Mastery %** with animated counter.
  - **Active Streak** with animated flame.
  - **Standards Mastered** counter (reading `hesten_standards_mastery`).
  - **Student Level & XP** badge (reading `hesten-user-profile` / `hl_gamification_profile`).
- Add a personalized student pill and secondary CTA: **"Jump to My Grade"** when an enrolled grade is found.

#### [MODIFY] `assets/css/components/hero.css`
- Add sleek glass styling, ambient gradient glows, high-contrast borders, and accessibility focus rings.
- Ensure reduced-motion media query disables floating blob parallax and pulsing effects.

---

### Component 3: Student Profile Personalization & Card Mastery (`index-main.js` & `index.php`)

#### [MODIFY] `index.php`
- Include the new `learning-launchpad.php` partial between the Hero and the Main Content.
- Link the new `learning-launchpad.css` stylesheet via `assetVersion()`.

#### [MODIFY] `assets/js/index-main.js`
- **Dynamic Profile Greeting**: Update `updateHeroGreeting()` to read `hesten-user-profile` and greet the student by name (e.g., *"Welcome back, Jordan!"*) and display their grade and level.
- **"Jump to My Grade" Action**: Implement `jumpToEnrolledGrade()` which scrolls smoothly to the student's grade card and triggers a brief visual highlight ring.
- **Grade-Card Mastery Progress**: In `renderLevels()`, calculate standards mastered per grade from `hesten_standards_mastery` and render a progress bar on the card (e.g., *"14 / 22 Standards Mastered"*).
- **Animated Stat Rollup**: Animate numbers when the page loads for a smooth, rewarding feel.
- **Event Listeners**: Listen to `hl:profile-updated`, `hl:data-sync`, and `storage` events to update stats in real time.

---

## Verification Plan

### Automated / Syntax Verification
- Run PowerShell linter / syntax checks on modified PHP and JS files to verify zero errors:
  ```powershell
  php -l index.php
  php -l src/partials/hero.php
  php -l src/partials/learning-launchpad.php
  node -c assets/js/index-main.js
  ```

### Manual & Interactive Verification
1. **Launchpad Verification**:
   - Verify all 5 launchpad tiles render cleanly with appropriate icons, colors, and badges.
   - Click "Flashcard Studio" -> confirms modal opens.
   - Click "Sensory Chamber" -> confirms calming sensory overlay opens.
   - Click "Scratchpad" -> confirms scratchpad canvas opens.
   - Click "Library" -> navigates to `/library/index.php`.
   - Click "Diagnostic" -> navigates to `/assessment/index.php`.
2. **Personalization Verification**:
   - Test default state (no student profile in localStorage): displays standard odyssey greeting and general stats.
   - Test personalized state (set mock profile: `{ firstName: "Alex", grade: "grade-3", xp: 450, level: 2 }`):
     - Displays personalized greeting in hero pill and title.
     - "Jump to My Grade" button appears; clicking it smoothly scrolls to "Grade 3".
     - Grade 3 card shows enrolled badge and calculated mastery progress.
3. **Aesthetic & WCAG Verification**:
   - Check contrast in Light, Dark, and Midnight themes.
   - Verify keyboard `Tab` navigation through hero skip links, CTA buttons, and Launchpad tiles.
   - Check responsive reflow on mobile viewport (320px).
