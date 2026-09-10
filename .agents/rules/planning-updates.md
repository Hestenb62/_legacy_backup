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
   category: "Walkthrough" # Allowed: "Walkthrough", "Implementation Plan", "Bugfix", "Architecture"
   tags: ["Tag1", "Tag2"]
   summary: "1-2 sentence executive summary of the plan or changes."
   author: "Antigravity & Hesten"
   ---
   ```

3. **Portal Visibility**:
   - The Updates Portal at `/updates.php` and `/updates/` dynamically indexes and renders all files in `updates/docs/`.
   - Never finalize a task with planning or walkthrough information confined solely to chat messages.
