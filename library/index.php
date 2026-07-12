<?php
// --- Page-Specific Variables ---
$pageTitle = 'Hesten\'s Learning Library';
$pageDescription = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords = 'library, books, epub, pdf, digital library, collection, education, textbooks';
$pageAuthor = 'Hesten\'s Learning';
$welcomeMessage = "Welcome to Hesten's Learning Library";
$welcomeParagraph = "Explore our vast collection of fiction classics and comprehensive educational resources for all grade levels.";

// --- Book Data Array ---
$jsonString = file_get_contents(__DIR__ . '/bookd.json');
$categories = json_decode($jsonString, true);
if (!$categories) {
    $categories = []; // Fallback in case of JSON error
}

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- AURORA MESH BACKGROUND -->
<div
    class="fixed inset-0 overflow-hidden pointer-events-none noise-grain -z-10 bg-white dark:bg-gray-950 transition-colors duration-500">
    <div
        class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 will-change-transform bg-indigo-200 dark:bg-indigo-900/40">
    </div>
    <div
        class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -2s;' will-change-transform bg-purple-200 dark:bg-purple-900/40">
    </div>
    <div
        class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -4s;' will-change-transform bg-emerald-200 dark:bg-teal-900/40">
    </div>
</div>

<main id="main-content" class="min-h-screen relative z-10 font-sans pb-20">

    <!-- Hero Section -->
    <section class="relative pt-32 pb-12 text-center px-4 flex flex-col items-center">
        <div class="animate-reveal">
            <!-- Pill Badge -->
            <div
                class="inline-flex items-center gap-3 rounded-full bg-white/60 dark:bg-black/20 backdrop-blur-xl px-5 py-2 text-xs font-bold text-gray-800 dark:text-gray-200 mb-10 border border-black/5 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] justify-center max-w-fit mx-auto">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                </span>
                <span class="tracking-[0.2em] uppercase"><i class="fas fa-book-reader mr-2"></i> DIGITAL ARCHIVE</span>
            </div>

            <h1
                class="text-6xl md:text-8xl lg:text-[7.5rem] font-black tracking-tighter text-gray-900 dark:text-white mb-8 font-outfit leading-[0.95]">
                The
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-500 via-purple-500 to-emerald-400">Library</span>
            </h1>
        </div>

        <!-- Real-time Search and Filters -->
        <div class="mt-8 max-w-4xl mx-auto w-full flex flex-col md:flex-row items-center gap-4 relative group animate-reveal"
            style="animation-delay: 0.1s;">
            <!-- Redesigned Search bar -->
            <div class="relative w-full md:w-2/3 group">
                <input type="text" id="library-search" aria-label="Search Library"
                    placeholder="Search title, author, or ISBN..."
                    class="w-full pl-12 pr-12 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-white/60 dark:bg-black/40 backdrop-blur-2xl text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all font-semibold placeholder-gray-500 dark:placeholder-gray-400 text-lg shadow-[0_8px_32px_rgba(0,0,0,0.04)] hover:bg-white/80 dark:hover:bg-white/10 glass-shine focus:outline-none">
                <i
                    class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500 transition-colors pointer-events-none text-lg"></i>
            </div>

            <div class="w-full md:w-1/3 flex gap-2 h-full relative">
                <select id="category-filter" aria-label="Select Category"
                    class="appearance-none w-full h-full min-h-[56px] bg-white/60 dark:bg-black/40 backdrop-blur-2xl border border-gray-200 dark:border-white/10 rounded-2xl py-3 px-4 pr-10 text-gray-900 dark:text-white font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-[0_8px_32px_rgba(0,0,0,0.04)] hover:bg-white/80 dark:hover:bg-white/10 glass-shine transition-all cursor-pointer">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categories) as $cat)
                        echo '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($cat) . '</option>'; ?>
                </select>
                <i
                    class="fas fa-filter absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="container mx-auto px-4 md:px-8 space-y-20">

        <?php foreach ($categories as $categoryName => $books): ?>
            <section class="library-category animate-reveal">
                <!-- Category Header -->
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white font-outfit tracking-tight">
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
                    <div class="h-px bg-gray-200 dark:bg-white/10 flex-grow rounded-full"></div>
                    <div class="flex gap-2 shrink-0">
                        <button
                            class="scroll-btn left w-10 h-10 rounded-xl bg-gray-50 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm border border-gray-200 dark:border-white/5"
                            aria-label="Scroll left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="scroll-btn right w-10 h-10 rounded-xl bg-gray-50 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm border border-gray-200 dark:border-white/5"
                            aria-label="Scroll right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="flex overflow-x-auto gap-8 pb-8 pt-2 scrollbar-none snap-x book-container px-2">
                    <?php foreach ($books as $book): ?>
                        <?php include 'book_card.php'; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results"
            class="hidden text-center py-24 px-4 bg-white/50 dark:bg-gray-900/50 backdrop-blur-md rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 mx-auto max-w-4xl will-animate">
            <div
                class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-800/50 mb-8 text-indigo-500/50 shadow-inner relative">
                <i class="fas fa-search text-5xl"></i>
                <div class="absolute inset-0 bg-indigo-500/10 rounded-full animate-ping opacity-20"
                    style="animation-duration: 3s;"></div>
            </div>
            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 font-outfit tracking-tight">No books found
            </h3>
            <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">We couldn't find anything matching your
                search criteria.</p>
        </div>

    </div>

</main>

<link rel="stylesheet" href="library.css">
<?php include 'modals.php'; ?>
<script src="library.js" defer></script>

<?php include '../src/footer.php'; ?>