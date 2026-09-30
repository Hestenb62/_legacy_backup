<?php
/**
 * pages/math-vocab.php - Universal Mathematics Codex & Vocabulary Review Hub
 * Unified repository of all mathematical terminology, formal definitions,
 * symbolic notations, interactive formula sandboxes, step-by-step procedures,
 * and worked exemplars across the curriculum.
 */

$pageTitle = "Mathematics Codex & Vocabulary Review Hub | Hesten's Learning";
$pageDescription = "Universal mathematics codex, glossary, and review hub with interactive formula sandbox, 3D active recall flashcards, step-by-step procedures, and direct lesson links across all grades.";
$pageKeywords = "math vocabulary, mathematics codex, math terms, algebra definitions, math flashcards, eureka math vocabulary, common core math glossary, formula solver";
$requiresMathJax = true;

include __DIR__ . '/../src/header.php';

// Path to compiled unified vocabulary dataset
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
            <i class="fas fa-brain" aria-hidden="true"></i> Universal Mathematics Codex &amp; Active Review
        </span>
        <h1 class="math-vocab-title">
            Mathematics Codex &amp; Vocabulary Hub
        </h1>
        <p class="math-vocab-desc">
            An all-in-one concordance of mathematics. Explore formal definitions, conceptual mechanisms, worked step-by-step procedures, and lesson vocabulary—with interactive formula solvers, 3D active recall flashcards, and audio speech pronunciation.
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
                    placeholder="Search vocabulary terms, definitions, formulas, or standards (e.g. 'Pythagorean', 'quadratic', 'slope', 'HSA-CED')..."
                    aria-label="Search mathematics vocabulary index" autocomplete="off" spellcheck="false">
                <button type="button" id="math-vocab-clear-search" class="math-vocab-clear-btn"
                    aria-label="Clear search input">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Interactive Formula Sandbox & Step-by-Step Solver -->
        <div class="math-sandbox-container" id="math-formula-sandbox" style="margin-top: 1.75rem; max-width: 960px; margin-left: auto; margin-right: auto; text-align: left;">
            <div style="background: var(--color-content-bg, #ffffff); border: 1px solid var(--color-border); border-radius: 1.25rem; padding: 1.5rem; box-shadow: 0 8px 24px rgba(0,0,0,0.06);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 2.25rem; height: 2.25rem; border-radius: 0.5rem; background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                            <i class="fas fa-calculator" aria-hidden="true"></i>
                        </span>
                        <div>
                            <h2 style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-default); margin: 0;">Interactive Formula Sandbox &amp; Solver</h2>
                            <p style="font-size: 0.8rem; color: var(--color-text-secondary); margin: 0;">Substitute variables to generate step-by-step mathematical proofs.</p>
                        </div>
                    </div>
                    <button type="button" id="sandbox-toggle-btn" class="math-vocab-pill active" style="font-size: 0.8rem; padding: 0.35rem 0.85rem;">
                        <i class="fas fa-sliders-h" aria-hidden="true"></i> <span id="sandbox-toggle-label">Hide Sandbox</span>
                    </button>
                </div>

                <div id="sandbox-body">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
                        <div>
                            <label for="sandbox-formula-select" style="display: block; font-size: 0.825rem; font-weight: 700; color: var(--color-text-default); margin-bottom: 0.35rem;">
                                Select Canonical Formula:
                            </label>
                            <select id="sandbox-formula-select" class="math-vocab-search-input" style="width: 100%; height: 42px; border-radius: 0.5rem; padding: 0.4rem 0.75rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-default); border: 1px solid var(--color-border);" aria-label="Select formula to evaluate">
                                <option value="pythagorean" selected>Pythagorean Theorem (c = √(a² + b²))</option>
                                <option value="quadratic">Quadratic Formula (ax² + bx + c = 0)</option>
                                <option value="slope">Slope of a Line (m = (y₂ - y₁) / (x₂ - x₁))</option>
                                <option value="distance">Distance Formula (d = √((x₂ - x₁)² + (y₂ - y₁)²))</option>
                                <option value="circle">Circle Area &amp; Circumference (A = πr², C = 2πr)</option>
                                <option value="interest">Compound Interest (A = P(1 + r/n)^(nt))</option>
                            </select>
                        </div>
                        <div id="sandbox-inputs-container" style="display: flex; gap: 0.75rem; align-items: flex-end; flex-wrap: wrap;">
                            <!-- Populated dynamically based on formula -->
                        </div>
                    </div>

                    <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1.25rem; flex-wrap: wrap;">
                        <button type="button" id="sandbox-solve-btn" class="fc-btn fc-btn-primary" style="padding: 0.65rem 1.5rem; font-weight: 800; font-size: 0.9rem;">
                            <i class="fas fa-play" aria-hidden="true"></i> Evaluate Step-by-Step
                        </button>
                        <button type="button" id="sandbox-random-btn" class="fc-btn" style="padding: 0.65rem 1.25rem; font-weight: 700; font-size: 0.9rem;">
                            <i class="fas fa-dice" aria-hidden="true"></i> Example Values
                        </button>
                    </div>

                    <div id="sandbox-result-card" style="background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: 0.75rem; padding: 1.25rem; border-left: 4px solid var(--color-primary);">
                        <div id="sandbox-result-content">
                            <!-- Populated dynamically by JS with MathJax rendered math -->
                        </div>
                    </div>
                </div>
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

        <!-- Grade Band Filter Row -->
        <div class="math-vocab-filter-row">
            <span class="math-vocab-filter-label"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Grade Band:</span>
            <div class="math-vocab-pills-wrap" role="tablist" aria-label="Filter by Grade Band">
                <button type="button" class="math-vocab-pill math-vocab-grade-pill active" data-grade="all" role="tab" aria-selected="true">
                    All Grades <span class="math-vocab-pill-count"><?= count($vocabTerms) ?></span>
                </button>
                <button type="button" class="math-vocab-pill math-vocab-grade-pill" data-grade="elem" role="tab" aria-selected="false">
                    Elementary (K–5)
                </button>
                <button type="button" class="math-vocab-pill math-vocab-grade-pill" data-grade="mid" role="tab" aria-selected="false">
                    Middle School (6–8)
                </button>
                <button type="button" class="math-vocab-pill math-vocab-grade-pill" data-grade="high" role="tab" aria-selected="false">
                    High School (9–12)
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
                    <option value="all" selected>All Curriculum Modules &amp; Reference Volumes</option>
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
            Showing <strong id="vocab-visible-count"><?= count($vocabTerms) ?></strong> of <span id="vocab-total-count"><?= count($vocabTerms) ?></span> indexed mathematical concepts &amp; vocabulary terms
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
                        <?php
                            $gradesList = $term['grades'] ?? [];
                            $gradeStr = implode(' ', $gradesList);
                            $rawFormula = $term['rawFormula'] ?? $term['example'] ?? '';
                        ?>
                        <article class="math-term-card" data-term-id="<?= htmlspecialchars($term['id']) ?>"
                            data-category="<?= htmlspecialchars($term['category'] ?? '') ?>"
                            data-grades="<?= htmlspecialchars($gradeStr) ?>"
                            data-letter="<?= $letter ?>">

                            <!-- Header -->
                            <div>
                                <div class="math-term-card-header">
                                    <div>
                                        <h3 class="math-term-card-title"><?= htmlspecialchars($term['term']) ?></h3>
                                        <?php if (!empty($term['etymology'])): ?>
                                            <span style="font-size: 0.775rem; color: var(--color-text-muted); font-style: italic; display: block; margin-top: 0.2rem;">
                                                <?= htmlspecialchars($term['etymology']) ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="math-term-actions-group">
                                        <button type="button" class="math-card-btn vocab-btn-speak"
                                            title="Listen to pronunciation and definition"
                                            aria-label="Listen to <?= htmlspecialchars($term['term']) ?>">
                                            <i class="fas fa-volume-up" aria-hidden="true"></i>
                                        </button>
                                        <?php if (!empty($rawFormula)): ?>
                                            <button type="button" class="math-card-btn vocab-btn-copy"
                                                data-formula="<?= htmlspecialchars($rawFormula) ?>"
                                                title="Copy formula to clipboard"
                                                aria-label="Copy formula for <?= htmlspecialchars($term['term']) ?>">
                                                <i class="far fa-copy" aria-hidden="true"></i>
                                            </button>
                                        <?php endif; ?>
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

                                <!-- Definition Box -->
                                <div class="math-idx-def-box">
                                    <div class="math-idx-box-label">
                                        <i class="fas fa-book-open" aria-hidden="true"></i> Formal Definition &amp; Axiom
                                    </div>
                                    <p class="math-idx-def-text">
                                        <?= $term['definition'] ?>
                                    </p>
                                    <?php if (!empty($term['example'])): ?>
                                        <div class="math-term-formula" title="Mathematical Exemplar / Formula">
                                            <div style="font-size: 0.725rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); margin-bottom: 0.25rem;">
                                                <i class="fas fa-square-root-variable" aria-hidden="true"></i> Exemplar / Formula
                                            </div>
                                            <div><?= $term['example'] ?></div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- What It Does & How To Do It (if present) -->
                                <?php if (!empty($term['whatItDoes']) || !empty($term['howToDoIt'])): ?>
                                    <div class="math-lexicon-body-grid">
                                        <?php if (!empty($term['whatItDoes'])): ?>
                                            <div class="math-idx-does-box">
                                                <div class="math-idx-box-label"><i class="fas fa-lightbulb" aria-hidden="true"></i> What It Does</div>
                                                <p class="math-idx-does-text"><?= htmlspecialchars($term['whatItDoes']) ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($term['howToDoIt'])): ?>
                                            <div class="math-idx-howto-box">
                                                <div class="math-idx-box-label"><i class="fas fa-list-ol" aria-hidden="true"></i> How To Do It</div>
                                                <ul class="math-idx-steps-list">
                                                    <?php foreach ($term['howToDoIt'] as $sIdx => $step): ?>
                                                        <li class="math-idx-step-item">
                                                            <span class="math-idx-step-num"><?= $sIdx + 1 ?></span>
                                                            <span><?= htmlspecialchars($step) ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Worked Exemplum (if present) -->
                                <?php if (!empty($term['exampleProblem']) || !empty($term['exampleSolution'])): ?>
                                    <div class="math-idx-example-box">
                                        <div class="math-idx-box-label"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> Worked Exemplum</div>
                                        <?php if (!empty($term['exampleProblem'])): ?>
                                            <p class="math-idx-problem"><strong>Problem:</strong> <?= htmlspecialchars($term['exampleProblem']) ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($term['exampleSolution'])): ?>
                                            <p class="math-idx-solution"><strong>Solution:</strong> <?= htmlspecialchars($term['exampleSolution']) ?></p>
                                        <?php endif; ?>
                                        <div class="math-idx-qed">Q.E.D. &#x220E;</div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Originating Lesson Backlinks & References -->
                            <div class="math-term-footer">
                                <?php if (!empty($term['lessons'])): ?>
                                    <span class="math-term-lessons-label">Curriculum Lessons &amp; Volumes:</span>
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
