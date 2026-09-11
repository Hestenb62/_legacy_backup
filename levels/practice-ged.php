<?php
/**
 * Hesten's Learning - Practice GED (High School Equivalency Portal)
 * Complete 4-Subject Curriculum: Mathematical Reasoning, RLA, Science, and Social Studies.
 * Integrated with Interactive Formula Sheet, TI-30XS Calculator Simulator, Essay Lab, and Readiness Scale.
 */

$pageTitle       = "Practice GED | Hesten's Learning";
$pageDescription = "Comprehensive prep for the GED equivalency exam covering Mathematical Reasoning, Language Arts (RLA), Science, and Social Studies.";
$pageKeywords    = "GED, High School Equivalency, GED Practice Test, Math Reasoning, RLA, Science, Social Studies, Formula Sheet, TI-30XS";

$themeColor = 'purple';
$levelId = 'practice-ged';
$levelTitle = 'Practice GED';
$gradeText = 'High School Equivalency';
$initialSubject = 'math';
$initialSubjectName = 'GED Test Prep';
$initialSubjectDesc = 'Master all four subtests of the GED exam with full skill practice, diagnostic scoring, and official test tool simulators.';

/* ==========================================================================
   1. MATHEMATICAL REASONING CURRICULUM ($modules)
   ========================================================================== */
$modules = [
    [
        'title' => 'Quantitative Problem Solving & Arithmetic',
        'description' => 'Fractions, decimals, percentages, ratios, proportions, exponents, and order of operations without/with calculator.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Number Operations, Decimals & Percents',
                'skills' => [
                    ['id' => 'ged-m-1-1', 'code' => 'GED.M.1.1', 'name' => 'Order of Operations & Absolute Value with Rational Numbers'],
                    ['id' => 'ged-m-1-2', 'code' => 'GED.M.1.2', 'name' => 'Adding, Subtracting, Multiplying & Dividing Fractions and Mixed Numbers'],
                    ['id' => 'ged-m-1-3', 'code' => 'GED.M.1.3', 'name' => 'Decimal Operations, Place Value & Scientific Notation'],
                    ['id' => 'ged-m-1-4', 'code' => 'GED.M.1.4', 'name' => 'Converting Between Fractions, Decimals, and Percents']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Ratios, Proportions & Percent Applications',
                'skills' => [
                    ['id' => 'ged-m-1-5', 'code' => 'GED.M.1.5', 'name' => 'Unit Rates, Unit Pricing, and Constant of Proportionality'],
                    ['id' => 'ged-m-1-6', 'code' => 'GED.M.1.6', 'name' => 'Solving Multi-Step Ratio and Proportion Word Problems'],
                    ['id' => 'ged-m-1-7', 'code' => 'GED.M.1.7', 'name' => 'Calculating Simple Interest, Tax, Markups, and Discounts'],
                    ['id' => 'ged-m-1-8', 'code' => 'GED.M.1.8', 'name' => 'Percent of Increase, Decrease, and Percent Error']
                ]
            ]
        ]
    ],
    [
        'title' => 'Measurement, Geometry & Pythagorean Theorem',
        'description' => 'Perimeter, area, circumference, surface area, volume of 3D solids, and right triangle trigonometry.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => '2D Shapes, Perimeter & Area',
                'skills' => [
                    ['id' => 'ged-m-2-1', 'code' => 'GED.M.2.1', 'name' => 'Perimeter & Area of Rectangles, Triangles, and Parallelograms'],
                    ['id' => 'ged-m-2-2', 'code' => 'GED.M.2.2', 'name' => 'Area of Trapezoids, Rhombuses, and Composite Figures'],
                    ['id' => 'ged-m-2-3', 'code' => 'GED.M.2.3', 'name' => 'Circumference & Area of Circles Using Pi Approximation'],
                    ['id' => 'ged-m-2-4', 'code' => 'GED.M.2.4', 'name' => 'Scale Drawings, Similar Figures, and Side Proportions']
                ]
            ],
            [
                'letter' => 'B',
                'name' => '3D Solids, Surface Area, Volume & Right Triangles',
                'skills' => [
                    ['id' => 'ged-m-2-5', 'code' => 'GED.M.2.5', 'name' => 'Volume of Rectangular Prisms, Cylinders, and Cones'],
                    ['id' => 'ged-m-2-6', 'code' => 'GED.M.2.6', 'name' => 'Surface Area of Prisms, Pyramids, and Spheres'],
                    ['id' => 'ged-m-2-7', 'code' => 'GED.M.2.7', 'name' => 'Applying the Pythagorean Theorem to Find Missing Side Lengths'],
                    ['id' => 'ged-m-2-8', 'code' => 'GED.M.2.8', 'name' => 'Solving Real-World Geometric Modeling & Construction Problems']
                ]
            ]
        ]
    ],
    [
        'title' => 'Algebraic Problem Solving & Linear Equations',
        'description' => 'Algebraic expressions, linear equations, inequalities, slope, and coordinate graphing.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Expressions & Single-Variable Equations',
                'skills' => [
                    ['id' => 'ged-m-3-1', 'code' => 'GED.M.3.1', 'name' => 'Evaluating, Expanding, and Factoring Algebraic Expressions'],
                    ['id' => 'ged-m-3-2', 'code' => 'GED.M.3.2', 'name' => 'Solving Multi-Step Linear Equations in One Variable'],
                    ['id' => 'ged-m-3-3', 'code' => 'GED.M.3.3', 'name' => 'Solving and Graphing One-Variable Inequalities on a Number Line'],
                    ['id' => 'ged-m-3-4', 'code' => 'GED.M.3.4', 'name' => 'Rearranging Formulas for a Specified Variable']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Coordinate Plane & Linear Functions',
                'skills' => [
                    ['id' => 'ged-m-3-5', 'code' => 'GED.M.3.5', 'name' => 'Finding Slope from Points, Tables, and Linear Graphs'],
                    ['id' => 'ged-m-3-6', 'code' => 'GED.M.3.6', 'name' => 'Graphing Linear Equations in Slope-Intercept Form (y = mx + b)'],
                    ['id' => 'ged-m-3-7', 'code' => 'GED.M.3.7', 'name' => 'Writing Equations of Lines Given Slope and a Point'],
                    ['id' => 'ged-m-3-8', 'code' => 'GED.M.3.8', 'name' => 'Solving Systems of Two Linear Equations by Substitution and Graphing']
                ]
            ]
        ]
    ],
    [
        'title' => 'Functions, Quadratics & Data Interpretation',
        'description' => 'Function notation, quadratic expressions, histograms, scatter plots, box plots, and probability.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Function Concepts & Quadratic Equations',
                'skills' => [
                    ['id' => 'ged-m-4-1', 'code' => 'GED.M.4.1', 'name' => 'Identifying Functions, Domain, and Range from Relations'],
                    ['id' => 'ged-m-4-2', 'code' => 'GED.M.4.2', 'name' => 'Multiplying Polynomials (FOIL Method) and Factoring Trinomials'],
                    ['id' => 'ged-m-4-3', 'code' => 'GED.M.4.3', 'name' => 'Solving Quadratic Equations Using Factoring and Quadratic Formula'],
                    ['id' => 'ged-m-4-4', 'code' => 'GED.M.4.4', 'name' => 'Interpreting Graphs of Quadratic and Non-Linear Functions']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Statistics, Probability & Data Analysis',
                'skills' => [
                    ['id' => 'ged-m-4-5', 'code' => 'GED.M.4.5', 'name' => 'Calculating Mean, Median, Mode, and Weighted Averages'],
                    ['id' => 'ged-m-4-6', 'code' => 'GED.M.4.6', 'name' => 'Interpreting Box Plots, Dot Plots, and Histograms'],
                    ['id' => 'ged-m-4-7', 'code' => 'GED.M.4.7', 'name' => 'Scatter Plots, Trend Lines, and Line of Best Fit'],
                    ['id' => 'ged-m-4-8', 'code' => 'GED.M.4.8', 'name' => 'Simple & Compound Probability, Combinations, and Permutations']
                ]
            ]
        ]
    ]
];

