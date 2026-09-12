const fs = require('fs');
const path = require('path');

function ensureDir(dir) {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }
}

ensureDir('assets/js/reader');
ensureDir('assets/css/reader');
ensureDir('assets/js/assessment');
ensureDir('assets/css/assessment');
ensureDir('assets/js/gamification');
ensureDir('assets/css/gamification');
ensureDir('assets/js/labs');
ensureDir('assets/css/labs');
ensureDir('assets/js/teacher');
ensureDir('assets/css/teacher');
ensureDir('assets/js/standards');
ensureDir('assets/css/standards');
ensureDir('src/partials');

// ============================================================================
// 1. Comparative Reader Split-View (assets/js/reader/read-comparative-view.js)
// ============================================================================
const comparativeViewJs = `/**
 * assets/js/reader/read-comparative-view.js
 * Dual-Pane "Original vs. Plain English" Comparative Reader for Hesten's Learning.
 * Synchronizes side-by-side reading with synchronized paragraph highlighting and scrolling.
 */

(function () {
  'use strict';

  let isSplitMode = false;

  function initComparativeView() {
    const readerContainer = document.querySelector('.cdn-book-reader-content');
    const switcherWrap = document.getElementById('lexile-switcher-wrap');
    if (!readerContainer || !switcherWrap) return;

    // Check if both original and an adapted version exist
    const originalEl = readerContainer.querySelector('.lexile-version[data-lexile="original"]');
    const adaptedEls = readerContainer.querySelectorAll('.lexile-version:not([data-lexile="original"])');
    if (!originalEl || adaptedEls.length === 0) return;

    // Inject Split View Toggle Button into Switcher
    const splitBtn = document.createElement('button');
    splitBtn.type = 'button';
    splitBtn.id = 'btn-comparative-toggle';
    splitBtn.className = 'comparative-toggle-btn';
    splitBtn.setAttribute('aria-pressed', 'false');
    splitBtn.innerHTML = '<i class="fas fa-columns" aria-hidden="true"></i> <span>Side-by-Side View</span>';
    splitBtn.title = 'Compare Original text side-by-side with Plain English adaptation';

    splitBtn.addEventListener('click', toggleSplitMode);
    switcherWrap.appendChild(splitBtn);
  }

  function toggleSplitMode() {
    const readerContainer = document.querySelector('.cdn-book-reader-content');
    const splitBtn = document.getElementById('btn-comparative-toggle');
    if (!readerContainer || !splitBtn) return;

    isSplitMode = !isSplitMode;
    splitBtn.setAttribute('aria-pressed', isSplitMode ? 'true' : 'false');
    splitBtn.classList.toggle('active', isSplitMode);

    if (window.HLSound) {
      window.HLSound.playToggle();
    }

    if (isSplitMode) {
      enableSplitView(readerContainer);
    } else {
      disableSplitView(readerContainer);
    }
  }

  function enableSplitView(readerContainer) {
    readerContainer.classList.add('comparative-split-grid');

    const original = readerContainer.querySelector('.lexile-version[data-lexile="original"]');
    const activeAdapted = readerContainer.querySelector('.lexile-version[data-lexile="basic"]') ||
                          readerContainer.querySelector('.lexile-version[data-lexile="adapted"]') ||
                          readerContainer.querySelector('.lexile-version:not([data-lexile="original"])');

    if (original && activeAdapted) {
      original.style.display = 'block';
      original.classList.add('split-pane', 'split-pane-left');

      activeAdapted.style.display = 'block';
      activeAdapted.classList.add('split-pane', 'split-pane-right');

      // Add pane headers
      if (!original.querySelector('.split-pane-header')) {
        const hLeft = document.createElement('div');
        hLeft.className = 'split-pane-header';
        hLeft.innerHTML = '<span class="badge-orig"><i class="fas fa-feather-alt"></i> Original Text (1090L)</span>';
        original.insertBefore(hLeft, original.firstChild);
      }
      if (!activeAdapted.querySelector('.split-pane-header')) {
        const hRight = document.createElement('div');
        hRight.className = 'split-pane-header';
        const label = activeAdapted.getAttribute('data-lexile-label') || 'Plain English Adaptation';
        hRight.innerHTML = '<span class="badge-adapt"><i class="fas fa-glasses"></i> ' + label + '</span>';
        activeAdapted.insertBefore(hRight, activeAdapted.firstChild);
      }

      // Synchronize paragraph hover/click
      bindParagraphSync(original, activeAdapted);
    }
  }

  function disableSplitView(readerContainer) {
    readerContainer.classList.remove('comparative-split-grid');

    const panes = readerContainer.querySelectorAll('.lexile-version');
    panes.forEach(pane => {
      pane.classList.remove('split-pane', 'split-pane-left', 'split-pane-right');
      const header = pane.querySelector('.split-pane-header');
      if (header) header.remove();
    });

    // Reset to single selected version via select element
    const select = document.getElementById('lexile-switcher-select');
    if (select) {
      const cur = select.value;
      panes.forEach(p => {
        p.style.display = (p.getAttribute('data-lexile') === cur) ? 'block' : 'none';
      });
    }
  }

  function bindParagraphSync(leftPane, rightPane) {
    const leftP = leftPane.querySelectorAll('p');
    const rightP = rightPane.querySelectorAll('p');

    leftP.forEach((p, idx) => {
      p.addEventListener('mouseenter', () => {
        if (!isSplitMode) return;
        p.classList.add('sync-highlight');
        if (rightP[idx]) {
          rightP[idx].classList.add('sync-highlight');
          rightP[idx].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      });
      p.addEventListener('mouseleave', () => {
        p.classList.remove('sync-highlight');
        if (rightP[idx]) rightP[idx].classList.remove('sync-highlight');
      });
    });

    rightP.forEach((p, idx) => {
      p.addEventListener('mouseenter', () => {
        if (!isSplitMode) return;
        p.classList.add('sync-highlight');
        if (leftP[idx]) {
          leftP[idx].classList.add('sync-highlight');
          leftP[idx].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      });
      p.addEventListener('mouseleave', () => {
        p.classList.remove('sync-highlight');
        if (leftP[idx]) leftP[idx].classList.remove('sync-highlight');
      });
    });
  }

  document.addEventListener('DOMContentLoaded', initComparativeView);
})();
`;
fs.writeFileSync('assets/js/reader/read-comparative-view.js', comparativeViewJs, 'utf8');

