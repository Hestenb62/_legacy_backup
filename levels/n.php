<?php
/**
 * Hesten's Learning - Level N (Grade 12 Precalculus)
 * Full 111-lesson curriculum buildout aligned with EngageNY / Eureka Math.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?n-math-m1-a-1 or ?lesson=n-math-m1-a-1)
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
    $levelUrl = 'n.php';
    $levelTitle = 'Level N';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page-Specific Metadata
$pageTitle       = "12th Grade Level N | Hesten's Learning";
$pageDescription = "Precalculus foundations, complex numbers as transformations, vectors, matrices, trigonometric identities, and probability distributions for 12th-grade students.";
$pageKeywords    = "Grade 12, 12th Grade, Senior, Precalculus, Complex Numbers, Vectors, Matrices, Trigonometry, Rational Functions, Probability Distributions, Expected Value";

// Template Variables
$themeColor = 'pink';
$levelId = 'n';
$levelTitle = 'Level N';
$gradeText = '12th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Master complex numbers, linear transformations, vectors, matrix algebra, trigonometry, and probability distributions aligned with CCSS High School Advanced Mathematics.';

$modules = [
    [
        'title' => 'Module 1: Complex Numbers and Transformations',
        'description' => 'Represent complex numbers geometrically as vectors in the complex plane, model linear transformations using matrices, and explore operations as geometric mappings.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'A Question of Linearity',
                'skills' => [
                    ['id' => 'n-math-m1-a-1', 'code' => 'N.M1.A.1', 'name' => 'Wishful Thinking—Does Linearity Hold?'],
                    ['id' => 'n-math-m1-a-2', 'code' => 'N.M1.A.2', 'name' => 'Wishful Thinking—Does Linearity Hold?'],
                    ['id' => 'n-math-m1-a-3', 'code' => 'N.M1.A.3', 'name' => 'Which Real Number Functions Define a Linear Transformation?'],
                    ['id' => 'n-math-m1-a-4', 'code' => 'N.M1.A.4', 'name' => 'An Appearance of Complex Numbers'],
                    ['id' => 'n-math-m1-a-5', 'code' => 'N.M1.A.5', 'name' => 'An Appearance of Complex Numbers'],
                    ['id' => 'n-math-m1-a-6', 'code' => 'N.M1.A.6', 'name' => 'Complex Numbers as Vectors'],
                    ['id' => 'n-math-m1-a-7', 'code' => 'N.M1.A.7', 'name' => 'Complex Number Division'],
                    ['id' => 'n-math-m1-a-8', 'code' => 'N.M1.A.8', 'name' => 'Complex Number Division']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Complex Number Operations as Transformations',
                'skills' => [
                    ['id' => 'n-math-m1-b-1', 'code' => 'N.M1.B.1', 'name' => 'The Geometric Effect of Some Complex Arithmetic'],
                    ['id' => 'n-math-m1-b-2', 'code' => 'N.M1.B.2', 'name' => 'The Geometric Effect of Some Complex Arithmetic'],
                    ['id' => 'n-math-m1-b-3', 'code' => 'N.M1.B.3', 'name' => 'Distance and Complex Numbers'],
                    ['id' => 'n-math-m1-b-4', 'code' => 'N.M1.B.4', 'name' => 'Distance and Complex Numbers'],
                    ['id' => 'n-math-m1-b-5', 'code' => 'N.M1.B.5', 'name' => 'Trigonometry and Complex Numbers'],
                    ['id' => 'n-math-m1-b-6', 'code' => 'N.M1.B.6', 'name' => 'Discovering the Geometric Effect of Complex Multiplication'],
                    ['id' => 'n-math-m1-b-7', 'code' => 'N.M1.B.7', 'name' => 'Justifying the Geometric Effect of Complex Multiplication'],
                    ['id' => 'n-math-m1-b-8', 'code' => 'N.M1.B.8', 'name' => 'Representing Reflections with Transformations'],
                    ['id' => 'n-math-m1-b-9', 'code' => 'N.M1.B.9', 'name' => 'The Geometric Effect of Multiplying by a Reciprocal']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'The Power of the Right Notation',
                'skills' => [
                    ['id' => 'n-math-m1-c-1', 'code' => 'N.M1.C.1', 'name' => 'Exploiting the Connection to Trigonometry'],
                    ['id' => 'n-math-m1-c-2', 'code' => 'N.M1.C.2', 'name' => 'Exploiting the Connection to Trigonometry'],
                    ['id' => 'n-math-m1-c-3', 'code' => 'N.M1.C.3', 'name' => 'Exploiting the Connection to Cartesian Coordinates'],
                    ['id' => 'n-math-m1-c-4', 'code' => 'N.M1.C.4', 'name' => 'The Hunt for Better Notation'],
                    ['id' => 'n-math-m1-c-5', 'code' => 'N.M1.C.5', 'name' => 'Modeling Video Game Motion with Matrices'],
                    ['id' => 'n-math-m1-c-6', 'code' => 'N.M1.C.6', 'name' => 'Modeling Video Game Motion with Matrices'],
                    ['id' => 'n-math-m1-c-7', 'code' => 'N.M1.C.7', 'name' => 'Matrix Notation Encompasses New Transformations!'],
                    ['id' => 'n-math-m1-c-8', 'code' => 'N.M1.C.8', 'name' => 'Matrix Multiplication and Addition'],
                    ['id' => 'n-math-m1-c-9', 'code' => 'N.M1.C.9', 'name' => 'Getting a Handle on New Transformations'],
                    ['id' => 'n-math-m1-c-10', 'code' => 'N.M1.C.10', 'name' => 'Getting a Handle on New Transformations'],
                    ['id' => 'n-math-m1-c-11', 'code' => 'N.M1.C.11', 'name' => 'When Can We Reverse a Transformation?'],
                    ['id' => 'n-math-m1-c-12', 'code' => 'N.M1.C.12', 'name' => 'When Can We Reverse a Transformation?'],
                    ['id' => 'n-math-m1-c-13', 'code' => 'N.M1.C.13', 'name' => 'When Can We Reverse a Transformation?']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 2: Vectors and Matrices',
        'description' => 'Investigate networks, matrix arithmetic, linear transformations in 2D and 3D coordinate space, systems of equations, vector arithmetic, and 3D computer game projection matrices.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Networks and Matrices',
                'skills' => [
                    ['id' => 'n-math-m2-a-1', 'code' => 'N.M2.A.1', 'name' => 'Introduction to Networks'],
                    ['id' => 'n-math-m2-a-2', 'code' => 'N.M2.A.2', 'name' => 'Networks and Matrix Arithmetic'],
                    ['id' => 'n-math-m2-a-3', 'code' => 'N.M2.A.3', 'name' => 'Matrix Arithmetic in Its Own Right']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Linear Transformations of Planes and Space',
                'skills' => [
                    ['id' => 'n-math-m2-b-1', 'code' => 'N.M2.B.1', 'name' => 'Linear Transformations Review'],
                    ['id' => 'n-math-m2-b-2', 'code' => 'N.M2.B.2', 'name' => 'Coordinates of Points in Space'],
                    ['id' => 'n-math-m2-b-3', 'code' => 'N.M2.B.3', 'name' => 'Linear Transformations as Matrices'],
                    ['id' => 'n-math-m2-b-4', 'code' => 'N.M2.B.4', 'name' => 'Linear Transformations Applied to Cubes'],
                    ['id' => 'n-math-m2-b-5', 'code' => 'N.M2.B.5', 'name' => 'Composition of Linear Transformations'],
                    ['id' => 'n-math-m2-b-6', 'code' => 'N.M2.B.6', 'name' => 'Composition of Linear Transformations'],
                    ['id' => 'n-math-m2-b-7', 'code' => 'N.M2.B.7', 'name' => 'Matrix Multiplication Is Not Commutative'],
                    ['id' => 'n-math-m2-b-8', 'code' => 'N.M2.B.8', 'name' => 'Matrix Addition Is Commutative'],
                    ['id' => 'n-math-m2-b-9', 'code' => 'N.M2.B.9', 'name' => 'Matrix Multiplication Is Distributive and Associative'],
                    ['id' => 'n-math-m2-b-10', 'code' => 'N.M2.B.10', 'name' => 'Using Matrix Operations for Encryption']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Systems of Linear Equations',
                'skills' => [
                    ['id' => 'n-math-m2-c-1', 'code' => 'N.M2.C.1', 'name' => 'Solving Equations Involving Linear Transformations of the Coordinate Plane'],
                    ['id' => 'n-math-m2-c-2', 'code' => 'N.M2.C.2', 'name' => 'Solving Equations Involving Linear Transformations of the Coordinate Space'],
                    ['id' => 'n-math-m2-c-3', 'code' => 'N.M2.C.3', 'name' => 'Solving General Systems of Linear Equations']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Vectors in Plane and Space',
                'skills' => [
                    ['id' => 'n-math-m2-d-1', 'code' => 'N.M2.D.1', 'name' => 'Vectors in the Coordinate Plane'],
                    ['id' => 'n-math-m2-d-2', 'code' => 'N.M2.D.2', 'name' => 'Vectors and Translation Maps'],
                    ['id' => 'n-math-m2-d-3', 'code' => 'N.M2.D.3', 'name' => 'Directed Line Segments and Vectors'],
                    ['id' => 'n-math-m2-d-4', 'code' => 'N.M2.D.4', 'name' => 'Vectors and Stone Bridges'],
                    ['id' => 'n-math-m2-d-5', 'code' => 'N.M2.D.5', 'name' => 'Vectors and the Equation of a Line'],
                    ['id' => 'n-math-m2-d-6', 'code' => 'N.M2.D.6', 'name' => 'Linear Transformations of Lines'],
                    ['id' => 'n-math-m2-d-7', 'code' => 'N.M2.D.7', 'name' => 'Why Are Vectors Useful?'],
                    ['id' => 'n-math-m2-d-8', 'code' => 'N.M2.D.8', 'name' => 'Why Are Vectors Useful?']
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'First-Person Video Games—Projection Matrices',
                'skills' => [
                    ['id' => 'n-math-m2-e-1', 'code' => 'N.M2.E.1', 'name' => 'First-Person Computer Games'],
                    ['id' => 'n-math-m2-e-2', 'code' => 'N.M2.E.2', 'name' => 'Projecting a 3-D Object onto a 2-D Plane'],
                    ['id' => 'n-math-m2-e-3', 'code' => 'N.M2.E.3', 'name' => 'Designing Your Own Game']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 3: Rational and Exponential Functions',
        'description' => 'Explore polynomial solutions in the complex plane, roots of unity, the Binomial Theorem, Cavalieri\'s principle, rational function end behavior, asymptotes, and inverse function composition.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Polynomial Functions and the Fundamental Theorem of Algebra',
                'skills' => [
                    ['id' => 'n-math-m3-a-1', 'code' => 'N.M3.A.1', 'name' => 'Solutions to Polynomial Equations'],
                    ['id' => 'n-math-m3-a-2', 'code' => 'N.M3.A.2', 'name' => 'Does Every Complex Number Have a Square Root?'],
                    ['id' => 'n-math-m3-a-3', 'code' => 'N.M3.A.3', 'name' => 'Roots of Unity'],
                    ['id' => 'n-math-m3-a-4', 'code' => 'N.M3.A.4', 'name' => 'The Binomial Theorem'],
                    ['id' => 'n-math-m3-a-5', 'code' => 'N.M3.A.5', 'name' => 'The Binomial Theorem'],
                    ['id' => 'n-math-m3-a-6', 'code' => 'N.M3.A.6', 'name' => 'Curves in the Complex Plane'],
                    ['id' => 'n-math-m3-a-7', 'code' => 'N.M3.A.7', 'name' => 'Curves from Geometry'],
                    ['id' => 'n-math-m3-a-8', 'code' => 'N.M3.A.8', 'name' => 'Curves from Geometry'],
                    ['id' => 'n-math-m3-a-9', 'code' => 'N.M3.A.9', 'name' => 'Volume and Cavalieri\'s Principle']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Rational Functions and Composition of Functions',
                'skills' => [
                    ['id' => 'n-math-m3-b-1', 'code' => 'N.M3.B.1', 'name' => 'The Structure of Rational Expressions'],
                    ['id' => 'n-math-m3-b-2', 'code' => 'N.M3.B.2', 'name' => 'Rational Functions'],
                    ['id' => 'n-math-m3-b-3', 'code' => 'N.M3.B.3', 'name' => 'End Behavior of Rational Functions'],
                    ['id' => 'n-math-m3-b-4', 'code' => 'N.M3.B.4', 'name' => 'Horizontal and Vertical Asymptotes of Graphs of Rational Functions'],
                    ['id' => 'n-math-m3-b-5', 'code' => 'N.M3.B.5', 'name' => 'Graphing Rational Functions'],
                    ['id' => 'n-math-m3-b-6', 'code' => 'N.M3.B.6', 'name' => 'Transforming Rational Functions'],
                    ['id' => 'n-math-m3-b-7', 'code' => 'N.M3.B.7', 'name' => 'Function Composition'],
                    ['id' => 'n-math-m3-b-8', 'code' => 'N.M3.B.8', 'name' => 'Solving Problems by Function Composition']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Inverse Functions',
                'skills' => [
                    ['id' => 'n-math-m3-c-1', 'code' => 'N.M3.C.1', 'name' => 'Inverse Functions'],
                    ['id' => 'n-math-m3-c-2', 'code' => 'N.M3.C.2', 'name' => 'Restricting the Domain'],
                    ['id' => 'n-math-m3-c-3', 'code' => 'N.M3.C.3', 'name' => 'Inverses of Logarithmic and Exponential Functions'],
                    ['id' => 'n-math-m3-c-4', 'code' => 'N.M3.C.4', 'name' => 'Logarithmic and Exponential Problem Solving']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 4: Trigonometry',
        'description' => 'Examine trigonometric functions and symmetries, sum and difference formulas, Law of Sines and Cosines for non-right triangles, triangle area formulas, and inverse trigonometric functions.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Trigonometric Functions',
                'skills' => [
                    ['id' => 'n-math-m4-a-1', 'code' => 'N.M4.A.1', 'name' => 'Special Triangles and the Unit Circle'],
                    ['id' => 'n-math-m4-a-2', 'code' => 'N.M4.A.2', 'name' => 'Properties of Trigonometric Functions'],
                    ['id' => 'n-math-m4-a-3', 'code' => 'N.M4.A.3', 'name' => 'Addition and Subtraction Formulas'],
                    ['id' => 'n-math-m4-a-4', 'code' => 'N.M4.A.4', 'name' => 'Addition and Subtraction Formulas'],
                    ['id' => 'n-math-m4-a-5', 'code' => 'N.M4.A.5', 'name' => 'Tangent Lines and the Tangent Function'],
                    ['id' => 'n-math-m4-a-6', 'code' => 'N.M4.A.6', 'name' => 'Waves, Sinusoids, and Identities']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Trigonometry and Triangles',
                'skills' => [
                    ['id' => 'n-math-m4-b-1', 'code' => 'N.M4.B.1', 'name' => 'An Area Formula for Triangles'],
                    ['id' => 'n-math-m4-b-2', 'code' => 'N.M4.B.2', 'name' => 'Law of Sines'],
                    ['id' => 'n-math-m4-b-3', 'code' => 'N.M4.B.3', 'name' => 'Law of Cosines'],
                    ['id' => 'n-math-m4-b-4', 'code' => 'N.M4.B.4', 'name' => 'Putting the Law of Cosines and the Law of Sines to Use']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Inverse Trigonometric Functions',
                'skills' => [
                    ['id' => 'n-math-m4-c-1', 'code' => 'N.M4.C.1', 'name' => 'Revisiting the Graphs of the Trigonometric Functions'],
                    ['id' => 'n-math-m4-c-2', 'code' => 'N.M4.C.2', 'name' => 'Inverse Trigonometric Functions'],
                    ['id' => 'n-math-m4-c-3', 'code' => 'N.M4.C.3', 'name' => 'Modeling with Inverse Trigonometric Functions'],
                    ['id' => 'n-math-m4-c-4', 'code' => 'N.M4.C.4', 'name' => 'Modeling with Inverse Trigonometric Functions']
                ]
            ]
        ]
    ],
    [
        'title' => 'Module 5: Probability and Statistics',
        'description' => 'Master combinatorial counting rules, permutations and combinations, discrete random variables and probability distributions, expected value calculations, and decision analysis.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Probability',
                'skills' => [
                    ['id' => 'n-math-m5-a-1', 'code' => 'N.M5.A.1', 'name' => 'The General Multiplication Rule'],
                    ['id' => 'n-math-m5-a-2', 'code' => 'N.M5.A.2', 'name' => 'Counting Rules—The Fundamental Counting Principle and Permutations'],
                    ['id' => 'n-math-m5-a-3', 'code' => 'N.M5.A.3', 'name' => 'Counting Rules—Combinations'],
                    ['id' => 'n-math-m5-a-4', 'code' => 'N.M5.A.4', 'name' => 'Using Permutations and Combinations to Compute Probabilities']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Random Variables and Discrete Probability Distributions',
                'skills' => [
                    ['id' => 'n-math-m5-b-1', 'code' => 'N.M5.B.1', 'name' => 'Discrete Random Variables'],
                    ['id' => 'n-math-m5-b-2', 'code' => 'N.M5.B.2', 'name' => 'Probability Distribution of a Discrete Random Variable'],
                    ['id' => 'n-math-m5-b-3', 'code' => 'N.M5.B.3', 'name' => 'Expected Value of a Discrete Random Variable'],
                    ['id' => 'n-math-m5-b-4', 'code' => 'N.M5.B.4', 'name' => 'Interpreting Expected Value'],
                    ['id' => 'n-math-m5-b-5', 'code' => 'N.M5.B.5', 'name' => 'Determining Discrete Probability Distributions'],
                    ['id' => 'n-math-m5-b-6', 'code' => 'N.M5.B.6', 'name' => 'Determining Discrete Probability Distributions'],
                    ['id' => 'n-math-m5-b-7', 'code' => 'N.M5.B.7', 'name' => 'Estimating Probability Distributions Empirically'],
                    ['id' => 'n-math-m5-b-8', 'code' => 'N.M5.B.8', 'name' => 'Estimating Probability Distributions Empirically']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Using Probability to Make Decisions',
                'skills' => [
                    ['id' => 'n-math-m5-c-1', 'code' => 'N.M5.C.1', 'name' => 'Games of Chance and Expected Value'],
                    ['id' => 'n-math-m5-c-2', 'code' => 'N.M5.C.2', 'name' => 'Games of Chance and Expected Value'],
                    ['id' => 'n-math-m5-c-3', 'code' => 'N.M5.C.3', 'name' => 'Using Expected Values to Compare Strategies'],
                    ['id' => 'n-math-m5-c-4', 'code' => 'N.M5.C.4', 'name' => 'Making Fair Decisions'],
                    ['id' => 'n-math-m5-c-5', 'code' => 'N.M5.C.5', 'name' => 'Fair Games'],
                    ['id' => 'n-math-m5-c-6', 'code' => 'N.M5.C.6', 'name' => 'Analyzing Decisions and Strategies Using Probability'],
                    ['id' => 'n-math-m5-c-7', 'code' => 'N.M5.C.7', 'name' => 'Analyzing Decisions and Strategies Using Probability']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>
