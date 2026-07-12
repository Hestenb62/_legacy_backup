<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Literature Analysis - Hesten's Learning";
$pageDescription = "Deepen your appreciation for literature by exploring themes, characters, and literary devices.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Literature Analysis</h1>
        <p class="text-center text-lg text-grayish mb-8">Deepen your appreciation for literature by exploring themes, characters, and literary devices.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Literary Devices -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-highlighter mr-2"></i>Literary Devices</h5>
                    <p class="text-grayish mb-4">Understand and identify the various techniques authors use to convey meaning and evoke emotion.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Metaphor & Simile'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Metaphor & Simile</a></li>
                        <li><a href="#" onclick="openDynamicModal('Imagery & Symbolism'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Imagery & Symbolism</a></li>
                        <li><a href="#" onclick="openDynamicModal('Foreshadowing & Flashback'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Foreshadowing & Flashback</a></li>
                        <li><a href="#" onclick="openDynamicModal('Irony & Satire'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Irony & Satire</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Literary Devices</a>
                </div>
            </div>

            <!-- Character Analysis Templates -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-users mr-2"></i>Character Analysis Templates</h5>
                    <p class="text-grayish mb-4">Learn how to analyze characters' motivations, development, and roles in a story.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Protagonist & Antagonist'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Protagonist & Antagonist</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character Archetypes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character Archetypes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character Development Arc'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character Development Arc</a></li>
                        <li><a href="#" onclick="openDynamicModal('Character vs. Conflict'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Character vs. Conflict</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Analyze Characters</a>
                </div>
            </div>

            <!-- Theme Exploration Guides -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-lightbulb mr-2"></i>Theme Exploration Guides</h5>
                    <p class="text-grayish mb-4">Discover and interpret the central ideas and messages conveyed in literary works.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Identifying Themes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Identifying Themes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Universal Themes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Universal Themes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Symbolism & Theme'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Symbolism & Theme</a></li>
                        <li><a href="#" onclick="openDynamicModal('Author\'s Message'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Author's Message</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Themes</a>
                </div>
            </div>

            <!-- Genre Studies -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-folder-open mr-2"></i>Genre Studies</h5>
                    <p class="text-grayish mb-4">Understand the conventions and characteristics of different literary genres.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Fiction Genres'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fiction Genres</a></li>
                        <li><a href="#" onclick="openDynamicModal('Non-Fiction Genres'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Non-Fiction Genres</a></li>
                        <li><a href="#" onclick="openDynamicModal('Poetry Forms'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Poetry Forms</a></li>
                        <li><a href="#" onclick="openDynamicModal('Drama & Playwriting'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Drama & Playwriting</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Study Genres</a>
                </div>
            </div>

            <!-- Plot & Structure Analysis -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-sitemap mr-2"></i>Plot & Structure Analysis</h5>
                    <p class="text-grayish mb-4">Break down narratives into their key components: exposition, rising action, climax, falling action, and resolution.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Freytag\'s Pyramid'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Freytag's Pyramid</a></li>
                        <li><a href="#" onclick="openDynamicModal('Conflict Types'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Conflict Types</a></li>
                        <li><a href="#" onclick="openDynamicModal('Pacing & Suspense'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Pacing & Suspense</a></li>
                        <li><a href="#" onclick="openDynamicModal('Narrative Arcs'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Narrative Arcs</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Analyze Plot</a>
                </div>
            </div>

            <!-- Author's Craft -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-feather-alt mr-2"></i>Author's Craft</h5>
                    <p class="text-grayish mb-4">Examine how authors use language, style, and literary techniques to create their works.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Diction & Syntax'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Diction & Syntax</a></li>
                        <li><a href="#" onclick="openDynamicModal('Tone & Mood'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Tone & Mood</a></li>
                        <li><a href="#" onclick="openDynamicModal('Point of View'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Point of View</a></li>
                        <li><a href="#" onclick="openDynamicModal('Imagery & Sensory Details'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Imagery & Sensory Details</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Author's Craft</a>
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

