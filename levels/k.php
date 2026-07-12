<?php
/**
 * Hesten's Learning - Level K (Grade 9)
 * Using the master level template for consistency.
 */

// Page-Specific Metadata
$pageTitle       = "Grade 9 Level K | Hesten's Learning";
$pageDescription = "Algebra I foundations, literature analysis, chemical properties, and global civilizations.";
$pageKeywords    = "Grade 9, Freshman, Algebra 1, Functions, Equations, Statistics, Literary Analysis, Chemistry, World History, Civics";

// Template Variables
$themeColor = 'rose';
$levelId = 'k';
$levelTitle = 'Level K';
$gradeText = 'High School';
$initialSubject = 'math';
$initialSubjectName = 'Math';
$initialSubjectDesc = 'Algebra I foundations: mastering relationships between quantities, equations, and graphs.';

// Math Curriculum Data
$modules = [
    // Math Curriculum Data - Mod 1
    [
        'title' => 'Relationships Between Quantities and Reasoning with Equations',
        'description' => 'Reasoning with equations and their graphs, setting the foundation for high school algebra.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Introduction to Functions Studied this Year',
                'skills' => [
                    //Lessons 1-5
                    ['id' => 'k-math-m1-a-1', 'code' => 'K.M1.A.1', 'name' => 'Graphs of Piecewise Linear Functions'],
                    ['id' => 'k-math-m1-a-2', 'code' => 'K.M1.A.2', 'name' => 'Graphs of Quadratic Functions'],
                    ['id' => 'k-math-m1-a-3', 'code' => 'K.M1.A.3', 'name' => 'Graphs of Exponential Functions'],
                    ['id' => 'k-math-m1-a-4', 'code' => 'K.M1.A.4', 'name' => 'Analyzing Graphs - Water Usage During a Typical Day at School'],
                    ['id' => 'k-math-m1-a-5', 'code' => 'K.M1.A.5', 'name' => 'Two Graphing Stories']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'The Structure of Expressions',
                'skills' => [
                    //Lessons 6-9
                    ['id' => 'k-math-m1-b-1', 'code' => 'K.M1.B.1', 'name' => 'Algebraic Expressions - The Distributive Property'],
                    ['id' => 'k-math-m1-b-2', 'code' => 'K.M1.B.2', 'name' => 'Algebraic Expressions - The Commutative and Associative Properties'],
                    ['id' => 'k-math-m1-b-3', 'code' => 'K.M1.B.3', 'name' => 'Adding and Subtracting Polynomials'],
                    ['id' => 'k-math-m1-b-4', 'code' => 'K.M1.B.4', 'name' => 'Multiplying Polynomials']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Solving Equations and Inequalities',
                'skills' => [
                    //Lessons 10-24
                    ['id' => 'k-math-m1-c-1', 'code' => 'K.M1.C.1', 'name' => 'True and False Equations'],
                    ['id' => 'k-math-m1-c-2', 'code' => 'K.M1.C.2', 'name' => 'Solution Sets for Equations and Inequalities'],
                    ['id' => 'k-math-m1-c-3', 'code' => 'K.M1.C.3', 'name' => 'Solving Equations'],
                    ['id' => 'k-math-m1-c-4', 'code' => 'K.M1.C.4', 'name' => 'Some Potential Dangers when Solving Equations'],
                    ['id' => 'k-math-m1-c-5', 'code' => 'K.M1.C.5', 'name' => 'Solving Inequalities'],
                    ['id' => 'k-math-m1-c-6', 'code' => 'K.M1.C.6', 'name' => 'Solution Sets of Two or More Equations or Inequalities Joined by And or Or'],
                    ['id' => 'k-math-m1-c-7', 'code' => 'K.M1.C.7', 'name' => 'Solving and Graphing Inequalities Joined by "And" or "Or"'],
                    ['id' => 'k-math-m1-c-8', 'code' => 'K.M1.C.8', 'name' => 'Equations Involving Factored Expressions'],
                    ['id' => 'k-math-m1-c-9', 'code' => 'K.M1.C.9', 'name' => 'Equations Involving a Variable Expression in the Denominator'],
                    ['id' => 'k-math-m1-c-10', 'code' => 'K.M1.C.10', 'name' => 'Rearranging Formulas'],
                    ['id' => 'k-math-m1-c-11', 'code' => 'K.M1.C.11', 'name' => 'Solution Sets to Equations with Two Variables'],
                    ['id' => 'k-math-m1-c-12', 'code' => 'K.M1.C.12', 'name' => 'Solution Sets to Inequalities with Two Variables'],
                    ['id' => 'k-math-m1-c-13', 'code' => 'K.M1.C.13', 'name' => 'Solution Sets to Simultaneous Equations'],
                    ['id' => 'k-math-m1-c-14', 'code' => 'K.M1.C.14', 'name' => 'Applications of Systems of Equations and Inequalities']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Creating Equations to Solve Problems',
                'skills' => [
                    //Lessons 25-28
                    ['id' => 'k-math-m1-d-1', 'code' => 'K.M1.D.1', 'name' => 'Solving Problems in Two Ways - Rates and Algebra'],
                    ['id' => 'k-math-m1-d-2', 'code' => 'K.M1.D.2', 'name' => 'Recursive Challenge Problem - The Double and Add 5 Game'],
                    ['id' => 'k-math-m1-d-3', 'code' => 'K.M1.D.3', 'name' => 'Federal Income Tax']
                ]
            ]
        ]
    ],
    // Math Curriculum Data - Mod 2
    [
        'title' => 'Descriptive Statistics',
        'description' => 'Summarizing, representing, and interpreting data on single and bivariate variables.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Shapes and Centers of Distributions',
                'skills' => [
                    ['id' => 'k-math-m2-a-1', 'code' => 'K.M2.A.1', 'name' => 'Distributions and Their Shapes'],
                    ['id' => 'k-math-m2-a-2', 'code' => 'K.M2.A.2', 'name' => 'Describing the Center of a Distribution'],
                    ['id' => 'k-math-m2-a-3', 'code' => 'K.M2.A.3', 'name' => 'Estimating Centers and Interpreting the Mean as a Balance Point']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Describing Variability and Comparing Distributions',
                'skills' => [
                    ['id' => 'k-math-m2-b-1', 'code' => 'K.M2.B.1', 'name' => 'Summarizing Deviations from the Mean'],
                    ['id' => 'k-math-m2-b-2', 'code' => 'K.M2.B.2', 'name' => 'Measuring Variability for Symmetrical Distributions'],
                    ['id' => 'k-math-m2-b-3', 'code' => 'K.M2.B.3', 'name' => 'Interpreting the Standard Deviation'],
                    ['id' => 'k-math-m2-b-4', 'code' => 'K.M2.B.4', 'name' => 'Measuring Variability for Skewed Distributions Interquartile Range'],
                    ['id' => 'k-math-m2-b-5', 'code' => 'K.M2.B.5', 'name' => 'Comparing Distributions']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Categorical Data on Two Variables',
                'skills' => [
                    ['id' => 'k-math-m2-c-1', 'code' => 'K.M2.C.1', 'name' => 'Summarizing Bivariate Categorical Data'],
                    ['id' => 'k-math-m2-c-2', 'code' => 'K.M2.C.2', 'name' => 'Summarizing Bivariate Categorical Data with Relative Frequencies'],
                    ['id' => 'k-math-m2-c-3', 'code' => 'K.M2.C.3', 'name' => 'Conditional Relative Frequencies and Association']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Numerical Data on Two Variables',
                'skills' => [
                    ['id' => 'k-math-m2-d-1', 'code' => 'K.M2.D.1', 'name' => 'Relationships Between Two Numerical Variables'],
                    ['id' => 'k-math-m2-d-2', 'code' => 'K.M2.D.2', 'name' => 'Modeling Relationships with a Line'],
                    ['id' => 'k-math-m2-d-3', 'code' => 'K.M2.D.3', 'name' => 'Interpreting Residuals from a Line'],
                    ['id' => 'k-math-m2-d-4', 'code' => 'K.M2.D.4', 'name' => 'More on Modeling Relationships with a Line'],
                    ['id' => 'k-math-m2-d-5', 'code' => 'K.M2.D.5', 'name' => 'Analyzing Residuals'],
                    ['id' => 'k-math-m2-d-6', 'code' => 'K.M2.D.6', 'name' => 'Interpreting Correlation'],
                    ['id' => 'k-math-m2-d-7', 'code' => 'K.M2.D.7', 'name' => 'Analyzing Data Collected on Two Variables']
                ]
            ]
        ]
    ],
    // Math Curriculum Data - Mod 3
    [
        'title' => 'Linear and Exponential Functions',
        'description' => 'Exploring integer sequences, exponential growth, and graph transformations.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Linear and Exponential Sequences',
                'skills' => [
                    ['id' => 'k-math-m3-a-1', 'code' => 'K.M3.A.1', 'name' => 'Integer Sequences Should You Believe in Patterns?'],
                    ['id' => 'k-math-m3-a-2', 'code' => 'K.M3.A.2', 'name' => 'Recursive Formulas for Sequences'],
                    ['id' => 'k-math-m3-a-3', 'code' => 'K.M3.A.3', 'name' => 'Arithmetic and Geometric Sequences'],
                    ['id' => 'k-math-m3-a-4', 'code' => 'K.M3.A.4', 'name' => 'Why Do Banks Pay YOU to Provide Their Services?'],
                    ['id' => 'k-math-m3-a-5', 'code' => 'K.M3.A.5', 'name' => 'The Power of Exponential Growth'],
                    ['id' => 'k-math-m3-a-6', 'code' => 'K.M3.A.6', 'name' => 'Exponential Growth U.S. Population and World Population'],
                    ['id' => 'k-math-m3-a-7', 'code' => 'K.M3.A.7', 'name' => 'Exponential Decay'],
                    ['id' => 'k-math-m3-a-8', 'code' => 'K.M3.A.8', 'name' => 'Reflections on Exponential Functions']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Functions and Their Graphs',
                'skills' => [
                    ['id' => 'k-math-m3-b-1', 'code' => 'K.M3.B.1', 'name' => 'Why Stay with Whole Numbers?'],
                    ['id' => 'k-math-m3-b-2', 'code' => 'K.M3.B.2', 'name' => 'Representing, Naming, and Evaluating Functions'],
                    ['id' => 'k-math-m3-b-3', 'code' => 'K.M3.B.3', 'name' => 'The Graph of a Function'],
                    ['id' => 'k-math-m3-b-4', 'code' => 'K.M3.B.4', 'name' => 'The Graph of the Equation y=f(x)'],
                    ['id' => 'k-math-m3-b-5', 'code' => 'K.M3.B.5', 'name' => 'Interpreting the Graph of a Function'],
                    ['id' => 'k-math-m3-b-6', 'code' => 'K.M3.B.6', 'name' => 'Linear and Exponential Models Comparing Growth Rates']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Transformations of Functions',
                'skills' => [
                    ['id' => 'k-math-m3-c-1', 'code' => 'K.M3.C.1', 'name' => 'Piecewise Functions'],
                    ['id' => 'k-math-m3-c-2', 'code' => 'K.M3.C.2', 'name' => 'Graphs Can Solve Equations Too'],
                    ['id' => 'k-math-m3-c-3', 'code' => 'K.M3.C.3', 'name' => 'Four Interesting Transformations of Functions'],
                    ['id' => 'k-math-m3-c-4', 'code' => 'K.M3.C.4', 'name' => 'Stretching and Shrinking Graphs of Functions'],
                    ['id' => 'k-math-m3-c-5', 'code' => 'K.M3.C.5', 'name' => 'Comparing Linear and Exponential Models']
                ]
            ],
            [
                'letter' => 'D',
                'name' => 'Using Functions and Graphs to Solve Problems',
                'skills' => [
                    ['id' => 'k-math-m3-d-1', 'code' => 'K.M3.D.1', 'name' => 'Comparing Linear and Exponential Models Again'],
                    ['id' => 'k-math-m3-d-2', 'code' => 'K.M3.D.2', 'name' => 'Modeling an Invasive Species Population'],
                    ['id' => 'k-math-m3-d-3', 'code' => 'K.M3.D.3', 'name' => 'Newtons Law of Cooling'],
                    ['id' => 'k-math-m3-d-4', 'code' => 'K.M3.D.4', 'name' => 'Piecewise and Step Functions in Context']
                ]
            ]
        ]
    ],
    // Math Curriculum Data - Mod 4
    [
        'title' => 'Polynomial and Quadratic Expressions, Equations, and Functions',
        'description' => 'Factoring polynomials, solving quadratic equations, and graphing parabolas.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Quadratic Expressions, Equations, Functions, and Their Connection to Rectangles',
                'skills' => [
                    ['id' => 'k-math-m4-a-1', 'code' => 'K.M4.A.1', 'name' => 'Multiplying and Factoring Polynomial Expressions'],
                    ['id' => 'k-math-m4-a-2', 'code' => 'K.M4.A.2', 'name' => 'Advanced Factoring Strategies for Quadratic Expressions'],
                    ['id' => 'k-math-m4-a-3', 'code' => 'K.M4.A.3', 'name' => 'The Zero Product Property'],
                    ['id' => 'k-math-m4-a-4', 'code' => 'K.M4.A.4', 'name' => 'Solving Basic One-Variable Quadratic Equations'],
                    ['id' => 'k-math-m4-a-5', 'code' => 'K.M4.A.5', 'name' => 'Creating and Solving Quadratic Equations in One Variable'],
                    ['id' => 'k-math-m4-a-6', 'code' => 'K.M4.A.6', 'name' => 'Exploring the Symmetry in Graphs of Quadratic Functions'],
                    ['id' => 'k-math-m4-a-7', 'code' => 'K.M4.A.7', 'name' => 'Graphing Quadratic Functions from Factored Form'],
                    ['id' => 'k-math-m4-a-8', 'code' => 'K.M4.A.8', 'name' => 'Interpreting Quadratic Functions from Graphs and Tables']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Using Different Forms for Quadratic Functions',
                'skills' => [
                    ['id' => 'k-math-m4-b-1', 'code' => 'K.M4.B.1', 'name' => 'Completing the Square'],
                    ['id' => 'k-math-m4-b-2', 'code' => 'K.M4.B.2', 'name' => 'Solving Quadratic Equations by Completing the Square'],
                    ['id' => 'k-math-m4-b-3', 'code' => 'K.M4.B.3', 'name' => 'Deriving the Quadratic Formula'],
                    ['id' => 'k-math-m4-b-4', 'code' => 'K.M4.B.4', 'name' => 'Using the Quadratic Formula'],
                    ['id' => 'k-math-m4-b-5', 'code' => 'K.M4.B.5', 'name' => 'Graphing Quadratic Equations from the Vertex Form'],
                    ['id' => 'k-math-m4-b-6', 'code' => 'K.M4.B.6', 'name' => 'Graphing Quadratic Functions from the Standard Form'],
                    ['id' => 'k-math-m4-b-7', 'code' => 'K.M4.B.7', 'name' => 'Applying the Quadratic Formula']
                ]
            ],
            [
                'letter' => 'C',
                'name' => 'Function Transformations and Modeling',
                'skills' => [
                    ['id' => 'k-math-m4-c-1', 'code' => 'K.M4.C.1', 'name' => 'Graphing Cubic, Square Root, and Cube Root Functions'],
                    ['id' => 'k-math-m4-c-2', 'code' => 'K.M4.C.2', 'name' => 'Translating Graphs of Functions'],
                    ['id' => 'k-math-m4-c-3', 'code' => 'K.M4.C.3', 'name' => 'Stretching and Shrinking Graphs of Functions'],
                    ['id' => 'k-math-m4-c-4', 'code' => 'K.M4.C.4', 'name' => 'Transformations of the Quadratic Parent Function'],
                    ['id' => 'k-math-m4-c-5', 'code' => 'K.M4.C.5', 'name' => 'Comparing Quadratic, Square Root, and Cube Root Functions Represented in Different Ways'],
                    ['id' => 'k-math-m4-c-6', 'code' => 'K.M4.C.6', 'name' => 'Modeling with Quadratic Functions'],
                    ['id' => 'k-math-m4-c-7', 'code' => 'K.M4.C.7', 'name' => 'Modeling with Polynomials']
                ]
            ]
        ]
    ],
    // Math Curriculum Data - Mod 5
    [
        'title' => 'A Synthesis of Modeling with Equations and Functions',
        'description' => 'Using linear, quadratic, and exponential models to evaluate and interpret real-world behaviors.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Elements of Modeling',
                'skills' => [
                    ['id' => 'k-math-m5-a-1', 'code' => 'K.M5.A.1', 'name' => 'Analyzing a Graph'],
                    ['id' => 'k-math-m5-a-2', 'code' => 'K.M5.A.2', 'name' => 'Analyzing a Data Set'],
                    ['id' => 'k-math-m5-a-3', 'code' => 'K.M5.A.3', 'name' => 'Analyzing a Verbal Description']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Completing the Modeling Cycle',
                'skills' => [
                    ['id' => 'k-math-m5-b-1', 'code' => 'K.M5.B.1', 'name' => 'Modeling a Context from a Graph'],
                    ['id' => 'k-math-m5-b-2', 'code' => 'K.M5.B.2', 'name' => 'Modeling from a Sequence'],
                    ['id' => 'k-math-m5-b-3', 'code' => 'K.M5.B.3', 'name' => 'Modeling a Context from Data'],
                    ['id' => 'k-math-m5-b-4', 'code' => 'K.M5.B.4', 'name' => 'Modeling a Context from a Verbal Description']
                ]
            ]
        ]
    ]
];

