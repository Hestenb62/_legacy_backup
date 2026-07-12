<?php
/**
 * Hesten's Learning - Level D (Grade 2)
 */

$pageTitle       = "Grade 2 Level D | Hesten's Learning";
$pageDescription = "Expanding core skills in 2nd-grade math and reading fluency.";
$pageKeywords    = "Grade 2, multiplication basics, regrouping, reading fluency";

$themeColor = 'sky';
$levelId = 'd';
$levelTitle = 'Level D';
$gradeText = '2nd Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = '2-digit operations with regrouping, intro to multiplication, and advanced reading fluency.';

$modules = [
    [
        'title' => 'Expanding Primary Knowledge',
        'description' => 'Building towards mathematical mastery and literacy.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Operations with Whole Numbers',
                'skills' => [
                    ['id' => 'd-math-m1-a-1', 'code' => 'D.M1.A.1', 'name' => 'Column addition with regrouping up to 100'],
                    ['id' => 'd-math-m1-a-2', 'code' => 'D.M1.A.2', 'name' => 'Skip counting by 5s, 10s, and 100s']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Foundations of Multiplication',
                'skills' => [
                    ['id' => 'd-math-m1-b-1', 'code' => 'D.M1.B.1', 'name' => 'Repeated addition using arrays'],
                    ['id' => 'd-math-m1-b-2', 'code' => 'D.M1.B.2', 'name' => 'Identifying even and odd numbers']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>