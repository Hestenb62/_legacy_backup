<?php
/**
 * Hesten's Learning - AP U.S. History (Extra Resources)
 */

$pageTitle       = "AP U.S. History | Hesten's Learning";
$pageDescription = "College-level U.S. history curriculum covering 9 chronological periods, document-based analysis, and historical reasoning skills.";
$pageKeywords    = "APUSH, AP US History, History, DBQ, Document Analysis, College Prep";

$themeColor = 'purple';
$levelId = 'ap-us-history';
$levelTitle = 'AP US History';
$gradeText = 'Extra Resources';
$initialSubject = 'social';
$initialSubjectName = 'Social Studies & History';
$initialSubjectDesc = 'AP U.S. History comprehensive study modules, DBQ preparation, and period reviews.';

$modules = [
    [
        'title' => 'Period 1 & 2: Early Contact & Colonial America (1491–1754)',
        'description' => 'Native American societies, European exploration, transatlantic trade networks, and regional colonial developments.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Pre-Columbian & European Contact',
                'skills' => [
                    ['id' => 'apush-m1-a-1', 'code' => 'AP.1.1', 'name' => 'Native American Societies Before Contact (1491-1607)'],
                    ['id' => 'apush-m1-a-2', 'code' => 'AP.1.2', 'name' => 'European Exploration & The Columbian Exchange']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Colonial Societies & Trade',
                'skills' => [
                    ['id' => 'apush-m1-b-1', 'code' => 'AP.2.1', 'name' => 'Regional Differences in North American Colonies'],
                    ['id' => 'apush-m1-b-2', 'code' => 'AP.2.2', 'name' => 'Transatlantic Trade & The Mercantilist System']
                ]
            ]
        ]
    ],
    [
        'title' => 'Period 3 & 4: Revolution, Nation-Building & Expansion (1754–1848)',
        'description' => 'The French and Indian War, American Revolution, Constitutional Era, Early Republic, and Market Revolution.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'The American Revolution & Constitution',
                'skills' => [
                    ['id' => 'apush-m2-a-1', 'code' => 'AP.3.1', 'name' => 'Causes & Major Events of the American Revolution'],
                    ['id' => 'apush-m2-a-2', 'code' => 'AP.3.2', 'name' => 'Drafting the US Constitution & Bill of Rights']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Democracy & Jacksonian Era',
                'skills' => [
                    ['id' => 'apush-m2-b-1', 'code' => 'AP.4.1', 'name' => 'Rise of Political Parties & Jacksonian Democracy'],
                    ['id' => 'apush-m2-b-2', 'code' => 'AP.4.2', 'name' => 'The Market Revolution & Reform Movements']
                ]
            ]
        ]
    ],
    [
        'title' => 'Period 5 & 6: Civil War, Reconstruction & Gilded Age (1844–1898)',
        'description' => 'Westward expansion, Manifest Destiny, slavery controversies, Civil War, Reconstruction, and industrial rise.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Sectional Crisis & Civil War',
                'skills' => [
                    ['id' => 'apush-m3-a-1', 'code' => 'AP.5.1', 'name' => 'Manifest Destiny & Sectional Crisis of the 1850s'],
                    ['id' => 'apush-m3-a-2', 'code' => 'AP.5.2', 'name' => 'The American Civil War & Emancipation Proclamation'],
                    ['id' => 'apush-m3-a-3', 'code' => 'AP.5.3', 'name' => 'Reconstruction Amendments & Historical Legacy']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'The Gilded Age & Urbanization',
                'skills' => [
                    ['id' => 'apush-m3-b-1', 'code' => 'AP.6.1', 'name' => 'Industrialization, Rise of Big Business, and Labor'],
                    ['id' => 'apush-m3-b-2', 'code' => 'AP.6.2', 'name' => 'Immigration, Urbanization, and Populism']
                ]
            ]
        ]
    ],
    [
        'title' => 'Period 7–9: Modern America & Global Leadership (1890–Present)',
        'description' => 'Progressive Era reforms, WWI & WWII, Great Depression & New Deal, Cold War, Civil Rights, and modern developments.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'World Wars & The Great Depression',
                'skills' => [
                    ['id' => 'apush-m4-a-1', 'code' => 'AP.7.1', 'name' => 'Progressive Movement & US Imperialism'],
                    ['id' => 'apush-m4-a-2', 'code' => 'AP.7.2', 'name' => 'The Great Depression & FDR’s New Deal'],
                    ['id' => 'apush-m4-a-3', 'code' => 'AP.7.3', 'name' => 'World War II & Mobilization on the Home Front']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Cold War & Contemporary America',
                'skills' => [
                    ['id' => 'apush-m4-b-1', 'code' => 'AP.8.1', 'name' => 'Cold War Foreign Policy & Containment'],
                    ['id' => 'apush-m4-b-2', 'code' => 'AP.8.2', 'name' => 'The African American Civil Rights Movement'],
                    ['id' => 'apush-m4-b-3', 'code' => 'AP.9.1', 'name' => 'Post-Cold War World & Globalization']
                ]
            ]
        ]
    ]
];

include '../src/level_template.php';
?>
