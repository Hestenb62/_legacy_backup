<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Writing Prompts & Guides - Hesten's Learning";
$pageDescription = "Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.";
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
.writing-header {
    text-align: center;
    margin-bottom: var(--spacing-12);
}

.writing-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: var(--spacing-3);
    letter-spacing: -0.025em;
}

.writing-subtitle {
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

/* Writing Cards Grid */
.writing-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-6);
    margin-top: var(--spacing-8);
}

@media (min-width: 768px) {
    .writing-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .writing-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Card Styling */
.writing-card {
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

.writing-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(79, 70, 229, 0.3);
}

.writing-card-header {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-3);
}

.writing-card-icon {
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
.writing-card-icon.creative { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.writing-card-icon.essay { background: linear-gradient(135deg, #0d9488, #0f766e); }
.writing-card-icon.research { background: linear-gradient(135deg, #db2777, #be185d); }
.writing-card-icon.grammar { background: linear-gradient(135deg, #d97706, #b45309); }
.writing-card-icon.argumentative { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.writing-card-icon.narrative { background: linear-gradient(135deg, #ea580c, #c2410c); }

.writing-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin: 0;
}

.writing-card-desc {
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
        <div class="writing-header">
            <h1 class="writing-title">Writing Prompts & Guides</h1>
            <p class="writing-subtitle">Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search writing topics, prompts, guides..." aria-label="Search writing topics">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter topics by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button class="filter-tab" data-category="creative" role="tab" aria-selected="false">Creative</button>
                    <button class="filter-tab" data-category="essay" role="tab" aria-selected="false">Essay Guide</button>
                    <button class="filter-tab" data-category="research" role="tab" aria-selected="false">Research Paper</button>
                    <button class="filter-tab" data-category="grammar" role="tab" aria-selected="false">Grammar Checklists</button>
                    <button class="filter-tab" data-category="argumentative" role="tab" aria-selected="false">Argumentative</button>
                    <button class="filter-tab" data-category="narrative" role="tab" aria-selected="false">Narrative</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="writing-grid" id="topics-grid">
            <!-- 1. Creative Writing Prompts -->
            <div class="writing-card" data-card-category="creative">
                <div class="writing-card-header">
                    <div class="writing-card-icon creative"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="writing-card-title">Creative Writing Prompts</h2>
                </div>
                <p class="writing-card-desc">Spark your imagination with prompts for short stories, poetry, and reflective pieces.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fantasy Prompts'); return false;" class="topic-pill" data-search-terms="fantasy prompts short stories imagination creative writing">Fantasy Prompts</button>
                    <button onclick="openDynamicModal('Sci-Fi Scenarios'); return false;" class="topic-pill" data-search-terms="sci-fi scenarios space technology future creative writing">Sci-Fi Scenarios</button>
                    <button onclick="openDynamicModal('Poetry Starters'); return false;" class="topic-pill" data-search-terms="poetry starters rhyme verses imagination starters creative writing">Poetry Starters</button>
                    <button onclick="openDynamicModal('Personal Narrative Ideas'); return false;" class="topic-pill" data-search-terms="personal narrative ideas reflective pieces memory creative writing">Personal Narrative Ideas</button>
                </div>
            </div>

            <!-- 2. Essay Writing Guide -->
            <div class="writing-card" data-card-category="essay">
                <div class="writing-card-header">
                    <div class="writing-card-icon essay"><i class="fas fa-file-alt"></i></div>
                    <h2 class="writing-card-title">Essay Writing Guide</h2>
                </div>
                <p class="writing-card-desc">Learn the structure and techniques for writing compelling essays, from argumentative to expository.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Introduction & Thesis'); return false;" class="topic-pill" data-search-terms="introduction thesis hook claims essay writing guide structure">Introduction & Thesis</button>
                    <button onclick="openDynamicModal('Body Paragraph Development'); return false;" class="topic-pill" data-search-terms="body paragraph development evidence support transitions essay writing guide">Body Paragraph Development</button>
                    <button onclick="openDynamicModal('Conclusion Strategies'); return false;" class="topic-pill" data-search-terms="conclusion strategies summarizing final thoughts essay writing guide">Conclusion Strategies</button>
                    <button onclick="openDynamicModal('Citing Sources'); return false;" class="topic-pill" data-search-terms="citing sources bibliography mla apa plagiarism essay writing guide">Citing Sources</button>
                </div>
            </div>

            <!-- 3. Research Paper Outline -->
            <div class="writing-card" data-card-category="research">
                <div class="writing-card-header">
                    <div class="writing-card-icon research"><i class="fas fa-clipboard-list"></i></div>
                    <h2 class="writing-card-title">Research Paper Outline</h2>
                </div>
                <p class="writing-card-desc">Organize your research effectively with our detailed outlines and planning tools for academic papers.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Topic Selection'); return false;" class="topic-pill" data-search-terms="topic selection thesis focus planning research paper outline">Topic Selection</button>
                    <button onclick="openDynamicModal('Source Evaluation'); return false;" class="topic-pill" data-search-terms="source evaluation credibility bibliography facts research paper outline">Source Evaluation</button>
                    <button onclick="openDynamicModal('Outline Templates'); return false;" class="topic-pill" data-search-terms="outline templates structure sections organizing research paper outline">Outline Templates</button>
                    <button onclick="openDynamicModal('Drafting & Revision'); return false;" class="topic-pill" data-search-terms="drafting revision editing proofreading research paper outline">Drafting & Revision</button>
                </div>
            </div>

            <!-- 4. Grammar Checklists -->
            <div class="writing-card" data-card-category="grammar">
                <div class="writing-card-header">
                    <div class="writing-card-icon grammar"><i class="fas fa-check-square"></i></div>
                    <h2 class="writing-card-title">Grammar Checklists</h2>
                </div>
                <p class="writing-card-desc">Ensure your writing is grammatically sound with easy-to-follow checklists for common errors.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Sentence Structure'); return false;" class="topic-pill" data-search-terms="sentence structure run-on fragments clauses grammar checklists">Sentence Structure</button>
                    <button onclick="openDynamicModal('Verb Tenses'); return false;" class="topic-pill" data-search-terms="verb tenses past present future aspects grammar checklists">Verb Tenses</button>
                    <button onclick="openDynamicModal('Punctuation Usage'); return false;" class="topic-pill" data-search-terms="punctuation usage commas periods semicolons colons apostrophes grammar checklists">Punctuation Usage</button>
                    <button onclick="openDynamicModal('Subject-Verb Agreement'); return false;" class="topic-pill" data-search-terms="subject verb agreement singular plural matching grammar checklists">Subject-Verb Agreement</button>
                </div>
            </div>

            <!-- 5. Argumentative Writing -->
            <div class="writing-card" data-card-category="argumentative">
                <div class="writing-card-header">
                    <div class="writing-card-icon argumentative"><i class="fas fa-gavel"></i></div>
                    <h2 class="writing-card-title">Argumentative Writing</h2>
                </div>
                <p class="writing-card-desc">Learn to construct strong arguments, support claims with evidence, and refute counterarguments.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Developing Arguments'); return false;" class="topic-pill" data-search-terms="developing arguments claims thesis persuasive argumentative writing">Developing Arguments</button>
                    <button onclick="openDynamicModal('Evidence & Support'); return false;" class="topic-pill" data-search-terms="evidence support facts citations logic argumentative writing">Evidence & Support</button>
                    <button onclick="openDynamicModal('Counterarguments'); return false;" class="topic-pill" data-search-terms="counterarguments refuting opposing views argumentative writing">Counterarguments</button>
                    <button onclick="openDynamicModal('Persuasive Techniques'); return false;" class="topic-pill" data-search-terms="persuasive techniques ethos pathos logos argumentative writing">Persuasive Techniques</button>
                </div>
            </div>

            <!-- 6. Narrative Writing -->
            <div class="writing-card" data-card-category="narrative">
                <div class="writing-card-header">
                    <div class="writing-card-icon narrative"><i class="fas fa-scroll"></i></div>
                    <h2 class="writing-card-title">Narrative Writing</h2>
                </div>
                <p class="writing-card-desc">Craft compelling stories with engaging plots, vivid characters, and descriptive settings.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Story Planning'); return false;" class="topic-pill" data-search-terms="story planning plot outline arcs narrative writing">Story Planning</button>
                    <button onclick="openDynamicModal('Character Development'); return false;" class="topic-pill" data-search-terms="character development traits motivations protagonist antagonist narrative writing">Character Development</button>
                    <button onclick="openDynamicModal('Setting the Scene'); return false;" class="topic-pill" data-search-terms="setting the scene atmosphere description setting elements narrative writing">Setting the Scene</button>
                    <button onclick="openDynamicModal('Dialogue Writing'); return false;" class="topic-pill" data-search-terms="dialogue writing quotation marks direct speech conversations narrative writing">Dialogue Writing</button>
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
    const cards = document.querySelectorAll('.writing-card');
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