/* ==========================================================================
   2. REASONING THROUGH LANGUAGE ARTS ($ela_modules)
   ========================================================================== */
$ela_modules = [
    [
        'title' => 'Reading Comprehension & Informational Texts',
        'description' => 'Analyzing central ideas, supporting evidence, author intent, tone, and inferences in non-fiction articles.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Main Ideas, Supporting Details & Inferences',
                'skills' => [
                    ['id' => 'ged-r-1-1', 'code' => 'GED.RLA.1.1', 'name' => 'Identifying Central Themes and Main Ideas in Informational Texts'],
                    ['id' => 'ged-r-1-2', 'code' => 'GED.RLA.1.2', 'name' => 'Distinguishing Between Direct Evidence and Implied Inferences'],
                    ['id' => 'ged-r-1-3', 'code' => 'GED.RLA.1.3', 'name' => 'Determining Meaning of Academic and Domain-Specific Words from Context'],
                    ['id' => 'ged-r-1-4', 'code' => 'GED.RLA.1.4', 'name' => 'Summarizing Key Steps in Complex Multi-Paragraph Processes']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Author Purpose, Structure & Perspective',
                'skills' => [
                    ['id' => 'ged-r-1-5', 'code' => 'GED.RLA.1.5', 'name' => 'Analyzing Text Structures (Cause/Effect, Problem/Solution, Chronology)'],
                    ['id' => 'ged-r-1-6', 'code' => 'GED.RLA.1.6', 'name' => 'Evaluating How Author’s Point of View and Tone Shape Content'],
                    ['id' => 'ged-r-1-7', 'code' => 'GED.RLA.1.7', 'name' => 'Assessing Validity of Claims, Reasons, and Empirical Evidence']
                ]
            ]
        ]
    ],
    [
        'title' => 'Literary Text Analysis & Rhetorical Arguments',
        'description' => 'Evaluating narrative themes, character motivations, figurative language, and comparing paired arguments.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Literary Elements & Figurative Language',
                'skills' => [
                    ['id' => 'ged-r-2-1', 'code' => 'GED.RLA.2.1', 'name' => 'Character Development, Motivations, and Conflict in Fiction'],
                    ['id' => 'ged-r-2-2', 'code' => 'GED.RLA.2.2', 'name' => 'Interpreting Metaphors, Similes, Personification, and Irony'],
                    ['id' => 'ged-r-2-3', 'code' => 'GED.RLA.2.3', 'name' => 'Tracing How Setting Influences Plot Dynamics and Resolutions']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Comparing Paired Arguments & Rhetoric',
                'skills' => [
                    ['id' => 'ged-r-2-4', 'code' => 'GED.RLA.2.4', 'name' => 'Comparing Two Conflicting Arguments on the Same Subject'],
                    ['id' => 'ged-r-2-5', 'code' => 'GED.RLA.2.5', 'name' => 'Identifying Logical Fallacies (Ad Hominem, Strawman, False Cause)'],
                    ['id' => 'ged-r-2-6', 'code' => 'GED.RLA.2.6', 'name' => 'Synthesizing Multiple Source Documents to Support a Decision']
                ]
            ]
        ]
    ],
    [
        'title' => 'Language Conventions & Standard English Mechanics',
        'description' => 'Editing for correct sentence structures, agreement, transitions, punctuation, and word choice.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Sentence Structure & Clauses',
                'skills' => [
                    ['id' => 'ged-w-3-1', 'code' => 'GED.RLA.3.1', 'name' => 'Fixing Sentence Fragments, Run-Ons, and Comma Splices'],
                    ['id' => 'ged-w-3-2', 'code' => 'GED.RLA.3.2', 'name' => 'Coordinating and Subordinating Conjunctions for Complex Sentences'],
                    ['id' => 'ged-w-3-3', 'code' => 'GED.RLA.3.3', 'name' => 'Parallel Sentence Structure and Modifier Placement']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Grammar, Usage & Punctuation',
                'skills' => [
                    ['id' => 'ged-w-3-4', 'code' => 'GED.RLA.3.4', 'name' => 'Subject-Verb Agreement with Compound and Collective Subjects'],
                    ['id' => 'ged-w-3-5', 'code' => 'GED.RLA.3.5', 'name' => 'Pronoun-Antecedent Agreement and Pronoun Case Accuracy'],
                    ['id' => 'ged-w-3-6', 'code' => 'GED.RLA.3.6', 'name' => 'Correct Usage of Semicolons, Colons, Commas, and Apostrophes'],
                    ['id' => 'ged-w-3-7', 'code' => 'GED.RLA.3.7', 'name' => 'Distinguishing Frequently Confused Words (Their/There/They’re, Affect/Effect)']
                ]
            ]
        ]
    ],
    [
        'title' => 'Extended Response (Argumentative Essay Lab)',
        'description' => 'Crafting a cohesive 45-minute argumentative essay that analyzes paired passages using textual citations.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Thesis, Outline & Evidence Selection',
                'skills' => [
                    ['id' => 'ged-w-4-1', 'code' => 'GED.RLA.4.1', 'name' => 'Formulating a Clear, Evidence-Based Thesis Statement'],
                    ['id' => 'ged-w-4-2', 'code' => 'GED.RLA.4.2', 'name' => 'Selecting and Quoting Strongest Supporting Evidence from Both Passages'],
                    ['id' => 'ged-w-4-3', 'code' => 'GED.RLA.4.3', 'name' => 'Drafting a 4-to-5 Paragraph Argumentative Essay Blueprint']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Essay Synthesis & Scoring Rubric Alignment',
                'skills' => [
                    ['id' => 'ged-w-4-4', 'code' => 'GED.RLA.4.4', 'name' => 'Trait 1: Creation of Arguments and Use of Evidence (0-2 Pts)'],
                    ['id' => 'ged-w-4-5', 'code' => 'GED.RLA.4.5', 'name' => 'Trait 2: Development of Ideas and Organizational Structure (0-2 Pts)'],
                    ['id' => 'ged-w-4-6', 'code' => 'GED.RLA.4.6', 'name' => 'Trait 3: Clarity and Command of Standard English Conventions (0-2 Pts)']
                ]
            ]
        ]
    ]
];

