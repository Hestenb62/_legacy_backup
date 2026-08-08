<?php
// search.php - Handles search queries
$query           = isset($_GET['q']) ? trim($_GET['q']) : '';
$pageTitle       = "Search Results for '$query' | Hesten's Learning";
$pageDescription = "Search results for learning materials.";

// Dynamic Search Implementation
$results = [];
if ($query !== '') {
    $searchDir = __DIR__; // Root directory
    
    // Expanded list of ignored directories to optimize search and avoid crash/timeout
    $ignoreDirs = [
        'assets', 'src', 'logs', 'tmp', 'vendor', 'test', 'data',
        '.git', '.agents', '.vscode', '.github', 'node_modules'
    ];
    
    $queryLower = strtolower($query);

    $iterator = new RecursiveIteratorIterator(
        new RecursiveCallbackFilterIterator(
            new RecursiveDirectoryIterator($searchDir, RecursiveDirectoryIterator::SKIP_DOTS),
            function ($current, $key, $iterator) use ($ignoreDirs, $searchDir) {
                // Ignore matching directories
                $relativePath = str_replace($searchDir . DIRECTORY_SEPARATOR, '', $current->getPathname());
                $parts = explode(DIRECTORY_SEPARATOR, $relativePath);
                if (in_array($parts[0], $ignoreDirs)) {
                    return false;
                }
                return true;
            }
        )
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php' && $file->getFilename() !== 'search.php') {
            $content = file_get_contents($file->getPathname());
            
            // Extract title
            $title = 'Untitled Page';
            if (preg_match('/\$pageTitle\s*=\s*["\']([^"\']+)["\'];/i', $content, $matches)) {
                $title = $matches[1];
            } elseif (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
                $title = $matches[1];
            }

            // Remove script and style tags WITH their contents to avoid matching raw code
            $cleanedContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $content);
            $cleanedContent = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $cleanedContent);

            // Strip PHP and HTML to get clean text
            $cleanText = strip_tags(preg_replace('/<\?php.*?\?>/ms', '', $cleanedContent));
            
            // Search match
            if (stripos($cleanText, $query) !== false || stripos($title, $query) !== false) {
                // Generate a snippet
                $pos = stripos($cleanText, $query);
                $snippet = '';
                if ($pos !== false) {
                    $start = max(0, $pos - 40);
                    $length = min(strlen($cleanText) - $start, 120);
                    $snippet = substr($cleanText, $start, $length);
                    // Add ellipses
                    if ($start > 0) $snippet = '...' . ltrim($snippet);
                    if ($start + $length < strlen($cleanText)) $snippet = rtrim($snippet) . '...';
                    
                    // Highlight the query in the snippet (case-insensitive)
                    $snippet = preg_replace(
                        '/(' . preg_quote($query, '/') . ')/i', 
                        '<strong style="color: var(--color-primary); background-color: color-mix(in srgb, var(--color-primary) 10%, transparent); padding: 0 0.25rem; border-radius: 0.25rem;">$1</strong>', 
                        htmlspecialchars($snippet)
                    );
                } else {
                    $snippet = 'Match found in title or metadata.';
                }

                // Get relative link
                $link = str_replace($searchDir, '', $file->getPathname());
                $link = str_replace('\\', '/', $link);

                $results[] = [
                    'title' => $title,
                    'desc'  => $snippet,
                    'link'  => $link
                ];
            }
        }
    }
}

include 'src/header.php';
?>
<link rel="stylesheet" href="/assets/css/pages/search.css">

<main id="main-content" class="search-container" style="min-height: 60vh;">
    <h1 class="search-title-gradient">
        Search Results
    </h1>

    <!-- Search Input Form -->
    <form action="/search.php" method="GET" class="search-form-card">
        <div class="search-input-group">
            <i class="fas fa-search search-input-icon"></i>
            <input type="text" name="q" value="<?php echo htmlspecialchars($query); ?>"
                placeholder="Search again..."
                class="search-page-input">
            <button type="submit" class="search-page-btn">Search</button>
        </div>
    </form>

    <p class="search-meta-text">
        <?php
        if ($query === '')
            echo "Please enter a search term above.";
        else
            echo count($results) . " result(s) found for \"<strong style='color: var(--color-primary);'>" . htmlspecialchars($query) . "</strong>\"";
        ?>
    </p>

    <div class="search-grid">
        <?php foreach ($results as $res) : ?>
            <article class="search-result-card">
                <div>
                    <h2 class="search-result-title">
                        <a href="<?php echo htmlspecialchars($res['link']); ?>" class="search-result-title-link">
                            <?php echo htmlspecialchars($res['title']); ?>
                        </a>
                    </h2>
                    <p class="search-result-desc">
                        <?php echo $res['desc']; ?>
                    </p>
                </div>
                <a href="<?php echo htmlspecialchars($res['link']); ?>" class="search-visit-link">
                    Visit Page <i class="fas fa-arrow-right"></i>
                </a>
            </article>
        <?php endforeach; ?>

        <?php if (count($results) === 0 && $query !== '') : ?>
            <div class="search-no-results">
                <div class="search-no-results-icon-box">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="search-no-results-title">No matches found</h3>
                <p class="search-no-results-desc">We looked everywhere, but couldn't find what you were looking for.</p>
                <div>
                    <a href="/" class="search-home-btn">Go Home</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'src/footer.php'; ?>