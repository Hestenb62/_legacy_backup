<?php
// Core HTTP Security Headers
if (!headers_sent()) {
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: SAMEORIGIN");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Permissions-Policy: geolocation=(), camera=()");
}

// Ensure this script is not executed directly.
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// Function to fetch the current user dynamically
if (!function_exists('getCurrentUser')) {
    function getCurrentUser() {
        return [
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => 'student',
            'avatar' => '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png'
        ];
    }
}

$currentUser = getCurrentUser();

// Helper to append dynamic filemtime for automatic cache busting
if (!function_exists('assetVersion')) {
    /**
     * Appends dynamic filemtime for automatic cache busting.
     *
     * @param string $relPath Relative path to the asset.
     * @return string Versioned asset URL path.
     */
    function assetVersion(string $relPath): string {
        $cleanPath = ltrim(explode('?', $relPath)[0], '/');
        $fullPath = rtrim(ABSPATH, '/\\') . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $cleanPath);
        if (file_exists($fullPath)) {
            return '/' . $cleanPath . '?v=' . filemtime($fullPath);
        }
        return '/' . $cleanPath . '?v=1.4';
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <script>
        (function() {
            try {
                const settings = localStorage.getItem('hl_accessibility_settings');
                if (settings) {
                    const parsed = JSON.parse(settings);
                    if (parsed.theme) {
                        document.documentElement.setAttribute('data-theme', parsed.theme);
                    }
                }
            } catch (e) {}
        })();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $siteBaseTitle = "Hesten's Learning";
    $finalPageTitle = !empty($pageTitle) ? htmlspecialchars($pageTitle) : $siteBaseTitle;
    $finalPageDesc = !empty($pageDescription) ? htmlspecialchars($pageDescription) : "Empowering students through accessible, custom educational levels and tools.";
    $finalOgImage = !empty($ogImage) ? htmlspecialchars($ogImage) : "/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png";
    $currentHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $currentUri = $_SERVER['REQUEST_URI'] ?? '/';
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    $currentUrl = ($isHttps ? "https" : "http") . "://" . $currentHost . $currentUri;
    ?>
    <title><?= $finalPageTitle ?></title>
    <meta name="description" content="<?= $finalPageDesc ?>">
    <link rel="canonical" href="<?= htmlspecialchars($currentUrl) ?>">

    <!-- OpenGraph & Social Sharing Meta Tags -->
    <meta property="og:title" content="<?= $finalPageTitle ?>">
    <meta property="og:description" content="<?= $finalPageDesc ?>">
    <meta property="og:image" content="<?= $finalOgImage ?>">
    <meta property="og:url" content="<?= htmlspecialchars($currentUrl) ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= $finalPageTitle ?>">
    <meta name="twitter:description" content="<?= $finalPageDesc ?>">
    <meta name="twitter:image" content="<?= $finalOgImage ?>">

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">
    
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <link rel="shortcut icon" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">

    <!-- Preconnect Resource Hints for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- MathJax On-Demand / Conditional Loader -->
    <script>
        window.MathJax = window.MathJax || {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']],
                processEscapes: true
            },
            options: {
                enableMenu: false,          // Disables right-click context menu
                enableExplorer: false,      // Disables Expression Explorer
                enableExplorerHelp: false,  // Disables Expression Explorer Help popup
                enableSpeech: false,        // Disables Speech generator
                enableBraille: false,       // Disables Braille generator
                enableComplexity: false,    // Disables Complexity analysis
                enableEnrichment: false     // Disables a11y semantic enrichment
            },
            svg: { fontCache: 'global' }
        };

        // Site-wide safety remover for any MathJax dialog or Expression Explorer elements
        (function() {
            const removeMathJaxDialogs = () => {
                document.querySelectorAll('mjx-dialog, .mjx-dialog, [id*="mjx-dialog"], [aria-labelledby*="mjx-dialog"]').forEach(el => el.remove());
            };
            if (window.MutationObserver) {
                new MutationObserver(mutations => {
                    for (const m of mutations) {
                        for (const node of m.addedNodes) {
                            if (node.nodeType === 1) {
                                if (node.matches && node.matches('mjx-dialog, .mjx-dialog, [id*="mjx-dialog"], [aria-labelledby*="mjx-dialog"]')) {
                                    node.remove();
                                } else if (node.querySelector) {
                                    node.querySelectorAll('mjx-dialog, .mjx-dialog, [id*="mjx-dialog"], [aria-labelledby*="mjx-dialog"]').forEach(el => el.remove());
                                }
                            }
                        }
                    }
                }).observe(document.documentElement, { childList: true, subtree: true });
            }
        })();

        let mathJaxTypesetQueue = Promise.resolve();

        window.ensureMathJax = function(elements) {
            return new Promise((resolve, reject) => {
                const onReady = (mj) => {
                    if (mj && mj.typesetPromise && !mj._dyscalculiaHooked) {
                        mj._dyscalculiaHooked = true;
                        const origTypeset = mj.typesetPromise.bind(mj);
                        mj.typesetPromise = function(elems) {
                            return origTypeset(elems).then(res => {
                                if (window.accommodationEngine && window.accommodationEngine.profile && window.accommodationEngine.profile.dyscalculiaEnabled) {
                                    window.accommodationEngine.colorizeMathSymbols();
                                }
                                return res;
                            });
                        };
                    }

                    // Sequentially queue typesetting to prevent promise collisions
                    const doTypeset = () => {
                        if (mj && mj.typesetPromise) {
                            const targets = elements ? (Array.isArray(elements) ? elements : [elements]) : null;
                            mathJaxTypesetQueue = mathJaxTypesetQueue.then(() => {
                                return mj.typesetPromise(targets);
                            }).catch(err => {
                                console.debug('MathJax sequential typeset note:', err);
                            });
                        }
                    };

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', doTypeset);
                    } else {
                        doTypeset();
                    }

                    if (window.accommodationEngine && window.accommodationEngine.profile && window.accommodationEngine.profile.dyscalculiaEnabled) {
                        setTimeout(() => window.accommodationEngine.colorizeMathSymbols(), 120);
                    }
                    resolve(mj);
                };

                if (window.MathJax && window.MathJax.typesetPromise) {
                    onReady(window.MathJax);
                    return;
                }

                const existing = document.getElementById('MathJax-script');
                if (existing) {
                    let waitTries = 0;
                    const waitPoll = setInterval(() => {
                        if (window.MathJax && window.MathJax.typesetPromise) {
                            clearInterval(waitPoll);
                            onReady(window.MathJax);
                        } else if (++waitTries > 80) {
                            clearInterval(waitPoll);
                            if (window.MathJax && window.MathJax.typesetPromise) onReady(window.MathJax);
                            else reject(new Error('MathJax load timeout'));
                        }
                    }, 50);
                    return;
                }

                const loadScriptWithFallback = (src, fallbackSrc) => {
                    const script = document.createElement('script');
                    script.id = 'MathJax-script';
                    script.async = true;
                    script.src = src;
                    script.onload = () => {
                        let tries = 0;
                        const poll = setInterval(() => {
                            if (window.MathJax && window.MathJax.typesetPromise) {
                                clearInterval(poll);
                                onReady(window.MathJax);
                            } else if (++tries > 100) {
                                clearInterval(poll);
                                onReady(window.MathJax);
                            }
                        }, 50);
                    };
                    script.onerror = () => {
                        if (fallbackSrc) {
                            console.warn('[MathJax] Local bundle load failed, attempting CDN fallback...');
                            script.remove();
                            loadScriptWithFallback(fallbackSrc, null);
                        } else {
                            reject(new Error('MathJax script failed to load.'));
                        }
                    };
                    document.head.appendChild(script);
                };

                loadScriptWithFallback(
                    '<?= assetVersion('/assets/js/mathjax-4.1.3/tex-svg.js') ?>',
                    'https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.2.2/es5/tex-svg.js'
                );
            });
        };

        // Universal Math Notation Delimiter Pattern
        const MATH_DELIM_PATTERN = /\$\$[\s\S]+?\$\$|\$[^$\n]+\$|\\\[[\s\S]+?\\\]|\\\([\s\S]+?\\\)|\begin\{[a-zA-Z*]+\}/;

        // Static Page Math Auto-Detection
        document.addEventListener('DOMContentLoaded', () => {
            const bodyText = document.body ? (document.body.innerText || '') : '';
            if (MATH_DELIM_PATTERN.test(bodyText)) {
                window.ensureMathJax();
            }
        });

        // Dynamic Mutation Observer for Asynchronously Injected Math Notation
        if (window.MutationObserver) {
            let mathObserverDebounce = null;
            new MutationObserver((mutations) => {
                let hasMath = false;
                const candidates = [];
                for (const m of mutations) {
                    for (const node of m.addedNodes) {
                        if (node.nodeType === 1 && !node.matches('mjx-container, mjx-container *, script, style')) {
                            const text = node.textContent || '';
                            if (MATH_DELIM_PATTERN.test(text)) {
                                hasMath = true;
                                candidates.push(node);
                            }
                        }
                    }
                }
                if (hasMath) {
                    clearTimeout(mathObserverDebounce);
                    mathObserverDebounce = setTimeout(() => {
                        window.ensureMathJax(candidates.length === 1 ? candidates[0] : null);
                    }, 60);
                }
            }).observe(document.documentElement, { childList: true, subtree: true });
        }
    </script>
    <?php 
    // Auto-detect math lessons/pages if not explicitly flagged
    if (empty($requiresMathJax)) {
        $checkUri = $_SERVER['REQUEST_URI'] ?? '';
        $checkQuery = $_SERVER['QUERY_STRING'] ?? '';
        if (
            str_contains($checkUri, 'math') ||
            str_contains($checkQuery, 'math') ||
            (!empty($lessonId) && str_contains($lessonId, 'math'))
        ) {
            $requiresMathJax = true;
        }
    }
    ?>
    <?php if (!empty($requiresMathJax)): ?>
        <script>window.ensureMathJax();</script>
    <?php endif; ?>

    <style>
        /* CSS Cascade Layers Definition (Vanilla CSS Architecture) */
        @layer reset, tokens, base, primitives, components, utilities, overrides;
    </style>

    <!-- Custom Modern Styles (Vanilla CSS Architecture with Dynamic Cache-Busting) -->
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/global-tokens.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/global-reset.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/global-primitives.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/global-components.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/components/fixed-tools.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/components/command-palette.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/components/shortcuts-modal.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/components/quest-badges.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/components/accommodations.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/layouts/header.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/layouts/footer.css') ?>">
    <link rel="stylesheet" href="<?= assetVersion('/assets/css/layouts/print.css') ?>" media="print">
