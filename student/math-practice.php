<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Practice Problems - Hesten's Learning";
$pageDescription = "Test your knowledge and improve your skills with our comprehensive collection of math practice problems for Algebra, Geometry, Calculus, and more.";
$pageAuthor = "Hesten's Learning Team";

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Math Practice Zone";
$welcomeParagraph = "Welcome! Select a topic below to start practicing and sharpening your math skills.";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// as well as the navigation bar, accessibility panel, and welcome popup.
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <!-- Main Content Area -->
    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">Math Practice Problems</h1>
    <p class="resource-subtitle">Test your knowledge and improve your skills with our comprehensive collection of math practice problems.</p>
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
            
            <!-- Algebra Practice -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-superscript mr-2"></i></div><h2 class="resource-card-title">Algebra Practice</h2></div>
                    <p class="text-text-secondary mb-4">Practice solving equations, inequalities, and working with functions. Problems for all levels.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Basic Algebra'); return false;" class="topic-pill" data-search-terms="basic algebra">Basic Algebra</button>
<button onclick="openDynamicModal('Linear Equations'); return false;" class="topic-pill" data-search-terms="linear equations">Linear Equations</button>
<button onclick="openDynamicModal('Quadratic Equations'); return false;" class="topic-pill" data-search-terms="quadratic equations">Quadratic Equations</button>
<button onclick="openDynamicModal('Systems of Equations'); return false;" class="topic-pill" data-search-terms="systems of equations">Systems of Equations</button>
</div>
                    <!-- MODIFIED: Changed <a> to <button> and added onclick -->
                    <button onclick="openModal('algebraModal')" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Start Algebra Practice</button>
                </div>
            </div>

            <!-- Geometry Exercises -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-shapes mr-2"></i></div><h2 class="resource-card-title">Geometry Exercises</h2></div>
                    <p class="text-text-secondary mb-4">Work on problems involving shapes, angles, areas, and volumes. Perfect for visual learners.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Angles and Lines'); return false;" class="topic-pill" data-search-terms="angles and lines">Angles and Lines</button>
<button onclick="openDynamicModal('Area and Perimeter'); return false;" class="topic-pill" data-search-terms="area and perimeter">Area and Perimeter</button>
<button onclick="openDynamicModal('Volume and Surface Area'); return false;" class="topic-pill" data-search-terms="volume and surface area">Volume and Surface Area</button>
<button onclick="openDynamicModal('Geometric Proofs'); return false;" class="topic-pill" data-search-terms="geometric proofs">Geometric Proofs</button>
</div>
                    <!-- MODIFIED: Changed <a> to <button> and added onclick -->
                    <button onclick="openModal('geometryModal')" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Do Geometry Exercises</button>
                </div>
            </div>

            <!-- Calculus Worksheets -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-infinity mr-2"></i></div><h2 class="resource-card-title">Calculus Worksheets</h2></div>
                    <p class="text-text-secondary mb-4">Challenge yourself with problems on limits, derivatives, integrals, and their applications.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Limits and Continuity'); return false;" class="topic-pill" data-search-terms="limits and continuity">Limits and Continuity</button>
<button onclick="openDynamicModal('Differentiation'); return false;" class="topic-pill" data-search-terms="differentiation">Differentiation</button>
<button onclick="openDynamicModal('Integration'); return false;" class="topic-pill" data-search-terms="integration">Integration</button>
<button onclick="openDynamicModal('Applications of Calculus'); return false;" class="topic-pill" data-search-terms="applications of calculus">Applications of Calculus</button>
</div>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Access Calculus Worksheets</a>
                </div>
            </div>

            <!-- Statistics Problems -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-chart-bar mr-2"></i></div><h2 class="resource-card-title">Statistics Problems</h2></div>
                    <p class="text-text-secondary mb-4">Practice data analysis, probability, and statistical inference with our curated problem sets.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Descriptive Statistics'); return false;" class="topic-pill" data-search-terms="descriptive statistics">Descriptive Statistics</button>
