// renderer.js - Handles DOM manipulation and rendering
import { completedLevels, bookmarkedLevels } from './state.js';
import { applyFilters } from './filters.js';

export const THEME_MAP = {
    'elem': { 'icon_bg': 'theme-elem-bg', 'icon_text': 'theme-elem-text', 'label': 'Elementary' },
    'middle': { 'icon_bg': 'theme-middle-bg', 'icon_text': 'theme-middle-text', 'label': 'Middle School' },
    'high': { 'icon_bg': 'theme-high-bg', 'icon_text': 'theme-high-text', 'label': 'High School' },
    'extra': { 'icon_bg': 'theme-extra-bg', 'icon_text': 'theme-extra-text', 'label': 'Extra' }
};

export function renderLevels(data) {
    const grid = document.getElementById('level-grid');
    if (!grid) return;

    grid.innerHTML = data.map((level, index) => {
        const theme = THEME_MAP[level.category] || THEME_MAP.elem;
        const keywords = level.keywords ? level.keywords.toLowerCase() : '';
        const safeTitle = level.title.replace(/'/g, "\\'");
        const safeDesc = level.description.replace(/'/g, "\\'");

        return `
        <article class="level-card group relative flex flex-col h-full animate-reveal"
            style="animation-delay: ${index * 50}ms"
            data-category="${level.category}"
            data-display-title="${level.title}"
            data-title="${level.title.toLowerCase()}"
            data-desc="${level.description}"
            data-keywords="${keywords}"
            data-icon="${level.icon}"
            data-doc="${encodeURIComponent(level.documentation || '')}"
            data-id="${level.id}">

            <div class="level-card-inner">
                <div class="level-card-glow group-hover-glow"></div>
                
                <div class="level-card-header">
                    <div class="level-card-title-group">
                        <div class="level-card-icon ${theme.icon_bg} ${theme.icon_text}">
                            <i class="${level.icon}"></i>
                        </div>
                        <div>
                            <h3 class="level-card-title">${level.title}</h3>
                            <span class="level-card-category">${theme.label}</span>
                        </div>
                    </div>
                    <div class="level-card-actions">
                        <button type="button" class="bookmark-btn level-action-btn"
                            onclick="window.hl.toggleBookmark('${level.id}', this)" aria-label="Bookmark ${level.title}">
                            <i class="far fa-star"></i>
                        </button>
                        <button type="button" class="complete-btn level-action-btn"
                            onclick="window.hl.toggleCompletion('${level.id}', this)" aria-label="Mark ${level.title} as Complete">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

                <p class="level-card-desc">${level.description}</p>

                <div class="level-card-footer">
                    <button type="button" aria-haspopup="dialog" class="level-doc-btn"
                        onclick="window.hl.openDocModal(this)">
                        <i class="fas fa-book-open"></i> Curriculum
                    </button>
                    <div class="level-card-links">
                        <button type="button" class="level-listen-btn"
                            onclick="window.hl.speakCard(this, '${safeTitle}', '${safeDesc}')" aria-label="Listen to description">
                            <i class="fas fa-volume-up"></i>
                        </button>
                        <a href="${level.link}" aria-label="Explore ${level.title}" class="level-open-btn">
                            <span>Open</span>
                            <i class="fas fa-arrow-right icon-sm"></i>
                        </a>
                    </div>
                </div>
                <div class="completion-bar"></div>
            </div>
        </article>`;
    }).join('');

    hydrateGrid();

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-reveal');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.level-card').forEach(el => {
        revealObserver.observe(el);
    });

    applyFilters();
}

export function hydrateGrid() {
    completedLevels.forEach(id => {
        const card = document.querySelector(`.level-card[data-id="${id}"]`);
        if (card) markCardComplete(card, true);
    });

    bookmarkedLevels.forEach(id => {
        const btn = document.querySelector(`.level-card[data-id="${id}"] .bookmark-btn`);
        if (btn) markBtnBookmarked(btn, true);
    });

    checkResumeLearning();
}

export function markCardComplete(card, isComplete) {
    const bar = card.querySelector('.completion-bar');
    const btn = card.querySelector('.complete-btn');
    const contentDiv = card.querySelector('.level-card-inner');

    if (isComplete) {
        if (bar) bar.style.width = '100%';
        if (btn) {
            btn.classList.add('btn-completed');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.add('card-completed');
    } else {
        if (bar) bar.style.width = '0%';
        if (btn) {
            btn.classList.remove('btn-completed');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.remove('card-completed');
    }
}

export function markBtnBookmarked(btn, active) {
    if (active) {
        btn.classList.add('btn-bookmarked');
        btn.innerHTML = '<i class="fas fa-star text-sm"></i>'; // Solid star
    } else {
        btn.classList.remove('btn-bookmarked');
        btn.innerHTML = '<i class="far fa-star text-sm"></i>'; // Outline star
    }
}

export function triggerConfettiBtn(btn) {
    const rect = btn.getBoundingClientRect();
    const x = (rect.left + rect.width / 2) / window.innerWidth;
    const y = (rect.top + rect.height / 2) / window.innerHeight;

    if (typeof window.triggerConfetti === 'function') {
        window.triggerConfetti({ x, y });
    }
}

export function checkResumeLearning() {
    const banner = document.getElementById('resume-banner');
    if (!banner) return;

    const allCards = Array.from(document.querySelectorAll('.level-card'));
    const nextLevelCard = allCards.find(c => !completedLevels.includes(c.dataset.id));

    if (nextLevelCard && completedLevels.length > 0) {
        const levelName = nextLevelCard.querySelector('h3').textContent.trim();
        document.getElementById('next-level-name').textContent = levelName;

        const link = nextLevelCard.querySelector('a').href;
        const clickArea = document.getElementById('resume-click-area');
        if (clickArea) clickArea.onclick = () => window.location.href = link;

        banner.classList.remove('hidden');
        banner.classList.add('animate-reveal');
    } else {
        banner.classList.add('hidden');
    }
}

export function updateHeroGreeting() {
    const hour = new Date().getHours();
    const el = document.getElementById('hero-dynamic-greeting');
    if (!el) return;

    let greeting = "THE LEARNING ODYSSEY";
    if (hour < 12) greeting = "Good Morning Odyssey";
    else if (hour < 18) greeting = "Good Afternoon Journey";
    else greeting = "Good Evening Odyssey";

    el.textContent = greeting.toUpperCase();
}

export function speakCard(btn, title, desc) {
    if ('speechSynthesis' in window) {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
        }
        const utterance = new SpeechSynthesisUtterance(title + ". " + desc);
        window.speechSynthesis.speak(utterance);
    }
}
