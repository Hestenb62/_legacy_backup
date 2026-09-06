/**
 * Hesten's Learning - Academic Journal & Research Reader Engine
 * Reusable, accessible engine supporting deep linking, dynamic TOC,
 * dyslexia accessibility toggles, academic citations, TTS, and exports.
 */

export class JournalEngine {
  constructor(config = {}) {
    this.config = {
      dataUrl: config.dataUrl || '/assets/data/research/dldr-papers.json',
      containerId: config.containerId || 'journalEntriesContainer',
      paginationId: config.paginationId || 'paginationControls',
      searchInputId: config.searchInputId || 'searchInput',
      sortSelectId: config.sortSelectId || 'sortSelect',
      activeFiltersWrapId: config.activeFiltersWrapId || 'activeFilters',
      filterTagTextId: config.filterTagTextId || 'filterTagText',
      clearFilterBtnId: config.clearFilterBtnId || 'clearFilterBtn',
      modalId: config.modalId || 'entryModal',
      itemsPerPage: config.itemsPerPage || 6,
      journalName: config.journalName || 'Academic Journal',
      ...config
    };

    this.journalData = [];
    this.state = {
      entries: [],
      searchQuery: '',
      filterTag: null,
      sortBy: 'newest',
      currentPage: 1,
      itemsPerPage: this.config.itemsPerPage,
      currentEntryId: null,
      fontSize: 'base', // 'sm', 'base', 'lg', 'xl'
      isDyslexicFont: false,
      speechRate: 1.0,
      isSpeaking: false
    };

    this.speechUtterance = null;
  }

  async init() {
    this.container = document.getElementById(this.config.containerId);
    this.paginationEl = document.getElementById(this.config.paginationId);
    this.searchInput = document.getElementById(this.config.searchInputId);
    this.sortSelect = document.getElementById(this.config.sortSelectId);
    this.activeFiltersWrap = document.getElementById(this.config.activeFiltersWrapId);
    this.filterTagText = document.getElementById(this.config.filterTagTextId);
    this.clearFilterBtn = document.getElementById(this.config.clearFilterBtnId);
    this.modal = document.getElementById(this.config.modalId);

    if (!this.container) {
      console.warn("JournalEngine: Container element not found.");
      return;
    }

    try {
      const response = await fetch(this.config.dataUrl);
      if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
      this.journalData = await response.json();
      
      this.readUrlParams();
      this.setupEventListeners();
      this.setupKeyboardShortcuts();
      this.setupAccessibilityControls();
      this.setupScrollProgress();
      this.setupCitationModal();
      this.setupTTS();
      this.setupExports();
      this.processData();
      this.render();

      // Check if deep linked to a paper
      const urlParams = new URLSearchParams(window.location.search);
      const paperId = urlParams.get('paper');
      if (paperId) {
        this.openEntryModal(paperId, false);
      }
    } catch (error) {
      console.error("Error initializing JournalEngine:", error);
      this.container.innerHTML = `
        <div class="col-span-full text-center py-12 text-red-500">
          <i class="fas fa-exclamation-triangle text-4xl mb-4"></i>
          <p class="text-lg font-semibold">Failed to load research papers.</p>
          <p class="text-sm opacity-80 mt-1">Please refresh the page or try again later.</p>
        </div>
      `;
    }
  }

