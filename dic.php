<?php
$pageTitle = "Lexicon - Dictionary & Thesaurus";
include 'src/header.php';
?>

<!-- Custom Styles for Lexicon specific elements -->
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    .skeleton {
        background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite linear;
    }
    .dark .skeleton {
        background: linear-gradient(90deg, rgba(30, 41, 59, 0.5) 25%, rgba(51, 65, 85, 0.5) 50%, rgba(30, 41, 59, 0.5) 75%);
        background-size: 200% 100%;
    }

    .tab-active { @apply text-primary border-primary; }
    .tab-inactive { @apply text-text-secondary border-transparent hover:text-text-default; }
</style>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12 pb-24 min-h-screen font-outfit">
    
    <!-- Hero / Header Area -->
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-1.5 text-sm font-bold text-primary mb-6 ring-1 ring-inset ring-primary/20 cursor-pointer hover:bg-primary/20 transition-colors" onclick="window.location.reload()">
            <i class="fas fa-book-open"></i> Lexicon
        </div>
        <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-text-default mb-4">
            Dictionary & Thesaurus
        </h1>
        <p class="text-lg text-text-secondary max-w-2xl mx-auto">
            Discover meanings, synonyms, and pronunciation with ease.
        </p>
    </div>

    <!-- Toolbar / Search Area -->
    <div class="max-w-4xl mx-auto mb-8 relative z-10">
        <div class="glass p-2 rounded-full shadow-lg flex items-center justify-between gap-2">
            
            <!-- Quick Actions -->
            <div class="flex items-center pl-2 gap-1">
                <button onclick="getRandomWord()" class="w-10 h-10 flex items-center justify-center rounded-full text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors" title="Random Word">
                    <i class="fas fa-random"></i>
                </button>
                <button onclick="toggleDrawer()" class="w-10 h-10 flex items-center justify-center rounded-full text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors hidden md:flex" title="History & Favorites">
                    <i class="fas fa-history"></i>
                </button>
            </div>

            <!-- Search Input -->
            <div class="relative flex-grow group">
                <input type="text" id="searchInput" placeholder="Search any word..." 
                    class="w-full py-3.5 pl-12 pr-4 rounded-full border-none bg-base-bg text-text-default focus:ring-2 focus:ring-primary transition-all font-medium placeholder-gray-400 text-lg shadow-inner"
                    onkeydown="if(event.key === 'Enter') searchWord()">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors"></i>
            </div>

            <!-- Search Button -->
            <button onclick="searchWord()" 
                class="bg-primary hover:bg-secondary text-white font-bold py-3.5 px-8 rounded-full transition-all active:scale-95 shadow-md whitespace-nowrap hidden sm:block">
                Search
            </button>
            <button onclick="searchWord()" 
                class="bg-primary hover:bg-secondary text-white font-bold w-12 h-12 rounded-full transition-all active:scale-95 shadow-md flex items-center justify-center sm:hidden">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
    
    <div class="max-w-4xl mx-auto">
        <!-- Mode Toggle Tabs -->
        <div class="flex gap-8 border-b border-gray-200 dark:border-gray-800 mb-10 px-4">
            <button id="tab-dictionary" onclick="switchMode('dictionary')" class="pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-primary border-primary">
                Dictionary
            </button>
            <button id="tab-thesaurus" onclick="switchMode('thesaurus')" class="pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-text-secondary border-transparent hover:text-text-default">
                Thesaurus
            </button>
        </div>

        <!-- Skeleton Loader -->
        <div id="skeleton" class="hidden space-y-8 glass p-8 rounded-3xl">
            <div class="flex justify-between items-start">
                <div class="space-y-4 w-1/2">
                    <div class="h-12 w-full skeleton rounded-xl"></div>
                    <div class="h-6 w-2/3 skeleton rounded-lg"></div>
                </div>
                <div class="w-16 h-16 skeleton rounded-2xl"></div>
            </div>
            <div class="h-px bg-gray-200 dark:bg-gray-800 my-6"></div>
            <div class="space-y-4">
                <div class="h-6 w-32 skeleton rounded-md"></div>
                <div class="h-24 w-full skeleton rounded-xl"></div>
                <div class="h-24 w-full skeleton rounded-xl"></div>
            </div>
        </div>

        <!-- Error State -->
        <div id="error-msg" class="hidden animate-in fade-in duration-300">
            <div class="p-12 text-center glass rounded-3xl">
                <div class="w-20 h-20 bg-red-50 dark:bg-red-900/20 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <i class="fas fa-exclamation-triangle text-3xl"></i>
                </div>
                <h3 class="settings-section-title">Word not found</h3>
                <p class="text-text-secondary max-w-md mx-auto">We couldn't find details for the word you're looking for or the search was misspelled.</p>
            </div>
        </div>

        <!-- Result Content -->
        <div id="result-container" class="hidden animate-fade-in-up">
            
            <div class="glass p-8 md:p-10 rounded-3xl shadow-card mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <div class="flex-1 w-full">
                        <div class="flex items-center justify-between gap-4 mb-4">
                            <h2 id="word" class="text-5xl md:text-7xl font-bold text-text-default capitalize tracking-tight font-merriweather"></h2>
                            <div class="flex items-center gap-2">
                                <button id="fav-btn" onclick="toggleFavorite()" class="w-12 h-12 rounded-full bg-base-bg flex items-center justify-center text-gray-400 hover:text-pink-500 hover:bg-pink-50 dark:hover:bg-pink-900/30 transition-all shadow-sm">
                                    <i class="fas fa-heart text-xl"></i>
                                </button>
                                <button onclick="toggleDrawer()" class="w-12 h-12 rounded-full bg-base-bg flex items-center justify-center text-text-secondary transition-all shadow-sm md:hidden">
                                    <i class="fas fa-history text-xl"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Multi-Phonetic Container (Only in Dictionary) -->
                        <div id="phonetic-container" class="flex flex-wrap gap-3 items-center"></div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Section (Dictionary OR Thesaurus View) -->
            <div id="view-content" class="space-y-8"></div>

            <!-- Footer Meta -->
            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 space-y-4 px-4">
                <div id="source-links" class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm">
                    <span class="text-text-secondary font-bold uppercase tracking-widest text-xs">Sources:</span>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Sidebar Drawer (Lexicon Vault) -->
