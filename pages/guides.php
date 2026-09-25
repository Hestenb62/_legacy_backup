<?php
/**
 * pages/guides.php - Educational Guides & School System Explainer Hub & Deep Reader
 *
 * Dual-Mode Controller:
 * 1. Catalog Hub: /pages/guides.php
 * 2. Deep Reader: /pages/guides.php?guide-slug or /pages/guides.php?guide=guide-slug
 *
 * Fully WCAG 2.1/2.2 AAA & UDL compliant, featuring TTS read-aloud,
 * Table of Contents scrollspy, typography scaling, and MathJax support.
 */

// -----------------------------------------------------------------------------
// 1. SCAN AND PARSE MARKDOWN GUIDES (assets/guides/*.md)
// -----------------------------------------------------------------------------
if (!function_exists('getEducationalGuides')) {
function getEducationalGuides() {
    $guidesDir = str_replace('\\', '/', dirname(__DIR__)) . '/assets/guides';
    if (!is_dir($guidesDir)) {
        return [];
    }

    $files = glob($guidesDir . '/*.md');
    $guides = [];

    if (!$files) {
        return $guides;
    }

    foreach ($files as $filePath) {
        $raw = file_get_contents($filePath);
        if ($raw === false) continue;

        $raw = str_replace(["\r\n", "\r"], "\n", $raw);
        $lines = explode("\n", $raw);

        $metadata = [];
        $bodyLines = [];
        $inFrontmatter = false;
        $frontmatterClosed = false;

        for ($i = 0; $i < count($lines); $i++) {
            $line = $lines[$i];
            $trimmed = trim($line);

            if ($i === 0 && $trimmed === '---') {
                $inFrontmatter = true;
                continue;
            }

            if ($inFrontmatter) {
                if ($trimmed === '---') {
                    $inFrontmatter = false;
                    $frontmatterClosed = true;
                    continue;
                }

                if (preg_match('/^([a-zA-Z0-9_\-]+)\s*:\s*(.*)$/', $line, $matches)) {
                    $key = trim($matches[1]);
                    $val = trim($matches[2]);

                    // Strip surrounding quotes
                    if ((str_starts_with($val, '"') && str_ends_with($val, '"')) ||
                        (str_starts_with($val, "'") && str_ends_with($val, "'"))) {
                        $val = substr($val, 1, -1);
                    }

                    // Parse JSON-like arrays: ["a", "b"]
                    if (str_starts_with($val, '[') && str_ends_with($val, ']')) {
                        $inner = substr($val, 1, -1);
                        $items = array_map(function($item) {
                            return trim(trim($item), "\"'");
                        }, explode(',', $inner));
                        $metadata[$key] = $items;
                    } else {
                        $metadata[$key] = $val;
                    }
                }
            } else {
                $bodyLines[] = $line;
            }
        }

        $baseName = pathinfo($filePath, PATHINFO_FILENAME);
        $slug = $metadata['slug'] ?? $baseName;
        $title = $metadata['title'] ?? ucwords(str_replace(['-', '_'], ' ', $baseName));
        $category = $metadata['category'] ?? 'General Education';
        $audience = $metadata['audience'] ?? 'Parents & Educators';
        $readTime = $metadata['readTime'] ?? '8 min read';
        $icon = $metadata['icon'] ?? 'fas fa-book-open';
        $summary = $metadata['summary'] ?? '';
        $tags = $metadata['tags'] ?? [];
        $updated = $metadata['updated'] ?? date('Y-m-d', filemtime($filePath));

        $guides[$slug] = [
            'slug' => $slug,
            'filename' => basename($filePath),
            'title' => $title,
            'category' => $category,
            'audience' => $audience,
            'readTime' => $readTime,
            'icon' => $icon,
            'summary' => $summary,
            'tags' => is_array($tags) ? $tags : [],
            'updated' => $updated,
            'bodyLines' => $bodyLines
        ];
    }

    return $guides;
}
}

