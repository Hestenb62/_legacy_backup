# Digital Library & Master Catalog Guide

## Feature Title: Unified Digital Library Catalog & Master Call Number Index

### Executive Overview
The Hesten's Learning **Digital Library** (`/library/index.php`) and **Master Book Catalog & Call Number Index** (`/library/cataloge.php`) provide a unified, accessible digital repository containing **30 core volumes** spanning classic literature, historical primary sources, seminal scientific works, and foundational mathematics treatises. 

Both portals now share a synchronized dual-repository data architecture that consolidates primary fiction collections with academic subject research holdings into a unified 11-category catalog.

---

### Core Capabilities & Layout Modes

1. **Unified 30-Volume Archive**:
   - **Literature**: Classic Fiction (Orwell, Austen, Shelley), Fantasy & Sci-Fi (Herbert, Tolkien).
   - **Social Studies & History**: US History (US Constitution, Declaration of Independence, Bill of Rights, Federalist Papers, Who Built America, American Yawp), World History (Sun Tzu, Marcus Aurelius, Machiavelli), World War I (Keynes, Over the Top), World War II (Allied Reports, Churchill).
   - **STEM**: Mathematics (Euclid's Elements, Einstein's Relativity), Science (Darwin's Origin of Species, Galileo's Sidereus Nuncius).
   - **Civics & Reference**: Civics (Locke's Second Treatise, Tocqueville's Democracy in America), General Reference (Mathematics Reference Library, Language Reference Guide, Science Reference Archive).

2. **Multi-Facet Search & Dynamic Filtering**:
   - **Instant Search**: Real-time filtering across book titles, authors, ISBNs, grades, curricula, and Library of Congress call numbers.
   - **Discipline Selector**: Filter by specific academic subjects or select **⭐ My Reading List** to view bookmarked books.
   - **Lexile Reading Level Filter**: Elementary (under 500L), Middle School (500L–900L), and High School (above 900L).
   - **Sorting Engine**: Sort alphabetically by title (A–Z / Z–A), reading level, or Library of Congress call number.

3. **Interactive View Modes**:
   - **Carousel View**: Horizontal scrolling carousels with keyboard-navigable scroll arrows.
   - **Grid View**: Responsive multi-column grid with cover art, spine call numbers, and grade badges.
   - **List View**: Dense academic bibliography view optimized for quick reference.

4. **Multi-Volume Titles & The American Yawp Suite**:
   - **Dual Online Readers**: Multi-volume titles like *The American Yawp* feature distinct **"Read Online: Vol 1"** (Before 1877) and **"Read Online: Vol 2"** (After 1877) buttons in the Book Overview modal, the Academic Ledger table, and the dedicated reader portal.
   - **Independent Volume Downloads**: Download Volume 1 or Volume 2 PDF editions directly with dedicated 1-click action buttons.
   - **Dedicated Chapter Directory**: Access all 28 chapters, primary source reader documents, Stanford University Press citations, and AP U.S. History study flashcard decks at `/library/read/american-yawp/`.

5. **Subject Research Desks & Deep Linking**:
   - Clicking **"More Resources"** on any category header immediately transitions to the dedicated Subject Research Desk workspace with expanded holdings and vetted external research links.
   - Cryptographic shareable URLs (`#e27d1c34`, `#cd90fec6`, etc.) enable teachers and students to deeplink directly to specific subject desks.

---

### Accessibility & UDL Features

- **100% Keyboard Operability**:
  - Full keyboard focus navigation (`Tab`, `Shift+Tab`) across cards, action buttons, and filters.
  - Press `Enter` or `Space` on any book card to open the interactive Reader Modal.
  - Press `Esc` to immediately close modals and return focus to the triggering element.
- **Screen Reader Semantics**:
  - Semantic `<section>` landmarks with `aria-label` attributes on every category shelf.
  - Full `aria-live="polite"` feedback for dynamic query search results and filter status updates.
  - Descriptive text alternatives on all book covers and high-contrast call number spine badges.
- **Universal Design for Learning (UDL)**:
  - **Representation**: Multimodal display (ePub, PDF, plain text, web reader, audio narration).
  - **Expression**: Interactive note-taking, highlighting, and flashcard generation via the integrated Study Notebook.
  - **Engagement**: Low-anxiety reading modes, adjustable typography, dyslexia-friendly fonts, and persistent local bookmarks.
- **Responsive Viewport Reflow & Overflow Containment**:
  - Full compliance with WCAG 1.4.10 Reflow (down to 320px width without horizontal document scrollbars).
  - Horizontal book carousels contain internal touch and trackpad scrolling, isolated from the window scroll container.
  - Subnav ribbons, search bars, and filter dropdowns reflow seamlessly across all desktop, tablet, and mobile displays.
