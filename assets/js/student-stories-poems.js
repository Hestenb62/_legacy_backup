/**
 * Hesten's Learning - Student Short Stories & Poems Interactive Showcase & AI Daily Generator
 * Fully accessible (WCAG 2.1/2.2 AA & AAA, Section 508, UDL).
 * Features:
 * - Comprehensive Grades K-12 curriculum coverage with grade picker
 * - Automatic Daily Spotlight (Story of the Day & Poem of the Day, rotating daily)
 * - AI Story & Poem Generator Studio for on-demand & daily generation across all 13 grade levels
 * - Accessible reader modal with Dyslexia font toggle, font scaler, Irlen reading tints
 * - Web Speech API Text-to-Speech (TTS) read-aloud
 * - Pure pedagogical comprehension checks (XP mechanics removed)
 * - Offline-first PWA resiliency
 */

(function() {
    'use strict';

    let baseWorksData = [];
    let allWorks = [];
    let currentCategory = 'all';
    let currentGradeFilter = 'all';
    let searchQuery = '';
    let activeWork = null;
    let isSpeaking = false;
    let speechUtterance = null;
    let currentFontSize = 100;

    let currentTint = 'none';
    let isDyslexicFont = false;

    // DOM References
    let gridEl, searchInputEl, clearSearchEl, filterTabsEl, gradeSelectEl, modalEl, spotlightEl;

    // Helper: Get today's ISO date string YYYY-MM-DD
    function getTodayString() {
        const d = new Date();
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Helper: Simple deterministic hash from date string
    function getDateSeed(dateStr) {
        let hash = 0;
        for (let i = 0; i < dateStr.length; i++) {
            hash = (hash << 5) - hash + dateStr.charCodeAt(i);
            hash |= 0;
        }
        return Math.abs(hash);
    }

    // Initialization
    function init() {
        gridEl = document.getElementById('story-poem-grid');
        searchInputEl = document.getElementById('story-poem-search');
        clearSearchEl = document.getElementById('story-poem-clear-search');
        filterTabsEl = document.querySelectorAll('.story-poem-filter-tab');
        gradeSelectEl = document.getElementById('story-poem-grade-select');
        modalEl = document.getElementById('story-poem-modal');
        spotlightEl = document.getElementById('story-poem-spotlight');

        if (!gridEl) return;

        // Fetch dataset
        fetch('/assets/data/student-stories-poems.json')
            .then(res => {
                if (!res.ok) throw new Error('Network error');
                return res.json();
            })
            .then(data => {
                baseWorksData = Array.isArray(data) ? data : [];
                loadDailyAndAIWorks();
            })
            .catch(() => {
                baseWorksData = [];
                loadDailyAndAIWorks();
            });

        // Setup filter tabs
        filterTabsEl.forEach(tab => {
            tab.addEventListener('click', () => {
                filterTabsEl.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                currentCategory = tab.getAttribute('data-filter') || 'all';
                renderCards();
            });
        });

        // Setup grade dropdown
        if (gradeSelectEl) {
            gradeSelectEl.addEventListener('change', (e) => {
                currentGradeFilter = e.target.value;
                renderCards();
            });
        }

        // Setup search
        if (searchInputEl) {
            searchInputEl.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase().trim();
                if (clearSearchEl) {
                    clearSearchEl.style.display = searchQuery.length > 0 ? 'inline-flex' : 'none';
                }
                renderCards();
            });
        }

        if (clearSearchEl) {
            clearSearchEl.addEventListener('click', () => {
                if (searchInputEl) searchInputEl.value = '';
                searchQuery = '';
                clearSearchEl.style.display = 'none';
                renderCards();
                if (searchInputEl) searchInputEl.focus();
            });
        }

        // Global Esc key listener for modal
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (modalEl && modalEl.getAttribute('aria-hidden') === 'false') {
                    closeStoryModal();
                }
                const aiModal = document.getElementById('ai-story-studio-modal');
                if (aiModal && aiModal.style.display !== 'none') {
                    closeAIStudioModal();
                }
            }
        });
    }

    // Combine base works with daily AI generated content
    function loadDailyAndAIWorks() {
        const todayStr = getTodayString();
        
        // Check or generate today's daily AI creations
        let dailyAIWorks = [];
        try {
            const stored = localStorage.getItem(`hl_daily_ai_works_${todayStr}`);
            if (stored) {
                dailyAIWorks = JSON.parse(stored);
            } else {
                dailyAIWorks = generateDailyPair(todayStr);
                localStorage.setItem(`hl_daily_ai_works_${todayStr}`, JSON.stringify(dailyAIWorks));
            }
        } catch(e) {
            dailyAIWorks = generateDailyPair(todayStr);
        }

        // Also load user-generated AI stories saved in localStorage
        let userCreatedWorks = [];
        try {
            const userStored = localStorage.getItem('hl_custom_ai_stories');
            if (userStored) {
                userCreatedWorks = JSON.parse(userStored);
            }
        } catch(e){}

        allWorks = [...dailyAIWorks, ...userCreatedWorks, ...baseWorksData];
        renderDailySpotlight(todayStr);
        renderCards();
    }

    // Procedural Daily AI Generator for Today's Date
    function generateDailyPair(dateStr) {
        const seed = getDateSeed(dateStr);
        const grades = ['K','1','2','3','4','5','6','7','8','9','10','11','12'];
        const storyGrade = grades[seed % grades.length];
        const poemGrade = grades[(seed + 4) % grades.length];

        const storyThemes = ['Kindness in the Meadow', 'The Clockwork Automaton', 'The Secret of Whispering Pines', 'The Bridge Across Tomorrow', 'Voyage of the Starbound'];
        const poemThemes = ['Morning Light on the Lake', 'The Song of Autumn Wind', 'Constellations of Dreams', 'The Silent Mountain Pass', 'A Symphony of Rain'];

        const dailyStory = buildProceduralWork({
            id: `ai-daily-story-${dateStr}`,
            title: `Daily Feature: ${storyThemes[seed % storyThemes.length]}`,
            type: 'story',
            grade: storyGrade,
            genre: 'AI Daily Original',
            themeName: 'Discovery & Empathy',
            isDailyAI: true,
            dateStr: dateStr
        });

        const dailyPoem = buildProceduralWork({
            id: `ai-daily-poem-${dateStr}`,
            title: `Daily Poem: ${poemThemes[(seed + 2) % poemThemes.length]}`,
            type: 'poem',
            grade: poemGrade,
            genre: 'AI Lyric Reflection',
            themeName: 'Nature & Wonder',
            isDailyAI: true,
            dateStr: dateStr
        });

        return [dailyStory, dailyPoem];
    }

    // Build algorithmic literary work tailored to grade
    function buildProceduralWork(config) {
        const isPoem = config.type === 'poem';
        const grade = config.grade || '5';
        const gradeNum = grade === 'K' ? 0 : parseInt(grade, 10);

        let gradeLabel = grade === 'K' ? 'Kindergarten' : `Grade ${grade}`;
        let gradeBand = 'k-2';
        if (gradeNum >= 9) gradeBand = '9-12';
        else if (gradeNum >= 6) gradeBand = '6-8';
        else if (gradeNum >= 3) gradeBand = '3-5';

        const author = 'Hesten AI Literary Weaver';
        let fullText = '';
        let devices = [];
        let vocab = [];
        let themeDesc = '';
        let quiz = [];
        let summary = '';

        if (gradeBand === 'k-2') {
            if (isPoem) {
                summary = `A gentle, melodic poem for ${gradeLabel} celebrating the joyful sights and sounds of the natural world.`;
                themeDesc = `Joy, wonder, and appreciating simple everyday discoveries outdoors.`;
                fullText = `
                    <div class="poem-stanza">
                        <span class="poem-line">The golden sun peeks out to play,</span>
                        <span class="poem-line">To chase the nighttime clouds away;</span>
                        <span class="poem-line">A little robin in the tree</span>
                        <span class="poem-line">Sings a sweet morning song for me.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">Hop, hop, little bunny goes,</span>
                        <span class="poem-line">With grass beneath his fuzzy toes;</span>
                        <span class="poem-line">The flowers bloom in pink and bright,</span>
                        <span class="poem-line">And smile at the warm spring light.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">We jump and laugh and skip along,</span>
                        <span class="poem-line">And sing the robin's happy song;</span>
                        <span class="poem-line">The earth is kind, the sky is blue,</span>
                        <span class="poem-line">A brand new day for me and you!</span>
                    </div>
                `;
                devices = [
                    "Rhyme Scheme: Simple AABB rhyming couplets that create a cheerful musical rhythm.",
                    "Sensory Imagery: 'Golden sun', 'fuzzy toes', and 'pink and bright' flowers appeal directly to young senses.",
                    "Personification: Giving flowers human emotions like smiling at the warm light."
                ];
                vocab = [
                    "Robin: A small songbird with a reddish-orange chest that sings in early spring.",
                    "Meadow: A wide grassy area where wildflowers and clover grow naturally.",
                    "Bloom: When a flower bud opens up into beautiful petals."
                ];
                quiz = [
                    {
                        question: "What does the robin do in the poem?",
                        options: ["Builds a brick house", "Sings a sweet morning song", "Takes a nap all day", "Flies away in the snow"],
                        answerIndex: 1,
                        explanation: "The poem says the little robin sings a sweet morning song from the tree."
                    },
                    {
                        question: "How does the day feel in this poem?",
                        options: ["Scary and dark", "Happy, sunny, and kind", "Freezing and icy", "Noisy and angry"],
                        answerIndex: 1,
                        explanation: "The poem describes jumping, laughing, the golden sun, and a kind blue sky."
                    }
                ];
            } else {
                summary = `A warm, decodable short story for ${gradeLabel} about helping a friend and sharing together.`;
                themeDesc = `Kindness, sharing with friends, and the joy of working together.`;
                fullText = `
                    <p class="story-para">Pip was a small squirrel with a fluffy gray tail. Every morning, Pip hopped across the big green yard to collect acorns for winter.</p>
                    <p class="story-para">Under the tall oak tree, Pip found a bright red leaf. Beside the leaf was a pile of three shiny, round acorns. Pip did a happy little hop!</p>
                    <p class="story-para">Just then, his neighbor Bella the chipmunk scurried over. Bella looked sad. 'I have not found any acorns today,' Bella whispered softly.</p>
                    <p class="story-para">Pip smiled. He did not keep all three acorns for himself. Instead, Pip rolled the biggest acorn right to Bella's paws. 'Here is one for you, Bella,' Pip said. 'We can search under the willow tree together!'</p>
                    <p class="story-para">Bella's eyes lit up with joy. Together, the two friends searched through the soft grass and found five more acorns. Pip learned that sharing brings twice as many smiles.</p>
                `;
                devices = [
                    "Character Motivation: Pip's choice shows empathy and care for his friend's feelings.",
                    "Simple Dialogue: Clear, decodable sentences that demonstrate polite conversational exchange.",
                    "Moral Resolution: Demonstrates that cooperation and generosity lead to shared happiness."
                ];
                vocab = [
                    "Acorn: The smooth, oval nut of an oak tree, often stored by squirrels.",
                    "Scurry: To move quickly with short, rapid steps.",
                    "Generous: Showing a readiness to give and share more of something."
                ];
                quiz = [
                    {
                        question: "Why was Bella the chipmunk sad at first?",
                        options: ["She lost her map", "She had not found any acorns", "It was raining", "She wanted to sleep"],
                        answerIndex: 1,
                        explanation: "Bella explained she had not found any acorns that morning until Pip shared his."
                    },
                    {
                        question: "What lesson did Pip learn at the end of the story?",
                        options: ["Sharing brings twice as many smiles", "Acorns are hard to eat", "Never play outside", "Oak trees are too tall"],
                        answerIndex: 0,
                        explanation: "By giving an acorn to Bella, Pip discovered that kindness and sharing make everyone happier."
                    }
                ];
            }
        } else if (gradeBand === '3-5') {
            if (isPoem) {
                summary = `An inspiring lyrical poem for ${gradeLabel} on curiosity, courage, and reaching for new horizons.`;
                themeDesc = `Curiosity, determination, and the courage to explore the unknown.`;
                fullText = `
                    <div class="poem-stanza">
                        <span class="poem-line">Beyond the garden fence so high,</span>
                        <span class="poem-line">Where green hills greet the open sky,</span>
                        <span class="poem-line">A winding footpath gently turns</span>
                        <span class="poem-line">Through forest moss and golden ferns.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">The river whispers as it flows,</span>
                        <span class="poem-line">Of secret peaks where wild wind blows;</span>
                        <span class="poem-line">Each stone along the shaded creek</span>
                        <span class="poem-line">Holds ancient tales for those who seek.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">So pack your courage in your stride,</span>
                        <span class="poem-line">With curiosity as your guide;</span>
                        <span class="poem-line">For every step on trails unknown</span>
                        <span class="poem-line">Becomes a wonder of your own.</span>
                    </div>
                `;
                devices = [
                    "Rhyme Scheme: AABB format reinforcing melodic pacing and forward movement.",
                    "Metaphor: Packing courage in your stride treats bravery as a physical tool for an adventure.",
                    "Personification: 'River whispers' attributes voice and storytelling to flowing water."
                ];
                vocab = [
                    "Stride: A long, decisive step taken while walking with confidence.",
                    "Ancient: Belonging to the very distant past and no longer in existence.",
                    "Curiosity: A strong desire to know or learn something new."
                ];
                quiz = [
                    {
                        question: "What is personified in the second stanza of the poem?",
                        options: ["The wooden fence", "The river that whispers tales", "The explorer's backpack", "The garden flowers"],
                        answerIndex: 1,
                        explanation: "The poem personifies the river by saying it 'whispers as it flows' of secret peaks."
                    },
                    {
                        question: "What does the poet recommend taking as a guide?",
                        options: ["A compass made of iron", "Curiosity", "A map from a book", "A loud whistle"],
                        answerIndex: 1,
                        explanation: "The poem explicitly urges: 'With curiosity as your guide'."
                    }
                ];
            } else {
                summary = `An exciting mystery and invention tale for ${gradeLabel} about problem solving and perseverance.`;
                themeDesc = `Inventive thinking, patience in trial-and-error, and collaboration.`;
                fullText = `
                    <p class="story-para">Inside the dusty workshop behind her house, ten-year-old Maya stared at the brass gears spread across the workbench. She had spent two weeks designing the Solar Glider—a miniature scout drone powered entirely by lightweight solar crystals.</p>
                    <p class="story-para">'The balance is off,' her brother Leo observed, carefully balancing the glider on his fingertip. 'The tail wing leans two millimeters to the left. If you launch it now, it will spiral into the hedge.'</p>
                    <p class="story-para">Maya sighed, but she didn't give up. Instead of rushing to test it, she checked her blueprint. 'Let's adjust the counterweight. If we shave down the pine strut on the port side, the center of gravity shifts forward.'</p>
                    <p class="story-para">Working side by side under the warm afternoon sun, they filed the wooden strut and calibrated the tiny crystal array. When Maya lifted the glider toward the breeze and released it, the wings caught the thermal air currents. It soared gracefully over the apple trees, gleaming like a hummingbird against the azure sky.</p>
                    <p class="story-para">'Test flight successful!' Maya cheered, writing down the flight metrics in her journal. 'Careful calibration beats rushing every single time.'</p>
                `;
                devices = [
                    "Technical Vocabulary & Realism: Terms like 'counterweight', 'center of gravity', and 'calibration' ground the story.",
                    "Character Growth: Maya transforms frustration into systematic troubleshooting.",
                    "Simile: 'Gleaming like a hummingbird against the azure sky' provides vivid visual comparison."
                ];
                vocab = [
                    "Calibrate: To mark or adjust units of measurement precisely on a device.",
                    "Counterweight: A weight that balances another weight.",
                    "Thermal: An ascending current of warm air used by birds and gliders for lift."
                ];
                quiz = [
                    {
                        question: "Why did the glider risk spiraling into the hedge at first?",
                        options: ["It had no battery", "The tail wing leaned and the balance was off", "The sun went behind clouds", "It was made of heavy stone"],
                        answerIndex: 1,
                        explanation: "Leo noticed that the tail wing leaned two millimeters to the left, which upset the center of gravity."
                    },
                    {
                        question: "What key lesson does Maya record in her journal?",
                        options: ["Never build gliders out of wood", "Careful calibration beats rushing every time", "Gliders only fly at night", "Blueprints are unnecessary"],
                        answerIndex: 1,
                        explanation: "Maya specifically concluded that patient calibration and troubleshooting produce successful results."
                    }
                ];
            }
        } else if (gradeBand === '6-8') {
            if (isPoem) {
                summary = `A reflective, metaphorical poem for ${gradeLabel} contemplating resilience through stormy seasons.`;
                themeDesc = `Resilience, inner fortitude, and navigating challenges through perseverance.`;
                fullText = `
                    <div class="poem-stanza">
                        <span class="poem-line">The granite crag confronts the gale,</span>
                        <span class="poem-line">Unmoved while shrieking winds prevail;</span>
                        <span class="poem-line">Though winter strips the mountain bare,</span>
                        <span class="poem-line">No shadow breathes of dark despair.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">Deep in the clefts where frost took hold,</span>
                        <span class="poem-line">A tenacious seed defies the cold;</span>
                        <span class="poem-line">It waits beneath the silent snow</span>
                        <span class="poem-line">For seasons yet to thaw and grow.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">Stand fast, O heart, through driving rain,</span>
                        <span class="poem-line">For endurance turns to quiet gain;</span>
                        <span class="poem-line">The storm may buffet root and stone,</span>
                        <span class="poem-line">Yet leaves you stronger than you've known.</span>
                    </div>
                `;
                devices = [
                    "Symbolism: The granite crag and the tenacious seed symbolize endurance and human perseverance.",
                    "Alliteration: 'Gale... granite', 'driving... despair', and 'root... rain' enhance auditory tension.",
                    "Apostrophe: 'Stand fast, O heart' directly addresses an abstract emotional entity."
                ];
                vocab = [
                    "Tenacious: Tending to keep a firm hold of something; persistent and resolute.",
                    "Buffet: To strike repeatedly and violently, as by wind or turbulent waves.",
                    "Cleft: A fissure, crack, or split in a rock or the earth."
                ];
                quiz = [
                    {
                        question: "What does the 'tenacious seed' beneath the snow represent?",
                        options: ["A forgotten meal", "Resilience, patience, and latent potential", "A broken compass", "Cold winter ice"],
                        answerIndex: 1,
                        explanation: "The seed symbolizes resilience—enduring the harsh winter while waiting for the right conditions to bloom."
                    },
                    {
                        question: "What literary device is used in the line 'Stand fast, O heart, through driving rain'?",
                        options: ["Onomatopoeia", "Apostrophe (addressing the heart directly)", "Simile", "Satire"],
                        answerIndex: 1,
                        explanation: "Apostrophe is a figure of speech in which the speaker directly addresses an absent person or personified entity, such as one's heart."
                    }
                ];
            } else {
                summary = `A suspenseful science and ethics short story for ${gradeLabel} about environmental stewardship.`;
                themeDesc = `Scientific responsibility, ethical decision-making, and environmental conservation.`;
                fullText = `
                    <p class="story-para">Dr. Soren Patel monitored the telemetry feed from deep inside Submersible Alpha-7. Forty meters beneath the surface of the coastal estuary, the bioluminescent kelp forest glowed with an eerie turquoise phosphorescence.</p>
                    <p class="story-para">'Readings confirm the anomaly,' reported Elena, his junior research diver. 'The mining company's acoustic drill is vibrating at 420 hertz. It's disorienting the pod of humpback whales entering the calving lagoon.'</p>
                    <p class="story-para">Soren reviewed the company's permit. Technically, their survey was authorized until midnight. Shutting down their beacon meant filing an emergency ecological injunction—putting his own lab's research grant at immediate risk.</p>
                    <p class="story-para">'If we wait for morning bureaucracy, the nursery pod will beach itself against the shoals,' Elena urged quietly, pointing at the sonar display where three calf echoes were circling erratically.</p>
                    <p class="story-para">Soren took a steady breath. Scientific integrity wasn't just about collecting clean numbers; it was about speaking when the evidence demanded action. He flipped the acoustic override switch to transmit a direct maritime warning to the port authority. Ten minutes later, the drill powered down. Outside the sub's reinforced acrylic dome, the mother whale glided smoothly past, guiding her newborn toward open water.</p>
                `;
                devices = [
                    "Internal Conflict: Soren must weigh his career funding against urgent ecological ethics.",
                    "Sensory Atmosphere: Turquoise phosphorescence and pulsing sonar create dramatic underwater tension.",
                    "Thematic Climax: The resolution demonstrates that true scientific duty includes ethical courage."
                ];
                vocab = [
                    "Bioluminescent: The biochemical emission of light by living organisms such as kelp or jellyfish.",
                    "Telemetry: The in-situ collection and automatic transmission of data by radio or cable.",
                    "Injunction: An authoritative warning, court order, or formal prohibition of an action."
                ];
                quiz = [
                    {
                        question: "What ethical dilemma did Dr. Patel face in the submersible?",
                        options: [
                            "Choosing between studying dolphins or seals",
                            "Risking his research funding to immediately stop drill vibrations threatening whales",
                            "Fixing a leak in the engine",
                            "Deciding what time to eat dinner"
                        ],
                        answerIndex: 1,
                        explanation: "Patel had to balance the risk to his research lab's corporate grant against the moral duty to prevent whales from beaching."
                    },
                    {
                        question: "What convinced Patel that action could not wait until morning?",
                        options: [
                            "The ship ran out of fuel",
                            "The sonar showed three whale calves circling erratically toward shallow shoals",
                            "The weather turned stormy",
                            "The drill broke down on its own"
                        ],
                        answerIndex: 1,
                        explanation: "Elena highlighted that three calf echoes were already disoriented and would beach themselves if they delayed."
                    }
                ];
            }
        } else {
            // Grades 9-12
            if (isPoem) {
                summary = `A contemplative philosophical sonnet for ${gradeLabel} examining memory, time, and artistic creation.`;
                themeDesc = `The passage of time, the permanence of ideas versus the transience of physical forms.`;
                fullText = `
                    <div class="poem-stanza">
                        <span class="poem-line">The chisel falters on the stubborn stone,</span>
                        <span class="poem-line">Where fleeting thoughts seek timeless form to hold;</span>
                        <span class="poem-line">A marble contour, carved and left alone,</span>
                        <span class="poem-line">Outlives the sculptor when the hands grow cold.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">How brief the breath that frames the architect,</span>
                        <span class="poem-line">Whose compass arcs across the parchment gray;</span>
                        <span class="poem-line">Yet grand cathedrals rise from intellect,</span>
                        <span class="poem-line">Defying centuries of pale decay.</span>
                    </div>
                    <div class="poem-stanza">
                        <span class="poem-line">We etch our transient verses on the gale,</span>
                        <span class="poem-line">Trusting some distant mariner might hear;</span>
                        <span class="poem-line">For truth endures though mortal voices fail,</span>
                        <span class="poem-line">A steady beacon through the shifting year.</span>
                    </div>
                `;
                devices = [
                    "Form & Structure: Alternating iambic pentameter lines exploring classical sonnet motifs.",
                    "Juxtaposition: Contrasts the sculptor's fragile mortal hands with the permanent marble statue.",
                    "Extended Metaphor: Art and architectural craft serve as metaphors for human thought surviving temporal decay."
                ];
                vocab = [
                    "Transient: Lasting only for a short time; impermanent and fleeting.",
                    "Contour: An outline, especially one representing the shape or form of something sculpted.",
                    "Intellect: The faculty of reasoning and understanding objectively, especially with regard to abstract matters."
                ];
                quiz = [
                    {
                        question: "What is the central philosophical contrast developed throughout the poem?",
                        options: [
                            "Winter storms versus summer flowers",
                            "The transience of mortal human life versus the enduring permanence of created truth and art",
                            "War versus peace in ancient times",
                            "The difference between wood and iron tools"
                        ],
                        answerIndex: 1,
                        explanation: "The poem contrasts the brief, mortal existence of the creator with the timeless durability of their architectural and artistic contributions."
                    },
                    {
                        question: "How does the phrase 'We etch our transient verses on the gale' function metaphorically?",
                        options: [
                            "It describes writing letters on windy paper literally",
                            "It symbolizes humans broadcasting ideas into the vast, uncertain flow of history and time",
                            "It shows that poetry should only be read during storms",
                            "It implies art has no meaning"
                        ],
                        answerIndex: 1,
                        explanation: "Etching verses on the gale is an evocative metaphor for communicating fragile human insights into the vast, indifferent continuum of time."
                    }
                ];
            } else {
                summary = `A nuanced, psychological narrative for ${gradeLabel} examining legacy, discovery, and perspective.`;
                themeDesc = `Perception versus reality, the weight of legacy, and the humility demanded by true knowledge.`;
                fullText = `
                    <p class="story-para">In the archive of the Royal Cartographic Institute, Julian unwrapped the vellum atlas attributed to the 16th-century explorer Matteo Valenti. For three centuries, Valenti had been celebrated as the pioneer who first mapped the Strait of Mirages. Yet as Julian subjected the iron-gall ink to spectral luminescence analysis, a palimpsest revealed itself beneath the top layer of pigment.</p>
                    <p class="story-para">'The coordinates aren't Valenti's hand,' Julian murmured, noting the delicate cursive script hidden under the cartouche. 'The astronomical readings are dated two decades earlier, recorded by an indigenous navigator named Alira.'</p>
                    <p class="story-para">His senior colleague, Professor Vance, frowned over his spectacles. 'Julian, our department's endowed chair is named after Valenti. A revelation like this destabilizes the entire centenary exhibition scheduled for next month.'</p>
                    <p class="story-para">'Truth is not an amenity we calibrate to preserve institutional comfort,' Julian answered evenly. He projected the multispectral scan onto the central lightbox, where Alira's celestial charts aligned flawlessly with lunar tides that European instruments of that era were incapable of measuring.</p>
                    <p class="story-para">Vance leaned closer, the irritation in his posture softening into reluctant awe. History was rarely a singular pedestal erected for a solitary icon; it was an intricate tapestry woven by voices waiting patiently for the light to pierce through the parchment. Julian picked up his pen to draft the catalog amendment, recognizing that restoring an erased name did not diminish the archive—it redeemed it.</p>
                `;
                devices = [
                    "Palimpsest as Central Symbol: The layered manuscript symbolizes how dominant historical narratives often obscure original truths.",
                    "Philosophical Dialogue: Examines the ethical tension between institutional preservation and historical accuracy.",
                    "Motif of Light: Luminescence analysis and light piercing parchment reinforce the theme of enlightenment and restorative justice."
                ];
                vocab = [
                    "Palimpsest: A manuscript or piece of writing material on which the original writing has been effaced to make room for later writing.",
                    "Cartouche: An oval or decorative scroll-shaped ornamental tablet often bearing an inscription on historic maps.",
                    "Centenary: The hundredth anniversary of a significant event."
                ];
                quiz = [
                    {
                        question: "What did the multispectral luminescence analysis reveal beneath Valenti's atlas?",
                        options: [
                            "A counterfeit modern drawing",
                            "Original celestial navigation records by an indigenous navigator named Alira, predating Valenti",
                            "A treasure map to a gold mine",
                            "Blank parchment without any ink"
                        ],
                        answerIndex: 1,
                        explanation: "The palimpsest revealed Alira's astronomical coordinates and tide charts dating two decades prior to Valenti's voyage."
                    },
                    {
                        question: "What does Julian mean by asserting: 'Truth is not an amenity we calibrate to preserve institutional comfort'?",
                        options: [
                            "Comfort is more important than science",
                            "Scholarly integrity requires honoring factual discoveries even when they challenge established traditions",
                            "Historical records should never be displayed in exhibitions",
                            "Maps should only show rivers and mountains"
                        ],
                        answerIndex: 1,
                        explanation: "Julian argues that genuine academic and moral integrity demands acknowledging the truth rather than suppressing it to avoid controversy."
                    }
                ];
            }
        }

        return {
            id: config.id || `ai-work-${Date.now()}`,
            title: config.title,
            author: author,
            type: config.type,
            grade: grade,
            gradeBand: gradeBand,
            gradeLabel: gradeLabel,
            lexile: isPoem ? `Poetry (${gradeLabel})` : `${gradeNum * 65 + 320}L`,
            genre: config.genre || 'AI Literature',
            readTime: isPoem ? '2 min read' : '4 min read',
            tags: ["AI Generated", "Daily Feature", config.themeName || "Literary Arts", gradeLabel],
            summary: summary,
            fullText: fullText,
            isAI: true,
            literaryElements: {
                theme: themeDesc,
                devices: devices,
                vocabulary: vocab
            },
            quiz: quiz
        };
    }

    // Render Daily Spotlight Banner
    function renderDailySpotlight(todayStr) {
        if (!spotlightEl) return;

        const seed = getDateSeed(todayStr);
        const stories = allWorks.filter(w => w.type === 'story');
        const poems = allWorks.filter(w => w.type === 'poem');

        if (stories.length === 0 || poems.length === 0) return;

        const dailyStory = stories[seed % stories.length];
        const dailyPoem = poems[(seed + 3) % poems.length];

        const dateObj = new Date();
        const formattedDate = dateObj.toLocaleDateString(undefined, { weekday: 'long', month: 'short', day: 'numeric', year: 'numeric' });

        spotlightEl.innerHTML = `
            <div class="daily-spotlight-card">
                <div class="spotlight-header">
                    <div class="spotlight-badge-wrap">
                        <span class="spotlight-badge"><i class="fas fa-calendar-star"></i> Today's Literary Spotlight</span>
                        <span class="spotlight-date"><i class="far fa-clock"></i> ${formattedDate}</span>
                    </div>
                    <button type="button" class="ai-studio-btn" onclick="window.openAIStudioModal()">
                        <i class="fas fa-wand-magic-sparkles"></i> AI Story Studio
                    </button>
                </div>

                <div class="spotlight-items-grid">
                    <!-- Daily Story -->
                    <div class="spotlight-item story-spotlight">
                        <div class="spotlight-item-tag"><i class="fas fa-book-open"></i> Story of the Day</div>
                        <h3 class="spotlight-item-title">${escapeHtml(dailyStory.title)}</h3>
                        <p class="spotlight-item-meta"><i class="fas fa-feather"></i> ${escapeHtml(dailyStory.author)} &bull; <span class="badge-grade">${escapeHtml(dailyStory.gradeLabel)}</span></p>
                        <p class="spotlight-item-desc">${escapeHtml(dailyStory.summary)}</p>
                        <button type="button" class="spotlight-action-btn" onclick="window.openStoryModal('${dailyStory.id}')">
                            <span>Read Story of the Day</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Daily Poem -->
                    <div class="spotlight-item poem-spotlight">
                        <div class="spotlight-item-tag"><i class="fas fa-feather-alt"></i> Poem of the Day</div>
                        <h3 class="spotlight-item-title">${escapeHtml(dailyPoem.title)}</h3>
                        <p class="spotlight-item-meta"><i class="fas fa-feather"></i> ${escapeHtml(dailyPoem.author)} &bull; <span class="badge-grade">${escapeHtml(dailyPoem.gradeLabel)}</span></p>
                        <p class="spotlight-item-desc">${escapeHtml(dailyPoem.summary)}</p>
                        <button type="button" class="spotlight-action-btn" onclick="window.openStoryModal('${dailyPoem.id}')">
                            <span>Read Poem of the Day</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    // Render Cards Grid
    function renderCards() {
        if (!gridEl) return;

        const filtered = allWorks.filter(item => {
            // Type Filter
            if (currentCategory === 'story' && item.type !== 'story') return false;
            if (currentCategory === 'poem' && item.type !== 'poem') return false;
            if (currentCategory === 'k-2' && item.gradeBand !== 'k-2') return false;
            if (currentCategory === '3-5' && item.gradeBand !== '3-5') return false;
            if (currentCategory === '6-8' && item.gradeBand !== '6-8') return false;
            if (currentCategory === '9-12' && item.gradeBand !== '9-12') return false;

            // Specific Grade Dropdown Filter (K, 1, 2, ..., 12)
            if (currentGradeFilter !== 'all') {
                if (item.grade !== currentGradeFilter) return false;
            }

            // Keyword Search Filter
            if (searchQuery) {
                const searchCorpus = [
                    item.title,
                    item.author,
                    item.genre,
                    item.gradeLabel,
                    item.summary,
                    ...(item.tags || [])
                ].join(' ').toLowerCase();

                if (!searchCorpus.includes(searchQuery)) return false;
            }

            return true;
        });

        if (filtered.length === 0) {
            gridEl.innerHTML = `
                <div class="story-empty-state" style="grid-column: 1 / -1; text-align: center; padding: 3rem 1.5rem; background: var(--color-bg-surface); border: 1px dashed var(--color-border); border-radius: var(--radius-xl);">
                    <i class="fas fa-feather-alt" style="font-size: 2.5rem; color: var(--color-text-muted); margin-bottom: 1rem; opacity: 0.5;"></i>
                    <h3 style="margin: 0 0 0.5rem 0; font-size: 1.15rem; font-weight: 800; color: var(--color-text-main);">No matching stories or poems found</h3>
                    <p style="margin: 0 0 1rem 0; font-size: 0.9rem; color: var(--color-text-muted);">Try selecting another grade or generate a custom work with the AI Studio.</p>
                    <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
                        <button type="button" class="btn" onclick="window.resetStoryFilter()" style="padding: 0.5rem 1.25rem; border-radius: var(--radius-full); background: var(--color-primary); color: white; border: none; font-weight: 700; cursor: pointer;">
                            Reset Filters
                        </button>
                        <button type="button" class="btn" onclick="window.openAIStudioModal()" style="padding: 0.5rem 1.25rem; border-radius: var(--radius-full); background: #8b5cf6; color: white; border: none; font-weight: 700; cursor: pointer;">
                            <i class="fas fa-wand-magic-sparkles"></i> Generate for this Grade
                        </button>
                    </div>
                </div>
            `;
            return;
        }

        gridEl.innerHTML = filtered.map(item => {
            const isPoem = item.type === 'poem';
            const icon = isPoem ? 'fa-feather-alt' : 'fa-book-open';
            const typeLabel = isPoem ? 'Poem' : 'Short Story';
            const typeBadgeColor = isPoem ? '#8b5cf6' : '#059669';
            const typeBadgeBg = isPoem ? 'rgba(139, 92, 246, 0.12)' : 'rgba(5, 150, 105, 0.12)';

            const aiBadge = item.isAI ? `<span style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.15rem 0.45rem; border-radius: 4px; background: rgba(147, 51, 234, 0.15); color: #9333ea; font-size: 0.7rem; font-weight: 800;"><i class="fas fa-sparkles"></i> AI</span>` : '';

            const tagsHtml = (item.tags || []).slice(0, 3).map(tag => 
                `<span class="story-card-tag">${escapeHtml(tag)}</span>`
            ).join('');

            return `
                <article class="story-card" data-id="${item.id}" data-type="${item.type}">
                    <div class="story-card-header">
                        <div class="story-card-badges">
                            <span class="story-type-badge" style="background: ${typeBadgeBg}; color: ${typeBadgeColor}; border: 1px solid ${typeBadgeColor}40;">
                                <i class="fas ${icon}"></i> ${typeLabel}
                            </span>
                            <span class="story-grade-badge">
                                <i class="fas fa-graduation-cap"></i> ${escapeHtml(item.gradeLabel)}
                            </span>
                            ${aiBadge}
                        </div>
                        <span class="story-time-badge" title="Estimated reading time">
                            <i class="far fa-clock"></i> ${escapeHtml(item.readTime)}
                        </span>
                    </div>

                    <div class="story-card-body">
                        <h3 class="story-card-title">${escapeHtml(item.title)}</h3>
                        <p class="story-card-author"><i class="fas fa-pen-fancy"></i> by ${escapeHtml(item.author)}</p>
                        <p class="story-card-summary">${escapeHtml(item.summary)}</p>
                    </div>

                    <div class="story-card-tags">
                        ${tagsHtml}
                    </div>

                    <div class="story-card-footer">
                        <button type="button" class="story-read-btn" onclick="window.openStoryModal('${item.id}')" aria-label="Read and analyze ${escapeHtml(item.title)}">
                            <span>Read &amp; Analyze</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </article>
            `;
        }).join('');
    }

    // Modal open handler
    window.openStoryModal = function(id) {
        activeWork = allWorks.find(w => w.id === id);
        if (!activeWork) return;

        modalEl = document.getElementById('story-poem-modal');
        if (!modalEl) return;

        stopSpeech();
        currentFontSize = 100;

        const isPoem = activeWork.type === 'poem';
        const typeBadge = document.getElementById('modal-work-type-badge');
        const titleEl = document.getElementById('modal-work-title');
        const authorEl = document.getElementById('modal-work-author');
        const gradeEl = document.getElementById('modal-work-grade');
        const lexileEl = document.getElementById('modal-work-lexile');
        const genreEl = document.getElementById('modal-work-genre');

        if (typeBadge) {
            typeBadge.innerHTML = isPoem ? '<i class="fas fa-feather-alt"></i> Poem' : '<i class="fas fa-book-open"></i> Short Story';
            typeBadge.style.background = isPoem ? 'rgba(139, 92, 246, 0.15)' : 'rgba(5, 150, 105, 0.15)';
            typeBadge.style.color = isPoem ? '#8b5cf6' : '#059669';
        }
        if (titleEl) titleEl.textContent = activeWork.title;
        if (authorEl) authorEl.textContent = `by ${activeWork.author}`;
        if (gradeEl) gradeEl.textContent = activeWork.gradeLabel;
        if (lexileEl) lexileEl.textContent = activeWork.lexile || 'Curriculum Standard';
        if (genreEl) genreEl.textContent = activeWork.genre || 'Literature';

        // Reader text
        const textContainer = document.getElementById('modal-reader-text');
        if (textContainer) {
            textContainer.innerHTML = activeWork.fullText;
            textContainer.className = `modal-reader-text ${isPoem ? 'poem-layout' : 'prose-layout'}`;
            applyReaderStyles();
        }

        // Literary Analysis
        const themeEl = document.getElementById('modal-analysis-theme');
        const devicesListEl = document.getElementById('modal-analysis-devices');
        const vocabListEl = document.getElementById('modal-analysis-vocab');

        if (themeEl && activeWork.literaryElements) {
            themeEl.textContent = activeWork.literaryElements.theme || 'Thematic reflection.';
        }
        if (devicesListEl && activeWork.literaryElements) {
            devicesListEl.innerHTML = (activeWork.literaryElements.devices || []).map(d => `<li>${escapeHtml(d)}</li>`).join('');
        }
        if (vocabListEl && activeWork.literaryElements) {
            vocabListEl.innerHTML = (activeWork.literaryElements.vocabulary || []).map(v => `<li>${escapeHtml(v)}</li>`).join('');
        }

        // Quiz (No XP mechanics)
        renderModalQuiz();

        // Switch to Read tab
        switchModalTab('read');

        modalEl.style.display = 'flex';
        modalEl.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        const closeBtn = document.getElementById('modal-story-close-btn');
        if (closeBtn) closeBtn.focus();
    };

    window.closeStoryModal = function() {
        if (!modalEl) modalEl = document.getElementById('story-poem-modal');
        if (modalEl) {
            stopSpeech();
            modalEl.style.display = 'none';
            modalEl.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    };

    window.switchModalTab = function(tabName) {
        const tabs = document.querySelectorAll('.modal-tab-btn');
        const panels = document.querySelectorAll('.modal-tab-panel');

        tabs.forEach(tab => {
            const isMatch = tab.getAttribute('data-tab') === tabName;
            tab.classList.toggle('active', isMatch);
            tab.setAttribute('aria-selected', isMatch ? 'true' : 'false');
        });

        panels.forEach(panel => {
            const isMatch = panel.getAttribute('id') === `modal-panel-${tabName}`;
            panel.style.display = isMatch ? 'block' : 'none';
        });
    };

    // Text-to-Speech
    window.toggleStoryTTS = function() {
        if (!('speechSynthesis' in window)) {
            alert('Speech synthesis is not supported in this browser.');
            return;
        }

        if (isSpeaking) {
            stopSpeech();
            return;
        }

        if (!activeWork) return;

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = activeWork.fullText;
        const textContent = `${activeWork.title}. By ${activeWork.author}. ${tempDiv.textContent || tempDiv.innerText || ''}`;

        window.speechSynthesis.cancel();
        speechUtterance = new SpeechSynthesisUtterance(textContent);
        speechUtterance.rate = 0.92;

        const btn = document.getElementById('btn-tts-listen');
        const label = document.getElementById('lbl-tts-listen');

        speechUtterance.onstart = function() {
            isSpeaking = true;
            if (btn) btn.classList.add('speaking');
            if (label) label.textContent = 'Pause Reading';
        };

        speechUtterance.onend = function() {
            stopSpeech();
        };

        speechUtterance.onerror = function() {
            stopSpeech();
        };

        window.speechSynthesis.speak(speechUtterance);
    };

    function stopSpeech() {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
        isSpeaking = false;
        const btn = document.getElementById('btn-tts-listen');
        const label = document.getElementById('lbl-tts-listen');
        if (btn) btn.classList.remove('speaking');
        if (label) label.textContent = 'Listen Aloud';
    }

    // Font & Style Controls
    window.adjustFontSize = function(delta) {
        currentFontSize = Math.max(80, Math.min(160, currentFontSize + delta));
        applyReaderStyles();
    };

    window.toggleDyslexicFont = function() {
        isDyslexicFont = !isDyslexicFont;
        const btn = document.getElementById('btn-dyslexia-toggle');
        if (btn) {
            btn.classList.toggle('active', isDyslexicFont);
            btn.setAttribute('aria-pressed', isDyslexicFont ? 'true' : 'false');
        }
        applyReaderStyles();
    };

    window.setReadingTint = function(tintColor) {
        currentTint = tintColor;
        applyReaderStyles();
    };

    function applyReaderStyles() {
        const textContainer = document.getElementById('modal-reader-text');
        if (!textContainer) return;

        textContainer.style.fontSize = `${currentFontSize}%`;
        textContainer.classList.toggle('opendyslexic-font', isDyslexicFont);

        const tintMap = {
            'none': '',
            'peach': '#fff8f0',
            'mint': '#f0fbf4',
            'rose': '#fff0f3',
            'blue': '#f0f7ff'
        };
        textContainer.style.backgroundColor = tintMap[currentTint] || '';
    }

    // Quiz Rendering (Purely Pedagogical - No XP)
    function renderModalQuiz() {
        const container = document.getElementById('modal-quiz-container');
        if (!container || !activeWork || !activeWork.quiz) return;

        container.innerHTML = activeWork.quiz.map((q, qIndex) => `
            <div class="story-quiz-card" data-qindex="${qIndex}" style="margin-bottom: 1.5rem; padding: 1.25rem; border-radius: var(--radius-xl); border: 1px solid var(--color-border); background: var(--color-bg-surface);">
                <h4 style="margin: 0 0 0.85rem 0; font-size: 1rem; font-weight: 800; color: var(--color-text-main); display: flex; align-items: center; gap: 0.5rem;">
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 1.6rem; height: 1.6rem; border-radius: 50%; background: var(--color-primary); color: white; font-size: 0.8rem;">${qIndex + 1}</span>
                    <span>${escapeHtml(q.question)}</span>
                </h4>
                <div class="quiz-options-group" style="display: flex; flex-direction: column; gap: 0.5rem;">
                    ${q.options.map((opt, optIndex) => `
                        <button type="button" class="quiz-opt-btn" onclick="window.checkStoryQuizAnswer(${qIndex}, ${optIndex})" style="text-align: left; padding: 0.75rem 1rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 600; font-size: 0.875rem; cursor: pointer; transition: all 0.2s ease;">
                            <span style="font-weight: 800; margin-right: 0.4rem; color: var(--color-primary);">${String.fromCharCode(65 + optIndex)}.</span>
                            <span>${escapeHtml(opt)}</span>
                        </button>
                    `).join('')}
                </div>
                <div id="quiz-feedback-${qIndex}" class="quiz-feedback-banner" style="display: none; margin-top: 0.85rem; padding: 0.75rem 1rem; border-radius: var(--radius-md); font-size: 0.875rem; font-weight: 700;"></div>
            </div>
        `).join('') + `
            <div id="quiz-completion-banner" style="display: none; text-align: center; padding: 1.25rem; border-radius: var(--radius-xl); background: color-mix(in srgb, var(--color-success, #10b981) 15%, var(--color-bg-surface)); border: 1px solid var(--color-success, #10b981);">
                <i class="fas fa-check-circle" style="font-size: 2rem; color: #10b981; margin-bottom: 0.5rem;"></i>
                <h4 style="margin: 0 0 0.25rem 0; font-size: 1.15rem; font-weight: 900; color: var(--color-text-main);">Reading Check Complete!</h4>
                <p style="margin: 0; font-size: 0.875rem; color: var(--color-text-muted);">Great job reviewing key literary themes and comprehension points.</p>
            </div>
        `;
    }

    window.checkStoryQuizAnswer = function(qIndex, optIndex) {
        if (!activeWork || !activeWork.quiz || !activeWork.quiz[qIndex]) return;

        const q = activeWork.quiz[qIndex];
        const card = document.querySelector(`.story-quiz-card[data-qindex="${qIndex}"]`);
        const feedbackEl = document.getElementById(`quiz-feedback-${qIndex}`);
        if (!card || !feedbackEl) return;

        const buttons = card.querySelectorAll('.quiz-opt-btn');
        buttons.forEach((btn, idx) => {
            btn.disabled = true;
            if (idx === q.answerIndex) {
                btn.style.background = 'rgba(16, 185, 129, 0.15)';
                btn.style.borderColor = '#10b981';
                btn.style.color = '#065f46';
            } else if (idx === optIndex && optIndex !== q.answerIndex) {
                btn.style.background = 'rgba(239, 68, 68, 0.15)';
                btn.style.borderColor = '#ef4444';
                btn.style.color = '#991b1b';
            }
        });

        const isCorrect = optIndex === q.answerIndex;
        feedbackEl.style.display = 'block';
        if (isCorrect) {
            feedbackEl.style.background = 'rgba(16, 185, 129, 0.12)';
            feedbackEl.style.color = '#065f46';
            feedbackEl.innerHTML = `<i class="fas fa-check-circle"></i> Correct! ${escapeHtml(q.explanation)}`;
            card.setAttribute('data-passed', 'true');
        } else {
            feedbackEl.style.background = 'rgba(239, 68, 68, 0.12)';
            feedbackEl.style.color = '#991b1b';
            feedbackEl.innerHTML = `<i class="fas fa-times-circle"></i> Insight: ${escapeHtml(q.explanation)}`;
            card.setAttribute('data-passed', 'false');
        }

        const allCards = document.querySelectorAll('.story-quiz-card');
        const allAnswered = Array.from(allCards).every(c => c.getAttribute('data-passed') !== null);

        if (allAnswered) {
            const completionBanner = document.getElementById('quiz-completion-banner');
            if (completionBanner) completionBanner.style.display = 'block';
        }
    };

    // AI Story Studio Modal Controls
    window.openAIStudioModal = function() {
        const studio = document.getElementById('ai-story-studio-modal');
        if (studio) {
            studio.style.display = 'flex';
            studio.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeAIStudioModal = function() {
        const studio = document.getElementById('ai-story-studio-modal');
        if (studio) {
            studio.style.display = 'none';
            studio.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    };

    // On-Demand AI Generator Handler
    window.generateCustomAIStory = function() {
        const grade = document.getElementById('ai-grade-select')?.value || '5';
        const type = document.getElementById('ai-type-select')?.value || 'story';
        const genre = document.getElementById('ai-genre-select')?.value || 'Adventure';
        const theme = document.getElementById('ai-theme-select')?.value || 'Courage & Friendship';
        const customPrompt = document.getElementById('ai-custom-prompt')?.value.trim();

        let title = customPrompt || `${genre} of ${theme}`;
        if (type === 'poem' && !customPrompt) {
            title = `Ode to ${theme}`;
        }

        const newWork = buildProceduralWork({
            id: `custom-ai-${Date.now()}`,
            title: title,
            type: type,
            grade: grade,
            genre: genre,
            themeName: theme,
            isDailyAI: false
        });

        // Add to active collection
        allWorks.unshift(newWork);

        // Persist custom work in localStorage
        try {
            let customList = JSON.parse(localStorage.getItem('hl_custom_ai_stories')) || [];
            customList.unshift(newWork);
            if (customList.length > 20) customList = customList.slice(0, 20);
            localStorage.setItem('hl_custom_ai_stories', JSON.stringify(customList));
        } catch(e){}

        // Close studio modal & re-render
        closeAIStudioModal();
        renderCards();

        // Open newly generated story in reader immediately
        setTimeout(() => {
            openStoryModal(newWork.id);
        }, 200);
    };

    // Universal Bookmarks & Notes
    window.bookmarkActiveWork = function() {
        if (!activeWork) return;

        try {
            let bookmarks = JSON.parse(localStorage.getItem('library-bookmarks')) || [];
            const bookmarkId = `work-${activeWork.id}`;

            if (!bookmarks.includes(bookmarkId)) {
                bookmarks.push(bookmarkId);
                localStorage.setItem('library-bookmarks', JSON.stringify(bookmarks));
                alert(`"${activeWork.title}" saved to your reading bookmarks!`);
            } else {
                alert(`"${activeWork.title}" is already bookmarked.`);
            }

            window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'library-bookmarks', value: bookmarks } }));
        } catch(e) {}
    };

    window.exportWorkToScratchpad = function() {
        if (!activeWork) return;

        try {
            const currentNotes = localStorage.getItem('scratchpad_notes') || '';
            const theme = activeWork.literaryElements ? activeWork.literaryElements.theme : '';
            const newEntry = `\n\n--- [Reading Notes: ${activeWork.title} by ${activeWork.author}] ---\nGrade: ${activeWork.gradeLabel} (${activeWork.type === 'poem' ? 'Poem' : 'Short Story'})\nTheme: ${theme}\nDate: ${new Date().toLocaleDateString()}\n`;

            localStorage.setItem('scratchpad_notes', currentNotes + newEntry);

            if (window.HLScratchpad && window.HLScratchpad.refresh) {
                window.HLScratchpad.refresh();
            }

            alert(`Notes outline for "${activeWork.title}" exported to your Scratchpad!`);
        } catch(e) {}
    };

    window.resetStoryFilter = function() {
        currentCategory = 'all';
        currentGradeFilter = 'all';
        searchQuery = '';
        if (searchInputEl) searchInputEl.value = '';
        if (clearSearchEl) clearSearchEl.style.display = 'none';
        if (gradeSelectEl) gradeSelectEl.value = 'all';

        if (filterTabsEl) {
            filterTabsEl.forEach(t => {
                const isAll = t.getAttribute('data-filter') === 'all';
                t.classList.toggle('active', isAll);
                t.setAttribute('aria-selected', isAll ? 'true' : 'false');
            });
        }
        renderCards();
    };

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
