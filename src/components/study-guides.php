<?php
/**
 * Component: Visual Study Guides
 * Multimodal tabbed explanations of core concepts with mini SVGs.
 */
$title = $blockData['title'] ?? 'Visual Study Guides';
$desc = $blockData['desc'] ?? 'Toggle tabs below to explore interactive visual explainers of core concepts.';
?>

<div class="lesson-study-guide-panel" style="margin-top: 2rem;">
    <div>
        <h3 class="lesson-vocab-main-title">
            <i class="fas fa-chalkboard-teacher lesson-icon" aria-hidden="true"></i><?php echo htmlspecialchars($title); ?>
        </h3>
        <p class="lesson-panel-desc"><?php echo htmlspecialchars($desc); ?></p>
    </div>

    <!-- Tab Buttons -->
    <div class="lesson-tab-nav">
        <button type="button" onclick="switchExplainerTab('tab-slope')" id="btn-tab-slope" class="lesson-tab-btn active">
            Slope & Motion
        </button>
        <button type="button" onclick="switchExplainerTab('tab-intervals')" id="btn-tab-intervals" class="lesson-tab-btn">
            Time Intervals
        </button>
        <button type="button" onclick="switchExplainerTab('tab-speed')" id="btn-tab-speed" class="lesson-tab-btn">
            Velocity vs. Speed
        </button>
    </div>

    <!-- Tab Content Area -->
    <div class="lesson-tab-content-container">

        <!-- TAB 1: Slope & Motion -->
        <div id="content-tab-slope" class="lesson-tab-content active">
            <div class="lesson-tab-concept-header">
                <span class="lesson-tab-concept-badge">Concept 1: Slopes are Story Actions</span>
                <p class="lesson-tab-concept-text">
                    On a height-vs-time graph, the steepness and direction of a line segment tell you exactly what the climber is doing:
                </p>
            </div>

            <!-- Mini SVG Visual Aid -->
            <div class="lesson-mini-svg-box">
                <svg viewBox="0 0 240 100" class="lesson-svg-mini" role="img" aria-label="Visual aid showing positive, zero, and negative slopes.">
                    <!-- Axes -->
                    <line x1="10" y1="90" x2="230" y2="90" stroke="#94a3b8" stroke-width="1.5" />
                    <line x1="10" y1="10" x2="10" y2="90" stroke="#94a3b8" stroke-width="1.5" />

                    <!-- Positive Slope (Green) -->
                    <line x1="10" y1="90" x2="80" y2="40" stroke="#10b981" stroke-width="3" stroke-linecap="round" />
                    <text x="45" y="30" text-anchor="middle" class="svg-label-sm" fill="#10b981">Ascent (+)</text>

                    <!-- Zero Slope (Yellow) -->
                    <line x1="80" y1="40" x2="150" y2="40" stroke="#f59e0b" stroke-width="3" stroke-linecap="round" />
                    <text x="115" y="30" text-anchor="middle" class="svg-label-sm" fill="#f59e0b">Pause (0)</text>

                    <!-- Negative Slope (Red) -->
                    <line x1="150" y1="40" x2="220" y2="90" stroke="#ef4444" stroke-width="3" stroke-linecap="round" />
                    <text x="185" y="30" text-anchor="middle" class="svg-label-sm" fill="#ef4444">Descent (-)</text>
                </svg>
            </div>

            <div class="lesson-legend-list">
                <div class="lesson-legend-item"><span class="lesson-legend-dot bg-emerald-500"></span><strong>Positive slope:</strong> Rising line. Elevation increases.</div>
                <div class="lesson-legend-item"><span class="lesson-legend-dot bg-amber-500"></span><strong>Zero slope:</strong> Flat line. Elevation is constant (paused/resting).</div>
                <div class="lesson-legend-item"><span class="lesson-legend-dot bg-rose-500"></span><strong>Negative slope:</strong> Falling line. Elevation decreases.</div>
            </div>
        </div>

        <!-- TAB 2: Time Intervals -->
        <div id="content-tab-intervals" class="lesson-tab-content">
            <div class="lesson-tab-concept-header">
                <span class="lesson-tab-concept-badge">Concept 2: Slicing the Domain</span>
                <p class="lesson-tab-concept-text">
                    A piecewise graph breaks a continuous domain (time) into distinct parts. Each action occurs within its own boundaries:
                </p>
            </div>

            <!-- Interval Visual SVG Timeline -->
            <div class="lesson-mini-svg-box">
                <svg viewBox="0 0 240 50" class="lesson-svg-mini" role="img" aria-label="Visual timeline dividing domain intervals.">
                    <!-- Base line -->
                    <line x1="10" y1="25" x2="230" y2="25" stroke="#cbd5e1" stroke-width="4" stroke-linecap="round" />

                    <!-- Segments -->
                    <line x1="10" y1="25" x2="100" y2="25" stroke="#f43f5e" stroke-width="4" />
                    <line x1="100" y1="25" x2="160" y2="25" stroke="#3b82f6" stroke-width="4" />

                    <!-- Points -->
                    <circle cx="10" cy="25" r="5" class="fill-gray-400" />
                    <text x="10" y="42" text-anchor="middle" class="svg-label-sm">0s</text>

                    <circle cx="100" cy="25" r="5" class="fill-rose-500" />
                    <text x="100" y="42" text-anchor="middle" class="svg-label-sm" fill="#f43f5e">6s</text>

                    <circle cx="160" cy="25" r="5" class="fill-blue-500" />
                    <text x="160" y="42" text-anchor="middle" class="svg-label-sm" fill="#3b82f6">8.5s</text>

                    <circle cx="230" cy="25" r="5" class="fill-gray-400" />
                    <text x="230" y="42" text-anchor="middle" class="svg-label-sm">15s</text>

                    <!-- Span markers -->
                    <path d="M 12 18 Q 55 8 98 18" fill="none" stroke="#f43f5e" stroke-width="1" />
                    <text x="55" y="6" text-anchor="middle" class="svg-label-tiny" fill="#f43f5e">Interval 1</text>

                    <path d="M 102 18 Q 130 10 158 18" fill="none" stroke="#3b82f6" stroke-width="1" />
                    <text x="130" y="6" text-anchor="middle" class="svg-label-tiny" fill="#3b82f6">Interval 2</text>
                </svg>
            </div>

            <div class="lesson-legend-list">
                <p>
                    <strong>Mathematical notation:</strong> Intervals are written as inequality bounds. For example, Segment 1 is active when:
                </p>
                <div class="lesson-inequality-box">
                    0 &le; t &le; 6
                </div>
            </div>
        </div>

        <!-- TAB 3: Velocity vs. Speed -->
        <div id="content-tab-speed" class="lesson-tab-content">
            <div class="lesson-tab-concept-header">
                <span class="lesson-tab-concept-badge">Concept 3: Sign of Rate of Change</span>
                <p class="lesson-tab-concept-text">
                    Rate of change (velocity) carries direction: it's positive for going up, and negative for going down. Speed is just how fast, always positive:
                </p>
            </div>

            <div class="lesson-speed-grid">
                <div class="lesson-speed-card">
                    <span class="lesson-speed-card-title text-emerald-600">Climbing Up</span>
                    <div class="lesson-speed-rate">Rate: <span class="text-emerald-600">+1.5 ft/s</span></div>
                    <div class="lesson-speed-value">Speed: 1.5 ft/s</div>
                </div>
                <div class="lesson-speed-card">
                    <span class="lesson-speed-card-title text-rose-600">Climbing Down</span>
                    <div class="lesson-speed-rate">Rate: <span class="text-rose-600">-1.17 ft/s</span></div>
                    <div class="lesson-speed-value">Speed: 1.17 ft/s</div>
                </div>
            </div>

            <div class="lesson-key-takeaway">
                <p class="lesson-takeaway-text">
                    <i class="fas fa-info-circle lesson-takeaway-icon" aria-hidden="true"></i>
                    <strong>Key Takeaway:</strong> Average rate of change = slope. Speed = absolute value of the slope. Speed can never be negative!
                </p>
            </div>
        </div>

    </div>
</div>
