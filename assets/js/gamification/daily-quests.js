/**
 * assets/js/gamification/daily-quests.js
 * Daily rotating quests, streak shields, and XP progression for Hesten's Learning.
 */

(function () {
  'use strict';

  function getTodayKey() {
    const d = new Date();
    return d.toISOString().split('T')[0];
  }

  function getDailyQuests() {
    const today = getTodayKey();
    const stored = localStorage.getItem('hl_quests_' + today);
    if (stored) {
      try { return JSON.parse(stored); } catch (e) {}
    }

    // Default quests for the day
    const defaultQuests = [
      { id: 'q-read', title: 'Avid Reader', desc: 'Read at least 1 chapter or book in the Library', xp: 50, icon: 'fa-book-open', target: 1, current: 0, completed: false },
      { id: 'q-math', title: 'Math Master', desc: 'Complete 5 practice problems or diagnostic items', xp: 75, icon: 'fa-calculator', target: 5, current: 0, completed: false },
      { id: 'q-flash', title: 'Memory Champion', desc: 'Review 10 cards in Flashcard Studio', xp: 40, icon: 'fa-clone', target: 10, current: 0, completed: false }
    ];

    saveDailyQuests(defaultQuests);
    return defaultQuests;
  }

  function saveDailyQuests(quests) {
    const today = getTodayKey();
    try {
      localStorage.setItem('hl_quests_' + today, JSON.stringify(quests));
    } catch (e) {}
  }

  function incrementQuest(questId, amount = 1) {
    const quests = getDailyQuests();
    const q = quests.find(x => x.id === questId);
    if (!q || q.completed) return;

    q.current = Math.min(q.target, q.current + amount);
    if (q.current >= q.target && !q.completed) {
      q.completed = true;
      awardQuestXP(q.xp, q.title);
    }
    saveDailyQuests(quests);
    renderQuestWidget();
  }

  function awardQuestXP(xp, questTitle) {
    try {
      let profile = JSON.parse(localStorage.getItem('hesten-user-profile') || '{}');
      profile.xp = (profile.xp || 0) + xp;
      profile.level = Math.floor(profile.xp / 250) + 1;
      localStorage.setItem('hesten-user-profile', JSON.stringify(profile));

      window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
      window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { source: 'daily-quest' } }));

      if (window.HLSound) {
        window.HLSound.playFanfare();
      }
    } catch (e) {}
  }

  function renderQuestWidget() {
    const containers = document.querySelectorAll('.daily-quests-container, #daily-quests-root');
    if (containers.length === 0) return;

    const quests = getDailyQuests();

    containers.forEach(container => {
      container.innerHTML = `
        <div class="daily-quests-widget">
          <div class="quest-widget-header">
            <h4><i class="fas fa-calendar-check" style="color:#2563eb"></i> Today's Daily Quests</h4>
            <span class="quest-date-tag">${new Date().toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' })}</span>
          </div>

          <div class="quest-items-list">
            ${quests.map(q => `
              <div class="quest-item ${q.completed ? 'completed' : ''}">
                <div class="quest-icon-wrap">
                  <i class="fas ${q.icon}"></i>
                </div>
                <div class="quest-details">
                  <div class="quest-title-row">
                    <span class="quest-name">${q.title}</span>
                    <span class="quest-xp-badge">+${q.xp} XP</span>
                  </div>
                  <p class="quest-desc">${q.desc}</p>
                  <div class="quest-progress-bar">
                    <div class="quest-progress-fill" style="width: ${(q.current / q.target) * 100}%;"></div>
                  </div>
                </div>
                <div class="quest-status-check">
                  ${q.completed ? '<i class="fas fa-check-circle" style="color:#10b981"></i>' : '<span>' + q.current + '/' + q.target + '</span>'}
                </div>
              </div>
            `).join('')}
          </div>
        </div>
      `;
    });
  }

  window.HLDailyQuests = {
    getQuests: getDailyQuests,
    increment: incrementQuest,
    render: renderQuestWidget
  };

  document.addEventListener('DOMContentLoaded', renderQuestWidget);
})();
