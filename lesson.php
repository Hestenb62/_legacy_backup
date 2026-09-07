<?php
// lesson.php (Central Router for Lessons)

$id = isset($_GET['id']) ? $_GET['id'] : '';

// Validate the ID to prevent directory traversal
if (!preg_match('/^[a-z0-9\-]+$/', $id)) {
    die("Invalid lesson ID");
}

$contentFile = __DIR__ . "/src/lessons-content/{$id}.php";

// If the lesson has been migrated to the new system
if (file_exists($contentFile)) {
    // The content file will define its variables, capture its HTML, and then include the layout
    require $contentFile;
} else {
    // Fallback for lessons that haven't been migrated yet
    $legacyFile = __DIR__ . "/lessons/{$id}.php";
    if (file_exists($legacyFile)) {
        // We can either redirect or just include it. Including is cleaner.
        require $legacyFile;
    } else {
        die("Lesson not found: " . htmlspecialchars($id));
    }
}
?>
