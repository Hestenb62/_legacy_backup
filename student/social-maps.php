<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Interactive Maps - Hesten's Learning";
$pageDescription = "Explore the world\'s geography and historical changes through engaging interactive maps.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Interactive Maps</h1>
        <p class="text-center text-lg text-grayish mb-8">Explore the world's geography and historical changes through engaging interactive maps.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- World Maps & Atlases -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-globe-americas mr-2"></i>World Maps & Atlases</h5>
                    <p class="text-grayish mb-4">Navigate through political, physical, and thematic maps of the world.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Political World Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Political World Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Physical Features Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Physical Features Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Climate Zones Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Climate Zones Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Population Density Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Population Density Map</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View World Maps</a>
                </div>
            </div>

            <!-- Historical Maps -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-map-marked-alt mr-2"></i>Historical Maps</h5>
                    <p class="text-grayish mb-4">See how borders, empires, and trade routes changed throughout history.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Ancient Civilizations Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ancient Civilizations Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Roman Empire Expansion'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Roman Empire Expansion</a></li>
                        <li><a href="#" onclick="openDynamicModal('World War II Fronts'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World War II Fronts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Cold War Alliances'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Cold War Alliances</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Historical Maps</a>
                </div>
            </div>

            <!-- US State Maps -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-flag-usa mr-2"></i>US State Maps</h5>
                    <p class="text-grayish mb-4">Detailed maps of all US states, including capitals, major cities, and geographical features.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('State Capitals Quiz Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>State Capitals Quiz Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('US Rivers & Mountains Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>US Rivers & Mountains Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Historical US Territories'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Historical US Territories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Interactive State Borders'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Interactive State Borders</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View US State Maps</a>
                </div>
            </div>

            <!-- Economic Maps -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-chart-pie mr-2"></i>Economic Maps</h5>
                    <p class="text-grayish mb-4">Visualize global trade routes, resource distribution, and economic indicators.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Global Trade Routes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Global Trade Routes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Natural Resources Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Natural Resources Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('GDP Per Capita Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>GDP Per Capita Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Poverty Rates Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Poverty Rates Map</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Economic Maps</a>
                </div>
            </div>

            <!-- Cultural & Demographic Maps -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-users mr-2"></i>Cultural & Demographic Maps</h5>
                    <p class="text-grayish mb-4">Understand population distribution, language families, and cultural diversity around the world.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('World Language Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World Language Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Religion Distribution'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Religion Distribution</a></li>
                        <li><a href="#" onclick="openDynamicModal('Migration Patterns'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Migration Patterns</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ethnic Group Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ethnic Group Map</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Cultural Maps</a>
                </div>
            </div>

            <!-- Environmental Maps -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-leaf mr-2"></i>Environmental Maps</h5>
                    <p class="text-grayish mb-4">Visualize environmental data such as climate zones, biodiversity hotspots, and pollution levels.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Global Climate Zones'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Global Climate Zones</a></li>
                        <li><a href="#" onclick="openDynamicModal('Biodiversity Hotspots'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Biodiversity Hotspots</a></li>
                        <li><a href="#" onclick="openDynamicModal('Deforestation Rates Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Deforestation Rates Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Air Quality Index Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Air Quality Index Map</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Environmental Maps</a>
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

