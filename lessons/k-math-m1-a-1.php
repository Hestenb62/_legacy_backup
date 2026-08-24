<?php

/**
 * Hesten's Learning - Lesson 110.K.M1.A.1
 * Piecewise Linear Functions: Elevation vs Time
 */

$pageTitle = "Graphs of Piecewise Linear Functions | Hesten's Learning";
$pageDescription = "Learn how to define quantities, choose scales, and translate physical actions into piecewise graphs with interactive stories.";
$pageAuthor = "Hesten's Learning Team";

include '../src/header.php';
?>

<link rel="stylesheet" href="../assets/css/pages/lesson.css">

<main class="lesson-container">
    <div class="lesson-card">

        <!-- Header / Title -->
        <div class="lesson-header">
            <!-- Badge -->
            <span class="lesson-badge">
                <i class="fas fa-calculator lesson-badge-icon" aria-hidden="true"></i> Math Lesson K.M1.A.1
            </span>

            <h1 class="lesson-title">
                Graphs of Piecewise Linear Functions
            </h1>
            <p class="lesson-desc">
                Define appropriate quantities from physical situations, choose logical scales, and translate actions into piecewise graphs.
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights introduction -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title">Student & Teacher Overview: Lesson 1</h2>
                <span class="lesson-overview-pill">Piecewise Linear Functions</span>
            </div>

            <p class="lesson-overview-text">
                In this lesson, you will learn to define appropriate quantities from physical situations, choose logical scales, and translate actions into piecewise graphs. Explore the interactive ladder simulation below, and read the classroom discussion blocks to master these concepts.
            </p>

            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <li>Define appropriate variables to represent a physical situation.</li>
                        <li>Choose and interpret the scale and origin for a coordinate plane.</li>
                        <li>Understand that the slope of each line segment represents the average rate of change.</li>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text">
                        If students struggle, physically act out the story. Place tape on the floor and have them walk forward (positive slope), stand still (zero slope), and walk backward (negative slope) while drawing the graph together.
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Ladder Story -->
        <section class="lesson-interactive-grid">
            <!-- Visual Animation Frame -->
            <div class="lesson-interactive-panel">
                <div>
                    <h3 class="lesson-panel-title">Animated Ladder Descent</h3>
                    <p class="lesson-panel-desc">Observe the physical elevation of the climber as he descends and pauses.</p>
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
                    <h3 class="lesson-panel-title">Graph: Elevation vs. Time #3</h3>
                    <p class="lesson-panel-desc">Watch the live synchronized marker trace the slope changes on the piecewise graph.</p>
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

        <!-- Teacher Guide Discussion & Mathematics Breakdowns -->
        <section class="lesson-overview-section lesson-teacher-only">
            <h3 class="lesson-section-title">Teacher Guide Concepts: Deepen Your Understanding</h3>

            <div class="lesson-teacher-concepts">
                <div class="lesson-concept-card">
                    <h4 class="lesson-concept-title">Concept 1: Is a 2.5 ft/min Descent Speed Realistic on a Ladder?</h4>
                    <p class="lesson-concept-text">
                        In Example 1 of the teacher materials, students analyze a graph with a slope representing $2.5\text{ ft/min}$. While mathematically sound, a rate of $2.5\text{ ft/min}$ is incredibly slow for a person physically moving down a standard ladder (about $0.5\text{ inches per second}$). If we shift the horizontal unit of time from minutes to seconds, a speed of $2.5\text{ ft/sec}$ becomes perfectly realistic for a steady descent.
                    </p>
                </div>

                <div class="lesson-concept-card">
                    <h4 class="lesson-concept-title">Concept 2: Calculating Average Rate of Change</h4>
                    <p class="lesson-concept-text">
                        To compute the average rate of change over any interval, use the change in elevation divided by the change in time:
                    </p>
                    <div class="lesson-math-box">
                        <div class="lesson-math-formula">
                            <span>Average Rate of Change</span> =
                            <div class="lesson-math-fraction">
                                <span class="lesson-math-numerator">Δ Elevation</span>
                                <span class="lesson-math-denominator">Δ Time</span>
                            </div> =
                            <div class="lesson-math-fraction">
                                <span class="lesson-math-numerator">h(t<sub>2</sub>) - h(t<sub>1</sub>)</span>
                                <span class="lesson-math-denominator">t<sub>2</sub> - t<sub>1</sub></span>
                            </div>
                        </div>
                    </div>
                    <p class="lesson-concept-text">
                        For instance, between $t = 0$ and $t = 6$ seconds on our ladder descent:
                        $\frac{3 - 10}{6 - 0} = \frac{-7}{6} \approx -1.17\text{ ft/sec}$.
                        This negative rate represents a descent. When discussing descent speed, we refer to its absolute value: $1.17\text{ ft/sec}$.
                    </p>
                </div>

                <div class="lesson-concept-card">
                    <h4 class="lesson-concept-title">Concept 3: The 9 Distinct Time Intervals of the Video Story</h4>
                    <p class="lesson-concept-text">
                        In the lesson Exit Ticket, teachers analyze the full video of a man traversing stairs and platforms, which features nine distinct linear segments. Segmenting graphs into non-overlapping time intervals is a vital skill. Here are the exact nine time intervals identified in the curriculum guide:
                    </p>
                    <div class="lesson-interval-grid">
                        <div class="lesson-interval-item">1. Between 0 and 3 sec</div>
                        <div class="lesson-interval-item">2. Between 3 and 5.5 sec</div>
                        <div class="lesson-interval-item">3. Between 5.5 and 7 sec</div>
                        <div class="lesson-interval-item">4. Between 7 and 8.5 sec</div>
                        <div class="lesson-interval-item">5. Between 8.5 and 9 sec</div>
                        <div class="lesson-interval-item">6. Between 9 and 11 sec</div>
                        <div class="lesson-interval-item">7. Between 11 and 12.7 sec</div>
                        <div class="lesson-interval-item">8. Between 12.7 and 13 sec</div>
                        <div class="lesson-interval-item">9. From 13 sec onward</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Custom User Story Builder -->
        <section class="lesson-overview-section">
            <div>
                <h3 class="lesson-panel-title">Design Your Own Piecewise Graphing Story</h3>
                <p class="lesson-panel-desc">Modify each step of the journey and watch the custom graph below transform accordingly.</p>
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

        <!-- Vocabulary & Notes Section -->
        <section class="lesson-vocab-section">
            <!-- Vocabulary Panel -->
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon" aria-hidden="true"></i>Lesson Vocabulary
                    </h3>
                    <p class="lesson-panel-desc">Click on any term to see its definition and relevance to piecewise linear graphs.</p>
                </div>

                <div class="lesson-vocab-grid">
                    <!-- Card 1 -->
                    <div onclick="toggleVocabCard('vocab-1')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Piecewise Linear Function</h4>
                            <span class="lesson-vocab-icon" id="vocab-1-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-1-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                A function defined by multiple linear segments, each covering a specific interval of time or domain. The overall graph looks like joined straight lines with corners.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div onclick="toggleVocabCard('vocab-2')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Average Rate of Change</h4>
                            <span class="lesson-vocab-icon" id="vocab-2-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-2-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The change in the dependent variable (elevation) divided by the change in the independent variable (time) over a given interval. Graphically, this is the slope of the line segment.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div onclick="toggleVocabCard('vocab-3')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Independent Variable</h4>
                            <span class="lesson-vocab-icon" id="vocab-3-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-3-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The input value of a function, which changes independently (usually time, graphed on the horizontal axis).
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div onclick="toggleVocabCard('vocab-4')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Dependent Variable</h4>
                            <span class="lesson-vocab-icon" id="vocab-4-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-4-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The output value of a function, which depends on the input value (usually elevation/height, graphed on the vertical axis).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lesson Notes & Visual Explainers Panel -->
            <div class="lesson-study-guide-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-chalkboard-teacher lesson-icon" aria-hidden="true"></i>Visual Study Guides
                    </h3>
                    <p class="lesson-panel-desc">Toggle tabs below to explore interactive visual explainers of core concepts.</p>
                </div>

                <!-- Tab Buttons -->
                <div class="lesson-tab-nav">
                    <button onclick="switchExplainerTab('tab-slope')" id="btn-tab-slope" class="lesson-tab-btn active">
                        Slope & Motion
                    </button>
                    <button onclick="switchExplainerTab('tab-intervals')" id="btn-tab-intervals" class="lesson-tab-btn">
                        Time Intervals
                    </button>
                    <button onclick="switchExplainerTab('tab-speed')" id="btn-tab-speed" class="lesson-tab-btn">
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
        </section>

        <!-- Source Citation & Metadata Footer -->
        <div class="lesson-footer">
            <div class="lesson-citation-box">
                <span class="lesson-citation-title">Source Citation (MLA)</span>
                <p class="lesson-citation-text">Great Minds. "Graphs of Piecewise Linear Functions." Eureka Math, 2015. NYS Common Core Mathematics Curriculum.</p>
                <p class="lesson-citation-subtext">Developed using lesson materials from standard algebra curricula.</p>
            </div>

            <div class="lesson-footer-meta">
                <div>Unique Lesson ID: <span class="lesson-meta-id">L-ID-PIECEWISE-L1</span></div>
                <a href="../levels/k.php" class="lesson-btn-back">
                    <i class="fas fa-arrow-left lesson-btn-icon" aria-hidden="true"></i> BACK TO LEVEL K
                </a>
            </div>
        </div>

    </div>
