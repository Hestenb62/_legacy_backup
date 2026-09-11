<?php
// search.php - Comprehensive Global Site Search Engine
$query           = isset($_GET['q']) ? trim($_GET['q']) : '';
$activeCategory  = isset($_GET['category']) ? trim($_GET['category']) : 'all';
$pageTitle       = $query !== '' ? "Search Results for '$query' | Hesten's Learning" : "Search | Hesten's Learning";
$pageDescription = "Search across curriculum lessons, library books, assessments, student resources, and research papers.";

// Dynamic Search Implementation
$results = [];
$categoryCounts = [
    'all'        => 0,
    'lessons'    => 0,
    'library'    => 0,
    'levels'     => 0,
    'assessment' => 0,
    'student'    => 0,
    'research'   => 0,
    'pages'      => 0
];

if ($query !== '') {
    $rootDir = dirname(__DIR__); // Project root directory
    $queryLower = strtolower($query);

    // List of internal directories to skip
    $ignoreDirs = [
        'assets', 'src', 'logs', 'tmp', 'vendor', 'data',
        '.git', '.agents', '.vscode', '.github', 'node_modules',
        'test', '.php_tmp', '.tmp.driveupload', 'brain'
    ];

    // Helper: format lesson filename into a human-readable title
    if (!function_exists('formatLessonTitle')) {
        function formatLessonTitle($filename) {
            $base = pathinfo($filename, PATHINFO_FILENAME);
            // Pattern: k-math-m1-a-1 or similar
            $parts = explode('-', $base);
            if (count($parts) >= 4) {
                $gradeMap = [
                    'a' => 'Level A (Pre-K)',
                    'b' => 'Level B (Kindergarten)',
                    'c' => 'Level C (1st Grade)',
                    'd' => 'Level D (2nd Grade)',
                    'e' => 'Level E (3rd Grade)',
                    'f' => 'Level F (4th Grade)',
                    'g' => 'Level G (5th Grade)',
                    'h' => 'Level H (6th Grade)',
                    'i' => 'Level I (7th Grade)',
                    'j' => 'Level J (8th Grade)',
                    'k' => 'Level K (Grade 9)',
                    'l' => 'Level L (Grade 10)',
                    'm' => 'Level M (Grade 11)',
                    'n' => 'Level N (Grade 12)',
                    'o' => 'Level O (AP Prep)'
                ];
                $subjectMap = [
                    'math' => 'Math', 'ela' => 'ELA', 'sci' => 'Science', 'soc' => 'Social Studies'
                ];
                $grade = $gradeMap[strtolower($parts[0])] ?? strtoupper($parts[0]);
                $subject = $subjectMap[strtolower($parts[1])] ?? ucfirst($parts[1]);
                $module = strtoupper($parts[2]);
                $lesson = strtoupper(implode('-', array_slice($parts, 3)));
                return "$grade $subject • $module Lesson $lesson";
            }
            return ucwords(str_replace(['-', '_'], ' ', $base));
        }
    }

    // Helper: format level filename
    if (!function_exists('formatLevelTitle')) {
        function formatLevelTitle($filename) {
            $base = strtolower(pathinfo($filename, PATHINFO_FILENAME));
            $levelMap = [
                'a' => 'Level A (Pre-K / Early Readiness)',
                'b' => 'Level B (Kindergarten Curriculum)',
                'c' => 'Level C (1st Grade Curriculum)',
                'd' => 'Level D (2nd Grade Curriculum)',
                'e' => 'Level E (3rd Grade Curriculum)',
                'f' => 'Level F (4th Grade Curriculum)',
                'g' => 'Level G (5th Grade Curriculum)',
                'h' => 'Level H (6th Grade Curriculum)',
                'i' => 'Level I (7th Grade Curriculum)',
                'j' => 'Level J (8th Grade Curriculum)',
                'k' => 'Level K (High School 9-10 Curriculum)',
                'l' => 'Level L (High School 11-12 Curriculum)'
            ];
            return $levelMap[$base] ?? ('Level ' . strtoupper($base) . ' Curriculum Guide');
        }
    }

    // 1. CRAWL SITE FILES (.php and .md) - WITH CACHING
    $cacheFile = $rootDir . '/assets/data/.search-index-cache.json';
    $cacheTtl = 3600; // 1-hour TTL
    $siteDocs = null;

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTtl) && empty($_GET['nocache'])) {
        $cachedData = @json_decode(file_get_contents($cacheFile), true);
        if (is_array($cachedData) && !empty($cachedData)) {
            $siteDocs = $cachedData;
        }
    }

    if ($siteDocs === null) {
        $siteDocs = [];
        try {
            $dirIterator = new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS);
            $filterIterator = new RecursiveCallbackFilterIterator(
                $dirIterator,
                function ($current, $key, $iterator) use ($ignoreDirs, $rootDir) {
                    $pathname = str_replace('\\', '/', $current->getPathname());
                    $rootNorm = str_replace('\\', '/', $rootDir);
                    $prefix = $rootNorm . '/';
                    $relativePath = (stripos($pathname, $prefix) === 0) ? substr($pathname, strlen($prefix)) : $pathname;
                    
                    $parts = explode('/', $relativePath);
                    if (in_array($parts[0], $ignoreDirs, true)) {
                        return false;
                    }
                    return true;
                }
            );

            $iterator = new RecursiveIteratorIterator($filterIterator);
            $iterator->rewind();

            while ($iterator->valid()) {
                try {
                    $file = $iterator->current();

                    if ($file && $file->isFile()) {
                        $ext = strtolower($file->getExtension());
                        $filename = $file->getFilename();

                        // Process PHP and Markdown research files, skip self and root search.php/offline.php
                        if (($ext === 'php' || $ext === 'md') && $filename !== 'search.php' && $filename !== 'offline.php') {
                            $pathnameNorm = str_replace('\\', '/', $file->getPathname());
                            $rootNorm = str_replace('\\', '/', $rootDir);
                            $prefix = $rootNorm . '/';
                            $relPath = (stripos($pathnameNorm, $prefix) === 0) ? substr($pathnameNorm, strlen($prefix)) : $pathnameNorm;
                            $firstFolder = explode('/', $relPath)[0];

                            // Skip root utility files
                            if (strpos($relPath, '/') === false && $filename !== 'index.php') {
                                $iterator->next();
                                continue;
                            }

                            // Determine category and icon metadata
                            $category = 'pages';
                            $categoryName = 'Guide & Info';
                            $categoryIcon = 'fas fa-compass';
                            $actionLabel = 'Visit Page';

                            if ($firstFolder === 'lessons') {
                                $category = 'lessons';
                                $categoryName = 'Curriculum Lesson';
                                $categoryIcon = 'fas fa-graduation-cap';
                                $actionLabel = 'Start Lesson';
                            } elseif ($firstFolder === 'levels') {
                                $category = 'levels';
                                $categoryName = 'Curriculum Level';
                                $categoryIcon = 'fas fa-layer-group';
                                $actionLabel = 'Explore Level';
                            } elseif ($firstFolder === 'library') {
                                $category = 'library';
                                $categoryName = 'Digital Library';
                                $categoryIcon = 'fas fa-book-open';
                                $actionLabel = 'Read in Library';
                            } elseif ($firstFolder === 'research') {
                                $category = 'research';
                                $categoryName = 'Research Journal';
                                $categoryIcon = 'fas fa-microscope';
                                $actionLabel = 'View Paper';
                            } elseif ($firstFolder === 'assessment') {
                                $category = 'assessment';
                                $categoryName = 'Assessment';
                                $categoryIcon = 'fas fa-clipboard-check';
                                $actionLabel = 'Take Quiz';
                            } elseif ($firstFolder === 'student') {
                                $category = 'student';
                                $categoryName = 'Student Resource';
                                $categoryIcon = 'fas fa-user-graduate';
                                $actionLabel = 'Open Tool';
                            }

                            // Read file contents safely
                            $content = @file_get_contents($file->getPathname());
                            if ($content === false || strlen(trim($content)) === 0) {
                                $iterator->next();
                                continue;
                            }

                            // Extract title
                            $title = '';
                            if ($ext === 'php') {
                                if (preg_match('/\$pageTitle\s*=\s*["\']([^"\']+)["\'];/i', $content, $matches)) {
                                    $title = explode('|', $matches[1])[0];
                                } elseif (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
                                    $title = explode('|', $matches[1])[0];
                                } elseif (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $content, $matches)) {
                                    $title = strip_tags($matches[1]);
                                }
                            } elseif ($ext === 'md') {
                                if (preg_match('/^#\s+(.+)$/m', $content, $matches)) {
                                    $title = trim($matches[1]);
                                }
                            }

                            // Fallback title formatting
                            if (empty(trim($title))) {
                                if ($category === 'lessons') {
                                    $title = formatLessonTitle($filename);
                                } elseif ($category === 'levels') {
                                    $title = formatLevelTitle($filename);
                                } else {
                                    $title = ucwords(str_replace(['-', '_', '.php', '.md'], ' ', $filename));
                                }
                            }
                            $title = trim($title);

                            // Strip code, style, scripts, tags for text search
                            $cleanedContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $content);
                            $cleanedContent = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $cleanedContent);
                            $cleanedContent = preg_replace('/<\?(php|=)?.*?(\?>|$)/is', '', $cleanedContent);
                            $cleanText = strip_tags($cleanedContent);
                            $cleanText = html_entity_decode($cleanText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                            $cleanText = preg_replace('/\s+/', ' ', $cleanText);
                            $cleanText = mb_substr($cleanText, 0, 4000);

                            $siteDocs[] = [
                                'title'        => $title,
                                'relPath'      => $relPath,
                                'category'     => $category,
                                'categoryName' => $categoryName,
                                'categoryIcon' => $categoryIcon,
                                'actionLabel'  => $actionLabel,
                                'cleanText'    => $cleanText
                            ];
                        }
                    }
                } catch (Exception $e) {
                    // Skip locked/unreadable files safely
                }
                $iterator->next();
            }
        } catch (Exception $e) {
            // Safe directory iterator fallback
        }
        @file_put_contents($cacheFile, json_encode($siteDocs));
    }

    // Process matching documents from $siteDocs
    foreach ($siteDocs as $doc) {
        $cleanText = $doc['cleanText'];
        $title = $doc['title'];
        $relPath = $doc['relPath'];
        $category = $doc['category'];
        $categoryName = $doc['categoryName'];
        $categoryIcon = $doc['categoryIcon'];
        $actionLabel = $doc['actionLabel'];

        if (stripos($cleanText, $query) !== false || stripos($title, $query) !== false) {
            $pos = stripos($cleanText, $query);
            if ($pos !== false) {
                $start = max(0, $pos - 50);
                $length = min(strlen($cleanText) - $start, 150);
                $snippet = substr($cleanText, $start, $length);
                if ($start > 0) $snippet = '...' . ltrim($snippet);
                if ($start + $length < strlen($cleanText)) $snippet = rtrim($snippet) . '...';
            } else {
                $snippet = substr($cleanText, 0, 150);
                if (strlen($cleanText) > 150) $snippet .= '...';
            }

            // Highlight query match
            $highlightedSnippet = preg_replace(
                '/(' . preg_quote($query, '/') . ')/i',
                '<mark class="search-highlight">$1</mark>',
                htmlspecialchars($snippet, ENT_QUOTES, 'UTF-8')
            );

            $link = '/' . $relPath;

            $results[] = [
                'title'         => $title,
                'desc'          => $highlightedSnippet,
                'link'          => $link,
                'category'      => $category,
                'categoryName'  => $categoryName,
                'categoryIcon'  => $categoryIcon,
                'actionLabel'   => $actionLabel
            ];

            $categoryCounts['all']++;
            if (isset($categoryCounts[$category])) {
                $categoryCounts[$category]++;
            }
        }
    }

    // 2. INDEX DIGITAL LIBRARY BOOKS (from library/assets/bookd.json)
    $bookdFile = $rootDir . '/library/assets/bookd.json';
    if (file_exists($bookdFile)) {
        $bookdJson = @file_get_contents($bookdFile);
        if ($bookdJson) {
            $bookCatalog = @json_decode($bookdJson, true);
            if (is_array($bookCatalog)) {
                foreach ($bookCatalog as $genreName => $books) {
                    if (is_array($books)) {
                        foreach ($books as $b) {
                            $bTitle = $b['title'] ?? 'Untitled Book';
                            $bAuthor = $b['author'] ?? 'Unknown Author';
                            $bDesc = $b['description'] ?? '';
                            $bLexile = !empty($b['lexile']) ? "Lexile: {$b['lexile']}" : '';
                            $bGrade = !empty($b['grade']) ? $b['grade'] : '';
                            $bSearchText = "$bTitle $bAuthor $bDesc $genreName $bLexile $bGrade";

                            if (stripos($bSearchText, $query) !== false) {
                                $bLink = !empty($b['read-online-link']) && $b['read-online-link'] !== '#'
                                    ? $b['read-online-link']
                                    : '/library/index.php?book=' . urlencode($b['id'] ?? '');

                                $bSnippetText = $bDesc !== '' ? $bDesc : "By $bAuthor ($genreName, $bGrade)";
                                if ($bLexile) $bSnippetText .= " • $bLexile";

                                $highlightedSnippet = preg_replace(
                                    '/(' . preg_quote($query, '/') . ')/i',
                                    '<mark class="search-highlight">$1</mark>',
                                    htmlspecialchars($bSnippetText, ENT_QUOTES, 'UTF-8')
                                );

                                $results[] = [
                                    'title'         => $bTitle . (!empty($bAuthor) ? " — by $bAuthor" : ""),
                                    'desc'          => $highlightedSnippet,
                                    'link'          => $bLink,
                                    'category'      => 'library',
                                    'categoryName'  => 'Digital Library',
                                    'categoryIcon'  => 'fas fa-book-reader',
                                    'actionLabel'   => 'Read Online'
                                ];

                                $categoryCounts['all']++;
                                $categoryCounts['library']++;
                            }
                        }
                    }
                }
            }
        }
    }
}

