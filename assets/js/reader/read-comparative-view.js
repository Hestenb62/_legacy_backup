/**
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
