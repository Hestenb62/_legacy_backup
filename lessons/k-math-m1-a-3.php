<?php
$pageTitle = "Graphs of Exponential Functions | Hesten's Learning";
$pageDescription = "Examine how quantities grow by constant factors rather than constant differences with interactive exponential simulations.";
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
            <span class="text-gray-900 dark:text-white">Lesson K.M1.A.3</span>
        </nav>
    </div>
</div>

<main class="container mx-auto px-4 py-12 max-w-4xl">
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-slate-800 shadow-xl overflow-hidden p-8 sm:p-12 transition-all">
        <!-- Badge -->
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 text-xs font-black tracking-widest uppercase mb-6">
            <i class="fas fa-calculator text-[10px]"></i> Math Lesson K.M1.A.3
        </span>
        
        <h1 class="text-3xl sm:text-5xl font-black text-gray-900 dark:text-white font-outfit tracking-tight mb-4">
            Graphs of Exponential Functions
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-lg font-medium leading-relaxed mb-8">
            What happens when a quantity doubles at every step? Explore the fundamental difference between linear addition and exponential multiplication!
        </p>

        <!-- Interactive Simulation: Doubling Simulator -->
        <div class="bg-gray-50 dark:bg-slate-800/50 rounded-2xl p-6 mb-10 border border-gray-100 dark:border-slate-800">
            <h3 class="text-lg font-black text-gray-900 dark:text-white font-outfit mb-3">
                <i class="fas fa-chart-line text-rose-500 mr-2"></i> Exponential Doubling Simulator ($y = 2^x$)
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                Move the step slider from $x = 0$ to $x = 8$. Observe how linear growth increases by adding $2$, while exponential growth explodes by multiplying by $2$ at each step!
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-6">
                <!-- Control Panel -->
                <div class="space-y-6">
                    <div>
                        <label for="step-slider" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                            Step ($x$): <span id="step-val" class="text-rose-600 font-black">3</span>
                        </label>
                        <input type="range" id="step-slider" min="0" max="8" value="3" oninput="updateExponential(this.value)" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-rose-600 focus:outline-none">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white dark:bg-slate-900 p-4 rounded-xl border border-gray-100 dark:border-slate-800">
                            <span class="block text-[10px] font-black text-gray-400 uppercase">Linear ($2x$)</span>
                            <span id="linear-val" class="text-2xl font-black text-gray-900 dark:text-white">6</span>
                        </div>
                        <div class="bg-white dark:bg-slate-900 p-4 rounded-xl border border-gray-100 dark:border-slate-800">
                            <span class="block text-[10px] font-black text-gray-400 uppercase">Exponential ($2^x$)</span>
                            <span id="exp-val" class="text-2xl font-black text-rose-600">8</span>
                        </div>
                    </div>
                </div>
                
                <!-- Visual Bar Comparison -->
                <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-gray-100 dark:border-slate-800 h-64 flex flex-col justify-end gap-4">
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-gray-500 w-16">Linear:</span>
                        <div class="flex-1 bg-gray-100 dark:bg-slate-800 rounded-full h-6 overflow-hidden">
                            <div id="linear-bar" class="bg-gray-400 h-full transition-all duration-200" style="width: 10%;"></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-rose-500 w-16">Exp ($2^x$):</span>
                        <div class="flex-1 bg-gray-100 dark:bg-slate-800 rounded-full h-6 overflow-hidden">
                            <div id="exp-bar" class="bg-rose-500 h-full transition-all duration-200" style="width: 15%;"></div>
                        </div>
                    </div>
                    <div class="text-center text-xs font-bold text-gray-400 mt-2">
                        Ratio: Exponential is <span id="ratio-val" class="text-rose-600">1.33x</span> the linear value
                    </div>
                </div>
            </div>
        </div>

        <!-- Explanations -->
        <div class="space-y-8 mb-10">
            <div>
                <h4 class="text-xl font-black text-gray-900 dark:text-white font-outfit mb-3">
                    Constant Differences vs. Constant Factors
                </h4>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    A **linear function** grows by equal differences over equal intervals: each unit step adds a constant $m$. 
                    An **exponential function** grows by equal factors over equal intervals: each unit step multiplies the current total by a constant base $b$.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="p-4 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-slate-800">
                        <div class="font-black text-sm text-gray-900 dark:text-white mb-1">Linear Form: $f(x) = mx + b$</div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Repeated addition. Constant rate of change (slope).</p>
                    </div>
                    <div class="p-4 bg-rose-50/50 dark:bg-rose-900/10 rounded-xl border border-rose-100 dark:border-rose-900/20">
                        <div class="font-black text-sm text-rose-600 dark:text-rose-400 mb-1">Exponential Form: $f(x) = a \cdot b^x$</div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Repeated multiplication. Accelerating growth ($b > 1$) or decay ($0 < b < 1$).</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metadata -->
        <div class="border-t border-gray-150 dark:border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-bold text-gray-400">
            <div>Unique Lesson ID: <span class="font-mono text-gray-500 dark:text-gray-300">L-ID-EXP481A</span></div>
            <a href="../levels/k.php" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl transition-all">
                <i class="fas fa-arrow-left mr-2"></i> BACK TO LEVEL K
            </a>
        </div>
    </div>
</main>

<script>
function updateExponential(step) {
    const x = parseInt(step, 10);
    const linear = 2 * x;
    const exp = Math.pow(2, x);

    document.getElementById('step-val').innerText = x;
    document.getElementById('linear-val').innerText = linear;
    document.getElementById('exp-val').innerText = exp;

    // Scale bars (max 256 for x=8)
    const linearPct = Math.min(100, Math.max(5, (linear / 256) * 100));
    const expPct = Math.min(100, Math.max(5, (exp / 256) * 100));

    document.getElementById('linear-bar').style.width = linearPct + '%';
    document.getElementById('exp-bar').style.width = expPct + '%';

    const ratio = linear === 0 ? 'Infinite' : (exp / linear).toFixed(2) + 'x';
    document.getElementById('ratio-val').innerText = ratio;
}

// Initial draw
updateExponential(3);
</script>

<?php
$lessonId = 'k-math-m1-a-3';
$lessonCode = 'K.M1.A.3';
$lessonTitle = 'Graphs of Exponential Functions';
$lessonStandard = 'HSF.LE.A.1';
$levelId = 'k';
$levelUrl = '../levels/k.php';
$prevLessonUrl = 'k-math-m1-a-2.php';
$nextLessonUrl = 'k-math-m1-a-4.php';
$practiceQuestions = [
    [
        'question' => 'A population starts with 5 cells and triples every hour. Which expression models the population after t hours?',
        'options' => [
            'P(t) = 5 + 3t',
            'P(t) = 5 · 3ᵗ',
            'P(t) = 3 · 5ᵗ',
            'P(t) = (5 · 3) + t'
        ],
        'correct' => 1,
        'explanation' => 'In exponential form P(t) = a · bᵗ, initial amount a = 5 and growth multiplier base b = 3. Therefore P(t) = 5 · 3ᵗ.'
    ],
    [
        'question' => 'As x becomes very large, what is always true when comparing an exponential function (b > 1) to a linear function?',
        'options' => [
            'The linear function will eventually exceed the exponential function',
            'The exponential function will eventually grow much faster and exceed any linear function',
            'Both functions will remain parallel forever',
            'The exponential function will decay to zero'
        ],
        'correct' => 1,
        'explanation' => 'Because exponential functions multiply by a constant factor greater than 1 at each step, an exponential quantity will always eventually outpace any linear function.'
    ]
];
include '../src/lesson_runner.php';
include '../src/footer.php';
?>
