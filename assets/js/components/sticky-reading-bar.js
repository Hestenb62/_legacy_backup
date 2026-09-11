/**
 * sticky-reading-bar.js - Sticky Compact Reading & Lesson Progress Bar
 * Handles real-time scroll depth, remaining time estimation, and reading actions.
 */

(function () {
  'use strict';

  class StickyReadingBar {
    constructor() {
      this.bar = document.getElementById('sticky-reading-bar');
      if (!this.bar) return;

      this.progressFill = document.getElementById('sticky-progress-fill');
      this.pctBadge = document.getElementById('sticky-pct-badge');
      this.timeLeftEl = document.getElementById('sticky-time-left');
      this.zenBtn = document.getElementById('sticky-zen-toggle');
      this.offlineBtn = document.getElementById('sticky-offline-toggle');

      this.contentEl = document.querySelector('article') ||
                       document.querySelector('.cdn-book-reader-content') ||
                       document.querySelector('.lesson-card') ||
                       document.getElementById('main-content') ||
                       document.body;

      this.totalWords = this.estimateWordCount();
      this.wpm = 180; // Standard reading speed
      this.lastScrollY = 0;
      this.ticking = false;

      this.initEvents();
      this.updateProgress();
    }

    estimateWordCount() {
      if (!this.contentEl) return 500;
      const text = this.contentEl.innerText || this.contentEl.textContent || '';
      const words = text.trim().split(/\s+/).length;
      return Math.max(words, 100);
    }

    initEvents() {
      window.addEventListener('scroll', () => {
        if (!this.ticking) {
          window.requestAnimationFrame(() => {
            this.updateProgress();
            this.ticking = false;
          });
          this.ticking = true;
        }
      }, { passive: true });

      // Zen Mode Toggle
      if (this.zenBtn) {
        this.zenBtn.addEventListener('click', () => {
          document.body.classList.toggle('zen-mode');
          const isZen = document.body.classList.contains('zen-mode');
          this.zenBtn.classList.toggle('active', isZen);
          this.zenBtn.setAttribute('aria-pressed', isZen ? 'true' : 'false');
          if (typeof window.announceA11y === 'function') {
            window.announceA11y(isZen ? 'Distraction-free zen mode activated' : 'Zen mode deactivated');
          }
        });
      }

      // Offline Material Downloader Hook
      if (this.offlineBtn) {
        this.offlineBtn.addEventListener('click', () => {
          if (typeof window.saveCurrentMaterialOffline === 'function') {
            window.saveCurrentMaterialOffline(this.offlineBtn);
          }
        });
        // Check if current material is already cached
        this.checkCachedState();
      }

      window.addEventListener('resize', () => this.updateProgress(), { passive: true });
    }

    checkCachedState() {
      try {
        const downloads = JSON.parse(localStorage.getItem('hl_offline_downloads') || '[]');
        const currentUrl = window.location.pathname + window.location.search;
        const exists = downloads.some(d => d.url === currentUrl || d.url === window.location.pathname);
        if (exists && this.offlineBtn) {
          this.offlineBtn.classList.add('active');
          this.offlineBtn.setAttribute('title', 'Saved offline in Offline Station');
          this.offlineBtn.innerHTML = '<i class="fas fa-check-circle" style="color: #10b981;" aria-hidden="true"></i>';
        }
      } catch (e) {}
    }

    updateProgress() {
      const scrollY = window.scrollY || window.pageYOffset;
      const docHeight = document.documentElement.scrollHeight;
      const winHeight = window.innerHeight;
      const maxScroll = docHeight - winHeight;

      // Reveal bar after scrolling past 150px, or keep pinned if unified reader bar
      if (this.bar.classList.contains('sticky-reader-unified')) {
        this.bar.classList.add('is-active');
      } else if (scrollY > 150) {
        this.bar.classList.add('is-active');
      } else {
        this.bar.classList.remove('is-active');
      }

      const progress = maxScroll > 0 ? Math.min(100, Math.max(0, (scrollY / maxScroll) * 100)) : 0;
      const rounded = Math.round(progress);

      if (this.progressFill) {
        this.progressFill.style.width = `${progress}%`;
      }

      if (this.pctBadge) {
        this.pctBadge.textContent = `${rounded}%`;
      }

      // Compute dynamic time remaining
      if (this.timeLeftEl) {
        const wordsRemaining = Math.max(0, this.totalWords * (1 - progress / 100));
        const minsLeft = Math.ceil(wordsRemaining / this.wpm);
        if (progress >= 95) {
          this.timeLeftEl.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> <span>Complete</span>';
        } else {
          this.timeLeftEl.innerHTML = `<i class="far fa-clock" aria-hidden="true"></i> <span>~${minsLeft} min left</span>`;
        }
      }
    }
  }

  // Auto-init on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => new StickyReadingBar());
  } else {
    new StickyReadingBar();
  }
})();
