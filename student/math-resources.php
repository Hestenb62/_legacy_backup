<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Resources - Hesten's Learning";
$pageDescription = "Unlock your potential in mathematics with our diverse collection of resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">Math Resources</h1>
            <p class="resource-subtitle">Unlock your potential in mathematics with our diverse collection of resources.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search math topics, practice problems, videos..." aria-label="Search math topics">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter topics by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button class="filter-tab" data-category="practice" role="tab" aria-selected="false">Practice</button>
                    <button class="filter-tab" data-category="video" role="tab" aria-selected="false">Video Tutorials</button>
                    <button class="filter-tab" data-category="study" role="tab" aria-selected="false">Study Guides</button>
                    <button class="filter-tab" data-category="game" role="tab" aria-selected="false">Interactive Games</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Practice Problems Card -->
            <div class="resource-card" data-card-category="practice">
                <div class="resource-card-header">
                    <div class="resource-card-icon practice"><i class="fas fa-pencil-alt"></i></div>
                    <h2 class="resource-card-title">Practice Problems</h2>
                </div>
                <p class="resource-card-desc">Sharpen your skills with a wide range of practice problems, from basic arithmetic to advanced algebra and geometry.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Algebra Practice'); return false;" class="topic-pill" data-search-terms="algebra practice equations variables math">Algebra Practice</button>
                    <button onclick="openDynamicModal('Geometry Exercises'); return false;" class="topic-pill" data-search-terms="geometry exercises shapes angles area math">Geometry Exercises</button>
                    <button onclick="openDynamicModal('Calculus Worksheets'); return false;" class="topic-pill" data-search-terms="calculus worksheets derivatives integrals limits math">Calculus Worksheets</button>
                    <button onclick="openDynamicModal('Statistics Problems'); return false;" class="topic-pill" data-search-terms="statistics problems data mean median math">Statistics Problems</button>
                </div>
                <a href="/student/math-practice.php" class="card-action-btn">Start Practicing</a>
            </div>

            <!-- 2. Video Tutorials Card -->
            <div class="resource-card" data-card-category="video">
                <div class="resource-card-header">
                    <div class="resource-card-icon video"><i class="fas fa-video"></i></div>
                    <h2 class="resource-card-title">Video Tutorials</h2>
                </div>
                <p class="resource-card-desc">Learn complex math concepts through easy-to-understand video tutorials, taught by experienced educators.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Pre-Algebra Basics'); return false;" class="topic-pill" data-search-terms="pre-algebra basics introductory math">Pre-Algebra Basics</button>
                    <button onclick="openDynamicModal('Trigonometry Explained'); return false;" class="topic-pill" data-search-terms="trigonometry explained sin cos tan triangles math">Trigonometry Explained</button>
                    <button onclick="openDynamicModal('Differential Equations'); return false;" class="topic-pill" data-search-terms="differential equations calculus advanced math">Differential Equations</button>
                    <button onclick="openDynamicModal('Probability & Combinatorics'); return false;" class="topic-pill" data-search-terms="probability combinatorics chance math">Probability & Combinatorics</button>
                </div>
                <a href="/student/math-tutorials.php" class="card-action-btn">Watch Tutorials</a>
            </div>

            <!-- 3. Study Guides & Notes Card -->
            <div class="resource-card" data-card-category="study">
                <div class="resource-card-header">
                    <div class="resource-card-icon study"><i class="fas fa-file-alt"></i></div>
                    <h2 class="resource-card-title">Study Guides & Notes</h2>
                </div>
                <p class="resource-card-desc">Access comprehensive study guides and detailed notes to review key topics and prepare for exams.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Number Theory Notes'); return false;" class="topic-pill" data-search-terms="number theory prime math notes">Number Theory Notes</button>
                    <button onclick="openDynamicModal('Linear Algebra Guide'); return false;" class="topic-pill" data-search-terms="linear algebra matrices vectors math">Linear Algebra Guide</button>
                    <button onclick="openDynamicModal('Discrete Math Summaries'); return false;" class="topic-pill" data-search-terms="discrete math logic sets math">Discrete Math Summaries</button>
                    <button onclick="openDynamicModal('Geometry Postulates'); return false;" class="topic-pill" data-search-terms="geometry postulates theorems proofs math">Geometry Postulates</button>
                </div>
                <a href="/student/math-study-guides.php" class="card-action-btn">Get Study Guides</a>
            </div>

            <!-- 4. Interactive Math Games Card -->
            <div class="resource-card" data-card-category="game">
                <div class="resource-card-header">
                    <div class="resource-card-icon game"><i class="fas fa-gamepad"></i></div>
                    <h2 class="resource-card-title">Interactive Math Games</h2>
                </div>
                <p class="resource-card-desc">Make learning math fun with interactive games that challenge your mind and reinforce concepts in an engaging way.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Arithmetic Challenge'); return false;" class="topic-pill" data-search-terms="arithmetic challenge addition subtraction math games">Arithmetic Challenge</button>
                    <button onclick="openDynamicModal('Geometry Puzzle'); return false;" class="topic-pill" data-search-terms="geometry puzzle shapes space math games">Geometry Puzzle</button>
                    <button onclick="openDynamicModal('Fraction Frenzy'); return false;" class="topic-pill" data-search-terms="fraction frenzy decimals percents math games">Fraction Frenzy</button>
                    <button onclick="openDynamicModal('Equation Solver'); return false;" class="topic-pill" data-search-terms="equation solver algebra speed math games">Equation Solver</button>
                </div>
                <a href="/student/math-games.php" class="card-action-btn">Play Math Games</a>
            </div>
        </div>

        <!-- Empty State -->
        <div id="no-results-state" class="no-results-box" style="display: none;">
            <i class="fas fa-search-minus no-results-icon"></i>
            <h3 class="no-results-title">No matching topics found</h3>
            <p class="no-results-desc">Try checking your spelling or selecting a different category tab.</p>
            <button id="reset-search-btn" class="reset-search-btn">Reset Search</button>
        </div>
    </main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('topic-search');
    const clearBtn = document.getElementById('clear-search');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.resource-card');
    const noResultsState = document.getElementById('no-results-state');
    const resetBtn = document.getElementById('reset-search-btn');

    let currentCategory = 'all';
    let searchQuery = '';

    // Apply filters function
    function applyFilters() {
        let visibleCardsCount = 0;

        cards.forEach(card => {
            const cardCategory = card.getAttribute('data-card-category');
            const categoryMatch = currentCategory === 'all' || cardCategory === currentCategory;
            
            // Check pills inside this card
            const pills = card.querySelectorAll('.topic-pill');
            let matchingPillsInCard = 0;

            pills.forEach(pill => {
                const text = pill.textContent.toLowerCase();
                const terms = pill.getAttribute('data-search-terms').toLowerCase();
                const textMatch = text.includes(searchQuery) || terms.includes(searchQuery);

                if (textMatch) {
                    pill.style.display = 'block';
                    matchingPillsInCard++;
                } else {
                    pill.style.display = 'none';
                }
            });

            // Card is visible if category matches AND (search query is empty OR there's at least one matching pill)
            const shouldBeVisible = categoryMatch && (searchQuery === '' || matchingPillsInCard > 0);

            if (shouldBeVisible) {
                card.style.display = 'flex';
                visibleCardsCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Toggle no-results block
        if (visibleCardsCount === 0) {
            noResultsState.style.display = 'block';
            document.getElementById('topics-grid').style.display = 'none';
        } else {
            noResultsState.style.display = 'none';
            document.getElementById('topics-grid').style.display = 'grid';
        }
    }

    // Search events
    searchInput.addEventListener('input', (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        
        // Show/hide clear search button
        if (searchQuery.length > 0) {
            clearBtn.style.display = 'block';
        } else {
            clearBtn.style.display = 'none';
        }
        applyFilters();
    });

    clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        searchQuery = '';
        clearBtn.style.display = 'none';
        searchInput.focus();
        applyFilters();
    });

    // Category click event
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Update active states
            filterTabs.forEach(t => {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');

            currentCategory = tab.getAttribute('data-category');
            applyFilters();
        });
    });

    // Reset button click
    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        searchQuery = '';
        clearBtn.style.display = 'none';
        currentCategory = 'all';
        
        filterTabs.forEach(t => {
            t.classList.remove('active');
            t.setAttribute('aria-selected', 'false');
            if (t.getAttribute('data-category') === 'all') {
                t.classList.add('active');
                t.setAttribute('aria-selected', 'true');
            }
        });

        applyFilters();
    });
});
</script>

<?php
// Include the footer file
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>
