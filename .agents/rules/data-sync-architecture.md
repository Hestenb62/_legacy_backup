---
trigger: always_on
---

# Rule: Universal Site-Wide Data Synchronization (Student, Teacher, Parent)

## Core Invariant
All persistent user data across Hesten's Learning must adhere to the **Tripartite Role Synchronization Architecture** (Student, Teacher, Parent), maintaining offline-first resiliency, cross-tab reactivity, and seamless cloud auto-sync.

### 1. Canonical Storage Keys & Data Schemas
Never invent inconsistent or ad-hoc storage keys. Adhere to canonical keys:
- **Student Profile & Gamification**:
  - `hesten-user-profile`: JSON object `{ firstName, avatarData, grade, xp, level, ... }`
  - `hl_gamification_profile`: JSON object `{ xp, level, unlockedNodes, questProgress }`
  - `hesten_standards_mastery`: JSON map `{ [standardCode]: masteryScoreOrStatus }`
  - `library-bookmarks`: JSON array of bookmarked lesson / story IDs
- **Parent & Accommodation Data**:
  - `hesten_parent_accommodations`: JSON array of active accommodation keys (e.g., `['sensory-retreat', 'untimed-mode', 'opendyslexic']`)
- **Teacher & Classroom Data**:
  - `hesten_teacher_roster`: JSON array of student objects `{ id, name, grade, math, ela, science, social, standards, accommodations, notes, lastCheck }`
- **Cloud Auto-Sync**:
  - Primary key: `auto_sync_gdrive` (boolean `'true'` / `'false'`). Always check both `auto_sync_gdrive` and legacy `gdrive_autosync_enabled` for backward compatibility.

### 2. Global Cloud Auto-Sync Integrity
- `src/footer.php` must unconditionally check `localStorage.getItem('auto_sync_gdrive') === 'true' || localStorage.getItem('gdrive_autosync_enabled') === 'true'` to ensure Google Drive auto-sync scripts load on every single page across the site.
- `gdrive-sync.js` intercepts all `localStorage.setItem` and `localStorage.removeItem` operations (excluding internal auth tokens) to debounce auto-sync to `hestens_learning_data.json`. All student, teacher, and parent keys must be included in `getAllSiteData()`.

### 3. Bidirectional Role Synchronization Bridges
- **Student-to-Teacher Sync**: When a student completes assessments or exercises that write to `hesten_standards_mastery`, check if the active student exists in `hesten_teacher_roster` and synchronize their scores and timestamps.
- **Parent-to-Student/Teacher Sync**: Accommodations toggled in `pages/parents.php` must write to `hesten_parent_accommodations` and dispatch `hl:accommodations-updated`. The student accessibility runner and teacher diagnostic dossiers must dynamically read and apply these settings.
- **Teacher-to-Student Sync**: When a teacher saves diagnostic notes or adjusts student accommodations in the Diagnostic Dossier, the changes must bridge to the corresponding student profile records.

### 4. Cross-Tab & Event-Driven Reactivity
- Every module writing data to `localStorage` must dispatch standard window events (`hl:data-sync`, `hl:profile-updated`, or `settings-changed`).
- Pages must listen to `window.addEventListener('storage', ...)` so updates made in one tab or role hub instantly reflect across open browser tabs without requiring hard page refreshes.
