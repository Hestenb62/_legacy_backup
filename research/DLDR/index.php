<?php
// --- Page-Specific Variables ---
$pageTitle = 'Research Platform';
$pageDescription = 'An ongoing research journal exploring the educational journey of students with dyslexia.';
$pageKeywords = 'dyslexia, research, journal, education, classroom, phonology, reading';
$pageAuthor = 'Research Team';

// --- Include Header ---
include '../../src/header.php';
?>

<!-- Link Dedicated Research Vanilla CSS -->
<link rel="stylesheet" href="/assets/css/research-main.css">

<!-- Hero Section -->
<div class="research-hero">
  <!-- Background Animated Orbs & Icons -->
  <div class="research-hero-bg">
    <i class="fas fa-brain research-hero-icon brain"></i>
    <i class="fas fa-puzzle-piece research-hero-icon microscope"></i>
    <i class="fas fa-book-open research-hero-icon dna"></i>

    <div class="research-orb research-orb-1"></div>
    <div class="research-orb research-orb-2"></div>
    <div class="research-orb research-orb-3"></div>
  </div>

  <div class="research-hero-content">
    <span class="research-hero-badge">
      <i class="fas fa-flask"></i> Research Journal
    </span>
    <h1 class="research-hero-title">
      <span class="hero-title-shadow">Dyslexia &</span> <span class="hero-title-gradient">Learning Disabilities</span>
    </h1>
    <p class="research-hero-desc">
      Ongoing research exploring the educational journey of students with dyslexia.
    </p>
  </div>
</div>

<main class="research-container" id="main-content">
  <div class="max-w-7xl mx-auto">

    <!-- Controls Bar: Search & Sort -->
    <div class="research-controls-bar">
      <!-- Search -->
      <div class="research-search-wrap">
        <i class="fas fa-search research-search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search title, content, or tags..."
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
      <span class="text-sm text-text-secondary">Filtered by:</span>
      <span id="filterTagBadge" class="active-filter-badge">
        <span id="filterTagText">Tag Name</span>
        <button id="clearFilterBtn" class="clear-filter-btn" aria-label="Clear Filter"><i class="fas fa-times"></i></button>
      </span>
    </div>

    <!-- Journal Entries Grid -->
    <div id="journalEntriesContainer" class="research-grid two-cols">
      <!-- Content injected by JS -->
    </div>

    <!-- Pagination Controls -->
    <div id="paginationControls" class="pagination-wrap hidden">
      <!-- Injected by JS -->
    </div>
  </div>
</main>

<!-- Modal for Full Entry -->
<div id="entryModal" class="research-modal hidden" role="dialog" aria-modal="true">
  <div class="modal-panel" id="modalPanel">

    <!-- Modal Header -->
    <div class="modal-header">
      <div>
        <h3 class="modal-header-title" id="modalTitle"></h3>
        <div class="flex flex-wrap items-center gap-4 mt-3 text-sm text-gray-500 dark:text-gray-400 font-medium">
          <span class="flex items-center gap-1.5"><i class="fas fa-user-circle"></i> <span id="modalAuthor"></span></span>
          <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i> <span id="modalDate"></span></span>
        </div>
      </div>
      <button id="closeModalBtn" class="close-modal-btn" aria-label="Close Modal">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>

    <!-- Modal Body -->
    <div id="modalContentArea" class="modal-body">
      <!-- Tags in Modal -->
      <div id="modalTags" class="flex flex-wrap gap-2"></div>

      <!-- Summary Box -->
      <div class="abstract-callout-box">
        <h4 class="abstract-callout-title"><i class="fas fa-info-circle mr-1"></i> Abstract</h4>
        <p id="modalSummary" class="abstract-callout-text"></p>
      </div>

      <!-- Full Content -->
      <div class="prose dark:prose-invert max-w-none text-text-default">
        <div id="modalFullContent" class="space-y-4 leading-relaxed"></div>
      </div>
    </div>

    <!-- Modal Footer (Actions) -->
    <div class="modal-footer">

      <!-- Navigation within Modal -->
      <div class="flex items-center gap-2">
        <button id="prevEntryBtn" class="btn-research btn-research-secondary">
          <i class="fas fa-arrow-left"></i> Previous
        </button>
        <button id="nextEntryBtn" class="btn-research btn-research-secondary">
          Next <i class="fas fa-arrow-right"></i>
        </button>
      </div>

      <!-- Export & TTS Tools -->
      <div class="flex flex-wrap items-center gap-2">
        <button id="ttsBtn" class="btn-research">
          <i class="fas fa-volume-up"></i> <span id="ttsBtnText">Listen</span>
        </button>

        <div class="h-6 w-px bg-gray-300 dark:bg-gray-600 mx-2"></div>

        <button id="shareBtn" class="btn-research btn-research-secondary" title="Copy Link">
          <i class="fas fa-link"></i> <span>Copy</span>
        </button>

        <button id="pdfBtn" class="btn-research btn-research-secondary" title="Export as PDF">PDF</button>
        <button id="htmlBtn" class="btn-research btn-research-secondary" title="Export as HTML">HTML</button>
        <button id="txtBtn" class="btn-research btn-research-secondary" title="Export as Text">TXT</button>
      </div>

    </div>
  </div>
