---
title: "Universal Pre-K to 12 Dedicated JSON Curriculum Architecture Plan"
date: "2026-09-27"
category: "Implementation Plan"
tags: ["Curriculum", "Pre-K to 12", "JSON", "Architecture", "Universal", "Lazy Loading"]
summary: "Comprehensive architecture plan to generate dedicated on-demand JSON curriculum files in /assets/data/ for all grade levels (Pre-K through Grade 12) across Mathematics, ELA, Science, and Social Studies."
author: "Antigravity & Hesten"
---

# Universal Pre-K to 12 Dedicated JSON Curriculum Architecture Plan

## Problem Statement & Objectives
Following the successful implementation of Grade 9 dedicated JSON files, the user requested that **all grades from Pre-K through Grade 12** adopt this exact architecture:
1. **Four Dedicated JSON Files Per Grade Level** in `/assets/data/`:
   - `curriculum-pre-k-[subject].json`
   - `curriculum-kindergarten-[subject].json`
   - `curriculum-grade-1-[subject].json` through `curriculum-grade-12-[subject].json`
   - Total of 14 grades × 4 subjects = 56 dedicated JSON curriculum files (Grade 9 already complete; 13 remaining grades = 52 files to create).
2. **Standardized Content Schema**:
   - `grade`: Normalized grade key (e.g. `Kindergarten`, `1st Grade`, `10th Grade`).
   - `subject`: `math`, `ela`, `science`, `social`.
   - `name`: Full subject display title (e.g. `Mathematics`, `English Language Arts`).
   - `course`: Distinct subject pathway (e.g. `Geometry`, `Chemistry`, `US History`, `Early Literacy`).
   - `title`: Complete course title.
   - `icon`: FontAwesome icon class.
   - `color`: Subject theme color.
   - `overview`: Comprehensive narrative course overview.
   - `competencies`: Array of 4–5 core course competencies.
   - `modules`: Array of instructional modules:
     - `moduleNumber`: Integer.
     - `title`: Module title.
     - `description`: Detailed **Module Overview** describing what the module covers.
     - `topics`: Array of 3–5 topics per module:
       - `letter`: `A`, `B`, `C`, etc.
       - `title`: Topic title.
       - `description`: Comprehensive **Topic Description** explaining the specific concepts and skills taught.
       - `standards`: Array of focal standard codes (e.g. `CCSS.MATH.CONTENT.K.CC.A.1`, `CCSS.ELA-LITERACY.RL.K.1`, `NGSS`, `C3`).
3. **On-Demand (Lazy) Loading Mechanism**:
   - Files are **only fetched when the curriculum popup for that specific grade is opened**.
   - No unnecessary pre-fetching on page load.
   - In-memory cache `window._gradeCurriculumCache[gradeSlug]` prevents duplicate fetches.
4. **Clean, Responsive, Accessible UI**:
   - Same clean, uncluttered layout:
     - Multi-subject tabs (`Mathematics`, `English Language Arts`, `Science`, `Social Studies`) with sliding pill indicator.
     - Course Card with badge, title, and overview.
     - Core Competencies list.
     - Instructional Modules & Topics accordion with Module Overview Box and Topic Cards.
     - Zero individual lesson links cluttering the modal.
     - Individual subject printing.

---

## Grade Level Pathways

| Grade | Math Course | ELA Course | Science Course | Social Studies Course |
|---|---|---|---|---|
| **Pre-K** | Early Numeracy & Shapes | Early Literacy & Phonemic Awareness | Early Wonder & Nature Exploration | Self, Family & Community |
| **Kindergarten** | Foundations of Counting & Geometry | Phonics, Print Concepts & Early Reading | Weather, Plants & Animals | Community, Rules & American Symbols |
| **Grade 1** | Operations, Place Value & Measurement | Word Reading, Fluency & Retelling | Light, Sound, Astronomy & Habitats | Families Now & Then, Geography |
| **Grade 2** | Multi-Digit Addition & Subtraction | Reading Comprehension & Writing Craft | Earth's Landforms, Matter & Ecosystems | Local History, Economics & Citizenship |
| **Grade 3** | Multiplication, Division & Fractions | Informational Reading & Paragraph Craft | Forces, Interactions & Life Cycles | Regions of the World & Cultural Geography |
| **Grade 4** | Multi-Digit Arithmetic & Fraction Equivalence | Text Structure, Theme & Opinion Writing | Energy Transfers, Rock Waves & Fossils | State History & US Physical Regions |
| **Grade 5** | Decimals, Fraction Operations & Volume | Analyzing Complex Texts & Research | Earth Systems, Matter & Space Systems | Early American History & Indigenous Cultures |
| **Grade 6** | Ratios, Rates & Negative Numbers | Literary Elements & Argument Writing | Earth & Space Science (Plate Tectonics, Weather) | Ancient Civilizations of the Eastern Hemisphere |
| **Grade 7** | Proportional Relationships & Rational Number Operations | Informational Analysis & Textual Evidence | Life Science (Cells, Heredity, Ecology) | Medieval & Early Modern World History |
| **Grade 8** | Linear Equations, Functions & Pythagorean Theorem | Thematic Analysis & Persuasive Rhetoric | Physical Science (Forces, Waves, Chemistry) | US History: Revolution through Reconstruction |
| **Grade 9** | Algebra I (Completed) | English 9 (Completed) | Biology (Completed) | World History & Geography (Completed) |
| **Grade 10** | Geometry: Proofs, Trigonometry & Coordinate Geometry | English 10: World Literature & Rhetoric | Chemistry: Atomic Structure, Bonding & Reactions | Modern World History: 1750 to Present |
| **Grade 11** | Algebra II: Complex Numbers, Polynomials & Trigonometric Functions | English 11: American Literature & Historical Rhetoric | Physics: Classical Mechanics, Electromagnetism & Waves | United States History: Gilded Age to Contemporary Era |
| **Grade 12** | Precalculus & Advanced Mathematical Modeling | English 12: British & World Literature, Advanced Inquiry | Environmental Science & Earth Systems Engineering | United States Government & Macroeconomics |

---

## Implementation Steps

1. **Automated Curriculum Synthesizer Script**:
   - Write a Node.js script that compiles existing standards from `curriculum-engageny-math.json`, `standards-ccss-math.json`, `standards-ccss-ela.json`, `standards-ngss-science.json`, and `standards-c3-social.json` alongside curated modules and topic descriptions for each grade.
   - Generate the 52 JSON files into `/assets/data/`.
2. **Update Universal Modal Loader in `assets/js/index-main.js`**:
   - Generalize `loadGradeCurriculumData(gradeSlug)` to dynamically load any grade's 4 JSON files on-demand.
   - Replace the single Grade 9 check with universal grade slug routing.
   - Retain `window._gradeCurriculumCache[gradeSlug]`.
3. **Verification**:
   - Test that opening the curriculum popup for Pre-K, Grade 3, Grade 6, Grade 9, Grade 10, Grade 12 all load their respective JSON files on-demand.
   - Verify keyboard navigability, tab switching, and printing.
4. **Documentation**:
   - Create walkthrough document `updates/docs/2026-09-27-prek-12-dedicated-json-curriculum-walkthrough.md`.
