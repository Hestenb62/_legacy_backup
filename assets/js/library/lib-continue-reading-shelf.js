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
                    const pctKey = `hesten_completion_pct_${bookId}`;
                    const pct = parseInt(localStorage.getItem(pctKey) || '10', 10);

                    // Locate card in DOM for metadata
                    const card = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
                    if (card) {
                        progressItems.push({
                            id: bookId,
                            title: card.dataset.title || bookId,
                            img: card.dataset.img || card.dataset.fallbackImg,
                            chapterNum: chapterNum,
                            pct: Math.min(Math.max(pct, 5), 100),
                            readLink: card.dataset.readOnlineLink || `/library/read/index.php?book=${bookId}&chapter=chapter-${chapterNum}`
                        });
                    }
                }
            }
        } catch (e) {}

        if (progressItems.length > 0) {
            cardsContainer.innerHTML = '';
            progressItems.slice(0, 4).forEach(item => {
                const cardEl = document.createElement('a');
                cardEl.className = 'continue-reading-card';
                cardEl.href = item.readLink;
                cardEl.innerHTML = `
                    <img src="${item.img}" alt="${item.title}" class="continue-card-cover" onerror="this.onerror=null; this.src='https://placehold.co/100x150/1e293b/ffffff?text=Book';">
                    <div class="continue-card-details">
                        <h4 class="continue-card-title">${item.title}</h4>
                        <p class="continue-card-chapter"><i class="fas fa-bookmark mr-1"></i> Chapter ${item.chapterNum} &bull; ${item.pct}%</p>
                        <div class="continue-card-bar-wrap">
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