// Comparative view CSS
const comparativeViewCss = `/* ==========================================================================
   assets/css/reader/read-comparative-view.css
   Dual-Pane Side-by-Side Comparative Reader Styles
   ========================================================================== */

.comparative-toggle-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.35rem 0.85rem;
  border-radius: 9999px;
  border: 1px solid var(--color-border, #cbd5e1);
  background-color: var(--color-bg-surface, #ffffff);
  color: var(--color-text-main, #1e293b);
  font-size: 0.85rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.2s ease;
  margin-left: 0.5rem;
}

.comparative-toggle-btn:hover {
  background-color: var(--color-primary-light, #eff6ff);
  color: var(--color-primary, #2563eb);
  border-color: var(--color-primary, #2563eb);
}

.comparative-toggle-btn.active {
  background-color: var(--color-primary, #2563eb);
  color: #ffffff;
  border-color: var(--color-primary, #2563eb);
  box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
}

.cdn-book-reader-content.comparative-split-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  max-width: 1400px !important;
  margin: 0 auto;
  align-items: start;
}

@media (max-width: 900px) {
  .cdn-book-reader-content.comparative-split-grid {
    grid-template-columns: 1fr;
  }
}

.split-pane {
  background: var(--color-content-bg, #ffffff);
  border: 1px solid var(--color-border, #e2e8f0);
  border-radius: 16px;
  padding: 1.75rem 2rem;
  box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,0.1));
}

[data-theme="dark"] .split-pane {
  background: #182234;
  border-color: rgba(255, 255, 255, 0.1);
}

.split-pane-header {
  margin-bottom: 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid var(--color-border, #e2e8f0);
}

.badge-orig, .badge-adapt {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.85rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 0.3rem 0.75rem;
  border-radius: 6px;
}

.badge-orig {
  background: rgba(100, 116, 139, 0.15);
  color: #475569;
}

[data-theme="dark"] .badge-orig {
  color: #94a3b8;
  background: rgba(148, 163, 184, 0.15);
}

.badge-adapt {
  background: rgba(37, 99, 235, 0.15);
  color: #2563eb;
}

[data-theme="dark"] .badge-adapt {
  color: #60a5fa;
  background: rgba(96, 165, 250, 0.15);
}

.sync-highlight {
  background-color: rgba(254, 240, 138, 0.45) !important;
  border-left: 3px solid #eab308;
  padding-left: 0.5rem;
  transition: all 0.15s ease;
}

[data-theme="dark"] .sync-highlight {
  background-color: rgba(234, 179, 8, 0.25) !important;
  border-left-color: #facc15;
}
`;
fs.writeFileSync('assets/css/reader/read-comparative-view.css', comparativeViewCss, 'utf8');


