# Hesten's Learning Platform

Welcome to **Hesten's Learning**, an adaptive, accessibility-first, neurodiversity-centered, and gamified educational platform built to provide universal P-12 education.

---

## 🎯 Mission, Principles & Architecture

### 1. Neurodiversity & Accessibility by Design
Mainstream educational software often treats accessibility as an afterthought. Hesten's Learning is engineered from the ground up for neurodivergent scholars, accommodating autism, ADHD, dyslexia, dyscalculia, sensory sensitivities, and motor challenges:
* **WCAG 2.1/2.2 AA & AAA Compliance:** High-contrast color modes (minimum 7:1 ratio), full keyboard operability (`Tab`, `Shift+Tab`, `Enter`, `Space`, `Esc`), visible high-contrast focus rings, and screen reader semantic landmarks.
* **Universal Design for Learning (UDL):** Multimodal representation (text-to-speech with real-time word highlighting, OpenDyslexic typeface, MathJax SVG typography, Irlen color overlays, and line-focus reading masks).
* **Low-Anxiety & Sensory Retreat:** Sensory Chamber presets, ambient auditory white noise, untimed practice, and positive reinforcement gamification.

### 2. Tripartite Role & Persona System
The platform dynamically shifts interfaces between four interconnected roles:
* 🌐 **All (Default):** Unified catalog access for general exploration.
* 🎓 **Student Mode:** Distraction-free, gamified workspace with daily quests, level passports, practice notebooks, and reading tools.
* 🍎 **Teacher Suite:** Classroom roster management, 36-week pacing guides, standards diagnostics, and assignment customization (protected by PIN security).
* 🏡 **Parent Hub:** Homeschool portfolio builders, state law guides, sensory accommodation presets, and attendance trackers.

### 3. Offline-First Resilient PWA Architecture
* **PWA Service Worker:** Complete asset caching and offline navigation fallback via [`pages/offline.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/offline.php).
* **LocalStorage & Cloud Auto-Sync:** Tripartite data bridges (`hesten-user-profile`, `hesten_teacher_roster`, `hesten_parent_accommodations`, `hesten_standards_mastery`) synchronizing in real time across browser tabs and debouncing automatically to Google Drive.

---

## 📁 Complete Directory & File Blueprint

```text
├── assessment/              # Formative, summative, and diagnostic testing engines
├── assets/                  # Core static assets (CSS, JS, JSON datasets, fonts, text)
│   ├── css/                 # Cascading style layers & module stylesheets
│   ├── data/                # Master curriculum schemas, standard maps & 80+ modular lesson files
│   │   └── lessons/         # Module-level JSON files for Math (P-12) and Grade 9 ELA
│   ├── fonts/               # Offline font files (OpenDyslexic, Lexend, Atkinson Hyperlegible)
│   ├── images/              # Avatars, system icons, diagrams, and brand assets
│   ├── js/                  # Vanilla JS controllers, components, and engine modules
│   └── text/                # Markdown documentation and Help Center knowledge base
├── levels/                  # Grade-by-grade dashboard portals (Pre-K through Grade 12 + GED)
├── library/                 # Digital library, classic literature reader & dedicated reading pages
│   └── assets/              # Book catalogs, credits, TOC manifests, and dedicated reading JSONs
├── pages/                   # Standalone application views, portals, tools, and legal documentation
├── research/                # Educational research papers, cognition frameworks & whitepapers
├── scratch/                 # Auxiliary build tools, data verification runners & conversion scripts
├── src/                     # Core layout shell, templates, partials, and dynamic renderers
│   ├── components/          # Specialized PHP interface components
│   ├── helpers/             # Data resolution and grade-level configuration helpers
│   └── partials/            # UI widgets, modals, accessibility bars, and overlays
├── student/                 # Student portal modules across ELA, Math, Science, and Social Studies
├── updates/                 # Engineering updates portal and permanent Markdown documentation
│   └── docs/                # Indexed release walkthroughs, implementation plans, and bugfix logs
├── index.php                # Platform homepage and universal role launcher
├── manifest.json            # PWA manifest specifications and app icons
├── offline.php              # Offline shell fallback (routes to pages/offline.php)
├── robots.txt               # Search crawler permissions and sitemap references
├── service-worker.js        # Service worker caching and background sync lifecycle
├── sitemap.xml              # Search engine index covering all levels, portals, and library books
└── sitemap.xsl              # Visual XML stylesheet for human-readable sitemap exploration
```

---

## 📄 Root Directory (`/`)

* [`index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/index.php): The primary application homepage. Features the hero banner, role mode consoles (Student, Teacher, Parent), grade level launchpads, gamified daily quests streak ticker, and featured curriculum highlights.
* [`manifest.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/manifest.json): Progressive Web App (PWA) manifest declaring theme colors, responsive app icons, standalone display mode, and start URL.
* [`service-worker.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js): PWA service worker managing cache storage, network-first and stale-while-revalidate strategies, and routing offline navigation requests to `offline.php`.
* [`sitemap.xml`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/sitemap.xml): Comprehensive XML sitemap containing over 11,000 indexable endpoints spanning grade levels, standalone literature pages, tools, and subject hubs.
* [`sitemap.xsl`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/sitemap.xsl): Human-readable XSL styling applied when viewing `sitemap.xml` directly in a browser.
* [`sitemap.py`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/sitemap.py): Python utility script for compiling, updating, and validating `sitemap.xml`.
* [`robots.txt`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/robots.txt): Search engine crawl directives directing web spiders to `sitemap.xml`.
* [`AGENTS.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/AGENTS.md): Architectural instructions, coding guidelines, WCAG invariants, and data sync rules governing AI coding assistants on this repository.
* [`README.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/README.md): This master documentation file.

