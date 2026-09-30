<?php
/**
 * pages/math-vocab.php - Mathematics Vocabulary Codex & Active Recall Review
 * Centralized repository of all mathematical terminology, formal definitions,
 * symbolic notations, and examples from across the math curriculum.
 */

$pageTitle = "Mathematics Vocabulary Codex & Study Review | Hesten's Learning";
$pageDescription = "Complete repository of mathematical vocabulary, definitions, formulas, and concepts from all Hesten's Learning math lessons with interactive flashcards and study review tools.";
$pageKeywords = "math vocabulary, math terms, algebra definitions, math flashcards, eureka math vocabulary, common core math glossary";
$requiresMathJax = true;

include __DIR__ . '/../src/header.php';

// Path to compiled vocabulary dataset
$vocabJsonPath = __DIR__ . '/../assets/data/math-vocab.json';
$vocabData = [];
$vocabTerms = [];

if (is_file($vocabJsonPath)) {
    $vocabData = json_decode(file_get_contents($vocabJsonPath), true) ?: [];
    $vocabTerms = $vocabData['terms'] ?? [];
}

// Fallback compilation if JSON file is missing
if (empty($vocabTerms)) {
    $allLessonsFile = __DIR__ . '/../assets/data/lessons.json';
    $lessonsDict = [];
    if (is_file($allLessonsFile)) {
        $rawLessons = json_decode(file_get_contents($allLessonsFile), true);
        $lessonsDict = $rawLessons['lessons'] ?? [];
    }
    foreach (glob(__DIR__ . '/../assets/data/lessons/*.json') as $lf) {
        $lid = basename($lf, '.json');
        $ld = json_decode(file_get_contents($lf), true);
        if ($ld) {
            $lessonsDict[$lid] = $ld;
        }
    }

    $vocabMap = [];
    foreach ($lessonsDict as $lid => $ldata) {
        if (!str_contains($lid, 'math') && !str_contains(strtolower($ldata['subject'] ?? ''), 'math')) {
            continue;
        }
        $title = $ldata['meta']['title'] ?? $lid;
        $vocabs = $ldata['vocabulary'] ?? [];
        foreach ($vocabs as $v) {
            $t = trim($v['term'] ?? $v['word'] ?? '');
            $d = trim($v['definition'] ?? $v['def'] ?? '');
            if (!$t || !$d) continue;
            $k = strtolower(preg_replace('/[\$\{\}\\\^_\*]/', '', $t));
            if (!isset($vocabMap[$k])) {
                $vocabMap[$k] = [
                    'id' => preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($k)),
                    'term' => $t,
                    'definition' => $d,
                    'example' => $v['example'] ?? $v['formula'] ?? '',
                    'category' => 'Algebraic Foundations',
                    'modules' => ['Module 1: High School Mathematics'],
                    'grades' => ['Grade 9'],
                    'lessons' => [['id' => $lid, 'title' => $title, 'url' => "/levels/k.php?$lid"]],
                    'standards' => $ldata['standards'] ?? []
                ];
            } else {
                $vocabMap[$k]['lessons'][] = ['id' => $lid, 'title' => $title, 'url' => "/levels/k.php?$lid"];
            }
        }
    }
    $vocabTerms = array_values($vocabMap);
}

// Sort alphabetically by Term Name (ignoring LaTeX symbols)
usort($vocabTerms, function ($a, $b) {
    $cleanA = preg_replace('/[^a-zA-Z0-9]/', '', $a['term']);
    $cleanB = preg_replace('/[^a-zA-Z0-9]/', '', $b['term']);
    return strcasecmp($cleanA, $cleanB);
});

// Group terms alphabetically by first letter
$groupedTerms = [];
$categories = [];
$modulesList = [];

foreach ($vocabTerms as $term) {
    $cleanFirst = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $term['term']), 0, 1));
    if (!$cleanFirst) {
        $cleanFirst = '#';
    }
    if (!isset($groupedTerms[$cleanFirst])) {
        $groupedTerms[$cleanFirst] = [];
    }
    $groupedTerms[$cleanFirst][] = $term;

    if (!empty($term['category'])) {
        $categories[$term['category']] = ($categories[$term['category']] ?? 0) + 1;
    }
    if (!empty($term['modules'])) {
        foreach ($term['modules'] as $mod) {
            $modulesList[$mod] = ($modulesList[$mod] ?? 0) + 1;
        }
    }
}
ksort($groupedTerms);
arsort($categories);
arsort($modulesList);

