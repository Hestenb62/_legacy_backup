<?php
/**
 * Hesten's Learning - Universal Lesson Renderer
 * Dynamically renders lessons based on JSON definitions.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// 1. Load Lesson Data
$lessonsData = json_decode(file_get_contents(ABSPATH . 'assets/data/lessons.json'), true);
$lessonId = $_GET['id'] ?? '';

if (!isset($lessonsData['lessons'][$lessonId])) {
    http_response_code(404);
    include ABSPATH . 'src/header.php';
    echo "<main class='container'><div class='error-card'><h1>Lesson Not Found</h1><p>The requested lesson could not be located.</p></div></main>";
    include ABSPATH . 'src/footer.php';
    exit;
}

$lesson = $lessonsData['lessons'][$lessonId];
$meta = $lesson['meta'];

// Set Page Meta
$pageTitle = $meta['title'] . " | Hesten's Learning";
$pageDescription = $meta['description'];

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/lesson.css">

<main class="lesson-container">
    <div class="lesson-card">
        <!-- Header -->
        <div class="lesson-header">
            <span class="lesson-badge">
                <i class="fas <?php echo $meta['badgeIcon']; ?> lesson-badge-icon"></i> <?php echo $meta['badge']; ?>
            </span>
            <h1 class="lesson-title"><?php echo $meta['title']; ?></h1>
            <p class="lesson-desc"><?php echo $meta['description']; ?></p>
        </div>

        <!-- Overview -->
        <section class="lesson-overview-section">
            <div class="lesson-overview-header">
                <h2 class="lesson-overview-title"><?php echo $lesson['overview']['title']; ?></h2>
                <span class="lesson-overview-pill"><?php echo $lesson['overview']['pill']; ?></span>
            </div>
            <p class="lesson-overview-text"><?php echo $lesson['overview']['text']; ?></p>
            <div class="lesson-overview-grid">
                <div class="lesson-student-outcomes">
                    <h3 class="lesson-outcomes-title">Core Student Outcomes</h3>
                    <ul class="lesson-outcomes-list">
                        <?php foreach ($lesson['overview']['outcomes'] as $outcome): ?>
                            <li><?php echo $outcome; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="lesson-teacher-insights lesson-teacher-only">
                    <h4 class="lesson-insights-title">Teacher Insight</h4>
                    <p class="lesson-insights-text"><?php echo $lesson['overview']['teacherInsight']; ?></p>
                </div>
            </div>
        </section>

        <!-- Dynamic Content -->
        <?php foreach ($lesson['content'] as $block): ?>
            <?php 
                $type = $block['type'];
                // Components are stored in src/components/
                $componentPath = ABSPATH . "src/components/{$type}.php";
                if (file_exists($componentPath)) {
                    // Pass block data to the component
                    $blockData = $block; 
                    include $componentPath;
                } else {
                    echo "<div class='error-block'>Component {$type} not found.</div>";
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
                    <?php foreach ($lesson['vocabulary'] as $index => $vocab): ?>
                        <div onclick="toggleVocabCard('vocab-<?php echo $index; ?>')" class="lesson-vocab-card">
                            <div class="lesson-vocab-header">
                                <h4 class="lesson-vocab-title"><?php echo $vocab['term']; ?></h4>
                                <span class="lesson-vocab-icon" id="vocab-<?php echo $index; ?>-icon"><i class="fas fa-chevron-down"></i></span>
                            </div>
                            <div id="vocab-<?php echo $index; ?>-body" class="lesson-vocab-body">
                                <p class="lesson-vocab-text"><?php echo $vocab['definition']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include ABSPATH . 'src/footer.php'; ?>
