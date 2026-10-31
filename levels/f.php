<?php
/**
 * Hesten's Learning - Level F (Grade 4)
 * Complete 153-lesson EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?f-math-m1-a-1 or ?lesson=f-math-m1-a-1)
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
    $levelUrl = 'f.php';
    $levelTitle = 'Level F';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "4th Grade Level F | Hesten's Learning";
$pageDescription = "Multi-digit multiplication, long division, fraction operations, angles, and measurement problem solving for 4th-grade students.";
$pageKeywords    = "Grade 4, 4th Grade, multi-digit multiplication, long division, comparing fractions, angles, measurement, decimal fractions";

// Template Variables
$themeColor = 'green';
$levelId = 'f';
$levelTitle = 'Level F';
$gradeText = '4th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Multi-digit multiplication, long division, fraction operations, and angle measurement.';

$modules = [
    [
        'title' => 'Module 1: Place Value, Rounding, and Algorithms for Addition and Subtraction',
        'description' => 'Place value of multi-digit whole numbers, comparing and rounding whole numbers, standard addition and subtraction algorithms, and multi-step word problems.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Place Value of Multi-Digit Whole Numbers',
                'skills' => [
                    ['id' => 'f-math-m1-a-1', 'code' => 'F.M1.A.1', 'name' => 'Interpret a multiplication equation as a comparison.', 'url' => 'f.php?f-math-m1-a-1'],
                    ['id' => 'f-math-m1-a-2', 'code' => 'F.M1.A.2', 'name' => 'Fluency Practice(12 minutes)', 'url' => 'f.php?f-math-m1-a-2'],
                    ['id' => 'f-math-m1-a-3', 'code' => 'F.M1.A.3', 'name' => 'Name numbers within 1 million by building understanding of the place value chart and placeme...', 'url' => 'f.php?f-math-m1-a-3'],
                    ['id' => 'f-math-m1-a-4', 'code' => 'F.M1.A.4', 'name' => 'Read and write multi-digit numbers using base ten numerals, number names, and expanded form.', 'url' => 'f.php?f-math-m1-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Comparing Multi-Digit Whole Numbers',
                'skills' => [
                    ['id' => 'f-math-m1-b-1', 'code' => 'F.M1.B.1', 'name' => 'Compare numbers based on meanings of the digits using >, <, or = to record the comparison.', 'url' => 'f.php?f-math-m1-b-1'],
                    ['id' => 'f-math-m1-b-2', 'code' => 'F.M1.B.2', 'name' => 'Find 1, 10, and 100 thousand more and less than a given number.', 'url' => 'f.php?f-math-m1-b-2'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Rounding Multi-Digit Whole Numbers',
                'skills' => [
                    ['id' => 'f-math-m1-c-1', 'code' => 'F.M1.C.1', 'name' => 'Round multi-digit numbers to the thousands place using the vertical number line.', 'url' => 'f.php?f-math-m1-c-1'],
                    ['id' => 'f-math-m1-c-2', 'code' => 'F.M1.C.2', 'name' => 'Objectives: Round multi-digit numbers to any place using the vertical number line.', 'url' => 'f.php?f-math-m1-c-2'],
                    ['id' => 'f-math-m1-c-3', 'code' => 'F.M1.C.3', 'name' => 'Use place value understanding to round multi-digit numbers to any place value.', 'url' => 'f.php?f-math-m1-c-3'],
                    ['id' => 'f-math-m1-c-4', 'code' => 'F.M1.C.4', 'name' => 'Use place value understanding to round multi-digit numbers to any place value using real wor...', 'url' => 'f.php?f-math-m1-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Multi-Digit Whole Number Addition',
                'skills' => [
                    ['id' => 'f-math-m1-d-1', 'code' => 'F.M1.D.1', 'name' => 'Use place value understanding to fluently add multi-digit whole numbers using the standard a...', 'url' => 'f.php?f-math-m1-d-1'],
                    ['id' => 'f-math-m1-d-2', 'code' => 'F.M1.D.2', 'name' => 'Solve multi-step word problems using the standard addition algorithm modeled with tape diagr...', 'url' => 'f.php?f-math-m1-d-2'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Multi-Digit Whole Number Subtraction',
                'skills' => [
                    ['id' => 'f-math-m1-e-1', 'code' => 'F.M1.E.1', 'name' => 'Use place value understanding to decompose to smaller units once using the standard subtract...', 'url' => 'f.php?f-math-m1-e-1'],
                    ['id' => 'f-math-m1-e-2', 'code' => 'F.M1.E.2', 'name' => 'Use place value understanding to decompose to smaller units up to three times using the stan...', 'url' => 'f.php?f-math-m1-e-2'],
                    ['id' => 'f-math-m1-e-3', 'code' => 'F.M1.E.3', 'name' => 'Use place value understanding to fluently decompose to smaller units multiple times in any p...', 'url' => 'f.php?f-math-m1-e-3'],
                    ['id' => 'f-math-m1-e-4', 'code' => 'F.M1.E.4', 'name' => 'Solve two-step word problems using the standard subtraction algorithm fluently modeled with ...', 'url' => 'f.php?f-math-m1-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Addition and Subtraction Word Problems',
                'skills' => [
                    ['id' => 'f-math-m1-f-1', 'code' => 'F.M1.F.1', 'name' => 'Solve additive compare word problems modeled with tape diagrams.', 'url' => 'f.php?f-math-m1-f-1'],
                    ['id' => 'f-math-m1-f-2', 'code' => 'F.M1.F.2', 'name' => 'Solve multi-step word problems modeled with tape diagrams, and assess the reasonableness of ...', 'url' => 'f.php?f-math-m1-f-2'],
                    ['id' => 'f-math-m1-f-3', 'code' => 'F.M1.F.3', 'name' => 'Create and solve multi-step word problems from given tape diagrams and equations.', 'url' => 'f.php?f-math-m1-f-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Unit Conversions and Problem Solving with Metric Measurement',
        'description' => 'Metric unit conversions (km, m, cm, kg, g, L, mL) and multi-step measurement problem solving.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Metric Unit Conversions',
                'skills' => [
                    ['id' => 'f-math-m2-a-1', 'code' => 'F.M2.A.1', 'name' => 'Express metric length measurements in terms of a smaller unit; model and solve addition and ...', 'url' => 'f.php?f-math-m2-a-1'],
                    ['id' => 'f-math-m2-a-2', 'code' => 'F.M2.A.2', 'name' => 'Express metric mass measurements in terms of a smaller unit; model and solve addition and su...', 'url' => 'f.php?f-math-m2-a-2'],
                    ['id' => 'f-math-m2-a-3', 'code' => 'F.M2.A.3', 'name' => 'Express metric capacity measurements in terms of a smaller unit; model and solve addition an...', 'url' => 'f.php?f-math-m2-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Application of Metric Unit Conversions',
                'skills' => [
                    ['id' => 'f-math-m2-b-1', 'code' => 'F.M2.B.1', 'name' => 'Know and relate metric units to place value units in order to express measurements in differ...', 'url' => 'f.php?f-math-m2-b-1'],
                    ['id' => 'f-math-m2-b-2', 'code' => 'F.M2.B.2', 'name' => 'Use addition and subtraction to solve multi-step word problems involving length, mass, and c...', 'url' => 'f.php?f-math-m2-b-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Multi-Digit Multiplication and Division',
        'description' => 'Multiplicative comparison, multiplication by multiples of 10, multi-digit by single-digit multiplication, division with remainders, reasoning with divisibility, and two-digit multiplication.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Multiplicative Comparison Word Problems',
                'skills' => [
                    ['id' => 'f-math-m3-a-1', 'code' => 'F.M3.A.1', 'name' => 'Investigate and use the formulas for area and perimeter of rectangles.', 'url' => 'f.php?f-math-m3-a-1'],
                    ['id' => 'f-math-m3-a-2', 'code' => 'F.M3.A.2', 'name' => 'Solve multiplicative comparison word problems by applying the area and perimeter formulas.', 'url' => 'f.php?f-math-m3-a-2'],
                    ['id' => 'f-math-m3-a-3', 'code' => 'F.M3.A.3', 'name' => 'Demonstrate understanding of area and perimeter formulas by solving multi-step real-world pr...', 'url' => 'f.php?f-math-m3-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Multiplication by 10, 100, and 1,000',
                'skills' => [
                    ['id' => 'f-math-m3-b-1', 'code' => 'F.M3.B.1', 'name' => 'Interpret and represent patterns when multiplying by 10, 100, and 1,000 in arrays and numeri...', 'url' => 'f.php?f-math-m3-b-1'],
                    ['id' => 'f-math-m3-b-2', 'code' => 'F.M3.B.2', 'name' => 'Multiply multiples of 10, 100, and 1,000 by single digits, recognizing patterns.', 'url' => 'f.php?f-math-m3-b-2'],
                    ['id' => 'f-math-m3-b-3', 'code' => 'F.M3.B.3', 'name' => 'Multiply two-digit multiples of 10 by two-digit multiples of 10 with the area model.', 'url' => 'f.php?f-math-m3-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Multiplication of up to Four Digits by Single-Digit Numbers',
                'skills' => [
                    ['id' => 'f-math-m3-c-1', 'code' => 'F.M3.C.1', 'name' => 'Use place value disks to represent two-digit by one-digit multiplication.', 'url' => 'f.php?f-math-m3-c-1'],
                    ['id' => 'f-math-m3-c-2', 'code' => 'F.M3.C.2', 'name' => 'Extend the use of place value disks to represent three- and four-digit by one-digit multipli...', 'url' => 'f.php?f-math-m3-c-2'],
                    ['id' => 'f-math-m3-c-3', 'code' => 'F.M3.C.3', 'name' => 'Multiply three- and four-digit numbers by one-digit numbersapplying the standard algorithm.', 'url' => 'f.php?f-math-m3-c-3'],
                    ['id' => 'f-math-m3-c-4', 'code' => 'F.M3.C.4', 'name' => 'Multiply three- and four-digit numbers by one-digit numbers applying the standard algorithm.', 'url' => 'f.php?f-math-m3-c-4'],
                    ['id' => 'f-math-m3-c-5', 'code' => 'F.M3.C.5', 'name' => 'Connect the area model and the partial products method to the standard algorithm.', 'url' => 'f.php?f-math-m3-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Multiplication Word Problems',
                'skills' => [
                    ['id' => 'f-math-m3-d-1', 'code' => 'F.M3.D.1', 'name' => 'Solve two-step word problems, including multiplicative comparison.', 'url' => 'f.php?f-math-m3-d-1'],
                    ['id' => 'f-math-m3-d-2', 'code' => 'F.M3.D.2', 'name' => 'Use multiplication, addition, or subtraction to solve multi-step word problems.', 'url' => 'f.php?f-math-m3-d-2'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Division of Tens and Ones with Successive Remainders',
                'skills' => [
                    ['id' => 'f-math-m3-e-1', 'code' => 'F.M3.E.1', 'name' => 'Solve division word problems with remainders.', 'url' => 'f.php?f-math-m3-e-1'],
                    ['id' => 'f-math-m3-e-2', 'code' => 'F.M3.E.2', 'name' => 'Understand and solve division problems with a remainder using the array and area models.', 'url' => 'f.php?f-math-m3-e-2'],
                    ['id' => 'f-math-m3-e-3', 'code' => 'F.M3.E.3', 'name' => 'Understand and solve two-digit dividend division problems with a remainder in the ones place...', 'url' => 'f.php?f-math-m3-e-3'],
                    ['id' => 'f-math-m3-e-4', 'code' => 'F.M3.E.4', 'name' => 'Represent and solve division problems requiring decomposing a remainder in the tens.', 'url' => 'f.php?f-math-m3-e-4'],
                    ['id' => 'f-math-m3-e-5', 'code' => 'F.M3.E.5', 'name' => 'Find whole number quotients and remainders.', 'url' => 'f.php?f-math-m3-e-5'],
                    ['id' => 'f-math-m3-e-6', 'code' => 'F.M3.E.6', 'name' => 'Explain remainders by using place value understanding and models.', 'url' => 'f.php?f-math-m3-e-6'],
                    ['id' => 'f-math-m3-e-7', 'code' => 'F.M3.E.7', 'name' => 'Solve division problems without remainders using the area model.', 'url' => 'f.php?f-math-m3-e-7'],
                    ['id' => 'f-math-m3-e-8', 'code' => 'F.M3.E.8', 'name' => 'Solve division problems with remainders using the area model.', 'url' => 'f.php?f-math-m3-e-8'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Reasoning with Divisibility',
                'skills' => [
                    ['id' => 'f-math-m3-f-1', 'code' => 'F.M3.F.1', 'name' => 'Find factor pairs for numbers to 100, and use understanding of factors to define prime and c...', 'url' => 'f.php?f-math-m3-f-1'],
                    ['id' => 'f-math-m3-f-2', 'code' => 'F.M3.F.2', 'name' => 'Use division and the associative property to test for factors and observe patterns.', 'url' => 'f.php?f-math-m3-f-2'],
                    ['id' => 'f-math-m3-f-3', 'code' => 'F.M3.F.3', 'name' => 'Determine if a whole number is a multiple of another number.', 'url' => 'f.php?f-math-m3-f-3'],
                    ['id' => 'f-math-m3-f-4', 'code' => 'F.M3.F.4', 'name' => 'Explore properties of prime and composite numbers to 100 by using multiples.', 'url' => 'f.php?f-math-m3-f-4'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Division of Thousands, Hundreds, Tens, and Ones',
                'skills' => [
                    ['id' => 'f-math-m3-g-1', 'code' => 'F.M3.G.1', 'name' => 'Divide multiples of 10, 100, and 1,000 by single-digit numbers.', 'url' => 'f.php?f-math-m3-g-1'],
                    ['id' => 'f-math-m3-g-2', 'code' => 'F.M3.G.2', 'name' => 'Represent and solve division problems with up to a three-digit dividend numerically and with...', 'url' => 'f.php?f-math-m3-g-2'],
                    ['id' => 'f-math-m3-g-3', 'code' => 'F.M3.G.3', 'name' => 'Represent and solve three-digit dividend division with divisors of 2, 3, 4, and 5 numerically.', 'url' => 'f.php?f-math-m3-g-3'],
                    ['id' => 'f-math-m3-g-4', 'code' => 'F.M3.G.4', 'name' => 'Represent numerically four-digit dividend division with divisors of 2, 3, 4, and 5, decompos...', 'url' => 'f.php?f-math-m3-g-4'],
                    ['id' => 'f-math-m3-g-5', 'code' => 'F.M3.G.5', 'name' => 'Solve division problems with a zero in the dividend or with a zero in the quotient.', 'url' => 'f.php?f-math-m3-g-5'],
                    ['id' => 'f-math-m3-g-6', 'code' => 'F.M3.G.6', 'name' => 'Interpret division word problems as either number of groups unknown or group size unknown.', 'url' => 'f.php?f-math-m3-g-6'],
                    ['id' => 'f-math-m3-g-7', 'code' => 'F.M3.G.7', 'name' => 'Interpret and find whole number quotients and remainders to solve one-step division word pro...', 'url' => 'f.php?f-math-m3-g-7'],
                    ['id' => 'f-math-m3-g-8', 'code' => 'F.M3.G.8', 'name' => 'Explain the connection of the area model of division to the long division algorithm for thre...', 'url' => 'f.php?f-math-m3-g-8'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Multiplication of Two-Digit by Two-Digit Numbers',
                'skills' => [
                    ['id' => 'f-math-m3-h-1', 'code' => 'F.M3.H.1', 'name' => 'Multiply two-digit multiples of 10 by two-digit numbers using a place value chart.', 'url' => 'f.php?f-math-m3-h-1'],
                    ['id' => 'f-math-m3-h-2', 'code' => 'F.M3.H.2', 'name' => 'Multiply two-digit multiples of 10 by two-digit numbers using the area model.', 'url' => 'f.php?f-math-m3-h-2'],
                    ['id' => 'f-math-m3-h-3', 'code' => 'F.M3.H.3', 'name' => 'Multiply two-digit by two-digit numbers using four partial products.', 'url' => 'f.php?f-math-m3-h-3'],
                    ['id' => 'f-math-m3-h-4', 'code' => 'F.M3.H.4', 'name' => 'Transition from four partial products to the standard algorithm for two-digit by two-digit m...', 'url' => 'f.php?f-math-m3-h-4'],
                    ['id' => 'f-math-m3-h-5', 'code' => 'F.M3.H.5', 'name' => 'Transition from four partial products to the standard algorithm for two-digit by two-digit m...', 'url' => 'f.php?f-math-m3-h-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Angle Measure and Plane Figures',
        'description' => 'Lines, rays, angles, angle measurement with protractors, right/acute/obtuse angles, angle addition problem solving, two-dimensional figures, and line symmetry.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Lines and Angles',
                'skills' => [
                    ['id' => 'f-math-m4-a-1', 'code' => 'F.M4.A.1', 'name' => 'Identify and draw points, lines, line segments, rays, and angles. Recognize them in various ...', 'url' => 'f.php?f-math-m4-a-1'],
                    ['id' => 'f-math-m4-a-2', 'code' => 'F.M4.A.2', 'name' => 'Use right angles to determine whether angles are equal to, greater than, or less than right ...', 'url' => 'f.php?f-math-m4-a-2'],
                    ['id' => 'f-math-m4-a-3', 'code' => 'F.M4.A.3', 'name' => 'Identify, define, and draw perpendicular lines.', 'url' => 'f.php?f-math-m4-a-3'],
                    ['id' => 'f-math-m4-a-4', 'code' => 'F.M4.A.4', 'name' => 'Identify, define, and draw parallel lines.', 'url' => 'f.php?f-math-m4-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Angle Measurement',
                'skills' => [
                    ['id' => 'f-math-m4-b-1', 'code' => 'F.M4.B.1', 'name' => 'Use a circular protractor to understand a 1-degree angle as \frac{1}{360} of a turn. Explore...', 'url' => 'f.php?f-math-m4-b-1'],
                    ['id' => 'f-math-m4-b-2', 'code' => 'F.M4.B.2', 'name' => 'Use varied protractors to distinguish angle measure from length measurement.', 'url' => 'f.php?f-math-m4-b-2'],
                    ['id' => 'f-math-m4-b-3', 'code' => 'F.M4.B.3', 'name' => 'Measure and draw angles. Sketch given angle measures, and verify with a protractor.', 'url' => 'f.php?f-math-m4-b-3'],
                    ['id' => 'f-math-m4-b-4', 'code' => 'F.M4.B.4', 'name' => 'Identify and measure angles as turns and recognize them in various contexts.', 'url' => 'f.php?f-math-m4-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Problem Solving with the Addition of Angle Measures',
                'skills' => [
                    ['id' => 'f-math-m4-c-1', 'code' => 'F.M4.C.1', 'name' => 'Decompose angles using pattern blocks.', 'url' => 'f.php?f-math-m4-c-1'],
                    ['id' => 'f-math-m4-c-2', 'code' => 'F.M4.C.2', 'name' => 'Use the addition of adjacent angle measures to solve problems using a symbol for the unknown...', 'url' => 'f.php?f-math-m4-c-2'],
                    ['id' => 'f-math-m4-c-3', 'code' => 'F.M4.C.3', 'name' => 'Use the addition of adjacent angle measures to solve problems using a symbol for the unknown...', 'url' => 'f.php?f-math-m4-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Two-Dimensional Figures and Symmetry',
                'skills' => [
                    ['id' => 'f-math-m4-d-1', 'code' => 'F.M4.D.1', 'name' => 'Recognize lines of symmetry for given two-dimensional figures. Identify line-symmetric figur...', 'url' => 'f.php?f-math-m4-d-1'],
                    ['id' => 'f-math-m4-d-2', 'code' => 'F.M4.D.2', 'name' => 'Analyze and classify triangles based on side length, angle measure, or both.', 'url' => 'f.php?f-math-m4-d-2'],
                    ['id' => 'f-math-m4-d-3', 'code' => 'F.M4.D.3', 'name' => 'Define and construct triangles from given criteria. Explore symmetry in triangles.', 'url' => 'f.php?f-math-m4-d-3'],
                    ['id' => 'f-math-m4-d-4', 'code' => 'F.M4.D.4', 'name' => 'Classify quadrilaterals based on parallel and perpendicular lines and the presence or absenc...', 'url' => 'f.php?f-math-m4-d-4'],
                    ['id' => 'f-math-m4-d-5', 'code' => 'F.M4.D.5', 'name' => 'Reason about attributes to construct quadrilaterals on square or triangular grid paper.', 'url' => 'f.php?f-math-m4-d-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Fraction Equivalence, Ordering, and Operations',
        'description' => 'Decomposition and fraction equivalence, multiplication/division for equivalent fractions, fraction comparison, addition/subtraction with like and unlike denominators, mixed numbers, and multiplying fractions by whole numbers.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Decomposition and Fraction Equivalence',
                'skills' => [
                    ['id' => 'f-math-m5-a-1', 'code' => 'F.M5.A.1', 'name' => 'Decompose fractions as a sum of unit fractions using tape diagrams.', 'url' => 'f.php?f-math-m5-a-1'],
                    ['id' => 'f-math-m5-a-2', 'code' => 'F.M5.A.2', 'name' => 'Decompose fractions as a sum of unit fractions using tape diagrams.', 'url' => 'f.php?f-math-m5-a-2'],
                    ['id' => 'f-math-m5-a-3', 'code' => 'F.M5.A.3', 'name' => 'Decompose non-unit fractions and represent them as a whole number times a unit fraction usin...', 'url' => 'f.php?f-math-m5-a-3'],
                    ['id' => 'f-math-m5-a-4', 'code' => 'F.M5.A.4', 'name' => 'Decompose fractions into sums of smaller unit fractions using tape diagrams.', 'url' => 'f.php?f-math-m5-a-4'],
                    ['id' => 'f-math-m5-a-5', 'code' => 'F.M5.A.5', 'name' => 'Decompose unit fractions using area models to show equivalence.', 'url' => 'f.php?f-math-m5-a-5'],
                    ['id' => 'f-math-m5-a-6', 'code' => 'F.M5.A.6', 'name' => 'Decompose fractions using area models to show equivalence.', 'url' => 'f.php?f-math-m5-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Fraction Equivalence Using Multiplication and Division',
                'skills' => [
                    ['id' => 'f-math-m5-b-1', 'code' => 'F.M5.B.1', 'name' => 'Use the area model and multiplication to show the equivalence of two fractions.', 'url' => 'f.php?f-math-m5-b-1'],
                    ['id' => 'f-math-m5-b-2', 'code' => 'F.M5.B.2', 'name' => 'Use the area model and multiplication to show the equivalence of two fractions.', 'url' => 'f.php?f-math-m5-b-2'],
                    ['id' => 'f-math-m5-b-3', 'code' => 'F.M5.B.3', 'name' => 'Use the area model and division to show the equivalence of two fractions.', 'url' => 'f.php?f-math-m5-b-3'],
                    ['id' => 'f-math-m5-b-4', 'code' => 'F.M5.B.4', 'name' => 'Use the area model and division to show the equivalence of two fractions.', 'url' => 'f.php?f-math-m5-b-4'],
                    ['id' => 'f-math-m5-b-5', 'code' => 'F.M5.B.5', 'name' => 'Explain fraction equivalence using a tape diagram and the number line, and relate that to th...', 'url' => 'f.php?f-math-m5-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Fraction Comparison',
                'skills' => [
                    ['id' => 'f-math-m5-c-1', 'code' => 'F.M5.C.1', 'name' => 'Reason using benchmarks to compare two fractions on the number line.', 'url' => 'f.php?f-math-m5-c-1'],
                    ['id' => 'f-math-m5-c-2', 'code' => 'F.M5.C.2', 'name' => 'Reason using benchmarks to compare two fractions on the number line.', 'url' => 'f.php?f-math-m5-c-2'],
                    ['id' => 'f-math-m5-c-3', 'code' => 'F.M5.C.3', 'name' => 'Find common units or number of units to compare two fractions.', 'url' => 'f.php?f-math-m5-c-3'],
                    ['id' => 'f-math-m5-c-4', 'code' => 'F.M5.C.4', 'name' => 'Find common units or number of units to compare two fractions.', 'url' => 'f.php?f-math-m5-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Fraction Addition and Subtraction',
                'skills' => [
                    ['id' => 'f-math-m5-d-1', 'code' => 'F.M5.D.1', 'name' => 'Use visual models to add and subtract two fractions with the same units.', 'url' => 'f.php?f-math-m5-d-1'],
                    ['id' => 'f-math-m5-d-2', 'code' => 'F.M5.D.2', 'name' => 'Use visual models to add and subtract two fractions with the same units, including subtracti...', 'url' => 'f.php?f-math-m5-d-2'],
                    ['id' => 'f-math-m5-d-3', 'code' => 'F.M5.D.3', 'name' => 'Add and subtract more than two fractions.', 'url' => 'f.php?f-math-m5-d-3'],
                    ['id' => 'f-math-m5-d-4', 'code' => 'F.M5.D.4', 'name' => 'Solve word problems involving addition and subtraction of fractions.', 'url' => 'f.php?f-math-m5-d-4'],
                    ['id' => 'f-math-m5-d-5', 'code' => 'F.M5.D.5', 'name' => 'A NOTE ON STANDARDS ALIGNMENT:In Lessons 20 and 21, students add fractions with related deno...', 'url' => 'f.php?f-math-m5-d-5'],
                    ['id' => 'f-math-m5-d-6', 'code' => 'F.M5.D.6', 'name' => 'Use visual models to add two fractions with related units using the denominators 2, 3, 4, 5,...', 'url' => 'f.php?f-math-m5-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Extending Fraction Equivalence to Fractions Greater Than 1',
                'skills' => [
                    ['id' => 'f-math-m5-e-1', 'code' => 'F.M5.E.1', 'name' => 'Add a fraction less than 1 to, or subtract a fraction less than 1 from, a whole number using...', 'url' => 'f.php?f-math-m5-e-1'],
                    ['id' => 'f-math-m5-e-2', 'code' => 'F.M5.E.2', 'name' => 'Add and multiply unit fractions to build fractions greater than 1 using visual models.', 'url' => 'f.php?f-math-m5-e-2'],
                    ['id' => 'f-math-m5-e-3', 'code' => 'F.M5.E.3', 'name' => 'Decompose and compose fractions greater than 1 to express them in various forms.', 'url' => 'f.php?f-math-m5-e-3'],
                    ['id' => 'f-math-m5-e-4', 'code' => 'F.M5.E.4', 'name' => 'Decompose and compose fractions greater than 1 to express them in various forms.', 'url' => 'f.php?f-math-m5-e-4'],
                    ['id' => 'f-math-m5-e-5', 'code' => 'F.M5.E.5', 'name' => 'Compare fractions greater than 1 by reasoning using benchmark fractions.', 'url' => 'f.php?f-math-m5-e-5'],
                    ['id' => 'f-math-m5-e-6', 'code' => 'F.M5.E.6', 'name' => 'Compare fractions greater than 1 by creating common numerators or denominators.', 'url' => 'f.php?f-math-m5-e-6'],
                    ['id' => 'f-math-m5-e-7', 'code' => 'F.M5.E.7', 'name' => 'Solve word problems with line plots.', 'url' => 'f.php?f-math-m5-e-7'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Addition and Subtraction of Fractions by Decomposition',
                'skills' => [
                    ['id' => 'f-math-m5-f-1', 'code' => 'F.M5.F.1', 'name' => 'Estimate sums and differences using benchmark numbers.', 'url' => 'f.php?f-math-m5-f-1'],
                    ['id' => 'f-math-m5-f-2', 'code' => 'F.M5.F.2', 'name' => 'Add a mixed number and a fraction.', 'url' => 'f.php?f-math-m5-f-2'],
                    ['id' => 'f-math-m5-f-3', 'code' => 'F.M5.F.3', 'name' => 'Add mixed numbers.', 'url' => 'f.php?f-math-m5-f-3'],
                    ['id' => 'f-math-m5-f-4', 'code' => 'F.M5.F.4', 'name' => 'Subtract a fraction from a mixed number.', 'url' => 'f.php?f-math-m5-f-4'],
                    ['id' => 'f-math-m5-f-5', 'code' => 'F.M5.F.5', 'name' => 'Subtract a mixed number from a mixed number.', 'url' => 'f.php?f-math-m5-f-5'],
                    ['id' => 'f-math-m5-f-6', 'code' => 'F.M5.F.6', 'name' => 'Subtract mixed numbers.', 'url' => 'f.php?f-math-m5-f-6'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Repeated Addition of Fractions as Multiplication',
                'skills' => [
                    ['id' => 'f-math-m5-g-1', 'code' => 'F.M5.G.1', 'name' => 'Represent the multiplication of n times a/b as (n \times a)/b using the associative property...', 'url' => 'f.php?f-math-m5-g-1'],
                    ['id' => 'f-math-m5-g-2', 'code' => 'F.M5.G.2', 'name' => 'Represent the multiplication of n times a/b as (n \times a)/b using the associative property...', 'url' => 'f.php?f-math-m5-g-2'],
                    ['id' => 'f-math-m5-g-3', 'code' => 'F.M5.G.3', 'name' => 'Find the product of a whole number and a mixed number using the distributive property.', 'url' => 'f.php?f-math-m5-g-3'],
                    ['id' => 'f-math-m5-g-4', 'code' => 'F.M5.G.4', 'name' => 'Find the product of a whole number and a mixed number using the distributive property.', 'url' => 'f.php?f-math-m5-g-4'],
                    ['id' => 'f-math-m5-g-5', 'code' => 'F.M5.G.5', 'name' => 'Solve multiplicative comparison word problems involving fractions.', 'url' => 'f.php?f-math-m5-g-5'],
                    ['id' => 'f-math-m5-g-6', 'code' => 'F.M5.G.6', 'name' => 'Solve word problems involving the multiplication of a whole number and a fraction including ...', 'url' => 'f.php?f-math-m5-g-6'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Exploring a Fraction Pattern',
                'skills' => [
                    ['id' => 'f-math-m5-h-1', 'code' => 'F.M5.H.1', 'name' => 'Find and use a pattern to calculate the sum of all fractional parts between 0 and 1. Share a...', 'url' => 'f.php?f-math-m5-h-1'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Decimal Fractions',
        'description' => 'Exploration of tenths, tenths and hundredths, decimal comparison on the number line, addition with tenths and hundredths, and money amounts as decimal numbers.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Exploration of Tenths',
                'skills' => [
                    ['id' => 'f-math-m6-a-1', 'code' => 'F.M6.A.1', 'name' => 'Use metric measurement to model the decomposition of one whole into tenths.', 'url' => 'f.php?f-math-m6-a-1'],
                    ['id' => 'f-math-m6-a-2', 'code' => 'F.M6.A.2', 'name' => 'Use metric measurement and area models to represent tenths as fractions greater than 1 and d...', 'url' => 'f.php?f-math-m6-a-2'],
                    ['id' => 'f-math-m6-a-3', 'code' => 'F.M6.A.3', 'name' => 'Represent mixed numbers with units of tens, ones, and tenths with place value disks, on the ...', 'url' => 'f.php?f-math-m6-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Tenths and Hundredths',
                'skills' => [
                    ['id' => 'f-math-m6-b-1', 'code' => 'F.M6.B.1', 'name' => 'Use meters to model the decomposition of one whole into hundredths. Represent and count hund...', 'url' => 'f.php?f-math-m6-b-1'],
                    ['id' => 'f-math-m6-b-2', 'code' => 'F.M6.B.2', 'name' => 'Model the equivalence of tenths and hundredths using the area model and place value disks.', 'url' => 'f.php?f-math-m6-b-2'],
                    ['id' => 'f-math-m6-b-3', 'code' => 'F.M6.B.3', 'name' => 'Use the area model and number line to represent mixed numbers with units of ones, tenths, an...', 'url' => 'f.php?f-math-m6-b-3'],
                    ['id' => 'f-math-m6-b-4', 'code' => 'F.M6.B.4', 'name' => 'Model mixed numbers with units of hundreds, tens, ones, tenths, and hundredths in expanded f...', 'url' => 'f.php?f-math-m6-b-4'],
                    ['id' => 'f-math-m6-b-5', 'code' => 'F.M6.B.5', 'name' => 'Use understanding of fraction equivalence to investigate decimal numbers on the place value ...', 'url' => 'f.php?f-math-m6-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Decimal Comparison',
                'skills' => [
                    ['id' => 'f-math-m6-c-1', 'code' => 'F.M6.C.1', 'name' => 'Use the place value chart and metric measurement to compare decimals and answer comparison q...', 'url' => 'f.php?f-math-m6-c-1'],
                    ['id' => 'f-math-m6-c-2', 'code' => 'F.M6.C.2', 'name' => 'Use area models and the number line to compare decimal numbers, and record comparisons using...', 'url' => 'f.php?f-math-m6-c-2'],
                    ['id' => 'f-math-m6-c-3', 'code' => 'F.M6.C.3', 'name' => 'Compare and order mixed numbers in various forms.', 'url' => 'f.php?f-math-m6-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Addition with Tenths and Hundredths',
                'skills' => [
                    ['id' => 'f-math-m6-d-1', 'code' => 'F.M6.D.1', 'name' => 'Apply understanding of fraction equivalence to add tenths and hundredths.', 'url' => 'f.php?f-math-m6-d-1'],
                    ['id' => 'f-math-m6-d-2', 'code' => 'F.M6.D.2', 'name' => 'Add decimal numbers by converting to fraction form.', 'url' => 'f.php?f-math-m6-d-2'],
                    ['id' => 'f-math-m6-d-3', 'code' => 'F.M6.D.3', 'name' => 'Solve word problems involving the addition of measurements in decimal form.', 'url' => 'f.php?f-math-m6-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Money Amounts as Decimal Numbers',
                'skills' => [
                    ['id' => 'f-math-m6-e-1', 'code' => 'F.M6.E.1', 'name' => 'Express money amounts given in various forms as decimal numbers.', 'url' => 'f.php?f-math-m6-e-1'],
                    ['id' => 'f-math-m6-e-2', 'code' => 'F.M6.E.2', 'name' => 'Solve word problems involving money.', 'url' => 'f.php?f-math-m6-e-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 7: Exploring Measurement with Multiplication',
        'description' => 'Measurement conversion tables, problem solving with measurement, investigation of measurements expressed as mixed numbers, and year-in-review math project.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Measurement Conversion Tables',
                'skills' => [
                    ['id' => 'f-math-m7-a-1', 'code' => 'F.M7.A.1', 'name' => 'Create conversion tables for length, weight, and capacity units using measurement tools, and...', 'url' => 'f.php?f-math-m7-a-1'],
                    ['id' => 'f-math-m7-a-2', 'code' => 'F.M7.A.2', 'name' => 'Create conversion tables for length, weight, and capacity units using measurement tools, and...', 'url' => 'f.php?f-math-m7-a-2'],
                    ['id' => 'f-math-m7-a-3', 'code' => 'F.M7.A.3', 'name' => 'Create conversion tables for units of time, and use the tables to solve problems.', 'url' => 'f.php?f-math-m7-a-3'],
                    ['id' => 'f-math-m7-a-4', 'code' => 'F.M7.A.4', 'name' => 'Solve multiplicative comparison word problems using measurement conversion tables.', 'url' => 'f.php?f-math-m7-a-4'],
                    ['id' => 'f-math-m7-a-5', 'code' => 'F.M7.A.5', 'name' => 'Share and critique peer strategies.', 'url' => 'f.php?f-math-m7-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Problem Solving with Measurement',
                'skills' => [
                    ['id' => 'f-math-m7-b-1', 'code' => 'F.M7.B.1', 'name' => 'Solve problems involving mixed units of capacity.', 'url' => 'f.php?f-math-m7-b-1'],
                    ['id' => 'f-math-m7-b-2', 'code' => 'F.M7.B.2', 'name' => 'Solve problems involving mixed units of length.', 'url' => 'f.php?f-math-m7-b-2'],
                    ['id' => 'f-math-m7-b-3', 'code' => 'F.M7.B.3', 'name' => 'Solve problems involving mixed units of weight.', 'url' => 'f.php?f-math-m7-b-3'],
                    ['id' => 'f-math-m7-b-4', 'code' => 'F.M7.B.4', 'name' => 'Solve problems involving mixed units of time.', 'url' => 'f.php?f-math-m7-b-4'],
                    ['id' => 'f-math-m7-b-5', 'code' => 'F.M7.B.5', 'name' => 'Solve multi-step measurement word problems.', 'url' => 'f.php?f-math-m7-b-5'],
                    ['id' => 'f-math-m7-b-6', 'code' => 'F.M7.B.6', 'name' => 'Solve multi-step measurement word problems.', 'url' => 'f.php?f-math-m7-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Investigation of Measurements Expressed as Mixed Numbers',
                'skills' => [
                    ['id' => 'f-math-m7-c-1', 'code' => 'F.M7.C.1', 'name' => 'Use measurement tools to convert mixed number measurements to smaller units.', 'url' => 'f.php?f-math-m7-c-1'],
                    ['id' => 'f-math-m7-c-2', 'code' => 'F.M7.C.2', 'name' => 'Use measurement tools to convert mixed number measurements to smaller units.', 'url' => 'f.php?f-math-m7-c-2'],
                    ['id' => 'f-math-m7-c-3', 'code' => 'F.M7.C.3', 'name' => 'Solve multi-step word problems involving converting mixed number measurements to a single unit.', 'url' => 'f.php?f-math-m7-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Year in Review',
                'skills' => [
                    ['id' => 'f-math-m7-d-1', 'code' => 'F.M7.D.1', 'name' => 'Create and determine the area of composite figures.', 'url' => 'f.php?f-math-m7-d-1'],
                    ['id' => 'f-math-m7-d-2', 'code' => 'F.M7.D.2', 'name' => 'Create and determine the area of composite figures.', 'url' => 'f.php?f-math-m7-d-2'],
                    ['id' => 'f-math-m7-d-3', 'code' => 'F.M7.D.3', 'name' => 'Practice and solidify Grade 4 fluency.', 'url' => 'f.php?f-math-m7-d-3'],
                    ['id' => 'f-math-m7-d-4', 'code' => 'F.M7.D.4', 'name' => 'Practice and solidify Grade 4 vocabulary.', 'url' => 'f.php?f-math-m7-d-4'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
