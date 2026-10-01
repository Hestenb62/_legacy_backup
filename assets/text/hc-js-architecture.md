## Modular Client Architecture & Script System

Hesten's Learning utilizes an organized, domain-driven modular architecture for all client-side JavaScript, ensuring high performance, zero top-level clutter, and offline PWA resiliency.

### Structured Directory Hierarchy (`assets/js/`)
All client scripts are segregated into dedicated, self-contained subdirectories based on functional domain:

1. **`pages/` (Page-Specific Controllers)**
   - Scripts dedicated to specific page templates:
     - `index-main.js`: Landing page controller, search filters, and curriculum modal runner.
     - `profile-main.js`: Student profile dashboard, avatar picker, and progress analytics.
     - `skills-passport.js`: Skills passport radar visualizer and standards mastery credentialing.
     - `teachers-main.js`: Teacher classroom dossier, report card manager, and student rosters.
     - `ged-prep.js`: Practice GED testing suite and interactive timed review engine.
     - `math-vocab.js`: Mathematics Codex, 3D flashcards, and formula sandbox.
     - `student-stories-poems.js`: Literature showcase and AI daily literary spotlight.

2. **`assessment/` (Evaluation & Diagnostic Engines)**
   - Interactive testing frameworks, adaptive placement algorithms, and diagnostic prescription engines (`adaptive-diagnostic.js`, `assessment-main.js`, `assessment-p-12.js`, `assessment-ap.js`, `assessment-scratchpad.js`).

3. **`standards/` (Statutory & Curricula Crosswalks)**
   - CCSS Mathematics, CCSS ELA, TEKS alignment loaders, and Standards Challenge mechanics (`standards-ccss-math-ela.js`, `curriculum-teks.js`, `standards-challenge.js`).

4. **`labs/` (Virtual Manipulatives & Simulations)**
   - Math manipulatives, interactive scientific simulations, and virtual tools (`interactive-labs.js`, `manipulatives-lab.js`, `math-manipulatives.js`).

5. **`accessibility/` (UDL & Accommodations Suite)**
   - Full WCAG 2.1/2.2 AA & AAA, Section 508, and UDL engines (`global-a11y.js`, `accommodation-engine.js`, `audio-feedback.js`, `sensory-chamber.js`).

6. **`components/` (Shared UI Widgets & Modals)**
   - Reusable modal dialogs and workspace toolkits (`command-palette.js`, `scratchpad-studio.js`, `flashcard-studio.js`, `certificate-generator.js`, `sticky-reading-bar.js`, `offline-storage-manager.js`, `header-search-autocomplete.js`).

7. **`core/` (Platform Foundation & Plumbing)**
   - Foundation plumbing, global error logging, offline network detection, and cloud data synchronization (`global-error-handler.js`, `global-core-ui.js`, `global-site-layout.js`, `global-standard.js`, `gdrive-sync.js`, `offline-status.js`).

### Offline Resiliency & Caching
- **Service Worker v20 Integration:** All script modules are pre-cached and versioned under `hestens-learning-v20` with stale-while-revalidate fallback strategies, ensuring full accessibility even without an active internet connection.
