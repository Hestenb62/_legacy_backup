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
<style>
/* Page Layout */
.wiki-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: var(--spacing-4) var(--spacing-4) var(--spacing-16) var(--spacing-4);
}

/* Hero Section override for Vanilla CSS */
.student-hero {
    position: relative;
    background: linear-gradient(135deg, #4f46e5, #ec4899);
    color: white;
    padding: var(--spacing-16) var(--spacing-6);
    border-radius: var(--radius-2xl);
    text-align: center;
    overflow: hidden;
    margin-bottom: var(--spacing-12);
    box-shadow: var(--shadow-lg);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.hero-shapes i {
    position: absolute;
    opacity: 0.08;
    pointer-events: none;
}

.student-hero-title {
    font-size: 2.75rem;
    font-weight: 800;
    margin-bottom: var(--spacing-2);
    letter-spacing: -0.025em;
    color: white;
}

.student-hero-desc {
    font-size: 1.125rem;
    color: rgba(255, 255, 255, 0.9);
    max-width: 600px;
    margin: 0 auto;
    font-weight: 400;
}

/* Documents Hub Banner */
.documents-hub-banner {
    margin-bottom: var(--spacing-8);
    padding: var(--spacing-6);
    border-radius: var(--radius-2xl);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: var(--spacing-4);
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), rgba(236, 72, 153, 0.05));
    border: 1px solid var(--color-border);
}

@media (min-width: 640px) {
    .documents-hub-banner {
        flex-direction: row;
    }
}

/* Gateway Grid Layout */
.subject-gateway-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: var(--spacing-8);
}

@media (min-width: 768px) {
    .subject-gateway-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Subject Card */
.subject-card {
    background-color: var(--color-bg-surface);
    border-radius: var(--radius-2xl);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease;
}

.subject-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

/* Gradient Headers */
.subject-card-header {
    padding: var(--spacing-6);
    color: white;
    display: flex;
    align-items: center;
    gap: var(--spacing-4);
    position: relative;
}

.subject-card-header::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.15), transparent);
    pointer-events: none;
}

