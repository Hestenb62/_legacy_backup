<?php
/**
 * Hesten's Learning - Level I (Grade 7)
 * Complete 139-lesson EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?i-math-m1-a-1 or ?lesson=i-math-m1-a-1)
$requestedLesson = null;
if (!empty($_GET['lesson'])) {
    $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim($_GET['lesson']));
} elseif (!empty($_SERVER['QUERY_STRING'])) {
    $rawQuery = trim(explode('&', $_SERVER['QUERY_STRING'])[0]);
    if (!empty($rawQuery) && !str_contains($rawQuery, '=')) {
        $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', $rawQuery);
    }
}

if (!empty($requestedLesson)) {
    // Dynamic JSON Lesson Router: Tiered Resolution (Module JSON -> Individual JSON -> Master Registry)
    $hasJson = false;
    $parts = explode('-', $requestedLesson);
    if (count($parts) >= 3) {
        $moduleKey = strtolower($parts[0] . '-' . $parts[1] . '-' . $parts[2]);
        $modLessonFile = dirname(__DIR__) . '/assets/data/lessons/' . $moduleKey . '.json';
        if (file_exists($modLessonFile)) {
            $modData = json_decode(file_get_contents($modLessonFile), true);
            if (isset($modData['lessons'][$requestedLesson])) {
                $hasJson = true;
            }
        }
    }

    if (!$hasJson) {
        $jsonLessonFile = dirname(__DIR__) . '/assets/data/lessons/' . $requestedLesson . '.json';
        $hasJson = file_exists($jsonLessonFile);
    }

    $mainLessonsFile = dirname(__DIR__) . '/assets/data/lessons.json';
    if (!$hasJson && file_exists($mainLessonsFile)) {
        $data = json_decode(file_get_contents($mainLessonsFile), true);
        if (isset($data['lessons'][$requestedLesson])) {
            $hasJson = true;
        }
    }

    $lessonId = $requestedLesson;
    $levelUrl = 'i.php';
    $levelTitle = 'Level I';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page-Specific Metadata
$pageTitle       = "7th Grade Level I | Hesten's Learning";
$pageDescription = "Proportions, integers, linear expressions, literature analysis, and argumentative writing for 7th-grade students.";
$pageKeywords    = "Grade 7, 7th Grade, proportional relationships, rational numbers, expressions, geometry, ELA, Literature, EngageNY";

// Template Variables
$themeColor = 'purple';
$levelId = 'i';
$levelTitle = 'Level I';
$gradeText = '7th Grade';
$initialSubject = (isset($_GET['subject']) && in_array(strtolower($_GET['subject']), ['math', 'ela', 'science', 'social']))
    ? strtolower($_GET['subject'])
    : 'math';
$initialSubjectName = ($initialSubject === 'ela') ? 'English Language Arts' : 'Math';
$initialSubjectDesc = ($initialSubject === 'ela')
    ? 'Close reading, literary analysis, argument craft, and research across 6 core modules.'
    : 'Proportional relationships, rational numbers, linear expressions, and geometry applications for 7th graders.';

// Dynamic Module Loader from curriculum-engageny-math.json
$modules = [];
$engPath = dirname(__DIR__) . '/assets/data/curriculum-engageny-math.json';
if (file_exists($engPath)) {
    $raw = json_decode(file_get_contents($engPath), true);
    if (!empty($raw['grades']['7th Grade']['modules'])) {
        foreach ($raw['grades']['7th Grade']['modules'] as $mod) {
            $modules[] = [
                'title' => $mod['title'],
                'description' => $mod['description'],
                'topics' => $mod['topics']
            ];
        }
    }
}

// Load the Master Template
include __DIR__ . '/../src/level_template.php';
?>
