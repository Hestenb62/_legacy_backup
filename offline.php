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

        /* Diagnostic Health Bar */
        .off-health-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.65rem;
            margin-top: 1.25rem;
        }

        .off-health-chip {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--off-border);
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.825rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--off-muted);
            transition: all 0.2s ease;
        }

        .off-health-chip strong {
            color: var(--off-text);
        }

        .off-health-chip:hover {
            border-color: var(--off-primary);
            background: rgba(30, 41, 59, 0.9);
        }

        /* Reconnection Toast */
        .off-reconnect-toast {
            position: fixed;
            top: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            background: #064e3b;
            color: #d1fae5;
            border: 1px solid #10b981;
            padding: 0.85rem 1.5rem;
            border-radius: 9999px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.9rem;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }

        .off-btn-sm {
            padding: 0.35rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            transition: all 0.15s ease;
        }

        .off-btn-sm:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .off-btn-sm.primary {
            background: #10b981;
            border-color: #10b981;
            color: #064e3b;
            font-weight: 800;
        }

        /* Drill Mode Selector */
        .off-drill-mode-row {
            display: flex;
            justify-content: center;
            gap: 0.4rem;
            margin-bottom: 0.85rem;
        }

        .off-mode-pill {
            background: var(--off-surface);
            border: 1px solid var(--off-border);
            color: var(--off-muted);
            padding: 0.25rem 0.65rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .off-mode-pill:hover,
        .off-mode-pill.active {
            background: var(--off-primary);
            border-color: var(--off-primary);
            color: #ffffff;
        }

        /* Diagnostics Card */
        .off-diag-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .off-diag-item {
            background: #0f172a;
            border: 1px solid var(--off-border);
            border-radius: 0.75rem;
            padding: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .off-diag-item span {
            font-size: 0.75rem;
            color: var(--off-muted);
            text-transform: uppercase;
            font-weight: 700;
        }

        .off-diag-item strong {
            font-size: 1.1rem;
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
            .off-diag-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Reconnection Toast Banner -->
    <div id="off-reconnect-toast" class="off-reconnect-toast" style="display: none;" role="alert">
        <i class="fas fa-wifi" style="color: #34d399; font-size: 1.1rem;"></i>
        <span><strong>Connection Restored!</strong> Returning online in <span id="reconnect-countdown">3</span>s...</span>
        <button type="button" onclick="cancelAutoReload()" class="off-btn-sm">Stay Offline</button>
        <button type="button" onclick="window.location.reload()" class="off-btn-sm primary">Return Now</button>
    </div>

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

            <!-- Health Status Chips -->
            <div class="off-health-bar">
                <div class="off-health-chip">
                    <i class="fas fa-bolt" style="color: #34d399;"></i>
                    <span>SW: <strong id="health-sw-status">Active</strong></span>
                </div>
                <div class="off-health-chip">
                    <i class="fas fa-layer-group" style="color: #60a5fa;"></i>
                    <span>Caches: <strong id="health-cache-count">Scanning...</strong></span>
                </div>
                <div class="off-health-chip">
                    <i class="fas fa-hdd" style="color: #c084fc;"></i>
                    <span>Storage: <strong id="health-storage-stat">Ready</strong></span>
                </div>
                <div class="off-health-chip" id="health-ping-chip" onclick="testConnection()" style="cursor: pointer;" title="Click to test ping latency">
                    <i class="fas fa-satellite-dish" style="color: #fbbf24;"></i>
                    <span>Ping: <strong id="health-ping-stat">Test Ping</strong></span>
                </div>
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

            <!-- 2. Diagnostic Health & Cache Inspector -->
            <section class="off-card" aria-labelledby="card-diag-title">
                <div class="off-card-header">
                    <div class="off-card-icon" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;" aria-hidden="true">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div>
                        <h2 id="card-diag-title" class="off-card-title">PWA Health & Cache Diagnostics</h2>
                    </div>
                </div>
                <p style="font-size: 0.85rem; color: var(--off-muted); margin: 0;">
                    Live inspection of browser cache registries, storage quota, and service worker status:
                </p>
                <div class="off-diag-grid">
                    <div class="off-diag-item">
                        <span>Cached Assets</span>
                        <strong id="diag-cached-assets">Calculating...</strong>
                    </div>
                    <div class="off-diag-item">
                        <span>Active Caches</span>
                        <strong id="diag-cache-stores">Scanning...</strong>
                    </div>
                    <div class="off-diag-item">
                        <span>Storage Quota</span>
                        <strong id="diag-storage-quota">-- MB</strong>
                    </div>
                    <div class="off-diag-item">
                        <span>Network Ping</span>
                        <strong id="diag-ping-stat">Offline</strong>
                    </div>
                </div>
                <div style="display: flex; gap: 0.5rem; margin-top: 0.25rem;">
                    <button type="button" onclick="testConnection()" class="off-btn off-btn-secondary" style="flex: 1; padding: 0.5rem; font-size: 0.825rem;">
                        <i class="fas fa-satellite-dish"></i> Ping Latency
                    </button>
                    <button type="button" onclick="purgeStaleOfflineCache()" class="off-btn off-btn-secondary" style="padding: 0.5rem; font-size: 0.825rem; color: #f87171;" title="Purge cached files to free disk space">
                        <i class="fas fa-trash-alt"></i> Purge Cache
                    </button>
                </div>
            </section>

            <!-- 3. Mental Math Workout Drill -->
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
                    <div class="off-drill-mode-row">
                        <button type="button" class="off-mode-pill active" onclick="setDrillOp('all', this)">Mixed</button>
                        <button type="button" class="off-mode-pill" onclick="setDrillOp('+', this)">Addition</button>
                        <button type="button" class="off-mode-pill" onclick="setDrillOp('-', this)">Subtract</button>
                        <button type="button" class="off-mode-pill" onclick="setDrillOp('*', this)">Multiply</button>
                        <button type="button" class="off-mode-pill" onclick="setDrillOp('/', this)">Divide</button>
                    </div>
                    <div class="off-drill-question" id="drill-question">8 &times; 7 = ?</div>
                    <div class="off-drill-options" id="drill-options">
                        <!-- Buttons injected via JS -->
                    </div>
                    <div class="off-drill-stats">
                        <span>Score: <span class="off-drill-stat-num" id="stat-score">0</span></span>
                        <span>Streak: <span class="off-drill-stat-num" id="stat-streak">0</span> &starf;</span>
                        <span>Best: <span class="off-drill-stat-num" id="stat-best-streak">0</span></span>
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

            <!-- 4. My Downloaded Materials & Offline Lessons -->
            <section class="off-card" aria-labelledby="card-downloads-title">
                <div class="off-card-header" style="justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div class="off-card-icon" style="background: rgba(16, 185, 129, 0.15); color: #10b981;" aria-hidden="true">
                            <i class="fas fa-download"></i>
                        </div>
                        <div>
                            <h2 id="card-downloads-title" class="off-card-title">Saved Materials &amp; Offline Lessons</h2>
                        </div>
                    </div>
                    <button type="button" id="btn-clear-downloads" onclick="clearAllDownloadedMaterials()" class="off-btn-sm" style="display: none; color: #f87171;" title="Remove all saved materials to free storage">
                        <i class="fas fa-trash-alt"></i> Clear All
                    </button>
                </div>
                <p style="font-size: 0.85rem; color: var(--off-muted); margin: 0;">
                    Books, chapters, and lessons downloaded for offline study:
                </p>
                <div class="off-book-list" id="off-downloads-list">
                    <!-- Populated dynamically via JS -->
                </div>
            </section>

            <!-- 5. Curriculum Level Shortcuts -->
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
        let reloadTimer = null;
        let reloadCount = 3;

        function testConnection() {
            const statusText = document.getElementById('status-text');
            const pingStat = document.getElementById('health-ping-stat');
            const diagPing = document.getElementById('diag-ping-stat');
            if (statusText) statusText.innerText = 'Checking connectivity...';
            if (pingStat) pingStat.innerText = 'Testing...';

            const start = performance.now();
            fetch('/manifest.json?ping=' + Date.now(), { method: 'HEAD', cache: 'no-store' })
                .then(() => {
                    const elapsed = Math.round(performance.now() - start);
                    if (pingStat) pingStat.innerText = `${elapsed}ms`;
                    if (diagPing) diagPing.innerText = `${elapsed}ms (Online)`;
                    handleOnline();
                })
                .catch(() => {
                    if (statusText) statusText.innerText = 'Still offline. Check Wi-Fi or mobile data.';
                    if (pingStat) pingStat.innerText = 'Timeout';
                    if (diagPing) diagPing.innerText = 'Unreachable';
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
            const toast = document.getElementById('off-reconnect-toast');
            const countdownEl = document.getElementById('reconnect-countdown');

            if (status && statusDot && statusText) {
                statusDot.style.background = '#22c55e';
                status.style.background = 'rgba(34, 197, 94, 0.2)';
                status.style.borderColor = 'rgba(34, 197, 94, 0.4)';
                status.style.color = '#86efac';
                statusText.innerText = 'Connection Restored! Returning online...';
            }

            if (toast) {
                toast.style.display = 'flex';
                reloadCount = 3;
                if (countdownEl) countdownEl.innerText = reloadCount;
                if (reloadTimer) clearInterval(reloadTimer);
                reloadTimer = setInterval(() => {
                    reloadCount--;
                    if (countdownEl) countdownEl.innerText = reloadCount;
                    if (reloadCount <= 0) {
                        clearInterval(reloadTimer);
                        window.location.reload();
                    }
                }, 1000);
            } else {
                setTimeout(() => window.location.reload(), 1200);
            }
        }

        function cancelAutoReload() {
            if (reloadTimer) clearInterval(reloadTimer);
            const toast = document.getElementById('off-reconnect-toast');
            if (toast) toast.style.display = 'none';
        }

        window.addEventListener('online', handleOnline);

        // ==========================================
        // 2. Offline Diagnostics Inspector
        // ==========================================
        async function inspectOfflineDiagnostics() {
            // SW Controller
            const swEl = document.getElementById('health-sw-status');
            if (navigator.serviceWorker && navigator.serviceWorker.controller) {
                if (swEl) swEl.innerText = 'Controlling';
            } else if (navigator.serviceWorker) {
                if (swEl) swEl.innerText = 'Registered';
            }

            // Cache inspection
            if (window.caches) {
                try {
                    const keys = await caches.keys();
                    let totalItems = 0;
                    for (const k of keys) {
                        const cache = await caches.open(k);
                        const requests = await cache.keys();
                        totalItems += requests.length;
                    }
                    const chipCount = document.getElementById('health-cache-count');
                    const diagAssets = document.getElementById('diag-cached-assets');
                    const diagStores = document.getElementById('diag-cache-stores');

                    if (chipCount) chipCount.innerText = `${totalItems} files`;
                    if (diagAssets) diagAssets.innerText = `${totalItems} items`;
                    if (diagStores) diagStores.innerText = `${keys.length} store${keys.length === 1 ? '' : 's'}`;
                } catch (e) {}
            }

            // Storage estimate
            if (navigator.storage && navigator.storage.estimate) {
                try {
                    const est = await navigator.storage.estimate();
                    const usedMB = (est.usage / (1024 * 1024)).toFixed(1);
                    const chipStorage = document.getElementById('health-storage-stat');
                    const diagStorage = document.getElementById('diag-storage-quota');
                    if (chipStorage) chipStorage.innerText = `${usedMB} MB`;
                    if (diagStorage) diagStorage.innerText = `${usedMB} MB`;
                } catch (e) {}
            }
        }

        async function purgeStaleOfflineCache() {
            if (!window.caches) return;
            if (confirm('Purge cached pages to free local storage? Note: Pre-cached books or curriculum will re-download when you go back online.')) {
                try {
                    const keys = await caches.keys();
                    for (const k of keys) {
                        await caches.delete(k);
                    }
                    alert('Offline cache cleared.');
                    inspectOfflineDiagnostics();
                } catch (e) {
                    console.error('Purge error:', e);
                }
            }
        }

        // ==========================================
        // 3. Local Scratchpad Integration
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
        // 4. Offline Mental Math Drill Engine
        // ==========================================
        let score = 0;
        let streak = 0;
        let bestStreak = parseInt(localStorage.getItem('hl_offline_best_streak') || '0', 10);
        let totalAnswered = 0;
        let currentProblem = null;
        let drillOp = 'all';

        const bestEl = document.getElementById('stat-best-streak');
        if (bestEl) bestEl.innerText = bestStreak;

        function setDrillOp(op, btn) {
            drillOp = op;
            document.querySelectorAll('.off-mode-pill').forEach(p => p.classList.remove('active'));
            if (btn) btn.classList.add('active');
            renderProblem();
        }

        function generateProblem() {
            let ops = ['+', '-', '*'];
            if (drillOp === '+') ops = ['+'];
            else if (drillOp === '-') ops = ['-'];
            else if (drillOp === '*') ops = ['*'];
            else if (drillOp === '/') ops = ['/'];
            else ops = ['+', '-', '*', '/'];

            const op = ops[Math.floor(Math.random() * ops.length)];
            let n1, n2, ans, symbol;

            if (op === '+') {
                n1 = Math.floor(Math.random() * 80) + 12;
                n2 = Math.floor(Math.random() * 80) + 8;
                ans = n1 + n2;
                symbol = '+';
            } else if (op === '-') {
                n1 = Math.floor(Math.random() * 90) + 20;
                n2 = Math.floor(Math.random() * n1) + 5;
                ans = n1 - n2;
                symbol = '&minus;';
            } else if (op === '*') {
                n1 = Math.floor(Math.random() * 11) + 2;
                n2 = Math.floor(Math.random() * 11) + 2;
                ans = n1 * n2;
                symbol = '&times;';
            } else {
                n2 = Math.floor(Math.random() * 11) + 2;
                ans = Math.floor(Math.random() * 11) + 2;
                n1 = n2 * ans;
                symbol = '&divide;';
            }

            const choices = new Set([ans]);
            while (choices.size < 4) {
                const delta = (Math.floor(Math.random() * 9) + 1) * (Math.random() > 0.5 ? 1 : -1);
                const fake = ans + delta;
                if (fake >= 0) choices.add(fake);
            }

            const shuffledChoices = Array.from(choices).sort(() => Math.random() - 0.5);
            return {
                display: `${n1} ${symbol} ${n2} = ?`,
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
                if (streak > bestStreak) {
                    bestStreak = streak;
                    try { localStorage.setItem('hl_offline_best_streak', bestStreak); } catch(e) {}
                    if (bestEl) bestEl.innerText = bestStreak;
                }
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

            setTimeout(renderProblem, 1100);
        }

        // ==========================================
        // 5. Downloaded Offline Materials Manager
        // ==========================================
        function escapeHtml(str) {
            if (!str) return '';
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        function renderDownloadedMaterials() {
            const listEl = document.getElementById('off-downloads-list');
            const clearBtn = document.getElementById('btn-clear-downloads');
            if (!listEl) return;

            let downloads = [];
            try {
                const raw = localStorage.getItem('hl_offline_downloads');
                if (raw) downloads = JSON.parse(raw);
            } catch(e) {}

            if (!downloads || downloads.length === 0) {
                if (clearBtn) clearBtn.style.display = 'none';
                listEl.innerHTML = `
                    <div style="text-align: center; padding: 1.5rem 1rem; color: var(--off-muted); font-size: 0.85rem; background: #0f172a; border-radius: 0.75rem; border: 1px dashed var(--off-border);">
                        <i class="fas fa-cloud-download-alt" style="font-size: 1.75rem; margin-bottom: 0.5rem; opacity: 0.4; display: block;"></i>
                        No downloaded books or lessons yet.<br>
                        <span style="font-size: 0.75rem; opacity: 0.7;">Click the download icon on any chapter or lesson sticky reading bar to save it for offline study.</span>
                    </div>
                `;
                return;
            }

            if (clearBtn) clearBtn.style.display = 'inline-flex';
            listEl.innerHTML = downloads.map(item => `
                <div class="off-book-item" style="display: flex; align-items: center; justify-content: space-between; gap: 0.75rem;">
                    <a href="${item.url}" style="display: flex; align-items: center; gap: 0.65rem; color: inherit; text-decoration: none; flex-grow: 1; overflow: hidden;">
                        <i class="fas ${item.type === 'lesson' ? 'fa-chalkboard-teacher' : 'fa-book'}" style="color: ${item.type === 'lesson' ? '#3b82f6' : '#a78bfa'}; flex-shrink: 0;"></i>
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <div style="font-weight: 700; font-size: 0.875rem;">${escapeHtml(item.title)}</div>
                            <div style="font-size: 0.75rem; color: var(--off-muted);">${escapeHtml(item.subtitle || '')} &bull; Saved ${escapeHtml(item.date)}</div>
                        </div>
                    </a>
                    <div style="display: flex; align-items: center; gap: 0.35rem; flex-shrink: 0;">
                        <a href="${item.url}" class="off-btn-sm" style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3); text-decoration: none;">
                            Study <i class="fas fa-arrow-right"></i>
                        </a>
                        <button type="button" onclick="removeDownloadedMaterial('${item.id}', '${item.url}')" class="off-btn-sm" style="color: #f87171; border: none; background: transparent; padding: 0.35rem 0.5rem;" title="Remove from offline downloads" aria-label="Remove ${escapeHtml(item.title)}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        async function removeDownloadedMaterial(id, url) {
            try {
                let downloads = JSON.parse(localStorage.getItem('hl_offline_downloads') || '[]');
                downloads = downloads.filter(d => d.id !== id);
                localStorage.setItem('hl_offline_downloads', JSON.stringify(downloads));

                if ('caches' in window) {
                    const cache = await window.caches.open('hestens-learning-v14');
                    await cache.delete(url);
                }
                renderDownloadedMaterials();
                inspectOfflineDiagnostics();
            } catch(e) {
                console.warn('Could not remove offline item', e);
            }
        }

        async function clearAllDownloadedMaterials() {
            if (!confirm('Remove all downloaded materials from this device?')) return;
            try {
                let downloads = JSON.parse(localStorage.getItem('hl_offline_downloads') || '[]');
                if ('caches' in window) {
                    const cache = await window.caches.open('hestens-learning-v14');
                    for (const item of downloads) {
                        await cache.delete(item.url);
                    }
                }
                localStorage.removeItem('hl_offline_downloads');
                renderDownloadedMaterials();
                inspectOfflineDiagnostics();
            } catch(e) {
                console.warn('Could not clear offline downloads', e);
            }
        }

        window.addEventListener('storage', (e) => {
            if (e.key === 'hl_offline_downloads') {
                renderDownloadedMaterials();
            }
        });

        renderProblem();
        inspectOfflineDiagnostics();
        renderDownloadedMaterials();
    </script>
</body>
</html>
