/**
 * assets/js/gamification/quest-manager.js
 * Universal Quest, XP Progression, Achievement Badges & Audio Celebration Engine
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    const STORAGE_KEY = 'hl_gamification_profile';

    const RANKS = [
        { level: 1, title: 'Novice Apprentice', minXp: 0, icon: 'fa-seedling', color: '#10b981' },
        { level: 2, title: 'Curious Scholar', minXp: 100, icon: 'fa-book-reader', color: '#06b6d4' },
        { level: 3, title: 'Diligent Inquirer', minXp: 400, icon: 'fa-compass', color: '#3b82f6' },
        { level: 4, title: 'Conceptual Thinker', minXp: 900, icon: 'fa-brain', color: '#6366f1' },
        { level: 5, title: 'Academic Voyager', minXp: 1600, icon: 'fa-rocket', color: '#8b5cf6' },
        { level: 6, title: 'Mastery Strategist', minXp: 2500, icon: 'fa-crown', color: '#ec4899' },
        { level: 7, title: 'Distinguished Scholar', minXp: 3600, icon: 'fa-award', color: '#f59e0b' },
        { level: 8, title: 'Universal Polymath', minXp: 4900, icon: 'fa-gem', color: '#10b981' },
        { level: 9, title: 'Ecosystem Luminary', minXp: 6400, icon: 'fa-star', color: '#eab308' },
        { level: 10, title: 'Grandmaster Polymath', minXp: 8100, icon: 'fa-sun', color: '#f97316' }
    ];

    const MILESTONE_BADGES = [
        {
            id: 'first-steps',
            title: 'First Steps',
            desc: 'Completed your first study session on the platform.',
            icon: 'fa-shoe-prints',
            category: 'general',
            color: '#10b981'
        },
        {
            id: 'spaced-sensation',
            title: 'Spaced Sensation',
            desc: 'Promoted 5 flashcards to Leitner Box 5 in Flashcard Studio.',
            icon: 'fa-layer-group',
            category: 'memory',
            color: '#8b5cf6'
        },
        {
            id: 'deep-reader',
            title: 'Deep Reader',
            desc: 'Added 5 margin annotations and highlighted reader text.',
            icon: 'fa-highlighter',
            category: 'reading',
            color: '#06b6d4'
        },
        {
            id: 'polymath',
            title: 'Polymath',
            desc: 'Completed activities in Math, ELA, Science, and Social Studies.',
            icon: 'fa-globe-americas',
            category: 'breadth',
            color: '#3b82f6'
        },
        {
            id: 'week-of-fire',
            title: 'Week of Fire',
            desc: 'Maintained a 7-day continuous learning streak.',
            icon: 'fa-fire',
            category: 'streak',
            color: '#f59e0b'
        },
        {
            id: 'phonics-virtuoso',
            title: 'Phonics Virtuoso',
            desc: 'Listened to 10 slow-articulation morpheme pronunciations.',
            icon: 'fa-volume-up',
            category: 'reading',
            color: '#ec4899'
        },
        {
            id: 'quiz-sharpshooter',
            title: 'Sharpshooter',
            desc: 'Scored 100% on any chapter reading or assessment quiz.',
            icon: 'fa-bullseye',
            category: 'mastery',
            color: '#ef4444'
        },
        {
            id: 'diamond-mastery',
            title: 'Diamond Mastery',
            desc: 'Reached Bloom\'s Tier 4 (Diamond) on any Skill Tree node.',
            icon: 'fa-gem',
            category: 'mastery',
            color: '#22d3ee'
        },
        {
            id: 'night-owl',
            title: 'Night Owl',
            desc: 'Completed a focused evening study session after 8 PM.',
            icon: 'fa-moon',
            category: 'habit',
            color: '#6366f1'
        },
        {
            id: 'early-bird',
            title: 'Early Bird',
            desc: 'Started learning early before 9 AM.',
            icon: 'fa-sun',
            category: 'habit',
            color: '#eab308'
        },
        {
            id: 'srs-artisan',
            title: 'SRS Artisan',
            desc: 'Created or imported 20 custom student flashcards.',
            icon: 'fa-pencil-ruler',
            category: 'memory',
            color: '#14b8a6'
        },
        {
            id: 'flowmodoro-master',
            title: 'Flow Pacer',
            desc: 'Completed 3 full Flowmodoro study intervals with ambient sound.',
            icon: 'fa-stopwatch',
            category: 'focus',
            color: '#a855f7'
        },
        {
            id: 'zen-scholar',
            title: 'Zen Scholar',
            desc: 'Used Distraction-Free Zen Mode for more than 15 minutes.',
            icon: 'fa-leaf',
            category: 'focus',
            color: '#84cc16'
        },
        {
            id: 'study-guide-author',
            title: 'Study Guide Author',
            desc: 'Exported a comprehensive chapter Markdown study guide.',
            icon: 'fa-file-export',
            category: 'reading',
            color: '#f97316'
        },
        {
            id: 'cloze-detective',
            title: 'Cloze Detective',
            desc: 'Correctly solved 10 fill-in-the-blank Cloze recall challenges.',
            icon: 'fa-search',
            category: 'memory',
            color: '#0284c7'
        },
        {
            id: 'grandmaster-legend',
            title: 'Grandmaster Legend',
            desc: 'Achieved Rank Level 10 and mastered 20 skill tree nodes.',
            icon: 'fa-trophy',
            category: 'legend',
            color: '#fbbf24'
        }
    ];

    function getLocalDateString(d = new Date()) {
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    let userProfile = {
        xp: 150,
        level: 2,
        totalStudyMinutes: 45,
        streakDays: 1,
        lastActiveDate: getLocalDateString(),
        unlockedBadges: ['first-steps'],
        completedQuests: [],
        dailyQuests: [],
        dailyQuestsDate: '',
        masteredNodes: []
    };

    function loadProfile() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) {
                userProfile = { ...userProfile, ...JSON.parse(raw) };
            }
        } catch (e) {
            console.warn('Profile load failed:', e);
        }
        ensureDailyQuests();
    }

    function saveProfile() {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(userProfile));
        } catch (e) {
            console.warn('Profile save failed:', e);
        }
    }

    function getCurrentRank() {
        const xp = userProfile.xp || 0;
        let currentRank = RANKS[0];
        for (let i = RANKS.length - 1; i >= 0; i--) {
            if (xp >= RANKS[i].minXp) {
                currentRank = RANKS[i];
                break;
            }
        }
        return currentRank;
    }

    function getNextRank() {
        const currentRank = getCurrentRank();
        const nextIdx = RANKS.findIndex(r => r.level === currentRank.level + 1);
        return nextIdx !== -1 ? RANKS[nextIdx] : null;
    }

    function ensureDailyQuests() {
        const today = getLocalDateString();
        if (userProfile.dailyQuestsDate !== today || !userProfile.dailyQuests || userProfile.dailyQuests.length === 0) {
            userProfile.dailyQuestsDate = today;
            userProfile.dailyQuests = [
                {
                    id: 'quest-srs-' + today,
                    title: 'Memory Builder',
                    desc: 'Review 10 flashcards in Leitner Flashcard Studio.',
                    category: 'flashcards',
                    xp: 60,
                    target: 10,
                    progress: 0,
                    completed: false,
                    claimed: false,
                    icon: 'fa-layer-group',
                    color: '#8b5cf6'
                },
                {
                    id: 'quest-read-' + today,
                    title: 'Active Reader',
                    desc: 'Highlight 2 key ideas or add margin notes in the Reader.',
                    category: 'reading',
                    xp: 75,
                    target: 2,
                    progress: 0,
                    completed: false,
                    claimed: false,
                    icon: 'fa-book-open',
                    color: '#06b6d4'
                },
                {
                    id: 'quest-tree-' + today,
                    title: 'Knowledge Explorer',
                    desc: 'Practice or review 1 node on the Skill Tree.',
                    category: 'skill-tree',
                    xp: 100,
                    target: 1,
                    progress: 0,
                    completed: false,
                    claimed: false,
                    icon: 'fa-sitemap',
                    color: '#10b981'
                }
            ];
            saveProfile();
        }
    }

    // Synthesized Audio Chimes (Web Audio API)
    function playChime(type = 'reward') {
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtx) return;
            const ctx = new AudioCtx();

            if (type === 'reward') {
                // Happy rising triad (C5 -> E5 -> G5)
                const freqs = [523.25, 659.25, 783.99, 1046.50];
                freqs.forEach((freq, idx) => {
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(freq, ctx.currentTime + idx * 0.09);
                    gain.gain.setValueAtTime(0.15, ctx.currentTime + idx * 0.09);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + idx * 0.09 + 0.35);
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.start(ctx.currentTime + idx * 0.09);
                    osc.stop(ctx.currentTime + idx * 0.09 + 0.35);
                });
            } else if (type === 'levelup') {
                // Majestic fanfare (G4 -> C5 -> E5 -> G5 -> C6)
                const freqs = [392.00, 523.25, 659.25, 783.99, 1046.50];
                freqs.forEach((freq, idx) => {
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(freq, ctx.currentTime + idx * 0.12);
                    gain.gain.setValueAtTime(0.25, ctx.currentTime + idx * 0.12);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + idx * 0.12 + 0.5);
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.start(ctx.currentTime + idx * 0.12);
                    osc.stop(ctx.currentTime + idx * 0.12 + 0.5);
                });
            }
        } catch (e) {}
    }

    // Lightweight Canvas Confetti Generator
    function triggerConfetti() {
        const canvas = document.createElement('canvas');
        canvas.id = 'gamification-confetti-canvas';
        canvas.style.position = 'fixed';
        canvas.style.inset = '0';
        canvas.style.width = '100vw';
        canvas.style.height = '100vh';
        canvas.style.zIndex = '999999';
        canvas.style.pointerEvents = 'none';
        document.body.appendChild(canvas);

        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const colors = ['#6366f1', '#10b981', '#f59e0b', '#ec4899', '#06b6d4', '#8b5cf6', '#eab308'];

        for (let i = 0; i < 90; i++) {
            particles.push({
                x: canvas.width / 2 + (Math.random() - 0.5) * 200,
                y: canvas.height / 2 + (Math.random() - 0.5) * 100,
                vx: (Math.random() - 0.5) * 16,
                vy: (Math.random() - 1) * 18 - 4,
                size: Math.random() * 8 + 4,
                color: colors[Math.floor(Math.random() * colors.length)],
                rotation: Math.random() * 360,
                rotSpeed: (Math.random() - 0.5) * 10,
                opacity: 1
            });
        }

        let animationFrame;
        function updateConfetti() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            let active = false;

            particles.forEach(p => {
                p.x += p.vx;
                p.y += p.vy;
                p.vy += 0.45; // gravity
                p.rotation += p.rotSpeed;
                p.opacity -= 0.012;

                if (p.opacity > 0) {
                    active = true;
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate((p.rotation * Math.PI) / 180);
                    ctx.fillStyle = p.color;
                    ctx.globalAlpha = Math.max(0, p.opacity);
                    ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size * 1.5);
                    ctx.restore();
                }
            });

            if (active) {
                animationFrame = requestAnimationFrame(updateConfetti);
            } else {
                cancelAnimationFrame(animationFrame);
                if (canvas.parentNode) canvas.parentNode.removeChild(canvas);
            }
        }

        updateConfetti();
    }

    function addXP(amount, reason = '') {
        const oldRank = getCurrentRank();
        userProfile.xp = (userProfile.xp || 0) + amount;
        const newRank = getCurrentRank();

        saveProfile();
        updateUI();

        if (newRank.level > oldRank.level) {
            playChime('levelup');
            triggerConfetti();
            showLevelUpBanner(newRank);
        } else {
            playChime('reward');
        }

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(`Earned ${amount} XP! ${reason}. Total XP: ${userProfile.xp}`);
        }
    }

    function showLevelUpBanner(rank) {
        const banner = document.createElement('div');
        banner.className = 'level-up-toast';
        banner.innerHTML = `
            <div class="level-up-icon" style="color: ${rank.color};">
                <i class="fas ${rank.icon}"></i>
            </div>
            <div>
                <h4 style="margin:0; font-size: 1.1rem; font-weight: 900;">LEVEL UP! Rank ${rank.level}</h4>
                <p style="margin:0.2rem 0 0 0; font-size: 0.85rem; color: var(--color-text-muted);">${rank.title}</p>
            </div>
        `;
        document.body.appendChild(banner);
        setTimeout(() => {
            banner.classList.add('fade-out');
            setTimeout(() => { if (banner.parentNode) banner.parentNode.removeChild(banner); }, 400);
        }, 3500);
    }

    function unlockBadge(badgeId) {
        if (!userProfile.unlockedBadges) userProfile.unlockedBadges = [];
        if (userProfile.unlockedBadges.includes(badgeId)) return;

        const badge = MILESTONE_BADGES.find(b => b.id === badgeId);
        if (!badge) return;

        userProfile.unlockedBadges.push(badgeId);
        addXP(100, `Unlocked Badge: ${badge.title}`);
        saveProfile();
        updateUI();

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(`New Achievement Badge Unlocked: ${badge.title}!`);
        }
    }

    function updateQuestProgress(category, increment = 1) {
        ensureDailyQuests();
        let changed = false;

        userProfile.dailyQuests.forEach(q => {
            if (q.category === category && !q.completed) {
                q.progress = Math.min(q.target, (q.progress || 0) + increment);
                if (q.progress >= q.target) {
                    q.completed = true;
                    playChime('reward');
                    if (typeof window.announceA11y === 'function') {
                        window.announceA11y(`Quest Completed: ${q.title}! Click Claim in Quest Hub.`);
                    }
                }
                changed = true;
            }
        });

        if (changed) {
            saveProfile();
            updateUI();
        }
    }

    function claimQuest(questId) {
        const q = userProfile.dailyQuests.find(quest => quest.id === questId);
        if (q && q.completed && !q.claimed) {
            q.claimed = true;
            addXP(q.xp, `Completed Quest: ${q.title}`);
            saveProfile();
            updateUI();
        }
    }

    function updateUI() {
        const rank = getCurrentRank();
        const nextRank = getNextRank();

        // 1. Update Header / Dashboard widgets
        const xpText = document.querySelectorAll('.user-xp-display');
        xpText.forEach(el => el.textContent = `${userProfile.xp} XP`);

        const levelText = document.querySelectorAll('.user-level-display');
        levelText.forEach(el => el.textContent = `Lvl ${rank.level} • ${rank.title}`);

        const progressBar = document.querySelectorAll('.user-xp-progress-bar');
        if (nextRank) {
            const currentLevelMin = rank.minXp;
            const nextLevelMin = nextRank.minXp;
            const progress = Math.min(100, Math.max(0, ((userProfile.xp - currentLevelMin) / (nextLevelMin - currentLevelMin)) * 100));
            progressBar.forEach(bar => bar.style.width = `${progress}%`);
        } else {
            progressBar.forEach(bar => bar.style.width = '100%');
        }

        // 2. Render Quests Tab in Modal
        const questListContainer = document.getElementById('quest-items-list');
        if (questListContainer) {
            questListContainer.innerHTML = '';
            userProfile.dailyQuests.forEach(q => {
                const percent = Math.min(100, Math.round((q.progress / q.target) * 100));
                const card = document.createElement('div');
                card.className = `quest-item-card ${q.completed ? 'is-completed' : ''}`;
                card.innerHTML = `
                    <div class="quest-item-icon" style="background: color-mix(in srgb, ${q.color} 15%, transparent); color: ${q.color};">
                        <i class="fas ${q.icon}"></i>
                    </div>
                    <div class="quest-item-content">
                        <div class="quest-item-header">
                            <h4 class="quest-item-title">${q.title}</h4>
                            <span class="quest-xp-badge">+${q.xp} XP</span>
                        </div>
                        <p class="quest-item-desc">${q.desc}</p>
                        <div class="quest-progress-track">
                            <div class="quest-progress-fill" style="width: ${percent}%; background: ${q.color};"></div>
                        </div>
                        <div class="quest-item-footer">
                            <span class="quest-progress-text">${q.progress} / ${q.target}</span>
                            ${q.completed ? (q.claimed ? '<span class="quest-claimed-label"><i class="fas fa-check"></i> Claimed</span>' : `<button type="button" class="quest-claim-btn" data-id="${q.id}"><i class="fas fa-gift"></i> Claim +${q.xp} XP</button>`) : '<span class="quest-status-ongoing">In Progress</span>'}
                        </div>
                    </div>
                `;
                questListContainer.appendChild(card);
            });

            questListContainer.querySelectorAll('.quest-claim-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    claimQuest(btn.dataset.id);
                });
            });
        }

        // 3. Render Badges Tab in Modal
        const badgeGrid = document.getElementById('badge-showcase-grid');
        if (badgeGrid) {
            badgeGrid.innerHTML = '';
            MILESTONE_BADGES.forEach(badge => {
                const isUnlocked = userProfile.unlockedBadges && userProfile.unlockedBadges.includes(badge.id);
                const badgeEl = document.createElement('div');
                badgeEl.className = `badge-showcase-card ${isUnlocked ? 'unlocked' : 'locked'}`;
                badgeEl.innerHTML = `
                    <div class="badge-icon-wrap" style="color: ${isUnlocked ? badge.color : 'var(--color-text-muted)'};">
                        <i class="fas ${badge.icon}"></i>
                    </div>
                    <h5 class="badge-title">${badge.title}</h5>
                    <p class="badge-desc">${badge.desc}</p>
                    <span class="badge-status-tag">${isUnlocked ? '<i class="fas fa-check-circle"></i> Unlocked' : '<i class="fas fa-lock"></i> Locked'}</span>
                `;
                badgeGrid.appendChild(badgeEl);
            });
        }
    }

    function initQuestStudio() {
        loadProfile();

        const modal = document.getElementById('quest-badges-modal');
        const backdrop = document.getElementById('quest-modal-backdrop-close');
        const closeBtn = document.getElementById('quest-modal-close');

        // Modal Tabs
        const tabQuests = document.getElementById('tab-quest-daily');
        const tabBadges = document.getElementById('tab-quest-badges');
        const tabMastery = document.getElementById('tab-quest-mastery');

        const paneQuests = document.getElementById('pane-quest-daily');
        const paneBadges = document.getElementById('pane-quest-badges');
        const paneMastery = document.getElementById('pane-quest-mastery');

        function switchTab(tab) {
            [tabQuests, tabBadges, tabMastery].forEach(t => t && t.classList.remove('active'));
            [paneQuests, paneBadges, paneMastery].forEach(p => p && (p.style.display = 'none'));

            if (tab === 'quests') {
                if (tabQuests) tabQuests.classList.add('active');
                if (paneQuests) paneQuests.style.display = 'block';
            } else if (tab === 'badges') {
                if (tabBadges) tabBadges.classList.add('active');
                if (paneBadges) paneBadges.style.display = 'block';
            } else if (tab === 'mastery') {
                if (tabMastery) tabMastery.classList.add('active');
                if (paneMastery) paneMastery.style.display = 'block';
            }
            updateUI();
        }

        if (tabQuests) tabQuests.addEventListener('click', () => switchTab('quests'));
        if (tabBadges) tabBadges.addEventListener('click', () => switchTab('badges'));
        if (tabMastery) tabMastery.addEventListener('click', () => switchTab('mastery'));

        window.openQuestStudio = function (tab = 'quests') {
            loadProfile();
            if (modal) {
                modal.classList.add('active');
                modal.style.display = 'flex';
            }
            switchTab(tab);
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Quest & Mastery Studio opened.');
            }
        };

        window.closeQuestStudio = function () {
            if (modal) {
                modal.classList.remove('active');
                modal.style.display = 'none';
            }
        };

        window.toggleQuestStudio = function (openOrClose = null, tab = 'quests') {
            const isOpen = modal && (modal.classList.contains('active') || modal.style.display === 'flex');
            if (openOrClose === true) {
                window.openQuestStudio(tab);
            } else if (openOrClose === false) {
                window.closeQuestStudio();
            } else {
                if (isOpen) {
                    window.closeQuestStudio();
                } else {
                    window.openQuestStudio(tab);
                }
            }
        };

        if (backdrop) backdrop.addEventListener('click', window.closeQuestStudio);
        if (closeBtn) closeBtn.addEventListener('click', window.closeQuestStudio);

        // Global shortcut Alt+Q
        window.addEventListener('keydown', (e) => {
            if (e.altKey && (e.key === 'q' || e.key === 'Q' || e.code === 'KeyQ')) {
                e.preventDefault();
                window.toggleQuestStudio();
            } else if (e.key === 'Escape' && modal && (modal.classList.contains('active') || modal.style.display === 'flex')) {
                window.closeQuestStudio();
            }
        });

        // Assessment completion auto-reward listener
        window.addEventListener('hl:assessment-complete', (e) => {
            const detail = e.detail || {};
            const scorePct = detail.scorePct ?? 0;
            const xpAward = Math.max(25, Math.round((detail.score || 1) * 15));
            addXP(xpAward, detail.title || 'Assessment Knowledge Check');
            if (scorePct >= 100) {
                unlockBadge('quiz-sharpshooter');
            }
        });

        // Time-based achievement check (Early bird / Night owl)
        const hour = new Date().getHours();
        if (hour >= 20 || hour < 2) {
            unlockBadge('night-owl');
        } else if (hour >= 5 && hour <= 8) {
            unlockBadge('early-bird');
        }

        updateUI();
    }

    // Public Gamification API
    window.HL_Gamification = {
        addXP: addXP,
        unlockBadge: unlockBadge,
        updateQuestProgress: updateQuestProgress,
        getProfile: () => userProfile,
        getRanks: () => RANKS,
        getBadges: () => MILESTONE_BADGES
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQuestStudio);
    } else {
        initQuestStudio();
    }
})();
