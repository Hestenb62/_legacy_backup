---
title: "Universal Pre-K Through Grade 12 Dedicated JSON Curriculum Walkthrough"
date: "2026-09-27"
category: "Walkthrough"
tags: ["Curriculum", "JSON", "Pre-K to 12", "On-Demand Loading", "Accessibility"]
summary: "Successfully extended the clean, on-demand JSON curriculum popup architecture to all 14 grade levels (Pre-K through Grade 12) across Mathematics, ELA, Science, and Social Studies with zero individual lesson clutter."
author: "Antigravity & Hesten"
---

# Universal Pre-K Through Grade 12 Dedicated JSON Curriculum Walkthrough

## 1. Executive Summary
We have expanded the dedicated on-demand JSON curriculum architecture across the entirety of Hesten's Learning—covering all **14 grade levels** (**Pre-K**, **Kindergarten**, and **Grades 1 through 12**) across all **4 core subjects** (**Mathematics**, **English Language Arts**, **Science**, and **Social Studies**).

Each grade and subject features:
1. **Dedicated JSON Files in `/assets/data/`**: 56 total files strictly following the canonical naming scheme `curriculum-<grade-slug>-<subject>.json`.
2. **Clean Scope & Sequence Layout**:
   - Course summary cards with comprehensive overviews and core competencies.
   - Collapsible module accordion cards with highlighted Module Overview callout boxes.
   - Detailed topic cards describing the concepts covered and relevant focus standards.
   - **Zero individual lesson link clutter** for an uncluttered, distraction-free syllabus view.
3. **Universal On-Demand Lazy Loading**:
   - Files are fetched only when the curriculum popup for that specific grade is opened.
   - Parallel fetching (`Promise.all`) across all 4 subjects with immediate in-memory caching (`window._gradeCurriculumCache`).
   - Seamless offline fallback support via the service worker's Stale-While-Revalidate caching strategy.

---

## 2. Changes Summary

### A. Dedicated Curriculum JSON Files (56 Files)
All 56 curriculum files are stored in `/assets/data/`:

| Grade | Slugs | Subjects Covered |
| :--- | :--- | :--- |
| **Pre-K** | `curriculum-pre-k-*.json` | Math, ELA, Science, Social Studies |
| **Kindergarten** | `curriculum-kindergarten-*.json` | Math, ELA, Science, Social Studies |
| **Elementary (Grades 1–5)** | `curriculum-grade-1-*.json` through `curriculum-grade-5-*.json` | Math, ELA, Science, Social Studies (20 files) |
| **Middle School (Grades 6–8)** | `curriculum-grade-6-*.json` through `curriculum-grade-8-*.json` | Math, ELA, Science, Social Studies (12 files) |
| **High School (Grades 9–12)** | `curriculum-grade-9-*.json` through `curriculum-grade-12-*.json` | Math (Alg I, Geom, Alg II, Precalc), ELA (English I–IV), Science (Bio, Chem, Phys, Earth/Space), Social Studies (World, US Hist, Gov/Econ) (16 files) |

### B. Landing Page Controller & Renderer ([`assets/js/index-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/index-main.js))
1. **`renderUniversalCurriculumModal(docsContainer, cache, gradeTitle, standardsGradeKey)`**:
   - Generalizes the dynamic 4-tab renderer for any grade level.
   - Generates subject navigation tabs, sliding pill indicator, overview card, competencies list, collapsible module accordions, and topic cards.
   - Dynamically links focus standards to the Standards Explorer with appropriate grade parameters (`/pages/standards.php?subject=${subj}&grade=${grade}&code=${code}`).
   - Provides `renderGrade9AllSubjectsModal` alias for full backwards compatibility.
2. **`openDocModal(btn)`**:
   - Checks `card.dataset.id` and `title` against `GRADE_SLUG_MAP`.
   - Checks `window._gradeCurriculumCache[targetSlug]`. If cached, renders instantaneously.
   - If not yet loaded, displays a clean loading spinner and fetches all 4 subject files in parallel.
   - Caches the payload and renders the modal.
   - Non-grade cards (such as GED Practice and AP resources) smoothly fall back to existing data handlers.

---

## 3. Verification & Validation

An automated verification test ([`scratch/verify-all.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/scratch/verify-all.js)) was executed across the full codebase:
- **File Integrity**: 56 out of 56 JSON files present and parsed valid JSON.
- **Content Coverage**:
  - **183** instructional modules verified across Pre-K to 12.
  - **444** topic descriptions verified with focus standards.
  - **0** individual lesson links (guaranteed no visual clutter).
- **Code Validation**: `assets/js/index-main.js` passed Node syntax checks with zero errors.

---

## 4. Accessibility & User Experience
- **WCAG AA/AAA Keyboard Operability**:
  - Subject tabs can be switched via keyboard.
  - Module accordions are interactive buttons (`role="button"`, `tabindex="0"`) with `aria-expanded` and respond to `Enter` and `Space`.
- **Subject Printing**:
  - Independent print buttons for each subject (`Print Mathematics`, `Print English Language Arts`, etc.) format the syllabus cleanly without screen clutter or navigation elements.
- **High Contrast & Responsive**:
  - Tested across standard themes and high-contrast color modes.
  - Scales gracefully down to mobile viewports without horizontal scrollbars.
