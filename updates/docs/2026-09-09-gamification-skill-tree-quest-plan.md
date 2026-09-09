---
title: "Implementation Plan: Gamification, Skill Trees & Mastery Quest Suite (Phase 2)"
date: "2026-09-09"
category: "Implementation Plan"
tags: ["Gamification", "Skill Tree", "Blooms Taxonomy", "Quests", "Badges", "XP", "Student Motivation"]
summary: "Comprehensive architectural and engineering roadmap for Phase 2, implementing an interactive visual Skill & Knowledge Tree, Bloom's Taxonomy node progression, Daily Quest XP engine, and Achievement Badge Showcase."
author: "Antigravity & Hesten"
---

# Implementation Plan: Gamification, Skill Trees & Mastery Quest Suite (Phase 2)

## 1. Executive Summary & Vision

Phase 2 transforms Hesten's Learning platform into a **game-inspired cognitive progression system**, empowering students with agency, clear learning pathways, and intrinsic motivation. 

By grounding progression in **Bloom's Revised Taxonomy** (*Remember &bull; Understand &bull; Apply &bull; Analyze &bull; Evaluate &bull; Create*), students can visualize their intellectual growth across four academic disciplines (Math, ELA, Science, Social Studies), complete daily educational quests, earn XP, and unlock achievement badges.

---

## 2. Core Architectural Components

### A. Interactive Visual Skill & Knowledge Tree (`student/skill-tree.php`, `assets/js/gamification/skill-tree.js`, `assets/css/pages/skill-tree.css`)
- **Node-Based Pathway Visualization**: Responsive interactive SVG/Canvas graph illustrating prerequisite connections between foundational and advanced concepts.
- **4 Discipline Tracks**:
  1. **Mathematics**: *Arithmetic Fundamentals &rarr; Rational Numbers & Fractions &rarr; Algebraic Expressions &rarr; Linear Functions & Geometry &rarr; Quadratic Analysis*.
  2. **English Language Arts**: *Phonics & Syllables &rarr; Lexile Vocabulary & Context &rarr; Structural Comprehension &rarr; Literary Analysis &rarr; Rhetorical Argumentation*.
  3. **Science**: *Empirical Inquiry &rarr; Earth & Planetary Systems &rarr; Cellular Biology & Metabolism &rarr; Forces & Energy &rarr; Genetics & Ecology*.
  4. **Social Studies & Civics**: *Community Governance &rarr; World Civilizations &rarr; Constitutional Democracy & Rights &rarr; Geographic Systems &rarr; Macroeconomics*.
- **Bloom's Taxonomy Mastery Progression**:
  - Each node features 4 tiered mastery levels:
    - **Tier 1 (Bronze)**: *Remember / Recall* (Unlocked via vocabulary and flashcard reviews).
    - **Tier 2 (Silver)**: *Understand / Explain* (Unlocked via reading passage completions).
    - **Tier 3 (Gold)**: *Apply / Solve* (Unlocked via practice quizzes with &ge;80% score).
    - **Tier 4 (Diamond Master)**: *Analyze & Synthesize* (Unlocked via perfect quiz scores and spaced repetition streak).
- **Node Drawer / Practice Launcher**: Clicking any skill node displays its prerequisites, description, current Bloom's tier, and a 1-click button to jump directly into relevant practice, reader text, or flashcard deck.

---

### B. Daily Quests, XP Engine & Leveling System (`assets/js/gamification/quest-manager.js`)
- **Daily Procedural Quests**: 3 daily challenges refreshed at midnight local time:
  - *e.g., "Word Smith"*: Practice 15 flashcards in the Leitner Studio (+50 XP).
  - *e.g., "Deep Reader"*: Read 1 chapter with 2 margin notes (+75 XP).
  - *e.g., "Skill Pioneer"*: Advance 1 node on the Skill Tree (+100 XP).
- **XP & Level Progression**:
  - Level formula: $\text{Level} = \lfloor \sqrt{\text{XP} / 100} \rfloor + 1$.
  - Rank Titles: *Novice Apprentice (Lvl 1) &rarr; Diligent Scholar (Lvl 3) &rarr; Conceptual Master (Lvl 6) &rarr; Grand Polymath (Lvl 10)*.
- **Multisensory Level-Up Celebration**:
  - Web Audio API synthesized celebratory chime sequence.
  - Lightweight canvas confetti particle animation without external dependencies.
- **Storage Persistence**: All XP, level, unlocked nodes, and quest states saved in `localStorage['hl_gamification_profile']` with Google Drive cloud sync compatibility.

---