</div>


<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<!-- Application Logic -->
<script type="module">
  // --- DATA STORE ---
  let journalData = [];

  const state = {
    entries: [],
    searchQuery: '',
    filterTag: null,
    sortBy: 'newest', // newest, oldest, az
    currentPage: 1,
    itemsPerPage: 6,
    currentEntryId: null
  };

  // --- DOM ELEMENTS ---
  const container = document.getElementById('journalEntriesContainer');
  const paginationEl = document.getElementById('paginationControls');
  const searchInput = document.getElementById('searchInput');
  const sortSelect = document.getElementById('sortSelect');
  const activeFiltersWrap = document.getElementById('activeFilters');
  const filterTagText = document.getElementById('filterTagText');
  const clearFilterBtn = document.getElementById('clearFilterBtn');

  // --- INIT ---
  async function init() {
    try {
      const response = await fetch('/assets/data/research/dldr-papers.json');
      journalData = await response.json();
      setupEventListeners();
      processData();
      render();
    } catch (error) {
      console.error("Error loading journal data:", error);
      container.innerHTML = '<p class="col-span-full text-center text-red-500">Failed to load research papers.</p>';
    }
  }

  // --- CORE LOGIC ---
  function processData() {
    let filtered = [...journalData];

    // 1. Search Filter
    if (state.searchQuery) {
      const q = state.searchQuery.toLowerCase();
      filtered = filtered.filter(entry =>
        entry.title.toLowerCase().includes(q) ||
        entry.summary.toLowerCase().includes(q) ||
        entry.tags.some(t => t.toLowerCase().includes(q))
      );
    }

    // 2. Tag Filter
    if (state.filterTag) {
      filtered = filtered.filter(entry => entry.tags.includes(state.filterTag));
      activeFiltersWrap.classList.remove('hidden');
      filterTagText.textContent = state.filterTag;
    } else {
      activeFiltersWrap.classList.add('hidden');
    }

    // 3. Sort
    filtered.sort((a, b) => {
      if (state.sortBy === 'newest') return b.timestamp - a.timestamp;
      if (state.sortBy === 'oldest') return a.timestamp - b.timestamp;
      if (state.sortBy === 'az') return a.title.localeCompare(b.title);
      return 0;
    });

    state.entries = filtered;
  }

  // --- RENDER ---
  function render() {
    renderGrid();
    renderPagination();
  }

  function renderGrid() {
    if (state.entries.length === 0) {
      container.innerHTML = `<div class="col-span-full text-center py-12 text-text-secondary">
        <i class="fas fa-search text-4xl mb-4 opacity-50"></i>
        <p class="text-lg">No entries found matching your criteria.</p>
      </div>`;
      return;
    }

    const startIdx = (state.currentPage - 1) * state.itemsPerPage;
    const endIdx = startIdx + state.itemsPerPage;
    const pageEntries = state.entries.slice(startIdx, endIdx);

    container.innerHTML = pageEntries.map(entry => `
      <div class="research-card cursor-pointer" data-id="${entry.id}">
        <div class="card-body">
          <h3 class="card-title read-trigger text-xl">${entry.title}</h3>
          <div class="card-meta mt-2 mb-4">
            <span class="card-meta-item"><i class="fas fa-user-circle"></i> ${entry.author}</span>
            <span class="card-meta-item"><i class="far fa-calendar-alt"></i> ${entry.date}</span>
          </div>
          <p class="card-desc clamp-3">${entry.summary}</p>
          <div class="flex flex-wrap gap-2 mb-4">
            ${entry.tags.slice(0, 3).map(tag => `<span class="tag-chip">${tag}</span>`).join('')}
            ${entry.tags.length > 3 ? `<span class="tag-chip">+${entry.tags.length - 3}</span>` : ''}
          </div>
          <div class="card-cta-wrap mt-auto pt-4 border-t border-gray-100 dark:border-gray-800">
             <span class="card-cta-text">Read Full Entry</span>
             <div class="card-cta-icon"><i class="fas fa-arrow-right"></i></div>
          </div>
        </div>
      </div>
    `).join('');
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
    prevBtn.className = 'page-btn';
    prevBtn.onclick = () => changePage(state.currentPage - 1);
    paginationEl.appendChild(prevBtn);

    // Page Numbers
    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement('button');
      btn.textContent = i;
      btn.className = `page-btn ${i === state.currentPage ? 'active' : ''}`;
      btn.onclick = () => changePage(i);
      paginationEl.appendChild(btn);
    }

    // Next Button
    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = state.currentPage === totalPages;
    nextBtn.className = 'page-btn';
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

  function setupEventListeners() {
    searchInput.addEventListener('input', (e) => {
      state.searchQuery = e.target.value;
      state.currentPage = 1;
      processData();
      render();
    });

    sortSelect.addEventListener('change', (e) => {
      state.sortBy = e.target.value;
      processData();
      render();
    });

    if (clearFilterBtn) {
      clearFilterBtn.addEventListener('click', () => {
        state.filterTag = null;
        processData();
        render();
      });
    }

    container.addEventListener('click', (e) => {
      if (e.target.classList.contains('journal-tag')) {
        state.filterTag = e.target.dataset.tag;
        state.currentPage = 1;
        processData();
        render();
        return;
      }
      const targetEl = e.target.closest('[data-id]') || e.target.closest('.research-card');
      if (targetEl) {
        const id = targetEl.dataset.id || targetEl.getAttribute('data-id');
        if (id) {
          openEntryModal(id);
        }
      }
    });

    document.getElementById('closeModalBtn').addEventListener('click', () => showModal(false));
    document.getElementById('entryModal').addEventListener('click', (e) => {
      if (e.target === document.getElementById('entryModal')) showModal(false);
    });

    document.getElementById('prevEntryBtn').addEventListener('click', () => navigateModal(-1));
    document.getElementById('nextEntryBtn').addEventListener('click', () => navigateModal(1));

    setupDownloads();
  }

  // --- MODAL LOGIC ---
  function showModal(show = true) {
    const modal = document.getElementById('entryModal');
    if (show) {
      document.body.style.overflow = 'hidden';
      modal.classList.remove('hidden');
      modal.classList.add('active');
    } else {
      document.body.style.overflow = '';
      modal.classList.remove('active');
      modal.classList.add('hidden');
      state.currentEntryId = null;
    }
  }

  async function openEntryModal(id) {
    const entry = journalData.find(e => e.id === id);
    if (!entry) return;

    state.currentEntryId = id;

    // Content
    document.getElementById('modalTitle').textContent = entry.title;
    document.getElementById('modalAuthor').textContent = entry.author;
    document.getElementById('modalDate').textContent = entry.date;
    document.getElementById('modalSummary').textContent = entry.summary;

    // Fetch and parse Markdown content
    try {
      document.getElementById('modalFullContent').innerHTML = '<p class="text-center"><i class="fas fa-spinner fa-spin text-2xl"></i> Loading...</p>';
      const response = await fetch(entry.fileUrl);
      if (!response.ok) throw new Error("Failed to load content.");
      const mdText = await response.text();
      document.getElementById('modalFullContent').innerHTML = marked.parse(mdText);
    } catch (err) {
      document.getElementById('modalFullContent').innerHTML = '<p class="text-red-500">Error loading paper content.</p>';
    }

    // Tags
    const tagsContainer = document.getElementById('modalTags');
    tagsContainer.innerHTML = entry.tags.map(t =>
      `<span class="tag-chip interactive">${t}</span>`
    ).join('');

    updateModalNavButtons();
    showModal(true);
  }

  function navigateModal(direction) {
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
      const content = document.getElementById('modalFullContent').innerText;
      const text = `${entry.title}\nBy ${entry.author}\n\nSummary:\n${entry.summary}\n\n---\n\n${content}`;
      download(entry.title + '.txt', text, 'text/plain');
    });

    document.getElementById('htmlBtn').addEventListener('click', () => {
      const entry = getEntry();
      if (!entry) return;
      const content = document.getElementById('modalFullContent').innerHTML;
      const html = `<html><body><h1>${entry.title}</h1>${content}</body></html>`;
      download(entry.title + '.html', html, 'text/html');
    });

    document.getElementById('pdfBtn').addEventListener('click', () => {
      const entry = getEntry();
      if (!entry) return;
      const doc = new jsPDF();
      doc.setFontSize(16);
      doc.text(entry.title, 10, 10);
      doc.setFontSize(12);

      const lines = doc.splitTextToSize(entry.summary, 180);
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
    document.getElementById('closeModalBtn').addEventListener('click', stopTTS);
  }

  function toggleTTS() {
    if (isSpeaking) {
      stopTTS();
    } else {
      const entry = journalData.find(e => e.id === state.currentEntryId);
      if (!entry) return;

      const content = document.getElementById('modalFullContent').innerText;
      const textToRead = entry.title + ". " + entry.summary + ". " + content;

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

  setupTTS();
  init();
</script>

<?php
include '../../src/footer.php';
?>