/* ==========================================================================
   3. SCIENCE REASONING CURRICULUM ($science_modules)
   ========================================================================== */
$science_modules = [
    [
        'title' => 'Life Science, Genetics & Human Biology',
        'description' => 'Cellular biology, genetics, Punnett squares, evolution, photosynthesis, and human organ systems.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Cell Biology, Energy & Photosynthesis',
                'skills' => [
                    ['id' => 'ged-s-1-1', 'code' => 'GED.SCI.1.1', 'name' => 'Cell Structures and Organelles (Nucleus, Mitochondria, Membrane)'],
                    ['id' => 'ged-s-1-2', 'code' => 'GED.SCI.1.2', 'name' => 'Photosynthesis and Cellular Respiration Energy Cycles'],
                    ['id' => 'ged-s-1-3', 'code' => 'GED.SCI.1.3', 'name' => 'Ecosystem Energy Pyramids, Food Webs, and Trophic Levels']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Genetics, Evolution & Human Body',
                'skills' => [
                    ['id' => 'ged-s-1-4', 'code' => 'GED.SCI.1.4', 'name' => 'Punnett Squares, Dominant/Recessive Alleles, and Phenotypes'],
                    ['id' => 'ged-s-1-5', 'code' => 'GED.SCI.1.5', 'name' => 'Natural Selection, Adaptation, and Evolutionary Evidence'],
                    ['id' => 'ged-s-1-6', 'code' => 'GED.SCI.1.6', 'name' => 'Human Circulatory, Respiratory, Nervous, and Immune Systems']
                ]
            ]
        ]
    ],
    [
        'title' => 'Physical Science, Matter & Chemical Reactions',
        'description' => 'Atomic structure, states of matter, chemical equations, conservation of mass, motion, and Newton’s laws.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Matter, Atoms & Periodic Table',
                'skills' => [
                    ['id' => 'ged-s-2-1', 'code' => 'GED.SCI.2.1', 'name' => 'Atoms, Elements, Compounds, and the Periodic Table'],
                    ['id' => 'ged-s-2-2', 'code' => 'GED.SCI.2.2', 'name' => 'Physical vs Chemical Changes and States of Matter Transitions'],
                    ['id' => 'ged-s-2-3', 'code' => 'GED.SCI.2.3', 'name' => 'Balancing Simple Chemical Equations & Conservation of Mass']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Forces, Motion, Work & Energy',
                'skills' => [
                    ['id' => 'ged-s-2-4', 'code' => 'GED.SCI.2.4', 'name' => 'Newton’s Three Laws of Motion and Gravitational Force'],
                    ['id' => 'ged-s-2-5', 'code' => 'GED.SCI.2.5', 'name' => 'Calculating Speed, Velocity, Acceleration, and Momentum'],
                    ['id' => 'ged-s-2-6', 'code' => 'GED.SCI.2.6', 'name' => 'Kinetic vs Potential Energy and Forms of Heat Transfer (Conduction, Convection, Radiation)']
                ]
            ]
        ]
    ],
    [
        'title' => 'Earth, Space & Environmental Systems',
        'description' => 'Plate tectonics, rock cycle, carbon and water cycles, weather systems, and solar system mechanics.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Earth Systems, Cycles & Geology',
                'skills' => [
                    ['id' => 'ged-s-3-1', 'code' => 'GED.SCI.3.1', 'name' => 'Plate Tectonics, Earthquakes, Volcanoes, and Fault Lines'],
                    ['id' => 'ged-s-3-2', 'code' => 'GED.SCI.3.2', 'name' => 'The Water Cycle, Carbon Cycle, and Nitrogen Cycle in Ecosystems'],
                    ['id' => 'ged-s-3-3', 'code' => 'GED.SCI.3.3', 'name' => 'Rock Cycle, Erosion, Weathering, and Fossil Layer Dating']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Weather, Climate & Astronomy',
                'skills' => [
                    ['id' => 'ged-s-3-4', 'code' => 'GED.SCI.3.4', 'name' => 'Atmospheric Layers, Air Pressure, and Weather Fronts'],
                    ['id' => 'ged-s-3-5', 'code' => 'GED.SCI.3.5', 'name' => 'Earth’s Tilt, Seasons, Moon Phases, and Solar/Lunar Eclipses'],
                    ['id' => 'ged-s-3-6', 'code' => 'GED.SCI.3.6', 'name' => 'Human Impact on Climate, Renewable Energy, and Resource Conservation']
                ]
            ]
        ]
    ],
    [
        'title' => 'Scientific Practices & Data Interpretation',
        'description' => 'Scientific method, experimental variables, sample size, hypothesis evaluation, and reading charts.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Experimental Design & Variables',
                'skills' => [
                    ['id' => 'ged-s-4-1', 'code' => 'GED.SCI.4.1', 'name' => 'Identifying Independent, Dependent, and Controlled Variables'],
                    ['id' => 'ged-s-4-2', 'code' => 'GED.SCI.4.2', 'name' => 'Formulating Testable Hypotheses and Designing Controlled Experiments'],
                    ['id' => 'ged-s-4-3', 'code' => 'GED.SCI.4.3', 'name' => 'Evaluating Scientific Sources, Bias, and Flawed Experimental Reasoning']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Data Interpretation & Graph Analysis',
                'skills' => [
                    ['id' => 'ged-s-4-4', 'code' => 'GED.SCI.4.4', 'name' => 'Reading and Interpreting Scientific Line, Bar, and Pie Charts'],
                    ['id' => 'ged-s-4-5', 'code' => 'GED.SCI.4.5', 'name' => 'Extracting Data from Complex Multi-Variable Scientific Tables'],
                    ['id' => 'ged-s-4-6', 'code' => 'GED.SCI.4.6', 'name' => 'Calculating Probability of Experimental Outcomes and Error Margins']
                ]
            ]
        ]
    ]
];

