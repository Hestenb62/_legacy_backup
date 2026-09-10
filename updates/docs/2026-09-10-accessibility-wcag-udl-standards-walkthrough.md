---
title: "Mandatory Site-Wide WCAG, A11y & UDL Compliance Standards Walkthrough"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Accessibility", "A11y", "WCAG", "UDL", "Section 508", "Standards", "Invariants"]
summary: "Comprehensive walkthrough of the permanent, non-negotiable architectural invariant codified into the repository rules and AGENTS.md, mandating absolute compliance with WCAG 2.1/2.2 AA & AAA, A11y, and UDL standards across all current and future development."
author: "Antigravity & Hesten"
---

# Mandatory Site-Wide WCAG, A11y & UDL Compliance Standards Walkthrough

## 1. Overview & Objectives
Following user review and approval of the **Learning Proposal**, we established a strict, non-negotiable architectural invariant across **Hesten's Learning**: Under no circumstances shall any page, component, feature, style, or script fail to comply with **WCAG 2.1/2.2 (Level AA & AAA)**, digital accessibility (**A11y**), and CAST **Universal Design for Learning (UDL)** standards.

---

## 2. Key Changes & Architectural Standards

### A. New Workspace Rule & Master Guidelines
- **Created [`.agents/rules/accessibility-wcag-udl.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/.agents/rules/accessibility-wcag-udl.md)**:
  - Establishes unconditional compliance invariants for every code modification and feature rollout.
  - Mandates 100% keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`), high-visibility `:focus-visible` focus rings, contrast safety (≥4.5:1 AA, ≥7:1 AAA high contrast), user-scalable viewports, skip navigation links, and screen reader live region announcements.
  - Embeds the CAST UDL framework across curriculum delivery: Multiple Means of Representation, Multiple Means of Action & Expression, and Multiple Means of Engagement.
  - Outlines an Agent Enforcement Checklist required prior to finalizing any code edits.
- **Updated [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md)**:
  - Added **Section 4: Universal WCAG, A11y & UDL Compliance Mandate** as a permanent platform constraint.

### B. Core Invariant Summary for All Roles & Pages
1. **WCAG Perceivable**:
   - Every informative image and SVG must provide meaningful alternative text (`alt` / `aria-label`).
   - Purely decorative graphics must feature empty `alt=""` and `aria-hidden="true"`.
   - Text contrast must meet or exceed 4.5:1 for normal text (AA) and 7:1 in High Contrast mode (AAA).
   - Information must never be communicated through color alone.
   - Mobile pinch-to-zoom must remain enabled (`user-scalable=no` is strictly forbidden), and layouts must reflow smoothly down to 320px width.
2. **WCAG Operable**:
   - 100% of controls must be keyboard operable without trapping focus.
   - Focus rings must never be hidden without high-visibility replacement.
   - The Skip Navigation link (`#main-content`) must remain active at the top of every page.
   - Touch targets must adhere to the 44×44px minimum sizing guideline.
3. **WCAG Understandable & Robust**:
   - Proper HTML5 landmark and heading hierarchies (`<h1>`-`<h6>`).
   - Accessible form inputs with `<label for="...">` and `aria-describedby`.
   - ARIA live regions (`aria-live="polite"`) for asynchronous status changes.
4. **Universal Design for Learning (UDL)**:
   - **Representation**: Multimodal delivery (visual, synthesized read-aloud, synchronized karaoke highlighting, MathJax math).
   - **Action & Expression**: Multimodal student response (speech-to-text dictation, hotkeys, step-by-step scaffolds).
   - **Engagement**: Low-anxiety modes, untimed assessments, sensory retreat presets, and persistent IEP/504 parent accommodations.

---

## 3. Verification & Validation
- Verified that [`.agents/rules/accessibility-wcag-udl.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/.agents/rules/accessibility-wcag-udl.md) is saved and formatted with valid YAML frontmatter.
- Validated that [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md) contains Section 4.
- Confirmed that the implementation plan and walkthrough are indexed and searchable on the Updates Portal (`/updates.php` and `/updates/`).
