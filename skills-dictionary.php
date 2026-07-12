<?php
$pageTitle = "Skills Directory - Hesten's Learning";
include 'src/header.php';
?>

<style>
    /* Skill Link Hover Effect */
    .skill-link:hover {
        background-color: rgba(79, 70, 229, 0.1);
        padding-left: 0.75rem;
    }

    /* Preview Popover Animation */
    .preview-popover {
        transition: opacity 0.2s ease, transform 0.2s ease;
        opacity: 0;
        pointer-events: none;
        transform: translateY(10px);
    }

    .preview-popover.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Keyframes for animations */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.5s ease-out forwards;
    }
</style>

<div class="container mx-auto px-4 py-8 flex flex-col md:flex-row gap-8 items-start relative min-h-screen">

    <!-- Left Sidebar: Grades -->
    <aside class="w-full md:w-48 flex-shrink-0 sticky top-24 z-10">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-4">
            <h3 class="font-bold text-gray-500 uppercase text-xs mb-4 tracking-wider">Math Levels</h3>
            <nav class="space-y-1" id="grade-nav">
                <button onclick="switchGrade('pre-k', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg bg-primary text-white font-bold text-sm shadow-md flex justify-between items-center transition-all">
                    <span>Pre-K</span> <i class="fas fa-check text-xs opacity-50 active-indicator"></i>
                </button>
                <button onclick="switchGrade('k', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary font-medium text-sm transition-colors flex justify-between items-center">
                    <span>Kindergarten</span> <i class="fas fa-check text-xs opacity-0 active-indicator"></i>
                </button>
                <button onclick="switchGrade('1st', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary font-medium text-sm transition-colors flex justify-between items-center">
                    <span>First Grade</span> <i class="fas fa-check text-xs opacity-0 active-indicator"></i>
                </button>
                <button onclick="switchGrade('2nd', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary font-medium text-sm transition-colors flex justify-between items-center">
                    <span>Second Grade</span> <i class="fas fa-check text-xs opacity-0 active-indicator"></i>
                </button>
                <button onclick="switchGrade('3rd', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary font-medium text-sm transition-colors flex justify-between items-center">
                    <span>Third Grade</span> <i class="fas fa-check text-xs opacity-0 active-indicator"></i>
                </button>
                <div class="border-t border-gray-100 dark:border-gray-700 my-2"></div>
                <button onclick="switchGrade('all', this)"
                    class="grade-btn w-full text-left px-3 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary font-medium text-sm transition-colors">
                    <i class="fas fa-list mr-1"></i> View All
                </button>
            </nav>
        </div>
    </aside>

    <!-- Center: Skills List -->
    <main class="flex-grow w-full min-h-[600px]">

        <!-- PRE-K CONTENT (Default) -->
        <div id="content-pre-k" class="grade-content">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-2">Pre-K Math Skills
                </h1>
                <p class="text-gray-600 dark:text-gray-400">Explore 84 skills organized by category. Hover over a skill
                    to preview it!</p>
            </div>

            <!-- A. Counting -->
            <div class="mb-8 animate-fade-in-up">
                <div
                    class="flex items-center gap-3 mb-4 sticky top-16 bg-gray-50/95 dark:bg-gray-900/95 backdrop-blur py-2 z-20">
                    <div
                        class="w-10 h-10 rounded-xl bg-blue-100 text-primary flex items-center justify-center text-xl font-bold">
                        A</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Counting objects</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="count-3">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-primary w-8">A.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-primary group-hover:underline">Count
                            to 3</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="count-5">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-primary w-8">A.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-primary group-hover:underline">Count
                            to 5</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="count-shapes">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-primary w-8">A.3</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-primary group-hover:underline">Count
                            shapes in a row</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="count-dots">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-primary w-8">A.4</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-primary group-hover:underline">Count
                            dots on ten frames</span>
                    </a>
                </div>
            </div>

            <!-- B. Comparing -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.05s">
                <div
                    class="flex items-center gap-3 mb-4 sticky top-16 bg-gray-50/95 dark:bg-gray-900/95 backdrop-blur py-2 z-20">
                    <div
                        class="w-10 h-10 rounded-xl bg-pink-100 text-secondary flex items-center justify-center text-xl font-bold">
                        B</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Comparing</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="compare-size">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-secondary w-8">B.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-secondary group-hover:underline">Are
                            there enough?</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="compare-groups">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-secondary w-8">B.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-secondary group-hover:underline">Compare
                            groups (fewer/more)</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="compare-numbers">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-secondary w-8">B.3</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-secondary group-hover:underline">Compare
                            numbers up to 10</span>
                    </a>
                </div>
            </div>

            <!-- C. Patterns -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <div
                    class="flex items-center gap-3 mb-4 sticky top-16 bg-gray-50/95 dark:bg-gray-900/95 backdrop-blur py-2 z-20">
                    <div
                        class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-xl font-bold">
                        C</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Patterns</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="pattern-color">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-green-600 w-8">C.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-green-600 group-hover:underline">Color
                            patterns</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="pattern-shape">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-green-600 w-8">C.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-green-600 group-hover:underline">Shape
                            patterns</span>
                    </a>
                </div>
            </div>

            <!-- D. Positions (New) -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.15s">
                <div
                    class="flex items-center gap-3 mb-4 sticky top-16 bg-gray-50/95 dark:bg-gray-900/95 backdrop-blur py-2 z-20">
                    <div
                        class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-xl font-bold">
                        D</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Positions</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="pos-io">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-yellow-600 w-8">D.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-yellow-600 group-hover:underline">Inside
                            and outside</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="pos-lr">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-yellow-600 w-8">D.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-yellow-600 group-hover:underline">Left
                            and right</span>
                    </a>
                </div>
            </div>

            <!-- E. Classifying (New) -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div
                    class="flex items-center gap-3 mb-4 sticky top-16 bg-gray-50/95 dark:bg-gray-900/95 backdrop-blur py-2 z-20">
                    <div
                        class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl font-bold">
                        E</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Classifying</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="class-color">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-purple-600 w-8">E.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-purple-600 group-hover:underline">Same
                            and different</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="class-group">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-purple-600 w-8">E.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-purple-600 group-hover:underline">Classify
                            objects by color</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- KINDERGARTEN CONTENT (Hidden) -->
        <div id="content-k" class="grade-content hidden">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-2">Kindergarten Math
                    Skills</h1>
                <p class="text-gray-600 dark:text-gray-400">Moving up! Here are the skills for Kindergarten learners.
                </p>
            </div>
            <!-- A. Numbers -->
            <div class="mb-8 animate-fade-in-up">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl font-bold">
                        A</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Numbers and counting to 20</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="k-count">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-orange-600 w-8">A.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-orange-600 group-hover:underline">Count
                            dots - up to 20</span>
                    </a>
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-orange-600 w-8">A.2</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-orange-600 group-hover:underline">Count
                            objects - up to 20</span>
                    </a>
                </div>
            </div>

            <!-- B. Addition -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl font-bold">
                        B</div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Addition</h2>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1">
                    <a href="#" class="skill-link group flex items-baseline gap-3 p-2 rounded-lg transition-all"
                        data-preview="k-add">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-teal-600 w-8">B.1</span>
                        <span
                            class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-teal-600 group-hover:underline">Add
                            with pictures - sums up to 5</span>
                    </a>
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-secondary to-primary"></div>

            <div class="text-xs font-bold text-gray-500 uppercase mb-2 tracking-wide"><i class="fas fa-eye mr-1"></i>
                Practice Preview</div>

            <div id="preview-content">
                <!-- Content injected by JS -->
            </div>

            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button
                    class="w-full bg-primary text-white font-bold py-2 rounded-lg hover:bg-primary/90 transition-colors shadow-lg transform hover:scale-105">
                    Start Now <i class="fas fa-play ml-2 text-xs"></i>
                </button>
            </div>
        </div>
    </aside>

