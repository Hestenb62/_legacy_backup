<?php
/**
 * Hesten's Learning - Level L (Grade 10 Geometry)
 * Full 117-lesson curriculum buildout aligned with EngageNY / Eureka Math.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?l-math-m1-a-1 or ?lesson=l-math-m1-a-1)
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
    $levelUrl = 'l.php';
    $levelTitle = 'Level L';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page-Specific Metadata
$pageTitle       = "10th Grade Level L | Hesten's Learning";
$pageDescription = "Geometry foundations, coordinate proofs, trigonometric ratios, 3D volume, and circle theorems for 10th-grade students.";
$pageKeywords    = "Grade 10, 10th Grade, Sophomore, Geometry, Proofs, Constructions, Trigonometry, Circles, Coordinate Geometry, Dilations";

// Template Variables
$themeColor = 'orange';
$levelId = 'l';
$levelTitle = 'Level L';
$gradeText = '10th Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Geometry foundations: mastering congruence, similarity, trigonometry, 3D volumes, and circle theorems.';

// Complete 117-Lesson Geometry Curriculum Data across Modules 1–5
$modules = [
    // Module 1
    [
        'title' => "Module 1: Congruence, Proof, and Constructions",
        'description' => "Congruence, proof, compass-and-straightedge constructions, rigid motions, and properties of geometric figures.",
        'topics' => [
            [
                'letter' => 'A',
                'name' => "Basic Constructions",
                'skills' => [
                    ['id' => 'l-math-m1-a-1', 'code' => 'L.M1.A.1', 'name' => 'Construct an Equilateral Triangle', 'url' => 'l.php?l-math-m1-a-1'],
                    ['id' => 'l-math-m1-a-2', 'code' => 'L.M1.A.2', 'name' => 'Construct an Equilateral Triangle', 'url' => 'l.php?l-math-m1-a-2'],
                    ['id' => 'l-math-m1-a-3', 'code' => 'L.M1.A.3', 'name' => 'Copy and Bisect an Angle', 'url' => 'l.php?l-math-m1-a-3'],
                    ['id' => 'l-math-m1-a-4', 'code' => 'L.M1.A.4', 'name' => 'Construct a Perpendicular Bisector', 'url' => 'l.php?l-math-m1-a-4'],
                    ['id' => 'l-math-m1-a-5', 'code' => 'L.M1.A.5', 'name' => 'Points of Concurrencies', 'url' => 'l.php?l-math-m1-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => "Unknown Angles",
                'skills' => [
                    ['id' => 'l-math-m1-b-1', 'code' => 'L.M1.B.1', 'name' => 'Solve for Unknown Angles—Angles and Lines at a Point', 'url' => 'l.php?l-math-m1-b-1'],
                    ['id' => 'l-math-m1-b-2', 'code' => 'L.M1.B.2', 'name' => 'Solve for Unknown Angles—Transversals', 'url' => 'l.php?l-math-m1-b-2'],
                    ['id' => 'l-math-m1-b-3', 'code' => 'L.M1.B.3', 'name' => 'Solve for Unknown Angles—Angles in a Triangle', 'url' => 'l.php?l-math-m1-b-3'],
                    ['id' => 'l-math-m1-b-4', 'code' => 'L.M1.B.4', 'name' => 'Unknown Angle Proofs—Writing Proofs', 'url' => 'l.php?l-math-m1-b-4'],
                    ['id' => 'l-math-m1-b-5', 'code' => 'L.M1.B.5', 'name' => 'Unknown Angle Proofs—Proofs with Constructions', 'url' => 'l.php?l-math-m1-b-5'],
                    ['id' => 'l-math-m1-b-6', 'code' => 'L.M1.B.6', 'name' => 'Unknown Angle Proofs—Proofs of Known Facts', 'url' => 'l.php?l-math-m1-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => "Transformations/Rigid Motions",
                'skills' => [
                    ['id' => 'l-math-m1-c-1', 'code' => 'L.M1.C.1', 'name' => 'Transformations—The Next Level', 'url' => 'l.php?l-math-m1-c-1'],
                    ['id' => 'l-math-m1-c-2', 'code' => 'L.M1.C.2', 'name' => 'Rotations', 'url' => 'l.php?l-math-m1-c-2'],
                    ['id' => 'l-math-m1-c-3', 'code' => 'L.M1.C.3', 'name' => 'Reflections', 'url' => 'l.php?l-math-m1-c-3'],
                    ['id' => 'l-math-m1-c-4', 'code' => 'L.M1.C.4', 'name' => 'Rotations, Reflections, and Symmetry', 'url' => 'l.php?l-math-m1-c-4'],
                    ['id' => 'l-math-m1-c-5', 'code' => 'L.M1.C.5', 'name' => 'Translations', 'url' => 'l.php?l-math-m1-c-5'],
                    ['id' => 'l-math-m1-c-6', 'code' => 'L.M1.C.6', 'name' => 'Characterize Points on a Perpendicular Bisector', 'url' => 'l.php?l-math-m1-c-6'],
                    ['id' => 'l-math-m1-c-7', 'code' => 'L.M1.C.7', 'name' => 'Looking More Carefully at Parallel Lines', 'url' => 'l.php?l-math-m1-c-7'],
                    ['id' => 'l-math-m1-c-8', 'code' => 'L.M1.C.8', 'name' => 'Construct and Apply a Sequence of Rigid Motions', 'url' => 'l.php?l-math-m1-c-8'],
                    ['id' => 'l-math-m1-c-9', 'code' => 'L.M1.C.9', 'name' => 'Applications of Congruence in Terms of Rigid Motions', 'url' => 'l.php?l-math-m1-c-9'],
                    ['id' => 'l-math-m1-c-10', 'code' => 'L.M1.C.10', 'name' => 'Correspondence and Transformations', 'url' => 'l.php?l-math-m1-c-10'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => "Congruence",
                'skills' => [
                    ['id' => 'l-math-m1-d-1', 'code' => 'L.M1.D.1', 'name' => 'Congruence Criteria for Triangles—SAS', 'url' => 'l.php?l-math-m1-d-1'],
                    ['id' => 'l-math-m1-d-2', 'code' => 'L.M1.D.2', 'name' => 'Base Angles of Isosceles Triangles', 'url' => 'l.php?l-math-m1-d-2'],
                    ['id' => 'l-math-m1-d-3', 'code' => 'L.M1.D.3', 'name' => 'Congruence Criteria for Triangles—ASA and SSS', 'url' => 'l.php?l-math-m1-d-3'],
                    ['id' => 'l-math-m1-d-4', 'code' => 'L.M1.D.4', 'name' => 'Congruence Criteria for Triangles—AAS and HL', 'url' => 'l.php?l-math-m1-d-4'],
                    ['id' => 'l-math-m1-d-5', 'code' => 'L.M1.D.5', 'name' => 'Triangle Congruency Proofs', 'url' => 'l.php?l-math-m1-d-5'],
                    ['id' => 'l-math-m1-d-6', 'code' => 'L.M1.D.6', 'name' => 'Triangle Congruency Proofs', 'url' => 'l.php?l-math-m1-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => "Proving Properties of Geometric Figures",
                'skills' => [
                    ['id' => 'l-math-m1-e-1', 'code' => 'L.M1.E.1', 'name' => 'Properties of Parallelograms', 'url' => 'l.php?l-math-m1-e-1'],
                    ['id' => 'l-math-m1-e-2', 'code' => 'L.M1.E.2', 'name' => 'Special Lines in Triangles', 'url' => 'l.php?l-math-m1-e-2'],
                    ['id' => 'l-math-m1-e-3', 'code' => 'L.M1.E.3', 'name' => 'Special Lines in Triangles', 'url' => 'l.php?l-math-m1-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => "Advanced Constructions",
                'skills' => [
                    ['id' => 'l-math-m1-f-1', 'code' => 'L.M1.F.1', 'name' => 'Construct a Square and a Nine-Point Circle', 'url' => 'l.php?l-math-m1-f-1'],
                    ['id' => 'l-math-m1-f-2', 'code' => 'L.M1.F.2', 'name' => 'Construct a Nine-Point Circle', 'url' => 'l.php?l-math-m1-f-2'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => "Axiomatic Systems",
                'skills' => [
                    ['id' => 'l-math-m1-g-1', 'code' => 'L.M1.G.1', 'name' => 'Review of the Assumptions', 'url' => 'l.php?l-math-m1-g-1'],
                    ['id' => 'l-math-m1-g-2', 'code' => 'L.M1.G.2', 'name' => 'Review of the Assumptions', 'url' => 'l.php?l-math-m1-g-2'],
                ]
            ],
        ]
    ],
    // Module 2
    [
        'title' => "Module 2: Similarity, Proof, and Trigonometry",
        'description' => "Scale drawings, dilations, similarity criteria (AA, SAS, SSS), right triangle similarity, and trigonometric ratios.",
        'topics' => [
            [
                'letter' => 'A',
                'name' => "Scale Drawings",
                'skills' => [
                    ['id' => 'l-math-m2-a-1', 'code' => 'L.M2.A.1', 'name' => 'Scale Drawings', 'url' => 'l.php?l-math-m2-a-1'],
                    ['id' => 'l-math-m2-a-2', 'code' => 'L.M2.A.2', 'name' => 'Making Scale Drawings Using the Ratio Method', 'url' => 'l.php?l-math-m2-a-2'],
                    ['id' => 'l-math-m2-a-3', 'code' => 'L.M2.A.3', 'name' => 'Making Scale Drawings Using the Parallel Method', 'url' => 'l.php?l-math-m2-a-3'],
                    ['id' => 'l-math-m2-a-4', 'code' => 'L.M2.A.4', 'name' => 'Comparing the Ratio Method with the Parallel Method', 'url' => 'l.php?l-math-m2-a-4'],
                    ['id' => 'l-math-m2-a-5', 'code' => 'L.M2.A.5', 'name' => 'Scale Factors', 'url' => 'l.php?l-math-m2-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => "Dilations",
                'skills' => [
                    ['id' => 'l-math-m2-b-1', 'code' => 'L.M2.B.1', 'name' => 'Dilations as Transformations of the Plane', 'url' => 'l.php?l-math-m2-b-1'],
                    ['id' => 'l-math-m2-b-2', 'code' => 'L.M2.B.2', 'name' => 'How Do Dilations Map Segments?', 'url' => 'l.php?l-math-m2-b-2'],
                    ['id' => 'l-math-m2-b-3', 'code' => 'L.M2.B.3', 'name' => 'How Do Dilations Map Lines, Rays, and Circles?', 'url' => 'l.php?l-math-m2-b-3'],
                    ['id' => 'l-math-m2-b-4', 'code' => 'L.M2.B.4', 'name' => 'How Do Dilations Map Angles?', 'url' => 'l.php?l-math-m2-b-4'],
                    ['id' => 'l-math-m2-b-5', 'code' => 'L.M2.B.5', 'name' => 'Dividing the King\'s Foot into 12 Equal Pieces', 'url' => 'l.php?l-math-m2-b-5'],
                    ['id' => 'l-math-m2-b-6', 'code' => 'L.M2.B.6', 'name' => 'Dilations from Different Centers', 'url' => 'l.php?l-math-m2-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => "Similarity and Dilations",
                'skills' => [
                    ['id' => 'l-math-m2-c-1', 'code' => 'L.M2.C.1', 'name' => 'What Are Similarity Transformations, and Why Do We Need Them?', 'url' => 'l.php?l-math-m2-c-1'],
                    ['id' => 'l-math-m2-c-2', 'code' => 'L.M2.C.2', 'name' => 'Properties of Similarity Transformations', 'url' => 'l.php?l-math-m2-c-2'],
                    ['id' => 'l-math-m2-c-3', 'code' => 'L.M2.C.3', 'name' => 'Similarity', 'url' => 'l.php?l-math-m2-c-3'],
                    ['id' => 'l-math-m2-c-4', 'code' => 'L.M2.C.4', 'name' => 'The Angle-Angle (AA) Criterion for Two Triangles to Be Similar', 'url' => 'l.php?l-math-m2-c-4'],
                    ['id' => 'l-math-m2-c-5', 'code' => 'L.M2.C.5', 'name' => 'Between-Figure and Within-Figure Ratios', 'url' => 'l.php?l-math-m2-c-5'],
                    ['id' => 'l-math-m2-c-6', 'code' => 'L.M2.C.6', 'name' => 'The Side-Angle-Side (SAS) and Side-Side-Side (SSS) Criteria for Two Triangles to Be Similar', 'url' => 'l.php?l-math-m2-c-6'],
                    ['id' => 'l-math-m2-c-7', 'code' => 'L.M2.C.7', 'name' => 'Similarity and the Angle Bisector Theorem', 'url' => 'l.php?l-math-m2-c-7'],
                    ['id' => 'l-math-m2-c-8', 'code' => 'L.M2.C.8', 'name' => 'Families of Parallel Lines and the Circumference of the Earth', 'url' => 'l.php?l-math-m2-c-8'],
                    ['id' => 'l-math-m2-c-9', 'code' => 'L.M2.C.9', 'name' => 'How Far Away Is the Moon?', 'url' => 'l.php?l-math-m2-c-9'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => "Applying Similarity to Right Triangles",
                'skills' => [
                    ['id' => 'l-math-m2-d-1', 'code' => 'L.M2.D.1', 'name' => 'Special Relationships Within Right Triangles—Dividing into Two Similar Sub-Triangles', 'url' => 'l.php?l-math-m2-d-1'],
                    ['id' => 'l-math-m2-d-2', 'code' => 'L.M2.D.2', 'name' => 'Multiplying and Dividing Expressions with Radicals', 'url' => 'l.php?l-math-m2-d-2'],
                    ['id' => 'l-math-m2-d-3', 'code' => 'L.M2.D.3', 'name' => 'Adding and Subtracting Expressions with Radicals', 'url' => 'l.php?l-math-m2-d-3'],
                    ['id' => 'l-math-m2-d-4', 'code' => 'L.M2.D.4', 'name' => 'Prove the Pythagorean Theorem Using Similarity', 'url' => 'l.php?l-math-m2-d-4'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => "Trigonometry",
                'skills' => [
                    ['id' => 'l-math-m2-e-1', 'code' => 'L.M2.E.1', 'name' => 'Incredibly Useful Ratios', 'url' => 'l.php?l-math-m2-e-1'],
                    ['id' => 'l-math-m2-e-2', 'code' => 'L.M2.E.2', 'name' => 'The Definition of Sine, Cosine, and Tangent', 'url' => 'l.php?l-math-m2-e-2'],
                    ['id' => 'l-math-m2-e-3', 'code' => 'L.M2.E.3', 'name' => 'Sine and Cosine of Complementary Angles and Special Angles', 'url' => 'l.php?l-math-m2-e-3'],
                    ['id' => 'l-math-m2-e-4', 'code' => 'L.M2.E.4', 'name' => 'Solving Problems Using Sine and Cosine', 'url' => 'l.php?l-math-m2-e-4'],
                    ['id' => 'l-math-m2-e-5', 'code' => 'L.M2.E.5', 'name' => 'Applying Tangents', 'url' => 'l.php?l-math-m2-e-5'],
                    ['id' => 'l-math-m2-e-6', 'code' => 'L.M2.E.6', 'name' => 'Trigonometry and the Pythagorean Theorem', 'url' => 'l.php?l-math-m2-e-6'],
                    ['id' => 'l-math-m2-e-7', 'code' => 'L.M2.E.7', 'name' => 'Using Trigonometry to Determine Area', 'url' => 'l.php?l-math-m2-e-7'],
                    ['id' => 'l-math-m2-e-8', 'code' => 'L.M2.E.8', 'name' => 'Using Trigonometry to Find Side Lengths of an Acute Triangle', 'url' => 'l.php?l-math-m2-e-8'],
                    ['id' => 'l-math-m2-e-9', 'code' => 'L.M2.E.9', 'name' => 'Applying the Laws of Sines and Cosines', 'url' => 'l.php?l-math-m2-e-9'],
                    ['id' => 'l-math-m2-e-10', 'code' => 'L.M2.E.10', 'name' => 'Unknown Angles', 'url' => 'l.php?l-math-m2-e-10'],
                ]
            ],
        ]
    ],
    // Module 3
    [
        'title' => "Module 3: Extending to Three Dimensions",
        'description' => "Area, surface area, Cavalieri's principle, and volume formulas for prisms, cylinders, pyramids, cones, and spheres.",
        'topics' => [
            [
                'letter' => 'A',
                'name' => "Area and Surface Area",
                'skills' => [
                    ['id' => 'l-math-m3-a-1', 'code' => 'L.M3.A.1', 'name' => 'What Is Area?', 'url' => 'l.php?l-math-m3-a-1'],
                    ['id' => 'l-math-m3-a-2', 'code' => 'L.M3.A.2', 'name' => 'Properties of Area', 'url' => 'l.php?l-math-m3-a-2'],
                    ['id' => 'l-math-m3-a-3', 'code' => 'L.M3.A.3', 'name' => 'The Scaling Principle for Area', 'url' => 'l.php?l-math-m3-a-3'],
                    ['id' => 'l-math-m3-a-4', 'code' => 'L.M3.A.4', 'name' => 'Proving the Area of a Disk', 'url' => 'l.php?l-math-m3-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => "Volume",
                'skills' => [
                    ['id' => 'l-math-m3-b-1', 'code' => 'L.M3.B.1', 'name' => 'Three-Dimensional Space', 'url' => 'l.php?l-math-m3-b-1'],
                    ['id' => 'l-math-m3-b-2', 'code' => 'L.M3.B.2', 'name' => 'General Prisms and Cylinders and Their Cross-Sections', 'url' => 'l.php?l-math-m3-b-2'],
                    ['id' => 'l-math-m3-b-3', 'code' => 'L.M3.B.3', 'name' => 'General Pyramids and Cones and TheirCross-Sections', 'url' => 'l.php?l-math-m3-b-3'],
                    ['id' => 'l-math-m3-b-4', 'code' => 'L.M3.B.4', 'name' => 'Definition and Properties of Volume', 'url' => 'l.php?l-math-m3-b-4'],
                    ['id' => 'l-math-m3-b-5', 'code' => 'L.M3.B.5', 'name' => 'Scaling Principle for Volumes', 'url' => 'l.php?l-math-m3-b-5'],
                    ['id' => 'l-math-m3-b-6', 'code' => 'L.M3.B.6', 'name' => 'The Volume of Prisms and Cylinders and Cavalieri\'s Principle', 'url' => 'l.php?l-math-m3-b-6'],
                    ['id' => 'l-math-m3-b-7', 'code' => 'L.M3.B.7', 'name' => 'The Volume Formula of a Pyramid and Cone', 'url' => 'l.php?l-math-m3-b-7'],
                    ['id' => 'l-math-m3-b-8', 'code' => 'L.M3.B.8', 'name' => 'The Volume Formula of a Sphere', 'url' => 'l.php?l-math-m3-b-8'],
                    ['id' => 'l-math-m3-b-9', 'code' => 'L.M3.B.9', 'name' => 'How Do 3D Printers Work?', 'url' => 'l.php?l-math-m3-b-9'],
                ]
            ],
        ]
    ],
    // Module 4
    [
        'title' => "Module 4: Connecting Algebra and Geometry Through Coordinates",
        'description' => "Analytic proofs on the Cartesian coordinate plane, parallel and perpendicular slopes, distance, and polygonal areas.",
        'topics' => [
            [
                'letter' => 'A',
                'name' => "Rectangular Coordinate System",
                'skills' => [
                    ['id' => 'l-math-m4-a-1', 'code' => 'L.M4.A.1', 'name' => 'Searching a Region in the Plane', 'url' => 'l.php?l-math-m4-a-1'],
                    ['id' => 'l-math-m4-a-2', 'code' => 'L.M4.A.2', 'name' => 'Finding Systems of Inequalities That Describe Triangular and Rectangular Regions', 'url' => 'l.php?l-math-m4-a-2'],
                    ['id' => 'l-math-m4-a-3', 'code' => 'L.M4.A.3', 'name' => 'Lines That Pass Through Regions', 'url' => 'l.php?l-math-m4-a-3'],
                    ['id' => 'l-math-m4-a-4', 'code' => 'L.M4.A.4', 'name' => 'Designing a Search Robot to Find a Beacon', 'url' => 'l.php?l-math-m4-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => "Perpendicular and Parallel Lines",
                'skills' => [
                    ['id' => 'l-math-m4-b-1', 'code' => 'L.M4.B.1', 'name' => 'Criterion for Perpendicularity', 'url' => 'l.php?l-math-m4-b-1'],
                    ['id' => 'l-math-m4-b-2', 'code' => 'L.M4.B.2', 'name' => 'Segments That Meet at Right Angles', 'url' => 'l.php?l-math-m4-b-2'],
                    ['id' => 'l-math-m4-b-3', 'code' => 'L.M4.B.3', 'name' => 'Equations for Lines Using Normal Segments', 'url' => 'l.php?l-math-m4-b-3'],
                    ['id' => 'l-math-m4-b-4', 'code' => 'L.M4.B.4', 'name' => 'Parallel and Perpendicular Lines', 'url' => 'l.php?l-math-m4-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => "Perimeters and Areas of Polygonal Regions in the Cartesian Plane",
                'skills' => [
                    ['id' => 'l-math-m4-c-1', 'code' => 'L.M4.C.1', 'name' => 'Perimeter and Area of Triangles in the Cartesian Plane', 'url' => 'l.php?l-math-m4-c-1'],
                    ['id' => 'l-math-m4-c-2', 'code' => 'L.M4.C.2', 'name' => 'Perimeter and Area of Polygonal Regions in the Cartesian Plane', 'url' => 'l.php?l-math-m4-c-2'],
                    ['id' => 'l-math-m4-c-3', 'code' => 'L.M4.C.3', 'name' => 'Perimeters and Areas of Polygonal Regions Defined by Systems of Inequalities', 'url' => 'l.php?l-math-m4-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => "Partitioning and Extending Segments and Algebraic Proofs",
                'skills' => [
                    ['id' => 'l-math-m4-d-1', 'code' => 'L.M4.D.1', 'name' => 'Dividing Segments Proportionately', 'url' => 'l.php?l-math-m4-d-1'],
                    ['id' => 'l-math-m4-d-2', 'code' => 'L.M4.D.2', 'name' => 'Analytic Proofs of Theorems Previously Proved by Synthetic Means', 'url' => 'l.php?l-math-m4-d-2'],
                    ['id' => 'l-math-m4-d-3', 'code' => 'L.M4.D.3', 'name' => 'Motion Along a Line—Search Robots Again', 'url' => 'l.php?l-math-m4-d-3'],
                    ['id' => 'l-math-m4-d-4', 'code' => 'L.M4.D.4', 'name' => 'The Distance from a Point to a Line', 'url' => 'l.php?l-math-m4-d-4'],
                ]
            ],
        ]
    ],
    // Module 5
    [
        'title' => "Module 5: Circles With and Without Coordinates",
        'description' => "Central and inscribed angles, arc length, sector area, secant and tangent properties, circle equations, and cyclic quadrilaterals.",
        'topics' => [
            [
                'letter' => 'A',
                'name' => "Central and Inscribed Angles",
                'skills' => [
                    ['id' => 'l-math-m5-a-1', 'code' => 'L.M5.A.1', 'name' => 'Thales\' Theorem', 'url' => 'l.php?l-math-m5-a-1'],
                    ['id' => 'l-math-m5-a-2', 'code' => 'L.M5.A.2', 'name' => 'Circles, Chords, Diameters, and Their Relationships', 'url' => 'l.php?l-math-m5-a-2'],
                    ['id' => 'l-math-m5-a-3', 'code' => 'L.M5.A.3', 'name' => 'Rectangles Inscribed in Circles', 'url' => 'l.php?l-math-m5-a-3'],
                    ['id' => 'l-math-m5-a-4', 'code' => 'L.M5.A.4', 'name' => 'Experiments with Inscribed Angles', 'url' => 'l.php?l-math-m5-a-4'],
                    ['id' => 'l-math-m5-a-5', 'code' => 'L.M5.A.5', 'name' => 'Inscribed Angle Theorem and Its Applications', 'url' => 'l.php?l-math-m5-a-5'],
                    ['id' => 'l-math-m5-a-6', 'code' => 'L.M5.A.6', 'name' => 'Unknown Angle Problems with Inscribed Angles in Circles', 'url' => 'l.php?l-math-m5-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => "Arcs and Sectors",
                'skills' => [
                    ['id' => 'l-math-m5-b-1', 'code' => 'L.M5.B.1', 'name' => 'The Angle Measure of an Arc', 'url' => 'l.php?l-math-m5-b-1'],
                    ['id' => 'l-math-m5-b-2', 'code' => 'L.M5.B.2', 'name' => 'Arcs and Chords', 'url' => 'l.php?l-math-m5-b-2'],
                    ['id' => 'l-math-m5-b-3', 'code' => 'L.M5.B.3', 'name' => 'Arc Length and Areas of Sectors', 'url' => 'l.php?l-math-m5-b-3'],
                    ['id' => 'l-math-m5-b-4', 'code' => 'L.M5.B.4', 'name' => 'Unknown Length and Area Problems', 'url' => 'l.php?l-math-m5-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => "Secants and Tangents",
                'skills' => [
                    ['id' => 'l-math-m5-c-1', 'code' => 'L.M5.C.1', 'name' => 'Properties of Tangents', 'url' => 'l.php?l-math-m5-c-1'],
                    ['id' => 'l-math-m5-c-2', 'code' => 'L.M5.C.2', 'name' => 'Tangent Segments', 'url' => 'l.php?l-math-m5-c-2'],
                    ['id' => 'l-math-m5-c-3', 'code' => 'L.M5.C.3', 'name' => 'The Inscribed Angle Alternate—A Tangent Angle', 'url' => 'l.php?l-math-m5-c-3'],
                    ['id' => 'l-math-m5-c-4', 'code' => 'L.M5.C.4', 'name' => 'Secant Lines; Secant Lines That Meet Inside a Circle', 'url' => 'l.php?l-math-m5-c-4'],
                    ['id' => 'l-math-m5-c-5', 'code' => 'L.M5.C.5', 'name' => 'Secant Angle Theorem, Exterior Case', 'url' => 'l.php?l-math-m5-c-5'],
                    ['id' => 'l-math-m5-c-6', 'code' => 'L.M5.C.6', 'name' => 'Similar Triangles in Circle-Secant (or Circle-Secant-Tangent) Diagrams', 'url' => 'l.php?l-math-m5-c-6'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => "Equations for Circles and Their Tangents",
                'skills' => [
                    ['id' => 'l-math-m5-d-1', 'code' => 'L.M5.D.1', 'name' => 'Writing the Equation for a Circle', 'url' => 'l.php?l-math-m5-d-1'],
                    ['id' => 'l-math-m5-d-2', 'code' => 'L.M5.D.2', 'name' => 'Recognizing Equations of Circles', 'url' => 'l.php?l-math-m5-d-2'],
                    ['id' => 'l-math-m5-d-3', 'code' => 'L.M5.D.3', 'name' => 'Equations for Tangent Lines to Circles', 'url' => 'l.php?l-math-m5-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => "Cyclic Quadrilaterals and Ptolemy's Theorem",
                'skills' => [
                    ['id' => 'l-math-m5-e-1', 'code' => 'L.M5.E.1', 'name' => 'Cyclic Quadrilaterals', 'url' => 'l.php?l-math-m5-e-1'],
                    ['id' => 'l-math-m5-e-2', 'code' => 'L.M5.E.2', 'name' => 'Ptolemy\'s Theorem', 'url' => 'l.php?l-math-m5-e-2'],
                ]
            ],
        ]
    ],
];

include '../src/level_template.php';
?>
