<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Video Tutorials - Hesten's Learning";
$pageDescription = "Visual explanations to help you grasp even the most challenging math concepts.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Math Video Tutorials</h1>
    <p class="resource-subtitle">Visual explanations to help you grasp even the most challenging math concepts.</p>
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
            <!-- Algebra Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Algebra Tutorials</h2></div>
                    <p class="resource-card-desc">Step-by-step video guides on algebraic expressions, equations, and functions.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Introduction to Algebra'); return false;" class="topic-pill" data-search-terms="introduction to algebra">Introduction to Algebra</button>
<button onclick="openDynamicModal('Solving Linear Equations'); return false;" class="topic-pill" data-search-terms="solving linear equations">Solving Linear Equations</button>
<button onclick="openDynamicModal('Graphing Functions'); return false;" class="topic-pill" data-search-terms="graphing functions">Graphing Functions</button>
<button onclick="openDynamicModal('Polynomial Operations'); return false;" class="topic-pill" data-search-terms="polynomial operations">Polynomial Operations</button>
</div>
                    <a href="#" class="card-action-btn">View Algebra Videos</a>
                </div>
            </div>

            <!-- Geometry Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Geometry Tutorials</h2></div>
                    <p class="resource-card-desc">Visual lessons covering geometric shapes, theorems, and proofs.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Basic Geometric Shapes'); return false;" class="topic-pill" data-search-terms="basic geometric shapes">Basic Geometric Shapes</button>
<button onclick="openDynamicModal('Pythagorean Theorem'); return false;" class="topic-pill" data-search-terms="pythagorean theorem">Pythagorean Theorem</button>
<button onclick="openDynamicModal('Circles and Arcs'); return false;" class="topic-pill" data-search-terms="circles and arcs">Circles and Arcs</button>
<button onclick="openDynamicModal('Transformations'); return false;" class="topic-pill" data-search-terms="transformations">Transformations</button>
</div>
                    <a href="#" class="card-action-btn">Watch Geometry Videos</a>
                </div>
            </div>

            <!-- Calculus Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Calculus Tutorials</h2></div>
                    <p class="resource-card-desc">In-depth video series on limits, derivatives, integrals, and their real-world applications.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Understanding Limits'); return false;" class="topic-pill" data-search-terms="understanding limits">Understanding Limits</button>
<button onclick="openDynamicModal('Rules of Differentiation'); return false;" class="topic-pill" data-search-terms="rules of differentiation">Rules of Differentiation</button>
<button onclick="openDynamicModal('Techniques of Integration'); return false;" class="topic-pill" data-search-terms="techniques of integration">Techniques of Integration</button>
<button onclick="openDynamicModal('Applications in Physics'); return false;" class="topic-pill" data-search-terms="applications in physics">Applications in Physics</button>
</div>
                    <a href="#" class="card-action-btn">Learn Calculus Visually</a>
                </div>
            </div>

            <!-- Statistics & Probability Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Statistics & Probability</h2></div>
                    <p class="resource-card-desc">Video lessons covering data analysis, probability theory, and statistical inference.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Data Visualization'); return false;" class="topic-pill" data-search-terms="data visualization">Data Visualization</button>
<button onclick="openDynamicModal('Basic Probability'); return false;" class="topic-pill" data-search-terms="basic probability">Basic Probability</button>
<button onclick="openDynamicModal('Normal Distribution'); return false;" class="topic-pill" data-search-terms="normal distribution">Normal Distribution</button>
<button onclick="openDynamicModal('Regression Analysis'); return false;" class="topic-pill" data-search-terms="regression analysis">Regression Analysis</button>
</div>
                    <a href="#" class="card-action-btn">Explore Stats & Probability</a>
                </div>
            </div>

            <!-- Pre-Algebra Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Pre-Algebra Tutorials</h2></div>
                    <p class="resource-card-desc">Foundational videos to prepare you for algebra, covering integers, fractions, and decimals.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Integers and Operations'); return false;" class="topic-pill" data-search-terms="integers and operations">Integers and Operations</button>
<button onclick="openDynamicModal('Fractions and Decimals'); return false;" class="topic-pill" data-search-terms="fractions and decimals">Fractions and Decimals</button>
<button onclick="openDynamicModal('Ratios and Proportions'); return false;" class="topic-pill" data-search-terms="ratios and proportions">Ratios and Proportions</button>
<button onclick="openDynamicModal('Order of Operations'); return false;" class="topic-pill" data-search-terms="order of operations">Order of Operations</button>
</div>
                    <a href="#" class="card-action-btn">Start Pre-Algebra</a>
                </div>
            </div>

            <!-- Trigonometry Tutorials -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-video mr-2"></i></div><h2 class="resource-card-title">Trigonometry Tutorials</h2></div>
                    <p class="resource-card-desc">Comprehensive video lessons on angles, triangles, and trigonometric functions.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Right Triangle Trigonometry'); return false;" class="topic-pill" data-search-terms="right triangle trigonometry">Right Triangle Trigonometry</button>
<button onclick="openDynamicModal('Unit Circle'); return false;" class="topic-pill" data-search-terms="unit circle">Unit Circle</button>
<button onclick="openDynamicModal('Trigonometric Identities'); return false;" class="topic-pill" data-search-terms="trigonometric identities">Trigonometric Identities</button>
<button onclick="openDynamicModal('Inverse Trig Functions'); return false;" class="topic-pill" data-search-terms="inverse trig functions">Inverse Trig Functions</button>
</div>
                    <a href="#" class="card-action-btn">Master Trigonometry</a>
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

