<?php
// --- Page Configuration ---
$pageTitle       = "Help Center & User Guide | Hesten's Learning";
$pageDescription = "Learn how to use Hesten's Learning. Guides for students, parents, and teachers on accessibility, curriculum, and progress tracking.";
$pageKeywords    = "help center, user guide, how to use, accessibility tools, special education resources, CCSS, TEKS";
$pageAuthor      = "Hesten's Learning";

/**
 * Dynamically scans and parses Markdown documentation articles from assets/text/*.md
 * Automatically handles headings, bold, italic, inline code, lists, excerpts, and read time.
 */
function getHelpArticles() {
    $articlesDir = str_replace('\\', '/', dirname(__DIR__)) . '/assets/text';
    if (!is_dir($articlesDir)) {
        return [];
    }

    $files = glob($articlesDir . '/hc*.md');
    $articles = [];

    if (!$files) {
        return $articles;
    }

    foreach ($files as $filePath) {
        $filename = basename($filePath);
        $raw = file_get_contents($filePath);
        if ($raw === false) {
            continue;
        }

        $raw = str_replace(["\r\n", "\r"], "\n", $raw);
        $lines = explode("\n", trim($raw));

        $title = '';
        $bodyLines = [];

        // Extract Title: check ATX (# Header) or Setext (Header text followed by === or ---)
        for ($i = 0; $i < count($lines); $i++) {
            $line = $lines[$i];
            $trimmed = trim($line);

            if (empty($title)) {
                if (preg_match('/^#{1,3}\s+(.+)$/', $trimmed, $m)) {
                    $title = trim($m[1]);
                    continue;
                }
                if (isset($lines[$i + 1]) && preg_match('/^={3,}$/', trim($lines[$i + 1])) && !empty($trimmed)) {
                    $title = $trimmed;
                    $i++; // skip the underline
                    continue;
                }
                if (isset($lines[$i + 1]) && preg_match('/^-{3,}$/', trim($lines[$i + 1])) && !empty($trimmed)) {
                    $title = $trimmed;
                    $i++; // skip the underline
                    continue;
                }
            }
            $bodyLines[] = $line;
        }

        $baseName = pathinfo($filename, PATHINFO_FILENAME);
        $cleanSlug = preg_replace('/^hc[-_]?/i', '', $baseName);

        if (empty($title)) {
            $title = ucwords(str_replace(['-', '_'], ' ', $cleanSlug));
        }

        $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($cleanSlug));
        if (empty($slug)) {
            $slug = strtolower($baseName);
        }

        $topic = 'Guide';
        $icon = 'fas fa-book-open';
        $iconClass = 'general';

        if (stripos($filename, 'access') !== false || stripos($filename, 'a11y') !== false) {
            $topic = 'Accessibility';
            $icon = 'fas fa-universal-access';
            $iconClass = 'accessibility';
        } elseif (stripos($filename, 'progress') !== false) {
            $topic = 'Features';
            $icon = 'fas fa-chart-line';
            $iconClass = 'progress';
        } elseif (stripos($filename, 'updat') !== false || stripos($filename, 'curr') !== false) {
            $topic = 'Curriculum';
            $icon = 'fas fa-sync-alt';
            $iconClass = 'updating';
        }

        // Excerpt extraction: skip metadata headers, links, and hr dividers
        $excerpt = '';
        foreach ($bodyLines as $bLine) {
            $bTrim = trim($bLine);
            if (empty($bTrim)) continue;
            if (str_starts_with($bTrim, '#') || str_starts_with($bTrim, '=') || str_starts_with($bTrim, '-') || str_starts_with($bTrim, '*')) continue;
            if (stripos($bTrim, 'Creation Date:') !== false || stripos($bTrim, 'Created By:') !== false || stripos($bTrim, 'StepCapture') !== false) continue;
            if (str_starts_with($bTrim, '![')) continue;

            $cleanText = preg_replace('/!\[(.*?)\]\((.*?)\)/', '', $bTrim);
            $cleanText = preg_replace('/\[(.*?)\]\((.*?)\)/', '$1', $cleanText);
            $cleanText = preg_replace('/\*\*(.*?)\*\*/', '$1', $cleanText);
            $cleanText = preg_replace('/[\*\_](.*?)[\*\_]/', '$1', $cleanText);
            $cleanText = trim($cleanText);
            if (!empty($cleanText)) {
                $excerpt = $cleanText;
                break;
            }
        }
        if (empty($excerpt)) {
            $excerpt = "Step-by-step walkthrough guide for " . strtolower($title) . ".";
        }

        $parsedHtml = '';
        $inList = false;
        $paragraph = [];

        $flushParagraph = function() use (&$parsedHtml, &$paragraph) {
            if (!empty($paragraph)) {
                $text = implode(' ', $paragraph);
                // Parse markdown images
                $text = preg_replace('/!\[(.*?)\]\((https?:\/\/[^\)]+)\)/', '<div class="help-article-img-box"><img src="$2" alt="$1" class="help-article-img" loading="lazy"><span class="help-article-caption">$1</span></div>', $text);
                // Parse markdown links
                $text = preg_replace('/\[(.*?)\]\((https?:\/\/[^\)]+)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>', $text);
                // Bold, Italics, Code
                $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
                $text = preg_replace('/(?<!\*)\*(?!\*)(.*?)(?<!\*)\*(?!\*)/', '<em>$1</em>', $text);
                $text = preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);

                if (str_starts_with($text, '<div class="help-article-img-box">')) {
                    $parsedHtml .= $text . "\n";
                } else {
                    $parsedHtml .= '<p>' . $text . '</p>' . "\n";
                }
                $paragraph = [];
            }
        };

        foreach ($bodyLines as $line) {
            $trimmed = trim($line);

            if (empty($trimmed)) {
                $flushParagraph();
                if ($inList) {
                    $parsedHtml .= "</ul>\n";
                    $inList = false;
                }
                continue;
            }

            // Horizontal Rules
            if (preg_match('/^(\*\s*){3,}$/', $trimmed) || preg_match('/^(\-\s*){3,}$/', $trimmed)) {
                $flushParagraph();
                if ($inList) { $parsedHtml .= "</ul>\n"; $inList = false; }
                $parsedHtml .= '<hr class="help-article-divider">' . "\n";
                continue;
            }

            // Bullet lists
            if (preg_match('/^[\*\-]\s+(.+)$/', $trimmed, $m)) {
                $flushParagraph();
                if (!$inList) {
                    $parsedHtml .= "<ul>\n";
                    $inList = true;
                }
                $itemContent = $m[1];
                $itemContent = preg_replace('/!\[(.*?)\]\((https?:\/\/[^\)]+)\)/', '<img src="$2" alt="$1" class="help-article-img">', $itemContent);
                $itemContent = preg_replace('/\[(.*?)\]\((https?:\/\/[^\)]+)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>', $itemContent);
                $itemContent = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $itemContent);
                $itemContent = preg_replace('/(?<!\*)\*(?!\*)(.*?)(?<!\*)\*(?!\*)/', '<em>$1</em>', $itemContent);
                $itemContent = preg_replace('/`([^`]+)`/', '<code>$1</code>', $itemContent);
                $parsedHtml .= '<li>' . $itemContent . '</li>' . "\n";
                continue;
            }

            if ($inList) {
                $parsedHtml .= "</ul>\n";
                $inList = false;
            }

            // Standalone image line
            if (preg_match('/^!\[(.*?)\]\((https?:\/\/[^\)]+)\)$/', $trimmed, $m)) {
                $flushParagraph();
                $parsedHtml .= '<div class="help-article-img-box"><img src="' . htmlspecialchars($m[2]) . '" alt="' . htmlspecialchars($m[1]) . '" class="help-article-img" loading="lazy"><span class="help-article-caption">' . htmlspecialchars($m[1]) . '</span></div>' . "\n";
                continue;
            }

            // Subheadings
            if (preg_match('/^#{3,4}\s+(.+)$/', $trimmed, $m)) {
                $flushParagraph();
                $parsedHtml .= '<h4>' . htmlspecialchars($m[1]) . '</h4>' . "\n";
                continue;
            }

            $paragraph[] = $trimmed;
        }

        $flushParagraph();
        if ($inList) {
            $parsedHtml .= "</ul>\n";
        }

        $wordCount = str_word_count(strip_tags($parsedHtml));
        $readTime = max(1, ceil($wordCount / 120)) . ' min read';

        $articles[] = [
            'id' => $slug,
            'filename' => $filename,
            'title' => $title,
            'topic' => $topic,
            'icon' => $icon,
            'iconClass' => $iconClass,
            'excerpt' => $excerpt,
            'html' => $parsedHtml,
            'readTime' => $readTime,
            'lastModified' => date('M j, Y', filemtime($filePath))
        ];
    }

    return $articles;
}

