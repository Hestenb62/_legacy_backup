<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Diagrams & Models - Hesten's Learning";
$pageDescription = "Visualize complex scientific concepts with our collection of detailed diagrams, interactive models, and 3D representations.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Science Diagrams & Models</h1>
    <p class="resource-subtitle">Visualize complex scientific concepts with our collection of detailed diagrams, interactive models, and 3D representations.</p>
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
            <!-- Biology Diagrams -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-microscope mr-2"></i></div><h2 class="resource-card-title">Biology Diagrams</h2></div>
                    <p class="resource-card-desc">Explore intricate biological structures and processes through clear and labeled diagrams.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Animal Cell Diagram'); return false;" class="topic-pill" data-search-terms="animal cell diagram">Animal Cell Diagram</button>
<button onclick="openDynamicModal('Plant Anatomy'); return false;" class="topic-pill" data-search-terms="plant anatomy">Plant Anatomy</button>
<button onclick="openDynamicModal('Human Organ Systems'); return false;" class="topic-pill" data-search-terms="human organ systems">Human Organ Systems</button>
<button onclick="openDynamicModal('Food Web & Chains'); return false;" class="topic-pill" data-search-terms="food web & chains">Food Web & Chains</button>
</div>
                    <a href="#" class="card-action-btn">View Biology Diagrams</a>
                </div>
            </div>

            <!-- Chemistry Models -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-flask mr-2"></i></div><h2 class="resource-card-title">Chemistry Models</h2></div>
                    <p class="resource-card-desc">Understand atomic structures, molecular bonds, and chemical reactions with interactive models.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Atomic Structure Model'); return false;" class="topic-pill" data-search-terms="atomic structure model">Atomic Structure Model</button>
<button onclick="openDynamicModal('Molecular Geometry'); return false;" class="topic-pill" data-search-terms="molecular geometry">Molecular Geometry</button>
<button onclick="openDynamicModal('Chemical Reaction Animations'); return false;" class="topic-pill" data-search-terms="chemical reaction animations">Chemical Reaction Animations</button>
<button onclick="openDynamicModal('Periodic Table Visualizer'); return false;" class="topic-pill" data-search-terms="periodic table visualizer">Periodic Table Visualizer</button>
</div>
                    <a href="#" class="card-action-btn">Explore Chemistry Models</a>
                </div>
            </div>

            <!-- Physics Diagrams -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-atom mr-2"></i></div><h2 class="resource-card-title">Physics Diagrams</h2></div>
                    <p class="resource-card-desc">Visualize forces, circuits, waves, and other physics phenomena through clear diagrams.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Force Diagrams'); return false;" class="topic-pill" data-search-terms="force diagrams">Force Diagrams</button>
<button onclick="openDynamicModal('Electric Circuits'); return false;" class="topic-pill" data-search-terms="electric circuits">Electric Circuits</button>
<button onclick="openDynamicModal('Light Spectrum Diagram'); return false;" class="topic-pill" data-search-terms="light spectrum diagram">Light Spectrum Diagram</button>
<button onclick="openDynamicModal('Wave Properties'); return false;" class="topic-pill" data-search-terms="wave properties">Wave Properties</button>
</div>
                    <a href="#" class="card-action-btn">View Physics Diagrams</a>
                </div>
            </div>

            <!-- Earth Science Models -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-globe-americas mr-2"></i></div><h2 class="resource-card-title">Earth Science Models</h2></div>
                    <p class="resource-card-desc">Understand geological processes, weather systems, and celestial mechanics with interactive models.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Rock Cycle Model'); return false;" class="topic-pill" data-search-terms="rock cycle model">Rock Cycle Model</button>
<button onclick="openDynamicModal('Water Cycle Diagram'); return false;" class="topic-pill" data-search-terms="water cycle diagram">Water Cycle Diagram</button>
<button onclick="openDynamicModal('Plate Tectonics Map'); return false;" class="topic-pill" data-search-terms="plate tectonics map">Plate Tectonics Map</button>
<button onclick="openDynamicModal('Solar System Model'); return false;" class="topic-pill" data-search-terms="solar system model">Solar System Model</button>
</div>
                    <a href="#" class="card-action-btn">Explore Earth Science Models</a>
                </div>
            </div>

            <!-- Anatomy & Physiology Visuals -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-user-md mr-2"></i></div><h2 class="resource-card-title">Anatomy & Physiology Visuals</h2></div>
                    <p class="resource-card-desc">Detailed diagrams and 3D models of the human body and its systems.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Skeletal System'); return false;" class="topic-pill" data-search-terms="skeletal system">Skeletal System</button>
<button onclick="openDynamicModal('Muscular System'); return false;" class="topic-pill" data-search-terms="muscular system">Muscular System</button>
<button onclick="openDynamicModal('Circulatory System'); return false;" class="topic-pill" data-search-terms="circulatory system">Circulatory System</button>
<button onclick="openDynamicModal('Nervous System'); return false;" class="topic-pill" data-search-terms="nervous system">Nervous System</button>
</div>
                    <a href="#" class="card-action-btn">View Anatomy Visuals</a>
                </div>
            </div>

            <!-- Scientific Process Diagrams -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-chart-flow mr-2"></i></div><h2 class="resource-card-title">Scientific Process Diagrams</h2></div>
                    <p class="resource-card-desc">Flowcharts and diagrams explaining the scientific method and experimental design.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Scientific Method Steps'); return false;" class="topic-pill" data-search-terms="scientific method steps">Scientific Method Steps</button>
<button onclick="openDynamicModal('Experimental Design Flowchart'); return false;" class="topic-pill" data-search-terms="experimental design flowchart">Experimental Design Flowchart</button>
<button onclick="openDynamicModal('Data Analysis Process'); return false;" class="topic-pill" data-search-terms="data analysis process">Data Analysis Process</button>
<button onclick="openDynamicModal('Peer Review Process'); return false;" class="topic-pill" data-search-terms="peer review process">Peer Review Process</button>
</div>
                    <a href="#" class="card-action-btn">Understand Scientific Process</a>
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