</head>

<body>
    <!-- Skip Navigation Link (WCAG 2.4.1) -->
    <a href="#main-content" class="skip-link sr-only sr-only-focusable">Skip to main content</a>

    <!-- Global Screen Reader Live Region for Accessibility Announcements -->
    <div id="a11y-live-region" class="sr-only" aria-live="polite" aria-atomic="true"></div>

    <!-- Fixed Tools & Overlays -->
    <?php include __DIR__ . '/partials/fixed-tools.php'; ?>
    <?php include __DIR__ . '/partials/command-palette.php'; ?>
    <?php include __DIR__ . '/partials/shortcuts-modal.php'; ?>
    <!-- Interactive Panels -->
    <?php include __DIR__ . '/partials/timer.php'; ?>
    <?php include __DIR__ . '/partials/scratchpad.php'; ?>
    <?php include __DIR__ . '/partials/citation.php'; ?>
    <?php include __DIR__ . '/partials/flashcard-studio.php'; ?>
    <?php include __DIR__ . '/partials/quest-badges-modal.php'; ?>
    <?php include __DIR__ . '/partials/accommodations-modal.php'; ?>

    <!-- Scroll Progress Indicator -->
    <div class="scroll-progress-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 3px; z-index: 100;">
        <div class="scroll-progress-bar" id="scroll-bar" style="height: 100%; background: var(--color-primary); width: 0%;"></div>
    </div>

    <!-- Accessibility Settings Panel -->
    <?php include __DIR__ . '/partials/a11y-settings.php'; ?>
    <?php include __DIR__ . '/partials/reading-mask.php'; ?>
    <?php include __DIR__ . '/partials/overhaul-modal.php'; ?>
    <?php include __DIR__ . '/partials/announcement-bar.php'; ?>

    <header class="header-main">
        <div class="container">
            <nav class="header-nav">
                <a class="header-brand" href="/">
                    <img src="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Logo" class="header-brand-icon" style="background: none; box-shadow: none; padding: 0;">
                    <span class="header-brand-text">Hesten's Learning</span>
                </a>
                
                <button id="nav-toggle" class="mobile-menu-btn" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="nav-content">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="header-nav-content" id="nav-content">
                    <div class="header-nav-links">
                        <a href="/" class="nav-link"><i class="fas fa-home" style="margin-right: 0.25rem; opacity: 0.7;"></i> Home</a>
                        <a href="/assessment" class="nav-link"><i class="fas fa-tasks" style="margin-right: 0.25rem; opacity: 0.7;"></i> Assessment</a>
                        <a href="/library/" class="nav-link"><i class="fas fa-book" style="margin-right: 0.25rem; opacity: 0.7;"></i> Library</a>

                        <!-- Expandable Resources Dropdown Menu -->
                        <div class="nav-dropdown-container" id="resources-dropdown-container">
                            <button type="button" class="nav-link nav-dropdown-btn" id="resources-dropdown-btn" aria-expanded="false" aria-haspopup="true" aria-controls="resources-dropdown-menu">
                                <i class="fas fa-th-large" style="margin-right: 0.35rem; opacity: 0.75;" aria-hidden="true"></i>
                                <span>Resources</span>
                                <i class="fas fa-chevron-down nav-chevron" id="resources-nav-chevron" aria-hidden="true"></i>
                            </button>

                            <div class="nav-mega-dropdown" id="resources-dropdown-menu" role="menu" aria-labelledby="resources-dropdown-btn">
                                <div class="nav-mega-grid">
                                    <!-- Column 1: Books & Library -->
                                    <div class="nav-mega-col">
                                        <span class="nav-mega-col-title">
                                            <i class="fas fa-book-open" style="color: #10b981;"></i> Books &amp; Library
                                        </span>
                                        <ul class="nav-mega-list">
                                            <li>
                                                <a href="/library/index.php" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-archive item-icon" style="color: #10b981;"></i>
                                                    <div>
                                                        <span class="item-title">Digital Library Catalog</span>
                                                        <span class="item-desc">Browse full literature collection</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/library/read/?book=the-time-machine" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-clock item-icon" style="color: #06b6d4;"></i>
                                                    <div>
                                                        <span class="item-title">The Time Machine</span>
                                                        <span class="item-desc">H.G. Wells classic sci-fi</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/library/read/?book=frankenstein" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-bolt item-icon" style="color: #8b5cf6;"></i>
                                                    <div>
                                                        <span class="item-title">Frankenstein</span>
                                                        <span class="item-desc">Mary Shelley gothic classic</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/library/read/?book=the-american-yawp" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-landmark item-icon" style="color: #f59e0b;"></i>
                                                    <div>
                                                        <span class="item-title">The American Yawp</span>
                                                        <span class="item-desc">Open U.S. history reader</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Column 2: Assessment by Grade -->
                                    <div class="nav-mega-col">
                                        <span class="nav-mega-col-title">
                                            <i class="fas fa-tasks" style="color: #3b82f6;"></i> Assessments
                                        </span>
                                        <ul class="nav-mega-list">
                                            <li>
                                                <a href="/assessment/diagnostic.php" class="nav-mega-item featured-item" role="menuitem">
                                                    <i class="fas fa-brain item-icon" style="color: #ec4899;"></i>
                                                    <div>
                                                        <span class="item-title">Adaptive Diagnostic</span>
                                                        <span class="item-desc">AI growth &amp; placement</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/assessment/index.php#elem" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-shapes item-icon" style="color: #10b981;"></i>
                                                    <div>
                                                        <span class="item-title">Early &amp; Kindergarten</span>
                                                        <span class="item-desc">Phonics &amp; basic numbers</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/assessment/index.php#elem" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-pencil-ruler item-icon" style="color: #3b82f6;"></i>
                                                    <div>
                                                        <span class="item-title">Elementary (Grades 1–5)</span>
                                                        <span class="item-desc">Math sprints &amp; reading check</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/assessment/index.php#middle" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-calculator item-icon" style="color: #f97316;"></i>
                                                    <div>
                                                        <span class="item-title">Middle School (6–8)</span>
                                                        <span class="item-desc">Pre-algebra &amp; text analysis</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/assessment/index.php#high" class="nav-mega-item" role="menuitem">
                                                    <i class="fas fa-graduation-cap item-icon" style="color: #8b5cf6;"></i>
                                                    <div>
                                                        <span class="item-title">High School (9–12)</span>
                                                        <span class="item-desc">Algebra 1, bio &amp; chem</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Column 3: Quick Curriculum Levels -->
                                    <div class="nav-mega-col">
                                        <span class="nav-mega-col-title">
                                            <i class="fas fa-layer-group" style="color: #8b5cf6;"></i> Curriculum Levels
                                        </span>
                                        <ul class="nav-mega-list">
                                            <li>
                                                <a href="/levels/a.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-teal">Level A</span>
                                                    <div>
                                                        <span class="item-title">Pre-K Readiness</span>
                                                        <span class="item-desc">Early foundational skills</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/levels/b.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-blue">Level B</span>
                                                    <div>
                                                        <span class="item-title">Kindergarten</span>
                                                        <span class="item-desc">Early math &amp; phonics</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/levels/g.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-green">Level G</span>
                                                    <div>
                                                        <span class="item-title">5th Grade Mastery</span>
                                                        <span class="item-desc">Fractions &amp; ecosystems</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/levels/k.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-purple">Level K</span>
                                                    <div>
                                                        <span class="item-title">9th Grade High School</span>
                                                        <span class="item-desc">Algebra 1 &amp; literature</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/levels/ap-us-history.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-amber">AP</span>
                                                    <div>
                                                        <span class="item-title">AP U.S. History</span>
                                                        <span class="item-desc">College-prep curriculum</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/levels/practice-ged.php" class="nav-mega-item" role="menuitem">
                                                    <span class="level-tag tag-rose">GED</span>
                                                    <div>
                                                        <span class="item-title">Practice GED Prep</span>
                                                        <span class="item-desc">Equivalency exam suite</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Footer bar inside mega menu -->
                                <div class="nav-mega-footer">
                                    <a href="/pages/standards.php" class="nav-mega-footer-link">
                                        <i class="fas fa-book"></i> Standards Explorer
                                    </a>
                                    <a href="/student/interactive-labs.php" class="nav-mega-footer-link">
                                        <i class="fas fa-flask"></i> Interactive Labs
                                    </a>
                                    <a href="/research/" class="nav-mega-footer-link">
                                        <i class="fas fa-microscope"></i> Research Papers
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="header-actions">
                        <button type="button" class="header-icon-action" id="btn-header-breathe" onclick="if(window.HLSensory)window.HLSensory.open();" title="Sensory Breathe &amp; Reset (Alt+B)" aria-label="Sensory Breathe &amp; Reset (Alt+B)" style="display:inline-flex; align-items:center; justify-content:center; width:2.25rem; height:2.25rem; border-radius:9999px; background:var(--color-bg-surface); border:1px solid var(--color-border); color:var(--color-text-main); cursor:pointer;">
                            <i class="fas fa-spa" style="color:#0ea5e9;"></i>
                        </button>
                        <button type="button" class="header-icon-action" id="btn-header-sound" onclick="if(window.HLSound){const m=window.HLSound.toggleMute();this.innerHTML=m?'<i class=\'fas fa-volume-mute\' style=\'color:#94a3b8;\'></i>':'<i class=\'fas fa-volume-up\' style=\'color:#10b981;\'></i>';}" title="Toggle Sound Feedback" aria-label="Toggle Sound Feedback" style="display:inline-flex; align-items:center; justify-content:center; width:2.25rem; height:2.25rem; border-radius:9999px; background:var(--color-bg-surface); border:1px solid var(--color-border); color:var(--color-text-main); cursor:pointer;">
                            <i class="fas fa-volume-up" style="color:#10b981;"></i>
                        </button>
                        
                        <div class="user-dropdown-container">
                            <button class="user-pill" id="user-pill-btn" aria-expanded="false" aria-haspopup="true" aria-controls="user-dropdown-menu">
                                <img src="<?php echo htmlspecialchars($currentUser['avatar']); ?>" alt="User" class="user-avatar" onerror="this.src='https://ui-avatars.com/api/?name=User&background=random'">
                                <div class="user-info">
                                    <span class="user-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                                    <span class="user-role"><?php echo htmlspecialchars($currentUser['role']); ?></span>
                                </div>
                                <i class="fas fa-chevron-down user-chevron"></i>
                            </button>
                            <div class="user-dropdown-menu" id="user-dropdown-menu">
                                <a href="#" class="dropdown-item" onclick="if(window.HLProfileSwitcher)window.HLProfileSwitcher.open();return false;"><i class="fas fa-users-cog" style="color:#3b82f6;"></i> Switch Profile...</a>
                                <a href="#" class="dropdown-item" onclick="if(window.HLSensory)window.HLSensory.open();return false;"><i class="fas fa-spa" style="color:#0ea5e9;"></i> Breathe &amp; Reset</a>
                                <div class="dropdown-divider"></div>
                                <a href="/pages/profile.php" class="dropdown-item"><i class="fas fa-user"></i> Profile</a>
                                <a href="/pages/settings.php" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        
                        <!-- Client-side script to load user preferences from localStorage -->
                        <script>
                            (function() {
                                try {
                                    const savedProfile = localStorage.getItem('hesten-user-profile');
                                    if (savedProfile) {
                                        const profile = JSON.parse(savedProfile);
                                        const nameEl = document.querySelector('.user-name');
                                        const avatarEls = document.querySelectorAll('.user-avatar');
                                        
                                        if (nameEl && profile.firstName) {
                                            nameEl.textContent = profile.firstName;
                                        }
                                        if (avatarEls.length > 0 && profile.avatarData) {
                                            avatarEls.forEach(img => img.src = profile.avatarData);
                                        }
                                    }
                                } catch (e) {
                                    console.error('Error loading user profile:', e);
                                }
                            })();
                        </script>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <script src="<?= assetVersion('/assets/js/global-a11y.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/global-core-ui.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/universal-bookmarks.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/command-palette.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/global-shortcuts.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/header-search-autocomplete.js') ?>"></script>
    <script src="<?= assetVersion('/assets/js/offline-status.js') ?>"></script>
    <script>
        const navToggle = document.getElementById('nav-toggle');
        if (navToggle) {
            navToggle.addEventListener('click', function() {
                var nav = document.getElementById('nav-content');
                if (nav.style.display === 'none' || nav.style.display === '') {
                    nav.style.display = 'flex';
                    this.setAttribute('aria-expanded', 'true');
                } else {
                    if (window.innerWidth < 1024) {
                        nav.style.display = 'none';
                    }
                    this.setAttribute('aria-expanded', 'false');
                }
            });
        }
        
        window.addEventListener('resize', function() {
            var nav = document.getElementById('nav-content');
            const navToggle = document.getElementById('nav-toggle');
            if (window.innerWidth >= 1024) {
                nav.style.display = 'flex';
                if (navToggle) navToggle.setAttribute('aria-expanded', 'true');
            } else {
                nav.style.display = 'none';
                if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // User Dropdown Logic
        const userBtn = document.getElementById('user-pill-btn');
        const userMenu = document.getElementById('user-dropdown-menu');
        const resBtn = document.getElementById('resources-dropdown-btn');
        const resMenu = document.getElementById('resources-dropdown-menu');
        const resContainer = document.getElementById('resources-dropdown-container');

        if (userBtn && userMenu) {
            userBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const active = userMenu.classList.toggle('active');
                userBtn.setAttribute('aria-expanded', active ? 'true' : 'false');
                if (active && resMenu) {
                    resMenu.classList.remove('active');
                    if (resBtn) resBtn.setAttribute('aria-expanded', 'false');
                }
            });
            document.addEventListener('click', function(e) {
                if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                    userBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // Resources Expandable Dropdown Logic
        if (resBtn && resMenu) {
            const repositionMegaMenu = function() {
                if (window.innerWidth < 1024) {
                    resMenu.style.left = '';
                    resMenu.style.right = '';
                    return;
                }
                
                // Reset left offset to measure natural layout
                resMenu.style.left = '0px';
                resMenu.style.right = 'auto';

                const rect = resMenu.getBoundingClientRect();
                const padding = 16;
                const viewportWidth = window.innerWidth;

                // If menu extends past right edge of the screen, shift it left
                if (rect.right > viewportWidth - padding) {
                    const overflowRight = rect.right - (viewportWidth - padding);
                    resMenu.style.left = `-${overflowRight}px`;
                }

                // Safety check: ensure left edge doesn't get pushed off-screen to the left
                const updatedRect = resMenu.getBoundingClientRect();
                if (updatedRect.left < padding) {
                    const currentLeft = parseFloat(resMenu.style.left || '0');
                    const underflowLeft = padding - updatedRect.left;
                    resMenu.style.left = `${currentLeft + underflowLeft}px`;
                }
            };

            const toggleResMenu = function(forceState) {
                const isCurrentlyActive = resMenu.classList.contains('active');
                const willBeActive = typeof forceState === 'boolean' ? forceState : !isCurrentlyActive;
                if (willBeActive) {
                    resMenu.classList.add('active');
                    resBtn.setAttribute('aria-expanded', 'true');
                    repositionMegaMenu();
                    // Close user menu if open
                    if (userMenu && userMenu.classList.contains('active')) {
                        userMenu.classList.remove('active');
                        if (userBtn) userBtn.setAttribute('aria-expanded', 'false');
                    }
                } else {
                    resMenu.classList.remove('active');
                    resBtn.setAttribute('aria-expanded', 'false');
                    resMenu.style.left = '';
                    resMenu.style.right = '';
                }
            };

            resBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleResMenu();
            });

            // Adjust position if window is resized while open
            window.addEventListener('resize', function() {
                if (resMenu.classList.contains('active')) {
                    repositionMegaMenu();
                }
            });

            // Keyboard accessibility (Escape key closes and returns focus)
            resBtn.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    toggleResMenu(false);
                    resBtn.focus();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && resMenu.classList.contains('active')) {
                    toggleResMenu(false);
                    resBtn.focus();
                }
            });

            // Outside click dismissal
            document.addEventListener('click', function(e) {
                if (resContainer && !resContainer.contains(e.target)) {
                    toggleResMenu(false);
                }
            });
        }
    </script>

    <!-- Global Spotlight Search & Command Palette Modal (Ctrl+K) -->
    <div id="global-command-palette" class="cmd-palette-overlay" role="dialog" aria-modal="true" aria-label="Command Palette">
        <div class="cmd-palette-modal">
            <div class="cmd-search-header">
                <i class="fas fa-search cmd-search-icon"></i>
                <input type="text" id="cmd-search-input" class="cmd-search-input" placeholder="Search lessons, standards, tools, books, or portals..." autocomplete="off" spellcheck="false">
                <button type="button" id="cmd-close-btn" class="cmd-close-btn" aria-label="Close Command Palette">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="cmd-filters-bar">
                <button type="button" class="cmd-filter-pill active" data-filter="all">All</button>
                <button type="button" class="cmd-filter-pill" data-filter="curriculum">Curriculum</button>
                <button type="button" class="cmd-filter-pill" data-filter="teacher">Teacher</button>
                <button type="button" class="cmd-filter-pill" data-filter="parent">Parent</button>
                <button type="button" class="cmd-filter-pill" data-filter="assessment">Assessment</button>
                <button type="button" class="cmd-filter-pill" data-filter="library">Library</button>
            </div>
            <ul id="cmd-results-list" class="cmd-results-list" role="listbox">
                <!-- Injected dynamically via JS -->
            </ul>
            <div class="cmd-footer">
                <div class="cmd-shortcuts-guide">
                    <span class="cmd-key-hint"><kbd>↑</kbd><kbd>↓</kbd> Navigate</span>
                    <span class="cmd-key-hint"><kbd>↵</kbd> Select</span>
                    <span class="cmd-key-hint"><kbd>ESC</kbd> Close</span>
                </div>
                <span>Hesten's Learning Quick-Launcher</span>
            </div>
        </div>
    </div>

    <!-- Command Palette Engine -->
    <script src="<?= assetVersion('/assets/js/command-palette.js') ?>"></script>
