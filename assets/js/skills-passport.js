/**
 * assets/js/skills-passport.js
 * Cosmic Skill Tree & Gamified Mastery Passport Controller
 * 100% Offline-First, Universal Data-Sync, WCAG AAA compliant.
 */

(function () {
  'use strict';

  // --- Canonical Standards Nodes Fallback Dataset ---
  const CURATED_STANDARDS_NODES = [
    // --- MATH: Elementary (K-5) ---
    {
      code: "K.CC.1",
      subject: "math",
      band: "early",
      grade: "Kindergarten",
      domain: "Counting & Cardinality",
      title: "Count to 100 by Ones and Tens",
      desc: "Count to 100 by ones and by tens with rhythmic accuracy and numerical fluency.",
      exemplar: "Count forward beginning from 42: $$42, 43, 44, 45, 46, 47, 48, 49, 50$$",
      icon: "fa-child",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=2"
    },
    {
      code: "1.OA.1",
      subject: "math",
      band: "early",
      grade: "Grade 1",
      domain: "Operations & Algebraic Thinking",
      title: "Addition & Subtraction Word Problems",
      desc: "Use addition and subtraction within 20 to solve word problems with unknowns in all positions.",
      exemplar: "Solve: $$8 + \\Box = 15 \\implies \\Box = 15 - 8 = 7$$",
      icon: "fa-plus-minus",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=3"
    },
    {
      code: "2.NBT.1",
      subject: "math",
      band: "early",
      grade: "Grade 2",
      domain: "Number & Operations in Base Ten",
      title: "Three-Digit Place Value Concepts",
      desc: "Understand that the three digits of a three-digit number represent amounts of hundreds, tens, and ones.",
      exemplar: "Represent 706 in expanded form: $$706 = 700 + 0 + 6 = 7\\text{ hundreds} + 6\\text{ ones}$$",
      icon: "fa-cubes",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=4"
    },
    {
      code: "3.OA.1",
      subject: "math",
      band: "early",
      grade: "Grade 3",
      domain: "Operations & Algebraic Thinking",
      title: "Multiplication as Equal Groups",
      desc: "Interpret products of whole numbers, e.g., interpret 5 × 7 as the total number of objects in 5 groups of 7 objects each.",
      exemplar: "Calculate total items: $$5 \\times 7 = 7 + 7 + 7 + 7 + 7 = 35$$",
      icon: "fa-xmark",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=5"
    },
    {
      code: "3.NF.1",
      subject: "math",
      band: "early",
      grade: "Grade 3",
      domain: "Number & Operations—Fractions",
      title: "Unit Fractions as Parts of a Whole",
      desc: "Understand a fraction 1/b as the quantity formed by 1 part when a whole is partitioned into b equal parts.",
      exemplar: "Partition a strip into 4 equal segments: each segment is $$\\frac{1}{4}$$. Three shaded segments equal $$\\frac{3}{4}$$.",
      icon: "fa-chart-pie",
      lessonUrl: "/pages/manipulatives.php#fractions"
    },
    {
      code: "4.NF.1",
      subject: "math",
      band: "early",
      grade: "Grade 4",
      domain: "Number & Operations—Fractions",
      title: "Equivalent Fractions by Scaling",
      desc: "Explain why a fraction a/b is equivalent to a fraction (n×a)/(n×b) using visual fraction models.",
      exemplar: "Find equivalent fraction: $$\\frac{2}{3} = \\frac{2 \\times 4}{3 \\times 4} = \\frac{8}{12}$$",
      icon: "fa-scale-balanced",
      lessonUrl: "/pages/manipulatives.php#fractions"
    },
    {
      code: "5.NF.1",
      subject: "math",
      band: "early",
      grade: "Grade 5",
      domain: "Number & Operations—Fractions",
      title: "Add & Subtract Unlike Fractions",
      desc: "Add and subtract fractions with unlike denominators by replacing them with equivalent fractions.",
      exemplar: "Solve: $$\\frac{2}{3} + \\frac{5}{4} = \\frac{8}{12} + \\frac{15}{12} = \\frac{23}{12} = 1\\frac{11}{12}$$",
      icon: "fa-divide",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=7"
    },

    // --- MATH: Middle School (6-8) ---
    {
      code: "6.RP.1",
      subject: "math",
      band: "middle",
      grade: "Grade 6",
      domain: "Ratios & Proportional Relationships",
      title: "Understand Ratio Concepts & Language",
      desc: "Understand the concept of a ratio and use ratio language to describe a ratio relationship between two quantities.",
      exemplar: "If there are 4 birds and 12 trees, the simplified ratio of birds to trees is: $$4 : 12 = 1 : 3$$",
      icon: "fa-percent",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=8"
    },
    {
      code: "7.NS.1",
      subject: "math",
      band: "middle",
      grade: "Grade 7",
      domain: "The Number System",
      title: "Add & Subtract Rational Numbers",
      desc: "Apply and extend previous understandings of addition and subtraction to add and subtract signed numbers on a number line.",
      exemplar: "Evaluate: $$-4.5 - (-7.2) = -4.5 + 7.2 = 2.7$$",
      icon: "fa-arrows-left-right",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=9"
    },
    {
      code: "8.EE.1",
      subject: "math",
      band: "middle",
      grade: "Grade 8",
      domain: "Expressions & Equations",
      title: "Properties of Integer Exponents",
      desc: "Know and apply the properties of integer exponents to generate equivalent numerical expressions.",
      exemplar: "Simplify: $$3^2 \\times 3^{-5} = 3^{2 + (-5)} = 3^{-3} = \\frac{1}{3^3} = \\frac{1}{27}$$",
      icon: "fa-superscript",
      lessonUrl: "/src/lesson_runner.php?subject=math&level=10"
    },
    {
      code: "8.G.7",
      subject: "math",
      band: "middle",
      grade: "Grade 8",
      domain: "Geometry",
      title: "Apply the Pythagorean Theorem",
      desc: "Apply the Pythagorean Theorem $a^2 + b^2 = c^2$ to determine unknown side lengths in right triangles.",
      exemplar: "Find hypotenuse $c$ when $a=6, b=8$: $$c = \\sqrt{6^2 + 8^2} = \\sqrt{36 + 64} = \\sqrt{100} = 10$$",
      icon: "fa-draw-polygon",
      lessonUrl: "/pages/math.php"
    },

    // --- MATH: High School (9-12) ---
    {
      code: "HSA.CED.1",
      subject: "math",
      band: "high",
      grade: "High School",
      domain: "Creating Equations",
      title: "Create Equations in One Variable",
      desc: "Create equations and inequalities in one variable and use them to solve contextual problems.",
      exemplar: "Solve for $x$: $$3x + 12 = 45 \\implies 3x = 33 \\implies x = 11$$",
      icon: "fa-equals",
      lessonUrl: "/levels/high-school-stem.php"
    },
    {
      code: "HSA.REI.4",
      subject: "math",
      band: "high",
      grade: "High School",
      domain: "Reasoning with Equations",
      title: "Solve Quadratic Equations",
      desc: "Solve quadratic equations by inspection, taking square roots, completing the square, or the quadratic formula.",
      exemplar: "Quadratic Formula: $$x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$$",
      icon: "fa-infinity",
      lessonUrl: "/pages/manipulatives.php#grapher"
    },

    // --- ELA: All Bands ---
    {
      code: "ELA.RL.K.1",
      subject: "ela",
      band: "early",
      grade: "Kindergarten",
      domain: "Reading Literature",
      title: "Key Details with Prompting",
      desc: "With prompting and support, ask and answer questions about key details in an illustrated text.",
      exemplar: "Who was the main character in the story? What did they build?",
      icon: "fa-book-reader",
      lessonUrl: "/library/index.php"
    },
    {
      code: "ELA.RL.3.1",
      subject: "ela",
      band: "early",
      grade: "Grade 3",
      domain: "Reading Literature",
      title: "Textual Evidence & Inferences",
      desc: "Ask and answer questions to demonstrate understanding of a text, referring explicitly to the text as the basis.",
      exemplar: "Cite specific paragraphs proving the character's motivation changed.",
      icon: "fa-quote-left",
      lessonUrl: "/library/index.php"
    },
    {
      code: "ELA.L.5.1",
      subject: "ela",
      band: "early",
      grade: "Grade 5",
      domain: "Language & Grammar",
      title: "Conjunctions, Prepositions & Interjections",
      desc: "Demonstrate command of the conventions of standard English grammar and usage when writing or speaking.",
      exemplar: "Identify coordinating conjunctions: **FANBOYS** (For, And, Nor, But, Or, Yet, So).",
      icon: "fa-spell-check",
      lessonUrl: "/pages/grammar.php"
    },
    {
      code: "ELA.RL.8.2",
      subject: "ela",
      band: "middle",
      grade: "Grade 8",
      domain: "Reading Literature",
      title: "Determine Central Theme & Objective Summary",
      desc: "Determine a theme or central idea of a text and analyze its development over the course of the text.",
      exemplar: "Distinguish between a topic (e.g. 'friendship') and an author's theme (e.g. 'true friendship requires sacrifice').",
      icon: "fa-feather",
      lessonUrl: "/library/read/index.php?book=frankenstein"
    },
    {
      code: "ELA.RL.11.1",
      subject: "ela",
      band: "high",
      grade: "High School",
      domain: "Reading Literature",
      title: "Strong & Thorough Textual Analysis",
      desc: "Cite strong and thorough textual evidence to support analysis of what the text says explicitly as well as inferences.",
      exemplar: "Analyze rhetoric and historical perspective in *The Federalist Papers*.",
      icon: "fa-scroll",
      lessonUrl: "/library/read/index.php?book=federalist-papers"
    },

    // --- SCIENCE (NGSS) ---
    {
      code: "SCI.2.PS1",
      subject: "science",
      band: "early",
      grade: "Grade 2",
      domain: "Physical Science",
      title: "Matter & Physical Properties",
      desc: "Plan and conduct an investigation to describe and classify different kinds of materials by observable properties.",
      exemplar: "Classify items into solids, liquids, and gases based on shape and volume retention.",
      icon: "fa-atom",
      lessonUrl: "/student/interactive-labs.php"
    },
    {
      code: "SCI.MS.LS1",
      subject: "science",
      band: "middle",
      grade: "Grade 6-8",
      domain: "Life Science",
      title: "Cell Systems & Organization",
      desc: "Conduct an investigation to provide evidence that living things are made of cells, either one cell or many different numbers.",
      exemplar: "Compare plant cells (rigid cell wall, chloroplasts) vs. animal cells (flexible membrane).",
      icon: "fa-dna",
      lessonUrl: "/student/interactive-labs.php"
    },
    {
      code: "SCI.HS.PS1",
      subject: "science",
      band: "high",
      grade: "High School",
      domain: "Physical Science",
      title: "Chemical Reactions & Atomic Structure",
      desc: "Use the periodic table as a model to predict the relative properties of elements based on patterns of outer electrons.",
      exemplar: "Valence electron trends and ionic vs. covalent bonding mechanisms.",
      icon: "fa-flask-vial",
      lessonUrl: "/student/interactive-labs.php"
    }
  ];

  // --- Heraldic Badges Definitions ---
  const BADGES_DATABASE = [
    {
      id: "scholar",
      title: "Cosmic Scholar",
      desc: "Master 5 or more standards across any subject constellation.",
      icon: "fa-crown",
      check: (mastery) => Object.values(mastery).filter(v => v >= 80).length >= 5
    },
    {
      id: "pythagoras",
      title: "Pythagorean Prodigy",
      desc: "Demonstrate mastery in Grade 8 or High School geometry and algebra.",
      icon: "fa-draw-polygon",
      check: (mastery) => (mastery['8.G.7'] >= 80 || mastery['HSA.REI.4'] >= 80)
    },
    {
      id: "fraction",
      title: "Fraction Commander",
      desc: "Master understanding of fractional parts and operations (3.NF or 5.NF).",
      icon: "fa-chart-pie",
      check: (mastery) => (mastery['3.NF.1'] >= 80 || mastery['4.NF.1'] >= 80 || mastery['5.NF.1'] >= 80)
    },
    {
      id: "wordsmith",
      title: "Shakespearean Scribe",
      desc: "Master key ELA literature analysis and central theme identification.",
      icon: "fa-feather",
      check: (mastery) => (mastery['ELA.RL.3.1'] >= 80 || mastery['ELA.RL.8.2'] >= 80)
    },
    {
      id: "scientist",
      title: "Empirical Scientist",
      desc: "Explore life science or physical science phenomena.",
      icon: "fa-atom",
      check: (mastery) => (mastery['SCI.MS.LS1'] >= 80 || mastery['SCI.HS.PS1'] >= 80)
    },
    {
      id: "notes",
      title: "Da Vinci Scribe",
      desc: "Maintain study notes and diagrams in the Unified Scratchpad.",
      icon: "fa-pen-nib",
      check: () => {
        try {
          const notes = JSON.parse(localStorage.getItem('hl_scratchpad_notebook') || '[]');
          return notes.length >= 2 || (localStorage.getItem('hl_scratchpad') || '').length > 50;
        } catch (e) { return false; }
      }
    },
    {
      id: "streak",
      title: "Daily Focus Champion",
      desc: "Maintain an active 3-day learning streak.",
      icon: "fa-fire",
      check: (mastery, profile, gProfile) => (gProfile.streak || 1) >= 3
    },
    {
      id: "ace",
      title: "Diagnostic Ace",
      desc: "Earn 100+ XP and demonstrate active skill assessments.",
      icon: "fa-star",
      check: (mastery, profile) => (profile.xp || 0) >= 100
    }
  ];

  // --- Data State ---
  let userMastery = {};
  let userProfile = {};
  let gamificationProfile = {};
  let currentSubject = 'math';
  let currentBand = 'early';

  function loadStorageData() {
    try {
      userMastery = JSON.parse(localStorage.getItem('hesten_standards_mastery') || '{}');
    } catch (e) { userMastery = {}; }

    try {
      userProfile = JSON.parse(localStorage.getItem('hesten-user-profile') || '{}');
    } catch (e) { userProfile = {}; }

    try {
      gamificationProfile = JSON.parse(localStorage.getItem('hl_gamification_profile') || '{}');
    } catch (e) { gamificationProfile = {}; }
  }

  // --- Safe MathJax Helper ---
  function safeTypeset(el) {
    if (!el || !window.ensureMathJax) return;
    try {
      if (window.MathJax && window.MathJax.typesetClear) {
        window.MathJax.typesetClear([el]);
      }
      window.ensureMathJax(el);
    } catch (e) {}
  }

  // --- HUD Updates ---
  function renderHUD() {
    const masteredCount = Object.values(userMastery).filter(v => v >= 80).length;
    const totalXp = (userProfile.xp || gamificationProfile.xp || 0);
    const streak = gamificationProfile.streak || 1;

    let unlockedBadges = 0;
    BADGES_DATABASE.forEach(b => {
      if (b.check(userMastery, userProfile, gamificationProfile)) unlockedBadges++;
    });

    const mEl = document.getElementById('hud-mastered-count');
    const xpEl = document.getElementById('hud-total-xp');
    const sEl = document.getElementById('hud-streak-count');
    const bEl = document.getElementById('hud-badges-count');

    if (mEl) mEl.textContent = masteredCount;
    if (xpEl) xpEl.textContent = `${totalXp.toLocaleString()} XP`;
    if (sEl) sEl.textContent = `${streak} ${streak === 1 ? 'Day' : 'Days'}`;
    if (bEl) bEl.textContent = `${unlockedBadges} / ${BADGES_DATABASE.length}`;
  }

  // --- Daily Quests Engine ---
  function renderQuests() {
    const today = new Date().toISOString().slice(0, 10);
    let questState = {};
    try {
      questState = JSON.parse(localStorage.getItem('hl_daily_quests') || '{}');
    } catch (e) { questState = {}; }

    if (questState.date !== today) {
      questState = {
        date: today,
        math: 0,
        ela: 0,
        tools: 0,
        claimed: false
      };
      localStorage.setItem('hl_daily_quests', JSON.stringify(questState));
    }

    // Evaluate dynamic completions
    if ((localStorage.getItem('hl_scratchpad') || '').length > 20) {
      questState.tools = 1;
    }

    const mathComplete = questState.math >= 5;
    const elaComplete = questState.ela >= 1;
    const toolsComplete = questState.tools >= 1;

    let completedCount = 0;
    if (mathComplete) completedCount++;
    if (elaComplete) completedCount++;
    if (toolsComplete) completedCount++;

    const pill = document.getElementById('quest-progress-text');
    if (pill) pill.textContent = `${completedCount} / 3 Completed`;

    // Quest 1 (Math)
    const cardMath = document.getElementById('quest-card-math');
    const barMath = document.getElementById('quest-bar-math');
    const labelMath = document.getElementById('quest-label-math');
    if (cardMath && barMath && labelMath) {
      const pct = Math.min(100, Math.round((questState.math / 5) * 100));
      barMath.style.width = pct + '%';
      labelMath.textContent = `${Math.min(5, questState.math)} / 5 Complete`;
      cardMath.classList.toggle('completed', mathComplete);
    }

    // Quest 2 (ELA)
    const cardEla = document.getElementById('quest-card-ela');
    const barEla = document.getElementById('quest-bar-ela');
    const labelEla = document.getElementById('quest-label-ela');
    if (cardEla && barEla && labelEla) {
      const pct = elaComplete ? 100 : 0;
      barEla.style.width = pct + '%';
      labelEla.textContent = elaComplete ? '1 / 1 Completed' : '0 / 1 Chapters';
      cardEla.classList.toggle('completed', elaComplete);
    }

    // Quest 3 (Tools)
    const cardTools = document.getElementById('quest-card-tools');
    const barTools = document.getElementById('quest-bar-tools');
    const labelTools = document.getElementById('quest-label-tools');
    if (cardTools && barTools && labelTools) {
      const pct = toolsComplete ? 100 : 0;
      barTools.style.width = pct + '%';
      labelTools.textContent = toolsComplete ? '1 / 1 Note Saved' : '0 / 1 Notes';
      cardTools.classList.toggle('completed', toolsComplete);
    }
  }

  // --- Constellation Skill Tree Engine ---
  function renderConstellation() {
    const container = document.getElementById('constellation-nodes-container');
    if (!container) return;

    container.innerHTML = '';

    const filtered = CURATED_STANDARDS_NODES.filter(node => {
      const matchSub = node.subject === currentSubject;
      const matchBand = (currentBand === 'all') || (node.band === currentBand);
      return matchSub && matchBand;
    });

    if (filtered.length === 0) {
      container.innerHTML = `
        <div style="grid-column: 1 / -1; text-align: center; color: #94a3b8; padding: 2rem;">
          No standard nodes found for this filter combination. Try selecting "All Grade Bands".
        </div>
      `;
      return;
    }

    filtered.forEach(node => {
      const score = userMastery[node.code] || 0;
      let statusClass = 'discovered';
      let statusLabel = 'Ready to Learn';

      if (score >= 80) {
        statusClass = 'mastered';
        statusLabel = `Mastered (${score}%)`;
      } else if (score > 0) {
        statusClass = 'progress';
        statusLabel = `Practicing (${score}%)`;
      }

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `skill-node-btn ${statusClass}`;
      btn.setAttribute('aria-label', `Standard ${node.code}: ${node.title}. Status: ${statusLabel}`);

      btn.innerHTML = `
        <div class="node-halo" aria-hidden="true">
          <i class="fas ${node.icon}"></i>
        </div>
        <span class="node-code">${node.code}</span>
        <span class="node-title">${node.title}</span>
        <span class="node-mastery-pill">${statusLabel}</span>
      `;

      btn.addEventListener('click', () => openModal(node, score));

      container.appendChild(btn);
    });
  }

  // --- Heraldic Badges Showcase ---
  function renderBadges() {
    const grid = document.getElementById('badges-showcase-grid');
    if (!grid) return;

    grid.innerHTML = '';

    BADGES_DATABASE.forEach(b => {
      const isUnlocked = b.check(userMastery, userProfile, gamificationProfile);
      const card = document.createElement('div');
      card.className = `badge-crest-card ${isUnlocked ? 'unlocked' : 'locked'}`;
      card.setAttribute('role', 'listitem');

      card.innerHTML = `
        <div class="crest-shield" aria-hidden="true">
          <i class="fas ${b.icon}"></i>
        </div>
        <div class="crest-info">
          <h3 class="crest-name">${b.title}</h3>
          <p class="crest-desc">${b.desc}</p>
          <span class="crest-status">${isUnlocked ? '★ UNLOCKED' : '🔒 IN PROGRESS'}</span>
        </div>
      `;

      grid.appendChild(card);
    });
  }

  // --- Modal Controller ---
  function openModal(node, score) {
    const modal = document.getElementById('skill-node-modal');
    if (!modal) return;

    document.getElementById('modal-standard-code').textContent = node.code;
    document.getElementById('modal-standard-title').textContent = node.title;
    document.getElementById('modal-standard-band').textContent = `Grade: ${node.grade} • Domain: ${node.domain}`;
    document.getElementById('modal-standard-desc').textContent = node.desc;

    const exemplarEl = document.getElementById('modal-exemplar-content');
    if (exemplarEl) {
      exemplarEl.innerHTML = node.exemplar;
      safeTypeset(exemplarEl);
    }

    const masteryEl = document.getElementById('modal-user-mastery');
    if (masteryEl) {
      if (score >= 80) {
        masteryEl.textContent = `Mastered (${score}%) 🌟`;
        masteryEl.style.color = '#f59e0b';
      } else if (score > 0) {
        masteryEl.textContent = `In Progress (${score}%) 🔷`;
        masteryEl.style.color = '#38bdf8';
      } else {
        masteryEl.textContent = `Not Started (0%) ⚪`;
        masteryEl.style.color = '#94a3b8';
      }
    }

    const lessonBtn = document.getElementById('modal-launch-lesson-btn');
    if (lessonBtn && node.lessonUrl) {
      lessonBtn.href = node.lessonUrl;
    }

    const quizBtn = document.getElementById('modal-launch-quiz-btn');
    if (quizBtn) {
      quizBtn.href = `/assessment/diagnostic.php?standard=${encodeURIComponent(node.code)}`;
    }

    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    const closeBtn = document.getElementById('modal-close-btn');
    if (closeBtn) setTimeout(() => closeBtn.focus(), 60);
  }

  function closeModal() {
    const modal = document.getElementById('skill-node-modal');
    if (!modal) return;

    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  // --- Event Bindings ---
  function initEvents() {
    // Subject Buttons
    const subjectBtns = document.querySelectorAll('.tree-subject-btn');
    subjectBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        subjectBtns.forEach(b => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
        currentSubject = btn.getAttribute('data-subject');
        renderConstellation();
      });
    });

    // Grade Band Select
    const gradeSelect = document.getElementById('tree-grade-select');
    if (gradeSelect) {
      gradeSelect.addEventListener('change', (e) => {
        currentBand = e.target.value;
        renderConstellation();
      });
    }

    // Modal Close
    const closeBtn = document.getElementById('modal-close-btn');
    if (closeBtn) closeBtn.addEventListener('click', closeModal);

    const modal = document.getElementById('skill-node-modal');
    if (modal) {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
      });
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
        closeModal();
      }
    });

    // Cross-tab data sync
    window.addEventListener('storage', (e) => {
      if (['hesten_standards_mastery', 'hesten-user-profile', 'hl_gamification_profile', 'hl_daily_quests'].includes(e.key)) {
        loadStorageData();
        renderHUD();
        renderQuests();
        renderConstellation();
        renderBadges();
      }
    });

    window.addEventListener('hl:data-sync', () => {
      loadStorageData();
      renderHUD();
      renderQuests();
      renderConstellation();
      renderBadges();
    });
  }

  // --- Init on DOM Load ---
  document.addEventListener('DOMContentLoaded', () => {
    loadStorageData();
    initEvents();
    renderHUD();
    renderQuests();
    renderConstellation();
    renderBadges();
  });

})();
