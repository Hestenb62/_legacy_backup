<?php
// Set variables required by header.php for dynamic content
$pageTitle = "History Resources - Hesten's Learning";
$pageDescription = "Travel through time and explore the events, cultures, and people that shaped our world.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

    <main class="page-content-wrapper">
        <div class="resource-header">
    <h1 class="resource-title">History Resources</h1>
    <p class="resource-subtitle">Travel through time and explore the events, cultures, and people that shaped our world.</p>
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
            <!-- Ancient Civilizations -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-gopuram mr-2"></i></div><h2 class="resource-card-title">Ancient Civilizations</h2></div>
                    <p class="resource-card-desc">Discover the origins of human civilization, from Mesopotamia to ancient Rome.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Ancient Egypt'); return false;" class="topic-pill" data-search-terms="ancient egypt">Ancient Egypt</button>
<button onclick="openDynamicModal('Mesopotamia'); return false;" class="topic-pill" data-search-terms="mesopotamia">Mesopotamia</button>
<button onclick="openDynamicModal('Ancient Greece'); return false;" class="topic-pill" data-search-terms="ancient greece">Ancient Greece</button>
<button onclick="openDynamicModal('Roman Empire'); return false;" class="topic-pill" data-search-terms="roman empire">Roman Empire</button>
</div>
                    <a href="#" class="card-action-btn">Explore Ancient History</a>
                </div>
            </div>

            <!-- World History Timelines -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-calendar-alt mr-2"></i></div><h2 class="resource-card-title">World History Timelines</h2></div>
                    <p class="resource-card-desc">Visualize key events and periods in world history with interactive timelines.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Medieval Period'); return false;" class="topic-pill" data-search-terms="medieval period">Medieval Period</button>
<button onclick="openDynamicModal('Renaissance & Reformation'); return false;" class="topic-pill" data-search-terms="renaissance & reformation">Renaissance & Reformation</button>
<button onclick="openDynamicModal('Age of Exploration'); return false;" class="topic-pill" data-search-terms="age of exploration">Age of Exploration</button>
<button onclick="openDynamicModal('Modern World History'); return false;" class="topic-pill" data-search-terms="modern world history">Modern World History</button>
</div>
                    <a href="#" class="card-action-btn">View Timelines</a>
                </div>
            </div>

            <!-- US History Documents -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-scroll mr-2"></i></div><h2 class="resource-card-title">US History Documents</h2></div>
                    <p class="resource-card-desc">Access primary sources, historical texts, and analyses of significant moments in American history.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Colonial America'); return false;" class="topic-pill" data-search-terms="colonial america">Colonial America</button>
<button onclick="openDynamicModal('American Revolution'); return false;" class="topic-pill" data-search-terms="american revolution">American Revolution</button>
<button onclick="openDynamicModal('Civil War Era'); return false;" class="topic-pill" data-search-terms="civil war era">Civil War Era</button>
<button onclick="openDynamicModal('20th Century America'); return false;" class="topic-pill" data-search-terms="20th century america">20th Century America</button>
</div>
                    <a href="#" class="card-action-btn">Read US History Documents</a>
                </div>
            </div>

            <!-- Historical Figures -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-user-friends mr-2"></i></div><h2 class="resource-card-title">Historical Figures</h2></div>
                    <p class="resource-card-desc">Learn about the lives and legacies of influential people throughout history.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Leaders & Rulers'); return false;" class="topic-pill" data-search-terms="leaders & rulers">Leaders & Rulers</button>
<button onclick="openDynamicModal('Scientists & Inventors'); return false;" class="topic-pill" data-search-terms="scientists & inventors">Scientists & Inventors</button>
<button onclick="openDynamicModal('Artists & Writers'); return false;" class="topic-pill" data-search-terms="artists & writers">Artists & Writers</button>
<button onclick="openDynamicModal('Activists & Reformers'); return false;" class="topic-pill" data-search-terms="activists & reformers">Activists & Reformers</button>
</div>
                    <a href="#" class="card-action-btn">Discover Historical Figures</a>
                </div>
            </div>

            <!-- World Wars -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-bomb mr-2"></i></div><h2 class="resource-card-title">World Wars</h2></div>
                    <p class="resource-card-desc">In-depth resources on World War I and World War II, including causes, events, and impacts.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('World War I Overview'); return false;" class="topic-pill" data-search-terms="world war i overview">World War I Overview</button>
<button onclick="openDynamicModal('Causes of WWII'); return false;" class="topic-pill" data-search-terms="causes of wwii">Causes of WWII</button>
<button onclick="openDynamicModal('Major Battles of WWII'); return false;" class="topic-pill" data-search-terms="major battles of wwii">Major Battles of WWII</button>
<button onclick="openDynamicModal('Post-War World'); return false;" class="topic-pill" data-search-terms="post-war world">Post-War World</button>
</div>
                    <a href="#" class="card-action-btn">Learn About World Wars</a>
                </div>
            </div>

            <!-- Cold War Era -->
            <div >
                <div class="resource-card" data-card-category="all">
                    <div class="resource-card-header"><div class="resource-card-icon social"><i class="fas fa-snowflake mr-2"></i></div><h2 class="resource-card-title">Cold War Era</h2></div>
                    <p class="resource-card-desc">Understand the geopolitical tensions, proxy wars, and ideological conflicts of the Cold War.</p>
                    <div class="pills-container">
<button onclick="openDynamicModal('Origins of the Cold War'); return false;" class="topic-pill" data-search-terms="origins of the cold war">Origins of the Cold War</button>
<button onclick="openDynamicModal('Space Race'); return false;" class="topic-pill" data-search-terms="space race">Space Race</button>
<button onclick="openDynamicModal('Cuban Missile Crisis'); return false;" class="topic-pill" data-search-terms="cuban missile crisis">Cuban Missile Crisis</button>
<button onclick="openDynamicModal('Fall of the Berlin Wall'); return false;" class="topic-pill" data-search-terms="fall of the berlin wall">Fall of the Berlin Wall</button>
</div>
                    <a href="#" class="card-action-btn">Explore Cold War</a>
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