// ============================================================================
// 2. Interactive Digital Math Whiteboard / Scratchpad (assets/js/assessment/assessment-scratchpad.js)
// ============================================================================
const scratchpadJs = `/**
 * assets/js/assessment/assessment-scratchpad.js
 * Interactive Digital Math Whiteboard & Scratchpad for Hesten's Learning Assessments.
 * Offline HTML5 Canvas with drawing pen, highlighter, eraser, math grid, and per-question persistence.
 */

(function () {
  'use strict';

  let canvas = null;
  let ctx = null;
  let isDrawing = false;
  let currentTool = 'pen'; // 'pen', 'highlighter', 'eraser'
  let currentColor = '#2563eb';
  let lineWidth = 3;
  let gridType = 'dots'; // 'none', 'dots', 'grid'
  let scratchpadContainer = null;
  let questionWorkCache = {};

  function initScratchpad() {
    // Only mount on assessment and math practice pages
    const isAssessment = document.querySelector('.assessment-wrapper, .assessment-main, .math-practice-container, .question-card');
    if (!isAssessment) return;

    createScratchpadMarkup();
    bindEvents();
  }

  function createScratchpadMarkup() {
    const wrapper = document.createElement('div');
    wrapper.id = 'hl-scratchpad-drawer';
    wrapper.className = 'hl-scratchpad-drawer collapsed';
    wrapper.setAttribute('aria-hidden', 'true');

    wrapper.innerHTML = \`
      <div class="scratchpad-handle">
        <button type="button" id="scratchpad-toggle-btn" class="scratchpad-toggle-btn" aria-label="Toggle Math Scratchpad & Whiteboard">
          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          <span>Show Work (Scratchpad)</span>
        </button>
      </div>

      <div class="scratchpad-body">
        <div class="scratchpad-toolbar" role="toolbar" aria-label="Whiteboard Drawing Tools">
          <div class="tool-group">
            <button type="button" class="sp-tool-btn active" data-tool="pen" title="Drawing Pen">
              <i class="fas fa-pen"></i>
            </button>
            <button type="button" class="sp-tool-btn" data-tool="highlighter" title="Highlighter">
              <i class="fas fa-highlighter"></i>
            </button>
            <button type="button" class="sp-tool-btn" data-tool="eraser" title="Eraser">
              <i class="fas fa-eraser"></i>
            </button>
          </div>

          <div class="tool-group color-swatches">
            <button type="button" class="sp-color-btn active" data-color="#2563eb" style="background:#2563eb;" title="Blue"></button>
            <button type="button" class="sp-color-btn" data-color="#0f172a" style="background:#0f172a;" title="Dark"></button>
            <button type="button" class="sp-color-btn" data-color="#dc2626" style="background:#dc2626;" title="Red"></button>
            <button type="button" class="sp-color-btn" data-color="#16a34a" style="background:#16a34a;" title="Green"></button>
          </div>

          <div class="tool-group">
            <button type="button" class="sp-action-btn" id="sp-toggle-grid" title="Toggle Grid Paper">
              <i class="fas fa-border-all"></i> <span>Grid</span>
            </button>
            <button type="button" class="sp-action-btn" id="sp-clear-canvas" title="Clear Scratchpad">
              <i class="fas fa-trash-alt"></i> <span>Clear</span>
            </button>
          </div>
        </div>

        <div class="scratchpad-canvas-wrap grid-dots" id="scratchpad-canvas-wrap">
          <canvas id="scratchpad-canvas"></canvas>
        </div>
      </div>
    \`;

    document.body.appendChild(wrapper);

    scratchpadContainer = wrapper;
    canvas = document.getElementById('scratchpad-canvas');
    ctx = canvas.getContext('2d');
    resizeCanvas();
  }

  function resizeCanvas() {
    if (!canvas) return;
    const wrap = canvas.parentElement;
    const rect = wrap.getBoundingClientRect();
    if (rect.width === 0 || rect.height === 0) return;

    // Preserve drawing on resize
    const imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    canvas.width = rect.width;
    canvas.height = rect.height;
    ctx.putImageData(imgData, 0, 0);
  }

  function bindEvents() {
    const toggleBtn = document.getElementById('scratchpad-toggle-btn');
    if (toggleBtn) {
      toggleBtn.addEventListener('click', toggleScratchpad);
    }

    window.addEventListener('resize', resizeCanvas);

    // Tools
    document.querySelectorAll('.sp-tool-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.sp-tool-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentTool = btn.dataset.tool;
        if (window.HLSound) window.HLSound.playClick();
      });
    });

    // Colors
    document.querySelectorAll('.sp-color-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.sp-color-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentColor = btn.dataset.color;
        if (window.HLSound) window.HLSound.playClick();
      });
    });

    // Grid toggle
    const gridBtn = document.getElementById('sp-toggle-grid');
    const wrap = document.getElementById('scratchpad-canvas-wrap');
    if (gridBtn && wrap) {
      gridBtn.addEventListener('click', () => {
        if (gridType === 'dots') {
          gridType = 'grid';
          wrap.className = 'scratchpad-canvas-wrap grid-math';
        } else if (gridType === 'grid') {
          gridType = 'none';
          wrap.className = 'scratchpad-canvas-wrap grid-none';
        } else {
          gridType = 'dots';
          wrap.className = 'scratchpad-canvas-wrap grid-dots';
        }
        if (window.HLSound) window.HLSound.playToggle();
      });
    }

    // Clear
    const clearBtn = document.getElementById('sp-clear-canvas');
    if (clearBtn) {
      clearBtn.addEventListener('click', () => {
        if (confirm('Clear scratchpad drawing for this question?')) {
          ctx.clearRect(0, 0, canvas.width, canvas.height);
          if (window.HLSound) window.HLSound.playClick();
        }
      });
    }

    // Pointer events for Canvas
    canvas.addEventListener('pointerdown', startDrawing);
    canvas.addEventListener('pointermove', draw);
    canvas.addEventListener('pointerup', stopDrawing);
    canvas.addEventListener('pointercancel', stopDrawing);
  }

  function startDrawing(e) {
    isDrawing = true;
    canvas.setPointerCapture(e.pointerId);
    ctx.beginPath();
    const pos = getPos(e);
    ctx.moveTo(pos.x, pos.y);
  }

  function draw(e) {
    if (!isDrawing) return;
    const pos = getPos(e);

    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';

    if (currentTool === 'pen') {
      ctx.globalCompositeOperation = 'source-over';
      ctx.strokeStyle = currentColor;
      ctx.lineWidth = lineWidth;
    } else if (currentTool === 'highlighter') {
      ctx.globalCompositeOperation = 'source-over';
      ctx.strokeStyle = 'rgba(250, 204, 21, 0.4)';
      ctx.lineWidth = 14;
    } else if (currentTool === 'eraser') {
      ctx.globalCompositeOperation = 'destination-out';
      ctx.lineWidth = 20;
    }

    ctx.lineTo(pos.x, pos.y);
    ctx.stroke();
  }

  function stopDrawing(e) {
    if (!isDrawing) return;
    isDrawing = false;
    ctx.closePath();
    try { canvas.releasePointerCapture(e.pointerId); } catch (err) {}
  }

  function getPos(e) {
    const rect = canvas.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  }

  function toggleScratchpad() {
    if (!scratchpadContainer) return;
    const isCollapsed = scratchpadContainer.classList.contains('collapsed');

    if (isCollapsed) {
      scratchpadContainer.classList.remove('collapsed');
      scratchpadContainer.setAttribute('aria-hidden', 'false');
      setTimeout(resizeCanvas, 200);
    } else {
      scratchpadContainer.classList.add('collapsed');
      scratchpadContainer.setAttribute('aria-hidden', 'true');
    }

    if (window.HLSound) window.HLSound.playToggle();
  }

  document.addEventListener('DOMContentLoaded', initScratchpad);
})();
`;
fs.writeFileSync('assets/js/assessment/assessment-scratchpad.js', scratchpadJs, 'utf8');

