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
│   │   ├── global-tokens.css # Core theme variables & design tokens
│   │   ├── global-reset.css  # Zero-specificity base resets and font overrides
│   │   ├── global-primitives.css # Accessibility tools, spotlight, & overlays
│   │   ├── global-components.css # Main layout and widget design systems
│   │   ├── components/      # Component specific styles
│   │   ├── layouts/         # Layout specific styles
│   │   ├── library/         # Library module styles
│   │   ├── pages/           # Page specific styles
│   │   └── reader/          # Reader specific styles
│   ├── fonts/               # Local web fonts (including OpenDyslexic)
│   ├── images/              # Assets, avatars, and media
│   └── js/                  # Browser scripts
│       ├── global-a11y.js   # Accessibility state controller
│       ├── assessment-*.js  # Assessment and testing logic
│       ├── curriculum-*.js  # Standards and curriculum data
│       └── mathjax-4.1.3/   # Math equations renderer
│
├── src/                     # Core layout modules & reusable code
│   ├── partials/            # HTML/PHP modules
│   │   ├── a11y-settings.php # Accessibility sliding panel interface
│   │   ├── reading-mask.php # Overlay guide container for line-focusing
│   │   ├── scratchpad.php   # Interactive scratchpad widget
│   │   ├── hero.php         # Main hero banner sections
│   │   └── timer.php        # Widget timer panel
│   ├── components/          # Reusable UI component configurations
│   ├── header.php           # App shell header (loads stylesheets and scripts)
│   ├── footer.php           # App shell footer and dictionary modals
│   ├── lesson_renderer.php  # Dynamic lesson content renderer
│   ├── resource-modal.php   # Modal interface for external resources
│   └── level_template.php   # Page template for lessons
│
├── lessons/                 # Curriculum activities (Kindergarten - Grade 12)
├── levels/                  # Grade dashboard indexes
├── assessment/              # Grade-level tests & grading dashboards
├── library/                 # Reader module and text resources
├── pages/                   # Auxiliary views (Settings, About, Dictionary, Profile, etc.)
├── research/                # Documentation & papers on learning design
├── student/                 # Student profiles and custom math practice
├── index.php                # Welcome portal and entry point
├── manifest.json            # PWA Application Manifest
└── service-worker.js        # PWA Offline capabilities & caching
```

---

## 🏛️ Sections & Their Roles

* **Accessibility Settings (`/assets/js/global-a11y.js`, `/pages/settings.php`, `/src/partials/a11y-settings.php`)**  
  Consolidates reading masks, text magnification, line-height/word spacing modifiers, color tints (for Irlen syndrome), large cursors, dyslexic-friendly fonts, and a custom spotlight mode.
* **Curriculum Lessons (`/lessons/`, `/levels/`, & `/assets/js/curriculum-*.js`)**  
  Houses grade-specific paths (Kindergarten through Grade 12) featuring curriculum tracks built on standards like EngageNY.
* **Assessments (`/assessment/` & `/assets/js/assessment-*.js`)**  
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
* **PWA & Offline Support (`/manifest.json`, `/service-worker.js`)**  
  Enables the platform to be installed as a Progressive Web App (PWA) with caching mechanisms for improved offline functionality and rapid load times.

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
