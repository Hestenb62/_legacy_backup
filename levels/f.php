<?php
/**
 * Hesten's Learning - Level F (Grade 4)
 */

$pageTitle       = "Grade 4 Level F | Hesten's Learning";
$pageDescription = "Advanced multiplication, long division, and equivalent fractions for 4th-grade students.";
$pageKeywords    = "Grade 4, long division, comparing fractions, angles and geometry";

$themeColor = 'green';
$levelId = 'f';
$levelTitle = 'Level F';
$gradeText = '4th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Multi-digit multiplication, long division, and fraction operations.';

$modules = [
    [
        'title' => 'Deepening Mathematical Logic',
        'description' => 'Focusing on multi-step problems and geometric reasoning.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Number & Base Ten',
                'skills' => [
                    ['id' => 'f-math-m1-a-1', 'code' => 'F.M1.A.1', 'name' => 'Multi-digit multiplication using arrays'],
                    ['id' => 'f-math-m1-a-2', 'code' => 'F.M1.A.2', 'name' => 'Long division with remainders']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Fractions & Ratios',
                'skills' => [
                    ['id' => 'f-math-m1-b-1', 'code' => 'F.M1.B.1', 'name' => 'Comparing and ordering fractions'],
                    ['id' => 'f-math-m1-b-2', 'code' => 'F.M1.B.2', 'name' => 'Converting units of measurement']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>