<?php
// Page variables and state
$pageTitle = "Algebra I Regents Assessment";
$isGrading = false;
$studentName = "";
$assessmentDate = "";

// Initialize variables for scoring
$mcScore = 0;
$studentAnswers = [];

// The correct answers for Part I (Questions 1 to 24)
$mcAnswerKey = [
    1=>1, 2=>1, 3=>3, 4=>1, 5=>3, 6=>4, 7=>1, 8=>3, 
    9=>1, 10=>3, 11=>2, 12=>1, 13=>2, 14=>2, 15=>2, 16=>4, 
    17=>2, 18=>4, 19=>1, 20=>4, 21=>4, 22=>3, 23=>3, 24=>4
];

// The official January 2026 Conversion Chart mapping raw scores to scale scores
$conversionChart = [
    82=>100, 81=>99, 80=>98, 79=>96, 78=>95, 77=>93, 76=>92, 75=>91, 74=>90, 73=>89, 72=>88, 71=>87,
    70=>86, 69=>85, 68=>84, 67=>84, 66=>83, 65=>82, 64=>82, 63=>81, 62=>81, 61=>80, 60=>80, 59=>79,
    58=>79, 57=>78, 56=>78, 55=>77, 54=>77, 53=>76, 52=>76, 51=>75, 50=>75, 49=>74, 48=>74, 47=>73,
    46=>73, 45=>73, 44=>72, 43=>72, 42=>71, 41=>71, 40=>70, 39=>70, 38=>70, 37=>69, 36=>69, 35=>68,
    34=>68, 33=>67, 32=>67, 31=>66, 30=>66, 29=>66, 28=>65, 27=>64, 26=>63, 25=>62, 24=>62, 23=>61,
    22=>60, 21=>59, 20=>58, 19=>56, 18=>55, 17=>54, 16=>52, 15=>50, 14=>49, 13=>47, 12=>44, 11=>42,
    10=>40, 9=>37, 8=>34, 7=>31, 6=>27, 5=>23, 4=>19, 3=>15, 2=>10, 1=>5, 0=>0
];

$rubrics = [
    25 => "2 credits for x = 3/12 or 1/4 or equivalent.",
    26 => "2 credits for a correct graph of f(x) = 3(2)^x over the interval -1 to 2.",
    27 => "2 credits for -12x^3 - 8x^2 + 13x - 3.",
    28 => "2 credits for a correct box plot with Min: 70, Q1: 83, Q2: 88, Q3: 94, Max: 98.",
    29 => "2 credits for y = (2/3)x - 1.",
    30 => "2 credits for 5, and correct algebraic work shown.",
    31 => "4 credits for a correct sketch, and 2.5 and 100 are stated.",
    32 => "4 credits for (4 +/- 2sqrt(10)) / 4 or equivalent.",
    33 => "4 credits for y = -56.97x + 2352.22, r = -0.98, and strong is stated.",
    34 => "4 credits for both inequalities graphed correctly, labeled S, and a correct explanation indicating a negative response.",
    35 => "6 credits for 30x+10y=3700, 15x+20y=3575, a correct justification, and correct algebraic work finding x=85 and y=115."
];

// Process form submission
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $isGrading = true;
    $studentName = htmlspecialchars($_POST['student_name'] ?? 'Student');
    $assessmentDate = htmlspecialchars($_POST['assessment_date'] ?? date('Y-m-d'));
    
    // Grade Part 1
    for ($i = 1; $i <= 24; $i++) {
        $submittedAns = (int)($_POST["q{$i}"] ?? 0);
        $studentAnswers[$i] = $submittedAns;
        if ($submittedAns === $mcAnswerKey[$i]) {
            $mcScore += 2;
        }
    }
    
    // Collect Part 2, 3, 4 answers
    for ($i = 25; $i <= 35; $i++) {
        $studentAnswers[$i] = htmlspecialchars($_POST["q{$i}"] ?? 'No answer provided.');
    }
}
?>
<?php
$pageDescription = "Algebra I Regents Assessment for students.";
$pageKeywords = "algebra, regents, assessment, test, math";
$pageAuthor = "Hesten\'s Learning";

