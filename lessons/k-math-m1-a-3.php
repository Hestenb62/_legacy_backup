<?php
/**
 * Hesten's Learning - Lesson K.M1.A.3
 * Graphs of Exponential Functions
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

$pageTitle = "Graphs of Exponential Functions | Hesten's Learning";
$pageDescription = "Examine how quantities grow by constant factors rather than constant differences with interactive exponential simulations.";
$pageAuthor = "Hesten's Learning Team";
$requiresMathJax = true;

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/lesson.css">

<main class="lesson-container">
    <div class="lesson-card">
        <!-- Navigation Back to Level K -->
        <nav class="lesson-top-nav" aria-label="Breadcrumb navigation" style="margin-bottom: 1.5rem;">
            <a href="<?= isset($levelUrl) ? htmlspecialchars($levelUrl) : '../levels/k.php' ?>" class="lesson-back-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; font-weight: 700; color: var(--color-primary); text-decoration: none; padding: 0.45rem 1rem; background: color-mix(in srgb, var(--color-primary) 10%, transparent); border: 1px solid color-mix(in srgb, var(--color-primary) 20%, transparent); border-radius: 9999px; transition: all 0.2s ease;">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                <span>Back to Level K (Algebra I)</span>
            </a>
        </nav>

        <!-- Header / Title -->
        <div class="lesson-header">
            <span class="lesson-badge">
                <i class="fas fa-calculator lesson-badge-icon" aria-hidden="true"></i> Math Lesson K.M1.A.3
            </span>
            <h1 class="lesson-title">Graphs of Exponential Functions</h1>
            <p class="lesson-desc">
                What happens when a quantity doubles at every step? Explore the fundamental mathematical differences between linear addition (constant differences) and exponential multiplication (constant factors).
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title">Student & Teacher Overview: Lesson 3</h2>
                <span class="lesson-overview-pill">Exponential Modeling</span>
            </div>
            <p class="lesson-overview-text">
                In this lesson, you will contrast situations that can be modeled with linear functions to those modeled with exponential functions. Move the interactive doubling slider below to discover why exponential growth rapidly explodes and inevitably surpasses any linear growth.
            </p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <li>Distinguish between situations that grow by equal differences over equal intervals (linear) vs. equal factors over equal intervals (exponential).</li>
                        <li>Construct linear and exponential mathematical models using tables, coordinate graphs, and algebraic expressions.</li>
                        <li>Observe and prove that a quantity increasing exponentially ($b > 1$) will always eventually exceed any quantity increasing linearly.</li>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text">
                        Connect this directly to the classic "Ruler vs. Rice Grain" or "Penny Doubled Daily" puzzle. Have students physically calculate values for $x = 0, 1, 2, 3, 4, 5$ on their scratchpads (Alt+S) before testing the simulator to solidify understanding of repeated multiplication.
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Doubling Simulator Workbench -->
        <section class="lesson-sim-workbench" aria-labelledby="sim-title">
            <div class="lesson-sim-header">
                <div class="lesson-sim-title-wrap">
                    <h3 id="sim-title" class="lesson-sim-title">
                        <i class="fas fa-chart-line" aria-hidden="true"></i> Exponential Doubling Simulator ($y = 2^x$)
                    </h3>
                    <p class="lesson-sim-subtitle">
                        Adjust the step slider from $x = 0$ to $x = 8$. Observe how linear growth increases by adding $2$ at each step, while exponential growth explodes by multiplying by $2$ at each step!
                    </p>
                </div>
                <div class="lesson-sim-presets">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-secondary); margin-right: 0.25rem;">Jump to:</span>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setStep(0)">x = 0 (Start)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setStep(2)">x = 2 (Tied at 4)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setStep(4)">x = 4 (Exp Leads)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setStep(8)">x = 8 (Explosion: 256!)</button>
                </div>
            </div>

            <div class="lesson-sim-grid">
                <!-- Controls Column -->
                <div class="lesson-sim-controls">
                    <div class="lesson-sim-slider-box">
                        <div class="lesson-sim-slider-label">
                            <span>Step Position (<strong style="color: #e11d48;">x</strong>):</span>
                            <span id="step-badge" class="lesson-sim-step-badge">x = 3</span>
                        </div>
                        <input type="range" id="exp-step-slider" min="0" max="8" value="3" step="1" oninput="updateExponentialSim(this.value)" class="lesson-sim-slider" aria-label="Step slider from 0 to 8">
                        <div class="lesson-sim-ticks">
                            <span>0</span>
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                        </div>
                    </div>

                    <div class="lesson-sim-stat-grid">
                        <div class="lesson-sim-stat-card card-linear">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-arrows-alt-h mr-1" aria-hidden="true"></i> Linear ($2x$)</span>
                            <span id="stat-linear-val" class="lesson-sim-stat-val stat-linear-color">6</span>
                            <span id="stat-linear-calc" class="lesson-sim-stat-calc">2 &times; 3 = 6</span>
                        </div>
                        <div class="lesson-sim-stat-card card-exp">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-rocket mr-1" aria-hidden="true"></i> Exponential ($2^x$)</span>
                            <span id="stat-exp-val" class="lesson-sim-stat-val stat-exp-color">8</span>
                            <span id="stat-exp-calc" class="lesson-sim-stat-calc">2³ = 8</span>
                        </div>
                    </div>
                </div>

                <!-- Visualizer Column -->
                <div class="lesson-sim-visualizer">
                    <div class="lesson-sim-bar-item">
                        <div class="lesson-sim-bar-label-row">
                            <span style="color: #60a5fa;"><i class="fas fa-arrows-alt-h mr-1"></i> Linear ($2x$):</span>
                            <span id="bar-linear-label" style="color: var(--color-text-default);">6 units</span>
                        </div>
                        <div class="lesson-sim-bar-track">
                            <div id="bar-linear-fill" class="lesson-sim-bar-fill fill-linear" style="width: 2.34%;"></div>
                        </div>
                    </div>

                    <div class="lesson-sim-bar-item">
                        <div class="lesson-sim-bar-label-row">
                            <span style="color: #fb7185;"><i class="fas fa-rocket mr-1"></i> Exponential ($2^x$):</span>
                            <span id="bar-exp-label" style="color: var(--color-text-default);">8 units</span>
                        </div>
                        <div class="lesson-sim-bar-track">
                            <div id="bar-exp-fill" class="lesson-sim-bar-fill fill-exp" style="width: 3.12%;"></div>
                        </div>
                    </div>

                    <div class="lesson-sim-ratio-box">
                        <div class="lesson-sim-ratio-pill" id="sim-ratio-pill">
                            <i class="fas fa-bolt"></i> Exponential is <span id="sim-ratio-text">1.33&times;</span> larger
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mathematical Formulations -->
        <section class="lesson-overview-section">
            <h3 class="lesson-section-title">Constant Differences vs. Constant Factors</h3>
            <p class="lesson-overview-text">
                Understanding whether an observed phenomenon behaves linearly or exponentially comes down to how quantities transition between consecutive intervals:
            </p>

            <div class="lesson-formula-grid">
                <div class="lesson-formula-card card-linear-formula">
                    <h4 class="lesson-formula-title"><i class="fas fa-plus-circle mr-2" style="color: #3b82f6;"></i> Linear Functions</h4>
                    <div class="lesson-formula-math">f(x) = mx + b</div>
                    <p class="lesson-formula-desc">
                        <strong>Operation:</strong> Repeated Addition.<br>
                        Grows by equal differences over equal intervals: each unit step adds a constant slope rate $m$.
                    </p>
                </div>
                <div class="lesson-formula-card card-exp-formula">
                    <h4 class="lesson-formula-title"><i class="fas fa-times-circle mr-2" style="color: #e11d48;"></i> Exponential Functions</h4>
                    <div class="lesson-formula-math">f(x) = a &middot; b<sup>x</sup></div>
                    <p class="lesson-formula-desc">
                        <strong>Operation:</strong> Repeated Multiplication.<br>
                        Grows by equal factors over equal intervals: each unit step multiplies the existing total by the constant base $b$.
                    </p>
                </div>
            </div>
        </section>

        <!-- Step-by-Step Table -->
        <section class="lesson-overview-section">
            <h3 class="lesson-section-title">Step-by-Step Numerical Comparison</h3>
            <p class="lesson-overview-text">
                Notice what happens across the first several steps. At first, linear values appear competitive; by step 3, exponential takes the lead; by step 8, exponential has grown to over 16 times the linear value!
            </p>

            <div class="lesson-table-container">
                <table class="lesson-step-table">
                    <thead>
                        <tr>
                            <th>Step ($x$)</th>
                            <th>Linear Expression ($2x$)</th>
                            <th>Linear Output</th>
                            <th>Exponential Expression ($2^x$)</th>
                            <th>Exponential Output</th>
                            <th>Comparison Outcome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="row-step-0"><td>0</td><td>2 &times; 0</td><td>0</td><td>2⁰</td><td>1</td><td>Exponential +1 ahead</td></tr>
                        <tr id="row-step-1"><td>1</td><td>2 &times; 1</td><td>2</td><td>2¹</td><td>2</td><td>Tied (2 vs 2)</td></tr>
                        <tr id="row-step-2"><td>2</td><td>2 &times; 2</td><td>4</td><td>2²</td><td>4</td><td>Tied (4 vs 4)</td></tr>
                        <tr id="row-step-3" class="highlight-row"><td>3</td><td>2 &times; 3</td><td>6</td><td>2³</td><td>8</td><td>Exp leads (1.33&times;)</td></tr>
                        <tr id="row-step-4"><td>4</td><td>2 &times; 4</td><td>8</td><td>2⁴</td><td>16</td><td>Exp is 2.0&times; larger</td></tr>
                        <tr id="row-step-5"><td>5</td><td>2 &times; 5</td><td>10</td><td>2⁵</td><td>32</td><td>Exp is 3.2&times; larger</td></tr>
                        <tr id="row-step-6"><td>6</td><td>2 &times; 6</td><td>12</td><td>2⁶</td><td>64</td><td>Exp is 5.3&times; larger</td></tr>
                        <tr id="row-step-7"><td>7</td><td>2 &times; 7</td><td>14</td><td>2⁷</td><td>128</td><td>Exp is 9.1&times; larger</td></tr>
                        <tr id="row-step-8"><td>8</td><td>2 &times; 8</td><td>16</td><td>2⁸</td><td>256</td><td>Exp is 16.0&times; larger!</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Vocabulary Section -->
        <section class="lesson-vocab-section">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon" aria-hidden="true"></i>Lesson Vocabulary
                    </h3>
                    <p class="lesson-panel-desc">Click on any term below to inspect its mathematical definition and role in exponential modeling.</p>
                </div>
                <div class="lesson-vocab-grid">
                    <div onclick="toggleVocabCard('vocab-1')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Exponential Function</h4>
                            <span class="lesson-vocab-icon" id="vocab-1-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-1-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                A function in which an independent variable appears as an exponent: $f(x) = a \cdot b^x$. The rate of change increases directly in proportion to the magnitude of the function value itself.
                            </p>
                        </div>
                    </div>
                    <div onclick="toggleVocabCard('vocab-2')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Base Multiplier (b)</h4>
                            <span class="lesson-vocab-icon" id="vocab-2-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-2-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The constant factor by which the function value is multiplied each time $x$ increases by 1 unit. When $b > 1$, the function models growth; when $0 < b < 1$, it models exponential decay.
                            </p>
                        </div>
                    </div>
                    <div onclick="toggleVocabCard('vocab-3')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Initial Value (a)</h4>
                            <span class="lesson-vocab-icon" id="vocab-3-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-3-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The value of the function when $x = 0$, representing the $y$-intercept. Because any nonzero base raised to the power of 0 equals 1 ($b^0 = 1$), $f(0) = a \cdot 1 = a$.
                            </p>
                        </div>
                    </div>
                    <div onclick="toggleVocabCard('vocab-4')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Horizontal Asymptote</h4>
                            <span class="lesson-vocab-icon" id="vocab-4-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-4-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                A horizontal line ($y = 0$ for basic exponential curves) that the curve approaches closer and closer as $x \to -\infty$, but never intersects or passes.
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
                <p class="lesson-citation-text">Eureka Math. "Graphs of Exponential Functions." New York State Common Core Mathematics Curriculum, Algebra I, Module 1, Topic A, Lesson 3.</p>
                <p class="lesson-citation-subtext">Aligned with standard HSF.LE.A.1 &bull; Construct and compare linear, quadratic, and exponential models.</p>
            </div>
            <div class="lesson-footer-meta">
                <div>Unique Lesson ID: <span class="lesson-meta-id">L-ID-EXP-K-M1-A-3</span></div>
                <a href="<?= isset($levelUrl) ? htmlspecialchars($levelUrl) : '../levels/k.php' ?>" class="lesson-btn-back">
                    <i class="fas fa-arrow-left lesson-btn-icon" aria-hidden="true"></i> BACK TO LEVEL K
                </a>
            </div>
        </div>
    </div>
</main>

<script>
    function updateExponentialSim(step) {
        const x = parseInt(step, 10);
        const linear = 2 * x;
        const exp = Math.pow(2, x);

        // Update Slider Badge
        const badge = document.getElementById('step-badge');
        if (badge) badge.innerText = `x = ${x}`;

        // Update Stat Cards
        const linearValEl = document.getElementById('stat-linear-val');
        const expValEl = document.getElementById('stat-exp-val');
        const linearCalcEl = document.getElementById('stat-linear-calc');
        const expCalcEl = document.getElementById('stat-exp-calc');

        if (linearValEl) linearValEl.innerText = linear;
        if (expValEl) expValEl.innerText = exp;
        if (linearCalcEl) linearCalcEl.innerText = `2 \u00D7 ${x} = ${linear}`;
        if (expCalcEl) expCalcEl.innerText = x === 0 ? '2⁰ = 1' : (x === 1 ? '2¹ = 2' : `2^${x} = ${exp}`);

        // Update Bars (Max 256 for x=8)
        const linearPct = Math.min(100, Math.max(3, (linear / 256) * 100));
        const expPct = Math.min(100, Math.max(3, (exp / 256) * 100));

        const barLinear = document.getElementById('bar-linear-fill');
        const barExp = document.getElementById('bar-exp-fill');
        const barLinearLabel = document.getElementById('bar-linear-label');
        const barExpLabel = document.getElementById('bar-exp-label');

        if (barLinear) barLinear.style.width = linearPct + '%';
        if (barExp) barExp.style.width = expPct + '%';
        if (barLinearLabel) barLinearLabel.innerText = `${linear} units`;
        if (barExpLabel) barExpLabel.innerText = `${exp} units`;

        // Ratio Text
        const ratioPill = document.getElementById('sim-ratio-pill');
        if (ratioPill) {
            if (linear === 0) {
                ratioPill.innerHTML = '<i class="fas fa-star" style="color: #fbbf24;"></i> At x = 0, Exponential starts at 1, Linear is 0';
            } else if (linear === exp) {
                ratioPill.innerHTML = '<i class="fas fa-balance-scale" style="color: #60a5fa;"></i> At x = ' + x + ', Linear and Exponential are equal (' + exp + ')';
            } else if (exp > linear) {
                const ratio = (exp / linear).toFixed(2);
                ratioPill.innerHTML = '<i class="fas fa-bolt" style="color: #f43f5e;"></i> Exponential is <strong>' + ratio + '&times;</strong> larger than Linear';
            } else {
                const diff = linear - exp;
                ratioPill.innerHTML = '<i class="fas fa-info-circle"></i> Linear leads by ' + diff + ' unit';
            }
        }

        // Highlight row in table
        for (let i = 0; i <= 8; i++) {
            const row = document.getElementById(`row-step-${i}`);
            if (row) {
                if (i === x) {
                    row.classList.add('highlight-row');
                } else {
                    row.classList.remove('highlight-row');
                }
            }
        }
    }

    function setStep(val) {
        const slider = document.getElementById('exp-step-slider');
        if (slider) {
            slider.value = val;
            updateExponentialSim(val);
        }
    }

    function toggleVocabCard(id) {
        const body = document.getElementById(`${id}-body`);
        const icon = document.getElementById(`${id}-icon`);
        if (!body) return;

        if (body.style.maxHeight && body.style.maxHeight !== '0px') {
            body.style.maxHeight = '0px';
            if (icon) icon.innerHTML = '<i class="fas fa-chevron-down"></i>';
        } else {
            const allBodies = document.querySelectorAll('[id$="-body"]');
            const allIcons = document.querySelectorAll('[id$="-icon"]');
            allBodies.forEach(b => {
                if (b.id.startsWith('vocab-')) b.style.maxHeight = '0px';
            });
            allIcons.forEach(i => {
                if (i.id.startsWith('vocab-')) i.innerHTML = '<i class="fas fa-chevron-down"></i>';
            });

            body.style.maxHeight = body.scrollHeight + 'px';
            if (icon) icon.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateExponentialSim(3);
    });
</script>

<?php
$lessonId = 'k-math-m1-a-3';
$lessonCode = 'K.M1.A.3';
$lessonTitle = 'Graphs of Exponential Functions';
$lessonStandard = 'HSF.LE.A.1';
$levelId = 'k';
if (!isset($levelUrl)) {
    $levelUrl = '../levels/k.php';
}
if (!isset($prevLessonUrl)) {
    $prevLessonUrl = ($levelUrl === 'k.php') ? 'k.php?k-math-m1-a-2' : 'k-math-m1-a-2.php';
}
if (!isset($nextLessonUrl)) {
    $nextLessonUrl = ($levelUrl === 'k.php') ? 'k.php?k-math-m1-a-4' : 'k-math-m1-a-4.php';
}
$practiceQuestions = [
    [
        'question' => 'A bacterial population starts with 5 cells and triples every hour. Which expression models the population after t hours?',
        'options' => [
            'P(t) = 5 + 3t',
            'P(t) = 5 · 3ᵗ',
            'P(t) = 3 · 5ᵗ',
            'P(t) = (5 · 3) + t'
        ],
        'correct' => 1,
        'explanation' => 'In exponential form P(t) = a · bᵗ, initial amount a = 5 and growth multiplier base b = 3. Therefore P(t) = 5 · 3ᵗ.'
    ],
    [
        'question' => 'As x becomes very large, what is always true when comparing an exponential function with base b > 1 to any linear function?',
        'options' => [
            'The linear function will eventually exceed the exponential function',
            'The exponential function will eventually grow much faster and exceed any linear function',
            'Both functions will remain parallel forever',
            'The exponential function will decay to zero'
        ],
        'correct' => 1,
        'explanation' => 'Because exponential functions multiply by a constant factor greater than 1 at each step, an exponential quantity will always eventually outpace any linear function.'
    ],
    [
        'question' => 'Which of the following data tables represents an exponential function rather than a linear function?',
        'options' => [
            'x: (1, 2, 3, 4); y: (5, 9, 13, 17)',
            'x: (1, 2, 3, 4); y: (3, 6, 12, 24)',
            'x: (1, 2, 3, 4); y: (10, 8, 6, 4)',
            'x: (1, 2, 3, 4); y: (0, 7, 14, 21)'
        ],
        'correct' => 1,
        'explanation' => 'In table (3, 6, 12, 24), consecutive outputs have a constant factor of 2 (6/3 = 12/6 = 24/12 = 2), indicating exponential multiplication by 2. The other tables add or subtract constant differences.'
    ]
];

include ABSPATH . 'src/lesson_runner.php';
include ABSPATH . 'src/footer.php';
?>
