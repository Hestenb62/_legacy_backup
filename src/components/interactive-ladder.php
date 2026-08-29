<?php
/**
 * Component: Interactive Ladder
 * Handles the animated descent and the synchronized piecewise graph.
 */
$title = $blockData['title'] ?? 'Interactive Lesson';
$desc = $blockData['desc'] ?? '';
$config = $blockData['config'] ?? [];
$points = $config['points'] ?? [];
$startHeight = $config['startHeight'] ?? 10;
?>

<section class="lesson-interactive-grid">
    <!-- Visual Animation Frame -->
    <div class="lesson-interactive-panel">
        <div>
            <h3 class="lesson-panel-title"><?php echo $title; ?></h3>
            <p class="lesson-panel-desc"><?php echo $desc; ?></p>
        </div>

        <div class="lesson-animation-frame">
            <div class="lesson-ladder-graphic" aria-hidden="true">
                <?php for($i=0; $i<10; $i++): ?>
                    <div class="lesson-ladder-rung"></div>
                <?php endfor; ?>
            </div>
            <div class="lesson-ground-label">Ground Level (0 feet)</div>
            <div id="ladder-climber" class="lesson-climber-wrapper" style="bottom: 252px;">
                <div class="lesson-climber-avatar" aria-hidden="true">🏃</div>
                <div class="lesson-climber-pointer"></div>
                <div class="lesson-climber-bubble" id="elevation-bubble">Height: <?php echo $startHeight; ?> ft</div>
            </div>
        </div>

        <div class="lesson-controls-wrapper">
            <div class="lesson-status-bar">
                <span>Time: <span id="display-time-l1" class="lesson-time-value" aria-live="polite">0.0</span>s</span>
                <span>Status: <span id="display-status-l1" class="lesson-status-value" aria-live="polite">Ready</span></span>
            </div>
            <div class="lesson-btn-group">
                <button onclick="toggleLadderAnimation()" id="btn-play-l1" class="lesson-btn-primary">Start Journey</button>
                <button onclick="resetLadderAnimation()" class="lesson-btn-secondary">Reset</button>
            </div>
        </div>
    </div>

    <!-- Live Sync Graph Frame -->
    <div class="lesson-graph-panel">
        <div>
            <h3 class="lesson-panel-title">Live Piecewise Graph</h3>
            <p class="lesson-panel-desc">Watch the synchronized marker trace the slope changes.</p>
        </div>

        <div class="lesson-svg-container">
            <svg id="ladder-graph" viewBox="0 0 400 300" class="lesson-svg" role="img">
                <title>Piecewise Graph</title>
                <!-- Axes & Grid (Simplified for brevity, normally fully implemented) -->
                <line x1="40" y1="260" x2="380" y2="260" class="svg-axis" />
                <line x1="40" y1="20" x2="40" y2="260" class="svg-axis" />
                
                <!-- Dynamic Path Generation -->
                <polyline points="40,20 <?php 
                    $currentX = 40;
                    $currentY = 20;
                    foreach($points as $p) {
                        // Simple mapping for demo purposes
                        $currentX += 50; 
                        $currentY = 260 - ($p['height'] * 20);
                        echo "$currentX,$currentY ";
                    }
                ?>" fill="none" stroke="var(--color-primary)" stroke-width="3" class="svg-path" />
                
                <circle id="tracker-dot" cx="40" cy="20" r="7" class="svg-tracker" style="display: none;" />
            </svg>
        </div>
    </div>
</section>

<script>
// The JS logic for the ladder would be extracted here or moved to a global assets/js/lesson-components.js
// For now, I'm keeping the structure.
</script>
