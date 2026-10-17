<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Student Academic Hub - Hesten's Learning";
$pageDescription = "A comprehensive academic workspace for Mathematics, ELA, Science, and Social Studies.";
$pageAuthor = "Hesten's Learning Team";

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Welcome, Scholar!";
$welcomeParagraph = "Explore your academic learning paths, practice exercises, tutorials, and standard mastery checks.";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student.css">

<div class="wiki-container student-hub-container">
    <!-- Hero Section: Scholar Command Console -->
    <header class="student-hero" aria-label="Student Academic Hub Welcome Console">
        <div class="student-hero-inner">
            <div class="student-patron-badge">
                <div class="student-avatar-circle" id="student-hero-avatar" aria-hidden="true">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="student-patron-details">
                    <div class="student-title-row">
                        <h1 class="student-hero-title" id="dashboard-greeting">Student Academic Hub</h1>
                        <span class="student-grade-badge" id="student-hero-grade">K-12 Scholar</span>
                    </div>
                    <p class="student-hero-desc">Interactive curriculum gateways, practice tools, and diagnostic resources.</p>
                </div>
            </div>

            <div class="student-hero-stats-wrap">
                <div class="student-stat-pill" title="Minutes studied today" aria-label="Minutes studied today">
                    <i class="fas fa-stopwatch text-emerald-300" aria-hidden="true"></i>
                    <span><strong id="student-hero-mins">0</strong>m Studied Today</span>
                </div>
                <a href="/pages/profile.php" class="student-profile-link-btn" title="View Scholar Profile & Accommodations" aria-label="View Scholar Profile & Accommodations">
                    <i class="fas fa-id-card" aria-hidden="true"></i>
                    <span>Scholar Profile</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        <!-- Unified Academic Quick Bar -->
        <section class="student-quick-bar-section" aria-label="Academic Quick Portals">
            <div class="student-quick-grid">
                <!-- Digital Library Portal -->
                <a href="/library/index.php" class="student-quick-card student-quick-card--library">
                    <div class="quick-card-icon-wrap">
                        <i class="fas fa-book-open" aria-hidden="true"></i>
                    </div>
                    <div class="quick-card-info">
                        <div class="quick-card-badge">Digital Library</div>
                        <h2 class="quick-card-title">Curated Volumes</h2>
                        <p class="quick-card-desc">Classic literature, primary sources, and interactive readers.</p>
                    </div>
                    <div class="quick-card-arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- Adaptive Diagnostic Portal -->
                <a href="/assessment/diagnostic.php" class="student-quick-card student-quick-card--diagnostic">
                    <div class="quick-card-icon-wrap">
                        <i class="fas fa-brain" aria-hidden="true"></i>
                    </div>
                    <div class="quick-card-info">
                        <div class="quick-card-badge">Diagnostic</div>
                        <h2 class="quick-card-title">Skill Prescription</h2>
                        <p class="quick-card-desc">Personalized assessment diagnosing skill gaps &amp; recommendations.</p>
                    </div>
                    <div class="quick-card-arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- Standards Explorer Portal -->
                <a href="/pages/standards.php" class="student-quick-card student-quick-card--standards">
                    <div class="quick-card-icon-wrap">
                        <i class="fas fa-award" aria-hidden="true"></i>
                    </div>
                    <div class="quick-card-info">
                        <div class="quick-card-badge">Standards</div>
                        <h2 class="quick-card-title">State Standards</h2>
                        <p class="quick-card-desc">Track competency objectives, grade domains, and benchmarks.</p>
                    </div>
                    <div class="quick-card-arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- Learning Arcade Portal -->
                <a href="/pages/games.php" class="student-quick-card student-quick-card--arcade">
                    <div class="quick-card-icon-wrap">
                        <i class="fas fa-gamepad" aria-hidden="true"></i>
                    </div>
                    <div class="quick-card-info">
                        <div class="quick-card-badge">Arcade</div>
                        <h2 class="quick-card-title">Learning Games</h2>
                        <p class="quick-card-desc">Interactive curriculum games, math puzzles, and vocabulary quests.</p>
                    </div>
                    <div class="quick-card-arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </section>

        <!-- Jump Back In / Continue Learning Shelf -->
        <section id="continue-learning-container" class="continue-learning-section" style="display: none;" aria-label="Recent Learning Activity">
            <div class="section-header-row">
                <div class="section-title-wrap">
                    <i class="fas fa-bookmark section-title-icon" aria-hidden="true"></i>
                    <h2 class="section-title">Jump Back In</h2>
                </div>
                <span class="section-subtitle">Pick up right where you left off</span>
            </div>
            <div class="continue-learning-grid" id="continue-learning-grid">
                <!-- Populated dynamically by JS from bookmarks -->
            </div>
        </section>



        <!-- Standards Mastery Progress Widget -->
        <section id="student-standards-widget" class="student-standards-panel" style="display: none;" aria-label="Standard Mastery Progress">
            <div class="standards-panel-header">
                <div class="standards-panel-intro">
                    <div class="standards-panel-title-wrap">
                        <div class="standards-panel-icon" aria-hidden="true">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h2 class="standards-panel-title">Standard Mastery Progress</h2>
                    </div>
                    <p class="standards-panel-desc">
                        Competency badges earned from targeted standard checks, lesson exit tickets, and diagnostic assessments.
                    </p>
                </div>
                <div class="standards-panel-actions">
                    <a href="/pages/standards.php" class="standards-matrix-btn" aria-label="View Full Standards Matrix">
                        <span>Standards Explorer</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <!-- Dynamic Badges Grid -->
            <div id="student-standards-badge-list" class="standards-badge-grid" role="list">
                <!-- Populated dynamically by JS -->
            </div>
        </section>


        <!-- Core Subject Gateway Grid -->
        <section class="subject-gateway-section" aria-label="Core Academic Subjects">
            <div class="subject-gateway-grid">
                
                <!-- 1. Mathematics Section -->
                <article class="subject-card math-card">
                    <header class="subject-card-header math">
                        <div class="subject-header-icon-wrap" aria-hidden="true">
                            <i class="fas fa-calculator subject-header-icon"></i>
                        </div>
                        <div class="subject-header-info">
                            <div class="subject-card-badge">STEM Curriculum</div>
                            <h2 class="subject-card-title">Mathematics</h2>
                            <p class="subject-card-subtitle">Numbers, formulas, geometry, &amp; practices</p>
                        </div>
                    </header>
                    <div class="subject-card-body">
                        <div class="links-grid" role="list">
                            <a href="/student/math-practice.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                <span>Practice Problems</span>
                            </a>
                            <a href="/student/math-tutorials.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-video" aria-hidden="true"></i>
                                <span>Video Tutorials</span>
                            </a>
                            <a href="/student/math-study-guides.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
                                <span>Study Guides</span>
                            </a>
                            <a href="/student/math-games.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-gamepad" aria-hidden="true"></i>
                                <span>Math Games</span>
                            </a>
                        </div>
                        
                        <!-- Toggleable Drawer -->
                        <button type="button" class="drawer-toggle-btn" onclick="toggleDrawer('math-drawer', this)" aria-expanded="false" aria-controls="math-drawer">
                            <span>Study Tips &amp; External Links</span>
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        
                        <div id="math-drawer" class="drawer-content" role="region" aria-label="Mathematics Study Tips and External Links">
                            <div class="drawer-callout">
                                <h3 class="callout-title">Key Formulas &amp; Rules</h3>
                                <ul class="formula-list">
                                    <li><strong>PEMDAS:</strong> Parentheses, Exponents, Mult/Div, Add/Sub</li>
                                    <li><strong>Area of a Circle:</strong> $A = \pi r^2$</li>
                                    <li><strong>Pythagorean Theorem:</strong> $a^2 + b^2 = c^2$</li>
                                    <li><strong>Slope-Intercept Form:</strong> $y = mx + b$</li>
                                </ul>
                            </div>
                            <div class="drawer-links-wrap">
                                <h3 class="drawer-links-title">Recommended Sites</h3>
                                <ul class="external-links-list">
                                    <li><a href="https://www.khanacademy.org/math" target="_blank" rel="noopener noreferrer">Khan Academy</a> &mdash; Video lessons &amp; exercises</li>
                                    <li><a href="https://www.ixl.com/math" target="_blank" rel="noopener noreferrer">IXL Math</a> &mdash; Interactive K-12 practice</li>
                                    <li><a href="https://www.desmos.com/calculator" target="_blank" rel="noopener noreferrer">Desmos</a> &mdash; Graphing calculator</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 2. ELA Section -->
                <article class="subject-card ela-card">
                    <header class="subject-card-header ela">
                        <div class="subject-header-icon-wrap" aria-hidden="true">
                            <i class="fas fa-book-open subject-header-icon"></i>
                        </div>
                        <div class="subject-header-info">
                            <div class="subject-card-badge">Humanities &amp; Language</div>
                            <h2 class="subject-card-title">English Language Arts</h2>
                            <p class="subject-card-subtitle">Reading, writing, grammar, &amp; literature</p>
                        </div>
                    </header>
                    <div class="subject-card-body">
                        <div class="links-grid" role="list">
                            <a href="/student/ela-reading.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-book-reader" aria-hidden="true"></i>
                                <span>Reading Comprehension</span>
                            </a>
                            <a href="/student/ela-writing.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-pen-nib" aria-hidden="true"></i>
                                <span>Writing Prompts</span>
                            </a>
                            <a href="/student/ela-grammar.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-language" aria-hidden="true"></i>
                                <span>Grammar &amp; Vocab</span>
                            </a>
                            <a href="/student/ela-literature.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-highlighter" aria-hidden="true"></i>
                                <span>Literature Analysis</span>
                            </a>
                        </div>
                        
                        <!-- Toggleable Drawer -->
                        <button type="button" class="drawer-toggle-btn" onclick="toggleDrawer('ela-drawer', this)" aria-expanded="false" aria-controls="ela-drawer">
                            <span>Study Tips &amp; External Links</span>
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        
                        <div id="ela-drawer" class="drawer-content" role="region" aria-label="ELA Study Tips and External Links">
                            <div class="drawer-callout">
                                <h3 class="callout-title">Active Reading Tips</h3>
                                <ul class="tips-list">
                                    <li><strong>Annotate:</strong> Highlight key lines and write margins notes.</li>
                                    <li><strong>Summarize:</strong> Condense chapters into a single sentence.</li>
                                    <li><strong>Common Pitfalls:</strong> Watch out for homophones (their/there/they're).</li>
                                </ul>
                            </div>
                            <div class="drawer-links-wrap">
                                <h3 class="drawer-links-title">Recommended Sites</h3>
                                <ul class="external-links-list">
                                    <li><a href="https://www.newsela.com" target="_blank" rel="noopener noreferrer">Newsela</a> &mdash; Reading articles adapted by levels</li>
                                    <li><a href="https://owl.purdue.edu/owl/purdue_owl.html" target="_blank" rel="noopener noreferrer">Purdue OWL</a> &mdash; Structural writing guides</li>
                                    <li><a href="https://www.sparknotes.com/" target="_blank" rel="noopener noreferrer">SparkNotes</a> &mdash; Study guides for literature</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 3. Science Section -->
                <article class="subject-card science-card">
                    <header class="subject-card-header science">
                        <div class="subject-header-icon-wrap" aria-hidden="true">
                            <i class="fas fa-flask subject-header-icon"></i>
                        </div>
                        <div class="subject-header-info">
                            <div class="subject-card-badge">Scientific Inquiry</div>
                            <h2 class="subject-card-title">Science &amp; Engineering</h2>
                            <p class="subject-card-subtitle">Experiments, diagrams, news, &amp; quizzes</p>
                        </div>
                    </header>
                    <div class="subject-card-body">
                        <div class="links-grid" role="list">
                            <a href="/student/science-experiments.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-microscope" aria-hidden="true"></i>
                                <span>Virtual Experiments</span>
                            </a>
                            <a href="/student/science-articles.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-newspaper" aria-hidden="true"></i>
                                <span>Articles &amp; News</span>
                            </a>
                            <a href="/student/science-diagrams.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-project-diagram" aria-hidden="true"></i>
                                <span>Diagrams &amp; Models</span>
                            </a>
                            <a href="/student/science-quizzes.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-check-double" aria-hidden="true"></i>
                                <span>Science Quizzes</span>
                            </a>
                        </div>
                        
                        <!-- Toggleable Drawer -->
                        <button type="button" class="drawer-toggle-btn" onclick="toggleDrawer('science-drawer', this)" aria-expanded="false" aria-controls="science-drawer">
                            <span>Study Tips &amp; External Links</span>
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        
                        <div id="science-drawer" class="drawer-content" role="region" aria-label="Science Study Tips and External Links">
                            <div class="drawer-callout">
                                <h3 class="callout-title">Scientific Method</h3>
                                <p class="callout-body">Ask a Question &rarr; Form a Hypothesis &rarr; Design an Experiment &rarr; Observe &amp; Analyze Data &rarr; State a Conclusion.</p>
                            </div>
                            <div class="drawer-links-wrap">
                                <h3 class="drawer-links-title">Recommended Sites</h3>
                                <ul class="external-links-list">
                                    <li><a href="https://phet.colorado.edu/" target="_blank" rel="noopener noreferrer">PhET Simulations</a> &mdash; Free interactive biology/physics labs</li>
                                    <li><a href="https://www.nasa.gov/students" target="_blank" rel="noopener noreferrer">NASA for Students</a> &mdash; Earth &amp; space articles</li>
                                    <li><a href="https://ptable.com/" target="_blank" rel="noopener noreferrer">Ptable</a> &mdash; Interactive periodic table</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 4. Social Studies Section -->
                <article class="subject-card social-card">
                    <header class="subject-card-header social">
                        <div class="subject-header-icon-wrap" aria-hidden="true">
                            <i class="fas fa-globe-americas subject-header-icon"></i>
                        </div>
                        <div class="subject-header-info">
                            <div class="subject-card-badge">History &amp; Society</div>
                            <h2 class="subject-card-title">Social Studies &amp; Civics</h2>
                            <p class="subject-card-subtitle">Timelines, maps, civics, &amp; current events</p>
                        </div>
                    </header>
                    <div class="subject-card-body">
                        <div class="links-grid" role="list">
                            <a href="/student/social-history.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-hourglass-half" aria-hidden="true"></i>
                                <span>Historical Timelines</span>
                            </a>
                            <a href="/student/social-maps.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                                <span>Interactive Maps</span>
                            </a>
                            <a href="/student/social-civics.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-landmark" aria-hidden="true"></i>
                                <span>Civics &amp; Government</span>
                            </a>
                            <a href="/student/social-current-events.php" class="subpage-link-btn" role="listitem">
                                <i class="fas fa-globe" aria-hidden="true"></i>
                                <span>Current Events</span>
                            </a>
                        </div>
                        
                        <!-- Toggleable Drawer -->
                        <button type="button" class="drawer-toggle-btn" onclick="toggleDrawer('social-drawer', this)" aria-expanded="false" aria-controls="social-drawer">
                            <span>Study Tips &amp; External Links</span>
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        
                        <div id="social-drawer" class="drawer-content" role="region" aria-label="Social Studies Study Tips and External Links">
                            <div class="drawer-callout">
                                <h3 class="callout-title">Timeline Strategies</h3>
                                <ul class="tips-list">
                                    <li><strong>Cause &amp; Effect:</strong> Note why events led to future choices.</li>
                                    <li><strong>Branches of Gov:</strong> Executive (enforces), Legislative (makes), Judicial (interprets).</li>
                                </ul>
                            </div>
                            <div class="drawer-links-wrap">
                                <h3 class="drawer-links-title">Recommended Sites</h3>
                                <ul class="external-links-list">
                                    <li><a href="https://www.history.com/topics" target="_blank" rel="noopener noreferrer">History.com</a> &mdash; Historical text database</li>
                                    <li><a href="https://earth.google.com/" target="_blank" rel="noopener noreferrer">Google Earth</a> &mdash; Explore the globe in 3D</li>
                                    <li><a href="https://www.icivics.org/" target="_blank" rel="noopener noreferrer">iCivics</a> &mdash; Educational games about government</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </section>

    </main>
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
        
        // Trigger MathJax rendering if formulas exist inside the drawer
        if (window.ensureMathJax) {
            window.ensureMathJax(drawer);
        } else if (window.MathJax && window.MathJax.typesetPromise) {
            window.MathJax.typesetPromise([drawer]).catch(() => {});
        }

        // Dynamic scroll adjustment
        setTimeout(() => {
            drawer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 150);
    }
}

