<?php
$pageTitle = "Growth of Square Areas and Functions | Hesten's Learning";
$pageDescription = "Examine how the area of a square grows compared to its side length, laying foundations for quadratic functions.";
$pageAuthor = "Hesten's Learning Team";

include '../src/header.php';
?>

<div class="bg-gray-50 dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 py-4 transition-colors">
    <div class="page-content-wrapper">
        <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">
            <a href="../index.php" class="hover:text-rose-600 transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[8px] opacity-30"></i>
            <a href="../levels/k.php" class="hover:text-rose-600 transition-colors">Level K</a>
            <i class="fas fa-chevron-right text-[8px] opacity-30"></i>
            <span class="text-gray-900 dark:text-white">Lesson K.M1.A.2</span>
        </nav>
    </div>
</div>

<main class="container mx-auto px-4 py-12 max-w-4xl">
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-slate-800 shadow-xl overflow-hidden p-8 sm:p-12 transition-all">
        <!-- Badge -->
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 text-xs font-black tracking-widest uppercase mb-6">
            <i class="fas fa-calculator text-[10px]"></i> Math Lesson K.M1.A.2
        </span>
        
        <h1 class="text-3xl sm:text-5xl font-black text-gray-900 dark:text-white font-outfit tracking-tight mb-4">
            Growth of Square Areas and Functions
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-lg font-medium leading-relaxed mb-8">
            How do geometric figures grow? Let's compare linear growth (perimeter) with quadratic growth (area) using an interactive grid!
        </p>

        <!-- Interactive Section: Side Length Slider -->
        <div class="bg-gray-50 dark:bg-slate-800/50 rounded-2xl p-6 mb-10 border border-gray-100 dark:border-slate-800">
            <h3 class="text-lg font-black text-gray-900 dark:text-white font-outfit mb-3">
                <i class="fas fa-sliders-h text-rose-500 mr-2"></i> Side Length Simulator
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                Adjust the slider below to change the side length ($s$) of the square. Watch how the perimeter grows constantly, while the area expands at an accelerating rate!
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-6">
                <!-- Control Panel -->
                <div class="space-y-6">
                    <div>
                        <label for="side-slider" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                            Side Length ($s$): <span id="side-val" class="text-rose-600 font-black">5</span> units
                        </label>
                        <input type="range" id="side-slider" min="1" max="10" value="5" oninput="updateSquare(this.value)" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-rose-600 focus:outline-none">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white dark:bg-slate-900 p-4 rounded-xl border border-gray-100 dark:border-slate-800">
                            <span class="block text-[10px] font-black text-gray-400 uppercase">Perimeter ($4s$)</span>
                            <span id="perimeter-val" class="text-2xl font-black text-gray-900 dark:text-white">20</span> units
                        </div>
                        <div class="bg-white dark:bg-slate-900 p-4 rounded-xl border border-gray-100 dark:border-slate-800">
                            <span class="block text-[10px] font-black text-gray-400 uppercase">Area ($s^2$)</span>
                            <span id="area-val" class="text-2xl font-black text-rose-600">25</span> sq units
                        </div>
                    </div>
                </div>
                
                <!-- Square visual rendering container -->
                <div class="flex items-center justify-center bg-white dark:bg-slate-900 p-6 rounded-2xl border border-gray-100 dark:border-slate-800 h-64">
                    <div id="visual-square" class="bg-rose-500/20 border-2 border-rose-600 rounded transition-all duration-100 flex items-center justify-center text-rose-700 dark:text-rose-300 font-bold" style="width: 100px; height: 100px;">
                        s = 5
                    </div>
                </div>
            </div>
        </div>

        <!-- Concept Explanations -->
        <div class="space-y-8 mb-10">
            <div>
                <h4 class="text-xl font-black text-gray-900 dark:text-white font-outfit mb-3">
                    How it Works (Linear vs. Quadratic)
                </h4>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Perimeter increases at a constant linear rate because it is determined by the equation $P(s) = 4s$. Every time the side length increases by 1 unit, the perimeter increases by exactly 4 units.
                </p>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mt-2">
                    Area grows quadratically because it is determined by the equation $A(s) = s^2$. The rate of change increases at every step:
                </p>
                <ul class="list-disc list-inside mt-3 space-y-1.5 text-gray-600 dark:text-gray-300">
                    <li>Growing from $s=1$ to $s=2$ adds 3 units of area ($4 - 1$).</li>
                    <li>Growing from $s=2$ to $s=3$ adds 5 units of area ($9 - 4$).</li>
                    <li>Growing from $s=9$ to $s=10$ adds 19 units of area ($100 - 81$).</li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-xl font-black text-gray-900 dark:text-white font-outfit mb-3">
                    Why We Learn This
                </h4>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Comparing perimeter and area growth introduces you to quadratic functions. Unlike linear models with constant slopes, quadratic functions have variables raised to the second power. They model acceleration, gravitational curves, and spatial expansion in science and technology.
                </p>
            </div>
        </div>
        
        <!-- Unique Lesson Metadata / Footer -->
        <div class="border-t border-gray-150 dark:border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-bold text-gray-400">
            <div>Unique Lesson ID: <span class="font-mono text-gray-500 dark:text-gray-300">L-ID-9C72D3E5</span></div>
            <a href="../levels/k.php" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl transition-all">
                <i class="fas fa-arrow-left mr-2"></i> BACK TO LEVEL K
            </a>
        </div>
    </div>
</main>

<script>
function updateSquare(side) {
    const sideNum = parseInt(side, 10);
    
    // Update numerical values
    document.getElementById('side-val').innerText = side;
    document.getElementById('perimeter-val').innerText = sideNum * 4;
    document.getElementById('area-val').innerText = sideNum * sideNum;
    
    // Update square box styling (scale layout sizes dynamically)
    const visual = document.getElementById('visual-square');
    const pixelSize = sideNum * 20; // Scale factor
    visual.style.width = pixelSize + 'px';
    visual.style.height = pixelSize + 'px';
    visual.innerText = 's = ' + side;
}

// Initial draw
updateSquare(5);
</script>

<?php
include '../src/footer.php';
?>

