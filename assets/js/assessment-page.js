
document.addEventListener("DOMContentLoaded", () => {
    // === GRADE CONFIGURATION ===
    const gradeConfig = {
        "pre-k": { label: "Pre-K", link: "/Level/a.php", icon: "fa-shapes", color: "bg-pink-500" },
        k: { label: "Kindergarten", link: "/Level/b.php", icon: "fa-child", color: "bg-purple-500" },
        1: { label: "First Grade", link: "/Level/c.php", icon: "fa-star", color: "bg-indigo-500" },
        2: { label: "Second Grade", link: "/Level/d.php", icon: "fa-rocket", color: "bg-blue-500" },
        3: { label: "Third Grade", link: "/Level/e.php", icon: "fa-book-open", color: "bg-sky-500" },
        4: { label: "Fourth Grade", link: "/Level/f.php", icon: "fa-map", color: "bg-teal-500" },
        5: { label: "Fifth Grade", link: "/Level/g.php", icon: "fa-flask", color: "bg-emerald-500" },
        6: { label: "Sixth Grade", link: "/Level/h.php", icon: "fa-globe", color: "bg-green-500" },
        7: { label: "Seventh Grade", link: "/Level/i.php", icon: "fa-landmark", color: "bg-lime-600" },
        8: { label: "Eighth Grade", link: "/Level/j.php", icon: "fa-dna", color: "bg-yellow-600" },
        9: { label: "Ninth Grade", link: "/Level/k.php", icon: "fa-atom", color: "bg-orange-600" },
        10: { label: "Tenth Grade", link: "/Level/l.php", icon: "fa-microscope", color: "bg-red-600" },
        11: { label: "Eleventh Grade", link: "/Level/m.php", icon: "fa-brain", color: "bg-rose-600" },
        12: { label: "Twelfth Grade", link: "/Level/n.php", icon: "fa-graduation-cap", color: "bg-slate-700" },
        ap: { label: "Advanced Placement", link: "#", icon: "fa-university", color: "bg-indigo-900" },
    };

    // === GET PARAMETER ===
    const urlParams = new URLSearchParams(window.location.search);
    let grade = urlParams.get("grade");

    const quizHeader = document.getElementById("quiz-header");
    const quizContainer = document.getElementById("quiz-container");
    const selectionContainer = document.getElementById("assessment-selection");

    // === MODE 1: LANDING PAGE (No Grade Selected) ===
    if (!grade || grade.trim() === "") {
        if (quizHeader) quizHeader.classList.add("hidden");
        if (quizContainer) quizContainer.classList.add("hidden");
        if (selectionContainer) {
            selectionContainer.classList.remove("hidden");
            const grid = document.getElementById("grade-selection-grid");
            if (grid) {
                grid.innerHTML = ""; // Clear existing
                Object.entries(gradeConfig).forEach(([key, info]) => {
                    const card = document.createElement("a");
                    // Assuming 'info.color' might be used for styling, but for now using a standard aesthetic
                    card.href = `?grade=${key}`;
                    card.className = "group block bg-content-bg rounded-3xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden border border-white/20 ring-1 ring-black/5 relative z-10";

                    const iconColor = info.color || "bg-blue-600";

                    card.innerHTML = `
                        <div class="${iconColor} h-32 flex items-center justify-center p-4 relative overflow-hidden">
                            <i class="fas ${info.icon || 'fa-star'} text-6xl text-white/30 absolute -bottom-4 -right-4 transform rotate-12 group-hover:scale-110 transition-transform"></i>
                             <i class="fas ${info.icon || 'fa-star'} text-4xl text-white relative z-10 drop-shadow-md"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">${info.label}</h3>
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-400 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">Start Assessment <i class="fas fa-arrow-right ml-1"></i></span>
                        </div>
                    `;
                    grid.appendChild(card);
                });
            }
        }
        return; // Stop here, do not load quiz logic
    }

    // === MODE 2: QUIZ PAGE (Grade Selected) ===
    // Ensure correct visibility
    if (selectionContainer) selectionContainer.classList.add("hidden");
    if (quizHeader) quizHeader.classList.remove("hidden");
    if (quizContainer) quizContainer.classList.remove("hidden");

    grade = grade.trim().toLowerCase();

    // === ALIASES ===
    const alias = {
        prek: "pre-k",
        "pre k": "pre-k",
        kindergarten: "k",
        kinder: "k",
        "1st": "1",
        first: "1",
        "2nd": "2",
        second: "2",
        "3rd": "3",
        third: "3",
        "4th": "4",
        fourth: "4",
        "5th": "5",
        fifth: "5",
        "6th": "6",
        sixth: "6",
        "7th": "7",
        seventh: "7",
        "8th": "8",
        eighth: "8",
        "9th": "9",
        ninth: "9",
        "10th": "10",
        tenth: "10",
        "11th": "11",
        eleventh: "11",
        "12th": "12",
        twelfth: "12",
    };

    if (alias[grade]) {
        grade = alias[grade];
    }

    // === FIND THE REAL KEY ===
    let currentKey = "3"; // fallback
    let matchFound = false;

    for (const [key, info] of Object.entries(gradeConfig)) {
        const cleanLabel = info.label.toLowerCase().replace(/[\s-]/g, "");
        const cleanInput = grade.replace(/[\s-]/g, "");

        if (
            key === grade ||
            info.label.toLowerCase() === grade ||
            cleanLabel === cleanInput
        ) {
            currentKey = key;
            matchFound = true;
            break;
        }
    }

    // If grade was somehow invalid, maybe redirect or show error? For now fallback to 3rd.
    // Ideally we might want to show the selection screen instead of fallback if invalid.
    if (!matchFound) {
        // Optional: Redirect to selection if invalid grade
        // window.location.href = window.location.pathname; 
        // For now, keeping legacy behavior of defaulting to 3rd grade logic if something weird starts
    }

    // === FINAL VALUES ===
    const gradeName = gradeConfig[currentKey].label;
    const levelLink = gradeConfig[currentKey].link;

    // === PREV / NEXT (perfect order) ===
    const order = ["pre-k", "k", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "ap"];
    const pos = order.indexOf(currentKey);

    // === DOM UPDATES ===

    // 1. Page Titles
    document.title = `${gradeName} Assessment | Hesten's Learning`;
    document.getElementById("header-grade-name").textContent = gradeName;

    // 2. Hidden Inputs (for existing JS logic)
    document.getElementById("force-grade").value = gradeName;
    document.getElementById("grade-key").value = currentKey;

    // 3. Curriculum Link
    document.getElementById("link-curriculum").href = levelLink;

    // 4. Debug Info (if element exists)
    const dbgGrade = document.getElementById("debug-grade");
    if (dbgGrade) dbgGrade.textContent = grade;

    const dbgKey = document.getElementById("debug-key");
    if (dbgKey) dbgKey.textContent = currentKey;

    const dbgName = document.getElementById("debug-name");
    if (dbgName) dbgName.textContent = gradeName;

    // 5. Previous Button
    const prevBtn = document.getElementById("btn-prev");
    const prevSpacer = document.getElementById("spacer-prev");
    if (pos > 0) {
        const prevKey = order[pos - 1];
        prevBtn.href = `?grade=${prevKey}`;
        prevBtn.title = `Go to ${gradeConfig[prevKey].label}`;
        document.getElementById("btn-prev-label").textContent =
            gradeConfig[prevKey].label;
        prevBtn.classList.remove("hidden");
        if (prevSpacer) prevSpacer.classList.add("hidden");
    } else {
        prevBtn.classList.add("hidden");
        if (prevSpacer) prevSpacer.classList.remove("hidden");
    }

    // 6. Next Button
    const nextBtn = document.getElementById("btn-next");
    const nextSpacer = document.getElementById("spacer-next");
    if (pos < order.length - 1) { // Dynamic end check
        const nextKey = order[pos + 1];
        nextBtn.href = `?grade=${nextKey}`;
        nextBtn.title = `Go to ${gradeConfig[nextKey].label}`;
        document.getElementById("btn-next-label").textContent =
            gradeConfig[nextKey].label;
        nextBtn.classList.remove("hidden");
        if (nextSpacer) nextSpacer.classList.add("hidden");
    } else {
        nextBtn.classList.add("hidden");
        if (nextSpacer) nextSpacer.classList.remove("hidden");
    }

    // === TRIGGER EXISTING LOGIC ===
    console.log("Initializing with grade:", gradeName);
    if (typeof loadQuestions === "function") {
        loadQuestions(gradeName);
    }
});

