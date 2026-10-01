## Universal Curriculum Scope & Pop-Up Explorer

Browse complete scope-and-sequence curricula across all 14 grade levels—from **Pre-Kindergarten** and **Kindergarten** through **Grade 12**—in **Mathematics**, **English Language Arts**, **Science**, and **Social Studies**.

### Quick Access & Navigation
- **Homepage Grade Cards:** Navigate to `/` (Homepage) and locate any grade card (e.g. *Kindergarten*, *Grade 4*, *Grade 9 Algebra I*). Click the **Curriculum** button on the card to open the pop-up modal.
- **On-Demand Loading:** Curriculum data loads dynamically from `/assets/data/curr pop-ups/` in parallel across all 4 subjects, ensuring lightning-fast page loading with zero unnecessary initial payload.
- **In-Memory Caching:** Once loaded, each grade's curriculum is cached in memory for instantaneous re-opening during your session.

### Core Capabilities & Features
1. **Four Core Subject Tabs:**
   - Seamlessly switch between **Mathematics**, **English Language Arts**, **Science**, and **Social Studies** within the modal dialog.
   - Smooth active indicator highlighting shows your currently selected subject.

2. **Course Overview & Competencies:**
   - Review high-level course overviews, target competencies, and key learning goals for each grade level.
   - Distinct subject icons and tailored color accents provide visual orientation.

3. **Collapsible Module Accordions:**
   - Instructional modules are organized into expandable cards displaying module numbers, descriptive titles, and summaries.
   - Expand or collapse modules to inspect topic letters, titles, detailed conceptual descriptions, and focus standards.

4. **Standards Explorer Direct Links:**
   - Focus standards badges (e.g. *CCSS.MATH.CONTENT.HSA-CED.A.1*, *RL.9-10.1*, *MS-PS1-1*) link directly to the interactive **Standards Explorer** (`/pages/standards.php`), allowing students and educators to explore parent domains, progressions, and cross-grade alignments.

5. **Printable Curriculum Syllabi:**
   - Dedicated **Print Subject** buttons allow teachers, parents, and students to generate clean, printer-friendly course outlines without web navigation chrome or UI clutter.

### Accessibility & UDL Features
- **100% Keyboard Operable:** Navigate between subject tabs with keyboard arrows/Tab, toggle module accordions with `Enter` or `Spacebar`, and close the modal anytime with `Escape`.
- **WCAG High Contrast:** Tested in light, dark, and high-contrast color modes with minimum 4.5:1 text contrast and visible `:focus-visible` outlines.
- **Responsive Layout:** Formats gracefully down to 320px mobile viewports with horizontal scroll containment and touch-friendly targets.
- **Offline Resilient:** Cached by the service worker for uninterrupted offline review when disconnected from the internet.
