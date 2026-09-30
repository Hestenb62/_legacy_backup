/**
 * assets/js/scratchpad-studio.js
 * Unified Super Scratchpad & Whiteboard Studio Engine
 * - Multi-page Notebook Manager with local persistence & cross-tab sync
 * - Dual-Mode Editor & Interactive HTML5 Drawing Whiteboard Canvas
 * - Undo/Redo history, Geometric Shapes, & Mathematical Grid Paper
 * - Formula Quick-Insert Palette with Universal MathJax Live Typesetting
 * - Side-by-Side Docked Split-View & Fullscreen Modes
 * - Assistive Voice Dictation (STT), Markdown/Text Export, & Clipboard Sharing
 */

(function () {
  'use strict';

  // Storage Keys
  const STORAGE_NOTEBOOK = 'hl_scratchpad_notebook';
  const STORAGE_LEGACY = 'hl_scratchpad';
  const STORAGE_NOTES = 'hl_scratchpad_notes';
  const STORAGE_DOCKED = 'hl_scratchpad_docked';
  const STORAGE_ACTIVE_NOTE = 'hl_scratchpad_active_id';

  // Default Study Templates
  const STUDY_TEMPLATES = {
    blank: "",
    cornell: `Date: ${new Date().toLocaleDateString()}\nTopic: Cornell Notes\n\n============================================================\n1. CUES & QUESTIONS (Keywords, formulas, core questions)\n------------------------------------------------------------\n- \n- \n\n============================================================\n2. NOTES & LECTURE DERIVATIONS (Main detailed notes)\n------------------------------------------------------------\n- \n- \n\n============================================================\n3. SUMMARY (A concise 3-4 sentence synthesis)\n------------------------------------------------------------\n- `,
    kwl: `Topic: K-W-L Chart\nDate: ${new Date().toLocaleDateString()}\n\n============================================================\n[K] WHAT I ALREADY KNOW\n------------------------------------------------------------\n- \n\n============================================================\n[W] WHAT I WANT TO LEARN\n------------------------------------------------------------\n- \n\n============================================================\n[L] WHAT I LEARNED (Key takeaways & answers)\n------------------------------------------------------------\n- `,
    "study-guide": `Subject: Study Guide\nExam Date: \n\n============================================================\n1. CORE CONCEPTS TO MASTER\n------------------------------------------------------------\n[ ] \n[ ] \n\n============================================================\n2. KEY DEFINITIONS & FORMULAS\n------------------------------------------------------------\n* \n* \n\n============================================================\n3. PRACTICE DERIVATIONS\n------------------------------------------------------------\nQ1. \nA1. `,
    lecture: `Course: \nLecture: \nDate: ${new Date().toLocaleDateString()}\n\n============================================================\n1. AGENDA & MAIN IDEAS\n------------------------------------------------------------\n* \n* \n\n============================================================\n2. DETAILED EXPLANATION & EXAMPLES\n------------------------------------------------------------\n* \n\n============================================================\n3. HOMEWORK & NEXT STEPS\n------------------------------------------------------------\n[ ] `,
    mla: `[Your Name]\n[Instructor's Name]\n[Course Title]\n[Date: ${new Date().toLocaleDateString()}]\n\n                      [Title of Essay]\n\n    [Start typing your MLA formatted essay here. Use 1-inch margins and double-spacing. The first line of each paragraph should be indented 0.5 inches.]\n\n\n                          Works Cited\n\n[Author Last Name, First Name. "Title of Source." Title of Container, Other contributors, Version, Number, Publisher, Publication date, Location.]`,
    apa: `                               Running Head: [SHORT TITLE IN CAPS]\n\n[Title of the Essay]\n[Your Name]\n[Institutional Affiliation]\n\n\n                             Abstract\n[Write a brief summary of your essay here, typically between 150 and 250 words. Do not indent the first line of the abstract paragraph.]\n\n\n                       [Title of the Essay]\n    [Start typing your APA formatted essay here. The first line of each paragraph should be indented 0.5 inches.]\n\n\n                            References\n\n[Author, A. A., & Author, B. B. (Year). Title of the work. Publisher. DOI or URL]`,
    chicago: `                      [Title of Essay]\n\n                            [Your Name]\n                           [Course Title]\n                         [Instructor Name]\n                      [Date: ${new Date().toLocaleDateString()}]\n\n\n    [Start typing your Chicago style essay here. Double space the main text. Footnotes should be single-spaced with a blank line between notes.]\n\n\n                          Bibliography\n\n[Author Last Name, First Name. Title of Book. Place of publication: Publisher, Year of publication.]`,
    harvard: `Title: [Title of Essay]\nAuthor: [Your Name]\nCourse: [Course Title]\nDate: ${new Date().toLocaleDateString()}\n\n    [Start typing your essay here. Paragraphs should be double-spaced with standard indentations.]\n\n\n                           Reference List\n\n[Author Last Name, Initials. (Year of publication) Title of book. Place of publication: Publisher.]`
  };

  // State Management
  let notebook = [];
  let activeNoteId = null;
  let saveDebounceTimer = null;
  let mathjaxDebounceTimer = null;

  // Canvas State
  let canvas = null;
  let ctx = null;
  let isDrawing = false;
  let currentTool = 'pen'; // 'pen', 'highlighter', 'eraser', 'line', 'arrow', 'rect', 'circle'
  let currentColor = '#2563eb';
  let currentLineWidth = 4;
  let gridType = 'grid-math'; // 'grid-math', 'grid-dots', 'grid-iso', 'grid-none'
  let startX = 0;
  let startY = 0;
  let snapshotBeforeShape = null;
  let undoStack = [];
  let redoStack = [];
  const MAX_HISTORY = 30;

  // Dictation State
  let recognition = null;
  let isDictating = false;

  // DOM Elements Cache
  let dom = {};

  function initStudio() {
    cacheDomElements();
    if (!dom.panel) return;

    loadNotebook();
    initCanvas();
    bindEvents();
    applyInitialPreferences();
    updateStats();
    renderNotebookDropdown();
    loadActiveNote();
  }

  function cacheDomElements() {
    dom = {
      panel: document.getElementById('scratchpad-panel'),
      backdrop: document.getElementById('scratchpad-backdrop-close'),
      closeBtn: document.getElementById('scratchpad-close'),
      dockBtn: document.getElementById('scratchpad-dock-btn'),
      expandBtn: document.getElementById('scratchpad-expand-btn'),
      noteSelect: document.getElementById('scratchpad-note-select'),
      newNoteBtn: document.getElementById('scratchpad-new-note-btn'),
      renameNoteBtn: document.getElementById('scratchpad-rename-note-btn'),
      deleteNoteBtn: document.getElementById('scratchpad-delete-note-btn'),
      activeNoteTitle: document.getElementById('scratchpad-active-note-title'),
      
      // Tabs
      tabNotes: document.getElementById('scratchpad-tab-notes'),
      tabWhiteboard: document.getElementById('scratchpad-tab-whiteboard'),
      tabMath: document.getElementById('scratchpad-tab-math'),
      paneNotes: document.getElementById('scratchpad-pane-notes'),
      paneWhiteboard: document.getElementById('scratchpad-pane-whiteboard'),
      paneMath: document.getElementById('scratchpad-pane-math'),

      // Notes Editor
      textarea: document.getElementById('quick-notes-area'),
      status: document.getElementById('scratchpad-status'),
      stats: document.getElementById('scratchpad-stats'),
      searchInput: document.getElementById('scratchpad-search-input'),
      searchCount: document.getElementById('scratchpad-search-count'),
      fontDecreaseBtn: document.getElementById('scratchpad-font-decrease'),
      fontIncreaseBtn: document.getElementById('scratchpad-font-increase'),
      fontSizeDisplay: document.getElementById('scratchpad-font-size-display'),

      // Whiteboard Canvas
      canvasWrap: document.getElementById('scratchpad-canvas-wrap'),
      canvas: document.getElementById('scratchpad-studio-canvas'),
      lineWidthSelect: document.getElementById('canvas-line-width'),
      toggleGridBtn: document.getElementById('canvas-toggle-grid'),
      gridNameDisplay: document.getElementById('canvas-grid-name'),
      undoBtn: document.getElementById('canvas-undo-btn'),
      redoBtn: document.getElementById('canvas-redo-btn'),
      insertNoteBtn: document.getElementById('canvas-insert-note-btn'),
      downloadCanvasBtn: document.getElementById('canvas-download-btn'),
      clearCanvasBtn: document.getElementById('canvas-clear-btn'),

      // Math Pane
      mathjaxPreview: document.getElementById('scratchpad-mathjax-preview'),
      refreshMathjaxBtn: document.getElementById('scratchpad-refresh-mathjax'),

      // Footer
      dictateBtn: document.getElementById('scratchpad-dictate-btn'),
      copyBtn: document.getElementById('scratchpad-copy-btn'),
      printBtn: document.getElementById('scratchpad-print-btn'),
      downloadMdBtn: document.getElementById('download-notes-md'),
      downloadTxtBtn: document.getElementById('download-notes'),
      clearNotesBtn: document.getElementById('clear-notes-btn')
    };
  }

  // =========================================================================
  // Notebook Data Persistence & Sync
  // =========================================================================
  function loadNotebook() {
    try {
      const stored = localStorage.getItem(STORAGE_NOTEBOOK);
      if (stored) {
        notebook = JSON.parse(stored);
      }
    } catch (e) {
      console.warn('[Scratchpad] Failed to parse notebook from localStorage:', e);
      notebook = [];
    }

    // Migration / Fallback from legacy single-note storage
    if (!Array.isArray(notebook) || notebook.length === 0) {
      const legacyContent = localStorage.getItem(STORAGE_LEGACY) || 
                            localStorage.getItem(STORAGE_NOTES) || '';
      notebook = [
        {
          id: 'note_' + Date.now(),
          title: 'General Study Notes',
          content: legacyContent || 'Welcome to your Unified Study & Math Scratchpad!\n\n- Write multi-page notes & study outlines\n- Sketch derivations on the Whiteboard canvas\n- Use LaTeX formulas with real-time MathJax rendering\n- Dock to the side of your screen while reading lessons!',
          canvasData: null,
          template: 'blank',
          createdAt: Date.now(),
          updatedAt: Date.now()
        }
      ];
      saveNotebook(false);
    }

    const savedActiveId = localStorage.getItem(STORAGE_ACTIVE_NOTE);
    const found = notebook.find(n => n.id === savedActiveId);
    activeNoteId = found ? found.id : notebook[0].id;
  }

  function saveNotebook(syncLegacy = true) {
    try {
      localStorage.setItem(STORAGE_NOTEBOOK, JSON.stringify(notebook));
      localStorage.setItem(STORAGE_ACTIVE_NOTE, activeNoteId);

      if (syncLegacy) {
        const cur = getActiveNote();
        if (cur) {
          localStorage.setItem(STORAGE_LEGACY, cur.content || '');
          localStorage.setItem(STORAGE_NOTES, cur.content || '');
        }
      }

      window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: 'hl_scratchpad' } }));
    } catch (e) {
      console.warn('[Scratchpad] Failed to save notebook to localStorage:', e);
    }
  }

  function getActiveNote() {
    return notebook.find(n => n.id === activeNoteId) || notebook[0];
  }

  function renderNotebookDropdown() {
    if (!dom.noteSelect) return;
    dom.noteSelect.innerHTML = '';
    notebook.forEach(note => {
      const opt = document.createElement('option');
      opt.value = note.id;
      opt.textContent = note.title;
      if (note.id === activeNoteId) opt.selected = true;
      dom.noteSelect.appendChild(opt);
    });

    const current = getActiveNote();
    if (dom.activeNoteTitle && current) {
      dom.activeNoteTitle.textContent = `${current.title} • Unified Notes & Whiteboard`;
    }
  }

  function loadActiveNote() {
    const cur = getActiveNote();
    if (!cur) return;

    if (dom.textarea) {
      dom.textarea.value = cur.content || '';
    }

    // Highlight active template button if matches
    document.querySelectorAll('.scratchpad-templates-list .template-btn').forEach(btn => {
      btn.classList.toggle('active', btn.dataset.template === (cur.template || 'blank'));
    });

    // Load canvas snapshot if saved
    if (cur.canvasData) {
      loadCanvasData(cur.canvasData);
    } else {
      clearCanvas(false);
    }

    updateStats();
    renderNotebookDropdown();
    scheduleMathJaxPreview();
  }

  function createNewNote(title = null, content = '') {
    const noteCount = notebook.length + 1;
    const noteTitle = title || prompt('Enter title for new note page:', `Study Note #${noteCount}`);
    if (!noteTitle || !noteTitle.trim()) return;

    // Save current canvas to active note first
    saveCurrentCanvasSnapshot();

    const newNote = {
      id: 'note_' + Date.now(),
      title: noteTitle.trim(),
      content: content || '',
      canvasData: null,
      template: 'blank',
      createdAt: Date.now(),
      updatedAt: Date.now()
    };

    notebook.push(newNote);
    activeNoteId = newNote.id;
    saveNotebook();
    loadActiveNote();

    if (window.HLSound && window.HLSound.playSuccess) window.HLSound.playSuccess();
    announceStatus(`Created and switched to note: "${newNote.title}"`);
  }

  function renameCurrentNote() {
    const cur = getActiveNote();
    if (!cur) return;
    const newTitle = prompt('Rename note page:', cur.title);
    if (!newTitle || !newTitle.trim() || newTitle.trim() === cur.title) return;

    cur.title = newTitle.trim();
    cur.updatedAt = Date.now();
    saveNotebook();
    renderNotebookDropdown();
    announceStatus(`Note renamed to "${cur.title}"`);
  }

  function deleteCurrentNote() {
    if (notebook.length <= 1) {
      alert('You must keep at least one note page in your notebook.');
      return;
    }
    const cur = getActiveNote();
    if (!cur) return;
    if (!confirm(`Are you sure you want to delete "${cur.title}"? This cannot be undone.`)) return;

    notebook = notebook.filter(n => n.id !== cur.id);
    activeNoteId = notebook[0].id;
    saveNotebook();
    loadActiveNote();
    announceStatus(`Note deleted. Active note is now "${notebook[0].title}".`);
  }

  // =========================================================================
  // Canvas Whiteboard Engine
  // =========================================================================
  function initCanvas() {
    if (!dom.canvas || !dom.canvasWrap) return;
    canvas = dom.canvas;
    ctx = canvas.getContext('2d', { willReadFrequently: true });
    resizeCanvas();
  }

  function resizeCanvas() {
    if (!canvas || !dom.canvasWrap) return;
    const rect = dom.canvasWrap.getBoundingClientRect();
    if (rect.width === 0 || rect.height === 0) return;

    const dpr = window.devicePixelRatio || 1;
    let savedImg = null;
    if (canvas.width > 0 && canvas.height > 0) {
      try {
        savedImg = ctx.getImageData(0, 0, canvas.width, canvas.height);
      } catch (e) {}
    }

    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    ctx.scale(dpr, dpr);

    if (savedImg) {
      try {
        ctx.putImageData(savedImg, 0, 0);
      } catch (e) {}
    }
  }

  function getCanvasPos(e) {
    const rect = canvas.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  }

  function pushUndoState() {
    if (!canvas) return;
    try {
      const snap = ctx.getImageData(0, 0, canvas.width, canvas.height);
      undoStack.push(snap);
      if (undoStack.length > MAX_HISTORY) undoStack.shift();
      redoStack = []; // Clear redo on new action
    } catch (e) {}
  }

  function undoCanvas() {
    if (undoStack.length === 0) return;
    try {
      const currentSnap = ctx.getImageData(0, 0, canvas.width, canvas.height);
      redoStack.push(currentSnap);
      const prevSnap = undoStack.pop();
      ctx.putImageData(prevSnap, 0, 0);
      saveCurrentCanvasSnapshot();
      if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
    } catch (e) {}
  }

  function redoCanvas() {
    if (redoStack.length === 0) return;
    try {
      const currentSnap = ctx.getImageData(0, 0, canvas.width, canvas.height);
      undoStack.push(currentSnap);
      const nextSnap = redoStack.pop();
      ctx.putImageData(nextSnap, 0, 0);
      saveCurrentCanvasSnapshot();
      if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
    } catch (e) {}
  }

  function startDrawing(e) {
    if (!canvas) return;
    isDrawing = true;
    try { canvas.setPointerCapture(e.pointerId); } catch (err) {}

    const pos = getCanvasPos(e);
    startX = pos.x;
    startY = pos.y;

    pushUndoState();

    if (['line', 'arrow', 'rect', 'circle'].includes(currentTool)) {
      try {
        snapshotBeforeShape = ctx.getImageData(0, 0, canvas.width, canvas.height);
      } catch (e) {}
    } else {
      ctx.beginPath();
      ctx.moveTo(pos.x, pos.y);
    }
  }

  function draw(e) {
    if (!isDrawing || !canvas) return;
    const pos = getCanvasPos(e);

    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';

    if (currentTool === 'pen') {
      ctx.globalCompositeOperation = 'source-over';
      ctx.strokeStyle = currentColor;
      ctx.lineWidth = currentLineWidth;
      ctx.lineTo(pos.x, pos.y);
      ctx.stroke();
    } else if (currentTool === 'highlighter') {
      ctx.globalCompositeOperation = 'source-over';
      // Semi-transparent highlighter stroke
      ctx.strokeStyle = hexToRgba(currentColor, 0.35);
      ctx.lineWidth = currentLineWidth * 3.5;
      ctx.lineTo(pos.x, pos.y);
      ctx.stroke();
    } else if (currentTool === 'eraser') {
      ctx.globalCompositeOperation = 'destination-out';
      ctx.lineWidth = currentLineWidth * 5;
      ctx.lineTo(pos.x, pos.y);
      ctx.stroke();
    } else if (['line', 'arrow', 'rect', 'circle'].includes(currentTool)) {
      // Dynamic shape preview
      if (snapshotBeforeShape) {
        ctx.putImageData(snapshotBeforeShape, 0, 0);
      }
      ctx.globalCompositeOperation = 'source-over';
      ctx.strokeStyle = currentColor;
      ctx.fillStyle = hexToRgba(currentColor, 0.15);
      ctx.lineWidth = currentLineWidth;

      if (currentTool === 'line') {
        ctx.beginPath();
        ctx.moveTo(startX, startY);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
      } else if (currentTool === 'arrow') {
        drawArrow(ctx, startX, startY, pos.x, pos.y, currentLineWidth * 3);
      } else if (currentTool === 'rect') {
        ctx.beginPath();
        const w = pos.x - startX;
        const h = pos.y - startY;
        ctx.strokeRect(startX, startY, w, h);
        ctx.fillRect(startX, startY, w, h);
      } else if (currentTool === 'circle') {
        ctx.beginPath();
        const radius = Math.hypot(pos.x - startX, pos.y - startY);
        ctx.arc(startX, startY, radius, 0, Math.PI * 2);
        ctx.stroke();
        ctx.fill();
      }
    }
  }

  function stopDrawing(e) {
    if (!isDrawing) return;
    isDrawing = false;
    ctx.closePath();
    try { canvas.releasePointerCapture(e.pointerId); } catch (err) {}
    saveCurrentCanvasSnapshot();
  }

  function drawArrow(context, fromx, fromy, tox, toy, headlen) {
    const angle = Math.atan2(toy - fromy, tox - fromx);
    context.beginPath();
    context.moveTo(fromx, fromy);
    context.lineTo(tox, toy);
    context.stroke();

    context.beginPath();
    context.moveTo(tox, toy);
    context.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
    context.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
    context.closePath();
    context.fillStyle = context.strokeStyle;
    context.fill();
  }

  function hexToRgba(hex, alpha) {
    if (hex === '#ffffff') return `rgba(255, 255, 255, ${alpha})`;
    if (hex.startsWith('#') && hex.length === 7) {
      const r = parseInt(hex.slice(1, 3), 16);
      const g = parseInt(hex.slice(3, 5), 16);
      const b = parseInt(hex.slice(5, 7), 16);
      return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    }
    return hex;
  }

  function clearCanvas(withConfirm = true) {
    if (!canvas || !ctx) return;
    if (withConfirm && !confirm('Clear entire drawing canvas for this note?')) return;
    pushUndoState();
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    saveCurrentCanvasSnapshot();
    if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
  }

  function saveCurrentCanvasSnapshot() {
    if (!canvas) return;
    const cur = getActiveNote();
    if (!cur) return;
    try {
      cur.canvasData = canvas.toDataURL('image/png');
      cur.updatedAt = Date.now();
      saveNotebook(false);
    } catch (e) {}
  }

  function loadCanvasData(dataUrl) {
    if (!canvas || !ctx || !dataUrl) return;
    const img = new Image();
    img.onload = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      const dpr = window.devicePixelRatio || 1;
      ctx.drawImage(img, 0, 0, canvas.width / dpr, canvas.height / dpr);
    };
    img.src = dataUrl;
  }

  function cycleGrid() {
    if (!dom.canvasWrap) return;
    const grids = ['grid-math', 'grid-dots', 'grid-iso', 'grid-none'];
    const names = {
      'grid-math': 'Grid: Math',
      'grid-dots': 'Grid: Dots',
      'grid-iso': 'Grid: Isometric',
      'grid-none': 'Grid: Plain'
    };

    const nextIndex = (grids.indexOf(gridType) + 1) % grids.length;
    gridType = grids[nextIndex];
    dom.canvasWrap.className = `scratchpad-canvas-wrap ${gridType}`;
    if (dom.gridNameDisplay) dom.gridNameDisplay.textContent = names[gridType];
    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
  }

  function downloadCanvasImage() {
    if (!canvas) return;
    const cur = getActiveNote();
    const link = document.createElement('a');
    link.download = `${(cur ? cur.title : 'whiteboard').toLowerCase().replace(/\s+/g, '_')}_drawing.png`;
    link.href = canvas.toDataURL('image/png');
    link.click();
    announceStatus('Whiteboard snapshot downloaded as PNG.');
  }

  function insertDrawingIntoNote() {
    if (!canvas || !dom.textarea) return;
    const cur = getActiveNote();
    const dataUrl = canvas.toDataURL('image/png');
    const imageMarkdown = `\n\n![Whiteboard Diagram - ${cur.title}](${dataUrl})\n\n`;
    dom.textarea.value += imageMarkdown;
    dom.textarea.dispatchEvent(new Event('input'));
    switchTab('notes');
    announceStatus('Inserted canvas snapshot into active note.');
  }

  // =========================================================================
  // Math & Formula Quick-Insert & Universal MathJax Preview
  // =========================================================================
  function insertLatex(latex) {
    if (!dom.textarea) return;
    const field = dom.textarea;
    const start = field.selectionStart || 0;
    const end = field.selectionEnd || 0;
    const selected = field.value.substring(start, end);
    const snippet = selected ? `$${latex.replace(/x/g, selected)}$` : `$${latex}$`;

    field.focus();
    field.setRangeText(snippet, start, end, 'end');
    field.dispatchEvent(new Event('input'));
    if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
    announceStatus(`Inserted formula: ${latex}`);
  }

  function scheduleMathJaxPreview() {
    clearTimeout(mathjaxDebounceTimer);
    mathjaxDebounceTimer = setTimeout(renderMathJaxPreview, 400);
  }

  function renderMathJaxPreview() {
    if (!dom.mathjaxPreview || !dom.textarea) return;
    const content = dom.textarea.value || '';

    // Extract all math formulas ($...$ or $$...$$ or \[...\])
    const mathRegex = /(\$\$[\s\S]+?\$\$|\$[^\$\n]+?\$|\\\[[\s\S]+?\\\]|\\\([^\n]+?\\\))/g;
    const matches = content.match(mathRegex);

    if (!matches || matches.length === 0) {
      dom.mathjaxPreview.innerHTML = `
        <div style="color: var(--color-text-muted); text-align: center; padding: 2rem;">
          <i class="fas fa-square-root-alt" style="font-size: 2rem; opacity: 0.4; margin-bottom: 0.5rem; display: block;" aria-hidden="true"></i>
          <p>No LaTeX mathematical expressions detected in your current note.</p>
          <p style="font-size: 0.85rem;">Use standard LaTeX like <code>$E = mc^2$</code>, <code>$\\frac{a}{b}$</code>, or click any formula chip from the left palette to insert!</p>
        </div>
      `;
      return;
    }

    let previewHtml = `<p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 1rem;">Detected <strong>${matches.length}</strong> mathematical expressions in active note:</p>`;
    matches.forEach((eq, index) => {
      previewHtml += `
        <div style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 0.75rem 1rem; margin-bottom: 0.75rem;">
          <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted); margin-bottom: 0.25rem;">Equation #${index + 1}</div>
          <div class="mathjax-render-target" style="font-size: 1.15rem; color: var(--color-text-main); overflow-x: auto; padding: 0.25rem 0;">${escapeHtml(eq)}</div>
        </div>
      `;
    });

    dom.mathjaxPreview.innerHTML = previewHtml;

    // Trigger universal MathJax rendering standard
    if (window.ensureMathJax) {
      window.ensureMathJax(dom.mathjaxPreview);
    } else if (window.MathJax && window.MathJax.typesetPromise) {
      window.MathJax.typesetPromise([dom.mathjaxPreview]).catch(err => {
        console.warn('[Scratchpad] MathJax typeset warning:', err);
      });
    }
  }

  function escapeHtml(str) {
    return str
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // =========================================================================
  // Tab Navigation & Window Modes
  // =========================================================================
  function switchTab(mode) {
    const tabs = [
      { id: 'notes', tab: dom.tabNotes, pane: dom.paneNotes },
      { id: 'whiteboard', tab: dom.tabWhiteboard, pane: dom.paneWhiteboard },
      { id: 'math', tab: dom.tabMath, pane: dom.paneMath }
    ];

    tabs.forEach(t => {
      const isActive = t.id === mode;
      if (t.tab) {
        t.tab.classList.toggle('active', isActive);
        t.tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
        t.tab.tabIndex = isActive ? 0 : -1;
      }
      if (t.pane) {
        t.pane.classList.toggle('active', isActive);
        t.pane.hidden = !isActive;
        if (isActive) t.pane.style.display = (mode === 'math' ? 'block' : 'flex');
        else t.pane.style.display = 'none';
      }
    });

    if (mode === 'whiteboard') {
      setTimeout(resizeCanvas, 100);
    } else if (mode === 'math') {
      renderMathJaxPreview();
    }

    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
  }

  function toggleDockMode() {
    if (!dom.panel) return;
    const isDocked = dom.panel.classList.toggle('is-docked');
    dom.panel.classList.remove('is-fullscreen');
    if (dom.dockBtn) dom.dockBtn.classList.toggle('active', isDocked);
    if (dom.expandBtn) dom.expandBtn.classList.remove('active');

    try {
      localStorage.setItem(STORAGE_DOCKED, isDocked ? 'true' : 'false');
    } catch (e) {}

    setTimeout(resizeCanvas, 300);
    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
    announceStatus(isDocked ? 'Docked scratchpad to screen margin.' : 'Restored centered modal view.');
  }

  function toggleFullscreenMode() {
    if (!dom.panel) return;
    const isFull = dom.panel.classList.toggle('is-fullscreen');
    dom.panel.classList.remove('is-docked');
    if (dom.expandBtn) dom.expandBtn.classList.toggle('active', isFull);
    if (dom.dockBtn) dom.dockBtn.classList.remove('active');

    setTimeout(resizeCanvas, 300);
    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
    announceStatus(isFull ? 'Scratchpad expanded to fullscreen.' : 'Restored standard window.');
  }

  function openScratchpad() {
    if (!dom.panel) return;
    dom.panel.classList.add('active');
    dom.panel.setAttribute('aria-hidden', 'false');

    // Restore docked state if user had it pinned
    try {
      if (localStorage.getItem(STORAGE_DOCKED) === 'true') {
        dom.panel.classList.add('is-docked');
        if (dom.dockBtn) dom.dockBtn.classList.add('active');
      }
    } catch (e) {}

    setTimeout(() => {
      resizeCanvas();
      if (dom.textarea) dom.textarea.focus();
    }, 150);

    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
    announceStatus('Scratchpad opened.');
  }

  function closeScratchpad() {
    if (!dom.panel) return;
    dom.panel.classList.remove('active');
    dom.panel.setAttribute('aria-hidden', 'true');
    if (isDictating && recognition) {
      stopDictation();
    }
    saveCurrentCanvasSnapshot();
    if (window.HLSound && window.HLSound.playToggle) window.HLSound.playToggle();
    announceStatus('Scratchpad closed.');
  }

  function toggleScratchpad() {
    if (!dom.panel) return;
    if (dom.panel.classList.contains('active')) {
      closeScratchpad();
    } else {
      openScratchpad();
    }
  }

  // =========================================================================
  // Text Formatting & Word Count
  // =========================================================================
  function applyTextFormat(formatType) {
    if (!dom.textarea) return;
    const field = dom.textarea;
    const start = field.selectionStart || 0;
    const end = field.selectionEnd || 0;
    const text = field.value;
    const selected = text.substring(start, end);

    let replacement = '';
    switch (formatType) {
      case 'bold':
        replacement = `**${selected || 'bold text'}**`;
        break;
      case 'italic':
        replacement = `*${selected || 'italic text'}*`;
        break;
      case 'h2':
        replacement = `\n## ${selected || 'Section Title'}\n`;
        break;
      case 'bullet':
        replacement = `\n- ${selected || 'Bullet item'}\n`;
        break;
      case 'numlist':
        replacement = `\n1. ${selected || 'Numbered item'}\n`;
        break;
      case 'quote':
        replacement = `\n> ${selected || 'Quote'}\n`;
        break;
      case 'code':
        replacement = `\n\`\`\`\n${selected || 'code or derivation here'}\n\`\`\`\n`;
        break;
      case 'math':
        replacement = `$${selected || 'x'}^2$`;
        break;
      default:
        replacement = selected;
    }

    field.focus();
    field.setRangeText(replacement, start, end, 'end');
    field.dispatchEvent(new Event('input'));
  }

  function updateStats() {
    if (!dom.stats || !dom.textarea) return;
    const str = dom.textarea.value || '';
    const chars = str.length;
    const words = str.trim() ? str.trim().split(/\s+/).length : 0;
    const readMin = Math.ceil(words / 200);
    dom.stats.textContent = `${words} words • ${chars} chars • ~${readMin} min read`;
  }

  function announceStatus(msg, isSuccess = true) {
    if (!dom.status) return;
    dom.status.innerHTML = `<i class="fas ${isSuccess ? 'fa-check-circle' : 'fa-info-circle'}" aria-hidden="true"></i> ${escapeHtml(msg)}`;
    dom.status.style.color = isSuccess ? 'var(--color-success)' : 'var(--color-primary)';
  }

  function searchInNotes(term) {
    if (!dom.textarea || !dom.searchCount) return;
    if (!term || !term.trim()) {
      dom.searchCount.textContent = '';
      return;
    }
    const val = dom.textarea.value.toLowerCase();
    const query = term.toLowerCase();
    let count = 0;
    let pos = val.indexOf(query);
    while (pos !== -1) {
      count++;
      pos = val.indexOf(query, pos + query.length);
    }
    dom.searchCount.textContent = count > 0 ? `${count} found` : '0 found';

    // Jump to first match
    if (count > 0) {
      const idx = val.indexOf(query);
      dom.textarea.focus();
      dom.textarea.setSelectionRange(idx, idx + query.length);
    }
  }

  // =========================================================================
  // Voice Dictation (Speech-to-Text)
  // =========================================================================
  function initDictation() {
    if (!dom.dictateBtn) return;
    const SpeechRec = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!SpeechRec) {
      dom.dictateBtn.title = 'Speech Recognition is not supported by your current browser.';
      dom.dictateBtn.style.opacity = '0.5';
      dom.dictateBtn.onclick = () => {
        alert('Voice dictation requires Google Chrome, Microsoft Edge, or Safari.');
      };
      return;
    }

    recognition = new SpeechRec();
    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'en-US';

    recognition.onstart = () => {
      isDictating = true;
      dom.dictateBtn.classList.add('is-listening');
      dom.dictateBtn.innerHTML = '<i class="fas fa-circle" style="color: #ef4444;" aria-hidden="true"></i> <span>Listening...</span>';
      announceStatus('Voice dictation active. Speak clearly into your mic.');
    };

    recognition.onresult = (event) => {
      let finalTranscript = '';
      for (let i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
          finalTranscript += event.results[i][0].transcript;
        }
      }

      if (finalTranscript && dom.textarea) {
        let text = finalTranscript.trim();
        if (text.toLowerCase() === 'new line' || text.toLowerCase() === 'newline') {
          dom.textarea.value += '\n';
        } else if (text.toLowerCase() === 'clear notes' || text.toLowerCase() === 'clear all') {
          dom.textarea.value = '';
        } else {
          const needsSpace = dom.textarea.value.length > 0 && 
                             !dom.textarea.value.endsWith(' ') && 
                             !dom.textarea.value.endsWith('\n');
          dom.textarea.value += (needsSpace ? ' ' : '') + text;
        }
        dom.textarea.dispatchEvent(new Event('input'));
        dom.textarea.scrollTop = dom.textarea.scrollHeight;
      }
    };

    recognition.onerror = (event) => {
      console.warn('[Scratchpad] SpeechRecognition error:', event.error);
      stopDictation();
      announceStatus(`Mic error: ${event.error}`, false);
    };

    recognition.onend = () => {
      if (isDictating) {
        try { recognition.start(); } catch(e) { stopDictation(); }
      } else {
        stopDictation();
      }
    };

    dom.dictateBtn.onclick = () => {
      if (isDictating) {
        stopDictation();
      } else {
        try {
          recognition.start();
        } catch (e) {
          console.error(e);
        }
      }
    };
  }

  function stopDictation() {
    isDictating = false;
    if (recognition) {
      try { recognition.stop(); } catch(e) {}
    }
    if (dom.dictateBtn) {
      dom.dictateBtn.classList.remove('is-listening');
      dom.dictateBtn.innerHTML = '<i class="fas fa-microphone" aria-hidden="true"></i> <span>Dictate</span>';
    }
    announceStatus('Voice dictation paused.');
  }

  // =========================================================================
  // Typography & Accessibility Controls
  // =========================================================================
  let currentFontSizePercent = 100;

  function setFontSize(delta) {
    if (!dom.textarea || !dom.fontSizeDisplay) return;
    currentFontSizePercent = Math.max(70, Math.min(200, currentFontSizePercent + delta));
    dom.textarea.style.fontSize = `${currentFontSizePercent}%`;
    dom.fontSizeDisplay.textContent = `${currentFontSizePercent}%`;
    if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
  }

  function setFontFamily(fontKey) {
    if (!dom.textarea) return;
    document.querySelectorAll('.font-pref-btn').forEach(btn => {
      btn.classList.toggle('active', btn.dataset.font === fontKey);
    });

    dom.textarea.classList.remove('font-dyslexic', 'font-mono');
    if (fontKey === 'dyslexic') dom.textarea.classList.add('font-dyslexic');
    if (fontKey === 'mono') dom.textarea.classList.add('font-mono');
    if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
  }

  function applyInitialPreferences() {
    try {
      if (localStorage.getItem(STORAGE_DOCKED) === 'true' && dom.panel) {
        dom.panel.classList.add('is-docked');
        if (dom.dockBtn) dom.dockBtn.classList.add('active');
      }
    } catch (e) {}
  }

  // =========================================================================
  // Event Binding
  // =========================================================================
  function bindEvents() {
    // Window Open/Close Toggles
    if (dom.backdrop) dom.backdrop.onclick = closeScratchpad;
    if (dom.closeBtn) dom.closeBtn.onclick = closeScratchpad;
    if (dom.dockBtn) dom.dockBtn.onclick = toggleDockMode;
    if (dom.expandBtn) dom.expandBtn.onclick = toggleFullscreenMode;

    // Global toggle hook via button
    const fabScratchpadBtn = document.getElementById('scratchpad-toggle');
    if (fabScratchpadBtn) {
      fabScratchpadBtn.onclick = (e) => {
        e.preventDefault();
        toggleScratchpad();
      };
    }

    // Keyboard Shortcuts
    window.addEventListener('keydown', (e) => {
      // Alt + S -> Toggle Scratchpad
      if (e.altKey && (e.key === 's' || e.key === 'S')) {
        e.preventDefault();
        toggleScratchpad();
      }
      // Alt + N -> New Note (when scratchpad is active)
      if (e.altKey && (e.key === 'n' || e.key === 'N') && dom.panel && dom.panel.classList.contains('active')) {
        e.preventDefault();
        createNewNote();
      }
      // Alt + D -> Dictate
      if (e.altKey && (e.key === 'd' || e.key === 'D') && dom.panel && dom.panel.classList.contains('active')) {
        e.preventDefault();
        if (dom.dictateBtn) dom.dictateBtn.click();
      }
      // Esc -> Close Scratchpad (if active and not editing inside prompt)
      if (e.key === 'Escape' && dom.panel && dom.panel.classList.contains('active')) {
        closeScratchpad();
      }
      // Canvas Undo / Redo (Ctrl + Z, Ctrl + Y)
      if (dom.panel && dom.panel.classList.contains('active') && dom.paneWhiteboard && dom.paneWhiteboard.classList.contains('active')) {
        if ((e.ctrlKey || e.metaKey) && (e.key === 'z' || e.key === 'Z')) {
          if (e.shiftKey) redoCanvas();
          else undoCanvas();
          e.preventDefault();
        } else if ((e.ctrlKey || e.metaKey) && (e.key === 'y' || e.key === 'Y')) {
          redoCanvas();
          e.preventDefault();
        }
      }
    });

    // Window Resize
    window.addEventListener('resize', resizeCanvas);

    // Notebook Bar
    if (dom.noteSelect) {
      dom.noteSelect.onchange = (e) => {
        saveCurrentCanvasSnapshot();
        activeNoteId = e.target.value;
        saveNotebook();
        loadActiveNote();
      };
    }
    if (dom.newNoteBtn) dom.newNoteBtn.onclick = () => createNewNote();
    if (dom.renameNoteBtn) dom.renameNoteBtn.onclick = renameCurrentNote;
    if (dom.deleteNoteBtn) dom.deleteNoteBtn.onclick = deleteCurrentNote;

    // Mode Tabs
    if (dom.tabNotes) dom.tabNotes.onclick = () => switchTab('notes');
    if (dom.tabWhiteboard) dom.tabWhiteboard.onclick = () => switchTab('whiteboard');
    if (dom.tabMath) dom.tabMath.onclick = () => switchTab('math');

    // Textarea Autosave & Reactivity
    if (dom.textarea) {
      dom.textarea.addEventListener('input', () => {
        if (dom.status) {
          dom.status.innerHTML = '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Saving...';
          dom.status.style.color = 'var(--color-primary)';
        }
        updateStats();

        clearTimeout(saveDebounceTimer);
        saveDebounceTimer = setTimeout(() => {
          const cur = getActiveNote();
          if (cur) {
            cur.content = dom.textarea.value;
            cur.updatedAt = Date.now();
            saveNotebook(true);
            announceStatus('Saved locally');
          }
        }, 400);

        scheduleMathJaxPreview();
      });
    }

    // Templates Selection
    document.querySelectorAll('.scratchpad-templates-list .template-btn').forEach(btn => {
      btn.onclick = () => {
        const key = btn.dataset.template;
        if (STUDY_TEMPLATES[key] === undefined) return;
        const cur = getActiveNote();
        const hasContent = dom.textarea && dom.textarea.value.trim().length > 0;

        if (!hasContent || confirm(`Apply ${btn.textContent.trim()} template? This will replace the text in this note.`)) {
          document.querySelectorAll('.scratchpad-templates-list .template-btn').forEach(b => b.classList.remove('active'));
          btn.classList.add('active');

          if (dom.textarea) {
            dom.textarea.value = STUDY_TEMPLATES[key];
            dom.textarea.dispatchEvent(new Event('input'));
          }
          if (cur) cur.template = key;
          saveNotebook();
        }
      };
    });

    // Formatting Buttons
    document.querySelectorAll('.format-btn').forEach(btn => {
      btn.onclick = () => applyTextFormat(btn.dataset.format);
    });

    // Note Search
    if (dom.searchInput) {
      dom.searchInput.addEventListener('input', (e) => {
        searchInNotes(e.target.value);
      });
    }

    // Typography & Font Preferences
    document.querySelectorAll('.font-pref-btn').forEach(btn => {
      btn.onclick = () => setFontFamily(btn.dataset.font);
    });
    if (dom.fontDecreaseBtn) dom.fontDecreaseBtn.onclick = () => setFontSize(-10);
    if (dom.fontIncreaseBtn) dom.fontIncreaseBtn.onclick = () => setFontSize(10);

    // Canvas Pointer Events
    if (canvas) {
      canvas.addEventListener('pointerdown', startDrawing);
      canvas.addEventListener('pointermove', draw);
      canvas.addEventListener('pointerup', stopDrawing);
      canvas.addEventListener('pointercancel', stopDrawing);
    }

    // Canvas Tools Ribbon
    document.querySelectorAll('.canvas-tool-btn').forEach(btn => {
      btn.onclick = () => {
        document.querySelectorAll('.canvas-tool-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentTool = btn.dataset.tool;
        if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
      };
    });

    // Canvas Colors
    document.querySelectorAll('.canvas-color-btn').forEach(btn => {
      btn.onclick = () => {
        document.querySelectorAll('.canvas-color-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentColor = btn.dataset.color;
        if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
      };
    });

    // Canvas Line Width
    if (dom.lineWidthSelect) {
      dom.lineWidthSelect.onchange = (e) => {
        currentLineWidth = parseInt(e.target.value, 10) || 4;
      };
    }

    // Canvas Actions
    if (dom.toggleGridBtn) dom.toggleGridBtn.onclick = cycleGrid;
    if (dom.undoBtn) dom.undoBtn.onclick = undoCanvas;
    if (dom.redoBtn) dom.redoBtn.onclick = redoCanvas;
    if (dom.clearCanvasBtn) dom.clearCanvasBtn.onclick = () => clearCanvas(true);
    if (dom.downloadCanvasBtn) dom.downloadCanvasBtn.onclick = downloadCanvasImage;
    if (dom.insertNoteBtn) dom.insertNoteBtn.onclick = insertDrawingIntoNote;

    // Math Palette Chips
    document.querySelectorAll('.math-chip-btn').forEach(btn => {
      btn.onclick = () => {
        const latex = btn.dataset.latex;
        if (latex) insertLatex(latex);
      };
    });

    if (dom.refreshMathjaxBtn) {
      dom.refreshMathjaxBtn.onclick = () => {
        renderMathJaxPreview();
        if (window.HLSound && window.HLSound.playClick) window.HLSound.playClick();
      };
    }

    // Dictation
    initDictation();

    // Footer Actions: Copy to Clipboard
    if (dom.copyBtn && dom.textarea) {
      dom.copyBtn.onclick = () => {
        const text = dom.textarea.value;
        if (!text) return;
        navigator.clipboard.writeText(text).then(() => {
          const original = dom.copyBtn.innerHTML;
          dom.copyBtn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> <span>Copied!</span>';
          setTimeout(() => { dom.copyBtn.innerHTML = original; }, 1500);
          if (window.HLSound && window.HLSound.playSuccess) window.HLSound.playSuccess();
        });
      };
    }

    // Print Note
    if (dom.printBtn && dom.textarea) {
      dom.printBtn.onclick = () => {
        window.print();
      };
    }

    // Download Text (.txt)
    if (dom.downloadTxtBtn && dom.textarea) {
      dom.downloadTxtBtn.onclick = () => {
        const cur = getActiveNote();
        const blob = new Blob([dom.textarea.value], { type: 'text/plain;charset=utf-8' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = `${(cur ? cur.title : 'study_notes').toLowerCase().replace(/\s+/g, '_')}.txt`;
        a.click();
      };
    }

    // Download Markdown (.md)
    if (dom.downloadMdBtn && dom.textarea) {
      dom.downloadMdBtn.onclick = () => {
        const cur = getActiveNote();
        const header = `# ${cur ? cur.title : 'Study Notes'}\n*Exported from Hesten's Learning Unified Scratchpad*\n*Date: ${new Date().toLocaleDateString()}*\n\n---\n\n`;
        const blob = new Blob([header + dom.textarea.value], { type: 'text/markdown;charset=utf-8' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = `${(cur ? cur.title : 'study_notes').toLowerCase().replace(/\s+/g, '_')}.md`;
        a.click();
      };
    }

    // Clear Notes
    if (dom.clearNotesBtn && dom.textarea) {
      dom.clearNotesBtn.onclick = () => {
        if (!dom.textarea.value.trim() || confirm('Clear all text in this active note?')) {
          dom.textarea.value = '';
          dom.textarea.dispatchEvent(new Event('input'));
          announceStatus('Note text cleared');
        }
      };
    }

    // Cross-Tab Reactivity
    window.addEventListener('storage', (e) => {
      if (e.key === STORAGE_NOTEBOOK || e.key === STORAGE_LEGACY || e.key === STORAGE_NOTES) {
        loadNotebook();
        loadActiveNote();
      }
    });
  }

  // =========================================================================
  // Public API: window.HLScratchpad
  // =========================================================================
  window.HLScratchpad = {
    open: openScratchpad,
    close: closeScratchpad,
    toggle: toggleScratchpad,
    createNote: createNewNote,
    getActiveNote: getActiveNote,
    refresh: () => {
      loadNotebook();
      loadActiveNote();
    },
    appendContent: (text) => {
      if (!dom.textarea) return;
      const cur = getActiveNote();
      const needsNewline = dom.textarea.value.length > 0 && !dom.textarea.value.endsWith('\n\n');
      dom.textarea.value += (needsNewline ? '\n\n' : '') + text;
      dom.textarea.dispatchEvent(new Event('input'));
      openScratchpad();
      announceStatus(`Appended content to "${cur.title}"`);
    }
  };

  // Global Function for Launchpad & Shortcuts
  window.toggleScratchpad = () => window.HLScratchpad.toggle();

  // Backward compatibility bridge for external pages (interactive-labs, grammar-index, student-stories-poems)
  window.exportWorkToScratchpad = function (title, content) {
    if (window.HLScratchpad) {
      window.HLScratchpad.appendContent(`### ${title}\n${content}`);
    }
  };

  // Mount on DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initStudio);
  } else {
    initStudio();
  }
})();
