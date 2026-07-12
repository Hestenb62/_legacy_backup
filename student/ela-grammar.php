<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Grammar & Vocabulary - Hesten's Learning";
$pageDescription = "Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Grammar & Vocabulary</h1>
        <p class="text-center text-lg text-grayish mb-8">Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Parts of Speech -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-tag mr-2"></i>Parts of Speech</h5>
                    <p class="text-grayish mb-4">Understand the function of nouns, verbs, adjectives, adverbs, and more with clear explanations and exercises.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Nouns & Pronouns'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Nouns & Pronouns</a></li>
                        <li><a href="#" onclick="openDynamicModal('Verbs & Tenses'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Verbs & Tenses</a></li>
                        <li><a href="#" onclick="openDynamicModal('Adjectives & Adverbs'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Adjectives & Adverbs</a></li>
                        <li><a href="#" onclick="openDynamicModal('Prepositions & Conjunctions'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Prepositions & Conjunctions</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Learn Parts of Speech</a>
                </div>
            </div>

            <!-- Punctuation Rules -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-quote-right mr-2"></i>Punctuation Rules</h5>
                    <p class="text-grayish mb-4">Master the correct usage of commas, periods, semicolons, and other punctuation marks.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Comma Usage'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Comma Usage</a></li>
                        <li><a href="#" onclick="openDynamicModal('Semicolons & Colons'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Semicolons & Colons</a></li>
                        <li><a href="#" onclick="openDynamicModal('Apostrophes & Quotation Marks'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Apostrophes & Quotation Marks</a></li>
                        <li><a href="#" onclick="openDynamicModal('Hyphens & Dashes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Hyphens & Dashes</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Practice Punctuation</a>
                </div>
            </div>

            <!-- Vocabulary Building Exercises -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-spell-check mr-2"></i>Vocabulary Building Exercises</h5>
                    <p class="text-grayish mb-4">Expand your lexicon with interactive exercises, word lists, and strategies for memorization.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Academic Word List'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Academic Word List</a></li>
                        <li><a href="#" onclick="openDynamicModal('Prefixes & Suffixes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Prefixes & Suffixes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Context Clues'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Context Clues</a></li>
                        <li><a href="#" onclick="openDynamicModal('Synonym & Antonym Games'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Synonym & Antonym Games</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Build Your Vocabulary</a>
                </div>
            </div>

            <!-- Common Errors Guide -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-exclamation-triangle mr-2"></i>Common Errors Guide</h5>
                    <p class="text-grayish mb-4">Identify and correct frequently made grammar and usage mistakes in writing.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Homophones (e.g., their/there/they\'re)'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Homophones (e.g., their/there/they're)</a></li>
                        <li><a href="#" onclick="openDynamicModal('Run-on Sentences & Fragments'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Run-on Sentences & Fragments</a></li>
                        <li><a href="#" onclick="openDynamicModal('Subject-Verb Agreement Issues'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Subject-Verb Agreement Issues</a></li>
                        <li><a href="#" onclick="openDynamicModal('Dangling Modifiers'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Dangling Modifiers</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Fix Common Errors</a>
                </div>
            </div>

            <!-- Sentence Structure -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-stream mr-2"></i>Sentence Structure</h5>
                    <p class="text-grayish mb-4">Learn to construct clear, concise, and varied sentences for effective communication.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Simple, Compound, Complex'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Simple, Compound, Complex</a></li>
                        <li><a href="#" onclick="openDynamicModal('Active vs. Passive Voice'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Active vs. Passive Voice</a></li>
                        <li><a href="#" onclick="openDynamicModal('Parallelism'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Parallelism</a></li>
                        <li><a href="#" onclick="openDynamicModal('Sentence Combining'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Sentence Combining</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Improve Sentence Structure</a>
                </div>
            </div>

            <!-- Figurative Language -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-microphone-alt mr-2"></i>Figurative Language</h5>
                    <p class="text-grayish mb-4">Understand and identify metaphors, similes, personification, and other figures of speech.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Metaphors & Similes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Metaphors & Similes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Personification & Hyperbole'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Personification & Hyperbole</a></li>
                        <li><a href="#" onclick="openDynamicModal('Idioms & Allusions'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Idioms & Allusions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Symbolism & Imagery'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Symbolism & Imagery</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Figurative Language</a>
                </div>
            </div>
        </div>
    </main>

<?php
// Include the footer file
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>

