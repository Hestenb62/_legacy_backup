/* library/library.js - Digital Library Hub Interactive Scripts */

document.addEventListener("DOMContentLoaded", () => {
    setupScrollButtons();
    setupFilters();
    setupA11y();
});

/* --- Horizontal Scroll Shelves --- */
function setupScrollButtons() {
    document.querySelectorAll('.library-row-section').forEach(section => {
        const row = section.querySelector('.library-books-row');
        const btnLeft = section.querySelector('.scroll-left');
        const btnRight = section.querySelector('.scroll-right');
        
        if (row && btnLeft && btnRight) {
            btnLeft.addEventListener('click', () => {
                row.scrollBy({ left: -row.clientWidth * 0.75, behavior: 'smooth' });
            });
            btnRight.addEventListener('click', () => {
                row.scrollBy({ left: row.clientWidth * 0.75, behavior: 'smooth' });
            });
            
            // Toggle button visibility based on scroll position (optional refinement)
            row.addEventListener('scroll', () => {
                const maxScrollLeft = row.scrollWidth - row.clientWidth;
                btnLeft.style.opacity = row.scrollLeft <= 5 ? "0.5" : "1";
                btnRight.style.opacity = row.scrollLeft >= maxScrollLeft - 5 ? "0.5" : "1";
            });
        }
    });
}

/* --- Search & Category Filtering --- */
let searchTimeout;
function setupFilters() {
    const searchInput = document.getElementById('library-search');
    const categoryFilter = document.getElementById('category-filter');
    const sections = document.querySelectorAll('.library-row-section');
    const noResults = document.getElementById('no-results');

    function filterLibrary() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedCat = categoryFilter.value;
        let totalVisible = 0;

        sections.forEach(section => {
            const sectionCategory = section.dataset.category;
            const books = section.querySelectorAll('.library-book-card');
            let visibleInRow = 0;

            const categoryMatch = (selectedCat === 'all' || sectionCategory === selectedCat);

            books.forEach(book => {
                const title = book.dataset.title.toLowerCase();
                const author = book.dataset.author.toLowerCase();
                const isbn = book.dataset.isbn.toLowerCase();

                const matchesSearch = !query || 
                    title.includes(query) || 
                    author.includes(query) || 
                    isbn.includes(query);

                if (categoryMatch && matchesSearch) {
                    book.style.display = '';
                    visibleInRow++;
                    totalVisible++;
                } else {
                    book.style.display = 'none';
                }
            });

            if (visibleInRow > 0) {
                section.style.display = '';
            } else {
                section.style.display = 'none';
            }
        });

        if (totalVisible === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(filterLibrary, 100);
        });
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterLibrary);
    }
}

