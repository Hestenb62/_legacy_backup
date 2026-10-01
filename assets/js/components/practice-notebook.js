/**
 * assets/js/components/practice-notebook.js
 * Universal Interactive Student Practice Notebook Engine
 * Hesten's Learning Platform
 *
 * Capabilities:
 * - Persistent student problem set workspaces with debounced auto-save
 * - Local storage persistence under canonical key `hl_practice_notebook_${lessonId}`
 * - Global cloud synchronization trigger via `hl:data-sync`
 * - Dynamic problem solved status toggling with accessible live updates
 * - Visual progress tracking meter & mastery celebratory states
 * - 1-Click integration with the Super Scratchpad & Whiteboard Studio
 * - Print-ready homework formatting with student typed answers
 * - Cross-tab real-time storage synchronization
 */

(function () {
  'use strict';

  // State Constants
  const STORAGE_PREFIX = 'hl_practice_notebook_';
  const DEBOUNCE_DELAY = 400; // ms

  let currentLessonId = '';
  let notebookState = {
    lessonId: '',
    lastModified: 0,
    problems: {} // { [problemNumber]: { answer: string, solved: boolean, updatedAt: number } }
  };

  let debounceTimers = {};

  /**
   * Determine the current lesson identifier
   */
  function resolveLessonId() {
    const section = document.getElementById('problem-set');
    if (section && section.dataset.lessonId) {
      return section.dataset.lessonId.trim();
    }

    if (window.HL_CURRENT_LESSON_ID) {
      return window.HL_CURRENT_LESSON_ID;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const lessonParam = urlParams.get('lesson');
    if (lessonParam) {
      return lessonParam.trim();
    }

    // Fallback: derive from pathname
    const pathParts = window.location.pathname.split('/');
    const lastPart = pathParts[pathParts.length - 1].replace(/\.php$/, '');
    return lastPart || 'default-lesson';
  }

  /**
   * Load notebook state from localStorage
   */
  function loadState() {
    try {
      const raw = localStorage.getItem(STORAGE_PREFIX + currentLessonId);
      if (raw) {
        const parsed = JSON.parse(raw);
        if (parsed && typeof parsed === 'object') {
          notebookState = {
            lessonId: currentLessonId,
            lastModified: parsed.lastModified || Date.now(),
            problems: parsed.problems || {}
          };
          return;
        }
      }
    } catch (e) {
      console.warn('[PracticeNotebook] Error reading local storage:', e);
    }

    notebookState = {
      lessonId: currentLessonId,
      lastModified: Date.now(),
      problems: {}
    };
  }

  /**
   * Commit notebook state to localStorage and broadcast sync event
   */
  function saveState() {
    try {
      notebookState.lastModified = Date.now();
      const storageKey = STORAGE_PREFIX + currentLessonId;
      localStorage.setItem(storageKey, JSON.stringify(notebookState));

      // Dispatch universal platform data sync event for Google Drive cloud sync
      window.dispatchEvent(new CustomEvent('hl:data-sync', {
        detail: {
          key: storageKey,
          timestamp: notebookState.lastModified,
          source: 'practice-notebook'
        }
      }));
    } catch (e) {
      console.warn('[PracticeNotebook] Error saving to local storage:', e);
    }
  }

  /**
   * Update problem set progress bar and status text
   */
  function updateProgress() {
    const cards = document.querySelectorAll('.lesson-problem-card');
    const total = cards.length;
    if (total === 0) return;

    let solvedCount = 0;
    cards.forEach(card => {
      const num = card.dataset.problemNumber || card.getAttribute('data-problem-number');
      if (num && notebookState.problems[num] && notebookState.problems[num].solved) {
        solvedCount++;
      }
    });

    const percent = Math.round((solvedCount / total) * 100);

    const progressText = document.getElementById('lesson-practice-progress-text');
    if (progressText) {
      progressText.textContent = `${solvedCount} of ${total} Solved (${percent}%)`;
    }

    const progressBar = document.getElementById('lesson-practice-bar-fill');
    if (progressBar) {
      progressBar.style.width = `${percent}%`;
      progressBar.setAttribute('aria-valuenow', percent);
    }

    const container = document.getElementById('problem-set');
    if (container) {
      if (solvedCount === total && total > 0) {
        container.classList.add('all-solved');
      } else {
        container.classList.remove('all-solved');
      }
    }
  }

  /**
   * Accessible screen reader status announcement
   */
  function announceStatus(message) {
    let liveRegion = document.getElementById('lesson-notebook-live-announcer');
    if (!liveRegion) {
      liveRegion = document.createElement('div');
      liveRegion.id = 'lesson-notebook-live-announcer';
      liveRegion.className = 'sr-only';
      liveRegion.setAttribute('aria-live', 'polite');
      liveRegion.setAttribute('aria-atomic', 'true');
      document.body.appendChild(liveRegion);
    }
    liveRegion.textContent = message;
  }

  /**
   * Toggle solved state of a specific problem card
   */
  function toggleProblemSolved(probNum, statusBtn, card) {
    if (!notebookState.problems[probNum]) {
      notebookState.problems[probNum] = {
        answer: '',
        solved: false,
        updatedAt: Date.now()
      };
    }

    const isCurrentlySolved = !!notebookState.problems[probNum].solved;
    const newSolved = !isCurrentlySolved;

    notebookState.problems[probNum].solved = newSolved;
    notebookState.problems[probNum].updatedAt = Date.now();

    // UI Updates
    applyProblemCardState(probNum, card, statusBtn);
    saveState();
    updateProgress();

    if (newSolved) {
      announceStatus(`Problem ${probNum} marked as solved.`);
      // Optional subtle audio chime if audio feedback module is available
      if (window.HLAudioFeedback && typeof window.HLAudioFeedback.playSuccessChime === 'function') {
        window.HLAudioFeedback.playSuccessChime();
      }
    } else {
      announceStatus(`Problem ${probNum} marked as in progress.`);
    }
  }

  /**
   * Apply visual state to a card based on current notebookState
   */
  function applyProblemCardState(probNum, card, statusBtn) {
    const probData = notebookState.problems[probNum] || { answer: '', solved: false };
    const textarea = card.querySelector('.lesson-student-workspace');
    const indicator = card.querySelector('.lesson-save-indicator');

    if (textarea && textarea.value !== probData.answer) {
      textarea.value = probData.answer || '';
    }

    if (probData.solved) {
      card.classList.add('is-solved');
      if (statusBtn) {
        statusBtn.classList.add('solved');
        statusBtn.setAttribute('aria-pressed', 'true');
        statusBtn.innerHTML = '<i class="fas fa-check-circle" aria-hidden="true"></i> <span>Solved</span>';
        statusBtn.title = 'Click to mark as in progress';
      }
    } else {
      card.classList.remove('is-solved');
      if (statusBtn) {
        statusBtn.classList.remove('solved');
        statusBtn.setAttribute('aria-pressed', 'false');
        statusBtn.innerHTML = '<i class="far fa-circle" aria-hidden="true"></i> <span>Mark Solved</span>';
        statusBtn.title = 'Click to mark problem as solved';
      }
    }

    if (indicator && probData.answer) {
      indicator.textContent = 'Saved';
      indicator.className = 'lesson-save-indicator saved';
    }
  }

  /**
   * Attach event listeners to all problem cards
   */
  function bindProblemCards() {
    const cards = document.querySelectorAll('.lesson-problem-card');

    cards.forEach((card, idx) => {
      let probNum = card.dataset.problemNumber || card.getAttribute('data-problem-number');
      if (!probNum) {
        probNum = String(idx + 1);
        card.setAttribute('data-problem-number', probNum);
      }

      const textarea = card.querySelector('.lesson-student-workspace');
      const statusBtn = card.querySelector('.lesson-problem-status-btn');
      const scratchpadBtn = card.querySelector('.lesson-open-scratchpad-btn');
      const saveIndicator = card.querySelector('.lesson-save-indicator');

      // Initialize UI with saved values
      applyProblemCardState(probNum, card, statusBtn);

      // Workspace input handling with debounced auto-save
      if (textarea) {
        textarea.addEventListener('input', () => {
          if (saveIndicator) {
            saveIndicator.textContent = 'Saving...';
            saveIndicator.className = 'lesson-save-indicator saving';
          }

          if (debounceTimers[probNum]) {
            clearTimeout(debounceTimers[probNum]);
          }

          debounceTimers[probNum] = setTimeout(() => {
            if (!notebookState.problems[probNum]) {
              notebookState.problems[probNum] = { solved: false };
            }
            notebookState.problems[probNum].answer = textarea.value;
            notebookState.problems[probNum].updatedAt = Date.now();

            saveState();

            if (saveIndicator) {
              saveIndicator.textContent = 'Saved';
              saveIndicator.className = 'lesson-save-indicator saved';
            }
          }, DEBOUNCE_DELAY);
        });
      }

      // Mark Solved button toggle
      if (statusBtn) {
        statusBtn.addEventListener('click', (e) => {
          e.preventDefault();
          toggleProblemSolved(probNum, statusBtn, card);
        });
      }

      // Scratchpad Launcher
      if (scratchpadBtn) {
        scratchpadBtn.addEventListener('click', (e) => {
          e.preventDefault();
          const promptEl = card.querySelector('.lesson-problem-prompt');
          const promptText = promptEl ? promptEl.innerText.trim().slice(0, 140) : `Problem ${probNum}`;
          
          if (window.exportWorkToScratchpad) {
            window.exportWorkToScratchpad(`Lesson Practice: Problem ${probNum}`, `Problem Prompt:\n${promptText}\n\nMy Work & Calculations:\n\n`);
          } else if (window.HLScratchpad && window.HLScratchpad.open) {
            window.HLScratchpad.open('notes');
          } else if (window.toggleScratchpad) {
            window.toggleScratchpad();
          } else {
            const toggle = document.getElementById('scratchpad-toggle');
            if (toggle) toggle.click();
          }

          announceStatus(`Opened Scratchpad for Problem ${probNum}.`);
        });
      }
    });

    updateProgress();
  }

  /**
   * Sync typed text from textareas to printable containers for crystal-clear print quality
   */
  function syncPrintAnswers() {
    const cards = document.querySelectorAll('.lesson-problem-card');
    cards.forEach(card => {
      const textarea = card.querySelector('.lesson-student-workspace');
      let printBox = card.querySelector('.lesson-print-student-answer');
      if (!printBox) {
        printBox = document.createElement('div');
        printBox.className = 'lesson-print-student-answer';
        printBox.setAttribute('aria-hidden', 'true');
        const wrapper = card.querySelector('.lesson-student-workspace-wrapper') || card;
        wrapper.appendChild(printBox);
      }
      const text = textarea ? textarea.value.trim() : '';
      printBox.textContent = text ? text : '(No written work entered)';
    });
  }

  /**
   * Scoped print runner that isolates ONLY the worksheet section
   */
  function printWorksheet(isSolvedMode) {
    syncPrintAnswers();
    document.body.classList.add('printing-lesson-worksheet');
    if (isSolvedMode) {
      document.body.classList.add('print-student-work-mode');
    } else {
      document.body.classList.remove('print-student-work-mode');
    }

    const cleanup = () => {
      document.body.classList.remove('printing-lesson-worksheet', 'print-student-work-mode');
      window.removeEventListener('afterprint', cleanup);
    };
    window.addEventListener('afterprint', cleanup);

    window.print();

    // Fallback timer if afterprint doesn't fire
    setTimeout(cleanup, 2000);
  }

  /**
   * Bind top-level problem set actions (print blank, print solved, clear work)
   */
  function bindHeaderActions() {
    // Print Blank Worksheet button
    const printBlankBtn = document.getElementById('lesson-btn-print-blank');
    if (printBlankBtn) {
      printBlankBtn.addEventListener('click', (e) => {
        e.preventDefault();
        printWorksheet(false);
      });
    }

    // Print Solved Work button
    const printSolvedBtn = document.getElementById('lesson-btn-print-solved');
    if (printSolvedBtn) {
      printSolvedBtn.addEventListener('click', (e) => {
        e.preventDefault();
        printWorksheet(true);
      });
    }

    // Intercept native browser print (Ctrl+P) on pages with #problem-set to isolate worksheet
    window.addEventListener('beforeprint', () => {
      if (document.getElementById('problem-set')) {
        syncPrintAnswers();
        document.body.classList.add('printing-lesson-worksheet');
      }
    });

    window.addEventListener('afterprint', () => {
      document.body.classList.remove('printing-lesson-worksheet', 'print-student-work-mode');
    });

    // Reset / Clear work button
    const clearBtn = document.getElementById('lesson-btn-clear-work');
    if (clearBtn) {
      clearBtn.addEventListener('click', () => {
        const confirmClear = window.confirm(
          'Are you sure you want to clear your typed work and solved checkmarks for this problem set? This cannot be undone.'
        );
        if (!confirmClear) return;

        notebookState.problems = {};
        saveState();

        const cards = document.querySelectorAll('.lesson-problem-card');
        cards.forEach((card, idx) => {
          const probNum = card.dataset.problemNumber || String(idx + 1);
          const statusBtn = card.querySelector('.lesson-problem-status-btn');
          const textarea = card.querySelector('.lesson-student-workspace');
          const indicator = card.querySelector('.lesson-save-indicator');

          if (textarea) textarea.value = '';
          if (indicator) {
            indicator.textContent = '';
            indicator.className = 'lesson-save-indicator';
          }
          applyProblemCardState(probNum, card, statusBtn);
        });

        updateProgress();
        announceStatus('All student answers for this problem set have been cleared.');
      });
    }
  }

  /**
   * Listen for cross-tab storage changes
   */
  function bindStorageSync() {
    window.addEventListener('storage', (e) => {
      if (e.key === STORAGE_PREFIX + currentLessonId) {
        loadState();
        const cards = document.querySelectorAll('.lesson-problem-card');
        cards.forEach((card, idx) => {
          const probNum = card.dataset.problemNumber || String(idx + 1);
          const statusBtn = card.querySelector('.lesson-problem-status-btn');
          applyProblemCardState(probNum, card, statusBtn);
        });
        updateProgress();
      }
    });
  }

  /**
   * Primary Initialization Routine
   */
  function init() {
    const problemSetSection = document.getElementById('problem-set');
    if (!problemSetSection) return;

    currentLessonId = resolveLessonId();
    problemSetSection.setAttribute('data-lesson-id', currentLessonId);

    loadState();
    bindProblemCards();
    bindHeaderActions();
    bindStorageSync();
  }

  // Auto-mount on DOM readiness
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Export public interface for external callers or testing
  window.HLPracticeNotebook = {
    init: init,
    getState: () => ({ ...notebookState }),
    saveState: saveState,
    updateProgress: updateProgress
  };

})();
