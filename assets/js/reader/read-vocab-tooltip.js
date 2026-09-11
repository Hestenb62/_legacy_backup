/* ==========================================================================
   Interactive In-Text Vocabulary Tooltip & Phonetic/Morpheme Anatomy Engine
   Unified Inspection Card with Integrated Highlight Swatches, Marginalia Note,
   Leitner Flashcard Studio Sync, Online API Multi-Tier Dictionary Lookup,
   Real Human Phonetic Audio / Web Speech Phonics, and Offline Course Lexicon.
   ========================================================================== */
(function () {
    // Curated Academic & Subject Lexicon for Instant Zero-Latency Response
    const BUILTIN_LEXICON = {
        'is': {
            phonetic: '/ɪz/',
            syllables: 'is',
            pos: 'verb (present singular)',
            tier: 'Core Grammatical',
            source: 'Core Lexicon',
            definition: 'Third-person singular present tense of "be": exists, denotes equality or identity, or possesses specified properties.',
            example: 'A prime number is an integer greater than 1 with exactly two positive divisors.',
            morphemes: [
                { part: 'is', type: 'Root (Old English / Proto-Germanic)', meaning: 'To exist / be' }
            ]
        },
        'are': {
            phonetic: '/ɑːr/',
            syllables: 'are',
            pos: 'verb (present plural)',
            tier: 'Core Grammatical',
            source: 'Core Lexicon',
            definition: 'Present tense plural and second-person form of "be": exist or belong to a specified classification.',
            example: 'Natural numbers are positive counting integers.',
            morphemes: [
                { part: 'are', type: 'Root (Old English)', meaning: 'To be / exist' }
            ]
        },
        'be': {
            phonetic: '/biː/',
            syllables: 'be',
            pos: 'verb',
            tier: 'Core Grammatical',
            source: 'Core Lexicon',
            definition: 'To exist, occur, or hold a specified mathematical or physical state.',
            example: 'Let x be a real number.',
            morphemes: [{ part: 'be', type: 'Root', meaning: 'Exist / live' }]
        },
        'set': {
            phonetic: '/sɛt/',
            syllables: 'set',
            pos: 'noun (mathematics)',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'A well-defined collection of distinct mathematical objects or numbers regarded as an entity.',
            example: 'The set of natural numbers is denoted by the symbol N.',
            morphemes: [{ part: 'set', type: 'Root (Old English settan)', meaning: 'To place or group together' }]
        },
        'hierarchy': {
            phonetic: '/ˈhaɪərɑːrki/',
            syllables: 'hi • er • ar • chy',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            source: 'Academic Lexicon',
            definition: 'A system in which items or subsets are ranked in graded order of inclusion or containment.',
            example: 'The number system hierarchy strictly nests natural numbers inside integers and reals.',
            morphemes: [
                { part: 'hieros', type: 'Root (Greek)', meaning: 'Sacred / formal' },
                { part: '-archy', type: 'Suffix (Greek)', meaning: 'Rule / ranking order' }
            ]
        },
        'prime': {
            phonetic: '/praɪm/',
            syllables: 'prime',
            pos: 'adjective / noun',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'An integer greater than 1 having no positive divisors other than 1 and itself.',
            example: 'The number 17 is a prime number because its only factors are 1 and 17.',
            morphemes: [{ part: 'primus', type: 'Root (Latin)', meaning: 'First / fundamental' }]
        },
        'rational': {
            phonetic: '/ˈræʃənəl/',
            syllables: 'ra • tion • al',
            pos: 'adjective (mathematics)',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'Expressible as the exact ratio or quotient p/q of two integers, where the denominator q is non-zero.',
            example: 'The fraction 3/4 is a rational number.',
            morphemes: [
                { part: 'ratio', type: 'Root (Latin)', meaning: 'Computation / proportion' },
                { part: '-al', type: 'Suffix', meaning: 'Relating to' }
            ]
        },
        'irrational': {
            phonetic: '/ɪˈræʃənəl/',
            syllables: 'ir • ra • tion • al',
            pos: 'adjective (mathematics)',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'A real number that cannot be written as a simple fraction; possessing a non-terminating, non-repeating decimal expansion.',
            example: 'Pi and the square root of 2 are fundamental irrational numbers.',
            morphemes: [
                { part: 'ir-', type: 'Prefix (Latin)', meaning: 'Not / opposite' },
                { part: 'ratio', type: 'Root (Latin)', meaning: 'Proportion' }
            ]
        },
        'integer': {
            phonetic: '/ˈɪntɪdʒər/',
            syllables: 'in • te • ger',
            pos: 'noun (mathematics)',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'A whole number from the set of positive integers, negative integers, and zero (Z).',
            example: 'Negative five, zero, and forty-two are all integers.',
            morphemes: [{ part: 'integer', type: 'Root (Latin)', meaning: 'Untouched / whole' }]
        },
        'composite': {
            phonetic: '/ˈkɒmpəzɪt/',
            syllables: 'com • pos • ite',
            pos: 'adjective / noun',
            tier: 'Tier 3 Domain Specific',
            source: 'Mathematics Compendium',
            definition: 'A positive integer greater than 1 that possesses at least one positive divisor other than 1 and itself.',
            example: 'Twelve is a composite number because it factors into 2 x 2 x 3.',
            morphemes: [
                { part: 'com-', type: 'Prefix (Latin)', meaning: 'Together' },
                { part: 'ponere', type: 'Root (Latin)', meaning: 'To put or place' }
            ]
        },
        'axiom': {
            phonetic: '/ˈæksiəm/',
            syllables: 'ax • i • om',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            source: 'Academic Lexicon',
            definition: 'A fundamental statement or proposition that is regarded as self-evidently true and serves as a premise for deductive logic.',
            example: 'The commutative law is an algebraic field axiom for real numbers.',
            morphemes: [{ part: 'axios', type: 'Root (Greek)', meaning: 'Worthy / fitting' }]
        },
        'theorem': {
            phonetic: '/ˈθɪərəm/',
            syllables: 'the • o • rem',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            source: 'Academic Lexicon',
            definition: 'A mathematical proposition or statement proved true using a rigorous chain of logical deduction from established axioms.',
            example: 'The Pythagorean Theorem relates the side lengths of right triangles.',
            morphemes: [{ part: 'theorema', type: 'Root (Greek)', meaning: 'Spectacle / proposition to be proved' }]
        },
        'derivative': {
            phonetic: '/dɪˈrɪvətɪv/',
            syllables: 'de • riv • a • tive',
            pos: 'noun (calculus)',
            tier: 'Tier 3 Domain Specific',
            source: 'Calculus Compendium',
            definition: 'The limit of difference quotients representing the instantaneous rate of change of a function with respect to an independent variable.',
            example: 'The derivative of position with respect to time represents instantaneous velocity.',
            morphemes: [
                { part: 'de-', type: 'Prefix (Latin)', meaning: 'Down from / away' },
                { part: 'rivus', type: 'Root (Latin)', meaning: 'Stream / flow' }
            ]
        },
        'integral': {
            phonetic: '/ˈɪntɪɡrəl/',
            syllables: 'in • te • gral',
            pos: 'noun (calculus)',
            tier: 'Tier 3 Domain Specific',
            source: 'Calculus Compendium',
            definition: 'The mathematical accumulation of infinitesimal quantities, representing the net area bounded beneath a continuous curve.',
            example: 'Evaluating the definite integral calculates exact accumulated area.',
            morphemes: [{ part: 'integer', type: 'Root (Latin)', meaning: 'Whole / entire' }]
        },
        'discriminant': {
            phonetic: '/dɪˈskrɪmɪnənt/',
            syllables: 'dis • crim • i • nant',
            pos: 'noun (algebra)',
            tier: 'Tier 3 Domain Specific',
            source: 'Algebra Compendium',
            definition: 'The algebraic quantity delta = b^2 - 4ac that determines the number and nature (real or complex) of roots of a quadratic polynomial.',
            example: 'When the discriminant is negative, the quadratic has two complex conjugate roots.',
            morphemes: [
                { part: 'dis-', type: 'Prefix (Latin)', meaning: 'Apart' },
                { part: 'cernere', type: 'Root (Latin)', meaning: 'To distinguish or separate' }
            ]
        },
        'logarithm': {
            phonetic: '/ˈlɒɡərɪðəm/',
            syllables: 'log • a • rithm',
            pos: 'noun (algebra)',
            tier: 'Tier 3 Domain Specific',
            source: 'Algebra Compendium',
            definition: 'The exponent to which a fixed base must be raised to produce a specified value; the inverse function of exponentiation.',
            example: 'The natural logarithm has base e and is written as ln(x).',
            morphemes: [
                { part: 'logos', type: 'Root (Greek)', meaning: 'Ratio / reckoning' },
                { part: 'arithmos', type: 'Root (Greek)', meaning: 'Number' }
            ]
        },
        'telescreen': {
            phonetic: '/ˈtɛlɪskriːn/',
            syllables: 'tel • e • screen',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
            source: '1984 Glossary',
            definition: 'A two-way television and surveillance monitor used by the Party to broadcast propaganda and monitor citizens.',
            example: 'The telescreen received and transmitted simultaneously in Oceania.',
            morphemes: [
                { part: 'tele-', type: 'Prefix (Greek)', meaning: 'Far off / at a distance' },
                { part: 'screen', type: 'Root (Old French)', meaning: 'Barrier / display partition' }
            ]
        },
        'thoughtcrime': {
            phonetic: '/ˈθɔːtkraɪm/',
            syllables: 'thought • crime',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
            source: '1984 Glossary',
            definition: 'The criminal act of holding unspoken beliefs or unapproved thoughts contrary to ruling authority.',
            example: 'Thoughtcrime does not entail death; thoughtcrime is death.',
            morphemes: [
                { part: 'thought', type: 'Root (Old English)', meaning: 'Process of thinking' },
                { part: 'crime', type: 'Root (Latin)', meaning: 'Charge / violation of law' }
            ]
        },
        'doublethink': {
            phonetic: '/ˈdʌbəlˌθɪŋk/',
            syllables: 'dou • ble • think',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            source: '1984 Glossary',
            definition: 'The ability to hold two contradictory beliefs in one\'s mind simultaneously, and accept both of them as true.',
            example: 'Doublethink is the power of holding two contradictory beliefs simultaneously.',
            morphemes: [
                { part: 'double', type: 'Root (Latin duplus)', meaning: 'Twofold' },
                { part: 'think', type: 'Root', meaning: 'Form concepts or ideas' }
            ]
        },
        'ubiquitous': {
            phonetic: '/juːˈbɪkwɪtəs/',
            syllables: 'u • biq • ui • tous',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            source: 'Academic Lexicon',
            definition: 'Present, appearing, or found everywhere; omnipresent.',
            example: 'Surveillance cameras had become ubiquitous in the city.',
            morphemes: [
                { part: 'ubique', type: 'Root (Latin)', meaning: 'Everywhere' },
                { part: '-ous', type: 'Suffix (Latin)', meaning: 'Full of / possessing quality' }
            ]
        },
        'ominous': {
            phonetic: '/ˈɒmɪnəs/',
            syllables: 'om • i • nous',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            source: 'Academic Lexicon',
            definition: 'Giving the impression that something bad or unpleasant is going to happen; threatening.',
            example: 'There was an ominous silence before the storm broke.',
            morphemes: [
                { part: 'omen', type: 'Root (Latin)', meaning: 'Fateful prophetic sign' },
                { part: '-ous', type: 'Suffix', meaning: 'Characterized by' }
            ]
        }
    };

    let tooltipEl = null;
    let currentWord = '';
    let currentDefinition = '';
    let currentAudioUrl = null;
    let currentSavedRange = null;

    // In-memory cache for API lookup acceleration
    const API_CACHE = {};

    // Retrieve cached word entry if present in memory or sessionStorage
    function getCachedVocab(word) {
        const key = word.toLowerCase();
        if (API_CACHE[key]) return API_CACHE[key];
        try {
            const stored = sessionStorage.getItem(`hl_dict_${key}`);
            if (stored) {
                const parsed = JSON.parse(stored);
                API_CACHE[key] = parsed;
                return parsed;
            }
        } catch (e) {}
        return null;
    }

    // Save word entry to cache
    function setCachedVocab(word, data) {
        const key = word.toLowerCase();
        API_CACHE[key] = data;
        try {
            sessionStorage.setItem(`hl_dict_${key}`, JSON.stringify(data));
        } catch (e) {}
    }

    // Algorithmic English syllable hyphenator fallback
    function computeSyllables(word) {
        if (!word) return '';
        const w = word.toLowerCase();
        if (w.length <= 3) return w;
        const syllables = w.match(/[^aeiouy]*[aeiouy]+(?:[^aeiouy]*$|[^aeiouy](?=[^aeiouy]))?/gi);
        return (syllables && syllables.length > 1) ? syllables.join(' • ') : w;
    }

    // Generate possible stem / lemmatization variations for English inflections
    function getStemCandidates(word) {
        const w = word.toLowerCase();
        const stems = [];
        if (w.endsWith('ies') && w.length > 4) stems.push(w.slice(0, -3) + 'y');
        if (w.endsWith('es') && w.length > 4) stems.push(w.slice(0, -2));
        if (w.endsWith('s') && !w.endsWith('ss') && w.length > 3) stems.push(w.slice(0, -1));
        if (w.endsWith('ing') && w.length > 5) {
            stems.push(w.slice(0, -3));
            stems.push(w.slice(0, -3) + 'e');
        }
        if (w.endsWith('ed') && w.length > 4) {
            stems.push(w.slice(0, -2));
            stems.push(w.slice(0, -1));
        }
        if (w.endsWith('ly') && w.length > 4) stems.push(w.slice(0, -2));
        if (w.endsWith('ic') && w.length > 4) stems.push(w.slice(0, -2));
        return stems;
    }

    function getOrCreateTooltip() {
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'reader-vocab-tooltip';
            tooltipEl.className = 'reader-vocab-tooltip hidden';
            tooltipEl.setAttribute('role', 'dialog');
            tooltipEl.setAttribute('aria-modal', 'false');
            tooltipEl.innerHTML = `
                <!-- Integrated Highlighting & Marginalia Actions Row -->
                <div class="vocab-tooltip-actions-row">
                    <div class="vtt-hl-colors" title="Highlight this text">
                        <button type="button" class="vtt-hl-btn hl-yellow" data-color="hl-yellow" title="Highlight Goldenrod (Key Idea)" aria-label="Highlight Goldenrod"></button>
                        <button type="button" class="vtt-hl-btn hl-green" data-color="hl-green" title="Highlight Seafoam (Evidence)" aria-label="Highlight Seafoam"></button>
                        <button type="button" class="vtt-hl-btn hl-blue" data-color="hl-blue" title="Highlight Cyan (Vocabulary)" aria-label="Highlight Cyan"></button>
                        <button type="button" class="vtt-hl-btn hl-pink" data-color="hl-pink" title="Highlight Coral (Question)" aria-label="Highlight Coral"></button>
                    </div>
                    <div class="vtt-sep"></div>
                    <button type="button" id="vtt-btn-note" class="vtt-tool-btn" title="Add Study Note" aria-label="Add Study Note">
                        <i class="fas fa-sticky-note"></i> <span>Note</span>
                    </button>
                    <button type="button" id="vtt-btn-flashcard" class="vtt-tool-btn" title="Create Flashcard in Studio" aria-label="Create Flashcard">
                        <i class="fas fa-layer-group"></i> <span>+ Card</span>
                    </button>
                    <button type="button" id="vtt-btn-copy" class="vtt-tool-btn" title="Copy Word & Definition" aria-label="Copy Quote">
                        <i class="fas fa-copy"></i> <span>Copy</span>
                    </button>
                </div>

                <!-- Word Header & Audio Pronunciation -->
                <div class="vocab-tooltip-header">
                    <div class="vocab-tooltip-term-row">
                        <span id="vtt-word" class="vocab-tooltip-word">Word</span>
                        <span id="vtt-phonetic" class="vocab-tooltip-phonetic">/phonetic/</span>
                        <button type="button" id="vtt-audio-btn" class="vocab-tooltip-audio-btn" title="Pronounce word (1.0x native audio)" aria-label="Pronounce word">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    <button type="button" id="vtt-close-btn" class="vocab-tooltip-close-btn" aria-label="Close inspection popup">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Syllable Breakdown & Phonics Speech -->
                <div class="vocab-syllable-row">
                    <span id="vtt-syllables" class="vocab-syllable-display">syl • la • bles</span>
                    <button type="button" id="vtt-audio-slow-btn" class="vocab-phonics-btn" title="Slow phonic articulation (0.6x)">
                        <i class="fas fa-tachometer-alt"></i> <span>Slow (0.6x)</span>
                    </button>
                </div>

                <div class="vocab-tooltip-meta">
                    <span id="vtt-pos" class="vocab-tooltip-pos">vocabulary</span>
                    <span id="vtt-tier" class="vocab-tooltip-tier">Standard Tier</span>
                    <span id="vtt-source" class="vtt-source-badge"><i class="fas fa-globe"></i> Online API</span>
                </div>

                <div id="vtt-definition" class="vocab-tooltip-def">Loading definition...</div>
                <div id="vtt-example" class="vocab-tooltip-example" style="display: none;">"Example sentence."</div>

                <!-- Morpheme Anatomy Section -->
                <div id="vtt-morpheme-box" class="vocab-morpheme-container" style="display: none;">
                    <div class="vocab-morpheme-header">
                        <i class="fas fa-dna"></i> <span>Morpheme &amp; Etymology Anatomy</span>
                    </div>
                    <div id="vtt-morpheme-chips" class="vocab-morpheme-chips"></div>
                </div>

                <div class="vocab-tooltip-footer">
                    <button type="button" id="vtt-add-flashcard-btn" class="vocab-tooltip-action-btn">
                        <i class="fas fa-plus"></i> <span>Add to Leitner Flashcards</span>
                    </button>
                </div>
            `;
            document.body.appendChild(tooltipEl);

            // Hook close button
            tooltipEl.querySelector('#vtt-close-btn').addEventListener('click', hideTooltip);

            // Hook audio speech (standard 1.0x native audio or SpeechSynthesis)
            tooltipEl.querySelector('#vtt-audio-btn').addEventListener('click', () => {
                playPronunciation(1.0);
            });

            // Hook phonic audio speech (slow 0.6x)
            tooltipEl.querySelector('#vtt-audio-slow-btn').addEventListener('click', () => {
                playPronunciation(0.6);
            });

            // Hook add to flashcard footer
            tooltipEl.querySelector('#vtt-add-flashcard-btn').addEventListener('click', addCurrentWordToFlashcards);

            // Hook integrated highlight color swatches
            tooltipEl.querySelectorAll('.vtt-hl-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const color = btn.dataset.color || 'hl-yellow';
                    applyHighlightFromTooltip(color);
                });
            });

            // Hook integrated Note button
            tooltipEl.querySelector('#vtt-btn-note').addEventListener('click', (e) => {
                e.stopPropagation();
                openNoteFromTooltip();
            });

            // Hook integrated + Card button
            tooltipEl.querySelector('#vtt-btn-flashcard').addEventListener('click', (e) => {
                e.stopPropagation();
                addCurrentWordToFlashcards();
            });

            // Hook integrated Copy button
            tooltipEl.querySelector('#vtt-btn-copy').addEventListener('click', (e) => {
                e.stopPropagation();
                const copyText = `${currentWord}: ${currentDefinition}`;
                navigator.clipboard.writeText(copyText).then(() => {
                    const copyBtn = tooltipEl.querySelector('#vtt-btn-copy');
                    copyBtn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
                    setTimeout(() => {
                        copyBtn.innerHTML = '<i class="fas fa-copy"></i> <span>Copy</span>';
                    }, 1200);
                });
            });
        }
        return tooltipEl;
    }

    function playPronunciation(rate = 1.0) {
        const audioBtn = tooltipEl ? tooltipEl.querySelector('#vtt-audio-btn') : null;
        if (audioBtn) audioBtn.classList.add('vtt-audio-playing');

        const cleanupAnimation = () => {
            if (audioBtn) audioBtn.classList.remove('vtt-audio-playing');
        };

        // If high-quality direct MP3 audio URL exists from API and rate is 1.0x, play recorded audio
        if (currentAudioUrl && rate === 1.0) {
            const audio = new Audio(currentAudioUrl);
            audio.play().then(() => {
                audio.onended = cleanupAnimation;
            }).catch(() => {
                fallbackSpeechSynthesis(rate, cleanupAnimation);
            });
        } else {
            fallbackSpeechSynthesis(rate, cleanupAnimation);
        }
    }

    function fallbackSpeechSynthesis(rate, onEndCallback) {
        if (currentWord && 'speechSynthesis' in window) {
            window.speechSynthesis.cancel();
            const u = new SpeechSynthesisUtterance(currentWord);
            u.rate = rate;
            u.pitch = 1.0;
            u.onend = () => {
                if (onEndCallback) onEndCallback();
            };
            u.onerror = () => {
                if (onEndCallback) onEndCallback();
            };
            window.speechSynthesis.speak(u);
        } else {
            if (onEndCallback) setTimeout(onEndCallback, 600);
        }
    }

    function hideTooltip() {
        if (tooltipEl) {
            tooltipEl.classList.add('hidden');
            tooltipEl.style.display = 'none';
        }
    }

    function applyHighlightFromTooltip(colorClass, note = '') {
        if (currentSavedRange) {
            const span = document.createElement("mark");
            span.className = colorClass;
            span.textContent = currentSavedRange.toString();
            if (note) {
                span.setAttribute("data-note", note);
                span.setAttribute("title", `Margin Note: ${note}`);
            }

            try {
                currentSavedRange.deleteContents();
                currentSavedRange.insertNode(span);
            } catch (e) {}

            const meta = window.BOOK_METADATA || {};
            const bookId = meta.id || 'default';
            const currentChapter = meta.chapterNum || 1;
            const key = `hesten_highlights_${bookId}_chapter_${currentChapter}`;

            try {
                const list = JSON.parse(localStorage.getItem(key) || '[]');
                list.push({ text: span.textContent, color: colorClass, note: note, date: new Date().toISOString() });
                localStorage.setItem(key, JSON.stringify(list));
            } catch (e) {}

            hideTooltip();
            if (window.announceA11y) {
                window.announceA11y(`Highlighted text in ${colorClass.replace('hl-', '')}`);
            }
        }
    }

    function openNoteFromTooltip() {
        const modal = document.getElementById("note-input-modal");
        const textarea = document.getElementById("study-note-textarea");
        const saveBtn = document.getElementById("save-note-btn");
        const cancelBtn = document.getElementById("cancel-note-btn");

        if (modal && textarea) {
            modal.classList.remove("hidden");
            modal.style.display = "flex";
            textarea.value = `[Term: ${currentWord}] - `;
            textarea.focus();

            const handleSave = () => {
                const noteText = textarea.value.trim();
                if (noteText) {
                    applyHighlightFromTooltip("hl-yellow", noteText);
                }
                closeModal();
            };

            const closeModal = () => {
                modal.classList.add("hidden");
                modal.style.display = "none";
                saveBtn.removeEventListener("click", handleSave);
                cancelBtn.removeEventListener("click", closeModal);
            };

            saveBtn.addEventListener("click", handleSave);
            cancelBtn.addEventListener("click", closeModal);
        }
    }

    function updateTooltipContent(data) {
        if (!tooltipEl) return;
        currentWord = data.word;
        currentDefinition = data.definition || 'Definition unavailable.';
        currentAudioUrl = data.audioUrl || null;

        tooltipEl.querySelector('#vtt-word').textContent = data.word;
        tooltipEl.querySelector('#vtt-phonetic').textContent = data.phonetic || `/${data.word.toLowerCase()}/`;
        tooltipEl.querySelector('#vtt-pos').textContent = data.pos || 'vocabulary';
        tooltipEl.querySelector('#vtt-tier').textContent = data.tier || 'Academic Vocabulary';
        
        const sourceEl = tooltipEl.querySelector('#vtt-source');
        if (sourceEl) {
            sourceEl.innerHTML = `<i class="fas fa-globe"></i> ${data.source || 'Online API'}`;
        }

        const defEl = tooltipEl.querySelector('#vtt-definition');
        defEl.innerHTML = currentDefinition;

        // Syllables
        const syllablesText = data.syllables || computeSyllables(data.word);
        tooltipEl.querySelector('#vtt-syllables').textContent = syllablesText;
        
        // Example sentence
        const exampleEl = tooltipEl.querySelector('#vtt-example');
        if (data.example) {
            exampleEl.style.display = 'block';
            exampleEl.textContent = `"${data.example}"`;
        } else {
            exampleEl.style.display = 'none';
        }

        // Morphemes anatomy
        const morphemeBox = tooltipEl.querySelector('#vtt-morpheme-box');
        const morphemeChips = tooltipEl.querySelector('#vtt-morpheme-chips');
        if (data.morphemes && Array.isArray(data.morphemes) && data.morphemes.length > 0) {
            morphemeChips.innerHTML = '';
            data.morphemes.forEach(m => {
                const chip = document.createElement('div');
                chip.className = 'morpheme-chip';
                chip.innerHTML = `
                    <span class="morpheme-part">${m.part}</span>
                    <span class="morpheme-meaning">${m.type}: ${m.meaning}</span>
                `;
                morphemeChips.appendChild(chip);
            });
            morphemeBox.style.display = 'flex';
        } else {
            morphemeBox.style.display = 'none';
        }
    }

    function showTooltipAt(rect, data, range = null) {
        const tip = getOrCreateTooltip();
        if (range) currentSavedRange = range.cloneRange ? range.cloneRange() : range;

        updateTooltipContent(data);

        tip.style.display = 'flex';
        tip.classList.remove('hidden');

        // Hide standalone highlight toolbar to avoid collision
        const floatToolbar = document.getElementById('highlight-toolbar');
        if (floatToolbar) {
            floatToolbar.classList.add('hidden');
            floatToolbar.style.display = 'none';
        }

        // Position tooltip centered above the selected word
        const tipWidth = 330;
        const tipHeight = tip.offsetHeight || 260;

        let top = window.scrollY + rect.top - tipHeight - 12;
        let left = window.scrollX + rect.left + (rect.width / 2) - (tipWidth / 2);

        // Keep within horizontal bounds
        if (left < 16) left = 16;
        if (left + tipWidth > window.innerWidth - 16) left = window.innerWidth - tipWidth - 16;

        // If off top of viewport, flip to below
        if (rect.top - tipHeight - 12 < 10) {
            top = window.scrollY + rect.bottom + 12;
        }

        tip.style.top = `${top}px`;
        tip.style.left = `${left}px`;
    }

    // Multi-Tier Online API Query Orchestrator
    async function fetchOnlineDefinition(cleanWord) {
        // TIER 1: Free Dictionary API (Primary English & Academic Lexicon)
        try {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 3500);
            const res = await fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(cleanWord)}`, {
                signal: controller.signal
            });
            clearTimeout(timeoutId);

            if (res.ok) {
                const data = await res.json();
                if (data && data.length > 0) {
                    const entry = data[0];
                    let phonetic = entry.phonetic || '';
                    let audioUrl = null;

                    if (entry.phonetics && Array.isArray(entry.phonetics)) {
                        for (const p of entry.phonetics) {
                            if (!phonetic && p.text) phonetic = p.text;
                            if (!audioUrl && p.audio && p.audio.startsWith('http')) {
                                audioUrl = p.audio;
                            }
                        }
                    }

                    let pos = 'term';
                    let def = 'No definition found.';
                    let example = '';

                    if (entry.meanings && entry.meanings.length > 0) {
                        const m = entry.meanings[0];
                        pos = m.partOfSpeech || 'vocabulary';
                        if (m.definitions && m.definitions.length > 0) {
                            def = m.definitions[0].definition || def;
                            example = m.definitions[0].example || '';
                        }
                    }

                    return {
                        word: cleanWord,
                        phonetic: phonetic || `/${cleanWord}/`,
                        syllables: computeSyllables(cleanWord),
                        pos: pos,
                        tier: 'English Dictionary API',
                        source: 'Dictionary API',
                        definition: def,
                        example: example,
                        audioUrl: audioUrl,
                        morphemes: null
                    };
                }
            }
        } catch (e) {}

        // TIER 2: Lemmatization / Stem Candidates via Free Dictionary API
        const stemCandidates = getStemCandidates(cleanWord);
        for (const stem of stemCandidates) {
            try {
                const res = await fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(stem)}`);
                if (res.ok) {
                    const data = await res.json();
                    if (data && data.length > 0) {
                        const entry = data[0];
                        const m = entry.meanings && entry.meanings[0];
                        const def = (m && m.definitions && m.definitions[0]) ? m.definitions[0].definition : '';
                        if (def) {
                            return {
                                word: cleanWord,
                                phonetic: entry.phonetic || `/${cleanWord}/`,
                                syllables: computeSyllables(cleanWord),
                                pos: (m ? m.partOfSpeech : 'vocabulary') + ` (form of ${stem})`,
                                tier: 'English Dictionary API',
                                source: `Dictionary API (${stem})`,
                                definition: `[Form of "${stem}"]: ` + def,
                                example: (m && m.definitions[0].example) ? m.definitions[0].example : '',
                                audioUrl: (entry.phonetics && entry.phonetics[0] && entry.phonetics[0].audio) || null,
                                morphemes: [{ part: stem, type: 'Base Lemma', meaning: `Root form of ${cleanWord}` }]
                            };
                        }
                    }
                }
            } catch (e) {}
        }

        // TIER 3: Datamuse API (Word definitions, phonetic tags, lexical relationships)
        try {
            const dRes = await fetch(`https://api.datamuse.com/words?sp=${encodeURIComponent(cleanWord)}&md=dpf&max=1`);
            if (dRes.ok) {
                const dList = await dRes.json();
                if (dList && dList.length > 0 && dList[0].defs && dList[0].defs.length > 0) {
                    const rawDef = dList[0].defs[0]; // Format: "n\tdefinition text"
                    const parts = rawDef.split('\t');
                    const posTag = parts[0] || 'n';
                    const posMap = { n: 'noun', v: 'verb', adj: 'adjective', adv: 'adverb', u: 'vocabulary' };
                    const pos = posMap[posTag] || posTag;
                    const def = parts[1] || rawDef;

                    return {
                        word: cleanWord,
                        phonetic: `/${cleanWord}/`,
                        syllables: computeSyllables(cleanWord),
                        pos: pos,
                        tier: 'Academic Lexicon',
                        source: 'Datamuse API',
                        definition: def,
                        example: '',
                        audioUrl: null,
                        morphemes: null
                    };
                }
            }
        } catch (e) {}

        // TIER 4: Wiktionary REST API (Encyclopedic / Modern / Scientific Words)
        try {
            const wRes = await fetch(`https://en.wiktionary.org/api/rest_v1/page/definition/${encodeURIComponent(cleanWord)}`);
            if (wRes.ok) {
                const wData = await wRes.json();
                if (wData && wData.en && wData.en.length > 0) {
                    const section = wData.en[0];
                    const pos = section.partOfSpeech || 'vocabulary';
                    if (section.definitions && section.definitions.length > 0) {
                        const cleanDef = section.definitions[0].definition.replace(/<[^>]*>?/gm, '');
                        return {
                            word: cleanWord,
                            phonetic: `/${cleanWord}/`,
                            syllables: computeSyllables(cleanWord),
                            pos: pos,
                            tier: 'Academic & Literature',
                            source: 'Wiktionary API',
                            definition: cleanDef,
                            example: '',
                            audioUrl: null,
                            morphemes: null
                        };
                    }
                }
            }
        } catch (e) {}

        // TIER 5: Algorithmic Morphemic Fallback
        return generateMorphemicFallback(cleanWord);
    }

    function generateMorphemicFallback(cleanWord) {
        let pos = 'vocabulary term';
        let def = `Key terminology appearing within this reading passage.`;
        let morphemes = [];

        if (cleanWord.endsWith('ing')) {
            pos = 'participle / continuous verb';
            def = `Action or ongoing process related to the action of "${cleanWord.slice(0, -3)}".`;
            morphemes = [{ part: cleanWord.slice(0, -3), type: 'Verb Stem', meaning: 'Action' }, { part: '-ing', type: 'Suffix', meaning: 'Continuous action' }];
        } else if (cleanWord.endsWith('tion') || cleanWord.endsWith('sion')) {
            pos = 'abstract noun';
            def = `The state, act, condition, or result of "${cleanWord.slice(0, -4)}".`;
            morphemes = [{ part: cleanWord.slice(0, -4), type: 'Root', meaning: 'Process' }, { part: '-tion', type: 'Suffix', meaning: 'State or action' }];
        } else if (cleanWord.endsWith('ly')) {
            pos = 'adverb';
            def = `In a manner characterized by or relating to being ${cleanWord.slice(0, -2)}.`;
            morphemes = [{ part: cleanWord.slice(0, -2), type: 'Adjective Root', meaning: 'Quality' }, { part: '-ly', type: 'Suffix', meaning: 'In the manner of' }];
        } else if (cleanWord.endsWith('ic') || cleanWord.endsWith('al')) {
            pos = 'adjective';
            def = `Of, pertaining to, or possessing the characteristic qualities of ${cleanWord}.`;
            morphemes = [{ part: cleanWord, type: 'Adjectival Stem', meaning: 'Characteristic' }];
        } else if (cleanWord.endsWith('ity') || cleanWord.endsWith('ness')) {
            pos = 'noun';
            def = `The state, degree, or quality of having specified properties.`;
            morphemes = [{ part: cleanWord, type: 'Nominal Form', meaning: 'State or quality' }];
        }

        return {
            word: cleanWord,
            phonetic: `/${cleanWord}/`,
            syllables: computeSyllables(cleanWord),
            pos: pos,
            tier: 'Contextual Term',
            source: 'Morphological Anatomy',
            definition: def,
            example: '',
            audioUrl: null,
            morphemes: morphemes.length > 0 ? morphemes : null
        };
    }

    async function lookupWord(word, rect, range = null) {
        const cleanWord = word.trim().toLowerCase().replace(/^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$/g, '');
        if (!cleanWord || cleanWord.length < 1) return;

        // 1. Check local session/memory cache
        const cached = getCachedVocab(cleanWord);
        if (cached) {
            showTooltipAt(rect, cached, range);
            return;
        }

        // 2. Check book-specific curriculum glossary
        if (window.BOOK_JSON_VOCAB && Array.isArray(window.BOOK_JSON_VOCAB)) {
            const found = window.BOOK_JSON_VOCAB.find(v => (v.word || '').toLowerCase() === cleanWord || (v.word || '').toLowerCase().includes(cleanWord));
            if (found) {
                const item = {
                    word: found.word,
                    phonetic: found.phonetic || `/${cleanWord}/`,
                    syllables: found.syllables || computeSyllables(found.word),
                    pos: found.partOfSpeech || 'curriculum vocabulary',
                    tier: 'Curriculum Core',
                    source: 'Course Glossary',
                    definition: found.definition || found.def,
                    example: found.sentence || found.example || '',
                    morphemes: found.morphemes || null,
                    audioUrl: null
                };
                setCachedVocab(cleanWord, item);
                showTooltipAt(rect, item, range);
                return;
            }
        }

        // 3. Check built-in enriched academic lexicon
        if (BUILTIN_LEXICON[cleanWord]) {
            const item = {
                word: cleanWord,
                ...BUILTIN_LEXICON[cleanWord]
            };
            setCachedVocab(cleanWord, item);
            showTooltipAt(rect, item, range);
            return;
        }

        // 4. Initial placeholder rendering with animated spinner while fetching online API
        showTooltipAt(rect, {
            word: cleanWord,
            phonetic: `/${cleanWord}/`,
            syllables: computeSyllables(cleanWord),
            pos: 'querying online lexicon...',
            tier: 'Lexical API Query',
            source: 'Connecting...',
            definition: '<div class="vtt-loading-spinner"><i class="fas fa-circle-notch fa-spin"></i> Looking up definition from online dictionary...</div>',
            example: '',
            audioUrl: null,
            morphemes: null
        }, range);

        // 5. Fetch definition via Multi-Tier Online API
        const onlineResult = await fetchOnlineDefinition(cleanWord);
        if (onlineResult) {
            setCachedVocab(cleanWord, onlineResult);
            // Only update if tooltip is currently showing this exact word
            if (currentWord.toLowerCase() === cleanWord.toLowerCase() && tooltipEl && !tooltipEl.classList.contains('hidden')) {
                updateTooltipContent(onlineResult);
            }
        }
    }

    function addCurrentWordToFlashcards() {
        if (!currentWord) return;

        try {
            const decks = JSON.parse(localStorage.getItem('hl_leitner_decks') || '{}');
            if (!decks.custom) {
                decks.custom = { name: 'Custom Student Deck', cards: [] };
            }

            const cleanDefText = currentDefinition.replace(/<[^>]*>?/gm, '');
            const exists = decks.custom.cards.some(c => (c.front || '').toLowerCase() === currentWord.toLowerCase());
            if (!exists) {
                decks.custom.cards.push({
                    id: 'card-' + Date.now(),
                    front: currentWord,
                    back: cleanDefText,
                    example: `Saved from active reading session`,
                    box: 1,
                    nextReview: Date.now()
                });
                localStorage.setItem('hl_leitner_decks', JSON.stringify(decks));
            }
        } catch (err) {}

        const btn = tooltipEl ? tooltipEl.querySelector('#vtt-add-flashcard-btn') : null;
        if (btn) {
            btn.innerHTML = '<i class="fas fa-check"></i> <span>Saved to Flashcard Studio!</span>';
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-layer-group"></i> <span>Open Flashcard Studio</span>';
                btn.onclick = () => {
                    if (window.toggleFlashcardStudio) {
                        window.toggleFlashcardStudio(true);
                        hideTooltip();
                    }
                };
            }, 1000);
        }

        if (window.announceA11y) {
            window.announceA11y(`Added ${currentWord} to Leitner Flashcard Studio`);
        }
    }

    function initVocabTooltip() {
        const bookContent = document.getElementById('book-content');
        if (!bookContent) return;

        // 1. Double click listener inside book text
        bookContent.addEventListener('dblclick', (e) => {
            const sel = window.getSelection();
            if (sel && sel.rangeCount > 0) {
                const text = sel.toString().trim();
                if (text && text.length >= 1 && !text.includes(' ')) {
                    const range = sel.getRangeAt(0);
                    const rect = range.getBoundingClientRect();
                    lookupWord(text, rect, range);
                }
            }
        });

        // 2. Add "Define" button to existing highlight toolbar
        const highlightToolbar = document.getElementById('highlight-toolbar');
        if (highlightToolbar && !document.getElementById('hl-btn-define')) {
            const defBtn = document.createElement('button');
            defBtn.type = 'button';
            defBtn.id = 'hl-btn-define';
            defBtn.className = 'hl-action-btn';
            defBtn.title = 'Define Word';
            defBtn.setAttribute('aria-label', 'Define Word');
            defBtn.innerHTML = '<i class="fas fa-spell-check"></i> <span>Define</span>';

            defBtn.addEventListener('click', () => {
                const sel = window.getSelection();
                if (sel && sel.rangeCount > 0) {
                    const text = sel.toString().trim();
                    if (text) {
                        const words = text.split(/\s+/);
                        const firstWord = words[0];
                        const range = sel.getRangeAt(0);
                        const rect = range.getBoundingClientRect();
                        lookupWord(firstWord, rect, range);
                    }
                }
            });

            highlightToolbar.appendChild(defBtn);
        }

        // 3. Dismiss tooltip on outside click
        document.addEventListener('click', (e) => {
            if (tooltipEl && !tooltipEl.contains(e.target) && !e.target.closest('#highlight-toolbar') && !e.target.closest('#note-input-modal')) {
                hideTooltip();
            }
        });
    }

    // Expose lookup and hide functions globally
    window.lookupReaderWord = lookupWord;
    window.hideReaderVocabTooltip = hideTooltip;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVocabTooltip);
    } else {
        initVocabTooltip();
    }
})();
