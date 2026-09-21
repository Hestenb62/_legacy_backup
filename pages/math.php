<?php
/**
 * pages/math.php - Universal Mathematics Codex & Index
 * Repository-style mathematical lexicon organized strictly in A-Z alphabetical order,
 * providing comprehensive definitions, conceptual mechanisms ('what it does'),
 * step-by-step procedures ('how to do it'), and worked exemplars across all 12 grades.
 */

$pageTitle = "Universal Mathematics Codex & Index (A–Z) | Hesten's Learning";
$pageDescription = "A-Z mathematical index and repository covering core definitions, conceptual intuition, step-by-step procedures, and worked examples across all 12 grades.";
$pageKeywords = "math index, math dictionary, math definitions, common core math, worked math examples, a-z math, calculus, algebra, geometry";
$requiresMathJax = true;

include '../src/header.php';

// Load Mathematical Terms from JSON Dataset
$jsonPath = __DIR__ . '/../assets/data/math-php.json';
$mathTerms = [];
if (is_file($jsonPath)) {
    $mathTerms = json_decode(file_get_contents($jsonPath), true) ?: [];
}

// Sort terms strictly in A-Z alphabetical order by Name
usort($mathTerms, function ($a, $b) {
    return strcasecmp($a['name'], $b['name']);
});

// Group terms alphabetically by first letter
$groupedTerms = [];
foreach ($mathTerms as $term) {
    $firstChar = strtoupper(substr(trim($term['name']), 0, 1));
    if (!isset($groupedTerms[$firstChar])) {
        $groupedTerms[$firstChar] = [];
    }
    $groupedTerms[$firstChar][] = $term;
}
ksort($groupedTerms);

// Full alphabet for the ribbon
$alphabet = range('A', 'Z');
?>

<link rel="stylesheet"
    href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/math.css') : '/assets/css/pages/math.css' ?>">