---

## 🏛️ Application Shell & Templating (`src/`)

The `src/` directory houses the global layout components, templating engines, and reusable UI modules.

### Core PHP Engines
* [`src/header.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/header.php): App shell header. Sets global version constants (`HL_SITE_VERSION`, `HL_SITE_VERSION_LABEL`), initializes dynamic theme scripts (dark, light, midnight, sepia, high-contrast), loads CSS bundles, builds the accessible navbar, brand identity, role mode selector, and the expansive multi-column mega-menu.
* [`src/footer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/footer.php): App shell footer. Injects global script modules, Google Drive auto-sync watchers, the platform release version strip, CC BY-NC-SA 4.0 license metadata, and the accessible "What's in Version" release details modal (`#footer-version-modal`).
* [`src/level_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php): Master layout template for all grade level pages (`levels/*.php`). Constructs breadcrumbs, hero banners, subject selector tabs (Math, ELA, Science, Social Studies), module accordions, practice notebook integration, and custom grade-level literature cards.
* [`src/lesson_renderer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php): Dynamic lesson rendering engine. Resolves requested lesson IDs via tiered lookup (Module JSON &rarr; Standalone JSON &rarr; `lessons.json` &rarr; Scaffolder), rendering distraction-free problem set worksheets, auto-saving textareas (`localStorage`), expandable teacher answer keys, and 1-click printing (`printProblemSet()`).
* [`src/lesson_runner.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_runner.php): Interactive lesson execution runner used for step-by-step interactive problem sets, hints, and immediate feedback.
* [`src/resource-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/resource-modal.php): Accessible modal runner for displaying external reference links, research citations, and supplementary guides.

### Helpers (`src/helpers/`)
* [`src/helpers/grade_resources.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/helpers/grade_resources.php): Curated grade-level resource configuration file. Defines custom age-appropriate literature, interactive tools (manipulatives, graphing notebooks), and developmental study tips for every grade from Level A (Pre-K) through Level N (12th Grade).

### Components (`src/components/`)
* [`src/components/interactive-ladder.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/interactive-ladder.php): Visual learning progression ladder illustrating mastery prerequisites.
* [`src/components/story-builder.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/story-builder.php): Interactive narrative composition tool for creative writing exercises.
* [`src/components/study-guides.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/study-guides.php): High-density study guide cards with printable summaries and key formula reference charts.
* [`src/components/teacher-concepts.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/components/teacher-concepts.php): Pedagogical explanation cards providing educators with common student misconceptions and scaffolded intervention strategies.

### Partials (`src/partials/`)
* `a11y-settings.php`: Sliding accessibility drawer controller (toggling fonts, sizes, line spacing, themes, and reading guides).
* `academic-path-header.php`: Visual breadcrumb and subject progression header.
* `accommodations-modal.php`: Modal interface for configuring individual student accommodation plans.
* `announcement-bar.php`: Global dismissible banner for system updates and notifications.
* `certificate-modal.php`: Dynamically renders printable certificates of mastery upon quest completion.
* `citation.php`: Formats academic bibliographies and source citations in MLA, APA, and Chicago formats.
* `command-palette.php`: Quick-navigation command search modal triggered via `Ctrl+K` or `Cmd+K`.
* `doc-modal.php`: Lightbox viewer for platform documentation and guide articles.
* `fixed-tools.php`: Floating quick-action dock providing 1-click access to the calculator, scratchpad, timer, and accessibility panel.
* `flashcard-studio.php`: Modal interface for interactive flashcard practice decks.
* `hero.php`: Reusable animated hero component for major platform hubs.
* `learning-grid.php`: Grid layout component for curriculum skill modules.
* `learning-launchpad.php`: Quick-start dashboard for resuming in-progress lessons.
* `learning-streak.php`: Gamification daily streak display and XP tracker.
* `mastery-modals.php`: Formative assessment modals verifying student understanding.
* `migration-popup.php`: Data migration and backward-compatibility modal for local storage updates.
* `no-results.php`: Accessible fallback empty state with reset suggestions for search bars.
* `overhaul-modal.php`: Release announcement dialog presenting major platform upgrades.
* `quest-badges-modal.php`: Displays earned gamification achievements, milestone trophies, and badges.
* `reading-mask.php`: Line-focus reading overlay aiding readers with tracking difficulties or ADHD.
* `resume-banner.php`: Notification banner prompting students to pick up where they last stopped reading or practicing.
* `role-consoles.php`: Role-specific action consoles on the homepage for Students, Teachers, and Parents.
* `role-pin-modal.php`: 4-digit PIN security dialog guarding access to Teacher and Parent suites.
* `scratchpad.php`: Digital notepad and drawing canvas for scrap calculations and rough work.
* `sensory-chamber-modal.php`: Low-stimulation retreat environment featuring ambient soundscapes and dimming controls.
* `shortcuts-modal.php`: Comprehensive cheat sheet of platform keyboard shortcuts.
* `sticky-reading-bar.php`: Persistent reading progress bar and table of contents anchor bar for long texts.
* `timer.php`: Focus timer supporting Pomodoro intervals, countdowns, and low-stress untimed stopwatch practice.
* `welcome-guide.php`: Interactive onboarding modal guiding first-time visitors through accessibility customization.

---

## 🎓 Grade Levels & Curriculum Portals (`levels/`)

The `levels/` directory hosts the grade-by-grade landing pages and curriculum tracks. Each page utilizes [`src/level_template.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/level_template.php) and routes individual lesson queries directly through [`src/lesson_renderer.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/lesson_renderer.php).

* [`levels/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/index.php): Master Curriculum Directory linking to all 14 grade levels and specialized study tracks.
* [`levels/a.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/a.php): **Level A (Pre-Kindergarten)** — Foundational counting, shapes, early phonemic awareness, and sensory science.
* [`levels/b.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/b.php): **Level B (Kindergarten)** — Number bonds, addition/subtraction within 10, early readers, and weather observation.
* [`levels/c.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/c.php): **Level C (1st Grade)** — Place value, addition/subtraction within 20, phonics, and light/sound science.
* [`levels/d.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/d.php): **Level D (2nd Grade)** — Multi-digit arithmetic, money/time, literature comprehension, and earth habitats.
* [`levels/e.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/e.php): **Level E (3rd Grade)** — Multiplication/division arrays, fraction basics, fable analysis, and simple forces.
* [`levels/f.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/f.php): **Level F (4th Grade)** — Fraction equivalence, multi-digit multiplication, historical fiction, and energy transfer.
* [`levels/g.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/g.php): **Level G (5th Grade)** — Decimal arithmetic, fraction operations, volume, early American history, and ecosystems.
* [`levels/h.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/h.php): **Level H (6th Grade)** — Ratios and rates, negative numbers, expressions, world geography, and Earth science.
* [`levels/i.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/i.php): **Level I (7th Grade)** — Proportional relationships, signed operations, linear equations, life science, and civics.
* [`levels/j.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/j.php): **Level J (8th Grade)** — Linear functions, systems of equations, Pythagorean theorem, physical science, and U.S. history.
* [`levels/k.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/k.php): **Level K (9th Grade)** — Algebra I (relationships, equations, quadratic expressions) and complete Grade 9 ELA (153 lessons across Modules 1–4).
* [`levels/l.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/l.php): **Level L (10th Grade)** — Geometry (Euclidean proofs, similarity, trigonometry, 3D volume, circle geometry) and literary perspectives.
* [`levels/m.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/m.php): **Level M (11th Grade)** — Algebra II (polynomial/rational relationships, trigonometry, logarithms, normal distributions) and American literature.
* [`levels/n.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/n.php): **Level N (12th Grade)** — Precalculus (complex numbers, vectors, matrices, rational/exponential functions, probability) and rhetoric.
* [`levels/o.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/o.php): **Level O (AP & College Prep)** — Advanced placement preparatory tracks, collegiate writing, and analytical calculus.
* [`levels/practice-ged.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/practice-ged.php): **High School Equivalency (GED) Prep** — Specialized practice across Mathematical Reasoning, RLA, Science, and Social Studies.
* [`levels/american-yawp.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/american-yawp.php): High school U.S. history curriculum based on *The American Yawp* open-source textbook.
* [`levels/ap-us-history.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/levels/ap-us-history.php): Advanced Placement United States History (APUSH) curriculum outline, key historical periods, and document-based question (DBQ) preparation.

---

## 📚 Digital Library & Reading Architecture (`library/`)

The `library/` module provides an accessible digital reading environment housing classic literature, primary historical sources, and dedicated curriculum reading pages.

### Controllers & Layouts
* [`library/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/index.php): Master library portal controller. Dynamically switches between the catalog view, the book reader, dedicated reading pages (`?page=<slug>`), and subject repositories (`?pages=<repo>`).
* [`library/reading_page.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/reading_page.php): Dedicated standalone reading layout for curriculum assignments (e.g., Grade 9 ELA). Features numbered paragraph anchors (`#p1`, `#p2`), Web Speech synthesis text-to-speech with play/pause/stop, font zoom scaling (0.9rem to 1.4rem), OpenDyslexic mode, and 1-click clean printing. Explicitly isolated from catalog book drawers.
* [`library/repository_page.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/repository_page.php): Multi-topic reference repository renderer powering deep subject indexes (e.g., Punctuation Codex, Math Facts, Science Facts).
* [`library/browse.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/browse.php): Visual shelf browser enabling filtering by genre, grade level, and Lexile difficulty.
* [`library/cataloge.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/cataloge.php): Searchable library catalog index.
* [`library/book_card.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/book_card.php): Component rendering individual book cards with covers, authors, descriptions, and read buttons.
* [`library/library_header_nav.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/library_header_nav.php): Accessible navigation bar specific to the library portal.
* [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php): Modal dialogs for chapter tables of contents, reading preferences, and text citations.
* [`library/about.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/about.php): Overview of library public domain collections (Project Gutenberg, Library of Congress).
* [`library/how-to.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/how-to.php): User guide explaining reading tools, speech synthesis controls, and vocabulary highlights.

### Library Assets (`library/assets/`)
* `bookd.json`: Catalog index of full-length books with titles, authors, Lexile bands, and chapter paths.
* `credits.json`: Comprehensive attribution records and public domain provenance for all library volumes.
* `desk_links.json`: Curated study desk shortcuts for library visitors.
* `disclaimers.json`: Copyright, public domain, and historical content advisory notices.
* `edu-side-drawer.json`: Educational metadata powering the slide-out study drawer inside the reader.
* `*-toc.json`: Over 60 individual chapter table of contents manifests for books like *Frankenstein*, *Moby-Dick*, *1984*, *The Great Gatsby*, *Dracula*, and *The American Yawp*.

### Dedicated Reading Pages (`library/assets/pages/`)
Standalone JSON datasets rendered exclusively via [`library/reading_page.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/reading_page.php):
* `st-lucys-home.json`: Karen Russell, *St. Lucy's Home for Girls Raised by Wolves* (Stages 1–5, 101 paragraphs).
* `letters-to-a-young-poet.json`: Rainer Maria Rilke, *Letters to a Young Poet* (Letter One).
* `romeo-and-juliet-module-1.json`: William Shakespeare, *The Tragedy of Romeo and Juliet* (Prologue & Acts 1–3).
* `the-tell-tale-heart.json`: Edgar Allan Poe, *The Tell-Tale Heart* (18 paragraphs).
* `i-felt-a-funeral-in-my-brain.json`: Emily Dickinson, *I felt a Funeral, in my Brain* (5 stanzas).
* `oedipus-the-king.json`: Sophocles, *Oedipus the King* (4 major dramatic episodes).
* `true-crime-walter-mosley.json`: Walter Mosley, *True Crime: The Roots of an American Obsession* (4 sections).
* `animals-in-translation.json`: Temple Grandin & Catherine Johnson, *Animals in Translation* (Autism and animal cognition).
* `sugar-changed-the-world.json`: Marc Aronson & Marina Budhos, *Sugar Changed the World* (Commodities and global history).
* `globalization.json`: The World Bank Group, *Globalization & Modern Labor Issues* (35 paragraphs).
* `punctuation.json`: Master 16-Mark Punctuation Codex with style guides (Chicago, MLA, APA, AP).

---

## 🧑‍🎓 Student Learning Hub (`student/`)

The `student/` directory delivers interactive study suites organized into four academic disciplines:

* [`student/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/index.php): Student Dashboard overview displaying active daily quests, recent lesson progress, and quick links to study labs.
* **Language Arts (ELA):**
  * `ela-grammar.php`: Language & Writing Lab covering parts of speech, syntax formulations, visual concept flowcharts, and interactive self-checks across 30 topics.
  * `ela-literature.php`: Literary terms, narrative arcs, figurative language breakdowns, and poetry mechanics.
  * `ela-reading.php`: Close-reading comprehension strategies, text annotation workshops, and active recall drills.
  * `ela-writing.php`: Essay architecture builder (thesis formulation, paragraph cohesion, counterarguments, and citation guides).
  * `ela-resources.php`: Curated reference directory for language arts study tools and writing prompts.
* **Mathematics:**
  * `math-games.php`: Stress-free educational games (Math Master arithmetic sprint, pattern puzzles, and flashcard sprints).
  * `math-practice.php`: Adaptive problem generator offering infinite multi-topic computational drills.
  * `math-study-guides.php`: High-density formula sheets, worked examples, and mental math tricks.
  * `math-tutorials.php`: Conceptual step-by-step walkthroughs for algebra, geometry, and calculus.
  * `math-resources.php`: Central hub connecting students to digital math tools and manipulatives.
* **Science:**
  * `science-articles.php`: Illustrated readings exploring biology, physics, earth systems, and chemistry.
  * `science-diagrams.php`: Interactive visual schematics (cell structure, rock cycle, periodic table, solar system).
  * `science-experiments.php`: Safe, tactile at-home and classroom scientific inquiry activities.
  * `science-quizzes.php`: Formative knowledge checks with explanatory feedback.
  * `science-resources.php`: Reference hub for scientific standards and laboratory safety guides.
* **Social Studies & Civics:**
  * `social-civics.php`: Comprehensive exploration of democratic principles, branches of government, and citizen rights.
  * `social-current-events.php`: Guided media literacy and current event analysis worksheets.
  * `social-history.php`: World and American historical timelines and landmark events.
  * `social-maps.php`: Geographic atlas, cartographic tools, and map-reading exercises.
  * `social-studies-resources.php`: Directory of primary sources, historical documents, and civics reference tools.

---

## 🎯 Diagnostic & Assessment Engine (`assessment/`)

The `assessment/` directory provides grade-level evaluation instruments, rubrics, and diagnostic engines:

* [`assessment/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/index.php): Master Assessment Hub with grade-level test selectors and student progress trackers.
* [`assessment/diagnostic.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/diagnostic.php): Adaptive diagnostic assessment runner evaluating student mastery across Common Core Math and ELA standards to identify learning gaps.
* [`assessment/rubrics.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/rubrics.php): Interactive scoring rubrics for writing assignments, research papers, and problem sets.
* [`assessment/GPK-MID-M1.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assessment/GPK-MID-M1.php): Concrete early-childhood assessment module for Pre-K Module 1.

---

## 📑 Core Pages & Platform Hubs (`pages/`)

* [`pages/about.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/about.php) / [`pages/about-me.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/about-me.php): Platform background, pedagogical mission, and founder biography.
* [`pages/accessibility.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/accessibility.php): Complete platform accessibility statement, Section 508 VPAT details, and WCAG 2.1/2.2 AA & AAA compliance documentation.
* [`pages/contact.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/contact.php): Contact and user feedback form.
* [`pages/crossword.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/crossword.php): Interactive educational crossword puzzle generator using curriculum vocabulary.
* [`pages/games.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/games.php): Low-stress arcade of learning games (Word Scramble, Grammar Detective, Memory Match).
* [`pages/guide.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guide.php) / [`pages/guides.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guides.php): Platform navigation manual and user onboarding guide.
* [`pages/help-center.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/help-center.php): Comprehensive Help Center indexing all Markdown user guides (`assets/text/hc-*.md`) with instant search.
* [`pages/manipulatives.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/manipulatives.php): Virtual math manipulatives suite (ten-frames, fraction bars, base-10 blocks, clocks, and geoboards).
* [`pages/mission.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/mission.php): Detailed mission statement on neurodiversity and open-source educational equity.
* [`pages/offline.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/offline.php): Dedicated offline application shell rendered by the service worker when no internet connection is present.
* [`pages/parents.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/parents.php): Homeschool & Parent Hub featuring state legal requirements, accommodation switches, portfolio builders, and attendance tracking.
* [`pages/privacy.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/privacy.php) / [`pages/terms-of-use.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/terms-of-use.php): COPPA-compliant privacy policy and terms of service.
* [`pages/profile.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/profile.php): User profile manager with avatar customization, XP levels, and data import/export controls.
* [`pages/search.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/search.php): Global full-text search across all curriculum lessons, books, and standards.
* [`pages/settings.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/settings.php): Granular accessibility settings page (theme colors, speech voices, contrast, font selections).
* [`pages/skills.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/skills.php): Skills Passport tracking verified mastery competencies across academic levels.
* [`pages/standards.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/standards.php): Interactive Standards Explorer mapping Common Core Math (CCSS.MATH), ELA (CCSS.ELA), Science (NGSS), and Social Studies (C3) standards to platform lessons.
* [`pages/teachers.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/teachers.php): Educator Suite featuring classroom rosters, pacing guides, and custom homework assignment generators.
* [`pages/updates.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/updates.php): Live updates hub mirroring the platform engineering logs and releases.
* [`pages/word-search.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/word-search.php): Dynamic word search puzzle generator reinforced with vocabulary definitions.

---

## 🗄️ Master Data Schemas & Curriculum Registries (`assets/data/`)

### Global Curriculum Maps & Standards
* [`assets/data/curriculum-engageny-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-engageny-math.json): Master structural blueprint for the 76-module P-12 mathematics curriculum, organizing 1,772 lessons into modules, topics, and standards.
* [`assets/data/curriculum-engageny-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/curriculum-engageny-ela.json): Master structural blueprint for Grade 9 ELA, organizing 153 lessons across 4 modules, 10 units, CCSS standards, and dedicated library readings.
* [`assets/data/lessons.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/lessons.json): Master global registry indexing all 1,712 platform lessons for rapid single-lesson resolution and cross-curriculum queries.
* [`assets/data/standards-ccss-math.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-ccss-math.json): Complete Common Core State Standards for Mathematics from Kindergarten to High School.
* [`assets/data/standards-ccss-ela.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-ccss-ela.json): Complete Common Core State Standards for English Language Arts across Reading, Writing, Speaking/Listening, and Language.
* [`assets/data/standards-ngss-science.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-ngss-science.json): Next Generation Science Standards (NGSS) across physical, life, earth/space, and engineering domains.
* [`assets/data/standards-c3-social.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-c3-social.json): College, Career, and Civic Life (C3) Framework standards for Social Studies.
* [`assets/data/standards-ccss-glossary.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/standards-ccss-glossary.json): Mathematical definitions and linguistic standards glossary.
* [`assets/data/math-vocab.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/math-vocab.json): Over 700 defined mathematical terms with pronunciations, categories, grade levels, and formulas.
* [`assets/data/flashcard-curriculum-decks.json`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/flashcard-curriculum-decks.json): Curated flashcard decks spanning all grades and subjects.
* [`assets/data/global-learningLevels.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/data/global-learningLevels.js): JavaScript client data module exposing grade bands, theme colors, and level descriptors.

### Modular Lesson Datasets (`assets/data/lessons/`)
High-performance consolidated module files containing complete problem sets, teacher keys, and lesson overviews:
* `a-math-m1.json` ... `a-math-m5.json`: Pre-K Math (Modules 1–5, 146 lessons).
* `b-math-m1.json` ... `b-math-m6.json`: Kindergarten Math (Modules 1–6, 152 lessons).
* `c-math-m1.json` ... `c-math-m6.json`: 1st Grade Math (Modules 1–6, 153 lessons).
* `d-math-m1.json` ... `d-math-m8.json`: 2nd Grade Math (Modules 1–8, 149 lessons).
* `e-math-m1.json` ... `e-math-m7.json`: 3rd Grade Math (Modules 1–7, 152 lessons).
* `f-math-m1.json` ... `f-math-m7.json`: 4th Grade Math (Modules 1–7, 153 lessons).
* `g-math-m1.json` ... `g-math-m6.json`: 5th Grade Math (Modules 1–6, 149 lessons).
* `h-math-m1.json` ... `h-math-m6.json`: 6th Grade Math (Modules 1–6, 143 lessons).
* `j-math-m1.json` ... `j-math-m7.json`: 8th Grade Math (Modules 1–7, 122 lessons).
* `k-math-m1.json` ... `k-math-m5.json`: 9th Grade Algebra I (Modules 1–5, 105 lessons).
* `k-ela-m1.json` ... `k-ela-m4.json`: 9th Grade ELA (Modules 1–4, 153 lessons).
* `l-math-m1.json` ... `l-math-m5.json`: 10th Grade Geometry (Modules 1–5, 117 lessons).
* `m-math-m1.json` ... `m-math-m4.json`: 11th Grade Algebra II (Modules 1–4, 120 lessons).
* `n-math-m1.json` ... `n-math-m5.json`: 12th Grade Precalculus (Modules 1–5, 111 lessons).
* `ged-m-1-1.json`: High school equivalency practice dataset.

---

## 🎨 Static Styling & Design System (`assets/css/`)

* [`global-tokens.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-tokens.css): Foundation design tokens defining semantic color palettes, surface variables, shadows, spacing curves, and accessibility high-contrast color sets.
* [`global-reset.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-reset.css): Zero-specificity CSS reset ensuring consistent typography, accessible user-agent focus defaults, and base box-sizing.
* [`global-primitives.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-primitives.css): Utility styles for reading masks, spotlights, high-contrast focus rings, and screen-reader-only utility classes (`.sr-only`).
* [`global-components.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/global-components.css): Global navigation bar, mega-menu, buttons, card grids, modals, and footer styles.
* [`level-style.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/level-style.css): Styles for level pages, module accordion toggles, practice cards, and breadcrumbs.
* [`library-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/library-main.css) / [`reader-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/reader-main.css): Styling for the library catalog, shelf displays, reader view, and paragraph highlight streams.
* [`sensory-chamber.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/sensory-chamber.css): Calming visual themes and controls for the sensory retreat chamber.
* [`research-main.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/research-main.css): Academic layout styling for whitepapers and research articles.

---

## ⚙️ JavaScript Application Architecture (`assets/js/`)

### Accessibility (`assets/js/accessibility/`)
* `accommodation-engine.js`: Evaluates active IEP/504 accommodations stored in `hesten_parent_accommodations` and dynamically configures the reader and problem sets.
* `global-a11y.js`: Core accessibility controller managing themes (light, dark, midnight, sepia, high-contrast), text size modifiers, line heights, dyslexia fonts, and Irlen tints.

### Components & Study Tools (`assets/js/components/`)
* `command-palette.js`: Instant fuzzy-search launcher (`Ctrl+K`) for lessons, tools, settings, and library books.
* `practice-notebook.js`: Interactive digital notebook offering ruled lines, grid paper, drawing canvases, and LaTeX math formulas.
* `flashcard-studio.js`: Touch- and keyboard-friendly flashcard flip engine with spaced-repetition logic.
* `global-study-tools.js`: Shared controller coordinating the floating timer, scientific calculator, scratchpad, and dictionary lookup.
* `scratchpad-studio.js`: Standalone scratchpad engine with multi-page support and auto-saving persistence.
* `certificate-generator.js`: Canvas-based engine that generates verifiable completion certificates.
* `header-search-autocomplete.js`: Live predictive search autocomplete powering the top header input.

### Core & Gamification (`assets/js/core/` & `assets/js/gamification/`)
* `gdrive-sync.js`: Background cloud sync engine monitoring local storage changes and debouncing backups to Google Drive.
* `global-standard.js`: Cross-tab synchronization bus emitting `hl:data-sync` events on profile, mastery, or setting changes.
* `daily-quests.js`: Daily mission progression tracker awarding XP for lessons completed and pages read.
* `quest-manager.js`: Achievement unlocks, level-up celebration animations, and badge inventories.

---

## 🔬 Research & Platform Documentation (`research/` & `updates/`)

* [`research/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/research/index.php): Academic research portal exploring cognitive architectures, Universal Design for Learning, and neurodivergent interface designs.
* [`research/DLDR/`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/research/DLDR/) & [`research/DSMS/`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/research/DSMS/): Whitepapers and architectural proposals for decentralized student data sovereignty and multimodal learning.
* [`updates/index.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/index.php): Dynamic updates portal that parses and renders engineering logs and release notes.
* [`updates/feed.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/feed.php): RSS/JSON feed of platform releases and features.
* [`updates/docs/`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/updates/docs/): Permanent Markdown documentation repository storing every architectural plan, implementation walkthrough, and bugfix document with YAML frontmatter.

---

## 🛠️ Verification & Development Commands

```powershell
# Check PHP syntax across all modified files
& "C:\xampp1\php\php.exe" -l src/header.php
& "C:\xampp1\php\php.exe" -l src/footer.php
& "C:\xampp1\php\php.exe" -l levels/k.php

# Verify sitemap integrity
python sitemap.py
```

---

## 📜 Licensing & Open-Source Attribution

* **Software & Code:** Licensed under the MIT License.
* **Curriculum Materials & Educational Content:** Licensed under [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)](http://creativecommons.org/licenses/by-nc-sa/4.0/).
* **Literature Collections:** Public domain materials curated from Project Gutenberg and the Library of Congress.
* **Curriculum Alignment:** Derived from open-source EngageNY / Eureka Math and Core Knowledge ELA frameworks.
