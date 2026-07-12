// --- Live Search & Filter Logic ---
const searchInput = document.getElementById('library-search');
const categoryFilter = document.getElementById('category-filter');
const categoriesContainers = document.querySelectorAll('.library-category');
const noResults = document.getElementById('no-results');

function filterBooks() {
    const term = searchInput.value.toLowerCase();
    const selectedCat = categoryFilter.value;
    let totalVisible = 0;

    categoriesContainers.forEach(categoryContainer => {
        const catNameElement = categoryContainer.querySelector('h2');
        if(!catNameElement) return;
        const catName = catNameElement.textContent.trim();
        const books = Array.from(categoryContainer.querySelectorAll('.book-card'));

        let categoryHasVisible = false;

        books.forEach(book => {
            const title = book.dataset.title.toLowerCase();
            const author = book.dataset.author.toLowerCase();
            const isbn = book.dataset.isbn.toLowerCase();
            const dewey = (book.dataset.dewey || '').toLowerCase();

            const matchesSearch = title.includes(term) || author.includes(term) || isbn.includes(term) || dewey.includes(term);
            const matchesCategory = selectedCat === 'all' || selectedCat === catName;

            if (matchesSearch && matchesCategory) {
                 book.classList.remove('hidden');
                 book.style.display = 'flex';
                 categoryHasVisible = true;
                 totalVisible++;
            } else {
                 book.classList.add('hidden');
                 book.style.display = 'none';
            }
        });

        // Hide the entire row if empty or if filtered out by category dropdown
        if (categoryHasVisible && (selectedCat === 'all' || selectedCat === catName)) {
            categoryContainer.classList.remove('hidden');
        } else {
            categoryContainer.classList.add('hidden');
        }
    });

    if (totalVisible === 0) {
        noResults.classList.remove('hidden');
    } else {
        noResults.classList.add('hidden');
    }
    
    // Save state to localStorage
    localStorage.setItem('library-search', term);
    localStorage.setItem('library-category', selectedCat);
}

// Debounce wrapper
let timeout = null;
if (searchInput) {
    searchInput.addEventListener('input', () => {
        clearTimeout(timeout);
        timeout = setTimeout(filterBooks, 300);
    });
}

if (categoryFilter) {
    categoryFilter.addEventListener('change', filterBooks);
}

