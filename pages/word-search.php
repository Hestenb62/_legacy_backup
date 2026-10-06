<?php
/**
 * Word Search & Vocabulary Puzzle Studio
 * File: pages/word-search.php
 * Standalone, accessible, printable puzzle generator for Parents & Teachers.
 */

$pageTitle       = "Word Search & Vocabulary Studio - Hesten's Learning";
$pageDescription = "Generate customized academic word searches, spelling puzzles, and classroom answer keys. Includes dyslexia-friendly fonts, interactive play, and clean 8.5\" x 11\" PDF worksheets.";
$pageKeywords    = "word search generator, spelling puzzle, vocabulary worksheet, homeschool printable, teacher puzzle, phonics, common core vocabulary, dyslexia friendly";

include __DIR__ . '/../src/header.php';
?>

<!-- Word Search Studio Stylesheet -->
<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/word-search.css') : '/assets/css/pages/word-search.css' ?>">

<main id="main-content" class="flex-grow">
    <!-- Hero Banner (Hidden in Print) -->
    <div class="page-hero no-print" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #312e81 0%, #4338ca 50%, #4f46e5 100%); color: #ffffff; padding: 3.5rem 1rem 3rem 1rem; text-align: center;">
        <div class="page-hero-bg" aria-hidden="true" style="position: absolute; inset: 0; pointer-events: none; opacity: 0.12;">
            <i class="fas fa-th" style="position: absolute; top: 1.5rem; left: 3rem; font-size: 7rem;"></i>
            <i class="fas fa-spell-check" style="position: absolute; bottom: 1rem; right: 4rem; font-size: 8rem; transform: rotate(12deg);"></i>
        </div>

        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 10;">
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumbs" style="margin-bottom: 1.25rem;">
                <ol style="list-style: none; padding: 0; margin: 0; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; background: rgba(255, 255, 255, 0.12); padding: 0.35rem 0.85rem; border-radius: 9999px; backdrop-filter: blur(8px);">
                    <li><a href="/" style="color: #c7d2fe; text-decoration: none;"><i class="fas fa-home"></i> Home</a></li>
                    <li style="color: #a5b4fc;">/</li>
                    <li><a href="/pages/parents.php" style="color: #c7d2fe; text-decoration: none;">Parent Hub</a></li>
                    <li style="color: #a5b4fc;">/</li>
                    <li><a href="/pages/teachers.php" style="color: #c7d2fe; text-decoration: none;">Teacher Suite</a></li>
                    <li style="color: #a5b4fc;">/</li>
                    <li style="color: #ffffff; font-weight: 700;" aria-current="page">Word Search Studio</li>
                </ol>
            </nav>

            <span style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.25); color: #ffffff; font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.3rem 0.8rem; border-radius: 9999px; margin-bottom: 0.85rem;">
                <i class="fas fa-th"></i> Parent &amp; Educator Studio
            </span>

            <h1 style="font-family: var(--font-display, 'Outfit', sans-serif); font-size: clamp(2rem, 4vw, 2.85rem); font-weight: 800; line-height: 1.15; margin: 0 0 1rem 0; letter-spacing: -0.02em;">
                Word Search &amp; Vocabulary Puzzle Studio
            </h1>

            <p style="font-size: clamp(1rem, 1.8vw, 1.15rem); color: #e0e7ff; max-width: 760px; margin: 0 auto 1.75rem auto; line-height: 1.6; font-weight: 400;">
                Design custom, curriculum-aligned spelling and vocabulary puzzles in seconds. Play interactively with keyboard and audio assistance, or print clean 8.5" &times; 11" student worksheets and teacher answer keys.
            </p>

            <!-- Quick Capabilities Badges -->
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 0.6rem; font-size: 0.85rem;">
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(0, 0, 0, 0.25); padding: 0.35rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.15); color: #f8fafc;">
                    <i class="fas fa-print" style="color: #34d399;"></i> 8.5" &times; 11" Print Ready
                </span>
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(0, 0, 0, 0.25); padding: 0.35rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.15); color: #f8fafc;">
                    <i class="fas fa-check-double" style="color: #fbbf24;"></i> Educator Answer Keys
                </span>
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(0, 0, 0, 0.25); padding: 0.35rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.15); color: #f8fafc;">
                    <i class="fas fa-universal-access" style="color: #60a5fa;"></i> Dyslexia &amp; UDL Support
                </span>
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(0, 0, 0, 0.25); padding: 0.35rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.15); color: #f8fafc;">
                    <i class="fas fa-wifi" style="color: #c084fc;"></i> 100% Offline &amp; Free
                </span>
            </div>
        </div>
    </div>

    <!-- Main Workspace Container -->
    <div style="max-width: 1320px; margin: 2rem auto; padding: 0 1rem;">
        <div id="word-search-app-container">
            <!-- Studio instantiated via JS -->
            <div style="text-align: center; padding: 3rem; color: var(--color-text-muted);">
                <i class="fas fa-spinner fa-spin fa-2x" style="color: var(--color-primary);"></i>
                <p style="margin-top: 1rem;">Loading Word Search Studio...</p>
            </div>
        </div>
    </div>
</main>

<!-- Load Word Search Generator Engine -->
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/word-search-generator.js') : '/assets/js/components/word-search-generator.js' ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.HLWordSearchStudio === 'function') {
            const studio = new window.HLWordSearchStudio('word-search-app-container', {
                defaultGridSize: 12,
                defaultDifficulty: 'medium',
                defaultPreset: 'math-elem'
            });

            // Check URL parameters for direct preset or custom word loading
            const params = new URLSearchParams(window.location.search);
            const presetParam = params.get('preset');
            const wordsParam = params.get('words');
            const titleParam = params.get('title');
            const sizeParam = params.get('size');
            const diffParam = params.get('diff');

            if (presetParam) {
                studio.loadPreset(presetParam);
            } else if (wordsParam) {
                const wordsInput = document.getElementById('ws-words-input');
                const titleInput = document.getElementById('ws-input-title');
                const sizeSelect = document.getElementById('ws-grid-size');
                const diffSelect = document.getElementById('ws-difficulty');

                if (wordsInput) wordsInput.value = wordsParam;
                if (titleInput && titleParam) titleInput.value = titleParam;
                if (sizeSelect && sizeParam) sizeSelect.value = sizeParam;
                if (diffSelect && diffParam) diffSelect.value = diffParam;

                studio.updateWordCountBadge();
                studio.generateFromInputs();
            }
        }
    });
</script>

<?php include __DIR__ . '/../src/footer.php'; ?>
