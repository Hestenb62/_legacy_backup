<?php
$pageTitle       = "Grade 3 Assessment | Hesten's Learning";
$pageDescription = "Practice your Third Grade skills in Math, Reading, Science, and Social Studies.";
include '../src/header.php';
?>

<header class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-12 px-4 text-center rounded-b-lg shadow-xl mb-8">
  <div class="container mx-auto">
      <div class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-xs font-bold tracking-wider uppercase mb-4">
        <i class="fas fa-star text-yellow-300"></i> Grade 3
      </div>
      <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4 dropdown-shadow">
        Grade 3 Knowledge Check
      </h1>
      <p class="text-lg opacity-90 max-w-2xl mx-auto">
        Test your skills in Multiplication, Reading Comprehension, Forces, and World Geography.
      </p>
      <a href="/Level/e.php" class="inline-block mt-6 px-6 py-2 bg-white text-blue-700 rounded-full font-bold hover:bg-blue-50 transition-colors shadow-lg">
        <i class="fas fa-arrow-left mr-2"></i> Return to Curriculum
      </a>
  </div>
</header>

<div class="container mx-auto px-4 pb-12">
    <!-- Hidden inputs for logic to find -->
    <input type="hidden" id="force-grade" value="Third Grade">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Stats -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-t-4 border-blue-500">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Your Progress</h3>
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 dark:bg-blue-900 dark:text-blue-200">
                                Global Score
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-blue-600 dark:text-blue-400 progress-bar-text">
                                0%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-blue-200 dark:bg-blue-900/50">
                        <div style="width:0%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500 progress-bar-animated"></div>
                    </div>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                    Complete questions to earn badges!
                </p>
            </div>

            <!-- Subject Filter -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Focus Area</h3>
                <div class="space-y-2">
                    <button onclick="filterQuestions('All')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 transition-colors font-medium border border-transparent focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <i class="fas fa-layer-group w-6 text-center mr-2 text-gray-400"></i> Mix All Subjects
                    </button>
                    <button onclick="filterQuestions('Math')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 transition-colors font-medium border border-transparent focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <i class="fas fa-calculator w-6 text-center mr-2 text-blue-500"></i> Math (Multiplication)
                    </button>
                    <button onclick="filterQuestions('Language Arts')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-pink-50 dark:hover:bg-pink-900/30 hover:text-pink-600 transition-colors font-medium border border-transparent focus:border-pink-500 focus:ring-1 focus:ring-pink-500">
                        <i class="fas fa-book-reader w-6 text-center mr-2 text-pink-500"></i> Language Arts
                    </button>
                    <button onclick="filterQuestions('Science')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 hover:text-emerald-600 transition-colors font-medium border border-transparent focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                        <i class="fas fa-flask w-6 text-center mr-2 text-emerald-500"></i> Science
                    </button>
                    <button onclick="filterQuestions('Social Studies')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-amber-50 dark:hover:bg-amber-900/30 hover:text-amber-600 transition-colors font-medium border border-transparent focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                        <i class="fas fa-globe-americas w-6 text-center mr-2 text-amber-500"></i> Social Studies
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Quiz Area -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 h-full flex flex-col relative overflow-hidden">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <i class="fas fa-puzzle-piece text-9xl"></i>
                </div>

                <div class="flex justify-between items-center mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                    <div>
                        <span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Question</span>
                        <div id="question-count" class="text-4xl font-black text-gray-900 dark:text-white">1<span class="text-xl text-gray-400 font-medium">/10</span></div>
                    </div>
                     <div class="flex gap-2">
                        <span id="streak-counter" class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-bold hidden animate-pulse">
                            🔥 0 streak
                        </span>
                     </div>
                </div>

                <div class="flex-grow mb-8">
                    <h2 id="question" class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 leading-snug min-h-[4rem]">
                        Loading Question...
                    </h2>

                    <div id="options" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Options injected by JS -->
                    </div>
                </div>

                <!-- Feedback Area -->
                <div id="feedback-area" class="min-h-[60px] p-4 rounded-lg hidden mb-6 animate-fade-in-up">
                    <div class="flex items-start gap-3">
                        <div id="feedback-icon" class="text-2xl mt-1"></div>
                        <div>
                            <h4 id="feedback-title" class="font-bold text-lg"></h4>
                            <p id="feedback" class="text-sm opacity-90"></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                     <button onclick="showHint()" class="text-yellow-600 dark:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 px-4 py-2 rounded-lg transition-colors font-medium text-sm flex items-center gap-2">
                        <i class="far fa-lightbulb"></i> Need a Hint?
                     </button>
                     
                     <button id="next-btn" onclick="nextQuestionAdapter()" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 transition-all disabled:opacity-50 disabled:cursor-not-allowed hidden">
                        Next Question <i class="fas fa-arrow-right ml-2"></i>
                     </button>
                </div>
                
                <!-- Hint Modal (Inline) -->
                <div id="hintText" class="hidden mt-4 bg-yellow-50 dark:bg-yellow-900/30 p-4 rounded-lg border-l-4 border-yellow-400 text-yellow-800 dark:text-yellow-200 text-sm">
                    <strong>Hint:</strong> <span id="hint-content"></span>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="/assets/js/questionGenerator.js"></script>
