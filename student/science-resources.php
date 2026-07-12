<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Resources - Hesten's Learning";
$pageDescription = "Explore the wonders of the natural world with our engaging science resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-red-600 mb-3">Science Resources</h1>
        <p class="text-center text-lg text-grayish mb-8">Explore the wonders of the natural world with our engaging science resources.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Biology Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-leaf mr-2"></i>Biology Resources</h5>
                    <p class="text-grayish mb-4">Dive into the study of life with resources on cells, genetics, ecosystems, and human anatomy.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Cell Biology'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Cell Biology</a></li>
                        <li><a href="#" onclick="openDynamicModal('Genetics & Heredity'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Genetics & Heredity</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ecology & Environment'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ecology & Environment</a></li>
                        <li><a href="#" onclick="openDynamicModal('Human Body Systems'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Human Body Systems</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Biology</a>
                </div>
            </div>

            <!-- Chemistry Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-atom mr-2"></i>Chemistry Resources</h5>
                    <p class="text-grayish mb-4">Unravel the mysteries of matter and its properties with our chemistry guides and experiments.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Periodic Table'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Periodic Table</a></li>
                        <li><a href="#" onclick="openDynamicModal('Chemical Reactions'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Chemical Reactions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Acids and Bases'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Acids and Bases</a></li>
                        <li><a href="#" onclick="openDynamicModal('Organic Chemistry Basics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Organic Chemistry Basics</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">Discover Chemistry</a>
                </div>
            </div>

            <!-- Physics Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-atom mr-2"></i>Physics Resources</h5>
                    <p class="text-grayish mb-4">Understand the fundamental laws of the universe with resources on motion, energy, and forces.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Mechanics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mechanics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Electricity & Magnetism'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Electricity & Magnetism</a></li>
                        <li><a href="#" onclick="openDynamicModal('Waves & Optics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Waves & Optics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Thermodynamics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Thermodynamics</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">Learn Physics</a>
                </div>
            </div>

            <!-- Earth Science Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-globe-europe mr-2"></i>Earth Science Resources</h5>
                    <p class="text-grayish mb-4">Explore our planet's geology, meteorology, oceanography, and astronomy.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Geology & Rocks'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geology & Rocks</a></li>
                        <li><a href="#" onclick="openDynamicModal('Weather & Climate'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Weather & Climate</a></li>
                        <li><a href="#" onclick="openDynamicModal('Oceanography'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Oceanography</a></li>
                        <li><a href="#" onclick="openDynamicModal('Astronomy & Space'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Astronomy & Space</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">Study Earth Science</a>
                </div>
            </div>

            <!-- Science Experiments -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-vial mr-2"></i>Science Experiments</h5>
                    <p class="text-grayish mb-4">Hands-on experiments and virtual labs to make science come alive.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Biology Labs'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Biology Labs</a></li>
                        <li><a href="#" onclick="openDynamicModal('Chemistry Demos'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Chemistry Demos</a></li>
                        <li><a href="#" onclick="openDynamicModal('Physics Simulations'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Physics Simulations</a></li>
                        <li><a href="#" onclick="openDynamicModal('At-Home Experiments'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>At-Home Experiments</a></li>
                    </ul>
                    <a href="/science-experiments.php" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">View Experiments</a>
                </div>
            </div>

            <!-- Science Articles & News -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-newspaper mr-2"></i>Science Articles & News</h5>
                    <p class="text-grayish mb-4">Stay updated with the latest scientific discoveries and read insightful articles.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Latest Discoveries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Latest Discoveries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Environmental Science News'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Environmental Science News</a></li>
                        <li><a href="#" onclick="openDynamicModal('Space Exploration Articles'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Space Exploration Articles</a></li>
                        <li><a href="#" onclick="openDynamicModal('Health & Medicine Updates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Health & Medicine Updates</a></li>
                    </ul>
                    <a href="/science-articles.php" class="mt-auto px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:opacity-90 text-center">Read Articles</a>
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

