<?php 
$pageTitle = "Open Access Journal";
include 'src/header.php'; 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/umd/lucide.min.js"></script>

<style>
    .paper-texture {
        background-color: #ffffff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* PRINT STYLES */
    @media print {
        #reader-view {
            position: static;
            background: white;
            width: 100%;
            height: auto;
            overflow: visible;
        }

        #reader-view>div {
            padding: 0;
        }

        #reader-view .bg-white {
            box-shadow: none;
            max-width: 100%;
        }

        .prose {
            max-width: 100%;
            font-size: 12pt;
            line-height: 1.5;
        }

        #article-content {
            margin: 0;
            padding: 2cm;
        }

        /* Ensure article is visible if hidden */
        #reader-view {
            display: block !important;
        }

        #main-view {
            display: none;
        }
    }
</style>

<!-- NEW HERO SECTION -->
    <div
        class="page-hero">
        <!-- Animated Background Elements -->
        <div class="page-hero-bg">
            <i class="fas fa-globe-americas absolute top-10 right-10 text-[10rem] text-white animate-spin-slow"
                style="animation-duration: 60s;"></i>
            <i class="fas fa-book absolute bottom-10 left-10 text-8xl text-sky-200"></i>
            <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-white/20 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <span
                class="inline-block py-2 px-4 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md shadow-lg">
                Open Access Repository
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight drop-shadow-lg font-serif">
                Journal of <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-indigo-100">Applied
                    Sciences</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-50 mb-10 font-light max-w-3xl mx-auto leading-relaxed">
                Free, immediate access to peer-reviewed research for students, educators, and the curious mind.
            </p>

            <!-- Quick Search in Hero -->
            <div class="max-w-2xl mx-auto relative group">
                <input type="text" id="heroSearchInput"
                    class="w-full py-4 pl-12 pr-4 rounded-full border-none shadow-xl bg-white/90 focus:bg-white text-gray-800 placeholder-gray-500 focus:ring-4 focus:ring-sky-300 transition-all text-lg"
                    placeholder="Search for articles, authors, or DOI..."
                    oninput="app.handleSearch(this.value); document.getElementById('searchInput').value = this.value; document.getElementById('main-view').scrollIntoView({behavior: 'smooth'})">
                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div id="main-view"
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 transition-opacity duration-300 min-h-screen">

        <!-- Controls Bar -->
        <div
            class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-2 w-full md:w-auto">
                <h2 class="text-lg font-bold text-text-default whitespace-nowrap mr-2">Filters:</h2>
                <div id="topic-filters" class="flex flex-wrap gap-2">
                    <!-- Populated by JS -->
                </div>
            </div>

            <div class="flex items-center gap-4 w-full md:w-auto">
                <div class="relative w-full md:w-64 hidden md:block">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400"></i>
                    <input type="text" id="searchInput" placeholder="Refine search..."
                        class="w-full pl-9 pr-4 py-2 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                        oninput="app.handleSearch(this.value)">
                </div>
                <select id="sortFilter" onchange="app.handleSort(this.value)"
                    class="px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-primary text-sm font-medium text-text-default cursor-pointer">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="alpha">Alphabetical</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Main Feed -->
            <main class="lg:col-span-3">
                <div class="flex justify-between items-end mb-6">
                    <h2 class="settings-section-title"> Latest Publications</h2>
                    <span id="result-count"
                        class="text-sm font-medium text-text-secondary bg-white px-3 py-1 rounded-full shadow-sm border">Loading...</span>
                </div>

                <div id="article-list" class="space-y-6">
                    <!-- Articles injected here -->
                </div>
            </main>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <!-- Call for Papers -->
                <div
                    class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="font-bold text-lg mb-2"><i class="fas fa-pen-fancy mr-2"></i>Call for Papers</h3>
                        <p class="text-sm text-indigo-100 mb-4 opacity-90">
                            Volume 14: Special Issue on <span class="font-bold text-white">AI in Healthcare</span>.
                        </p>
                        <button
                            class="bg-white text-indigo-700 px-4 py-2 rounded-lg text-sm font-bold shadow hover:bg-indigo-50 transition-colors w-full">View
                            Guidelines</button>
                    </div>
                    <i class="fas fa-file-alt absolute -bottom-4 -right-4 text-8xl text-white/5 rotate-12"></i>
                </div>

                <!-- Info Box -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-text-default mb-4 text-sm uppercase tracking-wider">About OA</h3>
                    <p class="text-sm text-text-secondary leading-relaxed mb-4">
                        This repository is dedicated to the dissemination of scientific knowledge. All articles are free
                        to read, download, and share.
                    </p>
                    <div
                        class="flex items-center gap-2 text-xs text-green-600 font-bold bg-green-50 px-3 py-2 rounded-lg">
                        <i class="fas fa-check-circle"></i> Peer Reviewed
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- READER VIEW (Glassmorphic Overlay) -->
    <div id="reader-view"
        class="hidden fixed inset-0 z-[60] overflow-y-auto bg-gray-900/50 backdrop-blur-sm animate-in fade-in duration-200">
        <div class="min-h-screen flex items-center justify-center p-4 md:p-8">
            <div class="bg-white w-full max-w-5xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

                <!-- Toolbar -->
                <div
                    class="bg-white border-b border-gray-100 p-4 flex justify-between items-center z-10 shadow-sm sticky top-0 print:hidden">
                    <button onclick="app.closeReader()"
                        class="flex items-center text-text-secondary hover:text-primary font-bold px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                        <i data-lucide="arrow-left" class="h-5 w-5 mr-2"></i> Back
                    </button>
                    <div class="flex space-x-2">
                        <!-- Share Dropdown -->
                        <div class="relative group">
                            <button
                                class="p-2 text-text-secondary hover:text-primary hover:bg-gray-50 rounded-lg transition-colors"
                                title="Share">
                                <i data-lucide="share-2" class="h-5 w-5"></i>
                            </button>
                            <div
                                class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 hidden group-hover:block z-50 p-2">
                                <button onclick="app.shareArticle('twitter')"
                                    class="w-full flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary rounded-lg">
                                    <i class="fab fa-twitter"></i> Twitter
                                </button>
                                <button onclick="app.shareArticle('linkedin')"
                                    class="w-full flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary rounded-lg">
                                    <i class="fab fa-linkedin"></i> LinkedIn
                                </button>
                                <button onclick="app.shareArticle('email')"
                                    class="w-full flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary rounded-lg">
                                    <i class="fas fa-envelope"></i> Email
                                </button>
                            </div>
                        </div>

                        <button onclick="window.print()"
                            class="p-2 text-text-secondary hover:text-primary hover:bg-gray-50 rounded-lg transition-colors"
                            title="Download PDF">
                            <i data-lucide="printer" class="h-5 w-5"></i>
                        </button>
                        <button onclick="app.citeArticle()"
                            class="p-2 text-text-secondary hover:text-primary hover:bg-gray-50 rounded-lg transition-colors"
                            title="Cite">
                            <i data-lucide="quote" class="h-5 w-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Scrollable Content -->
                <div class="overflow-y-auto p-8 md:p-16 bg-[#fcfbf9]"> <!-- Slight paper tint -->
                    <div id="article-content" class="max-w-3xl mx-auto">
                        <!-- Injected Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<!-- CITATION MODAL -->
    <div id="citation-modal"
        class="hidden fixed inset-0 z-[80] bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-md w-full animate-in zoom-in duration-200">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Cite Article</h3>
            <div class="space-y-3">
                <button onclick="app.copyCitation()"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-primary transition-colors text-left group">
                    <span class="font-bold text-gray-700 group-hover:text-primary">APA Style (Copy)</span>
                    <i class="fas fa-copy text-gray-400 group-hover:text-primary"></i>
                </button>
                <button onclick="app.downloadCitation('bib')"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-primary transition-colors text-left group">
                    <span class="font-bold text-gray-700 group-hover:text-primary">BibTeX (.bib)</span>
                    <i class="fas fa-download text-gray-400 group-hover:text-primary"></i>
                </button>
                <button onclick="app.downloadCitation('ris')"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-primary transition-colors text-left group">
                    <span class="font-bold text-gray-700 group-hover:text-primary">RIS (.ris)</span>
                    <i class="fas fa-download text-gray-400 group-hover:text-primary"></i>
                </button>
            </div>
            <button onclick="app.closeCitation()"
                class="mt-6 w-full py-2 text-sm font-bold text-gray-500 hover:text-gray-900">Close</button>
        </div>
    </div>

    
