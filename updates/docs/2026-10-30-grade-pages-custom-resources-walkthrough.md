---
title: "Grade-Level Alignment & Custom Curriculum Resources Walkthrough"
date: "2026-10-30"
version: "v2.26.0"
category: "Walkthrough"
tags: ["Curriculum", "Grade Levels", "Custom Resources", "Breadcrumbs", "Accessibility", "A11y", "UDL"]
summary: "Detailed walkthrough of the grade-level nomenclature updates, custom grade literature and interactive tools, developmental study tips, and dynamic subject breadcrumbs."
author: "Antigravity & Hesten"
---

# Grade-Level Alignment & Custom Curriculum Resources Walkthrough

## 1. Overview of Platform Changes
In platform release **v2.26.0**, all curriculum level pages (`levels/a.php` through `levels/o.php`) have been upgraded to reflect specific developmental grade levels, eliminate generic labeling, and provide completely customized educational resources (literature, interactive learning tools, and developmental study tips) for every grade bracket from Pre-K through 12th Grade and AP.

### Key Enhancements Implemented
1. **Appropriate Grade Nomenclature Across All Levels**:
   - Replaced generic descriptors ("Middle School" and "High School") with specific academic grade names:
     - `levels/h.php`: Level H &rarr; **6th Grade**
     - `levels/i.php`: Level I &rarr; **7th Grade**
     - `levels/j.php`: Level J &rarr; **8th Grade**
     - `levels/k.php`: Level K &rarr; **9th Grade**
     - `levels/l.php`: Level L &rarr; **10th Grade**
     - `levels/m.php`: Level M &rarr; **11th Grade**
     - `levels/n.php`: Level N &rarr; **12th Grade**
     - `levels/o.php`: Level O &rarr; **AP & College Prep**
   - Synchronized page titles (`$pageTitle`) and SEO descriptions (`$pageDescription`) for consistency.
2. **Prominent Grade Badge in Hero Section**:
   - Injected `<span class="hero-grade-badge"><i class="fas fa-graduation-cap"></i> [Grade]</span>` in the primary header group of `src/level_template.php`.
   - Both Level (e.g., "Level H") and Grade (e.g., "6th Grade") are immediately visible upon landing on any level page.
3. **Accessible Dynamic Subject Breadcrumb Hierarchy**:
   - Implemented compliant breadcrumb navigation matching the architectural mandate: `Breadcrumb trails must reflect current grade and subject, e.g. Level K Math, Level K ELA`.
   - Trail structure: `Home / Levels / Level [X] ([Grade]) / [Subject]`.
   - JavaScript event listener in `switchTab()` dynamically updates `#crumb-active-subject` when switching between Mathematics, Language Arts, Science, and Social Studies.
4. **Grade-Custom Educational Resources Matrix**:
   - Built centralized resource resolver `src/helpers/grade_resources.php` (`getGradeCustomResources()`).
   - Replaced static high school literature (*1984*, *Frankenstein*, *Federalist Papers*) with age-appropriate library books for each grade level:
     - Pre-K – Kindergarten: *Alice in Wonderland*, *Wizard of Oz*, *Phonics Repository*.
     - 1st – 2nd Grade: *Wizard of Oz*, *Anne of Green Gables*, *Math Facts Repository*.
     - 3rd – 5th Grade: *Anne of Green Gables*, *The Time Machine*, *Huckleberry Finn*, *Declaration of Independence*.
     - 6th – 8th Grade: *The Time Machine*, *Huckleberry Finn*, *A Tale of Two Cities*, *Dracula*, *U.S. Constitution & Bill of Rights*.
     - 9th – 12th Grade & AP: *Romeo & Juliet*, *Frankenstein*, *Great Gatsby*, *Scarlet Letter*, *1984*, *Moby-Dick*, *The Republic*, *Federalist Papers*, *American Yawp*.
5. **Custom Grade Practice & Interactive Tools**:
   - Added a second sidebar resource shelf highlighting interactive workbenches customized for that grade:
     - Pre-K / K: Virtual ten-frames, counters, alphabet games.
     - 1st / 2nd: Interactive clocks, base-10 blocks, elementary math workbench.
     - 3rd / 5th: Fraction bars, geoboards, math vocabulary flashcards, grammar workshop.
     - 6th / 8th: Middle school ratio workbenches, CCSS standards explorer, grammar lab.
     - 9th / 12th & AP: Algebra/Calculus workbenches, primary source archives, DBQ analyzers, GED prep.
6. **Developmentally Targeted Study Strategy Tips**:
   - Every grade level provides actionable pedagogical advice tailored to its developmental stage (tactile counting, phoneme breakdown, number bonds, array products, fraction pizza slices, decimal sliding, unit rates, negative number thermometers, and axiomatic justification).
7. **Curriculum Standards Hydration Resiliency**:
   - Updated `hydrateLevelModules()` in `src/level_template.php` to hydrate full standards from datasets for grades with minimal initial placeholder skills (`$skillCount <= 10`).
   - Added fallback for grades 9–12 in ELA, Science, and Social Studies to `'High School'`, preventing blank "Coming Soon" states.
8. **Platform Version & Help Center Synchronization**:
   - Bumped platform semantic version to `v2.26.0` in `src/header.php` and `src/footer.php`.
   - Updated the "What's New in Version [X]" modal in `src/footer.php`.
   - Created companion user guide in `assets/text/hc-grade-levels-custom-resources.md`.

## 2. Verification & Testing

### Verification Checklist
| Check | Component | Expected Outcome | Result |
| :--- | :--- | :--- | :--- |
| **1** | `levels/h.php` | Displays "6th Grade Level H" title & `$gradeText = '6th Grade'` | Passed |
| **2** | `levels/i.php` | Displays "7th Grade Level I" title & `$gradeText = '7th Grade'` | Passed |
| **3** | `levels/j.php` | Displays "8th Grade Level J" title & `$gradeText = '8th Grade'` | Passed |
| **4** | `levels/k.php` | Displays "9th Grade Level K" title & `$gradeText = '9th Grade'` | Passed |
| **5** | `levels/l.php` | Displays "10th Grade Level L" title & `$gradeText = '10th Grade'` | Passed |
| **6** | `levels/m.php` | Displays "11th Grade Level M" title & `$gradeText = '11th Grade'` | Passed |
| **7** | `levels/n.php` | Displays "12th Grade Level N" title & `$gradeText = '12th Grade'` | Passed |
| **8** | `levels/o.php` | Displays "AP & College Prep Level O" title & `$gradeText = 'AP & College Prep'` | Passed |
| **9** | Breadcrumbs | `<nav class="level-breadcrumbs">` renders `Home / Levels / Level [X] ([Grade]) / [Subject]` | Passed |
| **10** | Subject Switch | Changing tabs to ELA/Science/Social dynamically updates breadcrumb active subject | Passed |
| **11** | Custom Literature | Primary/Elementary levels render age-appropriate books; High School renders advanced classics | Passed |
| **12** | Custom Tools | Grade-specific workbenches (ten-frames, clocks, fraction bars, ratio tools) render properly | Passed |
| **13** | Study Strategy | Distinct developmental tip rendered for each grade level | Passed |
| **14** | A11y & Contrast | Focus visible rings, ARIA labels, and WCAG AA/AAA contrast verified | Passed |
| **15** | Release Sync | Platform version updated to `v2.26.0`, modal updated, Help Center article present | Passed |

## 3. Conclusion
The grade pages now accurately reflect their specific grade levels, present dynamic grade and subject breadcrumbs, and offer fully customized, age-appropriate educational resources across literature, interactive tools, and study tips.

