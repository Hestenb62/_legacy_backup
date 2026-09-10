---
title: "Universal Site-Wide Data Synchronization Architecture (Student, Teacher, Parent)"
date: "2026-09-10"
category: "Implementation Plan"
tags: ["Data Sync", "Architecture", "Google Drive", "LocalStorage", "Roles"]
summary: "Architectural implementation plan and behavioral invariants to ensure robust site-wide data synchronization across student, teacher, and parent portals with offline-first localStorage, cross-tab events, and Google Drive cloud auto-sync."
author: "Antigravity & Hesten"
---

# Universal Site-Wide Data Synchronization Architecture (Student, Teacher, Parent)

## 1. Executive Summary
This proposal establishes universal behavioral rules and architectural standards to ensure that all user data across **Hesten's Learning**—including student learning records, teacher classroom rosters, and parent accommodations—consistently synchronize locally across browser tabs and remotely via Google Drive cloud auto-sync.

---

## 2. Identified Synchronization Inefficiencies & Fixes

### A. Auto-Sync Trigger Key Discrepancy
- **Root Cause**: `pages/settings.php` and `assets/js/gdrive-sync.js` persist auto-sync state under `auto_sync_gdrive`. In contrast, the global script loader in `src/footer.php` checked `gdrive_autosync_enabled`.
- **Resolution**: Update `src/footer.php` to check `localStorage.getItem('auto_sync_gdrive') === 'true' || localStorage.getItem('gdrive_autosync_enabled') === 'true'`. This enables background auto-sync across all student practice modules, teacher hubs, and parent settings pages.

### B. Canonical Tripartite Role Schemas
Standardize storage keys across the platform to avoid fragmented or orphaned state:
- **Student Data**:
  - `hesten-user-profile` (Name, grade, avatar, XP, level)
  - `hl_gamification_profile` (XP, level, skill tree nodes, quests)
  - `hesten_standards_mastery` (Common Core / NGSS standard scores and completed checks)
  - `library-bookmarks` (Curriculum bookmarks)
  - `hl_scratchpad_notes` (Study notes & lab solutions)
- **Teacher Data**:
  - `hesten_teacher_roster` (Classroom roster, diagnostic scores, teacher notes, IEP accommodations)
- **Parent Data**:
  - `hesten_parent_accommodations` (Active neurodiversity and IEP accommodations)
  - Schedule builder parameters (`sched-start-time`, `sched-pacing-style`)

### C. Cross-Role Synchronization Bridges
1. **Parent-to-Student/Teacher Accommodation Sync**:
   - Accommodations enabled in `pages/parents.php` immediately propagate to the student reader/testing settings and populate the accommodations chips in the teacher's Diagnostic Dossier.
2. **Student-to-Teacher Mastery Sync**:
   - Scores recorded from student exit tickets, fluency sprints, or interactive labs (`hesten_standards_mastery`) reflect in the active classroom roster entry for that student in `pages/teachers.php`.
3. **Cross-Tab & Cloud Sync Events**:
   - Storage modifications dispatch standard events (`hl:data-sync`, `hl:profile-updated`, `hl:accommodations-updated`) and listen to `window.addEventListener('storage')` to ensure live multi-tab consistency.

---

## 3. Proposed Rule & Agent Guidelines

### New Rule: `.agents/rules/data-sync-architecture.md`
Enforces strict invariants on all future features to prevent storage key collisions, ensure bidirectional role updates, and preserve cloud auto-sync hooks.

### Updated Root Guide: `AGENTS.md`
Extends Section 2 and Section 3 to document Tripartite Data Synchronization as a permanent core design principle.

---

## 4. Verification & Testing Plan
1. **Script Loading Verification**: Verify in browser console that Google Drive auto-sync scripts load on `/student/`, `pages/teachers.php`, and `pages/parents.php` when `auto_sync_gdrive` is set to `true`.
2. **Cross-Tab Reactivity**: Change an accommodation in `pages/parents.php` and verify real-time update in open student tabs without refreshing.
3. **Mastery Roster Sync**: Verify that student practice achievements update the active student entry in `hesten_teacher_roster`.
