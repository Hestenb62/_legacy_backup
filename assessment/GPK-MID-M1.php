<?php
// --- Page-Specific Variables ---
$pageTitle = "Pre-K Module 1 Assessment - Observation Rubric | Hesten's Learning";
$pageDescription = "A dynamic observation rubric and scoring instrument for the Pre-Kindergarten End-of-Module 1 Assessment (NYS Common Core Mathematics / Eureka Math).";
$pageKeywords = "math assessment, pre-k, kindergarten, module 1, eureka math, rubric scoring, common core, php";
$pageAuthor = "Hesten's Learning";

$welcomeMessage = "Assessment Form";
$welcomeParagraph = "Use this form to record student performance for the Module 1 end-of-module assessment.";

// Standardized includes
include __DIR__ . '/../src/header.php';
?>

<!-- Link Assessment Form Specific Stylesheet -->
<link rel="stylesheet" href="/assets/css/pages/assessment-form.css">

<!-- Main Content Area -->
<main class="assessment-form-container" aria-labelledby="main-heading" style="max-width: 900px; margin: 2rem auto; padding: 0 1.5rem 4rem 1.5rem;">
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.75rem;">
    <a href="/assessment/rubrics.php" style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.875rem; font-weight: 700; color: var(--color-primary); text-decoration: none;">
      <i class="fas fa-arrow-left"></i> All Teacher Rubrics
    </a>
    <div style="display: flex; gap: 0.5rem;">
      <button type="button" onclick="window.print()" class="hero-nav-btn hero-nav-btn-outline" style="padding: 0.4rem 1rem; font-size: 0.8125rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.35rem; border-radius: var(--radius-md);">
        <i class="fas fa-print"></i> Print / PDF Report
      </button>
      <button type="button" onclick="resetRubricDraft()" class="hero-nav-btn hero-nav-btn-outline" style="padding: 0.4rem 1rem; font-size: 0.8125rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.35rem; border-radius: var(--radius-md); color: var(--color-danger, #ef4444);">
        <i class="fas fa-trash-alt"></i> Clear Draft
      </button>
    </div>
  </div>

  <form id="assessment-form" onsubmit="handleRubricSubmit(event)" class="assessment-form-card" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2.5rem; box-shadow: var(--shadow-sm);">

    <!-- Page Header -->
    <header class="assessment-form-header" style="margin-bottom: 2rem; border-bottom: 1px solid var(--color-border); padding-bottom: 1.5rem;">
      <div style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.2rem 0.65rem; border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-primary) 12%, transparent); color: var(--color-primary); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.5rem;">
        <i class="fas fa-clipboard-check"></i> Teacher Observation Rubric
      </div>
      <h1 id="main-heading" class="assessment-form-title" style="font-size: 2rem; font-weight: 800; color: var(--color-text-main); margin: 0 0 0.5rem 0;">Pre-Kindergarten End-of-Module 1 Assessment</h1>
      <p class="assessment-form-subtitle" style="color: var(--color-text-muted); font-size: 0.95rem; margin: 0;">NYS Common Core Mathematics Curriculum / Eureka Math (Module 1, Topics E–H)</p>
    </header>

    <!-- Interactive Live Score Banner -->
    <div id="rubric-score-card" style="background: color-mix(in srgb, var(--color-primary) 6%, var(--color-bg-base)); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.25rem 1.5rem; margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
      <div>
        <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--color-text-muted); letter-spacing: 0.05em; display: block; margin-bottom: 0.25rem;">Cumulative Evaluation</span>
        <div style="display: flex; align-items: baseline; gap: 0.4rem;">
          <span id="rubric-total-pts" style="font-size: 1.85rem; font-weight: 850; color: var(--color-primary);">0</span>
          <span style="font-size: 1rem; color: var(--color-text-muted); font-weight: 700;">/ 16 pts (<span id="rubric-total-pct">0%</span>)</span>
        </div>
      </div>
      <div>
        <span id="rubric-tier-badge" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.4rem 0.9rem; border-radius: var(--radius-full); font-size: 0.85rem; font-weight: 800; background: rgba(148, 163, 184, 0.2); color: var(--color-text-muted);">
          <i class="fas fa-hourglass-start"></i> Pending Observation
        </span>
      </div>
    </div>

    <!-- Student Information Section -->
    <fieldset class="assessment-form-fieldset" style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend class="assessment-form-section-title" style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
        <i class="fas fa-user-graduate" style="color: var(--color-primary);"></i> Student Information
      </legend>
      <div class="assessment-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
        <div>
          <label for="student-name" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--color-text-main);">Student Full Name</label>
          <input type="text" id="student-name" name="student_name" required
            class="assessment-form-input" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Enter student's full name">
        </div>
        <div>
          <label for="assessment-date" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--color-text-main);">Observation Date</label>
          <input type="date" id="assessment-date" name="assessment_date" required
            class="assessment-form-input" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);">
        </div>
      </div>
    </fieldset>

    <hr class="assessment-form-divider" style="border: 0; border-top: 1px solid var(--color-border); margin: 2rem 0;">

    <!-- Topic E Section -->
    <fieldset class="assessment-form-fieldset" style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend class="assessment-form-section-title" style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
        Topic E: How Many Questions with 4 or 5 Objects
      </legend>
      
      <div class="assessment-form-instructions-box" style="background: color-mix(in srgb, var(--color-bg-base) 60%, var(--color-bg-surface)); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 1.25rem; margin-bottom: 1.25rem;">
        <h4 class="assessment-form-instructions-title" style="font-size: 0.9rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">Instructions &amp; Materials</h4>
        <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 0.75rem;"><strong>Materials:</strong> 5 linking cubes ("birds"), paper plate.</p>
        <ol style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; line-height: 1.6; color: var(--color-text-main);">
          <li>"Let's pretend these linking cubes are birds in your tree." (Put cubes on left-hand fingers). "Touch and count each one. How many birds are in your tree?"</li>
          <li>"A bird flies away." (Take 1 cube away). "Touch and count the birds in your tree now."</li>
          <li>"Watch as all the birds fly to the ground." (Place cubes in circle around plate). "Touch and count each one."</li>
        </ol>
      </div>

      <div class="assessment-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem; margin-bottom: 1rem;">
        <div>
          <label for="topic-e-do" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student do?</label>
          <textarea id="topic-e-do" name="topic_e_do" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="e.g. Student touched each cube sequentially without double counting..."></textarea>
        </div>
        <div>
          <label for="topic-e-say" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student say?</label>
          <textarea id="topic-e-say" name="topic_e_say" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="e.g. '1, 2, 3, 4, 5. Five birds!'"></textarea>
        </div>
      </div>
      <div>
        <label for="topic-e-score" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">Rubric Score (Step 1–4)</label>
        <select id="topic-e-score" name="topic_e_score" onchange="calculateRubricScore()"
          class="assessment-form-input rubric-score-select" style="max-width: 320px; width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 700;">
          <option value="">Select score</option>
          <option value="1">Step 1 (Inconsistent 1-to-1 matching)</option>
          <option value="2">Step 2 (Counts with teacher guidance)</option>
          <option value="3">Step 3 (Counts accurately up to 5)</option>
          <option value="4">Step 4 (Counts array/circle fluently with cardinality)</option>
        </select>
      </div>
    </fieldset>

    <hr class="assessment-form-divider" style="border: 0; border-top: 1px solid var(--color-border); margin: 2rem 0;">

    <!-- Topic F Section -->
    <fieldset class="assessment-form-fieldset" style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend class="assessment-form-section-title" style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
        Topic F: Matching 1 Numeral with up to 5 Objects
      </legend>
      
      <div class="assessment-form-instructions-box" style="background: color-mix(in srgb, var(--color-bg-base) 60%, var(--color-bg-surface)); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 1.25rem; margin-bottom: 1.25rem;">
        <h4 class="assessment-form-instructions-title" style="font-size: 0.9rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">Instructions &amp; Materials</h4>
        <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 0.75rem;"><strong>Materials:</strong> Numerals 1–5 cards, bird picture cards, 7 linking cubes.</p>
        <ol style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; line-height: 1.6; color: var(--color-text-main);">
          <li>"What number is this (show 4)? Can you find the group of birds that matches this number?"</li>
          <li>Repeat with numerals 2, 3, and 1.</li>
          <li>"What number is this (show 5)? Pretend these cubes are birds. Can you make a group of birds to match this number?"</li>
        </ol>
      </div>

      <div class="assessment-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem; margin-bottom: 1rem;">
        <div>
          <label for="topic-f-do" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student do?</label>
          <textarea id="topic-f-do" name="topic_f_do" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-f-say" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student say?</label>
          <textarea id="topic-f-say" name="topic_f_say" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record verbal answers..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-f-score" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">Rubric Score (Step 1–4)</label>
        <select id="topic-f-score" name="topic_f_score" onchange="calculateRubricScore()"
          class="assessment-form-input rubric-score-select" style="max-width: 320px; width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 700;">
          <option value="">Select score</option>
          <option value="1">Step 1 (Cannot match numeral to quantity)</option>
          <option value="2">Step 2 (Matches 1-2 numerals with prompting)</option>
          <option value="3">Step 3 (Matches numerals 1-4 independently)</option>
          <option value="4">Step 4 (Constructs set of 5 and recognizes all 1-5)</option>
        </select>
      </div>
    </fieldset>

    <hr class="assessment-form-divider" style="border: 0; border-top: 1px solid var(--color-border); margin: 2rem 0;">

    <!-- Topic G Section -->
    <fieldset class="assessment-form-fieldset" style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend class="assessment-form-section-title" style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
        Topic G: One More with Numbers 1 to 5
      </legend>
      
      <div class="assessment-form-instructions-box" style="background: color-mix(in srgb, var(--color-bg-base) 60%, var(--color-bg-surface)); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 1.25rem; margin-bottom: 1.25rem;">
        <h4 class="assessment-form-instructions-title" style="font-size: 0.9rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">Instructions &amp; Materials</h4>
        <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 0.75rem;"><strong>Materials:</strong> 5 linking cubes as birds.</p>
        <ol style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; line-height: 1.6; color: var(--color-text-main);">
          <li>"Two birds want to play. Show me 2 birds."</li>
          <li>"One more bird wants to play. Show me 1 more. How many birds are playing now?" (Continue pattern of 1 more to 5).</li>
        </ol>
      </div>

      <div class="assessment-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem; margin-bottom: 1rem;">
        <div>
          <label for="topic-g-do" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student do?</label>
          <textarea id="topic-g-do" name="topic_g_do" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-g-say" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student say?</label>
          <textarea id="topic-g-say" name="topic_g_say" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-g-score" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">Rubric Score (Step 1–4)</label>
        <select id="topic-g-score" name="topic_g_score" onchange="calculateRubricScore()"
          class="assessment-form-input rubric-score-select" style="max-width: 320px; width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 700;">
          <option value="">Select score</option>
          <option value="1">Step 1 (Recounts all from 1 each time)</option>
          <option value="2">Step 2 (Adds 1 with significant modeling)</option>
          <option value="3">Step 3 (Identifies 'one more' up to 4)</option>
          <option value="4">Step 4 (Counts on spontaneously to 5: '3 and 1 more is 4')</option>
        </select>
      </div>
    </fieldset>

    <hr class="assessment-form-divider" style="border: 0; border-top: 1px solid var(--color-border); margin: 2rem 0;">

    <!-- Topic H Section -->
    <fieldset class="assessment-form-fieldset" style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend class="assessment-form-section-title" style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
        Topic H: Counting 5, 4, 3, 2, 1 (Backward Pattern)
      </legend>
      
      <div class="assessment-form-instructions-box" style="background: color-mix(in srgb, var(--color-bg-base) 60%, var(--color-bg-surface)); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 1.25rem; margin-bottom: 1.25rem;">
        <h4 class="assessment-form-instructions-title" style="font-size: 0.9rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-main);">Instructions &amp; Materials</h4>
        <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 0.75rem;"><strong>Materials:</strong> 5 linking cubes as birds.</p>
        <ol style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; line-height: 1.6; color: var(--color-text-main);">
          <li>"How many birds are on the ground?" (5)</li>
          <li>"One bird flies into my tree." (Student removes 1). "How many are on the ground now?" (Continue 1 less pattern to 1).</li>
          <li>"Can you count backward from 5 to 1?"</li>
        </ol>
      </div>

      <div class="assessment-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem; margin-bottom: 1rem;">
        <div>
          <label for="topic-h-do" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student do?</label>
          <textarea id="topic-h-do" name="topic_h_do" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-h-say" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">What did the student say?</label>
          <textarea id="topic-h-say" name="topic_h_say" rows="3"
            class="assessment-form-input rubric-observe-field" style="width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
            placeholder="Record responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-h-score" style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.35rem; color: var(--color-text-main);">Rubric Score (Step 1–4)</label>
        <select id="topic-h-score" name="topic_h_score" onchange="calculateRubricScore()"
          class="assessment-form-input rubric-score-select" style="max-width: 320px; width: 100%; padding: 0.6rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main); font-weight: 700;">
          <option value="">Select score</option>
          <option value="1">Step 1 (Cannot track decreasing count)</option>
          <option value="2">Step 2 (Counts backward with prompt cards)</option>
          <option value="3">Step 3 (Counts backward 5, 4, 3, 2, 1 with objects)</option>
          <option value="4">Step 4 (Recites 5, 4, 3, 2, 1 fluently and conceptually)</option>
        </select>
      </div>
    </fieldset>

    <!-- Teacher Summary & Next Steps -->
    <fieldset style="border: none; padding: 0; margin-bottom: 2rem;">
      <legend style="font-size: 1.15rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
        Teacher Summary &amp; Instructional Next Steps
      </legend>
      <textarea id="teacher-summary" name="teacher_summary" rows="3" class="rubric-observe-field"
        style="width: 100%; padding: 0.75rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg-base); color: var(--color-text-main);"
        placeholder="Record recommended accommodations, scaffolding activities, or praise for student portfolio..."></textarea>
    </fieldset>

    <!-- Form Actions -->
    <div class="assessment-form-footer" style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
      <button type="submit" class="hero-nav-btn hero-nav-btn-primary" style="padding: 0.85rem 2rem; border-radius: var(--radius-lg); font-weight: 800; border: none; cursor: pointer;">
        <i class="fas fa-save" style="margin-right: 0.4rem;"></i> Save Observation Record
      </button>
      <span id="save-status-msg" style="font-size: 0.85rem; color: #10b981; font-weight: 700; display: none;">
        <i class="fas fa-check-circle"></i> Saved to local classroom records!
      </span>
    </div>

  </form>
