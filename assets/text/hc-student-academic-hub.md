# Student Academic Hub Guide

## Feature Title: Student Academic Hub & Scholar Command Console

### Executive Overview
The **Student Academic Hub** (`/student/index.php`) serves as the central learning workstation for K-12 scholars on Hesten's Learning. It synthesizes core subject learning paths (Mathematics, English Language Arts, Science & Engineering, Social Studies & Civics), standards mastery tracking, adaptive diagnostic testing, and active digital library bookmarks into a single, cohesive, accessible command console.

---

### Core Capabilities & Layout

1. **Scholar Command Console (Hero Area)**:
   - **Personalized Scholar Greeting**: Welcomes the student by first name directly from `hesten-user-profile` (e.g., *"Welcome back, Alex!"*).
   - **Grade Level Pill Badge**: Displays current academic level (Kindergarten through Grade 12).
   - **Daily Study Time Counter**: Dynamically tracks minutes studied today from `hesten_today_study_minutes`.
   - **Direct Profile Shortcut**: Quick link to the Scholar Profile & Accommodations dashboard (`/pages/profile.php`).

2. **Unified Academic Quick Bar**:
   - 📖 **Digital Library** (`/library/index.php`): Instant gateway to 30+ core volumes, classic literature, primary historical sources, and custom reading tools.
   - 🧠 **Adaptive Diagnostic** (`/assessment/diagnostic.php`): Real-time standard skill diagnosis and targeted remediation prescriptions.
   - 🏅 **State Standards** (`/pages/standards.php`): Track Common Core, NGSS, and state competency benchmark domains.
   - 🎮 **Learning Arcade** (`/pages/games.php`): Curriculum-aligned educational games, math drills, and vocabulary quests.

3. **Jump Back In (Recent Activity Shelf)**:
   - Displays recently bookmarked reading volumes and active lessons reading directly from `localStorage.getItem('library-bookmarks')`.
   - Allows scholars to resume study sessions with a single click.

4. **Standards Mastery Progress Widget**:
   - Displays earned competency badges across standard checks and exit tickets reading from `hesten_standards_mastery`.
   - Formats standard codes concisely (e.g., `HSF.IF.B.4`, `K.CC.1`) with score percentages and status indicators (Mastered vs. Practicing).
   - Direct button to open the full Standards Explorer.

5. **Core Subject Gateways & Study Drawers**:
   - Four dedicated discipline cards:
     - **Mathematics** (*STEM Curriculum*): Practice problems, video tutorials, study guides, math games.
     - **English Language Arts** (*Humanities & Language*): Reading comprehension, writing prompts, grammar & vocab, literature analysis.
     - **Science & Engineering** (*Scientific Inquiry*): Virtual experiments, articles & news, diagrams & models, quizzes.
     - **Social Studies & Civics** (*History & Society*): Historical timelines, interactive maps, civics & government, current events.
   - **Study Tips & Resource Drawers**: Expandable accordion drawers with core formulas (PEMDAS, area formulas, Pythagorean theorem), active reading annotations, scientific method steps, civics structures, and vetted external learning links (Khan Academy, Desmos, PhET Simulations, Newsela, iCivics).

---

### Data Synchronization & Offline Resiliency

- **Tripartite Role Architecture**:
  - Automatically synchronizes with student profile data (`hesten-user-profile`), standards competency (`hesten_standards_mastery`), and study goals.
  - Automatically listens to `storage`, `hl:profile-updated`, `hl:data-sync`, `standards-mastery-updated`, and `hl:assessment-complete` events across browser tabs.
- **Global Google Drive Auto-Sync**:
  - Intercepts local updates and seamlessly backs up all scholar progress to the cloud when Google Drive auto-sync is enabled.
- **Offline Shell Compatibility**:
  - Full offline functionality supported by the Service Worker and `offline.php` caching system.

---

### Accessibility & UDL Standards (WCAG 2.1/2.2 AA & AAA)

- **Keyboard Navigation**:
  - 100% operable via keyboard (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`).
  - High-contrast `:focus-visible` focus rings on all buttons, links, and accordion toggles.
- **High-Contrast AAA Compliance**:
  - Deep black backgrounds (`#000000`), crisp 2px white borders, and bright yellow accent icons and text in High Contrast mode meeting ≥ 7:1 contrast ratios.
- **MathJax Typography**:
  - Mathematical notation ($A = \pi r^2$, $a^2 + b^2 = c^2$, $y = mx + b$) rendered via MathJax SVG with responsive overflow containment, baseline alignment, and theme inheritance.
  - Automatically re-typeset when study drawers are expanded via `window.ensureMathJax`.
