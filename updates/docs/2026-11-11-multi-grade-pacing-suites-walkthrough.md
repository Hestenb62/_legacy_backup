---
title: "Universal Multi-Grade Wave & Traditional Pacing Suites Walkthrough"
date: "2026-11-11"
version: "v2.38.2"
category: "Walkthrough"
tags: ["Pacing Guide", "Multi-Grade", "Wave Structure", "Fiscal Calendar", "Educator Suite", "Pre-K to High School"]
summary: "Full expansion of the Educator Suite Pacing Guide to support all 11 grade levels (Pre-K through High School) with independent 36-Week Traditional and 48-Week Year-Round Fiscal Wave schedules."
author: "Antigravity & Hesten"
---

# Universal Multi-Grade Wave & Traditional Pacing Suites Walkthrough

## Executive Summary
Version **v2.38.2** elevates the Hesten's Learning Educator Suite Pacing Guide into a **Universal Multi-Grade Curriculum Engine**. All 11 grade levels on the platform—from early childhood (**Pre-K** / Level A) through secondary graduation (**High School** / Levels K–N)—now possess dedicated, standards-aligned scope and sequence plans switchable between two distinct operational calendars:
1. **Classic 36-Week Traditional Schedule (4 Quarters):** 9-week quarters with spiral reviews and milestone checkpoints.
2. **Year-Round Wave Structure (6 Waves • 48 Weeks • Fiscal Calendar: July 1 – June 30):** 8-week waves featuring an intentional **7+1 learning cycle** (7 weeks of core instructional immersion followed by 1 week dedicated to formative/summative testing, finishing open work, and planning for the next wave).

Both models operate completely independently and feature grade-namespaced progress tracking in `localStorage`, eliminating cross-grade state interference for multi-grade homeschool families and educators.

---

## 1. Architectural Highlights

### Multi-Grade Curriculum Registry (`assets/js/standards/pacing-curriculum-registry.js`)
We constructed a modular curriculum registry defining grade metadata, standard alignments, and scope-and-sequence plans across all 11 grade keys:
- **`'pre-k'` (Level A):** Foundations of counting, early literacy phonemes, physical science exploration, and community helpers.
- **`'k'` (Level B):** CCSS Kindergarten math (cardinality, operations), ELA foundational decoding, NGSS early life/earth systems, and C3 civics.
- **`'1'` (Level C):** Operations within 20, place value concepts, reading fluency, light/sound waves, and family history.
- **`'2'` (Level D):** Base-ten to 1,000, multi-digit addition/subtraction, reading comprehension, matter & habitats, and geography.
- **`'3'` (Level E):** Multiplication/division foundations, fraction introduction, narrative analysis, forces & magnetism, and regional history (retains comprehensive custom curriculum mapping).
- **`'4'` (Level F):** Multi-digit algorithms, fraction equivalence, informational close reading, earth systems & energy, and state history.
- **`'5'` (Level G):** Decimal operations, fraction multiplication/division, inquiry-based reading, astronomy & properties of matter, and early American history.
- **`'6'` (Level H):** Ratios & unit rates, algebraic expressions, literary analysis, cellular systems & thermal energy, and ancient world civilizations.
- **`'7'` (Level I):** Proportional reasoning, operations with rational numbers, argumentative text synthesis, genetics & rock cycles, and medieval world history.
- **`'8'` (Level J):** Linear equations, functions, Pythagorean theorem, critical literary analysis, forces/motion & waves, and early US constitutional history.
- **`'hs'` (Levels K–N):** High school algebra & geometric models, advanced rhetorical analysis & argumentative writing, biological systems & chemistry, and US government/civics capstones.

### Dynamic Scope & Sequence Generator (`buildGradePacingSchedule(gradeKey, model)`)
- **`model === 'traditional'`**: Returns 36 weeks organized across 4 quarters (9 weeks each).
  - Rotates primary subject focus across Mathematics, English Language Arts, Science, and Social Studies.
  - Dedicates Week 8 of each quarter to targeted skill fluency sprints.
  - Dedicates Week 9 of each quarter to quarterly milestone evaluations and synthesis reviews.
