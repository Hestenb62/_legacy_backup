// main.js - Entry point for the index page
import { loadState, setCurrentCategory } from './state.js';
import { renderLevels, updateHeroGreeting, speakCard } from './renderer.js';
import { applyFilters, resetFilters, setCategory, syncSearch } from './filters.js';
import { checkStreak, debounce } from './utils.js';
import { toggleCompletion, toggleBookmark } from './actions.js';
import { openDocModal, closeDocModal, printCurriculum, switchModalTab } from './modal.js';
import { renderFocusRecommendations, clearFocusRecommendations } from './diagnostics.js';

// Expose functions to global scope for inline HTML onclick handlers
window.hl = {
    toggleCompletion,
    toggleBookmark,
    openDocModal,
    closeDocModal,
    printCurriculum,
    switchModalTab,
    speakCard,
    clearFocusRecommendations,
    setCategory,
    resetFilters
};

// --- INIT ---
console.log("Learning Odyssey initialized via Vite ES Modules!");

loadState();

// ES Modules run deferred, so the DOM is ready and window.learningLevels is populated
if (typeof window.learningLevels !== 'undefined') {
    renderLevels(window.learningLevels);
    applyFilters(); 
}

checkStreak();
updateHeroGreeting();
renderFocusRecommendations(); 

// Search & Filter Listeners
const searchInput = document.getElementById('level-search');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const heroSearch = document.getElementById('hero-search');
        if (heroSearch) heroSearch.value = e.target.value;
        debounce(applyFilters, 200)();
    });
}
