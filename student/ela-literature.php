<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Literature Analysis - Hesten's Learning";
$pageDescription = "Deepen your appreciation for literature by exploring themes, characters, and literary devices.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<style>
/* Page Wrapper spacing */
.page-content-wrapper {
    padding-top: var(--spacing-8);
    padding-bottom: var(--spacing-16);
    min-height: 80vh;
}

/* Header & Intro */
.literature-header {
    text-align: center;
    margin-bottom: var(--spacing-12);
}

.literature-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: var(--spacing-3);
    letter-spacing: -0.025em;
}

.literature-subtitle {
    font-size: 1.125rem;
    color: var(--color-text-muted);
    max-width: 700px;
    margin: 0 auto var(--spacing-8) auto;
    line-height: 1.6;
}

/* Search and Filter Container */
.search-filter-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--spacing-6);
    background-color: var(--color-bg-surface);
    padding: var(--spacing-6);
    border-radius: var(--radius-2xl);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-md);
    max-width: 900px;
    margin: 0 auto;
}

/* Search Box */
.search-box {
    position: relative;
    width: 100%;
    max-width: 600px;
}

.search-box input {
    width: 100%;
    padding: var(--spacing-3) var(--spacing-4) var(--spacing-3) 2.75rem;
    font-size: 1rem;
    border-radius: var(--radius-full);
    border: 1.5px solid var(--color-border);
    background-color: var(--color-bg-base);
    color: var(--color-text-main);
    transition: all 0.2s ease;
}

.search-box input:focus {
    outline: none;
    border-color: var(--color-primary);
    background-color: var(--color-bg-surface);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-text-muted);
    font-size: 1rem;
    pointer-events: none;
}

.clear-btn {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-text-muted);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s;
}

.clear-btn:hover {
    background-color: var(--color-border);
    color: var(--color-text-main);
}

/* Filter Tabs */
.filter-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-2);
    width: 100%;
}

.filter-tab {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: var(--radius-full);
    background-color: var(--color-bg-base);
    color: var(--color-text-muted);
    border: 1px solid var(--color-border);
    transition: all 0.2s ease;
    cursor: pointer;
}

.filter-tab:hover {
    background-color: var(--color-border);
    color: var(--color-text-main);
}

.filter-tab.active {
    background-color: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
}

/* Cards Grid */
.literature-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-6);
    margin-top: var(--spacing-8);
}

@media (min-width: 768px) {
    .literature-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .literature-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Card Styling */
.literature-card {
    background-color: var(--color-bg-surface);
    border-radius: var(--radius-2xl);
    border: 1px solid var(--color-border);
    padding: var(--spacing-6);
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-md);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease;
    height: 100%;
}

.literature-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(79, 70, 229, 0.3);
}

.literature-card-header {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-3);
}

.literature-card-icon {
    width: 2.75rem;
    height: 2.75rem;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    box-shadow: var(--shadow-sm);
}

