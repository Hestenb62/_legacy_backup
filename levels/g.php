<?php
/**
 * Hesten's Learning - Level G (Grade 5)
 */

$pageTitle       = "Grade 5 Level G | Hesten's Learning";
$pageDescription = "Decimals, volumes, and complex ecosystems for 5th-grade students.";
$pageKeywords    = "Grade 5, decimals, coordinates, volume of solids";

$themeColor = 'emerald';
$levelId = 'g';
$levelTitle = 'Level G';
$gradeText = '5th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Decimal operations, coordinate geometry, and preparing for middle school transitions.';

$modules = [
    [
        'title' => 'Preparing for Middle School',
        'description' => 'Synthesizing knowledge across decimals and fractions.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Decimals & Place Value',
                'skills' => [
                    ['id' => 'g-math-m1-a-1', 'code' => 'G.M1.A.1', 'name' => 'Adding and subtracting decimals to the thousandths'],
                    ['id' => 'g-math-m1-a-2', 'code' => 'G.M1.A.2', 'name' => 'Multiplying multi-digit whole numbers']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Geometry & Measurements',
                'skills' => [
                    ['id' => 'g-math-m1-b-1', 'code' => 'G.M1.B.1', 'name' => 'Calculating the volume of rectangular prisms'],
                    ['id' => 'g-math-m1-b-2', 'code' => 'G.M1.B.2', 'name' => 'Graphing points on the coordinate plane']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>