---
trigger: always_on
---

# Rule: Mandatory Persistence of Planning & Walkthrough Documents

## Invariant Rule
Whenever generating or updating an **Implementation Plan**, **Walkthrough**, **Bugfix Document**, or **Architectural Proposal**:

1. **Simultaneous File Creation in `updates/docs/`**:
   - In addition to any in-session planning artifacts, you MUST write or update a permanent Markdown (`.md`) file in `updates/docs/`.
   - Use the standard naming convention:
     - `updates/docs/YYYY-MM-DD-<topic>-plan.md` for implementation plans.
     - `updates/docs/YYYY-MM-DD-<topic>-walkthrough.md` for walkthroughs and verification summaries.
     - `updates/docs/YYYY-MM-DD-<topic>-bugfix.md` for major bug resolutions.

2. **Required Frontmatter**:
   Every document in `updates/docs/` MUST begin with YAML frontmatter:
   ```yaml
   ---
   title: "Descriptive Human-Readable Title"
   date: "YYYY-MM-DD"
   version: "v2.5.0" # Active semantic version of the platform release (e.g. v2.5.0)
   category: "Walkthrough" # Allowed: "Walkthrough", "Implementation Plan", "Bugfix", "Architecture"
   tags: ["Tag1", "Tag2"]
   summary: "1-2 sentence executive summary of the plan or changes."
   author: "Antigravity & Hesten"
   ---
   ```

3. **Portal Visibility**:
   - The Updates Portal at `/updates.php` and `/updates/` dynamically indexes and renders all files in `updates/docs/`.
   - Never finalize a task with planning or walkthrough information confined solely to chat messages.

4. **Platform Version & Footer Release Info Synchronization**:
   - Whenever platform features, major fixes, or architectural enhancements are made:
     - Check and update the platform version constants in `src/header.php` and `src/footer.php`:
       - `HL_SITE_VERSION`: Bump semantic version (e.g., `v2.4.0` -> `v2.5.0` for feature additions, `v2.5.1` for patch fixes).
       - `HL_SITE_VERSION_DATE`: Reflect the current release month/year (e.g., `September 2026`).
       - `HL_SITE_VERSION_LABEL`: Update human-readable release label (e.g., `September 2026 Release`).
       - `HL_SITE_VERSION_SUMMARY`: Update the high-level release theme.
     - Update the "What's in Version [X]" modal feature list in `src/footer.php` (`#footer-version-modal`) so that newly introduced capabilities are clearly documented in user-facing release notes.

5. **Mandatory Help Center User Guides (`assets/text/hc-*.md`)**:
   - Whenever introducing a new feature, study tool, or major platform enhancement:
     - You MUST create or update a corresponding Markdown help article in `assets/text/hc-<feature-slug>.md`.
     - Standard article structure:
       - Level 2 heading: `## Feature Title`
       - Executive overview explaining what the feature does and target users.
       - Bullet list of core capabilities, keyboard shortcuts, and action buttons.
       - Accessibility & UDL notes (screen reader support, font sizing, high contrast, offline access).
     - Articles matching `assets/text/hc*.md` are automatically indexed, categorized, and rendered on [`pages/help-center.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/help-center.php).
