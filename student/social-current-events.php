<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Current Events Analysis - Hesten's Learning";
$pageDescription = "Stay informed and critically analyze global and national events shaping our world.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Current Events Analysis</h1>
    <p class="resource-subtitle">Stay informed and critically analyze global and national events shaping our world.</p>
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
            <!-- Weekly News Summaries -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-newspaper mr-2"></i></div><h2 class="resource-card-title">Weekly News Summaries</h2></div>
                    <p class="resource-card-desc">Concise summaries of major news stories from around the globe, updated weekly.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Global Headlines'); return false;" class="topic-pill" data-search-terms="global headlines">Global Headlines</button>
<button onclick="openDynamicModal('National News Digest'); return false;" class="topic-pill" data-search-terms="national news digest">National News Digest</button>
<button onclick="openDynamicModal('Science & Tech News'); return false;" class="topic-pill" data-search-terms="science & tech news">Science & Tech News</button>
<button onclick="openDynamicModal('Arts & Culture Highlights'); return false;" class="topic-pill" data-search-terms="arts & culture highlights">Arts & Culture Highlights</button>
</div>
                    <a href="#" class="card-action-btn">Read Weekly Summaries</a>
                </div>
            </div>

            <!-- Geopolitical Analysis -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-globe mr-2"></i></div><h2 class="resource-card-title">Geopolitical Analysis</h2></div>
                    <p class="resource-card-desc">In-depth analysis of international relations, conflicts, and political developments.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Middle East Conflicts'); return false;" class="topic-pill" data-search-terms="middle east conflicts">Middle East Conflicts</button>
<button onclick="openDynamicModal('US-China Relations'); return false;" class="topic-pill" data-search-terms="us-china relations">US-China Relations</button>
<button onclick="openDynamicModal('European Union Dynamics'); return false;" class="topic-pill" data-search-terms="european union dynamics">European Union Dynamics</button>
<button onclick="openDynamicModal('African Political Landscape'); return false;" class="topic-pill" data-search-terms="african political landscape">African Political Landscape</button>
</div>
                    <a href="#" class="card-action-btn">Analyze Geopolitics</a>
                </div>
            </div>

            <!-- Social Issues Discussions -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-comments mr-2"></i></div><h2 class="resource-card-title">Social Issues Discussions</h2></div>
                    <p class="resource-card-desc">Engage in thoughtful discussions on contemporary social challenges and movements.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Climate Justice'); return false;" class="topic-pill" data-search-terms="climate justice">Climate Justice</button>
<button onclick="openDynamicModal('Racial Equality'); return false;" class="topic-pill" data-search-terms="racial equality">Racial Equality</button>
<button onclick="openDynamicModal('Gender Equity'); return false;" class="topic-pill" data-search-terms="gender equity">Gender Equity</button>
<button onclick="openDynamicModal('Poverty & Inequality'); return false;" class="topic-pill" data-search-terms="poverty & inequality">Poverty & Inequality</button>
</div>
                    <a href="#" class="card-action-btn">Discuss Social Issues</a>
                </div>
            </div>

            <!-- Economic Trends -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-chart-line mr-2"></i></div><h2 class="resource-card-title">Economic Trends</h2></div>
                    <p class="resource-card-desc">Understand current economic indicators, market changes, and their global impact.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Inflation & Interest Rates'); return false;" class="topic-pill" data-search-terms="inflation & interest rates">Inflation & Interest Rates</button>
<button onclick="openDynamicModal('Stock Market Updates'); return false;" class="topic-pill" data-search-terms="stock market updates">Stock Market Updates</button>
<button onclick="openDynamicModal('Global Trade Agreements'); return false;" class="topic-pill" data-search-terms="global trade agreements">Global Trade Agreements</button>
<button onclick="openDynamicModal('Labor Market Analysis'); return false;" class="topic-pill" data-search-terms="labor market analysis">Labor Market Analysis</button>
</div>
                    <a href="#" class="card-action-btn">Monitor Economic Trends</a>
                </div>
            </div>

            <!-- Science & Technology in News -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-robot mr-2"></i></div><h2 class="resource-card-title">Science & Technology in News</h2></div>
                    <p class="resource-card-desc">Explore how scientific discoveries and technological innovations are reported and discussed.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('AI Ethics Debates'); return false;" class="topic-pill" data-search-terms="ai ethics debates">AI Ethics Debates</button>
<button onclick="openDynamicModal('Space Exploration News'); return false;" class="topic-pill" data-search-terms="space exploration news">Space Exploration News</button>
<button onclick="openDynamicModal('Biotechnology Advancements'); return false;" class="topic-pill" data-search-terms="biotechnology advancements">Biotechnology Advancements</button>
<button onclick="openDynamicModal('Quantum Computing'); return false;" class="topic-pill" data-search-terms="quantum computing">Quantum Computing</button>
</div>
                    <a href="#" class="card-action-btn">Follow Science & Tech News</a>
                </div>
            </div>

            <!-- Historical Context of Current Events -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-history mr-2"></i></div><h2 class="resource-card-title">Historical Context of Current Events</h2></div>
                    <p class="resource-card-desc">Understand present-day events by examining their historical roots and precedents.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Historical Roots of Conflicts'); return false;" class="topic-pill" data-search-terms="historical roots of conflicts">Historical Roots of Conflicts</button>
<button onclick="openDynamicModal('Evolution of Civil Rights'); return false;" class="topic-pill" data-search-terms="evolution of civil rights">Evolution of Civil Rights</button>
<button onclick="openDynamicModal('Economic Crises History'); return false;" class="topic-pill" data-search-terms="economic crises history">Economic Crises History</button>
<button onclick="openDynamicModal('Impact of Past Policies'); return false;" class="topic-pill" data-search-terms="impact of past policies">Impact of Past Policies</button>
</div>
                    <a href="#" class="card-action-btn">Connect Past & Present</a>
                </div>
            </div>
        </div>

        <!-- New Feature: Article Summarizer -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-2xl font-bold text-primary mb-4"><i class="fas fa-file-alt mr-2"></i>Article Summarizer ✨</h2>
            <p class="resource-card-desc">Paste a news article or any text below, and I'll provide a concise summary for you.</p>
            <textarea id="article-text" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary mb-4" rows="10" placeholder="Paste your article text here..."></textarea>
            <button id="summarize-button" class="px-6 py-3 bg-secondary text-white rounded-md font-semibold hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary transition-colors duration-200">
                <i class="fas fa-magic mr-2"></i> Summarize Article
            </button>
            <div id="summary-output" class="bg-light p-4 rounded-md mt-6 text-dark hidden">
                <p class="font-semibold text-grayish mb-2">Summary:</p>
                <div id="summary-content"></div>
                <div id="loading-indicator" class="text-center mt-4 hidden">
                    <i class="fas fa-spinner fa-spin text-primary text-2xl"></i>
                    <p class="text-grayish">Generating summary...</p>
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

