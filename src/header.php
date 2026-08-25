<?php
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
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hesten's Learning</title>

    <!-- OpenGraph & Social Sharing Meta Tags -->
    <meta property="og:title" content="Hesten's Learning">
    <meta property="og:description" content="Empowering students through accessible, custom educational levels and tools.">
    <meta property="og:image" content="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Hesten's Learning">
    <meta name="twitter:description" content="Empowering students through accessible, custom educational levels and tools.">
    <meta name="twitter:image" content="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">
    
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <link rel="shortcut icon" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- MathJax Configuration -->
    <script>
        MathJax = {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']]
            },
            svg: {
                fontCache: 'global'
            }
        };
    </script>
    <script id="MathJax-script" async src="/assets/js/mathjax-4.1.3/tex-svg.js"></script>


    <style>
        /* CSS Cascade Layers Definition (Vanilla CSS Architecture) */
        @layer reset, tokens, base, primitives, components, utilities, overrides;
    </style>

    <!-- Custom Modern Styles (Vanilla CSS Architecture) -->
    <link rel="stylesheet" href="/assets/css/global-tokens.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/global-reset.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/global-primitives.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/global-components.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/components/fixed-tools.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/layouts/header.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/layouts/footer.css?v=1.3">
</head>

<body>
    <!-- Skip Navigation Link (WCAG 2.4.1) -->
    <a href="#main-content" class="skip-link sr-only sr-only-focusable">Skip to main content</a>

    <!-- Fixed Tools & Overlays -->
    <?php include __DIR__ . '/partials/fixed-tools.php'; ?>
    <!-- Interactive Panels -->
    <?php include __DIR__ . '/partials/timer.php'; ?>
    <?php include __DIR__ . '/partials/scratchpad.php'; ?>
    <?php include __DIR__ . '/partials/citation.php'; ?>

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
                
                <div class="header-nav-content" id="nav-content" style="display: none;">
                    <div class="header-nav-links">
                        <a href="/" class="nav-link"><i class="fas fa-home" style="margin-right: 0.25rem; opacity: 0.7;"></i> Home</a>
                        <a href="/assessment" class="nav-link"><i class="fas fa-tasks" style="margin-right: 0.25rem; opacity: 0.7;"></i> Assessment</a>
                        <a href="/library/" class="nav-link"><i class="fas fa-book" style="margin-right: 0.25rem; opacity: 0.7;"></i> Library</a>
                    </div>
                    
                    <div class="header-actions">
                        <form action="/search.php" method="GET" class="search-form" role="search">
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
            // Calculate breadcrumbs based on the URL with a fallback for local testing
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            $parts = explode('?', $uri)[0]; // Remove query string
            $parts = array_filter(explode('/', $parts));
            
            if (!empty($parts) && basename($uri) !== 'index.php' && $uri !== '/' && $uri !== '') {
                $isLibrary = (strpos($uri, '/library') !== false);
                $navClass = $isLibrary ? 'breadcrumb-nav library-breadcrumb' : 'breadcrumb-nav';
                echo '<nav class="' . $navClass . '" aria-label="Breadcrumb">';
                echo '<a href="/" class="breadcrumb-link"><i class="fas fa-home"></i></a>';
                
                $path = '';
                $total = count($parts);
                $i = 0;
                
                foreach ($parts as $part) {
                    $i++;
                    $path .= '/' . $part;
                    $name = ucwords(str_replace(['-', '.php', '.html'], [' ', '', ''], $part));
                    
                    echo '<span style="color: var(--color-border); margin: 0 0.25rem;"><i class="fas fa-chevron-right" style="font-size: 10px;"></i></span>';
                    
                    if ($i === $total) {
                        echo '<span class="breadcrumb-active" aria-current="page">' . htmlspecialchars($name) . '</span>';
                    } else {
                        echo '<a href="' . htmlspecialchars($path) . '" class="breadcrumb-link">' . htmlspecialchars($name) . '</a>';
                    }
                }
                echo '</nav>';
            }
            ?>
        </div>
    </header>

    <script src="/assets/js/global-a11y.js"></script>
    <script src="/assets/js/global-core-ui.js"></script>
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
        if (userBtn && userMenu) {
            userBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const active = userMenu.classList.toggle('active');
                userBtn.setAttribute('aria-expanded', active ? 'true' : 'false');
            });
            document.addEventListener('click', function(e) {
                if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                    userBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    </script>
