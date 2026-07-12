<?php
// --- Page-Specific Variables ---
$pageTitle = "Advanced English Grammar | Hesten's Learning";
$pageDescription = "Read 'An Advanced English Grammar' by Kittredge & Farley online, with interactive voice and accessible reading tools.";
$pageKeywords = "ebook, grammar, English, Kittredge, Farley, accessible reader";
$pageAuthor = "Hesten Allison & Project Gutenberg";

// --- INCLUDE THE HEADER (Root) ---
include '../../../src/header.php';

// Helper: Load and Clean Content
function getGutenbergContent($filePath) {
    if (!file_exists($filePath)) {
        return "ERROR: File not found at " . htmlspecialchars($filePath) . ". Current directory: " . getcwd();
    }
    
    // Increase PCRE limits for cleaning
    ini_set('pcre.backtrack_limit', '5000000');
    ini_set('pcre.recursion_limit', '5000000');
    
    $html = file_get_contents($filePath);
    if (!$html) return "ERROR: Could not read file content.";
    
    // Extraction using string splitting (bulletproof for headers)
    $bodyParts = explode('<body', $html);
    if (count($bodyParts) < 2) {
        $bodyParts = explode('<BODY', $html); // Try uppercase
        if (count($bodyParts) < 2) return "ERROR: <body tag not found in source.";
    }
    
    $afterBody = explode('>', $bodyParts[1], 2);
    if (count($afterBody) < 2) return "ERROR: malformed <body tag.";
    
    $content = $afterBody[1];
    $footerParts = explode('</body>', $content);
    if (count($footerParts) < 2) {
        $footerParts = explode('</BODY>', $content);
        if (count($footerParts) < 2) return "ERROR: </body> tag not found in source.";
    }
    
    $body = $footerParts[0];
    
    // Clean Gutenberg Boilerplate
    $cleaned = preg_replace('/<section class="pg-boilerplate pgheader" id="pg-header"(.*?)<\/section>/si', '', $body);
    if ($cleaned !== null) $body = $cleaned;
    
    $cleaned = preg_replace('/<section class="pg-boilerplate pgheader" id="pg-footer"(.*?)<\/section>/si', '', $body);
    if ($cleaned !== null) $body = $cleaned;
    
    return $body;
}
?>

