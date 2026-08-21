/* library/library.js - Digital Library Hub Interactive Scripts */

let disclaimersData = {};

document.addEventListener("DOMContentLoaded", () => {
    applyStoredLexileOverrides();
    setupScrollButtons();
    setupFilters();
    setupA11y();
    loadDisclaimers();
    setupSidebarToggle();
    setupProgressBars();
    setupLexileEditing();
});

function applyStoredLexileOverrides() {
    const cards = document.querySelectorAll('.library-book-card');
    cards.forEach(card => {
        const id = card.dataset.id;
        if (!id) return;
        
        const overrideLex = localStorage.getItem(`hesten_lexile_override_${id}`);
        if (overrideLex) {
            card.dataset.lexile = overrideLex;
        }
    });
}

function setupLexileEditing() {
    const editBtn = document.getElementById('edit-lexile-btn');
    const saveBtn = document.getElementById('save-lexile-btn');
    const cancelBtn = document.getElementById('cancel-lexile-btn');
    const lexDisplay = document.getElementById('modal-lexile');
    const editContainer = document.getElementById('modal-lexile-edit-container');
    const lexInput = document.getElementById('modal-lexile-input');

    if (!editBtn || !saveBtn || !cancelBtn || !lexDisplay || !editContainer || !lexInput) return;

    editBtn.addEventListener('click', () => {
        lexDisplay.style.display = 'none';
        editBtn.style.display = 'none';
        editContainer.classList.remove('hidden');
        editContainer.style.display = 'flex';
        
        lexInput.value = lexDisplay.textContent.trim();
        lexInput.focus();
    });

    const resetView = () => {
        lexDisplay.style.display = '';
        editBtn.style.display = '';
        editContainer.classList.add('hidden');
        editContainer.style.display = 'none';
    };

    cancelBtn.addEventListener('click', resetView);

    saveBtn.addEventListener('click', () => {
        const newVal = lexInput.value.trim();
        const bookId = window.currentBookId;
        if (!bookId) return;

        if (newVal) {
            localStorage.setItem(`hesten_lexile_override_${bookId}`, newVal);
            lexDisplay.textContent = newVal;

            const card = document.querySelector(`.library-book-card[data-id="${bookId}"]`);
            if (card) {
                card.dataset.lexile = newVal;
            }

            const filterInput = document.getElementById('library-search');
            if (filterInput) {
                filterInput.dispatchEvent(new Event('input'));
            }
        }
        resetView();
    });
}

function setupProgressBars() {
    const tracks = document.querySelectorAll('.book-progress-track');
    tracks.forEach(track => {
        const bookId = track.dataset.progressId;
        if (!bookId) return;

        try {
            const pct = localStorage.getItem(`hesten_completion_pct_${bookId}`);
            if (pct !== null) {
                const fill = track.querySelector('.book-progress-fill');
                if (fill) {
                    const progressNum = parseInt(pct, 10);
                    if (progressNum > 0) {
                        fill.style.width = `${progressNum}%`;
                        track.classList.remove('hidden');
                    }
                }
            }
        } catch (e) {}
    });
}

function setupSidebarToggle() {
    const sidebar = document.getElementById('library-sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');
    if (sidebar && toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            const icon = toggleBtn.querySelector('i');
            if (icon) {
                if (sidebar.classList.contains('collapsed')) {
                    icon.className = 'fas fa-chevron-right';
                } else {
                    icon.className = 'fas fa-chevron-left';
                }
            }
        });
    }
}

