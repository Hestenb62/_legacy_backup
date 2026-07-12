<?php
// Set variables required by header.php for dynamic content
$pageTitle = "ELA Resources - Hesten's Learning";
$pageDescription = "Improve your English Language Arts skills with our comprehensive resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">ELA Resources</h1>
        <p class="text-center text-lg text-grayish mb-8">Improve your English Language Arts skills with our comprehensive resources.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Reading Comprehension -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-book-reader mr-2"></i>Reading Comprehension</h5>
                    <p class="text-grayish mb-4">Enhance your understanding of texts with practice passages, strategies, and quizzes.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Fiction Passages'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fiction Passages</a></li>
                        <li><a href="#" onclick="openDynamicModal('Non-Fiction Articles'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Non-Fiction Articles</a></li>
                        <li><a href="#" onclick="openDynamicModal('Reading Strategies'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Reading Strategies</a></li>
                        <li><a href="#" onclick="openDynamicModal('Comprehension Quizzes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Comprehension Quizzes</a></li>
                    </ul>
                    <a href="/ela-reading.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Practice Reading</a>
                </div>
            </div>

            <!-- Writing Prompts & Guides -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-pen-nib mr-2"></i>Writing Prompts & Guides</h5>
                    <p class="text-grayish mb-4">Develop your writing skills with creative prompts, structural guides, and grammar tips.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Creative Writing Prompts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Creative Writing Prompts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Essay Writing Guide'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Essay Writing Guide</a></li>
                        <li><a href="#" onclick="openDynamicModal('Research Paper Outline'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Research Paper Outline</a></li>
                        <li><a href="#" onclick="openDynamicModal('Grammar Checklists'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Grammar Checklists</a></li>
                    </ul>
                    <a href="/ela-writing.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Start Writing</a>
                </div>
            </div>

            <!-- Grammar & Vocabulary -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-language mr-2"></i>Grammar & Vocabulary</h5>
                    <p class="text-grayish mb-4">Master English grammar rules and expand your vocabulary with interactive exercises and lists.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Parts of Speech'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Parts of Speech</a></li>
                        <li><a href="#" onclick="openDynamicModal('Punctuation Rules'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Punctuation Rules</a></li>
                        <li><a href="#" onclick="openDynamicModal('Vocabulary Building Exercises'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Vocabulary Building Exercises</a></li>
                        <li><a href="#" onclick="openDynamicModal('Common Errors Guide'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Common Errors Guide</a></li>
                    </ul>
                    <a href="/ela-grammar.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Improve Grammar & Vocab</a>
                </div>
            </div>

            <!-- Literature Analysis -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-book mr-2"></i>Literature Analysis</h5>
                    <p class="text-grayish mb-4">Explore literary works with analysis guides, character studies, and thematic discussions.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Literary Devices'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Literary Devices</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character Analysis Templates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character Analysis Templates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Theme Exploration Guides'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Theme Exploration Guides</a></li>
                        <li><a href="#" onclick="openDynamicModal('Genre Studies'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Genre Studies</a></li>
                    </ul>
                    <a href="/ela-literature.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Analyze Literature</a>
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

