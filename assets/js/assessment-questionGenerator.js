/**
 * questionGenerator.js
 * Handles the interactive quiz section with theme support.
 */

let currentQuestions = [];
let currentQuestionIndex = 0;
let userAnswers = [];
let correctCount = 0;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

document.addEventListener('DOMContentLoaded', () => {
    const savedGrade = localStorage.getItem('user-grade') || 'First Grade';
    loadQuestions(savedGrade);
});

function loadQuestions(grade, subjectFilter = 'All') {
    currentQuestions = generateQuestionsForGrade(grade, subjectFilter);
    currentQuestionIndex = 0;
    userAnswers = [];
    correctCount = 0;

    updateProgressBar(0);

    if (currentQuestions.length > 0) {
        loadCurrentQuestion();
    } else {
        document.getElementById('question').textContent = 'No questions available for this grade.';
        document.getElementById('options').innerHTML = '';
        document.getElementById('feedback').textContent = '';
    }
}

function updateProgressBar(percentage) {
    const bar = document.querySelector('.progress-bar-animated');
    if (bar) {
        bar.style.width = `${percentage}%`;
        bar.textContent = `${Math.round(percentage)}%`;
        bar.setAttribute('aria-valuenow', percentage);
    }
}

function loadCurrentQuestion() {
    const questionContainer = document.getElementById("question");
    const optionsContainer = document.getElementById("options");
    const feedbackContainer = document.getElementById("feedback");
    const hintText = document.getElementById("hintText");
    const explanationText = document.getElementById("explanationText");
    const progressText = document.getElementById("question-progress");

    feedbackContainer.textContent = "";
    feedbackContainer.className = "feedback text-base font-medium flex items-center h-6";
    optionsContainer.innerHTML = "";
    hintText.classList.add("hidden");
    explanationText.classList.add("hidden");

    if (progressText) {
        progressText.textContent = `Question ${currentQuestionIndex + 1} of ${currentQuestions.length}`;
    }

    const total = currentQuestions.length;
    const progress = ((currentQuestionIndex) / total) * 100;
    updateProgressBar(progress);

    const questionData = currentQuestions[currentQuestionIndex];
    questionContainer.textContent = questionData.question;

    const shuffledOptions = shuffleArray([...questionData.options]);

    shuffledOptions.forEach(option => {
        const btn = document.createElement("button");
        btn.textContent = option;
        // Updated: Uses text-text-default, border-gray-200/dark:600, hover:bg-base-bg
        btn.className = "w-full text-left p-4 rounded-lg border-2 border-gray-200 dark:border-gray-600 hover:border-primary hover:bg-base-bg transition-all duration-200 font-medium text-text-default focus:outline-none focus:ring-2 focus:ring-primary option-btn";
        btn.onclick = (e) => checkAnswer(option, e.target);
        optionsContainer.appendChild(btn);
    });

    const hintBtn = document.getElementById('hintButton');
    const explainBtn = document.getElementById('explainButton');

    if (hintBtn) hintBtn.style.display = questionData.hint ? 'inline-block' : 'none';
    if (explainBtn) explainBtn.style.display = 'none';
}

function showHint() {
    const hintText = document.getElementById("hintText");
    const data = currentQuestions[currentQuestionIndex];
    hintText.textContent = "💡 Hint: " + (data.hint || "No hint available.");
    hintText.classList.remove("hidden");
}

function showExplanation() {
    const text = document.getElementById("explanationText");
    const data = currentQuestions[currentQuestionIndex];
    text.textContent = "📘 Explanation: " + (data.explanation || "No explanation available.");
    text.classList.remove("hidden");
}

function checkAnswer(selectedOption, btnElement) {
    const allBtns = document.querySelectorAll('.option-btn');
    allBtns.forEach(b => b.disabled = true);

    const questionData = currentQuestions[currentQuestionIndex];
    const isCorrect = String(selectedOption) === String(questionData.answer);

    userAnswers.push({
        question: questionData.question,
        selected: selectedOption,
        correct: questionData.answer,
        isCorrect: isCorrect
    });

    if (isCorrect) {
        correctCount++;
        // Updated: Dark mode friendly Green
        btnElement.classList.add("bg-green-100", "dark:bg-green-900", "border-green-500", "text-green-800", "dark:text-green-100");
        const feedback = document.getElementById("feedback");
        feedback.textContent = "Correct! Great job.";
        feedback.classList.add("text-green-600", "dark:text-green-400");
    } else {
        // Updated: Dark mode friendly Red
        btnElement.classList.add("bg-red-100", "dark:bg-red-900", "border-red-500", "text-red-800", "dark:text-red-100");
        const feedback = document.getElementById("feedback");
        feedback.textContent = "Incorrect. The correct answer was: " + questionData.answer;
        feedback.classList.add("text-red-600", "dark:text-red-400");

        allBtns.forEach(b => {
            if (String(b.textContent) === String(questionData.answer)) {
                b.classList.add("bg-green-100", "dark:bg-green-900", "border-green-500", "dark:border-green-500", "text-green-800", "dark:text-green-100");
            }
        });
    }

    const explainBtn = document.getElementById('explainButton');
    if (explainBtn && questionData.explanation) explainBtn.style.display = 'inline-block';

    setTimeout(() => {
        currentQuestionIndex++;
        if (currentQuestionIndex < currentQuestions.length) {
            loadCurrentQuestion();
        } else {
            finishQuiz();
        }
    }, 2000);
}

