<!-- AURORA HERO SECTION -->
<div id="hero-section" class="hero-section">

    <!-- Aurora Mesh Background -->
    <div class="hero-bg noise-grain" id="hero-bg">
        <div data-speed="0.05" class="hero-blob hero-blob-1"></div>
        <div data-speed="-0.03" class="hero-blob hero-blob-2"></div>
        <div data-speed="0.04" class="hero-blob hero-blob-3"></div>
    </div>

    <div class="container hero-content text-center flex flex-col items-center relative" style="z-index: 10;">
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
        <div class="hero-actions flex flex-wrap justify-center gap-4 animate-reveal">
            <a href="/assessment" class="btn-premium btn-primary flex items-center gap-2 group">
                <span>Start Your Journey</span>
                <i class="fas fa-arrow-right hero-arrow-icon group-hover-translate"></i>
            </a>
            <a href="/curriculum.php" class="btn-premium btn-secondary">
                Explore Curriculum
            </a>
        </div>

        <!-- Quick Stats (Glass Cards) -->
        <div class="hero-stats grid grid-cols-2 lg:grid-cols-4 gap-4 animate-reveal">
            <div class="stats-card glass-panel">
                <span class="stat-value text-primary" id="user-progress-stat">0%</span>
                <span class="stat-label">Mastery</span>
            </div>
            <div class="stats-card glass-panel">
                <div class="flex items-center gap-2 justify-center">
                    <i class="fas fa-fire" style="color: var(--color-warning);"></i>
                    <span class="stat-value" style="color: var(--color-warning);" id="streak-stat">0</span>
                </div>
                <span class="stat-label">Active Streak</span>
            </div>
            <div class="stats-card glass-panel hidden md-flex">
                <i class="fas fa-shield-check stat-icon" style="color: var(--color-success);"></i>
                <span class="stat-label">Safe Space</span>
            </div>
            <div class="stats-card glass-panel hidden md-flex">
                <i class="fas fa-universal-access stat-icon" style="color: #a855f7;"></i>
                <span class="stat-label">Accessible</span>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator animate-reveal">
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<script>
    document.addEventListener('mousemove', (e) => {
        const section = document.getElementById('hero-section');
        if (!section) return;

        const { clientX, clientY } = e;
        const { width, height } = section.getBoundingClientRect();

        const xPos = (clientX / width) - 0.5;
        const yPos = (clientY / height) - 0.5;

        const blobs = document.querySelectorAll('.hero-blob');
        blobs.forEach(blob => {
            const speed = blob.getAttribute('data-speed');
            const x = xPos * speed * 200;
            const y = yPos * speed * 200;
            blob.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
</script>