<?php
// --- Page-Specific Variables ---
$pageTitle = 'Research Platform';
$pageDescription = 'An ongoing research journal exploring the educational journey of students with dyslexia.';
$pageKeywords = 'dyslexia, research, journal, education, classroom, phonology, reading';
$pageAuthor = 'Research Team';

// --- Include Header ---
include '../../src/header.php';
?>

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-violet-600 via-purple-700 to-indigo-800 dark:from-violet-900 dark:via-purple-900 dark:to-teal-900 text-white pt-24 pb-24 px-4 rounded-b-[3rem] shadow-2xl overflow-hidden mb-12 border-b border-white/20">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <i class="fas fa-brain absolute top-20 left-10 text-[10rem] animate-pulse text-violet-300 opacity-50 drop-shadow-[0_0_30px_rgba(139,92,246,0.8)]"></i>
        <i class="fas fa-puzzle-piece absolute bottom-10 right-20 text-[14rem] animate-pulse text-indigo-300 opacity-50 drop-shadow-[0_0_30px_rgba(99,102,241,0.8)]"></i>
        <i class="fas fa-book-open absolute top-1/3 right-1/4 text-8xl -rotate-12 text-purple-300 opacity-60"></i>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-1/2 w-96 h-96 bg-teal-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span class="inline-block py-2 px-6 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md shadow-lg">
            Research Journal
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-8 tracking-tight mt-4 text-white">
            <span class="drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)]">Dyslexia &</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-200 to-teal-200">Learning Disabilities</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-50 mb-10 font-light max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Ongoing research exploring the educational journey of students with dyslexia.
        </p>
    </div>
</div>

<!-- 
  --- Page-Specific Styles ---
  Custom scrollbars and animation classes
