<?php
/**
 * Hesten's Learning - Level M (Grade 11 Algebra II)
 * Full 120-lesson curriculum buildout aligned with EngageNY / Eureka Math.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?m-math-m1-a-1 or ?lesson=m-math-m1-a-1)
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
    $levelUrl = 'm.php';
    $levelTitle = 'Level M';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page-Specific Metadata
$pageTitle       = "11th Grade Level M | Hesten's Learning";
$pageDescription = "Algebra II foundations, polynomials, rational and radical relationships, trigonometry, logarithms, and inferential statistics for 11th-grade students.";
$pageKeywords    = "Grade 11, 11th Grade, Junior, Algebra II, Polynomials, Rational Expressions, Complex Numbers, Trigonometry, Radians, Logarithms, Exponential Growth, Normal Distribution, Statistics";

// Template Variables
$themeColor = 'amber';
$levelId = 'm';
$levelTitle = 'Level M';
$gradeText = '11th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Master polynomial arithmetic, complex numbers, periodic trigonometric functions, logarithmic models, and inferential statistics aligned with CCSS High School Mathematics.';

$modules = [
    [
        'title' => 'Module 1: Polynomial, Rational, and Radical Relationships',
        'description' => 'Develop polynomial arithmetic, factoring strategies, the Remainder and Factor Theorems, rational equations, radical operations, and complex numbers.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Polynomials—From Base Ten to Base X',
                'skills' => [
                    ['id' => 'm-math-m1-a-1', 'code' => 'M.M1.A.1', 'name' => 'Successive Differences in Polynomials'],
                    ['id' => 'm-math-m1-a-2', 'code' => 'M.M1.A.2', 'name' => 'The Multiplication of Polynomials'],
                    ['id' => 'm-math-m1-a-3', 'code' => 'M.M1.A.3', 'name' => 'The Division of Polynomials'],
                    ['id' => 'm-math-m1-a-4', 'code' => 'M.M1.A.4', 'name' => 'Comparing Methods—Long Division, Again?'],
                    ['id' => 'm-math-m1-a-5', 'code' => 'M.M1.A.5', 'name' => 'Putting It All Together'],
                    ['id' => 'm-math-m1-a-6', 'code' => 'M.M1.A.6', 'name' => 'Dividing by x-a and by x+a'],
                    ['id' => 'm-math-m1-a-7', 'code' => 'M.M1.A.7', 'name' => 'Mental Math'],
                    ['id' => 'm-math-m1-a-8', 'code' => 'M.M1.A.8', 'name' => 'The Power of Algebra—Finding Primes'],
                    ['id' => 'm-math-m1-a-9', 'code' => 'M.M1.A.9', 'name' => 'Radicals and Conjugates'],
                    ['id' => 'm-math-m1-a-10', 'code' => 'M.M1.A.10', 'name' => 'The Power of Algebra—Finding Pythagorean Triples'],
                    ['id' => 'm-math-m1-a-11', 'code' => 'M.M1.A.11', 'name' => 'The Special Role of Zero in Factoring']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Factoring—Its Use and Its Obstacles',
                'skills' => [
                    ['id' => 'm-math-m1-b-1', 'code' => 'M.M1.B.1', 'name' => 'Overcoming Obstacles in Factoring'],
                    ['id' => 'm-math-m1-b-2', 'code' => 'M.M1.B.2', 'name' => 'Mastering Factoring'],
                    ['id' => 'm-math-m1-b-3', 'code' => 'M.M1.B.3', 'name' => 'Graphing Factored Polynomials'],
                    ['id' => 'm-math-m1-b-4', 'code' => 'M.M1.B.4', 'name' => 'Structure in Graphs of Polynomial Functions'],
                    ['id' => 'm-math-m1-b-5', 'code' => 'M.M1.B.5', 'name' => 'Modeling with Polynomials—An Introduction'],
                    ['id' => 'm-math-m1-b-6', 'code' => 'M.M1.B.6', 'name' => 'Modeling with Polynomials—An Introduction'],
                    ['id' => 'm-math-m1-b-7', 'code' => 'M.M1.B.7', 'name' => 'Overcoming a Second Obstacle in Factoring—What If There Is a Remainder?'],
                    ['id' => 'm-math-m1-b-8', 'code' => 'M.M1.B.8', 'name' => 'The Remainder Theorem'],
                    ['id' => 'm-math-m1-b-9', 'code' => 'M.M1.B.9', 'name' => 'Modeling Riverbeds with Polynomials'],
                    ['id' => 'm-math-m1-b-10', 'code' => 'M.M1.B.10', 'name' => 'Modeling Riverbeds with Polynomials']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Solving and Applying Equations—Polynomial, Rational, and Radical',
                'skills' => [
                    ['id' => 'm-math-m1-c-1', 'code' => 'M.M1.C.1', 'name' => 'Equivalent Rational Expressions'],
                    ['id' => 'm-math-m1-c-2', 'code' => 'M.M1.C.2', 'name' => 'Comparing Rational Expressions'],
                    ['id' => 'm-math-m1-c-3', 'code' => 'M.M1.C.3', 'name' => 'Multiplying and Dividing Rational Expressions'],
                    ['id' => 'm-math-m1-c-4', 'code' => 'M.M1.C.4', 'name' => 'Adding and Subtracting Rational Expressions'],
                    ['id' => 'm-math-m1-c-5', 'code' => 'M.M1.C.5', 'name' => 'Solving Rational Equations'],
                    ['id' => 'm-math-m1-c-6', 'code' => 'M.M1.C.6', 'name' => 'Word Problems Leading to Rational Equations'],
                    ['id' => 'm-math-m1-c-7', 'code' => 'M.M1.C.7', 'name' => 'A Focus on Square Roots'],
                    ['id' => 'm-math-m1-c-8', 'code' => 'M.M1.C.8', 'name' => 'Solving Radical Equations'],
                    ['id' => 'm-math-m1-c-9', 'code' => 'M.M1.C.9', 'name' => 'Linear Systems in Three Variables'],
                    ['id' => 'm-math-m1-c-10', 'code' => 'M.M1.C.10', 'name' => 'Systems of Equations'],
                    ['id' => 'm-math-m1-c-11', 'code' => 'M.M1.C.11', 'name' => 'Graphing Systems of Equations'],
                    ['id' => 'm-math-m1-c-12', 'code' => 'M.M1.C.12', 'name' => 'The Definition of a Parabola'],
                    ['id' => 'm-math-m1-c-13', 'code' => 'M.M1.C.13', 'name' => 'Are All Parabolas Congruent?'],
                    ['id' => 'm-math-m1-c-14', 'code' => 'M.M1.C.14', 'name' => 'Are All Parabolas Similar?']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'A Surprise from Geometry—Complex Numbers Overcome All Obstacles',
                'skills' => [
                    ['id' => 'm-math-m1-d-1', 'code' => 'M.M1.D.1', 'name' => 'Overcoming a Third Obstacle to Factoring—What If There Are No Real Number Solutions?'],
                    ['id' => 'm-math-m1-d-2', 'code' => 'M.M1.D.2', 'name' => 'A Surprising Boost from Geometry'],
                    ['id' => 'm-math-m1-d-3', 'code' => 'M.M1.D.3', 'name' => 'Complex Numbers as Solutions to Equations'],
                    ['id' => 'm-math-m1-d-4', 'code' => 'M.M1.D.4', 'name' => 'Factoring Extended to the Complex Realm'],
                    ['id' => 'm-math-m1-d-5', 'code' => 'M.M1.D.5', 'name' => 'Obstacles Resolved—A Surprising Result']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 2: Trigonometric Functions',
        'description' => 'Extend trigonometric ratios to functions defined on the unit circle, graph periodic curves, explore radian measure, and prove trigonometric identities.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'The Story of Trigonometry and Its Contexts',
                'skills' => [
                    ['id' => 'm-math-m2-a-1', 'code' => 'M.M2.A.1', 'name' => 'Ferris Wheels—Tracking the Height of a Passenger Car'],
                    ['id' => 'm-math-m2-a-2', 'code' => 'M.M2.A.2', 'name' => 'The Height and Co-Height Functions of a Ferris Wheel'],
                    ['id' => 'm-math-m2-a-3', 'code' => 'M.M2.A.3', 'name' => 'The Motion of the Moon, Sun, and Stars—Motivating Mathematics'],
                    ['id' => 'm-math-m2-a-4', 'code' => 'M.M2.A.4', 'name' => 'From Circle-ometry to Trigonometry'],
                    ['id' => 'm-math-m2-a-5', 'code' => 'M.M2.A.5', 'name' => 'Extending the Domain of Sine and Cosine to All Real Numbers'],
                    ['id' => 'm-math-m2-a-6', 'code' => 'M.M2.A.6', 'name' => 'Why Call It Tangent?'],
                    ['id' => 'm-math-m2-a-7', 'code' => 'M.M2.A.7', 'name' => 'Secant and the Co-Functions'],
                    ['id' => 'm-math-m2-a-8', 'code' => 'M.M2.A.8', 'name' => 'Graphing the Sine and Cosine Functions'],
                    ['id' => 'm-math-m2-a-9', 'code' => 'M.M2.A.9', 'name' => 'Awkward! Who Chose the Number 360, Anyway?'],
                    ['id' => 'm-math-m2-a-10', 'code' => 'M.M2.A.10', 'name' => 'Basic Trigonometric Identities from Graphs']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Understanding Trigonometric Functions and Putting Them to Use',
                'skills' => [
                    ['id' => 'm-math-m2-b-1', 'code' => 'M.M2.B.1', 'name' => 'Transforming the Graph of the Sine Function'],
                    ['id' => 'm-math-m2-b-2', 'code' => 'M.M2.B.2', 'name' => 'Ferris Wheels—Using Trigonometric Functions to Model Cyclical Behavior'],
                    ['id' => 'm-math-m2-b-3', 'code' => 'M.M2.B.3', 'name' => 'Tides, Sound Waves, and Stock Markets'],
                    ['id' => 'm-math-m2-b-4', 'code' => 'M.M2.B.4', 'name' => 'Graphing the Tangent Function'],
                    ['id' => 'm-math-m2-b-5', 'code' => 'M.M2.B.5', 'name' => 'What Is a Trigonometric Identity?'],
                    ['id' => 'm-math-m2-b-6', 'code' => 'M.M2.B.6', 'name' => 'Proving Trigonometric Identities'],
                    ['id' => 'm-math-m2-b-7', 'code' => 'M.M2.B.7', 'name' => 'Trigonometric Identity Proofs']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 3: Exponential and Logarithmic Functions',
        'description' => 'Extend exponent rules to rational and irrational exponents, define and apply logarithmic functions, examine natural logarithms and Euler\'s number e, and model financial growth.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Real Numbers',
                'skills' => [
                    ['id' => 'm-math-m3-a-1', 'code' => 'M.M3.A.1', 'name' => 'Integer Exponents'],
                    ['id' => 'm-math-m3-a-2', 'code' => 'M.M3.A.2', 'name' => 'Base 10 and Scientific Notation'],
                    ['id' => 'm-math-m3-a-3', 'code' => 'M.M3.A.3', 'name' => 'Rational Exponents—What are 2^{\frac{1}{2}} and 2^{\frac{1}{3}}?'],
                    ['id' => 'm-math-m3-a-4', 'code' => 'M.M3.A.4', 'name' => 'Properties of Exponents and Radicals'],
                    ['id' => 'm-math-m3-a-5', 'code' => 'M.M3.A.5', 'name' => 'Irrational Exponents—What are 2^{\sqrt{2}} and 2^{\pi }?'],
                    ['id' => 'm-math-m3-a-6', 'code' => 'M.M3.A.6', 'name' => 'Euler\'s Number, e']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Logarithms',
                'skills' => [
                    ['id' => 'm-math-m3-b-1', 'code' => 'M.M3.B.1', 'name' => 'Bacteria and Exponential Growth'],
                    ['id' => 'm-math-m3-b-2', 'code' => 'M.M3.B.2', 'name' => 'The "WhatPower" Function'],
                    ['id' => 'm-math-m3-b-3', 'code' => 'M.M3.B.3', 'name' => 'Logarithms—How Many Digits Do You Need?'],
                    ['id' => 'm-math-m3-b-4', 'code' => 'M.M3.B.4', 'name' => 'Building Logarithmic Tables'],
                    ['id' => 'm-math-m3-b-5', 'code' => 'M.M3.B.5', 'name' => 'The Most Important Property of Logarithms'],
                    ['id' => 'm-math-m3-b-6', 'code' => 'M.M3.B.6', 'name' => 'Properties of Logarithms'],
                    ['id' => 'm-math-m3-b-7', 'code' => 'M.M3.B.7', 'name' => 'Changing the Base'],
                    ['id' => 'm-math-m3-b-8', 'code' => 'M.M3.B.8', 'name' => 'Solving Logarithmic Equations'],
                    ['id' => 'm-math-m3-b-9', 'code' => 'M.M3.B.9', 'name' => 'Why Were Logarithms Developed?']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Exponential and Logarithmic Functions and Their Graphs',
                'skills' => [
                    ['id' => 'm-math-m3-c-1', 'code' => 'M.M3.C.1', 'name' => 'Rational and Irrational Numbers'],
                    ['id' => 'm-math-m3-c-2', 'code' => 'M.M3.C.2', 'name' => 'Graphing the Logarithm Function'],
                    ['id' => 'm-math-m3-c-3', 'code' => 'M.M3.C.3', 'name' => 'Graphs of Exponential Functions and Logarithmic Functions'],
                    ['id' => 'm-math-m3-c-4', 'code' => 'M.M3.C.4', 'name' => 'The Inverse Relationship Between Logarithmic and Exponential Functions'],
                    ['id' => 'm-math-m3-c-5', 'code' => 'M.M3.C.5', 'name' => 'Transformations of the Graphs of Logarithmic and Exponential Functions'],
                    ['id' => 'm-math-m3-c-6', 'code' => 'M.M3.C.6', 'name' => 'The Graph of the Natural Logarithm Function'],
                    ['id' => 'm-math-m3-c-7', 'code' => 'M.M3.C.7', 'name' => 'Choosing a Model']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Using Logarithms in Modeling Situations',
                'skills' => [
                    ['id' => 'm-math-m3-d-1', 'code' => 'M.M3.D.1', 'name' => 'Bean Counting'],
                    ['id' => 'm-math-m3-d-2', 'code' => 'M.M3.D.2', 'name' => 'Solving Exponential Equations'],
                    ['id' => 'm-math-m3-d-3', 'code' => 'M.M3.D.3', 'name' => 'Geometric Sequences and Exponential Growth and Decay'],
                    ['id' => 'm-math-m3-d-4', 'code' => 'M.M3.D.4', 'name' => 'Percent Rate of Change'],
                    ['id' => 'm-math-m3-d-5', 'code' => 'M.M3.D.5', 'name' => 'Modeling with Exponential Functions'],
                    ['id' => 'm-math-m3-d-6', 'code' => 'M.M3.D.6', 'name' => 'Newton\'s Law of Cooling, Revisited']
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Geometric Series and Finance',
                'skills' => [
                    ['id' => 'm-math-m3-e-1', 'code' => 'M.M3.E.1', 'name' => 'The Mathematics Behind a Structured Savings Plan'],
                    ['id' => 'm-math-m3-e-2', 'code' => 'M.M3.E.2', 'name' => 'Buying a Car'],
                    ['id' => 'm-math-m3-e-3', 'code' => 'M.M3.E.3', 'name' => 'Credit Cards'],
                    ['id' => 'm-math-m3-e-4', 'code' => 'M.M3.E.4', 'name' => 'Buying a House'],
                    ['id' => 'm-math-m3-e-5', 'code' => 'M.M3.E.5', 'name' => 'The Million Dollar Problem']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 4: Inferences and Conclusions from Data',
        'description' => 'Explore chance experiments, conditional probability with two-way tables, normal distributions and standard deviation, sampling variability, margin of error, and randomized experiments.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Probability',
                'skills' => [
                    ['id' => 'm-math-m4-a-1', 'code' => 'M.M4.A.1', 'name' => 'Chance Experiments, Sample Spaces, and Events'],
                    ['id' => 'm-math-m4-a-2', 'code' => 'M.M4.A.2', 'name' => 'Calculating Probabilities of Events Using Two-Way Tables'],
                    ['id' => 'm-math-m4-a-3', 'code' => 'M.M4.A.3', 'name' => 'Calculating Conditional Probabilities and Evaluating Independence Using Two-Way Tables'],
                    ['id' => 'm-math-m4-a-4', 'code' => 'M.M4.A.4', 'name' => 'Calculating Conditional Probabilities and Evaluating Independence Using Two-Way Tables'],
                    ['id' => 'm-math-m4-a-5', 'code' => 'M.M4.A.5', 'name' => 'Events and Venn Diagrams'],
                    ['id' => 'm-math-m4-a-6', 'code' => 'M.M4.A.6', 'name' => 'Probability Rules'],
                    ['id' => 'm-math-m4-a-7', 'code' => 'M.M4.A.7', 'name' => 'Probability Rules']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Modeling Data Distributions',
                'skills' => [
                    ['id' => 'm-math-m4-b-1', 'code' => 'M.M4.B.1', 'name' => 'Distributions—Center, Shape, and Spread'],
                    ['id' => 'm-math-m4-b-2', 'code' => 'M.M4.B.2', 'name' => 'Using a Curve to Model a Data Distribution'],
                    ['id' => 'm-math-m4-b-3', 'code' => 'M.M4.B.3', 'name' => 'Normal Distributions'],
                    ['id' => 'm-math-m4-b-4', 'code' => 'M.M4.B.4', 'name' => 'Normal Distributions']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Drawing Conclusions Using Data from a Sample',
                'skills' => [
                    ['id' => 'm-math-m4-c-1', 'code' => 'M.M4.C.1', 'name' => 'Types of Statistical Studies'],
                    ['id' => 'm-math-m4-c-2', 'code' => 'M.M4.C.2', 'name' => 'Using Sample Data to Estimate a Population Characteristic'],
                    ['id' => 'm-math-m4-c-3', 'code' => 'M.M4.C.3', 'name' => 'Sampling Variability in the Sample Proportion'],
                    ['id' => 'm-math-m4-c-4', 'code' => 'M.M4.C.4', 'name' => 'Sampling Variability in the Sample Proportion'],
                    ['id' => 'm-math-m4-c-5', 'code' => 'M.M4.C.5', 'name' => 'Margin of Error When Estimating a Population Proportion'],
                    ['id' => 'm-math-m4-c-6', 'code' => 'M.M4.C.6', 'name' => 'Margin of Error When Estimating a Population Proportion'],
                    ['id' => 'm-math-m4-c-7', 'code' => 'M.M4.C.7', 'name' => 'Sampling Variability in the Sample Mean'],
                    ['id' => 'm-math-m4-c-8', 'code' => 'M.M4.C.8', 'name' => 'Sampling Variability in the Sample Mean'],
                    ['id' => 'm-math-m4-c-9', 'code' => 'M.M4.C.9', 'name' => 'Margin of Error When Estimating a Population Mean'],
                    ['id' => 'm-math-m4-c-10', 'code' => 'M.M4.C.10', 'name' => 'Margin of Error When Estimating a Population Mean'],
                    ['id' => 'm-math-m4-c-11', 'code' => 'M.M4.C.11', 'name' => 'Evaluating Reports Based on Data from a Sample']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Drawing Conclusions Using Data from an Experiment',
                'skills' => [
                    ['id' => 'm-math-m4-d-1', 'code' => 'M.M4.D.1', 'name' => 'Experiments and the Role of Random Assignment'],
                    ['id' => 'm-math-m4-d-2', 'code' => 'M.M4.D.2', 'name' => 'Differences Due to Random Assignment Alone'],
                    ['id' => 'm-math-m4-d-3', 'code' => 'M.M4.D.3', 'name' => 'Ruling Out Chance'],
                    ['id' => 'm-math-m4-d-4', 'code' => 'M.M4.D.4', 'name' => 'Ruling Out Chance'],
                    ['id' => 'm-math-m4-d-5', 'code' => 'M.M4.D.5', 'name' => 'Ruling Out Chance'],
                    ['id' => 'm-math-m4-d-6', 'code' => 'M.M4.D.6', 'name' => 'Drawing a Conclusion from an Experiment'],
                    ['id' => 'm-math-m4-d-7', 'code' => 'M.M4.D.7', 'name' => 'Drawing a Conclusion from an Experiment'],
                    ['id' => 'm-math-m4-d-8', 'code' => 'M.M4.D.8', 'name' => 'Evaluating Reports Based on Data from an Experiment']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>