include __DIR__ . '/../src/header.php';
?>
<link rel="stylesheet" href="/assets/css/pages/search.css">

<main id="main-content" class="search-container">
    <div class="search-header-box">
        <h1 class="search-title-gradient">
            <i class="fas fa-search-plus mr-2" aria-hidden="true"></i> Global Search
        </h1>
        <p class="search-subtitle">
            Explore lessons, library classics, research journals, standards, and student resources across all grade levels.
        </p>
    </div>

    <!-- Search Input Form -->
    <form action="/pages/search.php" method="GET" class="search-form-card" role="search">
        <div class="search-input-group">
            <i class="fas fa-search search-input-icon" aria-hidden="true"></i>
            <input type="text" name="q" value="<?php echo htmlspecialchars($query); ?>"
                placeholder="Search by topic, skill, book title, author, or standard code (e.g. 3.OA, Fractions, Orwell)..."
                class="search-page-input" autofocus aria-label="Search learning resources">
            <button type="submit" class="search-page-btn" aria-label="Submit search">Search</button>
        </div>
    </form>

    <?php if ($query !== '') : ?>
        <!-- Interactive Category Filter Chips -->
        <div class="search-filter-bar" role="tablist" aria-label="Filter results by section">
            <button type="button" class="search-filter-chip active" data-filter="all">
                <i class="fas fa-globe"></i> All Results 
                <span class="chip-count"><?php echo $categoryCounts['all']; ?></span>
            </button>
            <?php if ($categoryCounts['lessons'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="lessons">
                    <i class="fas fa-graduation-cap"></i> Lessons 
                    <span class="chip-count"><?php echo $categoryCounts['lessons']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['library'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="library">
                    <i class="fas fa-book-open"></i> Library Books 
                    <span class="chip-count"><?php echo $categoryCounts['library']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['levels'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="levels">
                    <i class="fas fa-layer-group"></i> Levels 
                    <span class="chip-count"><?php echo $categoryCounts['levels']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['assessment'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="assessment">
                    <i class="fas fa-clipboard-check"></i> Assessments 
                    <span class="chip-count"><?php echo $categoryCounts['assessment']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['student'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="student">
                    <i class="fas fa-user-graduate"></i> Student Tools 
                    <span class="chip-count"><?php echo $categoryCounts['student']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['research'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="research">
                    <i class="fas fa-microscope"></i> Research 
                    <span class="chip-count"><?php echo $categoryCounts['research']; ?></span>
                </button>
            <?php endif; ?>
            <?php if ($categoryCounts['pages'] > 0) : ?>
                <button type="button" class="search-filter-chip" data-filter="pages">
                    <i class="fas fa-compass"></i> Guides & Pages 
                    <span class="chip-count"><?php echo $categoryCounts['pages']; ?></span>
                </button>
            <?php endif; ?>
        </div>

        <p class="search-meta-text">
            Found <strong><?php echo count($results); ?></strong> resource(s) matching "<strong><?php echo htmlspecialchars($query); ?></strong>"
        </p>

        <!-- Search Results Grid -->
        <div class="search-grid" id="search-results-grid">
            <?php foreach ($results as $res) : ?>
                <article class="search-result-card" data-category="<?php echo htmlspecialchars($res['category']); ?>">
                    <div>
                        <div class="search-result-header">
                            <span class="search-category-badge badge-<?php echo htmlspecialchars($res['category']); ?>">
                                <i class="<?php echo htmlspecialchars($res['categoryIcon']); ?>"></i>
                                <?php echo htmlspecialchars($res['categoryName']); ?>
                            </span>
                            <span class="search-url-hint"><?php echo htmlspecialchars(dirname($res['link'])); ?></span>
                        </div>
                        <h2 class="search-result-title">
                            <a href="<?php echo htmlspecialchars($res['link']); ?>" class="search-result-title-link">
                                <?php echo htmlspecialchars($res['title']); ?>
                            </a>
                        </h2>
                        <p class="search-result-desc">
                            <?php echo $res['desc']; ?>
                        </p>
                    </div>
                    <div class="search-result-footer">
                        <a href="<?php echo htmlspecialchars($res['link']); ?>" class="search-visit-link">
                            <span><?php echo htmlspecialchars($res['actionLabel']); ?></span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>

            <?php if (count($results) === 0) : ?>
                <div class="search-no-results">
                    <div class="search-no-results-icon-box">
                        <i class="fas fa-search-minus"></i>
                    </div>
                    <h3 class="search-no-results-title">No matching learning resources found</h3>
                    <p class="search-no-results-desc">
                        We searched curriculum lessons, library books, research papers, and standards, but found no exact matches for "<strong><?php echo htmlspecialchars($query); ?></strong>".
                    </p>
                    <div class="search-suggestions-box">
                        <h4>Search Suggestions:</h4>
                        <ul>
                            <li>Try searching by subject: <a href="/pages/search.php?q=Math">Math</a>, <a href="/pages/search.php?q=Science">Science</a>, <a href="/pages/search.php?q=Grammar">Grammar</a></li>
                            <li>Explore literature: <a href="/pages/search.php?q=Orwell">Orwell</a>, <a href="/pages/search.php?q=Frankenstein">Frankenstein</a>, <a href="/pages/search.php?q=Dune">Dune</a></li>
                            <li>Search standards: <a href="/pages/search.php?q=3.OA">3.OA</a>, <a href="/pages/search.php?q=Fractions">Fractions</a>, <a href="/pages/standards.php">Standards Hub</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <!-- Empty Query State / Quick Browse Recommendations -->
        <div class="search-explore-section">
            <h2 class="search-explore-title"><i class="fas fa-compass"></i> Popular Categories & Quick Discovery</h2>
            <div class="search-explore-grid">
                <a href="/pages/search.php?q=Math" class="search-topic-tile">
                    <i class="fas fa-calculator topic-icon math-icon"></i>
                    <h3>Mathematics</h3>
                    <p>Early numeracy, algebraic thinking, fractions, and geometry lessons.</p>
                </a>
                <a href="/pages/search.php?q=Reading" class="search-topic-tile">
                    <i class="fas fa-book-reader topic-icon reading-icon"></i>
                    <h3>Reading & ELA</h3>
                    <p>Phonics, literary analysis, grammar guides, and digital books.</p>
                </a>
                <a href="/pages/search.php?q=Science" class="search-topic-tile">
                    <i class="fas fa-atom topic-icon science-icon"></i>
                    <h3>Science & NGSS</h3>
                    <p>Physical, life, and earth systems with diagrams and lab investigations.</p>
                </a>
                <a href="/pages/standards.php" class="search-topic-tile">
                    <i class="fas fa-bullseye topic-icon standards-icon"></i>
                    <h3>Standards Directory</h3>
                    <p>Browse CCSS, NGSS, and TEKS benchmarks from Pre-K to 12th Grade.</p>
                </a>
            </div>
        </div>
    <?php endif; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterChips = document.querySelectorAll('.search-filter-chip');
    const cards = document.querySelectorAll('.search-result-card');

    filterChips.forEach(chip => {
        chip.addEventListener('click', function() {
            filterChips.forEach(c => c.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            cards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php include __DIR__ . '/../src/footer.php'; ?>