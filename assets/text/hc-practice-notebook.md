## Interactive Student Practice Notebook (src/lesson_renderer.php)

Transform static curriculum Problem Sets into an interactive, accessible digital workbook. The Student Practice Notebook allows students to write out step-by-step calculations, launch the digital scratchpad, track problem solved status, and save work automatically to local and cloud storage.

### Quick Access & Overview
- **Location:** Embedded directly in every curriculum lesson on Hesten's Learning under the **Problem Set & Practice Exercises** section (`#problem-set`).
- **Target Audience:** Students working through daily practice problems, homeschoolers completing independent coursework, and teachers reviewing solved student work.

### Core Capabilities & Superpowers
1. **Interactive Digital Workspaces:**
   - Every problem card includes a dedicated student response textarea where students can record their step-by-step mathematical reasoning, algebra steps, and final answers.
   - Textareas feature responsive vertical resizing, clean contrast formatting, and spellcheck.

2. **Debounced Local Storage Auto-Save:**
   - As you type, answers are debounced and saved automatically to browser `localStorage` under the canonical key `hl_practice_notebook_${lessonId}`.
   - Live visual status indicator displays **Saving...** and turns green to confirm **Saved**.
   - Your work persists across browser restarts and page refreshes.

3. **Cloud Auto-Sync Integration:**
   - Every saved keystroke and solved status change automatically dispatches an `hl:data-sync` event.
   - When Google Drive Auto-Sync is enabled in user settings, your entire problem set notebook syncs seamlessly to your cloud backup file (`hestens_learning_data.json`).

4. **Progress Meter & Solved Status Toggles:**
   - **Mark Solved Button:** Click the status button on each problem card to toggle between **Mark Solved** and **Solved** with a green checkmark icon.
   - **Live Progress Meter:** The header displays real-time progress (e.g. *3 of 4 Solved (75%)*), updating the visual completion bar dynamically.
   - **All Solved Celebration:** Completing 100% of problems in a lesson highlights the problem set container with celebratory styling.

5. **1-Click Super Scratchpad Integration:**
   - Need to sketch a geometry diagram, write math fractions by hand, or plot on coordinate grids?
   - Click the **Scratchpad** button on any problem card to instantly launch the Super Scratchpad Studio pre-loaded with the problem prompt.

6. **Dual-Mode Homework Printing:**
   - **Print Blank Worksheet:** Click **Print Blank** to generate clean physical worksheets with dedicated handwriting lines for pencil-and-paper assignments.
   - **Print Solved Work:** Click **Print Solved Work** to generate official homework submission sheets featuring your typed reasoning and calculations while keeping teacher answer keys hidden.
   - **Reset / Clear Work:** Reset your typed answers with a single click after confirming the action dialog.

### Accessibility & UDL Features
- **100% Keyboard Operability:** Navigate between problem cards, buttons, and workspaces using `Tab`, `Shift + Tab`, `Enter`, and `Space`.
- **High-Contrast Focus Rings:** Clear `:focus-visible` outlines ensure users always know which problem is active.
- **Screen Reader Support:** Live status changes ("Problem 1 marked as solved", "Saved") announce to assistive technology via `aria-live="polite"` regions.
- **Low-Anxiety Practice:** Completely untimed, self-paced workspace with expandable teacher answer keys available whenever guidance is needed.