// ELA Curriculum Data
$ela_modules = [
    [
        'title' => 'Literary Analysis & Rhetoric',
        'description' => 'Analyzing complex characters, themes, and rhetorical devices in classical and modern literature.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Reading Literature',
                'skills' => [
                    ['id' => 'k-ela-m1-a-1', 'code' => 'K.ELA.1.A.1', 'name' => 'Citing strong and thorough textual evidence to support analysis'],
                    ['id' => 'k-ela-m1-a-2', 'code' => 'K.ELA.1.A.2', 'name' => 'Determining a theme or central idea and analyzing its development']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Rhetorical Devices & Structure',
                'skills' => [
                    ['id' => 'k-ela-m1-b-1', 'code' => 'K.ELA.1.B.1', 'name' => 'Analyzing structural choices and overall aesthetic impact'],
                    ['id' => 'k-ela-m1-b-2', 'code' => 'K.ELA.1.B.2', 'name' => 'Identifying and analyzing irony, analogy, and allusion']
                ]
            ]
        ]
    ],
    [
        'title' => 'Composition & Research',
        'description' => 'Developing argumentative essays, conducting structured research, and citing authoritative sources.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Argumentative & Explanatory Writing',
                'skills' => [
                    ['id' => 'k-ela-m2-a-1', 'code' => 'K.ELA.2.A.1', 'name' => 'Writing arguments to support claims in an analysis of substantive topics'],
                    ['id' => 'k-ela-m2-a-2', 'code' => 'K.ELA.2.A.2', 'name' => 'Introducing precise claims and distinguishing them from opposing views']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Research & Citing Sources',
                'skills' => [
                    ['id' => 'k-ela-m2-b-1', 'code' => 'K.ELA.2.B.1', 'name' => 'Conducting short as well as sustained research projects'],
                    ['id' => 'k-ela-m2-b-2', 'code' => 'K.ELA.2.B.2', 'name' => 'Gathering relevant information from multiple digital and print sources']
                ]
            ]
        ]
    ]
];

