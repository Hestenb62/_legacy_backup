/* ==========================================================================
   Chapter Citation Generator (Extended with BibTeX, RIS & File Export)
   ========================================================================== */
let readerCitationStyle = 'mla';

window.switchReaderCitationStyle = function (style) {
    readerCitationStyle = style.toLowerCase();
    document.querySelectorAll("#chapterCitationModal .citation-tab-btn").forEach(btn => {
        const btnText = btn.textContent.toLowerCase();
        btn.classList.toggle("active", btnText.includes(readerCitationStyle));
    });

    // Update download button label
    const dlBtn = document.getElementById("reader-citation-dl-btn");
    if (dlBtn) {
        if (readerCitationStyle === 'bibtex') {
            dlBtn.innerHTML = '<i class="fas fa-file-download"></i> <span>Download .bib</span>';
            dlBtn.style.display = 'inline-flex';
        } else if (readerCitationStyle === 'ris') {
            dlBtn.innerHTML = '<i class="fas fa-file-download"></i> <span>Download .ris</span>';
            dlBtn.style.display = 'inline-flex';
        } else {
            dlBtn.innerHTML = '<i class="fas fa-file-download"></i> <span>Download .txt</span>';
            dlBtn.style.display = 'inline-flex';
        }
    }

    renderReaderCitation(window.BOOK_METADATA || {});
};

function renderReaderCitation(meta) {
    const box = document.getElementById("reader-citation-text");
    if (!box) return;

    const author = meta.author || "Author Unknown";
    const title = meta.title || "Untitled Book";
    const chTitle = meta.chapterTitle || `Chapter ${meta.chapterNum || 1}`;
    const url = window.location.href;
    const year = new Date().getFullYear();
    const cleanId = (meta.id || 'book').replace(/[^a-zA-Z0-9]/g, '_');
    const chNum = meta.chapterNum || 1;

    let citation = '';

    switch (readerCitationStyle) {
        case 'mla':
            citation = `${author}. "${chTitle}." <em>${title}</em>, Hesten's Learning Digital Library, <a href="${url}" target="_blank" rel="noopener noreferrer">${url}</a>.`;
            break;
        case 'apa':
            citation = `${author} (${year}). ${chTitle}. In <em>${title}</em>. Hesten's Learning. ${url}`;
            break;
        case 'chicago':
            citation = `${author}. "${chTitle}." In <em>${title}</em>. Hesten's Learning Digital Library. ${url}.`;
            break;
        case 'harvard':
            citation = `${author}, ${year}. '${chTitle}', in <em>${title}</em>, Hesten's Learning Digital Library, available at: &lt;${url}&gt;.`;
            break;
        case 'bibtex':
            citation = `<pre style="font-family: monospace; font-size: 0.8125rem; white-space: pre-wrap; margin: 0; line-height: 1.5; color: var(--color-text-default);">@incollection{${cleanId}_ch${chNum}_${year},
  author    = {${author}},
  title     = {${chTitle}},
  booktitle = {${title}},
  publisher = {Hesten's Learning Digital Library},
  year      = {${year}},
  url       = {${url}}
}</pre>`;
            break;
        case 'ris':
            citation = `<pre style="font-family: monospace; font-size: 0.8125rem; white-space: pre-wrap; margin: 0; line-height: 1.5; color: var(--color-text-default);">TY  - CHAP
AU  - ${author}
TI  - ${chTitle}
T2  - ${title}
PB  - Hesten's Learning Digital Library
PY  - ${year}
UR  - ${url}
ER  - </pre>`;
            break;
        default:
            citation = `${author}. "${chTitle}." <em>${title}</em>, Hesten's Learning Digital Library.`;
    }

    box.innerHTML = citation;
}

window.copyReaderCitationText = function () {
    const box = document.getElementById("reader-citation-text");
    const copyBtn = document.getElementById("reader-citation-copy-btn");
    if (!box) return;

    const text = box.textContent || box.innerText;
    navigator.clipboard.writeText(text).then(() => {
        if (copyBtn) {
            copyBtn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
            setTimeout(() => {
                copyBtn.innerHTML = '<i class="fas fa-copy"></i> <span>Copy Citation</span>';
            }, 2000);
        }
    });
};

window.downloadReaderCitationFile = function () {
    const meta = window.BOOK_METADATA || {};
    const box = document.getElementById("reader-citation-text");
    if (!box) return;

    const cleanId = (meta.id || 'book').replace(/[^a-zA-Z0-9]/g, '_');
    const chNum = meta.chapterNum || 1;
    const content = box.textContent || box.innerText;

    let filename = `${cleanId}_chapter${chNum}`;
    let mime = 'text/plain';

    if (readerCitationStyle === 'bibtex') {
        filename += '.bib';
        mime = 'application/x-bibtex';
    } else if (readerCitationStyle === 'ris') {
        filename += '.ris';
        mime = 'application/x-research-info-systems';
    } else {
        filename += `_${readerCitationStyle}.txt`;
    }

    const blob = new Blob([content], { type: `${mime};charset=utf-8` });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(link.href);
};

// Global exports
window.renderReaderCitation = renderReaderCitation;
window.initChapterCitationGenerator = function (meta) {
    if (typeof renderReaderCitation === 'function') {
        renderReaderCitation(meta || window.BOOK_METADATA || {});
    }
};
