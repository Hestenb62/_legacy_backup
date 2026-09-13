---
title: "Math Reference Book Chapter 1: Full Grade 1 Curriculum, Student How-To Guides & Downloadable Synoptic Tables"
date: "2026-09-13"
category: "Walkthrough"
tags: ["Math Reference", "Library Book", "Grade 1", "How To Do Math", "Cheat Sheets", "Download", "Print", "WCAG"]
summary: "Expanded Chapter 1 of the Math Reference Book into a comprehensive First Grade Mathematics Reference Codex covering 100% of 1st Grade standards with didactic student how-to guides, visual cheat sheets, and integrated one-click print and text download actions for the Grand Synoptic Tables."
author: "Antigravity & Hesten"
---

# Math Reference Book Chapter 1: Full Grade 1 Curriculum & Downloadable Synoptic Concordance

## Overview
Elevated **Chapter 1 (`math-facts-repo/chapter-1.php`)** into a complete, authoritative **First Grade Mathematics Reference Codex**. It integrates the full scope of 1st Grade standards (Counting to 120, Addition & Subtraction strategies, Word Problem modeling, Place Value, Comparison, Length Measurement, Analog & Digital Time, US Coins & Money, 2D/3D Geometry & Fractions, Data & Tally Charts, and Mental Math Hacks), along with step-by-step student "How To Do Math" guides and downloadable/printable Synoptic Tables.

---

## Key Curriculum & Didactic Additions

### 1. Complete First Grade Curricular Coverage
- **§ 1.1 Counting & Numbers to 120**: One-to-one correspondence, cardinality, skip counting by 2s, 5s, and 10s, and the 120-Chart Navigation Compass ($+1, -1, +10, -10$).
- **§ 1.2 Master Addition Strategies (How to Add)**: Commutative and Associative properties, Counting On, Making a 10, Doubles/Near-Doubles, and Adding 3 Addends.
- **§ 1.3 Master Subtraction Strategies (How to Subtract)**: Counting Back, Counting Up (Finding the Distance), Think-Addition, and Part-Part-Whole relationships.
- **§ 1.4 Word Problems Master Guide**: 4-Step Problem-Solving framework (Read, Draw, Write, Check) with archetypes for Add-To, Take-From, and Compare problems.
- **§ 1.5 Place Value (Tens & Ones)**: Ten-bundle principle, expanded form table, and mental arithmetic adding/subtracting multiples of 10.
- **§ 1.6 Comparing Numbers**: In-depth Tens-first comparison hierarchy for 2-digit numbers using $>$, $<$, and $=$.
- **§ 1.7 Measurement & Length**: Non-standard unit iteration without gaps or overlaps, baseline alignment, and transitivity ordering.
- **§ 1.8 Chronometry & Telling Time**: Analog clock anatomy (hour vs. minute hand), time to the hour (:00), and half-hour (:30).
- **§ 1.9 Coins & Currency Arithmetic**: Detailed reference for Pennies ($1¢$), Nickels ($5¢$), Dimes ($10¢$), and Quarters ($25¢$), plus step-by-step pocket coin counting.
- **§ 1.10 Geometry & Equal Shares**: 2D polygons (triangle, rectangle, square, trapezoid, hexagon) and 3D solids (cube, cylinder, sphere), plus fraction foundations (halves $\frac{1}{2}$ and fourths $\frac{1}{4}$).
- **§ 1.11 Data Representation**: Tally mark bundle gates ($\rlap{||||}/$), picture graphs, and comparative subtraction questions.
- **§ 1.12 Computational Mental Math "Cheat" Hacks**: Make-a-10 bridge, Plus-9 shortcut ($+10, -1$), near-doubles, and subtraction inversion.

### 2. The Grand Synoptic Tables & Instant Download/Print
- **§ 1.13 Grand Synoptic Concordance**:
  - Six comprehensive cheat sheet concordances: Friends of 10, Doubles Roster, 120-Chart Compass, Coins & Money, Shapes & Partitioning, and Relational Axioms.
  - **One-Click Print / Save PDF**: Invokes `printSynopticTables()` with customized `@media print` rules that isolate and format the Synoptic Tables full-bleed on clean white paper without website chrome or navigation clutter.
  - **One-Click Text Download**: Invokes `downloadSynopticMarkdown()` to generate an instant offline `.txt` file download of the complete Grade 1 reference cheat sheet for offline use.

---

## Verification & Compliance
- **Tag Balance Verification**: DOM tag balance verified via Node.js with 0 unclosed `<div>` and `<section>` tags.
- **Master Verification Suite**: `scratch/verify_master_suite.js` executed with 100% pass rate (0 errors).
- **A11y & Universal Design**: Screen-reader friendly semantic headings, keyboard accessible navigation buttons (`Tab`, `:focus-visible`), and WCAG AAA color contrast preserved across Light, Dark, Midnight, and Sepia themes.
