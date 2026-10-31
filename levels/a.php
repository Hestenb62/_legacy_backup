<?php
/**
 * Hesten's Learning - Level A (Pre-K)
 * Complete EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?a-math-m1-a-1 or ?lesson=a-math-m1-a-1)
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
    $levelUrl = 'a.php';
    $levelTitle = 'Level A';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "Pre-K Level A | Hesten's Learning";
$pageDescription = "Counting to 20, numeral recognition, shapes, comparison of length and weight, and early addition/subtraction stories.";
$pageKeywords    = "Pre-K, elementary math, EngageNY, Eureka Math, problem sets, worksheets";

// Template Variables
$themeColor = 'indigo';
$levelId = 'a';
$levelTitle = 'Level A';
$gradeText = 'Pre-K';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Counting to 20, numeral recognition, shapes, comparison of length and weight, and early addition/subtraction stories.';

$modules = [
    [
        'title' => 'Module 1: Counting to 5',
        'description' => 'Module 1: Counting to 5 for Pre-K students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'a-math-m1-a-1', 'code' => 'A.M1.A.1', 'name' => 'Match 2 objects that are exactly the same.', 'url' => 'a.php?a-math-m1-a-1'],
                    ['id' => 'a-math-m1-a-2', 'code' => 'A.M1.A.2', 'name' => 'Match 2 objects that are the same, but…', 'url' => 'a.php?a-math-m1-a-2'],
                    ['id' => 'a-math-m1-a-3', 'code' => 'A.M1.A.3', 'name' => 'Match 2 objects that are the same, but…', 'url' => 'a.php?a-math-m1-a-3'],
                    ['id' => 'a-math-m1-a-4', 'code' => 'A.M1.A.4', 'name' => 'Match 2 objects that are used together.', 'url' => 'a.php?a-math-m1-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'a-math-m1-b-1', 'code' => 'A.M1.B.1', 'name' => 'Make one group with a given attribute.', 'url' => 'a.php?a-math-m1-b-1'],
                    ['id' => 'a-math-m1-b-2', 'code' => 'A.M1.B.2', 'name' => 'Sort into two groups.', 'url' => 'a.php?a-math-m1-b-2'],
                    ['id' => 'a-math-m1-b-3', 'code' => 'A.M1.B.3', 'name' => 'Sort the same group of objects in two different ways.', 'url' => 'a.php?a-math-m1-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'a-math-m1-c-1', 'code' => 'A.M1.C.1', 'name' => 'Count up to 3 objects.', 'url' => 'a.php?a-math-m1-c-1'],
                    ['id' => 'a-math-m1-c-2', 'code' => 'A.M1.C.2', 'name' => 'Arrange and count up to 3 objects in scattered and linear configurations.', 'url' => 'a.php?a-math-m1-c-2'],
                    ['id' => 'a-math-m1-c-3', 'code' => 'A.M1.C.3', 'name' => 'Arrange and count up to 3 objects in scattered and linear configurations.', 'url' => 'a.php?a-math-m1-c-3'],
                    ['id' => 'a-math-m1-c-4', 'code' => 'A.M1.C.4', 'name' => 'Arrange and count up to 3 objects to play a game.', 'url' => 'a.php?a-math-m1-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'a-math-m1-d-1', 'code' => 'A.M1.D.1', 'name' => 'Match the numerals 1, 2, and 3 to quantities.', 'url' => 'a.php?a-math-m1-d-1'],
                    ['id' => 'a-math-m1-d-2', 'code' => 'A.M1.D.2', 'name' => 'Make a group of up to 3 objects and match the numeral (concrete to abstract).', 'url' => 'a.php?a-math-m1-d-2'],
                    ['id' => 'a-math-m1-d-3', 'code' => 'A.M1.D.3', 'name' => 'Look at a numeral and count out a group of objects to match (abstract to concrete).', 'url' => 'a.php?a-math-m1-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'a-math-m1-e-1', 'code' => 'A.M1.E.1', 'name' => 'Arrange and count up to 5 objects in scattered and linear configurations.', 'url' => 'a.php?a-math-m1-e-1'],
                    ['id' => 'a-math-m1-e-2', 'code' => 'A.M1.E.2', 'name' => 'Arrange and count up to 5 objects in scattered and linear configurations.', 'url' => 'a.php?a-math-m1-e-2'],
                    ['id' => 'a-math-m1-e-3', 'code' => 'A.M1.E.3', 'name' => 'Count fingers on the left hand from 1 to 5.', 'url' => 'a.php?a-math-m1-e-3'],
                    ['id' => 'a-math-m1-e-4', 'code' => 'A.M1.E.4', 'name' => 'Arrange and count 4 objects in an array configuration.', 'url' => 'a.php?a-math-m1-e-4'],
                    ['id' => 'a-math-m1-e-5', 'code' => 'A.M1.E.5', 'name' => 'Find embedded numbers within 4 and 5 objects.', 'url' => 'a.php?a-math-m1-e-5'],
                    ['id' => 'a-math-m1-e-6', 'code' => 'A.M1.E.6', 'name' => 'Arrange and count 5 objects in a circular configuration.', 'url' => 'a.php?a-math-m1-e-6'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'a-math-m1-f-1', 'code' => 'A.M1.F.1', 'name' => 'Count up to 4 objects and match the numerals.', 'url' => 'a.php?a-math-m1-f-1'],
                    ['id' => 'a-math-m1-f-2', 'code' => 'A.M1.F.2', 'name' => 'Count up to 5 objects and match the numerals.', 'url' => 'a.php?a-math-m1-f-2'],
                    ['id' => 'a-math-m1-f-3', 'code' => 'A.M1.F.3', 'name' => 'Make a group of up to 5 objects and match the numeral (concrete to abstract).', 'url' => 'a.php?a-math-m1-f-3'],
                    ['id' => 'a-math-m1-f-4', 'code' => 'A.M1.F.4', 'name' => 'Look at a numeral and count out a group of objects to match (abstract to concrete).', 'url' => 'a.php?a-math-m1-f-4'],
                    ['id' => 'a-math-m1-f-5', 'code' => 'A.M1.F.5', 'name' => 'Represent numbers 1—5 using objects, pictures, and numerals.', 'url' => 'a.php?a-math-m1-f-5'],
                    ['id' => 'a-math-m1-f-6', 'code' => 'A.M1.F.6', 'name' => 'Represent numbers 1—5 using objects, pictures, and numerals.', 'url' => 'a.php?a-math-m1-f-6'],
                    ['id' => 'a-math-m1-f-7', 'code' => 'A.M1.F.7', 'name' => 'Play a game involving numbers to 5.', 'url' => 'a.php?a-math-m1-f-7'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G',
                'skills' => [
                    ['id' => 'a-math-m1-g-1', 'code' => 'A.M1.G.1', 'name' => 'Count 1, 2, 3, 4, 5 with stories.', 'url' => 'a.php?a-math-m1-g-1'],
                    ['id' => 'a-math-m1-g-2', 'code' => 'A.M1.G.2', 'name' => 'Find 1 more.', 'url' => 'a.php?a-math-m1-g-2'],
                    ['id' => 'a-math-m1-g-3', 'code' => 'A.M1.G.3', 'name' => 'Build a tower by putting 1 more cube or block at a time.', 'url' => 'a.php?a-math-m1-g-3'],
                    ['id' => 'a-math-m1-g-4', 'code' => 'A.M1.G.4', 'name' => 'Build number stairs showing 1 more with cubes.', 'url' => 'a.php?a-math-m1-g-4'],
                    ['id' => 'a-math-m1-g-5', 'code' => 'A.M1.G.5', 'name' => 'Count up—What comes after?', 'url' => 'a.php?a-math-m1-g-5'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H',
                'skills' => [
                    ['id' => 'a-math-m1-h-1', 'code' => 'A.M1.H.1', 'name' => 'Build descending number stairs at the concrete and pictorial levels.', 'url' => 'a.php?a-math-m1-h-1'],
                    ['id' => 'a-math-m1-h-2', 'code' => 'A.M1.H.2', 'name' => 'Build descending number stairs at the concrete and pictorial levels.', 'url' => 'a.php?a-math-m1-h-2'],
                    ['id' => 'a-math-m1-h-3', 'code' => 'A.M1.H.3', 'name' => 'Count 5, 4, 3, 2, 1 using a story and the fingers of the left hand.', 'url' => 'a.php?a-math-m1-h-3'],
                    ['id' => 'a-math-m1-h-4', 'code' => 'A.M1.H.4', 'name' => 'Count 5, 4, 3, 2, 1 using a story and the fingers of the left hand.', 'url' => 'a.php?a-math-m1-h-4'],
                    ['id' => 'a-math-m1-h-5', 'code' => 'A.M1.H.5', 'name' => 'Culminating task—sort objects by use and count each group; represent one group with a number...', 'url' => 'a.php?a-math-m1-h-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Shapes',
        'description' => 'Module 2: Shapes for Pre-K students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'a-math-m2-a-1', 'code' => 'A.M2.A.1', 'name' => 'Find and describe circles, rectangles, squares, and triangles using informal language withou...', 'url' => 'a.php?a-math-m2-a-1'],
                    ['id' => 'a-math-m2-a-2', 'code' => 'A.M2.A.2', 'name' => 'Identify, analyze, sort, compare, and position triangles.', 'url' => 'a.php?a-math-m2-a-2'],
                    ['id' => 'a-math-m2-a-3', 'code' => 'A.M2.A.3', 'name' => 'Identify, analyze, sort, compare, and position rectangles and squares.', 'url' => 'a.php?a-math-m2-a-3'],
                    ['id' => 'a-math-m2-a-4', 'code' => 'A.M2.A.4', 'name' => 'Identify, analyze, sort, compare, and position circles.', 'url' => 'a.php?a-math-m2-a-4'],
                    ['id' => 'a-math-m2-a-5', 'code' => 'A.M2.A.5', 'name' => 'Identify, analyze, sort, compare, and position circles, rectangles, squares, and triangles.', 'url' => 'a.php?a-math-m2-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'a-math-m2-b-1', 'code' => 'A.M2.B.1', 'name' => 'Construct a triangle.', 'url' => 'a.php?a-math-m2-b-1'],
                    ['id' => 'a-math-m2-b-2', 'code' => 'A.M2.B.2', 'name' => 'Construct a rectangle and a square.', 'url' => 'a.php?a-math-m2-b-2'],
                    ['id' => 'a-math-m2-b-3', 'code' => 'A.M2.B.3', 'name' => 'Construct a circle.', 'url' => 'a.php?a-math-m2-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'a-math-m2-c-1', 'code' => 'A.M2.C.1', 'name' => 'Find and describe solid shapes using informal language without naming.', 'url' => 'a.php?a-math-m2-c-1'],
                    ['id' => 'a-math-m2-c-2', 'code' => 'A.M2.C.2', 'name' => 'Identify, analyze, sort, compare, and match solid shapes to their two-dimensional faces.', 'url' => 'a.php?a-math-m2-c-2'],
                    ['id' => 'a-math-m2-c-3', 'code' => 'A.M2.C.3', 'name' => 'Identify, analyze, sort, compare, and build with solid shapes.', 'url' => 'a.php?a-math-m2-c-3'],
                    ['id' => 'a-math-m2-c-4', 'code' => 'A.M2.C.4', 'name' => 'Position solid shapes to create a model of a familiar place.', 'url' => 'a.php?a-math-m2-c-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Counting to 10',
        'description' => 'Module 3: Counting to 10 for Pre-K students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'a-math-m3-a-1', 'code' => 'A.M3.A.1', 'name' => 'Introduce 6 and 7, and relate 6 to 5 and 1 more and 7 to 6 and 1 more.', 'url' => 'a.php?a-math-m3-a-1'],
                    ['id' => 'a-math-m3-a-2', 'code' => 'A.M3.A.2', 'name' => 'Use linear configurations to count 6 and 7 in relation to 5.', 'url' => 'a.php?a-math-m3-a-2'],
                    ['id' => 'a-math-m3-a-3', 'code' => 'A.M3.A.3', 'name' => 'Count to 6 and 7 left to right with fingers.', 'url' => 'a.php?a-math-m3-a-3'],
                    ['id' => 'a-math-m3-a-4', 'code' => 'A.M3.A.4', 'name' => 'Count to 6 and 7 left to right with fingers.', 'url' => 'a.php?a-math-m3-a-4'],
                    ['id' => 'a-math-m3-a-5', 'code' => 'A.M3.A.5', 'name' => 'Count 6 objects in array configurations.', 'url' => 'a.php?a-math-m3-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'a-math-m3-b-1', 'code' => 'A.M3.B.1', 'name' => 'Compose 6, and then decompose into two parts. Match to the numeral 6.', 'url' => 'a.php?a-math-m3-b-1'],
                    ['id' => 'a-math-m3-b-2', 'code' => 'A.M3.B.2', 'name' => 'Compose 7, and then decompose into two parts. Match to the numeral 7.', 'url' => 'a.php?a-math-m3-b-2'],
                    ['id' => 'a-math-m3-b-3', 'code' => 'A.M3.B.3', 'name' => 'Count 6 and 7 objects in circular configurations.', 'url' => 'a.php?a-math-m3-b-3'],
                    ['id' => 'a-math-m3-b-4', 'code' => 'A.M3.B.4', 'name' => 'Arrange and count 6 and 7 objects in varied configurations.', 'url' => 'a.php?a-math-m3-b-4'],
                    ['id' => 'a-math-m3-b-5', 'code' => 'A.M3.B.5', 'name' => 'Tally 6 and 7 objects.', 'url' => 'a.php?a-math-m3-b-5'],
                    ['id' => 'a-math-m3-b-6', 'code' => 'A.M3.B.6', 'name' => 'Look at a numeral and count out a group of up to 7 objects.', 'url' => 'a.php?a-math-m3-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'a-math-m3-c-1', 'code' => 'A.M3.C.1', 'name' => 'Introduce 8, and relate 8 to 7 and 1 more.', 'url' => 'a.php?a-math-m3-c-1'],
                    ['id' => 'a-math-m3-c-2', 'code' => 'A.M3.C.2', 'name' => 'Use linear configurations to count 8 in relation to 5.', 'url' => 'a.php?a-math-m3-c-2'],
                    ['id' => 'a-math-m3-c-3', 'code' => 'A.M3.C.3', 'name' => 'Count to 8 from left to right with fingers.', 'url' => 'a.php?a-math-m3-c-3'],
                    ['id' => 'a-math-m3-c-4', 'code' => 'A.M3.C.4', 'name' => 'Count 8 objects in array configurations.', 'url' => 'a.php?a-math-m3-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D follows the instructional path laid out in Topic B, matching a group of up to 8 objects to the numeral that tells how many (PK.CC.4).  The pre-written numeral is introduced in Topic D so that students have plenty of time to touch and count to 8 before matching the count to the abstract numeral.',
                'skills' => [
                    ['id' => 'a-math-m3-d-1', 'code' => 'A.M3.D.1', 'name' => 'Compose 8, and then decompose into two parts. Match to the numeral 8.', 'url' => 'a.php?a-math-m3-d-1'],
                    ['id' => 'a-math-m3-d-2', 'code' => 'A.M3.D.2', 'name' => 'Count 8 objects in circular configurations.', 'url' => 'a.php?a-math-m3-d-2'],
                    ['id' => 'a-math-m3-d-3', 'code' => 'A.M3.D.3', 'name' => 'Arrange and count 8 objects in varied configurations.', 'url' => 'a.php?a-math-m3-d-3'],
                    ['id' => 'a-math-m3-d-4', 'code' => 'A.M3.D.4', 'name' => 'Tally 8 objects.', 'url' => 'a.php?a-math-m3-d-4'],
                    ['id' => 'a-math-m3-d-5', 'code' => 'A.M3.D.5', 'name' => 'Look at a numeral and count out a group of up to 8 objects.', 'url' => 'a.php?a-math-m3-d-5'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E opens with an exciting new number, zero.  Children easily understand none and nothing when used in a meaningful context:  “I ate all of my crackers.  There are none left.”  In Lesson 21, children learn to describe nothing numerically, “I have 0 crackers.”  The concept of 0 is deceptively simple.  It is easy to work with and understand, but initially, it is not entirely clear to the student why it is needed.  Therefore, its introduction is delayed until students have sufficient familiarity with the number core to understand this new level of abstraction.  It is introduced prior to 10 since the numeral is used within 10 (in Grade 1 Module 2, 10 is understood as 1 ten and 0 ones).',
                'skills' => [
                    ['id' => 'a-math-m3-e-1', 'code' => 'A.M3.E.1', 'name' => 'Introduce zero.', 'url' => 'a.php?a-math-m3-e-1'],
                    ['id' => 'a-math-m3-e-2', 'code' => 'A.M3.E.2', 'name' => 'Introduce 9, and relate 9 to 8 and 1 more.', 'url' => 'a.php?a-math-m3-e-2'],
                    ['id' => 'a-math-m3-e-3', 'code' => 'A.M3.E.3', 'name' => 'Use linear configurations to count 9 in relation to 5.', 'url' => 'a.php?a-math-m3-e-3'],
                    ['id' => 'a-math-m3-e-4', 'code' => 'A.M3.E.4', 'name' => 'Count from 0 to 9 from left to right with fingers.', 'url' => 'a.php?a-math-m3-e-4'],
                    ['id' => 'a-math-m3-e-5', 'code' => 'A.M3.E.5', 'name' => 'Count 9 objects in array configurations.', 'url' => 'a.php?a-math-m3-e-5'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F follows the instructional path laid out in Topics B and D, with children matching groups of 0 and 9 objects to the numeral that tells how many (PK.CC.4).  As in previous topics, the numerals are prewritten.',
                'skills' => [
                    ['id' => 'a-math-m3-f-1', 'code' => 'A.M3.F.1', 'name' => 'Compose 9, and decompose into two parts. Match numerals 0 and 9 to no objects and 9 objects.', 'url' => 'a.php?a-math-m3-f-1'],
                    ['id' => 'a-math-m3-f-2', 'code' => 'A.M3.F.2', 'name' => 'Count 9 objects in circular configurations.', 'url' => 'a.php?a-math-m3-f-2'],
                    ['id' => 'a-math-m3-f-3', 'code' => 'A.M3.F.3', 'name' => 'Arrange and count 9 objects in varied configurations.', 'url' => 'a.php?a-math-m3-f-3'],
                    ['id' => 'a-math-m3-f-4', 'code' => 'A.M3.F.4', 'name' => 'Tally 9 objects.', 'url' => 'a.php?a-math-m3-f-4'],
                    ['id' => 'a-math-m3-f-5', 'code' => 'A.M3.F.5', 'name' => 'Look at a numeral and count out a group of up to 9 objects.', 'url' => 'a.php?a-math-m3-f-5'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G continues the pattern established in Topics A, C, and E.  Lesson 31 begins with students counting out 9 orange slices in horizontal 5-group formation.  They get 1 more orange slice and then touch and count 10 slices (PK.CC.3.c).  When the orange slices are eaten, the children count 0 orange slices.',
                'skills' => [
                    ['id' => 'a-math-m3-g-1', 'code' => 'A.M3.G.1', 'name' => 'Introduce 10, and relate 10 to 9 and 1 more.', 'url' => 'a.php?a-math-m3-g-1'],
                    ['id' => 'a-math-m3-g-2', 'code' => 'A.M3.G.2', 'name' => 'Use linear configurations to count 10 in relation to 5.', 'url' => 'a.php?a-math-m3-g-2'],
                    ['id' => 'a-math-m3-g-3', 'code' => 'A.M3.G.3', 'name' => 'Count from 0 to 10 from left to right with fingers.', 'url' => 'a.php?a-math-m3-g-3'],
                    ['id' => 'a-math-m3-g-4', 'code' => 'A.M3.G.4', 'name' => 'Count 10 objects in array configurations.', 'url' => 'a.php?a-math-m3-g-4'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H follows the instructional path laid out in Topics B, D, and F, with children matching groups of up to 10 objects to the numeral that tells how many (PK.CC.4).  As in previous topics, the numerals are prewritten.',
                'skills' => [
                    ['id' => 'a-math-m3-h-1', 'code' => 'A.M3.H.1', 'name' => 'Compose 10, and decompose into two parts. Match to the numeral 10.', 'url' => 'a.php?a-math-m3-h-1'],
                    ['id' => 'a-math-m3-h-2', 'code' => 'A.M3.H.2', 'name' => 'Decompose numbers 6—10.', 'url' => 'a.php?a-math-m3-h-2'],
                    ['id' => 'a-math-m3-h-3', 'code' => 'A.M3.H.3', 'name' => 'Arrange and count 10 objects in circular configurations.', 'url' => 'a.php?a-math-m3-h-3'],
                    ['id' => 'a-math-m3-h-4', 'code' => 'A.M3.H.4', 'name' => 'Count up to 10 objects in varied configurations.', 'url' => 'a.php?a-math-m3-h-4'],
                    ['id' => 'a-math-m3-h-5', 'code' => 'A.M3.H.5', 'name' => 'Count up to 10 objects in varied configurations.', 'url' => 'a.php?a-math-m3-h-5'],
                    ['id' => 'a-math-m3-h-6', 'code' => 'A.M3.H.6', 'name' => 'Tally 10 objects.', 'url' => 'a.php?a-math-m3-h-6'],
                    ['id' => 'a-math-m3-h-7', 'code' => 'A.M3.H.7', 'name' => 'Look at a numeral and count out a group of up to 10 objects.', 'url' => 'a.php?a-math-m3-h-7'],
                    ['id' => 'a-math-m3-h-8', 'code' => 'A.M3.H.8', 'name' => 'Culminating Task—represent numbers 610 using objects, images, and numerals in a number book.', 'url' => 'a.php?a-math-m3-h-8'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Comparison of Length, Weight, Capacity, and Numbers to 5',
        'description' => 'Module 4: Comparison of Length, Weight, Capacity, and Numbers to 5 for Pre-K students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'a-math-m4-a-1', 'code' => 'A.M4.A.1', 'name' => 'Identify the attribute of length by describing objects as tall or short.', 'url' => 'a.php?a-math-m4-a-1'],
                    ['id' => 'a-math-m4-a-2', 'code' => 'A.M4.A.2', 'name' => 'Compare length using taller than and shorter than with aligned and non-aligned endpoints.', 'url' => 'a.php?a-math-m4-a-2'],
                    ['id' => 'a-math-m4-a-3', 'code' => 'A.M4.A.3', 'name' => 'Compare length using longer than, shorter than, and about the same as with a simple straight...', 'url' => 'a.php?a-math-m4-a-3'],
                    ['id' => 'a-math-m4-a-4', 'code' => 'A.M4.A.4', 'name' => 'Compare length using longer than, shorter than, and the same as with a stick of linking cubes.', 'url' => 'a.php?a-math-m4-a-4'],
                    ['id' => 'a-math-m4-a-5', 'code' => 'A.M4.A.5', 'name' => 'Compare length using about the same as with a stick of linking cubes.', 'url' => 'a.php?a-math-m4-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B begins with children using correct vocabulary, heavy and light, to describe weight (again, as opposed to big and small).  In Lesson 6, students choose an object from a prepared bin of heavy and light objects (brick, stuffed animal, feather, mallet,) and describe it as heavy or light (PK.MD.1):  “This brick is heavy; it is hard to pick up!”  Afterward, students work cooperatively to find or draw pictures of heavy and light things and sort objects into a collage.',
                'skills' => [
                    ['id' => 'a-math-m4-b-1', 'code' => 'A.M4.B.1', 'name' => 'Identify the attribute of weight by describing objects as heavy or light.', 'url' => 'a.php?a-math-m4-b-1'],
                    ['id' => 'a-math-m4-b-2', 'code' => 'A.M4.B.2', 'name' => 'Compare weight using heavier than, lighter than, and about the same as.', 'url' => 'a.php?a-math-m4-b-2'],
                    ['id' => 'a-math-m4-b-3', 'code' => 'A.M4.B.3', 'name' => 'Compare weight using heavier than, lighter than, and the same as with balance scales.', 'url' => 'a.php?a-math-m4-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'a-math-m4-c-1', 'code' => 'A.M4.C.1', 'name' => 'Identify the attribute of volume by describing containers as big or small.', 'url' => 'a.php?a-math-m4-c-1'],
                    ['id' => 'a-math-m4-c-2', 'code' => 'A.M4.C.2', 'name' => 'Compare volume using more than or less than.', 'url' => 'a.php?a-math-m4-c-2'],
                    ['id' => 'a-math-m4-c-3', 'code' => 'A.M4.C.3', 'name' => 'Compare volume using the same as with sand and explore conservation.', 'url' => 'a.php?a-math-m4-c-3'],
                    ['id' => 'a-math-m4-c-4', 'code' => 'A.M4.C.4', 'name' => 'Find objects that match given length, weight, and volume comparison statements.', 'url' => 'a.php?a-math-m4-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'a-math-m4-d-1', 'code' => 'A.M4.D.1', 'name' => 'Identify first and last in a scattered configuration with 2—5 objects.', 'url' => 'a.php?a-math-m4-d-1'],
                    ['id' => 'a-math-m4-d-2', 'code' => 'A.M4.D.2', 'name' => 'Identify first and last in a linear configuration with 2—10 objects.', 'url' => 'a.php?a-math-m4-d-2'],
                    ['id' => 'a-math-m4-d-3', 'code' => 'A.M4.D.3', 'name' => 'Identify first and last in a circular configuration with 2—10 objects.', 'url' => 'a.php?a-math-m4-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'a-math-m4-e-1', 'code' => 'A.M4.E.1', 'name' => 'Compare: Match to find there are not enough.', 'url' => 'a.php?a-math-m4-e-1'],
                    ['id' => 'a-math-m4-e-2', 'code' => 'A.M4.E.2', 'name' => 'Compare: Match to find there are exactly enough.', 'url' => 'a.php?a-math-m4-e-2'],
                    ['id' => 'a-math-m4-e-3', 'code' => 'A.M4.E.3', 'name' => 'Compare: Match to find there are enough, with some extras.', 'url' => 'a.php?a-math-m4-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'a-math-m4-f-1', 'code' => 'A.M4.F.1', 'name' => 'Count and match to compare using fewer than statements.', 'url' => 'a.php?a-math-m4-f-1'],
                    ['id' => 'a-math-m4-f-2', 'code' => 'A.M4.F.2', 'name' => 'Count and match to compare using the same as statements.', 'url' => 'a.php?a-math-m4-f-2'],
                    ['id' => 'a-math-m4-f-3', 'code' => 'A.M4.F.3', 'name' => 'Count and match to compare using more than statements.', 'url' => 'a.php?a-math-m4-f-3'],
                    ['id' => 'a-math-m4-f-4', 'code' => 'A.M4.F.4', 'name' => 'Count and match to make sets that are the same as a group of objects.', 'url' => 'a.php?a-math-m4-f-4'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G',
                'skills' => [
                    ['id' => 'a-math-m4-g-1', 'code' => 'A.M4.G.1', 'name' => 'Compare a number of objects using more than or the same as statements.', 'url' => 'a.php?a-math-m4-g-1'],
                    ['id' => 'a-math-m4-g-2', 'code' => 'A.M4.G.2', 'name' => 'Compare numbers using greater than and equal to statements. Verify with materials.', 'url' => 'a.php?a-math-m4-g-2'],
                    ['id' => 'a-math-m4-g-3', 'code' => 'A.M4.G.3', 'name' => 'Compare a number of objects using less than or the same as statements.', 'url' => 'a.php?a-math-m4-g-3'],
                    ['id' => 'a-math-m4-g-4', 'code' => 'A.M4.G.4', 'name' => 'Compare numbers using less than and equal to statements. Verify with materials.', 'url' => 'a.php?a-math-m4-g-4'],
                    ['id' => 'a-math-m4-g-5', 'code' => 'A.M4.G.5', 'name' => 'Count and match to compare two sets of linking cube towers.', 'url' => 'a.php?a-math-m4-g-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Addition and Subtraction Stories and Counting to 20',
        'description' => 'Module 5: Addition and Subtraction Stories and Counting to 20 for Pre-K students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'a-math-m5-a-1', 'code' => 'A.M5.A.1', 'name' => 'Write numerals 0 and 1.', 'url' => 'a.php?a-math-m5-a-1'],
                    ['id' => 'a-math-m5-a-2', 'code' => 'A.M5.A.2', 'name' => 'Write numeral 2.', 'url' => 'a.php?a-math-m5-a-2'],
                    ['id' => 'a-math-m5-a-3', 'code' => 'A.M5.A.3', 'name' => 'Write numeral 3.', 'url' => 'a.php?a-math-m5-a-3'],
                    ['id' => 'a-math-m5-a-4', 'code' => 'A.M5.A.4', 'name' => 'Write numeral 4.', 'url' => 'a.php?a-math-m5-a-4'],
                    ['id' => 'a-math-m5-a-5', 'code' => 'A.M5.A.5', 'name' => 'Write numeral 5.', 'url' => 'a.php?a-math-m5-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B marks an exciting point in Pre-Kindergarten math learning as students begin exploring the addition of numbers to 5 through story problems.  They build on the comparison work of Module 4, so putting more indicates addition:  “If we have 3 apples and add 2 more, how many apples do we have altogether?” (PK.OA.1).  Throughout this exploration, students use concrete objects, pictures, or drawings to count the parts and total (PK.OA.1).',
                'skills' => [
                    ['id' => 'a-math-m5-b-1', 'code' => 'A.M5.B.1', 'name' => 'Act out add to with result unknown story problems to solve.', 'url' => 'a.php?a-math-m5-b-1'],
                    ['id' => 'a-math-m5-b-2', 'code' => 'A.M5.B.2', 'name' => 'Solve add to with result unknown story problems using objects from the story.', 'url' => 'a.php?a-math-m5-b-2'],
                    ['id' => 'a-math-m5-b-3', 'code' => 'A.M5.B.3', 'name' => 'Represent add to with result unknown story problems using number sentences.', 'url' => 'a.php?a-math-m5-b-3'],
                    ['id' => 'a-math-m5-b-4', 'code' => 'A.M5.B.4', 'name' => 'Solve put together with total unknown story problems with objects from the story and drawings.', 'url' => 'a.php?a-math-m5-b-4'],
                    ['id' => 'a-math-m5-b-5', 'code' => 'A.M5.B.5', 'name' => 'Create and solve addition story problems using drawings.', 'url' => 'a.php?a-math-m5-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'a-math-m5-c-1', 'code' => 'A.M5.C.1', 'name' => 'Act out take from with result unknown story problems to solve.', 'url' => 'a.php?a-math-m5-c-1'],
                    ['id' => 'a-math-m5-c-2', 'code' => 'A.M5.C.2', 'name' => 'Solve take from with result unknown story problems using objects from the story.', 'url' => 'a.php?a-math-m5-c-2'],
                    ['id' => 'a-math-m5-c-3', 'code' => 'A.M5.C.3', 'name' => 'Represent take from with result unknown story problems using number sentences.', 'url' => 'a.php?a-math-m5-c-3'],
                    ['id' => 'a-math-m5-c-4', 'code' => 'A.M5.C.4', 'name' => 'Solve take from with result unknown story problems with objects from the story and drawings.', 'url' => 'a.php?a-math-m5-c-4'],
                    ['id' => 'a-math-m5-c-5', 'code' => 'A.M5.C.5', 'name' => 'Create and solve subtraction story problems by drawing.', 'url' => 'a.php?a-math-m5-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D builds on the work of Topic B, again providing opportunities for children to solve addition story problems while taking a step forward by representing the objects in the story with fingers, counters, and simple drawings.  For example, in order to solve “2 apples and 1 more apple.  How many apples in all?” students decontextualize the story to represent the apples with their fingers.  To answer the problem, they must recognize that the answer is not simply 3 or 3 fingers, but rather, “There are 3 apples.”  In so responding, students have put the solution found on their fingers back into the context of the story (MP.2).',
                'skills' => [
                    ['id' => 'a-math-m5-d-1', 'code' => 'A.M5.D.1', 'name' => 'Solve addition story problems using fingers.', 'url' => 'a.php?a-math-m5-d-1'],
                    ['id' => 'a-math-m5-d-2', 'code' => 'A.M5.D.2', 'name' => 'Solve addition story problems using fingers.', 'url' => 'a.php?a-math-m5-d-2'],
                    ['id' => 'a-math-m5-d-3', 'code' => 'A.M5.D.3', 'name' => 'Solve addition story problems with representative objects.', 'url' => 'a.php?a-math-m5-d-3'],
                    ['id' => 'a-math-m5-d-4', 'code' => 'A.M5.D.4', 'name' => 'Solve addition story problems with representative drawings.', 'url' => 'a.php?a-math-m5-d-4'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E builds on the work of previous topics, providing opportunities for children to solve subtraction story problems with abstract representations (MP.4).  As in Topic D, children decontextualize the story and use fingers, counters, and simple drawings to represent the objects in the story (PK.OA.1).',
                'skills' => [
                    ['id' => 'a-math-m5-e-1', 'code' => 'A.M5.E.1', 'name' => 'Solve subtraction story problems using fingers.', 'url' => 'a.php?a-math-m5-e-1'],
                    ['id' => 'a-math-m5-e-2', 'code' => 'A.M5.E.2', 'name' => 'Solve subtraction story problems using fingers.', 'url' => 'a.php?a-math-m5-e-2'],
                    ['id' => 'a-math-m5-e-3', 'code' => 'A.M5.E.3', 'name' => 'Solve subtraction story problems with representative objects.', 'url' => 'a.php?a-math-m5-e-3'],
                    ['id' => 'a-math-m5-e-4', 'code' => 'A.M5.E.4', 'name' => 'Solve subtraction story problems with representative drawings.', 'url' => 'a.php?a-math-m5-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'a-math-m5-f-1', 'code' => 'A.M5.F.1', 'name' => 'Identify patterns using objects.', 'url' => 'a.php?a-math-m5-f-1'],
                    ['id' => 'a-math-m5-f-2', 'code' => 'A.M5.F.2', 'name' => 'Identify and duplicate patterns using sounds and movement. Represent those patterns with obj...', 'url' => 'a.php?a-math-m5-f-2'],
                    ['id' => 'a-math-m5-f-3', 'code' => 'A.M5.F.3', 'name' => 'Duplicate and extend patterns with movement and objects.', 'url' => 'a.php?a-math-m5-f-3'],
                    ['id' => 'a-math-m5-f-4', 'code' => 'A.M5.F.4', 'name' => 'Identify a growth pattern using objects.', 'url' => 'a.php?a-math-m5-f-4'],
                    ['id' => 'a-math-m5-f-5', 'code' => 'A.M5.F.5', 'name' => 'Culminating task—create a story problem and act it out in the Children\'s Math Theater.', 'url' => 'a.php?a-math-m5-f-5'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
