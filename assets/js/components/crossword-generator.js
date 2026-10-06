/**
 * Crossword Puzzle Studio Engine
 * File: assets/js/components/crossword-generator.js
 * Interlocking crossword layout algorithm, interactive player,
 * keyboard accessibility runner, and 8.5" x 11" print formatter.
 */

(function (window, document) {
  'use strict';

  // --- Curated Academic Vocabulary Dictionaries with Real Pedagogical Clues ---
  const PRESET_DICTIONARIES = {
    'math-elem': {
      title: 'Elementary Math Concepts',
      desc: 'Foundational mathematics terms and definitions for Grades 1–5',
      pairs: [
        { word: 'ADDITION', clue: 'The mathematical process of combining two or more numbers' },
        { word: 'FRACTION', clue: 'A number that represents equal parts of a whole' },
        { word: 'GEOMETRY', clue: 'The branch of math dealing with shapes, sizes, and space' },
        { word: 'PERIMETER', clue: 'The total distance around the outside boundary of a closed shape' },
        { word: 'PRODUCT', clue: 'The answer obtained when two numbers are multiplied together' },
        { word: 'QUOTIENT', clue: 'The result obtained when one number is divided by another' },
        { word: 'DECIMAL', clue: 'A number that uses a dot to separate the whole number from the fractional part' },
        { word: 'POLYGON', clue: 'A flat, closed geometric figure bounded by three or more straight sides' },
        { word: 'SYMMETRY', clue: 'When one half of a shape is a mirror image of the other half' },
        { word: 'VERTEX', clue: 'The corner point where two or more straight lines or rays meet' }
      ]
    },
    'math-adv': {
      title: 'Algebra & Geometry Terms',
      desc: 'Middle and High School algebra, geometry, and coordinate systems',
      pairs: [
        { word: 'ALGEBRA', clue: 'A branch of mathematics that uses letters and symbols to represent numbers' },
        { word: 'VARIABLE', clue: 'A symbol, usually a letter, representing an unknown or changing quantity' },
        { word: 'EQUATION', clue: 'A mathematical statement showing that two expressions have equal value' },
        { word: 'EXPONENT', clue: 'A small raised number showing how many times a base is multiplied by itself' },
        { word: 'PARABOLA', clue: 'A symmetrical, U-shaped curved graph of a quadratic function' },
        { word: 'HYPOTENUSE', clue: 'The longest side of a right-angled triangle, opposite the right angle' },
        { word: 'QUADRATIC', clue: 'An algebraic equation or polynomial where the highest variable exponent is two' },
        { word: 'SLOPE', clue: 'The steepness and direction of a line, measured as vertical rise over horizontal run' },
        { word: 'THEOREM', clue: 'A mathematical statement that has been proven true using logic and axioms' },
        { word: 'POLYNOMIAL', clue: 'An expression consisting of variables and coefficients combined using addition' }
      ]
    },
    'ela-vocab': {
      title: 'Literary Devices & Language Arts',
      desc: 'Figurative language, story structure, and poetry terminology',
      pairs: [
        { word: 'METAPHOR', clue: 'A direct figure of speech comparing two different things without using like or as' },
        { word: 'SIMILE', clue: 'A comparison of two different things using the connecting words like or as' },
        { word: 'PROTAGONIST', clue: 'The leading character or hero in a drama, movie, or novel' },
        { word: 'ANTAGONIST', clue: 'The primary character or force that opposes or struggles against the protagonist' },
        { word: 'NARRATIVE', clue: 'A spoken or written account of connected events; a story' },
        { word: 'ALLITERATION', clue: 'The repetition of identical initial consonant sounds in neighboring words' },
        { word: 'STANZA', clue: 'A grouped set of lines within a poem, separated by a blank line' },
        { word: 'HYPERBOLE', clue: 'An intentional exaggeration used for emphasis or comedic effect' },
        { word: 'SYNONYM', clue: 'A word that means exactly or nearly the same as another word' },
        { word: 'THEME', clue: 'The central topic, deeper underlying message, or lesson of a story' }
      ]
    },
    'science-nature': {
      title: 'Science & Ecosystems',
      desc: 'Life, Earth, physical sciences, and ecological cycles',
      pairs: [
        { word: 'ECOSYSTEM', clue: 'A biological community of interacting organisms and their physical environment' },
        { word: 'HABITAT', clue: 'The natural environment or home where an organism lives, grows, and thrives' },
        { word: 'PHOTOSYNTHESIS', clue: 'The process green plants use to convert sunlight and water into sugar' },
        { word: 'MOLECULE', clue: 'A group of two or more atoms bonded tightly together' },
        { word: 'GRAVITY', clue: 'The natural universal force that attracts objects toward the center of the Earth' },
        { word: 'ATMOSPHERE', clue: 'The protective layer of gases surrounding the Earth or another planet' },
        { word: 'ORGANISM', clue: 'An individual animal, plant, fungus, or single-celled life form' },
        { word: 'VELOCITY', clue: 'The speed of an object in a given, specified direction' },
        { word: 'ADAPTATION', clue: 'A biological trait that helps an organism survive in its environment' },
        { word: 'VOLCANO', clue: 'An opening in the Earth crust where lava, ash, and gases erupt' }
      ]
    },
    'social-studies': {
      title: 'U.S. History & Civics',
      desc: 'American government, founding documents, and democracy',
      pairs: [
        { word: 'DEMOCRACY', clue: 'A system of government where supreme power is held by the people and their elected officials' },
        { word: 'CONSTITUTION', clue: 'The supreme legal document establishing the fundamental laws of the United States' },
        { word: 'AMENDMENT', clue: 'A formal, official addition or revision made to a constitution or statutory law' },
        { word: 'CONGRESS', clue: 'The federal legislative branch composed of the Senate and the House of Representatives' },
        { word: 'REVOLUTION', clue: 'A forcible overthrow of an existing government in favor of a new political system' },
        { word: 'CITIZEN', clue: 'A legally recognized member of a nation with rights, duties, and responsibilities' },
        { word: 'LIBERTY', clue: 'The state of being free within society from oppressive restrictions or control' },
        { word: 'JUSTICE', clue: 'The principle of moral fairness, equal treatment, and upholding the law' },
        { word: 'TREATY', clue: 'A formally concluded and ratified international agreement between sovereign nations' },
        { word: 'ELECTION', clue: 'A formal collective decision-making process by which citizens vote to choose leaders' }
      ]
    },
    'sight-words': {
      title: 'Phonics & Sight Words',
      desc: 'High-frequency sight words and introductory definitions for early readers',
      pairs: [
        { word: 'FRIEND', clue: 'A person you like and enjoy spending time with' },
        { word: 'BECAUSE', clue: 'A conjunction used to give a reason or explain why' },
        { word: 'SCHOOL', clue: 'A place where students go to learn and study' },
        { word: 'PEOPLE', clue: 'Human beings in general; men, women, and children' },
        { word: 'FAMILY', clue: 'A group of people related to one another, such as parents and children' },
        { word: 'ALWAYS', clue: 'At all times; on every occasion; forever' },
        { word: 'BEFORE', clue: 'Earlier than; ahead of in time or order' },
        { word: 'LISTEN', clue: 'To pay close attention with your ears to hear sound' },
        { word: 'TOGETHER', clue: 'With or in proximity to another person; not alone' },
        { word: 'AROUND', clue: 'Located on all sides of; in a circle near something' }
      ]
    }
  };

  class CrosswordStudio {
    constructor(containerId, options = {}) {
      this.container = typeof containerId === 'string' ? document.getElementById(containerId) : containerId;
      if (!this.container) return;

      this.options = Object.assign({
        defaultPreset: 'math-elem',
        allowCaseToggle: true,
        allowDyslexiaFont: true
      }, options);

      this.state = {
        title: 'Academic Crossword Puzzle',
        subtitle: 'Read the clues below and fill in the missing vocabulary terms.',
        caseMode: 'upper', // 'upper' or 'lower'
        fontStyle: 'standard', // 'standard', 'dyslexic', 'mono'
        pairs: [],
        grid: [], // 2D array of cells: { r, c, solution, userChar, number, acrossRef, downRef }
        width: 0,
        height: 0,
        acrossClues: [], // [{ num, word, clue, r, c, len }]
        downClues: [], // [{ num, word, clue, r, c, len }]
        unplacedWords: [],
        showWordBank: false,
        showSolution: false,
        soundEnabled: true,
        // Active selection
        selectedCell: null, // { r, c }
        direction: 'across', // 'across' or 'down'
        activeWordCells: [],
        activeClueNum: null,
        // Timer
        startTime: null,
        timerInterval: null,
        elapsedSeconds: 0
      };

      this.audioCtx = null;
      this.init();
    }

    init() {
      this.renderWorkspace();
      this.bindControls();
      this.loadPreset(this.options.defaultPreset);
    }

    // --- Web Audio Synthesizer ---
    playTone(type) {
      if (!this.state.soundEnabled) return;
      try {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;
        if (!this.audioCtx) this.audioCtx = new AudioContext();
        if (this.audioCtx.state === 'suspended') this.audioCtx.resume();

        const now = this.audioCtx.currentTime;
        if (type === 'word-complete') {
          // Cheerful ascending chime (E5 -> G5 -> B5)
          const notes = [659.25, 783.99, 987.77];
          notes.forEach((freq, idx) => {
            const osc = this.audioCtx.createOscillator();
            const gain = this.audioCtx.createGain();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(freq, now + idx * 0.07);
            gain.gain.setValueAtTime(0.12, now + idx * 0.07);
            gain.gain.exponentialRampToValueAtTime(0.001, now + idx * 0.07 + 0.22);
            osc.connect(gain);
            gain.connect(this.audioCtx.destination);
            osc.start(now + idx * 0.07);
            osc.stop(now + idx * 0.07 + 0.23);
          });
        } else if (type === 'puzzle-complete') {
          // Triumphant fanfare (C5 -> E5 -> G5 -> C6)
          const victory = [523.25, 659.25, 783.99, 1046.5];
          victory.forEach((freq, idx) => {
            const osc = this.audioCtx.createOscillator();
            const gain = this.audioCtx.createGain();
            osc.type = 'triangle';
            osc.frequency.setValueAtTime(freq, now + idx * 0.1);
            gain.gain.setValueAtTime(0.16, now + idx * 0.1);
            gain.gain.exponentialRampToValueAtTime(0.001, now + idx * 0.1 + 0.45);
            osc.connect(gain);
            gain.connect(this.audioCtx.destination);
            osc.start(now + idx * 0.1);
            osc.stop(now + idx * 0.1 + 0.46);
          });
        } else if (type === 'key') {
          const osc = this.audioCtx.createOscillator();
          const gain = this.audioCtx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(520, now);
          gain.gain.setValueAtTime(0.03, now);
          gain.gain.exponentialRampToValueAtTime(0.001, now + 0.04);
          osc.connect(gain);
          gain.connect(this.audioCtx.destination);
          osc.start(now);
          osc.stop(now + 0.05);
        }
      } catch (e) { }
    }

    // --- HTML Workspace Template ---
    renderWorkspace() {
      this.container.innerHTML = `
        <div class="cw-studio-wrapper" id="cw-studio-root">
          <!-- Printable Header (Displays only in print) -->
          <div class="cw-print-header" aria-hidden="true">
            <div class="cw-print-top-line">
              <div class="cw-print-field"><strong>Name:</strong> ____________________________________</div>
              <div class="cw-print-field"><strong>Date:</strong> ________________________</div>
              <div class="cw-print-field"><strong>Score:</strong> _______ / <span id="cw-print-score-total">0</span></div>
            </div>
            <h1 class="cw-print-title" id="cw-print-title-display">Academic Crossword Puzzle</h1>
            <p class="cw-print-instructions" id="cw-print-subtitle-display">Read the clues below and fill in the missing vocabulary terms.</p>
          </div>

          <!-- Main Studio Layout -->
          <div class="cw-studio-layout">
            <!-- Sidebar: Config & Controls (No print) -->
            <aside class="cw-sidebar no-print" aria-label="Crossword Configuration">
              <div class="cw-panel cw-config-panel">
                <div class="cw-panel-header">
                  <h2 class="cw-panel-title">
                    <i class="fas fa-sliders-h" style="color: var(--color-primary);"></i> Puzzle Settings
                  </h2>
                </div>

                <!-- Presets Selector -->
                <div class="cw-form-group">
                  <label for="cw-preset-select" class="cw-label">
                    <i class="fas fa-book-reader"></i> Preset Vocabulary Pack:
                  </label>
                  <select id="cw-preset-select" class="cw-select">
                    <option value="custom">✍️ Custom Words &amp; Clues</option>
                    <optgroup label="Academic Subjects">
                      <option value="math-elem" selected>📐 Elementary Math (Grades 1–5)</option>
                      <option value="math-adv">📉 Middle &amp; High School Math</option>
                      <option value="ela-vocab">📖 Literature &amp; Language Arts</option>
                      <option value="science-nature">🔬 Science &amp; Ecosystems</option>
                      <option value="social-studies">🏛️ U.S. History &amp; Civics</option>
                      <option value="sight-words">⭐ Early Phonics &amp; Sight Words</option>
                    </optgroup>
                  </select>
                </div>

                <!-- Title -->
                <div class="cw-form-group">
                  <label for="cw-input-title" class="cw-label">Worksheet Title:</label>
                  <input type="text" id="cw-input-title" class="cw-input" value="Elementary Math Concepts" placeholder="e.g. Chapter 4 Crossword">
                </div>

                <!-- Words & Clues Input -->
                <div class="cw-form-group">
                  <div class="cw-label-row">
                    <label for="cw-pairs-input" class="cw-label">Words &amp; Clues (one per line, WORD: Clue):</label>
                    <span class="cw-badge-count" id="cw-pairs-count-badge">10 Terms</span>
                  </div>
                  <textarea id="cw-pairs-input" class="cw-textarea" rows="6" placeholder="ADDITION: Combining two or more numbers
FRACTION: Equal parts of a whole
GEOMETRY: The study of shapes and sizes"></textarea>
                  <span class="cw-hint">Format: WORD: Clue description. Minimum 3 letters per word.</span>
                </div>

                <!-- Accessibility & Typography -->
                <div class="cw-form-grid-2">
                  <div class="cw-form-group">
                    <label for="cw-case-select" class="cw-label">Letter Case:</label>
                    <select id="cw-case-select" class="cw-select">
                      <option value="upper" selected>UPPERCASE (Standard)</option>
                      <option value="lower">lowercase (Early Readers)</option>
                    </select>
                  </div>
                  <div class="cw-form-group">
                    <label for="cw-font-select" class="cw-label">Typeface:</label>
                    <select id="cw-font-select" class="cw-select">
                      <option value="standard" selected>Modern Sans</option>
                      <option value="dyslexic">OpenDyslexic (Reading Aid)</option>
                      <option value="mono">Clean Monospace</option>
                    </select>
                  </div>
                </div>

                <div class="cw-form-group">
                  <label class="cw-checkbox-label">
                    <input type="checkbox" id="cw-toggle-wordbank">
                    <span>Include Word Bank on Worksheet (Accommodation)</span>
                  </label>
                </div>

                <!-- Actions -->
                <div class="cw-actions-group">
                  <button type="button" id="cw-btn-generate" class="cw-btn cw-btn-primary cw-btn-block">
                    <i class="fas fa-magic"></i> Generate Crossword Puzzle
                  </button>
                </div>
              </div>

              <!-- Print & Export Hub -->
              <div class="cw-panel cw-export-panel">
                <div class="cw-panel-header">
                  <h3 class="cw-panel-title">
                    <i class="fas fa-print" style="color: #059669;"></i> Print &amp; PDF Options
                  </h3>
                </div>
                <p class="cw-panel-desc">Formatted for clean 8.5" &times; 11" paper with student name lines and answer keys.</p>

                <div class="cw-btn-stack">
                  <button type="button" id="cw-btn-print-student" class="cw-btn cw-btn-outline cw-btn-block">
                    <i class="fas fa-file-alt"></i> Print Blank Student Worksheet
                  </button>
                  <button type="button" id="cw-btn-print-key" class="cw-btn cw-btn-outline cw-btn-block">
                    <i class="fas fa-check-double"></i> Print Educator Answer Key
                  </button>
                  <button type="button" id="cw-btn-share-link" class="cw-btn cw-btn-subtle cw-btn-block">
                    <i class="fas fa-link"></i> Copy Shareable Link
                  </button>
                </div>
              </div>
            </aside>

            <!-- Main Interactive Display Zone -->
            <main class="cw-content-area" aria-label="Interactive Crossword Game">
              <!-- Top Game Status Toolbar (No Print) -->
              <div class="cw-toolbar no-print">
                <div class="cw-toolbar-left">
                  <div class="cw-stat-chip">
                    <i class="fas fa-bullseye" style="color: var(--color-primary);"></i>
                    <span>Completed: <strong id="cw-found-count">0</strong> / <strong id="cw-total-count">0</strong></span>
                  </div>
                  <div class="cw-stat-chip" id="cw-timer-chip">
                    <i class="fas fa-stopwatch" style="color: #f59e0b;"></i>
                    <span id="cw-timer-display">00:00</span>
                  </div>
                </div>

                <div class="cw-toolbar-right">
                  <button type="button" id="cw-btn-check-puzzle" class="cw-btn cw-btn-sm cw-btn-outline" title="Check entered letters for correctness">
                    <i class="fas fa-spell-check"></i> Check Grid
                  </button>
                  <button type="button" id="cw-btn-reveal-letter" class="cw-btn cw-btn-sm cw-btn-warning" title="Reveal the letter in the current cell">
                    <i class="fas fa-lightbulb"></i> Reveal Letter
                  </button>
                  <button type="button" id="cw-btn-toggle-solution" class="cw-btn cw-btn-sm cw-btn-subtle" title="Show or hide solution">
                    <i class="fas fa-eye"></i> <span id="cw-solution-btn-text">Show Solution</span>
                  </button>
                  <button type="button" id="cw-btn-reset-play" class="cw-btn cw-btn-sm cw-btn-subtle" title="Clear player entries">
                    <i class="fas fa-redo"></i> Reset
                  </button>
                  <button type="button" id="cw-btn-audio-toggle" class="cw-btn cw-btn-icon" aria-label="Toggle Sound Effects" title="Sound Mute/Unmute">
                    <i class="fas fa-volume-up" id="cw-audio-icon"></i>
                  </button>
                </div>
              </div>

              <!-- Unplaced Alert -->
              <div id="cw-unplaced-alert" class="cw-alert cw-alert-warning no-print" style="display: none;" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                  <strong>Notice:</strong> Some words did not intersect and could not fit:
                  <span id="cw-unplaced-list"></span>. Try adding more intersecting words or increasing vocabulary count.
                </div>
              </div>

              <!-- Complete Celebration Banner -->
              <div id="cw-victory-banner" class="cw-victory-banner no-print" style="display: none;" role="status" aria-live="polite">
                <div class="cw-victory-content">
                  <div class="cw-victory-icon">
                    <i class="fas fa-trophy"></i>
                  </div>
                  <div>
                    <h3 class="cw-victory-title">Crossword Solved! Outstanding Mastery! 🎉</h3>
                    <p class="cw-victory-desc" id="cw-victory-desc">You completed the puzzle in 00:00!</p>
                  </div>
                  <div class="cw-victory-actions">
                    <button type="button" id="cw-btn-play-again" class="cw-btn cw-btn-primary">
                      <i class="fas fa-sparkles"></i> Play Another
                    </button>
                  </div>
                </div>
              </div>

              <!-- Active Clue Header Bar (Live reader banner) -->
              <div class="cw-active-clue-bar no-print" id="cw-active-clue-bar">
                <span class="cw-active-clue-direction" id="cw-active-direction-tag">1 ACROSS</span>
                <span class="cw-active-clue-text" id="cw-active-clue-text">Select a cell in the grid to begin solving.</span>
              </div>

              <!-- Interactive Board & Clues Layout -->
              <div class="cw-board-layout" id="cw-board-layout">
                <!-- Grid Container -->
                <div class="cw-grid-container" id="cw-grid-container">
                  <div class="cw-grid-scroll">
                    <div class="cw-grid-board" id="cw-grid-board" role="grid" aria-label="Crossword Grid">
                      <!-- Cells injected dynamically -->
                    </div>
                  </div>
                  <div class="cw-keyboard-help no-print">
                    <small><i class="fas fa-keyboard"></i> <strong>How to play:</strong> Click a cell or press <strong>Space</strong> to toggle Across/Down. Type letters to advance. <strong>Backspace</strong> deletes. <strong>Tab</strong> jumps to the next clue.</small>
                  </div>
                </div>

                <!-- Clues Lists Container -->
                <div class="cw-clues-container" id="cw-clues-container">
                  <!-- Word Bank (If Enabled) -->
                  <div class="cw-wordbank-box" id="cw-wordbank-box" style="display: none;">
                    <h4 class="cw-wordbank-title"><i class="fas fa-tags"></i> Word Bank (Accommodation):</h4>
                    <div class="cw-wordbank-tags" id="cw-wordbank-tags"></div>
                  </div>

                  <div class="cw-clues-columns">
                    <!-- Across Clues -->
                    <div class="cw-clues-column">
                      <h3 class="cw-clues-heading">
                        <i class="fas fa-arrows-alt-h" style="color: var(--color-primary);"></i> Across
                      </h3>
                      <ol class="cw-clues-list" id="cw-across-list" aria-label="Across Clues"></ol>
                    </div>

                    <!-- Down Clues -->
                    <div class="cw-clues-column">
                      <h3 class="cw-clues-heading">
                        <i class="fas fa-arrows-alt-v" style="color: #059669;"></i> Down
                      </h3>
                      <ol class="cw-clues-list" id="cw-down-list" aria-label="Down Clues"></ol>
                    </div>
                  </div>
                </div>
              </div>
            </main>
          </div>
        </div>
      `;
    }

    // --- Event Binding ---
    bindControls() {
      const root = this.container;

      // Preset Change
      const presetSelect = root.querySelector('#cw-preset-select');
      if (presetSelect) {
        presetSelect.addEventListener('change', (e) => {
          if (e.target.value !== 'custom') {
            this.loadPreset(e.target.value);
          }
        });
      }

      // Title & Textarea
      const pairsInput = root.querySelector('#cw-pairs-input');
      const titleInput = root.querySelector('#cw-input-title');
      if (pairsInput) {
        pairsInput.addEventListener('input', () => {
          if (presetSelect.value !== 'custom') {
            presetSelect.value = 'custom';
          }
          this.updatePairsCountBadge();
        });
      }

      if (titleInput) {
        titleInput.addEventListener('input', (e) => {
          this.state.title = e.target.value || 'Academic Crossword Puzzle';
          const printTitle = root.querySelector('#cw-print-title-display');
          if (printTitle) printTitle.textContent = this.state.title;
        });
      }

      // Case & Font Selects
      const caseSelect = root.querySelector('#cw-case-select');
      if (caseSelect) {
        caseSelect.addEventListener('change', (e) => {
          this.state.caseMode = e.target.value;
          this.applyDisplayTransformations();
        });
      }

      const fontSelect = root.querySelector('#cw-font-select');
      if (fontSelect) {
        fontSelect.addEventListener('change', (e) => {
          this.state.fontStyle = e.target.value;
          this.applyDisplayTransformations();
        });
      }

      const wbToggle = root.querySelector('#cw-toggle-wordbank');
      if (wbToggle) {
        wbToggle.addEventListener('change', (e) => {
          this.state.showWordBank = e.target.checked;
          this.updateWordBankDisplay();
        });
      }

      // Generate Button
      const genBtn = root.querySelector('#cw-btn-generate');
      if (genBtn) {
        genBtn.addEventListener('click', () => {
          this.generateFromInputs();
        });
      }

      // Action Buttons
      const checkBtn = root.querySelector('#cw-btn-check-puzzle');
      if (checkBtn) {
        checkBtn.addEventListener('click', () => {
          this.checkGridLetters();
        });
      }

      const revealLetterBtn = root.querySelector('#cw-btn-reveal-letter');
      if (revealLetterBtn) {
        revealLetterBtn.addEventListener('click', () => {
          this.revealActiveLetter();
        });
      }

      const solBtn = root.querySelector('#cw-btn-toggle-solution');
      if (solBtn) {
        solBtn.addEventListener('click', () => {
          this.toggleSolution();
        });
      }

      const resetBtn = root.querySelector('#cw-btn-reset-play');
      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.resetPlayerGrid();
        });
      }

      const audioBtn = root.querySelector('#cw-btn-audio-toggle');
      if (audioBtn) {
        audioBtn.addEventListener('click', () => {
          this.state.soundEnabled = !this.state.soundEnabled;
          const icon = root.querySelector('#cw-audio-icon');
          if (icon) {
            icon.className = this.state.soundEnabled ? 'fas fa-volume-up' : 'fas fa-volume-mute';
          }
        });
      }

      const playAgainBtn = root.querySelector('#cw-btn-play-again');
      if (playAgainBtn) {
        playAgainBtn.addEventListener('click', () => {
          this.generateFromInputs();
        });
      }

      // Print Buttons
      const printStudentBtn = root.querySelector('#cw-btn-print-student');
      if (printStudentBtn) {
        printStudentBtn.addEventListener('click', () => {
          this.printCrossword(false);
        });
      }

      const printKeyBtn = root.querySelector('#cw-btn-print-key');
      if (printKeyBtn) {
        printKeyBtn.addEventListener('click', () => {
          this.printCrossword(true);
        });
      }

      // Share Link
      const shareBtn = root.querySelector('#cw-btn-share-link');
      if (shareBtn) {
        shareBtn.addEventListener('click', () => {
          this.copyShareLink();
        });
      }
    }

    // --- Load Preset Dictionaries ---
    loadPreset(presetKey) {
      const preset = PRESET_DICTIONARIES[presetKey] || PRESET_DICTIONARIES['math-elem'];
      const root = this.container;

      const titleInput = root.querySelector('#cw-input-title');
      const pairsInput = root.querySelector('#cw-pairs-input');
      const presetSelect = root.querySelector('#cw-preset-select');

      if (titleInput) titleInput.value = preset.title;
      if (presetSelect) presetSelect.value = presetKey;

      if (pairsInput) {
        pairsInput.value = preset.pairs.map(p => `${p.word}: ${p.clue}`).join('\n');
      }

      this.state.title = preset.title;
      this.state.subtitle = preset.desc;
      this.updatePairsCountBadge();
      this.generateFromInputs();
    }

    updatePairsCountBadge() {
      const pairsInput = this.container.querySelector('#cw-pairs-input');
      const badge = this.container.querySelector('#cw-pairs-count-badge');
      if (!pairsInput || !badge) return;

      const raw = pairsInput.value || '';
      const lines = raw.split('\n').filter(l => l.trim().length > 0);
      badge.textContent = `${lines.length} Term${lines.length === 1 ? '' : 's'}`;
    }

    // --- Generation Algorithm ---
    generateFromInputs() {
      const root = this.container;
      const titleInput = root.querySelector('#cw-input-title');
      const pairsInput = root.querySelector('#cw-pairs-input');

      const title = (titleInput && titleInput.value.trim()) || 'Academic Crossword Puzzle';
      const rawText = (pairsInput && pairsInput.value) || '';

      this.state.title = title;

      // Parse word-clue pairs
      const parsed = [];
      const lines = rawText.split('\n');
      lines.forEach(line => {
        const trimmed = line.trim();
        if (!trimmed) return;
        let word = '';
        let clue = '';
        if (trimmed.includes(':')) {
          const parts = trimmed.split(':');
          word = parts[0].trim().toUpperCase().replace(/[^A-Z]/g, '');
          clue = parts.slice(1).join(':').trim();
        } else if (trimmed.includes(' - ')) {
          const parts = trimmed.split(' - ');
          word = parts[0].trim().toUpperCase().replace(/[^A-Z]/g, '');
          clue = parts.slice(1).join(' - ').trim();
        } else {
          const firstSpace = trimmed.indexOf(' ');
          if (firstSpace !== -1) {
            word = trimmed.slice(0, firstSpace).trim().toUpperCase().replace(/[^A-Z]/g, '');
            clue = trimmed.slice(firstSpace).trim();
          }
        }

        if (word && word.length >= 3 && clue) {
          parsed.push({ word, clue });
        }
      });

      if (parsed.length < 2) {
        alert('Please enter at least 2 valid words with clues (format: WORD: Clue). Words must be at least 3 letters.');
        return;
      }

      this.buildCrosswordLayout(parsed);
    }

    buildCrosswordLayout(pairs) {
      // Multiple randomized trials to find the densest, most interlocking layout
      const TRIALS = 15;
      let bestResult = null;

      for (let trial = 0; trial < TRIALS; trial++) {
        const result = this.attemptLayout(pairs, trial);
        if (!bestResult || result.placedCount > bestResult.placedCount ||
            (result.placedCount === bestResult.placedCount && result.area < bestResult.area)) {
          bestResult = result;
          if (result.placedCount === pairs.length) break;
        }
      }

      if (!bestResult || bestResult.placedCount === 0) {
        alert('Could not fit the given words into an intersecting crossword grid. Please ensure words have common matching letters.');
        return;
      }

      // Crop and number grid
      this.finalizeGrid(bestResult, pairs);
    }

    attemptLayout(pairs, trialIndex) {
      // Sort words by length descending, with randomized jitter on subsequent trials
      const sorted = [...pairs].sort((a, b) => {
        if (trialIndex === 0) return b.word.length - a.word.length;
        return (b.word.length + (Math.random() * 2 - 1)) - (a.word.length + (Math.random() * 2 - 1));
      });

      // Virtual grid buffer (40 x 40)
      const GRID_SIZE = 40;
      const vGrid = Array.from({ length: GRID_SIZE }, () => Array(GRID_SIZE).fill(null));
      const placedWords = [];
      const unplaced = [];

      // Place first (longest) word horizontally in center
      const first = sorted[0];
      const startR = 20;
      const startC = Math.floor(20 - first.word.length / 2);

      for (let i = 0; i < first.word.length; i++) {
        vGrid[startR][startC + i] = { letter: first.word[i] };
      }
      placedWords.push({
        word: first.word,
        clue: first.clue,
        r: startR,
        c: startC,
        dir: 'across',
        len: first.word.length
      });

      // Attempt to place remaining words
      for (let wIdx = 1; wIdx < sorted.length; wIdx++) {
        const item = sorted[wIdx];
        const candidates = [];

        // Check intersections against all placed words
        for (const placed of placedWords) {
          const candidateDir = placed.dir === 'across' ? 'down' : 'across';

          for (let pIdx = 0; pIdx < placed.word.length; pIdx++) {
            const placedChar = placed.word[pIdx];
            const pR = placed.dir === 'across' ? placed.r : placed.r + pIdx;
            const pC = placed.dir === 'across' ? placed.c + pIdx : placed.c;

            for (let i = 0; i < item.word.length; i++) {
              if (item.word[i] === placedChar) {
                // Potential intersection
                const candR = candidateDir === 'down' ? pR - i : pR;
                const candC = candidateDir === 'across' ? pC - i : pC;

                if (this.isValidPlacement(vGrid, item.word, candR, candC, candidateDir, GRID_SIZE)) {
                  // Calculate score: prefer intersections and compact bounding box
                  const intersections = this.countIntersections(vGrid, item.word, candR, candC, candidateDir);
                  candidates.push({
                    word: item.word,
                    clue: item.clue,
                    r: candR,
                    c: candC,
                    dir: candidateDir,
                    len: item.word.length,
                    score: intersections * 10 - Math.abs(candR - 20) - Math.abs(candC - 20)
                  });
                }
              }
            }
          }
        }

        if (candidates.length > 0) {
          candidates.sort((a, b) => b.score - a.score);
          const best = candidates[0];

          // Place word on vGrid
          for (let i = 0; i < best.len; i++) {
            const r = best.dir === 'down' ? best.r + i : best.r;
            const c = best.dir === 'across' ? best.c + i : best.c;
            vGrid[r][c] = { letter: best.word[i] };
          }
          placedWords.push(best);
        } else {
          unplaced.push(item);
        }
      }

      // Compute bounding box
      let minR = GRID_SIZE, maxR = 0, minC = GRID_SIZE, maxC = 0;
      placedWords.forEach(pw => {
        minR = Math.min(minR, pw.r);
        maxR = Math.max(maxR, pw.dir === 'down' ? pw.r + pw.len - 1 : pw.r);
        minC = Math.min(minC, pw.c);
        maxC = Math.max(maxC, pw.dir === 'across' ? pw.c + pw.len - 1 : pw.c);
      });

      const width = (maxC - minC + 1);
      const height = (maxR - minR + 1);

      return {
        vGrid,
        placedWords,
        unplaced,
        placedCount: placedWords.length,
        minR, maxR, minC, maxC,
        width, height,
        area: width * height
      };
    }

    isValidPlacement(vGrid, word, r, c, dir, maxDim) {
      const len = word.length;
      if (r < 1 || c < 1) return false;
      if (dir === 'down' && (r + len >= maxDim - 1 || c >= maxDim - 1)) return false;
      if (dir === 'across' && (c + len >= maxDim - 1 || r >= maxDim - 1)) return false;

      // Cell before word start must be empty
      const beforeR = dir === 'down' ? r - 1 : r;
      const beforeC = dir === 'across' ? c - 1 : c;
      if (vGrid[beforeR][beforeC] !== null) return false;

      // Cell after word end must be empty
      const afterR = dir === 'down' ? r + len : r;
      const afterC = dir === 'across' ? c + len : c;
      if (vGrid[afterR][afterC] !== null) return false;

      let hasAtLeastOneOverlap = false;

      for (let i = 0; i < len; i++) {
        const curR = dir === 'down' ? r + i : r;
        const curC = dir === 'across' ? c + i : c;
        const cell = vGrid[curR][curC];

        if (cell !== null) {
          // If already occupied, letter must match exactly
          if (cell.letter !== word[i]) return false;
          hasAtLeastOneOverlap = true;
        } else {
          // If empty, adjacent perpendicular neighbors must also be empty
          const pAdj1R = dir === 'across' ? curR - 1 : curR;
          const pAdj1C = dir === 'across' ? curC : curC - 1;
          const pAdj2R = dir === 'across' ? curR + 1 : curR;
          const pAdj2C = dir === 'across' ? curC : curC + 1;

          if (vGrid[pAdj1R][pAdj1C] !== null || vGrid[pAdj2R][pAdj2C] !== null) {
            return false;
          }
        }
      }

      return hasAtLeastOneOverlap;
    }

    countIntersections(vGrid, word, r, c, dir) {
      let count = 0;
      for (let i = 0; i < word.length; i++) {
        const curR = dir === 'down' ? r + i : r;
        const curC = dir === 'across' ? c + i : c;
        if (vGrid[curR][curC] !== null) count++;
      }
      return count;
    }

    // --- Finalize Grid & Numbering ---
    finalizeGrid(result, allPairs) {
      const { vGrid, minR, maxR, minC, maxC, placedWords, unplaced } = result;
      const height = maxR - minR + 1;
      const width = maxC - minC + 1;

      // Build cropped 2D grid
      const grid = Array.from({ length: height }, (_, r) =>
        Array.from({ length: width }, (_, c) => {
          const orig = vGrid[minR + r][minC + c];
          return orig ? {
            r, c,
            solution: orig.letter,
            userChar: '',
            isRevealed: false,
            number: null,
            acrossWord: null,
            downWord: null
          } : null;
        })
      );

      // Re-index placed words relative to cropped coordinates
      const relWords = placedWords.map(pw => ({
        ...pw,
        r: pw.r - minR,
        c: pw.c - minC
      }));

      // Standard Crossword Clue Numbering
      let clueCounter = 1;
      const acrossClues = [];
      const downClues = [];

      for (let r = 0; r < height; r++) {
        for (let c = 0; c < width; c++) {
          if (!grid[r][c]) continue;

          const startsAcross = relWords.find(w => w.dir === 'across' && w.r === r && w.c === c);
          const startsDown = relWords.find(w => w.dir === 'down' && w.r === r && w.c === c);

          if (startsAcross || startsDown) {
            grid[r][c].number = clueCounter;

            if (startsAcross) {
              acrossClues.push({
                num: clueCounter,
                word: startsAcross.word,
                clue: startsAcross.clue,
                r: startsAcross.r,
                c: startsAcross.c,
                len: startsAcross.len
              });
            }

            if (startsDown) {
              downClues.push({
                num: clueCounter,
                word: startsDown.word,
                clue: startsDown.clue,
                r: startsDown.r,
                c: startsDown.c,
                len: startsDown.len
              });
            }

            clueCounter++;
          }
        }
      }

      // Link acrossWord & downWord references on each grid cell
      acrossClues.forEach(ac => {
        for (let i = 0; i < ac.len; i++) {
          if (grid[ac.r][ac.c + i]) {
            grid[ac.r][ac.c + i].acrossWord = ac;
          }
        }
      });

      downClues.forEach(dc => {
        for (let i = 0; i < dc.len; i++) {
          if (grid[dc.r + i][dc.c]) {
            grid[dc.r + i][dc.c].downWord = dc;
          }
        }
      });

      this.state.grid = grid;
      this.state.width = width;
      this.state.height = height;
      this.state.acrossClues = acrossClues;
      this.state.downClues = downClues;
      this.state.pairs = [...acrossClues, ...downClues];
      this.state.unplacedWords = unplaced;
      this.state.showSolution = false;

      // Select first clue
      if (acrossClues.length > 0) {
        this.state.direction = 'across';
        this.state.selectedCell = { r: acrossClues[0].r, c: acrossClues[0].c };
      } else if (downClues.length > 0) {
        this.state.direction = 'down';
        this.state.selectedCell = { r: downClues[0].r, c: downClues[0].c };
      }

      this.renderGridDom();
      this.renderCluesDom();
      this.updateUnplacedAlert();
      this.updateWordBankDisplay();
      this.updateActiveWordHighlight();
      this.resetTimer();
      this.startTimer();
      this.applyDisplayTransformations();

      this.announceA11y(`Crossword generated: ${this.state.title}. ${acrossClues.length} across clues, ${downClues.length} down clues.`);
    }

    // --- DOM Rendering ---
    renderGridDom() {
      const root = this.container;
      const board = root.querySelector('#cw-grid-board');
      if (!board) return;

      board.innerHTML = '';
      const { width, height, grid } = this.state;

      board.style.gridTemplateColumns = `repeat(${width}, 1fr)`;
      board.style.gridTemplateRows = `repeat(${height}, 1fr)`;

      for (let r = 0; r < height; r++) {
        for (let c = 0; c < width; c++) {
          const cellData = grid[r][c];
          const cellEl = document.createElement('div');
          cellEl.setAttribute('data-r', r);
          cellEl.setAttribute('data-c', c);

          if (cellData === null) {
            cellEl.className = 'cw-cell is-block';
            cellEl.setAttribute('aria-hidden', 'true');
          } else {
            cellEl.className = 'cw-cell is-active';
            cellEl.setAttribute('role', 'gridcell');
            cellEl.setAttribute('tabindex', '0');

            let numLabel = cellData.number ? `${cellData.number}. ` : '';
            cellEl.setAttribute('aria-label', `${numLabel}Row ${r + 1}, Col ${c + 1}`);

            // Clue Number Pill
            if (cellData.number) {
              const numSpan = document.createElement('span');
              numSpan.className = 'cw-cell-num';
              numSpan.textContent = cellData.number;
              cellEl.appendChild(numSpan);
            }

            // Letter Container
            const charSpan = document.createElement('span');
            charSpan.className = 'cw-cell-letter';
            charSpan.textContent = cellData.userChar || '';
            cellEl.appendChild(charSpan);

            // Click listener
            cellEl.addEventListener('click', () => this.handleCellClick(r, c));

            // Keyboard listener
            cellEl.addEventListener('keydown', (e) => this.handleCellKeydown(r, c, e));
          }

          board.appendChild(cellEl);
        }
      }
    }

    renderCluesDom() {
      const root = this.container;
      const acrossList = root.querySelector('#cw-across-list');
      const downList = root.querySelector('#cw-down-list');
      const totalCountSpan = root.querySelector('#cw-total-count');
      const foundCountSpan = root.querySelector('#cw-found-count');
      const printScoreTotal = root.querySelector('#cw-print-score-total');

      if (acrossList) acrossList.innerHTML = '';
      if (downList) downList.innerHTML = '';

      const totalTerms = this.state.acrossClues.length + this.state.downClues.length;
      if (totalCountSpan) totalCountSpan.textContent = totalTerms;
      if (foundCountSpan) foundCountSpan.textContent = '0';
      if (printScoreTotal) printScoreTotal.textContent = totalTerms;

      // Render Across Clues
      this.state.acrossClues.forEach(clue => {
        const li = document.createElement('li');
        li.className = 'cw-clue-item';
        li.setAttribute('data-num', clue.num);
        li.setAttribute('data-dir', 'across');
        li.innerHTML = `
          <strong class="cw-clue-num">${clue.num}.</strong>
          <span class="cw-clue-desc">${clue.clue} (${clue.len})</span>
          <span class="cw-clue-key-answer no-web">[${clue.word}]</span>
        `;
        li.addEventListener('click', () => {
          this.state.direction = 'across';
          this.state.selectedCell = { r: clue.r, c: clue.c };
          this.focusCell(clue.r, clue.c);
          this.updateActiveWordHighlight();
        });
        acrossList.appendChild(li);
      });

      // Render Down Clues
      this.state.downClues.forEach(clue => {
        const li = document.createElement('li');
        li.className = 'cw-clue-item';
        li.setAttribute('data-num', clue.num);
        li.setAttribute('data-dir', 'down');
        li.innerHTML = `
          <strong class="cw-clue-num">${clue.num}.</strong>
          <span class="cw-clue-desc">${clue.clue} (${clue.len})</span>
          <span class="cw-clue-key-answer no-web">[${clue.word}]</span>
        `;
        li.addEventListener('click', () => {
          this.state.direction = 'down';
          this.state.selectedCell = { r: clue.r, c: clue.c };
          this.focusCell(clue.r, clue.c);
          this.updateActiveWordHighlight();
        });
        downList.appendChild(li);
      });
    }

    updateWordBankDisplay() {
      const box = this.container.querySelector('#cw-wordbank-box');
      const tags = this.container.querySelector('#cw-wordbank-tags');
      if (!box || !tags) return;

      if (this.state.showWordBank) {
        box.style.display = 'block';
        tags.innerHTML = '';
        const allWords = [...new Set([...this.state.acrossClues, ...this.state.downClues].map(c => c.word))].sort();
        allWords.forEach(w => {
          const span = document.createElement('span');
          span.className = 'cw-wordbank-tag';
          span.textContent = w;
          tags.appendChild(span);
        });
      } else {
        box.style.display = 'none';
      }
    }

    updateUnplacedAlert() {
      const alertBox = this.container.querySelector('#cw-unplaced-alert');
      const listSpan = this.container.querySelector('#cw-unplaced-list');
      if (!alertBox || !listSpan) return;

      if (this.state.unplacedWords && this.state.unplacedWords.length > 0) {
        listSpan.textContent = this.state.unplacedWords.map(w => w.word).join(', ');
        alertBox.style.display = 'flex';
      } else {
        alertBox.style.display = 'none';
      }
    }

    // --- Interactive Play & Cell Selection ---
    handleCellClick(r, c) {
      const current = this.state.selectedCell;
      if (current && current.r === r && current.c === c) {
        // Clicking same cell toggles direction if intersecting
        const cellData = this.state.grid[r][c];
        if (cellData && cellData.acrossWord && cellData.downWord) {
          this.state.direction = this.state.direction === 'across' ? 'down' : 'across';
        }
      } else {
        this.state.selectedCell = { r, c };
        const cellData = this.state.grid[r][c];
        if (cellData) {
          // If cell only belongs to one direction, snap to it
          if (cellData.acrossWord && !cellData.downWord) {
            this.state.direction = 'across';
          } else if (!cellData.acrossWord && cellData.downWord) {
            this.state.direction = 'down';
          }
        }
      }

      this.focusCell(r, c);
      this.updateActiveWordHighlight();
    }

    handleCellKeydown(r, c, e) {
      const cellData = this.state.grid[r][c];
      if (!cellData) return;

      const key = e.key;

      if (key.length === 1 && /[a-zA-Z]/.test(key)) {
        // Letter entered
        e.preventDefault();
        const char = key.toUpperCase();
        cellData.userChar = char;
        this.updateCellDomChar(r, c, char);
        this.playTone('key');

        // Check if word completed
        this.checkWordCompleted(this.getActiveWordRef());

        // Advance to next cell in current word
        this.moveCursor(1);
      } else if (key === 'Backspace') {
        e.preventDefault();
        if (cellData.userChar !== '') {
          cellData.userChar = '';
          this.updateCellDomChar(r, c, '');
        } else {
          // Move backwards and clear previous
          this.moveCursor(-1);
          const prev = this.state.selectedCell;
          if (prev && this.state.grid[prev.r][prev.c]) {
            this.state.grid[prev.r][prev.c].userChar = '';
            this.updateCellDomChar(prev.r, prev.c, '');
          }
        }
      } else if (key === 'ArrowRight') {
        e.preventDefault();
        this.navigateGrid(0, 1);
      } else if (key === 'ArrowLeft') {
        e.preventDefault();
        this.navigateGrid(0, -1);
      } else if (key === 'ArrowDown') {
        e.preventDefault();
        this.navigateGrid(1, 0);
      } else if (key === 'ArrowUp') {
        e.preventDefault();
        this.navigateGrid(-1, 0);
      } else if (key === ' ' || key === 'Enter') {
        e.preventDefault();
        // Toggle direction
        this.state.direction = this.state.direction === 'across' ? 'down' : 'across';
        this.updateActiveWordHighlight();
      } else if (key === 'Tab') {
        e.preventDefault();
        this.jumpToNextClue(e.shiftKey ? -1 : 1);
      }
    }

    updateCellDomChar(r, c, char) {
      const cellEl = this.container.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"] .cw-cell-letter`);
      if (cellEl) {
        cellEl.textContent = char;
      }
    }

    focusCell(r, c) {
      const target = this.container.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"]`);
      if (target) {
        target.focus();
      }
    }

    navigateGrid(dr, dc) {
      const current = this.state.selectedCell;
      if (!current) return;
      let nextR = current.r + dr;
      let nextC = current.c + dc;

      // Find nearest active cell in that direction
      while (nextR >= 0 && nextR < this.state.height && nextC >= 0 && nextC < this.state.width) {
        if (this.state.grid[nextR][nextC] !== null) {
          this.state.selectedCell = { r: nextR, c: nextC };
          this.focusCell(nextR, nextC);
          this.updateActiveWordHighlight();
          return;
        }
        nextR += dr;
        nextC += dc;
      }
    }

    moveCursor(delta) {
      const current = this.state.selectedCell;
      if (!current) return;
      const wordRef = this.getActiveWordRef();
      if (!wordRef) return;

      const isAcross = this.state.direction === 'across';
      let nextR = isAcross ? current.r : current.r + delta;
      let nextC = isAcross ? current.c + delta : current.c;

      // Ensure inside word bounds
      if (isAcross) {
        if (nextC >= wordRef.c && nextC < wordRef.c + wordRef.len) {
          this.state.selectedCell = { r: nextR, c: nextC };
          this.focusCell(nextR, nextC);
          this.updateActiveWordHighlight();
        }
      } else {
        if (nextR >= wordRef.r && nextR < wordRef.r + wordRef.len) {
          this.state.selectedCell = { r: nextR, c: nextC };
          this.focusCell(nextR, nextC);
          this.updateActiveWordHighlight();
        }
      }
    }

    jumpToNextClue(delta) {
      const wordRef = this.getActiveWordRef();
      const allClues = this.state.direction === 'across' ? this.state.acrossClues : this.state.downClues;
      let idx = allClues.indexOf(wordRef);
      if (idx === -1) idx = 0;

      let nextIdx = idx + delta;
      if (nextIdx >= allClues.length) {
        // Flip to other direction
        this.state.direction = this.state.direction === 'across' ? 'down' : 'across';
        const otherList = this.state.direction === 'across' ? this.state.acrossClues : this.state.downClues;
        nextIdx = 0;
        if (otherList.length > 0) {
          const nextClue = otherList[nextIdx];
          this.state.selectedCell = { r: nextClue.r, c: nextClue.c };
          this.focusCell(nextClue.r, nextClue.c);
          this.updateActiveWordHighlight();
        }
      } else if (nextIdx < 0) {
        this.state.direction = this.state.direction === 'across' ? 'down' : 'across';
        const otherList = this.state.direction === 'across' ? this.state.acrossClues : this.state.downClues;
        nextIdx = Math.max(0, otherList.length - 1);
        if (otherList.length > 0) {
          const nextClue = otherList[nextIdx];
          this.state.selectedCell = { r: nextClue.r, c: nextClue.c };
          this.focusCell(nextClue.r, nextClue.c);
          this.updateActiveWordHighlight();
        }
      } else {
        const nextClue = allClues[nextIdx];
        this.state.selectedCell = { r: nextClue.r, c: nextClue.c };
        this.focusCell(nextClue.r, nextClue.c);
        this.updateActiveWordHighlight();
      }
    }

    getActiveWordRef() {
      const sel = this.state.selectedCell;
      if (!sel) return null;
      const cellData = this.state.grid[sel.r][sel.c];
      if (!cellData) return null;
      return this.state.direction === 'across' ? cellData.acrossWord : cellData.downWord;
    }

    // --- Highlighting Engine ---
    updateActiveWordHighlight() {
      const root = this.container;
      root.querySelectorAll('.cw-cell.is-selected').forEach(el => el.classList.remove('is-selected'));
      root.querySelectorAll('.cw-cell.is-word-highlight').forEach(el => el.classList.remove('is-word-highlight'));
      root.querySelectorAll('.cw-clue-item.is-active-clue').forEach(el => el.classList.remove('is-active-clue'));

      const sel = this.state.selectedCell;
      if (!sel) return;

      // Highlight active cell
      const selEl = root.querySelector(`.cw-cell[data-r="${sel.r}"][data-c="${sel.c}"]`);
      if (selEl) selEl.classList.add('is-selected');

      const wordRef = this.getActiveWordRef();
      const dirTag = root.querySelector('#cw-active-direction-tag');
      const clueText = root.querySelector('#cw-active-clue-text');

      if (wordRef) {
        // Highlight all cells in active word
        for (let i = 0; i < wordRef.len; i++) {
          const r = this.state.direction === 'across' ? wordRef.r : wordRef.r + i;
          const c = this.state.direction === 'across' ? wordRef.c + i : wordRef.c;
          const cEl = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"]`);
          if (cEl) cEl.classList.add('is-word-highlight');
        }

        // Highlight matching clue item in sidebar
        const clueEl = root.querySelector(`.cw-clue-item[data-num="${wordRef.num}"][data-dir="${this.state.direction}"]`);
        if (clueEl) {
          clueEl.classList.add('is-active-clue');
          clueEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        if (dirTag) dirTag.textContent = `${wordRef.num} ${this.state.direction.toUpperCase()}`;
        if (clueText) clueText.textContent = wordRef.clue;
      }
    }

    // --- Validation, Hints & Completion ---
    checkGridLetters() {
      const root = this.container;
      const { height, width, grid } = this.state;
      let hasMistakes = false;

      for (let r = 0; r < height; r++) {
        for (let c = 0; c < width; c++) {
          const cell = grid[r][c];
          if (!cell || !cell.userChar) continue;

          const cellEl = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"]`);
          if (!cellEl) continue;

          if (cell.userChar === cell.solution) {
            cellEl.classList.add('is-correct');
            cellEl.classList.remove('is-incorrect');
          } else {
            cellEl.classList.add('is-incorrect');
            cellEl.classList.remove('is-correct');
            hasMistakes = true;
          }
        }
      }

      if (hasMistakes) {
        this.announceA11y('Check completed: Some entered letters are incorrect and highlighted in red.');
      } else {
        this.announceA11y('Check completed: All checked letters are correct!');
      }

      setTimeout(() => {
        root.querySelectorAll('.cw-cell.is-incorrect').forEach(el => el.classList.remove('is-incorrect'));
        root.querySelectorAll('.cw-cell.is-correct').forEach(el => el.classList.remove('is-correct'));
      }, 3500);
    }

    revealActiveLetter() {
      const sel = this.state.selectedCell;
      if (!sel) return;
      const cellData = this.state.grid[sel.r][sel.c];
      if (!cellData) return;

      cellData.userChar = cellData.solution;
      cellData.isRevealed = true;
      this.updateCellDomChar(sel.r, sel.c, cellData.solution);

      const cellEl = this.container.querySelector(`.cw-cell[data-r="${sel.r}"][data-c="${sel.c}"]`);
      if (cellEl) cellEl.classList.add('is-hinted');

      this.checkWordCompleted(this.getActiveWordRef());
      this.announceA11y(`Letter revealed: ${cellData.solution}`);
    }

    toggleSolution() {
      this.state.showSolution = !this.state.showSolution;
      const root = this.container;
      const btnText = root.querySelector('#cw-solution-btn-text');
      if (btnText) {
        btnText.textContent = this.state.showSolution ? 'Hide Solution' : 'Show Solution';
      }

      const { height, width, grid } = this.state;
      for (let r = 0; r < height; r++) {
        for (let c = 0; c < width; c++) {
          const cell = grid[r][c];
          if (!cell) continue;

          const charSpan = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"] .cw-cell-letter`);
          if (charSpan) {
            if (this.state.showSolution) {
              charSpan.textContent = cell.solution;
            } else {
              charSpan.textContent = cell.userChar || '';
            }
          }
        }
      }
    }

    checkWordCompleted(wordRef) {
      if (!wordRef) return;
      const { grid } = this.state;
      let isComplete = true;

      for (let i = 0; i < wordRef.len; i++) {
        const r = this.state.direction === 'across' ? wordRef.r : wordRef.r + i;
        const c = this.state.direction === 'across' ? wordRef.c + i : wordRef.c;
        if (grid[r][c].userChar !== grid[r][c].solution) {
          isComplete = false;
          break;
        }
      }

      if (isComplete) {
        this.playTone('word-complete');
        this.updateCompletedCounter();
      }
    }

    updateCompletedCounter() {
      const allClues = [...this.state.acrossClues, ...this.state.downClues];
      let completeCount = 0;

      allClues.forEach(clue => {
        let isDone = true;
        for (let i = 0; i < clue.len; i++) {
          const r = clue.r + (clue.word === clue.downWord?.word ? i : 0);
          const c = clue.c + (clue.word === clue.acrossWord?.word ? i : 0);
          if (this.state.grid[r][c].userChar !== this.state.grid[r][c].solution) {
            isDone = false;
            break;
          }
        }
        if (isDone) completeCount++;
      });

      const foundSpan = this.container.querySelector('#cw-found-count');
      if (foundSpan) foundSpan.textContent = completeCount;

      if (completeCount === allClues.length && allClues.length > 0) {
        this.triggerVictory();
      }
    }

    triggerVictory() {
      this.stopTimer();
      this.playTone('puzzle-complete');

      const banner = this.container.querySelector('#cw-victory-banner');
      const desc = this.container.querySelector('#cw-victory-desc');
      if (banner && desc) {
        const timeStr = this.formatTime(this.state.elapsedSeconds);
        desc.textContent = `You solved the entire crossword in ${timeStr}! Excellent work!`;
        banner.style.display = 'block';
        banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }

      this.announceA11y(`Congratulations! You solved the ${this.state.title} crossword puzzle in ${this.formatTime(this.state.elapsedSeconds)}!`);
    }

    resetPlayerGrid() {
      const { height, width, grid } = this.state;
      for (let r = 0; r < height; r++) {
        for (let c = 0; c < width; c++) {
          if (grid[r][c]) {
            grid[r][c].userChar = '';
            grid[r][c].isRevealed = false;
            this.updateCellDomChar(r, c, '');
          }
        }
      }

      const root = this.container;
      root.querySelectorAll('.cw-cell.is-hinted').forEach(el => el.classList.remove('is-hinted'));
      const foundSpan = root.querySelector('#cw-found-count');
      if (foundSpan) foundSpan.textContent = '0';
      const victory = root.querySelector('#cw-victory-banner');
      if (victory) victory.style.display = 'none';

      this.resetTimer();
      this.startTimer();
      this.announceA11y('Puzzle reset.');
    }

    // --- Typography & Accessibility Transforms ---
    applyDisplayTransformations() {
      const root = this.container;
      const board = root.querySelector('#cw-grid-board');
      const cluesBox = root.querySelector('#cw-clues-container');
      if (!board) return;

      board.classList.toggle('case-lower', this.state.caseMode === 'lower');
      board.classList.toggle('case-upper', this.state.caseMode === 'upper');
      board.classList.toggle('font-dyslexic', this.state.fontStyle === 'dyslexic');
      board.classList.toggle('font-mono', this.state.fontStyle === 'mono');

      if (cluesBox) {
        cluesBox.classList.toggle('font-dyslexic', this.state.fontStyle === 'dyslexic');
      }
    }

    // --- Timer Engine ---
    startTimer() {
      this.stopTimer();
      this.state.startTime = Date.now();
      this.state.elapsedSeconds = 0;
      this.updateTimerDisplay();

      this.state.timerInterval = setInterval(() => {
        this.state.elapsedSeconds = Math.floor((Date.now() - this.state.startTime) / 1000);
        this.updateTimerDisplay();
      }, 1000);
    }

    stopTimer() {
      if (this.state.timerInterval) {
        clearInterval(this.state.timerInterval);
        this.state.timerInterval = null;
      }
    }

    resetTimer() {
      this.stopTimer();
      this.state.elapsedSeconds = 0;
      this.updateTimerDisplay();
    }

    updateTimerDisplay() {
      const display = this.container.querySelector('#cw-timer-display');
      if (display) {
        display.textContent = this.formatTime(this.state.elapsedSeconds);
      }
    }

    formatTime(sec) {
      const m = Math.floor(sec / 60);
      const s = sec % 60;
      return `${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}`;
    }

    // --- Print Functionality ---
    printCrossword(isAnswerKey) {
      const root = this.container;
      const printTitle = root.querySelector('#cw-print-title-display');
      const printSubtitle = root.querySelector('#cw-print-subtitle-display');

      if (printTitle) {
        printTitle.textContent = isAnswerKey ? `${this.state.title} — TEACHER ANSWER KEY` : this.state.title;
      }
      if (printSubtitle) {
        printSubtitle.textContent = isAnswerKey
          ? 'Educator Answer Key & Complete Solution Reference. Keep for grading and review.'
          : (this.state.subtitle || 'Read the clues below and fill in the missing vocabulary terms.');
      }

      if (isAnswerKey) {
        root.classList.add('print-mode-answer-key');
        // Fill letters on grid
        const { height, width, grid } = this.state;
        for (let r = 0; r < height; r++) {
          for (let c = 0; c < width; c++) {
            if (grid[r][c]) {
              const charSpan = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"] .cw-cell-letter`);
              if (charSpan) charSpan.textContent = grid[r][c].solution;
            }
          }
        }
      } else {
        root.classList.remove('print-mode-answer-key');
        const { height, width, grid } = this.state;
        for (let r = 0; r < height; r++) {
          for (let c = 0; c < width; c++) {
            if (grid[r][c]) {
              const charSpan = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"] .cw-cell-letter`);
              if (charSpan) charSpan.textContent = grid[r][c].userChar || '';
            }
          }
        }
      }

      window.print();

      setTimeout(() => {
        root.classList.remove('print-mode-answer-key');
        if (!this.state.showSolution) {
          const { height, width, grid } = this.state;
          for (let r = 0; r < height; r++) {
            for (let c = 0; c < width; c++) {
              if (grid[r][c]) {
                const charSpan = root.querySelector(`.cw-cell[data-r="${r}"][data-c="${c}"] .cw-cell-letter`);
                if (charSpan) charSpan.textContent = grid[r][c].userChar || '';
              }
            }
          }
        }
      }, 1000);
    }

    copyShareLink() {
      try {
        const url = new URL(window.location.origin + '/pages/crossword.php');
        url.searchParams.set('title', this.state.title);
        url.searchParams.set('preset', this.container.querySelector('#cw-preset-select').value);

        navigator.clipboard.writeText(url.toString()).then(() => {
          alert('Crossword link copied to clipboard! You can share this URL directly with students or parents.');
        }).catch(() => {
          prompt('Copy this crossword link:', url.toString());
        });
      } catch (e) {
        alert('Could not copy link automatically.');
      }
    }

    announceA11y(msg) {
      const liveRegion = document.getElementById('a11y-live-region');
      if (liveRegion) liveRegion.textContent = msg;
    }
  }

  window.HLCrosswordStudio = CrosswordStudio;

})(window, document);
