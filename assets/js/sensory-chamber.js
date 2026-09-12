/**
 * assets/js/sensory-chamber.js
 * Universal Breathe & Reset Sensory Chamber for Hesten's Learning.
 * Provides a 1-click calm sanctuary with 4-7-8 breathing pacer, visual grounding,
 * ambient soundscape integration, and sensory downtime timer.
 */

(function () {
  'use strict';

  let breathTimer = null;
  let cycleIndex = 0;
  let isRunning = false;
  let remainingSeconds = 120; // Default 2 minutes
  let countdownTimer = null;

  // 4-7-8 Pranayama pacing: Inhale 4s, Hold 7s, Exhale 8s
  const PHASES = [
    { name: 'Inhale', duration: 4, instruction: 'Breathe in slowly through your nose...', scale: 1.5 },
    { name: 'Hold', duration: 7, instruction: 'Gently hold your breath...', scale: 1.5 },
    { name: 'Exhale', duration: 8, instruction: 'Release slowly and completely through your mouth...', scale: 1.0 }
  ];

  function openSensoryChamber() {
    const modal = document.getElementById('sensory-chamber-modal');
    if (!modal) return;

    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Start breathing cycle
    startBreathing();

    // Start calm soundscape if sound engine is available and not muted
    if (window.HLSound && !window.HLSound.isMuted()) {
      window.HLSound.startCalmAmbiance('ocean');
    }

    const closeBtn = document.getElementById('sensory-close-btn');
    if (closeBtn) closeBtn.focus();
  }

  function closeSensoryChamber() {
    const modal = document.getElementById('sensory-chamber-modal');
    if (!modal) return;

    modal.style.display = 'none';
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    stopBreathing();

    if (window.HLSound) {
      window.HLSound.stopCalmAmbiance();
    }
  }

  function startBreathing() {
    isRunning = true;
    cycleIndex = 0;
    remainingSeconds = parseInt(document.getElementById('sensory-duration-select')?.value || '120', 10);
    runPhase();
    startCountdown();
  }

  function stopBreathing() {
    isRunning = false;
    if (breathTimer) clearTimeout(breathTimer);
    if (countdownTimer) clearInterval(countdownTimer);
  }

  function runPhase() {
    if (!isRunning) return;

    const phase = PHASES[cycleIndex];
    const orb = document.getElementById('sensory-breathing-orb');
    const label = document.getElementById('sensory-phase-label');
    const instruction = document.getElementById('sensory-instruction');

    if (orb) {
      orb.style.transition = 'transform ' + phase.duration + 's cubic-bezier(0.4, 0, 0.2, 1)';
      orb.style.transform = 'scale(' + phase.scale + ')';
      if (phase.name === 'Inhale') {
        orb.className = 'sensory-orb inhaling';
      } else if (phase.name === 'Hold') {
        orb.className = 'sensory-orb holding';
      } else {
        orb.className = 'sensory-orb exhaling';
      }
    }

    if (label) {
      label.textContent = phase.name;
    }
    if (instruction) {
      instruction.textContent = phase.instruction;
    }

    breathTimer = setTimeout(() => {
      cycleIndex = (cycleIndex + 1) % PHASES.length;
      runPhase();
    }, phase.duration * 1000);
  }

  function startCountdown() {
    updateCountdownDisplay();
    if (countdownTimer) clearInterval(countdownTimer);

    countdownTimer = setInterval(() => {
      if (!isRunning) return;
      remainingSeconds--;
      updateCountdownDisplay();

      if (remainingSeconds <= 0) {
        stopBreathing();
        const instruction = document.getElementById('sensory-instruction');
        if (instruction) instruction.textContent = 'Session Complete. Take your time to return.';
        const label = document.getElementById('sensory-phase-label');
        if (label) label.textContent = 'Rest & Ready';
        if (window.HLSound) {
          window.HLSound.playCorrect();
        }
      }
    }, 1000);
  }

  function updateCountdownDisplay() {
    const display = document.getElementById('sensory-timer-display');
    if (!display) return;
    const mins = Math.floor(remainingSeconds / 60);
    const secs = remainingSeconds % 60;
    display.textContent = mins + ':' + (secs < 10 ? '0' : '') + secs;
  }

  // Expose methods globally
  window.HLSensory = {
    open: openSensoryChamber,
    close: closeSensoryChamber,
    setDuration: function (sec) {
      remainingSeconds = sec;
      updateCountdownDisplay();
    }
  };

  // Global keyboard shortcut: Alt + B (Breathe)
  window.addEventListener('keydown', function (e) {
    if (e.altKey && (e.key === 'b' || e.key === 'B')) {
      e.preventDefault();
      const modal = document.getElementById('sensory-chamber-modal');
      if (modal && modal.style.display === 'flex') {
        closeSensoryChamber();
      } else {
        openSensoryChamber();
      }
    } else if (e.key === 'Escape') {
      const modal = document.getElementById('sensory-chamber-modal');
      if (modal && modal.style.display === 'flex') {
        closeSensoryChamber();
      }
    }
  });

  // Attach button triggers on DOMContentLoaded
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-action=open-sensory-chamber]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        openSensoryChamber();
      });
    });

    const closeBtn = document.getElementById('sensory-close-btn');
    if (closeBtn) {
      closeBtn.addEventListener('click', closeSensoryChamber);
    }

    const soundToggle = document.getElementById('sensory-sound-toggle');
    if (soundToggle) {
      soundToggle.addEventListener('change', (e) => {
        if (!window.HLSound) return;
        if (e.target.checked) {
          window.HLSound.startCalmAmbiance('ocean');
        } else {
          window.HLSound.stopCalmAmbiance();
        }
      });
    }

    const durationSelect = document.getElementById('sensory-duration-select');
    if (durationSelect) {
      durationSelect.addEventListener('change', (e) => {
        remainingSeconds = parseInt(e.target.value, 10);
        updateCountdownDisplay();
        startBreathing();
      });
    }
  });

})();
