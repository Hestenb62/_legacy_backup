/**
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
    tray.innerHTML = `
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
            ${Array(10).fill(0).map((_, i) => '<div class="ten-frame-cell" data-index="' + i + '"></div>').join('')}
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
    `;

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