// ==========================================
// CUSTOM LOGIC: Assessment Features (Download, Timer, Sound, Review, Skip)
// ==========================================

// 1. State Variables
window.quizResultsData = [];
let sessionTimerInterval = null;
let sessionSeconds = 0;
let isSoundEnabled = true;

// 2. Audio Context & Playback
const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
function playTone(frequency, type, duration, vol = 0.1) {
    if (!isSoundEnabled) return;
    const oscillator = audioCtx.createOscillator();
    const gainNode = audioCtx.createGain();
    
    oscillator.type = type;
    oscillator.frequency.setValueAtTime(frequency, audioCtx.currentTime);
    gainNode.gain.setValueAtTime(vol, audioCtx.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + duration);
    
    oscillator.connect(gainNode);
    gainNode.connect(audioCtx.destination);
    
    oscillator.start();
    oscillator.stop(audioCtx.currentTime + duration);
}

function playCorrectSound() {
    playTone(600, 'sine', 0.1);
    setTimeout(() => playTone(800, 'sine', 0.2), 100);
}

function playIncorrectSound() {
    playTone(300, 'triangle', 0.3);
    setTimeout(() => playTone(250, 'triangle', 0.3), 150);
}

// 3. Timer Logic
function updateTimerDisplay() {
    const mins = Math.floor(sessionSeconds / 60).toString().padStart(2, '0');
    const secs = (sessionSeconds % 60).toString().padStart(2, '0');
    const timerDisplay = document.getElementById("session-timer");
    if(timerDisplay) timerDisplay.textContent = `${mins}:${secs}`;
}

