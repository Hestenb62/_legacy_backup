<?php
/**
 * Hesten's Learning - Level E (Grade 3)
 */

$pageTitle       = "Grade 3 Level E | Hesten's Learning";
$pageDescription = "Mastering multiplication, division, and fractions for 3rd-grade students.";
$pageKeywords    = "Grade 3, multiplication tables, division, intro to fractions";

$themeColor = 'cyan';
$levelId = 'e';
$levelTitle = 'Level E';
$gradeText = '3rd Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Mastering multiplication tables, introductory division, and simple fractions.';

$modules = [
    [
        'title' => 'Critical Thinking Transitions',
        'description' => 'Moving from basic arithmetic to algebraic thinking.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Operations & Multiplication',
                'skills' => [
                    ['id' => 'e-math-m1-a-1', 'code' => 'E.M1.A.1', 'name' => 'Fluency with multiplication within 100'],
                    ['id' => 'e-math-m1-a-2', 'code' => 'E.M1.A.2', 'name' => 'Relating multiplication and division']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Fractions & Geometry',
                'skills' => [
                    ['id' => 'e-math-m1-b-1', 'code' => 'E.M1.B.1', 'name' => 'Introduction to equivalent fractions'],
                    ['id' => 'e-math-m1-b-2', 'code' => 'E.M1.B.2', 'name' => 'Understanding perimeter and area']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>