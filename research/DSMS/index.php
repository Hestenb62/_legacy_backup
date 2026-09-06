<?php
// --- Page-Specific Variables ---
$pageTitle = 'Dysgraphia Studies & Motor Skills | Research Platform';
$pageDescription = 'A peer-reviewed journal exploring fine-motor kinematics, neurobiological substrates, and evidence-based interventions for developmental dysgraphia.';
$pageKeywords = 'dysgraphia, motor skills, kinematics, fine motor, occupational therapy, graphomotor, learning disability, research';
$pageAuthor = 'Research Team';

// --- Include Header ---
include '../../src/header.php';
?>

<!-- Link Dedicated Research Vanilla CSS -->
<link rel="stylesheet" href="/assets/css/research-main.css">

<!-- Hero Section -->
<div class="research-hero dsms-hero">
  <!-- Background Animated Orbs & Icons -->
  <div class="research-hero-bg">
    <i class="fas fa-pen-nib research-hero-icon microscope"></i>
    <i class="fas fa-hand-holding research-hero-icon brain"></i>
    <i class="fas fa-wave-square research-hero-icon dna"></i>

    <div class="research-orb research-orb-1"></div>
    <div class="research-orb research-orb-2"></div>
    <div class="research-orb research-orb-3"></div>
  </div>

  <div class="research-hero-content">
    <span class="research-hero-badge">
      <i class="fas fa-feather-alt"></i> Research Journal
    </span>
    <h1 class="research-hero-title">
      <span class="hero-title-shadow">Dysgraphia Studies &</span> <span class="hero-title-gradient">Motor Skills</span>
    </h1>
    <p class="research-hero-desc">
      Empirical studies into graphomotor mechanics, occupational therapy protocols, and assistive writing technologies.
    </p>
    <div class="research-hero-breadcrumbs">
      <a href="/research/" class="hero-breadcrumb-link"><i class="fas fa-arrow-left"></i> All Journals</a>
      <span class="hero-breadcrumb-separator">/</span>
      <span class="hero-breadcrumb-current">Volume I &bull; Open Access</span>
    </div>
  </div>
</div>

<main class="research-container" id="main-content">
  <div class="max-w-7xl mx-auto">

    <!-- Controls Bar: Search & Sort -->
    <div class="research-controls-bar">
      <!-- Search -->
      <div class="research-search-wrap">
        <i class="fas fa-search research-search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search papers, kinematics, authors, tags..."
          class="research-search-input">
      </div>

      <!-- Sort Actions -->
      <div class="research-select-wrap">
        <select id="sortSelect" class="research-sort-select">
          <option value="newest">Newest First</option>
          <option value="oldest">Oldest First</option>
          <option value="az">Title (A-Z)</option>
        </select>
        <i class="fas fa-chevron-down research-select-arrow"></i>
      </div>
    </div>

    <!-- Active Filters (Hidden by default) -->
    <div id="activeFilters" class="active-filter-badge-wrap hidden">
      <span class="text-sm text-text-secondary">Filtered by tag:</span>
      <span id="filterTagBadge" class="active-filter-badge">
        <span id="filterTagText">Tag Name</span>
        <button id="clearFilterBtn" class="clear-filter-btn" aria-label="Clear Filter"><i class="fas fa-times"></i></button>
      </span>
    </div>

    <!-- Journal Entries Grid -->
    <div id="journalEntriesContainer" class="research-grid two-cols">
      <!-- Content injected by JournalEngine -->
    </div>

    <!-- Pagination Controls -->
    <div id="paginationControls" class="pagination-wrap hidden">
      <!-- Injected by JournalEngine -->
    </div>
  </div>
</main>