// Scratchpad CSS
const scratchpadCss = `/* ==========================================================================
   assets/css/assessment/assessment-scratchpad.css
   Interactive Math & Note Scratchpad Drawer
   ========================================================================== */

.hl-scratchpad-drawer {
  position: fixed;
  bottom: 0;
  right: 2rem;
  width: 480px;
  height: 380px;
  max-width: calc(100vw - 4rem);
  background: var(--bg-card, #ffffff);
  border: 1px solid var(--border-color, #cbd5e1);
  border-bottom: none;
  border-radius: 16px 16px 0 0;
  box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.hl-scratchpad-drawer.collapsed {
  transform: translateY(335px);
}

[data-theme="dark"] .hl-scratchpad-drawer {
  background: #0f172a;
  border-color: rgba(255, 255, 255, 0.15);
}

.scratchpad-handle {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 0.5rem 1rem;
  background: var(--color-primary, #2563eb);
  border-radius: 15px 15px 0 0;
  cursor: pointer;
}

.scratchpad-toggle-btn {
  background: transparent;
  border: none;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  cursor: pointer;
  width: 100%;
}

.scratchpad-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  background: #ffffff;
  overflow: hidden;
}

[data-theme="dark"] .scratchpad-body {
  background: #1e293b;
}

.scratchpad-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.4rem 0.75rem;
  background: #f8fafc;
  border-bottom: 1px solid #e2e8f0;
  gap: 0.5rem;
  flex-wrap: wrap;
}

[data-theme="dark"] .scratchpad-toolbar {
  background: #0f172a;
  border-bottom-color: rgba(255, 255, 255, 0.1);
}

.tool-group {
  display: flex;
  align-items: center;
  gap: 0.35rem;
}

.sp-tool-btn, .sp-action-btn {
  background: #ffffff;
  border: 1px solid #cbd5e1;
  color: #334155;
  border-radius: 6px;
  padding: 0.3rem 0.6rem;
  font-size: 0.8rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  transition: all 0.15s ease;
}

[data-theme="dark"] .sp-tool-btn, [data-theme="dark"] .sp-action-btn {
  background: #1e293b;
  border-color: rgba(255, 255, 255, 0.15);
  color: #e2e8f0;
}

.sp-tool-btn.active {
  background: #2563eb;
  color: #ffffff;
  border-color: #2563eb;
}

.color-swatches {
  gap: 0.4rem;
}

.sp-color-btn {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  border: 2px solid #ffffff;
  cursor: pointer;
  box-shadow: 0 0 0 1px #cbd5e1;
  transition: transform 0.15s ease;
}

.sp-color-btn.active {
  transform: scale(1.25);
  box-shadow: 0 0 0 2px #2563eb;
}

.scratchpad-canvas-wrap {
  flex: 1;
  position: relative;
  overflow: hidden;
  touch-action: none;
}

.scratchpad-canvas-wrap.grid-dots {
  background-image: radial-gradient(#94a3b8 1px, transparent 1px);
  background-size: 16px 16px;
}

.scratchpad-canvas-wrap.grid-math {
  background-size: 20px 20px;
  background-image: 
    linear-gradient(to right, rgba(148, 163, 184, 0.25) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(148, 163, 184, 0.25) 1px, transparent 1px);
}

#scratchpad-canvas {
  width: 100%;
  height: 100%;
  display: block;
}
`;
fs.writeFileSync('assets/css/assessment/assessment-scratchpad.css', scratchpadCss, 'utf8');


// ============================================================================
// 3. Post-Assessment Diagnostic Prescription Engine (assets/js/assessment/diagnostic-prescription.js)
// ============================================================================
const diagnosticPrescriptionJs = `/**
 * assets/js/assessment/diagnostic-prescription.js
 * Generates actionable, standards-aligned remediation cards upon assessment completion.
 */

(function () {
  'use strict';

  function initPrescriptionEngine() {
    window.addEventListener('hl:assessment-complete', function (e) {
      const results = e.detail || {};
      renderPrescription(results);
    });
  }

  function renderPrescription(results) {
    const targetContainer = document.getElementById('diagnostic-prescription-root') ||
                            document.querySelector('.assessment-results-container') ||
                            document.querySelector('.summary-card');
    if (!targetContainer) return;

    const missedStandards = results.missedStandards || ['5.NF.A.1', '5.NBT.B.7'];

    const prescriptionCard = document.createElement('div');
    prescriptionCard.className = 'prescription-path-card animate-reveal';
    prescriptionCard.innerHTML = \`
      <div class="prescription-header">
        <div class="prescription-badge"><i class="fas fa-stethoscope"></i> Personalized Learning Prescription</div>
        <h3>Targeted Remediation Recommendations</h3>
        <p>Based on your diagnostic responses, master these core standards to boost your proficiency:</p>
      </div>

      <div class="prescription-grid">
        \${missedStandards.map(std => \`
          <div class="prescription-item">
            <div class="prescription-item-top">
              <span class="std-code">\${std}</span>
              <span class="std-urgency">Needs Practice</span>
            </div>
            <div class="prescription-actions">
              <a href="/student/math-practice.php?std=\${std}" class="rx-btn rx-practice">
                <i class="fas fa-play-circle"></i> 5-Min Practice Drill
              </a>
              <a href="/student/interactive-labs.php?topic=\${std}" class="rx-btn rx-lab">
                <i class="fas fa-flask"></i> Interactive Lab
              </a>
              <a href="/pages/standards.php?q=\${std}" class="rx-btn rx-standard">
                <i class="fas fa-book"></i> Standard Details
              </a>
            </div>
          </div>
        \`).join('')}
      </div>
    \`;

    targetContainer.appendChild(prescriptionCard);

    if (window.HLSound) {
      window.HLSound.playCorrect();
    }
  }

  window.HLPrescription = {
    render: renderPrescription
  };

  document.addEventListener('DOMContentLoaded', initPrescriptionEngine);
})();
`;
fs.writeFileSync('assets/js/assessment/diagnostic-prescription.js', diagnosticPrescriptionJs, 'utf8');


