<?php
$pageTitle = "Assessment | Hesten's Learning";
include '../src/header.php';
?>

<!-- Assessment Selection View (Hidden by default, shown if no grade selected) -->
<div id="assessment-selection" class="container mx-auto px-4 py-16 hidden animate-fade-in-up">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-extrabold text-primary mb-6 drop-shadow-sm">
            Select Your Assessment Level
        </h1>
        <p class="text-xl text-text-secondary max-w-3xl mx-auto leading-relaxed">
            Choose a grade level to begin your personalized knowledge check. We'll track your progress as you go.
        </p>
    </div>

    <div id="grade-selection-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <!-- Grid items injected by JS -->
    </div>
</div>

<!-- QUIZ CONTENT (Hidden if no grade selected) -->
<header id="quiz-header" class="relative bg-gradient-to-br from-primary via-secondary to-accent text-white pt-24 pb-24 px-4 rounded-b-[3rem] shadow-2xl overflow-hidden mb-16 border-b border-white/10 text-center hidden">

    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-tasks absolute top-10 left-10 text-9xl text-white/10 transform-gpu animate-pulse-slow"></i>
        <i class="fas fa-check-circle absolute bottom-20 right-10 text-[14rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto relative z-10">
        <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-white/20 border border-white/20 text-sm font-bold tracking-wider uppercase mb-6 backdrop-blur-md shadow-lg">
            <i class="fas fa-star text-yellow-300"></i> Assessment Mode
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 drop-shadow-lg">
            <span id="header-grade-name">Loading...</span> Knowledge Check
        </h1>
        <p class="text-xl text-blue-50 max-w-2xl mx-auto mb-10 font-light">
            Test your skills across all major subjects to earn badges and track your growth.
        </p>

        <!-- Navigation Group -->
        <div class="flex flex-wrap justify-center items-center gap-6">
            <!-- Previous Button -->
            <a id="btn-prev" href="#" class="hidden group flex items-center px-6 py-3 bg-white/10 hover:bg-white/25 text-white rounded-full font-bold transition-all border border-white/30 backdrop-blur-sm">
                <i class="fas fa-chevron-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                <span id="btn-prev-label">Previous</span>
            </a>

            <!-- Spacer -->
            <div id="spacer-prev" class="hidden md:block w-32"></div>

            <!-- Main Curriculum Link -->
            <a id="link-curriculum" href="#" class="px-8 py-3 bg-white text-primary rounded-full font-bold hover:bg-gray-50 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-th"></i> Return to Curriculum
            </a>

            <!-- Next Button -->
            <a id="btn-next" href="#" class="hidden group flex items-center px-6 py-3 bg-white/10 hover:bg-white/25 text-white rounded-full font-bold transition-all border border-white/30 backdrop-blur-sm">
                <span id="btn-next-label">Next</span>
                <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <!-- Spacer -->
            <div id="spacer-next" class="hidden md:block w-32"></div>
        </div>
    </div>
</header>

