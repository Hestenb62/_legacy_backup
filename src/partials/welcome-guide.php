<?php
/**
 * Welcome & Getting Started Guide Partial
 * 3-Step interactive onboarding banner for new learners, parents, and educators.
 * Dissolves smoothly when dismissed and saves to localStorage.
 * Can be reopened anytime via window.toggleWelcomeGuide() or the path header button.
 */
?>
<script>
    // Prevent Layout Flash for Returning Users who already dismissed the guide
    (function() {
        try {
            if (localStorage.getItem('hl_onboarding_guide_dismissed') === 'true') {
                document.write('<style id="welcome-guide-fouc-block">#welcome-guide-banner { display: none !important; }</style>');
            }
        } catch(e) {}
    })();
</script>

<aside class="welcome-guide-wrapper" id="welcome-guide-banner" aria-label="Welcome and Orientation Guide">
    <div class="welcome-guide-card animate-reveal">
        <!-- Header -->
        <header class="welcome-guide-header">
            <div class="welcome-guide-title-box">
                <span class="welcome-guide-icon-badge" aria-hidden="true">
                    <i class="fas fa-compass"></i>
                </span>
                <div>
                    <h2 class="welcome-guide-heading">New to Hesten's Learning? Welcome!</h2>
                    <p class="welcome-guide-desc">Quick 60-second orientation for students, parents, and teachers.</p>
                </div>
            </div>

            <button type="button" 
                    class="welcome-guide-close-btn" 
                    onclick="window.dismissWelcomeGuide(true)"
                    title="Dismiss welcome guide"
                    aria-label="Dismiss welcome guide and do not show again">
                <i class="fas fa-times" aria-hidden="true"></i>
                <span>Dismiss</span>
            </button>
        </header>

        <!-- Stepper Navigation Pills -->
        <nav class="welcome-guide-tabs" role="tablist" aria-label="Orientation Steps">
            <button type="button" 
                    role="tab" 
                    id="welcome-tab-1"
                    aria-selected="true" 
                    aria-controls="welcome-pane-1"
                    class="welcome-tab-btn active" 
                    onclick="window.setWelcomeStep(1)">
                <span>🌟 1. About Our Mission</span>
            </button>
            <button type="button" 
                    role="tab" 
                    id="welcome-tab-2"
                    aria-selected="false" 
                    aria-controls="welcome-pane-2"
                    class="welcome-tab-btn" 
                    onclick="window.setWelcomeStep(2)">
                <span>🧭 2. How the Curriculum Works</span>
            </button>
            <button type="button" 
                    role="tab" 
                    id="welcome-tab-3"
                    aria-selected="false" 
                    aria-controls="welcome-pane-3"
                    class="welcome-tab-btn" 
                    onclick="window.setWelcomeStep(3)">
                <span>🛠️ 3. Tools & Accommodations</span>
            </button>
        </nav>

        <!-- Step 1: About & Mission -->
        <div class="welcome-step-pane active" id="welcome-pane-1" role="tabpanel" aria-labelledby="welcome-tab-1">
            <div class="welcome-highlights-grid">
                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">🧠</span>
                    <h3 class="welcome-highlight-title">Neurodivergent-First Design</h3>
                    <p class="welcome-highlight-text">
                        Engineered from the ground up for autistic learners, ADHD, dyslexia, and dyscalculia. Structured for focused, calm mastery without sensory overload.
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">💎</span>
                    <h3 class="welcome-highlight-title">100% Free & Open Access</h3>
                    <p class="welcome-highlight-text">
                        No paywalls, zero advertisements, and no user tracking. Every single lesson, story, tool, and diagnostic assessment is available to all students.
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">🎯</span>
                    <h3 class="welcome-highlight-title">Empowerment Through Mastery</h3>
                    <p class="welcome-highlight-text">
                        Learn at your own pace. There are no punitive timers or high-stress exams—just clear feedback loops, gamified badges, and lifelong learning habits.
                    </p>
                </div>
            </div>
        </div>

        <!-- Step 2: How Curriculum Works -->
        <div class="welcome-step-pane" id="welcome-pane-2" role="tabpanel" aria-labelledby="welcome-tab-2">
            <div class="welcome-highlights-grid">
                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">📚</span>
                    <h3 class="welcome-highlight-title">Pre-K Through Grade 12</h3>
                    <p class="welcome-highlight-text">
                        Explore complete grade pathways categorized by Elementary, Middle, and High School, with deep coverage in Mathematics and English Language Arts.
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">🔍</span>
                    <h3 class="welcome-highlight-title">Standard Aligned & Modules</h3>
                    <p class="welcome-highlight-text">
                        Click the <strong>Curriculum</strong> button on any grade card to view aligned standards (CCSS & TEKS), detailed descriptions, and module break-downs.
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">⭐</span>
                    <h3 class="welcome-highlight-title">Bookmarks & Personal Mastery</h3>
                    <p class="welcome-highlight-text">
                        Click the star icon on any card to pin your active grade level to the top of your path. Your progress is saved automatically across all sessions.
                    </p>
                </div>
            </div>
        </div>

        <!-- Step 3: Tools & Accommodations -->
        <div class="welcome-step-pane" id="welcome-pane-3" role="tabpanel" aria-labelledby="welcome-tab-3">
            <div class="welcome-highlights-grid">
                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">🚀</span>
                    <h3 class="welcome-highlight-title">The Learning Launchpad</h3>
                    <p class="welcome-highlight-text">
                        Use the 5 quick-action cards above to practice flashcards (<code>Alt+F</code>), launch the study timer (<code>Alt+T</code>), or sketch on the scratchpad (<code>Alt+S</code>).
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">🧘</span>
                    <h3 class="welcome-highlight-title">Sensory Chamber Retreat</h3>
                    <p class="welcome-highlight-text">
                        Feeling overwhelmed? Enter the Sensory Chamber anytime for a soothing, low-stimulation visual space with relaxing nature sounds and ambient drones.
                    </p>
                </div>

                <div class="welcome-highlight-item">
                    <span class="welcome-highlight-icon" aria-hidden="true">👓</span>
                    <h3 class="welcome-highlight-title">Accessibility Studio (Alt+A)</h3>
                    <p class="welcome-highlight-text">
                        Press <code>Alt+A</code> anywhere to activate OpenDyslexic font, high-contrast dark themes, text-to-speech read-aloud, and reading guides.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Bar with Step Controls -->
        <footer class="welcome-guide-footer">
            <div class="welcome-guide-dots" aria-hidden="true">
                <span class="welcome-dot active" id="welcome-dot-1"></span>
                <span class="welcome-dot" id="welcome-dot-2"></span>
                <span class="welcome-dot" id="welcome-dot-3"></span>
            </div>

            <div class="welcome-guide-actions">
                <button type="button" 
                        class="welcome-btn-nav welcome-btn-prev hidden" 
                        id="welcome-prev-btn" 
                        onclick="window.stepWelcomeGuide(-1)">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i> Back
                </button>

                <button type="button" 
                        class="welcome-btn-nav welcome-btn-next" 
                        id="welcome-next-btn" 
                        onclick="window.stepWelcomeGuide(1)">
                    <span>Next</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </button>

                <button type="button" 
                        class="welcome-btn-nav welcome-btn-finish hidden" 
                        id="welcome-finish-btn" 
                        onclick="window.dismissWelcomeGuide(true)">
                    <span>Got it, Let's Learn! 🚀</span>
                </button>
            </div>
        </footer>
    </div>