// Science Curriculum Data
$science_modules = [
    [
        'title' => 'Chemistry Foundations & Matter',
        'description' => 'Exploring atomic structures, chemical bonds, and periodic trends.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Atomic Structure & The Periodic Table',
                'skills' => [
                    ['id' => 'k-sci-m1-a-1', 'code' => 'K.SCI.1.A.1', 'name' => 'Explaining atomic structure, subatomic particles, and isotopes'],
                    ['id' => 'k-sci-m1-a-2', 'code' => 'K.SCI.1.A.2', 'name' => 'Using periodic trends to predict properties of elements']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Chemical Bonding & Reactions',
                'skills' => [
                    ['id' => 'k-sci-m1-b-1', 'code' => 'K.SCI.1.B.1', 'name' => 'Comparing ionic, covalent, and metallic bonds'],
                    ['id' => 'k-sci-m1-b-2', 'code' => 'K.SCI.1.B.2', 'name' => 'Balancing chemical equations and verifying conservation of mass']
                ]
            ]
        ]
    ],
    [
        'title' => 'Physics Foundations & Mechanics',
        'description' => 'Understanding displacement, velocity, acceleration, Newton\'s laws, and energy conservation.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Kinematics & Newton\'s Laws',
                'skills' => [
                    ['id' => 'k-sci-m2-a-1', 'code' => 'K.SCI.2.A.1', 'name' => 'Calculating displacement, speed, velocity, and acceleration'],
                    ['id' => 'k-sci-m2-a-2', 'code' => 'K.SCI.2.A.2', 'name' => 'Applying Newton\'s three laws of motion to physical systems']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Energy & Momentum',
                'skills' => [
                    ['id' => 'k-sci-m2-b-1', 'code' => 'K.SCI.2.B.1', 'name' => 'Defining and calculating kinetic and potential energy'],
                    ['id' => 'k-sci-m2-b-2', 'code' => 'K.SCI.2.B.2', 'name' => 'Modeling momentum conservation in collisions']
                ]
            ]
        ]
    ]
];