function startTimer() {
    stopTimer();
    sessionSeconds = 0;
    updateTimerDisplay();
    sessionTimerInterval = setInterval(() => {
        sessionSeconds++;
        updateTimerDisplay();
    }, 1000);
}

function stopTimer() {
    if (sessionTimerInterval) {
        clearInterval(sessionTimerInterval);
        sessionTimerInterval = null;
    }
}

// Sound Toggle Event Listener
document.addEventListener("DOMContentLoaded", () => {
    const soundToggle = document.getElementById("sound-toggle-btn");
    const timerToggle = document.getElementById("timer-toggle-btn");
    
    if (soundToggle) {
        soundToggle.addEventListener("click", () => {
            isSoundEnabled = !isSoundEnabled;
            soundToggle.innerHTML = isSoundEnabled ? '<i class="fas fa-volume-up text-xl w-6"></i>' : '<i class="fas fa-volume-mute text-xl w-6 opacity-50"></i>';
        });
    }

    if (timerToggle) {
        timerToggle.addEventListener("click", () => {
            const timerDisplay = document.getElementById("session-timer");
            if(timerDisplay.classList.contains("hidden")) {
                timerDisplay.classList.remove("hidden");
                timerToggle.innerHTML = '<i class="fas fa-eye text-sm"></i>';
            } else {
                timerDisplay.classList.add("hidden");
                timerToggle.innerHTML = '<i class="fas fa-eye-slash text-sm"></i>';
            }
        });
    }
});

