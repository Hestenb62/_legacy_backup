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

        <!-- Skill Tree & Knowledge Mastery Hub Banner -->
        <div class="glass-panel" style="margin-bottom: 2rem; padding: 1.5rem 2rem; border-radius: var(--radius-2xl); border: 1px solid color-mix(in srgb, var(--color-primary) 30%, var(--color-border)); background: radial-gradient(circle at top right, color-mix(in srgb, var(--color-primary) 12%, var(--color-bg-surface)), var(--color-bg-surface)); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 1.25rem; max-width: 38rem;">
                <div style="width: 3.75rem; height: 3.75rem; border-radius: var(--radius-xl); background: linear-gradient(135deg, #f59e0b, #ec4899); color: white; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; box-shadow: 0 8px 16px rgba(245, 158, 11, 0.25); flex-shrink: 0;">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                        <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; padding: 0.2rem 0.5rem; border-radius: var(--radius-sm); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary);">Interactive Knowledge Graph</span>
                    </div>
                    <h2 style="margin: 0 0 0.25rem 0; font-size: 1.25rem; font-weight: 900; color: var(--color-text-main);">Skill &amp; Knowledge Tree</h2>
                    <p style="margin: 0; font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.4;">Explore interactive curriculum branches across Math, ELA, Science, and Social Studies with Bloom's Taxonomy mastery tiers.</p>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                <a href="/student/skill-tree.php" class="subpage-link-btn" style="padding: 0.75rem 1.5rem; border-radius: var(--radius-full); background: linear-gradient(135deg, var(--color-primary), #6366f1); color: white; border: none; font-weight: 800; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; box-shadow: var(--shadow-md);">
                    <span>Launch Skill Tree</span>
                    <i class="fas fa-arrow-right" style="font-size: 0.85rem;"></i>
                </a>
            </div>
        </div>

        <!-- Phase 3 Feature Hub: Interactive Labs & Adaptive Diagnostic -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Interactive Labs Card -->
            <div class="glass-panel" style="padding: 1.5rem; border-radius: var(--radius-2xl); border: 1px solid color-mix(in srgb, #3b82f6 30%, var(--color-border)); background: radial-gradient(circle at top left, color-mix(in srgb, #3b82f6 10%, var(--color-bg-surface)), var(--color-bg-surface)); display: flex; flex-direction: column; justify-content: space-between; gap: 1rem;">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; padding: 0.2rem 0.6rem; border-radius: var(--radius-sm); background: rgba(59, 130, 246, 0.15); color: #3b82f6;">Multi-Sensory Labs</span>
                        <i class="fas fa-flask" style="font-size: 1.5rem; color: #3b82f6;"></i>
                    </div>
                    <h3 style="margin: 0 0 0.35rem 0; font-size: 1.2rem; font-weight: 900; color: var(--color-text-main);">Interactive Virtual Manipulatives</h3>
                    <p style="margin: 0; font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.4;">Tactile fraction strips, phonics morpheme constructors, physics balance scales, and chronological history sorters.</p>
                </div>
                <a href="/student/interactive-labs.php" class="subpage-link-btn" style="padding: 0.65rem 1.25rem; border-radius: var(--radius-full); background: #3b82f6; color: white; border: none; font-weight: 800; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                    <span>Open Interactive Labs</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Adaptive Diagnostic Card -->
            <div class="glass-panel" style="padding: 1.5rem; border-radius: var(--radius-2xl); border: 1px solid color-mix(in srgb, #10b981 30%, var(--color-border)); background: radial-gradient(circle at top right, color-mix(in srgb, #10b981 10%, var(--color-bg-surface)), var(--color-bg-surface)); display: flex; flex-direction: column; justify-content: space-between; gap: 1rem;">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; padding: 0.2rem 0.6rem; border-radius: var(--radius-sm); background: rgba(16, 185, 129, 0.15); color: #10b981;">Adaptive Diagnostic</span>
                        <i class="fas fa-brain" style="font-size: 1.5rem; color: #10b981;"></i>
                    </div>
                    <h3 style="margin: 0 0 0.35rem 0; font-size: 1.2rem; font-weight: 900; color: var(--color-text-main);">Personalized Learning Prescription</h3>
                    <p style="margin: 0; font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.4;">Take an adaptive evaluation that diagnoses standard skill gaps and automatically generates a targeted remediation plan.</p>
                </div>
                <a href="/assessment/diagnostic.php" class="subpage-link-btn" style="padding: 0.65rem 1.25rem; border-radius: var(--radius-full); background: #10b981; color: white; border: none; font-weight: 800; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                    <span>Start Adaptive Diagnostic</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Continue Learning / Recent Activity -->
        <div id="continue-learning-container" class="continue-learning-section" style="display: none;">
            <h2 class="section-title">Continue Learning</h2>
            <div class="continue-learning-grid" id="continue-learning-grid">
                <!-- Populated by JS -->
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

        <!-- Short Stories & Poems Literary Showcase Section -->
        <section id="short-stories-poems" class="stories-poems-section" aria-labelledby="short-stories-poems-title">
            <div class="story-poem-header-wrap">
                <div class="story-poem-badge-row">
                    <span class="story-poem-pill-badge"><i class="fas fa-feather-alt"></i> Literary Anthology</span>
                    <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-text-muted);">&bull; Accessible &amp; Dyslexia-Friendly</span>
                </div>
                <h2 id="short-stories-poems-title" class="story-poem-section-title">
                    <span>Short Stories &amp; Poems</span>
                </h2>
                <p class="story-poem-section-desc">
                    Explore celebrated classic short stories, fables, and poetry across grade levels with audio read-aloud, dyslexia fonts, literary analysis breakdowns, and interactive reading checks.
                </p>
            </div>

            <!-- Filter Tabs & Real-Time Search -->
            <div class="story-poem-controls">
                <div class="story-poem-filter-tabs" role="tablist" aria-label="Filter literary works">
                    <button type="button" class="story-poem-filter-tab active" data-filter="all" role="tab" aria-selected="true">
                        <i class="fas fa-th-large"></i> All Works
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="story" role="tab" aria-selected="false">
                        <i class="fas fa-book-open"></i> Short Stories
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="poem" role="tab" aria-selected="false">
                        <i class="fas fa-feather-alt"></i> Poems &amp; Poetry
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="elem" role="tab" aria-selected="false">
                        <i class="fas fa-shapes"></i> Grades K–5
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="secondary" role="tab" aria-selected="false">
                        <i class="fas fa-graduation-cap"></i> Grades 6–12
                    </button>
                </div>

                <div class="story-poem-search-wrap">
                    <i class="fas fa-search story-poem-search-icon" aria-hidden="true"></i>
                    <input type="text" id="story-poem-search" class="story-poem-search-input" placeholder="Search by title, author, theme..." aria-label="Search short stories and poems">
                    <button type="button" id="story-poem-clear-search" class="story-poem-clear-btn" aria-label="Clear search">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Cards Grid -->
            <div id="story-poem-grid" class="story-poem-grid" aria-live="polite">
                <!-- Dynamically populated by student-stories-poems.js -->
            </div>
        </section>

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
                        <a href="#short-stories-poems" class="subpage-link-btn" style="grid-column: 1 / -1; background: color-mix(in srgb, var(--color-primary) 8%, var(--color-bg-base)); border-color: color-mix(in srgb, var(--color-primary) 30%, var(--color-border));">
                            <i class="fas fa-feather-alt" style="color: var(--color-primary);"></i>
                            <span>Short Stories &amp; Poems Anthology</span>
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

        <!-- Short Stories & Poems Daily Showcase & AI Studio Section -->
        <section id="short-stories-poems" class="stories-poems-section" aria-labelledby="stories-poems-title">
            <div class="story-poem-header-wrap">
                <div class="story-poem-badge-row">
                    <span class="story-poem-pill-badge"><i class="fas fa-feather-alt"></i> Daily Literature &amp; Poetry</span>
                    <span class="story-poem-pill-badge" style="background: rgba(16, 185, 129, 0.12); color: #059669; border-color: rgba(16, 185, 129, 0.25);"><i class="fas fa-graduation-cap"></i> Grades K–12</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <h2 id="stories-poems-title" class="story-poem-section-title">
                            Short Stories &amp; Poems Anthology
                        </h2>
                        <p class="story-poem-section-desc">
                            Explore curriculum-aligned classic literature and AI-generated original stories &amp; poems across all 13 grade levels (Kindergarten through Grade 12), rotating fresh every single day with built-in accessibility and comprehension tools.
                        </p>
                    </div>
                    <button type="button" class="ai-studio-btn" onclick="window.openAIStudioModal()">
                        <i class="fas fa-wand-magic-sparkles"></i>
                        <span>AI Story Studio</span>
                    </button>
                </div>
            </div>

            <!-- Daily Spotlight (Story of the Day & Poem of the Day) -->
            <div id="story-poem-spotlight"></div>

            <!-- Interactive Filters, Grade Dropdown, & Search Bar -->
            <div class="story-poem-controls">
                <div class="story-poem-filter-tabs" role="tablist" aria-label="Literature category filters">
                    <button type="button" class="story-poem-filter-tab active" data-filter="all" role="tab" aria-selected="true">
                        <i class="fas fa-layer-group"></i> All Works
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="story" role="tab" aria-selected="false">
                        <i class="fas fa-book-open"></i> Short Stories
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="poem" role="tab" aria-selected="false">
                        <i class="fas fa-feather-alt"></i> Poems
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="k-2" role="tab" aria-selected="false">
                        K–2
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="3-5" role="tab" aria-selected="false">
                        3–5
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="6-8" role="tab" aria-selected="false">
                        6–8
                    </button>
                    <button type="button" class="story-poem-filter-tab" data-filter="9-12" role="tab" aria-selected="false">
                        9–12
                    </button>
                </div>

                <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                    <div style="display: inline-flex; align-items: center; gap: 0.4rem;">
                        <label for="story-poem-grade-select" style="font-size: 0.8rem; font-weight: 700; color: var(--color-text-muted);"><i class="fas fa-filter"></i> Grade:</label>
                        <select id="story-poem-grade-select" class="story-poem-grade-select" aria-label="Filter by specific grade level">
                            <option value="all">All Grades (K–12)</option>
                            <option value="K">Kindergarten (K)</option>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </div>

                    <div class="story-poem-search-wrap">
                        <i class="fas fa-search story-poem-search-icon" aria-hidden="true"></i>
                        <input type="text" id="story-poem-search" class="story-poem-search-input" placeholder="Search by title, author, grade, or theme..." aria-label="Search stories and poems">
                        <button type="button" id="story-poem-clear-search" class="story-poem-clear-btn" aria-label="Clear search query" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dynamic Literature Cards Grid -->
            <div id="story-poem-grid" class="stories-poems-grid" role="region" aria-live="polite" aria-label="Stories and poems grid"></div>
        </section>
    </main>
