<?php
// FILE: parents.php
// DESCRIPTION: This PHP file serves as a resource hub (wiki) for parents.
// Pure Vanilla CSS architecture without TailwindCSS dependencies.

// --- Page-Specific Variables for Header ---
$pageTitle       = 'Parents Hub - Hesten\'s Learning';
$pageDescription = 'Parent resource hub. Find guides, tracking tools, and interactive homeschool law maps.';
$pageKeywords    = 'parents, wiki, resource, homeschool, learning support, laws';
$pageAuthor      = 'Hesten\'s Learning';

// --- Include Header Template ---
include '../src/header.php';
?>
<!-- Parents Hub Page Stylesheet -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/parents.css') ?>">

<!-- HERO SECTION -->
<div class="page-hero">
    <!-- Abstract Background Shapes -->
    <div class="page-hero-bg">
        <i class="fas fa-users page-hero-icon-bg-1"></i>
        <i class="fas fa-heart page-hero-icon-bg-2"></i>
    </div>

    <div class="parents-container" style="text-align: center;">
        <span class="page-hero-badge">
            Parent Resource Center
        </span>
        <h1 class="page-hero-title">
            Support Your Child's Learning Journey
        </h1>
        <p class="page-hero-subtitle">
            Everything you need to guide their education. From state laws to wellness tips, we've curated the best tools for you.
        </p>
    </div>
</div>

