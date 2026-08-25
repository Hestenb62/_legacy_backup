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
        'assets', 'src', 'logs', 'tmp', 'vendor', 'data',
        '.git', '.agents', '.vscode', '.github', 'node_modules', 'test'
    ];
    
    $queryLower = strtolower($query);

    try {
        $dirIterator = new RecursiveDirectoryIterator($searchDir, RecursiveDirectoryIterator::SKIP_DOTS);
        $filterIterator = new RecursiveCallbackFilterIterator(
            $dirIterator,
            function ($current, $key, $iterator) use ($ignoreDirs, $searchDir) {
                // Normalize paths to forward slashes
                $pathname = str_replace('\\', '/', $current->getPathname());
                $searchDirNorm = str_replace('\\', '/', $searchDir);
                
                // Case-insensitive prefix replacement to handle Windows drive casing anomalies
                $prefix = $searchDirNorm . '/';
                if (stripos($pathname, $prefix) === 0) {
                    $relativePath = substr($pathname, strlen($prefix));
                } else {
                    $relativePath = $pathname;
                }
                
                $parts = explode('/', $relativePath);
                if (in_array($parts[0], $ignoreDirs)) {
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
                
                if ($file && $file->isFile() && $file->getExtension() === 'php' && $file->getFilename() !== 'search.php') {
                    $content = @file_get_contents($file->getPathname());
                    if ($content === false) {
                        $iterator->next();
                        continue;
                    }
                    
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

                    // Strip all PHP tags (including short open tags <?= and <? ) and strip HTML tags
                    $cleanedContent = preg_replace('/<\?(php|=)?.*?(\?>|$)/is', '', $cleanedContent);
                    $cleanText = strip_tags($cleanedContent);
                    
                    // Decode HTML entities for accurate matching (e.g. &nbsp; or &amp;)
                    $cleanText = html_entity_decode($cleanText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    // Collapse multiple spaces to single spaces for cleaner snippets
                    $cleanText = preg_replace('/\s+/', ' ', $cleanText);
                    
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
                        } else {
                            // Fallback to start of page text if match is in title
                            $snippet = substr($cleanText, 0, 120);
                            if (strlen($cleanText) > 120) $snippet .= '...';
                        }

                        // Highlight the query in the snippet (case-insensitive)
                        $snippet = preg_replace(
                            '/(' . preg_quote($query, '/') . ')/i', 
                            '<strong style="color: var(--color-primary); background-color: color-mix(in srgb, var(--color-primary) 10%, transparent); padding: 0 0.25rem; border-radius: 0.25rem;">$1</strong>', 
                            htmlspecialchars($snippet)
                        );

                        // Get relative link case-insensitively
                        $filePathNorm = str_replace('\\', '/', $file->getPathname());
                        $searchDirNorm = str_replace('\\', '/', $searchDir);
                        $prefix = $searchDirNorm . '/';
                        if (stripos($filePathNorm, $prefix) === 0) {
                            $link = '/' . substr($filePathNorm, strlen($prefix));
                        } else {
                            $link = str_replace('\\', '/', str_replace($searchDir, '', $file->getPathname()));
                        }

                        $results[] = [
                            'title' => $title,
                            'desc'  => $snippet,
                            'link'  => $link
                        ];
                    }
                }
            } catch (UnexpectedValueException $e) {
                // Safely skip locked files/folders (e.g. OneDrive files not downloaded locally)
            } catch (Exception $e) {
                // Safely skip other standard file read exceptions
            }
            
            // Advance iterator
            try {
                $iterator->next();
            } catch (UnexpectedValueException $e) {
                // If advancing throws due to an inaccessible adjacent directory, skip it
            }
        }
    } catch (Exception $e) {
        // Fallback catch if core DirectoryIterator setup fails
    }
}

include '../src/header.php';
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

<?php include '../src/footer.php'; ?>