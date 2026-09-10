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