</div>

<!-- Mobile Preview Modal -->
<div id="mobile-preview"
    class="fixed inset-x-0 bottom-0 bg-white dark:bg-gray-900 rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.2)] p-6 transform translate-y-full transition-transform z-50 lg:hidden border-t-4 border-primary">
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold text-lg text-primary">Skill Preview</h3>
        <button id="close-mobile-preview" class="text-gray-500 hover:text-red-500"><i
                class="fas fa-times text-xl"></i></button>
    </div>
    <div id="mobile-preview-content" class="mb-4"></div>
    <button class="w-full bg-primary text-white font-bold py-3 rounded-xl">Start Practice</button>
</div>

<!-- Logic -->
<script>
    // --- Mock Data for Previews ---
    const previewData = {
        // A. Counting
        'count-3': {
            question: "How many apples?",
            visual: `<div class="flex gap-2 justify-center my-4"><i class="fas fa-apple-alt text-red-500 text-4xl"></i><i class="fas fa-apple-alt text-red-500 text-4xl"></i></div>`,
            options: ["1", "2", "3"]
        },
        'count-5': {
            question: "Count the stars.",
            visual: `<div class="flex gap-2 justify-center my-4 text-yellow-400 text-3xl"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>`,
            options: ["3", "4", "5"]
        },
        'count-shapes': {
            question: "How many squares?",
            visual: `<div class="flex gap-2 justify-center my-4"><div class="w-8 h-8 bg-blue-500"></div><div class="w-8 h-8 bg-blue-500"></div><div class="w-8 h-8 bg-blue-500"></div></div>`,
            options: ["2", "3", "4"]
        },
        'count-dots': {
            question: "How many dots?",
            visual: `<div class="w-24 h-12 border-2 border-black grid grid-cols-5 gap-1 p-1 mx-auto my-4 dark:border-white"><div class="rounded-full bg-black dark:bg-white w-3 h-3"></div><div class="rounded-full bg-black dark:bg-white w-3 h-3"></div><div class="rounded-full bg-transparent"></div></div>`,
            options: ["1", "2", "5"]
        },

        // B. Comparing
        'compare-size': {
            question: "Which is bigger?",
            visual: `<div class="flex gap-4 justify-center items-end my-4"><div class="w-8 h-8 bg-blue-500 rounded-full"></div><div class="w-16 h-16 bg-blue-500 rounded-full"></div></div>`,
            options: ["Left", "Right"]
        },
        'compare-groups': {
            question: "Which group has more?",
            visual: `<div class="flex gap-8 justify-center my-4"><div class="border border-gray-300 dark:border-gray-600 p-2">🔴🔴</div><div class="border border-gray-300 dark:border-gray-600 p-2">🔴🔴🔴🔴</div></div>`,
            options: ["Left", "Right"]
        },
        'compare-numbers': {
            question: "Compare 5 and 3",
            visual: `<div class="text-xl font-bold text-center">5 <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">?</span> 3</div>`,
            options: [">", "<", "="]
        },

        // C. Patterns
        'pattern-color': {
            question: "What comes next?",
            visual: `<div class="flex gap-2 justify-center my-4 text-2xl"><span class="text-red-500">●</span><span class="text-blue-500">●</span><span class="text-red-500">●</span><span class="text-blue-500">●</span><span>?</span></div>`,
            options: ["Red", "Blue"]
        },
        'pattern-shape': {
            question: "What comes next?",
            visual: `<div class="flex gap-2 justify-center my-4 text-2xl"><i class="fas fa-square text-green-500"></i><i class="fas fa-circle text-green-500"></i><i class="fas fa-square text-green-500"></i><span>?</span></div>`,
            options: ["Square", "Circle"]
        },

        // D. Positions
        'pos-io': {
            question: "Is the ball inside or outside?",
            visual: `<div class="border-4 border-black dark:border-white w-16 h-16 mx-auto my-4 relative"><div class="w-4 h-4 bg-red-500 rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div></div>`,
            options: ["Inside", "Outside"]
        },
        'pos-lr': {
            question: "Which way is the arrow pointing?",
            visual: `<div class="text-center text-4xl my-4 text-primary"><i class="fas fa-arrow-right"></i></div>`,
            options: ["Left", "Right"]
        },

        // E. Classifying
        'class-color': {
            question: "Which one is red?",
            visual: `<div class="flex gap-4 justify-center my-4"><div class="w-8 h-8 bg-blue-500 rounded"></div><div class="w-8 h-8 bg-red-500 rounded"></div><div class="w-8 h-8 bg-green-500 rounded"></div></div>`,
            options: ["1st", "2nd", "3rd"]
        },
        'class-group': {
            question: "Find the animal.",
            visual: `<div class="flex gap-4 justify-center my-4 text-3xl"><i class="fas fa-car text-gray-500"></i><i class="fas fa-dog text-yellow-600"></i><i class="fas fa-plane text-blue-500"></i></div>`,
            options: ["Car", "Dog", "Plane"]
        },

        // Kindergarten Previews
        'k-count': {
            question: "How many dots?",
            visual: `<div class="flex gap-1 justify-center my-4 flex-wrap w-32 mx-auto"><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div><div class="w-4 h-4 bg-black dark:bg-white rounded-full"></div></div>`,
            options: ["5", "7", "10"]
        },
        'k-add': {
            question: "2 + 1 = ?",
            visual: `<div class="text-center text-4xl font-bold my-4 dark:text-white">2 + 1 = ?</div>`,
            options: ["2", "3", "4"]
        },

        'default': {
            question: "Ready to practice?",
            visual: `<div class="text-center text-6xl text-primary my-4 animate-bounce"><i class="fas fa-play-circle"></i></div>`,
            options: []
        }
    };

    const desktopPreview = document.getElementById('preview-card');
    const contentDiv = document.getElementById('preview-content');

    // Attach Listeners to Links (Re-runnable function)
    function attachPreviewListeners() {
        const links = document.querySelectorAll('.skill-link');
        links.forEach(link => {
            link.addEventListener('mouseenter', () => {
                const key = link.dataset.preview || 'default';
                const data = previewData[key] || previewData['default'];

                let html = `
                <p class="font-bold text-lg text-gray-900 dark:text-white text-center mb-2">${data.question}</p>
                ${data.visual}
            `;
                if (data.options && data.options.length > 0) {
                    html += `<div class="grid grid-cols-${Math.min(3, data.options.length)} gap-2 mt-4">`;
                    data.options.forEach(opt => {
                        html += `<div class="border-2 border-gray-200 dark:border-gray-600 rounded p-2 text-center font-bold text-gray-500 dark:text-gray-400 text-sm">${opt}</div>`;
                    });
                    html += `</div>`;
                }

                contentDiv.innerHTML = html;
                desktopPreview.classList.add('visible');
            });
        });

        // Mobile Logic
        if (window.innerWidth < 1024) {
            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const key = link.dataset.preview || 'default';
                    const data = previewData[key] || previewData['default'];
                    const mobilePreview = document.getElementById('mobile-preview');
                    const mobileContent = document.getElementById('mobile-preview-content');

                    let html = `
                    <p class="font-bold text-xl text-gray-900 dark:text-white text-center mb-4">${data.question}</p>
                    ${data.visual}
                `;
                    mobileContent.innerHTML = html;
                    mobilePreview.classList.remove('translate-y-full');
                });
            });
        }
    }

    document.getElementById('close-mobile-preview')?.addEventListener('click', () => {
        document.getElementById('mobile-preview').classList.add('translate-y-full');
    });

    // --- Switch Grade Logic ---
    window.switchGrade = function (grade, btn) {
        // 1. Update Buttons
        const buttons = document.querySelectorAll('.grade-btn');
        buttons.forEach(b => {
            b.classList.remove('bg-primary', 'text-white', 'shadow-md');
            b.classList.add('text-gray-600', 'dark:text-gray-300', 'hover:bg-gray-100', 'dark:hover:bg-gray-700', 'hover:text-primary');
            const icon = b.querySelector('.active-indicator');
            if (icon) icon.classList.add('opacity-0');
            if (icon) icon.classList.remove('opacity-50');
        });

        btn.classList.add('bg-primary', 'text-white', 'shadow-md');
        btn.classList.remove('text-gray-600', 'hover:bg-gray-100', 'hover:text-primary');
        const activeIcon = btn.querySelector('.active-indicator');
        if (activeIcon) activeIcon.classList.remove('opacity-0');
        if (activeIcon) activeIcon.classList.add('opacity-50');

        // 2. Hide All Content
        document.querySelectorAll('.grade-content').forEach(div => div.classList.add('hidden'));

        // 3. Show Selected Content
        if (grade === 'pre-k') {
            document.getElementById('content-pre-k').classList.remove('hidden');
        } else if (grade === 'k') {
            document.getElementById('content-k').classList.remove('hidden');
        } else {
            document.getElementById('content-other').classList.remove('hidden');
        }
    }

    // Init
    document.addEventListener('DOMContentLoaded', attachPreviewListeners);
</script>

<?php include 'src/footer.php'; ?>