/* ==========================================================================
   4. SOCIAL STUDIES REASONING CURRICULUM ($social_modules)
   ========================================================================== */
$social_modules = [
    [
        'title' => 'Civics, Government & The U.S. Constitution',
        'description' => 'Constitutional principles, separation of powers, Bill of Rights, federalism, and citizen participation.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Principles of American Democracy & Constitution',
                'skills' => [
                    ['id' => 'ged-ss-1-1', 'code' => 'GED.SS.1.1', 'name' => 'Principles of the Declaration of Independence & Popular Sovereignty'],
                    ['id' => 'ged-ss-1-2', 'code' => 'GED.SS.1.2', 'name' => 'Separation of Powers & System of Checks and Balances'],
                    ['id' => 'ged-ss-1-3', 'code' => 'GED.SS.1.3', 'name' => 'The Bill of Rights & Landmark Constitutional Amendments']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Government Branches & Political Process',
                'skills' => [
                    ['id' => 'ged-ss-1-4', 'code' => 'GED.SS.1.4', 'name' => 'Legislative, Executive, and Judicial Branch Functions and Powers'],
                    ['id' => 'ged-ss-1-5', 'code' => 'GED.SS.1.5', 'name' => 'The Electoral Process, Political Parties, and Civic Responsibilities'],
                    ['id' => 'ged-ss-1-6', 'code' => 'GED.SS.1.6', 'name' => 'Federalism: Powers of National, State, and Local Governments']
                ]
            ]
        ]
    ],
    [
        'title' => 'U.S. History & Historical Documents',
        'description' => 'Key historical eras, primary source documents, westward expansion, Civil War, and 20th century movements.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Early America through the Civil War',
                'skills' => [
                    ['id' => 'ged-ss-2-1', 'code' => 'GED.SS.2.1', 'name' => 'Causes of the American Revolution & Articles of Confederation'],
                    ['id' => 'ged-ss-2-2', 'code' => 'GED.SS.2.2', 'name' => 'Westward Expansion, Manifest Destiny, and Native Relocation'],
                    ['id' => 'ged-ss-2-3', 'code' => 'GED.SS.2.3', 'name' => 'Causes and Consequences of the Civil War & Reconstruction Era']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Industrial Era to Modern Times',
                'skills' => [
                    ['id' => 'ged-ss-2-4', 'code' => 'GED.SS.2.4', 'name' => 'Industrial Revolution, Urbanization, and Progressive Era Reforms'],
                    ['id' => 'ged-ss-2-5', 'code' => 'GED.SS.2.5', 'name' => 'The Great Depression, New Deal, and World War I/II Mobilization'],
                    ['id' => 'ged-ss-2-6', 'code' => 'GED.SS.2.6', 'name' => 'The Cold War, Civil Rights Movement, and Modern Global Policy']
                ]
            ]
        ]
    ],
    [
        'title' => 'Economics & Financial Literacy',
        'description' => 'Supply and demand, market structures, fiscal and monetary policies, GDP, inflation, and consumer economics.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Microeconomics, Supply & Demand',
                'skills' => [
                    ['id' => 'ged-ss-3-1', 'code' => 'GED.SS.3.1', 'name' => 'Scarcity, Opportunity Cost, and Productive Resources'],
                    ['id' => 'ged-ss-3-2', 'code' => 'GED.SS.3.2', 'name' => 'Supply, Demand, Equilibrium Price, and Market Shortages/Surpluses'],
                    ['id' => 'ged-ss-3-3', 'code' => 'GED.SS.3.3', 'name' => 'Comparing Market, Command, Traditional, and Mixed Economies']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Macroeconomics, Policy & Trade',
                'skills' => [
                    ['id' => 'ged-ss-3-4', 'code' => 'GED.SS.3.4', 'name' => 'Gross Domestic Product (GDP), Inflation, and Unemployment Rates'],
                    ['id' => 'ged-ss-3-5', 'code' => 'GED.SS.3.5', 'name' => 'Federal Reserve Monetary Policy & Government Fiscal Taxation/Spending'],
                    ['id' => 'ged-ss-3-6', 'code' => 'GED.SS.3.6', 'name' => 'International Trade, Tariffs, Exchange Rates, and Globalization']
                ]
            ]
        ]
    ],
    [
        'title' => 'Geography & World History Analysis',
        'description' => 'Geographic representations, human migration, historical maps, charts, and analyzing political cartoons.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Geographic Tools, Maps & Environment',
                'skills' => [
                    ['id' => 'ged-ss-4-1', 'code' => 'GED.SS.4.1', 'name' => 'Interpreting Topographic, Political, and Thematic Maps'],
                    ['id' => 'ged-ss-4-2', 'code' => 'GED.SS.4.2', 'name' => 'Human Migration Patterns, Push/Pull Factors, and Urbanization'],
                    ['id' => 'ged-ss-4-3', 'code' => 'GED.SS.4.3', 'name' => 'Human Environmental Interaction and Natural Resource Distribution']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Analyzing Historical Documents & Cartoons',
                'skills' => [
                    ['id' => 'ged-ss-4-4', 'code' => 'GED.SS.4.4', 'name' => 'Interpreting Editorial & Political Cartoons (Symbolism, Irony, Caricature)'],
                    ['id' => 'ged-ss-4-5', 'code' => 'GED.SS.4.5', 'name' => 'Comparing Primary vs Secondary Sources and Assessing Author Bias'],
                    ['id' => 'ged-ss-4-6', 'code' => 'GED.SS.4.6', 'name' => 'Analyzing Cause-and-Effect Relationships in Historical Infographics']
                ]
            ]
        ]
    ]
];

