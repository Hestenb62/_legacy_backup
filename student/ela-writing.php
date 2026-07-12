<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Writing Prompts & Guides - Hesten's Learning";
$pageDescription = "Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Writing Prompts & Guides</h1>
        <p class="text-center text-lg text-grayish mb-8">Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Creative Writing Prompts -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-lightbulb mr-2"></i>Creative Writing Prompts</h5>
                    <p class="text-grayish mb-4">Spark your imagination with prompts for short stories, poetry, and reflective pieces.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Fantasy Prompts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fantasy Prompts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Sci-Fi Scenarios'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Sci-Fi Scenarios</a></li>
                        <li><a href="#" onclick="openDynamicModal('Poetry Starters'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Poetry Starters</a></li>
                        <li><a href="#" onclick="openDynamicModal('Personal Narrative Ideas'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Personal Narrative Ideas</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Get Creative Prompts</a>
                </div>
            </div>

            <!-- Essay Writing Guide -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-file-alt mr-2"></i>Essay Writing Guide</h5>
                    <p class="text-grayish mb-4">Learn the structure and techniques for writing compelling essays, from argumentative to expository.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Introduction & Thesis'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Introduction & Thesis</a></li>
                        <li><a href="#" onclick="openDynamicModal('Body Paragraph Development'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Body Paragraph Development</a></li>
                        <li><a href="#" onclick="openDynamicModal('Conclusion Strategies'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Conclusion Strategies</a></li>
                        <li><a href="#" onclick="openDynamicModal('Citing Sources'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Citing Sources</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Master Essay Writing</a>
                </div>
            </div>

            <!-- Research Paper Outline -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-clipboard-list mr-2"></i>Research Paper Outline</h5>
                    <p class="text-grayish mb-4">Organize your research effectively with our detailed outlines and planning tools for academic papers.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Topic Selection'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Topic Selection</a></li>
                        <li><a href="#" onclick="openDynamicModal('Source Evaluation'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Source Evaluation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Outline Templates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Outline Templates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Drafting & Revision'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Drafting & Revision</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Plan Research Papers</a>
                </div>
            </div>

            <!-- Grammar Checklists -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-check-square mr-2"></i>Grammar Checklists</h5>
                    <p class="text-grayish mb-4">Ensure your writing is grammatically sound with easy-to-follow checklists for common errors.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Sentence Structure'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Sentence Structure</a></li>
                        <li><a href="#" onclick="openDynamicModal('Verb Tenses'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Verb Tenses</a></li>
                        <li><a href="#" onclick="openDynamicModal('Punctuation Usage'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Punctuation Usage</a></li>
                        <li><a href="#" onclick="openDynamicModal('Subject-Verb Agreement'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Subject-Verb Agreement</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Check Your Grammar</a>
                </div>
            </div>

            <!-- Argumentative Writing -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-gavel mr-2"></i>Argumentative Writing</h5>
                    <p class="text-grayish mb-4">Learn to construct strong arguments, support claims with evidence, and refute counterarguments.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Developing Arguments'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Developing Arguments</a></li>
                        <li><a href="#" onclick="openDynamicModal('Evidence & Support'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Evidence & Support</a></li>
                        <li><a href="#" onclick="openDynamicModal('Counterarguments'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Counterarguments</a></li>
                        <li><a href="#" onclick="openDynamicModal('Persuasive Techniques'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Persuasive Techniques</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Practice Argumentation</a>
                </div>
            </div>

            <!-- Narrative Writing -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-scroll mr-2"></i>Narrative Writing</h5>
                    <p class="text-grayish mb-4">Craft compelling stories with engaging plots, vivid characters, and descriptive settings.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Story Planning'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Story Planning</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character Development'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character Development</a></li>
                        <li><a href="#" onclick="openDynamicModal('Setting the Scene'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Setting the Scene</a></li>
                        <li><a href="#" onclick="openDynamicModal('Dialogue Writing'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Dialogue Writing</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Write Narratives</a>
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