document.addEventListener('DOMContentLoaded', () => {

    // Dynamic Greeting & Scholar Profile
    function updateHeroScholarData() {
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
                const gradeEl = document.getElementById('student-hero-grade');
                if (gradeEl) {
                    gradeEl.textContent = profile.grade ? (profile.grade === 'K' ? 'Kindergarten' : `Grade ${profile.grade}`) : 'K-12 Scholar';
                }
                const avatarEl = document.getElementById('student-hero-avatar');
                if (avatarEl && profile.avatarData) {
                    avatarEl.innerHTML = `<img src="${profile.avatarData}" alt="" class="student-avatar-img">`;
                }
            }
        } catch (e) {
            console.error('Error loading user profile:', e);
        }

        // Populate study goals (minutes studied today)
        try {
            const todayStr = new Date().toISOString().slice(0, 10);
            const storedMins = JSON.parse(localStorage.getItem('hesten_today_study_minutes'));
            const minsEl = document.getElementById('student-hero-mins');
            if (minsEl) {
                if (storedMins && storedMins.date === todayStr) {
                    minsEl.textContent = storedMins.minutes || 0;
                } else {
                    minsEl.textContent = '0';
                }
            }
        } catch (e) {}
    }

    updateHeroScholarData();
    window.addEventListener('hl:profile-updated', updateHeroScholarData);
    window.addEventListener('hl:data-sync', updateHeroScholarData);

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
        const todayStr = new Date().toISOString().slice(0, 10);
        const storedMins = JSON.parse(localStorage.getItem('hesten_today_study_minutes'));
        if (storedMins && storedMins.date === todayStr) {
            const minsEl = document.getElementById('student-hero-mins');
            if (minsEl) minsEl.textContent = storedMins.minutes || 0;
        }

        // Populate Standards Mastery widget
        function populateStandardsMasteryWidget() {
            try {
                const mastery = JSON.parse(localStorage.getItem('hesten_standards_mastery')) || {};
                const items = Object.values(mastery);
                const widget = document.getElementById('student-standards-widget');
                const badgeList = document.getElementById('student-standards-badge-list');
                if (widget && badgeList) {
                    if (items.length > 0) {
                        badgeList.innerHTML = items.slice(0, 8).map(item => {
                            const rawCode = item.standard || item.code || 'Standard';
                            // Clean standard code: e.g. CCSS.MATH.CONTENT.HSF.IF.B.4 -> HSF.IF.B.4 or K.CC.1
                            const conciseCode = rawCode.replace(/^CCSS\.(MATH|ELA-LITERACY)\.CONTENT\./i, '');
                            const score = typeof item.bestScore === 'number' ? item.bestScore : (item.score || 0);
                            const isMastered = score >= 80;
                            const statusClass = isMastered ? 'is-mastered' : 'is-practicing';
                            const statusLabel = isMastered ? 'Mastered' : 'Practicing';
                            const stdName = item.name ? item.name.replace(/"/g, '&quot;') : conciseCode;

                            return `
                                <a href="/pages/standards.php?search=${encodeURIComponent(conciseCode)}" 
                                   class="standards-badge-item ${statusClass}" 
                                   role="listitem"
                                   title="${stdName} (${score}% - ${statusLabel})"
                                   aria-label="Standard ${conciseCode}, ${score}% mastery score, ${statusLabel}">
                                    <div class="badge-status-ring">
                                        <i class="fas ${isMastered ? 'fa-check' : 'fa-hourglass-half'}" aria-hidden="true"></i>
                                    </div>
                                    <div class="badge-content">
                                        <span class="badge-code">${conciseCode}</span>
                                        <span class="badge-score">${score}%</span>
                                    </div>
                                </a>
                            `;
                        }).join('');
                        widget.style.display = 'block';
                    } else {
                        widget.style.display = 'none';
                    }
                }
            } catch(e){
                console.error('Error populating standards mastery:', e);
            }
        }

        populateStandardsMasteryWidget();
        window.addEventListener('standards-mastery-updated', populateStandardsMasteryWidget);
        window.addEventListener('hl:data-sync', populateStandardsMasteryWidget);

    } catch(e) {
        console.error('Error loading bookmarks:', e);
    }

    // Cross-tab and role synchronization listeners
    window.addEventListener('storage', (e) => {
        if (!e.key || ['hesten-user-profile', 'hesten_standards_mastery', 'hesten_today_study_minutes', 'library-bookmarks'].includes(e.key)) {
            updateHeroScholarData();
            if (typeof populateStandardsMasteryWidget === 'function') {
                populateStandardsMasteryWidget();
            }
        }
    });

    window.addEventListener('hl:assessment-complete', () => {
        updateHeroScholarData();
        if (typeof populateStandardsMasteryWidget === 'function') {
            populateStandardsMasteryWidget();
        }
    });
});
</script>


<?php
// Include the footer file
include '../src/footer.php';
?>