window.openResourcePortal = function(categoryName) {
    const landing = document.getElementById('main-desk-landing');
    const workspace = document.getElementById('subject-desk-workspace');
    if (!landing || !workspace) return;

    activeCategoryName = categoryName;

    // Highlight active sidebar buttons
    document.querySelectorAll('.sidebar-item-btn').forEach(btn => {
        const btnText = btn.textContent.trim();
        if (btnText.includes(categoryName)) {
            btn.style.backgroundColor = "color-mix(in srgb, var(--color-primary) 12%, transparent)";
            btn.style.color = "var(--color-primary)";
            btn.style.borderColor = "color-mix(in srgb, var(--color-primary) 20%, transparent)";
        } else {
            btn.style.backgroundColor = "";
            btn.style.color = "";
            btn.style.borderColor = "";
        }
    });

    // Populate drawer header details
    const drawerTitle = document.getElementById('drawer-title');
    const drawerSubtitle = document.getElementById('drawer-subtitle');

    if (drawerTitle) drawerTitle.textContent = categoryName;
    if (drawerSubtitle) {
        let desc = "Browse resources, references, and study items.";
        if (categoryName === "US History") desc = "Primary founding documents, constitutional laws, and historical papers.";
        else if (categoryName === "World History") desc = "Ancient military strategies, strategic treatises, and philosophical meditations.";
        else if (categoryName === "WW1") desc = "Diplomatic records, economic treatises, and historical memoirs of the First World War.";
        else if (categoryName === "WW2") desc = "Allied strategy reports, command decisions, and archival wartime documents.";
        else if (categoryName === "Math") desc = "Classic geometry elements, theories of relativity, and mathematical proofs.";
        else if (categoryName === "ELA") desc = "English grammar stylebooks, reference dictionaries, and vocabulary resources.";
        drawerSubtitle.textContent = desc;
    }

    // Reset Search in drawer
    const searchInput = document.getElementById('drawer-search');
    if (searchInput) searchInput.value = "";

    // Toggle panels inline (no full screen fixed overlays)
    landing.style.display = 'none';
    landing.classList.add('hidden');
    
    workspace.classList.remove('hidden');
    workspace.style.display = 'flex';
    workspace.offsetHeight; // force reflow
    workspace.style.opacity = "1";

    // Scroll to top of workspace smoothly
    window.scrollTo({ top: 0, behavior: 'smooth' });

    // Populate external links
    const linksContainer = document.getElementById('drawer-external-links-container');
    const linksList = document.getElementById('drawer-external-links-list');
    
    if (linksContainer && linksList) {
        const categoryLinks = window.DESK_EXTERNAL_LINKS ? window.DESK_EXTERNAL_LINKS[categoryName] : null;
        if (categoryLinks && categoryLinks.length > 0) {
            linksList.innerHTML = categoryLinks.map(link => `
                <div style="background: var(--color-content-bg); border: 1px solid var(--color-border); padding: 1.25rem; border-radius: 1rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h4 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.05rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-default);">${link.title}</h4>
                        <p style="font-size: 0.85rem; color: var(--color-text-secondary); margin: 0 0 1rem 0; line-height: 1.5;">${link.description}</p>
                    </div>
                    <a href="${link.url}" target="_blank" rel="noopener noreferrer" class="library-drawer-close-btn" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; width: fit-content; padding: 0.4rem 0.8rem; border-radius: 0.5rem; font-size: 0.8rem; font-weight: 700; background: var(--color-base-bg); color: var(--color-text-default);">
                        Visit Resource <i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i>
                    </a>
                </div>
            `).join('');
            linksContainer.style.display = 'block';
            linksContainer.classList.remove('hidden');
        } else {
            linksList.innerHTML = '';
            linksContainer.style.display = 'none';
            linksContainer.classList.add('hidden');
        }
    }

    // Apply filter and sort
    sortDrawerBooks();
    filterDrawerBooks();
};

