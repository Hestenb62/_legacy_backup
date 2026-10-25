---
title: "Role & Persona Mode Switcher Architecture (Student, Teacher, Parent)"
date: "2026-10-24"
version: "v2.25.0"
category: "Implementation Plan"
tags: ["Roles", "Navigation", "Security", "PIN", "Tripartite Architecture", "Accessibility"]
summary: "Phased implementation plan for introducing General, Student, Teacher, and Parent modes with profile pill switching, PIN protection, and adaptive navigation."
author: "Antigravity & Hesten"
---

# Role & Persona Mode Switcher Architecture

## Executive Overview
This plan establishes a seamless, non-intrusive **Role & Persona Mode System** across Hesten's Learning. The system allows users to view the platform through four distinct lenses:
1. **General Mode (`all`) [Default]**: The site appears exactly as it does today with all resources, links, and portals accessible.
2. **Student Mode (`student`)**: Focused, distraction-free learning environment that hides teacher and parent administrative tools, pacing guides, and answer keys.
3. **Teacher Mode (`teacher`)**: Elevates educator tools (Pacing Guides, Assignment Builder, Diagnostic Dossiers, Student Rosters, Fluency Sprint Dispatcher).
4. **Parent Mode (`parent`)**: Elevates homeschool tools (State Legal Guide, Accommodations & IEP/504 presets, Transcripts, Student Progress).

To ensure students cannot freely switch into Teacher or Parent mode to access answer keys or educator guides, users are prompted to create an optional **4-digit PIN** when first switching into Teacher or Parent mode.

---

## Phased Step-by-Step Rollout Strategy

To honor the requirement to move **one step at a time** so every change is reviewable and reversible:

### Phase 1: Core State, Profile Pill Switcher & PIN Protection (Isolated in Header)
- **State Management**:
  - Store active role in `localStorage.getItem('hl_active_role')` (defaults to `'all'`).
  - Store optional PIN in `localStorage.getItem('hl_role_pin')`.
  - Reflect active role on root attribute: `<html data-active-role="all|student|teacher|parent">`.
  - Dispatch reactive custom event `hl:role-changed` and broadcast across tabs via `storage` listener.
- **Profile Pill UI Enhancement** (`src/header.php` & `assets/css/layouts/header.css`):
  - Add an intuitive 4-button segmented selector inside the User Dropdown:
    - 🌐 **All** (Complete Platform)
    - 🎓 **Student** (Focused Learning)
    - 🍎 **Teacher** (Educator Suite)
    - 🏡 **Parent** (Homeschool Hub)
  - Display dynamic badge and role label on the user pill (`ALL`, `STUDENT`, `TEACHER`, `PARENT`).
- **PIN Setup & Verification Modal**:
  - When switching from `all` or `student` to `teacher` or `parent`:
    - If no PIN is configured, show a gentle prompt: *"Protect Teacher/Parent Mode with a 4-digit PIN? (Set PIN or Skip for Now)"*.
    - If a PIN is configured, prompt for the 4-digit PIN before allowing entry.
  - Switching back to `student` or `all` is always immediate and frictionless (1-click).
- **Deliverable**: Verify the switcher, PIN modal, state persistence, and pill UI without modifying existing page contents or removing any links.

---

### Phase 2: Navigation & Resources Mega-Menu Contextual Filtering
- **CSS Role Scoping**:
  - Implement non-destructive utility classes:
    - `.role-teacher-only`: Visible only when `[data-active-role="teacher"]` or `[data-active-role="all"]`.
    - `.role-parent-only`: Visible only when `[data-active-role="parent"]` or `[data-active-role="all"]`.
    - `.role-hide-student`: Hidden when `[data-active-role="student"]`.
- **Top Navigation Bar Adaptation**:
  - In **Teacher Mode**: Add quick-access link to `/pages/teachers.php` (Teacher Suite).
  - In **Parent Mode**: Add quick-access link to `/pages/parents.php` (Parent Hub).
  - In **Student Mode**: Keep core learning links (Home, Assessment, Library, Resources), hiding adult administrative links.
  - In **All Mode**: Retain standard existing navigation.
- **Resources Mega Menu Filter**:
  - Tag links in the mega menu (pacing guides, teacher concepts, parent resources) so Student mode stays strictly child-focused.

---

### Phase 3: Home Page Role Personalization (`index.php`)
- **Role-Targeted Quick Action Console**:
  - Render a role-adaptive quick banner/card bar above or within the hero:
    - **Student**: "Jump to [Current Grade] Math", "Daily Quests", "Recent Literature".
    - **Teacher**: "Launch 60s Fluency Sprint", "Create Assignment Link", "View 36-Week Pacing Guide".
    - **Parent**: "Homeschool State Law Map", "Adjust Accommodations", "Print Student Transcript".
    - **All Mode**: Standard hero as-is.

---

### Phase 4: Verification, Help Center Guide & Release Documentation
- Author Help Center article: `assets/text/hc-role-modes.md`.
- Bump platform version constants in `src/header.php` and `src/footer.php` to `v2.25.0`.
- Update What's New modal in `src/footer.php`.
- Save comprehensive walkthrough to `updates/docs/2026-10-24-role-mode-switcher-walkthrough.md`.

---

## Technical Specifications & Storage Contracts

### Storage Schema
| Key | Type | Description | Default |
| :--- | :--- | :--- | :--- |
| `hl_active_role` | `string` | Active persona mode: `'all'`, `'student'`, `'teacher'`, `'parent'` | `'all'` |
| `hl_role_pin` | `string` | 4-digit PIN string for educator lock | `null` |
| `hl_role_pin_enabled` | `string` | `'true'` or `'false'` | `'false'` |

### Accessibility & UDL Guarantees
- Mode selector marked up with `role="radiogroup"` with individual `role="radio"` buttons and `aria-checked`.
- Modal traps focus and complies with standard keyboard shortcuts (`Esc` to dismiss).
- Dynamic screen reader announcements via `#a11y-live-region` upon role switch.
- Fully compatible with high-contrast, dark mode, dyslexia font, and keyboard-only navigation.
