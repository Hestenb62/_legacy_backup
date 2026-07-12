<?php
  // ==========================================================================
  // ABOUT ME PAGE
  // ==========================================================================
  // This page provides personal information about the creator of the website,
  // Hesten Allison. It includes a profile photo, a short biography, contact
  // information, and links to social/professional profiles.
  //
  
  // --- PAGE-SPECIFIC VARIABLES ---
  // These variables are used by header.php to set the meta tags and title
  $pageTitle = "About Me - Hesten's Learning";
  $pageDescription = "Learn more about Hesten Allison, the creator of Hesten's Learning, and the mission to make education accessible.";
  $pageKeywords = "about me, hesten allison, education, learning disabilities, homeschool, web developer";
  $pageAuthor = "Hesten Allison";
  
  // Variables for the welcome popup modal (defined in header.php)
  // We can customize this for the "About Me" page.
  $welcomeMessage = "About Me";
  $welcomeParagraph = "Learn a little more about the creator of this site.";

  // Include the header file
  include 'src/header.php';
?>

<!-- 
  MAIN CONTENT AREA
  - I've converted all Bootstrap classes (like "row", "col-md-4", "btn") 
    to their Tailwind CSS equivalents to match your new theme.
  - Theme-aware classes like `bg-content-bg` and `text-text-default` 
    are used to support light/dark/contrast modes.
-->
<main class="bg-content-bg text-text-default py-12 transition-colors duration-300">
  <div class="page-content-wrapper">
    
    <!-- 
      This card wrapper helps the content fit in with the new site design.
      `bg-card-bg` and `rounded-base-rounded` are dynamic variables from your header.
    -->
    <div class="bg-card-bg rounded-base-rounded shadow-xl p-6 md:p-10 overflow-hidden">
      
      <!-- Flex container for the two-column layout -->
      <div class="flex flex-col md:flex-row items-center">

        <!-- Profile Photo Column -->
        <div class="w-full md:w-1/3 text-center mb-6 md:mb-0 flex-shrink-0">
          <img src="/assets/images/profile-photo.jpg" alt="Hesten Allison" 
               class="w-48 h-48 md:w-60 md:h-60 object-cover rounded-full shadow-lg mx-auto border-4 border-primary" 
               onerror="this.onerror=null; this.src='https://placehold.co/240x240/818CF8/FFFFFF?text=HL';">
        </div>

        <!-- About & Contact Info Column -->
        <div class="w-full md:w-2/3 md:pl-10">
          <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-primary">About Me</h1>
          
          <!-- Converted <p> tags with Tailwind's leading-relaxed for readability -->
          <p class="text-justify leading-relaxed mb-4">
            I am currently a student at CCV, working towards my Secondary Ed degree. I've always had a voracious appetite for learning and sharing knowledge, and that's what ultimately led me to create this educational website.
          </p>
          <p class="text-justify leading-relaxed mb-4">
            The primary catalyst for this project was my younger sister, who faces some learning challenges. I wanted to build a platform that could not only support her education but make learning more accessible and enjoyable for her. I drew inspiration from many places, but one website that particularly influenced me was IXL. I admired IXL's interactive approach and comprehensive curriculum, and I wanted to incorporate some of those elements into my own site.
          </p>
          <p class="text-justify leading-relaxed mb-6">
            However, I also wanted to create something unique and tailored to my sister's specific needs. I've spent countless hours researching different learning styles, educational strategies, and the latest developments in educational technology. I've tried to integrate those findings into the design and content of this site, ensuring that it's not just another generic learning platform but a personalized tool that can adapt and grow with its users.
          </p>
          
          <!-- Contact List (converted to flex and space-y) -->
          <ul class="space-y-3 mb-6 border-t border-gray-200 dark:border-gray-700 pt-6">
            <li class="flex items-center">
              <i class="fas fa-envelope text-primary mr-3 w-5 text-center" aria-hidden="true"></i>
              <a href="mailto:hesten@hestena62.com" target="_blank" class="text-text-default hover:text-primary transition-colors">hesten@hestena62.com</a>
            </li>
            <li class="flex items-center">
              <i class="fas fa-globe text-primary mr-3 w-5 text-center" aria-hidden="true"></i>
              <a href="http://hestena62.com" target="_blank" class="text-text-default hover:text-primary transition-colors">hestena62.com</a>
            </li>
            <li class="flex items-center">
              <i class="fas fa-map-marker-alt text-primary mr-3 w-5 text-center" aria-hidden="true"></i>
              <span>USA</span>
            </li>
          </ul>
          
          <!-- Button Links (converted from .btn to Tailwind custom buttons) -->
          <div class="flex flex-wrap gap-3">
            <a href="https://www.linkedin.com/in/hesten-allison-8b4b2b263/" target="_blank" 
               class="inline-flex items-center bg-primary text-white font-semibold py-2 px-4 rounded-lg hover:bg-secondary transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-accent">
              <i class="fab fa-linkedin mr-2" aria-hidden="true"></i> LinkedIn
            </a>
            <a href="mailto:hesten@hestena62.com" target="_blank" 
               class="inline-flex items-center bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
              <i class="fas fa-envelope mr-2" aria-hidden="true"></i> Email Me
            </a>
            <a href="tel:+18024510781" 
               class="inline-flex items-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-400">
              <i class="fas fa-phone mr-2" aria-hidden="true"></i> Text
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php
  // Include the footer file
  // This will add the <footer>, all the modals, and closing </body>/</html> tags
  include 'src/footer.php';
?>
