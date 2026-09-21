<!-- AURORA HERO SECTION -->
<div id="hero-section" class="hero-section">

    <!-- Aurora Mesh Background -->
    <div class="hero-bg noise-grain" id="hero-bg">
        <div data-speed="0.05" class="hero-blob hero-blob-1"></div>
        <div data-speed="-0.03" class="hero-blob hero-blob-2"></div>
        <div data-speed="0.04" class="hero-blob hero-blob-3"></div>
    </div>

    <div class="container hero-content" style="z-index: 10;">
        <!-- Pill Badge -->
        <div class="hero-pill animate-reveal">
            <span class="hero-ping-dot">
                <span class="ping-anim"></span>
                <span class="ping-core"></span>
            </span>
            <span class="hero-pill-text" id="hero-dynamic-greeting">THE LEARNING ODYSSEY</span>
        </div>

        <!-- Main Heading -->
        <h1 class="hero-title animate-reveal">
            Ignite Your <br />
            <span class="hero-title-highlight">Curiosity</span>
        </h1>

        <p class="hero-subtitle animate-reveal">
            A beautifully crafted educational experience. Personalized, accessible, and structured for focused mastery.
        </p>

        <!-- CTA Buttons -->
        <div class="hero-actions animate-reveal">
            <a href="/assessment" class="btn-premium btn-primary hero-btn-start">
                <span>Start Your Journey</span>
                <i class="fas fa-arrow-right hero-arrow-icon" aria-hidden="true"></i>
            </a>
            <a href="/pages/standards.php" class="btn-premium btn-secondary">
                Explore Standards
            </a>
            <a href="#" id="hero-grade-jump" class="btn-premium btn-accent hidden" aria-label="Jump directly to my grade">
                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                <span id="hero-grade-jump-label">My Grade</span>
            </a>
        </div>

        <!-- Quick Stats (Glass Cards) -->
        <div class="hero-stats animate-reveal">
            <div class="stats-card glass-panel" title="Current overall grade progress">
                <span class="stat-value text-primary" id="user-progress-stat">0%</span>
                <span class="stat-label">Mastery</span>
            </div>
            <div class="stats-card glass-panel" title="Consecutive daily study streak">
                <div class="hero-stat-streak">
                    <i class="fas fa-fire" style="color: var(--color-warning);" aria-hidden="true"></i>
                    <span class="stat-value" style="color: var(--color-warning);" id="streak-stat" aria-live="polite">1</span>
                </div>
                <span class="stat-label">Day Streak</span>
            </div>
            <div class="stats-card glass-panel hero-stat-hidden-mobile">
                <i class="fas fa-user-shield stat-icon" style="color: var(--color-success);" aria-hidden="true"></i>
                <span class="stat-label">Safe Space</span>
            </div>
            <div class="stats-card glass-panel hero-stat-hidden-mobile">
                <i class="fas fa-universal-access stat-icon" style="color: #a855f7;" aria-hidden="true"></i>
                <span class="stat-label">Accessible</span>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator animate-reveal" aria-hidden="true">
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<script>
    (function() {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let rafId = null;

        document.addEventListener('mousemove', (e) => {
            if (prefersReducedMotion.matches) return;
            const section = document.getElementById('hero-section');
            if (!section) return;

            if (rafId) cancelAnimationFrame(rafId);
            rafId = requestAnimationFrame(() => {
                const { clientX, clientY } = e;
                const { width, height } = section.getBoundingClientRect();

                const xPos = (clientX / width) - 0.5;
                const yPos = (clientY / height) - 0.5;

                const blobs = document.querySelectorAll('.hero-blob');
                blobs.forEach(blob => {
                    const speed = parseFloat(blob.getAttribute('data-speed') || '0.04');
                    const x = xPos * speed * 200;
                    const y = yPos * speed * 200;
                    blob.style.transform = `translate(${x}px, ${y}px)`;
                });
            });
        });
    })();
</script>