<script>
    // Inline override/adapter for the specific Grade 3 page
    // This allows us to reuse the logic but control the initialization
    
    document.addEventListener('DOMContentLoaded', () => {
        // Manually trigger load with "Third Grade"
        if(typeof loadQuestions === 'function') {
            loadQuestions('Third Grade'); 
        }
        
        // Override the default loadQuestions to support filtering if we want
        // For now, standard load is fine, but we might want to attach filter listeners
    });

    let currentSubjectFilter = 'All';

    function filterQuestions(subject) {
        currentSubjectFilter = subject;
        console.log("Filter set to:", subject);
        
        // We need to reload questions with this filter.
        // Since the current questionGenerator doesn't support filtering by subject in its public API easily,
        // we might need to modify it or just rely on 'Third Grade' giving a mix, and maybe hacking the display?
        // Actually, I will update questionGenerator.js to accept an optional 2nd argument: subject.
        
        loadQuestions('Third Grade', subject);
        
        // Reset UI
        document.getElementById('feedback-area').classList.add('hidden');
        document.getElementById('next-btn').classList.add('hidden');
    }
    
    // Hint wrapper
    function nextQuestionAdapter() {
         // The generator auto-advances in 2 seconds, so this button is actually redundant or for manual advance.
         // But the generator's `checkAnswer` calls `setTimeout` to advance.
         // If we want a manual "Next" button, we might need to change generator logic or just hide this button.
         // For now, let's keep it hidden or use it to force reload.
         loadCurrentQuestion();
    }
    
    // We need to MutationObserver or Intercept to show the "Next" button or Feedback area when an answer is clicked?
    // actually questionGenerator updates #feedback.
    // Let's add an observer to #feedback to show the #feedback-area container when text appears.
    const observer = new MutationObserver((mutations) => {
        const fb = document.getElementById('feedback');
        if(fb && fb.textContent.trim() !== "") {
            document.getElementById('feedback-area').classList.remove('hidden');
            // Style based on text content (hacky but works without changing JS too much)
            const isCorrect = fb.textContent.includes("Correct");
            const icon = document.getElementById('feedback-icon');
            const title = document.getElementById('feedback-title');
            
            if(isCorrect) {
                document.getElementById('feedback-area').classList.add('bg-green-100', 'dark:bg-green-900/30', 'text-green-800', 'dark:text-green-200');
                document.getElementById('feedback-area').classList.remove('bg-red-100', 'dark:bg-red-900/30', 'text-red-800', 'dark:text-red-200');
                icon.innerHTML = '<i class="fas fa-check-circle text-green-600"></i>';
                title.textContent = "Correct!";
            } else {
                document.getElementById('feedback-area').classList.add('bg-red-100', 'dark:bg-red-900/30', 'text-red-800', 'dark:text-red-200');
                document.getElementById('feedback-area').classList.remove('bg-green-100', 'dark:bg-green-900/30', 'text-green-800', 'dark:text-green-200');
                icon.innerHTML = '<i class="fas fa-times-circle text-red-600"></i>';
                title.textContent = "Incorrect";
            }
        } else {
             document.getElementById('feedback-area').classList.add('hidden');
        }
    });
    
    document.addEventListener('DOMContentLoaded', () => {
        const fb = document.getElementById('feedback');
        if(fb) observer.observe(fb, {childList: true, subtree: true, characterData: true});
    });

</script>

<?php include '../src/footer.php'; ?>