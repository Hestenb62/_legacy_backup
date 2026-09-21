<?php
/**
 * pages/grammar.php - Universal English Grammar Codex & Index
 * Repository-style linguistic and grammatical lexicon organized strictly in A-Z alphabetical order,
 * providing comprehensive definitions, syntactic mechanisms ('what it does'),
 * rules and construction procedures ('how to do it'), and worked exemplars across all 12 grades.
 */

$pageTitle = "Universal English Grammar Codex & Index (A–Z) | Hesten's Learning";
$pageDescription = "A-Z English grammar index and repository covering parts of speech, syntax rules, clause structures, punctuation mechanics, and worked examples across all 12 grades.";
$pageKeywords = "grammar index, english grammar codex, parts of speech, sentence diagramming, syntax analyzer, clauses, punctuation mechanics, common core ela";

include '../src/header.php';

// Load Grammar Terms from JSON Dataset
$jsonPath = __DIR__ . '/../assets/data/grammar-php.json';
$grammarTerms = [];
if (is_file($jsonPath)) {
    $grammarTerms = json_decode(file_get_contents($jsonPath), true) ?: [];
}

// Sort terms strictly in A-Z alphabetical order by Name
usort($grammarTerms, function ($a, $b) {
    return strcasecmp($a['name'], $b['name']);
});