/* ==========================================================================
   5. CUSTOM GED HERO EXTENSION & ACTION DOCK ($customLevelHeader)
   ========================================================================== */
ob_start();
?>
<link rel="stylesheet" href="/assets/css/pages/ged-prep.css">

<div class="ged-prep-suite-wrapper" role="region" aria-label="GED Test Prep Readiness and Tools">
    <!-- Readiness Score Scale Banner -->
    <div class="ged-readiness-banner">
        <div class="ged-banner-left">
            <h2>
                <i class="fas fa-user-graduate" style="color: #7c3aed;"></i>
                GED Test Readiness Scale
                <span class="ged-badge-purple">Official 100–200 Scale</span>
            </h2>
            <p>
                Track your real-time performance across all four GED subtests. Standard passing requires <strong>145+</strong>, College Ready is <strong>165+</strong>, and Honors College Credit is <strong>175+</strong>.
            </p>

            <div class="ged-score-scale-track" role="progressbar" aria-valuemin="100" aria-valuemax="200" aria-valuenow="145" aria-label="GED Readiness Score Scale">
                <div class="scale-zone scale-zone-fail" title="Below Passing (<145)"></div>
                <div class="scale-zone scale-zone-pass" title="Passing HSE (145-164)"></div>
                <div class="scale-zone scale-zone-college" title="College Ready (165-174)"></div>
                <div class="scale-zone scale-zone-credit" title="College Ready + Credit (175-200)"></div>
            </div>

            <div class="ged-score-legend">
                <span><span class="legend-dot dot-fail"></span> Below Passing (100–144)</span>
                <span><span class="legend-dot dot-pass"></span> Passing (145–164)</span>
                <span><span class="legend-dot dot-college"></span> College Ready (165–174)</span>
                <span><span class="legend-dot dot-credit"></span> College Credit (175–200)</span>
            </div>
        </div>

        <div class="ged-projected-score-card">
            <span class="projected-score-label">Projected Score</span>
            <span class="projected-score-num" id="ged-projected-score">145</span>
            <span class="projected-score-status" id="ged-projected-status">Passing (Equivalency)</span>
        </div>
    </div>

    <!-- Quick Tools Action Dock -->
    <div class="ged-tools-dock" role="navigation" aria-label="Interactive GED Study Tools">
        <button type="button" class="ged-tool-card" onclick="openGedModal('ged-modal-formula')" aria-haspopup="dialog" aria-expanded="false">
            <div class="ged-tool-icon-box icon-box-blue">
                <i class="fas fa-square-root-alt"></i>
            </div>
            <div class="ged-tool-text">
                <h3>Formula Reference Sheet</h3>
                <p>Official GED Math formulas with interactive MathJax typesetting.</p>
            </div>
        </button>

        <button type="button" class="ged-tool-card" onclick="openGedModal('ged-modal-calculator')" aria-haspopup="dialog" aria-expanded="false">
            <div class="ged-tool-icon-box icon-box-purple">
                <i class="fas fa-calculator"></i>
            </div>
            <div class="ged-tool-text">
                <h3>TI-30XS MultiView Simulator</h3>
                <p>Practice with the official on-screen test scientific calculator.</p>
            </div>
        </button>

        <button type="button" class="ged-tool-card" onclick="openGedModal('ged-modal-essay')" aria-haspopup="dialog" aria-expanded="false">
            <div class="ged-tool-icon-box icon-box-rose">
                <i class="fas fa-feather-alt"></i>
            </div>
            <div class="ged-tool-text">
                <h3>RLA Essay Workbench</h3>
                <p>45-minute timed essay prompt, autosave, and 3-trait scoring rubric.</p>
            </div>
        </button>

        <button type="button" class="ged-tool-card" onclick="openGedModal('ged-modal-strategy')" aria-haspopup="dialog" aria-expanded="false">
            <div class="ged-tool-icon-box icon-box-emerald">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div class="ged-tool-text">
                <h3>High-Yield Test Strategies</h3>
                <p>Pacing, time limits, question weights, and test-day tactics.</p>
            </div>
        </button>
    </div>
