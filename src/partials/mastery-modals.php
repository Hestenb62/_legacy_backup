<?php
/**
 * Mastery Popups Partial:
 * 1. Curriculum Mastery Modal (breakdown of all completed/in-progress grade levels)
 * 2. Skills Mastered Modal (breakdown of all individual standards/competencies mastered)
 * Accessible, keyboard-operable, and UDL compliant.
 */
?>

<!-- 1. CURRICULUM MASTERY MODAL -->
<div id="curriculum-mastery-modal" class="doc-modal-overlay hidden" aria-modal="true" role="dialog" aria-labelledby="curriculum-modal-title">
    <div class="doc-modal-backdrop" onclick="window.closeCurriculumMasteryModal()"></div>
    <div class="doc-modal-content mastery-modal-dialog">
        <!-- Header -->
        <div class="doc-modal-header">
            <div class="doc-modal-title-group">
                <div class="doc-modal-icon-box" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 class="doc-modal-title" id="curriculum-modal-title">Curriculum Mastery Breakdown</h3>
                    <div class="doc-modal-subtitle-group">
                        <span class="doc-modal-subtitle-line"></span>
                        <span class="doc-modal-subtitle">Track your completed grade levels and academic progress</span>
                    </div>
                </div>
            </div>
            <button type="button" onclick="window.closeCurriculumMasteryModal()" class="doc-modal-close" aria-label="Close Curriculum Mastery Portal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="doc-modal-body custom-modal-scrollbar" style="padding: 1.25rem 1.5rem;">
            <!-- Summary Panel -->
            <div class="mastery-summary-panel">
                <div class="mastery-summary-left">
                    <div class="mastery-score-circle" id="curr-modal-circle">
                        <span id="curr-modal-pct">0%</span>
                    </div>
                    <div>
                        <h4 class="mastery-summary-title" id="curr-modal-headline">Mastery Overview</h4>
                        <p class="mastery-summary-sub" id="curr-modal-count-text">0 of 0 grade levels completed</p>
                    </div>
                </div>
                <div class="mastery-filter-tabs" role="tablist" aria-label="Filter grade levels">
                    <button type="button" class="mastery-filter-tab active" onclick="window.filterCurriculumModal('all', this)">All Paths</button>
                    <button type="button" class="mastery-filter-tab" onclick="window.filterCurriculumModal('completed', this)">Completed</button>
                    <button type="button" class="mastery-filter-tab" onclick="window.filterCurriculumModal('progress', this)">In Progress</button>
                </div>
            </div>

            <!-- Search Toolbar -->
            <div class="mastery-controls-bar">
                <div class="mastery-search-wrap">
                    <i class="fas fa-search mastery-search-icon" aria-hidden="true"></i>
                    <input type="text" id="curr-modal-search" class="mastery-search-input" placeholder="Filter levels by grade or keyword..." oninput="window.renderCurriculumModalList()" aria-label="Search curriculum levels">
                </div>
            </div>

            <!-- Items List -->
            <div class="mastery-items-list" id="curr-modal-items-container" role="list">
                <!-- Dynamically injected cards -->
            </div>
        </div>

        <!-- Footer -->
        <div class="doc-modal-footer">
            <p class="doc-modal-copyright">Hesten's Learning &copy; 2026</p>
            <div class="doc-modal-actions">
                <button type="button" onclick="window.closeCurriculumMasteryModal()" class="doc-modal-close-btn">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 2. SKILLS MASTERED MODAL -->