// -----------------------------------------------------------------------------
// 2. PARSE MARKDOWN TO SEMANTIC HTML & EXTRACT TABLE OF CONTENTS
// -----------------------------------------------------------------------------
if (!function_exists('parseGuideMarkdown')) {
function parseGuideMarkdown($bodyLines) {
    $html = '';
    $toc = [];
    $inCodeBlock = false;
    $codeBlockContent = [];
    $inTable = false;
    $tableRows = [];
    $inList = false;
    $listType = 'ul';
    $inCallout = false;
    $calloutType = 'note';
    $calloutLines = [];

    $flushList = function() use (&$html, &$inList, &$listType) {
        if ($inList) {
            $html .= "</{$listType}>\n";
            $inList = false;
        }
    };

    $flushTable = function() use (&$html, &$inTable, &$tableRows) {
        if ($inTable && !empty($tableRows)) {
            $html .= '<div class="guide-table-wrapper"><table>';
            $isHeader = true;
            foreach ($tableRows as $rowIndex => $cols) {
                if ($rowIndex === 1 && preg_match('/^[\s\-:|]+$/', implode('', $cols))) {
                    // Separator row, skip
                    continue;
                }
                $tag = $isHeader ? 'th' : 'td';
                $html .= '<tr>';
                foreach ($cols as $col) {
                    $formattedCol = formatInlineMarkdown(trim($col));
                    $html .= "<{$tag}>{$formattedCol}</{$tag}>";
                }
                $html .= '</tr>';
                if ($isHeader) {
                    $isHeader = false;
                }
            }
            $html .= '</table></div>' . "\n";
            $tableRows = [];
            $inTable = false;
        }
    };

    $flushCallout = function() use (&$html, &$inCallout, &$calloutType, &$calloutLines) {
        if ($inCallout && !empty($calloutLines)) {
            $typeName = ucfirst($calloutType);
            $icon = 'fas fa-info-circle';
            if ($calloutType === 'tip') $icon = 'fas fa-lightbulb';
            if ($calloutType === 'warning') $icon = 'fas fa-exclamation-triangle';
            if ($calloutType === 'important') $icon = 'fas fa-star';

            $html .= "<div class=\"guide-callout {$calloutType}\">";
            $html .= "<div class=\"guide-callout-header\"><i class=\"{$icon}\" aria-hidden=\"true\"></i> <span>{$typeName}</span></div>";
            foreach ($calloutLines as $cLine) {
                $html .= '<p>' . formatInlineMarkdown($cLine) . '</p>';
            }
            $html .= '</div>' . "\n";
            $calloutLines = [];
            $inCallout = false;
        }
    };

    $slugify = function($text) {
        $clean = preg_replace('/[^a-zA-Z0-9\s\-]/', '', strtolower(strip_tags($text)));
        return preg_replace('/[\s\-]+/', '-', trim($clean));
    };

    foreach ($bodyLines as $line) {
        $trimmed = trim($line);

        // Code Blocks (```)
        if (str_starts_with($trimmed, '```')) {
            $flushList();
            $flushTable();
            $flushCallout();

            if ($inCodeBlock) {
                $codeContent = htmlspecialchars(implode("\n", $codeBlockContent));
                $html .= "<pre><code>{$codeContent}</code></pre>\n";
                $codeBlockContent = [];
                $inCodeBlock = false;
            } else {
                $inCodeBlock = true;
                $codeBlockContent = [];
            }
            continue;
        }

        if ($inCodeBlock) {
            $codeBlockContent[] = $line;
            continue;
        }

        // Callout blocks (> [!NOTE], > [!TIP], etc.)
        if (preg_match('/^>\s*\[\!(NOTE|TIP|WARNING|IMPORTANT|CAUTION)\]/i', $trimmed, $calloutMatch)) {
            $flushList();
            $flushTable();
            $flushCallout();
            $inCallout = true;
            $calloutType = strtolower($calloutMatch[1]);
            if ($calloutType === 'caution') $calloutType = 'warning';
            continue;
        }

        if ($inCallout) {
            if (str_starts_with($trimmed, '>')) {
                $calloutContent = trim(substr($trimmed, 1));
                if (!empty($calloutContent)) {
                    $calloutLines[] = $calloutContent;
                }
                continue;
            } else {
                $flushCallout();
            }
        }

        // Tables (| col | col |)
        if (str_starts_with($trimmed, '|') && str_ends_with($trimmed, '|')) {
            $flushList();
            $inTable = true;
            $cols = explode('|', trim($trimmed, '|'));
            $tableRows[] = $cols;
            continue;
        } else {
            $flushTable();
        }

        // Horizontal Rule
        if (preg_match('/^(\-{3,}|\*{3,})$/', $trimmed)) {
            $flushList();
            $html .= '<hr class="guide-divider">' . "\n";
            continue;
        }

        // Headings (H1 is skipped as page title, H2 and H3 generate TOC)
        if (preg_match('/^(#{1,4})\s+(.+)$/', $trimmed, $hMatch)) {
            $flushList();
            $level = strlen($hMatch[1]);
            $headingText = trim($hMatch[2]);
            $headingId = $slugify($headingText);

            if ($level === 1) {
                // Main title is displayed in header area, skip duplicate inside body
                continue;
            } elseif ($level === 2) {
                $toc[] = [
                    'id' => $headingId,
                    'text' => $headingText,
                    'level' => 2
                ];
                $html .= "<h2 id=\"{$headingId}\">" . formatInlineMarkdown($headingText) . "</h2>\n";
            } elseif ($level === 3) {
                $toc[] = [
                    'id' => $headingId,
                    'text' => $headingText,
                    'level' => 3
                ];
                $html .= "<h3 id=\"{$headingId}\">" . formatInlineMarkdown($headingText) . "</h3>\n";
            } else {
                $html .= "<h4>" . formatInlineMarkdown($headingText) . "</h4>\n";
            }
            continue;
        }

        // Bullet Lists (* or -)
        if (preg_match('/^[\*\-]\s+(.+)$/', $trimmed, $lMatch)) {
            if (!$inList || $listType !== 'ul') {
                $flushList();
                $html .= "<ul>\n";
                $inList = true;
                $listType = 'ul';
            }
            $html .= "<li>" . formatInlineMarkdown($lMatch[1]) . "</li>\n";
            continue;
        }

        // Numbered Lists (1. )
        if (preg_match('/^\d+\.\s+(.+)$/', $trimmed, $numMatch)) {
            if (!$inList || $listType !== 'ol') {
                $flushList();
                $html .= "<ol>\n";
                $inList = true;
                $listType = 'ol';
            }
            $html .= "<li>" . formatInlineMarkdown($numMatch[1]) . "</li>\n";
            continue;
        }

        $flushList();

        // Empty line
        if (empty($trimmed)) {
            continue;
        }

        // Regular Paragraph
        $html .= "<p>" . formatInlineMarkdown($trimmed) . "</p>\n";
    }

    $flushList();
    $flushTable();
    $flushCallout();

    return [
        'html' => $html,
        'toc' => $toc
    ];
}
}