.subject-card-header.math { background: linear-gradient(135deg, #6366f1, #4f46e5); }
.subject-card-header.ela { background: linear-gradient(135deg, #10b981, #059669); }
.subject-card-header.science { background: linear-gradient(135deg, #ef4444, #dc2626); }
.subject-card-header.social { background: linear-gradient(135deg, #f59e0b, #d97706); }

.subject-header-icon {
    font-size: 2.25rem;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.15));
}

.subject-header-info {
    display: flex;
    flex-direction: column;
}

.subject-card-title {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
    color: white;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.subject-card-subtitle {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.85);
    margin: 0;
}

/* Subject Body Content */
.subject-card-body {
    padding: var(--spacing-6);
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: var(--spacing-6);
}

/* Sub-page Links Grid */
.links-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: var(--spacing-3);
}

.subpage-link-btn {
    padding: var(--spacing-4) var(--spacing-3);
    background-color: var(--color-bg-base);
    color: var(--color-text-main);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-2);
    text-align: center;
    transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
}

.subpage-link-btn i {
    font-size: 1.25rem;
    color: var(--color-primary);
    transition: transform 0.2s ease;
}

/* Custom icon colors per subject */
.subject-card.math-card .subpage-link-btn i { color: #4f46e5; }
.subject-card.ela-card .subpage-link-btn i { color: #059669; }
.subject-card.science-card .subpage-link-btn i { color: #dc2626; }
.subject-card.social-card .subpage-link-btn i { color: #d97706; }

.subpage-link-btn:hover {
    background-color: var(--color-bg-surface);
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.subject-card.math-card .subpage-link-btn:hover { border-color: #4f46e5; color: #4f46e5; }
.subject-card.ela-card .subpage-link-btn:hover { border-color: #059669; color: #059669; }
.subject-card.science-card .subpage-link-btn:hover { border-color: #dc2626; color: #dc2626; }
.subject-card.social-card .subpage-link-btn:hover { border-color: #d97706; color: #d97706; }

.subpage-link-btn:hover i {
    transform: scale(1.1);
}

/* Accordion Drawer Toggle */
.drawer-toggle-btn {
    width: 100%;
    padding: 0.625rem;
    font-size: 0.85rem;
    font-weight: 700;
    border-radius: var(--radius-full);
    border: 1px solid var(--color-border);
    color: var(--color-text-muted);
    background-color: var(--color-bg-base);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
    margin-top: auto;
}

.drawer-toggle-btn:hover {
    background-color: var(--color-border);
    color: var(--color-text-main);
}

.drawer-toggle-btn i {
    transition: transform 0.25s ease;
}

.drawer-toggle-btn.active i {
    transform: rotate(180deg);
}

/* Expandable Drawer */
.drawer-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    opacity: 0;
    display: flex;
    flex-direction: column;
    gap: var(--spacing-4);
}

.drawer-content.active {
    max-height: 500px; /* Big enough to contain content */
    opacity: 1;
    overflow-y: auto;
}

/* Callout Blocks inside Drawer */
.drawer-callout {
    background-color: var(--color-bg-base);
    border-left: 3px solid var(--color-primary);
    padding: var(--spacing-3) var(--spacing-4);
    border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
}

.subject-card.math-card .drawer-callout { border-color: #4f46e5; }
.subject-card.ela-card .drawer-callout { border-color: #059669; }
.subject-card.science-card .drawer-callout { border-color: #dc2626; }
.subject-card.social-card .drawer-callout { border-color: #d97706; }

.callout-title {
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-text-muted);
    margin-bottom: 0.25rem;
}

.callout-body {
    font-size: 0.9rem;
    color: var(--color-text-main);
    line-height: 1.5;
    margin: 0;
}

.formula-list, .tips-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.formula-list li, .tips-list li {
    font-size: 0.85rem;
    line-height: 1.4;
}

/* Drawer Links */
.drawer-links-title {
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-text-muted);
    margin: 0 0 0.5rem 0;
}

.external-links-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.35rem;
}

.external-links-list li {
    font-size: 0.875rem;
    line-height: 1.4;
}

.external-links-list a {
    color: var(--color-primary);
    text-decoration: underline;
    font-weight: 600;
    transition: opacity 0.2s;
}

.external-links-list a:hover {
    opacity: 0.8;
}

.subject-card.math-card .external-links-list a { color: #4f46e5; }
.subject-card.ela-card .external-links-list a { color: #059669; }
.subject-card.science-card .external-links-list a { color: #dc2626; }
.subject-card.social-card .external-links-list a { color: #d97706; }

/* Admin Notice Banner */
.admin-notice-banner {
    position: fixed;
    bottom: var(--spacing-6);
    right: var(--spacing-6);
    z-index: 1000;
    max-width: 400px;
    background: var(--color-bg-elevated);
    border: 1px solid var(--color-border);
    border-left: 5px solid var(--color-warning, #f59e0b);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    padding: var(--spacing-4);
    display: flex;
    gap: var(--spacing-4);
    align-items: flex-start;
    animation: banner-slide-in 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    transition: all 0.3s ease;
}

.admin-notice-banner.hiding {
    animation: banner-slide-out 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes banner-slide-in {
    from {
        transform: translateY(100px) scale(0.9);
        opacity: 0;
    }
    to {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
}

@keyframes banner-slide-out {
    from {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
    to {
        transform: translateY(100px) scale(0.9);
        opacity: 0;
    }
}

.banner-icon-container {
    background-color: rgba(245, 158, 11, 0.1);
    color: var(--color-warning, #f59e0b);
    padding: var(--spacing-2);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.banner-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: var(--spacing-1);
}

.banner-title {
    font-size: 0.95rem;
    font-weight: 700;
    margin: 0;
    color: var(--color-text-main);
}

.banner-text {
    font-size: 0.85rem;
    color: var(--color-text-muted);
    line-height: 1.4;
    margin: 0;
}

.banner-close-btn {
    color: var(--color-text-muted);
    cursor: pointer;
    font-size: 0.875rem;
    transition: color 0.2s ease;
    padding: 0.25rem;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
}

.banner-close-btn:hover {
    color: var(--color-text-main);
    background-color: var(--color-border);
}

/* Adjust layout on small screens */
@media (max-width: 640px) {
    .admin-notice-banner {
        left: var(--spacing-4);
        right: var(--spacing-4);
        bottom: var(--spacing-4);
        max-width: none;
    }
}
</style>

<div class="wiki-container">
    <!-- Hero Section -->
    <div class="student-hero">
        <div class="hero-shapes">
            <i class="fas fa-user-graduate" style="top: 10%; left: 8%; font-size: 5rem;"></i>
            <i class="fas fa-book-open" style="bottom: 10%; right: 8%; font-size: 6rem;"></i>
        </div>
        <div class="relative">
            <h1 class="student-hero-title">Student Resource Wiki</h1>
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
                                <li><a href="https://www.khanacademy.org/math" target="_blank" rel="noopener noreferrer">Khan Academy</a> — Video lessons & exercises</li>
                                <li><a href="https://www.ixl.com/math" target="_blank" rel="noopener noreferrer">IXL Math</a> — Interactive K-12 practice</li>
                                <li><a href="https://www.desmos.com/calculator" target="_blank" rel="noopener noreferrer">Desmos</a> — Beautiful graphing calculator</li>
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
                                <li><a href="https://www.newsela.com" target="_blank" rel="noopener noreferrer">Newsela</a> — Reading articles adapted by levels</li>
                                <li><a href="https://owl.purdue.edu/owl/purdue_owl.html" target="_blank" rel="noopener noreferrer">Purdue OWL</a> — Structural writing guides</li>
                                <li><a href="https://www.sparknotes.com/" target="_blank" rel="noopener noreferrer">SparkNotes</a> — Study guides for popular books</li>
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
                                <li><a href="https://phet.colorado.edu/" target="_blank" rel="noopener noreferrer">PhET Simulations</a> — Free interactive biology/physics labs</li>
                                <li><a href="https://www.nasa.gov/students" target="_blank" rel="noopener noreferrer">NASA for Students</a> — Earth & space articles</li>
                                <li><a href="https://ptable.com/" target="_blank" rel="noopener noreferrer">Ptable</a> — Interactive periodic table of elements</li>
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
                                <li><a href="https://www.history.com/topics" target="_blank" rel="noopener noreferrer">History.com</a> — Historical text database</li>
                                <li><a href="https://earth.google.com/" target="_blank" rel="noopener noreferrer">Google Earth</a> — Explore the globe in 3D</li>
                                <li><a href="https://www.icivics.org/" target="_blank" rel="noopener noreferrer">iCivics</a> — Educational games about government</li>
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
});
</script>

<?php
// Include the footer file
include '../src/footer.php';
?>