---
title: "Implementation Plan: Remove XP System & Add K–12 Daily Stories & Poems"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Student Resources", "ELA", "Literature", "Accessibility", "K-12", "UDL"]
summary: "Plan to remove the entire XP/gamification system from the Student Resources page (student/index.php) and deliver a comprehensive Grades K–12 daily short stories and poems engine with daily spotlight rotation."
author: "Antigravity & Hesten"
---

# Implementation Plan: Remove XP System & Add K–12 Daily Stories & Poems

This plan addresses two core requirements:
1. **Completely remove the XP / gamification system** from the Student Resources page (`student/index.php`), removing daily quest panels, XP badges, level progression trackers, and XP quiz point allocations.
2. **Generate and integrate short stories and poems for Grades K–12 with daily rotation**, providing curriculum-aligned classic and celebrated literature across all 13 grade levels (Kindergarten through Grade 12) with a dynamic "Daily Spotlight" (Story of the Day & Poem of the Day) that updates every calendar day.

## 1. Scope & Architecture

### Component 1: Remove XP / Gamification System from `student/index.php`
- **Hero & Header Widgets**:
  - Remove `student-hub-level-badge` ("Level 1 • Novice Scholar") and "Badges & Quests" modal launch button from the Skill Tree banner.
- **Daily Quests Widgets**:
  - Remove `#daily-quests-root` container.
  - Remove `#daily-quests-widget` ("Today's Learning Quests", `+175 XP Total`, individual quest cards with `+50 XP`, `+75 XP`).
- **JavaScript Cleanup in `student/index.php`**:
  - Remove the quest completion evaluation logic (`#quests-list`, `#quests-completed-count`, etc.).
  - Remove level and rank extraction from `hl_gamification_profile`.
  - Keep meaningful academic study tracking (streak, minutes studied, bookmarks, standards mastery) without gamified XP mechanics.
- **Stories & Poems Reader Modal**:
  - Remove `+25 XP` labels from the Comprehension Check tab and quiz headers.
  - Remove `awardStudentXP()` calls from `assets/js/student-stories-poems.js`, focusing quizzes purely on pedagogical understanding and feedback.

### Component 2: Comprehensive Grades K–12 Daily Stories & Poems Engine
- **Expanded Dataset (`assets/data/student-stories-poems.json`)**:
  - Expand the collection to systematically cover **all 13 grade levels**:
    - **Grade K**: *The Lion and the Mouse* (Aesop), *The Swing* (Robert Louis Stevenson).
    - **Grade 1**: *The Boy Who Cried Wolf* (Aesop), *At the Seaside* (Robert Louis Stevenson).
    - **Grade 2**: *The Velveteen Rabbit (Excerpt)* (Margery Williams), *My Shadow* (Robert Louis Stevenson).
    - **Grade 3**: *The Ant and the Grasshopper* (Aesop), *Wynken, Blynken, and Nod* (Eugene Field).
    - **Grade 4**: *The Selfish Giant* (Oscar Wilde), *Hope is the thing with feathers* (Emily Dickinson).
    - **Grade 5**: *Rip Van Winkle (Excerpt)* (Washington Irving), *The Road Not Taken* (Robert Frost).
    - **Grade 6**: *The Gift of the Magi* (O. Henry), *Harlem (A Dream Deferred)* (Langston Hughes).
    - **Grade 7**: *The Tell-Tale Heart* (Edgar Allan Poe), *Annabel Lee* (Edgar Allan Poe).
    - **Grade 8**: *The Monkey's Paw* (W.W. Jacobs), *Ozymandias* (Percy Bysshe Shelley).
    - **Grade 9**: *The Necklace* (Guy de Maupassant), *If—* (Rudyard Kipling).
    - **Grade 10**: *The Cask of Amontillado* (Edgar Allan Poe), *Do not go gentle into that good night* (Dylan Thomas).
    - **Grade 11**: *An Occurrence at Owl Creek Bridge* (Ambrose Bierce), *The Love Song of J. Alfred Prufrock (Excerpt)* (T.S. Eliot).
    - **Grade 12**: *The Metamorphosis (Ch. 1 Excerpt)* (Franz Kafka), *Ode on a Grecian Urn* (John Keats).
  - Each item includes Lexile / grade band, full formatted text, literary craft analysis, and comprehension checks with instant feedback.
- **Daily Rotation Feature ("Story & Poem of the Day")**:
  - Deterministic calendar date hash (`new Date().getFullYear() + '-' + (month) + '-' + (day)`):
    - Computes **Daily Featured Story** and **Daily Featured Poem** for each day of the year.
    - Highlights them in a prominent "Today's Daily Spotlight" card banner at the top of the `#short-stories-poems` section.
    - Rotates automatically at midnight local time every single day.
- **Grade Selector Controls**:
  - Add grade-level filtering supporting both quick bands (`All Grades`, `Early Elementary K–2`, `Upper Elementary 3–5`, `Middle School 6–8`, `High School 9–12`) and a dedicated **Grade Picker Dropdown** allowing students to filter directly to any specific grade (K through 12).
- **Controller Update (`assets/js/student-stories-poems.js`)**:
  - Implement daily selection calculation and rendering.
  - Implement grade filtering (Grade K to Grade 12).
  - Clean out all XP awarding logic.

## 2. Verification Plan
- **Automated Tests**: Node scripts to validate JSON dataset structure across all grades K–12 and test JS syntax.
- **Manual Verification**:
  - Confirm all XP badges, daily quest widgets, and points are completely absent from `student/index.php`.
  - Confirm the Daily Spotlight rotates and highlights today's featured story and poem.
  - Test the Grade filter for Grades K–12.
