<?php
/**
 * Hesten's Learning - Level D (2nd Grade)
 * Complete EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?d-math-m1-a-1 or ?lesson=d-math-m1-a-1)
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
    $levelUrl = 'd.php';
    $levelTitle = 'Level D';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "2nd Grade Level D | Hesten's Learning";
$pageDescription = "Addition and subtraction to 1,000, foundations of multiplication, length measurement, time, and money.";
$pageKeywords    = "2nd Grade, elementary math, EngageNY, Eureka Math, problem sets, worksheets";

// Template Variables
$themeColor = 'amber';
$levelId = 'd';
$levelTitle = 'Level D';
$gradeText = '2nd Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Addition and subtraction to 1,000, foundations of multiplication, length measurement, time, and money.';

$modules = [
    [
        'title' => 'Module 1: Sums and Differences to 100',
        'description' => 'Module 1: Sums and Differences to 100 for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m1-a-1', 'code' => 'D.M1.A.1', 'name' => 'Practice making ten and adding to ten.', 'url' => 'd.php?d-math-m1-a-1'],
                    ['id' => 'd-math-m1-a-2', 'code' => 'D.M1.A.2', 'name' => 'Practice making the next ten and adding to a multiple of ten.', 'url' => 'd.php?d-math-m1-a-2'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m1-b-1', 'code' => 'D.M1.B.1', 'name' => 'Add and subtract like units.', 'url' => 'd.php?d-math-m1-b-1'],
                    ['id' => 'd-math-m1-b-2', 'code' => 'D.M1.B.2', 'name' => 'Make a ten to add within 20.', 'url' => 'd.php?d-math-m1-b-2'],
                    ['id' => 'd-math-m1-b-3', 'code' => 'D.M1.B.3', 'name' => 'Make a ten to add within 100.', 'url' => 'd.php?d-math-m1-b-3'],
                    ['id' => 'd-math-m1-b-4', 'code' => 'D.M1.B.4', 'name' => 'Subtract single-digit numbers from multiples of 10 within 100.', 'url' => 'd.php?d-math-m1-b-4'],
                    ['id' => 'd-math-m1-b-5', 'code' => 'D.M1.B.5', 'name' => 'Take from 10 within 20.', 'url' => 'd.php?d-math-m1-b-5'],
                    ['id' => 'd-math-m1-b-6', 'code' => 'D.M1.B.6', 'name' => 'Take from 10 within 100.', 'url' => 'd.php?d-math-m1-b-6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Addition and Subtraction of Length Units',
        'description' => 'Module 2: Addition and Subtraction of Length Units for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A begins with an exploration of concepts about the ruler.  In Lesson 1, students relate length to physical units by measuring various objects with multiple centimeter cubes, creating a mental benchmark for the centimeter.  In Lesson 2, they apply their knowledge of using centimeter cubes to measure by moving from repeated physical units to the iteration of one physical unit.  This enables them to internalize their understanding of a length unit as the amount of space between one end of the cube and the other (or space between hash marks).  Thus, they begin moving from the concrete to the conceptual.  Finally, in Lesson 3, students apply knowledge of known measurements to create unit rulers using one centimeter cube.  This deepens the understanding of distance on a ruler and the ruler as a number line.',
                'skills' => [
                    ['id' => 'd-math-m2-a-1', 'code' => 'D.M2.A.1', 'name' => 'Connect measurement with physical units by using multiple copies of the same physical unit t...', 'url' => 'd.php?d-math-m2-a-1'],
                    ['id' => 'd-math-m2-a-2', 'code' => 'D.M2.A.2', 'name' => 'Use iteration with one physical unit to measure.', 'url' => 'd.php?d-math-m2-a-2'],
                    ['id' => 'd-math-m2-a-3', 'code' => 'D.M2.A.3', 'name' => 'Apply concepts to create unit rulers and measure lengths using unit rulers.', 'url' => 'd.php?d-math-m2-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m2-b-1', 'code' => 'D.M2.B.1', 'name' => 'Measure various objects using centimeter rulers and meter sticks.', 'url' => 'd.php?d-math-m2-b-1'],
                    ['id' => 'd-math-m2-b-2', 'code' => 'D.M2.B.2', 'name' => 'Develop estimation strategies by applying prior knowledge of length and using mental benchma...', 'url' => 'd.php?d-math-m2-b-2'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'd-math-m2-c-1', 'code' => 'D.M2.C.1', 'name' => 'Measure and compare lengths using centimeters and meters.', 'url' => 'd.php?d-math-m2-c-1'],
                    ['id' => 'd-math-m2-c-2', 'code' => 'D.M2.C.2', 'name' => 'Measure and compare lengths using standard metric length units and non-standard length units...', 'url' => 'd.php?d-math-m2-c-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Place Value, Counting, and Comparison of Numbers to 1,000',
        'description' => 'Module 3: Place Value, Counting, and Comparison of Numbers to 1,000 for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m3-a-1', 'code' => 'D.M3.A.1', 'name' => 'Bundle and count ones, tens, and hundreds to 1,000.', 'url' => 'd.php?d-math-m3-a-1'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m3-b-1', 'code' => 'D.M3.B.1', 'name' => 'Count up and down between 100 and 220 using ones and tens.', 'url' => 'd.php?d-math-m3-b-1'],
                    ['id' => 'd-math-m3-b-2', 'code' => 'D.M3.B.2', 'name' => 'Count up and down between 90 and 1,000 using ones, tens, and hundreds.', 'url' => 'd.php?d-math-m3-b-2'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'd-math-m3-c-1', 'code' => 'D.M3.C.1', 'name' => 'Count up to 1,000 on the place value chart.', 'url' => 'd.php?d-math-m3-c-1'],
                    ['id' => 'd-math-m3-c-2', 'code' => 'D.M3.C.2', 'name' => 'Write base ten three-digit numbers in unit form; show the value of each digit.', 'url' => 'd.php?d-math-m3-c-2'],
                    ['id' => 'd-math-m3-c-3', 'code' => 'D.M3.C.3', 'name' => 'Write base ten numbers in expanded form.', 'url' => 'd.php?d-math-m3-c-3'],
                    ['id' => 'd-math-m3-c-4', 'code' => 'D.M3.C.4', 'name' => 'Write, read, and relate base ten numbers in all forms.', 'url' => 'd.php?d-math-m3-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'd-math-m3-d-1', 'code' => 'D.M3.D.1', 'name' => 'Count the total value of $1, $10, and $100 bills up to $1,000.', 'url' => 'd.php?d-math-m3-d-1'],
                    ['id' => 'd-math-m3-d-2', 'code' => 'D.M3.D.2', 'name' => 'Count from $10 to $1,000 on the place value chart and the empty number line.', 'url' => 'd.php?d-math-m3-d-2'],
                    ['id' => 'd-math-m3-d-3', 'code' => 'D.M3.D.3', 'name' => 'Explore $1,000. How many $10 bills can we change for a thousand dollar bill?', 'url' => 'd.php?d-math-m3-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'd-math-m3-e-1', 'code' => 'D.M3.E.1', 'name' => 'Count the total value of ones, tens, and hundreds with place value disks.', 'url' => 'd.php?d-math-m3-e-1'],
                    ['id' => 'd-math-m3-e-2', 'code' => 'D.M3.E.2', 'name' => 'Change 10 ones for 1 ten, 10 tens for 1 hundred, and 10 hundreds for 1 thousand.', 'url' => 'd.php?d-math-m3-e-2'],
                    ['id' => 'd-math-m3-e-3', 'code' => 'D.M3.E.3', 'name' => 'Read and write numbers within 1,000 after modeling with place value disks.', 'url' => 'd.php?d-math-m3-e-3'],
                    ['id' => 'd-math-m3-e-4', 'code' => 'D.M3.E.4', 'name' => 'Model numbers with more than 9 ones or 9 tens; write in expanded, unit, standard, and word f...', 'url' => 'd.php?d-math-m3-e-4'],
                    ['id' => 'd-math-m3-e-5', 'code' => 'D.M3.E.5', 'name' => 'Explore a situation with more than 9 groups of ten.', 'url' => 'd.php?d-math-m3-e-5'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'd-math-m3-f-1', 'code' => 'D.M3.F.1', 'name' => 'Compare two three-digit numbers using <, >, and =.', 'url' => 'd.php?d-math-m3-f-1'],
                    ['id' => 'd-math-m3-f-2', 'code' => 'D.M3.F.2', 'name' => 'Compare two three-digit numbers using <, >, and = when there are more than 9 ones or 9 tens.', 'url' => 'd.php?d-math-m3-f-2'],
                    ['id' => 'd-math-m3-f-3', 'code' => 'D.M3.F.3', 'name' => 'Order numbers in different forms. (Optional)', 'url' => 'd.php?d-math-m3-f-3'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G',
                'skills' => [
                    ['id' => 'd-math-m3-g-1', 'code' => 'D.M3.G.1', 'name' => 'Model and use language to tell about 1 more and 1 less, 10 more and 10 less, and 100 more an...', 'url' => 'd.php?d-math-m3-g-1'],
                    ['id' => 'd-math-m3-g-2', 'code' => 'D.M3.G.2', 'name' => 'Model 1 more and 1 less, 10 more and 10 less, and 100 more and 100 less when changing the hu...', 'url' => 'd.php?d-math-m3-g-2'],
                    ['id' => 'd-math-m3-g-3', 'code' => 'D.M3.G.3', 'name' => 'Complete a pattern counting up and down.', 'url' => 'd.php?d-math-m3-g-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Addition and Subtraction Within 200 with Word Problems to 100',
        'description' => 'Module 4: Addition and Subtraction Within 200 with Word Problems to 100 for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m4-a-1', 'code' => 'D.M4.A.1', 'name' => 'Relate 1 more, 1 less, 10 more, and 10 less to addition and subtraction of 1 and 10.', 'url' => 'd.php?d-math-m4-a-1'],
                    ['id' => 'd-math-m4-a-2', 'code' => 'D.M4.A.2', 'name' => 'Add and subtract multiples of 10 including counting on to subtract.', 'url' => 'd.php?d-math-m4-a-2'],
                    ['id' => 'd-math-m4-a-3', 'code' => 'D.M4.A.3', 'name' => 'Add and subtract multiples of 10 and some ones within 100.', 'url' => 'd.php?d-math-m4-a-3'],
                    ['id' => 'd-math-m4-a-4', 'code' => 'D.M4.A.4', 'name' => 'Add and subtract multiples of 10 and some ones within 100.', 'url' => 'd.php?d-math-m4-a-4'],
                    ['id' => 'd-math-m4-a-5', 'code' => 'D.M4.A.5', 'name' => 'Solve one- and two-step word problems within 100 using strategies based on place value.', 'url' => 'd.php?d-math-m4-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m4-b-1', 'code' => 'D.M4.B.1', 'name' => 'Use manipulatives to represent the composition of 10 ones as 1 ten with two-digit addends.', 'url' => 'd.php?d-math-m4-b-1'],
                    ['id' => 'd-math-m4-b-2', 'code' => 'D.M4.B.2', 'name' => 'Relate addition using manipulatives to a written vertical method.', 'url' => 'd.php?d-math-m4-b-2'],
                    ['id' => 'd-math-m4-b-3', 'code' => 'D.M4.B.3', 'name' => 'Use math drawings to represent the composition and relate drawings to a written method.', 'url' => 'd.php?d-math-m4-b-3'],
                    ['id' => 'd-math-m4-b-4', 'code' => 'D.M4.B.4', 'name' => 'Use math drawings to represent the composition when adding a two-digit to a three-digit addend.', 'url' => 'd.php?d-math-m4-b-4'],
                    ['id' => 'd-math-m4-b-5', 'code' => 'D.M4.B.5', 'name' => 'Use math drawings to represent the composition when adding a two-digit to a three-digit addend.', 'url' => 'd.php?d-math-m4-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C parallels Topic B as students apply their understanding of place value strategies to the subtraction algorithm, moving from concrete to pictorial to abstract.  It is important to note that the algorithm is introduced at this level and is connected deeply to the understanding of place value.  Fluency with the algorithm, however, is a Grade 4 standard.',
                'skills' => [
                    ['id' => 'd-math-m4-c-1', 'code' => 'D.M4.C.1', 'name' => 'Represent subtraction with and without the decomposition of 1 ten as 10 ones with manipulati...', 'url' => 'd.php?d-math-m4-c-1'],
                    ['id' => 'd-math-m4-c-2', 'code' => 'D.M4.C.2', 'name' => 'Relate manipulative representations to a written method.', 'url' => 'd.php?d-math-m4-c-2'],
                    ['id' => 'd-math-m4-c-3', 'code' => 'D.M4.C.3', 'name' => 'Use math drawings to represent subtraction with and without decomposition and relate drawing...', 'url' => 'd.php?d-math-m4-c-3'],
                    ['id' => 'd-math-m4-c-4', 'code' => 'D.M4.C.4', 'name' => 'Represent subtraction with and without the decomposition when there is a three-digit minuend.', 'url' => 'd.php?d-math-m4-c-4'],
                    ['id' => 'd-math-m4-c-5', 'code' => 'D.M4.C.5', 'name' => 'Represent subtraction with and without the decomposition when there is a three-digit minuend.', 'url' => 'd.php?d-math-m4-c-5'],
                    ['id' => 'd-math-m4-c-6', 'code' => 'D.M4.C.6', 'name' => 'Solve one- and two-step word problems within 100 using strategies based on place value.', 'url' => 'd.php?d-math-m4-c-6'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'd-math-m4-d-1', 'code' => 'D.M4.D.1', 'name' => 'Use mental strategies to relate compositions of 10 tens as 1 hundred to 10 ones as 1 ten.', 'url' => 'd.php?d-math-m4-d-1'],
                    ['id' => 'd-math-m4-d-2', 'code' => 'D.M4.D.2', 'name' => 'Use manipulatives to represent additions with two compositions.', 'url' => 'd.php?d-math-m4-d-2'],
                    ['id' => 'd-math-m4-d-3', 'code' => 'D.M4.D.3', 'name' => 'Relate manipulative representations to a written method.', 'url' => 'd.php?d-math-m4-d-3'],
                    ['id' => 'd-math-m4-d-4', 'code' => 'D.M4.D.4', 'name' => 'Use math drawings to represent additions with up to two compositions and relate drawings to ...', 'url' => 'd.php?d-math-m4-d-4'],
                    ['id' => 'd-math-m4-d-5', 'code' => 'D.M4.D.5', 'name' => 'Use math drawings to represent additions with up to two compositions and relate drawings to ...', 'url' => 'd.php?d-math-m4-d-5'],
                    ['id' => 'd-math-m4-d-6', 'code' => 'D.M4.D.6', 'name' => 'Solve additions with up to four addends with totals within 200 with and without two composit...', 'url' => 'd.php?d-math-m4-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E begins with an extension of mental math strategies learned in first grade, when students learned to subtract from the ten by using number bonds.  In Lesson 23, they return to this strategy to break apart three-digit minuends and subtract from the hundred.  For example, in Grade 1, students solved 14 – 9 by restating the problem as 10 – 9 + 4.  In Grade 2, students use the same strategy to restate 143 – 90 as 100 – 90 + 43.',
                'skills' => [
                    ['id' => 'd-math-m4-e-1', 'code' => 'D.M4.E.1', 'name' => 'Use number bonds to break apart three-digit minuends and subtract from the hundred.', 'url' => 'd.php?d-math-m4-e-1'],
                    ['id' => 'd-math-m4-e-2', 'code' => 'D.M4.E.2', 'name' => 'Use manipulatives to represent subtraction with decompositions of 1 hundred as 10 tens and 1...', 'url' => 'd.php?d-math-m4-e-2'],
                    ['id' => 'd-math-m4-e-3', 'code' => 'D.M4.E.3', 'name' => 'Relate manipulative representations to a written method.', 'url' => 'd.php?d-math-m4-e-3'],
                    ['id' => 'd-math-m4-e-4', 'code' => 'D.M4.E.4', 'name' => 'Use math drawings to represent subtraction with up to two decompositions and relate drawings...', 'url' => 'd.php?d-math-m4-e-4'],
                    ['id' => 'd-math-m4-e-5', 'code' => 'D.M4.E.5', 'name' => 'Subtract from 200 and from numbers with zeros in the tens place.', 'url' => 'd.php?d-math-m4-e-5'],
                    ['id' => 'd-math-m4-e-6', 'code' => 'D.M4.E.6', 'name' => 'Subtract from 200 and from numbers with zeros in the tens place.', 'url' => 'd.php?d-math-m4-e-6'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'd-math-m4-f-1', 'code' => 'D.M4.F.1', 'name' => 'Use and explain the totals below method using words, math drawings, and numbers.', 'url' => 'd.php?d-math-m4-f-1'],
                    ['id' => 'd-math-m4-f-2', 'code' => 'D.M4.F.2', 'name' => 'Compare totals below to new groups below as written methods.', 'url' => 'd.php?d-math-m4-f-2'],
                    ['id' => 'd-math-m4-f-3', 'code' => 'D.M4.F.3', 'name' => 'Solve two-step word problems within 100.', 'url' => 'd.php?d-math-m4-f-3'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Addition and Subtraction Within 1,000 with Word Problems to 100',
        'description' => 'Module 5: Addition and Subtraction Within 1,000 with Word Problems to 100 for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m5-a-1', 'code' => 'D.M5.A.1', 'name' => 'Relate 10 more, 10 less, 100 more, and 100 less to addition and subtraction of 10 and 100.', 'url' => 'd.php?d-math-m5-a-1'],
                    ['id' => 'd-math-m5-a-2', 'code' => 'D.M5.A.2', 'name' => 'Add and subtract multiples of 100, including counting on to subtract.', 'url' => 'd.php?d-math-m5-a-2'],
                    ['id' => 'd-math-m5-a-3', 'code' => 'D.M5.A.3', 'name' => 'Add multiples of 100 and some tens within 1,000.', 'url' => 'd.php?d-math-m5-a-3'],
                    ['id' => 'd-math-m5-a-4', 'code' => 'D.M5.A.4', 'name' => 'Subtract multiples of 100 and some tens within 1,000.', 'url' => 'd.php?d-math-m5-a-4'],
                    ['id' => 'd-math-m5-a-5', 'code' => 'D.M5.A.5', 'name' => 'Use the associative property to make a hundred in one addend.', 'url' => 'd.php?d-math-m5-a-5'],
                    ['id' => 'd-math-m5-a-6', 'code' => 'D.M5.A.6', 'name' => 'Use the associative property to subtract from three-digit numbers and verify solutions with ...', 'url' => 'd.php?d-math-m5-a-6'],
                    ['id' => 'd-math-m5-a-7', 'code' => 'D.M5.A.7', 'name' => 'Share and critique solution strategies for varied addition and subtraction problems within 1...', 'url' => 'd.php?d-math-m5-a-7'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m5-b-1', 'code' => 'D.M5.B.1', 'name' => 'Relate manipulative representations to the addition algorithm.', 'url' => 'd.php?d-math-m5-b-1'],
                    ['id' => 'd-math-m5-b-2', 'code' => 'D.M5.B.2', 'name' => 'Relate manipulative representations to the addition algorithm.', 'url' => 'd.php?d-math-m5-b-2'],
                    ['id' => 'd-math-m5-b-3', 'code' => 'D.M5.B.3', 'name' => 'Use math drawings to represent additions with up to two compositions and relate drawings to ...', 'url' => 'd.php?d-math-m5-b-3'],
                    ['id' => 'd-math-m5-b-4', 'code' => 'D.M5.B.4', 'name' => 'Use math drawings to represent additions with up to two compositions and relate drawings to ...', 'url' => 'd.php?d-math-m5-b-4'],
                    ['id' => 'd-math-m5-b-5', 'code' => 'D.M5.B.5', 'name' => 'Choose and explain solution strategies and record with a written addition method.', 'url' => 'd.php?d-math-m5-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C builds upon Module 4’s groundwork, which is now decomposing tens and hundreds within 1,000 (2.NBT.7).  In Lesson 13, students model decompositions with place value disks on their place value charts while simultaneously recording these changes in the vertical form.  Students draw a magnifying glass around the minuend as they did in Module 4.  They then ask familiar questions:  Do I have enough ones to subtract?  Do I have enough tens?  When the answer is no, students exchange one of the larger units for ten of the smaller units.  They record the change using the algorithm, following this procedure for each place on the place value chart.',
                'skills' => [
                    ['id' => 'd-math-m5-c-1', 'code' => 'D.M5.C.1', 'name' => 'Relate manipulative representations to the subtraction algorithm, and use addition to explai...', 'url' => 'd.php?d-math-m5-c-1'],
                    ['id' => 'd-math-m5-c-2', 'code' => 'D.M5.C.2', 'name' => 'Use math drawings to represent subtraction with up to two decompositions, relate drawings to...', 'url' => 'd.php?d-math-m5-c-2'],
                    ['id' => 'd-math-m5-c-3', 'code' => 'D.M5.C.3', 'name' => 'Use math drawings to represent subtraction with up to two decompositions, relate drawings to...', 'url' => 'd.php?d-math-m5-c-3'],
                    ['id' => 'd-math-m5-c-4', 'code' => 'D.M5.C.4', 'name' => 'Subtract from multiples of 100 and from numbers with zero in the tens place.', 'url' => 'd.php?d-math-m5-c-4'],
                    ['id' => 'd-math-m5-c-5', 'code' => 'D.M5.C.5', 'name' => 'Subtract from multiples of 100 and from numbers with zero in the tens place.', 'url' => 'd.php?d-math-m5-c-5'],
                    ['id' => 'd-math-m5-c-6', 'code' => 'D.M5.C.6', 'name' => 'Apply and explain alternate methods for subtracting from multiples of 100 and from numbers w...', 'url' => 'd.php?d-math-m5-c-6'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D focuses on the application of the tools and concepts presented in Topics A through C.  Students synthesize their understanding of addition and subtraction strategies and then use that understanding to determine which of those strategies to apply to a variety of problems, including number bond problems and problems with the unknown in all positions (e.g., 200 + ____ = 342 or  ____ – 53 = 400).',
                'skills' => [
                    ['id' => 'd-math-m5-d-1', 'code' => 'D.M5.D.1', 'name' => 'Choose and explain solution strategies and record with a written addition or subtraction met...', 'url' => 'd.php?d-math-m5-d-1'],
                    ['id' => 'd-math-m5-d-2', 'code' => 'D.M5.D.2', 'name' => 'Choose and explain solution strategies and record with a written addition or subtraction met...', 'url' => 'd.php?d-math-m5-d-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Foundations of Multiplication and Division',
        'description' => 'Module 6: Foundations of Multiplication and Division for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A begins at the concrete level as students use objects to create equal groups, providing a foundation for the construction of arrays in Topic B.  In Lesson 1, for example, students are given 12 counters, such as teddy bears, pebbles, or beans, and they are asked to put them into groups of 3, thereby creating 4 equal groups of 3 objects.',
                'skills' => [
                    ['id' => 'd-math-m6-a-1', 'code' => 'D.M6.A.1', 'name' => 'Use manipulatives to create equal groups.', 'url' => 'd.php?d-math-m6-a-1'],
                    ['id' => 'd-math-m6-a-2', 'code' => 'D.M6.A.2', 'name' => 'Use math drawings to represent equal groups, and relate to repeated addition.', 'url' => 'd.php?d-math-m6-a-2'],
                    ['id' => 'd-math-m6-a-3', 'code' => 'D.M6.A.3', 'name' => 'Use math drawings to represent equal groups, and relate to repeated addition.', 'url' => 'd.php?d-math-m6-a-3'],
                    ['id' => 'd-math-m6-a-4', 'code' => 'D.M6.A.4', 'name' => 'Represent equal groups with tape diagrams, and relate to repeated addition.', 'url' => 'd.php?d-math-m6-a-4'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B focuses on spatial relationships and structuring as students organize equal groups (from Topic A) into rectangular arrays.  They build small arrays (up to 5 by 5) and use repeated addition of the number in each row or column (i.e., group) to find the total.',
                'skills' => [
                    ['id' => 'd-math-m6-b-1', 'code' => 'D.M6.B.1', 'name' => 'Compose arrays from rows and columns, and count to find the total using objects.', 'url' => 'd.php?d-math-m6-b-1'],
                    ['id' => 'd-math-m6-b-2', 'code' => 'D.M6.B.2', 'name' => 'Decompose arrays into rows and columns, and relate to repeated addition.', 'url' => 'd.php?d-math-m6-b-2'],
                    ['id' => 'd-math-m6-b-3', 'code' => 'D.M6.B.3', 'name' => 'Represent arrays and distinguish rows and columns using math drawings.', 'url' => 'd.php?d-math-m6-b-3'],
                    ['id' => 'd-math-m6-b-4', 'code' => 'D.M6.B.4', 'name' => 'Create arrays using square tiles with gaps.', 'url' => 'd.php?d-math-m6-b-4'],
                    ['id' => 'd-math-m6-b-5', 'code' => 'D.M6.B.5', 'name' => 'Solve word problems involving addition of equal groups in rows and columns.', 'url' => 'd.php?d-math-m6-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C naturally follows Topic B, where students composed and manipulated the rows and columns of an array.  Topic C is designed to deepen students’ understanding of spatial structuring as they build and partition rectangles with rows and columns of same-size squares.',
                'skills' => [
                    ['id' => 'd-math-m6-c-1', 'code' => 'D.M6.C.1', 'name' => 'Use square tiles to compose a rectangle, and relate to the array model.', 'url' => 'd.php?d-math-m6-c-1'],
                    ['id' => 'd-math-m6-c-2', 'code' => 'D.M6.C.2', 'name' => 'Use square tiles to compose a rectangle, and relate to the array model.', 'url' => 'd.php?d-math-m6-c-2'],
                    ['id' => 'd-math-m6-c-3', 'code' => 'D.M6.C.3', 'name' => 'Use math drawings to compose a rectangle with square tiles.', 'url' => 'd.php?d-math-m6-c-3'],
                    ['id' => 'd-math-m6-c-4', 'code' => 'D.M6.C.4', 'name' => 'Use square tiles to decompose a rectangle.', 'url' => 'd.php?d-math-m6-c-4'],
                    ['id' => 'd-math-m6-c-5', 'code' => 'D.M6.C.5', 'name' => 'Use scissors to partition a rectangle into same-size squares, and compose arrays with the sq...', 'url' => 'd.php?d-math-m6-c-5'],
                    ['id' => 'd-math-m6-c-6', 'code' => 'D.M6.C.6', 'name' => 'Use math drawings to partition a rectangle with square tiles, and relate to repeated addition.', 'url' => 'd.php?d-math-m6-c-6'],
                    ['id' => 'd-math-m6-c-7', 'code' => 'D.M6.C.7', 'name' => 'Use grid paper to create designs to develop spatial structuring.', 'url' => 'd.php?d-math-m6-c-7'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'd-math-m6-d-1', 'code' => 'D.M6.D.1', 'name' => 'Relate doubles to even numbers, and write number sentences to express the sums.', 'url' => 'd.php?d-math-m6-d-1'],
                    ['id' => 'd-math-m6-d-2', 'code' => 'D.M6.D.2', 'name' => 'Pair objects and skip-count to relate to even numbers.', 'url' => 'd.php?d-math-m6-d-2'],
                    ['id' => 'd-math-m6-d-3', 'code' => 'D.M6.D.3', 'name' => 'Investigate the pattern of even numbers: 0, 2, 4, 6, and 8 in the ones place, and relate to ...', 'url' => 'd.php?d-math-m6-d-3'],
                    ['id' => 'd-math-m6-d-4', 'code' => 'D.M6.D.4', 'name' => 'Use rectangular arrays to investigate odd and even numbers.', 'url' => 'd.php?d-math-m6-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 7: Problem Solving with Length, Money, and Data',
        'description' => 'Module 7: Problem Solving with Length, Money, and Data for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m7-a-1', 'code' => 'D.M7.A.1', 'name' => 'Sort and record data into a table using up to four categories; use category counts to solve ...', 'url' => 'd.php?d-math-m7-a-1'],
                    ['id' => 'd-math-m7-a-2', 'code' => 'D.M7.A.2', 'name' => 'Draw and label a picture graph to represent data with up to four categories.', 'url' => 'd.php?d-math-m7-a-2'],
                    ['id' => 'd-math-m7-a-3', 'code' => 'D.M7.A.3', 'name' => 'Draw and label a bar graph to represent data; relate the count scale to the number line.', 'url' => 'd.php?d-math-m7-a-3'],
                    ['id' => 'd-math-m7-a-4', 'code' => 'D.M7.A.4', 'name' => 'Draw a bar graph to represent a given data set.', 'url' => 'd.php?d-math-m7-a-4'],
                    ['id' => 'd-math-m7-a-5', 'code' => 'D.M7.A.5', 'name' => 'Solve word problems using data presented in a bar graph.', 'url' => 'd.php?d-math-m7-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m7-b-1', 'code' => 'D.M7.B.1', 'name' => 'Recognize the value of coins and count up to find their total value.', 'url' => 'd.php?d-math-m7-b-1'],
                    ['id' => 'd-math-m7-b-2', 'code' => 'D.M7.B.2', 'name' => 'Solve word problems involving the total value of a group of coins.', 'url' => 'd.php?d-math-m7-b-2'],
                    ['id' => 'd-math-m7-b-3', 'code' => 'D.M7.B.3', 'name' => 'Solve word problems involving the total value of a group of bills.', 'url' => 'd.php?d-math-m7-b-3'],
                    ['id' => 'd-math-m7-b-4', 'code' => 'D.M7.B.4', 'name' => 'Solve word problems involving different combinations of coins with the same total value.', 'url' => 'd.php?d-math-m7-b-4'],
                    ['id' => 'd-math-m7-b-5', 'code' => 'D.M7.B.5', 'name' => 'Use the fewest number of coins to make a given value.', 'url' => 'd.php?d-math-m7-b-5'],
                    ['id' => 'd-math-m7-b-6', 'code' => 'D.M7.B.6', 'name' => 'Use different strategies to make $1 or make change from $1.', 'url' => 'd.php?d-math-m7-b-6'],
                    ['id' => 'd-math-m7-b-7', 'code' => 'D.M7.B.7', 'name' => 'Solve word problems involving different ways to make change from $1.', 'url' => 'd.php?d-math-m7-b-7'],
                    ['id' => 'd-math-m7-b-8', 'code' => 'D.M7.B.8', 'name' => 'Solve two-step word problems involving dollars or cents with totals within $100 or $1.', 'url' => 'd.php?d-math-m7-b-8'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C reinforces the measurement concepts and skills learned in Module 2, while focusing on customary units.  In Lesson 14, students use an inch tile to measure various objects using iteration.  By connecting to prior learning, students deepen their understanding of a length unit, seeing again that, just as it was with the centimeter cube, the length unit is the distance from one end of the tile (or cube) to the other or from one hash mark to the next.',
                'skills' => [
                    ['id' => 'd-math-m7-c-1', 'code' => 'D.M7.C.1', 'name' => 'Connect measurement with physical units by using iteration with an inch tile to measure.', 'url' => 'd.php?d-math-m7-c-1'],
                    ['id' => 'd-math-m7-c-2', 'code' => 'D.M7.C.2', 'name' => 'Apply concepts to create inch rulers; measure lengths using inch rulers.', 'url' => 'd.php?d-math-m7-c-2'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D builds upon the work students completed in Module 2 with centimeter units, as students now explore measurement using both customary and metric units.  In Lesson 16, students rotate through various centers and measure a variety of objects with inch rulers and yardsticks, strategically choosing the appropriate measurement tool and units for measuring a given object (2.MD.1).  By doing so, they develop mental images of customary benchmark lengths.',
                'skills' => [
                    ['id' => 'd-math-m7-d-1', 'code' => 'D.M7.D.1', 'name' => 'Measure various objects using inch rulers and yardsticks.', 'url' => 'd.php?d-math-m7-d-1'],
                    ['id' => 'd-math-m7-d-2', 'code' => 'D.M7.D.2', 'name' => 'Develop estimation strategies by applying prior knowledge of length and using mental benchma...', 'url' => 'd.php?d-math-m7-d-2'],
                    ['id' => 'd-math-m7-d-3', 'code' => 'D.M7.D.3', 'name' => 'Measure an object twice using different length units and compare; relate measurement to unit...', 'url' => 'd.php?d-math-m7-d-3'],
                    ['id' => 'd-math-m7-d-4', 'code' => 'D.M7.D.4', 'name' => 'Measure to compare the differences in lengths using inches, feet, and yards.', 'url' => 'd.php?d-math-m7-d-4'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'd-math-m7-e-1', 'code' => 'D.M7.E.1', 'name' => 'Solve two-digit addition and subtraction word problems involving length by using tape diagra...', 'url' => 'd.php?d-math-m7-e-1'],
                    ['id' => 'd-math-m7-e-2', 'code' => 'D.M7.E.2', 'name' => 'Identify unknown numbers on a number line diagram by using the distance between numbers and ...', 'url' => 'd.php?d-math-m7-e-2'],
                    ['id' => 'd-math-m7-e-3', 'code' => 'D.M7.E.3', 'name' => 'Represent two-digit sums and differences involving length by using the ruler as a number line.', 'url' => 'd.php?d-math-m7-e-3'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'd-math-m7-f-1', 'code' => 'D.M7.F.1', 'name' => 'Collect and record measurement data in a table; answer questions and summarize the data set.', 'url' => 'd.php?d-math-m7-f-1'],
                    ['id' => 'd-math-m7-f-2', 'code' => 'D.M7.F.2', 'name' => 'Draw a line plot to represent the measurement data; relate the measurement scale to the numb...', 'url' => 'd.php?d-math-m7-f-2'],
                    ['id' => 'd-math-m7-f-3', 'code' => 'D.M7.F.3', 'name' => 'Draw a line plot to represent a given data set; answer questions and draw conclusions based ...', 'url' => 'd.php?d-math-m7-f-3'],
                    ['id' => 'd-math-m7-f-4', 'code' => 'D.M7.F.4', 'name' => 'Draw a line plot to represent a given data set; answer questions and draw conclusions based ...', 'url' => 'd.php?d-math-m7-f-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 8: Time, Shapes, and Fractions as Equal Parts of Shapes',
        'description' => 'Module 8: Time, Shapes, and Fractions as Equal Parts of Shapes for 2nd Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'd-math-m8-a-1', 'code' => 'D.M8.A.1', 'name' => 'Describe two-dimensional shapes based on attributes.', 'url' => 'd.php?d-math-m8-a-1'],
                    ['id' => 'd-math-m8-a-2', 'code' => 'D.M8.A.2', 'name' => 'Build, identify, and analyze two-dimensional shapes with specified attributes.', 'url' => 'd.php?d-math-m8-a-2'],
                    ['id' => 'd-math-m8-a-3', 'code' => 'D.M8.A.3', 'name' => 'Use attributes to draw different polygons including triangles, quadrilaterals, pentagons, an...', 'url' => 'd.php?d-math-m8-a-3'],
                    ['id' => 'd-math-m8-a-4', 'code' => 'D.M8.A.4', 'name' => 'Use attributes to identify and draw different quadrilaterals including rectangles, rhombuses...', 'url' => 'd.php?d-math-m8-a-4'],
                    ['id' => 'd-math-m8-a-5', 'code' => 'D.M8.A.5', 'name' => 'Relate the square to the cube, and describe the cube based on attributes.', 'url' => 'd.php?d-math-m8-a-5'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'd-math-m8-b-1', 'code' => 'D.M8.B.1', 'name' => 'Combine shapes to create a composite shape; create a new shape from composite shapes.', 'url' => 'd.php?d-math-m8-b-1'],
                    ['id' => 'd-math-m8-b-2', 'code' => 'D.M8.B.2', 'name' => 'Interpret equal shares in composite shapes as halves, thirds, and fourths.', 'url' => 'd.php?d-math-m8-b-2'],
                    ['id' => 'd-math-m8-b-3', 'code' => 'D.M8.B.3', 'name' => 'Interpret equal shares in composite shapes as halves, thirds, and fourths.', 'url' => 'd.php?d-math-m8-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C focuses on partitioning circles and rectangles into equal fractional parts.  In Lesson 9, students are introduced to partitioning shapes into two equal shares, or halves, using both circles and rectangles.  First, partners choose different ways to fold a sheet of paper in half.  Then, they label and share their halves, discovering that though they each folded their rectangle differently, they each have two equal parts of the original whole.  Next, they cut out a circle and fold, color, and label one half.  They then rotate their circles and discover that halves are determined by equal parts, not by the orientation of the line.  Finally, students look at pictures of partitioned shapes and discuss whether the shaded (or unshaded) portion is or is not two equal shares.  To encourage student reasoning about equal shares, a variety of partitions and orientations are used.',
                'skills' => [
                    ['id' => 'd-math-m8-c-1', 'code' => 'D.M8.C.1', 'name' => 'Partition circles and rectangles into equal parts, and describe those parts as halves, third...', 'url' => 'd.php?d-math-m8-c-1'],
                    ['id' => 'd-math-m8-c-2', 'code' => 'D.M8.C.2', 'name' => 'Partition circles and rectangles into equal parts, and describe those parts as halves, third...', 'url' => 'd.php?d-math-m8-c-2'],
                    ['id' => 'd-math-m8-c-3', 'code' => 'D.M8.C.3', 'name' => 'Describe a whole by the number of equal parts including 2 halves, 3 thirds, and 4 fourths.', 'url' => 'd.php?d-math-m8-c-3'],
                    ['id' => 'd-math-m8-c-4', 'code' => 'D.M8.C.4', 'name' => 'Recognize that equal parts of an identical rectangle can have different shapes.', 'url' => 'd.php?d-math-m8-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'd-math-m8-d-1', 'code' => 'D.M8.D.1', 'name' => 'Construct a paper clock by partitioning a circle into halves and quarters, and tell time to ...', 'url' => 'd.php?d-math-m8-d-1'],
                    ['id' => 'd-math-m8-d-2', 'code' => 'D.M8.D.2', 'name' => 'Tell time to the nearest five minutes.', 'url' => 'd.php?d-math-m8-d-2'],
                    ['id' => 'd-math-m8-d-3', 'code' => 'D.M8.D.3', 'name' => 'Tell time to the nearest five minutes; relate a.m. and p.m. totime of day.', 'url' => 'd.php?d-math-m8-d-3'],
                    ['id' => 'd-math-m8-d-4', 'code' => 'D.M8.D.4', 'name' => 'Solve elapsed time problems involving whole hours and a half hour.', 'url' => 'd.php?d-math-m8-d-4'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
