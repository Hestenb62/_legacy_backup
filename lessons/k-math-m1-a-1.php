<?php
/**
 * Hesten's Learning Odyssey - Lesson K.M1.A.1
 * Piecewise Linear Functions: Elevation vs Time
 */

$pageTitle = "Graphs of Piecewise Linear Functions | Hesten's Learning";
$pageDescription = "Learn how to define quantities, choose scales, and translate physical actions into piecewise graphs with interactive stories.";
$pageAuthor = "Hesten's Learning Team";

include '../src/header.php';
?>

<script>
    // Update the URL shown in the browser without reloading the page
    if (window.history.replaceState) {
        window.history.replaceState(null, '', '/110.K.M1.A.01');
    }
</script>

<!-- Breadcrumb Navigation -->
<div class="bg-gray-50 dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 py-4 transition-colors">
    <div class="page-content-wrapper">
        <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400" aria-label="Breadcrumb">
            <a href="../index.php" class="hover:text-rose-600 transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[8px] opacity-30" aria-hidden="true"></i>
            <a href="../levels/k.php" class="hover:text-rose-600 transition-colors">Level K</a>
            <i class="fas fa-chevron-right text-[8px] opacity-30" aria-hidden="true"></i>
            <span class="text-gray-900 dark:text-white">Lesson K.M1.A.1</span>
        </nav>
    </div>
</div>