</div>

<!-- Story & Poem Accessible Reader Modal -->
<div id="story-poem-modal" class="story-modal-overlay" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="modal-work-title" aria-hidden="true">
    <div class="story-modal-backdrop" onclick="closeStoryModal()"></div>
    <div class="story-modal-card">
        <!-- Modal Header -->
        <div class="story-modal-header">
            <div class="story-modal-meta">
                <div class="story-modal-pills">
                    <span id="modal-work-type-badge" class="story-type-badge"><i class="fas fa-book-open"></i> Literature</span>
                    <span id="modal-work-grade" class="story-grade-badge"><i class="fas fa-graduation-cap"></i> Grades</span>
                    <span id="modal-work-genre" class="story-card-tag">Genre</span>
                </div>
                <h3 id="modal-work-title" class="story-modal-title">Work Title</h3>
                <p id="modal-work-author" class="story-modal-author">by Author</p>
            </div>
            <button type="button" id="modal-story-close-btn" class="story-modal-close-icon" onclick="closeStoryModal()" aria-label="Close reading view">
                &times;
            </button>
        </div>

        <!-- Reading & Accessibility Toolbar -->
        <div class="story-modal-toolbar">
            <div class="story-toolbar-group">
                <button type="button" id="btn-tts-listen" class="story-toolbar-btn" onclick="toggleStoryTTS()" aria-label="Listen aloud with text to speech">
                    <i class="fas fa-volume-up"></i>
                    <span id="lbl-tts-listen">Listen Aloud</span>
                </button>
                <button type="button" id="btn-dyslexia-toggle" class="story-toolbar-btn" onclick="toggleDyslexicFont()" aria-pressed="false" aria-label="Toggle OpenDyslexic font">
                    <i class="fas fa-font"></i> Dyslexia Font
                </button>
            </div>

            <div class="story-toolbar-group">
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted);">Size:</span>
                <button type="button" class="story-toolbar-btn" onclick="adjustFontSize(-10)" aria-label="Decrease text size" style="padding: 0.25rem 0.55rem;">A-</button>
                <button type="button" class="story-toolbar-btn" onclick="adjustFontSize(10)" aria-label="Increase text size" style="padding: 0.25rem 0.55rem;">A+</button>
                
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted); margin-left: 0.25rem;">Tint:</span>
                <button type="button" class="story-toolbar-btn" onclick="setReadingTint('none')" title="Default white/dark background" aria-label="Reset background tint" style="padding: 0.25rem 0.5rem;"><i class="fas fa-ban"></i></button>
                <button type="button" class="story-toolbar-btn" onclick="setReadingTint('peach')" title="Peach tint" aria-label="Peach background tint" style="background: #fff3e0; color: #7c2d12; padding: 0.25rem 0.5rem;"><i class="fas fa-circle" style="color: #fb923c;"></i></button>
                <button type="button" class="story-toolbar-btn" onclick="setReadingTint('mint')" title="Mint tint" aria-label="Mint background tint" style="background: #e8f5e9; color: #14532d; padding: 0.25rem 0.5rem;"><i class="fas fa-circle" style="color: #34d399;"></i></button>
                <button type="button" class="story-toolbar-btn" onclick="setReadingTint('blue')" title="Blue tint" aria-label="Blue background tint" style="background: #e3f2fd; color: #1e3a8a; padding: 0.25rem 0.5rem;"><i class="fas fa-circle" style="color: #60a5fa;"></i></button>
            </div>

            <div class="story-toolbar-group">
                <button type="button" class="story-toolbar-btn" onclick="bookmarkActiveWork()" title="Save to bookmarks" aria-label="Save to bookmarks">
                    <i class="far fa-bookmark"></i> Bookmark
                </button>
                <button type="button" class="story-toolbar-btn" onclick="exportWorkToScratchpad()" title="Export outline to notes" aria-label="Export to Scratchpad">
                    <i class="far fa-sticky-note"></i> Notes
                </button>
            </div>
        </div>

        <!-- Tabs: Read / Literary Analysis / Quiz -->
        <div class="story-modal-tabs" role="tablist" aria-label="Modal content tabs">
            <button type="button" class="modal-tab-btn active" data-tab="read" onclick="switchModalTab('read')" role="tab" aria-selected="true">
                <i class="fas fa-book-reader"></i> Read Text
            </button>
            <button type="button" class="modal-tab-btn" data-tab="analysis" onclick="switchModalTab('analysis')" role="tab" aria-selected="false">
                <i class="fas fa-search"></i> Literary Analysis
            </button>
            <button type="button" class="modal-tab-btn" data-tab="quiz" onclick="switchModalTab('quiz')" role="tab" aria-selected="false">
                <i class="fas fa-question-circle"></i> Comprehension Check
            </button>
        </div>

        <!-- Modal Body Content -->
        <div class="story-modal-body">
            <!-- Panel 1: Read Text -->
            <div id="modal-panel-read" class="modal-tab-panel">
                <div id="modal-reader-text" class="modal-reader-text prose-layout"></div>
            </div>

            <!-- Panel 2: Literary Analysis -->
            <div id="modal-panel-analysis" class="modal-tab-panel" style="display: none;">
                <div class="analysis-card">
                    <h4 class="analysis-card-title"><i class="fas fa-lightbulb" style="color: #f59e0b;"></i> Central Theme &amp; Meaning</h4>
                    <p id="modal-analysis-theme" style="margin: 0; font-size: 0.95rem; color: var(--color-text-main); line-height: 1.6;"></p>
                </div>
                <div class="analysis-card">
                    <h4 class="analysis-card-title"><i class="fas fa-highlighter" style="color: #8b5cf6;"></i> Literary Devices &amp; Craft</h4>
                    <ul id="modal-analysis-devices" class="analysis-list"></ul>
                </div>
                <div class="analysis-card">
                    <h4 class="analysis-card-title"><i class="fas fa-spell-check" style="color: #10b981;"></i> Key Vocabulary in Context</h4>
                    <ul id="modal-analysis-vocab" class="analysis-list"></ul>
                </div>
            </div>

            <!-- Panel 3: Comprehension Check & XP -->
            <div id="modal-panel-quiz" class="modal-tab-panel" style="display: none;">
                <div style="margin-bottom: 1.25rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem;">
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem; font-weight: 800; color: var(--color-text-main);">Reading Check &amp; Understanding</h4>
                        <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--color-text-muted);">Answer both questions to verify your comprehension and review key concepts.</p>
                    </div>
                    <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.3rem 0.75rem; border-radius: var(--radius-full); background: rgba(16, 185, 129, 0.12); color: #059669; font-size: 0.85rem; font-weight: 800;">
                        <i class="fas fa-check-circle"></i> Comprehension Check
                    </span>
                </div>
                <div id="modal-quiz-container"></div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="story-modal-footer">
            <span class="modal-footer-info">
                <i class="fas fa-info-circle"></i> Press <kbd style="padding: 0.15rem 0.4rem; border-radius: 4px; border: 1px solid var(--color-border); font-size: 0.75rem;">Esc</kbd> anytime to close reader.
            </span>
            <button type="button" class="modal-footer-close-btn" onclick="closeStoryModal()">
                Close Reader
            </button>
        </div>
    </div>
