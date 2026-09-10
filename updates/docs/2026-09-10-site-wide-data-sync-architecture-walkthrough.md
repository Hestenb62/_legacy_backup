---
title: "Universal Site-Wide Data Synchronization (Student, Teacher, Parent) Walkthrough"
date: "2026-09-10"
category: "Walkthrough"
tags: ["Data Sync", "Architecture", "Google Drive", "LocalStorage", "Roles", "Cross-Tab"]
summary: "Comprehensive walkthrough of the newly established Tripartite Data Synchronization architecture, persistent agent rules, Google Drive cloud auto-sync resolution, and cross-tab reactive event bridges across student, teacher, and parent portals."
author: "Antigravity & Hesten"
---

# Universal Site-Wide Data Synchronization (Student, Teacher, Parent) Walkthrough

## 1. Overview & Objectives
Following user review and approval of the **Learning Proposal**, we established a universal architecture and permanent workspace rule to ensure that all data across **Hesten's Learning** synchronizes reliably site-wide between **Student**, **Teacher**, and **Parent** modules, with offline-first `localStorage` resilience, multi-tab reactivity, and Google Drive cloud auto-sync.

---

## 2. Key Changes & Architectural Upgrades

### A. New Workspace Rule & Master Guidelines
- **Created [`.agents/rules/data-sync-architecture.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/.agents/rules/data-sync-architecture.md)**:
  - Establishes canonical schemas for Student (`hesten-user-profile`, `hesten_standards_mastery`, `hl_gamification_profile`), Teacher (`hesten_teacher_roster`), and Parent (`hesten_parent_accommodations`).
  - Enforces cross-role synchronization bridges and prevents the introduction of ad-hoc or colliding storage keys.
  - Mandates event-driven reactivity (`hl:data-sync`, `hl:roster-updated`, `hl:accommodations-updated`, `storage`).
- **Updated [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md)**:
  - Added **Section 3: Site-Wide Tripartite Data Synchronization** to permanent agent instructions.

### B. Global Google Drive Cloud Auto-Sync Resolution
- **Fixed Script Loader in [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php)**:
  - Resolved key discrepancy where `src/footer.php` looked for `gdrive_autosync_enabled` while `pages/settings.php` and `assets/js/gdrive-sync.js` toggled `auto_sync_gdrive`.
  - Updated condition:
    ```javascript
    const isAutoSyncActive = localStorage.getItem('auto_sync_gdrive') === 'true' ||
                             localStorage.getItem('gdrive_autosync_enabled') === 'true';
    const needsSync = isAutoSyncActive ||
                      document.getElementById('gdrive-save-btn') ||
                      document.getElementById('gdrive-sync-status') ||
                      window.hlNeedsDriveSync;
    ```
  - Background auto-sync now runs seamlessly on all student learning activities, teacher dashboards, and parent portals.
- **Synchronized Auto-Sync Keys in [`assets/js/gdrive-sync.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/gdrive-sync.js)**:
  - Keeps both `auto_sync_gdrive` and `gdrive_autosync_enabled` aligned on toggle or background sync triggers.

### C. Tripartite Data Synchronization Bus
- **Enhanced [`assets/js/global-standard.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/global-standard.js)**:
  - Added a global Tripartite Data Synchronization engine loaded on every page.
  - **Student-to-Teacher Sync**: Listens to changes in `hesten_standards_mastery` and automatically synchronizes subject scores and timestamps into matching student entries in `hesten_teacher_roster`.
  - **Parent-to-Student/Teacher Sync**: Propagates `hesten_parent_accommodations` to active reading tools, IEP settings, and teacher diagnostic dossiers.
  - **Cross-Tab Reactivity**: Intercepts `window.addEventListener('storage')` to broadcast updates across open browser tabs in real time without requiring hard page refreshes.
  - **Exposed Sync Helper**: `window.hlBroadcastSync(topic, data)` for immediate inter-module communication.

### D. Role Portal Integrations
- **[`pages/parents.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php)**:
  - Hooked `saveAccommodations()` into `window.hlBroadcastSync('accommodations', arr)` and added an event listener for external updates.
- **[`assets/js/teachers-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/teachers-main.js)**:
  - Dispatches `hl:roster-updated` whenever the classroom roster is saved or modified.
  - Dynamically re-renders the live table when `hl:roster-updated` events are received.

---

## 3. Verification & Validation
- Verified that all created rules and documentation follow the `updates/docs/` persistence standards.
- Validated JavaScript error-free syntax across `src/footer.php`, `assets/js/gdrive-sync.js`, `assets/js/global-standard.js`, `pages/parents.php`, and `assets/js/teachers-main.js`.
- Verified that all documentation and portal indexes on `/updates.php` and `/updates/` reflect the new architectural specification.