<div class="parents-container">
    <div class="parents-layout">

        <!-- LEFT SIDEBAR (Navigation) -->
        <aside class="parents-sidebar">

            <!-- Nav Menu -->
            <div class="glass-panel parents-nav-card">
                <nav aria-label="Quick Navigation">
                    <ul class="parents-nav-list">
                        <li class="parents-nav-item">
                            <a href="#resources" class="parents-nav-link nav-link-blue">
                                <span class="parents-nav-icon nav-icon-blue">
                                    <i class="fas fa-book-open"></i>
                                </span>
                                Resources
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#tools" class="parents-nav-link nav-link-purple">
                                <span class="parents-nav-icon nav-icon-purple">
                                    <i class="fas fa-toolbox"></i>
                                </span>
                                Tools
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#laws" class="parents-nav-link nav-link-teal">
                                <span class="parents-nav-icon nav-icon-teal">
                                    <i class="fas fa-map-marked-alt"></i>
                                </span>
                                State Laws
                            </a>
                        </li>
                        <li class="parents-nav-item">
                            <a href="#feedback" class="parents-nav-link nav-link-rose">
                                <span class="parents-nav-icon nav-icon-rose">
                                    <i class="fas fa-heart"></i>
                                </span>
                                Feedback
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Help Card -->
            <div class="parents-help-card">
                <div class="parents-help-glow"></div>
                <i class="fas fa-headset parents-help-icon"></i>
                <h3 class="parents-help-title">Need Support?</h3>
                <p class="parents-help-desc">Our education specialists are here to help you.</p>
                <a href="#contact" class="parents-help-btn">
                    Contact Us
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="parents-main-content">

            <!-- Resources Section -->
            <section id="resources" class="parents-section">
                <div class="parents-section-header">
                    <h2 class="parents-section-title">Curated Resources</h2>
                </div>

                <div class="parents-resources-grid">
                    <!-- Card 1 -->
                    <a href="https://example.com/parent-guide.pdf" target="_blank" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-red">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Parent Guide</h3>
                            <p class="parents-resource-desc">The complete handbook for our curriculum.</p>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-green">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Learning Hacks</h3>
                            <p class="parents-resource-desc">Smart strategies for home education.</p>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-amber">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Digital Safety</h3>
                            <p class="parents-resource-desc">Protecting your child in the digital age.</p>
                        </div>
                    </a>

                    <!-- Card 4 -->
                    <a href="#" class="glass-panel parents-resource-card hover-lift">
                        <div class="parents-resource-icon icon-pink">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="parents-resource-info">
                            <h3 class="parents-resource-title">Wellness</h3>
                            <p class="parents-resource-desc">Mental health resources for students.</p>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Tools Section (Bento Grid) -->
            <section id="tools" class="parents-section">
                <div class="parents-section-header">
                    <h2 class="parents-section-title">Essential Tools</h2>
                </div>

                <div class="parents-tools-grid">
                    <!-- Featured Tool: Progress & Competency Dashboard -->
                    <div class="parents-tool-featured">
                        <div class="parents-tool-glow"></div>
                        <div class="parents-tool-featured-content">
                            <span class="parents-tool-badge">
                                <i class="fas fa-star"></i> Student Portal
                            </span>
                            <h3 class="parents-tool-title-featured">Competency Reports</h3>
                            <p class="parents-tool-desc-featured">Track letter grades, daily quests, GPA, and print official report cards.</p>
                        </div>
                        <a href="/pages/profile.php" class="parents-tool-btn">
                            View Report Card <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Tool 2: 36-Week Pacing Guide -->
                    <a href="/pages/teachers.php#pacing" class="parents-tool-card hover-lift">
                        <div>
                            <div class="parents-tool-icon icon-purple">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h3 class="parents-tool-title">36-Week Pacing</h3>
                            <p class="parents-tool-desc">Structured quarter-by-quarter curriculum scope and print syllabus.</p>
                        </div>
                        <span class="parents-tool-action action-purple">
                            Open Pacing Guide <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>

                    <!-- Tool 3: Assignment Link Builder -->
                    <a href="/pages/teachers.php#builder" class="parents-tool-card hover-lift">
                        <div>
                            <div class="parents-tool-icon icon-teal">
                                <i class="fas fa-magic"></i>
                            </div>
                            <h3 class="parents-tool-title">Assignment Builder</h3>
                            <p class="parents-tool-desc">Generate targeted quiz URLs, 60s sprints, and Google Classroom links.</p>
                        </div>
                        <span class="parents-tool-action action-teal">
                            Build Assignment <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>

                    <!-- Tool 4: Printable Worksheets & Keys -->
                    <a href="/assessment/" class="parents-tool-card hover-lift">
                        <div>
                            <div class="parents-tool-icon icon-amber">
                                <i class="fas fa-print"></i>
                            </div>
                            <h3 class="parents-tool-title">Printable Worksheets</h3>
                            <p class="parents-tool-desc">Download paper test sheets with educator answer keys and explanations.</p>
                        </div>
                        <span class="parents-tool-action action-amber">
                            Generate Worksheets <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </section>

            <!-- Interactive Laws Map -->
            <section id="laws" class="parents-section">
                <div class="glass-panel parents-laws-outer-card">
                    <div class="parents-laws-inner-card">
                        <div class="parents-laws-header">
                            <div>
                                <h2 class="parents-section-title">
                                    <i class="fas fa-gavel text-teal"></i> Homeschool Laws
                                </h2>
                                <p class="parents-section-desc">Select a state to view HSLDA legal requirements.</p>
                            </div>

                            <!-- Modern Search Bar -->
                            <div class="parents-laws-search-box">
                                <input type="text" id="stateSearch" placeholder="Find state..." class="parents-laws-search-input">
                                <i class="fas fa-search parents-laws-search-icon"></i>
                            </div>
                        </div>

                        <!-- States Grid (Chips Style) -->
                        <div id="stateGrid" class="parents-state-grid no-scrollbar">
                            <!-- Populated by JS -->
                        </div>

                        <div id="no-states-msg" class="parents-no-states" style="display: none;">
                            <i class="fas fa-search-location"></i>
                            <p>No states found.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feedback -->
            <section id="feedback" class="parents-section">
                <div class="parents-feedback-card">
                    <div class="parents-feedback-glow"></div>

                    <div class="parents-feedback-grid">
                        <div class="parents-feedback-info">
                            <h2 class="parents-feedback-title">We're Listening</h2>
                            <p class="parents-feedback-desc">Your feedback shapes our platform. Let us know how we can make your homeschooling journey easier.</p>
                            <div class="parents-feedback-human-check">
                                <i class="fas fa-check-circle"></i>
                                <span>Read by real humans</span>
                            </div>
                        </div>

                        <form id="feedbackForm" action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56" method="POST" target="_blank" class="parents-feedback-form">
                            <input type="hidden" name="_next" value="https://hestena62.com/thanks.html">
                            <input type="text" name="honey_check" style="display:none">

                            <input type="email" id="email" name="email" required placeholder="Your Email" class="parents-form-input">

                            <textarea id="feedbackText" name="feedback" rows="3" placeholder="What's on your mind?" class="parents-form-textarea"></textarea>

                            <button type="submit" class="parents-form-submit-btn">
                                Send Feedback
                            </button>
                        </form>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- Direct Support Strip -->