// Social Studies Curriculum Data
$social_modules = [
    [
        'title' => 'World History & Global Civilizations',
        'description' => 'Studying classical empires, early trade routes, and the social effects of early exploration.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Rise of Global Empires',
                'skills' => [
                    ['id' => 'k-soc-m1-a-1', 'code' => 'K.SOC.1.A.1', 'name' => 'Analyzing the growth and impact of major classical empires'],
                    ['id' => 'k-soc-m1-a-2', 'code' => 'K.SOC.1.A.2', 'name' => 'Examining cultural diffusion along the Silk Road']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'The Age of Exploration',
                'skills' => [
                    ['id' => 'k-soc-m1-b-1', 'code' => 'K.SOC.1.B.1', 'name' => 'Evaluating the economic and social consequences of the Columbian Exchange'],
                    ['id' => 'k-soc-m1-b-2', 'code' => 'K.SOC.1.B.2', 'name' => 'Analyzing motivations (gold, glory, god) behind maritime exploration']
                ]
            ]
        ]
    ],
    [
        'title' => 'Civics & Government Foundations',
        'description' => 'Analyzing democratic values, government types, constitutional principles, and civic duties.',
        'topics' => [
            [
                'letter' => 'A',
                'name' => 'Principles of Democracy',
                'skills' => [
                    ['id' => 'k-soc-m2-a-1', 'code' => 'K.SOC.2.A.1', 'name' => 'Comparing democracy, monarchy, oligarchy, and autocracy'],
                    ['id' => 'k-soc-m2-a-2', 'code' => 'K.SOC.2.A.2', 'name' => 'Explaining constitutional principles like checks and balances']
                ]
            ],
            [
                'letter' => 'B',
                'name' => 'Rights & Responsibilities of Citizens',
                'skills' => [
                    ['id' => 'k-soc-m2-b-1', 'code' => 'K.SOC.2.B.1', 'name' => 'Analyzing the historical significance of the Bill of Rights'],
                    ['id' => 'k-soc-m2-b-2', 'code' => 'K.SOC.2.B.2', 'name' => 'Examining the role of civic participation in democratic society']
                ]
            ]
        ]
    ]
];

// Load the Master Template
include '../src/level_template.php';
?>