<?php
/**
 * Hesten's Learning - Level J (Grade 8)
 */

$pageTitle       = "Grade 8 Level J | Hesten's Learning";
$pageDescription = "Pre-Algebra, linear equations, and physical sciences for 8th-grade students.";
$pageKeywords    = "Grade 8, linear equations, functions, Pythagorean Theorem";

$themeColor = 'fuchsia';
$levelId = 'j';
$levelTitle = 'Level J';
$gradeText = 'Middle School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Pre-Algebra concepts, linear equations, and preparing for High School mathematics.';

$modules = [
    [
        'title' => 'High School Readiness',
        'description' => 'Mastering linear functions and geometric proof foundations.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Linear Expressions',
                'skills' => [
                    ['id' => 'j-math-m1-a-1', 'code' => 'J.M1.A.1', 'name' => 'Solving multi-step linear equations'],
                    ['id' => 'j-math-m1-a-2', 'code' => 'J.M1.A.2', 'name' => 'Understanding slope and rate of change']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Functions & Geometry',
                'skills' => [
                    ['id' => 'j-math-m1-b-1', 'code' => 'J.M1.B.1', 'name' => 'Comparing properties of two functions'],
                    ['id' => 'j-math-m1-b-2', 'code' => 'J.M1.B.2', 'name' => 'Proof of the Pythagorean Theorem']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>