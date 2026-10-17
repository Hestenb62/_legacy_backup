<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Practice Problems - Hesten's Learning";
$pageDescription = "Test your knowledge and improve your skills with our comprehensive collection of math practice problems for Algebra, Geometry, Calculus, and more.";
$pageAuthor = "Hesten's Learning Team";
$requiresMathJax = true;

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Math Practice Zone";
$welcomeParagraph = "Welcome! Select a topic below to start practicing and sharpening your math skills.";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// as well as the navigation bar, accessibility panel, and welcome popup.
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">
<link rel="stylesheet" href="/assets/css/labs/math-manipulatives.css">
<link rel="stylesheet" href="/assets/css/assessment/assessment-scratchpad.css">

    <!-- Main Content Area -->
    <main class="page-content-wrapper">
        <!-- Scholar Practice Hero Header -->
        <header class="math-practice-hero" aria-label="Mathematics Practice Laboratory Header">
            <nav class="math-breadcrumb-nav" aria-label="Breadcrumb Trail">
                <a href="/student/index.php" class="math-breadcrumb-link">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    <span>Student Academic Hub</span>
                </a>
                <span class="math-breadcrumb-separator" aria-hidden="true">/</span>
                <span class="math-breadcrumb-current">Mathematics Practice Workbench</span>
            </nav>

            <div class="math-hero-inner">
                <div class="math-hero-content">
                    <div class="math-hero-badge">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        <span>Computational Laboratory</span>
                    </div>
                    <h1 class="math-hero-title">Math Practice Workbench</h1>
                    <p class="math-hero-subtitle">
                        Master core mathematical concepts, step-by-step worked formulas, and curriculum-aligned practice problems across foundational and advanced domains.
                    </p>
                </div>


            </div>

            <!-- Real-time Filter & Topic Search Ribbon -->
            <div class="search-filter-container" role="search" aria-label="Filter mathematics practice topics">
                <div class="search-box">
                    <i class="fas fa-search search-icon" aria-hidden="true"></i>
                    <input type="text" id="topic-search" placeholder="Search math topics (e.g. algebra, geometry, calculus, proofs)..." aria-label="Search mathematics topics">
                    <button type="button" id="clear-search" class="clear-btn" aria-label="Clear search query" style="display: none;">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="filter-tabs" role="tablist" aria-label="Filter mathematics domains">
                    <button type="button" class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button type="button" class="filter-tab" data-category="algebra" role="tab" aria-selected="false">Algebra</button>
                    <button type="button" class="filter-tab" data-category="geometry" role="tab" aria-selected="false">Geometry</button>
                    <button type="button" class="filter-tab" data-category="calculus" role="tab" aria-selected="false">Calculus</button>
                    <button type="button" class="filter-tab" data-category="statistics" role="tab" aria-selected="false">Statistics</button>
                    <button type="button" class="filter-tab" data-category="number-theory" role="tab" aria-selected="false">Number Theory</button>
                    <button type="button" class="filter-tab" data-category="applied-math" role="tab" aria-selected="false">Applied Math</button>
                </div>
            </div>
        </header>



<div class="resource-grid" id="topics-grid">
            
            <!-- Algebra Practice -->
            <div>
                <div class="resource-card" data-card-category="algebra">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-superscript mr-2"></i></div><h2 class="resource-card-title">Algebra Practice</h2></div>
                    <p class="text-text-secondary mb-4">Practice solving equations, inequalities, and working with functions. Problems for all levels.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Basic Algebra'); return false;" class="topic-pill" data-search-terms="basic algebra">Basic Algebra</button>
<button onclick="openDynamicModal('Linear Equations'); return false;" class="topic-pill" data-search-terms="linear equations">Linear Equations</button>
<button onclick="openDynamicModal('Quadratic Equations'); return false;" class="topic-pill" data-search-terms="quadratic equations">Quadratic Equations</button>
<button onclick="openDynamicModal('Systems of Equations'); return false;" class="topic-pill" data-search-terms="systems of equations">Systems of Equations</button>
</div>
                    <button type="button" onclick="openDynamicModal('Basic Algebra'); return false;" class="topic-card-action-btn" aria-label="Open Basic Algebra lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Algebra</span></button>
                </div>
            </div>

            <!-- Geometry Exercises -->
            <div>
                <div class="resource-card" data-card-category="geometry">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-shapes mr-2"></i></div><h2 class="resource-card-title">Geometry Exercises</h2></div>
                    <p class="text-text-secondary mb-4">Work on problems involving shapes, angles, areas, and volumes. Perfect for visual learners.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Angles and Lines'); return false;" class="topic-pill" data-search-terms="angles and lines">Angles and Lines</button>
