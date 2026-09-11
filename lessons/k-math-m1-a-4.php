<?php
/**
 * Hesten's Learning - Lesson K.M1.A.4
 * Analyzing Graphs - Water Usage During a Typical Day at School
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

$pageTitle = "Analyzing Graphs: Water Usage During a School Day | Hesten's Learning";
$pageDescription = "Analyze piecewise rate of change, slope, and domain intervals on real-world continuous graphs of water consumption.";
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
                <i class="fas fa-calculator lesson-badge-icon" aria-hidden="true"></i> Math Lesson K.M1.A.4
            </span>
            <h1 class="lesson-title">Analyzing Graphs — Water Usage During a Typical School Day</h1>
            <p class="lesson-desc">
                How does a physical building communicate through data? Examine cumulative volume graphs, interpret piecewise slopes, and calculate average rates of change across the rhythm of a high school day.
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title">Student & Teacher Overview: Lesson 4</h2>
                <span class="lesson-overview-pill">Piecewise Rate of Change</span>
            </div>
            <p class="lesson-overview-text">
                In this lesson, you will analyze a continuous graph representing cumulative water consumption over time. By observing how the slope steepens, flattens, or remains constant, you will connect graphical features directly to real-world physical events.
            </p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <li>Interpret key features of a graph (intercepts, intervals of increase, flat horizontal segments) in terms of the quantities modeled.</li>
                        <li>Calculate the average rate of change $\frac{\Delta V}{\Delta t} = \frac{V(t_2) - V(t_1)}{t_2 - t_1}$ over specified time intervals.</li>
                        <li>Explain why a cumulative volume graph can never have a negative slope in a closed system without return flow.</li>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text">
                        A common misconception is that a flat horizontal line means "water is turned off and empty." Emphasize that on a <em>cumulative</em> graph, a flat line means volume is constant ($V(t)$ is unchanged, flow rate is zero), not that the tank is depleted!
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Water Usage Simulator Workbench -->
        <section class="lesson-sim-workbench" aria-labelledby="water-sim-title">
            <div class="lesson-sim-header">
                <div class="lesson-sim-title-wrap">
                    <h3 id="water-sim-title" class="lesson-sim-title">
                        <i class="fas fa-faucet" aria-hidden="true"></i> School Day Water Consumption Simulator
                    </h3>
                    <p class="lesson-sim-subtitle">
                        Drag the time scrubber from 6:00 AM to 8:00 PM. Watch how the cumulative volume curve ascends and inspect how instantaneous flow rates correlate with school activities.
                    </p>
                </div>
                <div class="lesson-sim-presets">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-secondary); margin-right: 0.25rem;">Key Periods:</span>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setWaterTime(6)">6:00 AM (Kitchen Prep)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setWaterTime(8.5)">8:30 AM (Class Period)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setWaterTime(12)">12:00 PM (Lunch Peak)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setWaterTime(15.5)">3:30 PM (Sports Practice)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setWaterTime(18)">6:00 PM (Janitorial)</button>
                </div>
            </div>

            <div class="lesson-sim-grid">
                <!-- Controls Column -->
                <div class="lesson-sim-controls">
                    <div class="lesson-sim-slider-box">
                        <div class="lesson-sim-slider-label">
                            <span>Time of Day (<strong style="color: #38bdf8;">t</strong>):</span>
                            <span id="water-time-badge" class="lesson-sim-step-badge" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; border-color: rgba(56, 189, 248, 0.3);">12:00 PM</span>
                        </div>
                        <input type="range" id="water-time-slider" min="6" max="20" value="12" step="0.25" oninput="updateWaterSim(parseFloat(this.value))" class="lesson-sim-slider" aria-label="School day time slider from 6 AM to 8 PM">
                        <div class="lesson-sim-ticks">
                            <span>6 AM</span>
                            <span>8 AM</span>
                            <span>10 AM</span>
                            <span>12 PM</span>
                            <span>2 PM</span>
                            <span>4 PM</span>
                            <span>6 PM</span>
                            <span>8 PM</span>
                        </div>
                    </div>

                    <div class="lesson-sim-stat-grid">
                        <div class="lesson-sim-stat-card" style="border-color: rgba(56, 189, 248, 0.3);">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-tint" style="color: #38bdf8;"></i> Cumulative Total $V(t)$</span>
                            <span id="stat-cum-vol" class="lesson-sim-stat-val" style="color: #38bdf8;">1,950 gal</span>
                            <span id="stat-cum-desc" class="lesson-sim-stat-calc">Measured meter total since 6:00 AM</span>
                        </div>
                        <div class="lesson-sim-stat-card" style="border-color: rgba(245, 158, 11, 0.3);">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-tachometer-alt" style="color: #f59e0b;"></i> Flow Rate (Slope)</span>
                            <span id="stat-flow-rate" class="lesson-sim-stat-val" style="color: #f59e0b;">420 gal/hr</span>
                            <span id="stat-flow-desc" class="lesson-sim-stat-calc">Instantaneous rate of change</span>
                        </div>
                    </div>

                    <div class="lesson-sim-ratio-box" style="margin-top: 1rem;">
                        <div class="lesson-sim-ratio-pill" id="water-status-pill" style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border-color: rgba(56, 189, 248, 0.25);">
                            <i class="fas fa-info-circle"></i> <span id="water-status-text">Lunch Period: Peak cafeteria dishwashing & restroom traffic.</span>
                        </div>
                    </div>
                </div>

                <!-- SVG Coordinate Graph Visualization -->
                <div class="lesson-sim-visualizer" style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="background: var(--color-base-bg, #0f172a); border: 1px solid var(--color-border, #334155); border-radius: 1rem; padding: 1rem;">
                        <svg id="water-graph-svg" viewBox="0 0 440 240" style="width: 100%; height: auto; overflow: visible;" aria-label="Coordinate graph of water consumption">
                            <!-- Grid lines -->
                            <line x1="40" y1="20" x2="40" y2="200" stroke="#334155" stroke-width="1.5" />
                            <line x1="40" y1="200" x2="420" y2="200" stroke="#334155" stroke-width="1.5" />
                            
                            <!-- Horizontal Grid guides -->
                            <line x1="40" y1="155" x2="420" y2="155" stroke="#1e293b" stroke-dasharray="3,3" />
                            <line x1="40" y1="110" x2="420" y2="110" stroke="#1e293b" stroke-dasharray="3,3" />
                            <line x1="40" y1="65" x2="420" y2="65" stroke="#1e293b" stroke-dasharray="3,3" />

                            <!-- Y-axis labels -->
                            <text x="32" y="204" fill="#64748b" font-size="9" text-anchor="end">0</text>
                            <text x="32" y="158" fill="#64748b" font-size="9" text-anchor="end">1,000</text>
                            <text x="32" y="113" fill="#64748b" font-size="9" text-anchor="end">2,000</text>
                            <text x="32" y="68" fill="#64748b" font-size="9" text-anchor="end">3,000</text>
                            <text x="10" y="110" fill="#94a3b8" font-size="10" font-weight="700" transform="rotate(-90 10 110)" text-anchor="middle">Gallons V(t)</text>

                            <!-- X-axis labels -->
                            <text x="40" y="216" fill="#64748b" font-size="9" text-anchor="middle">6A</text>
                            <text x="94" y="216" fill="#64748b" font-size="9" text-anchor="middle">8A</text>
                            <text x="148" y="216" fill="#64748b" font-size="9" text-anchor="middle">10A</text>
                            <text x="202" y="216" fill="#64748b" font-size="9" text-anchor="middle">12P</text>
                            <text x="256" y="216" fill="#64748b" font-size="9" text-anchor="middle">2P</text>
                            <text x="310" y="216" fill="#64748b" font-size="9" text-anchor="middle">4P</text>
                            <text x="364" y="216" fill="#64748b" font-size="9" text-anchor="middle">6P</text>
                            <text x="418" y="216" fill="#64748b" font-size="9" text-anchor="middle">8P</text>
                            <text x="230" y="232" fill="#94a3b8" font-size="10" font-weight="700" text-anchor="middle">Time of Day (Hours)</text>

                            <!-- Cumulative Graph Curve: Piecewise Polyline -->
                            <path id="water-curve-bg" d="M 40 200 L 80 185 L 94 175 L 148 168 L 180 162 L 210 115 L 240 102 L 295 95 L 340 55 L 375 42 L 418 35" fill="none" stroke="#1e293b" stroke-width="3" />
                            <path id="water-curve-active" d="M 40 200 L 80 185 L 94 175 L 148 168 L 180 162 L 210 115" fill="none" stroke="#38bdf8" stroke-width="3" stroke-linecap="round" />

                            <!-- Active Scrubber Point -->
                            <circle id="water-dot" cx="210" cy="115" r="6" fill="#38bdf8" stroke="#ffffff" stroke-width="2" style="filter: drop-shadow(0 0 6px #38bdf8);" />
                            <!-- Vertical Tracker Guide -->
                            <line id="water-guide-line" x1="210" y1="20" x2="210" y2="200" stroke="#38bdf8" stroke-width="1" stroke-dasharray="2,2" opacity="0.6" />
                        </svg>
                    </div>
                    <div style="font-size: 0.8rem; color: var(--color-text-secondary); text-align: center;">
                        <i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Slope represents flow rate: <strong>Flatter = minimal use</strong> • <strong>Steeper = heavy flow</strong>
                    </div>
                </div>
            </div>
        </section>

        <!-- Rate of Change Mathematical Analysis -->
        <section class="lesson-problem-section">
            <h3 class="lesson-problem-title">
                <i class="fas fa-square-root-alt lesson-icon"></i> Mathematical Investigation: Calculating Average Rate of Change
            </h3>
            <div class="lesson-problem-prompt">
                <p>
                    The <strong>average rate of change</strong> over any interval $[a, b]$ is given by the slope formula:
                </p>
                <div class="lesson-formula-banner" style="text-align: center; margin: 1rem 0; font-size: 1.15rem;">
                    $$\text{Average Rate of Change} = \frac{\Delta V}{\Delta t} = \frac{V(b) - V(a)}{b - a}$$
                </div>
                <p>
                    Let's compare the rate of change during the <strong>Morning Class Interval</strong> ($[8:00\text{ AM}, 10:00\text{ AM}]$) versus the <strong>Lunch Rush</strong> ($[11:30\text{ AM}, 1:00\text{ PM}]$):
                </p>
            </div>

            <div class="lesson-formula-grid">
                <div class="lesson-formula-card">
                    <span class="lesson-formula-tag">Period 1 & 2 Classes ($t \in [8, 10]$)</span>
                    <div class="lesson-formula-math">
                        $$\frac{V(10) - V(8)}{10 - 8} = \frac{720 - 580}{2} = 70\text{ gal/hr}$$
                    </div>
                    <p class="lesson-formula-desc">
                        During lecture periods, water consumption is minimal as students remain in their seats with only occasional restroom or drinking fountain usage.
                    </p>
                </div>
                <div class="lesson-formula-card">
                    <span class="lesson-formula-tag" style="border-color: #f59e0b; color: #f59e0b;">Lunch Rush ($t \in [11.5, 13]$)</span>
                    <div class="lesson-formula-math" style="color: #f59e0b;">
                        $$\frac{V(13) - V(11.5)}{13 - 11.5} = \frac{1,980 - 1,290}{1.5} = 460\text{ gal/hr}$$
                    </div>
                    <p class="lesson-formula-desc">
                        Cafeteria dishwashers, cooking steam kettles, and high-frequency restroom visits produce a sharp spike in slope, resulting in an average flow rate over $6.5\times$ greater than class periods.
                    </p>
                </div>
            </div>
        </section>

        <!-- Vocabulary -->
        <section class="lesson-vocab-section">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon"></i> Key Vocabulary: Lesson 4
                    </h3>
                </div>
                <div class="lesson-vocab-grid">
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Cumulative Quantity</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">A total measured quantity that continually accumulates over time; in a closed physical system, $V(t)$ is non-decreasing ($\Delta V \ge 0$).</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Instantaneous Rate of Change</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">The rate at which a quantity is changing at a precise instant, represented by the slope of the tangent line to the curve at that point.</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Average Rate of Change</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">The ratio of the difference in outputs to the difference in inputs ($\frac{\Delta y}{\Delta x}$) over a finite interval $[a, b]$, representing the slope of the secant line.</p>
                        </div>
                    </div>
                    <div class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Horizontal Interval ($m = 0$)</h4>
                        </div>
                        <div class="lesson-vocab-body" style="display: block;">
                            <p class="lesson-vocab-text">An interval where the dependent variable remains constant, indicating that the flow or change has temporarily paused.</p>
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
                    <p class="exit-ticket-desc">Demonstrate your understanding of Lesson 4 concepts to log mastery to your profile.</p>
                </div>
            </div>

            <form id="exit-ticket-form" onsubmit="event.preventDefault(); submitExitTicket();">
                <div class="exit-ticket-card" id="exit-q-0">
                    <div class="exit-ticket-question">
                        <strong>Question 1:</strong> Why does a cumulative volume graph of school water consumption never slope downward?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-0-0">
                            <input type="radio" name="exit_q_0" value="0" required>
                            <span>Because water once consumed cannot un-flow back through the intake meter; total cumulative volume only increases or stays constant.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-1">
                            <input type="radio" name="exit_q_0" value="1">
                            <span>Because the school pump breaks whenever negative numbers are evaluated.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-2">
                            <input type="radio" name="exit_q_0" value="2">
                            <span>Because the $y$-axis scale only allows positive integers.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-0-3">
                            <input type="radio" name="exit_q_0" value="3">
                            <span>It actually does slope downward whenever someone turns off a faucet.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-0">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> In a cumulative total meter, volume accumulates strictly monotonically ($V(t_2) \ge V(t_1)$ for $t_2 > t_1$), so the slope is always $\ge 0$.
                    </div>
                </div>

                <div class="exit-ticket-card" id="exit-q-1">
                    <div class="exit-ticket-question">
                        <strong>Question 2:</strong> What does the slope of the secant line between 11:30 AM and 1:00 PM represent?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-1-0">
                            <input type="radio" name="exit_q_1" value="0" required>
                            <span>The average water consumption rate in gallons per hour during the lunch period.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-1">
                            <input type="radio" name="exit_q_1" value="1">
                            <span>The total water capacity of the municipal water tower.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-2">
                            <input type="radio" name="exit_q_1" value="2">
                            <span>The water pressure measured in pounds per square inch.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-1-3">
                            <input type="radio" name="exit_q_1" value="3">
                            <span>The temperature change of the cafeteria sink water.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-1">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> The slope of the secant line $\frac{V(b) - V(a)}{b - a}$ represents the average rate of change in gallons per hour over that time interval.
                    </div>
                </div>

                <div class="exit-ticket-card" id="exit-q-2">
                    <div class="exit-ticket-question">
                        <strong>Question 3:</strong> If the graph is completely horizontal between 2:00 AM and 5:00 AM, what was the flow rate during that interval?
                    </div>
                    <div class="exit-ticket-options">
                        <label class="exit-ticket-option" id="exit-opt-2-0">
                            <input type="radio" name="exit_q_2" value="0" required>
                            <span>$0\text{ gallons/hour}$; no water was actively flowing through the meter.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-1">
                            <input type="radio" name="exit_q_2" value="1">
                            <span>$1,000\text{ gallons/hour}$ at constant velocity.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-2">
                            <input type="radio" name="exit_q_2" value="2">
                            <span>Infinite rate because the building was closed.</span>
                        </label>
                        <label class="exit-ticket-option" id="exit-opt-2-3">
                            <input type="radio" name="exit_q_2" value="3">
                            <span>The flow rate cannot be determined from a horizontal segment.</span>
                        </label>
                    </div>
                    <div class="exit-ticket-explanation" id="exit-exp-2">
                        <strong><i class="fas fa-info-circle"></i> Explanation:</strong> A horizontal line segment has $\Delta y = 0$, which yields a slope of $m = \frac{0}{\Delta x} = 0$, meaning flow rate is zero.
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
// Simulator Physics & Piecewise Interpolation
const WATER_PIECEWISE = [
    { t: 6.0,  v: 0,    rate: 150, desc: "Kitchen staff arrive: dish machines fill and cooking prep begins." },
    { t: 7.5,  v: 225,  rate: 300, desc: "Student arrival rush: restrooms and drinking fountains active." },
    { t: 8.0,  v: 375,  rate: 70,  desc: "Period 1 begins: hallways clear, flow drops to baseline." },
    { t: 10.0, v: 515,  rate: 80,  desc: "Period 2 & 3: steady low background water usage." },
    { t: 11.5, v: 635,  rate: 450, desc: "Lunch wave 1 starts: cafeteria cooking, handwashing, dishwashers active." },
    { t: 12.0, v: 860,  rate: 460, desc: "Lunch peak: maximum simultaneous flow across entire campus." },
    { t: 13.0, v: 1320, rate: 120, desc: "Lunch winds down: kitchen cleanup and return to class." },
    { t: 15.0, v: 1560, rate: 280, desc: "Final bell rings: lockers, hydration before sports practices." },
    { t: 15.5, v: 1700, rate: 380, desc: "Athletics practice: locker rooms, field irrigation, pool filter cycling." },
    { t: 17.5, v: 2460, rate: 140, desc: "Practices conclude: team showers and quiet building transition." },
    { t: 18.0, v: 2530, rate: 200, desc: "Custodial shift begins: floor scrubbers and evening building cleaning." },
    { t: 20.0, v: 2930, rate: 10,  desc: "Night shutdown: building locked, only background leaks." }
];

function interpolateWater(t) {
    if (t <= WATER_PIECEWISE[0].t) return { ...WATER_PIECEWISE[0] };
    const last = WATER_PIECEWISE[WATER_PIECEWISE.length - 1];
    if (t >= last.t) return { ...last };

    for (let i = 0; i < WATER_PIECEWISE.length - 1; i++) {
        const p1 = WATER_PIECEWISE[i];
        const p2 = WATER_PIECEWISE[i+1];
        if (t >= p1.t && t <= p2.t) {
            const fraction = (t - p1.t) / (p2.t - p1.t);
            const v = Math.round(p1.v + fraction * (p2.v - p1.v));
            const rate = Math.round(p1.rate + fraction * (p2.rate - p1.rate));
            const desc = fraction > 0.5 ? p2.desc : p1.desc;
            return { t, v, rate, desc };
        }
    }
    return last;
}

function updateWaterSim(t) {
    const data = interpolateWater(t);
    
    // Format Time String
    const hour = Math.floor(t);
    const mins = Math.round((t - hour) * 60);
    const displayHour = hour > 12 ? hour - 12 : hour;
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const timeStr = `${displayHour}:${mins < 10 ? '0' + mins : mins} ${ampm}`;

    // Update UI Stats
    const badge = document.getElementById('water-time-badge');
    const slider = document.getElementById('water-time-slider');
    const cumVol = document.getElementById('stat-cum-vol');
    const flowRate = document.getElementById('stat-flow-rate');
    const statusText = document.getElementById('water-status-text');

    if (badge) badge.textContent = timeStr;
    if (slider && parseFloat(slider.value) !== t) slider.value = t;
    if (cumVol) cumVol.textContent = `${data.v.toLocaleString()} gal`;
    if (flowRate) flowRate.textContent = `${data.rate} gal/hr`;
    if (statusText) statusText.textContent = data.desc;

    // Map time to SVG coordinate: t in [6, 20] -> x in [40, 418]
    const svgX = 40 + ((t - 6) / 14) * (418 - 40);
    // Map volume to SVG coordinate: v in [0, 3000] -> y in [200, 35]
    const svgY = 200 - (data.v / 3000) * (200 - 35);

    const dot = document.getElementById('water-dot');
    const guide = document.getElementById('water-guide-line');
    if (dot) {
        dot.setAttribute('cx', svgX);
        dot.setAttribute('cy', svgY);
    }
    if (guide) {
        guide.setAttribute('x1', svgX);
        guide.setAttribute('x2', svgX);
    }
}

function setWaterTime(t) {
    updateWaterSim(t);
}

// Exit Ticket Evaluation
const LESSON_CODE_A4 = "K.M1.A.4";
const LESSON_TITLE_A4 = "Analyzing Graphs — Water Usage During a Typical Day at School";
const LESSON_STD_A4 = "CCSS.MATH.CONTENT.HSF.IF.B.4";

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
        const prev = mastery[LESSON_CODE_A4] || {};
        mastery[LESSON_CODE_A4] = {
            code: LESSON_CODE_A4,
            name: LESSON_TITLE_A4,
            standard: LESSON_STD_A4,
            bestScore: Math.max(prev.bestScore || 0, pct),
            lastAttempt: new Date().toISOString().split('T')[0],
            attempts: (prev.attempts || 0) + 1,
            level: 'k'
        };
        localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));
        window.dispatchEvent(new CustomEvent('standards-mastery-updated', { detail: mastery[LESSON_CODE_A4] }));
    } catch(e) {}
}

document.addEventListener('DOMContentLoaded', () => {
    updateWaterSim(12);
});
</script>

<?php
$levelId = 'k';
$levelUrl = '../levels/k.php';
$lessonCode = 'K.M1.A.4';
$lessonTitle = "Analyzing Graphs — Water Usage During a Typical Day at School";
$lessonStandard = "CCSS.MATH.CONTENT.HSF.IF.B.4";
$prevLessonUrl = 'k.php?k-math-m1-a-3';
$nextLessonUrl = 'k.php?k-math-m1-a-5';
include ABSPATH . 'src/lesson_runner.php';
?>

<?php include ABSPATH . 'src/footer.php'; ?>
