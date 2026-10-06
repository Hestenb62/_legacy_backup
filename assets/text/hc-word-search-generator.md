## Word Search & Vocabulary Puzzle Studio (pages/word-search.php)

The Word Search & Vocabulary Puzzle Studio empowers parents, homeschool families, and classroom teachers to instantly create engaging, curriculum-aligned word searches and spelling puzzles. Play interactively with keyboard navigation and synthesized audio feedback, or print clean 8.5" × 11" classroom worksheets and educator answer keys.

### Quick Access & Overview
- **Locations:**
  - Dedicated Fullscreen Studio: `/pages/word-search.php`
  - Teacher & Homeschool Suite: `/pages/teachers.php#word-search`
  - Parent Resource Hub: `/pages/parents.php#tools` (Companion Tool Card)
  - Accessible Game Zone: `/pages/games.php` (Spelling & Vocab Card)
- **Target Audience:** Parents creating weekly spelling practice, homeschoolers reviewing unit vocabulary, and teachers generating printable classroom handouts or screen-shared whiteboard activities.

### Core Capabilities & Action Controls
1. **Academic Vocabulary Presets & Custom Lists:**
   - **Pre-Built Curricular Packs:** Choose from Elementary Math (Grades 1–5), Middle & High School Math (Algebra & Geometry), Literature & Language Arts (literary terms), Science & Ecosystems, U.S. History & Civics, and Early Phonics / Sight Words.
   - **Custom Vocabulary Textarea:** Paste your own spelling lists, science units, or literature words separated by commas or line breaks. The engine automatically strips punctuation and validates word length.

2. **Customizable Grid Dimensions & Difficulty:**
   - **Grid Sizes:** Select from 10×10 (Early Elementary), 12×12 (Standard), 15×15 (Challenging), 18×18 (Advanced), and 20×20 (Mastery).
   - **8-Directional Placement Engine:**
     - *Easy:* Left-to-Right Horizontal and Top-to-Bottom Vertical only (ideal for K–2 learners).
     - *Medium:* Across, Down, and Diagonal (↘, ↙).
     - *Hard:* All 8 directions, including backwards words (R←L, B↑T, ↖, ↗).

3. **Interactive Browser Gameplay:**
   - **Multiple Input Modes:**
     - *Mouse / Touch Drag:* Click/touch and drag across letters in a straight line.
     - *Click-to-Click:* Click the starting letter, then click the ending letter (optimized for tablets and motor accessibility).
     - *Full Keyboard Navigation:* Arrow keys to navigate cells, `Space` to anchor starting letter, arrow keys to extend selection, and `Enter` to confirm.
   - **Positive Reinforcement:** Harmonious pastel highlighting across found words, automatic strikethrough in the Word Bank, and synthesized Web Audio chimes without external downloads.
   - **Teacher Hint & Solution Toggles:** Click **Hint** to illuminate the starting letter of an unfound word, or toggle **Show Solution** to highlight all answers.
   - **Untimed / Low-Anxiety Stopwatch:** Play with a gentle timer or ignore it completely for stress-free exploration.

4. **1-Click 8.5" × 11" Paper Printing (Zero Clutter):**
   - **Blank Student Worksheet:** Automatically formats an official printable sheet containing **Name**, **Date**, and **Score** blanks, puzzle title, subtitle instructions, sharp high-contrast letter grid, and an aligned 4-column Word Bank with pencil checkboxes.
   - **Educator Answer Key:** Generates a teacher grading reference sheet with circled word locations, grayed fills, and a comprehensive coordinate matrix (e.g. *FRACTION: Row 4, Col 2 &rarr; Horizontal*).
   - **Pristine Print Scoping:** All website headers, navigation links, sidebars, buttons, and footers are cleanly hidden via `@media print`.

### Universal Design for Learning (UDL) & Accessibility Features
- **OpenDyslexic Typeface Support:** Toggle between Modern Sans, Clean Monospace, or the OpenDyslexic typeface to enhance letter distinction and reduce visual crowding.
- **Letter Case Switching:** Toggle between UPPERCASE and lowercase typography. Lowercase mode assists emergent readers and kindergarten phonics learners.
- **WCAG 2.1/2.2 AA & AAA Contrast Compliance:** Grid cells and word banks adapt seamlessly to Light, Dark, Sepia, and High-Contrast themes.
- **Screen Reader Announcements:** Dynamic letter positions, starting anchors, and found words are broadcast in real time through an `aria-live="polite"` live region.
- **100% Offline Capability:** Powered by client-side JavaScript and cached via the PWA service worker; functions completely without internet connectivity.
