<?php
/**
 * Hesten's Learning - Universal Lesson Renderer
 * Dynamically renders lessons based on JSON definitions.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// 1. Load Lesson Data
$lessonsFile = ABSPATH . 'assets/data/lessons.json';
$lessonsData = file_exists($lessonsFile) ? json_decode(file_get_contents($lessonsFile), true) : ['lessons' => []];

if (empty($lessonId)) {
    if (!empty($_GET['id'])) {
        $lessonId = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim($_GET['id']));
    } elseif (!empty($_GET['lesson'])) {
        $lessonId = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim($_GET['lesson']));
    } elseif (!empty($_SERVER['QUERY_STRING']) && !str_contains($_SERVER['QUERY_STRING'], '=')) {
        $lessonId = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim(explode('&', $_SERVER['QUERY_STRING'])[0]));
    } else {
        $lessonId = basename($_SERVER['PHP_SELF'], '.php');
    }
}

// 2. Fetch or dynamically scaffold lesson
if (isset($lessonsData['lessons'][$lessonId])) {
    $lesson = $lessonsData['lessons'][$lessonId];
    $meta = $lesson['meta'];
} else {
    // Intelligent Curriculum Scaffolder for all standards
    $parts = explode('-', $lessonId);
    $rawLevel = strtolower($parts[0] ?? 'k');
    $rawSubj = strtolower($parts[1] ?? 'math');
    $rawMod = strtoupper($parts[2] ?? 'M1');
    $rawTopic = strtoupper($parts[3] ?? 'A');
    $rawLesson = $parts[4] ?? '1';

    $gradeNames = [
        'a' => 'Level A (Pre-K)',
        'b' => 'Level B (Kindergarten)',
        'c' => 'Level C (1st Grade)',
        'd' => 'Level D (2nd Grade)',
        'e' => 'Level E (3rd Grade)',
        'f' => 'Level F (4th Grade)',
        'g' => 'Level G (5th Grade)',
        'h' => 'Level H (6th Grade)',
        'i' => 'Level I (7th Grade)',
        'j' => 'Level J (8th Grade)',
        'k' => 'Level K (Grade 9)',
        'l' => 'Level L (Grade 10)',
        'm' => 'Level M (Grade 11)',
        'n' => 'Level N (Grade 12)',
        'o' => 'Level O (AP Prep)'
    ];
    $subjConfig = [
        'math' => ['name' => 'Mathematics', 'icon' => 'fa-calculator', 'color' => '#3b82f6'],
        'ela' => ['name' => 'English Language Arts', 'icon' => 'fa-book-open', 'color' => '#ec4899'],
        'sci' => ['name' => 'Science Inquiry', 'icon' => 'fa-flask', 'color' => '#10b981'],
        'science' => ['name' => 'Science Inquiry', 'icon' => 'fa-flask', 'color' => '#10b981'],
        'soc' => ['name' => 'Social Studies & Civics', 'icon' => 'fa-landmark', 'color' => '#f59e0b'],
        'social' => ['name' => 'Social Studies & Civics', 'icon' => 'fa-landmark', 'color' => '#f59e0b']
    ];

    $levelDisplay = $gradeNames[$rawLevel] ?? ('Level ' . strtoupper($rawLevel));
    $subjData = $subjConfig[$rawSubj] ?? ['name' => ucfirst($rawSubj), 'icon' => 'fa-book', 'color' => '#6366f1'];
    $codeStr = strtoupper(str_replace('-', '.', $lessonId));

    $meta = [
        'title' => "{$subjData['name']}: {$rawMod} Topic {$rawTopic} • Lesson {$rawLesson}",
        'description' => "Standard-aligned interactive curriculum practice and core concept reinforcement for {$levelDisplay}.",
        'badge' => "{$subjData['name']} {$codeStr}",
        'badgeIcon' => $subjData['icon']
    ];

    $lesson = [
        'meta' => $meta,
        'overview' => [
            'title' => "Core Learning Objectives & Overview",
            'pill' => "{$levelDisplay} • {$subjData['name']}",
            'text' => "In this lesson, explore the essential concepts of {$rawMod} Topic {$rawTopic}. Build mental models through multi-sensory examples, track your personal study notes in the scratchpad, and verify your comprehension using the docked runner.",
            'outcomes' => [
                "Identify and interpret the key structural principles of Topic {$rawTopic}.",
                "Apply systematic reasoning and problem-solving steps to real-world models.",
                "Verify understanding and quantify outcomes using analytical reasoning."
            ],
            'teacherInsight' => "Encourage students to use the digital scratchpad (Alt+S) and reading mask (Alt+M) to scaffold multi-step problems and reduce visual crowding."
        ],
        'content' => [],
        'vocabulary' => [
            ['term' => 'Core Concept', 'definition' => 'The foundational idea or principle anchoring this standard competency.'],
            ['term' => 'Constraint', 'definition' => 'A limit, rule, or boundary condition governing a system or mathematical equation.'],
            ['term' => 'Evidence', 'definition' => 'Data, observations, or textual proof utilized to support a reasoned hypothesis or conclusion.'],
            ['term' => 'Synthesis', 'definition' => 'Combining multiple pieces of information or principles into a cohesive understanding.']
        ]
    ];
}

// Set Page Meta
$pageTitle = $meta['title'] . " | Hesten's Learning";
$pageDescription = $meta['description'];
if (!empty($rawSubj) && $rawSubj === 'math' || str_contains($lessonId ?? '', 'math')) {
    $requiresMathJax = true;
}

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/lesson.css">

<?php
$barTitle = $meta['title'] ?? 'Lesson';
$barSubtitle = $meta['badge'] ?? '';
$barBackUrl = '/levels/' . strtolower($rawLevel ?? 'k') . '.php';
include_once ABSPATH . 'src/partials/sticky-reading-bar.php';
?>

<main class="lesson-container">
    <div class="lesson-card">
        <!-- Header -->
        <div class="lesson-header">
            <span class="lesson-badge">
                <i class="fas <?php echo htmlspecialchars($meta['badgeIcon'] ?? 'fa-book'); ?> lesson-badge-icon"></i> <?php echo htmlspecialchars($meta['badge'] ?? ''); ?>
            </span>
            <h1 class="lesson-title"><?php echo htmlspecialchars($meta['title'] ?? ''); ?></h1>
            <p class="lesson-desc"><?php echo htmlspecialchars($meta['description'] ?? ''); ?></p>
        </div>

        <!-- Overview -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title"><?php echo htmlspecialchars($lesson['overview']['title'] ?? ''); ?></h2>
                <span class="lesson-overview-pill"><?php echo htmlspecialchars($lesson['overview']['pill'] ?? ''); ?></span>
            </div>
            <p class="lesson-overview-text"><?php echo htmlspecialchars($lesson['overview']['text'] ?? ''); ?></p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <?php foreach (($lesson['overview']['outcomes'] ?? []) as $outcome): ?>
                            <li><?php echo htmlspecialchars($outcome); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text"><?php echo htmlspecialchars($lesson['overview']['teacherInsight'] ?? ''); ?></p>
                </div>
            </div>
        </section>

        <!-- Dynamic Content -->
        <?php foreach (($lesson['content'] ?? []) as $block): ?>
            <?php 
                $type = preg_replace('/[^a-zA-Z0-9\-_]/', '', $block['type'] ?? '');
                // Components are stored in src/components/
                $componentPath = ABSPATH . "src/components/{$type}.php";
                if (!empty($type) && file_exists($componentPath)) {
                    // Pass block data to the component
                    $blockData = $block; 
                    include $componentPath;
                } else {
                    echo "<div class='error-block'>Component " . htmlspecialchars($type) . " not found.</div>";
                }
            ?>
        <?php endforeach; ?>

        <!-- Vocabulary -->
        <section class="lesson-vocab-section">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon"></i> Lesson Vocabulary
                    </h3>
                </div>
                <div class="lesson-vocab-grid">
                    <?php foreach (($lesson['vocabulary'] ?? []) as $index => $vocab): ?>
                        <div onclick="toggleVocabCard('vocab-<?php echo (int)$index; ?>')" class="lesson-vocab-card">
                            <div class="lesson-vocab-header">
                                <h4 class="lesson-vocab-title"><?php echo htmlspecialchars($vocab['term'] ?? ''); ?></h4>
                                <span class="lesson-vocab-icon" id="vocab-<?php echo (int)$index; ?>-icon"><i class="fas fa-chevron-down"></i></span>
                            </div>
                            <div id="vocab-<?php echo (int)$index; ?>-body" class="lesson-vocab-body">
                                <p class="lesson-vocab-text"><?php echo htmlspecialchars($vocab['definition'] ?? ''); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
        // Prepare Formative Exit Ticket Questions based on subject
        $exitQuestions = [];
        if ($rawSubj === 'math') {
            $exitQuestions = [
                [
                    'question' => 'When analyzing a real-world functional relationship, what does the rate of change $\\frac{\\Delta y}{\\Delta x}$ represent in context?',
                    'options' => [
                        'The ratio or speed at which the dependent output changes per unit change of the independent input.',
                        'The total sum of all coordinate coordinates plotted on the plane.',
                        'A static constant that always equals zero regardless of situation.',
                        'The vertical distance between the origin $(0,0)$ and the graph maximum.'
                    ],
                    'correct' => 0,
                    'explanation' => 'The rate of change measures slope $\\frac{\\Delta y}{\\Delta x}$, quantifying how fast the output variable responds to unit changes in the input.'
                ],
                [
                    'question' => 'Why must mathematical models account for domain restrictions (such as $t \\ge 0$) in physical applications?',
                    'options' => [
                        'Physical quantities like elapsed time, mass, or liquid volume cannot be negative in physical reality.',
                        'Coordinate planes cannot display points with negative coordinates.',
                        'Equations stop functioning if negative inputs are evaluated.',
                        'Domain restrictions are optional artistic styling choices.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Physical real-world variables have natural boundary constraints ($t \\ge 0$, volume $V \\ge 0$) that define the valid operational domain of the model.'
                ],
                [
                    'question' => 'On a continuous piecewise graph of a physical process, what does a horizontal line segment ($m = 0$) indicate?',
                    'options' => [
                        'The rate of change is zero, meaning the measured quantity remained constant over that time interval.',
                        'The system was increasing at an infinite rate.',
                        'The input variable was running backwards in time.',
                        'The graph is broken and cannot be interpreted.'
                    ],
                    'correct' => 0,
                    'explanation' => 'A horizontal segment indicates a slope of zero, meaning as the independent variable progressed, the dependent quantity did not change.'
                ]
            ];
        } elseif ($rawSubj === 'ela') {
            $exitQuestions = [
                [
                    'question' => 'What is the primary role of supporting textual evidence in an analytical or argumentative claim?',
                    'options' => [
                        'Grounding claims in verified quotes and direct observations to justify reasoned conclusions.',
                        'Making the paragraph visually longer to meet word count minimums.',
                        'Replacing the need for a thesis statement or central argument.',
                        'Proving that opposing viewpoints should never be acknowledged.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Textual evidence provides verifiable citations that connect the student\'s analytical reasoning with the author\'s original text.'
                ],
                [
                    'question' => 'When analyzing authorial tone and diction, which literary element is most critical to investigate?',
                    'options' => [
                        'The emotional connotations, stylistic nuances, and specific word choices selected by the author.',
                        'The font typography and page margin width in the physical book.',
                        'The alphabetical order of words in the glossary index.',
                        'Strictly the punctuation mark at the very end of the final paragraph.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Authorial tone is established through deliberate word choice (diction) and syntactical structure.'
                ],
                [
                    'question' => 'How does identifying a text\'s central theme differ from identifying its plot summary?',
                    'options' => [
                        'Theme conveys a universal insight about human nature or life, whereas plot outlines the chronological sequence of events.',
                        'Theme is only found in non-fiction articles, while plot only exists in poetry.',
                        'There is no distinction; theme and plot are completely interchangeable terms.',
                        'Plot describes the moral lesson, while theme lists character names.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Plot describes what happens chronologically, while theme articulates the deeper universal message or truth.'
                ]
            ];
        } else {
            $exitQuestions = [
                [
                    'question' => 'Why is isolating a single independent variable essential in scientific and historical inquiry?',
                    'options' => [
                        'To ensure that observed outcomes can be confidently attributed to that specific cause or factor.',
                        'To minimize the amount of data needed to write a conclusion.',
                        'Because systems can never have more than one variable in nature.',
                        'To prevent mathematical formulas from being used in the analysis.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Controlling extraneous variables allows researchers to establish direct cause-and-effect relationships.'
                ],
                [
                    'question' => 'What differentiates empirical evidence from unsupported conjecture in analytical reasoning?',
                    'options' => [
                        'Empirical evidence is grounded in repeatable observations, data, and primary documentation.',
                        'Empirical evidence is based solely on personal opinion and popularity.',
                        'Conjecture requires mathematical proof, while evidence does not.',
                        'There is no functional difference in scholarly analysis.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Empirical evidence relies on observable, verifiable, and documented findings.'
                ],
                [
                    'question' => 'When synthesizing multiple sources with conflicting conclusions, what is the best analytical approach?',
                    'options' => [
                        'Evaluate methodology, source credibility, and bias before reconciling differences.',
                        'Discard both sources immediately and guess the answer.',
                        'Assume the first published source is always universally correct.',
                        'Only select the source that confirms your initial assumption.'
                    ],
                    'correct' => 0,
                    'explanation' => 'Rigorous synthesis demands critically evaluating author perspectives, methodology, and empirical rigor.'
                ]
            ];
        }
        ?>

        <!-- Formative Exit Ticket & Mastery Check -->
        <section class="lesson-exit-ticket-section" id="exit-ticket-section">
            <div class="exit-ticket-header">
                <div class="exit-ticket-title-wrap">
                    <span class="exit-ticket-badge"><i class="fas fa-clipboard-check"></i> Standard Competency Check</span>
                    <h3>Exit Ticket: Quick Mastery Check</h3>
                    <p class="exit-ticket-desc">Demonstrate your understanding of this lesson's key concepts to log mastery to your profile.</p>
                </div>
            </div>

            <form id="exit-ticket-form" onsubmit="event.preventDefault(); submitExitTicket();">
                <?php foreach ($exitQuestions as $qIdx => $q): ?>
                    <div class="exit-ticket-card" id="exit-q-<?= $qIdx ?>">
                        <div class="exit-ticket-question">
                            <strong>Question <?= ($qIdx + 1) ?>:</strong> <?= htmlspecialchars($q['question']) ?>
                        </div>
                        <div class="exit-ticket-options">
                            <?php foreach ($q['options'] as $oIdx => $opt): ?>
                                <label class="exit-ticket-option" id="exit-opt-<?= $qIdx ?>-<?= $oIdx ?>">
                                    <input type="radio" name="exit_q_<?= $qIdx ?>" value="<?= $oIdx ?>" required>
                                    <span><?= htmlspecialchars($opt) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="exit-ticket-explanation" id="exit-exp-<?= $qIdx ?>">
                            <strong><i class="fas fa-info-circle"></i> Explanation:</strong> <?= htmlspecialchars($q['explanation']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="exit-ticket-actions">
                    <button type="submit" id="exit-ticket-submit-btn" class="exit-ticket-submit-btn">
                        <i class="fas fa-check-circle"></i> Submit & Check Mastery
                    </button>
                    <div id="exit-ticket-score" class="exit-ticket-score-banner"></div>
                </div>
            </form>
        </section>

        <script>
        const EXIT_QUESTIONS = <?= json_encode($exitQuestions) ?>;
        const LESSON_CODE = <?= json_encode($codeStr) ?>;
        const LESSON_STD = <?= json_encode('CCSS.' . strtoupper($rawSubj ?? 'MATH') . '.' . strtoupper($rawLevel ?? 'K') . '.' . strtoupper($rawMod ?? 'M1')) ?>;
        const LESSON_LVL = <?= json_encode($rawLevel ?? 'k') ?>;
        const LESSON_TITLE = <?= json_encode($meta['title'] ?? 'Curriculum Lesson') ?>;

        function submitExitTicket() {
            let correctCount = 0;
            const total = EXIT_QUESTIONS.length;

            EXIT_QUESTIONS.forEach((q, idx) => {
                const selected = document.querySelector(`input[name="exit_q_${idx}"]:checked`);
                const expEl = document.getElementById(`exit-exp-${idx}`);
                if (expEl) expEl.classList.add('visible');

                q.options.forEach((_, optIdx) => {
                    const optLabel = document.getElementById(`exit-opt-${idx}-${optIdx}`);
                    if (!optLabel) return;
                    optLabel.classList.remove('correct-choice', 'incorrect-choice');
                    if (optIdx === q.correct) {
                        optLabel.classList.add('correct-choice');
                    }
                });

                if (selected) {
                    const userVal = parseInt(selected.value, 10);
                    const chosenLabel = document.getElementById(`exit-opt-${idx}-${userVal}`);
                    if (userVal === q.correct) {
                        correctCount++;
                    } else if (chosenLabel) {
                        chosenLabel.classList.add('incorrect-choice');
                    }
                }
            });

            const pct = Math.round((correctCount / total) * 100);
            const scoreBanner = document.getElementById('exit-ticket-score');
            if (scoreBanner) {
                scoreBanner.className = 'exit-ticket-score-banner visible';
                if (pct >= 80) {
                    scoreBanner.classList.add('mastered');
                    scoreBanner.innerHTML = `<i class="fas fa-trophy"></i> Mastered! ${correctCount}/${total} (${pct}%) • Saved to Profile`;
                } else {
                    scoreBanner.classList.add('retry');
                    scoreBanner.innerHTML = `<i class="fas fa-redo"></i> Score: ${correctCount}/${total} (${pct}%) • Review explanations above`;
                }
            }

            // Save mastery to localStorage
            try {
                let mastery = {};
                const raw = localStorage.getItem('hesten_standards_mastery');
                if (raw) mastery = JSON.parse(raw);
                const prev = mastery[LESSON_CODE] || {};
                mastery[LESSON_CODE] = {
                    code: LESSON_CODE,
                    name: LESSON_TITLE,
                    standard: LESSON_STD,
                    bestScore: Math.max(prev.bestScore || 0, pct),
                    lastAttempt: new Date().toISOString().split('T')[0],
                    attempts: (prev.attempts || 0) + 1,
                    level: LESSON_LVL
                };
                localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));
                window.dispatchEvent(new CustomEvent('standards-mastery-updated', { detail: mastery[LESSON_CODE] }));
            } catch (e) {
                console.warn('Failed to record mastery:', e);
            }

            if (window.ensureMathJax) {
                window.ensureMathJax([document.getElementById('exit-ticket-section')]);
            }
        }
        </script>
    </div>
</main>

<?php
$levelId = $rawLevel ?? 'k';
$levelUrl = '/levels/' . ($rawLevel ?? 'k') . '.php';
$lessonCode = strtoupper(str_replace('-', '.', $lessonId));
$lessonTitle = $meta['title'] ?? 'Curriculum Lesson';
$lessonStandard = 'CCSS.' . strtoupper($rawSubj ?? 'MATH') . '.' . strtoupper($rawLevel ?? 'K') . '.' . strtoupper($rawMod ?? 'M1');
include ABSPATH . 'src/lesson_runner.php';
?>

<?php include ABSPATH . 'src/footer.php'; ?>
