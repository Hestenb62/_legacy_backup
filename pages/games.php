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
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-bolt" style="color: #f59e0b;"></i> Sprint Best</span>
                    <span class="chip-value highlight-amber" id="stat-sprint-best">0 pts ⚡</span>
                </div>
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-spell-check" style="color: #8b5cf6;"></i> Scramble Solved</span>
                    <span class="chip-value" style="color: #8b5cf6;" id="stat-scramble-solved">0</span>
                </div>
                <div class="banner-stat-chip">
                    <span class="chip-label"><i class="fas fa-user-secret" style="color: #0d9488;"></i> Cases Solved</span>
                    <span class="chip-value" style="color: #0d9488;" id="stat-grammar-solved">0</span>
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

            <!-- Game Card 3 -->
            <button onclick="loadGame('sprint')" class="games-card card-sprint" id="card-sprint">
                <div class="games-card-bg-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag tag-amber">Speed &amp; Agility</span>
                    <h3 class="games-card-title">60-Second Speed Sprint</h3>
                    <p class="games-card-desc">Race against the clock! Solve rapid mental math equations, build high streaks, and multiply your score.</p>
                    <span class="games-play-link">
                        Play Now <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </button>

            <!-- Game Card 4: Word Scramble Studio -->
            <button onclick="loadGame('scramble')" class="games-card card-scramble" id="card-scramble" aria-label="Play Word Scramble Studio">
                <div class="games-card-bg-icon">
                    <i class="fas fa-spell-check"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag tag-purple">ELA &amp; Vocabulary</span>
                    <h3 class="games-card-title">Word Scramble Studio</h3>
                    <p class="games-card-desc">Unscramble vocabulary words with phonetics, definitions, and hint reveal. Perfect for spelling mastery.</p>
                    <span class="games-play-link">
                        Play Now <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </button>

            <!-- Game Card 5: Grammar Detective -->
            <button onclick="loadGame('grammar')" class="games-card card-grammar" id="card-grammar" aria-label="Play Grammar Detective">
                <div class="games-card-bg-icon">
                    <i class="fas fa-user-secret"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag tag-teal">Language Mechanics</span>
                    <h3 class="games-card-title">Grammar Detective</h3>
                    <p class="games-card-desc">Crack the case by spotting and correcting syntax, punctuation, homophone, and capitalization errors.</p>
                    <span class="games-play-link">
                        Play Now <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </button>

            <!-- Game Card 6: Word Search Studio -->
            <a href="/pages/word-search.php" class="games-card" id="card-wordsearch" style="text-decoration: none;" aria-label="Play Word Search Studio">
                <div class="games-card-bg-icon">
                    <i class="fas fa-th"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag" style="background: rgba(225, 29, 72, 0.15); color: #e11d48;">Spelling &amp; Vocab</span>
                    <h3 class="games-card-title">Word Search Studio</h3>
                    <p class="games-card-desc">Search and circle academic vocabulary in interactive grids with dyslexia fonts, audio chimes, and printable worksheets.</p>
                    <span class="games-play-link" style="color: #e11d48;">
                        Play &amp; Print <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </a>

            <!-- Game Card 7: Crossword Puzzle Studio -->
            <a href="/pages/crossword.php" class="games-card" id="card-crossword" style="text-decoration: none;" aria-label="Play Crossword Puzzle Studio">
                <div class="games-card-bg-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <div class="games-card-content">
                    <span class="games-tag" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">Vocabulary &amp; Trivia</span>
                    <h3 class="games-card-title">Crossword Puzzle Studio</h3>
                    <p class="games-card-desc">Solve intersecting crossword puzzles with clue highlighters, check letter validation, and printable answer keys.</p>
                    <span class="games-play-link" style="color: #4f46e5;">
                        Play &amp; Print <i class="fas fa-arrow-right icon-arrow"></i>
                    </span>
                </div>
            </a>
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
        let scores = {
            memory: {
                easy: { bestTime: null, fewestMoves: null },
                medium: { bestTime: null, fewestMoves: null },
                hard: { bestTime: null, fewestMoves: null },
                totalWins: 0
            },
            math: {
                bestStreak: 0,
                totalSolved: 0
            },
            sprint: {
                highScore: 0,
                bestStreak: 0,
                totalRounds: 0,
                totalSolved: 0
            },
            scramble: {
                bestStreak: 0,
                totalSolved: 0
            },
            grammar: {
                bestStreak: 0,
                casesSolved: 0
            }
        };
        try {
            const raw = localStorage.getItem(STORAGE_KEY_SCORES);
            if (raw) {
                const parsed = JSON.parse(raw);
                if (parsed.memory) scores.memory = { ...scores.memory, ...parsed.memory };
                if (parsed.math) scores.math = { ...scores.math, ...parsed.math };
                if (parsed.sprint) scores.sprint = { ...scores.sprint, ...parsed.sprint };
                if (parsed.scramble) scores.scramble = { ...scores.scramble, ...parsed.scramble };
                if (parsed.grammar) scores.grammar = { ...scores.grammar, ...parsed.grammar };
            }
        } catch (e) {}
        return scores;
    }

    function saveGameScores(scores) {
        try {
            localStorage.setItem(STORAGE_KEY_SCORES, JSON.stringify(scores));
            if (typeof window.scheduleAutoSync === 'function') window.scheduleAutoSync();
        } catch (e) {}
    }

    function getStudentXP() {
        try {
            const rawXp = parseInt(localStorage.getItem(STORAGE_KEY_XP), 10) || 0;
            const profileRaw = localStorage.getItem('hesten-user-profile');
            const profXp = profileRaw ? (JSON.parse(profileRaw).xp || 0) : 0;
            return Math.max(rawXp, profXp);
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
            
            // Synchronize with global user profile
            const profileRaw = localStorage.getItem('hesten-user-profile');
            let prof = profileRaw ? JSON.parse(profileRaw) : {};
            prof.xp = (prof.xp || 0) + amount;
            prof.level = calculateLevel(prof.xp);
            localStorage.setItem('hesten-user-profile', JSON.stringify(prof));
            
            window.dispatchEvent(new CustomEvent('hl:profile-updated', {
                detail: { xp: prof.xp, level: prof.level }
            }));

            if (window.questManager && typeof window.questManager.addXP === 'function') {
                window.questManager.addXP(amount, reason);
            }

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
        const sprintEl = document.getElementById('stat-sprint-best');

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

        if (sprintEl) {
            sprintEl.textContent = `${(scores.sprint && scores.sprint.highScore) || 0} pts ⚡`;
        }

        const scrEl = document.getElementById('stat-scramble-solved');
        const grmEl = document.getElementById('stat-grammar-solved');
        if (scrEl) scrEl.textContent = `${(scores.scramble && scores.scramble.totalSolved) || 0}`;
        if (grmEl) grmEl.textContent = `${(scores.grammar && scores.grammar.casesSolved) || 0}`;
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

    // Sprint Game State
    let sprintOperation = 'mixed'; // addition, subtraction, multiplication, division, mixed
    let sprintDifficulty = 'allstar'; // rookie, allstar, halloffame
    let sprintTimer = null;
    let sprintSecondsLeft = 60;
    let sprintScore = 0;
    let sprintStreak = 0;
    let sprintMaxStreak = 0;
    let sprintTotalQuestions = 0;
    let sprintCorrectCount = 0;
    let sprintCurrentProblem = null;
    let sprintKeyHandler = null;

    // Word Scramble State
    let scrambleDifficulty = 'medium'; // easy, medium, hard
    let scrambleAutoSpeak = true;
    let scrambleKeyHandler = null;
    let scrambleStreak = 0;
    let scrambleCurrentWordObj = null;
    let scramblePlacedIndices = [];

    // Grammar Detective State
    let grammarCategory = 'all';
    let grammarStreak = 0;
    let grammarCurrentCase = null;

    function loadGame(gameType) {
        lastFocusedElement = document.activeElement;
        
        arena.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (gameType === 'memory') showMemorySetup();
        if (gameType === 'math') showMathSetup();
        if (gameType === 'sprint') showSprintSetup();
        if (gameType === 'scramble') showScrambleSetup();
        if (gameType === 'grammar') showGrammarSetup();
    }

    function closeGame() {
        if (memoryTimer) {
            clearInterval(memoryTimer);
            memoryTimer = null;
        }
        if (sprintTimer) {
            clearInterval(sprintTimer);
            sprintTimer = null;
        }
        if (sprintKeyHandler) {
            document.removeEventListener('keydown', sprintKeyHandler);
            sprintKeyHandler = null;
        }
        if (scrambleKeyHandler) {
            document.removeEventListener('keydown', scrambleKeyHandler);
            scrambleKeyHandler = null;
        }
        if (window.speechSynthesis) {
            window.speechSynthesis.cancel();
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

    // --- GAME 3: 60-SECOND SPEED SPRINT ---
    function showSprintSetup() {
        if (sprintTimer) {
            clearInterval(sprintTimer);
            sprintTimer = null;
        }
        if (sprintKeyHandler) {
            document.removeEventListener('keydown', sprintKeyHandler);
            sprintKeyHandler = null;
        }
        if (arenaHud) arenaHud.classList.add('hidden');
        arenaTitle.textContent = "60-Second Speed Sprint - Options";
        arenaDialog.classList.remove('wide');

        const scores = getGameScores();
        const sprintStats = scores.sprint || { highScore: 0, bestStreak: 0 };

        let setupHtml = `
            <div class="game-setup-container">
                <div>
                    <h4 class="setup-section-title">Sprint Mode / Operations</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Operations">
                        <button type="button" class="option-btn ${sprintOperation === 'mixed' ? 'active' : ''}" onclick="setSprintOperation('mixed')" id="opt-sprint-mixed">Grand Slam (All)</button>
                        <button type="button" class="option-btn ${sprintOperation === 'addition' ? 'active' : ''}" onclick="setSprintOperation('addition')" id="opt-sprint-add">Addition (+)</button>
                        <button type="button" class="option-btn ${sprintOperation === 'subtraction' ? 'active' : ''}" onclick="setSprintOperation('subtraction')" id="opt-sprint-sub">Subtraction (-)</button>
                        <button type="button" class="option-btn ${sprintOperation === 'multiplication' ? 'active' : ''}" onclick="setSprintOperation('multiplication')" id="opt-sprint-mul">Multiplication (×)</button>
                        <button type="button" class="option-btn ${sprintOperation === 'division' ? 'active' : ''}" onclick="setSprintOperation('division')" id="opt-sprint-div">Division (÷)</button>
                    </div>
                </div>
                <div>
                    <h4 class="setup-section-title">Difficulty Tier</h4>
                    <div class="options-button-group" role="radiogroup" aria-label="Difficulty Tier">
                        <button type="button" class="option-btn ${sprintDifficulty === 'rookie' ? 'active' : ''}" onclick="setSprintDifficulty('rookie')" id="opt-sprint-rookie">Rookie (1–10)</button>
                        <button type="button" class="option-btn ${sprintDifficulty === 'allstar' ? 'active' : ''}" onclick="setSprintDifficulty('allstar')" id="opt-sprint-allstar">All-Star (1–25)</button>
                        <button type="button" class="option-btn ${sprintDifficulty === 'halloffame' ? 'active' : ''}" onclick="setSprintDifficulty('halloffame')" id="opt-sprint-halloffame">Hall of Fame (1–100)</button>
                    </div>
                </div>
                <div style="background:var(--color-bg-base); padding: 0.85rem 1rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); font-size: 0.85rem; color: var(--color-text-muted); display:flex; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                    <div><i class="fas fa-trophy" style="color:#f59e0b; margin-right:0.35rem;"></i> High Score: <strong style="color:var(--color-text-main);">${sprintStats.highScore || 0} pts</strong></div>
                    <div><i class="fas fa-fire" style="color:#ea580c; margin-right:0.35rem;"></i> Best Streak: <strong style="color:var(--color-text-main);">${sprintStats.bestStreak || 0} 🔥</strong></div>
                </div>
                <div class="sprint-rules-callout">
                    <i class="fas fa-bolt" style="color:#f59e0b; font-size:1.15rem;"></i>
                    <span><strong>Sprint Rules:</strong> 60 seconds on the clock. Answer rapidly using <strong>keys 1–4</strong> or clicking. Consecutive correct answers unlock up to <strong>×2.0 score multipliers</strong>!</span>
                </div>
                <button onclick="startSprintGame()" class="start-game-btn sprint-start-btn">
                    <i class="fas fa-bolt"></i> Start 60-Second Sprint!
                </button>
            </div>
        `;
        arenaContent.innerHTML = setupHtml;

        setTimeout(() => {
            const activeBtn = document.querySelector('.options-button-group [id^="opt-sprint-"].active') || document.getElementById('opt-sprint-mixed');
            if (activeBtn) activeBtn.focus();
        }, 100);
    }

    function setSprintOperation(op) {
        sprintOperation = op;
        ['mixed', 'add', 'sub', 'mul', 'div'].forEach(o => {
            const opName = o === 'add' ? 'addition' : o === 'sub' ? 'subtraction' : o === 'mul' ? 'multiplication' : o === 'div' ? 'division' : 'mixed';
            const btn = document.getElementById(`opt-sprint-${o}`);
            if (btn) btn.classList.toggle('active', opName === op);
        });
        sounds.click();
        announce(`Sprint mode set to ${op}`);
    }

    function setSprintDifficulty(diff) {
        sprintDifficulty = diff;
        ['rookie', 'allstar', 'halloffame'].forEach(d => {
            const btn = document.getElementById(`opt-sprint-${d}`);
            if (btn) btn.classList.toggle('active', d === diff);
        });
        sounds.click();
        announce(`Difficulty set to ${diff}`);
    }

    function startSprintGame() {
        arenaTitle.textContent = "60-Second Speed Sprint";
        arenaDialog.classList.remove('wide');

        if (sprintTimer) {
            clearInterval(sprintTimer);
            sprintTimer = null;
        }
        if (sprintKeyHandler) {
            document.removeEventListener('keydown', sprintKeyHandler);
            sprintKeyHandler = null;
        }

        sprintSecondsLeft = 60;
        sprintScore = 0;
        sprintStreak = 0;
        sprintMaxStreak = 0;
        sprintTotalQuestions = 0;
        sprintCorrectCount = 0;
        sprintCurrentProblem = null;

        // Populate HUD
        if (arenaHud && hudStatsGroup) {
            hudStatsGroup.innerHTML = `
                <span class="hud-badge sprint-timer-badge" id="hud-sprint-time"><i class="fas fa-stopwatch"></i> <span id="sprint-time-val">60s</span></span>
                <span class="hud-badge sprint-score-badge"><i class="fas fa-trophy" style="color:#f59e0b;"></i> <span id="sprint-score-val">0</span> pts</span>
                <span class="hud-badge streak-badge" id="hud-sprint-mult"><i class="fas fa-fire"></i> <span id="sprint-streak-val">0</span> (<span id="sprint-mult-val">×1.0</span>)</span>
                <span class="hud-badge"><i class="fas fa-check" style="color:#10b981;"></i> <span id="sprint-solved-val">0</span></span>
            `;
            arenaHud.classList.remove('hidden');
        }
        updateHUDXP();

        // Bind keyboard shortcuts 1, 2, 3, 4
        sprintKeyHandler = function(e) {
            if (arena.classList.contains('hidden')) return;
            let choiceIdx = -1;
            if (e.key === '1' || e.code === 'Digit1' || e.code === 'Numpad1') choiceIdx = 0;
            else if (e.key === '2' || e.code === 'Digit2' || e.code === 'Numpad2') choiceIdx = 1;
            else if (e.key === '3' || e.code === 'Digit3' || e.code === 'Numpad3') choiceIdx = 2;
            else if (e.key === '4' || e.code === 'Digit4' || e.code === 'Numpad4') choiceIdx = 3;

            if (choiceIdx >= 0) {
                e.preventDefault();
                selectSprintChoice(choiceIdx);
            }
        };
        document.addEventListener('keydown', sprintKeyHandler);

        // Start 60s countdown
        sprintTimer = setInterval(() => {
            sprintSecondsLeft--;
            updateSprintTimerUI();

            if (sprintSecondsLeft <= 0) {
                endSprintGame();
            }
        }, 1000);

        announce("Speed sprint started! 60 seconds on the clock. Press keys 1 through 4 or click an answer choice.");
        generateSprintProblem();
    }

    function updateSprintTimerUI() {
        const timeVal = document.getElementById('sprint-time-val');
        const badge = document.getElementById('hud-sprint-time');
        if (timeVal) timeVal.textContent = `${sprintSecondsLeft}s`;
        if (badge) {
            if (sprintSecondsLeft <= 10) {
                badge.classList.add('timer-urgent');
            } else {
                badge.classList.remove('timer-urgent');
            }
        }
    }

    function getSprintMultiplier() {
        if (sprintStreak >= 10) return 2.0;
        if (sprintStreak >= 5) return 1.5;
        return 1.0;
    }

    function generateSprintProblem() {
        let op = sprintOperation;
        if (op === 'mixed') {
            const ops = ['addition', 'subtraction', 'multiplication', 'division'];
            op = ops[Math.floor(Math.random() * ops.length)];
        }

        let n1, n2, symbol, ans;
        let maxRange = sprintDifficulty === 'rookie' ? 10 : sprintDifficulty === 'allstar' ? 25 : 100;

        if (op === 'addition') {
            symbol = '+';
            n1 = Math.floor(Math.random() * maxRange) + 1;
            n2 = Math.floor(Math.random() * maxRange) + 1;
            ans = n1 + n2;
        } else if (op === 'subtraction') {
            symbol = '-';
            n1 = Math.floor(Math.random() * maxRange) + 1;
            n2 = Math.floor(Math.random() * maxRange) + 1;
            if (n1 < n2) { const t = n1; n1 = n2; n2 = t; }
            ans = n1 - n2;
        } else if (op === 'multiplication') {
            symbol = '×';
            let multMax = sprintDifficulty === 'rookie' ? 6 : sprintDifficulty === 'allstar' ? 10 : 12;
            n1 = Math.floor(Math.random() * multMax) + 2;
            n2 = Math.floor(Math.random() * multMax) + 2;
            ans = n1 * n2;
        } else { // division
            symbol = '÷';
            let divMax = sprintDifficulty === 'rookie' ? 6 : sprintDifficulty === 'allstar' ? 10 : 12;
            n2 = Math.floor(Math.random() * divMax) + 2; // divisor
            ans = Math.floor(Math.random() * divMax) + 1; // quotient
            n1 = n2 * ans; // dividend
        }

        // Generate 3 unique distractors
        const choices = [ans];
        const distractorOffsets = [-1, 1, -2, 2, -10, 10, -5, 5];
        while (choices.length < 4) {
            let offset = distractorOffsets[Math.floor(Math.random() * distractorOffsets.length)];
            let candidate = ans + offset;
            if (candidate < 0) candidate = Math.abs(candidate) + 1;
            if (candidate === ans || choices.includes(candidate)) {
                candidate = ans + Math.floor(Math.random() * 15) - 7;
                if (candidate < 0) candidate = ans + choices.length + 2;
            }
            if (!choices.includes(candidate)) {
                choices.push(candidate);
            }
        }
        // Shuffle choices
        choices.sort(() => 0.5 - Math.random());

        sprintCurrentProblem = {
            n1, n2, symbol, ans, choices,
            answered: false
        };

        const problemText = `${n1} ${symbol} ${n2} = ?`;
        const ariaLabelText = `Problem: ${n1} ${symbol === '+' ? 'plus' : symbol === '-' ? 'minus' : symbol === '×' ? 'times' : 'divided by'} ${n2}`;

        let multFactor = getSprintMultiplier();
        let multBadgeText = multFactor > 1 ? `<div class="sprint-multiplier-pill">🔥 ×${multFactor.toFixed(1)} MULTIPLIER ACTIVE!</div>` : '';

        arenaContent.innerHTML = `
            <div class="sprint-container">
                <div class="sprint-problem-card">
                    ${multBadgeText}
                    <div class="sprint-equation" aria-label="${ariaLabelText}">${problemText}</div>
                </div>

                <div class="sprint-choices-grid" role="group" aria-label="Answer choices">
                    ${choices.map((choice, i) => `
                        <button type="button" class="sprint-choice-btn" id="sprint-choice-${i}" onclick="selectSprintChoice(${i})" aria-label="Choice ${i+1}: ${choice}">
                            <span class="sprint-key-tag">[${i+1}]</span>
                            <span class="sprint-choice-num">${choice}</span>
                        </button>
                    `).join('')}
                </div>

                <div id="sprint-feedback" class="sprint-feedback" aria-live="assertive"></div>
            </div>
        `;

        announce(`Problem: ${n1} ${symbol === '+' ? 'plus' : symbol === '-' ? 'minus' : symbol === '×' ? 'times' : 'divided by'} ${n2}`);
    }

    function selectSprintChoice(index) {
        if (!sprintCurrentProblem || sprintCurrentProblem.answered || sprintSecondsLeft <= 0) return;
        sprintCurrentProblem.answered = true;

        sprintTotalQuestions++;
        const chosen = sprintCurrentProblem.choices[index];
        const correct = sprintCurrentProblem.ans;
        const btn = document.getElementById(`sprint-choice-${index}`);
        const feedback = document.getElementById(`sprint-feedback`);

        if (chosen === correct) {
            sounds.match();
            sprintStreak++;
            sprintCorrectCount++;
            if (sprintStreak > sprintMaxStreak) sprintMaxStreak = sprintStreak;

            const mult = getSprintMultiplier();
            const earnedPoints = Math.round(100 * mult);
            sprintScore += earnedPoints;

            if (btn) btn.classList.add('choice-correct');

            if (sprintStreak === 5 || sprintStreak === 10) {
                sounds.streak();
            }

            if (feedback) {
                feedback.innerHTML = `<span class="sprint-pop-score">+${earnedPoints} pts! ${mult > 1 ? `(×${mult.toFixed(1)})` : ''}</span>`;
            }

            updateSprintHUD();
            recordMathSolved();

            setTimeout(() => {
                if (sprintSecondsLeft > 0) generateSprintProblem();
            }, 180);
        } else {
            sounds.wrong();
            sprintStreak = 0;
            if (btn) btn.classList.add('choice-wrong');

            // Also highlight the correct one
            const correctIdx = sprintCurrentProblem.choices.indexOf(correct);
            const correctBtn = document.getElementById(`sprint-choice-${correctIdx}`);
            if (correctBtn) correctBtn.classList.add('choice-correct');

            if (feedback) {
                feedback.innerHTML = `<span class="sprint-pop-wrong">Miss! Streak reset</span>`;
            }

            updateSprintHUD();

            setTimeout(() => {
                if (sprintSecondsLeft > 0) generateSprintProblem();
            }, 450);
        }
    }

    function updateSprintHUD() {
        const scoreEl = document.getElementById('sprint-score-val');
        const streakEl = document.getElementById('sprint-streak-val');
        const multEl = document.getElementById('sprint-mult-val');
        const solvedEl = document.getElementById('sprint-solved-val');
        const mult = getSprintMultiplier();

        if (scoreEl) scoreEl.textContent = sprintScore.toLocaleString();
        if (streakEl) streakEl.textContent = sprintStreak;
        if (multEl) multEl.textContent = `×${mult.toFixed(1)}`;
        if (solvedEl) solvedEl.textContent = `${sprintCorrectCount}/${sprintTotalQuestions}`;
    }

    function endSprintGame() {
        if (sprintTimer) {
            clearInterval(sprintTimer);
            sprintTimer = null;
        }
        if (sprintKeyHandler) {
            document.removeEventListener('keydown', sprintKeyHandler);
            sprintKeyHandler = null;
        }

        sounds.win();
        if (typeof window.triggerConfetti === 'function') {
            window.triggerConfetti();
        }

        recordGamePlayed();

        const scores = getGameScores();
        scores.sprint = scores.sprint || { highScore: 0, bestStreak: 0, totalRounds: 0, totalSolved: 0 };
        scores.sprint.totalRounds = (scores.sprint.totalRounds || 0) + 1;
        scores.sprint.totalSolved = (scores.sprint.totalSolved || 0) + sprintCorrectCount;

        let isNewHighScore = false;
        if (sprintScore > (scores.sprint.highScore || 0)) {
            scores.sprint.highScore = sprintScore;
            isNewHighScore = true;
        }

        if (sprintMaxStreak > (scores.sprint.bestStreak || 0)) {
            scores.sprint.bestStreak = sprintMaxStreak;
        }

        saveGameScores(scores);

        // Calculate XP
        let xpEarned = 40 + Math.min(110, Math.floor(sprintScore / 25));
        if (isNewHighScore && sprintScore > 0) xpEarned += 35;
        awardXP(xpEarned, "Sprint Championship");

        const accuracyPct = sprintTotalQuestions > 0 ? Math.round((sprintCorrectCount / sprintTotalQuestions) * 100) : 0;

        let stars = 1;
        if (sprintScore >= 2000 || sprintCorrectCount >= 18) stars = 3;
        else if (sprintScore >= 1000 || sprintCorrectCount >= 10) stars = 2;
        const starsHtml = '⭐'.repeat(stars) + '<span style="opacity:0.3;">' + '⭐'.repeat(3 - stars) + '</span>';

        announce(`Sprint Complete! Final score: ${sprintScore}. Accuracy: ${accuracyPct}%. XP earned: ${xpEarned}.`);

        arenaContent.innerHTML = `
            <div class="sprint-summary-overlay">
                <div class="win-stars">${starsHtml}</div>
                <h4 class="win-title" style="color:#f59e0b;">Time's Up! Sprint Complete!</h4>
                ${isNewHighScore && sprintScore > 0 ? `<div class="win-record-badge"><i class="fas fa-crown"></i> New All-Time High Score!</div>` : ''}

                <div class="sprint-score-banner">
                    <span class="sprint-score-banner-label">Final Score</span>
                    <span class="sprint-score-banner-val">${sprintScore.toLocaleString()} <span style="font-size:1.15rem;opacity:0.8;">pts</span></span>
                </div>

                <div class="win-stats-grid">
                    <div class="win-stat-box">
                        <div class="win-stat-label">Correct Answers</div>
                        <div class="win-stat-value">${sprintCorrectCount} / ${sprintTotalQuestions}</div>
                    </div>
                    <div class="win-stat-box">
                        <div class="win-stat-label">Accuracy</div>
                        <div class="win-stat-value">${accuracyPct}%</div>
                    </div>
                    <div class="win-stat-box">
                        <div class="win-stat-label">Max Streak</div>
                        <div class="win-stat-value">${sprintMaxStreak} 🔥</div>
                    </div>
                    <div class="win-stat-box">
                        <div class="win-stat-label">Best Record</div>
                        <div class="win-stat-value">${scores.sprint.highScore} pts</div>
                    </div>
                </div>

                <p style="margin-bottom: 1.25rem; font-weight: 700; color: #fcd34d;">
                    <i class="fas fa-bolt"></i> +${xpEarned} XP Earned!
                </p>

                <div style="display: flex; gap: 1rem; z-index: 20; justify-content: center; flex-wrap: wrap;">
                    <button onclick="showSprintSetup()" class="win-btn" style="background-color: var(--color-bg-elevated); color: var(--color-text-main);">Options Setup</button>
                    <button onclick="startSprintGame()" class="win-btn sprint-play-again-btn"><i class="fas fa-redo"></i> Play Again</button>
                </div>
            </div>
        `;

        setTimeout(() => {
            const btn = arenaContent.querySelector('.sprint-play-again-btn');
            if (btn) btn.focus();
        }, 100);
    }

    // ==========================================
    // --- GAME 4: WORD SCRAMBLE STUDIO ---
    // ==========================================
    const SCRAMBLE_WORDS = {
        easy: [
            { word: "SOLAR", definition: "Relating to or determined by the sun.", phonetics: "SOH-ler" },
            { word: "PLANT", definition: "A living organism that absorbs water and makes nutrients via photosynthesis.", phonetics: "PLANT" },
            { word: "EARTH", definition: "The planet on which we live; the third planet from the sun.", phonetics: "URTH" },
            { word: "WATER", definition: "A transparent, odorless liquid forming oceans, lakes, and rivers.", phonetics: "WAH-ter" },
            { word: "CLOUD", definition: "A visible mass of condensed water vapor floating in the atmosphere.", phonetics: "KLOUD" },
            { word: "LIGHT", definition: "The natural agent that stimulates sight and makes things visible.", phonetics: "LYT" },
            { word: "HEART", definition: "A hollow muscular organ that pumps blood through the body.", phonetics: "HART" },
            { word: "SPACE", definition: "The physical universe beyond the earth's atmosphere.", phonetics: "SPAYS" }
        ],
        medium: [
            { word: "ECLIPSE", definition: "An obscuring of light from one celestial body by another.", phonetics: "ih-KLIPS" },
            { word: "GRAVITY", definition: "The universal force of attraction acting between all matter.", phonetics: "GRAV-ih-tee" },
            { word: "PYRAMID", definition: "A monumental structure with a polygon base and triangular sloping sides.", phonetics: "PEER-uh-mid" },
            { word: "HORIZON", definition: "The line at which the earth's surface and the sky appear to meet.", phonetics: "huh-RY-zun" },
            { word: "VOLCANO", definition: "A rupture in the crust of a planet allowing hot lava and gas to escape.", phonetics: "vahl-KAY-noh" },
            { word: "HABITAT", definition: "The natural environment of an animal, plant, or organism.", phonetics: "HAB-ih-tat" },
            { word: "GLACIER", definition: "A slowly moving mass or river of ice formed by snow accumulation.", phonetics: "GLAY-sher" },
            { word: "FOSSIL", definition: "The preserved remains or traces of an ancient living organism.", phonetics: "FAH-sil" }
        ],
        hard: [
            { word: "ECOSYSTEM", definition: "A biological community of interacting organisms and their physical environment.", phonetics: "EE-koh-sis-tem" },
            { word: "METAPHOR", definition: "A figure of speech comparing two unlike things without 'like' or 'as'.", phonetics: "MET-uh-for" },
            { word: "SYMPHONY", definition: "An elaborate musical composition for full orchestra.", phonetics: "SIM-fuh-nee" },
            { word: "VELOCITY", definition: "The speed of something moving in a given direction.", phonetics: "vuh-LAHS-ih-tee" },
            { word: "CATALYST", definition: "A substance that increases the rate of a chemical reaction.", phonetics: "KAT-uh-list" },
            { word: "NARRATIVE", definition: "A spoken or written account of connected events; a story.", phonetics: "NAIR-uh-tiv" },
            { word: "PARADOX", definition: "A seemingly self-contradictory statement that may prove to be true.", phonetics: "PAIR-uh-doks" },
            { word: "HYPOTHESIS", definition: "A proposed explanation made as a starting point for scientific testing.", phonetics: "hy-PAHTH-uh-sis" }
        ]
    };

    function showScrambleSetup() {
        if (scrambleKeyHandler) {
            document.removeEventListener('keydown', scrambleKeyHandler);
            scrambleKeyHandler = null;
        }
        if (arenaHud) arenaHud.classList.add('hidden');
        arenaTitle.textContent = "Word Scramble Studio - Options";
        arenaDialog.classList.remove('wide');

        const scores = getGameScores();
        const bestStreak = (scores.scramble && scores.scramble.bestStreak) || 0;
        const totalSolved = (scores.scramble && scores.scramble.totalSolved) || 0;

        arenaContent.innerHTML = `
            <div class="game-setup-content">
                <p class="setup-desc">
                    Unscramble vocabulary words letter-by-letter! Learn word origins, definitions, and phonetics with keyboard-friendly controls and audio feedback.
                </p>

                <div class="setup-group">
                    <label class="setup-label">Difficulty / Vocabulary Tier:</label>
                    <div class="setup-options-row">
                        <button onclick="setScrambleDifficulty('easy', this)" class="setup-opt-btn ${scrambleDifficulty === 'easy' ? 'active' : ''}">
                            <i class="fas fa-seedling"></i> Elementary (4-5 Letters)
                        </button>
                        <button onclick="setScrambleDifficulty('medium', this)" class="setup-opt-btn ${scrambleDifficulty === 'medium' ? 'active' : ''}">
                            <i class="fas fa-tree"></i> Middle School (6-7 Letters)
                        </button>
                        <button onclick="setScrambleDifficulty('hard', this)" class="setup-opt-btn ${scrambleDifficulty === 'hard' ? 'active' : ''}">
                            <i class="fas fa-mountain"></i> High School (8-10 Letters)
                        </button>
                    </div>
                </div>

                <div class="setup-group">
                    <label class="setup-label">Audio Pronunciation:</label>
                    <div class="setup-options-row">
                        <button onclick="setScrambleAutoSpeak(true, this)" class="setup-opt-btn ${scrambleAutoSpeak ? 'active' : ''}">
                            <i class="fas fa-volume-up"></i> Auto-Speak Words
                        </button>
                        <button onclick="setScrambleAutoSpeak(false, this)" class="setup-opt-btn ${!scrambleAutoSpeak ? 'active' : ''}">
                            <i class="fas fa-volume-mute"></i> Silent Mode
                        </button>
                    </div>
                </div>

                <div class="setup-stats-preview">
                    <span><i class="fas fa-fire" style="color:#f59e0b;"></i> Best Streak: <strong>${bestStreak}</strong></span>
                    <span><i class="fas fa-spell-check" style="color:#8b5cf6;"></i> Total Words Solved: <strong>${totalSolved}</strong></span>
                </div>

                <div style="display:flex; justify-content:flex-end; margin-top:1.5rem;">
                    <button onclick="startScrambleGame()" class="setup-start-btn" id="start-scramble-btn">
                        <i class="fas fa-play"></i> Start Scramble
                    </button>
                </div>
            </div>
        `;

        setTimeout(() => {
            const btn = document.getElementById('start-scramble-btn');
            if (btn) btn.focus();
        }, 100);
    }

    function setScrambleDifficulty(diff, btn) {
        scrambleDifficulty = diff;
        btn.parentElement.querySelectorAll('.setup-opt-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        sounds.click();
    }

    function setScrambleAutoSpeak(val, btn) {
        scrambleAutoSpeak = val;
        btn.parentElement.querySelectorAll('.setup-opt-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        sounds.click();
    }

    function startScrambleGame() {
        arenaTitle.textContent = "Word Scramble Studio";
        arenaDialog.classList.remove('wide');
        scrambleStreak = 0;

        if (arenaHud && hudStatsGroup) {
            hudStatsGroup.innerHTML = `
                <span class="hud-badge streak-badge" id="hud-scramble-streak"><i class="fas fa-fire"></i> <span id="scramble-streak-num">0</span> Streak</span>
                <span class="hud-badge"><i class="fas fa-spell-check" style="color:#8b5cf6;"></i> Tier: <strong style="text-transform:capitalize;">${scrambleDifficulty}</strong></span>
            `;
            arenaHud.classList.remove('hidden');
        }
        updateHUDXP();

        // Keyboard handler for typing letters, backspace, and enter
        if (scrambleKeyHandler) document.removeEventListener('keydown', scrambleKeyHandler);
        scrambleKeyHandler = function(e) {
            if (arena.classList.contains('hidden')) return;
            if (document.activeElement && (document.activeElement.tagName === 'INPUT' || document.activeElement.tagName === 'TEXTAREA')) return;

            const key = e.key.toUpperCase();
            if (key >= 'A' && key <= 'Z' && key.length === 1) {
                // Find first unplaced matching tile
                if (!scrambleCurrentWordObj) return;
                const pool = scrambleCurrentWordObj.scrambled;
                for (let i = 0; i < pool.length; i++) {
                    if (pool[i] === key && !scramblePlacedIndices.includes(i)) {
                        handleScrambleLetterClick(i);
                        break;
                    }
                }
            } else if (e.key === 'Backspace') {
                handleScrambleBackspace();
            } else if (e.key === 'Enter') {
                handleScrambleCheck();
            }
        };
        document.addEventListener('keydown', scrambleKeyHandler);

        generateScrambleWord();
    }

    function generateScrambleWord() {
        const words = SCRAMBLE_WORDS[scrambleDifficulty] || SCRAMBLE_WORDS.medium;
        const chosen = words[Math.floor(Math.random() * words.length)];

        // Scramble letters ensuring it's not identical to the target
        let letters = chosen.word.split('');
        let scrambled = [...letters];
        let attempts = 0;
        while (attempts < 10 && scrambled.join('') === chosen.word) {
            scrambled.sort(() => Math.random() - 0.5);
            attempts++;
        }

        scrambleCurrentWordObj = {
            target: chosen.word,
            definition: chosen.definition,
            phonetics: chosen.phonetics,
            scrambled: scrambled
        };
        scramblePlacedIndices = [];

        renderScrambleUI();

        if (scrambleAutoSpeak) {
            speakCurrentWord();
        }
        announce(`New word loaded. ${chosen.word.length} letters. Definition: ${chosen.definition}`);
    }

    function renderScrambleUI() {
        if (!scrambleCurrentWordObj) return;
        const target = scrambleCurrentWordObj.target;
        const scrambled = scrambleCurrentWordObj.scrambled;

        // Build slots
        let slotsHtml = '';
        for (let i = 0; i < target.length; i++) {
            if (i < scramblePlacedIndices.length) {
                const placedIdx = scramblePlacedIndices[i];
                const letter = scrambled[placedIdx];
                slotsHtml += `<div class="scramble-slot" aria-label="Position ${i+1}: ${letter}">${letter}</div>`;
            } else {
                slotsHtml += `<div class="scramble-slot" aria-label="Position ${i+1}: empty"></div>`;
            }
        }

        // Build letter buttons pool
        let tilesHtml = '';
        for (let i = 0; i < scrambled.length; i++) {
            const isUsed = scramblePlacedIndices.includes(i);
            tilesHtml += `
                <button onclick="handleScrambleLetterClick(${i})" 
                        class="scramble-letter-btn" 
                        ${isUsed ? 'disabled aria-disabled="true"' : ''}
                        aria-label="Letter ${scrambled[i]}">
                    ${scrambled[i]}
                </button>
            `;
        }

        arenaContent.innerHTML = `
            <div class="scramble-container">
                <div class="scramble-hint-box">
                    <div class="scramble-hint-label"><i class="fas fa-book-open"></i> Clue &amp; Definition</div>
                    <div class="scramble-hint-text">${scrambleCurrentWordObj.definition}</div>
                    <div style="margin-top: 0.5rem; font-size: 0.85rem; color: var(--color-text-muted);">
                        <i class="fas fa-volume-up"></i> Phonetics: <em>${scrambleCurrentWordObj.phonetics}</em>
                    </div>
                </div>

                <div class="scramble-slots-row" role="region" aria-label="Word slots">
                    ${slotsHtml}
                </div>

                <div class="scramble-tiles-pool" role="region" aria-label="Scrambled letter choices">
                    ${tilesHtml}
                </div>

                <div class="scramble-actions">
                    <button onclick="speakCurrentWord()" class="win-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);" aria-label="Pronounce word aloud">
                        <i class="fas fa-volume-up"></i> Pronounce
                    </button>
                    <button onclick="handleScrambleHint()" class="win-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);" aria-label="Reveal hint letter">
                        <i class="fas fa-lightbulb" style="color:#f59e0b;"></i> Hint
                    </button>
                    <button onclick="handleScrambleBackspace()" class="win-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);" aria-label="Remove last letter">
                        <i class="fas fa-backspace"></i> Backspace
                    </button>
                    <button onclick="handleScrambleReset()" class="win-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);" aria-label="Clear all placed letters">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button onclick="handleScrambleCheck()" class="win-btn" style="background:linear-gradient(135deg, #7c3aed, #6d28d9); color:white;" aria-label="Check your answer">
                        <i class="fas fa-check"></i> Check Answer
                    </button>
                </div>
            </div>
        `;
    }

    function handleScrambleLetterClick(index) {
        if (!scrambleCurrentWordObj) return;
        if (scramblePlacedIndices.includes(index)) return;
        if (scramblePlacedIndices.length >= scrambleCurrentWordObj.target.length) return;

        scramblePlacedIndices.push(index);
        sounds.click();
        renderScrambleUI();

        if (scramblePlacedIndices.length === scrambleCurrentWordObj.target.length) {
            setTimeout(handleScrambleCheck, 250);
        }
    }

    function handleScrambleBackspace() {
        if (scramblePlacedIndices.length > 0) {
            scramblePlacedIndices.pop();
            sounds.click();
            renderScrambleUI();
        }
    }

    function handleScrambleReset() {
        if (scramblePlacedIndices.length > 0) {
            scramblePlacedIndices = [];
            sounds.click();
            renderScrambleUI();
        }
    }

    function handleScrambleHint() {
        if (!scrambleCurrentWordObj) return;
        const target = scrambleCurrentWordObj.target;
        const nextPos = scramblePlacedIndices.length;
        if (nextPos >= target.length) return;

        const neededLetter = target[nextPos];
        const pool = scrambleCurrentWordObj.scrambled;

        for (let i = 0; i < pool.length; i++) {
            if (pool[i] === neededLetter && !scramblePlacedIndices.includes(i)) {
                scramblePlacedIndices.push(i);
                sounds.streak();
                renderScrambleUI();
                announce(`Hint placed letter ${neededLetter}`);
                break;
            }
        }
    }

    function speakCurrentWord() {
        if (!scrambleCurrentWordObj || !('speechSynthesis' in window)) return;
        window.speechSynthesis.cancel();
        const utter = new SpeechSynthesisUtterance(scrambleCurrentWordObj.target.toLowerCase());
        utter.rate = 0.85;
        window.speechSynthesis.speak(utter);
    }

    function handleScrambleCheck() {
        if (!scrambleCurrentWordObj) return;
        const target = scrambleCurrentWordObj.target;
        const scrambled = scrambleCurrentWordObj.scrambled;
        const formed = scramblePlacedIndices.map(i => scrambled[i]).join('');

        if (formed.length < target.length) {
            announce("Please place all letters before checking.");
            return;
        }

        if (formed === target) {
            sounds.match();
            scrambleStreak++;
            if (scrambleStreak >= 3) sounds.streak();

            const scores = getGameScores();
            scores.scramble = scores.scramble || { bestStreak: 0, totalSolved: 0 };
            scores.scramble.totalSolved = (scores.scramble.totalSolved || 0) + 1;
            if (scrambleStreak > (scores.scramble.bestStreak || 0)) {
                scores.scramble.bestStreak = scrambleStreak;
            }
            saveGameScores(scores);
            recordGamePlayed();

            let xpEarned = 25;
            if (scrambleStreak >= 3) xpEarned += 10;
            awardXP(xpEarned, "Word Unscrambled");

            try {
                let dq = JSON.parse(localStorage.getItem('hl_daily_quests') || '{}');
                dq.ela = (dq.ela || 0) + 1;
                localStorage.setItem('hl_daily_quests', JSON.stringify(dq));
                window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_daily_quests' } }));
            } catch (e) {}

            announce(`Brilliant! You correctly unscrambled ${target}! +${xpEarned} XP!`);

            arenaContent.innerHTML = `
                <div class="sprint-summary-overlay" style="padding:2rem;">
                    <div class="win-stars">⭐⭐⭐</div>
                    <h3 class="win-title" style="color:#8b5cf6;">Splendid! Word Solved!</h3>
                    <div style="font-size: 2.2rem; font-weight: 900; letter-spacing: 0.1em; color: #a78bfa; margin-bottom: 0.5rem;">
                        ${target}
                    </div>
                    <p style="font-size: 1rem; color: var(--color-text-main); margin-bottom: 1.25rem;">
                        ${scrambleCurrentWordObj.definition}
                    </p>
                    <div class="win-record-badge" style="background:rgba(139, 92, 246, 0.2); color:#c4b5fd; margin-bottom: 1.5rem;">
                        <i class="fas fa-fire"></i> Streak: ${scrambleStreak} 🔥 • +${xpEarned} XP Earned
                    </div>
                    <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                        <button onclick="showScrambleSetup()" class="win-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);">Change Tier</button>
                        <button onclick="generateScrambleWord()" class="win-btn" id="scramble-next-btn" style="background:linear-gradient(135deg, #7c3aed, #6d28d9); color:white;">
                            Next Word <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            `;

            setTimeout(() => {
                const btn = document.getElementById('scramble-next-btn');
                if (btn) btn.focus();
            }, 100);

            const streakNum = document.getElementById('scramble-streak-num');
            if (streakNum) streakNum.textContent = scrambleStreak;
        } else {
            sounds.wrong();
            scrambleStreak = 0;
            const streakNum = document.getElementById('scramble-streak-num');
            if (streakNum) streakNum.textContent = '0';
            announce(`Not quite yet. Let's rearrange the letters and try again!`);
            handleScrambleReset();
        }
    }


    // ==========================================
    // --- GAME 5: GRAMMAR DETECTIVE ---
    // ==========================================
    const GRAMMAR_CASES = [
        {
            caseNum: "CASE #101",
            category: "agreement",
            categoryLabel: "Subject-Verb Agreement",
            title: "The Soloist Conundrum",
            scenario: "Examine the witness statement below. Identify the verb that agrees with the singular compound subject.",
            sentence: "Neither the conductor nor the soloist [ ______ ] ready to begin the overture.",
            options: [
                "were",
                "was",
                "are",
                "have been"
            ],
            correctIndex: 1,
            explanation: "When subjects are joined by 'neither... nor', the verb agrees with the subject closest to it ('the soloist', which is singular). Hence, 'was' is grammatically correct."
        },
        {
            caseNum: "CASE #102",
            category: "homophones",
            categoryLabel: "Homophones & Word Choice",
            title: "The Locker Room Mystery",
            scenario: "A clue was left on the locker room bulletin board. Which word denotes belonging and possession?",
            sentence: "The students remembered that [ ______ ] science projects were due before noon.",
            options: [
                "there",
                "their",
                "they're",
                "thier"
            ],
            correctIndex: 1,
            explanation: "'Their' is the possessive pronoun indicating ownership. 'There' refers to a location, and 'they're' is the contraction for 'they are'."
        },
        {
            caseNum: "CASE #103",
            category: "punctuation",
            categoryLabel: "Comma Splice & Run-On",
            title: "The Midnight Train Alibi",
            scenario: "Two independent clauses were glued together with only a comma. Choose the properly connected revision.",
            sentence: "The thunderstorm knocked down telephone poles, the express train was delayed.",
            options: [
                "The thunderstorm knocked down telephone poles, so the express train was delayed.",
                "The thunderstorm knocked down telephone poles the express train was delayed.",
                "The thunderstorm knocked down telephone poles; and the express train was delayed.",
                "The thunderstorm knocked down telephone poles, however the express train was delayed."
            ],
            correctIndex: 0,
            explanation: "A comma alone cannot join two complete independent clauses without a coordinating conjunction (FANBOYS: for, and, nor, but, or, yet, so). Adding 'so' fixes the comma splice."
        },
        {
            caseNum: "CASE #104",
            category: "verbs",
            categoryLabel: "Irregular Verbs & Tenses",
            title: "The Stolen Symphony",
            scenario: "Examine the timeline of events. Which past participle follows the auxiliary verb 'had'?",
            sentence: "Before the curtain fell, the soprano had [ ______ ] the final aria with perfection.",
            options: [
                "sang",
                "sung",
                "singed",
                "sing"
            ],
            correctIndex: 1,
            explanation: "With auxiliary verbs like 'had' or 'have' (past perfect), English requires the past participle form: sing (present), sang (simple past), sung (past participle)."
        },
        {
            caseNum: "CASE #105",
            category: "punctuation",
            categoryLabel: "Apostrophes & Possessives",
            title: "The Secret Garden Key",
            scenario: "Whose footprints lead toward the conservatory? Choose the correct plural possessive form.",
            sentence: "The three [ ______ ] footprints were clearly visible in the morning dew.",
            options: [
                "detective's",
                "detectives'",
                "detectives",
                "detectives's"
            ],
            correctIndex: 1,
            explanation: "For a regular plural noun ending in 's' ('detectives'), make it possessive by adding an apostrophe at the end: 'detectives''."
        },
        {
            caseNum: "CASE #106",
            category: "capitalization",
            categoryLabel: "Capitalization & Proper Nouns",
            title: "The Diplomatic Dispatch",
            scenario: "Inspect the dispatch for capitalization integrity. Which statement is punctuated with 100% precision?",
            sentence: "Select the sentence with accurate capitalization of geographic features and formal titles.",
            options: [
                "Last Summer, mayor Adams crossed the mississippi river.",
                "Last summer, Mayor Adams crossed the Mississippi River.",
                "Last summer, mayor Adams crossed the Mississippi river.",
                "Last Summer, Mayor adams crossed the Mississippi River."
            ],
            correctIndex: 1,
            explanation: "Formal titles preceding a personal name ('Mayor Adams') and specific geographic names ('Mississippi River') are capitalized. Seasons ('summer') are lowercase unless in a title."
        },
        {
            caseNum: "CASE #107",
            category: "agreement",
            categoryLabel: "Pronoun Case & Function",
            title: "The Museum Heist",
            scenario: "The security report must use the correct objective pronoun case following a preposition.",
            sentence: "The curator handed the restored artifacts to Officer Jackson and [ ______ ].",
            options: [
                "I",
                "me",
                "myself",
                "he"
            ],
            correctIndex: 1,
            explanation: "The pronoun serves as an object of the preposition 'to'. If you isolate the pronoun: 'handed the artifacts to me' (not 'to I')."
        }
    ];

    function showGrammarSetup() {
        if (arenaHud) arenaHud.classList.add('hidden');
        arenaTitle.textContent = "Grammar Detective - Case File Setup";
        arenaDialog.classList.remove('wide');

        const scores = getGameScores();
        const casesSolved = (scores.grammar && scores.grammar.casesSolved) || 0;
        const bestStreak = (scores.grammar && scores.grammar.bestStreak) || 0;

        arenaContent.innerHTML = `
            <div class="game-setup-content">
                <p class="setup-desc">
                    Step into the shoes of an investigative editor! Crack grammatical mysteries by solving subject-verb agreement, homophones, comma splices, and punctuation cases.
                </p>

                <div class="setup-group">
                    <label class="setup-label">Case Investigation Category:</label>
                    <div class="setup-options-row">
                        <button onclick="setGrammarCategory('all', this)" class="setup-opt-btn ${grammarCategory === 'all' ? 'active' : ''}">
                            <i class="fas fa-folder-open"></i> All Case Files
                        </button>
                        <button onclick="setGrammarCategory('agreement', this)" class="setup-opt-btn ${grammarCategory === 'agreement' ? 'active' : ''}">
                            <i class="fas fa-check-double"></i> Subject-Verb Agreement
                        </button>
                        <button onclick="setGrammarCategory('homophones', this)" class="setup-opt-btn ${grammarCategory === 'homophones' ? 'active' : ''}">
                            <i class="fas fa-pen-fancy"></i> Homophones &amp; Words
                        </button>
                        <button onclick="setGrammarCategory('punctuation', this)" class="setup-opt-btn ${grammarCategory === 'punctuation' ? 'active' : ''}">
                            <i class="fas fa-quote-right"></i> Punctuation &amp; Run-Ons
                        </button>
                    </div>
                </div>

                <div class="setup-stats-preview">
                    <span><i class="fas fa-shield-alt" style="color:#0d9488;"></i> Cases Solved: <strong>${casesSolved}</strong></span>
                    <span><i class="fas fa-fire" style="color:#f59e0b;"></i> Detective Streak: <strong>${bestStreak}</strong></span>
                </div>

                <div style="display:flex; justify-content:flex-end; margin-top:1.5rem;">
                    <button onclick="startGrammarGame()" class="setup-start-btn" id="start-grammar-btn" style="background:linear-gradient(135deg, #0d9488, #0f766e);">
                        <i class="fas fa-search"></i> Open Case File
                    </button>
                </div>
            </div>
        `;

        setTimeout(() => {
            const btn = document.getElementById('start-grammar-btn');
            if (btn) btn.focus();
        }, 100);
    }

    function setGrammarCategory(cat, btn) {
        grammarCategory = cat;
        btn.parentElement.querySelectorAll('.setup-opt-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        sounds.click();
    }

    function startGrammarGame() {
        arenaTitle.textContent = "Grammar Detective";
        arenaDialog.classList.add('wide');
        grammarStreak = 0;

        if (arenaHud && hudStatsGroup) {
            hudStatsGroup.innerHTML = `
                <span class="hud-badge streak-badge" id="hud-grammar-streak"><i class="fas fa-fire"></i> <span id="grammar-streak-num">0</span> Streak</span>
                <span class="hud-badge"><i class="fas fa-user-secret" style="color:#0d9488;"></i> Investigator Rank: <strong>Inspector</strong></span>
            `;
            arenaHud.classList.remove('hidden');
        }
        updateHUDXP();

        loadNextGrammarCase();
    }

    function loadNextGrammarCase() {
        let pool = GRAMMAR_CASES;
        if (grammarCategory !== 'all') {
            pool = GRAMMAR_CASES.filter(c => c.category === grammarCategory);
            if (pool.length === 0) pool = GRAMMAR_CASES;
        }

        grammarCurrentCase = pool[Math.floor(Math.random() * pool.length)];

        let optionsHtml = '';
        grammarCurrentCase.options.forEach((opt, idx) => {
            optionsHtml += `
                <button onclick="handleGrammarAnswer(${idx})" class="grammar-opt-btn" aria-label="Option ${idx + 1}: ${opt}">
                    <span style="display:inline-flex; align-items:center; justify-content:center; width:2rem; height:2rem; border-radius:50%; background:var(--color-bg-elevated); font-weight:800; font-size:0.85rem; border:1px solid var(--color-border);">${String.fromCharCode(65 + idx)}</span>
                    <span>${opt}</span>
                </button>
            `;
        });

        arenaContent.innerHTML = `
            <div class="grammar-case-container">
                <div class="grammar-case-header">
                    <span class="grammar-case-badge">
                        <i class="fas fa-fingerprint"></i> ${grammarCurrentCase.caseNum}: ${grammarCurrentCase.title}
                    </span>
                    <span class="games-tag tag-teal" style="margin-bottom:0;">
                        ${grammarCurrentCase.categoryLabel}
                    </span>
                </div>

                <p style="font-size:0.95rem; color:var(--color-text-muted); margin:0;">
                    <i class="fas fa-info-circle"></i> ${grammarCurrentCase.scenario}
                </p>

                <div class="grammar-sentence-card" role="region" aria-label="Mystery Sentence">
                    "${grammarCurrentCase.sentence}"
                </div>

                <div class="grammar-options-grid" role="group" aria-label="Available solutions">
                    ${optionsHtml}
                </div>

                <div id="grammar-result-area" class="hidden"></div>
            </div>
        `;

        announce(`Case loaded: ${grammarCurrentCase.title}. ${grammarCurrentCase.scenario}`);
    }

    function handleGrammarAnswer(selectedIndex) {
        if (!grammarCurrentCase) return;
        const isCorrect = selectedIndex === grammarCurrentCase.correctIndex;
        const resultArea = document.getElementById('grammar-result-area');
        if (!resultArea) return;

        arenaContent.querySelectorAll('.grammar-opt-btn').forEach((btn, idx) => {
            btn.disabled = true;
            if (idx === grammarCurrentCase.correctIndex) {
                btn.style.borderColor = '#10b981';
                btn.style.background = 'rgba(16, 185, 129, 0.15)';
            } else if (idx === selectedIndex && !isCorrect) {
                btn.style.borderColor = '#ef4444';
                btn.style.background = 'rgba(239, 68, 68, 0.15)';
            }
        });

        if (isCorrect) {
            sounds.match();
            grammarStreak++;
            if (grammarStreak >= 3) sounds.streak();

            const scores = getGameScores();
            scores.grammar = scores.grammar || { bestStreak: 0, casesSolved: 0 };
            scores.grammar.casesSolved = (scores.grammar.casesSolved || 0) + 1;
            if (grammarStreak > (scores.grammar.bestStreak || 0)) {
                scores.grammar.bestStreak = grammarStreak;
            }
            saveGameScores(scores);
            recordGamePlayed();

            let xpEarned = 30;
            if (grammarStreak >= 3) xpEarned += 15;
            awardXP(xpEarned, "Case Solved");

            try {
                let dq = JSON.parse(localStorage.getItem('hl_daily_quests') || '{}');
                dq.ela = (dq.ela || 0) + 1;
                localStorage.setItem('hl_daily_quests', JSON.stringify(dq));
                window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_daily_quests' } }));
            } catch (e) {}

            resultArea.className = 'grammar-explanation-box';
            resultArea.innerHTML = `
                <div style="display:flex; align-items:center; gap:0.5rem; color:#10b981; font-weight:800; font-size:1.1rem; margin-bottom:0.4rem;">
                    <i class="fas fa-check-circle"></i> Case Solved! +${xpEarned} XP
                </div>
                <p style="margin-bottom:0.75rem;">${grammarCurrentCase.explanation}</p>
                <div style="display:flex; justify-content:flex-end;">
                    <button onclick="loadNextGrammarCase()" class="win-btn" id="grammar-next-btn" style="background:linear-gradient(135deg, #0d9488, #0f766e); color:white;">
                        Next Case <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            `;
            announce(`Case Solved! ${grammarCurrentCase.explanation}`);
        } else {
            sounds.wrong();
            grammarStreak = 0;

            resultArea.className = 'grammar-explanation-box';
            resultArea.style.borderColor = 'rgba(239, 68, 68, 0.4)';
            resultArea.style.background = 'rgba(239, 68, 68, 0.08)';
            resultArea.innerHTML = `
                <div style="display:flex; align-items:center; gap:0.5rem; color:#ef4444; font-weight:800; font-size:1.1rem; margin-bottom:0.4rem;">
                    <i class="fas fa-times-circle"></i> Clue Missed!
                </div>
                <p style="margin-bottom:0.75rem;">${grammarCurrentCase.explanation}</p>
                <div style="display:flex; justify-content:flex-end;">
                    <button onclick="loadNextGrammarCase()" class="win-btn" id="grammar-next-btn" style="background:var(--color-bg-base); color:var(--color-text-main); border:1px solid var(--color-border);">
                        Next Case <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            `;
            announce(`Clue Missed! Correct answer was option ${String.fromCharCode(65 + grammarCurrentCase.correctIndex)}. ${grammarCurrentCase.explanation}`);
        }

        const streakNum = document.getElementById('grammar-streak-num');
        if (streakNum) streakNum.textContent = grammarStreak;

        setTimeout(() => {
            const nextBtn = document.getElementById('grammar-next-btn');
            if (nextBtn) nextBtn.focus();
        }, 100);
    }

    // --- Page Initialization ---
    document.addEventListener('DOMContentLoaded', () => {
        updateGamesSummary();
        checkDailyGameQuest();
        updateHUDXP();
    });
</script>

<?php include '../src/footer.php'; ?>