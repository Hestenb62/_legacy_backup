<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline | Hesten's Learning</title>
    <meta name="description" content="You are currently offline. Access cached books, study notes, and learning resources.">
    <link rel="stylesheet" href="/assets/css/global-tokens.css">
    <link rel="stylesheet" href="/assets/css/global-reset.css">
    <link rel="stylesheet" href="/assets/css/global-primitives.css">
    <link rel="stylesheet" href="/assets/css/global-components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 1.5rem;
            background: var(--color-bg-base, #0f172a);
            color: var(--color-text-main, #f8fafc);
            font-family: var(--font-sans, system-ui, -apple-system, sans-serif);
            text-align: center;
        }
        .offline-card {
            max-width: 32rem;
            width: 100%;
            padding: 2.5rem 2rem;
            border-radius: var(--radius-xl, 1.25rem);
            background: var(--color-bg-surface, #1e293b);
            border: 1px solid var(--color-border, #334155);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4);
        }
        .offline-icon-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4.5rem;
            height: 4.5rem;
            border-radius: 50%;
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        .offline-title {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
            color: var(--color-text-main, #ffffff);
        }
        .offline-desc {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--color-text-muted, #94a3b8);
            margin-bottom: 2rem;
        }
        .offline-actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .offline-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            color: #ffffff;
            background: var(--color-primary, #3b82f6);
            border: none;
            border-radius: var(--radius-lg, 0.75rem);
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.15s ease, background-color 0.15s ease;
        }
        .offline-btn-primary:hover {
            transform: translateY(-2px);
            background: var(--color-primary-hover, #2563eb);
        }
        .offline-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--color-text-main, #e2e8f0);
            background: var(--color-bg-base, #0f172a);
            border: 1px solid var(--color-border, #334155);
            border-radius: var(--radius-lg, 0.75rem);
            text-decoration: none;
            transition: background 0.15s ease;
        }
        .offline-btn-secondary:hover {
            background: var(--color-surface-hover, #334155);
        }
        .offline-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            margin-top: 1.5rem;
        }
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>
</head>
<body>
    <div class="offline-card">
        <div class="offline-icon-wrap" aria-hidden="true">
            <i class="fas fa-wifi-slash"></i>
        </div>
        <h1 class="offline-title">You're Offline</h1>
        <p class="offline-desc">
            It looks like you’ve lost internet connectivity. Don't worry! Any previously cached books, lessons, and your local study notes remain available on this device.
        </p>

        <div class="offline-actions">
            <button class="offline-btn-primary" onclick="window.location.reload()">
                <i class="fas fa-rotate-right"></i> Try Again
            </button>
            <a href="/library/" class="offline-btn-secondary">
                <i class="fas fa-book-open"></i> Browse Cached Library
            </a>
            <a href="/" class="offline-btn-secondary">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
        </div>

        <div class="offline-status-pill" id="offline-status">
            <span class="status-dot"></span> Offline Mode Active
        </div>
    </div>

    <script>
        // Automatically reload when connection is recovered
        window.addEventListener('online', () => {
            const status = document.getElementById('offline-status');
            if (status) {
                status.innerHTML = '<span class="status-dot" style="background:#22c55e;"></span> Connection Restored! Reloading...';
                status.style.background = 'rgba(34, 197, 94, 0.2)';
                status.style.color = '#86efac';
            }
            setTimeout(() => {
                window.location.reload();
            }, 800);
        });
    </script>
</body>
</html>
