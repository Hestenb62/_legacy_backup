<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Grammar & Vocabulary - Hesten's Learning";
$pageDescription = "Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">


    <main class="page-content-wrapper container">
        <!-- Header/Hero Section -->
        <div class="resource-header">
            <h1 class="resource-title">Grammar & Vocabulary</h1>
            <p class="resource-subtitle">Master the building blocks of language with our comprehensive grammar rules and vocabulary builders.</p>
            
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
        <div class="resource-grid" id="topics-grid">
            <!-- 1. Parts of Speech -->
            <div class="resource-card" data-card-category="speech">
                <div class="resource-card-header">
                    <div class="resource-card-icon speech"><i class="fas fa-tag"></i></div>
                    <h2 class="resource-card-title">Parts of Speech</h2>
                </div>
                <p class="resource-card-desc">Understand the function of nouns, verbs, adjectives, adverbs, and more with clear explanations.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Nouns & Pronouns'); return false;" class="topic-pill" data-search-terms="nouns pronouns naming replacing grammar">Nouns & Pronouns</button>
                    <button onclick="openDynamicModal('Verbs & Tenses'); return false;" class="topic-pill" data-search-terms="verbs tenses actions time past present future">Verbs & Tenses</button>
                    <button onclick="openDynamicModal('Adjectives & Adverbs'); return false;" class="topic-pill" data-search-terms="adjectives adverbs describing quickly very slow green">Adjectives & Adverbs</button>
                    <button onclick="openDynamicModal('Prepositions & Conjunctions'); return false;" class="topic-pill" data-search-terms="prepositions conjunctions location time and but under linking">Prepositions & Conjunctions</button>
                    <button onclick="openDynamicModal('Interjections & Articles'); return false;" class="topic-pill" data-search-terms="interjections articles parts of speech wow ouch a an the determiners emotional exclamation">Interjections & Articles</button>
                </div>
            </div>

            <!-- 2. Punctuation Rules -->
            <div class="resource-card" data-card-category="punctuation">
                <div class="resource-card-header">
                    <div class="resource-card-icon punctuation"><i class="fas fa-quote-right"></i></div>
                    <h2 class="resource-card-title">Punctuation Rules</h2>
                </div>
                <p class="resource-card-desc">Master the correct usage of commas, periods, semicolons, and other punctuation marks.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Comma Usage'); return false;" class="topic-pill" data-search-terms="comma usage pausing listing items clauses">Comma Usage</button>
                    <button onclick="openDynamicModal('Semicolons & Colons'); return false;" class="topic-pill" data-search-terms="semicolons colons linking lists quotes explanations">Semicolons & Colons</button>
                    <button onclick="openDynamicModal('Apostrophes & Quotation Marks'); return false;" class="topic-pill" data-search-terms="apostrophes quotation marks possession contractions speech quotes">Apostrophes & Quotation Marks</button>
                    <button onclick="openDynamicModal('Hyphens & Dashes'); return false;" class="topic-pill" data-search-terms="hyphens dashes compound words pausing emphasis">Hyphens & Dashes</button>
                    <button onclick="openDynamicModal('Parentheses & Ellipses'); return false;" class="topic-pill" data-search-terms="parentheses ellipses brackets punctuation pauses omissions extra information quotes">Parentheses & Ellipses</button>
                </div>
            </div>

            <!-- 3. Vocabulary Building -->
            <div class="resource-card" data-card-category="vocabulary">
                <div class="resource-card-header">
                    <div class="resource-card-icon vocabulary"><i class="fas fa-spell-check"></i></div>
                    <h2 class="resource-card-title">Vocabulary Building</h2>
                </div>
                <p class="resource-card-desc">Expand your lexicon with interactive exercises, prefixes, suffixes, and context clue strategies.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Academic Word List'); return false;" class="topic-pill" data-search-terms="academic word list analyze establish evaluate words">Academic Word List</button>
                    <button onclick="openDynamicModal('Prefixes & Suffixes'); return false;" class="topic-pill" data-search-terms="prefixes suffixes roots unhappy helpful meanings">Prefixes & Suffixes</button>
                    <button onclick="openDynamicModal('Context Clues'); return false;" class="topic-pill" data-search-terms="context clues hint surrounding text meanings find">Context Clues</button>
                    <button onclick="openDynamicModal('Synonym & Antonym Games'); return false;" class="topic-pill" data-search-terms="synonym antonym opposite same similar words">Synonym & Antonym Games</button>
                    <button onclick="openDynamicModal('Roots & Etymology'); return false;" class="topic-pill" data-search-terms="roots etymology greek latin word origins history prefix suffix meanings base">Roots & Etymology</button>
                </div>
            </div>

            <!-- 4. Common Errors Guide -->
            <div class="resource-card" data-card-category="errors">
                <div class="resource-card-header">
                    <div class="resource-card-icon errors"><i class="fas fa-exclamation-triangle"></i></div>
                    <h2 class="resource-card-title">Common Errors</h2>
                </div>
                <p class="resource-card-desc">Identify and correct frequently made grammar and usage mistakes in writing.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Homophones (e.g., their/there/they\'re)'); return false;" class="topic-pill" data-search-terms="homophones their there they're your you're its it's words sound same spelling">Homophones (their/there/they're)</button>
                    <button onclick="openDynamicModal('Run-on Sentences & Fragments'); return false;" class="topic-pill" data-search-terms="run-on sentences fragments incomplete clauses complete thoughts">Run-on Sentences & Fragments</button>
                    <button onclick="openDynamicModal('Subject-Verb Agreement Issues'); return false;" class="topic-pill" data-search-terms="subject verb agreement singular plural studies study bark barks">Subject-Verb Agreement</button>
                    <button onclick="openDynamicModal('Dangling Modifiers'); return false;" class="topic-pill" data-search-terms="dangling modifiers descriptive hungry boys pizza correct sentences">Dangling Modifiers</button>
                    <button onclick="openDynamicModal('Pronoun-Antecedent Agreement'); return false;" class="topic-pill" data-search-terms="pronoun antecedent agreement singular plural company its gender match reference grammar errors">Pronoun-Antecedent Agreement</button>
                </div>
            </div>

            <!-- 5. Sentence Structure -->
            <div class="resource-card" data-card-category="sentences">
                <div class="resource-card-header">
                    <div class="resource-card-icon sentences"><i class="fas fa-stream"></i></div>
                    <h2 class="resource-card-title">Sentence Structure</h2>
                </div>
                <p class="resource-card-desc">Learn to construct clear, concise, and varied sentences for effective communication.</p>
                <div class="pills-container">
                    <button onclick="openDynamicModal('Simple, Compound, Complex'); return false;" class="topic-pill" data-search-terms="simple compound complex clauses independent dependent conjunctions">Simple, Compound, Complex</button>
                    <button onclick="openDynamicModal('Active vs. Passive Voice'); return false;" class="topic-pill" data-search-terms="active passive voice chef cooked meal chased subject receiver">Active vs. Passive Voice</button>
                    <button onclick="openDynamicModal('Parallelism'); return false;" class="topic-pill" data-search-terms="parallelism matching grammatical structure running biking writing">Parallelism</button>
                    <button onclick="openDynamicModal('Sentence Combining'); return false;" class="topic-pill" data-search-terms="sentence combining joining clauses short choppy smooth">Sentence Combining</button>
                    <button onclick="openDynamicModal('Compound-Complex Sentences'); return false;" class="topic-pill" data-search-terms="compound complex sentences clauses dependent independent joining coordinating subordinating">Compound-Complex Sentences</button>
                </div>
            </div>

            <!-- 6. Figurative Language -->
            <div class="resource-card" data-card-category="figurative">
                <div class="resource-card-header">
                    <div class="resource-card-icon figurative"><i class="fas fa-microphone-alt"></i></div>
                    <h2 class="resource-card-title">Figurative Language</h2>
                </div>
                <p class="resource-card-desc">Understand and identify metaphors, similes, personification, and other figures of speech.</p>
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


