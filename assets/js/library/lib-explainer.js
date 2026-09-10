    /* ==========================================================================
       8. Explainer & Disclaimer Modals
       ========================================================================== */
    function loadDisclaimers() {
        if (window.DISCLAIMERS_DATA && Object.keys(window.DISCLAIMERS_DATA).length > 0) {
            disclaimersData = window.DISCLAIMERS_DATA;
        } else {
            fetch('../library/assets/disclaimers.json')
                .then(res => res.json())
                .then(data => { disclaimersData = data; })
                .catch(() => {
                    disclaimersData = {
                        "default": "This work is sourced from open-source educational materials, public domain historical archives, and open-access digital repositories. Provided strictly for non-commercial educational instruction, classroom study, and scholarly research under fair use principles. Hesten's Learning makes no claims of copyright ownership over third-party open-source or public domain materials."
                    };
                });
        }
    }

    window.openDisclaimerModal = function () {
        const modal = document.getElementById('disclaimerModal');
        const licenseText = document.getElementById('modal-license-text');
        const bookTitleEl = document.getElementById('modal-disc-book-title');
        const bookAuthorEl = document.getElementById('modal-disc-book-author');
        const fileSourceBadge = document.getElementById('modal-disc-file-source');
        const infoSourceBadge = document.getElementById('modal-disc-info-source');
        const licenseBadge = document.getElementById('modal-disc-license-type');

        if (!modal) return;

        if (!disclaimersData || Object.keys(disclaimersData).length === 0) {
            if (window.DISCLAIMERS_DATA && Object.keys(window.DISCLAIMERS_DATA).length > 0) {
                disclaimersData = window.DISCLAIMERS_DATA;
            }
        }

        const title = window.currentBookTitle || (currentBookData?.title || 'Selected Educational Resource');
        const author = window.currentBookAuthor || (currentBookData?.author || '');
        const key = window.currentDisclaimerKey || (currentBookData?.disclaimerKey || '');
        const customText = window.currentDisclaimerText || (currentBookData?.disclaimerText || '');
        const fileSource = window.currentFileSource || (currentBookData?.fileSource || '');
        const infoSource = window.currentInfoSource || (currentBookData?.infoSource || '');

        if (bookTitleEl) bookTitleEl.textContent = title;
        if (bookAuthorEl) bookAuthorEl.textContent = author ? `by ${author}` : 'Public Domain & Open Educational Archive';

        // Set Source Badges
        if (fileSourceBadge) {
            let srcVal = fileSource;
            if (!srcVal) {
                if (key === 'gutenberg') srcVal = 'Project Gutenberg';
                else if (key === 'american-yawp') srcVal = 'The American Yawp';
                else if (key === 'openstax') srcVal = 'OpenStax Repository';
                else srcVal = 'Open Source Digital Archive';
            }
            fileSourceBadge.querySelector('.badge-val').textContent = `Source: ${srcVal}`;
        }

        if (infoSourceBadge) {
            let infoVal = infoSource || 'Open Library & Educational Archives';
            infoSourceBadge.querySelector('.badge-val').textContent = `Metadata: ${infoVal}`;
        }

        if (licenseBadge) {
            let licVal = 'Public Domain / Open Educational Resource';
            if (key === 'american-yawp') licVal = 'Creative Commons BY-SA 4.0';
            else if (key === 'openstax') licVal = 'Creative Commons BY 4.0';
            else if (key === 'gutenberg') licVal = 'Public Domain (US / Gutenberg)';
            else if (key === 'standard_education') licVal = 'Educational Fair Use';
            licenseBadge.querySelector('.badge-val').textContent = `License: ${licVal}`;
        }

        // Set Main License / Disclaimer Statement
        if (licenseText) {
            if (customText) {
                licenseText.textContent = customText;
            } else if (key && disclaimersData && disclaimersData[key]) {
                licenseText.textContent = disclaimersData[key];
            } else if (disclaimersData && disclaimersData['default']) {
                licenseText.textContent = disclaimersData['default'];
            } else {
                licenseText.textContent = "This work is sourced from open-source educational materials, public domain historical archives, and open-access digital repositories. Provided strictly for non-commercial educational instruction, classroom study, and scholarly research under fair use principles. Hesten's Learning makes no claims of copyright ownership over third-party open-source or public domain materials.";
            }
        }

        loadGutenbergLicenseFile();
        window.switchDisclaimerTab('license');
        modal.classList.remove('hidden');
    };

    function parseGutenbergMarkdown(md) {
        if (!md) return '';
        const lines = md.split('\n');
        let html = '';
        let inList = false;
        let inBlockquote = false;

        function esc(t) {
            return t.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }
        function fmt(t) {
            let s = esc(t);
            s = s.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            s = s.replace(/\*(.*?)\*/g, '<em>$1</em>');
            s = s.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>');
            return s;
        }

        lines.forEach(line => {
            const trimmed = line.trimEnd();
            if (trimmed.startsWith('# ')) {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                html += '<h4 class="gutenberg-h1">' + esc(trimmed.slice(2)) + '</h4>\n';
            } else if (trimmed.startsWith('## ')) {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                html += '<h5 class="gutenberg-h2">' + esc(trimmed.slice(3)) + '</h5>\n';
            } else if (trimmed.startsWith('### ')) {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                html += '<h6 class="gutenberg-h3">' + esc(trimmed.slice(4)) + '</h6>\n';
            } else if (trimmed === '---') {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                html += '<hr class="gutenberg-divider">\n';
            } else if (trimmed.startsWith('> ')) {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (!inBlockquote) { html += '<blockquote class="gutenberg-quote">'; inBlockquote = true; }
                html += '<p>' + fmt(trimmed.slice(2)) + '</p>\n';
            } else if (trimmed.startsWith('* ') || trimmed.startsWith('- ') || /^\d+\.\s/.test(trimmed)) {
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                if (!inList) { html += '<ul class="gutenberg-list">'; inList = true; }
                const content = trimmed.replace(/^(\*|-|\d+\.)\s+/, '');
                html += '<li>' + fmt(content) + '</li>\n';
            } else if (trimmed.trim() === '') {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
            } else {
                if (inList) { html += '</ul>\n'; inList = false; }
                if (inBlockquote) { html += '</blockquote>\n'; inBlockquote = false; }
                html += '<p class="library-disclaimer-text">' + fmt(trimmed) + '</p>\n';
            }
        });
        if (inList) html += '</ul>\n';
        if (inBlockquote) html += '</blockquote>\n';
        return html;
    }

    function loadGutenbergLicenseFile() {
        const container = document.getElementById('modal-gutenberg-content');
        if (!container) return;
        if (container.textContent && container.textContent.trim().length > 100) return;

        const candidates = [
            '../assets/text/library-gutenburg.md',
            'assets/text/library-gutenburg.md',
            '/assets/text/library-gutenburg.md'
        ];

        function tryFetch(i) {
            if (i >= candidates.length) return;
            fetch(candidates[i])
                .then(r => {
                    if (!r.ok) throw new Error('File not found at ' + candidates[i]);
                    return r.text();
                })
                .then(md => {
                    container.innerHTML = parseGutenbergMarkdown(md);
                })
                .catch(() => {
                    tryFetch(i + 1);
                });
        }
        tryFetch(0);
    }

    window.closeDisclaimerModal = function () {
        const modal = document.getElementById('disclaimerModal');
        if (modal) modal.classList.add('hidden');
    };

    window.switchDisclaimerTab = function (tab) {
        const stdView = document.getElementById('disclaimer-standard-view');
        const licView = document.getElementById('disclaimer-license-view');
        const tabStd = document.getElementById('tab-disc-standard');
        const tabLic = document.getElementById('tab-disc-license');

        if (tab === 'standard') {
            if (stdView) {
                stdView.classList.remove('hidden');
                stdView.style.display = 'block';
            }
            if (licView) {
                licView.classList.add('hidden');
                licView.style.display = 'none';
            }
            if (tabStd) {
                tabStd.classList.add('active');
                tabStd.setAttribute('aria-selected', 'true');
            }
            if (tabLic) {
                tabLic.classList.remove('active');
                tabLic.setAttribute('aria-selected', 'false');
            }
        } else {
            if (stdView) {
                stdView.classList.add('hidden');
                stdView.style.display = 'none';
            }
            if (licView) {
                licView.classList.remove('hidden');
                licView.style.display = 'block';
            }
            if (tabStd) {
                tabStd.classList.remove('active');
                tabStd.setAttribute('aria-selected', 'false');
            }
            if (tabLic) {
                tabLic.classList.add('active');
                tabLic.setAttribute('aria-selected', 'true');
            }
        }
    };

    window.openLexileInfoModal = function () {
        const m = document.getElementById('lexileInfoModal');
        if (m) m.classList.remove('hidden');
    };

    window.closeLexileInfoModal = function () {
        const m = document.getElementById('lexileInfoModal');
        if (m) m.classList.add('hidden');
    };

    window.openDdcInfoModal = function () {
        const m = document.getElementById('ddcInfoModal');
        if (m) m.classList.remove('hidden');
    };

    window.closeDdcInfoModal = function () {
        const m = document.getElementById('ddcInfoModal');
        if (m) m.classList.add('hidden');
    };
