    /* ==========================================================================
       5. Continue Reading Shelf ("Jump Back In")
       ========================================================================== */
    function initContinueReadingShelf() {
        const shelf = document.getElementById('continue-reading-shelf');
        const cardsContainer = document.getElementById('continue-reading-cards');
        if (!shelf || !cardsContainer) return;

        const progressItems = [];

        // Scan localStorage for books in progress
        try {
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if (key && key.startsWith('hesten_progress_') && key.endsWith('_lastChapter')) {
                    const bookId = key.replace('hesten_progress_', '').replace('_lastChapter', '');
                    const chapterNum = parseInt(localStorage.getItem(key) || '1', 10);
                    const chapterSlug = localStorage.getItem(`hesten_progress_${bookId}_lastChapterSlug`) || (chapterNum === 0 ? 'intro' : `chapter-${chapterNum}`);
                    const pctKey = `hesten_completion_pct_${bookId}`;
                    const overallPct = parseInt(localStorage.getItem(pctKey) || '0', 10);
                    const chapterPct = parseFloat(localStorage.getItem(`hesten_scroll_pct_${bookId}_chapter_${chapterNum}`) || '0');
                    const lastRead = parseInt(localStorage.getItem(`hesten_last_read_${bookId}`) || '0', 10);

                    // Locate card in DOM for metadata
                    const card = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
                    let title = bookId;
                    let img = 'https://placehold.co/100x150/1e293b/ffffff?text=Book';

                    if (card) {
                        title = card.dataset.title || bookId;
                        img = card.dataset.img || card.dataset.fallbackImg || img;
                    } else {
                        // Human-readable title from slug fallback
                        title = bookId.replace(/[-_]/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
                    }

                    // Chapter reading progress takes priority for chapter resumption
                    const displayPct = chapterPct > 0 ? Math.round(chapterPct) : (overallPct > 0 ? overallPct : 5);
                    const targetPct = chapterPct > 0 ? Math.round(chapterPct) : (overallPct > 0 ? overallPct : 0);

                    let chapterLabel = `Chapter ${chapterNum}`;
                    if (chapterSlug === 'intro' || chapterNum === 0) {
                        chapterLabel = 'Introduction';
                    } else if (chapterSlug.includes('teacher')) {
                        chapterLabel = 'Teacher Resources';
                    }

                    const readLink = `read/index.php?book=${encodeURIComponent(bookId)}&chapter=${encodeURIComponent(chapterSlug)}&pct=${targetPct}&resume=true`;

                    progressItems.push({
                        id: bookId,
                        title: title,
                        img: img,
                        chapterNum: chapterNum,
                        chapterSlug: chapterSlug,
                        chapterLabel: chapterLabel,
                        chapterPct: Math.round(chapterPct),
                        overallPct: overallPct,
                        pct: Math.min(Math.max(displayPct, 5), 100),
                        lastRead: lastRead,
                        readLink: readLink
                    });
                }
            }
        } catch (e) {
            console.warn('Error reading library progress from localStorage', e);
        }

        // Sort by most recently read descending
        progressItems.sort((a, b) => b.lastRead - a.lastRead);

        if (progressItems.length > 0) {
            cardsContainer.innerHTML = '';
            progressItems.slice(0, 4).forEach(item => {
                const cardEl = document.createElement('a');
                cardEl.className = 'continue-reading-card';
                cardEl.href = item.readLink;
                cardEl.setAttribute('aria-label', `Continue reading ${item.title}, ${item.chapterLabel} at ${item.pct} percent`);
                cardEl.title = `Resume ${item.title} at ${item.chapterLabel} (${item.pct}%)`;
                cardEl.innerHTML = `
                    <img src="${item.img}" alt="${item.title}" class="continue-card-cover" onerror="this.onerror=null; this.src='https://placehold.co/100x150/1e293b/ffffff?text=Book';">
                    <div class="continue-card-details">
                        <h4 class="continue-card-title" title="${item.title}">${item.title}</h4>
                        <p class="continue-card-chapter">
                            <i class="fas fa-bookmark mr-1"></i> ${item.chapterLabel} &bull; ${item.pct}%
                        </p>
                        <div class="continue-card-bar-wrap" title="${item.chapterLabel} progress: ${item.pct}%">
                            <div class="continue-card-bar-fill" style="width: ${item.pct}%;"></div>
                        </div>
                    </div>
                `;
                cardsContainer.appendChild(cardEl);
            });
            shelf.classList.remove('hidden');
        } else {
            shelf.classList.add('hidden');
        }
    }

    function setupProgressBars() {
        document.querySelectorAll('.book-progress-track').forEach(track => {
            const id = track.dataset.progressId;
            if (id) {
                try {
                    const pct = localStorage.getItem(`hesten_completion_pct_${id}`);
                    if (pct && parseInt(pct, 10) > 0) {
                        const fill = track.querySelector('.book-progress-fill');
                        if (fill) fill.style.width = `${Math.min(parseInt(pct, 10), 100)}%`;
                        track.classList.remove('hidden');
                    }
                } catch (e) {}
            }
        });
    }

    // Expose functions globally
    window.initContinueReadingShelf = initContinueReadingShelf;
    window.setupProgressBars = setupProgressBars;

    // Cross-tab and live sync reactivity
    window.addEventListener('storage', (e) => {
        if (e.key && (e.key.startsWith('hesten_progress_') || e.key.startsWith('hesten_scroll_') || e.key.startsWith('hesten_completion_'))) {
            initContinueReadingShelf();
            setupProgressBars();
        }
    });
    window.addEventListener('hl:data-sync', () => {
        initContinueReadingShelf();
        setupProgressBars();
    });