include '..\src\header.php';
?>
<style>
    .math { font-family: "Times New Roman", Times, serif; font-style: italic; }
    .question-card { display: none; }
    .question-card.active { display: block; animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    /* Teacher Grading Visibility */
    body:not(.teacher-mode) .teacher-grading-btn-container { display: none !important; }
    body.teacher-mode .teacher-grading-btn-container { display: block !important; }
</style>


    <main class="container mx-auto p-4 md:p-8 max-w-4xl">
        
        <?php if ($isGrading): ?>
        
        <div class="bg-white p-6 md:p-10 rounded-2xl shadow-xl mb-8 border-t-8 border-purple-500">
            <h1 class="text-3xl text-purple-700 mb-4 tracking-wide">Interactive Grading Dashboard</h1>
            <p class="text-gray-600 mb-8">Part I has been automatically graded. Please use the official rubrics below to score the constructed responses for Parts II, III, and IV. The final scale score will update automatically at the bottom of the screen as you grade.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-500 uppercase tracking-wider mb-1">Student</p>
                    <p class="text-xl text-gray-800"><?php echo $studentName; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-500 uppercase tracking-wider mb-1">Part I Auto-Grade</p>
                    <p class="text-xl text-green-600"><?php echo $mcScore; ?> / 48 points</p>
                </div>
            </div>

            <h2 class="text-2xl text-blue-800 mb-6 border-b border-blue-200 pb-2 mt-12">Part II Grading (2 credits each)</h2>
            
            <?php 
            $maxScores = [25=>2, 26=>2, 27=>2, 28=>2, 29=>2, 30=>2, 31=>4, 32=>4, 33=>4, 34=>4, 35=>6];
            
            for ($i = 25; $i <= 35; $i++): 
                if ($i == 31) echo '<h2 class="text-2xl text-blue-800 mb-6 border-b border-blue-200 pb-2 mt-12">Part III Grading (4 credits each)</h2>';
                if ($i == 35) echo '<h2 class="text-2xl text-blue-800 mb-6 border-b border-blue-200 pb-2 mt-12">Part IV Grading (6 credits)</h2>';
            ?>
                <div class="bg-gray-50 p-5 rounded-xl border border-gray-200 mb-6 space-y-4">
                    <p class="text-lg text-gray-800">Question <?php echo $i; ?></p>
                    <div class="bg-white p-4 rounded border border-gray-200 text-gray-600 whitespace-pre-wrap"><?php echo $studentAnswers[$i]; ?></div>
                    <div class="bg-blue-50 p-3 rounded text-blue-800 text-sm">Official Rubric: <?php echo $rubrics[$i]; ?></div>
                    
                    <div class="pt-2">
                        <label class="text-gray-700 mr-4">Assign Score:</label>
                        <select class="cr-score-dropdown px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-purple-400 focus:outline-none" onchange="updateFinalScore()">
                            <option value="0" selected>0</option>
                            <?php for ($s = 1; $s <= $maxScores[$i]; $s++): ?>
                                <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            <?php endfor; ?>
            
        </div>

        <div class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 shadow-2xl p-4 md:p-6 z-50">
            <div class="container mx-auto max-w-4xl flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-center">
                    <p class="text-gray-500 text-sm uppercase tracking-wider">Total Raw Score</p>
                    <p class="text-3xl text-gray-800"><span id="live-raw-score"><?php echo $mcScore; ?></span> / 82</p>
                </div>
                <div class="text-center">
                    <p class="text-blue-500 text-sm uppercase tracking-wider">Scale Score</p>
                    <p class="text-4xl text-blue-700" id="live-scale-score">0</p>
                </div>
                <div class="text-center">
                    <p class="text-purple-500 text-sm uppercase tracking-wider">Performance Level</p>
                    <p class="text-3xl text-purple-700">Level <span id="live-perf-level">1</span></p>
                </div>
            </div>
        </div>

        <script>
            const conversionChart = <?php echo json_encode($conversionChart); ?>;
            const mcScore = <?php echo $mcScore; ?>;

            function updateFinalScore() {
                let crScore = 0;
                document.querySelectorAll('.cr-score-dropdown').forEach(select => {
                    crScore += parseInt(select.value || 0);
                });
                
                let totalRaw = mcScore + crScore;
                if (totalRaw > 82) totalRaw = 82;
                
                let scale = conversionChart[totalRaw] || 0;
                let level = 1;
                
                if (scale >= 85) level = 5;
                else if (scale >= 75) level = 4;
                else if (scale >= 65) level = 3;
                else if (scale >= 55) level = 2;

                document.getElementById('live-raw-score').textContent = totalRaw;
                document.getElementById('live-scale-score').textContent = scale;
                document.getElementById('live-perf-level').textContent = level;
            }
            
            updateFinalScore();
        </script>
        
        <?php else: ?>

        <form id="assessment-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl">

            <header class="border-b border-gray-200 pb-6 mb-8 text-center md:text-left relative">
                <h1 id="main-heading" class="text-3xl md:text-4xl text-blue-700 mb-3 tracking-tight">Algebra I Regents Examination</h1>
                <p class="text-lg text-gray-600 mb-3">January 2026 Administration</p>
                <button type="button" onclick="showDisclosure()" class="text-sm font-medium text-blue-500 hover:text-blue-600 hover:underline transition-colors flex items-center justify-center md:justify-start gap-1 mx-auto md:mx-0">
                    <i class="fas fa-info-circle"></i> Public Resource Disclosure
                </button>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="student-name" class="block text-gray-700 mb-2">Student Name</label>
                    <input type="text" id="student-name" name="student_name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                        placeholder="Enter full name">
                </div>
                <div>
                    <label for="assessment-date" class="block text-gray-700 mb-2">Assessment Date</label>
                    <input type="date" id="assessment-date" name="assessment_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">
                </div>
            </div>

            <div class="mb-8">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span id="progress-text">Loading quiz...</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progress-bar-fill" class="bg-blue-600 h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            <div id="quiz-container" class="min-h-[400px]">

                <div class="question-card" data-index="1">
                    <p class="text-lg mb-4 text-gray-800 q-text">1. A parabola is graphed on a set of axes below. What are the equation of the axis of symmetry and the coordinates of the vertex of this parabola?</p>
                    <div class="flex justify-center mb-6">
                        <svg class="w-48 h-48 border border-gray-300 bg-white" viewBox="-2 -2 12 12">
                            <!-- Grid lines -->
                            <pattern id="grid1" width="1" height="1" patternUnits="userSpaceOnUse"><path d="M 1 0 L 0 0 0 1" fill="none" stroke="#e5e7eb" stroke-width="0.1"/></pattern>
                            <rect width="10" height="10" fill="url(#grid1)" transform="translate(-2, -2)"/>
                            <!-- Axes -->
                            <line x1="0" y1="-2" x2="0" y2="10" stroke="#000" stroke-width="0.1" />
                            <line x1="-2" y1="5" x2="10" y2="5" stroke="#000" stroke-width="0.1" />
                            <!-- Parabola vertex at (3, 9) because SVG y goes down. Original is (3, -4) from x axis -->
                            <path d="M 1.5 2 Q 3 13 4.5 2" fill="none" stroke="#2563eb" stroke-width="0.2" />
                            <circle cx="3" cy="9" r="0.2" fill="#ef4444" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer border border-transparent hover:border-gray-200"><input type="radio" name="q1" value="1" class="mr-2"> (1) x = 3 and (3, -4)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer border border-transparent hover:border-gray-200"><input type="radio" name="q1" value="2" class="mr-2"> (2) y = 3 and (3, -4)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer border border-transparent hover:border-gray-200"><input type="radio" name="q1" value="3" class="mr-2"> (3) x = -4 and (-4, 3)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer border border-transparent hover:border-gray-200"><input type="radio" name="q1" value="4" class="mr-2"> (4) y = -4 and (-4, 3)</label>
                    </div>
                </div>

                <div class="question-card" data-index="2">
                    <p class="text-lg mb-4 text-gray-800 q-text">2. The product of <span class="math">&radic;25</span> and <span class="math">&radic;2</span> will result in</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="1" class="mr-2"> (1) an irrational number</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="2" class="mr-2"> (2) a rational number</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="3" class="mr-2"> (3) a natural number</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="4" class="mr-2"> (4) an integer</label>
                    </div>
                </div>

                <div class="question-card" data-index="3">
                    <p class="text-lg mb-4 text-gray-800 q-text">3. When <span class="math">f(x) = |4x + 2|</span> and <span class="math">g(x) = 3x + 5</span> are graphed on the same set of axes, for which value of x is <span class="math">f(x) = g(x)</span>?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="1" class="mr-2"> (1) 1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="2" class="mr-2"> (2) 2</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="3" class="mr-2"> (3) 3</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="4" class="mr-2"> (4) 1/4</label>
                    </div>
                </div>

                <div class="question-card" data-index="4">
                    <p class="text-lg mb-4 text-gray-800 q-text">4. The expression <span class="math">x<sup>2</sup> - 26x - 120</span> is equivalent to</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="1" class="mr-2"> (1) (x + 4)(x - 30)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="2" class="mr-2"> (2) (x - 4)(x + 30)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="3" class="mr-2"> (3) (x - 20)(x + 6)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="4" class="mr-2"> (4) (x + 20)(x - 6)</label>
                    </div>
                </div>

                <div class="question-card" data-index="5">
                    <p class="text-lg mb-4 text-gray-800 q-text">5. The expression <span class="math">3 - 2&radic;5 + 6&radic;5</span> is equivalent to</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q5" value="1" class="mr-2"> (1) 7&radic;5</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q5" value="2" class="mr-2"> (2) 7&radic;10</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q5" value="3" class="mr-2"> (3) 3 + 4&radic;5</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q5" value="4" class="mr-2"> (4) 3 + 4&radic;10</label>
                    </div>
                </div>

                <div class="question-card" data-index="6">
                    <p class="text-lg mb-4 text-gray-800 q-text">6. Students were asked to write a polynomial given the following conditions: the degree is 3, the leading coefficient is 2, the constant term is -6. Which expression satisfies all three conditions?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q6" value="1" class="mr-2"> (1) 4x - 6 + 3x<sup>2</sup></label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q6" value="2" class="mr-2"> (2) 3x<sup>2</sup> - 6x + 4</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q6" value="3" class="mr-2"> (3) 4 - 6x + 2x<sup>3</sup></label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q6" value="4" class="mr-2"> (4) 4x<sup>2</sup> + 2x<sup>3</sup> - 6</label>
                    </div>
                </div>

                <div class="question-card" data-index="7">
                    <p class="text-lg mb-4 text-gray-800 q-text">7. Which graph below represents a function?</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="border p-2 bg-white flex flex-col items-center">
                            <svg class="w-24 h-24" viewBox="0 0 10 10">
                                <line x1="1" y1="1" x2="1" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="1" y1="9" x2="9" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <circle cx="2" cy="7" r="0.4" fill="#000"/>
                                <circle cx="4" cy="5" r="0.4" fill="#000"/>
                                <circle cx="6" cy="5" r="0.4" fill="#000"/>
                                <circle cx="8" cy="2" r="0.4" fill="#000"/>
                            </svg>
                            <label class="mt-2"><input type="radio" name="q7" value="1" class="mr-1"> (1)</label>
                        </div>
                        <div class="border p-2 bg-white flex flex-col items-center">
                            <svg class="w-24 h-24" viewBox="0 0 10 10">
                                <line x1="1" y1="1" x2="1" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="1" y1="9" x2="9" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="2" y1="8" x2="4" y2="8" stroke="#000" stroke-width="0.3"/>
                                <line x1="4" y1="5" x2="6" y2="5" stroke="#000" stroke-width="0.3"/>
                                <circle cx="4" cy="5" r="0.4" fill="none" stroke="#000" stroke-width="0.2"/>
                            </svg>
                            <label class="mt-2"><input type="radio" name="q7" value="2" class="mr-1"> (2)</label>
                        </div>
                        <div class="border p-2 bg-white flex flex-col items-center">
                            <svg class="w-24 h-24" viewBox="0 0 10 10">
                                <line x1="1" y1="1" x2="1" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="1" y1="9" x2="9" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <circle cx="3" cy="7" r="0.4" fill="#000"/>
                                <circle cx="5" cy="4" r="0.4" fill="#000"/>
                                <circle cx="5" cy="6" r="0.4" fill="#000"/>
                            </svg>
                            <label class="mt-2"><input type="radio" name="q7" value="3" class="mr-1"> (3)</label>
                        </div>
                        <div class="border p-2 bg-white flex flex-col items-center">
                            <svg class="w-24 h-24" viewBox="0 0 10 10">
                                <line x1="1" y1="1" x2="1" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="1" y1="9" x2="9" y2="9" stroke="#ccc" stroke-width="0.1"/>
                                <line x1="3" y1="4" x2="3" y2="8" stroke="#000" stroke-width="0.3"/>
                            </svg>
                            <label class="mt-2"><input type="radio" name="q7" value="4" class="mr-1"> (4)</label>
                        </div>
                    </div>
                </div>

                <div class="question-card" data-index="8">
                    <p class="text-lg mb-4 text-gray-800 q-text">8. The following function models the value of a diamond ring, in dollars, t years after it is purchased: <span class="math">v(t) = 500(1.08)<sup>t</sup></span>. What was the original price of the ring, in dollars?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q8" value="1" class="mr-2"> (1) $108</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q8" value="2" class="mr-2"> (2) $460</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q8" value="3" class="mr-2"> (3) $500</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q8" value="4" class="mr-2"> (4) $540</label>
                    </div>
                </div>

                <div class="question-card" data-index="9">
                    <p class="text-lg mb-4 text-gray-800 q-text">9. The formula for the surface area of a cylinder can be expressed as <span class="math">S = 2&pi;r<sup>2</sup> + 2&pi;rh</span>. What is the height, h, expressed in terms of S, &pi;, and r?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="1" class="mr-2"> (1) h = (S - 2&pi;r<sup>2</sup>) / (2&pi;r)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="2" class="mr-2"> (2) h = S - r</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="3" class="mr-2"> (3) h = (2&pi;r<sup>2</sup> - S) / (2&pi;r)</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="4" class="mr-2"> (4) h = r - S</label>
                    </div>
                </div>

                <div class="question-card" data-index="10">
                    <p class="text-lg mb-4 text-gray-800 q-text">10. When solving the following system algebraically, Mason used the substitution method. <span class="math">3x - y = 10</span> and <span class="math">2x + 5y = 1</span>. Which equation could he have used?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q10" value="1" class="mr-2"> (1) 2(3x - 10) + 5x = 1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q10" value="2" class="mr-2"> (2) 2(-3x + 10) + 5x = 1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q10" value="3" class="mr-2"> (3) 2x + 5(3x - 10) = 1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q10" value="4" class="mr-2"> (4) 2x + 5(-3x + 10) = 1</label>
                    </div>
                </div>

                <div class="question-card" data-index="11">
                    <p class="text-lg mb-4 text-gray-800 q-text">11. Which graph represents the solution to the inequality <span class="math">4 + 3x > 9 - 7x</span>?</p>
                    <div class="space-y-4 bg-white p-4 border rounded">
                        <div class="flex items-center">
                            <label class="mr-4"><input type="radio" name="q11" value="1"> (1)</label>
                            <svg class="w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <line x1="5" y1="5" x2="95" y2="5" stroke="#000" stroke-width="0.5" />
                                <line x1="10" y1="5" x2="50" y2="5" stroke="#2563eb" stroke-width="1.5" />
                                <circle cx="50" cy="5" r="1.5" fill="white" stroke="#2563eb" stroke-width="0.5"/>
                                <polygon points="10,5 15,3 15,7" fill="#2563eb"/>
                                <text x="50" y="9" font-size="3" text-anchor="middle">2</text>
                            </svg>
                        </div>
                        <div class="flex items-center">
                            <label class="mr-4"><input type="radio" name="q11" value="2"> (2)</label>
                            <svg class="w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <line x1="5" y1="5" x2="95" y2="5" stroke="#000" stroke-width="0.5" />
                                <line x1="50" y1="5" x2="90" y2="5" stroke="#2563eb" stroke-width="1.5" />
                                <circle cx="50" cy="5" r="1.5" fill="white" stroke="#2563eb" stroke-width="0.5"/>
                                <polygon points="90,5 85,3 85,7" fill="#2563eb"/>
                                <text x="50" y="9" font-size="3" text-anchor="middle">1/2</text>
                            </svg>
                        </div>
                        <div class="flex items-center">
                            <label class="mr-4"><input type="radio" name="q11" value="3"> (3)</label>
                            <svg class="w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <line x1="5" y1="5" x2="95" y2="5" stroke="#000" stroke-width="0.5" />
                                <line x1="20" y1="5" x2="80" y2="5" stroke="#2563eb" stroke-width="1.5" />
                                <circle cx="20" cy="5" r="1.5" fill="white" stroke="#2563eb" stroke-width="0.5"/>
                                <circle cx="80" cy="5" r="1.5" fill="#2563eb" />
                            </svg>
                        </div>
                        <div class="flex items-center">
                            <label class="mr-4"><input type="radio" name="q11" value="4"> (4)</label>
                            <svg class="w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <line x1="5" y1="5" x2="95" y2="5" stroke="#000" stroke-width="0.5" />
                                <line x1="10" y1="5" x2="50" y2="5" stroke="#2563eb" stroke-width="1.5" />
                                <circle cx="50" cy="5" r="1.5" fill="white" stroke="#2563eb" stroke-width="0.5"/>
                                <polygon points="10,5 15,3 15,7" fill="#2563eb"/>
                                <text x="50" y="9" font-size="3" text-anchor="middle">1/2</text>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="question-card" data-index="12">
                    <p class="text-lg mb-4 text-gray-800 q-text">12. When solving the equation <span class="math">3(2x + 5) - 8 = 7x + 10</span>, the first step could be <span class="math">3(2x + 5) = 7x + 18</span>. Which property justifies this step?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q12" value="1" class="mr-2"> (1) addition property of equality</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q12" value="2" class="mr-2"> (2) commutative property of addition</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q12" value="3" class="mr-2"> (3) multiplication property of equality</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q12" value="4" class="mr-2"> (4) distributive property of multiplication</label>
                    </div>
                </div>

                <div class="question-card" data-index="13">
                    <p class="text-lg mb-4 text-gray-800 q-text">13. Which table of values best models an exponential decay function?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q13" value="1" class="mr-2"> (1) x: -3, -2, -1, 0, 1, 2 | f(x): -2, -5, -6, -5, -2, 3</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q13" value="2" class="mr-2"> (2) m: 0, 1, 2, 3, 4, 5 | f(m): 200, 180, 162, 146, 131, 118</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q13" value="3" class="mr-2"> (3) n: -2, -1, 0, 1, 2, 3 | f(n): 7, 4, 1, -2, -5, -8</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q13" value="4" class="mr-2"> (4) p: 0, 0.5, 1, 1.5, 2, 2.5 | f(p): 200, 210, 220, 231, 242, 254</label>
                    </div>
                </div>

                <div class="question-card" data-index="14">
                    <p class="text-lg mb-4 text-gray-800 q-text">14. If <span class="math">f(x) = &radic;(x + 1) + 5</span> then what is the value of f(3)?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q14" value="1" class="mr-2"> (1) 9</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q14" value="2" class="mr-2"> (2) 7</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q14" value="3" class="mr-2"> (3) 3</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q14" value="4" class="mr-2"> (4) 10</label>
                    </div>
                </div>

                <div class="question-card" data-index="15">
                    <p class="text-lg mb-4 text-gray-800 q-text">15. Isabella wants to shift the graph of the function <span class="math">f(x) = (x + 5)<sup>2</sup> - 2</span> left 3 units. Which function represents the shifted graph?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q15" value="1" class="mr-2"> (1) g(x) = (x + 2)<sup>2</sup> - 2</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q15" value="2" class="mr-2"> (2) g(x) = (x + 8)<sup>2</sup> - 2</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q15" value="3" class="mr-2"> (3) g(x) = (x + 5)<sup>2</sup> - 5</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q15" value="4" class="mr-2"> (4) g(x) = (x + 5)<sup>2</sup> + 1</label>
                    </div>
                </div>

                <div class="question-card" data-index="16">
                    <p class="text-lg mb-4 text-gray-800 q-text">16. What are the zeros of <span class="math">f(x) = x(x<sup>2</sup> - 36)</span>?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q16" value="1" class="mr-2"> (1) 0, only</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q16" value="2" class="mr-2"> (2) 6, only</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q16" value="3" class="mr-2"> (3) 6 and -6, only</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q16" value="4" class="mr-2"> (4) 0, 6, and -6</label>
                    </div>
                </div>

                <div class="question-card" data-index="17">
                    <p class="text-lg mb-4 text-gray-800 q-text">17. The point (x, -6) lies on the graph of a parabola whose equation is <span class="math">y = -x<sup>2</sup> - x + 6</span>. The value of x can be</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="1" class="mr-2"> (1) -3 or 2</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="2" class="mr-2"> (2) -4 or 3</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="3" class="mr-2"> (3) 3, only</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="4" class="mr-2"> (4) -4, only</label>
                    </div>
                </div>

                <div class="question-card" data-index="18">
                    <p class="text-lg mb-4 text-gray-800 q-text">18. A table summarizes concession sales. Out of 400 total people making a purchase, 58 people bought Pizza and Water. What is the relative frequency of them buying pizza and a water?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q18" value="1" class="mr-2"> (1) 0.58</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q18" value="2" class="mr-2"> (2) 0.35</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q18" value="3" class="mr-2"> (3) 0.455</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q18" value="4" class="mr-2"> (4) 0.145</label>
                    </div>
                </div>

                <div class="question-card" data-index="19">
                    <p class="text-lg mb-4 text-gray-800 q-text">19. Theodore was driving 104 km per hour. He used a conversion string to convert to a different rate. Assuming he did the work correctly cancelling units appropriately (km/hr * hr/min * min/sec * mi/km * ft/mi), what would the units be?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q19" value="1" class="mr-2"> (1) feet per second</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q19" value="2" class="mr-2"> (2) feet per minute</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q19" value="3" class="mr-2"> (3) seconds per foot</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q19" value="4" class="mr-2"> (4) minutes per foot</label>
                    </div>
                </div>

                <div class="question-card" data-index="20">
                    <p class="text-lg mb-4 text-gray-800 q-text">20. Which expression is equivalent to <span class="math">(-2x<sup>2</sup>)<sup>3</sup></span>?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q20" value="1" class="mr-2"> (1) -2x<sup>5</sup></label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q20" value="2" class="mr-2"> (2) -2x<sup>6</sup></label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q20" value="3" class="mr-2"> (3) -8x<sup>5</sup></label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q20" value="4" class="mr-2"> (4) -8x<sup>6</sup></label>
                    </div>
                </div>

                <div class="question-card" data-index="21">
                    <p class="text-lg mb-4 text-gray-800 q-text">21. A table shows radioactive substance amounts. Year 2000 had 750g, year 2014 had 25g. To the nearest tenth, the average rate of change, in grams per year, from 2000 to 2014 is</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="1" class="mr-2"> (1) 39.1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="2" class="mr-2"> (2) 51.8</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="3" class="mr-2"> (3) -39.1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="4" class="mr-2"> (4) -51.8</label>
                    </div>
                </div>

                <div class="question-card" data-index="22">
                    <p class="text-lg mb-4 text-gray-800 q-text">22. When <span class="math">2x<sup>2</sup> - 3x + 4</span> is subtracted from <span class="math">x<sup>2</sup> + 2x - 5</span> the result is</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q22" value="1" class="mr-2"> (1) x<sup>2</sup> - 5x + 9</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q22" value="2" class="mr-2"> (2) x<sup>2</sup> - x + 1</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q22" value="3" class="mr-2"> (3) -x<sup>2</sup> + 5x - 9</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q22" value="4" class="mr-2"> (4) -x<sup>2</sup> - x - 1</label>
                    </div>
                </div>

                <div class="question-card" data-index="23">
                    <p class="text-lg mb-4 text-gray-800 q-text">23. Which equation has the same solution as <span class="math">x<sup>2</sup> - 6x = 24</span>?</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q23" value="1" class="mr-2"> (1) (x - 3)<sup>2</sup> = 24</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q23" value="2" class="mr-2"> (2) (x - 6)<sup>2</sup> = 24</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q23" value="3" class="mr-2"> (3) (x - 3)<sup>2</sup> = 33</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q23" value="4" class="mr-2"> (4) (x - 6)<sup>2</sup> = 60</label>
                    </div>
                </div>

                <div class="question-card" data-index="24">
                    <p class="text-lg mb-4 text-gray-800 q-text">24. In a sequence, the first term is 2 and the common ratio is -3. The fourth term in this sequence is</p>
                    <div class="space-y-2">
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q24" value="1" class="mr-2"> (1) -162</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q24" value="2" class="mr-2"> (2) -11</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q24" value="3" class="mr-2"> (3) 24</label>
                        <label class="block p-3 rounded-lg hover:bg-gray-50 cursor-pointer"><input type="radio" name="q24" value="4" class="mr-2"> (4) -54</label>
                    </div>
                </div>

                <div class="question-card" data-index="25">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">25. Solve the equation for x: <span class="math">14x = 3(1 + 2x) - 4x</span></p>
                    <textarea name="q25" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show your work and answer here..."></textarea>
                </div>

                <div class="question-card" data-index="26">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">26. Graph <span class="math">f(x) = 3(2)<sup>x</sup></span> over the interval -1 &le; x &le; 2.</p>
                    <textarea name="q26" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Describe your graph or provide coordinate points here..."></textarea>
                </div>

                <div class="question-card" data-index="27">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">27. Determine the product of <span class="math">(2x + 3)</span> and <span class="math">(-6x<sup>2</sup> + 5x - 1)</span>. Express the product in standard form.</p>
                    <textarea name="q27" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show your work and answer here..."></textarea>
                </div>

                <div class="question-card" data-index="28">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">28. A student's test scores for the semester are: 83, 87, 90, 94, 94, 93, 95, 70, 72, 83, 85, 88, 98. Construct a box plot for this data set.</p>
                    <textarea name="q28" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Provide the five-number summary values for your box plot here..."></textarea>
                </div>

                <div class="question-card" data-index="29">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">29. Write an equation, in slope-intercept form, of a line that passes through the point (6, 3) and has a slope of 2/3.</p>
                    <textarea name="q29" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show your work and answer here..."></textarea>
                </div>

                <div class="question-card" data-index="30">
                    <p class="text-blue-500 font-semibold mb-2">Part II Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">30. Abby has $20 to spend at a community festival. She uses $8.50 to purchase food coupons. She can buy individual ride tickets for $2.25 each. Determine algebraically the maximum number of ride tickets Abby can buy.</p>
                    <textarea name="q30" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show your algebraic work here..."></textarea>
                </div>

                <div class="question-card" data-index="31">
                    <p class="text-blue-500 font-semibold mb-2">Part III Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">31. A rocket was launched from the ground into the air at an initial velocity of 80 feet per second. The path of the rocket can be modeled by <span class="math">h(t) = -16t<sup>2</sup> + 80t</span> where t represents the time after the rocket has been launched, and h(t) represents the height. Sketch the function. State how many seconds it will take for the rocket to reach its maximum height. State the maximum height, in feet, of the rocket.</p>
                    <textarea name="q31" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Provide your answers and work here..."></textarea>
                </div>

                <div class="question-card" data-index="32">
                    <p class="text-blue-500 font-semibold mb-2">Part III Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">32. Use the quadratic formula to solve <span class="math">2x<sup>2</sup> - 4x - 3 = 0</span> and express the answer in simplest radical form.</p>
                    <textarea name="q32" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show your work here..."></textarea>
                </div>

                <div class="question-card" data-index="33">
                    <p class="text-blue-500 font-semibold mb-2">Part III Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">33. The table below shows the ages of drivers and the annual cost of their car insurance: <br>(16, 1452), (17, 1332), (18, 1284), (18, 1320), (21, 1200), (22, 1188), (30, 600). <br>Write the linear regression equation for this set of data. Round all values to the nearest hundredth. State the correlation coefficient to the nearest hundredth. State what this correlation coefficient indicates about the linear fit of the data set.</p>
                    <textarea name="q33" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Provide your answers here..."></textarea>
                </div>

                <div class="question-card" data-index="34">
                    <p class="text-blue-500 font-semibold mb-2">Part III Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">34. Solve the following system of inequalities graphically: <span class="math">2y &le; x + 6</span> and <span class="math">2x + y > 3</span>. Is the point (0, 3) in the solution set? Explain your answer.</p>
                    <textarea name="q34" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Explain your graphical solution and answer the question about (0,3) here..."></textarea>
                </div>

                <div class="question-card" data-index="35">
                    <p class="text-blue-500 font-semibold mb-2">Part IV Constructed Response</p>
                    <p class="text-lg mb-4 text-gray-800 q-text">35. Acme Athletics purchases shoes from a supply company. In January the store bought 30 pairs of running shoes and 10 pairs of basketball shoes for $3700. In March they bought 15 pairs of running shoes and 20 pairs of basketball shoes for $3575. The supply company kept their prices constant. <br><br>If x represents the cost of one pair of running shoes and y represents the cost of one pair of basketball shoes, write a system of equations that models this situation. <br><br>Jacob says that a pair of running shoes costs the store $80 each, and a pair of basketball shoes costs the store $130 each. Is he correct? Justify your answer. <br><br>Solve your system of equations algebraically to find the exact cost of one pair of running shoes and one pair of basketball shoes.</p>
                    <textarea name="q35" rows="8" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Show all work and provide your answers here..."></textarea>
                </div>

                <div id="submit-card" class="question-card text-center py-10">
                    <h2 class="text-3xl text-gray-800 mb-4">You have reached the end of the test.</h2>
                    <p class="text-gray-600 mb-8">Please review your answers before submitting. You can download a copy of your answers as a text file for your records.</p>
                    
                    <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                        <button type="button" onclick="downloadTxt()" class="px-8 py-4 bg-gray-200 text-gray-800 text-lg rounded-xl shadow hover:bg-gray-300 transition-all duration-300">
                            Download Answers as TXT
                        </button>
                        <button type="submit" class="px-10 py-4 bg-blue-600 text-white text-lg rounded-xl shadow hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1">
                            Submit Test
                        </button>
                    </div>

                    <div class="mt-8 teacher-grading-btn-container">
                        <button type="button" onclick="toggleTeacherGrading()" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-xl shadow-lg hover:bg-purple-700 transition w-full sm:w-auto">
                            <i class="fas fa-chalkboard-teacher mr-2"></i> Teacher Grading
                        </button>
                    </div>
                    
                    <div id="teacher-grading-section" class="hidden mt-8 bg-purple-50 p-6 rounded-2xl border-2 border-purple-500 text-left">
                        <h3 class="text-2xl font-bold text-purple-800 mb-6 border-b border-purple-200 pb-2">Teacher Answer Key</h3>
                        
                        <h4 class="text-xl font-bold text-blue-800 mb-4">Part I (Multiple Choice)</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                            <?php for($i = 1; $i <= 24; $i++): ?>
                                <div class="bg-white p-3 rounded-xl border border-gray-200 shadow-sm text-center">
                                    <span class="font-bold text-gray-700">Q<?php echo $i; ?>:</span> 
                                    <span class="text-green-600 font-bold ml-2">(<?php echo $mcAnswerKey[$i]; ?>)</span>
                                </div>
                            <?php endfor; ?>
                        </div>

                        <h4 class="text-xl font-bold text-blue-800 mb-4">Parts II, III, IV (Constructed Response)</h4>
                        <?php foreach($rubrics as $num => $rubric): ?>
                            <div class="mb-5 bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                                <p class="font-bold text-gray-800 mb-2">Q<?php echo $num; ?></p>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <p class="text-xs uppercase text-blue-600 font-bold mb-1">Official Rubric</p>
                                    <p class="text-blue-900 text-sm"><?php echo $rubric; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between">
                <button type="button" id="btn-prev" onclick="changeQuestion(-1)" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Previous</button>
                <button type="button" id="btn-next" onclick="changeQuestion(1)" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Next</button>
            </div>

        </form>

        <script>
            let currentIdx = 0;
            let questions = [];

            document.addEventListener("DOMContentLoaded", () => {
                const container = document.getElementById('quiz-container');
                const submitCard = document.getElementById('submit-card');
                
                let cards = Array.from(container.querySelectorAll('.question-card:not(#submit-card)'));
                
                // Shuffle logic
                for (let i = cards.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [cards[i], cards[j]] = [cards[j], cards[i]];
                }
                
                cards.forEach(card => container.appendChild(card));
                container.appendChild(submitCard);
                
                questions = Array.from(container.querySelectorAll('.question-card'));
                showQuestion(0);
            });

            function showQuestion(idx) {
                questions.forEach((q, i) => {
                    if (i === idx) {
                        q.classList.add('active');
                    } else {
                        q.classList.remove('active');
                    }
                });

                const isSubmitCard = questions[idx].id === 'submit-card';
                
                document.getElementById('btn-prev').style.display = idx === 0 ? 'none' : 'block';
                document.getElementById('btn-next').style.display = isSubmitCard ? 'none' : 'block';
                
                if (isSubmitCard) {
                    document.getElementById('progress-text').innerText = "Ready to submit";
                    document.getElementById('progress-bar-fill').style.width = "100%";
                } else {
                    document.getElementById('progress-text').innerText = `Question ${idx + 1} of ${questions.length - 1}`;
                    const pct = ((idx + 1) / (questions.length - 1)) * 100;
                    document.getElementById('progress-bar-fill').style.width = `${pct}%`;
                }
            }

            function changeQuestion(dir) {
                currentIdx += dir;
                if (currentIdx < 0) currentIdx = 0;
                if (currentIdx >= questions.length) currentIdx = questions.length - 1;
                showQuestion(currentIdx);
            }

            function toggleTeacherGrading() {
                const section = document.getElementById('teacher-grading-section');
                if (section.classList.contains('hidden')) {
                    section.classList.remove('hidden');
                } else {
                    section.classList.add('hidden');
                }
            }

            function downloadTxt() {
                const student = document.getElementById('student-name').value || "Unknown Student";
                const date = document.getElementById('assessment-date').value || "No Date";
                
                let content = `Algebra I Regents Assessment Answers\nStudent: ${student}\nDate: ${date}\n\n`;
                
                questions.forEach(q => {
                    if (q.id === 'submit-card') return;
                    
                    const textNode = q.querySelector('.q-text');
                    if (!textNode) return;
                    const qText = textNode.innerText.replace(/\s+/g, ' ').trim();
                    
                    let answer = "No answer provided";
                    const textInput = q.querySelector('textarea');
                    const radioChecked = q.querySelector('input[type="radio"]:checked');
                    
                    if (textInput && textInput.value.trim() !== '') {
                        answer = textInput.value.trim();
                    } else if (radioChecked) {
                        answer = radioChecked.parentElement.innerText.trim();
                    }
                    
                    content += `${qText}\nAnswer: ${answer}\n\n`;
                });

                const blob = new Blob([content], { type: 'text/plain' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `Algebra1_Answers_${student.replace(/\s+/g, '_')}.txt`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }
        </script>
        <script>
            function showDisclosure() {
                const modal = document.getElementById('disclosure-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
            function hideDisclosure() {
                const modal = document.getElementById('disclosure-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        </script>
        <?php endif; ?>

        <!-- Disclosure Modal -->
        <div id="disclosure-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6 md:p-8 relative">
                <button type="button" onclick="hideDisclosure()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <h3 class="text-2xl font-bold text-gray-800 mb-4"><i class="fas fa-info-circle text-blue-500 mr-2"></i> Resource Disclosure</h3>
                <div class="text-gray-600 space-y-4 text-lg">
                    <p>This assessment contains materials adapted from publicly available and open-source educational resources.</p>
                    <p>We believe in open education and have utilized these resources to provide accessible, high-quality learning experiences for all students.</p>
                    <p>If you have any questions regarding the specific sources or licensing of the materials used in this module, please <a href="mailto:test@hestena62.com?subject=<?php echo rawurlencode($pageTitle ?? 'Assessment'); ?>&amp;body=Page%20URL:%20<?php echo rawurlencode('http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '')); ?>" class="text-blue-600 hover:underline">contact us</a>.</p>
                </div>
                <div class="mt-8 text-center">
                    <button type="button" onclick="hideDisclosure()" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition w-full">Close</button>
                </div>
            </div>
        </div>

    </main>

<?php include '..\src\footer.php'; ?>