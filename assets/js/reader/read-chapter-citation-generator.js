    /* ==========================================================================
       7. Chapter Citation Generator
       ========================================================================== */
    let readerCitationStyle = 'mla';

    function initChapterCitationGenerator(meta) {
        // Initialized in initModalsAndDrawers
    }

    window.switchReaderCitationStyle = function (style) {
        readerCitationStyle = style;
        document.querySelectorAll("#chapterCitationModal .citation-tab-btn").forEach(btn => {
            btn.classList.toggle("active", btn.textContent.toLowerCase().includes(style));
        });
        renderReaderCitation(window.BOOK_METADATA || {});
    };

    function renderReaderCitation(meta) {
        const box = document.getElementById("reader-citation-text");
        if (!box) return;

        const author = meta.author || "Author Unknown";
        const title = meta.title || "Untitled";
        const chTitle = meta.chapterTitle || `Chapter ${meta.chapterNum || 1}`;
        const url = window.location.href;
        const year = new Date().getFullYear();

        let citation = '';
        if (readerCitationStyle === 'mla') {
            citation = `${author}. "${chTitle}." <em>${title}</em>, Hesten's Learning Digital Library, <a href="${url}" target="_blank">${url}</a>.`;
        } else if (readerCitationStyle === 'apa') {
            citation = `${author} (${year}). ${chTitle}. In <em>${title}</em>. Hesten's Learning. ${url}`;
        } else if (readerCitationStyle === 'chicago') {
            citation = `${author}. "${chTitle}." In <em>${title}</em>. Hesten's Learning Digital Library. ${url}.`;
        } else if (readerCitationStyle === 'harvard') {
            citation = `${author}, ${year}. '${chTitle}', in <em>${title}</em>, Hesten's Learning Digital Library, available at: &lt;${url}&gt;.`;
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
