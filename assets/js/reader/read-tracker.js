/* ==========================================================================
   Reader Reading Tracker & Streak Engine
   Tracks active reading sessions, increments daily literary minutes,
   computes consecutive daily streaks, and syncs across the platform.
   ========================================================================== */
(function () {
    const STORAGE_KEY = 'hesten_reading_tracker';
    const ACTIVE_TIMEOUT_MS = 60000; // 60s idle threshold
    const TICK_INTERVAL_MS = 10000;  // Check every 10s

    let lastActivityTime = Date.now();
    let accumulatedActiveMs = 0;

    function getTodayKey() {
        const d = new Date();
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function getYesterdayKey() {
        const d = new Date();
        d.setDate(d.getDate() - 1);
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function loadTrackerData() {
        const today = getTodayKey();
        let data = {
            totalMinutes: 0,
            todayMinutes: 0,
            currentStreakDays: 1,
            lastActiveDate: today,
            history: {},
            booksRead: []
        };

        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) {
                const parsed = JSON.parse(raw);
                data = { ...data, ...parsed };
            }
        } catch (e) {
            console.warn("Could not read reading tracker data:", e);
        }

        // Check if date rolled over
        if (data.lastActiveDate !== today) {
            const yesterday = getYesterdayKey();
            if (data.lastActiveDate === yesterday) {
                // Maintained streak!
                data.currentStreakDays = (data.currentStreakDays || 0) + 1;
            } else if (data.lastActiveDate && data.lastActiveDate < yesterday) {
                // Streak broken
                data.currentStreakDays = 1;
            }
            data.lastActiveDate = today;
            data.todayMinutes = 0; // Reset for new day
        }

        return data;
    }

    function saveTrackerData(data) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
            window.dispatchEvent(new CustomEvent('reading-tracker-updated', { detail: data }));
        } catch (e) {
            console.warn("Could not save reading tracker data:", e);
        }
    }

    function recordActivity() {
        lastActivityTime = Date.now();
    }

    function onMinuteRead() {
        const data = loadTrackerData();
        const today = getTodayKey();

        data.totalMinutes = (data.totalMinutes || 0) + 1;
        data.todayMinutes = (data.todayMinutes || 0) + 1;
        data.history[today] = (data.history[today] || 0) + 1;

        // Record current book ID
        const bookId = (window.BOOK_METADATA && window.BOOK_METADATA.id) ? window.BOOK_METADATA.id : null;
        if (bookId && !data.booksRead.includes(bookId)) {
            data.booksRead.push(bookId);
        }

        saveTrackerData(data);
        updateTimerDisplay(data);
    }

    function updateTimerDisplay(data) {
        const pill = document.getElementById('reader-session-timer-pill');
        const textSpan = document.getElementById('reading-session-time');
        const streakSpan = document.getElementById('reading-streak-badge');

        const mins = data.todayMinutes || 0;
        const streak = data.currentStreakDays || 1;

        if (textSpan) {
            textSpan.textContent = `${mins}m today`;
        }
        if (streakSpan) {
            streakSpan.innerHTML = `<i class="fas fa-fire" style="color: #f97316;"></i> ${streak}d`;
        }
        if (pill) {
            pill.title = `Today's Active Reading: ${mins} minutes · Streak: ${streak} days`;
        }
    }

    function trackerHeartbeat() {
        const now = Date.now();
        const isUserActive = (now - lastActivityTime) < ACTIVE_TIMEOUT_MS;
        const isDocumentVisible = !document.hidden;

        if (isUserActive && isDocumentVisible) {
            accumulatedActiveMs += TICK_INTERVAL_MS;
            if (accumulatedActiveMs >= 60000) {
                accumulatedActiveMs -= 60000;
                onMinuteRead();
            }
        }
    }

    function initTracker() {
        // Track presence
        ['scroll', 'mousemove', 'keydown', 'touchstart', 'click'].forEach(evt => {
            window.addEventListener(evt, recordActivity, { passive: true });
        });

        // Initialize display
        const data = loadTrackerData();
        saveTrackerData(data);
        updateTimerDisplay(data);

        // Heartbeat
        setInterval(trackerHeartbeat, TICK_INTERVAL_MS);
    }

    // Expose global helper
    window.getHestenReadingTracker = loadTrackerData;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTracker);
    } else {
        initTracker();
    }
})();
