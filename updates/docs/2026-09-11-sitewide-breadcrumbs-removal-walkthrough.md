---
title: "Sitewide Breadcrumbs Removal Walkthrough"
date: "2026-09-11"
category: "Walkthrough"
tags: ["UI", "Navigation", "Header", "Level Pages", "Research", "Library", "Assessment"]
summary: "Removed sitewide breadcrumb navigation trails across all platform pages including global header, level pages, research journals, library workspace drawers, and rubrics."
author: "Antigravity & Hesten"
---

# Sitewide Breadcrumbs Removal Walkthrough

Sitewide breadcrumbs have been removed across all platform pages to streamline navigation and provide a cleaner, distraction-free visual layout.

---

## What Was Changed

### 1. Global Header (`src/header.php`)
- Removed the global `<nav class="breadcrumb-nav">` generation block from the main header, eliminating the sitewide breadcrumb trail across all page views.

### 2. Level Pages Template (`src/level_template.php`)
- Removed the `.level-breadcrumb` trail from `.level-nav-container`, leaving the live skill search bar and subject navigation tabs aligned and uncluttered.
- Cleaned up the `switchTab()` script to remove dead references to `#level-breadcrumb-subj`.

### 3. Assessment Rubrics (`assessment/rubrics.php`)
- Removed the `<nav aria-label="Breadcrumb">` ordered list element above the educator rubrics hero banner.

### 4. Research Journal Portals (`research/DSMS/index.php` & `research/DLDR/index.php`)
- Removed `.research-hero-breadcrumbs` from the Dysgraphia Studies & Motor Skills (DSMS) and Dyslexia & Learning Disabilities (DLDR) journal hero headers.

### 5. Library Resource Workspace (`library/index.php`)
- Removed `.drawer-breadcrumbs` from the subject research desk workspace drawer header.

### 6. Interactive Lessons (`lessons/k-math-m1-a-*.php`)
- Updated top navigation container semantics from `aria-label="Breadcrumb navigation"` to `aria-label="Lesson navigation"`.

---

## Verification Summary

| Area | Change | Status |
| :--- | :--- | :--- |
| **Global Header** | Removed breadcrumb computation and HTML rendering | ✅ Clean & Verified |
| **Level Pages (A–O, GED, AP)** | Removed level breadcrumb trail from sticky top bar | ✅ Clean & Verified |
| **Assessment Rubrics** | Removed breadcrumb `<nav>` list | ✅ Clean & Verified |
| **Research Journals (DSMS/DLDR)** | Removed hero breadcrumb container | ✅ Clean & Verified |
| **Library Research Desks** | Removed workspace drawer breadcrumbs | ✅ Clean & Verified |
| **Lesson Pages** | Cleaned up navigation semantics | ✅ Clean & Verified |
