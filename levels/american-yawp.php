<?php
/**
 * Hesten's Learning - American Yawp (Extra Resources)
 */

$pageTitle       = "American Yawp | Hesten's Learning";
$pageDescription = "Collaborative, open-source U.S. history textbook featuring comprehensive narratives and primary source reader documents.";
$pageKeywords    = "American Yawp, History, Primary Sources, Textbook, Open Educational Resource";

$themeColor = 'purple';
$levelId = 'american-yawp';
$levelTitle = 'American Yawp';
$gradeText = 'Extra Resources';
$initialSubject = 'social';
$initialSubjectName = 'Open History Textbook & Reader';
$initialSubjectDesc = 'Interactive chapters and primary sources from The American Yawp open curriculum.';

$modules = [
    [
        'title' => 'Volume 1: Before 1877',
        'description' => 'A mass-collaboratively built open U.S. history textbook covering early America to Reconstruction.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Colonial & Revolutionary Era',
                'skills' => [
                    ['id' => 'yawp-m1-a-1', 'code' => 'YAWP.1.1', 'name' => 'Indigenous America & The New World'],
                    ['id' => 'yawp-m1-a-2', 'code' => 'YAWP.1.2', 'name' => 'British North America & Colonial Societies'],
                    ['id' => 'yawp-m1-a-3', 'code' => 'YAWP.1.3', 'name' => 'The American Revolution Narrative']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Antebellum & Civil War',
                'skills' => [
                    ['id' => 'yawp-m1-b-1', 'code' => 'YAWP.1.4', 'name' => 'The Market Revolution & Democracy'],
                    ['id' => 'yawp-m1-b-2', 'code' => 'YAWP.1.5', 'name' => 'The Cotton Kingdom & Slavery in America'],
                    ['id' => 'yawp-m1-b-3', 'code' => 'YAWP.1.6', 'name' => 'The Civil War & Reconstruction Era']
                ]
            ]
        ]
    ],
    [
        'title' => 'Volume 2: After 1877',
        'description' => 'Narrative history from the Gilded Age through the 21st Century.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Industrialization to Mid-Century',
                'skills' => [
                    ['id' => 'yawp-m2-a-1', 'code' => 'YAWP.2.1', 'name' => 'Capital, Labor, and Westward Expansion'],
                    ['id' => 'yawp-m2-a-2', 'code' => 'YAWP.2.2', 'name' => 'World War I & The Progressive Era'],
                    ['id' => 'yawp-m2-a-3', 'code' => 'YAWP.2.3', 'name' => 'The Great Depression & World War II']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Cold War & Contemporary World',
                'skills' => [
                    ['id' => 'yawp-m2-b-1', 'code' => 'YAWP.2.4', 'name' => 'The Cold War & Affluent Society'],
                    ['id' => 'yawp-m2-b-2', 'code' => 'YAWP.2.5', 'name' => 'The Sixties, Civil Rights & Social Reform'],
                    ['id' => 'yawp-m2-b-3', 'code' => 'YAWP.2.6', 'name' => 'Recent History: Globalization & 21st Century']
                ]
            ]
        ]
    ],
    [
        'title' => 'Primary Source Reader',
        'description' => 'Carefully curated primary source documents to accompany every chapter.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Foundational Documents & Speeches',
                'skills' => [
                    ['id' => 'yawp-m3-a-1', 'code' => 'DOC.1', 'name' => 'Early Native & Colonial Document Collection'],
                    ['id' => 'yawp-m3-a-2', 'code' => 'DOC.2', 'name' => 'Revolutionary & Constitutional Papers'],
                    ['id' => 'yawp-m3-a-3', 'code' => 'DOC.3', 'name' => '19th & 20th Century Firsthand Accounts']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>