<main id="main-content" class="math-index-page">

    <!-- Page Hero Section -->
    <header class="math-index-hero">
        <span class="math-index-hero-badge">
            <i class="fas fa-sort-alpha-down"></i> A–Z Mathematics Codex & Repository
        </span>
        <h1 class="math-index-hero-title">
            The A–Z Mathematics Index
        </h1>
        <p class="math-index-hero-desc">
            An alphabetical concordance cataloging mathematical definitions, conceptual intuition ("what it does"),
            step-by-step procedures ("how to do it"), and worked step-by-step exemplars across all 12 grades.
        </p>

        <!-- Live Instant Search Bar -->
        <div class="math-index-search-wrap">
            <div class="math-index-search-bar" role="search">
                <i class="fas fa-search math-index-search-icon" aria-hidden="true"></i>
                <input type="text" id="math-search-input" class="math-index-search-input"
                    placeholder="Search terms, formulas, axioms, grades (e.g. 'Pythagorean', 'Fraction', 'Grade 8')..."
                    aria-label="Search A-Z mathematical index" autocomplete="off" spellcheck="false">
                <button type="button" id="math-clear-search" class="math-index-clear-btn"
                    aria-label="Clear search input">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Interactive Formula Sandbox & Step-by-Step Solver -->
        <div class="math-sandbox-container" id="math-formula-sandbox" style="margin-top: 1.5rem; max-width: 960px; margin-left: auto; margin-right: auto; text-align: left;">
            <div class="glass-card" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl, 1rem); padding: 1.5rem; box-shadow: var(--shadow-md);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 2.25rem; height: 2.25rem; border-radius: var(--radius-md); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                            <i class="fas fa-calculator"></i>
                        </span>
                        <div>
                            <h2 style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin: 0;">Interactive Formula Sandbox &amp; Solver</h2>
                            <p style="font-size: 0.8rem; color: var(--color-text-muted); margin: 0;">Substitute variables to generate step-by-step mathematical proofs.</p>
                        </div>
                    </div>
                    <button type="button" id="sandbox-toggle-btn" class="math-pill-btn active" style="font-size: 0.8rem; padding: 0.35rem 0.85rem;">
                        <i class="fas fa-sliders-h"></i> <span id="sandbox-toggle-label">Hide Sandbox</span>
                    </button>
                </div>

                <div id="sandbox-body">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
                        <div>
                            <label for="sandbox-formula-select" style="display: block; font-size: 0.825rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 0.35rem;">
                                Select Canonical Formula:
                            </label>
                            <select id="sandbox-formula-select" class="math-index-search-input" style="width: 100%; height: 42px; border-radius: var(--radius-md); padding: 0.4rem 0.75rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border);">
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
                        <button type="button" id="sandbox-solve-btn" class="hero-nav-btn hero-nav-btn-primary" style="padding: 0.65rem 1.5rem; border-radius: var(--radius-full); font-weight: 800; font-size: 0.9rem; cursor: pointer; border: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--color-primary); color: #fff; box-shadow: 0 4px 12px rgba(79,70,229,0.3);">
                            <i class="fas fa-play"></i> Evaluate Step-by-Step
                        </button>
                        <button type="button" id="sandbox-random-btn" class="hero-nav-btn hero-nav-btn-outline" style="padding: 0.65rem 1.25rem; border-radius: var(--radius-full); font-weight: 700; font-size: 0.9rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.4rem;">
                            <i class="fas fa-dice"></i> Example Values
                        </button>
                    </div>

                    <div id="sandbox-result-card" style="background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.25rem; border-left: 4px solid var(--color-primary);">
                        <div id="sandbox-result-content">
                            <!-- Populated dynamically by JS with MathJax rendered math -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sticky A–Z Quick-Jump Ribbon -->
    <nav class="math-az-ribbon-container" aria-label="A to Z Alphabetical Navigation">
        <div class="math-az-ribbon">
            <?php foreach ($alphabet as $letter): ?>
                <?php $hasTerms = isset($groupedTerms[$letter]); ?>
                <?php if ($hasTerms): ?>
                    <a href="#letter-<?= $letter ?>" class="math-az-letter-btn" data-az-letter="<?= $letter ?>"
                        title="Jump to Letter <?= $letter ?> (<?= count($groupedTerms[$letter]) ?> terms)">
                        <?= $letter ?>
                    </a>
                <?php else: ?>
                    <span class="math-az-letter-btn disabled" aria-disabled="true"
                        title="No terms starting with <?= $letter ?>">
                        <?= $letter ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Filter Control Panel -->
    <section class="math-filter-panel" aria-label="Curriculum Filter Controls">
        <!-- Grade Band Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-layer-group"></i> Grade Level:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Grade">
                <button type="button" class="math-pill-btn active" data-grade="all" role="tab" aria-selected="true">
                    All 12 Grades <span class="math-pill-count"><?= count($mathTerms) ?></span>
                </button>
                <button type="button" class="math-pill-btn" data-grade="elem" role="tab" aria-selected="false">
                    Elementary (K–5)
                </button>
                <button type="button" class="math-pill-btn" data-grade="mid" role="tab" aria-selected="false">
                    Middle School (6–8)
                </button>
                <button type="button" class="math-pill-btn" data-grade="high" role="tab" aria-selected="false">
                    High School (9–12)
                </button>
                <button type="button" class="math-pill-btn" id="math-fav-toggle" role="tab" aria-selected="false">
                    <i class="far fa-star"></i> My Study List <span class="math-pill-count" id="math-fav-count">0</span>
                </button>
            </div>
        </div>

        <!-- Grade Specific Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-graduation-cap"></i> Specific Grade:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Individual Grade">
                <?php for ($g = 1; $g <= 12; $g++): ?>
                    <button type="button" class="math-pill-btn" data-grade="grade-<?= $g ?>" role="tab"
                        aria-selected="false">
                        Grade <?= $g ?>
                    </button>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Mathematical Branch / Domain Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-shapes"></i> Domain:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Domain">
                <button type="button" class="math-pill-btn active" data-branch="all" role="tab" aria-selected="true">
                    All Domains
                </button>
                <button type="button" class="math-pill-btn" data-branch="arithmetic" role="tab" aria-selected="false">
                    Arithmetic
                </button>
                <button type="button" class="math-pill-btn" data-branch="fractions" role="tab" aria-selected="false">
                    Fractions & Rational
                </button>
                <button type="button" class="math-pill-btn" data-branch="algebra" role="tab" aria-selected="false">
                    Algebra
                </button>
                <button type="button" class="math-pill-btn" data-branch="geometry" role="tab" aria-selected="false">
                    Geometry
                </button>
                <button type="button" class="math-pill-btn" data-branch="trigonometry" role="tab" aria-selected="false">
                    Trigonometry
                </button>
                <button type="button" class="math-pill-btn" data-branch="calculus" role="tab" aria-selected="false">
                    Calculus
                </button>
            </div>
        </div>
    </section>

    <!-- Status & Action Bar -->
    <div class="math-status-bar">
        <div class="math-match-count" aria-live="polite">
            Showing <strong id="math-match-count-num"><?= count($mathTerms) ?></strong> of <span
                id="math-total-count-num"><?= count($mathTerms) ?></span> indexed mathematical concepts
        </div>
        <div class="math-view-toggle">
            <button type="button" id="math-export-btn" class="math-index-export-btn"
                title="Export currently filtered terms as a plain text study sheet">
                <i class="fas fa-download"></i> Export Study Sheet
            </button>
            <button type="button" id="math-print-btn" class="math-index-print-btn"
                title="Print this mathematical reference index">
                <i class="fas fa-print"></i> Print Index
            </button>
        </div>
    </div>

    <!-- Alphabetical A-Z Sections Container -->
    <div id="math-az-sections-container">
        <?php foreach ($groupedTerms as $letter => $terms): ?>
            <section class="math-az-letter-section" id="letter-<?= $letter ?>" data-letter="<?= $letter ?>">
                <!-- Section Header -->
                <div class="math-az-letter-header">
                    <div class="math-az-letter-badge"><?= $letter ?></div>
                    <h2 class="math-az-letter-title"><?= $letter ?> — Concepts</h2>
                    <span class="math-az-letter-count"><?= count($terms) ?>
                        <?= count($terms) === 1 ? 'term' : 'terms' ?></span>
                </div>

                <!-- Lexicon Entries List -->
                <div class="math-lexicon-list">
                    <?php foreach ($terms as $term): ?>
                        <article class="math-term-card math-lexicon-entry" data-term-id="<?= htmlspecialchars($term['id']) ?>"
                            data-grade="<?= htmlspecialchars((string) $term['grade']) ?>"
                            data-branch="<?= htmlspecialchars($term['branch']) ?>" data-letter="<?= $letter ?>"
                            data-keywords="<?= htmlspecialchars($term['keywords']) ?>">

                            <!-- Entry Header -->
                            <div class="math-term-card-header">
                                <div class="math-term-title-wrap">
                                    <h3 class="math-term-title">
                                        <?= htmlspecialchars($term['name']) ?>
                                    </h3>
                                    <span class="math-term-etymology"><?= htmlspecialchars($term['etymology']) ?></span>
                                    <div class="math-term-badges mt-2">
                                        <span class="math-badge-grade"><?= htmlspecialchars($term['gradeName']) ?></span>
                                        <span class="math-badge-branch"><?= htmlspecialchars($term['branchLabel']) ?></span>
                                    </div>
                                </div>

                                <!-- Action Tools -->
                                <div class="math-term-actions">
                                    <button type="button" class="math-action-btn math-btn-speak"
                                        title="Listen to pronunciation and definition"
                                        aria-label="Listen to <?= htmlspecialchars($term['name']) ?>">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                    <button type="button" class="math-action-btn math-btn-copy"
                                        data-formula="<?= htmlspecialchars($term['rawFormula']) ?>"
                                        title="Copy formula to clipboard"
                                        aria-label="Copy formula for <?= htmlspecialchars($term['name']) ?>">
                                        <i class="far fa-copy"></i>
                                    </button>
                                    <button type="button" class="math-action-btn math-btn-fav" title="Save to My Study List"
                                        aria-label="Bookmark <?= htmlspecialchars($term['name']) ?>" aria-pressed="false">
                                        <i class="far fa-star"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Formal Definition & Formula -->
                            <div class="math-idx-def-box">
                                <div class="math-idx-box-label">
                                    <i class="fas fa-book"></i> Formal Definition & Rule
                                </div>
                                <p class="math-idx-def-text">
                                    <?= $term['definition'] ?>
                                </p>
                                <div class="math-idx-formula-card">
                                    <?= $term['formula'] ?>
                                </div>
                            </div>

                            <!-- Two-Column Grid: What It Does & How to Do It -->
                            <div class="math-lexicon-body-grid">
                                <!-- What It Does (Intuition & Mechanism) -->
                                <div class="math-idx-does-box">
                                    <div class="math-idx-box-label">
                                        <i class="fas fa-lightbulb"></i> What It Does & Why It Matters
                                    </div>
                                    <p class="math-idx-does-text">
                                        <?= $term['whatItDoes'] ?>
                                    </p>
                                </div>

                                <!-- How to Do It (Procedural Steps) -->
                                <div class="math-idx-howto-box">
                                    <div class="math-idx-box-label">
                                        <i class="fas fa-list-ol"></i> How to Do It (Step-by-Step)
                                    </div>
                                    <ul class="math-idx-steps-list">
                                        <?php foreach ($term['howToDoIt'] as $sIdx => $step): ?>
                                            <li class="math-idx-step-item">
                                                <span class="math-idx-step-num"><?= $sIdx + 1 ?></span>
                                                <span><?= $step ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Worked Exemplum Box -->
                            <div class="math-idx-example-box">
                                <div class="math-idx-box-label">
                                    <i class="fas fa-pencil-ruler"></i> Worked Exemplum
                                </div>
                                <p class="math-idx-problem">
                                    <strong>Problem:</strong> <?= $term['exampleProblem'] ?>
                                </p>
                                <p class="math-idx-solution">
                                    <strong>Solution:</strong> <?= $term['exampleSolution'] ?>
                                </p>
                                <div class="math-idx-qed">Q.E.D. &#x220E;</div>
                            </div>

                            <!-- Entry Footer with Reference Codex Jump -->
                            <footer class="math-term-footer">
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-bookmark"></i> Reference Codex Vol. <?= $term['grade'] ?>
                                </span>
                                <a href="/library/read/index.php?book=math-facts-repo&chapter=chapter-<?= $term['codexChapter'] ?>"
                                    class="math-codex-link" title="Read full Grade <?= $term['grade'] ?> Codex in Library">
                                    Explore Full Chapter <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>

                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <!-- Empty State Container -->
    <div id="math-empty-state" class="math-empty-state">
        <i class="fas fa-search-minus"></i>
        <h3>No Mathematical Concepts Found</h3>
        <p>No mathematical terms match your current combination of search keywords, grade level, and domain filters.</p>
        <button type="button" id="math-reset-filters" class="math-pill-btn active">
            <i class="fas fa-redo"></i> Reset All Filters
        </button>
    </div>

    <!-- Toast Notification for Feedback -->
    <div id="math-toast" class="math-toast" role="status" aria-live="polite">
        <i class="fas fa-info-circle"></i>
        <span id="math-toast-msg">Action completed</span>
    </div>

</main>

<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/math-index.js') : '/assets/js/pages/math-index.js' ?>"></script>

<?php include '../src/footer.php'; ?>