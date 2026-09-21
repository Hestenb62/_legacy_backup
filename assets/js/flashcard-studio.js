/**
 * assets/js/flashcard-studio.js
 * Universal Leitner Spaced-Repetition System (SRS) Flashcard Studio
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    const STORAGE_KEY = 'hl_leitner_decks';

    const CURRICULUM_DECKS = {
        grade_4_math: {
            title: "Grade 4: Mathematics",
            badge: "Grade 4 Math",
            category: "curriculum",
            grade: "Grade 4",
            subject: "math",
            cards: [
                { id: "g4-m-1", term: "Multi-Digit Multiplication", definition: "The process of multiplying numbers with more than one digit using place value, area models, or standard algorithms.", example: "24 × 16 = 384.", box: 1 },
                { id: "g4-m-2", term: "Remainder", definition: "The amount left over after dividing a number into equal whole groups.", example: "25 ÷ 4 = 6 with a remainder of 1.", box: 1 },
                { id: "g4-m-3", term: "Equivalent Fractions", definition: "Fractions that have different numerators and denominators but represent the exact same proportion of a whole.", example: "2/4 is equivalent to 1/2.", box: 1 },
                { id: "g4-m-4", term: "Prime Number", definition: "A whole number greater than 1 whose only positive factors are 1 and itself.", example: "7 and 13 are prime numbers.", box: 1 },
                { id: "g4-m-5", term: "Composite Number", definition: "A whole number greater than 1 that possesses more than two factors.", example: "12 is composite with factors 1, 2, 3, 4, 6, and 12.", box: 1 },
                { id: "g4-m-6", term: "Perimeter", definition: "The continuous linear distance around the outer boundary of a closed 2D shape.", example: "A 5 cm by 8 cm rectangle has a perimeter of 26 cm.", box: 1 },
                { id: "g4-m-7", term: "Area", definition: "The total amount of two-dimensional surface space enclosed within a boundary, measured in square units.", example: "6 ft × 4 ft = 24 sq ft.", box: 1 },
                { id: "g4-m-8", term: "Angles (Acute, Right, Obtuse)", definition: "Acute angles measure <90°; right angles measure exactly 90°; obtuse angles measure between 90° and 180°.", example: "Square corners form 90° right angles.", box: 1 },
                { id: "g4-m-9", term: "Decimal Fraction", definition: "A fraction whose denominator is a power of 10 (10, 100, 1000) written in decimal place value.", example: "45/100 = 0.45.", box: 1 },
                { id: "g4-m-10", term: "Line of Symmetry", definition: "An imaginary line dividing a geometric figure into two identical mirror-image halves.", example: "A butterfly has vertical bilateral symmetry.", box: 1 }
            ]
        },
        grade_4_social: {
            title: "Grade 4: Social Studies & Civics",
            badge: "Grade 4 Social Studies",
            category: "curriculum",
            grade: "Grade 4",
            subject: "social",
            cards: [
                { id: "g4-ss-1", term: "Geographic Region", definition: "An area of land distinguished by common natural terrain, climate, or cultural features.", example: "The Coastal Plain features sandy soil and ocean access.", box: 1 },
                { id: "g4-ss-2", term: "Indigenous Peoples", definition: "The original native inhabitants of a geographic region prior to colonization or European arrival.", example: "Native American tribes cultivated corn, beans, and squash.", box: 1 },
                { id: "g4-ss-3", term: "Colonial Trade & Barter", definition: "Economic exchange of agricultural produce, furs, and manufactured goods without paper currency.", example: "Early settlers bartered grain for blacksmith tools.", box: 1 },
                { id: "g4-ss-4", term: "Three Branches of Government", definition: "The separation of powers into Legislative (makes laws), Executive (enforces laws), and Judicial (interprets laws).", example: "The state governor heads the executive branch.", box: 1 },
                { id: "g4-ss-5", term: "Civic Duty & Voting", definition: "The responsibilities and voluntary actions of citizens to support democracy, obey laws, and vote in elections.", example: "Voting gives citizens voice in democratic governance.", box: 1 },
                { id: "g4-ss-6", term: "Supply & Demand", definition: "The economic principle that prices rise when goods are scarce and fall when goods are abundant.", example: "When apples are scarce after a storm, prices rise.", box: 1 },
                { id: "g4-ss-7", term: "American Revolution", definition: "The 1775–1783 struggle in which thirteen North American colonies won independence from British imperial rule.", example: "The Declaration of Independence was signed in 1776.", box: 1 },
                { id: "g4-ss-8", term: "Primary vs. Secondary Source", definition: "A primary source is a firsthand record created during the event (diary, letter); a secondary source analyzes it later (textbook).", example: "A 1776 diary is a primary source.", box: 1 }
            ]
        },
        grade_4_science: {
            title: "Grade 4: Science Inquiry",
            badge: "Grade 4 Science",
            category: "curriculum",
            grade: "Grade 4",
            subject: "science",
            cards: [
                { id: "g4-sci-1", term: "Energy Transfer", definition: "The movement of energy from one object, place, or system to another through motion, heat, sound, or light.", example: "A swinging bat transfers kinetic energy to the baseball.", box: 1 },
                { id: "g4-sci-2", term: "Weathering & Erosion", definition: "Weathering breaks rocks down into sediments; erosion transports loosened sediments by wind, water, or gravity.", example: "Rivers carve deep canyons through erosion over time.", box: 1 },
                { id: "g4-sci-3", term: "Renewable Resources", definition: "Energy and materials that replenish naturally in a short timeframe (solar, wind, water).", example: "Solar panels convert renewable sunlight into electrical energy.", box: 1 },
                { id: "g4-sci-4", term: "Sensory Adaptation", definition: "Specialized physical structures and behaviors that animals use to sense and react to their environment for survival.", example: "Nocturnal owls have large eyes and acute hearing.", box: 1 },
                { id: "g4-sci-5", term: "Wave Properties (Amplitude & Wavelength)", definition: "Wavelength is distance between wave peaks; amplitude measures peak height and energy magnitude.", example: "High amplitude sound waves produce louder volume.", box: 1 },
                { id: "g4-sci-6", term: "Fossil Record", definition: "The preserved physical remains, imprints, or traces of ancient organisms found in sedimentary rock strata.", example: "Fish fossils found on mountains reveal ancient oceans.", box: 1 }
            ]
        },
        grade_4_ela: {
            title: "Grade 4: English Language Arts",
            badge: "Grade 4 Language Arts",
            category: "curriculum",
            grade: "Grade 4",
            subject: "ela",
            cards: [
                { id: "g4-ela-1", term: "Theme vs. Main Idea", definition: "Theme is the deep universal life lesson or moral message; main idea is what the specific story is mostly about.", example: "Theme: honesty is rewarded; Main idea: a boy returns lost money.", box: 1 },
                { id: "g4-ela-2", term: "Simile & Metaphor", definition: "Simile compares using 'like' or 'as'; metaphor makes a direct symbolic comparison without 'like' or 'as'.", example: "Simile: 'Quiet as a mouse.' Metaphor: 'The classroom was a zoo.'", box: 1 },
                { id: "g4-ela-3", term: "Point of View (1st vs 3rd Person)", definition: "1st person uses 'I/we' from inside the story; 3rd person uses 'he/she/they' from an outside perspective.", example: "'I saw the ship arrive' is first person narration.", box: 1 },
                { id: "g4-ela-4", term: "Text Structure", definition: "How an author organizes information: chronological order, cause & effect, problem & solution, compare & contrast.", example: "A timeline uses chronological text structure.", box: 1 },
                { id: "g4-ela-5", term: "Context Clues", definition: "Surrounding words and sentences that give hints to the definition of an unfamiliar vocabulary term.", example: "Hints in the paragraph help reveal the meaning of unknown words.", box: 1 },
                { id: "g4-ela-6", term: "Affixes (Prefixes & Suffixes)", definition: "Word parts added to roots: prefixes attach to beginnings (un-, re-) and suffixes attach to ends (-ful, -less).", example: "Re- + build = rebuild (build again).", box: 1 }
            ]
        },
        book_1984: {
            title: "1984 - George Orwell",
            badge: "Reader: 1984",
            category: "reader",
            bookId: "1984",
            cards: [
                { id: "b1984-1", term: "Telescreen", definition: "A two-way television monitor used by the Party and Thought Police to continuously observe citizens while broadcasting propaganda.", example: "Winston sat in the small alcove out of range of the telescreen.", box: 1 },
                { id: "b1984-2", term: "Doublethink", definition: "The psychological ability to hold two contradictory beliefs in one's mind simultaneously and accept both as true.", example: "War is Peace, Freedom is Slavery, Ignorance is Strength.", box: 1 },
                { id: "b1984-3", term: "Thoughtcrime", definition: "The act of holding unorthodox thoughts or private rebellious beliefs unaligned with Party doctrine.", example: "Writing his private diary constituted an act of thoughtcrime.", box: 1 },
                { id: "b1984-4", term: "Big Brother", definition: "The mysterious and omnipotent titular leader of the Party in Oceania.", example: "'BIG BROTHER IS WATCHING YOU' posters lined the streets of London.", box: 1 },
                { id: "b1984-5", term: "Newspeak", definition: "The official manufactured language designed by the Party to narrow vocabulary and eliminate rebellious concepts.", example: "In Newspeak, the word 'bad' was replaced by 'ungood'.", box: 1 },
                { id: "b1984-6", term: "Memory Hole", definition: "Pneumatic chute receptacles in the Ministry of Truth through which inconvenient historical records are incinerated.", example: "Winston dropped the old newspaper photograph into the memory hole.", box: 1 },
                { id: "b1984-7", term: "Proles", definition: "The working-class majority of Oceania, comprising roughly 85% of the total population.", example: "'If there is hope, it lies in the proles.'", box: 1 },
                { id: "b1984-8", term: "Ministry of Truth", definition: "The government department responsible for falsifying historical documents, news, literature, and educational media.", example: "Minitrue continually rewrote history to match current alliances.", box: 1 }
            ]
        },
        book_frankenstein: {
            title: "Frankenstein - Mary Shelley",
            badge: "Reader: Frankenstein",
            category: "reader",
            bookId: "frankenstein",
            cards: [
                { id: "bfr-1", term: "Galvanism", definition: "The early scientific theory that electrical currents could stimulate muscular contraction and reanimate biological tissue.", example: "Mary Shelley drew upon electrical experiments when imagining the creature's awakening.", box: 1 },
                { id: "bfr-2", term: "Hubris", definition: "Excessive pride, ambition, or self-confidence that ultimately causes a character's tragic downfall.", example: "Victor's scientific hubris led him to usurp natural biological laws without anticipating the consequences.", box: 1 },
                { id: "bfr-3", term: "Modern Prometheus", definition: "The subtitle of the novel, referencing the Titan who stole fire from the gods and suffered eternal punishment.", example: "Like Prometheus bringing forbidden fire, Victor creates life from non-living matter.", box: 1 },
                { id: "bfr-4", term: "Gothic Romanticism", definition: "A literary genre combining terrifying uncanny motifs, sublime nature, intense emotional passion, and moral critique.", example: "The frozen Arctic glaciers underscore the novel's Gothic Romantic atmosphere.", box: 1 },
                { id: "bfr-5", term: "The Sublime", definition: "An aesthetic quality of overwhelming greatness, awe, and terror inspired by vast natural wonders.", example: "Gazing at Mont Blanc, Victor experiences the sublime majesty of towering peaks.", box: 1 },
                { id: "bfr-6", term: "Solitude & Alienation", definition: "The devastating state of social isolation experienced by both the creator and his shunned creature.", example: "The creature laments: 'I am malicious because I am miserable.'", box: 1 }
            ]
        },
        book_federalist_papers: {
            title: "The Federalist Papers",
            badge: "Reader: Federalist Papers",
            category: "reader",
            bookId: "federalist-papers",
            cards: [
                { id: "bfed-1", term: "Federalism", definition: "A constitutional system dividing governing authority between a central national government and regional state entities.", example: "Federalist No. 45 explains how states retain extensive residual jurisdiction.", box: 1 },
                { id: "bfed-2", term: "Separation of Powers", definition: "The constitutional doctrine allocating distinct legislative, executive, and judicial functions to separate bodies.", example: "Federalist No. 51 famously asserts: 'Ambition must be made to counteract ambition.'", box: 1 },
                { id: "bfed-3", term: "Faction", definition: "A group of citizens united by a common passion or interest contrary to the rights of others or public welfare.", example: "In Federalist No. 10, James Madison examines how a republic controls factional violence.", box: 1 },
                { id: "bfed-4", term: "Checks & Balances", definition: "Constitutional mechanisms enabling each branch of government to restrain unilateral powers of other branches.", example: "The presidential veto and congressional override represent fundamental checks and balances.", box: 1 }
            ]
        },
        book_american_yawp: {
            title: "The American Yawp: U.S. History",
            badge: "Reader: American Yawp",
            category: "reader",
            bookId: "american-yawp",
            cards: [
                { id: "byawp-1", term: "Columbian Exchange", definition: "The transatlantic transfer of plants, animals, culture, populations, diseases, and ideas between the Americas and Europe.", example: "Maize and potatoes transformed European diets, while Old World diseases decimated native populations.", box: 1 },
                { id: "byawp-2", term: "Mercantilism", definition: "An economic policy where empires maximize national wealth by strictly controlling colonial trade to generate trade surpluses.", example: "The Navigation Acts enforced British mercantilist control over American ports.", box: 1 },
                { id: "byawp-3", term: "Reconstruction Era", definition: "The post-Civil War period (1865–1877) focused on reintegrating Southern states and securing rights for formerly enslaved people.", example: "The 13th, 14th, and 15th Amendments formed the constitutional core of Reconstruction.", box: 1 }
            ]
        },
        book_math_facts_repo: {
            title: "Mathematics Reference Codex",
            badge: "Reader: Math Codex",
            category: "reader",
            bookId: "math-facts-repo",
            cards: [
                { id: "bmf-1", term: "Euler's Identity", definition: "The mathematical equation e^(iπ) + 1 = 0, uniting arithmetic, algebra, geometry, and calculus.", example: "Euler's identity links the foundational constants: 0, 1, e, i, and π.", box: 1 },
                { id: "bmf-2", term: "Piecewise Linear Function", definition: "A function composed of distinct linear intervals, each governed by its own slope and linear rule.", example: "Elevation vs. time graphs often form piecewise linear functions.", box: 1 },
                { id: "bmf-3", term: "Derivative", definition: "The instantaneous rate of change of a function, geometrically representing the slope of the tangent line.", example: "The derivative of position over time represents instantaneous velocity.", box: 1 }
            ]
        }
    };

    const DEFAULT_DECKS = {
        ...CURRICULUM_DECKS,
        biology: {
            title: "Cellular Biology & Photosynthesis",
            category: "general",
            cards: [
                {
                    id: "bio-1",
                    term: "Photosynthesis",
                    definition: "The biochemical process by which green plants and algae synthesize glucose from carbon dioxide and water using light energy.",
                    example: "Without photosynthesis, terrestrial organisms would lack atmospheric oxygen.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "bio-2",
                    term: "Chloroplast",
                    definition: "A plant cell organelle containing chlorophyll where light reactions and carbon fixation take place.",
                    example: "Chloroplasts absorb red and blue light wavelengths while reflecting green.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "bio-3",
                    term: "Stomata",
                    definition: "Microscopic pores on leaf surfaces that regulate gas exchange and transpiration.",
                    example: "Stomata open during the day to take in carbon dioxide and close to preserve water.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "bio-4",
                    term: "Adenosine Triphosphate",
                    definition: "The primary cellular energy currency (ATP) carrying chemical energy for biological reactions.",
                    example: "Mitochondria produce ATP through cellular respiration.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "bio-5",
                    term: "Glucose",
                    definition: "A simple six-carbon sugar (C6H12O6) functioning as the vital fuel source for living cells.",
                    example: "Plants store excess glucose as starch molecules.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                }
            ]
        },
        algebra: {
            title: "Algebra & Coordinate Geometry",
            category: "general",
            cards: [
                {
                    id: "alg-1",
                    term: "Slope-Intercept Form",
                    definition: "The linear equation representation y = mx + b, where m represents the slope and b denotes the y-intercept.",
                    example: "In the line y = 3x - 2, the graph rises 3 units for every 1 unit of run.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "alg-2",
                    term: "Parabola",
                    definition: "A symmetrical U-shaped plane curve generated by the graph of a quadratic function f(x) = ax^2 + bx + c.",
                    example: "The vertex of the parabola marks its absolute minimum or maximum value.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "alg-3",
                    term: "Coefficient",
                    definition: "A constant numerical multiplier positioned immediately in front of a variable term.",
                    example: "In 7x^3, 7 is the coefficient multiplying the variable cubed.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "alg-4",
                    term: "Hypotenuse",
                    definition: "The longest side of a right-angled triangle, situated directly opposite the 90-degree angle.",
                    example: "The Pythagorean Theorem states that a^2 + b^2 = c^2, where c is the hypotenuse.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                }
            ]
        },
        history: {
            title: "Civics & Constitutional History",
            category: "general",
            cards: [
                {
                    id: "hist-1",
                    term: "Federalism",
                    definition: "A constitutional system dividing governing authority between a central national government and regional state entities.",
                    example: "Federalism allows individual states to craft local education laws while delegating defense to the federal tier.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "hist-2",
                    term: "Judicial Review",
                    definition: "The constitutional power of courts to review and invalidate legislative or executive acts deemed contrary to the Constitution.",
                    example: "Marbury v. Madison (1803) firmly established the principle of judicial review.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                },
                {
                    id: "hist-3",
                    term: "Due Process",
                    definition: "The fundamental legal requirement that government actions must respect all legal rights owed to a person under the rule of law.",
                    example: "The Fifth and Fourteenth Amendments guarantee substantive and procedural due process.",
                    box: 1,
                    lastReviewed: null,
                    nextDue: 0
                }
            ]
        },
        custom: {
            title: "Custom Student Deck",
            category: "general",
            cards: []
        }
    };

    let userDecks = {};
    let activeDeckKey = 'biology';
    let currentCardIdx = 0;
    let currentStudyMode = 'flip'; // 'flip', 'cloze', 'spelling'
    let isFlipped = false;

    function loadDecks() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            userDecks = raw ? JSON.parse(raw) : JSON.parse(JSON.stringify(DEFAULT_DECKS));
        } catch (e) {
            userDecks = JSON.parse(JSON.stringify(DEFAULT_DECKS));
        }

        // Ensure default decks exist
        Object.keys(DEFAULT_DECKS).forEach(key => {
            if (!userDecks[key]) {
                userDecks[key] = JSON.parse(JSON.stringify(DEFAULT_DECKS[key]));
            }
        });

        // Normalize and sanitize existing cards across all decks
        Object.keys(userDecks).forEach(key => {
            if (userDecks[key] && Array.isArray(userDecks[key].cards)) {
                userDecks[key].cards = userDecks[key].cards.filter(c => c && typeof c === 'object').map(c => {
                    return {
                        id: c.id || ('card-' + Date.now() + '-' + Math.floor(Math.random() * 1000)),
                        term: String(c.term || c.word || c.front || c.title || '').trim(),
                        definition: String(c.definition || c.meaning || c.back || c.desc || '').trim(),
                        example: String(c.example || '').trim(),
                        box: Math.max(1, Math.min(5, Number(c.box) || 1)),
                        lastReviewed: c.lastReviewed || null,
                        nextDue: Number(c.nextDue) || 0
                    };
                });
            }
        });
    }

    function saveDecks() {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(userDecks));
        } catch (e) {
            console.warn('Storage failed:', e);
        }
    }

    function getActiveCards() {
        const deck = userDecks[activeDeckKey];
        if (!deck || !Array.isArray(deck.cards)) return [];
        return deck.cards.filter(c => c && typeof c === 'object');
    }

    function updateLeitnerCounts() {
        const cards = getActiveCards();
        const counts = { 1: 0, 2: 0, 3: 0, 4: 0, 5: 0 };
        cards.forEach(c => {
            const b = Math.max(1, Math.min(5, c.box || 1));
            counts[b] = (counts[b] || 0) + 1;
        });

        for (let b = 1; b <= 5; b++) {
            const el = document.getElementById('leitner-count-' + b);
            if (el) el.textContent = counts[b];
        }

        // Highlight active Leitner box
        if (cards.length > 0 && currentCardIdx < cards.length) {
            const currentBox = cards[currentCardIdx].box || 1;
            document.querySelectorAll('.leitner-box-item').forEach(item => {
                if (Number(item.dataset.box) === currentBox) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Retention rate estimate: weighted average of cards in boxes
        const retentionEl = document.getElementById('flashcard-retention-rate');
        if (retentionEl) {
            if (cards.length === 0) {
                retentionEl.textContent = '100%';
            } else {
                const weightedPoints = (counts[1] * 20) + (counts[2] * 40) + (counts[3] * 65) + (counts[4] * 85) + (counts[5] * 100);
                const avg = Math.round(weightedPoints / cards.length);
                retentionEl.textContent = `${avg}%`;
            }
        }
    }

    function renderCurrentCard() {
        const cards = getActiveCards();
        const cardIndexEl = document.getElementById('flashcard-card-index');
        const cardTotalEl = document.getElementById('flashcard-card-total');
        const flipper = document.getElementById('flashcard-flipper');

        if (cardIndexEl) cardIndexEl.textContent = cards.length > 0 ? (currentCardIdx + 1) : 0;
        if (cardTotalEl) cardTotalEl.textContent = cards.length;

        // Reset flip state explicitly
        isFlipped = false;
        if (flipper) {
            flipper.classList.remove('flipped');
            flipper.classList.remove('is-flipped');
        }

        if (cards.length === 0) {
            const front = document.getElementById('flashcard-front-text');
            const back = document.getElementById('flashcard-back-text');
            const ex = document.getElementById('flashcard-example-text');
            if (front) front.textContent = "This deck is empty! Highlight text in the Reader and click 'Import Highlights' or choose another deck.";
            if (back) back.textContent = "No cards available.";
            if (ex) ex.textContent = "";
            updateLeitnerCounts();
            return;
        }

        if (currentCardIdx >= cards.length) currentCardIdx = 0;
        if (currentCardIdx < 0) currentCardIdx = cards.length - 1;

        const card = cards[currentCardIdx];
        if (!card) return;

        const term = String(card.term || card.word || card.front || card.title || '').trim();
        const definition = String(card.definition || card.meaning || card.back || card.desc || '').trim();
        const example = String(card.example || '').trim();

        // 1. Classic Flip
        const frontText = document.getElementById('flashcard-front-text');
        const backText = document.getElementById('flashcard-back-text');
        const exampleText = document.getElementById('flashcard-example-text');

        if (frontText) frontText.textContent = term || 'Untitled Card';
        if (backText) backText.textContent = definition || 'No definition available.';
        if (exampleText) exampleText.textContent = example ? `"${example}"` : '';

        // 2. Cloze Recall
        const clozeDisplay = document.getElementById('cloze-sentence-display');
        const clozeInput = document.getElementById('cloze-user-input');
        const clozeFeedback = document.getElementById('cloze-feedback-msg');

        if (clozeDisplay) {
            const sentence = example || definition || term;
            if (term && sentence) {
                try {
                    const regex = new RegExp(term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'gi');
                    clozeDisplay.innerHTML = sentence.replace(regex, '<span style="color: var(--color-primary); text-decoration: underline; font-weight: 800;">________</span>');
                } catch (e) {
                    clozeDisplay.textContent = sentence;
                }
            } else {
                clozeDisplay.textContent = sentence || 'No cloze text available.';
            }
        }
        if (clozeInput) {
            clozeInput.value = '';
        }
        if (clozeFeedback) clozeFeedback.style.display = 'none';

        // 3. Spelling Bee
        const spellingInput = document.getElementById('spelling-user-input');
        const spellingHint = document.getElementById('spelling-hint-text');
        const spellingFeedback = document.getElementById('spelling-feedback-msg');

        if (spellingInput) spellingInput.value = '';
        if (spellingHint) spellingHint.textContent = definition ? `Definition hint: ${definition.slice(0, 120)}...` : (term ? `Word length: ${term.length} letters` : '');
        if (spellingFeedback) spellingFeedback.style.display = 'none';

        updateLeitnerCounts();
    }

    function gradeCard(grade) {
        const cards = getActiveCards();
        if (cards.length === 0) return;

        const card = cards[currentCardIdx];
        const now = Date.now();
        card.lastReviewed = now;

        let box = card.box || 1;
        if (grade === 'again') {
            box = 1;
            card.nextDue = now + 10 * 60 * 1000; // 10 minutes
        } else if (grade === 'hard') {
            box = Math.max(1, box - 1);
            card.nextDue = now + 24 * 3600 * 1000; // 1 day
        } else if (grade === 'good') {
            box = Math.min(5, box + 1);
            card.nextDue = now + (box * 3) * 24 * 3600 * 1000; // 3-15 days
        } else if (grade === 'easy') {
            box = Math.min(5, box + 2);
            card.nextDue = now + 7 * 24 * 3600 * 1000; // 7 days
        }

        card.box = box;
        saveDecks();
        updateLeitnerCounts();

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(`Card graded as ${grade}. Moved to Leitner Box ${box}.`);
        }

        // Advance to next card
        currentCardIdx = (currentCardIdx + 1) % cards.length;
        renderCurrentCard();
    }

    function toggleFlip() {
        const flipper = document.getElementById('flashcard-flipper');
        if (!flipper) return;

        isFlipped = !isFlipped;
        if (isFlipped) {
            flipper.classList.add('flipped');
            flipper.classList.add('is-flipped');
        } else {
            flipper.classList.remove('flipped');
            flipper.classList.remove('is-flipped');
        }

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(isFlipped ? 'Card flipped to back: definition visible' : 'Card flipped to front: term visible');
        }
    }

    function switchStudyMode(mode) {
        currentStudyMode = mode;
        const btnFlip = document.getElementById('btn-mode-flip');
        const btnCloze = document.getElementById('btn-mode-cloze');
        const btnSpelling = document.getElementById('btn-mode-spelling');

        const paneFlip = document.getElementById('pane-mode-flip');
        const paneCloze = document.getElementById('pane-mode-cloze');
        const paneSpelling = document.getElementById('pane-mode-spelling');

        [btnFlip, btnCloze, btnSpelling].forEach(b => b && b.classList.remove('active'));
        [paneFlip, paneCloze, paneSpelling].forEach(p => p && (p.style.display = 'none'));

        if (mode === 'flip') {
            if (btnFlip) btnFlip.classList.add('active');
            if (paneFlip) paneFlip.style.display = 'block';
        } else if (mode === 'cloze') {
            if (btnCloze) btnCloze.classList.add('active');
            if (paneCloze) paneCloze.style.display = 'block';
        } else if (mode === 'spelling') {
            if (btnSpelling) btnSpelling.classList.add('active');
            if (paneSpelling) paneSpelling.style.display = 'block';
        }

        renderCurrentCard();
    }

    function speakTerm(speed = 1.0) {
        const cards = getActiveCards();
        if (cards.length === 0) return;
        const card = cards[currentCardIdx];
        if (!card || !('speechSynthesis' in window)) return;

        window.speechSynthesis.cancel();
        const term = String(card.term || card.word || card.front || '');
        const def = String(card.definition || card.meaning || card.back || '');
        const text = isFlipped ? def : term;
        if (!text) return;
        const u = new SpeechSynthesisUtterance(text);
        u.rate = speed;
        u.pitch = 1.0;
        window.speechSynthesis.speak(u);
    }

    function buildScaffoldedGradeCards(gradeSlug, subject, gradeName) {
        const vocabBank = {
            math: [
                { term: "Place Value", definition: "The numerical value that a digit has by virtue of its position in a number.", example: "In 452, the 5 has a place value of 50." },
                { term: "Factor & Multiple", definition: "Factors multiply together to yield a product; multiples are the products of multiplying a number by integers.", example: "3 and 4 are factors of 12; 12, 24, and 36 are multiples of 12." },
                { term: "Order of Operations", definition: "The universal sequence for simplifying arithmetic expressions (PEMDAS/GEMDAS).", example: "Always evaluate parentheses and exponents before multiplication." },
                { term: "Coordinate Grid", definition: "A two-dimensional surface formed by the intersection of horizontal x-axis and vertical y-axis.", example: "The origin is plotted at coordinate point (0,0)." }
            ],
            social: [
                { term: "Sovereignty", definition: "The supreme and independent power of a self-governing political community or nation.", example: "Democratic sovereignty resides with the voting citizens." },
                { term: "Constitution", definition: "The fundamental organic law and structural principles establishing a system of government.", example: "The US Constitution establishes separation of powers." },
                { term: "Scarcity", definition: "The foundational economic condition of having unlimited human wants in a world of limited resources.", example: "Scarcity forces societies to allocate goods efficiently." },
                { term: "Citizenship", definition: "The recognized legal status of being a member of a nation with accompanying rights and duties.", example: "Civic participation is a hallmark of good citizenship." }
            ],
            science: [
                { term: "Hypothesis", definition: "A testable and falsifiable proposed explanation for an observed natural phenomenon.", example: "Scientists formulate hypotheses before conducting experiments." },
                { term: "Ecosystem", definition: "A biological community of interacting living organisms and their non-living physical environment.", example: "Forest ecosystems depend on sunlight, soil, and water cycles." },
                { term: "Conservation of Energy", definition: "Physical law stating energy cannot be created or destroyed, only transformed from one form to another.", example: "Chemical energy in batteries converts into light energy." },
                { term: "Empirical Evidence", definition: "Information acquired through direct observation, repeatable experimentation, or sensory data.", example: "Empirical evidence supports the theory of plate tectonics." }
            ],
            ela: [
                { term: "Inference", definition: "A reasoned conclusion reached on the basis of textual evidence and logical reasoning.", example: "Readers infer character motives from actions and dialogue." },
                { term: "Central Idea", definition: "The primary unifying thought, thesis, or claim that anchors a text.", example: "The central idea unifies all supporting paragraph details." },
                { term: "Tone & Mood", definition: "Tone is the author's attitude toward the subject; mood is the emotional atmosphere evoked in the reader.", example: "An eerie diction establishes a suspenseful mood." },
                { term: "Rhetorical Claim", definition: "An assertive statement that an author presents and defends with reasoning and evidence.", example: "The essay's central claim advocates for renewable energy." }
            ]
        };

        const bank = vocabBank[subject] || vocabBank.math;
        return bank.map((item, idx) => ({
            id: `scaff-${gradeSlug}-${subject}-${idx}`,
            term: item.term,
            definition: item.definition,
            example: item.example,
            box: 1,
            lastReviewed: null,
            nextDue: 0
        }));
    }

    function detectPageContext() {
        const pathname = window.location.pathname || '';
        const search = window.location.search || '';
        const urlParams = new URLSearchParams(search);

        // 1. Digital Reader Detection
        let bookId = window.BOOK_METADATA?.id || urlParams.get('book');
        if (!bookId && pathname.includes('/library/read/')) {
            const segs = pathname.split('/').filter(Boolean);
            const readIdx = segs.indexOf('read');
            if (readIdx >= 0 && segs[readIdx + 1] && !segs[readIdx + 1].endsWith('.php')) {
                bookId = segs[readIdx + 1];
            }
        }

        if (bookId) {
            const cleanKey = 'book_' + bookId.toLowerCase().replace(/[^a-z0-9]/g, '_');
            if (userDecks[cleanKey]) {
                return {
                    key: cleanKey,
                    type: 'reader',
                    title: userDecks[cleanKey].title,
                    badge: userDecks[cleanKey].badge || `Book: ${bookId}`
                };
            }

            // If reader has chapter vocabulary, dynamically register
            if (window.BOOK_JSON_VOCAB && Array.isArray(window.BOOK_JSON_VOCAB) && window.BOOK_JSON_VOCAB.length > 0) {
                const bookTitle = window.BOOK_METADATA?.title || bookId.replace(/[-_]/g, ' ').toUpperCase();
                userDecks[cleanKey] = {
                    title: `${bookTitle} - Reader Vocabulary`,
                    badge: `Reader: ${bookTitle}`,
                    category: 'reader',
                    cards: window.BOOK_JSON_VOCAB.map((v, i) => ({
                        id: `book-${bookId}-${i}`,
                        term: String(v.word || v.term || '').trim(),
                        definition: String(v.definition || v.meaning || '').trim(),
                        example: String(v.example || (window.BOOK_METADATA?.chapterTitle ? `Chapter: ${window.BOOK_METADATA.chapterTitle}` : '')).trim(),
                        box: 1,
                        lastReviewed: null,
                        nextDue: 0
                    }))
                };
                saveDecks();
                return {
                    key: cleanKey,
                    type: 'reader',
                    title: userDecks[cleanKey].title,
                    badge: userDecks[cleanKey].badge
                };
            }
        }

        // 2. Interactive Single Lesson Detection
        const lessonContainer = document.querySelector('.lesson-container');
        const lessonTitleEl = document.querySelector('.lesson-title');
        const lessonVocabCards = document.querySelectorAll('.lesson-vocab-card, .lesson-vocab-card-open, .lesson-vocab-item');
        if (lessonContainer && lessonVocabCards.length > 0) {
            const rawLessonId = urlParams.get('lesson') || (search.replace('?', '').split('&')[0]);
            const lessonKey = 'lesson_' + (rawLessonId || 'current').replace(/[^a-zA-Z0-9]/g, '_');
            const lessonTitle = lessonTitleEl ? lessonTitleEl.textContent.trim() : 'Lesson Vocabulary';

            if (!userDecks[lessonKey]) {
                const cards = [];
                lessonVocabCards.forEach((c, idx) => {
                    const termEl = c.querySelector('.lesson-vocab-term') || c.querySelector('strong') || c.querySelector('h4');
                    const defEl = c.querySelector('.lesson-vocab-def') || c.querySelector('p');
                    if (termEl && defEl) {
                        cards.push({
                            id: `${lessonKey}-${idx}`,
                            term: termEl.textContent.trim(),
                            definition: defEl.textContent.trim(),
                            example: '',
                            box: 1,
                            lastReviewed: null,
                            nextDue: 0
                        });
                    }
                });
                if (cards.length > 0) {
                    userDecks[lessonKey] = {
                        title: `Lesson: ${lessonTitle}`,
                        badge: 'Lesson Vocab',
                        category: 'curriculum',
                        cards: cards
                    };
                    saveDecks();
                }
            }
            if (userDecks[lessonKey]) {
                return {
                    key: lessonKey,
                    type: 'lesson',
                    title: userDecks[lessonKey].title,
                    badge: 'Lesson Vocab'
                };
            }
        }

        // 3. Level Page Detection (e.g. /levels/f.php or /levels/practice-ged.php)
        let levelId = window.HL_PAGE_CONTEXT?.levelId || window.LEVEL_ID;
        if (!levelId) {
            const match = pathname.match(/\/levels\/([a-zA-Z0-9\-_]+)\.php/i);
            if (match) levelId = match[1].toLowerCase();
        }

        if (levelId) {
            // Resolve active subject
            let subject = window.HL_PAGE_CONTEXT?.subject;
            if (!subject) {
                const activeTab = document.querySelector('.subject-tab.active, .tab-btn.active');
                if (activeTab) {
                    subject = activeTab.id ? activeTab.id.replace('tab-', '') : (activeTab.dataset.subject || '');
                }
            }
            if (!subject) {
                subject = urlParams.get('subject') || 'math';
            }
            subject = subject.toLowerCase();
            if (subject.includes('social') || subject.includes('soc')) subject = 'social';
            else if (subject.includes('sci')) subject = 'science';
            else if (subject.includes('ela') || subject.includes('read') || subject.includes('lang')) subject = 'ela';
            else subject = 'math';

            // Map levelId to grade
            const levelGradeMap = {
                'a': 'prek',
                'b': 'k',
                'c': '1',
                'd': '2',
                'e': '3',
                'f': '4',
                'g': '5',
                'h': '6',
                'i': '7',
                'j': '8',
                'k': '9',
                'l': '10',
                'm': '11',
                'n': '12',
                'o': 'ap',
                'practice-ged': 'ged'
            };
            const gradeSlug = levelGradeMap[levelId] || levelId;
            const targetDeckKey = (levelId === 'practice-ged') ? `ged_${subject}` : `grade_${gradeSlug}_${subject}`;

            if (userDecks[targetDeckKey]) {
                return {
                    key: targetDeckKey,
                    type: 'level',
                    title: userDecks[targetDeckKey].title,
                    badge: userDecks[targetDeckKey].badge || `Grade ${gradeSlug.toUpperCase()} ${subject.toUpperCase()}`
                };
            }

            // Fallback: build scaffolded deck if not defined in static bundle
            const fallbackGradeName = window.HL_PAGE_CONTEXT?.gradeText || ('Grade ' + gradeSlug.toUpperCase());
            const subjName = subject === 'math' ? 'Mathematics' : (subject === 'social' ? 'Social Studies & Civics' : (subject === 'science' ? 'Science Inquiry' : 'Language Arts'));
            userDecks[targetDeckKey] = {
                title: `${fallbackGradeName}: ${subjName}`,
                badge: `${fallbackGradeName} ${subject.toUpperCase()}`,
                category: 'curriculum',
                grade: fallbackGradeName,
                subject: subject,
                cards: buildScaffoldedGradeCards(gradeSlug, subject, fallbackGradeName)
            };
            saveDecks();

            return {
                key: targetDeckKey,
                type: 'level',
                title: userDecks[targetDeckKey].title,
                badge: userDecks[targetDeckKey].badge
            };
        }

        return null;
    }

    function populateDeckSelect(selectedDeckKey, contextInfo = null) {
        const deckSelect = document.getElementById('flashcard-deck-select');
        const contextChip = document.getElementById('flashcard-context-indicator');
        const contextChipText = document.getElementById('flashcard-context-chip-text');
        if (!deckSelect) return;

        deckSelect.innerHTML = '';

        // 1. Contextual Option (Current Page)
        if (contextInfo && userDecks[contextInfo.key]) {
            const ctxGroup = document.createElement('optgroup');
            ctxGroup.label = '📍 Contextual to Current Page';
            const ctxOpt = document.createElement('option');
            ctxOpt.value = contextInfo.key;
            ctxOpt.textContent = `★ ${userDecks[contextInfo.key].title || contextInfo.key} (Current Page)`;
            ctxGroup.appendChild(ctxOpt);
            deckSelect.appendChild(ctxGroup);
        }

        // 2. Grade & Subject Decks
        const currGroup = document.createElement('optgroup');
        currGroup.label = '📚 Grade & Subject Decks';
        let hasCurr = false;

        // 3. Digital Reader & Literature Decks
        const readerGroup = document.createElement('optgroup');
        readerGroup.label = '📖 Literature & Reader Decks';
        let hasReader = false;

        // 4. General & Personal Decks
        const generalGroup = document.createElement('optgroup');
        generalGroup.label = '⭐ General & Custom Decks';
        let hasGeneral = false;

        Object.keys(userDecks).forEach(key => {
            const d = userDecks[key];
            if (!d) return;

            const opt = document.createElement('option');
            opt.value = key;
            opt.textContent = d.title || key;

            if (d.category === 'reader' || key.startsWith('book_')) {
                readerGroup.appendChild(opt);
                hasReader = true;
            } else if (d.category === 'curriculum' || key.startsWith('grade_') || key.startsWith('ged_') || key.startsWith('lesson_')) {
                currGroup.appendChild(opt);
                hasCurr = true;
            } else {
                generalGroup.appendChild(opt);
                hasGeneral = true;
            }
        });

        if (hasCurr) deckSelect.appendChild(currGroup);
        if (hasReader) deckSelect.appendChild(readerGroup);
        if (hasGeneral) deckSelect.appendChild(generalGroup);

        // Assign active value
        if (selectedDeckKey && userDecks[selectedDeckKey]) {
            deckSelect.value = selectedDeckKey;
        } else if (contextInfo && userDecks[contextInfo.key]) {
            deckSelect.value = contextInfo.key;
        }

        // Update context chip
        if (contextChip && contextChipText) {
            if (contextInfo && deckSelect.value === contextInfo.key) {
                contextChip.style.display = 'inline-flex';
                contextChipText.textContent = `Auto-tailored: ${contextInfo.badge || contextInfo.title}`;
            } else {
                contextChip.style.display = 'none';
            }
        }
    }

    function initFlashcardStudio() {
        loadDecks();

        const modal = document.getElementById('flashcard-studio-modal');
        const backdrop = document.getElementById('flashcard-backdrop-close');
        const closeBtn = document.getElementById('flashcard-modal-close');
        const deckSelect = document.getElementById('flashcard-deck-select');
        const scene = document.getElementById('flashcard-card-scene');
        const flipper = document.getElementById('flashcard-flipper');

        const prevBtn = document.getElementById('btn-flashcard-prev');
        const nextBtn = document.getElementById('btn-flashcard-next');
        const flipActionBtn = document.getElementById('btn-flashcard-flip-action');
        const exportBtn = document.getElementById('btn-flashcard-export');
        const importBtn = document.getElementById('btn-flashcard-import-notes');

        const frontAudioBtn = document.getElementById('btn-front-audio');
        const backAudioBtn = document.getElementById('btn-back-audio');

        // Toggle open/close API with Adaptive Context Detection
        window.openFlashcardStudio = function (deckKey = null) {
            loadDecks();
            const ctx = detectPageContext();

            if (deckKey && userDecks[deckKey]) {
                activeDeckKey = deckKey;
            } else if (ctx && userDecks[ctx.key]) {
                activeDeckKey = ctx.key;
            }

            populateDeckSelect(activeDeckKey, ctx);
            if (deckSelect) deckSelect.value = activeDeckKey;

            if (modal) {
                modal.classList.add('active');
                modal.style.display = 'flex';
            }
            currentCardIdx = 0;
            renderCurrentCard();
            if (scene && typeof scene.focus === 'function') scene.focus();
            if (typeof window.announceA11y === 'function') {
                const title = userDecks[activeDeckKey]?.title || activeDeckKey;
                window.announceA11y(`Flashcard Studio opened with deck: ${title}.`);
            }
        };

        window.closeFlashcardStudio = function () {
            if (modal) {
                modal.classList.remove('active');
                modal.style.display = 'none';
            }
            if ('speechSynthesis' in window) window.speechSynthesis.cancel();
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Flashcard Studio closed.');
            }
        };

        window.toggleFlashcardStudio = function (openOrClose = null, deckKey = null) {
            const isOpen = modal && (modal.classList.contains('active') || modal.style.display === 'flex');
            if (openOrClose === true) {
                window.openFlashcardStudio(deckKey);
            } else if (openOrClose === false) {
                window.closeFlashcardStudio();
            } else {
                if (isOpen) {
                    window.closeFlashcardStudio();
                } else {
                    window.openFlashcardStudio(deckKey);
                }
            }
        };

        // Listen for subject tab switches across level pages
        window.addEventListener('hl:subject-switched', (e) => {
            const ctx = detectPageContext();
            if (ctx && userDecks[ctx.key]) {
                const isOpen = modal && (modal.classList.contains('active') || modal.style.display === 'flex');
                if (isOpen) {
                    activeDeckKey = ctx.key;
                    populateDeckSelect(activeDeckKey, ctx);
                    currentCardIdx = 0;
                    renderCurrentCard();
                }
            }
        });

        // Add card to deck external hook
        window.addFlashcardToDeck = function (deckKey, term, definition, example = '') {
            loadDecks();
            let targetKey = deckKey;
            let termVal = term;
            let defVal = definition;
            let exVal = example;

            // Handle invocation as (term, definition, example) without deckKey
            if (typeof defVal === 'undefined' && typeof termVal === 'string') {
                defVal = termVal;
                termVal = targetKey;
                targetKey = 'custom';
            }

            targetKey = (userDecks && userDecks[targetKey]) ? targetKey : 'custom';
            if (!userDecks[targetKey]) {
                userDecks[targetKey] = { title: 'Custom Student Deck', cards: [] };
            }
            if (!Array.isArray(userDecks[targetKey].cards)) {
                userDecks[targetKey].cards = [];
            }

            userDecks[targetKey].cards.push({
                id: 'card-' + Date.now() + '-' + Math.floor(Math.random() * 1000),
                term: String(termVal || '').trim(),
                definition: String(defVal || '').trim(),
                example: String(exVal || '').trim(),
                box: 1,
                lastReviewed: null,
                nextDue: 0
            });
            saveDecks();
            if (activeDeckKey === targetKey) {
                renderCurrentCard();
            }
        };

        if (backdrop) backdrop.addEventListener('click', window.closeFlashcardStudio);
        if (closeBtn) closeBtn.addEventListener('click', window.closeFlashcardStudio);

        // Deck change
        if (deckSelect) {
            deckSelect.addEventListener('change', () => {
                activeDeckKey = deckSelect.value;
                currentCardIdx = 0;
                renderCurrentCard();

                // Update context indicator chip
                const ctx = detectPageContext();
                const contextChip = document.getElementById('flashcard-context-indicator');
                const contextChipText = document.getElementById('flashcard-context-chip-text');
                if (contextChip) {
                    if (ctx && activeDeckKey === ctx.key) {
                        contextChip.style.display = 'inline-flex';
                        if (contextChipText) contextChipText.textContent = `Auto-tailored: ${ctx.badge || ctx.title}`;
                    } else {
                        contextChip.style.display = 'none';
                    }
                }
            });
        }

        // Mode switch buttons
        const btnFlip = document.getElementById('btn-mode-flip');
        const btnCloze = document.getElementById('btn-mode-cloze');
        const btnSpelling = document.getElementById('btn-mode-spelling');

        if (btnFlip) btnFlip.addEventListener('click', () => switchStudyMode('flip'));
        if (btnCloze) btnCloze.addEventListener('click', () => switchStudyMode('cloze'));
        if (btnSpelling) btnSpelling.addEventListener('click', () => switchStudyMode('spelling'));

        // Flip triggers on scene, flipper, and flip button
        if (scene) {
            scene.addEventListener('click', (e) => {
                // If audio button inside was clicked, don't flip
                if (e.target.closest('.flashcard-audio-icon-btn')) return;
                toggleFlip();
            });
            scene.addEventListener('keydown', (e) => {
                if (e.key === ' ' || e.key === 'Enter') {
                    e.preventDefault();
                    toggleFlip();
                }
            });
        }

        if (flipActionBtn) {
            flipActionBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleFlip();
            });
        }

        // Audio icons
        if (frontAudioBtn) {
            frontAudioBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                speakTerm(1.0);
            });
        }
        if (backAudioBtn) {
            backAudioBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                speakTerm(1.0);
            });
        }

        // Leitner rating buttons
        document.querySelectorAll('.leitner-grade-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                gradeCard(btn.dataset.grade);
            });
        });

        // Navigation
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                const cards = getActiveCards();
                if (cards.length > 0) {
                    currentCardIdx = (currentCardIdx - 1 + cards.length) % cards.length;
                    renderCurrentCard();
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const cards = getActiveCards();
                if (cards.length > 0) {
                    currentCardIdx = (currentCardIdx + 1) % cards.length;
                    renderCurrentCard();
                }
            });
        }

        // Check Cloze answer
        const checkClozeBtn = document.getElementById('btn-check-cloze');
        const clozeInput = document.getElementById('cloze-user-input');
        const clozeFeedback = document.getElementById('cloze-feedback-msg');

        function verifyCloze() {
            const cards = getActiveCards();
            if (cards.length === 0 || !clozeInput || !clozeFeedback) return;
            const card = cards[currentCardIdx];
            if (!card) return;
            const term = String(card.term || card.word || card.front || '').trim();
            const answer = clozeInput.value.trim().toLowerCase();
            const target = term.toLowerCase();

            clozeFeedback.style.display = 'block';
            if (answer && target && answer === target) {
                clozeFeedback.className = 'cloze-feedback correct';
                clozeFeedback.innerHTML = '<i class="fas fa-check-circle" style="color: #10b981;"></i> Correct! Outstanding recall.';
                setTimeout(() => gradeCard('good'), 1200);
            } else {
                clozeFeedback.className = 'cloze-feedback incorrect';
                clozeFeedback.innerHTML = `<i class="fas fa-times-circle" style="color: #ef4444;"></i> The correct term is: <strong>${term || 'N/A'}</strong>.`;
            }
        }

        if (checkClozeBtn) checkClozeBtn.addEventListener('click', verifyCloze);
        if (clozeInput) {
            clozeInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') verifyCloze();
            });
        }

        // Spelling Bee actions
        const listenBtn = document.getElementById('btn-spelling-listen');
        const slowBtn = document.getElementById('btn-spelling-slow');
        const checkSpellingBtn = document.getElementById('btn-check-spelling');
        const spellingInput = document.getElementById('spelling-user-input');
        const spellingFeedback = document.getElementById('spelling-feedback-msg');

        if (listenBtn) listenBtn.addEventListener('click', () => speakTerm(1.0));
        if (slowBtn) slowBtn.addEventListener('click', () => speakTerm(0.6));

        function verifySpelling() {
            const cards = getActiveCards();
            if (cards.length === 0 || !spellingInput || !spellingFeedback) return;
            const card = cards[currentCardIdx];
            if (!card) return;
            const term = String(card.term || card.word || card.front || '').trim();
            const typed = spellingInput.value.trim().toLowerCase();
            const correct = term.toLowerCase();

            spellingFeedback.style.display = 'block';
            if (typed && correct && typed === correct) {
                spellingFeedback.className = 'cloze-feedback correct';
                spellingFeedback.innerHTML = '<i class="fas fa-check-circle" style="color: #10b981;"></i> 100% Accurate Spelling!';
                setTimeout(() => gradeCard('good'), 1200);
            } else {
                spellingFeedback.className = 'cloze-feedback incorrect';
                spellingFeedback.innerHTML = `<i class="fas fa-times-circle" style="color: #ef4444;"></i> Correct spelling is: <strong>${term || 'N/A'}</strong>`;
            }
        }

        if (checkSpellingBtn) checkSpellingBtn.addEventListener('click', verifySpelling);
        if (spellingInput) {
            spellingInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') verifySpelling();
            });
        }

        // Export Deck
        if (exportBtn) {
            exportBtn.addEventListener('click', () => {
                const deck = userDecks[activeDeckKey];
                if (!deck) return;
                const blob = new Blob([JSON.stringify(deck, null, 2)], { type: 'application/json' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `${activeDeckKey}-flashcards.json`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        }

        // Import from Reader Highlights
        if (importBtn) {
            importBtn.addEventListener('click', () => {
                try {
                    const allKeys = Object.keys(localStorage);
                    const hlKeys = allKeys.filter(k => k.includes('highlight') || k.includes('hl_'));
                    const importedTerms = [];

                    hlKeys.forEach(k => {
                        try {
                            const val = JSON.parse(localStorage.getItem(k));
                            if (Array.isArray(val)) {
                                val.forEach(item => {
                                    if (item.text && item.text.length < 90) {
                                        importedTerms.push({
                                            id: 'imp-' + Date.now() + '-' + Math.random().toString(36).substr(2, 4),
                                            term: item.text,
                                            definition: item.note || "Curriculum key concept captured from active reading annotations.",
                                            example: item.page ? `Page ${item.page}` : "",
                                            box: 1,
                                            nextDue: 0
                                        });
                                    }
                                });
                            }
                        } catch(e){}
                    });

                    if (importedTerms.length > 0) {
                        userDecks.custom.cards = [...userDecks.custom.cards, ...importedTerms];
                        saveDecks();
                        activeDeckKey = 'custom';
                        if (deckSelect) deckSelect.value = 'custom';
                        currentCardIdx = 0;
                        renderCurrentCard();
                        alert(`Successfully imported ${importedTerms.length} annotated flashcard terms into your Custom Deck!`);
                    } else {
                        alert("No short reading highlights found yet. Highlight terms in any book or lesson to import them!");
                    }
                } catch(err) {
                    alert("Import error: " + err.message);
                }
            });
        }

        // Global shortcuts
        window.addEventListener('keydown', (e) => {
            const isModalOpen = modal && (modal.classList.contains('active') || modal.style.display === 'flex');

            // Alt+F toggle
            if (e.altKey && (e.key === 'f' || e.key === 'F' || e.code === 'KeyF')) {
                e.preventDefault();
                window.toggleFlashcardStudio();
                return;
            }

            // Keyboard navigation inside open modal
            if (isModalOpen) {
                // Escape key
                if (e.key === 'Escape') {
                    e.preventDefault();
                    window.closeFlashcardStudio();
                    return;
                }

                // If typing inside an input field, do not capture single keys
                if (['input', 'textarea', 'select'].includes(document.activeElement?.tagName?.toLowerCase())) {
                    return;
                }

                // Arrow keys for Next / Prev
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    nextBtn?.click();
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    prevBtn?.click();
                }
                // Number keys 1, 2, 3, 4 for Leitner grading
                else if (e.key === '1') {
                    e.preventDefault();
                    gradeCard('again');
                } else if (e.key === '2') {
                    e.preventDefault();
                    gradeCard('hard');
                } else if (e.key === '3') {
                    e.preventDefault();
                    gradeCard('good');
                } else if (e.key === '4') {
                    e.preventDefault();
                    gradeCard('easy');
                }
            }
        });

        // Hash-based deck direct launch check (e.g. #deck-biology or #deck=grade_4_math)
        function checkDeckHash() {
            if (!window.location.hash) return;
            const raw = window.location.hash.replace(/^#/, '').toLowerCase().trim();
            let targetDeck = null;
            if (raw.startsWith('deck-')) {
                targetDeck = raw.replace(/^deck-/, '');
            } else if (raw.startsWith('deck=')) {
                targetDeck = raw.replace(/^deck=/, '');
            } else if (raw.startsWith('flashcards-')) {
                targetDeck = raw.replace(/^flashcards-/, '');
            }
            if (targetDeck && userDecks && userDecks[targetDeck]) {
                window.openFlashcardStudio(targetDeck);
            }
        }
        setTimeout(checkDeckHash, 120);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFlashcardStudio);
    } else {
        initFlashcardStudio();
    }
})();