<!-- Reader Specific Styles -->
<style>
  #reader-container { max-width: 850px; margin: 0 auto; padding: 2rem; }
  #progress-bar-container { position: fixed; top: 0; left: 0; width: 100%; height: 4px; background-color: var(--color-base-bg, #eee); z-index: 1001; }
  #progress-bar { height: 100%; width: 0; background: linear-gradient(to right, var(--color-primary), var(--color-secondary)); transition: width 0.1s ease-out; }
  #reader-controls { position: sticky; top: 0; z-index: 50; background-color: var(--color-base-bg); border-bottom: 1px solid var(--color-text-secondary); padding: 1rem 0; margin-bottom: 2rem; transition: background-color 0.3s; }
  @supports (backdrop-filter: blur(10px)) { #reader-controls { background-color: transparent; backdrop-filter: blur(10px); } }
  #book-content p { margin-bottom: 1.5em; text-align: left; line-height: 1.7; }
  .chapter-section { display: none; }
  .chapter-section.active { display: block !important; animation: fadeIn 0.5s ease-in-out; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
  #go-to-top-btn { display: none; position: fixed; bottom: 90px; right: 24px; z-index: 99; padding: 12px; border-radius: 50%; background: var(--color-primary); color: white; box-shadow: 0 4px 10px rgba(0,0,0,0.3); transition: transform 0.2s; }
  #go-to-top-btn:hover { transform: translateY(-2px); }
  #toc-modal { position: fixed; inset: 0; z-index: 2000; background: rgba(0,0,0,0.4); backdrop-filter: blur(8px); display: none; align-items: center; justify-content: center; }
  #toc-modal.active { display: flex; animation: fadeInModal 0.3s forwards; }
  @keyframes fadeInModal { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
  .toc-content { background: var(--color-base-bg); width: 90%; max-width: 600px; max-height: 80vh; border-radius: 24px; padding: 2rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); border: 1px solid var(--color-text-secondary); overflow-y: auto; }
  .toc-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; border-bottom: 2px solid var(--color-primary); padding-bottom: 1rem; }
  .toc-grid { display: grid; grid-template-columns: 1fr; gap: 0.75rem; }
  .toc-item { display: flex; align-items: center; gap: 1rem; padding: 1rem; background: var(--color-content-bg); border-radius: 16px; border: 1px solid var(--color-text-secondary); transition: all 0.2s; cursor: pointer; text-decoration: none; color: inherit; }
  .toc-item:hover { transform: translateX(8px); border-color: var(--color-primary); background: var(--color-primary/10); }
  .toc-item.active { border-color: var(--color-primary); background: var(--color-primary/10); }
  
  /* Gutenberg Specific Table Styling */
  table#toc { display: none !important; } /* Hide internal TOC */
  table { width: 100%; border-collapse: collapse; margin: 1rem 0; font-size: 0.9em; }
  th, td { border: 1px solid var(--color-text-secondary); padding: 8px 12px; text-align: left; }
  th { background-color: var(--color-primary/5); font-weight: bold; }
  
  /* Disclaimer Card */
  .disclaimer-card { background: rgba(255,255,255,0.05); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 1.5rem; margin-bottom: 2rem; font-size: 0.85rem; color: var(--color-text-secondary); }
</style>

<!-- AURORA MESH BACKGROUND -->
<div class="fixed inset-0 overflow-hidden pointer-events-none noise-grain -z-10 bg-white dark:bg-gray-950 transition-colors duration-500">
    <div class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 will-change-transform bg-indigo-200 dark:bg-indigo-900/40"></div>
    <div class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -2s;' will-change-transform bg-teal-200 dark:bg-teal-900/40"></div>
    <div class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -4s;' will-change-transform bg-emerald-200 dark:bg-emerald-900/40"></div>
</div>

<div id="progress-bar-container"><div id="progress-bar"></div></div>

<main id="main-content" class="min-h-screen relative z-10 font-sans pb-20">
  <div id="reader-container">
    <header class="text-center mb-12 animate-reveal mt-12 flex flex-col items-center">
      <div class="inline-flex items-center gap-3 rounded-full bg-white/60 dark:bg-black/20 backdrop-blur-xl px-5 py-2 text-xs font-bold text-gray-800 dark:text-gray-200 mb-8 border border-black/5 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] justify-center max-w-fit mx-auto">
        <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span></span>
        <span class="tracking-[0.2em] uppercase"><i class="fas fa-book-open mr-2"></i> LANGUAGE READER</span>
      </div>
      <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-br from-emerald-500 via-teal-500 to-indigo-400 mb-4 font-outfit leading-[0.95]">Advanced English Grammar</h1>
      <p class="text-xl font-bold text-gray-500 dark:text-gray-400">by Kittredge & Farley</p>
    </header>

    <nav id="reader-controls" class="flex flex-col sm:flex-row justify-between items-center gap-4 border border-gray-200 dark:border-white/10 sticky top-0 z-50 py-4 mb-12 bg-white/80 dark:bg-[#0a0a0a]/80 backdrop-blur-xl shadow-lg rounded-3xl px-6 mx-auto">
      <div class="flex items-center gap-2 w-full sm:w-auto justify-center bg-gray-100 dark:bg-white/5 p-1.5 rounded-2xl border border-gray-200 dark:border-white/10 shadow-inner">
        <button id="prev-btn" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-2 rounded-xl transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 disabled:opacity-50 hover:bg-gray-50 font-bold"><i class="fas fa-chevron-left text-sm"></i></button>
        <span id="current-label" class="font-bold text-sm text-gray-700 dark:text-gray-300 px-4 min-w-[140px] text-center uppercase tracking-widest leading-none">Intro</span>
        <button id="next-btn" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-2 rounded-xl transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 hover:bg-gray-50 font-bold"><i class="fas fa-chevron-right text-sm"></i></button>
      </div>

      <div class="flex items-center gap-3">
        <button id="tts-speak-btn" class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-6 py-2.5 rounded-xl font-bold shadow-lg hover:-translate-y-0.5 active:scale-95 transition-all flex items-center justify-center gap-2 text-sm border border-transparent flex-1 sm:flex-none"><i class="fas fa-play"></i> Listen</button>
        <button id="tts-stop-btn" class="hidden bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 px-6 py-2.5 rounded-xl font-bold shadow-sm hover:bg-rose-100 transition-all items-center justify-center gap-2 text-sm border border-rose-200 flex-1 sm:flex-none"><i class="fas fa-stop"></i> Stop</button>
      </div>

      <div class="flex items-center gap-3 w-full sm:w-auto mt-2 sm:mt-0 relative">
        <button id="open-settings-btn" class="text-purple-600 bg-purple-50 dark:bg-purple-500/10 py-2.5 px-4 rounded-xl border border-purple-100 shadow-sm flex-1 sm:flex-none" title="Settings"><i class="fas fa-font"></i></button>
        <button id="open-toc-modal" class="text-indigo-600 bg-indigo-50 dark:bg-indigo-500/10 py-2.5 px-6 rounded-xl border border-indigo-100 shadow-sm font-bold flex-1 sm:flex-none"><i class="fas fa-list-ol mr-1"></i> Contents</button>
        
        <!-- Settings Panel -->
        <div id="settings-panel" class="absolute top-[120%] right-0 w-72 bg-white/95 dark:bg-gray-900/95 backdrop-blur-2xl rounded-3xl shadow-2xl border border-gray-200 dark:border-white/10 p-6 hidden opacity-0 transition-all duration-300 transform scale-95 z-[100]">
          <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Font family</h4>
          <div class="flex gap-1.5 p-1 bg-gray-100 dark:bg-gray-800 rounded-xl mb-5">
            <button class="flex-1 py-1.5 rounded-lg text-sm font-bold settings-font" data-font="font-sans">Sans</button>
            <button class="flex-1 py-1.5 rounded-lg text-sm font-bold settings-font font-serif" data-font="font-serif">Serif</button>
          </div>
          <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Text style</h4>
          <div class="flex gap-2 mb-5">
            <button class="flex-1 py-2 bg-gray-50 border rounded-xl text-sm font-bold settings-size" data-size="prose-base">A-</button>
            <button class="flex-1 py-2 bg-gray-50 border rounded-xl text-lg font-bold settings-size" data-size="prose-lg">Aa</button>
            <button class="flex-1 py-2 bg-gray-50 border rounded-xl text-xl font-bold settings-size" data-size="prose-2xl">A+</button>
          </div>
        </div>
      </div>
    </nav>

    <div class="disclaimer-card">
      <strong><i class="fas fa-info-circle mr-2"></i> Project Gutenberg Disclaimer:</strong> 
      This eBook is for the use of anyone anywhere at no cost and with almost no restrictions whatsoever. 
      You may copy it, give it away or re-use it under the terms of the Project Gutenberg License 
      included with this eBook or online at <a href="https://www.gutenberg.org" target="_blank" class="text-emerald-500 font-bold hover:underline">www.gutenberg.org</a>.
    </div>

    <article id="book-content" class="prose prose-lg dark:prose-invert max-w-none text-gray-800 dark:text-gray-200">
      <?php echo getGutenbergContent('pg45814-images.html'); ?>
    </article>
  </div>
</main>

<!-- TOC Modal -->
<div id="toc-modal">
  <div class="toc-content">
    <div class="toc-header">
      <h3 class="text-2xl font-bold font-outfit">Table of Contents</h3>
      <button id="close-toc-modal" class="text-2xl"><i class="fas fa-times"></i></button>
    </div>
    <div class="text-xs text-gray-500 mb-6 p-4 bg-gray-100 dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10">
        <i class="fas fa-shield-alt mr-1"></i> This work is provided by Project Gutenberg under a free license. See the main reader page for details.
    </div>
    <div class="toc-grid">
      <div class="toc-item" data-target="introduction">
        <span class="w-10 h-10 flex items-center justify-center bg-emerald-500 text-white rounded-xl">0</span>
        <div><h4 class="font-bold">Introduction</h4><p class="text-xs opacity-50">General Principles</p></div>
      </div>
      <div class="toc-item" data-target="part-1">
        <span class="w-10 h-10 flex items-center justify-center bg-indigo-500 text-white rounded-xl">I</span>
        <div><h4 class="font-bold">Part One</h4><p class="text-xs opacity-50">Parts of Speech in the Sentence</p></div>
      </div>
      <div class="toc-item" data-target="part-2">
        <span class="w-10 h-10 flex items-center justify-center bg-purple-500 text-white rounded-xl">II</span>
        <div><h4 class="font-bold">Part Two</h4><p class="text-xs opacity-50">Inflection and Syntax</p></div>
      </div>
      <div class="toc-item" data-target="part-3">
        <span class="w-10 h-10 flex items-center justify-center bg-blue-500 text-white rounded-xl">III</span>
        <div><h4 class="font-bold">Part Three</h4><p class="text-xs opacity-50">Analysis of Sentences</p></div>
      </div>
      <div class="toc-item" data-target="exercises">
        <span class="w-10 h-10 flex items-center justify-center bg-teal-500 text-white rounded-xl">IV</span>
        <div><h4 class="font-bold">Exercises</h4><p class="text-xs opacity-50">Practice your grammar skills</p></div>
      </div>
      <div class="toc-item" data-target="appendix">
        <span class="w-10 h-10 flex items-center justify-center bg-rose-500 text-white rounded-xl">A</span>
        <div><h4 class="font-bold">Appendix</h4><p class="text-xs opacity-50">Reference material</p></div>
      </div>
    </div>
  </div>
</div>

<button id="go-to-top-btn"><i class="fas fa-arrow-up"></i></button>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const BOOK_ID = 'grammar_lastPart';
    const content = document.getElementById('book-content');
    
    // --- Segment Content into Parts ---
    // We already have the IDs in the source HTML for most sections.
    // However, PART ONE/TWO/THREE don't always have a wrapper ID.
    // We'll wrap them dynamically based on the markers we found.
    const nodes = Array.from(content.childNodes);
    const sections = ['introduction', 'part-1', 'part-2', 'part-3', 'exercises', 'appendix', 'index'];
    let currentPart = 'hidden'; // Initially outside
    
    const partMarkers = {
        'introduction': 'introduction',
        'I-1': 'part-1',
        'II-1': 'part-2',
        'III-1': 'part-3',
        'exercises': 'exercises',
        'appendix': 'appendix',
        'index': 'index'
    };

    // Create wrappers
    sections.forEach(s => {
        const div = document.createElement('div');
        div.id = 'section-' + s;
        div.className = 'chapter-section';
        content.appendChild(div);
    });

    nodes.forEach(node => {
        if (node.nodeType === 1) {
            // Check for section markers
            for (const [markerId, targetPart] of Object.entries(partMarkers)) {
                if (node.id === markerId || node.querySelector('#' + markerId)) {
                    currentPart = targetPart;
                    break;
                }
            }
        }
        if (currentPart !== 'hidden') {
            document.getElementById('section-' + currentPart).appendChild(node);
        }
    });

    // --- State ---
    let activePart = sections[0];
    const labels = {
      'introduction': 'Intro', 'part-1': 'Part I', 'part-2': 'Part II', 
      'part-3': 'Part III', 'exercises': 'Exercises', 'appendix': 'Appendix', 'index': 'Index'
    };

    function showPart(id) {
      if (!sections.includes(id)) id = sections[0];
      activePart = id;
      
      document.querySelectorAll('.chapter-section').forEach(s => s.classList.remove('active'));
      document.getElementById('section-' + id).classList.add('active');
      document.getElementById('current-label').innerText = labels[id];
      
      document.getElementById('prev-btn').disabled = (sections.indexOf(id) === 0);
      document.getElementById('next-btn').disabled = (sections.indexOf(id) === sections.length - 1);
      
      window.scrollTo({ top: 0, behavior: 'smooth' });
      localStorage.setItem(BOOK_ID, id);
      history.replaceState(null, '', '#' + id);
      
      document.querySelectorAll('.toc-item').forEach(item => {
          item.classList.toggle('active', item.dataset.target === id);
      });
    }

    // --- Init Progress ---
    const hash = window.location.hash.replace('#', '');
    if (sections.includes(hash)) {
      showPart(hash);
    } else {
      const saved = localStorage.getItem(BOOK_ID);
      showPart(saved || sections[0]);
    }

    // --- Event Listeners ---
    document.getElementById('prev-btn').onclick = () => showPart(sections[sections.indexOf(activePart) - 1]);
    document.getElementById('next-btn').onclick = () => showPart(sections[sections.indexOf(activePart) + 1]);

    const tocModal = document.getElementById('toc-modal');
    document.getElementById('open-toc-modal').onclick = () => tocModal.classList.add('active');
    document.getElementById('close-toc-modal').onclick = () => tocModal.classList.remove('active');
    
    document.querySelectorAll('.toc-item').forEach(item => {
        item.onclick = () => {
            showPart(item.dataset.target);
            tocModal.classList.remove('active');
        };
    });

    // --- Settings ---
    const setBtn = document.getElementById('open-settings-btn');
    const setPanel = document.getElementById('settings-panel');
    setBtn.onclick = (e) => {
        e.stopPropagation();
        setPanel.classList.toggle('hidden');
        setTimeout(() => setPanel.classList.toggle('opacity-0'), 10);
        setPanel.classList.toggle('scale-95');
    };
    document.onclick = (e) => { if (!setPanel.contains(e.target)) { setPanel.classList.add('hidden', 'opacity-0', 'scale-95'); } };

    document.querySelectorAll('.settings-font').forEach(b => b.onclick = () => {
        content.classList.remove('font-sans', 'font-serif');
        content.classList.add(b.dataset.font);
    });
    document.querySelectorAll('.settings-size').forEach(b => b.onclick = () => {
        content.classList.remove('prose-base', 'prose-lg', 'prose-2xl');
        content.classList.add(b.dataset.size);
    });

    // --- TTS ---
    const speakBtn = document.getElementById('tts-speak-btn');
    const stopBtn = document.getElementById('tts-stop-btn');
    let utterance = new SpeechSynthesisUtterance();

    speakBtn.onclick = () => {
        const active = document.querySelector('.chapter-section.active');
        const text = active.innerText;
        utterance.text = text;
        window.speechSynthesis.speak(utterance);
        speakBtn.classList.add('hidden');
        stopBtn.classList.remove('hidden');
    };
    stopBtn.onclick = () => {
        window.speechSynthesis.cancel();
        speakBtn.classList.remove('hidden');
        stopBtn.classList.add('hidden');
    };
    utterance.onend = () => { speakBtn.classList.remove('hidden'); stopBtn.classList.add('hidden'); };

    // --- Scroll Progress ---
    window.onscroll = () => {
        const pct = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        document.getElementById('progress-bar').style.width = pct + '%';
        document.getElementById('go-to-top-btn').style.display = window.scrollY > 300 ? 'block' : 'none';
    };
    document.getElementById('go-to-top-btn').onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
  });
</script>

<?php include '../../../src/footer.php'; ?>
