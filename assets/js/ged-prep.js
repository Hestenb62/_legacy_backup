/**
 * GED Test Prep Suite Interactive Controller
 * Hesten's Learning Platform
 * Handles Formula Sheet (MathJax), TI-30XS Simulator, RLA Essay Lab, and Readiness Calculator.
 */

(function () {
  'use strict';

  // Active modal tracking for accessibility & focus trapping
  let activeModal = null;
  let previousFocusedElement = null;

  /* ==========================================================================
     1. Modal Controller & Accessibility Focus Trapping
     ========================================================================== */
  window.openGedModal = function (modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    previousFocusedElement = document.activeElement;
    activeModal = modal;

    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // If formula modal, trigger MathJax
    if (modalId === 'ged-modal-formula' && typeof window.ensureMathJax === 'function') {
      window.ensureMathJax(modal);
    }

    // Set focus to the first interactive element or close button
    const focusableElements = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    if (focusableElements.length > 0) {
      focusableElements[0].focus();
    }
  };

  window.closeGedModal = function (modalId) {
    const modal = modalId ? document.getElementById(modalId) : activeModal;
    if (!modal) return;

    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    activeModal = null;

    if (previousFocusedElement && typeof previousFocusedElement.focus === 'function') {
      previousFocusedElement.focus();
    }
  };

  // Global ESC Key Listener & Backdrop click
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && activeModal) {
      closeGedModal();
    }
  });

  document.addEventListener('click', function (e) {
    if (activeModal && e.target === activeModal) {
      closeGedModal();
    }
  });

  /* ==========================================================================
     2. TI-30XS MultiView Calculator Simulation Engine
     ========================================================================== */
  let calcExpression = '';
  let calcResult = '0';

  window.tiCalcInput = function (char) {
    const exprEl = document.getElementById('ti-expr');
    const resEl = document.getElementById('ti-result');
    if (!exprEl || !resEl) return;

    if (char === 'C') {
      calcExpression = '';
      calcResult = '0';
    } else if (char === 'DEL') {
      calcExpression = calcExpression.slice(0, -1);
    } else if (char === 'ANS') {
      calcExpression += calcResult !== 'Error' && calcResult !== '0' ? calcResult : '';
    } else {
      calcExpression += char;
    }

    exprEl.textContent = calcExpression || '0';
    resEl.textContent = calcResult;
  };

  window.tiCalcEvaluate = function () {
    const exprEl = document.getElementById('ti-expr');
    const resEl = document.getElementById('ti-result');
    if (!exprEl || !resEl || !calcExpression) return;

    try {
      // Sanitize and translate math operators for safe JS evaluation
      let sanitized = calcExpression
        .replace(/×/g, '*')
        .replace(/÷/g, '/')
        .replace(/π/g, 'Math.PI')
        .replace(/\^/g, '**')
        .replace(/√\(([^)]+)\)/g, 'Math.sqrt($1)')
        .replace(/√(\d+(\.\d+)?)/g, 'Math.sqrt($1)');

      // Evaluate safely with Math methods
      // Allow only numbers, operators, parentheses, decimal, and Math functions
      if (!/^[0-9+\-*/().\sMathPIsqrt**]+$/.test(sanitized)) {
        throw new Error('Invalid characters');
      }

      // Safe Function evaluation
      const result = Function('"use strict"; return (' + sanitized + ')')();

      if (isNaN(result) || !isFinite(result)) {
        calcResult = 'Error';
      } else {
        // Round cleanly to 6 decimal places if needed
        calcResult = Number.isInteger(result) ? result.toString() : parseFloat(result.toFixed(6)).toString();
      }
    } catch (err) {
      calcResult = 'Syntax Error';
    }

    resEl.textContent = calcResult;
  };

  /* ==========================================================================
     3. RLA Extended Response Essay Lab (Timer & Autosave)
     ========================================================================== */
  let essayTimerSeconds = 45 * 60; // 45 minutes
  let essayTimerInterval = null;
  let isTimerRunning = false;

  function updateEssayTimerDisplay() {
    const timerDisplay = document.getElementById('essay-timer-text');
    if (!timerDisplay) return;

    const mins = Math.floor(essayTimerSeconds / 60);
    const secs = essayTimerSeconds % 60;
    timerDisplay.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
  }

  window.toggleEssayTimer = function () {
    const btn = document.getElementById('essay-timer-toggle-btn');
    if (!btn) return;

    if (isTimerRunning) {
      clearInterval(essayTimerInterval);
      isTimerRunning = false;
      btn.textContent = 'Resume Timer';
    } else {
      isTimerRunning = true;
      btn.textContent = 'Pause Timer';
      essayTimerInterval = setInterval(function () {
        if (essayTimerSeconds > 0) {
          essayTimerSeconds--;
          updateEssayTimerDisplay();
        } else {
          clearInterval(essayTimerInterval);
          isTimerRunning = false;
          btn.textContent = 'Time Up!';
          alert('45 minutes have elapsed for the Extended Response!');
        }
      }, 1000);
    }
  };

  window.resetEssayTimer = function () {
    clearInterval(essayTimerInterval);
    isTimerRunning = false;
    essayTimerSeconds = 45 * 60;
    updateEssayTimerDisplay();
    const btn = document.getElementById('essay-timer-toggle-btn');
    if (btn) btn.textContent = 'Start 45m Timer';
  };

  window.handleEssayInput = function (textarea) {
    const text = textarea.value || '';
    const wordCountEl = document.getElementById('essay-word-count-num');
    
    // Count words
    const words = text.trim() ? text.trim().split(/\s+/).length : 0;
    if (wordCountEl) {
      wordCountEl.textContent = words;
    }

    // Autosave to localStorage
    try {
      localStorage.setItem('ged_essay_draft', text);
    } catch (e) {
      // Storage unavailable or full
    }
  };

  window.clearEssayDraft = function () {
    if (confirm('Are you sure you want to clear your current essay draft?')) {
      const textarea = document.getElementById('ged-essay-input');
      if (textarea) {
        textarea.value = '';
        handleEssayInput(textarea);
      }
      try {
        localStorage.removeItem('ged_essay_draft');
      } catch (e) {}
    }
  };

  /* ==========================================================================
     4. GED Score Readiness Calculator
     ========================================================================== */
  window.updateGedReadinessScore = function () {
    let completedCount = 0;
    let totalGedSkills = 108; // Total skills across Math, RLA, Science, Social

    try {
      // Read standards mastery
      const rawMastery = localStorage.getItem('hesten_standards_mastery');
      const mastery = rawMastery ? JSON.parse(rawMastery) : {};

      // Also check completed lessons
      for (const key in mastery) {
        if (key.startsWith('ged-') || key.startsWith('GED.')) {
          if (mastery[key] >= 80 || mastery[key] === true) {
            completedCount++;
          }
        }
      }

      // Check local checked skills
      document.querySelectorAll('.skill-card.completed').forEach(() => {
        completedCount++;
      });
      // Deduplicate count if elements overlap
      completedCount = Math.min(completedCount, totalGedSkills);
    } catch (e) {
      completedCount = 0;
    }

    // Score calculation: Baseline 100 up to 200
    // 0 completion = 135-140 diagnostic baseline, scaling to 200 at 100%
    const ratio = completedCount / totalGedSkills;
    const projectedScore = Math.min(200, Math.round(135 + (ratio * 65)));

    const scoreNumEl = document.getElementById('ged-projected-score');
    const scoreStatusEl = document.getElementById('ged-projected-status');

    if (scoreNumEl) {
      scoreNumEl.textContent = projectedScore;
    }

    if (scoreStatusEl) {
      if (projectedScore >= 175) {
        scoreStatusEl.textContent = 'College Ready + Credit';
        scoreStatusEl.style.color = '#10b981';
      } else if (projectedScore >= 165) {
        scoreStatusEl.textContent = 'College Ready';
        scoreStatusEl.style.color = '#8b5cf6';
      } else if (projectedScore >= 145) {
        scoreStatusEl.textContent = 'Passing (Equivalency)';
        scoreStatusEl.style.color = '#3b82f6';
      } else {
        scoreStatusEl.textContent = 'Diagnostic / Below 145';
        scoreStatusEl.style.color = '#e11d48';
      }
    }
  };

  /* ==========================================================================
     5. Initialization
     ========================================================================== */
  document.addEventListener('DOMContentLoaded', function () {
    // Restore saved essay draft if present
    const savedEssay = localStorage.getItem('ged_essay_draft');
    const essayInput = document.getElementById('ged-essay-input');
    if (savedEssay && essayInput) {
      essayInput.value = savedEssay;
      handleEssayInput(essayInput);
    }

    // Calculate readiness score
    updateGedReadinessScore();

    // Listen to storage events for cross-tab sync
    window.addEventListener('storage', function (e) {
      if (e.key === 'hesten_standards_mastery') {
        updateGedReadinessScore();
      }
    });

    window.addEventListener('hl:data-sync', updateGedReadinessScore);
  });
})();
