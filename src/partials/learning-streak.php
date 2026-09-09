<link rel="stylesheet" href="<?= assetVersion('/assets/css/components/learning-streak.css') ?>">
<!-- Student Daily Learning Streak & Goal Widget -->
<div class="learning-streak-wrapper" id="learning-streak-widget">
    <div class="learning-streak-card">
        <div class="streak-header">
            <div class="streak-badge">
                <span class="streak-flame" aria-hidden="true">🔥</span>
                <div class="streak-count-box">
                    <span class="streak-number" id="home-streak-count">1</span>
                    <span class="streak-label">Day Streak</span>
                </div>
            </div>

            <div class="streak-message-box">
                <h3 class="streak-title" id="home-streak-title">Keep up the momentum!</h3>
                <p class="streak-subtitle" id="home-streak-sub">Practice daily to unlock mastery badges and keep your streak alive.</p>
            </div>

            <div class="streak-goal-box">
                <div class="goal-info-row">
                    <span class="goal-label"><i class="fas fa-clock" aria-hidden="true"></i> Daily Goal</span>
                    <span class="goal-progress-text" id="home-goal-text">0 / 20 mins</span>
                </div>
                <div class="goal-progress-track" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="home-goal-track">
                    <div class="goal-progress-bar" id="home-goal-bar" style="width: 0%;"></div>
                </div>
            </div>

            <div class="streak-action-box">
                <button type="button" class="streak-action-btn" onclick="window.toggleStudyTimer ? window.toggleStudyTimer() : null" title="Start a focused study session (Alt+T)">
                    <i class="fas fa-play" aria-hidden="true"></i>
                    <span>Focus Timer</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    function updateHomeStreakWidget() {
        const STREAK_KEY = 'hesten_learning_streak';
        const TODAY_MINS_KEY = 'hesten_today_study_minutes';
        const todayStr = new Date().toISOString().slice(0, 10);

        let streakData = { streak: 1, lastDate: todayStr, history: [todayStr] };
        try {
            const raw = localStorage.getItem(STREAK_KEY);
            if (raw) streakData = JSON.parse(raw);
        } catch(e){}

        if (streakData.lastDate !== todayStr) {
            const lastDateObj = new Date(streakData.lastDate);
            const todayObj = new Date(todayStr);
            const diffDays = Math.round((todayObj - lastDateObj) / (1000 * 60 * 60 * 24));

            if (diffDays === 1) {
                streakData.streak += 1;
                streakData.lastDate = todayStr;
                if (!streakData.history.includes(todayStr)) streakData.history.push(todayStr);
            } else if (diffDays > 1) {
                streakData.streak = 1;
                streakData.lastDate = todayStr;
                streakData.history = [todayStr];
            }
            try { localStorage.setItem(STREAK_KEY, JSON.stringify(streakData)); } catch(e){}
        }

        let todayMinutes = 0;
        try {
            const storedMins = JSON.parse(localStorage.getItem(TODAY_MINS_KEY));
            if (storedMins && storedMins.date === todayStr) {
                todayMinutes = storedMins.minutes || 0;
            } else {
                localStorage.setItem(TODAY_MINS_KEY, JSON.stringify({ date: todayStr, minutes: 0 }));
            }
        } catch(e){}

        const dailyGoalMins = 20;
        const progressPct = Math.min(100, Math.round((todayMinutes / dailyGoalMins) * 100));

        const countEl = document.getElementById('home-streak-count');
        const titleEl = document.getElementById('home-streak-title');
        const subEl = document.getElementById('home-streak-sub');
        const textEl = document.getElementById('home-goal-text');
        const barEl = document.getElementById('home-goal-bar');
        const trackEl = document.getElementById('home-goal-track');

        if (countEl) countEl.textContent = streakData.streak;
        if (textEl) textEl.textContent = todayMinutes + ' / ' + dailyGoalMins + 'm (' + progressPct + '%)';
        if (barEl) barEl.style.width = progressPct + '%';
        if (trackEl) trackEl.setAttribute('aria-valuenow', progressPct);

        if (progressPct >= 100) {
            if (titleEl) titleEl.textContent = '🎉 Daily Goal Complete!';
            if (subEl) subEl.textContent = 'Incredible job! You achieved your ' + dailyGoalMins + '-minute learning target today.';
        } else if (streakData.streak > 3) {
            if (titleEl) titleEl.textContent = '🔥 On Fire! ' + streakData.streak + '-Day Streak!';
            if (subEl) subEl.textContent = 'Keep your daily rhythm going to build lifelong mastery.';
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', updateHomeStreakWidget);
    } else {
        updateHomeStreakWidget();
    }
})();
</script>