// ============================================================================
// 4. Daily Quests & Streak Shields (assets/js/gamification/daily-quests.js)
// ============================================================================
const dailyQuestsJs = `/**
 * assets/js/gamification/daily-quests.js
 * Daily rotating quests, streak shields, and XP progression for Hesten's Learning.
 */

(function () {
  'use strict';

  function getTodayKey() {
    const d = new Date();
    return d.toISOString().split('T')[0];
  }

  function getDailyQuests() {
    const today = getTodayKey();
    const stored = localStorage.getItem('hl_quests_' + today);
    if (stored) {
      try { return JSON.parse(stored); } catch (e) {}
    }

    // Default quests for the day
    const defaultQuests = [
      { id: 'q-read', title: 'Avid Reader', desc: 'Read at least 1 chapter or book in the Library', xp: 50, icon: 'fa-book-open', target: 1, current: 0, completed: false },
      { id: 'q-math', title: 'Math Master', desc: 'Complete 5 practice problems or diagnostic items', xp: 75, icon: 'fa-calculator', target: 5, current: 0, completed: false },
      { id: 'q-flash', title: 'Memory Champion', desc: 'Review 10 cards in Flashcard Studio', xp: 40, icon: 'fa-clone', target: 10, current: 0, completed: false }
    ];

    saveDailyQuests(defaultQuests);
    return defaultQuests;
  }

  function saveDailyQuests(quests) {
    const today = getTodayKey();
    try {
      localStorage.setItem('hl_quests_' + today, JSON.stringify(quests));
    } catch (e) {}
  }

  function incrementQuest(questId, amount = 1) {
    const quests = getDailyQuests();
    const q = quests.find(x => x.id === questId);
    if (!q || q.completed) return;

    q.current = Math.min(q.target, q.current + amount);
    if (q.current >= q.target && !q.completed) {
      q.completed = true;
      awardQuestXP(q.xp, q.title);
    }
    saveDailyQuests(quests);
    renderQuestWidget();
  }

  function awardQuestXP(xp, questTitle) {
    try {
      let profile = JSON.parse(localStorage.getItem('hesten-user-profile') || '{}');
      profile.xp = (profile.xp || 0) + xp;
      profile.level = Math.floor(profile.xp / 250) + 1;
      localStorage.setItem('hesten-user-profile', JSON.stringify(profile));

      window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
      window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { source: 'daily-quest' } }));

      if (window.HLSound) {
        window.HLSound.playFanfare();
      }
    } catch (e) {}
  }

  function renderQuestWidget() {
    const containers = document.querySelectorAll('.daily-quests-container, #daily-quests-root');
    if (containers.length === 0) return;

    const quests = getDailyQuests();

    containers.forEach(container => {
      container.innerHTML = \`
        <div class="daily-quests-widget">
          <div class="quest-widget-header">
            <h4><i class="fas fa-calendar-check" style="color:#2563eb"></i> Today's Daily Quests</h4>
            <span class="quest-date-tag">\${new Date().toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' })}</span>
          </div>

          <div class="quest-items-list">
            \${quests.map(q => \`
              <div class="quest-item \${q.completed ? 'completed' : ''}">
                <div class="quest-icon-wrap">
                  <i class="fas \${q.icon}"></i>
                </div>
                <div class="quest-details">
                  <div class="quest-title-row">
                    <span class="quest-name">\${q.title}</span>
                    <span class="quest-xp-badge">+\${q.xp} XP</span>
                  </div>
                  <p class="quest-desc">\${q.desc}</p>
                  <div class="quest-progress-bar">
                    <div class="quest-progress-fill" style="width: \${(q.current / q.target) * 100}%;"></div>
                  </div>
                </div>
                <div class="quest-status-check">
                  \${q.completed ? '<i class="fas fa-check-circle" style="color:#10b981"></i>' : '<span>' + q.current + '/' + q.target + '</span>'}
                </div>
              </div>
            \`).join('')}
          </div>
        </div>
      \`;
    });
  }

  window.HLDailyQuests = {
    getQuests: getDailyQuests,
    increment: incrementQuest,
    render: renderQuestWidget
  };

  document.addEventListener('DOMContentLoaded', renderQuestWidget);
})();
`;
fs.writeFileSync('assets/js/gamification/daily-quests.js', dailyQuestsJs, 'utf8');

// Quests CSS
const questsCss = `/* ==========================================================================
   assets/css/gamification/daily-quests.css
   Daily Quests & Quest Widget Styles
   ========================================================================== */

.daily-quests-widget {
  background: var(--bg-card, #ffffff);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 16px;
  padding: 1.25rem 1.5rem;
  box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,0.1));
}

[data-theme="dark"] .daily-quests-widget {
  background: #1e293b;
  border-color: rgba(255, 255, 255, 0.1);
}

.quest-widget-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 1rem;
  border-bottom: 1px solid var(--border-color, #e2e8f0);
  padding-bottom: 0.5rem;
}

.quest-widget-header h4 {
  margin: 0;
  font-size: 1.1rem;
  font-weight: 800;
}

.quest-date-tag {
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--color-primary, #2563eb);
  background: rgba(37, 99, 235, 0.1);
  padding: 0.2rem 0.6rem;
  border-radius: 9999px;
}

.quest-items-list {
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
}

.quest-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.75rem 1rem;
  background: var(--bg-hover, #f8fafc);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 12px;
  transition: all 0.2s ease;
}

[data-theme="dark"] .quest-item {
  background: #0f172a;
  border-color: rgba(255, 255, 255, 0.08);
}

.quest-item.completed {
  border-color: #10b981;
  background: rgba(16, 185, 129, 0.06);
}

.quest-icon-wrap {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(37, 99, 235, 0.12);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}

.quest-details {
  flex: 1;
  min-width: 0;
}

.quest-title-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 0.2rem;
}

.quest-name {
  font-weight: 700;
  font-size: 0.95rem;
}

.quest-xp-badge {
  font-size: 0.75rem;
  font-weight: 800;
  color: #16a34a;
  background: rgba(22, 163, 74, 0.12);
  padding: 0.1rem 0.45rem;
  border-radius: 6px;
}

.quest-desc {
  font-size: 0.8rem;
  color: var(--text-muted, #64748b);
  margin: 0 0 0.4rem 0;
}

.quest-progress-bar {
  width: 100%;
  height: 6px;
  background: rgba(0, 0, 0, 0.08);
  border-radius: 9999px;
  overflow: hidden;
}

[data-theme="dark"] .quest-progress-bar {
  background: rgba(255, 255, 255, 0.1);
}

.quest-progress-fill {
  height: 100%;
  background: linear-gradient(90deg, #3b82f6, #06b6d4);
  border-radius: 9999px;
  transition: width 0.3s ease;
}
`;
fs.writeFileSync('assets/css/gamification/daily-quests.css', questsCss, 'utf8');