<div id="contact" class="parents-contact-strip">
    <div class="parents-contact-container">
        <p class="parents-contact-label">Direct Support</p>
        <div class="parents-contact-links">
            <a href="mailto:admin@hestena62.com" class="parents-contact-link">
                <i class="fas fa-envelope"></i> admin@hestena62.com
            </a>
        </div>
    </div>
</div>

<!-- State Requirements Modal Dialog (Pure Vanilla CSS) -->
<div id="state-modal" class="parents-modal-wrapper" aria-labelledby="modal-state-name" role="dialog" aria-modal="true" style="display: none;">
    <div class="parents-modal-backdrop" id="modal-backdrop"></div>

    <div class="parents-modal-container">
        <div class="parents-modal-dialog" id="modal-panel">
            <div class="parents-modal-banner"></div>
            <button id="modal-close" class="parents-modal-close-btn" aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>

            <div class="parents-modal-body">
                <div class="parents-modal-icon-badge">
                    <i class="fas fa-landmark"></i>
                </div>

                <h3 class="parents-modal-title" id="modal-state-name">State Name</h3>
                <p class="parents-modal-subtitle">Legal Requirements Summary</p>

                <div class="parents-modal-summary-box">
                    <p id="modal-summary">Loading...</p>
                </div>

                <a id="modal-hslda-link" href="#" target="_blank" class="parents-modal-cta-btn">
                    View Official Requirements <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // --- Data ---
    const states = [{
        name: "Alabama",
        url: "https://hslda.org/legal/alabama"
    },
    {
        name: "Alaska",
        url: "https://hslda.org/legal/alaska"
    },
    {
        name: "Arizona",
        url: "https://hslda.org/legal/arizona"
    },
    {
        name: "Arkansas",
        url: "https://hslda.org/legal/arkansas"
    },
    {
        name: "California",
        url: "https://hslda.org/legal/california"
    },
    {
        name: "Colorado",
        url: "https://hslda.org/legal/colorado"
    },
    {
        name: "Connecticut",
        url: "https://hslda.org/legal/connecticut"
    },
    {
        name: "Delaware",
        url: "https://hslda.org/legal/delaware"
    },
    {
        name: "Florida",
        url: "https://hslda.org/legal/florida"
    },
    {
        name: "Georgia",
        url: "https://hslda.org/legal/georgia"
    },
    {
        name: "Hawaii",
        url: "https://hslda.org/legal/hawaii"
    },
    {
        name: "Idaho",
        url: "https://hslda.org/legal/idaho"
    },
    {
        name: "Illinois",
        url: "https://hslda.org/legal/illinois"
    },
    {
        name: "Indiana",
        url: "https://hslda.org/legal/indiana"
    },
    {
        name: "Iowa",
        url: "https://hslda.org/legal/iowa"
    },
    {
        name: "Kansas",
        url: "https://hslda.org/legal/kansas"
    },
    {
        name: "Kentucky",
        url: "https://hslda.org/legal/kentucky"
    },
    {
        name: "Louisiana",
        url: "https://hslda.org/legal/louisiana"
    },
    {
        name: "Maine",
        url: "https://hslda.org/legal/maine"
    },
    {
        name: "Maryland",
        url: "https://hslda.org/legal/maryland"
    },
    {
        name: "Massachusetts",
        url: "https://hslda.org/legal/massachusetts"
    },
    {
        name: "Michigan",
        url: "https://hslda.org/legal/michigan"
    },
    {
        name: "Minnesota",
        url: "https://hslda.org/legal/minnesota"
    },
    {
        name: "Mississippi",
        url: "https://hslda.org/legal/mississippi"
    },
    {
        name: "Missouri",
        url: "https://hslda.org/legal/missouri"
    },
    {
        name: "Montana",
        url: "https://hslda.org/legal/montana"
    },
    {
        name: "Nebraska",
        url: "https://hslda.org/legal/nebraska"
    },
    {
        name: "Nevada",
        url: "https://hslda.org/legal/nevada"
    },
    {
        name: "New Hampshire",
        url: "https://hslda.org/legal/new-hampshire"
    },
    {
        name: "New Jersey",
        url: "https://hslda.org/legal/new-jersey"
    },
    {
        name: "New Mexico",
        url: "https://hslda.org/legal/new-mexico"
    },
    {
        name: "New York",
        url: "https://hslda.org/legal/new-york"
    },
    {
        name: "North Carolina",
        url: "https://hslda.org/legal/north-carolina"
    },
    {
        name: "North Dakota",
        url: "https://hslda.org/legal/north-dakota"
    },
    {
        name: "Ohio",
        url: "https://hslda.org/legal/ohio"
    },
    {
        name: "Oklahoma",
        url: "https://hslda.org/legal/oklahoma"
    },
    {
        name: "Oregon",
        url: "https://hslda.org/legal/oregon"
    },
    {
        name: "Pennsylvania",
        url: "https://hslda.org/legal/pennsylvania"
    },
    {
        name: "Rhode Island",
        url: "https://hslda.org/legal/rhode-island"
    },
    {
        name: "South Carolina",
        url: "https://hslda.org/legal/south-carolina"
    },
    {
        name: "South Dakota",
        url: "https://hslda.org/legal/south-dakota"
    },
    {
        name: "Tennessee",
        url: "https://hslda.org/legal/tennessee"
    },
    {
        name: "Texas",
        url: "https://hslda.org/legal/texas"
    },
    {
        name: "Utah",
        url: "https://hslda.org/legal/utah"
    },
    {
        name: "Vermont",
        url: "https://hslda.org/legal/vermont"
    },
    {
        name: "Virginia",
        url: "https://hslda.org/legal/virginia"
    },
    {
        name: "Washington",
        url: "https://hslda.org/legal/washington"
    },
    {
        name: "West Virginia",
        url: "https://hslda.org/legal/west-virginia"
    },
    {
        name: "Wisconsin",
        url: "https://hslda.org/legal/wisconsin"
    },
    {
        name: "Wyoming",
        url: "https://hslda.org/legal/wyoming"
    }
    ];

    // --- State Grid Logic ---
    const grid = document.getElementById('stateGrid');
    const searchInput = document.getElementById('stateSearch');
    const noStatesMsg = document.getElementById('no-states-msg');

    function renderStates(filterText = '') {
        grid.innerHTML = '';
        let count = 0;
        const lowerFilter = filterText.toLowerCase();

        states.forEach(state => {
            if (state.name.toLowerCase().includes(lowerFilter)) {
                const btn = document.createElement('button');
                btn.className = 'state-chip-btn';
                btn.textContent = state.name;
                btn.onclick = () => openModal(state);
                grid.appendChild(btn);
                count++;
            }
        });

        if (count === 0) {
            noStatesMsg.style.display = 'block';
        } else {
            noStatesMsg.style.display = 'none';
        }
    }

    renderStates();
    searchInput.addEventListener('input', (e) => renderStates(e.target.value));

    // --- Modal Logic ---
    const modal = document.getElementById('state-modal');
    const backdrop = document.getElementById('modal-backdrop');
    const panel = document.getElementById('modal-panel');
    const modalClose = document.getElementById('modal-close');
    const modalName = document.getElementById('modal-state-name');
    const modalLink = document.getElementById('modal-hslda-link');
    const modalSummary = document.getElementById('modal-summary');

    function openModal(state) {
        modalName.textContent = state.name;
        modalLink.href = state.url;
        modalSummary.textContent = `Homeschooling in ${state.name} is regulated by state statute. Tap the button below to see the specific forms and Notice of Intent requirements.`;

        modal.style.display = 'flex';
        setTimeout(() => {
            backdrop.classList.add('is-active');
            panel.classList.add('is-active');
        }, 10);
    }

    function closeModal() {
        backdrop.classList.remove('is-active');
        panel.classList.remove('is-active');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 250);
    }

    modalClose.onclick = closeModal;
    backdrop.onclick = closeModal;
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display !== 'none') closeModal();
    });

    // --- Feedback ---
    document.getElementById('feedbackForm').addEventListener('submit', function (event) {
        const feedback = document.getElementById('feedbackText').value.trim();
        if (!feedback) {
            event.preventDefault();
            if (typeof showMessageBox === 'function') showMessageBox('Please enter your feedback.');
            else alert('Feedback cannot be empty.');
        }
    });
</script>

<?php include '../src/footer.php'; ?>
