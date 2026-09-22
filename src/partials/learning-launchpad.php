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
            <span class="launchpad-tools-count">5 Core Tools</span>
        </header>

        <!-- 5-Tool Quick Actions Grid -->
        <div class="launchpad-grid" role="list">
            <!-- 1. Flashcard Studio -->
            <button type="button" 
                    class="launchpad-item tool-flashcards" 
                    role="listitem"
                    onclick="window.toggleFlashcardStudio ? window.toggleFlashcardStudio() : null" 
                    aria-label="Open Flashcard Studio (Shortcut: Alt+F)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3 class="launchpad-tool-name">Flashcards</h3>
                <p class="launchpad-tool-desc">Spaced repetition memory drills & custom deck practice.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+F</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 2. Sensory Chamber -->
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

            <!-- 3. Scratchpad Canvas -->
            <button type="button" 
                    class="launchpad-item tool-scratchpad" 
                    role="listitem"
                    onclick="const btn = document.getElementById('scratchpad-toggle'); if (btn) btn.click();" 
                    aria-label="Open Scratchpad Canvas (Shortcut: Alt+S)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h3 class="launchpad-tool-name">Scratchpad</h3>
                <p class="launchpad-tool-desc">Interactive canvas for math scratchwork & quick notes.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+S</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 4. Focus & Study Timer -->
            <button type="button" 
                    class="launchpad-item tool-timer" 
                    role="listitem"
                    onclick="window.toggleStudyTimer ? window.toggleStudyTimer() : null" 
                    aria-label="Open Focus & Study Timer (Shortcut: Alt+T)">
                <div class="launchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <h3 class="launchpad-tool-name">Focus Timer</h3>
                <p class="launchpad-tool-desc">Pomodoro intervals & daily study goal tracking.</p>
                <div class="launchpad-meta-row">
                    <kbd class="launchpad-shortcut-hint">Alt+T</kbd>
                    <i class="fas fa-arrow-right launchpad-arrow-icon" aria-hidden="true"></i>
                </div>
            </button>

            <!-- 5. Diagnostic Assessment -->
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
