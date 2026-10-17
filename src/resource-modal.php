<!-- Dynamic Lesson Resource Modal -->
<div id="dynamic-resource-modal" class="dynamic-modal-overlay" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="dynamic-modal-title" aria-hidden="true">
    <div class="dynamic-modal-backdrop" onclick="closeDynamicModal()"></div>
    <div class="dynamic-modal-content" id="dynamic-modal-card">
        <!-- Close button top right -->
        <button onclick="closeDynamicModal()" class="dynamic-modal-close-icon" aria-label="Close lesson">&times;</button>
        
        <!-- Header -->
        <div class="dynamic-modal-header">
            <div class="dynamic-modal-header-left">
                <div class="dynamic-modal-badge" id="dynamic-modal-category">Grammar Topic</div>
                <h3 id="dynamic-modal-title" class="dynamic-modal-title">Lesson Title</h3>
            </div>
            <div class="dynamic-modal-header-actions">
                <!-- Copy Shareable Link Button -->
                <button id="share-link-btn" class="speak-lesson-btn" onclick="copyLessonShareLink()" aria-label="Copy direct shareable link with hash" title="Copy direct link to this lesson">
                    <i class="fas fa-link"></i> <span id="share-btn-text">Share</span>
                </button>
                <!-- Speak Button -->
                <button id="speak-btn" class="speak-lesson-btn" onclick="speakModalContent()" aria-label="Speak lesson content">
                    <i class="fas fa-volume-up"></i> Listen
                </button>
            </div>
        </div>
        
        <!-- Lecture & Lexile Toolbar -->
        <div class="lecture-toolbar" id="modal-lecture-toolbar">
            <div class="lexile-toggle-group" role="group" aria-label="Select Reading / Lexile Level">
                <span class="lexile-toggle-label"><i class="fas fa-sliders-h"></i> Level:</span>
                <button type="button" class="lexile-toggle-btn active" id="btn-lexile-standard" onclick="setModalLexile('standard')" aria-pressed="true">
                    <i class="fas fa-graduation-cap"></i> Current / Standard
                </button>
                <button type="button" class="lexile-toggle-btn" id="btn-lexile-basic" onclick="setModalLexile('basic')" aria-pressed="false">
                    <i class="fas fa-feather-alt"></i> Basic English (Simplified)
                </button>
            </div>
            <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-text-muted);">
                <span id="lexile-indicator-badge"><i class="fas fa-book-reader"></i> Standard Lexile</span>
            </div>
        </div>
        
        <!-- Body -->
        <div class="dynamic-modal-body">
            <!-- 1. Concept Lecture & Subject Overview -->
            <div class="lecture-card" id="lecture-subject-card">
                <h4 class="lecture-card-title"><i class="fas fa-chalkboard-teacher" style="color: var(--color-primary, #4f46e5);"></i> Concept Lecture &amp; Subject Breakdown</h4>
                <p id="dynamic-modal-definition" class="lecture-card-desc">Definition goes here...</p>
                <div id="dynamic-modal-breakdown" class="lecture-breakdown-grid">
                    <!-- Populated dynamically -->
                </div>
            </div>
            
            <!-- 2. Master Equations & Formula Vault -->
            <div class="lecture-card" id="dynamic-modal-equations-wrap" style="display: none; border-left: 4px solid #0284c7; margin-bottom: 1.25rem;">
                <h4 class="lecture-card-title"><i class="fas fa-square-root-variable" style="color: #0284c7;"></i> Key Equations &amp; Canonical Formulas</h4>
                <div id="dynamic-modal-equations" class="equations-vault-grid">
                    <!-- Populated dynamically with MathJax formulas -->
                </div>
            </div>

            <!-- 3. Mathematical Visualization & Graph -->
            <div class="lecture-card" id="dynamic-modal-graph-wrap" style="display: none; border-left: 4px solid #10b981; margin-bottom: 1.25rem;">
                <h4 class="lecture-card-title"><i class="fas fa-chart-line" style="color: #10b981;"></i> Geometric / Mathematical Diagram</h4>
                <div id="dynamic-modal-graph" class="math-diagram-container">
                    <!-- Populated dynamically with SVG coordinate graphs or geometric diagrams -->
                </div>
            </div>

            <!-- 4. Example Section -->
            <div class="lecture-card example-block" style="border-left: 4px solid var(--color-secondary, #6366f1); margin-bottom: 1.25rem;">
                <h4 class="lecture-card-title"><i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Real-World Examples &amp; Breakdown</h4>
                <div id="dynamic-modal-example" class="lesson-example-text">Example goes here...</div>
            </div>

            <!-- 5. Rule & Common Pitfall Callout -->
            <div id="dynamic-modal-protip-wrap" class="lecture-callout-protip" style="display: none;">
                <i class="fas fa-exclamation-circle lecture-protip-icon"></i>
                <div>
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em; color: #b45309; margin-bottom: 0.2rem;">Rule &amp; Common Trap:</strong>
                    <p id="dynamic-modal-protip" class="lecture-protip-text"></p>
                </div>
            </div>

            <!-- 6. Academic References & Interactive Tools -->
            <div class="lecture-card" id="dynamic-modal-links-wrap" style="display: none; border-left: 4px solid #8b5cf6; margin-bottom: 1.25rem;">
                <h4 class="lecture-card-title"><i class="fas fa-compass" style="color: #8b5cf6;"></i> Curated References &amp; Interactive Calculators</h4>
                <div id="dynamic-modal-links" class="references-links-grid">
                    <!-- Populated dynamically -->
                </div>
            </div>
            
            <!-- 7. Mini-Quiz Section -->
            <div class="lesson-section quiz-block">
                <h4 class="lesson-section-title"><i class="fas fa-question-circle"></i> Quick Practice Check</h4>
                <p id="dynamic-modal-quiz-question" class="quiz-question-text">Quiz question goes here?</p>
                <div id="dynamic-modal-quiz-choices" class="quiz-choices-container">
                    <!-- Dynamic choice buttons -->
                </div>
                <div id="dynamic-modal-quiz-feedback" class="quiz-feedback-box" style="display: none;"></div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="dynamic-modal-footer">
            <span class="dynamic-modal-footer-copy">Hesten's Learning &copy; 2026</span>
            <button onclick="closeDynamicModal()" class="dynamic-modal-close-btn">Close Lesson</button>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/components/resource-modal.css') : '/assets/css/components/resource-modal.css?v=2.24.0' ?>">
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/math-lessons.js') : '/assets/js/pages/math-lessons.js?v=2.24.0' ?>"></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/science-lessons.js') : '/assets/js/pages/science-lessons.js?v=2.24.0' ?>"></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/social-studies-lessons.js') : '/assets/js/pages/social-studies-lessons.js?v=2.24.0' ?>"></script>

<script>
// Global Subtopic and Alias Dictionary to guarantee universal popup resolution across all student subpages
window.topicAliases = {
    // Science Subpage Topics -> Canonical Lessons
    "Periodic Table Visualizer": "Periodic Table",
    "Periodic Table Quiz": "Periodic Table",
    "Atomic Structure Model": "Periodic Table",
    "Animal Cell Diagram": "Cell Biology",
    "Plant Anatomy": "Cell Biology",
    "Plant Cell Observation": "Cell Biology",
    "Cells & Organelles Quiz": "Cell Biology",
    "Human Organ Systems": "Human Body Systems",
    "Human Body Systems Quiz": "Human Body Systems",
    "Skeletal System": "Human Body Systems",
    "Muscular System": "Human Body Systems",
    "Circulatory System": "Human Body Systems",
    "Nervous System": "Human Body Systems",
    "Food Web & Chains": "Ecology & Environment",
    "Ecosystem Simulation": "Ecology & Environment",
    "Ecology & Biomes Quiz": "Ecology & Environment",
    "Ecosystems Quiz": "Ecology & Environment",
    "DNA Extraction at Home": "Genetics & Heredity",
    "Genetics Quiz": "Genetics & Heredity",
    "DNA Evidence Matching": "Genetics & Heredity",
    "Chemical Reaction Animations": "Chemical Reactions",
    "Chemical Bonding Quiz": "Chemical Reactions",
    "Stoichiometry Quiz": "Chemical Reactions",
    "Acids & Bases Quiz": "Acids and Bases",
    "Molecular Geometry": "Organic Chemistry Basics",
    "Chemical Trace Analysis": "Chemical Reactions",
    "Force Diagrams": "Mechanics",
    "Motion & Forces Quiz": "Mechanics",
    "Projectile Motion": "Mechanics",
    "Gravity Simulator": "Mechanics",
    "Energy & Work Quiz": "Thermodynamics",
    "Electric Circuits": "Electricity & Magnetism",
    "Electricity Quiz": "Electricity & Magnetism",
    "Circuit Builder": "Electricity & Magnetism",
    "Wave Properties": "Waves & Optics",
    "Wave Generator": "Waves & Optics",
    "Waves & Sound Quiz": "Waves & Optics",
    "Light Spectrum Diagram": "Waves & Optics",
    "Rock Cycle Model": "Geology & Rocks",
    "Geology Quiz": "Geology & Rocks",
    "Water Cycle Diagram": "Weather & Climate",
    "Weather & Climate Quiz": "Weather & Climate",
    "Weather Forecasting Game": "Weather & Climate",
    "Climate Change Quiz": "Environmental Science News",
    "Plate Tectonics Map": "Geology & Rocks",
    "Plate Tectonics Demo": "Geology & Rocks",
    "Solar System Model": "Astronomy & Space",
    "Solar System Builder": "Astronomy & Space",
    "Astronomy Quiz": "Astronomy & Space",
    "Mars Missions Updates": "Space Exploration Articles",
    "Black Holes Explained": "Space Exploration Articles",
    "Exoplanet Discoveries": "Space Exploration Articles",
    "Future of Space Travel": "Space Exploration Articles",
    "Scientific Method Steps": "Biology Labs",
    "Experimental Design Flowchart": "At-Home Experiments",
    "Data Analysis Process": "Physics Simulations",
    "Peer Review Process": "Latest Discoveries",
    "Scientific Method Quiz": "Biology Labs",
    "Science Terminology Quiz": "Biology Labs",
    "Science Trivia": "Latest Discoveries",
    "Virtual Dissection": "Biology Labs",
    "Density Tower": "Chemistry Demos",
    "Volcano Eruption": "Chemistry Demos",
    "Crystal Growing": "Chemistry Demos",
    "Water Quality Testing": "Environmental Science News",
    "Composting Project": "Environmental Science News",
    "Renewable Energy Model": "Environmental Science News",
    "Pollution Impact Study": "Environmental Science News",
    "Pollution & Conservation Quiz": "Environmental Science News",
    "Renewable Energy Quiz": "Environmental Science News",
    "Crime Scene Reconstruction": "Chemistry Demos",
    "Breakthroughs in Medicine": "Health & Medicine Updates",
    "Disease Research": "Health & Medicine Updates",
    "Vaccine Development": "Health & Medicine Updates",
    "Nutrition & Wellness": "Health & Medicine Updates",
    "Mental Health Awareness": "Health & Medicine Updates",
    "Artificial Intelligence": "Latest Discoveries",
    "Robotics & Automation": "Latest Discoveries",
    "Biotechnology": "Latest Discoveries",
    "Quantum Computing": "Latest Discoveries",
    "Famous Scientists": "Latest Discoveries",
    "Famous Scientists Quiz": "Latest Discoveries",
    "Key Scientific Discoveries": "Latest Discoveries",
    "Evolution of Theories": "Latest Discoveries",
    "Nobel Prize Winners": "Latest Discoveries",

    // Social Studies Subpage Topics -> Canonical Lessons
    "World History Timelines": "World History Timelines",
    "Medieval Period": "World History Timelines",
    "Renaissance & Reformation": "World History Timelines",
    "Age of Exploration": "World History Timelines",
    "Modern World History": "World History Timelines",
    "World War I Overview": "World History Timelines",
    "Causes of WWII": "World History Timelines",
    "Major Battles of WWII": "World History Timelines",
    "Post-War World": "World History Timelines",
    "Origins of the Cold War": "World History Timelines",
    "Space Race": "World History Timelines",
    "Cuban Missile Crisis": "World History Timelines",
    "Fall of the Berlin Wall": "World History Timelines",
    "Ancient Civilizations": "Ancient Civilizations",
    "Ancient Egypt": "Ancient Civilizations",
    "Mesopotamia": "Ancient Civilizations",
    "Ancient Greece": "Ancient Civilizations",
    "Roman Empire": "Ancient Civilizations",
    "Ancient Civilizations Map": "Ancient Civilizations",
    "Roman Empire Expansion": "Ancient Civilizations",
    "US History Documents": "US History Documents",
    "Colonial America": "US History Documents",
    "American Revolution": "US History Documents",
    "Civil War Era": "US History Documents",
    "20th Century America": "US History Documents",
    "Historical Roots of Conflicts": "US History Documents",
    "Evolution of Civil Rights": "US History Documents",
    "Economic Crises History": "US History Documents",
    "Impact of Past Policies": "US History Documents",
    "Historical Figures": "Historical Figures",
    "Leaders & Rulers": "Historical Figures",
    "Scientists & Inventors": "Historical Figures",
    "Artists & Writers": "Historical Figures",
    "Activists & Reformers": "Historical Figures",
    "World Maps & Atlases": "World Maps & Atlases",
    "Political World Map": "World Maps & Atlases",
    "Physical Features Map": "Physical Geography",
    "Physical Geography": "Physical Geography",
    "Climate Zones Map": "Physical Geography",
    "Global Climate Zones": "Physical Geography",
    "Human Geography": "Human Geography",
    "Population Density Map": "Human Geography",
    "Geographic Data Analysis": "Geographic Data Analysis",
    "State Capitals Quiz Map": "Geographic Data Analysis",
    "US Rivers & Mountains Map": "Geographic Data Analysis",
    "Historical US Territories": "Geographic Data Analysis",
    "Interactive State Borders": "Geographic Data Analysis",
    "Branches of Government": "Branches of Government",
    "Legislative Branch": "Branches of Government",
    "Executive Branch": "Branches of Government",
    "Judicial Branch": "Branches of Government",
    "Checks and Balances": "Branches of Government",
    "Citizenship Rights & Duties": "Citizenship Rights & Duties",
    "Bill of Rights": "Citizenship Rights & Duties",
    "Civic Participation": "Citizenship Rights & Duties",
    "Voting & Elections": "Citizenship Rights & Duties",
    "Community Involvement": "Citizenship Rights & Duties",
    "Constitutional Law": "Constitutional Law",
    "Articles of Confederation": "Constitutional Law",
    "Constitutional Amendments": "Constitutional Law",
    "Landmark Supreme Court Cases": "Constitutional Law",
    "Federalism": "Constitutional Law",
    "Electoral Process": "Electoral Process",
    "Primary Elections": "Electoral Process",
    "General Elections": "Electoral Process",
    "Electoral College Explained": "Electoral Process",
    "Campaign Finance": "Electoral Process",

    // Math Subpage Topics -> Canonical Lessons
    "Introduction to Algebra": "Basic Algebra",
    "Algebra Practice": "Basic Algebra",
    "Algebraic Expressions Summary": "Basic Algebra",
    "Solving Linear Equations": "Linear Equations",
    "Solving Inequalities Guide": "Linear Equations",
    "Factoring Polynomials Notes": "Quadratic Equations",
    "Polynomial Operations": "Quadratic Equations",
    "Equation Solver": "Systems of Equations",
    "Basic Geometric Shapes": "Angles and Lines",
    "Geometry Exercises": "Angles and Lines",
    "Geometry Postulates": "Geometric Proofs",
    "Pythagorean Theorem": "Geometric Proofs",
    "Circles and Arcs": "Area and Perimeter",
    "Circles and Spheres Notes": "Volume and Surface Area",
    "Triangle Congruence Postulates": "Geometric Proofs",
    "Volume Formulas": "Volume and Surface Area",
    "Transformations": "Geometric Proofs",
    "Understanding Limits": "Limits and Continuity",
    "Limits & Continuity Guide": "Limits and Continuity",
    "Rules of Differentiation": "Differentiation",
    "Derivative Rules Summary": "Differentiation",
    "Techniques of Integration": "Integration",
    "Integration Techniques": "Integration",
    "Applications in Physics": "Applications of Calculus",
    "Calculus Worksheets": "Differentiation",
    "Data Visualization": "Descriptive Statistics",
    "Probability Basics": "Probability Distributions",
    "Basic Probability": "Probability Distributions",
    "Normal Distribution": "Probability Distributions",
    "Probability & Combinatorics": "Probability Distributions",
    "Statistical Formulas": "Descriptive Statistics",
    "Hypothesis Testing Guide": "Hypothesis Testing",
    "Confidence Intervals Notes": "Hypothesis Testing",
    "Statistics Problems": "Descriptive Statistics",
    "Integers and Operations": "Modular Arithmetic",
    "Fractions and Decimals": "Divisibility Rules",
    "Fraction Frenzy": "Divisibility Rules",
    "Ratios and Proportions": "Linear Equations",
    "Order of Operations": "Basic Algebra",
    "Arithmetic Challenge": "Divisibility Rules",
    "Basic Arithmetic Formulas": "Basic Algebra",
    "Number Theory Notes": "Prime Numbers",
    "Set Theory Basics": "Prime Numbers",
    "Logic & Proof Techniques": "Geometric Proofs",
    "Graph Theory Concepts": "Systems of Equations",
    "Combinatorics Formulas": "Probability Distributions",
    "Pre-Algebra Basics": "Basic Algebra",
    "Trigonometry Explained": "Applications of Calculus",
    "Right Triangle Trigonometry": "Angles and Lines",
    "Unit Circle": "Angles and Lines",
    "Trigonometric Identities": "Angles and Lines",
    "Inverse Trig Functions": "Applications of Calculus",
    "Differential Equations": "Applications of Calculus",
    "Linear Algebra Guide": "Systems of Equations",
    "Discrete Math Summaries": "Modular Arithmetic"
};

// Dictionary of grammar/vocab lessons for all 24 topics
const grammarLessons = {
    "Nouns & Pronouns": {
        "category": "Parts of Speech",
        "definition": "A noun is a word that names a person, place, thing, or concept. Nouns operate as the foundational building blocks of sentences, serving primarily as grammatical subjects, direct/indirect objects, or objects of prepositions. They are categorized into Common (general classes like 'city') vs. Proper (specific, capitalized designations like 'London'), Concrete (perceived by senses like 'granite') vs. Abstract (intangible ideas or qualities like 'justice', 'perseverance'), and Countable vs. Uncountable (mass nouns like 'water' or 'information'). Pronouns are versatile function words that substitute for previously identified nouns (antecedents) to maintain syntactic variety and eliminate redundant repetition. Pronoun subclasses include Personal (I, you, they), Possessive (mine, hers, theirs), Demonstrative (this, those), Reflexive/Intensive (myself, themselves), and Relative (who, which, that).",
        "basicDefinition": "A noun is a naming word. It names a person (teacher), a place (school), a thing (pencil), or an idea (peace). A pronoun is a helper word that replaces a noun so you don't repeat the same name again and again (like using 'he', 'she', or 'it' instead of repeating 'Sam').",
        "breakdown": [
                {
                        "label": "Person, Place, Thing",
                        "text": "Names concrete physical items (astronaut, hospital, telescope) or abstract thoughts (liberty, happiness)."
                },
                {
                        "label": "Common vs. Proper",
                        "text": "Proper nouns name specific unique entities and must be capitalized (Mars, Shakespeare, Tuesday)."
                },
                {
                        "label": "Pronoun Antecedents",
                        "text": "A pronoun must always clearly agree in number and gender with the noun it replaces."
                }
        ],
        "example": "Standard Analysis: 'The dedicated <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">scientist</span> verified her <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">hypothesis</span> before <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">she</span> published <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">it</span>.' ('scientist' and 'hypothesis' are nouns; 'she' and 'it' are personal pronouns substituting for them).",
        "basicExample": "Simple Sentence: 'Maria loves books. <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">She</span> reads <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">them</span> every day at the <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">library</span>.'",
        "proTip": "Never leave an ambiguous pronoun reference. If a sentence has two people, such as 'When Emma met Chloe, she smiled,' it is unclear who 'she' refers to. Always name the person if confusion is possible.",
        "question": "Which word is a personal pronoun in: 'After the musicians tuned their instruments, they began the symphony.'?",
        "choices": [
                "musicians",
                "instruments",
                "they"
        ],
        "correctIndex": 2,
        "explanation": "'they' is a third-person personal pronoun replacing the plural noun 'musicians'.",
        "equations": [
            {
                "title": "Pronoun-Antecedent Concord Rule",
                "latex": "\\text{Antecedent}(N_{\\text{gender}, \\text{number}}) \\iff \\text{Pronoun}(P_{\\text{gender}, \\text{number}})",
                "note": "A pronoun must strictly agree with its antecedent in person (1st, 2nd, 3rd), number (singular, plural), and gender."
            },
            {
                "title": "Case System Inflection",
                "latex": "\\text{Subjective (Nominative)} \\xrightarrow{\\text{action}} \\text{Objective (Accusative)} \\xrightarrow{\\text{possession}} \\text{Possessive (Genitive)}",
                "note": "Example: He / She (subject) → Him / Her (direct/indirect object) → His / Hers (possessive marker)."
            },
            {
                "title": "Noun Phrase Architecture",
                "latex": "\\text{NP} = (\\text{Determiner}) + (\\text{Adjective Phrase}) + \\text{Noun (Head)} + (\\text{Prepositional / Relative Clause})",
                "note": "Constituent syntax structure showing how complex nominal phrases are assembled."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Pronoun-Antecedent Agreement and Reference Flow Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"30\" y=\"40\" width=\"150\" height=\"60\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"105\" y=\"65\" fill=\"#1e40af\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Antecedent Noun</text><text x=\"105\" y=\"85\" fill=\"#1e3a8a\" font-size=\"14\" font-weight=\"bold\" text-anchor=\"middle\">The Scientist</text><rect x=\"280\" y=\"40\" width=\"150\" height=\"60\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><text x=\"355\" y=\"65\" fill=\"#6b21a8\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Personal Pronoun</text><text x=\"355\" y=\"85\" fill=\"#581c87\" font-size=\"14\" font-weight=\"bold\" text-anchor=\"middle\">She / Her</text><path d=\"M 180 70 C 230 40, 230 40, 275 70\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><text x=\"230\" y=\"45\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Replaces &amp; Agrees</text><rect x=\"30\" y=\"125\" width=\"400\" height=\"55\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><text x=\"230\" y=\"145\" fill=\"#0f172a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Agreement Checks: Singular (Number) ✓ | Third-Person (Person) ✓ | Feminine (Gender) ✓</text><text x=\"230\" y=\"165\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Sentence: \"Before the scientist published the hypothesis, she verified it.\"</text></svg>",
        "diagramLabel": "Pronoun antecedent agreement flowchart",
        "diagramCaption": "Pronoun antecedent reference: The personal pronoun must seamlessly agree in gender, number, and person with the foundational noun it replaces.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of the conventions of standard English grammar and usage when writing or speaking.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Pronoun Agreement & Reference Guide", "desc": "Authoritative guide on preventing ambiguous pronoun references and pronoun cases.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/pronouns/pronoun_antecedent_agreement.html", "icon": "fas fa-university"},
            {"title": "Hesten's Learning Library: Master English Grammar Handbook", "desc": "Explore historical noun declensions and pronoun morphology.", "url": "/library/index.php?q=grammar", "icon": "fas fa-book"}
        ],
},
    "Verbs & Tenses": {
        "category": "Parts of Speech",
        "definition": "Verbs are the kinetic engine of grammar, expressing physical actions (accelerate, construct), cognitive states (comprehend, believe), occurrences (transpire, erupt), or states of being (is, seem, become). English verbs demonstrate three fundamental properties: Tense (temporal location: past, present, future), Aspect (temporal flow: simple, progressive/continuous, perfect, perfect-progressive), and Mood (indicative for facts, imperative for commands, subjunctive for hypothetical conditions). Modal auxiliary verbs (can, could, should, must, might) modify the lexical verb to express obligation, permission, certainty, or probability.",
        "basicDefinition": "A verb is an action or being word. It tells what someone does (run, think, jump) or how someone is (is, was, feels). Verbs change form depending on when the action happens: Past (already happened: 'walked'), Present (happening now: 'walks'), or Future (will happen: 'will walk').",
        "breakdown": [
                {
                        "label": "Action vs. Linking",
                        "text": "Action verbs depict physical or mental work; linking verbs connect the subject to a descriptive state (The soup tasted delicious)."
                },
                {
                        "label": "Tense & Aspect",
                        "text": "Combines past/present/future with simple (fact), continuous (-ing ongoing), and perfect (completed prior action)."
                },
                {
                        "label": "Auxiliary Verbs",
                        "text": "Helping verbs (is, have, do, will) partner with the main verb to indicate tense and mood."
                }
        ],
        "example": "Standard Analysis: 'By the time the shuttle <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">docked</span>, the crew <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">had been traveling</span> for fourteen days.' ('docked' is simple past; 'had been traveling' is past perfect progressive).",
        "basicExample": "Simple Sentence: 'Yesterday I <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">walked</span> to school. Today I <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">walk</span> with my sister. Tomorrow I <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">will walk</span> alone.'",
        "proTip": "Keep your verb tense consistent across a single paragraph or narrative. Do not switch abruptly between past and present unless the timeframe of events actually shifts.",
        "question": "What is the tense and aspect of the verb phrase in: 'By next June, we will have graduated from middle school.'?",
        "choices": [
                "Future Simple",
                "Future Perfect",
                "Present Perfect"
        ],
        "correctIndex": 1,
        "explanation": "'will have graduated' indicates an action that will be completed prior to a definite future milestone (Future Perfect).",
        "equations": [
            {
                "title": "English Verb Tense Matrix",
                "latex": "\\text{Verb Formulation} = \\text{Tense (Past / Present / Future)} \\times \\text{Aspect (Simple / Continuous / Perfect / Perfect-Cont)}",
                "note": "Produces the 12 canonical English tense-aspect combinations."
            },
            {
                "title": "Perfect Aspect Architecture",
                "latex": "\\text{Present Perfect} = [\\text{have / has}] + V_3 \\quad \\text{and} \\quad \\text{Past Perfect} = [\\text{had}] + V_3",
                "note": "Connects prior completed actions ($V_3$ past participle) to a subsequent point in time."
            },
            {
                "title": "Passive Voice Transformation",
                "latex": "\\text{Subject}_{\\text{agent}} + V_{\\text{transitive}} + \\text{Object} \\implies \\text{Object} + [\\text{be}] + V_3 + (\\text{by } \\text{Subject}_{\\text{agent}})",
                "note": "Syntactic passive transformation focusing on the recipient of the action."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Verb Tense Chronological Timeline Matrix\"><line x1=\"30\" y1=\"100\" x2=\"430\" y2=\"100\" stroke=\"#64748b\" stroke-width=\"3\" stroke-linecap=\"round\"/><line x1=\"230\" y1=\"65\" x2=\"230\" y2=\"135\" stroke=\"#0284c7\" stroke-width=\"3.5\"/><circle cx=\"230\" cy=\"100\" r=\"6\" fill=\"#0284c7\"/><text x=\"230\" y=\"52\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">NOW (Present)</text><text x=\"230\" y=\"150\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">I walk</text><line x1=\"100\" y1=\"75\" x2=\"100\" y2=\"125\" stroke=\"#64748b\" stroke-width=\"2\"/><text x=\"100\" y=\"65\" fill=\"#475569\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">PAST</text><text x=\"100\" y=\"150\" fill=\"#475569\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">I walked</text><line x1=\"360\" y1=\"75\" x2=\"360\" y2=\"125\" stroke=\"#64748b\" stroke-width=\"2\"/><text x=\"360\" y=\"65\" fill=\"#475569\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">FUTURE</text><text x=\"360\" y=\"150\" fill=\"#475569\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">I will walk</text><path d=\"M 40 100 C 60 70, 75 70, 95 100\" fill=\"none\" stroke=\"#ef4444\" stroke-width=\"2.5\"/><circle cx=\"50\" cy=\"95\" r=\"4\" fill=\"#ef4444\"/><text x=\"55\" y=\"60\" fill=\"#ef4444\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Past Perfect (had walked)</text><path d=\"M 235 100 C 280 70, 310 70, 355 100\" fill=\"none\" stroke=\"#10b981\" stroke-width=\"2.5\"/><text x=\"295\" y=\"60\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Future Perfect (will have walked)</text></svg>",
        "diagramLabel": "Chronological verb tense timeline diagram",
        "diagramCaption": "Verb tense timeline: Depicts relative temporal sequence across simple, past perfect (event before past event), and future perfect (event before future milestone).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1.D", "desc": "Recognize and correct inappropriate shifts in verb voice and tense across paragraphs.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Verb Tense Consistency & Aspect", "desc": "Complete master charts covering simple, continuous, and perfect progressive verb phrases.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/verb_tenses/verb_tense_consistency.html", "icon": "fas fa-university"},
            {"title": "Cambridge Dictionary Grammar: Verb Moods & Conditionals", "desc": "Clear rules on indicative, subjunctive, and modal conditional structures.", "url": "https://dictionary.cambridge.org/grammar/british-grammar/verbs", "icon": "fas fa-spell-check"}
        ],
},
    "Adjectives & Adverbs": {
        "category": "Parts of Speech",
        "definition": "Modifiers enrich narrative detail by shaping and qualifying meaning. Adjectives modify nouns or pronouns, answering: 'Which one?' (the penultimate draft), 'What kind?' (an obsidian artifact), or 'How many?' (several, myriad). Comparative and superlative adjectives rank quality across elements (-er/-est, more/most). Adverbs modify verbs, adjectives, or other adverbs, specifying 'How?' (stealthily), 'When?' (subsequently), 'Where?' (nearby), or 'To what degree/intensity?' (exceptionally, barely). While many manner adverbs take the derivational suffix '-ly', degree adverbs (very, quite, too) and irregular adverbs (fast, well, hard) function identically without suffixation.",
        "basicDefinition": "Adjectives and adverbs are describing words. Adjectives describe nouns (telling what kind, which one, or how many, like 'big dog' or 'blue sky'). Adverbs describe verbs, telling how, when, where, or how much an action is done (like 'ran quickly' or 'walked slowly').",
        "breakdown": [
                {
                        "label": "Adjectives (Noun Describers)",
                        "text": "Supply sensory, qualitative, and numerical properties to people, places, and objects."
                },
                {
                        "label": "Adverbs (Verb/Modifier Describers)",
                        "text": "Explain manner, frequency, time, or intensity (-ly words, plus words like 'often', 'very', 'fast')."
                },
                {
                        "label": "Degrees of Comparison",
                        "text": "Positive (tall), Comparative (taller/more graceful), Superlative (tallest/most graceful)."
                }
        ],
        "example": "Standard Analysis: 'The <span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">diligent</span> archaeologist <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">meticulously</span> uncovered a <span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">fragile</span> fossil.' ('diligent' and 'fragile' are adjectives; 'meticulously' is an adverb).",
        "basicExample": "Simple Sentence: 'The <span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">fast</span> runner ran <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">very</span> <span class=\"example-breakdown-tag\" style=\"background:#f3e8ff; color:#6b21a8;\">quickly</span> across the <span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">green</span> grass.'",
        "proTip": "Beware of good vs. well: 'Good' is an adjective modifying nouns ('She is a good writer'). 'Well' is an adverb modifying actions ('She writes well'), except when referring directly to physical health ('I feel well').",
        "question": "Identify the adverb that modifies another adverb in: 'The locomotive climbed quite slowly up the steep grade.'",
        "choices": [
                "quite",
                "slowly",
                "steep"
        ],
        "correctIndex": 0,
        "explanation": "'slowly' is an adverb modifying 'climbed'. 'quite' is an intensifying adverb modifying the adverb 'slowly'.",
        "equations": [
            {
                "title": "Degrees of Comparison Inflection",
                "latex": "\\text{Positive} \\xrightarrow{+ \\text{-er / more}} \\text{Comparative} \\xrightarrow{+ \\text{-est / most}} \\text{Superlative}",
                "note": "Monosyllabic uses suffixes (-er/-est); polysyllabic modifiers use 'more' and 'most'."
            },
            {
                "title": "Royal Order of Cumulative Adjectives",
                "latex": "\\text{Determiner} \\to \\text{Opinion} \\to \\text{Size} \\to \\text{Physical Quality} \\to \\text{Shape} \\to \\text{Age} \\to \\text{Color} \\to \\text{Origin} \\to \\text{Material} \\to \\text{Purpose} \\to \\text{Noun}",
                "note": "Example: 'A lovely (opinion) small (size) antique (age) French (origin) silver (material) pocket (purpose) watch.'"
            },
            {
                "title": "Adverbial Modification Scope",
                "latex": "\\text{Adverb} \\to \\begin{cases} \\text{Verb} & (\\text{He spoke \\textbf{eloquently}}) \\ \\text{Adjective} & (\\text{An \\textbf{exceptionally} gifted artist}) \\ \\text{Another Adverb} & (\\text{She climbed \\textbf{quite} slowly}) \\end{cases}",
                "note": "Adverbs specify manner, time, frequency, location, and degree."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Order of Cumulative Adjectives Hierarchy\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"40\" width=\"65\" height=\"40\" rx=\"4\" fill=\"#dbeafe\"/><text x=\"57\" y=\"65\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. Opinion</text><rect x=\"95\" y=\"40\" width=\"50\" height=\"40\" rx=\"4\" fill=\"#e0e7ff\"/><text x=\"120\" y=\"65\" fill=\"#3730a3\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. Size</text><rect x=\"150\" y=\"40\" width=\"50\" height=\"40\" rx=\"4\" fill=\"#fef3c7\"/><text x=\"175\" y=\"65\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. Age</text><rect x=\"205\" y=\"40\" width=\"55\" height=\"40\" rx=\"4\" fill=\"#fce7f3\"/><text x=\"232\" y=\"65\" fill=\"#9d174d\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">4. Shape</text><rect x=\"265\" y=\"40\" width=\"55\" height=\"40\" rx=\"4\" fill=\"#dcfce7\"/><text x=\"292\" y=\"65\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">5. Color</text><rect x=\"325\" y=\"40\" width=\"55\" height=\"40\" rx=\"4\" fill=\"#ffedd5\"/><text x=\"352\" y=\"65\" fill=\"#9a3412\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">6. Origin</text><rect x=\"385\" y=\"40\" width=\"55\" height=\"40\" rx=\"4\" fill=\"#0284c7\"/><text x=\"412\" y=\"65\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">NOUN</text><path d=\"M 57 85 L 412 85\" stroke=\"#64748b\" stroke-width=\"2\" marker-end=\"url(#arrow)\"/><text x=\"230\" y=\"105\" fill=\"#64748b\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Strict Natural English Order of Modification</text><rect x=\"25\" y=\"125\" width=\"415\" height=\"50\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><text x=\"230\" y=\"145\" fill=\"#0f172a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Example: \"The charming (1) tiny (2) ancient (3) round (4) silver (6) coin\" ✓</text><text x=\"230\" y=\"162\" fill=\"#ef4444\" font-size=\"10\" text-anchor=\"middle\">Avoid: \"The silver ancient charming coin\" (violates cumulative adjective order)</text></svg>",
        "diagramLabel": "Order of cumulative adjectives hierarchy chart",
        "diagramCaption": "The Royal Order of Adjectives: Natural native English syntax dictates exact ordering of cumulative modifiers prior to the head noun.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.7.1.C", "desc": "Place phrases and clauses within a sentence, recognizing and correcting misplaced and dangling modifiers.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Adjective Order & Modification", "desc": "Complete reference manual on cumulative vs. coordinate adjectives and comma usage.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/adjectives/index.html", "icon": "fas fa-feather-alt"},
            {"title": "British Council: Adverbs & Degrees of Comparison", "desc": "Interactive exercises on manner, degree, and comparative inflection.", "url": "https://learnenglish.britishcouncil.org/grammar/english-grammar-reference/adjectives-and-adverbs", "icon": "fas fa-graduation-cap"}
        ],
},
    "Prepositions & Conjunctions": {
        "category": "Parts of Speech",
        "definition": "Prepositions and conjunctions provide structural glue and syntactic scaffolding. Prepositions establish spatial (above, beneath), temporal (during, prior to), or logical (despite, regarding) relationships between their nominal object and the rest of the clause, forming prepositional phrases that act adjectivally or adverbially. Conjunctions link words, phrases, or clauses. Coordinating conjunctions (FANBOYS: for, and, nor, but, or, yet, so) unite grammatically equal units. Subordinating conjunctions (although, because, whereas, if, since) subordinate an entire clause, transforming it into a dependent adverbial modifier. Correlative conjunctions (either/or, neither/nor, not only/but also) operate in mutually dependent pairs.",
        "basicDefinition": "Prepositions are position and time words (like 'on', 'in', 'under', 'before'). They show where or when something happens. Conjunctions are joining words (like 'and', 'but', 'because', 'so'). They connect words or sentences together like glue.",
        "breakdown": [
                {
                        "label": "Prepositional Phrases",
                        "text": "Consists of preposition + optional modifiers + object noun (e.g. 'under the wooden bridge')."
                },
                {
                        "label": "FANBOYS (Coordinating)",
                        "text": "For, And, Nor, But, Or, Yet, So — join equal clauses or equal sentence parts."
                },
                {
                        "label": "Subordinating Conjunctions",
                        "text": "Words like 'because', 'although', 'when', 'if' — turn complete thoughts into dependent causes or conditions."
                }
        ],
        "example": "Standard Analysis: '<span class=\"example-breakdown-tag\" style=\"background:#ccfbf1; color:#115e59;\">During</span> the blizzard, we stayed <span class=\"example-breakdown-tag\" style=\"background:#ccfbf1; color:#115e59;\">inside</span> the cabin <span class=\"example-breakdown-tag\" style=\"background:#ffe4e6; color:#9f1239;\">because</span> the roads were closed, <span class=\"example-breakdown-tag\" style=\"background:#ffe4e6; color:#9f1239;\">but</span> we remained cheerful.'",
        "basicExample": "Simple Sentence: 'The cat slept <span class=\"example-breakdown-tag\" style=\"background:#ccfbf1; color:#115e59;\">under</span> the bed <span class=\"example-breakdown-tag\" style=\"background:#ffe4e6; color:#9f1239;\">and</span> the dog slept <span class=\"example-breakdown-tag\" style=\"background:#ccfbf1; color:#115e59;\">near</span> the door.'",
        "proTip": "When joining two complete independent clauses with a coordinating conjunction (FANBOYS), always place a comma before the conjunction: 'I wanted to go, but it rained.'",
        "question": "In the sentence: 'We cancelled the picnic because it rained, but we watched movies inside,' what types of conjunctions are used?",
        "choices": [
                "'because' is subordinating; 'but' is coordinating",
                "'because' is coordinating; 'but' is subordinating",
                "Both are coordinating conjunctions"
        ],
        "correctIndex": 0,
        "explanation": "'because' creates a dependent causal clause (subordinating), while 'but' connects two equal independent clauses (coordinating).",
        "equations": [
            {
                "title": "Prepositional Phrase Syntax",
                "latex": "\\text{PP} = \\text{Preposition} + (\\text{Determiner / Modifiers}) + \\text{Object of Preposition} (\\text{Noun / Pronoun in Objective Case})",
                "note": "Example: '[Under] the heavy [bridge]' or '[Between] you and [me]' (not 'you and I')."
            },
            {
                "title": "Compound Sentence Joining Formula",
                "latex": "\\text{Independent Clause}_1 + \\text{Comma (,)} + \\text{FANBOYS Conjunction} + \\text{Independent Clause}_2",
                "note": "For, And, Nor, But, Or, Yet, So — coordinates two complete independent propositions."
            },
            {
                "title": "Subordinate Conditional Clause Order",
                "latex": "\\begin{cases} \\text{Subordinating Conjunction} + \\text{Clause} + \\text{Comma (,)} + \\text{Independent Clause} \\ \\text{Independent Clause} + \\text{Subordinating Conjunction} + \\text{Clause} \; (\\text{No comma}) \\end{cases}",
                "note": "'Because it rained, we stayed inside' vs. 'We stayed inside because it rained.'"
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Compound vs Complex Conjunction Scaffolding Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"30\" y=\"30\" width=\"160\" height=\"50\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"110\" y=\"52\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Independent Clause 1</text><text x=\"110\" y=\"68\" fill=\"#1e3a8a\" font-size=\"11\" text-anchor=\"middle\">\"The bell rang\"</text><rect x=\"270\" y=\"30\" width=\"160\" height=\"50\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"350\" y=\"52\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Independent Clause 2</text><text x=\"350\" y=\"68\" fill=\"#1e3a8a\" font-size=\"11\" text-anchor=\"middle\">\"students cheered\"</text><circle cx=\"230\" cy=\"55\" r=\"18\" fill=\"#10b981\"/><text x=\"230\" y=\"59\" fill=\"#ffffff\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">, and</text><rect x=\"30\" y=\"105\" width=\"400\" height=\"75\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><text x=\"230\" y=\"125\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Coordinating Conjunctions: FANBOYS</text><text x=\"230\" y=\"145\" fill=\"#475569\" font-size=\"11\" text-anchor=\"middle\">For • And • Nor • But • Or • Yet • So</text><text x=\"230\" y=\"165\" fill=\"#b45309\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Rule: Always place a comma before the FANBOYS conjunction when connecting complete clauses.</text></svg>",
        "diagramLabel": "Conjunction sentence combining scaffolding diagram",
        "diagramCaption": "Syntactic conjunction mechanics: The comma + FANBOYS coordinating conjunction unites two grammatically balanced independent clauses.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1.A", "desc": "Explain the function of verbals, gerunds, participles, prepositions, and conjunctions in general and their function in particular sentences.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Coordinating & Subordinating Conjunctions", "desc": "Complete punctuation guidelines for joining compound and complex sentence structures.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/conjunctions/index.html", "icon": "fas fa-link"},
            {"title": "Hesten's Learning Library: Clause Scaffolding & Syntax", "desc": "Prepositional phrases, adverbial clauses, and transitional discourse markers.", "url": "/library/index.php?q=syntax", "icon": "fas fa-book"}
        ],
},
    "Interjections & Articles": {
        "category": "Parts of Speech",
        "definition": "Interjections are expressive lexical tokens that convey sudden affective states, surprise, hesitation, or emphasis (e.g., 'Aha!', 'Alas!', 'Ouch!'). Operating independently of the clause's predicate syntax, they are set off by exclamation points for intense emotion or by commas for mild reactions. Articles are fundamental determiners that regulate reference specificity. The Definite Article ('the') designates a specific, contextualized, or previously introduced noun. The Indefinite Articles ('a' and 'an') denote non-specific, singular count nouns. Selection between 'a' and 'an' is governed strictly by the initial phonetic sound of the subsequent word, not the orthographic spelling (e.g., 'a historic event', 'an honest mistake', 'a European voyage').",
        "basicDefinition": "Interjections are emotion words that show surprise or feeling (like 'Wow!', 'Oh no!', or 'Yay!'). Articles are small helper words: 'the' points to a specific thing ('the red book'), while 'a' and 'an' refer to any general thing ('a book', 'an apple').",
        "breakdown": [
                {
                        "label": "Interjections",
                        "text": "Show sudden emotion. Use exclamation point for strong feeling; use a comma for mild reaction."
                },
                {
                        "label": "Definite ('The')",
                        "text": "Points to one specific item that the speaker and listener already know."
                },
                {
                        "label": "Indefinite ('A' vs 'An')",
                        "text": "Use 'a' before consonant sounds (a dog, a university); use 'an' before vowel sounds (an apple, an hour)."
                }
        ],
        "example": "Standard Analysis: '<span class=\"example-breakdown-tag\" style=\"background:#fef08a; color:#854d0e;\">Aha!</span> <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">An</span> unexpected clue revealed <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">the</span> culprit's identity.' ('Aha' is an interjection; 'An' and 'the' are articles).",
        "basicExample": "Simple Sentence: '<span class=\"example-breakdown-tag\" style=\"background:#fef08a; color:#854d0e;\">Wow!</span> Look at <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">the</span> rainbow behind <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">a</span> big cloud.'",
        "proTip": "Choose 'a' or 'an' based on sound, not the letter! Words starting with a silent 'h' take 'an' ('an hour', 'an heir'). Words starting with a 'u' that sounds like 'you' take 'a' ('a uniform', 'a unicorn').",
        "question": "Choose the sentence that uses articles correctly according to phonetic pronunciation rules.",
        "choices": [
                "He bought an unique historic manuscript.",
                "He bought a unique historic manuscript.",
                "He bought an umbrella and an historic book."
        ],
        "correctIndex": 1,
        "explanation": "'unique' begins with the consonant sound /j/ ('yoo-neek'), so it takes 'a', not 'an'.",
        "equations": [
            {
                "title": "Phonetic Selection Rule for Articles",
                "latex": "\\text{Article} = \\begin{cases} \\text{'a'} & \\text{before initial consonant SOUND: } /p, b, t, d, k, g, j, w\\dots/ \\ \\text{'an'} & \\text{before initial vowel SOUND: } /\\ae, \\varepsilon, \\iota, \\alpha, \\Lambda\\dots/ \\end{cases}",
                "note": "Governed by phonetics, not typography: 'a European' (/j/ sound) vs. 'an hour' (silent 'h')."
            },
            {
                "title": "Definiteness & Context Reference",
                "latex": "\\text{Definite ('the')} \\implies \\text{Specific / Discourse-Active} \\quad \\text{vs.} \\quad \\text{Indefinite ('a / an')} \\implies \\text{Non-Specific / New Entity}",
                "note": "'The' refers to known/shared context; 'a/an' introduces an unspecific member of a class."
            },
            {
                "title": "Interjection Punctuation Syntax",
                "latex": "\\text{Strong Emotion} \\implies [\\text{Interjection}!] + \\text{Clause.} \\quad \\text{vs.} \\quad \\text{Mild Reaction} \\implies [\\text{Interjection},] + \\text{Clause.}",
                "note": "'Ouch! That hurt.' (exclamation point) vs. 'Well, let us see what happens.' (comma)."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Article phonetic selection decision tree\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"160\" y=\"20\" width=\"140\" height=\"40\" rx=\"6\" fill=\"#0284c7\"/><text x=\"230\" y=\"45\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Initial Sound of Word</text><line x1=\"200\" y1=\"60\" x2=\"120\" y2=\"90\" stroke=\"#64748b\" stroke-width=\"2\"/><line x1=\"260\" y1=\"60\" x2=\"340\" y2=\"90\" stroke=\"#64748b\" stroke-width=\"2\"/><rect x=\"50\" y=\"90\" width=\"140\" height=\"45\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"120\" y=\"110\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Consonant Sound</text><text x=\"120\" y=\"126\" fill=\"#1e3a8a\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">Use \"a\"</text><rect x=\"270\" y=\"90\" width=\"140\" height=\"45\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"340\" y=\"110\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Vowel Sound</text><text x=\"340\" y=\"126\" fill=\"#78350f\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">Use \"an\"</text><rect x=\"30\" y=\"145\" width=\"400\" height=\"45\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1\"/><text x=\"120\" y=\"168\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">a university, a historic, a user</text><text x=\"340\" y=\"168\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">an hour, an apple, an heirloom</text></svg>",
        "diagramLabel": "Phonetic sound decision tree for a vs an",
        "diagramCaption": "Phonetic selection: Choose 'a' vs. 'an' based on the spoken acoustic sound following the article, not the written letter.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of the conventions of standard English grammar and determiners.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Merriam-Webster: How to Choose 'A' or 'An' Before Words", "desc": "Authoritative guide on phonetic historic usage, silent letters, and vocalic initialisms.", "url": "https://www.merriam-webster.com/grammar/is-it-a-or-an", "icon": "fas fa-book-reader"},
            {"title": "Purdue OWL: How to Use Articles (A/An/The)", "desc": "Detailed counts and non-count article exercises for scholars and ESL learners.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/using_articles.html", "icon": "fas fa-graduation-cap"}
        ],
},
    "Comma Usage": {
        "category": "Punctuation Rules",
        "definition": "Commas are precision pacing markers that clarify syntactic boundaries and prevent misreading. Key academic comma conventions include: (1) Oxford/Serial Comma separating items in a series of three or more; (2) Introductory Clause Separation isolating dependent phrases, participial phrases, or transitional adverbs; (3) Compound Sentence Coordination preceding a FANBOYS conjunction connecting two independent clauses; (4) Non-Restrictive/Appositive Cladding setting off non-essential parenthetical commentary with balanced comma pairs; and (5) Direct Address and Tag Question isolation.",
        "basicDefinition": "A comma (,) tells the reader to take a small breath or pause. You use commas to separate items in a list (apples, oranges, and bananas), to join two sentences with words like 'and' or 'but', and after starting a sentence with a clue phrase ('In the morning, we left').",
        "breakdown": [
                {
                        "label": "Items in a List",
                        "text": "Separate 3 or more words with commas, including the serial (Oxford) comma before 'and'."
                },
                {
                        "label": "Introductory Phrases",
                        "text": "Place a comma after a starting phrase before the main sentence begins."
                },
                {
                        "label": "Two Sentences Joined",
                        "text": "Use a comma before coordinating conjunctions (FANBOYS) joining complete thoughts."
                }
        ],
        "example": "Standard Analysis: 'Although the storm intensified, the captain, who possessed thirty years of experience, steered the vessel safely into port.' (Introductory clause comma + parenthetical non-restrictive clause commas).",
        "basicExample": "Simple Sentence: 'Yesterday, my mom bought apples, bananas, and oranges at the grocery store.'",
        "proTip": "Avoid the Comma Splice! Never join two complete standalone sentences with only a comma. Use a comma + coordinating conjunction, a semicolon, or a period.",
        "question": "Which sentence punctuates an introductory clause and series correctly?",
        "choices": [
                "Before starting the exam, students sharpened pencils, checked calculators and grabbed erasers.",
                "Before starting the exam, students sharpened pencils, checked calculators, and grabbed erasers.",
                "Before starting the exam students sharpened pencils, checked calculators, and grabbed erasers."
        ],
        "correctIndex": 1,
        "explanation": "Contains both the comma after the introductory clause ('Before starting the exam,') and serial commas separating the three parallel actions.",
        "equations": [
            {
                "title": "Serial / Oxford Comma Formula",
                "latex": "\\text{List} = X, \\; Y, \\; \\text{and } Z \\quad (\\text{Oxford Comma precedes coordinating conjunction})",
                "note": "Prevents semantic ambiguity, e.g., 'To my parents, Ayn Rand and God' vs. 'To my parents, Ayn Rand, and God'."
            },
            {
                "title": "Introductory Dependent Clause Order",
                "latex": "\\text{Introductory Clause / Participial Phrase} + \\text{Comma (,)} + \\text{Independent Clause}",
                "note": "Example: 'Although the storm was severe, the crew docked safely.' Isolates dependent modifiers before the main subject."
            },
            {
                "title": "Non-Restrictive Appositive Cladding",
                "latex": "\\text{Main Subject} + \\text{Comma (,)} + \\text{Non-Essential Appositive} + \\text{Comma (,)} + \\text{Predicate}",
                "note": "'Saturn, the ringed planet, has over eighty moons.' Information can be excised without altering clause validity."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Four Core Academic Comma Rules Flowchart\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"117\" y=\"47\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. Oxford / Serial Comma</text><text x=\"117\" y=\"68\" fill=\"#1e3a8a\" font-size=\"11\" text-anchor=\"middle\">pens, paper, and pencils ✓</text><rect x=\"245\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#e0e7ff\" stroke=\"#3730a3\" stroke-width=\"1.5\"/><text x=\"342\" y=\"47\" fill=\"#3730a3\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. Introductory Clauses</text><text x=\"342\" y=\"68\" fill=\"#312e81\" font-size=\"11\" text-anchor=\"middle\">After the lecture, we left. ✓</text><rect x=\"20\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"117\" y=\"127\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. Compound (FANBOYS)</text><text x=\"117\" y=\"148\" fill=\"#14532d\" font-size=\"11\" text-anchor=\"middle\">He spoke, but no one listened. ✓</text><rect x=\"245\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"342\" y=\"127\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">4. Non-Essential Appositive</text><text x=\"342\" y=\"148\" fill=\"#78350f\" font-size=\"11\" text-anchor=\"middle\">Paris, the capital, is busy. ✓</text><line x1=\"230\" y1=\"20\" x2=\"230\" y2=\"180\" stroke=\"#cbd5e1\" stroke-width=\"1.5\" stroke-dasharray=\"4 4\"/></svg>",
        "diagramLabel": "The four core academic comma rules flowchart",
        "diagramCaption": "Academic comma quadrants: Oxford series separation, introductory modifiers, compound clause FANBOYS coordination, and appositive cladding.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.2.A", "desc": "Use punctuation (comma, ellipsis, dash) to indicate a pause or break in standard English.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Comprehensive Rules for Using Commas", "desc": "Detailed rules on comma splices, non-restrictive clauses, coordinate adjectives, and introductory phrases.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/commas/extended_rules_for_commas.html", "icon": "fas fa-university"},
            {"title": "Hesten's Learning Library: Master Punctuation Guide", "desc": "Interactive exercises on Oxford commas, appositives, and compound sentence rhythm.", "url": "/library/index.php?q=punctuation", "icon": "fas fa-book"}
        ],
},
    "Semicolons & Colons": {
        "category": "Punctuation Rules",
        "definition": "Semicolons and colons elevate syntactic sophistication by signaling logical transitions between independent thoughts. A semicolon (;) links two independent clauses possessing balanced semantic weight without a coordinating conjunction (e.g., 'The thesis was sound; the methodology was flawed'). Semicolons are also used in complex series where list items contain internal commas. A colon (:) serves as a formal herald or gatekeeper, introducing an illustrative list, an elaboration, an appositive summary, or an extended block quote. A colon must always be preceded by a grammatically complete independent clause.",
        "basicDefinition": "A semicolon (;) connects two complete sentences that are closely related without using words like 'and'. A colon (:) introduces a list, an explanation, or a quote, but the words before the colon must be a complete sentence.",
        "breakdown": [
                {
                        "label": "Semicolon for Clauses",
                        "text": "Joins two full thoughts that belong together (Sentence A; Sentence B)."
                },
                {
                        "label": "Semicolon for Complex Lists",
                        "text": "Separates cities or list items that already have commas inside them."
                },
                {
                        "label": "Colon Gatekeeper",
                        "text": "Must follow a complete sentence and introduces what comes next (list, quote, explanation)."
                }
        ],
        "example": "Standard Analysis: 'The expedition encountered three major obstacles: subzero temperatures, dwindling rations, and treacherous terrain; however, they persevered.'",
        "basicExample": "Simple Sentence: 'I brought three items to school: a notebook, a pencil, and a ruler.'",
        "proTip": "Never place a colon directly after a verb or preposition! Incorrect: 'My favorite colors are: blue and red.' Correct: 'I have two favorite colors: blue and red.'",
        "question": "Which sentence utilizes the colon correctly?",
        "choices": [
                "The ingredients you need are: flour, sugar, and cocoa.",
                "You will need three key ingredients: flour, sugar, and cocoa.",
                "You will need: flour, sugar, and cocoa."
        ],
        "correctIndex": 1,
        "explanation": "'You will need three key ingredients' is a complete independent clause, satisfying the strict rule for colon placement.",
        "equations": [
            {
                "title": "Semicolon Independent Balance",
                "latex": "\\text{Independent Clause}_1 \\;\\mathbf{;}\\; \\text{Independent Clause}_2 \\quad (\\text{Equal syntactic weight, no conjunction})",
                "note": "Connects two intimate independent propositions without a conjunction, eliminating comma splices."
            },
            {
                "title": "Conjunctive Adverb Transition Formula",
                "latex": "\\text{Clause}_1 \\;\\mathbf{;}\\; \\text{Conjunctive Adverb (however, therefore, consequently)} + \\text{Comma (,)} + \\text{Clause}_2",
                "note": "Example: 'The hypothesis was sound; however, the laboratory apparatus malfunctioned.'"
            },
            {
                "title": "Colon Formal Gatekeeper Rule",
                "latex": "\\text{Complete Independent Clause} \\;\\mathbf{:}\\; \\begin{cases} \\text{Itemized List / Series} \\ \\text{Explanatory Elaboration} \\ \\text{Formal Quotation} \\end{cases}",
                "note": "A colon must be preceded by a grammatically complete clause; never place a colon after a bare verb or preposition."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Semicolon Balance vs Colon Gatekeeper Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"30\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"2\"/><text x=\"122\" y=\"55\" fill=\"#0284c7\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">SEMICOLON ( ; )</text><text x=\"122\" y=\"75\" fill=\"#475569\" font-size=\"11\" text-anchor=\"middle\">Equal Clause Equilibrium</text><line x1=\"50\" y1=\"115\" x2=\"195\" y2=\"115\" stroke=\"#0284c7\" stroke-width=\"3\"/><circle cx=\"122\" cy=\"115\" r=\"14\" fill=\"#0284c7\"/><text x=\"122\" y=\"120\" fill=\"#ffffff\" font-size=\"16\" font-weight=\"bold\" text-anchor=\"middle\">;</text><text x=\"70\" y=\"105\" fill=\"#1e293b\" font-size=\"10\" font-weight=\"bold\">Clause 1</text><text x=\"150\" y=\"105\" fill=\"#1e293b\" font-size=\"10\" font-weight=\"bold\">Clause 2</text><text x=\"122\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Both sides stand alone ✓</text><rect x=\"240\" y=\"30\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"2\"/><text x=\"337\" y=\"55\" fill=\"#10b981\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">COLON ( : )</text><text x=\"337\" y=\"75\" fill=\"#475569\" font-size=\"11\" text-anchor=\"middle\">The Gatekeeper Rule</text><rect x=\"255\" y=\"95\" width=\"165\" height=\"30\" rx=\"4\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1\"/><text x=\"337\" y=\"114\" fill=\"#1e40af\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Full Independent Sentence</text><text x=\"337\" y=\"142\" fill=\"#047857\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">:</text><text x=\"337\" y=\"162\" fill=\"#047857\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">List • Quote • Elaboration</text></svg>",
        "diagramLabel": "Semicolon balance vs colon gatekeeper comparison diagram",
        "diagramCaption": "Semicolon balance vs. colon gatekeeper: The semicolon balances two equal complete propositions; the colon follows a complete thought to open an elaboration.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.9-10.2.A", "desc": "Use a semicolon with an adverbial connector to link closely related independent clauses.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Semicolons, Colons, and Quotations", "desc": "Authoritative guide on avoiding colon errors and capitalizing post-colon independent clauses.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/punctuation/colons.html", "icon": "fas fa-university"},
            {"title": "Grammarly Academic: Semicolon vs. Colon Nuances", "desc": "Clear diagnostic distinctions and interactive series examples.", "url": "https://www.grammarly.com/blog/semicolon-vs-colon/", "icon": "fas fa-pen-nib"}
        ],
},
    "Apostrophes & Quotation Marks": {
        "category": "Punctuation Rules",
        "definition": "Apostrophes signal either genitive possession or phonological omission (contractions). For singular nouns, append 's (the teacher's desk). For regular plurals ending in -s, append only the apostrophe (the teachers' lounge). For irregular plurals not ending in -s, append 's (the children's books). In contractions, the apostrophe marks the exact position of omitted letters (don't = do not; it's = it is). Quotation marks enclose verbatim dialogue, quoted text, or titles of short works (poems, articles, short stories). In American typographical convention, periods and commas reside inside the quotation marks, whereas semicolons and colons remain outside.",
        "basicDefinition": "An apostrophe (') shows ownership (who owns something, like 'Sarah's book') or takes the place of missing letters in contractions (like 'can't' for 'cannot'). Quotation marks (\" \") show the exact words that someone said out loud.",
        "breakdown": [
                {
                        "label": "Singular Possession",
                        "text": "Add 's (dog's toy = toy belonging to one dog)."
                },
                {
                        "label": "Plural Possession",
                        "text": "Add just ' after the s (dogs' toys = toys belonging to many dogs)."
                },
                {
                        "label": "Dialogue Quotations",
                        "text": "Put quotation marks around spoken words. Keep periods and commas inside the quotes."
                }
        ],
        "example": "Standard Analysis: '\"The scientists' findings are conclusive,\" announced the lead researcher, \"so we won't delay publication.\"'",
        "basicExample": "Simple Sentence: '\"I found Leo's jacket in the gym,\" said Maya.'",
        "proTip": "Beware of its vs. it's: 'It's' always means 'it is' or 'it has'. 'Its' is the possessive form showing ownership ('The dog wagged its tail'). Possessive pronouns never take apostrophes!",
        "question": "Choose the sentence with correct quotation and possession punctuation.",
        "choices": [
                "\"The childrens' toys are outside\", said Mom.",
                "\"The children's toys are outside,\" said Mom.",
                "\"The children's toys are outside\", said Mom."
        ],
        "correctIndex": 1,
        "explanation": "'children' is an irregular plural, so its possessive is 'children's'. The comma correctly sits inside the closing quote.",
        "equations": [
            {
                "title": "Genitive Possession Inflection Formula",
                "latex": "\\text{Possessive} = \\begin{cases} \\text{Noun}_{\\text{singular}} + \\text{'s} & (\\text{the student's locker}) \\ \\text{Noun}_{\\text{plural in -s}} + \\text{'} & (\\text{the students' lockers}) \\ \\text{Noun}_{\\text{irregular plural}} + \\text{'s} & (\\text{the children's museum}) \\end{cases}",
                "note": "Regular plurals ending in -s receive only an apostrophe; irregular plurals lacking -s append 's."
            },
            {
                "title": "Contraction vs. Possessive Invariance",
                "latex": "\\text{It's} = [\\text{It is / It has}] \\quad \\not\\equiv \\quad \\text{Its} = \\text{Possessive pronoun (Zero apostrophe)}",
                "note": "Possessive pronouns (its, hers, his, theirs, ours, whose) never take apostrophes."
            },
            {
                "title": "American Dialogue Punctuation Syntax",
                "latex": "\\text{\"Quoted Speech}\\mathbf{,}\\text{\"} + \\text{Attribution Verb} \\quad \\text{and} \\quad \\text{\"Quoted Sentence}\\mathbf{.}\\text{\"}",
                "note": "In standard American typography, periods and commas strictly nest inside quotation marks."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Apostrophe Ownership and Quotation Placement Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"30\" width=\"195\" height=\"60\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"122\" y=\"52\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Singular Noun: Add 's</text><text x=\"122\" y=\"72\" fill=\"#1e3a8a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">The dog's collar (1 dog)</text><rect x=\"240\" y=\"30\" width=\"195\" height=\"60\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"337\" y=\"52\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Plural in -s: Add just '</text><text x=\"337\" y=\"72\" fill=\"#581c87\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">The dogs' park (many dogs)</text><rect x=\"25\" y=\"105\" width=\"410\" height=\"75\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><text x=\"230\" y=\"127\" fill=\"#0f172a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">American Quotation Punctuation: Comma &amp; Period Inside</text><text x=\"230\" y=\"150\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">\"The telescope is calibrated<tspan fill=\"#ef4444\">,\"</tspan> announced Dr. Thorne<tspan fill=\"#ef4444\">.</tspan></text><text x=\"230\" y=\"170\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Commas and periods stay inside closing quotation marks.</text></svg>",
        "diagramLabel": "Apostrophe ownership and quotation placement diagram",
        "diagramCaption": "Apostrophe and quotation placement: Distinguish singular ('s) vs. plural (') possession; nest commas and periods inside quotation marks.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.2", "desc": "Demonstrate command of the conventions of standard English punctuation and capitalization.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "MLA Style Center: Formatting Direct Quotes & Dialogue", "desc": "Official guidelines on block quotations, dialogue tags, and nested quotation marks.", "url": "https://style.mla.org/how-to-quote/", "icon": "fas fa-book-reader"},
            {"title": "Purdue OWL: The Apostrophe in English Grammar", "desc": "Rules on singular possessives ending in -s, joint possession, and contractions.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/punctuation/apostrophe_rules.html", "icon": "fas fa-pen-fancy"}
        ],
},
    "Hyphens & Dashes": {
        "category": "Punctuation Rules",
        "definition": "Hyphens and dashes fulfill distinct typographical and grammatical purposes. A hyphen (-) connects compound words, particularly compound adjectives preceding a noun to prevent ambiguity (e.g., 'a well-known author', 'an up-to-date analysis'; compare with 'the author is well known' where no hyphen is needed). The en dash (–) indicates numerical or chronological ranges (e.g., 'pages 14–28', '1939–1945'). The em dash (—) creates an abrupt, emphatic break in sentence rhythm, introduces dramatic parenthetical commentary, or frames an appositive with greater visual impact than commas or parentheses.",
        "basicDefinition": "A hyphen (-) joins two words together into one idea when they describe something (like 'sugar-free cookie'). A dash (—) is longer and acts like a dramatic pause to add extra information or surprise in a sentence.",
        "breakdown": [
                {
                        "label": "Hyphen (-)",
                        "text": "Joins compound adjectives before a noun (first-place trophy, long-term goal)."
                },
                {
                        "label": "En Dash (–)",
                        "text": "Shows a range between numbers or dates (pages 10–25, 2020–2026)."
                },
                {
                        "label": "Em Dash (—)",
                        "text": "Creates a dramatic pause or adds strong emphasis to an extra thought."
                }
        ],
        "example": "Standard Analysis: 'The state-of-the-art laboratory—constructed over three arduous years—finally commenced its groundbreaking research.'",
        "basicExample": "Simple Sentence: 'We ate chocolate-covered strawberries—they were delicious!'",
        "proTip": "Do not hyphenate adverbs ending in -ly with adjectives! Write 'a carefully planned trip', NOT 'a carefully-planned trip'. The -ly already makes it clear that it is an adverb modifying the adjective.",
        "question": "Select the sentence with proper hyphenation.",
        "choices": [
                "She is an internationally-recognized musician.",
                "She is an internationally recognized musician.",
                "She is an internationally recognized-musician."
        ],
        "correctIndex": 1,
        "explanation": "'internationally' is an -ly adverb, so no hyphen is permitted between it and the participle 'recognized'.",
        "equations": [
            {
                "title": "Compound Adjective Hyphenation Rule",
                "latex": "\\begin{cases} [\\text{Modifier}_1 \\text{ - } \\text{Modifier}_2] + \\text{Noun} & \\implies \\text{Hyphenate: 'a well-known author'} \\ \\text{Noun} + [\\text{is}] + [\\text{Modifier}_1 + \\text{Modifier}_2] & \\implies \\text{No Hyphen: 'the author is well known'} \\end{cases}",
                "note": "Hyphenate compound modifiers that precede the noun they modify to prevent misreading."
            },
            {
                "title": "Adverb (-ly) Exclusion Principle",
                "latex": "\\text{Adverb}_{(-ly)} + \\text{Adjective} + \\text{Noun} \\implies \\text{Never Hyphenate } (\\text{'an internationally recognized scholar'})",
                "note": "The -ly morpheme already signals adverbial modification, rendering a hyphen redundant."
            },
            {
                "title": "Typographical Mark Hierarchy",
                "latex": "\\text{Hyphen (-)} \\; [\\text{Width } 1x] \\;<\\; \\text{En Dash (–)} \\; [\\text{Width } 2x] \\;<\\; \\text{Em Dash (—)} \\; [\\text{Width } 3x]",
                "note": "Hyphen links words; En dash spans numerical ranges (pp. 14–28); Em dash creates dramatic pauses or parenthetical bursts."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Three Horizontal Marks Hierarchy Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"45\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><line x1=\"45\" y1=\"47\" x2=\"65\" y2=\"47\" stroke=\"#0284c7\" stroke-width=\"4\"/><text x=\"80\" y=\"51\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\">Hyphen ( - )</text><text x=\"185\" y=\"51\" fill=\"#334155\" font-size=\"11\">Links compound modifiers before noun: <tspan font-weight=\"bold\">state-of-the-art</tspan></text><rect x=\"25\" y=\"80\" width=\"410\" height=\"45\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><line x1=\"45\" y1=\"102\" x2=\"80\" y2=\"102\" stroke=\"#10b981\" stroke-width=\"4\"/><text x=\"95\" y=\"106\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">En Dash ( – )</text><text x=\"185\" y=\"106\" fill=\"#334155\" font-size=\"11\">Expresses chronological ranges: <tspan font-weight=\"bold\">pages 24–36, 1939–1945</tspan></text><rect x=\"25\" y=\"135\" width=\"410\" height=\"45\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><line x1=\"45\" y1=\"157\" x2=\"100\" y2=\"157\" stroke=\"#8b5cf6\" stroke-width=\"4\"/><text x=\"115\" y=\"161\" fill=\"#8b5cf6\" font-size=\"12\" font-weight=\"bold\">Em Dash ( — )</text><text x=\"205\" y=\"161\" fill=\"#334155\" font-size=\"11\">Dramatic interruption: <tspan font-weight=\"bold\">She had one desire—freedom.</tspan></text></svg>",
        "diagramLabel": "The three horizontal marks hierarchy diagram",
        "diagramCaption": "The Three Horizontal Marks: Hyphen (compound words), En dash (number and date spans), and Em dash (dramatic parenthetical breaks).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.2.A", "desc": "Use punctuation (dash, hyphen, parentheses) to indicate pauses and emphasis.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Chicago Manual of Style: Hyphens, En Dashes, and Em Dashes", "desc": "Definitive typographical standards for dash lengths and spacing conventions.", "url": "https://www.chicagomanualofstyle.org/qanda/data/faq/topics/HyphensEnDashesEmDashes.html", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Hyphens and Dashes", "desc": "Compound adjectives, prefixes, suspensive hyphenation, and emphatic prose pauses.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/punctuation/hyphen.html", "icon": "fas fa-pen-alt"}
        ],
},
    "Parentheses & Ellipses": {
        "category": "Punctuation Rules",
        "definition": "Parentheses and ellipses manage supplementary information and omissions. Parentheses ( ) enclose non-essential, explanatory, or digressive material that clarifies context without altering the primary sentence's grammatical integrity. The sentence must remain structurally sound if the parenthetical phrase is excised. An ellipsis (...) consists of three spaced periods indicating the intentional omission of words from a quoted source without altering the author's original intent. In dialogue or informal prose, ellipses denote hesitation, stammering, or a thought trailing into silence.",
        "basicDefinition": "Parentheses ( ) hold extra side notes that you could remove without breaking the sentence. An ellipsis (...) is three dots that show words were left out of a quote, or that someone's voice is trailing off slowly.",
        "breakdown": [
                {
                        "label": "Parentheses ()",
                        "text": "Contains bonus details, dates, or explanations that can be removed cleanly."
                },
                {
                        "label": "Ellipsis (...) in Quotes",
                        "text": "Signals that words from an original text were skipped to keep the quote concise."
                },
                {
                        "label": "Ellipsis (...) in Dialogue",
                        "text": "Represents a pause, hesitation, or unfinished thought."
                }
        ],
        "example": "Standard Analysis: 'The treaty (signed in Versailles in 1919) reshaped European boundaries... leading to decades of geopolitical realignments.'",
        "basicExample": "Simple Sentence: 'My dog (a golden retriever) loves to play catch.'",
        "proTip": "If a whole sentence is inside parentheses, put the period inside: '(This is a complete note.)' If the parentheses are at the end of a sentence, put the period outside: 'We visited Paris (France).'",
        "question": "Which sentence uses parentheses with correct terminal punctuation?",
        "choices": [
                "We completed the laboratory trial (on Friday.)",
                "We completed the laboratory trial (on Friday).",
                "We completed the laboratory trial. (on Friday)"
        ],
        "correctIndex": 1,
        "explanation": "The parenthetical phrase is part of the larger sentence, so the terminal period belongs outside the closing parenthesis.",
        "equations": [
            {
                "title": "Parenthetical Excision Invariant",
                "latex": "\\text{Clause}_A + (\\text{Parenthetical Content}) + \\text{Clause}_B \\implies \\text{Clause}_A + \\text{Clause}_B \\quad (\\text{Must remain grammatically complete})",
                "note": "A parenthetical comment is supplementary; excising it must leave the core sentence intact."
            },
            {
                "title": "Terminal Punctuation Placement with Parentheses",
                "latex": "\\begin{cases} \\text{Clause } (\\text{subordinate phrase})\\mathbf{.} & (\\text{Period outside when part of larger sentence}) \\ (\\text{Complete standalone sentence}\\mathbf{.}) & (\\text{Period inside when whole sentence is parenthetical}) \\end{cases}",
                "note": "Determined strictly by whether the parenthesis encloses an internal modifier or a complete independent thought."
            },
            {
                "title": "Ellipsis Quoted Omission Architecture",
                "latex": "\\text{Quotation} = \\text{Source Fragment}_1 + [\\; \\dots \\;] + \\text{Source Fragment}_2 \\quad (\\text{Omission must preserve author's intent})",
                "note": "An ellipsis indicates intentional omission from quoted text without distorting original meaning."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Parenthetical Excision and Ellipsis Bridge Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"70\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"1.5\"/><text x=\"230\" y=\"47\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Parentheses: Non-Essential Removal Test</text><text x=\"230\" y=\"67\" fill=\"#1e293b\" font-size=\"11\" text-anchor=\"middle\">The treaty <tspan fill=\"#ef4444\">(signed in 1919)</tspan> altered European boundaries.</text><text x=\"230\" y=\"85\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Test: \"The treaty altered European boundaries.\" is still a 100% complete sentence ✓</text><rect x=\"25\" y=\"110\" width=\"410\" height=\"70\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"1.5\"/><text x=\"230\" y=\"132\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Ellipsis: Quoted Omission Bridge</text><text x=\"230\" y=\"152\" fill=\"#1e293b\" font-size=\"11\" text-anchor=\"middle\">\"The findings demonstrated <tspan fill=\"#8b5cf6\" font-weight=\"bold\">... </tspan>a notable shift in temperature.\"</text><text x=\"230\" y=\"170\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Three spaced dots bridge omitted words without changing original meaning.</text></svg>",
        "diagramLabel": "Parenthetical excision and ellipsis bridge diagram",
        "diagramCaption": "Parentheses and ellipses: Parenthetical phrases pass the excision test (sentence remains complete); ellipses cleanly bridge omitted text.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.2.B", "desc": "Use an ellipsis to indicate an omission from quoted text in analytical writing.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "APA Style Guide: Ellipses and Parenthetical Citations", "desc": "Accurate scholarly citation guidelines, spacing conventions, and four-dot terminal rules.", "url": "https://apastyle.apa.org/style-grammar-guidelines/citations/quotations/ellipses", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Quoting and Omitting Words with Ellipses", "desc": "How to handle grammatical omissions while maintaining source integrity.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/essay_writing/quotations.html", "icon": "fas fa-quote-right"}
        ],
},
    "Academic Word List": {
        "category": "Vocabulary Building",
        "definition": "The Academic Word List (AWL) encompasses 570 cross-disciplinary word families identified by linguist Averil Coxhead as fundamental to higher education and professional discourse. These words transcend specific subjects, enabling students to formulate hypotheses, evaluate evidence, deconstruct arguments, and articulate analytical findings. Core families include terms like 'analyze', 'synthesize', 'constitute', 'paradigm', 'indicate', 'criteria', and 'subsequent'. Fluency with the AWL is vital for interpreting standardized assessments, secondary textbooks, and empirical research.",
        "basicDefinition": "Academic words are important school and college words. They help you explain ideas clearly in essays, science reports, and tests. Examples include words like 'analyze' (examine closely), 'evaluate' (judge), and 'evidence' (proof).",
        "breakdown": [
                {
                        "label": "Analytical Words",
                        "text": "Analyze (break down), evaluate (judge value), infer (read between the lines)."
                },
                {
                        "label": "Evidence Words",
                        "text": "Corroborate (support with proof), substantiate (prove true), cite (quote source)."
                },
                {
                        "label": "Structure Words",
                        "text": "Constitute (make up), facilitate (make easier), implement (put into action)."
                }
        ],
        "example": "Standard Analysis: 'Researchers must <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">synthesize</span> the empirical data to <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">substantiate</span> their initial <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">hypothesis</span>.'",
        "basicExample": "Simple Sentence: 'Students must <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">examine</span> the facts to <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">prove</span> their main <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">idea</span>.'",
        "proTip": "When writing essays, replace vague verbs like 'shows' or 'talks about' with precise academic verbs like 'demonstrates', 'illustrates', 'delineates', or 'posits'.",
        "question": "Which academic word means 'to combine different ideas or elements into a unified whole'?",
        "choices": [
                "Dismantle",
                "Synthesize",
                "Extrapolate"
        ],
        "correctIndex": 1,
        "explanation": "'Synthesize' means to combine diverse components or sources into a coherent, comprehensive concept.",
        "equations": [
            {
                "title": "Lexical Tier Stratification Hierarchy",
                "latex": "\\text{Vocabulary} = \\text{Tier 1 (Conversational)} \\oplus \\text{Tier 2 (General Academic / AWL)} \\oplus \\text{Tier 3 (Domain STEM/Field)}",
                "note": "Tier 2 academic words (analyze, synthesize, substantiate) bridge cross-disciplinary discourse."
            },
            {
                "title": "Scholarly Synthesis Formula",
                "latex": "\\text{Synthesis} = \\sum_{i=1}^{n} \\text{Evidence}_i + \\text{Critical Analysis} \\implies \\text{Unified Academic Thesis}",
                "note": "The core cognitive formula for combining diverse empirical findings into a cohesive claim."
            },
            {
                "title": "Morphological Family Expansion Matrix",
                "latex": "\\text{Base Verb} \\xrightarrow{\\text{Nominalization}} \\text{Noun} \\xrightarrow{\\text{Adjectival}} \\text{Adj} \\xrightarrow{\\text{Manner}} \\text{Adv} \\quad (\\text{analyze} \\to \\text{analysis} \\to \\text{analytical} \\to \\text{analytically})",
                "note": "Mastering one AWL base unlocks four distinct grammatical functions across scholarly prose."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Three-Tier Vocabulary Pyramid Hierarchy Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><polygon points=\"230,25 390,175 70,175\" fill=\"#f1f5f9\" stroke=\"#64748b\" stroke-width=\"2\"/><polygon points=\"230,25 280,75 180,75\" fill=\"#fef3c7\" stroke=\"#d97706\" stroke-width=\"1.5\"/><text x=\"230\" y=\"55\" fill=\"#92400e\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Tier 3: Domain Specific</text><text x=\"230\" y=\"67\" fill=\"#78350f\" font-size=\"9\" text-anchor=\"middle\">(photosynthesis, isotope)</text><polygon points=\"180,75 280,75 330,125 130,125\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"230\" y=\"100\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Tier 2: Academic Word List (AWL)</text><text x=\"230\" y=\"114\" fill=\"#1e3a8a\" font-size=\"9\" text-anchor=\"middle\">(analyze, evaluate, synthesize, criteria)</text><polygon points=\"130,125 330,125 390,175 70,175\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"230\" y=\"150\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Tier 1: Everyday Conversational</text><text x=\"230\" y=\"164\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">(house, talk, happy, friend)</text></svg>",
        "diagramLabel": "Three-tier vocabulary pyramid hierarchy diagram",
        "diagramCaption": "The Three Lexical Tiers: Tier 2 (AWL) bridges everyday informal conversation (Tier 1) and hyper-specialized technical STEM vocabulary (Tier 3).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.6", "desc": "Acquire and accurately utilize general academic and domain-specific words and phrases.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Averil Coxhead: The Academic Word List", "desc": "Official 570 cross-disciplinary word families from Victoria University of Wellington.", "url": "https://www.wgtn.ac.nz/lals/resources/academicwordlist", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Academic Writing Tone & Lexical Register", "desc": "Strategies for replacing conversational diction with precise scholarly verbs and nominalizations.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/index.html", "icon": "fas fa-pen-nib"}
        ],
},
    "Prefixes & Suffixes": {
        "category": "Vocabulary Building",
        "definition": "Morphological affixes are derivational units appended to a root or base word to alter its lexical category, semantic meaning, or grammatical function. Prefixes attach to the beginning, frequently transforming meaning into its antonym (un-, dis-, in-), indicating spatial/temporal orientation (pre-, post-, trans-, inter-), or quantifying scope (multi-, omni-, poly-). Suffixes attach to the terminus, often shifting part of speech (e.g., turning a verb into a noun with -tion, an adjective into an adverb with -ly, or a noun into an adjective with -ous).",
        "basicDefinition": "A prefix is a word part added to the beginning of a word to change its meaning (like 'un-' in 'unhappy'). A suffix is a word part added to the end of a word (like '-ful' in 'helpful'). Knowing affixes lets you figure out thousands of new words.",
        "breakdown": [
                {
                        "label": "Negative Prefixes",
                        "text": "un- (not), dis- (opposite), in-/im- (without) — e.g. imperfect, disagree."
                },
                {
                        "label": "Time/Order Prefixes",
                        "text": "pre- (before), post- (after), re- (again) — e.g. preview, postseason, rebuild."
                },
                {
                        "label": "Grammar Suffixes",
                        "text": "-able (can be done), -tion (act of), -ment (state of) — turn verbs into nouns/adjectives."
                }
        ],
        "example": "Standard Analysis: 'The <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">un-</span>break<span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">-able</span> seal prevented any <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">de-</span>hydra<span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">-tion</span>.' ('un-' + 'break' + '-able'; 'de-' + 'hydra' + '-tion').",
        "basicExample": "Simple Sentence: 'The dog was <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">un-</span>happy because of the <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">mis-</span>place<span class=\"example-breakdown-tag\" style=\"background:#fef3c7; color:#92400e;\">-ment</span> of his bone.'",
        "proTip": "Spelling rule: When adding a suffix starting with a vowel to a root ending in a silent 'e', drop the 'e' (create -> creating, fame -> famous). If the suffix starts with a consonant, keep the 'e' (hope -> hopeful).",
        "question": "If the prefix 'trans-' means 'across' and the root 'port' means 'carry', what does 'transportation' mean?",
        "choices": [
                "The act of carrying goods or people across distances",
                "The measurement of weight in an airport",
                "To fix a broken wheel"
        ],
        "correctIndex": 0,
        "explanation": "Combining 'trans-' (across) + 'port' (carry) + '-ation' (act or process) yields 'carrying across'.",
        "equations": [
            {
                "title": "Morphological Token Assembly Rule",
                "latex": "\\text{Complex Lexeme} = (\\text{Prefix}) + \\text{Root Base} + (\\text{Derivational Suffix}) + (\\text{Inflectional Suffix})",
                "note": "Example: un- (prefix) + comfort (root) + -able (derivational adj suffix) + -s (inflectional plural)."
            },
            {
                "title": "Syntactic Category Shifting via Suffixation",
                "latex": "\\begin{cases} \\text{Verb} + \\text{'-tion' / '-ment'} \\implies \\text{Noun} & (\\text{inform} \\to \\text{information}) \\ \\text{Noun} + \\text{'-able' / '-ous'} \\implies \\text{Adjective} & (\\text{courage} \\to \\text{courageous}) \\ \\text{Adjective} + \\text{'-ly'} \\implies \\text{Adverb} & (\\text{rapid} \\to \\text{rapidly}) \\end{cases}",
                "note": "Derivational suffixes fundamentally govern and transform the grammatical part of speech of the root."
            },
            {
                "title": "Silent 'e' Deletion Orthographic Law",
                "latex": "\\text{Root}_{(\\dots C + \\mathbf{e})} + \\text{Suffix}_{(\\text{initial vowel})} \\implies \\text{Drop 'e': } (\\text{create} + \\text{-ing} \\to \\text{creating})",
                "note": "Retain the 'e' when appending a consonant-initial suffix (hope + -ful = hopeful)."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Morpheme Assembly Conveyor Blueprint Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"35\" width=\"110\" height=\"75\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"2\"/><text x=\"80\" y=\"60\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">PREFIX</text><text x=\"80\" y=\"80\" fill=\"#14532d\" font-size=\"15\" font-weight=\"bold\" text-anchor=\"middle\">un-</text><text x=\"80\" y=\"98\" fill=\"#166534\" font-size=\"9\" text-anchor=\"middle\">Negation (not)</text><text x=\"150\" y=\"75\" fill=\"#64748b\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">+</text><rect x=\"165\" y=\"35\" width=\"130\" height=\"75\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"230\" y=\"60\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">ROOT WORD</text><text x=\"230\" y=\"80\" fill=\"#1e3a8a\" font-size=\"15\" font-weight=\"bold\" text-anchor=\"middle\">break</text><text x=\"230\" y=\"98\" fill=\"#1e40af\" font-size=\"9\" text-anchor=\"middle\">Core Base (fracture)</text><text x=\"310\" y=\"75\" fill=\"#64748b\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">+</text><rect x=\"325\" y=\"35\" width=\"110\" height=\"75\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"2\"/><text x=\"380\" y=\"60\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">SUFFIX</text><text x=\"380\" y=\"80\" fill=\"#78350f\" font-size=\"15\" font-weight=\"bold\" text-anchor=\"middle\">-able</text><text x=\"380\" y=\"98\" fill=\"#92400e\" font-size=\"9\" text-anchor=\"middle\">Capability (Adj)</text><rect x=\"25\" y=\"130\" width=\"410\" height=\"45\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"1.5\"/><text x=\"230\" y=\"152\" fill=\"#0f172a\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">Result: <tspan fill=\"#166534\">un</tspan><tspan fill=\"#1e40af\">break</tspan><tspan fill=\"#92400e\">able</tspan> = \"Not capable of being broken\"</text><text x=\"230\" y=\"168\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Part of speech transformed from Verb (break) to Adjective (unbreakable).</text></svg>",
        "diagramLabel": "Morpheme assembly conveyor blueprint diagram",
        "diagramCaption": "Morphological word building: Combining prefixes, root morphemes, and derivational suffixes unlocks word decoding and grammatical shifting.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.4.B", "desc": "Use common, grade-appropriate Greek or Latin affixes and roots as clues to word meaning.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Merriam-Webster: Guide to English Affixes & Word Formation", "desc": "Exhaustive reference catalogue of spatial, negative, and occupational affixes.", "url": "https://www.merriam-webster.com/words-at-play/word-origins-prefixes-and-suffixes", "icon": "fas fa-book-reader"},
            {"title": "British Council: Morphology and Word Families", "desc": "Interactive exercises on derivational noun and adjective suffixes.", "url": "https://learnenglish.britishcouncil.org/grammar/vocabulary/prefixes-and-suffixes", "icon": "fas fa-graduation-cap"}
        ],
},
    "Context Clues": {
        "category": "Vocabulary Building",
        "definition": "Context clue analysis is an active reading comprehension strategy that empowers students to deduce the meaning of unfamiliar lexicon through surrounding textual syntax and semantic cues. The five primary taxonomies of context clues are: (1) Definition/Restatement (direct parenthetical or appositive glossing); (2) Contrast/Antonym (identifying signal words like 'whereas', 'conversely', 'unlike'); (3) Exemplification (illustrative examples following 'such as', 'including'); (4) Cause and Effect (inferring meaning from conditional outcomes); and (5) Mood/Tone inference.",
        "basicDefinition": "Context clues are hints that the author puts in the sentence around an unfamiliar word. By reading the words before and after a hard word, you can solve its meaning like a detective.",
        "breakdown": [
                {
                        "label": "Direct Definition",
                        "text": "The author tells you the meaning right away using commas, dashes, or 'is defined as'."
                },
                {
                        "label": "Opposite / Antonym",
                        "text": "Words like 'unlike', 'but', or 'instead' give the opposite meaning to help you compare."
                },
                {
                        "label": "Example Clue",
                        "text": "Lists of items (like 'mammals, such as cows, dogs, and lions') reveal the category."
                }
        ],
        "example": "Standard Analysis: 'Unlike her garrulous brother who monopolized every conversation, Elena was remarkably laconic.' ('Unlike' signals that 'laconic' means concise/brief, the opposite of talkative).",
        "basicExample": "Simple Sentence: 'The dessert was so scrumptious that everyone ate every bite and asked for more.' ('ate every bite' shows scrumptious means delicious).",
        "proTip": "Substitute your guess into the sentence in place of the unfamiliar word. If the sentence still makes clear sense, your inferred definition is almost certainly correct.",
        "question": "What does 'tenacious' mean in: 'Despite falling behind early, the tenacious athlete refused to surrender and won the race.'?",
        "choices": [
                "Easily discouraged",
                "Persistent and determined",
                "Quick-tempered"
        ],
        "correctIndex": 1,
        "explanation": "'Refused to surrender' directly provides the context clue proving 'tenacious' means persistent and determined.",
        "equations": [
            {
                "title": "The IDEAS Context Clues Heuristic",
                "latex": "\\text{Context Deduction} = \\mathbf{I}\\text{nference} + \\mathbf{D}\\text{efinition} + \\mathbf{E}\\text{xample} + \\mathbf{A}\\text{ntonym} + \\mathbf{S}\\text{ynonym}",
                "note": "The canonical 5-point investigative framework for deducing the meaning of unfamiliar vocabulary."
            },
            {
                "title": "Antonym / Contrast Deduction Calculus",
                "latex": "\\text{Subject} + \\text{Contrast Marker (unlike, whereas, conversely)} + \\text{Quality}_A \\implies \\text{Meaning}(W) \\equiv \\neg(\\text{Quality}_A)",
                "note": "'Unlike her garrulous brother, Maya was taciturn' implies taciturn means not garrulous (concise/quiet)."
            },
            {
                "title": "Lexical Substitution Verification Invariant",
                "latex": "\\text{Sentence}(W_{\\text{unknown}}) \\xrightarrow{\\text{Substitute } W_{\\text{guess}}} \\text{Syntactic & Semantic Coherence} \\equiv \\text{True}",
                "note": "Substitute your hypothesized synonym; the surrounding syntactic and logical sense must be preserved."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The IDEAS Context Clues Strategy Radar Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"15\" y=\"25\" width=\"80\" height=\"85\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"55\" y=\"50\" fill=\"#1e40af\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">I</text><text x=\"55\" y=\"70\" fill=\"#1e3a8a\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Inference</text><text x=\"55\" y=\"95\" fill=\"#475569\" font-size=\"8\" text-anchor=\"middle\">Read between lines</text><rect x=\"102\" y=\"25\" width=\"80\" height=\"85\" rx=\"6\" fill=\"#e0e7ff\" stroke=\"#3730a3\" stroke-width=\"1.5\"/><text x=\"142\" y=\"50\" fill=\"#3730a3\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">D</text><text x=\"142\" y=\"70\" fill=\"#312e81\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Definition</text><text x=\"142\" y=\"95\" fill=\"#475569\" font-size=\"8\" text-anchor=\"middle\">Direct appositive</text><rect x=\"190\" y=\"25\" width=\"80\" height=\"85\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"230\" y=\"50\" fill=\"#166534\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">E</text><text x=\"230\" y=\"70\" fill=\"#14532d\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Example</text><text x=\"230\" y=\"95\" fill=\"#475569\" font-size=\"8\" text-anchor=\"middle\">such as, including</text><rect x=\"278\" y=\"25\" width=\"80\" height=\"85\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"318\" y=\"50\" fill=\"#92400e\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">A</text><text x=\"318\" y=\"70\" fill=\"#78350f\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Antonym</text><text x=\"318\" y=\"95\" fill=\"#475569\" font-size=\"8\" text-anchor=\"middle\">unlike, but, whereas</text><rect x=\"365\" y=\"25\" width=\"80\" height=\"85\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"405\" y=\"50\" fill=\"#6b21a8\" font-size=\"18\" font-weight=\"bold\" text-anchor=\"middle\">S</text><text x=\"405\" y=\"70\" fill=\"#581c87\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Synonym</text><text x=\"405\" y=\"95\" fill=\"#475569\" font-size=\"8\" text-anchor=\"middle\">also called, or</text><rect x=\"15\" y=\"125\" width=\"430\" height=\"55\" rx=\"6\" fill=\"#ffffff\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/><text x=\"230\" y=\"147\" fill=\"#0f172a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Detective Strategy: Check surrounding clue words before consulting a dictionary.</text><text x=\"230\" y=\"165\" fill=\"#10b981\" font-size=\"11\" text-anchor=\"middle\">Example: \"The dessert was so <tspan font-weight=\"bold\">scrumptious</tspan> that everyone ate every bite.\" → Meaning: delicious ✓</text></svg>",
        "diagramLabel": "The IDEAS context clues strategy radar diagram",
        "diagramCaption": "The IDEAS Strategy: Solve unfamiliar vocabulary using Inference, Definition, Examples, Antonyms/Contrasts, and Synonyms.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.4.A", "desc": "Use context as a clue to the meaning of an unfamiliar word or academic phrase.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Context Clues Instructional Framework", "desc": "Active strategies for decoding tier-two vocabulary through syntactic surrounding structures.", "url": "https://www.readwritethink.org/classroom-resources/lesson-plans/solving-word-meanings-engaging", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Reading for Comprehension & Contextual Inference", "desc": "Techniques for inferring tonal register and nuances across technical texts.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/index.html", "icon": "fas fa-book-open"}
        ],
},
    "Synonym & Antonym Games": {
        "category": "Vocabulary Building",
        "definition": "Synonyms and antonyms form the basis of semantic precision and stylistic eloquence. Synonyms share denotative meaning while differing in subtle shades of connotation (emotional association) and register (formal vs. informal). For example, 'thrifty' carries an admirable connotation of financial prudence, whereas 'miserly' or 'stingy' conveys negative greed. Antonyms present diametric opposition along complementary scales (alive/dead), gradable spectrums (scorching/freezing), or relational reciprocals (buy/sell, teacher/student).",
        "basicDefinition": "Synonyms are words that have the same or similar meaning (big / huge). Antonyms are words with opposite meanings (hot / cold). Knowing both helps you choose the perfect word for your stories.",
        "breakdown": [
                {
                        "label": "Synonyms (Same)",
                        "text": "Words sharing meaning: brave / courageous / valiant / heroic."
                },
                {
                        "label": "Antonyms (Opposite)",
                        "text": "Words with reverse meaning: permanent / temporary, advance / retreat."
                },
                {
                        "label": "Connotation Tone",
                        "text": "The emotional feeling of a word (curious = positive; nosy = negative)."
                }
        ],
        "example": "Standard Analysis: 'While both politicians were resolute, critics derided the incumbent as obstinate.' ('Resolute' is an admirable synonym for firm; 'obstinate' implies stubborn inflexibility).",
        "basicExample": "Simple Sentence: 'The giant was enormous (synonym for huge), but the mouse was tiny (antonym of enormous).' ",
        "proTip": "Do not rely on a thesaurus blindly! Always check whether the synonym matches the formality and connotation of your sentence before using it.",
        "question": "Which pair of words represents true antonyms?",
        "choices": [
                "ephemeral / fleeting",
                "magnanimous / selfish",
                "pristine / immaculate"
        ],
        "correctIndex": 1,
        "explanation": "'Magnanimous' (generous and forgiving) is the direct antonym of 'selfish'.",
        "equations": [
            {
                "title": "Connotation vs. Denotation Formula",
                "latex": "\\text{Word Meaning} = \\text{Denotation (Literal Definition)} \\oplus \\text{Connotation (Affective Tone)}",
                "note": "Example: 'thrifty' (+ positive prudence) vs. 'stingy' (- negative greed) sharing base meaning 'conserving money'."
            },
            {
                "title": "Antonym Taxonomy Classification",
                "latex": "\\text{Antonyms} = \\begin{cases} \\text{Gradable (Continuous Scale)} & (\\text{freezing} \\leftrightarrow \\text{boiling}) \\ \\text{Complementary (Binary / Mutually Exclusive)} & (\\text{mortal} \\leftrightarrow \\text{immortal}) \\ \\text{Relational (Reciprocal Roles)} & (\\text{employer} \\leftrightarrow \\text{employee}) \\end{cases}",
                "note": "Complementary antonyms have no middle ground; gradable antonyms span a continuous spectrum."
            },
            {
                "title": "Synonymic Substitution Equivalence",
                "latex": "\\text{Synonyms } (S_1, S_2) \\implies \\text{Denotation}(S_1) \\approx \\text{Denotation}(S_2) \\quad \\text{while } \\text{Connotation}(S_1) \\neq \\text{Connotation}(S_2)",
                "note": "Synonyms share essential core definition while differing in emotional intensity and formal register."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Semantic Temperature Scale and Connotation Spectrum Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><line x1=\"40\" y1=\"90\" x2=\"420\" y2=\"90\" stroke=\"#cbd5e1\" stroke-width=\"6\" stroke-linecap=\"round\"/><line x1=\"40\" y1=\"90\" x2=\"150\" y2=\"90\" stroke=\"#ef4444\" stroke-width=\"6\" stroke-linecap=\"round\"/><line x1=\"150\" y1=\"90\" x2=\"310\" y2=\"90\" stroke=\"#64748b\" stroke-width=\"6\"/><line x1=\"310\" y1=\"90\" x2=\"420\" y2=\"90\" stroke=\"#10b981\" stroke-width=\"6\" stroke-linecap=\"round\"/><circle cx=\"70\" cy=\"90\" r=\"10\" fill=\"#ef4444\"/><circle cx=\"230\" cy=\"90\" r=\"10\" fill=\"#64748b\"/><circle cx=\"390\" cy=\"90\" r=\"10\" fill=\"#10b981\"/><text x=\"70\" y=\"65\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Negative (-)</text><text x=\"70\" y=\"120\" fill=\"#991b1b\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Nosy</text><text x=\"70\" y=\"138\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Stingy</text><text x=\"70\" y=\"154\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Stubborn</text><text x=\"230\" y=\"65\" fill=\"#475569\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Neutral (0)</text><text x=\"230\" y=\"120\" fill=\"#1e293b\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Curious</text><text x=\"230\" y=\"138\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Frugal</text><text x=\"230\" y=\"154\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Firm</text><text x=\"390\" y=\"65\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Positive (+)</text><text x=\"390\" y=\"120\" fill=\"#065f46\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Inquisitive</text><text x=\"390\" y=\"138\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Thrifty</text><text x=\"390\" y=\"154\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Resolute</text><text x=\"230\" y=\"180\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Same Core Meaning (Denotation) — Vastly Different Emotional Impacts (Connotation)</text></svg>",
        "diagramLabel": "Semantic temperature scale and connotation spectrum diagram",
        "diagramCaption": "The Connotation Spectrum: Synonyms share literal denotations while triggering negative, neutral, or highly positive reader impressions.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.5.B", "desc": "Use the relationship between words (synonyms/antonyms) to better understand nuanced meaning.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Oxford English Thesaurus: Nuance and Register Guide", "desc": "Authoritative guide on tonal shades, formal registers, and semantic gradients.", "url": "https://www.oed.com/", "icon": "fas fa-university"},
            {"title": "Hesten's Learning Library: Word Nuances & Connotation", "desc": "Interactive exercises exploring emotional valence and gradable antonyms.", "url": "/library/index.php?q=connotation", "icon": "fas fa-book"}
        ],
},
    "Roots & Etymology": {
        "category": "Vocabulary Building",
        "definition": "Etymology investigates the historical evolution and linguistic ancestry of words. Over 60% of modern English vocabulary—and over 90% of scientific and technical nomenclature—derives from Classical Greek and Latin root morphemes. Mastering base roots like 'chron' (time), 'bio' (life), 'dict' (speak), 'scrib/script' (write), 'spec/spect' (look), and 'voc' (voice) provides students with a powerful decoding matrix for inferring the definitions of advanced tier-three vocabulary across STEM, history, and literature.",
        "basicDefinition": "A root word is the base part of a word that holds its main meaning. Many English roots come from ancient Greek and Latin. For example, 'bio' means life, so 'biology' is the study of life and 'biography' is a written story of someone's life.",
        "breakdown": [
                {
                        "label": "Latin Roots (Action/Status)",
                        "text": "port (carry), struct (build), rupt (burst), ject (throw), vid/vis (see)."
                },
                {
                        "label": "Greek Roots (Knowledge/Ideas)",
                        "text": "chron (time), geo (earth), tele (far), auto (self), graph (write)."
                },
                {
                        "label": "Morphological Families",
                        "text": "One root builds dozens of related words (e.g. dict: predict, dictionary, contradict, verdict)."
                }
        ],
        "example": "Standard Analysis: 'The <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">chron-o-logy</span> of the fossil layer was verified using <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">geo-thermal</span> indicators.' ('chron' = time, 'geo' = earth, 'therm' = heat).",
        "basicExample": "Simple Sentence: 'I used a <span class=\"example-breakdown-tag\" style=\"background:#e0e7ff; color:#3730a3;\">tele-scope</span> to look at stars far away.' ('tele' = far away, 'scope' = look).",
        "proTip": "When analyzing a new word on a test, break it down into Prefix + Root + Suffix. Translating each piece often reveals the exact definition!",
        "question": "Given that Latin 'bene' means 'good' and 'fac/fact' means 'to do/make', what is a 'benefactor'?",
        "choices": [
                "A person who gives money or aid to do good for others",
                "A person who creates maps",
                "A factory manager"
        ],
        "correctIndex": 0,
        "explanation": "'bene' (good) + 'fact' (make/do) + '-or' (agent person) = one who does good deeds.",
        "equations": [
            {
                "title": "Classical Morphemic Decoding Formula",
                "latex": "\\text{Academic / STEM Term} = \\sum_{j=1}^{k} \\text{Classical Morpheme}_j \\quad (\\text{Greek / Latin Ancestral Roots})",
                "note": "Over 90% of scientific and technical English vocabulary derives from classical morphemes."
            },
            {
                "title": "Greek vs. Latin Functional Dichotomy",
                "latex": "\\begin{cases} \\text{Greek Roots (Abstract Sciences & Disciplines)} & (\\text{geo- (earth), bio- (life), psych- (mind), chron- (time)}) \\ \\text{Latin Roots (Action, Law & Concrete Systems)} & (\\text{dict- (speak), struct- (build), port- (carry), scrib- (write)}) \\end{cases}",
                "note": "Greek morphemes frequently label fields of science; Latin roots describe concrete human actions and legal systems."
            },
            {
                "title": "Morphological Root Tree Expansion",
                "latex": "\\text{Root } (\\mathbf{\\text{spect}} = \\text{to look}) \\implies \\begin{cases} \\text{in-spect (look into)} \\ \\text{spect-ator (one who watches)} \\ \\text{retro-spect (look backward)} \\ \\text{circum-spect (look around cautiously)} \\end{cases}",
                "note": "A single root morpheme branches into dozens of interconnected disciplinary words."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Etymology Root Tree Morphological Expansion Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"165\" y=\"135\" width=\"130\" height=\"45\" rx=\"6\" fill=\"#0284c7\"/><text x=\"230\" y=\"155\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">ROOT MORPHEME</text><text x=\"230\" y=\"172\" fill=\"#ffffff\" font-size=\"14\" font-weight=\"bold\" text-anchor=\"middle\">SPECT (to look)</text><line x1=\"200\" y1=\"135\" x2=\"75\" y2=\"85\" stroke=\"#0284c7\" stroke-width=\"2\"/><line x1=\"215\" y1=\"135\" x2=\"180\" y2=\"85\" stroke=\"#0284c7\" stroke-width=\"2\"/><line x1=\"245\" y1=\"135\" x2=\"280\" y2=\"85\" stroke=\"#0284c7\" stroke-width=\"2\"/><line x1=\"260\" y1=\"135\" x2=\"385\" y2=\"85\" stroke=\"#0284c7\" stroke-width=\"2\"/><rect x=\"20\" y=\"40\" width=\"105\" height=\"45\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"72\" y=\"58\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Inspect</text><text x=\"72\" y=\"74\" fill=\"#1e3a8a\" font-size=\"9\" text-anchor=\"middle\">in + spect (look into)</text><rect x=\"130\" y=\"40\" width=\"100\" height=\"45\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"180\" y=\"58\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Spectator</text><text x=\"180\" y=\"74\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">spect + ator (watcher)</text><rect x=\"235\" y=\"40\" width=\"100\" height=\"45\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"285\" y=\"58\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Retrospect</text><text x=\"285\" y=\"74\" fill=\"#78350f\" font-size=\"9\" text-anchor=\"middle\">retro + spect (look back)</text><rect x=\"340\" y=\"40\" width=\"105\" height=\"45\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"392\" y=\"58\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Circumspect</text><text x=\"392\" y=\"74\" fill=\"#581c87\" font-size=\"9\" text-anchor=\"middle\">circum + spect (look all)</text></svg>",
        "diagramLabel": "Etymology root tree morphological expansion diagram",
        "diagramCaption": "The Morphological Root Tree: A single classical root ('spect' = to look) branches into dozens of disciplinary words through prefix and suffix additions.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.4.B", "desc": "Use common, grade-appropriate Greek or Latin roots as clues to the meaning of a word.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Oxford English Dictionary: Historical Thesaurus & Etymology", "desc": "Historical development and linguistic evolution of words from classical antiquity.", "url": "https://www.oed.com/", "icon": "fas fa-university"},
            {"title": "Cambridge Greek & Latin Root Word Matrix", "desc": "Comprehensive reference catalogue of roots across biological and medical terminology.", "url": "https://dictionary.cambridge.org/", "icon": "fas fa-seedling"}
        ],
},
    "Homophones (e.g., their/there/they're)": {
        "category": "Common Errors Guide",
        "definition": "Homophones are distinct words that share identical phonetic pronunciation while possessing disparate orthographic spellings, etymologies, and semantic meanings. Conflating homophones represents one of the most pervasive mechanical errors in English writing. Essential confusable sets include: their (third-person plural possessive), there (spatial adverb or existential expletive), and they're (contraction for 'they are'); its (possessive determiner) and it's (contraction for 'it is'); affect (verb: influence) and effect (noun: result); and accept (verb: receive) and except (preposition: excluding).",
        "basicDefinition": "Homophones are sound-alike words that have different spellings and meanings. For example: 'their' (belongs to them), 'there' (in that place), and 'they're' (short for 'they are'). Getting them mixed up is very common, so learning their tricks is important!",
        "breakdown": [
                {
                        "label": "Their / There / They're",
                        "text": "Their = ownership (their car); There = location (over there); They're = they are."
                },
                {
                        "label": "Its / It's",
                        "text": "Its = possession (its tail); It's = contraction for 'it is' or 'it has'."
                },
                {
                        "label": "Affect / Effect",
                        "text": "Affect is usually a Verb (Action); Effect is usually a Noun (End result)."
                }
        ],
        "example": "Standard Analysis: '<span class=\"example-breakdown-tag\" style=\"background:#fee2e2; color:#991b1b;\">They're</span> storing <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">their</span> gear over <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">there</span> because <span class=\"example-breakdown-tag\" style=\"background:#fee2e2; color:#991b1b;\">it's</span> raining.'",
        "basicExample": "Simple Sentence: '<span class=\"example-breakdown-tag\" style=\"background:#fee2e2; color:#991b1b;\">They're</span> happy that <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">their</span> dog is over <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">there</span>.'",
        "proTip": "The RAVEN Trick: Remember: R-A-V-E-N: Remember Affect is a Verb, Effect is a Noun! ('The weather affects my mood; the effect is happiness').",
        "question": "Select the sentence that uses homophones with complete accuracy.",
        "choices": [
                "Their going to test there new drone over they're.",
                "They're going to test their new drone over there.",
                "There going to test they're new drone over their."
        ],
        "correctIndex": 1,
        "explanation": "'They're' = they are; 'their' = possessive drone; 'there' = spatial location.",
        "equations": [
            {
                "title": "The There / Their / They're Triad Axiom",
                "latex": "\\begin{cases} \\text{They're} = [\\text{They are}] & (\\text{Subject pronoun + auxiliary verb contraction}) \\ \\text{Their} = P_{\\text{possessive}} & (\\text{Belonging to them: 'their research'}) \\ \\text{There} = \\text{Adverb}_{\\text{place}} \\lor \\text{Expletive} & (\\text{'over there'} \\lor \\text{'there are three trials'}) \\end{cases}",
                "note": "Acoustically identical homophones governed by distinct grammatical syntax."
            },
            {
                "title": "The RAVEN Affect vs. Effect Mnemonic",
                "latex": "\\mathbf{R}\\text{emember: } \\mathbf{A}\\text{ffect is a } \\mathbf{V}\\text{erb } [\\text{action: 'affects data'}], \\quad \\mathbf{E}\\text{ffect is a } \\mathbf{N}\\text{oun } [\\text{result: 'the greenhouse effect'}]",
                "note": "Use the RAVEN rule to eliminate the most pervasive vocabulary confusion in academic writing."
            },
            {
                "title": "Contraction Expansion Test Invariant",
                "latex": "\\text{It's} \\iff [\\text{It is} \\lor \\text{It has}] \\quad \\text{vs.} \\quad \\text{Its} \\iff \\text{Possessive pronoun (Zero apostrophe)}",
                "note": "Test: Expand into 'it is'. If the sentence collapses into nonsense, you must use 'its'."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Homophone Triad Diagnostic Card Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"30\" width=\"125\" height=\"140\" rx=\"6\" fill=\"#ffffff\" stroke=\"#1e40af\" stroke-width=\"2\"/><rect x=\"25\" y=\"30\" width=\"125\" height=\"30\" rx=\"6 6 0 0\" fill=\"#dbeafe\"/><text x=\"87\" y=\"50\" fill=\"#1e40af\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">THEIR</text><text x=\"87\" y=\"85\" fill=\"#1e3a8a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Ownership</text><text x=\"87\" y=\"105\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Has <tspan font-weight=\"bold\" fill=\"#1e40af\">HEIR</tspan> in it</text><text x=\"87\" y=\"125\" fill=\"#64748b\" font-size=\"9\" text-anchor=\"middle\">(people who own)</text><text x=\"87\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">\"their books\" ✓</text><rect x=\"165\" y=\"30\" width=\"130\" height=\"140\" rx=\"6\" fill=\"#ffffff\" stroke=\"#166534\" stroke-width=\"2\"/><rect x=\"165\" y=\"30\" width=\"130\" height=\"30\" rx=\"6 6 0 0\" fill=\"#dcfce7\"/><text x=\"230\" y=\"50\" fill=\"#166534\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">THERE</text><text x=\"230\" y=\"85\" fill=\"#14532d\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Location</text><text x=\"230\" y=\"105\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Has <tspan font-weight=\"bold\" fill=\"#166534\">HERE</tspan> in it</text><text x=\"230\" y=\"125\" fill=\"#64748b\" font-size=\"9\" text-anchor=\"middle\">(points to a place)</text><text x=\"230\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">\"look over there\" ✓</text><rect x=\"310\" y=\"30\" width=\"125\" height=\"140\" rx=\"6\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><rect x=\"310\" y=\"30\" width=\"125\" height=\"30\" rx=\"6 6 0 0\" fill=\"#f3e8ff\"/><text x=\"372\" y=\"50\" fill=\"#6b21a8\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">THEY'RE</text><text x=\"372\" y=\"85\" fill=\"#581c87\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Contraction</text><text x=\"372\" y=\"105\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Has an <tspan font-weight=\"bold\" fill=\"#6b21a8\">apostrophe</tspan></text><text x=\"372\" y=\"125\" fill=\"#64748b\" font-size=\"9\" text-anchor=\"middle\">= \"they are\"</text><text x=\"372\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">\"they're happy\" ✓</text></svg>",
        "diagramLabel": "The homophone triad diagnostic card diagram",
        "diagramCaption": "The Homophone Diagnostic Card: 'Their' contains 'heir' (possession), 'there' contains 'here' (place), and 'they\'re' has an apostrophe replacing 'a' (they are).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.2.C", "desc": "Spell correctly and differentiate commonly confused homophones in formal writing.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Merriam-Webster: How to Use They're, There, and Their", "desc": "Comprehensive guide on etymological roots and homophone diagnostic tests.", "url": "https://www.merriam-webster.com/grammar/how-to-use-theyre-there-their", "icon": "fas fa-book-reader"},
            {"title": "Purdue OWL: Commonly Confused Words Guide", "desc": "Detailed charts covering affect/effect, accept/except, and its/it's.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/spelling_rules_and_tips/commonly_confused_words.html", "icon": "fas fa-spell-check"}
        ],
},
    "Run-on Sentences & Fragments": {
        "category": "Common Errors Guide",
        "definition": "Sentence boundaries require strict syntactic completeness. A Sentence Fragment is an incomplete syntactic unit masquerading as a sentence; it lacks an independent subject, a finite predicate verb, or leaves a subordinate thought unresolved (e.g., 'Because the engine stalled'). A Run-on Sentence occurs when two or more independent clauses are fused together without appropriate conjunctions or terminal punctuation. The Comma Splice is the most prevalent run-on subtype, incorrectly coupling two complete standalone sentences with only a comma.",
        "basicDefinition": "A sentence fragment is an incomplete sentence—it is missing a subject, an action, or a full thought (like 'Running to the bus'). A run-on sentence squashes two full sentences together without the right stop signs or glue words.",
        "breakdown": [
                {
                        "label": "Fragment Fix",
                        "text": "Attach the fragment to the nearby main sentence or add the missing subject/verb."
                },
                {
                        "label": "Comma Splice Fix",
                        "text": "Add a coordinating conjunction (FANBOYS), replace the comma with a semicolon, or use a period."
                },
                {
                        "label": "Fused Sentence Fix",
                        "text": "Separate with a period or join with a semicolon/conjunction."
                }
        ],
        "example": "Standard Analysis: 'Faulty: The telescope calibrated, the astronomer took notes. Correction: The telescope calibrated; subsequently, the astronomer took notes.'",
        "basicExample": "Simple Sentence: 'Wrong: I love soccer I play every day. Correct: I love soccer, and I play every day.'",
        "proTip": "Read your writing aloud! If you naturally drop your voice or pause for a breath between two complete thoughts, you need a period or semicolon, not just a comma.",
        "question": "Identify the syntactic error in: 'Although the team practiced relentlessly every day after school.'?",
        "choices": [
                "Run-on sentence",
                "Sentence fragment",
                "Comma splice"
        ],
        "correctIndex": 1,
        "explanation": "The clause begins with the subordinating conjunction 'Although', making it a dependent clause that cannot stand alone as a sentence.",
        "equations": [
            {
                "title": "Complete Sentence Syntactic Axiom",
                "latex": "\\text{Complete Sentence} = \\text{Subject} + \\text{Finite Predicate Verb} + \\text{Complete Independent Proposition}",
                "note": "A fragment fails this test by omitting the subject, verb, or leaving a subordinating clause unattached."
            },
            {
                "title": "Comma Splice Rectification Surgery",
                "latex": "\\text{Clause}_1 \\mathbf{,}\\text{ Clause}_2 \\; [\\text{FAULT}] \\implies \\begin{cases} \\text{Clause}_1 \\mathbf{.}\\text{ Clause}_2 & (\\text{Period Stop}) \\ \\text{Clause}_1 \\mathbf{;}\\text{ Clause}_2 & (\\text{Semicolon Joint}) \\ \\text{Clause}_1 \\mathbf{,} \\text{ FANBOYS Clause}_2 & (\\text{Coordination}) \\end{cases}",
                "note": "Never join two independent clauses with only a comma; choose one of the three canonical fixes."
            },
            {
                "title": "Subordinate Fragment Attachment Law",
                "latex": "\\text{Subordinator} + \\text{Clause}_{\\text{dep}} \\; [\\text{Fragment}] \\xrightarrow{\\text{Attach}} \\text{Subordinator} + \\text{Clause}_{\\text{dep}} + \\mathbf{,} + \\text{Clause}_{\\text{indep}}",
                "note": "'Because it rained.' [Fragment] $\\to$ 'Because it rained, the tennis match was postponed.' [Complete]."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Comma Splice Crash and Three Repair Bridges Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"50\" rx=\"6\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"2\"/><text x=\"230\" y=\"45\" fill=\"#991b1b\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">ERROR: Comma Splice (Two Full Sentences with Just a Comma)</text><text x=\"230\" y=\"63\" fill=\"#b91c1c\" font-size=\"11\" text-anchor=\"middle\">The telescope calibrated <tspan fill=\"#ef4444\" font-weight=\"bold\">, </tspan> the astronomer took notes. ✗</text><rect x=\"25\" y=\"85\" width=\"130\" height=\"95\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"1.5\"/><text x=\"90\" y=\"105\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Fix 1: Period</text><text x=\"90\" y=\"128\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">calibrated<tspan fill=\"#0284c7\" font-weight=\"bold\">.</tspan> The</text><text x=\"90\" y=\"145\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">astronomer took</text><text x=\"90\" y=\"168\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Two Sentences ✓</text><rect x=\"165\" y=\"85\" width=\"130\" height=\"95\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"1.5\"/><text x=\"230\" y=\"105\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Fix 2: Semicolon</text><text x=\"230\" y=\"128\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">calibrated<tspan fill=\"#10b981\" font-weight=\"bold\">;</tspan> the</text><text x=\"230\" y=\"145\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">astronomer took</text><text x=\"230\" y=\"168\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Balanced Joint ✓</text><rect x=\"305\" y=\"85\" width=\"130\" height=\"95\" rx=\"6\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"370\" y=\"105\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Fix 3: , + FANBOYS</text><text x=\"370\" y=\"128\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">calibrated<tspan fill=\"#6b21a8\" font-weight=\"bold\">, and</tspan></text><text x=\"370\" y=\"145\" fill=\"#0f172a\" font-size=\"10\" text-anchor=\"middle\">the astronomer took</text><text x=\"370\" y=\"168\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Coordination ✓</text></svg>",
        "diagramLabel": "Comma splice crash and three repair bridges diagram",
        "diagramCaption": "Repairing comma splices: Two independent clauses cannot be held by a lone comma; repair using a period, a semicolon, or a comma + coordinating conjunction.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of sentence mechanics and correct boundary errors.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Run-on Sentences & Comma Splices", "desc": "Official guide on distinguishing fused sentences, comma splices, and fragments.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/run_ons.html", "icon": "fas fa-university"},
            {"title": "Harvard College Writing Center: Sentence Fragments", "desc": "Guidelines on diagnosing subordinate clauses masquerading as full sentences.", "url": "https://writingcenter.fas.harvard.edu/", "icon": "fas fa-graduation-cap"}
        ],
},
    "Subject-Verb Agreement Issues": {
        "category": "Common Errors Guide",
        "definition": "Subject-verb agreement requires grammatical concord in number (singular vs. plural) and person between the subject and its finite predicate verb. Singular subjects take singular verbs (typically inflected with -s in third-person present, e.g., 'the dog barks'); plural subjects take plural verbs ('the dogs bark'). Complications arise with: (1) Intervening prepositional or parenthetical phrases ('The box of old records is heavy'); (2) Indefinite pronouns ('Each of the candidates has an agenda'); (3) Compound subjects joined by 'or/nor' where the verb agrees with the proximate subject; and (4) Collective nouns.",
        "basicDefinition": "Subject-verb agreement means singular subjects go with singular verbs, and plural subjects go with plural verbs. If one dog barks, you say 'The dog barks.' If three dogs bark, you say 'The dogs bark.' Don't let words in the middle trick you!",
        "breakdown": [
                {
                        "label": "Intervening Phrases",
                        "text": "Ignore prepositional phrases between the subject and verb: 'The leader [of the scouts] is ready.'"
                },
                {
                        "label": "Either / Or Rule",
                        "text": "The verb matches the noun closest to it: 'Neither the coach nor the players were ready.'"
                },
                {
                        "label": "Indefinite Pronouns",
                        "text": "Words like 'each', 'everyone', 'nobody' are grammatically singular and require singular verbs."
                }
        ],
        "example": "Standard Analysis: 'The collection of rare postage stamps <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">was</span> auctioned off.' ('collection' is singular; ignore 'of rare postage stamps').",
        "basicExample": "Simple Sentence: 'The bag of apples <span class=\"example-breakdown-tag\" style=\"background:#dcfce7; color:#166534;\">is</span> on the table.' (The bag is on the table, not the apples).",
        "proTip": "Cross out prepositional phrases in your mind! When checking 'The bouquet of red roses smell/smells nice', cross out 'of red roses'. 'The bouquet smells nice' becomes immediately obvious.",
        "question": "Which sentence displays correct subject-verb agreement?",
        "choices": [
                "The bouquet of yellow sunflowers were placed on the dining table.",
                "The bouquet of yellow sunflowers was placed on the dining table.",
                "The bouquet of yellow sunflowers are placed on the dining table."
        ],
        "correctIndex": 1,
        "explanation": "The true head noun is singular 'bouquet', which governs the singular auxiliary verb 'was'.",
        "equations": [
            {
                "title": "Head Noun Isolation Principle",
                "latex": "\\text{Subject}_{\\text{head}} + [\\text{Prepositional / Modifying Intervening Phrase}] + \\text{Verb} \\implies \\text{Number}(\\text{Verb}) \\equiv \\text{Number}(\\text{Subject}_{\\text{head}})",
                "note": "Example: 'The box [of antique records] is heavy.' Intervening plural nouns do not alter singular agreement."
            },
            {
                "title": "Correlative Proximity Concord Law",
                "latex": "\\text{Either } A \\text{ or } \\mathbf{B} + \\text{Verb} \\implies \\text{Number}(\\text{Verb}) \\equiv \\text{Number}(\\mathbf{B}) \\quad (\\text{Agreement with Closest Subject})",
                "note": "'Neither the teacher nor the students were ready' vs. 'Neither the students nor the teacher was ready'."
            },
            {
                "title": "Indefinite Pronoun Singular Invariance",
                "latex": "\\{\\text{Each}, \\text{Every}, \\text{Everyone}, \\text{Nobody}, \\text{Neither}\\} \\implies \\text{Singular Grammatical Unit} \\implies \\text{Verb}_{(s)}",
                "note": "Indefinite pronouns addressing individuals within a group mandate singular verbs ('Everyone is ready')."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Prepositional Phrase Filter Agreement Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"35\" width=\"115\" height=\"60\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"82\" y=\"60\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">TRUE HEAD NOUN</text><text x=\"82\" y=\"80\" fill=\"#1e3a8a\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">The bouquet</text><rect x=\"155\" y=\"35\" width=\"150\" height=\"60\" rx=\"6\" fill=\"#f1f5f9\" stroke=\"#94a3b8\" stroke-width=\"1.5\" stroke-dasharray=\"4 4\"/><text x=\"230\" y=\"58\" fill=\"#64748b\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">[Filter Out / Ignore]</text><text x=\"230\" y=\"78\" fill=\"#94a3b8\" font-size=\"12\" text-anchor=\"middle\">of yellow roses</text><rect x=\"320\" y=\"35\" width=\"115\" height=\"60\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"2\"/><text x=\"377\" y=\"60\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">MATCHING VERB</text><text x=\"377\" y=\"80\" fill=\"#14532d\" font-size=\"14\" font-weight=\"bold\" text-anchor=\"middle\">smells (Singular)</text><path d=\"M 82 95 C 82 145, 377 145, 377 95\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><rect x=\"165\" y=\"125\" width=\"130\" height=\"30\" rx=\"4\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"1.5\"/><text x=\"230\" y=\"145\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Direct Concord Bridge</text><text x=\"230\" y=\"180\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Common Trap: Don't let plural 'roses' trick you into saying 'smell'!</text></svg>",
        "diagramLabel": "Prepositional phrase filter agreement diagram",
        "diagramCaption": "The Prepositional Phrase Filter: Intervening prepositional phrases ('of yellow roses') must be filtered out; the singular head noun ('bouquet') governs the verb.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1.D", "desc": "Recognize and correct inappropriate shifts in subject-verb concord.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Subject-Verb Agreement Mechanics", "desc": "Authoritative master guide on collective nouns, compound subjects, and inverted word order.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/subject_verb_agreement.html", "icon": "fas fa-university"},
            {"title": "Grammarly Academic: SVA Gotchas & Tricky Subjects", "desc": "Interactive exercises for indefinite pronouns and intervening phrases.", "url": "https://www.grammarly.com/blog/subject-verb-agreement/", "icon": "fas fa-check-double"}
        ],
},
    "Dangling Modifiers": {
        "category": "Common Errors Guide",
        "definition": "Modifiers must logically and syntactically connect to the words they describe. A Dangling Modifier occurs when an introductory participial or prepositional descriptive phrase lacks an explicit, logical subject in the subsequent independent clause. Instead, it unintentionally modifies whatever noun immediately follows the comma. A Misplaced Modifier occurs when descriptive phrases are physically situated too far from their intended referent, creating unintended absurdity or semantic confusion.",
        "basicDefinition": "A dangling modifier happens when a describing phrase starts a sentence, but the person doing the action isn't right after the comma. For example: 'Walking to school, the rain soaked my backpack.' This makes it sound like the rain was walking to school!",
        "breakdown": [
                {
                        "label": "The Golden Rule",
                        "text": "The person or thing performing the introductory action MUST immediately follow the comma."
                },
                {
                        "label": "Dangling Trap",
                        "text": "Putting the object or result first: 'Walking home, my shoe broke.' (Your shoe wasn't walking!)."
                },
                {
                        "label": "Clear Fix",
                        "text": "Name the actor right after the comma: 'Walking home, I broke my shoe.'"
                }
        ],
        "example": "Standard Analysis: 'Flawed: Stargazing through the telescope, Saturn's rings appeared luminous. Revised: Stargazing through the telescope, the astronomer observed Saturn's luminous rings.'",
        "basicExample": "Simple Sentence: 'Wrong: Hungry after soccer, the pizza was eaten quickly. Right: Hungry after soccer, Sam ate the pizza quickly.'",
        "proTip": "Ask yourself: 'Who is actually doing the action in the opening phrase?' Make sure that exact person is named directly after the comma.",
        "question": "Select the sentence that eliminates the dangling modifier.",
        "choices": [
                "Hiking up the steep trail, the summit came into view.",
                "Hiking up the steep trail, we finally spotted the mountain summit.",
                "Hiking up the steep trail, the backpack felt heavy."
        ],
        "correctIndex": 1,
        "explanation": "'we' is the subject actually performing the action of 'hiking up the trail', properly placed directly after the comma.",
        "equations": [
            {
                "title": "Participial Modifier Proximity Law",
                "latex": "[\\text{Introductory Participial Phrase}] \\mathbf{,} \\; \\mathbf{S}_{\\text{actor}} + \\text{Predicate} \\quad (\\mathbf{S}_{\\text{actor}} \\text{ must logically perform action})",
                "note": "The noun immediately following the comma MUST be the agent physically or cognitively doing the introductory action."
            },
            {
                "title": "The Dangling Modifier Pathology",
                "latex": "[\\text{Walking to the bus}] \\mathbf{,} \\; \\text{the rain soaked my backpack.} \\implies \\text{FAULT: The rain cannot walk to the bus!}",
                "note": "Unanchored modifiers create unintentional absurdity or syntactic distortion."
            },
            {
                "title": "Agent Reinsertion Transformation",
                "latex": "\\text{Dangling: } [\\text{Phrase}] \\mathbf{,} \\text{ Object} \\implies \\text{Revised: } [\\text{Phrase}] \\mathbf{,} \\text{ Agent} + V + \\text{Object}",
                "note": "'Having completed the trial, the results were analyzed' $\\to$ 'Having completed the trial, the chemist analyzed the results'."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Dangling Modifier Actor Placement Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"60\" rx=\"6\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"2\"/><text x=\"40\" y=\"50\" fill=\"#991b1b\" font-size=\"11\" font-weight=\"bold\">DANGLING ERROR:</text><text x=\"165\" y=\"50\" fill=\"#7f1d1d\" font-size=\"11\">\"Walking to school, <tspan fill=\"#ef4444\" font-weight=\"bold\">the rain</tspan> soaked my shoes.\"</text><text x=\"230\" y=\"72\" fill=\"#ef4444\" font-size=\"10\" text-anchor=\"middle\">Absurd: This literally states that 'the rain' was walking to school! ✗</text><rect x=\"25\" y=\"100\" width=\"410\" height=\"75\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"2\"/><text x=\"40\" y=\"125\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\">CORRECTED:</text><text x=\"135\" y=\"125\" fill=\"#14532d\" font-size=\"11\">\"Walking to school, <tspan fill=\"#166534\" font-weight=\"bold\">I</tspan> got my shoes soaked by the rain.\"</text><rect x=\"40\" y=\"140\" width=\"380\" height=\"25\" rx=\"4\" fill=\"#ffffff\" stroke=\"#166534\" stroke-width=\"1\"/><text x=\"230\" y=\"157\" fill=\"#166534\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Rule: The actor performing the action ('I') must immediately follow the comma ✓</text></svg>",
        "diagramLabel": "Dangling modifier actor placement diagram",
        "diagramCaption": "Dangling modifier placement: The subject immediately following the comma must be the explicit actor performing the action in the opening phrase.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.7.1.C", "desc": "Recognize and correct misplaced and dangling modifiers in complex syntax.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Dangling Modifiers and How to Fix Them", "desc": "Comprehensive guidelines on participial, infinitive, and elliptical modifier repairs.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/modifiers/dangling_modifiers.html", "icon": "fas fa-university"},
            {"title": "UW-Madison Writing Center: Modifier Clarity Guide", "desc": "Techniques for eliminating misplaced adverbs and dangling introductory clauses.", "url": "https://writing.wisc.edu/handbook/grammar/modifiers/", "icon": "fas fa-pen-alt"}
        ],
},
    "Pronoun-Antecedent Agreement": {
        "category": "Common Errors Guide",
        "definition": "A pronoun must achieve harmonious agreement with its antecedent in person (first, second, third), number (singular vs. plural), and grammatical gender. Singular antecedents mandate singular pronouns; plural antecedents mandate plural pronouns. Common stumbling blocks in academic writing involve singular indefinite pronouns (everyone, anyone, somebody, neither, each), which traditionally demand singular reference (his or her, or the increasingly accepted singular 'they' in non-formal registers), and collective nouns (committee, jury, team), which take 'its' when operating as a single unified entity.",
        "basicDefinition": "A pronoun (like he, she, it, they) must match the noun it replaces in number. If you are talking about one boy, use 'his'. If you are talking about five boys, use 'their'. Don't mix up singular and plural!",
        "breakdown": [
                {
                        "label": "Singular Matching",
                        "text": "One student left his or her jacket. (Singular noun = singular pronoun)."
                },
                {
                        "label": "Plural Matching",
                        "text": "All students completed their projects. (Plural noun = plural pronoun)."
                },
                {
                        "label": "Collective Entities",
                        "text": "The company announced its new product. (Company acts as one singular unit)."
                }
        ],
        "example": "Standard Analysis: 'Each of the delegates voiced <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">his or her</span> objection.' (Singular indefinite pronoun 'Each' requires singular pronoun).",
        "basicExample": "Simple Sentence: 'Every player on the team wore <span class=\"example-breakdown-tag\" style=\"background:#dbeafe; color:#1e40af;\">his</span> jersey.'",
        "proTip": "Watch out for 'Everyone' and 'Everybody'. Even though they feel plural because they refer to a whole group, grammatically they are singular words!",
        "question": "Choose the sentence with correct pronoun-antecedent agreement in formal writing.",
        "choices": [
                "Neither of the girls brought their permission slip.",
                "Neither of the girls brought her permission slip.",
                "Neither of the girls brought they're permission slip."
        ],
        "correctIndex": 1,
        "explanation": "'Neither' is a singular indefinite pronoun, requiring the singular possessive pronoun 'her'.",
        "equations": [
            {
                "title": "Tripartite Antecedent Concord Invariant",
                "latex": "\\text{Pronoun}(P) \\equiv \\text{Antecedent}(A) \\iff \\begin{cases} \\text{Person}(P) = \\text{Person}(A) \\ \\text{Number}(P) = \\text{Number}(A) \\ \\text{Gender}(P) = \\text{Gender}(A) \\end{cases}",
                "note": "Total grammatical harmony across grammatical person (1st/2nd/3rd), number, and gender."
            },
            {
                "title": "Indefinite Pronoun Concord Law",
                "latex": "\\text{Antecedent} \\in \\{\\text{Each}, \\text{Every}, \\text{Anyone}, \\text{Neither}\\} \\implies \\text{Singular Pronoun: } [\\text{'his or her'} \\lor \\text{singular 'they'}]",
                "note": "'Each of the scholars submitted his or her manuscript.' Maintain singular agreement in formal prose."
            },
            {
                "title": "Collective Noun Reference Dichotomy",
                "latex": "\\text{Collective Entity} \\implies \\begin{cases} \\text{'its'} & (\\text{Single Unit: 'The committee published its report'}) \\ \\text{'their'} & (\\text{Individual Members: 'The committee debated their differences'}) \\end{cases}",
                "note": "Governed by whether the group operates as a unified singular body or distinct individuals."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Pronoun-Antecedent Concord Checklist Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"30\" width=\"125\" height=\"65\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"87\" y=\"55\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">ANTECEDENT</text><text x=\"87\" y=\"75\" fill=\"#1e3a8a\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">The Scientist</text><path d=\"M 150 62 L 305 62\" stroke=\"#0284c7\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><rect x=\"310\" y=\"30\" width=\"125\" height=\"65\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><text x=\"372\" y=\"55\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">PRONOUN</text><text x=\"372\" y=\"75\" fill=\"#581c87\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">She / Her</text><rect x=\"25\" y=\"110\" width=\"410\" height=\"70\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"1.5\"/><text x=\"230\" y=\"132\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Concord Verification Checklist</text><text x=\"230\" y=\"152\" fill=\"#0f172a\" font-size=\"11\" text-anchor=\"middle\">Person: Third (3rd) ✓ | Number: Singular (1) ✓ | Gender: Feminine ✓</text><text x=\"230\" y=\"170\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Sentence: \"Before the scientist published the paper, she replicated the trials.\"</text></svg>",
        "diagramLabel": "Pronoun-antecedent concord checklist diagram",
        "diagramCaption": "Pronoun-antecedent agreement: Harmony across person, number, and gender ensures unambiguous, grammatically coherent sentences.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of standard English conventions in pronoun reference.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Pronoun Antecedent Agreement Guide", "desc": "Rules on singular indefinite pronouns, compound antecedents, and vague references.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/pronouns/pronoun_antecedent_agreement.html", "icon": "fas fa-university"},
            {"title": "APA Style Guide: Singular 'They' and Bias-Free Reference", "desc": "Standards for inclusive, precise pronoun reference in academic publications.", "url": "https://apastyle.apa.org/style-grammar-guidelines/grammar/singular-they", "icon": "fas fa-user-check"}
        ],
},
    "Simple, Compound, Complex": {
        "category": "Sentence Structure",
        "definition": "Syntactic variety is the hallmark of mature writing. Sentences are classified into four clause structures: (1) Simple: Contains a single independent clause (subject + predicate + complete thought); (2) Compound: Unites two or more independent clauses joined by a coordinating conjunction (FANBOYS) or semicolon; (3) Complex: Merges one independent clause with at least one dependent clause introduced by a subordinating conjunction or relative pronoun; and (4) Compound-Complex: Integrates two or more independent clauses with one or more dependent clauses.",
        "basicDefinition": "A Simple sentence has one complete thought ('The dog ran'). A Compound sentence joins two sentences with words like 'and' or 'but' ('The dog ran, and the cat watched'). A Complex sentence has one full thought and one helper clue thought ('When the dog ran, the cat watched').",
        "breakdown": [
                {
                        "label": "Simple (1 Independent)",
                        "text": "The spacecraft landed safely on the Martian surface."
                },
                {
                        "label": "Compound (2 Independent)",
                        "text": "The spacecraft landed safely, and the mission control team cheered."
                },
                {
                        "label": "Complex (1 Indep + 1 Dep)",
                        "text": "Although the weather was turbulent, the spacecraft landed safely."
                }
        ],
        "example": "Standard Analysis: 'Complex: Although the manuscript was ancient, its illuminated pages remained vibrant because they were sealed in parchment.'",
        "basicExample": "Simple Sentence: 'Compound: Maya loves drawing, but her brother prefers painting.'",
        "proTip": "Vary your sentence lengths in every paragraph! A paragraph of only short simple sentences feels choppy, while only long sentences can tire the reader.",
        "question": "What structural classification defines: 'We arrived at the observatory before sunset, and we set up the telescope.'?",
        "choices": [
                "Simple sentence",
                "Compound sentence",
                "Complex sentence"
        ],
        "correctIndex": 1,
        "explanation": "Consists of two independent clauses joined by a comma and the coordinating conjunction 'and' (Compound).",
        "equations": [
            {
                "title": "The Four Canonical Clause Formulations",
                "latex": "\\begin{cases} \\text{Simple} & = 1 \\times \\text{Clause}_{\\text{indep}} \\ \\text{Compound} & = \\text{Clause}_{\\text{indep1}} + [\\text{Comma + FANBOYS } \\lor \\text{ Semicolon}] + \\text{Clause}_{\\text{indep2}} \\ \\text{Complex} & = \\text{Clause}_{\\text{indep}} + \\text{Clause}_{\\text{dep}} \\quad (\\text{Subordinating Conjunction}) \\ \\text{Compound-Complex} & \\ge 2 \\times \\text{Clause}_{\\text{indep}} + \\ge 1 \\times \\text{Clause}_{\\text{dep}} \\end{cases}",
                "note": "The complete mathematical taxonomy of English coordination and subordination patterns."
            },
            {
                "title": "Subordinate Clause Dependency Law",
                "latex": "\\text{Clause}_{\\text{dep}} = \\text{Subordinating Conjunction} + \\text{Subject} + \\text{Predicate} \\implies \\text{Incomplete Proposition}",
                "note": "A dependent clause functions syntactically as an adverbial or adjectival modifier of the independent host."
            },
            {
                "title": "Comma Rule for Dependent Clause Placement",
                "latex": "\\begin{cases} \\text{Clause}_{\\text{dep}} + \\mathbf{,} + \\text{Clause}_{\\text{indep}} & (\\text{Introductory dependent clause: Comma mandatory}) \\ \\text{Clause}_{\\text{indep}} + \\text{Clause}_{\\text{dep}} & (\\text{Final dependent clause: Zero comma}) \\end{cases}",
                "note": "'Because it rained, we stayed inside' vs. 'We stayed inside because it rained'."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Four Sentence Types Architectural Blueprint Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"117\" y=\"47\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. SIMPLE SENTENCE</text><text x=\"117\" y=\"68\" fill=\"#1e3a8a\" font-size=\"11\" text-anchor=\"middle\">1 Independent Clause [Subject + Verb]</text><rect x=\"245\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"342\" y=\"47\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. COMPOUND SENTENCE</text><text x=\"342\" y=\"68\" fill=\"#14532d\" font-size=\"11\" text-anchor=\"middle\">Indep 1 + [, and / ;] + Indep 2</text><rect x=\"20\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"117\" y=\"127\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. COMPLEX SENTENCE</text><text x=\"117\" y=\"148\" fill=\"#78350f\" font-size=\"11\" text-anchor=\"middle\">1 Independent + 1 Dependent Clause</text><rect x=\"245\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"342\" y=\"127\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">4. COMPOUND-COMPLEX</text><text x=\"342\" y=\"148\" fill=\"#581c87\" font-size=\"11\" text-anchor=\"middle\">2 Independent + 1+ Dependent Clauses</text></svg>",
        "diagramLabel": "The four sentence types architectural blueprint diagram",
        "diagramCaption": "Sentence Architecture Matrix: Master the 4 clause configurations (Simple, Compound, Complex, and Compound-Complex) to achieve stylistic variety.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of standard English clause structures and sentence variety.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Sentence Types and Syntactic Variety", "desc": "Comprehensive guide on mastering coordinate and subordinate clause configurations.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/sentence_variety/index.html", "icon": "fas fa-university"},
            {"title": "Hesten's Learning Library: Master Clause Architecture", "desc": "Interactive exercises on subordinating conjunctions and clause boundaries.", "url": "/library/index.php?q=clauses", "icon": "fas fa-book"}
        ],
},
    "Active vs. Passive Voice": {
        "category": "Sentence Structure",
        "definition": "Grammatical voice determines the relationship between the predicate verb and its grammatical subject. In Active Voice, the subject acts as the agent performing the action (e.g., 'The architect drafted the blueprints'). Active voice is dynamic, concise, and direct. In Passive Voice, the subject receives the action while the agent is relegated to a prepositional phrase or omitted entirely (e.g., 'The blueprints were drafted by the architect'). Passive voice relies on a form of the auxiliary 'to be' coupled with a past participle. Passive construction is preferred in scientific contexts where the experimenter is secondary to the outcome.",
        "basicDefinition": "In Active Voice, the subject is DOING the action ('The chef cooked the pasta'). In Passive Voice, the subject is RECEIVING the action ('The pasta was cooked by the chef'). Active voice makes writing stronger, faster, and more lively.",
        "breakdown": [
                {
                        "label": "Active (Agent First)",
                        "text": "Subject does the action: The lightning struck the tower."
                },
                {
                        "label": "Passive (Receiver First)",
                        "text": "Subject receives action: The tower was struck by lightning."
                },
                {
                        "label": "Passive Formula",
                        "text": "Form of 'to be' (is, was, were, been) + Past Participle (-ed/-en)."
                }
        ],
        "example": "Standard Analysis: 'Active: The hurricane demolished the coastal barrier. Passive: The coastal barrier was demolished by the hurricane.'",
        "basicExample": "Simple Sentence: 'Active: Lucas kicked the ball. Passive: The ball was kicked by Lucas.'",
        "proTip": "The Zombie Test! If you can add 'by zombies' after the verb, your sentence is in passive voice! Example: 'The town was destroyed [by zombies]' = Passive! 'Zombies destroyed the town' = Active!",
        "question": "Identify the sentence written in active voice.",
        "choices": [
                "The annual research report was completed by the committee.",
                "The committee completed the annual research report.",
                "The annual research report was presented to the board."
        ],
        "correctIndex": 1,
        "explanation": "The subject 'committee' is actively performing the verb 'completed' upon the direct object.",
        "equations": [
            {
                "title": "Active Voice Syntactic Formula",
                "latex": "\\text{Active Voice} = \\mathbf{S}_{\\text{agent}} + \\mathbf{V}_{\\text{transitive}} + \\mathbf{O}_{\\text{recipient}} \\quad (\\mathbf{S}_{\\text{agent}} \\text{ performs the kinetic action})",
                "note": "Direct, energetic, and concise: 'The earthquake (agent) demolished (verb) the bridge (recipient).'"
            },
            {
                "title": "Passive Voice Transformation Algorithm",
                "latex": "\\mathbf{S}_{\\text{agent}} + \\mathbf{V} + \\mathbf{O}_{\\text{recipient}} \\implies \\mathbf{O}_{\\text{recipient}} + [\\text{be}] + \\mathbf{V}_3 (\\text{past participle}) + (\\text{by } \\mathbf{S}_{\\text{agent}})",
                "note": "Relegates the agent to an optional prepositional phrase ('by zombies') or omits it for objective scientific neutrality."
            },
            {
                "title": "The Zombie Test Verification Invariant",
                "latex": "\\text{Passive Voice} \\iff \\text{Verb Phrase} + [\\text{'by zombies'}] \\text{ is syntactically grammatical}",
                "note": "'The experiment was performed [by zombies]' (Grammatical $\\implies$ Passive). 'Zombies performed the experiment' (Active)."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Active vs Passive Voice Kinetic Direction Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"65\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"2\"/><text x=\"40\" y=\"50\" fill=\"#166534\" font-size=\"12\" font-weight=\"bold\">ACTIVE VOICE:</text><text x=\"155\" y=\"50\" fill=\"#14532d\" font-size=\"11\">The chef <tspan font-weight=\"bold\">[Actor]</tspan> prepared <tspan font-weight=\"bold\">[Verb]</tspan> the meal <tspan font-weight=\"bold\">[Object]</tspan>.</text><text x=\"230\" y=\"75\" fill=\"#166534\" font-size=\"10\" text-anchor=\"middle\">Actor leads the sentence → Action flows forward → Punchy and clear ✓</text><rect x=\"25\" y=\"105\" width=\"410\" height=\"75\" rx=\"6\" fill=\"#e0e7ff\" stroke=\"#3730a3\" stroke-width=\"2\"/><text x=\"40\" y=\"130\" fill=\"#3730a3\" font-size=\"12\" font-weight=\"bold\">PASSIVE VOICE:</text><text x=\"165\" y=\"130\" fill=\"#312e81\" font-size=\"11\">The meal <tspan font-weight=\"bold\">[Object]</tspan> was prepared by the chef <tspan font-weight=\"bold\">[Actor]</tspan>.</text><rect x=\"40\" y=\"145\" width=\"380\" height=\"25\" rx=\"4\" fill=\"#ffffff\" stroke=\"#3730a3\" stroke-width=\"1\"/><text x=\"230\" y=\"162\" fill=\"#3730a3\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">The Zombie Test: \"The meal was prepared [by zombies]\" = PASSIVE!</text></svg>",
        "diagramLabel": "Active vs passive voice kinetic direction diagram",
        "diagramCaption": "Active vs. Passive Voice: Active voice propels the actor forward; passive voice focuses on the action recipient with auxiliary 'be' + past participle.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1.D", "desc": "Recognize and correct inappropriate shifts in verb voice across paragraphs.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Active and Passive Voice Guide", "desc": "Clear rules on when to favor active voice in narrative and when to utilize passive in STEM.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/active_and_passive_voice/active_versus_passive_voice.html", "icon": "fas fa-university"},
            {"title": "UNC Writing Center: Passive Voice & Stylistic Impact", "desc": "Diagnostic strategies for identifying passive nominalizations and weak verb phrases.", "url": "https://writingcenter.unc.edu/tips-and-tools/passive-voice/", "icon": "fas fa-pencil-alt"}
        ],
},
    "Parallelism": {
        "category": "Sentence Structure",
        "definition": "Parallelism (parallel structure) is the rhetorical and grammatical alignment of equivalent elements in a sentence. When linking words, phrases, or clauses in a series or comparison, each component must mirror the identical grammatical form (e.g., all gerunds, all infinitive phrases, all prepositional phrases, or all dependent clauses). Faulty parallelism disrupts rhythmic balance, creates syntactic dissonance, and impedes reader processing fluency.",
        "basicDefinition": "Parallel structure means keeping your patterns matching. If you list three actions, they should all be in the same form: 'She likes swimming, running, and biking' (all ending in -ing), NOT 'She likes swimming, running, and to bike'.",
        "breakdown": [
                {
                        "label": "List of Verbs",
                        "text": "Match verb endings: running, jumping, and swimming (not 'and to swim')."
                },
                {
                        "label": "List of Adjectives",
                        "text": "Match descriptors: smart, creative, and energetic."
                },
                {
                        "label": "Correlative Pairs",
                        "text": "What follows 'either' must match what follows 'or': 'either in the hall or in the gym.'"
                }
        ],
        "example": "Standard Analysis: 'Faulty: The athlete excels in sprint races, jumping hurdles, and when he throws javelins. Parallel: The athlete excels in sprinting, jumping hurdles, and throwing javelins.'",
        "basicExample": "Simple Sentence: 'Correct: Leo enjoys reading books, playing games, and watching movies.'",
        "proTip": "When using 'not only... but also', verify that the grammatical structure following 'not only' matches exactly what follows 'but also': 'He was not only talented, but also hardworking.'",
        "question": "Identify the sentence featuring correct parallel structure.",
        "choices": [
                "The internship taught her how to organize files, manage schedules, and client communications.",
                "The internship taught her how to organize files, manage schedules, and communicate with clients.",
                "The internship taught her organizing files, to manage schedules, and client communications."
        ],
        "correctIndex": 1,
        "explanation": "All three listed predicates maintain the identical infinitive verb phrase structure ('to organize...', 'manage...', 'and communicate...').",
        "equations": [
            {
                "title": "Parallel Coordination Homogeneity Law",
                "latex": "\\text{Series} = \\alpha_1 + \\mathbf{,} + \\alpha_2 + \\mathbf{,} + \\text{and } \\alpha_3 \\iff \\text{GrammarType}(\\alpha_1) = \\text{GrammarType}(\\alpha_2) = \\text{GrammarType}(\\alpha_3)",
                "note": "All coordinated list elements must share identical grammatical morphology (all gerunds, all infinitives, all clauses)."
            },
            {
                "title": "Correlative Conjunction Symmetry",
                "latex": "\\text{Either } [\\mathbf{A}] \\text{ or } [\\mathbf{B}] \\quad \\text{and} \\quad \\text{Not only } [\\mathbf{A}] \\text{ but also } [\\mathbf{B}] \\implies \\text{Syntax}(\\mathbf{A}) \\equiv \\text{Syntax}(\\mathbf{B})",
                "note": "What immediately follows the first correlative marker must syntactically mirror what follows the second."
            },
            {
                "title": "Faulty Parallelism Repair Formula",
                "latex": "\\text{Fault: } V_{\\text{-ing}} + V_{\\text{-ing}} + \\text{to-}V \\implies \\text{Repaired: } V_{\\text{-ing}} + V_{\\text{-ing}} + V_{\\text{-ing}} \\quad (\\text{'running, jumping, and swimming'})",
                "note": "Maintains rhythmic cadence and reduces cognitive processing friction for the reader."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Parallel Structure Balance Scale Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><line x1=\"60\" y1=\"90\" x2=\"400\" y2=\"90\" stroke=\"#0284c7\" stroke-width=\"6\" stroke-linecap=\"round\"/><circle cx=\"230\" cy=\"90\" r=\"8\" fill=\"#0284c7\"/><polygon points=\"230,90 215,135 245,135\" fill=\"#64748b\"/><rect x=\"40\" y=\"105\" width=\"110\" height=\"45\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"95\" y=\"125\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">reading</text><text x=\"95\" y=\"140\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">Gerund (-ing)</text><rect x=\"175\" y=\"105\" width=\"110\" height=\"45\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"230\" y=\"125\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">writing</text><text x=\"230\" y=\"140\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">Gerund (-ing)</text><rect x=\"310\" y=\"105\" width=\"110\" height=\"45\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"365\" y=\"125\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">swimming</text><text x=\"365\" y=\"140\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">Gerund (-ing)</text><text x=\"230\" y=\"45\" fill=\"#0284c7\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">Perfect Equilibrium: All Elements Match in Grammatical Form</text><text x=\"230\" y=\"175\" fill=\"#ef4444\" font-size=\"10\" text-anchor=\"middle\">Avoid: \"She loves reading, writing, and to swim\" (Faulty non-parallel infinitive)</text></svg>",
        "diagramLabel": "Parallel structure balance scale diagram",
        "diagramCaption": "Parallelism Equilibrium: Coordinated series items must balance with identical grammatical structure (e.g., all gerunds or all infinitives).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.9-10.1.A", "desc": "Use parallel structure in words, phrases, and coordinated clauses.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Parallel Structure & Cadence", "desc": "Authoritative guide on correlative conjunctions and balanced series parallelism.", "url": "https://owl.purdue.edu/owl/general_writing/grammar/parallel_structure.html", "icon": "fas fa-university"},
            {"title": "Harvard Writing Center: Parallelism & Rhetorical Balance", "desc": "Stylistic techniques for constructing rhythmic, impactful thesis statements.", "url": "https://writingcenter.fas.harvard.edu/", "icon": "fas fa-balance-scale"}
        ],
},
    "Sentence Combining": {
        "category": "Sentence Structure",
        "definition": "Sentence combining is an essential stylistic discipline that merges fragmented or short, repetitive sentences into cohesive, syntactically varied expressions. Strategies include: (1) Subordinating conjunctions to establish cause, condition, or concession; (2) Relative clauses (who, which, that) to embed descriptive identity directly; (3) Appositive phrases to rename nouns concisely; (4) Participial phrases (-ing or -ed) to convey concurrent action; and (5) Compound predicates to streamline shared subjects.",
        "basicDefinition": "Sentence combining means taking short, choppy sentences and joining them into one smooth, interesting sentence. Instead of saying: 'The dog is big. It is brown. It barks.' you can say: 'The big brown dog barks.'",
        "breakdown": [
                {
                        "label": "Using Appositives",
                        "text": "Rename a person with commas: 'Marie Curie, a famous physicist, won two Nobel Prizes.'"
                },
                {
                        "label": "Using Relative Clauses",
                        "text": "Add 'who' or 'which': 'The painting that hung in the gallery was priceless.'"
                },
                {
                        "label": "Using Subordination",
                        "text": "Show reason with 'because', 'although', or 'since'."
                }
        ],
        "example": "Standard Analysis: 'Choppy: The satellite was launched in 1990. It is named Hubble. It has captured deep space images. Combined: Launched in 1990, the Hubble satellite has captured breathtaking deep space images.'",
        "basicExample": "Simple Sentence: 'Combined: Although I was tired, I finished my homework before going to bed.'",
        "proTip": "Watch out for wordiness! When combining sentences, eliminate repetitive words (like 'it was' or 'there is') so your new sentence is smooth and punchy.",
        "question": "What is the most effective and concise combination of: 'The scientist discovered a new element. It was radioactive. She received an award.'?",
        "choices": [
                "The scientist discovered a radioactive element, and she received an award for it.",
                "Having discovered a new radioactive element, the scientist received an award.",
                "The scientist discovered an element, it was radioactive, she got an award."
        ],
        "correctIndex": 1,
        "explanation": "Option 2 utilizes an introductory participial phrase to smoothly combine the actions with maximum conciseness and flow.",
        "equations": [
            {
                "title": "Subordination & Concession Integration Formula",
                "latex": "\\text{Fact}_A + \\text{Fact}_B \\xrightarrow{\\text{Subordination}} \\text{Although } \\text{Fact}_A \\mathbf{,} \\; \\text{Fact}_B \\quad (\\text{Elevates causal logic over choppy prose})",
                "note": "'It was late. We continued.' $\\to$ 'Although it was late, we continued our investigation.'"
            },
            {
                "title": "Participial Phrase Condensation Law",
                "latex": "\\text{Sentence}_1 (\\mathbf{S}_{\\text{actor}} + V) + \\text{Sentence}_2 \\implies [V_{\\text{-ing / -ed}} + \\text{Phrase}] \\mathbf{,} \\; \\mathbf{S}_{\\text{actor}} + \\text{Predicate}_2",
                "note": "'The chemist discovered a compound. She published a report.' $\\to$ 'Having discovered a compound, the chemist published a report.'"
            },
            {
                "title": "Appositive Renaming Reduction",
                "latex": "\\mathbf{S} + [\\text{is } \\mathbf{N}_{\\text{desc}}] + \\text{Sentence}_2 \\implies \\mathbf{S} \\mathbf{,} \\; \\mathbf{N}_{\\text{desc}} \\mathbf{,} \\; \\text{Predicate}_2",
                "note": "'Curie was a physicist. She won two Nobels.' $\\to$ 'Marie Curie, a famous physicist, won two Nobel Prizes.'"
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Sentence Combining Transformer Process Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"130\" height=\"140\" rx=\"6\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"1.5\"/><text x=\"85\" y=\"48\" fill=\"#991b1b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">CHOPPY INPUT</text><text x=\"85\" y=\"75\" fill=\"#7f1d1d\" font-size=\"10\" text-anchor=\"middle\">• The dog is big.</text><text x=\"85\" y=\"95\" fill=\"#7f1d1d\" font-size=\"10\" text-anchor=\"middle\">• The dog is brown.</text><text x=\"85\" y=\"115\" fill=\"#7f1d1d\" font-size=\"10\" text-anchor=\"middle\">• The dog barked.</text><text x=\"85\" y=\"145\" fill=\"#ef4444\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Repetitive &amp; Slow ✗</text><path d=\"M 160 95 L 210 95\" stroke=\"#64748b\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><circle cx=\"235\" cy=\"95\" r=\"22\" fill=\"#0284c7\"/><text x=\"235\" y=\"99\" fill=\"#ffffff\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">COMBINE</text><path d=\"M 260 95 L 295 95\" stroke=\"#64748b\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><rect x=\"305\" y=\"25\" width=\"135\" height=\"140\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"372\" y=\"48\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">ELEGANT OUTPUT</text><rect x=\"315\" y=\"70\" width=\"115\" height=\"55\" rx=\"4\" fill=\"#ffffff\" stroke=\"#166534\" stroke-width=\"1\"/><text x=\"372\" y=\"92\" fill=\"#14532d\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">\"The big brown dog</text><text x=\"372\" y=\"110\" fill=\"#14532d\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">barked loudly.\"</text><text x=\"372\" y=\"145\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Concise &amp; Fluid ✓</text></svg>",
        "diagramLabel": "Sentence combining transformer process diagram",
        "diagramCaption": "Sentence Combining Workflow: Merge repetitive, choppy sentences into unified, expressive statements using appositives, participles, and subordination.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Produce clear and coherent academic writing through varied sentence combining techniques.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Sentence Combining for Reading Fluency", "desc": "Instructional strategies for consolidating clauses and eliminating redundant nominal tokens.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Sentence Combining and Eliminating Wordiness", "desc": "Techniques for trimming verbose prepositional phrases and strengthening predicate verbs.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/sentence_variety/sentence_combining.html", "icon": "fas fa-compress-arrows-alt"}
        ],
},
    "Compound-Complex Sentences": {
        "category": "Sentence Structure",
        "definition": "A compound-complex sentence represents the zenith of sentence architectural complexity. It contains at least two independent clauses (coordinated by a conjunction or semicolon) and at least one dependent clause (introduced by a subordinating conjunction or relative pronoun). Mastering compound-complex structures allows writers to weave multi-layered arguments, illustrating relationships between concurrent conditions, causal roots, and subsequent consequences within a single unified syntactic frame.",
        "basicDefinition": "A compound-complex sentence is a super-sentence! It has at least TWO complete sentences and at least ONE helper clue clause all joined together. It lets you explain big, sophisticated thoughts in one sentence.",
        "breakdown": [
                {
                        "label": "Recipe for Success",
                        "text": "1 Dependent Clause + 2 Independent Clauses joined by FANBOYS/semicolon."
                },
                {
                        "label": "Example Formula",
                        "text": "[Although it was cold (dep)], [we went hiking (indep)], and [we reached the peak (indep)]."
                },
                {
                        "label": "Punctuation Rule",
                        "text": "Use comma after dependent opener, and comma before the coordinating conjunction."
                }
        ],
        "example": "Standard Analysis: 'Although the telescope was initially misaligned (dependent clause), engineers recalibrated the primary optics (independent clause 1), and astronomers subsequently captured unprecedented cosmological data (independent clause 2).'",
        "basicExample": "Simple Sentence: 'Because it was raining outside, we watched a movie, and my dad made fresh popcorn.'",
        "proTip": "Keep your ideas organized! Always place a comma after the opening dependent clause, and a comma before the coordinating conjunction that connects the two independent clauses.",
        "question": "Identify the dependent clause in: 'Because the evidence was compelling, the jury deliberated quickly, and they reached an acquittal.'",
        "choices": [
                "the jury deliberated quickly",
                "Because the evidence was compelling",
                "and they reached an acquittal"
        ],
        "correctIndex": 1,
        "explanation": "'Because the evidence was compelling' begins with the subordinating conjunction 'Because' and cannot stand alone as a complete sentence.",
        "equations": [
            {
                "title": "Compound-Complex Architecture Specification",
                "latex": "\\text{Compound-Complex} = \\underbrace{\\text{Clause}_{\\text{dep}}}_{\\ge 1} + \\underbrace{\\text{Clause}_{\\text{indep1}} + [\\text{Coordination}] + \\text{Clause}_{\\text{indep2}}}_{\\ge 2}",
                "note": "Merges at least one subordinate dependent clause with at least two coordinated independent propositions."
            },
            {
                "title": "Academic Multi-Layered Narrative Model",
                "latex": "[\\text{Context / Condition}]_{Dep} \\mathbf{,} \\; [\\text{Core Event}]_{Indep1} \\mathbf{,} \\text{ and } [\\text{Subsequent Outcome}]_{Indep2}",
                "note": "'Although the optics were distorted, engineers aligned the lasers, and the trial succeeded.'"
            },
            {
                "title": "Dual Boundary Punctuation Invariant",
                "latex": "\\text{Punctuation} = \\begin{cases} \\text{Introductory dependent clause} \\implies \\text{Followed by comma (,)} \\ \\text{Two independent clauses} \\implies \\text{Separated by comma + FANBOYS (or semicolon)} \\end{cases}",
                "note": "Preserves rhythmic pacing and prevents run-on errors across multi-tiered complex sentences."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Compound-Complex Multi-Tier Blueprint Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"410\" height=\"40\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"230\" y=\"48\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. DEPENDENT CLAUSE: \"Although the storm intensified,\"</text><rect x=\"25\" y=\"75\" width=\"195\" height=\"60\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"122\" y=\"98\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. INDEP CLAUSE 1</text><text x=\"122\" y=\"118\" fill=\"#1e3a8a\" font-size=\"10\" text-anchor=\"middle\">the captain steered safely,</text><circle cx=\"230\" cy=\"105\" r=\"14\" fill=\"#10b981\"/><text x=\"230\" y=\"109\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">and</text><rect x=\"240\" y=\"75\" width=\"195\" height=\"60\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"337\" y=\"98\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. INDEP CLAUSE 2</text><text x=\"337\" y=\"118\" fill=\"#1e3a8a\" font-size=\"10\" text-anchor=\"middle\">the crew secured the cargo.</text><rect x=\"25\" y=\"145\" width=\"410\" height=\"35\" rx=\"4\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"1\"/><text x=\"230\" y=\"167\" fill=\"#6b21a8\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Result: Sophisticated, multi-layered sentence conveying condition, action, and consequence ✓</text></svg>",
        "diagramLabel": "Compound-complex multi-tier blueprint diagram",
        "diagramCaption": "Compound-Complex Blueprint: Weave dependent opening conditions with coordinated independent propositions to express intricate cause-and-effect narratives.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.1", "desc": "Demonstrate command of conventions in compound-complex sentence structures.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Purdue OWL: The Four Sentence Structures", "desc": "Comprehensive analysis of compound-complex sentences and coordinating punctuation.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/sentence_variety/index.html", "icon": "fas fa-university"},
            {"title": "Grammarly Academic: Compound-Complex Sentence Master Guide", "desc": "Practical strategies for preventing comma splices in multi-clause sentences.", "url": "https://www.grammarly.com/blog/compound-complex-sentence/", "icon": "fas fa-project-diagram"}
        ],
},
    "Metaphors & Similes": {
        "category": "Figurative Language",
        "definition": "Metaphors and similes are quintessential figurative tropes of comparison. A Simile establishes an explicit comparison between two disparate concepts utilizing comparative markers such as 'like', 'as', or 'resembles' (e.g., 'Her resolve was as unyielding as diamond'). A Metaphor establishes an implicit identity between concepts, directly asserting that one thing IS another (e.g., 'Time is a thief'). Extended metaphors sustain this comparison across an entire stanza, paragraph, or narrative, transferring complex sensory and emotional nuances.",
        "basicDefinition": "Metaphors and similes compare two different things to paint a vivid picture. A simile uses the words 'like' or 'as' ('He is brave like a lion'). A metaphor states directly that one thing IS another ('He is a lion in battle').",
        "breakdown": [
                {
                        "label": "Simile (Uses Like/As)",
                        "text": "Explicit comparison: 'The lake was as smooth as glass.'"
                },
                {
                        "label": "Metaphor (Direct Equivalence)",
                        "text": "Direct statement: 'The classroom was a noisy zoo.'"
                },
                {
                        "label": "Tenor & Vehicle",
                        "text": "Tenor is the real subject; Vehicle is the imaginative image used to describe it."
                }
        ],
        "example": "Standard Analysis: 'Metaphor: The protagonist's mind was an intricate labyrinth of unresolved doubts. Simile: Doubts swirled through his mind like leaves in a November gale.'",
        "basicExample": "Simple Sentence: 'Simile: Her smile was like sunshine. Metaphor: Her smile was pure sunshine.'",
        "proTip": "Avoid dead metaphors and clichés (like 'busy as a bee' or 'light as a feather'). Invent fresh, unexpected comparisons to make your writing truly memorable!",
        "question": "Which of the following is an authentic metaphor?",
        "choices": [
                "The athlete ran like a cheetah across the field.",
                "The athlete was a cheetah sprinting across the field.",
                "The athlete was as agile as a cheetah."
        ],
        "correctIndex": 1,
        "explanation": "'The athlete was a cheetah' directly equates the runner with the animal without using comparative words ('like' or 'as').",
        "equations": [
            {
                "title": "Tenor and Vehicle Dual Mapping Axiom",
                "latex": "\\text{Metaphor} = \\mathbf{T}\\text{enor (Subject)} \\xrightarrow{\\text{Ground (Shared Quality)}} \\mathbf{V}\\text{ehicle (Imaginative Figure)}",
                "note": "Example: 'Time (tenor) is a thief (vehicle)' grounded in stealthy deprivation."
            },
            {
                "title": "Simile vs. Metaphor Equivalence Transform",
                "latex": "\\begin{cases} \\text{Simile: } \\mathbf{T} \\sim \\mathbf{V} & (\\mathbf{T} \\text{ is } [\\text{like / as}] \\; \\mathbf{V} \\implies \\text{Explicit Comparison}) \\ \\text{Metaphor: } \\mathbf{T} \\equiv \\mathbf{V} & (\\mathbf{T} \\text{ is } \\mathbf{V} \\implies \\text{Direct Identity Equivalence}) \\end{cases}",
                "note": "Similes emphasize likeness across differences; metaphors assert direct conceptual identity."
            },
            {
                "title": "Extended Metaphor Conceit Law",
                "latex": "\\text{Extended Conceit} = \\mathbf{T} \\equiv \\mathbf{V} \\implies \\sum_{k=1}^{m} \\text{Attributes}(\\mathbf{V})_k \\text{ map to } \\mathbf{T}",
                "note": "A sustained figurative comparison carried systematically across an entire narrative or poem."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Tenor Vehicle and Ground Intersection Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><circle cx=\"150\" cy=\"95\" r=\"75\" fill=\"#dbeafe\" fill-opacity=\"0.8\" stroke=\"#1e40af\" stroke-width=\"2\"/><circle cx=\"310\" cy=\"95\" r=\"75\" fill=\"#fef3c7\" fill-opacity=\"0.8\" stroke=\"#92400e\" stroke-width=\"2\"/><text x=\"110\" y=\"95\" fill=\"#1e40af\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">TENOR</text><text x=\"110\" y=\"112\" fill=\"#1e3a8a\" font-size=\"10\" text-anchor=\"middle\">(Real Subject)</text><text x=\"110\" y=\"130\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"The Mind\"</text><text x=\"350\" y=\"95\" fill=\"#92400e\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">VEHICLE</text><text x=\"350\" y=\"112\" fill=\"#78350f\" font-size=\"10\" text-anchor=\"middle\">(Figurative Image)</text><text x=\"350\" y=\"130\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"A Labyrinth\"</text><text x=\"230\" y=\"75\" fill=\"#0f172a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">GROUND</text><text x=\"230\" y=\"95\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Twisting Paths</text><text x=\"230\" y=\"110\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Hidden Depths</text><text x=\"230\" y=\"125\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Complexity</text><text x=\"230\" y=\"180\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Metaphor: \"The mind was a labyrinth\" | Simile: \"The mind was like a labyrinth\"</text></svg>",
        "diagramLabel": "Tenor vehicle and ground intersection diagram",
        "diagramCaption": "The Anatomy of Metaphor: The Tenor (literal subject) and Vehicle (figurative image) intersect at the Ground (shared attributes).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.5.A", "desc": "Interpret figures of speech including metaphors and similes in literary context.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Master Guide to Metaphor & Simile", "desc": "Authoritative guide on extended metaphors, conceits, and tenor-vehicle mapping.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/metaphor", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Figurative Language and Rhetorical Tropes", "desc": "Practical strategies for inventing fresh comparisons and avoiding dead clichés.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-feather-alt"}
        ],
},
    "Personification & Hyperbole": {
        "category": "Figurative Language",
        "definition": "Personification and hyperbole infuse descriptive prose with emotional vitality. Personification anthropomorphizes inanimate entities, animals, or abstract forces by attributing human volition, sensation, or psychological states to them (e.g., 'The wind whispered through the pines'). Hyperbole employs intentional, calculated exaggeration for rhetorical emphasis, comedic effect, or poignant pathos (e.g., 'I have waited an eternity'). Hyperbole is not meant to be interpreted literally; its power lies in amplifying subjective experience.",
        "basicDefinition": "Personification gives human traits, feelings, or actions to non-human things (like saying 'The angry storm pounded on the door'). Hyperbole is a huge, fun exaggeration used to make a strong point (like saying 'I'm so hungry I could eat a horse!').",
        "breakdown": [
                {
                        "label": "Personification",
                        "text": "Non-human objects doing human things: 'The alarm clock screamed at me.'"
                },
                {
                        "label": "Hyperbole",
                        "text": "Dramatic exaggeration: 'I've told you a million times!'"
                },
                {
                        "label": "Literary Purpose",
                        "text": "Evokes mood, suspense, humor, or intense emotion in the reader's imagination."
                }
        ],
        "example": "Standard Analysis: 'Personification: The ancient oak groaned as the tempest tore at its branches. Hyperbole: The backpack weighed a metric ton after collecting all the textbooks.'",
        "basicExample": "Simple Sentence: 'The warm sun smiled down on us, and I was so happy I jumped over the moon!'",
        "proTip": "Do not overuse hyperbole in formal essays! While fantastic in creative narratives and speeches, academic research requires measured, evidence-based tone.",
        "question": "Identify the literary device used in: 'Opportunity knocked softly on his door, but he hesitated to answer.'",
        "choices": [
                "Hyperbole",
                "Personification",
                "Simile"
        ],
        "correctIndex": 1,
        "explanation": "The abstract concept of 'opportunity' is depicted performing the human action of knocking on a door (Personification).",
        "equations": [
            {
                "title": "Anthropomorphic Personification Mapping",
                "latex": "\\text{Inanimate Entity} \\oplus \\text{Human Volition / Affect} \\implies \\text{Personified Literary Persona}",
                "note": "'The tempest groaned' or 'Opportunity knocked' maps human psychology onto non-human agents."
            },
            {
                "title": "Hyperbolic Amplification Vector",
                "latex": "\\text{Subjective Reality} \\times \\lambda \\; (\\lambda \\gg 1) \\implies \\text{Rhetorical Hyperbole (Intentional Exaggeration)}",
                "note": "Calculated scalar amplification not intended for literal interpretation: 'I have waited an eternity.'"
            },
            {
                "title": "Literal vs. Figurative Discrepancy",
                "latex": "\\text{Hyperbolic Claim} \\not\\equiv \\text{Empirical Fact} \\quad \\text{while } \\text{Emotional Impact} \\equiv \\text{Maximized}",
                "note": "Hyperbole trades literal accuracy to communicate authentic emotional intensity."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Personification and Hyperbole Contrast Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"2\"/><text x=\"122\" y=\"50\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">PERSONIFICATION</text><text x=\"122\" y=\"70\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Human Traits to Non-Human</text><rect x=\"40\" y=\"85\" width=\"165\" height=\"40\" rx=\"4\" fill=\"#dbeafe\"/><text x=\"122\" y=\"105\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"The wind whispered\"</text><text x=\"122\" y=\"118\" fill=\"#1e3a8a\" font-size=\"9\" text-anchor=\"middle\">(Wind given human voice)</text><text x=\"122\" y=\"150\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Enlivens the setting ✓</text><rect x=\"240\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#8b5cf6\" stroke-width=\"2\"/><text x=\"337\" y=\"50\" fill=\"#8b5cf6\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">HYPERBOLE</text><text x=\"337\" y=\"70\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Mega-Scale Exaggeration</text><rect x=\"255\" y=\"85\" width=\"165\" height=\"40\" rx=\"4\" fill=\"#f3e8ff\"/><text x=\"337\" y=\"105\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"I waited a million years\"</text><text x=\"337\" y=\"118\" fill=\"#581c87\" font-size=\"9\" text-anchor=\"middle\">(Extreme magnification: 1,000,000x)</text><text x=\"337\" y=\"150\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Amplifies emotion ✓</text></svg>",
        "diagramLabel": "Personification and hyperbole contrast diagram",
        "diagramCaption": "Personification vs. Hyperbole: Personification lends human attributes to nature and objects; hyperbole magnifies scale for dramatic resonance.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.5.A", "desc": "Interpret figures of speech including personification and hyperbole.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Academy of American Poets: Personification in Verse", "desc": "Classic and contemporary examples of anthropomorphism and figurative animation.", "url": "https://poets.org/glossary/personification", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Figurative Devices in Creative Writing", "desc": "Guidelines for calibrating hyperbole and rhetorical tone.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-theater-masks"}
        ],
},
    "Idioms & Allusions": {
        "category": "Figurative Language",
        "definition": "Idioms and allusions enrich cultural and intertextual depth. An Idiom is a culturally bound figurative expression whose aggregate meaning cannot be derived from the literal definitions of its constituent words (e.g., 'spill the beans', 'barking up the wrong tree'). An Allusion is a concise, indirect reference to a famous historical figure, biblical passage, mythological event, or classic literary work (e.g., an 'Achilles' heel' signifying a fatal vulnerability). Allusions evoke rich contextual meaning with remarkable brevity.",
        "basicDefinition": "An idiom is a common phrase that doesn't mean what the words literally say (like 'piece of cake' meaning easy, not actual cake!). An allusion is a secret shout-out or reference to a famous story, myth, or historical event (like calling someone a 'Romeo').",
        "breakdown": [
                {
                        "label": "Idioms",
                        "text": "Figurative phrases: 'bite the bullet', 'burn the midnight oil', 'on cloud nine'."
                },
                {
                        "label": "Mythological Allusion",
                        "text": "References to Greek/Roman myths: 'Pandora's box', 'Herculean effort'."
                },
                {
                        "label": "Historical Allusion",
                        "text": "References to events: 'Crossing the Rubicon' (passing a point of no return)."
                }
        ],
        "example": "Standard Analysis: 'Idiom: After hours of debate, they decided to call it a day. Allusion: His hubris proved to be his Achilles' heel during the final debate.'",
        "basicExample": "Simple Sentence: 'Winning the game was a piece of cake (idiom for easy) because our goalie played like Superman (allusion to superhero).' ",
        "proTip": "If you encounter an unfamiliar reference in literature, look it up! Recognizing an allusion often unlocks the deeper theme or moral of the entire story.",
        "question": "What does the idiom 'barking up the wrong tree' mean?",
        "choices": [
                "Chasing an incorrect lead or pursuing a mistaken course of action",
                "Training an energetic hunting dog in the forest",
                "Climbing the tallest oak in the neighborhood"
        ],
        "correctIndex": 0,
        "explanation": "'Barking up the wrong tree' means pursuing a mistaken idea or blaming the wrong person.",
        "equations": [
            {
                "title": "Idiomatic Non-Compositionality Law",
                "latex": "\\text{Meaning}(\\text{Idiom}) \\neq \\sum_{i=1}^{n} \\text{LiteralDefinition}(\\text{Word}_i)",
                "note": "'Bite the bullet' (endure hardship) cannot be calculated from literal teeth and bullets."
            },
            {
                "title": "Allusive Intertextual Reference Mapping",
                "latex": "\\text{Current Prose} \\xrightarrow{\\text{Allusion}} \\text{Mythological / Historical Canon} \\implies \\text{Instant Context Evocation}",
                "note": "Calling a weakness an 'Achilles\' heel' instantly summons the entire Trojan War archetype."
            },
            {
                "title": "Cultural Idiom Decoding Invariant",
                "latex": "\\text{Idiom}(\\text{Surface Words}) \\xrightarrow{\\text{Cultural Heritage Base}} \\text{Intended Pragmatic Message}",
                "note": "Idiomatic comprehension relies on shared cultural transmission rather than literal syntax."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Idiom Iceberg and Allusion Bridge Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"2\"/><text x=\"122\" y=\"48\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">IDIOM ICEBERG</text><polygon points=\"122,65 155,90 90,90\" fill=\"#dbeafe\" stroke=\"#0284c7\"/><text x=\"122\" y=\"82\" fill=\"#1e40af\" font-size=\"9\" font-weight=\"bold\" text-anchor=\"middle\">Literal: cake</text><line x1=\"40\" y1=\"90\" x2=\"205\" y2=\"90\" stroke=\"#0284c7\" stroke-width=\"1.5\" stroke-dasharray=\"3 3\"/><polygon points=\"90,90 155,90 180,140 65,140\" fill=\"#0284c7\"/><text x=\"122\" y=\"115\" fill=\"#ffffff\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">FIGURATIVE</text><text x=\"122\" y=\"132\" fill=\"#e0f2fe\" font-size=\"9\" text-anchor=\"middle\">\"piece of cake\" = easy</text><text x=\"122\" y=\"158\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">True meaning is submerged!</text><rect x=\"240\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#92400e\" stroke-width=\"2\"/><text x=\"337\" y=\"48\" fill=\"#92400e\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">ALLUSION BRIDGE</text><rect x=\"255\" y=\"65\" width=\"165\" height=\"30\" rx=\"4\" fill=\"#fef3c7\"/><text x=\"337\" y=\"84\" fill=\"#92400e\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Modern Text: \"His Achilles' heel\"</text><path d=\"M 337 95 L 337 115\" stroke=\"#92400e\" stroke-width=\"2\" marker-end=\"url(#arrow)\"/><rect x=\"255\" y=\"118\" width=\"165\" height=\"35\" rx=\"4\" fill=\"#dcfce7\"/><text x=\"337\" y=\"134\" fill=\"#166534\" font-size=\"9\" font-weight=\"bold\" text-anchor=\"middle\">Unlocks Ancient Greek Myth:</text><text x=\"337\" y=\"146\" fill=\"#14532d\" font-size=\"9\" text-anchor=\"middle\">A single fatal, hidden weakness</text></svg>",
        "diagramLabel": "Idiom iceberg and allusion bridge diagram",
        "diagramCaption": "Idiom & Allusion Mechanics: Idioms conceal deeper meaning below the literal surface; allusions bridge modern text directly to cultural mythology.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.L.8.5", "desc": "Demonstrate understanding of idioms and historical allusions.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Oxford Dictionary of Cultural Allusions", "desc": "Comprehensive reference catalogue of biblical, mythological, and historical motifs.", "url": "https://www.oxfordreference.com/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Idiomatic Expressions & Cultural Fluency", "desc": "Strategies for interpreting figurative idioms in cross-cultural prose.", "url": "https://owl.purdue.edu/owl/general_writing/mechanics/idioms.html", "icon": "fas fa-quote-left"}
        ],
},
    "Symbolism & Imagery": {
        "category": "Figurative Language",
        "definition": "Symbolism and imagery are the visual and tactile anchors of literature. Imagery employs vivid sensory language appealing directly to the five human senses: visual (sight), auditory (sound), olfactory (smell), gustatory (taste), and tactile/kinesthetic (touch/motion). Symbolism elevates concrete objects, characters, or recurring motifs into representations of deeper abstract realities (e.g., a wilting rose symbolizing transient youth; a lighthouse symbolizing guidance through moral darkness).",
        "basicDefinition": "Imagery is writing that uses sensory words to help you see, hear, smell, taste, or feel the scene in your mind. Symbolism is when a real object stands for a deeper idea (like a white dove standing for peace, or a green light standing for hope).",
        "breakdown": [
                {
                        "label": "The 5 Senses",
                        "text": "Visual (sight), Auditory (sound), Olfactory (smell), Gustatory (taste), Tactile (touch)."
                },
                {
                        "label": "Universal Symbols",
                        "text": "Light = knowledge/goodness; Night/Darkness = fear/unknown; River = journey of life."
                },
                {
                        "label": "Motifs",
                        "text": "A recurring symbol that appears repeatedly throughout a book to reinforce the theme."
                }
        ],
        "example": "Standard Analysis: 'Imagery: The bitter frost crunched beneath her heavy leather boots as the sharp pine scent stung her nostrils. Symbolism: The extinguished lantern marked the demise of hope.'",
        "basicExample": "Simple Sentence: 'The sweet smell of warm cinnamon cookies filled the cozy kitchen while rain tapped on the window.'",
        "proTip": "To identify a symbol in a story, ask: 'Does this object appear more than once? Do characters react to it with unusual emotion?' If yes, it is likely a symbol!",
        "question": "Which sensory modality is invoked by: 'The sizzling skillet released a pungent aroma of garlic and charred onions'?",
        "choices": [
                "Auditory and Olfactory",
                "Tactile and Visual",
                "Kinesthetic only"
        ],
        "correctIndex": 0,
        "explanation": "'Sizzling' stimulates the auditory sense (sound), while 'pungent aroma' stimulates the olfactory sense (smell).",
        "equations": [
            {
                "title": "The 5-Sense Sensory Imagery Vector",
                "latex": "\\text{Imagery} = \\mathbf{V}\\text{isual} \\oplus \\mathbf{A}\\text{uditory} \\oplus \\mathbf{O}\\text{lfactory} \\oplus \\mathbf{G}\\text{ustatory} \\oplus \\mathbf{T}\\text{actile / Kinesthetic}",
                "note": "Multi-sensory perceptual encoding that reconstructs vivid tactile experiences in reader cognition."
            },
            {
                "title": "Symbolic Concrete-to-Abstract Elevation",
                "latex": "\\text{Concrete Physical Artifact} \\xrightarrow{\\text{Context & Repetition}} \\text{Universal Abstract Concept}",
                "note": "A physical green light transcends illumination to signify unreachable future aspirations."
            },
            {
                "title": "The Thematic Leitmotif Equation",
                "latex": "\\text{Motif} = \\sum_{t=1}^{T} \\text{Symbol}_t \\implies \\text{Core Thematic Synthesis}",
                "note": "Systematic recurrence of a symbol across narrative milestones anchors the central message."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Five Senses Imagery and Symbolism Elevation Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"2\"/><text x=\"117\" y=\"48\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">THE 5 SENSES IMAGERY</text><text x=\"117\" y=\"75\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👁 Visual (Sight): <tspan font-weight=\"bold\">golden sunset</tspan></text><text x=\"117\" y=\"95\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👂 Auditory (Sound): <tspan font-weight=\"bold\">roaring waves</tspan></text><text x=\"117\" y=\"115\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👃 Olfactory (Smell): <tspan font-weight=\"bold\">pungent garlic</tspan></text><text x=\"117\" y=\"135\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👅 Gustatory (Taste): <tspan font-weight=\"bold\">sour citrus</tspan></text><text x=\"117\" y=\"155\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">✋ Tactile (Touch): <tspan font-weight=\"bold\">silky velvet</tspan></text><rect x=\"245\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><text x=\"342\" y=\"48\" fill=\"#6b21a8\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">SYMBOLIC ELEVATION</text><rect x=\"260\" y=\"65\" width=\"165\" height=\"30\" rx=\"4\" fill=\"#dbeafe\"/><text x=\"342\" y=\"84\" fill=\"#1e40af\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Concrete Object: A White Dove</text><path d=\"M 342 95 L 342 115\" stroke=\"#6b21a8\" stroke-width=\"2\" marker-end=\"url(#arrow)\"/><rect x=\"260\" y=\"118\" width=\"165\" height=\"35\" rx=\"4\" fill=\"#f3e8ff\"/><text x=\"342\" y=\"134\" fill=\"#6b21a8\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Universal Abstract Idea:</text><text x=\"342\" y=\"148\" fill=\"#581c87\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Peace • Purity • Hope</text></svg>",
        "diagramLabel": "The five senses imagery and symbolism elevation diagram",
        "diagramCaption": "Imagery & Symbolism: Imagery activates the 5 sensory pathways; symbolism elevates a tangible physical object into a profound abstract thesis.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Determine the meaning of words including figurative, connotative, and symbolic meanings.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Literary Devices Encyclopedia: Symbolism & Motifs", "desc": "Exhaustive directory of universal literary archetypes, colors, and recurring motifs.", "url": "https://literarydevices.net/symbolism/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Sensory Details in Descriptive Prose", "desc": "Methods for engaging reader empathy through tactile, olfactory, and auditory imagery.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/paragraphs_and_paragraphing/index.html", "icon": "fas fa-eye"}
        ],
},
    "Alliteration & Onomatopoeia": {
        "category": "Figurative Language",
        "definition": "Alliteration and onomatopoeia manipulate the phonetic acoustics of language to create auditory resonance and evocative rhythm. Alliteration is the repetition of initial consonant sounds across proximate words in a phrase or verse line (e.g., 'wild winds whipped westward'). Onomatopoeia utilizes words whose phonological pronunciation mimics the natural sound of the referent (e.g., 'clatter', 'murmur', 'hiss', 'buzz'). Together, they produce euphonic melody or cacophonic tension in poetry and prose.",
        "basicDefinition": "Alliteration is when words close together start with the same sound ('Peter Piper picked a peck of pickled peppers'). Onomatopoeia is a sound-effect word that sounds like what it means ('boom', 'buzz', 'splash', 'drip').",
        "breakdown": [
                {
                        "label": "Alliteration (Sound Match)",
                        "text": "Same beginning sound: 'Silent snakes slithered softly.' Creates rhythm and mood."
                },
                {
                        "label": "Onomatopoeia (Sound Effect)",
                        "text": "Words mimicking sounds: 'The clock ticked, the floor creaked, and thunder boomed.'"
                },
                {
                        "label": "Poetic Rhythm",
                        "text": "Both devices make sentences musical and memorable when read aloud."
                }
        ],
        "example": "Standard Analysis: 'Alliteration: The dark depths demanded daring decisions. Onomatopoeia: The dry twigs snapped underfoot while the stream bab Ocean gurgled nearby.'",
        "basicExample": "Simple Sentence: 'The big brown bear went splash into the cold river!'",
        "proTip": "Alliteration is about SOUNDS, not letters! 'Photo' and 'phone' alliterate with 'fire' (all start with /f/), but 'cat' and 'city' do NOT alliterate (one is /k/, one is /s/)!",
        "question": "Identify the phrase containing both alliteration and onomatopoeia.",
        "choices": [
                "The bees flew over the red flowers.",
                "The busy bees buzzed briskly between the blossoming buds.",
                "The insects pollinated every plant in the garden."
        ],
        "correctIndex": 1,
        "explanation": "Features alliteration of the /b/ consonant sound ('busy bees buzzed briskly between blossoming buds') and onomatopoeia with the sound word 'buzzed'.",
        "equations": [
            {
                "title": "Acoustic Phoneme Repetition Law",
                "latex": "\\text{Alliteration} \\iff \\text{InitialPhoneme}(W_1) = \\text{InitialPhoneme}(W_2) = \\text{InitialPhoneme}(W_3) \\quad (\\text{Phonetic Sound, not Typography})",
                "note": "'Photo' and 'fire' alliterate (/f/), whereas 'cat' and 'city' do not (/k/ vs. /s/)."
            },
            {
                "title": "Onomatopoeic Echoic Mimesis",
                "latex": "\\text{Pronunciation}(W) \\approx \\text{Acoustic Sound of Referent} \\quad (\\text{'buzz', 'clatter', 'murmur', 'hiss'})",
                "note": "Phonological mimesis where spoken articulation echoes the physical natural event."
            },
            {
                "title": "Euphony vs. Cacophony Phonetic Resonance",
                "latex": "\\begin{cases} \\text{Euphony (Melodic Flow)} & \\implies \\text{Liquids & Nasals: } /l, m, n, r, v, w/ \\ \\text{Cacophony (Harsh Tension)} & \\implies \\text{Plosives: } /p, b, t, d, k, g/ \\end{cases}",
                "note": "Acoustic texture shapes atmospheric tone from pastoral tranquility to violent upheaval."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Acoustic Soundboard Alliteration and Onomatopoeia Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"25\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"2\"/><text x=\"122\" y=\"48\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">ALLITERATION</text><text x=\"122\" y=\"68\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Repeating Initial Sounds</text><path d=\"M 40 100 Q 60 70 80 100 T 120 100 T 160 100 T 200 100\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3\"/><circle cx=\"60\" cy=\"85\" r=\"10\" fill=\"#0284c7\"/><text x=\"60\" y=\"89\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">B</text><circle cx=\"100\" cy=\"85\" r=\"10\" fill=\"#0284c7\"/><text x=\"100\" y=\"89\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">B</text><circle cx=\"140\" cy=\"85\" r=\"10\" fill=\"#0284c7\"/><text x=\"140\" y=\"89\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">B</text><text x=\"122\" y=\"130\" fill=\"#1e3a8a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"Busy bees buzzed\"</text><text x=\"122\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Creates Musical Rhythm ✓</text><rect x=\"240\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#f59e0b\" stroke-width=\"2\"/><text x=\"337\" y=\"48\" fill=\"#d97706\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">ONOMATOPOEIA</text><text x=\"337\" y=\"68\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Sound Effect Words</text><polygon points=\"337,78 350,92 370,85 362,102 380,115 358,118 355,135 340,122 322,132 328,115 310,105 328,95\" fill=\"#fef3c7\" stroke=\"#d97706\" stroke-width=\"1.5\"/><text x=\"342\" y=\"112\" fill=\"#b45309\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">BOOM!</text><text x=\"337\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Word mimics real noise ✓</text></svg>",
        "diagramLabel": "Acoustic soundboard alliteration and onomatopoeia diagram",
        "diagramCaption": "Poetic Sound Devices: Alliteration constructs repeating rhythmic phonetic wave patterns; onomatopoeia mimics physical auditory sounds directly.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Analyze the impact of specific acoustic and rhythmic word choices in poetry and prose.", "url": "/pages/standards.php?domain=ELA-L", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Prosody and Sound Devices", "desc": "Definitive guide on euphony, cacophony, consonance, and alliterative verse.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/alliteration", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Sound Devices and Poetic Texture", "desc": "Techniques for deploying auditory resonance to reinforce literary themes.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/poetry/index.html", "icon": "fas fa-volume-up"}
        ],
},
    // --- ELA LITERATURE LESSONS ---
    "Metaphor & Simile": {
        "category": "Literary Devices",
        "definition": "Metaphors and similes are fundamental figurative tropes of comparative imagery. A Simile creates an explicit comparison between two dissimilar entities utilizing connective prepositions such as 'like' or 'as' (e.g., 'Her resolve was as unyielding as granite'). A Metaphor asserts an implicit ontological identity, directly declaring that one subject IS another (e.g., 'Time is a thief'). Extended metaphors (conceits) sustain this comparative framework across an entire poem, chapter, or dramatic soliloquy, allowing nuanced philosophical and emotional parallels to unfold.",
        "basicDefinition": "A simile compares two things using 'like' or 'as' (e.g. 'He was brave like a lion'). A metaphor compares two things by saying one thing IS another (e.g. 'He was a lion in battle'). Both make writing vivid and exciting.",
        "breakdown": [
            {
                "label": "Simile (Explicit Likeness)",
                "text": "Connects two disparate things with 'like' or 'as' (The sea was as smooth as polished glass)."
            },
            {
                "label": "Metaphor (Direct Identity)",
                "text": "Equates the subject directly with the image without 'like/as' (The sea was a polished sheet of glass)."
            },
            {
                "label": "Tenor, Vehicle, Ground",
                "text": "Tenor is the real subject; Vehicle is the figurative picture; Ground is their shared attribute."
            }
        ],
        "example": "Standard Analysis: 'Simile: The dancer leaped across the stage like an arrow released from a bow. Metaphor: The dancer was an arrow in flight, pure momentum and precision.'",
        "basicExample": "Simple Sentence: 'Simile: Her smile was like bright sunshine. Metaphor: Her smile was pure sunshine.'",
        "proTip": "Never mix your metaphors! Saying 'We must put our shoulder to the wheel and keep our ears to the ground' creates impossible, comical imagery in the reader's imagination.",
        "question": "Which of the following sentences is an authentic literary metaphor?",
        "choices": [
            "His heart was as fragile as porcelain.",
            "His heart was porcelain, easily shattered by cruel words.",
            "His heart beat like a hummingbird's wings."
        ],
        "correctIndex": 1,
        "explanation": "'His heart was porcelain' directly equates the heart with the fragile material without using comparative words ('like' or 'as').",
        "equations": [
            {
                "title": "Tenor and Vehicle Dual Mapping Axiom",
                "latex": "\\text{Metaphor} = \\mathbf{T}\\text{enor} \\xrightarrow{\\text{Ground (Shared Attribute)}} \\mathbf{V}\\text{ehicle} \\quad (\\mathbf{T} \\equiv \\mathbf{V})",
                "note": "The Tenor is the primary subject; the Vehicle is the figurative image; the Ground is the shared property."
            },
            {
                "title": "Simile Comparison Calculus",
                "latex": "\\text{Simile} = \\mathbf{T} \\sim \\mathbf{V} \\iff \\mathbf{T} \\text{ possesses qualities } [\\text{'like' } \\lor \\text{ 'as'}] \\; \\mathbf{V}",
                "note": "Preserves ontological distinction between subjects while mapping vivid sensory likeness."
            },
            {
                "title": "Extended Conceit Propagation Law",
                "latex": "\\text{Extended Conceit} = \\sum_{k=1}^{n} \\text{Attribute}(\\mathbf{V})_k \\to \\text{Attribute}(\\mathbf{T})_k",
                "note": "A sustained metaphor developed across an entire poem, dramatic scene, or novel chapter."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Tenor Vehicle and Ground Venn Architecture Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><circle cx=\"150\" cy=\"95\" r=\"75\" fill=\"#dbeafe\" fill-opacity=\"0.8\" stroke=\"#1e40af\" stroke-width=\"2\"/><circle cx=\"310\" cy=\"95\" r=\"75\" fill=\"#fef3c7\" fill-opacity=\"0.8\" stroke=\"#92400e\" stroke-width=\"2\"/><text x=\"110\" y=\"95\" fill=\"#1e40af\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">TENOR</text><text x=\"110\" y=\"112\" fill=\"#1e3a8a\" font-size=\"10\" text-anchor=\"middle\">(Real Subject)</text><text x=\"110\" y=\"130\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"The Mind\"</text><text x=\"350\" y=\"95\" fill=\"#92400e\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">VEHICLE</text><text x=\"350\" y=\"112\" fill=\"#78350f\" font-size=\"10\" text-anchor=\"middle\">(Figurative Image)</text><text x=\"350\" y=\"130\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\"A Labyrinth\"</text><text x=\"230\" y=\"75\" fill=\"#0f172a\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">GROUND</text><text x=\"230\" y=\"95\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Twisting Paths</text><text x=\"230\" y=\"110\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Hidden Depths</text><text x=\"230\" y=\"125\" fill=\"#065f46\" font-size=\"9\" text-anchor=\"middle\">Complexity</text><text x=\"230\" y=\"180\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Metaphor: \"The mind was a labyrinth\" | Simile: \"The mind was like a labyrinth\"</text></svg>",
        "diagramLabel": "Tenor vehicle and ground Venn architecture diagram",
        "diagramCaption": "The Anatomy of Metaphor: The Tenor (literal subject) and Vehicle (figurative image) intersect at the Ground (shared attributes).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Determine the meaning of words and phrases as they are used in a text, including figurative and connotative meanings.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Guide to Metaphor, Simile, and Conceit", "desc": "Authoritative guide on extended metaphors, conceits, and tenor-vehicle mapping.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/metaphor", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Figurative Language and Rhetorical Tropes", "desc": "Practical strategies for inventing fresh comparisons and avoiding dead clichés.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-feather-alt"}
        ]
    },
    "Imagery & Symbolism": {
        "category": "Literary Devices",
        "definition": "Imagery and symbolism constitute the sensory and thematic scaffolding of literary prose. Imagery engages the reader's five sensory faculties: visual (sight), auditory (sound), olfactory (smell), gustatory (taste), and tactile/kinesthetic (touch and motion). Symbolism elevates tangible physical entities (objects, animals, colors, environmental features) into conduits for universal abstract truths, moral paradoxes, or psychological states (e.g., the green light in The Great Gatsby signifying longing, aspiration, and the elusive American Dream).",
        "basicDefinition": "Imagery uses descriptive sensory words so you can see, hear, smell, taste, or feel the story in your mind. Symbolism is when a real object stands for a deeper, invisible idea (like a white dove standing for peace, or a green light standing for hope).",
        "breakdown": [
            {
                "label": "The Five Senses",
                "text": "Visual (golden glow), Auditory (crackling timber), Olfactory (burnt sugar), Gustatory (tart lemon), Tactile (rough canvas)."
            },
            {
                "label": "Symbolic Elevation",
                "text": "A tangible physical item represents an intangible moral, emotional, or philosophical theme."
            },
            {
                "label": "Leitmotifs",
                "text": "A recurring symbol or sensory pattern that reappears across chapters to reinforce the central message."
            }
        ],
        "example": "Standard Analysis: 'Imagery: The sharp scent of crushed pine needles hung in the icy mountain air as hail clattered against the tin roof. Symbolism: The shattered compass carried by the explorer symbolized his loss of moral direction.'",
        "basicExample": "Simple Sentence: 'The sweet smell of warm cinnamon cookies filled the cozy kitchen while soft rain tapped on the window.'",
        "proTip": "To discover symbols in literature, track recurring objects! If an author repeatedly mentions a ticking clock, an owl, or an unopenable door, ask yourself: 'What deeper concept does this represent?'",
        "question": "Which sensory modality is invoked by: 'The sizzling skillet released a pungent aroma of garlic and charred onions'?",
        "choices": [
            "Auditory and Olfactory",
            "Tactile and Visual",
            "Kinesthetic only"
        ],
        "correctIndex": 0,
        "explanation": "'Sizzling' stimulates the auditory sense (sound), while 'pungent aroma' stimulates the olfactory sense (smell).",
        "equations": [
            {
                "title": "Multi-Sensory Imagery Integration Vector",
                "latex": "\\vec{I} = \\langle \\text{Visual}, \\text{Auditory}, \\text{Olfactory}, \\text{Gustatory}, \\text{Tactile / Kinesthetic} \\rangle",
                "note": "Multi-modal cognitive transduction transporting the reader directly into the tactile scene."
            },
            {
                "title": "Symbolic Elevation Functional Mapping",
                "latex": "f: \\text{Concrete Physical Artifact} \\xrightarrow{\\text{Narrative Context}} \\text{Universal Abstract Concept}",
                "note": "A physical object (green light, mockingbird, scarlet letter) represents an enduring moral truth."
            },
            {
                "title": "Leitmotif Thematic Recurrence Formula",
                "latex": "\\text{Core Theme} \\propto \\sum_{t=1}^{T} \\text{Symbol Occurrence}_t \\quad (\\text{Systematic Motif Recurrence})",
                "note": "Systematic recurrence of a symbol across dramatic turning points cements the author's primary theme."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Sensory Imagery and Symbolic Elevation Prism Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"2\"/><text x=\"117\" y=\"48\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">THE 5 SENSES IMAGERY</text><text x=\"117\" y=\"75\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👁 Visual (Sight): <tspan font-weight=\"bold\">golden sunset</tspan></text><text x=\"117\" y=\"95\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👂 Auditory (Sound): <tspan font-weight=\"bold\">roaring waves</tspan></text><text x=\"117\" y=\"115\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👃 Olfactory (Smell): <tspan font-weight=\"bold\">pungent garlic</tspan></text><text x=\"117\" y=\"135\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">👅 Gustatory (Taste): <tspan font-weight=\"bold\">sour citrus</tspan></text><text x=\"117\" y=\"155\" fill=\"#065f46\" font-size=\"11\" text-anchor=\"middle\">✋ Tactile (Touch): <tspan font-weight=\"bold\">silky velvet</tspan></text><rect x=\"245\" y=\"25\" width=\"195\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><text x=\"342\" y=\"48\" fill=\"#6b21a8\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">SYMBOLIC ELEVATION</text><rect x=\"260\" y=\"65\" width=\"165\" height=\"30\" rx=\"4\" fill=\"#dbeafe\"/><text x=\"342\" y=\"84\" fill=\"#1e40af\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Concrete: A White Dove</text><path d=\"M 342 95 L 342 115\" stroke=\"#6b21a8\" stroke-width=\"2\" marker-end=\"url(#arrow)\"/><rect x=\"260\" y=\"118\" width=\"165\" height=\"35\" rx=\"4\" fill=\"#f3e8ff\"/><text x=\"342\" y=\"134\" fill=\"#6b21a8\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Universal Abstract Idea:</text><text x=\"342\" y=\"148\" fill=\"#581c87\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Peace • Purity • Hope</text></svg>",
        "diagramLabel": "Sensory imagery and symbolic elevation prism diagram",
        "diagramCaption": "Imagery & Symbolism: Imagery activates sensory perception; symbolism elevates tangible artifacts into profound abstract commentary.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Determine the meaning of words and phrases including figurative, connotative, and symbolic meanings.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Literary Devices Encyclopedia: Symbolism, Imagery, and Motifs", "desc": "Comprehensive index of literary archetypes, symbolic colors, and structural imagery.", "url": "https://literarydevices.net/symbolism/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Sensory Details in Descriptive Prose", "desc": "Practical methods for engaging reader senses through tactile, olfactory, and auditory details.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/paragraphs_and_paragraphing/index.html", "icon": "fas fa-eye"}
        ]
    },
    "Foreshadowing & Flashback": {
        "category": "Literary Devices",
        "definition": "Foreshadowing and flashback are structural temporal mechanics that manipulate narrative pacing and reader cognition. Foreshadowing (prolepsis) embeds subtle textual clues, motifs, dialogue hints, or omens that anticipate forthcoming plot climaxes or tragedies. Flashback (analepsis) fractures linear chronological sequence, transporting the narrative focus back in time to illuminate character backstories, foundational traumas, or latent motivations essential for comprehending present actions.",
        "basicDefinition": "Foreshadowing gives readers clues or hints about what is going to happen later in the story to build suspense. A flashback pauses the present story to show an important event that happened in the past.",
        "breakdown": [
            {
                "label": "Foreshadowing (Clues Forward)",
                "text": "Plants subtle hints that prepare the reader for a dramatic future plot twist or revelation."
            },
            {
                "label": "Flashback (Memory Backward)",
                "text": "Interrupts the present timeline to reveal a crucial past event or character backstory."
            },
            {
                "label": "Chekhov's Gun",
                "text": "If a gun is placed on the wall in Chapter 1, it must be fired by Chapter 3—every clue has purpose."
            }
        ],
        "example": "Standard Analysis: 'Foreshadowing: As the ship weighed anchor, the grizzled first mate whispered that no voyage in the November gales had ever returned unscathed. Flashback: Gripping the wheel, the captain remembered the day his father's schooner sank thirty years prior.'",
        "basicExample": "Simple Sentence: 'Foreshadowing: A dark cloud rolled over the picnic just before the storm hit. Flashback: He looked at his bicycle and remembered the day he first learned to ride.'",
        "proTip": "Look for weather shifts! In classic literature, sudden weather changes (fog, rain, unexpected cold fronts) almost always foreshadow emotional conflict or danger for the characters.",
        "question": "If a narrator states: 'I had no idea as I waved goodbye that this would be the final time we would ever speak,' this literary device is:",
        "choices": [
            "Flashback",
            "Foreshadowing",
            "Onomatopoeia"
        ],
        "correctIndex": 1,
        "explanation": "The narrator provides an explicit proleptic hint pointing forward to a permanent separation (Foreshadowing).",
        "equations": [
            {
                "title": "Narrative Chronological Deviation Vector",
                "latex": "T_{\\text{narrative}} = \\begin{cases} t_{\\text{present}} + \\Delta t & (\\text{Foreshadowing / Prolepsis: Clue pointing forward}) \\ t_{\\text{present}} - \\Delta t & (\\text{Flashback / Analepsis: Retrospective memory}) \\end{cases}",
                "note": "Disrupts linear chronological progression to build dramatic tension and reveal character motivation."
            },
            {
                "title": "Chekhov's Gun Dramatic Invariant",
                "latex": "\\text{Element Introduced in Act } 1 \\implies \\text{Discharged in Act } 3 \\quad (\\text{Zero Superfluous Artifacts})",
                "note": "Anton Chekhov's dramatic law: Every foreshadowed token must possess narrative consequence."
            },
            {
                "title": "Dramatic Suspense Delta Equation",
                "latex": "\\Delta_{\\text{suspense}} = \\text{Knowledge}_{\\text{reader}} - \\text{Knowledge}_{\\text{character}}",
                "note": "Foreshadowing grants the reader predictive insight, creating suspense as characters approach danger."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Narrative Timeline Axis Foreshadowing and Flashback Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><line x1=\"40\" y1=\"100\" x2=\"420\" y2=\"100\" stroke=\"#64748b\" stroke-width=\"4\" stroke-linecap=\"round\"/><circle cx=\"230\" cy=\"100\" r=\"10\" fill=\"#0284c7\"/><text x=\"230\" y=\"130\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">PRESENT TIME</text><path d=\"M 230 85 C 170 30, 110 30, 80 85\" fill=\"none\" stroke=\"#8b5cf6\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><circle cx=\"80\" cy=\"100\" r=\"7\" fill=\"#8b5cf6\"/><text x=\"155\" y=\"40\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">FLASHBACK (Look Back)</text><text x=\"80\" y=\"130\" fill=\"#581c87\" font-size=\"10\" text-anchor=\"middle\">Past Backstory</text><path d=\"M 230 85 C 290 30, 350 30, 380 85\" fill=\"none\" stroke=\"#f59e0b\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><circle cx=\"380\" cy=\"100\" r=\"7\" fill=\"#f59e0b\"/><text x=\"305\" y=\"40\" fill=\"#b45309\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">FORESHADOWING (Hint Forward)</text><text x=\"380\" y=\"130\" fill=\"#78350f\" font-size=\"10\" text-anchor=\"middle\">Future Climax Clue</text><text x=\"230\" y=\"175\" fill=\"#475569\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Manipulates chronological time to build suspense and deepen character empathy ✓</text></svg>",
        "diagramLabel": "Narrative timeline axis foreshadowing and flashback diagram",
        "diagramCaption": "The Narrative Timeline Axis: Flashbacks loop backward to uncover foundational backstory; foreshadowing casts clues forward to engineer suspense.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Compare and contrast the structure of texts and analyze how structural choices create mystery or tension.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "MasterClass Literature: Chekhov's Gun & Foreshadowing", "desc": "Dramatic principles of foreshadowing, narrative plants, and payoffs in fiction.", "url": "https://www.masterclass.com/articles/writing-101-what-is-foreshadowing", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Chronology, Pacing, and Flashbacks", "desc": "Guide on managing narrative time transitions smoothly without disorienting the reader.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-history"}
        ]
    },
    "Irony & Satire": {
        "category": "Literary Devices",
        "definition": "Irony and satire exploit incongruity between expectation and reality for dramatic, critical, or comedic effect. Irony manifests across three primary modes: Verbal Irony (stating the opposite of literal meaning, including sarcasm), Situational Irony (an outcome diametrically opposed to what logic dictates), and Dramatic Irony (the audience possesses critical foreknowledge unknown to the characters). Satire is a socially conscious rhetorical genre that utilizes irony, parody, hyperbole, and ridicule to expose, censure, and reform human vices, moral hypocrisy, or institutional corruption.",
        "basicDefinition": "Irony happens when the opposite of what you expect occurs (like a fire station catching on fire!). Satire uses humor, exaggeration, or sarcasm to tease and fix foolish human behavior or unfair rules in society.",
        "breakdown": [
            {
                "label": "Verbal Irony",
                "text": "Saying one thing while meaning the exact opposite (e.g., calling a blizzard 'gorgeous weather')."
            },
            {
                "label": "Situational Irony",
                "text": "The real outcome directly contradicts logical expectations (e.g., a pilot having a fear of heights)."
            },
            {
                "label": "Dramatic Irony",
                "text": "The reader knows a crucial secret that the character does not know yet, creating suspense."
            }
        ],
        "example": "Standard Analysis: 'Situational Irony: The cybersecurity expert had his personal accounts hacked using the password '12345'. Satire: George Orwell's 'Animal Farm' satirizes totalitarianism by depicting farm animals running an oppressive government.'",
        "basicExample": "Simple Sentence: 'Irony: A tow truck getting stuck in the mud and needing a tow truck! Satire: A funny cartoon showing people glued to their phones at a nature park.'",
        "proTip": "Remember: Sarcasm is just one small type of verbal irony! Situational irony requires an unexpected plot twist, not just bad luck (rain on your wedding day is unfortunate, but not irony unless you married a meteorologist who guaranteed sunshine!).",
        "question": "A professional marriage counselor filing for divorce is an example of:",
        "choices": [
            "Dramatic Irony",
            "Situational Irony",
            "Verbal Irony"
        ],
        "correctIndex": 1,
        "explanation": "It is Situational Irony because the outcome is the exact opposite of what professional expectations anticipate.",
        "equations": [
            {
                "title": "The Tripartite Irony Matrix",
                "latex": "\\text{Irony} = \\begin{cases} \\text{Verbal} & \\iff \\text{Expression} \\neq \\text{Intended Meaning (Sarcasm)} \\ \\text{Situational} & \\iff \\text{Actual Outcome} \\equiv \\neg(\\text{Expected Outcome}) \\ \\text{Dramatic} & \\iff \\text{Audience Insight} > \\text{Character Insight} \\end{cases}",
                "note": "The fundamental taxonomy of ironic dissonance between expectation and reality."
            },
            {
                "title": "Satirical Moral Critique Formulation",
                "latex": "\\text{Satire} = \\text{Ridicule / Exaggeration} \\times \\text{Ethical Reform Purpose} \\implies \\text{Societal Correction}",
                "note": "Satire differs from gratuitous mockery by possessing a constructive moral purpose."
            },
            {
                "title": "Horatian vs. Juvenalian Satire Spectrum",
                "latex": "\\text{Satirical Register} = \\begin{cases} \\text{Horatian} & (\\text{Playful, gentle, amused ridicule of human foibles}) \\ \\text{Juvenalian} & (\\text{Biting, indignant, harsh condemnation of corruption}) \\end{cases}",
                "note": "Example: Pope's 'Rape of the Lock' (Horatian) vs. Swift's 'A Modest Proposal' (Juvenalian)."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Three Types of Irony and Satirical Lens Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"125\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#0284c7\" stroke-width=\"2\"/><text x=\"82\" y=\"48\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. VERBAL IRONY</text><rect x=\"30\" y=\"65\" width=\"105\" height=\"40\" rx=\"4\" fill=\"#dbeafe\"/><text x=\"82\" y=\"85\" fill=\"#1e40af\" font-size=\"10\" text-anchor=\"middle\">\"Lovely storm!\"</text><text x=\"82\" y=\"98\" fill=\"#1e3a8a\" font-size=\"8\" text-anchor=\"middle\">(Means awful)</text><text x=\"82\" y=\"130\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Said vs. Meant</text><text x=\"82\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Sarcasm ✓</text><rect x=\"165\" y=\"25\" width=\"130\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#10b981\" stroke-width=\"2\"/><text x=\"230\" y=\"48\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. SITUATIONAL</text><rect x=\"175\" y=\"65\" width=\"110\" height=\"40\" rx=\"4\" fill=\"#dcfce7\"/><text x=\"230\" y=\"85\" fill=\"#166534\" font-size=\"10\" text-anchor=\"middle\">Fire station burns</text><text x=\"230\" y=\"98\" fill=\"#14532d\" font-size=\"8\" text-anchor=\"middle\">(Opposite outcome)</text><text x=\"230\" y=\"130\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Expect vs. Occur</text><text x=\"230\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Plot Twist ✓</text><rect x=\"315\" y=\"25\" width=\"125\" height=\"145\" rx=\"6\" fill=\"#ffffff\" stroke=\"#6b21a8\" stroke-width=\"2\"/><text x=\"377\" y=\"48\" fill=\"#6b21a8\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. DRAMATIC</text><rect x=\"325\" y=\"65\" width=\"105\" height=\"40\" rx=\"4\" fill=\"#f3e8ff\"/><text x=\"377\" y=\"85\" fill=\"#6b21a8\" font-size=\"10\" text-anchor=\"middle\">Reader knows</text><text x=\"377\" y=\"98\" fill=\"#581c87\" font-size=\"8\" text-anchor=\"middle\">the monster is hiding</text><text x=\"377\" y=\"130\" fill=\"#475569\" font-size=\"9\" text-anchor=\"middle\">Reader vs. Actor</text><text x=\"377\" y=\"155\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Suspense ✓</text></svg>",
        "diagramLabel": "The three types of irony and satirical lens diagram",
        "diagramCaption": "The Tripartite Irony Matrix: Verbal (words mean the opposite), Situational (events invert expectation), and Dramatic (audience knows what characters do not).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.6", "desc": "Analyze how an author develops point of view and creates effects such as suspense or humor through irony.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Oxford Reference: Guide to Literary Irony and Satire", "desc": "Scholarly guide on Horatian and Juvenalian satire, parodic subversion, and comic irony.", "url": "https://www.oxfordreference.com/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Literary Devices: Irony, Parody, and Satire", "desc": "Techniques for analyzing situational reversals and satirical social commentary.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-theater-masks"}
        ]
    },
    "Protagonist & Antagonist": {
        "category": "Character Analysis",
        "definition": "The protagonist and antagonist form the central dynamic axis of dramatic friction in literary fiction. The Protagonist is the principal agent whose desires, decisions, and psychological journey propel the plot forward. They are not required to be morally virtuous (e.g., tragic antiheroes like Macbeth or Walter White), but must possess clear agency and stakes. The Antagonist is the primary entity, individual, or systemic force that actively opposes the protagonist's goal, creating the obstacles necessary for dramatic conflict and thematic resolution.",
        "basicDefinition": "The protagonist is the main character who drives the story and faces the central problem. The antagonist is the person, villain, or force working against them to create conflict.",
        "breakdown": [
            {
                "label": "The Protagonist (Central Agency)",
                "text": "The main character whose pursuit of a core goal drives every major decision in the plot."
            },
            {
                "label": "The Antagonist (Opposing Force)",
                "text": "The person, creature, or system standing directly between the protagonist and their goal."
            },
            {
                "label": "Non-Human Antagonists",
                "text": "Antagonists can be harsh weather (nature), corrupt laws (society), or internal guilt (self)."
            }
        ],
        "example": "Standard Analysis: 'In Sophocles' 'Antigone', Antigone is the protagonist driven by sacred familial duty, while King Creon serves as the antagonist enforcing rigid civil edicts. In Melville's 'Moby-Dick', Captain Ahab pursues the titular white whale as his cosmic antagonist.'",
        "basicExample": "Simple Sentence: 'In the story, Sarah (the protagonist) worked hard to win the science fair, while Marcus (the antagonist) tried to sabotage her project.'",
        "proTip": "Remember that an antagonist doesn't have to be evil! In many sophisticated stories, the antagonist is simply someone with a competing, understandable goal that directly clashes with the protagonist's desire.",
        "question": "Is an antagonist in literature always a human villain?",
        "choices": [
            "Yes, stories require a human villain to create conflict.",
            "No, an antagonist can be a force of nature, a societal system, or internal self-doubt.",
            "Yes, an antagonist must always commit a crime."
        ],
        "correctIndex": 1,
        "explanation": "An antagonist is simply the opposing force hindering the protagonist, which can be nature (a storm), society (an unjust law), or internal struggle.",
        "equations": [
            {
                "title": "Narrative Agency and Kinetic Desire Model",
                "latex": "\\text{Protagonist} = \\mathbf{C}_{\\text{core}} \\implies \\text{Goal}(G) + \\text{Motive}(M) \\quad (\\text{Primary Kinetic Driver})",
                "note": "The protagonist is defined by having the primary desire and agency driving the narrative trajectory."
            },
            {
                "title": "Dramatic Conflict Vector Collision",
                "latex": "\\text{Dramatic Tension} = \\vec{V}(\\text{Protagonist Goal}) \\cdot \\vec{V}(\\text{Antagonist Resistance}) < 0",
                "note": "Dramatic conflict occurs when the vectors of protagonist desire and antagonist opposition directly collide."
            },
            {
                "title": "Antagonist Ontological Spectrum",
                "latex": "\\text{Antagonist} = \\begin{cases} \\text{Personal Adversary} & (\\text{Iago, Voldemort}) \\ \\text{Environmental Force} & (\\text{The Sea in 'The Old Man and the Sea'}) \\ \\text{Institutional System} & (\\text{The Capitol in 'The Hunger Games'}) \\ \\text{Internal Demon} & (\\text{Guilt in 'Macbeth'}) \\end{cases}",
                "note": "An antagonist spans interpersonal, environmental, systemic, and psychological dimensions."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Protagonist and Antagonist Collision Vectors Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><circle cx=\"100\" cy=\"95\" r=\"45\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"2\"/><text x=\"100\" y=\"90\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">PROTAGONIST</text><text x=\"100\" y=\"108\" fill=\"#1e3a8a\" font-size=\"9\" text-anchor=\"middle\">Core Desire →</text><path d=\"M 155 95 L 210 95\" stroke=\"#1e40af\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><circle cx=\"360\" cy=\"95\" r=\"45\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"2\"/><text x=\"360\" y=\"90\" fill=\"#991b1b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">ANTAGONIST</text><text x=\"360\" y=\"108\" fill=\"#7f1d1d\" font-size=\"9\" text-anchor=\"middle\">← Resistance Force</text><path d=\"M 305 95 L 250 95\" stroke=\"#ef4444\" stroke-width=\"3\" marker-end=\"url(#arrow)\"/><polygon points=\"230,70 240,90 260,95 240,105 230,125 220,105 200,95 220,90\" fill=\"#f59e0b\" stroke=\"#d97706\" stroke-width=\"1.5\"/><text x=\"230\" y=\"150\" fill=\"#b45309\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">CENTRAL CONFLICT</text><text x=\"230\" y=\"175\" fill=\"#475569\" font-size=\"10\" text-anchor=\"middle\">Direct collision between Protagonist Desire and Antagonist Barrier ✓</text></svg>",
        "diagramLabel": "Protagonist and antagonist collision vectors diagram",
        "diagramCaption": "The Collision Axis: Dramatic narrative energy is generated when the protagonist's forward desire directly impacts the antagonist's resistance force.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.3", "desc": "Analyze how lines of dialogue or incidents in a story propel the action and reveal character motivation.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "MasterClass Literature: Protagonist vs. Antagonist Dynamics", "desc": "Crafting compelling multi-layered antagonists with sympathetic motives.", "url": "https://www.masterclass.com/articles/protagonist-vs-antagonist", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Developing Compelling Characters in Fiction", "desc": "Techniques for aligning protagonist stakes with antagonist opposition.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-user-ninja"}
        ]
    },
    "Character Archetypes": {
        "category": "Character Analysis",
        "definition": "Character archetypes are universal, primordial character models identified by analytical psychologist Carl Jung and comparative mythologist Joseph Campbell that recur across world mythologies, folklore, and modern literature. Rather than flat clichés, archetypes represent foundational psychological instincts, social roles, and narrative functions within the monomyth (The Hero's Journey). Essential archetypal dramatis personae include: The Hero (seeker of transformation), The Mentor (wise conduit of knowledge), The Shadow (manifestation of unintegrated darkness), The Trickster (agent of comedic disruption and subversion), and The Threshold Guardian (tester of worthiness).",
        "basicDefinition": "Character archetypes are universal story templates that appear across all cultures—like the brave Hero, the wise Mentor who gives advice, or the mischievous Trickster who breaks rules.",
        "breakdown": [
            {
                "label": "The Hero & Mentor",
                "text": "The Hero embarks on the quest; the Mentor (like Dumbledore or Athena) provides guidance and training."
            },
            {
                "label": "The Shadow & Trickster",
                "text": "The Shadow reflects dark suppressed desires; the Trickster (like Loki or Bugs Bunny) uses wit to mock ego."
            },
            {
                "label": "Threshold Guardians",
                "text": "Obstacles and gatekeepers who test the hero's strength and commitment before entering new worlds."
            }
        ],
        "example": "Standard Analysis: 'In Homer's 'Odyssey', Odysseus is the Trickster-Hero, Athena serves as the divine Mentor, and the Cyclops acts as a monstrous Threshold Guardian. In 'The Lion King', Simba is the Hero, Rafiki is the Mentor, and Scar represents the Shadow.'",
        "basicExample": "Simple Sentence: 'Yoda is the Mentor who teaches Luke Skywalker (the Hero) how to use the Force to defeat the Shadow.'",
        "proTip": "Great authors subvert archetypes! A mentor who turns out to be secretive, or a villain who acts as an unexpected teacher makes characters feel realistic and memorable.",
        "question": "Which character archetype describes an eccentric figure who uses mischief, humor, and cunning to expose foolish rules?",
        "choices": [
            "The Mentor",
            "The Trickster",
            "The Threshold Guardian"
        ],
        "correctIndex": 1,
        "explanation": "The Trickster archetype disrupts status quo situations using wit, humor, and cunning to challenge authority.",
        "equations": [
            {
                "title": "Jungian Collective Unconscious Archetype Mapping",
                "latex": "\\text{Archetype} = f(\\text{Collective Unconscious}) \\implies \\text{Universal Cross-Cultural Resonance}",
                "note": "Carl Jung's analytical model: Archetypes draw upon universal human psychological templates."
            },
            {
                "title": "The Campbellian Monomyth Distribution",
                "latex": "\\text{Character Cast} = \\{\\text{Hero}, \\text{Mentor}, \\text{Shadow}, \\text{Guardian}, \\text{Herald}, \\text{Trickster}, \\text{Shapeshifter}\\}",
                "note": "Joseph Campbell's classic dramatis personae distribution in 'The Hero with a Thousand Faces'."
            },
            {
                "title": "Modern Subversion Equation",
                "latex": "\\text{Complex Character} = \\text{Base Archetype} \\oplus \\text{Psychological Idiosyncrasy} \\quad (\\text{Subverts Trope Cliché})",
                "note": "Elevates characters beyond flat tropes by adding internal conflict and unexpected vulnerabilities."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Monomyth Archetypal Wheel Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><circle cx=\"230\" cy=\"95\" r=\"75\" fill=\"none\" stroke=\"#cbd5e1\" stroke-width=\"2\" stroke-dasharray=\"4 4\"/><circle cx=\"230\" cy=\"95\" r=\"28\" fill=\"#0284c7\"/><text x=\"230\" y=\"99\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">THE HERO</text><circle cx=\"230\" cy=\"25\" r=\"20\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"230\" y=\"29\" fill=\"#166534\" font-size=\"8\" font-weight=\"bold\" text-anchor=\"middle\">MENTOR</text><circle cx=\"230\" cy=\"165\" r=\"20\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"1.5\"/><text x=\"230\" y=\"169\" fill=\"#991b1b\" font-size=\"8\" font-weight=\"bold\" text-anchor=\"middle\">SHADOW</text><circle cx=\"155\" cy=\"95\" r=\"20\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"155\" y=\"99\" fill=\"#92400e\" font-size=\"8\" font-weight=\"bold\" text-anchor=\"middle\">ALLY</text><circle cx=\"305\" cy=\"95\" r=\"20\" fill=\"#f3e8ff\" stroke=\"#6b21a8\" stroke-width=\"1.5\"/><text x=\"305\" y=\"99\" fill=\"#6b21a8\" font-size=\"8\" font-weight=\"bold\" text-anchor=\"middle\">TRICKSTER</text><text x=\"230\" y=\"190\" fill=\"#64748b\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Universal Character Cast: The Hero surrounded by psychological catalysts ✓</text></svg>",
        "diagramLabel": "The monomyth archetypal wheel diagram",
        "diagramCaption": "The Archetypal Orbit: The Hero occupies the center of the journey, surrounded by catalysts of wisdom (Mentor), opposition (Shadow), subversion (Trickster), and loyalty (Ally).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.9", "desc": "Analyze how modern fiction draws upon themes and character types from traditional mythologies.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Joseph Campbell Foundation: The Monomyth Framework", "desc": "Archetypes of the collective unconscious in 'The Hero with a Thousand Faces'.", "url": "https://www.jcf.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Archetypal Literary Criticism", "desc": "Academic guide on applying Jungian archetypes to narrative deconstruction.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/writing_in_literature/literary_theory_and_schools_of_criticism/mythological_criticism.html", "icon": "fas fa-theater-masks"}
        ]
    },
    "Character Development Arc": {
        "category": "Character Analysis",
        "definition": "A character development arc tracks the internal moral, psychological, or emotional evolution a character experiences over the course of a narrative. In contrast to Static characters who maintain an unchanging disposition throughout (e.g., Sherlock Holmes), Dynamic characters undergo fundamental transformation precipitated by plot crises. In classic dramatic architecture, an arc progresses through three phases: (1) The Exposition/Status Quo governed by an internal flaw or false belief; (2) The Crisis Ordeal where the flaw causes disaster; and (3) The Transformation where the character adopts a higher truth or tragically succumbs to moral collapse.",
        "basicDefinition": "A character arc is the personal growth or change a character goes through from the start to the end of a story (like moving from selfish to generous, or from fearful to courageous).",
        "breakdown": [
            {
                "label": "Dynamic vs. Static",
                "text": "Dynamic characters grow and change internally; static characters remain unchanged throughout the plot."
            },
            {
                "label": "The False Belief (The Lie)",
                "text": "The flaw or mistaken worldview the character holds at the start of their journey."
            },
            {
                "label": "The Epiphany / Shift",
                "text": "The dramatic trial that shatters the false belief and enables emotional maturity."
            }
        ],
        "example": "Standard Analysis: 'In Dickens' 'A Christmas Carol', Ebenezer Scrooge experiences a dramatic positive redemption arc, evolving from a misanthropic miser into a philanthropic champion. In Shakespeare's 'Macbeth', the protagonist undergoes a tragic degeneration arc from noble warrior to paranoid tyrant.'",
        "basicExample": "Simple Sentence: 'At first, Leo was too scared to speak up. But after saving his friend on the hiking trip, he became confident and brave.'",
        "proTip": "Look for the Epiphany! An epiphany is the lightbulb moment where a character realizes their mistake. That moment marks the turning point of their character arc.",
        "question": "What is a literary character called who undergoes a profound, permanent internal transformation during a story?",
        "choices": [
            "Static character",
            "Dynamic character",
            "Flat character"
        ],
        "correctIndex": 1,
        "explanation": "Dynamic characters undergo meaningful internal evolution, moral growth, or psychological change throughout the narrative.",
        "equations": [
            {
                "title": "Dynamic Character Arc Differential",
                "latex": "\\Delta \\text{Character} = \\text{State}_{\\text{climax}} - \\text{State}_{\\text{exposition}} \\neq 0 \\implies \\text{Dynamic Growth / Fall}",
                "note": "Dynamic characters demonstrate internal transformation; static characters maintain invariant internal equilibrium."
            },
            {
                "title": "The Lie vs. Truth Transformation Equilibrium",
                "latex": "\\text{Transformation Arc} = \\text{The Lie Believed} \\xrightarrow{\\text{Narrative Crisis Ordeal}} \\text{The Truth Realized}",
                "note": "The protagonist begins governed by a flawed belief, which the narrative ordeal shatters and reconfigures."
            },
            {
                "title": "Forster Dimensionality Invariant",
                "latex": "\\text{Character Depth} = \\begin{cases} \\text{Flat} & \\iff \\text{Defined by a single recurring trait / easily summarized} \\ \\text{Round} & \\iff \\text{Multi-dimensional, capable of surprising the reader convincingly} \\end{cases}",
                "note": "E.M. Forster's classic distinction in 'Aspects of the Novel'."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Character Development Arc Coordinate Curve Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><line x1=\"40\" y1=\"160\" x2=\"420\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\" stroke-linecap=\"round\"/><line x1=\"40\" y1=\"160\" x2=\"40\" y2=\"30\" stroke=\"#64748b\" stroke-width=\"2\" stroke-linecap=\"round\"/><text x=\"35\" y=\"25\" fill=\"#475569\" font-size=\"9\" font-weight=\"bold\">Internal Growth / Maturity</text><text x=\"380\" y=\"175\" fill=\"#475569\" font-size=\"9\" font-weight=\"bold\">Plot Timeline →</text><path d=\"M 50 145 C 130 145, 180 125, 230 85 S 340 45, 410 45\" fill=\"none\" stroke=\"#10b981\" stroke-width=\"3.5\"/><circle cx=\"50\" cy=\"145\" r=\"5\" fill=\"#1e40af\"/><text x=\"50\" y=\"130\" fill=\"#1e40af\" font-size=\"9\" font-weight=\"bold\">Start: Flaw / Lie</text><circle cx=\"230\" cy=\"85\" r=\"6\" fill=\"#f59e0b\"/><text x=\"230\" y=\"70\" fill=\"#b45309\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Crisis &amp; Epiphany</text><circle cx=\"410\" cy=\"45\" r=\"6\" fill=\"#10b981\"/><text x=\"400\" y=\"30\" fill=\"#065f46\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Transformed Self ✓</text><line x1=\"50\" y1=\"145\" x2=\"410\" y2=\"145\" stroke=\"#94a3b8\" stroke-width=\"2\" stroke-dasharray=\"4 4\"/><text x=\"280\" y=\"138\" fill=\"#64748b\" font-size=\"9\">Static Character (Unchanging)</text></svg>",
        "diagramLabel": "Character development arc coordinate curve diagram",
        "diagramCaption": "The Character Development Arc: A dynamic arc rises from the initial flawed state through crisis into an enlightened, transformed self.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.3", "desc": "Analyze character response to conflict and how dynamic arcs propel narrative themes.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "E.M. Forster: Aspects of the Novel", "desc": "The foundational critical text defining flat versus round character dimensionality.", "url": "https://www.gutenberg.org/", "icon": "fas fa-book"},
            {"title": "Purdue OWL: Writing Dynamic and Complex Characters", "desc": "Crafting believable flaws, inner wounds, and dramatic turning points.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-user-edit"}
        ]
    },
    "Character vs. Conflict": {
        "category": "Character Analysis",
        "definition": "Conflict is the essential catalyst of narrative momentum, forcing characters to confront opposition, make ethical choices, and reveal their core nature. Conflict operates along two structural axes: Internal Conflict (Character vs. Self), involving psychological distress, cognitive dissonance, ethical dilemmas, or combating personal vices; and External Conflict, where the struggle pits the character against outside forces: Character vs. Character (interpersonal rivalry), Character vs. Nature (survival against environmental elements), Character vs. Society (rebellion against unjust legal, cultural, or institutional systems), and Character vs. Technology/Fate.",
        "basicDefinition": "Conflict is the obstacle or fight a character must face. It can be internal (battling fear or guilt inside your own heart) or external (battling another person, a wild storm, or an unfair rule in society).",
        "breakdown": [
            {
                "label": "Character vs. Self (Internal)",
                "text": "Battling fear, guilt, or moral choices inside one's own mind (e.g., choosing between honesty and popularity)."
            },
            {
                "label": "Character vs. Character (External)",
                "text": "Direct interpersonal clash of wills, values, or goals between two individuals."
            },
            {
                "label": "Character vs. Society / Nature",
                "text": "Battling oppressive societal customs/institutions or struggling against physical wilderness elements."
            }
        ],
        "example": "Standard Analysis: 'Internal: In Shakespeare's 'Hamlet', the prince struggles internally with existential despair and doubt (Character vs. Self). External: In Collins' 'The Hunger Games', Katniss Everdeen confronts the autocratic Capitol regime (Character vs. Society).' ",
        "basicExample": "Simple Sentence: 'External: The hiker climbed through the raging blizzard (vs. Nature). Internal: She was terrified of heights but pushed herself forward (vs. Self).' ",
        "proTip": "The best stories layer conflicts! A character surviving in the wild (vs. Nature) while wrestling with past grief (vs. Self) makes a narrative ten times more gripping than a simple physical battle alone.",
        "question": "A group of students staging a peaceful protest against an unfair local zoning law is an example of which conflict type?",
        "choices": [
            "Character vs. Self",
            "Character vs. Society",
            "Character vs. Nature"
        ],
        "correctIndex": 1,
        "explanation": "Challenging institutional statutes, cultural conventions, or governmental laws constitutes Character vs. Society.",
        "equations": [
            {
                "title": "Total Narrative Conflict Partition Formula",
                "latex": "\\text{Total Conflict} = \\underbrace{\\text{Internal}(\\text{Self})}_{\\text{Psychological / Moral}} \\oplus \\underbrace{\\text{External}(\\text{Person} \\lor \\text{Nature} \\lor \\text{Society} \\lor \\text{Fate})}_{\\text{Physical / Institutional System}}",
                "note": "The complete structural taxonomy of literary dramatic friction."
            },
            {
                "title": "Character vs. Self Internal Moral Dilemma Equation",
                "latex": "\\text{Internal Agony} = \\text{Duty / Loyalty} \\oplus \\neg(\\text{Personal Desire}) \\implies \\text{Ethical Crisis}",
                "note": "Example: Hamlet torn between sacred filial duty and existential moral revulsion."
            },
            {
                "title": "Character vs. Society Hegemony Dynamic",
                "latex": "\\text{Societal Conflict} = \\text{Individual Human Autonomy} \\leftrightarrow \\text{Systemic Institutional Oppression}",
                "note": "Example: Winston Smith vs. The Party in 1984; Katniss Everdeen vs. The Capitol in The Hunger Games."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"The Four Quadrants of Literary Conflict Diagram\"><rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/><rect x=\"20\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dbeafe\" stroke=\"#1e40af\" stroke-width=\"1.5\"/><text x=\"117\" y=\"47\" fill=\"#1e40af\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">1. VS. SELF (INTERNAL)</text><text x=\"117\" y=\"68\" fill=\"#1e3a8a\" font-size=\"10\" text-anchor=\"middle\">Fear • Guilt • Moral Choices</text><rect x=\"245\" y=\"25\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#fee2e2\" stroke=\"#ef4444\" stroke-width=\"1.5\"/><text x=\"342\" y=\"47\" fill=\"#991b1b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">2. VS. CHARACTER (EXTERNAL)</text><text x=\"342\" y=\"68\" fill=\"#7f1d1d\" font-size=\"10\" text-anchor=\"middle\">Hero vs. Villain • Rivalry</text><rect x=\"20\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#dcfce7\" stroke=\"#166534\" stroke-width=\"1.5\"/><text x=\"117\" y=\"127\" fill=\"#166534\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">3. VS. NATURE (EXTERNAL)</text><text x=\"117\" y=\"148\" fill=\"#14532d\" font-size=\"10\" text-anchor=\"middle\">Blizzards • Oceans • Survival</text><rect x=\"245\" y=\"105\" width=\"195\" height=\"65\" rx=\"6\" fill=\"#fef3c7\" stroke=\"#92400e\" stroke-width=\"1.5\"/><text x=\"342\" y=\"127\" fill=\"#92400e\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">4. VS. SOCIETY (EXTERNAL)</text><text x=\"342\" y=\"148\" fill=\"#78350f\" font-size=\"10\" text-anchor=\"middle\">Unjust Laws • Traditions • Systems</text></svg>",
        "diagramLabel": "The four quadrants of literary conflict diagram",
        "diagramCaption": "The Conflict Matrix: Literary struggles divide into Internal (vs. Self) and External (vs. Character, vs. Nature, and vs. Society).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.2", "desc": "Determine a theme or central idea and analyze its development through character conflicts.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Types of Conflict in Literature", "desc": "Classroom framework for diagnosing internal versus external story forces.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Narrative Conflict & Tension", "desc": "Techniques for integrating moral, interpersonal, and environmental conflict layers.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-fist-raised"}
        ]
    },
    "Identifying Themes": {
        "category": "Theme Exploration",
        "definition": "A theme is the central argumentative proposition, philosophical insight, or enduring truth about human life that an author conveys through a literary work. Unlike the topical subject matter (which can be summarized in a word or phrase such as 'ambition' or 'revenge'), a literary theme must be formulated as a complete, arguable statement (e.g., 'Unchecked ambition pursued without moral restraint culminates in personal and societal devastation'). Identifying themes requires synthesizing character transformations, motifs, and the moral or psychological consequences of the story's climax.",
        "basicDefinition": "A theme is the big life lesson or truth about the world that the author shares through the story. It is always written as a complete sentence, not just one word (like 'True friendship helps people overcome fear').",
        "breakdown": [
            {
                "label": "Theme vs. Topic (Subject)",
                "text": "A topic is a 1-2 word subject (e.g., 'Courage'); a theme is the full life lesson about that topic ('Courage is doing what is right even when afraid')."
            },
            {
                "label": "Character Transformation Clues",
                "text": "Examine how the protagonist changes by the climax; their lessons point straight to the theme."
            },
            {
                "label": "Avoiding Simplistic Clichés",
                "text": "Authentic literary themes reflect nuanced human complexity rather than greeting-card slogans."
            }
        ],
        "example": "Standard Analysis: 'In Fitzgerald's 'The Great Gatsby', the topic is the American Dream, but the theme is: 'The relentless pursuit of an idealized past through material wealth leads to moral corruption and tragic isolation.' In Lee's 'To Kill a Mockingbird', the theme is: 'True moral courage requires defending human dignity even when confronting insurmountable societal prejudice.'",
        "basicExample": "Simple Sentence: 'In Charlotte's Web, the topic is friendship, but the theme is: True friendship brings meaning and purpose to life.'",
        "proTip": "Never stop at one word! If someone asks you for the theme and you answer 'Love', ask yourself: 'What is the author trying to teach us *about* love?' That full sentence is your real theme.",
        "question": "Which of the following is a properly formulated literary theme statement?",
        "choices": [
            "Bravery and loyalty.",
            "Standing up for justice requires sacrifice, but preserves personal integrity.",
            "How to be a brave hero in battle."
        ],
        "correctIndex": 1,
        "explanation": "A genuine theme must be an arguable, complete sentence expressing a deep truth about life.",
        "equations": [
            {
                "title": "Thematic Propositional Formulation Axiom",
                "latex": "\\text{Theme} = \\mathbf{Proposition}(\\text{Topic}, \\text{Universal Human Truth}) \\quad (\\text{Complete Sentence})",
                "note": "A theme transcends the plot topic to assert an arguable truth about the human condition."
            },
            {
                "title": "Thematic Induction via Conflict Resolution",
                "latex": "\\text{Subject} \\xrightarrow{\\Delta \\text{Protagonist} + \\text{Climax Resolution}} \\text{Thematic Proposition}",
                "note": "Readers deduce theme by tracking character growth through the story's ultimate crisis."
            },
            {
                "title": "Semantic Distillation Invariant",
                "latex": "\\text{Theme} \\neq \\text{Plot Summary} \\land \\text{Theme} \\neq \\text{Topical Motif} \\implies \\text{Arguable Life Insight}",
                "note": "Theme is distinct from the events that occurred (plot) and the general subject matter (topic)."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Topic to Thematic Assertion Funnel Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='115' height='60' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='77' y='48' fill='#991b1b' font-size='11' font-weight='bold' text-anchor='middle'>TOPIC / SUBJECT</text><text x='77' y='68' fill='#7f1d1d' font-size='9' text-anchor='middle'>&apos;Ambition&apos; (1 Word)</text><path d='M 140 55 L 180 55' stroke='#64748b' stroke-width='2' marker-end='url(#arrow)'/><rect x='185' y='20' width='110' height='70' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='240' y='42' fill='#92400e' font-size='10' font-weight='bold' text-anchor='middle'>STORY ENGINE</text><text x='240' y='60' fill='#78350f' font-size='8' text-anchor='middle'>Character Decisions</text><text x='240' y='75' fill='#78350f' font-size='8' text-anchor='middle'>Climax Outcomes</text><path d='M 300 55 L 340 55' stroke='#64748b' stroke-width='2' marker-end='url(#arrow)'/><rect x='345' y='15' width='95' height='80' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='392' y='42' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>THEME</text><text x='392' y='60' fill='#1e3a8a' font-size='8' text-anchor='middle'>Full Propositional</text><text x='392' y='75' fill='#1e3a8a' font-size='8' text-anchor='middle'>Statement &#x2713;</text><rect x='20' y='115' width='420' height='65' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='230' y='138' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>FORMULATING THE STATEMENT</text><text x='230' y='160' fill='#14532d' font-size='10' text-anchor='middle'>&quot;Unchecked ambition without empathy leads to irreversible personal tragedy.&quot;</text></svg>",
        "diagramLabel": "Topic to thematic assertion funnel diagram",
        "diagramCaption": "The Theme Funnel: A raw 1-word topic is filtered through character choices and crisis outcomes to produce a complete, arguable thematic statement.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.2", "desc": "Determine a theme or central idea of a text and analyze its development over the course of the text.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Identifying and Formulating Themes", "desc": "Comprehensive instructional framework for moving from topic to thematic statement.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Thematic Analysis and Literary Criticism", "desc": "Techniques for substantiating thematic claims with rigorous textual evidence.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/writing_in_literature/literary_theory_and_schools_of_criticism/index.html", "icon": "fas fa-lightbulb"}
        ]
    },
    "Universal Themes": {
        "category": "Theme Exploration",
        "definition": "Universal themes are foundational truths about human nature and existential experience that transcend historical epochs, geographic frontiers, and cultural divides. Because human beings across all societies grapple with the same fundamental realities—such as coming of age, the allure and hazard of power, grief and mortality, the battle against tyranny, and the yearning for community—universal themes recur in world mythology, classical drama, and contemporary literature alike.",
        "basicDefinition": "Universal themes are big life truths that everyone around the world understands, whether they lived thousands of years ago in ancient times or live in a modern city today (like growing up, good vs. evil, or family love).",
        "breakdown": [
            {
                "label": "Cross-Cultural Resonance",
                "text": "Themes like coming of age or sacrifice appear in every continent's folk tales and great epics."
            },
            {
                "label": "Timeless Human Truths",
                "text": "Addresses unchanging aspects of life: courage, fear of death, love, and fairness."
            },
            {
                "label": "Different Settings, Same Heart",
                "text": "A story in ancient Rome and a story in outer space can share the exact same universal message."
            }
        ],
        "example": "Standard Analysis: 'The universal theme that hubris (excessive pride) precipitates catastrophe appears in the ancient Greek myth of Icarus, Shakespeare's 'King Lear', and modern speculative fiction like Shelley's 'Frankenstein'.' In Chinua Achebe's 'Things Fall Apart', the universal theme of resisting cultural obsolescence resonates with audiences worldwide.",
        "basicExample": "Simple Sentence: 'Stories like Cinderella and modern movies share the universal theme that kindness and perseverance can triumph over cruelty.'",
        "proTip": "When reading an ancient story or a translated book from another country, don't get distracted by unfamiliar clothing or customs! Look for the universal struggle at its center—you will instantly connect with the characters.",
        "question": "Why is 'the painful journey of coming of age' classified as a universal theme?",
        "choices": [
            "Because it only happens in fantasy novels with wizards.",
            "Because young people across all cultures, countries, and eras experience the transition to adulthood.",
            "Because it was invented recently by modern movie studios."
        ],
        "correctIndex": 1,
        "explanation": "Universal themes reflect shared human milestones experienced across all historical eras and cultures.",
        "equations": [
            {
                "title": "Universal Invariance Invariant",
                "latex": "\\forall \\, \\text{Culture } c, \\, \\forall \\, \\text{Era } t: \\quad \\text{Resonance}(\\mathbf{U}, c, t) > 0 \\quad (\\mathbf{U} \\in \\text{Universal Themes})",
                "note": "A universal theme maintains positive thematic resonance regardless of historical or cultural parameters."
            },
            {
                "title": "Universal Archetype Canonical Set",
                "latex": "\\mathbf{U}_{\\text{canon}} = \\{\\text{Coming of Age}, \\text{Good vs. Evil}, \\text{Hubris vs. Nemesis}, \\text{Sacrifice}, \\text{Justice}\\}",
                "note": "The core thematic archetypes that recur across world literature and oral storytelling."
            },
            {
                "title": "Cross-Cultural Setting Transformation",
                "latex": "\\text{Narrative}(c, t) = \\mathbf{U} \\otimes \\text{Setting Specifics}(c, t) \\implies \\text{Shared Universal Core}",
                "note": "Different cultures dress universal themes in distinct settings and mythologies while retaining the same underlying human truth."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Universal Themes Cross-Cultural Bridge Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><circle cx='230' cy='100' r='50' fill='#dbeafe' stroke='#1e40af' stroke-width='2'/><text x='230' y='95' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>UNIVERSAL</text><text x='230' y='112' fill='#1e3a8a' font-size='9' font-weight='bold' text-anchor='middle'>HUMAN TRUTH</text><circle cx='60' cy='45' r='35' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='60' y='42' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>Ancient</text><text x='60' y='56' fill='#78350f' font-size='8' text-anchor='middle'>Myths</text><circle cx='400' cy='45' r='35' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='400' y='42' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>Modern</text><text x='400' y='56' fill='#14532d' font-size='8' text-anchor='middle'>Novels</text><circle cx='60' cy='155' r='35' fill='#f3e8ff' stroke='#7e22ce' stroke-width='1.5'/><text x='60' y='152' fill='#6b21a8' font-size='9' font-weight='bold' text-anchor='middle'>World</text><text x='60' y='166' fill='#581c87' font-size='8' text-anchor='middle'>Folklore</text><circle cx='400' cy='155' r='35' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='400' y='152' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>Sci-Fi /</text><text x='400' y='166' fill='#7f1d1d' font-size='8' text-anchor='middle'>Future</text><line x1='93' y1='60' x2='185' y2='88' stroke='#94a3b8' stroke-width='2' stroke-dasharray='3 3'/><line x1='367' y1='60' x2='275' y2='88' stroke='#94a3b8' stroke-width='2' stroke-dasharray='3 3'/><line x1='93' y1='140' x2='185' y2='112' stroke='#94a3b8' stroke-width='2' stroke-dasharray='3 3'/><line x1='367' y1='140' x2='275' y2='112' stroke='#94a3b8' stroke-width='2' stroke-dasharray='3 3'/><text x='230' y='180' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Shared Human Milestones Connect All World Literature &#x2713;</text></svg>",
        "diagramLabel": "Universal themes cross-cultural bridge diagram",
        "diagramCaption": "The Universal Core: No matter the historical era or geographical origin, diverse literary traditions converge upon foundational human truths.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.9", "desc": "Analyze how modern fiction draws upon themes and character types from traditional mythologies and world literature.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Harvard Comparative Literature: Universal Themes in Global Fiction", "desc": "Academic exploration of archetype recurrence across disparate world civilizations.", "url": "https://complit.fas.harvard.edu/", "icon": "fas fa-university"},
            {"title": "National Endowment for the Humanities: The Human Journey in Literature", "desc": "Educational resources exploring timeless existential motifs in world texts.", "url": "https://edsitement.neh.gov/", "icon": "fas fa-globe-americas"}
        ]
    },
    "Symbolism & Theme": {
        "category": "Theme Exploration",
        "definition": "Symbolism is the deliberate artistic employment of concrete objects, environmental motifs, recurring actions, or sensory colors to embody abstract philosophical principles and thematic truths. While a literal reading registers only physical presence (e.g., an unkempt rosebush, an old pocket watch, a recurring storm), semiotic analysis recognizes that the symbol functions as a conduit directly channeling the text's deeper theme. Tracking how a symbol mutates, decays, or endures over the story reveals the author's ultimate argument.",
        "basicDefinition": "A symbol is a real, touchable object in a story that stands for a big, invisible idea. When an author repeats a symbol throughout a book, following that object will lead you directly to the main theme.",
        "breakdown": [
            {
                "label": "The Concrete Anchor",
                "text": "A physical object (like a candle, ring, or white bird) that readers can clearly see and picture."
            },
            {
                "label": "The Abstract Meaning",
                "text": "The deeper invisible idea the object stands for (like hope, unending loyalty, or innocence)."
            },
            {
                "label": "Tracking Symbolic Change",
                "text": "Notice how the symbol changes: if a flower blooms or wilts, it reflects the growth or collapse of that theme."
            }
        ],
        "example": "Standard Analysis: 'In Hansberry's 'A Raisin in the Sun', Mama's struggling potted plant symbolizes the family's fragile dreams and perseverance despite oppressive urban soil. In Golding's 'Lord of the Flies', the conch shell symbolizes democratic civil order; its violent destruction signifies the complete collapse of civilization.'",
        "basicExample": "Simple Sentence: 'In the story, the character wore an old rusty key around her neck; the key was a symbol for unlocking secrets about her past family.'",
        "proTip": "Watch for the 'Rule of Three'! If an author mentions an ordinary object three or more times with unusual emotional emphasis, it is almost certainly a symbol carrying a central theme.",
        "question": "In literature, what is the connection between a recurring symbol and a story's theme?",
        "choices": [
            "Symbols are only added to make the story longer.",
            "Symbols serve as concrete physical anchors that reinforce and reveal the story's deeper thematic truth.",
            "Symbols are intended to trick the reader with false clues."
        ],
        "correctIndex": 1,
        "explanation": "Symbols visually and tangibly embody abstract ideas, pointing readers directly to the central theme.",
        "equations": [
            {
                "title": "Semiotic Thematic Transduction Formula",
                "latex": "\\mathbf{S}_{\\text{physical}} \\xrightarrow{\\text{Textual Semiotics}} \\mathbf{I}_{\\text{abstract}} \\implies \\text{Thematic Reinforcement}",
                "note": "A tangible physical object channels and reinforces an intangible thematic argument."
            },
            {
                "title": "Symbol Mutation Thematic Delta",
                "latex": "\\Delta \\mathbf{S} = \\mathbf{S}_{\\text{resolution}} - \\mathbf{S}_{\\text{exposition}} \\iff \\Delta \\text{Theme Status}",
                "note": "When a symbol is broken, transformed, or renewed, it signals the definitive thematic resolution."
            },
            {
                "title": "Motif Recurrence Weight Model",
                "latex": "\\text{Thematic Resonance} \\propto \\sum_{k=1}^{n} \\text{Symbol Occurrence}_k \\times \\text{Emotional Salience}_k",
                "note": "The more frequent and emotionally charged a symbol appears, the more central it is to the theme."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Semiotic Symbolic Iceberg Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='20' width='420' height='75' rx='6' fill='#e0f2fe' stroke='#0284c7' stroke-width='1.5'/><text x='230' y='42' fill='#0369a1' font-size='11' font-weight='bold' text-anchor='middle'>SURFACE / TANGIBLE OBJECT (LITERAL)</text><text x='230' y='65' fill='#0c4a6e' font-size='10' text-anchor='middle'>A wilted plant &bull; A green dock light &bull; A mockingbird</text><line x1='20' y1='95' x2='440' y2='95' stroke='#0284c7' stroke-width='2' stroke-dasharray='4 4'/><rect x='20' y='105' width='420' height='75' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='230' y='128' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>DEEPER THEMATIC MEANING (ABSTRACT)</text><text x='230' y='150' fill='#1e3a8a' font-size='10' text-anchor='middle'>Persevering hope &bull; Unattainable dreams &bull; Fragile innocence</text><text x='230' y='170' fill='#047857' font-size='9' font-weight='bold' text-anchor='middle'>Physical symbols anchor invisible themes in the reader&apos;s imagination &#x2713;</text></svg>",
        "diagramLabel": "The semiotic symbolic iceberg diagram",
        "diagramCaption": "The Symbolic Iceberg: The visible literal object at the surface anchors deep abstract thematic truths underneath.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.2", "desc": "Analyze how symbols and recurring motifs build and refine the central theme.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Guide to Literary Symbolism & Motifs", "desc": "Authoritative taxonomy of natural, cultural, and contextual symbols in poetry and prose.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/symbolism", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Analyzing Literary Imagery and Symbols", "desc": "Guidelines for interpreting symbols without over-reading accidental details.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/writing_in_literature/writing_about_literature/index.html", "icon": "fas fa-feather"}
        ]
    },
    "Author's Message": {
        "category": "Theme Exploration",
        "definition": "The author's message represents the normative rhetorical purpose, ethical stance, or societal critique an author deliberately embeds within a narrative. While theme articulates a universal observation about how life operates, the author's message frequently carries an evaluative or persuasive imperative—advising readers how they should act, warning against societal injustices, or challenging orthodox beliefs. Deduce the message by evaluating which behaviors the narrative rewards, which vices precipitate catastrophic failure, and the ultimate moral orientation of the resolution.",
        "basicDefinition": "The author's message is the specific opinion, advice, or warning the writer wants you to take away after reading the book (like warning people to protect the environment, or encouraging people to stand up against bullying).",
        "breakdown": [
            {
                "label": "Authorial Purpose & Perspective",
                "text": "The author's personal viewpoint or critique about how people treat one another in society."
            },
            {
                "label": "Climax Consequences",
                "text": "Observe which characters are rewarded with peace and which face downfall; outcomes reveal the message."
            },
            {
                "label": "Implicit vs. Explicit Messages",
                "text": "Fables state their morals directly; great novels leave the message for the reader to deduce from the plot."
            }
        ],
        "example": "Standard Analysis: 'In Orwell's '1984', the author's message is an urgent political warning against totalitarian surveillance and psychological manipulation. In Dr. Seuss's 'The Sneetches', the author's message is a clear moral critique of superficial social discrimination and commercial vanity.'",
        "basicExample": "Simple Sentence: 'In The Lorax, Dr. Seuss's message warns readers that unless someone cares a whole awful lot, nature will be ruined by greed.'",
        "proTip": "Look at the ending! Ask yourself: 'Who succeeded, who failed, and why?' The reasons characters triumph or suffer consequences at the end of the story will reveal the author's true message.",
        "question": "Which storytelling element provides the most reliable evidence for the author's underlying message?",
        "choices": [
            "The physical appearance of the main character.",
            "How the conflict is resolved and what moral lessons or consequences the characters experience.",
            "The total number of chapters in the book."
        ],
        "correctIndex": 1,
        "explanation": "The resolution of the central conflict and the consequences characters face reveal what the author is advocating or warning against.",
        "equations": [
            {
                "title": "Authorial Evaluative Stance Model",
                "latex": "\\text{Author's Message} = f(\\text{Character Fates}, \\text{Conflict Climax}, \\text{Narrative Tone})",
                "note": "The message is decoded by analyzing the synthesis of narrative consequences and rhetorical tone."
            },
            {
                "title": "Normative Value Vector Collator",
                "latex": "\\vec{M}_{\\text{author}} = \\sum \\mathbf{V}(\\text{Virtues Rewarded}) - \\sum \\mathbf{V}(\\text{Vices Punished})",
                "note": "The author's moral position is revealed by the ethical alignment of narrative outcomes."
            },
            {
                "title": "Hermeneutic Reader Inference Axiom",
                "latex": "\\text{Reader Inference} \\approx \\lim_{t \\to \\text{Resolution}} \\left( \\text{Plot Outcomes}(t) \\right) \\implies \\text{Authorial Moral Imperative}",
                "note": "As the plot concludes, the trajectory of character consequences crystallizes the author's message."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Deducing the Author Message Compass Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='180' height='60' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='115' y='48' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>1. CLIMAX OUTCOMES</text><text x='115' y='68' fill='#1e3a8a' font-size='9' text-anchor='middle'>Who triumphs? Who falls?</text><rect x='255' y='25' width='180' height='60' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='345' y='48' fill='#92400e' font-size='10' font-weight='bold' text-anchor='middle'>2. NARRATIVE TONE</text><text x='345' y='68' fill='#78350f' font-size='9' text-anchor='middle'>Sympathetic vs. Critical</text><line x1='115' y1='85' x2='180' y2='115' stroke='#64748b' stroke-width='2' marker-end='url(#arrow)'/><line x1='345' y1='85' x2='280' y2='115' stroke='#64748b' stroke-width='2' marker-end='url(#arrow)'/><rect x='60' y='115' width='340' height='65' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='2'/><text x='230' y='138' fill='#166534' font-size='12' font-weight='bold' text-anchor='middle'>THE AUTHOR&apos;S MESSAGE / WARNING</text><text x='230' y='160' fill='#14532d' font-size='10' text-anchor='middle'>The moral advice, warning, or critique the reader takes into life &#x2713;</text></svg>",
        "diagramLabel": "Deducing the author message compass diagram",
        "diagramCaption": "The Message Compass: By examining the climax consequences and the author's tone, readers deduce the overarching warning or lesson.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.6", "desc": "Analyze how an author's geographic or cultural perspective shapes the purpose and message of a text.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Discerning Author's Purpose & Message", "desc": "Critical reading strategies for identifying persuasive and normative themes in fiction.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Rhetorical Stance and Authorial Voice", "desc": "Analyzing subtext, satirical tone, and ideological critique in literature.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-comment-dots"}
        ]
    },
    "Fiction Genres": {
        "category": "Genre Studies",
        "definition": "Fiction genres represent formal taxonomic classifications of imaginative prose literature determined by worldbuilding rules, ontological plausibility, narrative conventions, and thematic tropes. Genres range along an ontological continuum: Realistic Fiction adheres strictly to the physical and sociological laws of the primary world; Historical Fiction reconstructs authentic past eras while integrating fictional dramatis personae; Science Fiction introduces a speculative 'novum' (technological or scientific postulate such as interstellar transit or synthetic consciousness); and Fantasy establishes secondary universes governed by autonomous magical systems and supernatural mythologies.",
        "basicDefinition": "Fiction genres are categories of stories created from imagination. They include Realistic Fiction (could happen in real life), Fantasy (has magic, mythical beasts, or wizards), Science Fiction (future technology and space exploration), and Mystery (detectives solving crimes).",
        "breakdown": [
            {
                "label": "Realistic vs. Speculative",
                "text": "Realistic stories obey all real-world physics and laws; Speculative stories invent magic systems or future sciences."
            },
            {
                "label": "Science Fiction & The Novum",
                "text": "Sci-Fi introduces a single scientific innovation or future invention that fundamentally reshapes society."
            },
            {
                "label": "High vs. Low Fantasy",
                "text": "High Fantasy invents an entirely new secondary world (Middle-earth); Low Fantasy injects magic into our everyday world."
            }
        ],
        "example": "Standard Analysis: 'Tolkien's 'The Lord of the Rings' represents High Epic Fantasy with constructed languages and autonomous cosmologies. Le Guin's 'The Left Hand of Darkness' exemplifies sociological science fiction exploring genderless alien biology. Dickens' 'Great Expectations' anchors Victorian realistic fiction.'",
        "basicExample": "Simple Sentence: 'Harry Potter is a Fantasy story with wizards and wands, while a story about a girl moving to a new middle school is Realistic Fiction.'",
        "proTip": "Look for the 'Novum'! In science fiction, the novum is the single invented piece of technology or scientific premise (like warp drive or cloning) that changes how the whole society operates.",
        "question": "Which fiction genre takes place in our recognizable real world with believable characters and events that could realistically happen?",
        "choices": [
            "High Fantasy",
            "Realistic Fiction",
            "Space Opera Science Fiction"
        ],
        "correctIndex": 1,
        "explanation": "Realistic fiction portrays credible characters and plausible situations occurring within the boundaries of real-world physical and social laws.",
        "equations": [
            {
                "title": "Fiction Ontological Classification Model",
                "latex": "\\text{Genre} = \\mathbf{G}(\\text{World Laws}, \\text{Technological Plausibility}, \\text{Thematic Tropes})",
                "note": "A genre is classified by the physical laws of its setting and the plausibility of its premises."
            },
            {
                "title": "Speculative Novum Divergence Equation",
                "latex": "\\text{Speculative Fiction} = \\text{Primary Reality} \\oplus \\mathbf{Novum}(\\text{Magic} \\lor \\text{Advanced Tech})",
                "note": "Darko Suvin's cognitive estrangement: Science fiction pivots on a rationalized novum."
            },
            {
                "title": "Genre Hybridization Calculus",
                "latex": "\\text{Genre}_{\\text{hybrid}} = \\text{Genre}_A \\cap \\text{Genre}_B \\quad (\\text{e.g., Sci-Fi Noir, Historical Fantasy})",
                "note": "Modern literary craft frequently blends conventions from disparate genre traditions."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Fiction Genre Spectrum and Worldbuilding Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='30' width='95' height='75' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='67' y='52' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>REALISTIC</text><text x='67' y='70' fill='#1e3a8a' font-size='8' text-anchor='middle'>Our world</text><text x='67' y='85' fill='#1e3a8a' font-size='8' text-anchor='middle'>Real physics</text><rect x='125' y='30' width='95' height='75' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='172' y='52' fill='#92400e' font-size='10' font-weight='bold' text-anchor='middle'>HISTORICAL</text><text x='172' y='70' fill='#78350f' font-size='8' text-anchor='middle'>Authentic past</text><text x='172' y='85' fill='#78350f' font-size='8' text-anchor='middle'>Real eras</text><rect x='235' y='30' width='95' height='75' rx='6' fill='#e0e7ff' stroke='#4338ca' stroke-width='1.5'/><text x='282' y='52' fill='#4338ca' font-size='10' font-weight='bold' text-anchor='middle'>SCI-FI</text><text x='282' y='70' fill='#3730a3' font-size='8' text-anchor='middle'>Future tech</text><text x='282' y='85' fill='#3730a3' font-size='8' text-anchor='middle'>Space &amp; AI</text><rect x='345' y='30' width='95' height='75' rx='6' fill='#f3e8ff' stroke='#7e22ce' stroke-width='1.5'/><text x='392' y='52' fill='#7e22ce' font-size='10' font-weight='bold' text-anchor='middle'>FANTASY</text><text x='392' y='70' fill='#6b21a8' font-size='8' text-anchor='middle'>Magic systems</text><text x='392' y='85' fill='#6b21a8' font-size='8' text-anchor='middle'>Invented worlds</text><line x1='30' y1='135' x2='430' y2='135' stroke='#64748b' stroke-width='2' stroke-linecap='round'/><circle cx='67' cy='135' r='5' fill='#1e40af'/><circle cx='172' cy='135' r='5' fill='#d97706'/><circle cx='282' cy='135' r='5' fill='#4338ca'/><circle cx='392' cy='135' r='5' fill='#7e22ce'/><text x='67' y='160' fill='#1e40af' font-size='9' text-anchor='middle'>&larr; Real World Laws</text><text x='392' y='160' fill='#7e22ce' font-size='9' text-anchor='middle'>Invented Magical Laws &rarr;</text><text x='230' y='185' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Continuum of Worldbuilding Plausibility &#x2713;</text></svg>",
        "diagramLabel": "The fiction genre spectrum and worldbuilding diagram",
        "diagramCaption": "The Fiction Spectrum: Literary genres range along a continuum of worldbuilding rules from everyday realism to entirely invented secondary universes.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.9", "desc": "Analyze how modern fiction draws on themes, patterns of events, or character types from myths, traditional stories, or religious works.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Science Fiction & Fantasy Writers Association: Worldbuilding Guide", "desc": "Authoritative frameworks for designing credible magical systems and speculative novums.", "url": "https://www.sfwa.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Genre Theory and Literary Conventions", "desc": "Academic guide to classifying narrative prose by rhetorical conventions and structural tropes.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/writing_in_literature/index.html", "icon": "fas fa-book-open"}
        ]
    },
    "Non-Fiction Genres": {
        "category": "Genre Studies",
        "definition": "Non-fiction genres comprise verifiable informational, expository, and narrative prose anchored strictly in documented empirical reality, historical facts, and primary source evidence. Key genres include Biography (the comprehensive chronicling of an individual's life by an outside researcher); Autobiography (a chronological self-penned life history spanning birth to the present); Memoir (a focused, first-person narrative illuminating a specific thematic epoch, moral crisis, or formative experience); and Expository/Informational Journalism (factual reporting, scientific documentation, and essays synthesizing objective research).",
        "basicDefinition": "Non-fiction genres are factual books and articles about real people, true historical events, and actual science. They include biographies about heroes, personal memoirs, and informational science guides.",
        "breakdown": [
            {
                "label": "Biography vs. Autobiography",
                "text": "A Biography is written by an outside researcher about someone else; an Autobiography is written by the person themselves."
            },
            {
                "label": "Memoir (Focused Slice of Life)",
                "text": "Unlike a full autobiography, a memoir zooms in closely on one specific journey, era, or life lesson."
            },
            {
                "label": "Informational / Expository",
                "text": "Articles, science guides, and histories that explain concepts and present verified facts and data."
            }
        ],
        "example": "Standard Analysis: 'Skloot's 'The Immortal Life of Henrietta Lacks' exemplifies narrative investigative science journalism. Angelou's 'I Know Why the Caged Bird Sings' represents lyrical literary memoir. Isaacson's 'Leonardo da Vinci' serves as an authoritative historical biography.'",
        "basicExample": "Simple Sentence: 'A book written by an astronaut about her actual space missions is an Autobiography/Memoir, while a school textbook about planets is Informational Non-Fiction.'",
        "proTip": "Remember: A Biography is written by someone else, while an Autobiography has the prefix 'Auto' (meaning self)—so the author and the subject are the exact same person!",
        "question": "What is the key difference between a Biography and an Autobiography?",
        "choices": [
            "A biography contains magical fiction elements.",
            "A biography is written by an outside author, whereas an autobiography is written by the subject themselves.",
            "An autobiography is only about ancient history."
        ],
        "correctIndex": 1,
        "explanation": "An autobiography is authored directly by the subject describing their own lived experiences.",
        "equations": [
            {
                "title": "Non-Fiction Veracity Invariant",
                "latex": "\\forall \\, \\text{Fact Claim } c \\in \\text{Non-Fiction}: \\quad \\text{Verifiable}(c, \\mathbf{Primary Sources}) \\equiv \\mathbf{True}",
                "note": "Non-fiction demands empirical veracity grounded in archival and primary source evidence."
            },
            {
                "title": "Biographical Perspective Vector",
                "latex": "\\text{Perspective} = \\begin{cases} \\text{Autobiography / Memoir} & \\implies \\mathbf{Author} \\equiv \\mathbf{Subject} \\quad (1^{\\text{st}} \\text{ Person}) \\ \\text{Biography} & \\implies \\mathbf{Author} \\neq \\mathbf{Subject} \\quad (3^{\\text{rd}} \\text{ Person}) \\end{cases}",
                "note": "Perspective divides along authorial identity and internal vs. external narrative point of view."
            },
            {
                "title": "Memoir Temporal Partition Calculus",
                "latex": "\\text{Memoir} = \\text{Life History} \\cap [t_{\\text{start}}, t_{\\text{end}}] \\quad (\\text{Focused Thematic Sub-Epoch})",
                "note": "A memoir focuses on a bounded thematic epoch rather than an exhaustive cradle-to-grave chronology."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Non-Fiction Taxonomy Matrix Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='195' height='65' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='117' y='47' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>BIOGRAPHY</text><text x='117' y='68' fill='#1e3a8a' font-size='9' text-anchor='middle'>Written by outside researcher (3rd person)</text><rect x='245' y='25' width='195' height='65' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='342' y='47' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>AUTOBIOGRAPHY</text><text x='342' y='68' fill='#14532d' font-size='9' text-anchor='middle'>Written by the person themselves (1st person)</text><rect x='20' y='105' width='195' height='65' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='117' y='127' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>MEMOIR</text><text x='117' y='148' fill='#78350f' font-size='9' text-anchor='middle'>Focused personal slice of life or era</text><rect x='245' y='105' width='195' height='65' rx='6' fill='#f3e8ff' stroke='#7e22ce' stroke-width='1.5'/><text x='342' y='127' fill='#6b21a8' font-size='11' font-weight='bold' text-anchor='middle'>EXPOSITORY / INFORMATIONAL</text><text x='342' y='148' fill='#581c87' font-size='9' text-anchor='middle'>Articles, histories, and scientific guides</text><text x='230' y='190' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>All Non-Fiction Genres Require 100% Verified Empirical Truth &#x2713;</text></svg>",
        "diagramLabel": "The non-fiction taxonomy matrix diagram",
        "diagramCaption": "The Non-Fiction Compass: Categorizing factual writing by narrative perspective (first vs. third person) and scope (entire life vs. focused theme vs. expository data).",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RI.8.3", "desc": "Analyze how a text makes connections among and distinctions between individuals, ideas, or events.", "url": "/pages/standards.php?domain=ELA-RI", "icon": "fas fa-award"},
            {"title": "Library of Congress: Guide to Biography & Memoir Classification", "desc": "Authoritative institutional standards distinguishing biographical prose genres.", "url": "https://www.loc.gov/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Writing Creative Non-Fiction", "desc": "Techniques for deploying narrative pacing and sensory detail while maintaining factual integrity.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/creative_nonfiction/index.html", "icon": "fas fa-feather-alt"}
        ]
    },
    "Poetry Forms": {
        "category": "Genre Studies",
        "definition": "Poetic forms are structural literary frameworks defined by metrical cadence, prosodic rules, line constraints, and phonetic rhyme schemes. Classical closed forms impose rigorous parameters: the Shakespearean/English Sonnet comprises 14 lines of iambic pentameter with an ABAB CDCD EFEF GG rhyme scheme concluding in an epigrammatic volta couplet; the Japanese Haiku captures an evanescent seasonal moment (kigo) across a strict 5-7-5 syllable tercet; the Villanelle repeats dual refrains across 19 lines; while Free Verse dispenses with fixed meters to establish organic musicality through breath cadence and typographic enjambment.",
        "basicDefinition": "Poetry forms are patterns for writing poems. They include 14-line Sonnets, 3-line Japanese Haikus (5-7-5 syllables), and Free Verse where you create your own musical rhythm without set rhyming rules.",
        "breakdown": [
            {
                "label": "The 14-Line Sonnet",
                "text": "14 lines of iambic pentameter ending with a rhyming couplet (volta turning point)."
            },
            {
                "label": "The Japanese Haiku (5-7-5)",
                "text": "A brief 3-line nature poem with exactly 5 syllables, 7 syllables, and 5 syllables."
            },
            {
                "label": "Free Verse (Organic Rhythm)",
                "text": "Modern poetry without strict rhyme or syllable rules, guided by natural human breath and emotion."
            }
        ],
        "example": "Standard Analysis: 'Shakespeare's Sonnet 18 ('Shall I compare thee to a summer's day?') utilizes 14 lines of iambic pentameter with an ABAB CDCD EFEF GG scheme. Matsuo Basho's classical frog haiku captures timeless nature in 17 syllables. Whitman's 'Leaves of Grass' pioneers American democratic free verse.'",
        "basicExample": "Simple Sentence: 'Haiku: 'An old silent pond / A frog jumps into the deep / Splash! Silence again.' (Count the 5-7-5 syllable pattern!)'",
        "proTip": "To count syllables easily, place your hand right under your chin while saying a word aloud! Every time your jaw drops down and hits your hand, that counts as one syllable!",
        "question": "Which poetic form consists of exactly 14 lines written in iambic pentameter with a structured rhyme scheme?",
        "choices": [
            "Haiku",
            "Sonnet",
            "Limerick"
        ],
        "correctIndex": 1,
        "explanation": "The Sonnet is a classical 14-line poetic form adhering to strict iambic meter and structured rhyme schemes.",
        "equations": [
            {
                "title": "Shakespearean Sonnet Rhyme Architecture",
                "latex": "\\text{Sonnet}_{14} = 3 \\times \\text{Quatrain}(\\text{ABAB}, \\text{CDCD}, \\text{EFEF}) + 1 \\times \\text{Couplet}(\\text{GG})",
                "note": "Three interlocking alternating quatrains followed by a climactic closing rhyming couplet."
            },
            {
                "title": "Iambic Pentameter Metric Cadence",
                "latex": "\\text{Line Meter} = 5 \\times [\\breve{u} \\, \\acute{-}] \\implies 10 \\text{ Syllables per Verse} \\quad (\\text{Unstressed} + \\text{Stressed})",
                "note": "Mimics the natural rhythm of the human heartbeat and natural English speech cadence."
            },
            {
                "title": "Haiku Syllabic Tercet Invariant",
                "latex": "\\mathbf{H} = [5, 7, 5] \\implies \\sum_{i=1}^{3} \\text{Syllables}_i = 17 \\quad (\\text{Captures a seasonal Kigo})",
                "note": "A disciplined Japanese nature tercet capturing an instant of heightened sensory awareness."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Poetic Forms Architecture and Metrical Structure Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='48' fill='#1e40af' font-size='12' font-weight='bold' text-anchor='middle'>SONNET (14 LINES)</text><text x='120' y='70' fill='#1e3a8a' font-size='9' text-anchor='middle'>3 Quatrains (ABAB CDCD EFEF)</text><text x='120' y='88' fill='#1e3a8a' font-size='9' text-anchor='middle'>+ 1 Rhyming Couplet (GG)</text><text x='120' y='115' fill='#2563eb' font-size='10' font-weight='bold' text-anchor='middle'>10 Syllables per line</text><text x='120' y='132' fill='#475569' font-size='8' text-anchor='middle'>da-DUM da-DUM da-DUM da-DUM da-DUM</text><text x='120' y='155' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>Strict Rhyme &amp; Meter &#x2713;</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='48' fill='#92400e' font-size='12' font-weight='bold' text-anchor='middle'>HAIKU (3 LINES)</text><text x='340' y='75' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>Line 1: 5 Syllables</text><text x='340' y='95' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>Line 2: 7 Syllables</text><text x='340' y='115' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>Line 3: 5 Syllables</text><text x='340' y='135' fill='#78350f' font-size='9' text-anchor='middle'>Total = 17 Syllables</text><text x='340' y='155' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>Seasonal Nature Snapshot &#x2713;</text></svg>",
        "diagramLabel": "Poetic forms architecture and metrical structure diagram",
        "diagramCaption": "Poetic Architectures: Comparing the 14-line iambic sonnet structure with the 5-7-5 syllabic haiku format.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Compare and contrast the structure of two or more texts and analyze how the differing structure contributes to style and meaning.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Guide to Poetic Forms and Prosody", "desc": "Authoritative taxonomy of closed and open verse forms from antiquity to modernism.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/poetic-form", "icon": "fas fa-university"},
            {"title": "Academy of American Poets: The Sonnet and Haiku Traditions", "desc": "Historical lineage and technical requirements of classical verse structures.", "url": "https://poets.org/", "icon": "fas fa-feather"}
        ]
    },
    "Drama & Playwriting": {
        "category": "Genre Studies",
        "definition": "Drama is literature composed for physical, embodied theatrical enactment before a live audience. Distinct from prose fiction where a narrator mediates the reader's experience, dramatic architecture relies on four foundational conventions: Dialogue (interpersonal verbal exchanges driving dramatic friction); Monologue (an extended speech addressed to other characters); Soliloquy (a convention wherein an actor vocalizes internal psychological truth while solitary on stage, unheard by others); and Stage Directions (authorial instructions in italics/brackets specifying proxemics, physical movements, lighting, and vocal tonality).",
        "basicDefinition": "Drama is a story written to be acted out on stage. It is written as a script with characters' names, dialogue for what they say, and stage directions telling the actors where to move and how to speak.",
        "breakdown": [
            {
                "label": "Dialogue vs. Soliloquy",
                "text": "Dialogue is conversation between characters; a Soliloquy is a character speaking private thoughts alone on stage."
            },
            {
                "label": "Stage Directions",
                "text": "Text in brackets or italics that tells the actors where to walk, how to look, and what sound effects play."
            },
            {
                "label": "Breaking the Fourth Wall",
                "text": "When an actor looks directly at the audience and speaks to them, breaking the imaginary wall of the stage."
            }
        ],
        "example": "Standard Analysis: 'In Shakespeare's 'Hamlet', the prince's famous 'To be or not to be' soliloquy exposes his internal philosophical struggle. In Miller's 'The Crucible', extensive sociopolitical stage directions contextualize Salem's Puritan paranoia. In Hansberry's 'A Raisin in the Sun', stage directions define the cramped South Side apartment.'",
        "basicExample": "Simple Sentence: 'In a script: LEO: (whispering fearfully) Did you hear that noise? [He slowly opens the wooden door].'",
        "proTip": "Never skip the stage directions! They contain crucial clues about who is lying, what props are important, and how the characters really feel behind their polite words.",
        "question": "What is the dramatic term for an extended speech where an actor speaks their private thoughts aloud while alone on stage?",
        "choices": [
            "Soliloquy",
            "Dialogue",
            "Stage Direction"
        ],
        "correctIndex": 0,
        "explanation": "A soliloquy is a dramatic convention where a solitary character reveals their unfiltered psychological thoughts directly to the audience.",
        "equations": [
            {
                "title": "Dramatic Enactment Function",
                "latex": "\\text{Drama} = \\mathbf{Script}(\\text{Dialogue}, \\text{Stage Directions}) \\xrightarrow{\\text{Theatrical Performance}} \\text{Embodied Reality}",
                "note": "Drama is designed for live physical interpretation rather than passive text consumption."
            },
            {
                "title": "Soliloquy Epistemic Truth Invariant",
                "latex": "\\text{Soliloquy}(c) \\implies \\text{Psychological Truth}(c) \\quad (\\text{Unfiltered by Interpersonal Deception})",
                "note": "Characters may lie in dialogue, but dramatic conventions hold that soliloquies reveal honest internal truth."
            },
            {
                "title": "Stage Proxemic Spatial Coordinate Vector",
                "latex": "\\vec{P}_{\\text{stage}} = [\\text{Upstage}, \\text{Downstage}, \\text{Stage Left}, \\text{Stage Right}] \\otimes \\text{Actor Proxemics}",
                "note": "Classical theatrical coordinate system governing movement from the performer's perspective."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Theatrical Stage Proxemics and Script Anatomy Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='210' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='130' y='48' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>THE THEATRICAL STAGE</text><rect x='45' y='60' width='170' height='30' rx='4' fill='#ffffff' stroke='#93c5fd' stroke-width='1'/><text x='130' y='79' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>UPSTAGE (Back of stage)</text><rect x='45' y='95' width='80' height='30' rx='4' fill='#ffffff' stroke='#93c5fd' stroke-width='1'/><text x='85' y='114' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>STAGE RIGHT</text><rect x='135' y='95' width='80' height='30' rx='4' fill='#ffffff' stroke='#93c5fd' stroke-width='1'/><text x='175' y='114' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>STAGE LEFT</text><rect x='45' y='130' width='170' height='30' rx='4' fill='#ffffff' stroke='#93c5fd' stroke-width='1'/><text x='130' y='149' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>DOWNSTAGE (Near audience)</text><rect x='255' y='25' width='180' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='345' y='48' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>SCRIPT CONVENTIONS</text><text x='345' y='75' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>DIALOGUE</text><text x='345' y='90' fill='#78350f' font-size='8' text-anchor='middle'>Spoken lines between actors</text><text x='345' y='115' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>SOLILOQUY</text><text x='345' y='130' fill='#78350f' font-size='8' text-anchor='middle'>Private thoughts alone on stage</text><text x='345' y='155' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>Stage Directions in [brackets] &#x2713;</text></svg>",
        "diagramLabel": "Theatrical stage proxemics and script anatomy diagram",
        "diagramCaption": "The Stage and Script: Mapping theatrical coordinates (upstage, downstage, stage left/right) alongside core script conventions.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Analyze how a drama or poem's form or structure contributes to its meaning.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "The Folger Shakespeare Library: Guide to Dramatic Structure", "desc": "Theatrical conventions, soliloquies, asides, and staging in classical drama.", "url": "https://www.folger.edu/", "icon": "fas fa-university"},
            {"title": "American Theatre Wing: The Anatomy of a Play Script", "desc": "Industry insights on playwrighting notations, stage directions, and actor blocking.", "url": "https://americantheatrewing.org/", "icon": "fas fa-theater-masks"}
        ]
    },
    "Freytag's Pyramid": {
        "category": "Plot & Structure",
        "definition": "Freytag's Pyramid is a foundational dramatic paradigm formulated by Gustav Freytag in 1863, mapping dramatic tension across five structural movements: (1) Exposition (establishment of status quo, characters, and the inciting incident that disrupts equilibrium); (2) Rising Action (escalation of obstacles, subplots, and complications); (3) Climax (the decisive peripeteia or turning point of irreversible psychological commitment and maximum dramatic tension); (4) Falling Action (anagnorisis, reversal of fortunes, and unraveling of collateral consequences); and (5) Denouement/Resolution (the restoration of a new stable equilibrium or catastrophic closure).",
        "basicDefinition": "Freytag's Pyramid is a five-step mountain map that shows how a story moves from the beginning, climbs up through exciting problems, hits the thrilling climax peak, and then calms down to the ending.",
        "breakdown": [
            {
                "label": "Exposition & Inciting Incident",
                "text": "Introduces setting and characters until a sudden event shatters normal life and kicks off the plot."
            },
            {
                "label": "Rising Action & Climax Peak",
                "text": "Complications build until the turning point where the protagonist makes an irreversible life choice."
            },
            {
                "label": "Falling Action & Resolution",
                "text": "The dust settles, loose ends are tied up, and a new normal equilibrium is established."
            }
        ],
        "example": "Standard Analysis: 'In Shakespeare's 'Romeo and Juliet', Tybalt's duel and death in Act III constitutes the tragic peripeteia/climax, setting off an irreversible chain of falling action. In Baum's 'The Wizard of Oz', melting the Wicked Witch marks the climactic turning point enabling the journey home.'",
        "basicExample": "Simple Sentence: 'In Cinderella, the climax happens when the glass slipper fits her foot, proving to the kingdom she is the true princess.'",
        "proTip": "Don't confuse the Inciting Incident with the Climax! The inciting incident happens near the start to kick off the journey, while the climax is the intense showdown at the top of the mountain.",
        "question": "Which phase of Freytag's Pyramid represents the central turning point and highest peak of dramatic tension?",
        "choices": [
            "Exposition",
            "Climax",
            "Falling Action"
        ],
        "correctIndex": 1,
        "explanation": "The climax is the dramatic apex and decisive turning point of irreversible commitment in the narrative.",
        "equations": [
            {
                "title": "Freytag Dramatic Tension Function",
                "latex": "T(t) = \\begin{cases} T_0 + \\alpha t & \\text{Exposition } (0 \\le t < t_1) \\ T(t_1) + k(t - t_1)^2 & \\text{Rising Action } (t_1 \\le t < t_{\\text{climax}}) \\ T_{\\max} & \\text{Climax Peak } (t = t_{\\text{climax}}) \\ T_{\\max} - \\beta(t - t_{\\text{climax}}) & \\text{Falling Action } (t_{\\text{climax}} < t \\le t_{\\text{res}}) \\end{cases}",
                "note": "Mathematical curve tracking dramatic tension from initial exposition through peak climax to resolution."
            },
            {
                "title": "Peripeteia Climax Turning Point Invariant",
                "latex": "\\frac{dT}{dt} \\Big|_{t_{\\text{climax}}} = 0 \\quad (\\text{Peak Tension / Irreversible Pivot})",
                "note": "At the climax, tension reaches its local maximum, forcing an irreversible transition into consequences."
            },
            {
                "title": "Denouement Equilibrium Law",
                "latex": "\\lim_{t \\to t_{\\text{final}}} T(t) = T_{\\text{new equilibrium}} \\quad (\\text{Catharsis / Restored Order})",
                "note": "Aristotelian catharsis and narrative closure restore emotional and societal balance."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Freytag Dramatic Pyramid Narrative Trajectory Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><line x1='30' y1='165' x2='430' y2='165' stroke='#94a3b8' stroke-width='1.5'/><path d='M 40 155 L 110 155 L 230 45 L 350 155 L 420 155' fill='none' stroke='#0284c7' stroke-width='3.5' stroke-linejoin='round'/><circle cx='40' cy='155' r='5' fill='#1e40af'/><text x='50' y='140' fill='#1e40af' font-size='9' font-weight='bold'>1. Exposition</text><circle cx='110' cy='155' r='5' fill='#f59e0b'/><text x='110' y='175' fill='#b45309' font-size='8' font-weight='bold' text-anchor='middle'>Inciting Incident</text><circle cx='170' cy='100' r='4' fill='#0284c7'/><text x='150' y='95' fill='#0284c7' font-size='9' font-weight='bold'>2. Rising Action</text><circle cx='230' cy='45' r='7' fill='#ef4444'/><text x='230' y='30' fill='#b91c1c' font-size='11' font-weight='bold' text-anchor='middle'>3. CLIMAX (PEAK)</text><circle cx='290' cy='100' r='4' fill='#0284c7'/><text x='310' y='95' fill='#0284c7' font-size='9' font-weight='bold'>4. Falling Action</text><circle cx='380' cy='155' r='5' fill='#10b981'/><text x='385' y='140' fill='#047857' font-size='9' font-weight='bold'>5. Resolution</text><text x='230' y='190' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Classic Dramatic Mountain: From Inciting Incident to Cathartic Resolution &#x2713;</text></svg>",
        "diagramLabel": "Freytag dramatic pyramid narrative trajectory diagram",
        "diagramCaption": "Freytag's Pyramid: The classic 5-stage dramatic trajectory rising from initial exposition to peak climax and down to final resolution.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Compare and contrast the structure of texts and analyze how plot complications contribute to meaning.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Gustav Freytag: Technique of the Drama", "desc": "The foundational 1863 text formalizing dramatic rising action, climax, and falling action.", "url": "https://www.gutenberg.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Structuring Plot and Narrative Tension", "desc": "Practical strategies for pacing the inciting incident, midpoint reversal, and climax.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-mountain"}
        ]
    },
    "Conflict Types": {
        "category": "Plot & Structure",
        "definition": "Conflict is the primary kinetic thermodynamic engine of storytelling, without which narrative momentum ceases to exist. Conflict divides along internal and external ontological axes: Internal Conflict (Character vs. Self) encompasses moral hesitation, cognitive dissonance, guilt, and emotional ambivalence; External Conflict encompasses Character vs. Character (interpersonal clash of incompatible wills), Character vs. Nature (elemental struggle for survival against physical environments), Character vs. Society (resistance against oppressive customs, institutional laws, or authoritarian orthodoxy), and Character vs. Technology/Fate.",
        "basicDefinition": "Conflict is the challenge or fight that drives the plot forward. Stories have internal struggles inside a character's own heart, or external battles against another person, nature's storms, or unfair laws in society.",
        "breakdown": [
            {
                "label": "Character vs. Self (Internal)",
                "text": "Battling fear, pride, guilt, or tough moral choices inside one's own conscience."
            },
            {
                "label": "Character vs. Character & Society",
                "text": "Direct clashes against an antagonist or challenging unfair cultural rules and government systems."
            },
            {
                "label": "Character vs. Nature & Technology",
                "text": "Surviving wilderness elements, blizzards, or battling dangerous artificial machines."
            }
        ],
        "example": "Standard Analysis: 'Jack London's 'To Build a Fire' exemplifies pure Character vs. Nature in the Yukon. Arthur Miller's 'The Crucible' pits John Proctor in Character vs. Society against Salem's court. Shakespeare's 'Macbeth' tracks the torment of Character vs. Self/Guilt.'",
        "basicExample": "Simple Sentence: 'A hiker trapped in a snowstorm faces Character vs. Nature, while deciding whether to confess to a broken window is Character vs. Self.'",
        "proTip": "Layer your conflicts! The most unforgettable stories combine external danger (a sinking ship) with internal growth (overcoming fear to save a rival) simultaneously.",
        "question": "A character wrestling with feelings of guilt after lying to a friend is experiencing which type of conflict?",
        "choices": [
            "Character vs. Nature",
            "Character vs. Self (Internal)",
            "Character vs. Technology"
        ],
        "correctIndex": 1,
        "explanation": "An internal battle within a character's mind or conscience constitutes Character vs. Self.",
        "equations": [
            {
                "title": "Total Narrative Conflict Partition Matrix",
                "latex": "\\mathbf{C}_{\\text{total}} = \\mathbf{C}_{\\text{internal}}(\\text{Self}) \\oplus \\sum_{k} \\mathbf{C}_{\\text{external}}(\\text{Person}_k, \\text{Society}, \\text{Nature}, \\text{Tech})",
                "note": "Total story friction is the direct sum of internal psychological and external situational conflicts."
            },
            {
                "title": "Dramatic Resistance Vector Dynamic",
                "latex": "\\vec{F}_{\\text{friction}} = \\vec{V}(\\text{Protagonist Agency}) \\times \\vec{R}(\\text{Antagonist Force}) \\neq 0",
                "note": "Narrative momentum requires continuous non-zero resistance against the protagonist's goals."
            },
            {
                "title": "Climactic Resolution Invariant",
                "latex": "\\lim_{t \\to t_{\\text{resolution}}} \\mathbf{C}_{\\text{total}}(t) \\to 0 \\implies \\text{Narrative Closure Established}",
                "note": "The exhaustion or decisive resolution of the core conflict brings narrative closure."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Taxonomy of Narrative Conflict Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='200' height='65' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='47' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>INTERNAL CONFLICT</text><text x='120' y='68' fill='#1e3a8a' font-size='10' text-anchor='middle'>Character vs. Self (Guilt, Fear, Ethics)</text><rect x='240' y='25' width='200' height='65' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='340' y='47' fill='#991b1b' font-size='11' font-weight='bold' text-anchor='middle'>EXTERNAL: VS. PERSON</text><text x='340' y='68' fill='#7f1d1d' font-size='10' text-anchor='middle'>Protagonist vs. Antagonist Rivalry</text><rect x='20' y='105' width='200' height='65' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='120' y='127' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>EXTERNAL: VS. NATURE</text><text x='120' y='148' fill='#14532d' font-size='10' text-anchor='middle'>Blizzards, Oceans, Wilderness Survival</text><rect x='240' y='105' width='200' height='65' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='127' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>EXTERNAL: VS. SOCIETY</text><text x='340' y='148' fill='#78350f' font-size='10' text-anchor='middle'>Unjust Laws, Traditions, Totalitarian Systems</text></svg>",
        "diagramLabel": "The taxonomy of narrative conflict diagram",
        "diagramCaption": "The Conflict Matrix: The driving forces of narrative friction divided into internal psychological dilemmas and external worldly struggles.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.2", "desc": "Determine a theme or central idea and analyze how character conflicts drive plot progression.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Conflict Analysis in Fiction", "desc": "Classroom frameworks for identifying interpersonal, environmental, and institutional obstacles.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Narrative Friction and Dramatic Stakes", "desc": "Techniques for raising emotional and physical stakes through multi-layered conflicts.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-fist-raised"}
        ]
    },
    "Pacing & Suspense": {
        "category": "Plot & Structure",
        "definition": "Narrative pacing and suspense govern the temporal velocity and psychological tension of storytelling. Pacing is determined by the ratio between story time (the chronological duration of events in the diegesis) and discourse time (the space dedicated to recounting those events in text). Suspense is generated through cognitive information asymmetry—frequently via dramatic irony, where the reader possesses critical knowledge of impending peril that characters lack. Pacing is syntactically modulated: short paratactic clauses accelerate kinetic velocity, while expansive hypotactic prose dilates time for psychological contemplation.",
        "basicDefinition": "Pacing is the speed of the storytelling. Short, fast sentences and ticking clocks create suspense and racing hearts, while longer descriptions slow down the action so readers can breathe.",
        "breakdown": [
            {
                "label": "Story Time vs. Discourse Time",
                "text": "Stretching a 10-second bomb defusal across 5 pages builds supreme suspense; skipping 10 years in 1 sentence accelerates pacing."
            },
            {
                "label": "Dramatic Irony & Ticking Clocks",
                "text": "When readers know the danger before the character does, tension escalates exponentially."
            },
            {
                "label": "Syntactic Velocity",
                "text": "Short fragments mimic racing heartbeats in fight scenes; flowing sentences slow things down for reflection."
            }
        ],
        "example": "Standard Analysis: 'Poe's 'The Tell-Tale Heart' uses repetitive, staccato syntactic beats to simulate an accelerating heartbeat. Alfred Hitchcock's classic bomb theory demonstrates that showing a hidden bomb with a 5-minute timer transforms a mundane conversation into excruciating suspense.'",
        "basicExample": "Simple Sentence: 'Fast pacing: 'Footsteps. Closer. The doorknob turned. Run!' Slow pacing: 'The warm afternoon sun cast golden shadows across the sleepy garden.'",
        "proTip": "Remember Hitchcock's rule: If a bomb suddenly goes off with no warning, you get 10 seconds of surprise. But if you show the bomb under the table first with a ticking clock, you get 5 minutes of nail-biting suspense!",
        "question": "Which writing technique is most effective for speeding up narrative pacing during an intense action scene?",
        "choices": [
            "Writing lengthy descriptive paragraphs about historical architecture.",
            "Using short, punchy sentences and urgent action verbs.",
            "Pausing to describe the characters' childhood memories."
        ],
        "correctIndex": 1,
        "explanation": "Crisp syntax, short sentences, and rapid verbs speed up the narrative rhythm and elevate tension.",
        "equations": [
            {
                "title": "Genette Narrative Pacing Ratio",
                "latex": "\\text{Pacing} = \\frac{\\Delta \\text{Story Time } (\\text{Diegesis})}{\\Delta \\text{Discourse Time } (\\text{Text Words})} \\implies \\begin{cases} \\to \\infty & \\text{Ellipsis (Instant Skip)} \\ \\approx 1 & \\text{Dialogue / Scene (Real Time)} \\ \\to 0 & \\text{Descriptive Pause (Dilated Time)} \\end{cases}",
                "note": "Gérard Genette's foundational narratological formula for temporal pacing."
            },
            {
                "title": "Dramatic Irony Suspense Gradient",
                "latex": "\\text{Suspense} \\propto I_{\\text{reader}}(\\text{Impending Hazard}) - I_{\\text{character}}(\\text{Impending Hazard})",
                "note": "Suspense reaches peak intensity when the reader knows the imminent danger while the character remains oblivious."
            },
            {
                "title": "Syntactic Velocity Index",
                "latex": "v_{\\text{tempo}} \\propto \\frac{1}{\\overline{\\text{Words per Sentence}}} \\times \\text{Active Kinetic Verb Frequency}",
                "note": "Shorter sentence length directly correlates with higher perceived reading tempo and urgency."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Narrative Pacing Speedometer and Suspense Mechanics Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='125' height='130' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='87' y='48' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>SLOW PACING</text><text x='87' y='70' fill='#1e3a8a' font-size='8' text-anchor='middle'>Descriptive pauses</text><text x='87' y='88' fill='#1e3a8a' font-size='8' text-anchor='middle'>Long sentences</text><text x='87' y='106' fill='#1e3a8a' font-size='8' text-anchor='middle'>Sensory reflection</text><text x='87' y='135' fill='#2563eb' font-size='9' font-weight='bold' text-anchor='middle'>Builds Atmosphere</text><rect x='165' y='25' width='125' height='130' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='227' y='48' fill='#92400e' font-size='10' font-weight='bold' text-anchor='middle'>MEDIUM PACING</text><text x='227' y='70' fill='#78350f' font-size='8' text-anchor='middle'>Spoken dialogue</text><text x='227' y='88' fill='#78350f' font-size='8' text-anchor='middle'>Real-time scenes</text><text x='227' y='106' fill='#78350f' font-size='8' text-anchor='middle'>Balanced paragraphs</text><text x='227' y='135' fill='#d97706' font-size='9' font-weight='bold' text-anchor='middle'>Advances Plot</text><rect x='305' y='25' width='125' height='130' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='367' y='48' fill='#991b1b' font-size='10' font-weight='bold' text-anchor='middle'>FAST PACING</text><text x='367' y='70' fill='#7f1d1d' font-size='8' text-anchor='middle'>Short fragments</text><text x='367' y='88' fill='#7f1d1d' font-size='8' text-anchor='middle'>Ticking clock</text><text x='367' y='106' fill='#7f1d1d' font-size='8' text-anchor='middle'>Action &amp; danger</text><text x='367' y='135' fill='#dc2626' font-size='9' font-weight='bold' text-anchor='middle'>Peak Suspense!</text><text x='230' y='180' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Pacing modulates the heartbeat and psychological tension of the reader &#x2713;</text></svg>",
        "diagramLabel": "Narrative pacing speedometer and suspense mechanics diagram",
        "diagramCaption": "Pacing & Suspense Mechanics: Regulating story speed from slow descriptive pauses to high-velocity staccato action and cliffhanger suspense.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Analyze how an author's timing and pacing choices create suspense, tension, or humor.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Gérard Genette: Narrative Discourse", "desc": "The foundational critical treatise on temporal narrative order, duration, frequency, and mood.", "url": "https://www.cornellpress.cornell.edu/", "icon": "fas fa-university"},
            {"title": "MasterClass Literature: Building Pacing and Suspense", "desc": "Industry masterclass on deploying cliffhangers, syntactic compression, and dramatic irony.", "url": "https://www.masterclass.com/articles/how-to-write-suspense", "icon": "fas fa-stopwatch"}
        ]
    },
    "Narrative Arcs": {
        "category": "Plot & Structure",
        "definition": "A narrative arc represents the overarching macroscopic trajectory of storytelling through which plot events, thematic dilemmas, and character evolutions unfold. Beyond the standard symmetrical pyramid, literary fiction employs diverse macro-architectures: The Hero's Quest / Monomyth (Departure from ordinary world, trials, supreme ordeal, and return with boon); The Tragic Downfall (a high-status protagonist brought to catastrophic ruin through hamartia/fatal flaw); In Medias Res (initiating the narrative in the midst of the crisis before retrospective analepsis); Frame Narratives (stories nested within an outer narrator's storytelling context); and Picaresque episodic journeys.",
        "basicDefinition": "A narrative arc is the big overall path of a story's journey. While many stories follow a quest to find an item or save a friend, others follow a tragedy where a character falls, or a mystery with twists and turns.",
        "breakdown": [
            {
                "label": "The Hero's Quest Arc",
                "text": "Leaving the ordinary world, facing dangerous trials, gaining wisdom/treasure, and returning transformed."
            },
            {
                "label": "The Tragic Downfall Arc",
                "text": "A noble hero makes fatal errors driven by hubris and experiences complete ruin."
            },
            {
                "label": "In Medias Res & Framing",
                "text": "Plunging right into the middle of action, or nesting a story inside another outer story."
            }
        ],
        "example": "Standard Analysis: 'Homer's 'Odyssey' represents the quintessential Quest and Return arc. Sophocles' 'Oedipus Rex' exemplifies the devastating Tragic Downfall arc. Shelley's 'Frankenstein' utilizes a triple-nested Frame Narrative (Captain Walton, Victor Frankenstein, the Creature).' ",
        "basicExample": "Simple Sentence: 'In The Hobbit, Bilbo Baggins follows the classic Quest arc: 'There and Back Again', returning home to his cozy hobbit hole changed into a brave adventurer.'",
        "proTip": "Notice where the story starts! If a book opens with the hero dangling from a cliff in chapter 1, the author is using 'In Medias Res' (Latin for 'into the middle of things') to hook your curiosity immediately!",
        "question": "What is the Latin narrative term for a story that opens right in the middle of intense dramatic action rather than starting at the quiet beginning?",
        "choices": [
            "Carpe Diem",
            "In Medias Res",
            "Deus Ex Machina"
        ],
        "correctIndex": 1,
        "explanation": "'In Medias Res' describes plunging the audience directly into the midst of dramatic complications.",
        "equations": [
            {
                "title": "Campbellian Monomyth Cyclic Vector",
                "latex": "\\vec{\\mathbf{A}}_{\\text{Quest}} = \\text{Departure} \\to \\text{Initiation} \\to \\text{Apotheosis} \\to \\text{Return With Boon}",
                "note": "Joseph Campbell's cyclical heroic journey across the threshold of adventure and return."
            },
            {
                "title": "Tragic Downfall Degeneration Curvature",
                "latex": "\\mathbf{A}_{\\text{Tragedy}}(t) = -a(t - t_0)^2 + h_{\\max} \\quad (\\text{Catastrophic Demise via Hamartia})",
                "note": "The tragic trajectory peaks in fortune before descending irreversibly into catastrophe."
            },
            {
                "title": "Frame Narrative Nested Topology",
                "latex": "\\text{Narrative}_{\\text{nested}} = \\text{Frame}_{\\text{outer}} \\circ \\left( \\bigcup_{i=1}^{k} \\text{Story}_{\\text{inner}, i} \\right)",
                "note": "A framing narrator introduces and contains one or more embedded internal narratives."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Narrative Arc Morphologies and Structural Journeys Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='48' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>THE QUEST ARC (MONOMYTH)</text><path d='M 45 140 C 60 70, 180 70, 195 140' fill='none' stroke='#2563eb' stroke-width='3'/><circle cx='45' cy='140' r='5' fill='#1e40af'/><text x='55' y='155' fill='#1e40af' font-size='8' font-weight='bold'>Departure</text><circle cx='120' cy='88' r='5' fill='#f59e0b'/><text x='120' y='75' fill='#b45309' font-size='8' font-weight='bold' text-anchor='middle'>Supreme Ordeal</text><circle cx='195' cy='140' r='5' fill='#10b981'/><text x='185' y='155' fill='#047857' font-size='8' font-weight='bold'>Return &amp; Boon</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='340' y='48' fill='#991b1b' font-size='11' font-weight='bold' text-anchor='middle'>THE TRAGIC DOWNFALL ARC</text><path d='M 265 75 C 310 65, 360 100, 415 150' fill='none' stroke='#dc2626' stroke-width='3'/><circle cx='265' cy='75' r='5' fill='#f59e0b'/><text x='275' y='65' fill='#b45309' font-size='8' font-weight='bold'>High Status</text><circle cx='340' cy='90' r='5' fill='#b91c1c'/><text x='340' y='80' fill='#7f1d1d' font-size='8' font-weight='bold' text-anchor='middle'>Fatal Error</text><circle cx='415' cy='150' r='5' fill='#450a0a'/><text x='400' y='160' fill='#450a0a' font-size='8' font-weight='bold'>Catastrophe</text><text x='230' y='185' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Diverse Narrative Macro-Shapes Drive World Literature &#x2713;</text></svg>",
        "diagramLabel": "Narrative arc morphologies and structural journeys diagram",
        "diagramCaption": "Narrative Arc Morphologies: Visualizing the Quest Cycle alongside the Tragic Downfall curve.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.5", "desc": "Compare and contrast narrative macro-structures across multiple complex literary works.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Joseph Campbell: The Hero with a Thousand Faces", "desc": "The foundational monomyth cycle of departure, initiation, and return.", "url": "https://www.jcf.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Structural Narratology and Story Arcs", "desc": "Techniques for mapping cyclical quests, framing tales, and dramatic tragedies.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/writing_in_literature/index.html", "icon": "fas fa-compass"}
        ]
    },
    "Diction & Syntax": {
        "category": "Author's Craft",
        "definition": "Diction and syntax constitute the fundamental stylistic architecture of literary voice. Diction represents the author's micro-level lexical selection (elevated vs. colloquial register, abstract vs. concrete nouns, pedantic vs. poetic vocabulary, denotation vs. emotive connotation). Syntax represents the macro-level structural arrangement of phrases, clauses, and sentences (periodic sentences delaying the main clause for suspense vs. loose cumulative sentences, parallelisms, chiasmus, polysyndeton vs. asyndeton, and deliberate paratactic fragments).",
        "basicDefinition": "Diction is the special words the author chooses (fancy words vs. slang). Syntax is how those words are put together into sentences (short and choppy vs. long and flowing).",
        "breakdown": [
            {
                "label": "Diction (Word Choice)",
                "text": "Choosing specific words with precise emotional shades (e.g., 'stalking' vs. 'walking')."
            },
            {
                "label": "Syntax (Sentence Architecture)",
                "text": "Arranging clauses for rhythm, emphasis, and dramatic pacing."
            },
            {
                "label": "Periodic vs. Loose Sentences",
                "text": "Periodic sentences save the main idea for the very end for suspense; Loose sentences state the main idea upfront."
            }
        ],
        "example": "Standard Analysis: 'Hemingway's style relies on spare Anglo-Saxon diction and paratactic syntax with short active clauses. In contrast, Faulkner employs ornate Latinate diction and labyrinthine hypotaxis stretching across multi-page sentences. In Macbeth, Shakespeare utilizes inverted chiasmus: 'Fair is foul, and foul is fair.''",
        "basicExample": "Simple Sentence: 'Formal diction: 'I request your assistance.' Informal diction: 'Help me out, buddy!' Short syntax: 'He froze. He waited. Darkness.''",
        "proTip": "Look for sudden sentence shifts! When an author writes three long, flowing sentences and follows them with a sudden two-word sentence: 'He died.'—that sudden change in syntax creates maximum emotional shock!",
        "question": "Which stylistic term describes the purposeful selection of vocabulary and word choices an author uses?",
        "choices": [
            "Syntax",
            "Diction",
            "Plot"
        ],
        "correctIndex": 1,
        "explanation": "Diction refers specifically to the author's choice of words and vocabulary register.",
        "equations": [
            {
                "title": "Literary Voice Stylistic Formulation Law",
                "latex": "\\text{Style} = \\mathbf{Diction}(\\text{Register}, \\text{Connotation}) \\otimes \\mathbf{Syntax}(\\text{Clause Architecture}, \\text{Cadence})",
                "note": "Authorial voice emerges from the synergistic combination of vocabulary and sentence construction."
            },
            {
                "title": "Connotative Semantic Mapping Vector",
                "latex": "\\mathbf{Word} = \\mathbf{Denotation}(\\text{Literal}) + \\vec{\\mathbf{C}}(\\text{Emotional / Cultural Connotations})",
                "note": "Authors choose words whose connotative vectors trigger specific affective responses in the reader."
            },
            {
                "title": "Periodic Suspense Delay Function",
                "latex": "\\text{Periodic Sentence} = \\left[ \\sum_{i=1}^{n} \\text{Subordinate Clause}_i \\right] \\to \\mathbf{Main Clause}_{\\text{resolution}} \\quad (\\text{Delayed Closure})",
                "note": "Withholding the main independent clause until the terminal period creates cumulative suspense."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Diction and Syntax Stylistic Architecture Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='48' fill='#1e40af' font-size='12' font-weight='bold' text-anchor='middle'>DICTION (WORDS)</text><text x='120' y='72' fill='#1e3a8a' font-size='9' text-anchor='middle'>Formal vs. Informal</text><text x='120' y='90' fill='#1e3a8a' font-size='9' text-anchor='middle'>Concrete vs. Abstract</text><text x='120' y='108' fill='#1e3a8a' font-size='9' text-anchor='middle'>Positive vs. Negative Connotation</text><text x='120' y='132' fill='#2563eb' font-size='10' font-weight='bold' text-anchor='middle'>Selects Precise Meaning</text><text x='120' y='155' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>&quot;The Paint Colors&quot; &#x2713;</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='48' fill='#92400e' font-size='12' font-weight='bold' text-anchor='middle'>SYNTAX (STRUCTURE)</text><text x='340' y='72' fill='#78350f' font-size='9' text-anchor='middle'>Short/Punchy vs. Long/Flowing</text><text x='340' y='90' fill='#78350f' font-size='9' text-anchor='middle'>Periodic vs. Loose Sentences</text><text x='340' y='108' fill='#78350f' font-size='9' text-anchor='middle'>Parallelism &amp; Rhythm</text><text x='340' y='132' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>Builds Dramatic Pacing</text><text x='340' y='155' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>&quot;The Architecture&quot; &#x2713;</text></svg>",
        "diagramLabel": "Diction and syntax stylistic architecture diagram",
        "diagramCaption": "The Stylistic Architecture: How purposeful vocabulary selection (diction) and sentence construction (syntax) combine to generate rhythm and dramatic focus.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Determine the meaning of words and phrases and analyze the impact of specific diction and syntax choices on meaning and tone.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Purdue OWL: Diction and Syntactic Architecture", "desc": "Comprehensive guide to lexical registers, sentence cadence, and avoiding passive clutter.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-university"},
            {"title": "Harvard College Writing Center: Sentence Structure & Style", "desc": "Advanced strategies for modulating syntactic tempo, periodic structure, and rhetorical balance.", "url": "https://writingcenter.fas.harvard.edu/", "icon": "fas fa-pen-nib"}
        ]
    },
    "Tone & Mood": {
        "category": "Author's Craft",
        "definition": "Tone and mood are distinct but interdependent emotional coordinates of literary prose. Tone represents the author's or narrator's attitude toward the subject matter, characters, or reader, mediated through diction, figurative tropes, and rhetorical irony (e.g., solemn, cynical, wry, reverent, indignant). Mood (atmosphere) represents the emotional ambiance and psychological affective response evoked within the reader, cultivated through sensory environmental details, acoustic rhythm, and narrative pacing (e.g., eerie, melancholic, tranquil, claustrophobic).",
        "basicDefinition": "Tone is the author's attitude or voice (like sarcastic, serious, or playful). Mood is the feeling the reader gets inside their heart (like feeling spooky, peaceful, or tense).",
        "breakdown": [
            {
                "label": "Tone (The Author's Attitude)",
                "text": "How the author sounds toward the story: serious, mocking, loving, humorous, or angry."
            },
            {
                "label": "Mood (The Reader's Feeling)",
                "text": "The emotional climate felt by the reader: eerie, joyful, suspenseful, or heartbroken."
            },
            {
                "label": "Sensory Setting Triggers",
                "text": "A dark stormy night creates a suspenseful mood; a sunlit picnic creates a cheerful mood."
            }
        ],
        "example": "Standard Analysis: 'In Poe's 'The Fall of the House of Usher', the tone is clinical and rational, while the mood evoked in the reader is one of suffocating, macabre dread. In Swift's 'A Modest Proposal', the tone is deadpan satire, producing moral outrage in the audience.'",
        "basicExample": "Simple Sentence: 'Tone: The author poked fun at the grumpy cat. Mood: The dark, creaking basement made the reader shiver with goosebumps.'",
        "proTip": "Remember this easy rhyme: 'Tone is the author's Tone of voice; Mood is My emotional choice!'",
        "question": "What is the fundamental difference between Tone and Mood in literature?",
        "choices": [
            "Tone is the font style; Mood is the length of the book.",
            "Tone is the author's attitude toward the subject; Mood is the emotional feeling evoked in the reader.",
            "Tone applies only to poetry; Mood applies only to plays."
        ],
        "correctIndex": 1,
        "explanation": "Tone reflects the author's attitude, while mood is the emotional atmosphere experienced by the reader.",
        "equations": [
            {
                "title": "Atmospheric Resonance Dual Model",
                "latex": "\\begin{cases} \\text{Tone} & = \\mathbf{Attitude}_{\\text{author}} \\implies f(\\text{Diction}, \\text{Irony}, \\text{Perspective}) \\ \\text{Mood} & = \\mathbf{Affect}_{\\text{reader}} \\implies g(\\text{Setting}, \\text{Sensory Imagery}, \\text{Pacing}) \\end{cases}",
                "note": "Tone originates from authorial stance; mood is synthesized through reader cognitive reception."
            },
            {
                "title": "Ironic Tone Inversion Operator",
                "latex": "\\text{Tone}_{\\text{ironic}} = \\mathbf{Literal Semantic Meaning} \\times (-1) \\implies \\text{Satirical Stance}",
                "note": "In satire and irony, the author's true attitude directly inverts the literal textual statement."
            },
            {
                "title": "Affective Atmosphere Synthesis",
                "latex": "\\vec{\\mathbf{M}}_{\\text{mood}} = \\vec{\\mathbf{S}}_{\\text{setting}} + \\vec{\\mathbf{D}}_{\\text{diction}} + \\vec{\\mathbf{T}}_{\\text{tempo}}",
                "note": "The total atmospheric mood is the vector sum of sensory setting, word choice, and narrative speed."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Tone vs Mood Communicative Mirror Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='180' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='115' y='48' fill='#1e40af' font-size='12' font-weight='bold' text-anchor='middle'>TONE (AUTHOR)</text><text x='115' y='72' fill='#1e3a8a' font-size='10' font-weight='bold' text-anchor='middle'>The Author's Attitude</text><text x='115' y='95' fill='#475569' font-size='9' text-anchor='middle'>Serious &bull; Sarcastic</text><text x='115' y='110' fill='#475569' font-size='9' text-anchor='middle'>Playful &bull; Somber &bull; Cynical</text><text x='115' y='132' fill='#2563eb' font-size='9' text-anchor='middle'>Created by Diction &amp; Irony</text><text x='115' y='155' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>&quot;The Speaker&apos;s Voice&quot; &#x2713;</text><path d='M 210 97 L 245 97' stroke='#64748b' stroke-width='2' marker-end='url(#arrow)'/><rect x='255' y='25' width='180' height='145' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='345' y='48' fill='#991b1b' font-size='12' font-weight='bold' text-anchor='middle'>MOOD (READER)</text><text x='345' y='72' fill='#7f1d1d' font-size='10' font-weight='bold' text-anchor='middle'>The Reader's Feeling</text><text x='345' y='95' fill='#475569' font-size='9' text-anchor='middle'>Spooky &bull; Peaceful</text><text x='345' y='110' fill='#475569' font-size='9' text-anchor='middle'>Suspenseful &bull; Gloomy</text><text x='345' y='132' fill='#dc2626' font-size='9' text-anchor='middle'>Created by Setting &amp; Imagery</text><text x='345' y='155' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>&quot;The Scene&apos;s Atmosphere&quot; &#x2713;</text></svg>",
        "diagramLabel": "Tone vs mood communicative mirror diagram",
        "diagramCaption": "Tone vs. Mood: The Author's attitude (Tone) projects through sensory setting and diction to evoke an emotional climate (Mood) within the Reader.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Analyze the impact of specific word choices on meaning and tone, including analogies or allusions.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "ReadWriteThink: Dissecting Tone and Mood in Literature", "desc": "Instructional strategies for identifying authorial attitude versus ambient emotional atmosphere.", "url": "https://www.readwritethink.org/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Tone and Rhetorical Voice", "desc": "Techniques for controlling emotional resonance and persona in fiction and essays.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-theater-masks"}
        ]
    },
    "Point of View": {
        "category": "Author's Craft",
        "definition": "Point of view (narrative focalization) establishes the perceptual and epistemic vantage point through which narrative information is filtered to the reader. Major typologies include: First-Person ('I' / 'we'—immediate subjective intimacy, susceptible to cognitive unreliability); Second-Person ('you'—direct interactive address, rare, imperative); Third-Person Limited (external narrator focalized exclusively through the internal perceptions of a single viewpoint character); Third-Person Omniscient (an all-knowing, godlike consciousness possessing comprehensive access to all characters' motives, histories, and fates); and Third-Person Objective (a cinematic 'camera' perspective reporting only observable physical actions and dialogue without interiority).",
        "basicDefinition": "Point of view is the camera angle from which the story is told. First-Person uses 'I' and 'me'; Third-Person Limited follows one character using 'he/she'; and Third-Person Omniscient is like an all-knowing narrator who can see into everyone's mind.",
        "breakdown": [
            {
                "label": "First Person (I / Me / We)",
                "text": "Told directly by a character inside the story; deeply personal, but limited to what they experience."
            },
            {
                "label": "Third Person Limited (He / She / They)",
                "text": "Outside narrator who zooms in closely and reads the private thoughts of only one main character."
            },
            {
                "label": "Third Person Omniscient (All-Knowing)",
                "text": "All-knowing outside narrator who knows the secrets, thoughts, and futures of every single character."
            }
        ],
        "example": "Standard Analysis: 'Salinger's 'The Catcher in the Rye' employs subjective, conversational First-Person. Austen's 'Pride and Prejudice' utilizes Third-Person Limited with free indirect discourse focalized through Elizabeth Bennet. Hawthorne's 'The Scarlet Letter' demonstrates panoramic Third-Person Omniscience.'",
        "basicExample": "Simple Sentence: 'First-person: 'I opened the door and gasped.' Third-person limited: 'Leo opened the door, wondering what was inside.' Omniscient: 'Leo opened the door, unaware that his sister had already set a surprise party.'",
        "proTip": "Watch for the Unreliable Narrator! When a story is in the First Person, remember that the narrator might be lying, biased, or too young to understand what is truly happening. Always read between the lines!",
        "question": "Which point of view features an all-knowing outside narrator who has access to the thoughts, feelings, and histories of every character?",
        "choices": [
            "First-Person Subjective",
            "Third-Person Limited",
            "Third-Person Omniscient"
        ],
        "correctIndex": 2,
        "explanation": "Third-Person Omniscient possesses godlike epistemic access into the internal consciousness of all characters.",
        "equations": [
            {
                "title": "Genette Narrative Focalization Model",
                "latex": "\\mathbf{POV} = \\begin{cases} \\text{Zero Focalization (Omniscient)} & \\implies \\text{Narrator knows } > \\text{Character} \\ \\text{Internal Focalization (Limited / 1st)} & \\implies \\text{Narrator knows } = \\text{Character} \\ \\text{External Focalization (Objective)} & \\implies \\text{Narrator knows } < \\text{Character} \\end{cases}",
                "note": "Gérard Genette's epistemic taxonomy of narrative information filtering."
            },
            {
                "title": "Unreliable Narrator Divergence Vector",
                "latex": "\\Delta \\mathbf{Truth} = \\|\\mathbf{Diegetic Fact} - \\mathbf{Narrator Retelling}\\| > 0 \\implies \\text{Unreliable Focalizer}",
                "note": "Occurs when subjective narrative account diverges from authentic objective diegetic reality."
            },
            {
                "title": "Epistemic Interiority Radius Invariant",
                "latex": "R_{\\text{epistemic}} = \\begin{cases} 1 & \\text{First Person / Limited (Single Consciousness)} \\ \\infty & \\text{Omniscient (Universal Interiority)} \\ 0 & \\text{Objective Dramatic (Zero Internal Access)} \\end{cases}",
                "note": "Defines the boundary of psychological access granted to the reader."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Narrative Point of View Vantage Points Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='130' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='85' y='48' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>1ST PERSON</text><circle cx='85' cy='85' r='25' fill='#bfdbfe' stroke='#1e40af' stroke-width='2'/><circle cx='85' cy='85' r='8' fill='#1e40af'/><text x='85' y='125' fill='#1e3a8a' font-size='10' font-weight='bold' text-anchor='middle'>&quot;I / Me / We&quot;</text><text x='85' y='145' fill='#475569' font-size='8' text-anchor='middle'>Inside the character</text><text x='85' y='158' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>Subjective intimacy</text><rect x='165' y='25' width='130' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='230' y='48' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>3RD LIMITED</text><circle cx='230' cy='85' r='25' fill='#fde68a' stroke='#d97706' stroke-width='2'/><polygon points='230,65 245,95 215,95' fill='#b45309'/><text x='230' y='125' fill='#78350f' font-size='10' font-weight='bold' text-anchor='middle'>&quot;He / She / They&quot;</text><text x='230' y='145' fill='#475569' font-size='8' text-anchor='middle'>1 Character spotlight</text><text x='230' y='158' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>Focused exterior</text><rect x='310' y='25' width='130' height='145' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='375' y='48' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>3RD OMNISCIENT</text><circle cx='375' cy='85' r='25' fill='#bbf7d0' stroke='#166534' stroke-width='2'/><circle cx='365' cy='80' r='5' fill='#166534'/><circle cx='385' cy='80' r='5' fill='#166534'/><path d='M 365 95 Q 375 105 385 95' stroke='#166534' stroke-width='2' fill='none'/><text x='375' y='125' fill='#14532d' font-size='10' font-weight='bold' text-anchor='middle'>&quot;All-Knowing&quot;</text><text x='375' y='145' fill='#475569' font-size='8' text-anchor='middle'>Knows all minds</text><text x='375' y='158' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>Godlike panopticon</text></svg>",
        "diagramLabel": "Narrative point of view vantage points diagram",
        "diagramCaption": "Point of View Perspectives: Contrasting the first-person internal eye, third-person limited spotlight, and third-person omniscient all-seeing panopticon.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.6", "desc": "Analyze how differences in the points of view of characters and the audience create effects such as suspense or humor.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Gérard Genette: Narrative Discourse & Focalization", "desc": "The foundational narratological taxonomy of zero, internal, and external focalization.", "url": "https://www.cornellpress.cornell.edu/", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Point of View in Creative Writing", "desc": "Practical guide to selecting, managing, and maintaining consistent narrative perspectives.", "url": "https://owl.purdue.edu/owl/subject_specific_writing/creative_writing/fiction/index.html", "icon": "fas fa-eye"}
        ]
    },
    "Imagery & Sensory Details": {
        "category": "Author's Craft",
        "definition": "Imagery and sensory details constitute the diegetic immersion engine of creative writing, activating the reader's neural sensorium through vivid descriptive language. Sensory modalities encompass: Visual (color, shape, luminosity), Auditory (acoustic frequency, euphony, cacophony), Olfactory (fragrances, pungent odors), Gustatory (sweet, bitter, umami, saline tastes), Tactile (texture, thermal sensations, pressure), Kinesthetic (physical bodily movement and kinetic acceleration), and Organic (internal visceral sensations such as vertigo, racing pulse, and nausea). Sensory details actualize the fundamental craft maxim of 'Show, Don't Tell'.",
        "basicDefinition": "Sensory details are words that make you see, hear, smell, taste, and touch the story inside your imagination. They turn plain words into a vivid movie in your mind.",
        "breakdown": [
            {
                "label": "The Five Senses",
                "text": "Sight (golden sparks), Sound (roaring thunder), Smell (warm vanilla), Taste (bitter coffee), Touch (rough bark)."
            },
            {
                "label": "Kinesthetic & Visceral Details",
                "text": "Movement through space (kinesthetic) and bodily feelings like a racing heartbeat or a knot in the stomach (visceral)."
            },
            {
                "label": "Show, Don't Tell",
                "text": "Instead of telling 'He was scared', show 'His knees trembled and his breath caught in his dry throat'."
            }
        ],
        "example": "Standard Analysis: 'In Keats' 'Ode to a Nightingale', lush gustatory and tactile imagery evokes vintage wine tasting of Flora and green country. In Melville's 'Moby-Dick', auditory and kinesthetic prose captures the violent thrashing of the harpooned whale amid spray and splintering cedar.'",
        "basicExample": "Simple Sentence: 'Telling: The kitchen was busy. Showing with sensory details: The sizzle of garlic in hot olive oil filled the warm, flour-dusted kitchen with a mouth-watering aroma.'",
        "proTip": "Practice 'Show, Don't Tell'! Never just tell your reader that a character is cold. Show the frosty breath puffing into the air, the chattering teeth, and fingers so stiff they struggle to turn a key!",
        "question": "Which sensory modality is stimulated by: 'The pungent aroma of roasted cinnamon and melted sugar drifted through the chilly morning air'?",
        "choices": [
            "Auditory (Sound)",
            "Olfactory (Smell)",
            "Kinesthetic (Motion)"
        ],
        "correctIndex": 1,
        "explanation": "Descriptions of aromas, scents, and fragrances stimulate the olfactory (smell) sensory faculty.",
        "equations": [
            {
                "title": "Embodied Sensory Immersion Vector",
                "latex": "\\vec{\\mathbf{I}}_{\\text{sensory}} = [\\mathbf{Vis}, \\mathbf{Aud}, \\mathbf{Olf}, \\mathbf{Gust}, \\mathbf{Tact}, \\mathbf{Kin}, \\mathbf{Org}] \\implies \\text{Maximum Diegetic Presence}",
                "note": "Total immersion requires engaging multiple sensory channels across visual, acoustic, and visceral modalities."
            },
            {
                "title": "'Show, Don't Tell' Concrete Transduction Invariant",
                "latex": "\\text{Abstract Emotion}(\\mathbf{E}) \\xrightarrow{\\text{Sensory Details}} \\left\\{ \\text{Somatic Responses}, \\text{Sensory Actions}, \\text{Environmental Shifts} \\right\\}",
                "note": "Transforms ungrounded abstract nouns into visceral bodily and environmental reality."
            },
            {
                "title": "Synesthetic Cross-Modal Transfer Formula",
                "latex": "\\mathbf{Synesthesia} = \\mathbf{Modality}_A \\otimes \\mathbf{Modality}_B \\quad (\\text{e.g., 'A loud, screaming yellow', 'A velvety smooth voice'})",
                "note": "Cross-wiring two sensory faculties enhances lyrical poetry and memorable prose."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Sensory Immersion Wheel and Show Dont Tell Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><circle cx='230' cy='95' r='75' fill='none' stroke='#cbd5e1' stroke-width='2' stroke-dasharray='4 4'/><circle cx='230' cy='95' r='30' fill='#0284c7'/><text x='230' y='92' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>SHOW,</text><text x='230' y='105' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>DON'T TELL</text><circle cx='230' cy='25' r='20' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='230' y='29' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>SIGHT</text><circle cx='295' cy='55' r='20' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='295' y='59' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>SOUND</text><circle cx='295' cy='135' r='20' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='295' y='139' fill='#991b1b' font-size='8' font-weight='bold' text-anchor='middle'>SMELL</text><circle cx='230' cy='165' r='20' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='230' y='169' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>TASTE</text><circle cx='165' cy='135' r='20' fill='#f3e8ff' stroke='#7e22ce' stroke-width='1.5'/><text x='165' y='139' fill='#6b21a8' font-size='8' font-weight='bold' text-anchor='middle'>TOUCH</text><circle cx='165' cy='55' r='20' fill='#e0e7ff' stroke='#4338ca' stroke-width='1.5'/><text x='165' y='59' fill='#3730a3' font-size='8' font-weight='bold' text-anchor='middle'>MOTION</text><text x='230' y='190' fill='#475569' font-size='10' font-weight='bold' text-anchor='middle'>Multi-Sensory Immersion brings prose vividly alive in the mind &#x2713;</text></svg>",
        "diagramLabel": "Sensory immersion wheel and show dont tell diagram",
        "diagramCaption": "The Sensory Immersion Wheel: Engaging the reader's full sensorium (sight, sound, smell, taste, touch, motion) to transform abstract words into visceral lived experience.",
        "references": [
            {"title": "Common Core Standard CCSS.ELA-LITERACY.RL.8.4", "desc": "Determine the meaning of words and phrases including figurative, connotative, and sensory meanings in complex literature.", "url": "/pages/standards.php?domain=ELA-RL", "icon": "fas fa-award"},
            {"title": "Poetry Foundation: Guide to Sensory Imagery and Tropes", "desc": "Authoritative guide on visual, olfactory, tactile, and synesthetic poetic devices.", "url": "https://www.poetryfoundation.org/learn/glossary-terms/imagery", "icon": "fas fa-university"},
            {"title": "Purdue OWL: Sensory Writing and Descriptive Detail", "desc": "Strategies for deploying multi-sensory concrete anchors to heighten narrative immersion.", "url": "https://owl.purdue.edu/owl/general_writing/academic_writing/establishing_arguments/rhetorical_strategies.html", "icon": "fas fa-fire"}
        ]
    }
};

// Load science and social studies datasets if not yet present
if (typeof window !== 'undefined' && !window.scienceLessons && typeof scienceLessons === 'undefined') {
    const sc = document.createElement('script');
    sc.src = '/assets/js/pages/science-lessons.js?v=2.23.0';
    if (document.head) document.head.appendChild(sc);
}
if (typeof window !== 'undefined' && !window.socialStudiesLessons && typeof socialStudiesLessons === 'undefined') {
    const sc2 = document.createElement('script');
    sc2.src = '/assets/js/pages/social-studies-lessons.js?v=2.23.0';
    if (document.head) document.head.appendChild(sc2);
}

let modalUtterance = null;
let currentModalTopic = null;
let activeLexileMode = 'standard';

window.setModalLexile = function(mode) {
    activeLexileMode = mode;
    const btnStd = document.getElementById('btn-lexile-standard');
    const btnBasic = document.getElementById('btn-lexile-basic');
    const badge = document.getElementById('lexile-indicator-badge');
    
    if (btnStd) {
        btnStd.classList.toggle('active', mode === 'standard');
        btnStd.setAttribute('aria-pressed', mode === 'standard' ? 'true' : 'false');
    }
    if (btnBasic) {
        btnBasic.classList.toggle('active', mode === 'basic');
        btnBasic.setAttribute('aria-pressed', mode === 'basic' ? 'true' : 'false');
    }
    if (badge) {
        badge.innerHTML = mode === 'standard' 
            ? '<i class="fas fa-book-reader"></i> Standard Academic Lexile'
            : '<i class="fas fa-feather-alt"></i> Basic English (Simplified)';
    }
    
    if (currentModalTopic) {
        renderModalTopic(currentModalTopic, activeLexileMode);
    }
};

function renderModalTopic(topicName, mode) {
    const categoryEl = document.getElementById('dynamic-modal-category');
    const titleEl = document.getElementById('dynamic-modal-title');
    const defEl = document.getElementById('dynamic-modal-definition');
    const breakdownEl = document.getElementById('dynamic-modal-breakdown');
    const exEl = document.getElementById('dynamic-modal-example');
    const protipWrap = document.getElementById('dynamic-modal-protip-wrap');
    const protipEl = document.getElementById('dynamic-modal-protip');
    const eqWrap = document.getElementById('dynamic-modal-equations-wrap');
    const eqEl = document.getElementById('dynamic-modal-equations');
    const graphWrap = document.getElementById('dynamic-modal-graph-wrap');
    const graphEl = document.getElementById('dynamic-modal-graph');
    const linksWrap = document.getElementById('dynamic-modal-links-wrap');
    const linksEl = document.getElementById('dynamic-modal-links');
    const questionEl = document.getElementById('dynamic-modal-quiz-question');
    const choicesEl = document.getElementById('dynamic-modal-quiz-choices');
    const feedbackEl = document.getElementById('dynamic-modal-quiz-feedback');
    const speakBtn = document.getElementById('speak-btn');
    
    // Stop speaking if active
    if (window.speechSynthesis.speaking) {
        window.speechSynthesis.cancel();
        if (speakBtn) {
            speakBtn.classList.remove('speaking');
            speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
        }
    }
    
    const mathData = (typeof window !== 'undefined' && window.mathLessons) || (typeof mathLessons !== 'undefined' ? mathLessons : null);
    const grammarData = (typeof window !== 'undefined' && window.grammarLessons) || (typeof grammarLessons !== 'undefined' ? grammarLessons : null);
    const litData = (typeof window !== 'undefined' && window.literatureLessons) || (typeof literatureLessons !== 'undefined' ? literatureLessons : null);
    const scienceData = (typeof window !== 'undefined' && window.scienceLessons) || (typeof scienceLessons !== 'undefined' ? scienceLessons : null);
    const socialData = (typeof window !== 'undefined' && window.socialStudiesLessons) || (typeof socialStudiesLessons !== 'undefined' ? socialStudiesLessons : null);

    // Resolve canonical topic and lesson
    let canonicalTopic = topicName;
    let lesson = (mathData && mathData[topicName])
        || (grammarData && grammarData[topicName])
        || (litData && litData[topicName])
        || (scienceData && scienceData[topicName])
        || (socialData && socialData[topicName]);

    if (!lesson && window.topicAliases && window.topicAliases[topicName]) {
        canonicalTopic = window.topicAliases[topicName];
        lesson = (mathData && mathData[canonicalTopic])
            || (grammarData && grammarData[canonicalTopic])
            || (litData && litData[canonicalTopic])
            || (scienceData && scienceData[canonicalTopic])
            || (socialData && socialData[canonicalTopic]);
    }

    if (!lesson && topicName) {
        const lower = topicName.toLowerCase();
        const datasets = [
            { data: scienceData, type: 'science' },
            { data: socialData, type: 'social' },
            { data: mathData, type: 'math' },
            { data: grammarData, type: 'grammar' },
            { data: litData, type: 'literature' }
        ];
        for (const entry of datasets) {
            if (!entry.data) continue;
            for (const key of Object.keys(entry.data)) {
                const kLower = key.toLowerCase();
                if (lower.includes(kLower) || kLower.includes(lower)) {
                    canonicalTopic = key;
                    lesson = entry.data[key];
                    break;
                }
            }
            if (lesson) break;
        }
    }
    
    if (lesson) {
        categoryEl.textContent = lesson.category;
        titleEl.textContent = canonicalTopic;
        
        const isMath = Boolean(mathData && mathData[canonicalTopic]);
        const isScience = Boolean(scienceData && scienceData[canonicalTopic]);
        const isSocial = Boolean(socialData && socialData[canonicalTopic]);
        const isGrammar = Boolean(grammarData && grammarData[canonicalTopic]);
        const isLiterature = Boolean(litData && litData[canonicalTopic]);
        
        // Handle Standard vs Basic English definitions
        if (mode === 'basic' && lesson.basicDefinition) {
            defEl.innerHTML = lesson.basicDefinition;
        } else {
            defEl.innerHTML = lesson.definition;
        }
        
        // Handle breakdown cards
        if (breakdownEl) {
            if (lesson.breakdown && lesson.breakdown.length > 0) {
                breakdownEl.style.display = 'grid';
                breakdownEl.innerHTML = lesson.breakdown.map(b => `
                    <div class="lecture-breakdown-item">
                        <div class="lecture-breakdown-label"><i class="fas fa-check-circle"></i> ${b.label}</div>
                        <p class="lecture-breakdown-text">${b.text}</p>
                    </div>
                `).join('');
            } else {
                breakdownEl.style.display = 'none';
                breakdownEl.innerHTML = '';
            }
        }

        // Handle Master Equations & Formula Vault
        if (eqWrap && eqEl) {
            if (lesson.equations && lesson.equations.length > 0) {
                eqWrap.style.display = 'block';
                const eqTitle = eqWrap.querySelector('.lecture-card-title');
                if (eqTitle) {
                    if (isMath) {
                        eqTitle.innerHTML = '<i class="fas fa-square-root-variable" style="color: #0284c7;"></i> Key Equations &amp; Canonical Formulas';
                    } else if (isScience) {
                        eqTitle.innerHTML = '<i class="fas fa-atom" style="color: #0284c7;"></i> Scientific Laws &amp; Mathematical Principles';
                    } else if (isSocial) {
                        eqTitle.innerHTML = '<i class="fas fa-landmark" style="color: #0284c7;"></i> Core Principles, Charters &amp; Quantitative Models';
                    } else {
                        eqTitle.innerHTML = '<i class="fas fa-spell-check" style="color: #0284c7;"></i> Syntax Rules &amp; Structural Formulations';
                    }
                }
                eqEl.innerHTML = lesson.equations.map(eq => `
                    <div class="equation-vault-card">
                        <span class="equation-vault-title">${eq.title}</span>
                        <div class="equation-vault-latex">${eq.latex}</div>
                        ${eq.note ? `<p class="equation-vault-note">${eq.note}</p>` : ''}
                    </div>
                `).join('');
            } else {
                eqWrap.style.display = 'none';
                eqEl.innerHTML = '';
            }
        }

        // Handle Visualization Diagrams & Graphs
        if (graphWrap && graphEl) {
            if (lesson.diagramSvg) {
                graphWrap.style.display = 'block';
                const graphTitle = graphWrap.querySelector('.lecture-card-title');
                if (graphTitle) {
                    if (isMath) {
                        graphTitle.innerHTML = '<i class="fas fa-chart-line" style="color: #10b981;"></i> Geometric / Mathematical Diagram';
                    } else if (isScience) {
                        graphTitle.innerHTML = '<i class="fas fa-microscope" style="color: #10b981;"></i> Scientific Model &amp; Systemic Diagram';
                    } else if (isSocial) {
                        graphTitle.innerHTML = '<i class="fas fa-map-marked-alt" style="color: #10b981;"></i> Historical Map, Timeline &amp; Systemic Diagram';
                    } else {
                        graphTitle.innerHTML = '<i class="fas fa-project-diagram" style="color: #10b981;"></i> Visual Map &amp; Structural Diagram';
                    }
                }
                graphEl.innerHTML = `
                    <div class="math-diagram-figure" role="img" aria-label="${lesson.diagramLabel || topicName + ' structural diagram'}">
                        ${lesson.diagramSvg}
                    </div>
                    ${lesson.diagramCaption ? `<p class="math-diagram-caption">${lesson.diagramCaption}</p>` : ''}
                `;
            } else {
                graphWrap.style.display = 'none';
                graphEl.innerHTML = '';
            }
        }
        
        // Handle example
        if (mode === 'basic' && lesson.basicExample) {
            exEl.innerHTML = lesson.basicExample;
        } else {
            exEl.innerHTML = lesson.example;
        }
        
        // Handle Pro-Tip / Pitfall
        if (protipWrap && protipEl) {
            if (lesson.proTip) {
                protipWrap.style.display = 'flex';
                protipEl.innerHTML = lesson.proTip;
            } else {
                protipWrap.style.display = 'none';
            }
        }

        // Handle Academic References & Tools Links
        if (linksWrap && linksEl) {
            if (lesson.references && lesson.references.length > 0) {
                linksWrap.style.display = 'block';
                linksEl.innerHTML = lesson.references.map(link => `
                    <a href="${link.url}" target="_blank" rel="noopener noreferrer" class="reference-link-card">
                        <div class="ref-link-icon"><i class="${link.icon || 'fas fa-external-link-alt'}"></i></div>
                        <div class="ref-link-content">
                            <span class="ref-link-title">${link.title}</span>
                            <span class="ref-link-desc">${link.desc}</span>
                        </div>
                    </a>
                `).join('');
            } else {
                linksWrap.style.display = 'none';
                linksEl.innerHTML = '';
            }
        }
        
        // Quiz
        questionEl.innerHTML = lesson.question;
        choicesEl.innerHTML = '';
        lesson.choices.forEach((choice, index) => {
            const btn = document.createElement('button');
            btn.className = 'quiz-choice-btn';
            btn.innerHTML = `<span>${choice}</span> <i class="far fa-circle"></i>`;
            btn.onclick = () => checkModalAnswer(btn, index, lesson.correctIndex, lesson.explanation);
            choicesEl.appendChild(btn);
        });

        // Trigger dynamic MathJax typesetting if math expressions are present
        if (typeof window.ensureMathJax === 'function') {
            const modalCard = document.getElementById('dynamic-modal-card');
            if (modalCard) {
                window.ensureMathJax(modalCard);
            }
        }
    } else {
        // Fallback for other pages
        categoryEl.textContent = "Study Resource";
        titleEl.textContent = topicName;
        defEl.textContent = `A detailed guide and practice lesson for "${topicName}" is currently being prepared by the Hesten's Learning Team. Check back soon!`;
        if (breakdownEl) breakdownEl.style.display = 'none';
        if (protipWrap) protipWrap.style.display = 'none';
        exEl.textContent = "Example: Lesson details will cover definitions, key formulas, rules, and printable resources.";
        questionEl.textContent = "Are you excited to explore this resource?";
        choicesEl.innerHTML = '';
        const defaultChoices = ["Yes, absolutely!", "Show me more resources!"];
        defaultChoices.forEach((choice, index) => {
            const btn = document.createElement('button');
            btn.className = 'quiz-choice-btn';
            btn.innerHTML = `<span>${choice}</span> <i class="far fa-circle"></i>`;
            btn.onclick = () => checkModalAnswer(btn, index, 0, "Thank you for your interest!");
            choicesEl.appendChild(btn);
        });
    }
}

// Hash routing & slug utilities
function topicToHash(topicName) {
    if (!topicName) return '';
    return topicName
        .toLowerCase()
        .replace(/&/g, 'and')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

const topicHashAliases = {
    'nouns': 'Nouns & Pronouns',
    'nouns-pronouns': 'Nouns & Pronouns',
    'verbs': 'Verbs & Tenses',
    'verbs-tenses': 'Verbs & Tenses',
    'adjectives': 'Adjectives & Adverbs',
    'adverbs': 'Adjectives & Adverbs',
    'adjectives-adverbs': 'Adjectives & Adverbs',
    'prepositions': 'Prepositions & Conjunctions',
    'conjunctions': 'Prepositions & Conjunctions',
    'prepositions-conjunctions': 'Prepositions & Conjunctions',
    'interjections': 'Interjections & Articles',
    'articles': 'Interjections & Articles',
    'interjections-articles': 'Interjections & Articles',
    'commas': 'Comma Usage',
    'semicolons': 'Semicolons & Colons',
    'colons': 'Semicolons & Colons',
    'apostrophes': 'Apostrophes & Quotation Marks',
    'quotations': 'Apostrophes & Quotation Marks',
    'hyphens': 'Hyphens & Dashes',
    'dashes': 'Hyphens & Dashes',
    'parentheses': 'Parentheses & Ellipses',
    'ellipses': 'Parentheses & Ellipses',
    'vocabulary': 'Academic Word List',
    'prefixes': 'Prefixes & Suffixes',
    'suffixes': 'Prefixes & Suffixes',
    'context-clues': 'Context Clues',
    'synonyms': 'Synonym & Antonym Games',
    'antonyms': 'Synonym & Antonym Games',
    'roots': 'Roots & Etymology',
    'etymology': 'Roots & Etymology',
    'homophones': "Homophones (e.g., their/there/they're)",
    'run-ons': 'Run-on Sentences & Fragments',
    'fragments': 'Run-on Sentences & Fragments',
    'subject-verb-agreement': 'Subject-Verb Agreement Issues',
    'modifiers': 'Dangling Modifiers',
    'pronoun-antecedent': 'Pronoun-Antecedent Agreement',
    'simple-sentences': 'Simple, Compound, Complex',
    'compound-sentences': 'Simple, Compound, Complex',
    'complex-sentences': 'Simple, Compound, Complex',
    'passive-voice': 'Active vs. Passive Voice',
    'active-voice': 'Active vs. Passive Voice',
    'voice': 'Active vs. Passive Voice',
    'parallelism': 'Parallelism',
    'sentence-combining': 'Sentence Combining',
    'compound-complex': 'Compound-Complex Sentences',
    'metaphors': 'Metaphors & Similes',
    'similes': 'Metaphors & Similes',
    'personification': 'Personification & Hyperbole',
    'hyperbole': 'Personification & Hyperbole',
    'idioms': 'Idioms & Allusions',
    'allusions': 'Idioms & Allusions',
    'symbolism': 'Symbolism & Imagery',
    'imagery': 'Symbolism & Imagery',
    'alliteration': 'Alliteration & Onomatopoeia',
    'onomatopoeia': 'Alliteration & Onomatopoeia'
};

function findTopicByHash(rawHash) {
    if (!rawHash) return null;
    const clean = decodeURIComponent(rawHash).toLowerCase().trim().replace(/^#/, '');
    if (!clean) return null;
    
    // 1. Direct alias match
    if (topicHashAliases[clean]) {
        return topicHashAliases[clean];
    }
    
    // Check dynamic topicAliases dictionary
    if (typeof window !== 'undefined' && window.topicAliases) {
        for (const [alias, canonical] of Object.entries(window.topicAliases)) {
            if (topicToHash(alias) === clean || alias.toLowerCase() === clean) {
                return canonical;
            }
        }
    }
    
    const mData = (typeof window !== 'undefined' && window.mathLessons) || (typeof mathLessons !== 'undefined' ? mathLessons : null);
    const gData = (typeof window !== 'undefined' && window.grammarLessons) || (typeof grammarLessons !== 'undefined' ? grammarLessons : null);
    const lData = (typeof window !== 'undefined' && window.literatureLessons) || (typeof literatureLessons !== 'undefined' ? literatureLessons : null);
    const sData = (typeof window !== 'undefined' && window.scienceLessons) || (typeof scienceLessons !== 'undefined' ? scienceLessons : null);
    const ssData = (typeof window !== 'undefined' && window.socialStudiesLessons) || (typeof socialStudiesLessons !== 'undefined' ? socialStudiesLessons : null);

    const allLessonKeys = [
        ...(mData ? Object.keys(mData) : []),
        ...(gData ? Object.keys(gData) : []),
        ...(lData ? Object.keys(lData) : []),
        ...(sData ? Object.keys(sData) : []),
        ...(ssData ? Object.keys(ssData) : [])
    ];
    
    // 2. Exact match with topicToHash
    for (const key of allLessonKeys) {
        if (topicToHash(key) === clean) {
            return key;
        }
    }
    
    // 3. Match without 'and' (e.g. nouns-pronouns matching nouns-and-pronouns)
    const cleanWithoutAnd = clean.replace(/\band\b/g, '').replace(/-+/g, '-').replace(/^-+|-+$/g, '');
    for (const key of allLessonKeys) {
        const keyHashWithoutAnd = topicToHash(key).replace(/\band\b/g, '').replace(/-+/g, '-').replace(/^-+|-+$/g, '');
        if (keyHashWithoutAnd === cleanWithoutAnd) {
            return key;
        }
    }
    
    // 4. Normalized alphanumeric match
    const alphaOnly = clean.replace(/[^a-z0-9]/g, '');
    for (const key of allLessonKeys) {
        const keyAlpha = key.toLowerCase().replace(/[^a-z0-9]/g, '');
        if (keyAlpha === alphaOnly || topicToHash(key).replace(/[^a-z0-9]/g, '') === alphaOnly) {
            return key;
        }
    }
    
    return null;
}

window.copyLessonShareLink = function() {
    if (!currentModalTopic) return;
    const slug = topicToHash(currentModalTopic);
    const url = window.location.origin + window.location.pathname + window.location.search + '#' + slug;
    
    const btn = document.getElementById('share-link-btn');
    function showSuccess() {
        if (btn) {
            btn.innerHTML = '<i class="fas fa-check" style="color: #10b981;"></i> <span style="color: #10b981;">Copied!</span>';
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-link"></i> <span>Share</span>';
            }, 2000);
        }
    }
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(showSuccess).catch(() => {
            prompt('Copy direct link to this lesson:', url);
        });
    } else {
        prompt('Copy direct link to this lesson:', url);
    }
};

// Dynamic modal controls
window.openDynamicModal = function(topicName, updateUrlHash = true) {
    const modal = document.getElementById('dynamic-resource-modal');
    if (!modal) return;
    
    currentModalTopic = topicName;
    
    // Stop any active text-to-speech
    window.speechSynthesis.cancel();
    const speakBtn = document.getElementById('speak-btn');
    if (speakBtn) {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    }
    
    // Reset share button if needed
    const shareBtn = document.getElementById('share-link-btn');
    if (shareBtn) {
        shareBtn.innerHTML = '<i class="fas fa-link"></i> <span>Share</span>';
    }
    
    // Hide feedback panel
    const feedbackEl = document.getElementById('dynamic-modal-quiz-feedback');
    if (feedbackEl) {
        feedbackEl.style.display = 'none';
        feedbackEl.textContent = '';
        feedbackEl.className = 'quiz-feedback-box';
    }
    
    // Render current topic with active Lexile
    renderModalTopic(topicName, activeLexileMode);
    
    // Synchronize URL hash so link can be shared or bookmarked
    if (updateUrlHash) {
        const slug = topicToHash(topicName);
        if (slug) {
            try {
                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', '#' + slug);
                } else {
                    window.location.hash = slug;
                }
            } catch(e) {}
        }
    }
    
    // Show modal block
    modal.style.display = 'flex';
    modal.removeAttribute('aria-hidden');
    
    setTimeout(() => {
        modal.classList.add('active');
        const closeIcon = modal.querySelector('.dynamic-modal-close-icon');
        if (closeIcon && typeof closeIcon.focus === 'function') closeIcon.focus();
    }, 10);
    
    document.addEventListener('keydown', handleDynamicModalKeydown);
};

window.closeDynamicModal = function(updateUrlHash = true) {
    const modal = document.getElementById('dynamic-resource-modal');
    if (!modal) return;
    
    window.speechSynthesis.cancel();
    const speakBtn = document.getElementById('speak-btn');
    if (speakBtn) {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    }
    
    // Clean URL hash if closing active modal
    if (updateUrlHash && window.location.hash) {
        try {
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', window.location.pathname + window.location.search);
            } else {
                window.location.hash = '';
            }
        } catch(e) {}
    }

    currentModalTopic = null;
    modal.classList.remove('active');
    setTimeout(() => {
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
    }, 200);
    
    document.removeEventListener('keydown', handleDynamicModalKeydown);
};

function checkModalAnswer(clickedBtn, selectedIndex, correctIndex, explanation) {
    const choicesEl = document.getElementById('dynamic-modal-quiz-choices');
    const feedbackEl = document.getElementById('dynamic-modal-quiz-feedback');
    const buttons = choicesEl.querySelectorAll('.quiz-choice-btn');
    
    buttons.forEach(btn => {
        btn.disabled = true;
    });
    
    const isCorrect = selectedIndex === correctIndex;
    
    if (isCorrect) {
        clickedBtn.classList.add('correct');
        clickedBtn.querySelector('i').className = 'fas fa-check-circle';
        
        feedbackEl.className = 'quiz-feedback-box correct';
        feedbackEl.innerHTML = `<i class="fas fa-check"></i> Correct! ${explanation}`;
        
        if (typeof playA11yTick === 'function' && window.currentSettings?.acousticTicks) {
            playA11yTick('toggle');
        }
        if (typeof triggerConfetti === 'function') {
            triggerConfetti();
        }
    } else {
        clickedBtn.classList.add('incorrect');
        clickedBtn.querySelector('i').className = 'fas fa-times-circle';
        
        buttons[correctIndex].classList.add('correct');
        buttons[correctIndex].querySelector('i').className = 'fas fa-check-circle';
        
        feedbackEl.className = 'quiz-feedback-box incorrect';
        feedbackEl.innerHTML = `<i class="fas fa-times"></i> Not quite. ${explanation}`;
    }
    
    feedbackEl.style.display = 'flex';
    if (typeof window.ensureMathJax === 'function') {
        window.ensureMathJax(feedbackEl);
    }
}

function speakModalContent() {
    const speakBtn = document.getElementById('speak-btn');
    if (!speakBtn) return;
    
    if (window.speechSynthesis.speaking) {
        window.speechSynthesis.cancel();
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
        return;
    }
    
    const title = document.getElementById('dynamic-modal-title').textContent;
    const def = document.getElementById('dynamic-modal-definition').textContent;
    const example = document.getElementById('dynamic-modal-example').textContent;
    const protipEl = document.getElementById('dynamic-modal-protip');
    const protip = (protipEl && protipEl.textContent) ? (' Rule: ' + protipEl.textContent) : '';
    
    const text = `${title}. Explanation: ${def}. Example: ${example}.${protip}`;
    
    modalUtterance = new SpeechSynthesisUtterance(text);
    modalUtterance.rate = 1.0;
    
    modalUtterance.onstart = () => {
        speakBtn.classList.add('speaking');
        speakBtn.innerHTML = '<i class="fas fa-stop"></i> Stop';
    };
    
    modalUtterance.onend = () => {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    };
    
    modalUtterance.onerror = () => {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    };
    
    window.speechSynthesis.speak(modalUtterance);
}

function handleDynamicModalKeydown(e) {
    if (e.key === 'Escape') {
        closeDynamicModal();
        return;
    }
    
    if (e.key === 'Tab') {
        const modal = document.getElementById('dynamic-resource-modal');
        const focusables = modal.querySelectorAll('button, [tabindex="0"]');
        if (focusables.length === 0) return;
        
        const first = focusables[0];
        const last = focusables[focusables.length - 1];
        
        if (e.shiftKey) {
            if (document.activeElement === first) {
                last.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === last) {
                first.focus();
                e.preventDefault();
            }
        }
    }
}

// Hash-based auto-open controller
function checkHashAndOpenModal() {
    const rawHash = (window.location.hash || '').replace(/^#/, '').trim();
    if (!rawHash) return;
    
    const matchedTopic = findTopicByHash(rawHash);
    if (matchedTopic) {
        window.openDynamicModal(matchedTopic, false);
    }
}

window.addEventListener('hashchange', () => {
    const rawHash = (window.location.hash || '').replace(/^#/, '').trim();
    if (!rawHash) {
        if (currentModalTopic) {
            closeDynamicModal(false);
        }
    } else {
        const matchedTopic = findTopicByHash(rawHash);
        if (matchedTopic && matchedTopic !== currentModalTopic) {
            window.openDynamicModal(matchedTopic, false);
        }
    }
});

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(checkHashAndOpenModal, 60);
    });
} else {
    setTimeout(checkHashAndOpenModal, 60);
}
</script>