include '../src/header.php';
?>
<link rel="stylesheet" href="/assets/css/pages/help-center.css?v=2.0">

<!-- Hero Section with Search -->
<section class="page-hero" aria-labelledby="help-hero-title">
    <!-- Animated Background Elements -->
    <div class="page-hero-bg" aria-hidden="true">
        <i class="fas fa-question-circle hero-bg-icon-left"></i>
        <i class="fas fa-hands-helping hero-bg-icon-right"></i>
        <div class="hero-bg-glow"></div>
    </div>

    <div class="page-hero-content">
        <span class="help-hero-badge">
            <i class="fas fa-life-ring"></i> Support &amp; Documentation
        </span>
        <h1 class="page-hero-title" id="help-hero-title">How can we help?</h1>
        <p class="page-hero-subtitle">
            Comprehensive guides, accessibility walkthroughs, and answers for students, parents, and educators.
        </p>

        <!-- Search Bar with Instant Filter -->
        <div class="help-search-wrapper">
            <div class="help-search-bar" id="help-search-group">
                <i class="fas fa-search help-search-icon" id="search-icon" aria-hidden="true"></i>
                <label for="help-search" class="sr-only">Search for help answers</label>
                <input type="text" id="help-search" onkeyup="filterFAQ()" oninput="toggleSearchClear()"
                    class="help-search-input"
                    placeholder="Search for answers (e.g., 'dyslexia font', 'progress', 'standards')...">
                <button type="button" id="help-search-clear-btn" class="help-search-clear" onclick="clearSearch()" aria-label="Clear search">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>

            <!-- Quick Topic Pills -->
            <div class="help-quick-tags" aria-label="Popular search topics">
                <span class="help-tag-label">Popular topics:</span>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Articles')">Articles &amp; Guides</button>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Open Dyslexic')">Open Dyslexic</button>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Progress')">Progress Tracking</button>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Teacher')">Teacher Mode</button>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Standards')">CCSS Standards</button>
                <button type="button" class="help-tag-btn" onclick="applySearchTag('Free')">100% Free</button>
            </div>
        </div>
    </div>