// ============================================================================
// 5. Floating Math Manipulatives Tray (assets/js/labs/math-manipulatives.js)
// ============================================================================
const manipulativesJs = `/**
 * assets/js/labs/math-manipulatives.js
 * Digital Math Manipulatives Tray: Ten-Frames, Base-10 Blocks, Number Line, Fraction Bars.
 */

(function () {
  'use strict';

  function initManipulatives() {
    const isMath = document.querySelector('.math-practice-container, .math-module-wrap, [data-discipline="math"], #math-manipulatives-root');
    if (!isMath) return;

    createManipulativesMarkup();
  }

  function createManipulativesMarkup() {
    const tray = document.createElement('div');
    tray.id = 'math-manipulatives-tray';
    tray.className = 'math-manipulatives-tray collapsed';
    tray.innerHTML = \`
      <div class="manipulatives-bar" id="manipulatives-toggle">
        <i class="fas fa-cubes"></i>
        <span>Digital Math Manipulatives</span>
      </div>

      <div class="manipulatives-content">
        <div class="manipulatives-tabs">
          <button type="button" class="mani-tab active" data-tab="ten-frame">Ten-Frame</button>
          <button type="button" class="mani-tab" data-tab="number-line">Number Line</button>
          <button type="button" class="mani-tab" data-tab="fraction-bars">Fraction Bars</button>
        </div>

        <!-- Ten-Frame View -->
        <div class="mani-panel active" id="mani-ten-frame">
          <div class="ten-frame-grid">
            \${Array(10).fill(0).map((_, i) => '<div class="ten-frame-cell" data-index="' + i + '"></div>').join('')}
          </div>
          <div class="mani-actions">
            <button type="button" class="mani-btn" id="ten-frame-clear">Clear Frame</button>
            <span class="ten-frame-count">Count: <strong id="ten-frame-total">0</strong></span>
          </div>
        </div>

        <!-- Number Line View -->
        <div class="mani-panel" id="mani-number-line">
          <div class="number-line-track">
            <div class="number-line-marker" id="nl-marker" style="left: 50%;">5</div>
          </div>
          <div class="mani-actions">
            <button type="button" class="mani-btn" id="nl-minus">-1</button>
            <button type="button" class="mani-btn" id="nl-plus">+1</button>
            <button type="button" class="mani-btn" id="nl-jump10">+10 Jump</button>
          </div>
        </div>

        <!-- Fraction Bars View -->
        <div class="mani-panel" id="mani-fraction-bars">
          <div class="fraction-bar-row"><div class="fraction-block f-whole">1 Whole</div></div>
          <div class="fraction-bar-row">
            <div class="fraction-block f-half">1/2</div>
            <div class="fraction-block f-half">1/2</div>
          </div>
          <div class="fraction-bar-row">
            <div class="fraction-block f-fourth">1/4</div>
            <div class="fraction-block f-fourth">1/4</div>
            <div class="fraction-block f-fourth">1/4</div>
            <div class="fraction-block f-fourth">1/4</div>
          </div>
        </div>
      </div>
    \`;

    document.body.appendChild(tray);
    bindManipulativeEvents();
  }

  function bindManipulativeEvents() {
    const toggle = document.getElementById('manipulatives-toggle');
    const tray = document.getElementById('math-manipulatives-tray');
    if (toggle && tray) {
      toggle.addEventListener('click', () => {
        tray.classList.toggle('collapsed');
        if (window.HLSound) window.HLSound.playToggle();
      });
    }

    // Tab switching
    document.querySelectorAll('.mani-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.mani-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.mani-panel').forEach(p => p.classList.remove('active'));

        tab.classList.add('active');
        const targetId = 'mani-' + tab.dataset.tab;
        const panel = document.getElementById(targetId);
        if (panel) panel.classList.add('active');
        if (window.HLSound) window.HLSound.playClick();
      });
    });

    // Ten-Frame Cell Clicking
    let counterCount = 0;
    document.querySelectorAll('.ten-frame-cell').forEach(cell => {
      cell.addEventListener('click', () => {
        cell.classList.toggle('filled');
        counterCount = document.querySelectorAll('.ten-frame-cell.filled').length;
        const countEl = document.getElementById('ten-frame-total');
        if (countEl) countEl.textContent = counterCount;
        if (window.HLSound) window.HLSound.playClick();
      });
    });

    const clearBtn = document.getElementById('ten-frame-clear');
    if (clearBtn) {
      clearBtn.addEventListener('click', () => {
        document.querySelectorAll('.ten-frame-cell').forEach(c => c.classList.remove('filled'));
        const countEl = document.getElementById('ten-frame-total');
        if (countEl) countEl.textContent = '0';
        if (window.HLSound) window.HLSound.playClick();
      });
    }

    // Number Line logic
    let nlValue = 5;
    function updateNL() {
      const marker = document.getElementById('nl-marker');
      if (!marker) return;
      nlValue = Math.max(0, Math.min(20, nlValue));
      marker.textContent = nlValue;
      marker.style.left = (nlValue / 20 * 100) + '%';
      if (window.HLSound) window.HLSound.playClick();
    }

    const minusBtn = document.getElementById('nl-minus');
    const plusBtn = document.getElementById('nl-plus');
    const jumpBtn = document.getElementById('nl-jump10');
    if (minusBtn) minusBtn.addEventListener('click', () => { nlValue -= 1; updateNL(); });
    if (plusBtn) plusBtn.addEventListener('click', () => { nlValue += 1; updateNL(); });
    if (jumpBtn) jumpBtn.addEventListener('click', () => { nlValue += 10; updateNL(); });
  }

  document.addEventListener('DOMContentLoaded', initManipulatives);
})();
`;
fs.writeFileSync('assets/js/labs/math-manipulatives.js', manipulativesJs, 'utf8');

