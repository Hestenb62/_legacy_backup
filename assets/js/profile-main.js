// assets/js/profile.js
document.addEventListener("DOMContentLoaded", () => {
    // 0. Announcement Banner Logic
    const annBanner = document.getElementById('profile-announcement-banner');
    const dismissBtn = document.getElementById('dismiss-announcement-btn');
    if (annBanner && dismissBtn) {
        if (sessionStorage.getItem('profile-announcement-dismissed') === 'true') {
            annBanner.classList.add('hidden');
        }
        dismissBtn.addEventListener('click', () => {
            annBanner.classList.add('hidden');
            sessionStorage.setItem('profile-announcement-dismissed', 'true');
        });
    }

    // 1. Profile Identity Logic
    const profileKey = 'hesten-user-profile';
    const avatarPreview = document.getElementById('profile-avatar-preview');
    const avatarUpload = document.getElementById('profile-avatar-upload');
    const firstNameInput = document.getElementById('profile-first-name');
    const saveBtn = document.getElementById('profile-save-btn');
    const saveMsg = document.getElementById('profile-save-msg');

    let currentProfile = JSON.parse(localStorage.getItem(profileKey)) || {
        firstName: '',
        avatarData: ''
    };

    // Load initial values
    if (currentProfile.firstName) {
        firstNameInput.value = currentProfile.firstName;
    }
    if (currentProfile.avatarData) {
        avatarPreview.src = currentProfile.avatarData;
    }

    // Handle avatar upload (Base64)
    avatarUpload.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (event) => {
            const base64Str = event.target.result;
            avatarPreview.src = base64Str;
            currentProfile.avatarData = base64Str;
        };
        reader.readAsDataURL(file);
    });

    // Handle save
    saveBtn.addEventListener('click', () => {
        currentProfile.firstName = firstNameInput.value.trim();
        localStorage.setItem(profileKey, JSON.stringify(currentProfile));
        
        // Update global header immediately
        const nameEl = document.querySelector('.user-name');
        const avatarEls = document.querySelectorAll('.user-avatar');
        if (nameEl && currentProfile.firstName) nameEl.textContent = currentProfile.firstName;
        if (avatarEls.length > 0 && currentProfile.avatarData) {
            avatarEls.forEach(img => img.src = currentProfile.avatarData);
        }

        saveMsg.classList.remove('hidden');
        setTimeout(() => saveMsg.classList.add('hidden'), 3000);
    });

    // 2. Tabs Logic
    const tabBooks = document.getElementById('tab-books');
    const tabHl = document.getElementById('tab-highlights');
    const contBooks = document.getElementById('content-books');
    const contHl = document.getElementById('content-highlights');

    tabBooks.addEventListener('click', () => {
        tabBooks.classList.add('active');
        tabHl.classList.remove('active');
        contBooks.classList.remove('hidden');
        contHl.classList.add('hidden');
    });

    tabHl.addEventListener('click', () => {
        tabHl.classList.add('active');
        tabBooks.classList.remove('active');
        contHl.classList.remove('hidden');
        contBooks.classList.add('hidden');
    });

    // 3. Stats and List Rendering Logic
    const bookmarksKey = 'hesten_library_bookmarks'; // FIXED: Match library
    
    // Load Bookmarks
    let bookmarks = [];
    try {
        bookmarks = JSON.parse(localStorage.getItem(bookmarksKey)) || [];
    } catch(e) {}
    
    // Load Highlights (Note: reader.js saves highlights per-book, so we need to scan localStorage keys)
    let allHighlights = [];
    let allNotes = 0;
    for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        if (key && key.startsWith('hesten_highlights_')) { // FIXED: Match reader prefix
            try {
                const hls = JSON.parse(localStorage.getItem(key)) || [];
                hls.forEach(hl => {
                    // Extract bookId from "hesten_highlights_{bookId}_chapter_{num}"
                    const match = key.match(/^hesten_highlights_(.+)_chapter_\d+$/);
                    if (match) {
                        hl.bookId = match[1];
                        allHighlights.push(hl);
                        if (hl.note) allNotes++;
                    }
                });
            } catch(e) {}
        }
    }

    // Update Stats
    document.getElementById('stat-bookmarks').textContent = bookmarks.length;
    document.getElementById('stat-highlights').textContent = allHighlights.length;
    document.getElementById('stat-notes').textContent = allNotes;

    // Render Books
    const listBooks = document.getElementById('list-books');
    const emptyBooks = document.getElementById('empty-books');
    if (bookmarks.length === 0) {
        emptyBooks.classList.remove('hidden');
    } else {
        listBooks.innerHTML = bookmarks.map(id => `
            <a href="../library/read/index.php?book=${encodeURIComponent(id)}" class="profile-list-item">
                <div class="profile-item-icon"><i class="fas fa-book"></i></div>
                <div class="profile-item-content">
                    <div class="profile-item-title">${id.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase())}</div>
                    <div class="profile-item-desc">Saved to your reading list</div>
                </div>
                <button class="profile-item-action" onclick="event.preventDefault(); removeBookmark('${id}')" title="Remove Bookmark">
                    <i class="fas fa-trash"></i>
                </button>
            </a>
        `).join('');
    }

    // Render Highlights
    const listHl = document.getElementById('list-highlights');
    const emptyHl = document.getElementById('empty-highlights');
    if (allHighlights.length === 0) {
        emptyHl.classList.remove('hidden');
    } else {
        // Sort newest first based on timestamp (if it existed) or just reverse
        allHighlights.reverse();
        listHl.innerHTML = allHighlights.map(hl => {
            const bookTitle = hl.bookId.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
            return `
            <div class="profile-list-item">
                <div class="profile-item-icon"><i class="fas fa-highlighter"></i></div>
                <div class="profile-item-content">
                    <div class="profile-item-title">${bookTitle}</div>
                    <div class="profile-item-desc">"${hl.text}"</div>
                    ${hl.note ? `<div class="profile-item-meta"><i class="fas fa-sticky-note"></i> Note: ${hl.note}</div>` : ''}
                </div>
            </div>
            `;
        }).join('');
    }

    // Global helper to remove bookmark from profile
    window.removeBookmark = function(id) {
        if (!confirm('Remove this book from your list?')) return;
        let bms = JSON.parse(localStorage.getItem(bookmarksKey)) || [];
        bms = bms.filter(b => b !== id);
        localStorage.setItem(bookmarksKey, JSON.stringify(bms));
        window.location.reload();
    };

    // 4. Badges Logic
    const badgesContainer = document.getElementById('badges-container');
    if (badgesContainer) {
        const badges = [
            { id: 'first-book', icon: 'fas fa-book', color: 'blue', title: 'First Book', condition: bookmarks.length >= 1 },
            { id: 'avid-reader', icon: 'fas fa-book-reader', color: 'gold', title: 'Avid Reader', condition: bookmarks.length >= 5 },
            { id: 'highlighter', icon: 'fas fa-highlighter', color: 'green', title: 'Highlighter', condition: allHighlights.length >= 1 },
            { id: 'scholar', icon: 'fas fa-pen-fancy', color: 'gold', title: 'Scholar', condition: allNotes >= 5 }
        ];

        badgesContainer.innerHTML = badges.map(b => `
            <div class="badge-item ${b.condition ? 'unlocked' : ''}">
                <div class="badge-icon ${b.color}"><i class="${b.icon}"></i></div>
                <div class="badge-title">${b.title}</div>
            </div>
        `).join('');
    }
});