/* --- Details Modal Operations --- */
window.openModal = function(card) {
    const modal = document.getElementById('bookModal');
    if (!modal) return;

    // Retrieve datasets
    const title = card.dataset.title;
    const author = card.dataset.author;
    const isbn = card.dataset.isbn;
    const date = card.dataset.date;
    const img = card.dataset.img;
    const description = card.dataset.description;
    
    const pdfLink = card.dataset.pdfLink;
    const epubLink = card.dataset.epubLink;
    const mobiLink = card.dataset.mobiLink;
    const readOnlineLink = card.dataset.readOnlineLink;
    
    const lexile = card.dataset.lexile;
    const dewey = card.dataset.dewey;
    const grade = card.dataset.grade;
    const isCollection = card.dataset.isCollection === 'true';

    // Populate standard properties
    document.getElementById('modal-title').textContent = title || 'Untitled';
    document.getElementById('modal-author').textContent = author ? `by ${author}` : '';
    document.getElementById('modal-img').src = img || '';
    document.getElementById('modal-img').alt = title || 'Book Cover';
    document.getElementById('modal-description').textContent = description || 'No summary available.';
    document.getElementById('modal-date').textContent = date || 'N/A';
    document.getElementById('modal-isbn').textContent = isbn || 'N/A';

    // Lexile Level
    const lexContainer = document.getElementById('modal-lexile-container');
    const lexEl = document.getElementById('modal-lexile');
    if (lexile && lexile !== 'N/A' && lexile !== '') {
        lexEl.textContent = lexile;
        lexContainer.classList.remove('hidden');
    } else {
        lexContainer.classList.add('hidden');
    }

    // Dewey Decimal
    const deweyContainer = document.getElementById('modal-dewey-container');
    const deweyEl = document.getElementById('modal-dewey');
    if (dewey && dewey !== 'N/A' && dewey !== '') {
        deweyEl.textContent = dewey;
        deweyContainer.classList.remove('hidden');
    } else {
        deweyContainer.classList.add('hidden');
    }

    // Grade Level
    const gradeContainer = document.getElementById('modal-grade-container');
    const gradeEl = document.getElementById('modal-grade');
    if (grade && grade !== '') {
        gradeEl.textContent = grade;
        gradeContainer.classList.remove('hidden');
    } else {
        gradeContainer.classList.add('hidden');
    }

    // Action button elements
    const singleActions = document.getElementById('modal-single-actions');
    const collectionList = document.getElementById('modal-collection-actions');
    
    const readBtn = document.getElementById('modal-read-online-link');
    const pdfBtn = document.getElementById('modal-pdf-link');
    const epubBtn = document.getElementById('modal-epub-link');
    const mobiBtn = document.getElementById('modal-mobi-link');

    if (isCollection) {
        // Toggle view
        singleActions.classList.add('hidden');
        collectionList.classList.remove('hidden');
        collectionList.style.display = 'flex';

        // Populate collection list
        const booksJson = card.dataset.books;
        if (booksJson) {
            try {
                const subBooks = JSON.parse(booksJson);
                collectionList.innerHTML = subBooks.map(b => {
                    let actions = '';
                    if (b['read-online-link'] && b['read-online-link'] !== '#') {
                        actions += `<a href="${b['read-online-link']}" target="_blank" rel="noopener noreferrer" class="col-book-btn" title="Read Online"><i class="fas fa-book-open"></i></a>`;
                    }
                    if (b['pdf-link'] && b['pdf-link'] !== '#') {
                        actions += `<a href="${b['pdf-link']}" target="_blank" rel="noopener noreferrer" class="col-book-btn" title="Download PDF"><i class="fas fa-file-pdf"></i></a>`;
                    }
                    if (b['epub-link'] && b['epub-link'] !== '#') {
                        actions += `<a href="${b['epub-link']}" target="_blank" rel="noopener noreferrer" class="col-book-btn" title="Download EPUB"><i class="fas fa-book"></i></a>`;
                    }
                    return `
                        <div class="collection-book-row">
                            <div class="col-book-info">
                                <h4 class="col-book-title">${b.title}</h4>
                                <p class="col-book-author">${b.author || ''}</p>
                            </div>
                            <div class="col-book-actions">
                                ${actions}
                            </div>
                        </div>
                    `;
                }).join('');
            } catch (err) {
                console.error("Error parsing collection books data", err);
                collectionList.innerHTML = `<p style="color: var(--color-text-muted); font-style: italic;">Failed to load items.</p>`;
            }
        } else {
            collectionList.innerHTML = `<p style="color: var(--color-text-muted); font-style: italic;">No items in this collection.</p>`;
        }
    } else {
        // Show single book actions
        singleActions.classList.remove('hidden');
        collectionList.classList.add('hidden');
        collectionList.style.display = 'none';

        // Set action links
        if (readOnlineLink && readOnlineLink !== '#') {
            readBtn.style.display = '';
            readBtn.href = readOnlineLink;
        } else {
            readBtn.style.display = 'none';
        }

        if (pdfLink && pdfLink !== '#') {
            pdfBtn.style.display = '';
            pdfBtn.href = pdfLink;
        } else {
            pdfBtn.style.display = 'none';
        }

        if (epubLink && epubLink !== '#') {
            epubBtn.style.display = '';
            epubBtn.href = epubLink;
        } else {
            epubBtn.style.display = 'none';
        }

        if (mobiLink && mobiLink !== '#') {
            mobiBtn.style.display = '';
            mobiBtn.href = mobiLink;
        } else {
            mobiBtn.style.display = 'none';
        }
    }

    // Activate modal overlay
    modal.classList.remove('hidden');
    // Force reflow
    modal.offsetHeight;
    modal.classList.add('active');
    
    document.body.style.overflow = 'hidden'; // freeze viewport scroll
    
    // Focus close button for WCAG accessibility
    const closeBtn = document.getElementById('book-modal-close');
    if (closeBtn) closeBtn.focus();
};

window.closeModal = function() {
    const modal = document.getElementById('bookModal');
    if (!modal) return;
    
    modal.classList.remove('active');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // restore scroll
    }, 400);
};

/* --- Disclaimer Dialog Modal --- */
window.openDisclaimerModal = function() {
    const discModal = document.getElementById('disclaimerModal');
    if (!discModal) return;
    
    discModal.classList.remove('hidden');
    discModal.offsetHeight;
    discModal.classList.add('active');
    
    const closeBtn = document.getElementById('disclaimer-modal-close');
    if (closeBtn) closeBtn.focus();
};

window.closeDisclaimerModal = function() {
    const discModal = document.getElementById('disclaimerModal');
    if (!discModal) return;
    
    discModal.classList.remove('active');
    setTimeout(() => {
        discModal.classList.add('hidden');
    }, 300);
};

/* --- Keyboard Accessibility Close --- */
function setupA11y() {
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            // Close modals on ESC
            const bookModal = document.getElementById('bookModal');
            const discModal = document.getElementById('disclaimerModal');
            
            if (discModal && discModal.classList.contains('active')) {
                closeDisclaimerModal();
            } else if (bookModal && bookModal.classList.contains('active')) {
                closeModal();
            }
        }
    });
}
