<?php
/**
 * Component: Interactive Ladder
 * Handles the animated descent and synchronized piecewise graph.
 */
$title = $blockData['title'] ?? 'Animated Ladder Descent';
$desc = $blockData['desc'] ?? 'Observe the physical elevation of the climber as he descends and pauses.';
$graphTitle = $blockData['graphTitle'] ?? 'Graph: Elevation vs. Time #3';
$graphDesc = $blockData['graphDesc'] ?? 'Watch the live synchronized marker trace the slope changes on the piecewise graph.';
?>

<section class="lesson-interactive-grid">
    <!-- Visual Animation Frame -->
    <div class="lesson-interactive-panel">
        <div>
            <h3 class="lesson-panel-title"><?php echo htmlspecialchars($title); ?></h3>
            <p class="lesson-panel-desc"><?php echo htmlspecialchars($desc); ?></p>
        </div>

        <div class="lesson-animation-frame">
            <!-- Simulated Ladder -->
            <div class="lesson-ladder-graphic" aria-hidden="true">
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
                <div class="lesson-ladder-rung"></div>
            </div>

            <!-- Ground label -->
            <div class="lesson-ground-label">
                Ground Level (0 feet)
            </div>

            <!-- 3ft step highlight (Water break) -->
            <div class="lesson-step-highlight" title="Step at 3 feet" aria-hidden="true"></div>
            <div class="lesson-step-text">3 ft step</div>

            <!-- Climbing Person Indicator -->
            <div id="ladder-climber" class="lesson-climber-wrapper" style="bottom: 252px;">
                <div class="lesson-climber-avatar" aria-hidden="true">
                    🏃
                </div>
                <div class="lesson-climber-pointer"></div>
                <div class="lesson-climber-bubble" id="elevation-bubble">
                    Height: 10.0 ft
                </div>
            </div>
        </div>

        <div class="lesson-controls-wrapper">
            <div class="lesson-status-bar">
                <span>Time: <span id="display-time-l1" class="lesson-time-value" aria-live="polite">0.0</span>s</span>
                <span>Status: <span id="display-status-l1" class="lesson-status-value" aria-live="polite">Ready</span></span>
            </div>
            <div class="lesson-btn-group">
                <button onclick="toggleLadderAnimation()" id="btn-play-l1" class="lesson-btn-primary">
                    Start Journey
                </button>
                <button onclick="resetLadderAnimation()" class="lesson-btn-secondary">
                    Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Live Sync Graph Frame -->
    <div class="lesson-graph-panel">
        <div>
            <h3 class="lesson-panel-title"><?php echo htmlspecialchars($graphTitle); ?></h3>
            <p class="lesson-panel-desc"><?php echo htmlspecialchars($graphDesc); ?></p>
        </div>

        <!-- SVG Graph -->
        <div class="lesson-svg-container">
            <svg id="ladder-graph" viewBox="0 0 400 300" class="lesson-svg" role="img" aria-label="Piecewise linear graph showing climber elevation over time: descends from 10ft to 3ft in 6s, stays at 3ft until 8.5s, descends to 0ft by 10s, stays at 0ft.">
                <title>Elevation vs. Time Graph</title>
                <!-- Grid lines -->
                <line x1="40" y1="20" x2="380" y2="20" class="svg-grid-line" />
                <line x1="40" y1="74" x2="380" y2="74" class="svg-grid-line" />
                <line x1="40" y1="128" x2="380" y2="128" class="svg-grid-line" />
                <line x1="40" y1="182" x2="380" y2="182" class="svg-grid-line" />
                <line x1="40" y1="236" x2="380" y2="236" class="svg-grid-line" />

                <!-- Vertical time grid marks -->
                <line x1="40" y1="20" x2="40" y2="260" class="svg-grid-line-vert" />
                <line x1="108" y1="20" x2="108" y2="260" class="svg-grid-line-vert-light" />
                <line x1="176" y1="20" x2="176" y2="260" class="svg-grid-line-vert-light" />
                <line x1="232.8" y1="20" x2="232.8" y2="260" class="svg-grid-line-vert-light" />
                <line x1="267" y1="20" x2="267" y2="260" class="svg-grid-line-vert-light" />
                <line x1="380" y1="20" x2="380" y2="260" class="svg-grid-line-vert-light" />

                <!-- X & Y Axes -->
                <line x1="40" y1="260" x2="380" y2="260" class="svg-axis" />
                <line x1="40" y1="20" x2="40" y2="260" class="svg-axis" />

                <!-- Labels -->
                <text x="35" y="25" text-anchor="end" class="svg-label">10</text>
                <text x="35" y="79" text-anchor="end" class="svg-label">8</text>
                <text x="35" y="133" text-anchor="end" class="svg-label">6</text>
                <text x="35" y="187" text-anchor="end" class="svg-label">4</text>
                <text x="35" y="241" text-anchor="end" class="svg-label">2</text>
                <text x="35" y="264" text-anchor="end" class="svg-label">0</text>
                <text x="15" y="140" transform="rotate(-90 15 140)" text-anchor="middle" class="svg-axis-title">Elevation (feet)</text>

                <!-- X Axis (Time in seconds) -->
                <text x="40" y="275" text-anchor="middle" class="svg-label">0</text>
                <text x="108" y="275" text-anchor="middle" class="svg-label">3</text>
                <text x="176" y="275" text-anchor="middle" class="svg-label">6</text>
                <text x="232.8" y="275" text-anchor="middle" class="svg-label">8.5</text>
                <text x="267" y="275" text-anchor="middle" class="svg-label">10</text>
                <text x="380" y="275" text-anchor="middle" class="svg-label">15</text>
                <text x="210" y="292" text-anchor="middle" class="svg-axis-title">Time (seconds)</text>

                <!-- Piecewise Function Segments -->
                <line x1="40" y1="20" x2="176" y2="209" class="svg-path" />
                <line x1="176" y1="209" x2="232.8" y2="209" class="svg-path" />
                <line x1="232.8" y1="209" x2="267" y2="260" class="svg-path" />
                <line x1="267" y1="260" x2="380" y2="260" class="svg-path" />

                <!-- Key Nodes -->
                <circle cx="40" cy="20" r="4" class="svg-node" />
                <circle cx="176" cy="209" r="4" class="svg-node" />
                <circle cx="232.8" cy="209" r="4" class="svg-node" />
                <circle cx="267" cy="260" r="4" class="svg-node" />
                <circle cx="380" cy="260" r="4" class="svg-node" />

                <!-- Live Tracker Dot -->
                <circle id="tracker-dot" cx="40" cy="20" r="7" class="svg-tracker" style="display: none;" />
            </svg>
        </div>

        <div class="lesson-segment-info-box">
            <h4 class="lesson-segment-title">Segment Explanations</h4>
            <div class="lesson-segment-grid">
                <div id="segment-info-1" class="lesson-segment-item">0 to 6s: Descent down ladder (constant speed)</div>
                <div id="segment-info-2" class="lesson-segment-item">6 to 8.5s: Standing still (drinking water)</div>
                <div id="segment-info-3" class="lesson-segment-item">8.5 to 10s: Descending last steps to floor</div>
                <div id="segment-info-4" class="lesson-segment-item">10 to 15s: At ground level, walking away</div>
            </div>
        </div>
    </div>
</section>
