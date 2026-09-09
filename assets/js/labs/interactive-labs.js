/**
 * interactive-labs.js - Multi-Sensory Interactive Practice Labs Controller
 * Hesten's Learning Platform
 *
 * Provides tactile, visual, and auditory interactive widgets:
 * 1. Fraction Strips & Place Value Blocks Workbench (Math)
 * 2. Phonics & Morpheme Deconstructor (ELA)
 * 3. Motion & Balance Scale Torque Simulator (Science)
 * 4. Chrono-Timeline Card Sorter (Social Studies)
 */

(function () {
  'use strict';

  class InteractiveLabs {
    constructor() {
      this.currentLab = 'math';
      this.audioCtx = null;
      this.init();
    }

    init() {
      this.initLabTabs();
      this.initMathLab();
      this.initELALab();
      this.initScienceLab();
      this.initSocialLab();
    }

    // Audio click synthesis for tactile feedback
    playClick(freq = 440, type = 'sine', duration = 0.06) {
      try {
        if (!this.audioCtx) {
          const AudioContext = window.AudioContext || window.webkitAudioContext;
          if (AudioContext) this.audioCtx = new AudioContext();
        }
        if (this.audioCtx && this.audioCtx.state === 'suspended') {
          this.audioCtx.resume();
        }
        if (!this.audioCtx) return;

        const osc = this.audioCtx.createOscillator();
        const gain = this.audioCtx.createGain();
        osc.type = type;
        osc.frequency.setValueAtTime(freq, this.audioCtx.currentTime);
        gain.gain.setValueAtTime(0.12, this.audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, this.audioCtx.currentTime + duration);

        osc.connect(gain);
        gain.connect(this.audioCtx.destination);
        osc.start();
        osc.stop(this.audioCtx.currentTime + duration);
      } catch (e) {}
    }

    playSuccess() {
      this.playClick(523.25, 'triangle', 0.1);
      setTimeout(() => this.playClick(659.25, 'triangle', 0.1), 80);
      setTimeout(() => this.playClick(783.99, 'triangle', 0.18), 160);
    }

    initLabTabs() {
      const tabs = document.querySelectorAll('.lab-tab-btn');
      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          const target = tab.dataset.lab;
          this.switchLab(target);
        });
      });
    }

    switchLab(labId) {
      this.currentLab = labId;
      document.querySelectorAll('.lab-workbench').forEach(wb => {
        if (wb.id === `lab-${labId}`) {
          wb.classList.add('active');
        } else {
          wb.classList.remove('active');
        }
      });
      this.playClick(350, 'sine', 0.04);
    }

    // =========================================================================
    // 1. MATH LAB: Fraction Strips & Target Matching
    // =========================================================================
    initMathLab() {
      const dropZone = document.getElementById('math-drop-zone');
      const totalDisplay = document.getElementById('math-fraction-total');
      const resetBtn = document.getElementById('math-reset-btn');
      const checkBtn = document.getElementById('math-check-btn');
      if (!dropZone) return;

      this.mathCurrentSum = 0;
      this.mathTarget = 1.0; // 1 whole

      // Palette strip click or drag
      document.querySelectorAll('.fraction-strip-item').forEach(strip => {
        strip.addEventListener('click', () => {
          const val = parseFloat(strip.dataset.val);
          const label = strip.dataset.label;
          const color = strip.dataset.color;
          this.addFractionToDropzone(val, label, color);
        });
      });

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          dropZone.innerHTML = '';
          this.mathCurrentSum = 0;
          this.updateMathTotal();
          this.playClick(220, 'sine', 0.05);
        });
      }

      if (checkBtn) {
        checkBtn.addEventListener('click', () => {
          const diff = Math.abs(this.mathCurrentSum - this.mathTarget);
          const feedback = document.getElementById('math-feedback-msg');
          if (diff < 0.001) {
            this.playSuccess();
            if (feedback) feedback.innerHTML = '<span style="color: #10b981;"><i class="fas fa-check-circle"></i> Perfect Match! Exactly 1 Whole (100%). +35 XP awarded!</span>';
            if (window.questManager) window.questManager.addXP(35, 'Fraction Lab Master');
          } else if (this.mathCurrentSum > this.mathTarget) {
            this.playClick(200, 'sawtooth', 0.1);
            if (feedback) feedback.innerHTML = `<span style="color: #ef4444;"><i class="fas fa-exclamation-triangle"></i> Exceeds 1 whole (${(this.mathCurrentSum * 100).toFixed(0)}%). Remove some strips to balance!</span>`;
          } else {
            this.playClick(300, 'sine', 0.08);
            if (feedback) feedback.innerHTML = `<span style="color: #f59e0b;"><i class="fas fa-info-circle"></i> Currently at ${(this.mathCurrentSum * 100).toFixed(0)}%. Add more strips to complete the whole!</span>`;
          }
        });
      }
    }

    addFractionToDropzone(val, label, color) {
      const dropZone = document.getElementById('math-drop-zone');
      if (!dropZone) return;

      const piece = document.createElement('div');
      piece.className = 'active-fraction-piece';
      piece.style.flexGrow = val;
      piece.style.backgroundColor = color;
      piece.innerHTML = `<span>${label}</span><button type="button" class="remove-strip-btn" title="Remove">&times;</button>`;

      piece.querySelector('.remove-strip-btn').addEventListener('click', (e) => {
        e.stopPropagation();
        this.mathCurrentSum -= val;
        piece.remove();
        this.updateMathTotal();
        this.playClick(250, 'sine', 0.04);
      });

      dropZone.appendChild(piece);
      this.mathCurrentSum += val;
      this.updateMathTotal();
      this.playClick(440 + Math.round(val * 400), 'sine', 0.05);
    }

    updateMathTotal() {
      const totalEl = document.getElementById('math-fraction-total');
      const fillEl = document.getElementById('math-target-bar-fill');
      if (totalEl) {
        totalEl.textContent = `${(this.mathCurrentSum * 100).toFixed(0)}% (${this.mathCurrentSum.toFixed(2)})`;
      }
      if (fillEl) {
        fillEl.style.width = `${Math.min(100, Math.round(this.mathCurrentSum * 100))}%`;
      }
    }

    // =========================================================================
    // 2. ELA LAB: Phonics & Morpheme Deconstructor
    // =========================================================================
    initELALab() {
      const dropZone = document.getElementById('ela-drop-zone');
      const speakBtn = document.getElementById('ela-speak-btn');
      const clearBtn = document.getElementById('ela-clear-btn');
      const checkBtn = document.getElementById('ela-check-btn');
      if (!dropZone) return;

      this.elaSelectedPieces = [];

      document.querySelectorAll('.morpheme-piece').forEach(piece => {
        piece.addEventListener('click', () => {
          const type = piece.dataset.type; // prefix, root, suffix
          const text = piece.dataset.text;
          this.addMorphemePiece(type, text, piece);
        });
      });

      if (clearBtn) {
        clearBtn.addEventListener('click', () => {
          dropZone.innerHTML = '<span class="drop-placeholder">Click prefix, root, and suffix tiles above to construct a word</span>';
          this.elaSelectedPieces = [];
          document.querySelectorAll('.morpheme-piece').forEach(p => p.classList.remove('used'));
          this.playClick(220, 'sine', 0.04);
          this.updateELAWord();
        });
      }

      if (speakBtn) {
        speakBtn.addEventListener('click', () => {
          const fullWord = this.elaSelectedPieces.map(p => p.text).join('');
          if (!fullWord) return;
          if ('speechSynthesis' in window) {
            const u = new SpeechSynthesisUtterance(fullWord);
            u.rate = 0.85;
            window.speechSynthesis.speak(u);
          }
          this.playClick(500, 'sine', 0.05);
        });
      }

      if (checkBtn) {
        checkBtn.addEventListener('click', () => {
          const fullWord = this.elaSelectedPieces.map(p => p.text).toLowerCase().replace(/[^a-z]/g, '');
          const feedback = document.getElementById('ela-feedback-msg');
          const validWords = ['unbreakable', 'reconstruction', 'disagreement', 'prehistoric', 'predictable', 'unhappiness', 'transformation', 'biography', 'autograph'];
          
          if (validWords.includes(fullWord)) {
            this.playSuccess();
            if (feedback) feedback.innerHTML = `<span style="color: #10b981;"><i class="fas fa-check-circle"></i> Outstanding! <strong>"${fullWord}"</strong> is a valid morphological word construct. +35 XP!</span>`;
            if (window.questManager) window.questManager.addXP(35, 'Morpheme Builder Ace');
          } else if (fullWord.length >= 4) {
            this.playClick(320, 'sine', 0.06);
            if (feedback) feedback.innerHTML = `<span style="color: #3b82f6;"><i class="fas fa-sparkles"></i> Created: <strong>"${fullWord}"</strong>. Pronounce with SpeechSynthesis to explore syllable stress!</span>`;
          } else {
            this.playClick(200, 'sine', 0.06);
            if (feedback) feedback.innerHTML = '<span style="color: #f59e0b;"><i class="fas fa-info-circle"></i> Combine a Prefix or Root with a Suffix to form a complete word.</span>';
          }
        });
      }
    }

    addMorphemePiece(type, text, originEl) {
      const dropZone = document.getElementById('ela-drop-zone');
      const placeholder = dropZone.querySelector('.drop-placeholder');
      if (placeholder) placeholder.remove();

      const el = document.createElement('div');
      el.className = `active-morpheme-tag tag-${type}`;
      el.innerHTML = `<span class="morpheme-type-badge">${type}</span><span class="morpheme-text">${text}</span><button type="button" class="remove-morpheme">&times;</button>`;

      el.querySelector('.remove-morpheme').addEventListener('click', () => {
        const idx = this.elaSelectedPieces.findIndex(p => p.el === el);
        if (idx > -1) this.elaSelectedPieces.splice(idx, 1);
        el.remove();
        originEl.classList.remove('used');
        this.updateELAWord();
        this.playClick(260, 'sine', 0.04);
      });

      dropZone.appendChild(el);
      originEl.classList.add('used');
      this.elaSelectedPieces.push({ type, text, el });
      this.updateELAWord();
      this.playClick(type === 'prefix' ? 440 : type === 'root' ? 550 : 660, 'triangle', 0.05);
    }

    updateELAWord() {
      const fullWordEl = document.getElementById('ela-full-word-display');
      const word = this.elaSelectedPieces.map(p => p.text).join('');
      if (fullWordEl) {
        fullWordEl.textContent = word || '---';
      }
    }

    // =========================================================================
    // 3. SCIENCE LAB: Motion & Balance Scale Torque Simulator
    // =========================================================================
    initScienceLab() {
      this.leftMass = 0;
      this.leftDist = 3; // default distance
      this.rightMass = 0;
      this.rightDist = 3;

      const beam = document.getElementById('science-balance-beam');
      const addLeftBtn = document.getElementById('sci-add-left-5g');
      const addRightBtn = document.getElementById('sci-add-right-5g');
      const resetBtn = document.getElementById('sci-reset-btn');
      const balanceStatus = document.getElementById('sci-balance-status');

      const updateScale = () => {
        const leftTorque = this.leftMass * this.leftDist;
        const rightTorque = this.rightMass * this.rightDist;
        const diff = rightTorque - leftTorque;
        const maxAngle = 18;
        const angle = Math.max(-maxAngle, Math.min(maxAngle, diff * 1.5));

        if (beam) {
          beam.style.transform = `rotate(${angle}deg)`;
        }

        const lMassEl = document.getElementById('sci-left-mass-val');
        const rMassEl = document.getElementById('sci-right-mass-val');
        if (lMassEl) lMassEl.textContent = `${this.leftMass}g (Torque: ${leftTorque})`;
        if (rMassEl) rMassEl.textContent = `${this.rightMass}g (Torque: ${rightTorque})`;

        if (balanceStatus) {
          if (this.leftMass === 0 && this.rightMass === 0) {
            balanceStatus.innerHTML = '<span style="color: var(--color-text-muted);">Scale is empty. Add masses to test balance!</span>';
          } else if (leftTorque === rightTorque) {
            this.playSuccess();
            balanceStatus.innerHTML = '<span style="color: #10b981; font-weight: 800;"><i class="fas fa-check-circle"></i> Equilibrium Achieved! $\\tau_{\\text{left}} = \\tau_{\\text{right}}$. +35 XP!</span>';
            if (window.questManager) window.questManager.addXP(35, 'Physics Equilibrium Pro');
          } else if (leftTorque > rightTorque) {
            balanceStatus.innerHTML = '<span style="color: #f59e0b;"><i class="fas fa-arrow-down"></i> Left side tilts downward (Greater Torque).</span>';
          } else {
            balanceStatus.innerHTML = '<span style="color: #f59e0b;"><i class="fas fa-arrow-down"></i> Right side tilts downward (Greater Torque).</span>';
          }
        }
      };

      if (addLeftBtn) {
        addLeftBtn.addEventListener('click', () => {
          this.leftMass += 5;
          this.playClick(320, 'sine', 0.04);
          updateScale();
        });
      }

      if (addRightBtn) {
        addRightBtn.addEventListener('click', () => {
          this.rightMass += 5;
          this.playClick(380, 'sine', 0.04);
          updateScale();
        });
      }

      const distLeftSelect = document.getElementById('sci-left-dist');
      if (distLeftSelect) {
        distLeftSelect.addEventListener('change', (e) => {
          this.leftDist = parseInt(e.target.value, 10);
          this.playClick(400, 'sine', 0.03);
          updateScale();
        });
      }

      const distRightSelect = document.getElementById('sci-right-dist');
      if (distRightSelect) {
        distRightSelect.addEventListener('change', (e) => {
          this.rightDist = parseInt(e.target.value, 10);
          this.playClick(400, 'sine', 0.03);
          updateScale();
        });
      }

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.leftMass = 0;
          this.rightMass = 0;
          this.playClick(220, 'sine', 0.04);
          updateScale();
        });
      }
    }

    // =========================================================================
    // 4. SOCIAL STUDIES LAB: Chrono-Timeline Sorter
    // =========================================================================
    initSocialLab() {
      const container = document.getElementById('social-timeline-slots');
      const checkBtn = document.getElementById('soc-check-timeline');
      const resetBtn = document.getElementById('soc-reset-timeline');
      if (!container) return;

      const events = [
        { id: 'rev', year: 1775, title: 'American Revolutionary War begins', icon: 'fa-monument' },
        { id: 'dec', year: 1776, title: 'Declaration of Independence signed', icon: 'fa-feather-alt' },
        { id: 'con', year: 1787, title: 'United States Constitution written', icon: 'fa-scroll' },
        { id: 'bor', year: 1791, title: 'Bill of Rights ratified', icon: 'fa-shield-alt' }
      ];

      let shuffled = [...events].sort(() => Math.random() - 0.5);

      const renderTimeline = () => {
        container.innerHTML = '';
        shuffled.forEach((ev, idx) => {
          const card = document.createElement('div');
          card.className = 'timeline-sort-card';
          card.dataset.id = ev.id;
          card.dataset.index = idx;
          card.innerHTML = `
            <div class="timeline-slot-num">#${idx + 1}</div>
            <div class="timeline-card-content">
              <i class="fas ${ev.icon}"></i>
              <div class="timeline-card-text">
                <strong>${ev.title}</strong>
              </div>
            </div>
            <div class="timeline-shift-controls">
              <button type="button" class="btn-shift-up" ${idx === 0 ? 'disabled' : ''} title="Move Left/Up"><i class="fas fa-chevron-left"></i></button>
              <button type="button" class="btn-shift-down" ${idx === shuffled.length - 1 ? 'disabled' : ''} title="Move Right/Down"><i class="fas fa-chevron-right"></i></button>
            </div>
          `;

          card.querySelector('.btn-shift-up').addEventListener('click', () => {
            if (idx > 0) {
              const temp = shuffled[idx];
              shuffled[idx] = shuffled[idx - 1];
              shuffled[idx - 1] = temp;
              this.playClick(440, 'sine', 0.04);
              renderTimeline();
            }
          });

          card.querySelector('.btn-shift-down').addEventListener('click', () => {
            if (idx < shuffled.length - 1) {
              const temp = shuffled[idx];
              shuffled[idx] = shuffled[idx + 1];
              shuffled[idx + 1] = temp;
              this.playClick(440, 'sine', 0.04);
              renderTimeline();
            }
          });

          container.appendChild(card);
        });
      };

      renderTimeline();

      if (checkBtn) {
        checkBtn.addEventListener('click', () => {
          const isCorrect = shuffled.every((ev, i) => ev.year === events[i].year);
          const feedback = document.getElementById('soc-timeline-feedback');
          if (isCorrect) {
            this.playSuccess();
            if (feedback) feedback.innerHTML = '<span style="color: #10b981; font-weight: 800;"><i class="fas fa-check-circle"></i> Perfect Chronological Order! (1775 &rarr; 1776 &rarr; 1787 &rarr; 1791). +35 XP awarded!</span>';
            if (window.questManager) window.questManager.addXP(35, 'History Timeline Master');
          } else {
            this.playClick(240, 'sine', 0.08);
            if (feedback) feedback.innerHTML = '<span style="color: #f59e0b;"><i class="fas fa-info-circle"></i> Not quite in order yet. Think about which document came first!</span>';
          }
        });
      }

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          shuffled = [...events].sort(() => Math.random() - 0.5);
          this.playClick(220, 'sine', 0.04);
          renderTimeline();
          const feedback = document.getElementById('soc-timeline-feedback');
          if (feedback) feedback.innerHTML = '';
        });
      }
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    window.interactiveLabs = new InteractiveLabs();
  });
})();
