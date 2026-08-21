# Hesten's Learning Platform

Welcome to **Hesten's Learning**, an adaptive, accessibility-first, and gamified educational platform built with neurodiversity at its core.

---

## 🎯 Our Mission & Purpose

Hesten's Learning aims to **revolutionize how online learning platforms are designed, used, and implemented**. 

While mainstream platforms (such as Khan Academy or IXL) offer excellent educational content, they frequently lack the critical tools and adaptive layouts needed for students with learning disabilities, ADHD, dyslexia, or visual sensitivities. 

This platform bridges that gap by providing a fully customizable environment that conforms to the student's sensory and cognitive needs, enabling every learner to progress at their own pace without friction.

---

## 📁 File Structure & Layout

The project is structured logically around server-side templating (PHP) and clean separation of concerns in Vanilla CSS and JavaScript:

```text
├── assets/                  # Static resources
│   ├── css/                 # Cascading style layers
│   │   ├── tokens.css       # Core theme variables & design tokens
│   │   ├── reset.css        # Zero-specificity base resets and font overrides
│   │   ├── primitives.css   # Accessibility tools, spotlight, & overlays
│   │   ├── utilities.css    # General utility helper classes
│   │   ├── components.css   # Main layout and widget design systems
│   │   └── components/      # Specific component styles (fixed-tools.css, etc.)
│   ├── fonts/               # Local web fonts (including OpenDyslexic)
│   ├── images/              # Assets, avatars, and media
│   └── js/                  # Browser scripts (a11y.js state controller)
│
├── src/                     # Core layout modules & reusable code
│   ├── partials/            # HTML/PHP modules
│   │   ├── a11y-settings.php # Accessibility sliding panel interface
│   │   ├── reading-mask.php # Overlay guide container for line-focusing
│   │   ├── fixed-tools.php  # floating action buttons
│   │   └── timer.php        # Widget timer panel
│   ├── header.php           # App shell header (loads stylesheets and scripts)
│   ├── footer.php           # App shell footer and dictionary modals
│   └── level_template.php   # Page template for lessons
│
├── lessons/                 # Curriculum activities (Kindergarten - Grade 12)
├── levels/                  # Grade dashboard indexes
├── assessment/              # Grade-level tests & grading dashboards
├── library/                 # Reader module and text resources
├── research/                # Documentation & papers on learning design
├── student/                 # Student profiles and custom math practice
├── test/                    # QUnit automated test suite
├── index.php                # Welcome portal and entry point
└── settings.php             # Full accessibility preferences dashboard
```

---

## 🏛️ Sections & Their Roles

* **Accessibility Settings (`/assets/js/a11y.js`, `/settings.php`, `/src/partials/a11y-settings.php`)**  
  Consolidates reading masks, text magnification, line-height/word spacing modifiers, color tints (for Irlen syndrome), large cursors, dyslexic-friendly fonts, and a custom spotlight mode.
* **Curriculum Lessons (`/lessons/` & `/levels/`)**  
  Houses grade-specific paths (Kindergarten through Grade 12) featuring curriculum tracks built on standards like EngageNY.
* **Assessments (`/assessment/`)**  
  Evaluation tools built for students to demonstrate learning progress. Includes grading panels visible to teachers.
* **Focus Tools (`/src/partials/timer.php`, `/src/partials/scratchpad.php`)**  
  Widgets such as interactive notes and timers designed to keep students focused.
* **Reader Library (`/library/`)**  
  An immersive reader space optimized for reading long-form text (e.g., standard literature) featuring:
  - **Dynamic In-text Vocabulary**: Scans body text for defined vocab terms, injecting tooltips with audio pronunciations and copying options.
  - **Scroll Resume Bookmarking**: Tracks scroll positions and prompts users with a floating panel to resume reading upon return.
  - **Active TTS Word Highlighting**: Highlights individual words in real-time as they are read aloud by a custom voice engine (with support for speech voice selection).
  - **Custom Lexile Adjustments & Filters**: Filters books by reading difficulty bands (Easy, Medium, Hard), allowing users to override and edit book Lexile levels client-side via `localStorage`.
  - **Auto-injected Chapter Credits**: Automatically pulls and appends source attributions to the bottom of book chapters from a centralized credits registry.
  - **Study Notes Integration**: Allows students to select/highlight text inside books and log notes directly to their saved scratchpad.
* **Client-Side Testing Suite (`/test/`)**  
  Ensures code quality and state saving mechanisms work correctly via QUnit assertions.

---

## 👥 How to Use & Collaborate (Community-Driven Product)

This platform is for everyone to use, adjust, and shape. It is **not** a locked "get what you get" tool. We want this to be a collaborative community product.

### For Students, Parents, and Teachers:
1. **Navigate**: Select the correct learning path (Elementary, Middle, or High School).
2. **Personalize**: Click the Accessibility floating action button on any page to immediately toggle features like the Reading Mask, Dyslexia Font, high-contrast themes, or audio ticks.
3. **Save**: Settings are remembered automatically on your device so the platform adjusts to your workflow.

### For Contributors & Collaborators:
The best way to learn is by working together! We encourage developers, educators, designers, and students to help us expand the platform:
- **Build New Lessons**: Introduce interactive ELA, Science, or Math practice files into the `/lessons/` directory.
- **Improve Features**: Optimize cognitive tools or enhance keyboard navigation.
- **Get in Touch & Collaborate**: If you want to contribute code, propose a design, share feedback, or request features, write to us! Let's collaborate to build the ultimate accessible classroom.

*Remember: The more we work, the more we learn!*
