<?php
/**
 * Hesten's Learning - Level C (Grade 1)
 */

$pageTitle       = "Grade 1 Level C | Hesten's Learning";
$pageDescription = "Adding, subtracting, and developing early independence for 1st-grade learners.";
$pageKeywords    = "Grade 1, addition up to 20, telling time, reading comprehension";

$themeColor = 'blue';
$levelId = 'c';
$levelTitle = 'Level C';
$gradeText = '1st Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Operations to 20, place value foundations, and reading comprehension fluency.';

$modules = [
    [
        'title' => 'First Grade Mastery',
        'description' => 'Advancing core skills in operations and literacy.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Operations & Algebra',
                'skills' => [
                    ['id' => 'c-math-m1-a-1', 'code' => 'C.M1.A.1', 'name' => 'Addition word problems to 20'],
                    ['id' => 'c-math-m1-a-2', 'code' => 'C.M1.A.2', 'name' => 'Subtraction within 20 in context']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Measurement and Data',
                'skills' => [
                    ['id' => 'c-math-m1-b-1', 'code' => 'C.M1.B.1', 'name' => 'Telling time to the hour and half-hour'],
                    ['id' => 'c-math-m1-b-2', 'code' => 'C.M1.B.2', 'name' => 'Measuring lengths using indirect comparison']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>