// Alphabet for ribbon
$alphabet = range('A', 'Z');
?>

<link rel="stylesheet"
    href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/math-vocab.css') : '/assets/css/pages/math-vocab.css' ?>">

<main id="main-content" class="math-vocab-page">

    <!-- Page Hero Banner -->
    <header class="math-vocab-hero">
        <span class="math-vocab-badge">
            <i class="fas fa-brain" aria-hidden="true"></i> Curriculum Vocabulary &amp; Active Recall Review
        </span>
        <h1 class="math-vocab-title">
            Mathematics Vocabulary Codex
        </h1>
        <p class="math-vocab-desc">
            Master the formal language of mathematics. Review every mathematical term, theorem, formula, and conceptual mechanism defined across all math lessons—with interactive flashcards, audio pronunciation, and direct links to curriculum lessons.
        </p>

        <!-- View Mode Switcher -->
        <div class="math-vocab-mode-switcher" role="tablist" aria-label="Review Mode Selection">
            <button type="button" class="math-vocab-mode-tab active" data-mode="codex" role="tab" aria-selected="true" id="tab-codex">
                <i class="fas fa-th-large" aria-hidden="true"></i> Codex Grid View
            </button>
            <button type="button" class="math-vocab-mode-tab" data-mode="flashcard" role="tab" aria-selected="false" id="tab-flashcard">
                <i class="fas fa-layer-group" aria-hidden="true"></i> Active Recall Flashcards
            </button>
        </div>

        <!-- Live Instant Search Bar -->
        <div class="math-vocab-search-wrap">
            <div class="math-vocab-search-bar" role="search">
                <i class="fas fa-search math-vocab-search-icon" aria-hidden="true"></i>
                <input type="text" id="math-vocab-search-input" class="math-vocab-search-input"
                    placeholder="Search vocabulary terms, definitions, formulas, or standards (e.g. 'piecewise', 'quadratic', 'HSA-CED')..."
                    aria-label="Search mathematics vocabulary index" autocomplete="off" spellcheck="false">
                <button type="button" id="math-vocab-clear-search" class="math-vocab-clear-btn"
                    aria-label="Clear search input">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Interactive 3D Flashcard Studio (Toggled via Mode Switcher) -->
    <section class="math-flashcard-stage" id="math-flashcard-stage" style="display: none;" aria-label="Flashcard Study Review Studio">
        <div class="math-flashcard-wrapper" id="math-flashcard-wrapper">
            <div class="math-flashcard" id="math-flashcard" tabindex="0" role="button" aria-label="Flashcard. Press spacebar or click to flip.">
                <!-- Front Face -->
                <div class="math-flashcard-front" id="fc-front-body">
                    <!-- Populated by JavaScript -->
                </div>
                <!-- Back Face -->
                <div class="math-flashcard-back" id="fc-back-body">
                    <!-- Populated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Flashcard Progress Bar -->
        <div class="fc-progress-wrap">
            <div class="fc-progress-text">
                Card <span id="fc-current-idx">1</span> of <span id="fc-total-count"><?= count($vocabTerms) ?></span>
            </div>
            <div class="fc-progress-track">
                <div class="fc-progress-fill" id="fc-progress-fill" style="width: <?= count($vocabTerms) > 0 ? round(100 / count($vocabTerms)) : 0 ?>%;"></div>
            </div>
        </div>

        <!-- Flashcard Controls Toolbar -->
        <div class="fc-controls-bar">
            <button type="button" class="fc-btn" id="fc-prev-btn" aria-label="Previous Flashcard">
                <i class="fas fa-chevron-left" aria-hidden="true"></i> Previous
            </button>
            <button type="button" class="fc-btn fc-btn-primary" id="fc-flip-btn" aria-label="Flip Flashcard (Spacebar)">
                <i class="fas fa-sync-alt" aria-hidden="true"></i> Flip Card (Space)
            </button>
            <button type="button" class="fc-btn" id="fc-next-btn" aria-label="Next Flashcard">
                Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="fc-btn" id="fc-shuffle-btn" title="Randomize card order">
                <i class="fas fa-random" aria-hidden="true"></i> Shuffle
            </button>
        </div>
    </section>

    <!-- Sticky A–Z Quick-Jump Ribbon -->
    <nav class="math-vocab-az-ribbon-container" id="math-vocab-az-ribbon" aria-label="A to Z Alphabetical Jump Navigation">
        <div class="math-vocab-az-ribbon">
            <?php foreach ($alphabet as $letter): ?>
                <?php $hasTerms = isset($groupedTerms[$letter]); ?>
                <?php if ($hasTerms): ?>
                    <a href="#letter-<?= $letter ?>" class="math-vocab-az-btn" data-letter="<?= $letter ?>"
                        title="Jump to Letter <?= $letter ?> (<?= count($groupedTerms[$letter]) ?> terms)">
                        <?= $letter ?>
                    </a>
                <?php else: ?>
                    <span class="math-vocab-az-btn disabled" data-letter="<?= $letter ?>" aria-disabled="true"
                        title="No terms starting with <?= $letter ?>">
                        <?= $letter ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Filter Control Panel -->
    <section class="math-vocab-filter-panel" aria-label="Curriculum Filter Controls">
        <!-- Review Queue Filter Row -->
        <div class="math-vocab-filter-row">
            <span class="math-vocab-filter-label"><i class="fas fa-bookmark" aria-hidden="true"></i> Review Queue:</span>
            <div class="math-vocab-pills-wrap" role="tablist" aria-label="Filter by Mastery Status">
                <button type="button" class="math-vocab-pill math-vocab-queue-pill active" data-queue="all" role="tab" aria-selected="true">
                    All Words <span class="math-vocab-pill-count" id="queue-count-all"><?= count($vocabTerms) ?></span>
                </button>
                <button type="button" class="math-vocab-pill math-vocab-queue-pill" data-queue="starred" role="tab" aria-selected="false">
                    <i class="fas fa-star" style="color: #f59e0b;" aria-hidden="true"></i> Starred for Review <span class="math-vocab-pill-count" id="queue-count-starred">0</span>
                </button>
                <button type="button" class="math-vocab-pill math-vocab-queue-pill" data-queue="learning" role="tab" aria-selected="false">
                    <i class="fas fa-clock" style="color: #ef4444;" aria-hidden="true"></i> Still Learning <span class="math-vocab-pill-count" id="queue-count-learning">0</span>
                </button>
                <button type="button" class="math-vocab-pill math-vocab-queue-pill" data-queue="mastered" role="tab" aria-selected="false">
                    <i class="fas fa-check-circle" style="color: #10b981;" aria-hidden="true"></i> Mastered <span class="math-vocab-pill-count" id="queue-count-mastered">0</span>
                </button>
            </div>
        </div>

        <!-- Curriculum Domain Filter Row -->
        <div class="math-vocab-filter-row">
            <span class="math-vocab-filter-label"><i class="fas fa-shapes" aria-hidden="true"></i> Domain:</span>
            <div class="math-vocab-pills-wrap" role="tablist" aria-label="Filter by Mathematical Domain">
                <button type="button" class="math-vocab-pill math-vocab-cat-pill active" data-category="all" role="tab" aria-selected="true">
                    All Domains
                </button>
                <?php foreach ($categories as $catName => $catCount): ?>
                    <button type="button" class="math-vocab-pill math-vocab-cat-pill" data-category="<?= htmlspecialchars($catName) ?>" role="tab" aria-selected="false">
                        <?= htmlspecialchars($catName) ?> <span class="math-vocab-pill-count"><?= $catCount ?></span>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Module Selection Row -->
        <?php if (!empty($modulesList)): ?>
        <div class="math-vocab-filter-row">
            <span class="math-vocab-filter-label"><i class="fas fa-cubes" aria-hidden="true"></i> Lesson Module:</span>
            <div style="flex: 1; max-width: 32rem;">
                <select id="math-vocab-module-select" class="math-vocab-search-input" style="width: 100%; height: 38px; border-radius: 0.5rem; padding: 0.35rem 0.75rem; font-size: 0.85rem; background: var(--color-bg-base); color: var(--color-text-default); border: 1px solid var(--color-border);" aria-label="Filter by Curriculum Module">
                    <option value="all" selected>All Curriculum Modules (All Grades)</option>
                    <?php foreach ($modulesList as $modName => $modCount): ?>
                        <option value="<?= htmlspecialchars($modName) ?>">
                            <?= htmlspecialchars($modName) ?> (<?= $modCount ?> terms)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <!-- Status & Action Bar -->
    <div class="math-vocab-status-bar">
        <div class="math-vocab-match-count" aria-live="polite">
            Showing <strong id="vocab-visible-count"><?= count($vocabTerms) ?></strong> of <span id="vocab-total-count"><?= count($vocabTerms) ?></span> indexed mathematical vocabulary terms
        </div>
        <div class="math-vocab-actions-wrap">
            <button type="button" id="math-vocab-export-btn" class="math-vocab-tool-btn" title="Export currently filtered terms as a study guide text file">
                <i class="fas fa-file-export" aria-hidden="true"></i> Export Study Guide
            </button>
            <button type="button" id="math-vocab-print-btn" class="math-vocab-tool-btn" title="Print this complete mathematical vocabulary glossary">
                <i class="fas fa-print" aria-hidden="true"></i> Print Glossary
            </button>
        </div>
    </div>

    <!-- Alphabetical A-Z Sections Container -->
    <div id="math-vocab-az-container">
        <?php foreach ($groupedTerms as $letter => $terms): ?>
            <section class="math-vocab-section" id="letter-<?= $letter ?>" data-letter="<?= $letter ?>">
                <!-- Section Header -->
                <div class="math-vocab-letter-header">
                    <div class="math-vocab-letter-badge"><?= $letter ?></div>
                    <h2 class="math-vocab-letter-title"><?= $letter ?> — Concepts &amp; Terminology</h2>
                    <span class="math-vocab-letter-count"><?= count($terms) ?> <?= count($terms) === 1 ? 'term' : 'terms' ?></span>
                </div>

                <!-- Terms Grid -->
                <div class="math-vocab-grid">
                    <?php foreach ($terms as $term): ?>
                        <article class="math-term-card" data-term-id="<?= htmlspecialchars($term['id']) ?>"
                            data-category="<?= htmlspecialchars($term['category'] ?? '') ?>"
                            data-letter="<?= $letter ?>">

                            <!-- Header -->
                            <div>
                                <div class="math-term-card-header">
                                    <h3 class="math-term-card-title"><?= htmlspecialchars($term['term']) ?></h3>
                                    <div class="math-term-actions-group">
                                        <button type="button" class="math-card-btn vocab-btn-speak"
                                            title="Listen to pronunciation and definition"
                                            aria-label="Listen to <?= htmlspecialchars($term['term']) ?>">
                                            <i class="fas fa-volume-up" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="math-card-btn vocab-btn-star"
                                            data-id="<?= htmlspecialchars($term['id']) ?>"
                                            title="Star for Later Review"
                                            aria-label="Star <?= htmlspecialchars($term['term']) ?>">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="math-card-btn vocab-btn-mastered"
                                            data-id="<?= htmlspecialchars($term['id']) ?>"
                                            title="Mark as Mastered"
                                            aria-label="Mark <?= htmlspecialchars($term['term']) ?> as mastered">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Badges -->
                                <div class="math-term-badges">
                                    <?php if (!empty($term['category'])): ?>
                                        <span class="math-badge-category"><?= htmlspecialchars($term['category']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($term['grades'])): ?>
                                        <span class="math-badge-grade"><?= htmlspecialchars(implode(', ', $term['grades'])) ?></span>
                                    <?php endif; ?>
                                </div>

                                <!-- Definition -->
                                <div class="math-term-definition">
                                    <?= htmlspecialchars($term['definition']) ?>
                                </div>

                                <!-- Exemplar / Formula -->
                                <?php if (!empty($term['example'])): ?>
                                    <div class="math-term-formula" title="Mathematical Exemplar / Formula">
                                        <div style="font-size: 0.725rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); margin-bottom: 0.25rem;">
                                            <i class="fas fa-square-root-variable" aria-hidden="true"></i> Exemplar / Formula
                                        </div>
                                        <div><?= $term['example'] ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Originating Lesson Backlinks -->
                            <div class="math-term-footer">
                                <?php if (!empty($term['lessons'])): ?>
                                    <span class="math-term-lessons-label">Curriculum Lessons:</span>
                                    <div class="math-term-lessons-list">
                                        <?php foreach ($term['lessons'] as $lesson): ?>
                                            <a href="<?= htmlspecialchars($lesson['url']) ?>" class="math-lesson-chip"
                                                title="Open lesson: <?= htmlspecialchars($lesson['title']) ?>">
                                                <i class="fas fa-book-open" aria-hidden="true"></i> <?= htmlspecialchars($lesson['title']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</main>

<!-- Embed Vocabulary Dataset for Client-Side Filtering & Flashcards -->
<script>
    window.__MATH_VOCAB_DATA__ = <?= json_encode($vocabTerms, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
</script>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/math-vocab.js') : '/assets/js/pages/math-vocab.js' ?>" defer></script>

<?php include __DIR__ . '/../src/footer.php'; ?>
