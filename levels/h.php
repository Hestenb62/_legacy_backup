<?php
/**
 * Hesten's Learning - Level H (Grade 6)
 */

$pageTitle       = "Grade 6 Level H | Hesten's Learning";
$pageDescription = "Ratios, rates, and algebraic expressions for 6th-grade students.";
$pageKeywords    = "Grade 6, ratios and rates, negative numbers, area and surface area";

$themeColor = 'violet';
$levelId = 'h';
$levelTitle = 'Level H';
$gradeText = 'Middle School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Ratios, rates, algebraic expressions, and basic statistics for middle schoolers.';

$modules = [
    [
        'title' => 'Middle School Transitions',
        'description' => 'Introducing algebraic reasoning and statistical analysis.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Ratios & Rates',
                'skills' => [
                    ['id' => 'h-math-m1-a-1', 'code' => 'H.M1.A.1', 'name' => 'Understanding unit rates and unit pricing'],
                    ['id' => 'h-math-m1-a-2', 'code' => 'H.M1.A.2', 'name' => 'Solving problems with unit rates and percent']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Rational Numbers',
                'skills' => [
                    ['id' => 'h-math-m1-b-1', 'code' => 'H.M1.B.1', 'name' => 'Introduction to integers and number lines'],
                    ['id' => 'h-math-m1-b-2', 'code' => 'H.M1.B.2', 'name' => 'Absolute value of rational numbers']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>