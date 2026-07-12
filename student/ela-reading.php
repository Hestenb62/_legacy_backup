<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Reading Comprehension - Hesten's Learning";
$pageDescription = "Practice and improve your reading comprehension skills with a variety of texts and exercises.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Reading Comprehension</h1>
        <p class="text-center text-lg text-grayish mb-8">Practice and improve your reading comprehension skills with a variety of texts and exercises.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Fiction Passages -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-book-open mr-2"></i>Fiction Passages</h5>
                    <p class="text-grayish mb-4">Engage with diverse fictional stories and answer questions to test your understanding.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Short Stories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Short Stories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Novel Excerpts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Novel Excerpts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Fantasy & Sci-Fi'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fantasy & Sci-Fi</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mystery & Adventure'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mystery & Adventure</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Read Fiction</a>
                </div>
            </div>

            <!-- Non-Fiction Articles -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-newspaper mr-2"></i>Non-Fiction Articles</h5>
                    <p class="text-grayish mb-4">Improve your ability to extract information and analyze arguments from various non-fiction texts.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Science Articles'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Science Articles</a></li>
                        <li><a href="#" onclick="openDynamicModal('Historical Texts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Historical Texts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Biographies'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Biographies</a></li>
                        <li><a href="#" onclick="openDynamicModal('Informative Essays'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Informative Essays</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Read Non-Fiction</a>
                </div>
            </div>

            <!-- Reading Strategies -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-lightbulb mr-2"></i>Reading Strategies</h5>
                    <p class="text-grayish mb-4">Learn effective techniques for active reading, critical thinking, and summarizing texts.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Skimming & Scanning'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Skimming & Scanning</a></li>
                        <li><a href="#" onclick="openDynamicModal('Annotating Texts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Annotating Texts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Identifying Main Idea'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Identifying Main Idea</a></li>
                        <li><a href="#" onclick="openDynamicModal('Inference Skills'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Inference Skills</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Learn Strategies</a>
                </div>
            </div>

            <!-- Comprehension Quizzes -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-question-circle mr-2"></i>Comprehension Quizzes</h5>
                    <p class="text-grayish mb-4">Test your understanding with interactive quizzes after reading various passages.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Quiz: Fictional Stories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Quiz: Fictional Stories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Quiz: Current Events'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Quiz: Current Events</a></li>
                        <li><a href="#" onclick="openDynamicModal('Quiz: Academic Texts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Quiz: Academic Texts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mixed Comprehension Quiz'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mixed Comprehension Quiz</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Take Quizzes</a>
                </div>
            </div>

            <!-- Vocabulary in Context -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-spell-check mr-2"></i>Vocabulary in Context</h5>
                    <p class="text-grayish mb-4">Learn new words by understanding their meaning within different reading passages.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Context Clues Practice'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Context Clues Practice</a></li>
                        <li><a href="#" onclick="openDynamicModal('Word Meaning Exercises'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Word Meaning Exercises</a></li>
                        <li><a href="#" onclick="openDynamicModal('Idioms & Phrases'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Idioms & Phrases</a></li>
                        <li><a href="#" onclick="openDynamicModal('Figurative Language'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Figurative Language</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Practice Vocabulary</a>
                </div>
            </div>

            <!-- Literary Elements -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-feather-alt mr-2"></i>Literary Elements</h5>
                    <p class="text-grayish mb-4">Understand the components of literature, including plot, character, setting, and theme.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Plot Structure'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Plot Structure</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character Development'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character Development</a></li>
                        <li><a href="#" onclick="openDynamicModal('Setting & Atmosphere'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Setting & Atmosphere</a></li>
                        <li><a href="#" onclick="openDynamicModal('Identifying Themes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Identifying Themes</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Literary Elements</a>
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

