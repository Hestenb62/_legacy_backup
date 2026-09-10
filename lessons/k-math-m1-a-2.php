<?php
/**
 * Hesten's Learning - Lesson K.M1.A.2
 * Growth of Square Areas and Functions
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

$pageTitle = "Growth of Square Areas and Functions | Hesten's Learning";
$pageDescription = "Examine how the area of a square grows compared to its side length, laying foundations for quadratic functions.";
$pageAuthor = "Hesten's Learning Team";

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
                <i class="fas fa-calculator lesson-badge-icon" aria-hidden="true"></i> Math Lesson K.M1.A.2
            </span>
            <h1 class="lesson-title">Growth of Square Areas and Functions</h1>
            <p class="lesson-desc">
                How do geometric figures grow? Contrast linear perimeter growth with quadratic area expansion using an interactive geometric workbench.
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title">Student & Teacher Overview: Lesson 2</h2>
                <span class="lesson-overview-pill">Linear vs. Quadratic</span>
            </div>
            <p class="lesson-overview-text">
                In this lesson, you will analyze how perimeter and area change as a square's side length varies. While perimeter grows linearly by constant increments of 4, area expands quadratically at an accelerating rate.
            </p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <li>Represent perimeter growth with linear functions ($P(s) = 4s$) and area growth with quadratic functions ($A(s) = s^2$).</li>
                        <li>Recognize that quadratic functions feature a variable raised to the second power and possess a non-constant rate of change.</li>
                        <li>Analyze tabular and graphical representations showing how area quickly surpasses perimeter for $s > 4$.</li>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text">
                        Highlight the special transition points: at $s = 4$, the numerical value of the perimeter ($4 \times 4 = 16$) equals the area ($4^2 = 16$). For any side length greater than 4, area dominates.
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Side Length Simulator Workbench -->
        <section class="lesson-sim-workbench" aria-labelledby="sim-title">
            <div class="lesson-sim-header">
                <div class="lesson-sim-title-wrap">
                    <h3 id="sim-title" class="lesson-sim-title">
                        <i class="fas fa-shapes" aria-hidden="true"></i> Geometric Side Length Simulator ($s \to 4s \text{ vs. } s^2$)
                    </h3>
                    <p class="lesson-sim-subtitle">
                        Adjust the slider below to change the square's side length ($s$). Watch the perimeter increase steadily while the area expands quadratically!
                    </p>
                </div>
                <div class="lesson-sim-presets">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-secondary); margin-right: 0.25rem;">Presets:</span>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setSide(1)">s = 1 (Small)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setSide(4)">s = 4 (Perimeter = Area = 16)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setSide(7)">s = 7 (Area Dominates)</button>
                    <button type="button" class="lesson-sim-preset-btn" onclick="setSide(10)">s = 10 (Area = 100!)</button>
                </div>
            </div>

            <div class="lesson-sim-grid">
                <!-- Controls Column -->
                <div class="lesson-sim-controls">
                    <div class="lesson-sim-slider-box">
                        <div class="lesson-sim-slider-label">
                            <span>Side Length (<strong style="color: #e11d48;">s</strong>):</span>
                            <span id="side-badge" class="lesson-sim-step-badge">s = 5</span>
                        </div>
                        <input type="range" id="side-slider" min="1" max="10" value="5" step="1" oninput="updateSquareSim(this.value)" class="lesson-sim-slider" aria-label="Side length slider from 1 to 10">
                        <div class="lesson-sim-ticks">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>
                    </div>

                    <div class="lesson-sim-stat-grid">
                        <div class="lesson-sim-stat-card card-linear">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-vector-square mr-1" aria-hidden="true"></i> Perimeter ($4s$)</span>
                            <span id="perimeter-val" class="lesson-sim-stat-val stat-linear-color">20</span>
                            <span id="perimeter-calc" class="lesson-sim-stat-calc">4 &times; 5 = 20 units</span>
                        </div>
                        <div class="lesson-sim-stat-card card-exp">
                            <span class="lesson-sim-stat-tag"><i class="fas fa-th mr-1" aria-hidden="true"></i> Area ($s^2$)</span>
                            <span id="area-val" class="lesson-sim-stat-val stat-exp-color">25</span>
                            <span id="area-calc" class="lesson-sim-stat-calc">5² = 25 sq units</span>
                        </div>
                    </div>
                </div>

                <!-- Visualizer Column: Dynamic Scaled Square Graphic -->
                <div class="lesson-sim-visualizer" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 280px;">
                    <div style="position: relative; width: 220px; height: 220px; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.2); border-radius: 1rem; border: 1px dashed var(--color-border, #334155);">
                        <div id="visual-square" style="width: 100px; height: 100px; background: rgba(225, 29, 72, 0.2); border: 3px solid #e11d48; border-radius: 0.5rem; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #ffffff; font-weight: 800; font-family: 'Outfit', sans-serif; transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 0 15px rgba(225, 29, 72, 0.3);">
                            <span id="visual-square-label" style="font-size: 1rem;">s = 5</span>
                            <span id="visual-square-sub" style="font-size: 0.75rem; opacity: 0.85;">25 sq units</span>
                        </div>
                    </div>
                    <div class="lesson-sim-ratio-box" style="width: 100%; margin-top: 1rem;">
                        <div class="lesson-sim-ratio-pill" id="square-ratio-pill">
                            <i class="fas fa-balance-scale" style="color: #f43f5e;"></i> Area exceeds perimeter by <strong>5 units</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulations & Concept Breakdown -->
        <section class="lesson-overview-section">
            <h3 class="lesson-section-title">Linear vs. Quadratic Growth Dynamics</h3>
            <p class="lesson-overview-text">
                Compare the fundamental mathematical structures governing linear and quadratic relationships:
            </p>

            <div class="lesson-formula-grid">
                <div class="lesson-formula-card card-linear-formula">
                    <h4 class="lesson-formula-title"><i class="fas fa-ruler mr-2" style="color: #3b82f6;"></i> Linear (Perimeter)</h4>
                    <div class="lesson-formula-math">P(s) = 4s</div>
                    <p class="lesson-formula-desc">
                        <strong>Constant Rate of Change:</strong> Adding 1 unit of side length always increases the perimeter by exactly 4 units.
                    </p>
                </div>
                <div class="lesson-formula-card card-exp-formula">
                    <h4 class="lesson-formula-title"><i class="fas fa-expand mr-2" style="color: #e11d48;"></i> Quadratic (Area)</h4>
                    <div class="lesson-formula-math">A(s) = s<sup>2</sup></div>
                    <p class="lesson-formula-desc">
                        <strong>Accelerating Rate of Change:</strong> Each 1-unit increase in side length yields a larger increase in area than the last step.
                    </p>
                </div>
            </div>
        </section>

        <!-- Vocabulary Section -->
        <section class="lesson-vocab-section">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon" aria-hidden="true"></i>Lesson Vocabulary
                    </h3>
                    <p class="lesson-panel-desc">Inspect key terminology related to quadratic equations and geometric growth.</p>
                </div>
                <div class="lesson-vocab-grid">
                    <div onclick="toggleVocabCard('v-quad-1')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Quadratic Function</h4>
                            <span class="lesson-vocab-icon" id="v-quad-1-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="v-quad-1-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                A polynomial function of degree 2 ($f(x) = ax^2 + bx + c$, with $a \neq 0$). Its graph forms a U-shaped parabola.
                            </p>
                        </div>
                    </div>
                    <div onclick="toggleVocabCard('v-quad-2')" class="lesson-vocab-card">
                        <div class="lesson-vocab-header">
                            <h4 class="lesson-vocab-title">Second Differences</h4>
                            <span class="lesson-vocab-icon" id="v-quad-2-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="v-quad-2-body" class="lesson-vocab-body">
                            <p class="lesson-vocab-text">
                                The differences between consecutive first differences. In any quadratic sequence with equal intervals, the second differences are constant!
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
                <p class="lesson-citation-text">Eureka Math. "Growth of Square Areas and Functions." New York State Common Core Mathematics Curriculum, Algebra I, Module 1, Topic A, Lesson 2.</p>
                <p class="lesson-citation-subtext">Aligned with standard HSA.CED.A.2 &bull; Create equations in two or more variables to represent relationships between quantities.</p>
            </div>
            <div class="lesson-footer-meta">
                <div>Unique Lesson ID: <span class="lesson-meta-id">L-ID-SQR-K-M1-A-2</span></div>
                <a href="<?= isset($levelUrl) ? htmlspecialchars($levelUrl) : '../levels/k.php' ?>" class="lesson-btn-back">
                    <i class="fas fa-arrow-left lesson-btn-icon" aria-hidden="true"></i> BACK TO LEVEL K
                </a>
            </div>
        </div>
    </div>
</main>

<script>
    function updateSquareSim(side) {
        const s = parseInt(side, 10);
        const perim = 4 * s;
        const area = s * s;

        // Update Slider Badge
        const badge = document.getElementById('side-badge');
        if (badge) badge.innerText = `s = ${s}`;

        // Update Stat Readouts
        const perimVal = document.getElementById('perimeter-val');
        const areaVal = document.getElementById('area-val');
        const perimCalc = document.getElementById('perimeter-calc');
        const areaCalc = document.getElementById('area-calc');

        if (perimVal) perimVal.innerText = perim;
        if (areaVal) areaVal.innerText = area;
        if (perimCalc) perimCalc.innerText = `4 \u00D7 ${s} = ${perim} units`;
        if (areaCalc) areaCalc.innerText = `${s}² = ${area} sq units`;

        // Update Visual Square representation
        const visual = document.getElementById('visual-square');
        const label = document.getElementById('visual-square-label');
        const sub = document.getElementById('visual-square-sub');

        if (visual) {
            // Clamp size between 30px and 200px
            const pxSize = 30 + (s - 1) * 18;
            visual.style.width = pxSize + 'px';
            visual.style.height = pxSize + 'px';
        }
        if (label) label.innerText = `s = ${s}`;
        if (sub) sub.innerText = `${area} sq units`;

        // Ratio / Comparison Pill
        const pill = document.getElementById('square-ratio-pill');
        if (pill) {
            if (perim === area) {
                pill.innerHTML = '<i class="fas fa-balance-scale" style="color: #60a5fa;"></i> At s = 4, Perimeter equals Area numerically (16)';
            } else if (area > perim) {
                const diff = area - perim;
                pill.innerHTML = '<i class="fas fa-chart-line" style="color: #f43f5e;"></i> Area exceeds perimeter by <strong>' + diff + ' units</strong>';
            } else {
                const diff = perim - area;
                pill.innerHTML = '<i class="fas fa-info-circle" style="color: #3b82f6;"></i> Perimeter exceeds area by <strong>' + diff + ' units</strong>';
            }
        }
    }

    function setSide(val) {
        const slider = document.getElementById('side-slider');
        if (slider) {
            slider.value = val;
            updateSquareSim(val);
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
            body.style.maxHeight = body.scrollHeight + 'px';
            if (icon) icon.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateSquareSim(5);
    });
</script>

<?php
$lessonId = 'k-math-m1-a-2';
$lessonCode = 'K.M1.A.2';
$lessonTitle = 'Growth of Square Areas and Functions';
$lessonStandard = 'HSA.CED.A.2';
$levelId = 'k';
if (!isset($levelUrl)) {
    $levelUrl = '../levels/k.php';
}
if (!isset($prevLessonUrl)) {
    $prevLessonUrl = ($levelUrl === 'k.php') ? 'k.php?k-math-m1-a-1' : 'k-math-m1-a-1.php';
}
if (!isset($nextLessonUrl)) {
    $nextLessonUrl = ($levelUrl === 'k.php') ? 'k.php?k-math-m1-a-3' : 'k-math-m1-a-3.php';
}
$practiceQuestions = [
    [
        'question' => 'How does the perimeter of a square change when its side length increases from 3 to 4 units?',
        'options' => [
            'Increases by 4 units',
            'Increases by 7 units',
            'Increases by 12 units',
            'Increases by 16 units'
        ],
        'correct' => 0,
        'explanation' => 'Perimeter is linear: P(s) = 4s. For s=3, P=12. For s=4, P=16. The increase is exactly 16 - 12 = 4 units.'
    ],
    [
        'question' => 'Why does area growth represent a quadratic function rather than a linear function?',
        'options' => [
            'The perimeter always remains constant',
            'The rate of change increases at every step because the variable is squared (A = s²)',
            'The area can never exceed the perimeter',
            'Quadratic functions only apply to non-geometric shapes'
        ],
        'correct' => 1,
        'explanation' => 'In A(s) = s², the rate of change is not constant. Each successive unit increase in side length yields a larger increase in area than the previous one.'
    ]
];

include ABSPATH . 'src/lesson_runner.php';
include ABSPATH . 'src/footer.php';
?>
