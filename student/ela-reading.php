<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Reading Comprehension - Hesten's Learning";
$pageDescription = "Practice and improve your reading comprehension skills with a variety of texts and exercises.";
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
.reading-header {
    text-align: center;
    margin-bottom: var(--spacing-12);
}

.reading-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: var(--spacing-3);
    letter-spacing: -0.025em;
}

.reading-subtitle {
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

/* Reading Cards Grid */
.reading-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-6);
    margin-top: var(--spacing-8);
}

@media (min-width: 768px) {
    .reading-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .reading-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Card Styling */
.reading-card {
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

.reading-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(79, 70, 229, 0.3);
}

.reading-card-header {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-3);
}

.reading-card-icon {
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
.reading-card-icon.fiction { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.reading-card-icon.nonfiction { background: linear-gradient(135deg, #0d9488, #0f766e); }
.reading-card-icon.strategies { background: linear-gradient(135deg, #db2777, #be185d); }
.reading-card-icon.quizzes { background: linear-gradient(135deg, #d97706, #b45309); }
.reading-card-icon.vocabulary { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.reading-card-icon.elements { background: linear-gradient(135deg, #ea580c, #c2410c); }

.reading-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin: 0;
}

.reading-card-desc {
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
        <div class="reading-header">
            <h1 class="reading-title">Reading Comprehension</h1>
            <p class="reading-subtitle">Practice and improve your reading comprehension skills with a variety of texts and exercises.</p>
            
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
        <div class="reading-grid" id="topics-grid">
            <!-- 1. Fiction Passages -->
            <div class="reading-card" data-card-category="fiction">
                <div class="reading-card-header">
                    <div class="reading-card-icon fiction"><i class="fas fa-book-open"></i></div>
                    <h2 class="reading-card-title">Fiction Passages</h2>
                </div>
                <p class="reading-card-desc">Engage with diverse fictional stories and answer questions to test your understanding.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Short Stories'); return false;" class="topic-pill" data-search-terms="short stories fiction narrative plot tales readers">Short Stories</button>
                    <button onclick="openDynamicModal('Novel Excerpts'); return false;" class="topic-pill" data-search-terms="novel excerpts book chapters passages long reading fiction">Novel Excerpts</button>
                    <button onclick="openDynamicModal('Fantasy & Sci-Fi'); return false;" class="topic-pill" data-search-terms="fantasy sci-fi magic space future dragons technology fiction">Fantasy & Sci-Fi</button>
                    <button onclick="openDynamicModal('Mystery & Adventure'); return false;" class="topic-pill" data-search-terms="mystery adventure detective puzzle suspense exciting fiction">Mystery & Adventure</button>
                </div>
            </div>

            <!-- 2. Non-Fiction Articles -->
            <div class="reading-card" data-card-category="nonfiction">
                <div class="reading-card-header">
                    <div class="reading-card-icon nonfiction"><i class="fas fa-newspaper"></i></div>
                    <h2 class="reading-card-title">Non-Fiction Articles</h2>
                </div>
                <p class="reading-card-desc">Improve your ability to extract information and analyze arguments from various non-fiction texts.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Science Articles'); return false;" class="topic-pill" data-search-terms="science articles non-fiction space nature research facts biology">Science Articles</button>
                    <button onclick="openDynamicModal('Historical Texts'); return false;" class="topic-pill" data-search-terms="historical texts non-fiction history past events documents">Historical Texts</button>
                    <button onclick="openDynamicModal('Biographies'); return false;" class="topic-pill" data-search-terms="biographies non-fiction life stories famous people real life">Biographies</button>
                    <button onclick="openDynamicModal('Informative Essays'); return false;" class="topic-pill" data-search-terms="informative essays arguments facts analysis explaining structure non-fiction">Informative Essays</button>
                </div>
            </div>

            <!-- 3. Reading Strategies -->
            <div class="reading-card" data-card-category="strategies">
                <div class="reading-card-header">
                    <div class="reading-card-icon strategies"><i class="fas fa-lightbulb"></i></div>
                    <h2 class="reading-card-title">Reading Strategies</h2>
                </div>
                <p class="reading-card-desc">Learn effective techniques for active reading, critical thinking, and summarizing texts.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Skimming & Scanning'); return false;" class="topic-pill" data-search-terms="skimming scanning speed reading quickly details main ideas strategies">Skimming & Scanning</button>
                    <button onclick="openDynamicModal('Annotating Texts'); return false;" class="topic-pill" data-search-terms="annotating texts notes margins highlighting marking active reading strategies">Annotating Texts</button>
                    <button onclick="openDynamicModal('Identifying Main Idea'); return false;" class="topic-pill" data-search-terms="identifying main idea central theme core topic summary details strategies">Identifying Main Idea</button>
                    <button onclick="openDynamicModal('Inference Skills'); return false;" class="topic-pill" data-search-terms="inference skills reading between lines clues context deduction strategies">Inference Skills</button>
                </div>
            </div>

            <!-- 4. Comprehension Quizzes -->
            <div class="reading-card" data-card-category="quizzes">
                <div class="reading-card-header">
                    <div class="reading-card-icon quizzes"><i class="fas fa-question-circle"></i></div>
                    <h2 class="reading-card-title">Comprehension Quizzes</h2>
                </div>
                <p class="reading-card-desc">Test your understanding with interactive quizzes after reading various passages.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Quiz: Fictional Stories'); return false;" class="topic-pill" data-search-terms="quiz fictional stories questions test comprehension practice">Quiz: Fictional Stories</button>
                    <button onclick="openDynamicModal('Quiz: Current Events'); return false;" class="topic-pill" data-search-terms="quiz current events news articles comprehension practice test">Quiz: Current Events</button>
                    <button onclick="openDynamicModal('Quiz: Academic Texts'); return false;" class="topic-pill" data-search-terms="quiz academic texts science history reading comprehension practice test">Quiz: Academic Texts</button>
                    <button onclick="openDynamicModal('Mixed Comprehension Quiz'); return false;" class="topic-pill" data-search-terms="mixed comprehension quiz random passages questions prep practice test">Mixed Comprehension Quiz</button>
                </div>
            </div>

            <!-- 5. Vocabulary in Context -->
            <div class="reading-card" data-card-category="vocabulary">
                <div class="reading-card-header">
                    <div class="reading-card-icon vocabulary"><i class="fas fa-spell-check"></i></div>
                    <h2 class="reading-card-title">Vocabulary in Context</h2>
                </div>
                <p class="reading-card-desc">Learn new words by understanding their meaning within different reading passages.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Context Clues Practice'); return false;" class="topic-pill" data-search-terms="context clues practice vocabulary word meaning definition surrounding sentence">Context Clues Practice</button>
                    <button onclick="openDynamicModal('Word Meaning Exercises'); return false;" class="topic-pill" data-search-terms="word meaning exercises dictionary definitions vocabulary terminology">Word Meaning Exercises</button>
                    <button onclick="openDynamicModal('Idioms & Phrases'); return false;" class="topic-pill" data-search-terms="idioms phrases expressions vocabulary figures of speech common sayings">Idioms & Phrases</button>
                    <button onclick="openDynamicModal('Figurative Language'); return false;" class="topic-pill" data-search-terms="figurative language metaphors similes vocabulary personification">Figurative Language</button>
                </div>
            </div>

            <!-- 6. Literary Elements -->
            <div class="reading-card" data-card-category="elements">
                <div class="reading-card-header">
                    <div class="reading-card-icon elements"><i class="fas fa-feather-alt"></i></div>
                    <h2 class="reading-card-title">Literary Elements</h2>
                </div>
                <p class="reading-card-desc">Understand the components of literature, including plot, character, setting, and theme.</p>
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
