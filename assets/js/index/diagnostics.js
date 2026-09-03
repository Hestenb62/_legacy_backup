// diagnostics.js - Handles focus recommendations
export function renderFocusRecommendations() {
    const STORAGE_KEY = "hl_missed_standards";
    let missed = [];
    try {
        missed = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
    } catch (e) {}

    if (missed.length === 0) return;

    const mainContent = document.getElementById('main-content');
    if (!mainContent) return;

    const container = document.createElement('section');
    container.id = 'a11y-focus-recommendations';
    container.className = 'focus-rec-section animate-reveal';
    
    container.innerHTML = `
        <div class="focus-rec-glow-1"></div>
        <div class="focus-rec-glow-2"></div>
        
        <header class="focus-rec-header">
            <div>
                <h3 class="focus-rec-title">
                    <span class="focus-rec-icon-box">
                        <i class="fas fa-bullseye"></i>
                    </span>
                    Recommended Focus Areas
                </h3>
                <p class="focus-rec-subtitle">Based on your latest assessments, practicing these levels will help you grow!</p>
            </div>
            <button onclick="window.hl.clearFocusRecommendations()" class="focus-rec-clear-btn">
                <i class="fas fa-trash-alt icon-sm"></i> Clear Recommendations
            </button>
        </header>
        
        <div class="focus-rec-grid" id="recommendations-grid"></div>
    `;

    const resumeBanner = document.getElementById('resume-banner');
    if (resumeBanner) {
        resumeBanner.parentNode.insertBefore(container, resumeBanner.nextSibling);
    } else {
        mainContent.insertBefore(container, mainContent.firstChild);
    }

    const grid = document.getElementById('recommendations-grid');
    if (!grid) return;

    let cardsHtml = '';
    missed.forEach(item => {
        // Assume learningLevels is available globally for now
        const levelData = typeof window.learningLevels !== 'undefined' ? window.learningLevels.find(l => l.id === item.id) : null;
        if (!levelData) return;

        const link = levelData.link || '#';
        const title = levelData.title || item.gradeName;
        const icon = levelData.icon || 'fas fa-star';
        const subjectTag = item.subject.toLowerCase() === 'language arts' ? 'ela' : item.subject.toLowerCase();
        
        cardsHtml += `
            <div class="focus-card stats-card">
                <div class="focus-card-header">
                    <div class="focus-card-icon">
                        <i class="${icon}"></i>
                    </div>
                    <div>
                        <h4 class="focus-card-title">${title}</h4>
                        <span class="focus-card-tag">${item.subject} Focus</span>
                    </div>
                </div>
                
                <p class="focus-card-desc">
                    Review and practice your ${item.subject} skills to boost your mastery level and build confidence.
                </p>
                
                <div class="focus-card-footer">
                    <span class="focus-card-warning">
                        <i class="fas fa-exclamation-triangle warning-icon"></i> Needs Practice
                    </span>
                    <a href="${link}?tab=${subjectTag}" class="focus-card-btn">
                        <span>Practice</span>
                        <i class="fas fa-arrow-right icon-sm"></i>
                    </a>
                </div>
            </div>
        `;
    });

    grid.innerHTML = cardsHtml;
}

export function clearFocusRecommendations() {
    if (confirm("Are you sure you want to clear your current personalized recommendations?")) {
        localStorage.removeItem("hl_missed_standards");
        const panel = document.getElementById('a11y-focus-recommendations');
        if (panel) {
            panel.style.transition = 'all 0.3s ease-out';
            panel.style.opacity = '0';
            panel.style.transform = 'translateY(15px) scale(0.98)';
            setTimeout(() => panel.remove(), 300);
        }
    }
}
