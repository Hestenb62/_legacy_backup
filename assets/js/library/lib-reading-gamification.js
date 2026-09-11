/**
 * library/assets/lib-reading-gamification.js - Scholar Reading Goals, Streaks & XP Rewards
 * Gamified daily reading goals, persistent streaks, milestone badges, and XP sync.
 */

(function () {
    const STREAK_KEY = 'hesten_reading_streak';
    const GOAL_KEY = 'hesten_reading_goal';
    const BADGES_KEY = 'hesten_reading_badges';

    function getTodayString() {
        return new Date().toISOString().split('T')[0];
    }

    function loadStreakData() {
        try {
            return JSON.parse(localStorage.getItem(STREAK_KEY)) || { currentStreak: 1, lastReadDate: getTodayString(), totalDays: 1 };
        } catch (e) {
            return { currentStreak: 1, lastReadDate: getTodayString(), totalDays: 1 };
        }
    }

    function loadGoalData() {
        try {
            const data = JSON.parse(localStorage.getItem(GOAL_KEY)) || {};
            const today = getTodayString();
            if (data.date !== today) {
                return { date: today, targetMinutes: 15, minutesRead: 5, completed: false };
            }
            return data;
        } catch (e) {
            return { date: getTodayString(), targetMinutes: 15, minutesRead: 5, completed: false };
        }
    }

    function saveGoalData(data) {
        try {
            localStorage.setItem(GOAL_KEY, JSON.stringify(data));
        } catch (e) {}
    }

    function awardLibraryXP(amount, reason) {
        try {
            // 1. Sync with hl_gamification_profile
            const gProfile = JSON.parse(localStorage.getItem('hl_gamification_profile')) || { xp: 0, level: 1 };
            gProfile.xp = (gProfile.xp || 0) + amount;
            gProfile.level = Math.floor(gProfile.xp / 100) + 1;
            localStorage.setItem('hl_gamification_profile', JSON.stringify(gProfile));

            // 2. Sync with hesten-user-profile
            const uProfile = JSON.parse(localStorage.getItem('hesten-user-profile')) || {};
            uProfile.xp = gProfile.xp;
            uProfile.level = gProfile.level;
            localStorage.setItem('hesten-user-profile', JSON.stringify(uProfile));

            // Broadcast data-sync
            window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_gamification_profile', value: gProfile } }));
            window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: uProfile }));

            // Show Toast if available
            showLibraryToast(`+${amount} XP Earned! ${reason}`);
        } catch (e) {}
    }

    function showLibraryToast(message) {
        let toast = document.getElementById('library-gamification-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'library-gamification-toast';
            toast.className = 'library-gamification-toast hidden';
            document.body.appendChild(toast);
        }
        toast.innerHTML = `<i class="fas fa-bolt text-amber-400"></i> <span>${message}</span>`;
        toast.classList.remove('hidden');
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.classList.add('hidden'), 300);
        }, 3500);
    }

    function updateDashboardGamificationUI() {
        const streakData = loadStreakData();
        const goalData = loadGoalData();

        const streakEl = document.getElementById('dash-streak-count');
        if (streakEl) streakEl.textContent = streakData.currentStreak || 1;

        const goalProgressEl = document.getElementById('dash-goal-progress');
        const goalPercent = Math.min(100, Math.round((goalData.minutesRead / goalData.targetMinutes) * 100));
        
        if (goalProgressEl) {
            goalProgressEl.textContent = `${goalData.minutesRead}/${goalData.targetMinutes}m`;
        }

        const ringCircle = document.getElementById('dash-goal-ring-fill');
        if (ringCircle) {
            const circumference = 2 * Math.PI * 18; // r=18
            const offset = circumference - (goalPercent / 100) * circumference;
            ringCircle.style.strokeDasharray = `${circumference}`;
            ringCircle.style.strokeDashoffset = `${offset}`;
        }
    }

    window.addReadingMinutes = function (mins) {
        const goalData = loadGoalData();
        const wasCompleted = goalData.completed;
        goalData.minutesRead = (goalData.minutesRead || 0) + mins;

        if (goalData.minutesRead >= goalData.targetMinutes && !wasCompleted) {
            goalData.completed = true;
            awardLibraryXP(50, "Daily Reading Goal Reached! 🌟");
        }
        saveGoalData(goalData);
        updateDashboardGamificationUI();
    };

    window.openGoalModal = function () {
        const modal = document.getElementById('readingGoalModal');
        if (modal) {
            modal.classList.remove('hidden');
            const goalData = loadGoalData();
            const input = document.getElementById('goal-minutes-input');
            if (input) input.value = goalData.targetMinutes;
        }
    };

    window.closeGoalModal = function () {
        const modal = document.getElementById('readingGoalModal');
        if (modal) modal.classList.add('hidden');
    };

    window.saveReadingGoal = function () {
        const input = document.getElementById('goal-minutes-input');
        const val = parseInt(input ? input.value : 15, 10) || 15;
        const goalData = loadGoalData();
        goalData.targetMinutes = Math.max(5, Math.min(180, val));
        saveGoalData(goalData);
        updateDashboardGamificationUI();
        closeGoalModal();
        showLibraryToast(`Daily goal updated to ${goalData.targetMinutes} minutes!`);
    };

    document.addEventListener("DOMContentLoaded", () => {
        updateDashboardGamificationUI();
    });
})();
