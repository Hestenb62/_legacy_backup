/* ==========================================================================
   7. SLiMS Bibliographic Record Detail Page & Hash Routing Controller
   ========================================================================== */
window.currentBookId = null;
if (typeof currentBookData === 'undefined') {
    window.currentBookData = null;
}

    /**
     * Resolves a book ID from a URL hash string.
     * Supports formats: #book-1984, #1984, #book_1984
     */
    window.resolveBookIdFromHash = function (hashStr) {
        if (!hashStr) return null;
        const clean = hashStr.replace(/^#/, '').trim();
        if (!clean) return null;

        // 1. Direct match with book- prefix
        let candidateId = clean;
        if (clean.toLowerCase().startsWith('book-')) {
            candidateId = clean.slice(5);
        } else if (clean.toLowerCase().startsWith('book_')) {
            candidateId = clean.slice(5);
        }

        // Verify if this candidateId exists in DOM or window.ALL_LIBRARY_BOOKS
        if (document.querySelector(`.library-book-card[data-id="${candidateId}"]`)) {
            return candidateId;
        }
        if (window.ALL_LIBRARY_BOOKS && window.ALL_LIBRARY_BOOKS[candidateId]) {
            return candidateId;
        }

        // Check if raw clean string matches an existing book directly
        if (document.querySelector(`.library-book-card[data-id="${clean}"]`)) {
            return clean;
        }
        if (window.ALL_LIBRARY_BOOKS && window.ALL_LIBRARY_BOOKS[clean]) {
            return clean;
        }

        return null;
    };

    /**
     * Switch tabs inside the SLiMS Bibliographic Record modal
     */
    window.switchSlimsModalTab = function (tabName) {
        const panels = document.querySelectorAll('.slims-tab-panel');
        const buttons = document.querySelectorAll('.slims-tab-btn');

        panels.forEach(p => {
            const isMatch = p.id === `slims-tab-content-${tabName}`;
            p.classList.toggle('active', isMatch);
            p.classList.toggle('hidden', !isMatch);
        });

        buttons.forEach(b => {
            const isMatch = b.getAttribute('data-tab') === tabName || b.id === `tab-btn-${tabName}`;
            b.classList.toggle('active', isMatch);
            b.setAttribute('aria-selected', isMatch ? 'true' : 'false');
        });
    };

    /**
     * Open Book Bibliographic Record Detail Page (Popup with URL Hash)
     */
    function openModal(cardOrId, updateHistory = true) {
        if (!cardOrId) return;

        let d = null;
        let bookId = '';

        if (typeof cardOrId === 'string') {
            bookId = cardOrId;
            const cardEl = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
            if (cardEl) {
                d = cardEl.dataset;
            } else if (window.ALL_LIBRARY_BOOKS && window.ALL_LIBRARY_BOOKS[bookId]) {
                const raw = window.ALL_LIBRARY_BOOKS[bookId];
                d = {
                    id: raw.id || bookId,
                    title: raw.title || 'Untitled',
                    author: raw.author || 'Unknown Author',
                    isbn: raw.isbn || '',
                    date: raw.date || '',
                    img: raw.img || '',
                    fallbackImg: raw['fallback-img'] || '',
                    description: raw.description || '',
                    pdfLink: raw['pdf-link'] || '#',
                    pdfVol2Link: raw['pdf-vol2-link'] || '',
                    epubLink: raw['epub-link'] || '#',
                    readOnlineLink: (raw['read-online-link'] || '').replace(/^\/library\//, ''),
                    readOnlineVol1Link: (raw['read-online-vol1-link'] || '').replace(/^\/library\//, ''),
                    readOnlineVol2Link: (raw['read-online-vol2-link'] || '').replace(/^\/library\//, ''),
                    txtLink: raw['txt-link'] || '#',
                    mobiLink: raw['mobi-link'] || '#',
                    lexile: raw.lexile || '',
                    dewey: raw.dewey || '',
                    lc: raw.lc || '',
                    callNumber: raw.call_number || raw.callNumber || '',
                    grade: raw.grade || '',
                    curriculum: raw.curriculum || (raw.grade || ''),
                    disclaimerKey: raw['disclaimer-key'] || '',
                    disclaimerText: raw['disclaimer-text'] || '',
                    fileSource: raw['file-source'] || '',
                    infoSource: raw['info-source'] || '',
                    category: raw.category || 'Collection',
                    gmd: raw.isCollection ? 'Collection' : (raw.title && raw.title.toLowerCase().includes('audio') ? 'Audiobook' : 'Text / E-Book'),
                    authorBio: raw.authorBio || '',
                    introWhy: raw.introWhy || '',
                    introHow: raw.introHow || '',
                    introWhat: raw.introWhat || '',
                    gutenbergId: raw['gutenberg-id'] || ''
                };
            }
        } else if (cardOrId.dataset) {
            d = cardOrId.dataset;
            bookId = d.id;
        }

        if (!d || !bookId) return;

        window.currentBookId = bookId;
        window.currentBookData = d;
        if (typeof currentBookData !== 'undefined') {
            try { currentBookData = d; } catch (_) {}
        }

        const modal = document.getElementById('bookModal');
        if (!modal) return;

        // Reset to Bibliographic tab by default
        window.switchSlimsModalTab('biblio');

        // 1. Breadcrumbs
        const breadcrumbCat = document.getElementById('modal-breadcrumb-category');
        const breadcrumbTitle = document.getElementById('modal-breadcrumb-title');
        if (breadcrumbCat) breadcrumbCat.textContent = d.category || 'Catalog';
        if (breadcrumbTitle) breadcrumbTitle.textContent = d.title || 'Book Details';

        // 2. Cover Image & 3D Spine Call Tag
        const imgEl = document.getElementById('modal-img');
        if (imgEl) {
            imgEl.src = d.img || d.fallbackImg || 'https://placehold.co/300x450/1e293b/ffffff?text=Book';
            imgEl.alt = 'Cover of ' + (d.title || 'Book');
        }
        const spineCallEl = document.getElementById('modal-spine-call-tag');
        if (spineCallEl) {
            if (d.callNumber) {
                spineCallEl.textContent = d.callNumber;
                spineCallEl.style.display = 'block';
            } else {
                spineCallEl.style.display = 'none';
            }
        }

        // 3. Header Titles & Top Badges
        const titleEl = document.getElementById('modal-title');
        if (titleEl) titleEl.textContent = d.title || 'Untitled Volume';

        const authorEl = document.getElementById('modal-author');
        if (authorEl) {
            authorEl.innerHTML = d.author 
                ? `<i class="fas fa-user-pen" aria-hidden="true"></i> <span>Personal Name: <strong>${d.author}</strong></span>`
                : '';
        }

        const gmdBadge = document.getElementById('modal-gmd-badge');
        if (gmdBadge) gmdBadge.textContent = `[${d.gmd || 'Text / Electronic Resource'}]`;

        const catTag = document.getElementById('modal-category-tag');
        if (catTag) catTag.textContent = d.category || 'General Collection';

        const gradeTag = document.getElementById('modal-grade-tag');
        const gradeText = document.getElementById('modal-grade-text');
        if (gradeTag && gradeText) {
            if (d.grade && d.grade !== '#') {
                gradeText.textContent = d.grade;
                gradeTag.classList.remove('hidden');
            } else {
                gradeTag.classList.add('hidden');
            }
        }

        // Lexile Measure in Top Meta Tags next to Grade & Category
        const lexileTag = document.getElementById('modal-lexile-tag');
        const lexileEl = document.getElementById('modal-lexile');
        if (lexileTag && lexileEl) {
            if (d.lexile && d.lexile !== '#' && d.lexile.toLowerCase() !== 'unrated') {
                lexileEl.textContent = d.lexile;
                lexileTag.classList.remove('hidden');
            } else {
                lexileTag.classList.add('hidden');
            }
        }

        // 5. Bibliographic Information Table (Tab 1)
        const tdCallno = document.getElementById('modal-td-callno');
        const tdIsbn = document.getElementById('modal-td-isbn');
        const tdDate = document.getElementById('modal-td-date');
        const tdSource = document.getElementById('modal-td-source');

        if (tdCallno) tdCallno.textContent = d.callNumber || 'Catalog Call # Pending';
        if (tdIsbn) tdIsbn.textContent = (d.isbn && d.isbn !== '#') ? d.isbn : 'N/A (Public Domain / Open Access)';
        if (tdDate) tdDate.textContent = (d.date && d.date !== '#') ? d.date : 'Historical Monograph';
        if (tdSource) tdSource.textContent = d.fileSource || (d.infoSource ? `${d.infoSource}` : "Hesten's Learning Open Archive");

        // 6. Synopsis / Abstract (Tab 2)
        const descEl = document.getElementById('modal-description');
        if (descEl) descEl.textContent = d.description || 'No detailed abstract available for this bibliographic record.';

        // Curriculum alignments
        const curricContainer = document.getElementById('modal-curriculum-container');
        const curricContent = document.getElementById('modal-curriculum-content');
        if (curricContainer && curricContent) {
            if (d.curriculum && d.curriculum !== '#') {
                curricContent.innerHTML = `<span class="curric-badge"><i class="fas fa-graduation-cap"></i> ${d.curriculum}</span>`;
                curricContainer.classList.remove('hidden');
            } else {
                curricContainer.classList.add('hidden');
            }
        }

        // 9. Read Online & Chapter Resume Buttons
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
                dualVolContainer.style.display = 'flex';
            }
            if (vol1Btn) {
                vol1Btn.href = d.readOnlineVol1Link || 'read/index.php?book=american-yawp&chapter=chapter-1';
            }
            if (vol2Btn) {
                vol2Btn.href = d.readOnlineVol2Link || 'read/index.php?book=american-yawp&chapter=chapter-15';
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

        // 10. Bookmark State
        const modalBmkBtn = document.getElementById('modal-bookmark-btn');
        if (modalBmkBtn) {
            const isSaved = Array.isArray(window.bookmarkList) && window.bookmarkList.includes(d.id);
            modalBmkBtn.innerHTML = isSaved ? '<i class="fas fa-star text-amber-500"></i> <span>Saved to List</span>' : '<i class="far fa-star"></i> <span>Save to List</span>';
            modalBmkBtn.classList.toggle('active', isSaved);
        }

        // 11. SLiMS Barcode & Item Inventory (Tab 3)
        const cleanId = (d.id || 'ITEM').toUpperCase().replace(/[^A-Z0-9]/g, '');
        const itemBarcode = `HL-${cleanId.slice(0, 8).padEnd(6, '0')}-01`;
        const callNumberText = d.callNumber || 'GEN-COLL';

        const barcodeValEl = document.getElementById('modal-barcode-val');
        const barcodeTableCodeEl = document.getElementById('modal-barcode-table-code');
        const barcodeCallnoEl = document.getElementById('modal-barcode-callno');
        const barcodeTableCallnoEl = document.getElementById('modal-barcode-table-callno');
        const barcodeTitleEl = document.getElementById('modal-barcode-book-title');
        const barcodeAuthorEl = document.getElementById('modal-barcode-book-author');

        if (barcodeValEl) barcodeValEl.textContent = itemBarcode;
        if (barcodeTableCodeEl) barcodeTableCodeEl.textContent = itemBarcode;
        if (barcodeCallnoEl) barcodeCallnoEl.textContent = callNumberText;
        if (barcodeTableCallnoEl) barcodeTableCallnoEl.textContent = callNumberText;
        if (barcodeTitleEl) barcodeTitleEl.textContent = d.title || 'Untitled Volume';
        if (barcodeAuthorEl) barcodeAuthorEl.textContent = d.author ? `Author: ${d.author}` : '';

        // Render Crisp SVG Barcode Stripes
        renderBarcodeSvg(document.getElementById('modal-barcode-svg'), itemBarcode);

        // Sourcing Metadata for Sub-Modals
        window.currentDisclaimerKey = d.disclaimerKey || '';
        window.currentDisclaimerText = d.disclaimerText || '';
        window.currentFileSource = d.fileSource || '';
        window.currentInfoSource = d.infoSource || '';
        window.currentBookTitle = d.title || '';
        window.currentBookAuthor = d.author || '';

        // Reset Share & Barcode Buttons
        const shareBtnText = document.getElementById('slims-share-link-text');
        if (shareBtnText) shareBtnText.textContent = 'Share Link';
        const barcodeCopyText = document.getElementById('barcode-copy-text');
        if (barcodeCopyText) barcodeCopyText.textContent = 'Copy Code';

        // 13. Show Modal Overlay & Lock Background
        modal.classList.remove('hidden');
        modal.scrollTop = 0;
        document.body.style.overflow = 'hidden';

        // 14. URL Hash Synchronization
        const targetHash = `#book-${bookId}`;
        if (updateHistory && window.location.hash !== targetHash) {
            history.pushState({ modalBookId: bookId }, '', targetHash);
        }
    };

    /**
     * Close the SLiMS Bibliographic Record Detail Page
     */
    function closeModal(updateHistory = true) {
        const modal = document.getElementById('bookModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Clear hash if it currently points to the closed book
        if (updateHistory && window.location.hash) {
            const currentHash = window.location.hash;
            if (currentHash.startsWith('#book-') || window.resolveBookIdFromHash(currentHash)) {
                // Replace hash with clean URL without refreshing page
                history.pushState('', document.title, window.location.pathname + window.location.search);
            }
        }
        window.currentBookId = null;
    };

    /**
     * Copy Permanent Direct Link to this Book (#book-{id})
     */
    window.copyBookShareLink = function () {
        if (!window.currentBookId) return;
        const targetUrl = `${window.location.origin}${window.location.pathname}#book-${window.currentBookId}`;

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(targetUrl).then(() => {
                showShareFeedback(true);
            }).catch(() => {
                fallbackCopy(targetUrl);
            });
        } else {
            fallbackCopy(targetUrl);
        }
    };

    function fallbackCopy(text) {
        const ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            showShareFeedback(true);
        } catch (e) {
            showShareFeedback(false);
        }
        document.body.removeChild(ta);
    }

    function showShareFeedback(success) {
        const shareBtnText = document.getElementById('slims-share-link-text');
        if (!shareBtnText) return;
        shareBtnText.innerHTML = success ? '<i class="fas fa-check text-emerald-500"></i> Copied Link!' : 'Copy Failed';
        setTimeout(() => {
            if (shareBtnText) shareBtnText.textContent = 'Share Link';
        }, 2200);
    }

    /**
     * Render crisp vector SVG barcode bars (Code-128 standard style)
     */
    function renderBarcodeSvg(svgEl, text) {
        if (!svgEl) return;
        const str = String(text || 'HL-000000-01').toUpperCase();
        // Generate deterministic bar pattern
        let pattern = '11010010000'; // Code 128 start pattern
        for (let i = 0; i < str.length; i++) {
            const c = str.charCodeAt(i);
            const p = ((c * 2654435761) >>> 0).toString(2).padStart(11, '0').slice(-11);
            const safeP = (p.includes('1') && p.includes('0')) ? p : '10110010110';
            pattern += safeP;
        }
        pattern += '1100011101011'; // Code 128 stop pattern

        const barWidth = 2.4;
        const totalWidth = pattern.length * barWidth + 24;
        let svgHtml = '';
        let currentX = 12;

        for (let i = 0; i < pattern.length; i++) {
            if (pattern[i] === '1') {
                svgHtml += `<rect x="${currentX.toFixed(1)}" y="4" width="${barWidth.toFixed(1)}" height="68" fill="currentColor" />`;
            }
            currentX += barWidth;
        }
        svgEl.setAttribute('viewBox', `0 0 ${Math.ceil(totalWidth)} 76`);
        svgEl.innerHTML = svgHtml;
    }

    /**
     * Escape special HTML characters
     */
    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    /**
     * Print Barcode Label (Isolated Single-Page Bibliographic Record & Barcode Slip)
     * Prints a comprehensive, single-page SLiMS circulation slip containing the
     * Barcode graphic, full Bibliographic Information, and Abstract / Content Notes.
     */
    window.printBarcodeLabel = function () {
        const d = window.currentBookData || {};

        const title = window.currentBookTitle || d.title || (document.getElementById('modal-title') ? document.getElementById('modal-title').textContent : '') || (document.getElementById('modal-barcode-book-title') ? document.getElementById('modal-barcode-book-title').textContent : 'Library Monograph');
        const author = window.currentBookAuthor || d.author || (document.getElementById('modal-barcode-book-author') ? document.getElementById('modal-barcode-book-author').textContent.replace(/^Author:\s*/i, '') : '') || '';
        const barcodeCode = (document.getElementById('modal-barcode-val') ? document.getElementById('modal-barcode-val').textContent : '') || (d.id ? `HL-${(d.id.toUpperCase().replace(/[^A-Z0-9]/g, '')).slice(0, 8).padEnd(6, '0')}-01` : 'HL-000000-01');
        const callNo = (document.getElementById('modal-barcode-callno') ? document.getElementById('modal-barcode-callno').textContent : '') || (document.getElementById('modal-td-callno') ? document.getElementById('modal-td-callno').textContent : '') || d.callNumber || '--';

        const isbn = (document.getElementById('modal-td-isbn') ? document.getElementById('modal-td-isbn').textContent : '') || d.isbn || 'N/A (Open Access / Public Domain)';
        const pubDate = (document.getElementById('modal-td-date') ? document.getElementById('modal-td-date').textContent : '') || d.date || 'Historical Monograph';
        const source = (document.getElementById('modal-td-source') ? document.getElementById('modal-td-source').textContent : '') || d.fileSource || d.infoSource || "Hesten's Learning Open Archive";
        const category = (document.getElementById('modal-category-tag') ? document.getElementById('modal-category-tag').textContent : '') || d.category || 'General Collection';

        const gradeVal = (document.getElementById('modal-grade-text') ? document.getElementById('modal-grade-text').textContent : '') || (d.grade && d.grade !== '#' ? d.grade : '');
        const lexileVal = (document.getElementById('modal-lexile') ? document.getElementById('modal-lexile').textContent : '') || (d.lexile && d.lexile !== '#' && d.lexile.toLowerCase() !== 'unrated' ? d.lexile : '');
        const curriculumVal = (d.curriculum && d.curriculum !== '#' ? d.curriculum : '');

        const description = (document.getElementById('modal-description') ? document.getElementById('modal-description').textContent : '') || d.description || 'No detailed abstract available for this bibliographic record.';

        const svgEl = document.getElementById('modal-barcode-svg');
        const svgHtml = svgEl ? svgEl.outerHTML : '';
        const printDate = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

        // Clean up any existing print frame
        let iframe = document.getElementById('slims-barcode-print-frame');
        if (iframe) {
            iframe.remove();
        }

        // Create an isolated hidden print iframe
        iframe = document.createElement('iframe');
        iframe.id = 'slims-barcode-print-frame';
        iframe.setAttribute('title', 'Print Barcode and Bibliographic Slip');
        iframe.style.position = 'fixed';
        iframe.style.right = '0';
        iframe.style.bottom = '0';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = '0';
        iframe.style.opacity = '0';
        iframe.style.pointerEvents = 'none';
        document.body.appendChild(iframe);

        const printDoc = iframe.contentWindow.document;
        printDoc.open();
        printDoc.write(`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SLiMS Slip - ${escapeHtml(title)}</title>
    <style>
        @page {
            size: auto;
            margin: 7mm 9mm;
        }
        * {
            box-sizing: border-box;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        html, body {
            margin: 0;
            padding: 0;
            background: #ffffff !important;
            color: #0f172a !important;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
        body {
            padding: 1mm;
        }
        .slims-print-sheet {
            width: 100%;
            max-width: 195mm;
            margin: 0 auto;
            border: 2px solid #0f172a;
            border-radius: 6px;
            padding: 5mm 6mm;
            background: #ffffff;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .sheet-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #0f172a;
            padding-bottom: 2.5mm;
            margin-bottom: 3mm;
        }
        .sheet-brand-title {
            font-size: 10pt;
            font-weight: 900;
            letter-spacing: 0.06em;
            color: #0f172a;
            text-transform: uppercase;
        }
        .sheet-brand-sub {
            font-size: 7.5pt;
            font-weight: 600;
            color: #475569;
            margin-top: 1px;
        }
        .sheet-header-meta {
            text-align: right;
        }
        .sheet-badge {
            display: inline-block;
            font-size: 6.5pt;
            font-weight: 800;
            background: #0f172a;
            color: #ffffff;
            padding: 2px 6px;
            border-radius: 3px;
            letter-spacing: 0.05em;
        }
        .sheet-date {
            font-size: 6.5pt;
            font-weight: 600;
            color: #64748b;
            margin-top: 1.5px;
        }
        .sheet-book-header {
            border-bottom: 1px dashed #94a3b8;
            padding-bottom: 2.5mm;
            margin-bottom: 3mm;
        }
        .sheet-book-title {
            font-size: 12pt;
            font-weight: 800;
            line-height: 1.25;
            margin: 0 0 1mm 0;
            color: #0f172a;
        }
        .sheet-book-author {
            font-size: 8.5pt;
            font-weight: 600;
            color: #334155;
            margin: 0;
        }
        .sheet-grid {
            display: flex;
            gap: 4mm;
            align-items: stretch;
            margin-bottom: 3mm;
        }
        .barcode-card {
            flex: 0 0 42%;
            border: 1.5px solid #0f172a;
            border-radius: 5px;
            padding: 2.5mm 3mm;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        .barcode-tag-head {
            font-size: 6.5pt;
            font-weight: 800;
            letter-spacing: 0.08em;
            color: #475569;
            text-transform: uppercase;
            margin-bottom: 1mm;
        }
        .barcode-svg-wrap {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 1mm 0;
        }
        .barcode-svg-wrap svg {
            width: 100%;
            max-width: 60mm;
            height: 15mm;
            color: #000000 !important;
            fill: #000000 !important;
        }
        .barcode-code {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 10.5pt;
            font-weight: 800;
            letter-spacing: 0.16em;
            margin: 1mm 0 1.5mm 0;
            color: #000000;
        }
        .barcode-meta-line {
            display: flex;
            justify-content: space-between;
            font-size: 6.8pt;
            border-top: 1px dashed #cbd5e1;
            padding-top: 1.2mm;
            margin-top: 1.2mm;
            text-align: left;
        }
        .barcode-meta-label {
            color: #64748b;
            font-weight: 600;
        }
        .barcode-meta-val {
            font-weight: 700;
            color: #0f172a;
            font-family: ui-monospace, monospace;
        }
        .biblio-specs-col {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .specs-table-title {
            font-size: 6.8pt;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #475569;
            margin-bottom: 1.2mm;
        }
        .specs-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 7.2pt;
        }
        .specs-table th {
            width: 36%;
            text-align: left;
            padding: 1.4mm 1.8mm;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            font-weight: 700;
            color: #334155;
        }
        .specs-table td {
            padding: 1.4mm 1.8mm;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            font-weight: 500;
        }
        .specs-mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-weight: 700;
        }
        .sheet-abstract-section {
            border-top: 1px dashed #94a3b8;
            padding-top: 2.5mm;
            margin-top: 1mm;
        }
        .abstract-heading {
            font-size: 6.8pt;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #475569;
            margin: 0 0 1.2mm 0;
        }
        .abstract-body {
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            background: #f8fafc;
            padding: 2.5mm 3.2mm;
            font-size: 7.8pt;
            line-height: 1.35;
            color: #1e293b;
            max-height: 52mm;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 9;
            -webkit-box-orient: vertical;
        }
        .curric-note {
            margin-top: 1.5mm;
            padding-top: 1.2mm;
            border-top: 1px dashed #cbd5e1;
            font-size: 6.8pt;
            font-weight: 700;
            color: #047857;
        }
        .sheet-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1.5px solid #0f172a;
            padding-top: 2mm;
            margin-top: 3mm;
            font-size: 6.5pt;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="slims-print-sheet">
        <!-- Institutional Header -->
        <div class="sheet-header">
            <div>
                <div class="sheet-brand-title">Hesten's Learning &bull; Digital Repository</div>
                <div class="sheet-brand-sub">SLiMS 9 Bulian OPAC &bull; Monograph &amp; Barcode Circulation Slip</div>
            </div>
            <div class="sheet-header-meta">
                <span class="sheet-badge">OFFICIAL CIRCULATION RECORD</span>
                <div class="sheet-date">Date Printed: ${printDate}</div>
            </div>
        </div>

        <!-- Book Title & Authorship -->
        <div class="sheet-book-header">
            <h1 class="sheet-book-title">${escapeHtml(title)}</h1>
            <p class="sheet-book-author">Personal Name / Creator: <strong>${escapeHtml(author || 'Unknown Author')}</strong></p>
        </div>

        <!-- 2-Column Section: Barcode on Left, Bibliographic Table on Right -->
        <div class="sheet-grid">
            <!-- Left: Barcode Identification Unit -->
            <div class="barcode-card">
                <div class="barcode-tag-head">SLiMS Item Barcode (Code-128)</div>
                <div class="barcode-svg-wrap">${svgHtml}</div>
                <div class="barcode-code">${escapeHtml(barcodeCode)}</div>
                <div>
                    <div class="barcode-meta-line">
                        <span class="barcode-meta-label">CALL NUMBER:</span>
                        <span class="barcode-meta-val">${escapeHtml(callNo)}</span>
                    </div>
                    <div class="barcode-meta-line">
                        <span class="barcode-meta-label">LOCATION:</span>
                        <span class="barcode-meta-val">Main Digital Stacks</span>
                    </div>
                    <div class="barcode-meta-line">
                        <span class="barcode-meta-label">HOLDING FORMAT:</span>
                        <span class="barcode-meta-val">Electronic Resource</span>
                    </div>
                    <div class="barcode-meta-line">
                        <span class="barcode-meta-label">CIRCULATION STATUS:</span>
                        <span class="barcode-meta-val">Available (Open Access)</span>
                    </div>
                </div>
            </div>

            <!-- Right: Bibliographic Specifications Table -->
            <div class="biblio-specs-col">
                <div class="specs-table-title">Bibliographic Record Specifications</div>
                <table class="specs-table" aria-label="Bibliographic Specifications">
                    <tbody>
                        <tr>
                            <th scope="row">Call Number</th>
                            <td class="specs-mono">${escapeHtml(callNo)}</td>
                        </tr>
                        <tr>
                            <th scope="row">Standard No. (ISBN)</th>
                            <td class="specs-mono">${escapeHtml(isbn)}</td>
                        </tr>
                        <tr>
                            <th scope="row">Publication Date</th>
                            <td>${escapeHtml(pubDate)}</td>
                        </tr>
                        <tr>
                            <th scope="row">Subject / Category</th>
                            <td>${escapeHtml(category)}</td>
                        </tr>
                        <tr>
                            <th scope="row">Target Grade Level</th>
                            <td>${escapeHtml(gradeVal || 'All Levels / General')}</td>
                        </tr>
                        <tr>
                            <th scope="row">Lexile Measure</th>
                            <td>${escapeHtml(lexileVal || 'Catalog Reference')}</td>
                        </tr>
                        <tr>
                            <th scope="row">Source Repository</th>
                            <td>${escapeHtml(source)}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Abstract & Content Notes Section -->
        <div class="sheet-abstract-section">
            <div class="abstract-heading">Abstract &amp; Content Notes (SLiMS Synopsis)</div>
            <div class="abstract-body">
                <div>${escapeHtml(description)}</div>
                ${curriculumVal ? `<div class="curric-note"><strong>Curriculum Standards Alignment:</strong> ${escapeHtml(curriculumVal)}</div>` : ''}
            </div>
        </div>

        <!-- Footer Verification & Compatibility -->
        <div class="sheet-footer">
            <div>SLiMS 9 Bulian Standard Compliant &bull; Senayan Library Management System</div>
            <div><strong>Item Identifier:</strong> ${escapeHtml(barcodeCode)}</div>
            <div>Single-Sheet Record &bull; Page 1 of 1</div>
        </div>
    </div>
</body>
</html>`);
        printDoc.close();

        // Trigger print in isolated context
        setTimeout(() => {
            try {
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
            } catch (err) {
                console.error('Print frame error:', err);
                window.print();
            }
        }, 250);
    };

    /**
     * Copy Barcode Text to Clipboard with visual feedback
     */
    window.copyBarcodeToClipboard = function () {
        const codeEl = document.getElementById('modal-barcode-table-code');
        const text = codeEl ? codeEl.textContent.trim() : '';
        if (!text) return;

        const copyBtnText = document.getElementById('barcode-copy-text');
        const doFeedback = () => {
            if (copyBtnText) {
                copyBtnText.textContent = 'Copied!';
                setTimeout(() => {
                    copyBtnText.textContent = 'Copy Code';
                }, 2000);
            }
        };

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(doFeedback).catch(() => {
                fallbackCopy(text);
                doFeedback();
            });
        } else {
            fallbackCopy(text);
            doFeedback();
        }
    };

    /**
     * Check URL Hash on initial page load or browser navigation
     */
    window.checkBookHash = function () {
        if (!window.location.hash) return;
        const bookId = window.resolveBookIdFromHash(window.location.hash);
        if (bookId) {
            window.openModal(bookId, false);
        }
    };

    // React to browser Back / Forward buttons (Popstate / Hashchange)
    window.addEventListener('hashchange', () => {
        const bookId = window.resolveBookIdFromHash(window.location.hash);
        if (bookId) {
            if (window.currentBookId !== bookId) {
                window.openModal(bookId, false);
            }
        } else if (!window.location.hash || !window.location.hash.trim()) {
            const modal = document.getElementById('bookModal');
            if (modal && !modal.classList.contains('hidden')) {
                window.closeModal(false);
            }
        }
    });

    window.addEventListener('popstate', (e) => {
        if (e.state && e.state.modalBookId) {
            window.openModal(e.state.modalBookId, false);
        } else if (!window.location.hash || !window.resolveBookIdFromHash(window.location.hash)) {
            const modal = document.getElementById('bookModal');
            if (modal && !modal.classList.contains('hidden')) {
                window.closeModal(false);
            }
        }
    });

    // Explicit global and window scope attachment for inline handlers
    window.openModal = openModal;
    window.closeModal = closeModal;

    // Auto-open book if URL contains a deep-link hash (#book-id or #id)
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => setTimeout(window.checkBookHash, 80));
    } else {
        setTimeout(window.checkBookHash, 80);
    }


