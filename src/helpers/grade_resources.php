<?php
/**
 * Hesten's Learning - Grade-Custom Resources Provider
 * Resolves age-appropriate literature, interactive tools, and developmental study tips
 * customized for every academic grade level (Pre-K through 12th Grade and AP).
 */

if (!function_exists('getGradeCustomResources')) {
    function getGradeCustomResources(string $levelId, string $gradeText): array {
        $lvl = strtolower(trim($levelId));

        $resourceMatrix = [
            // Level A: Pre-K
            'a' => [
                'literature' => [
                    [
                        'title' => "Alice's Adventures in Wonderland",
                        'author' => 'Lewis Carroll',
                        'tag' => 'Story Exploration',
                        'url' => '/library/read/index.php?book=alices-adventures-in-wonderland&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#0d9488'
                    ],
                    [
                        'title' => 'The Wonderful Wizard of Oz',
                        'author' => 'L. Frank Baum',
                        'tag' => 'Imagination & Tales',
                        'url' => '/library/read/index.php?book=the-wonderful-wizard-of-oz&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#4f46e5'
                    ],
                    [
                        'title' => 'Language & Phonics Repository',
                        'author' => 'Curriculum Core',
                        'tag' => 'Letter Recognition',
                        'url' => '/library/read/index.php?book=language-facts-repo&chapter=section-1',
                        'icon' => 'fa-font',
                        'color' => '#ec4899'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Virtual Manipulatives',
                        'badge' => 'Hands-On Math',
                        'desc' => 'Ten-frames, counting bears, and color tiles to explore quantities visually.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-shapes',
                        'color' => '#0d9488'
                    ],
                    [
                        'title' => 'Early Learning Games',
                        'badge' => 'Visual Play',
                        'desc' => 'Engaging shape puzzles, color matching, and sound-association activities.',
                        'url' => '/pages/games.php',
                        'icon' => 'fa-puzzle-piece',
                        'color' => '#f59e0b'
                    ],
                    [
                        'title' => 'Skill Diagnostic',
                        'badge' => 'Readiness',
                        'desc' => 'Gentle, low-anxiety check to identify early counting and letter strengths.',
                        'url' => '/assessment/index.php',
                        'icon' => 'fa-star',
                        'color' => '#e11d48'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Tactile Play & Voice',
                    'tip' => 'Count real objects around you (crayons, blocks, fingers) and say number names out loud to connect counting with physical quantities!'
                ]
            ],

            // Level B: Kindergarten
            'b' => [
                'literature' => [
                    [
                        'title' => 'The Wonderful Wizard of Oz',
                        'author' => 'L. Frank Baum',
                        'tag' => 'Read-Aloud Classic',
                        'url' => '/library/read/index.php?book=the-wonderful-wizard-of-oz&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#4f46e5'
                    ],
                    [
                        'title' => "Alice's Adventures in Wonderland",
                        'author' => 'Lewis Carroll',
                        'tag' => 'Early Literacy',
                        'url' => '/library/read/index.php?book=alices-adventures-in-wonderland&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#0d9488'
                    ],
                    [
                        'title' => 'Foundations of Mathematics & Shapes',
                        'author' => 'Curriculum Core',
                        'tag' => 'Geometry Basics',
                        'url' => '/library/read/index.php?book=math-facts-repo&chapter=section-1',
                        'icon' => 'fa-shapes',
                        'color' => '#2563eb'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Virtual Manipulatives',
                        'badge' => 'Ten-Frames',
                        'desc' => 'Interactive 5-frames and 10-frames for counting objects up to 20.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-shapes',
                        'color' => '#4f46e5'
                    ],
                    [
                        'title' => 'Phonics Word Games',
                        'badge' => 'Early Reading',
                        'desc' => 'Rhyming sound builders and sight word discovery puzzles.',
                        'url' => '/pages/games.php',
                        'icon' => 'fa-gamepad',
                        'color' => '#10b981'
                    ],
                    [
                        'title' => 'Kindergarten Skills Hub',
                        'badge' => 'Benchmarks',
                        'desc' => 'Track counting to 100, addition foundations, and phonemic awareness.',
                        'url' => '/pages/skills.php',
                        'icon' => 'fa-check-circle',
                        'color' => '#f59e0b'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Sound It Out & Rhythm',
                    'tip' => 'Break words into individual sounds (phonemes) and tap your fingers to count syllables as you pronounce each sound.'
                ]
            ],

            // Level C: 1st Grade
            'c' => [
                'literature' => [
                    [
                        'title' => 'The Wonderful Wizard of Oz',
                        'author' => 'L. Frank Baum',
                        'tag' => 'Grade 1 Reader',
                        'url' => '/library/read/index.php?book=the-wonderful-wizard-of-oz&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Elementary Math Facts Repository',
                        'author' => 'Curriculum Core',
                        'tag' => 'Operations to 20',
                        'url' => '/library/read/index.php?book=math-facts-repo&chapter=section-1',
                        'icon' => 'fa-calculator',
                        'color' => '#10b981'
                    ],
                    [
                        'title' => 'Language & Grammar Essentials',
                        'author' => 'Curriculum Core',
                        'tag' => 'Sentences & Nouns',
                        'url' => '/library/read/index.php?book=language-facts-repo&chapter=section-1',
                        'icon' => 'fa-pencil-alt',
                        'color' => '#f59e0b'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Interactive Math Clock & Blocks',
                        'badge' => 'Time & Units',
                        'desc' => 'Telling time to the hour and half-hour, plus base-10 unit blocks.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-clock',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Math Practice Workbench',
                        'badge' => 'Operations',
                        'desc' => 'Practice addition and subtraction word problems within 20.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-laptop-code',
                        'color' => '#4f46e5'
                    ],
                    [
                        'title' => 'Word Search Studio',
                        'badge' => 'Spelling',
                        'desc' => 'Customizable high-contrast word searches for 1st-grade spelling words.',
                        'url' => '/pages/word-search.php',
                        'icon' => 'fa-search',
                        'color' => '#0d9488'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Friendly Number Bonds',
                    'tip' => 'Break big numbers into friendly chunks! Remember that 8 + 5 is easier when split as (8 + 2) + 3 = 10 + 3 = 13.'
                ]
            ],

            // Level D: 2nd Grade
            'd' => [
                'literature' => [
                    [
                        'title' => 'The Wonderful Wizard of Oz',
                        'author' => 'L. Frank Baum',
                        'tag' => 'Chapter Book',
                        'url' => '/library/read/index.php?book=the-wonderful-wizard-of-oz&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#0284c7'
                    ],
                    [
                        'title' => 'Anne of Green Gables',
                        'author' => 'L.M. Montgomery',
                        'tag' => 'Classic Fiction',
                        'url' => '/library/read/index.php?book=anne-of-green-gables&chapter=chapter-1',
                        'icon' => 'fa-feather-alt',
                        'color' => '#ec4899'
                    ],
                    [
                        'title' => 'Science Exploration & Living Systems',
                        'author' => 'Curriculum Core',
                        'tag' => 'Habitats & Plants',
                        'url' => '/library/read/index.php?book=science-facts-repo&chapter=section-1',
                        'icon' => 'fa-seedling',
                        'color' => '#10b981'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Place Value Disks & Blocks',
                        'badge' => 'Regrouping',
                        'desc' => 'Virtual base-10 blocks and place value disks for 2-digit column addition.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-th-large',
                        'color' => '#0284c7'
                    ],
                    [
                        'title' => 'Math Practice Workbench',
                        'badge' => 'Fluency',
                        'desc' => 'Step-by-step regrouping drills and skip-counting arrays for Grade 2.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-calculator',
                        'color' => '#f59e0b'
                    ],
                    [
                        'title' => 'Spelling & Word Search Studio',
                        'badge' => 'Vocabulary',
                        'desc' => 'Build reading fluency with 2nd-grade high-frequency word searches.',
                        'url' => '/pages/word-search.php',
                        'icon' => 'fa-font',
                        'color' => '#7c3aed'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Skip-Counting Rhythm',
                    'tip' => 'Practice skip-counting by 2s, 5s, and 10s using clapping rhythms—it builds the mental foundation for multiplication!'
                ]
            ],

            // Level E: 3rd Grade
            'e' => [
                'literature' => [
                    [
                        'title' => 'Anne of Green Gables',
                        'author' => 'L.M. Montgomery',
                        'tag' => 'Literature Study',
                        'url' => '/library/read/index.php?book=anne-of-green-gables&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#0891b2'
                    ],
                    [
                        'title' => 'The Time Machine',
                        'author' => 'H.G. Wells',
                        'tag' => 'Adventure & Sci-Fi',
                        'url' => '/library/read/index.php?book=the-time-machine&chapter=chapter-1',
                        'icon' => 'fa-clock',
                        'color' => '#7c3aed'
                    ],
                    [
                        'title' => 'Math Facts & Multiplication Repository',
                        'author' => 'Curriculum Core',
                        'tag' => 'Multiplication & Division',
                        'url' => '/library/read/index.php?book=math-facts-repo&chapter=section-1',
                        'icon' => 'fa-calculator',
                        'color' => '#16a34a'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Virtual Fraction Bars & Geoboard',
                        'badge' => 'Fractions',
                        'desc' => 'Compare fraction bars, test equivalence, and measure perimeters on geoboards.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-chart-pie',
                        'color' => '#0891b2'
                    ],
                    [
                        'title' => 'Math Vocabulary Explorer',
                        'badge' => 'Glossary & Cards',
                        'desc' => 'Interactive flashcards for multiplication terms, divisors, and fraction parts.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-spell-check',
                        'color' => '#f59e0b'
                    ],
                    [
                        'title' => 'Grammar & Syntax Studio',
                        'badge' => 'Writing Skills',
                        'desc' => 'Practice verbs, tenses, adjectives, and subject-verb agreements.',
                        'url' => '/pages/grammar.php',
                        'icon' => 'fa-pen-fancy',
                        'color' => '#e11d48'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Array Models for Products',
                    'tip' => 'Picture multiplication as rows and columns of equal dots. If 6 × 7 is tough, think (6 × 5) + (6 × 2) = 30 + 12 = 42!'
                ]
            ],

            // Level F: 4th Grade
            'f' => [
                'literature' => [
                    [
                        'title' => 'Adventures of Huckleberry Finn',
                        'author' => 'Mark Twain',
                        'tag' => 'American Classic',
                        'url' => '/library/read/index.php?book=adventures-of-huckleberry-finn&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#16a34a'
                    ],
                    [
                        'title' => 'Anne of Green Gables',
                        'author' => 'L.M. Montgomery',
                        'tag' => 'Character Analysis',
                        'url' => '/library/read/index.php?book=anne-of-green-gables&chapter=chapter-1',
                        'icon' => 'fa-feather-alt',
                        'color' => '#ec4899'
                    ],
                    [
                        'title' => 'Science Facts & Earth Systems',
                        'author' => 'Curriculum Core',
                        'tag' => 'Geology & Weather',
                        'url' => '/library/read/index.php?book=science-facts-repo&chapter=section-1',
                        'icon' => 'fa-globe-americas',
                        'color' => '#2563eb'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Fraction Strips & Protractor',
                        'badge' => 'Geometry & Angles',
                        'desc' => 'Manipulate fraction strips, decompose improper fractions, and measure angles.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-drafting-compass',
                        'color' => '#16a34a'
                    ],
                    [
                        'title' => 'Crossword & Vocabulary Studio',
                        'badge' => 'Cross-Curricular',
                        'desc' => 'Reinforce 4th-grade science, social studies, and academic vocabulary.',
                        'url' => '/pages/crossword.php',
                        'icon' => 'fa-th',
                        'color' => '#f59e0b'
                    ],
                    [
                        'title' => 'Math Practice Workbench',
                        'badge' => 'Multi-Digit Math',
                        'desc' => 'Multi-digit multiplication, long division algorithms, and decimal comparisons.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-calculator',
                        'color' => '#7c3aed'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Fraction Pizza Slices',
                    'tip' => 'When comparing fractions with different denominators, find a common denominator or draw visual benchmark models against 1/2.'
                ]
            ],

            // Level G: 5th Grade
            'g' => [
                'literature' => [
                    [
                        'title' => 'Adventures of Huckleberry Finn',
                        'author' => 'Mark Twain',
                        'tag' => 'Novel Study',
                        'url' => '/library/read/index.php?book=adventures-of-huckleberry-finn&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#059669'
                    ],
                    [
                        'title' => 'The Time Machine',
                        'author' => 'H.G. Wells',
                        'tag' => 'Literary Themes',
                        'url' => '/library/read/index.php?book=the-time-machine&chapter=chapter-1',
                        'icon' => 'fa-clock',
                        'color' => '#7c3aed'
                    ],
                    [
                        'title' => 'The Declaration of Independence',
                        'author' => 'Founding Documents',
                        'tag' => 'Civics Foundations',
                        'url' => '/library/read/index.php?book=the-declaration-of-independence&chapter=chapter-1',
                        'icon' => 'fa-landmark',
                        'color' => '#d97706'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Volume Prisms & Coordinate Grids',
                        'badge' => 'Spatial Math',
                        'desc' => '3D unit cubes, rectangular prism volume models, and (x, y) coordinate planes.',
                        'url' => '/pages/manipulatives.php',
                        'icon' => 'fa-cube',
                        'color' => '#059669'
                    ],
                    [
                        'title' => 'Math Vocabulary Explorer',
                        'badge' => 'Decimals & Volume',
                        'desc' => 'Master terms for decimal place values, powers of 10, and coordinate axes.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-book',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Grammar & Sentence Workshop',
                        'badge' => 'Essay Writing',
                        'desc' => 'Complex conjunctions, prepositional phrases, and multi-paragraph transition words.',
                        'url' => '/pages/grammar.php',
                        'icon' => 'fa-feather-alt',
                        'color' => '#e11d48'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Decimal Shifting with Powers of 10',
                    'tip' => 'Multiplying or dividing by 10, 100, or 1,000 simply slides the decimal point right or left by counting zeros—no long arithmetic needed!'
                ]
            ],

            // Level H: 6th Grade
            'h' => [
                'literature' => [
                    [
                        'title' => 'The Time Machine',
                        'author' => 'H.G. Wells',
                        'tag' => '6th Grade Classic',
                        'url' => '/library/read/index.php?book=the-time-machine&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#7c3aed'
                    ],
                    [
                        'title' => 'Adventures of Huckleberry Finn',
                        'author' => 'Mark Twain',
                        'tag' => 'Historical Fiction',
                        'url' => '/library/read/index.php?book=adventures-of-huckleberry-finn&chapter=chapter-1',
                        'icon' => 'fa-water',
                        'color' => '#0284c7'
                    ],
                    [
                        'title' => 'Science Facts & Physical Laws',
                        'author' => 'Curriculum Core',
                        'tag' => 'Forces & Motion',
                        'url' => '/library/read/index.php?book=science-facts-repo&chapter=section-1',
                        'icon' => 'fa-atom',
                        'color' => '#16a34a'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Middle School Math Workbench',
                        'badge' => 'Ratios & Rates',
                        'desc' => 'Solve unit rate tables, ratio double number lines, and integer arithmetic.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-calculator',
                        'color' => '#7c3aed'
                    ],
                    [
                        'title' => 'Standards Explorer',
                        'badge' => 'CCSS Grade 6',
                        'desc' => 'Direct access to national 6th-grade math and language arts performance standards.',
                        'url' => '/pages/standards.php',
                        'icon' => 'fa-compass',
                        'color' => '#f59e0b'
                    ],
                    [
                        'title' => 'Math Vocabulary Explorer',
                        'badge' => 'Pre-Algebra Terms',
                        'desc' => 'Ratios, unit rates, negative integers, absolute value, and statistical measures of center.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-spell-check',
                        'color' => '#2563eb'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Unit Rate Power',
                    'tip' => 'In ratio and percentage problems, always calculate the value of "1 single unit" first—it unlocks multi-step word problems easily.'
                ]
            ],

            // Level I: 7th Grade
            'i' => [
                'literature' => [
                    [
                        'title' => 'A Tale of Two Cities',
                        'author' => 'Charles Dickens',
                        'tag' => 'World History & ELA',
                        'url' => '/library/read/index.php?book=a-tale-of-two-cities&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#9333ea'
                    ],
                    [
                        'title' => 'Dracula',
                        'author' => 'Bram Stoker',
                        'tag' => 'Gothic Literature',
                        'url' => '/library/read/index.php?book=dracula&chapter=chapter-1',
                        'icon' => 'fa-moon',
                        'color' => '#dc2626'
                    ],
                    [
                        'title' => 'United States Constitution & Civics',
                        'author' => 'Constitutional Convention',
                        'tag' => 'Primary Source',
                        'url' => '/library/read/index.php?book=the-united-states-constitution&chapter=chapter-1',
                        'icon' => 'fa-landmark',
                        'color' => '#d97706'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Middle School Math Workbench',
                        'badge' => 'Proportions',
                        'desc' => 'Solve proportional equations, constant of proportionality (k), and multi-step tax/discount problems.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-percentage',
                        'color' => '#9333ea'
                    ],
                    [
                        'title' => 'Grammar & Syntax Studio',
                        'badge' => 'Clauses & Mechanics',
                        'desc' => 'Master independent vs. dependent clauses, semicolons, and persuasive rhetoric.',
                        'url' => '/pages/grammar.php',
                        'icon' => 'fa-feather-alt',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Diagnostic Assessment Engine',
                        'badge' => 'Mastery Check',
                        'desc' => 'Benchmark 7th-grade math, reading comprehension, and life science skills.',
                        'url' => '/assessment/index.php',
                        'icon' => 'fa-bullseye',
                        'color' => '#16a34a'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Thermometer Negative Numbers',
                    'tip' => 'Picture negative numbers on a vertical thermometer. Subtracting a negative warms things up (moves upward just like addition)!'
                ]
            ],

            // Level J: 8th Grade
            'j' => [
                'literature' => [
                    [
                        'title' => 'A Tale of Two Cities',
                        'author' => 'Charles Dickens',
                        'tag' => 'Classical Novel',
                        'url' => '/library/read/index.php?book=a-tale-of-two-cities&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#c026d3'
                    ],
                    [
                        'title' => 'Pride and Prejudice',
                        'author' => 'Jane Austen',
                        'tag' => 'Literary Analysis',
                        'url' => '/library/read/index.php?book=pride-and-prejudice&chapter=chapter-1',
                        'icon' => 'fa-heart',
                        'color' => '#e11d48'
                    ],
                    [
                        'title' => 'The United States Bill of Rights',
                        'author' => 'Constitutional Framers',
                        'tag' => 'Civics & Rights',
                        'url' => '/library/read/index.php?book=the-united-states-bill-of-rights&chapter=chapter-1',
                        'icon' => 'fa-balance-scale',
                        'color' => '#d97706'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Algebra & Slope Workbench',
                        'badge' => 'Linear Equations',
                        'desc' => 'Graph linear functions (y = mx + b), systems of equations, and Pythagorean theorem models.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-chart-line',
                        'color' => '#c026d3'
                    ],
                    [
                        'title' => 'Math Vocabulary Explorer',
                        'badge' => 'Slope & Scientific Notation',
                        'desc' => 'Terms for rational/irrational numbers, exponent rules, and bivariate data scatter plots.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-square-root-alt',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'High School Transition Explorer',
                        'badge' => 'Readiness',
                        'desc' => 'Preview Grade 9 Algebra I and high school English literature expectations.',
                        'url' => '/pages/standards.php',
                        'icon' => 'fa-graduation-cap',
                        'color' => '#16a34a'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Equation Balance Scale',
                    'tip' => 'Whatever mathematical operation you apply to one side of the equals sign, perform symmetrically on the other side to keep truth intact.'
                ]
            ],

            // Level K: 9th Grade
            'k' => [
                'literature' => [
                    [
                        'title' => 'Romeo and Juliet',
                        'author' => 'William Shakespeare',
                        'tag' => 'Drama & Tragedy',
                        'url' => '/library/read/index.php?book=romeo-and-juliet&chapter=chapter-1',
                        'icon' => 'fa-theater-masks',
                        'color' => '#e11d48'
                    ],
                    [
                        'title' => 'Frankenstein',
                        'author' => 'Mary Shelley',
                        'tag' => 'Gothic Sci-Fi',
                        'url' => '/library/read/index.php?book=frankenstein&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#4f46e5'
                    ],
                    [
                        'title' => 'The American Yawp: Colonial to Civil War',
                        'author' => 'Collaborative Historians',
                        'tag' => 'U.S. History',
                        'url' => '/levels/american-yawp.php',
                        'icon' => 'fa-landmark',
                        'color' => '#d97706'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'High School Math Workbench',
                        'badge' => 'Algebra 1',
                        'desc' => 'Polynomial arithmetic, factoring quadratics, and graphing piecewise functions.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-function',
                        'color' => '#e11d48'
                    ],
                    [
                        'title' => 'Math Vocabulary & Formulas',
                        'badge' => 'Algebraic Structures',
                        'desc' => 'Formal glossary of polynomials, domain/range, and quadratic discriminants.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-calculator',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Standards Mastery Diagnostic',
                        'badge' => 'Freshman Suite',
                        'desc' => 'Comprehensive adaptive assessment aligned with high school graduation requirements.',
                        'url' => '/assessment/index.php',
                        'icon' => 'fa-star',
                        'color' => '#16a34a'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Graph-Equation Duality',
                    'tip' => 'Every algebraic equation has a geometric graph twin. Always sketch a quick curve or coordinate line to verify your symbolic solution!'
                ]
            ],

            // Level L: 10th Grade
            'l' => [
                'literature' => [
                    [
                        'title' => 'The Great Gatsby',
                        'author' => 'F. Scott Fitzgerald',
                        'tag' => 'Modernist Fiction',
                        'url' => '/library/read/index.php?book=the-great-gatsby&chapter=chapter-1',
                        'icon' => 'fa-cocktail',
                        'color' => '#ea580c'
                    ],
                    [
                        'title' => 'The Scarlet Letter',
                        'author' => 'Nathaniel Hawthorne',
                        'tag' => 'Symbolism & Morality',
                        'url' => '/library/read/index.php?book=the-scarlet-letter&chapter=chapter-1',
                        'icon' => 'fa-book-open',
                        'color' => '#dc2626'
                    ],
                    [
                        'title' => 'The Federalist Papers',
                        'author' => 'Hamilton, Madison & Jay',
                        'tag' => 'Civic Analysis',
                        'url' => '/library/read/index.php?book=federalist-papers&chapter=chapter-1',
                        'icon' => 'fa-scroll',
                        'color' => '#d97706'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Geometry Proofs & Trig Workbench',
                        'badge' => 'Geometry',
                        'desc' => 'Right triangle trigonometry (SOH-CAH-TOA), similarity theorems, and coordinate circles.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-shapes',
                        'color' => '#ea580c'
                    ],
                    [
                        'title' => 'Primary Source History Archive',
                        'badge' => 'American Yawp',
                        'desc' => 'Read unedited primary documents from Reconstruction, industrialization, and world conflicts.',
                        'url' => '/levels/american-yawp.php',
                        'icon' => 'fa-landmark',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Grammar & Rhetoric Lab',
                        'badge' => 'Academic Style',
                        'desc' => 'MLA vs. APA comparative style matrix and advanced argumentation punctuation.',
                        'url' => '/pages/grammar.php',
                        'icon' => 'fa-pen-nib',
                        'color' => '#16a34a'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Axiomatic Geometric Justification',
                    'tip' => 'In geometric proofs, state your givens explicitly and justify every transformation with an axiomatic postulate or named theorem.'
                ]
            ],

            // Level M: 11th Grade
            'm' => [
                'literature' => [
                    [
                        'title' => '1984',
                        'author' => 'George Orwell',
                        'tag' => 'Dystopian Classic',
                        'url' => '/library/read/index.php?book=1984&chapter=chapter-1',
                        'icon' => 'fa-eye',
                        'color' => '#d97706'
                    ],
                    [
                        'title' => 'Moby-Dick',
                        'author' => 'Herman Melville',
                        'tag' => 'American Epic',
                        'url' => '/library/read/index.php?book=moby-dick&chapter=chapter-1',
                        'icon' => 'fa-anchor',
                        'color' => '#0284c7'
                    ],
                    [
                        'title' => 'The American Yawp: 20th Century & Cold War',
                        'author' => 'Collaborative Historians',
                        'tag' => 'Modern History',
                        'url' => '/levels/american-yawp.php',
                        'icon' => 'fa-globe-americas',
                        'color' => '#7c3aed'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Advanced Math Workbench',
                        'badge' => 'Pre-Calculus',
                        'desc' => 'Exponential equations, natural logarithms, complex numbers, and unit circle trigonometry.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-chart-area',
                        'color' => '#d97706'
                    ],
                    [
                        'title' => 'College Prep Assessment Engine',
                        'badge' => 'SAT / ACT Readiness',
                        'desc' => 'Targeted high school diagnostic assessments covering advanced algebraic reasoning.',
                        'url' => '/assessment/index.php',
                        'icon' => 'fa-graduation-cap',
                        'color' => '#2563eb'
                    ],
                    [
                        'title' => 'Math Vocabulary & Identities',
                        'badge' => 'Pre-Calculus',
                        'desc' => 'Logarithmic properties, trigonometric identities, and polynomial asymptotic behaviors.',
                        'url' => '/pages/math-vocab.php',
                        'icon' => 'fa-book-open',
                        'color' => '#16a34a'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Derivation vs. Rote Memorization',
                    'tip' => 'Never memorize pre-calculus or trig formulas in isolation—practice re-deriving them from the unit circle so you understand their structure!'
                ]
            ],

            // Level N: 12th Grade
            'n' => [
                'literature' => [
                    [
                        'title' => 'The Republic',
                        'author' => 'Plato',
                        'tag' => 'Philosophy & Ethics',
                        'url' => '/library/read/index.php?book=the-republic-plato&chapter=chapter-1',
                        'icon' => 'fa-landmark',
                        'color' => '#db2777'
                    ],
                    [
                        'title' => 'On Liberty',
                        'author' => 'John Stuart Mill',
                        'tag' => 'Political Theory',
                        'url' => '/library/read/index.php?book=on-liberty&chapter=chapter-1',
                        'icon' => 'fa-balance-scale',
                        'color' => '#7c3aed'
                    ],
                    [
                        'title' => 'The Federalist Papers',
                        'author' => 'Hamilton, Madison & Jay',
                        'tag' => 'Constitutional Philosophy',
                        'url' => '/library/read/index.php?book=federalist-papers&chapter=chapter-1',
                        'icon' => 'fa-scroll',
                        'color' => '#2563eb'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'Calculus & Statistics Workbench',
                        'badge' => 'College Prep',
                        'desc' => 'Calculus limits, continuity, rate of change at a point, and randomized statistical modeling.',
                        'url' => '/student/math-practice.php',
                        'icon' => 'fa-infinity',
                        'color' => '#db2777'
                    ],
                    [
                        'title' => 'Practice GED Equivalency Suite',
                        'badge' => 'Capstone Testing',
                        'desc' => 'Comprehensive equivalency tests across Math, Language Arts, Science, and Social Studies.',
                        'url' => '/levels/practice-ged.php',
                        'icon' => 'fa-award',
                        'color' => '#16a34a'
                    ],
                    [
                        'title' => 'Academic Standards & Capstone Explorer',
                        'badge' => 'Senior Standards',
                        'desc' => 'Verify graduation readiness and college course alignment across state standards.',
                        'url' => '/pages/standards.php',
                        'icon' => 'fa-check-double',
                        'color' => '#f59e0b'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Timed Synthesis & Time Blocks',
                    'tip' => 'Synthesize multiple author perspectives when analyzing historical arguments; test yourself under timed conditions to eliminate exam stress.'
                ]
            ],

            // Level O: AP & College Prep
            'o' => [
                'literature' => [
                    [
                        'title' => 'AP U.S. History Curriculum Hub',
                        'author' => 'College Board Aligned',
                        'tag' => '9 Historical Periods',
                        'url' => '/levels/ap-us-history.php',
                        'icon' => 'fa-graduation-cap',
                        'color' => '#dc2626'
                    ],
                    [
                        'title' => 'The American Yawp Collaborative History',
                        'author' => 'Stanford University Press',
                        'tag' => 'Primary Source Reader',
                        'url' => '/levels/american-yawp.php',
                        'icon' => 'fa-landmark',
                        'color' => '#d97706'
                    ],
                    [
                        'title' => 'The Complete Works of Shakespeare',
                        'author' => 'William Shakespeare',
                        'tag' => 'AP Literature',
                        'url' => '/library/read/index.php?book=complete-works-of-william-shakespeare&chapter=act-1',
                        'icon' => 'fa-theater-masks',
                        'color' => '#7c3aed'
                    ]
                ],
                'tools' => [
                    [
                        'title' => 'AP Document-Based Inquiry (DBQ)',
                        'badge' => 'Historical Analysis',
                        'desc' => 'Practice historical sourcing, contextualization, and cross-document synthesis arguments.',
                        'url' => '/levels/ap-us-history.php',
                        'icon' => 'fa-file-alt',
                        'color' => '#dc2626'
                    ],
                    [
                        'title' => 'Practice GED Equivalency Suite',
                        'badge' => 'High School Equivalency',
                        'desc' => 'Comprehensive preparation for high school graduation and adult learning credentials.',
                        'url' => '/levels/practice-ged.php',
                        'icon' => 'fa-tasks',
                        'color' => '#16a34a'
                    ],
                    [
                        'title' => 'Adaptive Assessment Engine',
                        'badge' => 'Advanced Mastery',
                        'desc' => 'Multi-subject mastery diagnostics measuring standards across high school and AP curricula.',
                        'url' => '/assessment/index.php',
                        'icon' => 'fa-trophy',
                        'color' => '#2563eb'
                    ]
                ],
                'studyTip' => [
                    'title' => 'Document-Based Corroboration',
                    'tip' => 'In DBQ and synthesis essays, pair primary documents that confirm or qualify each other—showing opposing viewpoints demonstrates high-level mastery!'
                ]
            ]
        ];

        return $resourceMatrix[$lvl] ?? $resourceMatrix['k'];
    }
}

