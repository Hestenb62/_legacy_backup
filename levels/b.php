<?php
/**
 * Hesten's Learning - Level B (Kindergarten)
 */

$pageTitle       = "Kindergarten Level B | Hesten's Learning";
$pageDescription = "Basic math concepts, phonics, and early reading foundations for Kindergarten learners.";
$pageKeywords    = "Kindergarten, phonics, number sense, subtraction foundations";

$themeColor = 'indigo';
$levelId = 'b';
$levelTitle = 'Level B';
$gradeText = 'Kindergarten';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Number sense to 100, basic addition/subtraction, and phonics for early readers.';

$modules = [
    [
        'title' => 'Kindergarten Foundations',
        'description' => 'Building blocks for a strong academic start.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Counting and Cardinality',
                'skills' => [
                    ['id' => 'b-math-m1-a-1', 'code' => 'B.M1.A.1', 'name' => 'Counting to 100 by ones and by tens'],
                    ['id' => 'b-math-m1-a-2', 'code' => 'B.M1.A.2', 'name' => 'Writing numbers from 0 to 20']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Operations and Algebraic Thinking',
                'skills' => [
                    ['id' => 'b-math-m1-b-1', 'code' => 'B.M1.B.1', 'name' => 'Addition as putting together and adding to'],
                    ['id' => 'b-math-m1-b-2', 'code' => 'B.M1.B.2', 'name' => 'Subtraction as taking apart and taking from']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>