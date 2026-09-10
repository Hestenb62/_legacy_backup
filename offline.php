<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline Learning Station | Hesten's Learning</title>
    <meta name="description" content="You are currently offline. Access your saved study notes, cached literature readers, and offline brain workout drills.">
    <link rel="stylesheet" href="/assets/css/global-tokens.css">
    <link rel="stylesheet" href="/assets/css/global-reset.css">
    <link rel="stylesheet" href="/assets/css/global-primitives.css">
    <link rel="stylesheet" href="/assets/css/global-components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --off-bg: #0b1120;
            --off-surface: #1e293b;
            --off-surface-hover: #334155;
            --off-border: #334155;
            --off-primary: #3b82f6;
            --off-primary-hover: #2563eb;
            --off-text: #f8fafc;
            --off-muted: #94a3b8;
            --off-accent: #8b5cf6;
            --off-success: #10b981;
            --off-warning: #f59e0b;
        }

        body {
            margin: 0;
            padding: 2rem 1rem;
            background: var(--color-bg-base, var(--off-bg));
            color: var(--color-text-main, var(--off-text));
            font-family: var(--font-sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif);
            min-height: 100vh;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .off-container {
            max-width: 960px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Hero Banner */
        .off-hero {
            background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid var(--off-border);
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            text-align: center;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .off-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #3b82f6);
        }

        .off-icon-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            font-size: 2.25rem;
            margin-bottom: 1.25rem;
            box-shadow: 0 0 25px rgba(239, 68, 68, 0.2);
        }

        .off-title {
            font-size: 2rem;
            font-weight: 800;
            margin: 0 0 0.5rem;
            letter-spacing: -0.02em;
        }

        .off-desc {
            font-size: 1.05rem;
            line-height: 1.6;
            color: var(--off-muted);
            max-width: 600px;
            margin: 0 auto 1.75rem;
        }

        .off-hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.85rem;
        }

        .off-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.4rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid transparent;
        }

        .off-btn-primary {
            background: var(--off-primary);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(59, 130, 246, 0.35);
        }
        .off-btn-primary:hover {
            background: var(--off-primary-hover);
            transform: translateY(-2px);
        }

        .off-btn-secondary {
            background: #0f172a;
            color: #f1f5f9;
            border-color: var(--off-border);
        }
        .off-btn-secondary:hover {
            background: var(--off-surface-hover);
            transform: translateY(-2px);
        }

        .off-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
            margin-top: 1.5rem;
        }

        .status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #ef4444;
            animation: off-pulse 2s infinite;
        }

        @keyframes off-pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
        }

        /* 2-Column Content Grid */
        .off-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .off-card {
            background: var(--off-surface);
            border: 1px solid var(--off-border);
            border-radius: 1.25rem;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .off-card-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 0.75rem;
        }

        .off-card-icon {
            font-size: 1.25rem;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
        }

        .off-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
        }

        /* Scratchpad Notes Viewer */
        .off-notes-area {
            width: 100%;
            min-height: 140px;
            background: #0f172a;
            border: 1px solid var(--off-border);
            border-radius: 0.75rem;
            color: #f1f5f9;
            padding: 0.85rem;
            font-family: inherit;
            font-size: 0.9rem;
            line-height: 1.5;
            resize: vertical;
            box-sizing: border-box;
        }

        .off-notes-area:focus {
            outline: none;
            border-color: var(--off-primary);
        }

        .off-notes-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: var(--off-muted);
        }

        /* Books Links */
        .off-book-list {
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
        }

        .off-book-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            background: #0f172a;
            border: 1px solid var(--off-border);
            border-radius: 0.75rem;
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .off-book-item:hover {
            background: var(--off-surface-hover);
            border-color: var(--off-primary);
            color: #ffffff;
            transform: translateX(3px);
        }

        .off-book-item i.chevron {
            color: var(--off-muted);
            font-size: 0.8rem;
            transition: transform 0.2s ease;
        }
        .off-book-item:hover i.chevron {
            transform: translateX(2px);
            color: var(--off-primary);
        }

        /* Offline Practice Widget */
        .off-drill-box {
            background: #0f172a;
            border: 1px solid var(--off-border);
            border-radius: 0.75rem;
            padding: 1.25rem;
            text-align: center;
        }

        .off-drill-question {
            font-size: 1.65rem;
            font-weight: 800;
            margin: 0.5rem 0 1rem;
            color: #ffffff;
            letter-spacing: 0.05em;
        }

        .off-drill-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.65rem;
            margin-bottom: 1rem;
        }

        .off-drill-btn {
            background: var(--off-surface);
            border: 1px solid var(--off-border);
            border-radius: 0.5rem;
            color: #ffffff;
            padding: 0.65rem;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .off-drill-btn:hover {
            background: var(--off-surface-hover);
            border-color: var(--off-primary);
        }

        .off-drill-btn.correct {
            background: #065f46 !important;
            border-color: #10b981 !important;
            color: #a7f3d0 !important;
        }

        .off-drill-btn.wrong {
            background: #7f1d1d !important;
            border-color: #ef4444 !important;
            color: #fecaca !important;
        }

        .off-drill-stats {
            display: flex;
            justify-content: space-around;
            font-size: 0.85rem;
            color: var(--off-muted);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding-top: 0.75rem;
            margin-top: 0.5rem;
        }

        .off-drill-stat-num {
            font-weight: 800;
            color: var(--off-text);
        }

        /* Footer */
        .off-footer {
            text-align: center;
            font-size: 0.85rem;
            color: var(--off-muted);
            margin-top: 1rem;
        }

        @media (max-width: 640px) {
            body { padding: 1rem 0.75rem; }
            .off-title { font-size: 1.6rem; }
            .off-hero { padding: 2rem 1.25rem; }
            .off-drill-options { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="off-container">
        <!-- Hero Status Card -->
        <header class="off-hero" role="banner">
            <div class="off-icon-wrap" aria-hidden="true">
                <i class="fas fa-wifi-slash"></i>
            </div>
            <h1 class="off-title">Offline Learning Station</h1>
            <p class="off-desc">
                Your internet connection is currently unavailable, but learning doesn’t stop. Access your local notes, review cached literature, and practice mental math offline.
            </p>

            <div class="off-hero-actions">
                <button type="button" class="off-btn off-btn-primary" onclick="testConnection()">
                    <i class="fas fa-rotate-right"></i> Check Connection
                </button>
                <a href="/library/" class="off-btn off-btn-secondary">
                    <i class="fas fa-book-open"></i> Cached Library
                </a>
                <a href="/" class="off-btn off-btn-secondary">
                    <i class="fas fa-home"></i> Platform Home
                </a>
            </div>

            <div class="off-status-pill" id="offline-status" role="status">
                <span class="status-dot" id="status-dot"></span>
                <span id="status-text">Offline Shell Active &bull; Local Storage Ready</span>
            </div>
        </header>

        <!-- Main Content Grid -->
        <main class="off-grid">
            <!-- 1. Scratchpad Notes -->
            <section class="off-card" aria-labelledby="card-notes-title">
                <div class="off-card-header">
                    <div class="off-card-icon" aria-hidden="true">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <div>
                        <h2 id="card-notes-title" class="off-card-title">My Offline Scratchpad</h2>
                    </div>
                </div>
                <p style="font-size: 0.85rem; color: var(--off-muted); margin: 0;">
                    Edit or review your study notes saved in browser storage. Changes auto-save locally.
                </p>
                <textarea id="off-notes-input" class="off-notes-area" placeholder="Type offline notes, formulas, or reminders here..."></textarea>
                <div class="off-notes-footer">
                    <span id="off-notes-count">0 characters</span>
                    <div style="display: flex; gap: 0.5rem;">
                        <button type="button" id="btn-copy-notes" class="off-btn off-btn-secondary" style="padding: 0.35rem 0.65rem; font-size: 0.8rem;">
                            <i class="far fa-copy"></i> Copy
                        </button>
                        <button type="button" id="btn-export-notes" class="off-btn off-btn-secondary" style="padding: 0.35rem 0.65rem; font-size: 0.8rem;">
                            <i class="fas fa-download"></i> Save .txt
                        </button>
                    </div>
                </div>
            </section>

            <!-- 2. Mental Math Workout -->
            <section class="off-card" aria-labelledby="card-drill-title">
                <div class="off-card-header">
                    <div class="off-card-icon" style="background: rgba(16, 185, 129, 0.15); color: #34d399;" aria-hidden="true">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div>
                        <h2 id="card-drill-title" class="off-card-title">Brain Drill (Offline)</h2>
                    </div>
                </div>
                <div class="off-drill-box">
                    <div style="font-size: 0.8rem; color: var(--off-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em;">
                        Mental Math Drill
                    </div>
                    <div class="off-drill-question" id="drill-question">8 &times; 7 = ?</div>
                    <div class="off-drill-options" id="drill-options">
                        <!-- Buttons injected via JS -->
                    </div>
                    <div class="off-drill-stats">
                        <span>Score: <span class="off-drill-stat-num" id="stat-score">0</span></span>
                        <span>Streak: <span class="off-drill-stat-num" id="stat-streak">0</span> &starf;</span>
                        <span>Accuracy: <span class="off-drill-stat-num" id="stat-acc">100%</span></span>
                    </div>
                </div>
            </section>

            <!-- 3. Literature Readers -->
            <section class="off-card" aria-labelledby="card-books-title">
                <div class="off-card-header">
                    <div class="off-card-icon" style="background: rgba(139, 92, 246, 0.15); color: #a78bfa;" aria-hidden="true">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div>
                        <h2 id="card-books-title" class="off-card-title">Offline Literature Readers</h2>
                    </div>
                </div>
                <p style="font-size: 0.85rem; color: var(--off-muted); margin: 0;">
                    Pre-cached classic texts and primary historical documents available in offline mode:
                </p>
                <div class="off-book-list">
                    <a href="/library/read/frankenstein/" class="off-book-item">
                        <span><i class="fas fa-book mr-2" style="color: #a78bfa;"></i> Frankenstein &bull; Mary Shelley</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/library/read/1984/" class="off-book-item">
                        <span><i class="fas fa-book mr-2" style="color: #60a5fa;"></i> 1984 &bull; George Orwell</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/library/read/usa-constitution/" class="off-book-item">
                        <span><i class="fas fa-landmark mr-2" style="color: #f59e0b;"></i> The U.S. Constitution</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/library/read/federalist-papers/" class="off-book-item">
                        <span><i class="fas fa-scroll mr-2" style="color: #10b981;"></i> The Federalist Papers</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/library/read/american-yawp/" class="off-book-item">
                        <span><i class="fas fa-graduation-cap mr-2" style="color: #ec4899;"></i> The American Yawp (History)</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                </div>
            </section>

            <!-- 4. Curriculum Level Shortcuts -->
            <section class="off-card" aria-labelledby="card-curric-title">
                <div class="off-card-header">
                    <div class="off-card-icon" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24;" aria-hidden="true">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <h2 id="card-curric-title" class="off-card-title">Grade Levels & Practice</h2>
                    </div>
                </div>
                <p style="font-size: 0.85rem; color: var(--off-muted); margin: 0;">
                    Visit cached grade pages or study modules:
                </p>
                <div class="off-book-list">
                    <a href="/levels/k.php" class="off-book-item">
                        <span><i class="fas fa-shapes mr-2" style="color: #fbbf24;"></i> Level K (Kindergarten & Grade 9)</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/levels/a.php" class="off-book-item">
                        <span><i class="fas fa-cube mr-2" style="color: #60a5fa;"></i> Level A (Grade 1 Foundations)</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/student/interactive-labs.php" class="off-book-item">
                        <span><i class="fas fa-flask mr-2" style="color: #ec4899;"></i> Interactive STEM Labs</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                    <a href="/updates/" class="off-book-item">
                        <span><i class="fas fa-newspaper mr-2" style="color: #34d399;"></i> Platform Updates Portal</span>
                        <i class="fas fa-chevron-right chevron"></i>
                    </a>
                </div>
            </section>
        </main>

        <footer class="off-footer">
            <p>Hesten's Learning Platform &bull; Built with offline-first service worker technology.</p>
        </footer>
    </div>

    <script>
        // ==========================================
        // 1. Connection Monitoring & Automatic Reload
        // ==========================================
        function testConnection() {
            const statusText = document.getElementById('status-text');
            const statusDot = document.getElementById('status-dot');
            if (statusText) statusText.innerText = 'Checking connectivity...';

            fetch('/manifest.json', { method: 'HEAD', cache: 'no-store' })
                .then(() => {
                    handleOnline();
                })
                .catch(() => {
                    if (statusText) statusText.innerText = 'Still offline. Check Wi-Fi or mobile data.';
                    setTimeout(() => {
                        if (!navigator.onLine && statusText) {
                            statusText.innerText = 'Offline Shell Active • Local Storage Ready';
                        }
                    }, 2500);
                });
        }

        function handleOnline() {
            const status = document.getElementById('offline-status');
            const statusDot = document.getElementById('status-dot');
            const statusText = document.getElementById('status-text');

            if (status && statusDot && statusText) {
                statusDot.style.background = '#22c55e';
                status.style.background = 'rgba(34, 197, 94, 0.2)';
                status.style.borderColor = 'rgba(34, 197, 94, 0.4)';
                status.style.color = '#86efac';
                statusText.innerText = 'Connection Restored! Reloading page...';
            }
            setTimeout(() => {
                window.location.reload();
            }, 900);
        }

        window.addEventListener('online', handleOnline);

        // ==========================================
        // 2. Local Scratchpad Integration
        // ==========================================
        const notesInput = document.getElementById('off-notes-input');
        const notesCount = document.getElementById('off-notes-count');
        const btnCopy = document.getElementById('btn-copy-notes');
        const btnExport = document.getElementById('btn-export-notes');

        function loadNotes() {
            try {
                const saved = localStorage.getItem('hl_scratchpad') || localStorage.getItem('hl_scratchpad_notes') || '';
                if (notesInput) {
                    notesInput.value = saved;
                    updateNotesCount(saved);
                }
            } catch(e) {}
        }

        function updateNotesCount(str) {
            if (!notesCount) return;
            const len = str.length;
            const words = str.trim() ? str.trim().split(/\s+/).length : 0;
            notesCount.innerText = `${words} words (${len} chars)`;
        }

        if (notesInput) {
            notesInput.addEventListener('input', function() {
                try {
                    localStorage.setItem('hl_scratchpad', this.value);
                } catch(e) {}
                updateNotesCount(this.value);
            });
        }

        if (btnCopy && notesInput) {
            btnCopy.addEventListener('click', function() {
                if (!notesInput.value) return;
                navigator.clipboard.writeText(notesInput.value).then(() => {
                    btnCopy.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    setTimeout(() => {
                        btnCopy.innerHTML = '<i class="far fa-copy"></i> Copy';
                    }, 2000);
                });
            });
        }

        if (btnExport && notesInput) {
            btnExport.addEventListener('click', function() {
                if (!notesInput.value) return;
                const blob = new Blob([notesInput.value], { type: 'text/plain;charset=utf-8' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `Hestens-Learning-Notes-${new Date().toISOString().slice(0, 10)}.txt`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        }

        loadNotes();

        // ==========================================
        // 3. Offline Mental Math Drill Engine
        // ==========================================
        let score = 0;
        let streak = 0;
        let totalAnswered = 0;
        let currentProblem = null;

        function generateProblem() {
            const ops = ['+', '-', '*'];
            const op = ops[Math.floor(Math.random() * ops.length)];
            let n1, n2, ans;

            if (op === '+') {
                n1 = Math.floor(Math.random() * 80) + 12;
                n2 = Math.floor(Math.random() * 80) + 8;
                ans = n1 + n2;
            } else if (op === '-') {
                n1 = Math.floor(Math.random() * 90) + 20;
                n2 = Math.floor(Math.random() * n1) + 5;
                ans = n1 - n2;
            } else {
                n1 = Math.floor(Math.random() * 11) + 2;
                n2 = Math.floor(Math.random() * 11) + 2;
                ans = n1 * n2;
            }

            const choices = new Set([ans]);
            while (choices.size < 4) {
                const delta = (Math.floor(Math.random() * 9) + 1) * (Math.random() > 0.5 ? 1 : -1);
                const fake = ans + delta;
                if (fake >= 0) choices.add(fake);
            }

            const shuffledChoices = Array.from(choices).sort(() => Math.random() - 0.5);
            return {
                display: `${n1} ${op === '*' ? '&times;' : (op === '-' ? '&minus;' : '+')} ${n2} = ?`,
                ans: ans,
                choices: shuffledChoices
            };
        }

        function renderProblem() {
            currentProblem = generateProblem();
            const qEl = document.getElementById('drill-question');
            const optBox = document.getElementById('drill-options');
            if (qEl) qEl.innerHTML = currentProblem.display;
            if (optBox) {
                optBox.innerHTML = '';
                currentProblem.choices.forEach(ch => {
                    const btn = document.createElement('button');
                    btn.className = 'off-drill-btn';
                    btn.innerText = ch;
                    btn.addEventListener('click', () => checkAnswer(ch, btn));
                    optBox.appendChild(btn);
                });
            }
        }

        function checkAnswer(chosen, btn) {
            totalAnswered++;
            const allBtns = document.querySelectorAll('.off-drill-btn');
            allBtns.forEach(b => b.disabled = true);

            if (chosen === currentProblem.ans) {
                btn.classList.add('correct');
                score += 10;
                streak++;
            } else {
                btn.classList.add('wrong');
                streak = 0;
                allBtns.forEach(b => {
                    if (parseInt(b.innerText) === currentProblem.ans) {
                        b.classList.add('correct');
                    }
                });
            }

            const scoreEl = document.getElementById('stat-score');
            const streakEl = document.getElementById('stat-streak');
            const accEl = document.getElementById('stat-acc');
            if (scoreEl) scoreEl.innerText = score;
            if (streakEl) streakEl.innerText = streak;
            if (accEl) {
                const acc = Math.round(((score / 10) / totalAnswered) * 100);
                accEl.innerText = `${acc}%`;
            }

            setTimeout(renderProblem, 1200);
        }

        renderProblem();
    </script>
</body>
</html>
