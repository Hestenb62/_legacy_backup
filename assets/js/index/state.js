// state.js - Manages page state
export let completedLevels = [];
export let bookmarkedLevels = [];
export let currentCategory = 'all';

export function loadState() {
    try {
        completedLevels = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
        bookmarkedLevels = JSON.parse(localStorage.getItem('hl_bookmarked_levels') || '[]');
    } catch (e) { console.error(e); }
}

export function saveState() {
    localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
    localStorage.setItem('hl_bookmarked_levels', JSON.stringify(bookmarkedLevels));
}

export function updateStats() {
    // learningLevels is a global variable from the global-learningLevels.js script
    const total = typeof learningLevels !== 'undefined' ? learningLevels.length : 0;
    const count = completedLevels.length;
    const pct = total ? Math.round((count / total) * 100) : 0;
    const el = document.getElementById('user-progress-stat');
    if (el) el.textContent = pct + '%';
}

export function setCurrentCategory(cat) {
    currentCategory = cat;
}

export function addCompletedLevel(id) {
    if (!completedLevels.includes(id)) completedLevels.push(id);
}

export function removeCompletedLevel(id) {
    const index = completedLevels.indexOf(id);
    if (index > -1) completedLevels.splice(index, 1);
}

export function addBookmarkedLevel(id) {
    if (!bookmarkedLevels.includes(id)) bookmarkedLevels.push(id);
}

export function removeBookmarkedLevel(id) {
    const index = bookmarkedLevels.indexOf(id);
    if (index > -1) bookmarkedLevels.splice(index, 1);
}