function loadDisclaimers() {
    fetch('assets/disclaimers.json')
        .then(res => res.json())
        .then(data => {
            disclaimersData = data;
        })
        .catch(err => console.error("Error loading disclaimers:", err));
}

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
    const lexileFilter = document.getElementById('lexile-filter');
    const sections = document.querySelectorAll('.library-row-section');
    const noResults = document.getElementById('no-results');

    function filterLibrary() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedCat = categoryFilter.value;
        const selectedLexile = lexileFilter ? lexileFilter.value : 'all';
        let totalVisible = 0;

        sections.forEach(section => {
            const sectionCategory = section.dataset.category;
            const books = section.querySelectorAll('.library-book-card');
            let visibleInRow = 0;

            let categoryMatch = false;
            if (selectedCat === 'all') {
                categoryMatch = true;
            } else if (selectedCat === 'other') {
                categoryMatch = (sectionCategory !== 'Primary Documents');
            } else {
                categoryMatch = (sectionCategory === selectedCat);
            }

            books.forEach(book => {
                const title = book.dataset.title.toLowerCase();
                const author = book.dataset.author.toLowerCase();
                const isbn = book.dataset.isbn.toLowerCase();

                const matchesSearch = !query || 
                    title.includes(query) || 
                    author.includes(query) || 
                    isbn.includes(query);

                let lexileMatch = true;
                if (selectedLexile !== 'all') {
                    const lexValAttr = book.dataset.lexile || '';
                    const numMatch = lexValAttr.match(/(\d+)/);
                    const lexNum = numMatch ? parseInt(numMatch[1], 10) : null;
                    
                    if (lexNum === null) {
                        lexileMatch = false;
                    } else if (selectedLexile === 'easy') {
                        lexileMatch = lexNum < 500;
                    } else if (selectedLexile === 'medium') {
                        lexileMatch = lexNum >= 500 && lexNum <= 900;
                    } else if (selectedLexile === 'hard') {
                        lexileMatch = lexNum > 900;
                    }
                }

                if (categoryMatch && matchesSearch && lexileMatch) {
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

    if (lexileFilter) {
        lexileFilter.addEventListener('change', filterLibrary);
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', () => {
            filterLibrary();
            const selectedVal = categoryFilter.value;
            const tabs = document.querySelectorAll('.library-tab-btn');
            tabs.forEach(tab => {
                const tabId = tab.getAttribute('data-tab-id');
                let isActive = false;
                if (selectedVal === 'all' && tabId === 'all') {
                    isActive = true;
                } else if (selectedVal === 'Primary Documents' && tabId === 'Primary Documents') {
                    isActive = true;
                } else if (selectedVal !== 'all' && selectedVal !== 'Primary Documents' && tabId === 'other') {
                    isActive = true;
                }
                if (isActive) {
                    tab.classList.add('active-tab');
                } else {
                    tab.classList.remove('active-tab');
                }
            });
        });
    }
}

/* --- Details Modal Operations --- */
window.openModal = function(card) {
    const modal = document.getElementById('bookModal');
    if (!modal) return;

    // Retrieve datasets
    const id = card.dataset.id;
    window.currentBookId = id;

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
    
    let lexile = card.dataset.lexile;
    if (id) {
        const overrideLex = localStorage.getItem(`hesten_lexile_override_${id}`);
        if (overrideLex) {
            lexile = overrideLex;
        }
    }

    const dewey = card.dataset.dewey;
    const lc = card.dataset.lc;
    const grade = card.dataset.grade;
    const isCollection = card.dataset.isCollection === 'true';
    const disclaimerKey = card.dataset.disclaimerKey;
    const disclaimerText = card.dataset.disclaimerText;

    window.currentBookFileSource = card.dataset.fileSource || '';
    window.currentBookInfoSource = card.dataset.infoSource || '';

    // Resolve disclaimer to show
    window.currentBookDisclaimer = '';
    if (disclaimerText && disclaimerText.trim() !== '') {
        window.currentBookDisclaimer = disclaimerText;
    } else if (disclaimerKey && disclaimersData[disclaimerKey]) {
        window.currentBookDisclaimer = disclaimersData[disclaimerKey];
    } else {
        window.currentBookDisclaimer = disclaimersData['default'] || '';
    }

    // Populate standard properties
    document.getElementById('modal-title').textContent = title || 'Untitled';
    document.getElementById('modal-author').textContent = author ? `by ${author}` : '';
    document.getElementById('modal-img').src = img || '';
    document.getElementById('modal-img').alt = title || 'Book Cover';
    document.getElementById('modal-description').textContent = description || 'No summary available.';
    document.getElementById('modal-date').textContent = date || 'N/A';
    document.getElementById('modal-isbn').textContent = isbn ? formatISBN(isbn) : 'N/A';

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

    // LC Class
    const lcContainer = document.getElementById('modal-lc-container');
    const lcEl = document.getElementById('modal-lc');
    if (lc && lc !== 'N/A' && lc !== '') {
        lcEl.textContent = lc;
        lcContainer.classList.remove('hidden');
    } else {
        lcContainer.classList.add('hidden');
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
    
    const defaultDisclaimer = disclaimersData['default'] || '';
    const bookDisclaimer = window.currentBookDisclaimer || '';
    
    const fileSrc = window.currentBookFileSource || 'N/A';
    const infoSrc = window.currentBookInfoSource || 'N/A';

    const defaultText = `
        <div style="margin-bottom: 0.75rem; font-size: 0.95rem;">
            <strong style="color: var(--color-text-secondary);">Book File Source:</strong> <span style="color: var(--color-text-default); font-weight: 500;">${fileSrc}</span>
        </div>
        <div style="margin-bottom: 1.25rem; font-size: 0.95rem;">
            <strong style="color: var(--color-text-secondary);">Metadata Sourced From:</strong> <span style="color: var(--color-text-default); font-weight: 500;">${infoSrc}</span>
        </div>
        <p style="margin: 0; font-size: 0.85rem; color: var(--color-text-secondary); line-height: 1.6; border-top: 1px dashed var(--color-border); padding-top: 1rem;">
            The books and materials in this digital library are provided for educational and informational purposes only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of these materials complies with applicable copyright laws before downloading.
        </p>
    `;

    const discTextEl = discModal.querySelector('.library-disclaimer-text');
    if (discTextEl) {
        discTextEl.innerHTML = defaultText;
    }

    const hasCustomLicense = (bookDisclaimer && bookDisclaimer.trim() !== '' && bookDisclaimer !== defaultDisclaimer);
    
    const tabsContainer = document.getElementById('disclaimer-tabs');
    const licenseTextEl = discModal.querySelector('.library-disclaimer-license-text');
    
    if (hasCustomLicense) {
        if (tabsContainer) {
            tabsContainer.classList.remove('hidden');
            tabsContainer.style.display = 'flex';
        }
        if (licenseTextEl) {
            licenseTextEl.textContent = bookDisclaimer;
        }
    } else {
        if (tabsContainer) {
            tabsContainer.classList.add('hidden');
            tabsContainer.style.display = 'none';
        }
    }
    
    window.switchDisclaimerTab('standard');
    
    discModal.classList.remove('hidden');
    discModal.offsetHeight;
    discModal.classList.add('active');
    
    const closeBtn = document.getElementById('disclaimer-modal-close');
    if (closeBtn) closeBtn.focus();
};

window.switchDisclaimerTab = function(tabName) {
    const tabStandard = document.getElementById('tab-disc-standard');
    const tabLicense = document.getElementById('tab-disc-license');
    const viewStandard = document.getElementById('disclaimer-standard-view');
    const viewLicense = document.getElementById('disclaimer-license-view');
    
    if (tabName === 'standard') {
        if (tabStandard) tabStandard.classList.add('active');
        if (tabLicense) tabLicense.classList.remove('active');
        
        if (viewStandard) {
            viewStandard.classList.remove('hidden');
            viewStandard.style.display = 'block';
        }
        if (viewLicense) {
            viewLicense.classList.add('hidden');
            viewLicense.style.display = 'none';
        }
    } else if (tabName === 'license') {
        if (tabStandard) tabStandard.classList.remove('active');
        if (tabLicense) tabLicense.classList.add('active');
        
        if (viewStandard) {
            viewStandard.classList.add('hidden');
            viewStandard.style.display = 'none';
        }
        if (viewLicense) {
            viewLicense.classList.remove('hidden');
            viewLicense.style.display = 'block';
        }
    }
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
            const lexModal = document.getElementById('lexileInfoModal');
            const ddcModal = document.getElementById('ddcInfoModal');
            const drawer = document.getElementById('resource-portal-drawer');
            
            if (lexModal && lexModal.classList.contains('active')) {
                closeLexileInfoModal();
            } else if (ddcModal && ddcModal.classList.contains('active')) {
                closeDdcInfoModal();
            } else if (discModal && discModal.classList.contains('active')) {
                closeDisclaimerModal();
            } else if (bookModal && bookModal.classList.contains('active')) {
                closeModal();
            } else if (drawer && drawer.classList.contains('active')) {
                closeResourcePortal();
            }
        }
    });
}