// --- Horizontal Scroll Logic ---
document.querySelectorAll('.library-category').forEach(category => {
    const container = category.querySelector('.book-container');
    const leftBtn = category.querySelector('.scroll-btn.left');
    const rightBtn = category.querySelector('.scroll-btn.right');

    if (leftBtn && rightBtn && container) {
        const scrollAmount = Math.max(container.clientWidth * 0.7, 300); // Dynamic responsive scroll
        leftBtn.addEventListener('click', () => {
            container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
        rightBtn.addEventListener('click', () => {
            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }
});

// --- Modal Logic ---
const modal = document.getElementById('bookModal');
const modalContent = modal ? modal.querySelector('.book-modal-content') : null;
const modalTitle = document.getElementById('modal-title');
const modalAuthor = document.getElementById('modal-author');
const modalDescription = document.getElementById('modal-description');
const modalIsbn = document.getElementById('modal-isbn');
const modalDate = document.getElementById('modal-date');
const modalImg = document.getElementById('modal-img');
const modalReadOnlineLink = document.getElementById('modal-read-online-link');
const modalPdfLink = document.getElementById('modal-pdf-link');
const modalEpubLink = document.getElementById('modal-epub-link');
const modalMobiLink = document.getElementById('modal-mobi-link');
const modalLexile = document.getElementById('modal-lexile');
const modalLexileContainer = document.getElementById('modal-lexile-container');
const modalDewey = document.getElementById('modal-dewey');
const modalDeweyContainer = document.getElementById('modal-dewey-container');
const modalSingleActions = document.getElementById('modal-single-actions');
const modalCollectionActions = document.getElementById('modal-collection-actions');

window.openModal = function (element) {
    const data = element.dataset;

    modalTitle.textContent = data.title;
    modalAuthor.textContent = data.author;
    modalDescription.textContent = data.description;
    modalIsbn.textContent = data.isbn;
    modalDate.textContent = data.date;
    modalImg.src = data.img;

    if (data.isCollection === 'true') {
        modalSingleActions.classList.add('hidden');
        modalCollectionActions.classList.remove('hidden');
        modalCollectionActions.classList.add('flex');
        
        modalCollectionActions.innerHTML = ''; // clear old
        let books = [];
        try { books = JSON.parse(data.books); } catch(e) {}
        
        books.forEach(book => {
            const item = document.createElement('div');
            item.className = "flex flex-col sm:flex-row items-center justify-between gap-4 p-4 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors";
            
            const titleSpan = document.createElement('span');
            titleSpan.className = "font-bold text-gray-900 dark:text-white flex-1 text-center sm:text-left leading-tight";
            titleSpan.textContent = book.title;

            const linkContainer = document.createElement('div');
            linkContainer.className = "flex gap-2 flex-wrap justify-center shrink-0";
            
            if (book['read-online-link'] && book['read-online-link'] !== '#') {
                const inlineLink = document.createElement('a');
                inlineLink.href = book['read-online-link'];
                inlineLink.target = "_blank";
                inlineLink.className = "text-xs font-bold bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-500 hover:text-white transition-colors px-3 py-1.5 rounded-lg";
                inlineLink.textContent = "Read Online";
                linkContainer.appendChild(inlineLink);
            }

            if (book['pdf-link'] && book['pdf-link'] !== '#') {
                const pdfLink = document.createElement('a');
                pdfLink.href = book['pdf-link'];
                pdfLink.target = "_blank";
                pdfLink.className = "text-xs font-bold bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-500 hover:text-white transition-colors px-3 py-1.5 rounded-lg flex items-center gap-1.5";
                pdfLink.innerHTML = "<i class='fas fa-file-pdf'></i> PDF";
                linkContainer.appendChild(pdfLink);
            }

            if (book['epub-link'] && book['epub-link'] !== '#') {
                const epubLink = document.createElement('a');
                epubLink.href = book['epub-link'];
                epubLink.target = "_blank";
                epubLink.className = "text-xs font-bold bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-500 hover:text-white transition-colors px-3 py-1.5 rounded-lg flex items-center gap-1.5";
                epubLink.innerHTML = "<i class='fas fa-book'></i> ePUB";
                linkContainer.appendChild(epubLink);
            }
            
            if (book['mobi-link'] && book['mobi-link'] !== '#') {
                const mobiLink = document.createElement('a');
                mobiLink.href = book['mobi-link'];
                mobiLink.target = "_blank";
                mobiLink.className = "text-xs font-bold bg-amber-500/10 text-amber-600 dark:text-amber-400 hover:bg-amber-500 hover:text-white transition-colors px-3 py-1.5 rounded-lg flex items-center gap-1.5";
                mobiLink.innerHTML = "<i class='fas fa-tablet-alt'></i> MOBI";
                linkContainer.appendChild(mobiLink);
            }

            item.appendChild(titleSpan);
            item.appendChild(linkContainer);
            modalCollectionActions.appendChild(item);
        });
        
    } else {
        modalSingleActions.classList.remove('hidden');
        modalCollectionActions.classList.add('hidden');
        modalCollectionActions.classList.remove('flex');

        // Links
        setupLink(modalReadOnlineLink, data.readOnlineLink);
        setupLink(modalPdfLink, data.pdfLink);
        setupLink(modalEpubLink, data.epubLink);
        setupLink(modalMobiLink, data.mobiLink);
    }

    // Lexile
    if (data.lexile) {
        modalLexile.textContent = data.lexile;
        modalLexileContainer.style.display = 'block';
    } else {
        modalLexileContainer.style.display = 'none';
    }

    // Dewey
    if (data.dewey) {
        modalDewey.textContent = data.dewey;
        modalDeweyContainer.style.display = 'block';
    } else {
        modalDeweyContainer.style.display = 'none';
    }

    // Open animation
    modal.classList.remove('hidden');
    void modal.offsetWidth; // Trigger reflow
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100');
    if (modalContent) {
       modalContent.classList.remove('scale-95', 'opacity-0');
       modalContent.classList.add('scale-100', 'opacity-100');
    }
    document.body.style.overflow = 'hidden'; // Prevents background scroll
    
    setTimeout(() => {
        const closeBtn = document.getElementById('book-modal-close');
        if (closeBtn) closeBtn.focus();
    }, 100);
}

function setupLink(el, url) {
    if (!el) return;
    if (!url || url === '#') {
        el.classList.add('opacity-40', 'pointer-events-none', 'grayscale', 'cursor-not-allowed');
        el.href = '#';
        el.removeAttribute('target');
        el.removeAttribute('rel');
    } else {
        el.classList.remove('opacity-40', 'pointer-events-none', 'grayscale', 'cursor-not-allowed');
        el.href = url;
        el.target = '_blank'; // From the target="_blank" book links conversation!
        el.rel = 'noopener noreferrer';
    }
}

window.closeModal = function () {
    if (!modal) return;
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    if (modalContent) {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
    }
    
    setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        document.body.style.overflow = '';
    }, 300);
}

window.openDisclaimerModal = function () {
    const dModal = document.getElementById('disclaimerModal');
    const dContent = dModal.querySelector('.disclaimer-modal-content');
    if(!dModal) return;
    
    dModal.classList.remove('hidden');
    void dModal.offsetWidth;
    dModal.classList.remove('opacity-0', 'pointer-events-none');
    dModal.classList.add('opacity-100');
    
    if (dContent){
        dContent.classList.remove('scale-95');
        dContent.classList.add('scale-100');
    }
}

window.closeDisclaimerModal = function () {
    const dModal = document.getElementById('disclaimerModal');
    const dContent = dModal.querySelector('.disclaimer-modal-content');
    if(!dModal) return;
    
    dModal.classList.remove('opacity-100');
    dModal.classList.add('opacity-0');
    
    if(dContent) {
         dContent.classList.remove('scale-100');
         dContent.classList.add('scale-95');
    }
    
    setTimeout(() => dModal.classList.add('hidden', 'pointer-events-none'), 300);
}

// Close on Escape & Initial setup
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        const disclaimerModal = document.getElementById('disclaimerModal');
        if (disclaimerModal && !disclaimerModal.classList.contains('hidden')) {
            closeDisclaimerModal();
        } else {
            closeModal();
        }
    }
});

// Run custom setup on boot
document.addEventListener("DOMContentLoaded", () => {
     // Restore filter state
     if (searchInput) {
         const savedSearch = localStorage.getItem('library-search');
         if (savedSearch !== null) searchInput.value = savedSearch;
     }
     if (categoryFilter) {
         const savedCat = localStorage.getItem('library-category');
         if (savedCat !== null) categoryFilter.value = savedCat;
     }
     
     // Apply filters if there's saved state
     if ((searchInput && searchInput.value) || (categoryFilter && categoryFilter.value !== 'all')) {
         filterBooks();
     }

     // Trigger reveal animations
     const revealObserver = new IntersectionObserver((entries) => {
         entries.forEach(entry => {
             if (entry.isIntersecting) {
                 entry.target.classList.add('animate-reveal');
                 revealObserver.unobserve(entry.target);
             }
         });
     }, { threshold: 0.1 });

     document.querySelectorAll('.will-animate').forEach(el => {
         revealObserver.observe(el);
     });
});
