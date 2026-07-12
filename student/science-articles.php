<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Articles & News - Hesten's Learning";
$pageDescription = "Stay informed with the latest scientific discoveries, research, and news from various fields.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Science Articles & News</h1>
        <p class="text-center text-lg text-grayish mb-8">Stay informed with the latest scientific discoveries, research, and news from various fields.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Latest Discoveries -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-lightbulb mr-2"></i>Latest Discoveries</h5>
                    <p class="text-grayish mb-4">Read about groundbreaking research and recent advancements across all scientific disciplines.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Breakthroughs in Medicine'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Breakthroughs in Medicine</a></li>
                        <li><a href="#" onclick="openDynamicModal('New Physics Theories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>New Physics Theories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Astronomical Discoveries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Astronomical Discoveries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Genetic Engineering Updates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Genetic Engineering Updates</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Latest Discoveries</a>
                </div>
            </div>

            <!-- Environmental Science News -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-globe-europe mr-2"></i>Environmental Science News</h5>
                    <p class="text-grayish mb-4">Stay updated on climate change, conservation efforts, and environmental policies worldwide.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Climate Change Reports'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Climate Change Reports</a></li>
                        <li><a href="#" onclick="openDynamicModal('Conservation Success Stories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Conservation Success Stories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Renewable Energy Innovations'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Renewable Energy Innovations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Pollution Control Efforts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Pollution Control Efforts</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Read Environmental News</a>
                </div>
            </div>

            <!-- Space Exploration Articles -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-space-shuttle mr-2"></i>Space Exploration Articles</h5>
                    <p class="text-grayish mb-4">Journey to the stars with articles on space missions, astronomical phenomena, and cosmic mysteries.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Mars Missions Updates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mars Missions Updates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Black Holes Explained'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Black Holes Explained</a></li>
                        <li><a href="#" onclick="openDynamicModal('Exoplanet Discoveries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Exoplanet Discoveries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Future of Space Travel'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Future of Space Travel</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Space Articles</a>
                </div>
            </div>

            <!-- Health & Medicine Updates -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-heartbeat mr-2"></i>Health & Medicine Updates</h5>
                    <p class="text-grayish mb-4">Get the latest news on medical research, health trends, and breakthroughs in healthcare.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Vaccine Development'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Vaccine Development</a></li>
                        <li><a href="#" onclick="openDynamicModal('Disease Research'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Disease Research</a></li>
                        <li><a href="#" onclick="openDynamicModal('Nutrition & Wellness'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Nutrition & Wellness</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mental Health Awareness'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mental Health Awareness</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Read Health News</a>
                </div>
            </div>

            <!-- Technology & Innovation -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-microchip mr-2"></i>Technology & Innovation</h5>
                    <p class="text-grayish mb-4">Discover the newest technological advancements and their impact on society.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Artificial Intelligence'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Artificial Intelligence</a></li>
                        <li><a href="#" onclick="openDynamicModal('Robotics & Automation'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Robotics & Automation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Biotechnology'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Biotechnology</a></li>
                        <li><a href="#" onclick="openDynamicModal('Quantum Computing'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Quantum Computing</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Tech News</a>
                </div>
            </div>

            <!-- Science History -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-history mr-2"></i>Science History</h5>
                    <p class="text-grayish mb-4">Learn about the great scientists and pivotal moments that shaped our scientific understanding.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Famous Scientists'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Famous Scientists</a></li>
                        <li><a href="#" onclick="openDynamicModal('Key Scientific Discoveries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Key Scientific Discoveries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Evolution of Theories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Evolution of Theories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Nobel Prize Winners'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Nobel Prize Winners</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Discover Science History</a>
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