// 4. Hook into loadQuestions to reset data/timer on start/restart
if (typeof loadQuestions === 'function') {
    const originalLoadQuestions = loadQuestions;
    loadQuestions = function (gradeName, subjectFilter) {
        window.quizResultsData = [];
        startTimer();
        const reviewContainer = document.getElementById("review-container");
        if(reviewContainer) reviewContainer.classList.add("hidden");
        document.getElementById("skip-btn")?.classList.remove("hidden");
        
        originalLoadQuestions(gradeName, subjectFilter);
    };
}

// 5. Skip Logic
window.skipQuestion = function() {
    if (typeof currentQuestions !== 'undefined' && typeof currentQuestionIndex !== 'undefined') {
        const q = currentQuestions[currentQuestionIndex];
        if (q) {
            window.quizResultsData.push({
                question: q.question,
                selected: "Skipped",
                correct: q.answer,
                isCorrect: false,
                timestamp: new Date().toLocaleTimeString(),
                hint: q.hint || "No hint available."
            });
            playIncorrectSound(); // Optional feedback for skip
        }
    }
    nextQuestionAdapter();
};

// 6. Hook into checkAnswer to capture data per question and play sound
if (typeof checkAnswer === 'function') {
    const originalCheckAnswer = checkAnswer;
    checkAnswer = function (selected, correct, btnElement) {
        const isCorrect = selected === correct;
        
        try {
            if (typeof currentQuestions !== 'undefined' && typeof currentQuestionIndex !== 'undefined') {
                const q = currentQuestions[currentQuestionIndex];
                if (q) {
                    window.quizResultsData.push({
                        question: q.question,
                        selected: selected,
                        correct: correct,
                        isCorrect: isCorrect,
                        timestamp: new Date().toLocaleTimeString(),
                        hint: q.hint || "No explanation available."
                    });
                    
                    // Track learning focus recommendations if incorrect
                    if (!isCorrect) {
                        try {
                            const gradeKey = document.getElementById("grade-key")?.value || "3";
                            const gradeName = document.getElementById("header-grade-name")?.textContent || "Assessment";
                            logMissedStandard(gradeKey, gradeName, q.subject || "Math");
                        } catch (err) {
                            console.error("Failed to log missed standard:", err);
                        }
                    }
                }
            }
        } catch (e) {
            console.error("Error logging answer for report:", e);
        }
        
        // Audio Feedback
        if (isCorrect) {
            playCorrectSound();
        } else {
            playIncorrectSound();
        }

        originalCheckAnswer(selected, correct, btnElement);
    };
}

// Missed Standard Logger for Curriculum Recommendations
function logMissedStandard(gradeKey, gradeName, subject) {
    const STORAGE_KEY = "hl_missed_standards";
    let missed = [];
    try {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored) missed = JSON.parse(stored);
    } catch (e) {}
    
    // Normalize gradeKey to match learningLevels.js title/id mapping
    let targetId = gradeKey.trim().toLowerCase();
    if (targetId === 'pre-k' || targetId === 'prek' || targetId === 'pre k') targetId = 'pre-k';
    else if (targetId === 'k' || targetId === 'kindergarten') targetId = 'kindergarten';
    else if (!isNaN(targetId)) targetId = 'grade-' + targetId;
    
    const existingIndex = missed.findIndex(item => item.id === targetId && item.subject === subject);
    if (existingIndex > -1) {
        missed[existingIndex].count = (missed[existingIndex].count || 0) + 1;
        missed[existingIndex].timestamp = Date.now();
    } else {
        missed.push({
            id: targetId,
            gradeName: gradeName.replace(" Knowledge Check", "").trim(),
            subject: subject,
            count: 1,
            timestamp: Date.now()
        });
    }
    
    // Keep only the top 5 most recent unique recommendations to keep dashboard focused
    missed.sort((a, b) => b.timestamp - a.timestamp);
    if (missed.length > 5) missed = missed.slice(0, 5);
    
    try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(missed));
    } catch (e) {}
}

