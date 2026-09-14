<?php
/**
 * Component: Custom Story Builder
 * Interactive sliders and live SVG graph generator.
 */
$title = $blockData['title'] ?? 'Design Your Own Piecewise Graphing Story';
$desc = $blockData['desc'] ?? 'Modify each step of the journey and watch the custom graph below transform accordingly.';
?>

<section class="lesson-overview-section">
    <div>
        <h3 class="lesson-panel-title"><?php echo htmlspecialchars($title); ?></h3>
        <p class="lesson-panel-desc"><?php echo htmlspecialchars($desc); ?></p>
    </div>

    <div class="lesson-builder-grid">
        <!-- Segment 1 Control -->
        <div class="lesson-builder-control">
            <div class="lesson-builder-title">Interval 1: Start (0s) to Point A (4s)</div>
            <label for="custom-val-a" class="lesson-builder-label">Elevation at 4s:</label>
            <input type="range" id="custom-val-a" min="0" max="15" value="10" oninput="updateCustomGraph()" class="lesson-builder-range">
            <div class="lesson-builder-value"><span id="custom-lbl-a">10</span> feet</div>
        </div>
        <!-- Segment 2 Control -->
        <div class="lesson-builder-control">
            <div class="lesson-builder-title">Interval 2: Point A (4s) to Point B (7s)</div>
            <label for="custom-val-b" class="lesson-builder-label">Elevation at 7s:</label>
            <input type="range" id="custom-val-b" min="0" max="15" value="10" oninput="updateCustomGraph()" class="lesson-builder-range">
            <div class="lesson-builder-value"><span id="custom-lbl-b">10</span> feet</div>
        </div>
        <!-- Segment 3 Control -->
        <div class="lesson-builder-control">
            <div class="lesson-builder-title">Interval 3: Point B (7s) to End (10s)</div>
            <label for="custom-val-c" class="lesson-builder-label">Elevation at 10s:</label>
            <input type="range" id="custom-val-c" min="0" max="15" value="0" oninput="updateCustomGraph()" class="lesson-builder-range">
            <div class="lesson-builder-value"><span id="custom-lbl-c">0</span> feet</div>
        </div>
    </div>

    <div class="lesson-builder-output">
        <div class="lesson-builder-graph-container">
            <svg id="user-custom-graph" viewBox="0 0 300 200" class="lesson-svg" role="img" aria-label="Interactive custom piecewise linear graph builder.">
                <title>Interactive Custom Graph</title>
                <!-- Axes -->
                <line x1="30" y1="170" x2="280" y2="170" class="svg-axis" />
                <line x1="30" y1="20" x2="30" y2="170" class="svg-axis" />

                <!-- Graph limits -->
                <text x="25" y="25" text-anchor="end" class="svg-label-sm">15</text>
                <text x="25" y="174" text-anchor="end" class="svg-label-sm">0</text>
                <text x="30" y="182" text-anchor="middle" class="svg-label-sm">0s</text>
                <text x="130" y="182" text-anchor="middle" class="svg-label-sm">4s</text>
                <text x="205" y="182" text-anchor="middle" class="svg-label-sm">7s</text>
                <text x="280" y="182" text-anchor="middle" class="svg-label-sm">10s</text>

                <!-- Live path line -->
                <path id="user-graph-path" d="M 30,170 L 130,70 L 205,70 L 280,170" fill="none" class="svg-path" />
                <circle cx="30" cy="170" r="4" class="svg-node" />
                <circle id="user-node-a" cx="130" cy="70" r="4" class="svg-node" />
                <circle id="user-node-b" cx="205" cy="70" r="4" class="svg-node" />
                <circle id="user-node-c" cx="280" cy="170" r="4" class="svg-node" />
            </svg>
        </div>
        <div class="lesson-builder-interpretation">
            <h4 class="lesson-builder-interp-title">Live Graph Story Interpretations</h4>
            <ul class="lesson-builder-interp-list" id="custom-story-output">
                <li>0 to 4s: Climber climbs up to 10 feet.</li>
                <li>4 to 7s: Climber stays stationary at 10 feet.</li>
                <li>7 to 10s: Climber moves back down to ground level (0 feet).</li>
            </ul>
        </div>
    </div>
</section>
