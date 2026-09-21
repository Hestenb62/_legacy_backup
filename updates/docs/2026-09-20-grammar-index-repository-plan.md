---
title: "Implementation Plan: Universal English Grammar Codex & Index (pages/grammar.php)"
date: "2026-09-20"
category: "Implementation Plan"
tags: ["English Grammar", "Grammar Codex", "Syntax Analyzer", "Sentence Diagrammer", "A-Z Index", "WCAG 2.2 AAA"]
summary: "Architectural blueprint and curricular design for pages/grammar.php, establishing an encyclopedic A-Z English Grammar Codex with definitions, mechanisms ('what it does'), procedures ('how to do it'), worked exemplars, and an Interactive Sentence Diagrammer & Syntax Analyzer across all 12 grades."
author: "Antigravity & Hesten"
---

# Implementation Plan: Universal English Grammar Codex & Index (`pages/grammar.php`)

Build `pages/grammar.php` as a comprehensive, repository-style English Grammar Codex and Index for Hesten's Learning, cataloging core grammatical definitions, syntactic mechanisms ("what it does"), rules and sentence construction procedures ("how to do it"), and worked step-by-step exemplars across all 12 grades (Kindergarten/Grade 1 through Grade 12).

## User Review Required

> [!IMPORTANT]
> - `pages/grammar.php` will mirror the exact high-standard architecture of `pages/math.php`: A-to-Z alphabetical sections, sticky jump ribbon, multi-tier filtering (Grade Band, Specific Grade, Grammar Domain), live instant search, study list favorites, text export, and print optimization.
> - In place of the mathematical formula solver, `pages/grammar.php` will feature an **Interactive Sentence Diagrammer & Syntax Analyzer** in the hero section, allowing learners to break down sentence clauses, identify parts of speech, and analyze active/passive voice and sentence structures with audio feedback.
> - All grammar concepts will be organized in a dedicated, extensible JSON dataset at `assets/data/grammar-php.json`.

## Proposed Architecture & Changes

### 1. Curricular Grammar Dataset
#### [NEW] [`assets/data/grammar-php.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/grammar-php.json)
An extensive, structured JSON database covering key English grammar concepts from A to Z across all 12 grades:
- **Domains Covered**:
  - `parts-of-speech` (Nouns, Verbs, Adjectives, Adverbs, Pronouns, Prepositions, Conjunctions, Interjections, Determiners)
  - `sentence-structures` (Simple, Compound, Complex, Compound-Complex, Periodic Sentences, Balanced Sentences)
  - `clauses-phrases` (Independent Clauses, Subordinate/Dependent Clauses, Relative Clauses, Appositives, Participial Phrases, Gerund Phrases)
  - `punctuation-mechanics` (Oxford Comma, Semicolons, Colons, Em Dashes, Hyphens, Apostrophes, Quotation Rules, Ellipses)
  - `verb-mechanics` (Verb Tenses, Progressive & Perfect Aspects, Subjunctive Mood, Conditional, Passive vs. Active Voice)
  - `syntactic-pitfalls` (Subject-Verb Agreement, Dangling Modifiers, Comma Splices, Run-on Sentences, Pronoun-Antecedent Agreement)
  - `rhetoric-figurative` (Metaphor, Simile, Personification, Hyperbole, Parallelism, Antithesis)
- **Schema per entry**:
  - `id`: Unique slug identifier (e.g. `g4-relative-clauses`)
  - `name`: Term title (e.g. `Relative Clauses & Subordination`)
  - `etymology`: Phonetic guide and linguistic root
  - `grade`: Integer grade level (1–12)
  - `gradeName`: Display grade label (e.g. `4th Grade`, `High School (9–12)`)
  - `branch`: Domain category slug
  - `branchLabel`: Human-readable domain name
  - `formula`: Syntactic formula/pattern (e.g. `Independent Clause + [who/which/that] + Dependent Clause`)
  - `rawFormula`: Plain text pattern
  - `definition`: Formal grammatical definition
  - `whatItDoes`: Functional linguistic explanation ("what it does")
  - `howToDoIt`: Array of step-by-step application rules
  - `exampleProblem`: Practice sentence or faulty construction to evaluate
  - `exampleSolution`: Step-by-step breakdown and corrected diagramming
  - `codexChapter`: Grade/Level mapping
  - `keywords`: Space-delimited search keywords

---

### 2. Grammar Codex Page Template
#### [NEW] [`pages/grammar.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/grammar.php)
- **Header & Meta**:
  - Semantic title: `Universal English Grammar Codex & Index (A–Z) | Hesten's Learning`
  - Integration with `src/header.php` and `src/footer.php`.
