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

    // 4. Daily Learning Streak & Study Goals Logic
    function initStreakAndGoals() {
        const STREAK_KEY = 'hesten_learning_streak';
        const TODAY_MINS_KEY = 'hesten_today_study_minutes';
        const FOCUS_SESSIONS_KEY = 'hesten_focus_sessions_completed';
        const todayStr = new Date().toISOString().slice(0, 10);

        let streakData = { streak: 1, lastDate: todayStr, history: [todayStr] };
        try {
            const raw = localStorage.getItem(STREAK_KEY);
            if (raw) streakData = JSON.parse(raw);
        } catch(e){}

        if (streakData.lastDate !== todayStr) {
            const lastDateObj = new Date(streakData.lastDate);
            const todayObj = new Date(todayStr);
            const diffDays = Math.round((todayObj - lastDateObj) / (1000 * 60 * 60 * 24));

            if (diffDays === 1) {
                streakData.streak += 1;
                streakData.lastDate = todayStr;
                if (!streakData.history.includes(todayStr)) streakData.history.push(todayStr);
            } else if (diffDays > 1) {
                streakData.streak = 1;
                streakData.lastDate = todayStr;
                streakData.history = [todayStr];
            }
            try { localStorage.setItem(STREAK_KEY, JSON.stringify(streakData)); } catch(e){}
        }

        let todayMinutes = 0;
        try {
            const storedMins = JSON.parse(localStorage.getItem(TODAY_MINS_KEY));
            if (storedMins && storedMins.date === todayStr) {
                todayMinutes = storedMins.minutes || 0;
            } else {
                localStorage.setItem(TODAY_MINS_KEY, JSON.stringify({ date: todayStr, minutes: 0 }));
            }
        } catch(e){}

        const dailyGoalMins = 20;
        const progressPct = Math.min(100, Math.round((todayMinutes / dailyGoalMins) * 100));

        const streakEl = document.getElementById('stat-streak');
        const studyMinsEl = document.getElementById('stat-study-mins');
        const goalFillEl = document.getElementById('goal-progress-fill');
        const goalPctEl = document.getElementById('goal-progress-pct');

        if (streakEl) streakEl.textContent = `${streakData.streak} 🔥`;
        if (studyMinsEl) studyMinsEl.textContent = `${todayMinutes}m`;
        if (goalFillEl) goalFillEl.style.width = `${progressPct}%`;
        if (goalPctEl) goalPctEl.textContent = `${progressPct}% (${todayMinutes}/${dailyGoalMins}m)`;

        let focusCount = 0;
        try { focusCount = parseInt(localStorage.getItem(FOCUS_SESSIONS_KEY), 10) || 0; } catch(e){}

        return {
            streak: streakData.streak,
            todayMinutes: todayMinutes,
            focusSessions: focusCount
        };
    }

    const streakInfo = initStreakAndGoals();

    // 5. Achievements & Gamification Badges
    const badgesContainer = document.getElementById('badges-container');
    if (badgesContainer) {
        const standardsMastery = JSON.parse(localStorage.getItem('hesten_standards_mastery')) || {};
        const standardsTestedCount = Object.keys(standardsMastery).length;
        const standardsMasteredCount = Object.values(standardsMastery).filter(s => s.bestScore >= 80).length;

        const badges = [
            { id: 'first-book', icon: 'fas fa-book', color: 'blue', title: 'First Book', condition: bookmarks.length >= 1 },
            { id: 'avid-reader', icon: 'fas fa-book-reader', color: 'gold', title: 'Avid Reader', condition: bookmarks.length >= 5 },
            { id: 'highlighter', icon: 'fas fa-highlighter', color: 'green', title: 'Highlighter', condition: allHighlights.length >= 1 },
            { id: 'scholar', icon: 'fas fa-pen-fancy', color: 'gold', title: 'Scholar', condition: allNotes >= 5 },
            { id: 'std-tester', icon: 'fas fa-crosshairs', color: 'blue', title: 'First Benchmark', condition: standardsTestedCount >= 1 },
            { id: 'std-master', icon: 'fas fa-award', color: 'gold', title: 'Standard Master', condition: standardsMasteredCount >= 3 },
            { id: 'streak-3', icon: 'fas fa-fire', color: 'gold', title: '3-Day Streak', condition: streakInfo.streak >= 3 },
            { id: 'streak-7', icon: 'fas fa-bolt', color: 'purple', title: '7-Day Habit', condition: streakInfo.streak >= 7 },
            { id: 'focus-master', icon: 'fas fa-stopwatch', color: 'green', title: 'Focus Master', condition: streakInfo.focusSessions >= 1 }
        ];

        badgesContainer.innerHTML = badges.map(b => `
            <div class="badge-item ${b.condition ? 'unlocked' : ''}">
                <div class="badge-icon ${b.color}"><i class="${b.icon}"></i></div>
                <div class="badge-title">${b.title}</div>
            </div>
        `).join('');
    }

    // 6. Standard Mastery Tracker Matrix Controller
    function initStandardsMasteryMatrix() {
        const grid = document.getElementById('standards-matrix-grid');
        const emptyState = document.getElementById('standards-empty-state');
        const statTested = document.getElementById('std-stat-tested');
        const statMastered = document.getElementById('std-stat-mastered');
        const statAvg = document.getElementById('std-stat-avg-score');
        const filterContainer = document.getElementById('standards-subject-filters');

        if (!grid || !emptyState) return;

        let masteryData = {};
        try {
            masteryData = JSON.parse(localStorage.getItem('hesten_standards_mastery')) || {};
        } catch(e){}

        const items = Object.values(masteryData);
        const totalTested = items.length;
        const totalMastered = items.filter(i => i.bestScore >= 80).length;
        const totalScoreSum = items.reduce((acc, i) => acc + (i.bestScore || 0), 0);
        const avgScore = totalTested > 0 ? Math.round(totalScoreSum / totalTested) : 0;

        if (statTested) statTested.textContent = totalTested;
        if (statMastered) statMastered.textContent = totalMastered;
        if (statAvg) statAvg.textContent = `${avgScore}%`;

        let activeSubject = 'All';

        const gradeLetterMap = {
            'Pre-K': 'a',
            'Kindergarten': 'b',
            'First Grade': 'c',
            'Second Grade': 'd',
            'Third Grade': 'e',
            'Fourth Grade': 'f',
            'Fifth Grade': 'g',
            'Sixth Grade': 'h',
            'Seventh Grade': 'i',
            'Eighth Grade': 'j',
            'Ninth Grade': 'k',
            'Tenth Grade': 'l',
            'Eleventh Grade': 'm',
            'Twelfth Grade': 'n'
        };

        function inferGradeLetter(code, gradeStr) {
            if (gradeStr && gradeLetterMap[gradeStr]) return gradeLetterMap[gradeStr];
            const c = (code || '').trim();
            if (/^K\./i.test(c) || /\bK\b/i.test(c)) return 'b';
            const m = c.match(/^(\d+)\./) || c.match(/[A-Z]+\.(\d+)\./i);
            if (m) {
                const num = parseInt(m[1], 10);
                const letters = ['b','c','d','e','f','g','h','i','j','k','l','m','n'];
                return letters[num] || 'e';
            }
            return 'e';
        }

        function renderMatrix() {
            const filtered = items.filter(item => {
                if (activeSubject === 'All') return true;
                return (item.subject || '').toLowerCase() === activeSubject.toLowerCase();
            });

            if (filtered.length === 0) {
                grid.innerHTML = '';
                emptyState.style.display = 'block';
                return;
            }

            emptyState.style.display = 'none';
            grid.innerHTML = filtered.map(item => {
                const score = item.bestScore || 0;
                let statusClass = 'review';
                let statusLabel = 'Needs Review';
                let barColor = 'var(--color-error, #ef4444)';

                if (score >= 80) {
                    statusClass = 'mastered';
                    statusLabel = 'Mastered';
                    barColor = 'var(--color-success, #10b981)';
                } else if (score >= 60) {
                    statusClass = 'developing';
                    statusLabel = 'Developing';
                    barColor = 'var(--color-warning, #f59e0b)';
                }

                const gradeLetter = inferGradeLetter(item.standard, item.grade);
                const lastDateStr = item.lastTested ? new Date(item.lastTested).toLocaleDateString(undefined, { month: 'short', day: 'numeric' }) : 'Recent';

                return `
                    <div class="std-matrix-card">
                        <div>
                            <div class="std-matrix-card-header">
                                <span class="std-matrix-badge">${item.standard}</span>
                                <span class="std-matrix-status ${statusClass}">${statusLabel}</span>
                            </div>
                            <div class="std-matrix-subject-label">
                                <i class="fas fa-tag mr-1" style="opacity: 0.7;"></i> ${item.subject} &bull; ${item.grade || 'Core Benchmark'}
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 0.8125rem; font-weight: 700; margin-top: 0.5rem;">
                                <span>Proficiency</span>
                                <span style="color: ${barColor};">${score}%</span>
                            </div>
                            <div class="std-matrix-bar-wrap">
                                <div class="std-matrix-bar-fill" style="width: ${score}%; background: ${barColor};"></div>
                            </div>
                        </div>

                        <div class="std-matrix-footer">
                            <span class="std-matrix-meta">
                                <i class="fas fa-history mr-1"></i> ${item.attempts || 1} attempt${(item.attempts || 1) === 1 ? '' : 's'} &bull; ${lastDateStr}
                            </span>
                            <div class="std-matrix-actions">
                                <a href="/levels/${gradeLetter}.php#standard=${encodeURIComponent(item.standard)}" class="std-matrix-btn std-matrix-btn-practice" title="Practice this standard">
                                    <i class="fas fa-book-open"></i> Practice
                                </a>
                                <a href="/assessment/#standard=${encodeURIComponent(item.standard)}" class="std-matrix-btn std-matrix-btn-test" title="Test this standard">
                                    <i class="fas fa-play"></i> Test
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Filter button click handlers
        if (filterContainer) {
            const pills = filterContainer.querySelectorAll('.std-filter-pill');
            pills.forEach(pill => {
                pill.addEventListener('click', () => {
                    pills.forEach(p => p.classList.remove('active'));
                    pill.classList.add('active');
                    activeSubject = pill.dataset.subject || 'All';
                    renderMatrix();
                });
            });
        }

        renderMatrix();
    }

    initStandardsMasteryMatrix();
});
