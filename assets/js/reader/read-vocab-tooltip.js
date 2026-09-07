/* ==========================================================================
   Interactive In-Text Vocabulary Tooltip & Phonetic Pronunciation
   Activates on word double-click or floating highlight "Define" action,
   displays definitions, Lexile tags, audio speech, and adds to study flashcards.
   ========================================================================== */
(function () {
    // Built-in curated lexicon for classic literature and academic reading
    const BUILTIN_LEXICON = {
        'telescreen': {
            phonetic: '/ˈtɛlɪskriːn/',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
            definition: 'A two-way television and surveillance monitor used by the Party to broadcast propaganda and monitor citizens.',
            example: 'The telescreen received and transmitted simultaneously in Oceania.'
        },
        'thoughtcrime': {
            phonetic: '/ˈθɔːtkraɪm/',
            pos: 'noun',
            tier: 'Tier 3 Domain Specific',
            definition: 'The criminal act of holding unspoken beliefs or unapproved thoughts contrary to ruling authority.',
            example: 'Thoughtcrime does not entail death; thoughtcrime is death.'
        },
        'doublethink': {
            phonetic: '/ˈdʌbəlˌθɪŋk/',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            definition: 'The ability to hold two contradictory beliefs in one\'s mind simultaneously, and accept both of them as true.',
            example: 'Doublethink is the power of holding two contradictory beliefs simultaneously.'
        },
        'ubiquitous': {
            phonetic: '/juːˈbɪkwɪtəs/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Present, appearing, or found everywhere; omnipresent.',
            example: 'Surveillance cameras had become ubiquitous in the city.'
        },
        'ominous': {
            phonetic: '/ˈɒmɪnəs/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Giving the impression that something bad or unpleasant is going to happen; threatening.',
            example: 'There was an ominous silence before the storm broke.'
        },
        'benevolent': {
            phonetic: '/bəˈnɛvələnt/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Well-meaning and kindly; serving a charitable rather than profit-making purpose.',
            example: 'He had a benevolent smile that put everyone at ease.'
        },
        'scrutiny': {
            phonetic: '/ˈskruːtɪni/',
            pos: 'noun',
            tier: 'Tier 2 Academic',
            definition: 'Critical observation or examination; close inspection.',
            example: 'Every move of the citizens was subject to relentless scrutiny.'
        },
        'totalitarian': {
            phonetic: '/toʊˌtæləˈtɛriən/',
            pos: 'adjective',
            tier: 'Tier 3 Domain Specific',
            definition: 'Relating to a system of government that is centralized and dictatorial and requires complete subservience.',
            example: 'The dystopian state exemplified totalitarian control.'
        },
        'superfluous': {
            phonetic: '/suːˈpɜːrfluəs/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Exceeding what is sufficient, necessary, or normal; redundant.',
            example: 'Words that were superfluous were stripped from the new dictionary.'
        },
        'desolate': {
            phonetic: '/ˈdɛsəlɪt/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Deserted of people and in a state of bleak and dismal emptiness.',
            example: 'The abandoned village was cold, wind-swept, and desolate.'
        },
        'capricious': {
            phonetic: '/kəˈprɪʃəs/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Given to sudden and unaccountable changes of mood or behavior; fickle.',
            example: 'The ruler was known for his capricious and unpredictable decrees.'
        },
        'arduous': {
            phonetic: '/ˈɑːrdʒuəs/',
            pos: 'adjective',
            tier: 'Tier 2 Academic',
            definition: 'Involving or requiring strenuous effort; difficult and tiring.',
            example: 'They began an arduous trek through the mountain passes.'
        }
    };

    let tooltipEl = null;
    let currentWord = '';

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
                        <button type="button" id="vtt-audio-btn" class="vocab-tooltip-audio-btn" title="Pronounce word" aria-label="Pronounce word">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    <button type="button" id="vtt-close-btn" class="vocab-tooltip-close-btn" aria-label="Close tooltip">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="vocab-tooltip-meta">
                    <span id="vtt-pos" class="vocab-tooltip-pos">noun</span>
                    <span id="vtt-tier" class="vocab-tooltip-tier">Tier 2 Academic</span>
                </div>
                <div id="vtt-definition" class="vocab-tooltip-def">Loading definition...</div>
                <div id="vtt-example" class="vocab-tooltip-example">"Example sentence."</div>
                <div class="vocab-tooltip-footer">
                    <button type="button" id="vtt-add-flashcard-btn" class="vocab-tooltip-action-btn">
                        <i class="fas fa-plus"></i> <span>Add to Study Deck</span>
                    </button>
                </div>
            `;
            document.body.appendChild(tooltipEl);

            // Hook close button
            tooltipEl.querySelector('#vtt-close-btn').addEventListener('click', hideTooltip);

            // Hook audio speech
            tooltipEl.querySelector('#vtt-audio-btn').addEventListener('click', () => {
                if (currentWord && 'speechSynthesis' in window) {
                    window.speechSynthesis.cancel();
                    const u = new SpeechSynthesisUtterance(currentWord);
                    u.rate = 0.9;
                    window.speechSynthesis.speak(u);
                }
            });

            // Hook add to flashcard
            tooltipEl.querySelector('#vtt-add-flashcard-btn').addEventListener('click', addCurrentWordToFlashcards);
        }
        return tooltipEl;
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

        tip.querySelector('#vtt-word').textContent = data.word;
        tip.querySelector('#vtt-phonetic').textContent = data.phonetic || `/${data.word.toLowerCase()}/`;
        tip.querySelector('#vtt-pos').textContent = data.pos || 'vocabulary';
        tip.querySelector('#vtt-tier').textContent = data.tier || 'Academic Vocabulary';
        tip.querySelector('#vtt-definition').textContent = data.definition || 'Definition unavailable.';
        
        const exampleEl = tip.querySelector('#vtt-example');
        if (data.example) {
            exampleEl.style.display = 'block';
            exampleEl.textContent = `"${data.example}"`;
        } else {
            exampleEl.style.display = 'none';
        }

        tip.style.display = 'flex';
        tip.classList.remove('hidden');

        // Position tooltip centered above the selected word
        const tipWidth = 320;
        const tipHeight = tip.offsetHeight || 180;

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
                    pos: found.partOfSpeech || 'vocabulary',
                    tier: 'Curriculum Core',
                    definition: found.definition || found.def,
                    example: found.sentence || found.example || ''
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
                        pos: pos,
                        tier: 'General Vocabulary',
                        definition: def,
                        example: ex
                    });
                } else {
                    showTooltipAt(rect, {
                        word: cleanWord,
                        phonetic: `/${cleanWord}/`,
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
                    pos: 'term',
                    tier: 'Literary Vocabulary',
                    definition: 'Examine this word in context to deepen reading comprehension.',
                    example: ''
                });
            });
    }

    function addCurrentWordToFlashcards() {
        if (!currentWord) return;
        const bookId = (window.BOOK_METADATA && window.BOOK_METADATA.id) ? window.BOOK_METADATA.id : 'default';
        const key = `hl_custom_vocab_${bookId}`;

        let list = [];
        try {
            const raw = localStorage.getItem(key);
            if (raw) list = JSON.parse(raw);
        } catch (e) {}

        const def = tooltipEl ? tooltipEl.querySelector('#vtt-definition').textContent : 'Saved from reader.';
        if (!list.some(v => (v.word || '').toLowerCase() === currentWord.toLowerCase())) {
            list.push({ word: currentWord, definition: def, addedAt: new Date().toISOString() });
            try {
                localStorage.setItem(key, JSON.stringify(list));
            } catch (e) {}
        }

        const btn = tooltipEl.querySelector('#vtt-add-flashcard-btn');
        if (btn) {
            btn.innerHTML = '<i class="fas fa-check"></i> <span>Saved to Flashcards!</span>';
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-plus"></i> <span>Add to Study Deck</span>';
            }, 2000);
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