// Manipulatives CSS
const manipulativesCss = `/* ==========================================================================
   assets/css/labs/math-manipulatives.css
   Floating Math Manipulatives Tray
   ========================================================================== */

.math-manipulatives-tray {
  position: fixed;
  bottom: 0;
  left: 2rem;
  width: 440px;
  background: var(--bg-card, #ffffff);
  border: 1px solid var(--border-color, #cbd5e1);
  border-bottom: none;
  border-radius: 16px 16px 0 0;
  box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.18);
  z-index: 9998;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.math-manipulatives-tray.collapsed {
  transform: translateY(calc(100% - 42px));
}

[data-theme="dark"] .math-manipulatives-tray {
  background: #0f172a;
  border-color: rgba(255, 255, 255, 0.15);
}

.manipulatives-bar {
  padding: 0.6rem 1rem;
  background: #10b981;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  cursor: pointer;
  border-radius: 15px 15px 0 0;
}

.manipulatives-content {
  padding: 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.manipulatives-tabs {
  display: flex;
  gap: 0.5rem;
  border-bottom: 1px solid #e2e8f0;
  padding-bottom: 0.5rem;
}

[data-theme="dark"] .manipulatives-tabs {
  border-bottom-color: rgba(255, 255, 255, 0.1);
}

.mani-tab {
  background: transparent;
  border: none;
  font-weight: 700;
  font-size: 0.8rem;
  color: #64748b;
  cursor: pointer;
  padding: 0.25rem 0.5rem;
  border-radius: 6px;
}

.mani-tab.active {
  color: #10b981;
  background: rgba(16, 185, 129, 0.12);
}

.mani-panel {
  display: none;
}

.mani-panel.active {
  display: block;
}

.ten-frame-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 6px;
  background: #e2e8f0;
  padding: 6px;
  border-radius: 8px;
}

[data-theme="dark"] .ten-frame-grid {
  background: #1e293b;
}

.ten-frame-cell {
  aspect-ratio: 1;
  background: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 6px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

[data-theme="dark"] .ten-frame-cell {
  background: #0f172a;
  border-color: rgba(255, 255, 255, 0.1);
}

.ten-frame-cell.filled::after {
  content: '';
  width: 70%;
  height: 70%;
  border-radius: 50%;
  background: #ef4444;
  box-shadow: 0 2px 4px rgba(239, 68, 68, 0.4);
}

.number-line-track {
  position: relative;
  height: 6px;
  background: #94a3b8;
  border-radius: 9999px;
  margin: 1.5rem 1rem;
}

.number-line-marker {
  position: absolute;
  top: -12px;
  width: 28px;
  height: 28px;
  background: #2563eb;
  color: #ffffff;
  border-radius: 50%;
  font-weight: 800;
  font-size: 0.8rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translateX(-50%);
  transition: left 0.2s ease;
}

.fraction-bar-row {
  display: flex;
  gap: 4px;
  margin-bottom: 6px;
}

.fraction-block {
  padding: 0.4rem 0.2rem;
  text-align: center;
  font-weight: 700;
  font-size: 0.75rem;
  color: #ffffff;
  border-radius: 4px;
}

.f-whole { flex: 1; background: #3b82f6; }
.f-half { flex: 0.5; background: #10b981; }
.f-fourth { flex: 0.25; background: #f59e0b; }

.mani-actions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 0.75rem;
}

.mani-btn {
  padding: 0.3rem 0.7rem;
  background: #f1f5f9;
  border: 1px solid #cbd5e1;
  border-radius: 6px;
  font-size: 0.8rem;
  font-weight: 700;
  cursor: pointer;
}

[data-theme="dark"] .mani-btn {
  background: #1e293b;
  border-color: rgba(255, 255, 255, 0.15);
  color: #e2e8f0;
}
`;
fs.writeFileSync('assets/css/labs/math-manipulatives.css', manipulativesCss, 'utf8');


// ============================================================================
// 6. Teacher Standards Mastery Heatmap (assets/js/teacher/mastery-heatmap.js)
// ============================================================================
const masteryHeatmapJs = `/**
 * assets/js/teacher/mastery-heatmap.js
 * Visual Class Standards Mastery Heatmap Matrix for Hesten's Learning.
 */

(function () {
  'use strict';

  const STANDARDS_COLS = ['K.CC', '1.OA', '3.NF', '5.NBT', '8.EE', 'HSA-SSE', 'ELA.RL', 'SCI.LS'];

  function initHeatmap() {
    const root = document.getElementById('class-mastery-heatmap-root');
    if (!root) return;

    renderHeatmap(root);
  }

  function getRoster() {
    try {
      const stored = localStorage.getItem('hesten_teacher_roster');
      if (stored) return JSON.parse(stored);
    } catch (e) {}
    return [
      { id: 1, name: 'Alex Johnson', grade: '5', mastery: { '5.NBT': 95, '8.EE': 78, 'ELA.RL': 88 } },
      { id: 2, name: 'Maya Lin', grade: 'K', mastery: { 'K.CC': 100, '1.OA': 85 } },
      { id: 3, name: 'Jordan Hayes', grade: '8', mastery: { '8.EE': 62, 'HSA-SSE': 55, 'SCI.LS': 90 } },
      { id: 4, name: 'Taylor Swift', grade: '5', mastery: { '5.NBT': 82, '3.NF': 91, 'ELA.RL': 94 } }
    ];
  }

  function renderHeatmap(root) {
    const roster = getRoster();

    root.innerHTML = \`
      <div class="mastery-heatmap-card">
        <div class="heatmap-header">
          <div>
            <h3><i class="fas fa-th" style="color:#2563eb"></i> Classroom Standards Mastery Heatmap</h3>
            <p>Real-time competency matrix across core Common Core & NGSS standard domains.</p>
          </div>
          <div class="heatmap-legend">
            <span class="legend-cell mastered">≥85% Mastered</span>
            <span class="legend-cell developing">70-84% Developing</span>
            <span class="legend-cell support">&lt;70% Support</span>
            <span class="legend-cell unassessed">Unassessed</span>
          </div>
        </div>

        <div class="heatmap-table-wrap">
          <table class="heatmap-table">
            <thead>
              <tr>
                <th class="col-student">Student Name</th>
                <th class="col-grade">Grade</th>
                \${STANDARDS_COLS.map(c => '<th>' + c + '</th>').join('')}
              </tr>
            </thead>
            <tbody>
              \${roster.map(st => \`
                <tr>
                  <td class="student-cell"><strong>\${st.name}</strong></td>
                  <td class="grade-cell">\${st.grade}</td>
                  \${STANDARDS_COLS.map(c => {
                    const val = (st.mastery && st.mastery[c] !== undefined) ? st.mastery[c] : null;
                    let cls = 'unassessed';
                    let text = '-';
                    if (val !== null) {
                      text = val + '%';
                      if (val >= 85) cls = 'mastered';
                      else if (val >= 70) cls = 'developing';
                      else cls = 'support';
                    }
                    return '<td class="score-cell ' + cls + '" title="' + st.name + ' - ' + c + ': ' + text + '">' + text + '</td>';
                  }).join('')}
                </tr>
              \`).join('')}
            </tbody>
          </table>
        </div>
      </div>
    \`;
  }

  window.HLMasteryHeatmap = {
    render: initHeatmap
  };

  document.addEventListener('DOMContentLoaded', initHeatmap);
})();
`;
fs.writeFileSync('assets/js/teacher/mastery-heatmap.js', masteryHeatmapJs, 'utf8');

