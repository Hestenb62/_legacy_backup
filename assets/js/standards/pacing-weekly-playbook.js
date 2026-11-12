/**
 * Hesten's Learning - Wave Weekly Playbook & Differentiation Engine
 * Provides interactive weekly blueprints, pedagogical pacing suggestions,
 * Lexile-aligned library resources, on-the-fly grade/Lexile customization,
 * and 1-click printable PDF weekly lesson packets for all 48 Wave weeks.
 * 
 * 100% Dependency-free, WCAG 2.1/2.2 AA/AAA compliant.
 */

(function (window) {
  'use strict';

  // Storage Keys
  const STORAGE_KEY_PLAYBOOK_LEXILE = 'hl_playbook_lexile';
  const STORAGE_KEY_PLAYBOOK_PACING = 'hl_playbook_pacing';

  // Default Lexile band mapped by grade
  const GRADE_LEXILE_DEFAULTS = {
    'pre-k': 'br-200',
    'k':     'br-200',
    '1':     '210-400',
    '2':     '410-600',
    '3':     '610-800',
    '4':     '610-800',
    '5':     '810-1000',
    '6':     '810-1000',
    '7':     '1010-1200',
    '8':     '1010-1200',
    'hs':    '1200-plus'
  };

  // Curated Lexile Bands
  const LEXILE_BANDS = [
    { id: 'br-200',    label: 'BR – 200L (Beginning Reader / Decodables)', min: 0, max: 200 },
    { id: '210-400',   label: '210L – 400L (Early Elementary / Grade 1–2)', min: 210, max: 400 },
    { id: '410-600',   label: '410L – 600L (Transitional / Grade 2–3)', min: 410, max: 600 },
    { id: '610-800',   label: '610L – 800L (Intermediate / Grade 3–5)', min: 610, max: 800 },
    { id: '810-1000',  label: '810L – 1000L (Advanced Intermediate / Grade 6–8)', min: 810, max: 1000 },
    { id: '1010-1200', label: '1010L – 1200L (Secondary Scholastic / Grade 9–10)', min: 1010, max: 1200 },
    { id: '1200-plus', label: '1200L+ (Advanced Secondary / Honors / Grade 11–12)', min: 1200, max: 2000 }
  ];

  // Curated Digital Library Books Catalog (Indexed by Lexile Bands)
  const LIBRARY_BOOKS_CATALOG = {
    'br-200': [
      {
        id: 'aesop-tortoise-hare',
        title: 'The Tortoise and the Hare',
        author: 'Aesop',
        lexile: '180L',
        category: 'Classic Fables',
        desc: 'Classic fable demonstrating perseverance, pacing, and steady focus over hasty overconfidence.',
        link: '/library/read/index.php?book=aesop-fables'
      },
      {
        id: 'phonics-decodable-1',
        title: 'Word Family Adventures: Short Vowels & CVC',
        author: 'Hesten\'s Phonics Guild',
        lexile: '150L',
        category: 'Early Decodables',
        desc: 'Engaging, beautifully illustrated short vowel word family decodable tales with syllable tracking.',
        link: '/library/'
      },
      {
        id: 'tale-of-peter-rabbit',
        title: 'The Tale of Peter Rabbit',
        author: 'Beatrix Potter',
        lexile: '200L',
        category: 'Early Childhood Literature',
        desc: 'Rich vocabulary and playful narrative following Peter through Mr. McGregor\'s vegetable garden.',
        link: '/library/read/index.php?book=peter-rabbit'
      }
    ],
    '210-400': [
      {
        id: 'aesop-lion-mouse',
        title: 'The Lion and the Mouse & Other Fables',
        author: 'Aesop',
        lexile: '280L',
        category: 'Classic Fables',
        desc: 'Timeless moral tales illustrating that even the smallest creature can assist the mighty king of beasts.',
        link: '/library/read/index.php?book=aesop-fables'
      },
      {
        id: 'nature-weather-wonders',
        title: 'Weather Wonders: Clouds, Rain & Seasons',
        author: 'National Science Guild',
        lexile: '340L',
        category: 'Science Non-Fiction',
        desc: 'Visual exploration of the water cycle, atmospheric changes, and how plants adapt across seasons.',
        link: '/library/'
      },
      {
        id: 'cinderella-brothers-grimm',
        title: 'Cinderella and Classic Tales',
        author: 'Brothers Grimm',
        lexile: '390L',
        category: 'Folk & Fairy Tales',
        desc: 'Foundational folk narrative exploring kindness, adversity, and justice with character analysis prompts.',
        link: '/library/read/index.php?book=grimms-fairy-tales'
      }
    ],
    '410-600': [
      {
        id: 'velveteen-rabbit',
        title: 'The Velveteen Rabbit',
        author: 'Margery Williams',
        lexile: '510L',
        category: 'Classic Children\'s Literature',
        desc: 'Poignant story exploring love, nursery magic, and becoming "Real" through devoted companionship.',
        link: '/library/read/index.php?book=velveteen-rabbit'
      },
      {
        id: 'just-so-stories',
        title: 'Just So Stories',
        author: 'Rudyard Kipling',
        lexile: '580L',
        category: 'Origin Tales & Myths',
        desc: 'Imaginative origin narratives describing how the camel got his hump, the leopard spots, and more.',
        link: '/library/read/index.php?book=just-so-stories'
      },
      {
        id: 'inventions-that-changed-world',
        title: 'Young Inventors & Scientific Pioneers',
        author: 'Hesten Discovery Press',
        lexile: '560L',
        category: 'Biography & STEM',
        desc: 'Biographies of Marie Curie, George Washington Carver, and Thomas Edison and their experimental methods.',
        link: '/library/'
      }
    ],
    '610-800': [
      {
        id: 'secret-garden',
        title: 'The Secret Garden',
        author: 'Frances Hodgson Burnett',
        lexile: '710L',
        category: 'Classic Fiction',
        desc: 'Transformative tale of Mary Lennox, nature\'s healing power, and revitalizing an abandoned garden.',
        link: '/library/read/index.php?book=secret-garden'
      },
      {
        id: 'alices-adventures',
        title: 'Alice\'s Adventures in Wonderland',
        author: 'Lewis Carroll',
        lexile: '740L',
        category: 'Fantasy & Literary Wordplay',
        desc: 'Surreal journey packed with logic puzzles, whimsical satire, and masterclass figurative language.',
        link: '/library/read/index.php?book=alices-adventures'
      },
      {
        id: 'wind-in-the-willows',
        title: 'The Wind in the Willows',
        author: 'Kenneth Grahame',
        lexile: '790L',
        category: 'Classic Literature',
        desc: 'Gentle exploration of friendship, loyalty, and rural adventure featuring Mole, Ratty, and Mr. Toad.',
        link: '/library/read/index.php?book=wind-in-the-willows'
      }
    ],
    '810-1000': [
      {
        id: 'call-of-the-wild',
        title: 'The Call of the Wild',
        author: 'Jack London',
        lexile: '880L',
        category: 'Adventure & Realism',
        desc: 'Buck\'s transition from domestic pet to sled dog leader in the harsh Klondike Gold Rush wilderness.',
        link: '/library/read/index.php?book=call-of-the-wild'
      },
      {
        id: 'treasure-island',
        title: 'Treasure Island',
        author: 'Robert Louis Stevenson',
        lexile: '920L',
        category: 'Adventure & Historical Fiction',
        desc: 'The definitive tale of buccaneers, mutiny on the Hispaniola, and Long John Silver\'s scheming intellect.',
        link: '/library/read/index.php?book=treasure-island'
      },
      {
        id: 'christmas-carol',
        title: 'A Christmas Carol',
        author: 'Charles Dickens',
        lexile: '890L',
        category: 'Social Commentary & Novella',
        desc: 'Ebenezer Scrooge\'s moral awakening guided by the ghosts of Christmas Past, Present, and Yet to Come.',
        link: '/library/read/index.php?book=a-christmas-carol'
      },
      {
        id: 'time-machine',
        title: 'The Time Machine',
        author: 'H.G. Wells',
        lexile: '940L',
        category: 'Science Fiction',
        desc: 'Pioneering speculative fiction following the Time Traveller into the year 802,701 AD to encounter the Eloi and Morlocks.',
        link: '/library/read/index.php?book=the-time-machine'
      }
    ],
    '1010-1200': [
      {
        id: '1984',
        title: '1984',
        author: 'George Orwell',
        lexile: '1090L',
        category: 'Dystopian Classic',
        desc: 'A cautionary masterpiece exploring surveillance states, historical revisionism, Newspeak, and psychological control.',
        link: '/library/read/index.php?book=1984'
      },
      {
        id: 'pride-and-prejudice',
        title: 'Pride and Prejudice',
        author: 'Jane Austen',
        lexile: '1060L',
        category: 'Classic British Literature',
        desc: 'Sparkling romance of manners exploring societal expectations, pride, and the growth of Elizabeth Bennet and Mr. Darcy.',
        link: '/library/read/index.php?book=pride-and-prejudice'
      },
      {
        id: 'tell-tale-heart-poe',
        title: 'The Tell-Tale Heart & Selected Gothic Tales',
        author: 'Edgar Allan Poe',
        lexile: '1030L',
        category: 'Gothic Literature & Psychology',
        desc: 'Unreliable narrators, gothic tension, auditory symbolism, and psychological unraveling in classic American fiction.',
        link: '/library/?page=the-tell-tale-heart'
      },
      {
        id: 'frankenstein',
        title: 'Frankenstein',
        author: 'Mary Shelley',
        lexile: '1110L',
        category: 'Romantic & Science Fiction',
        desc: 'Victor Frankenstein\'s hubris, the creation of synthetic life, and profound ethical questions regarding responsibility.',
        link: '/library/read/index.php?book=frankenstein'
      },
      {
        id: 'oedipus-the-king',
        title: 'Oedipus the King',
        author: 'Sophocles',
        lexile: '1080L',
        category: 'Classical Drama & Tragedy',
        desc: 'Foundational Greek dramatic tragedy examining fate, moral hubris, dramatic irony, and self-knowledge.',
        link: '/library/?page=oedipus-the-king'
      }
    ],
    '1200-plus': [
      {
        id: 'romeo-and-juliet',
        title: 'The Tragedy of Romeo and Juliet',
        author: 'William Shakespeare',
        lexile: '1240L',
        category: 'Renaissance Drama',
        desc: 'Shakespeare\'s iconic tragic drama featuring poetic verse, iambic pentameter, feud politics, and star-crossed love.',
        link: '/library/?page=the-tragedy-of-romeo-and-juliet'
      },
      {
        id: 'federalist-papers',
        title: 'The Federalist Papers (Selected Essays)',
        author: 'Alexander Hamilton, James Madison, John Jay',
        lexile: '1310L',
        category: 'Primary Sources & Political Philosophy',
        desc: 'Arguments defining separation of powers, the representative republic, checks and balances, and civic liberty.',
        link: '/library/'
      },
      {
        id: 'walden-civil-disobedience',
        title: 'Walden & Civil Disobedience',
        author: 'Henry David Thoreau',
        lexile: '1280L',
        category: 'Transcendentalist Philosophy',
        desc: 'Exploration of deliberate living, self-reliance, nature philosophy, and moral resistance to unjust authority.',
        link: '/library/read/index.php?book=walden'
      },
      {
        id: 'the-scarlet-letter',
        title: 'The Scarlet Letter',
        author: 'Nathaniel Hawthorne',
        lexile: '1260L',
        category: 'Historical Romance & Symbolism',
        desc: 'Puritan New England morality, sin, guilt, public shame, and the redemptive dignity of Hester Prynne.',
        link: '/library/read/index.php?book=the-scarlet-letter'
      }
    ]
  };

  // Pacing Rhythm Profiles
  const PACING_PROFILES = {
    'standard': {
      label: 'Standard Spiral (45m Focus / 15m Break)',
      desc: 'Balanced instructional progression with equal time for teacher modeling, guided practice, and independent application.',
      dailyTime: '45 mins core focus + 15 mins review',
      breakRhythm: 'Standard mid-session 10-minute mental reset',
      udlAccommodations: 'Visual checklists, interactive digital scratchpads, clear rubric targets.',
      challengeLevel: 'Standard Grade-Level CCSS/NGSS Mastery (80%+ target)'
    },
    'accelerated': {
      label: 'Accelerated Deep-Dive (Compacted Practice & Inquiry)',
      desc: 'Compacts repetitive procedural practice to provide room for open-ended synthesis, peer teaching, and advanced lab experiments.',
      dailyTime: '55 mins self-directed deep focus',
      breakRhythm: 'Self-selected focus sprints with project milestones',
      udlAccommodations: 'Non-routine problem extensions, primary source document critique, cross-disciplinary STEM synthesis.',
      challengeLevel: 'Advanced Honors & Mastery Capstone (90%+ target)'
    },
    'scaffolded': {
      label: 'Scaffolded & Low-Anxiety (20m Chunks & Untimed Mode)',
      desc: 'Designed for neurodivergent learners (ADHD, Dyslexia, Anxiety). Breaks problem sets into 5-question micro-milestones and removes countdown clocks.',
      dailyTime: '20-25 mins focused micro-blocks',
      breakRhythm: 'Structured 5-10 minute movement, water, or sensory reset',
      udlAccommodations: 'OpenDyslexic typeface, high-contrast mode, bimodal text-to-speech audio, line reading ruler, and untimed practice.',
      challengeLevel: 'Competency-First Micro-Milestones'
    },
    'intensive': {
      label: 'Intensive 1-on-1 Support (High Manipulatives & CRA)',
      desc: 'Tier 3 explicit direct instruction utilizing the Concrete-Representational-Abstract (CRA) model and multisensory phonetic reinforcement.',
      dailyTime: '15-20 mins highly structured 1-on-1 intervals',
      breakRhythm: 'Immediate positive reinforcement and kinesthetic reset',
      udlAccommodations: 'Physical and virtual math manipulatives (ten-frames, base-10 blocks), colorized dyscalculia cues, speech dictation.',
      challengeLevel: 'Targeted Remediation & Foundational Confidence'
    }
  };

  // Active Playbook State
  let activeState = {
    fiscalWeek: 1,
    waveNum: 1,
    waveWeek: 1,
    gradeKey: '3',
    lexileBand: '610-800',
    pacingModel: 'standard',
    isSynthesis: false,
    weekData: null
  };

  /**
   * Open Wave Week Playbook Modal
   * @param {number|string} fiscalWeek Global fiscal week (1 to 48)
   * @param {string} [gradeKey] Optional grade level override
   */
  window.openWaveWeekPlaybook = function (fiscalWeek, gradeKey) {
    const fWeek = parseInt(fiscalWeek, 10) || 1;
    const gKey = gradeKey || localStorage.getItem('hl_pacing_grade') || '3';

    activeState.fiscalWeek = fWeek;
    activeState.gradeKey = gKey;
    activeState.waveNum = Math.floor((fWeek - 1) / 8) + 1;
    activeState.waveWeek = ((fWeek - 1) % 8) + 1;
    activeState.isSynthesis = activeState.waveWeek === 8;

    // Load stored Lexile or use grade default
    const storedLexile = localStorage.getItem(STORAGE_KEY_PLAYBOOK_LEXILE);
    activeState.lexileBand = storedLexile || GRADE_LEXILE_DEFAULTS[gKey] || '610-800';

    // Load stored pacing rhythm or use standard
    const storedPacing = localStorage.getItem(STORAGE_KEY_PLAYBOOK_PACING);
    activeState.pacingModel = storedPacing || 'standard';

    // Resolve curriculum week item
    hydrateActiveWeekData();

    // Render modal UI
    renderPlaybookModal();

    // Show modal dialog
    const modal = document.getElementById('modal-wave-week-playbook');
    if (modal) {
      modal.style.display = 'flex';
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';

      // Focus first interactive control for a11y
      const firstInput = modal.querySelector('button, select, [tabindex="0"]');
      if (firstInput) firstInput.focus();
    }
  };

  /**
   * Close Wave Week Playbook Modal
   */
  window.closeWaveWeekPlaybook = function () {
    const modal = document.getElementById('modal-wave-week-playbook');
    if (modal) {
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
  };

  /**
   * Hydrates active week data from curriculum registry
   */
  function hydrateActiveWeekData() {
    let plan = [];
    if (typeof window.buildGradePacingSchedule === 'function') {
      plan = window.buildGradePacingSchedule(activeState.gradeKey, 'wave');
    }
    const match = plan.find(item => item.fiscalWeek === activeState.fiscalWeek);

    if (match) {
      activeState.weekData = match;
    } else {
      activeState.weekData = {
        wave: activeState.waveNum,
        waveWeek: activeState.waveWeek,
        fiscalWeek: activeState.fiscalWeek,
        fiscalDates: `Wave ${activeState.waveNum} Week ${activeState.waveWeek}`,
        title: `Grade ${activeState.gradeKey.toUpperCase()} Core Curricular Unit`,
        desc: 'Comprehensive multi-disciplinary instruction aligning standards with authentic problem sets.',
        standard: 'CCSS.CORE',
        lesson: '/library/',
        checkpoint: 'CHECKPOINT',
        isSynthesis: activeState.isSynthesis
      };
    }
  }

  /**
   * Handle changes in on-the-fly differentiation controls
   */
  window.handlePlaybookDifferentiationChange = function () {
    const gradeSelect = document.getElementById('playbook-grade-select');
    const lexileSelect = document.getElementById('playbook-lexile-select');
    const pacingSelect = document.getElementById('playbook-pacing-select');

    if (gradeSelect) {
      const prevGrade = activeState.gradeKey;
      activeState.gradeKey = gradeSelect.value;
      if (prevGrade !== activeState.gradeKey) {
        // If grade changed, update recommended lexile
        activeState.lexileBand = GRADE_LEXILE_DEFAULTS[activeState.gradeKey] || '610-800';
        if (lexileSelect) lexileSelect.value = activeState.lexileBand;
      }
    }

    if (lexileSelect) {
      activeState.lexileBand = lexileSelect.value;
      try { localStorage.setItem(STORAGE_KEY_PLAYBOOK_LEXILE, activeState.lexileBand); } catch (e) {}
    }

    if (pacingSelect) {
      activeState.pacingModel = pacingSelect.value;
      try { localStorage.setItem(STORAGE_KEY_PLAYBOOK_PACING, activeState.pacingModel); } catch (e) {}
    }

    hydrateActiveWeekData();
    renderPlaybookDynamicContent();
  };

  /**
   * Render complete Playbook Modal UI
   */
  function renderPlaybookModal() {
    const meta = (window.GRADE_PACING_METADATA && window.GRADE_PACING_METADATA[activeState.gradeKey]) || { name: `Grade ${activeState.gradeKey}`, level: 'e' };
    const wData = activeState.weekData;

    // Header updates
    const titleEl = document.getElementById('playbook-modal-title');
    const subtitleEl = document.getElementById('playbook-modal-subtitle');
    if (titleEl) {
      titleEl.innerHTML = `
        <span class="playbook-badge-wave">Wave ${activeState.waveNum} • Wk ${activeState.waveWeek}</span>
        ${escapeHtml(wData.title)}
      `;
    }
    if (subtitleEl) {
      subtitleEl.innerHTML = `
        <i class="fas fa-calendar-alt"></i> Fiscal Window: <strong>${escapeHtml(wData.fiscalDates)}</strong> &bull;
        Target: <strong>${escapeHtml(meta.name)} (Level ${escapeHtml(meta.level.toUpperCase())})</strong> &bull;
        Type: <strong>${activeState.isSynthesis ? 'Synthesis Testing & Planning' : 'Instructional Immersion'}</strong>
      `;
    }

    // Populate Selector Dropdowns
    populateDifferentiationToolbar();

    // Render Dynamic Content Panels
    renderPlaybookDynamicContent();
  }

  /**
   * Populate Toolbar Selectors
   */
  function populateDifferentiationToolbar() {
    const gradeSelect = document.getElementById('playbook-grade-select');
    const lexileSelect = document.getElementById('playbook-lexile-select');
    const pacingSelect = document.getElementById('playbook-pacing-select');

    if (gradeSelect) {
      gradeSelect.value = activeState.gradeKey;
    }

    if (lexileSelect) {
      lexileSelect.innerHTML = LEXILE_BANDS.map(b => `
        <option value="${b.id}" ${b.id === activeState.lexileBand ? 'selected' : ''}>
          ${escapeHtml(b.label)}
        </option>
      `).join('');
    }

    if (pacingSelect) {
      pacingSelect.value = activeState.pacingModel;
    }
  }

  /**
   * Render Dynamic Body Content (What to do, Pacing Suggestions, Library, Print Sheet)
   */
  function renderPlaybookDynamicContent() {
    const container = document.getElementById('playbook-dynamic-content');
    if (!container) return;

    const meta = (window.GRADE_PACING_METADATA && window.GRADE_PACING_METADATA[activeState.gradeKey]) || { name: `Grade ${activeState.gradeKey}`, level: 'e' };
    const wData = activeState.weekData;
    const pacingProfile = PACING_PROFILES[activeState.pacingModel] || PACING_PROFILES['standard'];
    const libraryBooks = LIBRARY_BOOKS_CATALOG[activeState.lexileBand] || LIBRARY_BOOKS_CATALOG['610-800'];

    const isSynthesis = activeState.isSynthesis;

    // Daily breakdown for this week
    const dailySchedule = isSynthesis
      ? generateSynthesisDailyTasks(meta, wData)
      : generateImmersionDailyTasks(meta, wData);

    let html = `
      <!-- TOP STATUS STRIP -->
      <div class="playbook-status-strip ${isSynthesis ? 'strip-synthesis' : 'strip-immersion'}">
        <div class="status-strip-left">
          <i class="fas ${isSynthesis ? 'fa-clipboard-check' : 'fa-compass'}"></i>
          <div>
            <strong>${isSynthesis ? 'Wave ' + activeState.waveNum + ' Synthesis & Diagnostic Exam Week' : 'Core Instructional Immersion (Week ' + activeState.waveWeek + ' of 7)'}</strong>
            <p>${escapeHtml(wData.desc)}</p>
          </div>
        </div>
        <div class="status-strip-right">
          <span class="pacing-standard-badge" style="font-size: 0.85rem; padding: 0.35rem 0.75rem;">
            <i class="fas fa-bookmark"></i> Standard: ${escapeHtml(wData.standard)}
          </span>
        </div>
      </div>

      <!-- MAIN 2-COLUMN PLAYBOOK GRID -->
      <div class="playbook-main-grid">

        <!-- COLUMN 1: WHAT SHOULD BE DONE (DAILY MONDAY TO FRIDAY PLAN) -->
        <div class="playbook-col-tasks">
          <div class="playbook-panel-header">
            <h3><i class="fas fa-tasks text-emerald-600"></i> What Should Be Done This Week</h3>
            <span class="panel-header-badge">${isSynthesis ? '5-Day Synthesis Roadmap' : 'Monday–Friday Immersion Plan'}</span>
          </div>

          <div class="playbook-daily-list">
            ${dailySchedule.map(day => `
              <div class="playbook-daily-item ${day.isHighlight ? 'day-highlight' : ''}">
                <div class="daily-item-header">
                  <span class="daily-item-day">${escapeHtml(day.day)}</span>
                  <span class="daily-item-tag ${escapeHtml(day.tagClass)}">${escapeHtml(day.tag)}</span>
                </div>
                <h4 class="daily-item-title">${escapeHtml(day.title)}</h4>
                <p class="daily-item-desc">${escapeHtml(day.desc)}</p>
                <div class="daily-item-action">
                  <span class="daily-item-action-label"><i class="fas fa-check-circle"></i> Objective:</span>
                  <span>${escapeHtml(day.action)}</span>
                </div>
              </div>
            `).join('')}
          </div>
        </div>

        <!-- COLUMN 2: PACING SUGGESTIONS & DIFFERENTIATED SCAFFOLDS -->
        <div class="playbook-col-pacing">
          <div class="playbook-panel-header">
            <h3><i class="fas fa-sliders-h text-indigo-600"></i> Pacing Suggestions &amp; Scaffolding</h3>
            <span class="panel-header-badge">${escapeHtml(pacingProfile.label.split('(')[0])}</span>
          </div>

          <!-- Pacing Rhythm Card -->
          <div class="playbook-pacing-card">
            <h4 class="pacing-card-title"><i class="fas fa-clock text-amber-500"></i> Daily Time &amp; Focus Rhythm</h4>
            <div class="pacing-detail-row">
              <span class="pacing-detail-label">Daily Focus Block:</span>
              <span class="pacing-detail-val">${escapeHtml(pacingProfile.dailyTime)}</span>
            </div>
            <div class="pacing-detail-row">
              <span class="pacing-detail-label">Sensory Reset:</span>
              <span class="pacing-detail-val">${escapeHtml(pacingProfile.breakRhythm)}</span>
            </div>
            <div class="pacing-detail-row">
              <span class="pacing-detail-label">Target Standard:</span>
              <span class="pacing-detail-val">${escapeHtml(pacingProfile.challengeLevel)}</span>
            </div>
            <p class="pacing-card-desc">${escapeHtml(pacingProfile.desc)}</p>
          </div>

          <!-- Neurodiversity & UDL Accommodations Box -->
          <div class="playbook-udl-card">
            <h4 class="udl-card-title"><i class="fas fa-universal-access text-teal-600"></i> Recommended Accommodations</h4>
            <p class="udl-card-text">${escapeHtml(pacingProfile.udlAccommodations)}</p>
            <ul class="udl-card-list">
              <li><strong>Dyslexia / Visual Reading:</strong> Toggle OpenDyslexic font and line reading ruler from the top accessibility menu.</li>
              <li><strong>Auditory Decoding:</strong> Enable built-in TTS audio speech synthesis across all reading lessons and worksheets.</li>
              <li><strong>Sensory Hygiene:</strong> Schedule 20-20-20 screen pauses (20 seconds looking 20 feet away every 20 minutes).</li>
            </ul>
          </div>

          <!-- Curated Digital Library Resources -->
          <div class="playbook-library-section">
            <div class="playbook-panel-header" style="margin-bottom: 0.75rem;">
              <h3 style="font-size: 1rem;"><i class="fas fa-book-reader text-purple-600"></i> Curated Library Literature (${escapeHtml(activeState.lexileBand.toUpperCase())})</h3>
            </div>

            <div class="playbook-books-list">
              ${libraryBooks.map(book => `
                <div class="playbook-book-card">
                  <div class="book-card-main">
                    <div class="book-card-info">
                      <span class="book-card-lexile">${escapeHtml(book.lexile)}</span>
                      <h5 class="book-card-title">${escapeHtml(book.title)}</h5>
                      <span class="book-card-author">by ${escapeHtml(book.author)} &bull; ${escapeHtml(book.category)}</span>
                      <p class="book-card-desc">${escapeHtml(book.desc)}</p>
                    </div>
                  </div>
                  <div class="book-card-action">
                    <a href="${book.link}" target="_blank" class="book-open-btn">
                      <i class="fas fa-book-open"></i> Read Book
                    </a>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>

        </div>

      </div>

      <!-- PRINTABLE BLUEPRINT EMBED (Rendered on 1-Click Print) -->
      <div id="playbook-print-sheet" class="playbook-print-sheet">
        <div class="print-sheet-header">
          <div class="print-sheet-brand">
            <h2>Hesten's Learning &bull; Weekly Lesson Blueprint</h2>
            <p>Fiscal Wave ${activeState.waveNum} &bull; Week ${activeState.waveWeek} (Fiscal Week ${activeState.fiscalWeek}) &bull; ${escapeHtml(wData.fiscalDates)}</p>
          </div>
          <div class="print-sheet-meta-box">
            <div><strong>Student Name:</strong> _______________________</div>
            <div><strong>Academic Grade:</strong> ${escapeHtml(meta.name)} (Level ${escapeHtml(meta.level.toUpperCase())})</div>
            <div><strong>Reading Lexile:</strong> ${escapeHtml(activeState.lexileBand.toUpperCase())}</div>
            <div><strong>Pacing Style:</strong> ${escapeHtml(pacingProfile.label.split('(')[0])}</div>
          </div>
        </div>

        <div class="print-sheet-mission">
          <strong>Weekly Focus Standard:</strong> ${escapeHtml(wData.standard)} &mdash; ${escapeHtml(wData.title)}<br>
          <em>${escapeHtml(wData.desc)}</em>
        </div>

        <table class="print-sheet-table">
          <thead>
            <tr>
              <th style="width: 15%;">Day</th>
              <th style="width: 30%;">Topic &amp; Instructional Focus</th>
              <th style="width: 45%;">Daily Action &amp; Student Objective</th>
              <th style="width: 10%; text-align: center;">Done</th>
            </tr>
          </thead>
          <tbody>
            ${dailySchedule.map(day => `
              <tr>
                <td><strong>${escapeHtml(day.day)}</strong><br><span style="font-size: 8pt; color: #555;">${escapeHtml(day.tag)}</span></td>
                <td><strong>${escapeHtml(day.title)}</strong><br><span style="font-size: 8pt;">${escapeHtml(day.desc)}</span></td>
                <td>${escapeHtml(day.action)}</td>
                <td style="text-align: center;"><div class="print-sheet-checkbox"></div></td>
              </tr>
            `).join('')}
          </tbody>
        </table>

        <div class="print-sheet-library">
          <strong>Assigned Library Literature (${escapeHtml(activeState.lexileBand.toUpperCase())}):</strong>
          <ul>
            ${libraryBooks.slice(0, 3).map(b => `<li><strong>${escapeHtml(b.title)}</strong> by ${escapeHtml(b.author)} (${escapeHtml(b.lexile)}) &mdash; ${escapeHtml(b.desc)}</li>`).join('')}
          </ul>
        </div>

        <div class="print-sheet-footer">
          <div>Parent / Educator Signature: __________________________________</div>
          <div>Date Completed: ___________________</div>
        </div>
      </div>
    `;

    container.innerHTML = html;
  }

  /**
   * Generates Monday to Friday tasks for regular Instructional Immersion weeks (Weeks 1 to 7)
   */
  function generateImmersionDailyTasks(meta, wData) {
    return [
      {
        day: 'Monday',
        tag: 'Concept Launch',
        tagClass: 'tag-blue',
        title: 'Conceptual Launch & Visual Concrete Modeling',
        desc: `Introduce the core standard (${wData.standard}) using interactive visual representations, concrete manipulatives, and essential vocabulary anchor charts.`,
        action: 'Complete interactive introduction module and record 3 key mathematical/linguistic observations in learning notebook.',
        isHighlight: false
      },
      {
        day: 'Tuesday',
        tag: 'Guided Practice',
        tagClass: 'tag-purple',
        title: 'Guided Problem Solving & Close Reading Analysis',
        desc: `Work through step-by-step worked examples. Engage in guided text-dependent analysis and structured scaffolding with immediate feedback.`,
        action: 'Solve 6-8 guided problem sets with digital scratchpad notes; complete targeted close reading questions.',
        isHighlight: false
      },
      {
        day: 'Wednesday',
        tag: 'Hands-on Lab',
        tagClass: 'tag-teal',
        title: 'Inquiry Investigation, Science Lab or STEM Application',
        desc: `Apply theoretical concepts into a real-world scientific inquiry lab, geometrical spatial construction, or historical primary source examination.`,
        action: 'Formulate a Claim-Evidence-Reasoning (CER) hypothesis and record observation data tables.',
        isHighlight: true
      },
      {
        day: 'Thursday',
        tag: 'Fluency Sprint',
        tagClass: 'tag-amber',
        title: 'Targeted Speed Sprint & Synthesizing Quick Write',
        desc: `Conduct a rapid 60-Second Fluency Sprint to build automaticity and confidence, followed by a synthesizing analytical Quick Write response.`,
        action: 'Score sprint accuracy and draft a 5-sentence evidence-based Quick Write response.',
        isHighlight: false
      },
      {
        day: 'Friday',
        tag: 'Mastery Exit Ticket',
        tagClass: 'tag-green',
        title: 'Formative Mastery Checkpoint & Self-Reflection',
        desc: `Complete a 10-question standard exit assessment to verify concept mastery (80%+ goal) and document reflections in honors portfolio.`,
        action: 'Take assessment check, review missed questions with teacher keys, and check off weekly milestone.',
        isHighlight: true
      }
    ];
  }

  /**
   * Generates Monday to Friday tasks for Synthesis Weeks (Week 8)
   */
  function generateSynthesisDailyTasks(meta, wData) {
    return [
      {
        day: 'Monday',
        tag: 'Audit & Catch-Up',
        tagClass: 'tag-blue',
        title: 'Incomplete Work Audit & Portfolio Curation',
        desc: `Review all coursework completed during Weeks 1 through 7 of Wave ${activeState.waveNum}. Identify open practice packets, unsubmitted lab reports, or unfinished reading logs.`,
        action: 'Complete any pending worksheets and organize student binder or digital honors portfolio.',
        isHighlight: false
      },
      {
        day: 'Tuesday',
        tag: 'Remediation Clinic',
        tagClass: 'tag-purple',
        title: 'Targeted Remediation & Misconception Workshop',
        desc: `Deep dive into topics where the student scored below 80% on weekly exit tickets. Utilize tactile manipulatives and simplified alternative explanations.`,
        action: 'Re-attempt 5 targeted struggle problems with educator scaffolding until conceptual clarity is achieved.',
        isHighlight: false
      },
      {
        day: 'Wednesday',
        tag: 'Mastery Diagnostic',
        tagClass: 'tag-green',
        title: 'Wave ' + activeState.waveNum + ' Formative & Summative Milestone Exam',
        desc: `Administer the comprehensive Wave ${activeState.waveNum} diagnostic milestone assessment covering all CCSS Math, ELA, and Science standards explored across the 7 immersion weeks.`,
        action: 'Complete standard diagnostic exam in low-anxiety mode with accommodated timers as needed.',
        isHighlight: true
      },
      {
        day: 'Thursday',
        tag: 'Data Reflection',
        tagClass: 'tag-amber',
        title: 'Diagnostic Review, Scoring & Honors Gradebook Reflection',
        desc: `Analyze student score breakdown across standards. Celebrate mastered targets, update official letter grades, and record formative notes.`,
        action: 'Log standard mastery scores into student profile and teacher diagnostic roster.',
        isHighlight: false
      },
      {
        day: 'Friday',
        tag: 'Wave ' + (activeState.waveNum < 6 ? activeState.waveNum + 1 : 1) + ' Planning',
        tagClass: 'tag-teal',
        title: 'Next Wave Curriculum Planning & Accommodation Calibration',
        desc: `Dedicated planning window for educators and homeschool coaches to review upcoming Wave ${activeState.waveNum < 6 ? activeState.waveNum + 1 : 1} scope, pre-load library literature, and calibrate accommodations.`,
        action: 'Finalize next wave syllabi, set new reading Lexile goals, and print out upcoming weekly blueprints.',
        isHighlight: true
      }
    ];
  }

  /**
   * 1-Click Printable Weekly Blueprint Exporter
   */
  window.printWaveWeekBlueprint = function () {
    document.body.classList.add('printing-playbook');

    const handleAfterPrint = function () {
      document.body.classList.remove('printing-playbook');
      window.removeEventListener('afterprint', handleAfterPrint);
    };

    window.addEventListener('afterprint', handleAfterPrint);
    setTimeout(() => {
      window.print();
    }, 150);
  };

  /**
   * Helper to safely escape HTML strings
   */
  function escapeHtml(str) {
    if (str === null || str === undefined) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // Keyboard accessibility: ESC key closes playbook modal
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' || e.key === 'Esc') {
      const modal = document.getElementById('modal-wave-week-playbook');
      if (modal && modal.style.display !== 'none' && modal.style.display !== '') {
        window.closeWaveWeekPlaybook();
      }
    }
  });

})(typeof window !== 'undefined' ? window : this);

