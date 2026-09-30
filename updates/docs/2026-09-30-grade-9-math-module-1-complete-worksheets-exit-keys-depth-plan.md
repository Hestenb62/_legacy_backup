---
title: "Grade 9 Algebra I Module 1 Complete Worksheets, Exit Keys & Full Depth Plan"
date: "2026-09-30"
version: "v2.7.0"
category: "Implementation Plan"
tags: ["Curriculum", "Algebra I", "Grade 9", "Worksheets", "Exit Tickets", "Eureka Math"]
summary: "Plan to integrate all student and teacher worksheets, verbatim Eureka Math exit ticket keys for Check Understanding, and complete pedagogical depth across all 28 Module 1 lessons."
author: "Antigravity & Hesten"
---

# Grade 9 Algebra I Module 1 Complete Worksheets, Exit Keys & Full Depth Plan

## 1. Overview & Objectives

In response to user feedback, we are expanding all 28 lessons of Grade 9 Algebra I Module 1 with three major enhancements:
1. **Official Student & Teacher Worksheets**: Integrate direct access, download, and printing links for all 28 Student Worksheets (PDF & DOCX) and Teacher Editions / Answer Keys (PDF & DOCX) from `assets/Module 1/`.
2. **Authentic Exit Ticket Keys for "Check Understanding"**: Replace generic practice questions with exact copy/paste extraction of the Eureka Math Exit Ticket problems and official Teacher Sample Solutions/Keys across all 28 lessons.
3. **Full Pedagogical Depth ("Meat") Across Lessons 10–28**: Extend the Guided Exercises, step-by-step expandable solutions, scaffolding hints, and Common Pitfall callouts from the pilot (Lessons 1–9) to cover all 19 remaining lessons in Topic C (Lessons 10–24) and Topic D (Lessons 25–28).

---

## 2. Component Design & Schema Architecture

### 2.1 Worksheets Metadata & UI Integration
In each lesson JSON:
```json
"resources": {
    "studentPdf": "/assets/Module%201/algebra-i-m1-student-materials/algebra-i-m1-topic-a-lesson-1-student.pdf",
    "studentDocx": "/assets/Module%201/algebra-i-m1-student-materials/algebra-i-m1-topic-a-lesson-1-student.docx",
    "teacherPdf": "/assets/Module%201/algebra-i-m1-teacher-materials/algebra-i-m1-topic-a-lesson-1-teacher.pdf",
    "teacherDocx": "/assets/Module%201/algebra-i-m1-teacher-materials/algebra-i-m1-topic-a-lesson-1-teacher.docx",
    "modulePdf": "/assets/Module%201/algebra-i-m1-student-materials.pdf"
}
```

In `src/lesson_renderer.php`, add a dedicated **Official Curriculum Worksheets & Downloads** section:
- **Student Classwork & Problem Set Box**: Downloadable PDF, editable DOCX, and direct Print button.
- **Teacher Edition & Solutions Key Box**: Downloadable teacher guide with full answers and scaffolding notes.
- Accessible buttons with descriptive `aria-label` tags and icons.

### 2.2 Verbatim Exit Ticket Keys in "Check Understanding"
In each lesson JSON, `practiceQuestions` will be populated directly from the teacher materials' **Exit Ticket Sample Solutions**:
- **Question**: Exact question prompt from the Eureka Math Exit Ticket.
- **Options**: The correct solution alongside common plausible distractor choices reflecting the identified student pitfalls.
- **Explanation**: The verbatim step-by-step teacher sample solution and scoring guidance.

### 2.3 Guided Exercises Across Topics C & D
Author authentic multi-step Guided Exercises for Lessons 10–28:
- **Topic C (Lessons 10–24)**: True/false equations, solution sets, deductive justification proofs, potential dangers/extraneous solutions, inequalities, compound statements, factored equations (Zero Product Property), equations with variables in denominator, rearranging formulas, 2-variable equations and inequalities (half-planes), and systems of simultaneous equations (substitution, elimination, feasible regions).
- **Topic D (Lessons 25–28)**: Solving problems in two ways (arithmetic rates vs. algebraic variables), recursive double-and-add-5 challenge problems (Parts 1 & 2), and federal income tax piecewise modeling.

---

## 3. Execution Phases

1. **Renderer & CSS Updates**:
   - Add the Worksheets & Printable Resources UI panel to `src/lesson_renderer.php`.
   - Add responsive styles in `assets/css/pages/lesson.css` for worksheet resource badges and action buttons.
2. **Data Extraction & Batch Enrichment**:
   - Build a comprehensive Python script to parse all 28 teacher `.docx` files.
   - Extract authentic Exit Ticket questions and Sample Solutions into `practiceQuestions`.
   - Author rich `guidedExercises` for Lessons 10–28.
   - Attach `resources` worksheet file links to all 28 JSON files.
3. **Verification**:
   - Validate JSON syntax across all 28 files.
   - Test rendering on sample lessons from Topic A, B, C, and D via PHP CLI.
   - Confirm worksheet download links and print buttons.
4. **Documentation**:
   - Record results in `updates/docs/2026-09-30-grade-9-math-module-1-complete-worksheets-exit-keys-depth-walkthrough.md`.