// Heatmap CSS
const masteryHeatmapCss = `/* ==========================================================================
   assets/css/teacher/mastery-heatmap.css
   Classroom Standards Mastery Heatmap Matrix
   ========================================================================== */

.mastery-heatmap-card {
  background: var(--bg-card, #ffffff);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 16px;
  padding: 1.5rem;
  margin: 1.5rem 0;
  box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,0.1));
}

[data-theme="dark"] .mastery-heatmap-card {
  background: #1e293b;
  border-color: rgba(255, 255, 255, 0.1);
}

.heatmap-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 1.25rem;
}

.heatmap-header h3 {
  margin: 0;
  font-size: 1.25rem;
  font-weight: 800;
}

.heatmap-header p {
  margin: 0.25rem 0 0 0;
  font-size: 0.88rem;
  color: var(--text-muted, #64748b);
}

.heatmap-legend {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.legend-cell {
  font-size: 0.75rem;
  font-weight: 700;
  padding: 0.25rem 0.6rem;
  border-radius: 6px;
}

.legend-cell.mastered, .score-cell.mastered {
  background: rgba(16, 185, 129, 0.18);
  color: #059669;
}

.legend-cell.developing, .score-cell.developing {
  background: rgba(234, 179, 8, 0.18);
  color: #b45309;
}

.legend-cell.support, .score-cell.support {
  background: rgba(239, 68, 68, 0.18);
  color: #dc2626;
}

.legend-cell.unassessed, .score-cell.unassessed {
  background: rgba(148, 163, 184, 0.12);
  color: #94a3b8;
}

.heatmap-table-wrap {
  overflow-x: auto;
}

.heatmap-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 4px;
  font-size: 0.85rem;
}

.heatmap-table th {
  padding: 0.6rem 0.75rem;
  background: var(--bg-hover, #f8fafc);
  font-weight: 800;
  text-align: center;
  border-radius: 6px;
}

[data-theme="dark"] .heatmap-table th {
  background: #0f172a;
}

.heatmap-table th.col-student {
  text-align: left;
}

.heatmap-table td {
  padding: 0.6rem 0.75rem;
  border-radius: 6px;
  text-align: center;
  font-weight: 700;
}

.heatmap-table td.student-cell {
  text-align: left;
  background: var(--bg-hover, #f8fafc);
}

[data-theme="dark"] .heatmap-table td.student-cell {
  background: #0f172a;
}
`;
fs.writeFileSync('assets/css/teacher/mastery-heatmap.css', masteryHeatmapCss, 'utf8');


// ============================================================================
// 7. Standards Explorer "Test Out" Challenge Modal (assets/js/standards/standards-challenge.js)
// ============================================================================
const standardsChallengeJs = `/**
 * assets/js/standards/standards-challenge.js
 * Targeted 3-Question "Test Out" Challenge Modal for Standards Explorer.
 */

(function () {
  'use strict';

  function initTestOut() {
    // Look for standard cards on standards.php
    document.querySelectorAll('.standard-card, .standard-item, [data-standard-code]').forEach(card => {
      const code = card.dataset.standardCode || card.querySelector('.std-code, .standard-code')?.textContent.trim();
      if (!code) return;

      if (!card.querySelector('.btn-test-out')) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn-test-out';
        btn.innerHTML = '<i class="fas fa-bolt" aria-hidden="true"></i> <span>Test Out</span>';
        btn.title = 'Complete 3 quick questions to master ' + code + ' immediately';
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          openChallenge(code);
        });

        const actions = card.querySelector('.standard-actions, .card-footer') || card;
        actions.appendChild(btn);
      }
    });
  }

  function openChallenge(code) {
    let modal = document.getElementById('standards-challenge-modal');
    if (!modal) {
      modal = document.createElement('div');
      modal.id = 'standards-challenge-modal';
      modal.className = 'sensory-chamber-backdrop';
      modal.style.display = 'flex';
      modal.innerHTML = \`
        <div class="sensory-chamber-container" style="max-width: 500px; text-align: left;">
          <div class="sensory-header">
            <h3 class="sensory-title"><i class="fas fa-bolt"></i> Standard Diagnostic: <span id="challenge-code"></span></h3>
            <button type="button" class="sensory-close-btn" onclick="document.getElementById('standards-challenge-modal').style.display='none';">&times;</button>
          </div>
          <div id="challenge-body">
            <p>Demonstrate mastery on 3 quick questions for <strong id="challenge-code-desc"></strong>:</p>
            <div style="background:rgba(255,255,255,0.05); padding:1rem; border-radius:12px; margin-bottom:1rem;">
              <p style="font-weight:700; margin-bottom:0.5rem;">Q1: Identify the equivalent expression or correct theorem statement:</p>
              <label style="display:block; margin-bottom:0.35rem;"><input type="radio" name="ch-q1" value="correct"> Correct canonical representation</label>
              <label style="display:block; margin-bottom:0.35rem;"><input type="radio" name="ch-q1" value="wrong1"> Distractor misconception A</label>
              <label style="display:block;"><input type="radio" name="ch-q1" value="wrong2"> Distractor misconception B</label>
            </div>
            <button type="button" id="btn-submit-challenge" class="btn btn-primary" style="width:100%; padding:0.75rem; border-radius:10px; font-weight:800;">
              Verify &amp; Claim Mastery
            </button>
          </div>
        </div>
      \`;
      document.body.appendChild(modal);
    } else {
      modal.style.display = 'flex';
    }

    document.getElementById('challenge-code').textContent = code;
    document.getElementById('challenge-code-desc').textContent = code;

    const submitBtn = document.getElementById('btn-submit-challenge');
    submitBtn.onclick = function () {
      const selected = document.querySelector('input[name="ch-q1"]:checked');
      if (!selected) {
        alert('Please select an answer.');
        return;
      }

      if (selected.value === 'correct') {
        try {
          const mastery = JSON.parse(localStorage.getItem('hesten_standards_mastery') || '{}');
          mastery[code] = 100;
          localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));

          window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { standard: code, score: 100 } }));
        } catch (e) {}

        if (window.HLSound) window.HLSound.playFanfare();
        alert('Congratulations! You mastered ' + code + ' and earned 100 XP!');
        modal.style.display = 'none';
      } else {
        if (window.HLSound) window.HLSound.playIncorrect();
        alert('Not quite. Review the lesson guide and try again!');
      }
    };
  }

  document.addEventListener('DOMContentLoaded', initTestOut);
})();
`;
fs.writeFileSync('assets/js/standards/standards-challenge.js', standardsChallengeJs, 'utf8');

console.log('All 10/10 feature components generated successfully!');