/* --- Lexile Info Modal Operations --- */
window.openLexileInfoModal = function() {
    const modal = document.getElementById('lexileInfoModal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.offsetHeight;
    modal.classList.add('active');
};
window.closeLexileInfoModal = function() {
    const modal = document.getElementById('lexileInfoModal');
    if (!modal) return;
    modal.classList.remove('active');
    setTimeout(() => { modal.classList.add('hidden'); }, 300);
};

/* --- DDC Info Modal Operations --- */
window.openDdcInfoModal = function() {
    const modal = document.getElementById('ddcInfoModal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.offsetHeight;
    modal.classList.add('active');
};
window.closeDdcInfoModal = function() {
    const modal = document.getElementById('ddcInfoModal');
    if (!modal) return;
    modal.classList.remove('active');
    setTimeout(() => { modal.classList.add('hidden'); }, 300);
};

/* --- Netflix-style Tab Swapper --- */
window.switchLibraryTab = function(tabName) {
    const selectFilter = document.getElementById('category-filter');
    if (selectFilter) {
        selectFilter.value = tabName;
        selectFilter.dispatchEvent(new Event('change'));
    }
};

/* --- Drawer Close, Filter, and Sort Hold --- */
window.closeResourcePortal = function() {
    const landing = document.getElementById('main-desk-landing');
    const workspace = document.getElementById('subject-desk-workspace');
    if (!landing || !workspace) return;

    workspace.style.opacity = "0";
    
    // Unhighlight sidebar buttons
    document.querySelectorAll('.sidebar-item-btn').forEach(btn => {
        btn.style.backgroundColor = "";
        btn.style.color = "";
        btn.style.borderColor = "";
    });

    setTimeout(() => {
        workspace.classList.add('hidden');
        workspace.style.display = 'none';
        
        landing.classList.remove('hidden');
        landing.style.display = 'block';
        
        // Scroll to top of main catalog smoothly
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 300);
};

window.filterDrawerBooks = function() {
    const searchInput = document.getElementById('drawer-search');
    const query = searchInput ? searchInput.value.toLowerCase().trim() : "";
    const grid = document.getElementById('drawer-grid');
    const emptyState = document.getElementById('drawer-empty');
    if (!grid) return;

    let visibleCount = 0;
    const sections = grid.querySelectorAll('.drawer-section');

    sections.forEach(section => {
        const category = section.dataset.category || "";
        const matchesCategory = (category === activeCategoryName);

        if (!matchesCategory) {
            section.style.display = 'none';
            return;
        }

        // Filter cards locally inside this section
        const cards = section.querySelectorAll('.library-book-card');
        let sectionVisibleBooks = 0;

        cards.forEach(card => {
            const title = (card.dataset.title || "").toLowerCase();
            const author = (card.dataset.author || "").toLowerCase();
            const isbn = (card.dataset.isbn || "").toLowerCase();

            const matchesSearch = !query || 
                title.includes(query) || 
                author.includes(query) || 
                isbn.includes(query);

            if (matchesSearch) {
                card.style.display = 'block';
                sectionVisibleBooks++;
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Hide section container if empty during searches
        if (sectionVisibleBooks > 0 || !query) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });

    // Update count labels
    const countLabel = document.getElementById('drawer-count');
    if (countLabel) countLabel.textContent = visibleCount;

    if (emptyState) {
        emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }
};

window.sortDrawerBooks = function() {
    const grids = document.querySelectorAll('.drawer-section-grid');
    if (grids.length === 0) return;
    const sortVal = document.getElementById('drawer-sort')?.value || 'title';

    grids.forEach(grid => {
        const cards = Array.from(grid.querySelectorAll('.library-book-card'));
        cards.sort((a, b) => {
            if (sortVal === 'title') {
                const titleA = (a.dataset.title || '').toLowerCase();
                const titleB = (b.dataset.title || '').toLowerCase();
                return titleA.localeCompare(titleB);
            } else if (sortVal === 'ddc') {
                let valA = a.dataset.dewey || a.dataset.lc || '999';
                let valB = b.dataset.dewey || b.dataset.lc || '999';
                if (valA === '' || valA === '#') valA = '999';
                if (valB === '' || valB === '#') valB = '999';
                const numA = parseFloat(valA);
                const numB = parseFloat(valB);
                if (!isNaN(numA) && !isNaN(numB)) {
                    return numA - numB;
                }
                return valA.localeCompare(valB);
            } else if (sortVal === 'lexile') {
                let lexA = parseInt((a.dataset.lexile || '0').replace(/\D/g, '')) || 0;
                let lexB = parseInt((b.dataset.lexile || '0').replace(/\D/g, '')) || 0;
                return lexA - lexB;
            } else if (sortVal === 'date') {
                const dateA = new Date(a.dataset.date || '1970-01-01');
                const dateB = new Date(b.dataset.date || '1970-01-01');
                return dateB - dateA;
            }
            return 0;
        });

        cards.forEach(card => grid.appendChild(card));
    });
};

function formatISBN(isbn) {
    const clean = isbn.replace(/[^0-9X]/gi, '');
    if (clean.length === 13) {
        return `${clean.slice(0, 3)}-${clean.slice(3, 4)}-${clean.slice(4, 8)}-${clean.slice(8, 12)}-${clean.slice(12)}`;
    } else if (clean.length === 10) {
        return `${clean.slice(0, 1)}-${clean.slice(1, 5)}-${clean.slice(5, 9)}-${clean.slice(9)}`;
    }
    return isbn;
}
