<?php
$pageTitle = "Hesten's Learning - Games Hub";
include '../src/header.php';
?>
<link rel="stylesheet" href="/assets/css/pages/games.css">

<main id="main-content" class="games-main">

    <!-- Hero Section -->
    <div class="page-hero">
        <!-- Abstract Background Shapes -->
        <div class="page-hero-bg games-bg-anim">
            <i class="fas fa-gamepad games-icon-1"></i>
            <i class="fas fa-puzzle-piece games-icon-2"></i>
        </div>

        <div class="page-hero-content">
            <h1 class="page-hero-title">
                Accessible Game Zone
            </h1>
            <p class="page-hero-subtitle" style="margin-bottom: 2rem;">
                Play, learn, and grow with games designed for everyone. Keyboard friendly, screen reader optimized, and stress-free.
            </p>

            <div class="games-a11y-badge">
                <p class="games-a11y-title"><i class="fas fa-universal-access"></i> Accessibility Features:</p>
                <ul class="games-a11y-list">
                    <li><i class="fas fa-check list-icon"></i>Full Keyboard Support</li>
                    <li><i class="fas fa-check list-icon"></i>Screen Reader Announcements</li>
                    <li><i class="fas fa-check list-icon"></i>No Timers / Stress Free</li>
                    <li><i class="fas fa-check list-icon"></i>High Contrast Ready</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Game Selector -->
    <section class="games-selector-container">
        <!-- Gamification & Records Banner -->
        <div class="games-stats-banner" id="games-stats-banner">
            <div class="banner-top-row">
                <div class="banner-title-group">
                    <div class="banner-icon-badge">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <h2 class="banner-title">Gamer Achievements & High Scores</h2>
                        <p class="banner-subtitle">Track your personal records, earn XP, and level up your student profile!</p>
                    </div>
                </div>
                <div id="daily-game-quest-pill" class="quest-pill">
                    <i class="fas fa-tasks"></i> <span id="quest-status-text">Daily Game Challenge: 0/2 Complete (+50 XP)</span>
                </div>
            </div>

            <div class="banner-stats-grid">
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-star" style="color: #f59e0b;"></i> Student Level</span>
                    <span class="chip-value highlight-amber" id="stat-level">Lv. 1</span>
                </div>
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-bolt" style="color: #6366f1;"></i> Total Game XP</span>
                    <span class="chip-value highlight-indigo" id="stat-total-xp">0 XP</span>
                </div>
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-brain" style="color: #10b981;"></i> Memory Best (Med)</span>
                    <span class="chip-value highlight-emerald" id="stat-memory-best">--:--</span>
                </div>
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-calculator" style="color: #ea580c;"></i> Math Max Streak</span>
                    <span class="chip-value" style="color: #ea580c;" id="stat-math-streak">0 🔥</span>
                </div>
            </div>
        </div>

        <h2 class="games-section-title">Select a Game</h2>

        <div class="games-grid">
            <!-- Game Card 1 -->
            <button onclick="loadGame('memory')" class="games-card card-memory">
                <div class="games-card-bg-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag tag-green">Cognitive Skills</span>
                    <h3 class="games-card-title">Memory Match</h3>
                    <p class="games-card-desc">Find the matching pairs! A classic memory game optimized for keyboard navigation and audio feedback.</p>
                    <span class="games-play-link">
                        Play Now <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </button>

            <!-- Game Card 2 -->
            <button onclick="loadGame('math')" class="games-card card-math">
                <div class="games-card-bg-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag tag-blue">Math Practice</span>
                    <h3 class="games-card-title">Math Master</h3>
                    <p class="games-card-desc">Practice your arithmetic at your own pace. No falling numbers, just you and the math.</p>
                    <span class="games-play-link">
                        Play Now <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </button>
        </div>

        <!-- Active Game Container (Accessible Popup Modal) -->
        <div id="game-arena" class="game-arena hidden" role="dialog" aria-modal="true" aria-labelledby="arena-title">
            <div class="game-arena-dialog" id="game-arena-dialog">
                <!-- Game Header -->
                <div class="game-arena-header">
                    <h3 id="arena-title" class="arena-title">Game Title</h3>
                    <button onclick="closeGame()" class="arena-close-btn" aria-label="Exit Game">
                        <i class="fas fa-times"></i> Exit
                    </button>
                </div>

                <!-- Live Game Arena HUD -->
                <div id="arena-hud" class="arena-hud hidden">
                    <div class="hud-stats-group" id="hud-stats-group">
                        <!-- Populated dynamically based on game -->
                    </div>
                    <div class="hud-stats-group">
                        <span class="hud-badge xp-badge" id="hud-xp-badge"><i class="fas fa-star"></i> <span id="hud-xp-text">0 XP</span></span>
                    </div>
                </div>

                <!-- Game Canvas/Area -->
                <div id="arena-content" class="arena-content">
                    <!-- Game content injected here via JS -->
                </div>
            </div>

            <!-- ARIA Live Region for Screen Readers -->
            <div id="game-announcer" class="sr-only" aria-live="assertive" aria-atomic="true"></div>
        </div>

    </section>

