<?php
$chapterFile = '';

if (!empty($chapter)) {
    $candidate = __DIR__ . '/' . $chapter . '.php';
    if (is_file($candidate)) {
        $chapterFile = $candidate;
    }
}

if ($chapterFile !== '') {
    include $chapterFile;
    return;
}

include __DIR__ . '/../pg84-images.html';