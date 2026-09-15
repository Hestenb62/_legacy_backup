<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Grammar & Vocabulary - Hesten's Learning";
$pageDescription = "Master the building blocks of language with comprehensive grammar rules, interactive workshops, and vocabulary builders.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-resources.css">

<main class="page-content-wrapper container">
    <!-- Header/Hero Section -->
    <div class="resource-header">
        <div class="resource-pill-badge">
            <i class="fas fa-spell-check"></i>
            <span>Language &amp; Writing Lab</span>
        </div>
        <h1 class="resource-title">Grammar &amp; Vocabulary</h1>
        <p class="resource-subtitle">Master the building blocks of language with comprehensive grammar rules, interactive workshops, and our live sentence playground.</p>
        
        <!-- Search and Filter Bar -->
        <div class="search-filter-container">
            <div class="search-box">
                <i class="fas fa-search search-icon" aria-hidden="true"></i>
                <input type="text" id="topic-search" placeholder="Search grammar rules, punctuation, common errors, vocabulary..." aria-label="Search grammar topics">
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
                <button onclick="openDynamicModal('Nouns & Pronouns'); return false;" class="topic-pill" data-search-terms="nouns pronouns naming replacing grammar">Nouns &amp; Pronouns</button>
                <button onclick="openDynamicModal('Verbs & Tenses'); return false;" class="topic-pill" data-search-terms="verbs tenses actions time past present future">Verbs &amp; Tenses</button>
                <button onclick="openDynamicModal('Adjectives & Adverbs'); return false;" class="topic-pill" data-search-terms="adjectives adverbs describing quickly very slow green">Adjectives &amp; Adverbs</button>
                <button onclick="openDynamicModal('Prepositions & Conjunctions'); return false;" class="topic-pill" data-search-terms="prepositions conjunctions location time and but under linking">Prepositions &amp; Conjunctions</button>
                <button onclick="openDynamicModal('Interjections & Articles'); return false;" class="topic-pill" data-search-terms="interjections articles parts of speech wow ouch a an the determiners emotional exclamation">Interjections &amp; Articles</button>
            </div>
            <a href="/levels/k.php?subject=ela" class="card-action-btn">Practice in Level K ELA</a>
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
                <button onclick="openDynamicModal('Semicolons & Colons'); return false;" class="topic-pill" data-search-terms="semicolons colons linking lists quotes explanations">Semicolons &amp; Colons</button>
                <button onclick="openDynamicModal('Apostrophes & Quotation Marks'); return false;" class="topic-pill" data-search-terms="apostrophes quotation marks possession contractions speech quotes">Apostrophes &amp; Quotation Marks</button>
                <button onclick="openDynamicModal('Hyphens & Dashes'); return false;" class="topic-pill" data-search-terms="hyphens dashes compound words pausing emphasis">Hyphens &amp; Dashes</button>
                <button onclick="openDynamicModal('Parentheses & Ellipses'); return false;" class="topic-pill" data-search-terms="parentheses ellipses brackets punctuation pauses omissions extra information quotes">Parentheses &amp; Ellipses</button>
            </div>
            <a href="/levels/l.php?subject=ela" class="card-action-btn">Practice in Level L ELA</a>
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
                <button onclick="openDynamicModal('Prefixes & Suffixes'); return false;" class="topic-pill" data-search-terms="prefixes suffixes roots unhappy helpful meanings">Prefixes &amp; Suffixes</button>
                <button onclick="openDynamicModal('Context Clues'); return false;" class="topic-pill" data-search-terms="context clues hint surrounding text meanings find">Context Clues</button>
                <button onclick="openDynamicModal('Synonym & Antonym Games'); return false;" class="topic-pill" data-search-terms="synonym antonym opposite same similar words">Synonym &amp; Antonym Games</button>
                <button onclick="openDynamicModal('Roots & Etymology'); return false;" class="topic-pill" data-search-terms="roots etymology greek latin word origins history prefix suffix meanings base">Roots &amp; Etymology</button>
            </div>
            <a href="/levels/m.php?subject=ela" class="card-action-btn">Practice in Level M ELA</a>
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
                <button onclick="openDynamicModal('Run-on Sentences & Fragments'); return false;" class="topic-pill" data-search-terms="run-on sentences fragments incomplete clauses complete thoughts">Run-on Sentences &amp; Fragments</button>
                <button onclick="openDynamicModal('Subject-Verb Agreement Issues'); return false;" class="topic-pill" data-search-terms="subject verb agreement singular plural studies study bark barks">Subject-Verb Agreement</button>
                <button onclick="openDynamicModal('Dangling Modifiers'); return false;" class="topic-pill" data-search-terms="dangling modifiers descriptive hungry boys pizza correct sentences">Dangling Modifiers</button>
                <button onclick="openDynamicModal('Pronoun-Antecedent Agreement'); return false;" class="topic-pill" data-search-terms="pronoun antecedent agreement singular plural company its gender match reference grammar errors">Pronoun-Antecedent Agreement</button>
            </div>
            <a href="/levels/n.php?subject=ela" class="card-action-btn">Practice in Level N ELA</a>
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
            <a href="/levels/o.php?subject=ela" class="card-action-btn">Practice in Level O ELA</a>
        </div>

        <!-- 6. Figurative Language -->
        <div class="resource-card" data-card-category="figurative">
            <div class="resource-card-header">
                <div class="resource-card-icon figurative"><i class="fas fa-microphone-alt"></i></div>
                <h2 class="resource-card-title">Figurative Language</h2>
            </div>
            <p class="resource-card-desc">Understand and identify metaphors, similes, personification, and other figures of speech.</p>
            <div class="pills-container">
                <button onclick="openDynamicModal('Metaphors & Similes'); return false;" class="topic-pill" data-search-terms="metaphors similes comparisons like as time thief sunshine">Metaphors &amp; Similes</button>
                <button onclick="openDynamicModal('Personification & Hyperbole'); return false;" class="topic-pill" data-search-terms="personification hyperbole human traits wind whispered extreme exaggeration horse eat">Personification &amp; Hyperbole</button>
                <button onclick="openDynamicModal('Idioms & Allusions'); return false;" class="topic-pill" data-search-terms="idioms allusions common phrases break a leg romeo reference famous">Idioms &amp; Allusions</button>
                <button onclick="openDynamicModal('Symbolism & Imagery'); return false;" class="topic-pill" data-search-terms="symbolism imagery dove representing peace sensory detail sound sight smell taste touch crisp bang">Symbolism &amp; Imagery</button>
                <button onclick="openDynamicModal('Alliteration & Onomatopoeia'); return false;" class="topic-pill" data-search-terms="alliteration onomatopoeia sounds words repeating pop buzzing crackle sound effects figures of speech">Alliteration &amp; Onomatopoeia</button>
            </div>
            <a href="/library/index.php" class="card-action-btn">Explore in Digital Library</a>
        </div>
    </div>

    <!-- Empty State -->
    <div id="no-results-state" class="no-results-box" style="display: none;">
        <i class="fas fa-search-minus no-results-icon" aria-hidden="true"></i>
        <h3 class="no-results-title">No matching topics found</h3>
        <p class="no-results-desc">Try checking your spelling or selecting a different category tab.</p>
        <button id="reset-search-btn" class="reset-search-btn">Reset Search</button>
    </div>

    <!-- ========================================================================= -->
    <!-- INTERACTIVE GRAMMAR & SENTENCE PLAYGROUND -->
    <!-- ========================================================================= -->
    <section class="grammar-playground-workbench" id="grammar-playground" aria-labelledby="playground-title">
        <div class="gp-header">
            <div class="gp-title-group">
                <span class="resource-pill-badge" style="background: rgba(59, 130, 246, 0.12); color: #3b82f6; border-color: rgba(59, 130, 246, 0.3);">
                    <i class="fas fa-drafting-compass"></i> Live Writing Laboratory
                </span>
                <h2 id="playground-title" class="gp-title">
                    <i class="fas fa-magic" style="color: #4f46e5;"></i> Grammar &amp; Sentence Playground
                </h2>
                <p class="gp-desc">
                    Experiment with your own writing in real time! Type any sentence or pick a sample preset to color-code parts of speech, detect active vs. passive voice, analyze clause complexity, and catch tricky grammar traps.
                </p>
            </div>
        </div>

        <!-- Sample Presets -->
        <div class="gp-presets-wrap">
            <span class="gp-presets-label"><i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Quick Sample Presets:</span>
            <div class="gp-presets-list">
                <button type="button" class="gp-preset-btn" onclick="loadPlaygroundPreset(0)">
                    1. Action Detective
                </button>
                <button type="button" class="gp-preset-btn" onclick="loadPlaygroundPreset(1)">
                    2. Complex Clause
                </button>
                <button type="button" class="gp-preset-btn" onclick="loadPlaygroundPreset(2)">
                    3. Passive Voice Test
                </button>
                <button type="button" class="gp-preset-btn" onclick="loadPlaygroundPreset(3)">
                    4. Homophone Challenge
                </button>
            </div>
        </div>

        <!-- Live Sentence Input Card -->
        <div class="gp-input-card">
            <label for="gp-sentence-input" style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: 0.4rem;">Type or paste your sentence below:</label>
            <textarea id="gp-sentence-input" class="gp-textarea" placeholder="Type a sentence here to analyze its grammar and parts of speech..." aria-label="Sentence input for grammar analysis">The clever astronomer watched the glowing meteor shower carefully from the mountain summit.</textarea>
            <div class="gp-input-footer">
                <div class="gp-counts">
                    <span><i class="fas fa-font"></i> Characters: <strong id="gp-char-count">88</strong></span>
                    <span><i class="fas fa-quote-left"></i> Words: <strong id="gp-word-count">13</strong></span>
                </div>
                <button type="button" class="gp-btn-analyze" onclick="analyzePlaygroundSentence()">
                    <i class="fas fa-play"></i> Analyze Sentence
                </button>
            </div>
        </div>

        <!-- Playground Workbench Navigation Tabs -->
        <div class="gp-tabs-nav" role="tablist" aria-label="Playground Analysis Tools">
            <button type="button" class="gp-tab-btn active" id="gp-tab-pos" onclick="switchPlaygroundTab('pos')" role="tab" aria-selected="true">
                <i class="fas fa-tags" style="color: #3b82f6;"></i> Parts of Speech Colorizer
            </button>
            <button type="button" class="gp-tab-btn" id="gp-tab-struct" onclick="switchPlaygroundTab('struct')" role="tab" aria-selected="false">
                <i class="fas fa-sitemap" style="color: #10b981;"></i> Voice &amp; Clause Inspector
            </button>
            <button type="button" class="gp-tab-btn" id="gp-tab-diag" onclick="switchPlaygroundTab('diag')" role="tab" aria-selected="false">
                <i class="fas fa-user-md" style="color: #f59e0b;"></i> Mechanics &amp; Homophone Doctor
            </button>
        </div>

        <!-- Panel 1: Parts of Speech Colorizer -->
        <div id="gp-panel-pos" class="gp-panel">
            <div class="gp-legend">
                <span class="gp-legend-item" style="background: rgba(59, 130, 246, 0.15); color: #2563eb; border: 1px solid rgba(59, 130, 246, 0.3);">■ Noun</span>
                <span class="gp-legend-item" style="background: rgba(16, 185, 129, 0.15); color: #059669; border: 1px solid rgba(16, 185, 129, 0.3);">■ Verb</span>
                <span class="gp-legend-item" style="background: rgba(245, 158, 11, 0.15); color: #d97706; border: 1px solid rgba(245, 158, 11, 0.3);">■ Adjective</span>
                <span class="gp-legend-item" style="background: rgba(139, 92, 246, 0.15); color: #7c3aed; border: 1px solid rgba(139, 92, 246, 0.3);">■ Adverb</span>
                <span class="gp-legend-item" style="background: rgba(6, 182, 212, 0.15); color: #0891b2; border: 1px solid rgba(6, 182, 212, 0.3);">■ Preposition</span>
                <span class="gp-legend-item" style="background: rgba(236, 72, 153, 0.15); color: #db2777; border: 1px solid rgba(236, 72, 153, 0.3);">■ Conjunction</span>
                <span class="gp-legend-item" style="background: rgba(99, 102, 241, 0.15); color: #4f46e5; border: 1px solid rgba(99, 102, 241, 0.3);">■ Pronoun</span>
            </div>
            <div class="gp-token-output" id="gp-token-display" aria-label="Colorized sentence tokens" role="region">
                <!-- Colorized word chips inserted here -->
            </div>
            <div id="gp-word-detail" class="gp-word-tooltip" style="display: none;">
                <!-- Word detail on click -->
            </div>
        </div>

        <!-- Panel 2: Voice & Structure Inspector -->
        <div id="gp-panel-struct" class="gp-panel" style="display: none;">
            <div class="gp-structure-grid">
                <div class="gp-metric-card">
                    <div class="gp-metric-header">
                        <span class="gp-metric-title">Sentence Structure</span>
                        <i class="fas fa-layer-group" style="color: #3b82f6;"></i>
                    </div>
                    <div class="gp-metric-val" id="gp-struct-type">Complex Sentence</div>
                    <p class="gp-metric-note" id="gp-struct-desc">Contains an independent clause connected with subordinating elements.</p>
                </div>
                
                <div class="gp-metric-card">
                    <div class="gp-metric-header">
                        <span class="gp-metric-title">Grammatical Voice</span>
                        <i class="fas fa-bullhorn" style="color: #10b981;"></i>
                    </div>
                    <div class="gp-metric-val" id="gp-voice-type">Active Voice</div>
                    <p class="gp-metric-note" id="gp-voice-desc">The subject is actively performing the predicate verb.</p>
                </div>

                <div class="gp-metric-card">
                    <div class="gp-metric-header">
                        <span class="gp-metric-title">Clause &amp; Rhythm Count</span>
                        <i class="fas fa-wave-square" style="color: #8b5cf6;"></i>
                    </div>
                    <div class="gp-metric-val" id="gp-clause-count">1 Main Clause</div>
                    <p class="gp-metric-note">Balanced flow with optimal word length for academic clarity.</p>
                </div>
            </div>
        </div>

        <!-- Panel 3: Mechanics & Homophone Doctor -->
        <div id="gp-panel-diag" class="gp-panel" style="display: none;">
            <div class="gp-diag-list" id="gp-diag-list">
                <!-- Diagnostics checks populated dynamically -->
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('topic-search');
    const clearBtn = document.getElementById('clear-search');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.resource-card');
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
            
            const pills = card.querySelectorAll('.topic-pill');
            let matchingPillsInCard = 0;

            pills.forEach(pill => {
                const text = pill.textContent.toLowerCase();
                const terms = (pill.getAttribute('data-search-terms') || '').toLowerCase();
                const textMatch = text.includes(searchQuery) || terms.includes(searchQuery);

                if (textMatch) {
                    pill.style.display = 'block';
                    matchingPillsInCard++;
                } else {
                    pill.style.display = 'none';
                }
            });

            const shouldBeVisible = categoryMatch && (searchQuery === '' || matchingPillsInCard > 0);

            if (shouldBeVisible) {
                card.style.display = 'flex';
                visibleCardsCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (visibleCardsCount === 0) {
            noResultsState.style.display = 'block';
            document.getElementById('topics-grid').style.display = 'none';
        } else {
            noResultsState.style.display = 'none';
            document.getElementById('topics-grid').style.display = 'grid';
        }
    }

    searchInput.addEventListener('input', (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        clearBtn.style.display = searchQuery.length > 0 ? 'block' : 'none';
        applyFilters();
    });

    clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        searchQuery = '';
        clearBtn.style.display = 'none';
        searchInput.focus();
        applyFilters();
    });

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
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

    /**
     * =========================================================================
     * GRAMMAR & SENTENCE PLAYGROUND CONTROLLER
     * =========================================================================
     */
    const playgroundPresets = [
        "The clever detective quietly investigated the mysterious locked room.",
        "Although the thunderstorm rattled the old wooden house, the children slept peacefully.",
        "The delicious chocolate cake was baked by the master pastry chef.",
        "Their coats were left over there because they're going outside."
    ];

    const posRules = {
        pronouns: ['i', 'you', 'he', 'she', 'it', 'we', 'they', 'me', 'him', 'her', 'us', 'them', 'my', 'your', 'his', 'its', 'our', 'their', 'mine', 'yours', 'hers', 'ours', 'theirs', 'who', 'whom', 'whose', 'this', 'that', 'these', 'those'],
        prepositions: ['in', 'on', 'at', 'by', 'for', 'with', 'about', 'against', 'between', 'into', 'through', 'during', 'before', 'after', 'above', 'below', 'to', 'from', 'up', 'down', 'under', 'over', 'along', 'across', 'behind', 'beside'],
        conjunctions: ['and', 'but', 'or', 'nor', 'for', 'yet', 'so', 'although', 'because', 'since', 'unless', 'while', 'whereas', 'if', 'when', 'whenever', 'though', 'where'],
        articles: ['a', 'an', 'the'],
        commonVerbs: ['is', 'are', 'was', 'were', 'am', 'be', 'been', 'being', 'have', 'has', 'had', 'do', 'does', 'did', 'watched', 'investigated', 'slept', 'baked', 'left', 'going', 'ran', 'walked', 'jumped', 'spoke', 'wrote', 'read', 'studied', 'opened', 'closed', 'made', 'took', 'see', 'saw', 'looked', 'found'],
        commonAdverbs: ['carefully', 'quietly', 'peacefully', 'quickly', 'slowly', 'brightly', 'suddenly', 'fiercely', 'effortlessly', 'meticulously', 'very', 'quite', 'too', 'well', 'there', 'here', 'now', 'always', 'never', 'often', 'sometimes'],
        commonAdjectives: ['clever', 'mysterious', 'locked', 'old', 'wooden', 'delicious', 'chocolate', 'master', 'pastry', 'glowing', 'brilliant', 'ancient', 'towering', 'stone', 'inquisitive', 'swift', 'rugged', 'fragile', 'diligent', 'great', 'small', 'big', 'new', 'warm', 'cold', 'red', 'blue', 'green']
    };

    window.loadPlaygroundPreset = function(index) {
        const input = document.getElementById('gp-sentence-input');
        if (input && playgroundPresets[index]) {
            input.value = playgroundPresets[index];
            analyzePlaygroundSentence();
        }
    };

    window.switchPlaygroundTab = function(tabName) {
        ['pos', 'struct', 'diag'].forEach(t => {
            const btn = document.getElementById('gp-tab-' + t);
            const panel = document.getElementById('gp-panel-' + t);
            const isActive = t === tabName;
            if (btn) {
                btn.classList.toggle('active', isActive);
                btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            }
            if (panel) {
                panel.style.display = isActive ? 'block' : 'none';
            }
        });
    };

    function guessWordPOS(cleanWord, prevWord, nextWord) {
        const w = cleanWord.toLowerCase();
        if (posRules.articles.includes(w)) return { pos: 'Article', color: '#6366f1', bg: 'rgba(99, 102, 241, 0.15)', desc: 'Determiner specifying whether a noun is definite or indefinite.' };
        if (posRules.pronouns.includes(w)) return { pos: 'Pronoun', color: '#4f46e5', bg: 'rgba(99, 102, 241, 0.15)', desc: 'Word substituting for a noun antecedent.' };
        if (posRules.prepositions.includes(w)) return { pos: 'Preposition', color: '#0891b2', bg: 'rgba(6, 182, 212, 0.15)', desc: 'Locational, temporal, or logical connector.' };
        if (posRules.conjunctions.includes(w)) return { pos: 'Conjunction', color: '#db2777', bg: 'rgba(236, 72, 153, 0.15)', desc: 'Joining word linking clauses or parallel terms.' };
        if (posRules.commonAdverbs.includes(w) || w.endsWith('ly')) return { pos: 'Adverb', color: '#7c3aed', bg: 'rgba(139, 92, 246, 0.15)', desc: 'Modifies a verb, adjective, or other adverb.' };
        if (posRules.commonVerbs.includes(w) || w.endsWith('ed') || w.endsWith('ing')) return { pos: 'Verb', color: '#059669', bg: 'rgba(16, 185, 129, 0.15)', desc: 'Action word or state-of-being predicate.' };
        if (posRules.commonAdjectives.includes(w) || w.endsWith('ous') || w.endsWith('ful') || w.endsWith('able')) return { pos: 'Adjective', color: '#d97706', bg: 'rgba(245, 158, 11, 0.15)', desc: 'Describes or specifies a quality of a noun.' };
        
        // Contextual heuristic: word preceded by an article or adjective is typically a noun
        if (prevWord && (posRules.articles.includes(prevWord.toLowerCase()) || posRules.commonAdjectives.includes(prevWord.toLowerCase()))) {
            return { pos: 'Noun', color: '#2563eb', bg: 'rgba(59, 130, 246, 0.15)', desc: 'Names a person, place, physical object, or abstract concept.' };
        }
        
        return { pos: 'Noun / Word', color: '#2563eb', bg: 'rgba(59, 130, 246, 0.15)', desc: 'Core building block word naming an entity or concept.' };
    }

    window.analyzePlaygroundSentence = function() {
        const input = document.getElementById('gp-sentence-input');
        if (!input) return;
        const text = input.value.trim();
        
        // Update character and word counts
        const chars = text.length;
        const words = text ? text.split(/\s+/).filter(Boolean) : [];
        document.getElementById('gp-char-count').textContent = chars;
        document.getElementById('gp-word-count').textContent = words.length;

        const tokenBox = document.getElementById('gp-token-display');
        const detailBox = document.getElementById('gp-word-detail');
        if (!tokenBox) return;

        if (words.length === 0) {
            tokenBox.innerHTML = '<span style="color: var(--color-text-muted);">Please type a sentence above to begin analysis.</span>';
            return;
        }

        // Render Colorized Word Chips
        tokenBox.innerHTML = '';
        words.forEach((rawWord, idx) => {
            const clean = rawWord.replace(/[^a-zA-Z]/g, '');
            const prev = idx > 0 ? words[idx - 1].replace(/[^a-zA-Z]/g, '') : null;
            const next = idx < words.length - 1 ? words[idx + 1].replace(/[^a-zA-Z]/g, '') : null;
            const tag = guessWordPOS(clean, prev, next);

            const chip = document.createElement('span');
            chip.className = 'gp-word-chip';
            chip.textContent = rawWord;
            chip.style.backgroundColor = tag.bg;
            chip.style.color = tag.color;
            chip.style.borderColor = tag.color;
            chip.title = `${clean}: ${tag.pos}`;

            chip.addEventListener('click', () => {
                if (detailBox) {
                    detailBox.style.display = 'block';
                    detailBox.innerHTML = `
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <strong style="font-size: 1.1rem; color: var(--color-text-main);">"${clean}"</strong>
                            <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 9999px; background: ${tag.bg}; color: ${tag.color}; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">${tag.pos}</span>
                        </div>
                        <p style="margin: 0; font-size: 0.9rem; color: var(--color-text-muted); line-height: 1.5;">${tag.desc}</p>
                    `;
                }
            });

            tokenBox.appendChild(chip);
            tokenBox.appendChild(document.createTextNode(' '));
        });

        // 2. Voice & Structure Diagnostics
        const lower = text.toLowerCase();
        
        // Passive Voice Detection (form of 'to be' + past participle, or 'by [agent]')
        const hasBeVerb = /\b(is|are|was|were|been|being|be)\b/.test(lower);
        const hasPassiveBy = /\b(was|were|is|are|been)\s+\w+(ed|en|t)\s+by\b/.test(lower);
        const isPassive = hasPassiveBy || (hasBeVerb && /\b(was|were)\s+\w+(ed|en)\b/.test(lower));

        const voiceTypeEl = document.getElementById('gp-voice-type');
        const voiceDescEl = document.getElementById('gp-voice-desc');
        if (voiceTypeEl && voiceDescEl) {
            if (isPassive) {
                voiceTypeEl.textContent = 'Passive Voice';
                voiceTypeEl.style.color = '#f59e0b';
                voiceDescEl.innerHTML = 'The subject receives the action. Try the <em>Zombie Test</em>: add "by zombies" after the verb!';
            } else {
                voiceTypeEl.textContent = 'Active Voice';
                voiceTypeEl.style.color = '#10b981';
                voiceDescEl.textContent = 'The subject actively performs the verb action. Direct and engaging!';
            }
        }

        // Clause Structure Detection
        const subordinators = ['although', 'because', 'since', 'if', 'when', 'while', 'after', 'before', 'though', 'unless'];
        const coordinators = ['and', 'but', 'or', 'so', 'yet', 'for', 'nor'];
        const hasSub = subordinators.some(s => new RegExp('\\b' + s + '\\b').test(lower));
        const hasCoord = coordinators.some(c => new RegExp('\\b' + c + '\\b').test(lower));
        const hasSemi = text.includes(';');

        const structTypeEl = document.getElementById('gp-struct-type');
        const structDescEl = document.getElementById('gp-struct-desc');
        const clauseCountEl = document.getElementById('gp-clause-count');

        if (structTypeEl && structDescEl) {
            if (hasSub && (hasCoord || hasSemi)) {
                structTypeEl.textContent = 'Compound-Complex Sentence';
                structDescEl.textContent = 'Features two independent thoughts linked with at least one dependent clause.';
                if (clauseCountEl) clauseCountEl.textContent = '3+ Connected Clauses';
            } else if (hasSub) {
                structTypeEl.textContent = 'Complex Sentence';
                structDescEl.textContent = 'Contains an independent clause joined with a dependent qualifying clause.';
                if (clauseCountEl) clauseCountEl.textContent = '2 Clauses (1 Main, 1 Dependent)';
            } else if (hasCoord || hasSemi) {
                structTypeEl.textContent = 'Compound Sentence';
                structDescEl.textContent = 'Two complete independent thoughts joined by a conjunction or semicolon.';
                if (clauseCountEl) clauseCountEl.textContent = '2 Independent Clauses';
            } else {
                structTypeEl.textContent = 'Simple Sentence';
                structDescEl.textContent = 'Contains a single independent clause with clear subject and predicate.';
                if (clauseCountEl) clauseCountEl.textContent = '1 Independent Clause';
            }
        }

        // 3. Mechanics & Homophone Doctor
        const diagList = document.getElementById('gp-diag-list');
        if (diagList) {
            diagList.innerHTML = '';
            
            // Check Capitalization
            const startsWithCap = /^[A-Z]/.test(text);
            diagList.appendChild(createDiagItem(
                startsWithCap ? 'gp-diag-pass' : 'gp-diag-warn',
                startsWithCap ? 'fa-check-circle' : 'fa-exclamation-triangle',
                startsWithCap ? '#10b981' : '#f59e0b',
                startsWithCap ? 'Capitalization: Sentence begins with a proper capital letter.' : 'Capitalization Note: Sentence does not begin with an uppercase letter.'
            ));

            // Check Punctuation
            const hasTerminal = /[.!?]$/.test(text);
            diagList.appendChild(createDiagItem(
                hasTerminal ? 'gp-diag-pass' : 'gp-diag-warn',
                hasTerminal ? 'fa-check-circle' : 'fa-exclamation-triangle',
                hasTerminal ? '#10b981' : '#f59e0b',
                hasTerminal ? 'Terminal Punctuation: Ends cleanly with appropriate terminal punctuation.' : 'Punctuation Alert: Sentence appears to be missing a terminal period, question mark, or exclamation point.'
            ));

            // Homophone Check
            const homophonesFound = [];
            if (/\b(their|there|they're)\b/i.test(text)) homophonesFound.push("their / there / they're (their = ownership, there = place, they're = they are)");
            if (/\b(its|it's)\b/i.test(text)) homophonesFound.push("its / it's (its = possessive, it's = it is)");
            if (/\b(affect|effect)\b/i.test(text)) homophonesFound.push("affect / effect (affect = verb action, effect = noun result)");

            if (homophonesFound.length > 0) {
                diagList.appendChild(createDiagItem(
                    'gp-diag-info',
                    'fa-info-circle',
                    '#3b82f6',
                    `Homophone Watch: Detected ${homophonesFound.join('; ')}. Verify your intended meaning!`
                ));
            } else {
                diagList.appendChild(createDiagItem(
                    'gp-diag-pass',
                    'fa-check-circle',
                    '#10b981',
                    'Homophone Doctor: No common homophone confusion pairs flagged.'
                ));
            }

            // Word Count Assessment
            if (words.length > 35) {
                diagList.appendChild(createDiagItem(
                    'gp-diag-warn',
                    'fa-exclamation-circle',
                    '#f59e0b',
                    'Pacing Check: Sentence exceeds 35 words. Consider breaking into two distinct sentences for maximum readability.'
                ));
            }
        }
    };

    function createDiagItem(cssClass, icon, color, text) {
        const div = document.createElement('div');
        div.className = `gp-diag-item ${cssClass}`;
        div.innerHTML = `<i class="fas ${icon}" style="color: ${color}; font-size: 1.1rem; margin-top: 0.15rem;"></i> <span>${text}</span>`;
        return div;
    }

    const sentenceInput = document.getElementById('gp-sentence-input');
    if (sentenceInput) {
        sentenceInput.addEventListener('input', () => {
            analyzePlaygroundSentence();
        });
    }

    // Run initial playground analysis
    analyzePlaygroundSentence();
});
</script>

<?php
// Include the modal file
include '../src/resource-modal.php';
// Include the footer file
include '../src/footer.php';
?>
