<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Social Studies Resources - Hesten's Learning";
$pageDescription = "Discover the past, understand the present, and shape the future with our social studies resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Social Studies Resources</h1>
    <p class="resource-subtitle">Discover the past, understand the present, and shape the future with our social studies resources.</p>
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
            <!-- History Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-landmark mr-2"></i></div><h2 class="resource-card-title">History Resources</h2></div>
                    <p class="resource-card-desc">Journey through time with historical documents, timelines, and analyses of major events.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Ancient Civilizations'); return false;" class="topic-pill" data-search-terms="ancient civilizations">Ancient Civilizations</button>
<button onclick="openDynamicModal('World History Timelines'); return false;" class="topic-pill" data-search-terms="world history timelines">World History Timelines</button>
<button onclick="openDynamicModal('US History Documents'); return false;" class="topic-pill" data-search-terms="us history documents">US History Documents</button>
<button onclick="openDynamicModal('Historical Figures'); return false;" class="topic-pill" data-search-terms="historical figures">Historical Figures</button>
</div>
                    <a href="/social-history.php" class="card-action-btn">Explore History</a>
                </div>
            </div>

            <!-- Geography Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-map-marked-alt mr-2"></i></div><h2 class="resource-card-title">Geography Resources</h2></div>
                    <p class="resource-card-desc">Learn about the world's physical and human geography with interactive maps and data.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('World Maps & Atlases'); return false;" class="topic-pill" data-search-terms="world maps & atlases">World Maps & Atlases</button>
<button onclick="openDynamicModal('Physical Geography'); return false;" class="topic-pill" data-search-terms="physical geography">Physical Geography</button>
<button onclick="openDynamicModal('Human Geography'); return false;" class="topic-pill" data-search-terms="human geography">Human Geography</button>
<button onclick="openDynamicModal('Geographic Data Analysis'); return false;" class="topic-pill" data-search-terms="geographic data analysis">Geographic Data Analysis</button>
</div>
                    <a href="/social-maps.php" class="card-action-btn">Discover Geography</a>
                </div>
            </div>

            <!-- Civics & Government -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-balance-scale mr-2"></i></div><h2 class="resource-card-title">Civics & Government</h2></div>
                    <p class="resource-card-desc">Understand the principles of government, citizenship, and law with our civics resources.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Branches of Government'); return false;" class="topic-pill" data-search-terms="branches of government">Branches of Government</button>
<button onclick="openDynamicModal('Citizenship Rights & Duties'); return false;" class="topic-pill" data-search-terms="citizenship rights & duties">Citizenship Rights & Duties</button>
<button onclick="openDynamicModal('Constitutional Law'); return false;" class="topic-pill" data-search-terms="constitutional law">Constitutional Law</button>
<button onclick="openDynamicModal('Electoral Process'); return false;" class="topic-pill" data-search-terms="electoral process">Electoral Process</button>
</div>
                    <a href="/social-civics.php" class="card-action-btn">Learn Civics</a>
                </div>
            </div>

            <!-- Economics Resources -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-money-bill-wave mr-2"></i></div><h2 class="resource-card-title">Economics Resources</h2></div>
                    <p class="resource-card-desc">Gain insights into economic principles, markets, and global economic systems.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Microeconomics Basics'); return false;" class="topic-pill" data-search-terms="microeconomics basics">Microeconomics Basics</button>
<button onclick="openDynamicModal('Macroeconomics Overview'); return false;" class="topic-pill" data-search-terms="macroeconomics overview">Macroeconomics Overview</button>
<button onclick="openDynamicModal('Supply and Demand'); return false;" class="topic-pill" data-search-terms="supply and demand">Supply and Demand</button>
<button onclick="openDynamicModal('Global Economy'); return false;" class="topic-pill" data-search-terms="global economy">Global Economy</button>
</div>
                    <a href="#" class="card-action-btn">Study Economics</a>
                </div>
            </div>

            <!-- Current Events Analysis -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-globe mr-2"></i></div><h2 class="resource-card-title">Current Events Analysis</h2></div>
                    <p class="resource-card-desc">Stay informed about global and national events with analytical articles and discussion prompts.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Weekly News Summaries'); return false;" class="topic-pill" data-search-terms="weekly news summaries">Weekly News Summaries</button>
<button onclick="openDynamicModal('Geopolitical Analysis'); return false;" class="topic-pill" data-search-terms="geopolitical analysis">Geopolitical Analysis</button>
<button onclick="openDynamicModal('Social Issues Discussions'); return false;" class="topic-pill" data-search-terms="social issues discussions">Social Issues Discussions</button>
<button onclick="openDynamicModal('Economic Trends'); return false;" class="topic-pill" data-search-terms="economic trends">Economic Trends</button>
</div>
                    <a href="/social-current-events.php" class="card-action-btn">Analyze Current Events</a>
                </div>
            </div>

            <!-- Cultural Studies -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-users mr-2"></i></div><h2 class="resource-card-title">Cultural Studies</h2></div>
                    <p class="resource-card-desc">Explore diverse cultures, traditions, and societal structures from around the world.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('World Cultures'); return false;" class="topic-pill" data-search-terms="world cultures">World Cultures</button>
<button onclick="openDynamicModal('Sociology Basics'); return false;" class="topic-pill" data-search-terms="sociology basics">Sociology Basics</button>
<button onclick="openDynamicModal('Anthropology Insights'); return false;" class="topic-pill" data-search-terms="anthropology insights">Anthropology Insights</button>
<button onclick="openDynamicModal('Global Traditions'); return false;" class="topic-pill" data-search-terms="global traditions">Global Traditions</button>
</div>
                    <a href="#" class="card-action-btn">Explore Cultures</a>
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

