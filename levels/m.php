<?php
/**
 * Hesten's Learning - Level M (Grade 11)
 */

$pageTitle       = "Grade 11 Level M | Hesten's Learning";
$pageDescription = "Pre-calculus, logarithms, and advanced American literature for Juniors.";
$pageKeywords    = "Grade 11, Junior, Pre-calculus, Trigonometry, logarithms";

$themeColor = 'amber';
$levelId = 'm';
$levelTitle = 'Level M';
$gradeText = 'High School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Advanced Algebra, logarithms, complex numbers, and preparing for Calculus.';

$modules = [
    [
        'title' => 'Advanced Analysis',
        'description' => 'Junior year focus on functions and mathematical modeling.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Functions & Logarithms',
                'skills' => [
                    ['id' => 'm-math-m1-a-1', 'code' => 'M.M1.A.1', 'name' => 'Properties of logarithmic and exponential functions'],
                    ['id' => 'm-math-m1-a-2', 'code' => 'M.M1.A.2', 'name' => 'Solving exponential equations using logarithms']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Complex Numbers',
                'skills' => [
                    ['id' => 'm-math-m1-b-1', 'code' => 'M.M1.B.1', 'name' => 'Performing operations with complex numbers'],
                    ['id' => 'm-math-m1-b-2', 'code' => 'M.M1.B.2', 'name' => 'The Fundamental Theorem of Algebra']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>