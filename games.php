<?php
$pageTitle = "Hesten's Learning - Games Hub";
include 'src/header.php';
?>

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

        <!-- Active Game Container -->
        <div id="game-arena" class="game-arena hidden">

            <!-- Game Header -->
            <div class="game-arena-header">
                <h3 id="arena-title" class="arena-title">Game Title</h3>
                <button onclick="closeGame()" class="arena-close-btn">
                    <i class="fas fa-times"></i> Exit Game
                </button>
            </div>

            <!-- Game Canvas/Area -->
            <div id="arena-content" class="arena-content">
                <!-- Game content injected here via JS -->
            </div>

            <!-- ARIA Live Region for Screen Readers -->
            <div id="game-announcer" class="sr-only" aria-live="assertive" aria-atomic="true"></div>
        </div>

    </section>

</main>

<!-- GAME LOGIC SCRIPT -->
<script>
    // --- Sound Engine (Web Audio API) ---
    // Generates simple tones so no external mp3 files are needed
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

    // --- Game Logic ---
    const arena = document.getElementById('game-arena');
    const arenaTitle = document.getElementById('arena-title');
    const arenaContent = document.getElementById('arena-content');

    function loadGame(gameType) {
        arena.classList.remove('hidden');
        arena.scrollIntoView({ behavior: 'smooth' });

        if (gameType === 'memory') startMemoryGame();
        if (gameType === 'math') startMathGame();
    }

    function closeGame() {
        arena.classList.add('hidden');
        announce("Game closed.");
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // --- GAME 1: MEMORY MATCH ---
    function startMemoryGame() {
        arenaTitle.textContent = "Memory Match";
        announce("Memory Match started. Grid is 4 by 4. Use arrow keys to navigate, Enter to flip cards.");

        const icons = ['star', 'heart', 'bolt', 'moon', 'cloud', 'sun', 'snowflake', 'leaf'];
        // Duplicate and shuffle
        let cards = [...icons, ...icons].sort(() => 0.5 - Math.random());

        let gridHtml = `<div class="memory-grid" role="grid" aria-label="Memory Game Board">`;
        cards.forEach((icon, index) => {
            gridHtml += `
                <button id="card-${index}" class="memory-card state-hidden" 
                    onclick="flipCard(${index}, '${icon}')" 
                    aria-label="Card ${index + 1}, hidden">
                    <div class="memory-card-inner">
                        <i class="fas fa-question icon-hidden"></i>
                    </div>
                </button>
            `;
        });
        gridHtml += `</div><div class="memory-controls"><button onclick="startMemoryGame()" class="memory-restart-btn">Restart Game</button></div>`;

        arenaContent.innerHTML = gridHtml;

        // Focus first card
        setTimeout(() => {
            const firstCard = document.getElementById('card-0');
            if (firstCard) firstCard.focus();
        }, 100);

        // Reset Game State
        flippedCards = [];
        matchedPairs = 0;
        totalPairs = icons.length;
    }

    let flippedCards = [];
    let matchedPairs = 0;
    let totalPairs = 8;
    let isProcessing = false;

    function flipCard(index, icon) {
        if (isProcessing) return;
        const btn = document.getElementById(`card-${index}`);

        // Ignore if already matched or flipped
        if (btn.classList.contains('state-matched') || btn.classList.contains('state-flipped')) return;

        sounds.click();

        // Visual Flip
        btn.classList.remove('state-hidden');
        btn.classList.add('state-flipped');
        btn.querySelector('.memory-card-inner').innerHTML = `<i class="fas fa-${icon}"></i>`;
        btn.setAttribute('aria-label', `Card ${index + 1}, ${icon}`);
        announce(`${icon}`);

        flippedCards.push({ index, icon });

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
            // Match!
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
                checkWin();
                isProcessing = false;
                flippedCards = [];
            }, 500);
        } else {
            // No Match
            sounds.wrong();
            announce("No match.");
            setTimeout(() => {
                // Reset Card 1
                btn1.classList.remove('state-flipped');
                btn1.classList.add('state-hidden');
                btn1.querySelector('.memory-card-inner').innerHTML = `<i class="fas fa-question icon-hidden"></i>`;
                btn1.setAttribute('aria-label', `Card ${c1.index + 1}, hidden`);

                // Reset Card 2
                btn2.classList.remove('state-flipped');
                btn2.classList.add('state-hidden');
                btn2.querySelector('.memory-card-inner').innerHTML = `<i class="fas fa-question icon-hidden"></i>`;
                btn2.setAttribute('aria-label', `Card ${c2.index + 1}, hidden`);

                isProcessing = false;
                flippedCards = [];
            }, 1000); // Longer delay so they can see the mismatch
        }
    }

    function checkWin() {
        if (matchedPairs === totalPairs) {
            sounds.win();
            announce("Congratulations! You found all pairs.");
            arenaContent.innerHTML += `
                <div class="memory-win-overlay">
                    <h4 class="win-title">Victory!</h4>
                    <p class="win-text">You cleared the board!</p>
                    <button onclick="startMemoryGame()" class="win-btn">Play Again</button>
                </div>
            `;
            // Trap focus in Play Again
            setTimeout(() => {
                const playAgainBtn = arenaContent.querySelector('.win-btn');
                if (playAgainBtn) playAgainBtn.focus();
            }, 100);
        }
    }


    // --- GAME 2: MATH MASTER ---
    let currentAnswer = 0;

    function startMathGame() {
        arenaTitle.textContent = "Math Master";
        announce("Math Master started. Type the correct answer and press Enter or click Submit.");
        generateMathProblem();
    }

    function generateMathProblem() {
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;
        const isAddition = Math.random() > 0.5;

        currentAnswer = isAddition ? num1 + num2 : num1 * num2;
        const symbol = isAddition ? '+' : '×';
        const problemText = `${num1} ${symbol} ${num2}`;

        arenaContent.innerHTML = `
            <div class="math-container">
                <div class="math-problem-box">
                    <span class="math-problem-text" aria-label="Problem: ${num1} ${isAddition ? 'plus' : 'times'} ${num2}">${problemText}</span>
                </div>
                
                <div class="math-input-group">
                    <input type="number" id="math-input" class="math-input" placeholder="?" aria-label="Enter your answer">
                    <button onclick="checkMathAnswer()" class="math-submit-btn">Submit</button>
                </div>
                
                <p id="math-feedback" class="math-feedback" aria-live="polite"></p>
            </div>
        `;

        const input = document.getElementById('math-input');
        if (input) {
            input.focus();
            input.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') checkMathAnswer();
            });
        }

        // Speak the new problem
        announce(`New problem: ${num1} ${isAddition ? 'plus' : 'times'} ${num2}`);
    }

    function checkMathAnswer() {
        const input = document.getElementById('math-input');
        const feedback = document.getElementById('math-feedback');
        const userVal = parseInt(input.value);

        if (isNaN(userVal)) {
            feedback.textContent = "Please enter a number.";
            feedback.className = "math-feedback feedback-warn";
            return;
        }

        if (userVal === currentAnswer) {
            sounds.match();
            feedback.textContent = "Correct! Great job!";
            feedback.className = "math-feedback feedback-success";
            announce("Correct!");
            setTimeout(generateMathProblem, 1500);
        } else {
            sounds.wrong();
            feedback.textContent = "Try again!";
            feedback.className = "math-feedback feedback-error";
            announce("Incorrect, try again.");
            input.value = '';
            input.focus();
        }
    }
</script>

<?php include 'src/footer.php'; ?>