<button onclick="openDynamicModal('Probability Distributions'); return false;" class="topic-pill" data-search-terms="probability distributions">Probability Distributions</button>
<button onclick="openDynamicModal('Hypothesis Testing'); return false;" class="topic-pill" data-search-terms="hypothesis testing">Hypothesis Testing</button>
<button onclick="openDynamicModal('Regression Analysis'); return false;" class="topic-pill" data-search-terms="regression analysis">Regression Analysis</button>
</div>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Solve Statistics Problems</a>
                </div>
            </div>

            <!-- Number Theory Problems -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-hashtag mr-2"></i></div><h2 class="resource-card-title">Number Theory Problems</h2></div>
                    <p class="text-text-secondary mb-4">Explore the fascinating world of numbers with problems on prime numbers, divisibility, and modular arithmetic.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Prime Numbers'); return false;" class="topic-pill" data-search-terms="prime numbers">Prime Numbers</button>
<button onclick="openDynamicModal('Divisibility Rules'); return false;" class="topic-pill" data-search-terms="divisibility rules">Divisibility Rules</button>
<button onclick="openDynamicModal('Modular Arithmetic'); return false;" class="topic-pill" data-search-terms="modular arithmetic">Modular Arithmetic</button>
<button onclick="openDynamicModal('Diophantine Equations'); return false;" class="topic-pill" data-search-terms="diophantine equations">Diophantine Equations</button>
</div>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Explore Number Theory</a>
                </div>
            </div>

            <!-- Applied Math Challenges -->
            <div >
                <!-- Updated to use theme-aware classes -->
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon math"><i class="fas fa-puzzle-piece mr-2"></i></div><h2 class="resource-card-title">Applied Math Challenges</h2></div>
                    <p class="text-text-secondary mb-4">Apply mathematical concepts to real-world scenarios with these challenging application problems.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Financial Math'); return false;" class="topic-pill" data-search-terms="financial math">Financial Math</button>