</main>

<!-- GAME LOGIC SCRIPT -->
<script>
    // --- Sound Engine (Web Audio API) ---
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

    function playTone(freq, type, duration) {
        if (audioCtx.state === 'suspended') audioCtx.resume();
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.type = type;
        osc.frequency.setValueAtTime(freq, audioCtx.currentTime);
        gain.gain.setValueAtTime(0.1, audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.00001, audioCtx.currentTime + duration);
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.start();
        osc.stop(audioCtx.currentTime + duration);
    }

    const sounds = {
        click: () => playTone(400, 'sine', 0.1),
        match: () => { playTone(600, 'sine', 0.1); setTimeout(() => playTone(800, 'sine', 0.2), 100); },
        wrong: () => { playTone(200, 'sawtooth', 0.3); },
        win: () => {
            [400, 500, 600, 800].forEach((f, i) => setTimeout(() => playTone(f, 'square', 0.2), i * 150));
        },
        xp: () => {
            [523, 659, 784, 1046].forEach((f, i) => setTimeout(() => playTone(f, 'sine', 0.12), i * 70));
        },
        streak: () => {
            [440, 554, 659, 880, 1108].forEach((f, i) => setTimeout(() => playTone(f, 'triangle', 0.18), i * 90));
        }
    };

    // --- Screen Reader Announcer ---
    function announce(text) {
        const el = document.getElementById('game-announcer');
        if (el) {
            el.textContent = '';
            setTimeout(() => { el.textContent = text; }, 50);
        }
    }

    // --- Gamification & High Scores Storage Keys ---
    const STORAGE_KEY_SCORES = 'hesten_games_scores';
    const STORAGE_KEY_XP = 'hesten_student_xp';
    const STORAGE_KEY_QUEST = 'hesten_games_daily_quest';

    function getGameScores() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY_SCORES);
            if (raw) return JSON.parse(raw);
        } catch (e) {}
        return {
            memory: {
                easy: { bestTime: null, fewestMoves: null },
                medium: { bestTime: null, fewestMoves: null },
                hard: { bestTime: null, fewestMoves: null },
                totalWins: 0
            },
            math: {
                bestStreak: 0,
                totalSolved: 0
            }
        };
    }

    function saveGameScores(scores) {
        try {
            localStorage.setItem(STORAGE_KEY_SCORES, JSON.stringify(scores));
            if (typeof window.scheduleAutoSync === 'function') window.scheduleAutoSync();
        } catch (e) {}
    }

    function getStudentXP() {
        try {
            return parseInt(localStorage.getItem(STORAGE_KEY_XP), 10) || 0;
        } catch (e) {
            return 0;
        }
    }

    function calculateLevel(xp) {
        return Math.floor(xp / 100) + 1;
    }

    function formatTime(totalSeconds) {
        const mins = Math.floor(totalSeconds / 60);
        const secs = totalSeconds % 60;
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }

    function awardXP(amount, reason) {
        const currentXP = getStudentXP();
        const newXP = currentXP + amount;
        try {
            localStorage.setItem(STORAGE_KEY_XP, newXP.toString());
            if (typeof window.scheduleAutoSync === 'function') window.scheduleAutoSync();
        } catch (e) {}

        sounds.xp();
        announce(`Earned ${amount} XP! ${reason ? `For: ${reason}` : ''}`);

        showXPToast(amount, reason);
        updateHUDXP();
        updateGamesSummary();
        checkDailyGameQuest();
    }

    function showXPToast(amount, reason) {
        if (arena.classList.contains('hidden')) return;
        const toast = document.createElement('div');
        toast.className = 'xp-float-toast';
        toast.innerHTML = `<i class="fas fa-bolt"></i> +${amount} XP ${reason ? `<span style="font-size:0.75rem;opacity:0.9;">(${reason})</span>` : ''}`;
        arenaDialog.appendChild(toast);
        setTimeout(() => toast.remove(), 1700);
    }

    function getDailyGameQuest() {
        const todayStr = new Date().toISOString().slice(0, 10);
        let quest = { date: todayStr, gamesPlayed: 0, mathSolved: 0, completed: false };
        try {
            const raw = localStorage.getItem(STORAGE_KEY_QUEST);
            if (raw) {
                const parsed = JSON.parse(raw);
                if (parsed.date === todayStr) quest = parsed;
            }
        } catch (e) {}
        return quest;
    }

    function saveDailyGameQuest(quest) {
        try {
            localStorage.setItem(STORAGE_KEY_QUEST, JSON.stringify(quest));
        } catch (e) {}
    }

    function recordGamePlayed() {
        const quest = getDailyGameQuest();
        quest.gamesPlayed = (quest.gamesPlayed || 0) + 1;
        saveDailyGameQuest(quest);
        checkDailyGameQuest();
    }

    function recordMathSolved() {
        const quest = getDailyGameQuest();
        quest.mathSolved = (quest.mathSolved || 0) + 1;
        saveDailyGameQuest(quest);
        checkDailyGameQuest();
    }

    function checkDailyGameQuest() {
        const quest = getDailyGameQuest();
        const memoryDone = quest.gamesPlayed >= 1;
        const mathDone = quest.mathSolved >= 5;
        const isComplete = memoryDone && mathDone;

        const pill = document.getElementById('daily-game-quest-pill');
        const text = document.getElementById('quest-status-text');

        if (!quest.completed && isComplete) {
            quest.completed = true;
            saveDailyGameQuest(quest);
            awardXP(50, "Daily Game Challenge Complete!");
        }

        if (pill && text) {
            if (quest.completed) {
                pill.classList.add('completed');
                text.innerHTML = `<i class="fas fa-check-circle" style="color:#10b981;"></i> Daily Challenge Complete! (+50 XP Claimed)`;
            } else {
                pill.classList.remove('completed');
                const parts = [];
                parts.push(memoryDone ? "1/1 Game" : `${quest.gamesPlayed || 0}/1 Game`);
                parts.push(mathDone ? "5/5 Math" : `${quest.mathSolved || 0}/5 Math`);
                text.innerHTML = `<i class="fas fa-tasks"></i> Daily Challenge: ${parts.join(' & ')} (+50 XP)`;
            }
        }
    }

    function updateGamesSummary() {
        const xp = getStudentXP();
        const level = calculateLevel(xp);
        const scores = getGameScores();

        const lvlEl = document.getElementById('stat-level');
        const xpEl = document.getElementById('stat-total-xp');
        const memEl = document.getElementById('stat-memory-best');
        const mathEl = document.getElementById('stat-math-streak');

        if (lvlEl) lvlEl.textContent = `Lv. ${level}`;
        if (xpEl) xpEl.textContent = `${xp.toLocaleString()} XP`;

        if (memEl) {
            const med = scores.memory.medium;
            if (med && med.bestTime !== null) {
                memEl.textContent = `${formatTime(med.bestTime)} (${med.fewestMoves} flips)`;
            } else {
                memEl.textContent = "Not played";
            }
        }

        if (mathEl) {
            mathEl.textContent = `${scores.math.bestStreak || 0} 🔥`;
        }
    }

    function updateHUDXP() {
        const xp = getStudentXP();
        const level = calculateLevel(xp);
        const hudXp = document.getElementById('hud-xp-text');
        if (hudXp) hudXp.textContent = `Lv. ${level} • ${xp} XP`;
    }

    // --- Modal Controls & Keyboard Trapping ---
    const arena = document.getElementById('game-arena');
    const arenaTitle = document.getElementById('arena-title');
    const arenaContent = document.getElementById('arena-content');
    const arenaDialog = document.getElementById('game-arena-dialog');
    const arenaHud = document.getElementById('arena-hud');
    const hudStatsGroup = document.getElementById('hud-stats-group');

    let lastFocusedElement = null;

    // Game Configurations State
    let memoryDifficulty = 'medium'; // easy, medium, hard
    let memoryTheme = 'icons'; // icons, numbers, letters
    let mathOperation = 'addition'; // addition, subtraction, multiplication, mixed
    let mathDifficulty = 'easy'; // easy, medium, hard

    function loadGame(gameType) {
        lastFocusedElement = document.activeElement;
        
        arena.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (gameType === 'memory') showMemorySetup();
        if (gameType === 'math') showMathSetup();
    }

    function closeGame() {
        if (memoryTimer) {
            clearInterval(memoryTimer);
            memoryTimer = null;
        }
        arena.classList.add('hidden');
        if (arenaHud) arenaHud.classList.add('hidden');
        document.body.style.overflow = '';
        announce("Game closed.");
        updateGamesSummary();
        
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }
    }

    // Keyboard navigation & trap inside the modal
    document.addEventListener('keydown', function(e) {
        if (arena.classList.contains('hidden')) return;

        if (e.key === 'Escape') {
            closeGame();
            return;
        }

        if (e.key === 'Tab') {
            const focusableSelectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
            const focusables = arena.querySelectorAll(focusableSelectors);
            if (focusables.length === 0) return;

            const first = focusables[0];
            const last = focusables[focusables.length - 1];

            if (e.shiftKey) {
                if (document.activeElement === first) {
                    last.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === last) {
                    first.focus();
                    e.preventDefault();
                }
            }
        }
    });

    // --- GAME SETUP SCREENS ---
    function showMemorySetup() {
        if (memoryTimer) {
            clearInterval(memoryTimer);
            memoryTimer = null;
        }
        if (arenaHud) arenaHud.classList.add('hidden');
        arenaTitle.textContent = "Memory Match - Options";
        arenaDialog.classList.remove('wide');

        const scores = getGameScores();
        const diffRecord = scores.memory[memoryDifficulty];
        const recordText = diffRecord && diffRecord.bestTime !== null
            ? `Best: ${formatTime(diffRecord.bestTime)} (${diffRecord.fewestMoves} flips)`
            : "No record yet";

        let setupHtml = `
            <div class="game-setup-container">
                <div>
                    <h4 class="setup-section-title">Difficulty / Grid Size</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Difficulty">
                        <button type="button" class="option-btn ${memoryDifficulty === 'easy' ? 'active' : ''}" onclick="setMemoryDifficulty('easy')" id="opt-mem-easy">Easy (3x4)</button>
                        <button type="button" class="option-btn ${memoryDifficulty === 'medium' ? 'active' : ''}" onclick="setMemoryDifficulty('medium')" id="opt-mem-medium">Medium (4x4)</button>
                        <button type="button" class="option-btn ${memoryDifficulty === 'hard' ? 'active' : ''}" onclick="setMemoryDifficulty('hard')" id="opt-mem-hard">Hard (4x5)</button>
                    </div>
                </div>
                <div>
                    <h4 class="setup-section-title">Card Theme</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Card Theme">
                        <button type="button" class="option-btn ${memoryTheme === 'icons' ? 'active' : ''}" onclick="setMemoryTheme('icons')" id="opt-theme-icons">Icons</button>
                        <button type="button" class="option-btn ${memoryTheme === 'numbers' ? 'active' : ''}" onclick="setMemoryTheme('numbers')" id="opt-theme-numbers">Numbers</button>
                        <button type="button" class="option-btn ${memoryTheme === 'letters' ? 'active' : ''}" onclick="setMemoryTheme('letters')" id="opt-theme-letters">Letters</button>
                    </div>
                </div>
                <div style="background:var(--color-bg-base); padding: 0.75rem 1rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); font-size: 0.85rem; color: var(--color-text-muted);">
                    <i class="fas fa-trophy" style="color:#f59e0b; margin-right:0.35rem;"></i> Current Difficulty Record: <strong style="color:var(--color-text-main);">${recordText}</strong>
                </div>
                <button onclick="startMemoryGame()" class="start-game-btn">
                    <i class="fas fa-play"></i> Start Game
                </button>
            </div>
        `;
        arenaContent.innerHTML = setupHtml;

        setTimeout(() => {
            const activeDifficulty = document.querySelector('.options-button-group [id^="opt-mem-"].active') || document.getElementById('opt-mem-medium');
            if (activeDifficulty) activeDifficulty.focus();
        }, 100);
    }

    function showMathSetup() {
        if (arenaHud) arenaHud.classList.add('hidden');
        arenaTitle.textContent = "Math Master - Options";
        arenaDialog.classList.remove('wide');

        const scores = getGameScores();
        const streakRecord = scores.math.bestStreak || 0;

        let setupHtml = `
            <div class="game-setup-container">
                <div>
                    <h4 class="setup-section-title">Operation</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Operations">
                        <button type="button" class="option-btn ${mathOperation === 'addition' ? 'active' : ''}" onclick="setMathOperation('addition')" id="opt-math-add">Addition (+)</button>
                        <button type="button" class="option-btn ${mathOperation === 'subtraction' ? 'active' : ''}" onclick="setMathOperation('subtraction')" id="opt-math-sub">Subtraction (-)</button>
                        <button type="button" class="option-btn ${mathOperation === 'multiplication' ? 'active' : ''}" onclick="setMathOperation('multiplication')" id="opt-math-mul">Multiplication (×)</button>
                        <button type="button" class="option-btn ${mathOperation === 'mixed' ? 'active' : ''}" onclick="setMathOperation('mixed')" id="opt-math-mixed">Mixed</button>
                    </div>
                </div>
                <div>
                    <h4 class="setup-section-title">Difficulty</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Difficulty Level">
                        <button type="button" class="option-btn ${mathDifficulty === 'easy' ? 'active' : ''}" onclick="setMathDifficulty('easy')" id="opt-math-easy">Easy (1-10)</button>
                        <button type="button" class="option-btn ${mathDifficulty === 'medium' ? 'active' : ''}" onclick="setMathDifficulty('medium')" id="opt-math-medium">Medium (1-20)</button>
                        <button type="button" class="option-btn ${mathDifficulty === 'hard' ? 'active' : ''}" onclick="setMathDifficulty('hard')" id="opt-math-hard">Hard (up to 100)</button>
                    </div>
                </div>
                <div style="background:var(--color-bg-base); padding: 0.75rem 1rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); font-size: 0.85rem; color: var(--color-text-muted);">
                    <i class="fas fa-fire" style="color:#ea580c; margin-right:0.35rem;"></i> Max Streak Record: <strong style="color:var(--color-text-main);">${streakRecord} 🔥</strong>
                </div>
                <button onclick="startMathGame()" class="start-game-btn">
                    <i class="fas fa-play"></i> Start Game
                </button>
            </div>
        `;
        arenaContent.innerHTML = setupHtml;

        setTimeout(() => {
            const activeOp = document.querySelector('.options-button-group [id^="opt-math-"].active') || document.getElementById('opt-math-add');
            if (activeOp) activeOp.focus();
        }, 100);
    }

    function setMemoryDifficulty(diff) {
        memoryDifficulty = diff;
        ['easy', 'medium', 'hard'].forEach(d => {
            const btn = document.getElementById(`opt-mem-${d}`);
            if (btn) btn.classList.toggle('active', d === diff);
        });
        sounds.click();
        announce(`Difficulty set to ${diff}`);
    }

    function setMemoryTheme(theme) {
        memoryTheme = theme;
        ['icons', 'numbers', 'letters'].forEach(t => {
            const btn = document.getElementById(`opt-theme-${t}`);
            if (btn) btn.classList.toggle('active', t === theme);
        });
        sounds.click();
        announce(`Theme set to ${theme}`);
    }

    function setMathOperation(op) {
        mathOperation = op;
        ['add', 'sub', 'mul', 'mixed'].forEach(o => {
            const opName = o === 'add' ? 'addition' : o === 'sub' ? 'subtraction' : o === 'mul' ? 'multiplication' : 'mixed';
            const btn = document.getElementById(`opt-math-${o}`);
            if (btn) btn.classList.toggle('active', opName === op);
        });
        sounds.click();
        announce(`Operation set to ${op}`);
    }

    function setMathDifficulty(diff) {
        mathDifficulty = diff;
        ['easy', 'medium', 'hard'].forEach(d => {
            const btn = document.getElementById(`opt-math-${d}`);
            if (btn) btn.classList.toggle('active', d === diff);
        });
        sounds.click();
        announce(`Difficulty level set to ${diff}`);
    }


    // --- GAME 1: MEMORY MATCH ---
    const iconLibrary = ['star', 'heart', 'bolt', 'moon', 'cloud', 'sun', 'snowflake', 'leaf', 'smile', 'music'];
    const numberLibrary = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
    const letterLibrary = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

    let flippedCards = [];
    let matchedPairs = 0;
    let totalPairs = 8;
    let isProcessing = false;
    let memoryMoves = 0;
    let memorySeconds = 0;
    let memoryTimer = null;

    function startMemoryGame() {
        arenaTitle.textContent = "Memory Match";

        if (memoryTimer) {
            clearInterval(memoryTimer);
            memoryTimer = null;
        }

        let pairsNeeded = 8;
        let gridClass = 'grid-medium';
        if (memoryDifficulty === 'easy') {
            pairsNeeded = 6;
            gridClass = 'grid-easy';
            arenaDialog.classList.remove('wide');
        } else if (memoryDifficulty === 'hard') {
            pairsNeeded = 10;
            gridClass = 'grid-hard';
            arenaDialog.classList.add('wide');
        } else {
            pairsNeeded = 8;
            gridClass = 'grid-medium';
            arenaDialog.classList.remove('wide');
        }

        memoryMoves = 0;
        memorySeconds = 0;
        matchedPairs = 0;
        totalPairs = pairsNeeded;
        flippedCards = [];
        isProcessing = false;

        // Populate and show HUD
        if (arenaHud && hudStatsGroup) {
            const scores = getGameScores();
            const diffRecord = scores.memory[memoryDifficulty];
            const bestText = diffRecord && diffRecord.bestTime !== null ? formatTime(diffRecord.bestTime) : '--:--';

            hudStatsGroup.innerHTML = `
                <span class="hud-badge"><i class="fas fa-stopwatch" style="color:#6366f1;"></i> <span id="hud-mem-time">0:00</span></span>
                <span class="hud-badge"><i class="fas fa-hand-pointer" style="color:#10b981;"></i> <span id="hud-mem-flips">0 flips</span></span>
                <span class="hud-badge"><i class="fas fa-check-double" style="color:#3b82f6;"></i> <span id="hud-mem-pairs">0/${pairsNeeded}</span></span>
                <span class="hud-badge"><i class="fas fa-trophy" style="color:#f59e0b;"></i> Best: ${bestText}</span>
            `;
            arenaHud.classList.remove('hidden');
        }
        updateHUDXP();

        // Start timer
        memoryTimer = setInterval(() => {
            memorySeconds++;
            const timeEl = document.getElementById('hud-mem-time');
            if (timeEl) timeEl.textContent = formatTime(memorySeconds);
        }, 1000);

        announce(`Memory Match started. Difficulty is ${memoryDifficulty}. Theme is ${memoryTheme}. Use keyboard or click to match.`);

        let library = memoryTheme === 'numbers' ? numberLibrary : memoryTheme === 'letters' ? letterLibrary : iconLibrary;
        const activeSymbols = library.slice(0, pairsNeeded);
        let cards = [...activeSymbols, ...activeSymbols].sort(() => 0.5 - Math.random());

        let gridHtml = `<div class="memory-grid ${gridClass}" role="grid" aria-label="Memory Game Board">`;
        cards.forEach((icon, index) => {
            gridHtml += `
                <button id="card-${index}" class="memory-card state-hidden" 
                    onclick="flipCard(${index}, '${icon}')" 
                    aria-label="Card ${index + 1}, hidden">
                    <div class="memory-card-inner">
                        ${getCardContent(icon, false)}
                    </div>
                </button>
            `;
        });
        gridHtml += `</div>
        <div class="memory-controls">
            <button onclick="showMemorySetup()" class="memory-restart-btn" style="margin-right: 0.5rem;">Options Setup</button>
            <button onclick="startMemoryGame()" class="memory-restart-btn">Restart Game</button>
        </div>`;

        arenaContent.innerHTML = gridHtml;

        setTimeout(() => {
            const firstCard = document.getElementById('card-0');
            if (firstCard) firstCard.focus();
        }, 100);
    }

    function updateMemoryHUD() {
        const timeEl = document.getElementById('hud-mem-time');
        const flipsEl = document.getElementById('hud-mem-flips');
        const pairsEl = document.getElementById('hud-mem-pairs');
        if (timeEl) timeEl.textContent = formatTime(memorySeconds);
        if (flipsEl) flipsEl.textContent = `${memoryMoves} flips`;
        if (pairsEl) pairsEl.textContent = `${matchedPairs}/${totalPairs}`;
    }

    function getCardContent(icon, isFlipped) {
        if (!isFlipped) {
            return `<i class="fas fa-question icon-hidden"></i>`;
        }
        if (memoryTheme === 'icons') {
            return `<i class="fas fa-${icon}"></i>`;
        } else {
            return `<span class="card-text">${icon}</span>`;
        }
    }

    function flipCard(index, icon) {
        if (isProcessing) return;
        const btn = document.getElementById(`card-${index}`);
        if (!btn || btn.classList.contains('state-matched') || btn.classList.contains('state-flipped')) return;

        sounds.click();

        btn.classList.remove('state-hidden');
        btn.classList.add('state-flipped');
        btn.querySelector('.memory-card-inner').innerHTML = getCardContent(icon, true);
        btn.setAttribute('aria-label', `Card ${index + 1}, ${icon}`);
        announce(`${icon}`);

        flippedCards.push({ index, icon });
        memoryMoves++;
        updateMemoryHUD();

        if (flippedCards.length === 2) {
            isProcessing = true;
            checkForMatch();
        }
    }

    function checkForMatch() {
        const [c1, c2] = flippedCards;
        const btn1 = document.getElementById(`card-${c1.index}`);
        const btn2 = document.getElementById(`card-${c2.index}`);

        if (c1.icon === c2.icon) {
            sounds.match();
            announce(`Match found! ${c1.icon}`);
            setTimeout(() => {
                btn1.classList.remove('state-flipped');
                btn2.classList.remove('state-flipped');
                btn1.classList.add('state-matched');
                btn2.classList.add('state-matched');
                btn1.setAttribute('aria-label', `${c1.icon}, matched`);
                btn2.setAttribute('aria-label', `${c2.icon}, matched`);
                matchedPairs++;
                updateMemoryHUD();
                checkWin();
                isProcessing = false;
                flippedCards = [];
            }, 500);
        } else {
            sounds.wrong();
            announce("No match.");
            setTimeout(() => {
                btn1.classList.remove('state-flipped');
                btn1.classList.add('state-hidden');
                btn1.querySelector('.memory-card-inner').innerHTML = getCardContent(c1.icon, false);
                btn1.setAttribute('aria-label', `Card ${c1.index + 1}, hidden`);

                btn2.classList.remove('state-flipped');
                btn2.classList.add('state-hidden');
                btn2.querySelector('.memory-card-inner').innerHTML = getCardContent(c2.icon, false);
                btn2.setAttribute('aria-label', `Card ${c2.index + 1}, hidden`);

                isProcessing = false;
                flippedCards = [];
            }, 1000);
        }
    }

    function checkWin() {
        if (matchedPairs === totalPairs) {
            if (memoryTimer) {
                clearInterval(memoryTimer);
                memoryTimer = null;
            }

            sounds.win();
            const timeStr = formatTime(memorySeconds);
            announce(`Victory! Board cleared in ${timeStr} with ${memoryMoves} flips.`);

            // Record game played in daily quest
            recordGamePlayed();

            // Check high scores
            const scores = getGameScores();
            const diffRecord = scores.memory[memoryDifficulty] || { bestTime: null, fewestMoves: null };
            let isNewTimeRecord = false;
            let isNewMovesRecord = false;

            if (diffRecord.bestTime === null || memorySeconds < diffRecord.bestTime) {
                diffRecord.bestTime = memorySeconds;
                isNewTimeRecord = true;
            }
            if (diffRecord.fewestMoves === null || memoryMoves < diffRecord.fewestMoves) {
                diffRecord.fewestMoves = memoryMoves;
                isNewMovesRecord = true;
            }
            scores.memory[memoryDifficulty] = diffRecord;
            scores.memory.totalWins = (scores.memory.totalWins || 0) + 1;
            saveGameScores(scores);

            // Calculate Stars Rating
            // Optimal moves is totalPairs * 2
            let stars = 1;
            if (memoryMoves <= totalPairs * 2.5) {
                stars = 3;
            } else if (memoryMoves <= totalPairs * 3.5) {
                stars = 2;
            }
            const starsHtml = '⭐'.repeat(stars) + '<span style="opacity:0.3;">' + '⭐'.repeat(3 - stars) + '</span>';

            // Award XP: base 50 XP + bonus for record or 3-stars
            let xpEarned = 50;
            if (isNewTimeRecord || isNewMovesRecord) xpEarned += 25;
            if (stars === 3) xpEarned += 15;
            awardXP(xpEarned, "Memory Victory");

            const isNewRecord = isNewTimeRecord || isNewMovesRecord;

            arenaContent.innerHTML += `
                <div class="memory-win-overlay">
                    <div class="win-stars">${starsHtml}</div>
                    <h4 class="win-title">Board Cleared!</h4>
                    ${isNewRecord ? `<div class="win-record-badge"><i class="fas fa-medal"></i> New Personal Record!</div>` : ''}
                    
                    <div class="win-stats-grid">
                        <div class="win-stat-box">
                            <div class="win-stat-label">Your Time</div>
                            <div class="win-stat-value">${timeStr}</div>
                        </div>
                        <div class="win-stat-box">
                            <div class="win-stat-label">Total Flips</div>
                            <div class="win-stat-value">${memoryMoves}</div>
                        </div>
                        <div class="win-stat-box">
                            <div class="win-stat-label">Best Time</div>
                            <div class="win-stat-value">${formatTime(diffRecord.bestTime)}</div>
                        </div>
                        <div class="win-stat-box">
                            <div class="win-stat-label">Fewest Flips</div>
                            <div class="win-stat-value">${diffRecord.fewestMoves}</div>
                        </div>
                    </div>

                    <p style="margin-bottom: 1.25rem; font-weight: 700; color: #fcd34d;">
                        <i class="fas fa-bolt"></i> +${xpEarned} XP Earned!
                    </p>

                    <div style="display: flex; gap: 1rem; z-index: 20;">
                        <button onclick="showMemorySetup()" class="win-btn" style="background-color: var(--color-bg-elevated); color: var(--color-text-main);">Change Options</button>
                        <button onclick="startMemoryGame()" class="win-btn">Play Again</button>
                    </div>
                </div>
            `;
            setTimeout(() => {
                const playAgainBtn = arenaContent.querySelector('.memory-win-overlay .win-btn:last-child');
                if (playAgainBtn) playAgainBtn.focus();
            }, 100);
        }
    }


    // --- GAME 2: MATH MASTER ---
    let currentAnswer = 0;
    let mathCurrentStreak = 0;
    let mathSessionSolved = 0;

    function startMathGame() {
        arenaTitle.textContent = "Math Master";
        arenaDialog.classList.remove('wide');
        mathCurrentStreak = 0;
        mathSessionSolved = 0;

        // Populate and show HUD
        if (arenaHud && hudStatsGroup) {
            const scores = getGameScores();
            const bestStreak = scores.math.bestStreak || 0;

            hudStatsGroup.innerHTML = `
                <span class="hud-badge streak-badge" id="hud-math-streak"><i class="fas fa-fire"></i> <span id="math-streak-num">0</span> Streak</span>
                <span class="hud-badge"><i class="fas fa-check" style="color:#10b981;"></i> <span id="math-solved-num">0 solved</span></span>
                <span class="hud-badge"><i class="fas fa-trophy" style="color:#f59e0b;"></i> Best: ${bestStreak} 🔥</span>
            `;
            arenaHud.classList.remove('hidden');
        }
        updateHUDXP();

        announce("Math Master started. Type the correct answer and press Enter or click Submit.");
        generateMathProblem();
    }

    function updateMathHUD() {
        const streakEl = document.getElementById('math-streak-num');
        const solvedEl = document.getElementById('math-solved-num');
        if (streakEl) streakEl.textContent = mathCurrentStreak;
        if (solvedEl) solvedEl.textContent = `${mathSessionSolved} solved`;
    }

    function generateMathProblem() {
        let num1, num2, symbol, actualOp;

        if (mathOperation === 'mixed') {
            const ops = ['addition', 'subtraction', 'multiplication'];
            actualOp = ops[Math.floor(Math.random() * ops.length)];
        } else {
            actualOp = mathOperation;
        }

        if (mathDifficulty === 'easy') {
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 5) + 1;
                num2 = Math.floor(Math.random() * 5) + 1;
            } else {
                num1 = Math.floor(Math.random() * 10) + 1;
                num2 = Math.floor(Math.random() * 10) + 1;
            }
        } else if (mathDifficulty === 'medium') {
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 10) + 1;
                num2 = Math.floor(Math.random() * 10) + 1;
            } else {
                num1 = Math.floor(Math.random() * 20) + 1;
                num2 = Math.floor(Math.random() * 20) + 1;
            }
        } else {
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 12) + 1;
                num2 = Math.floor(Math.random() * 12) + 1;
            } else {
                num1 = Math.floor(Math.random() * 90) + 10;
                num2 = Math.floor(Math.random() * 90) + 10;
            }
        }

        if (actualOp === 'addition') {
            currentAnswer = num1 + num2;
            symbol = '+';
        } else if (actualOp === 'subtraction') {
            if (num1 < num2 && mathDifficulty !== 'hard') {
                const temp = num1;
                num1 = num2;
                num2 = temp;
            }
            currentAnswer = num1 - num2;
            symbol = '-';
        } else {
            currentAnswer = num1 * num2;
            symbol = '×';
        }

        const problemText = `${num1} ${symbol} ${num2}`;
        const ariaLabelText = `Problem: ${num1} ${symbol === '+' ? 'plus' : symbol === '-' ? 'minus' : 'times'} ${num2}`;

        arenaContent.innerHTML = `
            <div class="math-container">
                <div class="math-problem-box">
                    <span class="math-problem-text" aria-label="${ariaLabelText}">${problemText}</span>
                </div>
                
                <div class="math-input-group">
                    <input type="number" id="math-input" class="math-input" placeholder="?" aria-label="Enter your answer">
                    <button onclick="checkMathAnswer()" class="math-submit-btn">Submit</button>
                </div>
                
                <p id="math-feedback" class="math-feedback" aria-live="polite"></p>

                <div id="math-milestone-box"></div>

                <div style="margin-top: 2rem;">
                    <button onclick="showMathSetup()" class="memory-restart-btn">Options Setup</button>
                </div>
            </div>
        `;

        const input = document.getElementById('math-input');
        if (input) {
            input.focus();
            input.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') checkMathAnswer();
            });
        }

        announce(`New problem: ${num1} ${symbol === '+' ? 'plus' : symbol === '-' ? 'minus' : 'times'} ${num2}`);
    }

    function checkMathAnswer() {
        const input = document.getElementById('math-input');
        const feedback = document.getElementById('math-feedback');
        const milestoneBox = document.getElementById('math-milestone-box');
        if (!input || !feedback) return;

        const userVal = parseInt(input.value);

        if (isNaN(userVal)) {
            feedback.textContent = "Please enter a number.";
            feedback.className = "math-feedback feedback-warn";
            return;
        }

        if (userVal === currentAnswer) {
            sounds.match();
            mathCurrentStreak++;
            mathSessionSolved++;
            recordMathSolved();

            // Check high streak
            const scores = getGameScores();
            scores.math.totalSolved = (scores.math.totalSolved || 0) + 1;
            let isNewStreakRecord = false;
            if (mathCurrentStreak > (scores.math.bestStreak || 0)) {
                scores.math.bestStreak = mathCurrentStreak;
                isNewStreakRecord = true;
            }
            saveGameScores(scores);

            updateMathHUD();

            // Award base XP
            awardXP(10, "Math Correct");

            // Streak milestone check
            let milestoneMsg = "";
            if (mathCurrentStreak === 5) {
                sounds.streak();
                awardXP(25, "5 Streak Milestone! 🔥");
                milestoneMsg = "5 in a row! You're on fire! 🔥 (+25 Bonus XP)";
            } else if (mathCurrentStreak === 10) {
                sounds.streak();
                awardXP(50, "10 Streak Milestone! ⚡");
                milestoneMsg = "10 Streak! Math Master! ⚡ (+50 Bonus XP)";
            } else if (mathCurrentStreak === 20) {
                sounds.streak();
                awardXP(100, "20 Streak Legend! 🏆");
                milestoneMsg = "20 Streak Milestone! Unstoppable! 🏆 (+100 Bonus XP)";
            }

            feedback.textContent = `Correct! ${mathCurrentStreak} in a row!`;
            feedback.className = "math-feedback feedback-success";

            if (milestoneMsg && milestoneBox) {
                milestoneBox.innerHTML = `<div class="math-streak-milestone"><i class="fas fa-fire"></i> ${milestoneMsg}</div>`;
            }

            announce(`Correct! Current streak: ${mathCurrentStreak}`);
            setTimeout(generateMathProblem, 1200);
        } else {
            sounds.wrong();
            mathCurrentStreak = 0;
            updateMathHUD();
            feedback.textContent = "Try again!";
            feedback.className = "math-feedback feedback-error";
            if (milestoneBox) milestoneBox.innerHTML = "";
            announce("Incorrect, try again.");
            input.value = '';
            input.focus();
        }
    }

    // --- Page Initialization ---
    document.addEventListener('DOMContentLoaded', () => {
        updateGamesSummary();
        checkDailyGameQuest();
        updateHUDXP();
    });
</script>

<?php include '../src/footer.php'; ?>