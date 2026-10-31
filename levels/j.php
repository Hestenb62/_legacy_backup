<?php
/**
 * Hesten's Learning - Level J (Grade 8)
 * Complete 122-lesson EngageNY / Eureka Math Pre-Algebra buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?j-math-m1-a-1 or ?lesson=j-math-m1-a-1)
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
    $levelUrl = 'j.php';
    $levelTitle = 'Level J';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "8th Grade Level J | Hesten's Learning";
$pageDescription = "Pre-Algebra, linear equations, functions, geometric transformations, and irrational numbers for 8th-grade students.";
$pageKeywords    = "Grade 8, 8th Grade, Pre-Algebra, linear equations, functions, Pythagorean Theorem, scientific notation, similarity, congruence";

// Template Variables
$themeColor = 'fuchsia';
$levelId = 'j';
$levelTitle = 'Level J';
$gradeText = '8th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Pre-Algebra concepts, linear equations, functions, and preparing for High School mathematics.';

$modules = [
    [
        'title' => 'Module 1: Integer Exponents and Scientific Notation',
        'description' => 'Exponential notation, laws of integer exponents, magnitude, scientific notation operations, and real-world scientific applications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Exponential Notation and Properties of Integer Exponents',
                'skills' => [
                    ['id' => 'j-math-m1-a-1', 'code' => 'J.M1.A.1', 'name' => 'Exponential Notation', 'url' => 'j.php?j-math-m1-a-1'],
                    ['id' => 'j-math-m1-a-2', 'code' => 'J.M1.A.2', 'name' => 'Multiplication of Numbers in Exponential Form', 'url' => 'j.php?j-math-m1-a-2'],
                    ['id' => 'j-math-m1-a-3', 'code' => 'J.M1.A.3', 'name' => 'Numbers in Exponential Form Raised to a Power', 'url' => 'j.php?j-math-m1-a-3'],
                    ['id' => 'j-math-m1-a-4', 'code' => 'J.M1.A.4', 'name' => 'Numbers Raised to the Zeroth Power', 'url' => 'j.php?j-math-m1-a-4'],
                    ['id' => 'j-math-m1-a-5', 'code' => 'J.M1.A.5', 'name' => 'Negative Exponents and the Laws of Exponents', 'url' => 'j.php?j-math-m1-a-5'],
                    ['id' => 'j-math-m1-a-6', 'code' => 'J.M1.A.6', 'name' => 'Proofs of Laws of Exponents', 'url' => 'j.php?j-math-m1-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Magnitude and Scientific Notation',
                'skills' => [
                    ['id' => 'j-math-m1-b-1', 'code' => 'J.M1.B.1', 'name' => 'Magnitude', 'url' => 'j.php?j-math-m1-b-1'],
                    ['id' => 'j-math-m1-b-2', 'code' => 'J.M1.B.2', 'name' => 'Estimating Quantities', 'url' => 'j.php?j-math-m1-b-2'],
                    ['id' => 'j-math-m1-b-3', 'code' => 'J.M1.B.3', 'name' => 'Scientific Notation', 'url' => 'j.php?j-math-m1-b-3'],
                    ['id' => 'j-math-m1-b-4', 'code' => 'J.M1.B.4', 'name' => 'Operations with Numbers in Scientific Notation', 'url' => 'j.php?j-math-m1-b-4'],
                    ['id' => 'j-math-m1-b-5', 'code' => 'J.M1.B.5', 'name' => 'Efficacy of Scientific Notation', 'url' => 'j.php?j-math-m1-b-5'],
                    ['id' => 'j-math-m1-b-6', 'code' => 'J.M1.B.6', 'name' => 'Choice of Unit', 'url' => 'j.php?j-math-m1-b-6'],
                    ['id' => 'j-math-m1-b-7', 'code' => 'J.M1.B.7', 'name' => 'Comparison of Numbers Written in Scientific Notation and Interpreting Scientific Notation Using Technology', 'url' => 'j.php?j-math-m1-b-7'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: The Concept of Congruence',
        'description' => 'Rigid motions (translations, reflections, rotations), congruence of two-dimensional figures, angles, transversals, and the Pythagorean Theorem.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Definitions and Properties of the Basic Rigid Motions',
                'skills' => [
                    ['id' => 'j-math-m2-a-1', 'code' => 'J.M2.A.1', 'name' => 'Why Move Things Around?', 'url' => 'j.php?j-math-m2-a-1'],
                    ['id' => 'j-math-m2-a-2', 'code' => 'J.M2.A.2', 'name' => 'Definition of Translation and Three Basic Properties', 'url' => 'j.php?j-math-m2-a-2'],
                    ['id' => 'j-math-m2-a-3', 'code' => 'J.M2.A.3', 'name' => 'Translating Lines', 'url' => 'j.php?j-math-m2-a-3'],
                    ['id' => 'j-math-m2-a-4', 'code' => 'J.M2.A.4', 'name' => 'Definition of Reflection and Basic Properties', 'url' => 'j.php?j-math-m2-a-4'],
                    ['id' => 'j-math-m2-a-5', 'code' => 'J.M2.A.5', 'name' => 'Definition of Rotation and Basic Properties', 'url' => 'j.php?j-math-m2-a-5'],
                    ['id' => 'j-math-m2-a-6', 'code' => 'J.M2.A.6', 'name' => 'Rotations of 180 Degrees', 'url' => 'j.php?j-math-m2-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Sequencing the Basic Rigid Motions',
                'skills' => [
                    ['id' => 'j-math-m2-b-1', 'code' => 'J.M2.B.1', 'name' => 'Sequencing Translations', 'url' => 'j.php?j-math-m2-b-1'],
                    ['id' => 'j-math-m2-b-2', 'code' => 'J.M2.B.2', 'name' => 'Sequencing Reflections and Translations', 'url' => 'j.php?j-math-m2-b-2'],
                    ['id' => 'j-math-m2-b-3', 'code' => 'J.M2.B.3', 'name' => 'Sequencing Rotations', 'url' => 'j.php?j-math-m2-b-3'],
                    ['id' => 'j-math-m2-b-4', 'code' => 'J.M2.B.4', 'name' => 'Sequences of Rigid Motions', 'url' => 'j.php?j-math-m2-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Congruence and Angle Relationships',
                'skills' => [
                    ['id' => 'j-math-m2-c-1', 'code' => 'J.M2.C.1', 'name' => 'Definition of Congruence and Some Basic Properties', 'url' => 'j.php?j-math-m2-c-1'],
                    ['id' => 'j-math-m2-c-2', 'code' => 'J.M2.C.2', 'name' => 'Angles Associated with Parallel Lines', 'url' => 'j.php?j-math-m2-c-2'],
                    ['id' => 'j-math-m2-c-3', 'code' => 'J.M2.C.3', 'name' => 'Angle Sum of a Triangle', 'url' => 'j.php?j-math-m2-c-3'],
                    ['id' => 'j-math-m2-c-4', 'code' => 'J.M2.C.4', 'name' => 'More on the Angles of a Triangle', 'url' => 'j.php?j-math-m2-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'The Pythagorean Theorem',
                'skills' => [
                    ['id' => 'j-math-m2-d-1', 'code' => 'J.M2.D.1', 'name' => 'Informal Proof of the Pythagorean Theorem', 'url' => 'j.php?j-math-m2-d-1'],
                    ['id' => 'j-math-m2-d-2', 'code' => 'J.M2.D.2', 'name' => 'Applications of the Pythagorean Theorem', 'url' => 'j.php?j-math-m2-d-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Similarity',
        'description' => 'Dilations, scale factors, coordinate rules for dilations, similarity transformations, properties of similar triangles, and angle-angle criterion.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Dilation',
                'skills' => [
                    ['id' => 'j-math-m3-a-1', 'code' => 'J.M3.A.1', 'name' => 'What Lies Behind "Same Shape"?', 'url' => 'j.php?j-math-m3-a-1'],
                    ['id' => 'j-math-m3-a-2', 'code' => 'J.M3.A.2', 'name' => 'Properties of Dilations', 'url' => 'j.php?j-math-m3-a-2'],
                    ['id' => 'j-math-m3-a-3', 'code' => 'J.M3.A.3', 'name' => 'Examples of Dilations', 'url' => 'j.php?j-math-m3-a-3'],
                    ['id' => 'j-math-m3-a-4', 'code' => 'J.M3.A.4', 'name' => 'Fundamental Theorem of Similarity (FTS)', 'url' => 'j.php?j-math-m3-a-4'],
                    ['id' => 'j-math-m3-a-5', 'code' => 'J.M3.A.5', 'name' => 'First Consequences of FTS', 'url' => 'j.php?j-math-m3-a-5'],
                    ['id' => 'j-math-m3-a-6', 'code' => 'J.M3.A.6', 'name' => 'Dilations on the Coordinate Plane', 'url' => 'j.php?j-math-m3-a-6'],
                    ['id' => 'j-math-m3-a-7', 'code' => 'J.M3.A.7', 'name' => 'Informal Proofs of Properties of Dilations', 'url' => 'j.php?j-math-m3-a-7'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Similar Figures',
                'skills' => [
                    ['id' => 'j-math-m3-b-1', 'code' => 'J.M3.B.1', 'name' => 'Similarity', 'url' => 'j.php?j-math-m3-b-1'],
                    ['id' => 'j-math-m3-b-2', 'code' => 'J.M3.B.2', 'name' => 'Basic Properties of Similarity', 'url' => 'j.php?j-math-m3-b-2'],
                    ['id' => 'j-math-m3-b-3', 'code' => 'J.M3.B.3', 'name' => 'Informal Proof of AA Criterion for Similarity', 'url' => 'j.php?j-math-m3-b-3'],
                    ['id' => 'j-math-m3-b-4', 'code' => 'J.M3.B.4', 'name' => 'More About Similar Triangles', 'url' => 'j.php?j-math-m3-b-4'],
                    ['id' => 'j-math-m3-b-5', 'code' => 'J.M3.B.5', 'name' => 'Modeling Using Similarity', 'url' => 'j.php?j-math-m3-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'The Pythagorean Theorem',
                'skills' => [
                    ['id' => 'j-math-m3-c-1', 'code' => 'J.M3.C.1', 'name' => 'Proof of the Pythagorean Theorem', 'url' => 'j.php?j-math-m3-c-1'],
                    ['id' => 'j-math-m3-c-2', 'code' => 'J.M3.C.2', 'name' => 'The Converse of the Pythagorean Theorem', 'url' => 'j.php?j-math-m3-c-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Linear Equations',
        'description' => 'Writing and solving linear equations in one variable, graphing two-variable linear equations, slope, rate of change, and systems of linear equations.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Writing and Solving Linear Equations',
                'skills' => [
                    ['id' => 'j-math-m4-a-1', 'code' => 'J.M4.A.1', 'name' => 'Writing Equations Using Symbols', 'url' => 'j.php?j-math-m4-a-1'],
                    ['id' => 'j-math-m4-a-2', 'code' => 'J.M4.A.2', 'name' => 'Linear and Nonlinear Expressions in x', 'url' => 'j.php?j-math-m4-a-2'],
                    ['id' => 'j-math-m4-a-3', 'code' => 'J.M4.A.3', 'name' => 'Linear Equations in x', 'url' => 'j.php?j-math-m4-a-3'],
                    ['id' => 'j-math-m4-a-4', 'code' => 'J.M4.A.4', 'name' => 'Solving a Linear Equation', 'url' => 'j.php?j-math-m4-a-4'],
                    ['id' => 'j-math-m4-a-5', 'code' => 'J.M4.A.5', 'name' => 'Writing and Solving Linear Equations', 'url' => 'j.php?j-math-m4-a-5'],
                    ['id' => 'j-math-m4-a-6', 'code' => 'J.M4.A.6', 'name' => 'Solutions of a Linear Equation', 'url' => 'j.php?j-math-m4-a-6'],
                    ['id' => 'j-math-m4-a-7', 'code' => 'J.M4.A.7', 'name' => 'Classification of Solutions', 'url' => 'j.php?j-math-m4-a-7'],
                    ['id' => 'j-math-m4-a-8', 'code' => 'J.M4.A.8', 'name' => 'Linear Equations in Disguise', 'url' => 'j.php?j-math-m4-a-8'],
                    ['id' => 'j-math-m4-a-9', 'code' => 'J.M4.A.9', 'name' => 'An Application of Linear Equations', 'url' => 'j.php?j-math-m4-a-9'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Linear Equations in Two Variables and Their Graphs',
                'skills' => [
                    ['id' => 'j-math-m4-b-1', 'code' => 'J.M4.B.1', 'name' => 'A Critical Look at Proportional Relationships', 'url' => 'j.php?j-math-m4-b-1'],
                    ['id' => 'j-math-m4-b-2', 'code' => 'J.M4.B.2', 'name' => 'Constant Rate', 'url' => 'j.php?j-math-m4-b-2'],
                    ['id' => 'j-math-m4-b-3', 'code' => 'J.M4.B.3', 'name' => 'Linear Equations in Two Variables', 'url' => 'j.php?j-math-m4-b-3'],
                    ['id' => 'j-math-m4-b-4', 'code' => 'J.M4.B.4', 'name' => 'The Graph of a Linear Equation in Two Variables', 'url' => 'j.php?j-math-m4-b-4'],
                    ['id' => 'j-math-m4-b-5', 'code' => 'J.M4.B.5', 'name' => 'The Graph of a Linear Equation—Horizontal and Vertical Lines', 'url' => 'j.php?j-math-m4-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Slope and Equations of Lines',
                'skills' => [
                    ['id' => 'j-math-m4-c-1', 'code' => 'J.M4.C.1', 'name' => 'The Slope of a Non-Vertical Line', 'url' => 'j.php?j-math-m4-c-1'],
                    ['id' => 'j-math-m4-c-2', 'code' => 'J.M4.C.2', 'name' => 'The Computation of the Slope of a Non-Vertical Line', 'url' => 'j.php?j-math-m4-c-2'],
                    ['id' => 'j-math-m4-c-3', 'code' => 'J.M4.C.3', 'name' => 'The Line Joining Two Distinct Points of the Graph y=mx+b Has Slope m', 'url' => 'j.php?j-math-m4-c-3'],
                    ['id' => 'j-math-m4-c-4', 'code' => 'J.M4.C.4', 'name' => 'There Is Only One Line Passing Through a Given Point with a Given Slope', 'url' => 'j.php?j-math-m4-c-4'],
                    ['id' => 'j-math-m4-c-5', 'code' => 'J.M4.C.5', 'name' => 'The Graph of a Linear Equation in Two Variables Is a Line', 'url' => 'j.php?j-math-m4-c-5'],
                    ['id' => 'j-math-m4-c-6', 'code' => 'J.M4.C.6', 'name' => 'Every Line Is a Graph of a Linear Equation', 'url' => 'j.php?j-math-m4-c-6'],
                    ['id' => 'j-math-m4-c-7', 'code' => 'J.M4.C.7', 'name' => 'Some Facts About Graphs of Linear Equations in Two Variables', 'url' => 'j.php?j-math-m4-c-7'],
                    ['id' => 'j-math-m4-c-8', 'code' => 'J.M4.C.8', 'name' => 'Constant Rates Revisited', 'url' => 'j.php?j-math-m4-c-8'],
                    ['id' => 'j-math-m4-c-9', 'code' => 'J.M4.C.9', 'name' => 'The Defining Equation of a Line', 'url' => 'j.php?j-math-m4-c-9'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Systems of Linear Equations and Their Solutions',
                'skills' => [
                    ['id' => 'j-math-m4-d-1', 'code' => 'J.M4.D.1', 'name' => 'Introduction to Simultaneous Equations', 'url' => 'j.php?j-math-m4-d-1'],
                    ['id' => 'j-math-m4-d-2', 'code' => 'J.M4.D.2', 'name' => 'Geometric Interpretation of the Solutions of a Linear System', 'url' => 'j.php?j-math-m4-d-2'],
                    ['id' => 'j-math-m4-d-3', 'code' => 'J.M4.D.3', 'name' => 'Characterization of Parallel Lines', 'url' => 'j.php?j-math-m4-d-3'],
                    ['id' => 'j-math-m4-d-4', 'code' => 'J.M4.D.4', 'name' => 'Nature of Solutions of a System of Linear Equations', 'url' => 'j.php?j-math-m4-d-4'],
                    ['id' => 'j-math-m4-d-5', 'code' => 'J.M4.D.5', 'name' => 'Another Computational Method of Solving a Linear System', 'url' => 'j.php?j-math-m4-d-5'],
                    ['id' => 'j-math-m4-d-6', 'code' => 'J.M4.D.6', 'name' => 'Word Problems', 'url' => 'j.php?j-math-m4-d-6'],
                    ['id' => 'j-math-m4-d-7', 'code' => 'J.M4.D.7', 'name' => 'Conversion Between Celsius and Fahrenheit', 'url' => 'j.php?j-math-m4-d-7'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Pythagorean Theorem and Systems Applications',
                'skills' => [
                    ['id' => 'j-math-m4-e-1', 'code' => 'J.M4.E.1', 'name' => 'System of Equations Leading to Pythagorean Triples', 'url' => 'j.php?j-math-m4-e-1'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Examples of Functions from Geometry',
        'description' => 'Concept of functions, input-output mappings, linear vs nonlinear functions, graphs of functions, and volumes of cones, cylinders, and spheres.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Functions',
                'skills' => [
                    ['id' => 'j-math-m5-a-1', 'code' => 'J.M5.A.1', 'name' => 'The Concept of a Function', 'url' => 'j.php?j-math-m5-a-1'],
                    ['id' => 'j-math-m5-a-2', 'code' => 'J.M5.A.2', 'name' => 'Formal Definition of a Function', 'url' => 'j.php?j-math-m5-a-2'],
                    ['id' => 'j-math-m5-a-3', 'code' => 'J.M5.A.3', 'name' => 'Linear Functions and Proportionality', 'url' => 'j.php?j-math-m5-a-3'],
                    ['id' => 'j-math-m5-a-4', 'code' => 'J.M5.A.4', 'name' => 'More Examples of Functions', 'url' => 'j.php?j-math-m5-a-4'],
                    ['id' => 'j-math-m5-a-5', 'code' => 'J.M5.A.5', 'name' => 'Graphs of Functions and Equations', 'url' => 'j.php?j-math-m5-a-5'],
                    ['id' => 'j-math-m5-a-6', 'code' => 'J.M5.A.6', 'name' => 'Graphs of Linear Functions and Rate of Change', 'url' => 'j.php?j-math-m5-a-6'],
                    ['id' => 'j-math-m5-a-7', 'code' => 'J.M5.A.7', 'name' => 'Comparing Linear Functions and Graphs', 'url' => 'j.php?j-math-m5-a-7'],
                    ['id' => 'j-math-m5-a-8', 'code' => 'J.M5.A.8', 'name' => 'Graphs of Simple Nonlinear Functions', 'url' => 'j.php?j-math-m5-a-8'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Volume',
                'skills' => [
                    ['id' => 'j-math-m5-b-1', 'code' => 'J.M5.B.1', 'name' => 'Examples of Functions from Geometry', 'url' => 'j.php?j-math-m5-b-1'],
                    ['id' => 'j-math-m5-b-2', 'code' => 'J.M5.B.2', 'name' => 'Volumes of Familiar Solids―Cones and Cylinders', 'url' => 'j.php?j-math-m5-b-2'],
                    ['id' => 'j-math-m5-b-3', 'code' => 'J.M5.B.3', 'name' => 'Volume of a Sphere', 'url' => 'j.php?j-math-m5-b-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Linear Functions',
        'description' => 'Modeling linear relationships, bivariate numerical data, scatter plots, lines of best fit, linear vs nonlinear patterns, and two-way frequency tables.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Linear Functions',
                'skills' => [
                    ['id' => 'j-math-m6-a-1', 'code' => 'J.M6.A.1', 'name' => 'Modeling Linear Relationships', 'url' => 'j.php?j-math-m6-a-1'],
                    ['id' => 'j-math-m6-a-2', 'code' => 'J.M6.A.2', 'name' => 'Interpreting Rate of Change and Initial Value', 'url' => 'j.php?j-math-m6-a-2'],
                    ['id' => 'j-math-m6-a-3', 'code' => 'J.M6.A.3', 'name' => 'Representations of a Line', 'url' => 'j.php?j-math-m6-a-3'],
                    ['id' => 'j-math-m6-a-4', 'code' => 'J.M6.A.4', 'name' => 'Increasing and Decreasing Functions', 'url' => 'j.php?j-math-m6-a-4'],
                    ['id' => 'j-math-m6-a-5', 'code' => 'J.M6.A.5', 'name' => 'Increasing and Decreasing Functions', 'url' => 'j.php?j-math-m6-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Bivariate Numerical Data',
                'skills' => [
                    ['id' => 'j-math-m6-b-1', 'code' => 'J.M6.B.1', 'name' => 'Scatter Plots', 'url' => 'j.php?j-math-m6-b-1'],
                    ['id' => 'j-math-m6-b-2', 'code' => 'J.M6.B.2', 'name' => 'Patterns in Scatter Plots', 'url' => 'j.php?j-math-m6-b-2'],
                    ['id' => 'j-math-m6-b-3', 'code' => 'J.M6.B.3', 'name' => 'Informally Fitting a Line', 'url' => 'j.php?j-math-m6-b-3'],
                    ['id' => 'j-math-m6-b-4', 'code' => 'J.M6.B.4', 'name' => 'Determining the Equation of a Line Fit to Data', 'url' => 'j.php?j-math-m6-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Linear and Nonlinear Models',
                'skills' => [
                    ['id' => 'j-math-m6-c-1', 'code' => 'J.M6.C.1', 'name' => 'Linear Models', 'url' => 'j.php?j-math-m6-c-1'],
                    ['id' => 'j-math-m6-c-2', 'code' => 'J.M6.C.2', 'name' => 'Using Linear Models in a Data Context', 'url' => 'j.php?j-math-m6-c-2'],
                    ['id' => 'j-math-m6-c-3', 'code' => 'J.M6.C.3', 'name' => 'Nonlinear Models in a Data Context (Optional)', 'url' => 'j.php?j-math-m6-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Bivariate Categorical Data',
                'skills' => [
                    ['id' => 'j-math-m6-d-1', 'code' => 'J.M6.D.1', 'name' => 'Summarizing Bivariate Categorical Data in a Two-Way Table', 'url' => 'j.php?j-math-m6-d-1'],
                    ['id' => 'j-math-m6-d-2', 'code' => 'J.M6.D.2', 'name' => 'Association Between Categorical Variables', 'url' => 'j.php?j-math-m6-d-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 7: Introduction to Irrational Numbers Using Geometry',
        'description' => 'Square and cube roots, decimal expansions of rational and irrational numbers, Pythagorean Theorem proofs, distance on coordinate plane, and radical applications.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Square and Cube Roots',
                'skills' => [
                    ['id' => 'j-math-m7-a-1', 'code' => 'J.M7.A.1', 'name' => 'The Pythagorean Theorem', 'url' => 'j.php?j-math-m7-a-1'],
                    ['id' => 'j-math-m7-a-2', 'code' => 'J.M7.A.2', 'name' => 'Square Roots', 'url' => 'j.php?j-math-m7-a-2'],
                    ['id' => 'j-math-m7-a-3', 'code' => 'J.M7.A.3', 'name' => 'Existence and Uniqueness of Square Roots and Cube Roots', 'url' => 'j.php?j-math-m7-a-3'],
                    ['id' => 'j-math-m7-a-4', 'code' => 'J.M7.A.4', 'name' => 'Simplifying Square Roots', 'url' => 'j.php?j-math-m7-a-4'],
                    ['id' => 'j-math-m7-a-5', 'code' => 'J.M7.A.5', 'name' => 'Solving Equations with Radicals', 'url' => 'j.php?j-math-m7-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Decimal Expansions of Numbers',
                'skills' => [
                    ['id' => 'j-math-m7-b-1', 'code' => 'J.M7.B.1', 'name' => 'Finite and Infinite Decimals', 'url' => 'j.php?j-math-m7-b-1'],
                    ['id' => 'j-math-m7-b-2', 'code' => 'J.M7.B.2', 'name' => 'Infinite Decimals', 'url' => 'j.php?j-math-m7-b-2'],
                    ['id' => 'j-math-m7-b-3', 'code' => 'J.M7.B.3', 'name' => 'The Long Division Algorithm', 'url' => 'j.php?j-math-m7-b-3'],
                    ['id' => 'j-math-m7-b-4', 'code' => 'J.M7.B.4', 'name' => 'Decimal Expansions of Fractions, Part 1', 'url' => 'j.php?j-math-m7-b-4'],
                    ['id' => 'j-math-m7-b-5', 'code' => 'J.M7.B.5', 'name' => 'Converting Repeating Decimals to Fractions', 'url' => 'j.php?j-math-m7-b-5'],
                    ['id' => 'j-math-m7-b-6', 'code' => 'J.M7.B.6', 'name' => 'The Decimal Expansion of Some Irrational Numbers', 'url' => 'j.php?j-math-m7-b-6'],
                    ['id' => 'j-math-m7-b-7', 'code' => 'J.M7.B.7', 'name' => 'Decimal Expansions of Fractions, Part 2', 'url' => 'j.php?j-math-m7-b-7'],
                    ['id' => 'j-math-m7-b-8', 'code' => 'J.M7.B.8', 'name' => 'Comparing Irrational Numbers', 'url' => 'j.php?j-math-m7-b-8'],
                    ['id' => 'j-math-m7-b-9', 'code' => 'J.M7.B.9', 'name' => 'Decimal Expansion of π', 'url' => 'j.php?j-math-m7-b-9'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'The Pythagorean Theorem',
                'skills' => [
                    ['id' => 'j-math-m7-c-1', 'code' => 'J.M7.C.1', 'name' => 'Pythagorean Theorem, Revisited', 'url' => 'j.php?j-math-m7-c-1'],
                    ['id' => 'j-math-m7-c-2', 'code' => 'J.M7.C.2', 'name' => 'Converse of the Pythagorean Theorem', 'url' => 'j.php?j-math-m7-c-2'],
                    ['id' => 'j-math-m7-c-3', 'code' => 'J.M7.C.3', 'name' => 'Distance on the Coordinate Plane', 'url' => 'j.php?j-math-m7-c-3'],
                    ['id' => 'j-math-m7-c-4', 'code' => 'J.M7.C.4', 'name' => 'Applications of the Pythagorean Theorem', 'url' => 'j.php?j-math-m7-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Applications of Radicals and Roots',
                'skills' => [
                    ['id' => 'j-math-m7-d-1', 'code' => 'J.M7.D.1', 'name' => 'Cones and Spheres', 'url' => 'j.php?j-math-m7-d-1'],
                    ['id' => 'j-math-m7-d-2', 'code' => 'J.M7.D.2', 'name' => 'Truncated Cones', 'url' => 'j.php?j-math-m7-d-2'],
                    ['id' => 'j-math-m7-d-3', 'code' => 'J.M7.D.3', 'name' => 'Volume of Composite Solids', 'url' => 'j.php?j-math-m7-d-3'],
                    ['id' => 'j-math-m7-d-4', 'code' => 'J.M7.D.4', 'name' => 'Average Rate of Change', 'url' => 'j.php?j-math-m7-d-4'],
                    ['id' => 'j-math-m7-d-5', 'code' => 'J.M7.D.5', 'name' => 'Nonlinear Motion', 'url' => 'j.php?j-math-m7-d-5'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
