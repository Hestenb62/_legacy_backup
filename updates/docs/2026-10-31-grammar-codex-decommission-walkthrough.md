---
title: "Decommissioning Legacy Grammar Codex Hub & Associated Assets"
date: "2026-10-31"
version: "v2.37.1"
category: "Walkthrough"
tags: ["Grammar", "Decommission", "Cleanup", "ELA", "Navigation", "Maintenance"]
summary: "Complete removal of the legacy pages/grammar.php page, its dedicated styling, dataset, and scripts, rerouting active resource links to the Student Language & Writing Lab."
author: "Antigravity & Hesten"
---

# Decommissioning Legacy Grammar Codex Hub & Associated Assets

## Executive Summary
In accordance with platform cleanup requirements, the legacy **Universal English Grammar Codex & Index** (`pages/grammar.php`) and all of its dedicated subsystem components have been decommissioned and removed. All primary navigation links, command palette entries, grade resource cards, and sitemap entries have been cleaned up and rerouted to the active student writing suite at `/student/ela-grammar.php`.

---

## 1. Removed Subsystems & Components

The following five constituent files were permanently deleted:
1. `pages/grammar.php`: Standalone A–Z English Grammar Codex and syntax analyzer page.
2. `assets/css/pages/grammar.css`: Dedicated styling rules for the grammar index and sentence diagrammer.
3. `assets/js/pages/grammar-index.js`: Interactive search, alphabetical ribbon filtering, and sentence deconstruction logic.
4. `assets/data/grammar-php.json`: 38KB JSON dataset containing grammar definitions and syntax rules.
5. `scratch/build_grammar_dataset.js`: One-off scratch compilation script.

---

## 2. Navigation & Catalog Cleanups

1. **Primary Mega-Menu (`src/header.php`)**:
   - Removed the "English Grammar Codex" navigation item from the ELA / Language Arts mega-menu column.
2. **Command Palette (`assets/js/components/command-palette.js`)**:
   - Removed the "Universal English Grammar Codex (A–Z)" entry from the global command search index.
3. **Grade Level Resources (`src/helpers/grade_resources.php`)**:
   - Updated Grade 3 (Level E), Grade 4 (Level F), Grade 7 (Level I), and Grade 10 (Level L) grammar resource cards from `/pages/grammar.php` to `/student/ela-grammar.php`.
4. **Skills Passport (`assets/js/pages/skills-passport.js`)**:
   - Replaced legacy lesson URL reference for Grade 5 conventions (`ELA.L.5.1`) with `/student/ela-grammar.php`.
5. **Search Engine Index (`sitemap.xml`)**:
   - Purged the `/pages/grammar.php` URL entry and cleaned whitespace tags.

---

## 3. Verification & Testing

* **Deletion Validation:** Checked via filesystem verification—all 5 files confirmed deleted.
* **Link Audit:** Performed recursive workspace search to confirm zero broken links or orphaned references to `pages/grammar.php`.
* **PHP Syntax Validation:** Confirmed clean linting on modified PHP files (`src/header.php`, `src/helpers/grade_resources.php`).

