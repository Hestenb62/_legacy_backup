<?php
/**
 * library/repository_page.php - Dedicated Subject Repository View
 * Renders comprehensive, accessible, interactive subject reference guides
 * driven by external JSON/JS data packages (e.g., punctuation.json).
 * 
 * WCAG 2.1/2.2 AA & AAA Compliant, Universal Design for Learning (UDL)
 */

if (!isset($pageData) || !is_array($pageData)) {
    echo '<div class="repo-page-container"><div class="alert alert-warning">No repository data provided.</div></div>';
    return;
}

$marks = $pageData['marks'] ?? [];
$categories = $pageData['categories'] ?? [];
$quiz = $pageData['masteryQuiz'] ?? [];
$matrix = $pageData['styleGuideMatrix'] ?? [];
$cheatSheet = $pageData['cheatSheet'] ?? [];
$timeline = $pageData['historicalTimeline'] ?? [];
$standards = $pageData['standards'] ?? [];
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/library/lib-repository-page.css') : '/assets/css/library/lib-repository-page.css' ?>">

<div class="repo-page-container" id="repo-page-root">

    <!-- Accessible Breadcrumbs -->
    <nav class="repo-breadcrumbs" aria-label="Breadcrumb Trail">
        <a href="/"><i class="fas fa-home" aria-hidden="true"></i> Home</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="/library/"><i class="fas fa-book-bookmark" aria-hidden="true"></i> Library</a>
        <span class="sep" aria-hidden="true">/</span>
        <span>Research Repositories</span>
        <span class="sep" aria-hidden="true">/</span>
        <span class="current" aria-current="page"><?= htmlspecialchars($pageData['title'] ?? 'Repository') ?></span>
    </nav>

    <!-- Hero Header Banner -->
    <header class="repo-hero-card" role="region" aria-label="Repository Overview">
        <div class="repo-hero-top">
            <a href="/library/" class="repo-back-catalog-btn" title="Return to Main Digital Library Catalog">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                <span>Return to Library Catalog</span>
            </a>

            <div class="repo-badges-row">
                <?php if (!empty($pageData['academicLevel'])): ?>
                    <span class="repo-badge repo-badge-level">
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i> <?= htmlspecialchars($pageData['academicLevel']) ?>
                    </span>
                <?php endif; ?>
                <span class="repo-badge repo-badge-standards">
                    <i class="fas fa-award" aria-hidden="true"></i> CCSS Standards Aligned
                </span>
            </div>
        </div>

        <h1 class="repo-hero-title"><?= htmlspecialchars($pageData['title']) ?></h1>
        <p class="repo-hero-subtitle"><?= htmlspecialchars($pageData['subtitle']) ?></p>

        <!-- Quick Action Toolbar -->
        <div class="repo-hero-actions" role="toolbar" aria-label="Study & Export Tools">
            <a href="#repo-quiz-section" class="repo-action-btn primary">
                <i class="fas fa-vial" aria-hidden="true"></i>
                <span>Mastery Quiz Lab</span>
            </a>
            <a href="#repo-matrix-section" class="repo-action-btn">
                <i class="fas fa-table-columns" aria-hidden="true"></i>
                <span>Style Guide Matrix</span>
            </a>
            <a href="#repo-cheatsheet-section" class="repo-action-btn">
                <i class="fas fa-file-invoice" aria-hidden="true"></i>
                <span>Quick Cheat Sheet</span>
            </a>
            <button type="button" class="repo-action-btn" onclick="printRepositoryGuide()" title="Print full study guide">
                <i class="fas fa-print" aria-hidden="true"></i>
                <span>Print Guide</span>
            </button>
            <button type="button" class="repo-action-btn" onclick="copyRepositoryCitation('mla')" title="Copy academic citation for research papers">
                <i class="fas fa-quote-left" aria-hidden="true"></i>
                <span>Cite Guide</span>
            </button>
        </div>
    </header>

    <!-- Sticky Navigation & Filter Bar -->
    <section class="repo-nav-bar" role="search" aria-label="Mark Filter & Quick Navigator">
        <div class="repo-filter-row">
            <!-- Real-Time Search Box -->
            <div class="repo-search-wrap">
                <i class="fas fa-search repo-search-icon" aria-hidden="true"></i>
                <input type="text" id="repo-search-input" class="repo-search-input" placeholder="Search marks, rules, keywords..." aria-label="Filter marks by keyword">
                <button type="button" id="repo-search-clear" class="repo-search-clear" aria-label="Clear search input">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Category Filter Tabs -->
            <div class="repo-category-tabs" role="tablist" aria-label="Filter by Punctuation Category">
                <button type="button" class="repo-cat-tab active" data-category="all" role="tab" aria-selected="true">
                    All Marks (<?= count($marks) ?>)
                </button>
                <?php foreach ($categories as $cat): ?>
                    <button type="button" class="repo-cat-tab" data-category="<?= htmlspecialchars($cat['id']) ?>" role="tab" aria-selected="false">
                        <i class="<?= htmlspecialchars($cat['icon']) ?>" aria-hidden="true"></i> <?= htmlspecialchars($cat['name']) ?> (<?= (int)$cat['count'] ?>)
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quick Jump Glyph Ribbon -->
        <div class="repo-glyph-ribbon" role="navigation" aria-label="Quick Jump to Punctuation Mark">
            <span class="repo-glyph-label"><i class="fas fa-bolt" aria-hidden="true"></i> Quick Jump:</span>
            <?php foreach ($marks as $m): ?>
                <a href="#<?= htmlspecialchars($m['id']) ?>" class="repo-glyph-pill" title="Jump to <?= htmlspecialchars($m['name']) ?>">
                    <span class="glyph" aria-hidden="true"><?= htmlspecialchars($m['symbol']) ?></span>
                    <span><?= htmlspecialchars($m['name']) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Live Status Announcement for Assistive Tech -->
    <div class="sr-only" aria-live="polite" id="repo-live-announcer">
        Showing <span id="repo-visible-marks-count"><?= count($marks) ?></span> punctuation marks.
    </div>

    <!-- Punctuation Marks Deep-Dive Cards Feed -->
    <section class="repo-marks-feed" id="repo-marks-feed" aria-label="Punctuation Deep-Dive Directory">
        
        <div id="repo-no-marks-found" style="display: none; text-align: center; padding: 3rem; background: var(--lib-bg-surface); border-radius: var(--lib-radius-xl); border: 1px dashed var(--lib-border);">
            <i class="fas fa-circle-question" style="font-size: 2.5rem; color: var(--lib-text-muted); margin-bottom: 1rem;" aria-hidden="true"></i>
            <h3 style="font-size: 1.25rem; color: var(--lib-text-main); margin-bottom: 0.5rem;">No punctuation marks match your search</h3>
            <p style="color: var(--lib-text-muted);">Try a different keyword or reset the category filter.</p>
        </div>

        <?php foreach ($marks as $mark): ?>
            <article class="repo-mark-card" id="<?= htmlspecialchars($mark['id']) ?>" data-category="<?= htmlspecialchars($mark['category']) ?>">
                
                <!-- Mark Header -->
                <div class="repo-mark-header">
                    <div class="repo-mark-header-left">
                        <div class="repo-mark-glyph-box" title="Unicode: <?= htmlspecialchars($mark['unicode']) ?>">
                            <?= htmlspecialchars($mark['symbol']) ?>
                        </div>
                        <div class="repo-mark-title-wrap">
                            <h2>
                                <?= htmlspecialchars($mark['name']) ?>
                                <span class="repo-badge repo-badge-level" style="font-size: 0.7rem; font-weight: 600;">
                                    <?= htmlspecialchars($mark['categoryLabel']) ?>
                                </span>
                            </h2>
                            <div class="repo-mark-role">
                                <i class="fas fa-crosshairs" style="color: var(--lib-primary);" aria-hidden="true"></i> <?= htmlspecialchars($mark['role']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="repo-mark-actions">
                        <button type="button" class="repo-copy-glyph-btn" data-glyph="<?= htmlspecialchars($mark['symbol']) ?>" aria-label="Copy <?= htmlspecialchars($mark['name']) ?> glyph to clipboard">
                            <i class="fas fa-copy" aria-hidden="true"></i> Copy Glyph
                        </button>
                        <button type="button" class="repo-speak-mark-btn" aria-label="Listen to explanation for <?= htmlspecialchars($mark['name']) ?>">
                            <i class="fas fa-volume-up" aria-hidden="true"></i> Listen
                        </button>
                    </div>
                </div>

                <!-- Overview Prose -->
                <p class="repo-overview-text"><?= htmlspecialchars($mark['overview']) ?></p>

                <!-- Historical Etymology Box -->
                <?php if (!empty($mark['historicalOrigin'])): ?>
                    <div class="repo-etymology-box">
                        <strong><i class="fas fa-landmark" aria-hidden="true"></i> Historical Evolution &amp; Etymology:</strong>
                        <span><?= htmlspecialchars($mark['historicalOrigin']) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Canonical Academic Rules -->
                <?php if (!empty($mark['rules'])): ?>
                    <div class="repo-rules-section">
                        <h3 class="repo-rules-heading">
                            <i class="fas fa-list-check" style="color: var(--lib-primary);" aria-hidden="true"></i>
                            <span>Canonical Academic Rules</span>
                        </h3>
                        <div class="repo-rules-grid">
                            <?php foreach ($mark['rules'] as $rule): ?>
                                <div class="repo-rule-item">
                                    <div class="repo-rule-item-top">
                                        <span class="repo-rule-num"><?= (int)$rule['number'] ?></span>
                                        <span class="repo-rule-title"><?= htmlspecialchars($rule['title']) ?></span>
                                    </div>
                                    <p class="repo-rule-statement"><?= htmlspecialchars($rule['rule']) ?></p>
                                    <div class="repo-rule-rationale">
                                        <strong>Syntactic Rationale:</strong> <?= htmlspecialchars($rule['rationale']) ?>
                                    </div>
                                    <?php if (!empty($rule['academicStandard'])): ?>
                                        <span class="repo-rule-standard-tag">
                                            <i class="fas fa-book-open" aria-hidden="true"></i> <?= htmlspecialchars($rule['academicStandard']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Contrasting Examples Comparison Grid -->
                <?php if (!empty($mark['examples'])): ?>
                    <div class="repo-examples-section">
                        <h3 class="repo-examples-heading">
                            <i class="fas fa-scale-balanced" style="color: var(--lib-primary);" aria-hidden="true"></i>
                            <span>Contrasting Exemplars &amp; Diagnostics</span>
                        </h3>
                        <div class="repo-examples-grid">
                            <?php foreach ($mark['examples'] as $ex): ?>
                                <div class="repo-example-card <?= $ex['type'] === 'correct' ? 'correct' : 'incorrect' ?>">
                                    <div class="repo-example-badge">
                                        <i class="fas <?= $ex['type'] === 'correct' ? 'fa-check' : 'fa-times' ?>" aria-hidden="true"></i>
                                        <span><?= $ex['type'] === 'correct' ? 'Academic Standard' : 'Common Misuse / Trap' ?>: <?= htmlspecialchars($ex['title']) ?></span>
                                    </div>
                                    <div class="repo-example-text">
                                        "<?= htmlspecialchars($ex['text']) ?>"
                                    </div>
                                    <div class="repo-example-explanation">
                                        <strong>Diagnostic Note:</strong> <?= htmlspecialchars($ex['explanation']) ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Pro-Tips & Common Traps -->
                <?php if (!empty($mark['proTips'])): ?>
                    <div class="repo-protip-box">
                        <i class="fas fa-lightbulb repo-protip-icon" aria-hidden="true"></i>
                        <div class="repo-protip-content">
                            <h3>Scholar Pro-Tips &amp; Avoidable Traps:</h3>
                            <ul>
                                <?php foreach ($mark['proTips'] as $tip): ?>
                                    <li><?= htmlspecialchars($tip) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

            </article>
        <?php endforeach; ?>

    </section>

    <!-- Interactive Punctuation Mastery Lab (Quiz) -->
    <?php if (!empty($quiz)): ?>
        <section class="repo-section-card" id="repo-quiz-section" role="region" aria-label="Interactive Mastery Quiz">
            <div class="repo-section-header">
                <h2><i class="fas fa-spell-check" style="color: var(--lib-primary);" aria-hidden="true"></i> Interactive Punctuation Mastery Lab</h2>
                <p>Test your syntactic mastery across comma splices, colon gating, hyphenation rules, and apostrophe invariants with instant scholarly feedback.</p>
            </div>

            <div class="repo-quiz-score-tracker">
                <i class="fas fa-trophy" style="color: #f59e0b; font-size: 1.25rem;" aria-hidden="true"></i>
                <span class="repo-quiz-score-badge">Score: <strong id="repo-quiz-score-val">0</strong> / <span id="repo-quiz-total-val"><?= count($quiz) ?></span></span>
            </div>

            <div class="repo-quiz-feed">
                <?php foreach ($quiz as $idx => $q): ?>
                    <div class="repo-quiz-item" data-qid="<?= htmlspecialchars($q['id']) ?>" data-correct-index="<?= (int)$q['correctIndex'] ?>" data-explanation="<?= htmlspecialchars($q['explanation']) ?>">
                        <div class="repo-quiz-item-header">
                            <span class="repo-quiz-category-tag"><?= htmlspecialchars($q['category']) ?></span>
                            <span style="font-size: 0.8rem; font-weight: 700; color: var(--lib-text-muted);">Question <?= $idx + 1 ?> of <?= count($quiz) ?></span>
                        </div>
                        <div class="repo-quiz-question"><?= htmlspecialchars($q['question']) ?></div>
                        <div class="repo-quiz-choices" role="radiogroup" aria-label="Question choices">
                            <?php foreach ($q['choices'] as $cIdx => $choice): ?>
                                <button type="button" class="repo-quiz-choice-btn" data-choice-index="<?= $cIdx ?>" role="radio" aria-checked="false">
                                    <span><?= htmlspecialchars($choice) ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <div class="repo-quiz-feedback" aria-live="polite"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Style Guide Divergence Matrix -->
    <?php if (!empty($matrix)): ?>
        <section class="repo-section-card" id="repo-matrix-section" role="region" aria-label="Style Guide Comparison Matrix">
            <div class="repo-section-header">
                <h2><i class="fas fa-table-columns" style="color: var(--lib-primary);" aria-hidden="true"></i> Academic Style Guide Divergence Matrix</h2>
                <p>Compare canonical punctuation requirements across the Chicago Manual of Style (CMOS), Modern Language Association (MLA), American Psychological Association (APA), and Associated Press (AP).</p>
            </div>

            <div class="repo-table-responsive">
                <table class="repo-data-table" aria-label="Style Guide Comparison Matrix">
                    <thead>
                        <tr>
                            <th scope="col" style="min-width: 180px;">Syntactic Convention</th>
                            <th scope="col"><span class="repo-table-tag chicago">Chicago (CMOS)</span></th>
                            <th scope="col"><span class="repo-table-tag mla">MLA 9th</span></th>
                            <th scope="col"><span class="repo-table-tag apa">APA 7th</span></th>
                            <th scope="col"><span class="repo-table-tag ap">AP (Journalism)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matrix as $row): ?>
                            <tr>
                                <th scope="row" style="font-weight: 700; color: var(--lib-text-main);"><?= htmlspecialchars($row['convention']) ?></th>
                                <td><?= htmlspecialchars($row['chicago']) ?></td>
                                <td><?= htmlspecialchars($row['mla']) ?></td>
                                <td><?= htmlspecialchars($row['apa']) ?></td>
                                <td><?= htmlspecialchars($row['ap']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>

    <!-- High-Density Quick Reference Cheat Sheet -->
    <?php if (!empty($cheatSheet)): ?>
        <section class="repo-section-card" id="repo-cheatsheet-section" role="region" aria-label="Quick Reference Cheat Sheet">
            <div class="repo-section-header">
                <h2><i class="fas fa-file-invoice" style="color: var(--lib-primary);" aria-hidden="true"></i> Punctuation Quick-Reference Cheat Sheet</h2>
                <p>Scannable summary table outlining primary functions, mandatory practices, and prohibited errors for all 16 punctuation marks.</p>
            </div>

            <div class="repo-table-responsive">
                <table class="repo-data-table" aria-label="Punctuation Cheat Sheet">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Mark</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="min-width: 220px;">Primary Syntactic Function</th>
                            <th scope="col" style="min-width: 220px; color: #059669;">Always Do</th>
                            <th scope="col" style="min-width: 220px; color: #dc2626;">Never Do</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cheatSheet as $item): ?>
                            <tr>
                                <td class="repo-glyph-cell"><?= htmlspecialchars($item['symbol']) ?></td>
                                <td style="font-weight: 700; color: var(--lib-text-main);"><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['function']) ?></td>
                                <td style="color: var(--lib-text-main);"><i class="fas fa-check" style="color: #10b981; margin-right: 0.35rem;" aria-hidden="true"></i><?= htmlspecialchars($item['do']) ?></td>
                                <td style="color: var(--lib-text-main);"><i class="fas fa-times" style="color: #ef4444; margin-right: 0.35rem;" aria-hidden="true"></i><?= htmlspecialchars($item['dont']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>

    <!-- Historical Evolution Timeline -->
    <?php if (!empty($timeline)): ?>
        <section class="repo-section-card" role="region" aria-label="Historical Evolution of Punctuation">
            <div class="repo-section-header">
                <h2><i class="fas fa-clock-rotate-left" style="color: var(--lib-primary);" aria-hidden="true"></i> Historical Evolution of English Punctuation</h2>
                <p>Tracing the development of punctuation marks from classical Alexandrian breathing pauses to Renaissance Venetian printing and modern Unicode codification.</p>
            </div>

            <div class="repo-timeline-list">
                <?php foreach ($timeline as $tItem): ?>
                    <div class="repo-timeline-item">
                        <div class="repo-timeline-era"><?= htmlspecialchars($tItem['era']) ?></div>
                        <div class="repo-timeline-scholar"><?= htmlspecialchars($tItem['scholar']) ?></div>
                        <div class="repo-timeline-desc"><?= htmlspecialchars($tItem['innovation']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Related Academic Desks & Curriculum Bridges -->
    <section class="repo-section-card" role="region" aria-label="Related Academic Resources">
        <div class="repo-section-header">
            <h2><i class="fas fa-network-wired" style="color: var(--lib-primary);" aria-hidden="true"></i> Curriculum Bridges &amp; Academic Desks</h2>
            <p>Continue your scholarship across interactive grammar modules, official Common Core standards, and digital literature.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
            <a href="/student/ela-grammar.php" class="repo-action-btn" style="padding: 1.25rem; flex-direction: column; align-items: flex-start; gap: 0.5rem; text-decoration: none;">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--lib-primary); font-size: 1.1rem; font-weight: 700;">
                    <i class="fas fa-spell-check" aria-hidden="true"></i>
                    <span>ELA Grammar &amp; Mechanics</span>
                </div>
                <span style="font-size: 0.85rem; color: var(--lib-text-muted); line-height: 1.5;">Practice all 54 grammar lessons, syntax formulations, and interactive study popups.</span>
            </a>

            <a href="/pages/standards.php?domain=ELA-L" class="repo-action-btn" style="padding: 1.25rem; flex-direction: column; align-items: flex-start; gap: 0.5rem; text-decoration: none;">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: #059669; font-size: 1.1rem; font-weight: 700;">
                    <i class="fas fa-award" aria-hidden="true"></i>
                    <span>Language Standards Explorer</span>
                </div>
                <span style="font-size: 0.85rem; color: var(--lib-text-muted); line-height: 1.5;">Explore CCSS.ELA-LITERACY.L.8.2 and grade-level mastery benchmarks.</span>
            </a>

            <a href="/library/" class="repo-action-btn" style="padding: 1.25rem; flex-direction: column; align-items: flex-start; gap: 0.5rem; text-decoration: none;">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--lib-secondary); font-size: 1.1rem; font-weight: 700;">
                    <i class="fas fa-book-open" aria-hidden="true"></i>
                    <span>Digital Library Catalog</span>
                </div>
                <span style="font-size: 0.85rem; color: var(--lib-text-muted); line-height: 1.5;">Search our digital academic collection of classic literature and primary sources.</span>
            </a>
        </div>
    </section>

</div>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-repository-page.js') : '/assets/js/library/lib-repository-page.js' ?>" defer></script>