if (!function_exists('formatInlineMarkdown')) {
function formatInlineMarkdown($text) {
    // Bold: **text**
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    // Italic: *text* or _text_
    $text = preg_replace('/(?<!\*)\*(?!\*)(.*?)(?<!\*)\*(?!\*)/', '<em>$1</em>', $text);
    // Inline code: `code`
    $text = preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);
    // Markdown link: [text](url)
    $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);
    return $text;
}
}

// -----------------------------------------------------------------------------
// 3. RESOLVE URL QUERY & CONTROLLER STATE
// -----------------------------------------------------------------------------
$allGuides = getEducationalGuides();

// Extract requested slug
$requestedSlug = '';
if (isset($_GET['guide']) && !empty($_GET['guide'])) {
    $requestedSlug = trim($_GET['guide']);
} elseif (isset($_GET['article']) && !empty($_GET['article'])) {
    $requestedSlug = trim($_GET['article']);
} else {
    // Check if query string is formatted as ?guide-slug
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    if (!empty($queryString)) {
        $firstParam = explode('&', $queryString)[0];
        if (strpos($firstParam, '=') === false && !empty($firstParam)) {
            $requestedSlug = urldecode($firstParam);
        }
    }
}

$requestedSlug = strtolower(trim(preg_replace('/[^a-zA-Z0-9\-_]+/', '', $requestedSlug)));

// Determine whether we are in Reader View or Catalog Hub View
$isReaderView = (!empty($requestedSlug) && isset($allGuides[$requestedSlug]));
$activeGuide = $isReaderView ? $allGuides[$requestedSlug] : null;

