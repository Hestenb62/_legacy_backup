<?php
// ====================================================================
// PLATFORM UPDATES FEED GENERATOR (RSS & JSON)
// Hesten's Learning Platform - Engineering Logs & Implementation Walkthroughs
// ====================================================================

declare(strict_types=1);

// Set CORS and Cache Headers
header("Access-Control-Allow-Origin: *");
header("Cache-Control: public, max-age=300, stale-while-revalidate=600");

$docsDir = __DIR__ . '/docs';
$mdFiles = glob($docsDir . '/*.md');

/**
 * Parses markdown frontmatter and content for the feed.
 */
function parseFeedDoc(string $filePath): ?array {
    $raw = file_get_contents($filePath);
    if ($raw === false) return null;

    $filename = basename($filePath);
    $meta = [
        'id' => pathinfo($filename, PATHINFO_FILENAME),
        'filename' => $filename,
        'title' => '',
        'date' => '',
        'category' => 'Update',
        'tags' => [],
        'summary' => '',
        'author' => "Antigravity & Hesten",
        'content' => ''
    ];

    $content = $raw;

    // Parse YAML Frontmatter
    if (preg_match('/^---\s*[\r\n]+([\s\S]*?)[\r\n]+---\s*[\r\n]+([\s\S]*)$/', $raw, $matches)) {
        $frontmatter = $matches[1];
        $content = $matches[2];

        foreach (explode("\n", $frontmatter) as $line) {
            $line = trim($line);
            if (empty($line) || str_starts_with($line, '#')) continue;

            if (preg_match('/^([a-zA-Z0-9_-]+)\s*:\s*(.+)$/', $line, $fMatch)) {
                $key = strtolower(trim($fMatch[1]));
                $val = trim($fMatch[2], " \t\n\r\0\x0B\"'");

                if ($key === 'tags') {
                    if (str_starts_with($val, '[') && str_ends_with($val, ']')) {
                        $inner = substr($val, 1, -1);
                        $meta['tags'] = array_map(function($t) {
                            return trim($t, " \t\n\r\0\x0B\"'");
                        }, explode(',', $inner));
                    } else {
                        $meta['tags'] = array_map('trim', explode(',', $val));
                    }
                } else {
                    $meta[$key] = $val;
                }
            }
        }
    }

    $meta['content'] = trim($content);

    // Fallback title
    if (empty($meta['title'])) {
        if (preg_match('/^#\s+(.+)$/m', $content, $hMatch)) {
            $meta['title'] = trim($hMatch[1]);
        } else {
            $cleanName = preg_replace('/^\d{4}-\d{2}-\d{2}[-_]?/', '', $meta['id']);
            $meta['title'] = ucwords(str_replace(['-', '_'], ' ', $cleanName));
        }
    }

    // Fallback date
    if (empty($meta['date'])) {
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', $meta['id'], $dMatch)) {
            $meta['date'] = $dMatch[1];
        } else {
            $meta['date'] = date('Y-m-d', filemtime($filePath));
        }
    }

    // Fallback summary
    if (empty($meta['summary'])) {
        foreach (explode("\n", $content) as $line) {
            $trimmed = trim($line);
            if (empty($trimmed) || str_starts_with($trimmed, '#') || str_starts_with($trimmed, '>') || str_starts_with($trimmed, '---')) continue;
            $cleanP = preg_replace('/\[(.*?)\]\((.*?)\)/', '$1', $trimmed);
            $cleanP = preg_replace('/[*_`]/', '', $cleanP);
            $meta['summary'] = mb_substr($cleanP, 0, 200) . (mb_strlen($cleanP) > 200 ? '...' : '');
            break;
        }
        if (empty($meta['summary'])) {
            $meta['summary'] = "Detailed engineering documentation for " . $meta['title'] . ".";
        }
    }

    return $meta;
}

