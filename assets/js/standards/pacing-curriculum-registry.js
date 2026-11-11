/**
 * Hesten's Learning - Universal Multi-Grade Pacing Curriculum Registry
 * Provides complete 36-Week Traditional and 48-Week Year-Round Fiscal Wave (6 Waves x 8 Wks)
 * curriculum plans across all 11 grade levels (Pre-K through High School).
 */
(function(window) {
  'use strict';

  const GRADE_METADATA = {
    'pre-k': { name: 'Pre-K', level: 'a', gradeNum: 'PK' },
    'k':     { name: 'Kindergarten', level: 'b', gradeNum: 'K' },
    '1':     { name: '1st Grade', level: 'c', gradeNum: '1' },
    '2':     { name: '2nd Grade', level: 'd', gradeNum: '2' },
    '3':     { name: '3rd Grade', level: 'e', gradeNum: '3' },
    '4':     { name: '4th Grade', level: 'f', gradeNum: '4' },
    '5':     { name: '5th Grade', level: 'g', gradeNum: '5' },
    '6':     { name: '6th Grade', level: 'h', gradeNum: '6' },
    '7':     { name: '7th Grade', level: 'i', gradeNum: '7' },
    '8':     { name: '8th Grade', level: 'j', gradeNum: '8' },
    'hs':    { name: 'High School', level: 'k', gradeNum: 'HS' }
  };

  // Detailed standards-aligned curricular profiles for all grade levels
  const GRADE_PROFILES = {
    'pre-k': {
      math: [
        { title: 'Counting 1 to 5 with Tactile Objects', std: 'PK.CC.A.1', desc: 'Reciting count sequence to 5 with physical blocks and finger plays.' },
        { title: 'One-to-One Correspondence & Counting Quantities', std: 'PK.CC.B.2', desc: 'Touching each object once and pairing with counting number words.' },
        { title: 'Comparing Groups (More, Fewer, Same)', std: 'PK.CC.C.3', desc: 'Visual comparisons of object groups without counting.' },
        { title: '2D Shape Discovery: Circles, Squares & Triangles', std: 'PK.G.A.1', desc: 'Identifying basic shapes in the classroom and sorting by attributes.' },
        { title: 'Early Addition Schema (Adding One More)', std: 'PK.OA.A.1', desc: 'Joining concrete sets using finger counting and story prompts.' },
        { title: 'Counting 6 to 10 & Number Recognition', std: 'PK.CC.A.2', desc: 'Recognizing written numerals 1-10 and matching to sets.' },
        { title: 'Pattern Recognition (AB, AABB Sequences)', std: 'PK.OA.B.2', desc: 'Copying, extending, and creating color and shape patterns.' },
        { title: 'Sorting Objects by Color, Size and Shape', std: 'PK.MD.A.1', desc: 'Classifying classroom manipulatives into categories.' },
        { title: 'Spatial Positions: Over, Under, Beside & Behind', std: 'PK.G.A.2', desc: 'Understanding relative spatial orientation words.' },
        { title: 'Measurement Explorations: Heavy vs Light', std: 'PK.MD.B.2', desc: 'Comparing object weights using two hands and balance scale.' },
        { title: '3D Shape Exploration: Spheres and Cubes', std: 'PK.G.B.3', desc: 'Building structures with blocks, rolling balls vs stacking blocks.' },
        { title: 'Counting Sequence Milestone to 15 & Kindergarten Readiness', std: 'PK.CC.A.3', desc: 'Fluency in counting to 15, numeral writing practice, and kindergarten transition.' }
      ],
      ela: [
        { title: 'Print Tracking & Book Handling Conventions', std: 'PK.RF.1.A', desc: 'Holding books upright, turning pages, and tracking left-to-right.' },
        { title: 'Letter Name & Sound Recognition (Letters A-F)', std: 'PK.RF.1.D', desc: 'Associating initial uppercase letters with corresponding phonetic sounds.' },
        { title: 'Rhyming Word Families & Nursery Rhymes', std: 'PK.RF.2.A', desc: 'Listening to rhymes, identifying matching word endings, and chanting.' },
        { title: 'Listening Comprehension & Picture Story Walk', std: 'PK.RL.1', desc: 'Answering who/what questions prompted by vibrant illustrations.' },
        { title: 'Letter Name & Sound Recognition (Letters G-L)', std: 'PK.RF.1.D', desc: 'Phonetic identification of uppercase and lowercase letters G through L.' },
        { title: 'Syllable Clapping & Sound Discrimination', std: 'PK.RF.2.B', desc: 'Clapping rhythm of familiar names and animal vocabulary.' },
        { title: 'Letter Name & Sound Recognition (Letters M-R)', std: 'PK.RF.1.D', desc: 'Phonetic identification of uppercase and lowercase letters M through R.' },
        { title: 'Story Elements: Identifying Main Characters', std: 'PK.RL.3', desc: 'Talking about story characters and their feelings in picture books.' },
        { title: 'Letter Name & Sound Recognition (Letters S-Z)', std: 'PK.RF.1.D', desc: 'Completing the alphabet letters S through Z and alphabet song singing.' },
        { title: 'Describing Events & Personal Experience Sharing', std: 'PK.SL.4', desc: 'Expressing ideas in complete 4-word sentences during circle time.' },
        { title: 'Informational Listening: Animals & Real World', std: 'PK.RI.1', desc: 'Listening to non-fiction read-alouds and recalling one key fact.' },
        { title: 'Emergent Writing: Drawing Stories & Name Tracing', std: 'PK.W.1', desc: 'Using crayons to illustrate personal ideas and tracing first name.' }
      ],
      sci: [
        { title: 'Five Senses Laboratory: Touch, Sight & Sound', std: 'PK-PS1', desc: 'Exploring sensory stations to observe texture, bright colors, and auditory tones.' },
        { title: 'Living vs Non-Living Things in Nature', std: 'PK-LS1', desc: 'Observing classroom plants vs plastic toys and identifying living traits.' },
        { title: 'Weather Observations: Sunny, Rainy & Windy Days', std: 'PK-ESS1', desc: 'Recording daily weather symbols and selecting appropriate clothes.' },
        { title: 'Plant Discovery: Seeds, Dirt, Water & Sprouting', std: 'PK-LS2', desc: 'Planting bean seeds in clear cups and logging root growth.' },
        { title: 'Animal Habitats: Land, Water & Sky Creatures', std: 'PK-LS3', desc: 'Sorting animals into oceans, forests, and skies based on adaptations.' },
        { title: 'Color Mixing & Liquid Water Exploration', std: 'PK-PS2', desc: 'Mixing primary colors in water tubes and watching secondary hues emerge.' },
        { title: 'Day and Night Sky: Sun, Moon & Stars', std: 'PK-ESS2', desc: 'Contrasting daytime activities with nighttime sleep and celestial objects.' },
        { title: 'Building Simple Machines: Ramps & Rolling Balls', std: 'PK-ETS1', desc: 'Testing how steep ramps make wooden balls roll faster or slower.' }
      ],
      soc: [
        { title: 'Classroom Family & Collaborative Rules', std: 'C3.PK.Civ.1', desc: 'Establishing sharing norms, turn-taking, and caring for materials.' },
        { title: 'All About Me: Families, Cultures & Homes', std: 'C3.PK.His.1', desc: 'Sharing family traditions, drawings of homes, and diversity celebration.' },
        { title: 'Community Helpers: Firefighters, Nurses & Mail Carriers', std: 'C3.PK.Civ.2', desc: 'Learning how neighborhood helpers keep community safe and healthy.' },
        { title: 'Classroom Mapping: Finding Centers & Cubbies', std: 'C3.PK.Geo.1', desc: 'Drawing simple overhead maps of the classroom carpet and play stations.' },
        { title: 'Wants vs Needs in the Early Childhood Classroom', std: 'C3.PK.Econ.1', desc: 'Distinguishing essential food and water from favorite toys.' },
        { title: 'Seasons & Holidays Around the World', std: 'C3.PK.His.2', desc: 'Exploring cultural winter festivals, harvests, and seasonal changes.' },
        { title: 'Caring for Our Earth: Recycling & Clean Classrooms', std: 'C3.PK.Civ.3', desc: 'Sorting paper for recycling and practicing clean-up routines.' },
        { title: 'Friendship, Empathy & Collaborative Problem-Solving', std: 'C3.PK.Civ.4', desc: 'Using gentle words to solve disputes and celebrating classmate strengths.' }
      ]
    },

    'k': {
      math: [
        { title: 'Count Sequence to 20 & Cardinal Number Writing', std: 'K.CC.A.1', desc: 'Writing numbers 0 to 20 and matching numerals to quantities.' },
        { title: 'Count Forward Beginning from Any Given Number', std: 'K.CC.A.2', desc: 'Counting on from numbers other than 1 using number line paths.' },
        { title: 'Comparing Numbers & Sets Using Greater/Less Than', std: 'K.CC.C.6', desc: 'Matching sets to compare quantity size with visual models.' },
        { title: 'Addition Concepts as Putting Together Within 10', std: 'K.OA.A.1', desc: 'Representing addition with physical counters, drawings, and expressions.' },
        { title: 'Subtraction Concepts as Taking Apart Within 10', std: 'K.OA.A.2', desc: 'Solving word problems involving taking from using ten-frames.' },
        { title: 'Decomposing Numbers Less Than or Equal to 10', std: 'K.OA.A.3', desc: 'Finding number pairs that make 10 with colored connecting cubes.' },
        { title: 'Fluently Add and Subtract Within 5', std: 'K.OA.A.5', desc: 'Rapid mental arithmetic and finger fluency within 5.' },
        { title: 'Foundations of Place Value: Teen Numbers (11-19)', std: 'K.NBT.A.1', desc: 'Composing teen numbers as ten ones and some additional ones.' },
        { title: 'Measurable Attributes: Length, Height & Weight', std: 'K.MD.A.1', desc: 'Directly comparing two objects with a measurable attribute in common.' },
        { title: 'Classifying Objects & Counting Category Counts', std: 'K.MD.B.3', desc: 'Sorting objects into given categories and counting items in each.' },
        { title: '2D & 3D Geometric Shapes: Cylinders, Cones, Spheres', std: 'K.G.A.2', desc: 'Correctly naming shapes regardless of orientations or overall size.' },
        { title: 'Compose Simple Shapes to Form Larger Shapes', std: 'K.G.B.6', desc: 'Joining pattern blocks to make hexagons and composite figures.' }
      ],
      ela: [
        { title: 'Phonological Awareness: Initial Letter Sounds & CVC', std: 'RF.K.2.D', desc: 'Isolating and pronouncing initial, medial vowel, and final sounds in CVC words.' },
        { title: 'High-Frequency Sight Words & Sentence Reading', std: 'RF.K.3.C', desc: 'Recognizing core sight words (the, a, is, to, in, we, can).' },
        { title: 'Ask and Answer Questions About Key Story Details', std: 'RL.K.1', desc: 'Prompting and support to answer who, what, and where in stories.' },
        { title: 'Retell Familiar Stories Including Story Setting', std: 'RL.K.2', desc: 'Identifying main characters, setting, and major narrative events.' },
        { title: 'Recognize Common Types of Texts (Storybooks vs Poems)', std: 'RL.K.5', desc: 'Contrasting fictional narratives with rhyming poetry.' },
        { title: 'Identify Main Topic & Retell Key Facts in Non-Fiction', std: 'RI.K.2', desc: 'Recalling informational facts about animals and weather.' },
        { title: 'Describe Connection Between Two Individuals or Events', std: 'RI.K.3', desc: 'Comparing two real-world concepts in an informational book.' },
        { title: 'Distinguish Between Information in Pictures vs Text', std: 'RI.K.7', desc: 'Using illustrations and diagram details to understand text.' },
        { title: 'Opinion Writing: State a Preference with Drawings', std: 'W.K.1', desc: 'Using a combination of drawing, dictating, and writing to state an opinion.' },
        { title: 'Informative Writing: Name a Topic & Supply Information', std: 'W.K.2', desc: 'Composing a simple 2-sentence informative report with illustrations.' },
        { title: 'Capitalization, End Punctuation & Letter Formation', std: 'L.K.1.A', desc: 'Writing lowercase and uppercase letters with correct pencil grip.' },
        { title: 'Kindergarten Literacy Capstone: Independent Reader', std: 'RF.K.4', desc: 'Reading emergent-reader texts with purpose, pacing, and understanding.' }
      ],
      sci: [
        { title: 'Pushes and Pulls: Forces and Motion on Objects', std: 'K-PS2-1', desc: 'Investigating how pushes and pulls change the speed or direction of motion.' },
        { title: 'Sunlight Warming Earth: Temperature & Shade Effects', std: 'K-PS3-1', desc: 'Observing how direct sunlight warms surfaces and testing shade structures.' },
        { title: 'Plant and Animal Survival Needs: Water and Food', std: 'K-LS1-1', desc: 'Describing patterns of what living things need to survive and grow.' },
        { title: 'Local Weather Patterns and Seasonal Forecasts', std: 'K-ESS2-1', desc: 'Recording daily weather conditions and describing temperature shifts.' },
        { title: 'Plants and Animals Changing Their Environment', std: 'K-ESS2-2', desc: 'Constructing an argument for how organisms change their habitat.' },
        { title: 'Natural Resources: Rocks, Water, Soil and Living Things', std: 'K-ESS3-1', desc: 'Mapping relationship between animal habitats and natural resources.' },
        { title: 'Severe Weather Readiness: Tornadoes, Blizzards & Rain', std: 'K-ESS3-2', desc: 'Understanding weather sirens and safety procedures for storms.' },
        { title: 'Engineering Solutions: Designing a Shade Canopy', std: 'K-ETS1-1', desc: 'Building a miniature shade structure to protect ice from melting in sun.' }
      ],
      soc: [
        { title: 'Classroom & School Rules: Being a Responsible Citizen', std: 'C3.K.Civ.1', desc: 'Explaining why rules keep people safe and practicing fair play.' },
        { title: 'Our Neighborhood & School Community Leaders', std: 'C3.K.Civ.2', desc: 'Identifying roles of principal, teachers, crossing guards, and officers.' },
        { title: 'Maps & Globes: Locating Land, Water & Familiar Places', std: 'C3.K.Geo.1', desc: 'Differentiating green land from blue water on classroom globes.' },
        { title: 'Human & Physical Characteristics of Our Town', std: 'C3.K.Geo.2', desc: 'Identifying local parks, rivers, streets, and school buildings.' },
        { title: 'Goods and Services: Buying, Selling and Trading', std: 'C3.K.Econ.1', desc: 'Explaining how people work to earn money for food and housing.' },
        { title: 'Family Traditions & American Holidays (Labor Day, MLK)', std: 'C3.K.His.1', desc: 'Learning about national holidays and remembering historical leaders.' },
        { title: 'Symbols of Our Nation: American Flag, Eagle & Liberty', std: 'C3.K.Civ.3', desc: 'Recognizing the Pledge of Allegiance and historic patriotic symbols.' },
        { title: 'Past and Present: How Daily Life Has Changed Over Time', std: 'C3.K.His.2', desc: 'Contrasting old-fashioned telephones and horse wagons with modern life.' }
      ]
    },

    '1': {
      math: [
        { title: 'Addition and Subtraction Within 20 Word Problems', std: '1.OA.A.1', desc: 'Solving word problems involving adding to, taking from, and putting together.' },
        { title: 'Word Problems Involving Three Whole Numbers', std: '1.OA.A.2', desc: 'Adding three numbers whose sum is less than or equal to 20.' },
        { title: 'Commutative and Associative Properties of Addition', std: '1.OA.B.3', desc: 'Applying 8 + 3 = 11 therefore 3 + 8 = 11 to solve facts efficiently.' },
        { title: 'Understand Subtraction as an Unknown-Addend Problem', std: '1.OA.B.4', desc: 'Thinking 10 - 8 = ? by asking what number plus 8 equals 10.' },
        { title: 'Relate Counting to Addition and Subtraction (Count On)', std: '1.OA.C.5', desc: 'Counting on 2 to add 2, and counting back 2 to subtract 2.' },
        { title: 'Fact Families & Addition/Subtraction Fluency Within 10', std: '1.OA.C.6', desc: 'Mastering mental math fluency for all addition and subtraction facts within 10.' },
        { title: 'The Meaning of the Equal Sign: True or False Equations', std: '1.OA.D.7', desc: 'Evaluating whether 6 = 6, 7 = 8 - 1, and 5 + 2 = 2 + 5 are true.' },
        { title: 'Place Value: Tens and Ones in Two-Digit Numbers', std: '1.NBT.B.2', desc: 'Understanding that 10 can be thought of as a bundle of ten ones.' },
        { title: 'Comparing Two Two-Digit Numbers Using >, =, and <', std: '1.NBT.B.3', desc: 'Comparing tens and ones digits using comparison inequality symbols.' },
        { title: 'Adding Two-Digit Numbers to a Multiple of 10', std: '1.NBT.C.4', desc: 'Using concrete models and place value strategies to add within 100.' },
        { title: 'Telling Time to the Hour and Half-Hour', std: '1.MD.B.3', desc: 'Reading analog clock hands and matching with digital clock displays.' },
        { title: 'Defining Attributes of 2D and 3D Composite Shapes', std: '1.G.A.2', desc: 'Composing trapezoids, prisms, and cones to create composite models.' }
      ],
      ela: [
        { title: 'Phonics: Short Vowels, Consonant Digraphs (sh, ch, th)', std: 'RF.1.3.A', desc: 'Decoding regular one-syllable words with consonant blends and digraphs.' },
        { title: 'Long Vowels with Final Silent e (CVCe Patterns)', std: 'RF.1.3.C', desc: 'Distinguishing long and short vowel sounds in regularly spelled words.' },
        { title: 'Ask and Answer Questions About Key Text Details', std: 'RL.1.1', desc: 'Citing specific sentences in picture books to answer comprehension questions.' },
        { title: 'Retell Stories & Demonstrate Central Message Understanding', std: 'RL.1.2', desc: 'Retelling beginning, middle, and end, and identifying moral lessons.' },
        { title: 'Describe Characters, Settings, and Major Events in a Story', std: 'RL.1.3', desc: 'Analyzing character reactions to challenges in early chapter stories.' },
        { title: 'Text Features in Informational Books (Headings, Tables)', std: 'RI.1.5', desc: 'Locating facts using table of contents, bold print, and picture labels.' },
        { title: 'Distinguish Between Information from Pictures vs Words', std: 'RI.1.6', desc: 'Evaluating text evidence alongside photographic diagrams.' },
        { title: 'Identify Reasons an Author Gives to Support Points', std: 'RI.1.8', desc: 'Tracking supporting sentences that back up an informational claim.' },
        { title: 'Opinion Writing: State an Opinion & Supply a Reason', std: 'W.1.1', desc: 'Writing a 4-sentence opinion paragraph with introductory sentence and closure.' },
        { title: 'Informative/Explanatory Writing: Name a Topic & Facts', std: 'W.1.2', desc: 'Drafting an animal facts book with title page, 3 facts, and conclusion.' },
        { title: 'Complete Sentences, Capitalization & Punctuation', std: 'L.1.1.J', desc: 'Writing declarative, interrogative, and exclamatory sentences.' },
        { title: '1st Grade Fluency Sprint & Speed Reading Tournament', std: 'RF.1.4', desc: 'Reading grade-level texts smoothly with expression at 60 words per minute.' }
      ],
      sci: [
        { title: 'Sound Waves: Vibrating Materials and Auditory Signals', std: '1-PS4-1', desc: 'Demonstrating that tuning forks and vocal cords vibrate to make sounds.' },
        { title: 'Illumination: Objects Can Be Seen Only When Illuminated', std: '1-PS4-2', desc: 'Testing flashlight beams in darkness and transparent vs opaque matter.' },
        { title: 'Light Beams Interacting with Materials (Mirrors & Blocks)', std: '1-PS4-3', desc: 'Predicting reflections from mirrors and shadows from blocked beams.' },
        { title: 'Biomimicry: Designing Solutions Mimicking Animal Traits', std: '1-LS1-1', desc: 'Designing human gear modeled after bird beaks, turtle shells, and burrs.' },
        { title: 'Animal Parents and Offspring Behavioral Patterns', std: '1-LS1-2', desc: 'Observing how bird parents feed chicks and mammalian caregiving.' },
        { title: 'Young Plants and Animals Resemble Their Parents', std: '1-LS3-1', desc: 'Matching juvenile animals to adults based on physical traits.' },
        { title: 'Sun, Moon, and Star Observable Celestial Patterns', std: '1-ESS1-1', desc: 'Tracking sunrise and sunset positions and moon phase changes over a month.' },
        { title: 'Seasonal Daylight Hours: Summer vs Winter Comparisons', std: '1-ESS1-2', desc: 'Graphing daylight hours to show days are longer in summer and shorter in winter.' }
      ],
      soc: [
        { title: 'Family Roots, Oral Histories & Community Evolution', std: 'C3.1.His.1', desc: 'Interviewing grandparents about how school and transportation changed.' },
        { title: 'Citizenship: Rights and Responsibilities in Our Town', std: 'C3.1.Civ.1', desc: 'Practicing civic virtues such as voting, fairness, and respecting others.' },
        { title: 'Neighborhood Maps: Cardinal Directions & Map Legends', std: 'C3.1.Geo.1', desc: 'Using North, South, East, West to navigate street grid models.' },
        { title: 'Physical Environments: Hills, Valleys, Rivers and Coasts', std: 'C3.1.Geo.2', desc: 'Describing how geographic terrain influences where homes are built.' },
        { title: 'Goods and Services: Producers, Consumers and Workers', std: 'C3.1.Econ.1', desc: 'Tracing bread from wheat farmers to bakers to grocery customers.' },
        { title: 'Earning, Saving and Budgeting for Personal Goals', std: 'C3.1.Econ.2', desc: 'Simulating saving coins in a bank to purchase a desired storybook.' },
        { title: 'National Leaders and Historic Monuments (Washington, Lincoln)', std: 'C3.1.His.2', desc: 'Studying presidential memorials and the Liberty Bell.' },
        { title: 'Global Communities: School Life Around the World', std: 'C3.1.Geo.3', desc: 'Comparing classrooms in Kenya, Japan, Mexico, and the United States.' }
      ]
    },

    '2': {
      math: [
        { title: 'Addition and Subtraction Within 100 Word Problems', std: '2.OA.A.1', desc: 'Solving one- and two-step word problems with start, change, and result unknown.' },
        { title: 'Fluently Add and Subtract Within 20 Using Mental Strategies', std: '2.OA.B.2', desc: 'Automaticity with doubles, making ten, and decomposing numbers.' },
        { title: 'Even and Odd Numbers: Pairing and Equal Groups', std: '2.OA.C.3', desc: 'Determining whether numbers up to 20 have an odd or even count.' },
        { title: 'Rectangular Arrays: Repeated Addition Foundations', std: '2.OA.C.4', desc: 'Writing equations to express total sum of objects in 5x5 arrays.' },
        { title: 'Place Value: Hundreds, Tens, and Ones (Up to 1,000)', std: '2.NBT.A.1', desc: 'Understanding three-digit numbers as counts of hundreds, tens, and ones.' },
        { title: 'Read and Write Numbers to 1,000 in Base-Ten & Expanded Form', std: '2.NBT.A.3', desc: 'Converting 472 into 400 + 70 + 2 and written number words.' },
        { title: 'Compare Two Three-Digit Numbers Based on Place Value', std: '2.NBT.A.4', desc: 'Comparing hundreds, tens, and ones digits using >, =, and < symbols.' },
        { title: 'Fluently Add and Subtract Within 100 Using Regrouping', std: '2.NBT.B.5', desc: 'Standard algorithms, partial sums, and trading ten ones for one ten.' },
        { title: 'Adding Up to Four Two-Digit Numbers Using Strategies', std: '2.NBT.B.6', desc: 'Combining multi-digit addends with properties of operations.' },
        { title: 'Measuring Lengths with Standard Rulers (Inches & Centimeters)', std: '2.MD.A.1', desc: 'Measuring objects with yardsticks, meter sticks, and measuring tapes.' },
        { title: 'Telling Time to 5 Minutes on Analog and Digital Clocks', std: '2.MD.C.7', desc: 'Reading clock hands to the nearest 5 minutes with AM and PM distinctions.' },
        { title: 'Money Math: Dollar Bills, Quarters, Dimes, Nickels & Pennies', std: '2.MD.C.8', desc: 'Solving real-world financial word problems using cent and dollar symbols.' }
      ],
      ela: [
        { title: 'Vowel Teams, Diphthongs & Multi-Syllable Decoding', std: 'RF.2.3.B', desc: 'Decoding words with vowel combinations (ai, ea, ou, oi, igh).' },
        { title: 'Prefixes and Suffixes (un-, re-, -ful, -less, -able)', std: 'RF.2.3.D', desc: 'Determining the meaning of new words formed by adding affixes.' },
        { title: 'Ask and Answer Who, What, Where, When, Why & How', std: 'RL.2.1', desc: 'Demonstrating understanding of key narrative details in chapter stories.' },
        { title: 'Recount Stories, Fables & Folktales from Diverse Cultures', std: 'RL.2.2', desc: 'Identifying morals and universal human lessons across world folklore.' },
        { title: 'Describe How Characters in a Story Respond to Challenges', std: 'RL.2.3', desc: 'Tracing character arc and emotional change from beginning to resolution.' },
        { title: 'Identify the Main Topic and Purpose of a Multi-Paragraph Text', std: 'RI.2.2', desc: 'Pinpointing what author wants to explain, describe, or answer.' },
        { title: 'Describe Connections Between Historical Scientific Events', std: 'RI.2.3', desc: 'Explaining cause and effect in inventions and historical milestones.' },
        { title: 'Compare and Contrast Two Informational Texts on Same Topic', std: 'RI.2.9', desc: 'Finding shared points and distinct differences between two nature books.' },
        { title: 'Write Opinion Pieces: Introduce Topic, State Opinion & Reasons', std: 'W.2.1', desc: 'Composing structured opinion paragraphs with linking words (because, also).' },
        { title: 'Write Informative Texts: Introduce Topic, Facts & Closure', std: 'W.2.2', desc: 'Writing a multi-paragraph report on a state animal or ecosystem.' },
        { title: 'Produce, Expand, and Rearrange Complete Simple & Compound Sentences', std: 'L.2.1.F', desc: 'Combining sentences using and, but, so, and because.' },
        { title: '2nd Grade Reading Fluency Sprint & Prose Mastery', std: 'RF.2.4', desc: 'Reading on-level prose and poetry orally with accuracy and expression at 90 WPM.' }
      ],
      sci: [
        { title: 'Properties of Matter: Flexibility, Hardness & Absorbency', std: '2-PS1-1', desc: 'Testing and classifying matter by observable physical traits.' },
        { title: 'Testing Materials for Specific Purposes (Building Blocks)', std: '2-PS1-2', desc: 'Selecting appropriate materials to design a miniature waterproof boat.' },
        { title: 'Matter Heated or Cooled: Reversible vs Irreversible Changes', std: '2-PS1-4', desc: 'Contrasting melting butter/ice (reversible) with cooking eggs (irreversible).' },
        { title: 'Plants Depend on Water and Light to Grow (Controlled Lab)', std: '2-LS2-1', desc: 'Conducting plant trials comparing sunlight vs dark closet growth.' },
        { title: 'Animals Seed Dispersal and Pollination of Flowering Plants', std: '2-LS2-2', desc: 'Building models of bees pollinating flowers and birds dispersing seeds.' },
        { title: 'Biodiversity in Different Habitats (Desert, Tundra, Rainforest)', std: '2-LS4-1', desc: 'Comparing organism variety across aquatic, woodland, and arid biomes.' },
        { title: 'Earth Events Occur Quickly or Slowly: Volcanoes vs Erosion', std: '2-ESS1-1', desc: 'Contrasting rapid earthquakes and landslides with gradual river carving.' },
        { title: 'Wind and Water Shape Land: Engineering Erosion Barriers', std: '2-ESS2-1', desc: 'Designing sandcastle dikes and seawalls to prevent water runoff erosion.' }
      ],
      soc: [
        { title: 'Historical Timelines: Chronological Sequencing of Community Life', std: 'C3.2.His.1', desc: 'Constructing personal and town timelines showing historic changes.' },
        { title: 'Local Municipal Government: Mayor, City Council & Fire Department', std: 'C3.2.Civ.1', desc: 'Understanding how local laws are passed and public services maintained.' },
        { title: 'Constructing Maps with Scales, Legends & Grid Coordinates', std: 'C3.2.Geo.1', desc: 'Drawing neighborhood maps showing streets, landmarks, and symbols.' },
        { title: 'Earth Geography: Continents, Oceans, Equator & Hemispheres', std: 'C3.2.Geo.2', desc: 'Locating the 7 continents and 5 oceans on world maps and globes.' },
        { title: 'Scarcity, Choices and Opportunity Cost in Household Budgets', std: 'C3.2.Econ.1', desc: 'Understanding that choosing one purchase means giving up another.' },
        { title: 'Global Trade: How Food and Goods Travel Across Countries', std: 'C3.2.Econ.2', desc: 'Tracing fruits, electronics, and spices transported on cargo ships.' },
        { title: 'Civil Rights Pioneers: Rosa Parks, Cesar Chavez & Ruby Bridges', std: 'C3.2.His.2', desc: 'Examining courageous citizens who fought for fairness and desegregation.' },
        { title: 'Environmental Conservation: Preserving Forests, Rivers & Parks', std: 'C3.2.Civ.2', desc: 'Designing community clean-up posters and understanding national parks.' }
      ]
    },

    '4': {
      math: [
        { title: 'Multiplicative Comparisons & Word Problem Modeling', std: '4.OA.A.1', desc: 'Interpreting a multiplication equation as a comparison (35 = 5 x 7 as 35 is 5 times as many as 7).' },
        { title: 'Multi-Step Problem Solving & Estimation Strategies', std: '4.OA.A.3', desc: 'Solving multi-step word problems using whole numbers and mental estimation.' },
        { title: 'Factors, Multiples, Prime and Composite Numbers', std: '4.OA.B.4', desc: 'Finding all factor pairs for a whole number in the range 1-100.' },
        { title: 'Multi-Digit Place Value & Rounding to Any Place', std: '4.NBT.A.3', desc: 'Using place value understanding to round multi-digit whole numbers to any place.' },
        { title: 'Multi-Digit Multiplication: 4 Digits by 1 Digit & 2 by 2 Digits', std: '4.NBT.B.5', desc: 'Area models, partial products, and standard multiplication algorithms.' },
        { title: 'Whole Number Division with Remainders Up to 4-Digit Dividends', std: '4.NBT.B.6', desc: 'Quotients and remainders using arrays and area models.' },
        { title: 'Equivalent Fractions & Generating Common Denominators', std: '4.NF.A.1', desc: 'Explaining why fractions are equivalent using visual fraction models.' },
        { title: 'Adding and Subtracting Fractions with Like Denominators', std: '4.NF.B.3', desc: 'Decomposing a fraction into a sum of fractions with the same denominator.' },
        { title: 'Multiplying Fractions by Whole Numbers in Context', std: '4.NF.B.4', desc: 'Solving word problems involving multiplication of a fraction by a whole number.' },
        { title: 'Decimal Notation for Fractions with Denominators 10 & 100', std: '4.NF.C.6', desc: 'Rewriting 0.62 as 62/100 and locating decimals on number lines.' },
        { title: 'Angle Measurement & Using Protractors with Degrees', std: '4.MD.C.6', desc: 'Measuring angles in whole-number degrees using a protractor.' },
        { title: 'Classifying 2D Polygons Based on Parallel/Perpendicular Lines', std: '4.G.A.2', desc: 'Classifying right, acute, and obtuse triangles and special quadrilaterals.' }
      ],
      ela: [
        { title: 'Drawing Inferences & Citing Text Evidence from Literature', std: 'RL.4.1', desc: 'Referring to details and examples in a text when explaining what the text says explicitly.' },
        { title: 'Determining Theme of a Story, Drama, or Poem from Details', std: 'RL.4.2', desc: 'Summarizing text and identifying how character choices reflect theme.' },
        { title: 'Structural Elements of Poems, Drama, and Prose', std: 'RL.4.5', desc: 'Explaining major differences between poems, plays, and stories.' },
        { title: 'Figurative Language: Similes, Metaphors & Idioms', std: 'L.4.5.A', desc: 'Explaining the meaning of simple similes and metaphors in narrative context.' },
        { title: 'Informational Text Structures: Chronology, Cause/Effect, Problem/Solution', std: 'RI.4.5', desc: 'Analyzing the organizational pattern of non-fiction passages.' },
        { title: 'Integrating Information from Two Texts on the Same Subject', std: 'RI.4.9', desc: 'Combining facts from dual non-fiction articles to write or speak knowledgeably.' },
        { title: 'Write Opinion Pieces with Structured Reasons and Evidence', std: 'W.4.1', desc: 'Organizing reasons with supporting facts, linking words, and strong conclusions.' },
        { title: 'Write Informative/Explanatory Texts to Examine a Topic', std: 'W.4.2', desc: 'Developing a topic with facts, definitions, concrete details, and quotations.' },
        { title: 'Conduct Short Research Projects Building Knowledge Through Investigation', std: 'W.4.7', desc: 'Gathering relevant information from print and digital sources.' },
        { title: 'Prepositional Phrases, Progressive Verbs & Modal Auxiliaries', std: 'L.4.1.C', desc: 'Using modal verbs (can, may, must) to convey conditions.' },
        { title: 'Vocabulary Acquisition: Context Clues, Greek/Latin Roots', std: 'L.4.4.B', desc: 'Using common grade-appropriate roots and affixes (auto-, bio-, -ology).' },
        { title: '4th Grade Fluency Tournament & Chapter Book Oratory', std: 'RF.4.4', desc: 'Reading grade-level prose and poetry orally with accuracy and expression at 115 WPM.' }
      ],
      sci: [
        { title: 'Energy, Speed & Collisions: Transfer of Kinetic Energy', std: '4-PS3-1', desc: 'Using evidence to explain relationship between speed and energy in collisions.' },
        { title: 'Waves and Properties of Amplitude and Wavelength', std: '4-PS4-1', desc: 'Developing a wave model to describe amplitude and wavelength in water.' },
        { title: 'Information Transfer: Digital Waves & Morse Code Pulses', std: '4-PS4-3', desc: 'Comparing multiple solutions that use patterns to transfer information.' },
        { title: 'Internal and External Structures of Plants and Animals', std: '4-LS1-1', desc: 'Constructing an argument that specialized organs support survival.' },
        { title: 'Sensory Input, Receptors and Brain Processing in Animals', std: '4-LS1-2', desc: 'Modeling how animals receive information with senses and process memories.' },
        { title: 'Rock Formations and Fossils: Earth History Over Time', std: '4-ESS1-1', desc: 'Analyzing rock layers to show landscapes change over millions of years.' },
        { title: 'Weathering, Erosion & Deposition Shaping Earth Surface', std: '4-ESS2-1', desc: 'Making observations of the effects of weathering and river sediment flows.' },
        { title: 'Renewable and Non-Renewable Natural Energy Resources', std: '4-ESS3-1', desc: 'Evaluating solar, wind, coal, and oil energy sources and environmental impact.' }
      ],
      soc: [
        { title: 'State History: Indigenous Cultures & Early Frontiers', std: 'C3.4.His.1', desc: 'Analyzing how Native American nations adapted to regional environments.' },
        { title: 'Three Branches of Government: Executive, Legislative & Judicial', std: 'C3.4.Civ.1', desc: 'Explaining checks and balances and state constitution frameworks.' },
        { title: 'Physical Geography: Mountain Ranges, Basins & River Systems', std: 'C3.4.Geo.1', desc: 'Analyzing state topographic features and environmental conservation.' },
        { title: 'Human Geography: Migration, Urban Centers & Farming Regions', std: 'C3.4.Geo.2', desc: 'Mapping population distribution between rural farmlands and metropolitan cities.' },
        { title: 'State Economic Sectors: Agriculture, Tech, Manufacturing & Tourism', std: 'C3.4.Econ.1', desc: 'Explaining how natural resources shape industries and careers.' },
        { title: 'Civil Rights in State History: Suffrage & Fair Housing', std: 'C3.4.Civ.2', desc: 'Studying state leaders who advocated for women’s voting and equal rights.' },
        { title: 'Historical Turning Points: Transportation, Canals & Railroads', std: 'C3.4.His.2', desc: 'Investigating how steam engines and railroads transformed state trade.' },
        { title: 'Active Civic Engagement: Public Hearings & Town Meetings', std: 'C3.4.Civ.3', desc: 'Designing a proposal to present to local town board on public parks.' }
      ]
    },

    '5': {
      math: [
        { title: 'Order of Operations & Evaluating Parentheses/Brackets', std: '5.OA.A.1', desc: 'Using parentheses, brackets, or braces in numerical expressions.' },
        { title: 'Numerical Patterns, Rules & Graphing Ordered Pairs', std: '5.OA.B.3', desc: 'Generating two numerical patterns and identifying relationship between corresponding terms.' },
        { title: 'Decimals to Thousandths: Place Value Powers of 10', std: '5.NBT.A.1', desc: 'Recognizing that in a multi-digit number, a digit in one place represents 10x its neighbor.' },
        { title: 'Multi-Digit Multiplication with Standard Algorithm', std: '5.NBT.B.5', desc: 'Fluently multiplying multi-digit whole numbers using standard algorithm.' },
        { title: 'Multi-Digit Division with Up to 2-Digit Divisors', std: '5.NBT.B.6', desc: 'Finding whole-number quotients of whole numbers with up to four-digit dividends.' },
        { title: 'Add, Subtract, Multiply & Divide Decimals to Hundredths', std: '5.NBT.B.7', desc: 'Relating decimal operations to written methods and explaining reasoning.' },
        { title: 'Add and Subtract Fractions with Unlike Denominators', std: '5.NF.A.1', desc: 'Using equivalent fractions with common denominators to solve fraction problems.' },
        { title: 'Fraction Word Problems Involving Mixed Numbers', std: '5.NF.A.2', desc: 'Solving word problems involving addition and subtraction of fractions.' },
        { title: 'Multiplying Fractions & Scaling (Resizing) Heuristics', std: '5.NF.B.5', desc: 'Comparing size of a product to size of one factor without calculating.' },
        { title: 'Dividing Unit Fractions by Whole Numbers & Vice Versa', std: '5.NF.B.7', desc: 'Solving real-world problems involving division of unit fractions.' },
        { title: 'Volume Concepts & Packing Unit Cubes (L x W x H)', std: '5.MD.C.5', desc: 'Relating volume of rectangular prisms to multiplication and addition.' },
        { title: 'Coordinate Plane: Graphing Real-World Points in Quadrant 1', std: '5.G.A.2', desc: 'Representing mathematical problems by graphing points on coordinate axes.' }
      ],
      ela: [
        { title: 'Quoting Accurately from Text When Explaining Explicit Meaning', std: 'RL.5.1', desc: 'Citing textual evidence precisely to support analytical claims.' },
        { title: 'Determining Theme of Story & Analyzing Character Growth', std: 'RL.5.2', desc: 'Explaining how characters respond to challenges and how speaker reflects on topic.' },
        { title: 'Comparing and Contrasting Two or More Characters or Settings', std: 'RL.5.3', desc: 'Drawing on specific details in text to contrast characters.' },
        { title: 'Explaining How an Author Uses Reasons and Evidence to Support Claims', std: 'RI.5.8', desc: 'Identifying which reasons and evidence support which points.' },
        { title: 'Integrating Information from Several Texts on Same Subject', std: 'RI.5.9', desc: 'Synthesizing evidence from multiple scholarly articles.' },
        { title: 'Write Opinion Pieces on Topics with Logical Sequencing', std: 'W.5.1', desc: 'Providing logically ordered reasons supported by facts and details.' },
        { title: 'Write Informative/Explanatory Texts to Examine a Topic Clearly', std: 'W.5.2', desc: 'Formatting headings, illustrations, and multimedia to aid comprehension.' },
        { title: 'Conduct Short Research Projects Using Several Sources', std: 'W.5.7', desc: 'Summarizing or paraphrasing information in notes and finished work.' },
        { title: 'Conjunctions, Prepositions & Interjections in Complex Sentences', std: 'L.5.1.A', desc: 'Explaining function of conjunctions, prepositions, and interjections.' },
        { title: 'Correlative Conjunctions (either/or, neither/nor, both/and)', std: 'L.5.1.E', desc: 'Using correlative conjunctions to express parallel ideas.' },
        { title: 'Figurative Language: Metaphors, Similes & Idioms in Prose', std: 'L.5.5.A', desc: 'Interpreting figurative language in literary context.' },
        { title: '5th Grade Reading Fluency Sprint & Oratory Defense', std: 'RF.5.4', desc: 'Reading prose and poetry with expression and proper phrasing at 130 WPM.' }
      ],
      sci: [
        { title: 'Structure and Properties of Matter: Atomic Particles', std: '5-PS1-1', desc: 'Developing a model to describe that matter is made of particles too small to see.' },
        { title: 'Conservation of Matter During Phase Changes & Mixing', std: '5-PS1-2', desc: 'Measuring weight before and after heating, cooling, or chemical reactions.' },
        { title: 'Chemical Reactions: Mixing Substances to Form New Matter', std: '5-PS1-4', desc: 'Conducting investigations to determine whether mixing substances results in new substances.' },
        { title: 'Ecosystem Energy Flow: Decomposers, Consumers & Producers', std: '5-LS2-1', desc: 'Modeling movement of matter among plants, animals, and decomposers.' },
        { title: 'Gravitational Force of Earth Pulling Objects Downward', std: '5-PS2-1', desc: 'Supporting an argument that the gravitational force exerted by Earth is directed down.' },
        { title: 'Apparent Brightness of the Sun and Stars Relative to Distance', std: '5-ESS1-1', desc: 'Supporting argument that differences in brightness are due to distance from Earth.' },
        { title: 'Earth Spheres: Geosphere, Biosphere, Hydrosphere & Atmosphere', std: '5-ESS2-1', desc: 'Developing a model using an example to describe ways the spheres interact.' },
        { title: 'Communities Protecting Earth Resources and Environment', std: '5-ESS3-1', desc: 'Obtaining and combining information about ways communities protect resources.' }
      ],
      soc: [
        { title: 'Indigenous Nations of North America Prior to European Arrival', std: 'C3.5.His.1', desc: 'Analyzing cultural, political, and economic systems of Native nations.' },
        { title: 'Colonial Settlement, Triangular Trade & The Middle Passage', std: 'C3.5.His.2', desc: 'Examining economic drivers and human costs of transatlantic commerce.' },
        { title: 'The American Revolution: Declaring Independence & Revolutionary War', std: 'C3.5.His.3', desc: 'Analyzing grievances in Declaration of Independence and wartime turning points.' },
        { title: 'Creating the US Constitution, Constitutional Convention & Compromises', std: 'C3.5.Civ.1', desc: 'Debating the Great Compromise, three-fifths compromise, and federalism.' },
        { title: 'The Bill of Rights: Protecting Fundamental Human Liberties', std: 'C3.5.Civ.2', desc: 'Analyzing the first 10 amendments and their application in modern civic life.' },
        { title: 'Geography of North America: Climate Zones, Biomes & Waterways', std: 'C3.5.Geo.1', desc: 'Investigating how Mississippi River and Great Lakes shaped transportation.' },
        { title: 'Market Specialization, Trade Barriers & Comparative Advantage', std: 'C3.5.Econ.1', desc: 'Explaining how trade and economic specialization connect diverse nations.' },
        { title: 'Civic Responsibilities: Voting, Jury Duty & Peaceful Assembly', std: 'C3.5.Civ.3', desc: 'Examining how active citizens influence public policy and local governance.' }
      ]
    },

    '6': {
      math: [
        { title: 'Ratios, Rates and Unit Rate Conceptions', std: '6.RP.A.1', desc: 'Understanding the concept of a ratio and using ratio language to describe relationships.' },
        { title: 'Unit Rates and Real-World Price/Speed Comparisons', std: '6.RP.A.2', desc: 'Calculating unit rate a/b associated with a ratio a:b in real-world contexts.' },
        { title: 'Ratio Tables, Tape Diagrams & Percentage Calculations', std: '6.RP.A.3', desc: 'Solving real-world problems using tables of equivalent ratios and double number lines.' },
        { title: 'Dividing Fractions by Fractions with Visual Models', std: '6.NS.A.1', desc: 'Interpreting and computing quotients of fractions, solving word problems.' },
        { title: 'Multi-Digit Decimal Division & Standard Fluency Algorithms', std: '6.NS.B.3', desc: 'Fluently adding, subtracting, multiplying, and dividing multi-digit decimals.' },
        { title: 'Greatest Common Factor & Least Common Multiple', std: '6.NS.B.4', desc: 'Finding GCF of two numbers up to 100 and LCM of two numbers up to 12.' },
        { title: 'Positive and Negative Numbers: Four-Quadrant Rational Coordinates', std: '6.NS.C.6', desc: 'Locating rational numbers and ordered pairs across all four quadrants.' },
        { title: 'Absolute Value & Magnitude of Directed Quantities', std: '6.NS.C.7', desc: 'Interpreting absolute value as magnitude for a positive or negative quantity.' },
        { title: 'Algebraic Expressions with Variables & Order of Operations', std: '6.EE.A.2', desc: 'Writing, reading, and evaluating expressions in which letters stand for numbers.' },
        { title: 'Solving One-Step Linear Equations and Inequalities', std: '6.EE.B.7', desc: 'Solving real-world problems by writing and solving equations of form x + p = q.' },
        { title: 'Area of Right Triangles, Special Quadrilaterals & Polygons', std: '6.G.A.1', desc: 'Finding area of triangles and composite polygons by decomposing.' },
        { title: 'Statistical Distributions: Mean, Median, IQR & Box Plots', std: '6.SP.A.2', desc: 'Describing numerical data sets by center, spread, and overall shape on box plots.' }
      ],
      ela: [
        { title: 'Citing Textual Evidence to Support Literary Analysis', std: 'RL.6.1', desc: 'Citing textual evidence to support analysis of what text says explicitly and inferences.' },
        { title: 'Determining Theme or Central Idea & Objective Summary', std: 'RL.6.2', desc: 'Analyzing how theme is conveyed through particular details without personal bias.' },
        { title: 'Plot Development: How Episodes in a Story Unfold & Conflict Resolves', std: 'RL.6.3', desc: 'Describing how character plots lead to resolution.' },
        { title: 'Determining Point of View or Purpose in Informational Texts', std: 'RI.6.6', desc: 'Explaining how an author’s point of view is conveyed in an essay.' },
        { title: 'Evaluating Argument and Specific Claims in a Text', std: 'RI.6.8', desc: 'Tracing claims and distinguishing claims supported by evidence from those that are not.' },
        { title: 'Comparing and Contrasting One Author Presentation to Another', std: 'RI.6.9', desc: 'Comparing presentation of events in memoir vs historical biography.' },
        { title: 'Write Arguments to Support Claims with Clear Reasons and Evidence', std: 'W.6.1', desc: 'Introducing claims, organizing reasons, and using credible sources.' },
        { title: 'Write Informative/Explanatory Texts to Examine a Topic and Convey Ideas', std: 'W.6.2', desc: 'Organizing ideas with formatting, graphics, definitions, and domain-specific words.' },
        { title: 'Conduct Short Research Projects to Answer a Specific Question', std: 'W.6.7', desc: 'Synthesizing evidence from print and digital sources, redirecting inquiry.' },
        { title: 'Pronoun Case: Subjective, Objective, Possessive & Intensive', std: 'L.6.1.A', desc: 'Ensuring pronouns are in the proper case and correcting vague pronouns.' },
        { title: 'Denotation, Connotation & Figurative Word Nuances', std: 'L.6.5.C', desc: 'Distinguishing among connotations of words with similar denotations.' },
        { title: '6th Grade Literary Synthesis & Rhetorical Defense', std: 'SL.6.4', desc: 'Presenting claims and findings sequencing ideas logically with pertinent facts.' }
      ],
      sci: [
        { title: 'Atomic Composition of Simple Molecules and Extended Structures', std: 'MS-PS1-1', desc: 'Developing models to describe atomic composition of simple molecules.' },
        { title: 'Thermal Energy and Particle Motion During Phase Changes', std: 'MS-PS1-4', desc: 'Developing a model to describe temperature increases causing particle velocity increases.' },
        { title: 'Evidence of Chemical Reactions: Synthetic Materials and Properties', std: 'MS-PS1-3', desc: 'Gathering information about synthetic materials created from natural resources.' },
        { title: 'Cell Theory and Specialized Functions of Cellular Organelles', std: 'MS-LS1-1', desc: 'Providing evidence that living things are made of cells and microscopic life exists.' },
        { title: 'Body Systems Interacting to Support Multicellular Organisms', std: 'MS-LS1-3', desc: 'Developing a model to describe interacting systems (circulatory, nervous, respiratory).' },
        { title: 'Photosynthesis: Transforming Radiant Solar Energy into Food', std: 'MS-LS1-6', desc: 'Constructing scientific explanation for role of photosynthesis in cycling matter.' },
        { title: 'Earth-Sun-Moon System: Lunar Phases, Eclipses & Seasons', std: 'MS-ESS1-1', desc: 'Developing and using a model of Earth-sun-moon system to describe lunar phases.' },
        { title: 'Water Cycle Driven by Solar Energy and Gravity Across Oceans', std: 'MS-ESS2-4', desc: 'Developing a model to describe cycling of water through Earth systems.' }
      ],
      soc: [
        { title: 'Ancient River Civilizations: Mesopotamia, Indus & The Nile', std: 'C3.6.His.1', desc: 'Analyzing how irrigation and agricultural surpluses gave rise to cities and cuneiform.' },
        { title: 'Ancient Greece: City-States, Direct Democracy & Philosophy', std: 'C3.6.Civ.1', desc: 'Contrasting Athenian democracy with Spartan oligarchy and studying Socrates.' },
        { title: 'The Roman Republic and Empire: Law, Engineering & Trade', std: 'C3.6.His.2', desc: 'Investigating Roman engineering (aqueducts, roads) and republic institutions.' },
        { title: 'Ancient Asian Civilizations: Zhou Dynasty, Han Empire & Silk Road', std: 'C3.6.His.3', desc: 'Analyzing Confucianism, Daoism, and the trade networks connecting East to West.' },
        { title: 'Map Projections, Latitude/Longitude & Hemispheric Biomes', std: 'C3.6.Geo.1', desc: 'Using Mercator and Robinson projections to understand distortion in cartography.' },
        { title: 'Human Migration, Push-Pull Factors & Urbanization', std: 'C3.6.Geo.2', desc: 'Analyzing how droughts, conflicts, and economic opportunities drive human movement.' },
        { title: 'Traditional, Command and Market Economic Systems', std: 'C3.6.Econ.1', desc: 'Comparing how different societies organize production and distribute goods.' },
        { title: 'Global Human Rights and Ancient Legal Codes (Code of Hammurabi)', std: 'C3.6.Civ.2', desc: 'Tracing development of written laws from Hammurabi and Twelve Tables to Magna Carta.' }
      ]
    },

    'hs': {
      math: [
        { title: 'Rational Exponents & Properties of Radical Arithmetic', std: 'HSN.RN.A.1', desc: 'Explaining how definition of fractional exponents follows from integer rules.' },
        { title: 'Interpreting Expressions & Quadratic Structure Analysis', std: 'HSA.SSE.A.1', desc: 'Interpreting parts of an expression, such as terms, factors, and coefficients.' },
        { title: 'Factoring Quadratic Expressions & Completing the Square', std: 'HSA.SSE.B.3', desc: 'Choosing and producing an equivalent form of an expression to reveal properties.' },
        { title: 'Polynomial Arithmetic: Addition, Subtraction & Multiplication', std: 'HSA.APR.A.1', desc: 'Understanding that polynomials form a system analogous to integers.' },
        { title: 'Creating Equations and Inequalities in One and Two Variables', std: 'HSA.CED.A.1', desc: 'Creating equations and inequalities in one variable to solve problems.' },
        { title: 'Solving Linear Systems by Graphing, Substitution & Elimination', std: 'HSA.REI.C.6', desc: 'Solving systems of linear equations exactly and approximately.' },
        { title: 'Domain, Range and Evaluating Functions with Notation f(x)', std: 'HSF.IF.A.1', desc: 'Understanding that a function from one set to another assigns each element.' },
        { title: 'Analyzing Graphs of Functions: Intercepts, Symmetries & Asymptotes', std: 'HSF.IF.B.4', desc: 'Interpreting key features of graphs and tables in terms of quantities.' },
        { title: 'Trigonometric Ratios in Right Triangles (Sine, Cosine, Tangent)', std: 'HSG.SRT.C.6', desc: 'Understanding that by similarity, side ratios in right triangles are properties of angles.' },
        { title: 'Coordinate Proofs: Slope Criteria for Parallel & Perpendicular Lines', std: 'HSG.GPE.B.5', desc: 'Proving geometric theorems using coordinates and slopes.' },
        { title: 'Interpreting Linear Models: Slope as Rate of Change & Scatterplots', std: 'HSS.ID.B.6', desc: 'Representing bivariate data on a scatter plot and describing how variables are related.' },
        { title: 'Normal Distributions, Standard Deviation & Margin of Error', std: 'HSS.ID.A.4', desc: 'Using mean and standard deviation of a data set to fit to a normal distribution.' }
      ],
      ela: [
        { title: 'Citing Strong and Thorough Textual Evidence in Complex Literature', std: 'RL.9-10.1', desc: 'Citing strong evidence to support what text says explicitly and inferences.' },
        { title: 'Analyzing Thematic Development in Classic and Contemporary Works', std: 'RL.9-10.2', desc: 'Determining a theme or central idea of a text and analyzing in detail its development.' },
        { title: 'Complex Character Analysis: Motives, Contradictions & Tragic Flaws', std: 'RL.9-10.3', desc: 'Analyzing how complex characters develop over text, interact with others, and advance plot.' },
        { title: 'Rhetorical Analysis: Diction, Syntax, Figurative Tone & Parallelism', std: 'RL.9-10.4', desc: 'Determining the meaning of words and phrases as they are used in text.' },
        { title: 'Structural Analysis of Seminal Speeches and Historical Documents', std: 'RI.9-10.5', desc: 'Analyzing in detail how author ideas or claims are developed and refined.' },
        { title: 'Evaluating Rhetoric and Fallacies in Public Debate and Editorials', std: 'RI.9-10.8', desc: 'Delineating and evaluating argument and specific claims, assessing reasoning.' },
        { title: 'Write Sophisticated Arguments with Counterclaims and Formal Style', std: 'W.9-10.1', desc: 'Introducing precise claims, distinguishing from alternate claims, and refuting counterclaims.' },
        { title: 'Write Analytical/Informative Papers Synthesizing Complex Sources', std: 'W.9-10.2', desc: 'Conveying complex ideas clearly through effective selection and organization.' },
        { title: 'Collegiate Research Projects: Synthesizing Multiple Authoritative Sources', std: 'W.9-10.7', desc: 'Conducting research projects to answer a question or solve a problem.' },
        { title: 'Grammar Mechanics: Parallel Structure, Semicolons & Colon Usage', std: 'L.9-10.1.A', desc: 'Using parallel structure in sentences, clauses, and rhetorical lists.' },
        { title: 'Etymology, Latin and Greek Affixes & Nuanced Denotations', std: 'L.9-10.4.B', desc: 'Identifying patterns of word changes that indicate different meanings.' },
        { title: 'Senior Capstone Socratic Seminar & Academic Portfolio Defense', std: 'SL.9-10.4', desc: 'Presenting information clearly, concisely, and logically in formal spoken rhetoric.' }
      ],
      sci: [
        { title: 'Periodic Table Patterns, Electron Configurations & Chemical Bonding', std: 'HS-PS1-1', desc: 'Using periodic table as a model to predict relative properties of elements.' },
        { title: 'Chemical Reactions, Stoichiometry & Conservation of Mass', std: 'HS-PS1-7', desc: 'Using mathematical representations to support claim that atoms are conserved.' },
        { title: 'Thermodynamics: Heat Transfer, Entropy & Energy Conservation', std: 'HS-PS3-1', desc: 'Creating a computational model to calculate change in energy of one component.' },
        { title: 'Cellular Respiration, Photosynthesis & Carbon Cycling', std: 'HS-LS1-5', desc: 'Using a model to illustrate how photosynthesis transforms light into stored chemical energy.' },
        { title: 'DNA Structure, Protein Synthesis & Genetic Inheritance', std: 'HS-LS1-1', desc: 'Constructing explanation based on evidence for how DNA determines protein structure.' },
        { title: 'Natural Selection, Speciation & Mathematical Modeling of Alleles', std: 'HS-LS4-3', desc: 'Applying concepts of statistics and probability to support explanations of adaptations.' },
        { title: 'Astrophysical Life Cycle of Stars, Nuclear Fusion & The Big Bang', std: 'HS-ESS1-1', desc: 'Developing a model based on evidence to illustrate life span of the sun.' },
        { title: 'Global Climate Systems, Feedback Loops & Carbon Footprint Modeling', std: 'HS-ESS2-4', desc: 'Using a model to describe how variations in flow of energy into and out of Earth systems occur.' }
      ],
      soc: [
        { title: 'Constitutional Foundations: Federalist Papers & Anti-Federalist Debates', std: 'C3.HS.Civ.1', desc: 'Analyzing arguments in Federalist No. 10 and No. 51 regarding factions and separation of powers.' },
        { title: 'Landmark Supreme Court Jurisprudence: Marbury, Brown & Miranda', std: 'C3.HS.Civ.2', desc: 'Evaluating historical and contemporary impact of judicial review and civil rights decisions.' },
        { title: 'Electoral Systems, Gerrymandering, Campaign Finance & Voting Rights', std: 'C3.HS.Civ.3', desc: 'Analyzing mechanisms of congressional redistricting, PACs, and citizen voter participation.' },
        { title: 'Macroeconomics: GDP, Inflation, Unemployment & The Business Cycle', std: 'C3.HS.Econ.1', desc: 'Using economic indicators to analyze health of national economy.' },
        { title: 'Fiscal and Monetary Policy: The Federal Reserve & Federal Budgeting', std: 'C3.HS.Econ.2', desc: 'Explaining how interest rates and taxation stimulate or cool economic growth.' },
        { title: 'Geopolitics, International Treaties & Global Trade Organizations', std: 'C3.HS.Geo.1', desc: 'Evaluating diplomatic agreements, NATO, United Nations, and globalization trends.' },
        { title: 'Historical Inquiry: Primary Source Historiography and Cold War Crises', std: 'C3.HS.His.1', desc: 'Evaluating credibility and bias in declassified cables, diplomatic memos, and speeches.' },
        { title: 'Senior Civic Engagement Capstone: Policy Proposal & Community Action', std: 'C3.HS.Civ.4', desc: 'Drafting an actionable municipal policy brief and presenting to local legislative committee.' }
      ]
    }
  };

  // Helper to construct traditional and wave pacing for any grade
  window.buildGradePacingSchedule = function(gradeKey, model) {
    const meta = GRADE_METADATA[gradeKey] || GRADE_METADATA['3'];
    const prof = GRADE_PROFILES[gradeKey];

    // For Grade 3, if already defined in teachers-main.js, let caller use existing plan
    if (gradeKey === '3' && window.MASTER_PACING_PLAN && model === 'traditional') {
      return window.MASTER_PACING_PLAN;
    }
    if (gradeKey === '3' && window.WAVE_PACING_PLAN && model === 'wave') {
      return window.WAVE_PACING_PLAN;
    }

    const lvl = meta.level;
    const gNum = meta.gradeNum;
    const isEarly = (gradeKey === 'pre-k' || gradeKey === 'k');

    // Build curated lists
    const mathList = (prof && prof.math) || [
      { title: `${meta.name} Number Sense & Operation Foundations`, std: `${gNum}.OA.1`, desc: `Core operations and problem solving for ${meta.name}.` }
    ];
    const elaList = (prof && prof.ela) || [
      { title: `${meta.name} Literary Analysis & Reading Comprehension`, std: `RL.${gNum}.1`, desc: `Reading comprehension and text evidence for ${meta.name}.` }
    ];
    const sciList = (prof && prof.sci) || [
      { title: `${meta.name} Scientific Inquiry & Physical Systems`, std: `${gNum}-PS1`, desc: `Observational labs and physical systems for ${meta.name}.` }
    ];
    const socList = (prof && prof.soc) || [
      { title: `${meta.name} Civics, Geography & Community Systems`, std: `C3.${gNum}.Civ.1`, desc: `Civics, communities, and geography for ${meta.name}.` }
    ];

    const getMathItem = (idx) => mathList[idx % mathList.length];
    const getElaItem = (idx) => elaList[idx % elaList.length];
    const getSciItem = (idx) => sciList[idx % sciList.length];
    const getSocItem = (idx) => socList[idx % socList.length];

    const makeLessonUrl = (subj, mCode) => {
      if (isEarly) {
        return `/levels/k.php?subject=${subj}&grade=${gradeKey}`;
      }
      return `/src/lesson_runner.php?subject=${subj}&level=${lvl}`;
    };

    // MODEL A: 36-WEEK TRADITIONAL SCHEDULE
    if (model === 'traditional') {
      const schedule = [];
      for (let w = 1; w <= 36; w++) {
        const q = Math.ceil(w / 9);
        const wInQ = ((w - 1) % 9) + 1;

        if (wInQ === 9) {
          // Quarterly synthesis
          schedule.push({
            week: w,
            quarter: q,
            title: `${meta.name} Quarter ${q} Formative Benchmark & Portfolio Audit`,
            standard: `CCSS.${gNum}.Q${q}.BENCH`,
            desc: `Comprehensive Q${q} formative mastery review, portfolio artifact compilation, and learner conference for ${meta.name}.`,
            lesson: `/assessment/`,
            checkpoint: `Q${q}-MASTERY`
          });
        } else if (wInQ === 8) {
          // Fluency sprint / rapid recall
          schedule.push({
            week: w,
            quarter: q,
            title: `${meta.name} Fluency Sprint & Operational Stamina`,
            standard: `CCSS.${gNum}.FLUENCY.Q${q}`,
            desc: `Timed arithmetic fluency conditioning, rapid sight word / vocabulary recall, and confidence building for ${meta.name}.`,
            lesson: `/assessment/#mode=sprint`,
            checkpoint: `SPRINT-Q${q}`
          });
        } else {
          // Rotating domain instructional unit
          const cycle = Math.floor((w - 1) / 4);
          const subjMod = (w - 1) % 4;

          let itemData = null;
          let subjKey = 'math';

          if (subjMod === 0) {
            itemData = getMathItem(cycle);
            subjKey = 'math';
          } else if (subjMod === 1) {
            itemData = getElaItem(cycle);
            subjKey = 'language';
          } else if (subjMod === 2) {
            itemData = getSciItem(cycle);
            subjKey = 'science';
          } else {
            itemData = getSocItem(cycle);
            subjKey = 'social';
          }

          schedule.push({
            week: w,
            quarter: q,
            title: `${meta.name}: ${itemData.title}`,
            standard: itemData.std,
            desc: itemData.desc,
            lesson: makeLessonUrl(subjKey, itemData.std),
            checkpoint: itemData.std
          });
        }
      }
      return schedule;
    }

    // MODEL B: 48-WEEK YEAR-ROUND FISCAL WAVE SCHEDULE (6 Waves x 8 Wks • July 1 - June 30)
    if (model === 'wave') {
      const schedule = [];
      const fiscalDateRanges = [
        ['July 1 – July 7', 'July 8 – July 14', 'July 15 – July 21', 'July 22 – July 28', 'July 29 – Aug 4', 'Aug 5 – Aug 11', 'Aug 12 – Aug 18', 'Aug 19 – Aug 26'],
        ['Sept 1 – Sept 7', 'Sept 8 – Sept 14', 'Sept 15 – Sept 21', 'Sept 22 – Sept 28', 'Sept 29 – Oct 5', 'Oct 6 – Oct 12', 'Oct 13 – Oct 19', 'Oct 20 – Oct 27'],
        ['Nov 1 – Nov 7', 'Nov 8 – Nov 14', 'Nov 15 – Nov 21', 'Nov 22 – Nov 28', 'Nov 29 – Dec 5', 'Dec 6 – Dec 12', 'Dec 13 – Dec 19', 'Dec 20 – Dec 27'],
        ['Jan 2 – Jan 8', 'Jan 9 – Jan 15', 'Jan 16 – Jan 22', 'Jan 23 – Jan 29', 'Jan 30 – Feb 5', 'Feb 6 – Feb 12', 'Feb 13 – Feb 19', 'Feb 20 – Feb 27'],
        ['Mar 1 – Mar 7', 'Mar 8 – Mar 14', 'Mar 15 – Mar 21', 'Mar 22 – Mar 28', 'Mar 29 – Apr 4', 'Apr 5 – Apr 11', 'Apr 12 – Apr 18', 'Apr 19 – Apr 26'],
        ['May 1 – May 7', 'May 8 – May 14', 'May 15 – May 21', 'May 22 – May 28', 'May 29 – June 4', 'June 5 – June 11', 'June 12 – June 18', 'June 19 – June 30']
      ];

      for (let waveNum = 1; waveNum <= 6; waveNum++) {
        const dateList = fiscalDateRanges[waveNum - 1];

        for (let waveWk = 1; waveWk <= 8; waveWk++) {
          const globalWeek = (waveNum - 1) * 8 + waveWk;
          const dateRange = dateList[waveWk - 1];

          if (waveWk === 8) {
            // SYNTHESIS WEEK (7+1 Learning Cycle)
            schedule.push({
              wave: waveNum,
              waveWeek: 8,
              fiscalWeek: globalWeek,
              fiscalDates: dateRange,
              title: `${meta.name} Wave ${waveNum} Synthesis: Formative Testing, Work Completion & Wave ${waveNum < 6 ? waveNum + 1 : 1} Planning`,
              standard: `WAVE${waveNum}.SYNTHESIS`,
              desc: `Week 8 Synthesis for ${meta.name}: Wave milestone diagnostic testing, completing open lab writeups and portfolio projects, and planning curriculum for the next wave.`,
              lesson: `/assessment/#standard=${encodeURIComponent(gNum + '.OA.1')}&count=10`,
              checkpoint: `W${waveNum}-SYNTHESIS`,
              isSynthesis: true
            });
          } else {
            // INSTRUCTIONAL IMMERSION (Weeks 1 to 7)
            const unitIdx = (waveNum - 1) * 2 + Math.floor((waveWk - 1) / 4);
            const subjMod = (waveWk - 1) % 4;

            let itemData = null;
            let subjKey = 'math';

            if (subjMod === 0) {
              itemData = getMathItem(unitIdx);
              subjKey = 'math';
            } else if (subjMod === 1) {
              itemData = getElaItem(unitIdx);
              subjKey = 'language';
            } else if (subjMod === 2) {
              itemData = getSciItem(unitIdx);
              subjKey = 'science';
            } else {
              itemData = getSocItem(unitIdx);
              subjKey = 'social';
            }

            schedule.push({
              wave: waveNum,
              waveWeek: waveWk,
              fiscalWeek: globalWeek,
              fiscalDates: dateRange,
              title: `${meta.name}: ${itemData.title}`,
              standard: itemData.std,
              desc: itemData.desc,
              lesson: makeLessonUrl(subjKey, itemData.std),
              checkpoint: itemData.std,
              isSynthesis: false
            });
          }
        }
      }

      return schedule;
    }

    return [];
  };

  // Expose registry globally
  window.GRADE_PACING_METADATA = GRADE_METADATA;
  window.GRADE_CURRICULUM_PROFILES = GRADE_PROFILES;

})(typeof window !== 'undefined' ? window : this);

