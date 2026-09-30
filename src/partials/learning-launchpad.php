<?php
/**
 * Learning Launchpad Partial
 * Glassmorphic quick-action launcher for key educational tools.
 * Accessible, keyboard-operable, and UDL compliant.
 */
?>
<section class="learning-launchpad-section" aria-label="Learning Launchpad Quick Tools">
    <div class="learning-launchpad-container animate-reveal">
        <!-- Launchpad Header -->
        <header class="launchpad-header">
            <div class="launchpad-title-group">
                <span class="launchpad-badge-icon" aria-hidden="true">
                    <i class="fas fa-rocket"></i>
                </span>
                <div>
                    <h2 class="launchpad-title">Learning Launchpad</h2>
                    <p class="launchpad-subtitle">Interactive study studio & focus tools</p>
                </div>
            </div>
            <span class="launchpad-tools-count">7 Interactive Studios &amp; Tools</span>
        </header>

        <!-- 7-Tool Quick Actions Grid -->
        <div class="launchpad-grid" role="list">
            <!-- 1. Cosmic Skill Tree -->
            <a href="/pages/skills.php" 
               class="launchpad-item tool-skills" 
               role="listitem"
               aria-label="Explore Cosmic Skill Tree and Mastery Passport">
                <div class="launchpad-icon-box" aria-hidden="true" style="background: rgba(99, 102, 241, 0.2); color: #818cf8;">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h3 class="launchpad-tool-name">Skills Tree</h3>
                <p class="launchpad-tool-desc">Visual CCSS constellation map, daily quests, and badges.</p>
                <div class="launchpad-meta-row">
                    <span class="launchpad-shortcut-hint">Mastery Hub</span>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </a>

            <!-- 2. Manipulatives Lab -->
            <a href="/pages/manipulatives.php" 
               class="launchpad-item tool-manipulatives" 
               role="listitem"
               aria-label="Launch Interactive Math & Science Manipulatives Lab">
                <div class="launchpad-icon-box" aria-hidden="true" style="background: rgba(16, 185, 129, 0.2); color: #10b981;">
                    <i class="fas fa-cubes-stacked"></i>
                </div>
                <h3 class="launchpad-tool-name">Manipulatives</h3>
                <p class="launchpad-tool-desc">Fraction strips, base-10 blocks, and dynamic Cartesian grapher.</p>
                <div class="launchpad-meta-row">
                    <span class="launchpad-shortcut-hint">Math Lab</span>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </a>

            <!-- 3. Scratchpad Canvas & Whiteboard -->
            <button type="button" 
                    class="launchpad-item tool-scratchpad" 
                    role="listitem"
                    onclick="if(window.HLScratchpad){window.HLScratchpad.open('notes');}else{const btn = document.getElementById('scratchpad-toggle'); if (btn) btn.click();}" 
                    aria-label="Open Unified Scratchpad & Math Whiteboard (Shortcut: Alt+S)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h3 class="launchpad-tool-name">Scratchpad Studio</h3>
                <p class="launchpad-tool-desc">Tabbed notebooks, drawing whiteboard, and MathJax formula palette.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+S</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 4. Flashcard Studio -->
            <button type="button" 
                    class="launchpad-item tool-flashcards" 
                    role="listitem"
                    onclick="window.toggleFlashcardStudio ? window.toggleFlashcardStudio() : null" 
                    aria-label="Open Flashcard Studio (Shortcut: Alt+F)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3 class="launchpad-tool-name">Flashcards</h3>
                <p class="launchpad-tool-desc">Spaced repetition memory drills &amp; custom deck practice.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+F</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 5. Sensory Chamber -->
            <button type="button" 
                    class="launchpad-item tool-sensory" 
                    role="listitem"
                    onclick="window.SensoryChamber && window.SensoryChamber.open ? window.SensoryChamber.open() : null" 
                    aria-label="Enter Sensory Chamber for a calming retreat">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 class="launchpad-tool-name">Sensory Chamber</h3>
                <p class="launchpad-tool-desc">Low-stimulation calm room with soothing ambient audio.</p>
                <div class="launchpad-meta-row">
                    <span class="launchpad-shortcut-hint">UDL Retreat</span>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 6. Focus & Study Timer -->
            <button type="button" 
                    class="launchpad-item tool-timer" 
                    role="listitem"
                    onclick="window.toggleStudyTimer ? window.toggleStudyTimer() : null" 
                    aria-label="Open Focus & Study Timer (Shortcut: Alt+T)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <h3 class="launchpad-tool-name">Focus Timer</h3>
                <p class="launchpad-tool-desc">Pomodoro intervals &amp; daily study goal tracking.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+T</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 7. Diagnostic Assessment -->
            <a href="/assessment" 
               class="launchpad-item tool-diagnostic" 
               role="listitem"
               aria-label="Start Diagnostic Assessment to evaluate skills and placement">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="launchpad-tool-name">Diagnostic</h3>
                <p class="launchpad-tool-desc">Placement checks to generate personalized recommendations.</p>
                <div class="launchpad-meta-row">
                    <span class="launchpad-shortcut-hint">Skill Check</span>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
</section>