</aside>

<script>
    (function() {
        let currentStep = 1;
        const totalSteps = 3;

        window.setWelcomeStep = function(step) {
            currentStep = Math.max(1, Math.min(totalSteps, step));

            // Update Tabs
            for (let i = 1; i <= totalSteps; i++) {
                const tab = document.getElementById(`welcome-tab-${i}`);
                const pane = document.getElementById(`welcome-pane-${i}`);
                const dot = document.getElementById(`welcome-dot-${i}`);

                if (tab) {
                    tab.classList.toggle('active', i === currentStep);
                    tab.setAttribute('aria-selected', i === currentStep ? 'true' : 'false');
                }
                if (pane) {
                    pane.classList.toggle('active', i === currentStep);
                }
                if (dot) {
                    dot.classList.toggle('active', i === currentStep);
                }
            }

            // Update Button visibility
            const prevBtn = document.getElementById('welcome-prev-btn');
            const nextBtn = document.getElementById('welcome-next-btn');
            const finishBtn = document.getElementById('welcome-finish-btn');

            if (prevBtn) prevBtn.classList.toggle('hidden', currentStep === 1);
            if (nextBtn) nextBtn.classList.toggle('hidden', currentStep === totalSteps);
            if (finishBtn) finishBtn.classList.toggle('hidden', currentStep !== totalSteps);
        };

        window.stepWelcomeGuide = function(direction) {
            window.setWelcomeStep(currentStep + direction);
        };

        window.dismissWelcomeGuide = function(permanently) {
            const banner = document.getElementById('welcome-guide-banner');
            if (banner) {
                banner.style.transition = 'all 0.35s ease-out';
                banner.style.opacity = '0';
                banner.style.transform = 'translateY(-15px) scale(0.98)';
                setTimeout(() => {
                    banner.style.display = 'none';
                }, 350);
            }
            if (permanently) {
                try {
                    localStorage.setItem('hl_onboarding_guide_dismissed', 'true');
                } catch(e) {}
            }
        };

        window.toggleWelcomeGuide = function() {
            const banner = document.getElementById('welcome-guide-banner');
            const foucBlock = document.getElementById('welcome-guide-fouc-block');
            if (foucBlock) foucBlock.remove();

            if (!banner) return;
            if (banner.style.display === 'none' || getComputedStyle(banner).display === 'none') {
                banner.style.display = 'block';
                banner.style.opacity = '0';
                banner.style.transform = 'translateY(-15px) scale(0.98)';
                setTimeout(() => {
                    banner.style.opacity = '1';
                    banner.style.transform = 'translateY(0) scale(1)';
                    banner.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 30);
            } else {
                window.dismissWelcomeGuide(false);
            }
        };
    })();
</script>
