<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Literature Analysis - Hesten's Learning";
$pageDescription = "Deepen your appreciation for literature by exploring themes, characters, and literary devices.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">


    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">Literature Analysis</h1>
            <p class="resource-subtitle">Deepen your appreciation for literature by exploring themes, characters, and literary devices.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search literary devices, themes, genres, character templates..." aria-label="Search literature topics">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter topics by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button class="filter-tab" data-category="devices" role="tab" aria-selected="false">Literary Devices</button>
                    <button class="filter-tab" data-category="characters" role="tab" aria-selected="false">Character Analysis</button>
                    <button class="filter-tab" data-category="themes" role="tab" aria-selected="false">Theme Exploration</button>
                    <button class="filter-tab" data-category="genres" role="tab" aria-selected="false">Genre Studies</button>
                    <button class="filter-tab" data-category="plot" role="tab" aria-selected="false">Plot & Structure</button>
                    <button class="filter-tab" data-category="craft" role="tab" aria-selected="false">Author's Craft</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Literary Devices -->
            <div class="resource-card" data-card-category="devices">
                <div class="resource-card-header">
                    <div class="resource-card-icon devices"><i class="fas fa-highlighter"></i></div>
                    <h2 class="resource-card-title">Literary Devices</h2>
                </div>
                <p class="resource-card-desc">Understand the various techniques authors use to convey meaning and evoke emotion.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Metaphor & Simile'); return false;" class="topic-pill" data-search-terms="metaphor simile comparisons like as stars sunshine thief">Metaphor & Simile</button>
                    <button onclick="openDynamicModal('Imagery & Symbolism'); return false;" class="topic-pill" data-search-terms="imagery symbolism details representations dove colors red rose sensory">Imagery & Symbolism</button>
                    <button onclick="openDynamicModal('Foreshadowing & Flashback'); return false;" class="topic-pill" data-search-terms="foreshadowing flashback hints timeline future past events memory">Foreshadowing & Flashback</button>
                    <button onclick="openDynamicModal('Irony & Satire'); return false;" class="topic-pill" data-search-terms="irony satire sarcasm humor mockery drama critical">Irony & Satire</button>
                </div>
            </div>

            <!-- 2. Character Analysis Templates -->
            <div class="resource-card" data-card-category="characters">
                <div class="resource-card-header">
                    <div class="resource-card-icon characters"><i class="fas fa-users"></i></div>
                    <h2 class="resource-card-title">Character Analysis</h2>
                </div>
                <p class="resource-card-desc">Learn how to analyze characters' motivations, development, and roles in a story.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Protagonist & Antagonist'); return false;" class="topic-pill" data-search-terms="protagonist antagonist hero villain main character rival conflict">Protagonist & Antagonist</button>
                    <button onclick="openDynamicModal('Character Archetypes'); return false;" class="topic-pill" data-search-terms="character archetypes mentor trickster explorer patterns profiles shadow">Character Archetypes</button>
                    <button onclick="openDynamicModal('Character Development Arc'); return false;" class="topic-pill" data-search-terms="character development arc growth change journey path transformation">Character Development Arc</button>
                    <button onclick="openDynamicModal('Character vs. Conflict'); return false;" class="topic-pill" data-search-terms="character vs conflict self society nature struggles battles hurdles">Character vs. Conflict</button>
                </div>
            </div>

            <!-- 3. Theme Exploration Guides -->
            <div class="resource-card" data-card-category="themes">
                <div class="resource-card-header">
                    <div class="resource-card-icon themes"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="resource-card-title">Theme Exploration</h2>
                </div>
                <p class="resource-card-desc">Discover and interpret the central ideas and messages conveyed in literary works.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Identifying Themes'); return false;" class="topic-pill" data-search-terms="identifying themes central idea core message moral lesson main point">Identifying Themes</button>
                    <button onclick="openDynamicModal('Universal Themes'); return false;" class="topic-pill" data-search-terms="universal themes love war freedom betrayal coming of age common">Universal Themes</button>
                    <button onclick="openDynamicModal('Symbolism & Theme'); return false;" class="topic-pill" data-search-terms="symbolism theme connections representations objects abstract meanings">Symbolism & Theme</button>
                    <button onclick="openDynamicModal('Author\'s Message'); return false;" class="topic-pill" data-search-terms="author's message purpose intent moral lesson view comment perspective">Author's Message</button>
                </div>
            </div>

            <!-- 4. Genre Studies -->
            <div class="resource-card" data-card-category="genres">
                <div class="resource-card-header">
                    <div class="resource-card-icon genres"><i class="fas fa-folder-open"></i></div>
                    <h2 class="resource-card-title">Genre Studies</h2>
                </div>
                <p class="resource-card-desc">Understand the conventions and characteristics of different literary genres.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fiction Genres'); return false;" class="topic-pill" data-search-terms="fiction genres mystery sci-fi fantasy historical realistic stories novels">Fiction Genres</button>
                    <button onclick="openDynamicModal('Non-Fiction Genres'); return false;" class="topic-pill" data-search-terms="non-fiction genres biography autobiography essay articles informational real facts">Non-Fiction Genres</button>
                    <button onclick="openDynamicModal('Poetry Forms'); return false;" class="topic-pill" data-search-terms="poetry forms haiku sonnet free verse rhyme rhythm stanzas lines">Poetry Forms</button>
                    <button onclick="openDynamicModal('Drama & Playwriting'); return false;" class="topic-pill" data-search-terms="drama playwriting scripts dialogue theater acts scenes stage direct">Drama & Playwriting</button>
                </div>
            </div>

            <!-- 5. Plot & Structure Analysis -->
            <div class="resource-card" data-card-category="plot">
                <div class="resource-card-header">
                    <div class="resource-card-icon plot"><i class="fas fa-sitemap"></i></div>
                    <h2 class="resource-card-title">Plot & Structure</h2>
                </div>
                <p class="resource-card-desc">Break down narratives into exposition, rising action, climax, and resolution.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Freytag\'s Pyramid'); return false;" class="topic-pill" data-search-terms="freytag's pyramid exposition rising action climax falling resolution arc plot">Freytag's Pyramid</button>
                    <button onclick="openDynamicModal('Conflict Types'); return false;" class="topic-pill" data-search-terms="conflict types character vs self man nature society battles clash">Conflict Types</button>
                    <button onclick="openDynamicModal('Pacing & Suspense'); return false;" class="topic-pill" data-search-terms="pacing suspense timing excitement tension cliffhangers speed hook">Pacing & Suspense</button>
                    <button onclick="openDynamicModal('Narrative Arcs'); return false;" class="topic-pill" data-search-terms="narrative arcs quest tragedy voyage return plot outlines tracks">Narrative Arcs</button>
                </div>
            </div>

            <!-- 6. Author's Craft -->
            <div class="resource-card" data-card-category="craft">
                <div class="resource-card-header">
                    <div class="resource-card-icon craft"><i class="fas fa-feather-alt"></i></div>
                    <h2 class="resource-card-title">Author's Craft</h2>
                </div>
                <p class="resource-card-desc">Examine how authors use language, style, tone, and point of view to shape their works.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Diction & Syntax'); return false;" class="topic-pill" data-search-terms="diction syntax word choice sentence structure arrangement styles grammar">Diction & Syntax</button>
                    <button onclick="openDynamicModal('Tone & Mood'); return false;" class="topic-pill" data-search-terms="tone mood attitude atmosphere feelings emotions vibe reader author">Tone & Mood</button>
                    <button onclick="openDynamicModal('Point of View'); return false;" class="topic-pill" data-search-terms="point of view perspective first second third person narrator view">Point of View</button>
                    <button onclick="openDynamicModal('Imagery & Sensory Details'); return false;" class="topic-pill" data-search-terms="imagery sensory details sight sound smell taste touch crisp aroma">Imagery & Sensory Details</button>
                </div>
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
    const cards = document.querySelectorAll('.literature-card');
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
// Include the modal file
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>


