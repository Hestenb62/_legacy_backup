<?php
// --- Page-Specific Variables ---
// These variables are used by header.php to populate the <head> tag
$pageTitle = "Phonological Awareness & Dyslexia - Hesten's Learning";
$pageDescription = "A research paper on phonological awareness, rhyming, and its impact on students with dyslexia.";
$pageKeywords = "Dyslexia, Phonological Awareness, Rhyming, Research, Hesten Allison";
$pageAuthor = "Hesten Allison";

// Variables for the welcome popup (defined in header.php)
// We can set these to be specific to this page.
$welcomeMessage = "Research Paper";
$welcomeParagraph = "You are viewing 'Phonological Awareness: Rhyming & Impact on Students with Dyslexia'.";

// --- Include Header ---
// This file includes the DOCTYPE, <head>, and main site navigation <header>
include '../../src/header.php';
?>

<!-- 
  Page-Specific <head> Content 
  These are assets and styles from the original PA-Rhyming-Impact.html file.
  We include them here, after header.php, so they are inside the <head>.
-->

<!-- Google Font for Fira Code (Inter is already in header.php) -->
<link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">

<!-- html2pdf.js for PDF Download Functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Page-Specific Styles (Updated to use theme variables) -->
<style>
  /*
    Styles from PA-Rhyming-Impact.html, updated to use CSS variables
    from header.php for theme compatibility.
  */
  body {
    /* The main font, bg-color, and text-color are now controlled by header.php */
    /* We just add the specific styles for this page */
  }

  /* Custom scrollbar for the TOC */
  .toc-container::-webkit-scrollbar {
    width: 8px;
  }

  .toc-container::-webkit-scrollbar-track {
    background: var(--color-base-bg, #f1f5f9);
    /* Slate 100 */
    border-radius: 10px;
  }

  .toc-container::-webkit-scrollbar-thumb {
    background: var(--color-accent, #cbd5e1);
    /* Slate 300 */
    border-radius: 10px;
  }

  .toc-container::-webkit-scrollbar-thumb:hover {
    background: var(--color-secondary, #94a3b8);
    /* Slate 400 */
  }

  /* Style for active TOC link */
  .toc-active {
    font-weight: 600;
    color: var(--color-primary, #1e40af);
    /* Blue 700 */
    background-color: var(--color-accent, #E0F2FE);
    /* Light blue */
    border-left: 4px solid var(--color-primary, #3b82f6);
    /* Blue 500 */
    padding-left: 1rem;
  }

  /* Code block styles (theme-aware) */
  pre {
    background-color: #1e293b;
    /* Slate 800 (kept dark for code) */
    color: #e2e8f0;
    /* Slate 200 */
    padding: 1.5rem;
    border-radius: 0.75rem;
    overflow-x: auto;
    font-family: "Fira Code", "Monaco", "Consolas", monospace;
  }

  /* Inline code styles (theme-aware) */
  code {
    font-family: "Fira Code", "Monaco", "Consolas", monospace;
    background-color: var(--color-base-bg, #e2e8f0);
    /* Slate 200 */
    color: var(--color-text-default, #1e293b);
    /* Slate 800 */
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
  }

  /* Dark mode adjustments for code */
  .dark pre {
    background-color: #0f172a;
    /* Slate 900 */
    color: #e2e8f0;
  }

  .dark code {
    background-color: #334155;
    /* Slate 700 */
    color: #f1f5f9;
    /* Slate 100 */
  }

  /* Smooth scroll behavior */
  html {
    scroll-behavior: smooth;
  }

  /* Professional button styling (now uses theme variables) */
  .professional-button {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1rem;
    border-radius: var(--border-radius-base, 0.5rem);
    font-weight: 600;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1),
      0 1px 2px 0 rgba(0, 0, 0, 0.06);
    transition: background-color 0.2s, box-shadow 0.2s, color 0.2s;
    background-color: var(--color-primary, #1d4ed8);
    color: #fff;
    border: 1px solid transparent;
    font-size: 1.125rem;
    /* text-lg */
  }

  .professional-button:hover {
    background-color: var(--color-secondary, #1e40af);
  }

  .professional-button:focus {
    outline: none;
    box-shadow: 0 0 0 2px var(--color-accent, #3b82f6), 0 1px 3px 0 rgba(0, 0, 0, 0.1);
  }

  /* Secondary button (like 'Back' button) */
  .professional-button.secondary {
    background-color: var(--color-base-bg, #e5e7eb);
    color: var(--color-text-default, #1f2937);
  }

  .professional-button.secondary:hover {
    background-color: var(--color-content-bg, #d1d5db);
  }

  /* Green button (like 'Download') */
  .professional-button.green {
    background-color: #16a34a;
    /* bg-green-600 */
  }

  .professional-button.green:hover {
    background-color: #15803d;
    /* hover:bg-green-700 */
  }

  .professional-button svg {
    width: 1.75rem;
    /* w-7 */
    height: 1.75rem;
    /* h-7 */
    margin-right: 0.75rem;
    /* mr-3 */
  }

  /* Loading Spinner Styles (no changes needed) */
  .spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid #ffffff;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    animation: spin 1s linear infinite;
    margin-right: 0.75rem;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  /* Toast Notification Styles (theme-aware) */
  #toast-notification {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--color-text-default, #334155);
    /* Slate 700 */
    color: var(--color-content-bg, #ffffff);
    padding: 12px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    z-index: 1000;
    font-size: 0.9rem;
  }

  #toast-notification.show {
    opacity: 1;
  }

  /* Scroll to Top Button (theme-aware) */
  #scrollToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: var(--color-primary, #3b82f6);
    /* Blue 500 */
    color: white;
    border-radius: 9999px;
    /* Full rounded */
    padding: 0.75rem;
    /* p-3 */
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
      0 2px 4px -1px rgba(0, 0, 0, 0.06);
    transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    opacity: 0;
    transform: translateY(20px);
    z-index: 900;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #scrollToTopBtn.show {
    opacity: 1;
    transform: translateY(0);
  }

  #scrollToTopBtn:hover {
    background-color: var(--color-secondary, #2563eb);
    /* Blue 600 */
  }
  
  /* Page-specific header, main content, and TOC styles (theme-aware) */
  .page-specific-header,
  .toc-container,
  #paperContent {
    /* Backgrounds handled by Tailwind glassmorphism classes */
    color: var(--color-text-default, #334155);
  }
  
  .page-specific-header h1,
  #paperContent h2,
  #paperContent h3,
  #paperContent h4 {
    color: var(--color-text-default, #1F2937);
  }
  
  #paperContent p,
  #paperContent li,
  #paperContent ol {
     color: var(--color-text-default, #334155);
  }

  .toc-container h2,
  .toc-container a {
    color: var(--color-text-default, #334155);
  }
  
  .toc-container a:hover {
    background-color: var(--color-base-bg, #e0f2fe);
    color: var(--color-primary, #1e40af);
  }

  #paperContent a {
    color: var(--color-link, #2563eb);
  }
  
  #paperContent a:hover {
    text-decoration: underline;
  }
  
  #references a {
    word-break: break-all;
  }
  
  /* Search input */
  #searchInput {
    background-color: var(--color-base-bg, #FFFFFF);
    color: var(--color-text-default, #1F2937);
    border-color: var(--color-accent, #D1D5DB);
  }
  
  #searchInput:focus {
    border-color: var(--color-primary, #3B82F6);
    box-shadow: 0 0 0 2px var(--color-accent, #BFDBFE);
  }


  /* Consolidated Mobile Styles (no changes needed) */
  @media (max-width: 1023px) {
    .flex-grow.flex {
      flex-direction: column;
      /* Stack columns vertically */
      gap: 1.5rem;
      /* Add space between stacked sections */
    }

    .w-full.lg\:w-1\/4,
    .w-full.lg\:w-3\/4 {
      width: 100%;
      /* Full width for all sections */
      position: static;
      /* Remove sticky positioning */
      height: auto;
      /* Auto height for content */
      overflow-y: visible;
      /* Allow content to expand */
    }

    .toc-container {
      margin-top: 0;
      /* Remove top margin when stacked */
    }

    /* Use .page-specific-header to target the correct header */
    .page-specific-header .max-w-7xl {
      flex-direction: column;
      align-items: flex-start;
    }

    .page-specific-header h1 {
      margin-bottom: 1rem;
    }

    .page-specific-header .flex-wrap {
      flex-direction: column;
      align-items: flex-start;
    }

    .page-specific-header .flex-wrap>* {
      width: 100%;
    }

    .page-specific-header input[type="text"] {
      margin-top: 1rem;
      width: 100%; /* Make search full-width on mobile */
    }

    .toc-actions {
      flex-direction: row;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .toc-actions button {
      width: auto;
      /* Allow buttons to size content */
      padding: 0.75rem 1rem;
      /* Smaller padding for mobile */
      font-size: 0.9rem;
    }

    .toc-actions button svg {
      width: 1.25rem;
      height: 1.25rem;
      margin-right: 0.5rem;
    }

    .professional-button {
      width: auto;
      /* Allow buttons to size to content on mobile */
    }
  }
</style>

<!-- 
  START of page-specific content from PA-Rhyming-Impact.html
  This content is placed *after* header.php
-->

<!-- Page-Specific Header -->
<header class="page-specific-header shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl border-b border-white/20 dark:border-white/10 py-4 px-6 sticky top-0 z-40 rounded-b-[2rem] w-full">
  <div class="max-w-7xl mx-auto flex justify-between items-center flex-wrap">
    <div>
      <h1 class="text-3xl font-bold">
        Phonological Awareness
      </h1>
      <p class="text-base text-gray-500 mt-1">
        Rhyming & Impact on Students with Dyslexia
      </p>
    </div>
    <div class="flex items-center space-x-4 mt-2 md:mt-0">
      <div class="relative flex items-center">
        <input type="text" id="searchInput" placeholder="Search paper..."
          class="pl-4 pr-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:border-transparent transition duration-200 ease-in-out w-64"
          aria-label="Search paper content" />
        <button id="clearSearchBtn"
          class="absolute right-3 text-gray-500 hover:text-gray-700 focus:outline-none hidden"
          aria-label="Clear search">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <span id="searchResultsCount" class="text-gray-600 text-sm hidden" aria-live="polite"></span>
      <!-- 
        Note: The 'Back' button now links to the new index.php (journal list) 
        instead of using history.back()
      -->
      <a href="index.php" class="professional-button secondary py-2 px-4" aria-label="Go back to journals list">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
          </path>
        </svg>
        Back
      </a>
    </div>
  </div>
</header>

<!-- Main Content Wrapper (TOC + Paper) -->
<div class="flex-grow max-w-7xl mx-auto p-6 flex space-x-6 lg:flex-row flex-col">
  <!-- Table of Contents Sidebar -->
  <aside
    class="w-full lg:w-1/4 p-6 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] border border-white/20 dark:border-white/10 bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl lg:sticky lg:top-24 lg:h-[calc(100vh-120px)] overflow-y-auto toc-container">
    <h2 class="text-xl font-semibold mb-4">
      Table of Contents
    </h2>
    <nav id="toc" class="space-y-2" aria-label="Table of Contents"></nav>
    <div class="toc-actions mt-4 flex flex-col space-y-3">
      <button id="citationBtn" class="professional-button" aria-label="Copy citation for this paper">
        <span id="citationButtonText"> Copy Citation </span>
      </button>
      <button id="downloadPdfBtn" class="professional-button green" aria-label="Download paper as PDF">
        <span id="downloadButtonText"> Download PDF </span>
      </button>
    </div>
  </aside>

  <!-- Main Paper Content -->
  <main id="paperContent" class="w-full lg:w-3/4 p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] border border-white/20 dark:border-white/10 bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl prose prose-blue dark:prose-invert max-w-none">
    <h2 class="text-2xl font-bold mb-4" id="abstract">
      Abstract
    </h2>
    <p class="mb-6">
      This paper provides a comprehensive review of phonological awareness, with a specific focus
      on rhyming ability, and its critical relationship to developmental dyslexia. Phonological awareness, the
      conscious ability to manipulate the sound structure of spoken language, is a foundational skill for literacy
      acquisition. Rhyming, an early component of onset-rime awareness, serves as a significant predictor of later
      reading success. A core tenet of dyslexia research, the Phonological Deficit Hypothesis, posits that
      individuals with dyslexia experience a primary impairment in phonological processing, consistently
      manifesting as persistent difficulties with rhyming and, more profoundly, with phonemic awareness. This
      review details the multifaceted impact of these deficits on decoding, encoding, and ultimately, reading
      comprehension. It further outlines key formal and informal assessment methods for identifying phonological
      awareness weaknesses and presents evidence-based intervention strategies, emphasizing explicit, systematic,
      and multisensory approaches. The paper concludes by highlighting the imperative for early identification,
      targeted intervention, and collaborative support to mitigate the adverse effects of phonological deficits on
      students with dyslexia, thereby fostering their literacy development.
    </p>

    <h2 class="text-2xl font-bold mb-4" id="introduction">
      1. Introduction
    </h2>
    <p class="mb-4">
      Developmental dyslexia, a specific learning disability of neurobiological origin, poses significant challenges
      for millions of individuals worldwide (International Dyslexia Association [IDA], n.d.). Characterized primarily
      by difficulties in accurate and fluent word recognition, poor spelling, and decoding abilities, dyslexia's
      impact extends far beyond the classroom, affecting academic achievement, self-esteem, and future opportunities
      (Shaywitz & Shaywitz, 2005). While various factors can contribute to reading difficulties, the scientific
      consensus firmly points to a core deficit in phonological processing as the primary underlying cause of dyslexia
      (Snowling, 2000; Vellutino, 1979).
    </p>
    <p class="mb-6">
      Central to this phonological deficit is impaired phonological awareness (PA) , the meta-cognitive ability to
      consciously recognize and manipulate the sound structure of spoken language (Anthony & Lonigan, 2004). Within
      the hierarchy of phonological skills, rhyming holds a particularly significant position. As an early-developing
      component of onset-rime awareness, rhyming ability serves as both a critical building block for more complex
      phonological skills and a robust early predictor of later reading success (Ehri et al., 2001). For students with
      dyslexia, persistent struggles with rhyming are often one of the earliest and most observable indicators of
      their phonological vulnerability (Catts et al., 2005).
    </p>
    <p class="mb-6">
      This paper aims to provide a comprehensive and detailed exploration of phonological awareness, with a specific
      emphasis on the role of rhyming, and its profound impact on students with dyslexia. It will delve into the
      theoretical underpinnings of the phonological deficit hypothesis, examine the specific manifestations of
      phonological weaknesses in dyslexic learners, discuss the far-reaching consequences for reading comprehension,
      and outline evidence-based assessment and intervention strategies. By synthesizing current research, this review
      seeks to underscore the critical importance of early identification and targeted phonological instruction,
      particularly focusing on rhyming, as essential components of effective support for students with dyslexia.
    </p>


    <h2 class="text-2xl font-bold mb-4" id="understanding-phonological-awareness">
      2.0 Understanding Phonological Awareness
    </h2>
    <p class="mb-4">
      Phonological awareness is a foundational linguistic skill that refers to an individual's
      conscious awareness of the sound structure of a language, independent of its meaning (Ehri, 2004). It is a
      purely auditory skill, meaning it does not involve print. This distinction is crucial, as PA is a
      prerequisite for, rather than a consequence of, learning to read an alphabetic language where letters
      represent sounds (NICHD, 2000). PA encompasses a range of abilities, typically developing along a continuum
      from larger, more easily perceivable units of sound to smaller, more discrete units.
    </p>
    <p class="mb-6">
      The generally accepted hierarchy of phonological awareness skills includes:
    </p>
    <ul class="list-disc list-inside mb-6">
      <li>
        <span class="font-bold">2.1 Word Awareness:</span>
        <span>
          The most rudimentary level of PA involves the understanding that spoken sentences
          are comprised of individual, discrete words. For instance, a child demonstrating word awareness can
          identify the number of words in a simple sentence such as "The dog barked loudly" by clapping
          or tapping for each word (Reading Rockets, n.d.). This foundational understanding helps children begin
          to segment continuous speech into meaningful units.
        </span>
      </li>
      <li>
        <span class="font-bold">2.2 Syllable Awareness:</span>
        <span>
          Progressing from word awareness, syllable awareness refers to the ability to hear
          and manipulate the syllables within words. Syllables are rhythmic units of pronunciation that contain a
          vowel sound. Key skills at this level include:
        </span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Syllable Blending:</span>
            <span>
              Combining individual syllables to form a complete word (e.g., blending
              "rab-bit" to form "rabbit").
            </span>
          </li>
          <li>
            <span class="font-bold">Syllable Segmentation:</span>
            <span>
              Breaking a multi-syllabic word into its constituent syllables (e.g., segmenting
              "elephant" into "el-e-phant") (Reading Rockets, n.d.). This skill aids in early
              decoding by simplifying longer words into manageable chunks.
            </span>
          </li>
        </ul>
      </li>
      <li>
        <span class="font-bold">2.3 Onset-Rime Awareness:</span>
        <span>
          This level involves the ability to dissect a single-syllable word into two parts: the
          onset and the rime. The <span class="font-bold">onset</span> is defined as the initial consonant sound or consonant blend that precedes the vowel
          in a syllable (e.g., /c/ in "cat," /str/ in "street"). The <span class="font-bold">rime</span>
          encompasses the vowel sound and all subsequent consonant sounds within that same
          syllable (e.g., /at/ in "cat," /eet/ in "street") (Reading Rockets, n.d.). This
          specific skill is particularly salient for understanding rhyming patterns and word families.
        </span>
      </li>
      <li>
        <span class="font-bold">2.4 Phonemic Awareness (PAw):</span>
        <span>
          As the most advanced and highly predictive level of phonological awareness for
          reading success, phonemic awareness is the conscious ability to identify, isolate, segment, blend, and
          manipulate individual speech sounds, or phonemes, within words (NICHD, 2000). English has approximately
          44 distinct phonemes. Mastering phonemic awareness is critical because it directly underlies the
          alphabetic principle, the understanding that letters and letter combinations represent specific
          phonemes. Key phonemic awareness skills include:
        </span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Phoneme Isolation:</span>
            <span>
              Identifying specific phonemes in a given position within a word (e.g., "What
              is the middle sound in 'mop'?" - /o/) (Heggerty, n.d.).
            </span>
          </li>
          <li>
            <span class="font-bold">Phoneme Blending:</span>
            <span>
              Combining a sequence of isolated phonemes to form a complete word (e.g., blending
              /d/ /o/ /g/ to pronounce "dog") (IDA, n.d.). This skill is directly applied during decoding
              when sounding out new words.
            </span>
          </li>
          <li>
            <span class="font-bold">Phoneme Segmentation:</span>
            <span>
              Breaking down a spoken word into its individual constituent phonemes (e.g.,
              segmenting "fish" into /f/ /i/ /sh/) (IDA, n.d.). This is the inverse of blending and is
              fundamental for accurate spelling (encoding).
            </span>
          </li>
          <li>
            <span class="font-bold">Phoneme Manipulation:</span>
            <span>
              The most cognitively demanding phonemic awareness tasks, involving the addition,
              deletion, or substitution of phonemes within words (e.g., "Say 'snail' without the
              /s/." - "nail"; "Change the /m/ in 'man' to /f/." - "fan")
              (Reading Rockets, n.d.). These tasks demonstrate a sophisticated understanding of a word's internal
              sound structure.
            </span>
          </li>
        </ul>
      </li>
    </ul>
    <p class="mb-6">
      The development of these skills is sequential, with mastery of simpler skills often
      facilitating the acquisition of more complex ones. Disruptions at any level of this hierarchy can have
      cascading negative effects on literacy development.
    </p>


    <h3 class="text-xl font-bold mb-3" id="pivotal-role-of-rhyming">
      3.0 The Pivotal Role of Rhyming in Phonological Awareness
    </h3>

    <ul class="list-disc list-inside mb-6">
      <li>
        <span class="font-bold">3.1 Fostering Auditory Sensitivity and Discrimination:</span>
        <span>
          Engaging in rhyming activities naturally draws a child’s attention to the auditory patterns and shared sound structures within spoken words (Goswami, 2000). To identify or produce a rhyme, a child must actively listen for and discriminate between subtle phonetic similarities and differences. This process refines their auditory processing skills, enabling them to perceive that words are not monolithic units but are composed of separable sound components. This enhanced auditory acuity forms a crucial foundation for later, more precise phonemic discriminations.
        </span>
      </li>
      <li>
        <span class="font-bold">3.2 Bridging to the Alphabetic Principle:</span>
        <span>
          Rhyming serves as a critical bridge to understanding the alphabetic principle, the fundamental concept that printed letters and letter combinations represent specific speech sounds (Snowling, 1995; Wimmer et al., 1991). By repeatedly encountering words that share a common rime (e.g., the <code>/ug/</code> sound in “bug,” “rug,” “mug”), children begin to unconsciously grasp the consistent relationship between sounds and the letters that represent those sounds. This early exposure to recurring sound patterns helps to demystify the seemingly arbitrary nature of written language. When children recognize that “cat” and “hat” share the same ending sound, they are poised to understand that the initial sound is what differentiates them, leading naturally into the concept of distinct phonemes.
        </span>
      </li>
      <li>
        <span class="font-bold">3.3 Early Predictor of Reading Success:</span>
        <span>
          Perhaps the most compelling reason for the emphasis on rhyming is its robust predictive validity for future reading and spelling achievement. Numerous longitudinal studies have consistently demonstrated that a child’s early ability to recognize and produce rhymes is a strong and reliable indicator of their readiness for reading and their likelihood of success in acquiring literacy skills (Anthony &amp; Lonigan, 2004; Bowey, 2005; Ehri et al., 2001). Conversely, a persistent difficulty with rhyming in preschool or kindergarten is one of the earliest and most significant “red flags” for identifying children at risk for later reading difficulties, including developmental dyslexia (Catts et al., 2005; Reading Rockets, n.d.; Dyslexia Help at the University of Michigan, n.d.b). This predictive power makes rhyming a crucial skill to assess and foster in early childhood education.
        </span>
      </li>
    </ul>

    <p class="mb-6">
      In essence, rhyming is not merely a playful language activity but a foundational cognitive exercise that attunes the child’s ear to the internal sound structure of words, preparing their minds for the systematic decoding and encoding processes inherent in reading and writing an alphabetic script.
    </p>


    <h3 class="text-xl font-bold mb-3" id="dyslexia-phonological-deficit">
      4.0 Dyslexia: The Phonological Deficit Hypothesis and Rhyming Difficulties
    </h3>
    <p class="mb-6">
      Developmental dyslexia is a specific learning disability that affects an individual's
      ability to read, spell, and write, despite having average or above-average intelligence, adequate
      educational opportunities, and intact sensory abilities (IDA, n.d.). The most widely accepted and
      empirically supported theoretical explanation for dyslexia is the
      <span class="font-bold">Phonological Deficit Hypothesis</span>.
      This hypothesis posits that the primary underlying cause of dyslexia is an inherent
      impairment in the phonological component of language. This deficit manifests as difficulties in perceiving,
      storing, retrieving, and manipulating the basic speech sounds (phonemes) of one's language (Snowling,
      2000; Shaywitz &amp; Shaywitz, 2005; Ramus, 2003; Vellutino, 1979).
    </p>
    <ul class="list-disc list-inside mb-6">
      <li>
        <span class="font-bold">4.1 Core Characteristics of Phonological Deficits in Dyslexia:</span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Persistent Rhyming Challenges:</span>
            <span>
              As highlighted previously, one of the earliest and most consistent clinical
              indicators of dyslexia risk is a notable and persistent difficulty with rhyming. While typically
              developing children begin to enjoy and master rhyming around ages three to four, children who later
              develop dyslexia often struggle significantly with tasks requiring rhyme recognition, production, or
              completion (Catts et al., 2005; Reading Rockets, n.d.; Dyslexia UK, n.d.). This difficulty is not merely
              a delay but often a qualitative difference in their ability to process and generalize sound
              patterns.
            </span>
          </li>
          <li>
            <span class="font-bold">Profound Impairment in Phonemic Awareness:</span>
            <span>
              The most significant and consistently documented phonological deficit in dyslexia
              is impaired phonemic awareness (IDA, n.d.). Students with dyslexia typically struggle with all facets of
              phonemic awareness, including:
            </span>
            <ul class="list-disc list-inside ml-6">
              <li>
                <span class="font-bold">Phoneme Blending:</span>
                <span>
                  The inability to smoothly combine individual sounds to form a complete word. This
                  directly impacts their ability to "sound out" words during reading (IDA, n.d.). For example,
                  given the sounds /b/, /æ/, /t/, a student with dyslexia might struggle to synthesize them into
                  "bat."
                </span>
              </li>
              <li>
                <span class="font-bold">Phoneme Segmentation:</span>
                <span>
                  Significant difficulty breaking down spoken words into their discrete sound units.
                  This directly impedes spelling (encoding), as they cannot accurately represent each sound with its
                  corresponding letter(s) (Dyslexia UK, n.d.). A student might hear "dog" but write
                  "dg" due to an inability to segment all three phonemes.
                </span>
              </li>
              <li>
                <span class="font-bold">Phoneme Manipulation:</span>
                <span>
                  These advanced tasks, such as deleting a sound from a word (e.g., saying
                  "light" without the /l/), adding a sound, or substituting one sound for another (e.g.,
                  changing the /o/ in "top" to /i/ to make "tip"), are particularly challenging and
                  often indicative of a deep-seated phonological processing weakness (Bradley &amp; Bryant, 1978; Catts et
                  al., 2005).
                </span>
              </li>
            </ul>
          </li>
          <li>
            <span class="font-bold">Naming Speed Deficits (Rapid Automatized Naming - RAN):</span>
            <span>
              While distinct from PA, many individuals with dyslexia also exhibit deficits in
              rapid automatized naming (RAN), which involves quickly naming a series of familiar items (e.g., letters,
              numbers, colors, objects). This is thought to reflect a broader deficit in accessing and retrieving
              phonological information from long-term memory (Wolf &amp; Bowers, 1999).
            </span>
          </li>
        </ul>
      </li>
      <li class="mt-2">
        <span class="font-bold">4.2 Neurological Underpinnings:</span>
        <span>
          The phonological deficit in dyslexia is not merely behavioral; it has a clear neurobiological basis.
          Functional neuroimaging studies (e.g., fMRI) consistently reveal atypical brain activation patterns in
          individuals with dyslexia, particularly in the left hemisphere's posterior reading system. During
          phonological tasks, individuals with dyslexia often show reduced activation in key brain regions
          associated with language processing and reading, including:
        </span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Left inferior frontal gyrus</span>
            <span>
              (Broca's area), involved in speech production and some aspects
              of phonological processing.
            </span>
          </li>
          <li>
            <span class="font-bold">Left parietotemporal region</span>
            <span>
              , crucial for phonological processing and word analysis.
            </span>
          </li>
          <li>
            <span>
              The left occipitotemporal region (often referred to as the
              "visual word form area" or VWFA), which is typically specialized for rapid, automatic word
              recognition (Gabrieli et al., 2011; Ramus, 2003; CPD Online College, n.d.).
              These differences in neural activation are observed even
              during tasks that involve only auditory processing of speech sounds, without any visual print,
              reinforcing the notion of a fundamental phonological processing difference. Some studies also indicate
              compensatory over-activation in homologous right-hemisphere regions in individuals with dyslexia (CPD
              Online College, n.d.). These neurological findings provide strong empirical support for the phonological
              deficit hypothesis as the primary explanation for dyslexia.
            </span>
          </li>
        </ul>
      </li>
    </ul>
    <p class="mb-6">
      The consistent presence of rhyming difficulties as an early marker, coupled with
      profound phonemic awareness deficits and distinct neurobiological profiles, firmly establishes the central
      role of phonological processing weaknesses in the etiology of developmental dyslexia.
    </p>


    <h2 class="text-2xl font-bold mb-4" id="impact-on-reading-comprehension">
      5.0 Impact on Reading Comprehension
    </h2>
    <p class="mb-4">
      While the direct effects of phonological awareness deficits in dyslexia are most evident at the word level (decoding and spelling), these foundational challenges have significant and cascading negative consequences for overall reading comprehension. Reading comprehension is not merely about recognizing individual words; it requires efficient, automatic word recognition to free up cognitive resources for higher-level processes like inferencing, vocabulary integration, and text structure understanding (National Reading Panel, 2000).
    </p>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">5.1 Cognitive Load and Working Memory Overload:</span>
        <span> For students with dyslexia, every encounter with an unfamiliar word can become a laborious decoding exercise. This slow, effortful, and often inaccurate word recognition places an immense cognitive load on the reader. Precious working memory resources, which are essential for holding and manipulating information to construct meaning, are predominantly consumed by the basic act of decoding. As a result, fewer cognitive resources remain available for understanding the meaning of individual sentences, let alone synthesizing information across paragraphs or making inferences (Lexia Learning, 2024; Snowling, 1995). The student may read word-by-word, losing the overarching narrative or informational flow.</span>
      </li>
      <li>
        <span class="font-bold">5.2 Reduced Reading Fluency:</span>
        <span> The struggle with decoding directly leads to poor reading fluency, characterized by slow reading rate, numerous errors, and a lack of appropriate prosody (expression and rhythm). Fluent reading allows for automatic word recognition, which enables the reader to focus on meaning rather than individual word identification. When fluency is impaired, comprehension suffers because the reader cannot process the text quickly or smoothly enough to build a coherent mental model of the content (Lexia Learning, 2024).</span>
      </li>
      <li>
        <span class="font-bold">5.3 Limited Exposure to Print and Vocabulary Development:</span>
        <span> A challenging and often frustrating reading experience frequently leads students with dyslexia to avoid reading. This reduced exposure to print, often termed the "Matthew Effect" (Stanovich, 1986), means they miss out on the rich opportunities for incidental vocabulary acquisition, exposure to diverse sentence structures, and the accumulation of general background knowledge that typically developing readers gain through extensive reading. This lack of exposure further hinders their comprehension, particularly as texts become more complex and domain-specific (Lexia Learning, 2024). A smaller vocabulary directly impacts comprehension as unknown words impede understanding.</span>
      </li>
      <li>
        <span class="font-bold">5.4 Disconnection Between Oral Language and Reading Comprehension:</span>
        <span> It is crucial to note that many individuals with dyslexia possess intact or even superior oral language comprehension abilities (Gough &amp; Tunmer, 1886). They may understand complex spoken narratives or instructions perfectly well. However, their phonological decoding difficulties create a "bottleneck" that prevents them from accessing their strong oral language skills when confronted with written text. This disconnect is a defining feature of dyslexia, where the primary barrier to comprehension lies in the translation of print to meaning, stemming from the phonological deficit, rather than a general language comprehension deficit (Lexia Learning, 2024).</span>
      </li>
    </ul>
    <p class="mb-6">
      In summary, while the phonological deficit initially manifests at the word level, its ripple effects permeate all aspects of literacy. By hindering efficient word recognition, it ultimately starves the higher-level comprehension processes, making reading a significantly more arduous and less meaningful experience for individuals with dyslexia.
    </p>


    <h2 class="text-2xl font-bold mb-3" id="assessment-of-phonological-awareness">
      6.0 Assessment of Phonological Awareness
    </h2>
    <p class="mb-4">
      Early and accurate assessment of phonological awareness is critical for identifying children at risk for dyslexia, informing diagnostic decisions, and guiding the development of effective, individualized interventions. Assessments should be conducted systematically and often involve both formal, standardized measures and informal, criterion-referenced tasks.
    </p>
    <h4 class="text-lg font-semibold mb-2">6.1 Principles of Assessment:</h4>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Auditory Focus:</span>
        <span> Initial assessments of phonological awareness, especially in young children, should primarily focus on oral-auditory tasks, without the presence of print. This ensures that the assessment truly measures the child's ability to manipulate sounds, not their knowledge of letters (Dyslexia Help at the University of Michigan, n.d.a; Heggerty, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Developmental Progression:</span>
        <span> Assessments should cover a range of PA skills, progressing from simpler to more complex tasks, reflecting the typical developmental hierarchy (e.g., word awareness, syllable awareness, onset-rime awareness, and then various levels of phonemic awareness).</span>
      </li>
      <li>
        <span class="font-bold">Observation of Process:</span>
        <span> Beyond just correct/incorrect responses, clinicians and educators should observe the child's processing time, effort, and strategies used. A child who eventually gets the right answer but struggles significantly may still indicate an underlying deficit.</span>
      </li>
    </ul>
    <h4 class="text-lg font-semibold mb-2">6.2 Formal Assessments:</h4>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Comprehensive Test of Phonological Processing, Second Edition (CTOPP-2):</span>
        <span> The CTOPP-2 is one of the most widely used and highly regarded diagnostic tools for assessing phonological abilities in individuals from ages 4-0 through 24-11. It comprises multiple subtests that measure various aspects of phonological awareness (e.g., blending nonwords, segmenting nonwords, elision), phonological memory (e.g., memory for digits, nonword repetition), and rapid naming (Robertson &amp; Salter, 2007; Dyslexia Help at the University of Michigan, n.d.a). Performance across these subtests provides a comprehensive profile of an individual's phonological strengths and weaknesses.</span>
      </li>
      <li>
        <span class="font-bold">Dynamic Indicators of Basic Early Literacy Skills (DIBELS 8th Edition):</span>
        <span> While broader literacy screeners, DIBELS measures include brief, curriculum-based measures that tap into early phonological awareness skills, such as First Sound Fluency (FSF) and Phoneme Segmentation Fluency (PSF), making them useful for universal screening and progress monitoring in educational settings.</span>
      </li>
    </ul>
    <h4 class="text-lg font-semibold mb-2">6.3 Informal Assessments (Focus on Rhyming and Early Skills):</h4>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Rhyme Recognition:</span>
        <span> Present two words and ask, "Do 'cat' and 'hat' rhyme?" (Yes/No response).</span>
      </li>
      <li>
        <span class="font-bold">Rhyme Production/Generation:</span>
        <span> Ask the child to generate words that rhyme with a given word (e.g., "Tell me words that rhyme with 'blue'."). This is a more challenging task than recognition and often indicates a deeper understanding (Reading Rockets, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Rhyme Completion:</span>
        <span> Provide a sentence with a missing rhyming word (e.g., "The frog sat on a... [log]").</span>
      </li>
      <li>
        <span class="font-bold">Odd-One-Out:</span>
        <span> Present three words and ask which one doesn't rhyme (e.g., "Which word doesn't rhyme: 'bear', 'chair', 'moon'?") (Reading Rockets, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Nursery Rhyme Knowledge/Recitation:</span>
        <span> Assess a child's familiarity with and ability to recite common nursery rhymes. Lack of exposure or difficulty with these often signals a lack of sensitivity to rhyming patterns (Dyslexia Help at the University of Michigan, n.d.b).</span>
      </li>
      <li>
        <span class="font-bold">Picture Sorts:</span>
        <span> Provide a collection of pictures and ask the child to group those that rhyme.</span>
      </li>
    </ul>
    <p class="mb-6">
      Consistent struggles across these informal rhyming tasks, particularly after age four or five, should trigger further formal assessment for potential phonological awareness deficits and risk for dyslexia.
    </p>


    <h2 class="text-2xl font-bold mb-3" id="intervention-strategies">
      7.0 Intervention Strategies for Phonological Awareness
    </h2>
    <p class="mb-6">
      Effective intervention for phonological awareness deficits in students with dyslexia is paramount for fostering literacy development. Research consistently supports the efficacy of explicit, systematic, and multisensory instructional approaches, ideally initiated as early as possible (NICHD, 2000; Reading Teacher, n.d.). Early intervention, particularly in preschool and kindergarten, yields the most profound and lasting benefits, as it targets skills before reading failure becomes entrenched.
    </p>

    <h4 class="text-lg font-semibold mb-2">7.1 General Principles of Effective PA Intervention:</h4>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Explicit and Direct Instruction:</span>
        <span> Phonological awareness skills must be taught directly and intentionally. Instructions should be clear, concise, and modeled by the instructor (IDA, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Systematic and Sequential Progression:</span>
        <span> Instruction should follow a logical, research-based sequence, moving from simpler, larger units of sound to more complex, smaller units. This typically means beginning with word and syllable awareness, progressing to onset-rime (including rhyming), and then to the various levels of phonemic awareness (Heggerty, n.d.; Dyslexia Help at the University of Michigan, n.d.a).</span>
      </li>
      <li>
        <span class="font-bold">Oral-Auditory Focus (Initially):</span>
        <span> In the early stages, instruction should be primarily auditory and oral. Avoid introducing letters or print until a solid understanding of sound manipulation is established (Dyslexia Help at the University of Michigan, n.d.a; Heggerty, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Multisensory Engagement:</span>
        <span> Use multisensory approaches that engage auditory, visual, kinesthetic, and tactile pathways. This can include hand movements, tapping out syllables, using blocks or chips for phonemes, or tracing letters in sand (Reading Teacher, n.d.; Dyslexia Help at the University of Michigan, n.d.a).</span>
      </li>
      <li>
        <span class="font-bold">High Repetition and Practice:</span>
        <span> Students with dyslexia require more practice and repetition to achieve mastery and automaticity of phonological skills (IDA, n.d.). Activities should be engaging and provide ample opportunities for repeated exposure.</span>
      </li>
      <li>
        <span class="font-bold">Bridge to Phonics:</span>
        <span> Once a foundation in phonological awareness is established, make explicit connections to phonics instruction, teaching the relationship between phonemes (sounds) and graphemes (letters) (Reading Teacher, n.d.; Heggerty, n.d.).</span>
      </li>
    </ul>

    <h4 class="text-lg font-semibold mb-2">7.2 Specific Strategies for Rhyming Intervention:</h4>
    <p class="mb-2">
      Given its foundational importance, specific strategies for teaching rhyming are crucial:
    </p>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Read Aloud Rhyming Literature:</span>
        <span> Read books, poems, and nursery rhymes with strong rhyming patterns. Exaggerate rhyming words and pause to ask children to identify or predict them (Reading Rockets, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Sing Rhyming Songs and Chants:</span>
        <span> Use songs and chants that emphasize rhyming words. Encourage children to sing along and identify rhymes (Reading Teacher, n.d.).</span>
      </li>
      <li>
        <span class="font-bold">Interactive Rhyming Games:</span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Rhyme Matching/Sorting:</span>
            <span> Provide a target word and ask the child to find another word or picture that rhymes. Use picture cards for non-readers.</span>
          </li>
          <li>
            <span class="font-bold">Rhyme Production:</span>
            <span> Ask, "What rhymes with 'tree'?" and encourage brainstorming of multiple rhyming words.</span>
          </li>
          <li>
            <span class="font-bold">"I'm Thinking Of" Game:</span>
            <span> "I'm thinking of a word that rhymes with 'ball' and you can play with it." (doll).</span>
          </li>
          <li>
            <span class="font-bold">Silly Rhyme Stories/Poems:</span>
            <span> Encourage children to create their own silly rhyming sentences or poems.</span>
          </li>
          <li>
            <span class="font-bold">Movement-Based Rhyming:</span>
            <span> Clap for each rhyming word, or use a hand gesture when a rhyming pair is identified.</span>
          </li>
        </ul>
      </li>
    </ul>

    <h4 class="text-lg font-semibold mb-2">7.3 Progression to Advanced Phonemic Awareness Skills:</h4>
    <p class="mb-2">
      After rhyming and syllable awareness are established, intervention should systematically move towards phoneme-level tasks:
    </p>
    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">Phoneme Isolation:</span>
        <span> Start with initial sounds ("What's the first sound in 'sun'?"), then final sounds, and finally medial vowel sounds.</span>
      </li>
      <li>
        <span class="font-bold">Phoneme Blending with Manipulatives:</span>
        <span> Use "sound boxes" or "Elkonin boxes" with chips. Say /s/ /u/ /n/, have the child push a chip for each sound, then blend to say "sun."</span>
      </li>
      <li>
        <span class="font-bold">Phoneme Segmentation:</span>
        <span> Say "cat," and have the child push a chip for each sound: /c/ (chip) /a/ (chip) /t/ (chip). This supports spelling.</span>
      </li>
      <li>
        <span class="font-bold">Phoneme Manipulation:</span>
        <span> Gradually introduce more challenging tasks:</span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Deletion:</span>
            <span> "Say 'smile' without the /s/."</span>
          </li>
          <li>
            <span class="font-bold">Addition:</span>
            <span> "Add /s/ to the beginning of 'top'."</span>
          </li>
          <li>
            <span class="font-bold">Substitution:</span>
            <span> "Change the /a/ in 'bat' to /u/'." These advanced skills are strongly correlated with reading and spelling success.</span>
          </li>
        </ul>
      </li>
    </ul>

    <p class="mb-6">
      Effective phonological awareness intervention is a cornerstone of literacy instruction for students with dyslexia. It empowers them by building the fundamental sound-processing skills necessary to unlock the alphabetic code.
    </p>




    <h2 class="text-2xl font-bold mb-4" id="collaboration-and-ongoing-support">
      8.0 Collaboration and Ongoing Support
    </h2>
    <p class="mb-4">
      Addressing the needs of students with dyslexia requires a multifaceted and collaborative approach involving various professionals and consistent, long-term support. The impact of phonological awareness deficits extends throughout the educational journey, necessitating vigilance and tailored interventions beyond the early elementary years.
    </p>

    <ul class="list-disc list-inside mb-4">
      <li>
        <span class="font-bold">8.1 Role of Professionals:</span>
        <ul class="list-disc list-inside ml-6">
          <li>
            <span class="font-bold">Speech-Language Pathologists (SLPs):</span>
            <span> SLPs possess expertise in the sound system of language and play a crucial role in the early identification, assessment, and intervention for phonological awareness difficulties, particularly in the pre-literacy and emergent literacy stages. They can provide highly individualized, intensive therapy that targets specific phonological weaknesses and bridges oral language to written language (ASHA, n.d.; GSA, n.d.).</span>
          </li>
          <li>
            <span class="font-bold">Educators (Classroom Teachers, Reading Specialists, Special Education Teachers):</span>
            <span> All educators working with students at risk for or diagnosed with dyslexia must have comprehensive training in evidence-based literacy instruction, particularly <span class="font-bold">Structured Literacy</span> approaches. These approaches, often based on Orton-Gillingham principles, are explicit, systematic, diagnostic, and multisensory, integrating phonological awareness with phonics, morphology, syntax, and semantics (IDA, n.d.; Lexia Learning, 2024). Reading specialists and special education teachers often provide more intensive, small-group, or one-on-one interventions.</span>
          </li>
          <li>
            <span class="font-bold">Psychologists/Neuropsychologists:</span>
            <span> These professionals are crucial for comprehensive diagnostic evaluations, determining the specific learning disability (dyslexia), assessing cognitive profiles (e.g., IQ, working memory, processing speed), and ruling out other contributing factors.</span>
          </li>
        </ul>
      </li>
      <li class="mt-2">
        <span class="font-bold">8.2 Importance of Parental Involvement:</span>
        <span> Parents are invaluable partners in supporting a child's phonological development. Engaging in rhyming games, singing rhyming songs, reading rhyming books, and simply talking about words and sounds at home provides crucial early exposure and practice. Parents can reinforce skills learned at school and create a language-rich environment that nurtures emergent literacy (Reading Rockets, n.d.).</span>
      </li>
      <li class="mt-2">
        <span class="font-bold">8.3 Longitudinal Vigilance and Support:</span>
        <span> Phonological deficits associated with dyslexia are typically persistent, meaning they do not simply disappear with age. While intensive early intervention can significantly mitigate their impact, individuals with dyslexia may continue to require support with phonological processing as they encounter more complex words (e.g., multisyllabic words), more challenging reading materials, and advanced spelling demands (de Jong &amp; van der Leij, 2003; Melby-Lervåg et al., 2012). Therefore, ongoing monitoring, accommodations (e.g., extended time, audiobooks), and continued direct instruction in advanced phonological awareness and related decoding strategies may be necessary throughout their academic careers. The goal is not to "cure" dyslexia but to equip individuals with effective strategies and a strong foundation to become proficient readers and spellers, enabling them to access the curriculum and pursue their educational and career goals.</span>
      </li>
    </ul>

    <p class="mb-4">
      Collaboration among professionals, consistent application of evidence-based practices, and sustained support across educational stages are vital to empowering students with dyslexia to overcome their phonological challenges and achieve literacy success.
    </p>





    <h2 class="text-2xl font-bold mb-4" id="conclusion">
      9.0 Conclusion
    </h2>
    <p class="mb-4">
      The intricate relationship between phonological awareness, specifically rhyming,
      and developmental dyslexia is a well-established and critically important area in literacy research and
      practice. This paper has underscored that phonological awareness, the conscious ability to manipulate the
      sound structure of spoken language, serves as a foundational skill for acquiring reading and spelling
      proficiency in alphabetic languages. Rhyming, as an early and accessible component of onset-rime awareness,
      plays a pivotal role in developing a child&#39;s auditory sensitivity to the internal structure of words and
      stands as a robust early predictor of future literacy success.
    </p>
    <p class="mb-6">
      For individuals with dyslexia, a neurobiological learning disability, a primary
      deficit in phonological processing is the widely accepted explanatory model. This deficit consistently
      manifests as significant and persistent difficulties with rhyming and, more profoundly, with various
      phonemic awareness tasks. These core phonological weaknesses directly impede the acquisition of decoding and
      encoding skills, subsequently placing a substantial cognitive burden on working memory and thereby hindering
      reading fluency and ultimately, reading comprehension.
    </p>
    <p class="mb-6">
      Effective intervention is not only possible but imperative. Research strongly
      advocates for explicit, systematic, and multisensory instruction in phonological awareness, initiated as
      early as possible. Such interventions must systematically progress through the hierarchy of phonological
      skills, from basic rhyming to advanced phoneme manipulation, while seamlessly bridging to phonics
      instruction. Furthermore, a collaborative approach involving speech-language pathologists, educators, and
      parents, coupled with longitudinal vigilance and support, is essential to provide students with dyslexia the
      necessary tools and strategies to navigate their learning journey successfully.
    </p>
    <p class="mb-6">
      By understanding the profound impact of phonological awareness, particularly
      rhyming, on students with dyslexia, educators and clinicians can implement targeted assessments and
      evidence-based interventions that empower these learners to unlock the complexities of written language,
      overcome their challenges, and achieve their full academic and personal potential. Investing in early and
      sustained phonological awareness instruction is not merely a pedagogical choice; it is a critical step
      towards ensuring literacy for all.
    </Fp>

    <h2 class="text-2xl font-bold mb-4" id="references">
      References (APA 7th Edition)
    </h2>
    <ol class="list-decimal list-inside space-y-2">
      <li>
        American Speech-Language-Hearing Association (ASHA). (n.d.). <span class="font-semibold">Phonological Awareness in Children with Dyslexia</span>. Retrieved July 22, 2025, from
        <a href="https://gsa.memberclicks.net/assets/documents/2016-Convention/Handouts/brodeposterhandout.pdf" target="_blank" rel="noopener">https://gsa.memberclicks.net/assets/documents/2016-Convention/Handouts/brodeposterhandout.pdf</a>
      </li>
      <li>
        Anthony, J. L., &amp; Lonigan, C. J. (2004). The relation between phonological sensitivity and later reading ability: A meta-analysis of the early literacy literature. <span class="font-semibold">Reading Research Quarterly, 39</span>(1), 5-30.
      </li>
      <li>
        Bowey, J. A. (2005). The effects of phonological recoding instruction on children’s word reading skills: A meta-analysis. <span class="font-semibold">Journal of Educational Psychology, 97</span>(2), 261–279.
      </li>
      <li>
        Bradley, L., &amp; Bryant, P. E. (1978). Difficulties in auditory organisation as a possible cause of reading backwardness. <span class="font-semibold">Nature, 271</span>(5647), 746-747.
      </li>
      <li>
        Catts, H. W., Adlof, S. M., Hogan, T. P., &amp; Ellis Weismer, S. (2005). Are specific language impairment and dyslexia distinct disorders? <span class="font-semibold">Journal of Speech, Language, and Hearing Research, 48</span>(6), 1378-1393.
      </li>
      <li>
        CPD Online College. (n.d.). <span class="font-semibold">Dyslexia Demystified | Understanding the Neurological Basis</span>. Retrieved July 22, 2025, from
        <a href="https://cpdonline.co.uk/knowledge-base/mental-health/dyslexia-demystified-understanding-neurological-basis/" target="_blank" rel="noopener">https://cpdonline.co.uk/knowledge-base/mental-health/dyslexia-demystified-understanding-neurological-basis/</a>
      </li>
      <li>
        de Jong, P. F., &amp; van der Leij, A. (2003). Effects of phonological awareness and phonics instruction on low-achieving readers. <span class="font-semibold">Journal of Learning Disabilities, 36</span>(4), 346-361.
      </li>
      <li>
        Dyslexia Help at the University of Michigan. (n.d.a). <span class="font-semibold">Phonological Awareness</span>. Retrieved July 22, 2025, from
        <a href="https://dyslexiahelp.umich.edu/professionals/dyslexia-school/phonological-awareness" target="_blank" rel="noopener">https://dyslexiahelp.umich.edu/professionals/dyslexia-school/phonological-awareness</a>
      </li>
      <li>
        Dyslexia Help at the University of Michigan. (n.d.b). <span class="font-semibold">Teaching Phonological Awareness</span>. Retrieved July 22, 2025, from
        <a href="https://dyslexiahelp.umich.edu/professionals/dyslexia-school/phonological-awareness/teaching-phonological-awareness" target="_blank" rel="noopener">https://dyslexiahelp.umich.edu/professionals/dyslexia-school/phonological-awareness/teaching-phonological-awareness</a>
      </li>
      <li>
        Dyslexia UK. (n.d.). <span class="font-semibold">Dyslexia and Phonological Processing</span>. Retrieved July 22, 2025, from
        <a href="https://www.dyslexiauk.co.uk/dyslexia-and-phonological-processing/" target="_blank" rel="noopener">https://www.dyslexiauk.co.uk/dyslexia-and-phonological-processing/</a>
      </li>
      <li>
        Ehri, L. C. (2004). Teaching phonemic awareness and phonics: An explanation of the National Reading Panel meta-analyses. In P. McCardle &amp; V. Chhabra (Eds.), <span class="font-semibold">The voice of evidence in reading research</span> (pp. 153-181). Brookes Publishing.
      </li>
      <li>
        Ehri, L. C., Nunes, S. R., Willows, D. M., Schuster, B. V., Yaghoub-Zadeh, Z., &amp; Shanahan, T. (2001). Phonemic awareness instruction helps children learn to read: Evidence from the National Reading Panel's meta-analysis. <span class="font-semibold">Reading Research Quarterly, 36</span>(3), 250-281.
      </li>
      <li>
        Gabrieli, J. D. E., Gabrieli, J. E. D., &amp; Hoeft, F. (2011). The Brain Basis of the Phonological Deficit in Dyslexia Is Independent of IQ. <span class="font-semibold">Psychological Science, 22</span>(11), 1443–1454.
        <a href="https://gablab.mit.edu/wp-content/uploads/2011-the-brain-basis-of-the-phonological-deficit-in-dyslexia-is-independent-of-iq.pdf" target="_blank" rel="noopener">https://gablab.mit.edu/wp-content/uploads/2011-the-brain-basis-of-the-phonological-deficit-in-dyslexia-is-independent-of-iq.pdf</a>
      </li>
      <li>
        Gough, P. B., &amp; Tunmer, W. E. (1986). Decoding, reading, and reading disability. <span class="font-semibold">Remedial and Special Education, 7</span>(1), 6-10.
      </li>
      <li>
        Heggerty. (n.d.). <span class="font-semibold">Supporting Dyslexic Students: Classroom Tips (Part 2)</span>. Retrieved July 22, 2025, from
        <a href="https://heggerty.org/blog/how-to-support-dyslexic-students-classroom-tips-for-educators-pt-2/" target="_blank" rel="noopener">https://heggerty.org/blog/how-to-support-dyslexic-students-classroom-tips-for-educators-pt-2/</a>
      </li>
      <li>
        International Dyslexia Association (IDA). (n.d.). <span class="font-semibold">Building Phoneme Awareness: Know What Matters</span>. Retrieved July 22, 2025, from
        <a href="https://dyslexiaida.org/building-phoneme-awareness-know-what-matters/" target="_blank" rel="noopener">https://dyslexiaida.org/building-phoneme-awareness-know-what-matters/</a>
      </li>
      <li>
        Lexia Learning. (2024, December 3). <span class="font-semibold">Reading With Dyslexia: How It Impacts Student Literacy</span>. Retrieved July 22, 2025, from
        <a href="https://www.lexialearning.com/blog/reading-with-dyslexia-how-it-impacts-student-literacy" target="_blank" rel="noopener">https://www.lexialearning.com/blog/reading-with-dyslexia-how-it-impacts-student-literacy</a>
      </li>
      <li>
        Melby-Lervåg, M., Lyster, S. A. H., &amp; Hulme, C. (2012). Phonological skills and their relationship to reading ability in children with dyslexia: A meta-analysis. <span class="font-semibold">Journal of Experimental Child Psychology, 112</span>(1), 1-17.
      </li>
      <li>
        National Institute of Child Health and Human Development (NICHD). (2000). <span class="font-semibold">Report of the National Reading Panel. Teaching children to read: An evidence-based assessment of the scientific research literature on reading and its implications for reading instruction</span> (NIH Publication No. 00-4769). U.S. Government Printing Office.
      </li>
      <li>
        National Reading Panel. (2000). <span class="font-semibold">Teaching children to read: An evidence-based assessment of the scientific research literature on reading and its implications for reading instruction</span>. National Institute of Child Health and Human Development.
      </li>
      <li>
        Ramus, F. (2003). Developmental dyslexia: Aetiological theories and anatomical findings. <span class="font-semibold">Developmental Medicine &amp; Child Neurology, 45</span>(8), 564-573.
      </li>
      <li>
        Reading Rockets. (n.d.). <span class="font-semibold">Phonological Awareness Assessment</span>. Retrieved July 22, 2025, from
        <a href="https://www.readingrockets.org/topics/assessment-and-evaluation/articles/phonological-awareness-assessment" target="_blank" rel="noopener">https://www.readingrockets.org/topics/assessment-and-evaluation/articles/phonological-awareness-assessment</a>
      </li>
      <li>
        Reading Teacher. (n.d.). <span class="font-semibold">How to Teach Phonemic Awareness to Children with Dyslexia</span>. Retrieved July 22, 2025, from
        <a href="https://readingteacher.com/how-to-teach-phonemic-awareness-to-children-with-dyslexia/" target="_blank" rel="noopener">https://readingteacher.com/how-to-teach-phonemic-awareness-to-children-with-dyslexia/</a>
      </li>
      <li>
        Robertson, C., &amp; Salter, W. (2007). <span class="font-semibold">Comprehensive Test of Phonological Processing (CTOPP)</span> (2nd ed.). PRO-ED.
      </li>
      <li>
        Shaywitz, S. E., &amp; Shaywitz, B. A. (2005). Dyslexia (specific reading disability). <span class="font-semibold">Biological Psychiatry, 57</span>(11), 1301-1309.
      </li>
      <li>
        Snowling, M. J. (1995). Phonological processing and developmental dyslexia. <span class="font-semibold">Journal of Child Psychology and Psychiatry, 36</span>(6), 947-975.
      </li>
      <li>
        Snowling, M. J. (2000). <span class="font-semibold">Dyslexia</span> (2nd ed.). Blackwell Publishing.
      </li>
      <li>
        Stanovich, K. E. (1986). Matthew effects in reading: Some consequences of individual differences in the acquisition of literacy. <span class="font-semibold">Reading Research Quarterly, 21</span>(4), 360-407.
      </li>
      <li>
        Vellutino, F. R. (1979). <span class="font-semibold">Dyslexia: Theory and research</span>. MIT Press.
      </li>
      <li>
        Wimmer, H., Landerl, K., Linortner, R., &amp; Hummer, P. (1991). The relationship between phonemic awareness and reading acquisition: An Austrian contribution. <span class="font-semibold">Reading Research Quarterly, 26</span>(4), 370-381.
      </li>
      <li>
        Wolf, M., &amp; Bowers, P. G. (1999). The double-deficit hypothesis for the developmental dyslexias. <span class="font-semibold">Journal of Educational Psychology, 91</span>(3), 415-438.
      </li>
    </ol>
    <p class="text-center text-sm mt-8">
      <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank" rel="noopener noreferrer">
        Creative Commons Attribution-ShareAlike 4.0 International License
      </a>
    </p>
  </main>
</div>

<!-- Toast Notification Container -->
<div id="toast-notification" role="status" aria-live="polite"></div>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" aria-label="Scroll to top">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
  </svg>
</button>

<!-- 
  END of page-specific content from PA-Rhyming-Impact.html
-->


<!-- 
  Page-Specific JavaScript 
  This script from the original html file handles TOC, search, PDF, etc.
  We include it here, *before* footer.php, so it is inside the <body>.
-->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Check if elements exist before assigning them
    const paperContent = document.getElementById("paperContent");
    const tocNav = document.getElementById("toc");
    const searchInput = document.getElementById("searchInput");
    const clearSearchBtn = document.getElementById("clearSearchBtn");
    const searchResultsCount = document.getElementById("searchResultsCount");
    const downloadPdfBtn = document.getElementById("downloadPdfBtn");
    const downloadButtonText = document.getElementById("downloadButtonText");
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");
    const toastNotification = document.getElementById("toast-notification");
    const citationBtn = document.getElementById("citationBtn");
    const citationButtonText = document.getElementById("citationButtonText");

    // Exit if essential content isn't present
    if (!paperContent || !tocNav || !searchInput || !downloadPdfBtn) {
      console.error("Essential page components are missing. Script will not run.");
      return;
    }

    // Store original content to reset search highlights
    const originalPaperContentHTML = paperContent.innerHTML;

    // Toast notification
    const showToast = (message) => {
      if (!toastNotification) return;
      toastNotification.textContent = message;
      toastNotification.classList.add("show");
      setTimeout(() => {
        toastNotification.classList.remove("show");
      }, 3000);
    };

    // Table of Contents
    const generateTOC = () => {
      tocNav.innerHTML = "";
      // Select h2 and h3 headings that have an ID
      const headings = paperContent.querySelectorAll("h2[id], h3[id]");
      if (headings.length === 0) {
        tocNav.innerHTML = "<p class='text-gray-500'>No table of contents available.</p>";
        return;
      }
      headings.forEach((heading) => {
        const level = heading.tagName === "H2" ? 0 : 1; // 0 for H2, 1 for H3
        const link = document.createElement("a");
        link.href = `#${heading.id}`;
        link.textContent = heading.textContent;
        link.classList.add(
          "block", "py-2", "px-3", "rounded-md", "hover:bg-blue-50", "hover:text-blue-700",
          "transition", "duration-150", "ease-in-out"
          // Note: text color is inherited from theme-aware styles
        );
        if (level === 1) link.classList.add("ml-4"); // Indent H3 links
        tocNav.appendChild(link);
      });
    };

    // TOC highlight on scroll
    const setupTOCActiveHighlight = () => {
      const headings = paperContent.querySelectorAll("h2[id], h3[id]");
      if (headings.length === 0) return;

      const observerOptions = {
        root: null, // viewport as the root
        rootMargin: "0px 0px -70% 0px", // Trigger when 30% of element is visible from top
        threshold: 0.1, // Trigger when 10% of element is visible
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          const id = entry.target.getAttribute("id");
          const tocLink = tocNav.querySelector(`a[href="#${id}"]`);

          if (tocLink) {
            if (entry.isIntersecting) {
              // Remove active class from all links
              tocNav.querySelectorAll("a").forEach((link) => link.classList.remove("toc-active"));
              // Add active class to the intersecting link
              tocLink.classList.add("toc-active");
            }
          }
        });
      }, observerOptions);

      // Observe all H2 and H3 sections in the paper content
      headings.forEach((section) => {
        observer.observe(section);
      });
    };

    // --- Search Functionality ---
    let currentHighlights = []; // To keep track of highlighted elements for removal

    const applyHighlights = (term) => {
      removeHighlights(); // Always start with a clean slate
      if (!term) return 0; // If no term, no highlights

      let count = 0;
      const lowerCaseTerm = term.toLowerCase();

      // Use a temporary detached DOM fragment for manipulation to improve performance
      const tempFragment = document.createDocumentFragment();
      // Create a temporary div to parse the original HTML
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = originalPaperContentHTML;
      // Append all children of tempDiv to the fragment
      while (tempDiv.firstChild) {
        tempFragment.appendChild(tempDiv.firstChild);
      }

      // Use TreeWalker for efficient text node traversal
      const walker = document.createTreeWalker(
        tempFragment,
        NodeFilter.SHOW_TEXT,
        // Filter out text nodes within <pre>, <code>, or existing .highlight spans
        {
          acceptNode: function(node) {
            if (node.parentNode.closest("pre, code, .highlight, a, button")) { // Also skip links/buttons
              return NodeFilter.FILTER_REJECT;
            }
            return NodeFilter.FILTER_ACCEPT;
          },
        },
        false
      );

      let nodesToProcess = [];
      while(walker.nextNode()) {
        nodesToProcess.push(walker.currentNode);
      }

      nodesToProcess.forEach(node => {
        const text = node.nodeValue;
        const lowerCaseText = text.toLowerCase();
        let index = 0;
        let lastNode = node;

        // Find all occurrences of the term in the current text node
        while ((index = lowerCaseText.indexOf(lowerCaseTerm, index)) !== -1) {
          const range = document.createRange();
          range.setStart(lastNode, index);
          range.setEnd(lastNode, index + term.length);

          const highlightSpan = document.createElement("mark"); // Use <mark> for semantics
          highlightSpan.className = "highlight bg-yellow-300 rounded-sm px-0.5 text-black";
          highlightSpan.setAttribute("data-search-highlight", "true"); // Custom attribute

          try {
            range.surroundContents(highlightSpan);
            currentHighlights.push(highlightSpan); // Store reference
            count++;

            // After surrounding, the original text node is split.
            // lastNode now points to the text node *after* the highlight
            lastNode = highlightSpan.nextSibling;
            if (!lastNode) break; 
            index = 0; // Start search from the beginning of the new text node
          } catch (e) {
            console.warn("Could not highlight text due to DOM structure:", e);
            break; // Stop processing this node if an error occurs
          }
        }
      });
      
      // Replace the entire paper content with the modified fragment
      paperContent.innerHTML = ''; // Clear existing content
      paperContent.appendChild(tempFragment);
      return count;
    };

    const removeHighlights = () => {
      // Restore original content from the stored HTML
      paperContent.innerHTML = originalPaperContentHTML;
      currentHighlights = []; // Clear the stored highlights
    };

    const handleSearchInput = (event) => {
      const searchTerm = event.target.value.trim();
      if (searchTerm.length > 1) { // Only search for 2+ characters
        const count = applyHighlights(searchTerm);
        if (searchResultsCount) {
          searchResultsCount.textContent = `${count} matches`;
          searchResultsCount.classList.remove("hidden");
        }
        if (clearSearchBtn) clearSearchBtn.classList.remove("hidden");
      } else {
        removeHighlights();
        if (searchResultsCount) searchResultsCount.classList.add("hidden");
        if (clearSearchBtn) clearSearchBtn.classList.add("hidden");
      }
    };

    const handleClearSearch = () => {
      if (searchInput) searchInput.value = "";
      handleSearchInput({
        target: searchInput
      }); // Trigger search input handler with empty value
    };
    
    if(searchInput) searchInput.addEventListener("input", handleSearchInput);
    if(clearSearchBtn) clearSearchBtn.addEventListener("click", handleClearSearch);


    // --- Improved PDF Download Functionality ---
    const handleDownloadPdf = async () => {
      // Check if html2pdf is loaded
      if (typeof html2pdf === "undefined") {
        console.error("html2pdf.js is not loaded.");
        showToast("Error: PDF generator not loaded.");
        return;
      }
      
      downloadPdfBtn.disabled = true;
      if (downloadButtonText) {
        downloadButtonText.innerHTML = '<span class="spinner"></span> Generating PDF...';
      }

      // Use a more descriptive filename
      const paperTitle = document.title || "research-paper";
      const filename = paperTitle
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, "-")
        .replace(/^-+|-+$/g, "")
        .substring(0, 60) + ".pdf";

      // Clone content for PDF generation
      const contentToPrint = paperContent.cloneNode(true);

      // Remove any search highlights from the cloned content
      contentToPrint.querySelectorAll(".highlight, mark[data-search-highlight]").forEach((el) => {
        const parent = el.parentNode;
        while (el.firstChild) parent.insertBefore(el.firstChild, el);
        parent.removeChild(el);
      });

      // Add a visible title at the top of the PDF
      const pdfTitle = document.createElement("h1");
      pdfTitle.textContent = "Phonological Awareness: Rhyming & Impact on Students with Dyslexia";
      pdfTitle.style.textAlign = "center";
      pdfTitle.style.fontWeight = "bold";
      pdfTitle.style.fontSize = "2em";
      pdfTitle.style.marginBottom = "0.5em";
      pdfTitle.style.fontFamily = "'Times New Roman', serif";
      pdfTitle.style.color = "#000";
      contentToPrint.insertBefore(pdfTitle, contentToPrint.firstChild);

      // Add a visible "Downloaded from" footer at the end
      const pdfFooter = document.createElement("div");
      pdfFooter.style.cssText = `
        text-align: center;
        font-size: 0.9em;
        margin-top: 2em;
        color: #888;
        font-family: 'Times New Roman', serif;
      `;
      pdfFooter.textContent = "Downloaded from Hesten's Learning Research - " + new Date().toLocaleString();
      contentToPrint.appendChild(pdfFooter);

      // PDF options for html2pdf
      const pdfOptions = {
        margin: [0.75, 0.75, 0.75, 0.75], // Top, Left, Bottom, Right margins in inches
        filename: filename,
        image: {
          type: "jpeg",
          quality: 0.98
        },
        html2canvas: {
          scale: 2,
          useCORS: true,
          backgroundColor: "#fff",
          onclone: (clonedDocument) => {
            // This runs on the cloned document before rendering
            const style = clonedDocument.createElement("style");
            style.innerHTML = `
              body {
                font-family: 'Times New Roman', serif; /* Classic serif font for print */
                font-size: 12pt;
                color: #000;
                background: #fff;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
              }
              h1, h2, h3, h4, h5, h6 {
                font-family: 'Times New Roman', serif;
                color: #000;
                margin-top: 1.5em;
                margin-bottom: 0.5em;
                page-break-after: avoid; /* Avoid page breaks after headings */
              }
              p, ul, ol, pre {
                margin-bottom: 1em;
                page-break-inside: avoid; /* Keep paragraphs/lists together */
              }
              pre {
                background-color: #f0f0f0 !important; /* Light gray bg for code */
                border: 1px solid #ccc;
                padding: 1em;
                border-radius: 0;
                font-family: 'Courier New', monospace;
                font-size: 10pt;
                overflow-x: auto;
                color: #000;
              }
              code {
                font-family: 'Courier New', monospace;
                background-color: #f0f0f0 !important;
                color: #000 !important;
                padding: 0;
              }
              a {
                color: #0000EE; /* Standard blue link for PDF */
                text-decoration: underline;
              }
              #references {
                page-break-before: always !important; /* Start references on new page */
              }
              .highlight, mark[data-search-highlight] {
                background-color: transparent !important;
                color: inherit !important;
                padding: 0 !important;
              }
            `;
            clonedDocument.head.appendChild(style);

            // Add a subtle watermark
            const watermarkDiv = clonedDocument.createElement("div");
            watermarkDiv.style.cssText = `
              position: fixed;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%) rotate(-45deg);
              width: 100%;
              text-align: center;
              font-size: 3em;
              font-family: 'Times New Roman', serif;
              color: rgba(0,0,0,0.08);
              pointer-events: none;
              z-index: -1;
              white-space: nowrap;
              opacity: 0.5;
            `;
            watermarkDiv.textContent = "PROPERTY OF HESTEN'S LEARNING RESEARCH";
            clonedDocument.body.appendChild(watermarkDiv);
          },
        },
        jsPDF: {
          unit: "in",
          format: "letter",
          orientation: "portrait",
          hotfixes: ["px_scaling"],
          putOnlyUsedFonts: true,
          floatPrecision: 16,
        },
      };

      try {
        await html2pdf().from(contentToPrint).set(pdfOptions).save();
        showToast("PDF downloaded successfully!");
      } catch (error) {
        console.error("Error generating PDF:", error);
        showToast("Failed to generate PDF. Please try again.");
      } finally {
        // Re-enable button and reset text
        downloadPdfBtn.disabled = false;
        if (downloadButtonText) {
          downloadButtonText.innerHTML = "Download PDF";
        }
      }
    };
    
    if(downloadPdfBtn) downloadPdfBtn.addEventListener("click", handleDownloadPdf);

    // --- Citation Button Handler ---
    const handleCitationClick = () => {
      const citationText = `Hesten's Learning Research. (2025). Phonological Awareness: Rhyming & Impact on Students with Dyslexia. Hesten's Learning. Retrieved ${new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}.`;
      
      if (navigator.clipboard && navigator.clipboard.writeText) {
        if(citationBtn) citationBtn.disabled = true;
        if(citationButtonText) citationButtonText.innerHTML = '<span class="spinner"></span> Copying...';
        
        navigator.clipboard.writeText(citationText).then(() => {
          showToast("Citation copied to clipboard!");
        }).catch(() => {
          // Fallback if clipboard fails (e.g., in iframe)
          showToast("Citation: " + citationText);
        }).finally(() => {
          if(citationBtn) citationBtn.disabled = false;
          if(citationButtonText) citationButtonText.innerHTML = "Copy Citation";
        });
      } else {
        // Fallback for older browsers
        showToast("Citation: " + citationText);
      }
    };

    if(citationBtn) citationBtn.addEventListener("click", handleCitationClick);


    // --- Scroll to Top Functionality ---
    const toggleScrollToTopButton = () => {
      if (!scrollToTopBtn) return;
      if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.add("show");
      } else {
        scrollToTopBtn.classList.remove("show");
      }
    };

    const scrollToTop = () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    };
    
    if(scrollToTopBtn) scrollToTopBtn.addEventListener("click", scrollToTop);
    window.addEventListener("scroll", toggleScrollToTopButton);


    // --- Initialize all functionalities ---
    generateTOC();
    setupTOCActiveHighlight();
    toggleScrollToTopButton(); // Initial check
  });
</script>

<?php
// --- Include Footer ---
// This file includes the main site <footer>, modals, global JS,
// and closes the </body> and </html> tags.
include '../../src/footer.php';
?>
