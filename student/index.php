<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Student Wiki - Hesten's Learning";
$pageDescription = "A wiki of resources for Math, ELA, Science, and Social Studies to support students with learning disabilities.";
$pageAuthor = "Hesten's Learning Team";

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Welcome, Student!";
$welcomeParagraph = "Welcome to the resource wiki! Select a subject below to explore interactive guides, practice problems, tutorials, and more.";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student.css">


<div class="wiki-container">
    <!-- Hero Section -->
    <div class="student-hero">
        <div class="hero-shapes">
            <i class="fas fa-user-graduate" style="top: 10%; left: 8%; font-size: 5rem;"></i>
            <i class="fas fa-book-open" style="bottom: 10%; right: 8%; font-size: 6rem;"></i>
        </div>
        <div class="relative">
            <h1 class="student-hero-title" id="dashboard-greeting">Student Resource Wiki</h1>
            <p class="student-hero-desc">Explore interactive guides, practice tools, and key study resources organized by subject.</p>
            <div class="student-streak-badge-wrap" style="display: inline-flex; align-items: center; gap: 0.75rem; margin-top: 1.25rem; padding: 0.45rem 1.25rem; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); border-radius: var(--radius-full); border: 1px solid rgba(255, 255, 255, 0.25); font-size: 0.95rem; font-weight: 700; color: white;">
                <span><i class="fas fa-fire" style="color: #f59e0b;"></i> <span id="student-hero-streak">1</span> Day Streak</span>
                <span style="opacity: 0.6;">&bull;</span>
                <span><i class="fas fa-bullseye" style="color: #38bdf8;"></i> <span id="student-hero-mins">0</span>m Studied Today</span>
                <span style="opacity: 0.6;">&bull;</span>
                <a href="/pages/profile.php" style="color: #f8fafc; text-decoration: underline; font-size: 0.85rem;">View Profile</a>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main>
        <!-- Reading Materials / Library Promotion Banner -->
        <div class="glass-panel documents-hub-banner">
            <div style="display: flex; align-items: center; gap: var(--spacing-4);">
                <div style="font-size: 2rem; color: var(--color-primary);"><i class="fas fa-book-open"></i></div>
                <div>
                    <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: var(--color-text-main);">Looking for Reading Materials?</h3>
                    <p style="margin: 0; font-size: 0.9rem; color: var(--color-text-muted);">Access the digital library to explore classic literature, primary historical sources, and textbooks with custom reading tools.</p>
                </div>
            </div>
            <a href="/library/index.php" class="subpage-link-btn" style="flex-shrink: 0; padding: 0.75rem 1.5rem; border-radius: var(--radius-full); background: var(--color-primary); color: white; border: none; font-weight: 800; font-size: 0.9rem; display: inline-flex; flex-direction: row; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                <span>Go to Digital Library</span>
                <i class="fas fa-arrow-right" style="color: white; font-size: 0.85rem;"></i>
            </a>
        </div>

        <!-- Continue Learning / Recent Activity -->
        <div id="continue-learning-container" class="continue-learning-section" style="display: none;">
            <h2 class="section-title">Continue Learning</h2>
            <div class="continue-learning-grid" id="continue-learning-grid">
                <!-- Populated by JS -->
            </div>
        </div>

        <!-- Daily Learning Quests Widget -->
        <div id="daily-quests-widget" class="daily-quests-panel glass-panel">
            <div class="quests-header">
                <div class="quests-title-wrap">
                    <span class="quests-badge"><i class="fas fa-calendar-day"></i> Daily Missions</span>
                    <h2 class="quests-title">Today's Learning Quests</h2>
                    <p class="quests-desc">Complete daily challenges to earn XP and level up your academic profile.</p>
                </div>
                <div class="quests-overall-progress">
                    <div class="quests-progress-text">
                        <span id="quests-completed-count">0/3</span> Completed
                    </div>
                    <div class="quests-progress-track">
                        <div id="quests-progress-fill" class="quests-progress-fill" style="width: 0%;"></div>
                    </div>
                    <span id="quests-xp-reward" class="quests-xp-reward"><i class="fas fa-bolt"></i> +175 XP Total</span>
                </div>
            </div>

            <div class="quests-list" id="quests-list">
                <!-- Quest 1: Lesson Explorer -->
                <div class="quest-card" id="quest-card-lesson">
                    <div class="quest-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="quest-info">
                        <div class="quest-name-row">
                            <span class="quest-name">Curriculum Lesson Explorer</span>
                            <span class="quest-xp">+50 XP</span>
                        </div>
                        <p class="quest-detail">Complete at least 1 interactive curriculum lesson or practice check.</p>
                        <div class="quest-mini-track">
                            <div id="quest-progress-lesson" class="quest-mini-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="quest-action">
                        <a href="/levels/k.php" class="quest-btn" id="quest-btn-lesson">Start Lesson</a>
                    </div>
                </div>

                <!-- Quest 2: Reading Time -->
                <div class="quest-card" id="quest-card-read">
                    <div class="quest-icon" style="color: #f97316; background: rgba(249, 115, 22, 0.1);"><i class="fas fa-book-reader"></i></div>
                    <div class="quest-info">
                        <div class="quest-name-row">
                            <span class="quest-name">Daily Reading Drill</span>
                            <span class="quest-xp">+50 XP</span>
                        </div>
                        <p class="quest-detail" id="quest-detail-read">Read literature in the Digital Library for 10+ active minutes.</p>
                        <div class="quest-mini-track">
                            <div id="quest-progress-read" class="quest-mini-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="quest-action">
                        <a href="/library/" class="quest-btn" id="quest-btn-read">Open Reader</a>
                    </div>
                </div>

                <!-- Quest 3: Assessment Mastery -->
                <div class="quest-card" id="quest-card-mastery">
                    <div class="quest-icon" style="color: #10b981; background: rgba(16, 185, 129, 0.1);"><i class="fas fa-award"></i></div>
                    <div class="quest-info">
                        <div class="quest-name-row">
                            <span class="quest-name">Standard Mastery Challenge</span>
                            <span class="quest-xp">+75 XP</span>
                        </div>
                        <p class="quest-detail" id="quest-detail-mastery">Score 80%+ on any targeted academic standard assessment.</p>
                        <div class="quest-mini-track">
                            <div id="quest-progress-mastery" class="quest-mini-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="quest-action">
                        <a href="/assessment/" class="quest-btn" id="quest-btn-mastery">Take Test</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Standards Mastery Progress Widget -->
        <div id="student-standards-widget" class="glass-panel" style="margin-bottom: 2.5rem; padding: 1.5rem; border-radius: var(--radius-xl); border: 1px solid var(--color-border); background: var(--color-bg-surface); display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <h3 style="margin: 0 0 0.25rem 0; font-size: 1.2rem; font-weight: 800; color: var(--color-text-main); display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-certificate" style="color: var(--color-primary);"></i> Standard Mastery Progress
                    </h3>
                    <p style="margin: 0; font-size: 0.85rem; color: var(--color-text-muted);">
                        Competency badges earned from targeted standard checks and diagnostic assessments.
                    </p>
                </div>
                <a href="/pages/profile.php" style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.85rem; font-weight: 700; color: var(--color-primary); text-decoration: none;">
                    <span>View Full Mastery Matrix</span> <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div id="student-standards-badge-list" style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center;">
                <!-- Populated by JS -->
            </div>
        </div>

        <div class="subject-gateway-grid">
            
            <!-- 1. Math Section -->
            <div class="subject-card math-card">
                <div class="subject-card-header math">
                    <i class="fas fa-calculator subject-header-icon"></i>
                    <div class="subject-header-info">
                        <h2 class="subject-card-title">Mathematics</h2>
                        <span class="subject-card-subtitle">Numbers, formulas, geometry, & practices</span>
                    </div>
                </div>
                <div class="subject-card-body">
                    <div class="links-grid">
                        <a href="/student/math-practice.php" class="subpage-link-btn">
                            <i class="fas fa-pencil-alt"></i>
                            <span>Practice Problems</span>
                        </a>
                        <a href="/student/math-tutorials.php" class="subpage-link-btn">
                            <i class="fas fa-video"></i>
                            <span>Video Tutorials</span>
                        </a>
                        <a href="/student/math-study-guides.php" class="subpage-link-btn">
                            <i class="fas fa-file-alt"></i>
                            <span>Study Guides</span>
                        </a>
                        <a href="/student/math-games.php" class="subpage-link-btn">
                            <i class="fas fa-gamepad"></i>
                            <span>Math Games</span>
                        </a>
                    </div>
                    
                    <!-- Toggleable Drawer -->
                    <button class="drawer-toggle-btn" onclick="toggleDrawer('math-drawer', this)" aria-expanded="false" aria-controls="math-drawer">
                        <span>Study Tips & External Links</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    
                    <div id="math-drawer" class="drawer-content">
                        <div class="drawer-callout">
                            <h4 class="callout-title">Key Formulas & Rules</h4>
                            <ul class="formula-list">
                                <li><strong>PEMDAS:</strong> Parentheses, Exponents, Mult/Div, Add/Sub</li>
                                <li><strong>Area of a Circle:</strong> $A = \pi r^2$</li>
                                <li><strong>Pythagorean Theorem:</strong> $a^2 + b^2 = c^2$</li>
                                <li><strong>Slope-Intercept Form:</strong> $y = mx + b$</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="drawer-links-title">Recommended Sites</h4>
                            <ul class="external-links-list">
                                <li><a href="https://www.khanacademy.org/math" target="_blank" rel="noopener noreferrer">Khan Academy</a> â€” Video lessons & exercises</li>
                                <li><a href="https://www.ixl.com/math" target="_blank" rel="noopener noreferrer">IXL Math</a> â€” Interactive K-12 practice</li>
                                <li><a href="https://www.desmos.com/calculator" target="_blank" rel="noopener noreferrer">Desmos</a> â€” Beautiful graphing calculator</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. ELA Section -->
            <div class="subject-card ela-card">
                <div class="subject-card-header ela">
                    <i class="fas fa-book-open subject-header-icon"></i>
                    <div class="subject-header-info">
                        <h2 class="subject-card-title">English Language Arts</h2>
                        <span class="subject-card-subtitle">Reading, writing, grammar, & literature</span>
                    </div>
                </div>
                <div class="subject-card-body">
                    <div class="links-grid">
                        <a href="/student/ela-reading.php" class="subpage-link-btn">
                            <i class="fas fa-book-reader"></i>
                            <span>Reading Comprehension</span>
                        </a>
                        <a href="/student/ela-writing.php" class="subpage-link-btn">
                            <i class="fas fa-pen-nib"></i>
                            <span>Writing Prompts</span>
                        </a>
                        <a href="/student/ela-grammar.php" class="subpage-link-btn">
                            <i class="fas fa-language"></i>
                            <span>Grammar & Vocab</span>
                        </a>
                        <a href="/student/ela-literature.php" class="subpage-link-btn">
                            <i class="fas fa-highlighter"></i>
                            <span>Literature Analysis</span>
                        </a>
                    </div>
                    
                    <!-- Toggleable Drawer -->
                    <button class="drawer-toggle-btn" onclick="toggleDrawer('ela-drawer', this)" aria-expanded="false" aria-controls="ela-drawer">
                        <span>Study Tips & External Links</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    
                    <div id="ela-drawer" class="drawer-content">
                        <div class="drawer-callout">
                            <h4 class="callout-title">Active Reading Tips</h4>
                            <ul class="tips-list">
                                <li><strong>Annotate:</strong> Highlight key lines and write margins notes.</li>
                                <li><strong>Summarize:</strong> Condense chapters into a single sentence.</li>
                                <li><strong>Common Pitfalls:</strong> Watch out for Homophones (their/there/they're).</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="drawer-links-title">Recommended Sites</h4>
                            <ul class="external-links-list">
                                <li><a href="https://www.newsela.com" target="_blank" rel="noopener noreferrer">Newsela</a> â€” Reading articles adapted by levels</li>
                                <li><a href="https://owl.purdue.edu/owl/purdue_owl.html" target="_blank" rel="noopener noreferrer">Purdue OWL</a> â€” Structural writing guides</li>
                                <li><a href="https://www.sparknotes.com/" target="_blank" rel="noopener noreferrer">SparkNotes</a> â€” Study guides for popular books</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Science Section -->
            <div class="subject-card science-card">
                <div class="subject-card-header science">
                    <i class="fas fa-flask subject-header-icon"></i>
                    <div class="subject-header-info">
                        <h2 class="subject-card-title">Science</h2>
                        <span class="subject-card-subtitle">Experiments, diagrams, news, & quizzes</span>
                    </div>
                </div>
                <div class="subject-card-body">
                    <div class="links-grid">
                        <a href="/student/science-experiments.php" class="subpage-link-btn">
                            <i class="fas fa-microscope"></i>
                            <span>Virtual Experiments</span>
                        </a>
                        <a href="/student/science-articles.php" class="subpage-link-btn">
                            <i class="fas fa-newspaper"></i>
                            <span>Articles & News</span>
                        </a>
                        <a href="/student/science-diagrams.php" class="subpage-link-btn">
                            <i class="fas fa-project-diagram"></i>
                            <span>Diagrams & Models</span>
                        </a>
                        <a href="/student/science-quizzes.php" class="subpage-link-btn">
                            <i class="fas fa-check-double"></i>
                            <span>Science Quizzes</span>
                        </a>
                    </div>
                    
                    <!-- Toggleable Drawer -->
                    <button class="drawer-toggle-btn" onclick="toggleDrawer('science-drawer', this)" aria-expanded="false" aria-controls="science-drawer">
                        <span>Study Tips & External Links</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    
                    <div id="science-drawer" class="drawer-content">
                        <div class="drawer-callout">
                            <h4 class="callout-title">Scientific Method</h4>
                            <p class="callout-body">Ask a Question &rarr; Form a Hypothesis &rarr; Design an Experiment &rarr; Observe & Analyze Data &rarr; State a Conclusion.</p>
                        </div>
                        <div>
                            <h4 class="drawer-links-title">Recommended Sites</h4>
                            <ul class="external-links-list">
                                <li><a href="https://phet.colorado.edu/" target="_blank" rel="noopener noreferrer">PhET Simulations</a> â€” Free interactive biology/physics labs</li>
                                <li><a href="https://www.nasa.gov/students" target="_blank" rel="noopener noreferrer">NASA for Students</a> â€” Earth & space articles</li>
                                <li><a href="https://ptable.com/" target="_blank" rel="noopener noreferrer">Ptable</a> â€” Interactive periodic table of elements</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Social Studies Section -->
            <div class="subject-card social-card">
                <div class="subject-card-header social">
                    <i class="fas fa-globe-americas subject-header-icon"></i>
                    <div class="subject-header-info">
                        <h2 class="subject-card-title">Social Studies</h2>
                        <span class="subject-card-subtitle">Timelines, maps, civics, & current events</span>
                    </div>
                </div>
                <div class="subject-card-body">
                    <div class="links-grid">
                        <a href="/student/social-history.php" class="subpage-link-btn">
                            <i class="fas fa-hourglass-half"></i>
                            <span>Historical Timelines</span>
                        </a>
                        <a href="/student/social-maps.php" class="subpage-link-btn">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>Interactive Maps</span>
                        </a>
                        <a href="/student/social-civics.php" class="subpage-link-btn">
                            <i class="fas fa-landmark"></i>
                            <span>Civics & Government</span>
                        </a>
                        <a href="/student/social-current-events.php" class="subpage-link-btn">
                            <i class="fas fa-globe"></i>
                            <span>Current Events</span>
                        </a>
                    </div>
                    
                    <!-- Toggleable Drawer -->
                    <button class="drawer-toggle-btn" onclick="toggleDrawer('social-drawer', this)" aria-expanded="false" aria-controls="social-drawer">
                        <span>Study Tips & External Links</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    
                    <div id="social-drawer" class="drawer-content">
                        <div class="drawer-callout">
                            <h4 class="callout-title">Timeline Strategies</h4>
                            <ul class="tips-list">
                                <li><strong>Cause & Effect:</strong> Note why events led to future choices.</li>
                                <li><strong>Branches of Gov:</strong> Executive (enforces), Legislative (makes), Judicial (interprets).</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="drawer-links-title">Recommended Sites</h4>
                            <ul class="external-links-list">
                                <li><a href="https://www.history.com/topics" target="_blank" rel="noopener noreferrer">History.com</a> â€” Historical text database</li>
                                <li><a href="https://earth.google.com/" target="_blank" rel="noopener noreferrer">Google Earth</a> â€” Explore the globe in 3D</li>
                                <li><a href="https://www.icivics.org/" target="_blank" rel="noopener noreferrer">iCivics</a> â€” Educational games about government</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

<!-- Admin Notice Popup Banner -->
<div id="admin-notice-banner" class="admin-notice-banner" style="display: none;" role="alert">
    <div class="banner-icon-container">
        <i class="fas fa-tools"></i>
    </div>
    <div class="banner-body">
        <h4 class="banner-title">Under Construction</h4>
        <p class="banner-text">The site admin is working on expanding the page; there will be errors and more resources will be added.</p>
    </div>
    <button class="banner-close-btn" onclick="dismissAdminNotice()" aria-label="Close announcement">
        <i class="fas fa-times"></i>
    </button>
</div>

<script>
function toggleDrawer(drawerId, btn) {
    const drawer = document.getElementById(drawerId);
    if (!drawer) return;
    
    const isExpanded = btn.getAttribute('aria-expanded') === 'true';
    
    // Toggle active classes
    if (isExpanded) {
        drawer.classList.remove('active');
        btn.classList.remove('active');
        btn.setAttribute('aria-expanded', 'false');
    } else {
        drawer.classList.add('active');
        btn.classList.add('active');
        btn.setAttribute('aria-expanded', 'true');
        
        // Dynamic scroll adjustment
        setTimeout(() => {
            drawer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 150);
    }
}

function dismissAdminNotice() {
    const banner = document.getElementById('admin-notice-banner');
    if (banner) {
        banner.classList.add('hiding');
        setTimeout(() => {
            banner.style.display = 'none';
            localStorage.setItem('admin_notice_dismissed', 'true');
        }, 300);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('admin_notice_dismissed') !== 'true') {
        const banner = document.getElementById('admin-notice-banner');
        if (banner) {
            banner.style.display = 'flex';
        }
    }

    // Dynamic Greeting
    try {
        const savedProfile = localStorage.getItem('hesten-user-profile');
        if (savedProfile) {
            const profile = JSON.parse(savedProfile);
            if (profile.firstName) {
                const greetingEl = document.getElementById('dashboard-greeting');
                if (greetingEl) {
                    greetingEl.textContent = `Welcome back, ${profile.firstName}!`;
                }
            }
        }
    } catch (e) {
        console.error('Error loading user profile:', e);
    }

    // Populate Continue Learning
    try {
        const bookmarks = JSON.parse(localStorage.getItem('library-bookmarks')) || [];
        if (bookmarks.length > 0) {
            const container = document.getElementById('continue-learning-container');
            const grid = document.getElementById('continue-learning-grid');
            
            // Show up to 3 recent bookmarks
            const recentBookmarks = bookmarks.slice(-3).reverse();
            
            let html = '';
            recentBookmarks.forEach(id => {
                const title = id.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
                html += `
                    <a href="/library/read/index.php?book=${encodeURIComponent(id)}" class="continue-card">
                        <div class="continue-icon"><i class="fas fa-book-reader"></i></div>
                        <div class="continue-info">
                            <h4>${title}</h4>
                            <p>Pick up where you left off</p>
                        </div>
                    </a>
                `;
            });
            
            if (grid && container) {
                grid.innerHTML = html;
                container.style.display = 'block';
            }
        }

        // Populate streak & study goals
        const streakData = JSON.parse(localStorage.getItem('hesten_learning_streak'));
        if (streakData && streakData.streak) {
            const streakEl = document.getElementById('student-hero-streak');
            if (streakEl) streakEl.textContent = streakData.streak;
        }
        const todayStr = new Date().toISOString().slice(0, 10);
        const storedMins = JSON.parse(localStorage.getItem('hesten_today_study_minutes'));
        if (storedMins && storedMins.date === todayStr) {
            const minsEl = document.getElementById('student-hero-mins');
            if (minsEl) minsEl.textContent = storedMins.minutes || 0;
        }

        // Populate Standards Mastery widget
        try {
            const mastery = JSON.parse(localStorage.getItem('hesten_standards_mastery')) || {};
            const items = Object.values(mastery);
            const widget = document.getElementById('student-standards-widget');
            const badgeList = document.getElementById('student-standards-badge-list');
            if (widget && badgeList && items.length > 0) {
                badgeList.innerHTML = items.slice(0, 6).map(item => {
                    const isMastered = item.bestScore >= 80;
                    const bg = isMastered ? 'color-mix(in srgb, var(--color-success, #10b981) 15%, transparent)' : 'color-mix(in srgb, var(--color-warning, #f59e0b) 15%, transparent)';
                    const color = isMastered ? 'var(--color-success, #10b981)' : 'var(--color-warning, #f59e0b)';
                    const icon = isMastered ? 'fa-award' : 'fa-hourglass-half';
                    return `
                        <a href="/assessment/#standard=${encodeURIComponent(item.standard)}" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.45rem 0.85rem; border-radius: var(--radius-full); background: ${bg}; border: 1px solid ${color}; color: var(--color-text-main); font-size: 0.8125rem; font-weight: 700; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                            <i class="fas ${icon}" style="color: ${color};"></i>
                            <span style="font-family: monospace; font-weight: 800;">${item.standard}</span>
                            <span style="color: ${color}; font-size: 0.75rem;">(${item.bestScore}%)</span>
                        </a>
                    `;
                }).join('');
                widget.style.display = 'block';
            }
        } catch(e){}

        // Populate and evaluate Daily Learning Quests
        try {
            let completedCount = 0;

            // Quest 1: Check lesson completion in localStorage
            let hasCompletedLesson = false;
            for (let i = 0; i < localStorage.length; i++) {
                const k = localStorage.key(i);
                if (k && k.startsWith('hl_progress_')) {
                    try {
                        const arr = JSON.parse(localStorage.getItem(k));
                        if (Array.isArray(arr) && arr.length > 0) {
                            hasCompletedLesson = true;
                            break;
                        }
                    } catch(err){}
                }
            }
            const qLessonCard = document.getElementById('quest-card-lesson');
            const qLessonBar = document.getElementById('quest-progress-lesson');
            const qLessonBtn = document.getElementById('quest-btn-lesson');
            if (hasCompletedLesson) {
                completedCount++;
                if (qLessonCard) qLessonCard.classList.add('completed');
                if (qLessonBar) qLessonBar.style.width = '100%';
                if (qLessonBtn) qLessonBtn.innerHTML = '<i class="fas fa-check"></i> Completed';
            }

            // Quest 2: Check reading tracker
            let readMinutes = 0;
            try {
                const rawTracker = localStorage.getItem('hesten_reading_tracker');
                if (rawTracker) {
                    const parsed = JSON.parse(rawTracker);
                    readMinutes = parsed.todayMinutes || 0;
                }
            } catch(err){}
            const qReadCard = document.getElementById('quest-card-read');
            const qReadBar = document.getElementById('quest-progress-read');
            const qReadBtn = document.getElementById('quest-btn-read');
            const qReadDetail = document.getElementById('quest-detail-read');
            const readPct = Math.min(100, Math.round((readMinutes / 10) * 100));
            if (qReadBar) qReadBar.style.width = `${readPct}%`;
            if (qReadDetail) qReadDetail.textContent = `Progress: ${readMinutes}/10 minutes read in library today.`;
            if (readMinutes >= 10) {
                completedCount++;
                if (qReadCard) qReadCard.classList.add('completed');
                if (qReadBtn) qReadBtn.innerHTML = '<i class="fas fa-check"></i> Completed';
            }

            // Quest 3: Check standard mastery >= 80%
            let hasMasteredStandard = false;
            try {
                const rawMastery = localStorage.getItem('hesten_standards_mastery');
                if (rawMastery) {
                    const parsed = JSON.parse(rawMastery);
                    hasMasteredStandard = Object.values(parsed).some(item => (item.bestScore || 0) >= 80);
                }
            } catch(err){}
            const qMasteryCard = document.getElementById('quest-card-mastery');
            const qMasteryBar = document.getElementById('quest-progress-mastery');
            const qMasteryBtn = document.getElementById('quest-btn-mastery');
            if (hasMasteredStandard) {
                completedCount++;
                if (qMasteryCard) qMasteryCard.classList.add('completed');
                if (qMasteryBar) qMasteryBar.style.width = '100%';
                if (qMasteryBtn) qMasteryBtn.innerHTML = '<i class="fas fa-check"></i> Completed';
            }

            // Overall Quests progress
            const countEl = document.getElementById('quests-completed-count');
            const fillEl = document.getElementById('quests-progress-fill');
            const xpRewardEl = document.getElementById('quests-xp-reward');
            if (countEl) countEl.textContent = `${completedCount}/3`;
            if (fillEl) fillEl.style.width = `${Math.round((completedCount / 3) * 100)}%`;
            if (completedCount === 3 && xpRewardEl) {
                xpRewardEl.innerHTML = '<i class="fas fa-check-circle" style="color: #10b981;"></i> All Quests Complete! (+175 XP)';
            }
        } catch(e) {
            console.warn('Error evaluating daily quests:', e);
        }
    } catch(e) {
        console.error('Error loading bookmarks:', e);
    }
});
</script>

<?php
// Include the footer file
include '../src/footer.php';
?>