</div>
<?php
$customLevelHeader = ob_get_clean();

/* ==========================================================================
   6. CUSTOM MODALS & SCRIPT CONTAINER ($customLevelFooter)
   ========================================================================== */
ob_start();
?>
<!-- MODAL 1: Official Math Formula Sheet -->
<div id="ged-modal-formula" class="ged-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="formula-modal-title" aria-hidden="true">
    <div class="ged-modal-panel">
        <div class="ged-modal-header">
            <h2 id="formula-modal-title"><i class="fas fa-square-root-alt" style="color: #2563eb;"></i> Official GED Mathematical Formula Sheet</h2>
            <button type="button" class="ged-modal-close-btn" onclick="closeGedModal('ged-modal-formula')" aria-label="Close Formula Sheet Modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="ged-modal-body">
            <div class="formula-grid">
                <!-- Area -->
                <div class="formula-card">
                    <h3><i class="fas fa-draw-polygon"></i> Area of 2D Shapes</h3>
                    <div class="formula-item">
                        <span class="formula-label">Rectangle:</span>
                        <div class="formula-math">$$A = lw$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Triangle:</span>
                        <div class="formula-math">$$A = \frac{1}{2}bh$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Parallelogram:</span>
                        <div class="formula-math">$$A = bh$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Trapezoid:</span>
                        <div class="formula-math">$$A = \frac{1}{2}h(b_1 + b_2)$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Circle:</span>
                        <div class="formula-math">$$A = \pi r^2 \quad (\text{Circumference: } C = 2\pi r = \pi d)$$</div>
                    </div>
                </div>

                <!-- Surface Area & Volume -->
                <div class="formula-card">
                    <h3><i class="fas fa-cube"></i> Surface Area & Volume of 3D Solids</h3>
                    <div class="formula-item">
                        <span class="formula-label">Rectangular Prism (Volume):</span>
                        <div class="formula-math">$$V = lwh$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Rectangular Prism (Surface Area):</span>
                        <div class="formula-math">$$SA = 2lw + 2lh + 2wh$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Right Cylinder (Volume):</span>
                        <div class="formula-math">$$V = \pi r^2 h$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Right Cylinder (Surface Area):</span>
                        <div class="formula-math">$$SA = 2\pi rh + 2\pi r^2$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Sphere (Volume):</span>
                        <div class="formula-math">$$V = \frac{4}{3}\pi r^3 \quad (\text{Surface Area: } SA = 4\pi r^2)$$</div>
                    </div>
                </div>

                <!-- Algebra & Coordinate Geometry -->
                <div class="formula-card">
                    <h3><i class="fas fa-chart-line"></i> Algebra & Coordinate Geometry</h3>
                    <div class="formula-item">
                        <span class="formula-label">Slope of a Line:</span>
                        <div class="formula-math">$$m = \frac{y_2 - y_1}{x_2 - x_1}$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Slope-Intercept Form:</span>
                        <div class="formula-math">$$y = mx + b$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Point-Slope Form:</span>
                        <div class="formula-math">$$y - y_1 = m(x - x_1)$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Pythagorean Theorem:</span>
                        <div class="formula-math">$$a^2 + b^2 = c^2$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Quadratic Formula:</span>
                        <div class="formula-math">$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$</div>
                    </div>
                </div>

                <!-- Data & Finance -->
                <div class="formula-card">
                    <h3><i class="fas fa-coins"></i> Data & Financial Formulas</h3>
                    <div class="formula-item">
                        <span class="formula-label">Simple Interest:</span>
                        <div class="formula-math">$$I = Prt$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Mean (Average):</span>
                        <div class="formula-math">$$\text{Mean} = \frac{\sum x}{n}$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Percent of Change:</span>
                        <div class="formula-math">$$\text{Change} = \frac{|\text{New} - \text{Original}|}{\text{Original}} \times 100\%$$</div>
                    </div>
                    <div class="formula-item">
                        <span class="formula-label">Distance / Rate / Time:</span>
                        <div class="formula-math">$$d = rt \quad \left(r = \frac{d}{t}, \; t = \frac{d}{r}\right)$$</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL 2: TI-30XS MultiView Calculator Simulator -->