  readUrlParams() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('q')) {
      this.state.searchQuery = params.get('q');
      if (this.searchInput) this.searchInput.value = this.state.searchQuery;
    }
    if (params.get('tag')) {
      this.state.filterTag = params.get('tag');
    }
    if (params.get('sort')) {
      this.state.sortBy = params.get('sort');
      if (this.sortSelect) this.sortSelect.value = this.state.sortBy;
    }
  }

  updateUrlState(key, value) {
    const url = new URL(window.location.href);
    if (value) {
      url.searchParams.set(key, value);
    } else {
      url.searchParams.delete(key);
    }
    window.history.replaceState({}, '', url.toString());
  }

  processData() {
    let filtered = [...this.journalData];

    // 1. Search Query
    if (this.state.searchQuery) {
      const q = this.state.searchQuery.toLowerCase().trim();
      filtered = filtered.filter(entry =>
        entry.title.toLowerCase().includes(q) ||
        (entry.summary && entry.summary.toLowerCase().includes(q)) ||
        (entry.author && entry.author.toLowerCase().includes(q)) ||
        (entry.tags && entry.tags.some(t => t.toLowerCase().includes(q)))
      );
    }

    // 2. Tag Filter
    if (this.state.filterTag) {
      filtered = filtered.filter(entry => 
        entry.tags && entry.tags.some(t => t.toLowerCase() === this.state.filterTag.toLowerCase())
      );
      if (this.activeFiltersWrap) this.activeFiltersWrap.classList.remove('hidden');
      if (this.filterTagText) this.filterTagText.textContent = this.state.filterTag;
    } else {
      if (this.activeFiltersWrap) this.activeFiltersWrap.classList.add('hidden');
    }

    // 3. Sort Order
    filtered.sort((a, b) => {
      if (this.state.sortBy === 'newest') return (b.timestamp || 0) - (a.timestamp || 0);
      if (this.state.sortBy === 'oldest') return (a.timestamp || 0) - (b.timestamp || 0);
      if (this.state.sortBy === 'az') return a.title.localeCompare(b.title);
      return 0;
    });

    this.state.entries = filtered;
  }

  render() {
    this.renderGrid();
    this.renderPagination();
  }

  renderGrid() {
    if (this.state.entries.length === 0) {
      this.container.innerHTML = `
        <div class="col-span-full text-center py-16 text-text-secondary research-empty-state">
          <div class="empty-state-icon-wrap">
            <i class="fas fa-microscope text-5xl opacity-40"></i>
          </div>
          <h3 class="text-xl font-bold mt-4 mb-2">No research papers found</h3>
          <p class="max-w-md mx-auto text-sm opacity-80 mb-6">No publications matched your current filter criteria or keywords.</p>
          <button id="resetSearchFilterBtn" class="btn-research btn-research-primary">
            <i class="fas fa-sync-alt mr-2"></i> Reset Filters
          </button>
        </div>
      `;
      const resetBtn = document.getElementById('resetSearchFilterBtn');
      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.state.searchQuery = '';
          this.state.filterTag = null;
          if (this.searchInput) this.searchInput.value = '';
          this.updateUrlState('q', null);
          this.updateUrlState('tag', null);
          this.processData();
          this.render();
        });
      }
      return;
    }

    const startIdx = (this.state.currentPage - 1) * this.state.itemsPerPage;
    const endIdx = startIdx + this.state.itemsPerPage;
    const pageEntries = this.state.entries.slice(startIdx, endIdx);

    this.container.innerHTML = pageEntries.map(entry => {
      return `
        <article class="research-card cursor-pointer" data-id="${entry.id}">
          <div class="card-body">
            <div class="flex items-center justify-between gap-2 mb-3">
              <span class="research-paper-type-badge">
                <i class="fas fa-file-alt mr-1.5"></i> Academic Paper
              </span>
              <span class="text-xs font-semibold text-text-muted flex items-center gap-1">
                <i class="far fa-calendar-alt"></i> ${entry.date}
              </span>
            </div>
            
            <h3 class="card-title read-trigger text-xl font-bold mb-2 hover:text-primary transition-colors">
              ${entry.title}
            </h3>

            <div class="card-meta mb-3">
              <span class="card-meta-item">
                <i class="fas fa-user-circle"></i> ${entry.author}
              </span>
            </div>

            <p class="card-desc clamp-3 mb-4 text-sm leading-relaxed">
              ${entry.summary || ''}
            </p>

            <div class="flex flex-wrap gap-1.5 mb-4">
              ${(entry.tags || []).slice(0, 3).map(tag => 
                `<span class="tag-chip journal-tag" data-tag="${tag}">${tag}</span>`
              ).join('')}
              ${(entry.tags || []).length > 3 ? `<span class="tag-chip font-medium">+${entry.tags.length - 3}</span>` : ''}
            </div>

            <div class="card-cta-wrap mt-auto pt-4 border-t border-border/40 flex items-center justify-between">
              <span class="card-cta-text font-semibold text-sm">Read Full Paper</span>
              <div class="card-cta-icon">
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
          </div>
        </article>
      `;
    }).join('');
  }

  renderPagination() {
    if (!this.paginationEl) return;
    const totalPages = Math.ceil(this.state.entries.length / this.state.itemsPerPage);
    if (totalPages <= 1) {
      this.paginationEl.classList.add('hidden');
      return;
    }

    this.paginationEl.classList.remove('hidden');
    this.paginationEl.innerHTML = '';

    // Prev Button
    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
    prevBtn.disabled = this.state.currentPage === 1;
    prevBtn.className = 'page-btn';
    prevBtn.setAttribute('aria-label', 'Previous Page');
    prevBtn.onclick = () => this.changePage(this.state.currentPage - 1);
    this.paginationEl.appendChild(prevBtn);

    // Page Numbers
    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement('button');
      btn.textContent = i;
      btn.className = `page-btn ${i === this.state.currentPage ? 'active' : ''}`;
      btn.setAttribute('aria-label', `Page ${i}`);
      btn.onclick = () => this.changePage(i);
      this.paginationEl.appendChild(btn);
    }

    // Next Button
    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = this.state.currentPage === totalPages;
    nextBtn.className = 'page-btn';
    nextBtn.setAttribute('aria-label', 'Next Page');
    nextBtn.onclick = () => this.changePage(this.state.currentPage + 1);
    this.paginationEl.appendChild(nextBtn);
  }

  changePage(pageNum) {
    this.state.currentPage = pageNum;
    this.render();
    if (this.container) {
      this.container.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }

  setupEventListeners() {
    if (this.searchInput) {
      this.searchInput.addEventListener('input', (e) => {
        this.state.searchQuery = e.target.value;
        this.state.currentPage = 1;
        this.updateUrlState('q', this.state.searchQuery || null);
        this.processData();
        this.render();
      });
    }

    if (this.sortSelect) {
      this.sortSelect.addEventListener('change', (e) => {
        this.state.sortBy = e.target.value;
        this.updateUrlState('sort', this.state.sortBy);
        this.processData();
        this.render();
      });
    }

    if (this.clearFilterBtn) {
      this.clearFilterBtn.addEventListener('click', () => {
        this.state.filterTag = null;
        this.updateUrlState('tag', null);
        this.processData();
        this.render();
      });
    }

    this.container.addEventListener('click', (e) => {
      const tagEl = e.target.closest('.journal-tag');
      if (tagEl) {
        e.stopPropagation();
        this.state.filterTag = tagEl.dataset.tag;
        this.state.currentPage = 1;
        this.updateUrlState('tag', this.state.filterTag);
        this.processData();
        this.render();
        return;
      }

      const cardEl = e.target.closest('[data-id]');
      if (cardEl) {
        const id = cardEl.dataset.id;
        if (id) {
          this.openEntryModal(id);
        }
      }
    });

    const expandModalBtn = document.getElementById('expandModalBtn');
    if (expandModalBtn) {
      expandModalBtn.addEventListener('click', () => this.toggleFullscreen());
    }

    const closeModalBtn = document.getElementById('closeModalBtn');
    if (closeModalBtn) {
      closeModalBtn.addEventListener('click', () => this.showModal(false));
    }

    if (this.modal) {
      this.modal.addEventListener('click', (e) => {
        if (e.target === this.modal) this.showModal(false);
      });
    }

    const prevEntryBtn = document.getElementById('prevEntryBtn');
    const nextEntryBtn = document.getElementById('nextEntryBtn');
    if (prevEntryBtn) prevEntryBtn.addEventListener('click', () => this.navigateModal(-1));
    if (nextEntryBtn) nextEntryBtn.addEventListener('click', () => this.navigateModal(1));
  }

  setupKeyboardShortcuts() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        if (this.modal && this.modal.classList.contains('active')) {
          this.showModal(false);
        }
        const citationModal = document.getElementById('citationModal');
        if (citationModal && citationModal.classList.contains('active')) {
          citationModal.classList.remove('active');
        }
      } else if (e.key === '/' && document.activeElement !== this.searchInput && !this.isModalOpen()) {
        e.preventDefault();
        if (this.searchInput) this.searchInput.focus();
      } else if (this.isModalOpen()) {
        if ((e.key === 'f' || e.key === 'F') && !['input', 'textarea'].includes(document.activeElement.tagName.toLowerCase())) {
          e.preventDefault();
          this.toggleFullscreen();
        } else if (e.key === 'ArrowLeft' && !['input', 'textarea'].includes(document.activeElement.tagName.toLowerCase())) {
          this.navigateModal(-1);
        } else if (e.key === 'ArrowRight' && !['input', 'textarea'].includes(document.activeElement.tagName.toLowerCase())) {
          this.navigateModal(1);
        }
      }
    });
  }

  toggleFullscreen() {
    if (!this.modal) return;
    const isFull = this.modal.classList.toggle('fullscreen-mode');
    const modalPanel = document.getElementById('modalPanel');
    if (modalPanel) modalPanel.classList.toggle('fullscreen-active', isFull);
    const expandModalBtn = document.getElementById('expandModalBtn');
    if (expandModalBtn) {
      expandModalBtn.innerHTML = isFull ? '<i class="fas fa-compress"></i>' : '<i class="fas fa-expand"></i>';
      expandModalBtn.classList.toggle('active', isFull);
      expandModalBtn.title = isFull ? 'Exit Fullscreen (F)' : 'Toggle Fullscreen (F)';
    }
  }

  isModalOpen() {
    return this.modal && this.modal.classList.contains('active');
  }

  showModal(show = true) {
    if (!this.modal) return;
    if (show) {
      document.body.style.overflow = 'hidden';
      this.modal.classList.remove('hidden');
      this.modal.classList.add('active');
    } else {
      this.stopTTS();
      document.body.style.overflow = '';
      this.modal.classList.remove('active');
      this.modal.classList.add('hidden');
      this.modal.classList.remove('fullscreen-mode');
      const modalPanel = document.getElementById('modalPanel');
      if (modalPanel) modalPanel.classList.remove('fullscreen-active');
      const expandModalBtn = document.getElementById('expandModalBtn');
      if (expandModalBtn) {
        expandModalBtn.innerHTML = '<i class="fas fa-expand"></i>';
        expandModalBtn.classList.remove('active');
        expandModalBtn.title = 'Toggle Fullscreen (F)';
      }
      this.state.currentEntryId = null;
      this.updateUrlState('paper', null);
      // Reset scroll
      const modalContentArea = document.getElementById('modalContentArea');
      if (modalContentArea) modalContentArea.scrollTop = 0;
    }
  }

  async openEntryModal(id, pushUrl = true) {
    const entry = this.journalData.find(e => e.id === id);
    if (!entry) return;

    this.state.currentEntryId = id;
    if (pushUrl) {
      this.updateUrlState('paper', id);
    }

    const titleEl = document.getElementById('modalTitle');
    const authorEl = document.getElementById('modalAuthor');
    const dateEl = document.getElementById('modalDate');
    const summaryEl = document.getElementById('modalSummary');
    const fullContentEl = document.getElementById('modalFullContent');
    const readingTimeEl = document.getElementById('modalReadingTime');

    if (titleEl) titleEl.textContent = entry.title;
    if (authorEl) authorEl.textContent = entry.author;
    if (dateEl) dateEl.textContent = entry.date;
    if (summaryEl) summaryEl.textContent = entry.summary || '';

    // Tags
    const tagsContainer = document.getElementById('modalTags');
    if (tagsContainer) {
      tagsContainer.innerHTML = (entry.tags || []).map(t =>
        `<button class="tag-chip interactive journal-tag" data-tag="${t}">${t}</button>`
      ).join('');

      tagsContainer.querySelectorAll('.journal-tag').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          this.state.filterTag = btn.dataset.tag;
          this.updateUrlState('tag', this.state.filterTag);
          this.showModal(false);
          this.processData();
          this.render();
        });
      });
    }

    // Fetch Markdown Content
    if (fullContentEl) {
      fullContentEl.innerHTML = `
        <div class="text-center py-12 text-primary">
          <i class="fas fa-circle-notch fa-spin text-3xl mb-3"></i>
          <p class="font-medium text-text-secondary">Loading academic paper...</p>
        </div>
      `;

      try {
        const response = await fetch(entry.fileUrl);
        if (!response.ok) throw new Error(`Could not fetch file: ${response.status}`);
        const mdText = await response.text();

        // Calculate Reading Time (~200 words per minute)
        const wordCount = mdText.trim().split(/\s+/).length;
        const readMinutes = Math.max(1, Math.ceil(wordCount / 200));
        if (readingTimeEl) {
          readingTimeEl.innerHTML = `<i class="far fa-clock mr-1"></i> ${readMinutes} min read (${wordCount.toLocaleString()} words)`;
        }

        // Configure Marked
        if (window.marked) {
          marked.setOptions({
            gfm: true,
            breaks: true,
            headerIds: true
          });
          fullContentEl.innerHTML = marked.parse(mdText);
          this.generateTableOfContents(fullContentEl);
          
          // Re-render MathJax if present
          if (window.MathJax && window.MathJax.typesetPromise) {
            window.MathJax.typesetPromise([fullContentEl]).catch(err => console.debug("MathJax render:", err));
          }
        } else {
          fullContentEl.innerHTML = `<pre class="whitespace-pre-wrap">${mdText}</pre>`;
        }
      } catch (err) {
        console.error("Error rendering paper:", err);
        fullContentEl.innerHTML = `
          <div class="text-center py-8 text-red-500 bg-red-50 dark:bg-red-950/20 rounded-xl p-4 border border-red-200 dark:border-red-900">
            <i class="fas fa-file-excel text-3xl mb-2"></i>
            <p class="font-semibold">Unable to load the manuscript file.</p>
            <p class="text-xs mt-1 text-text-muted">Target: ${entry.fileUrl}</p>
          </div>
        `;
      }
    }

    this.updateModalNavButtons();
    this.showModal(true);
  }

  generateTableOfContents(contentEl) {
    const tocContainer = document.getElementById('modalTOCList');
    const tocWrapper = document.getElementById('modalTOCWrapper');
    if (!tocContainer || !tocWrapper) return;

    const headings = contentEl.querySelectorAll('h2, h3');
    if (headings.length < 2) {
      tocWrapper.classList.add('hidden');
      return;
    }

    tocWrapper.classList.remove('hidden');
    tocContainer.innerHTML = '';

    headings.forEach((heading, idx) => {
      // Ensure heading has an ID
      if (!heading.id) {
        heading.id = 'heading-' + idx + '-' + heading.textContent.toLowerCase().replace(/[^a-z0-9]+/g, '-');
      }

      const isSub = heading.tagName.toLowerCase() === 'h3';
      const a = document.createElement('a');
      a.href = '#' + heading.id;
      a.className = `toc-item ${isSub ? 'toc-sub-item' : ''}`;
      a.textContent = heading.textContent;
      a.addEventListener('click', (e) => {
        e.preventDefault();
        heading.scrollIntoView({ behavior: 'smooth', block: 'start' });
        // Auto-close TOC dropdown if on mobile
        const dropdown = document.getElementById('modalTOCDropdown');
        if (dropdown) dropdown.classList.add('hidden');
      });

      tocContainer.appendChild(a);
    });
  }

  navigateModal(direction) {
    const currentIndex = this.state.entries.findIndex(e => e.id === this.state.currentEntryId);
    if (currentIndex === -1) return;

    const newIndex = currentIndex + direction;
    if (newIndex >= 0 && newIndex < this.state.entries.length) {
      this.openEntryModal(this.state.entries[newIndex].id);
    }
  }

  updateModalNavButtons() {
    const currentIndex = this.state.entries.findIndex(e => e.id === this.state.currentEntryId);
    const prevBtn = document.getElementById('prevEntryBtn');
    const nextBtn = document.getElementById('nextEntryBtn');

    if (prevBtn) prevBtn.disabled = currentIndex <= 0;
    if (nextBtn) nextBtn.disabled = currentIndex >= this.state.entries.length - 1;
  }

  setupAccessibilityControls() {
    // Dyslexia Font Toggle
    const dyslexiaToggleBtn = document.getElementById('dyslexiaFontToggleBtn');
    const modalContent = document.getElementById('modalContentArea');
    if (dyslexiaToggleBtn && modalContent) {
      dyslexiaToggleBtn.addEventListener('click', () => {
        this.state.isDyslexicFont = !this.state.isDyslexicFont;
        modalContent.classList.toggle('opendyslexic-active', this.state.isDyslexicFont);
        dyslexiaToggleBtn.classList.toggle('active', this.state.isDyslexicFont);
      });
    }

    // Font Size Adjustments
    const fontSizeDecreaseBtn = document.getElementById('fontSizeDecreaseBtn');
    const fontSizeIncreaseBtn = document.getElementById('fontSizeIncreaseBtn');
    const fontSizeResetBtn = document.getElementById('fontSizeResetBtn');
    const sizes = ['sm', 'base', 'lg', 'xl'];

    const applyFontSize = (size) => {
      this.state.fontSize = size;
      if (modalContent) {
        modalContent.classList.remove('reader-size-sm', 'reader-size-base', 'reader-size-lg', 'reader-size-xl');
        modalContent.classList.add(`reader-size-${size}`);
      }
    };

    if (fontSizeDecreaseBtn) {
      fontSizeDecreaseBtn.addEventListener('click', () => {
        const curIdx = sizes.indexOf(this.state.fontSize);
        if (curIdx > 0) applyFontSize(sizes[curIdx - 1]);
      });
    }

    if (fontSizeIncreaseBtn) {
      fontSizeIncreaseBtn.addEventListener('click', () => {
        const curIdx = sizes.indexOf(this.state.fontSize);
        if (curIdx < sizes.length - 1) applyFontSize(sizes[curIdx + 1]);
      });
    }

    if (fontSizeResetBtn) {
      fontSizeResetBtn.addEventListener('click', () => applyFontSize('base'));
    }

    // TOC Toggle Dropdown
    const tocToggleBtn = document.getElementById('tocToggleBtn');
    const tocDropdown = document.getElementById('modalTOCDropdown');
    if (tocToggleBtn && tocDropdown) {
      tocToggleBtn.addEventListener('click', () => {
        tocDropdown.classList.toggle('hidden');
      });
    }
  }

  setupScrollProgress() {
    const modalContentArea = document.getElementById('modalContentArea');
    const progressBar = document.getElementById('modalReadingProgressBar');
    if (!modalContentArea || !progressBar) return;

    modalContentArea.addEventListener('scroll', () => {
      const scrollTop = modalContentArea.scrollTop;
      const scrollHeight = modalContentArea.scrollHeight - modalContentArea.clientHeight;
      const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
      progressBar.style.width = `${progress}%`;
    });
  }

  setupCitationModal() {
    const citeBtn = document.getElementById('citeModalBtn');
    const citationModal = document.getElementById('citationModal');
    const closeCitationBtn = document.getElementById('closeCitationBtn');

    if (citeBtn && citationModal) {
      citeBtn.addEventListener('click', () => {
        const entry = this.journalData.find(e => e.id === this.state.currentEntryId);
        if (!entry) return;

        this.generateCitations(entry);
        citationModal.classList.remove('hidden');
        citationModal.classList.add('active');
      });
    }

    if (closeCitationBtn && citationModal) {
      closeCitationBtn.addEventListener('click', () => {
        citationModal.classList.remove('active');
        citationModal.classList.add('hidden');
      });
    }

    // Tab switching in citation modal
    const tabs = document.querySelectorAll('.citation-tab-btn');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const format = tab.dataset.format;
        document.querySelectorAll('.citation-code-block').forEach(b => {
          b.classList.toggle('hidden', b.dataset.format !== format);
        });
      });
    });

    // Copy Citation Button
    const copyCitationBtn = document.getElementById('copyCitationTextBtn');
    if (copyCitationBtn) {
      copyCitationBtn.addEventListener('click', () => {
        const activeBlock = document.querySelector('.citation-code-block:not(.hidden)');
        if (!activeBlock) return;
        navigator.clipboard.writeText(activeBlock.innerText).then(() => {
          copyCitationBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
          setTimeout(() => {
            copyCitationBtn.innerHTML = '<i class="far fa-copy"></i> Copy Citation';
          }, 2000);
        });
      });
    }
  }

  generateCitations(entry) {
    const year = entry.date ? entry.date.match(/\d{4}/)?.[0] || '2026' : '2026';
    const authors = entry.author || 'Research Team';
    const title = entry.title;
    const journal = this.config.journalName;
    const currentUrl = window.location.origin + window.location.pathname + '?paper=' + entry.id;

    // APA 7th
    const apa = `${authors}. (${year}). ${title}. ${journal}. Retrieved from ${currentUrl}`;
    const apaEl = document.getElementById('citationApa');
    if (apaEl) apaEl.textContent = apa;

    // MLA 9th
    const mla = `${authors}. "${title}." ${journal}, ${year}, ${currentUrl}.`;
    const mlaEl = document.getElementById('citationMla');
    if (mlaEl) mlaEl.textContent = mla;

    // BibTeX
    const bibtexKey = entry.id.replace(/[^a-zA-Z0-9]/g, '');
    const bibtex = `@article{${bibtexKey}${year},
  author = {${authors}},
  title = {${title}},
  journal = {${journal}},
  year = {${year}},
  url = {${currentUrl}}
}`;
    const bibtexEl = document.getElementById('citationBibtex');
    if (bibtexEl) bibtexEl.textContent = bibtex;
  }

  setupExports() {
    const getEntry = () => this.journalData.find(e => e.id === this.state.currentEntryId);

    // Share / Copy Link
    const shareBtn = document.getElementById('shareBtn');
    if (shareBtn) {
      shareBtn.addEventListener('click', () => {
        const entry = getEntry();
        if (!entry) return;

        const shareUrl = window.location.origin + window.location.pathname + '?paper=' + entry.id;
        navigator.clipboard.writeText(shareUrl).then(() => {
          const icon = shareBtn.querySelector('i');
          const span = shareBtn.querySelector('span');
          const origIcon = icon ? icon.className : '';
          const origText = span ? span.textContent : '';

          if (icon) icon.className = 'fas fa-check text-green-500';
          if (span) span.textContent = 'Copied!';

          setTimeout(() => {
            if (icon) icon.className = origIcon;
            if (span) span.textContent = origText;
          }, 2000);
        });
      });
    }

    // TXT Export
    const txtBtn = document.getElementById('txtBtn');
    if (txtBtn) {
      txtBtn.addEventListener('click', () => {
        const entry = getEntry();
        if (!entry) return;
        const content = document.getElementById('modalFullContent')?.innerText || '';
        const text = `${entry.title}\nBy ${entry.author}\nDate: ${entry.date}\nJournal: ${this.config.journalName}\n\nAbstract:\n${entry.summary}\n\n=========================================\n\n${content}`;
        this.download(entry.title + '.txt', text, 'text/plain');
      });
    }

    // HTML Export
    const htmlBtn = document.getElementById('htmlBtn');
    if (htmlBtn) {
      htmlBtn.addEventListener('click', () => {
        const entry = getEntry();
        if (!entry) return;
        const content = document.getElementById('modalFullContent')?.innerHTML || '';
        const html = `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>${entry.title}</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; line-height: 1.6; max-width: 800px; margin: 40px auto; padding: 20px; color: #1f2937; }
    h1, h2, h3 { color: #111827; }
    .meta { color: #6b7280; font-size: 0.95rem; margin-bottom: 2rem; }
    .abstract { background: #f3f4f6; padding: 1.5rem; border-left: 4px solid #4f46e5; border-radius: 4px; margin-bottom: 2rem; font-style: italic; }
    table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
    th, td { border: 1px solid #d1d5db; padding: 8px 12px; text-align: left; }
    th { background: #f9fafb; font-weight: 600; }
  </style>
</head>
<body>
  <h1>${entry.title}</h1>
  <div class="meta">By <strong>${entry.author}</strong> | Published: ${entry.date} | ${this.config.journalName}</div>
  <div class="abstract"><strong>Abstract:</strong> ${entry.summary}</div>
  <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 2rem 0;">
  <div>${content}</div>
</body>
</html>`;
        this.download(entry.title + '.html', html, 'text/html');
      });
    }

    // PDF Export
    const pdfBtn = document.getElementById('pdfBtn');
    if (pdfBtn) {
      pdfBtn.addEventListener('click', () => {
        const entry = getEntry();
        if (!entry) return;

        if (window.jspdf && window.jspdf.jsPDF) {
          const doc = new window.jspdf.jsPDF();
          doc.setFontSize(16);
          doc.text(entry.title, 14, 18, { maxWidth: 180 });
          doc.setFontSize(10);
          doc.setTextColor(100, 100, 100);
          doc.text(`By ${entry.author} | ${entry.date} | ${this.config.journalName}`, 14, 30);
          doc.setFontSize(11);
          doc.setTextColor(30, 30, 30);
          
          doc.setFont("Helvetica", "bold");
          doc.text("Abstract:", 14, 40);
          doc.setFont("Helvetica", "italic");
          const absLines = doc.splitTextToSize(entry.summary || '', 180);
          doc.text(absLines, 14, 46);

          const startY = 46 + (absLines.length * 5) + 6;
          doc.setFont("Helvetica", "normal");
          const content = document.getElementById('modalFullContent')?.innerText || '';
          const contentLines = doc.splitTextToSize(content, 180);
          doc.text(contentLines.slice(0, 100), 14, startY); // First page chunk

          doc.save(entry.title.replace(/[^a-zA-Z0-9]/g, '_') + '.pdf');
        } else {
          // Fallback to print dialogue
          window.print();
        }
      });
    }
  }

  download(filename, content, mime) {
    const element = document.createElement('a');
    const file = new Blob([content], { type: mime });
    element.href = URL.createObjectURL(file);
    element.download = filename;
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
  }

  // --- TTS LOGIC ---
  setupTTS() {
    const ttsBtn = document.getElementById('ttsBtn');
    const ttsRateSelect = document.getElementById('ttsRateSelect');

    if (ttsBtn) {
      ttsBtn.addEventListener('click', () => this.toggleTTS());
    }

    if (ttsRateSelect) {
      ttsRateSelect.addEventListener('change', (e) => {
        this.state.speechRate = parseFloat(e.target.value) || 1.0;
        if (this.state.isSpeaking) {
          this.stopTTS();
          this.toggleTTS();
        }
      });
    }
  }

  toggleTTS() {
    if (this.state.isSpeaking) {
      this.stopTTS();
    } else {
      const entry = this.journalData.find(e => e.id === this.state.currentEntryId);
      if (!entry) return;

      const content = document.getElementById('modalFullContent')?.innerText || '';
      const textToRead = `${entry.title}. By ${entry.author}. Abstract: ${entry.summary}. ${content}`;

      if (!('speechSynthesis' in window)) {
        alert("Speech synthesis is not supported in this browser.");
        return;
      }

      window.speechSynthesis.cancel();
      this.speechUtterance = new SpeechSynthesisUtterance(textToRead);
      this.speechUtterance.rate = this.state.speechRate;

      this.speechUtterance.onend = () => {
        this.state.isSpeaking = false;
        this.updateTTSUI(false);
      };

      this.speechUtterance.onerror = () => {
        this.state.isSpeaking = false;
        this.updateTTSUI(false);
      };

      window.speechSynthesis.speak(this.speechUtterance);
      this.state.isSpeaking = true;
      this.updateTTSUI(true);
    }
  }

  stopTTS() {
    if ('speechSynthesis' in window) {
      window.speechSynthesis.cancel();
    }
    this.state.isSpeaking = false;
    this.updateTTSUI(false);
  }

  updateTTSUI(speaking) {
    const ttsBtn = document.getElementById('ttsBtn');
    const ttsBtnText = document.getElementById('ttsBtnText');
    if (!ttsBtn) return;

    if (speaking) {
      ttsBtn.classList.add('bg-red-500', 'text-white', 'hover:bg-red-600');
      ttsBtn.classList.remove('btn-research-secondary');
      ttsBtn.innerHTML = '<i class="fas fa-stop"></i> <span>Stop</span>';
    } else {
      ttsBtn.classList.remove('bg-red-500', 'text-white', 'hover:bg-red-600');
      ttsBtn.classList.add('btn-research-secondary');
      ttsBtn.innerHTML = '<i class="fas fa-volume-up"></i> <span id="ttsBtnText">Listen</span>';
    }
  }
}
