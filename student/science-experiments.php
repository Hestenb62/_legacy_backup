<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Experiments - Hesten's Learning";
$pageDescription = "Engage with hands-on and virtual science experiments to deepen your understanding.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Science Experiments</h1>
    <p class="resource-subtitle">Engage with hands-on and virtual science experiments to deepen your understanding.</p>
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
            <!-- Biology Labs -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-dna mr-2"></i></div><h2 class="resource-card-title">Biology Labs</h2></div>
                    <p class="resource-card-desc">Explore the living world through interactive virtual labs and easy-to-do home experiments.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Plant Cell Observation'); return false;" class="topic-pill" data-search-terms="plant cell observation">Plant Cell Observation</button>
<button onclick="openDynamicModal('DNA Extraction at Home'); return false;" class="topic-pill" data-search-terms="dna extraction at home">DNA Extraction at Home</button>
<button onclick="openDynamicModal('Ecosystem Simulation'); return false;" class="topic-pill" data-search-terms="ecosystem simulation">Ecosystem Simulation</button>
<button onclick="openDynamicModal('Virtual Dissection'); return false;" class="topic-pill" data-search-terms="virtual dissection">Virtual Dissection</button>
</div>
                    <a href="#" class="card-action-btn">Start Biology Experiments</a>
                </div>
            </div>

            <!-- Chemistry Demos -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-fire mr-2"></i></div><h2 class="resource-card-title">Chemistry Demos</h2></div>
                    <p class="resource-card-desc">Witness chemical reactions and explore properties of matter with exciting demonstrations.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Volcano Eruption'); return false;" class="topic-pill" data-search-terms="volcano eruption">Volcano Eruption</button>
<button onclick="openDynamicModal('Invisible Ink'); return false;" class="topic-pill" data-search-terms="invisible ink">Invisible Ink</button>
<button onclick="openDynamicModal('Density Tower'); return false;" class="topic-pill" data-search-terms="density tower">Density Tower</button>
<button onclick="openDynamicModal('Crystal Growing'); return false;" class="topic-pill" data-search-terms="crystal growing">Crystal Growing</button>
</div>
                    <a href="#" class="card-action-btn">View Chemistry Demos</a>
                </div>
            </div>

            <!-- Physics Simulations -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-rocket mr-2"></i></div><h2 class="resource-card-title">Physics Simulations</h2></div>
                    <p class="resource-card-desc">Interact with simulations to understand concepts like motion, energy, and electricity.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Projectile Motion'); return false;" class="topic-pill" data-search-terms="projectile motion">Projectile Motion</button>
<button onclick="openDynamicModal('Circuit Builder'); return false;" class="topic-pill" data-search-terms="circuit builder">Circuit Builder</button>
<button onclick="openDynamicModal('Wave Generator'); return false;" class="topic-pill" data-search-terms="wave generator">Wave Generator</button>
<button onclick="openDynamicModal('Gravity Simulator'); return false;" class="topic-pill" data-search-terms="gravity simulator">Gravity Simulator</button>
</div>
                    <a href="#" class="card-action-btn">Run Physics Simulations</a>
                </div>
            </div>

            <!-- Earth Science Activities -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-globe-americas mr-2"></i></div><h2 class="resource-card-title">Earth Science Activities</h2></div>
                    <p class="resource-card-desc">Engage in activities that explore geology, weather patterns, and space phenomena.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Rock Cycle Model'); return false;" class="topic-pill" data-search-terms="rock cycle model">Rock Cycle Model</button>
<button onclick="openDynamicModal('Weather Forecasting Game'); return false;" class="topic-pill" data-search-terms="weather forecasting game">Weather Forecasting Game</button>
<button onclick="openDynamicModal('Plate Tectonics Demo'); return false;" class="topic-pill" data-search-terms="plate tectonics demo">Plate Tectonics Demo</button>
<button onclick="openDynamicModal('Solar System Builder'); return false;" class="topic-pill" data-search-terms="solar system builder">Solar System Builder</button>
</div>
                    <a href="#" class="card-action-btn">Do Earth Science Activities</a>
                </div>
            </div>

            <!-- Environmental Science Projects -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-recycle mr-2"></i></div><h2 class="resource-card-title">Environmental Science Projects</h2></div>
                    <p class="resource-card-desc">Participate in projects that promote environmental awareness and sustainability.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Water Quality Testing'); return false;" class="topic-pill" data-search-terms="water quality testing">Water Quality Testing</button>
<button onclick="openDynamicModal('Composting Project'); return false;" class="topic-pill" data-search-terms="composting project">Composting Project</button>
<button onclick="openDynamicModal('Renewable Energy Model'); return false;" class="topic-pill" data-search-terms="renewable energy model">Renewable Energy Model</button>
<button onclick="openDynamicModal('Pollution Impact Study'); return false;" class="topic-pill" data-search-terms="pollution impact study">Pollution Impact Study</button>
</div>
                    <a href="#" class="card-action-btn">Start Environmental Projects</a>
                </div>
            </div>

            <!-- Forensic Science Challenges -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-fingerprint mr-2"></i></div><h2 class="resource-card-title">Forensic Science Challenges</h2></div>
                    <p class="resource-card-desc">Solve mysteries using scientific principles in engaging forensic science challenges.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Fingerprint Analysis'); return false;" class="topic-pill" data-search-terms="fingerprint analysis">Fingerprint Analysis</button>
<button onclick="openDynamicModal('DNA Evidence Matching'); return false;" class="topic-pill" data-search-terms="dna evidence matching">DNA Evidence Matching</button>
<button onclick="openDynamicModal('Chemical Trace Analysis'); return false;" class="topic-pill" data-search-terms="chemical trace analysis">Chemical Trace Analysis</button>
<button onclick="openDynamicModal('Crime Scene Reconstruction'); return false;" class="topic-pill" data-search-terms="crime scene reconstruction">Crime Scene Reconstruction</button>
</div>
                    <a href="#" class="card-action-btn">Tackle Forensic Challenges</a>
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

