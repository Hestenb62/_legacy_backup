    /* ==========================================================================
       9. Academic Citation Generator
       ========================================================================== */
    window.openBookCitationModal = function () {
        const modal = document.getElementById('bookCitationModal');
        if (!modal || !currentBookData) return;

        renderCitation();
        modal.classList.remove('hidden');
    };

    window.closeBookCitationModal = function () {
        const modal = document.getElementById('bookCitationModal');
        if (modal) modal.classList.add('hidden');
    };

    window.switchCitationStyle = function (style) {
        currentCitationStyle = style;
        document.querySelectorAll('.citation-tab-btn').forEach(btn => {
            btn.classList.toggle('active', btn.textContent.toLowerCase().includes(style));
        });
        renderCitation();
    };

    function renderCitation() {
        const renderBox = document.getElementById('citation-text');
        if (!renderBox || !currentBookData) return;

        const author = currentBookData.author || 'Author Unknown';
        const title = currentBookData.title || 'Untitled';
        const date = currentBookData.date || 'n.d.';
        const year = date.match(/\d{4}/) ? date.match(/\d{4}/)[0] : 'n.d.';
        const url = window.location.origin + (currentBookData.readOnlineLink || `/library/read/index.php?book=${currentBookData.id}`);

        let citation = '';
        if (currentCitationStyle === 'mla') {
            citation = `${author}. <em>${title}</em>. Hesten's Learning Digital Library, ${year}, <a href="${url}" target="_blank">${url}</a>.`;
        } else if (currentCitationStyle === 'apa') {
            citation = `${author} (${year}). <em>${title}</em>. Hesten's Learning. ${url}`;
        } else if (currentCitationStyle === 'chicago') {
            citation = `${author}. <em>${title}</em>. Hesten's Learning Digital Library, ${year}. ${url}.`;
        } else if (currentCitationStyle === 'harvard') {
            citation = `${author}, ${year}. <em>${title}</em>, Hesten's Learning Digital Library, available at: &lt;${url}&gt;.`;
        }

        renderBox.innerHTML = citation;
    }

    window.copyCitationText = function () {
        const renderBox = document.getElementById('citation-text');
        const copyBtn = document.getElementById('citation-copy-btn');
        if (!renderBox) return;

        const text = renderBox.textContent || renderBox.innerText;
        navigator.clipboard.writeText(text).then(() => {
            if (copyBtn) {
                copyBtn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fas fa-copy"></i> <span>Copy Citation</span>';
                }, 2000);
            }
        });
    };