function finishQuiz() {
    updateProgressBar(100);
    const scorePercent = Math.round((correctCount / currentQuestions.length) * 100);

    if (typeof showMessageBox === 'function') {
        showMessageBox(`Quiz Complete! You scored ${scorePercent}% (${correctCount}/${currentQuestions.length}). Check the Recent Activity or download your results.`);
    } else {
        alert(`Quiz Complete! Score: ${scorePercent}%`);
    }

    currentQuestionIndex = 0;
    userAnswers = [];
    correctCount = 0;
    currentQuestions = shuffleArray([...currentQuestions]);
    setTimeout(loadCurrentQuestion, 2000);
}

const downloadBtn = document.getElementById("downloadAnswers");
if (downloadBtn) {
    downloadBtn.onclick = function () {
        if (userAnswers.length === 0) {
            if (typeof showMessageBox === 'function') showMessageBox("No answers to download yet. Complete some questions first!");
            else alert("No answers yet.");
            return;
        }

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const date = new Date().toLocaleDateString();

        doc.setFontSize(18);
        doc.text("Assessment Report", 10, 20);
        doc.setFontSize(12);
        doc.text(`Date: ${date}`, 10, 30);

        let y = 40;
        userAnswers.forEach((ans, i) => {
            if (y > 270) { doc.addPage(); y = 20; }

            doc.setFont("helvetica", "bold");
            doc.text(`${i + 1}. ${ans.question}`, 10, y);
            y += 7;

            doc.setFont("helvetica", "normal");
            doc.setTextColor(ans.isCorrect ? 0 : 200, ans.isCorrect ? 100 : 0, 0);
            doc.text(`Your Answer: ${ans.selected} (${ans.isCorrect ? 'Correct' : 'Incorrect'})`, 15, y);
            doc.setTextColor(0);
            y += 7;

            if (!ans.isCorrect) {
                doc.text(`Correct Answer: ${ans.correct}`, 15, y);
                y += 7;
            }
            y += 5;
        });

        doc.save("assessment_results.pdf");
    };
}

