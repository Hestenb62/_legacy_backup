<?php
/**
 * Crossword Puzzle Studio
 * File: pages/crossword.php
 * Standalone, accessible, printable crossword puzzle generator for Parents & Teachers.
 */

$pageTitle       = "Crossword Puzzle Studio - Hesten's Learning";
$pageDescription = "Create customized academic crossword puzzles from vocabulary terms and definitions. Includes dyslexia-friendly fonts, interactive keyboard play, and clean 8.5\" x 11\" PDF worksheets with answer keys.";
$pageKeywords    = "crossword generator, crossword puzzle, vocabulary worksheet, homeschool printable, teacher crossword, spelling puzzle, common core vocabulary, dyslexia friendly";

include __DIR__ . '/../src/header.php';
?>

<!-- Crossword Studio Stylesheet -->
<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/crossword.css') : '/assets/css/pages/crossword.css' ?>">

<main id="main-content" class="flex-grow">
    <!-- Hero Banner (Hidden in Print) -->
    <div class="page-hero no-print" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%); color: #ffffff; padding: 3.5rem 1rem 3rem 1rem; text-align: center;">
        <div class="page-hero-bg" aria-hidden="true" style="position: absolute; inset: 0; pointer-events: none; opacity: 0.12;">
            <i class="fas fa-pen-nib" style="position: absolute; top: 1.5rem; left: 3rem; font-size: 7rem;"></i>
            <i class="fas fa-th-large" style="position: absolute; bottom: 1rem; right: 4rem; font-size: 8rem; transform: rotate(-10deg);"></i>
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
                    <li style="color: #ffffff; font-weight: 700;" aria-current="page">Crossword Studio</li>
                </ol>
            </nav>

            <span style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.25); color: #ffffff; font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.3rem 0.8rem; border-radius: 9999px; margin-bottom: 0.85rem;">
                <i class="fas fa-pen-nib"></i> Parent &amp; Educator Studio
            </span>

            <h1 style="font-family: var(--font-display, 'Outfit', sans-serif); font-size: clamp(2rem, 4vw, 2.85rem); font-weight: 800; line-height: 1.15; margin: 0 0 1rem 0; letter-spacing: -0.02em;">
                Crossword Puzzle Studio
            </h1>

            <p style="font-size: clamp(1rem, 1.8vw, 1.15rem); color: #e0e7ff; max-width: 760px; margin: 0 auto 1.75rem auto; line-height: 1.6; font-weight: 400;">
                Generate customized, curriculum-aligned crossword puzzles from vocabulary words and definitions. Solve interactively with auto-advancing keyboard navigation, or print clean 8.5" &times; 11" student worksheets and educator answer keys.
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
        <div id="crossword-app-container">
            <!-- Studio instantiated via JS -->
            <div style="text-align: center; padding: 3rem; color: var(--color-text-muted);">
                <i class="fas fa-spinner fa-spin fa-2x" style="color: var(--color-primary);"></i>
                <p style="margin-top: 1rem;">Loading Crossword Studio...</p>
            </div>
        </div>
    </div>
</main>

<!-- Load Crossword Generator Engine -->
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/crossword-generator.js') : '/assets/js/components/crossword-generator.js' ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.HLCrosswordStudio === 'function') {
            const studio = new window.HLCrosswordStudio('crossword-app-container', {
                defaultPreset: 'math-elem'
            });

            // Check URL parameters for direct preset or sharing
            const params = new URLSearchParams(window.location.search);
            const presetParam = params.get('preset');
            const titleParam = params.get('title');

            if (presetParam) {
                studio.loadPreset(presetParam);
            }
            if (titleParam) {
                const titleInput = document.getElementById('cw-input-title');
                if (titleInput) {
                    titleInput.value = titleParam;
                    studio.state.title = titleParam;
                }
            }
        }
    });
</script>

<?php include __DIR__ . '/../src/footer.php'; ?>
