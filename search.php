<?php
// search.php - Handles search queries
$query           = isset($_GET['q']) ? trim($_GET['q']) : '';
$pageTitle       = "Search Results for '$query' | Hesten's Learning";
$pageDescription = "Search results for learning materials.";

// Dynamic Search Implementation
$results = [];
if ($query !== '') {
    $searchDir = __DIR__; // Root directory
    $ignoreDirs = ['assets', 'src', 'logs', 'tmp', 'vendor', 'test', 'data'];
    $queryLower = strtolower($query);

    $iterator = new RecursiveIteratorIterator(
        new RecursiveCallbackFilterIterator(
            new RecursiveDirectoryIterator($searchDir, RecursiveDirectoryIterator::SKIP_DOTS),
            function ($current, $key, $iterator) use ($ignoreDirs, $searchDir) {
                if ($iterator->hasChildren()) {
                    $relativePath = str_replace($searchDir . DIRECTORY_SEPARATOR, '', $current->getPathname());
                    $parts = explode(DIRECTORY_SEPARATOR, $relativePath);
                    return !in_array($parts[0], $ignoreDirs);
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

            // Strip PHP and HTML to get clean text
            $cleanText = strip_tags(preg_replace('/<\?php.*?\?>/ms', '', $content));
            
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
                    $snippet = preg_replace('/(' . preg_quote($query, '/') . ')/i', '<strong style="color: var(--color-primary); background-color: rgba(79, 70, 229, 0.1); padding: 0 0.25rem; border-radius: 0.25rem;">$1</strong>', htmlspecialchars($snippet));
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

<main id="main-content" class="page-content-wrapper" style="min-height: 60vh;">
    <div style="max-width: 56rem; margin: 0 auto;">
        <h1 class="search-title" style="font-size: 2.25rem; font-weight: 900; background: linear-gradient(to right, var(--color-primary), var(--color-accent)); -webkit-background-clip: text; color: transparent; margin-bottom: 1.5rem; animation: fade-in-up 0.5s ease-out forwards;">
            Search Results
        </h1>

        <!-- Search Input Repetition -->
        <form action="/search.php" method="GET" style="margin-bottom: 2.5rem; animation: fade-in-up 0.5s ease-out forwards; animation-delay: 0.1s;">
            <div style="position: relative;" class="search-input-group">
                <input type="text" name="q" value="<?php echo htmlspecialchars($query); ?>"
                    placeholder="Search again..."
                    class="search-input"
                    style="width: 100%; background-color: var(--color-bg-surface); border: 2px solid var(--color-border); border-radius: 9999px; padding: 1rem 1rem 1rem 3rem; font-size: 1.125rem; color: var(--color-text-main); transition: all 0.2s; box-shadow: var(--shadow-md);">
                <i class="fas fa-search" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: rgba(156, 163, 175, 1); font-size: 1.25rem;"></i>
                <button type="submit"
                    style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background-color: var(--color-primary); color: white; padding: 0.5rem 1.5rem; border-radius: 9999px; font-weight: 700; border: none; cursor: pointer; transition: background-color 0.2s;">Search</button>
            </div>
        </form>

        <p style="color: var(--color-text-muted); margin-bottom: 2rem; font-size: 1.125rem; animation: fade-in-up 0.5s ease-out forwards; animation-delay: 0.2s;">
            <?php
            if ($query === '')
                echo "Please enter a search term above.";
            else
                echo count($results) . " result(s) found for \"<strong style='color: var(--color-primary);'>" . htmlspecialchars($query) . "</strong>\"";
            ?>
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="animation: fade-in-up 0.5s ease-out forwards; animation-delay: 0.3s;">
            <?php foreach ($results as $res) : ?>
                <article class="search-result-card" style="background-color: var(--color-bg-base); border-radius: 1rem; box-shadow: var(--shadow-lg); border: 1px solid var(--color-border); padding: 1.5rem; transition: all 0.3s;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">
                        <a href="<?php echo $res['link']; ?>" style="color: var(--color-text-main); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--color-primary)'; this.style.textDecoration='underline';" onmouseout="this.style.color='var(--color-text-main)'; this.style.textDecoration='none';">
                            <?php echo htmlspecialchars($res['title']); ?>
                        </a>
                    </h2>
                    <p style="color: var(--color-text-muted); margin-bottom: 1.5rem; font-size: 0.875rem; line-height: 1.625;">
                        <?php echo $res['desc']; ?>
                    </p>
                    <a href="<?php echo $res['link']; ?>"
                        class="search-visit-link" style="display: inline-flex; items-align: center; gap: 0.5rem; color: var(--color-primary); font-weight: 700; background-color: rgba(37, 99, 235, 0.1); padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; transition: all 0.2s;">
                        Visit Page <i class="fas fa-arrow-right" style="margin-top: 0.25rem;"></i>
                    </a>
                </article>
            <?php endforeach; ?>

            <?php if (count($results) === 0 && $query !== '') : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; background-color: rgba(255, 255, 255, 0.5); border-radius: 1.5rem; border: 2px dashed var(--color-border);">
                    <div style="width: 5rem; height: 5rem; background-color: var(--color-bg-surface); border-radius: 9999px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; font-size: 2.25rem; color: rgba(156, 163, 175, 1);">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 0.5rem;">No matches found</h3>
                    <p style="color: var(--color-text-muted);">We looked everywhere, but couldn't find what you were looking for.</p>
                    <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 1rem;">
                        <a href="/"
                            style="background-color: var(--color-primary); color: white; padding: 0.75rem 1.5rem; border-radius: 0.75rem; font-weight: 700; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3); transition: background-color 0.2s;">Go
                            Home</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<style>
    .search-input:focus {
        outline: none;
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2) !important;
    }
    .search-result-card:hover {
        box-shadow: var(--shadow-2xl) !important;
        transform: translateY(-0.25rem);
    }
    .search-visit-link:hover {
        gap: 1rem !important;
        background-color: rgba(37, 99, 235, 0.2) !important;
    }
</style>

<?php include 'src/footer.php'; ?>