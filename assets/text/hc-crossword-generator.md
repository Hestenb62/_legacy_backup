## Crossword Puzzle Studio (pages/crossword.php)

The Crossword Puzzle Studio empowers parents, homeschool educators, and classroom teachers to instantly transform academic vocabulary words and curriculum definitions into engaging, interlocking crossword puzzles. Solve interactively with auto-advancing keyboard navigation and synthesized audio feedback, or print clean 8.5" × 11" classroom worksheets and educator answer keys.

### Quick Access & Overview
- **Locations:**
  - Dedicated Fullscreen Studio: `/pages/crossword.php`
  - Teacher & Homeschool Suite: `/pages/teachers.php#crossword`
  - Parent Resource Hub: `/pages/parents.php#tools` (Companion Tool Card)
  - Accessible Game Zone: `/pages/games.php` (Vocabulary & Trivia Card)
- **Target Audience:** Parents building weekly spelling and vocabulary reviews, homeschool families reinforcing core subject concepts, and teachers creating classroom handouts, exit activities, or interactive whiteboard exercises.

### Core Capabilities & Action Controls
1. **Academic Curricular Packs & Custom Definition Editor:**
   - **Pre-Built Subject Packs:** Choose from Elementary Math (Grades 1–5), Middle & High School Math (Algebra & Geometry), Literature & Language Arts (literary devices), Science & Ecosystems, U.S. History & Civics, and Early Phonics / Sight Words.
   - **Custom Words & Clues Editor:** Enter custom vocabulary terms and definitions formatted as `WORD: Clue description`. The engine automatically strips punctuation and validates word length.

2. **Automatic Interlocking Crossword Layout:**
   - **Algorithmic Interlocking Engine:** Dynamically generates intersecting crossword grids using multi-trial heuristic placement with strict adjacency collision prevention.
   - **Standard Crossword Numbering:** Automatically generates sequential numbers for Across and Down starting cells and aligns clues accordingly.

3. **Interactive Browser Gameplay:**
   - **Intuitive Cell Navigation:**
     - Click any cell or press **Space** / **Enter** to toggle between Across and Down orientation.
     - Type letters to auto-advance to the next cell in the active word.
     - Press **Backspace** to erase letters and move backward.
     - Press **Tab** / **Shift + Tab** to jump seamlessly to the next or previous clue.
     - Arrow keys provide free navigation across all active cells on the board.
   - **Live Active Clue Banner:** An eye-level reader banner displays the currently selected clue, orientation, and number without requiring eye strain between the board and clue list.
   - **Validation & Hints:** Click **Check Grid** to highlight correct and incorrect letters, **Reveal Letter** for instant assistance on challenging cells, or toggle **Show Solution** to view the entire answer key.
   - **Synthesized Audio Chimes:** Built-in Web Audio API chimes provide pleasant audio reinforcement upon completing words and fanfare upon solving the puzzle.

4. **1-Click 8.5" × 11" Paper Worksheet Printing (Zero Clutter):**
   - **Blank Student Worksheet:** Automatically formats an official printable sheet containing **Name**, **Date**, and **Score** blanks, puzzle title, subtitle instructions, sharp high-contrast grid with numbers, and neat 2-column Across and Down clue lists.
   - **Optional Word Bank:** Toggle an accommodation word bank on the printed sheet or interactive screen to support differentiated instruction and IEP accommodations.
   - **Educator Answer Key:** Generates a complete solution reference sheet with solved grid letters and bold answers appended to each clue description.
   - **Scoped Print Styles:** All website headers, navigation links, sidebars, buttons, and footers are cleanly hidden via `@media print`.

### Universal Design for Learning (UDL) & Accessibility Features
- **OpenDyslexic Typeface Support:** Toggle between Modern Sans, Clean Monospace, or the OpenDyslexic typeface to enhance letter distinction and reduce visual crowding.
- **Letter Case Switching:** Toggle between UPPERCASE and lowercase typography. Lowercase mode assists emergent readers and kindergarten phonics learners.
- **WCAG 2.1/2.2 AA & AAA Contrast Compliance:** Grid cells and clues adapt seamlessly to Light, Dark, Sepia, and High-Contrast themes.
- **Screen Reader Announcements:** Dynamic letter positions, clue descriptions, and validation results are broadcast in real time through an `aria-live="polite"` live region.
- **100% Offline Capability:** Powered by client-side JavaScript and cached via the PWA service worker; functions completely without internet connectivity.
