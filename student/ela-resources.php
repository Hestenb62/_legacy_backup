<?php
// Set variables required by header.php for dynamic content
$pageTitle = "ELA Resources - Hesten's Learning";
$pageDescription = "Improve your English Language Arts skills with our comprehensive resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">


    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">ELA Resources</h1>
            <p class="resource-subtitle">Improve your English Language Arts skills with our comprehensive resources.</p>
            
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
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Reading Comprehension -->
            <div class="resource-card" data-card-category="reading">
                <div class="resource-card-header">
                    <div class="resource-card-icon reading"><i class="fas fa-book-reader"></i></div>
                    <h2 class="resource-card-title">Reading Comprehension</h2>
                </div>
                <p class="resource-card-desc">Enhance your understanding of texts with practice passages, strategies, and quizzes.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Fiction Passages'); return false;" class="topic-pill" data-search-terms="fiction passages short stories novel excerpts mystery adventure reading comprehension">Fiction Passages</button>
                    <button onclick="openDynamicModal('Non-Fiction Articles'); return false;" class="topic-pill" data-search-terms="non-fiction articles science history biographies informative essays reading comprehension">Non-Fiction Articles</button>
                    <button onclick="openDynamicModal('Reading Strategies'); return false;" class="topic-pill" data-search-terms="reading strategies skimming scanning annotating main idea inference comprehension">Reading Strategies</button>
                    <button onclick="openDynamicModal('Comprehension Quizzes'); return false;" class="topic-pill" data-search-terms="comprehension quizzes fictional stories current events academic text practice reading">Comprehension Quizzes</button>
                </div>
                <a href="ela-reading.php" class="card-action-btn">Practice Reading</a>
            </div>

            <!-- 2. Writing Prompts & Guides -->
            <div class="resource-card" data-card-category="writing">
                <div class="resource-card-header">
                    <div class="resource-card-icon writing"><i class="fas fa-pen-nib"></i></div>
                    <h2 class="resource-card-title">Writing Prompts & Guides</h2>
                </div>
                <p class="resource-card-desc">Develop your writing skills with creative prompts, structural guides, and grammar tips.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Creative Writing Prompts'); return false;" class="topic-pill" data-search-terms="creative writing prompts stories narration description writing">Creative Writing Prompts</button>
                    <button onclick="openDynamicModal('Essay Writing Guide'); return false;" class="topic-pill" data-search-terms="essay writing guide structure outline thesis arguments essays">Essay Writing Guide</button>
                    <button onclick="openDynamicModal('Research Paper Outline'); return false;" class="topic-pill" data-search-terms="research paper outline citation sources structure reports essays writing">Research Paper Outline</button>
                    <button onclick="openDynamicModal('Grammar Checklists'); return false;" class="topic-pill" data-search-terms="grammar checklists proofreading revision editing guide writing">Grammar Checklists</button>
                </div>
                <a href="ela-writing.php" class="card-action-btn">Start Writing</a>
            </div>

            <!-- 3. Grammar & Vocabulary -->
            <div class="resource-card" data-card-category="grammar">
                <div class="resource-card-header">
                    <div class="resource-card-icon grammar"><i class="fas fa-language"></i></div>
                    <h2 class="resource-card-title">Grammar & Vocabulary</h2>
                </div>
                <p class="resource-card-desc">Master English grammar rules and expand your vocabulary with interactive exercises and lists.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Parts of Speech'); return false;" class="topic-pill" data-search-terms="parts of speech nouns pronouns verbs adjectives adverbs prepositions conjunctions grammar">Parts of Speech</button>
                    <button onclick="openDynamicModal('Punctuation Rules'); return false;" class="topic-pill" data-search-terms="punctuation rules commas semicolons colons apostrophes quotes hyphens dashes grammar">Punctuation Rules</button>
                    <button onclick="openDynamicModal('Vocabulary Building Exercises'); return false;" class="topic-pill" data-search-terms="vocabulary building exercises academic prefix suffix context clues synonyms antonyms roots">Vocabulary Building Exercises</button>
                    <button onclick="openDynamicModal('Common Errors Guide'); return false;" class="topic-pill" data-search-terms="common errors guide homophones run-on fragments subject verb agreement dangling modifiers">Common Errors Guide</button>
                </div>
                <a href="ela-grammar.php" class="card-action-btn">Improve Grammar & Vocab</a>
            </div>

            <!-- 4. Literature Analysis -->
            <div class="resource-card" data-card-category="literature">
                <div class="resource-card-header">
                    <div class="resource-card-icon literature"><i class="fas fa-book"></i></div>
                    <h2 class="resource-card-title">Literature Analysis</h2>
                </div>
                <p class="resource-card-desc">Explore literary works with analysis guides, character studies, and thematic discussions.</p>
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


