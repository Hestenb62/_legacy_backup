---
title: "Year-Round Wave Pacing Structure (6 Waves • 48 Wks) & Parent Home Observations Walkthrough"
date: "2026-11-11"
version: "v2.38.1"
category: "Walkthrough"
tags: ["Pacing Guide", "Wave Structure", "Fiscal Calendar", "Educator Suite", "Parent Hub", "Tripartite Data Sync"]
summary: "Technical and pedagogical walkthrough of the independent 6-Wave Year-Round Fiscal Pacing Structure (July 1 – June 30) featuring the 7+1 model and the Parent Home Observations bridge to the Teacher Dossier."
author: "Antigravity & Hesten"
---

# Year-Round Wave Pacing Structure (6 Waves • 48 Wks) & Parent Home Observations Walkthrough

## Executive Summary
Version **v2.38.1** introduces a major pedagogical enhancement to the Educator Suite (`pages/teachers.php#pacing`) and Parent Hub (`pages/parents.php`):
1. **Independent Year-Round Wave Pacing Structure (6 Waves • 48 Weeks • Fiscal Calendar July 1 – June 30):** A completely separate curriculum progression from the classic 36-week traditional schedule. Each wave consists of 8 weeks using the **7+1 model**: 7 uninterrupted weeks of instructional immersion followed by Week 8 dedicated to testing, finishing up incomplete work, and planning for the upcoming wave.
2. **Independent Progress Storage:** Progress tracking in the Wave schedule is stored independently (`localStorage['hesten_teacher_pacing_wave_progress']`) from the traditional 36-week schedule (`localStorage['hesten_teacher_pacing_progress']`).
3. **Parent Home Observations Bridge to Teacher Diagnostic Dossier:** Parents can record home observations, sensory triggers, and effective accommodations in the IEP/504 Brief modal in the Parent Hub (`pages/parents.php`), which automatically synchronizes across tabs and displays in the Teacher Diagnostic Dossier with a `"Synced from Parent Hub"` indicator badge.

---

## Architectural Breakdown

### 1. Pacing Model Separation

The platform now maintains two distinct curricular structures in `assets/js/pages/teachers-main.js`:
- `TRADITIONAL_PACING_PLAN`: 36 weeks organized across Quarters 1 to 4 (ideal for 9-month traditional calendars).
- `WAVE_PACING_PLAN`: 48 weeks organized across 6 Waves aligned with the annual fiscal calendar (July 1 to June 30).

```
Traditional 36-Week Model:
[ Quarter 1 (Wks 1-9) ] [ Quarter 2 (Wks 10-18) ] [ Quarter 3 (Wks 19-27) ] [ Quarter 4 (Wks 28-36) ]

Year-Round Wave Model (Fiscal Year: July 1 – June 30):
[ Wave 1 (Wks 1-8)   • July 1 – Late Aug   ] -> 7 Wks Immersion + Wk 8 Synthesis
[ Wave 2 (Wks 9-16)  • Sept – Oct          ] -> 7 Wks Immersion + Wk 16 Synthesis
[ Wave 3 (Wks 17-24) • Nov – Dec           ] -> 7 Wks Immersion + Wk 24 Mid-Year Synthesis
[ Wave 4 (Wks 25-32) • Jan – Feb           ] -> 7 Wks Immersion + Wk 32 Synthesis
[ Wave 5 (Wks 33-40) • Mar – Apr           ] -> 7 Wks Immersion + Wk 40 Spring Synthesis
[ Wave 6 (Wks 41-48) • May – June 30       ] -> 7 Wks Immersion + Wk 48 Fiscal Year-End Capstone
```

### 2. The 7+1 Learning Cycle Design
Within each 8-week wave:
- **Weeks 1–7 (Instructional Immersion):** Students engage in deep inquiry, conceptual exploration, and formative practice without the interruption of high-stakes testing.
- **Week 8 (Synthesis Week):**
  - **Formative & Summative Testing:** Wave milestone exams to evaluate standard mastery without test anxiety.
  - **Finishing Pending Work:** Dedicated buffer period for students to complete open lab writeups, portfolio projects, and catch-up reading.
  - **Planning for Next Wave:** Scheduled time for educators and homeschool coaches to review diagnostic reports, adjust IEP accommodations, and prepare materials for the subsequent wave.

### 3. Parent Home Observations Sync Bridge
- **Parent Hub (`pages/parents.php`):** Added `#iep-parent-notes` textarea inside `#iep-brief-modal`. When parents type observations, `saveParentIepNotesAndSync()` writes to `localStorage['hesten_parent_iep_notes']`, calls `hlSyncParentNotesToTeacherRoster()`, and dispatches `hlBroadcastSync('parent-notes', ...)`.
- **Teacher Diagnostic Dossier (`pages/teachers.php` & `teachers-main.js`):** Added `#dossier-parent-notes-box`. When `openStudentDossier(student)` is triggered, it renders the parent's home insights with a prominent `"Synced from Parent Hub"` badge.

---

## Verification & Validation
- **JavaScript Syntax:** Validated `assets/js/pages/teachers-main.js`, `assets/js/pages/community-main.js`, and `assets/js/core/global-standard.js` with `node -c` (exit code 0).
- **Accessibility & UDL:** All buttons, filters, and checkboxes are 100% keyboard operable (`Tab`, `Enter`, `Space`) with high-contrast `:focus-visible` rings and screen-reader announcements via `aria-live`.
- **Offline Resiliency:** Both pacing guides operate offline-first with dedicated `localStorage` keys and automatic Google Drive cloud synchronization.
