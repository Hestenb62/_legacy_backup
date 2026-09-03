<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Writing Prompts & Guides - Hesten's Learning";
$pageDescription = "Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">


    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">Writing Prompts & Guides</h1>
            <p class="resource-subtitle">Unleash your creativity and refine your writing skills with our diverse prompts and helpful guides.</p>
            
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
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Creative Writing Prompts -->
            <div class="resource-card" data-card-category="creative">
                <div class="resource-card-header">
                    <div class="resource-card-icon creative"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="resource-card-title">Creative Writing Prompts</h2>
                </div>
                <p class="resource-card-desc">Spark your imagination with prompts for short stories, poetry, and reflective pieces.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fantasy Prompts'); return false;" class="topic-pill" data-search-terms="fantasy prompts short stories imagination creative writing">Fantasy Prompts</button>
                    <button onclick="openDynamicModal('Sci-Fi Scenarios'); return false;" class="topic-pill" data-search-terms="sci-fi scenarios space technology future creative writing">Sci-Fi Scenarios</button>
                    <button onclick="openDynamicModal('Poetry Starters'); return false;" class="topic-pill" data-search-terms="poetry starters rhyme verses imagination starters creative writing">Poetry Starters</button>
                    <button onclick="openDynamicModal('Personal Narrative Ideas'); return false;" class="topic-pill" data-search-terms="personal narrative ideas reflective pieces memory creative writing">Personal Narrative Ideas</button>
                </div>
            </div>

            <!-- 2. Essay Writing Guide -->
            <div class="resource-card" data-card-category="essay">
                <div class="resource-card-header">
                    <div class="resource-card-icon essay"><i class="fas fa-file-alt"></i></div>
                    <h2 class="resource-card-title">Essay Writing Guide</h2>
                </div>
                <p class="resource-card-desc">Learn the structure and techniques for writing compelling essays, from argumentative to expository.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Introduction & Thesis'); return false;" class="topic-pill" data-search-terms="introduction thesis hook claims essay writing guide structure">Introduction & Thesis</button>
                    <button onclick="openDynamicModal('Body Paragraph Development'); return false;" class="topic-pill" data-search-terms="body paragraph development evidence support transitions essay writing guide">Body Paragraph Development</button>
                    <button onclick="openDynamicModal('Conclusion Strategies'); return false;" class="topic-pill" data-search-terms="conclusion strategies summarizing final thoughts essay writing guide">Conclusion Strategies</button>
                    <button onclick="openDynamicModal('Citing Sources'); return false;" class="topic-pill" data-search-terms="citing sources bibliography mla apa plagiarism essay writing guide">Citing Sources</button>
                </div>
            </div>

            <!-- 3. Research Paper Outline -->
            <div class="resource-card" data-card-category="research">
                <div class="resource-card-header">
                    <div class="resource-card-icon research"><i class="fas fa-clipboard-list"></i></div>
                    <h2 class="resource-card-title">Research Paper Outline</h2>
                </div>
                <p class="resource-card-desc">Organize your research effectively with our detailed outlines and planning tools for academic papers.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Topic Selection'); return false;" class="topic-pill" data-search-terms="topic selection thesis focus planning research paper outline">Topic Selection</button>
                    <button onclick="openDynamicModal('Source Evaluation'); return false;" class="topic-pill" data-search-terms="source evaluation credibility bibliography facts research paper outline">Source Evaluation</button>
                    <button onclick="openDynamicModal('Outline Templates'); return false;" class="topic-pill" data-search-terms="outline templates structure sections organizing research paper outline">Outline Templates</button>
                    <button onclick="openDynamicModal('Drafting & Revision'); return false;" class="topic-pill" data-search-terms="drafting revision editing proofreading research paper outline">Drafting & Revision</button>
                </div>
            </div>

            <!-- 4. Grammar Checklists -->
            <div class="resource-card" data-card-category="grammar">
                <div class="resource-card-header">
                    <div class="resource-card-icon grammar"><i class="fas fa-check-square"></i></div>
                    <h2 class="resource-card-title">Grammar Checklists</h2>
                </div>
                <p class="resource-card-desc">Ensure your writing is grammatically sound with easy-to-follow checklists for common errors.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Sentence Structure'); return false;" class="topic-pill" data-search-terms="sentence structure run-on fragments clauses grammar checklists">Sentence Structure</button>
                    <button onclick="openDynamicModal('Verb Tenses'); return false;" class="topic-pill" data-search-terms="verb tenses past present future aspects grammar checklists">Verb Tenses</button>
                    <button onclick="openDynamicModal('Punctuation Usage'); return false;" class="topic-pill" data-search-terms="punctuation usage commas periods semicolons colons apostrophes grammar checklists">Punctuation Usage</button>
                    <button onclick="openDynamicModal('Subject-Verb Agreement'); return false;" class="topic-pill" data-search-terms="subject verb agreement singular plural matching grammar checklists">Subject-Verb Agreement</button>
                </div>
            </div>

            <!-- 5. Argumentative Writing -->
            <div class="resource-card" data-card-category="argumentative">
                <div class="resource-card-header">
                    <div class="resource-card-icon argumentative"><i class="fas fa-gavel"></i></div>
                    <h2 class="resource-card-title">Argumentative Writing</h2>
                </div>
                <p class="resource-card-desc">Learn to construct strong arguments, support claims with evidence, and refute counterarguments.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Developing Arguments'); return false;" class="topic-pill" data-search-terms="developing arguments claims thesis persuasive argumentative writing">Developing Arguments</button>
                    <button onclick="openDynamicModal('Evidence & Support'); return false;" class="topic-pill" data-search-terms="evidence support facts citations logic argumentative writing">Evidence & Support</button>
                    <button onclick="openDynamicModal('Counterarguments'); return false;" class="topic-pill" data-search-terms="counterarguments refuting opposing views argumentative writing">Counterarguments</button>
                    <button onclick="openDynamicModal('Persuasive Techniques'); return false;" class="topic-pill" data-search-terms="persuasive techniques ethos pathos logos argumentative writing">Persuasive Techniques</button>
                </div>
            </div>

            <!-- 6. Narrative Writing -->
            <div class="resource-card" data-card-category="narrative">
                <div class="resource-card-header">
                    <div class="resource-card-icon narrative"><i class="fas fa-scroll"></i></div>
                    <h2 class="resource-card-title">Narrative Writing</h2>
                </div>
                <p class="resource-card-desc">Craft compelling stories with engaging plots, vivid characters, and descriptive settings.</p>
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


