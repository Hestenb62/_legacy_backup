<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Grammar & Vocabulary - Hesten's Learning";
$pageDescription = "Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '../src/header.php';
?>

<style>
/* Page Wrapper spacing */
.page-content-wrapper {
    padding-top: var(--spacing-8);
    padding-bottom: var(--spacing-16);
    min-height: 80vh;
}

/* Header & Intro */
.grammar-header {
    text-align: center;
    margin-bottom: var(--spacing-12);
}

.grammar-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: var(--spacing-3);
    letter-spacing: -0.025em;
}

.grammar-subtitle {
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

/* Grammar Cards Grid */
.grammar-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-6);
    margin-top: var(--spacing-8);
}

@media (min-width: 768px) {
    .grammar-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .grammar-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Card Styling */
.grammar-card {
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

.grammar-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(79, 70, 229, 0.3);
}

.grammar-card-header {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-3);
}

.grammar-card-icon {
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
.grammar-card-icon.speech { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.grammar-card-icon.punctuation { background: linear-gradient(135deg, #0d9488, #0f766e); }
.grammar-card-icon.vocabulary { background: linear-gradient(135deg, #db2777, #be185d); }
.grammar-card-icon.errors { background: linear-gradient(135deg, #d97706, #b45309); }
.grammar-card-icon.sentences { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.grammar-card-icon.figurative { background: linear-gradient(135deg, #ea580c, #c2410c); }

.grammar-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-main);
    margin: 0;
}

.grammar-card-desc {
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
        <div class="grammar-header">
            <h1 class="grammar-title">Grammar & Vocabulary</h1>
            <p class="grammar-subtitle">Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.</p>
            
            <!-- Search and Filter Bar -->
            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="topic-search" placeholder="Search grammar rules, punctuation, common errors..." aria-label="Search grammar topics">
                    <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="filter-tabs" role="tablist" aria-label="Filter topics by category">
                    <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
                    <button class="filter-tab" data-category="speech" role="tab" aria-selected="false">Parts of Speech</button>
                    <button class="filter-tab" data-category="punctuation" role="tab" aria-selected="false">Punctuation</button>
                    <button class="filter-tab" data-category="vocabulary" role="tab" aria-selected="false">Vocabulary</button>
                    <button class="filter-tab" data-category="errors" role="tab" aria-selected="false">Common Errors</button>
                    <button class="filter-tab" data-category="sentences" role="tab" aria-selected="false">Sentences</button>
                    <button class="filter-tab" data-category="figurative" role="tab" aria-selected="false">Figurative Language</button>
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="grammar-grid" id="topics-grid">
            <!-- 1. Parts of Speech -->
            <div class="grammar-card" data-card-category="speech">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon speech"><i class="fas fa-tag"></i></div>
                    <h2 class="grammar-card-title">Parts of Speech</h2>
                </div>
                <p class="grammar-card-desc">Understand the function of nouns, verbs, adjectives, adverbs, and more with clear explanations.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Nouns & Pronouns'); return false;" class="topic-pill" data-search-terms="nouns pronouns naming replacing grammar">Nouns & Pronouns</button>
                    <button onclick="openDynamicModal('Verbs & Tenses'); return false;" class="topic-pill" data-search-terms="verbs tenses actions time past present future">Verbs & Tenses</button>
                    <button onclick="openDynamicModal('Adjectives & Adverbs'); return false;" class="topic-pill" data-search-terms="adjectives adverbs describing quickly very slow green">Adjectives & Adverbs</button>
                    <button onclick="openDynamicModal('Prepositions & Conjunctions'); return false;" class="topic-pill" data-search-terms="prepositions conjunctions location time and but under linking">Prepositions & Conjunctions</button>
                    <button onclick="openDynamicModal('Interjections & Articles'); return false;" class="topic-pill" data-search-terms="interjections articles parts of speech wow ouch a an the determiners emotional exclamation">Interjections & Articles</button>
                </div>
            </div>

            <!-- 2. Punctuation Rules -->
            <div class="grammar-card" data-card-category="punctuation">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon punctuation"><i class="fas fa-quote-right"></i></div>
                    <h2 class="grammar-card-title">Punctuation Rules</h2>
                </div>
                <p class="grammar-card-desc">Master the correct usage of commas, periods, semicolons, and other punctuation marks.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Comma Usage'); return false;" class="topic-pill" data-search-terms="comma usage pausing listing items clauses">Comma Usage</button>
                    <button onclick="openDynamicModal('Semicolons & Colons'); return false;" class="topic-pill" data-search-terms="semicolons colons linking lists quotes explanations">Semicolons & Colons</button>
                    <button onclick="openDynamicModal('Apostrophes & Quotation Marks'); return false;" class="topic-pill" data-search-terms="apostrophes quotation marks possession contractions speech quotes">Apostrophes & Quotation Marks</button>
                    <button onclick="openDynamicModal('Hyphens & Dashes'); return false;" class="topic-pill" data-search-terms="hyphens dashes compound words pausing emphasis">Hyphens & Dashes</button>
                    <button onclick="openDynamicModal('Parentheses & Ellipses'); return false;" class="topic-pill" data-search-terms="parentheses ellipses brackets punctuation pauses omissions extra information quotes">Parentheses & Ellipses</button>
                </div>
            </div>

            <!-- 3. Vocabulary Building -->
            <div class="grammar-card" data-card-category="vocabulary">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon vocabulary"><i class="fas fa-spell-check"></i></div>
                    <h2 class="grammar-card-title">Vocabulary Building</h2>
                </div>
                <p class="grammar-card-desc">Expand your lexicon with interactive exercises, prefixes, suffixes, and context clue strategies.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Academic Word List'); return false;" class="topic-pill" data-search-terms="academic word list analyze establish evaluate words">Academic Word List</button>
                    <button onclick="openDynamicModal('Prefixes & Suffixes'); return false;" class="topic-pill" data-search-terms="prefixes suffixes roots unhappy helpful meanings">Prefixes & Suffixes</button>
                    <button onclick="openDynamicModal('Context Clues'); return false;" class="topic-pill" data-search-terms="context clues hint surrounding text meanings find">Context Clues</button>
                    <button onclick="openDynamicModal('Synonym & Antonym Games'); return false;" class="topic-pill" data-search-terms="synonym antonym opposite same similar words">Synonym & Antonym Games</button>
                    <button onclick="openDynamicModal('Roots & Etymology'); return false;" class="topic-pill" data-search-terms="roots etymology greek latin word origins history prefix suffix meanings base">Roots & Etymology</button>
                </div>
            </div>

            <!-- 4. Common Errors Guide -->
            <div class="grammar-card" data-card-category="errors">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon errors"><i class="fas fa-exclamation-triangle"></i></div>
                    <h2 class="grammar-card-title">Common Errors</h2>
                </div>
                <p class="grammar-card-desc">Identify and correct frequently made grammar and usage mistakes in writing.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Homophones (e.g., their/there/they\'re)'); return false;" class="topic-pill" data-search-terms="homophones their there they're your you're its it's words sound same spelling">Homophones (their/there/they're)</button>
                    <button onclick="openDynamicModal('Run-on Sentences & Fragments'); return false;" class="topic-pill" data-search-terms="run-on sentences fragments incomplete clauses complete thoughts">Run-on Sentences & Fragments</button>
                    <button onclick="openDynamicModal('Subject-Verb Agreement Issues'); return false;" class="topic-pill" data-search-terms="subject verb agreement singular plural studies study bark barks">Subject-Verb Agreement</button>
                    <button onclick="openDynamicModal('Dangling Modifiers'); return false;" class="topic-pill" data-search-terms="dangling modifiers descriptive hungry boys pizza correct sentences">Dangling Modifiers</button>
                    <button onclick="openDynamicModal('Pronoun-Antecedent Agreement'); return false;" class="topic-pill" data-search-terms="pronoun antecedent agreement singular plural company its gender match reference grammar errors">Pronoun-Antecedent Agreement</button>
                </div>
            </div>

            <!-- 5. Sentence Structure -->
            <div class="grammar-card" data-card-category="sentences">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon sentences"><i class="fas fa-stream"></i></div>
                    <h2 class="grammar-card-title">Sentence Structure</h2>
                </div>
                <p class="grammar-card-desc">Learn to construct clear, concise, and varied sentences for effective communication.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Simple, Compound, Complex'); return false;" class="topic-pill" data-search-terms="simple compound complex clauses independent dependent conjunctions">Simple, Compound, Complex</button>
                    <button onclick="openDynamicModal('Active vs. Passive Voice'); return false;" class="topic-pill" data-search-terms="active passive voice chef cooked meal chased subject receiver">Active vs. Passive Voice</button>
                    <button onclick="openDynamicModal('Parallelism'); return false;" class="topic-pill" data-search-terms="parallelism matching grammatical structure running biking writing">Parallelism</button>
                    <button onclick="openDynamicModal('Sentence Combining'); return false;" class="topic-pill" data-search-terms="sentence combining joining clauses short choppy smooth">Sentence Combining</button>
                    <button onclick="openDynamicModal('Compound-Complex Sentences'); return false;" class="topic-pill" data-search-terms="compound complex sentences clauses dependent independent joining coordinating subordinating">Compound-Complex Sentences</button>
                </div>
            </div>

            <!-- 6. Figurative Language -->
            <div class="grammar-card" data-card-category="figurative">
                <div class="grammar-card-header">
                    <div class="grammar-card-icon figurative"><i class="fas fa-microphone-alt"></i></div>
                    <h2 class="grammar-card-title">Figurative Language</h2>
                </div>
                <p class="grammar-card-desc">Understand and identify metaphors, similes, personification, and other figures of speech.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Metaphors & Similes'); return false;" class="topic-pill" data-search-terms="metaphors similes comparisons like as time thief sunshine">Metaphors & Similes</button>
                    <button onclick="openDynamicModal('Personification & Hyperbole'); return false;" class="topic-pill" data-search-terms="personification hyperbole human traits wind whispered extreme exaggeration horse eat">Personification & Hyperbole</button>
                    <button onclick="openDynamicModal('Idioms & Allusions'); return false;" class="topic-pill" data-search-terms="idioms allusions common phrases break a leg romeo reference famous">Idioms & Allusions</button>
                    <button onclick="openDynamicModal('Symbolism & Imagery'); return false;" class="topic-pill" data-search-terms="symbolism imagery dove representing peace sensory detail sound sight smell taste touch crisp bang">Symbolism & Imagery</button>
                    <button onclick="openDynamicModal('Alliteration & Onomatopoeia'); return false;" class="topic-pill" data-search-terms="alliteration onomatopoeia sounds words repeating pop buzzing crackle sound effects figures of speech">Alliteration & Onomatopoeia</button>
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
    const cards = document.querySelectorAll('.grammar-card');
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
include '../src/resource-modal.php';
// Include the footer file
include '../src/footer.php';
?>
