<?php
/**
 * Hesten's Learning - Level A (Pre-K)
 */

$pageTitle       = "Pre-K Level A | Hesten's Learning";
$pageDescription = "Foundational skills in counting, letter recognition, and shapes.";
$pageKeywords    = "Pre-K, early learning, counting, shapes, letters";

$themeColor = 'teal';
$levelId = 'a';
$levelTitle = 'Level A';
$gradeText = 'Pre-K';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Foundational skills in number recognition, shapes, and early patterns.';

$modules = [
    [
        'title' => 'Foundational Early Learning',
        'description' => 'Building the first blocks of logic and literacy.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Counting and Numbers',
                'skills' => [
                    ['id' => 'a-math-m1-a-1', 'code' => 'A.M1.A.1', 'name' => 'Counting objects to 5'],
                    ['id' => 'a-math-m1-a-2', 'code' => 'A.M1.A.2', 'name' => 'Identifying simple shapes (Circle, Square)']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Language Foundations',
                'skills' => [
                    ['id' => 'a-ela-m1-b-1', 'code' => 'A.M1.B.1', 'name' => 'Recognizing upper case letters'],
                    ['id' => 'a-ela-m1-b-2', 'code' => 'A.M1.B.2', 'name' => 'Matching rhyming sounds']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>