<!-- Modal for Full Entry Reader -->
<div id="entryModal" class="research-modal hidden" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal-panel reader-modal-panel" id="modalPanel">

    <!-- Reading Progress Bar -->
    <div class="modal-progress-container">
      <div class="modal-progress-bar" id="modalReadingProgressBar"></div>
    </div>

    <!-- Modal Header -->
    <div class="modal-header">
      <div class="modal-header-info">
        <div class="modal-header-topline">
          <span class="modal-badge-journal"><i class="fas fa-feather-alt mr-1"></i> Dysgraphia Studies & Motor Skills</span>
          <span id="modalReadingTime" class="modal-read-time-pill"><i class="far fa-clock mr-1"></i> Estimating...</span>
        </div>
        <h2 class="modal-header-title" id="modalTitle">Loading Paper...</h2>
        <div class="modal-meta-row">
          <span class="modal-meta-item"><i class="fas fa-user-circle"></i> <span id="modalAuthor"></span></span>
          <span class="modal-meta-item"><i class="far fa-calendar-alt"></i> <span id="modalDate"></span></span>
        </div>
      </div>

      <div class="modal-header-actions">
        <!-- Accessibility / Typography Toolbar -->
        <div class="reader-toolbar">
          <button id="dyslexiaFontToggleBtn" class="reader-tool-btn" title="Toggle Dyslexia-Friendly Font" aria-label="Dyslexia Font">
            <span class="font-bold">Dys</span>
          </button>
          
          <div class="font-size-stepper">
            <button id="fontSizeDecreaseBtn" class="reader-tool-btn" title="Decrease Font Size" aria-label="Smaller Text">A-</button>
            <button id="fontSizeResetBtn" class="reader-tool-btn" title="Reset Font Size" aria-label="Reset Text Size">A</button>
            <button id="fontSizeIncreaseBtn" class="reader-tool-btn" title="Increase Font Size" aria-label="Larger Text">A+</button>
          </div>

          <!-- Table of Contents Trigger -->
          <div class="relative" id="modalTOCWrapper">
            <button id="tocToggleBtn" class="reader-tool-btn" title="Table of Contents" aria-label="Table of Contents">
              <i class="fas fa-list-ul"></i>
            </button>
            <div id="modalTOCDropdown" class="modal-toc-dropdown hidden">
              <div class="toc-header">
                <span class="font-bold text-xs uppercase tracking-wider text-text-muted">Table of Contents</span>
              </div>
              <div id="modalTOCList" class="toc-list"></div>
            </div>
          </div>
        </div>

        <button id="expandModalBtn" class="reader-tool-btn" title="Toggle Fullscreen" aria-label="Toggle Fullscreen">
          <i class="fas fa-expand"></i>
        </button>

        <button id="closeModalBtn" class="close-modal-btn" aria-label="Close Reader">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
    </div>

    <!-- Modal Body -->
    <div id="modalContentArea" class="modal-body reader-body">
      <!-- Tags in Modal -->
      <div id="modalTags" class="flex flex-wrap gap-2"></div>

      <!-- Summary / Abstract Callout -->
      <div class="abstract-callout-box">
        <h3 class="abstract-callout-title"><i class="fas fa-info-circle mr-1"></i> Abstract</h3>
        <p id="modalSummary" class="abstract-callout-text"></p>
      </div>

      <!-- Full Markdown Paper Content -->
      <div class="prose research-paper-prose max-w-none">
        <div id="modalFullContent" class="paper-markdown-body space-y-4 leading-relaxed"></div>
      </div>
    </div>

    <!-- Modal Footer (Actions) -->
    <div class="modal-footer">
      <!-- Navigation within Modal -->
      <div class="modal-footer-nav">
        <button id="prevEntryBtn" class="btn-research btn-research-secondary">
          <i class="fas fa-arrow-left"></i> Previous
        </button>
        <button id="nextEntryBtn" class="btn-research btn-research-secondary">
          Next <i class="fas fa-arrow-right"></i>
        </button>
      </div>

      <!-- Export & TTS Tools -->
      <div class="modal-footer-tools">
        <!-- TTS Listen -->
        <div class="tts-cluster">
          <button id="ttsBtn" class="btn-research btn-research-secondary" title="Listen to this paper">
            <i class="fas fa-volume-up"></i> <span id="ttsBtnText">Listen</span>
          </button>
          <select id="ttsRateSelect" class="tts-speed-select" title="Voice Speed">
            <option value="0.8">0.8x</option>
            <option value="1.0" selected>1.0x</option>
            <option value="1.25">1.25x</option>
          </select>
        </div>

        <button id="citeModalBtn" class="btn-research btn-research-secondary" title="Cite this Paper">
          <i class="fas fa-quote-right"></i> <span>Cite</span>
        </button>

        <button id="shareBtn" class="btn-research btn-research-secondary" title="Copy Direct Link">
          <i class="fas fa-link"></i> <span>Share</span>
        </button>

        <div class="export-dropdown-wrap">
          <button id="pdfBtn" class="btn-research btn-research-secondary" title="Export as PDF">PDF</button>
          <button id="htmlBtn" class="btn-research btn-research-secondary" title="Export as HTML">HTML</button>
          <button id="txtBtn" class="btn-research btn-research-secondary" title="Export as Plain Text">TXT</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Citation Modal -->
<div id="citationModal" class="research-modal hidden" role="dialog" aria-modal="true" aria-labelledby="citationModalTitle">
  <div class="modal-panel max-w-lg">
    <div class="modal-header">
      <h3 class="modal-header-title text-xl" id="citationModalTitle">
        <i class="fas fa-quote-left text-primary mr-2"></i> Cite this Paper
      </h3>
      <button id="closeCitationBtn" class="close-modal-btn" aria-label="Close Citation Modal">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="modal-body space-y-4">
      <div class="citation-tabs flex gap-2 border-b border-border pb-2">
        <button class="citation-tab-btn active" data-format="apa">APA 7th</button>
        <button class="citation-tab-btn" data-format="mla">MLA 9th</button>
        <button class="citation-tab-btn" data-format="bibtex">BibTeX</button>
      </div>

      <div class="citation-content-box">
        <div id="citationApa" class="citation-code-block font-mono text-xs select-all" data-format="apa"></div>
        <div id="citationMla" class="citation-code-block hidden font-mono text-xs select-all" data-format="mla"></div>
        <pre id="citationBibtex" class="citation-code-block hidden font-mono text-xs select-all" data-format="bibtex"></pre>
      </div>
    </div>
    <div class="modal-footer flex justify-end gap-2">
      <button id="copyCitationTextBtn" class="btn-research btn-research-primary">
        <i class="far fa-copy"></i> Copy Citation
      </button>
    </div>
  </div>
</div>

<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<!-- Application Logic -->
<script type="module">
  import { JournalEngine } from '/assets/js/research/journal-engine.js';

  const engine = new JournalEngine({
    dataUrl: '/assets/data/research/dsms-papers.json',
    journalName: 'Dysgraphia Studies & Motor Skills'
  });

  engine.init();
</script>

<?php
include '../../src/footer.php';
?>