-->
<style>
  /* Custom animations for the hero background orbs */
  @keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
  }
  .animate-blob {
    animation: blob 7s infinite;
  }
  .animation-delay-2000 {
    animation-delay: 2s;
  }
  .animation-delay-4000 {
    animation-delay: 4s;
  }
  /* Custom scrollbar for content area */
  .content-scrollbar::-webkit-scrollbar {
    width: 8px;
  }

  .content-scrollbar::-webkit-scrollbar-track {
    background: var(--color-base-bg);
  }

  .content-scrollbar::-webkit-scrollbar-thumb {
    background: var(--color-text-secondary);
    border-radius: 4px;
    opacity: 0.5;
  }

  .content-scrollbar::-webkit-scrollbar-thumb:hover {
    background: var(--color-primary);
  }

  /* Hide scrollbar for modal but allow scroll */
  .modal-scrollbar-hidden {
    scrollbar-width: none;
    -ms-overflow-style: none;
  }

  .modal-scrollbar-hidden::-webkit-scrollbar {
    display: none;
  }

  /* Tag Styles */
  .journal-tag {
    transition: all 0.2s ease;
  }

  .journal-tag:hover {
    transform: translateY(-1px);
  }

  /* Fade animation for list updates */
  .fade-in {
    animation: fadeIn 0.3s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(5px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<!-- 
  --- Main Page Content ---
-->
<main class="container mx-auto px-4 mb-24" id="main-content">
  <div class="max-w-7xl mx-auto">

    <!-- Header Section (Removed, replaced by Hero) -->
    <div class="mb-8 hidden"></div>

    <!-- Controls Bar: Search & Sort -->
    <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl rounded-[2rem] border border-white/20 dark:border-white/10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] p-4 mb-8 flex flex-col md:flex-row gap-4 justify-between items-center sticky top-20 z-30">
      <!-- Search -->
      <div class="relative w-full md:w-96 group">
        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors"></i>
        <input type="text" id="searchInput" placeholder="Search title, content, or tags..."
          class="w-full pl-12 pr-6 py-3 bg-white dark:bg-gray-800 border-2 border-gray-100 dark:border-gray-700 rounded-full focus:outline-none focus:ring-4 focus:ring-primary/20 focus:border-primary text-gray-800 dark:text-gray-200 placeholder-gray-400 transition-all shadow-sm">
      </div>

      <!-- Sort & Filter Actions -->
      <div class="flex items-center gap-3 w-full md:w-auto">
        <div class="relative w-full md:w-48">
          <select id="sortSelect" class="w-full appearance-none pl-6 pr-10 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-gray-800 dark:text-gray-200 cursor-pointer shadow-sm transition-all">
            <option value="newest">Newest First</option>
            <option value="oldest">Oldest First</option>
            <option value="az">Title (A-Z)</option>
          </select>
          <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
        </div>
      </div>
    </button>
      </div>
    </div>

    <!-- Active Filters (Hidden by default) -->
    <div id="activeFilters" class="hidden mb-6 flex-wrap gap-2 items-center">
      <span class="text-sm text-text-secondary">Filtered by:</span>
      <span id="filterTagBadge" class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium">
        <span id="filterTagText">Tag Name</span>
        <button id="clearFilterBtn" class="hover:text-red-500 ml-1"><i class="fas fa-times"></i></button>
      </span>
    </div>

    <!-- Journal Entries Grid -->
    <div id="journalEntriesContainer" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Content injected by JS -->
    </div>

    <!-- Pagination Controls -->
    <div id="paginationControls" class="mt-10 flex justify-center items-center gap-2 hidden">
      <!-- Injected by JS -->
    </div>
  </div>
</main>

<!-- 
  --- Modal for Full Entry ---
-->
<div id="entryModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
  <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl w-full max-w-4xl transform transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[90vh] relative border border-white/20 dark:border-white/10" id="modalPanel">

    <!-- Modal Header -->
    <div class="flex justify-between items-start px-8 py-6 border-b border-gray-200 dark:border-gray-800 bg-white/50 dark:bg-gray-800/50 rounded-t-[2.5rem]">
      <div class="pr-8">
        <h3 class="text-2xl sm:text-3xl font-black text-gray-900 dark:text-white leading-tight" id="modalTitle"></h3>
        <div class="flex flex-wrap items-center gap-4 mt-3 text-sm text-gray-500 dark:text-gray-400 font-medium">
          <span class="flex items-center gap-1.5"><i class="fas fa-user-circle"></i> <span id="modalAuthor"></span></span>
          <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i> <span id="modalDate"></span></span>
        </div>
      </div>
      <button id="closeModalBtn" class="text-gray-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-primary">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>

    <!-- Modal Body -->
    <div id="modalContentArea" class="p-8 space-y-8 overflow-y-auto modal-scrollbar-hidden flex-1">
      <!-- Tags in Modal -->
      <div id="modalTags" class="flex flex-wrap gap-2"></div>

      <!-- Summary Box -->
      <div class="bg-primary/5 dark:bg-primary/10 border-l-4 border-primary p-6 rounded-r-2xl">
        <h4 class="text-sm font-bold text-primary uppercase tracking-widest mb-2"><i class="fas fa-info-circle mr-1"></i> Abstract</h4>
        <p id="modalSummary" class="text-gray-700 dark:text-gray-300 italic leading-relaxed text-lg"></p>
      </div>

      <!-- Full Content -->
      <div class="prose dark:prose-invert max-w-none text-text-default">
        <div id="modalFullContent" class="space-y-4 leading-relaxed"></div>
      </div>
    </div>

    <!-- Modal Footer (Actions) -->
    <div class="px-8 py-5 bg-white/50 dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-800 rounded-b-[2.5rem] flex flex-col sm:flex-row justify-between items-center gap-4">

      <!-- Navigation within Modal -->
      <div class="flex items-center gap-2 order-2 sm:order-1 w-full sm:w-auto justify-between sm:justify-start">
        <button id="prevEntryBtn" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-text-secondary hover:text-primary hover:bg-content-bg rounded-lg border border-transparent hover:border-slate-200 dark:hover:border-slate-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
          <i class="fas fa-arrow-left"></i> Previous
        </button>
        <button id="nextEntryBtn" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-text-secondary hover:text-primary hover:bg-content-bg rounded-lg border border-transparent hover:border-slate-200 dark:hover:border-slate-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
          Next <i class="fas fa-arrow-right"></i>
        </button>
      </div>

      <!-- Export & TTS Tools -->
      <div class="flex flex-wrap items-center gap-2 order-1 sm:order-2">
        <button id="ttsBtn" class="flex items-center gap-2 px-3 py-2 text-sm font-bold text-primary bg-primary/10 hover:bg-primary/20 rounded-lg transition-colors border border-transparent">
             <i class="fas fa-volume-up"></i> <span id="ttsBtnText">Listen</span>
        </button>
        
        <div class="h-6 w-px bg-gray-300 dark:bg-gray-600 mx-2"></div>
        
        <button id="shareBtn" class="p-2 text-text-secondary hover:text-primary transition-colors" title="Copy Link">
          <i class="fas fa-link"></i>
        </button>
        
        <button id="pdfBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all" title="Export as PDF">PDF</button>
        <button id="htmlBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all" title="Export as HTML">HTML</button>
        <button id="txtBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all" title="Export as Text">TXT</button>
      </div>

    </div>
  </div>
</div>

<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/turndown/dist/turndown.js"></script>

<!-- Application Logic -->
<script type="module">
  // --- DATA STORE ---
  const journalData = [{
      id: 'scope-definition-001',
      title: 'Journal Scope: The Multifaceted Impact of Dyslexia',
      author: 'Research Team',
      date: 'December 5, 2025',
      timestamp: new Date('2025-12-05').getTime(),
      tags: ['Overview', 'Neurobiology', 'Scope', 'Advocacy'],
      summary: 'Our journal goes beyond "reading backward." This inaugural post outlines the neurobiological, cognitive, and emotional scope of dyslexia that we will explore.',
      fullSummary: 'Dyslexia is often misunderstood as simply "reading backward," but it is a complex neurobiological condition that affects nearly every aspect of a student\'s learning journey. This foundational article outlines the scope of this journal, breaking down the impact of dyslexia into four critical areas: Core Academic Skills, Cognitive Processes, Social and Emotional Impact, and Educational Considerations. We explain why covering each of these areas is critical for identifying and supporting students effectively.',
      fullContent: `
                <p class="text-lg leading-relaxed mb-6 font-medium text-text-default">
                    Dyslexia, being a neurobiological condition, can permeate almost every aspect of a student's learning journey, often in ways that are not immediately obvious. It's much more than just "reading backward." This journal will explore the following critical areas:
                </p>

                <!-- SECTION I -->
                <h2 class="text-2xl font-bold text-primary mt-8 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">I. Core Academic Skills</h2>

                <h3 class="text-xl font-bold mt-6 mb-2">Phonological Awareness</h3>
                <p class="mb-2 italic text-sm text-text-secondary">This is the foundational skill for reading and is the most common area of difficulty.</p>
                <ul class="list-disc pl-5 space-y-1 mb-4 text-text-default">
                    <li><strong>Rhyming & Alliteration:</strong> Struggling to identify patterns (e.g., "cat" and "hat").</li>
                    <li><strong>Segmentation:</strong> Trouble breaking words into syllables or individual phonemes.</li>
                    <li><strong>Manipulation:</strong> Difficulty adding, deleting, or substituting sounds.</li>
                </ul>
                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500 mb-6">
                    <strong class="block text-red-700 dark:text-red-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">Without strong phonological awareness, learning phonics becomes exceptionally challenging, directly impeding reading and spelling development.</p>
                </div>

                <h3 class="text-xl font-bold mt-6 mb-2">Reading Fluency & Comprehension</h3>
                <ul class="list-disc pl-5 space-y-1 mb-4 text-text-default">
                    <li><strong>Fluency:</strong> Dyslexic students often read slowly, word-by-word, leading to fatigue and a lack of prosody (expression).</li>
                    <li><strong>Comprehension:</strong> The cognitive effort spent on decoding leaves little capacity for understanding meaning, leading to reduced vocabulary and trouble with inference.</li>
                </ul>
                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500 mb-6">
                    <strong class="block text-red-700 dark:text-red-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">Poor comprehension affects performance in all subjects that rely on reading, including science, history, and even math word problems.</p>
                </div>

                <h3 class="text-xl font-bold mt-6 mb-2">Writing, Spelling, and Language</h3>
                <p class="mb-2 text-text-default">Writing challenges include phonetic spelling ("fone" for "phone"), difficulty organizing ideas, and dysgraphia (poor handwriting). Spoken language issues can include "tip-of-the-tongue" phenomena (anomia).</p>
                
                <h3 class="text-xl font-bold mt-6 mb-2">Mathematics & Foreign Languages</h3>
                <p class="mb-2 text-text-default"><strong>Math:</strong> Issues with memorizing facts, sequencing multi-step problems, and understanding word problems.</p>
                <p class="mb-2 text-text-default"><strong>Languages:</strong> Significant struggle with pronunciation and vocabulary in new languages.</p>

                <!-- SECTION II -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">II. Cognitive and Processing Aspects</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="bg-base-bg p-4 rounded border border-gray-100 dark:border-gray-700">
                        <h4 class="font-bold mb-2">Processing Speed</h4>
                        <p class="text-sm">Slower reading and delayed response times. Students may know the material but fail timed tests.</p>
                    </div>
                    <div class="bg-base-bg p-4 rounded border border-gray-100 dark:border-gray-700">
                        <h4 class="font-bold mb-2">Working Memory</h4>
                        <p class="text-sm">Difficulty holding numbers in mind for math, or forgetting the start of a sentence by the end.</p>
                    </div>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border-l-4 border-blue-500 mb-6">
                    <strong class="block text-blue-700 dark:text-blue-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">These neurological differences are the underlying cause of learning difficulties, requiring specific evidence-based instructional approaches rather than just "working harder."</p>
                </div>

                <!-- SECTION III -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">III. Social and Emotional Impact</h2>

                <ul class="list-disc pl-5 space-y-2 mb-4 text-text-default">
                    <li><strong>Self-Esteem:</strong> Repeated struggles lead to feelings of inadequacy ("I'm not smart enough").</li>
                    <li><strong>Anxiety:</strong> School avoidance, test anxiety, and physical symptoms like headaches.</li>
                    <li><strong>Motivation:</strong> "Learned helplessness"—giving up because effort doesn't seem to yield results.</li>
                    <li><strong>Social Isolation:</strong> Fear of embarrassment prevents class participation and peer connection.</li>
                </ul>
                <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg border-l-4 border-orange-500 mb-6">
                    <strong class="block text-orange-700 dark:text-orange-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">These emotional toll can lead to a withdrawal from academic and social activities, impacting overall well-being far beyond the classroom.</p>
                </div>

                <!-- SECTION IV -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">IV. Educational Support</h2>

                <p class="mb-4 text-text-default">We will advocate for:</p>
                <ul class="list-disc pl-5 space-y-2 mb-4 text-text-default">
                    <li><strong>Early Identification:</strong> To prevent the "widening gap" and secondary emotional trauma.</li>
                    <li><strong>Specialized Instruction:</strong> Multisensory, explicit, and systematic phonics (Structured Literacy).</li>
                    <li><strong>Accommodations:</strong> Tools like text-to-speech that level the playing field without lowering expectations.</li>
                    <li><strong>Strengths-Based Approach:</strong> Focusing on talents in arts, engineering, or problem-solving to boost confidence.</li>
                </ul>
                
                <p class="mt-8 font-bold text-center text-primary">Dyslexia is not "cured," but managed. Understanding this scope ensures support transitions from school into adulthood.</p>
            `
    },

    {
      id: 'entry-1',
      title: 'Phonological Awareness: Rhyming & Impact on Students with Dyslexia',
      author: 'Research Team',
      timestamp: new Date('2025-12-05').getTime(),
      tags: ['Overview', 'Neurobiology', 'Scope', 'Advocacy'],
      summary: 'This paper provides a comprehensive review of the critical relationship between phonological awareness and developmental dyslexia, focusing specifically on rhyming ability.', // Short snippet for the card
      fullSummary: 'This paper provides a comprehensive review of phonological awareness, with a specific focus on rhyming ability, and its critical relationship to developmental dyslexia. Phonological awareness, the conscious ability to manipulate the sound structure of spoken language, is a foundational skill for literacy acquisition. Rhyming, an early component of onset-rime awareness, serves as a significant predictor of later reading success. A core tenet of dyslexia research, the Phonological Deficit Hypothesis, posits that individuals with dyslexia experience a primary impairment in phonological processing, consistently manifesting as persistent difficulties with rhyming and, more profoundly, with phonemic awareness. This review details the multifaceted impact of these deficits on decoding, encoding, and ultimately, reading comprehension. It further outlines key formal and informal assessment methods for identifying phonological awareness weaknesses and presents evidence-based intervention strategies, emphasizing explicit, systematic, and multisensory approaches. The paper concludes by highlighting the imperative for early identification, targeted intervention, and collaborative support to mitigate the adverse effects of phonological deficits on students with dyslexia, thereby fostering their literacy development.',
      fullContent: `
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
            `
    }

  ];

  // --- STATE ---
  let state = {
    entries: [...journalData], // Filtered list
    currentPage: 1,
    itemsPerPage: 5,
    searchQuery: '',
    sortBy: 'newest',
    filterTag: null, // null or string
    currentEntryId: null
  };

  const {
    jsPDF
  } = window.jspdf;
  const turndownService = new TurndownService();

  // --- UI REFERENCES ---
  const container = document.getElementById('journalEntriesContainer');
  const searchInput = document.getElementById('searchInput');
  const sortSelect = document.getElementById('sortSelect');
  const paginationEl = document.getElementById('paginationControls');
  const activeFiltersEl = document.getElementById('activeFilters');
  const filterTagText = document.getElementById('filterTagText');
  const clearFilterBtn = document.getElementById('clearFilterBtn');

  // --- INIT ---
  function init() {
    processData(); // Sort and Filter
    render(); // Draw UI
    setupEventListeners();
  }

  // --- CORE LOGIC ---

  function processData() {
    let result = journalData;

    // 1. Search
    if (state.searchQuery) {
      const q = state.searchQuery.toLowerCase();
      result = result.filter(e =>
        e.title.toLowerCase().includes(q) ||
        e.summary.toLowerCase().includes(q) ||
        e.tags.some(t => t.toLowerCase().includes(q))
      );
    }

    // 2. Tag Filter
    if (state.filterTag) {
      result = result.filter(e => e.tags.includes(state.filterTag));
    }

    // 3. Sort
    result.sort((a, b) => {
      if (state.sortBy === 'newest') return b.timestamp - a.timestamp;
      if (state.sortBy === 'oldest') return a.timestamp - b.timestamp;
      if (state.sortBy === 'az') return a.title.localeCompare(b.title);
      return 0;
    });

    state.entries = result;

    // Reset to page 1 if pages decrease
    const maxPage = Math.ceil(state.entries.length / state.itemsPerPage) || 1;
    if (state.currentPage > maxPage) state.currentPage = 1;
  }

  function render() {
    // Active Filters UI
    if (state.filterTag) {
      activeFiltersEl.classList.remove('hidden');
      activeFiltersEl.classList.add('flex');
      filterTagText.textContent = state.filterTag;
    } else {
      activeFiltersEl.classList.add('hidden');
      activeFiltersEl.classList.remove('flex');
    }

    container.innerHTML = '';

    if (state.entries.length === 0) {
      container.innerHTML = `
                <div class="text-center py-16 bg-base-bg rounded-lg border border-dashed border-slate-300 dark:border-slate-700">
                    <i class="fas fa-search text-4xl text-text-secondary mb-4 opacity-50"></i>
                    <p class="text-lg text-text-secondary">No journals found matching your criteria.</p>
                    <button id="resetSearchBtn" class="mt-4 text-primary font-bold hover:underline">Clear Search</button>
                </div>
            `;
      document.getElementById('resetSearchBtn')?.addEventListener('click', clearAllFilters);
      paginationEl.classList.add('hidden');
      return;
    }

    // Pagination Slice
    const start = (state.currentPage - 1) * state.itemsPerPage;
    const end = start + state.itemsPerPage;
    const pageItems = state.entries.slice(start, end);

    // Render Cards
    pageItems.forEach(entry => {
      const card = document.createElement('article');
      card.className = 'group bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl rounded-[2rem] border border-white/20 dark:border-white/10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] overflow-hidden hover:shadow-[0_20px_40px_rgb(0,0,0,0.1)] hover:-translate-y-2 transition-all duration-500 flex flex-col h-full fade-in';

      // Generate Tag HTML
      const tagHtml = entry.tags.map(tag =>
        `<span class="journal-tag inline-block px-3 py-1 text-xs font-bold border border-primary/20 bg-primary/10 text-primary rounded-md cursor-pointer hover:bg-primary hover:text-white transition-colors backdrop-blur-sm" data-tag="${tag}">${tag}</span>`
      ).join('');

      card.innerHTML = `
         <div class="p-8 flex-1 flex flex-col relative bg-gradient-to-br from-white/60 to-white/30 dark:from-gray-800/60 dark:to-gray-900/40">
             <div class="flex justify-between items-center mb-6">
                  <div class="flex flex-wrap gap-2">${tagHtml}</div>
                  <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">${entry.date}</span>
             </div>

             <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 group-hover:text-primary transition-colors cursor-pointer read-trigger leading-tight" data-id="${entry.id}">
                 ${entry.title}
             </h3>

             <div class="flex items-center gap-2 mb-6 text-sm text-gray-500 dark:text-gray-400 font-medium">
                  <span class="flex items-center gap-1.5"><i class="fas fa-user-circle text-gray-400"></i> ${entry.author}</span>
             </div>

             <p class="text-gray-600 dark:text-gray-300 leading-relaxed line-clamp-3 mb-8 flex-1">
                 ${entry.summary}
             </p>

             <button class="read-more-btn mt-auto flex items-center justify-between group/btn w-full bg-transparent hover:bg-transparent" data-id="${entry.id}">
                  <span class="text-primary font-bold tracking-wide uppercase text-sm group-hover/btn:text-indigo-600 dark:group-hover/btn:text-indigo-400 transition-colors">
                      Read Article
                  </span>
                  <div class="w-10 h-10 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover/btn:bg-primary group-hover/btn:text-white transition-all duration-300">
                      <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                  </div>
             </button>
         </div>
      `;
      container.appendChild(card);
    });

    renderPagination();
  }

  function renderPagination() {
    const totalPages = Math.ceil(state.entries.length / state.itemsPerPage);

    if (totalPages <= 1) {
      paginationEl.classList.add('hidden');
      return;
    }

    paginationEl.classList.remove('hidden');
    paginationEl.innerHTML = '';

    // Prev Button
    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
    prevBtn.disabled = state.currentPage === 1;
    prevBtn.className = `p-2 rounded-lg ${state.currentPage === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-primary hover:bg-base-bg'}`;
    prevBtn.onclick = () => changePage(state.currentPage - 1);
    paginationEl.appendChild(prevBtn);

    // Page Numbers
    for (let i = 1; i <= totalPages; i++) {
      const pageBtn = document.createElement('button');
      pageBtn.textContent = i;
      if (i === state.currentPage) {
        pageBtn.className = 'w-8 h-8 rounded-lg bg-primary text-white font-bold shadow-md';
      } else {
        pageBtn.className = 'w-8 h-8 rounded-lg text-text-secondary hover:bg-base-bg hover:text-primary transition-colors';
      }
      pageBtn.onclick = () => changePage(i);
      paginationEl.appendChild(pageBtn);
    }

    // Next Button
    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = state.currentPage === totalPages;
    nextBtn.className = `p-2 rounded-lg ${state.currentPage === totalPages ? 'text-gray-300 cursor-not-allowed' : 'text-primary hover:bg-base-bg'}`;
    nextBtn.onclick = () => changePage(state.currentPage + 1);
    paginationEl.appendChild(nextBtn);
  }

  // --- EVENTS & ACTIONS ---

  function changePage(pageNum) {
    state.currentPage = pageNum;
    render();
    container.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  }

  function clearAllFilters() {
    state.searchQuery = '';
    state.filterTag = null;
    searchInput.value = '';
    processData();
    render();
  }

  function setupEventListeners() {
    // Search
    searchInput.addEventListener('input', (e) => {
      state.searchQuery = e.target.value;
      state.currentPage = 1;
      processData();
      render();
    });

    // Sort
    sortSelect.addEventListener('change', (e) => {
      state.sortBy = e.target.value;
      processData();
      render();
    });

    // Clear Filter
    if (clearFilterBtn) {
      clearFilterBtn.addEventListener('click', () => {
        state.filterTag = null;
        processData();
        render();
      });
    }

    // Container Clicks (Delegation for cards and tags)
    container.addEventListener('click', (e) => {
      // Click Tag
      if (e.target.classList.contains('journal-tag')) {
        state.filterTag = e.target.dataset.tag;
        state.currentPage = 1;
        processData();
        render();
        return;
      }

      // Click Open Modal
      const btn = e.target.closest('.read-more-btn') || e.target.closest('.read-trigger');
      if (btn) {
        openEntryModal(btn.dataset.id);
      }
    });

    // Modal Controls
    document.getElementById('closeModalBtn').addEventListener('click', () => showModal(false));
    document.getElementById('entryModal').addEventListener('click', (e) => {
      if (e.target === document.getElementById('entryModal')) showModal(false);
    });

    // Prev/Next in Modal
    document.getElementById('prevEntryBtn').addEventListener('click', () => navigateModal(-1));
    document.getElementById('nextEntryBtn').addEventListener('click', () => navigateModal(1));

    // Downloads
    setupDownloads();
  }

  // --- MODAL LOGIC ---

  function showModal(show = true) {
    const modal = document.getElementById('entryModal');
    const panel = document.getElementById('modalPanel');

    if (show) {
      document.body.style.overflow = 'hidden';
      modal.classList.remove('hidden');
      // Small delay for animation
      requestAnimationFrame(() => {
        modal.classList.remove('opacity-0');
        panel.classList.remove('opacity-0', 'scale-95');
        panel.classList.add('scale-100');
      });
    } else {
      document.body.style.overflow = '';
      modal.classList.add('opacity-0');
      panel.classList.add('opacity-0', 'scale-95');
      panel.classList.remove('scale-100');
      setTimeout(() => {
        modal.classList.add('hidden');
        state.currentEntryId = null;
      }, 300);
    }
  }

  function openEntryModal(id) {
    const entry = journalData.find(e => e.id === id);
    if (!entry) return;

    state.currentEntryId = id;

    // Content
    document.getElementById('modalTitle').textContent = entry.title;
    document.getElementById('modalAuthor').textContent = entry.author;
    document.getElementById('modalDate').textContent = entry.date;
    document.getElementById('modalSummary').textContent = entry.fullSummary;
    document.getElementById('modalFullContent').innerHTML = entry.fullContent;

    // Tags
    const tagsContainer = document.getElementById('modalTags');
    tagsContainer.innerHTML = entry.tags.map(t =>
      `<span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded font-bold uppercase tracking-wider">${t}</span>`
    ).join('');

    // Navigation Button State
    updateModalNavButtons();

    showModal(true);
  }

  function navigateModal(direction) {
    // Find current index in the FILTERED list (state.entries)
    // This allows users to browse through their search results
    const currentIndex = state.entries.findIndex(e => e.id === state.currentEntryId);
    if (currentIndex === -1) return;

    const newIndex = currentIndex + direction;
    if (newIndex >= 0 && newIndex < state.entries.length) {
      openEntryModal(state.entries[newIndex].id);
    }
  }

  function updateModalNavButtons() {
    const currentIndex = state.entries.findIndex(e => e.id === state.currentEntryId);
    const prevBtn = document.getElementById('prevEntryBtn');
    const nextBtn = document.getElementById('nextEntryBtn');

    prevBtn.disabled = currentIndex <= 0;
    nextBtn.disabled = currentIndex >= state.entries.length - 1;

    // Visual styling for disabled state handled by CSS :disabled class
  }

  // --- DOWNLOADS & UTILS ---

  function setupDownloads() {
    const getEntry = () => journalData.find(e => e.id === state.currentEntryId);

    document.getElementById('shareBtn').addEventListener('click', function() {
      const entry = getEntry();
      if (!entry) return;

      const text = `${entry.title}\n${window.location.href}`;
      navigator.clipboard.writeText(text).then(() => {
        const icon = this.querySelector('i');
        const span = this.querySelector('span');
        const originalIcon = icon.className;

        icon.className = 'fas fa-check';
        span.textContent = 'Copied!';
        setTimeout(() => {
          icon.className = originalIcon;
          span.textContent = 'Copy';
        }, 2000);
      });
    });

    document.getElementById('txtBtn').addEventListener('click', () => {
      const entry = getEntry();
      if (!entry) return;
      const text = `${entry.title}\nBy ${entry.author}\n\nSummary:\n${entry.fullSummary}\n\n---\n\n${entry.fullContent.replace(/<[^>]*>?/gm, '')}`; // Simple strip tags
      download(entry.title + '.txt', text, 'text/plain');
    });

    document.getElementById('htmlBtn').addEventListener('click', () => {
      const entry = getEntry();
      if (!entry) return;
      const html = `<html><body><h1>${entry.title}</h1>${entry.fullContent}</body></html>`;
      download(entry.title + '.html', html, 'text/html');
    });

    document.getElementById('pdfBtn').addEventListener('click', () => {
      const entry = getEntry();
      if (!entry) return;
      const doc = new jsPDF();
      doc.setFontSize(16);
      doc.text(entry.title, 10, 10);
      doc.setFontSize(12);

      // Very simple text wrap for demo
      const lines = doc.splitTextToSize(entry.fullSummary, 180);
      doc.text(lines, 10, 20);
      doc.save(entry.title + '.pdf');
    });
  }

  function download(filename, content, mime) {
    const element = document.createElement('a');
    const file = new Blob([content], {
      type: mime
    });
    element.href = URL.createObjectURL(file);
    element.download = filename;
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
  }

  // --- TTS LOGIC ---
  const ttsBtn = document.getElementById('ttsBtn');
  const ttsBtnText = document.getElementById('ttsBtnText');
  let isSpeaking = false;

  function setupTTS() {
      ttsBtn.addEventListener('click', toggleTTS);
      
      // Stop speech when modal closes
      document.getElementById('closeModalBtn').addEventListener('click', stopTTS);
  }

  function toggleTTS() {
      if (isSpeaking) {
          stopTTS();
      } else {
          const entry = journalData.find(e => e.id === state.currentEntryId);
          if (!entry) return;

          // Strip HTML for speaking
          const tempDiv = document.createElement('div');
          tempDiv.innerHTML = entry.title + ". " + entry.fullSummary + ". " + entry.fullContent;
          const textToRead = tempDiv.textContent || tempDiv.innerText || "";

          const utterance = new SpeechSynthesisUtterance(textToRead);
          utterance.onend = () => {
              isSpeaking = false;
              updateTTSUI(false);
          };
          
          window.speechSynthesis.speak(utterance);
          isSpeaking = true;
          updateTTSUI(true);
      }
  }

  function stopTTS() {
      window.speechSynthesis.cancel();
      isSpeaking = false;
      updateTTSUI(false);
  }

  function updateTTSUI(speaking) {
      if (speaking) {
          ttsBtn.classList.add('bg-red-100', 'text-red-600');
          ttsBtn.classList.remove('bg-primary/10', 'text-primary');
          ttsBtn.innerHTML = '<i class="fas fa-stop"></i> <span>Stop</span>';
      } else {
          ttsBtn.classList.remove('bg-red-100', 'text-red-600');
          ttsBtn.classList.add('bg-primary/10', 'text-primary');
          ttsBtn.innerHTML = '<i class="fas fa-volume-up"></i> <span>Listen</span>';
      }
  }

  // Hook up TTS in setups
  setupTTS();

  // Run
  init();
</script>

<?php
include '../../src/footer.php';
?>