<main class="container mx-auto px-4 py-12 max-w-6xl">
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-slate-800 shadow-xl overflow-hidden p-8 sm:p-12 transition-all space-y-12">
        
        <!-- Header / Title -->
        <div>
            <!-- Badge -->
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 text-xs font-black tracking-widest uppercase mb-6">
                <i class="fas fa-calculator text-[10px]" aria-hidden="true"></i> Math Lesson K.M1.A.1
            </span>
            
            <h1 class="text-3xl sm:text-5xl font-black text-gray-900 dark:text-white font-outfit tracking-tight mb-4">
                Graphs of Piecewise Linear Functions
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-lg font-medium leading-relaxed max-w-3xl">
                Define appropriate quantities from physical situations, choose logical scales, and translate actions into piecewise graphs.
            </p>
        </div>

        <!-- Student Outcomes & Teacher Insights introduction -->
        <section class="bg-gray-50 dark:bg-slate-800/40 border border-gray-100 dark:border-slate-800/60 p-6 rounded-2xl shadow-sm space-y-4">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-gray-200 dark:border-slate-800 pb-3">
                <h2 class="text-xl text-rose-600 dark:text-rose-400 font-bold font-outfit">Student & Teacher Overview: Lesson 1</h2>
                <span class="text-xs font-bold text-rose-600 bg-rose-50 dark:bg-rose-950/40 dark:text-rose-400 px-3 py-1 rounded-full">Piecewise Linear Functions</span>
            </div>
            
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm font-medium">
                In this lesson, you will learn to define appropriate quantities from physical situations, choose logical scales, and translate actions into piecewise graphs. Explore the interactive ladder simulation below, and read the classroom discussion blocks to master these concepts.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div class="bg-rose-500/5 dark:bg-rose-500/10 border border-rose-500/10 p-5 rounded-xl">
                    <h3 class="text-xs font-black text-rose-600 dark:text-rose-400 uppercase tracking-wider mb-2">Core Student Outcomes</h3>
                    <ul class="text-xs text-gray-600 dark:text-gray-300 list-disc pl-4 space-y-2 font-medium">
                        <li>Define appropriate variables to represent a physical situation.</li>
                        <li>Choose and interpret the scale and origin for a coordinate plane.</li>
                        <li>Understand that the slope of each line segment represents the average rate of change.</li>
                    </ul>
                </div>
                <div class="bg-emerald-500/5 dark:bg-emerald-500/10 border border-emerald-500/10 p-5 rounded-xl">
                    <h3 class="text-xs font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-wider mb-2">Teacher Notes: The Staircase vs Ladder Dilemma</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-300 leading-relaxed font-medium">
                        When modeling motion, help students separate elevation from speed. For instance, standing still on a platform means elevation remains flat, yet time continues to march forward. Slope directly translates to the physical rate of descent or ascent.
                    </p>
                </div>
            </div>
        </section>

        <!-- Interactive Ladder Story -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Visual Animation Frame -->
            <div class="lg:col-span-5 bg-gray-50 dark:bg-slate-800/40 border border-gray-100 dark:border-slate-800/60 p-6 rounded-2xl shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white font-outfit mb-1">Animated Ladder Descent</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4 font-medium">Observe the physical elevation of the climber as he descends and pauses.</p>
                </div>
                
                <div class="relative h-80 bg-white dark:bg-slate-900 rounded-xl flex items-center justify-center overflow-hidden border border-gray-200 dark:border-slate-800">
                    <!-- Simulated Ladder -->
                    <div class="absolute inset-y-6 w-12 flex flex-col justify-between items-center border-l-4 border-r-4 border-slate-400 dark:border-slate-600" aria-hidden="true">
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                        <div class="w-full h-1 bg-slate-350 dark:bg-slate-700"></div>
                    </div>
                    
                    <!-- Ground label -->
                    <div class="absolute bottom-0 w-full text-center py-1 bg-emerald-100 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 text-xs font-black">
                        Ground Level (0 feet)
                    </div>

                    <!-- 3ft step highlight (Water break) -->
                    <div class="absolute bottom-[84px] w-16 h-2 bg-rose-500/20 dark:bg-rose-500/30 rounded" title="Step at 3 feet" aria-hidden="true"></div>
                    <div class="absolute bottom-[92px] text-[10px] text-rose-600 dark:text-rose-400 font-black">3 ft step</div>

                    <!-- Climbing Person Indicator -->
                    <div id="ladder-climber" class="absolute left-1/2 -translate-x-1/2 transition-all duration-100 ease-linear flex flex-col items-center" style="bottom: 252px;">
                        <div class="w-8 h-8 rounded-full bg-rose-600 dark:bg-rose-50 flex items-center justify-center text-white text-xs font-semibold shadow-md" aria-hidden="true">
                            🏃
                        </div>
                        <div class="w-2 h-2 bg-rose-500 rounded-full mt-1 border border-white dark:border-slate-800"></div>
                        <div class="bg-gray-900 dark:bg-slate-950 text-white px-2 py-0.5 rounded text-[10px] mt-1 whitespace-nowrap shadow font-bold" id="elevation-bubble">
                            Height: 10.0 ft
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex flex-col gap-2">
                    <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wider">
                        <span>Time: <span id="display-time-l1" class="text-rose-600 dark:text-rose-400" aria-live="polite">0.0</span>s</span>
                        <span>Status: <span id="display-status-l1" class="text-gray-700 dark:text-gray-300" aria-live="polite">Ready</span></span>
                    </div>
                    <div class="flex gap-2 mt-2">
                        <button onclick="toggleLadderAnimation()" id="btn-play-l1" class="flex-grow py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-black text-xs rounded-xl transition-all shadow-lg shadow-rose-600/20 active:scale-95 cursor-pointer focus:outline-none focus:ring-2 focus:ring-rose-500">
                            Start Journey
                        </button>
                        <button onclick="resetLadderAnimation()" class="px-5 py-2.5 bg-gray-150 hover:bg-gray-200 dark:bg-white/5 dark:hover:bg-white/10 text-gray-700 dark:text-gray-300 font-black text-xs rounded-xl transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Live Sync Graph Frame -->
            <div class="lg:col-span-7 bg-gray-50 dark:bg-slate-800/40 border border-gray-100 dark:border-slate-800/60 p-6 rounded-2xl shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white font-outfit mb-1">Graph: Elevation vs. Time #3</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4 font-medium">Watch the live synchronized marker trace the slope changes on the piecewise graph.</p>
                </div>

                <!-- SVG Graph -->
                <div class="relative w-full aspect-[4/3] bg-white dark:bg-slate-900 rounded-xl p-4 border border-gray-150 dark:border-slate-800">
                    <svg id="ladder-graph" viewBox="0 0 400 300" class="w-full h-full overflow-visible" role="img" aria-label="Piecewise linear graph showing climber elevation over time: descends from 10ft to 3ft in 6s, stays at 3ft until 8.5s, descends to 0ft by 10s, stays at 0ft.">
                        <title>Elevation vs. Time Graph</title>
                        <!-- Grid lines -->
                        <line x1="40" y1="20" x2="380" y2="20" stroke="#cbd5e1" stroke-dasharray="4" class="opacity-30 dark:opacity-10" />
                        <line x1="40" y1="74" x2="380" y2="74" stroke="#cbd5e1" stroke-dasharray="4" class="opacity-30 dark:opacity-10" />
                        <line x1="40" y1="128" x2="380" y2="128" stroke="#cbd5e1" stroke-dasharray="4" class="opacity-30 dark:opacity-10" />
                        <line x1="40" y1="182" x2="380" y2="182" stroke="#cbd5e1" stroke-dasharray="4" class="opacity-30 dark:opacity-10" />
                        <line x1="40" y1="236" x2="380" y2="236" stroke="#cbd5e1" stroke-dasharray="4" class="opacity-30 dark:opacity-10" />

                        <!-- Vertical time grid marks -->
                        <line x1="40" y1="20" x2="40" y2="260" stroke="#cbd5e1" class="opacity-50 dark:opacity-20" />
                        <line x1="108" y1="20" x2="108" y2="260" stroke="#f1f5f9" class="opacity-20 dark:opacity-5" />
                        <line x1="176" y1="20" x2="176" y2="260" stroke="#f1f5f9" class="opacity-20 dark:opacity-5" />
                        <line x1="232.8" y1="20" x2="232.8" y2="260" stroke="#f1f5f9" class="opacity-20 dark:opacity-5" />
                        <line x1="267" y1="20" x2="267" y2="260" stroke="#f1f5f9" class="opacity-20 dark:opacity-5" />
                        <line x1="380" y1="20" x2="380" y2="260" stroke="#f1f5f9" class="opacity-20 dark:opacity-5" />

                        <!-- X & Y Axes -->
                        <line x1="40" y1="260" x2="380" y2="260" stroke="#475569" stroke-width="2" class="dark:stroke-slate-400" />
                        <line x1="40" y1="20" x2="40" y2="260" stroke="#475569" stroke-width="2" class="dark:stroke-slate-400" />

                        <!-- Labels -->
                        <text x="35" y="25" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">10</text>
                        <text x="35" y="79" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">8</text>
                        <text x="35" y="133" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">6</text>
                        <text x="35" y="187" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">4</text>
                        <text x="35" y="241" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">2</text>
                        <text x="35" y="264" text-anchor="end" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">0</text>
                        <text x="15" y="140" transform="rotate(-90 15 140)" text-anchor="middle" class="text-[11px] fill-gray-600 dark:fill-gray-300 font-bold font-outfit">Elevation (feet)</text>

                        <!-- X Axis (Time in seconds) -->
                        <text x="40" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">0</text>
                        <text x="108" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">3</text>
                        <text x="176" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">6</text>
                        <text x="232.8" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">8.5</text>
                        <text x="267" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">10</text>
                        <text x="380" y="275" text-anchor="middle" class="text-[10px] fill-gray-400 dark:fill-gray-500 font-bold">15</text>
                        <text x="210" y="292" text-anchor="middle" class="text-[11px] fill-gray-600 dark:fill-gray-300 font-bold font-outfit">Time (seconds)</text>

                        <!-- Piecewise Function Segments -->
                        <line x1="40" y1="20" x2="176" y2="209" class="stroke-rose-600 dark:stroke-rose-500" stroke="#e11d48" stroke-width="3" stroke-linecap="round" />
                        <line x1="176" y1="209" x2="232.8" y2="209" class="stroke-rose-600 dark:stroke-rose-500" stroke="#e11d48" stroke-width="3" stroke-linecap="round" />
                        <line x1="232.8" y1="209" x2="267" y2="260" class="stroke-rose-600 dark:stroke-rose-500" stroke="#e11d48" stroke-width="3" stroke-linecap="round" />
                        <line x1="267" y1="260" x2="380" y2="260" class="stroke-rose-600 dark:stroke-rose-500" stroke="#e11d48" stroke-width="3" stroke-linecap="round" />

                        <!-- Key Nodes -->
                        <circle cx="40" cy="20" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle cx="176" cy="209" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle cx="232.8" cy="209" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle cx="267" cy="260" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle cx="380" cy="260" r="4" class="fill-rose-600 dark:fill-rose-400" />

                        <!-- Live Tracker Dot -->
                        <circle id="tracker-dot" cx="40" cy="20" r="7" class="fill-rose-500" stroke="#ffffff" stroke-width="2" style="display: none;" />
                    </svg>
                </div>

                <div class="mt-4 bg-white dark:bg-slate-900 p-3 rounded-lg border border-gray-150 dark:border-slate-800">
                    <h4 class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">Segment Explanations</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] text-gray-500 dark:text-gray-400 font-medium">
                        <div id="segment-info-1" class="p-1.5 rounded transition">0 to 6s: Descent down ladder (constant speed)</div>
                        <div id="segment-info-2" class="p-1.5 rounded transition">6 to 8.5s: Standing still (drinking water)</div>
                        <div id="segment-info-3" class="p-1.5 rounded transition">8.5 to 10s: Descending last steps to floor</div>
                        <div id="segment-info-4" class="p-1.5 rounded transition">10 to 15s: At ground level, walking away</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Teacher Guide Discussion & Mathematics Breakdowns -->
        <section class="bg-gray-50 dark:bg-slate-800/40 border border-gray-100 dark:border-slate-800/60 p-6 rounded-2xl shadow-sm space-y-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white font-outfit border-b border-gray-200 dark:border-slate-800 pb-2">Teacher Guide Concepts: Deepen Your Understanding</h3>
            
            <div class="space-y-6 text-sm text-gray-600 dark:text-gray-300 font-medium">
                <div class="p-5 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80">
                    <h4 class="font-bold text-gray-900 dark:text-white mb-2 text-base font-outfit">Concept 1: Is a 2.5 ft/min Descent Speed Realistic on a Ladder?</h4>
                    <p class="leading-relaxed">
                        In Example 1 of the teacher materials, students analyze a graph with a slope representing $2.5\text{ ft/min}$. While mathematically sound, a rate of $2.5\text{ ft/min}$ is incredibly slow for a person physically moving down a standard ladder (about $0.5\text{ inches per second}$). If we shift the horizontal unit of time from minutes to seconds, a speed of $2.5\text{ ft/sec}$ becomes perfectly realistic for a steady descent.
                    </p>
                </div>

                <div class="p-5 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80 space-y-3">
                    <h4 class="font-bold text-gray-900 dark:text-white mb-2 text-base font-outfit">Concept 2: Calculating Average Rate of Change</h4>
                    <p class="leading-relaxed">
                        To compute the average rate of change over any interval, use the change in elevation divided by the change in time:
                    </p>
                    <div class="my-4 font-mono text-center text-xs bg-gray-50 dark:bg-slate-850 p-4 rounded-xl border border-rose-500/20 max-w-md mx-auto">
                        <div class="flex items-center justify-center gap-2 text-gray-800 dark:text-gray-200 font-bold">
                            <span>Average Rate of Change</span> =
                            <div class="flex flex-col items-center">
                                <span class="border-b border-gray-400 dark:border-gray-500 px-2 pb-0.5">Δ Elevation</span>
                                <span class="pt-0.5">Δ Time</span>
                            </div> =
                            <div class="flex flex-col items-center">
                                <span class="border-b border-gray-400 dark:border-gray-500 px-2 pb-0.5">h(t<sub>2</sub>) - h(t<sub>1</sub>)</span>
                                <span class="pt-0.5">t<sub>2</sub> - t<sub>1</sub></span>
                            </div>
                        </div>
                    </div>
                    <p class="leading-relaxed">
                        For instance, between $t = 0$ and $t = 6$ seconds on our ladder descent:
                        $\frac{3 - 10}{6 - 0} = \frac{-7}{6} \approx -1.17\text{ ft/sec}$.
                        This negative rate represents a descent. When discussing descent speed, we refer to its absolute value: $1.17\text{ ft/sec}$.
                    </p>
                </div>

                <div class="p-5 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80">
                    <h4 class="font-bold text-gray-900 dark:text-white mb-2 text-base font-outfit">Concept 3: The 9 Distinct Time Intervals of the Video Story</h4>
                    <p class="leading-relaxed">
                        In the lesson Exit Ticket, teachers analyze the full video of a man traversing stairs and platforms, which features nine distinct linear segments. Segmenting graphs into non-overlapping time intervals is a vital skill. Here are the exact nine time intervals identified in the curriculum guide:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-4 font-mono text-xs text-rose-600 dark:text-rose-400 font-bold">
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">1. Between 0 and 3 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">2. Between 3 and 5.5 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">3. Between 5.5 and 7 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">4. Between 7 and 8.5 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">5. Between 8.5 and 9 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">6. Between 9 and 11 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">7. Between 11 and 12.7 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">8. Between 12.7 and 13 sec</div>
                        <div class="bg-gray-55 dark:bg-slate-800/60 p-3 rounded-lg border border-gray-150 dark:border-slate-850 text-center">9. From 13 sec onward</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Custom User Story Builder -->
        <section class="bg-gray-50 dark:bg-slate-800/40 border border-gray-100 dark:border-slate-800/60 p-6 rounded-2xl shadow-sm space-y-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white font-outfit mb-1">Design Your Own Piecewise Graphing Story</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Modify each step of the journey and watch the custom graph below transform accordingly.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Segment 1 Control -->
                <div class="p-4 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80">
                    <div class="text-xs text-rose-600 dark:text-rose-400 font-bold mb-2">Interval 1: Start (0s) to Point A (4s)</div>
                    <label for="custom-val-a" class="block text-xs text-gray-600 dark:text-gray-400 font-medium mb-1.5">Elevation at 4s:</label>
                    <input type="range" id="custom-val-a" min="0" max="15" value="10" oninput="updateCustomGraph()" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-rose-600 focus:outline-none">
                    <div class="text-right text-xs text-gray-700 dark:text-gray-300 mt-2 font-bold"><span id="custom-lbl-a">10</span> feet</div>
                </div>
                <!-- Segment 2 Control -->
                <div class="p-4 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80">
                    <div class="text-xs text-rose-600 dark:text-rose-400 font-bold mb-2">Interval 2: Point A (4s) to Point B (7s)</div>
                    <label for="custom-val-b" class="block text-xs text-gray-600 dark:text-gray-400 font-medium mb-1.5">Elevation at 7s:</label>
                    <input type="range" id="custom-val-b" min="0" max="15" value="10" oninput="updateCustomGraph()" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-rose-600 focus:outline-none">
                    <div class="text-right text-xs text-gray-700 dark:text-gray-300 mt-2 font-bold"><span id="custom-lbl-b">10</span> feet</div>
                </div>
                <!-- Segment 3 Control -->
                <div class="p-4 bg-white dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800/80">
                    <div class="text-xs text-rose-600 dark:text-rose-400 font-bold mb-2">Interval 3: Point B (7s) to End (10s)</div>
                    <label for="custom-val-c" class="block text-xs text-gray-600 dark:text-gray-400 font-medium mb-1.5">Elevation at 10s:</label>
                    <input type="range" id="custom-val-c" min="0" max="15" value="0" oninput="updateCustomGraph()" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-rose-600 focus:outline-none">
                    <div class="text-right text-xs text-gray-700 dark:text-gray-300 mt-2 font-bold"><span id="custom-lbl-c">0</span> feet</div>
                </div>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-8 items-center">
                <div class="w-full md:w-1/2 max-w-sm">
                    <svg id="user-custom-graph" viewBox="0 0 300 200" class="w-full bg-white dark:bg-slate-900 rounded-xl p-3 border border-gray-150 dark:border-slate-800/80 overflow-visible" role="img" aria-label="Interactive custom piecewise linear graph builder.">
                        <title>Interactive Custom Graph</title>
                        <!-- Axes -->
                        <line x1="30" y1="170" x2="280" y2="170" stroke="#475569" stroke-width="2" class="dark:stroke-slate-400" />
                        <line x1="30" y1="20" x2="30" y2="170" stroke="#475569" stroke-width="2" class="dark:stroke-slate-400" />
                        
                        <!-- Graph limits -->
                        <text x="25" y="25" text-anchor="end" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">15</text>
                        <text x="25" y="174" text-anchor="end" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">0</text>
                        <text x="30" y="182" text-anchor="middle" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">0s</text>
                        <text x="130" y="182" text-anchor="middle" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">4s</text>
                        <text x="205" y="182" text-anchor="middle" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">7s</text>
                        <text x="280" y="182" text-anchor="middle" class="text-[9px] fill-gray-400 dark:fill-gray-500 font-bold">10s</text>

                        <!-- Live path line -->
                        <path id="user-graph-path" d="M 30,170 L 130,70 L 205,70 L 280,170" fill="none" class="stroke-rose-600 dark:stroke-rose-500" stroke="#e11d48" stroke-width="3" />
                        <circle cx="30" cy="170" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle id="user-node-a" cx="130" cy="70" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle id="user-node-b" cx="205" cy="70" r="4" class="fill-rose-600 dark:fill-rose-400" />
                        <circle id="user-node-c" cx="280" cy="170" r="4" class="fill-rose-600 dark:fill-rose-400" />
                    </svg>
                </div>
                <div class="flex-1 bg-rose-500/5 dark:bg-rose-500/10 border border-rose-500/10 p-5 rounded-xl">
                    <h4 class="text-rose-900 dark:text-rose-400 font-bold mb-2 font-outfit">Live Graph Story Interpretations</h4>
                    <ul class="text-xs text-gray-650 dark:text-gray-300 space-y-2 list-disc pl-4 font-medium" id="custom-story-output">
                        <li>0 to 4s: Climber climbs up to 10 feet.</li>
                        <li>4 to 7s: Climber stays stationary at 10 feet.</li>
                        <li>7 to 10s: Climber moves back down to ground level (0 feet).</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Vocabulary & Notes Section -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 pt-6 border-t border-gray-150 dark:border-slate-800/80">
            <!-- Vocabulary Panel -->
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <h3 class="text-xl font-black text-gray-900 dark:text-white font-outfit mb-1">
                        <i class="fas fa-book text-rose-600 dark:text-rose-400 mr-2" aria-hidden="true"></i>Lesson Vocabulary
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Click on any term to see its definition and relevance to piecewise linear graphs.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Card 1 -->
                    <div onclick="toggleVocabCard('vocab-1')" class="group relative bg-gray-55 dark:bg-slate-800/40 hover:bg-rose-500/5 dark:hover:bg-rose-500/10 border border-gray-150 dark:border-slate-800/60 p-5 rounded-2xl cursor-pointer transition-all duration-300 shadow-sm hover:shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors font-outfit">Piecewise Linear Function</h4>
                            <span class="text-gray-400 group-hover:text-rose-500 transition-colors text-xs" id="vocab-1-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-1-body" class="max-h-0 overflow-hidden transition-all duration-350 ease-in-out">
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium mt-3 leading-relaxed border-t border-gray-200/50 dark:border-slate-700/50 pt-2">
                                A function defined by multiple linear segments, each covering a specific interval of time or domain. The overall graph looks like joined straight lines with corners.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div onclick="toggleVocabCard('vocab-2')" class="group relative bg-gray-55 dark:bg-slate-800/40 hover:bg-rose-500/5 dark:hover:bg-rose-500/10 border border-gray-150 dark:border-slate-800/60 p-5 rounded-2xl cursor-pointer transition-all duration-300 shadow-sm hover:shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors font-outfit">Average Rate of Change</h4>
                            <span class="text-gray-400 group-hover:text-rose-500 transition-colors text-xs" id="vocab-2-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-2-body" class="max-h-0 overflow-hidden transition-all duration-350 ease-in-out">
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium mt-3 leading-relaxed border-t border-gray-200/50 dark:border-slate-700/50 pt-2">
                                The change in the dependent variable (elevation) divided by the change in the independent variable (time) over a given interval. Graphically, this is the slope of the line segment.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div onclick="toggleVocabCard('vocab-3')" class="group relative bg-gray-55 dark:bg-slate-800/40 hover:bg-rose-500/5 dark:hover:bg-rose-500/10 border border-gray-150 dark:border-slate-800/60 p-5 rounded-2xl cursor-pointer transition-all duration-300 shadow-sm hover:shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors font-outfit">Independent Variable</h4>
                            <span class="text-gray-400 group-hover:text-rose-500 transition-colors text-xs" id="vocab-3-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-3-body" class="max-h-0 overflow-hidden transition-all duration-350 ease-in-out">
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium mt-3 leading-relaxed border-t border-gray-200/50 dark:border-slate-700/50 pt-2">
                                The input value of a function, which changes independently (usually time, graphed on the horizontal axis).
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div onclick="toggleVocabCard('vocab-4')" class="group relative bg-gray-55 dark:bg-slate-800/40 hover:bg-rose-500/5 dark:hover:bg-rose-500/10 border border-gray-150 dark:border-slate-800/60 p-5 rounded-2xl cursor-pointer transition-all duration-300 shadow-sm hover:shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors font-outfit">Dependent Variable</h4>
                            <span class="text-gray-400 group-hover:text-rose-500 transition-colors text-xs" id="vocab-4-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div id="vocab-4-body" class="max-h-0 overflow-hidden transition-all duration-350 ease-in-out">
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium mt-3 leading-relaxed border-t border-gray-200/50 dark:border-slate-700/50 pt-2">
                                The output value of a function, which depends on the input value (usually elevation/height, graphed on the vertical axis).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lesson Notes & Visual Explainers Panel -->
            <div class="lg:col-span-5 space-y-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-black text-gray-900 dark:text-white font-outfit mb-1">
                        <i class="fas fa-chalkboard-teacher text-rose-600 dark:text-rose-400 mr-2" aria-hidden="true"></i>Visual Study Guides
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Toggle tabs below to explore interactive visual explainers of core concepts.</p>
                </div>

                <!-- Tab Buttons -->
                <div class="flex border-b border-gray-200 dark:border-slate-800 font-outfit">
                    <button onclick="switchExplainerTab('tab-slope')" id="btn-tab-slope" class="flex-1 py-2 text-center text-xs font-bold border-b-2 border-rose-600 text-rose-600 dark:text-rose-400 transition-all cursor-pointer focus:outline-none">
                        Slope & Motion
                    </button>
                    <button onclick="switchExplainerTab('tab-intervals')" id="btn-tab-intervals" class="flex-1 py-2 text-center text-xs font-bold border-b-2 border-transparent text-gray-400 dark:text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-all cursor-pointer focus:outline-none">
                        Time Intervals
                    </button>
                    <button onclick="switchExplainerTab('tab-speed')" id="btn-tab-speed" class="flex-1 py-2 text-center text-xs font-bold border-b-2 border-transparent text-gray-400 dark:text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-all cursor-pointer focus:outline-none">
                        Velocity vs. Speed
                    </button>
                </div>

                <!-- Tab Content Area -->
                <div class="relative bg-gray-55 dark:bg-slate-800/40 border border-gray-150 dark:border-slate-800/60 p-5 rounded-2xl shadow-sm min-h-[300px] flex flex-col justify-between">
                    
                    <!-- TAB 1: Slope & Motion -->
                    <div id="content-tab-slope" class="space-y-4 transition-all duration-300">
                        <div class="space-y-1.5">
                            <span class="text-[10px] font-black text-rose-600 dark:text-rose-400 uppercase tracking-widest">Concept 1: Slopes are Story Actions</span>
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                On a height-vs-time graph, the steepness and direction of a line segment tell you exactly what the climber is doing:
                            </p>
                        </div>

                        <!-- Mini SVG Visual Aid -->
                        <div class="bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-xl p-3 flex justify-center">
                            <svg viewBox="0 0 240 100" class="w-full max-w-[200px] h-auto overflow-visible" role="img" aria-label="Visual aid showing positive, zero, and negative slopes.">
                                <!-- Axes -->
                                <line x1="10" y1="90" x2="230" y2="90" stroke="#94a3b8" stroke-width="1.5" />
                                <line x1="10" y1="10" x2="10" y2="90" stroke="#94a3b8" stroke-width="1.5" />
                                
                                <!-- Positive Slope (Green) -->
                                <line x1="10" y1="90" x2="80" y2="40" stroke="#10b981" stroke-width="3" stroke-linecap="round" />
                                <text x="45" y="30" text-anchor="middle" class="text-[8px] fill-emerald-600 dark:fill-emerald-400 font-bold font-outfit">Ascent (+)</text>
                                
                                <!-- Zero Slope (Yellow) -->
                                <line x1="80" y1="40" x2="150" y2="40" stroke="#f59e0b" stroke-width="3" stroke-linecap="round" />
                                <text x="115" y="30" text-anchor="middle" class="text-[8px] fill-amber-600 dark:fill-amber-400 font-bold font-outfit">Pause (0)</text>

                                <!-- Negative Slope (Red) -->
                                <line x1="150" y1="40" x2="220" y2="90" stroke="#ef4444" stroke-width="3" stroke-linecap="round" />
                                <text x="185" y="30" text-anchor="middle" class="text-[8px] fill-rose-600 dark:fill-rose-400 font-bold font-outfit">Descent (-)</text>
                            </svg>
                        </div>
                        
                        <div class="text-[11px] text-gray-550 dark:text-gray-400 font-medium leading-normal space-y-1">
                            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span><strong>Positive slope:</strong> Rising line. Elevation increases.</div>
                            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span><strong>Zero slope:</strong> Flat line. Elevation is constant (paused/resting).</div>
                            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span><strong>Negative slope:</strong> Falling line. Elevation decreases.</div>
                        </div>
                    </div>

                    <!-- TAB 2: Time Intervals -->
                    <div id="content-tab-intervals" class="hidden space-y-4 transition-all duration-300">
                        <div class="space-y-1.5">
                            <span class="text-[10px] font-black text-rose-600 dark:text-rose-400 uppercase tracking-widest">Concept 2: Slicing the Domain</span>
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                A piecewise graph breaks a continuous domain (time) into distinct parts. Each action occurs within its own boundaries:
                            </p>
                        </div>

                        <!-- Interval Visual SVG Timeline -->
                        <div class="bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-xl p-4">
                            <svg viewBox="0 0 240 50" class="w-full h-auto overflow-visible" role="img" aria-label="Visual timeline dividing domain intervals.">
                                <!-- Base line -->
                                <line x1="10" y1="25" x2="230" y2="25" stroke="#cbd5e1" stroke-width="4" stroke-linecap="round" />
                                
                                <!-- Segments -->
                                <line x1="10" y1="25" x2="100" y2="25" stroke="#f43f5e" stroke-width="4" />
                                <line x1="100" y1="25" x2="160" y2="25" stroke="#3b82f6" stroke-width="4" />
                                
                                <!-- Points -->
                                <circle cx="10" cy="25" r="5" class="fill-gray-400" />
                                <text x="10" y="42" text-anchor="middle" class="text-[8px] fill-gray-400 dark:fill-gray-500 font-bold">0s</text>
                                
                                <circle cx="100" cy="25" r="5" class="fill-rose-500" />
                                <text x="100" y="42" text-anchor="middle" class="text-[8px] fill-rose-500 font-bold">6s</text>
                                
                                <circle cx="160" cy="25" r="5" class="fill-blue-500" />
                                <text x="160" y="42" text-anchor="middle" class="text-[8px] fill-blue-500 font-bold">8.5s</text>
                                
                                <circle cx="230" cy="25" r="5" class="fill-gray-400" />
                                <text x="230" y="42" text-anchor="middle" class="text-[8px] fill-gray-400 dark:fill-gray-500 font-bold">15s</text>

                                <!-- Span markers -->
                                <path d="M 12 18 Q 55 8 98 18" fill="none" stroke="#f43f5e" stroke-width="1" />
                                <text x="55" y="6" text-anchor="middle" class="text-[7px] fill-rose-600 dark:fill-rose-400 font-bold">Interval 1</text>
                                
                                <path d="M 102 18 Q 130 10 158 18" fill="none" stroke="#3b82f6" stroke-width="1" />
                                <text x="130" y="6" text-anchor="middle" class="text-[7px] fill-blue-600 dark:fill-blue-400 font-bold">Interval 2</text>
                            </svg>
                        </div>

                        <div class="text-[11px] text-gray-650 dark:text-gray-305 font-medium leading-normal space-y-1">
                            <p>
                                <strong>Mathematical notation:</strong> Intervals are written as inequality bounds. For example, Segment 1 is active when:
                            </p>
                            <div class="text-center font-mono py-1 px-3 bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-lg text-rose-600 dark:text-rose-400 font-bold inline-block mx-auto">
                                0 &le; t &le; 6
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: Velocity vs. Speed -->
                    <div id="content-tab-speed" class="hidden space-y-4 transition-all duration-300">
                        <div class="space-y-1.5">
                            <span class="text-[10px] font-black text-rose-600 dark:text-rose-400 uppercase tracking-widest">Concept 3: Sign of Rate of Change</span>
                            <p class="text-xs text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Rate of change (velocity) carries direction: it's positive for going up, and negative for going down. Speed is just how fast, always positive:
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3 bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-xl space-y-1 font-outfit">
                                <span class="text-[9px] font-black text-emerald-600 dark:text-emerald-400 uppercase block">Climbing Up</span>
                                <div class="text-xs text-gray-700 dark:text-gray-300 font-bold">Rate: <span class="text-emerald-600 font-black">+1.5 ft/s</span></div>
                                <div class="text-[10px] text-gray-400 dark:text-gray-500 font-bold">Speed: 1.5 ft/s</div>
                            </div>
                            <div class="p-3 bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-xl space-y-1 font-outfit">
                                <span class="text-[9px] font-black text-rose-600 dark:text-rose-400 uppercase block">Climbing Down</span>
                                <div class="text-xs text-gray-700 dark:text-gray-300 font-bold">Rate: <span class="text-rose-600 font-black">-1.17 ft/s</span></div>
                                <div class="text-[10px] text-gray-400 dark:text-gray-500 font-bold">Speed: 1.17 ft/s</div>
                            </div>
                        </div>

                        <div class="bg-rose-500/5 dark:bg-rose-500/10 border border-rose-500/10 p-3 rounded-xl">
                            <p class="text-[10px] text-gray-500 dark:text-gray-400 leading-relaxed font-bold">
                                <i class="fas fa-info-circle text-rose-500 mr-1" aria-hidden="true"></i> 
                                <strong>Key Takeaway:</strong> Average rate of change = slope. Speed = absolute value of the slope. Speed can never be negative!
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Source Citation & Metadata Footer -->
        <div class="border-t border-gray-150 dark:border-slate-800/80 pt-6 space-y-4">
            <div class="p-4 bg-gray-50 dark:bg-slate-900 rounded-xl border border-gray-150 dark:border-slate-800 text-xs text-gray-500 dark:text-gray-400 space-y-1 leading-relaxed">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-wider block">Source Citation (MLA)</span>
                <p class="italic text-gray-650 dark:text-gray-300 font-medium">Great Minds. "Graphs of Piecewise Linear Functions." Eureka Math, 2015. NYS Common Core Mathematics Curriculum.</p>
                <p class="text-[10px] text-gray-400">Developed using lesson materials from standard algebra curricula.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-bold text-gray-400">
                <div>Unique Lesson ID: <span class="font-mono text-gray-500 dark:text-gray-300">L-ID-PIECEWISE-L1</span></div>
                <a href="../levels/k.php" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 font-black text-xs rounded-xl transition-all cursor-pointer focus:outline-none focus:ring-2 focus:ring-rose-500">
                    <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i> BACK TO LEVEL K
                </a>
            </div>
        </div>

    </div>
