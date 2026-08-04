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
        definition: "Nouns are words that name people, places, things, or ideas (like 'school', 'Hesten', 'book'). Pronouns are short words (like 'he', 'she', 'it', 'they') that stand in place of nouns to stop sentences from sounding repetitive.",
        example: "Instead of saying 'Hesten read Hesten's book because Hesten liked it,' we say: 'Hesten read his book because he liked it.' ('his' and 'he' are pronouns).",
        question: "Which word is a pronoun in this sentence: 'They went to the park.'?",
        choices: ["They", "went", "park"],
        correctIndex: 0,
        explanation: "'They' is a pronoun that replaces the names of the people who went to the park."
    },
    "Verbs & Tenses": {
        category: "Parts of Speech",
        definition: "Verbs are action words (like 'run', 'read', 'think') or state-of-being words (like 'is', 'seem'). Verb tenses tell us when the action happened: Past (happened before), Present (happens now), or Future (will happen later).",
        example: "Present: 'I code today.' | Past: 'I coded yesterday.' | Future: 'I will code tomorrow.'",
        question: "Identify the past tense verb in this sentence: 'Sarah quickly ate her lunch.'",
        choices: ["quickly", "ate", "lunch"],
        correctIndex: 1,
        explanation: "'Ate' is the past tense of the action verb 'eat'."
    },
    "Adjectives & Adverbs": {
        category: "Parts of Speech",
        definition: "Adjectives describe or give details about nouns (like 'quiet boy', 'blue sky'). Adverbs describe verbs, adjectives, or other adverbs, and they often answer 'how', 'when', or 'where' (like 'walked slowly', 'very bright').",
        example: "Sentence: 'The energetic student completed the test very quickly.' ('energetic' is an adjective describing the student; 'very' and 'quickly' are adverbs describing how they completed the test).",
        question: "Which word is an adverb in this sentence: 'The alarm rang loudly.'?",
        choices: ["alarm", "rang", "loudly"],
        correctIndex: 2,
        explanation: "'Loudly' describes how the alarm rang, making it an adverb."
    },
    "Prepositions & Conjunctions": {
        category: "Parts of Speech",
        definition: "Prepositions are helper words that show location, direction, or time relationships (like 'under the desk', 'after class'). Conjunctions are connector words (like 'and', 'but', 'because') that link words, phrases, or thoughts together.",
        example: "Sentence: 'The paper is on the desk, but the pencil fell under it.' ('on' and 'under' are prepositions; 'but' is a conjunction connecting two sentences).",
        question: "What is the conjunction in: 'We stayed inside because it was raining.'?",
        choices: ["inside", "because", "raining"],
        correctIndex: 1,
        explanation: "'Because' is the conjunction connecting the action 'stayed inside' with its reason."
    },
    "Comma Usage": {
        category: "Punctuation Rules",
        definition: "Commas are used to indicate a brief pause in a sentence, separate items in a list, link clauses, or set off introductory words.",
        example: "List: 'I bought apples, bananas, and milk.' | Intro: 'Suddenly, the lights flickered.'",
        question: "Which sentence uses commas correctly?",
        choices: ["Yes, I would love to read that book.", "Yes I would, love to read that book.", "Yes I would love, to read that book."],
        correctIndex: 0,
        explanation: "A comma is used after the introductory word 'Yes' to separate it from the main clause."
    },
    "Semicolons & Colons": {
        category: "Punctuation Rules",
        definition: "Semicolons (;) link two closely related independent clauses together without using a conjunction. Colons (:) are used to introduce lists, quotes, or explanations.",
        example: "Semicolon: 'My dog barks at the mailman; my cat just sleeps.' | Colon: 'You will need three items: a pencil, paper, and a calculator.'",
        question: "Identify the sentence that uses a semicolon correctly.",
        choices: ["I love learning; it opens new doors.", "I love; learning it opens new doors.", "I love learning it opens; new doors."],
        correctIndex: 0,
        explanation: "'I love learning' and 'it opens new doors' are both complete sentences that are closely related, so a semicolon fits perfectly between them."
    },
    "Apostrophes & Quotation Marks": {
        category: "Punctuation Rules",
        definition: "Apostrophes (') are used to show ownership (like 'Emily's cat') or to make contractions where letters are missing (like 'don't' for 'do not'). Quotation marks (\" \") enclose direct speech or dialogue.",
        example: "Possession: 'That is the student's backpack.' | Dialogue: 'He yelled, \"Look out below!\"'",
        question: "Select the sentence with correct apostrophe usage for plural ownership.",
        choices: ["The boys' locker room was clean.", "The boy's locker room was clean.", "The boys locker room' was clean."],
        correctIndex: 0,
        explanation: "To show possession for a plural noun ending in -s (boys), place the apostrophe after the 's' -> boys'."
    },
    "Hyphens & Dashes": {
        category: "Punctuation Rules",
        definition: "Hyphens (-) join two or more words together into a single combined word (like 'left-handed' or 'ice-cream'). Dashes (—) indicate an abrupt break or parenthesis-like pause inside a sentence.",
        example: "Hyphen: 'He is a well-known actor.' | Dash: 'She had one goal—to win the championship.'",
        question: "Which sentence uses a hyphen correctly?",
        choices: ["My mother-in-law visited us today.", "My mother in-law visited us today.", "My mother-in law visited us today."],
        correctIndex: 0,
        explanation: "'Mother-in-law' is a compound noun that requires hyphens between all three words."
    },
    "Academic Word List": {
        category: "Vocabulary Building",
        definition: "The Academic Word List contains terms frequently found in textbooks, articles, and assessments across all subjects. Understanding these words helps you follow complex instructions and prompts.",
        example: "Key terms: 'Analyze' (break down), 'Establish' (start/set up), 'Evaluate' (judge value), 'Signify' (be a sign of).",
        question: "What does the academic word 'evaluate' mean?",
        choices: ["To examine and judge the quality or value", "To copy word-for-word", "To speed up a process"],
        correctIndex: 0,
        explanation: "To evaluate means to carefully examine and judge the worth or quality of something."
    },
    "Prefixes & Suffixes": {
        category: "Vocabulary Building",
        definition: "Prefixes are small word parts added to the beginning of a root word to change its meaning (like un- in 'unhappy'). Suffixes are added to the end of a word to alter its tense or function (like -ful in 'helpful').",
        example: "Root word: 'respect'. Prefix: 'disrespect' (not respect). Suffix: 'respectful' (full of respect).",
        question: "What is the suffix in the word 'careless'?",
        choices: ["care", "less", "car"],
        correctIndex: 1,
        explanation: "'-less' is the suffix added to the end of the root word 'care', meaning 'without care'."
    },
    "Context Clues": {
        category: "Vocabulary Building",
        definition: "Context clues are hints found in the sentences surrounding an unfamiliar word that help you deduce its meaning without looking it up in a dictionary.",
        example: "Sentence: 'The storm was so colossal that it flooded the entire city and knocked down tall trees.' (Here, 'flooded the entire city' and 'knocked down tall trees' tell us 'colossal' means extremely huge).",
        question: "What does 'hazardous' mean in: 'Wear gloves, because that chemical is hazardous to touch.'?",
        choices: ["Safe", "Beautiful", "Dangerous"],
        correctIndex: 2,
        explanation: "The warning to 'wear gloves' because of a chemical suggests 'hazardous' means dangerous."
    },
    "Synonym & Antonym Games": {
        category: "Vocabulary Building",
        definition: "Synonyms are different words that have the same or very similar meanings (like 'huge' and 'gigantic'). Antonyms are words that have opposite meanings (like 'huge' and 'tiny').",
        example: "Synonyms: 'smart' and 'intelligent'. Antonyms: 'smart' and 'foolish'.",
        question: "Find the antonym of 'fragile' (delicate).",
        choices: ["Weak", "Strong", "Broken"],
        correctIndex: 1,
        explanation: "The opposite of fragile (delicate/easily broken) is strong."
    },
    "Homophones (e.g., their/there/they're)": {
        category: "Common Errors Guide",
        definition: "Homophones are words that sound identical when spoken but have different spellings and meanings. Mixing these up is one of the most common writing mistakes.",
        example: "Their (belongs to them): 'their dog'. | There (a place): 'sit over there'. | They're (they are): 'they're ready'.",
        question: "Choose the correct homophone: '___ going to play games after dinner.'",
        choices: ["Their", "There", "They're"],
        correctIndex: 2,
        explanation: "'They're' is the contraction for 'They are', which fits: 'They are going to play games...'"
    },
    "Run-on Sentences & Fragments": {
        category: "Common Errors Guide",
        definition: "A run-on sentence squishes multiple complete thoughts together without proper punctuation. A fragment is an incomplete sentence that is missing a subject, a verb, or a complete thought.",
        example: "Run-on: 'I love reading books I read every night.' (Fix: add a period). | Fragment: 'While walking to school.' (Fix: add a main clause).",
        question: "Identify the complete, correct sentence.",
        choices: ["He enjoys code, he built an app.", "He enjoys coding because it is creative.", "Enjoying coding very much."],
        correctIndex: 1,
        explanation: "'He enjoys coding because it is creative' has a subject, verb, and complete thought. The first option is a comma splice, and the third is a fragment."
    },
    "Subject-Verb Agreement Issues": {
        category: "Common Errors Guide",
        definition: "Subject-verb agreement means that a singular subject must match a singular verb form, and a plural subject must match a plural verb form.",
        example: "Singular: 'The student studies.' (student = 1, studies = singular verb). | Plural: 'The students study.' (students = multiple, study = plural verb).",
        question: "Which sentence has correct subject-verb agreement?",
        choices: ["The cats drinks milk.", "The cat drink milk.", "The cats drink milk."],
        correctIndex: 2,
        explanation: "'Cats' is plural, so it matches the plural verb 'drink' (no -s at the end of the verb)."
    },
    "Dangling Modifiers": {
        category: "Common Errors Guide",
        definition: "A dangling modifier is a descriptive phrase at the start of a sentence that accidentally describes the wrong noun because of bad word order.",
        example: "Incorrect: 'Hungry, the pizza was eaten by Mark.' (This sounds like the pizza was hungry!). | Correct: 'Hungry, Mark ate the pizza.'",
        question: "Choose the correct sentence.",
        choices: ["Walking to the store, my umbrella blew away.", "Walking to the store, I lost my umbrella.", "Both are correct."],
        correctIndex: 1,
        explanation: "The person walking is 'I', not 'my umbrella', so 'I' must follow the introductory phrase."
    },
    "Simple, Compound, Complex": {
        category: "Sentence Structure",
        definition: "Simple sentences have one independent clause (subject + verb). Compound sentences join two complete sentences with a coordinating conjunction (FANBOYS: for, and, nor, but, or, yet, so). Complex sentences join a complete sentence with a dependent clause using a subordinator (like 'because', 'although', 'since').",
        example: "Simple: 'I like dogs.' | Compound: 'I like dogs, but he likes cats.' | Complex: 'Although I like dogs, he prefers cats.'",
        question: "What type of sentence is: 'We went to the beach, and we built sandcastles.'?",
        choices: ["Simple", "Compound", "Complex"],
        correctIndex: 1,
        explanation: "Two independent clauses joined by 'and' makes this a compound sentence."
    },
    "Active vs. Passive Voice": {
        category: "Sentence Structure",
        definition: "Active voice means the subject of the sentence is doing the action (clear and strong). Passive voice means the action is being done to the subject (often sounds wordy or indirect).",
        example: "Active: 'The child threw the ball.' | Passive: 'The ball was thrown by the child.'",
        question: "Identify the sentence written in active voice.",
        choices: ["The project was completed on time.", "The students completed the project on time.", "The project was completed by the students."],
        correctIndex: 1,
        explanation: "In 'The students completed...', the subject (students) is actively performing the verb (completed)."
    },
    "Parallelism": {
        category: "Sentence Structure",
        definition: "Parallelism means using the same grammatical pattern for items in a list or comparison. It makes sentences flow smoothly and sound balanced.",
        example: "Incorrect: 'I like swimming, reading, and to hike.' | Correct: 'I like swimming, reading, and hiking.'",
        question: "Identify the sentence that uses parallel structure.",
        choices: ["She wants to become a doctor, a writer, or teach.", "She wants to become a doctor, write books, or teach.", "She wants to become a doctor, a writer, or a teacher."],
        correctIndex: 2,
        explanation: "All three items in the list are nouns ('doctor', 'writer', 'teacher'), making the structure perfectly parallel."
    },
    "Sentence Combining": {
        category: "Sentence Structure",
        definition: "Sentence combining is the skill of joining short, choppy sentences together using conjunctions, clauses, or prepositions to make writing flow more naturally.",
        example: "Choppy: 'The sun was hot. We went inside.' | Combined: 'Because the sun was hot, we went inside.'",
        question: "What is the best way to combine: 'I was tired.' and 'I kept working.'?",
        choices: ["I was tired, so I kept working.", "Although I was tired, I kept working.", "I was tired because I kept working."],
        correctIndex: 1,
        explanation: "'Although' shows contrast, connecting the feeling of tiredness with the action of continuing to work."
    },
    "Metaphors & Similes": {
        category: "Figurative Language",
        definition: "Similes compare two different things using the words 'like' or 'as'. Metaphors compare two things by directly stating that one thing IS another (no 'like' or 'as').",
        example: "Simile: 'He is as brave as a lion.' | Metaphor: 'He is a lion in battle.'",
        question: "Which of the following is a metaphor?",
        choices: ["Her eyes were shining like stars.", "Her eyes were shining stars.", "She sings as beautifully as a star."],
        correctIndex: 1,
        explanation: "'Her eyes were shining stars' is a metaphor because it states directly that her eyes are stars."
    },
    "Personification & Hyperbole": {
        category: "Figurative Language",
        definition: "Personification gives human emotions, actions, or characteristics to non-human things (like animals or objects). Hyperbole is an extreme exaggeration used for emphasis or humor.",
        example: "Personification: 'The old floorboards groaned under our weight.' | Hyperbole: 'I have a million things to do today.'",
        question: "What device is used here: 'The wind whispered through the dark trees.'?",
        choices: ["Personification", "Hyperbole", "Simile"],
        correctIndex: 0,
        explanation: "Whispering is a human action given to a non-human element (wind), which is personification."
    },
    "Idioms & Allusions": {
        category: "Figurative Language",
        definition: "Idioms are common expressions whose figurative meaning is completely different from their literal words (like 'break a leg'). Allusions are brief, indirect references to a famous person, place, book, or historical event.",
        example: "Idiom: 'It is raining cats and dogs.' | Allusion: 'He was a real Einstein on the test.'",
        question: "What does the idiom 'cost an arm and a leg' mean?",
        choices: ["To be extremely expensive", "To get hurt in a game", "To require physical labor"],
        correctIndex: 0,
        explanation: "If something 'costs an arm and a leg', it means it is very expensive."
    },
    "Symbolism & Imagery": {
        category: "Figurative Language",
        definition: "Symbolism is using an object or color to represent a deeper abstract idea (like a red rose representing love). Imagery is descriptive, sensory writing that creates a vivid mental picture using sight, sound, smell, taste, or touch.",
        example: "Symbolism: 'A black cat crossed her path.' (symbolizing bad luck). | Imagery: 'The warm aroma of sweet, spiced apples floated from the baking pie.' (sensory details of smell and taste).",
        question: "Which sensory detail is highlighted: 'The icy water numbed her fingertips.'?",
        choices: ["Sight", "Sound", "Touch"],
        correctIndex: 2,
        explanation: "'Icy water' and 'numbed fingertips' are sensations felt by touch."
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
