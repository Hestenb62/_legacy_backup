---
title: "Unified Super Scratchpad & Whiteboard Studio Implementation Plan"
date: "2026-09-29"
version: "v2.5.0"
category: "Implementation Plan"
tags: ["Scratchpad", "Whiteboard", "MathJax", "A11y", "UDL", "Data-Sync"]
summary: "Comprehensive architectural roadmap to transform Hesten's Learning Scratchpad into a unified multi-page notebook, digital math whiteboard, formula quick-insert palette, and side-by-side docking studio."
author: "Antigravity & Hesten"
---

# Unified Super Scratchpad & Whiteboard Studio Implementation Plan

## Executive Overview
The current scratchpad is a single-note textarea modal with basic study templates, speech-to-text, and plain text download. This initiative evolves it into a **Unified Super Scratchpad & Whiteboard Studio** that seamlessly serves both humanities/language arts study (multi-page notes, Markdown, templates, speech dictation) and STEM/mathematics work (digital whiteboard canvas, undo/redo, shapes, math grid paper, formula quick-insert, MathJax live preview), complete with a side-by-side docking mode for reading lessons while taking notes.

---

## 1. Key Architectural Upgrades

### A. Multi-Page / Tabbed Notebook System
- **Data Model**: Store structured notebook notebooks in `localStorage['hl_scratchpad_notebook']` as an array of note objects:
  ```json
  [
    {
      "id": "note_1727654400000",
      "title": "Math Notes - Quadratic Formula",
      "content": "Quadratic equation: $ax^2 + bx + c = 0$\n...",
      "canvasData": "data:image/png;base64,...",
      "template": "blank",
      "createdAt": 1727654400000,
      "updatedAt": 1727654400000
    }
  ]
  ```
- **Backward & Cross-Module Compatibility**:
  - Automatically bridge active note text to `localStorage['hl_scratchpad']` and `localStorage['hl_scratchpad_notes']`.
  - When labs or grammar cards export notes via `hl_scratchpad_notes` or `exportWorkToScratchpad()`, append them cleanly to the active note or create an "Exported Notes" notebook entry.
  - Broadcast `hl:data-sync` and listen to `storage` events for instant multi-tab reactivity.

### B. Dual-Mode Interface: Notes Editor & Whiteboard Canvas
- **Tabbed Workspace Switcher**:
  1. **Text Notes & Formats**: Rich template insertion (Cornell, K-W-L, MLA, APA, etc.), live word/character/reading-time statistics, search & replace, and MathJax live formula preview.
  2. **Whiteboard Canvas**: Full HTML5 vector/raster drawing canvas with:
     - Drawing Pen with thickness & color picker (curated high-contrast palette).
     - Highlighter (semi-transparent yellow/cyan/green/pink).
     - Eraser with adjustable size.
     - Geometric Shapes (Line, Arrow, Rectangle, Circle).
     - Infinite Undo & Redo history stacks.
     - Background grid selector: Plain White/Dark, Dot Grid, Math Graph Grid (cartesian), Isometric Grid.
     - Canvas snapshot export to PNG and "Insert Canvas Drawing into Note" as image markdown.

### C. Side-by-Side Docking / Split View Mode
- Provide a tri-state layout mode:
  1. **Centered Modal** (Default, focused note taking).
  2. **Docked Sidebar (Right Split View)**: Pins to the right edge (450px wide, resizable on desktop), allowing students to read curriculum text, view interactive labs, or take quizzes while keeping their notes or whiteboard open and interactive without blocking page scrolling.
  3. **Full Screen Studio**: Expands to 100vw x 100vh for complex math derivations or long essay drafting.

### D. Math & Formula Quick-Insert Palette with Live MathJax Preview
- Quick-insert buttons for common LaTeX mathematical structures:
  - Fractions: `\frac{a}{b}`
  - Powers & Roots: `x^{2}`, `\sqrt{x}`, `\sqrt[n]{x}`
  - Calculus & Sequences: `\sum_{i=1}^{n}`, `\int_{a}^{b}`, `\lim_{x \to \infty}`
  - Greek Symbols: `\pi`, `\theta`, `\alpha`, `\beta`, `\Delta`, `\lambda`, `\sigma`
  - Relational & Set Operators: `\approx`, `\leq`, `\geq`, `\neq`, `\in`, `\subset`
- **Interactive Live Math Preview**: Toggleable preview split card rendering LaTeX formulas in real time using platform MathJax SVG standards.

### E. Rich Export, Accessibility & UDL Superpowers
- **Export Actions**:
  - Download as Markdown (`.md`).
  - Download as Text (`.txt`).
  - Download Drawing as PNG (`.png`).
  - Copy all / Copy selection to Clipboard with visual confirmation toast.
  - Print-optimized view (`@media print` targeting notes and whiteboard output).
- **UDL Typography & Focus**:
  - Dyslexia-friendly font toggle (OpenDyslexic / Lexend).
  - Monospaced code/math font toggle.
  - Font scaling (A- / A+).
  - Full keyboard shortcuts (`Alt+S` toggle, `Esc` close/minimize, `Alt+N` new note, `Alt+D` voice dictation).
  - High-contrast `:focus-visible` outlines and full ARIA modal dialog semantics with `aria-live` status regions.

---

## 2. Affected Files & Deliverables
1. `src/partials/scratchpad.php`: Comprehensive upgrade of markup structure to support tabbed notebooks, dual-view editor/whiteboard, math toolbar, and docking controls.
2. `assets/css/components/fixed-tools.css`: Modern glassmorphic styles, docked sidebar mode styles, whiteboard canvas styles, math toolbar buttons, and responsive breakpoints.
3. `assets/js/scratchpad-studio.js`: Modular, high-performance scratchpad engine managing notebook persistence, canvas drawing engine, undo/redo, MathJax preview, voice dictation, and global API `window.HLScratchpad`.
4. `assets/js/global-study-tools.js` & `assets/js/global-site-layout.js`: Wire up cleanly to new `HLScratchpad` engine to prevent conflicting event listeners while maintaining full backward compatibility.
5. `src/header.php` / `src/footer.php`: Ensure `assets/js/scratchpad-studio.js` is loaded site-wide alongside `global-study-tools.js`.

---

## 3. Verification & Compliance
- Validate keyboard navigation (`Tab`, `Shift+Tab`, `Space`, `Enter`, `Esc`).
- Verify contrast ratios in Light, Dark, and Midnight themes.
- Test speech-to-text dictation and real-time MathJax equation preview.
- Test notebook creation, renaming, switching, autosaving, and cross-tab sync via `localStorage`.
- Verify docking mode side-by-side alongside lessons and quizzes.
