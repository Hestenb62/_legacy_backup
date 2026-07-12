<?php
/**
 * Hesten's Learning - Level I (Grade 7)
 */

$pageTitle       = "Grade 7 Level I | Hesten's Learning";
$pageDescription = "Proportions, geometry, and life sciences for 7th-grade students.";
$pageKeywords    = "Grade 7, proportional relationships, surface area and volume, cellular structure";

$themeColor = 'purple';
$levelId = 'i';
$levelTitle = 'Level I';
$gradeText = 'Middle School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Proportional relationships, integers, and geometry applications for 7th graders.';

$modules = [
    [
        'title' => 'Middle School Mastery',
        'description' => 'Deepening algebraic and geometric understanding.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Proportions',
                'skills' => [
                    ['id' => 'i-math-m1-a-1', 'code' => 'I.M1.A.1', 'name' => 'Ratios of fractions and unit rates'],
                    ['id' => 'i-math-m1-a-2', 'code' => 'I.M1.A.2', 'name' => 'Identifying and representing proportional relationships']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Geometry Applications',
                'skills' => [
                    ['id' => 'i-math-m1-b-1', 'code' => 'I.M1.B.1', 'name' => 'Scale drawings of geometric figures'],
                    ['id' => 'i-math-m1-b-2', 'code' => 'I.M1.B.2', 'name' => 'Area and circumference of circles']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>