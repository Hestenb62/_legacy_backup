<?php
  // Define PHP variables for the header
  $pageTitle = "Hesten's Learning - Testing Platform";
  $pageDescription = "Select a test to begin. We offer practice tests for Math, English, Science, and Social Studies for grades 3-12.";
  $pageKeywords = "testing platform, online tests, math test, english test, science test, social studies test, grades 3-12";
  $pageAuthor = "Hesten Allison";
  
  // Define variables for the popup (as seen in header.php)
  $welcomeMessage = "Welcome to the Testing Center";
  $welcomeParagraph = "Please select a subject and grade level to start your test.";

  // Include the header
  include '..\src\header.php'; 
?>

<!-- Main content area -->
<main class="container mx-auto px-4 py-12 min-h-screen">
  
  <h1 class="text-4xl font-bold text-center text-primary mb-12">Select Your Test</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <?php
      // Define the subjects and their icons
      $subjects = [
        "Math" => "fas fa-calculator",
        "English" => "fas fa-book-open",
        "Science" => "fas fa-flask",
        "Social Studies" => "fas fa-globe-americas",
        "Extra Tests" => "fas fa-star" // New extra tests card
      ];

      // Define the grades
      $grades = range(3, 12);

      // --- DEFINE YOUR TEST LINKS HERE ---
      // Add the specific URL for each subject and grade.
      // Use the 'subject-slug' (like 'math', 'english') and the grade number as keys.
      // If a link is not specified, it will default to '#'
      $test_links = [
        "math" => [
          3 => "#",
          4 => "#",
          5 => "#",
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "/assessment.php?id=math-g9",
          10 => "/test/math-g10.php",
          11 => "/test/math-g11.php",
          12 => "#"
        ],
        "english" => [
          3 => "#",
          4 => "#",
          5 => "#", // Example of a missing link
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ],
        "science" => [
          3 => "#",
          4 => "#",
          5 => "#",
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ],
        "social-studies" => [
          3 => "#",
          4 => "#",
          5 => "#",
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ],
        // Links for the new Extra Tests card.
        // You can change these to specific extra test pages per grade if needed.
        "extra-tests" => [
          3 => "/test/extra.php",
          4 => "/test/extra.php",
          5 => "/test/extra.php",
          6 => "/test/extra.php",
          7 => "/test/extra.php",
          8 => "/test/extra.php",
          9 => "/test/extra.php",
          10 => "/test/extra.php",
          11 => "/test/extra.php",
          12 => "/test/extra.php"
        ]
      ];
      // --- END OF TEST LINKS ---

      // Loop through each subject to create a card
      foreach ($subjects as $subject => $icon) {
        $subject_slug = strtolower(str_replace(' ', '-', $subject)); // e.g., "social-studies"
    ?>

    <!-- Subject Card -->
    <section class="bg-content-bg shadow-xl rounded-xl p-6 transition-all duration-300 hover:shadow-2xl" aria-labelledby="<?php echo $subject_slug; ?>-heading">
      <h2 id="<?php echo $subject_slug; ?>-heading" class="text-3xl font-semibold text-primary mb-6 flex items-center">
        <i class="<?php echo $icon; ?> mr-3" aria-hidden="true"></i>
        <?php echo htmlspecialchars($subject); ?> Tests
      </h2>
      
      <p class="text-text-secondary mb-6">Select a grade level to start your <?php echo htmlspecialchars($subject); ?> test.</p>

      <!-- Grade Level Grid -->
      <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3">
        <?php
          // Loop through grades to create buttons
          foreach ($grades as $grade) {
            // Check if a specific link exists in our array, otherwise default to '#'
            $link = $test_links[$subject_slug][$grade] ?? '#';
        ?>
        <a href="<?php echo htmlspecialchars($link); ?>" 
           class="bg-primary text-white text-center font-semibold py-3 px-2 rounded-lg shadow-md hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 <?php echo ($link === '#') ? 'opacity-50 cursor-not-allowed' : ''; ?>"
           aria-label="Grade <?php echo $grade; ?> <?php echo htmlspecialchars($subject); ?> Test"
           <?php if ($link === '#') { echo ' onclick="return false;"'; } // Prevent click if link is '#' ?>
           >
          Grade <?php echo $grade; ?>
        </a>
        <?php
          } // End grades loop
        ?>
      </div>
    </section>

    <?php
      } // End subjects loop
    ?>

  </div> <!-- End main grid -->

</main>
<!-- End main content area -->

<?php
  // Include the footer
  include '..\src\footer.php'; 
?>
