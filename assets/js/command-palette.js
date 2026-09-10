/**
 * Global Command Palette & Spotlight Search Engine (assets/js/command-palette.js)
 * High-performance instant fuzzy search across all levels, standards, tools, and portals.
 */

(function () {
  'use strict';

  // Comprehensive Indexed Search Database
  const SEARCH_DATABASE = [
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
            navigateTo(item.url);
          });

          li.addEventListener('mouseenter', () => {
            updateSelection(parseInt(li.getAttribute('data-index'), 10));
          });

          resultsContainer.appendChild(li);
          renderIdx++;
        });
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

    function navigateTo(url) {
      closePalette();
      window.location.href = url;
    }

    function performSearch() {
      const query = input.value.trim().toLowerCase();
      let filtered = SEARCH_DATABASE;

      if (currentFilter !== 'all') {
        filtered = filtered.filter(item => {
          const cat = item.category.toLowerCase();
          return cat === currentFilter || item.tags.some(t => t.includes(currentFilter));
        });
      }

      if (query.length > 0) {
        filtered = filtered.filter(item => {
          const title = item.title.toLowerCase();
          const desc = item.desc.toLowerCase();
          const cat = item.category.toLowerCase();
          const tags = item.tags.join(' ').toLowerCase();

          return title.includes(query) || desc.includes(query) || cat.includes(query) || tags.includes(query);
        });
      }

      renderResults(filtered);
    }

    // Input Search Listener
    input.addEventListener('input', performSearch);

    // Filter Pills Click Listeners
    filterPills.forEach(pill => {
      pill.addEventListener('click', () => {
        filterPills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        currentFilter = pill.getAttribute('data-filter') || 'all';
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
          navigateTo(currentResults[activeIndex].url);
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
