<!-- src/partials/quest-badges-modal.php -->
<div id="quest-badges-modal" class="quest-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="quest-modal-title" style="display: none;">
    <!-- Backdrop -->
    <div class="quest-backdrop" id="quest-modal-backdrop-close" tabindex="-1" aria-hidden="true"></div>

    <!-- Modal Dialog -->
    <div class="quest-dialog-box" role="document">
        <!-- Header -->
        <div class="quest-header">
            <div class="quest-title-group">
                <div class="quest-icon-box">
                    <i class="fas fa-trophy" aria-hidden="true"></i>
                </div>
                <div>
                    <h3 class="quest-title" id="quest-modal-title">Mastery Quests &amp; Achievements</h3>
                    <p class="quest-subtitle">Level Progression &bull; Bloom's Taxonomy &bull; Daily Challenges</p>
                </div>
            </div>
            <div class="quest-header-actions">
                <a href="/student/skill-tree.php" class="quest-chip-btn" style="text-decoration: none;">
                    <i class="fas fa-sitemap" aria-hidden="true"></i> <span>Open Skill Tree</span>
                </a>
                <button id="quest-modal-close" class="quest-close-btn" aria-label="Close Quests &amp; Achievements (Esc)">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="quest-tabs-bar" role="tablist" aria-label="Gamification View Tabs">
            <button type="button" class="quest-tab-btn active" id="tab-quest-daily" role="tab" aria-selected="true">
                <i class="fas fa-calendar-check" aria-hidden="true"></i> <span>Daily Quests</span>
            </button>
            <button type="button" class="quest-tab-btn" id="tab-quest-badges" role="tab" aria-selected="false">
                <i class="fas fa-medal" aria-hidden="true"></i> <span>Badge Showcase</span>
            </button>
            <button type="button" class="quest-tab-btn" id="tab-quest-mastery" role="tab" aria-selected="false">
                <i class="fas fa-chart-line" aria-hidden="true"></i> <span>Rank &amp; Level</span>
            </button>
        </div>

        <!-- Body -->
        <div class="quest-body-content">
            <!-- Tab 1: Daily Quests -->
            <div id="pane-quest-daily" class="quest-tab-pane active">
                <div class="quest-xp-summary-card">
                    <div class="xp-summary-left">
                        <span class="user-level-display" style="font-weight: 800; font-size: 1.1rem; color: var(--color-primary);">Lvl 2 &bull; Curious Scholar</span>
                        <div class="xp-progress-track-wide">
                            <div class="user-xp-progress-bar xp-progress-fill-wide" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="xp-summary-right">
                        <span class="user-xp-display xp-total-number">150 XP</span>
                    </div>
                </div>

                <h4 class="quest-section-title"><i class="fas fa-bolt" style="color: #f59e0b;"></i> Today's Active Quests</h4>
                <div class="quest-items-list" id="quest-items-list">
                    <!-- Populated dynamically by quest-manager.js -->
                </div>
            </div>

            <!-- Tab 2: Badge Showcase -->
            <div id="pane-quest-badges" class="quest-tab-pane" style="display: none;">
                <p class="quest-pane-intro">Unlock milestone achievement badges by practicing across subjects, maintaining study streaks, and mastering skills.</p>
                <div class="badge-showcase-grid" id="badge-showcase-grid">
                    <!-- Populated dynamically by quest-manager.js -->
                </div>
            </div>

            <!-- Tab 3: Rank & Level Mastery -->
            <div id="pane-quest-mastery" class="quest-tab-pane" style="display: none;">
                <div class="mastery-rank-overview">
                    <div class="rank-badge-large">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="user-level-display" style="font-size: 1.5rem; font-weight: 900; margin: 0.5rem 0 0.25rem 0;">Curious Scholar</h3>
                    <p style="color: var(--color-text-muted); font-size: 0.9rem; margin: 0;">Total XP Earned: <strong class="user-xp-display" style="color: var(--color-primary);">150 XP</strong></p>
                </div>

                <h4 class="quest-section-title" style="margin-top: 1.5rem;"><i class="fas fa-layer-group" style="color: #6366f1;"></i> Scholar Rank Tiers</h4>
                <div class="rank-tiers-list">
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">Lvl 1</span>
                        <span class="rank-tier-name">Novice Apprentice</span>
                        <span class="rank-tier-xp">0 XP</span>
                    </div>
                    <div class="rank-tier-row active">
                        <span class="rank-pill-badge" style="background: rgba(6, 182, 212, 0.15); color: #06b6d4;">Lvl 2</span>
                        <span class="rank-tier-name">Curious Scholar (Current)</span>
                        <span class="rank-tier-xp">100 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">Lvl 3</span>
                        <span class="rank-tier-name">Diligent Inquirer</span>
                        <span class="rank-tier-xp">400 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(99, 102, 241, 0.15); color: #6366f1;">Lvl 4</span>
                        <span class="rank-tier-name">Conceptual Thinker</span>
                        <span class="rank-tier-xp">900 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(139, 92, 246, 0.15); color: #8b5cf6;">Lvl 5</span>
                        <span class="rank-tier-name">Academic Voyager</span>
                        <span class="rank-tier-xp">1,600 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(236, 72, 153, 0.15); color: #ec4899;">Lvl 6</span>
                        <span class="rank-tier-name">Mastery Strategist</span>
                        <span class="rank-tier-xp">2,500 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b;">Lvl 7</span>
                        <span class="rank-tier-name">Distinguished Scholar</span>
                        <span class="rank-tier-xp">3,600 XP</span>
                    </div>
                    <div class="rank-tier-row">
                        <span class="rank-pill-badge" style="background: rgba(249, 115, 22, 0.15); color: #f97316;">Lvl 10</span>
                        <span class="rank-tier-name">Grandmaster Polymath</span>
                        <span class="rank-tier-xp">8,100 XP</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="quest-footer">
            <span style="font-size: 0.8rem; color: var(--color-text-muted);">
                <i class="fas fa-info-circle"></i> Complete quests daily to earn XP and level up your scholar rank!
            </span>
            <a href="/student/skill-tree.php" class="quest-action-btn primary" style="text-decoration: none;">
                <i class="fas fa-sitemap"></i> <span>View Visual Skill Tree</span>
            </a>
        </div>
    </div>
</div>
