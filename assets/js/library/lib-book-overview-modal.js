    /* ==========================================================================
       7. Book Overview Modal (Knowledge Portal)
       ========================================================================== */
    window.openModal = function (card) {
        if (!card) return;
        const d = card.dataset;
        window.currentBookId = d.id;
        currentBookData = d;

        const modal = document.getElementById('bookModal');
        if (!modal) return;

        // Cover & Title
        const imgEl = document.getElementById('modal-img');
        if (imgEl) {
            imgEl.src = d.img || d.fallbackImg || 'https://placehold.co/300x450/1e293b/ffffff?text=Book';
            imgEl.alt = d.title || 'Book Cover';
        }

        const titleEl = document.getElementById('modal-title');
        if (titleEl) titleEl.textContent = d.title || 'Untitled Book';

        const authorEl = document.getElementById('modal-author');
        if (authorEl) authorEl.textContent = d.author ? `by ${d.author}` : '';

        // Published & ISBN
        const dateEl = document.getElementById('modal-date');
        const dateCont = document.getElementById('modal-date-container');
        if (dateEl) dateEl.textContent = d.date || 'Unknown';
        if (dateCont) dateCont.classList.toggle('hidden', !d.date || d.date === '#');

        const isbnEl = document.getElementById('modal-isbn');
        const isbnCont = document.getElementById('modal-isbn-container');
        if (isbnEl) isbnEl.textContent = d.isbn || 'N/A';
        if (isbnCont) isbnCont.classList.toggle('hidden', !d.isbn || d.isbn === '#');

        // Lexile
        const lexileEl = document.getElementById('modal-lexile');
        const lexileCont = document.getElementById('modal-lexile-container');
        if (lexileEl) lexileEl.textContent = d.lexile || 'Unrated';
        if (lexileCont) lexileCont.classList.toggle('hidden', !d.lexile || d.lexile === '#');

        // Call Number
        const callnoEl = document.getElementById('modal-callno');
        const callnoCont = document.getElementById('modal-callno-container');
        if (callnoEl) callnoEl.textContent = d.callNumber || '';
        if (callnoCont) callnoCont.classList.toggle('hidden', !d.callNumber);

        // Dewey Decimal
        const deweyEl = document.getElementById('modal-dewey');
        const deweyCont = document.getElementById('modal-dewey-container');
        if (deweyEl) deweyEl.textContent = d.dewey || '';
        if (deweyCont) deweyCont.classList.toggle('hidden', !d.dewey);

        // LC Class
        const lcEl = document.getElementById('modal-lc');
        const lcCont = document.getElementById('modal-lc-container');
        if (lcEl) lcEl.textContent = d.lc || '';
        if (lcCont) lcCont.classList.toggle('hidden', !d.lc);

        // Description
        const descEl = document.getElementById('modal-description');
        if (descEl) descEl.textContent = d.description || 'No description available.';

        // Read Online / Continue Reading Button
        const readBtn = document.getElementById('modal-read-online-link');
        const dualVolContainer = document.getElementById('modal-dual-volume-actions');
        const vol1Btn = document.getElementById('modal-read-vol1-link');
        const vol2Btn = document.getElementById('modal-read-vol2-link');

        const isDualVolume = (d.id === 'american-yawp') || Boolean(d.readOnlineVol1Link && d.readOnlineVol2Link);

        if (isDualVolume) {
            if (readBtn) {
                readBtn.classList.add('hidden');
                readBtn.style.display = 'none';
            }
            if (dualVolContainer) {
                dualVolContainer.classList.remove('hidden');
                dualVolContainer.style.display = 'inline-flex';
            }
            if (vol1Btn) {
                const vol1Url = d.readOnlineVol1Link || 'read/index.php?book=american-yawp&chapter=chapter-1';
                vol1Btn.href = vol1Url;
                vol1Btn.setAttribute('title', 'Read The American Yawp Volume 1: Before 1877 Online');
                vol1Btn.setAttribute('aria-label', 'Read Volume 1 (Before 1877) Online');
            }
            if (vol2Btn) {
                const vol2Url = d.readOnlineVol2Link || 'read/index.php?book=american-yawp&chapter=chapter-15';
                vol2Btn.href = vol2Url;
                vol2Btn.setAttribute('title', 'Read The American Yawp Volume 2: After 1877 Online');
                vol2Btn.setAttribute('aria-label', 'Read Volume 2 (After 1877) Online');
            }
        } else {
            if (dualVolContainer) {
                dualVolContainer.classList.add('hidden');
                dualVolContainer.style.display = 'none';
            }
            if (readBtn) {
                readBtn.classList.remove('hidden');
                readBtn.style.display = 'inline-flex';
                let lastChapter = null;
                let lastChapterSlug = null;
                let lastPct = null;
                try {
                    lastChapter = localStorage.getItem(`hesten_progress_${d.id}_lastChapter`);
                    lastChapterSlug = localStorage.getItem(`hesten_progress_${d.id}_lastChapterSlug`);
                    lastPct = localStorage.getItem(`hesten_scroll_pct_${d.id}_chapter_${lastChapter}`);
                } catch(e) {}

                if (lastChapter !== null && lastChapter !== undefined && lastChapter !== '') {
                    const chNum = parseInt(lastChapter, 10);
                    const chSlug = lastChapterSlug || (chNum === 0 ? 'intro' : `chapter-${chNum}`);
                    const pctVal = Math.round(parseFloat(lastPct || '0'));
                    const chLabel = (chSlug === 'intro' || chNum === 0) ? 'Intro' : `Ch. ${chNum}`;

                    readBtn.href = `read/index.php?book=${encodeURIComponent(d.id)}&chapter=${encodeURIComponent(chSlug)}&pct=${pctVal}&resume=true`;
                    readBtn.innerHTML = `<i class="fas fa-bookmark mr-1"></i> <span>Continue Reading (${chLabel} &bull; ${pctVal}%)</span>`;
                    readBtn.setAttribute('title', `Continue reading at ${chLabel} (${pctVal}%)`);
                } else {
                    const hasReadLink = d.readOnlineLink && d.readOnlineLink !== '#' && d.readOnlineLink !== '';
                    readBtn.href = hasReadLink ? d.readOnlineLink : `read/index.php?book=${encodeURIComponent(d.id)}`;
                    readBtn.innerHTML = `<i class="fas fa-book-open mr-1"></i> <span>Read Online</span>`;
                    readBtn.removeAttribute('title');
                }
            }
        }

        // Bookmark button state
        const modalBmkBtn = document.getElementById('modal-bookmark-btn');
        if (modalBmkBtn) {
            const isSaved = bookmarkList.includes(d.id);
            modalBmkBtn.innerHTML = isSaved ? '<i class="fas fa-star"></i> <span>Saved to List</span>' : '<i class="far fa-star"></i> <span>Save to List</span>';
            modalBmkBtn.classList.toggle('active', isSaved);
        }

        // Download Links
        const pdfLink = document.getElementById('modal-pdf-link');
        const pdfText = document.getElementById('modal-pdf-text');
        const pdfVol2Link = document.getElementById('modal-pdf-vol2-link');

        if (pdfLink) {
            pdfLink.href = d.pdfLink || '#';
            pdfLink.style.display = (d.pdfLink && d.pdfLink !== '#') ? 'inline-flex' : 'none';
            if (pdfText) {
                pdfText.textContent = (d.pdfVol2Link && d.pdfVol2Link !== '#') ? 'Vol 1 PDF' : 'PDF';
            }
            if (d.pdfVol2Link && d.pdfVol2Link !== '#') {
                pdfLink.setAttribute('title', 'Download Volume 1 PDF');
                pdfLink.setAttribute('aria-label', 'Download Volume 1 PDF');
            } else {
                pdfLink.setAttribute('title', 'Download PDF');
                pdfLink.setAttribute('aria-label', 'Download PDF');
            }
        }
        if (pdfVol2Link) {
            pdfVol2Link.href = d.pdfVol2Link || '#';
            pdfVol2Link.style.display = (d.pdfVol2Link && d.pdfVol2Link !== '#') ? 'inline-flex' : 'none';
        }
        const epubLink = document.getElementById('modal-epub-link');
        if (epubLink) {
            epubLink.href = d.epubLink || '#';
            epubLink.style.display = (d.epubLink && d.epubLink !== '#') ? 'inline-flex' : 'none';
        }
        const mobiLink = document.getElementById('modal-mobi-link');
        if (mobiLink) {
            mobiLink.href = d.mobiLink || '#';
            mobiLink.style.display = (d.mobiLink && d.mobiLink !== '#') ? 'inline-flex' : 'none';
        }
        const txtLink = document.getElementById('modal-txt-link');
        if (txtLink) {
            txtLink.href = d.txtLink || '#';
            txtLink.style.display = (d.txtLink && d.txtLink !== '#') ? 'inline-flex' : 'none';
        }

        // Sourcing metadata
        window.currentDisclaimerKey = d.disclaimerKey || '';
        window.currentDisclaimerText = d.disclaimerText || '';
        window.currentFileSource = d.fileSource || '';
        window.currentInfoSource = d.infoSource || '';
        window.currentBookTitle = d.title || '';
        window.currentBookAuthor = d.author || '';

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeModal = function () {
        const modal = document.getElementById('bookModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };
