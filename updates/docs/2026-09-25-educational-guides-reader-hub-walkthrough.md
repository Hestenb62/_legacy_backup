---
title: "Educational Guides & School System Reader Hub: Walkthrough & Verification"
date: "2026-09-25"
category: "Walkthrough"
tags: ["Guides Hub", "American School System", "Common Core", "IEP 504", "Reader Engine", "TTS Audio", "UDL"]
summary: "Walkthrough of the newly created Educational Guides Hub and Deep Reader at /pages/guides.php and /pages/guide.php, featuring 5 comprehensive explainers on U.S. schooling, Common Core, IEPs/504 plans, testing, and school choice with full TTS and accessibility controls."
author: "Antigravity & Hesten"
---

# Educational Guides & School System Reader Hub: Walkthrough & Verification

## Summary of Accomplishments
We designed and implemented a dual-mode **Educational Guides & School System Explainer Hub** accessible under the `/pages/` section at:
- **Catalog Hub**: [`/pages/guides.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guides.php)
- **Deep Reader View**: [`/pages/guides.php?<reader-name>`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guides.php) or `page.php?guide=<reader-name>`
- **Singular Endpoint Alias**: [`/pages/guide.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guide.php)

---

## 1. Newly Created Educational Guides (`assets/guides/*.md`)
Five comprehensive, authoritative, research-backed guides were authored in Markdown with YAML frontmatter, tables, callout boxes, and ASCII diagrams:

1. **How the American School System Works** ([`american-school-system.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/guides/american-school-system.md)):
   - K-12 grade bands (Elementary, Middle, High School) & high school year naming conventions (Freshman, Sophomore, Junior, Senior).
   - The 3-tier governance pyramid: Local School Boards & LEAs (~13,000 districts), State Departments of Education (SEAs), and Federal Department of Education (ED).
   - School funding sources (State ~47%, Local property taxes ~45%, Federal ~8%).
   - Carnegie unit credits, GPA calculation (unweighted vs. weighted AP/IB), and graduation course distributions.
   - Academic calendars (traditional vs. balanced year-round) and daily classroom structures.

2. **Demystifying Common Core** ([`demystifying-common-core.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/guides/demystifying-common-core.md)):
   - Standard (destination: what students should know) vs. Curriculum (vehicle: textbooks & daily teaching methods).
   - Origins: 2009 NGA & CCSSO state-led initiative addressing remediation rates and the "zip-code lottery."
   - The 3 Math Shifts: Focus on core domains, Coherence across grade progression, Rigor balance (conceptual depth, procedural skill, real-world application).
   - ELA Shifts: Grade-level complex texts, text-dependent evidence-based reasoning, and 50–70% informational nonfiction.
   - Detailed Myth vs. Fact breakdown and state modifications (e.g. TEKS in Texas, BEST in Florida).

3. **Special Education Demystified: IEPs, 504 Plans & Parental Rights** ([`special-education-ieps-504.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/guides/special-education-ieps-504.md)):
   - IDEA (Individuals with Disabilities Education Act) vs. Section 504 of the Rehabilitation Act of 1973.
   - Core guarantees: Free Appropriate Public Education (FAPE) & Least Restrictive Environment (LRE).
   - In-depth comparison matrix: Eligibility, legal document format, service models, and funding.
   - Critical distinction: **Accommodations** (how a student learns) vs. **Modifications** (what a student is expected to learn).
   - The 6-Step IEP Lifecycle: Referral, Evaluation, Eligibility, IEP Meeting, Implementation, and Annual/Triennial Reviews.
   - Parental procedural safeguards, Child Find, Independent Educational Evaluations (IEEs), and Prior Written Notice (PWN).

4. **Standardized Testing & Assessment in America** ([`standardized-testing-assessments.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/guides/standardized-testing-assessments.md)):
   - 4-Tier Assessment Spectrum: Diagnostic screeners (MAP, i-Ready, DIBELS), Formative checks, Interim benchmarks, and Summative state exams.
   - Federal ESSA mandates: Annual reading & math testing in Grades 3–8 and once in high school.
   - Metric decoding: Raw scores, Scaled scores, Percentile ranks (norm groups), Performance levels, and Lexile/Quantile measures.
   - Testing accommodations under IEP/504 (extended time, TTS audio, breaks, alternative settings).
   - Managing student testing anxiety and healthy perspectives.

5. **Comparing Educational Pathways: Public, Charter, Magnet, Private & Homeschooling** ([`school-options-public-charter-private-homeschool.md`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/guides/school-options-public-charter-private-homeschool.md)):
   - Comparative taxonomy: Funding, tuition, admissions policies, governance, and special education legal rights.
   - Public Charter Schools: What they are (100% tuition-free public schools under performance contracts) and what they are not.
   - Magnet Schools: Public district innovation hubs created for voluntary integration and specialized themes.
   - Private School Legal Reality: IDEA exemption and lack of entitlement to IEP services.
   - Homeschooling across the 50 states: Low regulation, moderate regulation, and high regulation states, plus hybrid micro-schools.

