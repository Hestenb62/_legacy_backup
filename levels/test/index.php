<?php
/**
 * Hesten's Learning - Test / Extra Resources Level Page
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(__DIR__)) . '/');
}

$pageTitle       = "Test & Extra Review | Hesten's Learning";
$pageDescription = "Practice with quizzes, review extra study materials, and challenge yourself with multi-subject assessments.";
$pageKeywords    = "quiz, exam, assessment, challenge, extra credit, test prep, review";

$themeColor         = 'violet';
$levelId            = 'test';
$levelTitle         = 'Test / Extra';
$gradeText          = 'Extra Resources';
$initialSubject     = 'math';
$initialSubjectName = 'Assessments & Quizzes';
$initialSubjectDesc = 'Skill-based quizzes, comprehensive exams, and STEM problem-solving modules.';

$modules = [
    [
        'title' => 'Multi-Subject Practice & Diagnostic Exams',
        'description' => 'Skill-based quizzes and comprehensive practice exams covering core quantitative concepts.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Diagnostic & Skill Benchmarks',
                'skills' => [
                    ['id' => 'test-m1-a-1', 'code' => 'TEST.M.1', 'name' => 'General Math Diagnostic & Skill Benchmark'],
                    ['id' => 'test-m1-a-2', 'code' => 'TEST.M.2', 'name' => 'Algebra & Geometry Challenge Exam'],
                    ['id' => 'test-m1-a-3', 'code' => 'TEST.M.3', 'name' => 'Data Interpretation & Quantitative Analysis']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'STEM & Problem-Solving Challenges',
                'skills' => [
                    ['id' => 'test-m1-b-1', 'code' => 'TEST.M.4', 'name' => 'Logic Puzzles & Creative Problem Solving'],
                    ['id' => 'test-m1-b-2', 'code' => 'TEST.M.5', 'name' => 'Real-World Applied Math Scenarios']
                ]
            ]
        ]
    ]
];

$ela_modules = [
    [
        'title' => 'Language Arts & Reading Assessments',
        'description' => 'Comprehensive reading comprehension, vocabulary analysis, and writing evaluation modules.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Reading Comprehension & Text Analysis',
                'skills' => [
                    ['id' => 'test-ela-1', 'code' => 'TEST.R.1', 'name' => 'Informational & Literary Text Benchmark Quiz'],
                    ['id' => 'test-ela-2', 'code' => 'TEST.R.2', 'name' => 'Academic Vocabulary & Context Clues Test']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Writing & Proofreading Evaluation',
                'skills' => [
                    ['id' => 'test-ela-3', 'code' => 'TEST.W.1', 'name' => 'Grammar, Mechanics & Sentence Repair Diagnostic'],
                    ['id' => 'test-ela-4', 'code' => 'TEST.W.2', 'name' => 'Argument Construction & Evidence Evaluation']
                ]
            ]
        ]
    ]
];

$science_modules = [
    [
        'title' => 'Scientific Inquiry & STEM Practice',
        'description' => 'Practice quizzes on scientific methods, physical laws, life sciences, and data analysis.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Experimental Design & Data Literacy',
                'skills' => [
                    ['id' => 'test-sci-1', 'code' => 'TEST.S.1', 'name' => 'Scientific Method & Variable Control Quiz'],
                    ['id' => 'test-sci-2', 'code' => 'TEST.S.2', 'name' => 'Graphing, Data Tables & Lab Analysis Challenge']
                ]
            ]
        ]
    ]
];

$social_modules = [
    [
        'title' => 'Social Studies & Civics Reviews',
        'description' => 'Civics, historical document analysis, and social science evaluation tests.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Civics & Historical Reasoning',
                'skills' => [
                    ['id' => 'test-soc-1', 'code' => 'TEST.SS.1', 'name' => 'U.S. Government & Constitution Practice Exam'],
                    ['id' => 'test-soc-2', 'code' => 'TEST.SS.2', 'name' => 'Primary Source Document & Historical Reasoning Review']
                ]
            ]
        ]
    ]
];

include ABSPATH . 'src/level_template.php';
?>