// Group terms alphabetically by first letter
$groupedTerms = [];
foreach ($grammarTerms as $term) {
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
    href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/grammar.css') : '/assets/css/pages/grammar.css' ?>">

<main id="main-content" class="grammar-index-page">

    <!-- Page Hero Section -->
    <header class="grammar-index-hero">
        <span class="grammar-index-hero-badge">
            <i class="fas fa-spell-check"></i> A–Z English Grammar Codex &amp; Syntax Repository
        </span>
        <h1 class="grammar-index-hero-title">
            The A–Z English Grammar Index
        </h1>
        <p class="grammar-index-hero-desc">
            An encyclopedic concordance cataloging grammatical definitions, syntactic mechanisms ("what it does"),
            sentence construction procedures ("how to do it"), and worked step-by-step exemplars across all 12 grades.
        </p>

        <!-- Live Instant Search Bar -->
        <div class="grammar-index-search-wrap">
            <div class="grammar-index-search-bar" role="search">
                <i class="fas fa-search grammar-index-search-icon" aria-hidden="true"></i>
                <input type="text" id="grammar-search-input" class="grammar-index-search-input"
                    placeholder="Search grammar rules, parts of speech, punctuation, syntax (e.g. 'Appositive', 'Subjunctive', 'Semicolon')..."
                    aria-label="Search A-Z English grammar index" autocomplete="off" spellcheck="false">
                <button type="button" id="grammar-clear-search" class="grammar-index-clear-btn"
                    aria-label="Clear search input">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Interactive Sentence Diagrammer & Syntax Analyzer -->
        <div class="grammar-sandbox-container" id="grammar-syntax-sandbox" style="margin-top: 1.5rem; max-width: 960px; margin-left: auto; margin-right: auto;">
            <div class="grammar-sandbox-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 2.25rem; height: 2.25rem; border-radius: 0.5rem; background: rgba(16, 185, 129, 0.15); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                            <i class="fas fa-sitemap"></i>
                        </span>
                        <div>
                            <h2 style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin: 0;">Interactive Sentence Diagrammer &amp; Syntax Analyzer</h2>
                            <p style="font-size: 0.8rem; color: var(--color-text-muted); margin: 0;">Deconstruct sentence clauses, map parts of speech, and evaluate syntactic structures.</p>
                        </div>
                    </div>
                    <button type="button" id="sandbox-toggle-btn" class="grammar-pill-btn active" style="font-size: 0.8rem; padding: 0.35rem 0.85rem;">
                        <i class="fas fa-sliders-h"></i> <span id="sandbox-toggle-label">Hide Analyzer</span>
                    </button>
                </div>

                <div id="sandbox-body">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
                        <div>
                            <label for="sandbox-sentence-select" style="display: block; font-size: 0.825rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 0.35rem;">
                                Choose Canonical Sentence Structure:
                            </label>
                            <select id="sandbox-sentence-select" class="grammar-index-search-input" style="width: 100%; height: 42px; border-radius: 0.5rem; padding: 0.4rem 0.75rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border);">
                                <option value="simple" selected>Simple Sentence (Subject + Transitive Verb + Object)</option>
                                <option value="compound">Compound Sentence (Two Clauses joined with FANBOYS)</option>
                                <option value="complex">Complex Sentence (Introductory Subordinate Clause)</option>
                                <option value="passive">Passive Voice Transformation (Patient + Be + Past Participle)</option>
                                <option value="subjunctive">Subjunctive Mood (Counterfactual "If I were...")</option>
                            </select>
                        </div>
                        <div>
                            <label for="sandbox-custom-input" style="display: block; font-size: 0.825rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 0.35rem;">
                                Or Analyze Custom Sentence:
                            </label>
                            <input type="text" id="sandbox-custom-input" placeholder="Type or paste any English sentence..." style="width: 100%; height: 42px; border-radius: 0.5rem; padding: 0.4rem 0.75rem; font-size: 0.875rem; background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border);">
                        </div>
                    </div>

                    <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1.25rem; flex-wrap: wrap;">
                        <button type="button" id="sandbox-analyze-btn" class="grammar-pill-btn active" style="padding: 0.65rem 1.5rem; border-radius: 9999px; font-weight: 800; font-size: 0.9rem; cursor: pointer; border: none; background: #10b981; color: #fff; box-shadow: 0 4px 12px rgba(16,185,129,0.35);">
                            <i class="fas fa-play"></i> Analyze Syntax &amp; Clauses
                        </button>
                        <button type="button" id="sandbox-random-btn" class="grammar-pill-btn" style="padding: 0.65rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.9rem; cursor: pointer;">
                            <i class="fas fa-dice"></i> Example Sentence
                        </button>
                    </div>

                    <!-- Syntax Analysis Result Card -->
                    <div id="sandbox-analysis-result" style="background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: 0.85rem; padding: 1.25rem; border-left: 4px solid #10b981;">
                        <!-- Populated dynamically by JS -->
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sticky A–Z Quick-Jump Ribbon -->
    <nav class="grammar-az-ribbon-container" aria-label="A to Z Alphabetical Navigation">
        <div class="grammar-az-ribbon">
            <?php foreach ($alphabet as $letter): ?>
                <?php $hasTerms = isset($groupedTerms[$letter]); ?>
                <?php if ($hasTerms): ?>
                    <a href="#letter-<?= $letter ?>" class="grammar-az-letter-btn" data-az-letter="<?= $letter ?>"
                        title="Jump to Letter <?= $letter ?> (<?= count($groupedTerms[$letter]) ?> rules)">
                        <?= $letter ?>
                    </a>
                <?php else: ?>
                    <span class="grammar-az-letter-btn disabled" aria-disabled="true"
                        title="No terms starting with <?= $letter ?>">
                        <?= $letter ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Filter Control Panel -->
    <section class="grammar-filter-panel" aria-label="Curriculum Filter Controls">
        <!-- Grade Band Filter Row -->
        <div class="grammar-filter-row">
            <span class="grammar-filter-label"><i class="fas fa-layer-group"></i> Grade Level:</span>
            <div class="grammar-pills-wrap" role="tablist" aria-label="Filter by Grade Band">
                <button type="button" class="grammar-pill-btn active" data-grade="all" role="tab" aria-selected="true">
                    All 12 Grades <span class="grammar-pill-count"><?= count($grammarTerms) ?></span>
                </button>
                <button type="button" class="grammar-pill-btn" data-grade="elem" role="tab" aria-selected="false">
                    Elementary (K–5)
                </button>
                <button type="button" class="grammar-pill-btn" data-grade="mid" role="tab" aria-selected="false">
                    Middle School (6–8)
                </button>
                <button type="button" class="grammar-pill-btn" data-grade="high" role="tab" aria-selected="false">
                    High School (9–12)
                </button>
                <button type="button" class="grammar-pill-btn" id="grammar-fav-toggle" role="tab" aria-selected="false">
                    <i class="far fa-star"></i> My Study List <span class="grammar-pill-count" id="grammar-fav-count">0</span>
                </button>
            </div>
        </div>

        <!-- Grade Specific Filter Row -->
        <div class="grammar-filter-row">
            <span class="grammar-filter-label"><i class="fas fa-graduation-cap"></i> Specific Grade:</span>
            <div class="grammar-pills-wrap" role="tablist" aria-label="Filter by Individual Grade">
                <?php for ($g = 1; $g <= 12; $g++): ?>
                    <button type="button" class="grammar-pill-btn" data-grade="grade-<?= $g ?>" role="tab"
                        aria-selected="false">
                        Grade <?= $g ?>
                    </button>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Grammar Branch / Domain Filter Row -->
        <div class="grammar-filter-row">
            <span class="grammar-filter-label"><i class="fas fa-shapes"></i> Grammar Domain:</span>
            <div class="grammar-pills-wrap" role="tablist" aria-label="Filter by Domain">
                <button type="button" class="grammar-pill-btn active" data-branch="all" role="tab" aria-selected="true">
                    All Domains
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="parts-of-speech" role="tab" aria-selected="false">
                    Parts of Speech
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="sentence-structures" role="tab" aria-selected="false">
                    Sentence Structures
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="clauses-phrases" role="tab" aria-selected="false">
                    Clauses &amp; Phrases
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="punctuation-mechanics" role="tab" aria-selected="false">
                    Punctuation &amp; Mechanics
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="verb-mechanics" role="tab" aria-selected="false">
                    Verb Mechanics
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="syntactic-pitfalls" role="tab" aria-selected="false">
                    Common Pitfalls
                </button>
                <button type="button" class="grammar-pill-btn" data-branch="rhetoric-figurative" role="tab" aria-selected="false">
                    Rhetoric &amp; Figurative
                </button>
            </div>
        </div>
    </section>

    <!-- Status & Action Bar -->
    <div class="grammar-status-bar">
        <div class="grammar-match-count" aria-live="polite">
            Showing <strong id="grammar-match-count-num"><?= count($grammarTerms) ?></strong> of <span
                id="grammar-total-count-num"><?= count($grammarTerms) ?></span> indexed grammatical concepts
        </div>
        <div class="grammar-view-toggle">
            <button type="button" id="grammar-export-btn" class="grammar-index-export-btn"
                title="Export currently filtered terms as a plain text study sheet">
                <i class="fas fa-download"></i> Export Study Sheet
            </button>
            <button type="button" id="grammar-print-btn" class="grammar-index-print-btn"
                title="Print this English grammar reference index">
                <i class="fas fa-print"></i> Print Index
            </button>
        </div>
    </div>

    <!-- Alphabetical A-Z Sections Container -->
    <div id="grammar-az-sections-container">
        <?php foreach ($groupedTerms as $letter => $terms): ?>
            <section class="grammar-az-letter-section" id="letter-<?= $letter ?>" data-letter="<?= $letter ?>">
                <!-- Section Header -->
                <div class="grammar-az-letter-header">
                    <div class="grammar-az-letter-badge"><?= $letter ?></div>
                    <h2 class="grammar-az-letter-title"><?= $letter ?> — Concepts</h2>
                    <span class="grammar-az-letter-count"><?= count($terms) ?>
                        <?= count($terms) === 1 ? 'rule' : 'rules' ?></span>
                </div>

                <!-- Lexicon Entries List -->
                <div class="grammar-lexicon-list">
                    <?php foreach ($terms as $term): ?>
                        <article class="grammar-term-card" data-term-id="<?= htmlspecialchars($term['id']) ?>"
                            data-grade="<?= htmlspecialchars((string) $term['grade']) ?>"
                            data-branch="<?= htmlspecialchars($term['branch']) ?>" data-letter="<?= $letter ?>"
                            data-keywords="<?= htmlspecialchars($term['keywords']) ?>">

                            <!-- Entry Header -->
                            <div class="grammar-term-card-header">
                                <div class="grammar-term-title-wrap">
                                    <h3 class="grammar-term-title">
                                        <?= htmlspecialchars($term['name']) ?>
                                    </h3>
                                    <span class="grammar-term-etymology"><?= htmlspecialchars($term['etymology']) ?></span>
                                    <div class="grammar-term-badges">
                                        <span class="grammar-badge-grade"><?= htmlspecialchars($term['gradeName']) ?></span>
                                        <span class="grammar-badge-branch"><?= htmlspecialchars($term['branchLabel']) ?></span>
                                    </div>
                                </div>

                                <!-- Action Tools -->
                                <div class="grammar-term-actions">
                                    <button type="button" class="grammar-action-btn grammar-btn-speak"
                                        title="Listen to pronunciation and definition"
                                        aria-label="Listen to <?= htmlspecialchars($term['name']) ?>">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                    <button type="button" class="grammar-action-btn grammar-btn-copy"
                                        data-formula="<?= htmlspecialchars($term['rawFormula']) ?>"
                                        title="Copy rule syntax to clipboard"
                                        aria-label="Copy rule syntax for <?= htmlspecialchars($term['name']) ?>">
                                        <i class="far fa-copy"></i>
                                    </button>
                                    <button type="button" class="grammar-action-btn grammar-btn-fav"
                                        title="Save to My Study List"
                                        aria-label="Save <?= htmlspecialchars($term['name']) ?> to study list">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button type="button" class="grammar-action-btn grammar-btn-note"
                                        title="Save note to Digital Scratchpad (Alt+S)"
                                        aria-label="Save <?= htmlspecialchars($term['name']) ?> to scratchpad">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Syntactic Pattern / Formula Display -->
                            <?php if (!empty($term['formula'])): ?>
                                <div class="grammar-formula-display" title="Canonical Syntactic Pattern">
                                    <div class="grammar-formula-tag">
                                        <i class="fas fa-code-branch" aria-hidden="true"></i> Syntactic Rule &amp; Pattern
                                    </div>
                                    <div class="grammar-formula-code"><?= htmlspecialchars($term['formula']) ?></div>
                                </div>
                            <?php endif; ?>

                            <!-- 1. Formal Definition -->
                            <div class="grammar-card-section">
                                <span class="grammar-section-subtitle">
                                    <i class="fas fa-book-open"></i> Grammatical Definition
                                </span>
                                <p class="grammar-definition-text">
                                    <?= htmlspecialchars($term['definition']) ?>
                                </p>
                            </div>

                            <!-- 2. What it Does (Linguistic Mechanism) -->
                            <div class="grammar-card-section">
                                <span class="grammar-section-subtitle">
                                    <i class="fas fa-cogs"></i> Functional Linguistic Role
                                </span>
                                <p class="grammar-what-it-does">
                                    <?= htmlspecialchars($term['whatItDoes']) ?>
                                </p>
                            </div>

                            <!-- 3. Rules & How to Use It -->
                            <?php if (!empty($term['howToDoIt'])): ?>
                                <div class="grammar-card-section">
                                    <span class="grammar-section-subtitle">
                                        <i class="fas fa-list-ol"></i> Application &amp; Construction Rules
                                    </span>
                                    <ol class="grammar-step-list">
                                        <?php foreach ($term['howToDoIt'] as $rule): ?>
                                            <li><?= htmlspecialchars($rule) ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            <?php endif; ?>

                            <!-- 4. Worked Exemplar Box -->
                            <?php if (!empty($term['exampleProblem'])): ?>
                                <div class="grammar-example-box">
                                    <span class="grammar-section-subtitle" style="margin-bottom: 0.35rem;">
                                        <i class="fas fa-lightbulb"></i> Worked Exemplar &amp; Analysis
                                    </span>
                                    <div class="grammar-example-problem">
                                        <strong>Challenge:</strong> <?= htmlspecialchars($term['exampleProblem']) ?>
                                    </div>
                                    <div class="grammar-example-solution">
                                        <strong>Breakdown:</strong> <?= htmlspecialchars($term['exampleSolution']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Card Footer -->
                            <footer class="grammar-term-card-footer">
                                <span style="font-size: 0.75rem; color: var(--color-text-muted);">
                                    <i class="fas fa-graduation-cap"></i> Grade <?= $term['grade'] ?> ELA Core
                                </span>
                                <a href="/library/" class="grammar-codex-link" title="Explore Literature &amp; Reading in Library">
                                    Explore in Library <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>

                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <!-- Empty State Container -->
    <div id="grammar-empty-state" class="grammar-empty-state">
        <i class="fas fa-search-minus"></i>
        <h3>No Grammatical Concepts Found</h3>
        <p>No grammar rules match your current combination of search keywords, grade level, and domain filters.</p>
        <button type="button" id="grammar-reset-filters" class="grammar-pill-btn active">
            <i class="fas fa-redo"></i> Reset All Filters
        </button>
    </div>

    <!-- Toast Notification for Feedback -->
    <div id="grammar-toast" class="grammar-toast" role="status" aria-live="polite">
        <i class="fas fa-info-circle"></i>
        <span id="grammar-toast-msg">Action completed</span>
    </div>

</main>

<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/grammar-index.js') : '/assets/js/pages/grammar-index.js' ?>"></script>

<?php include '../src/footer.php'; ?>