<div id="skills-mastered-modal" class="doc-modal-overlay hidden" aria-modal="true" role="dialog" aria-labelledby="skills-modal-title">
    <div class="doc-modal-backdrop" onclick="window.closeSkillsMasteredModal()"></div>
    <div class="doc-modal-content mastery-modal-dialog">
        <!-- Header -->
        <div class="doc-modal-header">
            <div class="doc-modal-title-group">
                <div class="doc-modal-icon-box" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                    <i class="fas fa-award"></i>
                </div>
                <div>
                    <h3 class="doc-modal-title" id="skills-modal-title">Skills & Standards Mastered</h3>
                    <div class="doc-modal-subtitle-group">
                        <span class="doc-modal-subtitle-line"></span>
                        <span class="doc-modal-subtitle">Verified competency accomplishments and standard badges</span>
                    </div>
                </div>
            </div>
            <button type="button" onclick="window.closeSkillsMasteredModal()" class="doc-modal-close" aria-label="Close Skills Mastered Portal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="doc-modal-body custom-modal-scrollbar" style="padding: 1.25rem 1.5rem;">
            <!-- Summary Panel -->
            <div class="mastery-summary-panel">
                <div class="mastery-summary-left">
                    <div class="mastery-score-circle" style="border-color: #10b981; color: #10b981;">
                        <span id="skills-modal-count">0</span>
                    </div>
                    <div>
                        <h4 class="mastery-summary-title">Competency Achievements</h4>
                        <p class="mastery-summary-sub" id="skills-modal-sub">Verified standards earned across all subjects</p>
                    </div>
                </div>
                <div class="mastery-filter-tabs" role="tablist" aria-label="Filter skills by subject">
                    <button type="button" class="mastery-filter-tab active" onclick="window.filterSkillsModal('all', this)">All</button>
                    <button type="button" class="mastery-filter-tab" onclick="window.filterSkillsModal('math', this)">Math</button>
                    <button type="button" class="mastery-filter-tab" onclick="window.filterSkillsModal('ela', this)">ELA</button>
                    <button type="button" class="mastery-filter-tab" onclick="window.filterSkillsModal('other', this)">Other</button>
                </div>
            </div>

            <!-- Search Toolbar -->
            <div class="mastery-controls-bar">
                <div class="mastery-search-wrap">
                    <i class="fas fa-search mastery-search-icon" aria-hidden="true"></i>
                    <input type="text" id="skills-modal-search" class="mastery-search-input" placeholder="Search skills by code (e.g. K.CC) or keyword..." oninput="window.renderSkillsModalList()" aria-label="Search mastered skills">
                </div>
            </div>

            <!-- Items List -->
            <div class="mastery-items-list" id="skills-modal-items-container" role="list">
                <!-- Dynamically injected skills -->
            </div>
        </div>

        <!-- Footer -->
        <div class="doc-modal-footer">
            <p class="doc-modal-copyright">Hesten's Learning &copy; 2026</p>
            <div class="doc-modal-actions">
                <a href="/assessment" class="mastery-btn-action mastery-btn-open" style="padding: 0.5rem 1rem; border-radius: var(--radius-lg);">
                    <i class="fas fa-bullseye"></i> Take Assessment
                </a>
                <button type="button" onclick="window.closeSkillsMasteredModal()" class="doc-modal-close-btn">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    let currFilter = 'all';
    let skillsFilter = 'all';

    function escapeHtml(str) {
        if (str === null || str === undefined) return '';
        return String(str).replace(/[&<>"']/g, m => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[m]));
    }

    // --- CURRICULUM MASTERY MODAL LOGIC ---
    window.openCurriculumMasteryModal = function() {
        const modal = document.getElementById('curriculum-mastery-modal');
        if (!modal) return;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        window.renderCurriculumModalList();
        
        // Trap focus to close button
        const closeBtn = modal.querySelector('.doc-modal-close');
        if (closeBtn) closeBtn.focus();
    };

    window.closeCurriculumMasteryModal = function() {
        const modal = document.getElementById('curriculum-mastery-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    window.filterCurriculumModal = function(filter, btn) {
        currFilter = filter;
        document.querySelectorAll('#curriculum-mastery-modal .mastery-filter-tab').forEach(b => b.classList.remove('active'));
        if (btn) btn.classList.add('active');
        window.renderCurriculumModalList();
    };

    window.renderCurriculumModalList = function() {
        const container = document.getElementById('curr-modal-items-container');
        if (!container || typeof learningLevels === 'undefined') return;

        let completedList = [];
        try {
            completedList = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
        } catch(e) {}

        let masteryMap = {};
        try {
            masteryMap = JSON.parse(localStorage.getItem('hesten_standards_mastery') || '{}');
        } catch(e) {}

        const totalLevels = learningLevels.length;
        const completedCount = completedList.length;
        const pct = totalLevels ? Math.round((completedCount / totalLevels) * 100) : 0;

        const circleEl = document.getElementById('curr-modal-pct');
        const countText = document.getElementById('curr-modal-count-text');
        if (circleEl) circleEl.textContent = pct + '%';
        if (countText) countText.textContent = `${completedCount} of ${totalLevels} grade levels completed`;

        const query = (document.getElementById('curr-modal-search')?.value || '').toLowerCase().trim();

        const filtered = learningLevels.filter(lvl => {
            const isCompleted = completedList.includes(lvl.id);
            
            // Check in-progress standards
            const prefix = lvl.id === 'kindergarten' ? 'K.' : (lvl.id.startsWith('grade-') ? lvl.id.replace('grade-', '') + '.' : null);
            let hasStandards = false;
            if (prefix) {
                hasStandards = Object.keys(masteryMap).some(k => k.startsWith(prefix) || k.includes('.' + prefix));
            }

            if (currFilter === 'completed' && !isCompleted) return false;
            if (currFilter === 'progress' && (!hasStandards || isCompleted)) return false;

            if (query) {
                const matchTitle = lvl.title.toLowerCase().includes(query);
                const matchDesc = lvl.description.toLowerCase().includes(query);
                const matchCat = (lvl.category || '').toLowerCase().includes(query);
                return matchTitle || matchDesc || matchCat;
            }
            return true;
        });

        if (filtered.length === 0) {
            container.innerHTML = `
                <div class="mastery-empty-state">
                    <span class="mastery-empty-icon" aria-hidden="true">🧭</span>
                    <h5 class="mastery-empty-title">No grade levels found</h5>
                    <p class="mastery-empty-desc">No levels match your current filter or search query.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = filtered.map(lvl => {
            const isCompleted = completedList.includes(lvl.id);
            const prefix = lvl.id === 'kindergarten' ? 'K.' : (lvl.id.startsWith('grade-') ? lvl.id.replace('grade-', '') + '.' : null);
            let standardsMasteredCount = 0;
            if (prefix) {
                Object.entries(masteryMap).forEach(([k, v]) => {
                    if (k.startsWith(prefix) || k.includes('.' + prefix)) {
                        if (v === true || v === 'mastered' || (typeof v === 'number' && v >= 80) || (typeof v === 'object' && (v.mastered || v.score >= 80))) {
                            standardsMasteredCount++;
                        }
                    }
                });
            }

            let statusBadge = '';
            if (isCompleted) {
                statusBadge = '<span class="badge-status badge-status-completed"><i class="fas fa-check-circle"></i> Completed</span>';
            } else if (standardsMasteredCount > 0) {
                statusBadge = `<span class="badge-status badge-status-progress"><i class="fas fa-spinner"></i> In Progress (${standardsMasteredCount} skills)</span>`;
            } else {
                statusBadge = '<span class="badge-status badge-status-available">Available</span>';
            }

            return `
                <div class="mastery-item-card" role="listitem">
                    <div class="mastery-item-info">
                        <div class="mastery-item-icon-box" style="background: rgba(99, 102, 241, 0.1); color: var(--color-primary);">
                            <i class="${lvl.icon}"></i>
                        </div>
                        <div class="mastery-item-text">
                            <div class="mastery-item-title-row">
                                <h5 class="mastery-item-title">${lvl.title}</h5>
                                ${statusBadge}
                            </div>
                            <p class="mastery-item-desc">${lvl.description}</p>
                        </div>
                    </div>
                    <div class="mastery-item-actions">
                        <button type="button" class="mastery-btn-action mastery-btn-toggle" onclick="window.toggleLevelCompleteFromModal('${lvl.id}')">
                            <i class="${isCompleted ? 'fas fa-undo' : 'fas fa-check'}"></i>
                            <span>${isCompleted ? 'Unmark' : 'Complete'}</span>
                        </button>
                        <a href="${lvl.link}" class="mastery-btn-action mastery-btn-open">
                            <span>Open</span> <i class="fas fa-arrow-right icon-sm"></i>
                        </a>
                    </div>
                </div>
            `;
        }).join('');
    };

    window.toggleLevelCompleteFromModal = function(id) {
        if (typeof toggleCompletion === 'function') {
            const cardBtn = document.querySelector(`.level-card[data-id="${id}"] .complete-btn`);
            toggleCompletion(id, cardBtn);
        } else {
            let completed = [];
            try { completed = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]'); } catch(e) {}
            if (completed.includes(id)) {
                completed = completed.filter(x => x !== id);
            } else {
                completed.push(id);
            }
            localStorage.setItem('hl_completed_levels', JSON.stringify(completed));
            if (typeof updateStats === 'function') updateStats();
        }
        window.renderCurriculumModalList();
    };

    // --- SKILLS MASTERED MODAL LOGIC ---
    window.openSkillsMasteredModal = function() {
        const modal = document.getElementById('skills-mastered-modal');
        if (!modal) return;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        window.renderSkillsModalList();

        const closeBtn = modal.querySelector('.doc-modal-close');
        if (closeBtn) closeBtn.focus();
    };

    window.closeSkillsMasteredModal = function() {
        const modal = document.getElementById('skills-mastered-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    window.filterSkillsModal = function(filter, btn) {
        skillsFilter = filter;
        document.querySelectorAll('#skills-mastered-modal .mastery-filter-tab').forEach(b => b.classList.remove('active'));
        if (btn) btn.classList.add('active');
        window.renderSkillsModalList();
    };

    window.renderSkillsModalList = function() {
        const container = document.getElementById('skills-modal-items-container');
        if (!container) return;

        let masteryMap = {};
        try {
            masteryMap = JSON.parse(localStorage.getItem('hesten_standards_mastery') || '{}');
        } catch(e) {}

        const masteredEntries = Object.entries(masteryMap).filter(([k, v]) => {
            return v === true || v === 'mastered' || (typeof v === 'number' && v >= 80) || (typeof v === 'object' && (v.mastered || v.score >= 80));
        });

        const countEl = document.getElementById('skills-modal-count');
        const subEl = document.getElementById('skills-modal-sub');
        if (countEl) countEl.textContent = masteredEntries.length;
        if (subEl) subEl.textContent = `${masteredEntries.length} verified competency standards earned across all subjects`;

        const query = (document.getElementById('skills-modal-search')?.value || '').toLowerCase().trim();

        const filtered = masteredEntries.filter(([code, val]) => {
            const isMath = code.includes('MATH') || code.match(/^[0-9K]\.[A-Z]/);
            const isEla = code.includes('ELA') || code.includes('RL') || code.includes('RI') || code.includes('RF');
            
            if (skillsFilter === 'math' && !isMath) return false;
            if (skillsFilter === 'ela' && !isEla) return false;
            if (skillsFilter === 'other' && (isMath || isEla)) return false;

            if (query) {
                return code.toLowerCase().includes(query);
            }
            return true;
        });

        if (masteredEntries.length === 0) {
            container.innerHTML = `
                <div class="mastery-empty-state">
                    <span class="mastery-empty-icon" aria-hidden="true">🏆</span>
                    <h5 class="mastery-empty-title">No skills mastered yet</h5>
                    <p class="mastery-empty-desc">
                        Complete level exercises or take a quick Diagnostic Assessment to test your knowledge and start earning verified skill badges!
                    </p>
                    <a href="/assessment" class="mastery-empty-cta">
                        <i class="fas fa-play"></i> Start Assessment
                    </a>
                </div>
            `;
            return;
        }

        if (filtered.length === 0) {
            container.innerHTML = `
                <div class="mastery-empty-state">
                    <span class="mastery-empty-icon" aria-hidden="true">🔍</span>
                    <h5 class="mastery-empty-title">No matching skills found</h5>
                    <p class="mastery-empty-desc">Try clearing your search term or selecting a different subject filter.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = filtered.map(([code, val]) => {
            const isMath = code.includes('MATH') || code.match(/^[0-9K]\.[A-Z]/);
            const isEla = code.includes('ELA') || code.includes('RL') || code.includes('RI') || code.includes('RF');
            const subjectLabel = isMath ? 'Math' : (isEla ? 'ELA' : 'General');
            const iconClass = isMath ? 'fas fa-calculator' : (isEla ? 'fas fa-book-open' : 'fas fa-award');

            let scoreText = 'Mastered';
            if (typeof val === 'number') scoreText = `${val}% Score`;
            else if (typeof val === 'object' && val.score) scoreText = `${val.score}% Score`;

            return `
                <div class="mastery-item-card" role="listitem">
                    <div class="mastery-item-info">
                        <div class="mastery-item-icon-box" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                            <i class="${iconClass}"></i>
                        </div>
                        <div class="mastery-item-text">
                            <div class="mastery-item-title-row">
                                <span class="badge-standard-code">${escapeHtml(code)}</span>
                                <span class="badge-status badge-status-mastered"><i class="fas fa-check-double"></i> ${scoreText}</span>
                            </div>
                            <p class="mastery-item-desc">${subjectLabel} Competency Standard</p>
                        </div>
                    </div>
                    <div class="mastery-item-actions">
                        <a href="/pages/standards.php?q=${encodeURIComponent(code)}" class="mastery-btn-action mastery-btn-open">
                            <span>Explore Standard</span> <i class="fas fa-arrow-right icon-sm"></i>
                        </a>
                    </div>
                </div>
            `;
        }).join('');
    };

    // Close modals on Escape key
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            window.closeCurriculumMasteryModal();
            window.closeSkillsMasteredModal();
        }
    });
})();
</script>