<button onclick="openDynamicModal('Physics Applications'); return false;" class="topic-pill" data-search-terms="physics applications">Physics Applications</button>
<button onclick="openDynamicModal('Engineering Problems'); return false;" class="topic-pill" data-search-terms="engineering problems">Engineering Problems</button>
<button onclick="openDynamicModal('Data Science Challenges'); return false;" class="topic-pill" data-search-terms="data science challenges">Data Science Challenges</button>
</div>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">Tackle Applied Challenges</a>
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

    <!-- 
      ==================================================
      NEW MODALS SECTION
      ==================================================
    -->

    <!-- Algebra Modal -->
    <div id="algebraModal" class="modal-backdrop hidden" onclick="closeModal('algebraModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-primary"><i class="fas fa-superscript mr-2" aria-hidden="true"></i>Algebra Practice</h3>
                    <button onclick="closeModal('algebraModal')" class="modal-close-button" aria-label="Close algebra practice modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Problem 1: Linear Equation -->
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Problem 1: Solve for x</h4>
                        <p class="text-text-secondary text-lg mb-4 font-mono">2x + 5 = 15</p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <label for="alg-q1" class="sr-only">Your answer for problem 1</label>
                            <input id="alg-q1" type="number" placeholder="Enter your answer" class="flex-grow px-4 py-2 border rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                            <button onclick="checkAnswer('alg-q1', '5', 'alg-r1')" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">Check Answer</button>
                        </div>
                        <p id="alg-r1" class="mt-2 text-sm font-medium"></p>
                    </section>
                    
                    <!-- Problem 2: Factoring -->
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Problem 2: Solve for x (Factoring)</h4>
                        <p class="text-text-secondary text-lg mb-4 font-mono">x² - 9 = 0</p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <label for="alg-q2" class="sr-only">Your answer for problem 2</label>
                            <input id="alg-q2" type="text" placeholder="Enter answers, separated by a comma (e.g., 5, -5)" class="flex-grow px-4 py-2 border rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                            <button onclick="checkMultipleAnswers('alg-q2', ['3', '-3'], 'alg-r2')" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">Check Answer</button>
                        </div>
                        <p id="alg-r2" class="mt-2 text-sm font-medium"></p>
                    </section>

                    <!-- Problem 3: Simplify Expression -->
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Problem 3: Simplify</h4>
                        <p class="text-text-secondary text-lg mb-4 font-mono">3(x + 2) - x</p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <label for="alg-q3" class="sr-only">Your answer for problem 3</label>
                            <input id="alg-q3" type="text" placeholder="Enter simplified expression (e.g., 2x + 6)" class="flex-grow px-4 py-2 border rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                            <button onclick="checkAnswer('alg-q3', '2x + 6', 'alg-r3')" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">Check Answer</button>
                        </div>
                        <p id="alg-r3" class="mt-2 text-sm font-medium"></p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Geometry Modal -->
    <div id="geometryModal" class="modal-backdrop hidden" onclick="closeModal('geometryModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-primary"><i class="fas fa-shapes mr-2" aria-hidden="true"></i>Geometry Practice</h3>
                    <button onclick="closeModal('geometryModal')" class="modal-close-button" aria-label="Close geometry practice modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Problem 1: Area of Rectangle -->
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Problem 1: Area of a Rectangle</h4>
                        <p class="text-text-secondary text-lg mb-4">A rectangle has a length of <strong>10</strong> units and a width of <strong>5</strong> units. What is its area?</p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <label for="geo-q1" class="sr-only">Your answer for problem 1</label>
                            <input id="geo-q1" type="number" placeholder="Enter the area" class="flex-grow px-4 py-2 border rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                            <button onclick="checkAnswer('geo-q1', '50', 'geo-r1')" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">Check Answer</button>
                        </div>
                        <p id="geo-r1" class="mt-2 text-sm font-medium"></p>
                    </section>
                    
                    <!-- Problem 2: Pythagorean Theorem -->
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Problem 2: Pythagorean Theorem</h4>
                        <p class="text-text-secondary text-lg mb-4">A right triangle has two legs (a and b) with lengths of <strong>3</strong> and <strong>4</strong>. What is the length of the hypotenuse (c)?</p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <label for="geo-q2" class="sr-only">Your answer for problem 2</label>
                            <input id="geo-q2" type="number" placeholder="Enter length of c" class="flex-grow px-4 py-2 border rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                            <button onclick="checkAnswer('geo-q2', '5', 'geo-r2')" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">Check Answer</button>
                        </div>
                        <p id="geo-r2" class="mt-2 text-sm font-medium"></p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- 
      ==================================================
      NEW MODAL STYLES AND SCRIPT 
      (Copied from students.php for consistency)
      ==================================================
    -->
    <style>
        .modal-backdrop {
            position: fixed;
            z-index: 50;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Darker backdrop */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            backdrop-filter: blur(4px); /* Apply blur effect */
            -webkit-backdrop-filter: blur(4px);
            opacity: 0; /* Hidden by default */
            transition: opacity 0.3s ease-in-out;
            visibility: hidden; /* Use visibility for accessibility */
        }
        .modal-backdrop.flex { /* Style when modal is open */
            opacity: 1;
            visibility: visible;
        }
        .modal-content-wrapper {
            width: 100%;
            max-width: 42rem; /* 'max-w-3xl' */
            max-height: 90vh; /* Set max height */
            transform: scale(0.95); /* Start slightly smaller */
            transition: transform 0.3s ease-in-out;
        }
        .modal-backdrop.flex .modal-content-wrapper {
            transform: scale(1); /* Animate to full size */
        }
        .modal-content {
            background-color: var(--color-content-bg); /* Use CSS variables from your theme */
            color: var(--color-text-primary);
            border-radius: var(--rounded-base); /* Use CSS variable */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden; /* Ensures rounded corners on children */
            display: flex;
            flex-direction: column;
            max-height: 90vh; /* Match wrapper */
        }
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem; /* 'p-6' */
            border-bottom: 1px solid var(--color-border); /* Use CSS variable */
        }
        .modal-body {
            padding: 1.5rem; /* 'p-6' */
            overflow-y: auto; /* Make modal body scrollable */
        }
        .modal-close-button {
            background-color: transparent;
            border: none;
            font-size: 1.5rem; /* 'text-2xl' */
            line-height: 1;
            color: var(--color-text-secondary);
            cursor: pointer;
            padding: 0.25rem;
            border-radius: var(--rounded-full);
            transition: color 0.2s, background-color 0.2s;
        }
        .modal-close-button:hover {
            color: var(--color-text-primary);
            background-color: var(--color-bg-secondary);
        }
        .modal-close-button:focus {
            outline: 2px solid var(--color-accent);
            outline-offset: 2px;
        }
        /* Style for the borders between sections */
        .modal-body .border-b {
            border-bottom-width: 1px;
            border-color: var(--color-border, #e5e7eb); /* Fallback color */
        }
        /* Dark mode support for border */
        @media (prefers-color-scheme: dark) {
            .modal-body .border-b {
                border-color: var(--color-border, #374151); /* Fallback dark color */
            }
        }

        /* Styles for problem feedback */
        .feedback-correct {
            color: #16a34a; /* green-600 */
        }
        .feedback-incorrect {
            color: #dc2626; /* red-600 */
        }
        .dark .feedback-correct {
            color: #4ade80; /* green-400 */
        }
        .dark .feedback-incorrect {
            color: #f87171; /* red-400 */
        }
    </style>

    <script>
        // Function to open a modal by its ID
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                // Remove 'hidden' and add 'flex' to show it
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                
                // Find the modal body and scroll to top
                const modalBody = modal.querySelector('.modal-body');
                if (modalBody) {
                    modalBody.scrollTop = 0;
                }

                // Trap focus inside the modal for accessibility
                trapFocus(modal);
                // Prevent background scrolling
                document.body.style.overflow = 'hidden';
            }
        }

        // Function to close a modal by its ID
        function closeModal(modalId, event) {
            // If the click is on the backdrop (event.target === modal), close it.
            // If it's from the close button (no event or event.target !== modal), close it.
            const modal = document.getElementById(modalId);
            if (modal && (!event || event.target === modal)) {
                // Add 'hidden' and remove 'flex' to hide it
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Restore background scrolling
                document.body.style.overflow = '';
            }
        }
        
        // Handle closing modal with the 'Escape' key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                // Find all open modals and close them
                document.querySelectorAll('.modal-backdrop.flex').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                // Restore background scrolling
                document.body.style.overflow = '';
            }
        });

        // Basic focus trapping for accessibility
        function trapFocus(modal) {
            const focusableElements = modal.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            // Fallback in case no focusable elements are found
            if (focusableElements.length === 0) {
                // Focus the modal content wrapper itself if it has a tabindex
                const contentWrapper = modal.querySelector('.modal-content-wrapper');
                if (contentWrapper) {
                    contentWrapper.setAttribute('tabindex', '-1');
                    contentWrapper.focus();
                }
                return;
            }

            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];

            // Set initial focus on the first element (e.g., the close button)
            if(firstElement) {
                // Use a tiny timeout to ensure focus is set after modal is fully rendered
                setTimeout(() => firstElement.focus(), 50);
            }

            modal.addEventListener('keydown', function(e) {
                if (e.key !== 'Tab') {
                    return; // Do nothing if not Tab key
                }

                if (e.shiftKey) { // if shift + tab
                    if (document.activeElement === firstElement) {
                        lastElement.focus(); // move focus to last element
                        e.preventDefault();
                    }
                } else { // if tab
                    if (document.activeElement === lastElement) {
                        firstElement.focus(); // move focus to first element
                        e.preventDefault();
                    }
                }
            });
        }

        /**
         * NEW SCRIPT for checking practice problems
         */
        function checkAnswer(inputId, correctAnswer, resultId) {
            const answerInput = document.getElementById(inputId);
            const resultElement = document.getElementById(resultId);
            const userAnswer = answerInput.value.trim().replace(/\s+/g, ''); // Remove spaces
            
            if (userAnswer.toLowerCase() === correctAnswer.toLowerCase().replace(/\s+/g, '')) {
                resultElement.textContent = "Correct! Great job!";
                resultElement.className = "mt-2 text-sm font-medium feedback-correct";
            } else {
                resultElement.textContent = "Not quite. Try that one again!";
                resultElement.className = "mt-2 text-sm font-medium feedback-incorrect";
            }
        }

        /**
         * NEW SCRIPT for checking problems with multiple answers
         */
        function checkMultipleAnswers(inputId, correctAnswersArray, resultId) {
            const answerInput = document.getElementById(inputId);
            const resultElement = document.getElementById(resultId);
            
            // Get user answers, remove spaces, and sort them
            const userAnswers = answerInput.value.split(',')
                .map(ans => ans.trim().replace(/\s+/g, ''))
                .sort();
            
            // Sort correct answers
            const sortedCorrectAnswers = [...correctAnswersArray].sort();
            
            // Check if arrays are identical
            const isCorrect = userAnswers.length === sortedCorrectAnswers.length &&
                              userAnswers.every((val, index) => val === sortedCorrectAnswers[index]);
            
            if (isCorrect) {
                resultElement.textContent = "Correct! You found all the solutions!";
                resultElement.className = "mt-2 text-sm font-medium feedback-correct";
            } else {
                resultElement.textContent = "Not quite. Check your answers and make sure they are separated by a comma.";
                resultElement.className = "mt-2 text-sm font-medium feedback-incorrect";
            }
        }
    </script>


<?php
// Include the footer file, which contains the <footer>, modals, and closing </body> and </html> tags.
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>
