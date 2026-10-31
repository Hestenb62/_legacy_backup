<?php
/**
 * Hesten's Learning - Level H (Grade 6)
 * Complete 143-lesson EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?h-math-m1-a-1 or ?lesson=h-math-m1-a-1)
$requestedLesson = null;
if (!empty($_GET['lesson'])) {
    $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim($_GET['lesson']));
} elseif (!empty($_SERVER['QUERY_STRING'])) {
    $rawQuery = trim(explode('&', $_SERVER['QUERY_STRING'])[0]);
    if (!empty($rawQuery) && !str_contains($rawQuery, '=')) {
        $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', $rawQuery);
    }
}

if (!empty($requestedLesson)) {
    // Dynamic JSON Lesson Router: Tiered Resolution (Module JSON -> Individual JSON -> Master Registry)
    $hasJson = false;
    $parts = explode('-', $requestedLesson);
    if (count($parts) >= 3) {
        $moduleKey = strtolower($parts[0] . '-' . $parts[1] . '-' . $parts[2]);
        $modLessonFile = dirname(__DIR__) . '/assets/data/lessons/' . $moduleKey . '.json';
        if (file_exists($modLessonFile)) {
            $modData = json_decode(file_get_contents($modLessonFile), true);
            if (isset($modData['lessons'][$requestedLesson])) {
                $hasJson = true;
            }
        }
    }

    if (!$hasJson) {
        $jsonLessonFile = dirname(__DIR__) . '/assets/data/lessons/' . $requestedLesson . '.json';
        $hasJson = file_exists($jsonLessonFile);
    }

    $mainLessonsFile = dirname(__DIR__) . '/assets/data/lessons.json';
    if (!$hasJson && file_exists($mainLessonsFile)) {
        $data = json_decode(file_get_contents($mainLessonsFile), true);
        if (isset($data['lessons'][$requestedLesson])) {
            $hasJson = true;
        }
    }

    $lessonId = $requestedLesson;
    $levelUrl = 'h.php';
    $levelTitle = 'Level H';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "6th Grade Level H | Hesten's Learning";
$pageDescription = "Ratios, unit rates, rational numbers, algebraic expressions, surface area, and statistics for 6th-grade students.";
$pageKeywords    = "Grade 6, 6th Grade, ratios and rates, negative numbers, rational numbers, coordinate plane, expressions, equations, surface area, statistics";

// Template Variables
$themeColor = 'violet';
$levelId = 'h';
$levelTitle = 'Level H';
$gradeText = '6th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Ratios, rates, fractions, algebraic expressions, area, and statistics for middle schoolers.';

$modules = [
    [
        'title' => 'Module 1: Ratios and Unit Rates',
        'description' => 'Representing and reasoning about ratios, collections of equivalent ratios, unit rates, and percent applications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Representing and Reasoning About Ratios',
                'skills' => [
                    ['id' => 'h-math-m1-a-1', 'code' => 'H.M1.A.1', 'name' => 'Ratios', 'url' => 'h.php?h-math-m1-a-1'],
                    ['id' => 'h-math-m1-a-2', 'code' => 'H.M1.A.2', 'name' => 'Ratios', 'url' => 'h.php?h-math-m1-a-2'],
                    ['id' => 'h-math-m1-a-3', 'code' => 'H.M1.A.3', 'name' => 'Equivalent Ratios', 'url' => 'h.php?h-math-m1-a-3'],
                    ['id' => 'h-math-m1-a-4', 'code' => 'H.M1.A.4', 'name' => 'Equivalent Ratios', 'url' => 'h.php?h-math-m1-a-4'],
                    ['id' => 'h-math-m1-a-5', 'code' => 'H.M1.A.5', 'name' => 'Solving Problems by Finding Equivalent Ratios', 'url' => 'h.php?h-math-m1-a-5'],
                    ['id' => 'h-math-m1-a-6', 'code' => 'H.M1.A.6', 'name' => 'Solving Problems by Finding Equivalent Ratios', 'url' => 'h.php?h-math-m1-a-6'],
                    ['id' => 'h-math-m1-a-7', 'code' => 'H.M1.A.7', 'name' => 'Associated Ratios and the Value of a Ratio', 'url' => 'h.php?h-math-m1-a-7'],
                    ['id' => 'h-math-m1-a-8', 'code' => 'H.M1.A.8', 'name' => 'Equivalent Ratios Defined Through the Value of a Ratio', 'url' => 'h.php?h-math-m1-a-8'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Collections of Equivalent Ratios',
                'skills' => [
                    ['id' => 'h-math-m1-b-1', 'code' => 'H.M1.B.1', 'name' => 'Tables of Equivalent Ratios', 'url' => 'h.php?h-math-m1-b-1'],
                    ['id' => 'h-math-m1-b-2', 'code' => 'H.M1.B.2', 'name' => 'The Structure of Ratio Tables—Additive and Multiplicative', 'url' => 'h.php?h-math-m1-b-2'],
                    ['id' => 'h-math-m1-b-3', 'code' => 'H.M1.B.3', 'name' => 'Comparing Ratios Using Ratio Tables', 'url' => 'h.php?h-math-m1-b-3'],
                    ['id' => 'h-math-m1-b-4', 'code' => 'H.M1.B.4', 'name' => 'From Ratio Tables to Double Number Line Diagrams', 'url' => 'h.php?h-math-m1-b-4'],
                    ['id' => 'h-math-m1-b-5', 'code' => 'H.M1.B.5', 'name' => 'From Ratio Tables to Equations Using the Value of a Ratio', 'url' => 'h.php?h-math-m1-b-5'],
                    ['id' => 'h-math-m1-b-6', 'code' => 'H.M1.B.6', 'name' => 'From Ratio Tables, Equations, and Double Number Line Diagrams to Plots on the Coordinate Plane', 'url' => 'h.php?h-math-m1-b-6'],
                    ['id' => 'h-math-m1-b-7', 'code' => 'H.M1.B.7', 'name' => 'A Synthesis of Representations of Equivalent Ratio Collections', 'url' => 'h.php?h-math-m1-b-7'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Unit Rates',
                'skills' => [
                    ['id' => 'h-math-m1-c-1', 'code' => 'H.M1.C.1', 'name' => 'From Ratios to Rates', 'url' => 'h.php?h-math-m1-c-1'],
                    ['id' => 'h-math-m1-c-2', 'code' => 'H.M1.C.2', 'name' => 'From Rates to Ratios', 'url' => 'h.php?h-math-m1-c-2'],
                    ['id' => 'h-math-m1-c-3', 'code' => 'H.M1.C.3', 'name' => 'Finding a Rate by Dividing Two Quantities', 'url' => 'h.php?h-math-m1-c-3'],
                    ['id' => 'h-math-m1-c-4', 'code' => 'H.M1.C.4', 'name' => 'Comparison Shopping—Unit Price and Related Measurement Conversions', 'url' => 'h.php?h-math-m1-c-4'],
                    ['id' => 'h-math-m1-c-5', 'code' => 'H.M1.C.5', 'name' => 'Comparison Shopping—Unit Price and Related Measurement Conversions', 'url' => 'h.php?h-math-m1-c-5'],
                    ['id' => 'h-math-m1-c-6', 'code' => 'H.M1.C.6', 'name' => 'Getting the Job Done—Speed, Work, and Measurement Units', 'url' => 'h.php?h-math-m1-c-6'],
                    ['id' => 'h-math-m1-c-7', 'code' => 'H.M1.C.7', 'name' => 'Getting the Job Done—Speed, Work, and Measurement Units', 'url' => 'h.php?h-math-m1-c-7'],
                    ['id' => 'h-math-m1-c-8', 'code' => 'H.M1.C.8', 'name' => 'Problem Solving Using Rates, Unit Rates, and Conversions', 'url' => 'h.php?h-math-m1-c-8'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Percent',
                'skills' => [
                    ['id' => 'h-math-m1-d-1', 'code' => 'H.M1.D.1', 'name' => 'Percent and Rates per 100', 'url' => 'h.php?h-math-m1-d-1'],
                    ['id' => 'h-math-m1-d-2', 'code' => 'H.M1.D.2', 'name' => 'A Fraction as a Percent', 'url' => 'h.php?h-math-m1-d-2'],
                    ['id' => 'h-math-m1-d-3', 'code' => 'H.M1.D.3', 'name' => 'Percent of a Quantity', 'url' => 'h.php?h-math-m1-d-3'],
                    ['id' => 'h-math-m1-d-4', 'code' => 'H.M1.D.4', 'name' => 'Solving Percent Problems', 'url' => 'h.php?h-math-m1-d-4'],
                    ['id' => 'h-math-m1-d-5', 'code' => 'H.M1.D.5', 'name' => 'Solving Percent Problems', 'url' => 'h.php?h-math-m1-d-5'],
                    ['id' => 'h-math-m1-d-6', 'code' => 'H.M1.D.6', 'name' => 'Solving Percent Problems', 'url' => 'h.php?h-math-m1-d-6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Arithmetic Operations Including Division of Fractions',
        'description' => 'Dividing fractions by fractions, multi-digit decimal operations, dividing whole numbers and decimals, and number theory.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Dividing Fractions by Fractions',
                'skills' => [
                    ['id' => 'h-math-m2-a-1', 'code' => 'H.M2.A.1', 'name' => 'Interpreting Division of a Fraction by a Whole Number—Visual Models', 'url' => 'h.php?h-math-m2-a-1'],
                    ['id' => 'h-math-m2-a-2', 'code' => 'H.M2.A.2', 'name' => 'Interpreting Division of a Whole Number by a Fraction—Visual Models', 'url' => 'h.php?h-math-m2-a-2'],
                    ['id' => 'h-math-m2-a-3', 'code' => 'H.M2.A.3', 'name' => 'Interpreting and Computing Division of a Fraction by a Fraction—More Models', 'url' => 'h.php?h-math-m2-a-3'],
                    ['id' => 'h-math-m2-a-4', 'code' => 'H.M2.A.4', 'name' => 'Interpreting and Computing Division of a Fraction by a Fraction—More Models', 'url' => 'h.php?h-math-m2-a-4'],
                    ['id' => 'h-math-m2-a-5', 'code' => 'H.M2.A.5', 'name' => 'Creating Division Stories', 'url' => 'h.php?h-math-m2-a-5'],
                    ['id' => 'h-math-m2-a-6', 'code' => 'H.M2.A.6', 'name' => 'More Division Stories', 'url' => 'h.php?h-math-m2-a-6'],
                    ['id' => 'h-math-m2-a-7', 'code' => 'H.M2.A.7', 'name' => 'The Relationship Between Visual Fraction Models and Equations', 'url' => 'h.php?h-math-m2-a-7'],
                    ['id' => 'h-math-m2-a-8', 'code' => 'H.M2.A.8', 'name' => 'Dividing Fractions and Mixed Numbers', 'url' => 'h.php?h-math-m2-a-8'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Multi-Digit Decimal Operations—Adding, Subtracting, and Multiplying',
                'skills' => [
                    ['id' => 'h-math-m2-b-1', 'code' => 'H.M2.B.1', 'name' => 'Sums and Differences of Decimals', 'url' => 'h.php?h-math-m2-b-1'],
                    ['id' => 'h-math-m2-b-2', 'code' => 'H.M2.B.2', 'name' => 'The Distributive Property and the Products of Decimals', 'url' => 'h.php?h-math-m2-b-2'],
                    ['id' => 'h-math-m2-b-3', 'code' => 'H.M2.B.3', 'name' => 'Fraction Multiplication and the Products of Decimals', 'url' => 'h.php?h-math-m2-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Dividing Whole Numbers and Decimals',
                'skills' => [
                    ['id' => 'h-math-m2-c-1', 'code' => 'H.M2.C.1', 'name' => 'Estimating Digits in a Quotient', 'url' => 'h.php?h-math-m2-c-1'],
                    ['id' => 'h-math-m2-c-2', 'code' => 'H.M2.C.2', 'name' => 'Dividing Multi-Digit Numbers Using the Algorithm', 'url' => 'h.php?h-math-m2-c-2'],
                    ['id' => 'h-math-m2-c-3', 'code' => 'H.M2.C.3', 'name' => 'The Division Algorithm—Converting Decimal Division into Whole Number Division Using Fractions', 'url' => 'h.php?h-math-m2-c-3'],
                    ['id' => 'h-math-m2-c-4', 'code' => 'H.M2.C.4', 'name' => 'The Division Algorithm—Converting Decimal Division into Whole Number Division Using Mental Math', 'url' => 'h.php?h-math-m2-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Number Theory—Thinking Logically About Multiplicative Arithmetic',
                'skills' => [
                    ['id' => 'h-math-m2-d-1', 'code' => 'H.M2.D.1', 'name' => 'Even and Odd Numbers', 'url' => 'h.php?h-math-m2-d-1'],
                    ['id' => 'h-math-m2-d-2', 'code' => 'H.M2.D.2', 'name' => 'Divisibility Tests for 3 and 9', 'url' => 'h.php?h-math-m2-d-2'],
                    ['id' => 'h-math-m2-d-3', 'code' => 'H.M2.D.3', 'name' => 'Least Common Multiple and Greatest Common Factor', 'url' => 'h.php?h-math-m2-d-3'],
                    ['id' => 'h-math-m2-d-4', 'code' => 'H.M2.D.4', 'name' => 'The Euclidean Algorithm as an Application of the Long Division Algorithm', 'url' => 'h.php?h-math-m2-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Rational Numbers',
        'description' => 'Positive and negative numbers on the number line, order, absolute value, and rational numbers on the coordinate plane.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Understanding Positive and Negative Numbers on the Number Line',
                'skills' => [
                    ['id' => 'h-math-m3-a-1', 'code' => 'H.M3.A.1', 'name' => 'Positive and Negative Numbers on the Number Line—Opposite Direction and Value', 'url' => 'h.php?h-math-m3-a-1'],
                    ['id' => 'h-math-m3-a-2', 'code' => 'H.M3.A.2', 'name' => 'Real-World Positive and Negative Numbers and Zero', 'url' => 'h.php?h-math-m3-a-2'],
                    ['id' => 'h-math-m3-a-3', 'code' => 'H.M3.A.3', 'name' => 'Real-World Positive and Negative Numbers and Zero', 'url' => 'h.php?h-math-m3-a-3'],
                    ['id' => 'h-math-m3-a-4', 'code' => 'H.M3.A.4', 'name' => 'The Opposite of a Number', 'url' => 'h.php?h-math-m3-a-4'],
                    ['id' => 'h-math-m3-a-5', 'code' => 'H.M3.A.5', 'name' => 'The Opposite of a Number\'s Opposite', 'url' => 'h.php?h-math-m3-a-5'],
                    ['id' => 'h-math-m3-a-6', 'code' => 'H.M3.A.6', 'name' => 'Rational Numbers on the Number Line', 'url' => 'h.php?h-math-m3-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Order and Absolute Value',
                'skills' => [
                    ['id' => 'h-math-m3-b-1', 'code' => 'H.M3.B.1', 'name' => 'Ordering Integers and Other Rational Numbers', 'url' => 'h.php?h-math-m3-b-1'],
                    ['id' => 'h-math-m3-b-2', 'code' => 'H.M3.B.2', 'name' => 'Ordering Integers and Other Rational Numbers', 'url' => 'h.php?h-math-m3-b-2'],
                    ['id' => 'h-math-m3-b-3', 'code' => 'H.M3.B.3', 'name' => 'Comparing Integers and Other Rational Numbers', 'url' => 'h.php?h-math-m3-b-3'],
                    ['id' => 'h-math-m3-b-4', 'code' => 'H.M3.B.4', 'name' => 'Writing and Interpreting Inequality Statements Involving Rational Numbers', 'url' => 'h.php?h-math-m3-b-4'],
                    ['id' => 'h-math-m3-b-5', 'code' => 'H.M3.B.5', 'name' => 'Absolute Value—Magnitude and Distance', 'url' => 'h.php?h-math-m3-b-5'],
                    ['id' => 'h-math-m3-b-6', 'code' => 'H.M3.B.6', 'name' => 'The Relationship Between Absolute Value and Order', 'url' => 'h.php?h-math-m3-b-6'],
                    ['id' => 'h-math-m3-b-7', 'code' => 'H.M3.B.7', 'name' => 'Statements of Order in the Real World', 'url' => 'h.php?h-math-m3-b-7'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Rational Numbers and the Coordinate Plane',
                'skills' => [
                    ['id' => 'h-math-m3-c-1', 'code' => 'H.M3.C.1', 'name' => 'Ordered Pairs', 'url' => 'h.php?h-math-m3-c-1'],
                    ['id' => 'h-math-m3-c-2', 'code' => 'H.M3.C.2', 'name' => 'Locating Ordered Pairs on the Coordinate Plane', 'url' => 'h.php?h-math-m3-c-2'],
                    ['id' => 'h-math-m3-c-3', 'code' => 'H.M3.C.3', 'name' => 'Symmetry in the Coordinate Plane', 'url' => 'h.php?h-math-m3-c-3'],
                    ['id' => 'h-math-m3-c-4', 'code' => 'H.M3.C.4', 'name' => 'Drawing the Coordinate Plane and Points on the Plane', 'url' => 'h.php?h-math-m3-c-4'],
                    ['id' => 'h-math-m3-c-5', 'code' => 'H.M3.C.5', 'name' => 'Distance on the Coordinate Plane', 'url' => 'h.php?h-math-m3-c-5'],
                    ['id' => 'h-math-m3-c-6', 'code' => 'H.M3.C.6', 'name' => 'Problem Solving and the Coordinate Plane', 'url' => 'h.php?h-math-m3-c-6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Expressions and Equations',
        'description' => 'Relationships of operations, special notations, substitution, algebraic properties, solving one-variable equations, and real-world applications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Relationships of the Operations',
                'skills' => [
                    ['id' => 'h-math-m4-a-1', 'code' => 'H.M4.A.1', 'name' => 'The Relationship of Addition and Subtraction', 'url' => 'h.php?h-math-m4-a-1'],
                    ['id' => 'h-math-m4-a-2', 'code' => 'H.M4.A.2', 'name' => 'The Relationship of Multiplication and Division', 'url' => 'h.php?h-math-m4-a-2'],
                    ['id' => 'h-math-m4-a-3', 'code' => 'H.M4.A.3', 'name' => 'The Relationship of Multiplication and Addition', 'url' => 'h.php?h-math-m4-a-3'],
                    ['id' => 'h-math-m4-a-4', 'code' => 'H.M4.A.4', 'name' => 'The Relationship of Division and Subtraction', 'url' => 'h.php?h-math-m4-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Special Notations of Operations',
                'skills' => [
                    ['id' => 'h-math-m4-b-1', 'code' => 'H.M4.B.1', 'name' => 'Exponents', 'url' => 'h.php?h-math-m4-b-1'],
                    ['id' => 'h-math-m4-b-2', 'code' => 'H.M4.B.2', 'name' => 'The Order of Operations', 'url' => 'h.php?h-math-m4-b-2'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Replacing Letters and Numbers',
                'skills' => [
                    ['id' => 'h-math-m4-c-1', 'code' => 'H.M4.C.1', 'name' => 'Replacing Letters with Numbers', 'url' => 'h.php?h-math-m4-c-1'],
                    ['id' => 'h-math-m4-c-2', 'code' => 'H.M4.C.2', 'name' => 'Replacing Numbers with Letters', 'url' => 'h.php?h-math-m4-c-2'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Expanding, Factoring, and Distributing Expressions',
                'skills' => [
                    ['id' => 'h-math-m4-d-1', 'code' => 'H.M4.D.1', 'name' => 'Writing Addition and Subtraction Expressions', 'url' => 'h.php?h-math-m4-d-1'],
                    ['id' => 'h-math-m4-d-2', 'code' => 'H.M4.D.2', 'name' => 'Writing and Expanding Multiplication Expressions', 'url' => 'h.php?h-math-m4-d-2'],
                    ['id' => 'h-math-m4-d-3', 'code' => 'H.M4.D.3', 'name' => 'Factoring Expressions', 'url' => 'h.php?h-math-m4-d-3'],
                    ['id' => 'h-math-m4-d-4', 'code' => 'H.M4.D.4', 'name' => 'Distributing Expressions', 'url' => 'h.php?h-math-m4-d-4'],
                    ['id' => 'h-math-m4-d-5', 'code' => 'H.M4.D.5', 'name' => 'Writing Division Expressions', 'url' => 'h.php?h-math-m4-d-5'],
                    ['id' => 'h-math-m4-d-6', 'code' => 'H.M4.D.6', 'name' => 'Writing Division Expressions', 'url' => 'h.php?h-math-m4-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Expressing Operations in Algebraic Form',
                'skills' => [
                    ['id' => 'h-math-m4-e-1', 'code' => 'H.M4.E.1', 'name' => 'Read Expressions in Which Letters Stand for Numbers', 'url' => 'h.php?h-math-m4-e-1'],
                    ['id' => 'h-math-m4-e-2', 'code' => 'H.M4.E.2', 'name' => 'Write Expressions in Which Letters Stand for Numbers', 'url' => 'h.php?h-math-m4-e-2'],
                    ['id' => 'h-math-m4-e-3', 'code' => 'H.M4.E.3', 'name' => 'Write Expressions in Which Letters Stand for Numbers', 'url' => 'h.php?h-math-m4-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Writing and Evaluating Expressions and Formulas',
                'skills' => [
                    ['id' => 'h-math-m4-f-1', 'code' => 'H.M4.F.1', 'name' => 'Writing and Evaluating Expressions―Addition and Subtraction', 'url' => 'h.php?h-math-m4-f-1'],
                    ['id' => 'h-math-m4-f-2', 'code' => 'H.M4.F.2', 'name' => 'Substituting to Evaluate Addition and Subtraction Expressions', 'url' => 'h.php?h-math-m4-f-2'],
                    ['id' => 'h-math-m4-f-3', 'code' => 'H.M4.F.3', 'name' => 'Writing and Evaluating Expressions—Multiplication and Division', 'url' => 'h.php?h-math-m4-f-3'],
                    ['id' => 'h-math-m4-f-4', 'code' => 'H.M4.F.4', 'name' => 'Writing and Evaluating Expressions―Multiplication and Addition', 'url' => 'h.php?h-math-m4-f-4'],
                    ['id' => 'h-math-m4-f-5', 'code' => 'H.M4.F.5', 'name' => 'Writing and Evaluating Expressions—Exponents', 'url' => 'h.php?h-math-m4-f-5'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Solving Equations',
                'skills' => [
                    ['id' => 'h-math-m4-g-1', 'code' => 'H.M4.G.1', 'name' => 'True and False Number Sentences', 'url' => 'h.php?h-math-m4-g-1'],
                    ['id' => 'h-math-m4-g-2', 'code' => 'H.M4.G.2', 'name' => 'True and False Number Sentences', 'url' => 'h.php?h-math-m4-g-2'],
                    ['id' => 'h-math-m4-g-3', 'code' => 'H.M4.G.3', 'name' => 'Finding Solutions to Make Equations True', 'url' => 'h.php?h-math-m4-g-3'],
                    ['id' => 'h-math-m4-g-4', 'code' => 'H.M4.G.4', 'name' => 'One-Step Equations―Addition and Subtraction', 'url' => 'h.php?h-math-m4-g-4'],
                    ['id' => 'h-math-m4-g-5', 'code' => 'H.M4.G.5', 'name' => 'One-Step Equations―Multiplication and Division', 'url' => 'h.php?h-math-m4-g-5'],
                    ['id' => 'h-math-m4-g-6', 'code' => 'H.M4.G.6', 'name' => 'Two-Step Problems—All Operations', 'url' => 'h.php?h-math-m4-g-6'],
                    ['id' => 'h-math-m4-g-7', 'code' => 'H.M4.G.7', 'name' => 'Multi-Step Problems—All Operations', 'url' => 'h.php?h-math-m4-g-7'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Applications of Equations',
                'skills' => [
                    ['id' => 'h-math-m4-h-1', 'code' => 'H.M4.H.1', 'name' => 'One-Step Problems in the Real World', 'url' => 'h.php?h-math-m4-h-1'],
                    ['id' => 'h-math-m4-h-2', 'code' => 'H.M4.H.2', 'name' => 'Problems in Mathematical Terms', 'url' => 'h.php?h-math-m4-h-2'],
                    ['id' => 'h-math-m4-h-3', 'code' => 'H.M4.H.3', 'name' => 'Multi-Step Problems in the Real World', 'url' => 'h.php?h-math-m4-h-3'],
                    ['id' => 'h-math-m4-h-4', 'code' => 'H.M4.H.4', 'name' => 'From Equations to Inequalities', 'url' => 'h.php?h-math-m4-h-4'],
                    ['id' => 'h-math-m4-h-5', 'code' => 'H.M4.H.5', 'name' => 'Writing and Graphing Inequalities in Real-World Problems', 'url' => 'h.php?h-math-m4-h-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Area, Surface Area, and Volume Problems',
        'description' => 'Area of triangles, quadrilaterals, and polygons, polygons on the coordinate plane, volume of prisms, and surface area using nets.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Area of Triangles, Quadrilaterals, and Polygons',
                'skills' => [
                    ['id' => 'h-math-m5-a-1', 'code' => 'H.M5.A.1', 'name' => 'The Area of Parallelograms Through Rectangle Facts', 'url' => 'h.php?h-math-m5-a-1'],
                    ['id' => 'h-math-m5-a-2', 'code' => 'H.M5.A.2', 'name' => 'The Area of Right Triangles', 'url' => 'h.php?h-math-m5-a-2'],
                    ['id' => 'h-math-m5-a-3', 'code' => 'H.M5.A.3', 'name' => 'The Area of Acute Triangles Using Height and Base', 'url' => 'h.php?h-math-m5-a-3'],
                    ['id' => 'h-math-m5-a-4', 'code' => 'H.M5.A.4', 'name' => 'The Area of All Triangles Using Height and Base', 'url' => 'h.php?h-math-m5-a-4'],
                    ['id' => 'h-math-m5-a-5', 'code' => 'H.M5.A.5', 'name' => 'The Area of Polygons Through Composition and Decomposition', 'url' => 'h.php?h-math-m5-a-5'],
                    ['id' => 'h-math-m5-a-6', 'code' => 'H.M5.A.6', 'name' => 'Area in the Real World', 'url' => 'h.php?h-math-m5-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Polygons on the Coordinate Plane',
                'skills' => [
                    ['id' => 'h-math-m5-b-1', 'code' => 'H.M5.B.1', 'name' => 'Distance on the Coordinate Plane', 'url' => 'h.php?h-math-m5-b-1'],
                    ['id' => 'h-math-m5-b-2', 'code' => 'H.M5.B.2', 'name' => 'Drawing Polygons in the Coordinate Plane', 'url' => 'h.php?h-math-m5-b-2'],
                    ['id' => 'h-math-m5-b-3', 'code' => 'H.M5.B.3', 'name' => 'Determining Perimeter and Area of Polygons on the Coordinate Plane', 'url' => 'h.php?h-math-m5-b-3'],
                    ['id' => 'h-math-m5-b-4', 'code' => 'H.M5.B.4', 'name' => 'Distance, Perimeter, and Area in the Real World', 'url' => 'h.php?h-math-m5-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Volume of Right Rectangular Prisms',
                'skills' => [
                    ['id' => 'h-math-m5-c-1', 'code' => 'H.M5.C.1', 'name' => 'Volume with Fractional Edge Lengths and Unit Cubes', 'url' => 'h.php?h-math-m5-c-1'],
                    ['id' => 'h-math-m5-c-2', 'code' => 'H.M5.C.2', 'name' => 'From Unit Cubes to the Formulas for Volume', 'url' => 'h.php?h-math-m5-c-2'],
                    ['id' => 'h-math-m5-c-3', 'code' => 'H.M5.C.3', 'name' => 'The Formulas for Volume', 'url' => 'h.php?h-math-m5-c-3'],
                    ['id' => 'h-math-m5-c-4', 'code' => 'H.M5.C.4', 'name' => 'Volume in the Real World', 'url' => 'h.php?h-math-m5-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Nets and Surface Area',
                'skills' => [
                    ['id' => 'h-math-m5-d-1', 'code' => 'H.M5.D.1', 'name' => 'Representing Three-Dimensional Figures Using Nets', 'url' => 'h.php?h-math-m5-d-1'],
                    ['id' => 'h-math-m5-d-2', 'code' => 'H.M5.D.2', 'name' => 'Constructing Nets', 'url' => 'h.php?h-math-m5-d-2'],
                    ['id' => 'h-math-m5-d-3', 'code' => 'H.M5.D.3', 'name' => 'From Nets to Surface Area', 'url' => 'h.php?h-math-m5-d-3'],
                    ['id' => 'h-math-m5-d-4', 'code' => 'H.M5.D.4', 'name' => 'Determining Surface Area of Three-Dimensional Figures', 'url' => 'h.php?h-math-m5-d-4'],
                    ['id' => 'h-math-m5-d-5', 'code' => 'H.M5.D.5', 'name' => 'Surface Area and Volume in the Real World', 'url' => 'h.php?h-math-m5-d-5'],
                    ['id' => 'h-math-m5-d-6', 'code' => 'H.M5.D.6', 'name' => 'Applying Surface Area and Volume to Aquariums', 'url' => 'h.php?h-math-m5-d-6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Statistics',
        'description' => 'Understanding distributions, mean, mean absolute deviation (MAD), median, interquartile range (IQR), and graphical summaries.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Understanding Distributions',
                'skills' => [
                    ['id' => 'h-math-m6-a-1', 'code' => 'H.M6.A.1', 'name' => 'Posing Statistical Questions', 'url' => 'h.php?h-math-m6-a-1'],
                    ['id' => 'h-math-m6-a-2', 'code' => 'H.M6.A.2', 'name' => 'Displaying a Data Distribution', 'url' => 'h.php?h-math-m6-a-2'],
                    ['id' => 'h-math-m6-a-3', 'code' => 'H.M6.A.3', 'name' => 'Creating a Dot Plot', 'url' => 'h.php?h-math-m6-a-3'],
                    ['id' => 'h-math-m6-a-4', 'code' => 'H.M6.A.4', 'name' => 'Creating a Histogram', 'url' => 'h.php?h-math-m6-a-4'],
                    ['id' => 'h-math-m6-a-5', 'code' => 'H.M6.A.5', 'name' => 'Describing a Distribution Displayed in a Histogram', 'url' => 'h.php?h-math-m6-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Summarizing Symmetric Distributions Using Mean and MAD',
                'skills' => [
                    ['id' => 'h-math-m6-b-1', 'code' => 'H.M6.B.1', 'name' => 'Describing the Center of a Distribution Using the Mean', 'url' => 'h.php?h-math-m6-b-1'],
                    ['id' => 'h-math-m6-b-2', 'code' => 'H.M6.B.2', 'name' => 'The Mean as a Balance Point', 'url' => 'h.php?h-math-m6-b-2'],
                    ['id' => 'h-math-m6-b-3', 'code' => 'H.M6.B.3', 'name' => 'Variability in a Data Distribution', 'url' => 'h.php?h-math-m6-b-3'],
                    ['id' => 'h-math-m6-b-4', 'code' => 'H.M6.B.4', 'name' => 'The Mean Absolute Deviation (MAD)', 'url' => 'h.php?h-math-m6-b-4'],
                    ['id' => 'h-math-m6-b-5', 'code' => 'H.M6.B.5', 'name' => 'Describing Distributions Using the Mean and MAD', 'url' => 'h.php?h-math-m6-b-5'],
                    ['id' => 'h-math-m6-b-6', 'code' => 'H.M6.B.6', 'name' => 'Describing Distributions Using the Mean and MAD', 'url' => 'h.php?h-math-m6-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Summarizing Skewed Distributions Using Median and IQR',
                'skills' => [
                    ['id' => 'h-math-m6-c-1', 'code' => 'H.M6.C.1', 'name' => 'Describing the Center of a Distribution Using the Median', 'url' => 'h.php?h-math-m6-c-1'],
                    ['id' => 'h-math-m6-c-2', 'code' => 'H.M6.C.2', 'name' => 'Describing Variability Using the Interquartile Range (IQR)', 'url' => 'h.php?h-math-m6-c-2'],
                    ['id' => 'h-math-m6-c-3', 'code' => 'H.M6.C.3', 'name' => 'Summarizing a Distribution Using a Box Plot', 'url' => 'h.php?h-math-m6-c-3'],
                    ['id' => 'h-math-m6-c-4', 'code' => 'H.M6.C.4', 'name' => 'More Practice with Box Plots', 'url' => 'h.php?h-math-m6-c-4'],
                    ['id' => 'h-math-m6-c-5', 'code' => 'H.M6.C.5', 'name' => 'Understanding Box Plots', 'url' => 'h.php?h-math-m6-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Summarizing and Describing Distributions',
                'skills' => [
                    ['id' => 'h-math-m6-d-1', 'code' => 'H.M6.D.1', 'name' => 'Developing a Statistical Project', 'url' => 'h.php?h-math-m6-d-1'],
                    ['id' => 'h-math-m6-d-2', 'code' => 'H.M6.D.2', 'name' => 'Connecting Graphical Representations and Numerical Summaries', 'url' => 'h.php?h-math-m6-d-2'],
                    ['id' => 'h-math-m6-d-3', 'code' => 'H.M6.D.3', 'name' => 'Comparing Data Distributions', 'url' => 'h.php?h-math-m6-d-3'],
                    ['id' => 'h-math-m6-d-4', 'code' => 'H.M6.D.4', 'name' => 'Describing Center, Variability, and Shape of a Data Distribution from a Graphical Representation', 'url' => 'h.php?h-math-m6-d-4'],
                    ['id' => 'h-math-m6-d-5', 'code' => 'H.M6.D.5', 'name' => 'Summarizing a Data Distribution by Describing Center, Variability, and Shape', 'url' => 'h.php?h-math-m6-d-5'],
                    ['id' => 'h-math-m6-d-6', 'code' => 'H.M6.D.6', 'name' => 'Presenting a Summary of a Statistical Project', 'url' => 'h.php?h-math-m6-d-6'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
