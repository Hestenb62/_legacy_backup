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

        <!-- ========================================================================= -->
        <!-- INTERACTIVE GRAMMAR MECHANICS & SENTENCE WORKSHOP -->
        <!-- ========================================================================= -->
        <section class="grammar-workshop-workbench" id="grammar-workshop" aria-label="Interactive Grammar Mechanics Workshop">
            <div class="mg-header">
                <div class="mg-title-group">
                    <span class="mg-badge" style="background: rgba(236, 72, 153, 0.12); color: #ec4899;"><i class="fas fa-spell-check"></i> Interactive Workshop</span>
                    <h2 class="mg-title">Sentence Mechanics & Parts of Speech Detective</h2>
                    <p class="mg-subtitle">Interactive neurodiversity-friendly practice designed to strengthen sentence structure, detect parts of speech, and resolve common writing errors.</p>
                </div>
                <div class="mg-stats-panel">
                    <div class="mg-stat-box">
                        <span class="mg-stat-label">Streak</span>
                        <span class="mg-stat-val" id="gw-streak-val">🔥 0</span>
                    </div>
                    <div class="mg-stat-box">
                        <span class="mg-stat-label">Mastered</span>
                        <span class="mg-stat-val" id="gw-mastered-val">0</span>
                    </div>
                </div>
            </div>

            <!-- Mode Switcher -->
            <div class="mg-category-nav" role="tablist">
                <button type="button" class="mg-cat-btn active" id="gw-mode-btn-pos" onclick="switchGrammarMode('pos')">
                    <i class="fas fa-tags"></i> 1. Parts of Speech Detective
                </button>
                <button type="button" class="mg-cat-btn" id="gw-mode-btn-fix" onclick="switchGrammarMode('fix')">
                    <i class="fas fa-magic"></i> 2. Sentence Doctor (Fix the Error)
                </button>
            </div>

            <!-- Mode 1 Stage: Parts of Speech -->
            <div id="gw-stage-pos" class="mg-stage-card">
                <div class="mg-prompt-meta">
                    <span class="mg-standard-tag" style="background: rgba(236, 72, 153, 0.1); color: #ec4899;">CCSS.ELA-LITERACY.L.3.1 & L.5.1</span>
                    <span class="mg-difficulty-tag">Task: Identify Target Part of Speech</span>
                </div>
                <h3 class="mg-instruction" id="gw-pos-prompt">Click the word in this sentence that functions as an <span style="color: #ec4899; text-decoration: underline;">Adverb</span>:</h3>
                
                <div class="gw-sentence-box" id="gw-sentence-interactive">
                    <!-- Interactive clickable word tokens generated by JS -->
                </div>

                <div class="mg-btn-group">
                    <button type="button" class="mg-btn-submit" onclick="checkPosSelection()" style="background: linear-gradient(135deg, #ec4899, #db2777);">
                        <i class="fas fa-check-circle"></i> Verify Word
                    </button>
                    <button type="button" class="mg-btn-secondary" onclick="nextPosExercise()">
                        <i class="fas fa-forward"></i> Next Sentence
                    </button>
                </div>
                <div id="gw-pos-feedback" class="mg-feedback-box" style="display: none;"></div>
            </div>

            <!-- Mode 2 Stage: Sentence Doctor -->
            <div id="gw-stage-fix" class="mg-stage-card" style="display: none;">
                <div class="mg-prompt-meta">
                    <span class="mg-standard-tag" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">CCSS.ELA-LITERACY.L.4.1 & L.6.2</span>
                    <span class="mg-difficulty-tag">Task: Correct the Error</span>
                </div>
                <h3 class="mg-instruction" id="gw-fix-prompt">Which revision correctly fixes the error in the sentence?</h3>
                
                <div class="gw-sentence-box" id="gw-fix-sentence-display" style="border-left: 4px solid #ef4444;">
                    <!-- Flawed sentence -->
                </div>

                <div id="gw-fix-options" style="display: flex; flex-direction: column; gap: 0.75rem; margin: 1.5rem 0;">
                    <!-- Option buttons -->
                </div>

                <div class="mg-btn-group">
                    <button type="button" class="mg-btn-secondary" onclick="nextFixExercise()">
                        <i class="fas fa-forward"></i> Next Challenge
                    </button>
                </div>
                <div id="gw-fix-feedback" class="mg-feedback-box" style="display: none;"></div>
            </div>
        </section>

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
                    <button onclick="openDynamicModal('Semicolons & Colons'); return false;" class="topic-pill" data-search-terms="semicolons colons linking lists quotes explanations">Semicolons & Colons</button>
                    <button onclick="openDynamicModal('Apostrophes & Quotation Marks'); return false;" class="topic-pill" data-search-terms="apostrophes quotation marks possession contractions speech quotes">Apostrophes & Quotation Marks</button>
                    <button onclick="openDynamicModal('Hyphens & Dashes'); return false;" class="topic-pill" data-search-terms="hyphens dashes compound words pausing emphasis">Hyphens & Dashes</button>
                    <button onclick="openDynamicModal('Parentheses & Ellipses'); return false;" class="topic-pill" data-search-terms="parentheses ellipses brackets punctuation pauses omissions extra information quotes">Parentheses & Ellipses</button>
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
                    <button onclick="openDynamicModal('Prefixes & Suffixes'); return false;" class="topic-pill" data-search-terms="prefixes suffixes roots unhappy helpful meanings">Prefixes & Suffixes</button>
                    <button onclick="openDynamicModal('Context Clues'); return false;" class="topic-pill" data-search-terms="context clues hint surrounding text meanings find">Context Clues</button>
                    <button onclick="openDynamicModal('Synonym & Antonym Games'); return false;" class="topic-pill" data-search-terms="synonym antonym opposite same similar words">Synonym & Antonym Games</button>
                    <button onclick="openDynamicModal('Roots & Etymology'); return false;" class="topic-pill" data-search-terms="roots etymology greek latin word origins history prefix suffix meanings base">Roots & Etymology</button>
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
                    <button onclick="openDynamicModal('Run-on Sentences & Fragments'); return false;" class="topic-pill" data-search-terms="run-on sentences fragments incomplete clauses complete thoughts">Run-on Sentences & Fragments</button>
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
                    <button onclick="openDynamicModal('Metaphors & Similes'); return false;" class="topic-pill" data-search-terms="metaphors similes comparisons like as time thief sunshine">Metaphors & Similes</button>
                    <button onclick="openDynamicModal('Personification & Hyperbole'); return false;" class="topic-pill" data-search-terms="personification hyperbole human traits wind whispered extreme exaggeration horse eat">Personification & Hyperbole</button>
                    <button onclick="openDynamicModal('Idioms & Allusions'); return false;" class="topic-pill" data-search-terms="idioms allusions common phrases break a leg romeo reference famous">Idioms & Allusions</button>
                    <button onclick="openDynamicModal('Symbolism & Imagery'); return false;" class="topic-pill" data-search-terms="symbolism imagery dove representing peace sensory detail sound sight smell taste touch crisp bang">Symbolism & Imagery</button>
                    <button onclick="openDynamicModal('Alliteration & Onomatopoeia'); return false;" class="topic-pill" data-search-terms="alliteration onomatopoeia sounds words repeating pop buzzing crackle sound effects figures of speech">Alliteration & Onomatopoeia</button>
                </div>
                <a href="/library/index.php" class="card-action-btn">Explore in Digital Library</a>
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

    /**
     * Interactive Grammar Mechanics & Sentence Workshop Controller
     */
    (function() {
        let mode = 'pos';
        let posIndex = 0;
        let fixIndex = 0;
        let selectedWord = null;
        let streak = 0;
        let mastered = 0;

        try {
            streak = parseInt(localStorage.getItem('hl_grammar_streak') || '0', 10);
            mastered = parseInt(localStorage.getItem('hl_grammar_mastered') || '0', 10);
        } catch(e) {}

        const posExercises = [
            {
                sentence: "The brilliant astronomer watched the meteor shower carefully from the telescope.",
                targetPos: "Adverb",
                targetWords: ["carefully"],
                hint: "Adverbs typically modify verbs or adjectives, often ending in -ly."
            },
            {
                sentence: "Ancient civilisations constructed towering stone monuments along the river banks.",
                targetPos: "Adjective",
                targetWords: ["Ancient", "towering", "stone"],
                hint: "Adjectives describe or give more information about nouns."
            },
            {
                sentence: "Although the storm raged fiercely outside, we remained safe inside the library.",
                targetPos: "Conjunction",
                targetWords: ["Although"],
                hint: "Subordinating conjunctions connect dependent clauses to independent clauses."
            },
            {
                sentence: "The inquisitive detective investigated the mysterious footprints in the snow.",
                targetPos: "Verb",
                targetWords: ["investigated"],
                hint: "Verbs express physical action, mental action, or state of being."
            },
            {
                sentence: "The swift falcon soared effortlessly above the rugged mountain peaks.",
                targetPos: "Preposition",
                targetWords: ["above"],
                hint: "Prepositions show spatial, temporal, or logical relationships."
            }
        ];

        const fixExercises = [
            {
                flawed: "The team of scientists have completed their preliminary observations.",
                prompt: "Fix the Subject-Verb Agreement error in this sentence:",
                options: [
                    { text: "The team of scientists has completed its preliminary observations.", correct: true, explanation: "'Team' is a singular collective noun requiring the singular verb 'has' and singular pronoun 'its'." },
                    { text: "The teams of scientists have completed their preliminary observations.", correct: false, explanation: "Unnecessarily changes the subject to plural." },
                    { text: "The team of scientist has completed their preliminary observations.", correct: false, explanation: "Incorrect noun number." }
                ]
            },
            {
                flawed: "They're backpacks were left over their by the classroom lockers.",
                prompt: "Fix the homophone misuse of their/there/they're:",
                options: [
                    { text: "Their backpacks were left over there by the classroom lockers.", correct: true, explanation: "'Their' is possessive (their backpacks); 'there' indicates location (over there)." },
                    { text: "There backpacks were left over they're by the classroom lockers.", correct: false, explanation: "Inverts both homophones incorrectly." },
                    { text: "They're backpacks were left over there by the classroom lockers.", correct: false, explanation: "'They're' is a contraction for 'they are'." }
                ]
            },
            {
                flawed: "The novel was captivating, I finished reading it in one afternoon.",
                prompt: "Fix the comma splice error between two independent clauses:",
                options: [
                    { text: "The novel was captivating; I finished reading it in one afternoon.", correct: true, explanation: "A semicolon correctly joins two related independent clauses without a coordinating conjunction." },
                    { text: "The novel was captivating and, I finished reading it in one afternoon.", correct: false, explanation: "The comma is misplaced after the coordinating conjunction." },
                    { text: "The novel being captivating, I finished reading it in one afternoon.", correct: false, explanation: "Creates an awkward participial phrase." }
                ]
            },
            {
                flawed: "Walking along the misty shoreline, the lighthouse suddenly appeared in the distance.",
                prompt: "Fix the dangling modifier:",
                options: [
                    { text: "As I walked along the misty shoreline, the lighthouse suddenly appeared in the distance.", correct: true, explanation: "Clarifies who was actually walking along the shoreline (the speaker, not the lighthouse!)." },
                    { text: "Walking along the misty shoreline, the distance showed the lighthouse.", correct: false, explanation: "The modifier is still dangling without an active agent." },
                    { text: "The lighthouse appeared walking along the misty shoreline.", correct: false, explanation: "Lighthouses cannot walk." }
                ]
            }
        ];

        function updateStatsUI() {
            const s = document.getElementById('gw-streak-val');
            const m = document.getElementById('gw-mastered-val');
            if (s) s.textContent = `🔥 ${streak}`;
            if (m) m.textContent = mastered;
            try {
                localStorage.setItem('hl_grammar_streak', streak.toString());
                localStorage.setItem('hl_grammar_mastered', mastered.toString());
            } catch(e) {}
        }

        window.switchGrammarMode = function(newMode) {
            mode = newMode;
            document.getElementById('gw-mode-btn-pos')?.classList.toggle('active', mode === 'pos');
            document.getElementById('gw-mode-btn-fix')?.classList.toggle('active', mode === 'fix');
            const stagePos = document.getElementById('gw-stage-pos');
            const stageFix = document.getElementById('gw-stage-fix');
            if (stagePos) stagePos.style.display = mode === 'pos' ? 'block' : 'none';
            if (stageFix) stageFix.style.display = mode === 'fix' ? 'block' : 'none';
        };

        function renderPosExercise() {
            const ex = posExercises[posIndex % posExercises.length];
            const promptEl = document.getElementById('gw-pos-prompt');
            const box = document.getElementById('gw-sentence-interactive');
            const feedback = document.getElementById('gw-pos-feedback');
            selectedWord = null;

            if (promptEl) {
                promptEl.innerHTML = `Click the word in this sentence that functions as an <span style="color: #ec4899; text-decoration: underline; font-weight: 800;">${ex.targetPos}</span>:`;
            }
            if (feedback) feedback.style.display = 'none';

            if (box) {
                box.innerHTML = '';
                const words = ex.sentence.split(/\s+/);
                words.forEach(w => {
                    const clean = w.replace(/[^a-zA-Z]/g, '');
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'gw-word-btn';
                    btn.textContent = w;
                    btn.dataset.clean = clean;
                    btn.addEventListener('click', () => {
                        box.querySelectorAll('.gw-word-btn').forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                        selectedWord = clean;
                    });
                    box.appendChild(btn);
                    box.appendChild(document.createTextNode(' '));
                });
            }
        }

        window.checkPosSelection = function() {
            const ex = posExercises[posIndex % posExercises.length];
            const feedback = document.getElementById('gw-pos-feedback');
            if (!selectedWord) {
                if (feedback) {
                    feedback.className = 'mg-feedback-box mg-feedback-error';
                    feedback.innerHTML = '<i class="fas fa-hand-pointer"></i> Please click a word in the sentence first!';
                    feedback.style.display = 'block';
                }
                return;
            }

            const isCorrect = ex.targetWords.some(tw => tw.toLowerCase() === selectedWord.toLowerCase());
            if (isCorrect) {
                streak++;
                mastered++;
                updateStatsUI();
                if (feedback) {
                    feedback.className = 'mg-feedback-box mg-feedback-success';
                    feedback.innerHTML = `<i class="fas fa-check-circle"></i> Correct! "<strong>${selectedWord}</strong>" is indeed functioning as a ${ex.targetPos}. ${ex.hint}`;
                    feedback.style.display = 'block';
                }
                if (window.questManager) window.questManager.addXP(15, 'Grammar Detective');
                if (streak > 0 && streak % 3 === 0 && typeof confetti === 'function') {
                    confetti({ particleCount: 75, spread: 60, origin: { y: 0.6 } });
                }
            } else {
                streak = 0;
                updateStatsUI();
                if (feedback) {
                    feedback.className = 'mg-feedback-box mg-feedback-error';
                    feedback.innerHTML = `<i class="fas fa-times-circle"></i> "<strong>${selectedWord}</strong>" is not a ${ex.targetPos}. Hint: ${ex.hint}`;
                    feedback.style.display = 'block';
                }
            }
        };

        window.nextPosExercise = function() {
            posIndex++;
            renderPosExercise();
        };

        function renderFixExercise() {
            const ex = fixExercises[fixIndex % fixExercises.length];
            const promptEl = document.getElementById('gw-fix-prompt');
            const display = document.getElementById('gw-fix-sentence-display');
            const optContainer = document.getElementById('gw-fix-options');
            const feedback = document.getElementById('gw-fix-feedback');

            if (promptEl) promptEl.textContent = ex.prompt;
            if (display) display.innerHTML = `<span style="font-size: 0.8rem; font-weight: 800; color: #ef4444; display: block; margin-bottom: 0.35rem;"><i class="fas fa-exclamation-triangle"></i> Original Sentence:</span> "${ex.flawed}"`;
            if (feedback) feedback.style.display = 'none';

            if (optContainer) {
                optContainer.innerHTML = '';
                ex.options.forEach((opt) => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'btn';
                    btn.style.cssText = 'padding: 0.85rem 1.25rem; border-radius: 0.85rem; background: var(--color-bg-surface); border: 1.5px solid var(--color-border); text-align: left; font-size: 0.95rem; font-weight: 600; cursor: pointer; transition: all 0.2s; color: var(--color-text-main); display: flex; align-items: center; gap: 0.75rem;';
                    btn.innerHTML = `<i class="far fa-circle" style="color: var(--color-text-muted);"></i> <span>${opt.text}</span>`;
                    btn.addEventListener('click', () => {
                        if (opt.correct) {
                            btn.style.borderColor = '#10b981';
                            btn.style.background = 'rgba(16, 185, 129, 0.1)';
                            btn.querySelector('i').className = 'fas fa-check-circle';
                            btn.querySelector('i').style.color = '#10b981';
                            streak++;
                            mastered++;
                            updateStatsUI();
                            if (feedback) {
                                feedback.className = 'mg-feedback-box mg-feedback-success';
                                feedback.innerHTML = `<i class="fas fa-check-circle"></i> Exactly right! ${opt.explanation}`;
                                feedback.style.display = 'block';
                            }
                            if (window.questManager) window.questManager.addXP(15, 'Sentence Doctor');
                            if (streak > 0 && streak % 3 === 0 && typeof confetti === 'function') {
                                confetti({ particleCount: 75, spread: 60, origin: { y: 0.6 } });
                            }
                        } else {
                            btn.style.borderColor = '#ef4444';
                            btn.style.background = 'rgba(239, 68, 68, 0.1)';
                            btn.querySelector('i').className = 'fas fa-times-circle';
                            btn.querySelector('i').style.color = '#ef4444';
                            streak = 0;
                            updateStatsUI();
                            if (feedback) {
                                feedback.className = 'mg-feedback-box mg-feedback-error';
                                feedback.innerHTML = `<i class="fas fa-times-circle"></i> Incorrect. ${opt.explanation}`;
                                feedback.style.display = 'block';
                            }
                        }
                    });
                    optContainer.appendChild(btn);
                });
            }
        }

        window.nextFixExercise = function() {
            fixIndex++;
            renderFixExercise();
        };

        renderPosExercise();
        renderFixExercise();
        updateStatsUI();
    })();
});
</script>

<?php
// Include the modal file
include '../src/resource-modal.php';
// Include the footer file
include '../src/footer.php';
?>


