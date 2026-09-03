    /* ==========================================================================
       5. Inline Text Highlighting & Annotations
       ========================================================================== */
    function initHighlightToolbar(bookContent, highlightsKey) {
        const toolbar = document.getElementById("highlight-toolbar");
        const hlYellow = document.getElementById("hl-color-yellow");
        const hlPink = document.getElementById("hl-color-pink");
        const hlGreen = document.getElementById("hl-color-green");
        const hlCopy = document.getElementById("hl-btn-copy");
        const hlNote = document.getElementById("hl-btn-note");

        if (!toolbar) return;

        // Prevent clicking inside toolbar from losing DOM text selection
        toolbar.addEventListener("mousedown", (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
        toolbar.addEventListener("touchstart", (e) => {
            e.stopPropagation();
        });

        let currentSelectedRange = null;

        function checkSelection() {
            const sel = window.getSelection();
            if (sel && sel.rangeCount > 0 && !sel.isCollapsed) {
                const text = sel.toString().trim();
                const range = sel.getRangeAt(0);

                if (text.length > 0 && (bookContent.contains(range.commonAncestorContainer) || bookContent.contains(sel.anchorNode))) {
                    currentSelectedRange = range.cloneRange();
                    const rect = range.getBoundingClientRect();

                    const top = Math.max(rect.top - 52, 12);
                    const left = Math.max(rect.left + (rect.width / 2) - 110, 16);

                    toolbar.style.top = `${top}px`;
                    toolbar.style.left = `${left}px`;
                    toolbar.style.display = "flex";
                    toolbar.classList.remove("hidden");
                    return;
                }
            }

            toolbar.classList.add("hidden");
            toolbar.style.display = "none";
            currentSelectedRange = null;
        }

        document.addEventListener("mouseup", (e) => {
            if (toolbar.contains(e.target)) return;
            setTimeout(checkSelection, 30);
        });

        document.addEventListener("keyup", (e) => {
            if (toolbar.contains(e.target)) return;
            setTimeout(checkSelection, 30);
        });

        function applyHighlight(colorClass, note = '') {
            if (!currentSelectedRange) return;
            const text = currentSelectedRange.toString();
            if (!text) return;

            const span = document.createElement("mark");
            span.className = colorClass;
            span.textContent = text;

            try {
                currentSelectedRange.deleteContents();
                currentSelectedRange.insertNode(span);
            } catch (e) {}

            window.getSelection().removeAllRanges();
            toolbar.classList.add("hidden");
            toolbar.style.display = "none";

            saveHighlight(text, colorClass, highlightsKey, note);
            currentSelectedRange = null;
        }

        if (hlYellow) hlYellow.addEventListener("click", () => applyHighlight("hl-yellow"));
        if (hlPink) hlPink.addEventListener("click", () => applyHighlight("hl-pink"));
        if (hlGreen) hlGreen.addEventListener("click", () => applyHighlight("hl-green"));

        if (hlCopy) {
            hlCopy.addEventListener("click", () => {
                if (currentSelectedRange) {
                    navigator.clipboard.writeText(currentSelectedRange.toString());
                    toolbar.classList.add("hidden");
                    toolbar.style.display = "none";
                    window.getSelection().removeAllRanges();
                    currentSelectedRange = null;
                }
            });
        }

        if (hlNote) {
            hlNote.addEventListener("click", () => {
                if (currentSelectedRange) {
                    const note = prompt("Add a study note for this selection:");
                    if (note) {
                        applyHighlight("hl-yellow", note);
                    }
                }
            });
        }
    }

    function saveHighlight(text, color, key, note = '') {
        try {
            const list = JSON.parse(localStorage.getItem(key) || '[]');
            const currentPage = window.CURRENT_READER_PAGE || 1;
            list.push({ text: text, color: color, note: note, page: currentPage, date: new Date().toLocaleDateString() });
            localStorage.setItem(key, JSON.stringify(list));
        } catch (e) {}
    }

    function renderSavedHighlightsList(key) {
        const container = document.getElementById("vocab-highlights-container");
        if (!container) return;

        let list = [];
        try {
            list = JSON.parse(localStorage.getItem(key) || '[]');
        } catch (e) {}

        container.innerHTML = '';
        if (list.length > 0) {
            list.forEach((item, idx) => {
                const pageNum = item.page || 1;
                const card = document.createElement("div");
                card.style.padding = "1.25rem";
                card.style.marginBottom = "0.85rem";
                card.style.border = "1px solid var(--color-border)";
                card.style.borderRadius = "1rem";
                card.style.background = "var(--color-base-bg)";
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span class="highlight-page-badge"><i class="fas fa-bookmark"></i> Page ${pageNum}</span>
                        <span style="font-size: 0.75rem; color: var(--color-text-secondary);">Saved on ${item.date}</span>
                    </div>
                    <blockquote style="margin: 0 0 0.75rem 0; font-style: italic; border-left: 3px solid var(--color-primary); padding-left: 0.75rem; color: var(--color-text-default); line-height: 1.5;">${item.text}</blockquote>
                    ${item.note ? `<p style="margin: 0 0 0.75rem 0; font-size: 0.85rem; font-weight: 700; color: var(--color-primary);"><i class="fas fa-sticky-note mr-1"></i> Note: ${item.note}</p>` : ''}
                    <div style="display: flex; justify-content: flex-end;">
                        <button type="button" class="highlight-jump-btn" onclick="if(window.jumpToReaderPage) window.jumpToReaderPage(${pageNum}); if(window.closeVocabModal) window.closeVocabModal();">
                            <i class="fas fa-external-link-alt"></i> Jump to Page ${pageNum}
                        </button>
                    </div>
                `;
                container.appendChild(card);
            });
        } else {
            container.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No text highlights or notes saved for this chapter yet.</p>`;
        }
    }
