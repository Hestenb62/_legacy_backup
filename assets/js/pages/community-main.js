/**
 * Community Hub & Resources Repository Engine (assets/js/pages/community-main.js)
 * Live Directory Filtering, Offline-First Feedback Archive, and Interactive Upvote Board.
 * 100% Dependency-free, WCAG 2.1/2.2 AA/AAA compliant.
 */

(function () {
  'use strict';

  // Storage Keys
  const STORAGE_KEY_FEEDBACK_HISTORY = 'hl_community_feedback_history';
  const STORAGE_KEY_UPVOTES = 'hl_community_upvotes';

  // Initial Baseline Upvote Seed Numbers
  const BASELINE_UPVOTES = {
    'idea-science-lab-sheets': 142,
    'idea-dyscalculia-abacus': 128,
    'idea-multisibling-dashboard': 96,
    'idea-audio-speed-control': 89,
    'idea-bilingual-phonics': 74,
    'idea-latex-flashcards': 68
  };

  // State
  let activeCategory = 'all';
  let activeSearchQuery = '';

  // DOM Elements
  let searchInput = null;
  let clearSearchBtn = null;
  let filterPills = [];
  let directoryCards = [];
  let noResultsEl = null;
  let resultsCountEl = null;

  document.addEventListener('DOMContentLoaded', () => {
    initDirectoryFiltering();
    initFeedbackForm();
    initUpvoteBoard();
    renderFeedbackHistory();

    // Listen for storage events (cross-tab synchronization)
    window.addEventListener('storage', (e) => {
      if (e.key === STORAGE_KEY_UPVOTES) {
        syncUpvoteBoardUI();
      } else if (e.key === STORAGE_KEY_FEEDBACK_HISTORY) {
        renderFeedbackHistory();
      }
    });
  });

  // --- 1. DIRECTORY SEARCH & CATEGORY FILTERING ---
  function initDirectoryFiltering() {
    searchInput = document.getElementById('community-search-input');
    clearSearchBtn = document.getElementById('btn-clear-search');
    filterPills = Array.from(document.querySelectorAll('.filter-pill'));
    directoryCards = Array.from(document.querySelectorAll('.community-card'));
    noResultsEl = document.getElementById('repo-no-results');
    resultsCountEl = document.getElementById('repo-results-count');
    const resetBtn = document.getElementById('btn-reset-filters');

    // Search Input Event
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        activeSearchQuery = e.target.value.trim().toLowerCase();
        if (clearSearchBtn) {
          clearSearchBtn.style.display = activeSearchQuery.length > 0 ? 'block' : 'none';
        }
        applyFilters();
      });
    }

    // Clear Search Button
    if (clearSearchBtn) {
      clearSearchBtn.addEventListener('click', () => {
        if (searchInput) {
          searchInput.value = '';
          searchInput.focus();
        }
        activeSearchQuery = '';
        clearSearchBtn.style.display = 'none';
        applyFilters();
      });
    }

    // Category Filter Pills
    filterPills.forEach((pill) => {
      pill.addEventListener('click', () => {
        filterPills.forEach((p) => {
          p.classList.remove('active');
          p.setAttribute('aria-selected', 'false');
        });
        pill.classList.add('active');
        pill.setAttribute('aria-selected', 'true');
        activeCategory = pill.getAttribute('data-category') || 'all';
        applyFilters();
      });
    });

    // Reset Filters Button
    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        if (searchInput) {
          searchInput.value = '';
        }
        activeSearchQuery = '';
        if (clearSearchBtn) clearSearchBtn.style.display = 'none';

        const allPill = document.querySelector('.filter-pill[data-category="all"]');
        if (allPill) allPill.click();
      });
    }

    updateCategoryCounts();
  }

  function applyFilters() {
    let visibleCount = 0;

    directoryCards.forEach((card) => {
      const cardCategory = card.getAttribute('data-category') || '';
      const cardKeywords = (card.getAttribute('data-keywords') || '').toLowerCase();
      const cardText = card.textContent.toLowerCase();

      const matchesCategory = (activeCategory === 'all' || cardCategory === activeCategory);
      const matchesSearch = !activeSearchQuery || (cardKeywords.includes(activeSearchQuery) || cardText.includes(activeSearchQuery));

      if (matchesCategory && matchesSearch) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    // Toggle Empty State
    if (noResultsEl) {
      noResultsEl.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Update Results Label
    if (resultsCountEl) {
      const catLabel = activeCategory === 'all' ? 'all' : activeCategory;
      resultsCountEl.textContent = `Showing ${visibleCount} of ${directoryCards.length} community resources`;
    }
  }

  function updateCategoryCounts() {
    const counts = { all: directoryCards.length, homeschool: 0, teachers: 0, neurodiversity: 0, steam: 0 };
    directoryCards.forEach((card) => {
      const cat = card.getAttribute('data-category');
      if (counts[cat] !== undefined) counts[cat]++;
    });

    for (const [cat, count] of Object.entries(counts)) {
      const el = document.getElementById(`count-${cat}`);
      if (el) el.textContent = count;
    }
  }

  // --- 2. FEEDBACK FORM & LOCAL STORAGE BACKUP ---
  function initFeedbackForm() {
    const form = document.getElementById('communityFeedbackForm');
    const msgTextarea = document.getElementById('feedback_message');
    const charCountEl = document.getElementById('feedback-char-count');
    const alertEl = document.getElementById('js-feedback-alert');
    const clearHistoryBtn = document.getElementById('btn-clear-feedback-history');

    if (msgTextarea && charCountEl) {
      msgTextarea.addEventListener('input', () => {
        const len = msgTextarea.value.length;
        charCountEl.textContent = `${len} / 1000`;
        if (len > 900) {
          charCountEl.style.color = '#e11d48';
        } else {
          charCountEl.style.color = '';
        }
      });
    }

    if (form) {
      form.addEventListener('submit', (e) => {
        const botCheck = form.querySelector('input[name="community_bot_check"]');
        if (botCheck && botCheck.value) {
          e.preventDefault();
          return; // Spam bot trapped
        }

        const category = document.getElementById('feedback_category')?.value || 'General Feedback';
        const role = document.getElementById('feedback_role')?.value || 'Community Member';
        const name = document.getElementById('feedback_name')?.value.trim() || 'Anonymous Learner';
        const email = document.getElementById('feedback_email')?.value.trim() || '';
        const message = document.getElementById('feedback_message')?.value.trim() || '';

        if (!message) {
          e.preventDefault();
          alert('Please enter your feedback message.');
          return;
        }

        // Save to Local History Archive
        const entry = {
          id: 'fb_' + Date.now(),
          category,
          role,
          name,
          email,
          message,
          timestamp: new Date().toISOString()
        };
        saveFeedbackToHistory(entry);

        // Display instant client confirmation if submitting via JS / offline
        if (alertEl) {
          alertEl.style.display = 'flex';
          alertEl.innerHTML = `
            <i class="fas fa-check-circle alert-icon"></i>
            <div>
              <h4 style="margin: 0; font-weight: 800; font-size: 1rem;">Thank you, ${escapeHtml(name)}!</h4>
              <p style="margin: 0.25rem 0 0 0; font-size: 0.875rem;">Your feedback regarding <strong>${escapeHtml(category)}</strong> has been recorded and safely archived. It guides our platform design directly.</p>
            </div>
          `;
          alertEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // Reset form
        form.reset();
        if (charCountEl) charCountEl.textContent = '0 / 1000';
        renderFeedbackHistory();

        // Broadcast sync event
        if (typeof window.hlBroadcastSync === 'function') {
          window.hlBroadcastSync('feedback-submitted', entry);
        }
      });
    }

    if (clearHistoryBtn) {
      clearHistoryBtn.addEventListener('click', () => {
        if (confirm('Clear your local feedback history on this browser?')) {
          localStorage.removeItem(STORAGE_KEY_FEEDBACK_HISTORY);
          renderFeedbackHistory();
        }
      });
    }
  }

  function getFeedbackHistory() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY_FEEDBACK_HISTORY);
      return raw ? JSON.parse(raw) : [];
    } catch (e) {
      return [];
    }
  }

  function saveFeedbackToHistory(entry) {
    const list = getFeedbackHistory();
    list.unshift(entry);
    // Keep last 15 submissions
    const trimmed = list.slice(0, 15);
    try {
      localStorage.setItem(STORAGE_KEY_FEEDBACK_HISTORY, JSON.stringify(trimmed));
    } catch (e) {}
  }

  function renderFeedbackHistory() {
    const block = document.getElementById('feedback-history-block');
    const container = document.getElementById('feedback-history-list');
    if (!block || !container) return;

    const list = getFeedbackHistory();
    if (list.length === 0) {
      block.style.display = 'none';
      container.innerHTML = '';
      return;
    }

    block.style.display = 'block';
    container.innerHTML = list.map((item) => {
      const dateStr = item.timestamp ? new Date(item.timestamp).toLocaleDateString() : 'Recent';
      return `
        <div class="history-item">
          <div class="history-item-top">
            <span class="history-item-cat">${escapeHtml(item.category)}</span>
            <span class="history-item-date">${escapeHtml(dateStr)}</span>
          </div>
          <p class="history-item-msg">${escapeHtml(item.message)}</p>
        </div>
      `;
    }).join('');
  }

  // --- 3. INTERACTIVE COMMUNITY UPVOTE BOARD ---
  function getStoredUpvotes() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY_UPVOTES);
      return raw ? JSON.parse(raw) : {};
    } catch (e) {
      return {};
    }
  }

  function saveStoredUpvotes(obj) {
    try {
      localStorage.setItem(STORAGE_KEY_UPVOTES, JSON.stringify(obj));
    } catch (e) {}
  }

  function initUpvoteBoard() {
    syncUpvoteBoardUI();
  }

  function syncUpvoteBoardUI() {
    const userVotes = getStoredUpvotes();

    for (const [ideaId, baseline] of Object.entries(BASELINE_UPVOTES)) {
      const hasVoted = Boolean(userVotes[ideaId]);
      const currentCount = baseline + (hasVoted ? 1 : 0);

      const countEl = document.getElementById(`count-${ideaId}`);
      if (countEl) {
        countEl.textContent = currentCount;
      }

      const itemEl = document.querySelector(`.idea-item[data-idea-id="${ideaId}"]`);
      if (itemEl) {
        const btn = itemEl.querySelector('.idea-vote-btn');
        if (btn) {
          if (hasVoted) {
            btn.classList.add('upvoted');
            btn.setAttribute('aria-pressed', 'true');
            btn.title = 'You upvoted this idea. Click to withdraw.';
          } else {
            btn.classList.remove('upvoted');
            btn.setAttribute('aria-pressed', 'false');
            btn.title = 'Upvote this community idea';
          }
        }
      }
    }
  }

  window.toggleIdeaUpvote = function (ideaId) {
    const userVotes = getStoredUpvotes();
    const isVoted = Boolean(userVotes[ideaId]);

    if (isVoted) {
      delete userVotes[ideaId];
    } else {
      userVotes[ideaId] = true;
    }

    saveStoredUpvotes(userVotes);
    syncUpvoteBoardUI();

    // Announce to Assistive Tech
    const baseline = BASELINE_UPVOTES[ideaId] || 100;
    const newTotal = baseline + (!isVoted ? 1 : 0);
    const msg = !isVoted ? `Upvoted! Current total: ${newTotal}` : `Upvote removed. Current total: ${newTotal}`;

    let announcer = document.getElementById('a11y-upvote-announcer');
    if (!announcer) {
      announcer = document.createElement('div');
      announcer.id = 'a11y-upvote-announcer';
      announcer.setAttribute('aria-live', 'polite');
      announcer.className = 'sr-only';
      document.body.appendChild(announcer);
    }
    announcer.textContent = msg;
  };

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

})();