</main>

<!-- Vanilla Javascript Logic for Graph Animation and Interactive State Controls -->
<script>
    // ==================== LESSON 1: LADDER DESCENT ANIMATION ENGINE ====================
    let ladderAnimationTimer = null;
    let ladderTime = 0;
    const totalLadderDuration = 15; // seconds
    const ladderClimber = document.getElementById('ladder-climber');
    const trackerDot = document.getElementById('tracker-dot');
    const displayTimeL1 = document.getElementById('display-time-l1');
    const displayStatusL1 = document.getElementById('display-status-l1');
    const btnPlayL1 = document.getElementById('btn-play-l1');

    function toggleLadderAnimation() {
        if (ladderAnimationTimer) {
            // Pause animation
            clearInterval(ladderAnimationTimer);
            ladderAnimationTimer = null;
            btnPlayL1.innerText = 'Resume Journey';
            displayStatusL1.innerText = 'Paused';
        } else {
            // Start animation loop
            btnPlayL1.innerText = 'Pause Journey';
            displayStatusL1.innerText = 'Climbing';
            trackerDot.style.display = 'block';

            ladderAnimationTimer = setInterval(() => {
                ladderTime += 0.05;
                if (ladderTime >= totalLadderDuration) {
                    ladderTime = totalLadderDuration;
                    clearInterval(ladderAnimationTimer);
                    ladderAnimationTimer = null;
                    btnPlayL1.innerText = 'Restart Journey';
                    displayStatusL1.innerText = 'Completed';
                }
                updateLadderState(ladderTime);
            }, 50);
        }
    }

    function resetLadderAnimation() {
        if (ladderAnimationTimer) {
            clearInterval(ladderAnimationTimer);
            ladderAnimationTimer = null;
        }
        ladderTime = 0;
        updateLadderState(0);
        btnPlayL1.innerText = 'Start Journey';
        displayStatusL1.innerText = 'Ready';
        trackerDot.style.display = 'none';
    }

    // Calculate and update the physical and graphed position coordinates
    function updateLadderState(time) {
        let height = 10;
        let statusText = 'Descending';

        // Reset segment highlight stylings
        for (let i = 1; i <= 4; i++) {
            document.getElementById(`segment-info-${i}`).className = 'p-1.5 rounded transition bg-transparent text-gray-500 dark:text-gray-400';
        }

        if (time <= 6) {
            // Interval 1: 0 to 6 seconds. Linear descent from 10ft down to 3ft.
            height = 10 - (7 / 6) * time;
            document.getElementById('segment-info-1').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else if (time <= 8.5) {
            // Interval 2: 6 to 8.5 seconds. Drinking water (stays flat at 3ft)
            height = 3;
            statusText = 'Drinking Water';
            document.getElementById('segment-info-2').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else if (time <= 10) {
            // Interval 3: 8.5 to 10 seconds. Descent to ground (3ft to 0ft)
            height = 3 - (3 / 1.5) * (time - 8.5);
            document.getElementById('segment-info-3').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        } else {
            // Interval 4: 10 to 15 seconds. Walk in the kitchen (0ft elevation)
            height = 0;
            statusText = 'Walking into kitchen';
            document.getElementById('segment-info-4').className = 'p-1.5 rounded transition bg-rose-500/10 text-rose-600 dark:text-rose-400 font-bold';
        }

        // Limit bounds safely
        height = Math.max(0, Math.min(10, height));

        // Update physical climber height on page layout
        const bottomPercent = 24 + (height * 22.8);
        ladderClimber.style.bottom = `${bottomPercent}px`;
        document.getElementById('elevation-bubble').innerText = `Height: ${height.toFixed(1)} ft`;
        displayTimeL1.innerText = time.toFixed(1);
        displayStatusL1.innerText = statusText;

        // Map graph tracking node position
        const trackerX = 40 + (time / 15) * 340;
        const trackerY = 260 - (height / 10) * 240;

        trackerDot.setAttribute('cx', trackerX);
        trackerDot.setAttribute('cy', trackerY);
    }


    // ==================== USER CUSTOM STORY PLOTTER ====================
    function updateCustomGraph() {
        const valA = parseFloat(document.getElementById('custom-val-a').value);
        const valB = parseFloat(document.getElementById('custom-val-b').value);
        const valC = parseFloat(document.getElementById('custom-val-c').value);

        // Update text labels
        document.getElementById('custom-lbl-a').innerText = valA;
        document.getElementById('custom-lbl-b').innerText = valB;
        document.getElementById('custom-lbl-c').innerText = valC;

        // Update SVG nodes
        const yA = 170 - (valA / 15) * 150;
        const yB = 170 - (valB / 15) * 150;
        const yC = 170 - (valC / 15) * 150;

        // Move the line nodes
        document.getElementById('user-node-a').setAttribute('cy', yA);
        document.getElementById('user-node-b').setAttribute('cy', yB);
        document.getElementById('user-node-c').setAttribute('cy', yC);

        // Reconstruct path string
        const pathD = `M 30,170 L 130,${yA} L 205,${yB} L 280,${yC}`;
        document.getElementById('user-graph-path').setAttribute('d', pathD);

        // Generate verbal descriptions
        const storyList = document.getElementById('custom-story-output');
        storyList.innerHTML = '';

        let segment1Text = `0 to 4s: Climber `;
        if (valA > 0) {
            segment1Text += `climbs from ground level to ${valA} feet.`;
        } else {
            segment1Text += `remains flat at ground level.`;
        }

        let segment2Text = `4 to 7s: Climber `;
        if (valB > valA) {
            segment2Text += `continues climbing up from ${valA} feet to ${valB} feet.`;
        } else if (valB < valA) {
            segment2Text += `descends down from ${valA} feet to ${valB} feet.`;
        } else {
            segment2Text += `remains completely stationary at ${valA} feet.`;
        }

        let segment3Text = `7 to 10s: Climber `;
        if (valC > valB) {
            segment3Text += `ascends up to ${valC} feet.`;
        } else if (valC < valB) {
            segment3Text += `descends down to ${valC} feet.`;
        } else {
            segment3Text += `holds position constant at ${valB} feet.`;
        }

        storyList.innerHTML += `<li>${segment1Text}</li>`;
        storyList.innerHTML += `<li>${segment2Text}</li>`;
        storyList.innerHTML += `<li>${segment3Text}</li>`;
    }

    // ==================== LESSON VOCAB & NOTES FUNCTIONALITY ====================
    function toggleVocabCard(id) {
        const body = document.getElementById(`${id}-body`);
        const icon = document.getElementById(`${id}-icon`);
        
        if (body.style.maxHeight && body.style.maxHeight !== '0px') {
            body.style.maxHeight = '0px';
            icon.innerHTML = '<i class="fas fa-chevron-down"></i>';
        } else {
            // Close other open cards
            const allBodies = document.querySelectorAll('[id$="-body"]');
            const allIcons = document.querySelectorAll('[id$="-icon"]');
            allBodies.forEach(b => {
                if (b.id.startsWith('vocab-')) b.style.maxHeight = '0px';
            });
            allIcons.forEach(i => {
                if (i.id.startsWith('vocab-')) i.innerHTML = '<i class="fas fa-chevron-down"></i>';
            });
            
            body.style.maxHeight = body.scrollHeight + 'px';
            icon.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }
    }

    function switchExplainerTab(tabId) {
        const tabs = ['tab-slope', 'tab-intervals', 'tab-speed'];
        
        tabs.forEach(t => {
            const btn = document.getElementById(`btn-${t}`);
            const content = document.getElementById(`content-${t}`);
            
            if (t === tabId) {
                // Activate
                btn.className = "flex-1 py-2 text-center text-xs font-bold border-b-2 border-rose-600 text-rose-600 dark:text-rose-400 transition-all cursor-pointer focus:outline-none";
                content.classList.remove('hidden');
            } else {
                // Deactivate
                btn.className = "flex-1 py-2 text-center text-xs font-bold border-b-2 border-transparent text-gray-400 dark:text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-all cursor-pointer focus:outline-none";
                content.classList.add('hidden');
            }
        });
    }

    window.onload = function() {
        updateCustomGraph();
    }
</script>

<?php
include '../src/footer.php';
?>
