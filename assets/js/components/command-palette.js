/**
 * Global Command Palette & Spotlight Search Engine (assets/js/components/command-palette.js)
 * High-performance instant fuzzy search across all levels, standards, tools, and portals.
 */

(function () {
  'use strict';

  // Comprehensive Indexed Search Database
  const SEARCH_DATABASE = [
    // --- SKILLS & PROGRESS ---
    {
      title: "Cosmic Skill Tree & Mastery Passport",
      desc: "Interactive visual constellation mapping CCSS mastery across Math, ELA, and Science.",
      category: "Skills",
      icon: "fa-project-diagram",
      iconClass: "tool-icon",
      url: "/pages/skills.php",
      tags: ["skills", "tree", "constellation", "mastery", "standards", "passport", "quests", "badges", "levels"]
    },
    {
      title: "Daily Learning Quests",
      desc: "Complete 3 daily educational challenges to earn bonus XP and maintain your streak.",
      category: "Skills",
      icon: "fa-tasks",
      iconClass: "tool-icon",
      url: "/pages/skills.php#quests",
      tags: ["daily", "quests", "challenges", "xp", "streak", "goals", "skills"]
    },
    {
      title: "Mastery Badges & Achievement Crests",
      desc: "Unlockable heraldic crests celebrating academic milestones across all 12 grades.",
      category: "Skills",
      icon: "fa-medal",
      iconClass: "parent-icon",
      url: "/pages/skills.php#badges",
      tags: ["badges", "crests", "medals", "achievements", "trophy", "skills"]
    },

    // --- MANIPULATIVES & LABS ---
    {
      title: "Interactive Math & Science Manipulatives Lab",
      desc: "Tactile fraction bars, place value base-10 blocks, and dynamic function grapher.",
      category: "Tools",
      icon: "fa-cubes-stacked",
      iconClass: "math-icon",
      url: "/pages/manipulatives.php",
      tags: ["manipulatives", "fraction bars", "base 10", "grapher", "math lab", "place value", "cartesian"]
    },
    {
      title: "Visual Fraction Bars & Slices",
      desc: "Explore equivalent fractions and visual fraction addition with dynamic strips.",
      category: "Tools",
      icon: "fa-chart-pie",
      iconClass: "math-icon",
      url: "/pages/manipulatives.php#fractions",
      tags: ["fraction", "bars", "slices", "equivalent", "denominator", "numerator"]
    },
    {
      title: "Place Value & Base-10 Blocks",
      desc: "Units, tens, hundreds, and thousands with interactive compose and decompose.",
      category: "Tools",
      icon: "fa-cubes",
      iconClass: "math-icon",
      url: "/pages/manipulatives.php#base10",
      tags: ["place value", "base 10", "blocks", "units", "tens", "hundreds", "thousands"]
    },
    {
      title: "Dynamic Cartesian Function Grapher",
      desc: "Interactive coordinate plane with real-time slider controls and MathJax equations.",
      category: "Tools",
      icon: "fa-chart-line",
      iconClass: "math-icon",
      url: "/pages/manipulatives.php#grapher",
      tags: ["grapher", "functions", "cartesian", "slope", "linear", "quadratic", "algebra"]
    },

    // --- ACTIONS & INSTANT TOOLS ---
    {
      title: "> Open Scratchpad & Notebooks",
      desc: "Launch tabbed notes with Cornell, MLA, and study templates.",
      category: "Tools",
      icon: "fa-pen-nib",
      iconClass: "tool-icon",
      action: "openScratchpad",
      tags: [">", "action", "scratchpad", "notes", "draft", "notebook"]
    },
    {
      title: "> Open Whiteboard & Drawing Canvas",
      desc: "Launch high-DPI math drawing canvas with shapes, undo/redo, and coordinate grids.",
      category: "Tools",
      icon: "fa-pencil-ruler",
      iconClass: "tool-icon",
      action: "openWhiteboard",
      tags: [">", "action", "whiteboard", "canvas", "draw", "grid", "shapes"]
    },
    {
      title: "> Open Focus & Study Timer",
      desc: "Launch Pomodoro focus sessions and daily study time goals.",
      category: "Tools",
      icon: "fa-stopwatch",
      iconClass: "tool-icon",
      action: "openTimer",
      tags: [">", "action", "timer", "pomodoro", "focus", "clock"]
    },
    {
      title: "> Open Sensory Calm Chamber",
      desc: "Enter low-stimulation retreat room with soothing ambient audio.",
      category: "Tools",
      icon: "fa-spa",
      iconClass: "tool-icon",
      action: "openSensory",
      tags: [">", "action", "sensory", "calm", "relax", "audio", "chamber"]
    },
    {
      title: "> Toggle High Contrast (AAA)",
      desc: "Toggle high contrast mode with 7:1 minimum contrast compliance.",
      category: "Tools",
      icon: "fa-circle-half-stroke",
      iconClass: "tool-icon",
      action: "toggleContrast",
      tags: [">", "action", "contrast", "high contrast", "aaa", "accessibility"]
    },
    {
      title: "> Start Voice Dictation",
      desc: "Transcribe spoken thoughts into notes using speech-to-text.",
      category: "Tools",
      icon: "fa-microphone",
      iconClass: "tool-icon",
      action: "startDictation",
      tags: [">", "action", "dictate", "speech", "voice", "transcribe"]
    },
    {
      title: "Universal Help Center & User Guides",
      desc: "Comprehensive feature guides, keyboard shortcuts, and accessibility documentation.",
      category: "System",
      icon: "fa-question-circle",
      iconClass: "tool-icon",
      url: "/pages/help-center.php",
      tags: ["help", "guide", "support", "faq", "shortcuts", "manual"]
    },
    {
      title: "Accessible Games Hub",
      desc: "Play stress-free educational games: Word Scramble, Grammar Detective, and Math Master.",
      category: "Assessment",
      icon: "fa-gamepad",
      iconClass: "tool-icon",
      url: "/pages/games.php",
      tags: ["games", "word scramble", "grammar detective", "memory", "sprint", "play"]
    },
    {
      title: "Universal Mathematics Codex (A–Z)",
      desc: "A-Z mathematical definitions, conceptual mechanisms, procedures, and exemplars.",
      category: "Curriculum",
      icon: "fa-calculator",
      iconClass: "math-icon",
      url: "/pages/math.php",
      tags: ["math", "codex", "a-z", "dictionary", "definitions", "procedures", "formulas"]
    },
    {
      title: "Math Vocabulary Review Hub (A–Z & Flashcards)",
      desc: "Comprehensive glossary of all lesson vocabulary with 3D active recall flashcards.",
      category: "Curriculum",
      icon: "fa-brain",
      iconClass: "math-icon",
      url: "/pages/math-vocab.php",
      tags: ["math", "vocab", "vocabulary", "flashcards", "study", "review", "terms", "definitions", "glossary"]
    },
    {
      title: "Universal English Grammar Codex (A–Z)",
      desc: "A-Z English grammar definitions, parts of speech, syntax rules, and clause mechanics.",
      category: "Curriculum",
      icon: "fa-spell-check",
      iconClass: "ela-icon",
      url: "/pages/grammar.php",
      tags: ["grammar", "syntax", "codex", "a-z", "clauses", "punctuation", "parts of speech"]
    },

    // --- PORTALS & HUBS ---
    {
      title: "Teacher & Homeschool Suite",
      desc: "Assignment builder, 36-week pacing guide, lesson customizer & class roster.",
      category: "Teacher",
      icon: "fa-chalkboard-teacher",
      iconClass: "teacher-icon",
      url: "/pages/teachers.php",
      tags: ["teacher", "educator", "classroom", "roster", "lesson plan", "pacing"]
    },
    {
      title: "Classroom Roster & Diagnostic Dossier",
      desc: "Upload report cards, evaluate mastery, and track student interventions.",
      category: "Teacher",
      icon: "fa-users",
      iconClass: "teacher-icon",
      url: "/pages/teachers.php#roster",
      tags: ["roster", "students", "report card", "dossier", "intervention", "json"]
    },
    {
      title: "36-Week Curriculum Pacing Guide",
      desc: "Comprehensive standards-aligned spiral curriculum for 36 academic weeks.",
      category: "Teacher",
      icon: "fa-calendar-check",
      iconClass: "teacher-icon",
      url: "/pages/teachers.php#pacing",
      tags: ["pacing", "curriculum", "syllabus", "weeks", "quarter", "schedule"]
    },
    {
      title: "Lesson Plan & Quiz Customizer",
      desc: "Generate 5-stage lesson plans (CRA/Inquiry) and printable worksheets.",
      category: "Teacher",
      icon: "fa-file-alt",
      iconClass: "teacher-icon",
      url: "/pages/teachers.php#lesson-plan",
      tags: ["lesson", "customizer", "quiz", "worksheet", "cra", "inquiry"]
    },
    {
      title: "Parents Hub & Resource Center",
      desc: "Homeschool routines, IEP accommodations, state laws, and certificates.",
      category: "Parent",
      icon: "fa-heart",
      iconClass: "parent-icon",
      url: "/pages/parents.php",
      tags: ["parents", "homeschool", "routine", "iep", "accommodations", "laws"]
    },
    {
      title: "Visual Home Routine & Daily Schedule",
      desc: "Interactive schedule planner and printable refrigerator routines.",
      category: "Parent",
      icon: "fa-clock",
      iconClass: "parent-icon",
      url: "/pages/parents.php#schedule",
      tags: ["schedule", "routine", "daily", "planner", "printable", "time"]
    },
    {
      title: "IEP & Neurodiversity Accommodations",
      desc: "Sensory retreat, dyslexia overlays, untimed modes, and bimodal TTS.",
      category: "Parent",
      icon: "fa-universal-access",
      iconClass: "parent-icon",
      url: "/pages/parents.php#accommodations",
      tags: ["iep", "accommodations", "dyslexia", "adhd", "sensory", "tts", "bionic"]
    },
    {
      title: "Interactive State Homeschool Laws Map",
      desc: "State-by-state legal requirements, HSLDA guidelines, and compliance rules.",
      category: "Parent",
      icon: "fa-map-marked-alt",
      iconClass: "parent-icon",
      url: "/pages/parents.php#laws",
      tags: ["laws", "state", "hslda", "legal", "compliance", "regulations"]
    },
    {
      title: "Milestone Mastery Certificate Generator",
      desc: "Create and print official heraldic achievement certificates.",
      category: "Parent",
      icon: "fa-award",
      iconClass: "parent-icon",
      url: "/pages/parents.php#milestones",
      tags: ["certificate", "milestone", "award", "achievement", "honors", "print"]
    },
    {
      title: "Standards Explorer (CCSS & NGSS)",
      desc: "Granular standard domain browser with concise grade codes.",
      category: "Standards",
      icon: "fa-book",
      iconClass: "math-icon",
      url: "/pages/standards.php",
      tags: ["standards", "ccss", "ngss", "common core", "domains", "k.cc", "5.nf"]
    },

    // --- INTERACTIVE TOOLS & APPS ---
    {
      title: "Adaptive Diagnostic Assessment",
      desc: "Multi-subject skill placement with real-time adaptive questioning.",
      category: "Assessment",
      icon: "fa-brain",
      iconClass: "tool-icon",
      url: "/assessment/diagnostic.php",
      tags: ["assessment", "diagnostic", "adaptive", "quiz", "test", "placement"]
    },
    {
      title: "Math Sprints & Fluency Checkpoint",
      desc: "Timed or untimed arithmetic sprints with instant answer feedback.",
      category: "Assessment",
      icon: "fa-bolt",
      iconClass: "tool-icon",
      url: "/assessment/index.php#elem",
      tags: ["sprint", "speed", "fluency", "math", "drills", "timed"]
    },
    {
      title: "Interactive Science & STEM Labs",
      desc: "Virtual lab simulations, chemical reactions, and physics experiments.",
      category: "Labs",
      icon: "fa-flask",
      iconClass: "sci-icon",
      url: "/student/interactive-labs.php",
      tags: ["science", "lab", "stem", "simulation", "chemistry", "physics"]
    },
    {
      title: "Library Classic Readers",
      desc: "Full-text classics with dyslexia font, audio read-aloud, and dictionary.",
      category: "Library",
      icon: "fa-book-reader",
      iconClass: "ela-icon",
      url: "/library/index.php",
      tags: ["library", "books", "classics", "reading", "literature", "stories"]
    },
    {
      title: "Updates Portal & System Changelogs",
      desc: "Live platform documentation, implementation plans, and release logs.",
      category: "System",
      icon: "fa-rss",
      iconClass: "tool-icon",
      url: "/updates.php",
      tags: ["updates", "changelog", "news", "release", "docs", "plans"]
    },

    // --- RESEARCH & SCHOLARLY JOURNALS ---
    {
      title: "Research Hub & Scholarly Journals",
      desc: "Peer-reviewed scientific journals on dyslexia, dysgraphia, phonological processing, and motor skills.",
      category: "Research",
      icon: "fa-microscope",
      iconClass: "research-icon",
      url: "/research/index.php",
      tags: ["research", "journals", "peer-reviewed", "science", "studies", "papers", "academics"]
    },
    {
      title: "Dyslexia & Learning Disabilities Research (DLDR)",
      desc: "Peer-reviewed journal exploring phonological processing, neurobiological foundations, and evidence-based interventions.",
      category: "Research",
      icon: "fa-brain",
      iconClass: "research-icon",
      url: "/research/DLDR/index.php",
      tags: ["dldr", "dyslexia", "phonology", "neurobiology", "reading", "intervention", "research"]
    },
    {
      title: "DLDR: Phonological Awareness & Rhyming Impact",
      desc: "Empirical study on phonological awareness interventions and phoneme segmentation in early learners.",
      category: "Research",
      icon: "fa-file-alt",
      iconClass: "research-icon",
      url: "/research/DLDR/index.php#articles",
      tags: ["phonological", "awareness", "rhyming", "dldr", "paper", "phonemes", "reading"]
    },
    {
      title: "Dysgraphia Studies & Motor Skills (DSMS)",
      desc: "Studies on graphomotor impairments, fine motor kinematics, neural pathways, and occupational therapy adaptations.",
      category: "Research",
      icon: "fa-pen-fancy",
      iconClass: "research-icon",
      url: "/research/DSMS/index.php",
      tags: ["dsms", "dysgraphia", "motor skills", "kinematics", "handwriting", "fine motor", "research"]
    },
    {
      title: "DSMS: Classroom Accommodations for Dysgraphia",
      desc: "Evidence-based environmental, technological, and instructional modifications for written expression.",
      category: "Research",
      icon: "fa-universal-access",
      iconClass: "research-icon",
      url: "/research/DSMS/index.php#articles",
      tags: ["dysgraphia", "accommodations", "classroom", "typing", "speech-to-text", "dsms"]
    },
    {
      title: "DSMS: Fine Motor Kinematics in Dysgraphic Writers",
      desc: "Quantitative kinematic velocity, pen pressure, and grip trajectory analysis in developmental dysgraphia.",
      category: "Research",
      icon: "fa-chart-line",
      iconClass: "research-icon",
      url: "/research/DSMS/index.php#articles",
      tags: ["kinematics", "fine motor", "velocity", "pressure", "grip", "dysgraphia", "dsms"]
    },

    // --- CURRICULUM LEVELS (PRE-K to HIGH SCHOOL) ---
    {
      title: "Pre-K Early Foundations (Level A)",
      desc: "Counting objects up to 10, letter shapes, sensory exploration & community.",
      category: "Curriculum",
      icon: "fa-shapes",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=1",
      tags: ["pre-k", "prek", "early", "level a", "counting", "shapes", "alphabet"]
    },
    {
      title: "Kindergarten Core (Level B)",
      desc: "Numbers to 100, basic addition/subtraction, phonics, and living things.",
      category: "Curriculum",
      icon: "fa-child",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=2",
      tags: ["kindergarten", "level b", "k.cc", "k.oa", "phonics", "sight words"]
    },
    {
      title: "Grade 1 Foundations (Level C)",
      desc: "Addition within 20, place value tens and ones, reading comprehension.",
      category: "Curriculum",
      icon: "fa-cube",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=3",
      tags: ["1st grade", "grade 1", "level c", "1.oa", "1.nbt", "phonics"]
    },
    {
      title: "Grade 2 Math & ELA (Level D)",
      desc: "Multi-digit addition, measurement, arrays, and informational texts.",
      category: "Curriculum",
      icon: "fa-layer-group",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=4",
      tags: ["2nd grade", "grade 2", "level d", "2.oa", "2.nbt", "2.md"]
    },
    {
      title: "Grade 3 Multiplication & Fractions (Level E)",
      desc: "Times tables, fractional parts, area models, and story themes.",
      category: "Curriculum",
      icon: "fa-th-large",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=5",
      tags: ["3rd grade", "grade 3", "level e", "3.oa", "3.nf", "multiplication"]
    },
    {
      title: "Grade 4 Multi-Digit & Decimals (Level F)",
      desc: "Multi-digit multiplication/division, equivalent fractions, earth systems.",
      category: "Curriculum",
      icon: "fa-superscript",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=6",
      tags: ["4th grade", "grade 4", "level f", "4.nbt", "4.nf", "decimals"]
    },
    {
      title: "Grade 5 Fractions & Decimal Operations (Level G)",
      desc: "Fraction arithmetic, volume geometry, coordinate plane, and historical documents.",
      category: "Curriculum",
      icon: "fa-cubes",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=7",
      tags: ["5th grade", "grade 5", "level g", "5.nf", "5.md", "volume", "fractions"]
    },
    {
      title: "Grade 6 Ratios & Expressions (Level H)",
      desc: "Ratio reasoning, algebraic expressions, surface area, and cell biology.",
      category: "Curriculum",
      icon: "fa-percentage",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=8",
      tags: ["6th grade", "grade 6", "level h", "6.rp", "6.ee", "ratios", "middle school"]
    },
    {
      title: "Grade 7 Proportions & Integers (Level I)",
      desc: "Signed numbers, proportional equations, linear geometry, and chemistry models.",
      category: "Curriculum",
      icon: "fa-chart-line",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=9",
      tags: ["7th grade", "grade 7", "level i", "7.rp", "7.ns", "7.ee", "integers"]
    },
    {
      title: "Grade 8 Pre-Algebra & Functions (Level J)",
      desc: "Linear functions, Pythagorean theorem, scientific notation, and genetics.",
      category: "Curriculum",
      icon: "fa-square-root-alt",
      iconClass: "math-icon",
      url: "/src/lesson_runner.php?subject=math&level=10",
      tags: ["8th grade", "grade 8", "level j", "8.ee", "8.f", "functions", "pythagorean"]
    },
    {
      title: "High School Algebra 1 & Biology (Level K)",
      desc: "Quadratic equations, exponential models, cellular energy, and U.S. governance.",
      category: "Curriculum",
      icon: "fa-graduation-cap",
      iconClass: "math-icon",
      url: "/levels/high-school-stem.php",
      tags: ["high school", "algebra 1", "level k", "hs", "quadratics", "biology", "ap"]
    }
  ];

  let activeIndex = -1;
  let currentResults = [];

  function initCommandPalette() {
    const overlay = document.getElementById('global-command-palette');
    const input = document.getElementById('cmd-search-input');
    const resultsContainer = document.getElementById('cmd-results-list');
    const closeBtn = document.getElementById('cmd-close-btn');
    const filterPills = document.querySelectorAll('.cmd-filter-pill');

    if (!overlay || !input || !resultsContainer) return;

    // Filter by tag or all
    let currentFilter = 'all';

    function openPalette() {
      overlay.classList.add('active');
      overlay.style.display = 'flex';
      document.body.style.overflow = 'hidden';
      input.value = '';
      currentFilter = 'all';
      filterPills.forEach(p => p.classList.toggle('active', p.getAttribute('data-filter') === 'all'));
      renderResults(SEARCH_DATABASE);
      setTimeout(() => input.focus(), 50);
    }

    function closePalette() {
      overlay.classList.remove('active');
      overlay.style.display = 'none';
      document.body.style.overflow = '';
      activeIndex = -1;
    }

    function renderResults(list) {
      currentResults = list;
      activeIndex = list.length > 0 ? 0 : -1;
      resultsContainer.innerHTML = '';

      if (list.length === 0) {
        resultsContainer.innerHTML = `
          <div class="cmd-empty-state">
            <i class="fas fa-search cmd-empty-icon"></i>
            <div class="cmd-empty-title">No matching resources found</div>
            <div class="cmd-empty-desc">Try searching for standard codes like "5.NF", grades, or topics like "fractions".</div>
          </div>
        `;
        return;
      }

      // Group items by category
      const groups = {};
      list.forEach((item, idx) => {
        if (!groups[item.category]) groups[item.category] = [];
        groups[item.category].push({ ...item, originalIdx: idx });
      });

      let renderIdx = 0;
      for (const [catName, items] of Object.entries(groups)) {
        const groupHeader = document.createElement('li');
        groupHeader.className = 'cmd-group-label';
        groupHeader.textContent = catName;
        resultsContainer.appendChild(groupHeader);

        items.forEach(item => {
          const li = document.createElement('li');
          const isSelected = renderIdx === activeIndex;
          li.className = `cmd-result-item ${isSelected ? 'selected' : ''}`;
          li.setAttribute('data-index', renderIdx);
          li.setAttribute('role', 'option');
          li.setAttribute('aria-selected', isSelected ? 'true' : 'false');

          li.innerHTML = `
            <div class="cmd-result-icon ${item.iconClass || 'tool-icon'}">
              <i class="fas ${item.icon}"></i>
            </div>
            <div class="cmd-result-content">
              <div class="cmd-result-title">
                <span>${escapeHtml(item.title)}</span>
                <span class="cmd-result-badge">${escapeHtml(item.category)}</span>
              </div>
              <div class="cmd-result-desc">${escapeHtml(item.desc)}</div>
            </div>
            <span class="cmd-result-enter-hint"><i class="fas fa-level-down-alt fa-rotate-90"></i> Go</span>
          `;

          li.addEventListener('click', () => {
            navigateTo(item);
          });

          li.addEventListener('mouseenter', () => {
            updateSelection(parseInt(li.getAttribute('data-index'), 10));
          });

          resultsContainer.appendChild(li);
          renderIdx++;
        });
      }
    }

    function executeAction(act) {
      closePalette();
      if (act === 'openScratchpad') {
        if (window.HLScratchpad && window.HLScratchpad.open) {
          window.HLScratchpad.open('notes');
        } else {
          const btn = document.getElementById('scratchpad-toggle');
          if (btn) btn.click();
        }
      } else if (act === 'openWhiteboard') {
        if (window.HLScratchpad && window.HLScratchpad.open) {
          window.HLScratchpad.open('whiteboard');
        } else {
          const btn = document.getElementById('scratchpad-toggle');
          if (btn) btn.click();
        }
      } else if (act === 'openTimer') {
        if (window.toggleStudyTimer) window.toggleStudyTimer();
      } else if (act === 'openFlashcards') {
        if (window.toggleFlashcardStudio) window.toggleFlashcardStudio();
      } else if (act === 'openSensory') {
        if (window.SensoryChamber && window.SensoryChamber.open) window.SensoryChamber.open();
      } else if (act === 'toggleContrast') {
        const btn = document.getElementById('contrast-toggle') || document.querySelector('.btn-contrast-toggle');
        if (btn) btn.click();
      } else if (act === 'startDictation') {
        if (window.HLScratchpad && window.HLScratchpad.open) {
          window.HLScratchpad.open('notes');
          setTimeout(() => {
            const dBtn = document.getElementById('scratchpad-dictate-btn');
            if (dBtn) dBtn.click();
          }, 250);
        }
      }
    }

    function updateSelection(newIdx) {
      const items = resultsContainer.querySelectorAll('.cmd-result-item');
      if (items.length === 0) return;

      if (newIdx < 0) newIdx = items.length - 1;
      if (newIdx >= items.length) newIdx = 0;

      activeIndex = newIdx;
      items.forEach((it, idx) => {
        const isSel = idx === activeIndex;
        it.classList.toggle('selected', isSel);
        it.setAttribute('aria-selected', isSel ? 'true' : 'false');
        if (isSel) {
          it.scrollIntoView({ block: 'nearest' });
        }
      });
    }

    function navigateTo(target) {
      closePalette();
      if (!target) return;
      if (typeof target === 'object') {
        if (target.action) {
          executeAction(target.action);
          return;
        }
        if (target.url) {
          window.location.href = target.url;
          return;
        }
      } else if (typeof target === 'string') {
        window.location.href = target;
      }
    }

    function performSearch() {
      const query = input.value.trim().toLowerCase();
      let filtered = SEARCH_DATABASE;

      if (currentFilter !== 'all') {
        filtered = filtered.filter(item => {
          const cat = item.category.toLowerCase();
          return cat === currentFilter || (item.tags && item.tags.some(t => t.toLowerCase().includes(currentFilter)));
        });
      }

      if (query.length > 0) {
        filtered = filtered.filter(item => {
          const title = item.title.toLowerCase();
          const desc = item.desc ? item.desc.toLowerCase() : '';
          const cat = item.category.toLowerCase();
          const tags = item.tags ? item.tags.join(' ').toLowerCase() : '';

          return title.includes(query) || desc.includes(query) || cat.includes(query) || tags.includes(query);
        });
      }

      renderResults(filtered);
    }

    // Voice Search Assistant
    const voiceBtn = document.getElementById('cmd-voice-btn');
    if (voiceBtn) {
      const SpeechRec = window.SpeechRecognition || window.webkitSpeechRecognition;
      if (!SpeechRec) {
        voiceBtn.style.display = 'none';
      } else {
        const recognition = new SpeechRec();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'en-US';

        recognition.onstart = () => {
          voiceBtn.classList.add('listening');
          voiceBtn.setAttribute('aria-label', 'Listening...');
        };
        recognition.onresult = (evt) => {
          if (evt.results && evt.results[0] && evt.results[0][0]) {
            input.value = evt.results[0][0].transcript;
            performSearch();
          }
        };
        recognition.onerror = () => {
          voiceBtn.classList.remove('listening');
          voiceBtn.setAttribute('aria-label', 'Voice Search');
        };
        recognition.onend = () => {
          voiceBtn.classList.remove('listening');
          voiceBtn.setAttribute('aria-label', 'Voice Search');
        };

        voiceBtn.addEventListener('click', () => {
          try {
            recognition.start();
          } catch (err) {
            recognition.stop();
          }
        });
      }
    }

    // Input Search Listener
    input.addEventListener('input', performSearch);

    // Filter Pills Click Listeners
    filterPills.forEach(pill => {
      pill.addEventListener('click', () => {
        filterPills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        currentFilter = (pill.getAttribute('data-filter') || 'all').toLowerCase();
        performSearch();
      });
    });

    // Keyboard Shortcuts Navigation
    input.addEventListener('keydown', (e) => {
      const items = resultsContainer.querySelectorAll('.cmd-result-item');
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        updateSelection(activeIndex + 1);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        updateSelection(activeIndex - 1);
      } else if (e.key === 'Enter') {
        e.preventDefault();
        if (currentResults[activeIndex]) {
          navigateTo(currentResults[activeIndex]);
        }
      } else if (e.key === 'Escape') {
        closePalette();
      }
    });

    // Global Keydown Shortcut (Ctrl+K or Cmd+K)
    document.addEventListener('keydown', (e) => {
      if ((e.ctrlKey || e.metaKey) && (e.key === 'k' || e.key === 'K')) {
        e.preventDefault();
        if (overlay.classList.contains('active')) {
          closePalette();
        } else {
          openPalette();
        }
      } else if (e.key === 'Escape' && overlay.classList.contains('active')) {
        closePalette();
      }
    });

    // Close on overlay backdrop click
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        closePalette();
      }
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', closePalette);
    }

    // Expose Global Helper
    window.openCommandPalette = openPalette;
    window.closeCommandPalette = closePalette;
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // Auto-init on DOMContentLoaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCommandPalette);
  } else {
    initCommandPalette();
  }
})();
