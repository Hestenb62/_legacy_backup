<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Resources - Hesten's Learning";
$pageDescription = "Explore the wonders of the natural world with our engaging science resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Science Resources</h1>
    <p class="resource-subtitle">Explore the wonders of the natural world with our engaging science resources.</p>
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
            <!-- Biology Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-leaf mr-2"></i></div><h2 class="resource-card-title">Biology Resources</h2></div>
                    <p class="resource-card-desc">Dive into the study of life with resources on cells, genetics, ecosystems, and human anatomy.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Cell Biology'); return false;" class="topic-pill" data-search-terms="cell biology">Cell Biology</button>
<button onclick="openDynamicModal('Genetics & Heredity'); return false;" class="topic-pill" data-search-terms="genetics & heredity">Genetics & Heredity</button>
<button onclick="openDynamicModal('Ecology & Environment'); return false;" class="topic-pill" data-search-terms="ecology & environment">Ecology & Environment</button>
<button onclick="openDynamicModal('Human Body Systems'); return false;" class="topic-pill" data-search-terms="human body systems">Human Body Systems</button>
</div>
                    <a href="#" class="card-action-btn">Explore Biology</a>
                </div>
            </div>

            <!-- Chemistry Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-atom mr-2"></i></div><h2 class="resource-card-title">Chemistry Resources</h2></div>
                    <p class="resource-card-desc">Unravel the mysteries of matter and its properties with our chemistry guides and experiments.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Periodic Table'); return false;" class="topic-pill" data-search-terms="periodic table">Periodic Table</button>
<button onclick="openDynamicModal('Chemical Reactions'); return false;" class="topic-pill" data-search-terms="chemical reactions">Chemical Reactions</button>
<button onclick="openDynamicModal('Acids and Bases'); return false;" class="topic-pill" data-search-terms="acids and bases">Acids and Bases</button>
<button onclick="openDynamicModal('Organic Chemistry Basics'); return false;" class="topic-pill" data-search-terms="organic chemistry basics">Organic Chemistry Basics</button>
</div>
                    <a href="#" class="card-action-btn">Discover Chemistry</a>
                </div>
            </div>

            <!-- Physics Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-atom mr-2"></i></div><h2 class="resource-card-title">Physics Resources</h2></div>
                    <p class="resource-card-desc">Understand the fundamental laws of the universe with resources on motion, energy, and forces.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Mechanics'); return false;" class="topic-pill" data-search-terms="mechanics">Mechanics</button>
<button onclick="openDynamicModal('Electricity & Magnetism'); return false;" class="topic-pill" data-search-terms="electricity & magnetism">Electricity & Magnetism</button>
<button onclick="openDynamicModal('Waves & Optics'); return false;" class="topic-pill" data-search-terms="waves & optics">Waves & Optics</button>
<button onclick="openDynamicModal('Thermodynamics'); return false;" class="topic-pill" data-search-terms="thermodynamics">Thermodynamics</button>
</div>
                    <a href="#" class="card-action-btn">Learn Physics</a>
                </div>
            </div>

            <!-- Earth Science Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-globe-europe mr-2"></i></div><h2 class="resource-card-title">Earth Science Resources</h2></div>
                    <p class="resource-card-desc">Explore our planet's geology, meteorology, oceanography, and astronomy.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Geology & Rocks'); return false;" class="topic-pill" data-search-terms="geology & rocks">Geology & Rocks</button>
<button onclick="openDynamicModal('Weather & Climate'); return false;" class="topic-pill" data-search-terms="weather & climate">Weather & Climate</button>
<button onclick="openDynamicModal('Oceanography'); return false;" class="topic-pill" data-search-terms="oceanography">Oceanography</button>
<button onclick="openDynamicModal('Astronomy & Space'); return false;" class="topic-pill" data-search-terms="astronomy & space">Astronomy & Space</button>
</div>
                    <a href="#" class="card-action-btn">Study Earth Science</a>
                </div>
            </div>

            <!-- Science Experiments -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-vial mr-2"></i></div><h2 class="resource-card-title">Science Experiments</h2></div>
                    <p class="resource-card-desc">Hands-on experiments and virtual labs to make science come alive.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Biology Labs'); return false;" class="topic-pill" data-search-terms="biology labs">Biology Labs</button>
<button onclick="openDynamicModal('Chemistry Demos'); return false;" class="topic-pill" data-search-terms="chemistry demos">Chemistry Demos</button>
<button onclick="openDynamicModal('Physics Simulations'); return false;" class="topic-pill" data-search-terms="physics simulations">Physics Simulations</button>
<button onclick="openDynamicModal('At-Home Experiments'); return false;" class="topic-pill" data-search-terms="at-home experiments">At-Home Experiments</button>
</div>
                    <a href="/science-experiments.php" class="card-action-btn">View Experiments</a>
                </div>
            </div>

            <!-- Science Articles & News -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-newspaper mr-2"></i></div><h2 class="resource-card-title">Science Articles & News</h2></div>
                    <p class="resource-card-desc">Stay updated with the latest scientific discoveries and read insightful articles.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Latest Discoveries'); return false;" class="topic-pill" data-search-terms="latest discoveries">Latest Discoveries</button>
<button onclick="openDynamicModal('Environmental Science News'); return false;" class="topic-pill" data-search-terms="environmental science news">Environmental Science News</button>
<button onclick="openDynamicModal('Space Exploration Articles'); return false;" class="topic-pill" data-search-terms="space exploration articles">Space Exploration Articles</button>
<button onclick="openDynamicModal('Health & Medicine Updates'); return false;" class="topic-pill" data-search-terms="health & medicine updates">Health & Medicine Updates</button>
</div>
                    <a href="/science-articles.php" class="card-action-btn">Read Articles</a>
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

