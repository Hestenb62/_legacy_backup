/**
 * assets/js/audio-feedback.js
 * Universal Web Audio Synthesizer Engine for Hesten's Learning.
 * 100% Offline, zero-dependency procedural audio synthesis for UI feedback,
 * gamification rewards, and soothing sensory retreat soundscapes.
 */

(function () {
  'use strict';

  let audioCtx = null;
  let calmGainNode = null;
  let calmSourceNodes = [];
  let isMuted = false;
  let masterVolume = 0.35;

  // Initialize state from storage
  try {
    const savedMute = localStorage.getItem('hl_sound_muted');
    if (savedMute !== null) {
      isMuted = savedMute === 'true';
    }
    const savedVol = localStorage.getItem('hl_sound_volume');
    if (savedVol !== null) {
      masterVolume = Math.max(0, Math.min(1, parseFloat(savedVol) || 0.35));
    }
  } catch (e) {}

  function getAudioContext() {
    if (!audioCtx) {
      const AudioCtxClass = window.AudioContext || window.webkitAudioContext;
      if (AudioCtxClass) {
        audioCtx = new AudioCtxClass();
      }
    }
    if (audioCtx && audioCtx.state === 'suspended') {
      audioCtx.resume();
    }
    return audioCtx;
  }

  // Create standard gain envelope
  function createGainEnvelope(ctx, startTime, peakTime, endTime, maxGain) {
    const gain = ctx.createGain();
    gain.gain.setValueAtTime(0.0001, startTime);
    gain.gain.exponentialRampToValueAtTime(Math.max(0.0001, maxGain * masterVolume), peakTime);
    gain.gain.exponentialRampToValueAtTime(0.0001, endTime);
    return gain;
  }

  const AudioEngine = {
    isMuted: function () {
      return isMuted;
    },

    toggleMute: function () {
      isMuted = !isMuted;
      try {
        localStorage.setItem('hl_sound_muted', isMuted ? 'true' : 'false');
      } catch (e) {}
      if (isMuted) {
        this.stopCalmAmbiance();
      }
      window.dispatchEvent(new CustomEvent('hl:sound-mute-toggled', { detail: { isMuted } }));
      return isMuted;
    },

    setVolume: function (vol) {
      masterVolume = Math.max(0, Math.min(1, parseFloat(vol) || 0.35));
      try {
        localStorage.setItem('hl_sound_volume', masterVolume.toString());
      } catch (e) {}
    },

    getVolume: function () {
      return masterVolume;
    },

    // Subtle tactile UI micro-click
    playClick: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      const t = ctx.currentTime;
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();

      osc.type = 'sine';
      osc.frequency.setValueAtTime(800, t);
      osc.frequency.exponentialRampToValueAtTime(300, t + 0.04);

      gain.gain.setValueAtTime(0.12 * masterVolume, t);
      gain.gain.exponentialRampToValueAtTime(0.0001, t + 0.04);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start(t);
      osc.stop(t + 0.05);
    },

    // Crisp soft pop for toggles and checkboxes
    playToggle: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      const t = ctx.currentTime;
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();

      osc.type = 'triangle';
      osc.frequency.setValueAtTime(520, t);
      osc.frequency.exponentialRampToValueAtTime(880, t + 0.06);

      gain.gain.setValueAtTime(0.15 * masterVolume, t);
      gain.gain.exponentialRampToValueAtTime(0.0001, t + 0.06);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start(t);
      osc.stop(t + 0.07);
    },

    // Harmonious major-chord arpeggio for correct answer (C5 - E5 - G5 - C6)
    playCorrect: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      const notes = [523.25, 659.25, 783.99, 1046.5]; // C5, E5, G5, C6
      const t = ctx.currentTime;

      notes.forEach((freq, index) => {
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        const noteStart = t + (index * 0.08);
        const noteEnd = noteStart + 0.35;

        osc.type = 'sine';
        osc.frequency.setValueAtTime(freq, noteStart);

        gain.gain.setValueAtTime(0.0001, noteStart);
        gain.gain.exponentialRampToValueAtTime(0.25 * masterVolume, noteStart + 0.02);
        gain.gain.exponentialRampToValueAtTime(0.0001, noteEnd);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start(noteStart);
        osc.stop(noteEnd + 0.05);
      });
    },

    // Gentle encouraging low chime for incorrect attempt (neutral, non-punitive)
    playIncorrect: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      const t = ctx.currentTime;
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();

      osc.type = 'sine';
      osc.frequency.setValueAtTime(330, t); // E4
      osc.frequency.exponentialRampToValueAtTime(293.66, t + 0.25); // D4

      gain.gain.setValueAtTime(0.0001, t);
      gain.gain.exponentialRampToValueAtTime(0.18 * masterVolume, t + 0.02);
      gain.gain.exponentialRampToValueAtTime(0.0001, t + 0.3);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start(t);
      osc.stop(t + 0.35);
    },

    // Ascending chime sweep for leveling up / milestone unlocked
    playLevelUp: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      const notes = [392.00, 523.25, 659.25, 783.99, 1046.50, 1318.51]; // G4, C5, E5, G5, C6, E6
      const t = ctx.currentTime;

      notes.forEach((freq, i) => {
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        const start = t + (i * 0.07);
        const end = start + 0.45;

        osc.type = 'triangle';
        osc.frequency.setValueAtTime(freq, start);

        gain.gain.setValueAtTime(0.0001, start);
        gain.gain.exponentialRampToValueAtTime(0.22 * masterVolume, start + 0.03);
        gain.gain.exponentialRampToValueAtTime(0.0001, end);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start(start);
        osc.stop(end + 0.05);
      });
    },

    // Royal heraldic fanfare for completing quests / standard certificates
    playFanfare: function () {
      if (isMuted) return;
      const ctx = getAudioContext();
      if (!ctx) return;

      // Chord pattern: C-G-C-E-G-C
      const pattern = [
        { f: 523.25, d: 0.12, delay: 0 },
        { f: 523.25, d: 0.12, delay: 0.14 },
        { f: 523.25, d: 0.12, delay: 0.28 },
        { f: 659.25, d: 0.35, delay: 0.44 },
        { f: 587.33, d: 0.15, delay: 0.82 },
        { f: 783.99, d: 0.60, delay: 1.00 }
      ];

      const t = ctx.currentTime;
      pattern.forEach(p => {
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        const start = t + p.delay;
        const end = start + p.d;

        osc.type = 'sine';
        osc.frequency.setValueAtTime(p.f, start);

        gain.gain.setValueAtTime(0.0001, start);
        gain.gain.exponentialRampToValueAtTime(0.26 * masterVolume, start + 0.03);
        gain.gain.exponentialRampToValueAtTime(0.0001, end);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start(start);
        osc.stop(end + 0.05);
      });
    },

    // Soothing ambient generator for Sensory Retreat / Breathe & Reset
    // Generates procedural pink noise & 432Hz harmonic drone
    startCalmAmbiance: function (mode = 'ocean') {
      if (isMuted) return;
      this.stopCalmAmbiance();

      const ctx = getAudioContext();
      if (!ctx) return;

      calmGainNode = ctx.createGain();
      calmGainNode.gain.setValueAtTime(0.0001, ctx.currentTime);
      calmGainNode.gain.exponentialRampToValueAtTime(0.25 * masterVolume, ctx.currentTime + 2.0);
      calmGainNode.connect(ctx.destination);

      if (mode === 'binaural' || mode === 'ocean') {
        // 432Hz harmonic gentle drone with 4Hz binaural wave
        const osc1 = ctx.createOscillator();
        const osc2 = ctx.createOscillator();
        osc1.type = 'sine';
        osc2.type = 'sine';
        osc1.frequency.setValueAtTime(432, ctx.currentTime);
        osc2.frequency.setValueAtTime(436, ctx.currentTime);

        const filter = ctx.createBiquadFilter();
        filter.type = 'lowpass';
        filter.frequency.setValueAtTime(600, ctx.currentTime);

        osc1.connect(filter);
        osc2.connect(filter);
        filter.connect(calmGainNode);

        osc1.start();
        osc2.start();
        calmSourceNodes.push(osc1, osc2);
      }

      // Procedural soft pink/ocean noise wash
      const bufferSize = ctx.sampleRate * 2;
      const noiseBuffer = ctx.createBuffer(1, bufferSize, ctx.sampleRate);
      const output = noiseBuffer.getChannelData(0);
      let b0 = 0, b1 = 0, b2 = 0, b3 = 0, b4 = 0, b5 = 0, b6 = 0;
      for (let i = 0; i < bufferSize; i++) {
        const white = Math.random() * 2 - 1;
        b0 = 0.99886 * b0 + white * 0.0555179;
        b1 = 0.99332 * b1 + white * 0.0750759;
        b2 = 0.96900 * b2 + white * 0.1538520;
        b3 = 0.86650 * b3 + white * 0.3104856;
        b4 = 0.55000 * b4 + white * 0.5329522;
        b5 = -0.7616 * b5 - white * 0.0168980;
        output[i] = (b0 + b1 + b2 + b3 + b4 + b5 + b6 + white * 0.5362) * 0.035;
        b6 = white * 0.115926;
      }

      const whiteNoise = ctx.createBufferSource();
      whiteNoise.buffer = noiseBuffer;
      whiteNoise.loop = true;

      // Slow LFO for ocean wave swell effect
      const lfo = ctx.createOscillator();
      const lfoGain = ctx.createGain();
      lfo.frequency.setValueAtTime(0.12, ctx.currentTime); // 8-second wave period
      lfoGain.gain.setValueAtTime(300, ctx.currentTime);

      const noiseFilter = ctx.createBiquadFilter();
      noiseFilter.type = 'lowpass';
      noiseFilter.frequency.setValueAtTime(450, ctx.currentTime);

      lfo.connect(noiseFilter.frequency);
      whiteNoise.connect(noiseFilter);
      noiseFilter.connect(calmGainNode);

      whiteNoise.start();
      lfo.start();
      calmSourceNodes.push(whiteNoise, lfo);
    },

    stopCalmAmbiance: function () {
      if (calmGainNode && audioCtx) {
        try {
          const t = audioCtx.currentTime;
          calmGainNode.gain.setValueAtTime(calmGainNode.gain.value, t);
          calmGainNode.gain.exponentialRampToValueAtTime(0.0001, t + 1.2);
          setTimeout(() => {
            calmSourceNodes.forEach(node => {
              try { node.stop(); node.disconnect(); } catch (e) {}
            });
            calmSourceNodes = [];
            if (calmGainNode) {
              try { calmGainNode.disconnect(); } catch (e) {}
              calmGainNode = null;
            }
          }, 1300);
        } catch (e) {
          calmSourceNodes = [];
          calmGainNode = null;
        }
      }
    }
  };

  // Expose globally
  window.HLSound = AudioEngine;

  // Delegated sound listener for buttons marked with data-sound or primary buttons
  document.addEventListener('click', function (e) {
    const target = e.target.closest('button, a, [role=button], input[type=checkbox], input[type=radio]');
    if (!target) return;

    if (target.dataset.sound === 'none' || target.classList.contains('no-sound')) return;

    if (target.matches('input[type=checkbox], input[type=radio]')) {
      AudioEngine.playToggle();
    } else if (target.dataset.sound === 'correct') {
      AudioEngine.playCorrect();
    } else if (target.dataset.sound === 'fanfare') {
      AudioEngine.playFanfare();
    } else if (target.dataset.sound === 'levelup') {
      AudioEngine.playLevelUp();
    } else if (target.dataset.sound === 'click' || target.classList.contains('btn') || target.classList.contains('hl-btn')) {
      AudioEngine.playClick();
    }
  }, { passive: true });

})();
