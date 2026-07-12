<?php
// --- Page Configuration ---
$pageTitle = "Hesten's Learning - Research";
$pageDescription = "Explore our peer-reviewed journals on dyslexia, dysgraphia, and other learning disability research.";
$pageKeywords = "research, journals, dyslexia, dysgraphia, learning disabilities, education";
$pageAuthor = "Hesten Allison";

include '../src/header.php';

// Define Journals Data Array
$journals = [
    [
        "id" => "dyslexia-Research",
        "title" => "Dyslexia & Learning Disabilities Research",
        "cover" => "Dyslexia Research",
        "description" => "A peer-reviewed journal focusing on the latest research in dyslexia, exploring innovative teaching methods, and validating new interventions.",
        "link" => "DLDR/index.php",
        "author" => "Hesten Allison",
        "date" => "Oct 2025",
        "tags" => ["Dyslexia", "Intervention"],
        "isPeerReviewed" => true
    ],
    [
        "id" => "dysgraphia-studies",
        "title" => "Dysgraphia Studies & Motor Skills",
        "cover" => "assets/dysgraphia_cover.png",
        "description" => "Comprehensive studies on early signs of dysgraphia, neural pathways, and effective occupational therapy adaptations.",
        "link" => "#",
        "author" => "Dr. Emily Chen",
        "date" => "Nov 2025",
        "tags" => ["Dysgraphia", "Motor Skills"],
        "isPeerReviewed" => true
    ]
];
?>

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-violet-600 via-purple-700 to-indigo-800 dark:from-violet-900 dark:via-purple-900 dark:to-teal-900 text-white pt-24 pb-24 px-4 rounded-b-[3rem] shadow-2xl overflow-hidden mb-12 border-b border-white/20">
    <!-- Animated Background & Glassmorphic Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <i class="fas fa-microscope absolute top-20 left-10 text-[10rem] animate-pulse text-violet-300 opacity-50 drop-shadow-[0_0_30px_rgba(139,92,246,0.8)]"></i>
        <i class="fas fa-brain absolute bottom-10 right-20 text-[14rem] animate-pulse text-indigo-300 opacity-50 drop-shadow-[0_0_30px_rgba(99,102,241,0.8)]"></i>
        <i class="fas fa-dna absolute top-1/3 right-1/4 text-8xl -rotate-12 text-purple-300 opacity-60"></i>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-1/2 w-96 h-96 bg-teal-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">
        <span class="inline-flex items-center gap-2 py-2 px-6 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-8 uppercase tracking-widest backdrop-blur-md shadow-lg">
            <i class="fas fa-book-open text-violet-200"></i> Academic Journals
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight text-white mt-4">
            <span class="drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)]">Explore Our</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-200 to-teal-200">Research</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-50 mb-10 font-light max-w-3xl mx-auto leading-relaxed drop-shadow-md">
            Discover the latest peer-reviewed findings, methodologies, and advancements in learning disabilities and educational technology.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-24" id="main-content">

    <!-- Search & Filter Section -->
    <div class="max-w-4xl mx-auto mb-16 space-y-6">
        <!-- Search Bar -->
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none">
                <i class="fas fa-search text-gray-400 group-focus-within:text-primary transition-colors"></i>
            </div>
            <input type="text" 
                   class="w-full pl-14 pr-6 py-4 rounded-full bg-white dark:bg-gray-800 border-2 border-gray-100 dark:border-gray-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-primary/20 focus:border-primary transition-all text-lg text-gray-800 dark:text-gray-200 placeholder-gray-400" 
                   placeholder="Search journals, authors, or topics...">
        </div>
        
        <!-- Category Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3">
            <button class="px-6 py-2 rounded-full bg-primary text-white font-medium shadow-md shadow-primary/30 transform hover:-translate-y-0.5 transition-all">All</button>
            <button class="px-6 py-2 rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 hover:border-primary hover:text-primary dark:hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transform hover:-translate-y-0.5 transition-all shadow-sm">Dyslexia</button>
            <button class="px-6 py-2 rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 hover:border-primary hover:text-primary dark:hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transform hover:-translate-y-0.5 transition-all shadow-sm">Dysgraphia</button>
            <button class="px-6 py-2 rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 hover:border-primary hover:text-primary dark:hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transform hover:-translate-y-0.5 transition-all shadow-sm">Intervention</button>
            <button class="px-6 py-2 rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 hover:border-primary hover:text-primary dark:hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transform hover:-translate-y-0.5 transition-all shadow-sm">AI in Ed</button>
        </div>
    </div>

    <!-- Journals Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <?php foreach ($journals as $journal): ?>
            <a href="<?php echo htmlspecialchars($journal['link']); ?>" class="group flex flex-col h-full bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl rounded-[2rem] border border-white/20 dark:border-white/10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] overflow-hidden hover:shadow-[0_20px_40px_rgb(0,0,0,0.1)] hover:-translate-y-2 transition-all duration-500">
                
                <!-- Card Image & Overlay -->
                <div class="relative h-72 overflow-hidden bg-gray-100 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 flex items-center justify-center bg-gradient-to-br from-violet-600 to-indigo-800">
                    <?php if (preg_match('/\.(jpg|jpeg|png|gif|svg|webp)$/i', $journal['cover'])): ?>
                        <img src="<?php echo htmlspecialchars($journal['cover']); ?>" 
                             alt="<?php echo htmlspecialchars($journal['title']); ?> Cover" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out"
                             onerror="this.onerror=null; this.src='https://placehold.co/400x500/6366F1/FFFFFF?text=Image+Error';">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/20 to-transparent"></div>
                    <?php else: ?>
                        <div class="absolute inset-0 w-full h-full flex flex-col items-center justify-center p-6 text-center transform group-hover:scale-105 transition-transform duration-700 ease-out">
                            <i class="fas fa-book-open text-white/50 text-5xl mb-4 drop-shadow-md"></i>
                            <h2 class="text-white text-2xl font-black drop-shadow-lg leading-tight uppercase tracking-wider"><?php echo htmlspecialchars($journal['cover']); ?></h2>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-transparent"></div>
                    <?php endif; ?>
                    
                    <!-- Peer Reviewed Badge -->
                    <?php if (isset($journal['isPeerReviewed']) && $journal['isPeerReviewed']): ?>
                        <div class="absolute top-4 right-4 bg-emerald-500/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-white/20">
                            <i class="fas fa-check-circle"></i> Peer Reviewed
                        </div>
                    <?php endif; ?>

                    <!-- Tags Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 flex flex-wrap gap-2">
                        <?php if(isset($journal['tags'])): ?>
                            <?php foreach ($journal['tags'] as $tag): ?>
                                <span class="bg-white/20 hover:bg-white/30 backdrop-blur-md text-white border border-white/30 text-xs font-semibold px-2.5 py-1 rounded-md transition-colors">
                                    <?php echo htmlspecialchars($tag); ?>
                                </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Card Body (Glassmorphism) -->
                <div class="p-8 flex-1 flex flex-col relative bg-gradient-to-br from-white/60 to-white/30 dark:from-gray-800/60 dark:to-gray-900/40">
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors leading-tight">
                        <?php echo htmlspecialchars($journal['title']); ?>
                    </h3>
                    
                    <!-- Meta info: Author & Date -->
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-5 font-medium space-x-4">
                        <?php if(isset($journal['author'])): ?>
                            <span class="flex items-center gap-1.5"><i class="fas fa-user-circle text-gray-400"></i> <?php echo htmlspecialchars($journal['author']); ?></span>
                        <?php endif; ?>
                        <?php if(isset($journal['date'])): ?>
                            <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-gray-400"></i> <?php echo htmlspecialchars($journal['date']); ?></span>
                        <?php endif; ?>
                    </div>

                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-8 flex-1">
                        <?php echo htmlspecialchars($journal['description']); ?>
                    </p>
                    
                    <!-- Call to action -->
                    <div class="mt-auto flex items-center justify-between group/btn">
                        <span class="text-primary font-bold tracking-wide uppercase text-sm group-hover/btn:text-indigo-600 dark:group-hover/btn:text-indigo-400 transition-colors">
                            Read Journal
                        </span>
                        <div class="w-10 h-10 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <!-- Enhanced Coming Soon Placeholder -->
        <div class="group h-full bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[2rem] border-2 border-dashed border-gray-300 dark:border-gray-700 flex flex-col items-center justify-center p-12 text-center opacity-70 hover:opacity-100 transition-all duration-500 hover:border-primary/50 hover:bg-primary/5">
            <div class="relative w-20 h-20 mb-6">
                <!-- Pulsing background dots -->
                <div class="absolute inset-0 bg-primary/20 rounded-full animate-ping"></div>
                <div class="relative w-full h-full bg-white dark:bg-gray-800 rounded-full shadow-lg flex items-center justify-center text-primary border border-gray-200 dark:border-gray-700 group-hover:scale-110 transition-transform duration-500">
                    <i class="fas fa-flask text-3xl"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Next Publication</h3>
            <p class="text-gray-500 dark:text-gray-400 font-medium">We are actively conducting research on AI-assisted learning interventions. Coming Soon.</p>
        </div>
    </div>

</main>

<style>
/* Custom animations for the hero background orbs */
@keyframes blob {
  0% { transform: translate(0px, 0px) scale(1); }
  33% { transform: translate(30px, -50px) scale(1.1); }
  66% { transform: translate(-20px, 20px) scale(0.9); }
  100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob {
  animation: blob 7s infinite;
}
.animation-delay-2000 {
  animation-delay: 2s;
}
.animation-delay-4000 {
  animation-delay: 4s;
}
</style>

<?php include '../src/footer.php'; ?>