$docs = [];
if ($mdFiles) {
    foreach ($mdFiles as $file) {
        $doc = parseFeedDoc($file);
        if ($doc) $docs[] = $doc;
    }
}

// Sort documents newest first
usort($docs, function($a, $b) {
    return strcmp($b['date'], $a['date']) ?: strcmp($b['id'], $a['id']);
});

// Parse QUERY_STRING fallback if $_GET is empty (CLI or FastCGI environments)
if (empty($_GET) && !empty($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING'], $cliGet);
    $_GET = $cliGet;
}

// Category filter
$filterCat = isset($_GET['category']) ? trim((string)$_GET['category']) : null;
if ($filterCat && $filterCat !== 'ALL') {
    $docs = array_values(array_filter($docs, function($d) use ($filterCat) {
        return strcasecmp($d['category'], $filterCat) === 0;
    }));
}

// Limit
$limit = isset($_GET['limit']) ? max(1, min(100, (int)$_GET['limit'])) : 50;
$docs = array_slice($docs, 0, $limit);

// Detect format: rss, xml, or json (default)
$format = strtolower(trim((string)($_GET['format'] ?? 'json')));
$host = $_SERVER['HTTP_HOST'] ?? 'hestenas62.com';
$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$baseUrl = $proto . '://' . $host;

if ($format === 'rss' || $format === 'xml') {
    header("Content-Type: application/rss+xml; charset=utf-8");
    $lastBuildDate = !empty($docs[0]['date']) ? date('r', strtotime($docs[0]['date'])) : date('r');

    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>Hesten's Learning - Platform Updates &amp; Engineering Logs</title>
    <link><?= htmlspecialchars($baseUrl . '/updates/') ?></link>
    <description>Chronological walkthroughs, implementation plans, bugfix documents, and release roadmaps for Hesten's Learning platform.</description>
    <language>en-us</language>
    <lastBuildDate><?= $lastBuildDate ?></lastBuildDate>
    <atom:link href="<?= htmlspecialchars($baseUrl . ($_SERVER['REQUEST_URI'] ?? '/updates/feed.php?format=rss')) ?>" rel="self" type="application/rss+xml" />
    <generator>Hesten's Learning Updates Engine</generator>
    <?php foreach ($docs as $d): 
        $docUrl = $baseUrl . '/updates/?doc=' . urlencode($d['id']);
        $pubDate = date('r', strtotime($d['date']));
    ?>
    <item>
      <title><?= htmlspecialchars($d['title']) ?></title>
      <link><?= htmlspecialchars($docUrl) ?></link>
      <guid isPermaLink="true"><?= htmlspecialchars($docUrl) ?></guid>
      <pubDate><?= $pubDate ?></pubDate>
      <author><?= htmlspecialchars($d['author']) ?></author>
      <category><?= htmlspecialchars($d['category']) ?></category>
      <description><![CDATA[<?= $d['summary'] ?>]]></description>
    </item>
    <?php endforeach; ?>
  </channel>
</rss>
<?php
    exit;
}

// JSON Feed (Default)
header("Content-Type: application/json; charset=utf-8");

$items = array_map(function($d) use ($baseUrl) {
    return [
        'id' => $d['id'],
        'url' => $baseUrl . '/updates/?doc=' . urlencode($d['id']),
        'title' => $d['title'],
        'summary' => $d['summary'],
        'date_published' => $d['date'],
        'category' => $d['category'],
        'tags' => $d['tags'],
        'author' => [
            'name' => $d['author']
        ]
    ];
}, $docs);

echo json_encode([
    'version' => 'https://jsonfeed.org/version/1.1',
    'title' => "Hesten's Learning - Platform Updates & Engineering Logs",
    'home_page_url' => $baseUrl . '/updates/',
    'feed_url' => $baseUrl . '/updates/feed.php?format=json',
    'description' => "Chronological archive of platform implementation plans, walkthroughs, and architectural documents.",
    'total_count' => count($items),
    'items' => $items
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
