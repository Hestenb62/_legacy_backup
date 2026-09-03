<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Reading Comprehension - Hesten's Learning";
$pageDescription = "Practice and improve your reading comprehension skills with a variety of texts and exercises.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">


    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">Reading Comprehension</h1>
            <p class="resource-subtitle">Practice and improve your reading comprehension skills with a variety of texts and exercises.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search reading topics, passages, quizzes..." aria-label="Search reading topics">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter topics by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button class="filter-tab" data-category="fiction" role="tab" aria-selected="false">Fiction Passages</button>
                    <button class="filter-tab" data-category="nonfiction" role="tab" aria-selected="false">Non-Fiction Articles</button>
                    <button class="filter-tab" data-category="strategies" role="tab" aria-selected="false">Reading Strategies</button>
                    <button class="filter-tab" data-category="quizzes" role="tab" aria-selected="false">Comprehension Quizzes</button>
                    <button class="filter-tab" data-category="vocabulary" role="tab" aria-selected="false">Vocabulary in Context</button>
                    <button class="filter-tab" data-category="elements" role="tab" aria-selected="false">Literary Elements</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Fiction Passages -->
            <div class="resource-card" data-card-category="fiction">
                <div class="resource-card-header">
                    <div class="resource-card-icon fiction"><i class="fas fa-book-open"></i></div>
                    <h2 class="resource-card-title">Fiction Passages</h2>
                </div>
                <p class="resource-card-desc">Engage with diverse fictional stories and answer questions to test your understanding.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Short Stories'); return false;" class="topic-pill" data-search-terms="short stories fiction narrative plot tales readers">Short Stories</button>
                    <button onclick="openDynamicModal('Novel Excerpts'); return false;" class="topic-pill" data-search-terms="novel excerpts book chapters passages long reading fiction">Novel Excerpts</button>
                    <button onclick="openDynamicModal('Fantasy & Sci-Fi'); return false;" class="topic-pill" data-search-terms="fantasy sci-fi magic space future dragons technology fiction">Fantasy & Sci-Fi</button>
                    <button onclick="openDynamicModal('Mystery & Adventure'); return false;" class="topic-pill" data-search-terms="mystery adventure detective puzzle suspense exciting fiction">Mystery & Adventure</button>
                </div>
            </div>

            <!-- 2. Non-Fiction Articles -->
            <div class="resource-card" data-card-category="nonfiction">
                <div class="resource-card-header">
                    <div class="resource-card-icon nonfiction"><i class="fas fa-newspaper"></i></div>
                    <h2 class="resource-card-title">Non-Fiction Articles</h2>
                </div>
                <p class="resource-card-desc">Improve your ability to extract information and analyze arguments from various non-fiction texts.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Science Articles'); return false;" class="topic-pill" data-search-terms="science articles non-fiction space nature research facts biology">Science Articles</button>
                    <button onclick="openDynamicModal('Historical Texts'); return false;" class="topic-pill" data-search-terms="historical texts non-fiction history past events documents">Historical Texts</button>
                    <button onclick="openDynamicModal('Biographies'); return false;" class="topic-pill" data-search-terms="biographies non-fiction life stories famous people real life">Biographies</button>
                    <button onclick="openDynamicModal('Informative Essays'); return false;" class="topic-pill" data-search-terms="informative essays arguments facts analysis explaining structure non-fiction">Informative Essays</button>
                </div>
            </div>

            <!-- 3. Reading Strategies -->
            <div class="resource-card" data-card-category="strategies">
                <div class="resource-card-header">
                    <div class="resource-card-icon strategies"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="resource-card-title">Reading Strategies</h2>
                </div>
                <p class="resource-card-desc">Learn effective techniques for active reading, critical thinking, and summarizing texts.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Skimming & Scanning'); return false;" class="topic-pill" data-search-terms="skimming scanning speed reading quickly details main ideas strategies">Skimming & Scanning</button>
                    <button onclick="openDynamicModal('Annotating Texts'); return false;" class="topic-pill" data-search-terms="annotating texts notes margins highlighting marking active reading strategies">Annotating Texts</button>
                    <button onclick="openDynamicModal('Identifying Main Idea'); return false;" class="topic-pill" data-search-terms="identifying main idea central theme core topic summary details strategies">Identifying Main Idea</button>
                    <button onclick="openDynamicModal('Inference Skills'); return false;" class="topic-pill" data-search-terms="inference skills reading between lines clues context deduction strategies">Inference Skills</button>
                </div>
            </div>

            <!-- 4. Comprehension Quizzes -->
            <div class="resource-card" data-card-category="quizzes">
                <div class="resource-card-header">
                    <div class="resource-card-icon quizzes"><i class="fas fa-question-circle"></i></div>
                    <h2 class="resource-card-title">Comprehension Quizzes</h2>
                </div>
                <p class="resource-card-desc">Test your understanding with interactive quizzes after reading various passages.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Quiz: Fictional Stories'); return false;" class="topic-pill" data-search-terms="quiz fictional stories questions test comprehension practice">Quiz: Fictional Stories</button>
                    <button onclick="openDynamicModal('Quiz: Current Events'); return false;" class="topic-pill" data-search-terms="quiz current events news articles comprehension practice test">Quiz: Current Events</button>
                    <button onclick="openDynamicModal('Quiz: Academic Texts'); return false;" class="topic-pill" data-search-terms="quiz academic texts science history reading comprehension practice test">Quiz: Academic Texts</button>
                    <button onclick="openDynamicModal('Mixed Comprehension Quiz'); return false;" class="topic-pill" data-search-terms="mixed comprehension quiz random passages questions prep practice test">Mixed Comprehension Quiz</button>
                </div>
            </div>

            <!-- 5. Vocabulary in Context -->
            <div class="resource-card" data-card-category="vocabulary">
                <div class="resource-card-header">
                    <div class="resource-card-icon vocabulary"><i class="fas fa-spell-check"></i></div>
                    <h2 class="resource-card-title">Vocabulary in Context</h2>
                </div>
                <p class="resource-card-desc">Learn new words by understanding their meaning within different reading passages.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Context Clues Practice'); return false;" class="topic-pill" data-search-terms="context clues practice vocabulary word meaning definition surrounding sentence">Context Clues Practice</button>
                    <button onclick="openDynamicModal('Word Meaning Exercises'); return false;" class="topic-pill" data-search-terms="word meaning exercises dictionary definitions vocabulary terminology">Word Meaning Exercises</button>
                    <button onclick="openDynamicModal('Idioms & Phrases'); return false;" class="topic-pill" data-search-terms="idioms phrases expressions vocabulary figures of speech common sayings">Idioms & Phrases</button>
                    <button onclick="openDynamicModal('Figurative Language'); return false;" class="topic-pill" data-search-terms="figurative language metaphors similes vocabulary personification">Figurative Language</button>
                </div>
            </div>

            <!-- 6. Literary Elements -->
            <div class="resource-card" data-card-category="elements">
                <div class="resource-card-header">
                    <div class="resource-card-icon elements"><i class="fas fa-feather-alt"></i></div>
                    <h2 class="resource-card-title">Literary Elements</h2>
                </div>
                <p class="resource-card-desc">Understand the components of literature, including plot, character, setting, and theme.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Plot Structure'); return false;" class="topic-pill" data-search-terms="plot structure exposition climax resolution freytag conflict elements">Plot Structure</button>
                    <button onclick="openDynamicModal('Character Development'); return false;" class="topic-pill" data-search-terms="character development traits motivations protagonist antagonist elements">Character Development</button>
                    <button onclick="openDynamicModal('Setting & Atmosphere'); return false;" class="topic-pill" data-search-terms="setting atmosphere environment background mood time place elements">Setting & Atmosphere</button>
                    <button onclick="openDynamicModal('Identifying Themes'); return false;" class="topic-pill" data-search-terms="identifying themes central message moral lessons motifs elements">Identifying Themes</button>
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
    const cards = document.querySelectorAll('.reading-card');
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