<div id="drawer-overlay" onclick="toggleDrawer()" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[70] hidden opacity-0 transition-opacity duration-300"></div>
<div id="drawer" class="fixed top-0 right-0 h-full w-full sm:w-80 bg-content-bg shadow-2xl z-[80] transform translate-x-full transition-transform duration-300 flex flex-col border-l border-white/20 backdrop-blur-xl">
    <div class="p-6 border-b border-gray-200 dark:border-gray-800 flex justify-between items-center">
        <h2 class="text-xl font-bold text-primary flex items-center gap-2 font-outfit">
            <i class="fas fa-vault"></i> Lexicon Vault
        </h2>
        <button onclick="toggleDrawer()" class="text-text-secondary hover:text-red-500 transition-colors p-2">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto no-scrollbar p-6 space-y-8 font-outfit">
        <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-text-secondary mb-4 flex items-center gap-2">
                <i class="fas fa-heart text-pink-500"></i> Saved Words
            </h3>
            <div id="fav-list" class="space-y-2"></div>
        </div>
        <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-text-secondary mb-4 flex items-center gap-2">
                <i class="fas fa-history text-primary"></i> Recent History
            </h3>
            <div id="history-list" class="space-y-2"></div>
        </div>
    </div>
</div>

<script>
    const apiURL = "https://api.dictionaryapi.dev/api/v2/entries/en/";
    let currentWordData = null;
    let activeMode = 'dictionary'; // 'dictionary' or 'thesaurus'
    let historyList = JSON.parse(localStorage.getItem('lexicon_history') || '[]');
    let favoritesList = JSON.parse(localStorage.getItem('lexicon_favorites') || '[]');

    function switchMode(mode) {
        activeMode = mode;
        const dictBtn = document.getElementById('tab-dictionary');
        const thesBtn = document.getElementById('tab-thesaurus');
        
        if (mode === 'dictionary') {
            dictBtn.className = "pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-primary border-primary";
            thesBtn.className = "pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-text-secondary border-transparent hover:text-text-default";
        } else {
            thesBtn.className = "pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-primary border-primary";
            dictBtn.className = "pb-4 border-b-2 font-bold text-sm uppercase tracking-wider transition-all text-text-secondary border-transparent hover:text-text-default";
        }
        
        if (currentWordData) renderContent();
    }

    function toggleDrawer() {
        const drawer = document.getElementById('drawer');
        const overlay = document.getElementById('drawer-overlay');
        const isOpen = !drawer.classList.contains('translate-x-full');

        if (isOpen) {
            drawer.classList.add('translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
        } else {
            renderDrawerLists();
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                drawer.classList.remove('translate-x-full');
            }, 10);
        }
    }

    async function searchWord(wordToSearch) {
        const input = document.getElementById('searchInput');
        const query = (wordToSearch || input.value).trim().toLowerCase();
        const resultContainer = document.getElementById('result-container');
        const errorMsg = document.getElementById('error-msg');
        const skeleton = document.getElementById('skeleton');

        if (!query) return;
        if (wordToSearch) input.value = wordToSearch;

        resultContainer.classList.add('hidden');
        errorMsg.classList.add('hidden');
        skeleton.classList.remove('hidden');

        try {
            const response = await fetch(apiURL + query);
            if (!response.ok) throw new Error("Not found");
            
            const data = await response.json();
            currentWordData = data[0];
            addToHistory(query);
            renderContent();
            
            // Re-apply a11y specific classes if teacher/focus mode is active
            if(typeof applyA11yClasses === 'function') applyA11yClasses();
        } catch (error) {
            skeleton.classList.add('hidden');
            errorMsg.classList.remove('hidden');
        }
    }

    function renderContent() {
        const skeleton = document.getElementById('skeleton');
        const container = document.getElementById('result-container');
        const wordEl = document.getElementById('word');
        const phoneticContainer = document.getElementById('phonetic-container');
        const favBtn = document.getElementById('fav-btn');
        const viewContent = document.getElementById('view-content');

        wordEl.textContent = currentWordData.word;
        
        const isFav = favoritesList.includes(currentWordData.word.toLowerCase());
        updateFavoriteButtonUI(isFav);

        // Render Mode Specific UI
        if (activeMode === 'dictionary') {
            renderDictionaryView();
            phoneticContainer.classList.remove('hidden');
        } else {
            renderThesaurusView();
            phoneticContainer.classList.add('hidden');
        }

        // Universal Metadata (Sources)
        const sourceContainer = document.getElementById('source-links');
        sourceContainer.innerHTML = `<span class="text-text-secondary font-bold uppercase tracking-widest text-xs">Sources:</span>`;
        (currentWordData.sourceUrls || []).forEach(url => {
            const a = document.createElement('a');
            a.href = url;
            a.target = "_blank";
            a.className = "text-primary hover:text-secondary hover:underline flex items-center gap-1 font-medium";
            a.innerHTML = `Wiktionary <i class="fas fa-external-link-alt text-[10px]"></i>`;
            sourceContainer.appendChild(a);
        });

        skeleton.classList.add('hidden');
        container.classList.remove('hidden');
    }

    function renderDictionaryView() {
        const viewContent = document.getElementById('view-content');
        const phoneticList = document.getElementById('phonetic-container');
        
        phoneticList.innerHTML = "";
        const activePhonetics = currentWordData.phonetics.filter(p => p.text || p.audio);
        
        if(activePhonetics.length === 0 && currentWordData.phonetic) {
            // Fallback for word level phonetic
            activePhonetics.push({ text: currentWordData.phonetic });
        }

        activePhonetics.forEach(p => {
            const chip = document.createElement('div');
            chip.className = "flex items-center gap-3 bg-primary/10 px-4 py-2 rounded-xl border border-primary/20";
            chip.innerHTML = `<span class="text-lg text-primary font-mono font-medium">${p.text || ""}</span>`;
            if (p.audio) {
                const btn = document.createElement('button');
                btn.className = "w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white hover:bg-secondary hover:scale-105 transition-all shadow-sm";
                btn.innerHTML = `<i class="fas fa-volume-up"></i>`;
                btn.onclick = () => new Audio(p.audio).play();
                chip.appendChild(btn);
            }
            phoneticList.appendChild(chip);
        });

        viewContent.innerHTML = currentWordData.meanings.map(m => `
            <div class="glass p-8 rounded-3xl mb-6 relative overflow-hidden">
                <div class="absolute right-0 top-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] pointer-events-none"></div>
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-2xl font-bold font-merriweather italic text-primary">${m.partOfSpeech}</span>
                    <div class="h-px bg-gray-200 dark:bg-gray-800 flex-grow"></div>
                </div>
                <ul class="space-y-6">
                    ${m.definitions.map((d, i) => `
                        <li>
                            <div class="flex gap-4">
                                <div class="w-8 h-8 rounded-full bg-base-bg text-primary flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1 shadow-sm border border-gray-100 dark:border-gray-800">${i + 1}</div>
                                <div class="flex-1">
                                    <p class="text-xl text-text-default leading-relaxed">${d.definition}</p>
                                    ${d.example ? `<div class="mt-3 text-text-secondary italic text-lg bg-base-bg p-4 rounded-xl border-l-4 border-primary/50"><i class="fas fa-quote-left text-primary/30 mr-2"></i>${d.example}</div>` : ''}
                                </div>
                            </div>
                        </li>
                    `).join('')}
                </ul>
            </div>
        `).join('');
    }

    function renderThesaurusView() {
        const viewContent = document.getElementById('view-content');
        
        let primaryDefinition = currentWordData.meanings[0]?.definitions[0]?.definition || "Context not available";

        viewContent.innerHTML = `
            <div class="p-8 rounded-3xl bg-gradient-to-r from-primary to-indigo-600 text-white shadow-xl shadow-primary/20 mb-8 relative overflow-hidden">
                <div class="absolute -right-4 -bottom-4 opacity-10 text-9xl pointer-events-none"><i class="fas fa-network-wired"></i></div>
                <h3 class="text-white/80 uppercase tracking-widest font-bold text-xs mb-3 flex items-center gap-2">
                    <i class="fas fa-info-circle"></i> Word Context
                </h3>
                <p class="text-2xl font-medium leading-relaxed font-merriweather">${primaryDefinition}</p>
            </div>
        `;

        currentWordData.meanings.forEach(m => {
            const totalSynonyms = [...m.synonyms, ...m.definitions.flatMap(d => d.synonyms || [])];
            const totalAntonyms = [...m.antonyms, ...m.definitions.flatMap(d => d.antonyms || [])];

            if (totalSynonyms.length === 0 && totalAntonyms.length === 0) return;

            const section = document.createElement('div');
            section.className = "glass p-8 rounded-3xl mb-6 shadow-sm";
            section.innerHTML = `
                <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-800 pb-4 mb-6">
                    <span class="settings-section-title">${m.partOfSpeech}</span>
                    <span class="px-3 py-1 bg-base-bg rounded-full text-text-secondary text-sm font-bold border border-gray-200 dark:border-gray-700">${totalSynonyms.length} Alternatives</span>
                </div>
                
                ${totalSynonyms.length > 0 ? `
                    <div class="mb-8">
                        <h4 class="text-xs font-bold uppercase tracking-widest text-primary mb-4 flex items-center gap-2"><i class="fas fa-link"></i> Synonyms</h4>
                        <div class="flex flex-wrap gap-2.5">
                            ${Array.from(new Set(totalSynonyms)).map(s => `
                                <button onclick="searchWord('${s}')" class="px-5 py-2.5 rounded-2xl bg-base-bg text-text-default font-semibold hover:bg-primary hover:text-white transition-all hover:-translate-y-1 shadow-sm border border-gray-200 dark:border-gray-700">
                                    ${s}
                                </button>
                            `).join('')}
                        </div>
                    </div>
                ` : ''}

                ${totalAntonyms.length > 0 ? `
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest text-pink-500 mb-4 flex items-center gap-2"><i class="fas fa-unlink"></i> Antonyms (Opposites)</h4>
                        <div class="flex flex-wrap gap-2.5">
                            ${Array.from(new Set(totalAntonyms)).map(a => `
                                <button onclick="searchWord('${a}')" class="px-5 py-2.5 rounded-2xl bg-base-bg text-text-default font-semibold hover:bg-pink-500 hover:text-white transition-all hover:-translate-y-1 shadow-sm border border-gray-200 dark:border-gray-700">
                                    ${a}
                                </button>
                            `).join('')}
                        </div>
                    </div>
                ` : ''}
            `;
            viewContent.appendChild(section);
        });

        // If no thesaurus data found
        if (viewContent.children.length <= 1) {
            viewContent.innerHTML += `
                <div class="text-center py-20 px-4 glass rounded-3xl mt-8">
                    <div class="w-20 h-20 bg-base-bg text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-search-minus text-3xl"></i>
                    </div>
                    <p class="settings-section-title">No specialized entries</p>
                    <p class="text-text-secondary max-w-sm mx-auto">We couldn't find thesaurus data for this specific word. Try searching for a base word or common adjective.</p>
                </div>
            `;
        }
    }

    // Feature Logic
    function addToHistory(word) {
        historyList = historyList.filter(w => w !== word);
        historyList.unshift(word);
        historyList = historyList.slice(0, 15); // Keep last 15
        localStorage.setItem('lexicon_history', JSON.stringify(historyList));
        renderDrawerLists();
    }

    function toggleFavorite() {
        if (!currentWordData) return;
        const word = currentWordData.word.toLowerCase();
        const index = favoritesList.indexOf(word);

        if (index > -1) {
            favoritesList.splice(index, 1);
            updateFavoriteButtonUI(false);
        } else {
            favoritesList.unshift(word);
            updateFavoriteButtonUI(true);
        }
        localStorage.setItem('lexicon_favorites', JSON.stringify(favoritesList));
        renderDrawerLists();
    }
    
    function updateFavoriteButtonUI(isFav) {
        const btn = document.getElementById('fav-btn');
        if (!btn) return;
        
        if (isFav) {
            btn.classList.add('text-pink-500', 'bg-pink-50', 'dark:bg-pink-900/30');
            btn.classList.remove('text-gray-400', 'bg-base-bg');
            btn.innerHTML = '<i class="fas fa-heart text-xl"></i>';
        } else {
            btn.classList.remove('text-pink-500', 'bg-pink-50', 'dark:bg-pink-900/30');
            btn.classList.add('text-gray-400', 'bg-base-bg');
            btn.innerHTML = '<i class="far fa-heart text-xl"></i>';
        }
    }

    function renderDrawerLists() {
        const histList = document.getElementById('history-list');
        const favList = document.getElementById('fav-list');

        histList.innerHTML = historyList.length ? historyList.map(w => `
            <button onclick="searchWord('${w}'); toggleDrawer();" class="w-full text-left px-5 py-3.5 rounded-2xl hover:bg-base-bg transition-all flex justify-between items-center group font-medium text-text-default border border-transparent hover:border-gray-200 dark:hover:border-gray-800">
                <span class="capitalize">${w}</span>
                <i class="fas fa-arrow-right text-gray-300 group-hover:text-primary transition-colors transform group-hover:translate-x-1"></i>
            </button>
        `).join('') : '<p class="text-text-secondary text-sm italic px-5 py-2">Nothing searched yet.</p>';

        favList.innerHTML = favoritesList.length ? favoritesList.map(w => `
            <div class="flex items-center gap-2 group">
                <button onclick="searchWord('${w}'); toggleDrawer();" class="flex-1 text-left px-5 py-3.5 rounded-2xl hover:bg-base-bg transition-all capitalize font-medium text-text-default border border-transparent hover:border-gray-200 dark:hover:border-gray-800">
                    ${w}
                </button>
                <button onclick="removeFavorite('${w}')" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-400 hover:text-pink-500 hover:bg-pink-50 dark:hover:bg-pink-900/30 opacity-80 hover:opacity-100 transition-all bg-base-bg" title="Remove">
                    <i class="fas fa-trash-alt text-sm"></i>
                </button>
            </div>
        `).join('') : '<p class="text-text-secondary text-sm italic px-5 py-2">No words saved.</p>';
    }

    function removeFavorite(word) {
        favoritesList = favoritesList.filter(w => w !== word);
        localStorage.setItem('lexicon_favorites', JSON.stringify(favoritesList));
        if (currentWordData && currentWordData.word.toLowerCase() === word) {
            updateFavoriteButtonUI(false);
        }
        renderDrawerLists();
    }

    async function getRandomWord() {
        const words = ["eloquence", "nefarious", "magnanimous", "fastidious", "ephemeral", "petrichor", "ethereal", "melancholy", "sonorous", "solitude", "vibrant", "wanderlust", "nexus", "ubiquitous", "liminal", "quintessential", "serendipity", "luminescent"];
        searchWord(words[Math.floor(Math.random() * words.length)]);
    }

    window.onload = () => {
        const urlParams = new URLSearchParams(window.location.search);
        const wordParam = urlParams.get('w');
        if (wordParam) searchWord(wordParam);
        else getRandomWord();
    }
</script>

<?php include 'src/footer.php'; ?>

