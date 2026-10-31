<?php
/**
 * Hesten's Learning - Level B (Kindergarten)
 * Complete EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?b-math-m1-a-1 or ?lesson=b-math-m1-a-1)
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
    $levelUrl = 'b.php';
    $levelTitle = 'Level B';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "Kindergarten Level B | Hesten's Learning";
$pageDescription = "Numbers to 100, number pairs, addition and subtraction to 10, two- and three-dimensional shapes, and measurement comparison.";
$pageKeywords    = "Kindergarten, elementary math, EngageNY, Eureka Math, problem sets, worksheets";

// Template Variables
$themeColor = 'teal';
$levelId = 'b';
$levelTitle = 'Level B';
$gradeText = 'Kindergarten';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Numbers to 100, number pairs, addition and subtraction to 10, two- and three-dimensional shapes, and measurement comparison.';

$modules = [
    [
        'title' => 'Module 1: Numbers to 10',
        'description' => 'Module 1: Numbers to 10 for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m1-a-1', 'code' => 'B.M1.A.1', 'name' => 'Analyze to find two objects that are exactly the same or not exactly the same.', 'url' => 'b.php?b-math-m1-a-1'],
                    ['id' => 'b-math-m1-a-2', 'code' => 'B.M1.A.2', 'name' => 'Analyze to find two similar objects—these are the same but…', 'url' => 'b.php?b-math-m1-a-2'],
                    ['id' => 'b-math-m1-a-3', 'code' => 'B.M1.A.3', 'name' => 'Classify to find two objects that share a visual pattern, color, and use.', 'url' => 'b.php?b-math-m1-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'b-math-m1-b-1', 'code' => 'B.M1.B.1', 'name' => 'Classify items into two pre-determined categories.', 'url' => 'b.php?b-math-m1-b-1'],
                    ['id' => 'b-math-m1-b-2', 'code' => 'B.M1.B.2', 'name' => 'Classify items into three categories, determine the count in each, and reason about how the ...', 'url' => 'b.php?b-math-m1-b-2'],
                    ['id' => 'b-math-m1-b-3', 'code' => 'B.M1.B.3', 'name' => 'Sort categories by count. Identify categories with 2, 3, and 4 within a given scenario.', 'url' => 'b.php?b-math-m1-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'b-math-m1-c-1', 'code' => 'B.M1.C.1', 'name' => 'Sort by count in vertical columns and horizontal rows (linear configurations to 5). Match to...', 'url' => 'b.php?b-math-m1-c-1'],
                    ['id' => 'b-math-m1-c-2', 'code' => 'B.M1.C.2', 'name' => 'Answer how many questions to 5 in linear configurations (5-group), with 4 in an array config...', 'url' => 'b.php?b-math-m1-c-2'],
                    ['id' => 'b-math-m1-c-3', 'code' => 'B.M1.C.3', 'name' => 'Within linear and array dot configurations of numbers 3, 4, and 5, find hidden partners.', 'url' => 'b.php?b-math-m1-c-3'],
                    ['id' => 'b-math-m1-c-4', 'code' => 'B.M1.C.4', 'name' => 'Within circular and scattered dot configurations of numbers 3, 4, and 5, find hidden partners.', 'url' => 'b.php?b-math-m1-c-4'],
                    ['id' => 'b-math-m1-c-5', 'code' => 'B.M1.C.5', 'name' => 'Model decompositions of 3 with materials, drawings, and expressions. Represent the decomposi...', 'url' => 'b.php?b-math-m1-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'b-math-m1-d-1', 'code' => 'B.M1.D.1', 'name' => 'Understand the meaning of zero. Write the numeral 0.', 'url' => 'b.php?b-math-m1-d-1'],
                    ['id' => 'b-math-m1-d-2', 'code' => 'B.M1.D.2', 'name' => 'Order and write numerals 0—3 to answer how many questions.', 'url' => 'b.php?b-math-m1-d-2'],
                    ['id' => 'b-math-m1-d-3', 'code' => 'B.M1.D.3', 'name' => 'Write numerals 1—3. Represent decompositions with materials, drawings, and equations, 3 = 2 ...', 'url' => 'b.php?b-math-m1-d-3'],
                    ['id' => 'b-math-m1-d-4', 'code' => 'B.M1.D.4', 'name' => 'Order and write numerals 4 and 5 to answer how many questions in categories; sort by count.', 'url' => 'b.php?b-math-m1-d-4'],
                    ['id' => 'b-math-m1-d-5', 'code' => 'B.M1.D.5', 'name' => 'Write numerals 1—5 in order. Answer and make drawings of decompositions with totals of 4 and...', 'url' => 'b.php?b-math-m1-d-5'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'b-math-m1-e-1', 'code' => 'B.M1.E.1', 'name' => 'Count 4—6 objects in vertical and horizontal linear configurations and array configurations....', 'url' => 'b.php?b-math-m1-e-1'],
                    ['id' => 'b-math-m1-e-2', 'code' => 'B.M1.E.2', 'name' => 'Count 4—6 objects in circular and scattered configurations. Count 6 items out of a larger se...', 'url' => 'b.php?b-math-m1-e-2'],
                    ['id' => 'b-math-m1-e-3', 'code' => 'B.M1.E.3', 'name' => 'Count 5─7 linking cubes in linear configurations. Match with numeral 7. Count on fingers fro...', 'url' => 'b.php?b-math-m1-e-3'],
                    ['id' => 'b-math-m1-e-4', 'code' => 'B.M1.E.4', 'name' => 'Reason about sets of 7 varied objects in circular and scattered configurations. Find a path ...', 'url' => 'b.php?b-math-m1-e-4'],
                    ['id' => 'b-math-m1-e-5', 'code' => 'B.M1.E.5', 'name' => 'Compare counts of 8 in linear and array configurations. Match with numeral 8.', 'url' => 'b.php?b-math-m1-e-5'],
                    ['id' => 'b-math-m1-e-6', 'code' => 'B.M1.E.6', 'name' => 'Arrange and strategize to count 8 beans in circular (around a cup) and scattered configurati...', 'url' => 'b.php?b-math-m1-e-6'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'b-math-m1-f-1', 'code' => 'B.M1.F.1', 'name' => 'Organize and count 9 varied geometric objects in linear and array (3 threes) configurations....', 'url' => 'b.php?b-math-m1-f-1'],
                    ['id' => 'b-math-m1-f-2', 'code' => 'B.M1.F.2', 'name' => 'Strategize to count 9 objects in circular (around a paper plate) and scattered configuration...', 'url' => 'b.php?b-math-m1-f-2'],
                    ['id' => 'b-math-m1-f-3', 'code' => 'B.M1.F.3', 'name' => 'Count 10 objects in linear and array configurations (2 fives). Match with numeral 10. Place ...', 'url' => 'b.php?b-math-m1-f-3'],
                    ['id' => 'b-math-m1-f-4', 'code' => 'B.M1.F.4', 'name' => 'Count 10 objects in linear and array configurations (2 fives). Match with numeral 10. Place ...', 'url' => 'b.php?b-math-m1-f-4'],
                    ['id' => 'b-math-m1-f-5', 'code' => 'B.M1.F.5', 'name' => 'Count 10 objects, and move between all configurations.', 'url' => 'b.php?b-math-m1-f-5'],
                    ['id' => 'b-math-m1-f-6', 'code' => 'B.M1.F.6', 'name' => 'Act out result unknown story problems without equations.', 'url' => 'b.php?b-math-m1-f-6'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G',
                'skills' => [
                    ['id' => 'b-math-m1-g-1', 'code' => 'B.M1.G.1', 'name' => 'Order and match numeral and dot cards from 1 to 10. State 1 more than a given number.', 'url' => 'b.php?b-math-m1-g-1'],
                    ['id' => 'b-math-m1-g-2', 'code' => 'B.M1.G.2', 'name' => 'Make math stairs from 1 to 10 in cooperative groups.', 'url' => 'b.php?b-math-m1-g-2'],
                    ['id' => 'b-math-m1-g-3', 'code' => 'B.M1.G.3', 'name' => 'Arrange, analyze, and draw 1 more up to 10 in configurations other than towers.', 'url' => 'b.php?b-math-m1-g-3'],
                    ['id' => 'b-math-m1-g-4', 'code' => 'B.M1.G.4', 'name' => 'Arrange, analyze, and draw sequences of quantities of 1 more, beginning with numbers other t...', 'url' => 'b.php?b-math-m1-g-4'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H is a mirror image of Topic G.  While students explored 1 more in Topic H, in Topic G, they explore 
1 less.  In Lesson 33, students use their knowledge of relationships between numbers to order quantities of objects on paper (dot cards, picture cards, and shapes) from 10 to 1, and then match 1–10 digit cards to each set of objects in descending order.',
                'skills' => [
                    ['id' => 'b-math-m1-h-1', 'code' => 'B.M1.H.1', 'name' => 'Order quantities from 10 to 1, and match numerals.', 'url' => 'b.php?b-math-m1-h-1'],
                    ['id' => 'b-math-m1-h-2', 'code' => 'B.M1.H.2', 'name' => 'Count down from 10 to 1, and state 1 less than a given number.', 'url' => 'b.php?b-math-m1-h-2'],
                    ['id' => 'b-math-m1-h-3', 'code' => 'B.M1.H.3', 'name' => 'Arrange number towers in order from 10 to 1, and describe the pattern.', 'url' => 'b.php?b-math-m1-h-3'],
                    ['id' => 'b-math-m1-h-4', 'code' => 'B.M1.H.4', 'name' => 'Arrange, analyze, and draw sequences of quantities that are 1 less in configurations other t...', 'url' => 'b.php?b-math-m1-h-4'],
                    ['id' => 'b-math-m1-h-5', 'code' => 'B.M1.H.5', 'name' => 'Culminating Task', 'url' => 'b.php?b-math-m1-h-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Two-Dimensional and Three-Dimensional Shapes',
        'description' => 'Module 2: Two-Dimensional and Three-Dimensional Shapes for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m2-a-1', 'code' => 'B.M2.A.1', 'name' => 'Find and describe flat triangles, squares, rectangles, hexagons, and circles using informal ...', 'url' => 'b.php?b-math-m2-a-1'],
                    ['id' => 'b-math-m2-a-2', 'code' => 'B.M2.A.2', 'name' => 'Explain decisions about classifications of triangles into categories using variants and non-...', 'url' => 'b.php?b-math-m2-a-2'],
                    ['id' => 'b-math-m2-a-3', 'code' => 'B.M2.A.3', 'name' => 'Explain decisions about classifications of rectangles into categories using variants and non...', 'url' => 'b.php?b-math-m2-a-3'],
                    ['id' => 'b-math-m2-a-4', 'code' => 'B.M2.A.4', 'name' => 'Explain decisions about classifications of hexagons and circles, and identify them by name. ...', 'url' => 'b.php?b-math-m2-a-4'],
                    ['id' => 'b-math-m2-a-5', 'code' => 'B.M2.A.5', 'name' => 'Describe and communicate positions of all flat shapes using the words above, below, beside, ...', 'url' => 'b.php?b-math-m2-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'b-math-m2-b-1', 'code' => 'B.M2.B.1', 'name' => 'Find and describe solid shapes using informal language without naming.', 'url' => 'b.php?b-math-m2-b-1'],
                    ['id' => 'b-math-m2-b-2', 'code' => 'B.M2.B.2', 'name' => 'Explain decisions about classification of solid shapes into categories. Name the solid shapes.', 'url' => 'b.php?b-math-m2-b-2'],
                    ['id' => 'b-math-m2-b-3', 'code' => 'B.M2.B.3', 'name' => 'Describe and communicate positions of all solid shapes using the words above, below, beside,...', 'url' => 'b.php?b-math-m2-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C closes the module with discrimination between flats and solids.  In Lesson 9, students identify and sort flat and solid shapes.  The goal of this lesson is to focus each student’s attention on the attributes of a flat or solid shape instead of trusting how it looks.  The students learn to sort shapes and explain the reason for their groupings.',
                'skills' => [
                    ['id' => 'b-math-m2-c-1', 'code' => 'B.M2.C.1', 'name' => 'Identify and sort shapes as two-dimensional or three-dimensional, and recognize two-dimensio...', 'url' => 'b.php?b-math-m2-c-1'],
                    ['id' => 'b-math-m2-c-2', 'code' => 'B.M2.C.2', 'name' => 'Culminating task—collaborative groups create displays of different flat shapes with examples...', 'url' => 'b.php?b-math-m2-c-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Comparison of Length, Weight, Capacity, and Numbers to 10',
        'description' => 'Module 3: Comparison of Length, Weight, Capacity, and Numbers to 10 for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m3-a-1', 'code' => 'B.M3.A.1', 'name' => 'Compare lengths using taller than and shorter than with aligned and non-aligned endpoints.', 'url' => 'b.php?b-math-m3-a-1'],
                    ['id' => 'b-math-m3-a-2', 'code' => 'B.M3.A.2', 'name' => 'Compare length measurements with string.', 'url' => 'b.php?b-math-m3-a-2'],
                    ['id' => 'b-math-m3-a-3', 'code' => 'B.M3.A.3', 'name' => 'Make a series of longer than and shorter than comparisons.', 'url' => 'b.php?b-math-m3-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'b-math-m3-b-1', 'code' => 'B.M3.B.1', 'name' => 'Compare the length of linking cube sticks to a 5-stick.', 'url' => 'b.php?b-math-m3-b-1'],
                    ['id' => 'b-math-m3-b-2', 'code' => 'B.M3.B.2', 'name' => 'Determine which linking cube stick is longer than or shorter than the other.', 'url' => 'b.php?b-math-m3-b-2'],
                    ['id' => 'b-math-m3-b-3', 'code' => 'B.M3.B.3', 'name' => 'Compare the length of linking cube sticks to various objects.', 'url' => 'b.php?b-math-m3-b-3'],
                    ['id' => 'b-math-m3-b-4', 'code' => 'B.M3.B.4', 'name' => 'Compare objects using the same as.', 'url' => 'b.php?b-math-m3-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'b-math-m3-c-1', 'code' => 'B.M3.C.1', 'name' => 'Compare using heavier than and lighter than with classroom objects.', 'url' => 'b.php?b-math-m3-c-1'],
                    ['id' => 'b-math-m3-c-2', 'code' => 'B.M3.C.2', 'name' => 'Compare objects using heavier than, lighter than, and the same as with balance scales.', 'url' => 'b.php?b-math-m3-c-2'],
                    ['id' => 'b-math-m3-c-3', 'code' => 'B.M3.C.3', 'name' => 'Compare the weight of an object to a set of unit weights on a balance scale.', 'url' => 'b.php?b-math-m3-c-3'],
                    ['id' => 'b-math-m3-c-4', 'code' => 'B.M3.C.4', 'name' => 'Observe conservation of weight on the balance scale.', 'url' => 'b.php?b-math-m3-c-4'],
                    ['id' => 'b-math-m3-c-5', 'code' => 'B.M3.C.5', 'name' => 'Compare the weight of an object with sets of different objects on a balance scale.', 'url' => 'b.php?b-math-m3-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'b-math-m3-d-1', 'code' => 'B.M3.D.1', 'name' => 'Compare volume using more than, less than, and the same as by pouring.', 'url' => 'b.php?b-math-m3-d-1'],
                    ['id' => 'b-math-m3-d-2', 'code' => 'B.M3.D.2', 'name' => 'Explore conservation of volume by pouring.', 'url' => 'b.php?b-math-m3-d-2'],
                    ['id' => 'b-math-m3-d-3', 'code' => 'B.M3.D.3', 'name' => 'Compare using the same as with units.', 'url' => 'b.php?b-math-m3-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'b-math-m3-e-1', 'code' => 'B.M3.E.1', 'name' => 'Make informal comparison of area.', 'url' => 'b.php?b-math-m3-e-1'],
                    ['id' => 'b-math-m3-e-2', 'code' => 'B.M3.E.2', 'name' => 'Compare to find if there are enough.', 'url' => 'b.php?b-math-m3-e-2'],
                    ['id' => 'b-math-m3-e-3', 'code' => 'B.M3.E.3', 'name' => 'Compare using more than and the same as.', 'url' => 'b.php?b-math-m3-e-3'],
                    ['id' => 'b-math-m3-e-4', 'code' => 'B.M3.E.4', 'name' => 'Compare using fewer than and the same as.', 'url' => 'b.php?b-math-m3-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F opens with students shifting from comparison of lengths to comparison of numbers.  As students build their confidence by directly comparing the lengths of a pencil and a crayon, they increase their readiness in later grades to indirectly compare length units.  “The pencil is longer than the crayon because
7 cubes are more than 4 cubes.”',
                'skills' => [
                    ['id' => 'b-math-m3-f-1', 'code' => 'B.M3.F.1', 'name' => 'Relate more and less to length.', 'url' => 'b.php?b-math-m3-f-1'],
                    ['id' => 'b-math-m3-f-2', 'code' => 'B.M3.F.2', 'name' => 'Compare sets informally using more, less, and fewer.', 'url' => 'b.php?b-math-m3-f-2'],
                    ['id' => 'b-math-m3-f-3', 'code' => 'B.M3.F.3', 'name' => 'Identify and create a set that has the same number of objects.', 'url' => 'b.php?b-math-m3-f-3'],
                    ['id' => 'b-math-m3-f-4', 'code' => 'B.M3.F.4', 'name' => 'Reason to identify and make a set that has 1 more.', 'url' => 'b.php?b-math-m3-f-4'],
                    ['id' => 'b-math-m3-f-5', 'code' => 'B.M3.F.5', 'name' => 'Reason to identify and make a set that has 1 less.', 'url' => 'b.php?b-math-m3-f-5'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G is a bridge that enables students to compare numerals by connecting number to length.  In Lessons 25 and 26, students work with linear configurations to match and count to see that “7 is more than 3, 3 is less than 7, and 5 is equal to 5.”',
                'skills' => [
                    ['id' => 'b-math-m3-g-1', 'code' => 'B.M3.G.1', 'name' => 'Match and count to compare a number of objects. State which quantity is more.', 'url' => 'b.php?b-math-m3-g-1'],
                    ['id' => 'b-math-m3-g-2', 'code' => 'B.M3.G.2', 'name' => 'Match and count to compare two sets of objects. State which quantity is less.', 'url' => 'b.php?b-math-m3-g-2'],
                    ['id' => 'b-math-m3-g-3', 'code' => 'B.M3.G.3', 'name' => 'Strategize to compare two sets.', 'url' => 'b.php?b-math-m3-g-3'],
                    ['id' => 'b-math-m3-g-4', 'code' => 'B.M3.G.4', 'name' => 'Visualize quantities to compare two numerals.', 'url' => 'b.php?b-math-m3-g-4'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H',
                'skills' => [
                    ['id' => 'b-math-m3-h-1', 'code' => 'B.M3.H.1', 'name' => 'Observe cups of colored water of equal volume poured into a variety of container shapes.', 'url' => 'b.php?b-math-m3-h-1'],
                    ['id' => 'b-math-m3-h-2', 'code' => 'B.M3.H.2', 'name' => 'Use balls of clay of equal weights to make sculptures.', 'url' => 'b.php?b-math-m3-h-2'],
                    ['id' => 'b-math-m3-h-3', 'code' => 'B.M3.H.3', 'name' => 'Use benchmarks to create and compare rectangles of different lengths to make a city.', 'url' => 'b.php?b-math-m3-h-3'],
                    ['id' => 'b-math-m3-h-4', 'code' => 'B.M3.H.4', 'name' => 'Culminating task—describe measurable attributes of single objects.', 'url' => 'b.php?b-math-m3-h-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Number Pairs, Addition and Subtraction to 10',
        'description' => 'Module 4: Number Pairs, Addition and Subtraction to 10 for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m4-a-1', 'code' => 'B.M4.A.1', 'name' => 'Model composition and decomposition of numbers to 5 using actions, objects, and drawings.', 'url' => 'b.php?b-math-m4-a-1'],
                    ['id' => 'b-math-m4-a-2', 'code' => 'B.M4.A.2', 'name' => 'Model composition and decomposition of numbers to 5 using fingers and linking cube sticks.', 'url' => 'b.php?b-math-m4-a-2'],
                    ['id' => 'b-math-m4-a-3', 'code' => 'B.M4.A.3', 'name' => 'Represent composition story situations with drawings using numeric number bonds.', 'url' => 'b.php?b-math-m4-a-3'],
                    ['id' => 'b-math-m4-a-4', 'code' => 'B.M4.A.4', 'name' => 'Represent decomposition story situations with drawings using numeric number bonds.', 'url' => 'b.php?b-math-m4-a-4'],
                    ['id' => 'b-math-m4-a-5', 'code' => 'B.M4.A.5', 'name' => 'Represent composition and decomposition of numbers to 5 using pictorial and numeric number b...', 'url' => 'b.php?b-math-m4-a-5'],
                    ['id' => 'b-math-m4-a-6', 'code' => 'B.M4.A.6', 'name' => 'Represent number bonds with composition and decomposition story situations.', 'url' => 'b.php?b-math-m4-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B advances the work of Topic A, building students’ skill with number pairs for 6, 7, and 8, which is cultivated and maintained throughout Topics B and C during Fluency Practice.  In the first three lessons of this topic, students decompose 6, 7, and 8.  These decompositions are modeled as put together situations and represented as addition expressions (C = ___ + ___), as opposed to the take from decomposition type 
(C – B = ___), which is taught in Topic D.',
                'skills' => [
                    ['id' => 'b-math-m4-b-1', 'code' => 'B.M4.B.1', 'name' => 'Model decompositions of 6 using a story situation, objects, and number bonds.', 'url' => 'b.php?b-math-m4-b-1'],
                    ['id' => 'b-math-m4-b-2', 'code' => 'B.M4.B.2', 'name' => 'Model decompositions of 7 using a story situation, sets, and number bonds.', 'url' => 'b.php?b-math-m4-b-2'],
                    ['id' => 'b-math-m4-b-3', 'code' => 'B.M4.B.3', 'name' => 'Model decompositions of 8 using a story situation, arrays, and number bonds.', 'url' => 'b.php?b-math-m4-b-3'],
                    ['id' => 'b-math-m4-b-4', 'code' => 'B.M4.B.4', 'name' => 'Model decompositions of 6—8 using linking cube sticks to see patterns.', 'url' => 'b.php?b-math-m4-b-4'],
                    ['id' => 'b-math-m4-b-5', 'code' => 'B.M4.B.5', 'name' => 'Represent decompositions for 6—8 using horizontal and vertical number bonds.', 'url' => 'b.php?b-math-m4-b-5'],
                    ['id' => 'b-math-m4-b-6', 'code' => 'B.M4.B.6', 'name' => 'Use 5-groups to represent the 5 + n pattern to 8.', 'url' => 'b.php?b-math-m4-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C introduces formal addition concepts including writing and solving expressions and equations.  
The first three lessons ask students to represent addition story problems involving decomposition and composition, modeled by A + B = C and C = A + B.  In these first formal addition lessons, the stories are told with no unknown:  “There are 7 apples in the bowl.  Five of them are red, and 2 of them are green.”  Students write addition sentences and identify the referent of each number within the problem.  Lessons 13–15 work with 6, 7, and 8, respectively, representing such addition stories with pictures, numbers, and equations.',
                'skills' => [
                    ['id' => 'b-math-m4-c-1', 'code' => 'B.M4.C.1', 'name' => 'Represent decomposition and composition addition stories to 6 with drawings and equations wi...', 'url' => 'b.php?b-math-m4-c-1'],
                    ['id' => 'b-math-m4-c-2', 'code' => 'B.M4.C.2', 'name' => 'Represent decomposition and composition addition stories to 7 with drawings and equations wi...', 'url' => 'b.php?b-math-m4-c-2'],
                    ['id' => 'b-math-m4-c-3', 'code' => 'B.M4.C.3', 'name' => 'Represent decomposition and composition addition stories to 8 with drawings and equations wi...', 'url' => 'b.php?b-math-m4-c-3'],
                    ['id' => 'b-math-m4-c-4', 'code' => 'B.M4.C.4', 'name' => 'Solve add to with result unknown word problems to 8 with equations. Box the unknown.', 'url' => 'b.php?b-math-m4-c-4'],
                    ['id' => 'b-math-m4-c-5', 'code' => 'B.M4.C.5', 'name' => 'Solve put together with total unknown word problems to 8 using objects and drawings.', 'url' => 'b.php?b-math-m4-c-5'],
                    ['id' => 'b-math-m4-c-6', 'code' => 'B.M4.C.6', 'name' => 'Solve both addends unknown word problems to 8 to find addition patterns in number pairs.', 'url' => 'b.php?b-math-m4-c-6'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D introduces formal subtraction concepts including writing and solving expressions and equations.  Lesson 19 begins at the concrete level with students acting out take away stories and working at the pictorial level crossing off to see what remains.',
                'skills' => [
                    ['id' => 'b-math-m4-d-1', 'code' => 'B.M4.D.1', 'name' => 'Use objects and drawings to find how many are left.', 'url' => 'b.php?b-math-m4-d-1'],
                    ['id' => 'b-math-m4-d-2', 'code' => 'B.M4.D.2', 'name' => 'Solve take from with result unknown expressions and equations using the minus sign with no u...', 'url' => 'b.php?b-math-m4-d-2'],
                    ['id' => 'b-math-m4-d-3', 'code' => 'B.M4.D.3', 'name' => 'Represent subtraction story problems using objects, drawings, expressions, and equations.', 'url' => 'b.php?b-math-m4-d-3'],
                    ['id' => 'b-math-m4-d-4', 'code' => 'B.M4.D.4', 'name' => 'Decompose the number 6 using 5-group drawings by breaking off or removing a part, and record...', 'url' => 'b.php?b-math-m4-d-4'],
                    ['id' => 'b-math-m4-d-5', 'code' => 'B.M4.D.5', 'name' => 'Decompose the number 7 using 5-group drawings by hiding a part, and record each decompositio...', 'url' => 'b.php?b-math-m4-d-5'],
                    ['id' => 'b-math-m4-d-6', 'code' => 'B.M4.D.6', 'name' => 'Decompose the number 8 using 5-group drawings and crossing off a part, and record each decom...', 'url' => 'b.php?b-math-m4-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E expands student exploration of numerical relationships to include 9 and 10.  Returning to work with number bonds after introducing addition and subtraction reminds students about the part–part–whole relationships that underlie these operations.  Students explicitly discuss the relationship between addition and subtraction in Topic H.',
                'skills' => [
                    ['id' => 'b-math-m4-e-1', 'code' => 'B.M4.E.1', 'name' => 'Model decompositions of 9 using a story situation, objects, and number bonds.', 'url' => 'b.php?b-math-m4-e-1'],
                    ['id' => 'b-math-m4-e-2', 'code' => 'B.M4.E.2', 'name' => 'Model decompositions of 9 using fingers, linking cubes, and number bonds.', 'url' => 'b.php?b-math-m4-e-2'],
                    ['id' => 'b-math-m4-e-3', 'code' => 'B.M4.E.3', 'name' => 'Model decompositions of 10 using a story situation, objects, and number bonds.', 'url' => 'b.php?b-math-m4-e-3'],
                    ['id' => 'b-math-m4-e-4', 'code' => 'B.M4.E.4', 'name' => 'Model decompositions of 10 using fingers, sets, linking cubes, and number bonds.', 'url' => 'b.php?b-math-m4-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F asks students to connect their understanding of number pairs for 9 and 10 to addition expressions and equations.  Core Fluency Practice Sets and Sprints are introduced in this topic to give students practice adding and subtracting numbers to 5 quickly and accurately (K.OA.5).',
                'skills' => [
                    ['id' => 'b-math-m4-f-1', 'code' => 'B.M4.F.1', 'name' => 'Represent pictorial decomposition and composition addition stories to 9 with 5-group drawing...', 'url' => 'b.php?b-math-m4-f-1'],
                    ['id' => 'b-math-m4-f-2', 'code' => 'B.M4.F.2', 'name' => 'Represent pictorial decomposition and composition addition stories to 10 with 5-group drawin...', 'url' => 'b.php?b-math-m4-f-2'],
                    ['id' => 'b-math-m4-f-3', 'code' => 'B.M4.F.3', 'name' => 'Solve add to with total unknown and put together with total unknown problems with totals of ...', 'url' => 'b.php?b-math-m4-f-3'],
                    ['id' => 'b-math-m4-f-4', 'code' => 'B.M4.F.4', 'name' => 'Solve both addends unknown word problems with totals of 9 and 10 using 5-group drawings.', 'url' => 'b.php?b-math-m4-f-4'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G provides additional practice with formal subtraction concepts, including writing and solving number sentences with totals of 9 or 10.',
                'skills' => [
                    ['id' => 'b-math-m4-g-1', 'code' => 'B.M4.G.1', 'name' => 'Solve take from equations with no unknown using numbers to 10.', 'url' => 'b.php?b-math-m4-g-1'],
                    ['id' => 'b-math-m4-g-2', 'code' => 'B.M4.G.2', 'name' => 'Represent subtraction story problems by breaking off, crossing out, and hiding a part.', 'url' => 'b.php?b-math-m4-g-2'],
                    ['id' => 'b-math-m4-g-3', 'code' => 'B.M4.G.3', 'name' => 'Decompose the number 9 using 5-group drawings, and record each decomposition with a subtract...', 'url' => 'b.php?b-math-m4-g-3'],
                    ['id' => 'b-math-m4-g-4', 'code' => 'B.M4.G.4', 'name' => 'Decompose the number 10 using 5-group drawings, and record each decomposition with a subtrac...', 'url' => 'b.php?b-math-m4-g-4'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H',
                'skills' => [
                    ['id' => 'b-math-m4-h-1', 'code' => 'B.M4.H.1', 'name' => 'Add or subtract 0 to get the same number and relate to word problems wherein the same quanti...', 'url' => 'b.php?b-math-m4-h-1'],
                    ['id' => 'b-math-m4-h-2', 'code' => 'B.M4.H.2', 'name' => 'Add 1 to numbers 1—9 to see the pattern of the next number using 5-group drawings and equati...', 'url' => 'b.php?b-math-m4-h-2'],
                    ['id' => 'b-math-m4-h-3', 'code' => 'B.M4.H.3', 'name' => 'Find the number that makes 10 for numbers 1—9, and record each with a 5-group drawing.', 'url' => 'b.php?b-math-m4-h-3'],
                    ['id' => 'b-math-m4-h-4', 'code' => 'B.M4.H.4', 'name' => 'Find the number that makes 10 for numbers 1—9, and record each with an addition equation.', 'url' => 'b.php?b-math-m4-h-4'],
                    ['id' => 'b-math-m4-h-5', 'code' => 'B.M4.H.5', 'name' => 'Culminating task—choose tools strategically to model and represent a stick of 10 cubes broke...', 'url' => 'b.php?b-math-m4-h-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Numbers 10–20 and Counting to 100',
        'description' => 'Module 5: Numbers 10–20 and Counting to 100 for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m5-a-1', 'code' => 'B.M5.A.1', 'name' => 'Count straws into piles of ten; count the piles as 10 ones.', 'url' => 'b.php?b-math-m5-a-1'],
                    ['id' => 'b-math-m5-a-2', 'code' => 'B.M5.A.2', 'name' => 'Count 10 objects within counts of 10 to 20 objects, and describe as 10 ones and __ ones.', 'url' => 'b.php?b-math-m5-a-2'],
                    ['id' => 'b-math-m5-a-3', 'code' => 'B.M5.A.3', 'name' => 'Count and circle 10 objects within images of 10 to 20 objects, and describe as 10 ones and _...', 'url' => 'b.php?b-math-m5-a-3'],
                    ['id' => 'b-math-m5-a-4', 'code' => 'B.M5.A.4', 'name' => 'Count straws the Say Ten way to 19; make a pile for each ten.', 'url' => 'b.php?b-math-m5-a-4'],
                    ['id' => 'b-math-m5-a-5', 'code' => 'B.M5.A.5', 'name' => 'Count straws the Say Ten way to 20; make a pile for each ten.', 'url' => 'b.php?b-math-m5-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'b-math-m5-b-1', 'code' => 'B.M5.B.1', 'name' => 'Model with objects and represent numbers 10 to 20 with place value or Hide Zero cards.', 'url' => 'b.php?b-math-m5-b-1'],
                    ['id' => 'b-math-m5-b-2', 'code' => 'B.M5.B.2', 'name' => 'Model and write numbers 10 to 20 as number bonds.', 'url' => 'b.php?b-math-m5-b-2'],
                    ['id' => 'b-math-m5-b-3', 'code' => 'B.M5.B.3', 'name' => 'Model teen numbers with materials from abstract to concrete.', 'url' => 'b.php?b-math-m5-b-3'],
                    ['id' => 'b-math-m5-b-4', 'code' => 'B.M5.B.4', 'name' => 'Draw teen numbers from abstract to pictorial.', 'url' => 'b.php?b-math-m5-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C opens in Lesson 10 with students building a Rekenrek to 20, which they use to count and model numbers for the balance of the year.  They deepen their understanding of the composition and decomposition of teen numbers as 10 ones and some more ones (K.NBT.1) by showing, counting, and writing (K.CC.3) the numbers 11 to 20 using a variety of configurations:  vertical towers, linear, array, and circular configurations.  In each configuration, students count to answer “how many?” questions (K.CC.5) and realize that whatever the configuration, a teen number can be decomposed into 10 ones and some ones.',
                'skills' => [
                    ['id' => 'b-math-m5-c-1', 'code' => 'B.M5.C.1', 'name' => 'Build a Rekenrek to 20.', 'url' => 'b.php?b-math-m5-c-1'],
                    ['id' => 'b-math-m5-c-2', 'code' => 'B.M5.C.2', 'name' => 'Show, count, and write numbers 11 to 20 in tower configurations increasing by 1—a pattern of...', 'url' => 'b.php?b-math-m5-c-2'],
                    ['id' => 'b-math-m5-c-3', 'code' => 'B.M5.C.3', 'name' => 'Represent numbers 20 to 11 in tower configurations decreasing by 1—a pattern of 1 smaller.', 'url' => 'b.php?b-math-m5-c-3'],
                    ['id' => 'b-math-m5-c-4', 'code' => 'B.M5.C.4', 'name' => 'Show, count, and write to answer how many questions in linear and array configurations.', 'url' => 'b.php?b-math-m5-c-4'],
                    ['id' => 'b-math-m5-c-5', 'code' => 'B.M5.C.5', 'name' => 'Show, count, and write to answer how many questions with up to 20 objects in circular config...', 'url' => 'b.php?b-math-m5-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D leads students beyond teen numbers up to 100 (K.CC.1).  They begin by counting up and down to 100 both the regular way (ten, twenty, thirty, …) and the Say Ten way (ten, 2 tens, 3 tens, …).  In Lessons 16 to 18, their work from 11 to 19 sets the foundation for success as they realize the number sequence of 1–9 is repeated over and over again within each decade as they count to 100.  Students begin by counting within and then across decades (e.g., 28, 29, 30, 31, 32) (K.CC.2).  Students also write some of the numbers ranging from 21 to 100 in Lessons 15 to 17, which goes beyond the Kindergarten standard to the Grade 1 standard 1.NBT.1.  Writing numerals 21 to 100 is included here because of the wider range of activities they make possible; students readily accept this challenge, which is not assessed.  The final lesson of this topic is an optional exploration of decomposing numbers to 100 on the Rekenrek.',
                'skills' => [
                    ['id' => 'b-math-m5-d-1', 'code' => 'B.M5.D.1', 'name' => 'Count up and down by tens to 100 with Say Ten and regular counting.', 'url' => 'b.php?b-math-m5-d-1'],
                    ['id' => 'b-math-m5-d-2', 'code' => 'B.M5.D.2', 'name' => 'Count within tens by ones.', 'url' => 'b.php?b-math-m5-d-2'],
                    ['id' => 'b-math-m5-d-3', 'code' => 'B.M5.D.3', 'name' => 'Count across tens when counting by ones through 40.', 'url' => 'b.php?b-math-m5-d-3'],
                    ['id' => 'b-math-m5-d-4', 'code' => 'B.M5.D.4', 'name' => 'Count across tens by ones to 100 with and without objects.', 'url' => 'b.php?b-math-m5-d-4'],
                    ['id' => 'b-math-m5-d-5', 'code' => 'B.M5.D.5', 'name' => 'Explore numbers on the Rekenrek. (Optional)', 'url' => 'b.php?b-math-m5-d-5'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E’s Lesson 20 begins as students represent teen number decompositions and compositions by writing addition sentences.  In Lesson 21, students make bonds with materials and hide one of the parts for their partners, who must figure out what the hidden part is.  The number bond with a hidden part is represented by the teacher as an addition equation with a missing addend—the hidden part (aligns to 1.OA.8).  In Lesson 22, students compare teen numbers by counting and comparing the extra ones.  For example, students decompose 12 into 10 and 2, and 16 into 10 and 6.  They compare 2 ones and 6 ones to see that 16 is more than 12 using the structure of the 10 ones (MP.7).  This is an application of the Kindergarten comparison standards (K.CC.6, K.CC.7), which move into the Grade 1 comparison standard (1.NBT.3).',
                'skills' => [
                    ['id' => 'b-math-m5-e-1', 'code' => 'B.M5.E.1', 'name' => 'Represent teen number compositions and decompositions as addition sentences.', 'url' => 'b.php?b-math-m5-e-1'],
                    ['id' => 'b-math-m5-e-2', 'code' => 'B.M5.E.2', 'name' => 'Represent teen number decompositions as 10 ones and some ones, and find a hidden part.', 'url' => 'b.php?b-math-m5-e-2'],
                    ['id' => 'b-math-m5-e-3', 'code' => 'B.M5.E.3', 'name' => 'Decompose teen numbers as 10 ones and some ones; compare some ones to compare the teen numbers.', 'url' => 'b.php?b-math-m5-e-3'],
                    ['id' => 'b-math-m5-e-4', 'code' => 'B.M5.E.4', 'name' => 'Reason about and represent situations, decomposing teen numbers into 10 ones and some ones a...', 'url' => 'b.php?b-math-m5-e-4'],
                    ['id' => 'b-math-m5-e-5', 'code' => 'B.M5.E.5', 'name' => 'Culminating Task—Represent teen number decompositions in various ways.', 'url' => 'b.php?b-math-m5-e-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Analyzing, Comparing, and Composing Shapes',
        'description' => 'Module 6: Analyzing, Comparing, and Composing Shapes for Kindergarten students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'b-math-m6-a-1', 'code' => 'B.M6.A.1', 'name' => 'Describe the systematic construction of flat shapes using ordinal numbers.', 'url' => 'b.php?b-math-m6-a-1'],
                    ['id' => 'b-math-m6-a-2', 'code' => 'B.M6.A.2', 'name' => 'Build flat shapes with varying side lengths and record with drawings.', 'url' => 'b.php?b-math-m6-a-2'],
                    ['id' => 'b-math-m6-a-3', 'code' => 'B.M6.A.3', 'name' => 'Compose solids using flat shapes as a foundation.', 'url' => 'b.php?b-math-m6-a-3'],
                    ['id' => 'b-math-m6-a-4', 'code' => 'B.M6.A.4', 'name' => 'Describe the relative position of shapes using ordinal numbers.', 'url' => 'b.php?b-math-m6-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'b-math-m6-b-1', 'code' => 'B.M6.B.1', 'name' => 'Compose flat shapes using pattern blocks and drawings.', 'url' => 'b.php?b-math-m6-b-1'],
                    ['id' => 'b-math-m6-b-2', 'code' => 'B.M6.B.2', 'name' => 'Decompose flat shapes into two or more shapes.', 'url' => 'b.php?b-math-m6-b-2'],
                    ['id' => 'b-math-m6-b-3', 'code' => 'B.M6.B.3', 'name' => 'Compose simple shapes to form a larger shape described by an outline.', 'url' => 'b.php?b-math-m6-b-3'],
                    ['id' => 'b-math-m6-b-4', 'code' => 'B.M6.B.4', 'name' => 'Culminating task—review selected topics to create a cumulative year-end project.', 'url' => 'b.php?b-math-m6-b-4'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
