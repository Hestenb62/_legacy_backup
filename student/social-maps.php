<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Interactive Maps - Hesten's Learning";
$pageDescription = "Explore the world\'s geography and historical changes through engaging interactive maps.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Interactive Maps</h1>
    <p class="resource-subtitle">Explore the world's geography and historical changes through engaging interactive maps.</p>
    <div class="search-filter-container">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="topic-search" placeholder="Search topics..." aria-label="Search topics">
            <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="filter-tabs" role="tablist">
            <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
        </div>
    </div>
</div>
<div class="resource-grid" id="topics-grid">
            <!-- World Maps & Atlases -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-globe-americas mr-2"></i></div><h2 class="resource-card-title">World Maps & Atlases</h2></div>
                    <p class="resource-card-desc">Navigate through political, physical, and thematic maps of the world.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Political World Map'); return false;" class="topic-pill" data-search-terms="political world map">Political World Map</button>
<button onclick="openDynamicModal('Physical Features Map'); return false;" class="topic-pill" data-search-terms="physical features map">Physical Features Map</button>
<button onclick="openDynamicModal('Climate Zones Map'); return false;" class="topic-pill" data-search-terms="climate zones map">Climate Zones Map</button>
<button onclick="openDynamicModal('Population Density Map'); return false;" class="topic-pill" data-search-terms="population density map">Population Density Map</button>
</div>
                    <a href="#" class="card-action-btn">View World Maps</a>
                </div>
            </div>

            <!-- Historical Maps -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-map-marked-alt mr-2"></i></div><h2 class="resource-card-title">Historical Maps</h2></div>
                    <p class="resource-card-desc">See how borders, empires, and trade routes changed throughout history.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Ancient Civilizations Map'); return false;" class="topic-pill" data-search-terms="ancient civilizations map">Ancient Civilizations Map</button>
<button onclick="openDynamicModal('Roman Empire Expansion'); return false;" class="topic-pill" data-search-terms="roman empire expansion">Roman Empire Expansion</button>
<button onclick="openDynamicModal('World War II Fronts'); return false;" class="topic-pill" data-search-terms="world war ii fronts">World War II Fronts</button>
<button onclick="openDynamicModal('Cold War Alliances'); return false;" class="topic-pill" data-search-terms="cold war alliances">Cold War Alliances</button>
</div>
                    <a href="#" class="card-action-btn">Explore Historical Maps</a>
                </div>
            </div>

            <!-- US State Maps -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-flag-usa mr-2"></i></div><h2 class="resource-card-title">US State Maps</h2></div>
                    <p class="resource-card-desc">Detailed maps of all US states, including capitals, major cities, and geographical features.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('State Capitals Quiz Map'); return false;" class="topic-pill" data-search-terms="state capitals quiz map">State Capitals Quiz Map</button>
<button onclick="openDynamicModal('US Rivers & Mountains Map'); return false;" class="topic-pill" data-search-terms="us rivers & mountains map">US Rivers & Mountains Map</button>
<button onclick="openDynamicModal('Historical US Territories'); return false;" class="topic-pill" data-search-terms="historical us territories">Historical US Territories</button>
<button onclick="openDynamicModal('Interactive State Borders'); return false;" class="topic-pill" data-search-terms="interactive state borders">Interactive State Borders</button>
</div>
                    <a href="#" class="card-action-btn">View US State Maps</a>
                </div>
            </div>

            <!-- Economic Maps -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-chart-pie mr-2"></i></div><h2 class="resource-card-title">Economic Maps</h2></div>
                    <p class="resource-card-desc">Visualize global trade routes, resource distribution, and economic indicators.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Global Trade Routes'); return false;" class="topic-pill" data-search-terms="global trade routes">Global Trade Routes</button>
<button onclick="openDynamicModal('Natural Resources Map'); return false;" class="topic-pill" data-search-terms="natural resources map">Natural Resources Map</button>
<button onclick="openDynamicModal('GDP Per Capita Map'); return false;" class="topic-pill" data-search-terms="gdp per capita map">GDP Per Capita Map</button>
<button onclick="openDynamicModal('Poverty Rates Map'); return false;" class="topic-pill" data-search-terms="poverty rates map">Poverty Rates Map</button>
</div>
                    <a href="#" class="card-action-btn">Explore Economic Maps</a>
                </div>
            </div>

            <!-- Cultural & Demographic Maps -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-users mr-2"></i></div><h2 class="resource-card-title">Cultural & Demographic Maps</h2></div>
                    <p class="resource-card-desc">Understand population distribution, language families, and cultural diversity around the world.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('World Language Map'); return false;" class="topic-pill" data-search-terms="world language map">World Language Map</button>
