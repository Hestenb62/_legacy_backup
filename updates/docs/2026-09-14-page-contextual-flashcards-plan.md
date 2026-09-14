---
title: "Page-Contextual Adaptive Flashcards Plan"
date: "2026-09-14"
category: "Implementation Plan"
tags: ["Flashcards", "Leitner", "Level Pages", "Reader", "Grade 4", "Contextual Study"]
summary: "Enable intelligent, page-contextual flashcard decks across Grade Level pages (Math, Social Studies, Science, ELA), the Digital Reader (book-tailored decks), and interactive lessons."
author: "Antigravity & Hesten"
---

# Implementation Plan: Page-Contextual Adaptive Flashcards

Enable intelligent, page-contextual flashcard decks across Hesten's Learning platform. When a student opens the Flashcard Studio, it will automatically detect the page context (e.g. Grade 4 Math, Grade 4 Social Studies, or a specific Digital Reader book like *1984*) and immediately present tailored flashcards for that specific subject, grade level, or book.

## Architecture & Objectives

1. **Context Awareness**:
   - **Level Pages**: Detect active level (e.g. Grade 4 on `levels/f.php`) and active subject tab (`math`, `social`, `science`, `ela`). Auto-select the corresponding deck.
   - **Digital Reader**: Detect active book from `window.BOOK_METADATA.id`, query param `?book=...`, or path. Auto-select the book-specific deck (e.g. *1984*, *Frankenstein*, *The Federalist Papers*).
   - **Lesson Pages**: Extract in-page lesson vocabulary if on a specific interactive lesson.

2. **Curated Flashcards**:
   - High-yield decks for Grade 4 Math, Grade 4 Social Studies, Grade 4 Science, Grade 4 ELA, and key literary works.
   - Offline-resilient dataset stored in `assets/data/flashcard-curriculum-decks.json` and cached in memory.

3. **User Experience**:
   - Dynamic `<select id="flashcard-deck-select">` with grouped optgroups, pinning `★ Current Page: [Deck Name]` at the top.
   - Context indicator badge in the studio header.
   - Full backward compatibility with custom student decks, imported reader highlights, and Leitner SRS progression.
