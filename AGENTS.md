# Agent Customization & Workspace Rules: Hesten's Learning

## 1. Documentation & Updates Persistence
- **Mandatory Update Logs**: Whenever generating or updating an **Implementation Plan**, **Walkthrough**, **Bugfix Document**, or **Architectural Proposal**:
  - In addition to any session artifacts, you MUST save a Markdown (`.md`) copy into `updates/docs/` with standard naming convention:
    - `updates/docs/YYYY-MM-DD-<topic>-plan.md` for implementation plans.
    - `updates/docs/YYYY-MM-DD-<topic>-walkthrough.md` for walkthroughs.
    - `updates/docs/YYYY-MM-DD-<topic>-bugfix.md` for bugfix reports.
  - Include standard YAML frontmatter:
    ```yaml
    ---
    title: "Descriptive Human-Readable Title"
    date: "YYYY-MM-DD"
    category: "Walkthrough" # Walkthrough | Implementation Plan | Bugfix | Architecture
    tags: ["Tag1", "Tag2"]
    summary: "1-2 sentence executive summary of the changes."
    author: "Antigravity & Hesten"
    ---
    ```
  - All documents in `updates/docs/` are automatically indexed, searchable, and viewable on the Updates Portal at `/updates.php` and `/updates/`.
  - Never leave planning or walkthrough details solely in ephemeral chat context.

## 2. Core Architectural Principles
- **Offline Resiliency**: `offline.php` is the sole offline shell and service worker fallback. Never generate `offline.html`.
- **Navigation & Routes**: Avoid creating redundant stub files (such as `documents.php`); direct links straight to active endpoints like `/library/index.php`.
- **Subject Breadcrumb Hierarchy**: Breadcrumb trails must reflect current grade and subject, e.g. `Level K Math`, `Level K ELA`.
- **Standards Explorer Codes**: Domain filter buttons on `pages/standards.php` must strictly display concise standard numbers and letters (e.g. `K.MP`, `K.CC`, `K.OA`, `8.EE`, `HSA-SSE`) instead of full multi-word domain titles.
- **MathJax Typography & Universal Rendering**: Any page featuring mathematical notation must render via MathJax SVG with responsive overflow containment, baseline alignment, currentColor theme inheritance, and automatic mutation-observer typesetting for dynamically injected exercises.

## 3. Site-Wide Tripartite Data Synchronization
- **Unified Role Data Architecture**: All student data (`hesten-user-profile`, `hesten_standards_mastery`, `hl_gamification_profile`), teacher data (`hesten_teacher_roster`), and parent data (`hesten_parent_accommodations`) must follow canonical keys and schemas.
- **Universal Cloud Auto-Sync**: Background Google Drive auto-sync must operate across all student, teacher, and parent pages. Auto-sync scripts must load on `auto_sync_gdrive === 'true'`.
- **Cross-Role & Cross-Tab Bridges**: Accommodation changes made by parents must reflect in student readers and teacher dossiers; mastery earned by students must sync with teacher rosters; all state changes must broadcast `storage` and `hl:data-sync` events.

## 4. Universal WCAG, A11y & UDL Compliance Mandate
- **Strict Non-Negotiable Compliance**: Under no circumstances shall any page, component, or code modification fail to meet WCAG 2.1/2.2 AA & AAA, Section 508, and UDL standards.
- **Perceivable, Operable, Understandable, Robust**: 100% keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`), explicit `:focus-visible` high-contrast focus rings, minimum 4.5:1 contrast (7:1 in AAA high contrast), user-scalable viewports, skip navigation links, and full screen reader semantic labeling.
- **Universal Design for Learning**: Support multiple means of representation (read-aloud, dyslexia fonts, Irlen tints, MathJax), expression (speech-to-text, keyboard hotkeys), and engagement (low-anxiety mode, untimed practice).


