<?php
/**
 * Hesten's Learning - Level O (Extra/Resources)
 */

$pageTitle       = "Extra Resources Level O | Hesten's Learning";
$pageDescription = "Challenge yourself with extra multi-subject assessments and enrichment materials.";
$pageKeywords    = "Enrichment, extra, challenge, STEM, logic";

$themeColor = 'red';
$levelId = 'o';
$levelTitle = 'Level O';
$gradeText = 'Extra Resources';
$initialSubject = 'math';
$initialSubjectName = 'Challenges';
$initialSubjectDesc = 'Advanced STEM challenges, logic puzzles, and multi-subject enrichment.';

$modules = [
    [
        'title' => 'Enrichment & Challenges',
        'description' => 'Cross-curricular activities to push your thinking further.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Logic & Problem Solving',
                'skills' => [
                    ['id' => 'o-math-m1-a-1', 'code' => 'O.M1.A.1', 'name' => 'Complex logic grid puzzles'],
                    ['id' => 'o-math-m1-a-2', 'code' => 'O.M1.A.2', 'name' => 'Introduction to computational thinking']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'STEM Extensions',
                'skills' => [
                    ['id' => 'o-math-m1-b-1', 'code' => 'O.M1.B.1', 'name' => 'Real-world data modeling project'],
                    ['id' => 'o-math-m1-b-2', 'code' => 'O.M1.B.2', 'name' => 'Advanced geometry constructions']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>