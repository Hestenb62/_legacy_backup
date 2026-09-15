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
            
            <!-- 2. Example Section -->
            <div class="lecture-card example-block" style="border-left: 4px solid var(--color-secondary, #6366f1); margin-bottom: 1.25rem;">
                <h4 class="lecture-card-title"><i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Real-World Examples &amp; Breakdown</h4>
                <div id="dynamic-modal-example" class="lesson-example-text">Example goes here...</div>
            </div>

            <!-- 3. Rule & Common Pitfall Callout -->
            <div id="dynamic-modal-protip-wrap" class="lecture-callout-protip" style="display: none;">
                <i class="fas fa-exclamation-circle lecture-protip-icon"></i>
                <div>
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em; color: #b45309; margin-bottom: 0.2rem;">Rule &amp; Common Trap:</strong>
                    <p id="dynamic-modal-protip" class="lecture-protip-text"></p>
                </div>
            </div>
            
            <!-- 4. Mini-Quiz Section -->
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

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/components/resource-modal.css') : '/assets/css/components/resource-modal.css' ?>">

<script>
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
        "explanation": "'they' is a third-person personal pronoun replacing the plural noun 'musicians'."
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
        "explanation": "'will have graduated' indicates an action that will be completed prior to a definite future milestone (Future Perfect)."
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
        "explanation": "'slowly' is an adverb modifying 'climbed'. 'quite' is an intensifying adverb modifying the adverb 'slowly'."
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
        "explanation": "'because' creates a dependent causal clause (subordinating), while 'but' connects two equal independent clauses (coordinating)."
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
        "explanation": "'unique' begins with the consonant sound /j/ ('yoo-neek'), so it takes 'a', not 'an'."
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
        "explanation": "Contains both the comma after the introductory clause ('Before starting the exam,') and serial commas separating the three parallel actions."
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
        "explanation": "'You will need three key ingredients' is a complete independent clause, satisfying the strict rule for colon placement."
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
        "explanation": "'children' is an irregular plural, so its possessive is 'children's'. The comma correctly sits inside the closing quote."
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
        "explanation": "'internationally' is an -ly adverb, so no hyphen is permitted between it and the participle 'recognized'."
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
        "explanation": "The parenthetical phrase is part of the larger sentence, so the terminal period belongs outside the closing parenthesis."
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
        "explanation": "'Synthesize' means to combine diverse components or sources into a coherent, comprehensive concept."
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
        "explanation": "Combining 'trans-' (across) + 'port' (carry) + '-ation' (act or process) yields 'carrying across'."
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
        "explanation": "'Refused to surrender' directly provides the context clue proving 'tenacious' means persistent and determined."
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
        "explanation": "'Magnanimous' (generous and forgiving) is the direct antonym of 'selfish'."
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
        "explanation": "'bene' (good) + 'fact' (make/do) + '-or' (agent person) = one who does good deeds."
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
        "explanation": "'They're' = they are; 'their' = possessive drone; 'there' = spatial location."
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
        "explanation": "The clause begins with the subordinating conjunction 'Although', making it a dependent clause that cannot stand alone as a sentence."
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
        "explanation": "The true head noun is singular 'bouquet', which governs the singular auxiliary verb 'was'."
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
        "explanation": "'we' is the subject actually performing the action of 'hiking up the trail', properly placed directly after the comma."
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
        "explanation": "'Neither' is a singular indefinite pronoun, requiring the singular possessive pronoun 'her'."
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
        "explanation": "Consists of two independent clauses joined by a comma and the coordinating conjunction 'and' (Compound)."
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
        "explanation": "The subject 'committee' is actively performing the verb 'completed' upon the direct object."
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
        "explanation": "All three listed predicates maintain the identical infinitive verb phrase structure ('to organize...', 'manage...', 'and communicate...')."
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
        "explanation": "Option 2 utilizes an introductory participial phrase to smoothly combine the actions with maximum conciseness and flow."
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
        "explanation": "'Because the evidence was compelling' begins with the subordinating conjunction 'Because' and cannot stand alone as a complete sentence."
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
        "explanation": "'The athlete was a cheetah' directly equates the runner with the animal without using comparative words ('like' or 'as')."
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
        "explanation": "The abstract concept of 'opportunity' is depicted performing the human action of knocking on a door (Personification)."
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
        "explanation": "'Barking up the wrong tree' means pursuing a mistaken idea or blaming the wrong person."
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
        "explanation": "'Sizzling' stimulates the auditory sense (sound), while 'pungent aroma' stimulates the olfactory sense (smell)."
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
        "explanation": "Features alliteration of the /b/ consonant sound ('busy bees buzzed briskly between blossoming buds') and onomatopoeia with the sound word 'buzzed'."
},
    // --- ELA LITERATURE LESSONS ---
    "Metaphor & Simile": {
        category: "Literary Devices",
        definition: "Similes compare two different things using the words 'like' or 'as' (e.g., 'as brave as a lion'). Metaphors compare things by stating directly that one thing is another (e.g., 'he is a lion in battle').",
        example: "Simile: 'The lake was as smooth as glass.' | Metaphor: 'The lake was a mirror.'",
        question: "Which of the following sentences is a metaphor?",
        choices: ["His heart is like gold.", "His heart is gold.", "He has a golden watch."],
        correctIndex: 1,
        explanation: "'His heart is gold' directly states one thing is another, making it a metaphor."
    },
    "Imagery & Symbolism": {
        category: "Literary Devices",
        definition: "Imagery is descriptive language that appeals to the five senses (sight, sound, smell, taste, touch) to build a picture. Symbolism is when a concrete object, character, or color represents a deeper, abstract idea.",
        example: "Imagery: 'The crunchy red apple tasted sweet and tart.' | Symbolism: 'A black crow sitting on a fence' (often symbolises bad luck or death).",
        question: "What does a green light often symbolize in literature (e.g., in The Great Gatsby)?",
        choices: ["Stop, danger, or warning", "Hope, permission, or future aspirations", "Grief and mourning"],
        correctIndex: 1,
        explanation: "Green lights commonly represent moving forward, permission, hope, or future aspirations."
    },
    "Foreshadowing & Flashback": {
        category: "Literary Devices",
        definition: "Foreshadowing gives readers hints or clues about what will happen later in the story. Flashback interrupts the chronological flow of the narrative to show an event that happened in the past.",
        example: "Foreshadowing: 'A dark cloud hovered over the house before they left.' | Flashback: 'He closed his eyes and remembered the day he fell out of the oak tree when he was six.'",
        question: "If a narrator says, 'I had no idea this was the last time I would see him,' this is an example of:",
        choices: ["Flashback", "Foreshadowing", "Alliteration"],
        correctIndex: 1,
        explanation: "It is a hint of a future event (not seeing him again), which is foreshadowing."
    },
    "Irony & Satire": {
        category: "Literary Devices",
        definition: "Irony is when the opposite of what is expected happens (situational irony) or is said (verbal irony/sarcasm). Satire uses humor, sarcasm, or exaggeration to expose, mock, or criticize human weaknesses or societal issues.",
        example: "Irony: A fire station burning down. | Satire: A cartoon mocking politicians' empty promises.",
        question: "A marriage counselor filing for divorce is an example of:",
        choices: ["Satire", "Irony", "Allusion"],
        correctIndex: 1,
        explanation: "It is situational irony because it is the exact opposite of what you expect from a marriage professional."
    },
    "Protagonist & Antagonist": {
        category: "Character Analysis",
        definition: "The protagonist is the main character or hero of the story who faces the central conflict. The antagonist is the person, force, system, or obstacle working against the protagonist.",
        example: "In 'Harry Potter', Harry is the protagonist, and Lord Voldemort is the antagonist.",
        question: "Is the antagonist always a human villain?",
        choices: ["Yes, it must be a human person.", "No, it can be a force of nature, a social system, or even an internal conflict.", "Yes, it must be a physical monster."],
        correctIndex: 1,
        explanation: "An antagonist is simply the opposing force, which can be nature (like a blizzard) or society."
    },
    "Character Archetypes": {
        category: "Character Analysis",
        definition: "Character archetypes are common, universal character patterns, templates, or profiles that appear repeatedly in stories across different cultures and eras (like the Mentor, the Trickster, the Hero, or the Shadow).",
        example: "Mentor: Yoda in 'Star Wars' or Dumbledore in 'Harry Potter' guiding the young hero.",
        question: "Which archetype describes a character who uses wit, mischief, and pranks to challenge rules?",
        choices: ["The Mentor", "The Trickster", "The Hero"],
        correctIndex: 1,
        explanation: "The Trickster archetype uses cunning, mischief, and wit to disrupt situations."
    },
    "Character Development Arc": {
        category: "Character Analysis",
        definition: "A character development arc is the personal growth, change, or internal transformation a character goes through from the beginning to the end of a story.",
        example: "A selfish protagonist learning the value of sacrifice and cooperation through trials.",
        question: "What is a character called who changes significantly throughout a story?",
        choices: ["Static character", "Dynamic character", "Flat character"],
        correctIndex: 1,
        explanation: "Dynamic characters undergo internal changes, growth, or development during the narrative."
    },
    "Character vs. Conflict": {
        category: "Character Analysis",
        definition: "Character vs. Conflict analyzes the specific struggles a character faces. These can be external (vs. another character, vs. society, vs. nature) or internal (vs. self).",
        example: "External: A hiker fighting to survive a blizzard (Character vs. Nature). | Internal: A character choosing between honesty and loyalty (Character vs. Self).",
        question: "A student struggling against unfair school rules is what type of conflict?",
        choices: ["Character vs. Self", "Character vs. Society", "Character vs. Nature"],
        correctIndex: 1,
        explanation: "School rules represent social systems/institutions, making it a Character vs. Society conflict."
    },
    "Identifying Themes": {
        category: "Theme Exploration",
        definition: "A theme is the central message, lesson, or truth about life that the author wants to convey through the story. It is written as a complete statement, not just a single word.",
        example: "Instead of just saying 'love', a theme statement would be: 'Love can help people overcome great difficulties.'",
        question: "Which of the following is a properly formatted theme statement?",
        choices: ["Friendship", "True friendship requires honesty and loyalty.", "How to make friends"],
        correctIndex: 1,
        explanation: "It is a complete sentence expressing a deeper truth, whereas 'Friendship' is just a topic."
    },
    "Universal Themes": {
        category: "Theme Exploration",
        definition: "Universal themes are messages about human nature that apply to anyone, anywhere, regardless of culture or time period (like coming of age, the struggle between good and evil, or love overcoming barriers).",
        example: "The theme that 'greed leads to downfall' can be found in ancient Greek myths, Shakespearean plays, and modern books.",
        question: "Why are themes like 'coming of age' called universal?",
        choices: ["Because they only happen in space.", "Because they relate to experiences shared by humans across different cultures and eras.", "Because they are always happy."],
        correctIndex: 1,
        explanation: "Universal themes tap into common human experiences that transcend time and boundaries."
    },
    "Symbolism & Theme": {
        category: "Theme Exploration",
        definition: "Authors use repeating symbols (motifs) to help build and highlight the theme of a story. Tracking symbols is a great way to discover the theme.",
        example: "If a wilting plant appears in a story about a broken family, the plant might symbolize the family's crumbling relationships (theme: neglect harms relationships).",
        question: "If a bird escaping a cage is a symbol, what theme does it most likely support?",
        choices: ["Greed causes misery.", "Freedom is worth fighting for.", "Nature is dangerous."],
        correctIndex: 1,
        explanation: "A bird escaping a cage represents breaking free, pointing to a theme of freedom."
    },
    "Author's Message": {
        category: "Theme Exploration",
        definition: "The author's message is the specific perspective, opinion, or warning the author is sharing about human behavior or society through their writing.",
        example: "In 'The Lorax', Dr. Seuss's message is a warning about the dangers of greed and neglecting the environment.",
        question: "How can you discover the author's message?",
        choices: ["By looking at the conflicts and how they are resolved, noting the lessons characters learn.", "By counting the number of pages.", "By only reading the title."],
        correctIndex: 0,
        explanation: "Analyzing conflicts and character growth reveals what the author is trying to say."
    },
    "Fiction Genres": {
        category: "Genre Studies",
        definition: "Fiction genres are categories of stories created from the imagination. Common genres include Science Fiction (space/future tech), Fantasy (magic), Mystery (solving a crime), and Realistic Fiction (could happen in real life).",
        example: "A story about a detective searching for a missing painting is in the Mystery genre.",
        question: "Which genre involves magic, dragons, and imaginary kingdoms?",
        choices: ["Science Fiction", "Realistic Fiction", "Fantasy"],
        correctIndex: 2,
        explanation: "Fantasy is characterized by magical elements, mythical creatures, and invented worlds."
    },
    "Non-Fiction Genres": {
        category: "Genre Studies",
        definition: "Non-fiction genres are categories of factual writing about real events, people, and information. These include Biographies (someone's life story written by another), Autobiographies (written by the person themselves), and Informational articles.",
        example: "A book written by Barack Obama about his own childhood is an Autobiography.",
        question: "What is a biography?",
        choices: ["A story about a real person's life written by someone else.", "A make-believe story about wizardry.", "A book of charts and formulas."],
        correctIndex: 0,
        explanation: "A biography is a factual account of a person's life written by a different author."
    },
    "Poetry Forms": {
        category: "Genre Studies",
        definition: "Poetry is a form of literature that uses rhythm, rhyme, and sensory language to evoke emotion. Forms include Sonnets (14 lines), Haikus (5-7-5 syllable pattern), and Free Verse (no set rhyme or rhythm rules).",
        example: "A haiku: 'An old silent pond / A frog jumps into the pond / splash! Silence again.'",
        question: "How many lines are in a traditional Shakespearean Sonnet?",
        choices: ["3 lines", "10 lines", "14 lines"],
        correctIndex: 2,
        explanation: "Sonnets are structured poems containing exactly 14 lines."
    },
    "Drama & Playwriting": {
        category: "Genre Studies",
        definition: "Drama is literature meant to be performed by actors on stage. It is written as a script, using dialogue (what characters say) and stage directions (instructions in parentheses showing actions and settings).",
        example: "ROMEO: (whispering) 'But soft! What light through yonder window breaks?'",
        question: "What are the text boxes in parentheses in a script called?",
        choices: ["Dialogues", "Stage Directions", "Narratives"],
        correctIndex: 1,
        explanation: "Stage directions are text in brackets or parentheses that direct actors' movements and describe the scene."
    },
    "Freytag's Pyramid": {
        category: "Plot & Structure",
        definition: "Freytag's Pyramid is a five-part framework mapping the structure of a story: Exposition (intro), Rising Action (obstacles build), Climax (turning point), Falling Action (results), and Resolution (ending).",
        example: "Climax: The hero and villain face off in their final battle.",
        question: "Which part of Freytag's Pyramid introduces the characters, setting, and background?",
        choices: ["Exposition", "Climax", "Resolution"],
        correctIndex: 0,
        explanation: "The exposition sets the stage by introducing the background information, characters, and setting."
    },
    "Conflict Types": {
        category: "Plot & Structure",
        definition: "Conflict is the struggle between opposing forces that drives the plot. Types include: Character vs. Character (clash between people), Character vs. Nature (survival), and Character vs. Self (internal struggle).",
        example: "Character vs. Nature: A crew trying to steer their ship through a fierce hurricane.",
        question: "A character deciding whether to report a friend for cheating is what type of conflict?",
        choices: ["Character vs. Character", "Character vs. Self", "Character vs. Society"],
        correctIndex: 1,
        explanation: "The struggle is inside the character's mind, making it a Character vs. Self (internal) conflict."
    },
    "Pacing & Suspense": {
        category: "Plot & Structure",
        definition: "Pacing is the speed at which a story unfolds. Suspense is the tension and excitement readers feel as they wait to see what happens next. Short sentences speed up the pacing and build suspense.",
        example: "Slow pacing: Detailed descriptions of a garden. | Fast pacing: 'Footsteps. Close. Running. Escape! Layout change.'",
        question: "Which technique helps build suspense?",
        choices: ["Writing short, action-packed sentences and using cliffhangers.", "Describing the background scenery in great detail.", "Giving away the ending on page one."],
        correctIndex: 0,
        explanation: "Choppy sentences and unresolved cliffhangers create anticipation and build suspense."
    },
    "Narrative Arcs": {
        category: "Plot & Structure",
        definition: "A narrative arc is the path of a story's plot. While many stories follow a peak structure (Freytag's Pyramid), others follow arcs like the Quest (journey to find an item), Tragedy (downfall of a hero), or Rags to Riches.",
        example: "Quest: A hero travels across dangerous lands to destroy a magical ring.",
        question: "What narrative arc describes a story where a hero starts with a great life, makes mistakes, and suffers a complete downfall?",
        choices: ["Rags to Riches", "Tragedy", "Overcoming the Monster"],
        correctIndex: 1,
        explanation: "A tragedy depicts the fall of a protagonist due to flaws, mistakes, or fate."
    },
    "Diction & Syntax": {
        category: "Author's Craft",
        definition: "Diction is the specific word choices an author makes (formal, slang, simple, poetic). Syntax is the way those words are arranged into sentences (short/choppy vs. long/complex).",
        example: "Formal diction: 'I reside in an estate.' | Informal diction: 'I live in a shack.' | Syntax: changing word order to create emphasis.",
        question: "An author using slang and contractions is an example of:",
        choices: ["Formal diction", "Informal diction", "Complex syntax"],
        correctIndex: 1,
        explanation: "Slang and contractions characterize informal, casual word choice (diction)."
    },
    "Tone & Mood": {
        category: "Author's Craft",
        definition: "Tone is the author's attitude toward the subject or characters (e.g. sarcastic, serious, playful). Mood is the emotional feeling or atmosphere created for the reader (e.g. spooky, romantic, cheerful).",
        example: "A story set in a dark, creaky house at night with howling wind creates a spooky mood.",
        question: "If an author writes with words like 'wonderful', 'joyous', and 'bright', what is the tone?",
        choices: ["Gloomy", "Positive/Cheerful", "Sarcastic"],
        correctIndex: 1,
        explanation: "Words of celebration and brightness convey a cheerful and positive tone."
    },
    "Point of View": {
        category: "Author's Craft",
        definition: "Point of view is the perspective from which a story is told: First Person ('I', 'me'), Second Person ('you'), or Third Person ('he', 'she', 'they'). Third Person Omniscient means the narrator knows everyone's thoughts.",
        example: "First Person: 'I walked down the quiet street.' | Third Person: 'He walked down the quiet street.'",
        question: "Identify the point of view: 'You walk into the room and immediately notice the painting on the wall.'",
        choices: ["First Person", "Second Person", "Third Person"],
        correctIndex: 1,
        explanation: "The pronoun 'you' indicates it is written in the second person."
    },
    "Imagery & Sensory Details": {
        category: "Author's Craft",
        definition: "Sensory details are descriptions that trigger the reader's five senses: sight (colors, shapes), sound (screech, bang), smell (musty, sweet), taste (salty, spicy), and touch (rough, freezing).",
        example: "Sensory description: 'The sizzling bacon released a smoky aroma that filled the cold kitchen.'",
        question: "Which sense is targeted by: 'The clock ticked steadily in the quiet room'?",
        choices: ["Sight", "Sound", "Smell"],
        correctIndex: 1,
        explanation: "The ticking sound triggers the auditory sense (sound)."
    }
};

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
    
    const lesson = grammarLessons[topicName];
    
    if (lesson) {
        categoryEl.textContent = lesson.category;
        titleEl.textContent = topicName;
        
        // Handle Standard vs Basic English definitions
        if (mode === 'basic' && lesson.basicDefinition) {
            defEl.textContent = lesson.basicDefinition;
        } else {
            defEl.textContent = lesson.definition;
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
                protipEl.textContent = lesson.proTip;
            } else {
                protipWrap.style.display = 'none';
            }
        }
        
        // Quiz
        questionEl.textContent = lesson.question;
        choicesEl.innerHTML = '';
        lesson.choices.forEach((choice, index) => {
            const btn = document.createElement('button');
            btn.className = 'quiz-choice-btn';
            btn.innerHTML = `<span>${choice}</span> <i class="far fa-circle"></i>`;
            btn.onclick = () => checkModalAnswer(btn, index, lesson.correctIndex, lesson.explanation);
            choicesEl.appendChild(btn);
        });
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
    
    const allLessonKeys = [
        ...(typeof grammarLessons !== 'undefined' ? Object.keys(grammarLessons) : []),
        ...(typeof literatureLessons !== 'undefined' ? Object.keys(literatureLessons) : [])
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
        if (closeIcon) closeIcon.focus();
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
