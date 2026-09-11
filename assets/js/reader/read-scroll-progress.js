    /* ==========================================================================
       2. Scroll Progress & Floating Resume Alert Banner
       ========================================================================== */
    function initScrollProgress(scrollPosKey, completionKey, currentChapter, totalChapters, scrollPctKey, bookId, meta) {
        const progressBar = document.getElementById("progress-bar");

        if (!meta) meta = window.BOOK_METADATA || {};
        if (!bookId) bookId = meta.id || 'default';
        if (!scrollPctKey) scrollPctKey = `hesten_scroll_pct_${bookId}_chapter_${currentChapter}`;

        const chapterLabel = (meta.chapter === 'intro' || currentChapter === 0) 
            ? 'Introduction' 
            : (meta.chapterTitle || `Chapter ${currentChapter}`);

        let userHasScrolledManually = false;
        let autoResumed = false;

        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        function doSaveScroll(scrollTop, scrollPct) {
            try {
                const clampedPct = Math.min(Math.max(scrollPct, 0), 100);
                const roundedPct = Math.round(clampedPct);
                localStorage.setItem(scrollPosKey, Math.round(scrollTop));
                localStorage.setItem(scrollPctKey, roundedPct);

                const validTotal = Math.max(totalChapters || 1, 1);
                const overallPct = Math.round(((currentChapter - 1) / validTotal) * 100 + (clampedPct / validTotal));
                localStorage.setItem(completionKey, Math.min(Math.max(overallPct, 0), 100));

                localStorage.setItem(`hesten_progress_${bookId}_lastChapter`, currentChapter);
                localStorage.setItem(`hesten_progress_${bookId}_lastChapterSlug`, meta.chapter || `chapter-${currentChapter}`);
                localStorage.setItem(`hesten_progress_${bookId}_lastScrollPct`, roundedPct);
                localStorage.setItem(`hesten_last_read_${bookId}`, Date.now());
            } catch (e) {}
        }

        const saveScrollPos = debounce(doSaveScroll, 150);

        // Immediate flush on page navigation or tab unload
        const flushSave = () => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            doSaveScroll(scrollTop, scrollPct);
        };
        window.addEventListener('beforeunload', flushSave);
        window.addEventListener('pagehide', flushSave);

        // Track user intentional manual scrolling vs automatic resumption
        const markManualScroll = () => {
            userHasScrolledManually = true;
        };
        window.addEventListener('wheel', markManualScroll, { passive: true });
        window.addEventListener('touchstart', markManualScroll, { passive: true });
        window.addEventListener('keydown', (e) => {
            if (['ArrowUp', 'ArrowDown', 'PageUp', 'PageDown', 'Space', 'Home', 'End'].includes(e.code)) {
                userHasScrolledManually = true;
            }
        }, { passive: true });

        window.addEventListener("scroll", () => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

            if (progressBar) {
                progressBar.style.width = `${Math.min(Math.max(scrollPct, 0), 100)}%`;
            }

            saveScrollPos(scrollTop, scrollPct);
        });

        // Determine resume request from URL query params or stored state
        const urlParams = new URLSearchParams(window.location.search);
        const isExplicitResume = urlParams.get('resume') === 'true' || urlParams.get('resume') === '1' || urlParams.has('pct');
        const paramPct = urlParams.has('pct') ? parseFloat(urlParams.get('pct')) : null;

        const savedPct = parseFloat(localStorage.getItem(scrollPctKey) || '0');
        const savedPos = parseFloat(localStorage.getItem(scrollPosKey) || '0');
        const effectivePct = (paramPct !== null && !isNaN(paramPct)) ? paramPct : savedPct;

        function computeTargetScrollY() {
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            if (docHeight <= 0) return 0;
            if (effectivePct > 0) {
                return Math.round((effectivePct / 100) * docHeight);
            }
            if (savedPos > 0) {
                return Math.min(Math.round(savedPos), docHeight);
            }
            return 0;
        }

        function showResumeToast(isAuto, displayPct) {
            const toast = document.getElementById("resume-toast");
            const confirmBtn = document.getElementById("resume-toast-confirm");
            const dismissBtn = document.getElementById("resume-toast-dismiss");
            if (!toast) return;

            const titleEl = toast.querySelector('.resume-toast-title');
            const descEl = toast.querySelector('.resume-toast-desc');

            if (isAuto) {
                if (titleEl) titleEl.innerHTML = `<i class="fas fa-check-circle" style="color:#10b981; margin-right:0.35rem;"></i> Resumed at ${displayPct}%`;
                if (descEl) descEl.textContent = `Scrolled to where you left off in ${chapterLabel}.`;
                if (confirmBtn) {
                    confirmBtn.textContent = "Start at Top";
                    confirmBtn.onclick = () => {
                        userHasScrolledManually = true;
                        window.scrollTo({ top: 0, behavior: "smooth" });
                        toast.classList.add("hidden");
                    };
                }
                if (dismissBtn) {
                    dismissBtn.textContent = "Dismiss";
                    dismissBtn.onclick = () => toast.classList.add("hidden");
                }
                toast.classList.remove("hidden");

                setTimeout(() => {
                    if (!toast.classList.contains("hidden")) {
                        toast.classList.add("hidden");
                    }
                }, 4500);
            } else {
                if (titleEl) titleEl.textContent = "Resume Reading?";
                if (descEl) descEl.textContent = `Pick up at ${displayPct}% in ${chapterLabel}.`;
                if (confirmBtn) {
                    confirmBtn.textContent = "Resume";
                    confirmBtn.onclick = () => {
                        const targetY = computeTargetScrollY();
                        window.scrollTo({ top: targetY, behavior: "smooth" });
                        toast.classList.add("hidden");
                    };
                }
                if (dismissBtn) {
                    dismissBtn.textContent = "Dismiss";
                    dismissBtn.onclick = () => toast.classList.add("hidden");
                }
                toast.classList.remove("hidden");
            }
        }

        function performAutoResume() {
            if (autoResumed) return;
            const targetY = computeTargetScrollY();
            if (targetY > 60) {
                autoResumed = true;
                window.scrollTo({ top: targetY, behavior: "smooth" });

                const pctVal = Math.min(Math.max(effectivePct, 0), 100);
                if (progressBar) progressBar.style.width = `${pctVal}%`;

                const stickyFill = document.getElementById('sticky-progress-fill');
                if (stickyFill) stickyFill.style.width = `${pctVal}%`;
                const stickyBadge = document.getElementById('sticky-pct-badge');
                if (stickyBadge) stickyBadge.textContent = `${Math.round(pctVal)}%`;

                showResumeToast(true, Math.round(pctVal));
            }
        }

        if (isExplicitResume && (effectivePct > 0 || savedPos > 80)) {
            // Immediate initial scroll once DOM is ready
            setTimeout(() => {
                performAutoResume();
            }, 100);

            // Re-alignment check after late assets / fonts / MathJax settle
            const stabilize = () => {
                if (!userHasScrolledManually && effectivePct > 0) {
                    const targetY = computeTargetScrollY();
                    if (Math.abs(window.scrollY - targetY) > 50) {
                        window.scrollTo({ top: targetY, behavior: "instant" });
                    }
                }
            };

            window.addEventListener('load', stabilize, { once: true });
            setTimeout(stabilize, 600);
            setTimeout(stabilize, 1200);
        } else {
            // Non-explicit visit: show opt-in toast if saved scroll position exists
            setTimeout(() => {
                const targetY = computeTargetScrollY();
                if (targetY > 200 && !userHasScrolledManually) {
                    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    const displayPct = effectivePct > 0 ? Math.round(effectivePct) : Math.round((targetY / Math.max(docHeight, 1)) * 100);
                    showResumeToast(false, displayPct);
                }
            }, 500);
        }
    }
    window.initScrollProgress = initScrollProgress;
