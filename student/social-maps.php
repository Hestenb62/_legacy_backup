<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Interactive Maps - Hesten's Learning";
$pageDescription = "Explore the world\'s geography and historical changes through engaging interactive maps.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Interactive Maps</h1>
        <p class="student-hub-subtitle">Explore the world's geography and historical changes through engaging interactive maps.</p>

        <div class="student-hub-grid">
            <!-- World Maps & Atlases -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-globe-americas mr-2"></i>World Maps & Atlases</h5>
                    <p class="student-hub-card-desc">Navigate through political, physical, and thematic maps of the world.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Political World Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Political World Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Physical Features Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Physical Features Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Climate Zones Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Climate Zones Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Population Density Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Population Density Map</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">View World Maps</a>
                </div>
            </div>

            <!-- Historical Maps -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-map-marked-alt mr-2"></i>Historical Maps</h5>
                    <p class="student-hub-card-desc">See how borders, empires, and trade routes changed throughout history.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Ancient Civilizations Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Ancient Civilizations Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Roman Empire Expansion'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Roman Empire Expansion</a></li>
                        <li><a href="#" onclick="openDynamicModal('World War II Fronts'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>World War II Fronts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Cold War Alliances'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Cold War Alliances</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Historical Maps</a>
                </div>
            </div>

            <!-- US State Maps -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-flag-usa mr-2"></i>US State Maps</h5>
                    <p class="student-hub-card-desc">Detailed maps of all US states, including capitals, major cities, and geographical features.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('State Capitals Quiz Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>State Capitals Quiz Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('US Rivers & Mountains Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>US Rivers & Mountains Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Historical US Territories'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Historical US Territories</a></li>
                        <li><a href="#" onclick="openDynamicModal('Interactive State Borders'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Interactive State Borders</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">View US State Maps</a>
                </div>
            </div>

            <!-- Economic Maps -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-chart-pie mr-2"></i>Economic Maps</h5>
                    <p class="student-hub-card-desc">Visualize global trade routes, resource distribution, and economic indicators.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Global Trade Routes'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Global Trade Routes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Natural Resources Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Natural Resources Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('GDP Per Capita Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>GDP Per Capita Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Poverty Rates Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Poverty Rates Map</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Economic Maps</a>
                </div>
            </div>

            <!-- Cultural & Demographic Maps -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-users mr-2"></i>Cultural & Demographic Maps</h5>
                    <p class="student-hub-card-desc">Understand population distribution, language families, and cultural diversity around the world.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('World Language Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>World Language Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Religion Distribution'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Religion Distribution</a></li>
                        <li><a href="#" onclick="openDynamicModal('Migration Patterns'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Migration Patterns</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ethnic Group Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Ethnic Group Map</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">View Cultural Maps</a>
                </div>
            </div>

            <!-- Environmental Maps -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-leaf mr-2"></i>Environmental Maps</h5>
                    <p class="student-hub-card-desc">Visualize environmental data such as climate zones, biodiversity hotspots, and pollution levels.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Global Climate Zones'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Global Climate Zones</a></li>
                        <li><a href="#" onclick="openDynamicModal('Biodiversity Hotspots'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Biodiversity Hotspots</a></li>
                        <li><a href="#" onclick="openDynamicModal('Deforestation Rates Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Deforestation Rates Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Air Quality Index Map'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Air Quality Index Map</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Environmental Maps</a>
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

