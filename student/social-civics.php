<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Civics & Government - Hesten's Learning";
$pageDescription = "Understand the foundations of government, citizenship, and legal systems.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Civics & Government</h1>
    <p class="resource-subtitle">Understand the foundations of government, citizenship, and legal systems.</p>
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
            <!-- Branches of Government -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-gavel mr-2"></i></div><h2 class="resource-card-title">Branches of Government</h2></div>
                    <p class="resource-card-desc">Learn about the legislative, executive, and judicial branches and their roles.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Legislative Branch'); return false;" class="topic-pill" data-search-terms="legislative branch">Legislative Branch</button>
<button onclick="openDynamicModal('Executive Branch'); return false;" class="topic-pill" data-search-terms="executive branch">Executive Branch</button>
<button onclick="openDynamicModal('Judicial Branch'); return false;" class="topic-pill" data-search-terms="judicial branch">Judicial Branch</button>
<button onclick="openDynamicModal('Checks and Balances'); return false;" class="topic-pill" data-search-terms="checks and balances">Checks and Balances</button>
</div>
                    <a href="#" class="card-action-btn">Explore Branches</a>
                </div>
            </div>

            <!-- Citizenship Rights & Duties -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-user-check mr-2"></i></div><h2 class="resource-card-title">Citizenship Rights & Duties</h2></div>
                    <p class="resource-card-desc">Understand your rights and responsibilities as a citizen in a democratic society.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Bill of Rights'); return false;" class="topic-pill" data-search-terms="bill of rights">Bill of Rights</button>
<button onclick="openDynamicModal('Civic Participation'); return false;" class="topic-pill" data-search-terms="civic participation">Civic Participation</button>
<button onclick="openDynamicModal('Voting & Elections'); return false;" class="topic-pill" data-search-terms="voting & elections">Voting & Elections</button>
<button onclick="openDynamicModal('Community Involvement'); return false;" class="topic-pill" data-search-terms="community involvement">Community Involvement</button>
</div>
                    <a href="#" class="card-action-btn">Learn About Citizenship</a>
                </div>
            </div>

            <!-- Constitutional Law -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-book-law mr-2"></i></div><h2 class="resource-card-title">Constitutional Law</h2></div>
                    <p class="resource-card-desc">Delve into the US Constitution, its amendments, and landmark Supreme Court cases.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Articles of Confederation'); return false;" class="topic-pill" data-search-terms="articles of confederation">Articles of Confederation</button>
<button onclick="openDynamicModal('Constitutional Amendments'); return false;" class="topic-pill" data-search-terms="constitutional amendments">Constitutional Amendments</button>
<button onclick="openDynamicModal('Landmark Supreme Court Cases'); return false;" class="topic-pill" data-search-terms="landmark supreme court cases">Landmark Supreme Court Cases</button>
<button onclick="openDynamicModal('Federalism'); return false;" class="topic-pill" data-search-terms="federalism">Federalism</button>
</div>
                    <a href="#" class="card-action-btn">Study Constitutional Law</a>
                </div>
            </div>

            <!-- Electoral Process -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-vote-yea mr-2"></i></div><h2 class="resource-card-title">Electoral Process</h2></div>
                    <p class="resource-card-desc">Understand how elections work, from primary elections to the Electoral College.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Primary Elections'); return false;" class="topic-pill" data-search-terms="primary elections">Primary Elections</button>
<button onclick="openDynamicModal('General Elections'); return false;" class="topic-pill" data-search-terms="general elections">General Elections</button>
<button onclick="openDynamicModal('Electoral College Explained'); return false;" class="topic-pill" data-search-terms="electoral college explained">Electoral College Explained</button>
<button onclick="openDynamicModal('Campaign Finance'); return false;" class="topic-pill" data-search-terms="campaign finance">Campaign Finance</button>
</div>
                    <a href="#" class="card-action-btn">Understand Elections</a>
                </div>
            </div>

            <!-- Public Policy -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-handshake mr-2"></i></div><h2 class="resource-card-title">Public Policy</h2></div>
                    <p class="resource-card-desc">Examine how laws are made and how government policies impact society.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Policy Making Process'); return false;" class="topic-pill" data-search-terms="policy making process">Policy Making Process</button>
<button onclick="openDynamicModal('Social Policy'); return false;" class="topic-pill" data-search-terms="social policy">Social Policy</button>
<button onclick="openDynamicModal('Economic Policy'); return false;" class="topic-pill" data-search-terms="economic policy">Economic Policy</button>
<button onclick="openDynamicModal('Foreign Policy'); return false;" class="topic-pill" data-search-terms="foreign policy">Foreign Policy</button>
</div>
                    <a href="#" class="card-action-btn">Explore Public Policy</a>
                </div>
            </div>

            <!-- International Relations -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-globe mr-2"></i></div><h2 class="resource-card-title">International Relations</h2></div>
                    <p class="resource-card-desc">Study how nations interact, including diplomacy, international organizations, and global conflicts.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('United Nations'); return false;" class="topic-pill" data-search-terms="united nations">United Nations</button>
<button onclick="openDynamicModal('International Law'); return false;" class="topic-pill" data-search-terms="international law">International Law</button>
<button onclick="openDynamicModal('Diplomacy & Treaties'); return false;" class="topic-pill" data-search-terms="diplomacy & treaties">Diplomacy & Treaties</button>
<button onclick="openDynamicModal('Global Conflicts'); return false;" class="topic-pill" data-search-terms="global conflicts">Global Conflicts</button>
</div>
                    <a href="#" class="card-action-btn">Learn International Relations</a>
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

