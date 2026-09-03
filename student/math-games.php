<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Interactive Math Games - Hesten's Learning";
$pageDescription = "Make learning math an exciting adventure with our collection of fun and educational games!";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Interactive Math Games</h1>
    <p class="resource-subtitle">Make learning math an exciting adventure with our collection of fun and educational games!</p>
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
            <!-- Arithmetic Challenge -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-plus-minus mr-2"></i></div><h2 class="resource-card-title">Arithmetic Challenge</h2></div>
                    <p class="resource-card-desc">Test your speed and accuracy in addition, subtraction, multiplication, and division.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Speed Addition'); return false;" class="topic-pill" data-search-terms="speed addition">Speed Addition</button>
<button onclick="openDynamicModal('Multiplication Mania'); return false;" class="topic-pill" data-search-terms="multiplication mania">Multiplication Mania</button>
<button onclick="openDynamicModal('Division Dash'); return false;" class="topic-pill" data-search-terms="division dash">Division Dash</button>
<button onclick="openDynamicModal('Mixed Operations Blitz'); return false;" class="topic-pill" data-search-terms="mixed operations blitz">Mixed Operations Blitz</button>
</div>
                    <a href="#" class="card-action-btn">Play Arithmetic Games</a>
                </div>
            </div>

            <!-- Geometry Puzzle -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-puzzle-piece mr-2"></i></div><h2 class="resource-card-title">Geometry Puzzle</h2></div>
                    <p class="resource-card-desc">Solve puzzles and challenges that reinforce geometric concepts and spatial reasoning.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Shape Sorter'); return false;" class="topic-pill" data-search-terms="shape sorter">Shape Sorter</button>
<button onclick="openDynamicModal('Angle Finder'); return false;" class="topic-pill" data-search-terms="angle finder">Angle Finder</button>
<button onclick="openDynamicModal('Area Builder'); return false;" class="topic-pill" data-search-terms="area builder">Area Builder</button>
<button onclick="openDynamicModal('Symmetry Challenge'); return false;" class="topic-pill" data-search-terms="symmetry challenge">Symmetry Challenge</button>
</div>
                    <a href="#" class="card-action-btn">Play Geometry Puzzles</a>
                </div>
            </div>

            <!-- Fraction Frenzy -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-divide mr-2"></i></div><h2 class="resource-card-title">Fraction Frenzy</h2></div>
                    <p class="resource-card-desc">Master fractions through engaging games that cover addition, subtraction, multiplication, and division.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Fraction Match'); return false;" class="topic-pill" data-search-terms="fraction match">Fraction Match</button>
<button onclick="openDynamicModal('Equivalent Fractions'); return false;" class="topic-pill" data-search-terms="equivalent fractions">Equivalent Fractions</button>
<button onclick="openDynamicModal('Fraction Operations'); return false;" class="topic-pill" data-search-terms="fraction operations">Fraction Operations</button>
<button onclick="openDynamicModal('Decimal Conversion'); return false;" class="topic-pill" data-search-terms="decimal conversion">Decimal Conversion</button>
</div>
                    <a href="#" class="card-action-btn">Start Fraction Fun</a>
                </div>
            </div>

            <!-- Equation Solver -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-equals mr-2"></i></div><h2 class="resource-card-title">Equation Solver</h2></div>
                    <p class="resource-card-desc">Practice solving linear, quadratic, and more complex equations in an interactive game format.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Linear Equation Race'); return false;" class="topic-pill" data-search-terms="linear equation race">Linear Equation Race</button>
<button onclick="openDynamicModal('Quadratic Quest'); return false;" class="topic-pill" data-search-terms="quadratic quest">Quadratic Quest</button>
<button onclick="openDynamicModal('System Solver'); return false;" class="topic-pill" data-search-terms="system solver">System Solver</button>
<button onclick="openDynamicModal('Inequality Challenge'); return false;" class="topic-pill" data-search-terms="inequality challenge">Inequality Challenge</button>
</div>
                    <a href="#" class="card-action-btn">Solve Equations</a>
                </div>
            </div>

            <!-- Data Detective -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-chart-line mr-2"></i></div><h2 class="resource-card-title">Data Detective</h2></div>
                    <p class="resource-card-desc">Engage with games that teach data interpretation, probability, and statistical analysis.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Graph Reading Challenge'); return false;" class="topic-pill" data-search-terms="graph reading challenge">Graph Reading Challenge</button>
<button onclick="openDynamicModal('Probability Picker'); return false;" class="topic-pill" data-search-terms="probability picker">Probability Picker</button>
<button onclick="openDynamicModal('Mean, Median, Mode Game'); return false;" class="topic-pill" data-search-terms="mean, median, mode game">Mean, Median, Mode Game</button>
<button onclick="openDynamicModal('Statistical Sort'); return false;" class="topic-pill" data-search-terms="statistical sort">Statistical Sort</button>
</div>
                    <a href="#" class="card-action-btn">Become a Data Detective</a>
                </div>
            </div>

            <!-- Math Logic Puzzles -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-brain mr-2"></i></div><h2 class="resource-card-title">Math Logic Puzzles</h2></div>
                    <p class="resource-card-desc">Sharpen your critical thinking and problem-solving skills with various math logic puzzles.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Sudoku Variants'); return false;" class="topic-pill" data-search-terms="sudoku variants">Sudoku Variants</button>
<button onclick="openDynamicModal('Number Sequence Challenges'); return false;" class="topic-pill" data-search-terms="number sequence challenges">Number Sequence Challenges</button>
<button onclick="openDynamicModal('Cryptarithmetic Puzzles'); return false;" class="topic-pill" data-search-terms="cryptarithmetic puzzles">Cryptarithmetic Puzzles</button>
<button onclick="openDynamicModal('River Crossing Riddles'); return false;" class="topic-pill" data-search-terms="river crossing riddles">River Crossing Riddles</button>
</div>
                    <a href="#" class="card-action-btn">Play Logic Puzzles</a>
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

