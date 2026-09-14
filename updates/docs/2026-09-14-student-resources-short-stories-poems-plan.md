---
title: "Implementation Plan: Student Resources Short Stories & Poems Section"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Student Resources", "ELA", "Literature", "Accessibility", "Gamification", "UDL"]
summary: "Implementation plan to integrate an interactive Short Stories & Poems section into the Student Resources Wiki (student/index.php) and ELA hubs, featuring curated literature, audio read-aloud, dyslexia-friendly settings, and comprehension checks."
author: "Antigravity & Hesten"
---

# Implementation Plan: Student Resources Short Stories & Poems Section

Add a dedicated, fully accessible **Short Stories & Poems** section to the **Student Resources Wiki** (`student/index.php`), complete with curated classic literature, poetry analysis, text-to-speech audio reader, Universal Design for Learning (UDL) display toggles, and interactive comprehension checks that integrate with the platform's gamification and data sync architecture.

## 1. Overview & Architecture
The Student Resource Wiki (`student/index.php`) serves as the central hub for student self-directed learning across Mathematics, ELA, Science, and Social Studies. While the platform has rich long-form books in the Digital Library (`/library/`), students need immediate, high-engagement access to short-form literary works—concise short stories, fables, and celebrated poems—with embedded pedagogical analysis, audio narration, and comprehension checks.

## 2. Proposed Changes

### Component 1: Student Resource Wiki (`student/index.php`)
- **New Section (`#short-stories-poems`)**:
  - Positioned prominently on `student/index.php` as a primary learning module.
  - Category filter tabs:
    - `All Works`
    - `Short Stories`
    - `Poems & Poetry`
    - `Elementary (Grades K–5)`
    - `Middle & High (Grades 6–12)`
  - Real-time search filter for matching by title, author, themes, or literary device.
  - Curated collection of 8 seminal works across grade levels:
    1. **"The Gift of the Magi"** by O. Henry (Grades 6–12, Irony, Sacrifice, Love)
    2. **"The Tell-Tale Heart"** by Edgar Allan Poe (Grades 7–12, Gothic Horror, Guilt, Suspense)
    3. **"The Tortoise and the Hare"** by Aesop (Grades K–5, Fable, Perseverance, Humility)
    4. **"The Velveteen Rabbit"** by Margery Williams (Grades 2–6, Empathy, Realness, Growing Up)
    5. **"The Road Not Taken"** by Robert Frost (Grades 5–12, Choice, Nonconformity, Reflection)
    6. **"Hope is the thing with feathers"** by Emily Dickinson (Grades 4–12, Extended Metaphor, Resilience)
    7. **"Harlem (A Dream Deferred)"** by Langston Hughes (Grades 6–12, Simile, Social Justice, Dreams)
    8. **"Ozymandias"** by Percy Bysshe Shelley (Grades 8–12, Sonnet, Hubris, Impermanence)
- **Embedded Interactive Reader Modal (`#story-poem-modal`)**:
  - Accessible modal dialog equipped with:
    - Clean typography with proper stanza formatting for poetry and paragraph spacing for prose.
    - Web Speech API **Text-to-Speech (Read Aloud)** with play/pause and progress indicator.
    - UDL Display Accommodations: Font size adjuster (`A- / A+`), OpenDyslexic toggle, and reading tint selector (matching parent/accessibility presets).
    - Literary elements breakdown: Theme, literary devices (metaphors, imagery, irony, meter), and key vocabulary.
    - Interactive 2-question comprehension check with instant pedagogical feedback and +25 XP gamification reward.
    - "Save to Bookmarks" and "Export to Scratchpad" actions.
- **ELA Gateway Card Update**:
  - Add a dedicated quick link in the ELA Subject Card:
    - `<a href="#short-stories-poems" class="subpage-link-btn"><i class="fas fa-feather-alt"></i><span>Stories & Poems</span></a>`

### Component 2: Stylesheet (`assets/css/pages/student.css`)
- Style the literary anthology section, filter controls, story cards, badges, and the interactive reader modal.
- Ensure strict compliance with WCAG 2.1/2.2 AA & AAA:
  - Minimum 4.5:1 contrast in standard themes, 7:1 in high contrast.
  - High-visibility `:focus-visible` rings on all interactive tabs, cards, and modal controls.
  - Responsive reflow down to 320px width without horizontal scrollbars.

### Component 3: ELA Resource Hub Bridging (`student/ela-resources.php`)
- In `student/ela-resources.php`, add a card and tab for "Short Stories & Poetry" linking back to the Student Wiki anthology or opening the story reader directly.

## 3. Universal WCAG, A11y & UDL Compliance
- Full keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc` to close modal).
- ARIA semantics: `role="region"`, `aria-label`, `role="tablist"`, `aria-selected`, `role="dialog"`, `aria-modal="true"`.
- Text-to-speech multimodal support for auditory learners and students with dyslexia.
- High-contrast visual focus rings and zero horizontal reflow issues down to 320px.

## 4. Verification Plan
- **Automated Syntax Checks**: Validate PHP syntax with `php -l`.
- **Manual Functionality Checks**:
  - Filter by category and search keyword.
  - Launch each story and poem in the reader.
  - Test audio narration play/pause.
  - Complete the mini comprehension quiz and verify XP increases in `localStorage`.
  - Test keyboard navigation and modal dismissal via `Escape`.
