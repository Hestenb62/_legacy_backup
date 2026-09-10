---
trigger: always_on
---

# Rule: Mandatory Site-Wide WCAG, A11y & UDL Compliance

## Core Invariant
Under NO circumstances shall any page, component, feature, or code change on Hesten's Learning fail to comply with **WCAG (2.1/2.2 AA & AAA)**, **A11y**, and **Universal Design for Learning (UDL)** standards. Accessibility is an unconditional platform mandate.

### 1. WCAG & A11y Invariants
- **Keyboard Access**: 100% of interactive controls must be operable via keyboard (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`). Never use unsemantic elements (`<div onclick>`) without `role="button"`, `tabindex="0"`, `keydown` listeners, and `aria-label`.
- **Focus Rings**: Never remove focus outlines (`outline: none`) without an explicit, high-contrast `:focus-visible` replacement.
- **Color Contrast & Independence**: Normal text must meet ≥4.5:1 (AA) and High Contrast mode must meet ≥7:1 (AAA). Information conveyed by color must always include text or icon redundantly.
- **Responsive Zoom & Reflow**: Never disable mobile zoom. Viewport must allow user scaling. Pages must reflow down to 320px width without horizontal scrollbars.
- **Accessible Names & Semantics**: Every button, link, and input must possess an accessible name via visible text, `aria-label`, or `<label for="...">`. Informative images must have descriptive `alt` text; decorative images must have `alt=""` and `aria-hidden="true"`.
- **Live Regions**: Asynchronous state changes (score updates, form errors, search results) must announce to assistive technology via `aria-live="polite"`.

### 2. Universal Design for Learning (UDL) Standards
- **Representation**: Provide content through multimodal channels (visual typography, synthesized read-aloud, MathJax math, interactive simulations).
- **Expression**: Support alternate student response methods (keyboard shortcuts, speech dictation, manipulatives, step-by-step hints).
- **Engagement**: Respect low-anxiety modes, untimed accommodations, sensory retreat presets, and positive reinforcement feedback loops.

### 3. Agent Enforcement Checklist
Before finalizing any code change:
1. Are all interactive controls keyboard operable and visibly focused?
2. Does the page pass contrast requirements in both light, dark, and high-contrast modes?
3. Are all images, icons, and buttons equipped with descriptive accessible names?
4. Are accommodations (OpenDyslexic, bionic reading, Irlen tints, dyscalculia colorizer) preserved and functional?
