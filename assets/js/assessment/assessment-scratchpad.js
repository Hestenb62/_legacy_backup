/**
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

    wrapper.innerHTML = `
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
    `;

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
