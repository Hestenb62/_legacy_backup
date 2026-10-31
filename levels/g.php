<?php
/**
 * Hesten's Learning - Level G (Grade 5)
 * Complete 149-lesson EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?g-math-m1-a-1 or ?lesson=g-math-m1-a-1)
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
    $levelUrl = 'g.php';
    $levelTitle = 'Level G';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "5th Grade Level G | Hesten's Learning";
$pageDescription = "Decimal place value, multi-digit operations, fractions, volume, area, and coordinate plane problem solving for 5th-grade students.";
$pageKeywords    = "Grade 5, 5th Grade, decimal place value, fraction operations, multi-digit multiplication, volume, coordinate plane";

// Template Variables
$themeColor = 'emerald';
$levelId = 'g';
$levelTitle = 'Level G';
$gradeText = '5th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Decimal operations, fraction arithmetic, volume, and coordinate plane problem solving.';

$modules = [
    [
        'title' => 'Module 1: Place Value and Decimal Fractions',
        'description' => 'Multiplicative patterns on the place value chart, decimal fractions in expanded/unit/word forms, rounding decimals, adding, subtracting, multiplying, and dividing decimals.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Multiplicative Patterns on the Place Value Chart',
                'skills' => [
                    ['id' => 'g-math-m1-a-1', 'code' => 'G.M1.A.1', 'name' => 'Reason concretely and pictorially using place value understanding to relate adjacent base te...', 'url' => 'g.php?g-math-m1-a-1'],
                    ['id' => 'g-math-m1-a-2', 'code' => 'G.M1.A.2', 'name' => 'Reason abstractly using place value understanding to relate adjacent base ten units from mil...', 'url' => 'g.php?g-math-m1-a-2'],
                    ['id' => 'g-math-m1-a-3', 'code' => 'G.M1.A.3', 'name' => 'Use exponents to name place value units, and explain patterns in the placement of the decima...', 'url' => 'g.php?g-math-m1-a-3'],
                    ['id' => 'g-math-m1-a-4', 'code' => 'G.M1.A.4', 'name' => 'Use exponents to denote powers of 10 with application to metric conversions.', 'url' => 'g.php?g-math-m1-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Decimal Fractions and Place Value Patterns',
                'skills' => [
                    ['id' => 'g-math-m1-b-1', 'code' => 'G.M1.B.1', 'name' => 'Name decimal fractions in expanded, unit, and word forms by applying place value reasoning.', 'url' => 'g.php?g-math-m1-b-1'],
                    ['id' => 'g-math-m1-b-2', 'code' => 'G.M1.B.2', 'name' => 'Compare decimal fractions to the thousandths using like units, and express comparisons with ...', 'url' => 'g.php?g-math-m1-b-2'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Place Value and Rounding Decimal Fractions',
                'skills' => [
                    ['id' => 'g-math-m1-c-1', 'code' => 'G.M1.C.1', 'name' => 'Round a given decimal to any place using place value understanding and the vertical number l...', 'url' => 'g.php?g-math-m1-c-1'],
                    ['id' => 'g-math-m1-c-2', 'code' => 'G.M1.C.2', 'name' => 'Round a given decimal to any place using place value understanding and the vertical number l...', 'url' => 'g.php?g-math-m1-c-2'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Adding and Subtracting Decimals',
                'skills' => [
                    ['id' => 'g-math-m1-d-1', 'code' => 'G.M1.D.1', 'name' => 'Add decimals using place value strategies, and relate those strategies to a written method.', 'url' => 'g.php?g-math-m1-d-1'],
                    ['id' => 'g-math-m1-d-2', 'code' => 'G.M1.D.2', 'name' => 'Subtract decimals using place value strategies, and relate those strategies to a written met...', 'url' => 'g.php?g-math-m1-d-2'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Multiplying Decimals',
                'skills' => [
                    ['id' => 'g-math-m1-e-1', 'code' => 'G.M1.E.1', 'name' => 'Multiply a decimal fraction by single-digit whole numbers, relate to a written method throug...', 'url' => 'g.php?g-math-m1-e-1'],
                    ['id' => 'g-math-m1-e-2', 'code' => 'G.M1.E.2', 'name' => 'Multiply a decimal fraction by single-digit whole numbers, including using estimation to con...', 'url' => 'g.php?g-math-m1-e-2'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Dividing Decimals',
                'skills' => [
                    ['id' => 'g-math-m1-f-1', 'code' => 'G.M1.F.1', 'name' => 'Divide decimals by single-digit whole numbers involving easily identifiable multiples using ...', 'url' => 'g.php?g-math-m1-f-1'],
                    ['id' => 'g-math-m1-f-2', 'code' => 'G.M1.F.2', 'name' => 'Divide decimals with a remainder using place value understanding and relate to a written met...', 'url' => 'g.php?g-math-m1-f-2'],
                    ['id' => 'g-math-m1-f-3', 'code' => 'G.M1.F.3', 'name' => 'Divide decimals using place value understanding, including remainders in the smallest unit.', 'url' => 'g.php?g-math-m1-f-3'],
                    ['id' => 'g-math-m1-f-4', 'code' => 'G.M1.F.4', 'name' => 'Solve word problems using decimal operations.', 'url' => 'g.php?g-math-m1-f-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Multi-Digit Whole Number and Decimal Fraction Operations',
        'description' => 'Mental strategies for multi-digit multiplication, standard algorithm, decimal multiplication, division strategies, partial quotients, and decimal division word problems.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Mental Strategies for Multi-Digit Whole Number Multiplication',
                'skills' => [
                    ['id' => 'g-math-m2-a-1', 'code' => 'G.M2.A.1', 'name' => 'Multiply multi-digit whole numbers and multiples of 10 using place value patterns and the di...', 'url' => 'g.php?g-math-m2-a-1'],
                    ['id' => 'g-math-m2-a-2', 'code' => 'G.M2.A.2', 'name' => 'Estimate multi-digit products by rounding factors to a basic fact and using place value patt...', 'url' => 'g.php?g-math-m2-a-2'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'The Standard Algorithm for Multi-Digit Whole Number Multiplication',
                'skills' => [
                    ['id' => 'g-math-m2-b-1', 'code' => 'G.M2.B.1', 'name' => 'Write and interpret numerical expressions, and compare expressions using a visual model.', 'url' => 'g.php?g-math-m2-b-1'],
                    ['id' => 'g-math-m2-b-2', 'code' => 'G.M2.B.2', 'name' => 'Convert numerical expressions into unit form as a mental strategy for multi-digit multiplica...', 'url' => 'g.php?g-math-m2-b-2'],
                    ['id' => 'g-math-m2-b-3', 'code' => 'G.M2.B.3', 'name' => 'Connect visual models and the distributive property to partial products of the standard algo...', 'url' => 'g.php?g-math-m2-b-3'],
                    ['id' => 'g-math-m2-b-4', 'code' => 'G.M2.B.4', 'name' => 'Connect area models and the distributive property to partial products of the standard algori...', 'url' => 'g.php?g-math-m2-b-4'],
                    ['id' => 'g-math-m2-b-5', 'code' => 'G.M2.B.5', 'name' => 'Connect area models and the distributive property to partial products of the standard algori...', 'url' => 'g.php?g-math-m2-b-5'],
                    ['id' => 'g-math-m2-b-6', 'code' => 'G.M2.B.6', 'name' => 'Fluently multiply multi-digit whole numbers using the standard algorithm and using estimatio...', 'url' => 'g.php?g-math-m2-b-6'],
                    ['id' => 'g-math-m2-b-7', 'code' => 'G.M2.B.7', 'name' => 'Fluently multiply multi-digit whole numbers using the standard algorithm to solve multi-step...', 'url' => 'g.php?g-math-m2-b-7'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Decimal Multi-Digit Multiplication',
                'skills' => [
                    ['id' => 'g-math-m2-c-1', 'code' => 'G.M2.C.1', 'name' => 'Multiply decimal fractions with tenths by multi-digit whole numbers using place value unders...', 'url' => 'g.php?g-math-m2-c-1'],
                    ['id' => 'g-math-m2-c-2', 'code' => 'G.M2.C.2', 'name' => 'Multiply decimal fractions by multi-digit whole numbers through conversion to a whole number...', 'url' => 'g.php?g-math-m2-c-2'],
                    ['id' => 'g-math-m2-c-3', 'code' => 'G.M2.C.3', 'name' => 'Reason about the product of a whole number and a decimal with hundredths using place value u...', 'url' => 'g.php?g-math-m2-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Measurement Word Problems with Whole Number and Decimal Multiplication',
                'skills' => [
                    ['id' => 'g-math-m2-d-1', 'code' => 'G.M2.D.1', 'name' => 'Use whole number multiplication to express equivalent measurements.', 'url' => 'g.php?g-math-m2-d-1'],
                    ['id' => 'g-math-m2-d-2', 'code' => 'G.M2.D.2', 'name' => 'Use fraction and decimal multiplication to express equivalent measurements.', 'url' => 'g.php?g-math-m2-d-2'],
                    ['id' => 'g-math-m2-d-3', 'code' => 'G.M2.D.3', 'name' => 'Solve two-step word problems involving measurement conversions.', 'url' => 'g.php?g-math-m2-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Mental Strategies for Multi-Digit Whole Number Division',
                'skills' => [
                    ['id' => 'g-math-m2-e-1', 'code' => 'G.M2.E.1', 'name' => 'Use divide by 10 patterns for multi-digit whole number division.', 'url' => 'g.php?g-math-m2-e-1'],
                    ['id' => 'g-math-m2-e-2', 'code' => 'G.M2.E.2', 'name' => 'Use basic facts to approximate quotients with two-digit divisors.', 'url' => 'g.php?g-math-m2-e-2'],
                    ['id' => 'g-math-m2-e-3', 'code' => 'G.M2.E.3', 'name' => 'Use basic facts to approximate quotients with two-digit divisors.', 'url' => 'g.php?g-math-m2-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Partial Quotients and Multi-Digit Whole Number Division',
                'skills' => [
                    ['id' => 'g-math-m2-f-1', 'code' => 'G.M2.F.1', 'name' => 'Divide two- and three-digit dividends by multiples of 10 with single-digit quotients, and ma...', 'url' => 'g.php?g-math-m2-f-1'],
                    ['id' => 'g-math-m2-f-2', 'code' => 'G.M2.F.2', 'name' => 'Divide two- and three-digit dividends by two-digit divisors with single-digit quotients, and...', 'url' => 'g.php?g-math-m2-f-2'],
                    ['id' => 'g-math-m2-f-3', 'code' => 'G.M2.F.3', 'name' => 'Divide two- and three-digit dividends by two-digit divisors with single-digit quotients, and...', 'url' => 'g.php?g-math-m2-f-3'],
                    ['id' => 'g-math-m2-f-4', 'code' => 'G.M2.F.4', 'name' => 'Divide three- and four-digit dividends by two-digit divisors resulting in two- and three-dig...', 'url' => 'g.php?g-math-m2-f-4'],
                    ['id' => 'g-math-m2-f-5', 'code' => 'G.M2.F.5', 'name' => 'Divide three- and four-digit dividends by two-digit divisors resulting in two- and three-dig...', 'url' => 'g.php?g-math-m2-f-5'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Partial Quotients and Multi-Digit Decimal Division',
                'skills' => [
                    ['id' => 'g-math-m2-g-1', 'code' => 'G.M2.G.1', 'name' => 'Divide decimal dividends by multiples of 10, reasoning about the placement of the decimal po...', 'url' => 'g.php?g-math-m2-g-1'],
                    ['id' => 'g-math-m2-g-2', 'code' => 'G.M2.G.2', 'name' => 'Use basic facts to approximate decimal quotients with two-digit divisors, reasoning about th...', 'url' => 'g.php?g-math-m2-g-2'],
                    ['id' => 'g-math-m2-g-3', 'code' => 'G.M2.G.3', 'name' => 'Divide decimal dividends by two-digit divisors, estimating quotients, reasoning about the pl...', 'url' => 'g.php?g-math-m2-g-3'],
                    ['id' => 'g-math-m2-g-4', 'code' => 'G.M2.G.4', 'name' => 'Divide decimal dividends by two-digit divisors, estimating quotients, reasoning about the pl...', 'url' => 'g.php?g-math-m2-g-4'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Measurement Word Problems with Multi-Digit Division',
                'skills' => [
                    ['id' => 'g-math-m2-h-1', 'code' => 'G.M2.H.1', 'name' => 'Solve division word problems involving multi-digit division with group size unknown and the ...', 'url' => 'g.php?g-math-m2-h-1'],
                    ['id' => 'g-math-m2-h-2', 'code' => 'G.M2.H.2', 'name' => 'Solve division word problems involving multi-digit division with group size unknown and the ...', 'url' => 'g.php?g-math-m2-h-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Addition and Subtraction of Fractions',
        'description' => 'Equivalent fractions, making like units pictorially with rectangular fraction models, making like units numerically, and word problem applications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Equivalent Fractions',
                'skills' => [
                    ['id' => 'g-math-m3-a-1', 'code' => 'G.M3.A.1', 'name' => 'Make equivalent fractions with the number line, the area model, and numbers.', 'url' => 'g.php?g-math-m3-a-1'],
                    ['id' => 'g-math-m3-a-2', 'code' => 'G.M3.A.2', 'name' => 'Make equivalent fractions with sums of fractions with like denominators.', 'url' => 'g.php?g-math-m3-a-2'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Making Like Units Pictorially',
                'skills' => [
                    ['id' => 'g-math-m3-b-1', 'code' => 'G.M3.B.1', 'name' => 'Add fractions with unlike units using the strategy of creating equivalent fractions.', 'url' => 'g.php?g-math-m3-b-1'],
                    ['id' => 'g-math-m3-b-2', 'code' => 'G.M3.B.2', 'name' => 'Add fractions with sums between 1 and 2.', 'url' => 'g.php?g-math-m3-b-2'],
                    ['id' => 'g-math-m3-b-3', 'code' => 'G.M3.B.3', 'name' => 'Subtract fractions with unlike units using the strategy of creating equivalent fractions.', 'url' => 'g.php?g-math-m3-b-3'],
                    ['id' => 'g-math-m3-b-4', 'code' => 'G.M3.B.4', 'name' => 'Subtract fractions from numbers between 1 and 2.', 'url' => 'g.php?g-math-m3-b-4'],
                    ['id' => 'g-math-m3-b-5', 'code' => 'G.M3.B.5', 'name' => 'Solve two-step word problems.', 'url' => 'g.php?g-math-m3-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Making Like Units Numerically',
                'skills' => [
                    ['id' => 'g-math-m3-c-1', 'code' => 'G.M3.C.1', 'name' => 'Add fractions to and subtract fractions from whole numbers using equivalence and the number ...', 'url' => 'g.php?g-math-m3-c-1'],
                    ['id' => 'g-math-m3-c-2', 'code' => 'G.M3.C.2', 'name' => 'Add fractions making like units numerically.', 'url' => 'g.php?g-math-m3-c-2'],
                    ['id' => 'g-math-m3-c-3', 'code' => 'G.M3.C.3', 'name' => 'Add fractions with sums greater than 2.', 'url' => 'g.php?g-math-m3-c-3'],
                    ['id' => 'g-math-m3-c-4', 'code' => 'G.M3.C.4', 'name' => 'Subtract fractions making like units numerically.', 'url' => 'g.php?g-math-m3-c-4'],
                    ['id' => 'g-math-m3-c-5', 'code' => 'G.M3.C.5', 'name' => 'Subtract fractions greater than or equal to 1.', 'url' => 'g.php?g-math-m3-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Further Applications',
                'skills' => [
                    ['id' => 'g-math-m3-d-1', 'code' => 'G.M3.D.1', 'name' => 'Use fraction benchmark numbers to assess reasonableness of addition and subtraction equations.', 'url' => 'g.php?g-math-m3-d-1'],
                    ['id' => 'g-math-m3-d-2', 'code' => 'G.M3.D.2', 'name' => 'Strategize to solve multi-term problems.', 'url' => 'g.php?g-math-m3-d-2'],
                    ['id' => 'g-math-m3-d-3', 'code' => 'G.M3.D.3', 'name' => 'Solve multi-step word problems; assess reasonableness of solutions using benchmark numbers.', 'url' => 'g.php?g-math-m3-d-3'],
                    ['id' => 'g-math-m3-d-4', 'code' => 'G.M3.D.4', 'name' => 'Explore part-to-whole relationships.', 'url' => 'g.php?g-math-m3-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Multiplication and Division of Fractions and Decimal Fractions',
        'description' => 'Line plots of fraction measurements, fractions as division, multiplication of whole numbers and fractions, scaling, fraction division, and interpreting expressions.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Line Plots of Fraction Measurements',
                'skills' => [
                    ['id' => 'g-math-m4-a-1', 'code' => 'G.M4.A.1', 'name' => 'Measure and compare pencil lengths to the nearest \frac{1}{2}, \frac{1}{4}, and \frac{1}{8} ...', 'url' => 'g.php?g-math-m4-a-1'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Fractions as Division',
                'skills' => [
                    ['id' => 'g-math-m4-b-1', 'code' => 'G.M4.B.1', 'name' => 'Interpret a fraction as division.', 'url' => 'g.php?g-math-m4-b-1'],
                    ['id' => 'g-math-m4-b-2', 'code' => 'G.M4.B.2', 'name' => 'Interpret a fraction as division.', 'url' => 'g.php?g-math-m4-b-2'],
                    ['id' => 'g-math-m4-b-3', 'code' => 'G.M4.B.3', 'name' => 'Use tape diagrams to model fractions as division.', 'url' => 'g.php?g-math-m4-b-3'],
                    ['id' => 'g-math-m4-b-4', 'code' => 'G.M4.B.4', 'name' => 'Solve word problems involving the division of whole numbers with answers in the form of frac...', 'url' => 'g.php?g-math-m4-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Multiplication of a Whole Number by a Fraction',
                'skills' => [
                    ['id' => 'g-math-m4-c-1', 'code' => 'G.M4.C.1', 'name' => 'Relate fractions as division to fraction of a set.', 'url' => 'g.php?g-math-m4-c-1'],
                    ['id' => 'g-math-m4-c-2', 'code' => 'G.M4.C.2', 'name' => 'Multiply any whole number by a fraction using tape diagrams.', 'url' => 'g.php?g-math-m4-c-2'],
                    ['id' => 'g-math-m4-c-3', 'code' => 'G.M4.C.3', 'name' => 'Relate a fraction of a set to the repeated addition interpretation of fraction multiplication.', 'url' => 'g.php?g-math-m4-c-3'],
                    ['id' => 'g-math-m4-c-4', 'code' => 'G.M4.C.4', 'name' => 'Find a fraction of a measurement, and solve word problems.', 'url' => 'g.php?g-math-m4-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Fraction Expressions and Word Problems',
                'skills' => [
                    ['id' => 'g-math-m4-d-1', 'code' => 'G.M4.D.1', 'name' => 'Compare and evaluate expressions with parentheses.', 'url' => 'g.php?g-math-m4-d-1'],
                    ['id' => 'g-math-m4-d-2', 'code' => 'G.M4.D.2', 'name' => 'Solve and create fraction word problems involving addition, subtraction, and multiplication.', 'url' => 'g.php?g-math-m4-d-2'],
                    ['id' => 'g-math-m4-d-3', 'code' => 'G.M4.D.3', 'name' => 'Solve and create fraction word problems involving addition, subtraction, and multiplication.', 'url' => 'g.php?g-math-m4-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Multiplication of a Fraction by a Fraction',
                'skills' => [
                    ['id' => 'g-math-m4-e-1', 'code' => 'G.M4.E.1', 'name' => 'Multiply unit fractions by unit fractions.', 'url' => 'g.php?g-math-m4-e-1'],
                    ['id' => 'g-math-m4-e-2', 'code' => 'G.M4.E.2', 'name' => 'Multiply unit fractions by non-unit fractions.', 'url' => 'g.php?g-math-m4-e-2'],
                    ['id' => 'g-math-m4-e-3', 'code' => 'G.M4.E.3', 'name' => 'Multiply non-unit fractions by non-unit fractions.', 'url' => 'g.php?g-math-m4-e-3'],
                    ['id' => 'g-math-m4-e-4', 'code' => 'G.M4.E.4', 'name' => 'Solve word problems using tape diagrams and fraction-by-fraction multiplication.', 'url' => 'g.php?g-math-m4-e-4'],
                    ['id' => 'g-math-m4-e-5', 'code' => 'G.M4.E.5', 'name' => 'Relate decimal and fraction multiplication.', 'url' => 'g.php?g-math-m4-e-5'],
                    ['id' => 'g-math-m4-e-6', 'code' => 'G.M4.E.6', 'name' => 'Relate decimal and fraction multiplication.', 'url' => 'g.php?g-math-m4-e-6'],
                    ['id' => 'g-math-m4-e-7', 'code' => 'G.M4.E.7', 'name' => 'Convert measures involving whole numbers, and solve multi-step word problems.', 'url' => 'g.php?g-math-m4-e-7'],
                    ['id' => 'g-math-m4-e-8', 'code' => 'G.M4.E.8', 'name' => 'Convert mixed unit measurements, and solve multi-step word problems.', 'url' => 'g.php?g-math-m4-e-8'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Multiplication with Fractions and Decimals as Scaling and Word Problems',
                'skills' => [
                    ['id' => 'g-math-m4-f-1', 'code' => 'G.M4.F.1', 'name' => 'Explain the size of the product, and relate fraction and decimal equivalence to multiplying ...', 'url' => 'g.php?g-math-m4-f-1'],
                    ['id' => 'g-math-m4-f-2', 'code' => 'G.M4.F.2', 'name' => 'Compare the size of the product to the size of the factors.', 'url' => 'g.php?g-math-m4-f-2'],
                    ['id' => 'g-math-m4-f-3', 'code' => 'G.M4.F.3', 'name' => 'Compare the size of the product to the size of the factors.', 'url' => 'g.php?g-math-m4-f-3'],
                    ['id' => 'g-math-m4-f-4', 'code' => 'G.M4.F.4', 'name' => 'Solve word problems using fraction and decimal multiplication.', 'url' => 'g.php?g-math-m4-f-4'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Division of Fractions and Decimal Fractions',
                'skills' => [
                    ['id' => 'g-math-m4-g-1', 'code' => 'G.M4.G.1', 'name' => 'Divide a whole number by a unit fraction.', 'url' => 'g.php?g-math-m4-g-1'],
                    ['id' => 'g-math-m4-g-2', 'code' => 'G.M4.G.2', 'name' => 'Divide a unit fraction by a whole number.', 'url' => 'g.php?g-math-m4-g-2'],
                    ['id' => 'g-math-m4-g-3', 'code' => 'G.M4.G.3', 'name' => 'Solve problems involving fraction division.', 'url' => 'g.php?g-math-m4-g-3'],
                    ['id' => 'g-math-m4-g-4', 'code' => 'G.M4.G.4', 'name' => 'Write equations and word problems corresponding to tape and number line diagrams.', 'url' => 'g.php?g-math-m4-g-4'],
                    ['id' => 'g-math-m4-g-5', 'code' => 'G.M4.G.5', 'name' => 'Connect division by a unit fraction to division by 1 tenth and 1 hundredth.', 'url' => 'g.php?g-math-m4-g-5'],
                    ['id' => 'g-math-m4-g-6', 'code' => 'G.M4.G.6', 'name' => 'Divide decimal dividends by non‐unit decimal divisors.', 'url' => 'g.php?g-math-m4-g-6'],
                    ['id' => 'g-math-m4-g-7', 'code' => 'G.M4.G.7', 'name' => 'Divide decimal dividends by non‐unit decimal divisors.', 'url' => 'g.php?g-math-m4-g-7'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Interpretation of Numerical Expressions',
                'skills' => [
                    ['id' => 'g-math-m4-h-1', 'code' => 'G.M4.H.1', 'name' => 'Interpret and evaluate numerical expressions including the language of scaling and fraction ...', 'url' => 'g.php?g-math-m4-h-1'],
                    ['id' => 'g-math-m4-h-2', 'code' => 'G.M4.H.2', 'name' => 'Create story contexts for numerical expressions and tape diagrams, and solve word problems.', 'url' => 'g.php?g-math-m4-h-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Addition and Multiplication with Volume and Area',
        'description' => 'Concepts of volume, unit cubes, volume formulas (V = l x w x h), area of rectangular figures with fractional side lengths, and 2D shape classifications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Concepts of Volume',
                'skills' => [
                    ['id' => 'g-math-m5-a-1', 'code' => 'G.M5.A.1', 'name' => 'Explore volume by building with and counting unit cubes.', 'url' => 'g.php?g-math-m5-a-1'],
                    ['id' => 'g-math-m5-a-2', 'code' => 'G.M5.A.2', 'name' => 'Find the volume of a right rectangular prism by packing with cubic units and counting.', 'url' => 'g.php?g-math-m5-a-2'],
                    ['id' => 'g-math-m5-a-3', 'code' => 'G.M5.A.3', 'name' => 'Compose and decompose right rectangular prisms using layers.', 'url' => 'g.php?g-math-m5-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Volume and the Operations of Multiplication and Addition',
                'skills' => [
                    ['id' => 'g-math-m5-b-1', 'code' => 'G.M5.B.1', 'name' => 'Use multiplication to calculate volume.', 'url' => 'g.php?g-math-m5-b-1'],
                    ['id' => 'g-math-m5-b-2', 'code' => 'G.M5.B.2', 'name' => 'Use multiplication to connect volume as packing with volume as filling.', 'url' => 'g.php?g-math-m5-b-2'],
                    ['id' => 'g-math-m5-b-3', 'code' => 'G.M5.B.3', 'name' => 'Find the total volume of solid figures composed of two non-overlapping rectangular prisms.', 'url' => 'g.php?g-math-m5-b-3'],
                    ['id' => 'g-math-m5-b-4', 'code' => 'G.M5.B.4', 'name' => 'Solve word problems involving the volume of rectangular prisms with whole number edge lengths.', 'url' => 'g.php?g-math-m5-b-4'],
                    ['id' => 'g-math-m5-b-5', 'code' => 'G.M5.B.5', 'name' => 'Apply concepts and formulas of volume to design a sculpture using rectangular prisms within ...', 'url' => 'g.php?g-math-m5-b-5'],
                    ['id' => 'g-math-m5-b-6', 'code' => 'G.M5.B.6', 'name' => 'Apply concepts and formulas of volume to design a sculpture using rectangular prisms within ...', 'url' => 'g.php?g-math-m5-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Area of Rectangular Figures with Fractional Side Lengths',
                'skills' => [
                    ['id' => 'g-math-m5-c-1', 'code' => 'G.M5.C.1', 'name' => 'Find the area of rectangles with whole-by-mixed and whole-by-fractional number side lengths ...', 'url' => 'g.php?g-math-m5-c-1'],
                    ['id' => 'g-math-m5-c-2', 'code' => 'G.M5.C.2', 'name' => 'Find the area of rectangles with mixed-by-mixed and fraction-by-fraction side lengths by til...', 'url' => 'g.php?g-math-m5-c-2'],
                    ['id' => 'g-math-m5-c-3', 'code' => 'G.M5.C.3', 'name' => 'Measure to find the area of rectangles with fractional side lengths.', 'url' => 'g.php?g-math-m5-c-3'],
                    ['id' => 'g-math-m5-c-4', 'code' => 'G.M5.C.4', 'name' => 'Multiply mixed number factors, and relate to the distributive property and the area model.', 'url' => 'g.php?g-math-m5-c-4'],
                    ['id' => 'g-math-m5-c-5', 'code' => 'G.M5.C.5', 'name' => 'Solve real-world problems involving area of figures with fractional side lengths using visua...', 'url' => 'g.php?g-math-m5-c-5'],
                    ['id' => 'g-math-m5-c-6', 'code' => 'G.M5.C.6', 'name' => 'Solve real-world problems involving area of figures with fractional side lengths using visua...', 'url' => 'g.php?g-math-m5-c-6'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Drawing, Analysis, and Classification of Two-Dimensional Shapes',
                'skills' => [
                    ['id' => 'g-math-m5-d-1', 'code' => 'G.M5.D.1', 'name' => 'Draw trapezoids to clarify their attributes, and define trapezoids based on those attributes.', 'url' => 'g.php?g-math-m5-d-1'],
                    ['id' => 'g-math-m5-d-2', 'code' => 'G.M5.D.2', 'name' => 'Draw parallelograms to clarify their attributes, and define parallelograms based on those at...', 'url' => 'g.php?g-math-m5-d-2'],
                    ['id' => 'g-math-m5-d-3', 'code' => 'G.M5.D.3', 'name' => 'Draw rectangles and rhombuses to clarify their attributes, and define rectangles and rhombus...', 'url' => 'g.php?g-math-m5-d-3'],
                    ['id' => 'g-math-m5-d-4', 'code' => 'G.M5.D.4', 'name' => 'Draw kites and squares to clarify their attributes, and define kites and squares based on th...', 'url' => 'g.php?g-math-m5-d-4'],
                    ['id' => 'g-math-m5-d-5', 'code' => 'G.M5.D.5', 'name' => 'Classify two-dimensional figures in a hierarchy based on properties.', 'url' => 'g.php?g-math-m5-d-5'],
                    ['id' => 'g-math-m5-d-6', 'code' => 'G.M5.D.6', 'name' => 'Draw and identify varied two-dimensional figures from given attributes.', 'url' => 'g.php?g-math-m5-d-6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Problem Solving with the Coordinate Plane',
        'description' => 'Coordinate systems, patterns in the coordinate plane, graphing rules, drawing geometric figures, multi-step word problems, and reflection on elementary mathematics.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Coordinate Systems',
                'skills' => [
                    ['id' => 'g-math-m6-a-1', 'code' => 'G.M6.A.1', 'name' => 'Construct a coordinate system on a line.', 'url' => 'g.php?g-math-m6-a-1'],
                    ['id' => 'g-math-m6-a-2', 'code' => 'G.M6.A.2', 'name' => 'Construct a coordinate system on a plane.', 'url' => 'g.php?g-math-m6-a-2'],
                    ['id' => 'g-math-m6-a-3', 'code' => 'G.M6.A.3', 'name' => 'Name points using coordinate pairs, and use the coordinate pairs to plot points.', 'url' => 'g.php?g-math-m6-a-3'],
                    ['id' => 'g-math-m6-a-4', 'code' => 'G.M6.A.4', 'name' => 'Name points using coordinate pairs, and use the coordinate pairs to plot points.', 'url' => 'g.php?g-math-m6-a-4'],
                    ['id' => 'g-math-m6-a-5', 'code' => 'G.M6.A.5', 'name' => 'Investigate patterns in vertical and horizontal lines, and interpret points on the plane as ...', 'url' => 'g.php?g-math-m6-a-5'],
                    ['id' => 'g-math-m6-a-6', 'code' => 'G.M6.A.6', 'name' => 'Investigate patterns in vertical and horizontal lines, and interpret points on the plane as ...', 'url' => 'g.php?g-math-m6-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Patterns in the Coordinate Plane and Graphing Number Patterns from Rules',
                'skills' => [
                    ['id' => 'g-math-m6-b-1', 'code' => 'G.M6.B.1', 'name' => 'Plot points, use them to draw lines in the plane, and describe patterns within the coordinat...', 'url' => 'g.php?g-math-m6-b-1'],
                    ['id' => 'g-math-m6-b-2', 'code' => 'G.M6.B.2', 'name' => 'Generate a number pattern from a given rule, and plot the points.', 'url' => 'g.php?g-math-m6-b-2'],
                    ['id' => 'g-math-m6-b-3', 'code' => 'G.M6.B.3', 'name' => 'Generate two number patterns from given rules, plot the points, and analyze the patterns.', 'url' => 'g.php?g-math-m6-b-3'],
                    ['id' => 'g-math-m6-b-4', 'code' => 'G.M6.B.4', 'name' => 'Compare the lines and patterns generated by addition rules and multiplication rules.', 'url' => 'g.php?g-math-m6-b-4'],
                    ['id' => 'g-math-m6-b-5', 'code' => 'G.M6.B.5', 'name' => 'Analyze number patterns created from mixed operations.', 'url' => 'g.php?g-math-m6-b-5'],
                    ['id' => 'g-math-m6-b-6', 'code' => 'G.M6.B.6', 'name' => 'Create a rule to generate a number pattern, and plot the points.', 'url' => 'g.php?g-math-m6-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Drawing Figures in the Coordinate Plane',
                'skills' => [
                    ['id' => 'g-math-m6-c-1', 'code' => 'G.M6.C.1', 'name' => 'Construct parallel line segments on a rectangular grid.', 'url' => 'g.php?g-math-m6-c-1'],
                    ['id' => 'g-math-m6-c-2', 'code' => 'G.M6.C.2', 'name' => 'Construct parallel line segments, and analyze relationships of the coordinate pairs.', 'url' => 'g.php?g-math-m6-c-2'],
                    ['id' => 'g-math-m6-c-3', 'code' => 'G.M6.C.3', 'name' => 'Construct perpendicular line segments on a rectangular grid.', 'url' => 'g.php?g-math-m6-c-3'],
                    ['id' => 'g-math-m6-c-4', 'code' => 'G.M6.C.4', 'name' => 'Construct perpendicular line segments, and analyze relationships of the coordinate pairs.', 'url' => 'g.php?g-math-m6-c-4'],
                    ['id' => 'g-math-m6-c-5', 'code' => 'G.M6.C.5', 'name' => 'Draw symmetric figures using distance and angle measure from the line of symmetry.', 'url' => 'g.php?g-math-m6-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Problem Solving in the Coordinate Plane',
                'skills' => [
                    ['id' => 'g-math-m6-d-1', 'code' => 'G.M6.D.1', 'name' => 'Draw symmetric figures on the coordinate plane.', 'url' => 'g.php?g-math-m6-d-1'],
                    ['id' => 'g-math-m6-d-2', 'code' => 'G.M6.D.2', 'name' => 'Plot data on line graphs and analyze trends.', 'url' => 'g.php?g-math-m6-d-2'],
                    ['id' => 'g-math-m6-d-3', 'code' => 'G.M6.D.3', 'name' => 'Use coordinate systems to solve real-world problems.', 'url' => 'g.php?g-math-m6-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Multi-Step Word Problems',
                'skills' => [
                    ['id' => 'g-math-m6-e-1', 'code' => 'G.M6.E.1', 'name' => 'Make sense of complex, multi-step problems, and persevere in solving them. Share and critiqu...', 'url' => 'g.php?g-math-m6-e-1'],
                    ['id' => 'g-math-m6-e-2', 'code' => 'G.M6.E.2', 'name' => 'Make sense of complex, multi-step problems, and persevere in solving them. Share and critiqu...', 'url' => 'g.php?g-math-m6-e-2'],
                    ['id' => 'g-math-m6-e-3', 'code' => 'G.M6.E.3', 'name' => 'Make sense of complex, multi-step problems, and persevere in solving them. Share and critiqu...', 'url' => 'g.php?g-math-m6-e-3'],
                    ['id' => 'g-math-m6-e-4', 'code' => 'G.M6.E.4', 'name' => 'Make sense of complex, multi-step problems, and persevere in solving them. Share and critiqu...', 'url' => 'g.php?g-math-m6-e-4'],
                    ['id' => 'g-math-m6-e-5', 'code' => 'G.M6.E.5', 'name' => 'Make sense of complex, multi-step problems, and persevere in solving them. Share and critiqu...', 'url' => 'g.php?g-math-m6-e-5'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'The Year in Review: A Reflection on A Story of Units',
                'skills' => [
                    ['id' => 'g-math-m6-f-1', 'code' => 'G.M6.F.1', 'name' => 'Solidify writing and interpreting numerical expressions.', 'url' => 'g.php?g-math-m6-f-1'],
                    ['id' => 'g-math-m6-f-2', 'code' => 'G.M6.F.2', 'name' => 'Solidify writing and interpreting numerical expressions.', 'url' => 'g.php?g-math-m6-f-2'],
                    ['id' => 'g-math-m6-f-3', 'code' => 'G.M6.F.3', 'name' => 'Solidify fluency with Grade 5 skills.', 'url' => 'g.php?g-math-m6-f-3'],
                    ['id' => 'g-math-m6-f-4', 'code' => 'G.M6.F.4', 'name' => 'Solidify the vocabulary of geometry.', 'url' => 'g.php?g-math-m6-f-4'],
                    ['id' => 'g-math-m6-f-5', 'code' => 'G.M6.F.5', 'name' => 'Solidify the vocabulary of geometry.', 'url' => 'g.php?g-math-m6-f-5'],
                    ['id' => 'g-math-m6-f-6', 'code' => 'G.M6.F.6', 'name' => 'Explore the Fibonacci sequence.', 'url' => 'g.php?g-math-m6-f-6'],
                    ['id' => 'g-math-m6-f-7', 'code' => 'G.M6.F.7', 'name' => 'Explore patterns in saving money.', 'url' => 'g.php?g-math-m6-f-7'],
                    ['id' => 'g-math-m6-f-8', 'code' => 'G.M6.F.8', 'name' => 'Design and construct boxes to house materials for summer use.', 'url' => 'g.php?g-math-m6-f-8'],
                    ['id' => 'g-math-m6-f-9', 'code' => 'G.M6.F.9', 'name' => 'Design and construct boxes to house materials for summer use.', 'url' => 'g.php?g-math-m6-f-9'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