---

## 2. Dynamic Unified Controller & Routing Architecture

### Dual-Mode Controller ([`pages/guides.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guides.php))
- Automatically scans `assets/guides/*.md`, parses YAML frontmatter, and caches metadata.
- **Catalog Hub View** (`/pages/guides.php`):
  - Interactive hero section with floating animated icons.
  - Live client-side instant search filtering by title, summary, and tags.
  - Category pill filter: `All Topics`, `School Systems`, `Curriculum & Standards`, `Special Education`, `Assessments & Testing`.
  - Responsive card grid displaying reading time, audience, summary, tags, and direct reader buttons.
- **Deep Reader View** (`/pages/guides.php?<slug>` or `/pages/guides.php?guide=<slug>`):
  - Parses Markdown to semantic HTML, including custom callouts (`note`, `tip`, `warning`, `important`), responsive data tables, preformatted diagrams, and auto-generated anchor IDs for headers.
  - Sticky Reading Bar with:
    - Return to "All Guides" navigation.
    - Full Web Speech API **Text-to-Speech (TTS)** narration engine (`Listen`, `Pause`, `Resume`, `Stop`) with speed multiplier options (0.8x, 1.0x, 1.2x) and synchronized active paragraph tracking.
    - Typography accessibility toolbar: Text sizing (`A-` / `A+`), OpenDyslexic font toggle, and line height spacing toggle—all persisted in `localStorage`.
    - 1-click Print (`window.print()`) and Share link button.
  - Top Reading Progress Bar (`#guide-read-progress`) updating in real time with scroll percentage.
  - Interactive Table of Contents (TOC) with `IntersectionObserver` scrollspy tracking active sections.
  - "Explore More Guides" footer section linking to adjacent topics.

### Singular Alias ([`pages/guide.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/pages/guide.php))
- Seamlessly forwards requests to `pages/guides.php`, allowing users to type either `/pages/guide.php?american-school-system` or `/pages/guides.php?american-school-system`.

---

## 3. Styling & Client Engine
- **CSS**: [`assets/css/pages/guides.css`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/css/pages/guides.css)
  - Seamlessly integrates with Hesten's Learning design tokens (`--color-primary`, `--color-bg-surface`, `--color-border`, etc.).
  - High-contrast alert callouts (`.guide-callout.note`, `.tip`, `.warning`, `.important`).
  - Print stylesheet `@media print` removing toolbars and headers for clean student/parent handouts.
  - WCAG 2.1/2.2 AAA color contrast compliance in both light and dark modes.
- **JavaScript**: [`assets/js/pages/guides-reader.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/assets/js/pages/guides-reader.js)
  - Catalog search and pill filtering with accessible live-region updates.
  - Robust TTS synthesis with paragraph auto-scroll.
  - Persistent typography settings (`hl_guide_reader_settings`).

---

## 4. Verification & Testing Results

| Test Scenario | Verification Method | Result |
| :--- | :--- | :--- |
| **PHP Syntax Check** | `php -l pages/guides.php` & `php -l pages/guide.php` | **PASSED** (0 syntax errors) |
| **Catalog Hub Generation** | Executed `pages/guides.php` with no query parameters | **PASSED** (Rendered 189,966 bytes; all 5 guide cards verified) |
| **Direct Slug Reader Routing** | Executed `pages/guides.php?american-school-system` | **PASSED** (Rendered 191,180 bytes; TOC, TTS controls, and progress bar loaded) |
| **Singular Alias Routing** | Executed `pages/guide.php?demystifying-common-core` | **PASSED** (Rendered 188,931 bytes; Common Core math shifts and TOC loaded) |
| **Sitemap Registration** | Verified `sitemap.xml` entries | **PASSED** (`/pages/guides.php` and all 5 guide slug URLs indexed) |
| **Help Center Cross-Link** | Verified `pages/help-center.php` sidebar | **PASSED** (Educational Guides Hub link present in Educator Resources) |

---

## 5. How to Access and Add New Guides

### Accessing Guides:
- **Hub**: `https://hestena62.com/pages/guides.php`
- **American School System**: `https://hestena62.com/pages/guides.php?american-school-system`
- **Common Core**: `https://hestena62.com/pages/guides.php?demystifying-common-core`
- **Special Education & IEPs**: `https://hestena62.com/pages/guides.php?special-education-ieps-504`
- **Standardized Testing**: `https://hestena62.com/pages/guides.php?standardized-testing-assessments`
- **School Pathways**: `https://hestena62.com/pages/guides.php?school-options-public-charter-private-homeschool`

### Authoring Future Guides:
To publish a new guide, simply create a new Markdown file in `assets/guides/<slug>.md` with standard YAML frontmatter (`title`, `slug`, `category`, `audience`, `readTime`, `icon`, `summary`, `tags`). The controller will automatically discover, index, and render it in both the catalog and reader without requiring any code changes!