- **`model === 'wave'`**: Returns 48 weeks organized across 6 waves (8 weeks each) aligned with the fiscal calendar (July 1 to June 30).
  - Weeks 1 through 7 of each wave deliver uninterrupted instructional immersion.
  - Week 8 of each wave is designated as a **Synthesis Week** (`isTestingWeek: true`), explicitly focusing on formative mastery testing, finishing pending assignments, and planning the next wave.

---

## 2. Educator Suite UI & Controls (`pages/teachers.php` & `teachers-main.js`)

### Grade Selector & Active Badge
- Added an accessible `<select id="pacing-grade-select">` to the Pacing Toolbar containing all 11 grade levels.
- Added a visual and screen-reader accessible grade pill `<span class="pacing-grade-badge" id="pacing-grade-badge">Grade 3 (Level E)</span>`.
- Selection automatically updates the active schedule view in real time and persists to `localStorage['hl_pacing_grade']`.

### Independent Grade & Model Progress Persistence
To prevent progress checkboxes checked in one grade from affecting other grades:
- Traditional progress is stored in `localStorage['hesten_teacher_pacing_progress_' + grade]`.
- Wave progress is stored in `localStorage['hesten_teacher_pacing_wave_progress_' + grade]`.
- Backward compatibility: If Grade 3 is active and no grade-namespaced key exists, it seamlessly falls back to legacy keys (`hesten_teacher_pacing_progress` and `hesten_teacher_pacing_wave_progress`).

### Dynamic Syllabus Printing
- When printing via **Print Pacing Syllabus** (`window.print()`), print headers dynamically update:
  - Document Title: `[Grade Name] Curriculum Pacing Guide` (e.g. `Grade 5 (Level G) Curriculum Pacing Guide`).
  - Subtitle: Reflects the active model (e.g. `Year-Round Fiscal Wave Structure (6 Waves • 48 Weeks • July 1 – June 30)` or `36-Week Traditional Schedule (4 Quarters)`).
- Printable output adheres to 8.5" x 11" page breaks and high-contrast monochrome readability.

---

## 3. Verification & Compliance Checklist

| Criterion | Implementation | Status |
| :--- | :--- | :--- |
| **All 11 Grades Supported** | Pre-K through High School fully defined in `pacing-curriculum-registry.js` | PASS |
| **Dual Calendar Models** | Both 36-Week Traditional and 48-Week Year-Round Fiscal Wave available on all 11 grades | PASS |
| **7+1 Wave Structure** | 7 weeks instructional immersion + 1 week synthesis testing & planning in every wave | PASS |
| **State Isolation** | Progress checkboxes namespaced per grade and per model in `localStorage` | PASS |
| **Print Optimization** | Dynamic grade & model print titles; clean margins and high-contrast tables | PASS |
| **WCAG 2.1 AA/AAA** | Full keyboard navigation (`Tab`, `Space`, `Enter`), `:focus-visible` rings, semantic ARIA | PASS |
| **Offline First** | Zero network dependencies for schedule rendering, progress toggling, or printing | PASS |
| **Documentation Sync** | Help Center (`assets/text/hc-pacing-guide.md`) and Footer Release Modal updated | PASS |

---

## 4. Source Files Modified
- [`assets/js/standards/pacing-curriculum-registry.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/standards/pacing-curriculum-registry.js) *(New)*
- [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php)
- [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css)
- [`assets/js/pages/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/teachers-main.js)
- [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) *(Bumped to v2.38.2)*
- [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) *(Bumped fallback to v2.38.2 & updated What's New modal)*
- [`assets/text/hc-pacing-guide.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-pacing-guide.md)
- [`updates/docs/2026-11-11-multi-grade-pacing-suites-walkthrough.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-11-11-multi-grade-pacing-suites-walkthrough.md) *(New)*