<button onclick="openDynamicModal('Area and Perimeter'); return false;" class="topic-pill" data-search-terms="area and perimeter">Area and Perimeter</button>
<button onclick="openDynamicModal('Volume and Surface Area'); return false;" class="topic-pill" data-search-terms="volume and surface area">Volume and Surface Area</button>
<button onclick="openDynamicModal('Geometric Proofs'); return false;" class="topic-pill" data-search-terms="geometric proofs">Geometric Proofs</button>
</div>
                    <button type="button" onclick="openDynamicModal('Angles and Lines'); return false;" class="topic-card-action-btn" aria-label="Open Angles and Lines lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Geometry</span></button>
                </div>
            </div>

            <!-- Calculus Worksheets -->
            <div>
                <div class="resource-card" data-card-category="calculus">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-infinity mr-2"></i></div><h2 class="resource-card-title">Calculus Worksheets</h2></div>
                    <p class="text-text-secondary mb-4">Challenge yourself with problems on limits, derivatives, integrals, and their applications.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Limits and Continuity'); return false;" class="topic-pill" data-search-terms="limits and continuity">Limits and Continuity</button>
<button onclick="openDynamicModal('Differentiation'); return false;" class="topic-pill" data-search-terms="differentiation">Differentiation</button>
<button onclick="openDynamicModal('Integration'); return false;" class="topic-pill" data-search-terms="integration">Integration</button>
<button onclick="openDynamicModal('Applications of Calculus'); return false;" class="topic-pill" data-search-terms="applications of calculus">Applications of Calculus</button>
</div>
                    <button type="button" onclick="openDynamicModal('Limits and Continuity'); return false;" class="topic-card-action-btn" aria-label="Open Limits and Continuity lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Calculus</span></button>
                </div>
            </div>

            <!-- Statistics Problems -->
            <div>
                <div class="resource-card" data-card-category="statistics">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-chart-bar mr-2"></i></div><h2 class="resource-card-title">Statistics Problems</h2></div>
                    <p class="text-text-secondary mb-4">Practice data analysis, probability, and statistical inference with our curated problem sets.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Descriptive Statistics'); return false;" class="topic-pill" data-search-terms="descriptive statistics">Descriptive Statistics</button>
<button onclick="openDynamicModal('Probability Distributions'); return false;" class="topic-pill" data-search-terms="probability distributions">Probability Distributions</button>
<button onclick="openDynamicModal('Hypothesis Testing'); return false;" class="topic-pill" data-search-terms="hypothesis testing">Hypothesis Testing</button>
<button onclick="openDynamicModal('Regression Analysis'); return false;" class="topic-pill" data-search-terms="regression analysis">Regression Analysis</button>
</div>
                    <button type="button" onclick="openDynamicModal('Descriptive Statistics'); return false;" class="topic-card-action-btn" aria-label="Open Descriptive Statistics lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Statistics</span></button>
                </div>
            </div>

            <!-- Number Theory Problems -->
            <div>
                <div class="resource-card" data-card-category="number-theory">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-hashtag mr-2"></i></div><h2 class="resource-card-title">Number Theory Problems</h2></div>
                    <p class="text-text-secondary mb-4">Explore the fascinating world of numbers with problems on prime numbers, divisibility, and modular arithmetic.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Prime Numbers'); return false;" class="topic-pill" data-search-terms="prime numbers">Prime Numbers</button>
<button onclick="openDynamicModal('Divisibility Rules'); return false;" class="topic-pill" data-search-terms="divisibility rules">Divisibility Rules</button>
<button onclick="openDynamicModal('Modular Arithmetic'); return false;" class="topic-pill" data-search-terms="modular arithmetic">Modular Arithmetic</button>
<button onclick="openDynamicModal('Diophantine Equations'); return false;" class="topic-pill" data-search-terms="diophantine equations">Diophantine Equations</button>
</div>
                    <button type="button" onclick="openDynamicModal('Prime Numbers'); return false;" class="topic-card-action-btn" aria-label="Open Prime Numbers lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Number Theory</span></button>
                </div>
            </div>

            <!-- Applied Math Challenges -->
            <div>
                <div class="resource-card" data-card-category="applied-math">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-puzzle-piece mr-2"></i></div><h2 class="resource-card-title">Applied Math Challenges</h2></div>
                    <p class="text-text-secondary mb-4">Apply mathematical concepts to real-world scenarios with these challenging application problems.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Financial Math'); return false;" class="topic-pill" data-search-terms="financial math">Financial Math</button>
<button onclick="openDynamicModal('Physics Applications'); return false;" class="topic-pill" data-search-terms="physics applications">Physics Applications</button>
<button onclick="openDynamicModal('Engineering Problems'); return false;" class="topic-pill" data-search-terms="engineering problems">Engineering Problems</button>
<button onclick="openDynamicModal('Data Science Challenges'); return false;" class="topic-pill" data-search-terms="data science challenges">Data Science Challenges</button>
</div>
                    <button type="button" onclick="openDynamicModal('Financial Math'); return false;" class="topic-card-action-btn" aria-label="Open Financial Math lesson and practice"><i class="fas fa-play" aria-hidden="true"></i><span>Explore Applied Math</span></button>
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

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/math-lessons.js') : '/assets/js/pages/math-lessons.js?v=2.23.0' ?>"></script>
<script src="/assets/js/labs/math-manipulatives.js" defer></script>
<script src="/assets/js/assessment/assessment-scratchpad.js" defer></script>


<?php
// Include the footer file, which contains the <footer>, modals, and closing </body> and </html> tags.
include '../src/resource-modal.php';
// Include the footer file
include '../src/footer.php';
?>