// 7. Hook into finishQuiz to inject UI (Review, Download, Confetti)
if (typeof finishQuiz === 'function') {
    const originalFinishQuiz = finishQuiz;
    finishQuiz = function () {
        stopTimer();
        document.getElementById("skip-btn")?.classList.add("hidden");
        
        originalFinishQuiz(); 

        setTimeout(() => {
            const container = document.getElementById('options');
            const resultDiv = container ? container.querySelector('div.text-center') : null;

            // Compute Score
            let scoreCount = 0;
            window.quizResultsData.forEach(item => {
                if (item.isCorrect) scoreCount++;
            });
            const percentage = window.quizResultsData.length > 0 
                ? (scoreCount / window.quizResultsData.length) * 100 
                : 0;

            // Trigger Confetti if score >= 80%
            if (percentage >= 80 && typeof confetti === "function") {
                confetti({
                    particleCount: 150,
                    spread: 70,
                    origin: { y: 0.6 },
                    colors: ['#26ccff', '#a25afd', '#ff5e7e', '#88ff5a', '#fcff42', '#ffa62d', '#ff36ff']
                });
            }

            // Inject Download Button
            if (resultDiv) {
                const downloadBtn = document.createElement('button');
                downloadBtn.className = "bg-green-600 text-white px-8 py-3 rounded-full font-bold hover:bg-green-700 transition-all mt-4 md:ml-4 block md:inline-block w-full md:w-auto shadow-xl hover:shadow-2xl hover:-translate-y-1 flex items-center justify-center gap-2";
                downloadBtn.innerHTML = '<i class="fas fa-file-download mr-2"></i> Download Results';
                downloadBtn.onclick = generateAndDownloadText;
                resultDiv.appendChild(downloadBtn);
            }
            
            // Build Review Mode Screen
            buildReviewMode();

        }, 100);
    };
}

