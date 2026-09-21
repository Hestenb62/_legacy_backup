---
title: "Walkthrough: Home Page Enhancements (Saved Cards First & Hero Overhaul)"
date: "2026-09-20"
category: "Walkthrough"
tags: ["Home Page", "UX", "A11y", "UDL", "Personalization", "Saved Cards"]
summary: "Home page modernization featuring saved cards sorted to the front of the learning grid, personalized student hero greetings, motion safety, and unified streak tracking."
author: "Antigravity & Hesten"
---

# Walkthrough: Home Page Enhancements (Saved Cards First & Hero Overhaul)

Based on your design feedback, the home page enhancements have been adjusted to keep the layout focused and streamlined:
1. **Omitted Role Portals Section**: Kept the home page direct and uncluttered without the 3-portal section.
2. **Preserved Clean Path Tabs**: Maintained the standard 5-tab filter set (`All`, `Elementary`, `Middle`, `High`, `Extra`).
3. **Saved Cards Show First**: Bookmarked levels automatically float to the top of the learning grid with an amber highlight and a `⭐ Saved` pin badge. When any level is bookmarked or unbookmarked, the grid smoothly re-sorts so saved cards always lead the journey.
4. **Personalized Hero & Motion Safety**: Personalized student greeting from `hesten-user-profile`, 1-click grade resume button, and `prefers-reduced-motion` cursor parallax safety.
5. **Unified Daily Streak Tracking**: Synchronized the streak stat in the hero glass card with the daily learning streak widget via canonical key `hesten_learning_streak`, with a quick-launch to **Today's Quests**.

---

## Key Changes

### 1. Saved Cards Show First
- **`assets/js/index-main.js`**:
  - In `renderLevels(data)`, the level array is sorted so that levels present in `bookmarkedLevels` are placed at the beginning of the grid while maintaining their curriculum sequence within groups.
  - In `toggleBookmark(id, btn)`, toggling a bookmark immediately calls `renderLevels(learningLevels)` to re-order the cards in real time.
  - Added `.level-card-saved` class and `<span class="level-saved-pin"><i class="fas fa-star"></i> Saved</span>` badge to bookmarked cards.
- **`assets/css/components/level-card.css`**:
  - Styled `.level-card-saved` with an ambient amber glow and border highlight.
  - Styled `.level-saved-pin` pill badge with light and dark mode adaptations.

### 2. Personalized Hero Greeting & Reduced-Motion Safety
- **`src/partials/hero.php`**:
  - Greet student by first name from `hesten-user-profile`.
  - Added dynamic `#hero-grade-jump` button that jumps straight to the student's active grade.
  - Parallax mousemove animation respects `window.matchMedia('(prefers-reduced-motion: reduce)')` and uses `requestAnimationFrame`.

### 3. Unified Streak Tracking & Daily Quests
- **`src/partials/learning-streak.php`**:
  - Synchronized streak number across hero card and daily widget using `hesten_learning_streak`.
  - Added **"Today's Quests"** button in the action box linking directly to student quests.

---

## Verification Results

### Automated Syntax Checks
```powershell
& "C:\xampp\php\php.exe" -l index.php
& "C:\xampp\php\php.exe" -l src/partials/hero.php
& "C:\xampp\php\php.exe" -l src/partials/academic-path-header.php
& "C:\xampp\php\php.exe" -l src/partials/learning-streak.php
```
**Result**:
- `No syntax errors detected in index.php`
- `No syntax errors detected in src/partials/hero.php`
- `No syntax errors detected in src/partials/academic-path-header.php`
- `No syntax errors detected in src/partials/learning-streak.php`

```powershell
node -c assets/js/index-main.js
```
**Result**: Clean compilation with exit code 0.
