    /* ==========================================================================
       8. Single-Page Realistic Book Mode & Page-Flip Engine
       ========================================================================== */
    function initSinglePageBookMode(meta, prefsKey) {
        const bookStage = document.getElementById("book-stage");
        const bookFrame = document.getElementById("book-frame");
        const bookViewport = document.getElementById("book-page-viewport");
        const bookContent = document.getElementById("book-content");
        const prevPageBtn = document.getElementById("book-page-prev-btn");
        const nextPageBtn = document.getElementById("book-page-next-btn");
        const pageIndicator = document.getElementById("book-page-indicator");
        const readingTimePill = document.getElementById("book-reading-time-pill");
        const scrubberTrack = document.getElementById("book-scrubber-track");
        const scrubberFill = document.getElementById("book-scrubber-fill");
        const toggleViewModeBtn = document.getElementById("toggle-view-mode-btn");

        if (!bookContent || !bookViewport) return;

        const VIEW_MODE_KEY = 'hesten_reader_view_mode';
        let currentViewMode = 'book';
        try {
            const savedMode = localStorage.getItem(VIEW_MODE_KEY);
            if (savedMode === 'scroll' || savedMode === 'book') {
                currentViewMode = savedMode;
            }
        } catch (e) {}

        let currentPage = 1;
        let totalPages = 1;
        let columnStride = 0;
        let totalWordCount = 0;

        // Standard Educational Grade-Level WPM Benchmark Mapper
        function getGradeLevelWpm(gradeStr) {
            if (!gradeStr) return 225;
            const str = String(gradeStr).toLowerCase();
            if (str.includes('k') || str.includes('1') || str.includes('2')) return 100;
            if (str.includes('3') || str.includes('4')) return 135;
            if (str.includes('5') || str.includes('6')) return 165;
            if (str.includes('7') || str.includes('8')) return 195;
            if (str.includes('9') || str.includes('10') || str.includes('11') || str.includes('12') || str.includes('high')) return 225;
            if (str.includes('college') || str.includes('adult') || str.includes('advanced')) return 260;
            return 225;
        }

        const gradeWpm = getGradeLevelWpm(meta.grade || 'Grades 9-12');

        // Count words in chapter
        function countWords() {
            const text = bookContent.innerText || bookContent.textContent || '';
            const words = text.trim().split(/\s+/).filter(w => w.length > 0);
            totalWordCount = Math.max(1, words.length);
        }
        countWords();

        function setViewMode(mode) {
            currentViewMode = mode;
            try {
                localStorage.setItem(VIEW_MODE_KEY, mode);
            } catch (e) {}

            document.body.classList.remove('mode-book', 'mode-scroll');
            document.body.classList.add(`mode-${mode}`);

            if (toggleViewModeBtn) {
                toggleViewModeBtn.innerHTML = mode === 'book' ? '<i class="fas fa-book-open"></i>' : '<i class="fas fa-scroll"></i>';
                toggleViewModeBtn.title = mode === 'book' ? 'Switch to Continuous Scroll View' : 'Switch to Realistic Book Page-Flip View';
            }

            document.querySelectorAll('.settings-mode').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.mode === mode);
            });

            if (mode === 'book') {
                recalculatePagination();
                handleUrlHash();
            } else {
                bookContent.style.transform = '';
            }
        }

        function recalculatePagination() {
            if (currentViewMode !== 'book') return;

            const viewportWidth = bookViewport.clientWidth;
            const viewportHeight = bookViewport.clientHeight;
            if (viewportWidth <= 0 || viewportHeight <= 0) return;

            const columnGap = 64; // matching CSS column-gap (4rem)
            bookContent.style.columnWidth = `${viewportWidth}px`;
            bookContent.style.columnGap = `${columnGap}px`;

            const contentScrollWidth = bookContent.scrollWidth;
            columnStride = viewportWidth + columnGap;
            totalPages = Math.max(1, Math.ceil((contentScrollWidth + (columnGap / 2)) / columnStride));

            if (currentPage > totalPages) {
                currentPage = totalPages;
            } else if (currentPage < 1) {
                currentPage = 1;
            }

            window.CURRENT_READER_PAGE = currentPage;
            window.TOTAL_READER_PAGES = totalPages;

            updatePageDisplay(false);
        }

        function updatePageDisplay(animate = false, direction = 'forward') {
            if (currentViewMode !== 'book') return;

            const offset = (currentPage - 1) * columnStride;
            bookContent.style.transform = `translateX(-${offset}px)`;

            if (pageIndicator) {
                pageIndicator.innerHTML = `<i class="fas fa-file-alt"></i> Page ${currentPage} of ${totalPages}`;
            }

            if (readingTimePill) {
                const wordsRemaining = Math.max(0, Math.round(totalWordCount * ((totalPages - currentPage) / totalPages)));
                const minutesRemaining = Math.ceil(wordsRemaining / gradeWpm);
                const timeText = minutesRemaining <= 1 ? '< 1 min left' : `~${minutesRemaining} min left`;
                readingTimePill.innerHTML = `<i class="fas fa-clock"></i> ${timeText}`;
                readingTimePill.title = `Estimated time remaining at ${gradeWpm} WPM (${meta.grade || 'Grades 9-12'} pace)`;
            }

            if (scrubberFill) {
                const pct = totalPages > 1 ? Math.round(((currentPage - 1) / (totalPages - 1)) * 100) : 100;
                scrubberFill.style.width = `${pct}%`;
            }

            if (prevPageBtn) {
                prevPageBtn.disabled = currentPage <= 1;
                prevPageBtn.classList.toggle('disabled', currentPage <= 1);
            }
            if (nextPageBtn) {
                nextPageBtn.disabled = currentPage >= totalPages;
                nextPageBtn.classList.toggle('disabled', currentPage >= totalPages);
            }

            if (animate && bookFrame) {
                const animClass = direction === 'forward' ? 'flip-forward' : 'flip-backward';
                bookFrame.classList.remove('flip-forward', 'flip-backward');
                void bookFrame.offsetWidth;
                bookFrame.classList.add(animClass);
                setTimeout(() => {
                    bookFrame.classList.remove(animClass);
                }, 420);
            }
        }

        function goToPage(targetPage, updateHash = true, animate = true, direction = null) {
            const clamped = Math.max(1, Math.min(targetPage, totalPages));
            if (clamped === currentPage && !animate) return;

            const dir = direction || (clamped >= currentPage ? 'forward' : 'backward');
            currentPage = clamped;
            window.CURRENT_READER_PAGE = currentPage;

            updatePageDisplay(animate, dir);

            if (updateHash) {
                const targetHash = `#page-${currentPage}`;
                if (window.location.hash !== targetHash) {
                    history.pushState(null, '', targetHash);
                }
            }
        }

        function handleUrlHash() {
            const hash = window.location.hash;
            if (hash && /^#page-\d+$/i.test(hash)) {
                const pageNum = parseInt(hash.replace('#page-', ''), 10);
                if (!isNaN(pageNum) && pageNum >= 1) {
                    goToPage(pageNum, false, false);
                }
            }
        }

        window.jumpToReaderPage = function (pageNum) {
            setViewMode('book');
            setTimeout(() => {
                goToPage(pageNum, true, true);
            }, 50);
        };
        window.recalculateReaderPages = recalculatePagination;

        if (toggleViewModeBtn) {
            toggleViewModeBtn.addEventListener("click", () => {
                setViewMode(currentViewMode === 'book' ? 'scroll' : 'book');
            });
        }

        document.querySelectorAll(".settings-mode").forEach(btn => {
            btn.addEventListener("click", () => {
                setViewMode(btn.dataset.mode);
            });
        });

        if (prevPageBtn) {
            prevPageBtn.addEventListener("click", () => {
                if (currentPage > 1) {
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            });
        }

        if (nextPageBtn) {
            nextPageBtn.addEventListener("click", () => {
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            });
        }

        if (scrubberTrack) {
            scrubberTrack.addEventListener("click", (e) => {
                const rect = scrubberTrack.getBoundingClientRect();
                const clickX = e.clientX - rect.left;
                const pct = Math.max(0, Math.min(1, clickX / rect.width));
                const targetPage = Math.max(1, Math.min(totalPages, Math.round(pct * (totalPages - 1)) + 1));
                goToPage(targetPage, true, true);
            });
        }

        document.addEventListener("keydown", (e) => {
            if (['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName)) return;
            const openModal = document.querySelector(".modal-overlay:not(.hidden)");
            if (openModal && openModal.style.display !== "none") return;

            if (currentViewMode !== 'book') return;

            if (e.key === "ArrowRight" || e.key === "PageDown") {
                if (currentPage < totalPages) {
                    e.preventDefault();
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            } else if (e.key === "ArrowLeft" || e.key === "PageUp") {
                if (currentPage > 1) {
                    e.preventDefault();
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            } else if (e.key === " " && !e.shiftKey) {
                if (currentPage < totalPages) {
                    e.preventDefault();
                    goToPage(currentPage + 1, true, true, 'forward');
                }
            } else if (e.key === " " && e.shiftKey) {
                if (currentPage > 1) {
                    e.preventDefault();
                    goToPage(currentPage - 1, true, true, 'backward');
                }
            }
        });

        let touchStartX = 0;
        let touchStartY = 0;
        bookViewport.addEventListener("touchstart", (e) => {
            if (e.touches && e.touches.length === 1) {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
            }
        }, { passive: true });

        bookViewport.addEventListener("touchend", (e) => {
            if (e.changedTouches && e.changedTouches.length === 1) {
                const diffX = e.changedTouches[0].clientX - touchStartX;
                const diffY = e.changedTouches[0].clientY - touchStartY;
                if (Math.abs(diffX) > 45 && Math.abs(diffX) > Math.abs(diffY) * 1.5) {
                    if (diffX < 0 && currentPage < totalPages) {
                        goToPage(currentPage + 1, true, true, 'forward');
                    } else if (diffX > 0 && currentPage > 1) {
                        goToPage(currentPage - 1, true, true, 'backward');
                    }
                }
            }
        }, { passive: true });

        window.addEventListener("hashchange", handleUrlHash);
        window.addEventListener("popstate", handleUrlHash);

        if (window.ResizeObserver) {
            const ro = new ResizeObserver(() => {
                recalculatePagination();
            });
            ro.observe(bookViewport);
        } else {
            window.addEventListener("resize", recalculatePagination);
        }

        setViewMode(currentViewMode);
        setTimeout(() => {
            recalculatePagination();
            handleUrlHash();
        }, 120);
    }

