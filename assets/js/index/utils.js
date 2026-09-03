// utils.js - Shared utility functions

export function debounce(func, wait) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

export function checkStreak() {
    const lastVisit = localStorage.getItem('hl_last_visit');
    const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');
    const today = new Date().toDateString();
    const el = document.getElementById('streak-stat');

    if (!el) return;

    if (lastVisit === today) {
        el.textContent = streakCount;
    } else if (lastVisit) {
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);
        if (lastVisit === yesterday.toDateString()) {
            const newStreak = streakCount + 1;
            localStorage.setItem('hl_streak', newStreak);
            el.textContent = newStreak;
            localStorage.setItem('hl_last_visit', today);
        } else {
            localStorage.setItem('hl_streak', 1);
            el.textContent = 1;
            localStorage.setItem('hl_last_visit', today);
        }
    } else {
        localStorage.setItem('hl_streak', 1);
        el.textContent = 1;
        localStorage.setItem('hl_last_visit', today);
    }
}
