<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Social Studies Resources - Hesten's Learning";
$pageDescription = "Discover the past, understand the present, and shape the future with our social studies resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Social Studies Resources</h1>
        <p class="text-center text-lg text-grayish mb-8">Discover the past, understand the present, and shape the future with our social studies resources.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- History Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-landmark mr-2"></i>History Resources</h5>
                    <p class="text-grayish mb-4">Journey through time with historical documents, timelines, and analyses of major events.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Ancient Civilizations'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ancient Civilizations</a></li>
                        <li><a href="#" onclick="openDynamicModal('World History Timelines'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World History Timelines</a></li>
                        <li><a href="#" onclick="openDynamicModal('US History Documents'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>US History Documents</a></li>
                        <li><a href="#" onclick="openDynamicModal('Historical Figures'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Historical Figures</a></li>
                    </ul>
                    <a href="/social-history.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore History</a>
                </div>
            </div>

            <!-- Geography Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-map-marked-alt mr-2"></i>Geography Resources</h5>
                    <p class="text-grayish mb-4">Learn about the world's physical and human geography with interactive maps and data.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('World Maps & Atlases'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World Maps & Atlases</a></li>
                        <li><a href="#" onclick="openDynamicModal('Physical Geography'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Physical Geography</a></li>
                        <li><a href="#" onclick="openDynamicModal('Human Geography'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Human Geography</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geographic Data Analysis'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geographic Data Analysis</a></li>
                    </ul>
                    <a href="/social-maps.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Discover Geography</a>
                </div>
            </div>

            <!-- Civics & Government -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-balance-scale mr-2"></i>Civics & Government</h5>
                    <p class="text-grayish mb-4">Understand the principles of government, citizenship, and law with our civics resources.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Branches of Government'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Branches of Government</a></li>
                        <li><a href="#" onclick="openDynamicModal('Citizenship Rights & Duties'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Citizenship Rights & Duties</a></li>
                        <li><a href="#" onclick="openDynamicModal('Constitutional Law'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Constitutional Law</a></li>
                        <li><a href="#" onclick="openDynamicModal('Electoral Process'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Electoral Process</a></li>
                    </ul>
                    <a href="/social-civics.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Learn Civics</a>
                </div>
            </div>

            <!-- Economics Resources -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-money-bill-wave mr-2"></i>Economics Resources</h5>
                    <p class="text-grayish mb-4">Gain insights into economic principles, markets, and global economic systems.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Microeconomics Basics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Microeconomics Basics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Macroeconomics Overview'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Macroeconomics Overview</a></li>
                        <li><a href="#" onclick="openDynamicModal('Supply and Demand'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Supply and Demand</a></li>
                        <li><a href="#" onclick="openDynamicModal('Global Economy'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Global Economy</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Study Economics</a>
                </div>
            </div>

            <!-- Current Events Analysis -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-globe mr-2"></i>Current Events Analysis</h5>
                    <p class="text-grayish mb-4">Stay informed about global and national events with analytical articles and discussion prompts.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Weekly News Summaries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Weekly News Summaries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geopolitical Analysis'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geopolitical Analysis</a></li>
                        <li><a href="#" onclick="openDynamicModal('Social Issues Discussions'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Social Issues Discussions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Economic Trends'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Economic Trends</a></li>
                    </ul>
                    <a href="/social-current-events.php" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Analyze Current Events</a>
                </div>
            </div>

            <!-- Cultural Studies -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-users mr-2"></i>Cultural Studies</h5>
                    <p class="text-grayish mb-4">Explore diverse cultures, traditions, and societal structures from around the world.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('World Cultures'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World Cultures</a></li>
                        <li><a href="#" onclick="openDynamicModal('Sociology Basics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Sociology Basics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Anthropology Insights'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Anthropology Insights</a></li>
                        <li><a href="#" onclick="openDynamicModal('Global Traditions'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Global Traditions</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Cultures</a>
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