<div id="ged-modal-calculator" class="ged-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="calc-modal-title" aria-hidden="true">
    <div class="ged-modal-panel">
        <div class="ged-modal-header">
            <h2 id="calc-modal-title"><i class="fas fa-calculator" style="color: #7c3aed;"></i> TI-30XS MultiView Scientific Calculator Simulator</h2>
            <button type="button" class="ged-modal-close-btn" onclick="closeGedModal('ged-modal-calculator')" aria-label="Close Calculator Modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="ged-modal-body">
            <div class="calc-simulator-container">
                <!-- Calculator Shell -->
                <div class="ti-calc-shell">
                    <div class="ti-calc-brand">Texas Instruments TI-30XS</div>
                    <div class="ti-calc-screen" aria-live="polite">
                        <div class="ti-screen-expr" id="ti-expr">0</div>
                        <div class="ti-screen-result" id="ti-result">0</div>
                    </div>
                    <div class="ti-calc-keypad">
                        <button type="button" class="ti-key ti-key-clear" onclick="tiCalcInput('C')">CLEAR</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('DEL')">DEL</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('(')">(</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput(')')">)</button>

                        <button type="button" class="ti-key" onclick="tiCalcInput('^2')">x²</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('^')">^</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('√(')">√</button>
                        <button type="button" class="ti-key ti-key-op" onclick="tiCalcInput('÷')">÷</button>

                        <button type="button" class="ti-key" onclick="tiCalcInput('7')">7</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('8')">8</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('9')">9</button>
                        <button type="button" class="ti-key ti-key-op" onclick="tiCalcInput('×')">×</button>

                        <button type="button" class="ti-key" onclick="tiCalcInput('4')">4</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('5')">5</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('6')">6</button>
                        <button type="button" class="ti-key ti-key-op" onclick="tiCalcInput('-')">-</button>

                        <button type="button" class="ti-key" onclick="tiCalcInput('1')">1</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('2')">2</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('3')">3</button>
                        <button type="button" class="ti-key ti-key-op" onclick="tiCalcInput('+')">+</button>

                        <button type="button" class="ti-key" onclick="tiCalcInput('0')">0</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('.')">.</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('π')">π</button>
                        <button type="button" class="ti-key" onclick="tiCalcInput('ANS')">ans</button>

                        <button type="button" class="ti-key ti-key-enter" onclick="tiCalcEvaluate()" style="grid-column: span 4;">ENTER (=)</button>
                    </div>
                </div>

                <!-- TI-30XS Test Tips & Key Guide -->
                <div class="calc-guide-panel">
                    <h3>Official GED TI-30XS Test Tips</h3>
                    <ul>
                        <li><strong>Fractions:</strong> Use parentheses <code>(3/4) + (1/2)</code> or division for quick fraction arithmetic.</li>
                        <li><strong>Powers & Roots:</strong> Use <code>x²</code> for squaring and <code>^</code> for custom exponents (e.g. <code>2^5 = 32</code>).</li>
                        <li><strong>Pi Calculations:</strong> Press <code>π</code> directly for precision instead of typing 3.14 unless requested.</li>
                        <li><strong>Non-Calculator Section:</strong> The first 5 questions of the GED Math test do not permit any calculator. Master mental arithmetic for fractions and integers!</li>
                    </ul>

                    <h3>Calculator Availability on the GED</h3>
                    <p style="font-size: 0.85rem; color: var(--color-text-secondary, #64748b);">
                        The on-screen TI-30XS MultiView is provided for the remaining ~41 math questions, all Science questions involving math, and Social Studies economics calculations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL 3: RLA Extended Response Essay Lab -->
<div id="ged-modal-essay" class="ged-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="essay-modal-title" aria-hidden="true">
    <div class="ged-modal-panel" style="max-width: 1000px;">
        <div class="ged-modal-header">
            <h2 id="essay-modal-title"><i class="fas fa-feather-alt" style="color: #e11d48;"></i> RLA Extended Response (Essay) Workbench</h2>
            <button type="button" class="ged-modal-close-btn" onclick="closeGedModal('ged-modal-essay')" aria-label="Close Essay Modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="ged-modal-body">
            <div class="essay-lab-container">
                <!-- Controls bar -->
                <div class="essay-lab-controls">
                    <div class="essay-timer-display">
                        <i class="far fa-clock"></i>
                        <span id="essay-timer-text">45:00</span>
                    </div>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <button type="button" id="essay-timer-toggle-btn" class="essay-timer-btn" onclick="toggleEssayTimer()">Start 45m Timer</button>
                        <button type="button" class="essay-timer-btn" onclick="resetEssayTimer()">Reset</button>
                        <button type="button" class="essay-timer-btn" onclick="clearEssayDraft()" style="color: #e11d48;">Clear</button>
                    </div>
                    <div class="essay-word-count">
                        Words: <strong id="essay-word-count-num">0</strong> (Target: 300–500)
                    </div>
                </div>

                <!-- Paired Text vs Editor Grid -->
                <div class="essay-split-grid">
                    <!-- Left: Prompt & Paired Passages -->
                    <div class="essay-passage-box">
                        <h4>Prompt: Renewable Energy Investments</h4>
                        <p>
                            <em>Analyze the two opposing arguments below regarding whether the city should mandate solar power installations on all commercial buildings. Determine which position is better supported and explain how the author uses evidence and reasoning to build their case.</em>
                        </p>
                        <hr style="border: 0; border-top: 1px solid var(--color-border-subtle, #e2e8f0); margin: 0.75rem 0;">
                        <h4>Passage A: "Clean Energy is an Economic Imperative"</h4>
                        <p>
                            Advocates argue that upfront solar investments pay for themselves within five years through utility savings. Recent municipal studies show a 28% reduction in peak grid strain. Furthermore, transitioning to local clean energy creates high-paying installation jobs and shields taxpayers from volatile fossil fuel pricing spikes.
                        </p>
                        <h4>Passage B: "Mandates Stifle Small Business Growth"</h4>
                        <p>
                            Opponents contend that mandatory rooftop retrofits impose an immediate $45,000 capital expenditure burden on small commercial property owners. With commercial vacancy rates at 18%, imposing rigid penalties will force businesses to relocate to adjacent jurisdictions without mandates. Market-based tax incentives, not mandates, are the prudent path forward.
                        </p>
                    </div>

                    <!-- Right: Essay Textarea -->
                    <div class="essay-editor-box">
                        <textarea id="ged-essay-input" class="essay-textarea" placeholder="Type your 4-to-5 paragraph argumentative response here... Your draft is automatically saved." oninput="handleEssayInput(this)" aria-label="Extended Response Essay Text Area"></textarea>
                    </div>
                </div>

                <!-- 3-Trait Rubric Breakdown -->
                <div class="essay-rubric-summary">
                    <h5>Official 3-Trait GED Scoring Rubric (Total: 6 Points)</h5>
                    <div class="essay-rubric-grid">
                        <div class="rubric-trait-card">
                            <strong>Trait 1: Analysis & Evidence (0–2 Pts)</strong>
                            <span>Evaluates which passage has stronger evidence, citing specific examples from both texts.</span>
                        </div>
                        <div class="rubric-trait-card">
                            <strong>Trait 2: Development & Structure (0–2 Pts)</strong>
                            <span>Clear introduction, focused body paragraphs, transitions, and logical conclusion.</span>
                        </div>
                        <div class="rubric-trait-card">
                            <strong>Trait 3: English Conventions (0–2 Pts)</strong>
                            <span>Varied sentence structure, correct grammar, punctuation, spelling, and formal tone.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL 4: High-Yield GED Strategies Guide -->
<div id="ged-modal-strategy" class="ged-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="strat-modal-title" aria-hidden="true">
    <div class="ged-modal-panel">
        <div class="ged-modal-header">
            <h2 id="strat-modal-title"><i class="fas fa-lightbulb" style="color: #059669;"></i> High-Yield GED Test Strategies & Exam Breakdown</h2>
            <button type="button" class="ged-modal-close-btn" onclick="closeGedModal('ged-modal-strategy')" aria-label="Close Strategies Modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="ged-modal-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.25rem;">
                <div class="formula-card">
                    <h3><i class="fas fa-calculator"></i> Mathematical Reasoning</h3>
                    <p style="font-size: 0.85rem; color: var(--color-text-secondary, #475569);">
                        <strong>Time:</strong> 115 minutes (2 parts)<br>
                        <strong>Questions:</strong> ~46 items<br>
                        <strong>No Penalty for Guessing:</strong> Answer every single question. If stuck, flag it and return before time expires.
                    </p>
                </div>
                <div class="formula-card">
                    <h3><i class="fas fa-book-open"></i> Language Arts (RLA)</h3>
                    <p style="font-size: 0.85rem; color: var(--color-text-secondary, #475569);">
                        <strong>Time:</strong> 150 minutes (3 sections)<br>
                        <strong>Extended Response:</strong> 45 min dedicated essay block.<br>
                        <strong>Key Strategy:</strong> Read questions first to know what details to hunt for in passages.
                    </p>
                </div>
                <div class="formula-card">
                    <h3><i class="fas fa-flask"></i> Science Reasoning</h3>
                    <p style="font-size: 0.85rem; color: var(--color-text-secondary, #475569);">
                        <strong>Time:</strong> 90 minutes (1 section)<br>
                        <strong>Focus:</strong> 50% Life Science, 50% Earth/Physical Science.<br>
                        <strong>Key Strategy:</strong> Heavily based on chart and experimental variable analysis.
                    </p>
                </div>
                <div class="formula-card">
                    <h3><i class="fas fa-landmark"></i> Social Studies Reasoning</h3>
                    <p style="font-size: 0.85rem; color: var(--color-text-secondary, #475569);">
                        <strong>Time:</strong> 70 minutes (1 section)<br>
                        <strong>Focus:</strong> 50% Civics & Gov, 20% History, 15% Econ, 15% Geo.<br>
                        <strong>Key Strategy:</strong> Eliminate extreme answer choices and verify against historical text quotes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/ged-prep.js"></script>
<?php
$customLevelFooter = ob_get_clean();

// Load the master level template
include '../src/level_template.php';
?>
