<!-- AURORA HERO SECTION -->
<div id="hero-section" class="hero-section">

    <!-- Keyboard Skip Link for WCAG AAA Compliance -->
    <a href="#main-content" class="hero-skip-link">Skip to Academic Path</a>

    <!-- Aurora Mesh Background -->
    <div class="hero-bg noise-grain" id="hero-bg">
        <div data-speed="0.05" class="hero-blob hero-blob-1"></div>
        <div data-speed="-0.03" class="hero-blob hero-blob-2"></div>
        <div data-speed="0.04" class="hero-blob hero-blob-3"></div>
    </div>

    <div class="container hero-content" style="z-index: 10;">
        <!-- Dynamic Pill Badge -->
        <div class="hero-pill animate-reveal" id="hero-pill-badge" tabindex="0" role="status" aria-live="polite">
            <span class="hero-ping-dot" id="hero-ping-container" aria-hidden="true">
                <span class="ping-anim"></span>
                <span class="ping-core"></span>
            </span>
            <span class="hero-pill-avatar hidden" id="hero-pill-avatar" aria-hidden="true"></span>
            <span class="hero-pill-text" id="hero-dynamic-greeting">THE LEARNING ODYSSEY</span>
            <span class="hero-pill-grade-badge hidden" id="hero-pill-grade"></span>
        </div>

        <!-- Main Heading -->
        <h1 class="hero-title animate-reveal">
            Ignite Your <br />
            <span class="hero-title-highlight">Curiosity</span>
        </h1>

        <p class="hero-subtitle animate-reveal" id="hero-dynamic-subtitle">
            A beautifully crafted educational experience. Personalized, accessible, and structured for focused mastery.
        </p>

        <!-- CTA Buttons -->
        <div class="hero-actions animate-reveal">
            <!-- Dynamic 1-Click Jump to Student's Enrolled Grade (Personalization) -->
            <button type="button" 
                    id="hero-jump-grade-btn" 
                    class="btn-premium btn-grade-jump hidden" 
                    onclick="window.jumpToEnrolledGrade ? window.jumpToEnrolledGrade() : null"
                    aria-label="Jump directly to your enrolled grade level">
                <i class="fas fa-graduation-cap hero-jump-icon"></i>
                <span id="hero-jump-btn-text">Jump to My Grade</span>
            </button>

            <a href="/assessment" class="btn-premium btn-primary hero-btn-start" id="hero-primary-cta">
                <span id="hero-primary-cta-text">Start Your Journey</span>
                <i class="fas fa-arrow-right hero-arrow-icon" aria-hidden="true"></i>
            </a>

            <a href="/pages/standards.php" class="btn-premium btn-secondary">
                <i class="fas fa-compass" style="margin-right: 0.5rem; opacity: 0.7;"></i>
                Explore Standards
            </a>
        </div>

        <!-- Dynamic Quick Stats (Glass Cards) -->
        <div class="hero-stats animate-reveal" role="region" aria-label="Student Learning Highlights">
            <!-- 1. Mastery Progress % -->
            <div class="stats-card glass-panel" title="Percentage of curriculum completed">
                <span class="stat-value text-primary" id="user-progress-stat">0%</span>
                <span class="stat-label">Curriculum Mastery</span>
            </div>

            <!-- 2. Active Daily Streak -->
            <div class="stats-card glass-panel" title="Consecutive daily study streak">
                <div class="hero-stat-streak">
                    <i class="fas fa-fire flame-animated" style="color: var(--color-warning, #f59e0b);" aria-hidden="true"></i>
                    <span class="stat-value" style="color: var(--color-warning, #f59e0b);" id="streak-stat">0</span>
                </div>
                <span class="stat-label">Day Streak</span>
            </div>

            <!-- 3. Skills Mastered Counter -->
            <div class="stats-card glass-panel" title="Standards and key skills mastered">
                <div class="hero-stat-streak">
                    <i class="fas fa-award" style="color: #10b981;" aria-hidden="true"></i>
                    <span class="stat-value" style="color: #10b981;" id="standards-mastered-stat">0</span>
                </div>
                <span class="stat-label">Skills Mastered</span>
            </div>

            <!-- 4. Gamification Level & XP -->
            <div class="stats-card glass-panel" title="Current gamification tier and experience points">
                <div class="hero-stat-streak">
                    <i class="fas fa-bolt" style="color: #8b5cf6;" aria-hidden="true"></i>
                    <span class="stat-value" style="color: #8b5cf6;" id="user-level-stat">Lv. 1</span>
                </div>
                <span class="stat-label" id="user-xp-label">0 XP</span>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <a href="#main-content" class="scroll-indicator animate-reveal" aria-label="Scroll down to learning paths">
        <i class="fas fa-chevron-down" aria-hidden="true"></i>
    </a>
</div>

<script>
    document.addEventListener('mousemove', (e) => {
        // Obey Reduced Motion and Sensory Retreat
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        try {
            const acc = localStorage.getItem('hesten_parent_accommodations');
            if (acc && acc.includes('sensory-retreat')) return;
        } catch(e) {}

        const section = document.getElementById('hero-section');
        if (!section) return;

        const { clientX, clientY } = e;
        const { width, height } = section.getBoundingClientRect();

        const xPos = (clientX / width) - 0.5;
        const yPos = (clientY / height) - 0.5;

        const blobs = document.querySelectorAll('.hero-blob');
        blobs.forEach(blob => {
            const speed = blob.getAttribute('data-speed');
            const x = xPos * speed * 180;
            const y = yPos * speed * 180;
            blob.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
</script>