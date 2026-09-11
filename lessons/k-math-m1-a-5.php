<?php
/**
 * Hesten's Learning - Lesson K.M1.A.5
 * Two Graphing Stories
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

$pageTitle = "Two Graphing Stories: Motion & Coordinate Modeling | Hesten's Learning";
$pageDescription = "Connect physical motion stories to piecewise coordinate graphs of elevation and speed with animated real-time simulators.";
$pageAuthor = "Hesten's Learning Team";
$requiresMathJax = true;

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/lesson.css">

<main class="lesson-container">
    <div class="lesson-card">
        <!-- Navigation Back to Level K -->
        <nav class="lesson-top-nav" aria-label="Lesson navigation" style="margin-bottom: 1.5rem;">
            <a href="<?= isset($levelUrl) ? htmlspecialchars($levelUrl) : '../levels/k.php' ?>" class="lesson-back-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; font-weight: 700; color: var(--color-primary); text-decoration: none; padding: 0.45rem 1rem; background: color-mix(in srgb, var(--color-primary) 10%, transparent); border: 1px solid color-mix(in srgb, var(--color-primary) 20%, transparent); border-radius: 9999px; transition: all 0.2s ease;">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                <span>Back to Level K (Algebra I)</span>
            </a>
        </nav>

        <!-- Header / Title -->
        <div class="lesson-header">
            <span class="lesson-badge">
                <i class="fas fa-calculator lesson-badge-icon" aria-hidden="true"></i> Math Lesson K.M1.A.5
            </span>
            <h1 class="lesson-title">Two Graphing Stories — Modeling Physical Motion</h1>
            <p class="lesson-desc">
                Can a picture tell two different stories? Translate physical events into piecewise mathematical graphs and discover how slope reveals velocity, rest intervals, and elevation changes.
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title">Student & Teacher Overview: Lesson 5</h2>
                <span class="lesson-overview-pill">Motion & Graphical Translation</span>
            </div>
            <p class="lesson-overview-text">
                In this lesson, you will analyze two classic motion scenarios: a hiker descending and ascending a canyon (Elevation vs. Time) and a skateboarder accelerating down a ramp and coasting across flat ground (Speed vs. Time). Use the animated simulator below to link physical motion directly with piecewise coordinate graphs.
            </p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <li>Match physical motion scenarios with piecewise continuous functions and coordinate graphs.</li>
                        <li>Distinguish between an <em>Elevation vs. Time</em> graph (where $y$ represents physical vertical altitude) and a <em>Speed vs. Time</em> graph (where $y$ represents rate of motion).</li>
                        <li>Interpret the physical meaning of negative, positive, and zero slopes in different physical contexts.</li>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text">
                        Beware the "Graph as Picture" trap: students frequently mistake a graph's shape for the physical road or hill. Remind students that on a Speed vs. Time graph, a downward slope does <em>not</em> mean the skateboarder is going downhill—it means they are slowing down!
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Two Graphing Stories Simulator Workbench -->
        <section class="lesson-sim-workbench" aria-labelledby="story-sim-title">
            <div class="lesson-sim-header">
                <div class="lesson-sim-title-wrap">
                    <h3 id="story-sim-title" class="lesson-sim-title">
                        <i class="fas fa-play-circle" aria-hidden="true"></i> Animated Graphing Story Studio
                    </h3>
                    <p class="lesson-sim-subtitle">
                        Select a motion scenario below. Play the animation or drag the timeline scrubber to observe how the visual motion directly traces the coordinate graph in real time.
                    </p>
                </div>
                <div class="lesson-sim-presets">
                    <button type="button" id="tab-story-1" class="lesson-sim-preset-btn active" onclick="switchStory('hiker')" style="border-color: #10b981; color: #10b981;">
                        <i class="fas fa-hiking"></i> Story 1: Canyon Hiker (Elevation)
                    </button>
                    <button type="button" id="tab-story-2" class="lesson-sim-preset-btn" onclick="switchStory('skater')">
                        <i class="fas fa-skating"></i> Story 2: Skater (Speed)
                    </button>
                </div>
            </div>

            <div class="lesson-sim-grid">
                <!-- Controls & Narrative Column -->
                <div class="lesson-sim-controls">
                    <div class="lesson-sim-slider-box">
                        <div class="lesson-sim-slider-label">
                            <span>Elapsed Time (<strong id="story-unit-t" style="color: #10b981;">t</strong>):</span>
                            <span id="story-time-badge" class="lesson-sim-step-badge" style="background: rgba(16, 185, 129, 0.15); color: #10b981; border-color: rgba(16, 185, 129, 0.3);">0.0 min</span>
                        </div>
                        <input type="range" id="story-time-slider" min="0" max="10" value="0" step="0.1" oninput="scrubStory(parseFloat(this.value))" class="lesson-sim-slider" aria-label="Story time scrubber">
                        
                        <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem; align-items: center;">
                            <button type="button" id="story-play-btn" class="tool-btn" onclick="toggleStoryPlay()" style="background: #10b981; color: white; border: none; padding: 0.4rem 1.25rem; border-radius: 9999px; font-weight: 800; cursor: pointer;">
                                <i class="fas fa-play" id="story-play-icon"></i> <span id="story-play-text">Play Motion</span>
                            </button>
                            <button type="button" class="tool-btn" onclick="resetStory()" style="padding: 0.4rem 0.85rem; border-radius: 9999px;">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>

                    <div class="lesson-sim-stat-grid">
                        <div class="lesson-sim-stat-card" style="border-color: rgba(16, 185, 129, 0.3);">
                            <span class="lesson-sim-stat-tag" id="stat-dep-tag"><i class="fas fa-mountain" style="color: #10b981;"></i> Current Elevation $h(t)$</span>
                            <span id="stat-story-y" class="lesson-sim-stat-val" style="color: #10b981;">1,200 ft</span>
                            <span id="stat-story-ydesc" class="lesson-sim-stat-calc">Altitude above sea level</span>
                        </div>
                        <div class="lesson-sim-stat-card" style="border-color: rgba(245, 158, 11, 0.3);">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-chart-line" style="color: #f59e0b;"></i> Segment Slope</span>
                            <span id="stat-story-slope" class="lesson-sim-stat-val" style="color: #f59e0b;">-200 ft/min</span>
                            <span id="stat-story-slopedesc" class="lesson-sim-stat-calc">Negative slope = descending</span>
                        </div>
                    </div>

                    <div class="lesson-sim-ratio-box" style="margin-top: 1rem;">
                        <div class="lesson-sim-ratio-pill" id="story-phase-pill" style="background: rgba(16, 185, 129, 0.12); color: #10b981; border-color: rgba(16, 185, 129, 0.25);">
                            <i class="fas fa-walking"></i> <span id="story-phase-desc">Starting at canyon rim trail head ($1,200\text{ ft}$).</span>
                        </div>
                    </div>
                </div>

                <!-- Synchronized SVG Motion & Coordinate Visualizer -->
                <div class="lesson-sim-visualizer" style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <!-- Visual Motion Stage -->
                    <div style="background: var(--color-base-bg, #0f172a); border: 1px solid var(--color-border, #334155); border-radius: 1rem; padding: 0.75rem; position: relative;">
                        <span style="position: absolute; top: 0.5rem; left: 0.75rem; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #64748b;" id="stage-label">Physical Scene View</span>
                        <svg id="stage-svg" viewBox="0 0 440 90" style="width: 100%; height: auto;">
                            <!-- Stage Scene Backdrop (Canyon Profile) -->
                            <path id="stage-terrain" d="M 10 20 L 150 75 L 260 75 L 430 30" fill="none" stroke="#334155" stroke-width="3" stroke-linecap="round" />
                            <!-- Character Marker -->
                            <g id="character-group" transform="translate(10, 20)">
                                <circle cx="0" cy="-8" r="7" fill="#10b981" stroke="#ffffff" stroke-width="1.5" />
                                <path d="M 0 -1 L 0 10 M -5 3 L 5 3 M 0 10 L -4 18 M 0 10 L 4 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>

                    <!-- Coordinate Graph View -->
                    <div style="background: var(--color-base-bg, #0f172a); border: 1px solid var(--color-border, #334155); border-radius: 1rem; padding: 1rem;">
                        <svg id="story-graph-svg" viewBox="0 0 440 180" style="width: 100%; height: auto; overflow: visible;">
                            <!-- Axes -->
                            <line x1="40" y1="20" x2="40" y2="150" stroke="#334155" stroke-width="1.5" />
                            <line x1="40" y1="150" x2="420" y2="150" stroke="#334155" stroke-width="1.5" />
                            
                            <!-- Guides -->
                            <line x1="40" y1="110" x2="420" y2="110" stroke="#1e293b" stroke-dasharray="3,3" />
                            <line x1="40" y1="70" x2="420" y2="70" stroke="#1e293b" stroke-dasharray="3,3" />
                            <line x1="40" y1="30" x2="420" y2="30" stroke="#1e293b" stroke-dasharray="3,3" />

                            <!-- Y Labels -->
                            <text id="graph-y-0" x="32" y="154" fill="#64748b" font-size="9" text-anchor="end">0</text>
                            <text id="graph-y-mid" x="32" y="93" fill="#64748b" font-size="9" text-anchor="end">800</text>
                            <text id="graph-y-max" x="32" y="34" fill="#64748b" font-size="9" text-anchor="end">1,600</text>
                            <text id="graph-y-title" x="10" y="85" fill="#94a3b8" font-size="10" font-weight="700" transform="rotate(-90 10 85)" text-anchor="middle">Elevation (ft)</text>

                            <!-- X Labels -->
                            <text x="40" y="165" fill="#64748b" font-size="9" text-anchor="middle">0</text>
                            <text x="135" y="165" fill="#64748b" font-size="9" text-anchor="middle">2.5</text>
                            <text x="230" y="165" fill="#64748b" font-size="9" text-anchor="middle">5.0</text>
                            <text x="325" y="165" fill="#64748b" font-size="9" text-anchor="middle">7.5</text>
                            <text x="418" y="165" fill="#64748b" font-size="9" text-anchor="middle">10.0</text>
                            <text id="graph-x-title" x="230" y="178" fill="#94a3b8" font-size="10" font-weight="700" text-anchor="middle">Time (Minutes)</text>

                            <!-- Curve Background & Active -->
                            <path id="graph-curve-bg" d="M 40 55 L 173 130 L 268 130 L 418 40" fill="none" stroke="#1e293b" stroke-width="3" />
                            <path id="graph-curve-active" d="M 40 55 L 40 55" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" />

                            <!-- Active Point -->
                            <circle id="graph-dot" cx="40" cy="55" r="6" fill="#10b981" stroke="#ffffff" stroke-width="2" style="filter: drop-shadow(0 0 6px #10b981);" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mathematical Comparison: Elevation vs. Speed -->
        <section class="lesson-problem-section">
            <h3 class="lesson-problem-title">
                <i class="fas fa-balance-scale lesson-icon"></i> Critical Comparison: Position Graphs vs. Velocity Graphs
            </h3>
            <div class="lesson-problem-prompt">
                <p>
                    Understanding the physical variable on the vertical axis ($y$) changes how we interpret every single slope and feature of the graph:
                </p>
            </div>

            <div class="lesson-formula-grid">
                <div class="lesson-formula-card">
                    <span class="lesson-formula-tag" style="border-color: #10b981; color: #10b981;">Position / Elevation Graph ($y = h(t)$)</span>
                    <ul style="margin-top: 0.75rem; padding-left: 1.25rem; font-size: 0.875rem; color: var(--color-text-secondary); line-height: 1.6;">
                        <li><strong>Positive Slope:</strong> Moving upward in space (climbing altitude).</li>
                        <li><strong>Negative Slope:</strong> Moving downward in space (descending altitude).</li>
                        <li><strong>Zero Slope ($m = 0$):</strong> Standing completely still at a constant altitude.</li>
                    </ul>
                </div>
                <div class="lesson-formula-card">
                    <span class="lesson-formula-tag" style="border-color: #38bdf8; color: #38bdf8;">Speed / Velocity Graph ($y = v(t)$)</span>
                    <ul style="margin-top: 0.75rem; padding-left: 1.25rem; font-size: 0.875rem; color: var(--color-text-secondary); line-height: 1.6;">
                        <li><strong>Positive Slope:</strong> Accelerating (moving faster and faster).</li>
                        <li><strong>Negative Slope:</strong> Decelerating / Braking (slowing down).</li>
                        <li><strong>Zero Slope ($m = 0$):</strong> Moving at a constant cruising speed (NOT standing still!).</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Vocabulary -->
        <section class="lesson-vocab-section">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon"></i> Key Vocabulary: Lesson 5
                    </h3>
                </div>
                <div class="lesson-vocab-grid">
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Piecewise Function</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">A function defined by multiple sub-functions, each applying to a distinct interval of the independent variable (domain).</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Dependent vs. Independent</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">Time ($t$) is almost universally independent (horizontal axis), while physical quantities like altitude or velocity depend on time.</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Constant Speed</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">Motion without acceleration; on a speed graph, it produces a flat horizontal line ($a = 0$), while on a position graph, it produces a linear sloped line.</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Acceleration</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">The rate of change of velocity with respect to time ($a = \frac{\Delta v}{\Delta t}$), represented by the slope of a velocity-time graph.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formative Exit Ticket & Mastery Check -->
        <section class="lesson-exit-ticket-section" id="exit-ticket-section">
            <div class="exit-ticket-header">
                <div class="exit-ticket-title-wrap">
                    <span class="exit-ticket-badge"><i class="fas fa-clipboard-check"></i> Standard Competency Check</span>
                    <h3>Exit Ticket: Quick Mastery Check</h3>
                    <p class="exit-ticket-desc">Demonstrate your understanding of Lesson 5 concepts to log mastery to your profile.</p>
                </div>
            </div>

            <form id="exit-ticket-form" onsubmit="event.preventDefault(); submitExitTicket();">
                <div class="exit-ticket-card" id="exit-q-0">
                    <div class="exit-ticket-question">
                        <strong>Question 1:</strong> On a Speed vs. Time graph, what does a horizontal line segment at $y = 15\text{ mph}$ represent?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-0-0">
                            <input type="radio" name="exit_q_0" value="0" required>
                            <span>The object is traveling at a constant cruising speed of 15 mph (acceleration is zero).</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-1">
                            <input type="radio" name="exit_q_0" value="1">
                            <span>The object is parked and completely motionless at mile marker 15.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-2">
                            <input type="radio" name="exit_q_0" value="2">
                            <span>The road has flattened out horizontally with zero elevation.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-3">
                            <input type="radio" name="exit_q_0" value="3">
                            <span>The vehicle is running out of gasoline.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-0">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> Because the vertical axis represents speed, $y = 15$ means speed is constant at 15 mph. Zero slope on a speed graph means zero acceleration.
                    </div>
                </div>

                <div class="exit-ticket-card" id="exit-q-1">
                    <div class="exit-ticket-question">
                        <strong>Question 2:</strong> In the Canyon Hiker story (Elevation vs. Time), how is a 3-minute rest at an overlook represented on the graph?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-1-0">
                            <input type="radio" name="exit_q_1" value="0" required>
                            <span>A flat horizontal line segment ($m = 0$) spanning a width of 3 minutes on the $t$-axis.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-1">
                            <input type="radio" name="exit_q_1" value="1">
                            <span>A vertical line dropping straight down to the $x$-axis.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-2">
                            <input type="radio" name="exit_q_1" value="2">
                            <span>A blank gap where no graph is drawn.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-3">
                            <input type="radio" name="exit_q_1" value="3">
                            <span>A downward sloping curve that reaches 0.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-1">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> While resting, the hiker's altitude does not change ($\Delta h = 0$), producing a horizontal line segment over the 3-minute time interval.
                    </div>
                </div>

                <div class="exit-ticket-card" id="exit-q-2">
                    <div class="exit-ticket-question">
                        <strong>Question 3:</strong> Why is the slope of a position graph equal to the value of the speed graph?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-2-0">
                            <input type="radio" name="exit_q_2" value="0" required>
                            <span>Because velocity is mathematically defined as the rate of change of position with respect to time ($\frac{\Delta x}{\Delta t}$).</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-1">
                            <input type="radio" name="exit_q_2" value="1">
                            <span>Because all algebraic formulas must give identical numbers.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-2">
                            <input type="radio" name="exit_q_2" value="2">
                            <span>It is only true by coincidence for skaters and hikers.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-3">
                            <input type="radio" name="exit_q_2" value="3">
                            <span>The slope of position equals mass, not speed.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-2">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> Speed is the rate of change of distance with respect to time ($v = \frac{\Delta d}{\Delta t}$), which is precisely the slope of the position-time curve.
                    </div>
                </div>

                <div class="exit-ticket-actions">
                    <button type="submit" id="exit-ticket-submit-btn" class="exit-ticket-submit-btn">
                        <i class="fas fa-check-circle"></i> Submit & Check Mastery
                    </button>
                    <div id="exit-ticket-score" class="exit-ticket-score-banner"></div>
                </div>
            </form>
        </section>
    </div>
</main>

<script>
// Motion Stories Physics Definition
const STORIES = {
    hiker: {
        title: "Canyon Hiker (Elevation vs. Time)",
        unitY: "ft",
        unitX: "min",
        maxT: 10,
        maxY: 1600,
        yAxisLabels: ["0", "800", "1,600"],
        yAxisTitle: "Elevation (ft)",
        color: "#10b981",
        stageTerrain: "M 10 20 L 150 75 L 260 75 L 430 30",
        graphPoints: [
            { t: 0,   y: 1200, slope: -200, phase: "Descending canyon trail: dropping into the gorge." },
            { t: 3.5, y: 500,  slope: 0,    phase: "Resting at canyon overlook: drinking water, altitude constant." },
            { t: 6.0, y: 500,  slope: 275,  phase: "Climbing steep exit ridge: ascending toward mountain vista." },
            { t: 10.0,y: 1600, slope: 0,    phase: "Arrived at summit viewpoint ($1,600\\text{ ft}$)." }
        ]
    },
    skater: {
        title: "Skateboarder (Speed vs. Time)",
        unitY: "mph",
        unitX: "sec",
        maxT: 10,
        maxY: 25,
        yAxisLabels: ["0", "12", "25"],
        yAxisTitle: "Speed (mph)",
        color: "#38bdf8",
        stageTerrain: "M 10 15 L 120 75 L 340 75 L 430 75",
        graphPoints: [
            { t: 0,   y: 0,   slope: 6.0,  phase: "Dropping in: accelerating rapidly down the ramp incline." },
            { t: 3.0, y: 18,  slope: 0,    phase: "Coasting on flat pavement: cruising at steady 18 mph." },
            { t: 7.0, y: 18,  slope: -6.0, phase: "Foot braking: decelerating smoothly on asphalt." },
            { t: 10.0,y: 0,   slope: 0,    phase: "Brought to a complete stop ($0\\text{ mph}$)." }
        ]
    }
};

let currentStoryKey = 'hiker';
let isPlaying = false;
let playAnimFrame = null;
let lastTimestamp = 0;

function switchStory(key) {
    currentStoryKey = key;
    document.getElementById('tab-story-1').className = `lesson-sim-preset-btn ${key === 'hiker' ? 'active' : ''}`;
    document.getElementById('tab-story-2').className = `lesson-sim-preset-btn ${key === 'skater' ? 'active' : ''}`;
    
    const story = STORIES[key];
    document.getElementById('story-unit-t').style.color = story.color;
    document.getElementById('graph-y-0').textContent = story.yAxisLabels[0];
    document.getElementById('graph-y-mid').textContent = story.yAxisLabels[1];
    document.getElementById('graph-y-max').textContent = story.yAxisLabels[2];
    document.getElementById('graph-y-title').textContent = story.yAxisTitle;
    document.getElementById('graph-curve-active').setAttribute('stroke', story.color);
    document.getElementById('graph-dot').setAttribute('fill', story.color);
    document.getElementById('stage-terrain').setAttribute('d', story.stageTerrain);

    resetStory();
}

function interpolateStory(t) {
    const pts = STORIES[currentStoryKey].graphPoints;
    if (t <= pts[0].t) return { ...pts[0] };
    const last = pts[pts.length - 1];
    if (t >= last.t) return { ...last };

    for (let i = 0; i < pts.length - 1; i++) {
        const p1 = pts[i];
        const p2 = pts[i+1];
        if (t >= p1.t && t <= p2.t) {
            const fraction = (t - p1.t) / (p2.t - p1.t);
            const y = Math.round(p1.y + fraction * (p2.y - p1.y));
            const slope = Math.round((p2.y - p1.y) / (p2.t - p1.t));
            return { t, y, slope, phase: fraction > 0.5 ? p2.phase : p1.phase };
        }
    }
    return last;
}

function scrubStory(t) {
    const story = STORIES[currentStoryKey];
    const data = interpolateStory(t);

    const slider = document.getElementById('story-time-slider');
    const badge = document.getElementById('story-time-badge');
    const statY = document.getElementById('stat-story-y');
    const statSlope = document.getElementById('stat-story-slope');
    const phaseDesc = document.getElementById('story-phase-desc');

    if (slider && parseFloat(slider.value) !== t) slider.value = t;
    if (badge) badge.textContent = `${t.toFixed(1)} ${story.unitX}`;
    if (statY) statY.textContent = `${data.y} ${story.unitY}`;
    if (statSlope) statSlope.textContent = `${data.slope > 0 ? '+' : ''}${data.slope} ${story.unitY}/${story.unitX}`;
    if (phaseDesc) phaseDesc.innerHTML = data.phase;

    // Coordinate Graph mapping
    const svgX = 40 + (t / 10) * (418 - 40);
    const svgY = 150 - (data.y / story.maxY) * (150 - 20);

    const dot = document.getElementById('graph-dot');
    const activeCurve = document.getElementById('graph-curve-active');
    if (dot) {
        dot.setAttribute('cx', svgX);
        dot.setAttribute('cy', svgY);
    }
    if (activeCurve) {
        activeCurve.setAttribute('d', `M 40 55 L ${svgX} ${svgY}`);
    }

    // Physical Stage Character Animation mapping
    const stageX = 10 + (t / 10) * 410;
    // Map stage Y following terrain
    let stageY = 40;
    if (currentStoryKey === 'hiker') {
        if (t <= 3.5) stageY = 20 + (t / 3.5) * 55;
        else if (t <= 6.0) stageY = 75;
        else stageY = 75 - ((t - 6.0) / 4.0) * 45;
    } else {
        if (t <= 3.0) stageY = 15 + (t / 3.0) * 60;
        else stageY = 75;
    }

    const charGroup = document.getElementById('character-group');
    if (charGroup) {
        charGroup.setAttribute('transform', `translate(${stageX}, ${stageY})`);
    }
}

function toggleStoryPlay() {
    isPlaying = !isPlaying;
    const btnIcon = document.getElementById('story-play-icon');
    const btnText = document.getElementById('story-play-text');
    if (isPlaying) {
        btnIcon.className = "fas fa-pause";
        btnText.textContent = "Pause";
        lastTimestamp = performance.now();
        playAnimFrame = requestAnimationFrame(stepAnimation);
    } else {
        btnIcon.className = "fas fa-play";
        btnText.textContent = "Play Motion";
        if (playAnimFrame) cancelAnimationFrame(playAnimFrame);
    }
}

function stepAnimation(now) {
    if (!isPlaying) return;
    const delta = (now - lastTimestamp) / 1000;
    lastTimestamp = now;

    const slider = document.getElementById('story-time-slider');
    let curT = parseFloat(slider.value) + delta * 2.0; // 5s full cycle
    if (curT >= 10.0) {
        curT = 10.0;
        scrubStory(curT);
        toggleStoryPlay();
        return;
    }
    scrubStory(curT);
    playAnimFrame = requestAnimationFrame(stepAnimation);
}

function resetStory() {
    if (isPlaying) toggleStoryPlay();
    scrubStory(0);
}

// Exit ticket evaluation
const LESSON_CODE_A5 = "K.M1.A.5";
const LESSON_TITLE_A5 = "Two Graphing Stories — Modeling Physical Motion";
const LESSON_STD_A5 = "CCSS.MATH.CONTENT.HSF.IF.B.4";

function submitExitTicket() {
    const correctAnswers = [0, 0, 0];
    let correctCount = 0;

    correctAnswers.forEach((ans, idx) => {
        const selected = document.querySelector(`input[name="exit_q_${idx}"]:checked`);
        const expEl = document.getElementById(`exit-exp-${idx}`);
        if (expEl) expEl.classList.add('visible');

        for (let o = 0; o < 4; o++) {
            const optLabel = document.getElementById(`exit-opt-${idx}-${o}`);
            if (!optLabel) continue;
            optLabel.classList.remove('correct-choice', 'incorrect-choice');
            if (o === ans) optLabel.classList.add('correct-choice');
        }

        if (selected) {
            const userVal = parseInt(selected.value, 10);
            const chosenLabel = document.getElementById(`exit-opt-${idx}-${userVal}`);
            if (userVal === ans) {
                correctCount++;
            } else if (chosenLabel) {
                chosenLabel.classList.add('incorrect-choice');
            }
        }
    });

    const pct = Math.round((correctCount / correctAnswers.length) * 100);
    const scoreBanner = document.getElementById('exit-ticket-score');
    if (scoreBanner) {
        scoreBanner.className = 'exit-ticket-score-banner visible';
        if (pct >= 80) {
            scoreBanner.classList.add('mastered');
            scoreBanner.innerHTML = `<i class="fas fa-trophy"></i> Mastered! ${correctCount}/3 (${pct}%) • Saved to Profile`;
        } else {
            scoreBanner.classList.add('retry');
            scoreBanner.innerHTML = `<i class="fas fa-redo"></i> Score: ${correctCount}/3 (${pct}%) • Review explanations above`;
        }
    }

    try {
        let mastery = {};
        const raw = localStorage.getItem('hesten_standards_mastery');
        if (raw) mastery = JSON.parse(raw);
        const prev = mastery[LESSON_CODE_A5] || {};
        mastery[LESSON_CODE_A5] = {
            code: LESSON_CODE_A5,
            name: LESSON_TITLE_A5,
            standard: LESSON_STD_A5,
            bestScore: Math.max(prev.bestScore || 0, pct),
            lastAttempt: new Date().toISOString().split('T')[0],
            attempts: (prev.attempts || 0) + 1,
            level: 'k'
        };
        localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));
        window.dispatchEvent(new CustomEvent('standards-mastery-updated', { detail: mastery[LESSON_CODE_A5] }));
    } catch(e) {}
}

document.addEventListener('DOMContentLoaded', () => {
    switchStory('hiker');
});
</script>

<?php
$levelId = 'k';
$levelUrl = '../levels/k.php';
$lessonCode = 'K.M1.A.5';
$lessonTitle = "Two Graphing Stories — Modeling Physical Motion";
$lessonStandard = "CCSS.MATH.CONTENT.HSF.IF.B.4";
$prevLessonUrl = 'k.php?k-math-m1-a-4';
$nextLessonUrl = 'k.php?k-math-m1-b-1';
include ABSPATH . 'src/lesson_runner.php';
?>

<?php include ABSPATH . 'src/footer.php'; ?>
