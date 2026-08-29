<?php
/**
 * Lesson Migration Script
 * Scans the /lessons directory and attempts to extract metadata into JSON.
 * Note: Because the original files are mixed HTML/PHP, this uses regex for basic extraction.
 * Complex interactive components are marked as "manual_migration_required".
 */

$lessonsDir = __DIR__ . '/lessons';
$outputFile = __DIR__ . '/assets/data/lessons.json';

if (!is_dir($lessonsDir)) {
    die("Lessons directory not found.\n");
}

$allLessons = [];
$files = glob("$lessonsDir/*.php");

echo "Starting migration of " . count($files) . " files...\n";

foreach ($files as $file) {
    $filename = basename($file);
    $id = str_replace('.php', '', $filename);
    $content = file_get_contents($file);

    // 1. Extract Meta
    preg_match('/\$pageTitle\s*=\s*["\']([^"\']+)["\']/', $content, $titleMatch);
    preg_match('/\$pageDescription\s*=\s*["\']([^"\']+)["\']/', $content, $descMatch);
    preg_match('/\$pageAuthor\s*=\s*["\']([^"\']+)["\']/', $content, $authorMatch);

    // 2. Extract Badge (looks for <span class="lesson-badge">...</span>)
    preg_match('/<span class="lesson-badge">.*?<i class="fas (.*?) lesson-badge-icon".*?><\/i> (.*?)<\/span>/s', $content, $badgeMatch);

    // 3. Extract Overview
    preg_match('/<h2 class="lesson-overview-title">(.*?)<\/h2>/s', $content, $ovTitleMatch);
    preg_match('/<span class="lesson-overview-pill">(.*?)<\/span>/s', $content, $ovPillMatch);
    preg_match('/<p class="lesson-overview-text">(.*?)<\/p>/s', $content, $ovTextMatch);

    // 4. Extract Outcomes
    preg_match_all('/<li>(.*?)<\/li>/s', $content, $outcomesMatch);
    $outcomes = array_slice($outcomesMatch[1], 0, 3); // Assume first 3 are core outcomes

    // 5. Extract Vocab
    preg_match_all('/<h4 class="lesson-vocab-title">(.*?)<\/h4>.*?<p class="lesson-vocab-text">(.*?)<\/p>/s', $content, $vocabMatch);
    $vocabulary = [];
    if (!empty($vocabMatch[0])) {
        for ($i = 0; $i < count($vocabMatch[1]); $i++) {
            $vocabulary[] = [
                'term' => trim($vocabMatch[1][$i]),
                'definition' => trim($vocabMatch[2][$i])
            ];
        }
    }

    $allLessons[$id] = [
        'meta' => [
            'title' => $titleMatch[1] ?? 'Untitled Lesson',
            'description' => $descMatch[1] ?? '',
            'author' => $authorMatch[1] ?? 'Hesten\'s Learning Team',
            'badge' => $badgeMatch[2] ?? 'Lesson',
            'badgeIcon' => $badgeMatch[1] ?? 'fa-book'
        ],
        'overview' => [
            'title' => trim($ovTitleMatch[1] ?? 'Lesson Overview'),
            'pill' => trim($ovPillMatch[1] ?? ''),
            'text' => trim($ovTextMatch[1] ?? ''),
            'outcomes' => $outcomes,
            'teacherInsight' => 'Migration: Please manually extract teacher insight from PHP file.'
        ],
        'content' => [
            [
                'type' => 'manual_migration_required',
                'note' => 'Interactive content must be migrated to components manually.'
            ]
        ],
        'vocabulary' => $vocabulary
    ];
}

$finalJson = ['lessons' => $allLessons];
file_put_contents($outputFile, json_encode($finalJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "Migration complete. Data written to $outputFile\n";
?>
