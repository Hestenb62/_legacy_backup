    /* ==========================================================================
       5. Inline Text Highlighting & Annotations (Semantic Marginalia Studio)
       ========================================================================== */
    function initHighlightToolbar(bookContent, highlightsKey) {
        const toolbar = document.getElementById("highlight-toolbar");
        const hlYellow = document.getElementById("hl-color-yellow");
        const hlPink = document.getElementById("hl-color-pink");
        const hlGreen = document.getElementById("hl-color-green");
        const hlBlue = document.getElementById("hl-color-blue");
        const hlCopy = document.getElementById("hl-btn-copy");
        const hlNote = document.getElementById("hl-btn-note");
        const hlFlashcard = document.getElementById("hl-btn-flashcard");

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

                    const top = Math.max(rect.top - 54, 12);
                    const left = Math.max(rect.left + (rect.width / 2) - 130, 16);

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
            setTimeout(checkSelection, 35);
        });

        document.addEventListener("keyup", (e) => {
            if (toolbar.contains(e.target)) return;
            setTimeout(checkSelection, 35);
        });

        function applyHighlight(colorClass, note = '') {
            if (!currentSelectedRange) return;
            const text = currentSelectedRange.toString();
            if (!text) return;

            const span = document.createElement("mark");
            span.className = colorClass;
            span.textContent = text;
            if (note) {
                span.setAttribute("data-note", note);
                span.setAttribute("title", `Margin Note: ${note}`);
            }

            try {
                currentSelectedRange.deleteContents();
                currentSelectedRange.insertNode(span);
            } catch (e) {}

            window.getSelection().removeAllRanges();
            toolbar.classList.add("hidden");
            toolbar.style.display = "none";

            saveHighlight(text, colorClass, highlightsKey, note);
            currentSelectedRange = null;

            if (window.announceA11y) {
                window.announceA11y(`Highlighted text with ${colorClass.replace('hl-', '')}`);
            }
        }

        if (hlYellow) hlYellow.addEventListener("click", () => applyHighlight("hl-yellow"));
        if (hlPink) hlPink.addEventListener("click", () => applyHighlight("hl-pink"));
        if (hlGreen) hlGreen.addEventListener("click", () => applyHighlight("hl-green"));
        if (hlBlue) hlBlue.addEventListener("click", () => applyHighlight("hl-blue"));

        if (hlCopy) {
            hlCopy.addEventListener("click", () => {
                if (currentSelectedRange) {
                    const text = currentSelectedRange.toString();
                    navigator.clipboard.writeText(text).then(() => {
                        if (window.announceA11y) window.announceA11y("Quote copied to clipboard");
                    });
                    toolbar.classList.add("hidden");
                    toolbar.style.display = "none";
                    window.getSelection().removeAllRanges();
                    currentSelectedRange = null;
                }
            });
        }

        if (hlFlashcard) {
            hlFlashcard.addEventListener("click", () => {
                if (currentSelectedRange) {
                    const text = currentSelectedRange.toString().trim();
                    if (text) {
                        applyHighlight("hl-blue", "Saved to Leitner Flashcards");
                        // Add card to Flashcard Studio
                        if (window.addFlashcardToDeck) {
                            window.addFlashcardToDeck('custom', text, 'Vocabulary or concept from reading', '');
                        } else {
                            try {
                                const decks = JSON.parse(localStorage.getItem('hl_leitner_decks') || '{}');
                                if (!decks.custom) decks.custom = { name: 'Custom Student Deck', cards: [] };
                                decks.custom.cards.push({
                                    id: 'card-' + Date.now(),
                                    front: text,
                                    back: 'Concept saved from reader',
                                    example: 'Page ' + (window.CURRENT_READER_PAGE || 1),
                                    box: 1,
                                    nextReview: Date.now()
                                });
                                localStorage.setItem('hl_leitner_decks', JSON.stringify(decks));
                            } catch (err) {}
                        }

                        if (window.toggleFlashcardStudio) {
                            window.toggleFlashcardStudio(true);
                        }
                    }
                }
            });
        }

        if (hlNote) {
            hlNote.addEventListener("click", () => {
                if (currentSelectedRange) {
                    const noteModal = document.getElementById("note-input-modal");
                    const noteTextarea = document.getElementById("study-note-textarea");
                    const saveBtn = document.getElementById("save-note-btn");
                    const cancelBtn = document.getElementById("cancel-note-btn");

                    if (noteModal && noteTextarea) {
                        noteTextarea.value = '';
                        noteModal.classList.remove("hidden");
                        noteModal.style.display = "flex";
                        noteTextarea.focus();

                        const cleanup = () => {
                            noteModal.classList.add("hidden");
                            noteModal.style.display = "none";
                            saveBtn.onclick = null;
                            cancelBtn.onclick = null;
                        };

                        cancelBtn.onclick = cleanup;

                        saveBtn.onclick = () => {
                            const note = noteTextarea.value.trim();
                            if (note) {
                                applyHighlight("hl-yellow", note);
                            }
                            cleanup();
                        };
                    }
                }
            });
        }

        // Click handler on marks with notes to view/edit note
        if (bookContent) {
            bookContent.addEventListener("click", (e) => {
                const mark = e.target.closest("mark[data-note]");
                if (mark) {
                    const note = mark.getAttribute("data-note");
                    if (note) {
                        alert(`📝 Margin Note:\n\n${note}`);
                    }
                }
            });
        }
    }

    function saveHighlight(text, color, key, note = '') {
        try {
            const list = JSON.parse(localStorage.getItem(key) || '[]');
            const currentPage = window.CURRENT_READER_PAGE || 1;
            list.push({
                id: 'hl-' + Date.now() + '-' + Math.floor(Math.random() * 1000),
                text: text,
                color: color,
                note: note,
                page: currentPage,
                date: new Date().toLocaleDateString()
            });
            localStorage.setItem(key, JSON.stringify(list));
        } catch (e) {}
    }

    function exportHighlightsAsMarkdown(key) {
        let list = [];
        try {
            list = JSON.parse(localStorage.getItem(key) || '[]');
        } catch (e) {}

        if (list.length === 0) {
            alert("No highlights to export for this chapter yet.");
            return;
        }

        const colorNames = {
            'hl-yellow': 'Key Idea (Goldenrod)',
            'hl-green': 'Supporting Evidence (Seafoam)',
            'hl-blue': 'Vocabulary & Concept (Cyan)',
            'hl-pink': 'Question & Review (Coral)'
        };

        const title = document.title || 'Chapter Reading';
        let md = `# Study Guide & Semantic Marginalia\n`;
        md += `**Document:** ${title}\n`;
        md += `**Exported on:** ${new Date().toLocaleString()}\n`;
        md += `**Total Annotations:** ${list.length}\n\n`;
        md += `---\n\n`;

        // Group by Page
        const pages = {};
        list.forEach(item => {
            const p = item.page || 1;
            if (!pages[p]) pages[p] = [];
            pages[p].push(item);
        });

        Object.keys(pages).sort((a, b) => Number(a) - Number(b)).forEach(pNum => {
            md += `## Page ${pNum}\n\n`;
            pages[pNum].forEach((h, idx) => {
                const cat = colorNames[h.color] || 'Highlight';
                md += `### ${idx + 1}. [${cat}]\n`;
                md += `> "${h.text}"\n\n`;
                if (h.note) {
                    md += `- 📝 **Marginalia Note:** ${h.note}\n`;
                }
                md += `- 📅 *Saved on:* ${h.date}\n\n`;
            });
        });

        const blob = new Blob([md], { type: 'text/markdown;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `Study-Guide-${title.replace(/[^a-zA-Z0-9]/g, '-').toLowerCase()}-${Date.now()}.md`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    function deleteHighlight(key, id) {
        try {
            let list = JSON.parse(localStorage.getItem(key) || '[]');
            list = list.filter(item => item.id !== id && item.text !== id);
            localStorage.setItem(key, JSON.stringify(list));
            renderSavedHighlightsList(key);
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
            // Action Controls Header
            const exportBar = document.createElement("div");
            exportBar.className = "study-guide-export-bar";
            exportBar.innerHTML = `
                <div style="font-size: 0.88rem; font-weight: 700; color: var(--color-text);">
                    <i class="fas fa-highlighter" style="color: var(--color-primary); margin-right: 0.4rem;"></i>
                    <span>${list.length} Saved Annotations</span>
                </div>
                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                    <button type="button" class="export-study-guide-btn" id="btn-export-study-guide">
                        <i class="fas fa-file-download" aria-hidden="true"></i> <span>Export Study Guide (.md)</span>
                    </button>
                    <button type="button" class="export-study-guide-btn" style="background: #8b5cf6;" id="btn-import-to-flashcards">
                        <i class="fas fa-layer-group" aria-hidden="true"></i> <span>Send to Flashcards</span>
                    </button>
                </div>
            `;
            container.appendChild(exportBar);

            exportBar.querySelector("#btn-export-study-guide").addEventListener("click", () => {
                exportHighlightsAsMarkdown(key);
            });

            exportBar.querySelector("#btn-import-to-flashcards").addEventListener("click", () => {
                try {
                    const decks = JSON.parse(localStorage.getItem('hl_leitner_decks') || '{}');
                    if (!decks.custom) decks.custom = { name: 'Custom Student Deck', cards: [] };
                    let addedCount = 0;
                    list.forEach(h => {
                        const exists = decks.custom.cards.some(c => c.front === h.text);
                        if (!exists) {
                            decks.custom.cards.push({
                                id: 'card-' + Date.now() + '-' + Math.floor(Math.random() * 1000),
                                front: h.text,
                                back: h.note || 'Vocabulary excerpt from reading',
                                example: 'Page ' + (h.page || 1),
                                box: 1,
                                nextReview: Date.now()
                            });
                            addedCount++;
                        }
                    });
                    localStorage.setItem('hl_leitner_decks', JSON.stringify(decks));
                    if (window.toggleFlashcardStudio) {
                        window.toggleFlashcardStudio(true);
                    }
                    alert(`Successfully imported ${addedCount} highlights into your Leitner Flashcard Studio!`);
                } catch (err) {}
            });

            const colorThemeMap = {
                'hl-yellow': { border: '#eab308', name: 'Key Idea', icon: 'fa-star' },
                'hl-green': { border: '#10b981', name: 'Evidence', icon: 'fa-check' },
                'hl-blue': { border: '#06b6d4', name: 'Vocabulary', icon: 'fa-book' },
                'hl-pink': { border: '#ec4899', name: 'Question', icon: 'fa-question' }
            };

            list.forEach((item, idx) => {
                const pageNum = item.page || 1;
                const theme = colorThemeMap[item.color] || { border: 'var(--color-primary)', name: 'Highlight', icon: 'fa-highlighter' };
                const card = document.createElement("div");
                card.style.padding = "1.25rem";
                card.style.marginBottom = "0.85rem";
                card.style.border = "1px solid var(--color-border)";
                card.style.borderLeft = `4px solid ${theme.border}`;
                card.style.borderRadius = "1rem";
                card.style.background = "var(--color-base-bg)";
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem; flex-wrap: wrap; gap: 0.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span class="highlight-page-badge"><i class="fas fa-bookmark"></i> Page ${pageNum}</span>
                            <span style="font-size: 0.75rem; font-weight: 700; color: ${theme.border}; text-transform: uppercase;">
                                <i class="fas ${theme.icon}"></i> ${theme.name}
                            </span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <span style="font-size: 0.75rem; color: var(--color-text-secondary);">Saved on ${item.date}</span>
                            <button type="button" class="btn-delete-hl" data-id="${item.id || item.text}" title="Delete highlight" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 0.85rem;" aria-label="Delete highlight">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <blockquote style="margin: 0 0 0.75rem 0; font-style: italic; border-left: 2px solid ${theme.border}; padding-left: 0.75rem; color: var(--color-text-default); line-height: 1.5;">"${item.text}"</blockquote>
                    ${item.note ? `<p style="margin: 0 0 0.75rem 0; font-size: 0.85rem; font-weight: 700; color: var(--color-primary);"><i class="fas fa-sticky-note mr-1"></i> Margin Note: ${item.note}</p>` : ''}
                    <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                        <button type="button" class="highlight-jump-btn" onclick="if(window.jumpToReaderPage) window.jumpToReaderPage(${pageNum}); if(window.closeVocabModal) window.closeVocabModal();">
                            <i class="fas fa-external-link-alt"></i> Jump to Page ${pageNum}
                        </button>
                    </div>
                `;

                card.querySelector(".btn-delete-hl").addEventListener("click", () => {
                    deleteHighlight(key, item.id || item.text);
                });

                container.appendChild(card);
            });
        } else {
            container.innerHTML = `<p style="text-align: center; color: var(--color-text-secondary); padding: 2rem;">No text highlights or notes saved for this chapter yet.</p>`;
        }
    }
