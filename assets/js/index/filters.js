// filters.js - Handles search and category filtering
import { currentCategory, setCurrentCategory } from './state.js';

export function setCategory(btn, cat, scrollToGrid = false) {
    setCurrentCategory(cat);

    document.querySelectorAll('.path-tab').forEach(t => {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
    });

    if (btn && btn.classList.contains('path-tab')) {
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
    }

    document.querySelectorAll('.path-card').forEach(b => {
        b.classList.remove('journey-path-active', 'ring-4', 'ring-primary/20');
    });

    if (cat !== 'all' && btn && btn.classList.contains('path-card')) {
        btn.classList.add('journey-path-active', 'ring-4', 'ring-primary/20');
    }

    applyFilters();

    if (scrollToGrid) {
        const grid = document.getElementById('main-content');
        if (grid) grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

export function applyFilters() {
    const searchInput = document.getElementById('level-search');
    const term = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const cards = document.querySelectorAll('.level-card');
    const clearBtn = document.getElementById('clear-search');
    let visibleCount = 0;

    if (clearBtn) {
        if (term) clearBtn.classList.remove('hidden');
        else clearBtn.classList.add('hidden');
    }

    cards.forEach(card => {
        const cat = card.dataset.category;
        const cardId = card.dataset.id;
        
        let matchesCat = false;
        if (currentCategory === 'all') {
            matchesCat = cat !== 'extra' || cardId === 'test-section';
        } else if (currentCategory === 'extra') {
            matchesCat = cat === 'extra' && cardId !== 'test-section';
        } else {
            matchesCat = cat === currentCategory;
        }
        
        const matchesSearch = !term ||
            (card.dataset.title && card.dataset.title.toLowerCase().includes(term)) ||
            (card.dataset.desc && card.dataset.desc.toLowerCase().includes(term)) ||
            (card.dataset.keywords && card.dataset.keywords.toLowerCase().includes(term));

        if (matchesCat && matchesSearch) {
            card.classList.remove('hidden');
            card.style.display = 'flex';
            visibleCount++;
        } else {
            card.classList.add('hidden');
            card.style.display = 'none';
        }
    });

    const grid = document.getElementById('level-grid');
    const noRes = document.getElementById('no-results');
    const countLabel = document.getElementById('results-count');
    const sectionTitle = document.getElementById('section-title');

    if (grid && noRes) {
        if (visibleCount === 0) {
            grid.classList.add('hidden');
            noRes.classList.remove('hidden');
        } else {
            grid.classList.remove('hidden');
            noRes.classList.add('hidden');
        }
    }

    const catNames = {
        'all': 'Full Journey',
        'elem': 'Elementary Path',
        'middle': 'Middle School Path',
        'high': 'High School Path',
        'extra': 'Extra Resources'
    };

    if (sectionTitle) sectionTitle.textContent = catNames[currentCategory] || 'Academic Path';
    if (countLabel) countLabel.textContent = `${visibleCount} levels available`;
}

export function resetFilters() {
    const searchInput = document.getElementById('level-search');
    if (searchInput) searchInput.value = '';
    setCategory(null, 'all');
}

export function syncSearch(val) {
    const mainSearch = document.getElementById('level-search');
    if (mainSearch) {
        mainSearch.value = val;
        applyFilters();
    }
}
