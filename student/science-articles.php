<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Articles & News - Hesten's Learning";
$pageDescription = "Stay informed with the latest scientific discoveries, research, and news from various fields.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Science Articles & News</h1>
    <p class="resource-subtitle">Stay informed with the latest scientific discoveries, research, and news from various fields.</p>
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
            <!-- Latest Discoveries -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-lightbulb mr-2"></i></div><h2 class="resource-card-title">Latest Discoveries</h2></div>
                    <p class="resource-card-desc">Read about groundbreaking research and recent advancements across all scientific disciplines.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Breakthroughs in Medicine'); return false;" class="topic-pill" data-search-terms="breakthroughs in medicine">Breakthroughs in Medicine</button>
<button onclick="openDynamicModal('New Physics Theories'); return false;" class="topic-pill" data-search-terms="new physics theories">New Physics Theories</button>
<button onclick="openDynamicModal('Astronomical Discoveries'); return false;" class="topic-pill" data-search-terms="astronomical discoveries">Astronomical Discoveries</button>
<button onclick="openDynamicModal('Genetic Engineering Updates'); return false;" class="topic-pill" data-search-terms="genetic engineering updates">Genetic Engineering Updates</button>
</div>
                    <a href="#" class="card-action-btn">View Latest Discoveries</a>
                </div>
            </div>

            <!-- Environmental Science News -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-globe-europe mr-2"></i></div><h2 class="resource-card-title">Environmental Science News</h2></div>
                    <p class="resource-card-desc">Stay updated on climate change, conservation efforts, and environmental policies worldwide.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Climate Change Reports'); return false;" class="topic-pill" data-search-terms="climate change reports">Climate Change Reports</button>
<button onclick="openDynamicModal('Conservation Success Stories'); return false;" class="topic-pill" data-search-terms="conservation success stories">Conservation Success Stories</button>
<button onclick="openDynamicModal('Renewable Energy Innovations'); return false;" class="topic-pill" data-search-terms="renewable energy innovations">Renewable Energy Innovations</button>
<button onclick="openDynamicModal('Pollution Control Efforts'); return false;" class="topic-pill" data-search-terms="pollution control efforts">Pollution Control Efforts</button>
</div>
                    <a href="#" class="card-action-btn">Read Environmental News</a>
                </div>
            </div>

            <!-- Space Exploration Articles -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-space-shuttle mr-2"></i></div><h2 class="resource-card-title">Space Exploration Articles</h2></div>
                    <p class="resource-card-desc">Journey to the stars with articles on space missions, astronomical phenomena, and cosmic mysteries.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Mars Missions Updates'); return false;" class="topic-pill" data-search-terms="mars missions updates">Mars Missions Updates</button>
<button onclick="openDynamicModal('Black Holes Explained'); return false;" class="topic-pill" data-search-terms="black holes explained">Black Holes Explained</button>
<button onclick="openDynamicModal('Exoplanet Discoveries'); return false;" class="topic-pill" data-search-terms="exoplanet discoveries">Exoplanet Discoveries</button>
<button onclick="openDynamicModal('Future of Space Travel'); return false;" class="topic-pill" data-search-terms="future of space travel">Future of Space Travel</button>
</div>
                    <a href="#" class="card-action-btn">Explore Space Articles</a>
                </div>
            </div>

            <!-- Health & Medicine Updates -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-heartbeat mr-2"></i></div><h2 class="resource-card-title">Health & Medicine Updates</h2></div>
                    <p class="resource-card-desc">Get the latest news on medical research, health trends, and breakthroughs in healthcare.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Vaccine Development'); return false;" class="topic-pill" data-search-terms="vaccine development">Vaccine Development</button>
<button onclick="openDynamicModal('Disease Research'); return false;" class="topic-pill" data-search-terms="disease research">Disease Research</button>
<button onclick="openDynamicModal('Nutrition & Wellness'); return false;" class="topic-pill" data-search-terms="nutrition & wellness">Nutrition & Wellness</button>
<button onclick="openDynamicModal('Mental Health Awareness'); return false;" class="topic-pill" data-search-terms="mental health awareness">Mental Health Awareness</button>
</div>
                    <a href="#" class="card-action-btn">Read Health News</a>
                </div>
            </div>

            <!-- Technology & Innovation -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-microchip mr-2"></i></div><h2 class="resource-card-title">Technology & Innovation</h2></div>
                    <p class="resource-card-desc">Discover the newest technological advancements and their impact on society.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Artificial Intelligence'); return false;" class="topic-pill" data-search-terms="artificial intelligence">Artificial Intelligence</button>
<button onclick="openDynamicModal('Robotics & Automation'); return false;" class="topic-pill" data-search-terms="robotics & automation">Robotics & Automation</button>
<button onclick="openDynamicModal('Biotechnology'); return false;" class="topic-pill" data-search-terms="biotechnology">Biotechnology</button>
<button onclick="openDynamicModal('Quantum Computing'); return false;" class="topic-pill" data-search-terms="quantum computing">Quantum Computing</button>
</div>
                    <a href="#" class="card-action-btn">Explore Tech News</a>
                </div>
            </div>

            <!-- Science History -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-history mr-2"></i></div><h2 class="resource-card-title">Science History</h2></div>
                    <p class="resource-card-desc">Learn about the great scientists and pivotal moments that shaped our scientific understanding.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Famous Scientists'); return false;" class="topic-pill" data-search-terms="famous scientists">Famous Scientists</button>
<button onclick="openDynamicModal('Key Scientific Discoveries'); return false;" class="topic-pill" data-search-terms="key scientific discoveries">Key Scientific Discoveries</button>
<button onclick="openDynamicModal('Evolution of Theories'); return false;" class="topic-pill" data-search-terms="evolution of theories">Evolution of Theories</button>
<button onclick="openDynamicModal('Nobel Prize Winners'); return false;" class="topic-pill" data-search-terms="nobel prize winners">Nobel Prize Winners</button>
</div>
                    <a href="#" class="card-action-btn">Discover Science History</a>
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

