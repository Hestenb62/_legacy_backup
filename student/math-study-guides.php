<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Study Guides - Hesten's Learning";
$pageDescription = "Comprehensive guides and detailed notes to help you understand and retain key math concepts.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Math Study Guides & Notes</h1>
    <p class="resource-subtitle">Comprehensive guides and detailed notes to help you understand and retain key math concepts.</p>
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
            <!-- Algebra Study Guides -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">Algebra Study Guides</h2></div>
                    <p class="resource-card-desc">Concise summaries and important formulas for all algebra topics.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Algebraic Expressions Summary'); return false;" class="topic-pill" data-search-terms="algebraic expressions summary">Algebraic Expressions Summary</button>
<button onclick="openDynamicModal('Functions Cheat Sheet'); return false;" class="topic-pill" data-search-terms="functions cheat sheet">Functions Cheat Sheet</button>
<button onclick="openDynamicModal('Solving Inequalities Guide'); return false;" class="topic-pill" data-search-terms="solving inequalities guide">Solving Inequalities Guide</button>
<button onclick="openDynamicModal('Factoring Polynomials Notes'); return false;" class="topic-pill" data-search-terms="factoring polynomials notes">Factoring Polynomials Notes</button>
</div>
                    <a href="#" class="card-action-btn">Download Algebra Guides</a>
                </div>
            </div>

            <!-- Geometry Notes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">Geometry Notes</h2></div>
                    <p class="resource-card-desc">Detailed notes on geometric shapes, theorems, postulates, and proofs.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Basic Geometry Concepts'); return false;" class="topic-pill" data-search-terms="basic geometry concepts">Basic Geometry Concepts</button>
<button onclick="openDynamicModal('Circles and Spheres Notes'); return false;" class="topic-pill" data-search-terms="circles and spheres notes">Circles and Spheres Notes</button>
<button onclick="openDynamicModal('Triangle Congruence Postulates'); return false;" class="topic-pill" data-search-terms="triangle congruence postulates">Triangle Congruence Postulates</button>
<button onclick="openDynamicModal('Volume Formulas'); return false;" class="topic-pill" data-search-terms="volume formulas">Volume Formulas</button>
</div>
                    <a href="#" class="card-action-btn">Access Geometry Notes</a>
                </div>
            </div>

            <!-- Calculus Study Materials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">Calculus Study Materials</h2></div>
                    <p class="resource-card-desc">Comprehensive study guides for limits, derivatives, integrals, and their applications.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Limits & Continuity Guide'); return false;" class="topic-pill" data-search-terms="limits & continuity guide">Limits & Continuity Guide</button>
<button onclick="openDynamicModal('Derivative Rules Summary'); return false;" class="topic-pill" data-search-terms="derivative rules summary">Derivative Rules Summary</button>
<button onclick="openDynamicModal('Integration Techniques'); return false;" class="topic-pill" data-search-terms="integration techniques">Integration Techniques</button>
<button onclick="openDynamicModal('Series & Sequences Notes'); return false;" class="topic-pill" data-search-terms="series & sequences notes">Series & Sequences Notes</button>
</div>
                    <a href="#" class="card-action-btn">Explore Calculus Guides</a>
                </div>
            </div>

            <!-- Statistics & Probability Notes -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">Statistics & Probability Notes</h2></div>
                    <p class="resource-card-desc">Key concepts, formulas, and examples for statistics and probability.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Probability Basics'); return false;" class="topic-pill" data-search-terms="probability basics">Probability Basics</button>
<button onclick="openDynamicModal('Statistical Formulas'); return false;" class="topic-pill" data-search-terms="statistical formulas">Statistical Formulas</button>
<button onclick="openDynamicModal('Hypothesis Testing Guide'); return false;" class="topic-pill" data-search-terms="hypothesis testing guide">Hypothesis Testing Guide</button>
<button onclick="openDynamicModal('Confidence Intervals Notes'); return false;" class="topic-pill" data-search-terms="confidence intervals notes">Confidence Intervals Notes</button>
</div>
                    <a href="#" class="card-action-btn">Get Stats & Probability Notes</a>
                </div>
            </div>

            <!-- Discrete Math Summaries -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">Discrete Math Summaries</h2></div>
                    <p class="resource-card-desc">Concise summaries of set theory, logic, graph theory, and combinatorics.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Set Theory Basics'); return false;" class="topic-pill" data-search-terms="set theory basics">Set Theory Basics</button>
<button onclick="openDynamicModal('Logic & Proof Techniques'); return false;" class="topic-pill" data-search-terms="logic & proof techniques">Logic & Proof Techniques</button>
<button onclick="openDynamicModal('Graph Theory Concepts'); return false;" class="topic-pill" data-search-terms="graph theory concepts">Graph Theory Concepts</button>
<button onclick="openDynamicModal('Combinatorics Formulas'); return false;" class="topic-pill" data-search-terms="combinatorics formulas">Combinatorics Formulas</button>
</div>
                    <a href="#" class="card-action-btn">View Discrete Math Summaries</a>
                </div>
            </div>

            <!-- General Math Formulas -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-file-alt mr-2"></i></div><h2 class="resource-card-title">General Math Formulas</h2></div>
                    <p class="resource-card-desc">A quick reference guide for essential formulas across various math disciplines.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Basic Arithmetic Formulas'); return false;" class="topic-pill" data-search-terms="basic arithmetic formulas">Basic Arithmetic Formulas</button>
<button onclick="openDynamicModal('Algebraic Identities'); return false;" class="topic-pill" data-search-terms="algebraic identities">Algebraic Identities</button>
<button onclick="openDynamicModal('Geometric Formulas'); return false;" class="topic-pill" data-search-terms="geometric formulas">Geometric Formulas</button>
<button onclick="openDynamicModal('Trigonometric Identities'); return false;" class="topic-pill" data-search-terms="trigonometric identities">Trigonometric Identities</button>
</div>
                    <a href="#" class="card-action-btn">Access All Formulas</a>
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

