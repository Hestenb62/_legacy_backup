---
title: "Grade 9 Math Curriculum Popup Overhaul Implementation Plan"
date: "2026-09-27"
category: "Implementation Plan"
tags: ["Curriculum", "Grade 9", "Algebra I", "Modal", "UI/UX", "Standards", "CCSS"]
summary: "Architectural plan to overhaul the Grade 9 Mathematics curriculum popup into a course-focused Algebra I dashboard with semester roadmaps, interactive module accordions, and standard chips."
author: "Antigravity & Hesten"
---

# Grade 9 Math Curriculum Popup Overhaul Implementation Plan

## 1. Overview & Objective
Transform the curriculum modal (`#doc-modal`) when viewing **Grade 9 Mathematics** from a plain generic text dump into an interactive, course-focused **Algebra I Dashboard**. 
The popup will maintain multi-subject tabs (Math, ELA, Science, Social) at the top, while giving Grade 9 Math a high-school curriculum presentation featuring semester roadmaps, module breakdowns, direct lesson links, and CCSS high school conceptual strand chips.

## 2. Architectural Blueprint

### A. High School Course Hero Banner
- **Course Identity**: Prominently display **Algebra I** as the foundational high school mathematics credit.
- **Accreditation & Alignment**: Badges for `Grade 9 Core Math`, `CCSS & Regents Aligned`, and `Level K Track`.
- **Course Metric Cards**:
  - 5 Comprehensive Modules
  - 2 Semester Progression Roadmap
  - 8 CCSS Conceptual Strands (Algebra, Functions, Modeling, Statistics)
  - Quick launch button directly to Level K Math exercises (`/levels/k.php`).

### B. Semester Roadmap & Module Navigation
- **Filter Controls**:
  - `All Modules (Full Year)`
  - `Semester 1 (Fall)`:
    - Module 1: Relationships Between Quantities & Reasoning with Equations and Graphs (28 Lessons)
    - Module 2: Descriptive Statistics (20 Lessons)
  - `Semester 2 (Spring)`:
    - Module 3: Linear & Exponential Functions (24 Lessons)
    - Module 4: Polynomial & Quadratic Expressions, Equations & Functions (30 Lessons)
    - Module 5: Synthesis of Modeling with Equations & Functions (11 Lessons)
  - `High School CCSS Strands`: Interactive pills for A-SSE, A-APR, A-CED, A-REI, F-IF, F-BF, F-LE, S-ID.

### C. Redesigned Module & Topic Accordion
- **Module Header**: Module badge, module title, topic count, lesson count, and expand/collapse caret.
- **Topic Cards**: Topic letter badge (Topic A, B, C, etc.) and clear descriptive title.
- **Lesson Items**:
  - Lesson number & title.
  - Direct launch links where available.
  - Clickable CCSS standard chips linking to `/pages/standards.php?subject=math&grade=9th%20Grade&code=...`.

### D. Multi-Subject Tab Compatibility
- Retain tabs for Mathematics, English Language Arts, Science, and Social Studies.
- When Mathematics is active on Grade 9, activate the specialized Algebra I dashboard view. ELA, Science, and Social continue to render reliably.

## 3. Implementation Steps
1. **Styles**: Add modern CSS in `assets/css/components/mastery-modals.css` or dedicated popup styles for the course hero, semester roadmap selector, module cards, topic pills, and strand chips.
2. **Logic in `assets/js/index-main.js`**:
   - Enhance `openDocModal()` to detect Grade 9 Math and render the dedicated Algebra I dashboard template.
   - Implement semester filter switcher (`switchGrade9MathSemester(sem)`).
3. **Data Verification**:
   - Ensure `curriculum-engageny-math.json` 9th Grade data is seamlessly mapped and formatted.
4. **Accessibility (WCAG 2.1/2.2 AA & AAA)**:
   - Full keyboard operability on semester tabs and module accordions.
   - Visible focus indicators.
   - Screen reader announcements on semester filter toggles.
5. **Walkthrough & Persistence**:
   - Save walkthrough report in `updates/docs/2026-09-27-grade-9-math-curriculum-popup-walkthrough.md`.
