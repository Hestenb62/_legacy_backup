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