<script>
        // --- DATA ---
        const journalDatabase = [
            {
                id: "10.1038/s41586-023-0001",
                title: "Quantum Entanglement in Macroscopic Biological Systems",
                authors: ["Dr. Sarah J. Connor", "Dr. Miles Dyson"],
                date: "2023-10-15",
                volume: 12,
                issue: 4,
                category: "Physics",
                tags: ["Quantum", "Biology"],
                doi: "10.1038/s41586-023-0001",
                abstract: "This paper explores the theoretical possibility of quantum entanglement existing within the microtubule structures of avian navigational centers.",
                fullText: `
                    <h2 class="text-2xl font-bold font-serif mb-4 mt-8 text-gray-800">1. Introduction</h2>
                    <p class="mb-4 leading-relaxed text-lg text-gray-700">The intersection of quantum mechanics and biology has long been a subject of intense debate. While quantum effects are indisputable at the atomic scale, their relevance to macroscopic biological function has often been dismissed due to the warm, wet, and noisy environment of living systems.</p>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 my-8 italic text-gray-700 text-lg font-serif">
                        "The results indicate a coherence time of approximately 100 microseconds, significantly longer than previously predicted."
                    </div>
                `
            },
            {
                id: "10.1038/cs.2024.552",
                title: "Algorithmic Bias in Large Language Model Reasoning Chains",
                authors: ["A. Turing", "A. Lovelace"],
                date: "2024-01-20",
                volume: 13,
                issue: 1,
                category: "Computer Science",
                tags: ["AI", "Ethics"],
                doi: "10.1038/cs.2024.552",
                abstract: "As Large Language Models (LLMs) become integral to decision-making processes, understanding their internal reasoning chains is crucial.",
                fullText: `
                    <h2 class="text-2xl font-bold font-serif mb-4 mt-8 text-gray-800">Abstract</h2>
                    <p class="mb-4 leading-relaxed text-lg text-gray-700">We demonstrate that while surface-level outputs of LLMs are increasingly aligned with human values, the intermediate reasoning steps often rely on heuristic shortcuts.</p>
                `
            },
            {
                id: "10.1038/bio.2023.889",
                title: "CRISPR-Cas9 Off-Target Effects in Non-Coding RNA Regions",
                authors: ["J. Doudna", "E. Charpentier"],
                date: "2023-11-05",
                volume: 12,
                issue: 5,
                category: "Biology",
                tags: ["Genetics"],
                doi: "10.1038/bio.2023.889",
                abstract: "Genome editing precision is paramount for therapeutic applications. We report unexpected indel formations in non-coding RNA regions.",
                fullText: `
                    <h2 class="text-2xl font-bold font-serif mb-4 mt-8 text-gray-800">Introduction</h2>
                    <p class="mb-4 leading-relaxed text-lg text-gray-700">The specificity of the CRISPR-Cas9 system is determined by the 20-nucleotide guide RNA sequence.</p>
                `
            },
            {
                id: "10.1038/env.2023.112",
                title: "Microplastic Accumulation in Deep Sea Trenches: A 10-Year Survey",
                authors: ["S. Earle", "J. Cousteau"],
                date: "2023-08-12",
                volume: 12,
                issue: 3,
                category: "Environmental",
                tags: ["Oceanography", "Pollution"],
                doi: "10.1038/env.2023.112",
                abstract: "Sediment samples from the Mariana Trench reveal a disturbing exponential increase in microplastic deposition.",
                fullText: `
                    <h2 class="text-2xl font-bold font-serif mb-4 mt-8">Methodology</h2>
                    <p class="mb-4 leading-relaxed text-lg">We utilized deep-sea submersibles to collect core samples at depths exceeding 10,000 meters.</p>
                `
            }
        ];

        // --- APP LOGIC ---
        const app = {
            state: {
                articles: journalDatabase,
                filterTopic: 'All',
                searchQuery: '',
                currentArticle: null
            },

            init() {
                this.renderTopics();
                this.renderArticles();
                lucide.createIcons();
                
                // Deep Linking
                const params = new URLSearchParams(window.location.search);
                const articleId = params.get('id');
                if (articleId) {
                    const article = this.state.articles.find(a => a.id === articleId);
                    if (article) {
                        this.openReader(articleId);
                    }
                }
            },

            renderArticles() {
                const listContainer = document.getElementById('article-list');
                const countSpan = document.getElementById('result-count');

                let filtered = this.state.articles.filter(article => {
                    // Fuzzy topic match (e.g. Environmental vs Environmental Science)
                    const matchesTopic = this.state.filterTopic === 'All' || article.category.includes(this.state.filterTopic);
                    const matchesSearch = article.title.toLowerCase().includes(this.state.searchQuery.toLowerCase()) ||
                        article.abstract.toLowerCase().includes(this.state.searchQuery.toLowerCase()) ||
                        article.authors.some(a => a.toLowerCase().includes(this.state.searchQuery.toLowerCase()));
                    return matchesTopic && matchesSearch;
                });

                countSpan.textContent = `${filtered.length} Publication${filtered.length !== 1 ? 's' : ''}`;

                if (filtered.length === 0) {
                    listContainer.innerHTML = `
                        <div class="text-center py-12 rounded-2xl bg-white border border-dashed border-gray-300">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                                <i class="fas fa-search text-2xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium">No matches found.</p>
                            <button onclick="app.resetFilters()" class="text-primary font-bold mt-2 hover:underline">Clear Filters</button>
                        </div>
                    `;
                    return;
                }

                listContainer.innerHTML = filtered.map(article => `
                    <article class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- Date Badge -->
                            <div class="shrink-0">
                                <div class="w-16 h-16 bg-gray-50 rounded-2xl flex flex-col items-center justify-center text-center border border-gray-100 group-hover:bg-primary/5 group-hover:border-primary/20 transition-colors">
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">${new Date(article.date).toLocaleString('default', { month: 'short' })}</span>
                                    <span class="text-2xl font-bold text-gray-800 group-hover:text-primary transition-colors">${new Date(article.date).getDate()}</span>
                                </div>
                            </div>

                            <div class="flex-grow">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider">${article.category}</span>
                                    ${article.tags.slice(0, 2).map(t => `<span class="text-xs text-gray-400">#${t}</span>`).join('')}
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 font-serif mb-2 group-hover:text-primary transition-colors cursor-pointer" onclick="app.openReader('${article.id}')">
                                    ${article.title}
                                </h3>
                                <p class="text-gray-500 text-sm mb-4">by ${article.authors[0]} et al.</p>
                                <p class="text-gray-600 leading-relaxed line-clamp-2 mb-6 font-light">
                                    ${article.abstract}
                                </p>

                                <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                                    <span class="text-xs text-gray-400 font-mono">DOI: ${article.doi}</span>
                                    <button onclick="app.openReader('${article.id}')" class="flex items-center text-sm font-bold text-primary group-hover:translate-x-2 transition-all">
                                        Read Full Text <i data-lucide="arrow-right" class="h-4 w-4 ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                `).join('');

                lucide.createIcons();
            },

            renderTopics() {
                // Generate topics dynamically from the database
                const topicsSet = new Set(['All']);
                this.state.articles.forEach(a => topicsSet.add(a.category));
                const topics = Array.from(topicsSet);
                const container = document.getElementById('topic-filters');

                container.innerHTML = topics.map(topic => `
                    <button 
                        onclick="app.handleTopicChange('${topic}')"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all border ${this.state.filterTopic === topic
                        ? 'bg-primary text-white border-primary shadow-md'
                        : 'bg-white text-gray-600 border-gray-200 hover:border-gray-300 hover:bg-gray-50'
                    }">
                        ${topic}
                    </button>
                `).join('');
            },

            handleSearch(val) {
                this.state.searchQuery = val;
                this.renderArticles();
            },

            handleSort(val) {
                if (val === 'newest') this.state.articles.sort((a, b) => new Date(b.date) - new Date(a.date));
                else if (val === 'oldest') this.state.articles.sort((a, b) => new Date(a.date) - new Date(b.date));
                else if (val === 'alpha') this.state.articles.sort((a, b) => a.title.localeCompare(b.title));
                this.renderArticles();
            },

            handleTopicChange(topic) {
                this.state.filterTopic = topic;
                this.renderTopics(); // Re-render to update active state
                this.renderArticles();
            },

            resetFilters() {
                this.state.searchQuery = '';
                this.state.filterTopic = 'All';
                document.getElementById('searchInput').value = '';
                document.getElementById('heroSearchInput').value = '';
                this.renderTopics();
                this.renderArticles();
            },

            openReader(id) {
                const article = this.state.articles.find(a => a.id === id);
                this.state.currentArticle = article;
                document.getElementById('article-content').innerHTML = `
                    <div class="text-center border-b border-gray-200 pb-10 mb-10">
                         <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-6">${article.category}</span>
                        <h1 class="text-3xl md:text-5xl font-bold font-serif text-gray-900 mb-6 leading-tight">${article.title}</h1>
                        <p class="text-xl text-gray-500 font-serif italic mb-2">${article.authors.join(", ")}</p>
                        <p class="text-sm text-gray-400">Vol ${article.volume}, Issue ${article.issue} &bull; ${article.date}</p>
                    </div>
                    <div class="prose prose-lg prose-indigo mx-auto text-gray-700 font-serif">
                        <div class="font-sans bg-gray-50 p-6 rounded-xl border border-gray-200 mb-8 not-prose">
                            <h3 class="font-bold text-gray-900 text-sm uppercase mb-3 tracking-wide">Abstract</h3>
                            <p class="text-base leading-relaxed">${article.abstract}</p>
                        </div>
                        ${article.fullText}
                    </div>
                `;
                document.getElementById('reader-view').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                lucide.createIcons();
                
                // Update URL for sharing
                const newUrl = window.location.pathname + '?id=' + encodeURIComponent(id);
                window.history.pushState({id: id}, '', newUrl);
            },

            closeReader() {
                document.getElementById('reader-view').classList.add('hidden');
                document.body.style.overflow = '';
                
                // Revert URL
                window.history.pushState({}, '', window.location.pathname);
            },

            citeArticle() {
                // Open Citation Modal
                document.getElementById('citation-modal').classList.remove('hidden');
            },

            closeCitation() {
                document.getElementById('citation-modal').classList.add('hidden');
            },

            downloadCitation(format) {
                if (!this.state.currentArticle) return;
                const a = this.state.currentArticle;
                let content = '';
                let filename = `citation-${a.id}.${format}`;
                let type = 'text/plain';

                if (format === 'bib') {
                    content = `@article{${a.id},
  title={${a.title}},
  author={${a.authors.join(' and ')}},
  journal={Journal of Applied Sciences},
  volume={${a.volume}},
  number={${a.issue}},
  year={${a.date.split('-')[0]}},
  publisher={Hesten's Learning}
}`;
                } else if (format === 'ris') {
                    content = `TY  - JOUR
TI  - ${a.title}
AU  - ${a.authors.join('\nAU  - ')}
JO  - Journal of Applied Sciences
VL  - ${a.volume}
IS  - ${a.issue}
PY  - ${a.date.split('-')[0]}
PB  - Hesten's Learning
ER  -`;
                }

                const blob = new Blob([content], { type: type });
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = filename;
                link.click();
                URL.revokeObjectURL(url);
                this.closeCitation();
                this.showToast(`Downloaded ${format.toUpperCase()} citation`);
            },

            copyCitation() {
                if (!this.state.currentArticle) return;
                const a = this.state.currentArticle;
                const text = `${a.authors[0]} et al. (${a.date.split('-')[0]}). "${a.title}". Journal of Applied Sciences, ${a.volume}(${a.issue}). doi:${a.doi}`;
                navigator.clipboard.writeText(text).then(() => {
                    this.showToast("APA Citation copied to clipboard!");
                    this.closeCitation();
                });
            },

            shareArticle(platform) {
                if (!this.state.currentArticle) return;
                const a = this.state.currentArticle;
                const url = window.location.origin + window.location.pathname + '?id=' + encodeURIComponent(a.id);
                const text = `Check out "${a.title}" on Hesten's Learning!`;

                let shareUrl = '';
                if (platform === 'twitter') {
                    shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                } else if (platform === 'linkedin') {
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                } else if (platform === 'email') {
                    shareUrl = `mailto:?subject=${encodeURIComponent(a.title)}&body=${encodeURIComponent(text + '\n' + url)}`;
                    window.location.href = shareUrl;
                    return;
                }

                if (shareUrl) window.open(shareUrl, '_blank', 'width=600,height=400');
            },

            showToast(msg) {
                if (window.showMessageBox) {
                    window.showMessageBox(msg);
                } else {
                    alert(msg);
                }
            }
        };

        document.addEventListener('DOMContentLoaded', () => app.init());

        // FontAwesome Animation
        setInterval(() => {
            const icons = document.querySelectorAll('.animate-spin-slow');
            icons.forEach(i => {
                i.style.transform = `rotate(${Date.now() / 50}deg)`;
            });
        }, 50);
    </script>

<?php include 'src/footer.php'; ?>
