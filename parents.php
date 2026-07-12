<?php
// FILE: parents.php
// DESCRIPTION: This PHP file serves as a resource hub (wiki) for parents.
// It features a modern, fresh design with interactive elements.

// --- Page-Specific Variables for Header ---
$pageTitle       = 'Parents Hub - Hesten\'s Learning';
$pageDescription = 'Parent resource hub. Find guides, tracking tools, and interactive homeschool law maps.';
$pageKeywords    = 'parents, wiki, resource, homeschool, learning support, laws';
$pageAuthor      = 'Hesten\'s Learning';

// --- Include Header Template ---
include 'src/header.php';
?>

<!-- 
  FRESH STYLES & ANIMATIONS
-->
<style>
    html {
        scroll-behavior: smooth;
    }

    /* Hide scrollbar for clean look in specific areas */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Glassmorphism Utilities */
    .glass-panel {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .dark .glass-panel {
        background: rgba(31, 41, 55, 0.7);
        /* dark:bg-gray-800 with opacity */
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Gradient Text */
    .text-gradient {
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-image: linear-gradient(to right, #4F46E5, #9333EA, #DB2777);
    }

    .dark .text-gradient {
        background-image: linear-gradient(to right, #818CF8, #C084FC, #F472B6);
    }

    /* Card Hover Lift */
    .hover-lift {
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.15);
    }
</style>

<!-- 
  HERO SECTION 
  Matches Footer Theme but fresher/lighter feel 
-->
<!-- HERO SECTION -->
<div
    class="page-hero">
    <!-- Abstract Background Shapes -->
    <div class="page-hero-bg">
        <i class="fas fa-users absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
        <i class="fas fa-heart absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10 text-center">
        <span
            class="page-hero-badge">
            Parent Resource Center
        </span>
        <h1 class="page-hero-title">
            Support Your Child's Learning Journey
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Everything you need to guide their education. From state laws to wellness tips, we've curated the best tools
            for you.
        </p>
    </div>
</div>

<div class="container mx-auto px-4 sm:px-6 relative z-20 pb-20">
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- LEFT SIDEBAR (Navigation) -->
        <aside class="w-full lg:w-1/4 lg:sticky lg:top-24 self-start space-y-6">

            <!-- Nav Menu -->
            <div class="glass-panel rounded-2xl shadow-xl overflow-hidden p-6">
                <nav aria-label="Quick Navigation">
                    <ul class="space-y-2">
                        <li>
                            <a href="#resources"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/20 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-all group font-medium">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-book-open text-sm"></i>
                                </span>
                                Resources
                            </a>
                        </li>
                        <li>
                            <a href="#tools"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 dark:hover:bg-purple-900/20 text-slate-600 dark:text-slate-300 hover:text-purple-600 dark:hover:text-purple-400 transition-all group font-medium">
                                <span
                                    class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center text-purple-500 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-toolbox text-sm"></i>
                                </span>
                                Tools
                            </a>
                        </li>
                        <li>
                            <a href="#laws"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-teal-50 dark:hover:bg-teal-900/20 text-slate-600 dark:text-slate-300 hover:text-teal-600 dark:hover:text-teal-400 transition-all group font-medium">
                                <span
                                    class="w-8 h-8 rounded-lg bg-teal-100 dark:bg-teal-900/50 flex items-center justify-center text-teal-500 group-hover:bg-teal-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-map-marked-alt text-sm"></i>
                                </span>
                                State Laws
                            </a>
                        </li>
                        <li>
                            <a href="#feedback"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-rose-50 dark:hover:bg-rose-900/20 text-slate-600 dark:text-slate-300 hover:text-rose-600 dark:hover:text-rose-400 transition-all group font-medium">
                                <span
                                    class="w-8 h-8 rounded-lg bg-rose-100 dark:bg-rose-900/50 flex items-center justify-center text-rose-500 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-heart text-sm"></i>
                                </span>
                                Feedback
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Help Card -->
            <div
                class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/20 rounded-full blur-2xl"></div>
                <i class="fas fa-headset text-4xl mb-3 opacity-90"></i>
                <h3 class="font-bold text-lg">Need Support?</h3>
                <p class="text-indigo-100 text-sm mb-4">Our education specialists are here to help you.</p>
                <a href="#contact"
                    class="inline-block w-full bg-white text-indigo-600 font-bold py-2 rounded-lg hover:bg-indigo-50 transition-colors shadow-sm">
                    Contact Us
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="w-full lg:w-3/4 space-y-12">

            <!-- Resources Section -->
            <section id="resources" class="scroll-mt-28">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Curated Resources</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Card 1 -->
                    <a href="https://example.com/parent-guide.pdf" target="_blank"
                        class="glass-panel p-6 rounded-2xl shadow-sm hover-lift flex items-start gap-4 group">
                        <div
                            class="p-3.5 bg-red-100 dark:bg-red-900/30 text-red-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-file-pdf text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 dark:text-white text-lg">Parent Guide</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">The complete handbook for our
                                curriculum.</p>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="#" class="glass-panel p-6 rounded-2xl shadow-sm hover-lift flex items-start gap-4 group">
                        <div
                            class="p-3.5 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 dark:text-white text-lg">Learning Hacks</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Smart strategies for home
                                education.</p>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="#" class="glass-panel p-6 rounded-2xl shadow-sm hover-lift flex items-start gap-4 group">
                        <div
                            class="p-3.5 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 dark:text-white text-lg">Digital Safety</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Protecting your child in the
                                digital age.</p>
                        </div>
                    </a>

                    <!-- Card 4 -->
                    <a href="#" class="glass-panel p-6 rounded-2xl shadow-sm hover-lift flex items-start gap-4 group">
                        <div
                            class="p-3.5 bg-pink-100 dark:bg-pink-900/30 text-pink-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-brain text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 dark:text-white text-lg">Wellness</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Mental health resources for
                                students.</p>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Tools Section (Bento Style) -->
            <section id="tools" class="scroll-mt-28">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Essential Tools</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Featured Tool (Spans 2 cols on desktop) -->
                    <div
                        class="md:col-span-2 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden group">
                        <div
                            class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 transition-transform group-hover:scale-110">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                                <i class="fas fa-star"></i> Most Used
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Progress Dashboard</h3>
                            <p class="text-blue-100 mb-6 max-w-sm">Track grades, attendance, and learning milestones in
                                real-time.</p>
                            <a href="#"
                                class="inline-flex items-center gap-2 bg-white text-blue-600 px-5 py-2.5 rounded-lg font-bold hover:bg-blue-50 transition-colors">
                                Launch Dashboard <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Vertical Tool -->
                    <a href="#"
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500 transition-colors group flex flex-col justify-center items-center text-center">
                        <div
                            class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-calendar-alt text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 dark:text-white">Scheduler</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Plan the week</p>
                    </a>
                </div>
            </section>

            <!-- Interactive Laws Map -->
            <section id="laws" class="scroll-mt-28">
                <div class="glass-panel rounded-3xl p-1 shadow-lg border-0 bg-white/50 dark:bg-gray-800/50">
                    <div class="bg-white dark:bg-gray-900 rounded-[20px] p-6 sm:p-8">
                        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800 dark:text-white flex items-center gap-2">
                                    <i class="fas fa-gavel text-teal-500"></i> Homeschool Laws
                                </h2>
                                <p class="text-slate-500 dark:text-slate-400 mt-1">Select a state to view HSLDA legal
                                    requirements.</p>
                            </div>

                            <!-- Modern Search Bar -->
                            <div class="relative w-full md:w-72">
                                <input type="text" id="stateSearch" placeholder="Find state..."
                                    class="w-full pl-12 pr-4 py-3 rounded-full bg-slate-100 dark:bg-gray-800 border-none focus:ring-2 focus:ring-teal-500 text-slate-800 dark:text-white shadow-inner transition-all">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </div>

                        <!-- States Grid (Chips Style) -->
                        <div id="stateGrid"
                            class="flex flex-wrap gap-2 max-h-[400px] overflow-y-auto no-scrollbar pr-2">
                            <!-- Populated by JS -->
                        </div>

                        <div id="no-states-msg" class="hidden py-12 text-center text-slate-400">
                            <i class="fas fa-search-location text-4xl mb-3 opacity-30"></i>
                            <p>No states found.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feedback -->
            <section id="feedback" class="scroll-mt-28">
                <div
                    class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 sm:p-10 text-white shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -mr-16 -mt-16">
                    </div>

                    <div class="relative z-10 grid md:grid-cols-5 gap-8">
                        <div class="md:col-span-2">
                            <h2 class="text-2xl font-bold mb-4">We're Listening</h2>
                            <p class="text-slate-300 mb-6 leading-relaxed">Your feedback shapes our platform. Let us
                                know how we can make your homeschooling journey easier.</p>
                            <div class="flex items-center gap-3 text-sm text-slate-400">
                                <i class="fas fa-check-circle text-green-400"></i>
                                <span>Read by real humans</span>
                            </div>
                        </div>

                        <form id="feedbackForm" action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56"
                            method="POST" target="_blank" class="md:col-span-3 space-y-4">
                            <input type="hidden" name="_next" value="https://hestena62.com/thanks.html">
                            <input type="text" name="honey_check" style="display:none">

                            <input type="email" id="email" name="email" required placeholder="Your Email"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/10 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition-all">

                            <textarea id="feedbackText" name="feedback" rows="3" placeholder="What's on your mind?"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/10 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition-all resize-none"></textarea>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-blue-600/30 transform hover:-translate-y-0.5 transition-all">
                                Send Feedback
                            </button>
                        </form>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- Simple Footer Strip -->
<div id="contact" class="bg-slate-50 dark:bg-gray-800 border-t border-slate-200 dark:border-slate-700 py-12">
    <div class="container mx-auto px-6 text-center">
        <p class="text-slate-500 dark:text-slate-400 uppercase tracking-widest text-xs font-bold mb-4">Direct Support
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-8">
            <a href="mailto:support@hestenslearning.com"
                class="text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium flex items-center gap-2 transition-colors">
                <i class="fas fa-envelope"></i> support@hestenslearning.com
            </a>
            <span class="hidden sm:block text-slate-300">|</span>
            <span class="text-slate-700 dark:text-slate-300 font-medium flex items-center gap-2">
                <i class="fas fa-phone"></i> +1 (555) 123-4567
            </span>
        </div>
    </div>
</div>

<!-- 
    MODAL (Improved Design)
-->
<div id="state-modal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop">
    </div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-gray-800 text-left shadow-2xl transition-all w-full max-w-md opacity-0 translate-y-4 sm:scale-95 border border-white/20"
                id="modal-panel">

                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-br from-teal-500 to-emerald-600"></div>
                <div class="absolute top-4 right-4 z-20">
                    <button id="modal-close"
                        class="bg-black/20 hover:bg-black/40 text-white rounded-full p-2 w-8 h-8 flex items-center justify-center transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="relative z-10 pt-16 px-8 pb-8">
                    <div
                        class="w-16 h-16 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex items-center justify-center text-teal-600 text-2xl mb-4 mx-auto">
                        <i class="fas fa-landmark"></i>
                    </div>

                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white" id="modal-state-name">State Name
                        </h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Legal Requirements Summary</p>
                    </div>

                    <div class="bg-teal-50 dark:bg-teal-900/20 rounded-xl p-4 mb-6">
                        <p id="modal-summary"
                            class="text-sm text-slate-700 dark:text-slate-300 text-center leading-relaxed">
                            Loading...
                        </p>
                    </div>

                    <a id="modal-hslda-link" href="#" target="_blank"
                        class="block w-full bg-teal-600 hover:bg-teal-500 text-white text-center font-bold py-3.5 rounded-xl shadow-lg shadow-teal-600/30 transition-all transform hover:-translate-y-0.5">
                        View Official Requirements <i class="fas fa-external-link-alt ml-2 text-sm opacity-70"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // --- Data ---
    const states = [{
        name: "Alabama",
        url: "https://hslda.org/legal/alabama"
    },
    {
        name: "Alaska",
        url: "https://hslda.org/legal/alaska"
    },
    {
        name: "Arizona",
        url: "https://hslda.org/legal/arizona"
    },
    {
        name: "Arkansas",
        url: "https://hslda.org/legal/arkansas"
    },
    {
        name: "California",
        url: "https://hslda.org/legal/california"
    },
    {
        name: "Colorado",
        url: "https://hslda.org/legal/colorado"
    },
    {
        name: "Connecticut",
        url: "https://hslda.org/legal/connecticut"
    },
    {
        name: "Delaware",
        url: "https://hslda.org/legal/delaware"
    },
    {
        name: "Florida",
        url: "https://hslda.org/legal/florida"
    },
    {
        name: "Georgia",
        url: "https://hslda.org/legal/georgia"
    },
    {
        name: "Hawaii",
        url: "https://hslda.org/legal/hawaii"
    },
    {
        name: "Idaho",
        url: "https://hslda.org/legal/idaho"
    },
    {
        name: "Illinois",
        url: "https://hslda.org/legal/illinois"
    },
    {
        name: "Indiana",
        url: "https://hslda.org/legal/indiana"
    },
    {
        name: "Iowa",
        url: "https://hslda.org/legal/iowa"
    },
    {
        name: "Kansas",
        url: "https://hslda.org/legal/kansas"
    },
    {
        name: "Kentucky",
        url: "https://hslda.org/legal/kentucky"
    },
    {
        name: "Louisiana",
        url: "https://hslda.org/legal/louisiana"
    },
    {
        name: "Maine",
        url: "https://hslda.org/legal/maine"
    },
    {
        name: "Maryland",
        url: "https://hslda.org/legal/maryland"
    },
    {
        name: "Massachusetts",
        url: "https://hslda.org/legal/massachusetts"
    },
    {
        name: "Michigan",
        url: "https://hslda.org/legal/michigan"
    },
    {
        name: "Minnesota",
        url: "https://hslda.org/legal/minnesota"
    },
    {
        name: "Mississippi",
        url: "https://hslda.org/legal/mississippi"
    },
    {
        name: "Missouri",
        url: "https://hslda.org/legal/missouri"
    },
    {
        name: "Montana",
        url: "https://hslda.org/legal/montana"
    },
    {
        name: "Nebraska",
        url: "https://hslda.org/legal/nebraska"
    },
    {
        name: "Nevada",
        url: "https://hslda.org/legal/nevada"
    },
    {
        name: "New Hampshire",
        url: "https://hslda.org/legal/new-hampshire"
    },
    {
        name: "New Jersey",
        url: "https://hslda.org/legal/new-jersey"
    },
    {
        name: "New Mexico",
        url: "https://hslda.org/legal/new-mexico"
    },
    {
        name: "New York",
        url: "https://hslda.org/legal/new-york"
    },
    {
        name: "North Carolina",
        url: "https://hslda.org/legal/north-carolina"
    },
    {
        name: "North Dakota",
        url: "https://hslda.org/legal/north-dakota"
    },
    {
        name: "Ohio",
        url: "https://hslda.org/legal/ohio"
    },
    {
        name: "Oklahoma",
        url: "https://hslda.org/legal/oklahoma"
    },
    {
        name: "Oregon",
        url: "https://hslda.org/legal/oregon"
    },
    {
        name: "Pennsylvania",
        url: "https://hslda.org/legal/pennsylvania"
    },
    {
        name: "Rhode Island",
        url: "https://hslda.org/legal/rhode-island"
    },
    {
        name: "South Carolina",
        url: "https://hslda.org/legal/south-carolina"
    },
    {
        name: "South Dakota",
        url: "https://hslda.org/legal/south-dakota"
    },
    {
        name: "Tennessee",
        url: "https://hslda.org/legal/tennessee"
    },
    {
        name: "Texas",
        url: "https://hslda.org/legal/texas"
    },
    {
        name: "Utah",
        url: "https://hslda.org/legal/utah"
    },
    {
        name: "Vermont",
        url: "https://hslda.org/legal/vermont"
    },
    {
        name: "Virginia",
        url: "https://hslda.org/legal/virginia"
    },
    {
        name: "Washington",
        url: "https://hslda.org/legal/washington"
    },
    {
        name: "West Virginia",
        url: "https://hslda.org/legal/west-virginia"
    },
    {
        name: "Wisconsin",
        url: "https://hslda.org/legal/wisconsin"
    },
    {
        name: "Wyoming",
        url: "https://hslda.org/legal/wyoming"
    }
    ];

    // --- State Grid Logic ---
    const grid = document.getElementById('stateGrid');
    const searchInput = document.getElementById('stateSearch');
    const noStatesMsg = document.getElementById('no-states-msg');

    function renderStates(filterText = '') {
        grid.innerHTML = '';
        let count = 0;
        const lowerFilter = filterText.toLowerCase();

        states.forEach(state => {
            if (state.name.toLowerCase().includes(lowerFilter)) {
                // Chip/Pill Style Button
                const btn = document.createElement('button');
                btn.className = 'px-4 py-2 rounded-full bg-slate-100 hover:bg-teal-100 text-slate-700 hover:text-teal-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-teal-900/40 dark:hover:text-teal-400 text-sm font-medium transition-colors border border-transparent hover:border-teal-200 dark:hover:border-teal-700';
                btn.textContent = state.name;
                btn.onclick = () => openModal(state);
                grid.appendChild(btn);
                count++;
            }
        });

        if (count === 0) {
            noStatesMsg.classList.remove('hidden');
        } else {
            noStatesMsg.classList.add('hidden');
        }
    }

    renderStates();
    searchInput.addEventListener('input', (e) => renderStates(e.target.value));

    // --- Modal Logic ---
    const modal = document.getElementById('state-modal');
    const backdrop = document.getElementById('modal-backdrop');
    const panel = document.getElementById('modal-panel');
    const modalClose = document.getElementById('modal-close');
    const modalName = document.getElementById('modal-state-name');
    const modalLink = document.getElementById('modal-hslda-link');
    const modalSummary = document.getElementById('modal-summary');

    function openModal(state) {
        modalName.textContent = state.name;
        modalLink.href = state.url;
        modalSummary.textContent = `Homeschooling in ${state.name} is regulated by state statute. Tap the button below to see the specific forms and Notice of Intent requirements.`;

        modal.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'translate-y-4', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 10);
    }

    function closeModal() {
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'sm:scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    modalClose.onclick = closeModal;
    backdrop.onclick = closeModal;
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
    });

    // --- Feedback ---
    document.getElementById('feedbackForm').addEventListener('submit', function (event) {
        const feedback = document.getElementById('feedbackText').value.trim();
        if (!feedback) {
            event.preventDefault();
            if (typeof showMessageBox === 'function') showMessageBox('Please enter your feedback.');
            else alert('Feedback cannot be empty.');
        }
    });
</script>

<?php include 'src/footer.php'; ?>
