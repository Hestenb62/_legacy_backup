---
title: "Role & Persona Mode Switcher Architecture Walkthrough"
date: "2026-10-24"
version: "v2.25.0"
category: "Walkthrough"
tags: ["Roles", "Navigation", "Security", "PIN", "Tripartite Architecture", "Accessibility"]
summary: "Full walkthrough of the Role & Persona Mode system (All, Student, Teacher, Parent) with profile switcher, PIN security, contextual navigation, and home consoles."
author: "Antigravity & Hesten"
---

# Role & Persona Mode Switcher Architecture Walkthrough

## Executive Summary
Version **v2.25.0** introduces the **Universal Role & Persona Mode Architecture**, bringing the platform's underlying Tripartite Data Model (Student, Teacher, Parent) directly to the user interface. Users can seamlessly shift their perspective between four distinct modes: **All (General / Default)**, **Student (Focused Learning)**, **Teacher (Educator Suite)**, and **Parent (Homeschool Hub)**. The system includes an accessible 4-digit educator PIN lock, contextual top-level navigation, tailored mega-menu filtering, and interactive glassmorphic home page action consoles.

---

## 1. Key Components & Implementation Breakdown

### Phase 1: Core State, Profile Pill Switcher & PIN Protection
* **User Profile Pill & Dropdown** ([`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php)):
  * Added a semantic `role="radiogroup"` segmented switcher directly within the user dropdown menu.
  * Added dynamic badge styling (`#user-role-badge`) with theme-adaptive colors:
    * 🌐 **All Modes**: Clean Neutral Slate
    * 🎓 **Student**: Sky Blue / Teal
    * 🍎 **Teacher**: Emerald / Green
    * 🏡 **Parent**: Purple / Violet
* **Educator PIN Security Modal** ([`src/partials/role-pin-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/role-pin-modal.php)):
  * Prompts users when first switching into Teacher or Parent mode to optionally establish a 4-digit numeric PIN.
  * Ensures 1-click immediate hand-off back to **Student Mode**.
  * When in Student Mode, locks entry into Teacher or Parent mode behind the 4-digit PIN to prevent children from accessing answer keys, pacing guides, or rosters.
  * Provides a dedicated PIN management dialog to update or remove the PIN anytime.
* **Core Role Engine** ([`assets/js/core/role-mode-manager.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/core/role-mode-manager.js)):
  * Stores state in `hl_active_role` and `hl_role_pin`.
  * Inline head script in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) sets `<html data-active-role="...">` before render to ensure zero layout shift.
  * Emits `hl:role-changed` and `hl:data-sync` events, with multi-tab `storage` synchronization.
  * Announces mode shifts via `#a11y-live-region`.

---

### Phase 2: Contextual Navigation & Mega-Menu Filtering
* **CSS Role Scoping Rules** ([`assets/css/layouts/header.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/layouts/header.css)):
  * Scoped utility classes: `.role-nav-link`, `.role-student-only`, `.role-teacher-only`, `.role-parent-only`, `.role-hide-student`, and `.role-educator-parent`.
* **Top Navigation Links**:
  * **Teacher Mode**: Directly surfaces a primary **Teacher Suite** nav link (`/pages/teachers.php`).
  * **Parent Mode**: Directly surfaces a primary **Parent Hub** nav link (`/pages/parents.php`).
  * **Student Mode**: Directly surfaces the **Student Hub** nav link (`/student/index.php`).
  * **All Mode**: Maintains the standard, balanced navigation (`Home`, `Assessment`, `Library`, `Resources`).
* **Resources Mega-Menu**:
  * Highlights the Teacher Toolkit and Parent Resource Hub in Column 2 and in the menu footer.
  * Filters out adult administrative and research links in Student Mode.
* **Student Mode Direct Access Notice**:
  * Added persistent student mode banners to [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php) and [`pages/parents.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php) to notify and guide scholars if they navigate directly.

---

### Phase 3: Home Page Role Personalization
* **Contextual Consoles Partial** ([`src/partials/role-consoles.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/partials/role-consoles.php) & [`assets/css/components/role-consoles.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/components/role-consoles.css)):
  * **Teacher Console**: Shortcuts to Assignment Builder, 36-Week Pacing Guide, and Standards Heatmap.
  * **Parent Console**: Shortcuts to 50-State Homeschool Laws, Accommodations Engine, and Transcripts/Portfolios.
  * **Scholar Station**: Shortcuts to Student Academic Hub, Digital Library, and Interactive Labs.
* **Dynamic Hero Adaptation** ([`assets/js/pages/index-main.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/index-main.js)):
  * Automatically updates the hero greeting, subtitle, and primary call-to-action in real time upon role change.

---

## 2. Verification & Testing Results

| Test Case | Expected Behavior | Verification Status |
| :--- | :--- | :--- |
| **First Load (No Role Set)** | Default to `'all'`, all links visible, no PIN prompted | **Passed** (Document receives `data-active-role="all"`) |
| **Toggle to Teacher (No PIN)** | Setup modal opens offering optional 4-digit PIN | **Passed** (Supports Set & Skip buttons) |
| **Set 4-Digit PIN** | PIN saved to `hl_role_pin`, role set to `'teacher'` | **Passed** (Pill shows `TEACHER`, top nav shows Teacher Suite) |
| **Switch Teacher -> Student** | 1-click immediate hand-off, no PIN required | **Passed** (Switches instantly, pill shows `STUDENT`) |
| **Student -> Teacher (PIN Set)** | Prompts for 4-digit PIN before granting entry | **Passed** (Validates 4 digits; rejects incorrect PIN) |
| **Direct URL Navigation** | Visiting `teachers.php` in student mode displays alert banner | **Passed** (Accessible notice rendered) |
| **Real-Time Cross-Tab Sync** | Changing role in Tab A updates Tab B without reload | **Passed** (`storage` event listener synchronized) |
| **Accessibility & Contrast** | Screen reader announcements and keyboard navigation | **Passed** (`#a11y-live-region` active, focus rings intact) |
| **PHP & CSS Syntax** | Zero lint or syntax errors across modified files | **Passed** (100% tag and brace balance verified) |

---

## 3. Release Artifacts & User Guides
* **Implementation Plan**: [`updates/docs/2026-10-24-role-mode-switcher-plan.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/2026-10-24-role-mode-switcher-plan.md)
* **Help Center Guide**: [`assets/text/hc-role-modes.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/text/hc-role-modes.md)
* **Platform Release**: Bumped to `v2.25.0` in [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php) and [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php).
