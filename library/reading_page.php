<?php
/**
 * library/reading_page.php - Dedicated Digital Reading Article Page
 * Renders standalone literature texts, short stories, poems, and primary sources
 * linked directly from ELA curriculum lessons without displaying as books in the catalog.
 *
 * WCAG 2.1/2.2 AA & AAA Compliant, Universal Design for Learning (UDL)
 */

if (!isset($pageData) || !is_array($pageData)) {
    echo '<div class="reading-page-container"><div class="alert alert-warning">No reading data provided.</div></div>';
    return;
}

$title = $pageData['title'] ?? 'Reading Selection';
$author = $pageData['author'] ?? 'Unknown Author';
$source = $pageData['source'] ?? '';
$gradeLevel = $pageData['gradeLevel'] ?? 'Grade 9 ELA';
$moduleInfo = $pageData['moduleInfo'] ?? 'Module 1 Anchor Text';
$sections = $pageData['sections'] ?? [];
$citation = $pageData['citation'] ?? '';
$backLessonUrl = $pageData['backLessonUrl'] ?? '/levels/k.php';
?>

<style>
.reading-page-container {
    max-width: 900px;
    margin: 1.5rem auto 4rem auto;
    padding: 0 1.25rem;
}
.reading-breadcrumbs {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--color-text-secondary, #64748b);
    margin-bottom: 1.25rem;
    flex-wrap: wrap;
}
.reading-breadcrumbs a {
    color: var(--color-teal, #0d9488);
    text-decoration: none;
    font-weight: 500;
}
.reading-breadcrumbs a:hover {
    text-decoration: underline;
}
.reading-hero-card {
    background: var(--color-bg-surface, #ffffff);
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
    position: relative;
}
.reading-hero-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1rem;
}
.reading-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-text-secondary, #475569);
    background: var(--color-bg-subtle, #f1f5f9);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.2s ease;
    border: 1px solid var(--color-border, #cbd5e1);
}
.reading-back-btn:hover {
    background: var(--color-teal, #0d9488);
    color: #ffffff;
    border-color: var(--color-teal, #0d9488);
}
.reading-badges-row {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}
.reading-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 0.25rem 0.65rem;
    border-radius: 9999px;
    background: rgba(13, 148, 136, 0.1);
    color: var(--color-teal, #0d9488);
}
.reading-badge.module {
    background: rgba(236, 72, 153, 0.1);
    color: #db2777;
}
.reading-hero-title {
    font-size: 2.25rem;
    font-weight: 800;
    color: var(--color-text-default, #0f172a);
    margin: 0.5rem 0;
    line-height: 1.25;
}
.reading-hero-author {
    font-size: 1.15rem;
    color: var(--color-text-secondary, #475569);
    font-weight: 500;
    margin-bottom: 1.25rem;
}
.reading-hero-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    padding-top: 1.25rem;
    border-top: 1px solid var(--color-border, #e2e8f0);
}
.reading-tool-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.5rem 0.9rem;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 0.5rem;
    border: 1px solid var(--color-border, #cbd5e1);
    background: var(--color-bg-base, #ffffff);
    color: var(--color-text-default, #334155);
    cursor: pointer;
    transition: all 0.2s ease;
}
.reading-tool-btn:hover {
    background: var(--color-bg-subtle, #f8fafc);
    border-color: var(--color-teal, #0d9488);
    color: var(--color-teal, #0d9488);
}
.reading-tool-btn.active {
    background: var(--color-teal, #0d9488);
    color: #ffffff;
    border-color: var(--color-teal, #0d9488);
}

/* Article Reading Stream */
.reading-article-stream {
    background: var(--color-bg-surface, #ffffff);
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 1rem;
    padding: 2.5rem;
    font-size: 1.125rem;
    line-height: 1.85;
    color: var(--color-text-default, #1e293b);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}
.reading-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--color-text-default, #0f172a);
    margin: 2rem 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--color-border, #e2e8f0);
}
.reading-section-title:first-child {
    margin-top: 0;
}
.reading-epigraph {
    background: var(--color-bg-subtle, #f8fafc);
    border-left: 4px solid var(--color-teal, #0d9488);
    padding: 1.25rem 1.5rem;
    font-style: italic;
    margin: 1.5rem 0;
    border-radius: 0 0.5rem 0.5rem 0;
    color: var(--color-text-default, #334155);
}
.reading-epigraph-citation {
    font-style: normal;
    font-size: 0.875rem;
    color: var(--color-text-secondary, #64748b);
    margin-top: 0.5rem;
    display: block;
}
.reading-paragraph-wrapper {
    position: relative;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}
.reading-p-num {
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--color-text-secondary, #94a3b8);
    min-width: 2rem;
    text-align: right;
    user-select: none;
    padding-top: 0.3rem;
}
.reading-p-text {
    flex: 1;
    margin: 0;
}
.reading-footer-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--color-border, #e2e8f0);
}
.reading-citation-box {
    margin-top: 2rem;
    padding: 1.25rem;
    background: var(--color-bg-subtle, #f8fafc);
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 0.75rem;
    font-size: 0.85rem;
    color: var(--color-text-secondary, #64748b);
}

/* Print Overrides */
@media print {
    .reading-hero-actions, .reading-breadcrumbs, .reading-hero-top, .reading-footer-nav, nav, footer, #header {
        display: none !important;
    }
    .reading-page-container {
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .reading-hero-card, .reading-article-stream {
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
    }
    .reading-article-stream {
        font-size: 11pt !important;
        line-height: 1.5 !important;
    }
}
</style>

<div class="reading-page-container" id="reading-page-root">

    <!-- Accessible Breadcrumbs -->
    <nav class="reading-breadcrumbs" aria-label="Breadcrumb Trail">
        <a href="/"><i class="fas fa-home" aria-hidden="true"></i> Home</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="/library/"><i class="fas fa-book-bookmark" aria-hidden="true"></i> Library</a>
        <span class="sep" aria-hidden="true">/</span>
        <span>ELA Readings</span>
        <span class="sep" aria-hidden="true">/</span>
        <span class="current" aria-current="page"><?= htmlspecialchars($title) ?></span>
    </nav>

    <!-- Reading Hero Card -->
    <header class="reading-hero-card">
        <div class="reading-hero-top">
            <a href="<?= htmlspecialchars($backLessonUrl) ?>" class="reading-back-btn">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                <span>Return to ELA Lesson</span>
            </a>
            <div class="reading-badges-row">
                <span class="reading-badge"><i class="fas fa-graduation-cap" aria-hidden="true"></i> <?= htmlspecialchars($gradeLevel) ?></span>
                <span class="reading-badge module"><i class="fas fa-book-open" aria-hidden="true"></i> <?= htmlspecialchars($moduleInfo) ?></span>
            </div>
        </div>

        <h1 class="reading-hero-title"><?= htmlspecialchars($title) ?></h1>
        <div class="reading-hero-author">By <?= htmlspecialchars($author) ?> <?= !empty($source) ? ' &bull; ' . htmlspecialchars($source) : '' ?></div>

        <!-- Reading Assistance Tools -->
        <div class="reading-hero-actions" role="toolbar" aria-label="Reading & Accessibility Tools">
            <button type="button" class="reading-tool-btn" id="btn-read-aloud" onclick="toggleReadAloud()" aria-label="Read full text aloud using speech synthesis">
                <i class="fas fa-volume-high" aria-hidden="true"></i>
                <span id="read-aloud-label">Read Aloud</span>
            </button>
            <button type="button" class="reading-tool-btn" onclick="adjustReadingFontSize(1)" aria-label="Increase text font size">
                <i class="fas fa-plus" aria-hidden="true"></i> Larger Font
            </button>
            <button type="button" class="reading-tool-btn" onclick="adjustReadingFontSize(-1)" aria-label="Decrease text font size">
                <i class="fas fa-minus" aria-hidden="true"></i> Smaller Font
            </button>
            <button type="button" class="reading-tool-btn" id="btn-dyslexia" onclick="toggleReadingDyslexicFont()" aria-label="Toggle OpenDyslexic accessible font">
                <i class="fas fa-font" aria-hidden="true"></i> OpenDyslexic
            </button>
            <button type="button" class="reading-tool-btn" onclick="window.print()" aria-label="Print this complete reading selection">
                <i class="fas fa-print" aria-hidden="true"></i> Print Selection
            </button>
        </div>
    </header>

    <!-- Main Text Article Body -->
    <article class="reading-article-stream" id="reading-content-body">
        <?php 
        $paraGlobalIndex = 1;
        foreach ($sections as $secIndex => $sec): 
        ?>
            <?php if (!empty($sec['heading'])): ?>
                <h2 class="reading-section-title" id="sec-<?= $secIndex ?>"><?= htmlspecialchars($sec['heading']) ?></h2>
            <?php endif; ?>

            <?php if (!empty($sec['epigraph'])): ?>
                <blockquote class="reading-epigraph">
                    <?= htmlspecialchars($sec['epigraph']['quote'] ?? '') ?>
                    <?php if (!empty($sec['epigraph']['attribution'])): ?>
                        <span class="reading-epigraph-citation"><?= htmlspecialchars($sec['epigraph']['attribution']) ?></span>
                    <?php endif; ?>
                </blockquote>
            <?php endif; ?>

            <?php if (!empty($sec['paragraphs']) && is_array($sec['paragraphs'])): ?>
                <?php foreach ($sec['paragraphs'] as $pText): ?>
                    <div class="reading-paragraph-wrapper" id="p<?= $paraGlobalIndex ?>">
                        <span class="reading-p-num" title="Paragraph <?= $paraGlobalIndex ?>"><?= $paraGlobalIndex ?></span>
                        <p class="reading-p-text"><?= nl2br(htmlspecialchars($pText)) ?></p>
                    </div>
                    <?php $paraGlobalIndex++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!empty($citation)): ?>
            <div class="reading-citation-box">
                <strong>Source &amp; Academic Citation:</strong><br>
                <?= htmlspecialchars($citation) ?>
            </div>
        <?php endif; ?>
    </article>

    <!-- Bottom Navigation -->
    <div class="reading-footer-nav">
        <a href="<?= htmlspecialchars($backLessonUrl) ?>" class="reading-back-btn">
            <i class="fas fa-arrow-left" aria-hidden="true"></i> Return to ELA Lesson
        </a>
        <a href="/library/" class="reading-back-btn">
            <i class="fas fa-book" aria-hidden="true"></i> Explore Digital Library
        </a>
    </div>

</div>

<script>
let currentFontSize = 18;
function adjustReadingFontSize(delta) {
    currentFontSize = Math.max(14, Math.min(28, currentFontSize + (delta * 2)));
    const stream = document.getElementById('reading-content-body');
    if (stream) {
        stream.style.fontSize = currentFontSize + 'px';
    }
}

function toggleReadingDyslexicFont() {
    const stream = document.getElementById('reading-content-body');
    const btn = document.getElementById('btn-dyslexia');
    if (!stream) return;
    if (stream.style.fontFamily.includes('OpenDyslexic')) {
        stream.style.fontFamily = '';
        if (btn) btn.classList.remove('active');
    } else {
        stream.style.fontFamily = "'OpenDyslexic', sans-serif";
        if (btn) btn.classList.add('active');
    }
}

let isSpeaking = false;
function toggleReadAloud() {
    if (!('speechSynthesis' in window)) {
        alert('Web Speech Synthesis is not supported in this browser.');
        return;
    }
    const label = document.getElementById('read-aloud-label');
    const btn = document.getElementById('btn-read-aloud');
    if (isSpeaking) {
        window.speechSynthesis.cancel();
        isSpeaking = false;
        if (label) label.textContent = 'Read Aloud';
        if (btn) btn.classList.remove('active');
    } else {
        const stream = document.getElementById('reading-content-body');
        if (!stream) return;
        const text = stream.innerText;
        const utter = new SpeechSynthesisUtterance(text);
        utter.rate = 0.95;
        utter.onend = () => {
            isSpeaking = false;
            if (label) label.textContent = 'Read Aloud';
            if (btn) btn.classList.remove('active');
        };
        utter.onerror = () => {
            isSpeaking = false;
            if (label) label.textContent = 'Read Aloud';
            if (btn) btn.classList.remove('active');
        };
        window.speechSynthesis.speak(utter);
        isSpeaking = true;
        if (label) label.textContent = 'Pause Reading';
        if (btn) btn.classList.add('active');
    }
}
</script>

