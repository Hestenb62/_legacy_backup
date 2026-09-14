---
title: "Page-Contextual Adaptive Flashcards"
date: "2026-09-14"
category: "Walkthrough"
tags: ["Flashcards", "Leitner", "Level Pages", "Reader", "Grade 4", "Contextual Study"]
summary: "Implemented page-contextual flashcards across level pages (Grade 4 Math, Social Studies, Science, ELA), the Digital Reader (book-tailored decks), and interactive lessons."
author: "Antigravity & Hesten"
---

# Page-Contextual Adaptive Flashcards — Walkthrough

We have implemented an intelligent, page-contextual flashcard engine for the Hesten's Learning platform. The Flashcard Studio now automatically inspects the student's current learning context—whether on a grade level page, inside a subject tab, reading a literary classic, or practicing an interactive lesson—and automatically loads and selects the matching flashcard deck.

---

## Key Features & Capabilities

### 1. Dynamic Level & Subject Tab Context (Grade 4 Example)
- **Math Tab (`levels/f.php?subject=math`)**: Automatically loads the **Grade 4 Mathematics** deck (`grade_4_math`) covering multi-digit multiplication, long division with remainders, equivalent fractions, prime vs composite numbers, angles, perimeter & area, and decimal fractions.
- **Social Studies Tab (`levels/f.php?subject=social`)**: Automatically loads the **Grade 4 Social Studies & Civics** deck (`grade_4_social`) covering geographic regions, indigenous tribal cultures, colonial trade, three branches of government, voting & civic duty, supply and demand, and the American Revolution.
- **Science Tab (`levels/f.php?subject=science`)**: Automatically loads the **Grade 4 Science Inquiry** deck (`grade_4_science`) covering energy transfer, weathering & erosion, renewable resources, sensory adaptations, and wave properties.
- **Language Arts Tab (`levels/f.php?subject=ela`)**: Automatically loads the **Grade 4 English Language Arts** deck (`grade_4_ela`) covering theme vs main idea, similes & metaphors, 1st vs 3rd person point of view, text structures, and affixes.
- **Reactive Tab Switching**: If the student clicks between **Math** and **Social Studies** while the studio is open (or before opening), the deck dynamically aligns with the newly selected subject in real time.

### 2. Tailored Digital Reader Literature Decks
When reading any book in the Digital Reader (`/library/read/index.php?book=...`):
- **1984 (`book=1984`)**: Loads the curated **1984 - George Orwell** deck (`book_1984`) covering *Telescreen*, *Doublethink*, *Thoughtcrime*, *Big Brother*, *Newspeak*, *Memory Hole*, *Proles*, and *Ministry of Truth*.
- **Frankenstein (`book=frankenstein`)**: Loads **Frankenstein - Mary Shelley** (`book_frankenstein`) covering *Galvanism*, *Hubris*, *Modern Prometheus*, *Gothic Romanticism*, *The Sublime*, and *Solitude & Alienation*.
- **The Federalist Papers (`book=federalist-papers`)**: Loads **The Federalist Papers** (`book_federalist_papers`) covering *Federalism*, *Separation of Powers*, *Faction*, and *Checks & Balances*.
- **The American Yawp (`book=american-yawp`)**: Loads **The American Yawp: U.S. History** (`book_american_yawp`) covering *Columbian Exchange*, *Mercantilism*, and *Reconstruction*.
- **Mathematics Reference Codex (`book=math-facts-repo`)**: Loads **Mathematics Reference Codex** (`book_math_facts_repo`) covering foundational constants, piecewise functions, and derivatives.
- **Dynamic Book Vocab Extraction**: For any other book with active chapter vocabulary (`window.BOOK_JSON_VOCAB`), a customized reader deck is automatically constructed on the fly.

### 3. Interactive Lesson Pages
- On interactive lesson pages (e.g. `levels/k.php?k-math-m1-a-1` or `levels/practice-ged.php?ged-m-1-1`), the engine extracts in-page vocabulary cards (`.lesson-vocab-card-open`) and creates an on-demand deck for that specific lesson.

### 4. Categorized Deck Selector & Context Badge
- The deck selector dropdown (`#flashcard-deck-select`) now organizes decks into clean `<optgroup>` categories:
  1. `📍 Contextual to Current Page`: Highlights `★ [Deck Title] (Current Page)` at the very top.
  2. `📚 Grade & Subject Decks`: Grade-level curriculum decks.
  3. `📖 Literature & Reader Decks`: Reader book decks.
  4. `⭐ General & Custom Decks`: Custom student deck, biology, algebra, civics.
- A visual pill badge (`#flashcard-context-indicator`) appears in the studio header:
  `Auto-tailored: [Badge Name]`
- Students retain complete freedom to switch to any other deck or custom cards at any time.

---

## Changes Summary

| File | Changes |
| :--- | :--- |
| **[assets/data/flashcard-curriculum-decks.json](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/flashcard-curriculum-decks.json)** | Standard-aligned dataset with curated decks for Grade 4 (Math, Social Studies, Science, ELA) and Digital Reader books (*1984*, *Frankenstein*, *Federalist Papers*, etc.). |
| **[src/level_template.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php)** | Initialized `window.HL_PAGE_CONTEXT` and added `hl:subject-switched` event dispatching inside `switchTab()` so docked study tools react dynamically. |
| **[src/partials/flashcard-studio.php](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/flashcard-studio.php)** | Added `#flashcard-context-indicator` badge chip next to the deck picker. |
| **[assets/js/flashcard-studio.js](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/flashcard-studio.js)** | Implemented `detectPageContext()`, `populateDeckSelect()`, `buildScaffoldedGradeCards()`, and hooked tab switch event listeners to auto-select matching decks. |

---

## Verification Results

All automated and contextual tests passed:
- **Grade 4 Math** (`levels/f.php` on Math): Auto-selected `grade_4_math` with 10 cards.
- **Grade 4 Social Studies** (`levels/f.php` on Social Studies): Auto-selected `grade_4_social` with 8 cards.
- **Grade 4 Science** (`levels/f.php` on Science): Auto-selected `grade_4_science` with 6 cards.
- **Grade 4 Language Arts** (`levels/f.php` on ELA): Auto-selected `grade_4_ela` with 6 cards.
- **Digital Reader 1984** (`/library/read/index.php?book=1984`): Auto-selected `book_1984`.
- **Digital Reader Frankenstein** (`/library/read/index.php?book=frankenstein`): Auto-selected `book_frankenstein`.
- **Interactive Lesson**: Generated and selected in-page lesson vocabulary deck.
- **Reactive Tab Switch**: Confirmed switching from Math to Social Studies while open immediately updates the active deck.
