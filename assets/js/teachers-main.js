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
    initLessonPlanCustomizer();
    initClassRosterTracker();
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
    } else if (hash === 'lesson' || hash === 'lesson-plan' || hash === 'quiz') {
      switchTab('tab-lesson-plan');
    } else if (hash === 'roster' || hash === 'students' || hash === 'class') {
      switchTab('tab-roster');
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

  // --- TAB 4: LESSON PLAN & QUIZ CUSTOMIZER ENGINE ---
  function initLessonPlanCustomizer() {
    const gradeSelect = document.getElementById('lp-grade-select');
    const subjectSelect = document.getElementById('lp-subject-select');
    const standardSelect = document.getElementById('lp-standard-select');
    const durationSelect = document.getElementById('lp-duration-select');
    const modelSelect = document.getElementById('lp-model-select');
    const generateBtn = document.getElementById('btn-generate-lesson-plan');
    const outputContainer = document.getElementById('lp-output-container');

    if (!gradeSelect || !standardSelect || !generateBtn) return;

    function refreshStandards() {
      const grade = gradeSelect.value;
      const subject = subjectSelect.value;
      const list = (STANDARDS_REGISTRY[grade] && STANDARDS_REGISTRY[grade][subject]) || [];
      standardSelect.innerHTML = '';

      if (list.length > 0) {
        list.forEach(item => {
          const opt = document.createElement('option');
          opt.value = item.code;
          opt.textContent = `${item.code} - ${item.title}`;
          standardSelect.appendChild(opt);
        });
      } else {
        const opt = document.createElement('option');
        opt.value = 'General';
        opt.textContent = 'General Core Subject Standards';
        standardSelect.appendChild(opt);
      }
    }

    gradeSelect.addEventListener('change', refreshStandards);
    subjectSelect.addEventListener('change', refreshStandards);
    refreshStandards();

    generateBtn.addEventListener('click', () => {
      const gradeVal = gradeSelect.value;
      const gradeName = (GRADE_CONFIG[gradeVal] && GRADE_CONFIG[gradeVal].name) || gradeVal;
      const subjectVal = subjectSelect.value;
      const standardCode = standardSelect.value;
      const standardText = standardSelect.options[standardSelect.selectedIndex] ? standardSelect.options[standardSelect.selectedIndex].text : standardCode;
      const durationVal = durationSelect.value;
      const modelVal = modelSelect.value;

      const modelNames = {
        'cra': 'Concrete-Representational-Abstract (CRA Explicit Model)',
        'inquiry': '5E Guided Inquiry & Scientific Discovery',
        'workshop': 'Reader/Writer Workshop & Socratic Dialogue'
      };
      const modelName = modelNames[modelVal] || modelVal;

      // Generate dynamic pedagogy components
      const lessonPlanData = buildLessonPlanDetails(gradeName, subjectVal, standardCode, standardText, durationVal, modelName);

      outputContainer.innerHTML = `
        <div class="lesson-plan-sheet" id="lesson-plan-sheet">
          <div class="lp-sheet-header">
            <div>
              <span class="lp-sheet-badge"><i class="fas fa-certificate"></i> Standards-Aligned Syllabus</span>
              <h3 class="lp-sheet-title">${escapeHtml(subjectVal)}: ${escapeHtml(standardCode)}</h3>
              <p class="lp-sheet-subtitle">${escapeHtml(standardText)}</p>
            </div>
            <div class="lp-meta-pill-group">
              <span class="lp-meta-pill"><i class="fas fa-graduation-cap"></i> ${escapeHtml(gradeName)}</span>
              <span class="lp-meta-pill"><i class="fas fa-clock"></i> ${escapeHtml(durationVal)} Minutes</span>
              <span class="lp-meta-pill"><i class="fas fa-chalkboard-teacher"></i> ${escapeHtml(modelName.split(' ')[0])}</span>
            </div>
          </div>

          <!-- Section 1: Objective & Essential Question -->
          <div class="lp-stage-card">
            <div class="lp-stage-title"><i class="fas fa-bullseye text-indigo-600"></i> Stage 1: Objective & Essential Question</div>
            <div class="lp-stage-content">
              <p><strong>Learning Target (SWBAT):</strong> ${escapeHtml(lessonPlanData.objective)}</p>
              <p style="margin-top: 0.5rem;"><strong>Essential Question:</strong> <em>"${escapeHtml(lessonPlanData.essentialQuestion)}"</em></p>
            </div>
          </div>

          <!-- Section 2: Materials & Key Vocabulary -->
          <div class="lp-stage-card">
            <div class="lp-stage-title"><i class="fas fa-boxes text-purple-600"></i> Stage 2: Materials & Key Vocabulary</div>
            <div class="lp-stage-content">
              <p><strong>Required Materials:</strong> ${escapeHtml(lessonPlanData.materials)}</p>
              <div class="lp-vocab-pills" style="margin-top: 0.5rem;">
                ${lessonPlanData.vocab.map(v => `<span class="lp-vocab-pill"><strong>${escapeHtml(v.term)}:</strong> ${escapeHtml(v.def)}</span>`).join('')}
              </div>
            </div>
          </div>

          <!-- Section 3: Direct Instruction ("I Do") -->
          <div class="lp-stage-card">
            <div class="lp-stage-title"><i class="fas fa-user-tie text-emerald-600"></i> Stage 3: Direct Instruction & Modeling ("I Do" • ${Math.round(durationVal * 0.35)} min)</div>
            <div class="lp-stage-content">
              <p>${escapeHtml(lessonPlanData.directInstruction)}</p>
            </div>
          </div>

          <!-- Section 4: Guided Practice ("We Do") -->
          <div class="lp-stage-card">
            <div class="lp-stage-title"><i class="fas fa-user-friends text-blue-600"></i> Stage 4: Guided & Collaborative Practice ("We Do" • ${Math.round(durationVal * 0.35)} min)</div>
            <div class="lp-stage-content">
              <p>${escapeHtml(lessonPlanData.guidedPractice)}</p>
            </div>
          </div>

          <!-- Section 5: Independent Practice & Exit Ticket ("You Do") -->
          <div class="lp-stage-card">
            <div class="lp-stage-title"><i class="fas fa-user-check text-amber-600"></i> Stage 5: Independent Practice & Exit Ticket ("You Do" • ${Math.round(durationVal * 0.30)} min)</div>
            <div class="lp-stage-content">
              <p>${escapeHtml(lessonPlanData.independentPractice)}</p>
            </div>
          </div>

          <!-- Formative Assessment Quiz Worksheet -->
          <div class="lp-quiz-container" id="lp-quiz-printable">
            <div class="lp-quiz-header">
              <h4 style="margin: 0; font-size: 1.2rem; font-weight: 800; color: var(--color-text-main);">
                <i class="fas fa-tasks text-indigo-600"></i> Formative Diagnostic Quiz (5 Questions)
              </h4>
              <span style="font-size: 0.85rem; color: var(--color-text-muted);">Standard Target: ${escapeHtml(standardCode)}</span>
            </div>

            <div class="lp-questions-list">
              ${lessonPlanData.quiz.map((q, idx) => `
                <div class="lp-question-item">
                  <p class="lp-question-text"><strong>${idx + 1}.</strong> ${escapeHtml(q.prompt)}</p>
                  <div class="lp-choices-grid">
                    ${q.choices.map((c, cIdx) => `
                      <div class="lp-choice-item">
                        <span class="lp-choice-letter">${['A', 'B', 'C', 'D'][cIdx]})</span>
                        <span>${escapeHtml(c)}</span>
                      </div>
                    `).join('')}
                  </div>
                  <div class="lp-answer-key-box">
                    <span class="lp-key-badge"><i class="fas fa-check"></i> Answer: ${escapeHtml(q.answer)}</span>
                    <span class="lp-rationale-text"><strong>Rationale:</strong> ${escapeHtml(q.rationale)}</span>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>

          <!-- Action Buttons Bar -->
          <div class="builder-actions-row no-print" style="margin-top: 1.5rem; justify-content: flex-end;">
            <button type="button" class="builder-action-btn builder-btn-secondary" id="btn-copy-lp-md">
              <i class="fas fa-copy"></i> Copy Markdown Plan
            </button>
            <button type="button" class="builder-action-btn builder-btn-primary" id="btn-print-lp">
              <i class="fas fa-print"></i> Print Lesson Plan & Quiz (PDF)
            </button>
          </div>
        </div>
      `;

      outputContainer.style.display = 'block';
      outputContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

      // Attach print & copy events
      const printBtn = document.getElementById('btn-print-lp');
      if (printBtn) {
        printBtn.addEventListener('click', () => window.print());
      }

      const copyBtn = document.getElementById('btn-copy-lp-md');
      if (copyBtn) {
        copyBtn.addEventListener('click', () => {
          const mdContent = `# Lesson Plan: ${subjectVal} - ${standardCode}\n\n` +
            `**Grade:** ${gradeName} | **Duration:** ${durationVal} min | **Model:** ${modelName}\n\n` +
            `## Stage 1: Objective & Essential Question\n- **Target:** ${lessonPlanData.objective}\n- **Essential Question:** ${lessonPlanData.essentialQuestion}\n\n` +
            `## Stage 2: Materials & Key Vocabulary\n- **Materials:** ${lessonPlanData.materials}\n- **Vocabulary:**\n${lessonPlanData.vocab.map(v => `  - **${v.term}:** ${v.def}`).join('\n')}\n\n` +
            `## Stage 3: Direct Instruction ("I Do")\n${lessonPlanData.directInstruction}\n\n` +
            `## Stage 4: Guided Practice ("We Do")\n${lessonPlanData.guidedPractice}\n\n` +
            `## Stage 5: Independent Practice ("You Do")\n${lessonPlanData.independentPractice}\n\n` +
            `## Formative Quiz (5 Questions)\n` +
            lessonPlanData.quiz.map((q, i) => `${i+1}. ${q.prompt}\n` + q.choices.map((c, ci) => `   ${['A','B','C','D'][ci]}) ${c}`).join('\n') + `\n   *Answer:* ${q.answer} - ${q.rationale}`).join('\n\n');

          if (navigator.clipboard) {
            navigator.clipboard.writeText(mdContent).then(() => {
              showToast("Copied complete lesson plan to clipboard!");
            });
          }
        });
      }

      showToast(`Generated lesson plan for ${standardCode}!`);
    });

    // --- WORKSHEET GENERATOR BUTTON HANDLER ---
    const worksheetBtn = document.getElementById('btn-generate-worksheet');
    if (worksheetBtn) {
      worksheetBtn.addEventListener('click', () => {
        const gradeVal = gradeSelect.value;
        const gradeName = (GRADE_CONFIG[gradeVal] && GRADE_CONFIG[gradeVal].name) || gradeVal;
        const subjectVal = subjectSelect.value;
        const standardCode = standardSelect.value;
        const standardText = standardSelect.options[standardSelect.selectedIndex] ? standardSelect.options[standardSelect.selectedIndex].text : standardCode;

        const worksheetData = buildWorksheetData(gradeName, subjectVal, standardCode, standardText);

        outputContainer.innerHTML = `
          <div class="worksheet-output-wrapper" id="worksheet-packet">
            <!-- Toolbar -->
            <div class="lp-sheet-actions no-print" style="margin-bottom: 1rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
              <button type="button" class="builder-action-btn builder-btn-primary" onclick="window.printWorksheet('student')">
                <i class="fas fa-print"></i> Print Student Sheet (Page 1)
              </button>
              <button type="button" class="builder-action-btn builder-btn-secondary" onclick="window.printWorksheet('teacher')">
                <i class="fas fa-key"></i> Print Teacher Key & Rubric (Page 2)
              </button>
              <button type="button" class="builder-action-btn builder-btn-secondary" onclick="window.printWorksheet('all')">
                <i class="fas fa-file-pdf"></i> Print Full 2-Page Packet
              </button>
            </div>

            <!-- PAGE 1: STUDENT PRACTICE WORKSHEET -->
            <div class="worksheet-page" id="worksheet-page-student">
              <div class="worksheet-top-banner">
                <div class="worksheet-title-group">
                  <span class="lp-sheet-badge" style="background:#e0e7ff; color:#4f46e5;"><i class="fas fa-graduation-cap"></i> ${escapeHtml(gradeName)} • ${escapeHtml(subjectVal)}</span>
                  <h2>${escapeHtml(standardCode)} Practice Packet</h2>
                  <p>${escapeHtml(standardText)}</p>
                </div>
                <div class="worksheet-student-lines">
                  <div class="worksheet-input-line">Student Name: _______________________</div>
                  <div class="worksheet-input-line">Date: ____________</div>
                  <div class="worksheet-input-line">Class Period: _______</div>
                  <div class="worksheet-input-line">Mastery Goal: 80%+</div>
                </div>
              </div>

              <!-- Core Concept Summary -->
              <div class="worksheet-summary-box">
                <strong><i class="fas fa-lightbulb text-amber-500"></i> Core Concept & Essential Rule:</strong>
                <p style="margin: 0.35rem 0 0 0;">${escapeHtml(worksheetData.conceptSummary)}</p>
              </div>

              <!-- Guided Model Step-by-Step -->
              <div class="worksheet-guided-model">
                <strong><i class="fas fa-hands-helping text-emerald-600"></i> Guided Example (Model Problem):</strong>
                <p style="margin: 0.35rem 0 0.25rem 0; font-weight: 700;">${escapeHtml(worksheetData.guidedModel.prompt)}</p>
                <div style="font-size: 0.875rem; color: #166534; background: #ffffff; padding: 0.65rem 0.85rem; border-radius: 0.35rem; border: 1px solid #bbf7d0;">
                  ${worksheetData.guidedModel.steps.map((s, idx) => `<div><strong>Step ${idx+1}:</strong> ${escapeHtml(s)}</div>`).join('')}
                </div>
              </div>

              <!-- Independent Practice Exercises (4 Problems) -->
              <h4 style="font-size: 1rem; font-weight: 800; margin: 1.25rem 0 0.75rem 0; color: #0f172a;">
                <i class="fas fa-pencil-alt text-indigo-600"></i> Independent Application Exercises
              </h4>
              <div class="worksheet-problems-grid">
                ${worksheetData.problems.map((p, idx) => `
                  <div class="worksheet-problem-card">
                    <div class="worksheet-problem-prompt">${idx+1}. ${escapeHtml(p.prompt)}</div>
                    <div class="worksheet-work-space">
                      <span>Show your thinking / work here:</span>
                    </div>
                  </div>
                `).join('')}
              </div>

              <!-- Reflection Scale -->
              <div class="worksheet-reflection-box">
                <span><strong>Self-Assessment:</strong> How confident do you feel applying ${escapeHtml(standardCode)}?</span>
                <span>⭐ 1 (Need Support) &nbsp; | &nbsp; ⭐⭐ 2 (Getting There) &nbsp; | &nbsp; ⭐⭐⭐ 3 (Mastered!)</span>
              </div>
            </div>

            <!-- PAGE 2: EDUCATOR ANSWER KEY & RUBRIC -->
            <div class="worksheet-page" id="worksheet-page-teacher" style="margin-top: 1.5rem;">
              <div class="worksheet-top-banner" style="border-color: #4f46e5;">
                <div class="worksheet-title-group">
                  <span class="lp-sheet-badge" style="background:#fee2e2; color:#dc2626;"><i class="fas fa-lock"></i> Educator Solution Guide & Scoring Rubric</span>
                  <h2>${escapeHtml(standardCode)} - Worked Answer Key</h2>
                  <p>Grade Level: ${escapeHtml(gradeName)} | Subject: ${escapeHtml(subjectVal)}</p>
                </div>
              </div>

              <!-- Solutions -->
              <h4 style="font-size: 1rem; font-weight: 800; margin: 0 0 0.75rem 0; color: #0f172a;">
                <i class="fas fa-check-circle text-emerald-600"></i> Worked Solutions & Computational Verification
              </h4>
              <div class="worksheet-problems-grid">
                ${worksheetData.problems.map((p, idx) => `
                  <div class="worksheet-problem-card" style="background: #f8fafc; border-color: #cbd5e1;">
                    <div class="worksheet-problem-prompt">${idx+1}. ${escapeHtml(p.prompt)}</div>
                    <div style="font-size: 0.875rem; color: #059669; font-weight: 700; margin-top: 0.5rem; background: #ecfdf5; padding: 0.5rem; border-radius: 0.35rem;">
                      Solution: ${escapeHtml(p.solution)}
                    </div>
                    <div style="font-size: 0.775rem; color: #64748b; margin-top: 0.35rem;">
                      <em>Rationale: ${escapeHtml(p.rationale)}</em>
                    </div>
                  </div>
                `).join('')}
              </div>

              <!-- Common Misconceptions to Watch For -->
              <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem;">
                <strong style="color: #b45309;"><i class="fas fa-exclamation-triangle"></i> Common Student Misconceptions:</strong>
                <ul style="margin: 0.4rem 0 0 1.25rem; font-size: 0.85rem; color: #92400e;">
                  ${worksheetData.misconceptions.map(m => `<li>${escapeHtml(m)}</li>`).join('')}
                </ul>
              </div>

              <!-- 4-Level Standards-Based Grading Rubric -->
              <h4 style="font-size: 1rem; font-weight: 800; margin: 0 0 0.5rem 0; color: #0f172a;">
                <i class="fas fa-table text-indigo-600"></i> Standards-Based Evaluative Rubric
              </h4>
              <table class="worksheet-rubric-table">
                <thead>
                  <tr>
                    <th>Score / Level</th>
                    <th>Demonstrated Criteria</th>
                    <th>Next Step Pedagogical Recommendation</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Level 4 (Exemplary)</strong></td>
                    <td>100% computational accuracy; explains reasoning with multiple mathematical or textual representations.</td>
                    <td>Provide extension challenges and peer-mentoring roles.</td>
                  </tr>
                  <tr>
                    <td><strong>Level 3 (Proficient)</strong></td>
                    <td>80–99% accuracy; demonstrates clear conceptual grasp with minor transcription errors.</td>
                    <td>Ready for procedural spiral progression.</td>
                  </tr>
                  <tr>
                    <td><strong>Level 2 (Developing)</strong></td>
                    <td>60–79% accuracy; understands basic definitions but struggles with multi-step synthesis.</td>
                    <td>Targeted small group practice with visual scaffolding.</td>
                  </tr>
                  <tr>
                    <td><strong>Level 1 (Beginning)</strong></td>
                    <td>&lt;60% accuracy; significant conceptual gaps or procedural confusion.</td>
                    <td>Concrete manipulative intervention and one-on-one re-teaching.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        `;

        outputContainer.style.display = 'block';
        outputContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        showToast(`Generated printable worksheet for ${standardCode}!`);
      });
    }
  }

  // --- WORKSHEET DATA GENERATOR (ALL GRADES & SUBJECTS) ---
  function buildWorksheetData(grade, subject, code, title) {
    const isMath = subject.includes('Math');
    const isELA = subject.includes('Language') || subject.includes('Arts') || subject.includes('Reading');
    const isSci = subject.includes('Science');
    const isSoc = subject.includes('Social');

    let conceptSummary = `Standard ${code} (${title}) establishes foundational proficiency in ${subject}. Learners decompose complex tasks, model relationships, and verify solutions systematically.`;
    
    let guidedModel = {
      prompt: `Analyze the core standard scenario: apply ${code} to evaluate a two-step problem.`,
      steps: [
        `Identify the given data, unknown variable, and explicit criteria in the prompt.`,
        `Select the appropriate strategy (e.g. visual model, algorithm, textual evidence).`,
        `Execute the step-by-step procedure while self-monitoring for precision.`,
        `Verify that the final answer is mathematically/conceptually sound and answer the core question.`
      ]
    };

    let problems = [
      {
        prompt: `Solve the foundational application problem for ${code}: Determine the primary value or evidence supporting the relationship.`,
        solution: `Correctly apply standard ${code} formula / textual evidence analysis.`,
        rationale: `Directly adheres to ${code} standard benchmark guidelines.`
      },
      {
        prompt: `Multi-step scenario: A problem requires decomposing two interconnected parts. Calculate or justify the combined outcome.`,
        solution: `Step 1 yields initial value A; Step 2 yields final solution B.`,
        rationale: `Reinforces procedural fluency and logical chaining.`
      },
      {
        prompt: `Contextual application: An authentic real-world challenge requires interpreting given parameters under ${code}.`,
        solution: `Model the authentic scenario and state the verified result with correct units / citations.`,
        rationale: `Demonstrates transference of abstract skills into authentic contexts.`
      },
      {
        prompt: `Error analysis & critical thinking: A student made an error in their work for ${code}. Identify the flaw and provide the corrected solution.`,
        solution: `The misconception occurred in step 2; the corrected calculation gives the verified answer.`,
        rationale: `Develops metacognitive evaluation and deep conceptual rigor.`
      }
    ];

    let misconceptions = [
      `Confusing procedural shortcuts with underlying conceptual meaning.`,
      `Overlooking unit labels, contextual constraints, or precise textual qualifiers.`,
      `Skipping intermediate scratchwork and self-checking verification steps.`
    ];

    if (isMath) {
      conceptSummary = `In ${grade} Mathematics, standard ${code} requires students to model numbers, operations, and spatial/algebraic relationships with conceptual fluency and algorithmic precision.`;
      guidedModel.prompt = `Model Problem: Solve and verify the relationship representing ${code}.`;
      misconceptions = [
        `Applying algorithms mechanically without checking if the numerical magnitude is reasonable.`,
        `Misaligning place values, fractional denominators, or operational signs.`,
        `Failing to use inverse operations to check the final answer.`
      ];
    } else if (isELA) {
      conceptSummary = `In ${grade} Language Arts, standard ${code} emphasizes extracting direct textual evidence, identifying central themes, and analyzing author purpose and craft.`;
      guidedModel.prompt = `Model Problem: Cite two pieces of evidence from the text to prove the central claim.`;
      misconceptions = [
        `Offering personal opinions rather than directly citing textual proof.`,
        `Confusing the topic (subject) with the author's deeper theme / central idea.`,
        `Ignoring contextual clues when decoding domain-specific vocabulary.`
      ];
    } else if (isSci) {
      conceptSummary = `In ${grade} Science (NGSS), standard ${code} focuses on empirical observation, scientific modeling, hypothesis testing, and Claim-Evidence-Reasoning (CER) synthesis.`;
      guidedModel.prompt = `Model Problem: Construct a scientific claim supported by empirical data from the investigation table.`;
      misconceptions = [
        `Stating a hypothesis as an established fact without experimental evidence.`,
        `Confusing correlation with direct cause-and-effect mechanisms.`,
        `Misreading independent vs. dependent variables in graphical data.`
      ];
    } else if (isSoc) {
      conceptSummary = `In ${grade} Social Studies (C3), standard ${code} develops historical thinking, primary source analysis, geographical spatial awareness, and civic participation.`;
      guidedModel.prompt = `Model Problem: Analyze the primary source document and determine the historical perspective of the author.`;
      misconceptions = [
        `Judging historical events solely through modern assumptions without considering historical context.`,
        `Confusing primary firsthand accounts with secondary retrospective summaries.`,
        `Overlooking geographic or economic factors influencing historical decisions.`
      ];
    }

    return { grade, subject, code, title, conceptSummary, guidedModel, problems, misconceptions };
  }

  // --- PRINT WORKSHEET HELPER ---
  window.printWorksheet = function(target) {
    const studentPage = document.getElementById('worksheet-page-student');
    const teacherPage = document.getElementById('worksheet-page-teacher');

    if (target === 'student') {
      if (teacherPage) teacherPage.style.display = 'none';
      if (studentPage) studentPage.style.display = 'block';
    } else if (target === 'teacher') {
      if (studentPage) studentPage.style.display = 'none';
      if (teacherPage) teacherPage.style.display = 'block';
    } else {
      if (studentPage) studentPage.style.display = 'block';
      if (teacherPage) teacherPage.style.display = 'block';
    }

    window.print();

    // Restore displays
    setTimeout(() => {
      if (studentPage) studentPage.style.display = 'block';
      if (teacherPage) teacherPage.style.display = 'block';
    }, 1000);
  };

  function buildLessonPlanDetails(grade, subject, code, text, duration, model) {
    let objective = `Students will be able to demonstrate mastery of ${code} by analyzing core principles, constructing mathematical/conceptual representations, and completing formative exit items with 80%+ accuracy.`;
    let essentialQuestion = `How do fundamental patterns in ${subject} enable us to describe, predict, and solve authentic problems?`;
    let materials = `Student notebooks, highlighters, digital curriculum runner (/levels/), and interactive manipulatives / graphic organizers.`;
    let vocab = [
      { term: 'Concept Formulation', def: 'The systematic organization of observations into a unified academic rule.' },
      { term: 'Representation', def: 'A visual, symbolic, or concrete model of a concept.' },
      { term: 'Verification', def: 'Checking reasoning using inverse operations or empirical proof.' },
      { term: 'Mastery Benchmark', def: 'The standard criterion indicating independent competency.' }
    ];
    let directInstruction = `Teacher opens with a 3-minute anchor hook connecting to prior learning. The educator explicitly models the targeted standard using the ${model} framework. The teacher thinks aloud while solving an anchor problem, highlighting common misconceptions, correct terminology, and organizational steps.`;
    let guidedPractice = `Students pair with elbow partners to solve two scaffolded exploration problems. The educator conducts active room circulation, posing probing questions and providing immediate feedback. Groups display their solution strategies on miniature whiteboards for whole-group consensus.`;
    let independentPractice = `Learners complete an individual 3-task application assignment to solidify mastery. Students then complete the 5-question formative diagnostic exit ticket below to evaluate retention and inform subsequent pacing adjustments.`;

    // 5 standard-aligned quiz questions
    let quiz = [
      {
        prompt: `Which of the following best demonstrates the core principle of ${code}?`,
        choices: [
          `Recognizing and applying the fundamental standard definition accurately`,
          `Skipping intermediate steps and relying on arbitrary estimation`,
          `Ignoring variable constraints and relationship definitions`,
          `Memorizing disconnected facts without conceptual proof`
        ],
        answer: `A`,
        rationale: `Option A correctly reflects rigorous standard competency and structured understanding.`
      },
      {
        prompt: `When applying ${code} to an unfamiliar context, what is the most reliable first step?`,
        choices: [
          `Deconstruct the prompt to identify given information, constraints, and the target goal`,
          `Select the first number presented and multiply by ten`,
          `Assume the answer is always between zero and one`,
          `Guess without re-reading the prompt requirements`
        ],
        answer: `A`,
        rationale: `Systematic problem decomposition ensures all standard parameters are addressed.`
      },
      {
        prompt: `A student solves a problem aligned with ${code} but gets an unreasonable result. What should they do next?`,
        choices: [
          `Use inverse operations or a visual model to trace and verify their calculation steps`,
          `Erase their scratchwork and copy a neighbor's answer`,
          `Assume the problem is flawed and move on`,
          `Increase the answer by five until it matches a choice`
        ],
        answer: `A`,
        rationale: `Self-monitoring and mathematical/scientific verification are core pedagogical practices.`
      },
      {
        prompt: `Which representation provides the strongest evidence of deep conceptual mastery for ${code}?`,
        choices: [
          `An accurate dual representation combining symbolic equations with concrete or pictorial models`,
          `A handwritten note with no explanation or mathematical structure`,
          `A repetitive list of non-standard abbreviations`,
          `A vague verbal summary lacking technical terminology`
        ],
        answer: `A`,
        rationale: `Dual concrete and symbolic representations verify deep procedural and conceptual fluency.`
      },
      {
        prompt: `How does mastering ${code} prepare learners for upcoming advanced coursework in ${subject}?`,
        choices: [
          `It serves as an essential foundational scaffold for complex higher-grade standards`,
          `It is completely isolated from all other academic domains`,
          `It removes the need to practice future skills`,
          `It only applies to multiple-choice exams`
        ],
        answer: `A`,
        rationale: `Standards within Hesten's Learning follow an interconnected, procedural spiral hierarchy.`
      }
    ];

    return { objective, essentialQuestion, materials, vocab, directInstruction, guidedPractice, independentPractice, quiz };
  }


  // --- TAB 5: CLASS ROSTER & PROGRESS TRACKER ENGINE ---
  const STORAGE_KEY_ROSTER = 'hesten_teacher_roster';
  const DEFAULT_ROSTER = [
    {
      id: 's1',
      name: 'Maya Chen',
      grade: 'Grade 5',
      math: 92,
      ela: 88,
      science: 95,
      social: 90,
      lastCheck: 'Today',
      standards: { '5.OA.A.1': 95, '5.NBT.A.1': 92, '5.NF.A.1': 90, '5.MD.C.5': 88, 'RL.5.1': 90, 'RI.5.2': 86 },
      accommodations: ['Visual Anchor Charts', 'Enrichment Challenges'],
      notes: 'Demonstrates exceptional mathematical modeling and deep conceptual understanding.'
    },
    {
      id: 's2',
      name: 'Leo Martinez',
      grade: 'Grade 5',
      math: 78,
      ela: 82,
      science: 80,
      social: 75,
      lastCheck: 'Yesterday',
      standards: { '5.OA.A.1': 82, '5.NF.A.1': 68, '5.NBT.B.5': 74, 'RL.5.1': 85 },
      accommodations: ['Chunked Assignments', 'Calculator for Complex Division'],
      notes: 'Benefits from visual fractions models during multi-step fractions practice.'
    },
    {
      id: 's3',
      name: 'Samira Patel',
      grade: 'Grade 5',
      math: 96,
      ela: 94,
      science: 92,
      social: 95,
      lastCheck: 'Today',
      standards: { '5.OA.A.2': 98, '5.NF.B.4': 95, 'RL.5.2': 94, '5-PS1-1': 92 },
      accommodations: ['Self-Paced Inquiry', 'Peer Mentoring Opportunities'],
      notes: 'Top performer across STEM disciplines, ready for middle school pre-algebra enrichment.'
    },
    {
      id: 's4',
      name: 'Jordan Taylor',
      grade: 'Grade 5',
      math: 64,
      ela: 70,
      science: 68,
      social: 72,
      lastCheck: '2 days ago',
      standards: { '5.NBT.B.6': 60, '5.NF.B.3': 65, '5.MD.C.5': 58, 'RL.5.3': 72 },
      accommodations: ['Extended Time (1.5x)', 'Read Aloud / Text-to-Speech', 'Reduced Distraction Seating'],
      notes: 'Requires concrete manipulatives when working with multi-digit division and volume calculation.'
    },
    {
      id: 's5',
      name: 'Alex Rivera',
      grade: 'Grade 5',
      math: 88,
      ela: 85,
      science: 86,
      social: 89,
      lastCheck: 'Today',
      standards: { '5.OA.A.1': 88, '5.NBT.A.3': 90, 'RL.5.4': 85, '5-ESS2-1': 86 },
      accommodations: ['Graphic Organizers', 'Frequent Check-ins'],
      notes: 'Consistent engagement and strong peer collaboration skills.'
    }
  ];

  function getRoster() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY_ROSTER);
      if (raw) {
        const parsed = JSON.parse(raw);
        if (Array.isArray(parsed) && parsed.length > 0) return parsed;
      }
    } catch (e) {}
    return DEFAULT_ROSTER;
  }

  function saveRoster(roster) {
    try {
      localStorage.setItem(STORAGE_KEY_ROSTER, JSON.stringify(roster));
      window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
    } catch (e) {}
  }

  // --- REPORT CARD JSON NORMALIZER ---
  function normalizeReportCard(raw, filename) {
    let data = raw;
    if (typeof data === 'string') {
      try {
        data = JSON.parse(data);
      } catch (e) {
        throw new Error('Invalid JSON format: ' + e.message);
      }
    }

    // Format B: Platform Portfolio Export ({ meta, data: { ... } })
    if (data && data.data && typeof data.data === 'object') {
      const d = data.data;
      const meta = data.meta || {};

      let profile = {};
      if (typeof d['hesten-user-profile'] === 'string') {
        try { profile = JSON.parse(d['hesten-user-profile']); } catch (e) {}
      } else if (d['hesten-user-profile'] && typeof d['hesten-user-profile'] === 'object') {
        profile = d['hesten-user-profile'];
      }

      const name = profile.displayName || profile.name || meta.student || (filename ? filename.replace(/\.[^/.]+$/, '').replace(/[-_]/g, ' ') : 'Student');
      let grade = profile.grade || profile.gradeLevel || 'Grade 5';
      if (/^\d+$/.test(grade)) grade = `Grade ${grade}`;

      const parseScore = (key, fallback = 75) => {
        let val = d[key];
        if (val === undefined) {
          const suffix = key.replace('hesten_student_mastery_', '');
          val = d[suffix];
        }
        if (val === undefined) return fallback;
        const num = parseInt(val, 10);
        return isNaN(num) ? fallback : Math.max(0, Math.min(100, num));
      };

      const math = parseScore('hesten_student_mastery_math', 75);
      const ela = parseScore('hesten_student_mastery_ela', 75);
      const science = parseScore('hesten_student_mastery_science', 75);
      const social = parseScore('hesten_student_mastery_social', 75);

      let standards = {};
      if (d['hesten_diagnostic_standards']) {
        try {
          standards = typeof d['hesten_diagnostic_standards'] === 'string' ? JSON.parse(d['hesten_diagnostic_standards']) : d['hesten_diagnostic_standards'];
        } catch (e) {}
      }

      let accommodations = [];
      if (d['hesten_parent_accommodations']) {
        try {
          accommodations = typeof d['hesten_parent_accommodations'] === 'string' ? JSON.parse(d['hesten_parent_accommodations']) : d['hesten_parent_accommodations'];
        } catch (e) {}
      }

      return {
        name,
        grade,
        date: meta.exportedAt ? new Date(meta.exportedAt).toLocaleDateString() : 'Today',
        math,
        ela,
        science,
        social,
        standards: standards && typeof standards === 'object' ? standards : {},
        accommodations: Array.isArray(accommodations) ? accommodations : [],
        notes: profile.notes || 'Imported from platform backup export archive.'
      };
    }

    // Format A: Direct Student Report Card JSON
    const name = data.student || data.studentName || data.name || (filename ? filename.replace(/\.[^/.]+$/, '').replace(/[-_]/g, ' ') : 'Student');
    let grade = data.grade || data.gradeLevel || 'Grade 5';
    if (typeof grade === 'number' || (typeof grade === 'string' && /^\d+$/.test(grade))) {
      grade = `Grade ${grade}`;
    }

    let math = 75, ela = 75, science = 75, social = 75;
    if (data.mastery && typeof data.mastery === 'object') {
      math = Number(data.mastery.math !== undefined ? data.mastery.math : math);
      ela = Number(data.mastery.ela !== undefined ? data.mastery.ela : (data.mastery.reading !== undefined ? data.mastery.reading : ela));
      science = Number(data.mastery.science !== undefined ? data.mastery.science : science);
      social = Number(data.mastery.social !== undefined ? data.mastery.social : (data.mastery.socialStudies !== undefined ? data.mastery.socialStudies : social));
    } else if (data.scores && typeof data.scores === 'object') {
      math = Number(data.scores.math !== undefined ? data.scores.math : math);
      ela = Number(data.scores.ela !== undefined ? data.scores.ela : (data.scores.reading !== undefined ? data.scores.reading : ela));
      science = Number(data.scores.science !== undefined ? data.scores.science : science);
      social = Number(data.scores.social !== undefined ? data.scores.social : (data.scores.socialStudies !== undefined ? data.scores.socialStudies : social));
    } else {
      if (data.math !== undefined) math = Number(data.math);
      if (data.ela !== undefined) ela = Number(data.ela);
      if (data.science !== undefined) science = Number(data.science);
      if (data.social !== undefined || data.socialStudies !== undefined) social = Number(data.social !== undefined ? data.social : data.socialStudies);
    }

    math = Math.max(0, Math.min(100, Math.round(math || 75)));
    ela = Math.max(0, Math.min(100, Math.round(ela || 75)));
    science = Math.max(0, Math.min(100, Math.round(science || 75)));
    social = Math.max(0, Math.min(100, Math.round(social || 75)));

    const standards = data.standards && typeof data.standards === 'object' ? data.standards : {};
    const accommodations = Array.isArray(data.accommodations) ? data.accommodations : [];
    const notes = data.notes || data.comments || 'Uploaded student report card diagnostic data.';
    const date = data.date || data.evaluationDate || 'Today';

    return {
      name,
      grade,
      date,
      math,
      ela,
      science,
      social,
      standards,
      accommodations,
      notes
    };
  }

  let currentDossierStudent = null;

  function openStudentDossier(student) {
    if (!student) return;
    currentDossierStudent = student;
    const modal = document.getElementById('modal-student-dossier');
    if (!modal) return;

    // Fallback standards generation if missing or empty
    let standards = student.standards;
    if (!standards || typeof standards !== 'object' || Object.keys(standards).length === 0) {
      const gNum = (student.grade || '5').replace(/\D+/g, '') || '5';
      standards = {
        [`${gNum}.OA.A.1`]: student.math || 82,
        [`${gNum}.NF.A.1`]: Math.max(45, (student.math || 82) - 14),
        [`RL.${gNum}.1`]: student.ela || 85,
        [`RI.${gNum}.2`]: Math.max(50, (student.ela || 85) - 10),
        [`${gNum}-PS1-1`]: student.science || 86
      };
      student.standards = standards;
    }

    // Fallback accommodations if missing or empty
    let accoms = student.accommodations;
    if (!accoms || !Array.isArray(accoms) || accoms.length === 0) {
      if ((student.math || 75) < 70 || (student.ela || 75) < 70) {
        accoms = ['Visual Anchor Charts', 'Targeted Small Group Intervention'];
      } else {
        accoms = ['Standard General Education Setting'];
      }
    }

    // Header Details
    const avatarEl = document.getElementById('dossier-avatar');
    const nameEl = document.getElementById('dossier-student-name');
    const gradeEl = document.getElementById('dossier-grade-badge');
    const dateEl = document.getElementById('dossier-date-badge');
    const sourceEl = document.getElementById('dossier-source-badge');

    if (avatarEl) {
      const initial = (student.name && student.name.charAt(0)) ? student.name.charAt(0).toUpperCase() : 'S';
      avatarEl.innerHTML = `<span style="font-size:1.6rem; font-weight:800; color:#ffffff;">${escapeHtml(initial)}</span>`;
    }
    if (nameEl) nameEl.textContent = student.name || 'Student';
    if (gradeEl) gradeEl.textContent = student.grade || 'Grade 5';
    if (dateEl) dateEl.innerHTML = `<i class="fas fa-calendar-alt"></i> Evaluated: ${escapeHtml(student.date || student.lastCheck || 'Today')}`;
    if (sourceEl) {
      sourceEl.innerHTML = `<i class="fas fa-file-code"></i> ${student.standards && Object.keys(student.standards).length > 0 ? 'Diagnostic Report Card' : 'Classroom Roster'}`;
    }

    // Overall Average Score & Standing Chip
    const mathScore = student.math !== undefined ? student.math : 75;
    const elaScore = student.ela !== undefined ? student.ela : 75;
    const sciScore = student.science !== undefined ? student.science : 75;
    const socScore = student.social !== undefined ? student.social : 75;
    const avg = Math.round((mathScore + elaScore + sciScore + socScore) / 4);

    const scoreNumEl = document.getElementById('dossier-score-num');
    const scoreStatusEl = document.getElementById('dossier-score-status');
    const scoreChip = document.getElementById('dossier-score-chip');

    if (scoreNumEl) scoreNumEl.textContent = `${avg}%`;
    if (scoreStatusEl) {
      scoreStatusEl.textContent = avg >= 85 ? 'Honors Proficient' : avg >= 70 ? 'On Track' : 'Targeted Support';
    }
    if (scoreChip) {
      scoreChip.style.background = avg >= 85 ? 'rgba(16, 185, 129, 0.1)' : avg >= 70 ? 'rgba(99, 102, 241, 0.1)' : 'rgba(225, 29, 72, 0.1)';
      scoreChip.style.borderColor = avg >= 85 ? 'rgba(16, 185, 129, 0.25)' : avg >= 70 ? 'rgba(99, 102, 241, 0.25)' : 'rgba(225, 29, 72, 0.25)';
    }

    // Subject Progress Meters
    const updateMeter = (pctId, fillId, val) => {
      const pEl = document.getElementById(pctId);
      const fEl = document.getElementById(fillId);
      if (pEl) pEl.textContent = `${val}%`;
      if (fEl) fEl.style.width = `${val}%`;
    };
    updateMeter('dossier-math-pct', 'dossier-math-fill', mathScore);
    updateMeter('dossier-ela-pct', 'dossier-ela-fill', elaScore);
    updateMeter('dossier-science-pct', 'dossier-science-fill', sciScore);
    updateMeter('dossier-social-pct', 'dossier-social-fill', socScore);

    // Standards Breakdown: Mastered (>=80%) vs Intervention (<70%)
    const masteredWrap = document.getElementById('dossier-mastered-standards');
    const weakWrap = document.getElementById('dossier-weak-standards');
    const stdKeys = Object.keys(standards);

    if (masteredWrap) {
      masteredWrap.innerHTML = '';
      const mastered = stdKeys.filter(k => (Number(standards[k]) || 0) >= 80);
      if (mastered.length > 0) {
        mastered.forEach(code => {
          const val = standards[code];
          masteredWrap.innerHTML += `<span class="dossier-tag mastered"><i class="fas fa-check"></i> ${escapeHtml(code)} (${val}%)</span>`;
        });
      } else {
        masteredWrap.innerHTML = `<span class="text-xs text-slate-400 italic">No evaluated standards at ≥80% yet.</span>`;
      }
    }

    if (weakWrap) {
      weakWrap.innerHTML = '';
      const weak = stdKeys.filter(k => (Number(standards[k]) || 0) < 70);
      if (weak.length > 0) {
        weak.forEach(code => {
          const val = standards[code];
          weakWrap.innerHTML += `<span class="dossier-tag intervention"><i class="fas fa-exclamation-circle"></i> ${escapeHtml(code)} (${val}%)</span>`;
        });
      } else {
        weakWrap.innerHTML = `<span class="text-xs text-emerald-600 font-medium"><i class="fas fa-check-double"></i> All evaluated standards performing at or above 70%.</span>`;
      }
    }

    // Accommodations
    const accomWrap = document.getElementById('dossier-accommodations-list');
    if (accomWrap) {
      accomWrap.innerHTML = '';
      if (accoms.length > 0) {
        accoms.forEach(acc => {
          accomWrap.innerHTML += `<span class="dossier-tag accommodation"><i class="fas fa-universal-access"></i> ${escapeHtml(acc)}</span>`;
        });
      } else {
        accomWrap.innerHTML = `<span class="text-xs text-slate-400 italic">Standard general education setting.</span>`;
      }
    }

    // Notes
    const notesTextarea = document.getElementById('dossier-teacher-notes');
    if (notesTextarea) {
      notesTextarea.value = student.notes || '';
    }

    // Explicitly set style display AND class active
    modal.style.display = 'flex';
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeDossierModal() {
    const modal = document.getElementById('modal-student-dossier');
    if (modal) {
      modal.classList.remove('active');
      modal.style.display = 'none';
    }
    document.body.style.overflow = '';
  }

  function printStudentDossier() {
    document.body.classList.add('printing-dossier');
    window.print();
    setTimeout(() => {
      document.body.classList.remove('printing-dossier');
    }, 1000);
  }

  function initClassRosterTracker() {
    const tableBody = document.getElementById('roster-table-body');
    const addBtn = document.getElementById('btn-add-roster-student');
    const resetBtn = document.getElementById('btn-reset-roster');
    const exportCsvBtn = document.getElementById('btn-export-roster-csv');
    const uploadBtn = document.getElementById('btn-upload-report-card');
    const fileInput = document.getElementById('roster-report-card-file');

    if (!tableBody) return;

    function renderRoster() {
      const roster = getRoster();
      const totalCount = roster.length;
      let totalSum = 0;
      let honorsCount = 0;
      let supportCount = 0;

      tableBody.innerHTML = '';

      roster.forEach(st => {
        const avg = Math.round((st.math + st.ela + st.science + st.social) / 4);
        totalSum += avg;
        if (avg >= 85) honorsCount++;
        if (avg < 70) supportCount++;

        const statusBadge = avg >= 85
          ? `<span class="roster-status-pill status-honors"><i class="fas fa-award"></i> Honors Proficient</span>`
          : avg >= 70
          ? `<span class="roster-status-pill status-on-track"><i class="fas fa-check-circle"></i> On Track</span>`
          : `<span class="roster-status-pill status-support"><i class="fas fa-exclamation-triangle"></i> Targeted Support</span>`;

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>
            <div class="roster-student-cell interactive-cell" onclick="window.viewStudentDossier('${st.id}')" role="button" tabindex="0" title="Click to view ${escapeHtml(st.name)}'s Diagnostic Dossier">
              <span class="roster-avatar-init">${escapeHtml(st.name.charAt(0))}</span>
              <div>
                <span class="roster-student-name">${escapeHtml(st.name)}</span>
                <span class="roster-last-check">Checked: ${escapeHtml(st.lastCheck)}</span>
              </div>
            </div>
          </td>
          <td><span class="roster-grade-badge">${escapeHtml(st.grade)}</span></td>
          <td>
            <div class="roster-prog-group">
              <span>${st.math}%</span>
              <div class="roster-mini-bar"><div class="roster-mini-fill" style="width:${st.math}%;"></div></div>
            </div>
          </td>
          <td>
            <div class="roster-prog-group">
              <span>${st.ela}%</span>
              <div class="roster-mini-bar"><div class="roster-mini-fill" style="width:${st.ela}%;"></div></div>
            </div>
          </td>
          <td>
            <div class="roster-prog-group">
              <span>${st.science}%</span>
              <div class="roster-mini-bar"><div class="roster-mini-fill" style="width:${st.science}%;"></div></div>
            </div>
          </td>
          <td>
            <strong style="font-size: 1.05rem; color: ${avg >= 85 ? '#10b981' : avg >= 70 ? '#6366f1' : '#e11d48'};">
              ${avg}%
            </strong>
          </td>
          <td>
            <div onclick="window.viewStudentDossier('${st.id}')" style="cursor: pointer;" title="Click to view Diagnostic Dossier">
              ${statusBadge}
            </div>
          </td>
          <td class="no-print">
            <div class="roster-row-actions">
              <button type="button" class="roster-action-icon-btn dossier-btn" onclick="window.viewStudentDossier('${st.id}')" title="View Diagnostic Dossier & Report Card">
                <i class="fas fa-id-card"></i> Dossier
              </button>
              <button type="button" class="roster-action-icon-btn check-btn" onclick="window.incrementStudentMastery('${st.id}')" title="Log Assessment Check (+5% Mastery)">
                <i class="fas fa-plus"></i> 5%
              </button>
              <button type="button" class="roster-action-icon-btn delete-btn" onclick="window.removeStudentFromRoster('${st.id}')" title="Remove Student">
                <i class="fas fa-trash-alt"></i>
              </button>
            </div>
          </td>
        `;
        tableBody.appendChild(tr);
      });

      // Update Summary metrics
      const classAvg = totalCount > 0 ? Math.round(totalSum / totalCount) : 0;
      const totalEl = document.getElementById('roster-stat-total');
      const avgEl = document.getElementById('roster-stat-avg');
      const honorsEl = document.getElementById('roster-stat-honors');
      const supportEl = document.getElementById('roster-stat-support');

      if (totalEl) totalEl.textContent = totalCount;
      if (avgEl) avgEl.textContent = `${classAvg}%`;
      if (honorsEl) honorsEl.textContent = honorsCount;
      if (supportEl) supportEl.textContent = supportCount;
    }

    // Process Report Card File Upload
    function processStudentReportCard(rawJson, filename) {
      const studentData = normalizeReportCard(rawJson, filename);
      let roster = getRoster();

      const existingIndex = roster.findIndex(s => s.name.toLowerCase() === studentData.name.toLowerCase());
      let studentObj;

      if (existingIndex >= 0) {
        studentObj = {
          ...roster[existingIndex],
          grade: studentData.grade,
          math: studentData.math,
          ela: studentData.ela,
          science: studentData.science,
          social: studentData.social,
          standards: studentData.standards,
          accommodations: studentData.accommodations,
          notes: studentData.notes,
          lastCheck: 'Just uploaded'
        };
        roster[existingIndex] = studentObj;
      } else {
        studentObj = {
          id: 's_' + Date.now(),
          name: studentData.name,
          grade: studentData.grade,
          math: studentData.math,
          ela: studentData.ela,
          science: studentData.science,
          social: studentData.social,
          standards: studentData.standards,
          accommodations: studentData.accommodations,
          notes: studentData.notes,
          lastCheck: 'Just uploaded'
        };
        roster.push(studentObj);
      }

      saveRoster(roster);
      renderRoster();
      showToast(`Imported report card for ${studentObj.name}!`);

      // Immediately display Diagnostic Dossier popup
      openStudentDossier(studentObj);
    }

    // Wire Report Card Upload Toolbar Button
    if (uploadBtn && fileInput) {
      uploadBtn.addEventListener('click', () => {
        fileInput.value = '';
        fileInput.click();
      });

      fileInput.addEventListener('change', (e) => {
        const file = e.target.files && e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (evt) => {
          try {
            processStudentReportCard(evt.target.result, file.name);
          } catch (err) {
            alert('Failed to parse report card JSON: ' + err.message);
          }
        };
        reader.onerror = () => {
          alert('Could not read the uploaded report card file.');
        };
        reader.readAsText(file);
      });
    }

    // Modal Action: Generate Remediation Lesson
    const genLessonBtn = document.getElementById('btn-dossier-gen-lesson');
    if (genLessonBtn) {
      genLessonBtn.addEventListener('click', () => {
        if (!currentDossierStudent) return;

        // Discover weakest standard or priority intervention standard (<70%)
        let targetStd = null;
        let lowestVal = 999;
        const standards = currentDossierStudent.standards || {};
        for (const [code, val] of Object.entries(standards)) {
          const num = Number(val) || 0;
          if (num < lowestVal) {
            lowestVal = num;
            targetStd = code;
          }
        }

        // Determine grade key for lesson customizer
        let gradeKey = '5';
        const rawGrade = (currentDossierStudent.grade || '').toLowerCase();
        if (rawGrade.includes('pre-k') || rawGrade.includes('prek')) gradeKey = 'pre-k';
        else if (rawGrade.includes('kindergarten') || rawGrade === 'k' || rawGrade.startsWith('k.')) gradeKey = 'k';
        else if (rawGrade.includes('high') || rawGrade.includes('hs')) gradeKey = 'hs';
        else {
          const m = rawGrade.match(/\d+/);
          if (m) gradeKey = m[0];
        }

        // Determine subject
        let subj = 'Math';
        if (targetStd) {
          const upper = targetStd.toUpperCase();
          if (upper.startsWith('RL') || upper.startsWith('RI') || upper.startsWith('RF') || upper.startsWith('W.') || upper.startsWith('L.') || upper.includes('ELA')) {
            subj = 'Language Arts';
          } else if (upper.includes('PS') || upper.includes('LS') || upper.includes('ESS') || upper.includes('SCI')) {
            subj = 'Science';
          } else if (upper.includes('SS') || upper.includes('SOC') || upper.includes('HIST')) {
            subj = 'Social Studies';
          } else {
            subj = 'Math';
          }
        } else {
          // If no specific standards, pick student's lowest subject
          const scores = [
            { subj: 'Math', val: currentDossierStudent.math || 0 },
            { subj: 'Language Arts', val: currentDossierStudent.ela || 0 },
            { subj: 'Science', val: currentDossierStudent.science || 0 },
            { subj: 'Social Studies', val: currentDossierStudent.social || 0 }
          ];
          scores.sort((a, b) => a.val - b.val);
          subj = scores[0].subj;

          const list = (STANDARDS_REGISTRY[gradeKey] && STANDARDS_REGISTRY[gradeKey][subj]) || [];
          if (list.length > 0) {
            targetStd = list[0].code;
          } else {
            targetStd = `${gradeKey}.CORE.1`;
          }
        }

        // Close modal and navigate to Tab 3 (tab-lesson-plan)
        closeDossierModal();
        switchTab('tab-lesson-plan');

        const gradeSelect = document.getElementById('lp-grade-select');
        const subjectSelect = document.getElementById('lp-subject-select');
        const standardSelect = document.getElementById('lp-standard-select');
        const generateBtn = document.getElementById('btn-generate-lesson-plan');

        if (gradeSelect) gradeSelect.value = gradeKey;
        if (subjectSelect) {
          subjectSelect.value = subj;
          subjectSelect.dispatchEvent(new Event('change'));
        }

        if (standardSelect && targetStd) {
          let found = false;
          for (let i = 0; i < standardSelect.options.length; i++) {
            if (standardSelect.options[i].value === targetStd || standardSelect.options[i].value.includes(targetStd)) {
              standardSelect.selectedIndex = i;
              found = true;
              break;
            }
          }
          if (!found) {
            const opt = document.createElement('option');
            opt.value = targetStd;
            opt.textContent = `${targetStd} - Targeted Priority Remediation`;
            standardSelect.prepend(opt);
            standardSelect.selectedIndex = 0;
          }
        }

        // Trigger lesson plan generation
        if (generateBtn) {
          setTimeout(() => {
            generateBtn.click();
            const sheet = document.getElementById('lesson-plan-sheet') || document.getElementById('lp-output-container');
            if (sheet) {
              sheet.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
          }, 150);
        }

        showToast(`Generated targeted remediation plan for ${currentDossierStudent.name}!`);
      });
    }

    // Modal Action: Launch Diagnostic Quiz
    const launchQuizBtn = document.getElementById('btn-dossier-launch-quiz');
    if (launchQuizBtn) {
      launchQuizBtn.addEventListener('click', () => {
        if (!currentDossierStudent) return;
        let targetStd = '';
        let lowestVal = 999;
        const standards = currentDossierStudent.standards || {};
        for (const [code, val] of Object.entries(standards)) {
          const num = Number(val) || 0;
          if (num < lowestVal) {
            lowestVal = num;
            targetStd = code;
          }
        }

        const targetUrl = targetStd
          ? `/assessment/index.php?standard=${encodeURIComponent(targetStd)}&student=${encodeURIComponent(currentDossierStudent.name)}`
          : `/assessment/index.php?student=${encodeURIComponent(currentDossierStudent.name)}`;

        window.open(targetUrl, '_blank');
        showToast(`Launched diagnostic checkpoint for ${currentDossierStudent.name}!`);
      });
    }

    // Modal Action: Save & Sync to Roster
    const saveRosterBtn = document.getElementById('btn-dossier-save-roster');
    if (saveRosterBtn) {
      saveRosterBtn.addEventListener('click', () => {
        if (!currentDossierStudent) return;
        const notesEl = document.getElementById('dossier-teacher-notes');
        const newNotes = notesEl ? notesEl.value.trim() : '';
        currentDossierStudent.notes = newNotes;
        currentDossierStudent.lastCheck = 'Just now';

        const roster = getRoster();
        const idx = roster.findIndex(s => s.id === currentDossierStudent.id || s.name.toLowerCase() === currentDossierStudent.name.toLowerCase());
        if (idx >= 0) {
          roster[idx] = { ...roster[idx], ...currentDossierStudent };
        } else {
          roster.push(currentDossierStudent);
        }
        saveRoster(roster);
        renderRoster();
        showToast(`Saved notes & synchronized ${currentDossierStudent.name} to roster!`);
      });
    }

    // Close Modal on Background Click
    const modal = document.getElementById('modal-student-dossier');
    if (modal) {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          closeDossierModal();
        }
      });
    }

    // Close Modal on Escape Key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        closeDossierModal();
      }
    });

    // Add Student Manually
    if (addBtn) {
      addBtn.addEventListener('click', () => {
        const nameInput = document.getElementById('roster-new-name');
        const gradeInput = document.getElementById('roster-new-grade');
        if (!nameInput || !nameInput.value.trim()) {
          alert('Please enter a student name.');
          return;
        }

        const roster = getRoster();
        const newStudent = {
          id: 's_' + Date.now(),
          name: nameInput.value.trim(),
          grade: gradeInput ? gradeInput.value : 'Grade 5',
          math: 75,
          ela: 75,
          science: 75,
          social: 75,
          standards: {},
          accommodations: [],
          notes: 'Manually enrolled student.',
          lastCheck: 'Just now'
        };

        roster.push(newStudent);
        saveRoster(roster);
        nameInput.value = '';
        renderRoster();
        showToast(`Enrolled student ${newStudent.name}!`);
      });
    }

    // Reset Demo Class
    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        if (confirm('Reset class roster to default 5-student sample cohort?')) {
          saveRoster(DEFAULT_ROSTER);
          renderRoster();
          showToast('Reset class roster to demo cohort.');
        }
      });
    }

    // Differentiated Intervention Clusters Generator
    function renderInterventionClusters() {
      const container = document.getElementById('intervention-clusters-container');
      if (!container) return;

      const roster = getRoster();
      const clusterMap = {}; // key: standardCode or subjectKey -> { title, subject, grade, students: [] }

      roster.forEach(st => {
        let hasWeakStandard = false;
        const stStandards = st.standards || {};
        for (const [code, val] of Object.entries(stStandards)) {
          const score = Number(val) || 0;
          if (score < 70) {
            hasWeakStandard = true;
            if (!clusterMap[code]) {
              let subj = 'Math';
              const upper = code.toUpperCase();
              if (upper.startsWith('RL') || upper.startsWith('RI') || upper.startsWith('RF') || upper.startsWith('W.') || upper.startsWith('L.') || upper.includes('ELA')) {
                subj = 'Language Arts';
              } else if (upper.includes('PS') || upper.includes('LS') || upper.includes('ESS') || upper.includes('SCI')) {
                subj = 'Science';
              } else if (upper.includes('SS') || upper.includes('SOC') || upper.includes('HIST')) {
                subj = 'Social Studies';
              }

              let gKey = '5';
              const rawG = (st.grade || '').toLowerCase();
              if (rawG.includes('pre-k') || rawG.includes('prek')) gKey = 'pre-k';
              else if (rawG.includes('k') || rawG.includes('kindergarten')) gKey = 'k';
              else if (rawG.includes('hs') || rawG.includes('high')) gKey = 'hs';
              else {
                const m = rawG.match(/\d+/);
                if (m) gKey = m[0];
              }

              clusterMap[code] = {
                title: `Standard ${code}`,
                standardCode: code,
                subject: subj,
                grade: gKey,
                gradeLabel: st.grade || 'Grade 5',
                students: []
              };
            }
            clusterMap[code].students.push({ student: st, score: score });
          }
        }

        // If no explicit standard was logged, check overall subject scores < 70
        if (!hasWeakStandard) {
          const subjects = [
            { name: 'Math', score: st.math },
            { name: 'Language Arts', score: st.ela },
            { name: 'Science', score: st.science },
            { name: 'Social Studies', score: st.social }
          ];
          subjects.forEach(sub => {
            if (sub.score < 70) {
              const clusterKey = `${sub.name}-Foundations`;
              if (!clusterMap[clusterKey]) {
                let gKey = '5';
                const rawG = (st.grade || '').toLowerCase();
                if (rawG.includes('pre-k') || rawG.includes('prek')) gKey = 'pre-k';
                else if (rawG.includes('k') || rawG.includes('kindergarten')) gKey = 'k';
                else if (rawG.includes('hs') || rawG.includes('high')) gKey = 'hs';
                else {
                  const m = rawG.match(/\d+/);
                  if (m) gKey = m[0];
                }

                clusterMap[clusterKey] = {
                  title: `${sub.name} Core Foundations`,
                  standardCode: `${gKey}.CORE.1`,
                  subject: sub.name,
                  grade: gKey,
                  gradeLabel: st.grade || 'Grade 5',
                  students: []
                };
              }
              clusterMap[clusterKey].students.push({ student: st, score: sub.score });
            }
          });
        }
      });

      const clusterKeys = Object.keys(clusterMap);

      if (clusterKeys.length === 0) {
        container.innerHTML = `
          <div style="background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 0.75rem; padding: 1.25rem; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 44px; height: 44px; border-radius: 50%; background: #10b981; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">
              <i class="fas fa-check-circle"></i>
            </div>
            <div>
              <h4 style="margin: 0; font-size: 1rem; color: #065f46; font-weight: 800;">All Enrolled Students Are Currently On Track (≥70% Mastery)</h4>
              <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #047857;">
                No priority intervention clusters detected. You can launch extension projects, peer mentorship pairings, or higher-level enrichment challenges!
              </p>
            </div>
          </div>
        `;
        return;
      }

      container.innerHTML = `
        <div class="intervention-header" style="margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: #831843; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas fa-layer-group text-pink-600"></i> Differentiated Intervention Clusters (${clusterKeys.length} Active Groups)
            </h3>
            <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #9d174d;">
              Students grouped automatically by shared benchmark targets requiring tier-2 small-group remediation.
            </p>
          </div>
          <button type="button" class="builder-action-btn builder-btn-secondary" onclick="document.getElementById('intervention-clusters-container').style.display='none';" style="font-size: 0.75rem; padding: 0.35rem 0.75rem;">
            <i class="fas fa-times"></i> Dismiss
          </button>
        </div>

        <div class="clusters-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1rem;">
          ${clusterKeys.map(k => {
            const group = clusterMap[k];
            return `
              <div class="cluster-card" style="background: #ffffff; border: 1px solid #fbcfe8; border-radius: 0.75rem; padding: 1.25rem; box-shadow: 0 4px 12px rgba(236,72,153,0.08); border-top: 4px solid #ec4899;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                  <div>
                    <span style="display: inline-block; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; background: #fce7f3; color: #be185d; padding: 0.2rem 0.5rem; border-radius: 0.35rem; margin-bottom: 0.35rem;">
                      ${escapeHtml(group.subject)} • ${escapeHtml(group.gradeLabel)}
                    </span>
                    <h4 style="margin: 0; font-size: 1.05rem; font-weight: 800; color: #0f172a;">${escapeHtml(group.title)}</h4>
                  </div>
                  <span style="font-size: 0.8rem; font-weight: 800; color: #e11d48; background: #ffe4e6; padding: 0.25rem 0.6rem; border-radius: 9999px;">
                    ${group.students.length} ${group.students.length === 1 ? 'Student' : 'Students'}
                  </span>
                </div>

                <div style="margin-bottom: 1rem;">
                  <strong style="font-size: 0.75rem; text-transform: uppercase; color: #64748b; letter-spacing: 0.05em;">Target Cohort:</strong>
                  <div style="display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 0.4rem;">
                    ${group.students.map(item => `
                      <span class="interactive-cell" onclick="window.viewStudentDossier('${item.student.id}')" style="display: inline-flex; align-items: center; gap: 0.35rem; font-size: 0.8rem; font-weight: 700; background: #fdf2f8; color: #9d174d; border: 1px solid #fbcfe8; padding: 0.25rem 0.5rem; border-radius: 0.35rem; cursor: pointer;" title="View ${escapeHtml(item.student.name)}'s Dossier">
                        <i class="fas fa-user-circle"></i> ${escapeHtml(item.student.name)} (${item.score}%)
                      </span>
                    `).join('')}
                  </div>
                </div>

                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                  <button type="button" class="builder-action-btn builder-btn-primary" onclick="window.planClusterLesson('${group.grade}', '${group.subject}', '${group.standardCode}')" style="font-size: 0.8rem; padding: 0.45rem 0.85rem; flex: 1; min-width: 140px;">
                    <i class="fas fa-magic"></i> Plan Lesson Plan
                  </button>
                  <button type="button" class="builder-action-btn builder-btn-secondary" onclick="window.generateClusterWorksheet('${group.grade}', '${group.subject}', '${group.standardCode}')" style="font-size: 0.8rem; padding: 0.45rem 0.85rem; flex: 1; min-width: 140px; border-color: #6366f1; color: #4f46e5;">
                    <i class="fas fa-print"></i> Printable Packet
                  </button>
                </div>
              </div>
            `;
          }).join('')}
        </div>
      `;
    }

    // Wire Intervention Clusters Button
    const clusterBtn = document.getElementById('btn-cluster-groups');
    if (clusterBtn) {
      clusterBtn.addEventListener('click', () => {
        const container = document.getElementById('intervention-clusters-container');
        if (container) {
          if (container.style.display === 'none' || !container.style.display) {
            renderInterventionClusters();
            container.style.display = 'block';
            container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          } else {
            container.style.display = 'none';
          }
        }
      });
    }

    // Export CSV
    if (exportCsvBtn) {
      exportCsvBtn.addEventListener('click', () => {
        const roster = getRoster();
        if (roster.length === 0) {
          alert('Roster is empty.');
          return;
        }

        let csv = 'Student ID,Student Name,Grade Level,Math Mastery %,ELA Mastery %,Science Mastery %,Social Studies Mastery %,Overall Competency %,Status,Last Evaluated\r\n';
        roster.forEach(s => {
          const avg = Math.round((s.math + s.ela + s.science + s.social) / 4);
          const status = avg >= 85 ? 'Honors Proficient' : avg >= 70 ? 'On Track' : 'Targeted Support';
          csv += `"${s.id}","${s.name.replace(/"/g, '""')}","${s.grade}",${s.math},${s.ela},${s.science},${s.social},${avg},"${status}","${s.lastCheck}"\r\n`;
        });

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.setAttribute('href', url);
        link.setAttribute('download', 'hesten-classroom-roster.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        showToast('Exported classroom roster to CSV!');
      });
    }

    window.incrementStudentMastery = function(studentId) {
      const roster = getRoster();
      const st = roster.find(s => s.id === studentId);
      if (st) {
        st.math = Math.min(100, st.math + 5);
        st.ela = Math.min(100, st.ela + 5);
        st.science = Math.min(100, st.science + 5);
        st.social = Math.min(100, st.social + 5);
        st.lastCheck = 'Just now';
        saveRoster(roster);
        renderRoster();
        showToast(`Updated mastery for ${st.name} (+5%)`);
      }
    };

    window.removeStudentFromRoster = function(studentId) {
      let roster = getRoster();
      const st = roster.find(s => s.id === studentId);
      if (!st) return;
      if (confirm(`Remove ${st.name} from class roster?`)) {
        roster = roster.filter(s => s.id !== studentId);
        saveRoster(roster);
        renderRoster();
        showToast(`Removed ${st.name} from roster.`);
      }
    };

    renderRoster();
    window.addEventListener('hl:roster-updated', () => {
      renderRoster();
    });
  }

  // Window helper for Cluster targeted lesson planning
  window.planClusterLesson = function(grade, subject, standardCode) {
    switchTab('tab-lesson-plan');

    const gradeSelect = document.getElementById('lp-grade-select');
    const subjectSelect = document.getElementById('lp-subject-select');
    const standardSelect = document.getElementById('lp-standard-select');
    const generateBtn = document.getElementById('btn-generate-lesson-plan');

    if (gradeSelect) gradeSelect.value = grade;
    if (subjectSelect) {
      subjectSelect.value = subject;
      subjectSelect.dispatchEvent(new Event('change'));
    }

    if (standardSelect && standardCode) {
      let found = false;
      for (let i = 0; i < standardSelect.options.length; i++) {
        if (standardSelect.options[i].value === standardCode || standardSelect.options[i].value.includes(standardCode)) {
          standardSelect.selectedIndex = i;
          found = true;
          break;
        }
      }
      if (!found) {
        const opt = document.createElement('option');
        opt.value = standardCode;
        opt.textContent = `${standardCode} - Priority Cluster Target`;
        standardSelect.prepend(opt);
        standardSelect.selectedIndex = 0;
      }
    }

    if (generateBtn) {
      setTimeout(() => {
        generateBtn.click();
        const sheet = document.getElementById('lesson-plan-sheet') || document.getElementById('lp-output-container');
        if (sheet) sheet.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 150);
    }
  };

  // Window helper for Cluster targeted worksheet generation
  window.generateClusterWorksheet = function(grade, subject, standardCode) {
    switchTab('tab-lesson-plan');

    const gradeSelect = document.getElementById('lp-grade-select');
    const subjectSelect = document.getElementById('lp-subject-select');
    const standardSelect = document.getElementById('lp-standard-select');
    const worksheetBtn = document.getElementById('btn-generate-worksheet');

    if (gradeSelect) gradeSelect.value = grade;
    if (subjectSelect) {
      subjectSelect.value = subject;
      subjectSelect.dispatchEvent(new Event('change'));
    }

    if (standardSelect && standardCode) {
      let found = false;
      for (let i = 0; i < standardSelect.options.length; i++) {
        if (standardSelect.options[i].value === standardCode || standardSelect.options[i].value.includes(standardCode)) {
          standardSelect.selectedIndex = i;
          found = true;
          break;
        }
      }
      if (!found) {
        const opt = document.createElement('option');
        opt.value = standardCode;
        opt.textContent = `${standardCode} - Priority Cluster Target`;
        standardSelect.prepend(opt);
        standardSelect.selectedIndex = 0;
      }
    }

    if (worksheetBtn) {
      setTimeout(() => {
        worksheetBtn.click();
        const sheet = document.getElementById('worksheet-packet') || document.getElementById('lp-output-container');
        if (sheet) sheet.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 150);
    }
  };

  // Selective Printable Worksheet Handler
  window.printWorksheet = function(mode) {
    const studentPage = document.getElementById('worksheet-page-student');
    const teacherPage = document.getElementById('worksheet-page-teacher');

    if (mode === 'student') {
      if (studentPage) studentPage.style.display = 'block';
      if (teacherPage) teacherPage.style.display = 'none';
      window.print();
      if (teacherPage) teacherPage.style.display = 'block';
    } else if (mode === 'teacher') {
      if (studentPage) studentPage.style.display = 'none';
      if (teacherPage) teacherPage.style.display = 'block';
      window.print();
      if (studentPage) studentPage.style.display = 'block';
    } else {
      if (studentPage) studentPage.style.display = 'block';
      if (teacherPage) teacherPage.style.display = 'block';
      window.print();
    }
  };

  // Window exports
  window.buildLessonPlanDetails = typeof buildLessonPlanDetails !== 'undefined' ? buildLessonPlanDetails : null;
  window.buildWorksheetData = buildWorksheetData;
  window.getClassRoster = getRoster;
  window.renderInterventionClusters = function() {
    const container = document.getElementById('intervention-clusters-container');
    if (container) {
      container.style.display = 'block';
    }
  };
  window.viewStudentDossier = function(studentId) {
    const roster = getRoster();
    const student = roster.find(s => String(s.id) === String(studentId)) ||
                    roster.find(s => s.name && s.name.toLowerCase() === String(studentId).toLowerCase());
    if (student) {
      openStudentDossier(student);
    } else if (roster.length > 0) {
      openStudentDossier(roster[0]);
    }
  };
  window.openStudentDossier = openStudentDossier;
  window.closeDossierModal = closeDossierModal;
  window.printStudentDossier = printStudentDossier;
  window.normalizeReportCard = normalizeReportCard;
  window.switchTeacherTab = switchTab;

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
