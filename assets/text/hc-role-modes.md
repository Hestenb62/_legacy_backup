# Role & Persona Modes Guide

## Feature Title: Universal Role & Persona Modes (Student, Teacher, Parent)

### Executive Overview
The **Role & Persona Mode System** introduces an adaptive viewing lens across Hesten's Learning. It empowers learners, educators, and homeschool families to tailor the platform interface to their specific workflow. By default, users enter in **All Modes** where all curriculum levels, digital library volumes, and diagnostic tools are accessible. Users can easily switch to **Student Mode** for a distraction-free learning environment, **Teacher Mode** for curriculum pacing and assignment dispatching, or **Parent Mode** for homeschool legal compliance and accommodations tracking.

---

### Available Modes & Tailored Experiences

1. **🌐 All Modes (General / Default)**:
   - Full, unconstrained access to every corner of the platform.
   - Recommended for general exploration, independent self-learners, and curriculum evaluators.
   - Preserves standard navigation: Home, Assessment, Library, and Resources.

2. **🎓 Student Mode (Focused Learning)**:
   - Eliminates cognitive clutter by hiding teacher pacing guides, lesson assignment builders, classroom rosters, and IEP administrative settings.
   - Elevates a direct link to the **Student Academic Hub** (`/student/index.php`) in the top navigation.
   - Activates a personalized **Scholar Learning Station** on the home page with shortcuts to daily study modules, digital library reading rooms, and interactive science labs.
   - If a student navigates to an educator or parent page directly, an accessible notice banner gently informs them they are viewing adult tools in Student Mode.

3. **🍎 Teacher Mode (Educator Suite)**:
   - Places the **Teacher Suite** (`/pages/teachers.php`) front and center in the top navigation.
   - Adds an **Educator Quick Actions Console** to the home page with instant shortcuts:
     - ⚡ **Assignment Builder**: Generate customized, shareable lesson links with curriculum presets.
     - 📅 **36-Week Scope & Sequence**: Navigate weekly lesson pacing guides aligned with CCSS and NGSS standards.
     - 📈 **Standards Heatmap**: Explore real-time student competency percentages and mastery distributions.
   - Highlights the Teacher Toolkit within the Resources mega-menu while filtering out parent-specific administrative links.

4. **🏡 Parent Mode (Homeschool Hub)**:
   - Places the **Parent Hub** (`/pages/parents.php`) directly in the top navigation.
   - Adds a **Homeschool & Parent Console** to the home page with quick shortcuts:
     - 🗺️ **State Homeschool Law Guide**: Interactive 50-state legal regulations, mandatory subjects, and notice requirements.
     - 🛠️ **Accommodations Engine**: 1-click configuration for IEP/504 presets, OpenDyslexic typography, Irlen color overlays, and sensory retreat modes.
     - 📜 **Official Academic Portfolio & Transcripts**: View and print student homeschool mastery dossiers and certificates (`/pages/profile.php`).
   - Filters out classroom teacher dispatchers while highlighting home education resources.

---

### Switching Modes & 4-Digit Educator PIN Protection

- **Accessing the Switcher**:
  1. Click or press `Enter` on the **User Profile Pill** in the top navigation bar.
  2. Inside the dropdown menu, locate the **View Mode** radio group.
  3. Select your desired mode (**All**, **Student**, **Teacher**, or **Parent**). The change takes effect immediately without reloading the page.
- **Educator PIN Lock**:
  - When switching into **Teacher** or **Parent** mode for the first time, users are prompted to set an optional **4-digit PIN**.
  - If a PIN is created, switching back to **Student Mode** is always 1-click (allowing an adult to hand the device to a child in seconds).
  - When in Student Mode, attempting to switch to Teacher or Parent mode prompts for the 4-digit PIN, ensuring students cannot access answer keys or edit teacher rosters.
  - To change or remove the PIN, click **Mode PIN Settings** in the user dropdown menu.

---

### Data Synchronization & Storage Architecture

- **Canonical Storage Keys**:
  - `hl_active_role`: Holds the active mode (`'all'`, `'student'`, `'teacher'`, `'parent'`).
  - `hl_role_pin`: Stores the optional 4-digit educator PIN.
- **Multi-Tab & Cloud Synchronization**:
  - All open browser tabs listen to `storage` and `hl:role-changed` events, updating UI states in real time when a mode is toggled in another window.
  - Integrates with global Google Drive cloud auto-sync (`hestens_learning_data.json`).
- **Zero-Flicker Rendering**:
  - An inline script in the page `<head>` sets `<html data-active-role="...">` prior to CSS paint, ensuring zero layout shift or visual jumping on load.

---

### Accessibility & UDL Standards (WCAG 2.1/2.2 AA & AAA)

- **Semantic Radio Group**: The role switcher is marked up as an accessible `role="radiogroup"` with individual `role="radio"` buttons and live `aria-checked` states.
- **Screen Reader Announcements**: Switching modes automatically broadcasts a clear confirmation to `#a11y-live-region` (e.g., *"View mode set to Teacher. Educator suite active."*).
- **Keyboard Navigation**: 100% operable via keyboard (`Tab`, Arrow keys, `Enter`, `Space`, `Esc`).
- **High Contrast & Theme Adaptability**: All consoles, badges, and modal views meet WCAG AAA contrast ratios (≥7:1) across Light, Dark, Midnight, Sepia, and High Contrast themes.
