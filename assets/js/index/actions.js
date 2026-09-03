// actions.js - Handles UI click actions for levels
import { completedLevels, bookmarkedLevels, addCompletedLevel, removeCompletedLevel, addBookmarkedLevel, removeBookmarkedLevel, saveState, updateStats } from './state.js';
import { markCardComplete, markBtnBookmarked, checkResumeLearning, triggerConfettiBtn } from './renderer.js';

export function toggleCompletion(id, btn) {
    const card = btn.closest('.level-card');
    const index = completedLevels.indexOf(id);
    const isComplete = index === -1;

    if (isComplete) {
        addCompletedLevel(id);
        triggerConfettiBtn(btn);
        markCardComplete(card, true);
    } else {
        removeCompletedLevel(id);
        markCardComplete(card, false);
    }

    saveState();
    updateStats();
    checkResumeLearning();
}

export function toggleBookmark(id, btn) {
    const index = bookmarkedLevels.indexOf(id);
    const isBookmarked = index === -1;

    if (isBookmarked) {
        addBookmarkedLevel(id);
        markBtnBookmarked(btn, true);
    } else {
        removeBookmarkedLevel(id);
        markBtnBookmarked(btn, false);
    }
    saveState();
}