function generateQuestionsForGrade(grade, filter = 'All') {
    let questions = [];
    // Enhanced add helper with Subject header
    const add = (subj, q, opts, ans, hint, exp) => questions.push({ subject: subj, question: q, options: opts, answer: ans, hint: hint, explanation: exp });

    const MATH = 'Math';
    const ELA = 'Language Arts';
    const SCI = 'Science';
    const SOC = 'Social Studies';

    if (grade === 'Pre-K' || grade === 'First Grade') {
        add(MATH, "Which number comes after 5?", ["4", "6", "7", "3"], "6", "Count: 1, 2, 3, 4, 5...", "6 comes right after 5.");
        add(MATH, "Which shape is round?", ["Square", "Triangle", "Circle", "Rectangle"], "Circle", "Think of a ball.", "A circle has no corners.");
        add(SCI, "What color is the sky usually?", ["Green", "Blue", "Red", "Purple"], "Blue", "Look up outside!", "The sky appears blue due to sunlight scattering.");
        add(MATH, "2 + 2 = ?", ["3", "4", "5", "22"], "4", "Use your fingers.", "2 plus 2 makes 4.");
    }
    else if (grade === 'Second Grade') {
        add(MATH, "5 + 5 = ?", ["8", "10", "12", "15"], "10", "Count by 5s.", "5 plus 5 equals 10.");
        add(ELA, "Which is a noun?", ["Run", "Happy", "Cat", "Quickly"], "Cat", "Person, place, or thing.", "A cat is a thing (animal).");
        add(SCI, "What do plants need to grow?", ["Candy", "Sunlight", "Music", "Toys"], "Sunlight", "It comes from the sky.", "Plants need sunlight for photosynthesis.");
    }
    else if (grade === 'Third Grade') {
        // --- MATH (Multiplication, Division, Rounding) ---
        add(MATH, "3 x 4 = ?", ["7", "12", "10", "15"], "12", "Count 3 four times: 3, 6, 9, 12.", "Multiplication is repeated addition.");
        add(MATH, "Which equation matches: '5 groups of 2'?", ["5 + 2", "5 - 2", "5 x 2", "5 / 2"], "5 x 2", "Groups imply multiplication.", "5 groups of 2 is 5 times 2.");
        add(MATH, "Round 43 to the nearest 10.", ["40", "50", "45", "100"], "40", "Is 3 closer to 0 or 10?", "43 is closer to 40 than 50.");
        add(MATH, "20 / 4 = ?", ["4", "5", "6", "10"], "5", "What times 4 is 20?", "5 times 4 is 20.");
        add(MATH, "If a rectangle is 2m x 5m, what is the area?", ["7m", "10 sq m", "3m", "20 sq m"], "10 sq m", "Area = Length x Width.", "2 times 5 is 10.");

        // --- ELA (Reading, Grammar) ---
        add(ELA, "Choose the verb: 'The dog ran fast.'", ["dog", "ran", "fast", "The"], "ran", "Action word.", "Running is an action.");
        add(ELA, "What is the plural of 'mouse'?", ["mouses", "mice", "mouse", "meese"], "mice", "Irregular plural.", "One mouse, two mice.");
        add(ELA, "Identify the adjective: 'Blue sky'", ["Blue", "sky", "is", "up"], "Blue", "Describing word.", "Blue describes the sky.");

        // --- SCIENCE (Forces, Life Cycles) ---
        add(SCI, "A push or a pull is called a...", ["Motion", "Force", "Gravity", "Speed"], "Force", "Physics term.", "Forces make things move.");
        add(SCI, "Which animal is an amphibian?", ["Dog", "Eagle", "Frog", "Shark"], "Frog", "Lives on land and water.", "Frogs start as tadpoles in water.");
        add(SCI, "What planet do we live on?", ["Mars", "Earth", "Venus", "Jupiter"], "Earth", "The Blue Planet.", "Humans live on Earth.");

        // --- SOCIAL STUDIES (Geography, Communities) ---
        add(SOC, "Which shows cardinal directions?", ["Thermometer", "Compass", "Ruler", "Scale"], "Compass", "North, South, East, West.", "A compass points North.");
        add(SOC, "A community's laws are made by...", ["Doctors", "Government", "Teachers", "Farmers"], "Government", "City Council, Mayor, etc.", "Government sets rules for the community.");
    }
    else if (grade === 'Fourth Grade' || grade === 'Fifth Grade') {
        add(MATH, "What is 1/2 as a decimal?", ["0.5", "0.2", "0.75", "1.2"], "0.5", "Think of half a dollar.", "1 divided by 2 is 0.5");
        add(SCI, "Which planet is the Red Planet?", ["Venus", "Mars", "Jupiter", "Saturn"], "Mars", "It's the 4th planet.", "Mars has iron oxide dust giving it a red color.");
        add(MATH, "30 / 6 = ?", ["4", "5", "6", "7"], "5", "What times 6 equals 30?", "6 x 5 = 30.");
    }
    else {
        add(MATH, "Solve for x: 2x = 10", ["2", "5", "8", "20"], "5", "Divide by 2.", "If 2x = 10, then x = 10/2.");
        add(SOC, "What is the capital of France?", ["London", "Berlin", "Paris", "Rome"], "Paris", "Eiffel Tower location.", "Paris is the capital.");
        add(SCI, "Chemical symbol for Gold?", ["Ag", "Au", "Fe", "Go"], "Au", "Latin 'Aurum'.", "Au stands for Aurum.");
        add(MATH, "Value of Pi (approx)?", ["3.14", "4.13", "3.41", "3.00"], "3.14", "Circles related.", "Pi is approx 3.14159...");
    }

    // Generic Math Fact Filler (Subject: Math)
    for (let i = 0; i < 3; i++) {
        const a = Math.floor(Math.random() * 10) + 1;
        const b = Math.floor(Math.random() * 10) + 1;
        add(MATH, `Quick Math: ${a} + ${b}?`, [String(a + b), String(a + b + 1), String(a + b - 1), String(a + b + 2)], String(a + b), "Add the numbers.", "It's a basic fact.");
    }

    // Apply Filter
    if (filter !== 'All') {
        questions = questions.filter(q => q.subject === filter);
    }

    return questions;
}