<div id="quiz-container" class="container mx-auto px-4 pb-12">
    <!-- Hidden inputs for JavaScript -->
    <input type="hidden" id="force-grade" value="" />
    <input type="hidden" id="grade-key" value="" />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-8">
            <!-- Stats -->
            <div class="glass rounded-3xl shadow-xl p-8 border border-white/20 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-primary"></div>
                <h3 class="text-xl font-bold text-text-default mb-6 flex items-center gap-2">
                    <i class="fas fa-chart-pie text-primary"></i> Your Progress
                </h3>
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-bold inline-block py-1 px-3 uppercase rounded-full text-primary bg-primary/10 tracking-wide">
                                Current Score
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-bold inline-block text-primary progress-bar-text">
                                0%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-full bg-gray-200 dark:bg-gray-700">
                        <div style="width: 0%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gradient-to-r from-primary to-secondary transition-all duration-1000 ease-out progress-bar-animated">
                        </div>
                    </div>
                </div>
                <p class="text-sm text-text-secondary italic flex items-center gap-2">
                    <i class="fas fa-info-circle"></i> Complete questions to earn badges!
                </p>
            </div>

            <!-- Subject Filter -->
            <div class="glass rounded-3xl shadow-xl p-8 border border-white/20">
                <h3 class="text-xl font-bold text-text-default mb-6 flex items-center gap-2">
                    <i class="fas fa-filter text-secondary"></i> Focus Area
                </h3>
                <div class="space-y-3">
                    <button onclick="filterQuestions('All')" class="w-full text-left px-5 py-3 rounded-2xl bg-base-bg hover:bg-primary/5 hover:text-primary transition-all font-bold border-2 border-transparent focus:border-primary text-text-secondary group">
                        <i class="fas fa-layer-group w-6 text-center mr-3 opacity-70 group-hover:scale-110 transition-transform"></i>
                        Mix All Subjects
                    </button>
                    <button onclick="filterQuestions('Math')" class="w-full text-left px-5 py-3 rounded-2xl bg-base-bg hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 transition-all font-bold border-2 border-transparent focus:border-blue-500 text-text-secondary group">
                        <i class="fas fa-calculator w-6 text-center mr-3 text-blue-500 group-hover:scale-110 transition-transform"></i>
                        Math
                    </button>
                    <button onclick="filterQuestions('Language Arts')" class="w-full text-left px-5 py-3 rounded-2xl bg-base-bg hover:bg-pink-50 dark:hover:bg-pink-900/20 hover:text-pink-600 transition-all font-bold border-2 border-transparent focus:border-pink-500 text-text-secondary group">
                        <i class="fas fa-book-reader w-6 text-center mr-3 text-pink-500 group-hover:scale-110 transition-transform"></i>
                        Language Arts
                    </button>
                    <button onclick="filterQuestions('Science')" class="w-full text-left px-5 py-3 rounded-2xl bg-base-bg hover:bg-emerald-50 dark:hover:bg-emerald-900/20 hover:text-emerald-600 transition-all font-bold border-2 border-transparent focus:border-emerald-500 text-text-secondary group">
                        <i class="fas fa-flask w-6 text-center mr-3 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                        Science
                    </button>
                    <button onclick="filterQuestions('Social Studies')" class="w-full text-left px-5 py-3 rounded-2xl bg-base-bg hover:bg-amber-50 dark:hover:bg-amber-900/20 hover:text-amber-600 transition-all font-bold border-2 border-transparent focus:border-amber-500 text-text-secondary group">
                        <i class="fas fa-globe-americas w-6 text-center mr-3 text-amber-500 group-hover:scale-110 transition-transform"></i>
                        Social Studies
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Quiz Area -->
        <div class="lg:col-span-2">
            <div class="glass rounded-3xl shadow-2xl p-8 md:p-10 h-full flex flex-col relative overflow-hidden ring-1 ring-white/50 dark:ring-white/5">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
                    <i class="fas fa-puzzle-piece text-9xl text-text-default"></i>
                </div>

                <div class="flex justify-between items-center mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                    <div>
                        <span class="text-sm font-bold text-text-secondary uppercase tracking-wide">Question</span>
                        <div id="question-count" class="text-4xl font-black text-text-default">
                            1<span class="text-xl text-text-secondary font-medium">/10</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <div class="flex items-center gap-3">
                            <button id="sound-toggle-btn" class="text-text-secondary hover:text-primary transition-colors focus:outline-none" title="Toggle Sound">
                                <i class="fas fa-volume-up text-xl w-6"></i>
                            </button>
                            <div class="flex items-center bg-base-bg rounded-lg p-1 border border-primary/20 shadow-inner">
                                <button id="timer-toggle-btn" class="px-2 text-text-secondary hover:text-primary transition-colors focus:outline-none" title="Hide/Show Timer">
                                    <i class="fas fa-eye text-sm"></i>
                                </button>
                                <span id="session-timer" class="font-mono text-lg font-bold text-primary px-2 min-w-[70px] text-center">
                                    00:00
                                </span>
                            </div>
                        </div>
                        <span id="streak-counter" class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-bold hidden animate-pulse">
                            🔥 0 streak
                        </span>
                    </div>
                </div>

                <div class="flex-grow mb-8">
                    <h2 id="question" class="text-2xl md:text-3xl font-bold text-text-default mb-8 leading-snug min-h-[4rem]">
                        Loading Question...
                    </h2>

                    <div id="options" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Options injected by JS -->
                    </div>
                </div>

                <!-- Feedback Area -->
                <div id="feedback-area" class="min-h-[60px] p-4 rounded-lg hidden mb-6 animate-fade-in-up transition-all duration-300">
                    <div class="flex items-start gap-3">
                        <div id="feedback-icon" class="text-2xl mt-1"></div>
                        <div>
                            <h4 id="feedback-title" class="font-bold text-lg"></h4>
                            <p id="feedback" class="text-sm opacity-90"></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                    <div class="flex gap-2">
                        <button onclick="showHint()" class="text-secondary hover:bg-secondary/10 px-4 py-2 rounded-lg transition-colors font-medium text-sm flex items-center gap-2">
                            <i class="far fa-lightbulb"></i> Need a Hint?
                        </button>
                        <button id="skip-btn" onclick="skipQuestion()" class="text-amber-500 hover:bg-amber-500/10 px-4 py-2 rounded-lg transition-colors font-medium text-sm flex items-center gap-2">
                            <i class="fas fa-forward"></i> Skip
                        </button>
                    </div>

                    <button id="next-btn" onclick="nextQuestionAdapter()" class="bg-primary hover:bg-secondary text-white px-8 py-3 rounded-xl font-bold shadow-lg transform hover:-translate-y-1 transition-all disabled:opacity-50 disabled:cursor-not-allowed hidden">
                        Next Question <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <!-- Hint Modal (Inline) -->
                <div id="hintText" class="hidden mt-4 bg-yellow-50 dark:bg-yellow-900/30 p-4 rounded-lg border-l-4 border-yellow-400 text-yellow-800 dark:text-yellow-200 text-sm transition-all">
                    <strong>Hint:</strong> <span id="hint-content"></span>
                </div>
            </div>
            
            <!-- Review Mode Container (Hidden initially) -->
            <div id="review-container" class="hidden glass rounded-3xl shadow-2xl p-8 md:p-10 mt-8 relative overflow-hidden ring-1 ring-white/50 dark:ring-white/5">
                <h3 class="text-2xl font-bold mb-6 text-text-default flex items-center gap-2">
                    <i class="fas fa-clipboard-list text-primary"></i> Assessment Review
                </h3>
                <div id="review-content" class="space-y-4 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
                    <!-- Review items injected by JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="/assets/js/p-12.js"></script>
<script src="/assets/js/AP.js"></script>
<script src="/assets/js/assessment-page.js"></script>

<?php include '../src/footer.php'; ?>