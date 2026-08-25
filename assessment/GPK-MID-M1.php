<?php
// --- Page-Specific Variables ---
// These variables are used by header.php to set the appropriate meta tags and titles.
$pageTitle = "Pre-K Module 1 Assessment";
$pageDescription = "A dynamic data entry form for the Pre-Kindergarten End-of-Module 1 Assessment, based on NYS Common Core Mathematics Curriculum.";
$pageKeywords = "math assessment, pre-k, kindergarten, module 1, eureka math, data entry, php";
$pageAuthor = "Hesten's Learning";

// Variables for the welcome popup in header.php
$welcomeMessage = "Assessment Form";
$welcomeParagraph = "Use this form to record student performance for the Module 1 end-of-module assessment.";

// Include the header file
include '..\src\header.php';
?>

<!-- Link Assessment Form Specific Stylesheet -->
<link rel="stylesheet" href="/assets/css/pages/assessment-form.css">

<!-- Main Content Area -->
<main class="assessment-form-container" aria-labelledby="main-heading">
  <!-- 
    This page is structured as a form for a teacher to input a student's assessment results.
    The form data could be sent to a database or another PHP script (e.g., submit_assessment.php) for processing.
  -->
  <form id="assessment-form" action="submit_assessment.php" method="POST" class="assessment-form-card">

    <!-- Page Header -->
    <header class="assessment-form-header">
      <h1 id="main-heading" class="assessment-form-title">Pre-Kindergarten End-of-Module 1 Assessment</h1>
      <p class="assessment-form-subtitle">NYS Common Core Mathematics Curriculum (Based on Module 1, Topics E-H)</p>
    </header>

    <!-- Student Information Section -->
    <fieldset class="assessment-form-fieldset">
      <legend class="assessment-form-section-title">Student Information</legend>
      <div class="assessment-form-grid">
        <div>
          <label for="student-name" class="block text-sm font-medium mb-2 text-text-default">Student Name</label>
          <input type="text" id="student-name" name="student_name" required
            class="assessment-form-input"
            placeholder="Enter student's full name">
        </div>
        <div>
          <label for="assessment-date" class="block text-sm font-medium mb-2 text-text-default">Assessment Date</label>
          <input type="date" id="assessment-date" name="assessment_date" required
            class="assessment-form-input">
        </div>
      </div>
    </fieldset>

    <!-- Separator -->
    <hr class="assessment-form-divider">

    <!-- Topic E Section -->
    <fieldset class="assessment-form-fieldset">
      <legend class="assessment-form-section-title">Topic E: How Many Questions with 4 or 5 Objects</legend>
      
      <div class="assessment-form-instructions-box">
        <h4 class="assessment-form-instructions-title">Instructions & Materials</h4>
        <p class="text-text-secondary mb-2"><strong class="text-text-default">Materials:</strong> (S) 5 linking cubes to be used as "birds", paper plate.</p>
        <ol class="assessment-form-instructions-list">
          <li>Let's pretend that these linking cubes are birds. These birds (linking cubes) fly into your tree. (Assist in putting cubes on the child's left-hand fingers like little hats.) Touch and count each one. How many birds are in your tree?</li>
          <li>A bird flies away. (Take 1 cube away). Touch and count the birds in your tree now.</li>
          <li>(Put cube back on the student's finger.) Watch as all the birds fly to the ground. (Place the cubes in a circle around a plate.) Touch and count each one. How many birds are on the ground?</li>
        </ol>
      </div>

      <div class="assessment-form-grid">
        <div>
          <label for="topic-e-do" class="assessment-form-label">What did the student do?</label>
          <textarea id="topic-e-do" name="topic_e_do" rows="4"
            class="assessment-form-input"
            placeholder="Record observations of student's actions..."></textarea>
        </div>
        <div>
          <label for="topic-e-say" class="assessment-form-label">What did the student say?</label>
          <textarea id="topic-e-say" name="topic_e_say" rows="4"
            class="assessment-form-input"
            placeholder="Record student's verbal responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-e-score" class="assessment-form-label">Rubric Score (Step 1-4)</label>
        <select id="topic-e-score" name="topic_e_score"
          class="assessment-form-input assessment-form-select-half">
          <option value="">Select score</option>
          <option value="1">Step 1</option>
          <option value="2">Step 2</option>
          <option value="3">Step 3</option>
          <option value="4">Step 4</option>
        </select>
      </div>
    </fieldset>

    <!-- Separator -->
    <hr class="assessment-form-divider">

    <!-- Topic F Section -->
    <fieldset class="assessment-form-fieldset">
      <legend class="assessment-form-section-title">Topic F: Matching 1 Numeral with up to 5 Objects</legend>
      
      <div class="assessment-form-instructions-box">
        <h4 class="assessment-form-instructions-title">Instructions & Materials</h4>
        <p class="text-text-secondary mb-2"><strong class="text-text-default">Materials:</strong> (S) Numerals 1-5, bird cards (cut apart), 7 linking cubes.</p>
        <ol class="assessment-form-instructions-list">
          <li>(Put bird pictures in front of student. Show the numeral 4.) What number is this? Can you find the group of birds that matches this number?</li>
          <li>(Repeat with 2.)</li>
          <li>(Repeat with 3.)</li>
          <li>(Repeat with 1.)</li>
          <li>(Show the numeral 5.) What number is this? Pretend these cubes are birds. Can you make a group of birds to match this number?</li>
        </ol>
      </div>

      <div class="assessment-form-grid">
        <div>
          <label for="topic-f-do" class="block text-sm font-medium mb-2 text-text-default">What did the student do?</label>
          <textarea id="topic-f-do" name="topic_f_do" rows="4"
            class="assessment-form-input"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-f-say" class="block text-sm font-medium mb-2 text-text-default">What did the student say?</label>
          <textarea id="topic-f-say" name="topic_f_say" rows="4"
            class="assessment-form-input"
            placeholder="Record responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-f-score" class="block text-sm font-medium mb-2 text-text-default">Rubric Score (Step 1-4)</label>
        <select id="topic-f-score" name="topic_f_score"
          class="assessment-form-input assessment-form-select-half">
          <option value="">Select score</option>
          <option value="1">Step 1</option>
          <option value="2">Step 2</option>
          <option value="3">Step 3</option>
          <option value="4">Step 4</option>
        </select>
      </div>
    </fieldset>

    <!-- Separator -->
    <hr class="assessment-form-divider">

    <!-- Topic G Section -->
    <fieldset class="assessment-form-fieldset">
      <legend class="assessment-form-section-title">Topic G: One More with Numbers 1 to 5</legend>
      
      <div class="assessment-form-instructions-box">
        <h4 class="assessment-form-instructions-title">Instructions & Materials</h4>
        <p class="text-text-secondary mb-2"><strong class="text-text-default">Materials:</strong> (S) 5 linking cubes as imaginary birds.</p>
        <ol class="assessment-form-instructions-list">
          <li>Let's pretend these cubes are birds. (Place 5 cubes in front of student.) Two birds want to play. Show me 2 birds.</li>
          <li>One more bird wants to play. Show me 1 more. (Child puts another cube in the group.) How many birds are playing now? (Continue the pattern of 1 more to 5.)</li>
        </ol>
      </div>

      <div class="assessment-form-grid">
        <div>
          <label for="topic-g-do" class="block text-sm font-medium mb-2 text-text-default">What did the student do?</label>
          <textarea id="topic-g-do" name="topic_g_do" rows="4"
            class="assessment-form-input"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-g-say" class="block text-sm font-medium mb-2 text-text-default">What did the student say?</label>
          <textarea id="topic-g-say" name="topic_g_say" rows="4"
            class="assessment-form-input"
            placeholder="Record responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-g-score" class="block text-sm font-medium mb-2 text-text-default">Rubric Score (Step 1-4)</label>
        <select id="topic-g-score" name="topic_g_score"
          class="assessment-form-input assessment-form-select-half">
          <option value="">Select score</option>
          <option value="1">Step 1</option>
          <option value="2">Step 2</option>
          <option value="3">Step 3</option>
          <option value="4">Step 4</option>
        </select>
      </div>
    </fieldset>

    <!-- Separator -->
    <hr class="assessment-form-divider">

    <!-- Topic H Section -->
    <fieldset class="assessment-form-fieldset">
      <legend class="assessment-form-section-title">Topic H: Counting 5, 4, 3, 2, 1</legend>
      
      <div class="assessment-form-instructions-box">
        <h4 class="assessment-form-instructions-title">Instructions & Materials</h4>
        <p class="text-text-secondary mb-2"><strong class="text-text-default">Materials:</strong> (S) 5 linking cubes as imaginary birds.</p>
        <ol class="assessment-form-instructions-list">
          <li>Let's pretend these cubes are birds. (Place 5 cubes in front of student.) How many birds are there on the ground?</li>
          <li>One bird flies into my tree. Show me. (After the student removes 1 cube from the group, place it on your left pinky.) How many birds are on the ground now? (Continue the pattern of 1 less to 1.)</li>
          <li>Can you count from 5 to 1?</li>
        </ol>
      </div>

      <div class="assessment-form-grid">
        <div>
          <label for="topic-h-do" class="block text-sm font-medium mb-2 text-text-default">What did the student do?</label>
          <textarea id="topic-h-do" name="topic_h_do" rows="4"
            class="assessment-form-input"
            placeholder="Record observations..."></textarea>
        </div>
        <div>
          <label for="topic-h-say" class="block text-sm font-medium mb-2 text-text-default">What did the student say?</label>
          <textarea id="topic-h-say" name="topic_h_say" rows="4"
            class="assessment-form-input"
            placeholder="Record responses..."></textarea>
        </div>
      </div>
      <div>
        <label for="topic-h-score" class="block text-sm font-medium mb-2 text-text-default">Rubric Score (Step 1-4)</label>
        <select id="topic-h-score" name="topic_h_score"
          class="assessment-form-input assessment-form-select-half">
          <option value="">Select score</option>
          <option value="1">Step 1</option>
          <option value="2">Step 2</option>
          <option value="3">Step 3</option>
          <option value="4">Step 4</option>
        </select>
      </div>
    </fieldset>

    <!-- Form Submission -->
    <div class="assessment-form-footer">
      <button type="submit"
        class="assessment-form-submit-btn">
        Save and Submit Assessment
      </button>
    </div>

  </form>
</main>
<!-- /End Main Content Area -->

<?php
// Include the footer file
include '..\src\footer.php';
?>