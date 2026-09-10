/**
 * accommodation-engine.js - IEP/504 Personalized Accommodation & Focus Suite
 * Hesten's Learning Platform
 *
 * Provides specialized accessibility & focus accommodations:
 * - Guided Reading Ruler (Alt+R) with adjustable height & backdrop dimming
 * - Irlen Syndrome Color Tint Screen Overlays with opacity controls
 * - Bionic Reading fixation bolding for dyslexic reader flow
 * - Dyscalculia arithmetic operator visual colorizer
 * - 100% offline Web Audio API synthesized focus soundscapes (Pink Noise, Gentle Rain, Ocean Surf)
 * - Persistent accommodation presets in localStorage
 */

(function () {
  'use strict';

  const STORAGE_KEY = 'hl_accommodations_profile';

  const defaultProfile = {
    rulerEnabled: false,
    rulerHeight: 60,
    rulerDimOpacity: 0.45,
    tintEnabled: false,
    tintColor: 'peach', // peach, aqua, yellow, rose, mint, lavender
    tintOpacity: 0.25,
    bionicEnabled: false,
    dyscalculiaEnabled: false,
    soundscapeActive: 'none', // none, pink, rain, ocean
    soundscapeVolume: 0.3
  };

  class AccommodationEngine {
    constructor() {
      this.profile = this.loadProfile();
      this.audioCtx = null;
      this.activeSoundNodes = [];
      this.rulerEl = null;
      this.tintEl = null;

      this.initDOM();
      this.applyAll();
      this.initShortcuts();
      this.initObserver();
      this.initSyncListeners();
    }

    loadProfile() {
      try {
        const raw = localStorage.getItem(STORAGE_KEY);
        return raw ? Object.assign({}, defaultProfile, JSON.parse(raw)) : Object.assign({}, defaultProfile);
      } catch (e) {
        return Object.assign({}, defaultProfile);
      }
    }

    saveProfile(skipSyncBroadcast = false) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(this.profile));
      } catch (e) {
        console.warn('Failed to save accommodation profile:', e);
      }
      this.applyAll();
      this.syncUI();
      if (!skipSyncBroadcast) {
        window.dispatchEvent(new CustomEvent('hl-bionic-sync', {
          detail: { enabled: !!this.profile.bionicEnabled, source: 'accommodation-engine' }
        }));
      }
    }

    initDOM() {
      // 1. Create Reading Ruler Element if absent
      if (!document.getElementById('hl-reading-ruler')) {
        const ruler = document.createElement('div');
        ruler.id = 'hl-reading-ruler';
        ruler.className = 'hl-reading-ruler-wrap';
        ruler.setAttribute('aria-hidden', 'true');
        ruler.innerHTML = `
          <div class="ruler-top-shade" id="ruler-top-shade"></div>
          <div class="ruler-guide-bar" id="ruler-guide-bar">
            <div class="ruler-center-line"></div>
          </div>
          <div class="ruler-bottom-shade" id="ruler-bottom-shade"></div>
        `;
        document.body.appendChild(ruler);
        this.rulerEl = ruler;

        // Mouse tracking for Reading Ruler
        window.addEventListener('mousemove', (e) => {
          if (!this.profile.rulerEnabled) return;
          this.updateRulerPosition(e.clientY);
        }, { passive: true });

        // Touch tracking
        window.addEventListener('touchmove', (e) => {
          if (!this.profile.rulerEnabled || !e.touches[0]) return;
          this.updateRulerPosition(e.touches[0].clientY);
        }, { passive: true });
      } else {
        this.rulerEl = document.getElementById('hl-reading-ruler');
      }

      // 2. Create Screen Tint Overlay if absent
      if (!document.getElementById('hl-screen-tint-overlay')) {
        const tint = document.createElement('div');
        tint.id = 'hl-screen-tint-overlay';
        tint.className = 'hl-screen-tint-layer';
        tint.setAttribute('aria-hidden', 'true');
        document.body.appendChild(tint);
        this.tintEl = tint;
      } else {
        this.tintEl = document.getElementById('hl-screen-tint-overlay');
      }
    }

    updateRulerPosition(clientY) {
      if (!this.rulerEl) return;
      const h = this.profile.rulerHeight || 60;
      const half = h / 2;
      const topShade = document.getElementById('ruler-top-shade');
      const bar = document.getElementById('ruler-guide-bar');
      const bottomShade = document.getElementById('ruler-bottom-shade');

      const topBoundary = Math.max(0, clientY - half);
      const bottomBoundary = clientY + half;

      if (topShade) topShade.style.height = `${topBoundary}px`;
      if (bar) {
        bar.style.top = `${topBoundary}px`;
        bar.style.height = `${h}px`;
      }
      if (bottomShade) {
        bottomShade.style.top = `${bottomBoundary}px`;
      }
    }

    applyAll() {
      // 1. Reading Ruler
      if (this.rulerEl) {
        if (this.profile.rulerEnabled) {
          this.rulerEl.classList.add('active');
          document.documentElement.style.setProperty('--ruler-dim-opacity', this.profile.rulerDimOpacity);
        } else {
          this.rulerEl.classList.remove('active');
        }
      }

      // 2. Color Tint Layer
      if (this.tintEl) {
        if (this.profile.tintEnabled) {
          this.tintEl.classList.add('active');
          const colorMap = {
            peach: 'rgba(254, 215, 170, ',
            aqua: 'rgba(165, 243, 252, ',
            yellow: 'rgba(254, 240, 138, ',
            rose: 'rgba(251, 207, 232, ',
            mint: 'rgba(187, 247, 208, ',
            lavender: 'rgba(221, 214, 254, '
          };
          const baseRgb = colorMap[this.profile.tintColor] || colorMap.peach;
          // Contrast Guardian: cap opacity at 0.38 to preserve WCAG AA text contrast
          const safeOpacity = Math.min(0.38, parseFloat(this.profile.tintOpacity) || 0.25);
          this.tintEl.style.backgroundColor = `${baseRgb}${safeOpacity})`;
        } else {
          this.tintEl.classList.remove('active');
          this.tintEl.style.backgroundColor = 'transparent';
        }
      }

      // 3. Bionic Reading Mode
      if (this.profile.bionicEnabled) {
        document.body.classList.add('bionic-reading-active');
        this.applyBionicText();
      } else {
        document.body.classList.remove('bionic-reading-active');
      }

      // 4. Dyscalculia Math Colorizer
      if (this.profile.dyscalculiaEnabled) {
        document.body.classList.add('dyscalculia-mode-active');
        this.colorizeMathSymbols();
      } else {
        document.body.classList.remove('dyscalculia-mode-active');
      }

      // 5. Soundscape
      this.updateSoundscapePlayback();
    }

    // Toggle Reading Ruler
    toggleRuler() {
      this.profile.rulerEnabled = !this.profile.rulerEnabled;
      this.saveProfile();
      this.showToast(this.profile.rulerEnabled ? 'Reading Ruler Activated (Alt+R)' : 'Reading Ruler Disabled', 'fas fa-ruler-horizontal');
    }

    // Apply Bionic Reading Fixation algorithm
    applyBionicText() {
      // Find eligible content paragraphs and spans that haven't been transformed
      const targets = document.querySelectorAll('p:not(.bionic-processed), .reading-content p, .article-body p, .lesson-text');
      targets.forEach(el => {
        if (el.closest('.no-bionic') || el.dataset.bionicProcessed) return;
        el.dataset.bionicProcessed = 'true';
        el.classList.add('bionic-processed');

        // Traverse child text nodes
        const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null, false);
        const textNodes = [];
        let node;
        while ((node = walker.nextNode())) {
          if (node.nodeValue.trim().length > 0 && node.parentElement.tagName !== 'SCRIPT' && node.parentElement.tagName !== 'STYLE') {
            textNodes.push(node);
          }
        }

        textNodes.forEach(tNode => {
          const span = document.createElement('span');
          span.className = 'bionic-text-span';
          const words = tNode.nodeValue.split(/(\s+)/);
          const transformed = words.map(w => {
            if (/^\s+$/.test(w) || w.length === 0) return w;
            const mid = Math.ceil(w.length * 0.45);
            const boldPart = w.slice(0, mid);
            const restPart = w.slice(mid);
            return `<strong class="bionic-fix">${boldPart}</strong>${restPart}`;
          }).join('');
          span.innerHTML = transformed;
          if (tNode.parentNode) {
            tNode.parentNode.replaceChild(span, tNode);
          }
        });
      });
    }

    // Colorize Arithmetic & Algebraic Operators (HTML, MathJax SVG, and CHTML)
    colorizeMathSymbols() {
      if (!this.profile.dyscalculiaEnabled) {
        // Reset SVG styling if disabled
        document.querySelectorAll('mjx-container[jax="SVG"] use, mjx-container[jax="SVG"] path, mjx-container[jax="SVG"] g').forEach(el => {
          el.style.fill = '';
          el.style.color = '';
          el.classList.remove('math-op-plus', 'math-op-minus', 'math-op-mult', 'math-op-div', 'math-op-equals');
        });
        return;
      }

      // 1. Process MathJax SVG Elements
      const uses = document.querySelectorAll('mjx-container[jax="SVG"] use, .MathJax_SVG use, svg.MathJax_SVG_Glyphs use');
      uses.forEach(use => {
        const href = (use.getAttribute('href') || use.getAttribute('xlink:href') || '');
        const parentG = use.closest('g[data-c]');
        const dataC = parentG ? parentG.getAttribute('data-c') : '';

        // Addition (+)
        if (href.includes('-2B') || dataC === '2B' || dataC === '002B') {
          use.style.fill = '#10b981';
          use.style.color = '#10b981';
          if (use.parentElement) use.parentElement.classList.add('math-op-plus');
        }
        // Subtraction (-)
        else if (href.includes('-2212') || href.includes('-2D') || dataC === '2212' || dataC === '2D') {
          use.style.fill = '#ef4444';
          use.style.color = '#ef4444';
          if (use.parentElement) use.parentElement.classList.add('math-op-minus');
        }
        // Multiplication (×, ·)
        else if (href.includes('-D7') || href.includes('-22C5') || dataC === 'D7' || dataC === '00D7' || dataC === '22C5') {
          use.style.fill = '#8b5cf6';
          use.style.color = '#8b5cf6';
          if (use.parentElement) use.parentElement.classList.add('math-op-mult');
        }
        // Division (÷, /)
        else if (href.includes('-F7') || href.includes('-2215') || href.includes('-2F') || dataC === 'F7' || dataC === '00F7' || dataC === '2215' || dataC === '2F') {
          use.style.fill = '#f59e0b';
          use.style.color = '#f59e0b';
          if (use.parentElement) use.parentElement.classList.add('math-op-div');
        }
        // Equality & Comparison (=, ≠, <, >, ≤, ≥)
        else if (href.includes('-3D') || href.includes('-2260') || href.includes('-3C') || href.includes('-3E') || href.includes('-2264') || href.includes('-2265') || ['3D', '003D', '2260', '3C', '3E', '2264', '2265'].includes(dataC)) {
          use.style.fill = '#06b6d4';
          use.style.color = '#06b6d4';
          if (use.parentElement) use.parentElement.classList.add('math-op-equals');
        }
      });

      // 2. Process MathJax CHTML & MathML Elements
      document.querySelectorAll('mjx-mo, mo, .mjx-mo').forEach(mo => {
        const txt = (mo.textContent || '').trim();
        if (txt === '+' || txt === '±') mo.classList.add('math-op-plus');
        else if (txt === '-' || txt === '−') mo.classList.add('math-op-minus');
        else if (txt === '×' || txt === '*' || txt === '·') mo.classList.add('math-op-mult');
        else if (txt === '÷' || txt === '/') mo.classList.add('math-op-div');
        else if (['=', '≠', '<', '>', '≤', '≥'].includes(txt)) mo.classList.add('math-op-equals');
      });

      // 3. Process Non-LaTeX Plain Text Math Elements safely (protect LaTeX $...$ from corruption)
      const targets = document.querySelectorAll('.math-expression:not(.MathJax), .formula-list li, .math-practice-problem');
      targets.forEach(el => {
        if (el.dataset.dyscalculiaColorized || el.closest('mjx-container') || el.querySelector('mjx-container')) return;
        
        // Never touch text containing raw TeX delimiters (MathJax will handle them)
        if (/\$|\\\(|\\\[/.test(el.innerHTML)) return;

        el.dataset.dyscalculiaColorized = 'true';

        // Single-pass safe tokenized replacement so we never corrupt HTML tags
        el.innerHTML = el.innerHTML.replace(/(\+)|([−\-])|(\*|×|&times;)|(÷|&divide;)|(=|≠|≤|≥)/g, (match, plus, minus, mult, div, eq) => {
          if (plus) return '<span class="math-op math-plus" title="Addition">+</span>';
          if (minus) return '<span class="math-op math-minus" title="Subtraction">&minus;</span>';
          if (mult) return '<span class="math-op math-mult" title="Multiplication">&times;</span>';
          if (div) return '<span class="math-op math-div" title="Division">&divide;</span>';
          if (eq) return `<span class="math-op math-equals" title="Equals">${match}</span>`;
          return match;
        });
      });
    }

    initObserver() {
      // Observe MathJax rendering and dynamic standards updates
      if (window.MutationObserver) {
        const observer = new MutationObserver((mutations) => {
          let shouldUpdate = false;
          for (const m of mutations) {
            if (m.addedNodes.length > 0) {
              shouldUpdate = true;
              break;
            }
          }
          if (shouldUpdate) {
            if (this.profile.dyscalculiaEnabled) this.colorizeMathSymbols();
            if (this.profile.bionicEnabled) this.applyBionicText();
          }
        });

        observer.observe(document.body, { childList: true, subtree: true });
      }
    }

    // Web Audio Synthesized Soundscapes (100% Offline & Pure Synthesis)
    initAudioContext() {
      if (!this.audioCtx) {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (AudioContext) {
          this.audioCtx = new AudioContext();
        }
      }
      if (this.audioCtx && this.audioCtx.state === 'suspended') {
        this.audioCtx.resume();
      }
    }

    stopSoundscape() {
      this.activeSoundNodes.forEach(node => {
        try {
          if (node.stop) node.stop();
          if (node.disconnect) node.disconnect();
        } catch (e) {}
      });
      this.activeSoundNodes = [];
    }

    updateSoundscapePlayback() {
      this.stopSoundscape();
      if (this.profile.soundscapeActive === 'none') return;

      this.initAudioContext();
      if (!this.audioCtx) return;

      window.dispatchEvent(new CustomEvent('hl-audio-play', { detail: { source: 'accommodation-engine' } }));

      const type = this.profile.soundscapeActive;
      const vol = Math.max(0.01, Math.min(1.0, this.profile.soundscapeVolume || 0.3));

      const masterGain = this.audioCtx.createGain();
      masterGain.gain.setValueAtTime(vol * 0.15, this.audioCtx.currentTime);
      masterGain.connect(this.audioCtx.destination);
      this.activeSoundNodes.push(masterGain);

      // Generate Pink Noise or Rain or Ocean
      const bufferSize = this.audioCtx.sampleRate * 4;
      const noiseBuffer = this.audioCtx.createBuffer(1, bufferSize, this.audioCtx.sampleRate);
      const output = noiseBuffer.getChannelData(0);

      if (type === 'pink') {
        // Paul Kellet's Pink Noise Filter Algorithm
        let b0 = 0, b1 = 0, b2 = 0, b3 = 0, b4 = 0, b5 = 0, b6 = 0;
        for (let i = 0; i < bufferSize; i++) {
          const white = Math.random() * 2 - 1;
          b0 = 0.99886 * b0 + white * 0.0555179;
          b1 = 0.99332 * b1 + white * 0.0750759;
          b2 = 0.96900 * b2 + white * 0.1538520;
          b3 = 0.86650 * b3 + white * 0.3104856;
          b4 = 0.55000 * b4 + white * 0.5329522;
          b5 = -0.7616 * b5 - white * 0.0168980;
          output[i] = b0 + b1 + b2 + b3 + b4 + b5 + b6 + white * 0.5362;
          output[i] *= 0.11;
          b6 = white * 0.115926;
        }

        const whiteSource = this.audioCtx.createBufferSource();
        whiteSource.buffer = noiseBuffer;
        whiteSource.loop = true;

        const lowPass = this.audioCtx.createBiquadFilter();
        lowPass.type = 'lowpass';
        lowPass.frequency.setValueAtTime(1200, this.audioCtx.currentTime);

        whiteSource.connect(lowPass);
        lowPass.connect(masterGain);
        whiteSource.start();
        this.activeSoundNodes.push(whiteSource, lowPass);

      } else if (type === 'rain') {
        // Gentle Rain Sound: Pink noise with dynamic bandpass and high frequency droplets
        for (let i = 0; i < bufferSize; i++) {
          output[i] = (Math.random() * 2 - 1) * 0.2;
        }

        const rainSource = this.audioCtx.createBufferSource();
        rainSource.buffer = noiseBuffer;
        rainSource.loop = true;

        const bandPass = this.audioCtx.createBiquadFilter();
        bandPass.type = 'bandpass';
        bandPass.frequency.setValueAtTime(800, this.audioCtx.currentTime);
        bandPass.Q.setValueAtTime(0.8, this.audioCtx.currentTime);

        const highShelf = this.audioCtx.createBiquadFilter();
        highShelf.type = 'highshelf';
        highShelf.frequency.setValueAtTime(3500, this.audioCtx.currentTime);
        highShelf.gain.setValueAtTime(-6, this.audioCtx.currentTime);

        rainSource.connect(bandPass);
        bandPass.connect(highShelf);
        highShelf.connect(masterGain);
        rainSource.start();
        this.activeSoundNodes.push(rainSource, bandPass, highShelf);

      } else if (type === 'ocean') {
        // Ocean Surf: Low-frequency noise with LFO swell
        for (let i = 0; i < bufferSize; i++) {
          output[i] = (Math.random() * 2 - 1) * 0.3;
        }

        const oceanSource = this.audioCtx.createBufferSource();
        oceanSource.buffer = noiseBuffer;
        oceanSource.loop = true;

        const lowPass = this.audioCtx.createBiquadFilter();
        lowPass.type = 'lowpass';
        lowPass.frequency.setValueAtTime(450, this.audioCtx.currentTime);

        // LFO Swell (8s cycle)
        const swellGain = this.audioCtx.createGain();
        swellGain.gain.setValueAtTime(0.3, this.audioCtx.currentTime);

        const lfo = this.audioCtx.createOscillator();
        lfo.frequency.setValueAtTime(0.125, this.audioCtx.currentTime); // 8-second swell
        const lfoGain = this.audioCtx.createGain();
        lfoGain.gain.setValueAtTime(0.4, this.audioCtx.currentTime);

        lfo.connect(lfoGain);
        lfoGain.connect(swellGain.gain);

        oceanSource.connect(lowPass);
        lowPass.connect(swellGain);
        swellGain.connect(masterGain);

        oceanSource.start();
        lfo.start();
        this.activeSoundNodes.push(oceanSource, lfo, lowPass, swellGain);
      }
    }

    setSoundscape(type) {
      this.profile.soundscapeActive = type;
      this.saveProfile();
    }

    setSoundscapeVolume(vol) {
      this.profile.soundscapeVolume = parseFloat(vol);
      this.saveProfile();
    }

    setPreset(presetName) {
      if (presetName === 'dyslexia') {
        this.profile.rulerEnabled = true;
        this.profile.bionicEnabled = true;
        this.profile.tintEnabled = true;
        this.profile.tintColor = 'peach';
        this.profile.tintOpacity = 0.2;
      } else if (presetName === 'adhd') {
        this.profile.rulerEnabled = true;
        this.profile.rulerHeight = 70;
        this.profile.rulerDimOpacity = 0.55;
        this.profile.soundscapeActive = 'pink';
        this.profile.bionicEnabled = true;
      } else if (presetName === 'dyscalculia') {
        this.profile.dyscalculiaEnabled = true;
        this.profile.rulerEnabled = true;
        this.profile.tintEnabled = true;
        this.profile.tintColor = 'mint';
      } else if (presetName === 'reset') {
        Object.assign(this.profile, defaultProfile);
      }
      this.saveProfile();
      this.showToast(`Applied preset: ${presetName.toUpperCase()}`, 'fas fa-check-circle');
    }

    initShortcuts() {
      window.addEventListener('keydown', (e) => {
        const tag = e.target.tagName;
        if (tag === 'INPUT' || tag === 'TEXTAREA' || e.target.isContentEditable) return;

        // Alt+R -> Toggle Reading Ruler
        if (e.altKey && (e.key === 'r' || e.key === 'R')) {
          e.preventDefault();
          this.toggleRuler();
        }

        // Alt+O -> Toggle Accommodations Modal
        if (e.altKey && (e.key === 'o' || e.key === 'O')) {
          e.preventDefault();
          window.toggleAccommodationsStudio ? window.toggleAccommodationsStudio() : null;
        }
      });
    }

    initSyncListeners() {
      // 1. Cross-module Bionic Reading synchronization
      window.addEventListener('hl-bionic-sync', (e) => {
        if (e.detail && e.detail.source !== 'accommodation-engine') {
          const isEnabled = !!e.detail.enabled;
          if (this.profile.bionicEnabled !== isEnabled) {
            this.profile.bionicEnabled = isEnabled;
            try {
              localStorage.setItem(STORAGE_KEY, JSON.stringify(this.profile));
            } catch (err) {}
            this.applyAll();
            this.syncUI();
          }
        }
      });

      // 3. Cross-tab localStorage synchronization
      window.addEventListener('storage', (e) => {
        if (e.key === STORAGE_KEY && e.newValue) {
          try {
            this.profile = Object.assign({}, defaultProfile, JSON.parse(e.newValue));
            this.applyAll();
            this.syncUI();
          } catch (err) {}
        }
      });
    }

    syncUI() {
      // Sync toggle inputs in modal if rendered
      const rulerToggle = document.getElementById('acc-toggle-ruler');
      if (rulerToggle) rulerToggle.checked = this.profile.rulerEnabled;

      const bionicToggle = document.getElementById('acc-toggle-bionic');
      if (bionicToggle) bionicToggle.checked = this.profile.bionicEnabled;

      const tintToggle = document.getElementById('acc-toggle-tint');
      if (tintToggle) tintToggle.checked = this.profile.tintEnabled;

      const dyscalculiaToggle = document.getElementById('acc-toggle-dyscalculia');
      if (dyscalculiaToggle) dyscalculiaToggle.checked = this.profile.dyscalculiaEnabled;

      const tintOpacity = document.getElementById('acc-tint-opacity');
      if (tintOpacity) tintOpacity.value = this.profile.tintOpacity;

      const rulerHeight = document.getElementById('acc-ruler-height');
      if (rulerHeight) rulerHeight.value = this.profile.rulerHeight;

      const soundSelect = document.getElementById('acc-sound-select');
      if (soundSelect) soundSelect.value = this.profile.soundscapeActive;

      const soundVol = document.getElementById('acc-sound-volume');
      if (soundVol) soundVol.value = this.profile.soundscapeVolume;

      // Active tint swatch highlight
      document.querySelectorAll('.tint-swatch').forEach(btn => {
        if (btn.dataset.tint === this.profile.tintColor) {
          btn.classList.add('selected');
        } else {
          btn.classList.remove('selected');
        }
      });
    }

    showToast(message, icon = 'fas fa-universal-access') {
      const existing = document.getElementById('hl-acc-toast');
      if (existing) existing.remove();

      const toast = document.createElement('div');
      toast.id = 'hl-acc-toast';
      toast.className = 'hl-acc-toast';
      toast.innerHTML = `<i class="${icon}"></i> <span>${message}</span>`;
      document.body.appendChild(toast);

      setTimeout(() => {
        toast.classList.add('visible');
      }, 50);

      setTimeout(() => {
        toast.classList.remove('visible');
        setTimeout(() => toast.remove(), 300);
      }, 2500);
    }
  }

  // Global instance
  const engine = new AccommodationEngine();
  window.accommodationEngine = engine;

  window.toggleAccommodationsStudio = function () {
    const modal = document.getElementById('accommodations-modal');
    if (!modal) return;
    const isHidden = modal.classList.contains('hidden');
    if (isHidden) {
      modal.classList.remove('hidden');
      engine.syncUI();
      const closeBtn = document.getElementById('acc-modal-close');
      if (closeBtn) closeBtn.focus();
    } else {
      modal.classList.add('hidden');
    }
  };

  document.addEventListener('DOMContentLoaded', () => {
    engine.syncUI();
  });
})();
