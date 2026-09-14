---
title: "Standards Explorer Cleanup: Removal of Inline Practice and Lesson Buttons"
date: "2026-09-14"
category: "Walkthrough"
tags: ["Standards", "UI", "A11y", "Navigation"]
summary: "Removed inline 'Practice' and 'Lesson' action buttons from standard items in pages/standards.php for a cleaner, distraction-free standards matrix."
author: "Antigravity & Hesten"
---

# Standards Explorer Cleanup: Removal of Inline Practice and Lesson Buttons

## 1. Overview
On [`pages/standards.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php), each standard code previously rendered inline jump buttons:
- **Practice** (`.std-quiz-btn`): Linked to `/assessment/#standard={code}`
- **Lesson** (`.std-lesson-btn`): Linked to `/levels/{grade}.php?standard={code}`

Per user request, these buttons have been removed from the standards page to provide a streamlined, focused browsing experience for standards, domains, and mathematical practices.

---

## 2. Changes Made
### [`pages/standards.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php#L828-L842)
- Removed `.std-quiz-btn` ("Practice") and `.std-lesson-btn` ("Lesson") link injection inside `.std-code-wrap`.
- Preserved:
  - Standard copy badge button (`.std-code-badge`) with click-to-copy functionality.
  - Standard info button (`.std-info-btn`) with accessibility label and detailed dossier modal trigger.
  - Personal mastery checkmark (`.std-mastery-checkmark`) reflecting student progress.
  - Grade progress badge (`.std-progress-badge`).

---

## 3. Verification
- Verified that `pages/standards.php` does not inject `.std-quiz-btn` or `.std-lesson-btn`.
- Verified that `assets/data/standards-ccss-math.json` is 100% valid JSON with all 14 grades populated.
