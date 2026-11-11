## Curriculum Pacing Guide & Universal Multi-Grade Wave Suite

Structure your school year with flexibility, pedagogical clarity, and freedom from high-stakes testing anxiety across all grade levels. The **Curriculum Pacing Guide** in the Educator Suite ([`pages/teachers.php#pacing`](/pages/teachers.php#pacing)) provides dual scheduling methodologies available across **all 11 grade levels (Pre-K through High School)**: the **Classic 36-Week Traditional Schedule** and the fully independent **Year-Round Wave Structure (6 Waves • 48 Weeks • Fiscal Calendar: July 1 – June 30)**.

### Universal Grade Spectrum (Pre-K to High School)
Every grade level from early childhood through secondary graduation features custom-tailored, standards-aligned scope and sequence plans:
- **Pre-K (Level A):** Early numeracy, phonological awareness, sensory science inquiry, and community helpers.
- **Kindergarten (Level B):** Cardinality, early decoding/CVC word families, weather & plants, and rules & citizenship.
- **Grade 1 (Level C):** Addition/subtraction within 20, foundational reading fluency, light/sound waves, and family/community traditions.
- **Grade 2 (Level D):** Base-ten to 1,000, multi-paragraph reading comprehension, matter & habitats, and geography & cultural history.
- **Grade 3 (Level E):** Multiplication & division concepts, fractions, narrative analysis, forces & magnetism, and regional indigenous cultures.
- **Grade 4 (Level F):** Multi-digit operations, fraction equivalence, historical fiction close reading, earth systems & energy, and state civics.
- **Grade 5 (Level G):** Decimals, fraction operations, informational text synthesis, astronomy & matter, and early American history.
- **Grade 6 (Level H):** Ratios & unit rates, algebraic expressions, literature analysis, cellular biology & energy, and ancient world civilizations.
- **Grade 7 (Level I):** Proportional relationships, integers & rational numbers, argument writing, genetics & geology, and medieval/early modern world history.
- **Grade 8 (Level J):** Linear equations, functions, Pythagorean theorem, close text analysis, forces/motion & heredity, and U.S. Constitution & historical expansion.
- **High School (Levels K–N):** Integrated algebra & geometry, advanced rhetorical analysis, physical & biological systems, and government/civic capstones.

### Pacing Methodologies & Structural Options
- **1. Classic 36-Week Traditional Schedule (4 Quarters):**
  - Standard school year broken into four 9-week quarters (Weeks 1–36).
  - Domain rotation across Mathematics, English Language Arts, Science, and Social Studies.
  - Quarterly fluency sprints on Week 8 and milestone reviews on Week 9 of each quarter.
  - Ideal for standard public/private school calendars, traditional homeschool terms, and quarterly grading cycles.
  - Progress tracked independently in `localStorage` under `hesten_teacher_pacing_progress_<grade>`.
- **2. Year-Round Wave Structure (6 Waves • 48 Weeks • Fiscal Calendar: July 1 – June 30):**
  - **Fully Independent from 36-Week Schedule:** A completely separate 48-week curriculum progression aligned with the annual fiscal calendar (Wave 1 begins July 1, Wave 6 concludes June 30).
  - **The 7+1 Learning Cycle:** Each wave is exactly 8 weeks long:
    - **7 Weeks of Core Instructional Immersion (Weeks 1–7):** Dedicated, continuous learning blocks focusing on deep conceptual discovery, literature analysis, inquiry labs, and skill building without the disruption of weekly high-stakes testing.
    - **Week 8 (Testing, Finishing Work & Planning):**
      - **Formative & Summative Testing:** Target-specific diagnostic checkpoints and wave milestone exams to evaluate standard mastery.
      - **Finishing Up Pending Work:** Intentional buffer time for learners to complete open projects, polish portfolio artifacts, and revisit tricky concepts without falling behind.
      - **Planning & Next Wave Prep:** Dedicated planning window for educators and homeschool coaches to review student progress, adapt neurodiversity scaffolds, and prepare curriculum for the upcoming Wave.
  - **The 6 Fiscal Waves (48 Weeks Total):**
    - **Wave 1 (July 1 – Late August • Wks 1–8):** Fiscal Kickoff, Grade Foundations & Core Inquiry (Wks 1–7 Instruction, Wk 8 Testing & Planning)
    - **Wave 2 (September – October • Wks 9–16):** Domain Acceleration, Natural Systems & Literary Voice (Wks 9–15 Instruction, Wk 16 Testing & Planning)
    - **Wave 3 (November – December • Wks 17–24):** Core Mastery, Analytical Frameworks & Global Systems (Wks 17–23 Instruction, Wk 24 Mid-Year Testing & Planning)
    - **Wave 4 (January – February • Wks 25–32):** Spatial & Quantitative Reasoning, Environmental Dynamics & Social Civics (Wks 25–31 Instruction, Wk 32 Testing & Planning)
    - **Wave 5 (March – April • Wks 33–40):** Advanced Synthesis, Scientific Investigation & Literature Capstones (Wks 33–39 Instruction, Wk 40 Spring Benchmark & Planning)
    - **Wave 6 (May – June 30 • Wks 41–48):** Applied Projects, Civic Capstones & Fiscal Year-End Certification (Wks 41–47 Instruction, Wk 48 Fiscal Year-End Evaluation & Next-Year Prep)
  - Progress tracked independently in `localStorage` under `hesten_teacher_pacing_wave_progress_<grade>`.

### Core Capabilities & Action Buttons
- **Grade Level Selector:** Switch between any of the 11 grade levels in real time; your chosen grade selection automatically persists in `localStorage['hl_pacing_grade']`.
- **1-Click Model Switcher:** Instantly toggle between the Traditional 36-Week schedule and the Year-Round Wave structure; your selected preference automatically persists in local browser storage (`localStorage['hl_pacing_model']`).
- **Independent Grade & Model Progress Checkboxes:** Mark completed instructional units and synthesis checkpoints as you advance; completions are isolated by grade and schedule model so multi-grade educators can manage diverse learners without cross-grade contamination.
- **Wave Filter Pills:** Filter your view to display All 6 Waves (48 weeks) or inspect any specific wave (Wave 1 through Wave 6) with customized week indicators (`Wk 1 of 7` immersion vs `Synthesis`).
- **Dynamic Printable Syllabus Exporter:** Click **Print Pacing Syllabus** to format a clean, ad-free 8.5" x 11" printable pacing handbook featuring dynamic grade and model title banners for homeschool reporting, classroom distribution, or accreditation binders.
- **Deep-Linked Curriculum Access:** Jump straight into corresponding interactive lesson modules or formative assessment checkpoints directly from each weekly row.

### Universal Accessibility & UDL
- **Screen Reader Navigation:** Full semantic table and card structure with clear `role="region"`, accessible status badges, and dynamic `aria-live="polite"` status announcements.
- **Keyboard Operability:** 100% accessible via keyboard navigation (`Tab`, `Shift+Tab`, `Space` to toggle week completion, `Enter` to select grade and model options).
- **High-Contrast Focus Rings:** Clearly visible focus indicators adhering to WCAG 2.1 AA/AAA contrast ratios across light, dark, and high-contrast modes.
- **Offline Resiliency:** All grade selections, pacing preferences, and completed week states persist offline in local browser storage and synchronize with cloud backups when Google Drive auto-sync is enabled.
