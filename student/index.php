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
        </div>
    </div>

    <!-- Main Content Area -->
    <main>
        <!-- Documents Hub Promotion Banner -->
        <div class="glass-panel documents-hub-banner">
            <div style="display: flex; align-items: center; gap: var(--spacing-4);">
                <div style="font-size: 2rem; color: var(--color-primary);"><i class="fas fa-folder-open"></i></div>
                <div>
                    <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: var(--color-text-main);">Looking for Reading Materials?</h3>
                    <p style="margin: 0; font-size: 0.9rem; color: var(--color-text-muted);">Access the central Documents Hub to search, filter, and read all student documents, PDFs, and guides in one place.</p>
                </div>
            </div>
            <a href="/documents.php" class="subpage-link-btn" style="flex-shrink: 0; padding: 0.75rem 1.5rem; border-radius: var(--radius-full); background: var(--color-primary); color: white; border: none; font-weight: 800; font-size: 0.9rem; display: inline-flex; flex-direction: row; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                <span>Go to Documents Hub</span>
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
    } catch(e) {
        console.error('Error loading bookmarks:', e);
    }
});
</script>

<?php
// Include the footer file
include '../src/footer.php';
?>
