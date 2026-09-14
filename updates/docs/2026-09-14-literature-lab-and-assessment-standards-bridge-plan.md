---
title: "Implementation Plan: Digital Reader Literature Lab & Assessment-Standards Flashcard Bridge"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Library", "Lexile", "Frankenstein", "Assessment", "Flashcards", "Standards", "UDL"]
summary: "Plan for expanding Mary Shelley's Frankenstein into a 3-tier Lexile experience, connecting reader marginalia directly to Leitner decks, and establishing an adaptive <80% deficit flashcard bridge in the diagnostic assessment suite."
author: "Antigravity & Hesten"
---

# Implementation Plan - Digital Reader Literature Lab & Assessment-Standards Flashcard Bridge

Enhance Hesten's Learning platform across two core educational pillars:
1. **Digital Reader & Literature Lab (Option 3)**: Elevate Mary Shelley's *Frankenstein* into a full multi-tier Lexile experience (Original 1170L, Adapted 850L, Basic English 480L) with integrated vocabulary definitions and chapter comprehension quizzes in `library/assets/frankenstein.json`, while connecting reader marginalia highlights directly to book-tailored Leitner flashcards.
2. **Diagnostic Assessment & Standards Bridge (Option 4)**: Enhance the Diagnostic Assessment results pipeline (`assets/js/assessment-main.js`) with an adaptive <80% deficit detection engine that generates direct one-click "Study Flashcards" buttons for missed standards and subjects, deep-linking into Flashcard Studio with pre-configured cards and cross-role state sync.

---

## Proposed Changes

### 1. Digital Reader & Literature Lab Enhancements

#### [MODIFY] [library/read/frankenstein/chapter-1.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/frankenstein/chapter-1.php)
- Replace stub content with full Mary Shelley Chapter 1 formatted into three accessible Lexile containers:
  - `data-lexile="original"` (1170L): Authentic Mary Shelley Gothic text detailing Victor Frankenstein's Genevese heritage, his father Alphonse, Beaufort, and the adoption of Elizabeth Lavenza.
  - `data-lexile="adapted"` (850L): Smooth, modernized high-comprehension edition preserving nuance, tone, and character relationships.
  - `data-lexile="basic"` (480L): C. K. Ogden 850 Basic English standard vocabulary designed for ELL, emerging readers, and accessible reading accommodations.
- Include in-page `#lexile-switcher-wrap` selector and connect `lib-reader-lexile.js`.
- Add chapter navigation links (`Back to Book`, `All Chapters`).

#### [NEW] [library/assets/frankenstein.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/assets/frankenstein.json)
- Create quiz and vocabulary metadata for Frankenstein:
  - `vocab-chapter-1`: Key Tier 2 and Tier 3 vocabulary (e.g. *Genevese*, *Benevolence*, *Calamity*, *Indefatigable*, *Disposition*) with student-friendly definitions.
  - `chapter-1`: 3–4 standard-aligned comprehension questions (RL.9-10.1, RL.9-10.3) with answer choices, correct index, and rich pedagogical explanations.

#### [MODIFY] [assets/js/reader/read-inline-text-highlighting.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/reader/read-inline-text-highlighting.js)
- Upgrade the `#hl-btn-flashcard` action handler:
  - When text is highlighted and the Flashcard button is clicked, identify the active book deck (e.g. `frankenstein-deck`, `1984-deck`, or custom fallback).
  - Add the card to `hl_leitner_decks` under the specific book's deck with chapter context and citation.
  - Provide an accessible confirmation toast / live announcement.
  - Open Flashcard Studio (`window.toggleFlashcardStudio(true)`) directly to the newly added book deck.

#### [MODIFY] [library/read/reader_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/read/reader_template.php)
- Add a dedicated "Study Flashcards (Alt+F)" action button to the sticky reading bar and top controls, allowing immediate access to book-tailored decks while reading.

---

### 2. Diagnostic Assessment & Standards Remediation Bridge

#### [MODIFY] [assets/js/assessment-main.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/assessment-main.js)
- Refine the mastery evaluation threshold to 80% (standard benchmark criteria).
- Update the Automatic Remediation Dispatcher:
  - For each deficit standard (< 80% score), add a high-visibility **"Study Flashcards"** CTA button alongside "Launch Lesson" and "Standard Drill".
  - In `.mastery-actions-container` (the results action bar), inject a **"Practice Targeted Flashcards"** primary button.
  - Implement `window.openRemediationFlashcards(subject, standardCode)`:
    - Queries `flashcard-curriculum-decks.json` or dynamic generator for cards matching the tested subject and grade band.
    - If specific missed questions exist, dynamically inject a temporary "Remediation Drill: [Standard]" deck into `hl_leitner_decks`.
    - Opens Flashcard Studio and selects the newly focused remediation deck.
- Dispatch `hl:data-sync` and `hl:remediation-updated` to maintain cross-tab and tripartite role synchronization.

---

### 3. Documentation Persistence (Mandatory Platform Rule)

#### [NEW] [updates/docs/2026-09-14-literature-lab-and-assessment-standards-bridge-plan.md](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-09-14-literature-lab-and-assessment-standards-bridge-plan.md)
- Mirror of this implementation plan with standard YAML frontmatter for the Updates Portal at `/updates.php`.

---

## Verification Plan

### Automated Tests
- Run `node -c assets/js/assessment-main.js` and `node -c assets/js/reader/read-inline-text-highlighting.js` to ensure 0 syntax errors.
- Run unit test script `scratch/test_literature_and_assessment_bridge.js` validating:
  - `frankenstein.json` JSON parsing and schema validity.
  - Lexile tiers detection in `chapter-1.php` (Original, Adapted, Basic).
  - Remediation deck construction logic for < 80% deficits.
  - Marginalia highlight-to-flashcard saving and storage structure.

### Manual Verification
- Test visiting `/library/read/index.php?book=frankenstein&chapter=chapter-1`:
  - Toggle Lexile dropdown (Original 1170L $\leftrightarrow$ Adapted 850L $\leftrightarrow$ Basic English 480L) and ensure instant seamless text swap.
  - Verify Vocabulary Drawer displays Frankenstein Chapter 1 words.
  - Highlight text and click Flashcard icon; confirm card saves into `frankenstein-deck` and Flashcard Studio opens.
- Test visiting `/assessment/` and completing a quiz:
  - Verify deficit standard (< 80%) shows "Study Flashcards" button.
  - Verify clicking "Study Flashcards" launches Flashcard Studio with the tailored subject/remediation deck active.
