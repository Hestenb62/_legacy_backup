/* ==========================================================================
   Interactive In-Text Vocabulary Tooltip & Phonetic/Morpheme Anatomy Engine
   Activates on word double-click or floating highlight "Define" action,
   displays definitions, Lexile tags, syllable breakdown, morphemes, dual-speed
   audio pronunciation (1.0x / 0.6x), and adds directly into Leitner Flashcard Studio.
   ========================================================================== */
(function () {
    // Built-in curated lexicon enriched with syllables and Greek/Latin morphemes
    const BUILTIN_LEXICON = {
        'telescreen': {
            phonetic: '/ˈtɛlɪskriːn/',
            syllables: 'tel • e • screen',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
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
            definition: 'Giving the impression that something bad or unpleasant is going to happen; threatening.',
            example: 'There was an ominous silence before the storm broke.',
            morphemes: [
                { part: 'omen', type: 'Root (Latin)', meaning: 'Fateful prophetic sign' },
                { part: '-ous', type: 'Suffix', meaning: 'Characterized by' }
            ]
        },
        'benevolent': {
            phonetic: '/bəˈnɛvələnt/',
            syllables: 'be • nev • o • lent',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Well-meaning and kindly; serving a charitable rather than profit-making purpose.',
            example: 'He had a benevolent smile that put everyone at ease.',
            morphemes: [
                { part: 'bene-', type: 'Prefix (Latin)', meaning: 'Well / good' },
                { part: 'volens', type: 'Root (Latin)', meaning: 'Wishing / willing' }
            ]
        },
        'scrutiny': {
            phonetic: '/ˈskruːtɪni/',
            syllables: 'scru • ti • ny',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            definition: 'Critical observation or examination; close inspection.',
            example: 'Every move of the citizens was subject to relentless scrutiny.',
            morphemes: [
                { part: 'scrutari', type: 'Root (Latin)', meaning: 'To search or examine closely' }
            ]
        },
        'totalitarian': {
            phonetic: '/toʊˌtæləˈtɛriən/',
            syllables: 'to • tal • i • tar • i • an',
            pos: 'adjective',
            tier: 'Tier 3 Domain Specific',
            definition: 'Relating to a system of government that is centralized and dictatorial and requires complete subservience.',
            example: 'The dystopian state exemplified totalitarian control.',
            morphemes: [
                { part: 'total', type: 'Root (Latin)', meaning: 'Entire / whole' },
                { part: '-arian', type: 'Suffix', meaning: 'Advocate of or associated with' }
            ]
        },
        'superfluous': {
            phonetic: '/suːˈpɜːrfluəs/',
            syllables: 'su • per • flu • ous',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Exceeding what is sufficient, necessary, or normal; redundant.',
            example: 'Words that were superfluous were stripped from the new dictionary.',
            morphemes: [
                { part: 'super-', type: 'Prefix (Latin)', meaning: 'Above / over' },
                { part: 'fluere', type: 'Root (Latin)', meaning: 'To flow' },
                { part: '-ous', type: 'Suffix', meaning: 'Having the quality of' }
            ]
        },
        'desolate': {
            phonetic: '/ˈdɛsəlɪt/',
            syllables: 'des • o • late',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Deserted of people and in a state of bleak and dismal emptiness.',
            example: 'The abandoned village was cold, wind-swept, and desolate.',
            morphemes: [
                { part: 'de-', type: 'Prefix (Latin)', meaning: 'Completely' },
                { part: 'solus', type: 'Root (Latin)', meaning: 'Alone / solitary' }
            ]
        },
        'capricious': {
            phonetic: '/kəˈprɪʃəs/',
            syllables: 'ca • pri • cious',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Given to sudden and unaccountable changes of mood or behavior; fickle.',
            example: 'The ruler was known for his capricious and unpredictable decrees.',
            morphemes: [
                { part: 'capra', type: 'Root (Italian/Latin)', meaning: 'Goat (bounding unpredictably)' },
                { part: '-ious', type: 'Suffix', meaning: 'Full of' }
            ]
        },
        'arduous': {
            phonetic: '/ˈɑːrdʒuəs/',
            syllables: 'ar • du • ous',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Involving or requiring strenuous effort; difficult and tiring.',
            example: 'They began an arduous trek through the mountain passes.',
            morphemes: [
                { part: 'arduus', type: 'Root (Latin)', meaning: 'Steep / difficult' },
                { part: '-ous', type: 'Suffix', meaning: 'Characterized by' }
            ]
        },
        'photosynthesis': {
            phonetic: '/ˌfoʊtoʊˈsɪnθəsɪs/',
            syllables: 'pho • to • syn • the • sis',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
            definition: 'The process by which green plants and certain organisms synthesize nutrients using sunlight.',
            example: 'Chloroplasts absorb radiant light energy to drive photosynthesis.',
            morphemes: [
                { part: 'photo-', type: 'Prefix (Greek)', meaning: 'Light' },
                { part: 'syn-', type: 'Prefix (Greek)', meaning: 'Together' },
                { part: 'tithenai', type: 'Root (Greek)', meaning: 'To place or put' }
            ]
        }
    };

    let tooltipEl = null;
    let currentWord = '';
    let currentDefinition = '';

    // Algorithmic English syllable hyphenator fallback
    function computeSyllables(word) {
        if (!word) return '';
        const w = word.toLowerCase();
        if (w.length <= 3) return w;
        
        // Approximate syllable chunks
        const syllables = w.match(/[^aeiouy]*[aeiouy]+(?:[^aeiouy]*$|[^aeiouy](?=[^aeiouy]))?/gi);
        return (syllables && syllables.length > 1) ? syllables.join(' • ') : w;
    }

    function getOrCreateTooltip() {
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'reader-vocab-tooltip';
            tooltipEl.className = 'reader-vocab-tooltip hidden';
            tooltipEl.setAttribute('role', 'tooltip');
            tooltipEl.innerHTML = `
                <div class="vocab-tooltip-header">
                    <div class="vocab-tooltip-term-row">
                        <span id="vtt-word" class="vocab-tooltip-word">Word</span>
                        <span id="vtt-phonetic" class="vocab-tooltip-phonetic">/phonetic/</span>
                        <button type="button" id="vtt-audio-btn" class="vocab-tooltip-audio-btn" title="Pronounce word (1.0x)" aria-label="Pronounce word">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    <button type="button" id="vtt-close-btn" class="vocab-tooltip-close-btn" aria-label="Close tooltip">
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
                    <span id="vtt-pos" class="vocab-tooltip-pos">noun</span>
                    <span id="vtt-tier" class="vocab-tooltip-tier">Tier 2 Academic</span>
                </div>

                <div id="vtt-definition" class="vocab-tooltip-def">Loading definition...</div>
                <div id="vtt-example" class="vocab-tooltip-example">"Example sentence."</div>

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

            // Hook audio speech (standard 1.0x)
            tooltipEl.querySelector('#vtt-audio-btn').addEventListener('click', () => {
                playPronunciation(1.0);
            });

            // Hook phonic audio speech (slow 0.6x)
            tooltipEl.querySelector('#vtt-audio-slow-btn').addEventListener('click', () => {
                playPronunciation(0.6);
            });

            // Hook add to flashcard
            tooltipEl.querySelector('#vtt-add-flashcard-btn').addEventListener('click', addCurrentWordToFlashcards);
        }
        return tooltipEl;
    }

    function playPronunciation(rate = 1.0) {
        if (currentWord && 'speechSynthesis' in window) {
            window.speechSynthesis.cancel();
            const u = new SpeechSynthesisUtterance(currentWord);
            u.rate = rate;
            u.pitch = 1.0;
            window.speechSynthesis.speak(u);
        }
    }

    function hideTooltip() {
        if (tooltipEl) {
            tooltipEl.classList.add('hidden');
            tooltipEl.style.display = 'none';
        }
    }

    function showTooltipAt(rect, data) {
        const tip = getOrCreateTooltip();
        currentWord = data.word;
        currentDefinition = data.definition || 'Definition unavailable.';

        tip.querySelector('#vtt-word').textContent = data.word;
        tip.querySelector('#vtt-phonetic').textContent = data.phonetic || `/${data.word.toLowerCase()}/`;
        tip.querySelector('#vtt-pos').textContent = data.pos || 'vocabulary';
        tip.querySelector('#vtt-tier').textContent = data.tier || 'Academic Vocabulary';
        tip.querySelector('#vtt-definition').textContent = currentDefinition;

        // Syllables
        const syllablesText = data.syllables || computeSyllables(data.word);
        tip.querySelector('#vtt-syllables').textContent = syllablesText;
        
        // Example sentence
        const exampleEl = tip.querySelector('#vtt-example');
        if (data.example) {
            exampleEl.style.display = 'block';
            exampleEl.textContent = `"${data.example}"`;
        } else {
            exampleEl.style.display = 'none';
        }

        // Morphemes anatomy
        const morphemeBox = tip.querySelector('#vtt-morpheme-box');
        const morphemeChips = tip.querySelector('#vtt-morpheme-chips');
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

        tip.style.display = 'flex';
        tip.classList.remove('hidden');

        // Position tooltip centered above the selected word
        const tipWidth = 330;
        const tipHeight = tip.offsetHeight || 220;

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

    function lookupWord(word, rect) {
        const cleanWord = word.trim().toLowerCase().replace(/^[^\w]+|[^\w]+$/g, '');
        if (!cleanWord || cleanWord.length < 2) return;

        // 1. Check book specific vocab JSON
        if (window.BOOK_JSON_VOCAB && Array.isArray(window.BOOK_JSON_VOCAB)) {
            const found = window.BOOK_JSON_VOCAB.find(v => (v.word || '').toLowerCase() === cleanWord);
            if (found) {
                showTooltipAt(rect, {
                    word: found.word,
                    phonetic: found.phonetic || `/${cleanWord}/`,
                    syllables: found.syllables || computeSyllables(found.word),
                    pos: found.partOfSpeech || 'vocabulary',
                    tier: 'Curriculum Core',
                    definition: found.definition || found.def,
                    example: found.sentence || found.example || '',
                    morphemes: found.morphemes || null
                });
                return;
            }
        }

        // 2. Check built-in classic literature lexicon
        if (BUILTIN_LEXICON[cleanWord]) {
            const item = BUILTIN_LEXICON[cleanWord];
            showTooltipAt(rect, {
                word: cleanWord,
                ...item
            });
            return;
        }

        // 3. Fallback: Query educational dictionary API
        showTooltipAt(rect, {
            word: cleanWord,
            phonetic: `/${cleanWord}/`,
            syllables: computeSyllables(cleanWord),
            pos: 'general term',
            tier: 'Standard Lexile Tier',
            definition: 'Looking up definition...',
            example: ''
        });

        fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(cleanWord)}`)
            .then(res => res.ok ? res.json() : null)
            .then(data => {
                if (data && data[0]) {
                    const entry = data[0];
                    const phon = entry.phonetic || (entry.phonetics && entry.phonetics[0] ? entry.phonetics[0].text : `/${cleanWord}/`);
                    let def = 'No definition found.';
                    let pos = 'term';
                    let ex = '';

                    if (entry.meanings && entry.meanings[0]) {
                        pos = entry.meanings[0].partOfSpeech || 'term';
                        if (entry.meanings[0].definitions && entry.meanings[0].definitions[0]) {
                            def = entry.meanings[0].definitions[0].definition || def;
                            ex = entry.meanings[0].definitions[0].example || '';
                        }
                    }

                    showTooltipAt(rect, {
                        word: cleanWord,
                        phonetic: phon,
                        syllables: computeSyllables(cleanWord),
                        pos: pos,
                        tier: 'General Vocabulary',
                        definition: def,
                        example: ex
                    });
                } else {
                    showTooltipAt(rect, {
                        word: cleanWord,
                        phonetic: `/${cleanWord}/`,
                        syllables: computeSyllables(cleanWord),
                        pos: 'word',
                        tier: 'Vocabulary Word',
                        definition: 'A key literary term from this reading passage.',
                        example: ''
                    });
                }
            })
            .catch(() => {
                showTooltipAt(rect, {
                    word: cleanWord,
                    phonetic: `/${cleanWord}/`,
                    syllables: computeSyllables(cleanWord),
                    pos: 'term',
                    tier: 'Literary Vocabulary',
                    definition: 'Examine this word in context to deepen reading comprehension.',
                    example: ''
                });
            });
    }

    function addCurrentWordToFlashcards() {
        if (!currentWord) return;

        // 1. Add to Leitner Flashcard Studio
        try {
            const decks = JSON.parse(localStorage.getItem('hl_leitner_decks') || '{}');
            if (!decks.custom) {
                decks.custom = { name: 'Custom Student Deck', cards: [] };
            }

            const exists = decks.custom.cards.some(c => (c.front || '').toLowerCase() === currentWord.toLowerCase());
            if (!exists) {
                decks.custom.cards.push({
                    id: 'card-' + Date.now(),
                    front: currentWord,
                    back: currentDefinition,
                    example: `Read in chapter page ${(window.CURRENT_READER_PAGE || 1)}`,
                    box: 1,
                    nextReview: Date.now()
                });
                localStorage.setItem('hl_leitner_decks', JSON.stringify(decks));
            }
        } catch (err) {}

        // 2. Also keep in reader custom vocab list
        const bookId = (window.BOOK_METADATA && window.BOOK_METADATA.id) ? window.BOOK_METADATA.id : 'default';
        const key = `hl_custom_vocab_${bookId}`;
        try {
            const list = JSON.parse(localStorage.getItem(key) || '[]');
            if (!list.some(v => (v.word || '').toLowerCase() === currentWord.toLowerCase())) {
                list.push({ word: currentWord, definition: currentDefinition, addedAt: new Date().toISOString() });
                localStorage.setItem(key, JSON.stringify(list));
            }
        } catch (e) {}

        const btn = tooltipEl.querySelector('#vtt-add-flashcard-btn');
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
                if (text && text.length >= 2 && !text.includes(' ')) {
                    const range = sel.getRangeAt(0);
                    const rect = range.getBoundingClientRect();
                    lookupWord(text, rect);
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
                        const rect = sel.getRangeAt(0).getBoundingClientRect();
                        lookupWord(firstWord, rect);
                    }
                }
            });

            highlightToolbar.appendChild(defBtn);
        }

        // 3. Dismiss tooltip on outside click
        document.addEventListener('click', (e) => {
            if (tooltipEl && !tooltipEl.contains(e.target) && !e.target.closest('#highlight-toolbar')) {
                hideTooltip();
            }
        });
    }

    // Expose lookup
    window.lookupReaderWord = lookupWord;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVocabTooltip);
    } else {
        initVocabTooltip();
    }
})();
