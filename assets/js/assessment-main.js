document.addEventListener("DOMContentLoaded", () => {
  // === GRADE CONFIGURATION ===
  const gradeConfig = {
    "pre-k": {
      label: "Pre-K",
      link: "/levels/a.php",
      icon: "fa-shapes",
      color: "bg-pink-500",
    },
    k: {
      label: "Kindergarten",
      link: "/levels/b.php",
      icon: "fa-child",
      color: "bg-purple-500",
    },
    1: {
      label: "First Grade",
      link: "/levels/c.php",
      icon: "fa-star",
      color: "bg-indigo-500",
    },
    2: {
      label: "Second Grade",
      link: "/levels/d.php",
      icon: "fa-rocket",
      color: "bg-blue-500",
    },
    3: {
      label: "Third Grade",
      link: "/levels/e.php",
      icon: "fa-book-open",
      color: "bg-sky-500",
    },
    4: {
      label: "Fourth Grade",
      link: "/levels/f.php",
      icon: "fa-map",
      color: "bg-teal-500",
    },
    5: {
      label: "Fifth Grade",
      link: "/levels/g.php",
      icon: "fa-flask",
      color: "bg-emerald-500",
    },
    6: {
      label: "Sixth Grade",
      link: "/levels/h.php",
      icon: "fa-globe",
      color: "bg-green-500",
    },
    7: {
      label: "Seventh Grade",
      link: "/levels/i.php",
      icon: "fa-landmark",
      color: "bg-lime-600",
    },
    8: {
      label: "Eighth Grade",
      link: "/levels/j.php",
      icon: "fa-dna",
      color: "bg-yellow-600",
    },
    9: {
      label: "Ninth Grade",
      link: "/levels/k.php",
      icon: "fa-atom",
      color: "bg-orange-600",
    },
    10: {
      label: "Tenth Grade",
      link: "/levels/l.php",
      icon: "fa-microscope",
      color: "bg-red-600",
    },
    11: {
      label: "Eleventh Grade",
      link: "/levels/m.php",
      icon: "fa-brain",
      color: "bg-rose-600",
    },
    12: {
      label: "Twelfth Grade",
      link: "/levels/n.php",
      icon: "fa-graduation-cap",
      color: "bg-slate-700",
    },
    ap: {
      label: "Advanced Placement",
      link: "#",
      icon: "fa-university",
      color: "bg-indigo-900",
    },
  };

  // === GET PARAMETER & TARGETED STANDARD HASH ===
  const urlParams = new URLSearchParams(window.location.search);
  let grade = urlParams.get("grade");

  // Helper functions for standard inference & hash routing
  function inferGradeFromStandard(code) {
    if (!code) return "3";
    const c = code.trim();
    if (/^K\./i.test(c) || /\bK\b/i.test(c)) return "k";
    const leadingNumMatch = c.match(/^(\d+)\./);
    if (leadingNumMatch) return leadingNumMatch[1];
    const middleNumMatch = c.match(/[A-Z]+\.(\d+)\./i);
    if (middleNumMatch) return middleNumMatch[1];
    if (/9-10/i.test(c)) return "9";
    if (/11-12/i.test(c)) return "11";
    if (/^MS-/i.test(c)) return "7";
    if (/^HS-/i.test(c)) return "10";
    if (/^HS[A-Z]/i.test(c)) return "10";
    return "3";
  }

  function inferSubjectFromStandard(code) {
    if (!code) return "Math";
    const c = code.trim().toUpperCase();
    if (/\b(OA|NBT|NF|MD|RP|NS|EE|HSN|HSA|HSF|HSG|HSS)\b/.test(c) || /^(K|\d+)\.(OA|NBT|NF|MD|G|RP|NS|EE|SP)/.test(c)) {
      return "Math";
    }
    if (/\b(RL|RI|RF|W|SL|L)\b/.test(c) || /^(RL|RI|RF|W|SL|L)\./.test(c)) {
      return "Language Arts";
    }
    if (/(PS|LS|ESS|ETS)/.test(c) || /NGSS/i.test(c)) {
      return "Science";
    }
    if (/(HIST|GEO|GOV|ECON|CIV|NCSS|SOC)/.test(c)) {
      return "Social Studies";
    }
    return "Math";
  }

  function getHashStandard() {
    const hash = window.location.hash || "";
    const match = hash.match(/standard=([^&]+)/i);
    return match ? decodeURIComponent(match[1]).trim() : null;
  }

  const initialHashStandard = getHashStandard();
  if ((!grade || grade.trim() === "") && initialHashStandard) {
    grade = inferGradeFromStandard(initialHashStandard);
  }

  const quizHeader = document.getElementById("quiz-header");
  const quizContainer = document.getElementById("quiz-container");
  const selectionContainer = document.getElementById("assessment-selection");

  // === MODE 1: LANDING PAGE (No Grade Selected and No Targeted Standard) ===
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
          card.href = `?grade=${key}`;
          card.className = "assessment-grade-card group";

          const iconColor = info.color || "bg-blue-500";

          card.innerHTML = `
                        <div class="assessment-grade-card-icon-wrapper ${iconColor}">
                            <i class="fas ${info.icon || "fa-star"} text-white/30"></i>
                            <i class="fas ${info.icon || "fa-star"} text-white"></i>
                        </div>
                        <div class="assessment-grade-card-info">
                            <h3 class="assessment-grade-card-title">${info.label}</h3>
                            <span class="assessment-grade-card-action-text">Start Assessment <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
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
  const order = [
    "pre-k",
    "k",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "11",
    "12",
    "ap",
  ];
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
  if (pos < order.length - 1) {
    // Dynamic end check
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

  // === TRIGGER START MENU OR LANDING MODE ===
  console.log("Loading start menu for grade:", gradeName);
  
  // Hide quiz container/header initially
  if (quizHeader) quizHeader.classList.add("hidden");
  if (quizContainer) quizContainer.classList.add("hidden");
  
  const startMenu = document.getElementById("assessment-start-menu");
  if (startMenu) {
      startMenu.classList.remove("hidden");
  }
  
  // Expose global function to start assessment from Start Menu
  window.startAssessmentMode = function(subjectFilter) {
      if (startMenu) startMenu.classList.add("hidden");
      if (quizHeader) quizHeader.classList.remove("hidden");
      if (quizContainer) quizContainer.classList.remove("hidden");
      
      // Reset diagnostic recommendation container
      const diagContainer = document.getElementById("diagnostic-container");
      if (diagContainer) diagContainer.style.display = "none";
      
      // Save current assessment type (mixed Entrance Exam vs subject specific)
      window.currentAssessmentType = subjectFilter === 'All' ? 'Entrance Exam' : 'Subject Assessment';
      window.currentAssessmentSubject = subjectFilter;
      
      // Clear any standard banner if moving back to normal mode
      const banner = document.getElementById("targeted-standard-banner");
      if (banner) banner.classList.add("hidden");
      window.targetedStandard = null;

      // Set the sidebar filter highlight to active for the selected subject
      updateSidebarFilterUI(subjectFilter);
      
      // Load questions via core callback
      if (typeof loadQuestions === "function") {
          loadQuestions(gradeName, subjectFilter);
      }
  };

  // Standard-targeted test launcher
  window.launchStandardTargetedTest = function(standardCode) {
      if (!standardCode) return;
      window.targetedStandard = standardCode;

      const banner = document.getElementById("targeted-standard-banner");
      const bannerTitle = document.getElementById("targeted-standard-title");
      const bannerSubj = document.getElementById("targeted-standard-subject-pill");
      const bannerDesc = document.getElementById("targeted-standard-desc");

      const subject = inferSubjectFromStandard(standardCode);

      if (banner) {
          banner.classList.remove("hidden");
          if (bannerTitle) bannerTitle.textContent = `Standard Mastery: ${standardCode}`;
          if (bannerSubj) bannerSubj.textContent = subject;
          if (bannerDesc) bannerDesc.textContent = `Targeted assessment evaluating key competencies, operational fluency, and conceptual understanding for standard ${standardCode}.`;
      }

      if (startMenu) startMenu.classList.add("hidden");
      if (quizHeader) quizHeader.classList.remove("hidden");
      if (quizContainer) quizContainer.classList.remove("hidden");

      window.currentAssessmentType = `Standard Assessment: ${standardCode}`;
      window.currentAssessmentSubject = subject;

      updateSidebarFilterUI(subject);

      if (typeof loadQuestions === "function") {
          loadQuestions(gradeName, subject);
      }
  };

  // Exit targeted test mode
  window.exitStandardTargetedTest = function(updateHash = true) {
      window.targetedStandard = null;
      const banner = document.getElementById("targeted-standard-banner");
      if (banner) banner.classList.add("hidden");

      if (updateHash) {
          history.replaceState(null, null, window.location.pathname + (window.location.search || ""));
      }

      if (startMenu) {
          startMenu.classList.remove("hidden");
          if (quizHeader) quizHeader.classList.add("hidden");
          if (quizContainer) quizContainer.classList.add("hidden");
      }
  };

  // Auto-launch targeted test if hash is present on initialization
  if (initialHashStandard) {
      launchStandardTargetedTest(initialHashStandard);
  }

  // Dynamic hash listener for standard switches
  window.addEventListener("hashchange", () => {
      const std = getHashStandard();
      if (std) {
          launchStandardTargetedTest(std);
      } else if (window.targetedStandard) {
          exitStandardTargetedTest(false);
      }
  });
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
  gainNode.gain.exponentialRampToValueAtTime(
    0.001,
    audioCtx.currentTime + duration,
  );

  oscillator.connect(gainNode);
  gainNode.connect(audioCtx.destination);

  oscillator.start();
  oscillator.stop(audioCtx.currentTime + duration);
}

function playCorrectSound() {
  playTone(600, "sine", 0.1);
  setTimeout(() => playTone(800, "sine", 0.2), 100);
}

function playIncorrectSound() {
  playTone(300, "triangle", 0.3);
  setTimeout(() => playTone(250, "triangle", 0.3), 150);
}

// 3. Timer Logic
function updateTimerDisplay() {
  const mins = Math.floor(sessionSeconds / 60)
    .toString()
    .padStart(2, "0");
  const secs = (sessionSeconds % 60).toString().padStart(2, "0");
  const timerDisplay = document.getElementById("session-timer");
  if (timerDisplay) timerDisplay.textContent = `${mins}:${secs}`;
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
      soundToggle.innerHTML =
        isSoundEnabled ?
          '<i class="fas fa-volume-up text-xl w-6"></i>'
        : '<i class="fas fa-volume-mute text-xl w-6 opacity-50"></i>';
    });
  }

  if (timerToggle) {
    timerToggle.addEventListener("click", () => {
      const timerDisplay = document.getElementById("session-timer");
      if (timerDisplay.classList.contains("hidden")) {
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
if (typeof loadQuestions === "function") {
  const originalLoadQuestions = loadQuestions;
  loadQuestions = function (gradeName, subjectFilter) {
    window.quizResultsData = [];
    startTimer();
    const reviewContainer = document.getElementById("review-container");
    if (reviewContainer) reviewContainer.classList.add("hidden");
    document.getElementById("skip-btn")?.classList.remove("hidden");

    originalLoadQuestions(gradeName, subjectFilter);
  };
}

// 5. Skip Logic
window.skipQuestion = function () {
  if (
    typeof currentQuestions !== "undefined" &&
    typeof currentQuestionIndex !== "undefined"
  ) {
    const q = currentQuestions[currentQuestionIndex];
    if (q) {
      window.quizResultsData.push({
        question: q.question,
        selected: "Skipped",
        correct: q.answer,
        isCorrect: false,
        timestamp: new Date().toLocaleTimeString(),
        hint: q.hint || "No hint available.",
        subject: q.subject || "General",
        standard: q.standard || window.targetedStandard || null,
      });
      playIncorrectSound(); // Optional feedback for skip
    }
  }
  nextQuestionAdapter();
};

// 6. Hook into checkAnswer to capture data per question and play sound
if (typeof checkAnswer === "function") {
  const originalCheckAnswer = checkAnswer;
  checkAnswer = function (selected, correct, btnElement) {
    const isCorrect = selected === correct;

    try {
      if (
        typeof currentQuestions !== "undefined" &&
        typeof currentQuestionIndex !== "undefined"
      ) {
        const q = currentQuestions[currentQuestionIndex];
        if (q) {
          window.quizResultsData.push({
            question: q.question,
            selected: selected,
            correct: correct,
            isCorrect: isCorrect,
            timestamp: new Date().toLocaleTimeString(),
            hint: q.hint || "No explanation available.",
            subject: q.subject || "General",
            standard: q.standard || window.targetedStandard || null,
          });

          // Track learning focus recommendations if incorrect
          if (!isCorrect) {
            try {
              const gradeKey =
                document.getElementById("grade-key")?.value || "3";
              const gradeName =
                document.getElementById("header-grade-name")?.textContent ||
                "Assessment";
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
  if (targetId === "pre-k" || targetId === "prek" || targetId === "pre k")
    targetId = "pre-k";
  else if (targetId === "k" || targetId === "kindergarten")
    targetId = "kindergarten";
  else if (!isNaN(targetId)) targetId = "grade-" + targetId;

  const existingIndex = missed.findIndex(
    (item) => item.id === targetId && item.subject === subject,
  );
  if (existingIndex > -1) {
    missed[existingIndex].count = (missed[existingIndex].count || 0) + 1;
    missed[existingIndex].timestamp = Date.now();
  } else {
    missed.push({
      id: targetId,
      gradeName: gradeName.replace(" Knowledge Check", "").trim(),
      subject: subject,
      count: 1,
      timestamp: Date.now(),
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
if (typeof finishQuiz === "function") {
  const originalFinishQuiz = finishQuiz;
  finishQuiz = function () {
    stopTimer();
    document.getElementById("skip-btn")?.classList.add("hidden");

    originalFinishQuiz();

    setTimeout(() => {
      const container = document.getElementById("options");
      const resultDiv =
        container ? container.querySelector("div.text-center") : null;

      // Compute Score
      let scoreCount = 0;
      window.quizResultsData.forEach((item) => {
        if (item.isCorrect) scoreCount++;
      });
      const percentage =
        window.quizResultsData.length > 0 ?
          (scoreCount / window.quizResultsData.length) * 100
        : 0;

      // Trigger Confetti if score >= 80%
      if (percentage >= 80 && typeof confetti === "function") {
        confetti({
          particleCount: 150,
          spread: 70,
          origin: { y: 0.6 },
          colors: [
            "#26ccff",
            "#a25afd",
            "#ff5e7e",
            "#88ff5a",
            "#fcff42",
            "#ffa62d",
            "#ff36ff",
          ],
        });
      }

      // Inject Action Buttons (Mastery Report + Download Text)
      if (resultDiv) {
        const btnContainer = document.createElement("div");
        btnContainer.className = "mastery-actions-container";
        btnContainer.style.cssText = "display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center; align-items: center; margin-top: 1.5rem;";

        const reportBtn = document.createElement("button");
        reportBtn.className = "hero-nav-btn hero-nav-btn-primary";
        reportBtn.style.cssText = "padding: 0.85rem 1.75rem; border-radius: var(--radius-full); font-weight: 800; font-size: 1rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: 0 10px 20px -5px rgba(0,0,0,0.3); border: none;";
        reportBtn.innerHTML = '<i class="fas fa-file-invoice"></i> View & Print Mastery Report';
        reportBtn.onclick = () => window.openMasteryReportCard();

        const downloadBtn = document.createElement("button");
        downloadBtn.className = "hero-nav-btn hero-nav-btn-outline";
        downloadBtn.style.cssText = "padding: 0.85rem 1.75rem; border-radius: var(--radius-full); font-weight: 700; font-size: 0.95rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem;";
        downloadBtn.innerHTML = '<i class="fas fa-file-download"></i> Download Text Summary';
        downloadBtn.onclick = generateAndDownloadText;

        btnContainer.appendChild(reportBtn);
        btnContainer.appendChild(downloadBtn);
        resultDiv.appendChild(btnContainer);
      }

      // Only show diagnostics if Entrance Exam was taken
      if (window.currentAssessmentType === 'Entrance Exam') {
          const subjectStats = {};
          
          // Count total and correct per subject
          window.quizResultsData.forEach((item) => {
              const subj = item.subject || 'General';
              if (!subjectStats[subj]) {
                  subjectStats[subj] = { total: 0, correct: 0 };
              }
              subjectStats[subj].total++;
              if (item.isCorrect) {
                  subjectStats[subj].correct++;
              }
          });
          
          // Generate recommendations
          const recommendations = [];
          const currentKey = document.getElementById("grade-key")?.value || "3";
          
          // Level links based on gradeConfig
          const levelLink = gradeConfig[currentKey]?.link || "/";
          const gradeLabel = gradeConfig[currentKey]?.label || "this Grade";

          Object.entries(subjectStats).forEach(([subj, stats]) => {
              const pct = (stats.correct / stats.total) * 100;
              if (pct < 80) {
                  recommendations.push({
                      subject: subj,
                      score: Math.round(pct),
                      total: stats.total,
                      correct: stats.correct,
                      link: levelLink,
                      message: `Scored ${Math.round(pct)}% in ${subj}. We suggest reviewing ${gradeLabel} ${subj} curriculum lessons.`
                  });
              }
          });
          
          // Display recommendations
          const diagContainer = document.getElementById("diagnostic-container");
          const diagList = document.getElementById("diagnostic-list");
          if (diagContainer && diagList) {
              diagList.innerHTML = "";
              if (recommendations.length > 0) {
                  recommendations.forEach(rec => {
                      const item = document.createElement("div");
                      item.className = "assessment-card";
                      item.style.margin = "0";
                      item.style.padding = "1rem";
                      item.style.borderLeft = "4px solid var(--color-warning)";
                      item.style.display = "flex";
                      item.style.justifyContent = "space-between";
                      item.style.alignItems = "center";
                      item.style.backgroundColor = "var(--color-bg-base)";
                      
                      let subjectIcon = "fa-book";
                      if (rec.subject === 'Math') subjectIcon = "fa-calculator";
                      else if (rec.subject === 'Language Arts') subjectIcon = "fa-book-reader";
                      else if (rec.subject === 'Science') subjectIcon = "fa-flask";
                      else if (rec.subject === 'Social Studies') subjectIcon = "fa-globe-americas";

                      item.innerHTML = `
                          <div style="display: flex; align-items: center; gap: 0.75rem;">
                              <i class="fas ${subjectIcon}" style="color: var(--color-warning); font-size: 1.25rem;"></i>
                              <div>
                                  <p style="font-weight: 700; font-size: 0.95rem; margin: 0;">Focus Area: ${rec.subject}</p>
                                  <p style="font-size: 0.8rem; color: var(--color-text-muted); margin: 0.25rem 0 0 0;">${rec.message}</p>
                              </div>
                          </div>
                          <a href="${rec.link}" class="hero-nav-btn hero-nav-btn-outline" style="padding: 0.4rem 1rem; font-size: 0.75rem; border-radius: var(--radius-md); font-weight: 700; white-space: nowrap;">
                              Study ${rec.subject}
                          </a>
                      `;
                      diagList.appendChild(item);
                  });
                  diagContainer.style.display = "block";
              } else {
                  // Perfect score suggestion
                  diagList.innerHTML = `
                      <div class="assessment-card" style="margin: 0; padding: 1.5rem; border-left: 4px solid var(--color-success); background-color: var(--color-bg-base); display: flex; align-items: center; gap: 0.75rem;">
                          <i class="fas fa-check-double" style="color: var(--color-success); font-size: 1.5rem;"></i>
                          <div>
                              <p style="font-weight: 700; font-size: 0.95rem; margin: 0;">Excellent Placement!</p>
                              <p style="font-size: 0.8rem; color: var(--color-text-muted); margin: 0.25rem 0 0 0;">You've demonstrated solid mastery (&gt;80%) in all core subjects for ${gradeLabel}! You are ready to move on to the next grade level curriculum.</p>
                          </div>
                      </div>
                  `;
                  diagContainer.style.display = "block";
              }
          }
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
  if (!reviewContainer || !reviewContent) return;

  reviewContent.innerHTML = "";

  if (window.quizResultsData.length === 0) {
    reviewContent.innerHTML =
      "<p class='text-text-secondary'>No questions were answered.</p>";
  } else {
    window.quizResultsData.forEach((item, idx) => {
      const isCorrect = item.isCorrect;
      const bgClass =
        isCorrect ?
          "bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-800"
        : "bg-red-50 dark:bg-red-900/10 border-red-200 dark:border-red-800";
      const icon =
        isCorrect ?
          '<i class="fas fa-check-circle text-green-500 mt-1"></i>'
        : '<i class="fas fa-times-circle text-red-500 mt-1"></i>';

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
      reviewContent.insertAdjacentHTML("beforeend", html);
    });
  }

  reviewContainer.classList.remove("hidden");
  reviewContainer.scrollIntoView({ behavior: "smooth", block: "start" });
}

// 9. Download Report Generation
function generateAndDownloadText() {
  const grade =
    document.getElementById("header-grade-name")?.textContent || "Assessment";
  const mins = Math.floor(sessionSeconds / 60)
    .toString()
    .padStart(2, "0");
  const secs = (sessionSeconds % 60).toString().padStart(2, "0");

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
        if (item.hint) content += `   Explanation:    ${item.hint}\n`;
      }
      content += `   Result:         ${item.isCorrect ? "[ CORRECT ]" : "[ INCORRECT ]"}\n`;
      content += `-------------------------------------------------\n`;
      if (item.isCorrect) scoreCount++;
    });
  }

  const percentage =
    window.quizResultsData.length > 0 ?
      Math.round((scoreCount / window.quizResultsData.length) * 100)
    : 0;

  content += `\nSUMMARY:\n`;
  content += `Total Questions: ${window.quizResultsData.length}\n`;
  content += `Correct Answers: ${scoreCount}\n`;
  content += `Final Score:     ${percentage}%\n`;

  const blob = new Blob([content], { type: "text/plain" });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = `Assessment_Result_${new Date().toISOString().slice(0, 10)}.txt`;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}

// 10. Open and Render Diagnostic Mastery Report Card Modal
window.openMasteryReportCard = function() {
  const modal = document.getElementById("mastery-report-modal");
  const printableArea = document.getElementById("mastery-report-printable-area");
  if (!modal || !printableArea) return;

  // Retrieve user & assessment profile
  let studentName = "Student";
  try {
    const prof = JSON.parse(localStorage.getItem('hesten-user-profile'));
    if (prof && prof.firstName) studentName = prof.firstName;
  } catch(e){}

  const grade = document.getElementById("header-grade-name")?.textContent || "Core Curriculum";
  const assessmentType = window.currentAssessmentType || "Knowledge Diagnostic";
  const dateStr = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
  
  const mins = Math.floor(sessionSeconds / 60);
  const secs = sessionSeconds % 60;
  const timeFormatted = `${mins}m ${secs.toString().padStart(2, '0')}s`;

  // Score stats
  const totalQuestions = window.quizResultsData.length;
  let correctCount = 0;
  const subjectBreakdown = {};

  window.quizResultsData.forEach((q) => {
    if (q.isCorrect) correctCount++;
    const subj = q.subject || 'General';
    if (!subjectBreakdown[subj]) {
      subjectBreakdown[subj] = { total: 0, correct: 0 };
    }
    subjectBreakdown[subj].total++;
    if (q.isCorrect) subjectBreakdown[subj].correct++;
  });

  const percentage = totalQuestions > 0 ? Math.round((correctCount / totalQuestions) * 100) : 0;

  // Tier determination
  let tierClass = "tier-support";
  let tierIcon = "fa-compass";
  let tierTitle = "Targeted Support Recommended";
  let tierDesc = `Student scored ${percentage}%. Targeted instructional interventions and foundational concept practice are recommended.`;

  if (percentage >= 85) {
    tierClass = "tier-mastery";
    tierIcon = "fa-trophy";
    tierTitle = "Mastery Demonstrated";
    tierDesc = `Outstanding performance! Student scored ${percentage}%, showing comprehensive mastery of ${grade} standards.`;
  } else if (percentage >= 70) {
    tierClass = "tier-approaching";
    tierIcon = "fa-check-circle";
    tierTitle = "Approaching Mastery";
    tierDesc = `Solid foundation with ${percentage}% accuracy. Focused review on specific domains will reinforce fluency.`;
  }

  // Active Accessibility & Accommodations
  const a11ySettings = window.currentSettings || {};
  let accommodationsList = [];
  if (a11ySettings.fontFamily === 'OpenDyslexic') accommodationsList.push("Dyslexia-Optimized Typography (OpenDyslexic)");
  if (a11ySettings.readingMask) accommodationsList.push("Focus Reading Mask Active");
  if (a11ySettings.spotlightMode) accommodationsList.push("Reading Spotlight Guided Tracking");
  if (a11ySettings.fontSize && a11ySettings.fontSize !== '100%') accommodationsList.push(`Text Magnification (${a11ySettings.fontSize})`);
  if (a11ySettings.stopAnimations) accommodationsList.push("Reduced Motion / Sensory Stabilization");
  if (accommodationsList.length === 0) accommodationsList.push("Standard Visual Presentation (No special accommodations active)");

  // Standard alignments map
  const standardMap = {
    'Math': {
      standards: 'CCSS.MATH (OA, NBT, NF, MD) & Texas TEKS §111',
      icon: 'fa-calculator',
      color: 'var(--color-primary)'
    },
    'Language Arts': {
      standards: 'CCSS.ELA (RL, RI, RF, L) & Texas TEKS §110',
      icon: 'fa-book-reader',
      color: 'var(--color-secondary)'
    },
    'Science': {
      standards: 'NGSS Science Framework & Texas TEKS §112',
      icon: 'fa-flask',
      color: 'var(--color-success)'
    },
    'Social Studies': {
      standards: 'NCSS Thematic Strands & Texas TEKS §113',
      icon: 'fa-globe-americas',
      color: 'var(--color-warning)'
    },
    'General': {
      standards: 'Core Interdisciplinary Academic Standards',
      icon: 'fa-graduation-cap',
      color: 'var(--color-primary)'
    }
  };

  // Build Subjects HTML
  let domainHtml = '';
  Object.entries(subjectBreakdown).forEach(([subj, data]) => {
    const subjPct = Math.round((data.correct / data.total) * 100);
    const meta = standardMap[subj] || standardMap['General'];
    const barColor = subjPct >= 80 ? 'var(--color-success)' : (subjPct >= 60 ? 'var(--color-warning)' : 'var(--color-error)');
    const statusText = subjPct >= 80 ? 'Mastered' : (subjPct >= 60 ? 'Developing' : 'Needs Review');
    const statusBg = subjPct >= 80 ? 'var(--color-success)' : (subjPct >= 60 ? 'var(--color-warning)' : 'var(--color-error)');

    domainHtml += `
      <div class="mastery-domain-row">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; flex-wrap: wrap;">
          <div>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas ${meta.icon}" style="color: ${meta.color};"></i>
              <strong style="font-size: 1.05rem;">${subj}</strong>
            </div>
            <p style="font-size: 0.75rem; color: var(--color-text-muted); margin: 0.25rem 0 0 0;">
              ${meta.standards}
            </p>
          </div>
          <div style="text-align: right;">
            <span style="font-weight: 800; font-size: 1.1rem; color: ${barColor};">${subjPct}%</span>
            <span style="font-size: 0.8rem; color: var(--color-text-muted); margin-left: 0.25rem;">(${data.correct}/${data.total})</span>
            <div style="display: inline-block; margin-left: 0.5rem; padding: 0.15rem 0.6rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 700; color: #fff; background-color: ${statusBg};">
              ${statusText}
            </div>
          </div>
        </div>
        <div class="progress-bar-bg">
          <div class="progress-bar-fill" style="width: ${subjPct}%; background-color: ${barColor};"></div>
        </div>
      </div>
    `;
  });

  // Assemble full report markup
  printableArea.innerHTML = `
    <div class="report-letterhead">
      <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
          <img src="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Logo" style="height: 2.5rem; width: auto;" onerror="this.style.display='none'">
          <h2 class="report-brand-title">Hesten's Learning Platform</h2>
        </div>
        <p class="report-brand-sub">Comprehensive Diagnostic Assessment & Standard Mastery Report</p>
      </div>
      <div style="text-align: right;">
        <span style="display: inline-block; padding: 0.35rem 0.85rem; border-radius: 9999px; background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); font-weight: 700; font-size: 0.85rem;">
          Official Record
        </span>
      </div>
    </div>

    <div class="report-meta-grid">
      <div>
        <div class="report-meta-label">Student Name</div>
        <div class="report-meta-val">${studentName}</div>
      </div>
      <div>
        <div class="report-meta-label">Assessment Level</div>
        <div class="report-meta-val">${grade}</div>
      </div>
      <div>
        <div class="report-meta-label">Exam Type</div>
        <div class="report-meta-val">${assessmentType}</div>
      </div>
      <div>
        <div class="report-meta-label">Date Completed</div>
        <div class="report-meta-val" style="font-size: 0.95rem;">${dateStr}</div>
      </div>
      <div>
        <div class="report-meta-label">Time Spent</div>
        <div class="report-meta-val">${timeFormatted}</div>
      </div>
      <div>
        <div class="report-meta-label">Cumulative Score</div>
        <div class="report-meta-val" style="color: ${percentage >= 80 ? 'var(--color-success)' : (percentage >= 60 ? 'var(--color-warning)' : 'var(--color-error)')};">
          ${percentage}% (${correctCount}/${totalQuestions})
        </div>
      </div>
    </div>

    <div class="mastery-tier-banner ${tierClass}">
      <i class="fas ${tierIcon}" style="font-size: 2.25rem;"></i>
      <div>
        <h3 style="font-size: 1.25rem; font-weight: 800; margin: 0 0 0.25rem 0;">${tierTitle}</h3>
        <p style="font-size: 0.9rem; margin: 0; line-height: 1.5; opacity: 0.95;">${tierDesc}</p>
      </div>
    </div>

    ${window.targetedStandard ? `
      <div style="background: color-mix(in srgb, var(--color-primary) 8%, transparent); border: 1.5px solid var(--color-primary); border-radius: var(--radius-lg); padding: 1rem 1.25rem; margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 2.5rem; height: 2.5rem; border-radius: var(--radius-full); background: var(--color-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
            <i class="fas fa-crosshairs"></i>
          </div>
          <div>
            <div style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-primary); letter-spacing: 0.05em;">Targeted Standard Certification</div>
            <strong style="font-size: 1.05rem; color: var(--color-text-main);">Benchmark: ${window.targetedStandard}</strong>
          </div>
        </div>
        <div style="text-align: right;">
          <span style="font-weight: 800; font-size: 0.85rem; padding: 0.35rem 0.85rem; border-radius: 9999px; background: ${percentage >= 80 ? 'var(--color-success)' : 'var(--color-warning)'}; color: #fff;">
            ${percentage >= 80 ? 'Standard Mastered' : 'Progressing toward Standard'}
          </span>
        </div>
      </div>
    ` : ''}

    <h4 style="font-size: 1.1rem; font-weight: 800; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 0.5rem;">
      <i class="fas fa-layer-group" style="color: var(--color-primary);"></i> Domain Proficiency & Standard Alignment
    </h4>
    <div style="margin-bottom: 2rem;">
      ${domainHtml}
    </div>

    <h4 style="font-size: 1.1rem; font-weight: 800; margin: 0 0 0.75rem 0; display: flex; align-items: center; gap: 0.5rem;">
      <i class="fas fa-universal-access" style="color: var(--color-secondary);"></i> Accommodations & Assessment Conditions
    </h4>
    <div style="background-color: var(--color-bg-base); padding: 1rem 1.25rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); margin-bottom: 2rem;">
      <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; color: var(--color-text-muted); line-height: 1.7;">
        ${accommodationsList.map(acc => `<li>${acc}</li>`).join('')}
      </ul>
    </div>

    <div class="report-signature-block">
      <div>
        <div class="signature-line">
          <strong>Teacher / Educational Specialist Signature</strong> &nbsp;&bull;&nbsp; Date
        </div>
      </div>
      <div>
        <div class="signature-line">
          <strong>Parent / Guardian Signature</strong> &nbsp;&bull;&nbsp; Date
        </div>
      </div>
    </div>
  `;

  modal.style.display = "flex";
  document.body.style.overflow = "hidden";
};

window.closeMasteryReportCard = function() {
  const modal = document.getElementById("mastery-report-modal");
  if (modal) modal.style.display = "none";
  document.body.style.overflow = "";
};

// Escape key listener for mastery modal
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    window.closeMasteryReportCard();
  }
});

// ==========================================
// END CUSTOM LOGIC
// ==========================================

let currentSubjectFilter = "All";

function updateSidebarFilterUI(subject) {
  const filterList = document.querySelector(".focus-filter-list");
  if (!filterList) return;
  const buttons = filterList.querySelectorAll("button");
  buttons.forEach(btn => {
    // Find matching subject
    const onClickAttr = btn.getAttribute("onclick") || "";
    if (onClickAttr.includes(`'${subject}'`)) {
      btn.style.backgroundColor = "color-mix(in srgb, var(--color-primary) 15%, transparent)";
      btn.style.color = "var(--color-primary)";
      btn.style.fontWeight = "700";
      btn.style.borderColor = "var(--color-primary)";
    } else {
      btn.style.backgroundColor = "";
      btn.style.color = "";
      btn.style.fontWeight = "";
      btn.style.borderColor = "";
    }
  });
}

function filterQuestions(subject) {
  currentSubjectFilter = subject;
  const gradeName = document.getElementById("force-grade").value;

  console.log("Filtering questions for:", gradeName, "Subject:", subject);

  updateSidebarFilterUI(subject);

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

// Expose functions globally to HTML handlers
window.filterQuestions = filterQuestions;
window.nextQuestionAdapter = nextQuestionAdapter;

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
          "dark:text-green-200",
        );
      document
        .getElementById("feedback-area")
        .classList.remove(
          "bg-red-100",
          "dark:bg-red-900/30",
          "text-red-800",
          "dark:text-red-200",
        );
      icon.innerHTML = '<i class="fas fa-check-circle text-green-600"></i>';
      title.textContent = "Correct!";
    } else {
      document
        .getElementById("feedback-area")
        .classList.add(
          "bg-red-100",
          "dark:bg-red-900/30",
          "text-red-800",
          "dark:text-red-200",
        );
      document
        .getElementById("feedback-area")
        .classList.remove(
          "bg-green-100",
          "dark:bg-green-900/30",
          "text-green-800",
          "dark:text-green-200",
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