/* Category Gradient Schemes */
.literature-card-icon.devices { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.literature-card-icon.characters { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.literature-card-icon.themes { background: linear-gradient(135deg, #0d9488, #0f766e); }
.literature-card-icon.genres { background: linear-gradient(135deg, #db2777, #be185d); }
.literature-card-icon.plot { background: linear-gradient(135deg, #ea580c, #c2410c); }
.literature-card-icon.craft { background: linear-gradient(135deg, #d97706, #b45309); }

.literature-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin: 0;
}

.literature-card-desc {
    font-size: 0.95rem;
    color: var(--color-text-muted);
    margin-bottom: var(--spacing-4);
    line-height: 1.5;
}

/* Tag Pills Container */
.pills-container {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: auto; /* Push to bottom */
}

/* Topic Pills */
.topic-pill {
    padding: 0.5rem 0.85rem;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: var(--radius-lg);
    background-color: var(--color-bg-base);
    color: var(--color-text-main);
    border: 1px solid var(--color-border);
    transition: all 0.2s ease;
    cursor: pointer;
    text-align: left;
    display: flex;
    align-items: center;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.topic-pill::before {
    content: "\f105";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    margin-right: 0.5rem;
    color: var(--color-primary);
    transition: transform 0.2s ease;
}

.topic-pill:hover {
    background-color: rgba(79, 70, 229, 0.08);
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.topic-pill:hover::before {
    transform: translateX(3px);
}

.topic-pill:focus-visible {
    outline: 3px solid var(--color-primary) !important;
    outline-offset: 1px;
}

/* Empty State Styling */
.no-results-box {
    text-align: center;
    padding: var(--spacing-12) var(--spacing-6);
    background-color: var(--color-bg-surface);
    border-radius: var(--radius-2xl);
    border: 1px dashed var(--color-border);
    max-width: 500px;
    margin: var(--spacing-12) auto;
    box-shadow: var(--shadow-sm);
}

.no-results-icon {
    font-size: 3rem;
    color: var(--color-text-muted);
    margin-bottom: var(--spacing-4);
}

.no-results-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin-bottom: var(--spacing-2);
}

.no-results-desc {
    color: var(--color-text-muted);
    margin-bottom: var(--spacing-6);
}

.reset-search-btn {
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 700;
    background-color: var(--color-primary);
    color: white;
    border-radius: var(--radius-full);
    border: none;
    cursor: pointer;
    transition: background-color 0.2s;
    box-shadow: var(--shadow-sm);
}

.reset-search-btn:hover {
    background-color: var(--color-primary-hover);
}
</style>

    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="literature-header">
            <h1 class="literature-title">Literature Analysis</h1>
            <p class="literature-subtitle">Deepen your appreciation for literature by exploring themes, characters, and literary devices.</p>
            
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
        <div class="literature-grid" id="topics-grid">
            <!-- 1. Literary Devices -->
            <div class="literature-card" data-card-category="devices">
                <div class="literature-card-header">
                    <div class="literature-card-icon devices"><i class="fas fa-highlighter"></i></div>
                    <h2 class="literature-card-title">Literary Devices</h2>
                </div>
                <p class="literature-card-desc">Understand the various techniques authors use to convey meaning and evoke emotion.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Metaphor & Simile'); return false;" class="topic-pill" data-search-terms="metaphor simile comparisons like as stars sunshine thief">Metaphor & Simile</button>
                    <button onclick="openDynamicModal('Imagery & Symbolism'); return false;" class="topic-pill" data-search-terms="imagery symbolism details representations dove colors red rose sensory">Imagery & Symbolism</button>
                    <button onclick="openDynamicModal('Foreshadowing & Flashback'); return false;" class="topic-pill" data-search-terms="foreshadowing flashback hints timeline future past events memory">Foreshadowing & Flashback</button>
                    <button onclick="openDynamicModal('Irony & Satire'); return false;" class="topic-pill" data-search-terms="irony satire sarcasm humor mockery drama critical">Irony & Satire</button>
                </div>
            </div>

            <!-- 2. Character Analysis Templates -->
            <div class="literature-card" data-card-category="characters">
                <div class="literature-card-header">
                    <div class="literature-card-icon characters"><i class="fas fa-users"></i></div>
                    <h2 class="literature-card-title">Character Analysis</h2>
                </div>
                <p class="literature-card-desc">Learn how to analyze characters' motivations, development, and roles in a story.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Protagonist & Antagonist'); return false;" class="topic-pill" data-search-terms="protagonist antagonist hero villain main character rival conflict">Protagonist & Antagonist</button>
                    <button onclick="openDynamicModal('Character Archetypes'); return false;" class="topic-pill" data-search-terms="character archetypes mentor trickster explorer patterns profiles shadow">Character Archetypes</button>
                    <button onclick="openDynamicModal('Character Development Arc'); return false;" class="topic-pill" data-search-terms="character development arc growth change journey path transformation">Character Development Arc</button>
                    <button onclick="openDynamicModal('Character vs. Conflict'); return false;" class="topic-pill" data-search-terms="character vs conflict self society nature struggles battles hurdles">Character vs. Conflict</button>
                </div>
            </div>

            <!-- 3. Theme Exploration Guides -->
            <div class="literature-card" data-card-category="themes">
                <div class="literature-card-header">
                    <div class="literature-card-icon themes"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="literature-card-title">Theme Exploration</h2>
                </div>
                <p class="literature-card-desc">Discover and interpret the central ideas and messages conveyed in literary works.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Identifying Themes'); return false;" class="topic-pill" data-search-terms="identifying themes central idea core message moral lesson main point">Identifying Themes</button>
                    <button onclick="openDynamicModal('Universal Themes'); return false;" class="topic-pill" data-search-terms="universal themes love war freedom betrayal coming of age common">Universal Themes</button>
                    <button onclick="openDynamicModal('Symbolism & Theme'); return false;" class="topic-pill" data-search-terms="symbolism theme connections representations objects abstract meanings">Symbolism & Theme</button>
                    <button onclick="openDynamicModal('Author\'s Message'); return false;" class="topic-pill" data-search-terms="author's message purpose intent moral lesson view comment perspective">Author's Message</button>
                </div>
            </div>

            <!-- 4. Genre Studies -->
            <div class="literature-card" data-card-category="genres">
                <div class="literature-card-header">
                    <div class="literature-card-icon genres"><i class="fas fa-folder-open"></i></div>
                    <h2 class="literature-card-title">Genre Studies</h2>
                </div>
                <p class="literature-card-desc">Understand the conventions and characteristics of different literary genres.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fiction Genres'); return false;" class="topic-pill" data-search-terms="fiction genres mystery sci-fi fantasy historical realistic stories novels">Fiction Genres</button>
                    <button onclick="openDynamicModal('Non-Fiction Genres'); return false;" class="topic-pill" data-search-terms="non-fiction genres biography autobiography essay articles informational real facts">Non-Fiction Genres</button>
                    <button onclick="openDynamicModal('Poetry Forms'); return false;" class="topic-pill" data-search-terms="poetry forms haiku sonnet free verse rhyme rhythm stanzas lines">Poetry Forms</button>
                    <button onclick="openDynamicModal('Drama & Playwriting'); return false;" class="topic-pill" data-search-terms="drama playwriting scripts dialogue theater acts scenes stage direct">Drama & Playwriting</button>
                </div>
            </div>

            <!-- 5. Plot & Structure Analysis -->
            <div class="literature-card" data-card-category="plot">
                <div class="literature-card-header">
                    <div class="literature-card-icon plot"><i class="fas fa-sitemap"></i></div>
                    <h2 class="literature-card-title">Plot & Structure</h2>
                </div>
                <p class="literature-card-desc">Break down narratives into exposition, rising action, climax, and resolution.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Freytag\'s Pyramid'); return false;" class="topic-pill" data-search-terms="freytag's pyramid exposition rising action climax falling resolution arc plot">Freytag's Pyramid</button>
                    <button onclick="openDynamicModal('Conflict Types'); return false;" class="topic-pill" data-search-terms="conflict types character vs self man nature society battles clash">Conflict Types</button>
                    <button onclick="openDynamicModal('Pacing & Suspense'); return false;" class="topic-pill" data-search-terms="pacing suspense timing excitement tension cliffhangers speed hook">Pacing & Suspense</button>
                    <button onclick="openDynamicModal('Narrative Arcs'); return false;" class="topic-pill" data-search-terms="narrative arcs quest tragedy voyage return plot outlines tracks">Narrative Arcs</button>
                </div>
            </div>

            <!-- 6. Author's Craft -->
            <div class="literature-card" data-card-category="craft">
                <div class="literature-card-header">
                    <div class="literature-card-icon craft"><i class="fas fa-feather-alt"></i></div>
                    <h2 class="literature-card-title">Author's Craft</h2>
                </div>
                <p class="literature-card-desc">Examine how authors use language, style, tone, and point of view to shape their works.</p>
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
