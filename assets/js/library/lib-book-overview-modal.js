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

        // Read Online Button
        const readBtn = document.getElementById('modal-read-online-link');
        if (readBtn) {
            const hasReadLink = d.readOnlineLink && d.readOnlineLink !== '#' && d.readOnlineLink !== '';
            readBtn.href = hasReadLink ? d.readOnlineLink : `read/index.php?book=${d.id}`;
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
        if (pdfLink) {
            pdfLink.href = d.pdfLink || '#';
            pdfLink.style.display = (d.pdfLink && d.pdfLink !== '#') ? 'inline-flex' : 'none';
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