</section>

<main class="help-main-container" id="main-content" tabindex="-1">

    <!-- Role Selection Tabs -->
    <nav class="help-tabs-wrap" role="tablist" aria-label="Role Guides">
        <button onclick="switchTab('student')" id="tab-student"
            class="help-role-tab active"
            role="tab"
            aria-selected="true" 
            aria-controls="panel-student">
            <i class="fas fa-user-graduate"></i> <span>Student Guide</span>
        </button>
        <button onclick="switchTab('parent')" id="tab-parent"
            class="help-role-tab"
            role="tab"
            aria-selected="false" 
            aria-controls="panel-parent">
            <i class="fas fa-user-friends"></i> <span>Parent Guide</span>
        </button>
        <button onclick="switchTab('teacher')" id="tab-teacher"
            class="help-role-tab"
            role="tab"
            aria-selected="false" 
            aria-controls="panel-teacher">
            <i class="fas fa-chalkboard-teacher"></i> <span>Teacher Guide</span>
        </button>
    </nav>

    <!-- ====================================================================
         1. STUDENT PANEL
         ==================================================================== -->
    <section id="panel-student" class="help-role-panel active" role="tabpanel" aria-labelledby="tab-student">
        <div class="help-guides-grid three-col">
            <!-- Guide Card 1 -->
            <article class="help-guide-card">
                <div class="help-guide-bg-icon" aria-hidden="true">
                    <i class="fas fa-universal-access"></i>
                </div>
                <div class="help-guide-top">
                    <span class="help-guide-number indigo">1</span>
                    <h3 class="help-guide-title">Customize Your View</h3>
                </div>
                <p class="help-guide-text">
                    Personalize the interface to fit your reading comfort. Click the Universal Access icon in the bottom corner to:
                </p>
                <ul class="help-guide-list">
                    <li>
                        <i class="fas fa-font help-list-icon indigo" aria-hidden="true"></i>
                        <span>Switch to <strong>Open Dyslexic</strong> or clean sans-serif typography.</span>
                    </li>
                    <li>
                        <i class="fas fa-adjust help-list-icon indigo" aria-hidden="true"></i>
                        <span>Toggle <strong>Dark Mode</strong> or High Contrast color palettes.</span>
                    </li>
                    <li>
                        <i class="fas fa-ruler-vertical help-list-icon indigo" aria-hidden="true"></i>
                        <span>Increase text size, line height, and word spacing for easier reading.</span>
                    </li>
                </ul>
            </article>

            <!-- Guide Card 2 -->
            <article class="help-guide-card">
                <div class="help-guide-bg-icon" aria-hidden="true">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="help-guide-top">
                    <span class="help-guide-number emerald">2</span>
                    <h3 class="help-guide-title">Track Your Learning</h3>
                </div>
                <p class="help-guide-text">
                    Keep tabs on what you have mastered across grade levels. Check off skills as you progress:
                </p>
                <ul class="help-guide-list">
                    <li>
                        <i class="fas fa-magic help-list-icon emerald" aria-hidden="true"></i>
                        <span>Celebrate completion with celebration confetti animations!</span>
                    </li>
                    <li>
                        <i class="fas fa-save help-list-icon emerald" aria-hidden="true"></i>
                        <span>Progress is automatically remembered locally on this device.</span>
                    </li>
                    <li>
                        <i class="fas fa-undo help-list-icon emerald" aria-hidden="true"></i>
                        <span>Uncheck skills anytime if you'd like extra review or practice.</span>
                    </li>
                </ul>
            </article>

            <!-- Guide Card 3 -->
            <article class="help-guide-card">
                <div class="help-guide-bg-icon" aria-hidden="true">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="help-guide-top">
                    <span class="help-guide-number sky">3</span>
                    <h3 class="help-guide-title">Study Tools &amp; Library</h3>
                </div>
                <p class="help-guide-text">
                    Take advantage of built-in student productivity and reading utilities:
                </p>
                <ul class="help-guide-list">
                    <li>
                        <i class="fas fa-book help-list-icon sky" aria-hidden="true"></i>
                        <span>Read full classics online in the <strong>Digital Reader</strong> with voice narration.</span>
                    </li>
                    <li>
                        <i class="fas fa-pencil-alt help-list-icon sky" aria-hidden="true"></i>
                        <span>Use the bottom <strong>Scratchpad</strong> for note taking and calculations.</span>
                    </li>
                    <li>
                        <i class="fas fa-stopwatch help-list-icon sky" aria-hidden="true"></i>
                        <span>Set focus intervals with the integrated study timer.</span>
                    </li>
                </ul>
            </article>
        </div>
    </section>

    <!-- ====================================================================
         2. PARENT PANEL
         ==================================================================== -->
    <section id="panel-parent" class="help-role-panel" role="tabpanel" aria-labelledby="tab-parent">
        <!-- Privacy Banner -->
        <article class="help-privacy-card">
            <div class="help-privacy-icon" aria-hidden="true">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div>
                <h3 class="help-privacy-title">Privacy &amp; Child Safety First</h3>
                <p class="help-privacy-desc">
                    Hesten's Learning is engineered to be a safe, calm educational space for children. 
                    <strong>We do not require accounts, logins, emails, or personal data.</strong> 
                    All progress is kept purely in your browser's private local storage. No advertising, no tracking, and no data sales &mdash; ever.
                </p>
            </div>
        </article>

        <!-- Feature Cards -->
        <div class="help-features-grid">
            <div class="help-feature-card">
                <div class="help-feature-icon purple" aria-hidden="true">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h4 class="help-feature-title">Reading Guide &amp; Mask</h4>
                <p class="help-feature-desc">
                    Enable the "Reading Mask" in the accessibility bar to dim peripheral content and illuminate a single line at a time &mdash; ideal for readers who lose their place.
                </p>
            </div>
            <div class="help-feature-card">
                <div class="help-feature-icon orange" aria-hidden="true">
                    <i class="fas fa-award"></i>
                </div>
                <h4 class="help-feature-title">Academic Standards</h4>
                <p class="help-feature-desc">
                    Visit our <a href="/pages/standards.php">Standards Alignment Guide</a> to see how our curriculum maps directly to Common Core (CCSS) and Texas Essential Knowledge and Skills (TEKS).
                </p>
            </div>
            <div class="help-feature-card">
                <div class="help-feature-icon pink" aria-hidden="true">
                    <i class="fas fa-laptop-house"></i>
                </div>
                <h4 class="help-feature-title">Works on Any Device</h4>
                <p class="help-feature-desc">
                    Use seamlessly on iPads, Chromebooks, Android tablets, and desktop computers. Because data stays on-device for safety, progress is tracked per machine.
                </p>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         3. TEACHER PANEL
         ==================================================================== -->
    <section id="panel-teacher" class="help-role-panel" role="tabpanel" aria-labelledby="tab-teacher">
        <div class="help-teacher-layout">
            <div class="help-teacher-main">
                <h3 class="help-teacher-title">Empowering the Classroom</h3>
                <p class="help-teacher-desc">
                    Hesten's Learning is built as an open tool for Response to Intervention (RTI), special education classrooms, and small-group literacy instruction. Instant access without administrative login friction.
                </p>

                <div class="help-teacher-points">
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">1</div>
                        <div>
                            <h4 class="help-teacher-heading">Differentiated Instruction</h4>
                            <p class="help-teacher-body">
                                Direct students to specific skill levels based on individual mastery. A 6th-grade student can practice 3rd-grade reading or math without stigma, as the interface design remains consistent and age-neutral.
                            </p>
                        </div>
                    </div>
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">2</div>
                        <div>
                            <h4 class="help-teacher-heading">Interactive Display &amp; Projector Ready</h4>
                            <p class="help-teacher-body">
                                High contrast mode and scalable fonts ensure maximum legibility when projecting onto interactive smartboards or classroom screens from the back of the room.
                            </p>
                        </div>
                    </div>
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">3</div>
                        <div>
                            <h4 class="help-teacher-heading">Zero Roster Overhead</h4>
                            <p class="help-teacher-body">
                                No student accounts to set up, no roster CSVs to import, and no forgotten passwords. Perfect for station rotations, Chromebook carts, and substitute teacher plans.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Resources -->
            <aside class="help-teacher-sidebar">
                <h4 class="help-sidebar-title">Educator Resources</h4>
                <ul class="help-resource-list">
                    <li>
                        <a href="/pages/standards.php" class="help-resource-link">
                            <i class="fas fa-file-alt" aria-hidden="true"></i>
                            <span>CCSS &amp; TEKS Standards</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pages/teachers.php" class="help-resource-link">
                            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                            <span>Teachers' Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="/library/read/index.php?book=1984&chapter=teacher-resources" class="help-resource-link">
                            <i class="fas fa-book-reader" aria-hidden="true"></i>
                            <span>Digital Reader Educator Suite</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pages/contact.php" class="help-resource-link">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <span>Request Curriculum Features</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
    </section>

    <!-- ====================================================================
         ARTICLES & KNOWLEDGE BASE SECTION (Dynamically loaded from assets/text/*.md)
         ==================================================================== -->
    <section class="help-articles-section" aria-labelledby="articles-main-heading">
        <div class="help-articles-header">
            <span class="help-articles-badge">
                <i class="fas fa-newspaper"></i> Knowledge Base &amp; Articles
            </span>
            <h2 class="help-articles-title" id="articles-main-heading">Help Articles &amp; Updates</h2>
            <p class="help-articles-subtitle">In-depth guides, accessibility walkthroughs, and curriculum updates loaded directly from our documentation library.</p>
        </div>

        <div class="help-articles-grid" id="articles-container">
            <?php 
            $helpArticles = getHelpArticles();
            if (!empty($helpArticles)):
                foreach ($helpArticles as $article): 
            ?>
                <article class="help-article-card" id="article-card-<?= htmlspecialchars($article['id']) ?>" data-article-id="<?= htmlspecialchars($article['id']) ?>">
                    <div class="help-article-header">
                        <div class="help-article-icon <?= htmlspecialchars($article['iconClass']) ?>" aria-hidden="true">
                            <i class="<?= htmlspecialchars($article['icon']) ?>"></i>
                        </div>
                        <div class="help-article-badges">
                            <span class="help-article-file-tag"><?= htmlspecialchars($article['filename']) ?></span>
                            <span class="help-article-topic"><?= htmlspecialchars($article['topic']) ?></span>
                        </div>
                    </div>
                    <h3 class="help-article-title"><?= htmlspecialchars($article['title']) ?></h3>
                    <div class="help-article-meta">
                        <span><i class="far fa-clock" aria-hidden="true"></i> <?= htmlspecialchars($article['readTime']) ?></span>
                        <span>&bull;</span>
                        <span><i class="far fa-calendar-alt" aria-hidden="true"></i> <?= htmlspecialchars($article['lastModified']) ?></span>
                    </div>
                    <p class="help-article-excerpt"><?= htmlspecialchars($article['excerpt']) ?></p>
                    <button type="button" class="help-article-btn" onclick="openArticleModal('<?= htmlspecialchars($article['id']) ?>')" aria-haspopup="dialog" aria-label="Read full article: <?= htmlspecialchars($article['title']) ?>">
                        <span>Read Article</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </article>
            <?php 
                endforeach;
            else:
            ?>
                <p class="help-no-results is-visible">No documentation articles found with prefix "hc-".</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ====================================================================
         ARTICLE MODAL POPUP DIALOG
         ==================================================================== -->
    <div id="help-article-modal" class="help-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="help-modal-title">
        <div class="help-modal-dialog">
            <div class="help-modal-header">
                <div class="help-modal-badge-group">
                    <span id="help-modal-topic" class="help-article-topic"></span>
                    <span id="help-modal-readtime" class="help-modal-readtime">
                        <i class="far fa-clock" aria-hidden="true"></i> <span id="help-modal-readtime-text"></span>
                    </span>
                </div>
                <button type="button" class="help-modal-close" onclick="closeArticleModal()" aria-label="Close article popup">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="help-modal-body">
                <h2 id="help-modal-title" class="help-modal-title"></h2>
                <div class="help-modal-meta">
                    <span id="help-modal-date"></span>
                </div>
                <div id="help-modal-content" class="help-modal-article-content"></div>
            </div>
            <div class="help-modal-footer">
                <button type="button" class="help-modal-btn-close" onclick="closeArticleModal()">Close Article</button>
            </div>
        </div>
    </div>

    <!-- ====================================================================
         FAQ SECTION
         ==================================================================== -->
    <section class="help-faq-section" aria-labelledby="faq-main-heading">
        <div class="help-faq-header">
            <span class="help-faq-badge">
                <i class="fas fa-question"></i> Answers &amp; Solutions
            </span>
            <h2 class="help-faq-title" id="faq-main-heading">Frequently Asked Questions</h2>
            <p class="help-faq-subtitle">Quick answers to common questions about using Hesten's Learning.</p>
        </div>

        <div class="help-faq-container" id="faq-container">
            <!-- FAQ 1 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>Is Hesten's Learning really free?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>Yes, 100%. Hesten's Learning is a dedicated open educational project. There are no paywalls, locked tiers, subscriptions, or hidden charges. All curriculum levels and accessibility tools are freely available to everyone.</p>
                </div>
            </details>

            <!-- FAQ 2 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>How is my student's progress saved without an account?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>Progress is saved directly in your browser's private <code>LocalStorage</code> on that device. When a student marks a lesson completed, a checkmark is saved locally. No passwords or emails are required. Note that clearing your browser's site data will reset these checkmarks.</p>
                </div>
            </details>

            <!-- FAQ 3 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>What is the "Open Dyslexic" font and how do I turn it on?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>Open Dyslexic is a specialized typeface created to mitigate common reading errors caused by dyslexia. Letters feature gravity-weighted bottoms to help reader's brains determine letter orientation and prevent reversals (such as confusing 'b' and 'd'). You can turn it on anytime using the universal access menu in the bottom-right corner.</p>
                </div>
            </details>

            <!-- FAQ 4 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>How do teachers access the protected Teacher Resources in the reader?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>In our Digital Reader, educator materials (lesson plans, socratic discussion prompts, and verified answer keys) are located on the dedicated Teacher Resources page after all book chapters. This section is PIN protected to prevent students from viewing answer keys. Simply enter the teacher PIN to unlock full access.</p>
                </div>
            </details>

            <!-- FAQ 5 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>Can this site be used offline?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>An active internet connection is currently required to fetch book texts, curriculum data, and interactive exercises. Our Service Worker caches common assets, but full offline learning packs are in development.</p>
                </div>
            </details>

            <!-- FAQ 6 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>How do the levels map to CCSS and TEKS standards?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>All core subjects and learning levels are mapped directly against the Common Core State Standards (CCSS) for Mathematics and ELA, as well as the Texas Essential Knowledge and Skills (TEKS) framework. View the complete mapping matrix on our <a href="/pages/standards.php">Standards Alignment Guide</a>.</p>
                </div>
            </details>

            <!-- FAQ 7 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>What accessibility features are available for special education?</span>
                    <span class="faq-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    <p>We provide a comprehensive assistive suite: customizable line height and letter spacing, dyslexia-friendly fonts, high-contrast dark and sepia modes, an adjustable horizontal Reading Mask guide, Text-to-Speech audio narration in the digital reader, and full keyboard navigation support.</p>
                </div>
            </details>
        </div>

        <!-- No Results Fallback -->
        <div id="faq-no-results" class="help-no-results">
            <i class="fas fa-search" aria-hidden="true"></i>
            <h3>No matching questions found</h3>
            <p>Try searching for a different keyword or browse our role guides above.</p>
            <button type="button" class="help-reset-search-btn" onclick="clearSearch()">Clear Search &amp; Show All</button>
        </div>
    </section>

    <!-- Still Have Questions CTA -->
    <aside class="help-contact-cta" aria-labelledby="help-contact-title">
        <div class="help-contact-icon" aria-hidden="true">
            <i class="fas fa-comments"></i>
        </div>
        <h3 class="help-contact-title" id="help-contact-title">Still have questions or need assistance?</h3>
        <p class="help-contact-text">
            Our team is committed to making learning accessible and intuitive for everyone. Reach out anytime with questions, suggestions, or curriculum requests.
        </p>
        <div class="help-contact-actions">
            <a href="/pages/contact.php" class="help-btn-primary">
                <i class="fas fa-paper-plane"></i> Contact Us
            </a>
            <a href="mailto:admin@hestena62.com" class="help-btn-secondary">
                <i class="fas fa-envelope"></i> Email Support
            </a>
        </div>
    </aside>

</main>

<script>
    // --- Role Tab Switching ---
    function switchTab(role) {
        // 1. Update Tab Buttons
        document.querySelectorAll('.help-role-tab').forEach(btn => {
            const isActive = (btn.id === `tab-${role}`);
            btn.classList.toggle('active', isActive);
            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        // 2. Update Content Panels
        document.querySelectorAll('.help-role-panel').forEach(panel => {
            const isActive = (panel.id === `panel-${role}`);
            panel.classList.toggle('active', isActive);
        });
    }

    // --- Article Modal Popup Dictionary & Functions ---
    const helpArticlesData = <?= json_encode(array_column($helpArticles, null, 'id'), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
    let lastActiveArticleTrigger = null;

    function openArticleModal(articleId) {
        const article = helpArticlesData ? helpArticlesData[articleId] : null;
        if (!article) return;

        lastActiveArticleTrigger = document.activeElement;

        const modal = document.getElementById('help-article-modal');
        const modalTopic = document.getElementById('help-modal-topic');
        const modalReadtime = document.getElementById('help-modal-readtime-text');
        const modalTitle = document.getElementById('help-modal-title');
        const modalDate = document.getElementById('help-modal-date');
        const modalContent = document.getElementById('help-modal-content');

        if (modalTopic) {
            modalTopic.textContent = article.topic;
            modalTopic.className = `help-article-topic ${article.iconClass}`;
        }
        if (modalReadtime) modalReadtime.textContent = article.readTime;
        if (modalTitle) modalTitle.textContent = article.title;
        if (modalDate) modalDate.textContent = 'Last updated ' + article.lastModified;
        if (modalContent) modalContent.innerHTML = article.html;

        if (modal) {
            modal.classList.add('is-active');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('help-modal-locked');

            const closeBtn = modal.querySelector('.help-modal-close');
            if (closeBtn) closeBtn.focus();
        }
    }

    function closeArticleModal() {
        const modal = document.getElementById('help-article-modal');
        if (modal && modal.classList.contains('is-active')) {
            modal.classList.remove('is-active');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('help-modal-locked');

            if (lastActiveArticleTrigger) {
                lastActiveArticleTrigger.focus();
            }
        }
    }

    // Close modal on Escape or clicking backdrop
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeArticleModal();
        }
    });

    document.addEventListener('click', (e) => {
        const modal = document.getElementById('help-article-modal');
        if (modal && e.target === modal) {
            closeArticleModal();
        }
    });

    // --- Search Input & Multi-Section Filter (FAQ + Articles) ---
    function filterFAQ() {
        const input = document.getElementById('help-search');
        const query = input.value.trim().toLowerCase();
        const faqItems = document.querySelectorAll('.help-faq-item');
        const articleCards = document.querySelectorAll('.help-article-card');
        let faqMatches = 0;
        let articleMatches = 0;

        // Filter FAQs
        faqItems.forEach(item => {
            const question = item.querySelector('.help-faq-summary span')?.textContent.toLowerCase() || '';
            const answer = item.querySelector('.help-faq-content')?.textContent.toLowerCase() || '';

            if (query === '' || question.includes(query) || answer.includes(query)) {
                item.classList.remove('is-hidden');
                if (query !== '') {
                    item.setAttribute('open', 'true');
                } else {
                    item.removeAttribute('open');
                }
                faqMatches++;
            } else {
                item.classList.add('is-hidden');
                item.removeAttribute('open');
            }
        });

        // Filter Articles
        articleCards.forEach(card => {
            const id = card.getAttribute('data-article-id') || '';
            const article = helpArticlesData ? helpArticlesData[id] : null;
            const filename = article?.filename ? article.filename.toLowerCase() : '';
            const title = card.querySelector('.help-article-title')?.textContent.toLowerCase() || '';
            const topic = card.querySelector('.help-article-topic')?.textContent.toLowerCase() || '';
            const excerpt = card.querySelector('.help-article-excerpt')?.textContent.toLowerCase() || '';
            const full = article?.html ? article.html.toLowerCase() : '';

            if (query === '' || filename.includes(query) || id.includes(query) || title.includes(query) || topic.includes(query) || excerpt.includes(query) || full.includes(query)) {
                card.classList.remove('is-hidden');
                articleMatches++;
            } else {
                card.classList.add('is-hidden');
            }
        });

        const noResults = document.getElementById('faq-no-results');
        const totalMatches = faqMatches + articleMatches;
        if (noResults) {
            noResults.classList.toggle('is-visible', totalMatches === 0 && query !== '');
        }

        toggleSearchClear();
    }

    function toggleSearchClear() {
        const input = document.getElementById('help-search');
        const clearBtn = document.getElementById('help-search-clear-btn');
        if (clearBtn) {
            clearBtn.classList.toggle('is-visible', input.value.trim().length > 0);
        }
    }

    function clearSearch() {
        const input = document.getElementById('help-search');
        input.value = '';
        filterFAQ();
        input.focus();
    }

    function applySearchTag(tagText) {
        const input = document.getElementById('help-search');
        if (tagText.toLowerCase() === 'articles') {
            input.value = '';
            filterFAQ();
            const articlesSection = document.getElementById('articles-main-heading');
            if (articlesSection) {
                articlesSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        } else {
            input.value = tagText;
            filterFAQ();
            const faqSection = document.getElementById('faq-main-heading');
            if (faqSection) {
                faqSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    }
</script>

<?php include '../src/footer.php'; ?>