if ($isReaderView) {
    $parsedGuide = parseGuideMarkdown($activeGuide['bodyLines']);
    $pageTitle = htmlspecialchars($activeGuide['title']) . " - Educational Guides | Hesten's Learning";
    $pageDescription = htmlspecialchars($activeGuide['summary']);
    $pageKeywords = implode(', ', array_merge($activeGuide['tags'], ['education', 'school system', 'guides']));
} else {
    $pageTitle = "Educational Guides & School System Explainers | Hesten's Learning";
    $pageDescription = "Authoritative, accessible guides on how the American school system works, Common Core, IEPs, 504 plans, testing, and schooling options.";
    $pageKeywords = "american school system, common core, ccss, iep, 504 plan, special education, standardized testing, charter schools, homeschooling";
}

$pageAuthor = "Hesten Allison & Educational Research Team";

// Include Global Header
include __DIR__ . '/../src/header.php';
?>
<!-- Custom Stylesheet for Guides -->
<link rel="stylesheet" href="/assets/css/pages/guides.css?v=1.0">

<?php if ($isReaderView): ?>
    <!-- =======================================================================
         READER VIEW: Deep Immersive Article Reading Experience
         ======================================================================= -->

    <!-- Top Reading Progress Indicator -->
    <div class="guide-reading-progress-track" aria-hidden="true">
        <div class="guide-reading-progress-fill" id="guide-read-progress"></div>
    </div>

    <!-- Sticky Reading Bar / Toolbar -->
    <div class="guide-reader-toolbar" role="toolbar" aria-label="Reading Controls">
        <div class="guide-toolbar-inner">
            <div class="guide-toolbar-left">
                <a href="/pages/guides.php" class="guide-btn-back" aria-label="Return to Educational Guides Catalog">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    <span>All Guides</span>
                </a>
                <span class="guide-toolbar-title-compact" aria-hidden="true"><?= htmlspecialchars($activeGuide['title']) ?></span>
            </div>

            <div class="guide-toolbar-controls">
                <!-- Text-to-Speech (TTS) Narration -->
                <div class="guide-tts-group" role="group" aria-label="Audio Read-Aloud Controls">
                    <button type="button" id="guide-btn-tts-play" class="guide-tts-btn" aria-label="Read guide aloud">
                        <i class="fas fa-volume-up" aria-hidden="true"></i>
                        <span>Listen</span>
                    </button>
                    <button type="button" id="guide-btn-tts-stop" class="guide-tts-btn" style="display: none;" aria-label="Stop audio read-aloud">
                        <i class="fas fa-stop" aria-hidden="true"></i>
                    </button>
                    <label for="guide-tts-speed" class="sr-only">Playback Speed</label>
                    <select id="guide-tts-speed" class="guide-tts-speed-select" aria-label="Voice reading speed">
                        <option value="0.85">0.8x</option>
                        <option value="1.0" selected>1.0x</option>
                        <option value="1.2">1.2x</option>
                    </select>
                </div>

                <!-- Typography & Accessibility Controls -->
                <div class="guide-typo-group" role="group" aria-label="Typography and Font Adjustments">
                    <button type="button" id="guide-btn-size-down" class="guide-typo-btn" aria-label="Decrease text size">
                        A-
                    </button>
                    <button type="button" id="guide-btn-size-up" class="guide-typo-btn" aria-label="Increase text size">
                        A+
                    </button>
                    <button type="button" id="guide-btn-dyslexia" class="guide-typo-btn" aria-label="Toggle OpenDyslexic readable font">
                        <i class="fas fa-font" aria-hidden="true"></i> Dyslexic
                    </button>
                    <button type="button" id="guide-btn-line-height" class="guide-typo-btn" aria-label="Toggle relaxed line spacing">
                        <i class="fas fa-text-height" aria-hidden="true"></i> Spacing
                    </button>
                </div>

                <!-- Print & Share Actions -->
                <button type="button" id="guide-btn-print" class="guide-util-btn" aria-label="Print or save this guide">
                    <i class="fas fa-print" aria-hidden="true"></i>
                    <span>Print</span>
                </button>
                <button type="button" id="guide-btn-share" class="guide-util-btn" aria-label="Copy share link for this guide">
                    <i class="fas fa-link" aria-hidden="true"></i>
                    <span>Share</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Reader Layout -->
    <main class="guide-reader-container" id="main-content" tabindex="-1">
        <!-- Sticky Table of Contents (TOC) -->
        <?php if (!empty($parsedGuide['toc'])): ?>
            <aside class="guide-toc-sidebar" aria-label="Table of Contents">
                <h2 class="guide-toc-title">
                    <i class="fas fa-list-ul" aria-hidden="true"></i> Table of Contents
                </h2>
                <nav>
                    <ul class="guide-toc-list" id="guide-toc-list">
                        <?php foreach ($parsedGuide['toc'] as $tocItem): ?>
                            <li class="guide-toc-item level-<?= $tocItem['level'] ?>">
                                <a href="#<?= htmlspecialchars($tocItem['id']) ?>" class="guide-toc-link">
                                    <?= htmlspecialchars($tocItem['text']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
        <?php endif; ?>

        <!-- Article Content -->
        <article class="guide-article-wrap">
            <!-- Breadcrumbs -->
            <nav class="guide-breadcrumbs" aria-label="Breadcrumbs">
                <a href="/">Home</a>
                <span class="sep" aria-hidden="true">&rsaquo;</span>
                <a href="/pages/guides.php">Educational Guides</a>
                <span class="sep" aria-hidden="true">&rsaquo;</span>
                <span aria-current="page"><?= htmlspecialchars($activeGuide['title']) ?></span>
            </nav>

            <!-- Header Area -->
            <header class="guide-article-header">
                <div class="guide-header-badges">
                    <span class="guide-category-tag"><?= htmlspecialchars($activeGuide['category']) ?></span>
                    <span class="guide-audience-tag"><i class="fas fa-users" aria-hidden="true"></i> <?= htmlspecialchars($activeGuide['audience']) ?></span>
                </div>

                <h1 class="guide-article-title"><?= htmlspecialchars($activeGuide['title']) ?></h1>

                <div class="guide-article-meta">
                    <span><i class="far fa-clock" aria-hidden="true"></i> <?= htmlspecialchars($activeGuide['readTime']) ?></span>
                    <span><i class="far fa-calendar-alt" aria-hidden="true"></i> Updated: <?= htmlspecialchars($activeGuide['updated']) ?></span>
                    <span><i class="fas fa-user-edit" aria-hidden="true"></i> Hesten's Learning Research</span>
                </div>
            </header>

            <!-- Prose Body -->
            <div class="guide-prose">
                <?= $parsedGuide['html'] ?>
            </div>

            <!-- Related / Next Guides Section -->
            <section class="guide-bottom-nav" aria-labelledby="other-guides-heading">
                <h2 class="guide-bottom-title" id="other-guides-heading">Explore More Guides</h2>
                <div class="guide-bottom-grid">
                    <?php
                    $counter = 0;
                    foreach ($allGuides as $sKey => $g):
                        if ($sKey === $activeGuide['slug']) continue;
                        if ($counter >= 2) break;
                        $counter++;
                    ?>
                        <a href="/pages/guides.php?<?= urlencode($g['slug']) ?>" class="guide-bottom-card">
                            <div class="guide-bottom-label"><?= htmlspecialchars($g['category']) ?></div>
                            <h3 class="guide-bottom-card-title"><?= htmlspecialchars($g['title']) ?></h3>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        </article>
    </main>

<?php else: ?>
    <!-- =======================================================================
         CATALOG HUB VIEW: Guides Directory & Search Filter
         ======================================================================= -->

    <!-- Hero Banner with Search & Filters -->
    <section class="guides-hero" aria-labelledby="guides-hero-title">
        <div class="guides-hero-bg" aria-hidden="true">
            <i class="fas fa-graduation-cap guides-bg-icon-1"></i>
            <i class="fas fa-chalkboard-teacher guides-bg-icon-2"></i>
            <div class="guides-hero-glow"></div>
        </div>

        <div class="guides-hero-content">
            <span class="guides-hero-badge">
                <i class="fas fa-compass" aria-hidden="true"></i> Educational Roadmap
            </span>
            <h1 class="guides-hero-title" id="guides-hero-title">
                Educational Guides &amp; Explainers
            </h1>
            <p class="guides-hero-subtitle">
                Clear, transparent, research-backed guides demystifying the American school system, Common Core standards, special education laws, and testing.
            </p>

            <!-- Search Bar -->
            <div class="guides-search-wrapper">
                <div class="guides-search-bar">
                    <i class="fas fa-search guides-search-icon" aria-hidden="true"></i>
                    <label for="guides-search-input" class="sr-only">Search educational guides</label>
                    <input type="text" id="guides-search-input" class="guides-search-input"
                           placeholder="Search topics (e.g., 'Common Core', 'IEP', 'credits', 'charter')...">
                    <button type="button" id="guides-search-clear" class="guides-search-clear" aria-label="Clear search">
                        <i class="fas fa-times-circle" aria-hidden="true"></i>
                    </button>
                </div>

                <!-- Category Filter Pills -->
                <nav class="guides-filter-nav" aria-label="Guide Categories">
                    <button type="button" class="guides-filter-pill active" data-category="all">All Topics</button>
                    <button type="button" class="guides-filter-pill" data-category="School Systems">School Systems</button>
                    <button type="button" class="guides-filter-pill" data-category="Curriculum & Standards">Curriculum &amp; Standards</button>
                    <button type="button" class="guides-filter-pill" data-category="Special Education & A11y">Special Education</button>
                    <button type="button" class="guides-filter-pill" data-category="Assessments & Testing">Assessments &amp; Testing</button>
                </nav>
            </div>
        </div>
    </section>

    <!-- Catalog Cards Section -->
    <main class="guides-catalog-container" id="main-content" tabindex="-1">
        <div class="guides-catalog-header">
            <h2 class="guides-catalog-title">
                <span>Featured Guidebooks</span>
                <span class="guides-count-badge" id="guides-count-badge"><?= count($allGuides) ?></span>
            </h2>
        </div>

        <div class="guides-grid" id="guides-grid">
            <?php foreach ($allGuides as $guide): ?>
                <article class="guide-card"
                         data-title="<?= htmlspecialchars($guide['title']) ?>"
                         data-summary="<?= htmlspecialchars($guide['summary']) ?>"
                         data-tags="<?= htmlspecialchars(implode(' ', $guide['tags'])) ?>"
                         data-category="<?= htmlspecialchars($guide['category']) ?>">
                    <div>
                        <div class="guide-card-top">
                            <div class="guide-card-icon" aria-hidden="true">
                                <i class="<?= htmlspecialchars($guide['icon']) ?>"></i>
                            </div>
                            <div class="guide-card-meta-badges">
                                <span class="guide-category-tag"><?= htmlspecialchars($guide['category']) ?></span>
                                <span class="guide-read-time">
                                    <i class="far fa-clock" aria-hidden="true"></i> <?= htmlspecialchars($guide['readTime']) ?>
                                </span>
                            </div>
                        </div>

                        <h3 class="guide-card-title">
                            <a href="/pages/guides.php?<?= urlencode($guide['slug']) ?>">
                                <?= htmlspecialchars($guide['title']) ?>
                            </a>
                        </h3>

                        <p class="guide-card-summary">
                            <?= htmlspecialchars($guide['summary']) ?>
                        </p>

                        <?php if (!empty($guide['tags'])): ?>
                            <div class="guide-card-tags" aria-label="Topic tags">
                                <?php foreach ($guide['tags'] as $tag): ?>
                                    <span class="guide-tag-pill">#<?= htmlspecialchars($tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="guide-card-footer">
                        <span class="guide-audience-tag">
                            <i class="fas fa-users" aria-hidden="true"></i> <?= htmlspecialchars($guide['audience']) ?>
                        </span>
                        <a href="/pages/guides.php?<?= urlencode($guide['slug']) ?>" class="guide-card-action-btn">
                            <span>Read Guide</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>

            <div class="guide-no-results" id="guides-no-results" role="status" aria-live="polite">
                <i class="fas fa-search fa-2x" style="margin-bottom: 1rem; color: #94a3b8;" aria-hidden="true"></i>
                <p>No guides match your search criteria. Try a different keyword or category.</p>
            </div>
        </div>
    </main>
<?php endif; ?>

<!-- Guides JavaScript Engine -->
<script src="/assets/js/pages/guides-reader.js?v=1.0" defer></script>

<?php
// Include Global Footer
include __DIR__ . '/../src/footer.php';
?>
