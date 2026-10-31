<?php
/**
 * Hesten's Learning - Level E (3rd Grade)
 * Complete EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?e-math-m1-a-1 or ?lesson=e-math-m1-a-1)
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
    $levelUrl = 'e.php';
    $levelTitle = 'Level E';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "3rd Grade Level E | Hesten's Learning";
$pageDescription = "Multiplication, division, fractions as numbers, area, and two-dimensional shapes.";
$pageKeywords    = "3rd Grade, elementary math, EngageNY, Eureka Math, problem sets, worksheets";

// Template Variables
$themeColor = 'yellow';
$levelId = 'e';
$levelTitle = 'Level E';
$gradeText = '3rd Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Multiplication, division, fractions as numbers, area, and two-dimensional shapes.';

$modules = [
    [
        'title' => 'Module 1: Properties of Multiplication and Division and Solving Problems with Units of 2–5 and 10',
        'description' => 'Module 1: Properties of Multiplication and Division and Solving Problems with Units of 2–5 and 10 for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m1-a-1', 'code' => 'E.M1.A.1', 'name' => 'Understand equal groups of as multiplication.', 'url' => 'e.php?e-math-m1-a-1'],
                    ['id' => 'e-math-m1-a-2', 'code' => 'E.M1.A.2', 'name' => 'Relate multiplication to the array model.', 'url' => 'e.php?e-math-m1-a-2'],
                    ['id' => 'e-math-m1-a-3', 'code' => 'E.M1.A.3', 'name' => 'Interpret the meaning of factors—the size of the group or the number of groups.', 'url' => 'e.php?e-math-m1-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m1-b-1', 'code' => 'E.M1.B.1', 'name' => 'Understand the meaning of the unknown as the size of the group in division.', 'url' => 'e.php?e-math-m1-b-1'],
                    ['id' => 'e-math-m1-b-2', 'code' => 'E.M1.B.2', 'name' => 'Understand the meaning of the unknown as the number of groups in division.', 'url' => 'e.php?e-math-m1-b-2'],
                    ['id' => 'e-math-m1-b-3', 'code' => 'E.M1.B.3', 'name' => 'Interpret the unknown in division using the array model.', 'url' => 'e.php?e-math-m1-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'e-math-m1-c-1', 'code' => 'E.M1.C.1', 'name' => 'Demonstrate the commutativity of multiplication, and practice related facts by skip-counting...', 'url' => 'e.php?e-math-m1-c-1'],
                    ['id' => 'e-math-m1-c-2', 'code' => 'E.M1.C.2', 'name' => 'Demonstrate the commutativity of multiplication, and practice related facts by skip-counting...', 'url' => 'e.php?e-math-m1-c-2'],
                    ['id' => 'e-math-m1-c-3', 'code' => 'E.M1.C.3', 'name' => 'Find related multiplication facts by adding and subtracting equal groups in array models.', 'url' => 'e.php?e-math-m1-c-3'],
                    ['id' => 'e-math-m1-c-4', 'code' => 'E.M1.C.4', 'name' => 'Model the distributive property with arrays to decompose units as a strategy to multiply.', 'url' => 'e.php?e-math-m1-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'e-math-m1-d-1', 'code' => 'E.M1.D.1', 'name' => 'Model division as the unknown factor in multiplication using arrays and tape diagrams.', 'url' => 'e.php?e-math-m1-d-1'],
                    ['id' => 'e-math-m1-d-2', 'code' => 'E.M1.D.2', 'name' => 'Interpret the quotient as the number of groups or the number of objects in each group using ...', 'url' => 'e.php?e-math-m1-d-2'],
                    ['id' => 'e-math-m1-d-3', 'code' => 'E.M1.D.3', 'name' => 'Interpret the quotient as the number of groups or the number of objects in each group using ...', 'url' => 'e.php?e-math-m1-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E begins by introducing students to multiplication by 4 through skip-counting objects in array models in Lesson 14.  Students revisit the commutative property in Lesson 15, this time modeling commutativity using both arrays and tape diagrams.  For example, students might initially draw a 2 × 4 array and a 4 × 2 array.  Then, they see 2 bars of equal length, one with 4 equal parts and the other with 2 equal parts.  Now, they have arrays that show (2 × 4) = (4 × 2), as well as tape diagrams that reflect the equality.  In Lesson 16, students examine the distributive property in greater depth.  This lesson introduces the 5 + n pattern as a strategy for finding unknown facts involving 4.  For example, students know that 4 × 5 is 20, so 4 × 6 is the same as 20 + 4 more, which totals 24.  By Lesson 17, practice of multiplication and division facts is dedicated to modeling the relationship between operations using facts of 4.',
                'skills' => [
                    ['id' => 'e-math-m1-e-1', 'code' => 'E.M1.E.1', 'name' => 'Skip-count objects in models to build fluency with multiplication facts using units of 4.', 'url' => 'e.php?e-math-m1-e-1'],
                    ['id' => 'e-math-m1-e-2', 'code' => 'E.M1.E.2', 'name' => 'Relate arrays to tape diagrams to model the commutative property of multiplication.', 'url' => 'e.php?e-math-m1-e-2'],
                    ['id' => 'e-math-m1-e-3', 'code' => 'E.M1.E.3', 'name' => 'Use the distributive property as a strategy to find related multiplication facts.', 'url' => 'e.php?e-math-m1-e-3'],
                    ['id' => 'e-math-m1-e-4', 'code' => 'E.M1.E.4', 'name' => 'Model the relationship between multiplication and division.', 'url' => 'e.php?e-math-m1-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F introduces the factors 5 and 10, familiar from skip-counting in Grade 2.  Students apply the multiplication and division strategies they have learned to mixed practice with all of the factors included in Module 1.  Students model relationships between factors and decompose numbers as they further explore the relationship between multiplication and division.  This culminates in Lessons 18 and 19 as students decompose the dividend in a division sentence to practice the distributive property with division.  For example, students decompose 28  4 as (20  4) + (8  4) = 5 + 2 = 7.  In the final lessons of the module, students apply the tools, representations, and concepts they have learned to solve multi-step word problems.  They demonstrate the flexibility of their thinking as they assess the reasonableness of their answers for a variety of problem types.  Lesson 20 focuses on word problems involving multiplication and division, while Lesson 21 increases the complexity of problem solving by including word problems involving all four operations.',
                'skills' => [
                    ['id' => 'e-math-m1-f-1', 'code' => 'E.M1.F.1', 'name' => 'Apply the distributive property to decompose units.', 'url' => 'e.php?e-math-m1-f-1'],
                    ['id' => 'e-math-m1-f-2', 'code' => 'E.M1.F.2', 'name' => 'Apply the distributive property to decompose units.', 'url' => 'e.php?e-math-m1-f-2'],
                    ['id' => 'e-math-m1-f-3', 'code' => 'E.M1.F.3', 'name' => 'Solve two-step word problems involving multiplication and division, and assess the reasonabl...', 'url' => 'e.php?e-math-m1-f-3'],
                    ['id' => 'e-math-m1-f-4', 'code' => 'E.M1.F.4', 'name' => 'Solve two-step word problems involving all four operations, and assess the reasonableness of...', 'url' => 'e.php?e-math-m1-f-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Place Value and Problem Solving with Units of Measure',
        'description' => 'Module 2: Place Value and Problem Solving with Units of Measure for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m2-a-1', 'code' => 'E.M2.A.1', 'name' => 'Explore time as a continuous measurement using a stopwatch.', 'url' => 'e.php?e-math-m2-a-1'],
                    ['id' => 'e-math-m2-a-2', 'code' => 'E.M2.A.2', 'name' => 'Relate skip-counting by fives on the clock and telling time to a continuous measurement mode...', 'url' => 'e.php?e-math-m2-a-2'],
                    ['id' => 'e-math-m2-a-3', 'code' => 'E.M2.A.3', 'name' => 'Count by fives and ones on the number line as a strategy to tell time to the nearest minute ...', 'url' => 'e.php?e-math-m2-a-3'],
                    ['id' => 'e-math-m2-a-4', 'code' => 'E.M2.A.4', 'name' => 'Solve word problems involving time intervals within 1 hour by counting backward and forward ...', 'url' => 'e.php?e-math-m2-a-4'],
                    ['id' => 'e-math-m2-a-5', 'code' => 'E.M2.A.5', 'name' => 'Solve word problems involving time intervals within 1 hour by adding and subtracting on the ...', 'url' => 'e.php?e-math-m2-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m2-b-1', 'code' => 'E.M2.B.1', 'name' => 'Build and decompose a kilogram to reason about the size and weight of 1 kilogram, 100 grams,...', 'url' => 'e.php?e-math-m2-b-1'],
                    ['id' => 'e-math-m2-b-2', 'code' => 'E.M2.B.2', 'name' => 'Develop estimation strategies by reasoning about the weight in kilograms of a series of fami...', 'url' => 'e.php?e-math-m2-b-2'],
                    ['id' => 'e-math-m2-b-3', 'code' => 'E.M2.B.3', 'name' => 'Solve one-step word problems involving metric weights within 100 and estimate to reason abou...', 'url' => 'e.php?e-math-m2-b-3'],
                    ['id' => 'e-math-m2-b-4', 'code' => 'E.M2.B.4', 'name' => 'Decompose a liter to reason about the size of 1 liter, 100 milliliters, 10 milliliters, and ...', 'url' => 'e.php?e-math-m2-b-4'],
                    ['id' => 'e-math-m2-b-5', 'code' => 'E.M2.B.5', 'name' => 'Estimate and measure liquid volume in liters and milliliters using the vertical number line.', 'url' => 'e.php?e-math-m2-b-5'],
                    ['id' => 'e-math-m2-b-6', 'code' => 'E.M2.B.6', 'name' => 'Solve mixed word problems involving all four operations with grams, kilograms, liters, and m...', 'url' => 'e.php?e-math-m2-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C builds on students’ Grade 2 work with comparing numbers according to the value of digits in the hundreds, tens, and ones places (2.NBT.4).  Lesson 12 formally introduces rounding two-digit numbers to the nearest ten.  Rounding to the leftmost unit usually presents the least challenging type of estimate for students, and so here the sequence begins.  Students measure two-digit intervals of minutes and metric measurements, and then use place value understanding to round.  They understand that when moving to the right across the places in a number, the digits represent smaller units.  Intervals of minutes and metric measurements provide natural contexts for estimation.  The number line, presented vertically, provides a new perspective on a familiar tool.',
                'skills' => [
                    ['id' => 'e-math-m2-c-1', 'code' => 'E.M2.C.1', 'name' => 'Round two-digit measurements to the nearest ten on the vertical number line.', 'url' => 'e.php?e-math-m2-c-1'],
                    ['id' => 'e-math-m2-c-2', 'code' => 'E.M2.C.2', 'name' => 'Round two- and three-digit numbers to the nearest ten on the vertical number line.', 'url' => 'e.php?e-math-m2-c-2'],
                    ['id' => 'e-math-m2-c-3', 'code' => 'E.M2.C.3', 'name' => 'Round to the nearest hundred on the vertical number line.', 'url' => 'e.php?e-math-m2-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'e-math-m2-d-1', 'code' => 'E.M2.D.1', 'name' => 'Add measurements using the standard algorithm to compose larger units once.', 'url' => 'e.php?e-math-m2-d-1'],
                    ['id' => 'e-math-m2-d-2', 'code' => 'E.M2.D.2', 'name' => 'Add measurements using the standard algorithm to compose larger units twice.', 'url' => 'e.php?e-math-m2-d-2'],
                    ['id' => 'e-math-m2-d-3', 'code' => 'E.M2.D.3', 'name' => 'Estimate sums by rounding and apply to solve measurement word problems.', 'url' => 'e.php?e-math-m2-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'e-math-m2-e-1', 'code' => 'E.M2.E.1', 'name' => 'Decompose once to subtract measurements including three-digit minuends with zeros in the ten...', 'url' => 'e.php?e-math-m2-e-1'],
                    ['id' => 'e-math-m2-e-2', 'code' => 'E.M2.E.2', 'name' => 'Decompose twice to subtract measurements including three-digit minuends with zeros in the te...', 'url' => 'e.php?e-math-m2-e-2'],
                    ['id' => 'e-math-m2-e-3', 'code' => 'E.M2.E.3', 'name' => 'Estimate differences by rounding and apply to solve measurement word problems.', 'url' => 'e.php?e-math-m2-e-3'],
                    ['id' => 'e-math-m2-e-4', 'code' => 'E.M2.E.4', 'name' => 'Estimate sums and differences of measurements by rounding, and then solve mixed word problems.', 'url' => 'e.php?e-math-m2-e-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Multiplication and Division with Units of 0, 1, 6–9, and Multiples of 10',
        'description' => 'Module 3: Multiplication and Division with Units of 0, 1, 6–9, and Multiples of 10 for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m3-a-1', 'code' => 'E.M3.A.1', 'name' => 'Study commutativity to find known facts of 6, 7, 8, and 9.', 'url' => 'e.php?e-math-m3-a-1'],
                    ['id' => 'e-math-m3-a-2', 'code' => 'E.M3.A.2', 'name' => 'Apply the distributive and commutative properties to relate multiplication facts 5 \times n ...', 'url' => 'e.php?e-math-m3-a-2'],
                    ['id' => 'e-math-m3-a-3', 'code' => 'E.M3.A.3', 'name' => 'Multiply and divide with familiar facts using a letter to represent the unknown.', 'url' => 'e.php?e-math-m3-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m3-b-1', 'code' => 'E.M3.B.1', 'name' => 'Count by units of 6 to multiply and divide using number bonds to decompose.', 'url' => 'e.php?e-math-m3-b-1'],
                    ['id' => 'e-math-m3-b-2', 'code' => 'E.M3.B.2', 'name' => 'Count by units of 7 to multiply and divide using number bonds to decompose.', 'url' => 'e.php?e-math-m3-b-2'],
                    ['id' => 'e-math-m3-b-3', 'code' => 'E.M3.B.3', 'name' => 'Use the distributive property as a strategy to multiply and divide using units of 6 and 7.', 'url' => 'e.php?e-math-m3-b-3'],
                    ['id' => 'e-math-m3-b-4', 'code' => 'E.M3.B.4', 'name' => 'Interpret the unknown in multiplication and division to model and solve problems using units...', 'url' => 'e.php?e-math-m3-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'e-math-m3-c-1', 'code' => 'E.M3.C.1', 'name' => 'Understand the function of parentheses and apply to solving problems.', 'url' => 'e.php?e-math-m3-c-1'],
                    ['id' => 'e-math-m3-c-2', 'code' => 'E.M3.C.2', 'name' => 'Model the associative property as a strategy to multiply.', 'url' => 'e.php?e-math-m3-c-2'],
                    ['id' => 'e-math-m3-c-3', 'code' => 'E.M3.C.3', 'name' => 'Use the distributive property as a strategy to multiply and divide.', 'url' => 'e.php?e-math-m3-c-3'],
                    ['id' => 'e-math-m3-c-4', 'code' => 'E.M3.C.4', 'name' => 'Interpret the unknown in multiplication and division to model and solve problems.', 'url' => 'e.php?e-math-m3-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'e-math-m3-d-1', 'code' => 'E.M3.D.1', 'name' => 'Apply the distributive property and the fact 9 = 10 — 1 as a strategy to multiply.', 'url' => 'e.php?e-math-m3-d-1'],
                    ['id' => 'e-math-m3-d-2', 'code' => 'E.M3.D.2', 'name' => 'Identify and use arithmetic patterns to multiply.', 'url' => 'e.php?e-math-m3-d-2'],
                    ['id' => 'e-math-m3-d-3', 'code' => 'E.M3.D.3', 'name' => 'Identify and use arithmetic patterns to multiply.', 'url' => 'e.php?e-math-m3-d-3'],
                    ['id' => 'e-math-m3-d-4', 'code' => 'E.M3.D.4', 'name' => 'Interpret the unknown in multiplication and division to model and solve problems.', 'url' => 'e.php?e-math-m3-d-4'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'e-math-m3-e-1', 'code' => 'E.M3.E.1', 'name' => 'Reason about and explain arithmetic patterns using units of 0 and 1 as they relate to multip...', 'url' => 'e.php?e-math-m3-e-1'],
                    ['id' => 'e-math-m3-e-2', 'code' => 'E.M3.E.2', 'name' => 'Identify patterns in multiplication and division facts using the multiplication table.', 'url' => 'e.php?e-math-m3-e-2'],
                    ['id' => 'e-math-m3-e-3', 'code' => 'E.M3.E.3', 'name' => 'Solve two-step word problems involving all four operations and assess the reasonableness of ...', 'url' => 'e.php?e-math-m3-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'e-math-m3-f-1', 'code' => 'E.M3.F.1', 'name' => 'Multiply by multiples of 10 using the place value chart.', 'url' => 'e.php?e-math-m3-f-1'],
                    ['id' => 'e-math-m3-f-2', 'code' => 'E.M3.F.2', 'name' => 'Use place value strategies and the associative property n \times (m \times 10) = (n \times m...', 'url' => 'e.php?e-math-m3-f-2'],
                    ['id' => 'e-math-m3-f-3', 'code' => 'E.M3.F.3', 'name' => 'Solve two-step word problems involving multiplying single-digit factors and multiples of 10.', 'url' => 'e.php?e-math-m3-f-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Multiplication and Area',
        'description' => 'Module 4: Multiplication and Area for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m4-a-1', 'code' => 'E.M4.A.1', 'name' => 'Understand area as an attribute of plane figures.', 'url' => 'e.php?e-math-m4-a-1'],
                    ['id' => 'e-math-m4-a-2', 'code' => 'E.M4.A.2', 'name' => 'Decompose and recompose shapes to compare areas.', 'url' => 'e.php?e-math-m4-a-2'],
                    ['id' => 'e-math-m4-a-3', 'code' => 'E.M4.A.3', 'name' => 'Model tiling with centimeter and inch unit squares as a strategy to measure area.', 'url' => 'e.php?e-math-m4-a-3'],
                    ['id' => 'e-math-m4-a-4', 'code' => 'E.M4.A.4', 'name' => 'Relate side lengths with the number of tiles on a side.', 'url' => 'e.php?e-math-m4-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m4-b-1', 'code' => 'E.M4.B.1', 'name' => 'Form rectangles by tiling with unit squares to make arrays.', 'url' => 'e.php?e-math-m4-b-1'],
                    ['id' => 'e-math-m4-b-2', 'code' => 'E.M4.B.2', 'name' => 'Draw rows and columns to determine the area of a rectangle given an incomplete array.', 'url' => 'e.php?e-math-m4-b-2'],
                    ['id' => 'e-math-m4-b-3', 'code' => 'E.M4.B.3', 'name' => 'Interpret area models to form rectangular arrays.', 'url' => 'e.php?e-math-m4-b-3'],
                    ['id' => 'e-math-m4-b-4', 'code' => 'E.M4.B.4', 'name' => 'Find the area of a rectangle through multiplication of the side lengths.', 'url' => 'e.php?e-math-m4-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C begins with a concrete study of arithmetic properties. Students cut apart rectangular grids and rearrange the parts to create new rectangles with the same area.  Lesson 9 lays the foundation for the work to come in Lessons 10 and 11.',
                'skills' => [
                    ['id' => 'e-math-m4-c-1', 'code' => 'E.M4.C.1', 'name' => 'Analyze different rectangles and reason about their area.', 'url' => 'e.php?e-math-m4-c-1'],
                    ['id' => 'e-math-m4-c-2', 'code' => 'E.M4.C.2', 'name' => 'Apply the distributive property as a strategy to find the total area of a large rectangle by...', 'url' => 'e.php?e-math-m4-c-2'],
                    ['id' => 'e-math-m4-c-3', 'code' => 'E.M4.C.3', 'name' => 'Demonstrate the possible whole number side lengths of rectangles with areas of 24, 36, 48, o...', 'url' => 'e.php?e-math-m4-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D requires students to synthesize and apply their knowledge of area.  Lesson 12 begins the topic with an emphasis on real-world applications by providing students with opportunities to apply their understanding of area to solving word problems.  Students may practice unknown product, group size unknown, and number of groups unknown types of problems.  (See examples of problem types in the chart on page 19 of the Geometric Measurement Progression.)  The word problems provide a stepping-stone for the real-world, project-based application of area to composite shapes and the area floor plan in this topic.',
                'skills' => [
                    ['id' => 'e-math-m4-d-1', 'code' => 'E.M4.D.1', 'name' => 'Solve word problems involving area.', 'url' => 'e.php?e-math-m4-d-1'],
                    ['id' => 'e-math-m4-d-2', 'code' => 'E.M4.D.2', 'name' => 'Find areas by decomposing into rectangles or completing composite figures to form rectangles.', 'url' => 'e.php?e-math-m4-d-2'],
                    ['id' => 'e-math-m4-d-3', 'code' => 'E.M4.D.3', 'name' => 'Find areas by decomposing into rectangles or completing composite figures to form rectangles.', 'url' => 'e.php?e-math-m4-d-3'],
                    ['id' => 'e-math-m4-d-4', 'code' => 'E.M4.D.4', 'name' => 'Apply knowledge of area to determine areas of rooms in a given floor plan.', 'url' => 'e.php?e-math-m4-d-4'],
                    ['id' => 'e-math-m4-d-5', 'code' => 'E.M4.D.5', 'name' => 'Apply knowledge of area to determine areas of rooms in a given floor plan.', 'url' => 'e.php?e-math-m4-d-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Fractions as Numbers on the Number Line',
        'description' => 'Module 5: Fractions as Numbers on the Number Line for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m5-a-1', 'code' => 'E.M5.A.1', 'name' => 'NOTES ON STANDARDS ALIGNMENT:In this module, students work with a variety of fractional unit...', 'url' => 'e.php?e-math-m5-a-1'],
                    ['id' => 'e-math-m5-a-2', 'code' => 'E.M5.A.2', 'name' => 'Specify and partition a whole into equal parts, identifying and counting unit fractions by f...', 'url' => 'e.php?e-math-m5-a-2'],
                    ['id' => 'e-math-m5-a-3', 'code' => 'E.M5.A.3', 'name' => 'Specify and partition a whole into equal parts, identifying and counting unit fractions by d...', 'url' => 'e.php?e-math-m5-a-3'],
                    ['id' => 'e-math-m5-a-4', 'code' => 'E.M5.A.4', 'name' => 'Represent and identify fractional parts of different wholes.', 'url' => 'e.php?e-math-m5-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m5-b-1', 'code' => 'E.M5.B.1', 'name' => 'Partition a whole into equal parts and define the equal parts to identify the unit fraction ...', 'url' => 'e.php?e-math-m5-b-1'],
                    ['id' => 'e-math-m5-b-2', 'code' => 'E.M5.B.2', 'name' => 'Build non-unit fractions less than one whole from unit fractions.', 'url' => 'e.php?e-math-m5-b-2'],
                    ['id' => 'e-math-m5-b-3', 'code' => 'E.M5.B.3', 'name' => 'Identify and represent shaded and non-shaded parts of one whole as fractions.', 'url' => 'e.php?e-math-m5-b-3'],
                    ['id' => 'e-math-m5-b-4', 'code' => 'E.M5.B.4', 'name' => 'Represent parts of one whole as fractions with number bonds.', 'url' => 'e.php?e-math-m5-b-4'],
                    ['id' => 'e-math-m5-b-5', 'code' => 'E.M5.B.5', 'name' => 'Build and write fractions greater than one whole using unit fractions.', 'url' => 'e.php?e-math-m5-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'e-math-m5-c-1', 'code' => 'E.M5.C.1', 'name' => 'Compare unit fractions by reasoning about their size using fraction strips.', 'url' => 'e.php?e-math-m5-c-1'],
                    ['id' => 'e-math-m5-c-2', 'code' => 'E.M5.C.2', 'name' => 'Compare unit fractions with different-sized models representing the whole.', 'url' => 'e.php?e-math-m5-c-2'],
                    ['id' => 'e-math-m5-c-3', 'code' => 'E.M5.C.3', 'name' => 'Specify the corresponding whole when presented with one equal part.', 'url' => 'e.php?e-math-m5-c-3'],
                    ['id' => 'e-math-m5-c-4', 'code' => 'E.M5.C.4', 'name' => 'Identify a shaded fractional part in different ways depending on the designation of the whole.', 'url' => 'e.php?e-math-m5-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'e-math-m5-d-1', 'code' => 'E.M5.D.1', 'name' => 'Place fractions on a number line with endpoints 0 and 1.', 'url' => 'e.php?e-math-m5-d-1'],
                    ['id' => 'e-math-m5-d-2', 'code' => 'E.M5.D.2', 'name' => 'Place any fraction on a number line with endpoints 0 and 1.', 'url' => 'e.php?e-math-m5-d-2'],
                    ['id' => 'e-math-m5-d-3', 'code' => 'E.M5.D.3', 'name' => 'Place whole number fractions and fractions between whole numbers on the number line.', 'url' => 'e.php?e-math-m5-d-3'],
                    ['id' => 'e-math-m5-d-4', 'code' => 'E.M5.D.4', 'name' => 'Practice placing various fractions on the number line.', 'url' => 'e.php?e-math-m5-d-4'],
                    ['id' => 'e-math-m5-d-5', 'code' => 'E.M5.D.5', 'name' => 'Compare fractions and whole numbers on the number line by reasoning about their distance fro...', 'url' => 'e.php?e-math-m5-d-5'],
                    ['id' => 'e-math-m5-d-6', 'code' => 'E.M5.D.6', 'name' => 'Understand distance and position on the number line as strategies for comparing fractions. (...', 'url' => 'e.php?e-math-m5-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'e-math-m5-e-1', 'code' => 'E.M5.E.1', 'name' => 'Recognize and show that equivalent fractions have the same size, though not necessarily the ...', 'url' => 'e.php?e-math-m5-e-1'],
                    ['id' => 'e-math-m5-e-2', 'code' => 'E.M5.E.2', 'name' => 'Recognize and show that equivalent fractions refer to the same point on the number line.', 'url' => 'e.php?e-math-m5-e-2'],
                    ['id' => 'e-math-m5-e-3', 'code' => 'E.M5.E.3', 'name' => 'Generate simple equivalent fractions by using visual fraction models and the number line.', 'url' => 'e.php?e-math-m5-e-3'],
                    ['id' => 'e-math-m5-e-4', 'code' => 'E.M5.E.4', 'name' => 'Generate simple equivalent fractions by using visual fraction models and the number line.', 'url' => 'e.php?e-math-m5-e-4'],
                    ['id' => 'e-math-m5-e-5', 'code' => 'E.M5.E.5', 'name' => 'Express whole numbers as fractions and recognize equivalence with different units.', 'url' => 'e.php?e-math-m5-e-5'],
                    ['id' => 'e-math-m5-e-6', 'code' => 'E.M5.E.6', 'name' => 'Express whole number fractions on the number line when the unit interval is 1.', 'url' => 'e.php?e-math-m5-e-6'],
                    ['id' => 'e-math-m5-e-7', 'code' => 'E.M5.E.7', 'name' => 'Decompose whole number fractions greater than 1 using whole number equivalence with various ...', 'url' => 'e.php?e-math-m5-e-7'],
                    ['id' => 'e-math-m5-e-8', 'code' => 'E.M5.E.8', 'name' => 'Explain equivalence by manipulating units and reasoning about their size.', 'url' => 'e.php?e-math-m5-e-8'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'e-math-m5-f-1', 'code' => 'E.M5.F.1', 'name' => 'Compare fractions with the same numerator pictorially.', 'url' => 'e.php?e-math-m5-f-1'],
                    ['id' => 'e-math-m5-f-2', 'code' => 'E.M5.F.2', 'name' => 'Compare fractions with the same numerator using <, >, or =, and use a model to reason about ...', 'url' => 'e.php?e-math-m5-f-2'],
                    ['id' => 'e-math-m5-f-3', 'code' => 'E.M5.F.3', 'name' => 'Partition various wholes precisely into equal parts using a number line method.', 'url' => 'e.php?e-math-m5-f-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Collecting and Displaying Data',
        'description' => 'Module 6: Collecting and Displaying Data for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m6-a-1', 'code' => 'E.M6.A.1', 'name' => 'Generate and organize data.', 'url' => 'e.php?e-math-m6-a-1'],
                    ['id' => 'e-math-m6-a-2', 'code' => 'E.M6.A.2', 'name' => 'Rotate tape diagrams vertically.', 'url' => 'e.php?e-math-m6-a-2'],
                    ['id' => 'e-math-m6-a-3', 'code' => 'E.M6.A.3', 'name' => 'Create scaled bar graphs.', 'url' => 'e.php?e-math-m6-a-3'],
                    ['id' => 'e-math-m6-a-4', 'code' => 'E.M6.A.4', 'name' => 'Solve one- and two-step problems involving graphs.', 'url' => 'e.php?e-math-m6-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m6-b-1', 'code' => 'E.M6.B.1', 'name' => 'Create ruler with 1-inch, \frac{1}{2}-inch, and \frac{1}{4}-inch intervals, and generate mea...', 'url' => 'e.php?e-math-m6-b-1'],
                    ['id' => 'e-math-m6-b-2', 'code' => 'E.M6.B.2', 'name' => 'Interpret measurement data from various line plots.', 'url' => 'e.php?e-math-m6-b-2'],
                    ['id' => 'e-math-m6-b-3', 'code' => 'E.M6.B.3', 'name' => 'Represent measurement data with line plots.', 'url' => 'e.php?e-math-m6-b-3'],
                    ['id' => 'e-math-m6-b-4', 'code' => 'E.M6.B.4', 'name' => 'Represent measurement data with line plots.', 'url' => 'e.php?e-math-m6-b-4'],
                    ['id' => 'e-math-m6-b-5', 'code' => 'E.M6.B.5', 'name' => 'Analyze data to problem solve.', 'url' => 'e.php?e-math-m6-b-5'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 7: Geometry and Measurement Word Problems',
        'description' => 'Module 7: Geometry and Measurement Word Problems for 3rd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'e-math-m7-a-1', 'code' => 'E.M7.A.1', 'name' => 'Solve word problems in varied contexts using a letter to represent the unknown.', 'url' => 'e.php?e-math-m7-a-1'],
                    ['id' => 'e-math-m7-a-2', 'code' => 'E.M7.A.2', 'name' => 'Solve word problems in varied contexts using a letter to represent the unknown.', 'url' => 'e.php?e-math-m7-a-2'],
                    ['id' => 'e-math-m7-a-3', 'code' => 'E.M7.A.3', 'name' => 'Share and critique peer solution strategies to varied word problems.', 'url' => 'e.php?e-math-m7-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'e-math-m7-b-1', 'code' => 'E.M7.B.1', 'name' => 'Compare and classify quadrilaterals.', 'url' => 'e.php?e-math-m7-b-1'],
                    ['id' => 'e-math-m7-b-2', 'code' => 'E.M7.B.2', 'name' => 'Compare and classify other polygons.', 'url' => 'e.php?e-math-m7-b-2'],
                    ['id' => 'e-math-m7-b-3', 'code' => 'E.M7.B.3', 'name' => 'Draw polygons with specified attributes to solve problems.', 'url' => 'e.php?e-math-m7-b-3'],
                    ['id' => 'e-math-m7-b-4', 'code' => 'E.M7.B.4', 'name' => 'Reason about composing and decomposing polygons using tetrominoes.', 'url' => 'e.php?e-math-m7-b-4'],
                    ['id' => 'e-math-m7-b-5', 'code' => 'E.M7.B.5', 'name' => 'Create a tangram puzzle and observe relationships among the shapes.', 'url' => 'e.php?e-math-m7-b-5'],
                    ['id' => 'e-math-m7-b-6', 'code' => 'E.M7.B.6', 'name' => 'Reason about composing and decomposing polygons using tangrams.', 'url' => 'e.php?e-math-m7-b-6'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'e-math-m7-c-1', 'code' => 'E.M7.C.1', 'name' => 'Decompose quadrilaterals to understand perimeter as the boundary of a shape.', 'url' => 'e.php?e-math-m7-c-1'],
                    ['id' => 'e-math-m7-c-2', 'code' => 'E.M7.C.2', 'name' => 'Tessellate to understand perimeter as the boundary of a shape. (Optional.)', 'url' => 'e.php?e-math-m7-c-2'],
                    ['id' => 'e-math-m7-c-3', 'code' => 'E.M7.C.3', 'name' => 'Measure side lengths in whole number units to determine the perimeter of polygons.', 'url' => 'e.php?e-math-m7-c-3'],
                    ['id' => 'e-math-m7-c-4', 'code' => 'E.M7.C.4', 'name' => 'Explore perimeter as an attribute of plane figures and solve problems.', 'url' => 'e.php?e-math-m7-c-4'],
                    ['id' => 'e-math-m7-c-5', 'code' => 'E.M7.C.5', 'name' => 'Determine the perimeter of regular polygons and rectangles when whole number measurements ar...', 'url' => 'e.php?e-math-m7-c-5'],
                    ['id' => 'e-math-m7-c-6', 'code' => 'E.M7.C.6', 'name' => 'Solve word problems to determine perimeter with given side lengths.', 'url' => 'e.php?e-math-m7-c-6'],
                    ['id' => 'e-math-m7-c-7', 'code' => 'E.M7.C.7', 'name' => 'Use string to measure the perimeter of various circles to the nearest quarter inch.', 'url' => 'e.php?e-math-m7-c-7'],
                    ['id' => 'e-math-m7-c-8', 'code' => 'E.M7.C.8', 'name' => 'Use all four operations to solve problems involving perimeter and unknown measurements.', 'url' => 'e.php?e-math-m7-c-8'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'e-math-m7-d-1', 'code' => 'E.M7.D.1', 'name' => 'Construct rectangles from a given number of unit squares and determine the perimeters.', 'url' => 'e.php?e-math-m7-d-1'],
                    ['id' => 'e-math-m7-d-2', 'code' => 'E.M7.D.2', 'name' => 'Use a line plot to record the number of rectangles constructed from a given number of unit s...', 'url' => 'e.php?e-math-m7-d-2'],
                    ['id' => 'e-math-m7-d-3', 'code' => 'E.M7.D.3', 'name' => 'Construct rectangles with a given perimeter using unit squares and determine their areas.', 'url' => 'e.php?e-math-m7-d-3'],
                    ['id' => 'e-math-m7-d-4', 'code' => 'E.M7.D.4', 'name' => 'Construct rectangles with a given perimeter using unit squares and determine their areas.', 'url' => 'e.php?e-math-m7-d-4'],
                    ['id' => 'e-math-m7-d-5', 'code' => 'E.M7.D.5', 'name' => 'Use a line plot to record the number of rectangles constructed in Lessons 20 and 21.', 'url' => 'e.php?e-math-m7-d-5'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'e-math-m7-e-1', 'code' => 'E.M7.E.1', 'name' => 'Solve a variety of word problems with perimeter.', 'url' => 'e.php?e-math-m7-e-1'],
                    ['id' => 'e-math-m7-e-2', 'code' => 'E.M7.E.2', 'name' => 'Use rectangles to draw a robot with specified perimeter measurements, and reason about the d...', 'url' => 'e.php?e-math-m7-e-2'],
                    ['id' => 'e-math-m7-e-3', 'code' => 'E.M7.E.3', 'name' => 'Use rectangles to draw a robot with specified perimeter measurements, and reason about the d...', 'url' => 'e.php?e-math-m7-e-3'],
                    ['id' => 'e-math-m7-e-4', 'code' => 'E.M7.E.4', 'name' => 'Use rectangles to draw a robot with specified perimeter measurements, and reason about the d...', 'url' => 'e.php?e-math-m7-e-4'],
                    ['id' => 'e-math-m7-e-5', 'code' => 'E.M7.E.5', 'name' => 'Use rectangles to draw a robot with specified perimeter measurements, and reason about the d...', 'url' => 'e.php?e-math-m7-e-5'],
                    ['id' => 'e-math-m7-e-6', 'code' => 'E.M7.E.6', 'name' => 'Solve a variety of word problems involving area and perimeter using all four operations.', 'url' => 'e.php?e-math-m7-e-6'],
                    ['id' => 'e-math-m7-e-7', 'code' => 'E.M7.E.7', 'name' => 'Solve a variety of word problems involving area and perimeter using all four operations.', 'url' => 'e.php?e-math-m7-e-7'],
                    ['id' => 'e-math-m7-e-8', 'code' => 'E.M7.E.8', 'name' => 'Share and critique peer strategies for problem solving.', 'url' => 'e.php?e-math-m7-e-8'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'e-math-m7-f-1', 'code' => 'E.M7.F.1', 'name' => 'Explore and create unconventional representations of one-half.', 'url' => 'e.php?e-math-m7-f-1'],
                    ['id' => 'e-math-m7-f-2', 'code' => 'E.M7.F.2', 'name' => 'Explore and create unconventional representations of one-half.', 'url' => 'e.php?e-math-m7-f-2'],
                    ['id' => 'e-math-m7-f-3', 'code' => 'E.M7.F.3', 'name' => 'Solidify fluency with Grade 3 skills.', 'url' => 'e.php?e-math-m7-f-3'],
                    ['id' => 'e-math-m7-f-4', 'code' => 'E.M7.F.4', 'name' => 'Create resource booklets to support fluency with Grade 3 skills.', 'url' => 'e.php?e-math-m7-f-4'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
