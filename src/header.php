<?php
// Ensure this script is not executed directly.
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// Function to fetch the current user dynamically
function getCurrentUser() {
    return [
        'name' => 'User',
        'email' => 'user@example.com',
        'role' => 'student',
        'avatar' => '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png'
    ];
}

$currentUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hesten's Learning</title>

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">
    
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/assets/icons/icon-192x192.png">

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
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js"></script>


    <!-- Custom Modern Styles (Vanilla CSS Architecture) -->
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    
    <style>
        /* Header Specific Styles */
        .header-main {
            background-color: var(--color-header-bg, rgba(255, 255, 255, 0.8));
            backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 40;
            transition: background-color 0.3s;
            border-bottom: 1px solid var(--color-border);
            box-shadow: var(--shadow-sm);
        }
        
        .header-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: var(--spacing-4) 0;
        }

        .header-brand {
            display: flex;
            align-items: center;
            color: var(--color-primary);
            text-decoration: none;
            margin-right: var(--spacing-8);
        }

        .header-brand-icon {
            height: 2.5rem;
            width: 2.5rem;
            margin-right: var(--spacing-3);
            background: linear-gradient(to bottom right, var(--color-primary), var(--color-secondary));
            color: white;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.25rem;
            box-shadow: var(--shadow-md);
            transition: transform 0.2s;
        }

        .header-brand:hover .header-brand-icon {
            transform: scale(1.05);
        }

        .header-brand-text {
            font-weight: 700;
            font-size: 1.25rem;
            font-family: 'Outfit', sans-serif;
            color: var(--color-text-main);
        }
        
        .header-nav-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--spacing-4);
            transition: all 0.3s ease;
            margin-top: var(--spacing-4);
        }
        
        @media (min-width: 1024px) {
            .header-nav-content {
                display: flex !important;
                flex-direction: row;
                align-items: center;
                flex-grow: 1;
                width: auto;
                margin-top: 0;
            }
        }

        .header-nav-links {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-2);
            font-weight: 700;
            font-size: 0.875rem;
        }
        
        @media (min-width: 1024px) {
            .header-nav-links {
                flex-direction: row;
                gap: var(--spacing-6);
                flex-grow: 1;
            }
        }
        
        .nav-link {
            padding: var(--spacing-2) var(--spacing-3);
            border-radius: var(--radius-lg);
            color: var(--color-text-main);
            text-decoration: none;
            transition: color 0.2s, background-color 0.2s;
            display: block;
        }
        
        .nav-link:hover {
            color: var(--color-primary);
            background-color: var(--color-bg-surface);
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: var(--spacing-4);
            flex-wrap: wrap;
        }
        
        .search-form {
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
        }
        
        @media (min-width: 1024px) {
            .search-form {
                width: auto;
            }
        }
        
        .search-input {
            background-color: var(--color-bg-surface);
            color: var(--color-text-main);
            border-radius: var(--radius-full);
            padding: var(--spacing-2) var(--spacing-4) var(--spacing-2) 2.5rem;
            border: 1px solid var(--color-border);
            width: 100%;
            transition: all 0.3s;
        }
        
        @media (min-width: 1024px) {
            .search-input {
                width: 12rem;
            }
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            color: var(--color-text-muted);
            transition: color 0.2s;
        }
        
        .search-form:hover .search-icon {
            color: var(--color-primary);
        }
        
        .mobile-menu-btn {
            display: flex;
            align-items: center;
            padding: var(--spacing-2) var(--spacing-3);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-md);
            color: var(--color-text-main);
            background: transparent;
        }
        
        @media (min-width: 1024px) {
            .mobile-menu-btn {
                display: none;
            }
        }
        
        .mobile-menu-btn:hover {
            color: var(--color-primary);
        }
        
        /* User Dropdown Pill */
        .user-dropdown-container {
            position: relative;
        }
        
        .user-pill {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.375rem 1rem 0.375rem 0.375rem;
            background-color: var(--color-bg-surface);
            border: 1px solid var(--color-border);
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .user-pill:hover {
            border-color: var(--color-primary);
            box-shadow: var(--shadow-sm);
        }
        
        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            object-fit: cover;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            line-height: 1.2;
        }
        
        .user-name {
            font-weight: 700;
            font-size: 0.875rem;
            color: var(--color-text-main);
        }
        
        .user-role {
            font-size: 0.625rem;
            color: var(--color-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }
        
        .user-chevron {
            color: var(--color-text-muted);
            font-size: 0.75rem;
            transition: transform 0.2s ease;
        }
        
        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            width: 12rem;
            background-color: var(--color-bg-surface);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 0.5rem 0;
            z-index: 50;
            display: none;
            flex-direction: column;
        }
        
        .user-dropdown-menu.active {
            display: flex;
            animation: fade-in-up 0.2s ease forwards;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: var(--color-text-main);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: background-color 0.2s, color 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: rgba(37, 99, 235, 0.05);
            color: var(--color-primary);
        }
        
        .dropdown-item.text-danger:hover {
            background-color: rgba(239, 68, 68, 0.05);
            color: var(--color-error, #ef4444);
        }
        
        .dropdown-divider {
            height: 1px;
            background-color: var(--color-border);
            margin: 0.5rem 0;
        }
        
        /* Breadcrumbs Custom Styling */
        .breadcrumb-nav {
            margin-top: var(--spacing-4);
            font-size: 0.875rem;
            color: var(--color-text-muted);
            display: flex;
            align-items: center;
            gap: var(--spacing-2);
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: var(--spacing-1);
        }
        
        .breadcrumb-link {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .breadcrumb-link:hover {
            color: var(--color-primary);
        }
        
        .breadcrumb-active {
            color: var(--color-success);
            font-weight: 500;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>

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
                
                <button id="nav-toggle" class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="header-nav-content" id="nav-content" style="display: none;">
                    <div class="header-nav-links">
                        <a href="/" class="nav-link"><i class="fas fa-home" style="margin-right: 0.25rem; opacity: 0.7;"></i> Home</a>
                        <a href="/assessment" class="nav-link"><i class="fas fa-tasks" style="margin-right: 0.25rem; opacity: 0.7;"></i> Assessment</a>
                    </div>
                    
                    <div class="header-actions">
                        <form action="/search.php" method="GET" class="search-form">
                            <input type="text" name="q" placeholder="Search..." class="search-input" />
                            <i class="fas fa-search search-icon"></i>
                        </form>
                        
                        <div class="user-dropdown-container">
                            <button class="user-pill" id="user-pill-btn">
                                <img src="<?php echo htmlspecialchars($currentUser['avatar']); ?>" alt="User" class="user-avatar" onerror="this.src='https://ui-avatars.com/api/?name=User&background=random'">
                                <div class="user-info">
                                    <span class="user-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                                    <span class="user-role"><?php echo htmlspecialchars($currentUser['role']); ?></span>
                                </div>
                                <i class="fas fa-chevron-down user-chevron"></i>
                            </button>
                            <div class="user-dropdown-menu" id="user-dropdown-menu">
                                <a href="/settings.php" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
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
                echo '<nav class="breadcrumb-nav" aria-label="Breadcrumb">';
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

    <script src="/assets/js/a11y.js"></script>
    <script src="/assets/js/core-ui.js"></script>
    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            var nav = document.getElementById('nav-content');
            if (nav.style.display === 'none' || nav.style.display === '') {
                nav.style.display = 'flex';
            } else {
                if (window.innerWidth < 1024) {
                    nav.style.display = 'none';
                }
            }
        });
        
        window.addEventListener('resize', function() {
            var nav = document.getElementById('nav-content');
            if (window.innerWidth >= 1024) {
                nav.style.display = 'flex';
            } else {
                nav.style.display = 'none';
            }
        });
        
        // User Dropdown Logic
        const userBtn = document.getElementById('user-pill-btn');
        const userMenu = document.getElementById('user-dropdown-menu');
        if (userBtn && userMenu) {
            userBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userMenu.classList.toggle('active');
            });
            document.addEventListener('click', function(e) {
                if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                }
            });
        }
    </script>
