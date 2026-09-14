<?php
/**
 * Hesten's Learning - Universal Lesson Renderer
 * Dynamically renders lessons based on JSON definitions.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// 1. Identify Lesson ID
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

// 2. Load Lesson Data (Individual JSON file or central lessons.json)
$individualFile = ABSPATH . 'assets/data/lessons/' . $lessonId . '.json';
$lessonsFile = ABSPATH . 'assets/data/lessons.json';
$lessonsData = file_exists($lessonsFile) ? json_decode(file_get_contents($lessonsFile), true) : ['lessons' => []];

$parts = explode('-', $lessonId);
$rawLevel = strtolower($parts[0] ?? 'k');
$rawSubj = strtolower($parts[1] ?? 'math');
$rawMod = strtoupper($parts[2] ?? 'M1');
$rawTopic = strtoupper($parts[3] ?? 'A');
$rawLesson = $parts[4] ?? '1';

// GED Subject & Level Normalization
if ($rawLevel === 'ged') {
    if ($rawSubj === 'm') {
        $rawSubj = 'math';
    } elseif (in_array($rawSubj, ['r', 'w', 'rla'])) {
        $rawSubj = 'ela';
    } elseif (in_array($rawSubj, ['s', 'sci'])) {
        $rawSubj = 'science';
    } elseif (in_array($rawSubj, ['ss', 'soc'])) {
        $rawSubj = 'social';
    }
}

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
    'o' => 'Level O (AP Prep)',
    'ged' => 'Practice GED (High School Equivalency)'
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

if (file_exists($individualFile)) {
    $lesson = json_decode(file_get_contents($individualFile), true);
    $meta = $lesson['meta'] ?? [];
} elseif (isset($lessonsData['lessons'][$lessonId])) {
    $lesson = $lessonsData['lessons'][$lessonId];
    $meta = $lesson['meta'] ?? [];
} else {
    // Intelligent Curriculum Scaffolder for all standards
    $scaffoldTitle = ($rawLevel === 'ged')
        ? "GED {$subjData['name']}: Module {$rawMod} • Skill {$rawTopic}"
        : "{$subjData['name']}: {$rawMod} Topic {$rawTopic} • Lesson {$rawLesson}";
    $scaffoldBadge = ($rawLevel === 'ged')
        ? "GED {$subjData['name']} {$codeStr}"
        : "{$subjData['name']} {$codeStr}";

    $meta = [
        'title' => $scaffoldTitle,
        'description' => "Standard-aligned interactive curriculum practice and core concept reinforcement for {$levelDisplay}.",
        'badge' => $scaffoldBadge,
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
$pageTitle = $meta['pageTitle'] ?? (($meta['title'] ?? 'Lesson') . " | Hesten's Learning");
$pageDescription = $meta['pageDescription'] ?? ($meta['description'] ?? '');
$pageAuthor = $meta['author'] ?? "Hesten's Learning Team";
if (!empty($lesson['requiresMathJax']) || !empty($meta['requiresMathJax']) || $rawSubj === 'math' || str_contains($lessonId ?? '', 'math')) {
    $requiresMathJax = true;
}

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/lesson.css">

<?php
$barTitle = $meta['title'] ?? 'Lesson';
$barSubtitle = $meta['badge'] ?? '';
$barBackUrl = !empty($levelUrl) ? $levelUrl : (($rawLevel === 'ged') ? '/levels/practice-ged.php' : ('/levels/' . strtolower($rawLevel ?? 'k') . '.php'));
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
                if ($type === 'html' && !empty($block['html'])) {
                    echo $block['html'];
                    continue;
                }
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
        <?php if (!empty($lesson['vocabulary'])): ?>
        <section class="lesson-vocab-section lesson-vocab-section-full">
            <div class="lesson-vocab-panel">
                <div>
                    <h3 class="lesson-vocab-main-title">
                        <i class="fas fa-book lesson-icon"></i> Lesson Vocabulary
                    </h3>
                </div>
                <div class="lesson-vocab-grid">
                    <?php foreach (($lesson['vocabulary'] ?? []) as $index => $vocab): ?>
                        <div class="lesson-vocab-card lesson-vocab-card-open">
                            <div class="lesson-vocab-header">
                                <h4 class="lesson-vocab-title"><?php echo htmlspecialchars($vocab['term'] ?? ''); ?></h4>
                                <span class="lesson-vocab-icon" aria-hidden="true"><i class="fas fa-bookmark"></i></span>
                            </div>
                            <div class="lesson-vocab-body">
                                <p class="lesson-vocab-text"><?php echo htmlspecialchars($vocab['definition'] ?? ''); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Prepare Formative Exit Ticket Questions based on JSON or fallback subject defaults
        $exitQuestions = [];
        if (!empty($lesson['practiceQuestions']) && is_array($lesson['practiceQuestions'])) {
            $exitQuestions = $lesson['practiceQuestions'];
        } elseif ($rawSubj === 'math') {
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

        <!-- Interactive Check Understanding Trigger Card -->
        <section class="lesson-check-understanding-card" style="margin-top: 2.5rem; margin-bottom: 2rem; padding: 1.75rem 2rem; background: color-mix(in srgb, var(--color-primary, #e11d48) 5%, var(--color-surface)); border: 1px solid color-mix(in srgb, var(--color-primary, #e11d48) 20%, transparent); border-radius: 1.25rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1.5rem;">
            <div style="max-width: 600px;">
                <span class="lesson-badge" style="margin-bottom: 0.5rem; display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); letter-spacing: 0.05em;">
                    <i class="fas fa-clipboard-check"></i> Standard Competency Check
                </span>
                <h3 style="font-size: 1.35rem; font-weight: 900; color: var(--color-text-default); margin: 0 0 0.35rem 0; font-family: 'Outfit', sans-serif;">
                    Ready to Check Your Understanding?
                </h3>
                <p style="font-size: 0.9rem; color: var(--color-text-secondary); margin: 0; line-height: 1.5;">
                    Complete the quick exit ticket practice check to verify your understanding of this lesson and track standard mastery on your profile.
                </p>
            </div>
            <button type="button" onclick="openLessonPracticeModal()" class="lesson-btn-primary" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.85rem 1.75rem; font-size: 0.95rem; font-weight: 700; border-radius: 9999px; cursor: pointer; box-shadow: 0 4px 14px color-mix(in srgb, var(--color-primary, #e11d48) 35%, transparent); transition: all 0.2s ease;">
                <i class="fas fa-lightbulb"></i>
                <span>Check Understanding</span>
            </button>
        </section>

        <?php if (!empty($lesson['citation'])): ?>
            <!-- Source Citation & Metadata Footer -->
            <div class="lesson-footer" style="margin-top: 2.5rem; padding-top: 1.5rem; border-top: 1px solid color-mix(in srgb, var(--color-text) 10%, transparent); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
                <div class="lesson-citation-box">
                    <span class="lesson-citation-title" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--color-primary); letter-spacing: 0.05em; margin-bottom: 0.25rem;"><?php echo htmlspecialchars($lesson['citation']['title'] ?? 'Source Citation (MLA)'); ?></span>
                    <p class="lesson-citation-text" style="font-size: 0.875rem; color: var(--color-text-muted, #64748b); margin: 0;"><?php echo htmlspecialchars($lesson['citation']['text'] ?? ''); ?></p>
                    <?php if (!empty($lesson['citation']['subtext'])): ?>
                        <p class="lesson-citation-subtext" style="font-size: 0.775rem; color: var(--color-text-muted, #94a3b8); margin: 0.2rem 0 0;"><?php echo htmlspecialchars($lesson['citation']['subtext']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="lesson-footer-meta" style="display: flex; align-items: center; gap: 1rem;">
                    <?php if (!empty($lesson['citation']['lessonId'])): ?>
                        <div style="font-size: 0.8rem; color: var(--color-text-muted, #94a3b8);">Unique Lesson ID: <span class="lesson-meta-id" style="font-family: monospace; font-weight: 600; color: var(--color-text);"><?php echo htmlspecialchars($lesson['citation']['lessonId']); ?></span></div>
                    <?php endif; ?>
                    <a href="<?php echo htmlspecialchars($barBackUrl); ?>" class="lesson-btn-back" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 700; color: var(--color-primary); text-decoration: none; padding: 0.4rem 0.8rem; border-radius: 6px; border: 1px solid color-mix(in srgb, var(--color-primary) 30%, transparent);">
                        <i class="fas fa-arrow-left lesson-btn-icon" aria-hidden="true"></i> BACK TO <?php echo htmlspecialchars(strtoupper($levelDisplay ?? 'LEVEL ' . ($rawLevel ?? 'K'))); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($lesson['scripts'])): ?>
            <script>
                <?php echo $lesson['scripts']; ?>
            </script>
        <?php endif; ?>
    </div>
</main>

<?php
$levelId = $lesson['levelId'] ?? ($rawLevel === 'ged' ? 'practice-ged' : ($rawLevel ?? 'k'));
$levelUrl = !empty($levelUrl) ? $levelUrl : (($rawLevel === 'ged') ? '/levels/practice-ged.php' : ('/levels/' . ($rawLevel ?? 'k') . '.php'));
$lessonCode = $lesson['code'] ?? ($codeStr ?? strtoupper(str_replace('-', '.', $lessonId)));
$lessonTitle = $meta['title'] ?? 'Curriculum Lesson';
$defaultStandard = ($rawLevel === 'ged') ? ('GED.' . strtoupper($parts[1] ?? 'M') . '.' . ($parts[2] ?? '1') . '.' . ($parts[3] ?? '1')) : ('CCSS.' . strtoupper($rawSubj ?? 'MATH') . '.' . strtoupper($rawLevel ?? 'K') . '.' . strtoupper($rawMod ?? 'M1'));
$lessonStandard = $lesson['standard'] ?? $defaultStandard;
$practiceQuestions = $exitQuestions;
include ABSPATH . 'src/lesson_runner.php';
?>

<?php include ABSPATH . 'src/footer.php'; ?>
