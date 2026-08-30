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
    const arenaDialog = document.getElementById('game-arena-dialog');

    let lastFocusedElement = null;

    // Game Configurations State
    let memoryDifficulty = 'medium'; // easy, medium, hard
    let memoryTheme = 'icons'; // icons, numbers, letters
    let mathOperation = 'addition'; // addition, subtraction, multiplication, mixed
    let mathDifficulty = 'easy'; // easy, medium, hard

    // Modal Controls & Keyboard Trapping
    function loadGame(gameType) {
        lastFocusedElement = document.activeElement;
        
        arena.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (gameType === 'memory') showMemorySetup();
        if (gameType === 'math') showMathSetup();
    }

    function closeGame() {
        arena.classList.add('hidden');
        document.body.style.overflow = '';
        announce("Game closed.");
        
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }
    }

    // Keyboard navigation & trap inside the modal
    document.addEventListener('keydown', function(e) {
        if (arena.classList.contains('hidden')) return;

        // Escape Key closes the modal
        if (e.key === 'Escape') {
            closeGame();
            return;
        }

        // Tab Trapping
        if (e.key === 'Tab') {
            const focusableSelectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
            const focusables = arena.querySelectorAll(focusableSelectors);
            if (focusables.length === 0) return;

            const first = focusables[0];
            const last = focusables[focusables.length - 1];

            if (e.shiftKey) { // Shift + Tab
                if (document.activeElement === first) {
                    last.focus();
                    e.preventDefault();
                }
            } else { // Tab
                if (document.activeElement === last) {
                    first.focus();
                    e.preventDefault();
                }
            }
        }
    });

    // --- GAME SETUP SCREENS ---
    function showMemorySetup() {
        arenaTitle.textContent = "Memory Match - Options";
        arenaDialog.classList.remove('wide');

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
        arenaTitle.textContent = "Math Master - Options";
        arenaDialog.classList.remove('wide');

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

    // Setters for setup options
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

    function startMemoryGame() {
        arenaTitle.textContent = "Memory Match";

        // Determine pairs needed and modal width
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

        announce(`Memory Match started. Difficulty is ${memoryDifficulty}. Theme is ${memoryTheme}. Use keyboard or click to match.`);

        // Determine theme content library
        let library;
        if (memoryTheme === 'numbers') {
            library = numberLibrary;
        } else if (memoryTheme === 'letters') {
            library = letterLibrary;
        } else {
            library = iconLibrary;
        }

        const activeSymbols = library.slice(0, pairsNeeded);
        // Duplicate and shuffle
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

        // Focus first card
        setTimeout(() => {
            const firstCard = document.getElementById('card-0');
            if (firstCard) firstCard.focus();
        }, 100);

        // Reset Game State
        flippedCards = [];
        matchedPairs = 0;
        totalPairs = pairsNeeded;
        isProcessing = false;
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

        // Ignore if already matched or flipped
        if (btn.classList.contains('state-matched') || btn.classList.contains('state-flipped')) return;

        sounds.click();

        // Visual Flip
        btn.classList.remove('state-hidden');
        btn.classList.add('state-flipped');
        btn.querySelector('.memory-card-inner').innerHTML = getCardContent(icon, true);
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
                btn1.querySelector('.memory-card-inner').innerHTML = getCardContent(c1.icon, false);
                btn1.setAttribute('aria-label', `Card ${c1.index + 1}, hidden`);

                // Reset Card 2
                btn2.classList.remove('state-flipped');
                btn2.classList.add('state-hidden');
                btn2.querySelector('.memory-card-inner').innerHTML = getCardContent(c2.icon, false);
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

    function startMathGame() {
        arenaTitle.textContent = "Math Master";
        arenaDialog.classList.remove('wide');
        announce("Math Master started. Type the correct answer and press Enter or click Submit.");
        generateMathProblem();
    }

    function generateMathProblem() {
        let num1, num2, symbol, actualOp;

        // Choose actual operation based on configuration choice
        if (mathOperation === 'mixed') {
            const ops = ['addition', 'subtraction', 'multiplication'];
            actualOp = ops[Math.floor(Math.random() * ops.length)];
        } else {
            actualOp = mathOperation;
        }

        // Determine range limits based on difficulty
        if (mathDifficulty === 'easy') {
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 5) + 1; // 1-5
                num2 = Math.floor(Math.random() * 5) + 1; // 1-5
            } else {
                num1 = Math.floor(Math.random() * 10) + 1; // 1-10
                num2 = Math.floor(Math.random() * 10) + 1; // 1-10
            }
        } else if (mathDifficulty === 'medium') {
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 10) + 1; // 1-10
                num2 = Math.floor(Math.random() * 10) + 1; // 1-10
            } else {
                num1 = Math.floor(Math.random() * 20) + 1; // 1-20
                num2 = Math.floor(Math.random() * 20) + 1; // 1-20
            }
        } else { // hard
            if (actualOp === 'multiplication') {
                num1 = Math.floor(Math.random() * 12) + 1; // 1-12
                num2 = Math.floor(Math.random() * 12) + 1; // 1-12
            } else {
                num1 = Math.floor(Math.random() * 90) + 10; // 10-99
                num2 = Math.floor(Math.random() * 90) + 10; // 10-99
            }
        }

        // Calculate math target value
        if (actualOp === 'addition') {
            currentAnswer = num1 + num2;
            symbol = '+';
        } else if (actualOp === 'subtraction') {
            // Keep subtraction positive for non-hard modes
            if (num1 < num2 && mathDifficulty !== 'hard') {
                const temp = num1;
                num1 = num2;
                num2 = temp;
            }
            currentAnswer = num1 - num2;
            symbol = '-';
        } else { // multiplication
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

        // Speak the new problem
        announce(`New problem: ${num1} ${symbol === '+' ? 'plus' : symbol === '-' ? 'minus' : 'times'} ${num2}`);
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

<?php include '../src/footer.php'; ?>