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
                displayMath: [['$$', '$$'], ['\\[', '\\]']]
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

        window.ensureMathJax = function() {
            return new Promise((resolve, reject) => {
                const onReady = (mj) => {
                    if (mj && mj.typesetPromise && !mj._dyscalculiaHooked) {
                        mj._dyscalculiaHooked = true;
                        const origTypeset = mj.typesetPromise.bind(mj);
                        mj.typesetPromise = function(elements) {
                            return origTypeset(elements).then(res => {
                                if (window.accommodationEngine && window.accommodationEngine.profile.dyscalculiaEnabled) {
                                    window.accommodationEngine.colorizeMathSymbols();
                                }
                                return res;
                            });
                        };
                    }
                    if (window.accommodationEngine && window.accommodationEngine.profile.dyscalculiaEnabled) {
                        setTimeout(() => window.accommodationEngine.colorizeMathSymbols(), 100);
                    }
                    resolve(mj);
                };

                if (window.MathJax && window.MathJax.typesetPromise) {
                    onReady(window.MathJax);
                    return;
                }
                const existing = document.getElementById('MathJax-script');
                if (existing) {
                    existing.addEventListener('load', () => onReady(window.MathJax));
                    existing.addEventListener('error', reject);
                    return;
                }
                const script = document.createElement('script');
                script.id = 'MathJax-script';
                script.async = true;
                script.src = '<?= assetVersion('/assets/js/mathjax-4.1.3/tex-svg.js') ?>';
                script.onload = () => {
                    let tries = 0;
                    const poll = setInterval(() => {
                        if (window.MathJax && window.MathJax.typesetPromise) {
                            clearInterval(poll);
                            onReady(window.MathJax);
                        } else if (++tries > 20) {
                            clearInterval(poll);
                            onReady(window.MathJax);
                        }
                    }, 50);
                };
                script.onerror = reject;
                document.head.appendChild(script);
            });
        };
    </script>
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
                        <form action="/pages/search.php" method="GET" class="search-form" role="search">
                            <label for="header-search" class="sr-only">Search the site</label>
                            <input type="text" id="header-search" name="q" placeholder="Search..." class="search-input" />
                            <button type="submit" aria-label="Search" style="background: none; border: none; padding: 0; cursor: pointer; color: inherit;">
                                <i class="fas fa-search search-icon"></i>
                            </button>
                        </form>

                      
                        
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
            
            <!-- Breadcrumbs -->
            <?php
            // Calculate breadcrumbs based on URL & query string with subject & lesson awareness
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            $rawPath = explode('?', $uri)[0];
            $queryString = $_SERVER['QUERY_STRING'] ?? '';
            $parts = array_values(array_filter(explode('/', $rawPath)));
            
            if (!empty($parts) && basename($uri) !== 'index.php' && $uri !== '/' && $uri !== '') {
                $isLibrary = (strpos($uri, '/library') !== false);
                $navClass = $isLibrary ? 'breadcrumb-nav library-breadcrumb' : 'breadcrumb-nav';
                
                $subjNames = [
                    'math' => 'Math',
                    'ela' => 'ELA',
                    'sci' => 'Science',
                    'science' => 'Science',
                    'soc' => 'Social Studies',
                    'social' => 'Social Studies'
                ];
                
                // Detect active lesson code from query string or GET parameter or filename
                $activeLessonCode = '';
                if (!empty($_GET['lesson'])) {
                    $activeLessonCode = trim($_GET['lesson']);
                } elseif (!empty($queryString) && !str_contains($queryString, '=')) {
                    $activeLessonCode = trim(explode('&', $queryString)[0]);
                } elseif (!empty($parts) && $parts[0] === 'lessons') {
                    $activeLessonCode = str_replace('.php', '', end($parts));
                }
                
                // Parse lesson code pattern: [level]-[subject]-m[mod]-[topic]-[lesson]
                $parsedLesson = null;
                if (!empty($activeLessonCode) && preg_match('/^([a-z0-9]+)-(math|ela|sci|soc|science|social)-m(\d+)-([a-z0-9]+)-(\d+)$/i', $activeLessonCode, $m)) {
                    $parsedLesson = [
                        'level' => strtoupper($m[1]),
                        'levelRaw' => strtolower($m[1]),
                        'subjectKey' => strtolower($m[2]),
                        'subject' => $subjNames[strtolower($m[2])] ?? ucfirst($m[2]),
                        'module' => $m[3],
                        'topic' => strtoupper($m[4]),
                        'lesson' => $m[5]
                    ];
                }
                
                echo '<nav class="' . $navClass . '" aria-label="Breadcrumb">';
                echo '<a href="/" class="breadcrumb-link" title="Home"><i class="fas fa-home"></i></a>';
                
                // Handle Level / Lesson routing with subject specificity
                if ($parsedLesson) {
                    echo '<span style="color: var(--color-border); margin: 0 0.25rem;"><i class="fas fa-chevron-right" style="font-size: 10px;"></i></span>';
                    echo '<a href="/#learning-grid" class="breadcrumb-link">Levels</a>';
                    
                    echo '<span style="color: var(--color-border); margin: 0 0.25rem;"><i class="fas fa-chevron-right" style="font-size: 10px;"></i></span>';
                    $levelSubjUrl = '/levels/' . $parsedLesson['levelRaw'] . '.php?subject=' . urlencode($parsedLesson['subjectKey']);
                    echo '<a href="' . htmlspecialchars($levelSubjUrl) . '" class="breadcrumb-link">Level ' . htmlspecialchars($parsedLesson['level']) . ' ' . htmlspecialchars($parsedLesson['subject']) . '</a>';
                    
                    echo '<span style="color: var(--color-border); margin: 0 0.25rem;"><i class="fas fa-chevron-right" style="font-size: 10px;"></i></span>';
                    echo '<span class="breadcrumb-active" aria-current="page">Module ' . htmlspecialchars($parsedLesson['module']) . ' : Lesson ' . htmlspecialchars($parsedLesson['lesson']) . '</span>';
                } else {
                    $path = '';
                    $total = count($parts);
                    $i = 0;
                    
                    foreach ($parts as $part) {
                        $i++;
                        $path .= '/' . $part;
                        $cleanPart = str_replace(['-', '.php', '.html'], [' ', '', ''], $part);
                        $name = ucwords($cleanPart);
                        
                        // Check if this is a level page (e.g. k.php) and append the subject
                        if ($total >= 2 && $parts[0] === 'levels' && $i === 2 && preg_match('/^[a-o]\.php$/i', $part)) {
                            $lvlLetter = strtoupper(str_replace('.php', '', $part));
                            $activeSubj = $_GET['subject'] ?? ($initialSubjectName ?? ($initialSubject ?? ''));
                            if (!empty($activeSubj)) {
                                $subjLabel = $subjNames[strtolower($activeSubj)] ?? ucfirst($activeSubj);
                                $name = 'Level ' . $lvlLetter . ' ' . $subjLabel;
                            } else {
                                $name = 'Level ' . $lvlLetter;
                            }
                        }
                        
                        echo '<span style="color: var(--color-border); margin: 0 0.25rem;"><i class="fas fa-chevron-right" style="font-size: 10px;"></i></span>';
                        
                        if ($i === $total) {
                            echo '<span class="breadcrumb-active" aria-current="page">' . htmlspecialchars($name) . '</span>';
                        } else {
                            echo '<a href="' . htmlspecialchars($path) . '" class="breadcrumb-link">' . htmlspecialchars($name) . '</a>';
                        }
                    }
                }
                echo '</nav>';
            }
            ?>
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
