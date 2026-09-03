<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Quizzes - Hesten's Learning";
$pageDescription = "Test your scientific knowledge with our interactive quizzes covering various branches of science.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Science Quizzes</h1>
    <p class="resource-subtitle">Test your scientific knowledge with our interactive quizzes covering various branches of science.</p>
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
            <!-- Biology Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-dna mr-2"></i></div><h2 class="resource-card-title">Biology Quizzes</h2></div>
                    <p class="resource-card-desc">Challenge your understanding of living organisms, from cellular biology to ecosystems.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Cells & Organelles Quiz'); return false;" class="topic-pill" data-search-terms="cells & organelles quiz">Cells & Organelles Quiz</button>
<button onclick="openDynamicModal('Genetics Quiz'); return false;" class="topic-pill" data-search-terms="genetics quiz">Genetics Quiz</button>
<button onclick="openDynamicModal('Ecology & Biomes Quiz'); return false;" class="topic-pill" data-search-terms="ecology & biomes quiz">Ecology & Biomes Quiz</button>
<button onclick="openDynamicModal('Human Body Systems Quiz'); return false;" class="topic-pill" data-search-terms="human body systems quiz">Human Body Systems Quiz</button>
</div>
                    <a href="#" class="card-action-btn">Take Biology Quizzes</a>
                </div>
            </div>

            <!-- Chemistry Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-atom mr-2"></i></div><h2 class="resource-card-title">Chemistry Quizzes</h2></div>
                    <p class="resource-card-desc">Assess your knowledge of chemical elements, compounds, reactions, and states of matter.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Periodic Table Quiz'); return false;" class="topic-pill" data-search-terms="periodic table quiz">Periodic Table Quiz</button>
<button onclick="openDynamicModal('Chemical Bonding Quiz'); return false;" class="topic-pill" data-search-terms="chemical bonding quiz">Chemical Bonding Quiz</button>
<button onclick="openDynamicModal('Acids & Bases Quiz'); return false;" class="topic-pill" data-search-terms="acids & bases quiz">Acids & Bases Quiz</button>
<button onclick="openDynamicModal('Stoichiometry Quiz'); return false;" class="topic-pill" data-search-terms="stoichiometry quiz">Stoichiometry Quiz</button>
</div>
                    <a href="#" class="card-action-btn">Take Chemistry Quizzes</a>
                </div>
            </div>

            <!-- Physics Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-bolt mr-2"></i></div><h2 class="resource-card-title">Physics Quizzes</h2></div>
                    <p class="resource-card-desc">Test your understanding of fundamental physics principles, including motion, energy, and electricity.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Motion & Forces Quiz'); return false;" class="topic-pill" data-search-terms="motion & forces quiz">Motion & Forces Quiz</button>
<button onclick="openDynamicModal('Energy & Work Quiz'); return false;" class="topic-pill" data-search-terms="energy & work quiz">Energy & Work Quiz</button>
<button onclick="openDynamicModal('Electricity Quiz'); return false;" class="topic-pill" data-search-terms="electricity quiz">Electricity Quiz</button>
<button onclick="openDynamicModal('Waves & Sound Quiz'); return false;" class="topic-pill" data-search-terms="waves & sound quiz">Waves & Sound Quiz</button>
</div>
                    <a href="#" class="card-action-btn">Take Physics Quizzes</a>
                </div>
            </div>

            <!-- Earth Science Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-globe-europe mr-2"></i></div><h2 class="resource-card-title">Earth Science Quizzes</h2></div>
                    <p class="resource-card-desc">Evaluate your knowledge of geology, meteorology, oceanography, and astronomy.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Geology Quiz'); return false;" class="topic-pill" data-search-terms="geology quiz">Geology Quiz</button>
<button onclick="openDynamicModal('Weather & Climate Quiz'); return false;" class="topic-pill" data-search-terms="weather & climate quiz">Weather & Climate Quiz</button>
<button onclick="openDynamicModal('Oceanography Quiz'); return false;" class="topic-pill" data-search-terms="oceanography quiz">Oceanography Quiz</button>
<button onclick="openDynamicModal('Astronomy Quiz'); return false;" class="topic-pill" data-search-terms="astronomy quiz">Astronomy Quiz</button>
</div>
                    <a href="#" class="card-action-btn">Take Earth Science Quizzes</a>
                </div>
            </div>

            <!-- General Science Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-question mr-2"></i></div><h2 class="resource-card-title">General Science Quizzes</h2></div>
                    <p class="resource-card-desc">Broad quizzes covering a mix of scientific topics to test overall understanding.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Scientific Method Quiz'); return false;" class="topic-pill" data-search-terms="scientific method quiz">Scientific Method Quiz</button>
<button onclick="openDynamicModal('Famous Scientists Quiz'); return false;" class="topic-pill" data-search-terms="famous scientists quiz">Famous Scientists Quiz</button>
<button onclick="openDynamicModal('Science Terminology Quiz'); return false;" class="topic-pill" data-search-terms="science terminology quiz">Science Terminology Quiz</button>
<button onclick="openDynamicModal('Science Trivia'); return false;" class="topic-pill" data-search-terms="science trivia">Science Trivia</button>
</div>
                    <a href="#" class="card-action-btn">Take General Science Quizzes</a>
                </div>
            </div>

            <!-- Environmental Science Quizzes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon science"><i class="fas fa-recycle mr-2"></i></div><h2 class="resource-card-title">Environmental Science Quizzes</h2></div>
                    <p class="resource-card-desc">Quizzes focused on ecological principles, environmental issues, and sustainability.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Ecosystems Quiz'); return false;" class="topic-pill" data-search-terms="ecosystems quiz">Ecosystems Quiz</button>
<button onclick="openDynamicModal('Pollution & Conservation Quiz'); return false;" class="topic-pill" data-search-terms="pollution & conservation quiz">Pollution & Conservation Quiz</button>
<button onclick="openDynamicModal('Renewable Energy Quiz'); return false;" class="topic-pill" data-search-terms="renewable energy quiz">Renewable Energy Quiz</button>
<button onclick="openDynamicModal('Climate Change Quiz'); return false;" class="topic-pill" data-search-terms="climate change quiz">Climate Change Quiz</button>
</div>
                    <a href="#" class="card-action-btn">Test Environmental Knowledge</a>
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

