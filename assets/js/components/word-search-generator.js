/**
 * Word Search & Vocabulary Puzzle Studio Engine
 * File: assets/js/components/word-search-generator.js
 * Comprehensive generator, interactive player, accessibility runner,
 * and print formatter for Hesten's Learning Parent & Teacher Suite.
 */

(function (window, document) {
  'use strict';

  // --- Curated Preset Dictionaries by Subject & Grade ---
  const PRESET_DICTIONARIES = {
    'math-elem': {
      title: 'Elementary Math Terms',
      desc: 'Foundational concepts for Grades 1–5',
      words: ['ADDITION', 'SUBTRACT', 'MULTIPLY', 'DIVIDE', 'FRACTION', 'DECIMAL', 'GEOMETRY', 'PERIMETER', 'POLYGON', 'PRODUCT', 'QUOTIENT', 'SYMMETRY']
    },
    'math-adv': {
      title: 'Middle & High School Math',
      desc: 'Algebra, Geometry, & Coordinate Systems',
      words: ['ALGEBRA', 'VARIABLE', 'EQUATION', 'EXPONENT', 'PARABOLA', 'HYPOTENUSE', 'QUADRATIC', 'POLYNOMIAL', 'SLOPE', 'FUNCTION', 'COORDINATE', 'THEOREM']
    },
    'ela-vocab': {
      title: 'Literature & Language Arts',
      desc: 'Figurative language & literary devices',
      words: ['METAPHOR', 'SIMILE', 'ALLITERATION', 'PROTAGONIST', 'ANTAGONIST', 'NARRATIVE', 'CONFLICT', 'STANZA', 'HYPERBOLE', 'SYNONYM', 'ANTONYM', 'PERSONIFY']
    },
    'science-nature': {
      title: 'Science & Ecosystems',
      desc: 'Life, Earth, and Physical sciences',
      words: ['ECOSYSTEM', 'PHOTOSYNTHESIS', 'MOLECULE', 'GRAVITY', 'HABITAT', 'ORGANISM', 'ATMOSPHERE', 'VELOCITY', 'ENERGY', 'VOLCANO', 'ADAPTATION', 'CELL']
    },
    'social-studies': {
      title: 'U.S. History & Civics',
      desc: 'Government, Constitution, & American history',
      words: ['DEMOCRACY', 'CONSTITUTION', 'AMENDMENT', 'CONGRESS', 'REVOLUTION', 'LIBERTY', 'CITIZEN', 'JUSTICE', 'TREATY', 'PRESIDENT', 'ELECTION', 'PATRIOT']
    },
    'sight-words': {
      title: 'Early Phonics & Sight Words',
      desc: 'High-frequency words for early readers',
      words: ['FRIEND', 'BECAUSE', 'SCHOOL', 'PEOPLE', 'FAMILY', 'LAUGH', 'ALWAYS', 'BEFORE', 'BRIGHT', 'AROUND', 'LISTEN', 'TOGETHER']
    }
  };

  // Harmonious Palette for Found Words (AAA contrast against text)
  const HIGHLIGHT_PALETTE = [
    { bg: 'rgba(59, 130, 246, 0.28)', border: '#2563eb', text: '#1e3a8a' }, // Blue
    { bg: 'rgba(16, 185, 129, 0.28)', border: '#059669', text: '#064e3b' }, // Emerald
    { bg: 'rgba(245, 158, 11, 0.28)', border: '#d97706', text: '#78350f' }, // Amber
    { bg: 'rgba(139, 92, 246, 0.28)', border: '#7c3aed', text: '#4c1d95' }, // Purple
    { bg: 'rgba(236, 72, 153, 0.28)', border: '#db2777', text: '#831843' }, // Pink
    { bg: 'rgba(14, 165, 233, 0.28)', border: '#0284c7', text: '#0c4a6e' }, // Sky
    { bg: 'rgba(249, 115, 22, 0.28)', border: '#ea580c', text: '#7c2d12' }, // Orange
    { bg: 'rgba(20, 184, 166, 0.28)', border: '#0d9488', text: '#134e4a' }, // Teal
    { bg: 'rgba(168, 85, 247, 0.28)', border: '#9333ea', text: '#581c87' }, // Violet
    { bg: 'rgba(234, 179, 8, 0.28)',  border: '#ca8a04', text: '#713f12' }  // Yellow
  ];

  // Directions Vectors [dr, dc, name]
  const DIRECTIONS = {
    E:  [0, 1, 'Horizontal (L→R)'],
    S:  [1, 0, 'Vertical (T↓B)'],
    SE: [1, 1, 'Diagonal (↘)'],
    SW: [1, -1, 'Diagonal (↙)'],
    W:  [0, -1, 'Horizontal Reverse (R←L)'],
    N:  [-1, 0, 'Vertical Reverse (B↑T)'],
    NW: [-1, -1, 'Diagonal (↖)'],
    NE: [-1, 1, 'Diagonal (↗)']
  };

  class WordSearchStudio {
    constructor(containerId, options = {}) {
      this.container = typeof containerId === 'string' ? document.getElementById(containerId) : containerId;
      if (!this.container) return;

      this.options = Object.assign({
        defaultGridSize: 12,
        defaultDifficulty: 'medium', // 'easy', 'medium', 'hard'
        defaultPreset: 'math-elem',
        allowCaseToggle: true,
        allowDyslexiaFont: true
      }, options);

      this.state = {
        title: 'Academic Word Search',
        subtitle: 'Find and circle all hidden vocabulary words.',
        gridSize: this.options.defaultGridSize,
        difficulty: this.options.defaultDifficulty,
        caseMode: 'upper', // 'upper' or 'lower'
        fontStyle: 'standard', // 'standard', 'dyslexic', 'mono'
        words: [],
        unplacedWords: [],
        grid: [],
        solutions: {}, // word -> { word, cells: [{r, c}], dir, color }
        foundWords: new Set(),
        showSolution: false,
        startTime: null,
        timerInterval: null,
        elapsedSeconds: 0,
        isSelecting: false,
        selectionStart: null,
        currentSelection: [],
        focusedCell: { r: 0, c: 0 },
        soundEnabled: true
      };

      this.audioCtx = null;
      this.init();
    }

    init() {
      this.renderWorkspace();
      this.bindControls();
      this.loadPreset(this.options.defaultPreset);
    }

    // --- Web Audio Synthesizer for Clean Positive Audio ---
    playTone(type) {
      if (!this.state.soundEnabled) return;
      try {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;
        if (!this.audioCtx) this.audioCtx = new AudioContext();
        if (this.audioCtx.state === 'suspended') {
          this.audioCtx.resume();
        }

        const now = this.audioCtx.currentTime;
        if (type === 'found') {
          // Cheerful ascending arpeggio (C5 -> E5 -> G5)
          const notes = [523.25, 659.25, 783.99];
          notes.forEach((freq, idx) => {
            const osc = this.audioCtx.createOscillator();
            const gain = this.audioCtx.createGain();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(freq, now + idx * 0.08);
            gain.gain.setValueAtTime(0.12, now + idx * 0.08);
            gain.gain.exponentialRampToValueAtTime(0.001, now + idx * 0.08 + 0.25);
            osc.connect(gain);
            gain.connect(this.audioCtx.destination);
            osc.start(now + idx * 0.08);
            osc.stop(now + idx * 0.08 + 0.26);
          });
        } else if (type === 'complete') {
          // Triumphant victory chords
          const victoryNotes = [523.25, 659.25, 783.99, 1046.5];
          victoryNotes.forEach((freq, idx) => {
            const osc = this.audioCtx.createOscillator();
            const gain = this.audioCtx.createGain();
            osc.type = 'triangle';
            osc.frequency.setValueAtTime(freq, now + idx * 0.1);
            gain.gain.setValueAtTime(0.15, now + idx * 0.1);
            gain.gain.exponentialRampToValueAtTime(0.001, now + idx * 0.1 + 0.45);
            osc.connect(gain);
            gain.connect(this.audioCtx.destination);
            osc.start(now + idx * 0.1);
            osc.stop(now + idx * 0.1 + 0.46);
          });
        } else if (type === 'select') {
          const osc = this.audioCtx.createOscillator();
          const gain = this.audioCtx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(440, now);
          gain.gain.setValueAtTime(0.04, now);
          gain.gain.exponentialRampToValueAtTime(0.001, now + 0.05);
          osc.connect(gain);
          gain.connect(this.audioCtx.destination);
          osc.start(now);
          osc.stop(now + 0.06);
        }
      } catch (e) {
        // Audio error ignored safely
      }
    }

    // --- HTML Workspace Template ---
    renderWorkspace() {
      this.container.innerHTML = `
        <div class="ws-studio-wrapper" id="ws-studio-root">
          <!-- Printable Sheet Header (Displays only when printing) -->
          <div class="ws-print-header" aria-hidden="true">
            <div class="ws-print-top-line">
              <div class="ws-print-field"><strong>Name:</strong> ____________________________________</div>
              <div class="ws-print-field"><strong>Date:</strong> ________________________</div>
              <div class="ws-print-field"><strong>Score:</strong> _______ / <span id="ws-print-score-total">0</span></div>
            </div>
            <h1 class="ws-print-title" id="ws-print-title-display">Academic Word Search</h1>
            <p class="ws-print-instructions" id="ws-print-subtitle-display">Find and circle all hidden vocabulary words.</p>
          </div>

          <!-- Main Interactive Studio Layout -->
          <div class="ws-studio-layout">
            <!-- Sidebar: Config & Controls (Hidden in Print) -->
            <aside class="ws-sidebar no-print" aria-label="Word Search Configuration">
              <div class="ws-panel ws-config-panel">
                <div class="ws-panel-header">
                  <h2 class="ws-panel-title">
                    <i class="fas fa-sliders-h" style="color: var(--color-primary);"></i> Puzzle Settings
                  </h2>
                </div>

                <!-- Presets Selector -->
                <div class="ws-form-group">
                  <label for="ws-preset-select" class="ws-label">
                    <i class="fas fa-book-reader"></i> Preset Vocabulary Pack:
                  </label>
                  <select id="ws-preset-select" class="ws-select">
                    <option value="custom">✍️ Custom Word List</option>
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

                <!-- Puzzle Title & Subtitle -->
                <div class="ws-form-row">
                  <div class="ws-form-group">
                    <label for="ws-input-title" class="ws-label">Worksheet Title:</label>
                    <input type="text" id="ws-input-title" class="ws-input" value="Elementary Math Terms" placeholder="e.g. Unit 3 Spelling Review">
                  </div>
                </div>

                <!-- Word Input Box -->
                <div class="ws-form-group">
                  <div class="ws-label-row">
                    <label for="ws-words-input" class="ws-label">Word List (separated by commas or new lines):</label>
                    <span class="ws-badge-count" id="ws-word-count-badge">12 Words</span>
                  </div>
                  <textarea id="ws-words-input" class="ws-textarea" rows="4" placeholder="ADDITION, FRACTION, GEOMETRY, DECIMAL..."></textarea>
                  <span class="ws-hint">Letters only. Minimum 3 letters per word. Maximum 20 words recommended.</span>
                </div>

                <!-- Grid Dimensions & Difficulty Grid -->
                <div class="ws-form-grid-2">
                  <div class="ws-form-group">
                    <label for="ws-grid-size" class="ws-label">Grid Size:</label>
                    <select id="ws-grid-size" class="ws-select">
                      <option value="10">10 × 10 (Easy / Younger)</option>
                      <option value="12" selected>12 × 12 (Standard)</option>
                      <option value="15">15 × 15 (Challenging)</option>
                      <option value="18">18 × 18 (Advanced / High School)</option>
                      <option value="20">20 × 20 (Mastery)</option>
                    </select>
                  </div>

                  <div class="ws-form-group">
                    <label for="ws-difficulty" class="ws-label">Directions:</label>
                    <select id="ws-difficulty" class="ws-select">
                      <option value="easy">Easy (Across &amp; Down only)</option>
                      <option value="medium" selected>Medium (+ Diagonals)</option>
                      <option value="hard">Hard (+ Backwards all ways)</option>
                    </select>
                  </div>
                </div>

                <!-- Typography & Accessibility Presets -->
                <div class="ws-form-grid-2">
                  <div class="ws-form-group">
                    <label for="ws-case-select" class="ws-label">Letter Case:</label>
                    <select id="ws-case-select" class="ws-select">
                      <option value="upper" selected>UPPERCASE (Standard)</option>
                      <option value="lower">lowercase (Early Readers)</option>
                    </select>
                  </div>
                  <div class="ws-form-group">
                    <label for="ws-font-select" class="ws-label">Typeface:</label>
                    <select id="ws-font-select" class="ws-select">
                      <option value="standard" selected>Modern Sans</option>
                      <option value="dyslexic">OpenDyslexic (Reading Aid)</option>
                      <option value="mono">Clean Monospace</option>
                    </select>
                  </div>
                </div>

                <!-- Generate Action Button -->
                <div class="ws-actions-group">
                  <button type="button" id="ws-btn-generate" class="ws-btn ws-btn-primary ws-btn-block">
                    <i class="fas fa-magic"></i> Generate New Puzzle
                  </button>
                </div>
              </div>

              <!-- Print & Export Hub -->
              <div class="ws-panel ws-export-panel">
                <div class="ws-panel-header">
                  <h3 class="ws-panel-title">
                    <i class="fas fa-print" style="color: #059669;"></i> Print &amp; PDF Options
                  </h3>
                </div>
                <p class="ws-panel-desc">Formatted for crisp 8.5" × 11" paper with student name lines and answer keys.</p>

                <div class="ws-btn-stack">
                  <button type="button" id="ws-btn-print-student" class="ws-btn ws-btn-outline ws-btn-block">
                    <i class="fas fa-file-alt"></i> Print Blank Student Worksheet
                  </button>
                  <button type="button" id="ws-btn-print-key" class="ws-btn ws-btn-outline ws-btn-block">
                    <i class="fas fa-check-double"></i> Print Educator Answer Key
                  </button>
                  <button type="button" id="ws-btn-share-link" class="ws-btn ws-btn-subtle ws-btn-block">
                    <i class="fas fa-link"></i> Copy Shareable Link
                  </button>
                </div>
              </div>
            </aside>

            <!-- Main Interactive Display Zone -->
            <main class="ws-content-area" aria-label="Interactive Word Search Game">
              <!-- Top Game Status Toolbar (No Print) -->
              <div class="ws-toolbar no-print">
                <div class="ws-toolbar-left">
                  <div class="ws-stat-chip">
                    <i class="fas fa-bullseye" style="color: var(--color-primary);"></i>
                    <span>Found: <strong id="ws-found-count">0</strong> / <strong id="ws-total-count">0</strong></span>
                  </div>
                  <div class="ws-stat-chip" id="ws-timer-chip">
                    <i class="fas fa-stopwatch" style="color: #f59e0b;"></i>
                    <span id="ws-timer-display">00:00</span>
                  </div>
                </div>

                <div class="ws-toolbar-right">
                  <button type="button" id="ws-btn-hint" class="ws-btn ws-btn-sm ws-btn-warning" title="Reveal the first letter of an unfound word">
                    <i class="fas fa-lightbulb"></i> Hint
                  </button>
                  <button type="button" id="ws-btn-toggle-solution" class="ws-btn ws-btn-sm ws-btn-subtle" title="Show or hide all word positions">
                    <i class="fas fa-eye"></i> <span id="ws-solution-btn-text">Show Solution</span>
                  </button>
                  <button type="button" id="ws-btn-reset-play" class="ws-btn ws-btn-sm ws-btn-subtle" title="Clear player marks and restart timer">
                    <i class="fas fa-redo"></i> Reset
                  </button>
                  <button type="button" id="ws-btn-audio-toggle" class="ws-btn ws-btn-icon" aria-label="Toggle Sound Effects" title="Sound Mute/Unmute">
                    <i class="fas fa-volume-up" id="ws-audio-icon"></i>
                  </button>
                </div>
              </div>

              <!-- Unplaced Words Alert Banner (Hidden when all fit) -->
              <div id="ws-unplaced-alert" class="ws-alert ws-alert-warning no-print" style="display: none;" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                  <strong>Notice:</strong> Some words could not fit in the current grid size:
                  <span id="ws-unplaced-list"></span>. Try selecting a larger grid size or shorter words.
                </div>
              </div>

              <!-- Complete Celebration Banner -->
              <div id="ws-victory-banner" class="ws-victory-banner no-print" style="display: none;" role="status" aria-live="polite">
                <div class="ws-victory-content">
                  <div class="ws-victory-icon">
                    <i class="fas fa-trophy"></i>
                  </div>
                  <div>
                    <h3 class="ws-victory-title">Outstanding Vocabulary Mastery! 🎉</h3>
                    <p class="ws-victory-desc" id="ws-victory-desc">You found all words in 00:00!</p>
                  </div>
                  <div class="ws-victory-actions">
                    <button type="button" id="ws-btn-play-again" class="ws-btn ws-btn-primary">
                      <i class="fas fa-sparkles"></i> Play Another
                    </button>
                  </div>
                </div>
              </div>

              <!-- Interactive Puzzle Board & Word Bank Layout -->
              <div class="ws-board-layout" id="ws-board-layout">
                <!-- Grid Container -->
                <div class="ws-grid-container" id="ws-grid-container">
                  <div class="ws-grid-table" id="ws-grid-table" role="grid" aria-label="Word Search Letter Grid" tabindex="0">
                    <!-- Letter cells injected dynamically -->
                  </div>
                  <div class="ws-keyboard-help no-print">
                    <small><i class="fas fa-keyboard"></i> <strong>How to play:</strong> Click and drag across words, or click the first then last letter. On keyboard: navigate with arrow keys, press <strong>Space</strong> to anchor start, arrows to drag, and <strong>Enter</strong> to complete.</small>
                  </div>
                </div>

                <!-- Word Bank Container -->
                <div class="ws-word-bank-container" id="ws-word-bank-container">
                  <div class="ws-word-bank-header">
                    <h3 class="ws-word-bank-title">
                      <i class="fas fa-list-check" style="color: var(--color-primary);"></i> Word Bank
                    </h3>
                    <span class="ws-word-bank-status no-print" id="ws-bank-status-text">Find each word below:</span>
                  </div>

                  <ul class="ws-word-bank-list" id="ws-word-bank-list" aria-label="Words to find">
                    <!-- Word items injected dynamically -->
                  </ul>
                </div>
              </div>

              <!-- Printable Answer Key Coordinates Index (Visible only in Print when Answer Key requested) -->
              <div class="ws-print-key-index" id="ws-print-key-index" style="display: none;">
                <h3>Educator Answer Key &amp; Coordinate Index</h3>
                <div class="ws-print-key-grid" id="ws-print-key-grid"></div>
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
      const presetSelect = root.querySelector('#ws-preset-select');
      if (presetSelect) {
        presetSelect.addEventListener('change', (e) => {
          if (e.target.value !== 'custom') {
            this.loadPreset(e.target.value);
          }
        });
      }

      // Title & Textarea
      const wordsInput = root.querySelector('#ws-words-input');
      const titleInput = root.querySelector('#ws-input-title');
      if (wordsInput) {
        wordsInput.addEventListener('input', () => {
          if (presetSelect.value !== 'custom') {
            presetSelect.value = 'custom';
          }
          this.updateWordCountBadge();
        });
      }

      if (titleInput) {
        titleInput.addEventListener('input', (e) => {
          this.state.title = e.target.value || 'Academic Word Search';
          const printTitle = root.querySelector('#ws-print-title-display');
          if (printTitle) printTitle.textContent = this.state.title;
        });
      }

      // Grid Size, Difficulty, Case, Font
      const sizeSelect = root.querySelector('#ws-grid-size');
      if (sizeSelect) {
        sizeSelect.addEventListener('change', (e) => {
          this.state.gridSize = parseInt(e.target.value, 10);
        });
      }

      const diffSelect = root.querySelector('#ws-difficulty');
      if (diffSelect) {
        diffSelect.addEventListener('change', (e) => {
          this.state.difficulty = e.target.value;
        });
      }

      const caseSelect = root.querySelector('#ws-case-select');
      if (caseSelect) {
        caseSelect.addEventListener('change', (e) => {
          this.state.caseMode = e.target.value;
          this.applyDisplayTransformations();
        });
      }

      const fontSelect = root.querySelector('#ws-font-select');
      if (fontSelect) {
        fontSelect.addEventListener('change', (e) => {
          this.state.fontStyle = e.target.value;
          this.applyDisplayTransformations();
        });
      }

      // Generate Button
      const genBtn = root.querySelector('#ws-btn-generate');
      if (genBtn) {
        genBtn.addEventListener('click', () => {
          this.generateFromInputs();
        });
      }

      // Solution Toggle
      const solBtn = root.querySelector('#ws-btn-toggle-solution');
      if (solBtn) {
        solBtn.addEventListener('click', () => {
          this.toggleSolution();
        });
      }

      // Hint Button
      const hintBtn = root.querySelector('#ws-btn-hint');
      if (hintBtn) {
        hintBtn.addEventListener('click', () => {
          this.triggerHint();
        });
      }

      // Reset Play Button
      const resetBtn = root.querySelector('#ws-btn-reset-play');
      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.resetPlayerProgress();
        });
      }

      // Audio Toggle Button
      const audioBtn = root.querySelector('#ws-btn-audio-toggle');
      if (audioBtn) {
        audioBtn.addEventListener('click', () => {
          this.state.soundEnabled = !this.state.soundEnabled;
          const icon = root.querySelector('#ws-audio-icon');
          if (icon) {
            icon.className = this.state.soundEnabled ? 'fas fa-volume-up' : 'fas fa-volume-mute';
          }
        });
      }

      // Play Again Button
      const playAgainBtn = root.querySelector('#ws-btn-play-again');
      if (playAgainBtn) {
        playAgainBtn.addEventListener('click', () => {
          this.generateFromInputs();
        });
      }

      // Print Buttons
      const printStudentBtn = root.querySelector('#ws-btn-print-student');
      if (printStudentBtn) {
        printStudentBtn.addEventListener('click', () => {
          this.printWorksheet(false);
        });
      }

      const printKeyBtn = root.querySelector('#ws-btn-print-key');
      if (printKeyBtn) {
        printKeyBtn.addEventListener('click', () => {
          this.printWorksheet(true);
        });
      }

      // Share Link Button
      const shareBtn = root.querySelector('#ws-btn-share-link');
      if (shareBtn) {
        shareBtn.addEventListener('click', () => {
          this.copyShareLink();
        });
      }

      // Grid Global Mouse/Touch Listeners
      document.addEventListener('mouseup', () => {
        if (this.state.isSelecting) {
          this.finishSelection();
        }
      });

      document.addEventListener('touchend', () => {
        if (this.state.isSelecting) {
          this.finishSelection();
        }
      });
    }

    // --- Load Preset Dictionaries ---
    loadPreset(presetKey) {
      const preset = PRESET_DICTIONARIES[presetKey] || PRESET_DICTIONARIES['math-elem'];
      const root = this.container;

      const titleInput = root.querySelector('#ws-input-title');
      const wordsInput = root.querySelector('#ws-words-input');
      const presetSelect = root.querySelector('#ws-preset-select');

      if (titleInput) titleInput.value = preset.title;
      if (wordsInput) wordsInput.value = preset.words.join(', ');
      if (presetSelect) presetSelect.value = presetKey;

      this.state.title = preset.title;
      this.state.subtitle = preset.desc;

      this.updateWordCountBadge();
      this.generateFromInputs();
    }

    updateWordCountBadge() {
      const wordsInput = this.container.querySelector('#ws-words-input');
      const badge = this.container.querySelector('#ws-word-count-badge');
      if (!wordsInput || !badge) return;

      const raw = wordsInput.value || '';
      const list = raw.split(/[\n,;]+/).map(w => w.trim()).filter(w => w.length > 0);
      badge.textContent = `${list.length} Word${list.length === 1 ? '' : 's'}`;
    }

    // --- Generation Algorithm ---
    generateFromInputs() {
      const root = this.container;
      const titleInput = root.querySelector('#ws-input-title');
      const wordsInput = root.querySelector('#ws-words-input');
      const sizeSelect = root.querySelector('#ws-grid-size');
      const diffSelect = root.querySelector('#ws-difficulty');

      const title = (titleInput && titleInput.value.trim()) || 'Academic Word Search';
      const rawWords = (wordsInput && wordsInput.value) || '';
      const size = sizeSelect ? parseInt(sizeSelect.value, 10) : 12;
      const diff = diffSelect ? diffSelect.value : 'medium';

      this.state.title = title;
      this.state.gridSize = Math.max(8, Math.min(25, size));
      this.state.difficulty = diff;

      // Sanitize words
      const sanitized = [];
      const seen = new Set();
      const rawList = rawWords.split(/[\n,;]+/).map(w => w.trim().toUpperCase());

      for (const word of rawList) {
        // Strip accents & non-alpha
        const cleaned = word.replace(/[^A-Z]/g, '');
        if (cleaned.length >= 2 && !seen.has(cleaned)) {
          seen.add(cleaned);
          sanitized.push(cleaned);
        }
      }

      if (sanitized.length === 0) {
        alert('Please enter at least 1 valid word (at least 2 letters, letters only).');
        return;
      }

      // Check if words can fit in grid
      const validForGrid = sanitized.filter(w => w.length <= this.state.gridSize);
      if (validForGrid.length === 0) {
        alert(`All provided words are longer than the selected grid size (${this.state.gridSize}×${this.state.gridSize}). Please increase grid size.`);
        return;
      }

      this.generateGrid(validForGrid);
    }

    generateGrid(words) {
      const N = this.state.gridSize;
      const diff = this.state.difficulty;

      // Determine Allowed Directions based on difficulty
      let allowedDirKeys = ['E', 'S'];
      if (diff === 'medium') {
        allowedDirKeys = ['E', 'S', 'SE', 'SW'];
      } else if (diff === 'hard') {
        allowedDirKeys = ['E', 'S', 'SE', 'SW', 'W', 'N', 'NW', 'NE'];
      }

      // Sort words longest to shortest for better packing density
      const sortedWords = [...words].sort((a, b) => b.length - a.length);

      let bestGrid = null;
      let bestSolutions = {};
      let bestPlacedCount = -1;
      let bestUnplaced = [];

      // Run multiple layout attempts to find optimal word packing
      const MAX_GRID_ATTEMPTS = 25;
      for (let attempt = 0; attempt < MAX_GRID_ATTEMPTS; attempt++) {
        const grid = Array.from({ length: N }, () => Array(N).fill(''));
        const solutions = {};
        const placed = [];
        const unplaced = [];

        for (let wIdx = 0; wIdx < sortedWords.length; wIdx++) {
          const word = sortedWords[wIdx];
          const colorObj = HIGHLIGHT_PALETTE[wIdx % HIGHLIGHT_PALETTE.length];

          // Try random positions & directions
          let placedThisWord = false;
          const CANDIDATE_TRIES = 120;

          // Shuffle directions for organic placement
          const shuffledDirs = [...allowedDirKeys].sort(() => Math.random() - 0.5);

          for (let t = 0; t < CANDIDATE_TRIES && !placedThisWord; t++) {
            const dirKey = shuffledDirs[t % shuffledDirs.length];
            const [dr, dc, dirName] = DIRECTIONS[dirKey];

            // Calculate valid row/col bounds for this direction
            const minR = dr < 0 ? word.length - 1 : 0;
            const maxR = dr > 0 ? N - word.length : N - 1;
            const minC = dc < 0 ? word.length - 1 : 0;
            const maxC = dc > 0 ? N - word.length : N - 1;

            if (minR > maxR || minC > maxC) continue;

            const startR = Math.floor(Math.random() * (maxR - minR + 1)) + minR;
            const startC = Math.floor(Math.random() * (maxC - minC + 1)) + minC;

            // Verify if word fits without collisions
            let canPlace = true;
            for (let i = 0; i < word.length; i++) {
              const r = startR + i * dr;
              const c = startC + i * dc;
              const currentCell = grid[r][c];
              if (currentCell !== '' && currentCell !== word[i]) {
                canPlace = false;
                break;
              }
            }

            if (canPlace) {
              const cells = [];
              for (let i = 0; i < word.length; i++) {
                const r = startR + i * dr;
                const c = startC + i * dc;
                grid[r][c] = word[i];
                cells.push({ r, c });
              }

              solutions[word] = {
                word,
                cells,
                dirKey,
                dirName,
                start: { r: startR, c: startC },
                end: { r: startR + (word.length - 1) * dr, c: startC + (word.length - 1) * dc },
                color: colorObj
              };
              placed.push(word);
              placedThisWord = true;
            }
          }

          if (!placedThisWord) {
            unplaced.push(word);
          }
        }

        if (placed.length > bestPlacedCount) {
          bestPlacedCount = placed.length;
          bestGrid = grid;
          bestSolutions = solutions;
          bestUnplaced = unplaced;

          // If all words placed successfully, break early
          if (unplaced.length === 0) break;
        }
      }

      // Fill remaining empty cells with random letters (A-Z with standard English weighting)
      const alphabet = 'EEEEEEEEAAAAAAAIIIIIOOOOONNNNPRRRRSSSSTTTTDDLLGGBCMKFPVWYZJXQ';
      for (let r = 0; r < N; r++) {
        for (let c = 0; c < N; c++) {
          if (bestGrid[r][c] === '') {
            const randChar = alphabet[Math.floor(Math.random() * alphabet.length)];
            bestGrid[r][c] = randChar;
          }
        }
      }

      this.state.grid = bestGrid;
      this.state.solutions = bestSolutions;
      this.state.words = Object.keys(bestSolutions);
      this.state.unplacedWords = bestUnplaced;
      this.state.foundWords = new Set();
      this.state.showSolution = false;

      // Update UI elements
      this.renderGridDom();
      this.renderWordBankDom();
      this.updateUnplacedWarning();
      this.resetTimer();
      this.startTimer();
      this.applyDisplayTransformations();

      // Live accessibility announcement
      this.announceA11y(`Word Search Generated: ${this.state.title}. ${this.state.words.length} words to find.`);
    }

    // --- DOM Rendering for Grid ---
    renderGridDom() {
      const root = this.container;
      const gridTable = root.querySelector('#ws-grid-table');
      if (!gridTable) return;

      gridTable.innerHTML = '';
      const N = this.state.gridSize;

      // Dynamic CSS Grid Layout with responsive cell sizing
      gridTable.style.gridTemplateColumns = `repeat(${N}, 1fr)`;
      gridTable.style.gridTemplateRows = `repeat(${N}, 1fr)`;

      for (let r = 0; r < N; r++) {
        for (let c = 0; c < N; c++) {
          const letter = this.state.grid[r][c];
          const cell = document.createElement('div');
          cell.className = 'ws-cell';
          cell.setAttribute('data-r', r);
          cell.setAttribute('data-c', c);
          cell.setAttribute('role', 'gridcell');
          cell.setAttribute('tabindex', (r === 0 && c === 0) ? '0' : '-1');
          cell.setAttribute('aria-label', `Row ${r + 1}, Column ${c + 1}: ${letter}`);
          cell.textContent = letter;

          // Pointer/Touch interactions
          cell.addEventListener('mousedown', (e) => this.handleCellMouseDown(r, c, e));
          cell.addEventListener('mouseenter', () => this.handleCellMouseEnter(r, c));
          cell.addEventListener('touchstart', (e) => this.handleCellTouchStart(r, c, e), { passive: false });
          cell.addEventListener('touchmove', (e) => this.handleCellTouchMove(e), { passive: false });

          // Keyboard interactions
          cell.addEventListener('keydown', (e) => this.handleCellKeyDown(r, c, e));

          gridTable.appendChild(cell);
        }
      }
    }

    // --- DOM Rendering for Word Bank ---
    renderWordBankDom() {
      const root = this.container;
      const bankList = root.querySelector('#ws-word-bank-list');
      const totalCountSpan = root.querySelector('#ws-total-count');
      const foundCountSpan = root.querySelector('#ws-found-count');
      const printScoreTotal = root.querySelector('#ws-print-score-total');

      if (!bankList) return;
      bankList.innerHTML = '';

      const total = this.state.words.length;
      if (totalCountSpan) totalCountSpan.textContent = total;
      if (foundCountSpan) foundCountSpan.textContent = '0';
      if (printScoreTotal) printScoreTotal.textContent = total;

      // Sort alphabetically for student clarity
      const sorted = [...this.state.words].sort();

      sorted.forEach(word => {
        const item = document.createElement('li');
        item.className = 'ws-bank-item';
        item.setAttribute('data-word', word);
        item.innerHTML = `
          <span class="ws-bank-checkbox" aria-hidden="true"><i class="fas fa-square"></i></span>
          <span class="ws-bank-word-text">${word}</span>
        `;
        bankList.appendChild(item);
      });

      // Update Print Key Index
      this.renderPrintKeyCoordinates();
    }

    renderPrintKeyCoordinates() {
      const keyGrid = this.container.querySelector('#ws-print-key-grid');
      if (!keyGrid) return;
      keyGrid.innerHTML = '';

      const sorted = [...this.state.words].sort();
      sorted.forEach(word => {
        const sol = this.state.solutions[word];
        if (!sol) return;
        const div = document.createElement('div');
        div.className = 'ws-key-item';
        div.innerHTML = `
          <strong>${word}:</strong> Row ${sol.start.r + 1}, Col ${sol.start.c + 1} &rarr; ${sol.dirName}
        `;
        keyGrid.appendChild(div);
      });
    }

    updateUnplacedWarning() {
      const alertBox = this.container.querySelector('#ws-unplaced-alert');
      const listSpan = this.container.querySelector('#ws-unplaced-list');
      if (!alertBox || !listSpan) return;

      if (this.state.unplacedWords && this.state.unplacedWords.length > 0) {
        listSpan.textContent = this.state.unplacedWords.join(', ');
        alertBox.style.display = 'flex';
      } else {
        alertBox.style.display = 'none';
      }
    }

    // --- Interactive Mouse & Touch Drag Selection ---
    handleCellMouseDown(r, c, e) {
      if (e && e.button !== 0) return; // Left click only
      this.startSelection(r, c);
    }

    handleCellMouseEnter(r, c) {
      if (this.state.isSelecting) {
        this.updateSelection(r, c);
      }
    }

    handleCellTouchStart(r, c, e) {
      if (e.touches.length > 1) return;
      e.preventDefault();
      this.startSelection(r, c);
    }

    handleCellTouchMove(e) {
      if (!this.state.isSelecting) return;
      e.preventDefault();
      const touch = e.touches[0];
      const target = document.elementFromPoint(touch.clientX, touch.clientY);
      if (target && target.classList.contains('ws-cell')) {
        const r = parseInt(target.getAttribute('data-r'), 10);
        const c = parseInt(target.getAttribute('data-c'), 10);
        this.updateSelection(r, c);
      }
    }

    startSelection(r, c) {
      this.state.isSelecting = true;
      this.state.selectionStart = { r, c };
      this.state.currentSelection = [{ r, c }];
      this.playTone('select');
      this.highlightActiveSelection();
    }

    updateSelection(r, c) {
      if (!this.state.isSelecting || !this.state.selectionStart) return;

      const start = this.state.selectionStart;
      const dr = r - start.r;
      const dc = c - start.c;

      // Must form a straight line: horizontal, vertical, or 45-degree diagonal
      const isHorizontal = dr === 0;
      const isVertical = dc === 0;
      const isDiagonal = Math.abs(dr) === Math.abs(dc);

      if (!isHorizontal && !isVertical && !isDiagonal) return;

      const steps = Math.max(Math.abs(dr), Math.abs(dc));
      const stepR = dr === 0 ? 0 : dr / steps;
      const stepC = dc === 0 ? 0 : dc / steps;

      const newSelection = [];
      for (let i = 0; i <= steps; i++) {
        newSelection.push({
          r: start.r + i * stepR,
          c: start.c + i * stepC
        });
      }

      this.state.currentSelection = newSelection;
      this.highlightActiveSelection();
    }

    finishSelection() {
      if (!this.state.isSelecting) return;
      this.state.isSelecting = false;

      const sel = this.state.currentSelection;
      if (!sel || sel.length < 2) {
        this.clearActiveSelectionHighlight();
        return;
      }

      // Read letters in order
      const letters = sel.map(pt => this.state.grid[pt.r][pt.c]).join('');
      const reverseLetters = letters.split('').reverse().join('');

      // Check against words
      let matchedWord = null;
      if (this.state.solutions[letters] && !this.state.foundWords.has(letters)) {
        matchedWord = letters;
      } else if (this.state.solutions[reverseLetters] && !this.state.foundWords.has(reverseLetters)) {
        matchedWord = reverseLetters;
      }

      if (matchedWord) {
        this.markWordFound(matchedWord);
      } else {
        this.clearActiveSelectionHighlight();
      }
    }

    // --- Keyboard Accessible Gameplay ---
    handleCellKeyDown(r, c, e) {
      const N = this.state.gridSize;
      let nextR = r;
      let nextC = c;

      if (e.key === 'ArrowRight') {
        nextC = (c + 1) % N;
      } else if (e.key === 'ArrowLeft') {
        nextC = (c - 1 + N) % N;
      } else if (e.key === 'ArrowDown') {
        nextR = (r + 1) % N;
      } else if (e.key === 'ArrowUp') {
        nextR = (r - 1 + N) % N;
      } else if (e.key === ' ' || e.key === 'Enter') {
        e.preventDefault();
        if (!this.state.isSelecting) {
          // Anchor selection start
          this.startSelection(r, c);
          this.announceA11y(`Selection started at row ${r + 1}, column ${c + 1}. Move with arrow keys, then press Enter.`);
        } else {
          // Finish selection
          this.finishSelection();
        }
        return;
      } else if (e.key === 'Escape') {
        this.state.isSelecting = false;
        this.clearActiveSelectionHighlight();
        this.announceA11y('Selection cancelled.');
        return;
      } else {
        return; // default key behavior
      }

      e.preventDefault();
      this.focusCell(nextR, nextC);

      if (this.state.isSelecting) {
        this.updateSelection(nextR, nextC);
      }
    }

    focusCell(r, c) {
      const root = this.container;
      const prev = root.querySelector('.ws-cell:focus');
      if (prev) prev.setAttribute('tabindex', '-1');

      const target = root.querySelector(`.ws-cell[data-r="${r}"][data-c="${c}"]`);
      if (target) {
        target.setAttribute('tabindex', '0');
        target.focus();
        this.state.focusedCell = { r, c };
      }
    }

    // --- Highlighting Engine ---
    highlightActiveSelection() {
      const root = this.container;
      root.querySelectorAll('.ws-cell.is-selecting').forEach(el => el.classList.remove('is-selecting'));

      if (!this.state.currentSelection) return;
      this.state.currentSelection.forEach(pt => {
        const el = root.querySelector(`.ws-cell[data-r="${pt.r}"][data-c="${pt.c}"]`);
        if (el) el.classList.add('is-selecting');
      });
    }

    clearActiveSelectionHighlight() {
      const root = this.container;
      root.querySelectorAll('.ws-cell.is-selecting').forEach(el => el.classList.remove('is-selecting'));
      this.state.currentSelection = [];
      this.state.selectionStart = null;
    }

    markWordFound(word) {
      this.state.foundWords.add(word);
      const sol = this.state.solutions[word];
      const color = sol.color;

      this.clearActiveSelectionHighlight();

      // Permanent grid mark
      sol.cells.forEach(pt => {
        const cell = this.container.querySelector(`.ws-cell[data-r="${pt.r}"][data-c="${pt.c}"]`);
        if (cell) {
          cell.classList.add('is-found');
          cell.style.setProperty('--found-bg', color.bg);
          cell.style.setProperty('--found-border', color.border);
          cell.style.setProperty('--found-color', color.text);
        }
      });

      // Update Word Bank Item
      const bankItem = this.container.querySelector(`.ws-bank-item[data-word="${word}"]`);
      if (bankItem) {
        bankItem.classList.add('is-found');
        const icon = bankItem.querySelector('.ws-bank-checkbox i');
        if (icon) icon.className = 'fas fa-check-square';
        bankItem.style.setProperty('--found-color', color.border);
      }

      // Update Counter
      const foundCount = this.state.foundWords.size;
      const totalCount = this.state.words.length;
      const foundSpan = this.container.querySelector('#ws-found-count');
      if (foundSpan) foundSpan.textContent = foundCount;

      this.playTone('found');
      this.announceA11y(`Great job! Found word: ${word}. ${foundCount} of ${totalCount} words found.`);

      // Check Victory Condition
      if (foundCount === totalCount) {
        this.triggerVictory();
      }
    }

    // --- Victory State & Celebration ---
    triggerVictory() {
      this.stopTimer();
      this.playTone('complete');

      const banner = this.container.querySelector('#ws-victory-banner');
      const desc = this.container.querySelector('#ws-victory-desc');
      if (banner && desc) {
        const timeStr = this.formatTime(this.state.elapsedSeconds);
        desc.textContent = `You found all ${this.state.words.length} vocabulary terms in ${timeStr}!`;
        banner.style.display = 'block';
        banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }

      this.announceA11y(`Congratulations! You completed the ${this.state.title} word search in ${this.formatTime(this.state.elapsedSeconds)}!`);
    }

    // --- Solution Revealer & Hints ---
    toggleSolution() {
      this.state.showSolution = !this.state.showSolution;
      const root = this.container;
      const btnText = root.querySelector('#ws-solution-btn-text');

      if (btnText) {
        btnText.textContent = this.state.showSolution ? 'Hide Solution' : 'Show Solution';
      }

      this.state.words.forEach(word => {
        const sol = this.state.solutions[word];
        if (!sol) return;
        sol.cells.forEach(pt => {
          const cell = root.querySelector(`.ws-cell[data-r="${pt.r}"][data-c="${pt.c}"]`);
          if (cell) {
            if (this.state.showSolution) {
              cell.classList.add('is-solution-revealed');
              cell.style.setProperty('--sol-border', sol.color.border);
              cell.style.setProperty('--sol-bg', sol.color.bg);
            } else {
              cell.classList.remove('is-solution-revealed');
              cell.style.removeProperty('--sol-border');
              cell.style.removeProperty('--sol-bg');
            }
          }
        });
      });
    }

    triggerHint() {
      // Find first unfound word
      const unfound = this.state.words.filter(w => !this.state.foundWords.has(w));
      if (unfound.length === 0) return;

      const targetWord = unfound[Math.floor(Math.random() * unfound.length)];
      const sol = this.state.solutions[targetWord];
      if (!sol || !sol.start) return;

      const startCell = this.container.querySelector(`.ws-cell[data-r="${sol.start.r}"][data-c="${sol.start.c}"]`);
      if (startCell) {
        startCell.classList.add('is-hint-pulse');
        setTimeout(() => {
          startCell.classList.remove('is-hint-pulse');
        }, 3000);
        this.announceA11y(`Hint: The word "${targetWord}" starts at Row ${sol.start.r + 1}, Column ${sol.start.c + 1}`);
      }
    }

    resetPlayerProgress() {
      this.state.foundWords.clear();
      this.state.showSolution = false;
      const root = this.container;

      // Remove marks
      root.querySelectorAll('.ws-cell.is-found').forEach(el => {
        el.classList.remove('is-found');
        el.style.removeProperty('--found-bg');
        el.style.removeProperty('--found-border');
        el.style.removeProperty('--found-color');
      });

      root.querySelectorAll('.ws-cell.is-solution-revealed').forEach(el => {
        el.classList.remove('is-solution-revealed');
      });

      root.querySelectorAll('.ws-bank-item.is-found').forEach(el => {
        el.classList.remove('is-found');
        const icon = el.querySelector('.ws-bank-checkbox i');
        if (icon) icon.className = 'fas fa-square';
      });

      const foundCount = root.querySelector('#ws-found-count');
      if (foundCount) foundCount.textContent = '0';

      const victoryBanner = root.querySelector('#ws-victory-banner');
      if (victoryBanner) victoryBanner.style.display = 'none';

      this.resetTimer();
      this.startTimer();
      this.announceA11y('Puzzle reset. Timer restarted.');
    }

    // --- Typography & Case Transformations ---
    applyDisplayTransformations() {
      const root = this.container;
      const gridTable = root.querySelector('#ws-grid-table');
      const bankList = root.querySelector('#ws-word-bank-list');

      if (!gridTable) return;

      // Class-based transformations
      gridTable.classList.toggle('case-lower', this.state.caseMode === 'lower');
      gridTable.classList.toggle('case-upper', this.state.caseMode === 'upper');

      gridTable.classList.toggle('font-dyslexic', this.state.fontStyle === 'dyslexic');
      gridTable.classList.toggle('font-mono', this.state.fontStyle === 'mono');

      if (bankList) {
        bankList.classList.toggle('case-lower', this.state.caseMode === 'lower');
        bankList.classList.toggle('case-upper', this.state.caseMode === 'upper');
        bankList.classList.toggle('font-dyslexic', this.state.fontStyle === 'dyslexic');
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
      const display = this.container.querySelector('#ws-timer-display');
      if (display) {
        display.textContent = this.formatTime(this.state.elapsedSeconds);
      }
    }

    formatTime(sec) {
      const m = Math.floor(sec / 60);
      const s = sec % 60;
      return `${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}`;
    }

    // --- Print & Export Functionality ---
    printWorksheet(isAnswerKey) {
      const root = this.container;
      const printTitle = root.querySelector('#ws-print-title-display');
      const printSubtitle = root.querySelector('#ws-print-subtitle-display');
      const printKeyIndex = root.querySelector('#ws-print-key-index');

      // Update printable headers
      if (printTitle) {
        printTitle.textContent = isAnswerKey ? `${this.state.title} — TEACHER ANSWER KEY` : this.state.title;
      }
      if (printSubtitle) {
        printSubtitle.textContent = isAnswerKey
          ? 'Educator Answer Key & Solution Reference. Keep for grading and instructional review.'
          : (this.state.subtitle || 'Find and circle all hidden vocabulary words.');
      }

      // Configure answer key visibility for print
      if (isAnswerKey) {
        root.classList.add('print-mode-answer-key');
        if (printKeyIndex) printKeyIndex.style.display = 'block';
        // Ensure solutions highlighted
        this.state.words.forEach(word => {
          const sol = this.state.solutions[word];
          if (!sol) return;
          sol.cells.forEach(pt => {
            const cell = root.querySelector(`.ws-cell[data-r="${pt.r}"][data-c="${pt.c}"]`);
            if (cell) cell.classList.add('is-solution-revealed');
          });
        });
      } else {
        root.classList.remove('print-mode-answer-key');
        if (printKeyIndex) printKeyIndex.style.display = 'none';
        if (!this.state.showSolution) {
          root.querySelectorAll('.ws-cell.is-solution-revealed').forEach(el => el.classList.remove('is-solution-revealed'));
        }
      }

      // Trigger Browser Print
      window.print();

      // Clean up after print dialog closes
      setTimeout(() => {
        root.classList.remove('print-mode-answer-key');
        if (printKeyIndex) printKeyIndex.style.display = 'none';
        if (!this.state.showSolution) {
          root.querySelectorAll('.ws-cell.is-solution-revealed').forEach(el => el.classList.remove('is-solution-revealed'));
        }
      }, 1000);
    }

    copyShareLink() {
      try {
        const url = new URL(window.location.origin + '/pages/word-search.php');
        url.searchParams.set('title', this.state.title);
        url.searchParams.set('words', this.state.words.join(','));
        url.searchParams.set('size', this.state.gridSize);
        url.searchParams.set('diff', this.state.difficulty);

        navigator.clipboard.writeText(url.toString()).then(() => {
          alert('Puzzle link copied to clipboard! You can share this URL directly with students or parents.');
        }).catch(() => {
          prompt('Copy this puzzle link:', url.toString());
        });
      } catch (e) {
        alert('Could not copy link automatically.');
      }
    }

    // --- Screen Reader Live Region Announcer ---
    announceA11y(message) {
      const liveRegion = document.getElementById('a11y-live-region');
      if (liveRegion) {
        liveRegion.textContent = message;
      }
    }
  }

  // Expose global initializer
  window.HLWordSearchStudio = WordSearchStudio;

})(window, document);
