/**
 * library/assets/lib-study-notebook.js - Centralized Study Notebook & Flashcard Exporter
 * Aggregates all highlights, annotations, notes, and study cards across all books.
 */

(function () {
    window.openStudyNotebookModal = function () {
        const modal = document.getElementById('studyNotebookModal');
        if (!modal) return;

        renderStudyNotebook();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeStudyNotebookModal = function () {
        const modal = document.getElementById('studyNotebookModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    function getAllHighlights() {
        const notesList = [];
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key && key.startsWith('hesten_highlights_')) {
                const bookId = key.replace('hesten_highlights_', '');
                try {
                    const items = JSON.parse(localStorage.getItem(key)) || [];
                    items.forEach((item, idx) => {
                        notesList.push({
                            bookId: bookId,
                            index: idx,
                            text: item.text || item.highlightedText || '',
                            note: item.note || '',
                            color: item.color || '#fef08a',
                            date: item.date || item.timestamp || 'Recent',
                            chapter: item.chapter || 'Reference Section'
                        });
                    });
                } catch (e) {}
            }
        }
        return notesList;
    }

    function renderStudyNotebook() {
        const container = document.getElementById('notebook-entries-list');
        const countBadge = document.getElementById('notebook-total-count');
        if (!container) return;

        const highlights = getAllHighlights();
        if (countBadge) countBadge.textContent = `${highlights.length} Entries`;

        if (highlights.length === 0) {
            container.innerHTML = `
                <div class="notebook-empty-state">
                    <i class="fas fa-highlighter notebook-empty-icon"></i>
                    <h4>No Notes or Highlights Yet</h4>
                    <p>Select text while reading any book or reference guide and click "Highlight" or "Add Note" to populate your study notebook.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = '';
        highlights.forEach((h, idx) => {
            const card = document.createElement('div');
            card.className = 'notebook-entry-card';
            card.innerHTML = `
                <div class="notebook-card-header">
                    <div class="notebook-book-tag">
                        <i class="fas fa-book"></i> <span>${formatBookTitle(h.bookId)}</span>
                    </div>
                    <span class="notebook-date">${h.date}</span>
                </div>
                <div class="notebook-quote" style="border-left-color: ${h.color || '#6366f1'};">
                    "${escapeHtml(h.text)}"
                </div>
                ${h.note ? `<div class="notebook-user-note"><i class="fas fa-sticky-note text-amber-500"></i> <span>${escapeHtml(h.note)}</span></div>` : ''}
                <div class="notebook-card-actions">
                    <a href="/library/read/index.php?book=${encodeURIComponent(h.bookId)}" class="notebook-link-btn" title="Open in reader">
                        <i class="fas fa-external-link-alt"></i> <span>Open Passage</span>
                    </a>
                </div>
            `;
            container.appendChild(card);
        });
    }

    function formatBookTitle(bookId) {
        if (!bookId) return 'General Reference';
        return bookId.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    window.exportNotebookMarkdown = function () {
        const highlights = getAllHighlights();
        if (highlights.length === 0) {
            alert('No study notes or highlights to export yet.');
            return;
        }

        let md = `# Hesten's Learning — Scholar Study Notebook\nGenerated on: ${new Date().toLocaleDateString()}\n\n---\n\n`;
        highlights.forEach((h, i) => {
            md += `### ${i + 1}. ${formatBookTitle(h.bookId)}\n`;
            md += `> ${h.text}\n\n`;
            if (h.note) md += `**Scholar Note:** ${h.note}\n\n`;
            md += `*Captured on: ${h.date}*\n\n---\n\n`;
        });

        downloadFile('hestens-study-notes.md', md, 'text/markdown');
    };

    window.exportNotebookFlashcards = function () {
        const highlights = getAllHighlights();
        if (highlights.length === 0) {
            alert('No study notes available for flashcards.');
            return;
        }

        let csv = 'Front,Back,Tag\n';
        highlights.forEach(h => {
            const front = `"${(h.note || formatBookTitle(h.bookId)).replace(/"/g, '""')}"`;
            const back = `"${h.text.replace(/"/g, '""')}"`;
            const tag = `"${formatBookTitle(h.bookId)}"`;
            csv += `${front},${back},${tag}\n`;
        });

        downloadFile('hestens-flashcards-anki.csv', csv, 'text/csv');
    };

    window.printStudyNotebook = function () {
        window.print();
    };

    function downloadFile(filename, content, type) {
        const blob = new Blob([content], { type: type });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
})();
