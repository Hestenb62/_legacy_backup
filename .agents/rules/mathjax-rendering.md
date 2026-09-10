---
trigger: always_on
---

# Rule: Universal MathJax Mathematical Typography & Rendering Standard

## Core Invariant
Whenever mathematical notation (LaTeX, TeX delimiters `$...$`, `$$...$$`, `\(...\)`, `\[...\]`) is present on any page—statically rendered or dynamically injected—it must typeset automatically, scale responsively, adapt to color themes, and never overflow or break page layout.

### 1. Architectural Guidelines for Math Display
- **Responsive Layout & Overflow**:
  - Block equations (`mjx-container[display="true"]`) must have `display: block; max-width: 100%; overflow-x: auto; overflow-y: hidden; text-align: center; margin: 1rem 0; padding: 0.25rem 0; -webkit-overflow-scrolling: touch;`.
  - Inline equations (`mjx-container:not([display="true"])`) must have `display: inline-block; vertical-align: -0.22ex; margin: 0 0.15em; font-size: inherit; line-height: 0;`.
  - Equation SVGs must inherit `fill: currentColor; stroke: currentColor;` for dark mode and accessibility contrast compliance.

### 2. Universal Auto-Detection & Typesetting
- `src/header.php` must detect all standard math notations: `$...$`, `$$...$$`, `\(...\)`, `\[...\]`, and `\begin{...}` across both static page markup and dynamically injected DOM nodes.
- A debounced `MutationObserver` in `src/header.php` must watch for added elements containing math notation and automatically invoke `window.ensureMathJax(node)`.

### 3. Safe Typeset Promise Chaining & Resilient Loading
- `window.ensureMathJax` must chain `typesetPromise` onto an internal sequential queue (`Promise.resolve().then(...)`) to prevent concurrent typesetting collisions.
- If `#MathJax-script` is already present or loaded, `ensureMathJax` must check `MathJax.typesetPromise` immediately instead of relying solely on pending `load` event listeners.
- Include a fallback to CDN if local `tex-svg.js` fails to load.
