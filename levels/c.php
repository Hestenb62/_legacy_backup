<?php
/**
 * Hesten's Learning - Level C (1st Grade)
 * Complete EngageNY / Eureka Math buildout.
 */

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string (e.g. ?c-math-m1-a-1 or ?lesson=c-math-m1-a-1)
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
    $levelUrl = 'c.php';
    $levelTitle = 'Level C';
    include dirname(__DIR__) . '/src/lesson_renderer.php';
    exit;
}

// Page Metadata
$pageTitle       = "1st Grade Level C | Hesten's Learning";
$pageDescription = "Addition and subtraction within 100, place value concepts, linear measurement, and geometric shapes.";
$pageKeywords    = "1st Grade, elementary math, EngageNY, Eureka Math, problem sets, worksheets";

// Template Variables
$themeColor = 'sky';
$levelId = 'c';
$levelTitle = 'Level C';
$gradeText = '1st Grade';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Addition and subtraction within 100, place value concepts, linear measurement, and geometric shapes.';

$modules = [
    [
        'title' => 'Module 1: Sums and Differences to 10',
        'description' => 'Module 1: Sums and Differences to 10 for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A continues the work of developing this ability with all the numbers within 10 in put together situations, with a special focus on the numbers 6, 7, 8, and 9 in 5-group configurations, since recognizing how much a number needs to make 10 is part of the Kindergarten standards (K.OA.4) and is easier for most children.  Students decompose numbers into two visual sets, or conceptually subitize, and record their decompositions as number bonds.  In Lesson 1, students use the 5-group configuration, as this organization allows students to quickly see, or perceptually subitize, the subset of 5.  Once they have identified that first subset of 5, they can perceptually subitize the other part:',
                'skills' => [
                    ['id' => 'c-math-m1-a-1', 'code' => 'C.M1.A.1', 'name' => 'Analyze and describe embedded numbers (to 10) using 5-groups and number bonds.', 'url' => 'c.php?c-math-m1-a-1'],
                    ['id' => 'c-math-m1-a-2', 'code' => 'C.M1.A.2', 'name' => 'Reason about embedded numbers in varied configurations using number bonds.', 'url' => 'c.php?c-math-m1-a-2'],
                    ['id' => 'c-math-m1-a-3', 'code' => 'C.M1.A.3', 'name' => 'See and describe numbers of objects using 1 more within 5-group configurations.', 'url' => 'c.php?c-math-m1-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'c-math-m1-b-1', 'code' => 'C.M1.B.1', 'name' => 'Represent put together situations with number bonds. Count on from one embedded number or pa...', 'url' => 'c.php?c-math-m1-b-1'],
                    ['id' => 'c-math-m1-b-2', 'code' => 'C.M1.B.2', 'name' => 'Represent put together situations with number bonds. Count on from one embedded number or pa...', 'url' => 'c.php?c-math-m1-b-2'],
                    ['id' => 'c-math-m1-b-3', 'code' => 'C.M1.B.3', 'name' => 'Represent put together situations with number bonds. Count on from one embedded number or pa...', 'url' => 'c.php?c-math-m1-b-3'],
                    ['id' => 'c-math-m1-b-4', 'code' => 'C.M1.B.4', 'name' => 'Represent put together situations with number bonds. Count on from one embedded number or pa...', 'url' => 'c.php?c-math-m1-b-4'],
                    ['id' => 'c-math-m1-b-5', 'code' => 'C.M1.B.5', 'name' => 'Represent all the number pairs of 10 as number bonds from a given scenario, and generate all...', 'url' => 'c.php?c-math-m1-b-5'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'c-math-m1-c-1', 'code' => 'C.M1.C.1', 'name' => 'Solve add to with result unknown and put together with result unknown math stories by drawin...', 'url' => 'c.php?c-math-m1-c-1'],
                    ['id' => 'c-math-m1-c-2', 'code' => 'C.M1.C.2', 'name' => 'Solve put together with result unknown math stories by drawing and using 5-group cards.', 'url' => 'c.php?c-math-m1-c-2'],
                    ['id' => 'c-math-m1-c-3', 'code' => 'C.M1.C.3', 'name' => 'Solve add to with change unknown math stories as a context for counting on by drawing, writi...', 'url' => 'c.php?c-math-m1-c-3'],
                    ['id' => 'c-math-m1-c-4', 'code' => 'C.M1.C.4', 'name' => 'Solve add to with change unknown math stories using 5-group cards.', 'url' => 'c.php?c-math-m1-c-4'],
                    ['id' => 'c-math-m1-c-5', 'code' => 'C.M1.C.5', 'name' => 'Tell put together with result unknown, add to with result unknown, and add to with change un...', 'url' => 'c.php?c-math-m1-c-5'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D affords students the opportunity to solve problems within the simplicity of equations, moving on from the context of story problems.  Continuing on the momentum gained with counting on as it relates to addition in Topic C, students begin Topic D with tracking the number of counts on from a given number by using their fingers and 5-group cards (1.OA.5).',
                'skills' => [
                    ['id' => 'c-math-m1-d-1', 'code' => 'C.M1.D.1', 'name' => 'Count on up to 3 more using numeral and 5-group cards and fingers to track the change.', 'url' => 'c.php?c-math-m1-d-1'],
                    ['id' => 'c-math-m1-d-2', 'code' => 'C.M1.D.2', 'name' => 'Count on up to 3 more using numeral and 5-group cards and fingers to track the change.', 'url' => 'c.php?c-math-m1-d-2'],
                    ['id' => 'c-math-m1-d-3', 'code' => 'C.M1.D.3', 'name' => 'Count on to find the unknown part in missing addend equations such as 6 + __ = 9. Answer, "H...', 'url' => 'c.php?c-math-m1-d-3'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E leads students to a very intentional understanding and application of the equal sign and the commutative property of addition (1.OA.3 and 1.OA.7).  Lessons 17 and 18 ask students to use pictorial representations (pictures and 5-groups) to write expressions and to demonstrate that they are equivalent by using the equal sign.',
                'skills' => [
                    ['id' => 'c-math-m1-e-1', 'code' => 'C.M1.E.1', 'name' => 'Understand the meaning of the equal sign by pairing equivalent expressions and constructing ...', 'url' => 'c.php?c-math-m1-e-1'],
                    ['id' => 'c-math-m1-e-2', 'code' => 'C.M1.E.2', 'name' => 'Understand the meaning of the equal sign by pairing equivalent expressions and constructing ...', 'url' => 'c.php?c-math-m1-e-2'],
                    ['id' => 'c-math-m1-e-3', 'code' => 'C.M1.E.3', 'name' => 'Represent the same story scenario with addends repositioned (the commutative property).', 'url' => 'c.php?c-math-m1-e-3'],
                    ['id' => 'c-math-m1-e-4', 'code' => 'C.M1.E.4', 'name' => 'Apply the commutative property to count on from a larger addend.', 'url' => 'c.php?c-math-m1-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F continues with the theme of more efficient strategies coupled with deep understanding to solve addition problems within 10.  In Lesson 21, students begin to internalize doubles and doubles plus 1 as they work with visual representations of these problems (1.OA.6).',
                'skills' => [
                    ['id' => 'c-math-m1-f-1', 'code' => 'C.M1.F.1', 'name' => 'Visualize and solve doubles and doubles plus 1 with5-group cards.', 'url' => 'c.php?c-math-m1-f-1'],
                    ['id' => 'c-math-m1-f-2', 'code' => 'C.M1.F.2', 'name' => 'Look for and make use of repeated reasoning on the addition chart by solving and analyzing p...', 'url' => 'c.php?c-math-m1-f-2'],
                    ['id' => 'c-math-m1-f-3', 'code' => 'C.M1.F.3', 'name' => 'Look for and make use of structure on the addition chart by looking for and coloring problem...', 'url' => 'c.php?c-math-m1-f-3'],
                    ['id' => 'c-math-m1-f-4', 'code' => 'C.M1.F.4', 'name' => 'Practice to build fluency with facts to 10.', 'url' => 'c.php?c-math-m1-f-4'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G',
                'skills' => [
                    ['id' => 'c-math-m1-g-1', 'code' => 'C.M1.G.1', 'name' => 'Solve add to with change unknown math stories with addition, and relate to subtraction. Mode...', 'url' => 'c.php?c-math-m1-g-1'],
                    ['id' => 'c-math-m1-g-2', 'code' => 'C.M1.G.2', 'name' => 'Count on using the number path to find an unknown part.', 'url' => 'c.php?c-math-m1-g-2'],
                    ['id' => 'c-math-m1-g-3', 'code' => 'C.M1.G.3', 'name' => 'Count on using the number path to find an unknown part.', 'url' => 'c.php?c-math-m1-g-3'],
                ]
            ],
            [
                'letter' => 'H',
                'name' => 'Topic H',
                'skills' => [
                    ['id' => 'c-math-m1-h-1', 'code' => 'C.M1.H.1', 'name' => 'Solve take from with result unknown math stories with math drawings, true number sentences, ...', 'url' => 'c.php?c-math-m1-h-1'],
                    ['id' => 'c-math-m1-h-2', 'code' => 'C.M1.H.2', 'name' => 'Solve take apart with addend unknown math stories with math drawings, equations, and stateme...', 'url' => 'c.php?c-math-m1-h-2'],
                    ['id' => 'c-math-m1-h-3', 'code' => 'C.M1.H.3', 'name' => 'Solve add to with change unknown math stories with drawings, relating addition and subtraction.', 'url' => 'c.php?c-math-m1-h-3'],
                    ['id' => 'c-math-m1-h-4', 'code' => 'C.M1.H.4', 'name' => 'Solve take from with change unknown math stories with drawings.', 'url' => 'c.php?c-math-m1-h-4'],
                    ['id' => 'c-math-m1-h-5', 'code' => 'C.M1.H.5', 'name' => 'Solve put together/take apart with addend unknown math stories.', 'url' => 'c.php?c-math-m1-h-5'],
                ]
            ],
            [
                'letter' => 'I',
                'name' => 'Topic I',
                'skills' => [
                    ['id' => 'c-math-m1-i-1', 'code' => 'C.M1.I.1', 'name' => 'Model 0 less and 1 less pictorially and as subtraction number sentences.', 'url' => 'c.php?c-math-m1-i-1'],
                    ['id' => 'c-math-m1-i-2', 'code' => 'C.M1.I.2', 'name' => 'Model n — n and n — (n — 1) pictorially and as subtraction sentences.', 'url' => 'c.php?c-math-m1-i-2'],
                    ['id' => 'c-math-m1-i-3', 'code' => 'C.M1.I.3', 'name' => 'Relate subtraction facts involving fives and doubles to corresponding decompositions.', 'url' => 'c.php?c-math-m1-i-3'],
                    ['id' => 'c-math-m1-i-4', 'code' => 'C.M1.I.4', 'name' => 'Relate subtraction from 10 to corresponding decompositions.', 'url' => 'c.php?c-math-m1-i-4'],
                    ['id' => 'c-math-m1-i-5', 'code' => 'C.M1.I.5', 'name' => 'Relate subtraction from 9 to corresponding decompositions.', 'url' => 'c.php?c-math-m1-i-5'],
                ]
            ],
            [
                'letter' => 'J',
                'name' => 'Topic J',
                'skills' => [
                    ['id' => 'c-math-m1-j-1', 'code' => 'C.M1.J.1', 'name' => 'Look for and make use of repeated reasoning and structure using the addition chart to solve ...', 'url' => 'c.php?c-math-m1-j-1'],
                    ['id' => 'c-math-m1-j-2', 'code' => 'C.M1.J.2', 'name' => 'Analyze the addition chart to create sets of related addition and subtraction facts.', 'url' => 'c.php?c-math-m1-j-2'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 2: Introduction to Place Value Through Addition and Subtraction Within 20',
        'description' => 'Module 2: Introduction to Place Value Through Addition and Subtraction Within 20 for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A begins with students solving word problems with three addends (1.OA.2) as a way for them to begin to explore the make ten Level 3 strategy in a meaningful context.  With problems that always include at least two numbers that yield 10 when added together, Lesson 1 encourages students to use the associative and commutative properties as they set up and read equations in various ways.  The story problem on the right, for instance, can be solved by adding 1 + 9 first and then adding the five (see image below story problem).',
                'skills' => [
                    ['id' => 'c-math-m2-a-1', 'code' => 'C.M2.A.1', 'name' => 'Solve word problems with three addends, two of which make ten.', 'url' => 'c.php?c-math-m2-a-1'],
                    ['id' => 'c-math-m2-a-2', 'code' => 'C.M2.A.2', 'name' => 'Use the associative and commutative properties to make ten with three addends.', 'url' => 'c.php?c-math-m2-a-2'],
                    ['id' => 'c-math-m2-a-3', 'code' => 'C.M2.A.3', 'name' => 'Make ten when one addend is 9.', 'url' => 'c.php?c-math-m2-a-3'],
                    ['id' => 'c-math-m2-a-4', 'code' => 'C.M2.A.4', 'name' => 'Make ten when one addend is 9.', 'url' => 'c.php?c-math-m2-a-4'],
                    ['id' => 'c-math-m2-a-5', 'code' => 'C.M2.A.5', 'name' => 'Compare efficiency of counting on and making ten when one addend is 9.', 'url' => 'c.php?c-math-m2-a-5'],
                    ['id' => 'c-math-m2-a-6', 'code' => 'C.M2.A.6', 'name' => 'Use the commutative property to make ten.', 'url' => 'c.php?c-math-m2-a-6'],
                    ['id' => 'c-math-m2-a-7', 'code' => 'C.M2.A.7', 'name' => 'Make ten when one addend is 8.', 'url' => 'c.php?c-math-m2-a-7'],
                    ['id' => 'c-math-m2-a-8', 'code' => 'C.M2.A.8', 'name' => 'Make ten when one addend is 8.', 'url' => 'c.php?c-math-m2-a-8'],
                    ['id' => 'c-math-m2-a-9', 'code' => 'C.M2.A.9', 'name' => 'Compare efficiency of counting on and making ten when one addend is 8.', 'url' => 'c.php?c-math-m2-a-9'],
                    ['id' => 'c-math-m2-a-10', 'code' => 'C.M2.A.10', 'name' => 'Solve problems with addends of 7, 8, and 9.', 'url' => 'c.php?c-math-m2-a-10'],
                    ['id' => 'c-math-m2-a-11', 'code' => 'C.M2.A.11', 'name' => 'Share and critique peer solution strategies for put together with total unknown word problems.', 'url' => 'c.php?c-math-m2-a-11'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B focuses on the take from ten Level 3 strategy (1.OA.6).  Students begin with word problems calling on them to subtract 9 from 10 in Lessons 12 and 13, first with concrete objects, then with drawings, and then with number bonds.  The problems students solve are similar to this one:  “Mary has two plates of cookies, one with 10 and one with 2.  At the party, 9 cookies were eaten from the plate with 10 cookies.  How many cookies were left after the party?” (1.OA.1)  10 – 9 = 1 and 1 + 2 = 3.  This allows students to use this take from ten strategy when the ten is already separated for them and in a variety of contexts (concrete, pictorial, 
and abstract), which sets them up for the work of the later lessons of the topic where they must decompose teen numbers on their own to take from ten.',
                'skills' => [
                    ['id' => 'c-math-m2-b-1', 'code' => 'C.M2.B.1', 'name' => 'Solve word problems with subtraction of 9 from 10.', 'url' => 'c.php?c-math-m2-b-1'],
                    ['id' => 'c-math-m2-b-2', 'code' => 'C.M2.B.2', 'name' => 'Solve word problems with subtraction of 9 from 10.', 'url' => 'c.php?c-math-m2-b-2'],
                    ['id' => 'c-math-m2-b-3', 'code' => 'C.M2.B.3', 'name' => 'Model subtraction of 9 from teen numbers.', 'url' => 'c.php?c-math-m2-b-3'],
                    ['id' => 'c-math-m2-b-4', 'code' => 'C.M2.B.4', 'name' => 'Model subtraction of 9 from teen numbers.', 'url' => 'c.php?c-math-m2-b-4'],
                    ['id' => 'c-math-m2-b-5', 'code' => 'C.M2.B.5', 'name' => 'Relate counting on to making ten and taking from ten.', 'url' => 'c.php?c-math-m2-b-5'],
                    ['id' => 'c-math-m2-b-6', 'code' => 'C.M2.B.6', 'name' => 'Model subtraction of 8 from teen numbers.', 'url' => 'c.php?c-math-m2-b-6'],
                    ['id' => 'c-math-m2-b-7', 'code' => 'C.M2.B.7', 'name' => 'Model subtraction of 8 from teen numbers.', 'url' => 'c.php?c-math-m2-b-7'],
                    ['id' => 'c-math-m2-b-8', 'code' => 'C.M2.B.8', 'name' => 'Compare efficiency of counting on and taking from ten.', 'url' => 'c.php?c-math-m2-b-8'],
                    ['id' => 'c-math-m2-b-9', 'code' => 'C.M2.B.9', 'name' => 'Subtract 7, 8, and 9 from teen numbers.', 'url' => 'c.php?c-math-m2-b-9'],
                    ['id' => 'c-math-m2-b-10', 'code' => 'C.M2.B.10', 'name' => 'Share and critique peer solution strategies for take from with result unknown and take apart...', 'url' => 'c.php?c-math-m2-b-10'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C provides students with practice solving add to with change unknown, take from with change unknown, put together with addend unknown, and take apart with addend unknown word problems (1.OA.1).  Drawing on the momentum gained from Topic B, Lesson 22 allows students to attack put together/take apart  with addend unknown word problems such as, “Maria has 15 baseballs.  Eight of them are old, and some of them are brand new.  How many brand new baseballs does Maria have?”  Students solve these problems using both the Level 2 counting on strategy and Level 3 subtraction strategies (1.OA.4).',
                'skills' => [
                    ['id' => 'c-math-m2-c-1', 'code' => 'C.M2.C.1', 'name' => 'Solve put together/take apart with addend unknown word problems, and relate counting on to t...', 'url' => 'c.php?c-math-m2-c-1'],
                    ['id' => 'c-math-m2-c-2', 'code' => 'C.M2.C.2', 'name' => 'Solve add to with change unknown problems, relating varied addition and subtraction strategies.', 'url' => 'c.php?c-math-m2-c-2'],
                    ['id' => 'c-math-m2-c-3', 'code' => 'C.M2.C.3', 'name' => 'Strategize to solve take from with change unknown problems.', 'url' => 'c.php?c-math-m2-c-3'],
                    ['id' => 'c-math-m2-c-4', 'code' => 'C.M2.C.4', 'name' => 'Strategize and apply understanding of the equal sign to solve equivalent expressions.', 'url' => 'c.php?c-math-m2-c-4'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D closes the module with students renaming ten as a unit:  a ten (1.NBT.2a).  This is the very first time students are introduced to this language of ten as a unit, so this is exciting!  The unit of ten is the foundation for our whole number system wherein all units are composed of ten of the adjacent unit on the place value chart.',
                'skills' => [
                    ['id' => 'c-math-m2-d-1', 'code' => 'C.M2.D.1', 'name' => 'Identify 1 ten as a unit by renaming representations of 10.', 'url' => 'c.php?c-math-m2-d-1'],
                    ['id' => 'c-math-m2-d-2', 'code' => 'C.M2.D.2', 'name' => 'Solve addition and subtraction problems decomposing and composing teen numbers as 1 ten and ...', 'url' => 'c.php?c-math-m2-d-2'],
                    ['id' => 'c-math-m2-d-3', 'code' => 'C.M2.D.3', 'name' => 'Solve addition problems using ten as a unit, and write two-step solutions.', 'url' => 'c.php?c-math-m2-d-3'],
                    ['id' => 'c-math-m2-d-4', 'code' => 'C.M2.D.4', 'name' => 'Solve subtraction problems using ten as a unit, and write two-step solutions.', 'url' => 'c.php?c-math-m2-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 3: Ordering and Comparing Length Measurements as Numbers',
        'description' => 'Module 3: Ordering and Comparing Length Measurements as Numbers for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'c-math-m3-a-1', 'code' => 'C.M3.A.1', 'name' => 'Compare length directly and consider the importance of aligning endpoints.', 'url' => 'c.php?c-math-m3-a-1'],
                    ['id' => 'c-math-m3-a-2', 'code' => 'C.M3.A.2', 'name' => 'Compare length using indirect comparison by finding objects longer than, shorter than, and e...', 'url' => 'c.php?c-math-m3-a-2'],
                    ['id' => 'c-math-m3-a-3', 'code' => 'C.M3.A.3', 'name' => 'Order three lengths using indirect comparison.', 'url' => 'c.php?c-math-m3-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B adds a new level of precision to measurement by introducing the idea of a length unit.  In Lesson 4, centimeter cubes are laid alongside the length of objects as students learn that the total number of cubes laid end to end with no gaps or overlaps is the length measure of that object.  The objects being measured by students include many of the same objects measured in Topic A so that students can add greater precision to their measurements as they specify the number of units equal to the length of the objects being compared.  For example, the length of the crayon can now be described not only as shorter than the paper strip, but more precisely as 9 centimeter cubes (1.MD.2).',
                'skills' => [
                    ['id' => 'c-math-m3-b-1', 'code' => 'C.M3.B.1', 'name' => 'Express the length of an object using centimeter cubes as length units to measure with no ga...', 'url' => 'c.php?c-math-m3-b-1'],
                    ['id' => 'c-math-m3-b-2', 'code' => 'C.M3.B.2', 'name' => 'Rename and measure with centimeter cubes, using their standard unit name of centimeters.', 'url' => 'c.php?c-math-m3-b-2'],
                    ['id' => 'c-math-m3-b-3', 'code' => 'C.M3.B.3', 'name' => 'Order, measure, and compare the length of objects before and after measuring with centimeter...', 'url' => 'c.php?c-math-m3-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C gives students a chance to explore the usefulness of measuring with similar units.  The topic opens with Lesson 7 where students measure the same objects from Topic B using two different non-standard length units simultaneously, such as toothpicks and small paper clips (1.MD.2).  They then use small paper clips and large paper clips, two non-standard units that happen to be the same object but different lengths.  Each time they measure one object using both units, they receive inconsistent measurement results.  Students then begin to ask the question, “Why do we measure with same-sized length units?”  As they explore why it is so important to use the same-sized length unit, they realize that doing so yields consistent measurement results.',
                'skills' => [
                    ['id' => 'c-math-m3-c-1', 'code' => 'C.M3.C.1', 'name' => 'Measure the same objects from Topic B with different non-standard units simultaneously to se...', 'url' => 'c.php?c-math-m3-c-1'],
                    ['id' => 'c-math-m3-c-2', 'code' => 'C.M3.C.2', 'name' => 'Understand the need to use the same units when comparing measurements with others.', 'url' => 'c.php?c-math-m3-c-2'],
                    ['id' => 'c-math-m3-c-3', 'code' => 'C.M3.C.3', 'name' => 'Answer compare with difference unknown problems about lengths of two different objects measu...', 'url' => 'c.php?c-math-m3-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D closes the module as students organize, represent, and interpret personally relevant data in Lesson 10 (1.MD.4).  As students work as a class to collect, sort, and organize data into a graph, they find great purpose and excitement.  They begin to answer, and then ask questions about, the number of data points in a given category and in two categories.',
                'skills' => [
                    ['id' => 'c-math-m3-d-1', 'code' => 'C.M3.D.1', 'name' => 'Collect, sort, and organize data; then ask and answer questions about the number of data poi...', 'url' => 'c.php?c-math-m3-d-1'],
                    ['id' => 'c-math-m3-d-2', 'code' => 'C.M3.D.2', 'name' => 'Collect, sort, and organize data; then ask and answer questions about the number of data poi...', 'url' => 'c.php?c-math-m3-d-2'],
                    ['id' => 'c-math-m3-d-3', 'code' => 'C.M3.D.3', 'name' => 'Ask and answer varied word problem types about a data set with three categories.', 'url' => 'c.php?c-math-m3-d-3'],
                    ['id' => 'c-math-m3-d-4', 'code' => 'C.M3.D.4', 'name' => 'Ask and answer varied word problem types about a data set with three categories.', 'url' => 'c.php?c-math-m3-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 4: Place Value, Comparison, Addition and Subtraction to 40',
        'description' => 'Module 4: Place Value, Comparison, Addition and Subtraction to 40 for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'c-math-m4-a-1', 'code' => 'C.M4.A.1', 'name' => 'Compare the efficiency of counting by ones and counting by tens.', 'url' => 'c.php?c-math-m4-a-1'],
                    ['id' => 'c-math-m4-a-2', 'code' => 'C.M4.A.2', 'name' => 'Use the place value chart to record and name tens and ones within a two-digit number.', 'url' => 'c.php?c-math-m4-a-2'],
                    ['id' => 'c-math-m4-a-3', 'code' => 'C.M4.A.3', 'name' => 'Interpret two-digit numbers as either tens and some ones or as all ones.', 'url' => 'c.php?c-math-m4-a-3'],
                    ['id' => 'c-math-m4-a-4', 'code' => 'C.M4.A.4', 'name' => 'Write and interpret two-digit numbers as addition sentences that combine tens and ones.', 'url' => 'c.php?c-math-m4-a-4'],
                    ['id' => 'c-math-m4-a-5', 'code' => 'C.M4.A.5', 'name' => 'Identify 10 more, 10 less, 1 more, and 1 less than a two-digit number.', 'url' => 'c.php?c-math-m4-a-5'],
                    ['id' => 'c-math-m4-a-6', 'code' => 'C.M4.A.6', 'name' => 'Use dimes and pennies as representations of tens and ones.', 'url' => 'c.php?c-math-m4-a-6'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B begins with Lesson 7, where students identify the greater or lesser of two given numbers.  They first work with concrete materials, whereby they build each quantity (1.NBT.2) and find the greater or lesser number through direct comparison.  They progress to the more abstract comparison of numerals using their understanding of place value to identify the greater or lesser value.  Students begin with comparing numbers such as 39 and 12, where the number of both units in the greater number is more than in the smaller number.  They then compare numbers such as 18 and 40, where they must realize that the place of the 4 explains the greater value of 40.  4 tens is greater than 1 ten 8 ones.',
                'skills' => [
                    ['id' => 'c-math-m4-b-1', 'code' => 'C.M4.B.1', 'name' => 'Compare two quantities, and identify the greater or lesser of the two given numerals.', 'url' => 'c.php?c-math-m4-b-1'],
                    ['id' => 'c-math-m4-b-2', 'code' => 'C.M4.B.2', 'name' => 'Compare quantities and numerals from left to right.', 'url' => 'c.php?c-math-m4-b-2'],
                    ['id' => 'c-math-m4-b-3', 'code' => 'C.M4.B.3', 'name' => 'Use the symbols >, =, and < to compare quantities and numerals.', 'url' => 'c.php?c-math-m4-b-3'],
                    ['id' => 'c-math-m4-b-4', 'code' => 'C.M4.B.4', 'name' => 'Use the symbols >, =, and < to compare quantities and numerals.', 'url' => 'c.php?c-math-m4-b-4'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'c-math-m4-c-1', 'code' => 'C.M4.C.1', 'name' => 'Add and subtract tens from a multiple of 10.', 'url' => 'c.php?c-math-m4-c-1'],
                    ['id' => 'c-math-m4-c-2', 'code' => 'C.M4.C.2', 'name' => 'Add tens to a two-digit number.', 'url' => 'c.php?c-math-m4-c-2'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D begins with students applying the Module 2 strategies of counting on and making ten to larger numbers, this time making a ten that is built on a structure of other tens.  In Lesson 13, students use linking cubes as a concrete representation of the numbers, write a matching number sentence, and write the total in a place value chart.  As they add cubes, students see that sometimes a new ten can be made, for example, 
33 + 7 = 40, or 4 tens.',
                'skills' => [
                    ['id' => 'c-math-m4-d-1', 'code' => 'C.M4.D.1', 'name' => 'Use counting on and the make ten strategy when adding across a ten.', 'url' => 'c.php?c-math-m4-d-1'],
                    ['id' => 'c-math-m4-d-2', 'code' => 'C.M4.D.2', 'name' => 'Use counting on and the make ten strategy when adding across a ten.', 'url' => 'c.php?c-math-m4-d-2'],
                    ['id' => 'c-math-m4-d-3', 'code' => 'C.M4.D.3', 'name' => 'Use single-digit sums to support solutions for analogous sums to 40.', 'url' => 'c.php?c-math-m4-d-3'],
                    ['id' => 'c-math-m4-d-4', 'code' => 'C.M4.D.4', 'name' => 'Add ones and ones or tens and tens.', 'url' => 'c.php?c-math-m4-d-4'],
                    ['id' => 'c-math-m4-d-5', 'code' => 'C.M4.D.5', 'name' => 'Add ones and ones or tens and tens.', 'url' => 'c.php?c-math-m4-d-5'],
                    ['id' => 'c-math-m4-d-6', 'code' => 'C.M4.D.6', 'name' => 'Share and critique peer strategies for adding two-digit numbers.', 'url' => 'c.php?c-math-m4-d-6'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'c-math-m4-e-1', 'code' => 'C.M4.E.1', 'name' => 'Use tape diagrams as representations to solve put together/take apart with total unknown and...', 'url' => 'c.php?c-math-m4-e-1'],
                    ['id' => 'c-math-m4-e-2', 'code' => 'C.M4.E.2', 'name' => 'Recognize and make use of part—whole relationships within tape diagrams when solving a varie...', 'url' => 'c.php?c-math-m4-e-2'],
                    ['id' => 'c-math-m4-e-3', 'code' => 'C.M4.E.3', 'name' => 'Recognize and make use of part—whole relationships within tape diagrams when solving a varie...', 'url' => 'c.php?c-math-m4-e-3'],
                    ['id' => 'c-math-m4-e-4', 'code' => 'C.M4.E.4', 'name' => 'Write word problems of varied types.', 'url' => 'c.php?c-math-m4-e-4'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F',
                'skills' => [
                    ['id' => 'c-math-m4-f-1', 'code' => 'C.M4.F.1', 'name' => 'Interpret two-digit numbers as tens and ones, including cases with more than 9 ones.', 'url' => 'c.php?c-math-m4-f-1'],
                    ['id' => 'c-math-m4-f-2', 'code' => 'C.M4.F.2', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum less than or equal to 10.', 'url' => 'c.php?c-math-m4-f-2'],
                    ['id' => 'c-math-m4-f-3', 'code' => 'C.M4.F.3', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum less than or equal to 10.', 'url' => 'c.php?c-math-m4-f-3'],
                    ['id' => 'c-math-m4-f-4', 'code' => 'C.M4.F.4', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10.', 'url' => 'c.php?c-math-m4-f-4'],
                    ['id' => 'c-math-m4-f-5', 'code' => 'C.M4.F.5', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10.', 'url' => 'c.php?c-math-m4-f-5'],
                    ['id' => 'c-math-m4-f-6', 'code' => 'C.M4.F.6', 'name' => 'Add a pair of two-digit numbers with varied sums in the ones.', 'url' => 'c.php?c-math-m4-f-6'],
                    ['id' => 'c-math-m4-f-7', 'code' => 'C.M4.F.7', 'name' => 'Add a pair of two-digit numbers with varied sums in the ones.', 'url' => 'c.php?c-math-m4-f-7'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 5: Identifying, Composing, and Partitioning Shapes',
        'description' => 'Module 5: Identifying, Composing, and Partitioning Shapes for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A',
                'skills' => [
                    ['id' => 'c-math-m5-a-1', 'code' => 'C.M5.A.1', 'name' => 'Classify shapes based on defining attributes using examples, variants, and non-examples.', 'url' => 'c.php?c-math-m5-a-1'],
                    ['id' => 'c-math-m5-a-2', 'code' => 'C.M5.A.2', 'name' => 'Find and name two-dimensional shapes including trapezoid, rhombus, and a square as a special...', 'url' => 'c.php?c-math-m5-a-2'],
                    ['id' => 'c-math-m5-a-3', 'code' => 'C.M5.A.3', 'name' => 'Find and name three-dimensional shapes including cone and rectangular prism, based on defini...', 'url' => 'c.php?c-math-m5-a-3'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B',
                'skills' => [
                    ['id' => 'c-math-m5-b-1', 'code' => 'C.M5.B.1', 'name' => 'Create composite shapes from two-dimensional shapes.', 'url' => 'c.php?c-math-m5-b-1'],
                    ['id' => 'c-math-m5-b-2', 'code' => 'C.M5.B.2', 'name' => 'Compose a new shape from composite shapes.', 'url' => 'c.php?c-math-m5-b-2'],
                    ['id' => 'c-math-m5-b-3', 'code' => 'C.M5.B.3', 'name' => 'Create a composite shape from three-dimensional shapes and describe the composite shape usin...', 'url' => 'c.php?c-math-m5-b-3'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'c-math-m5-c-1', 'code' => 'C.M5.C.1', 'name' => 'Name and count shapes as parts of a whole, recognizing relative sizes of the parts.', 'url' => 'c.php?c-math-m5-c-1'],
                    ['id' => 'c-math-m5-c-2', 'code' => 'C.M5.C.2', 'name' => 'Partition shapes and identify halves and quarters of circles and rectangles.', 'url' => 'c.php?c-math-m5-c-2'],
                    ['id' => 'c-math-m5-c-3', 'code' => 'C.M5.C.3', 'name' => 'Partition shapes and identify halves and quarters of circles and rectangles.', 'url' => 'c.php?c-math-m5-c-3'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D builds on students’ knowledge of parts of circles to tell time.  In Lesson 10, students count and color the parts on a partitioned circle, forming the base of a paper clock.  Relating this 12-section circle to the clock, students learn about the hour hand and tell time on both analog and digital clocks.',
                'skills' => [
                    ['id' => 'c-math-m5-d-1', 'code' => 'C.M5.D.1', 'name' => 'Construct a paper clock by partitioning a circle and tell time to the hour.', 'url' => 'c.php?c-math-m5-d-1'],
                    ['id' => 'c-math-m5-d-2', 'code' => 'C.M5.D.2', 'name' => 'Recognize halves within a circular clock face and tell time to the half hour.', 'url' => 'c.php?c-math-m5-d-2'],
                    ['id' => 'c-math-m5-d-3', 'code' => 'C.M5.D.3', 'name' => 'Recognize halves within a circular clock face and tell time to the half hour.', 'url' => 'c.php?c-math-m5-d-3'],
                    ['id' => 'c-math-m5-d-4', 'code' => 'C.M5.D.4', 'name' => 'Recognize halves within a circular clock face and tell time to the half hour.', 'url' => 'c.php?c-math-m5-d-4'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Module 6: Place Value, Comparison, Addition and Subtraction to 100',
        'description' => 'Module 6: Place Value, Comparison, Addition and Subtraction to 100 for 1st Grade students.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Topic A of Module 6 opens with students exploring one of the most challenging problem types for their grade level, comparison word problems (see Table 2 below from Counting and Cardinality and Operations and Algebraic Thinking Progressions document, page 9)  (1.OA.1).  Students were informally introduced to the problem type in Module 3 as they analyzed data and compared measurements.  During Module 5, students worked with comparison contexts through Application Problems.  It is with this background that teachers can make informed choices during Module 6 to support students in recognizing and solving comparison word problems.',
                'skills' => [
                    ['id' => 'c-math-m6-a-1', 'code' => 'C.M6.A.1', 'name' => 'Solve compare with difference unknown problem types.', 'url' => 'c.php?c-math-m6-a-1'],
                    ['id' => 'c-math-m6-a-2', 'code' => 'C.M6.A.2', 'name' => 'Solve compare with bigger or smaller unknown problem types.', 'url' => 'c.php?c-math-m6-a-2'],
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Topic B extends students’ use of counting sequences and understanding of tens and ones to numbers up to and including 120.',
                'skills' => [
                    ['id' => 'c-math-m6-b-1', 'code' => 'C.M6.B.1', 'name' => 'Use the place value chart to record and name tens and ones within a two-digit number up to 100.', 'url' => 'c.php?c-math-m6-b-1'],
                    ['id' => 'c-math-m6-b-2', 'code' => 'C.M6.B.2', 'name' => 'Write and interpret two-digit numbers to 100 as addition sentences that combine tens and ones.', 'url' => 'c.php?c-math-m6-b-2'],
                    ['id' => 'c-math-m6-b-3', 'code' => 'C.M6.B.3', 'name' => 'Identify 10 more, 10 less, 1 more, and 1 less than a two-digit number within 100.', 'url' => 'c.php?c-math-m6-b-3'],
                    ['id' => 'c-math-m6-b-4', 'code' => 'C.M6.B.4', 'name' => 'Use the symbols >, =, and < to compare quantities and numerals to 100.', 'url' => 'c.php?c-math-m6-b-4'],
                    ['id' => 'c-math-m6-b-5', 'code' => 'C.M6.B.5', 'name' => 'Count and write numbers to 120. Use Hide Zero cards to relate numbers 0 to 20 to 100 to 120.', 'url' => 'c.php?c-math-m6-b-5'],
                    ['id' => 'c-math-m6-b-6', 'code' => 'C.M6.B.6', 'name' => 'Count to 120 in unit form using only tens and ones. Represent numbers to 120 as tens and one...', 'url' => 'c.php?c-math-m6-b-6'],
                    ['id' => 'c-math-m6-b-7', 'code' => 'C.M6.B.7', 'name' => 'Represent up to 120 objects with a written numeral.', 'url' => 'c.php?c-math-m6-b-7'],
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Topic C',
                'skills' => [
                    ['id' => 'c-math-m6-c-1', 'code' => 'C.M6.C.1', 'name' => 'Add and subtract multiples of 10 from multiples of 10 to 100, including dimes.', 'url' => 'c.php?c-math-m6-c-1'],
                    ['id' => 'c-math-m6-c-2', 'code' => 'C.M6.C.2', 'name' => 'Add a multiple of 10 to any two-digit number within 100.', 'url' => 'c.php?c-math-m6-c-2'],
                    ['id' => 'c-math-m6-c-3', 'code' => 'C.M6.C.3', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum less than or equal to 10.', 'url' => 'c.php?c-math-m6-c-3'],
                    ['id' => 'c-math-m6-c-4', 'code' => 'C.M6.C.4', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10 using decomp...', 'url' => 'c.php?c-math-m6-c-4'],
                    ['id' => 'c-math-m6-c-5', 'code' => 'C.M6.C.5', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10 using decomp...', 'url' => 'c.php?c-math-m6-c-5'],
                    ['id' => 'c-math-m6-c-6', 'code' => 'C.M6.C.6', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10 with drawing...', 'url' => 'c.php?c-math-m6-c-6'],
                    ['id' => 'c-math-m6-c-7', 'code' => 'C.M6.C.7', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10 with drawing...', 'url' => 'c.php?c-math-m6-c-7'],
                    ['id' => 'c-math-m6-c-8', 'code' => 'C.M6.C.8', 'name' => 'Add a pair of two-digit numbers when the ones digits have a sum greater than 10 with drawing...', 'url' => 'c.php?c-math-m6-c-8'],
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Topic D',
                'skills' => [
                    ['id' => 'c-math-m6-d-1', 'code' => 'C.M6.D.1', 'name' => 'Add a pair of two-digit numbers with varied sums in the ones, and compare the results of dif...', 'url' => 'c.php?c-math-m6-d-1'],
                    ['id' => 'c-math-m6-d-2', 'code' => 'C.M6.D.2', 'name' => 'Solve and share strategies for adding two-digit numbers with varied sums.', 'url' => 'c.php?c-math-m6-d-2'],
                ]
            ],
            [
                'letter' => 'E',
                'name' => 'Topic E',
                'skills' => [
                    ['id' => 'c-math-m6-e-1', 'code' => 'C.M6.E.1', 'name' => 'Identify pennies, nickels, and dimes by their image, name, or value. Decompose the values of...', 'url' => 'c.php?c-math-m6-e-1'],
                    ['id' => 'c-math-m6-e-2', 'code' => 'C.M6.E.2', 'name' => 'Identify quarters by their image, name, or value. Decompose the value of a quarter using pen...', 'url' => 'c.php?c-math-m6-e-2'],
                    ['id' => 'c-math-m6-e-3', 'code' => 'C.M6.E.3', 'name' => 'Identify varied coins by their image, name, or value. Add one cent to the value of any coin.', 'url' => 'c.php?c-math-m6-e-3'],
                    ['id' => 'c-math-m6-e-4', 'code' => 'C.M6.E.4', 'name' => 'Count on using pennies from any single coin.', 'url' => 'c.php?c-math-m6-e-4'],
                    ['id' => 'c-math-m6-e-5', 'code' => 'C.M6.E.5', 'name' => 'Use dimes and pennies as representations of numbers to 120.', 'url' => 'c.php?c-math-m6-e-5'],
                ]
            ],
            [
                'letter' => 'F',
                'name' => 'Topic F provides students the opportunity to focus on solving various problem types and to learn from their peers’ strategies.',
                'skills' => [
                    ['id' => 'c-math-m6-f-1', 'code' => 'C.M6.F.1', 'name' => 'Solve compare with bigger or smaller unknown problem types.', 'url' => 'c.php?c-math-m6-f-1'],
                    ['id' => 'c-math-m6-f-2', 'code' => 'C.M6.F.2', 'name' => 'Solve compare with bigger or smaller unknown problem types.', 'url' => 'c.php?c-math-m6-f-2'],
                    ['id' => 'c-math-m6-f-3', 'code' => 'C.M6.F.3', 'name' => 'Share and critique peer strategies for solving problems of varied types.', 'url' => 'c.php?c-math-m6-f-3'],
                ]
            ],
            [
                'letter' => 'G',
                'name' => 'Topic G culminates not only Module 6, but also a full year of learning for Grade 1 students.  It is a joyous celebration of the great progress of all students.  During each lesson, students recognize how much they know now in comparison with the start of the year.  They celebrate this learning by using their acquired skills and knowledge to enjoy entertaining games and activities with their peers.',
                'skills' => [
                    ['id' => 'c-math-m6-g-1', 'code' => 'C.M6.G.1', 'name' => 'Celebrate progress in fluency with adding and subtracting within 10 (and 20). Organize engag...', 'url' => 'c.php?c-math-m6-g-1'],
                    ['id' => 'c-math-m6-g-2', 'code' => 'C.M6.G.2', 'name' => 'Celebrate progress in fluency with adding and subtracting within 10 (and 20). Organize engag...', 'url' => 'c.php?c-math-m6-g-2'],
                    ['id' => 'c-math-m6-g-3', 'code' => 'C.M6.G.3', 'name' => 'Create folder covers for work to be taken home illustrating the year\'s learning.', 'url' => 'c.php?c-math-m6-g-3'],
                ]
            ],
        ]
    ],
];

include dirname(__DIR__) . '/src/level_template.php';
?>
