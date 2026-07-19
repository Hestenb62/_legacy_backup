<?php
/**
 * Hesten's Learning - Practice GED (Extra Resources)
 */

$pageTitle       = "Practice GED | Hesten's Learning";
$pageDescription = "Comprehensive prep for the GED equivalency test covering Math Reasoning, Language Arts, Science, and Social Studies.";
$pageKeywords    = "GED, High School Equivalency, Practice Test, Test Prep, Math, RLA, Science, Social Studies";

$themeColor = 'purple';
$levelId = 'practice-ged';
$levelTitle = 'Practice GED';
$gradeText = 'Extra Resources';
$initialSubject = 'math';
$initialSubjectName = 'GED Test Prep';
$initialSubjectDesc = 'Full subject practice tests, skill breakdowns, and study modules for the GED equivalency exam.';

$modules = [
    [
        'title' => 'Mathematical Reasoning',
        'description' => 'Quantitative problem solving, algebraic expressions, linear equations, geometry, and data interpretation.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Quantitative Problem Solving',
                'skills' => [
                    ['id' => 'ged-m1-a-1', 'code' => 'GED.M.1', 'name' => 'Fractions, Decimals, Percents & Order of Operations'],
                    ['id' => 'ged-m1-a-2', 'code' => 'GED.M.2', 'name' => 'Ratios, Proportions & Percent Change'],
                    ['id' => 'ged-m1-a-3', 'code' => 'GED.M.3', 'name' => 'Perimeter, Area, Volume & Pythagorean Theorem']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Algebraic Reasoning',
                'skills' => [
                    ['id' => 'ged-m1-b-1', 'code' => 'GED.M.4', 'name' => 'Solving One-Variable Linear Equations & Inequalities'],
                    ['id' => 'ged-m1-b-2', 'code' => 'GED.M.5', 'name' => 'Graphing Linear Functions & Slope-Intercept Form'],
                    ['id' => 'ged-m1-b-3', 'code' => 'GED.M.6', 'name' => 'Evaluating Quadratic Expressions & Polynomials']
                ]
            ]
        ]
    ],
    [
        'title' => 'Reasoning Through Language Arts (RLA)',
        'description' => 'Reading comprehension, informational & literary text analysis, grammar mechanics, and extended writing.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Reading Comprehension',
                'skills' => [
                    ['id' => 'ged-m2-a-1', 'code' => 'GED.R.1', 'name' => 'Analyzing Main Ideas, Details & Inferences in Text'],
                    ['id' => 'ged-m2-a-2', 'code' => 'GED.R.2', 'name' => 'Comparing Authors’ Arguments & Evidence']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Language & Extended Response',
                'skills' => [
                    ['id' => 'ged-m2-b-1', 'code' => 'GED.W.1', 'name' => 'Grammar, Punctuation, and Sentence Structure'],
                    ['id' => 'ged-m2-b-2', 'code' => 'GED.W.2', 'name' => 'Writing a Structured Argumentative Essay Response']
                ]
            ]
        ]
    ],
    [
        'title' => 'Science & Social Studies Prep',
        'description' => 'Life science, physical science, Earth science, Civics, U.S. History, and Economics.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Science Reasoning',
                'skills' => [
                    ['id' => 'ged-m3-a-1', 'code' => 'GED.S.1', 'name' => 'Human Body Systems & Ecosystem Interactions'],
                    ['id' => 'ged-m3-a-2', 'code' => 'GED.S.2', 'name' => 'Energy, Matter, Forces & Chemical Reactions'],
                    ['id' => 'ged-m3-a-3', 'code' => 'GED.S.3', 'name' => 'Interpreting Graphs, Tables & Scientific Experiments']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Social Studies Reasoning',
                'skills' => [
                    ['id' => 'ged-m3-b-1', 'code' => 'GED.SS.1', 'name' => 'US Civics, Government Structures & Constitution'],
                    ['id' => 'ged-m3-b-2', 'code' => 'GED.SS.2', 'name' => 'Key Historical Events & Document Analysis'],
                    ['id' => 'ged-m3-b-3', 'code' => 'GED.SS.3', 'name' => 'Basic Economic Concepts & Geographic Literacy']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>