### C. Quest & Badge Showcase Studio Modal (`src/partials/quest-badges-modal.php`, `assets/css/components/quest-badges.css`)
- **Global Shortcut**: Accessible from any page via `<kbd>Alt+Q</kbd>` or Floating Action Button in `src/partials/fixed-tools.php`.
- **Tri-Tab Studio**:
  1. **Active Quests**: Real-time progress bars, timers, and "Claim Reward" buttons.
  2. **Badge Showcase**: Visual grid of 16 milestone achievement badges (Locked/Unlocked states, earn dates, and rarity ratings).
  3. **Level Mastery Card**: XP progress to next rank, total study time, and skill nodes mastered count.
- **16 Milestone Achievement Badges**:
  - 🌟 *First Steps*: Complete your first learning session.
  - ⚡ *Spaced Sensation*: Advance 5 cards to Leitner Box 5.
  - 📚 *Bibliophile*: Highlight text in 3 different books.
  - 🧠 *Polymath*: Earn XP in all 4 discipline tracks.
  - 🔥 *Week of Fire*: Maintain a 7-day study streak.
  - 🎯 *Sharpshooter*: Score 100% on any chapter quiz.
  - 💎 *Diamond Mastery*: Reach Bloom's Tier 4 on any skill tree node.
  - 🦉 *Night Owl* / 🌅 *Early Bird*: Study during focused morning/evening hours.

---

### D. Navigation & Integration
- **Header & Footer**: Mount `src/partials/quest-badges-modal.php` in `src/header.php`, load `quest-manager.js` in `src/footer.php`, and add `<kbd>Alt+Q</kbd>` to `src/partials/shortcuts-modal.php`.
- **Student Dashboard Integration**: Embed a mini Skill Tree preview widget and XP level bar in `student/index.php`.
- **Offline Precache**: Register `/student/skill-tree.php`, `/assets/js/gamification/quest-manager.js`, `/assets/js/gamification/skill-tree.js`, and `/assets/css/pages/skill-tree.css` in `service-worker.js` under cache `hestens-learning-v11`.

---

## 3. Proposed Changes Grouped by Component

### [Skill Tree & Knowledge Map]
- [NEW] [`student/skill-tree.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/skill-tree.php): Full interactive skill tree page with interactive canvas/SVG map, discipline selector, and node details drawer.
- [NEW] [`assets/js/gamification/skill-tree.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/gamification/skill-tree.js): Skill tree graph renderer, dependency resolution engine, Bloom's taxonomy level calculator, and node practice launcher.
- [NEW] [`assets/css/pages/skill-tree.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/skill-tree.css): Futuristic glassmorphic skill tree stylesheet supporting zoom/pan controls, connection line pulses, Bloom's tier badges, and theme variants (Dark, Midnight, Sepia, High Contrast).

### [Quest, XP & Gamification Engine]
- [NEW] [`assets/js/gamification/quest-manager.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/gamification/quest-manager.js): XP tracker, procedural daily quest generator, badge unlocking trigger system, Web Audio synthesizer, and confetti celebration engine.
- [NEW] [`src/partials/quest-badges-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/quest-badges-modal.php): Universal Quest & Badge Showcase dialog (`<kbd>Alt+Q</kbd>`).
- [NEW] [`assets/css/components/quest-badges.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/quest-badges.css): Stylesheet for quest progress bars, badge cards, rank icons, and level-up modal overlay.

### [Site-Wide Hooks & Dashboard]
- [MODIFY] [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php): Include `src/partials/quest-badges-modal.php` and load `quest-badges.css`.
- [MODIFY] [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php): Load `assets/js/gamification/quest-manager.js`.
- [MODIFY] [`src/partials/fixed-tools.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/fixed-tools.php): Add Quest Studio launcher button (`fab-quests`).
- [MODIFY] [`src/partials/shortcuts-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/shortcuts-modal.php): Document `<kbd>Alt+Q</kbd>` for Quest Studio.
- [MODIFY] [`student/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/index.php): Embed XP progression widget and direct link to Skill Tree.
- [MODIFY] [`service-worker.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js): Precache all Phase 2 assets under `hestens-learning-v11`.

---

## 4. Verification & Testing Plan

1. **Static Syntax Analysis**:
   - `node -c assets/js/gamification/quest-manager.js`
   - `node -c assets/js/gamification/skill-tree.js`
2. **Interactive Node & Bloom's Tier Verification**:
   - Test clicking skill nodes across all 4 disciplines (Math, ELA, Science, Social Studies).
   - Verify Bloom's taxonomy tier upgrades (Bronze &rarr; Silver &rarr; Gold &rarr; Diamond) based on score benchmarks.
3. **Quest & XP System Verification**:
   - Trigger quest completion and verify XP increase, level-up sound chime, and canvas particle confetti.
   - Verify daily quest regeneration at midnight local time.
4. **Theme & Contrast Verification**:
   - Test on Light, Dark, Midnight, Sepia, and High Contrast mode (`#000000` / `#ffffff` / `#ffff00`).
5. **Offline Resiliency**:
   - Verify `/student/skill-tree.php` and quest modal function completely offline without internet connectivity.
