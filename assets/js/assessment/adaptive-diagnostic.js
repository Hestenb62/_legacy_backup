/**
 * adaptive-diagnostic.js - Adaptive Diagnostic & Remediation Engine
 * Hesten's Learning Platform
 *
 * Implements standard-aligned item response adaptive testing:
 * - Dynamic difficulty branching based on accuracy and student confidence
 * - Multi-discipline diagnostic question bank
 * - Generates Personalized Growth Prescription Roadmap
 * - Awards XP & updates standards mastery in localStorage
 */

(function () {
  'use strict';

  const QUESTION_BANK = [
    // Math - Foundational, Intermediate & Advanced
    {
      id: 'm0',
      subject: 'Math',
      standard: 'K.CC.B.4',
      difficulty: 1,
      blooms: 'Remember',
      question: 'How many sides does a rectangle have?',
      options: ['3', '4', '5', '6'],
      correctIndex: 1,
      hint: 'Count the straight lines enclosing the shape: top, bottom, left, right.',
      prerequisiteLesson: '/levels/b.php?subject=math',
      prerequisiteFlashcard: 'math-core'
    },
    {
      id: 'm1',
      subject: 'Math',
      standard: '3.OA.A.1',
      difficulty: 1,
      blooms: 'Understand',
      question: 'Which multiplication equation represents 4 groups of 6 counters?',
      options: ['4 + 6 = 10', '4 × 6 = 24', '6 - 4 = 2', '24 ÷ 6 = 4'],
      correctIndex: 1,
      hint: 'Think about repeating the number 6 four times: 6 + 6 + 6 + 6.',
      prerequisiteLesson: '/student/math-practice.php',
      prerequisiteFlashcard: 'math-core'
    },
    {
      id: 'm2',
      subject: 'Math',
      standard: '4.NF.A.1',
      difficulty: 2,
      blooms: 'Apply',
      question: 'Which fraction is equivalent to 2/3?',
      options: ['4/9', '4/6', '6/8', '3/2'],
      correctIndex: 1,
      hint: 'Multiply both the numerator (2) and denominator (3) by 2.',
      prerequisiteLesson: '/student/interactive-labs.php',
      prerequisiteFlashcard: 'math-core'
    },
    {
      id: 'm3',
      subject: 'Math',
      standard: '8.EE.A.1',
      difficulty: 3,
      blooms: 'Analyze',
      question: 'Simplify the expression: (2³ × 2⁴) / 2²',
      options: ['2⁵ = 32', '2⁶ = 64', '2⁹ = 512', '2¹ = 2'],
      correctIndex: 0,
      hint: 'Use exponent product rule (3+4=7) and quotient rule (7-2=5).',
      prerequisiteLesson: '/student/math-study-guides.php',
      prerequisiteFlashcard: 'math-core'
    },
    {
      id: 'm4',
      subject: 'Math',
      standard: 'HSA.REI.B.4',
      difficulty: 4,
      blooms: 'Evaluate',
      question: 'What are the roots of the quadratic equation x² - 5x + 6 = 0?',
      options: ['x = 2 and x = 3', 'x = -2 and x = -3', 'x = 1 and x = 6', 'x = -1 and x = 5'],
      correctIndex: 0,
      hint: 'Factor into (x - a)(x - b) = 0 where a + b = 5 and a × b = 6.',
      prerequisiteLesson: '/levels/k.php?subject=math',
      prerequisiteFlashcard: 'math-core'
    },

    // ELA - Foundational, Intermediate & Advanced
    {
      id: 'e0',
      subject: 'ELA',
      standard: 'CCSS.ELA.RF.1.3',
      difficulty: 1,
      blooms: 'Remember',
      question: 'Which pair of words are rhyming word families?',
      options: ['Cat and Hat', 'Dog and Fish', 'Tree and Book', 'Sun and Cloud'],
      correctIndex: 0,
      hint: 'Rhyming words end with the same sound pattern.',
      prerequisiteLesson: '/levels/c.php?subject=language-arts',
      prerequisiteFlashcard: 'ela-vocab'
    },
    {
      id: 'e1',
      subject: 'ELA',
      standard: 'CCSS.ELA.RL.3.1',
      difficulty: 1,
      blooms: 'Remember',
      question: 'In a story, what is the main purpose of the protagonist\'s "conflict"?',
      options: [
        'To end the story immediately',
        'To provide a problem or obstacle the character must resolve',
        'To describe the physical background weather',
        'To list dictionary definitions'
      ],
      correctIndex: 1,
      hint: 'Conflict drives the plot forward by creating a hurdle for the hero.',
      prerequisiteLesson: '/student/ela-reading.php',
      prerequisiteFlashcard: 'ela-vocab'
    },
    {
      id: 'e2',
      subject: 'ELA',
      standard: 'CCSS.ELA.L.4.4.B',
      difficulty: 2,
      blooms: 'Analyze',
      question: 'What does the prefix "micro-" mean in the word "microscopic"?',
      options: ['Large or massive', 'Extremely small', 'Fast moving', 'Ancient'],
      correctIndex: 1,
      hint: '"Micro-" comes from Greek meaning small or tiny.',
      prerequisiteLesson: '/student/interactive-labs.php',
      prerequisiteFlashcard: 'ela-vocab'
    },
    {
      id: 'e3',
      subject: 'ELA',
      standard: 'CCSS.ELA.RL.8.4',
      difficulty: 3,
      blooms: 'Evaluate',
      question: 'Identify the figurative language: "The wind whispered through the dark pine trees."',
      options: ['Metaphor', 'Simile', 'Personification', 'Hyperbole'],
      correctIndex: 2,
      hint: 'Giving human characteristics (whispering) to non-human things (wind) is personification.',
      prerequisiteLesson: '/student/ela-literature.php',
      prerequisiteFlashcard: 'ela-vocab'
    },
    {
      id: 'e4',
      subject: 'ELA',
      standard: 'CCSS.ELA.RI.11-12.6',
      difficulty: 4,
      blooms: 'Evaluate',
      question: 'When an author employs subtle rhetorical irony, what is the reader expected to discern?',
      options: [
        'The literal truth of every statement without skepticism',
        'The underlying discrepancy between what is stated and what is actually meant',
        'Grammatical punctuation errors in the narrative',
        'A list of factual chronological dates'
      ],
      correctIndex: 1,
      hint: 'Irony creates meaning through the gap between appearance and reality.',
      prerequisiteLesson: '/levels/m.php?subject=language-arts',
      prerequisiteFlashcard: 'ela-vocab'
    },

    // Science - Foundational, Intermediate & Advanced
    {
      id: 's0',
      subject: 'Science',
      standard: 'NGSS.2-LS2-1',
      difficulty: 1,
      blooms: 'Remember',
      question: 'What two basic ingredients do green plants require to produce their own food through photosynthesis?',
      options: ['Sunlight and Water', 'Meat and Salt', 'Darkness and Sand', 'Milk and Sugar'],
      correctIndex: 0,
      hint: 'Plants need energy from light and moisture from their roots.',
      prerequisiteLesson: '/levels/d.php?subject=science',
      prerequisiteFlashcard: 'science-terms'
    },
    {
      id: 's1',
      subject: 'Science',
      standard: 'NGSS.MS-PS2-2',
      difficulty: 2,
      blooms: 'Apply',
      question: 'If two equal and opposite forces act on a stationary box, what happens to its motion?',
      options: [
        'It accelerates rapidly',
        'It remains at rest because net force is zero',
        'It rotates clockwise',
        'It gains electric charge'
      ],
      correctIndex: 1,
      hint: 'Balanced forces cancel each other out ($F_{\\text{net}} = 0$).',
      prerequisiteLesson: '/student/science-experiments.php',
      prerequisiteFlashcard: 'science-terms'
    },
    {
      id: 's2',
      subject: 'Science',
      standard: 'NGSS.HS-PS1-1',
      difficulty: 3,
      blooms: 'Analyze',
      question: 'The number of which subatomic particles determines the atomic number and elemental identity of an atom?',
      options: ['Neutrons', 'Protons', 'Electrons', 'Photons'],
      correctIndex: 1,
      hint: 'The nucleus contains positively charged protons.',
      prerequisiteLesson: '/levels/l.php?subject=science',
      prerequisiteFlashcard: 'science-terms'
    },
    {
      id: 's3',
      subject: 'Science',
      standard: 'NGSS.HS-LS1-7',
      difficulty: 4,
      blooms: 'Evaluate',
      question: 'During aerobic cellular respiration, which process yields the largest net quantity of ATP?',
      options: ['Glycolysis', 'Krebs Cycle (Citric Acid Cycle)', 'Oxidative Phosphorylation (ETC)', 'Lactic Acid Fermentation'],
      correctIndex: 2,
      hint: 'ATP synthase in the mitochondrial inner membrane generates ~28-34 ATP per glucose.',
      prerequisiteLesson: '/levels/l.php?subject=science',
      prerequisiteFlashcard: 'science-terms'
    },

    // Social Studies - Foundational, Intermediate & Advanced
    {
      id: 'ss0',
      subject: 'Social Studies',
      standard: 'NCSS.D2.Civ.2.K-2',
      difficulty: 1,
      blooms: 'Remember',
      question: 'Why do communities establish laws and traffic safety rules?',
      options: ['To ensure safety, fairness, and order', 'To make driving difficult', 'To close schools', 'To prevent play'],
      correctIndex: 0,
      hint: 'Rules help people live and travel together safely.',
      prerequisiteLesson: '/levels/b.php?subject=social-studies',
      prerequisiteFlashcard: 'history-dates'
    },
    {
      id: 'ss1',
      subject: 'Social Studies',
      standard: 'NCSS.D2.His.1.6-8',
      difficulty: 2,
      blooms: 'Understand',
      question: 'What was the primary purpose of writing the United States Declaration of Independence (1776)?',
      options: [
        'To establish a national banking system',
        'To announce separation from British rule and state fundamental rights',
        'To create the 50 state capitals',
        'To end the American Civil War'
      ],
      correctIndex: 1,
      hint: 'It declared that the 13 colonies were free and independent sovereign states.',
      prerequisiteLesson: '/student/social-history.php',
      prerequisiteFlashcard: 'history-dates'
    },
    {
      id: 'ss2',
      subject: 'Social Studies',
      standard: 'NCSS.D2.Civ.4.9-12',
      difficulty: 3,
      blooms: 'Analyze',
      question: 'Which constitutional mechanism ensures that no single branch of government becomes tyrannical?',
      options: ['Checks and Balances', 'Direct Democracy', 'Unicameral Legislature', 'Executive Fiat'],
      correctIndex: 0,
      hint: 'Each branch has constitutional powers to limit the other branches.',
      prerequisiteLesson: '/levels/k.php?subject=social-studies',
      prerequisiteFlashcard: 'history-dates'
    },
    {
      id: 'ss3',
      subject: 'Social Studies',
      standard: 'NCSS.D2.Eco.1.9-12',
      difficulty: 4,
      blooms: 'Evaluate',
      question: 'In macroeconomic policy, what is the typical result of a central bank raising interest rates during inflation?',
      options: [
        'Borrowing slows down and consumer spending cools, curbing price rises',
        'Hyperinflation accelerates immediately',
        'Money supply expands exponentially',
        'Government automatically repeals all taxes'
      ],
      correctIndex: 0,
      hint: 'Higher borrowing costs reduce aggregate demand to stabilize prices.',
      prerequisiteLesson: '/levels/n.php?subject=social-studies',
      prerequisiteFlashcard: 'history-dates'
    }
  ];

  class AdaptiveDiagnosticEngine {
    constructor() {
      this.currentQuestionIdx = 0;
      this.responses = [];
      this.abilityScore = 2.0; // scale 1.0 to 4.0
      this.isComplete = false;
      this.totalQuestionsToAsk = 6;
      this.selectedAnswer = null;
      this.confidenceLevel = 'medium';

      this.init();
    }

    init() {
      this.pickNextQuestion();
      this.bindEvents();
    }

    pickNextQuestion() {
      // Filter out already answered questions
      const answeredIds = this.responses.map(r => r.question.id);
      const available = QUESTION_BANK.filter(q => !answeredIds.includes(q.id));

      if (available.length === 0 || this.responses.length >= this.totalQuestionsToAsk) {
        this.finishDiagnostic();
        return;
      }

      // Pick question closest to current ability score
      available.sort((a, b) => Math.abs(a.difficulty - this.abilityScore) - Math.abs(b.difficulty - this.abilityScore));
      this.currentQuestion = available[0];
      this.selectedAnswer = null;
      this.renderQuestion();
    }

    renderQuestion() {
      const card = document.getElementById('diag-question-card');
      const progressFill = document.getElementById('diag-progress-fill');
      const progressCount = document.getElementById('diag-progress-count');
      const nextBtn = document.getElementById('diag-next-btn');

      if (!card) return;

      const qNum = this.responses.length + 1;
      if (progressCount) progressCount.textContent = `Question ${qNum} of ${this.totalQuestionsToAsk}`;
      if (progressFill) progressFill.style.width = `${Math.round(((qNum - 1) / this.totalQuestionsToAsk) * 100)}%`;
      if (nextBtn) {
        nextBtn.disabled = true;
        nextBtn.innerHTML = qNum === this.totalQuestionsToAsk ? 'Submit Diagnostic <i class="fas fa-check"></i>' : 'Next Question <i class="fas fa-arrow-right"></i>';
      }

      card.innerHTML = `
        <div class="diag-meta-row">
          <span class="diag-subject-badge badge-${this.currentQuestion.subject.toLowerCase().replace(/\s+/g, '')}">
            <i class="fas fa-bookmark"></i> ${this.currentQuestion.subject}
          </span>
          <span class="diag-standard-code"><i class="fas fa-tag"></i> Standard: ${this.currentQuestion.standard}</span>
          <span class="diag-blooms-tag"><i class="fas fa-layer-group"></i> Bloom's: ${this.currentQuestion.blooms}</span>
        </div>

        <h3 class="diag-question-text">${this.currentQuestion.question}</h3>

        <div class="diag-options-list">
          ${this.currentQuestion.options.map((opt, idx) => `
            <button type="button" class="diag-option-btn" data-index="${idx}">
              <span class="opt-letter">${String.fromCharCode(65 + idx)}</span>
              <span class="opt-label">${opt}</span>
            </button>
          `).join('')}
        </div>

        <div class="diag-confidence-row">
          <span>Confidence Level:</span>
          <div class="confidence-toggle-group">
            <button type="button" class="conf-btn" data-conf="low"><i class="fas fa-question-circle"></i> Guessing</button>
            <button type="button" class="conf-btn active" data-conf="medium"><i class="fas fa-check"></i> Likely</button>
            <button type="button" class="conf-btn" data-conf="high"><i class="fas fa-bolt"></i> 100% Sure</button>
          </div>
        </div>
      `;

      // Option click listeners
      card.querySelectorAll('.diag-option-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          card.querySelectorAll('.diag-option-btn').forEach(b => b.classList.remove('selected'));
          btn.classList.add('selected');
          this.selectedAnswer = parseInt(btn.dataset.index, 10);
          if (nextBtn) nextBtn.disabled = false;
        });
      });

      // Confidence listeners
      card.querySelectorAll('.conf-btn').forEach(cBtn => {
        cBtn.addEventListener('click', () => {
          card.querySelectorAll('.conf-btn').forEach(b => b.classList.remove('active'));
          cBtn.classList.add('active');
          this.confidenceLevel = cBtn.dataset.conf;
        });
      });
    }

    bindEvents() {
      const nextBtn = document.getElementById('diag-next-btn');
      if (nextBtn) {
        nextBtn.addEventListener('click', () => {
          if (this.selectedAnswer === null) return;
          this.recordResponse();
        });
      }
    }

    recordResponse() {
      const isCorrect = this.selectedAnswer === this.currentQuestion.correctIndex;

      // Adjust ability score
      let delta = isCorrect ? 0.4 : -0.4;
      if (this.confidenceLevel === 'high') delta *= 1.3;
      if (this.confidenceLevel === 'low') delta *= 0.6;
      this.abilityScore = Math.max(1.0, Math.min(4.0, this.abilityScore + delta));

      this.responses.push({
        question: this.currentQuestion,
        selected: this.selectedAnswer,
        isCorrect: isCorrect,
        confidence: this.confidenceLevel
      });

      this.pickNextQuestion();
    }

    finishDiagnostic() {
      this.isComplete = true;
      const testView = document.getElementById('diag-test-view');
      const resultsView = document.getElementById('diag-results-view');
      if (testView) testView.style.display = 'none';
      if (resultsView) resultsView.style.display = 'block';

      this.renderPrescription();
      this.saveDiagnosticData();
    }

    renderPrescription() {
      const container = document.getElementById('diag-prescription-container');
      if (!container) return;

      const totalCorrect = this.responses.filter(r => r.isCorrect).length;
      const overallPct = Math.round((totalCorrect / this.responses.length) * 100);

      // Bloom's Cognitive Tier
      let bloomsTier = 'Understanding (Bronze)';
      if (this.abilityScore >= 3.2) bloomsTier = 'Evaluating & Creating (Diamond)';
      else if (this.abilityScore >= 2.4) bloomsTier = 'Analyzing & Applying (Gold)';
      else if (this.abilityScore >= 1.6) bloomsTier = 'Applying (Silver)';

      // Standards mapping
      const standardResults = {};
      this.responses.forEach(r => {
        const std = r.question.standard;
        if (!standardResults[std]) {
          standardResults[std] = {
            standard: std,
            subject: r.question.subject,
            correct: r.isCorrect,
            hint: r.question.hint,
            lesson: r.question.prerequisiteLesson,
            flashcard: r.question.prerequisiteFlashcard
          };
        }
      });

      const masteredList = Object.values(standardResults).filter(s => s.correct);
      const focusList = Object.values(standardResults).filter(s => !s.correct);

      // Calculate Domain-by-Domain Mastery
      const domainStats = {
        'Math': { total: 0, correct: 0, icon: 'fa-calculator', color: 'var(--color-primary, #2563eb)' },
        'ELA': { total: 0, correct: 0, icon: 'fa-book-reader', color: '#ec4899' },
        'Science': { total: 0, correct: 0, icon: 'fa-flask', color: '#10b981' },
        'Social Studies': { total: 0, correct: 0, icon: 'fa-globe-americas', color: '#f59e0b' }
      };

      this.responses.forEach(r => {
        const subj = r.question.subject;
        if (domainStats[subj]) {
          domainStats[subj].total++;
          if (r.isCorrect) domainStats[subj].correct++;
        }
      });

      const domainCardsHtml = Object.entries(domainStats).map(([subj, data]) => {
        if (data.total === 0) return '';
        const pct = Math.round((data.correct / data.total) * 100);
        return `
          <div class="presc-domain-card" style="background: var(--color-bg-surface, #fff); border: 1px solid var(--color-border); border-radius: var(--radius-lg, 0.75rem); padding: 1rem 1.25rem; display: flex; flex-direction: column; gap: 0.5rem;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
              <span style="font-weight: 800; font-size: 0.9rem; color: var(--color-text-main); display: flex; align-items: center; gap: 0.4rem;">
                <i class="fas ${data.icon}" style="color: ${data.color};"></i> ${subj}
              </span>
              <span style="font-weight: 800; font-size: 0.95rem; color: ${pct >= 70 ? '#10b981' : (pct >= 50 ? '#f59e0b' : '#ef4444')};">${pct}%</span>
            </div>
            <div style="height: 6px; background: rgba(0,0,0,0.06); border-radius: 9999px; overflow: hidden;">
              <div style="height: 100%; width: ${pct}%; background: ${data.color}; border-radius: 9999px; transition: width 0.4s ease;"></div>
            </div>
            <span style="font-size: 0.75rem; color: var(--color-text-muted);">${data.correct} of ${data.total} standards proficient</span>
          </div>
        `;
      }).filter(Boolean).join('');

      container.innerHTML = `
        <div class="prescription-header-card">
          <div class="prescription-score-circle">
            <span class="score-pct">${overallPct}%</span>
            <span class="score-label">${totalCorrect}/${this.responses.length} Correct</span>
          </div>
          <div class="prescription-summary-text">
            <span class="prescription-badge"><i class="fas fa-brain"></i> Adaptive Cognitive Rating</span>
            <h2>Diagnostic Learning Prescription</h2>
            <p>Estimated Bloom's Mastery Level: <strong>${bloomsTier}</strong>. Score: <strong>${this.abilityScore.toFixed(2)}/4.00</strong></p>
            <div class="xp-awarded-pill"><i class="fas fa-bolt"></i> +100 XP Awarded to Profile!</div>
          </div>
        </div>

        <!-- Domain Mastery Summary Row -->
        <div class="prescription-domain-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1.5rem; margin-bottom: 1.5rem;">
          ${domainCardsHtml}
        </div>

        <div class="prescription-grid">
          <!-- Strengths -->
          <div class="presc-card strengths-card">
            <h3 class="presc-card-title"><i class="fas fa-check-circle" style="color: #10b981;"></i> Mastered Standards (${masteredList.length})</h3>
            <div class="presc-items-list">
              ${masteredList.length > 0 ? masteredList.map(item => `
                <div class="presc-item item-mastered">
                  <span class="std-badge">${item.standard}</span>
                  <div class="std-info">
                    <strong>${item.subject} Standard Competency</strong>
                    <p>Demonstrated solid foundation and retention.</p>
                  </div>
                </div>
              `).join('') : '<p style="color: var(--color-text-muted);">Continue practicing to master key standards!</p>'}
            </div>
          </div>

          <!-- Growth & Remediation Actions -->
          <div class="presc-card growth-card">
            <h3 class="presc-card-title"><i class="fas fa-bullseye" style="color: #f59e0b;"></i> Actionable Remediation Roadmap (${focusList.length})</h3>
            <div class="presc-items-list">
              ${focusList.length > 0 ? focusList.map(item => `
                <div class="presc-item item-growth">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                    <span class="std-badge" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b; border-color: #f59e0b;">${item.standard}</span>
                    <span style="font-size: 0.75rem; color: var(--color-text-muted);">Scaffolded Remediation</span>
                  </div>
                  <p class="growth-hint"><i class="fas fa-lightbulb"></i> <strong>Key Strategy:</strong> ${item.hint}</p>
                  <div class="growth-action-btns">
                    <a href="${item.lesson}" class="presc-btn-action"><i class="fas fa-book-open"></i> Review Lesson & Labs</a>
                    <button type="button" class="presc-btn-action" onclick="window.toggleFlashcardStudio ? window.toggleFlashcardStudio() : null"><i class="fas fa-layer-group"></i> Practice Flashcards</button>
                  </div>
                </div>
              `).join('') : '<p style="color: #10b981; font-weight: 700;">Zero skill gaps identified! All assessed standards proficient.</p>'}
            </div>
          </div>
        </div>

        <div class="presc-footer-actions" style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center;">
          <a href="/student/skill-tree.php" class="btn" style="padding: 0.85rem 1.75rem; border-radius: var(--radius-full); background: linear-gradient(135deg, var(--color-primary), #6366f1); color: white; border: none; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: var(--shadow-md);">
            <i class="fas fa-sitemap"></i>
            <span>View Updated Skill Tree</span>
          </a>
          <button type="button" onclick="window.print()" class="btn" style="padding: 0.85rem 1.5rem; border-radius: var(--radius-full); background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border); font-weight: 800; font-size: 0.95rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-print"></i> Print Prescription
          </button>
          <button type="button" onclick="location.reload()" class="btn" style="padding: 0.85rem 1.5rem; border-radius: var(--radius-full); background: var(--color-bg-base); color: var(--color-text-main); border: 1px solid var(--color-border); font-weight: 800; font-size: 0.95rem; cursor: pointer;">
            <i class="fas fa-redo"></i> Retake Diagnostic
          </button>
        </div>
      `;
    }

    saveDiagnosticData() {
      // Award XP
      if (window.questManager) {
        window.questManager.addXP(100, 'Adaptive Diagnostic Mastery');
      }

      // Update Standards in localStorage
      try {
        const existing = JSON.parse(localStorage.getItem('hesten_standards_mastery')) || {};
        this.responses.forEach(r => {
          const std = r.question.standard;
          const score = r.isCorrect ? 100 : 40;
          existing[std] = {
            standard: std,
            subject: r.question.subject,
            bestScore: Math.max((existing[std] ? existing[std].bestScore || 0 : 0), score),
            lastTested: new Date().toISOString()
          };
        });
        localStorage.setItem('hesten_standards_mastery', JSON.stringify(existing));
      } catch (e) {}
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    window.adaptiveDiagnostic = new AdaptiveDiagnosticEngine();
  });
})();
