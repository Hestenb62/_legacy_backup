/**
 * Teacher & Homeschool Suite Engine (assets/js/teachers-main.js)
 * Interactive Assignment Link Builder, 36-Week Curriculum Pacing Guide,
 * and Classroom Dispatcher for Hesten's Learning.
 */

(function () {
  'use strict';

  // Grade Configuration Mapping
  const GRADE_CONFIG = {
    'pre-k': { name: 'Pre-K', level: 'a', order: 0 },
    'k':     { name: 'Kindergarten', level: 'b', order: 1 },
    '1':     { name: '1st Grade', level: 'c', order: 2 },
    '2':     { name: '2nd Grade', level: 'd', order: 3 },
    '3':     { name: '3rd Grade', level: 'e', order: 4 },
    '4':     { name: '4th Grade', level: 'f', order: 5 },
    '5':     { name: '5th Grade', level: 'g', order: 6 },
    '6':     { name: '6th Grade', level: 'h', order: 7 },
    '7':     { name: '7th Grade', level: 'i', order: 8 },
    '8':     { name: '8th Grade', level: 'j', order: 9 },
    'hs':    { name: 'High School', level: 'k', order: 10 }
  };

  // Curated Standards by Grade and Subject
  const STANDARDS_REGISTRY = {
    'pre-k': {
      'Math': [
        { code: 'PK.CC.A', title: 'Count sequence up to 10' },
        { code: 'PK.CC.B', title: 'Understand relationship between numbers and quantities' },
        { code: 'PK.G.A',  title: 'Identify and describe 2D shapes' }
      ],
      'Language Arts': [
        { code: 'PK.RF.1', title: 'Demonstrate understanding of the organization of print' },
        { code: 'PK.RL.1', title: 'With prompting, ask and answer questions about a text' }
      ],
      'Science': [
        { code: 'PK.PS.1', title: 'Observe and describe properties of objects and materials' }
      ],
      'Social Studies': [
        { code: 'PK.SS.1', title: 'Identify self, family, and classroom community rules' }
      ]
    },
    'k': {
      'Math': [
        { code: 'K.CC.A.1', title: 'Count to 100 by ones and by tens' },
        { code: 'K.CC.B.4', title: 'Understand the relationship between numbers and quantities' },
        { code: 'K.OA.A.1', title: 'Represent addition and subtraction with objects or drawings' },
        { code: 'K.MD.A.1', title: 'Describe measurable attributes of objects (length, weight)' },
        { code: 'K.G.A.1',  title: 'Describe objects in the environment using shape names' }
      ],
      'Language Arts': [
        { code: 'RL.K.1', title: 'Ask and answer questions about key details in a text' },
        { code: 'RF.K.1', title: 'Demonstrate understanding of the organization of print' },
        { code: 'RF.K.2', title: 'Demonstrate understanding of spoken words and syllables' },
        { code: 'RF.K.3', title: 'Know and apply grade-level phonics and word analysis' }
      ],
      'Science': [
        { code: 'K-PS2-1', title: 'Plan and conduct an investigation on pushes and pulls' },
        { code: 'K-LS1-1', title: 'Use observations to describe patterns of what plants and animals need' },
        { code: 'K-ESS2-1', title: 'Use and share observations of local weather conditions' }
      ],
      'Social Studies': [
        { code: 'C3.K.Civ.1', title: 'Explain the need for rules in various classroom settings' },
        { code: 'C3.K.Geo.1', title: 'Create and explain maps of familiar places' }
      ]
    },
    '1': {
      'Math': [
        { code: '1.OA.A.1', title: 'Use addition and subtraction within 20 to solve word problems' },
        { code: '1.OA.C.6', title: 'Add and subtract within 20, demonstrating fluency within 10' },
        { code: '1.NBT.B.2', title: 'Understand that two-digit numbers represent tens and ones' },
        { code: '1.MD.B.3', title: 'Tell and write time in hours and half-hours' },
        { code: '1.G.A.1',  title: 'Distinguish between defining attributes of shapes' }
      ],
      'Language Arts': [
        { code: 'RL.1.1', title: 'Ask and answer questions about key details in a text' },
        { code: 'RL.1.2', title: 'Retell stories including key details and central message' },
        { code: 'RF.1.3', title: 'Know and apply grade-level phonics and word analysis skills' }
      ],
      'Science': [
        { code: '1-PS4-1', title: 'Demonstrate that vibrating materials can make sound' },
        { code: '1-LS1-1', title: 'Design a solution to a human problem mimicking animal adaptations' },
        { code: '1-ESS1-1', title: 'Use observations of the sun, moon, and stars to describe patterns' }
      ],
      'Social Studies': [
        { code: 'C3.1.His.1', title: 'Identify how families and communities change over time' },
        { code: 'C3.1.Econ.1', title: 'Distinguish between goods and services' }
      ]
    },
    '2': {
      'Math': [
        { code: '2.OA.A.1', title: 'Use addition and subtraction within 100 to solve one- and two-step problems' },
        { code: '2.NBT.A.1', title: 'Understand place value in three-digit numbers (hundreds, tens, ones)' },
        { code: '2.NBT.B.5', title: 'Fluently add and subtract within 100 using strategies' },
        { code: '2.MD.C.7', title: 'Tell and write time from analog and digital clocks to 5 minutes' },
        { code: '2.MD.C.8', title: 'Solve word problems involving dollar bills, quarters, dimes, nickels, pennies' }
      ],
      'Language Arts': [
        { code: 'RL.2.1', title: 'Ask and answer who, what, where, when, why, and how in a text' },
        { code: 'RL.2.3', title: 'Describe how characters in a story respond to major events' },
        { code: 'RI.2.4', title: 'Determine the meaning of words and phrases in a relevant text' }
      ],
      'Science': [
        { code: '2-PS1-1', title: 'Plan and conduct an investigation to describe properties of matter' },
        { code: '2-LS2-1', title: 'Plan and conduct an investigation to determine if plants need light and water' },
        { code: '2-ESS1-1', title: 'Use information to show that Earth events can occur quickly or slowly' }
      ],
      'Social Studies': [
        { code: 'C3.2.Geo.1', title: 'Construct maps and graphs to display geographic information' },
        { code: 'C3.2.Civ.1', title: 'Explain how citizens participate in local community decisions' }
      ]
    },
    '3': {
      'Math': [
        { code: '3.OA.A.1', title: 'Interpret products of whole numbers (e.g., 5 x 7 as 5 groups of 7)' },
        { code: '3.OA.A.3', title: 'Use multiplication and division within 100 to solve word problems' },
        { code: '3.OA.C.7', title: 'Fluently multiply and divide within 100' },
        { code: '3.NF.A.1', title: 'Understand a fraction 1/b as the quantity formed by 1 part of b' },
        { code: '3.MD.C.7', title: 'Relate area to the operations of multiplication and addition' }
      ],
      'Language Arts': [
        { code: 'RL.3.1', title: 'Ask and answer questions to demonstrate understanding, referring to text' },
        { code: 'RL.3.2', title: 'Recount stories, determine central message, lesson, or moral' },
        { code: 'RI.3.2', title: 'Determine the main idea of a text; recount key details' },
        { code: 'L.3.4',  title: 'Determine or clarify the meaning of unknown and multiple-meaning words' }
      ],
      'Science': [
        { code: '3-PS2-1', title: 'Plan and conduct an investigation of balanced and unbalanced forces' },
        { code: '3-LS1-1', title: 'Develop models to describe that organisms have unique life cycles' },
        { code: '3-ESS2-1', title: 'Represent data in tables and graphical displays to describe typical weather' }
      ],
      'Social Studies': [
        { code: 'C3.3.His.1', title: 'Compare life in specific historical periods with modern community life' },
        { code: 'C3.3.Econ.1', title: 'Explain how producers and consumers interact in regional markets' }
      ]
    },
    '4': {
      'Math': [
        { code: '4.OA.A.1', title: 'Interpret a multiplication equation as a comparison' },
        { code: '4.NBT.B.5', title: 'Multiply a whole number of up to four digits by a one-digit whole number' },
        { code: '4.NF.A.1', title: 'Explain why a fraction a/b is equivalent to a fraction (n*a)/(n*b)' },
        { code: '4.NF.B.3', title: 'Understand addition and subtraction of fractions with like denominators' },
        { code: '4.MD.A.3', title: 'Apply area and perimeter formulas for rectangles in real world problems' }
      ],
      'Language Arts': [
        { code: 'RL.4.1', title: 'Refer to details and examples in a text when explaining and drawing inferences' },
        { code: 'RL.4.2', title: 'Determine a theme of a story, drama, or poem from details' },
        { code: 'RI.4.5', title: 'Describe overall text structure (chronology, comparison, cause/effect)' }
      ],
      'Science': [
        { code: '4-PS3-1', title: 'Use evidence to construct an explanation relating speed to energy' },
        { code: '4-LS1-1', title: 'Construct an argument that plants and animals have internal/external structures' },
        { code: '4-ESS1-1', title: 'Identify evidence from rock formations and fossils to explain changes over time' }
      ],
      'Social Studies': [
        { code: 'C3.4.Civ.1', title: 'Explain the key roles of the three branches of state government' },
        { code: 'C3.4.Geo.1', title: 'Explain how physical and human characteristics influence regions' }
      ]
    },
    '5': {
      'Math': [
        { code: '5.OA.A.1', title: 'Use parentheses, brackets, or braces in numerical expressions' },
        { code: '5.NBT.A.1', title: 'Recognize that in a multi-digit number, a digit represents 10x its place value' },
        { code: '5.NBT.B.7', title: 'Add, subtract, multiply, and divide decimals to hundredths' },
        { code: '5.NF.A.1', title: 'Add and subtract fractions with unlike denominators' },
        { code: '5.MD.C.5', title: 'Relate volume to the operations of multiplication and addition' }
      ],
      'Language Arts': [
        { code: 'RL.5.1', title: 'Quote accurately from a text when explaining what text says explicitly' },
        { code: 'RL.5.2', title: 'Determine a theme of a story, including how characters respond to challenges' },
        { code: 'RI.5.8', title: 'Explain how an author uses reasons and evidence to support particular points' }
      ],
      'Science': [
        { code: '5-PS1-1', title: 'Develop a model to describe that matter is made of particles too small to be seen' },
        { code: '5-LS2-1', title: 'Develop a model to describe the movement of matter among plants, animals, decomposers' },
        { code: '5-ESS1-1', title: 'Support an argument that differences in brightness of stars is due to distance' }
      ],
      'Social Studies': [
        { code: 'C3.5.His.1', title: 'Explain how historical events shape contemporary institutions' },
        { code: 'C3.5.Econ.1', title: 'Explain how trade and economic specialization connect diverse nations' }
      ]
    },
    '6': {
      'Math': [
        { code: '6.RP.A.1', title: 'Understand the concept of a ratio and use ratio language' },
        { code: '6.RP.A.3', title: 'Use ratio and rate reasoning to solve real-world and mathematical problems' },
        { code: '6.NS.A.1', title: 'Interpret and compute quotients of fractions' },
        { code: '6.EE.A.2', title: 'Write, read, and evaluate expressions in which letters stand for numbers' },
        { code: '6.SP.A.2', title: 'Understand that a set of data has a distribution characterized by center/spread' }
      ],
      'Language Arts': [
        { code: 'RL.6.1', title: 'Cite textual evidence to support analysis of what the text says explicitly' },
        { code: 'RI.6.1', title: 'Cite textual evidence to support analysis of informational texts' },
        { code: 'RI.6.6', title: 'Determine author point of view or purpose in a text and explain how it is conveyed' }
      ],
      'Science': [
        { code: 'MS-PS1-1', title: 'Develop models to describe the atomic composition of simple molecules' },
        { code: 'MS-LS1-1', title: 'Conduct an investigation to provide evidence that living things are made of cells' },
        { code: 'MS-ESS1-1', title: 'Develop and use a model of the Earth-sun-moon system to describe lunar phases' }
      ],
      'Social Studies': [
        { code: 'C3.6.Civ.1', title: 'Analyze the origins, structures, and functions of ancient governments' },
        { code: 'C3.6.Geo.1', title: 'Use map projections to understand global human migrations and settlements' }
      ]
    },
    '7': {
      'Math': [
        { code: '7.RP.A.2', title: 'Recognize and represent proportional relationships between quantities' },
        { code: '7.NS.A.1', title: 'Apply and extend previous understandings of addition and subtraction to rational numbers' },
        { code: '7.EE.A.1', title: 'Apply properties of operations as strategies to add, subtract, factor, expand linear expressions' },
        { code: '7.G.B.4',  title: 'Know the formulas for the area and circumference of a circle' }
      ],
      'Language Arts': [
        { code: 'RL.7.1', title: 'Cite several pieces of textual evidence to support analysis of literary text' },
        { code: 'RI.7.8', title: 'Trace and evaluate the argument and specific claims in a text' }
      ],
      'Science': [
        { code: 'MS-PS2-2', title: 'Plan an investigation to provide evidence that change in motion depends on forces' },
        { code: 'MS-LS2-1', title: 'Analyze and interpret data to provide evidence for resource effects on organisms' }
      ],
      'Social Studies': [
        { code: 'C3.7.His.1', title: 'Analyze how civilizations interacted and exchanged ideas across trade routes' }
      ]
    },
    '8': {
      'Math': [
        { code: '8.EE.A.1', title: 'Know and apply the properties of integer exponents' },
        { code: '8.EE.B.5', title: 'Graph proportional relationships, interpreting the unit rate as slope' },
        { code: '8.F.A.1',  title: 'Understand that a function is a rule that assigns each input exactly one output' },
        { code: '8.G.B.7',  title: 'Apply the Pythagorean Theorem to determine unknown side lengths in right triangles' }
      ],
      'Language Arts': [
        { code: 'RL.8.1', title: 'Cite textual evidence that most strongly supports analysis of what text says explicitly' },
        { code: 'RI.8.2', title: 'Determine a central idea of a text and analyze its development over course of text' }
      ],
      'Science': [
        { code: 'MS-PS3-1', title: 'Construct and interpret graphical displays of data to describe kinetic energy' },
        { code: 'MS-ESS2-1', title: 'Develop a model to describe the cycling of Earth materials and flow of energy' }
      ],
      'Social Studies': [
        { code: 'C3.8.Civ.1', title: 'Analyze the creation and implementation of the U.S. Constitution and Bill of Rights' }
      ]
    },
    'hs': {
      'Math': [
        { code: 'HSN.RN.A.1', title: 'Explain how the definition of fractional exponents follows from integer rules' },
        { code: 'HSA.SSE.A.1', title: 'Interpret expressions that represent a quantity in terms of its context' },
        { code: 'HSA.REI.B.3', title: 'Solve linear equations and inequalities in one variable' },
        { code: 'HSF.IF.A.1',  title: 'Understand that a function associates each element of its domain with a range' },
        { code: 'HSG.SRT.C.6', title: 'Understand and apply trigonometric ratios in right triangles' }
      ],
      'Language Arts': [
        { code: 'RL.9-10.1', title: 'Cite strong and thorough textual evidence to support analysis of explicit text' },
        { code: 'RL.11-12.1', title: 'Cite strong and thorough textual evidence, determining where text is ambiguous' },
        { code: 'RI.9-10.2', title: 'Determine a central idea of a text and analyze its development over course of text' }
      ],
      'Science': [
        { code: 'HS-PS1-1', title: 'Use the periodic table as a model to predict the relative properties of elements' },
        { code: 'HS-LS1-1', title: 'Construct an explanation based on evidence for how DNA structure determines proteins' },
        { code: 'HS-ESS1-1', title: 'Develop a model based on evidence to illustrate the life span of the sun' }
      ],
      'Social Studies': [
        { code: 'C3.HS.Civ.1', title: 'Analyze the impact of landmark Supreme Court decisions on civil liberties' },
        { code: 'C3.HS.Econ.1', title: 'Explain how fiscal and monetary policies influence global and domestic economies' }
      ]
    }
  };

  // Master 36-Week Pacing Guide Curriculum Model
  const MASTER_PACING_PLAN = [
    // --- QUARTER 1 (Weeks 1-9): Foundations & Core Concepts ---
    { week: 1,  quarter: 1, title: 'Number Sense Foundations & Print Conventions', standard: 'CCSS.MATH.K-3.OA', desc: 'Orientation, baseline diagnostic readiness, cardinal number sequencing, and print tracking.', lesson: '/lessons/k-math-m1-a-1.php', checkpoint: 'OA.1' },
    { week: 2,  quarter: 1, title: 'Whole Number Representations & Word Models', standard: 'CCSS.MATH.OA.A.1', desc: 'Modeling quantities with physical counters, pictorial arrays, and initial text comprehension.', lesson: '/lessons/k-math-m1-a-2.php', checkpoint: 'OA.A.1' },
    { week: 3,  quarter: 1, title: 'Comparative Reasoning & Character Analysis', standard: 'CCSS.MATH.CC.B.4', desc: 'Comparing values (greater than/less than) and identifying character intentions in core stories.', lesson: '/lessons/k-math-m1-a-3.php', checkpoint: 'CC.B.4' },
    { week: 4,  quarter: 1, title: 'Properties of Physical Systems & Matter', standard: 'NGSS.PS1.A', desc: 'Observing matter, classifying objects by observable physical properties, and vocabulary acquisition.', lesson: '/src/lesson_runner.php?subject=science&level=1', checkpoint: 'PS1-1' },
    { week: 5,  quarter: 1, title: 'Addition Concepts & Contextual Story Problems', standard: 'CCSS.MATH.OA.A.2', desc: 'Joining sets, number line progression, and translating word problems into number sentences.', lesson: '/src/lesson_runner.php?subject=math&level=2', checkpoint: 'OA.A.2' },
    { week: 6,  quarter: 1, title: 'Text Structures & Informational Sequencing', standard: 'CCSS.ELA.RI.2', desc: 'Identifying main ideas, chronological order, headings, and supporting diagrammatic details.', lesson: '/src/lesson_runner.php?subject=language&level=2', checkpoint: 'RI.2' },
    { week: 7,  quarter: 1, title: 'Community Governance & Social Interactions', standard: 'C3.Civ.1', desc: 'Examining rules, responsibilities of active citizens, and early community history.', lesson: '/src/lesson_runner.php?subject=social&level=1', checkpoint: 'Civ.1' },
    { week: 8,  quarter: 1, title: 'Fluency Sprint & Rapid Fact Recall', standard: 'CCSS.MATH.OA.C.6', desc: 'Fact families, addition/subtraction within 20, mental arithmetic fluency conditioning.', lesson: '/assessment/#mode=sprint', checkpoint: 'OA.C.6' },
    { week: 9,  quarter: 1, title: 'Quarter 1 Milestone Evaluation & Portfolio Check', standard: 'CCSS.MATH.DIAG.Q1', desc: 'Comprehensive Q1 formative review, mastery report card compilation, and student reflection.', lesson: '/assessment/', checkpoint: 'Q1-MASTERY' },

    // --- QUARTER 2 (Weeks 10-18): Skill Building & Multi-Step Integration ---
    { week: 10, quarter: 2, title: 'Place Value Architecture (Tens & Hundreds)', standard: 'CCSS.MATH.NBT.A.1', desc: 'Decomposing numbers into hundreds, tens, and units; expanded notation and base-10 blocks.', lesson: '/src/lesson_runner.php?subject=math&level=3', checkpoint: 'NBT.A.1' },
    { week: 11, quarter: 2, title: 'Multi-Digit Arithmetic Strategies', standard: 'CCSS.MATH.NBT.B.5', desc: 'Algorithms, partial sums, regrouping concepts, and estimating reasonableness of answers.', lesson: '/src/lesson_runner.php?subject=math&level=4', checkpoint: 'NBT.B.5' },
    { week: 12, quarter: 2, title: 'Forces, Motion, and Balanced Energy', standard: 'NGSS.PS2.A', desc: 'Experimental testing of pushes, pulls, gravity, and frictional resistances.', lesson: '/src/lesson_runner.php?subject=science&level=3', checkpoint: 'PS2-1' },
    { week: 13, quarter: 2, title: 'Central Message & Moral Analysis in Literature', standard: 'CCSS.ELA.RL.2', desc: 'Analyzing fables, folktales, and contemporary narratives to deduce central life themes.', lesson: '/src/lesson_runner.php?subject=language&level=3', checkpoint: 'RL.2' },
    { week: 14, quarter: 2, title: 'Introduction to Multiplication & Equal Groups', standard: 'CCSS.MATH.OA.A.3', desc: 'Repeated addition, array models, rows and columns, and initial times tables.', lesson: '/src/lesson_runner.php?subject=math&level=5', checkpoint: 'OA.A.3' },
    { week: 15, quarter: 2, title: 'Geographic Mapping & Spatial Environments', standard: 'C3.Geo.1', desc: 'Grid coordinates, legend interpretation, cardinal directions, and biome representations.', lesson: '/src/lesson_runner.php?subject=social&level=3', checkpoint: 'Geo.1' },
    { week: 16, quarter: 2, title: 'Sentence Mechanics & Academic Vocabulary', standard: 'CCSS.ELA.L.3', desc: 'Compound structures, irregular plural nouns, context clues, and precise word choices.', lesson: '/src/lesson_runner.php?subject=language&level=4', checkpoint: 'L.3' },
    { week: 17, quarter: 2, title: 'Mid-Year Fluency Sprint & Operational Stamina', standard: 'CCSS.MATH.FLUENCY', desc: '60-second speed checks across multiplication, sight words, and basic science facts.', lesson: '/assessment/#mode=sprint', checkpoint: 'SPRINT-MID' },
    { week: 18, quarter: 2, title: 'Quarter 2 Mid-Term Competency Assessment', standard: 'CCSS.MIDYEAR.EXAM', desc: 'Mid-term synthesis assessment, standards mastery updates, and parent progress conference.', lesson: '/assessment/', checkpoint: 'MIDYEAR-COMPETENCY' },

    // --- QUARTER 3 (Weeks 19-27): Advanced Application & Analytical Thinking ---
    { week: 19, quarter: 3, title: 'Fractional Foundations & Part-Whole Models', standard: 'CCSS.MATH.NF.A.1', desc: 'Unit fractions, tape diagrams, number line partitioning, and real-world representations.', lesson: '/src/lesson_runner.php?subject=math&level=6', checkpoint: 'NF.A.1' },
    { week: 20, quarter: 3, title: 'Equivalent Fractions & Comparative Scales', standard: 'CCSS.MATH.NF.A.2', desc: 'Cross-multiplication concepts, common denominators, and benchmarking to half and whole.', lesson: '/src/lesson_runner.php?subject=math&level=7', checkpoint: 'NF.A.2' },
    { week: 21, quarter: 3, title: 'Earth Dynamics, Weather, and Climate Cycles', standard: 'NGSS.ESS2.A', desc: 'Water cycle stages, atmospheric observations, severe weather preparation, and rock cycles.', lesson: '/src/lesson_runner.php?subject=science&level=5', checkpoint: 'ESS2-1' },
    { week: 22, quarter: 3, title: 'Argumentative Texts & Author Purpose', standard: 'CCSS.ELA.RI.6', desc: 'Evaluating claims, assessing credibility of textual evidence, and detecting bias.', lesson: '/src/lesson_runner.php?subject=language&level=5', checkpoint: 'RI.6' },
    { week: 23, quarter: 3, title: 'Decimals, Fractions, and Metric Place Value', standard: 'CCSS.MATH.NF.C.6', desc: 'Tenths and hundredths notation, metric conversions, and financial monetary calculations.', lesson: '/src/lesson_runner.php?subject=math&level=8', checkpoint: 'NF.C.6' },
    { week: 24, quarter: 3, title: 'Economic Systems: Goods, Services & Trade', standard: 'C3.Econ.1', desc: 'Producers, consumers, supply/demand curves, market structures, and international commerce.', lesson: '/src/lesson_runner.php?subject=social&level=5', checkpoint: 'Econ.1' },
    { week: 25, quarter: 3, title: 'Living Systems, Ecosystems, and Adaptations', standard: 'NGSS.LS2.A', desc: 'Food webs, producer/consumer cycles, predator adaptations, and biospheric balance.', lesson: '/src/lesson_runner.php?subject=science&level=6', checkpoint: 'LS2-1' },
    { week: 26, quarter: 3, title: 'Timed Problem Solving & Critical Inquiries', standard: 'CCSS.MATH.MD.B', desc: 'Interval timing, liquid volume, mass, line plots, and multi-step data interpretation.', lesson: '/assessment/#mode=practice', checkpoint: 'MD.B' },
    { week: 27, quarter: 3, title: 'Quarter 3 Benchmark Evaluation & Portfolio Audit', standard: 'CCSS.MATH.Q3.BENCH', desc: 'Formative audit of all Q3 benchmarks, error analysis, and targeted remediation plans.', lesson: '/assessment/', checkpoint: 'Q3-MASTERY' },

    // --- QUARTER 4 (Weeks 28-36): Synthesis, Mastery Review & Capstone ---
    { week: 28, quarter: 4, title: 'Geometric Properties & Angle Classification', standard: 'CCSS.MATH.G.A.1', desc: 'Lines, rays, angles (acute, right, obtuse), polygon classification, and symmetry lines.', lesson: '/src/lesson_runner.php?subject=math&level=9', checkpoint: 'G.A.1' },
    { week: 29, quarter: 4, title: 'Area, Perimeter, and Spatial Volumetrics', standard: 'CCSS.MATH.MD.C.7', desc: 'Tiling, composite polygon decomposition, 3D cubic units, and packaging calculations.', lesson: '/src/lesson_runner.php?subject=math&level=10', checkpoint: 'MD.C.7' },
    { week: 30, quarter: 4, title: 'Scientific Method & Empirical Inventions', standard: 'NGSS.ETS1.A', desc: 'Formulating hypotheses, controlled variable testing, data logging, and prototype design.', lesson: '/src/lesson_runner.php?subject=science&level=7', checkpoint: 'ETS1-1' },
    { week: 31, quarter: 4, title: 'Narrative & Research Writing Synthesis', standard: 'CCSS.ELA.W.2', desc: 'Thesis formulation, citing primary/secondary sources, drafting, editing, and peer review.', lesson: '/src/lesson_runner.php?subject=language&level=7', checkpoint: 'W.2' },
    { week: 32, quarter: 4, title: 'Statistical Distributions & Data Charts', standard: 'CCSS.MATH.SP.A', desc: 'Mean, median, mode, stem-and-leaf plots, histograms, and probability experiments.', lesson: '/src/lesson_runner.php?subject=math&level=11', checkpoint: 'SP.A' },
    { week: 33, quarter: 4, title: 'Historical Turning Points & Civic Impact', standard: 'C3.His.1', desc: 'Primary document examination (Declarations, Constitutions, historic speeches) and legacies.', lesson: '/src/lesson_runner.php?subject=social&level=7', checkpoint: 'His.1' },
    { week: 34, quarter: 4, title: 'Comprehensive Standard Mastery Review', standard: 'CCSS.ALL.REVIEW', desc: 'Spiral review of the year’s foundational domains across Math, ELA, and Science.', lesson: '/pages/standards.php', checkpoint: 'SPIRAL-REVIEW' },
    { week: 35, quarter: 4, title: 'Speed & Fluency Capstone Tournament', standard: 'CCSS.FLUENCY.FINAL', desc: 'Final 60-second fluency sprint record attempts and speed-reading challenge checks.', lesson: '/assessment/#mode=sprint', checkpoint: 'SPRINT-CHAMPION' },
    { week: 36, quarter: 4, title: 'Official End-of-Year Capstone & Certification', standard: 'CCSS.ENDYEAR.CERT', desc: 'Official End-of-Year cumulative assessment, completion badge award, and transcript issuance.', lesson: '/assessment/', checkpoint: 'ENDYEAR-CERT' }
  ];

  const STORAGE_KEY_PACING = 'hesten_teacher_pacing_progress';

  // --- STATE ---
  let selectedGrade = '3';
  let selectedSubject = 'Math';
  let selectedStandard = '3.OA.A.1';
  let selectedMode = 'practice';
  let selectedCount = 10;
  let activeQuarterFilter = 'all';

  // --- INITIALIZATION ---
  document.addEventListener('DOMContentLoaded', () => {
    initTabs();
    initAssignmentBuilder();
    initPacingGuide();
    handleUrlHashRouting();
  });

  // --- TAB NAVIGATION ---
  function initTabs() {
    const tabBtns = document.querySelectorAll('.teacher-tab-btn');
    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const targetId = btn.getAttribute('data-tab');
        switchTab(targetId);
      });
    });
  }

  function switchTab(targetId) {
    const tabBtns = document.querySelectorAll('.teacher-tab-btn');
    const tabPanels = document.querySelectorAll('.teacher-tab-panel');

    tabBtns.forEach(b => {
      const isActive = b.getAttribute('data-tab') === targetId;
      b.classList.toggle('active', isActive);
      b.setAttribute('aria-selected', isActive ? 'true' : 'false');
    });

    tabPanels.forEach(panel => {
      const isActive = panel.id === targetId;
      panel.classList.toggle('active', isActive);
    });

    // Update URL hash without jumping
    if (history.replaceState) {
      history.replaceState(null, null, '#' + targetId.replace('tab-', ''));
    }
  }

  function handleUrlHashRouting() {
    const hash = (window.location.hash || '').replace('#', '').toLowerCase();
    if (hash === 'pacing' || hash === 'syllabus') {
      switchTab('tab-pacing');
    } else if (hash === 'resources' || hash === 'keys') {
      switchTab('tab-resources');
    } else if (hash === 'builder' || hash === 'assignments') {
      switchTab('tab-builder');
    }
  }

  // --- ASSIGNMENT BUILDER ENGINE ---
  function initAssignmentBuilder() {
    const gradeSelect = document.getElementById('builder-grade-select');
    const subjectSelect = document.getElementById('builder-subject-select');
    const standardSelect = document.getElementById('builder-standard-select');
    const modeSelect = document.getElementById('builder-mode-select');
    const countSelect = document.getElementById('builder-count-select');

    if (!gradeSelect || !standardSelect) return;

    // Populate standards when grade or subject changes
    function refreshStandardOptions() {
      selectedGrade = gradeSelect.value;
      selectedSubject = subjectSelect.value;

      const standardsList = (STANDARDS_REGISTRY[selectedGrade] && STANDARDS_REGISTRY[selectedGrade][selectedSubject]) || [];
      standardSelect.innerHTML = '';

      if (standardsList.length > 0) {
        standardsList.forEach(item => {
          const opt = document.createElement('option');
          opt.value = item.code;
          opt.textContent = `${item.code} - ${item.title}`;
          standardSelect.appendChild(opt);
        });
        selectedStandard = standardsList[0].code;
      } else {
        const opt = document.createElement('option');
        opt.value = 'General';
        opt.textContent = 'General Core Assessment';
        standardSelect.appendChild(opt);
        selectedStandard = 'General';
      }

      updateBuilderOutput();
    }

    gradeSelect.addEventListener('change', refreshStandardOptions);
    subjectSelect.addEventListener('change', refreshStandardOptions);

    standardSelect.addEventListener('change', () => {
      selectedStandard = standardSelect.value;
      updateBuilderOutput();
    });

    modeSelect.addEventListener('change', () => {
      selectedMode = modeSelect.value;
      updateBuilderOutput();
    });

    countSelect.addEventListener('change', () => {
      selectedCount = parseInt(countSelect.value, 10) || 10;
      updateBuilderOutput();
    });

    // Wire action buttons
    document.getElementById('builder-copy-url-btn')?.addEventListener('click', copyAssignmentUrl);
    document.getElementById('builder-copy-prompt-btn')?.addEventListener('click', copyClassroomPrompt);
    document.getElementById('builder-test-student-btn')?.addEventListener('click', testAsStudent);
    document.getElementById('builder-toggle-prompt-btn')?.addEventListener('click', togglePromptPreview);

    // Initial populate
    refreshStandardOptions();
  }

  function generateAssignmentUrl() {
    const origin = window.location.origin || (window.location.protocol + '//' + window.location.host);
    const standardPart = selectedStandard !== 'General' ? encodeURIComponent(selectedStandard) : '';
    const gradeParam = selectedGrade !== 'General' ? selectedGrade : '3';

    let url = `${origin}/assessment/?grade=${gradeParam}`;
    if (standardPart) {
      url += `#standard=${standardPart}&count=${selectedCount}&mode=${selectedMode}`;
    } else {
      url += `&count=${selectedCount}&mode=${selectedMode}`;
    }
    return url;
  }

  function generateLessonRunnerUrl() {
    const origin = window.location.origin || (window.location.protocol + '//' + window.location.host);
    const lvl = (GRADE_CONFIG[selectedGrade] && GRADE_CONFIG[selectedGrade].level) || 'e';
    const subj = selectedSubject.toLowerCase().includes('math') ? 'math' :
                 selectedSubject.toLowerCase().includes('lang') ? 'language' :
                 selectedSubject.toLowerCase().includes('sci')  ? 'science' : 'social';
    return `${origin}/src/lesson_runner.php?subject=${subj}&level=${lvl}`;
  }

  function updateBuilderOutput() {
    const urlDisplay = document.getElementById('builder-url-text');
    const lessonShortcut = document.getElementById('builder-lesson-shortcut');
    const promptPreview = document.getElementById('builder-prompt-preview');

    const generatedUrl = generateAssignmentUrl();
    const lessonUrl = generateLessonRunnerUrl();

    if (urlDisplay) {
      urlDisplay.textContent = generatedUrl;
    }

    if (lessonShortcut) {
      lessonShortcut.href = lessonUrl;
      const gName = (GRADE_CONFIG[selectedGrade] && GRADE_CONFIG[selectedGrade].name) || 'Grade';
      lessonShortcut.textContent = `Open Matching Lesson Runner (${gName} ${selectedSubject})`;
    }

    if (promptPreview) {
      promptPreview.textContent = generateClassroomPromptText(generatedUrl);
    }
  }

  function generateClassroomPromptText(url) {
    const gName = (GRADE_CONFIG[selectedGrade] && GRADE_CONFIG[selectedGrade].name) || 'Grade';
    const modeLabel = selectedMode === 'sprint' ? '⚡ 60-Second Timed Fluency Sprint' : '🎯 Standard Mastery Practice (Untimed with Explanations)';
    
    return `📚 Assignment: ${gName} ${selectedSubject} • Standard ${selectedStandard}\n` +
           `⏱️ Mode: ${modeLabel} (${selectedCount} Questions)\n` +
           `🔗 Direct Student Link:\n${url}\n\n` +
           `📝 Instructions for Students:\n` +
           `1. Click the link above to start your targeted practice session.\n` +
           `2. Read each question carefully. Use the hint button if you need support.\n` +
           `3. When finished, inspect the "Review Answers" matrix to read the step-by-step pedagogical explanations for any questions you missed. Good luck!`;
  }

  function copyAssignmentUrl() {
    const url = generateAssignmentUrl();
    navigator.clipboard.writeText(url).then(() => {
      showToast('Assignment link copied to clipboard!');
    }).catch(() => {
      prompt('Copy this link:', url);
    });
  }

  function copyClassroomPrompt() {
    const text = generateClassroomPromptText(generateAssignmentUrl());
    navigator.clipboard.writeText(text).then(() => {
      showToast('Classroom instructions copied to clipboard!');
    }).catch(() => {
      prompt('Copy assignment instructions:', text);
    });
  }

  function testAsStudent() {
    const url = generateAssignmentUrl();
    window.open(url, '_blank');
  }

  function togglePromptPreview() {
    const preview = document.getElementById('builder-prompt-preview');
    if (!preview) return;
    const isHidden = preview.style.display === 'none';
    preview.style.display = isHidden ? 'block' : 'none';
  }

  // --- 36-WEEK PACING GUIDE ENGINE ---
  function initPacingGuide() {
    const container = document.getElementById('pacing-schedule-container');
    const quarterPills = document.querySelectorAll('.quarter-pill-btn');
    const printBtn = document.getElementById('pacing-print-btn');

    if (!container) return;

    quarterPills.forEach(pill => {
      pill.addEventListener('click', () => {
        quarterPills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        activeQuarterFilter = pill.getAttribute('data-quarter');
        renderPacingSchedule();
      });
    });

    if (printBtn) {
      printBtn.addEventListener('click', () => {
        window.print();
      });
    }

    renderPacingSchedule();
  }

  function getCompletedWeeks() {
    try {
      return JSON.parse(localStorage.getItem(STORAGE_KEY_PACING)) || [];
    } catch (e) {
      return [];
    }
  }

  function toggleWeekCompletion(weekNum, isChecked) {
    try {
      let weeks = getCompletedWeeks();
      if (isChecked && !weeks.includes(weekNum)) {
        weeks.push(weekNum);
      } else if (!isChecked) {
        weeks = weeks.filter(w => w !== weekNum);
      }
      localStorage.setItem(STORAGE_KEY_PACING, JSON.stringify(weeks));
      
      const row = document.getElementById(`pacing-row-${weekNum}`);
      if (row) {
        row.classList.toggle('completed-week', isChecked);
      }
    } catch (e) {
      console.warn('Failed to save pacing progress:', e);
    }
  }

  function renderPacingSchedule() {
    const container = document.getElementById('pacing-schedule-container');
    if (!container) return;

    const completedWeeks = getCompletedWeeks();
    const quarters = [
      { q: 1, title: 'Quarter 1: Foundations & Core Concepts', badge: 'Weeks 1–9', cls: 'quarter-q1' },
      { q: 2, title: 'Quarter 2: Multi-Step Integration & Operations', badge: 'Weeks 10–18', cls: 'quarter-q2' },
      { q: 3, title: 'Quarter 3: Advanced Fractions & Analytical Thinking', badge: 'Weeks 19–27', cls: 'quarter-q3' },
      { q: 4, title: 'Quarter 4: Geometric Synthesis & Capstone Mastery', badge: 'Weeks 28–36', cls: 'quarter-q4' }
    ];

    let html = '';

    quarters.forEach(quarterInfo => {
      // Filter by active quarter
      if (activeQuarterFilter !== 'all' && activeQuarterFilter !== String(quarterInfo.q)) {
        return;
      }

      const weeksInQuarter = MASTER_PACING_PLAN.filter(item => item.quarter === quarterInfo.q);

      html += `
        <div class="quarter-section" id="quarter-${quarterInfo.q}">
          <div class="quarter-banner ${quarterInfo.cls}">
            <h3 class="quarter-title"><i class="fas fa-calendar-alt"></i> ${quarterInfo.title}</h3>
            <span class="quarter-weeks-badge">${quarterInfo.badge}</span>
          </div>
          <div class="pacing-week-list">
      `;

      weeksInQuarter.forEach(item => {
        const isCompleted = completedWeeks.includes(item.week);
        html += `
          <div class="pacing-week-row ${isCompleted ? 'completed-week' : ''}" id="pacing-row-${item.week}">
            <div class="pacing-col-week">
              <span>Wk ${item.week}</span>
            </div>
            <div class="pacing-col-unit">
              <span class="pacing-unit-title">${escapeHtml(item.title)}</span>
              <span class="pacing-unit-desc">${escapeHtml(item.desc)}</span>
            </div>
            <div class="pacing-col-standard">
              <span class="pacing-standard-badge">
                <i class="fas fa-bookmark"></i> ${escapeHtml(item.standard)}
              </span>
            </div>
            <div class="pacing-col-links">
              <a href="${item.lesson}" class="pacing-lesson-link" target="_blank">
                <i class="fas fa-chalkboard"></i> Lesson Module
              </a>
              <a href="/assessment/#standard=${encodeURIComponent(item.checkpoint)}&count=10" class="pacing-checkpoint-link" target="_blank">
                <i class="fas fa-check-circle"></i> Assessment Check
              </a>
            </div>
            <div class="pacing-col-action">
              <label class="pacing-check-label">
                <input type="checkbox" class="pacing-checkbox" ${isCompleted ? 'checked' : ''} onchange="window.handleWeekCheck(${item.week}, this.checked)">
                <span>Done</span>
              </label>
            </div>
          </div>
        `;
      });

      html += `
          </div>
        </div>
      `;
    });

    container.innerHTML = html;
  }

  // Expose global hook for week checkbox
  window.handleWeekCheck = function (weekNum, isChecked) {
    toggleWeekCompletion(weekNum, isChecked);
  };

  // --- UTILITY TOAST ---
  function showToast(message) {
    let toast = document.getElementById('teacher-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'teacher-toast';
      toast.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: #10b981;
        color: #ffffff;
        padding: 0.875rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 700;
        font-size: 0.875rem;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.2);
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.25s ease;
      `;
      document.body.appendChild(toast);
    }

    toast.innerHTML = `<i class="fas fa-check-circle"></i> ${escapeHtml(message)}`;
    toast.style.opacity = '1';
    toast.style.transform = 'translateY(0)';

    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateY(10px)';
    }, 2500);
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

})();