<button onclick="openDynamicModal('Religion Distribution'); return false;" class="topic-pill" data-search-terms="religion distribution">Religion Distribution</button>
<button onclick="openDynamicModal('Migration Patterns'); return false;" class="topic-pill" data-search-terms="migration patterns">Migration Patterns</button>
<button onclick="openDynamicModal('Ethnic Group Map'); return false;" class="topic-pill" data-search-terms="ethnic group map">Ethnic Group Map</button>
</div>
                    <a href="#" class="card-action-btn">View Cultural Maps</a>
                </div>
            </div>

            <!-- Environmental Maps -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-leaf mr-2"></i></div><h2 class="resource-card-title">Environmental Maps</h2></div>
                    <p class="resource-card-desc">Visualize environmental data such as climate zones, biodiversity hotspots, and pollution levels.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Global Climate Zones'); return false;" class="topic-pill" data-search-terms="global climate zones">Global Climate Zones</button>
<button onclick="openDynamicModal('Biodiversity Hotspots'); return false;" class="topic-pill" data-search-terms="biodiversity hotspots">Biodiversity Hotspots</button>
<button onclick="openDynamicModal('Deforestation Rates Map'); return false;" class="topic-pill" data-search-terms="deforestation rates map">Deforestation Rates Map</button>
<button onclick="openDynamicModal('Air Quality Index Map'); return false;" class="topic-pill" data-search-terms="air quality index map">Air Quality Index Map</button>
</div>
                    <a href="#" class="card-action-btn">Explore Environmental Maps</a>
                </div>
            </div>
        </div>
    
<div id="no-results-state" class="no-results-box" style="display: none;">
    <i class="fas fa-search-minus no-results-icon"></i>
    <h3 class="no-results-title">No matching topics found</h3>
    <p class="no-results-desc">Try checking your spelling.</p>
    <button id="reset-search-btn" class="reset-search-btn">Reset Search</button>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("topic-search");
    const clearBtn = document.getElementById("clear-search");
    const filterTabs = document.querySelectorAll(".filter-tab");
    const cards = document.querySelectorAll(".resource-card");
    const noResultsState = document.getElementById("no-results-state");
    const resetBtn = document.getElementById("reset-search-btn");
    let currentCategory = "all";
    let searchQuery = "";
    function applyFilters() {
        let visibleCardsCount = 0;
        cards.forEach(card => {
            const cardCategory = card.getAttribute("data-card-category");
            const categoryMatch = currentCategory === "all" || cardCategory === currentCategory;
            const pills = card.querySelectorAll(".topic-pill");
            let matchingPillsInCard = 0;
            pills.forEach(pill => {
                const text = pill.textContent.toLowerCase();
                const terms = pill.getAttribute("data-search-terms").toLowerCase();
                const textMatch = text.includes(searchQuery) || terms.includes(searchQuery);
                if (textMatch) { pill.style.display = "block"; matchingPillsInCard++; }
                else { pill.style.display = "none"; }
            });
            const shouldBeVisible = categoryMatch && (searchQuery === "" || matchingPillsInCard > 0);
            if (shouldBeVisible) { card.style.display = "flex"; visibleCardsCount++; }
            else { card.style.display = "none"; }
        });
        if (visibleCardsCount === 0) {
            noResultsState.style.display = "block";
            document.getElementById("topics-grid").style.display = "none";
        } else {
            noResultsState.style.display = "none";
            document.getElementById("topics-grid").style.display = "grid";
        }
    }
    if (searchInput) searchInput.addEventListener("input", (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        clearBtn.style.display = searchQuery.length > 0 ? "block" : "none";
        applyFilters();
    });
    if (clearBtn) clearBtn.addEventListener("click", () => {
        searchInput.value = ""; searchQuery = "";
        clearBtn.style.display = "none"; searchInput.focus();
        applyFilters();
    });
    filterTabs.forEach(tab => {
        tab.addEventListener("click", () => {
            filterTabs.forEach(t => { t.classList.remove("active"); t.setAttribute("aria-selected", "false"); });
            tab.classList.add("active"); tab.setAttribute("aria-selected", "true");
            currentCategory = tab.getAttribute("data-category"); applyFilters();
        });
    });
    if (resetBtn) resetBtn.addEventListener("click", () => {
        searchInput.value = ""; searchQuery = ""; clearBtn.style.display = "none";
        currentCategory = "all";
        filterTabs.forEach(t => {
            t.classList.remove("active"); t.setAttribute("aria-selected", "false");
            if (t.getAttribute("data-category") === "all") { t.classList.add("active"); t.setAttribute("aria-selected", "true"); }
        });
        applyFilters();
    });
});
</script>
</main>

<?php
// Include the footer file
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>

