<?php
// =========================================================================
// CUSTOM ASSESSMENT TEMPLATE - BLANK SLATE
// Use this file as a starting point for creating new assessments.
// Copy this file, rename it (e.g., grade2.php), and update the configuration.
// =========================================================================

// =========================================================================
// 1. PAGE SETTINGS
// =========================================================================
$pageTitle = "[Course/Subject] Assessment Template";
$pageDescription = "A customizable assessment test. Replace this with your description.";
$pageKeywords = "assessment, test, template";
$pageAuthor = "[Your Name/Organization]";

// =========================================================================
// 2. SCORING & CONVERSION (Optional)
// =========================================================================
// Map from raw score to scale score. The grading script will automatically find 
// the closest matching scale score based on the raw score total.
// Leave the array empty [] if you do not want to display a scale score.
$conversionChart = [
    // Example: RawScore => ScaleScore
    4 => 100, 3 => 85, 2 => 70, 1 => 55, 0 => 0
];

// =========================================================================
// 3. QUESTION BANK CONFIGURATION
// =========================================================================
/* 
 * Supported Question Types:
 *  - 'mc' : Multiple Choice (requires 'options' array and 'correctAnswer' key)
 *  - 'cr' : Constructed Response (requires 'rubric' text)
 * 
 * Ensure every question has a 'points' value.
 */
$questionsConfig = [
    1 => [
        'type' => 'mc',
        'text' => 'This is a sample multiple-choice question. What is 2 + 2?',
        'options' => [
            1 => '3',
            2 => '4',
            3 => '5',
            4 => '6'
        ],
        'correctAnswer' => 2,
        'points' => 2
    ],
    2 => [
        'type' => 'cr',
        'text' => 'This is a sample constructed response prompt. Describe your reasoning for the previous question.',
        'rubric' => '2 points: Clear and accurate reasoning. 1 point: Partial reasoning. 0 points: Blank or completely incorrect.',
        'points' => 2
    ]
    // You can add as many questions as you need here following the same pattern!
];

// =========================================================================
// 4. ASSESSMENT OPTIONS
// =========================================================================
$shuffleQuestions = false; // Set to true if you want the questions to be presented in random order to the student

// =========================================================================
// STOP EDITING HERE - CORE LOGIC & RENDERING
// =========================================================================

// Calculate maximum possible raw score based on the question config
$maxRawScore = 0;
foreach ($questionsConfig as $q) {
    if (isset($q['points'])) {
        $maxRawScore += $q['points'];
    }
}

$isGrading = false;
$studentName = "";
$assessmentDate = "";
$mcScore = 0;
$studentAnswers = [];

// Process form submission
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $isGrading = true;
    $studentName = htmlspecialchars($_POST['student_name'] ?? 'Student');
    $assessmentDate = htmlspecialchars($_POST['assessment_date'] ?? date('Y-m-d'));
    
    foreach ($questionsConfig as $num => $q) {
        if ($q['type'] === 'mc') {
            $submittedAns = (int)($_POST["q{$num}"] ?? 0);
            $studentAnswers[$num] = $submittedAns;
            if ($submittedAns === $q['correctAnswer']) {
                $mcScore += $q['points'];
            }
        } elseif ($q['type'] === 'cr') {
            $studentAnswers[$num] = htmlspecialchars($_POST["q{$num}"] ?? 'No answer provided.');
        }
    }
}
?>
<?php include '..\src\header.php'; ?>

