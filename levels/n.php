<?php
/**
 * Hesten's Learning - Level N (Grade 12)
 */

$pageTitle       = "Grade 12 Level N | Hesten's Learning";
$pageDescription = "Calculus, statistics, and capstone literature analysis for Seniors.";
$pageKeywords    = "Grade 12, Senior, Calculus, Statistics, Capstone";

$themeColor = 'pink';
$levelId = 'n';
$levelTitle = 'Level N';
$gradeText = 'High School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Final preparations for college-level mathematics, Calculus, and applied statistics.';

$modules = [
    [
        'title' => 'Capstone Mastery',
        'description' => 'Senior year integration of mathematical and analytical concepts.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Calculus Foundations',
                'skills' => [
                    ['id' => 'n-math-m1-a-1', 'code' => 'N.M1.A.1', 'name' => 'Introduction to limits and continuity'],
                    ['id' => 'n-math-m1-a-2', 'code' => 'N.M1.A.2', 'name' => 'The concept of a derivative at a point']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Applied Statistics',
                'skills' => [
                    ['id' => 'n-math-m1-b-1', 'code' => 'N.M1.B.1', 'name' => 'Modeling data with appropriate distributions'],
                    ['id' => 'n-math-m1-b-2', 'code' => 'N.M1.B.2', 'name' => 'Statistical inference and randomized designs']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>