</div>

<!-- AI Story Studio Modal Dialog -->
<div id="ai-story-studio-modal" class="ai-studio-modal-overlay" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="ai-studio-modal-title" aria-hidden="true">
    <div class="ai-studio-backdrop" onclick="closeAIStudioModal()"></div>
    <div class="ai-studio-card">
        <div class="ai-studio-header">
            <h3 id="ai-studio-modal-title" class="ai-studio-title">
                <i class="fas fa-wand-magic-sparkles" style="color: #8b5cf6;"></i>
                <span>AI Literature Studio</span>
            </h3>
            <button type="button" class="story-modal-close-icon" onclick="closeAIStudioModal()" aria-label="Close AI Story Studio">
                &times;
            </button>
        </div>
        <div class="ai-studio-body">
            <p style="margin: 0 0 0.5rem 0; font-size: 0.9rem; color: var(--color-text-muted); line-height: 1.5;">
                Generate original curriculum-aligned stories or poems for any grade level (Kindergarten through Grade 12) with full literary analysis and comprehension checks.
            </p>
            
            <div class="ai-form-group">
                <label for="ai-grade-select" class="ai-form-label"><i class="fas fa-graduation-cap"></i> Target Grade Level</label>
                <select id="ai-grade-select" class="ai-form-control">
                    <option value="K">Kindergarten (Level K)</option>
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                    <option value="4">Grade 4</option>
                    <option value="5" selected>Grade 5 (Intermediate)</option>
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8 (Middle School)</option>
                    <option value="9">Grade 9 (Freshman)</option>
                    <option value="10">Grade 10 (Sophomore)</option>
                    <option value="11">Grade 11 (Junior)</option>
                    <option value="12">Grade 12 (Senior / Advanced)</option>
                </select>
            </div>

            <div class="ai-form-group">
                <label for="ai-type-select" class="ai-form-label"><i class="fas fa-book-open"></i> Literary Form</label>
                <select id="ai-type-select" class="ai-form-control">
                    <option value="story">Short Story (Narrative Prose)</option>
                    <option value="poem">Poem (Verse &amp; Stanzas)</option>
                </select>
            </div>

            <div class="ai-form-group">
                <label for="ai-genre-select" class="ai-form-label"><i class="fas fa-palette"></i> Genre</label>
                <select id="ai-genre-select" class="ai-form-control">
                    <option value="Adventure">Adventure &amp; Exploration</option>
                    <option value="Science Fiction">Science Fiction &amp; Discovery</option>
                    <option value="Nature &amp; Wildlife">Nature &amp; Wildlife</option>
                    <option value="Historical Fiction">Historical Fiction &amp; Inquiry</option>
                    <option value="Mystery">Mystery &amp; Problem Solving</option>
                    <option value="Philosophical Reflection">Philosophical &amp; Lyrical</option>
                </select>
            </div>

            <div class="ai-form-group">
                <label for="ai-theme-select" class="ai-form-label"><i class="fas fa-lightbulb"></i> Core Theme</label>
                <select id="ai-theme-select" class="ai-form-control">
                    <option value="Courage &amp; Perseverance">Courage &amp; Perseverance</option>
                    <option value="Kindness &amp; Empathy">Kindness &amp; Empathy</option>
                    <option value="Curiosity &amp; Innovation">Curiosity &amp; Innovation</option>
                    <option value="Stewardship &amp; Ecology">Stewardship &amp; Ecology</option>
                    <option value="Integrity &amp; Truth">Integrity &amp; Truth</option>
                </select>
            </div>

            <div class="ai-form-group">
                <label for="ai-custom-prompt" class="ai-form-label"><i class="fas fa-pen-fancy"></i> Custom Title or Prompt (Optional)</label>
                <input type="text" id="ai-custom-prompt" class="ai-form-control" placeholder="e.g. The Clockwork Hummingbird of Whispering Hill">
            </div>
        </div>
        <div class="ai-studio-footer">
            <button type="button" class="btn" onclick="closeAIStudioModal()" style="padding: 0.55rem 1.25rem; border-radius: var(--radius-full); background: var(--color-bg-surface); border: 1px solid var(--color-border); color: var(--color-text-main); font-weight: 700; cursor: pointer;">
                Cancel
            </button>
            <button type="button" class="btn" onclick="generateCustomAIStory()" style="padding: 0.55rem 1.5rem; border-radius: var(--radius-full); background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; border: none; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);">
                <i class="fas fa-magic"></i>
                <span>Generate Literature</span>
            </button>
        </div>
    </div>
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


    } catch(e) {
        console.error('Error loading bookmarks:', e);
    }

    // Cross-tab and role synchronization listeners
    window.addEventListener('storage', (e) => {
        if (['hesten-user-profile', 'hesten_standards_mastery', 'hesten_learning_streak', 'library-bookmarks'].includes(e.key)) {
            // Re-sync dashboard widgets dynamically
            try {
                const streakData = JSON.parse(localStorage.getItem('hesten_learning_streak'));
                if (streakData && streakData.streak) {
                    const streakEl = document.getElementById('student-hero-streak');
                    if (streakEl) streakEl.textContent = streakData.streak;
                }
            } catch (err) {}
        }
    });

    window.addEventListener('hl:assessment-complete', () => {
        try {
            const streakData = JSON.parse(localStorage.getItem('hesten_learning_streak'));
            if (streakData && streakData.streak) {
                const streakEl = document.getElementById('student-hero-streak');
                if (streakEl) streakEl.textContent = streakData.streak;
            }
        } catch (err) {}
    });
});
</script>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/student-stories-poems.js') : '/assets/js/student-stories-poems.js' ?>"></script>

<?php
// Include the footer file
include '../src/footer.php';
?>
