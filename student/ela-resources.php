<?php
// Set variables required by header.php for dynamic content
$pageTitle = "ELA Resources - Hesten's Learning";
$pageDescription = "Improve your English Language Arts skills with our comprehensive resources.";
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
.resources-header {
    text-align: center;
    margin-bottom: var(--spacing-12);
}

.resources-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: var(--spacing-3);
    letter-spacing: -0.025em;
}

.resources-subtitle {
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

/* Resources Cards Grid */
.resources-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-6);
    margin-top: var(--spacing-8);
}

@media (min-width: 768px) {
    .resources-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .resources-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Card Styling */
.resources-card {
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

.resources-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(79, 70, 229, 0.3);
}

.resources-card-header {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-3);
}

.resources-card-icon {
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
.resources-card-icon.reading { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.resources-card-icon.writing { background: linear-gradient(135deg, #0d9488, #0f766e); }
.resources-card-icon.grammar { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.resources-card-icon.literature { background: linear-gradient(135deg, #ea580c, #c2410c); }

.resources-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin: 0;
}

.resources-card-desc {
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
    margin-bottom: var(--spacing-6);
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

/* Action Button */
.card-action-btn {
    display: block;
    width: 100%;
    text-align: center;
    padding: 0.625rem 1rem;
    font-size: 0.875rem;
    font-weight: 700;
    border-radius: var(--radius-lg);
    background-color: var(--color-primary);
    color: white;
    text-decoration: none;
    transition: background-color 0.2s, transform 0.2s;
    margin-top: auto; /* Push to bottom of flex container */
    border: none;
    cursor: pointer;
    box-shadow: var(--shadow-sm);
}

.card-action-btn:hover {
    background-color: var(--color-primary-hover);
    transform: translateY(-1px);
    color: white;
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
        <div class="resources-header">
            <h1 class="resources-title">ELA Resources</h1>
            <p class="resources-subtitle">Improve your English Language Arts skills with our comprehensive resources.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search resources, guides, tools..." aria-label="Search resources">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter resources by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Resources</button>
                    <button class="filter-tab" data-category="reading" role="tab" aria-selected="false">Reading</button>
                    <button class="filter-tab" data-category="writing" role="tab" aria-selected="false">Writing</button>
                    <button class="filter-tab" data-category="grammar" role="tab" aria-selected="false">Grammar & Vocab</button>
                    <button class="filter-tab" data-category="literature" role="tab" aria-selected="false">Literature</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="resources-grid" id="topics-grid">
            <!-- 1. Reading Comprehension -->
            <div class="resources-card" data-card-category="reading">
                <div class="resources-card-header">
                    <div class="resources-card-icon reading"><i class="fas fa-book-reader"></i></div>
                    <h2 class="resources-card-title">Reading Comprehension</h2>
                </div>
                <p class="resources-card-desc">Enhance your understanding of texts with practice passages, strategies, and quizzes.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fiction Passages'); return false;" class="topic-pill" data-search-terms="fiction passages short stories novel excerpts mystery adventure reading comprehension">Fiction Passages</button>
                    <button onclick="openDynamicModal('Non-Fiction Articles'); return false;" class="topic-pill" data-search-terms="non-fiction articles science history biographies informative essays reading comprehension">Non-Fiction Articles</button>
                    <button onclick="openDynamicModal('Reading Strategies'); return false;" class="topic-pill" data-search-terms="reading strategies skimming scanning annotating main idea inference comprehension">Reading Strategies</button>
                    <button onclick="openDynamicModal('Comprehension Quizzes'); return false;" class="topic-pill" data-search-terms="comprehension quizzes fictional stories current events academic text practice reading">Comprehension Quizzes</button>
                </div>
                <a href="ela-reading.php" class="card-action-btn">Practice Reading</a>
            </div>

            <!-- 2. Writing Prompts & Guides -->
            <div class="resources-card" data-card-category="writing">
                <div class="resources-card-header">
                    <div class="resources-card-icon writing"><i class="fas fa-pen-nib"></i></div>
                    <h2 class="resources-card-title">Writing Prompts & Guides</h2>
                </div>
                <p class="resources-card-desc">Develop your writing skills with creative prompts, structural guides, and grammar tips.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Creative Writing Prompts'); return false;" class="topic-pill" data-search-terms="creative writing prompts stories narration description writing">Creative Writing Prompts</button>
                    <button onclick="openDynamicModal('Essay Writing Guide'); return false;" class="topic-pill" data-search-terms="essay writing guide structure outline thesis arguments essays">Essay Writing Guide</button>
                    <button onclick="openDynamicModal('Research Paper Outline'); return false;" class="topic-pill" data-search-terms="research paper outline citation sources structure reports essays writing">Research Paper Outline</button>
                    <button onclick="openDynamicModal('Grammar Checklists'); return false;" class="topic-pill" data-search-terms="grammar checklists proofreading revision editing guide writing">Grammar Checklists</button>
                </div>
                <a href="ela-writing.php" class="card-action-btn">Start Writing</a>
            </div>

            <!-- 3. Grammar & Vocabulary -->
            <div class="resources-card" data-card-category="grammar">
                <div class="resources-card-header">
                    <div class="resources-card-icon grammar"><i class="fas fa-language"></i></div>
                    <h2 class="resources-card-title">Grammar & Vocabulary</h2>
                </div>
                <p class="resources-card-desc">Master English grammar rules and expand your vocabulary with interactive exercises and lists.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Parts of Speech'); return false;" class="topic-pill" data-search-terms="parts of speech nouns pronouns verbs adjectives adverbs prepositions conjunctions grammar">Parts of Speech</button>
                    <button onclick="openDynamicModal('Punctuation Rules'); return false;" class="topic-pill" data-search-terms="punctuation rules commas semicolons colons apostrophes quotes hyphens dashes grammar">Punctuation Rules</button>
                    <button onclick="openDynamicModal('Vocabulary Building Exercises'); return false;" class="topic-pill" data-search-terms="vocabulary building exercises academic prefix suffix context clues synonyms antonyms roots">Vocabulary Building Exercises</button>
                    <button onclick="openDynamicModal('Common Errors Guide'); return false;" class="topic-pill" data-search-terms="common errors guide homophones run-on fragments subject verb agreement dangling modifiers">Common Errors Guide</button>
                </div>
                <a href="ela-grammar.php" class="card-action-btn">Improve Grammar & Vocab</a>
            </div>

            <!-- 4. Literature Analysis -->
            <div class="resources-card" data-card-category="literature">
                <div class="resources-card-header">
                    <div class="resources-card-icon literature"><i class="fas fa-book"></i></div>
                    <h2 class="resources-card-title">Literature Analysis</h2>
                </div>
                <p class="resources-card-desc">Explore literary works with analysis guides, character studies, and thematic discussions.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Literary Devices'); return false;" class="topic-pill" data-search-terms="literary devices metaphor simile imagery symbolism foreshadowing flashback irony satire analysis">Literary Devices</button>
                    <button onclick="openDynamicModal('Character Analysis Templates'); return false;" class="topic-pill" data-search-terms="character analysis templates protagonist antagonist archetypes development arc conflict">Character Analysis Templates</button>
                    <button onclick="openDynamicModal('Theme Exploration Guides'); return false;" class="topic-pill" data-search-terms="theme exploration guides identifying themes universal symbolism author message">Theme Exploration Guides</button>
                    <button onclick="openDynamicModal('Genre Studies'); return false;" class="topic-pill" data-search-terms="genre studies fiction non-fiction poetry forms drama playwriting analysis">Genre Studies</button>
                </div>
                <a href="ela-literature.php" class="card-action-btn">Analyze Literature</a>
            </div>
        </div>

        <!-- Empty State -->
        <div id="no-results-state" class="no-results-box" style="display: none;">
            <i class="fas fa-search-minus no-results-icon"></i>
            <h3 class="no-results-title">No matching resources found</h3>
            <p class="no-results-desc">Try checking your spelling or selecting a different category tab.</p>
            <button id="reset-search-btn" class="reset-search-btn">Reset Search</button>
        </div>
    </main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('topic-search');
    const clearBtn = document.getElementById('clear-search');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.resources-card');
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
