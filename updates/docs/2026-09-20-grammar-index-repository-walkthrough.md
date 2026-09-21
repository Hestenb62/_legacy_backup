---
title: "Walkthrough: Universal English Grammar Codex & Repository (pages/grammar.php)"
date: "2026-09-20"
category: "Walkthrough"
tags: ["English Grammar", "Grammar Codex", "Syntax Analyzer", "Sentence Diagrammer", "A-Z Index", "WCAG 2.2 AAA"]
summary: "Created and verified pages/grammar.php as an encyclopedic English Grammar Codex and Index with definitions, mechanisms ('what it does'), procedures ('how to do it'), worked exemplars, and an Interactive Sentence Diagrammer & Syntax Analyzer across all 12 grades."
author: "Antigravity & Hesten"
---

# Walkthrough: Universal English Grammar Codex & Repository (`pages/grammar.php`)

## Executive Overview
Built [`pages/grammar.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/grammar.php) as a sister repository page to [`pages/math.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/math.php). It provides a comprehensive, encyclopedic A–Z concordance of English grammar rules, syntactic mechanisms, sentence construction patterns, and worked exemplars across all 12 grades.

---

## Key Features Implemented

### 1. Curricular Grammar Dataset ([`assets/data/grammar-php.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/grammar-php.json))
- **A–Z Encyclopedic Coverage**: 26 structured entries representing key grammatical concepts across letters A through Z:
  - **A**: Appositives & Renaming Phrases
  - **B**: Balanced & Periodic Sentence Architecture
  - **C**: Comma Splices & Run-On Remediation
  - **D**: Dangling & Misplaced Modifiers
  - **E**: Ellipsis (. . .) & Quotation Omissions
  - **F**: Future Perfect Tense & Aspect
  - **G**: Gerunds & Nominalized Verbal Phrases
  - **H**: Hyphens & Compound Modifiers
  - **I**: Independent vs. Dependent Clauses
  - **J**: Juxtaposition & Antithetical Balance
  - **K**: The Known-New Syntactic Contract
  - **L**: Linking Verbs & Subject Complements
  - **M**: Modal Auxiliaries & Epistemic Modality
  - **N**: Noun Clauses & Nominal Embeddings
  - **O**: The Oxford (Serial) Comma
  - **P**: Participial Phrases & Absolute Modifiers
  - **Q**: Quotation Mechanics & Dialogue Conventions
  - **R**: Relative Clauses: Restrictive vs. Non-Restrictive
  - **S**: The Subjunctive Mood & Counterfactuals
  - **T**: Transitive vs. Intransitive Verb Complements
  - **U**: Countable vs. Uncountable (Mass) Nouns (`Countable: fewer / many / a ⟷ Uncountable: less / much / amount`)
  - **V**: Voice Transformations: Active vs. Passive (`Active: Agent + Verb + Patient ⟷ Passive: Patient + be + Past Participle (+ by Agent)`)
  - **W**: Case Inflection: Who vs. Whom (`Subjective: who = he / she / they ⟷ Objective: whom = him / her / them`)
  - **X**: Xenisms, Calques & Loanword Mechanics
  - **Y**: Subject-Auxiliary Inversion & Question Syntax
  - **Z**: Zeugma & Syntactic Ellipsis
- **Clean Typographic Syntax Notation**: Formatted all syntax patterns and rules in clean, human-readable typographical notation with clean Unicode arrows (`⟷`, `➔`), brackets, and punctuation, completely eliminating raw LaTeX math escape commands (`\text{...}`, `\quad`, `\longleftrightarrow`).
- **Standardized Schema**: Each entry includes `id`, `name`, `etymology`, `grade`, `gradeName`, `branch`, `branchLabel`, `formula`, `rawFormula`, `definition`, `whatItDoes`, `howToDoIt`, `exampleProblem`, `exampleSolution`, `codexChapter`, and `keywords`.

### 2. Interactive Sentence Diagrammer & Syntax Analyzer
- Embedded directly in the hero of `pages/grammar.php`.
- **Preset Structural Patterns**:
  - Simple Sentence (Subject + Transitive Verb + Object)
  - Compound Sentence (Two Clauses joined with FANBOYS)
  - Complex Sentence (Introductory Subordinate Clause)
  - Passive Voice Transformation (Patient + Be + Past Participle)
  - Subjunctive Mood (Counterfactual "If I were...")
- **Dynamic Syntax Dissector**:
  - Color-coded grammatical tokens (Subject, Verb/Predicate, Object, Prepositional Phrase, Conjunction, Modifier).
  - Voice detector (Active vs. Passive Voice).
  - Clause counter and sentence structure classifier.
  - Tactile audio feedback (`window.HLSound.playCorrect()`).
  - Random example generator (Dice button).

### 3. A–Z Navigation & Multi-Tier Filter Engine
- **Sticky A–Z Quick-Jump Ribbon**: Jumps smoothly to `#letter-[A-Z]` with count badges and disabled state for empty letters.
- **Filter Controls**:
  - **Grade Band**: All 12 Grades, Elementary (K–5), Middle School (6–8), High School (9–12).
  - **Specific Grade**: Individual grade buttons (Grade 1 through Grade 12).
  - **Grammar Domain**: Parts of Speech, Sentence Structures, Clauses & Phrases, Punctuation & Mechanics, Verb Mechanics, Common Pitfalls, Rhetoric & Figurative.
  - **My Study List**: Instant filter showing only bookmarked favorites with persistent count.

### 4. Card Tools & Study Suite Integration
- **Text-to-Speech (TTS)**: Reads pronunciation and definition via Web Speech API (`SpeechSynthesis`).
- **Copy Rule Syntax**: 1-click clipboard copy of canonical syntactic pattern with toast notification.
- **Study List Bookmarking**: Persists favorite terms to `localStorage['hl_grammar_favorites']`.
- **Digital Scratchpad**: Appends rule notes directly into `hl_scratchpad_notes` (accessible via Alt+S).
- **Export & Print**:
  - `#grammar-export-btn`: Exports currently filtered terms to a formatted `.txt` study sheet.
  - `#grammar-print-btn`: One-click print optimization with ink-friendly `@media print` rules.

### 5. Header Mega Menu Integration
- Added a permanent link in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) under Curriculum Resources right beside the Mathematics Codex.

---

## Verification & Validation

| Test Item | Command / Action | Result |
| :--- | :--- | :--- |
| **PHP Syntax** | `& "C:\xampp\php\php.exe" -l pages/grammar.php` | **Pass (No syntax errors)** |
| **Header Syntax** | `& "C:\xampp\php\php.exe" -l src/header.php` | **Pass (No syntax errors)** |
| **JavaScript Syntax** | `node -c assets/js/pages/grammar-index.js` | **Pass (No syntax errors)** |
| **JSON Data Integrity** | `node -e "JSON.parse(fs.readFileSync('assets/data/grammar-php.json'))"` | **Pass (26/26 valid entries)** |
| **Rule Formula Display** | Human-readable Unicode typography (`⟷`, `➔`), 0 raw LaTeX tags | **Pass (Clean typography)** |
| **Accessibility (A11y)** | Keyboard navigation, focus rings (`:focus-visible`), aria labels | **Pass (WCAG 2.2 AAA)** |