// 8. Generate Review Mode
function buildReviewMode() {
    const reviewContainer = document.getElementById("review-container");
    const reviewContent = document.getElementById("review-content");
    if(!reviewContainer || !reviewContent) return;

    reviewContent.innerHTML = "";
    
    if (window.quizResultsData.length === 0) {
       reviewContent.innerHTML = "<p class='text-text-secondary'>No questions were answered.</p>";
    } else {
        window.quizResultsData.forEach((item, idx) => {
            const isCorrect = item.isCorrect;
            const bgClass = isCorrect ? "bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-800" : "bg-red-50 dark:bg-red-900/10 border-red-200 dark:border-red-800";
            const icon = isCorrect ? '<i class="fas fa-check-circle text-green-500 mt-1"></i>' : '<i class="fas fa-times-circle text-red-500 mt-1"></i>';
            
            let html = `
                <div class="p-4 rounded-xl border ${bgClass} flex gap-3">
                    ${icon}
                    <div class="flex-grow">
                        <p class="font-bold text-text-default mb-1">Q${idx + 1}: ${item.question}</p>
                        <p class="text-sm text-text-secondary"><span class="font-medium">Your Answer:</span> ${item.selected}</p>
            `;
            if (!isCorrect) {
                 html += `<p class="text-sm text-text-secondary"><span class="font-medium text-green-600">Correct Answer:</span> ${item.correct}</p>`;
                 if (item.hint) {
                     html += `<div class="mt-2 text-xs bg-white/50 dark:bg-black/20 p-2 rounded border border-gray-200 dark:border-gray-700 font-medium italic"><i class="fas fa-info-circle"></i> Explanation: ${item.hint}</div>`;
                 }
            }
            html += `</div></div>`;
            reviewContent.insertAdjacentHTML('beforeend', html);
        });
    }
    
    reviewContainer.classList.remove("hidden");
    reviewContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// 9. Download Report Generation
function generateAndDownloadText() {
    const grade = document.getElementById('header-grade-name')?.textContent || "Assessment";
    const mins = Math.floor(sessionSeconds / 60).toString().padStart(2, '0');
    const secs = (sessionSeconds % 60).toString().padStart(2, '0');
    
    let content = `HESTEN'S LEARNING - ASSESSMENT REPORT\n`;
    content += `Subject Level: ${grade}\n`;
    content += `Date: ${new Date().toLocaleString()}\n`;
    content += `Time Taken: ${mins}:${secs}\n`;
    content += `=================================================\n\n`;

    let scoreCount = 0;
    if (window.quizResultsData.length === 0) {
        content += "No questions were answered.\n";
    } else {
        window.quizResultsData.forEach((item, idx) => {
            content += `Q${idx + 1}: ${item.question}\n`;
            content += `   Your Answer:    ${item.selected}\n`;
            if (!item.isCorrect) {
                content += `   Correct Answer: ${item.correct}\n`;
                if(item.hint) content += `   Explanation:    ${item.hint}\n`;
            }
            content += `   Result:         ${item.isCorrect ? "[ CORRECT ]" : "[ INCORRECT ]"}\n`;
            content += `-------------------------------------------------\n`;
            if (item.isCorrect) scoreCount++;
        });
    }

    const percentage = window.quizResultsData.length > 0
        ? Math.round((scoreCount / window.quizResultsData.length) * 100)
        : 0;

    content += `\nSUMMARY:\n`;
    content += `Total Questions: ${window.quizResultsData.length}\n`;
    content += `Correct Answers: ${scoreCount}\n`;
    content += `Final Score:     ${percentage}%\n`;

    const blob = new Blob([content], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `Assessment_Result_${new Date().toISOString().slice(0, 10)}.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

// ==========================================
// END CUSTOM LOGIC
// ==========================================

let currentSubjectFilter = "All";

function filterQuestions(subject) {
    currentSubjectFilter = subject;
    const gradeName = document.getElementById("force-grade").value;

    console.log("Filtering questions for:", gradeName, "Subject:", subject);

    if (typeof loadQuestions === "function") {
        loadQuestions(gradeName, subject);
    }

    // Reset UI
    document.getElementById("feedback-area").classList.add("hidden");
    document.getElementById("next-btn").classList.add("hidden");
}

function nextQuestionAdapter() {
    if (typeof loadCurrentQuestion === "function") {
        loadCurrentQuestion();
    }
}

// Feedback observer
const observer = new MutationObserver((mutations) => {
    const fb = document.getElementById("feedback");
    if (fb && fb.textContent.trim() !== "") {
        document.getElementById("feedback-area").classList.remove("hidden");
        const isCorrect = fb.textContent.includes("Correct");
        const icon = document.getElementById("feedback-icon");
        const title = document.getElementById("feedback-title");

        if (isCorrect) {
            document
                .getElementById("feedback-area")
                .classList.add(
                    "bg-green-100",
                    "dark:bg-green-900/30",
                    "text-green-800",
                    "dark:text-green-200"
                );
            document
                .getElementById("feedback-area")
                .classList.remove(
                    "bg-red-100",
                    "dark:bg-red-900/30",
                    "text-red-800",
                    "dark:text-red-200"
                );
            icon.innerHTML =
                '<i class="fas fa-check-circle text-green-600"></i>';
            title.textContent = "Correct!";
        } else {
            document
                .getElementById("feedback-area")
                .classList.add(
                    "bg-red-100",
                    "dark:bg-red-900/30",
                    "text-red-800",
                    "dark:text-red-200"
                );
            document
                .getElementById("feedback-area")
                .classList.remove(
                    "bg-green-100",
                    "dark:bg-green-900/30",
                    "text-green-800",
                    "dark:text-green-200"
                );
            icon.innerHTML = '<i class="fas fa-times-circle text-red-600"></i>';
            title.textContent = "Incorrect";
        }
    } else {
        document.getElementById("feedback-area").classList.add("hidden");
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const fb = document.getElementById("feedback");
    if (fb) {
        observer.observe(fb, {
            childList: true,
            subtree: true,
            characterData: true,
        });
    }
});