</main>

<!-- Vanilla Javascript Logic for Graph Animation and Interactive State Controls -->
<script>
    // ==================== LESSON 1: LADDER DESCENT ANIMATION ENGINE ====================
    let ladderAnimationTimer = null;
    let ladderTime = 0;
    const totalLadderDuration = 15; // seconds
    const ladderClimber = document.getElementById('ladder-climber');
    const trackerDot = document.getElementById('tracker-dot');
    const displayTimeL1 = document.getElementById('display-time-l1');
    const displayStatusL1 = document.getElementById('display-status-l1');
    const btnPlayL1 = document.getElementById('btn-play-l1');

    function toggleLadderAnimation() {
        if (ladderAnimationTimer) {
            // Pause animation
            clearInterval(ladderAnimationTimer);
            ladderAnimationTimer = null;
            btnPlayL1.innerText = 'Resume Journey';
            displayStatusL1.innerText = 'Paused';
        } else {
            // Start animation loop
            btnPlayL1.innerText = 'Pause Journey';
            displayStatusL1.innerText = 'Climbing';
            trackerDot.style.display = 'block';

            ladderAnimationTimer = setInterval(() => {
                ladderTime += 0.05;
                if (ladderTime >= totalLadderDuration) {
                    ladderTime = totalLadderDuration;
                    clearInterval(ladderAnimationTimer);
                    ladderAnimationTimer = null;
                    btnPlayL1.innerText = 'Restart Journey';
                    displayStatusL1.innerText = 'Completed';
                }
                updateLadderState(ladderTime);
            }, 50);
        }
    }

    function resetLadderAnimation() {
        if (ladderAnimationTimer) {
            clearInterval(ladderAnimationTimer);
            ladderAnimationTimer = null;
        }
        ladderTime = 0;
        updateLadderState(0);
        btnPlayL1.innerText = 'Start Journey';
        displayStatusL1.innerText = 'Ready';
        trackerDot.style.display = 'none';
    }

    // Calculate and update the physical and graphed position coordinates
    function updateLadderState(time) {
        let height = 10;
        let statusText = 'Descending';

        // Reset segment highlight stylings
        for (let i = 1; i <= 4; i++) {
            document.getElementById(`segment-info-${i}`).className = 'p-1.5 rounded transition bg-transparent text-gray-500 dark:text-gray-400';
        }

        if (time <= 6) {
            // Interval 1: 0 to 6 seconds. Linear descent from 10ft down to 3ft.
            height = 10 - (7 / 6) * time;
            document.getElementById('segment-info-1').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else if (time <= 8.5) {
            // Interval 2: 6 to 8.5 seconds. Drinking water (stays flat at 3ft)
            height = 3;
            statusText = 'Drinking Water';
            document.getElementById('segment-info-2').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else if (time <= 10) {
            // Interval 3: 8.5 to 10 seconds. Descent to ground (3ft to 0ft)
            height = 3 - (3 / 1.5) * (time - 8.5);
            document.getElementById('segment-info-3').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else {
            // Interval 4: 10 to 15 seconds. Walk in the kitchen (0ft elevation)
            height = 0;
            statusText = 'Walking into kitchen';
            document.getElementById('segment-info-4').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        }

        // Limit bounds safely
        height = Math.max(0, Math.min(10, height));

        // Update physical climber height on page layout
        const bottomPercent = 24 + (height * 22.8);
        ladderClimber.style.bottom = `${bottomPercent}px`;
        document.getElementById('elevation-bubble').innerText = `Height: ${height.toFixed(1)} ft`;
        displayTimeL1.innerText = time.toFixed(1);
        displayStatusL1.innerText = statusText;

        // Map graph tracking node position
        const trackerX = 40 + (time / 15) * 340;
        const trackerY = 260 - (height / 10) * 240;

        trackerDot.setAttribute('cx', trackerX);
        trackerDot.setAttribute('cy', trackerY);
    }


    // ==================== USER CUSTOM STORY PLOTTER ====================
    function updateCustomGraph() {
        const valA = parseFloat(document.getElementById('custom-val-a').value);
        const valB = parseFloat(document.getElementById('custom-val-b').value);
        const valC = parseFloat(document.getElementById('custom-val-c').value);

        // Update text labels
        document.getElementById('custom-lbl-a').innerText = valA;
        document.getElementById('custom-lbl-b').innerText = valB;
        document.getElementById('custom-lbl-c').innerText = valC;

        // Update SVG nodes
        const yA = 170 - (valA / 15) * 150;
        const yB = 170 - (valB / 15) * 150;
        const yC = 170 - (valC / 15) * 150;

        // Move the line nodes
        document.getElementById('user-node-a').setAttribute('cy', yA);
        document.getElementById('user-node-b').setAttribute('cy', yB);
        document.getElementById('user-node-c').setAttribute('cy', yC);

        // Reconstruct path string
        const pathD = `M 30,170 L 130,${yA} L 205,${yB} L 280,${yC}`;
        document.getElementById('user-graph-path').setAttribute('d', pathD);

        // Generate verbal descriptions
        const storyList = document.getElementById('custom-story-output');
        storyList.innerHTML = '';

        let segment1Text = `0 to 4s: Climber `;
        if (valA > 0) {
            segment1Text += `climbs from ground level to ${valA} feet.`;
        } else {
            segment1Text += `remains flat at ground level.`;
        }

        let segment2Text = `4 to 7s: Climber `;
        if (valB > valA) {
            segment2Text += `continues climbing up from ${valA} feet to ${valB} feet.`;
        } else if (valB < valA) {
            segment2Text += `descends down from ${valA} feet to ${valB} feet.`;
        } else {
            segment2Text += `remains completely stationary at ${valA} feet.`;
        }

        let segment3Text = `7 to 10s: Climber `;
        if (valC > valB) {
            segment3Text += `ascends up to ${valC} feet.`;
        } else if (valC < valB) {
            segment3Text += `descends down to ${valC} feet.`;
        } else {
            segment3Text += `holds position constant at ${valB} feet.`;
        }

        storyList.innerHTML += `<li>${segment1Text}</li>`;
        storyList.innerHTML += `<li>${segment2Text}</li>`;
        storyList.innerHTML += `<li>${segment3Text}</li>`;
    }

    // ==================== LESSON VOCAB & NOTES FUNCTIONALITY ====================
    function toggleVocabCard(id) {
        const body = document.getElementById(`${id}-body`);
        const icon = document.getElementById(`${id}-icon`);

        if (body.style.maxHeight && body.style.maxHeight !== '0px') {
            body.style.maxHeight = '0px';
            icon.innerHTML = '<i class="fas fa-chevron-down"></i>';
        } else {
            // Close other open cards
            const allBodies = document.querySelectorAll('[id$="-body"]');
            const allIcons = document.querySelectorAll('[id$="-icon"]');
            allBodies.forEach(b => {
                if (b.id.startsWith('vocab-')) b.style.maxHeight = '0px';
            });
            allIcons.forEach(i => {
                if (i.id.startsWith('vocab-')) i.innerHTML = '<i class="fas fa-chevron-down"></i>';
            });

            body.style.maxHeight = body.scrollHeight + 'px';
            icon.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }
    }

    function switchExplainerTab(tabId) {
        const tabs = ['tab-slope', 'tab-intervals', 'tab-speed'];

        tabs.forEach(t => {
            const btn = document.getElementById(`btn-${t}`);
            const content = document.getElementById(`content-${t}`);

            if (t === tabId) {
                // Activate
                btn.classList.add('active');
                content.classList.add('active');
            } else {
                // Deactivate
                btn.classList.remove('active');
                content.classList.remove('active');
            }
        });
    }

    window.onload = function() {
        updateCustomGraph();
    }
</script>

<?php
include '../src/footer.php';
?>