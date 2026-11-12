---
title: "Wave Week Playbook, Pacing Suggestions & Differentiated Library Suite Walkthrough"
date: "2026-11-11"
version: "v2.39.0"
category: "Walkthrough"
tags: ["Pacing Guide", "Wave Structure", "Weekly Playbook", "Differentiation", "Lexile Customization", "Library Resources", "Printable Blueprint", "Educator Suite"]
summary: "Interactive weekly playbook modal popup deployed across all 48 weeks of the Year-Round Fiscal Wave Structure, featuring Monday-Friday daily breakdowns, customizable pacing rhythms, Lexile-aligned library literature, on-the-fly differentiation, and 1-click printable PDF blueprints."
author: "Antigravity & Hesten"
---

# Wave Week Playbook, Pacing Suggestions & Differentiated Library Suite Walkthrough

## Executive Summary
Version **v2.39.0** introduces the **Wave Week Playbook & Differentiation Engine** into the Educator Suite ([`pages/teachers.php#pacing`](/pages/teachers.php#pacing)). Every week across all 6 waves of the **48-Week Year-Round Fiscal Wave Structure (July 1 – June 30)** now features a dedicated **"Week Playbook"** action button and interactive popup dialog.

The playbook provides:
1. **Actionable Weekly Scope ("What Should Be Done")**: Day-by-day Monday through Friday instructional steps tailored to either **Instructional Immersion (Weeks 1–7)** or **Synthesis & Testing (Week 8)**.
2. **Pedagogical Pacing Suggestions**: 4 selectable rhythm profiles (Standard Spiral, Accelerated Deep-Dive, Scaffolded & Low-Anxiety, and Intensive Tier 3 Intervention) with tailored time blocks and UDL accommodations.
3. **Curated Digital Library Literature**: Authentic literature, non-fiction texts, and decodables automatically matched to the selected reading Lexile range (BR through 1200L+).
4. **On-the-Fly Differentiation Toolbar**: Real-time selectors for Grade Level, Reading Lexile, and Pacing Rhythm that instantly recalculate the entire playbook.
5. **1-Click Printable Weekly Blueprint**: Formats a clean, monochrome 8.5" x 11" printable lesson plan and student checklist sheet for homeschool reporting and student binders.

---

## 1. Key Capabilities & Technical Implementation

### Interactive Playbook Modal (`#modal-wave-week-playbook`)
- **Trigger**: Click the **Week Playbook** button or click on the week title link across any of the 48 wave rows.
- **Header Information**: Displays active Wave #, Wave Week #, global fiscal week, fiscal calendar dates, and primary standard code.
- **Top Status Banner**: Differentiates green for **Synthesis Weeks (Week 8)** and purple/blue for **Instructional Immersion (Weeks 1–7)**.

### Day-by-Day Scope & Sequence ("What Should Be Done")
- **Weeks 1–7 (Core Instructional Immersion)**:
  - **Monday**: Concept Launch & Concrete Modeling (Lesson intro, visual representation, vocabulary preview).
  - **Tuesday**: Guided Practice & Close Reading (Step-by-step problem sets, text-dependent analysis).
  - **Wednesday**: Inquiry Investigation & STEM Lab (Claim-Evidence-Reasoning, empirical data tables).
  - **Thursday**: Fluency Sprint & Quick Write (60-second speed sprint, synthesizing written response).
  - **Friday**: Formative Mastery Checkpoint & Reflection (10-question exit assessment, 80%+ mastery check).
- **Week 8 (Synthesis Week)**:
  - **Monday**: Incomplete Work Audit & Portfolio Curation (Catch-up buffer for open assignments).
  - **Tuesday**: Remediation Clinic & Misconception Workshop (Tactile scaffolding on lower scoring areas).
  - **Wednesday**: Wave Formative & Summative Milestone Diagnostic (Standard-by-standard wave exam).
  - **Thursday**: Diagnostic Scoring & Honors Gradebook Reflection (Celebrate mastery, record grades).
  - **Friday**: Next Wave Planning & Accommodation Calibration (Prepare upcoming wave syllabi).

### Real-Time Differentiation Customizer Toolbar
Educators and parents can adapt the playbook on the fly directly inside the modal:
- **Grade Level**: Pre-K through High School (11 levels). Changing the grade automatically adjusts the curriculum profile, objectives, and recommended Lexile level.
- **Reading Lexile Band**:
  - `BR – 200L` (Beginning Reader / Decodables)
  - `210L – 400L` (Early Elementary / Grade 1–2)
  - `410L – 600L` (Transitional / Grade 2–3)
  - `610L – 800L` (Intermediate / Grade 3–5)
  - `810L – 1000L` (Advanced Intermediate / Grade 6–8)
  - `1010L – 1200L` (Secondary Scholastic / Grade 9–10)
  - `1200L+` (Advanced Secondary / Honors / Grade 11–12)
- **Pacing Rhythm Profile**:
  - *Standard Spiral*: 45 min focus block, 15 min review.
  - *Accelerated Deep-Dive*: 55 min self-directed immersion, project capstones.
  - *Scaffolded & Low-Anxiety*: 20-25 min micro-blocks, 5-question micro-milestones, untimed mode, OpenDyslexic & TTS.
  - *Intensive Tier 3*: 15-20 min structured intervals with Concrete-Representational-Abstract (CRA) manipulatives.

### Curated Digital Library Integration
- Dynamically loads books from Hesten's Learning Library ([`/library/`](/library/)) matching the active Lexile band:
  - Examples: *Aesop's Fables* (180L/280L), *The Velveteen Rabbit* (510L), *The Secret Garden* (710L), *Alice in Wonderland* (740L), *The Call of the Wild* (880L), *1984* (1090L), *Pride and Prejudice* (1060L), *Oedipus the King* (1080L), *Romeo and Juliet* (1240L), *The Federalist Papers* (1310L).
- Each book card features a **"Read Book"** direct link opening the title in the reader with bimodal audio TTS.

### 1-Click Printable Weekly Blueprint (`window.printWaveWeekBlueprint()`)
- Formats a clean 8.5" x 11" printable sheet containing:
  - School and student header (Student name blank, academic grade, active Lexile, pacing style).
  - Weekly focus standard & objective overview.
  - 4-column daily schedule table (Day, Topic, Daily Student Action, and physical checkboxes for marking completion).
  - Assigned library literature list with Lexile ratings.
  - Teacher/Parent signature and completion date blanks.
- Uses dedicated `@media print` rules with `body.printing-playbook` to eliminate website headers, sidebars, and navigation from print output.

---

## 2. Verification Checklist

| Criterion | Implementation | Status |
| :--- | :--- | :--- |
| **All 48 Wave Weeks Covered** | Interactive button & title link on every wave week row | PASS |
| **What Should Be Done Breakdown** | Monday–Friday daily plan with explicit distinction for Week 8 Synthesis | PASS |
| **Pacing Suggestions & Profiles** | 4 selectable pacing modalities with time blocks and UDL accommodations | PASS |
| **Curated Library Resources** | Authentic library books filtered dynamically by Lexile band | PASS |
| **On-the-Fly Customization** | Grade, Lexile, and Pacing selectors update modal content in real time | PASS |
| **1-Click Printable Blueprint** | Clean 8.5" x 11" printable sheet isolated via `printing-playbook` class | PASS |
| **WCAG 2.1 AA/AAA Compliance** | Full keyboard access, `Escape` key dismiss, visible focus rings, high contrast overrides | PASS |
| **Zero Console/Syntax Errors** | Verified with Node.js across multiple grades and weeks | PASS |

---

## 3. Files Modified
- [`assets/js/standards/pacing-weekly-playbook.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/standards/pacing-weekly-playbook.js) *(New)*
- [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php)
- [`assets/js/pages/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/teachers-main.js)
- [`assets/css/pages/teachers.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/teachers.css)
- [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) *(Bumped to v2.39.0)*
- [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php) *(Bumped fallback to v2.39.0 & updated What's New modal)*
- [`assets/text/hc-pacing-guide.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-pacing-guide.md)
- [`updates/docs/2026-11-11-wave-week-playbook-differentiation-plan.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-11-11-wave-week-playbook-differentiation-plan.md) *(New)*
- [`updates/docs/2026-11-11-wave-week-playbook-differentiation-walkthrough.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-11-11-wave-week-playbook-differentiation-walkthrough.md) *(New)*

