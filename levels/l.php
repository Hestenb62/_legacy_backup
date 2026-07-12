<?php
/**
 * Hesten's Learning - Level L (Grade 10)
 */

$pageTitle       = "Grade 10 Level L | Hesten's Learning";
$pageDescription = "Geometry, world history, and advanced biology for Sophomores.";
$pageKeywords    = "Grade 10, Sophomore, Geometry, proofs, rhetoric analysis";

$themeColor = 'orange';
$levelId = 'l';
$levelTitle = 'Level L';
$gradeText = 'High School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Geometry foundations, trigonometric ratios, and reasoning with proofs.';

$modules = [
    [
        'title' => 'Geometric Reasoning',
        'description' => 'Sophomore year mastery of space, shape, and logic.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Similarity & Proofs',
                'skills' => [
                    ['id' => 'l-math-m1-a-1', 'code' => 'L.M1.A.1', 'name' => 'Defining trigonometric ratios in right triangles'],
                    ['id' => 'l-math-m1-a-2', 'code' => 'L.M1.A.2', 'name' => 'Applying similarity theorems in geometric proofs']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Coordinates & Circles',
                'skills' => [
                    ['id' => 'l-math-m1-b-1', 'code' => 'L.M1.B.1', 'name' => 'Deriving the equation of a circle'],
                    ['id' => 'l-math-m1-b-2', 'code' => 'L.M1.B.2', 'name' => 'Geometric modeling in real-world contexts']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>