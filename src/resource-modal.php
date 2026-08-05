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
            <!-- Speak Button -->
            <button id="speak-btn" class="speak-lesson-btn" onclick="speakModalContent()" aria-label="Speak lesson content">
                <i class="fas fa-volume-up"></i> Listen
            </button>
        </div>
        
        <!-- Divider -->
        <div class="dynamic-modal-divider"></div>
        
        <!-- Body -->
        <div class="dynamic-modal-body">
            <!-- Definition Section -->
            <div class="lesson-section">
                <h4 class="lesson-section-title"><i class="fas fa-book-open"></i> Explanation</h4>
                <p id="dynamic-modal-definition" class="lesson-text">Definition goes here...</p>
            </div>
            
            <!-- Example Section -->
            <div class="lesson-section example-block">
                <h4 class="lesson-section-title"><i class="fas fa-lightbulb"></i> Example</h4>
                <p id="dynamic-modal-example" class="lesson-example-text">Example goes here...</p>
            </div>
            
            <!-- Mini-Quiz Section -->
            <div class="lesson-section quiz-block">
                <h4 class="lesson-section-title"><i class="fas fa-question-circle"></i> Quick Practice</h4>
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

<style>
/* Overlay Backdrop */
.dynamic-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--spacing-4);
    box-sizing: border-box;
}

.dynamic-modal-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(8px);
    transition: opacity 0.3s ease;
}

/* Modal Window */
.dynamic-modal-content {
    position: relative;
    background-color: var(--color-bg-surface);
    color: var(--color-text-main);
    border-radius: var(--radius-2xl);
    border: 1px solid var(--color-border);
    width: 100%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-xl);
    display: flex;
    flex-direction: column;
    z-index: 10000;
    transform: scale(0.95);
    opacity: 0;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease;
}

.dynamic-modal-overlay.active .dynamic-modal-content {
    transform: scale(1);
    opacity: 1;
}

/* Close Icon Button */
.dynamic-modal-close-icon {
    position: absolute;
    top: 1rem;
    right: 1.25rem;
    background: none;
    border: none;
    font-size: 1.75rem;
    color: var(--color-text-muted);
    cursor: pointer;
    line-height: 1;
    padding: 0.25rem;
    border-radius: 50%;
    transition: background-color 0.2s, color 0.2s;
    z-index: 10;
}

.dynamic-modal-close-icon:hover {
    background-color: var(--color-border);
    color: var(--color-text-main);
}

/* Header */
.dynamic-modal-header {
    padding: var(--spacing-6) var(--spacing-6) 0 var(--spacing-6);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: var(--spacing-4);
}

.dynamic-modal-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: var(--radius-full);
    background-color: rgba(79, 70, 229, 0.1);
    color: var(--color-primary);
    margin-bottom: var(--spacing-2);
}

.dynamic-modal-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-text-main);
    margin: 0;
    line-height: 1.2;
}

/* Speak Button */
.speak-lesson-btn {
    padding: 0.5rem 0.85rem;
    font-size: 0.875rem;
    font-weight: 700;
    border-radius: var(--radius-full);
    background-color: var(--color-bg-base);
    color: var(--color-primary);
    border: 1px solid var(--color-border);
    display: flex;
    align-items: center;
    gap: 0.35rem;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-right: 1.75rem; /* Make room for X button */
}

.speak-lesson-btn:hover {
    background-color: rgba(79, 70, 229, 0.08);
    border-color: var(--color-primary);
}

.speak-lesson-btn.speaking {
    background-color: var(--color-primary);
    color: white;
    animation: pulseSpeaker 1.5s infinite ease-in-out;
}

@keyframes pulseSpeaker {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Divider */
.dynamic-modal-divider {
    height: 1px;
    background-color: var(--color-border);
    margin: var(--spacing-4) 0;
    width: 100%;
}

/* Body Content */
.dynamic-modal-body {
    padding: 0 var(--spacing-6) var(--spacing-6) var(--spacing-6);
}

.lesson-section {
    margin-bottom: var(--spacing-6);
}

.lesson-section-title {
    font-size: 0.875rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-text-muted);
    margin-bottom: var(--spacing-2);
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.lesson-section-title i {
    color: var(--color-primary);
}

.lesson-text {
    font-size: 1rem;
    color: var(--color-text-main);
    line-height: 1.6;
    margin: 0;
}

/* Example Callout */
.example-block {
    background-color: var(--color-bg-base);
    border-left: 4px solid var(--color-secondary);
    padding: var(--spacing-4);
    border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
}

.lesson-example-text {
    font-size: 0.95rem;
    font-style: italic;
    color: var(--color-text-main);
    line-height: 1.5;
    margin: 0;
}

/* Quiz Block */
.quiz-block {
    background-color: rgba(79, 70, 229, 0.03);
    border: 1.5px dashed var(--color-border);
    padding: var(--spacing-5);
    border-radius: var(--radius-xl);
}

.quiz-question-text {
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin-bottom: var(--spacing-4);
}

.quiz-choices-container {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-2);
}