- **Hero Section**:
  - Hero badge and descriptive header.
  - Live instant search bar with keyboard shortcut hint (`Ctrl+K` or `/`).
  - **Interactive Sentence Diagrammer & Syntax Analyzer**:
    - Preset selector with canonical sentence structures (Simple, Compound with FANBOYS, Complex with Subordinating Conjunction, Subjunctive Mood, Passive to Active).
    - Custom text input for testing arbitrary sentences.
    - Color-coded syntax tagger (Subject, Verb/Predicate, Object, Prepositional Phrase, Conjunction).
    - Step-by-step grammatical dissection and voice/clause classifier.
    - Tactile audio cues via `window.HLSound`.
- **Sticky A–Z Quick-Jump Ribbon**:
  - Letters A through Z with active jump links to `#letter-[A-Z]`.
- **Filter Controls**:
  - Grade Band: All Grades, Elementary (K–5), Middle (6–8), High School (9–12).
  - Specific Grade: Grades 1 through 12.
  - Domain: All Domains, Parts of Speech, Sentence Structures, Clauses & Phrases, Punctuation, Verb Mechanics, Common Pitfalls, Rhetoric.
  - Study List filter (`My Study List` counter).
- **Status Bar**:
  - Dynamic result counter.
  - Export Study Sheet button (`.txt` formatted study guide).
  - Print Index button.
- **A–Z Lexicon Section Grid**:
  - Letter sections with anchor IDs and entry count badges.
  - Detailed grammar term cards with:
    - Term title, etymology, grade & domain badges.
    - Action toolbar: TTS Read-Aloud (`.grammar-btn-speak`), Copy Rule Pattern (`.grammar-btn-copy`), Favorite Bookmark (`.grammar-btn-fav`), Scratchpad Note (`.grammar-btn-note`).
    - Definition, Functional Role ("What It Does"), Application Rules ("How to Use It").
    - Worked Exemplar box with color-coded analysis and key tips.
    - Curriculum level direct links.

---

### 3. Styling & Aesthetics
#### [NEW] [`assets/css/pages/grammar.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/grammar.css)
- Tailored palette (sophisticated emerald, indigo, rose, and amber accents).
- High-contrast accessible focus outlines (`:focus-visible`).
- Glassmorphic card styling, responsive ribbons, and pill button states.
- Clean typography and badge hierarchy.
- `@media print` rules for clean, ink-friendly study sheet printing.

---

### 4. Interactive Controller
#### [NEW] [`assets/js/pages/grammar-index.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/grammar-index.js)
- Instant live search with keyword scoring and letter jumping.
- Multi-category filter coordination (grade band + specific grade + domain + favorites).
- Sticky A–Z ribbon scroll spy and intersection observer.
- **Interactive Sentence Diagrammer & Syntax Analyzer** logic:
  - Canonical patterns and rule-based parser.
  - Color-coded token breakdown.
  - Clause counter and voice indicator.
- Web Speech API speech synthesis integration (`speechSynthesis.speak`) for pronunciations and definitions.
- Study list bookmarking in `localStorage['hl_grammar_favorites']`.
- Note export to digital scratchpad (`hl_scratchpad_notes`).
- Text export to downloadable `.txt` study sheet.

---

### 5. Platform Navigation
#### [MODIFY] [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)
- Add a direct link to `/pages/grammar.php` in the mega menu under curriculum resources right next to `Mathematics Codex`.

---

## Verification Plan

### Automated & Syntax Validation
- PHP lint check:
  ```powershell
  & "C:\xampp\php\php.exe" -l pages/grammar.php
  & "C:\xampp\php\php.exe" -l src/header.php
  ```
- JavaScript syntax check:
  ```powershell
  node -c assets/js/pages/grammar-index.js
  ```
- JSON validation check:
  ```powershell
  node -e "JSON.parse(fs.readFileSync('assets/data/grammar-php.json'))"
  ```

### Manual & Interactive Verification
- Verify that `/pages/grammar.php` loads all A–Z grammar entries properly grouped by letter.
- Test instant search by typing grammatical terms (e.g. `appositive`, `subjunctive`, `semicolon`).
- Test grade band and domain filtering.
- Test the Interactive Sentence Diagrammer & Syntax Analyzer with preset sentences and custom inputs.
- Test TTS pronunciation, formula copy, favorites toggle, scratchpad note creation, and study sheet text export.
- Verify WCAG 2.2 AAA compliance: keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`), high contrast focus rings, and screen-reader accessibility.