<style>
    .math { font-family: "Times New Roman", Times, serif; font-style: italic; }
    .question-card { display: none; }
    .question-card.active { display: block; animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    
    /* Teacher Grading Visibility */
    body:not(.teacher-mode) .teacher-grading-btn-container { display: none !important; }
    body.teacher-mode .teacher-grading-btn-container { display: block !important; }
</style>

<main class="container mx-auto p-4 md:p-8 max-w-4xl text-gray-800 dark:text-gray-200">
    
    <?php if ($isGrading): ?>
    
    <div class="bg-white dark:bg-gray-800 p-6 md:p-10 rounded-2xl shadow-xl mb-16 border-t-8 border-purple-500 dark:border-purple-600">
        <h1 class="text-3xl text-purple-700 dark:text-purple-400 mb-4 tracking-wide font-bold">Grading Dashboard</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-8">Multiple choice questions have been automatically graded. Please use the rubrics below to score any constructed responses. The final score will update automatically.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-200 dark:border-gray-600">
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 font-semibold">Student</p>
                <p class="text-xl text-gray-800 dark:text-white"><?php echo $studentName; ?></p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-200 dark:border-gray-600">
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 font-semibold">Auto-Graded MC Score</p>
                <p class="text-xl text-green-600 dark:text-green-400 font-bold"><?php echo $mcScore; ?> points</p>
            </div>
        </div>

        <?php 
        $hasCR = false;
        foreach ($questionsConfig as $num => $q) {
            if ($q['type'] === 'cr') { $hasCR = true; break; }
        }
        ?>
        <?php if ($hasCR): ?>
        <h2 class="text-2xl text-blue-800 dark:text-blue-400 mb-6 border-b border-blue-200 dark:border-blue-800 pb-2 mt-12 font-bold">Constructed Response Grading</h2>
        
        <?php foreach ($questionsConfig as $num => $q): ?>
            <?php if ($q['type'] === 'cr'): ?>
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl border border-gray-200 dark:border-gray-600 mb-6 space-y-4 shadow-sm">
                <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-600 pb-3 mb-3">
                    <p class="text-lg text-gray-800 dark:text-white font-bold">Question <?php echo $num; ?></p>
                    <span class="bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-300 text-xs px-3 py-1 rounded-full uppercase tracking-wide font-bold">Manual Grade</span>
                </div>
                <p class="text-gray-700 dark:text-gray-300 italic border-l-4 border-blue-300 dark:border-blue-600 pl-4 py-2 bg-white dark:bg-gray-800 rounded-r-lg"><?php echo $q['text']; ?></p>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-600 text-gray-800 dark:text-gray-200 whitespace-pre-wrap leading-relaxed min-h-[100px]"><?php echo $studentAnswers[$num]; ?></div>
                <div class="bg-blue-50 dark:bg-blue-900/30 p-4 rounded-lg border border-blue-100 dark:border-blue-800 text-blue-900 dark:text-blue-200 text-sm font-medium">
                    <span class="block text-xs uppercase text-blue-600 dark:text-blue-400 font-bold mb-1">Official Rubric</span>
                    <?php echo $q['rubric']; ?>
                </div>
                
                <div class="pt-4 flex items-center">
                    <label class="text-gray-800 dark:text-gray-200 mr-4 font-bold">Assign Score (Max <?php echo $q['points']; ?>):</label>
                    <select class="cr-score-dropdown px-4 py-2 border-2 border-purple-300 dark:border-purple-600 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:outline-none font-bold text-gray-800 dark:text-white" onchange="updateFinalScore()">
                        <option value="0" selected>0</option>
                        <?php for ($s = 1; $s <= $q['points']; $s++): ?>
                            <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        
    </div>

    <div class="fixed bottom-0 left-0 w-full bg-white dark:bg-gray-800 border-t border-gray-300 dark:border-gray-700 shadow-2xl p-4 md:p-6 z-50">
        <div class="container mx-auto max-w-4xl flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center bg-gray-50 dark:bg-gray-700 px-6 py-2 rounded-xl border border-gray-200 dark:border-gray-600">
                <p class="text-gray-500 dark:text-gray-400 text-xs uppercase tracking-wider font-bold mb-1">Total Raw Score</p>
                <p class="text-2xl text-gray-800 dark:text-white font-bold"><span id="live-raw-score"><?php echo $mcScore; ?></span> / <?php echo $maxRawScore; ?></p>
            </div>
            <?php if (!empty($conversionChart)): ?>
            <div class="text-center bg-blue-50 dark:bg-blue-900/30 px-6 py-2 rounded-xl border border-blue-200 dark:border-blue-800">
                <p class="text-blue-500 dark:text-blue-400 text-xs uppercase tracking-wider font-bold mb-1">Scale Score</p>
                <p class="text-3xl text-blue-700 dark:text-blue-300 font-black" id="live-scale-score">0</p>
            </div>
            <?php endif; ?>
            <div class="text-center">
                <button onclick="window.history.back()" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-bold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition shadow">Retake Test</button>
            </div>
        </div>
    </div>

    <script>
        const mcScore = <?php echo $mcScore; ?>;
        const maxRawScore = <?php echo $maxRawScore; ?>;
        const conversionChart = <?php echo json_encode($conversionChart); ?>;

        function updateFinalScore() {
            let crScore = 0;
            document.querySelectorAll('.cr-score-dropdown').forEach(select => {
                crScore += parseInt(select.value || 0);
            });
            
            let totalRaw = mcScore + crScore;
            if (totalRaw > maxRawScore) totalRaw = maxRawScore;
            
            document.getElementById('live-raw-score').textContent = totalRaw;

            if (Object.keys(conversionChart).length > 0) {
                let scale = conversionChart[totalRaw];
                if (scale === undefined) {
                    let keys = Object.keys(conversionChart).map(Number).sort((a,b)=>b-a);
                    scale = 0;
                    for(let k of keys) {
                        if(totalRaw >= k) {
                            scale = conversionChart[k];
                            break;
                        }
                    }
                }
                const scaleEl = document.getElementById('live-scale-score');
                if(scaleEl) { scaleEl.textContent = scale || 0; }
            }
        }
        
        updateFinalScore();
    </script>
    
    <?php else: ?>

    <form id="assessment-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="bg-white dark:bg-gray-800 p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 mb-8">

        <header class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-8 text-center md:text-left relative">
            <h1 id="main-heading" class="text-3xl md:text-4xl text-blue-700 dark:text-blue-400 mb-3 tracking-tight font-bold"><?php echo $pageTitle; ?></h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-3"><?php echo $pageDescription; ?></p>
            <button type="button" onclick="showDisclosure()" class="text-sm font-medium text-blue-500 hover:text-blue-600 dark:hover:text-blue-400 hover:underline transition-colors flex items-center justify-center md:justify-start gap-1 mx-auto md:mx-0">
                <i class="fas fa-info-circle"></i> Public Resource Disclosure
            </button>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl border border-blue-100 dark:border-blue-800/50">
            <div>
                <label for="student-name" class="block text-blue-900 dark:text-blue-200 font-bold mb-2">Student Name</label>
                <input type="text" id="student-name" name="student_name" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:outline-none transition duration-200 shadow-sm text-gray-800 dark:text-white"
                    placeholder="Enter your full name">
            </div>
            <div>
                <label for="assessment-date" class="block text-blue-900 dark:text-blue-200 font-bold mb-2">Assessment Date</label>
                <input type="date" id="assessment-date" name="assessment_date" required value="<?php echo date('Y-m-d'); ?>"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:outline-none transition duration-200 shadow-sm text-gray-800 dark:text-white">
            </div>
        </div>

        <div class="mb-8">
            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 font-bold mb-2">
                <span id="progress-text">Loading instructions...</span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                <div id="progress-bar-fill" class="bg-blue-600 dark:bg-blue-500 h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>

        <div id="quiz-container" class="min-h-[300px]">

            <div id="intro-card" class="question-card text-center py-12">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-100 dark:bg-blue-900/50 mb-6">
                    <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-2xl text-gray-800 dark:text-white mb-4 font-bold">Instructions</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto text-lg">Please enter your name and the date above. When you are ready to begin, click "Start Test". Take your time and answer each question to the best of your ability.</p>
                <button type="button" onclick="startTest()" class="px-10 py-4 bg-blue-600 dark:bg-blue-500 text-white font-bold text-lg rounded-xl shadow-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition transform hover:-translate-y-1">Start Test</button>
            </div>

            <?php foreach ($questionsConfig as $num => $q): ?>
            <div class="question-card actual-question" data-index="<?php echo $num; ?>">
                <?php if ($q['type'] === 'mc'): ?>
                    <p class="text-blue-500 dark:text-blue-400 font-bold mb-4 text-xs uppercase tracking-widest border-b border-gray-200 dark:border-gray-700 pb-2">Multiple Choice</p>
                <?php elseif ($q['type'] === 'cr'): ?>
                    <p class="text-blue-500 dark:text-blue-400 font-bold mb-4 text-xs uppercase tracking-widest border-b border-gray-200 dark:border-gray-700 pb-2">Constructed Response</p>
                <?php endif; ?>

                <p class="text-xl md:text-2xl mb-6 text-gray-800 dark:text-gray-100 font-medium mt-4 leading-relaxed"><span class="text-blue-600 dark:text-blue-400 mr-2 font-bold q-num"><?php echo $num; ?>.</span> <span class="q-text"><?php echo $q['text']; ?></span></p>
                
                <?php if ($q['type'] === 'mc'): ?>
                <div class="space-y-4">
                    <?php foreach ($q['options'] as $optNum => $optText): ?>
                    <label class="block p-4 md:p-5 rounded-xl cursor-pointer border-2 border-gray-200 dark:border-gray-700 hover:border-blue-400 dark:hover:border-blue-500 bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition duration-200 flex items-center shadow-sm">
                        <input type="radio" name="q<?php echo $num; ?>" value="<?php echo $optNum; ?>" class="w-6 h-6 text-blue-600 dark:text-blue-500 mr-4 focus:ring-blue-500 dark:focus:ring-blue-400 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800"> 
                        <span class="text-gray-800 dark:text-gray-200 text-lg font-medium opt-text">(<?php echo $optNum; ?>) <?php echo $optText; ?></span>
                    </label>
                    <?php endforeach; ?>
                </div>
                <?php elseif ($q['type'] === 'cr'): ?>
                <textarea name="q<?php echo $num; ?>" rows="8" class="cr-input w-full px-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-4 focus:ring-blue-100 dark:focus:ring-blue-900/30 focus:border-blue-500 dark:focus:border-blue-400 focus:outline-none text-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500" placeholder="Type your answer here..."></textarea>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

            <div id="submit-card" class="question-card text-center py-12">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-100 dark:bg-green-900/40 mb-6">
                    <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-3xl text-gray-800 dark:text-white mb-4 font-bold">You've reached the end!</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-lg mx-auto text-lg">Please review your answers before submitting. You will not be able to change them once submitted. You can optionally download a copy of your answers.</p>
                
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <button type="button" onclick="downloadTxt()" class="px-8 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-lg font-bold rounded-xl shadow-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300 w-full sm:w-auto">
                        Download Answers
                    </button>
                    <button type="submit" class="px-10 py-4 bg-green-500 dark:bg-green-600 text-white text-xl font-bold rounded-xl shadow-lg hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 transform hover:-translate-y-1 w-full sm:w-auto">
                        Submit Test
                    </button>
                </div>

                <div class="mt-8 teacher-grading-btn-container">
                    <button type="button" onclick="toggleTeacherGrading()" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-xl shadow-lg hover:bg-purple-700 transition w-full sm:w-auto">
                        <i class="fas fa-chalkboard-teacher mr-2"></i> Teacher Grading
                    </button>
                </div>
                
                <div id="teacher-grading-section" class="hidden mt-8 bg-purple-50 dark:bg-purple-900/20 p-6 rounded-2xl border-2 border-purple-500 text-left">
                    <h3 class="text-2xl font-bold text-purple-800 dark:text-purple-300 mb-6 border-b border-purple-200 dark:border-purple-800 pb-2">Teacher Answer Key</h3>
                    <?php foreach ($questionsConfig as $num => $q): ?>
                        <div class="mb-5 bg-white dark:bg-gray-800 p-4 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                            <p class="font-bold text-gray-800 dark:text-gray-200 mb-2">Q<?php echo $num; ?>: <?php echo $q['text']; ?></p>
                            <?php if ($q['type'] === 'mc'): ?>
                                <p class="text-green-600 dark:text-green-400 font-semibold"><i class="fas fa-check-circle mr-1"></i> Answer: (<?php echo $q['correctAnswer']; ?>) <?php echo $q['options'][$q['correctAnswer']]; ?></p>
                            <?php elseif ($q['type'] === 'cr'): ?>
                                <div class="bg-blue-50 dark:bg-blue-900/30 p-3 rounded-lg border border-blue-100 dark:border-blue-800 mt-2">
                                    <p class="text-xs uppercase text-blue-600 dark:text-blue-400 font-bold mb-1">Official Rubric</p>
                                    <p class="text-blue-900 dark:text-blue-200 text-sm"><?php echo $q['rubric']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div id="nav-controls" class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-between hidden">
            <button type="button" id="btn-prev" onclick="changeQuestion(-1)" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition shadow-sm">Previous</button>
            <button type="button" id="btn-next" onclick="changeQuestion(1)" class="px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white font-bold rounded-xl hover:bg-blue-700 dark:hover:bg-blue-600 transition shadow-sm">Next Question</button>
        </div>

    </form>

    <script>
        let currentIdx = 0;
        let cards = [];
        const isStudentNameEmpty = () => document.getElementById('student-name').value.trim() === '';
        const shouldShuffle = <?php echo json_encode($shuffleQuestions); ?>;

        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById('quiz-container');
            const introCard = document.getElementById('intro-card');
            const submitCard = document.getElementById('submit-card');
            
            let questionCards = Array.from(container.querySelectorAll('.actual-question'));

            // Optional: Shuffle the questions independently of their DOM order initially
            if (shouldShuffle) {
                for (let i = questionCards.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [questionCards[i], questionCards[j]] = [questionCards[j], questionCards[i]];
                }
                // Re-append to physical DOM to maintain flow when scrolling isn't used (we use show/hide anyway, but good for structure)
                questionCards.forEach(card => container.insertBefore(card, submitCard));
            }

            // Build our array of active cards
            cards = [introCard, ...questionCards, submitCard].filter(Boolean);
            
            showCard(0);
        });

        function startTest() {
            if (isStudentNameEmpty()) {
                alert("Please enter your Student Name before starting the test.");
                document.getElementById('student-name').focus();
                return;
            }
            document.getElementById('nav-controls').classList.remove('hidden');
            changeQuestion(1);
        }

        function showCard(idx) {
            cards.forEach((c, i) => {
                if (i === idx) {
                    c.classList.add('active');
                } else {
                    c.classList.remove('active');
                }
            });

            const isIntro = idx === 0;
            const isSubmit = idx === cards.length - 1;
            
            const btnPrev = document.getElementById('btn-prev');
            const btnNext = document.getElementById('btn-next');
            
            if (btnPrev && btnNext) {
                btnPrev.style.display = (idx <= 1) ? 'none' : 'block';
                btnNext.style.display = isSubmit ? 'none' : 'block';
            }
            
            if (isIntro) {
                document.getElementById('progress-text').innerText = "Ready to start";
                document.getElementById('progress-bar-fill').style.width = "0%";
            } else if (isSubmit) {
                document.getElementById('progress-text').innerText = "Ready to submit";
                document.getElementById('progress-bar-fill').style.width = "100%";
            } else {
                const totalQ = cards.length - 2; // exclude intro and submit
                document.getElementById('progress-text').innerText = `Question ${idx} of ${totalQ}`;
                const pct = (idx / totalQ) * 100;
                document.getElementById('progress-bar-fill').style.width = `${pct}%`;
            }
        }

        function changeQuestion(dir) {
            if (dir > 0 && currentIdx === 0 && isStudentNameEmpty()) {
                alert("Please enter your Student Name.");
                return;
            }
            currentIdx += dir;
            if (currentIdx < 0) currentIdx = 0;
            if (currentIdx >= cards.length) currentIdx = cards.length - 1;
            showCard(currentIdx);
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
            const testTitle = <?php echo json_encode($pageTitle); ?>;
            
            let content = `${testTitle} - Student Answers\nStudent: ${student}\nDate: ${date}\n\n`;
            
            const questionCards = cards.filter(c => c.classList.contains('actual-question'));
            
            questionCards.forEach((q, index) => {
                const qNumNode = q.querySelector('.q-num');
                const qTextNode = q.querySelector('.q-text');
                if (!qTextNode) return;
                
                const qNumber = qNumNode ? qNumNode.innerText.trim() : `${index + 1}.`;
                const qText = qTextNode.innerText.replace(/\s+/g, ' ').trim();
                
                let answer = "No answer provided";
                const textInput = q.querySelector('.cr-input');
                const radioChecked = q.querySelector('input[type="radio"]:checked');
                
                if (textInput && textInput.value.trim() !== '') {
                    answer = textInput.value.trim();
                } else if (radioChecked) {
                    const spanOpt = radioChecked.parentElement.querySelector('.opt-text');
                    if (spanOpt) {
                         answer = spanOpt.innerText.trim();
                    } else {
                         answer = radioChecked.value;
                    }
                }
                
                content += `${qNumber} ${qText}\nYour Answer: ${answer}\n\n`;
            });

            const blob = new Blob([content], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `${testTitle.replace(/[^z0-9]/gi, '_').toLowerCase()}_answers_${student.replace(/\s+/g, '_')}.txt`;
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
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-lg w-full p-6 md:p-8 relative">
            <button type="button" onclick="hideDisclosure()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4"><i class="fas fa-info-circle text-blue-500 mr-2"></i> Resource Disclosure</h3>
            <div class="text-gray-600 dark:text-gray-300 space-y-4 text-lg">
                <p>This assessment contains materials adapted from publicly available and open-source educational resources.</p>
                <p>We believe in open education and have utilized these resources to provide accessible, high-quality learning experiences for all students.</p>
                <p>If you have any questions regarding the specific sources or licensing of the materials used in this module, please <a href="mailto:test@hestena62.com?subject=<?php echo rawurlencode($pageTitle ?? 'Assessment'); ?>&amp;body=Page%20URL:%20<?php echo rawurlencode('http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '')); ?>" class="text-blue-600 dark:text-blue-400 hover:underline">contact us</a>.</p>
            </div>
            <div class="mt-8 text-center">
                <button type="button" onclick="hideDisclosure()" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition w-full">Close</button>
            </div>
        </div>
    </div>

</main>

<?php include '..\src\footer.php'; ?>