.quiz-choice-btn {
    padding: 0.625rem 1rem;
    font-size: 0.9rem;
    font-weight: 600;
    text-align: left;
    background-color: var(--color-bg-surface);
    color: var(--color-text-main);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.quiz-choice-btn:hover {
    background-color: var(--color-bg-base);
    border-color: var(--color-text-muted);
}

.quiz-choice-btn.selected {
    border-color: var(--color-primary);
    background-color: rgba(79, 70, 229, 0.05);
}

.quiz-choice-btn.correct {
    border-color: var(--color-success);
    background-color: rgba(16, 185, 129, 0.08);
    color: #047857;
}

.quiz-choice-btn.incorrect {
    border-color: var(--color-error);
    background-color: rgba(239, 68, 68, 0.08);
    color: #b91c1c;
}

/* Quiz Feedback */
.quiz-feedback-box {
    margin-top: var(--spacing-4);
    padding: var(--spacing-3) var(--spacing-4);
    border-radius: var(--radius-lg);
    font-size: 0.875rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
}

.quiz-feedback-box.correct {
    background-color: rgba(16, 185, 129, 0.1);
    color: var(--color-success);
}

.quiz-feedback-box.incorrect {
    background-color: rgba(239, 68, 68, 0.1);
    color: var(--color-error);
}

/* Footer */
.dynamic-modal-footer {
    padding: var(--spacing-4) var(--spacing-6);
    border-top: 1px solid var(--color-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: var(--color-bg-base);
    border-radius: 0 0 var(--radius-2xl) var(--radius-2xl);
}

.dynamic-modal-footer-copy {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.dynamic-modal-close-btn {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 700;
    border-radius: var(--radius-lg);
    background-color: var(--color-primary);
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s;
}

.dynamic-modal-close-btn:hover {
    background-color: var(--color-primary-hover);
}
</style>

<script>
// Dictionary of grammar/vocab lessons for all 24 topics
const grammarLessons = {
    "Nouns & Pronouns": {
        category: "Parts of Speech",
        definition: "Nouns are words that name people, places, things, or ideas. They are classified into Common (general, e.g., 'country'), Proper (specific, capitalized, e.g., 'Canada'), Concrete (perceived by senses, e.g., 'table'), and Abstract (ideas or feelings, e.g., 'freedom'). Pronouns replace nouns to avoid repetition. Personal pronouns (I, they) refer to specific people/things, possessive pronouns (mine, ours) show ownership, and reflexive pronouns (myself, themselves) refer back to the subject.",
        example: "Noun: The brave astronaut (concrete) showed great courage (abstract) when flying to the Moon (proper).\nPronoun: Instead of saying, 'When Sarah got home, Sarah fed Sarah's cat,' we write: 'When she got home, she fed her cat.' ('she' and 'her' are personal/possessive pronouns).",
        question: "Which word is a personal pronoun in the sentence: 'After they finished the assignment, Liam congratulated them.'?",
        choices: ["Liam", "they", "finished"],
        correctIndex: 1,
        explanation: "'they' is a personal pronoun replacing the group of students. 'Liam' is a proper noun, and 'finished' is a verb."
    },
    "Verbs & Tenses": {
        category: "Parts of Speech",
        definition: "Verbs express actions (run, speak), occurrences (happen, become), or states of being (is, seem). Tenses indicate when an action happens: Past (occurred before now), Present (occurring now or habitually), and Future (will occur later). Aspects clarify completion or duration: Simple (completed fact), Progressive/Continuous (ongoing action, e.g., 'was walking'), and Perfect (action completed prior to another point, e.g., 'has eaten').",
        example: "Present Progressive: 'I am studying for my grammar exam right now.'\nPast Perfect: 'He had finished writing his paper before the class started.'\nFuture: 'She will submit her portfolio tomorrow morning.'",
        question: "What is the tense and aspect of the verb in: 'By next June, we will have graduated from middle school.'?",
        choices: ["Future Simple", "Future Perfect", "Present Perfect"],
        correctIndex: 1,
        explanation: "'will have graduated' represents the Future Perfect tense, denoting an action that will be completed prior to a specific time in the future."
    },
    "Adjectives & Adverbs": {
        category: "Parts of Speech",
        definition: "Adjectives modify nouns or pronouns by specifying 'which one' (this, that), 'what kind' (blue, friendly), or 'how many' (several, three). Adverbs modify verbs, adjectives, or other adverbs. They explain 'how' (slowly), 'when' (yesterday), 'where' (here), or 'to what extent/degree' (extremely, very). Many adverbs end in '-ly', but not all (e.g., 'fast', 'never', 'very').",
        example: "Adjective: 'The diligent student read several articles.' ('diligent' describes the student's trait; 'several' specifies quantity).\nAdverb: 'She completed the extremely difficult assignment remarkably quickly.' ('extremely' modifies the adjective 'difficult'; 'remarkably' modifies the adverb 'quickly'; 'quickly' describes how she completed the verb 'completed').",
        question: "Identify the adverb that modifies another adverb in: 'The train traveled quite slowly through the mountain pass.'",
        choices: ["quite", "slowly", "through"],
        correctIndex: 0,
        explanation: "'slowly' is an adverb modifying the verb 'traveled'. 'quite' is an adverb modifying the adverb 'slowly' by expressing the degree of slowness."
    },
    "Prepositions & Conjunctions": {
        category: "Parts of Speech",
        definition: "Prepositions show spatial, temporal, or logical relationships between a noun/pronoun and other words in a sentence (e.g., 'under', 'during', 'despite'). Conjunctions join words, phrases, or clauses. Coordinating conjunctions (FANBOYS: for, and, nor, but, or, yet, so) link equal elements. Subordinating conjunctions (although, because, while) connect a dependent clause to an independent clause.",
        example: "Preposition: 'The cat jumped onto the counter during the storm.'\nCoordinating Conjunction: 'I wanted to go for a run, but it began to rain.'\nSubordinating Conjunction: 'Although she was tired, she studied until she understood the topic.'",
        question: "In the sentence: 'We cancelled the picnic because it was storming, but we still played board games indoors,' what types of conjunctions are used?",
        choices: ["'because' is subordinating; 'but' is coordinating", "'because' is coordinating; 'but' is subordinating", "Both are coordinating conjunctions"],
        correctIndex: 0,
        explanation: "'because' introduces a dependent clause explaining a cause (subordinating), while 'but' connects two independent clauses of equal grammatical rank (coordinating)."
    },
    "Interjections & Articles": {
        category: "Parts of Speech",
        definition: "Interjections are words or short phrases that express sudden, strong emotion or reaction (e.g., 'Wow!', 'Alas!', 'Ouch!'). They are grammatically independent and often followed by exclamation points. Articles are a subclass of determiners used to clarify whether a noun is specific (Definite Article: 'the') or general/unspecific (Indefinite Articles: 'a' before consonants, 'an' before vowels).",
        example: "Interjection: 'Ouch! That cactus is sharp.'\nArticles: 'A dog barked at the letter carrier.' ('A' is indefinite, referring to any general dog; 'the' is definite, pointing to a specific, known letter carrier).",
        question: "Choose the sentence that uses articles correctly.",
        choices: ["He wants to buy an unique historic book.", "He wants to buy a unique historic book.", "He wants to buy a unique an historic book."],
        correctIndex: 1,
        explanation: "Although 'unique' starts with a vowel letter, it sounds like it starts with a consonant sound ('yoo-neek'). Thus, it takes the indefinite article 'a' instead of 'an'."
    },
    "Comma Usage": {
        category: "Punctuation Rules",
        definition: "Commas indicate brief pauses to clarify meaning. Key rules include separating three or more items in a list (using the serial/Oxford comma, e.g., 'apples, pears, and grapes'), separating two independent clauses joined by a coordinating conjunction (e.g., 'I ran, but I fell'), setting off introductory phrases (e.g., 'In the morning, we left'), and isolating non-essential descriptive clauses.",
        example: "Introductory: 'Quietly, the thief slipped through the window.'\nCompound sentence: 'The alarm rang twice, but nobody woke up.'\nList: 'She packed a notebook, two pencils, and an eraser.'",
        question: "Which sentence is punctuated correctly?",
        choices: ["Although he was tired Liam finished his chore.", "Although he was tired, Liam finished his chore.", "Although, he was tired Liam finished his chore."],
        correctIndex: 1,
        explanation: "'Although he was tired' is an introductory dependent clause. A comma must be placed after it to separate it from the main clause ('Liam finished his chore')."
    },
    "Semicolons & Colons": {
        category: "Punctuation Rules",
        definition: "Semicolons (;) connect two independent clauses that are closely related in thought, replacing a period or a coordinating conjunction. They are also used to separate items in a list that already contain commas. Colons (:) introduce lists, summaries, quotes, or explanations. A colon must be preceded by a complete, independent clause.",
        example: "Semicolon: 'My brother loves comedy; I prefer science fiction.'\nList with commas: 'We visited Paris, France; Rome, Italy; and Berlin, Germany.'\nColon: 'She has only one goal: to win the state championship.' (Note that 'She has only one goal' is a complete sentence).",
        question: "Which sentence uses a colon correctly?",
        choices: ["The ingredients are: flour, sugar, and butter.", "You need three main ingredients: flour, sugar, and butter.", "You need: flour, sugar, and butter."],
        correctIndex: 1,
        explanation: "A colon must follow a complete sentence. 'You need three main ingredients' is an independent clause. The other options place the colon directly after verbs or prepositions, which is incorrect."
    },
    "Apostrophes & Quotation Marks": {
        category: "Punctuation Rules",
        definition: "Apostrophes (') show ownership/possession or form contractions by replacing missing letters (e.g., 'don't' = 'do not'). For singular nouns, add 's (e.g., 'dog's bone'). For plural nouns ending in -s, add just an apostrophe (e.g., 'dogs' bones'). Quotation marks (\" \") enclose direct speech, dialogue, or short titles (like articles or poems). Punctuation like periods and commas generally go inside the quotation marks.",
        example: "Possession: 'The class listened to the teacher's instructions' (one teacher) vs. 'The class listened to the teachers' panel' (multiple teachers).\nQuotation: 'The professor asked, \"Has everyone read the syllabus?\"'",
        question: "Choose the sentence that correctly punctuates a quote and contraction.",
        choices: ["\"You shouldn't go out there,\" warned the guide.", "\"You should'nt go out there\", warned the guide.", "\"You shouldn't go out there\", warned the guide."],
        correctIndex: 0,
        explanation: "'shouldn't' is the correct contraction for 'should not' (apostrophe replacing 'o'). The comma must be placed inside the closing quotation mark."
    },
    "Hyphens & Dashes": {
        category: "Punctuation Rules",
        definition: "Hyphens (-) join multiple words into a single compound unit, especially compound adjectives preceding a noun (e.g., 'first-class ticket'). Em dashes (—) indicate an abrupt change in thought, add emphasis, or set off parenthetical details. En dashes (–) denote a range of values, such as numbers or dates (e.g., 'pages 12–25').",
        example: "Hyphen: 'He works as a full-time developer.' (But: 'He works full time' - no hyphen because it is after the noun).\nEm Dash: 'The solution to our problem—if you can call it that—was to start over completely.'",
        question: "Select the sentence that uses a hyphen correctly.",
        choices: ["She is a well known actress in the city.", "She is a well-known actress in the city.", "She is well-known as an actress in the city."],
        correctIndex: 1,
        explanation: "When a compound adjective like 'well-known' precedes the noun it describes ('actress'), it must be hyphenated. If it follows the noun (as in choice 3), it does not need a hyphen."
    },
    "Parentheses & Ellipses": {
        category: "Punctuation Rules",
        definition: "Parentheses ( ) enclose non-essential, explanatory, or digressive information that could be removed without changing the sentence's grammatical structure. Ellipses (...) consist of three spaced periods. They indicate the omission of words from a quote, or represent a dramatic pause, hesitation, or thought trailing off in dialogue.",
        example: "Parentheses: 'The final exam (which is worth 30% of your grade) takes place next Tuesday.'\nEllipses: 'Thomas Jefferson wrote that \"all men are created equal... with certain unalienable Rights.\"' (omitted words) or 'I don't know... it seems highly risky.'",
        question: "Which sentence uses an ellipsis to show a trailing, hesitant thought?",
        choices: ["The package arrived (yesterday) at noon.", "If we try our best... we might just win.", "I don't know... it seems highly risky."],
        correctIndex: 2,
        explanation: "The ellipsis in 'I don't know... it seems highly risky' represents hesitation or a pause in thought. The second option uses it as a simple clause transition, and the first uses parentheses."
    },
    "Academic Word List": {
        category: "Vocabulary Building",
        definition: "The Academic Word List (AWL) is a collection of 570 word families frequently encountered in academic and professional texts across various fields. Mastering these words enables you to comprehend complex prompts, analyze data, and express ideas precisely. Examples include words like 'concept', 'significant', 'hypothesis', 'derive', and 'interpret'.",
        example: "Prompt: 'Analyze how the author establishes the primary theme and evaluate the validity of their argument.' ('Analyze' means deconstruct, 'establishes' means creates, 'evaluate' means judge, and 'validity' means logical correctness).",
        question: "Which academic word means 'to form a theory or conjecture about a subject without firm evidence'?",
        choices: ["Speculate", "Incorporate", "Establish"],
        correctIndex: 0,
        explanation: "'Speculate' means to form a theory or guess about something without complete proof. 'Establish' means to set up or prove, and 'incorporate' means to combine or include."
    },
    "Prefixes & Suffixes": {
        category: "Vocabulary Building",
        definition: "Affixes are word elements added to a root word. Prefixes attach to the beginning to modify the word's meaning (e.g., 'un-' means not, 're-' means again, 'mis-' means wrong). Suffixes attach to the end and often change the word's part of speech or tense (e.g., '-ment' turns a verb into a noun, '-less' means without, '-ful' means full of).",
        example: "Root word: adjust (verb).\nAdd prefix: readjust (verb, to adjust again).\nAdd suffix: adjustment (noun, the act of adjusting).\nAdd both: readjustment (noun, the act of adjusting again).",
        question: "If the root 'bene' means 'good' and the suffix '-factor' means 'one who does', what does 'benefactor' mean?",
        choices: ["Someone who does good deeds or provides help", "Someone who creates maps", "Someone who works in a factory"],
        correctIndex: 0,
        explanation: "A benefactor is a person who does good, specifically by giving financial or other aid to a cause or individual."
    },
    "Context Clues": {
        category: "Vocabulary Building",
        definition: "Context clues are information sources (words, phrases, or sentences) surrounding an unfamiliar word that help you deduce its meaning. Types of clues include Definition/Synonym (direct restatement), Antonym/Contrast (opposite meaning introduced), Example (listing illustrations), and Cause/Effect (showing outcomes).",
        example: "Synonym Clue: 'The lawyer's argument was laconic; it was brief and to the point.'\nAntonym Clue: 'Unlike her garrulous sister who talked constantly, Maria was reserved.' ('garrulous' must mean talkative).\nExample Clue: 'He is quite adept at sports, excelling in soccer, tennis, and basketball.' ('adept' must mean highly skilled).",
        question: "What does 'precarious' mean in this sentence: 'Standing on the precarious ledge, she felt the loose rocks crumble under her feet and struggled to keep her balance.'?",
        choices: ["Safe and secure", "Extremely high", "Unstable and dangerous"],
        correctIndex: 2,
        explanation: "Clues like 'loose rocks crumble' and 'struggled to keep her balance' indicate that the ledge was unstable and dangerous (precarious)."
    },
    "Synonym & Antonym Games": {
        category: "Vocabulary Building",
        definition: "Synonyms are words with identical or highly similar meanings in a specific context (e.g., 'assist' and 'help'). Antonyms are words with opposite meanings (e.g., 'arrive' and 'depart'). Developing a strong grasp of synonyms and antonyms helps avoid repetitive writing and allows you to choose words with the exact connotation desired.",
        example: "Connotation match: While 'stubborn' and 'resolute' are synonyms, 'stubborn' has a negative connotation (refusing to change out of obstinacy), whereas 'resolute' has a positive connotation (admirable determination).",
        question: "Which pair represents antonyms?",
        choices: ["magnanimous / generous", "transient / permanent", "corroborate / support"],
        correctIndex: 1,
        explanation: "'Transient' means lasting only a short time, which is the direct opposite of 'permanent' (lasting forever). The other pairs are synonyms."
    },
    "Roots & Etymology": {
        category: "Vocabulary Building",
        definition: "A root word is the base element of a word that contains its primary meaning. Many English roots are derived from Greek or Latin. Etymology is the study of the history of words, tracing their origin, evolution, and transmission across languages.",
        example: "Latin Root: scrib / script (to write) forms scribe, describe, manuscript, and prescription.\nGreek Root: bio (life) + graph (write) forms biography (the written story of a life).",
        question: "Given that the Greek root 'chron' means 'time' and 'meter' means 'measure', what is a 'chronometer'?",
        choices: ["An instrument for measuring time very precisely", "A device that records sound waves", "A tool for measuring distance"],
        correctIndex: 0,
        explanation: "Combining 'chron' (time) and 'meter' (measure) gives 'chronometer', an instrument for measuring time, particularly at sea."
    },
    "Homophones (e.g., their/there/they're)": {
        category: "Common Errors Guide",
        definition: "Homophones are words that sound exactly the same when pronounced but have different spellings and meanings. Confusing homophones is one of the most frequent mechanical errors in writing. Key sets include: their/there/they're, its/it's, your/you're, accept/except, and affect/effect.",
        example: "Their (possessive): 'It is their house.'\nThere (place/existence): 'Look over there' or 'There is a chance of rain.'\nThey're (contraction of they are): 'They're going to win.'\nIts (possessive): 'The dog chased its tail.'\nIt's (contraction of it is): 'It's a beautiful day.'",
        question: "Choose the correct homophone: '___ going to play games after dinner.'",
        choices: ["Their", "There", "They're"],
        correctIndex: 2,
        explanation: "'They're' is the contraction for 'They are', which fits: 'They are going to play games...'"
    },
    "Run-on Sentences & Fragments": {
        category: "Common Errors Guide",
        definition: "A sentence fragment is an incomplete sentence because it lacks a subject, a verb, or a complete thought (e.g., 'Because he was late'). A run-on sentence joins two or more independent clauses together without proper punctuation or conjunctions. A common run-on is the 'comma splice', which joins two complete thoughts with only a comma.",
        example: "Fragment: 'Running down the street.' (Lacks a subject doing the action). Fix: 'I was running down the street.'\nComma Splice: 'I love writing, I code every day.' Fix: 'I love writing; I code every day.' or 'I love writing, and I code every day.'",
        question: "Identify the error in this sentence: 'Although she practiced every afternoon for the recital.'?",
        choices: ["Run-on sentence", "Sentence fragment", "Comma splice"],
        correctIndex: 1,
        explanation: "This is a sentence fragment. 'Although she practiced every afternoon for the recital' is a dependent clause that starts with a subordinating conjunction, leaving the thought incomplete."
    },
    "Subject-Verb Agreement Issues": {
        category: "Common Errors Guide",
        definition: "Subject-verb agreement requires that a singular subject must take a singular verb form, and a plural subject must take a plural verb form. Complexities arise with collective nouns (e.g., 'team', 'family' - usually singular), compound subjects joined by 'or/nor' (verb matches the closest subject), and intervening phrases (e.g., 'along with', 'as well as' - do not alter the subject's number).",
        example: "Intervening Phrase: 'The captain, along with his crew members, is (not are) arriving today.' (The subject is singular 'captain').\nOr/Nor rule: 'Neither the teacher nor the students have (matches plural students) the keys' vs. 'Neither the students nor the teacher has (matches singular teacher) the keys.'",
        question: "Which sentence has correct subject-verb agreement?",
        choices: ["The cats drinks milk.", "The cat drink milk.", "The cats drink milk."],
        correctIndex: 2,
        explanation: "'Cats' is plural, so it matches the plural verb 'drink' (no -s at the end of the verb)."
    },
    "Dangling Modifiers": {
        category: "Common Errors Guide",
        definition: "A modifier is a word or phrase that describes something in a sentence. A dangling modifier occurs when the word or phrase being described is missing from the sentence. A misplaced modifier is separated from the word it describes, making the sentence confusing or unintentionally funny.",
        example: "Dangling: 'Walking to class, a squirrel ran up a tree.' (This sounds like the squirrel was walking to class!). Fix: 'While I was walking to class, a squirrel ran up a tree.'\nMisplaced: 'He sold the bicycle to a boy with a flat tire.' (Did the boy have a flat tire?). Fix: 'He sold the bicycle with a flat tire to a boy.'",
        question: "Choose the correct sentence.",
        choices: ["Walking to the store, my umbrella blew away.", "Walking to the store, I lost my umbrella.", "Both are correct."],
        correctIndex: 1,
        explanation: "The person walking is 'I', not 'my umbrella', so 'I' must follow the introductory phrase."
    },
    "Pronoun-Antecedent Agreement": {
        category: "Common Errors Guide",
        definition: "A pronoun must agree in number (singular or plural) and gender with its antecedent (the noun it replaces). Singular antecedents require singular pronouns, and plural antecedents require plural pronouns. Indefinite pronouns like 'each', 'someone', 'everyone', and 'nobody' are grammatically singular and require singular pronouns (like 'his', 'her', 'its').",
        example: "Plural: 'The members of the committee submitted their votes.'\nSingular Indefinite: 'Everyone must bring his or her notebook.'\nCollective Noun: 'The committee reached its decision.' ('committee' acts as a single group, so it takes 'its', not 'their').",
        question: "Choose the sentence with correct pronoun-antecedent agreement.",
        choices: ["Neither of the boys brought their homework.", "Neither of the boys brought his homework.", "Neither of the boys brought they're homework."],
        correctIndex: 1,
        explanation: "'Neither' is a singular indefinite pronoun. Therefore, it requires the singular possessive pronoun 'his' to maintain proper grammatical agreement."
    },
    "Simple, Compound, Complex": {
        category: "Sentence Structure",
        definition: "Sentences are classified by their clause structure. A simple sentence has one independent clause (subject + verb + complete thought). A compound sentence joins two or more independent clauses using a comma and a coordinating conjunction (FANBOYS) or a semicolon. A complex sentence joins one independent clause with at least one dependent clause (introduced by a subordinating conjunction or relative pronoun).",
        example: "Simple: 'The train arrived on time.'\nCompound: 'The train arrived on time, and the passengers boarded quickly.'\nComplex: 'Because the train arrived on time, the passengers boarded quickly.'",
        question: "What type of sentence is: 'We went to the beach, and we built sandcastles.'?",
        choices: ["Simple", "Compound", "Complex"],
        correctIndex: 1,
        explanation: "Two independent clauses joined by 'and' makes this a compound sentence."
    },
    "Active vs. Passive Voice": {
        category: "Sentence Structure",
        definition: "Active voice occurs when the subject of the sentence performs the action (e.g., 'The chef cooked the meal'). It is concise, direct, and engaging. Passive voice occurs when the subject receives the action (e.g., 'The meal was cooked by the chef'). Passive voice is constructed using a form of the verb 'to be' + a past participle (is/was/been + verb-ed). It is useful when the actor is unknown or unimportant.",
        example: "Active: 'The storm damaged the roof.' (Clear, action-oriented).\nPassive: 'The roof was damaged by the storm.' (Focuses on the roof rather than the storm).\nPassive (Actor Unknown): 'The bank was robbed last night.'",
        question: "Identify the sentence written in active voice.",
        choices: ["The project was completed on time.", "The students completed the project on time.", "The project was completed by the students."],
        correctIndex: 1,
        explanation: "In 'The students completed...', the subject (students) is actively performing the verb (completed)."
    },
    "Parallelism": {
        category: "Sentence Structure",
        definition: "Parallelism (parallel structure) is the repetition of a chosen grammatical form within a sentence to join words, phrases, or clauses. Using parallel structure makes writing balanced, coherent, and pleasing to read. When listing actions or items, all items in the list should share the same grammatical form (e.g., all nouns, all gerunds ending in -ing, or all infinitive phrases).",
        example: "Non-Parallel: 'She enjoys swimming, hiking, and to ride horses.' (swimming and hiking are gerunds, but 'to ride' is an infinitive).\nParallel: 'She enjoys swimming, hiking, and riding horses.' (all are gerund phrases).\nParallel Infinitive: 'She loves to swim, to hike, and to ride horses.'",
        question: "Identify the sentence that uses parallel structure.",
        choices: ["She wants to become a doctor, a writer, or teach.", "She wants to become a doctor, write books, or teach.", "She wants to become a doctor, a writer, or a teacher."],
        correctIndex: 2,
        explanation: "All three items in the list are nouns ('doctor', 'writer', 'teacher'), making the structure perfectly parallel."
    },
    "Sentence Combining": {
        category: "Sentence Structure",
        definition: "Sentence combining is the process of joining short, choppy sentences into longer, smoother sentences with clearer relationships. You can combine sentences by using coordinating conjunctions (to show addition/contrast), subordinating conjunctions (to show cause/time), relative pronouns (to embed detail), or appositive phrases (to rename nouns).",
        example: "Choppy: 'The dog barked. It was a terrier. It saw a mailman.'\nCombined (using relative clause & subordinating conjunction): 'The dog, which was a terrier, barked because it saw a mailman.'\nCombined (using appositive): 'The terrier, a small energetic dog, barked at the mailman.'",
        question: "What is the best way to combine: 'I was tired.' and 'I kept working.'?",
        choices: ["I was tired, so I kept working.", "Although I was tired, I kept working.", "I was tired because I kept working."],
        correctIndex: 1,
        explanation: "'Although' shows contrast, connecting the feeling of tiredness with the action of continuing to work."
    },
    "Compound-Complex Sentences": {
        category: "Sentence Structure",
        definition: "A compound-complex sentence represents the highest level of sentence structure complexity. It contains two or more independent clauses (joined by coordinating conjunctions or semicolons) and at least one dependent clause (introduced by subordinating conjunctions or relative pronouns).",
        example: "Although I love coding (dependent clause), I also like painting (independent clause 1), and I enjoy reading books (independent clause 2).",
        question: "Identify the dependent clause in: 'Because the weather was beautiful, we walked to the park, but we decided to return early.'",
        choices: ["we walked to the park", "but we decided to return early", "Because the weather was beautiful"],
        correctIndex: 2,
        explanation: "'Because the weather was beautiful' starts with the subordinating conjunction 'Because' and cannot stand alone as a complete sentence, making it the dependent clause."
    },
    "Metaphors & Similes": {
        category: "Figurative Language",
        definition: "Both metaphors and similes compare two unlike things to create vivid imagery. A simile makes the comparison explicit using connecting words such as 'like' or 'as' (e.g., 'She is as brave as a lion'). A metaphor states the comparison directly by asserting that one thing IS another (e.g., 'He is a lion in battle'), transferring qualities directly without connecting words.",
        example: "Simile: 'The lake was like a smooth sheet of glass.'\nMetaphor: 'The classroom was a zoo during recess.' (The classroom isn't literally a zoo, but it shares the qualities of noise and wild activity).",
        question: "Which of the following is a metaphor?",
        choices: ["Her eyes were shining like stars.", "Her eyes were shining stars.", "She sings as beautifully as a star."],
        correctIndex: 1,
        explanation: "'Her eyes were shining stars' is a metaphor because it states directly that her eyes are stars."
    },
    "Personification & Hyperbole": {
        category: "Figurative Language",
        definition: "Personification is a literary device that attributes human feelings, characteristics, or actions to non-human things, such as objects, ideas, or animals (e.g., 'The wind sang'). Hyperbole is an intentional, extreme exaggeration used to add emphasis, evoke strong feelings, or create a humorous effect (e.g., 'I've told you a thousand times').",
        example: "Personification: 'The old floorboards groaned under our footsteps.' (Floorboards cannot feel pain or groan).\nHyperbole: 'I have a million things to do today.' (You have a lot of chores, not literally one million).",
        question: "What device is used here: 'The wind whispered through the dark trees.'?",
        choices: ["Personification", "Hyperbole", "Simile"],
        correctIndex: 0,
        explanation: "Whispering is a human action given to a non-human element (wind), which is personification."
    },
    "Idioms & Allusions": {
        category: "Figurative Language",
        definition: "An idiom is a culturally specific phrase or expression whose figurative meaning cannot be understood from the literal definition of its words (e.g., 'bite the bullet'). An allusion is an indirect, brief reference to a famous person, historical event, place, or literary work (often the Bible, mythology, or Shakespeare) that the reader is expected to recognize.",
        example: "Idiom: 'Let's call it a day.' (means stop working for the day).\nAllusion: 'He was a real Romeo when trying to impress her.' (alludes to Romeo from Shakespeare's 'Romeo and Juliet' to suggest he was acting like a passionate lover).",
        question: "What does the idiom 'cost an arm and a leg' mean?",
        choices: ["To be extremely expensive", "To get hurt in a game", "To require physical labor"],
        correctIndex: 0,
        explanation: "If something 'costs an arm and a leg', it means it is very expensive."
    },
    "Symbolism & Imagery": {
        category: "Figurative Language",
        definition: "Symbolism is the practice of using a concrete object, character, or color to represent a deeper abstract idea (e.g., a white dove representing peace). Imagery is descriptive writing that uses rich sensory details to appeal to the five senses (sight, sound, smell, taste, touch), creating a vivid mental picture for the reader.",
        example: "Symbolism: 'The path ahead was covered in dark, thorny bushes.' (thorny path symbolizes difficulty or danger in life).\nImagery: 'The sweet, warm aroma of cinnamon and baked apples drifted from the oven, filling the room.' (appeals to smell and taste).",
        question: "Which sensory detail is highlighted: 'The icy water numbed her fingertips.'?",
        choices: ["Sight", "Sound", "Touch"],
        correctIndex: 2,
        explanation: "'Icy water' and 'numbed fingertips' are sensations felt by touch."
    },
    "Alliteration & Onomatopoeia": {
        category: "Figurative Language",
        definition: "Alliteration is the repetition of the same initial consonant sound in a sequence of neighboring words (e.g., 'slippery slithering snake'). It creates rhythm and mood. Onomatopoeia is the use of words that imitate the natural sound associated with the action or object they describe (e.g., 'hiss', 'clack', 'drip').",
        example: "Alliteration: 'Peter posted pictures of the party.'\nOnomatopoeia: 'The thunder boomed and the rain went splat on the pavement.'",
        question: "Identify the figure of speech: 'The busy buzzing bees hovered over the flowers.'",
        choices: ["Only Alliteration", "Only Onomatopoeia", "Both Alliteration and Onomatopoeia"],
        correctIndex: 2,
        explanation: "The phrase displays both alliteration (repetition of the 'b' sound in 'busy buzzing bees') and onomatopoeia ('buzzing' mimics the sound bees make)."
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

// Dynamic modal controls
window.openDynamicModal = function(topicName) {
    const modal = document.getElementById('dynamic-resource-modal');
    if (!modal) return;
    
    // Reset modal fields
    const categoryEl = document.getElementById('dynamic-modal-category');
    const titleEl = document.getElementById('dynamic-modal-title');
    const defEl = document.getElementById('dynamic-modal-definition');
    const exEl = document.getElementById('dynamic-modal-example');
    const questionEl = document.getElementById('dynamic-modal-quiz-question');
    const choicesEl = document.getElementById('dynamic-modal-quiz-choices');
    const feedbackEl = document.getElementById('dynamic-modal-quiz-feedback');
    const speakBtn = document.getElementById('speak-btn');
    
    // Stop any active text-to-speech
    window.speechSynthesis.cancel();
    if (speakBtn) {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    }
    
    // Hide feedback panel
    if (feedbackEl) {
        feedbackEl.style.display = 'none';
        feedbackEl.textContent = '';
        feedbackEl.className = 'quiz-feedback-box';
    }
    
    // Get lesson database record
    const lesson = grammarLessons[topicName];
    
    if (lesson) {
        categoryEl.textContent = lesson.category;
        titleEl.textContent = topicName;
        defEl.textContent = lesson.definition;
        exEl.textContent = lesson.example;
        questionEl.textContent = lesson.question;
        
        // Render choices
        choicesEl.innerHTML = '';
        lesson.choices.forEach((choice, index) => {
            const btn = document.createElement('button');
            btn.className = 'quiz-choice-btn';
            btn.innerHTML = `<span>${choice}</span> <i class="far fa-circle"></i>`;
            btn.onclick = () => checkModalAnswer(btn, index, lesson.correctIndex, lesson.explanation);
            choicesEl.appendChild(btn);
        });
    } else {
        // Fallback for non-grammar wiki pages
        categoryEl.textContent = "Study Resource";
        titleEl.textContent = topicName;
        defEl.textContent = `A detailed guide and practice lesson for "${topicName}" is currently being prepared by the Hesten's Learning Team. Check back soon!`;
        exEl.textContent = "Example: Lesson details will cover definitions, key formulas, rules, and printable resources.";
        questionEl.textContent = "Are you excited to explore this resource?";
        
        choicesEl.innerHTML = '';
        const defaultChoices = ["Yes, absolutely!", "Show me more files!"];
        defaultChoices.forEach((choice, index) => {
            const btn = document.createElement('button');
            btn.className = 'quiz-choice-btn';
            btn.innerHTML = `<span>${choice}</span> <i class="far fa-circle"></i>`;
            btn.onclick = () => checkModalAnswer(btn, index, 0, "Thank you for your interest!");
            choicesEl.appendChild(btn);
        });
    }
    
    // Show modal block
    modal.style.display = 'flex';
    modal.removeAttribute('aria-hidden');
    
    // Wait for display apply then trigger transition
    setTimeout(() => {
        modal.classList.add('active');
        
        // Focus trap initial focus
        const closeIcon = modal.querySelector('.dynamic-modal-close-icon');
        if (closeIcon) closeIcon.focus();
    }, 10);
    
    // Keyboard listener register
    document.addEventListener('keydown', handleDynamicModalKeydown);
};

window.closeDynamicModal = function() {
    const modal = document.getElementById('dynamic-resource-modal');
    if (!modal) return;
    
    // Cancel speaking
    window.speechSynthesis.cancel();
    const speakBtn = document.getElementById('speak-btn');
    if (speakBtn) {
        speakBtn.classList.remove('speaking');
        speakBtn.innerHTML = '<i class="fas fa-volume-up"></i> Listen';
    }
    
    modal.classList.remove('active');
    
    // Delay hide display for visual ease out
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
    
    // Lock choice clicks
    buttons.forEach(btn => {
        btn.disabled = true;
    });
    
    const isCorrect = selectedIndex === correctIndex;
    
    if (isCorrect) {
        clickedBtn.classList.add('correct');
        clickedBtn.querySelector('i').className = 'fas fa-check-circle';
        
        feedbackEl.className = 'quiz-feedback-box correct';
        feedbackEl.innerHTML = `<i class="fas fa-check"></i> Correct! ${explanation}`;
        
        // Trigger accessibility acoustic sound
        if (typeof playA11yTick === 'function' && window.currentSettings?.acousticTicks) {
            playA11yTick('toggle');
        }
        
        // Confetti burst
        if (typeof triggerConfetti === 'function') {
            triggerConfetti();
        }
    } else {
        clickedBtn.classList.add('incorrect');
        clickedBtn.querySelector('i').className = 'fas fa-times-circle';
        
        // Highlight correct choice
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
    
    const text = `${title}. Explanation: ${def}. Example: ${example}`;
    
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
</script>