</main>

<script>
  const DRAFT_KEY = 'hl_gpk_m1_rubric_draft';

  function calculateRubricScore() {
    const selects = ['topic-e-score', 'topic-f-score', 'topic-g-score', 'topic-h-score'];
    let total = 0;
    let scoredCount = 0;

    selects.forEach(id => {
      const val = parseInt(document.getElementById(id)?.value, 10);
      if (!isNaN(val)) {
        total += val;
        scoredCount++;
      }
    });

    const maxPts = 16;
    const pct = Math.round((total / maxPts) * 100);
    document.getElementById('rubric-total-pts').textContent = total;
    document.getElementById('rubric-total-pct').textContent = `${pct}%`;

    const badge = document.getElementById('rubric-tier-badge');
    if (!badge) return;

    if (scoredCount === 0) {
      badge.style.background = 'rgba(148, 163, 184, 0.2)';
      badge.style.color = 'var(--color-text-muted)';
      badge.innerHTML = '<i class="fas fa-hourglass-start"></i> Pending Observation';
    } else if (total >= 14) {
      badge.style.background = 'rgba(16, 185, 129, 0.15)';
      badge.style.color = '#10b981';
      badge.innerHTML = '<i class="fas fa-trophy"></i> Level 4: Exceeding Standard';
    } else if (total >= 11) {
      badge.style.background = 'rgba(59, 130, 246, 0.15)';
      badge.style.color = '#2563eb';
      badge.innerHTML = '<i class="fas fa-check-circle"></i> Level 3: Meeting Standard (Proficient)';
    } else if (total >= 8) {
      badge.style.background = 'rgba(245, 158, 11, 0.15)';
      badge.style.color = '#d97706';
      badge.innerHTML = '<i class="fas fa-compass"></i> Level 2: Approaching Standard';
    } else {
      badge.style.background = 'rgba(239, 68, 68, 0.15)';
      badge.style.color = '#ef4444';
      badge.innerHTML = '<i class="fas fa-exclamation-circle"></i> Level 1: Emerging / Targeted Scaffolding';
    }

    autoSaveDraft();
  }

  function autoSaveDraft() {
    const formData = {};
    const form = document.getElementById('assessment-form');
    if (!form) return;
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
      if (input.name) formData[input.name] = input.value;
    });
    localStorage.setItem(DRAFT_KEY, JSON.stringify(formData));
  }

  function loadDraft() {
    try {
      const saved = localStorage.getItem(DRAFT_KEY);
      if (!saved) return;
      const data = JSON.parse(saved);
      const form = document.getElementById('assessment-form');
      if (!form) return;
      Object.entries(data).forEach(([name, val]) => {
        const el = form.querySelector(`[name="${name}"]`);
        if (el) el.value = val;
      });
      calculateRubricScore();
    } catch (e) {}
  }

  function resetRubricDraft() {
    if (confirm("Clear all observation notes and scores in this draft?")) {
      localStorage.removeItem(DRAFT_KEY);
      document.getElementById('assessment-form')?.reset();
      calculateRubricScore();
    }
  }

  function handleRubricSubmit(e) {
    e.preventDefault();
    autoSaveDraft();
    const msg = document.getElementById('save-status-msg');
    if (msg) {
      msg.style.display = 'inline-block';
      setTimeout(() => { msg.style.display = 'none'; }, 4000);
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Set default date to today if empty
    const dateInput = document.getElementById('assessment-date');
    if (dateInput && !dateInput.value) {
      dateInput.value = new Date().toISOString().slice(0, 10);
    }
    loadDraft();

    // Auto-save on any change
    document.querySelectorAll('.rubric-observe-field, #student-name, #assessment-date').forEach(el => {
      el.addEventListener('input', autoSaveDraft);
    });
  });
</script>

<?php
// Standardized footer include
include __DIR__ . '/../src/footer.php';
?>