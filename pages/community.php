<?php
// --- Page Configuration ---
$pageTitle       = "Community Hub & Resources Repository | Hesten's Learning";
$pageDescription = "Connect with homeschool networks, educator co-ops, neurodiversity advocacy groups, and share community feedback to shape the future of Hesten's Learning.";
$pageKeywords    = "community, homeschool groups, educator resources, neurodiversity advocacy, parent co-ops, education feedback, learning circles";
$pageAuthor      = "Hesten's Learning";

// --- Anti-Spam & Feedback Form Processing (Server Fallback) ---
$feedbackSubmitted = false;
$feedbackError     = "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Honeypot spam check
    if (!empty($_POST['community_bot_check'])) {
        die(); // Stop execution silently for bots
    }

    $fbName     = htmlspecialchars(trim($_POST['feedback_name'] ?? ''));
    $fbRole     = htmlspecialchars(trim($_POST['feedback_role'] ?? 'Community Member'));
    $fbCategory = htmlspecialchars(trim($_POST['feedback_category'] ?? 'General'));
    $fbEmail    = filter_var(trim($_POST['feedback_email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $fbMessage  = htmlspecialchars(trim($_POST['feedback_message'] ?? ''));

    if (empty($fbMessage)) {
        $feedbackError = "Please enter your suggestion or feedback before submitting.";
    } else {
        $feedbackSubmitted = true;
    }
}

include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/community.css">

<!-- Breadcrumb Navigation -->
<nav class="breadcrumb-container" aria-label="Breadcrumb" style="max-width: 1200px; margin: 1rem auto 0 auto; padding: 0 1.5rem;">
    <ol class="breadcrumb-list" style="display: flex; gap: 0.5rem; list-style: none; padding: 0; margin: 0; font-size: 0.875rem; color: #64748b; flex-wrap: wrap;">
        <li class="breadcrumb-item"><a href="/" style="color: #4f46e5; text-decoration: none;"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item" aria-hidden="true" style="color: #94a3b8;">/</li>
        <li class="breadcrumb-item"><a href="/library/index.php" style="color: #4f46e5; text-decoration: none;">Resources</a></li>
        <li class="breadcrumb-item" aria-hidden="true" style="color: #94a3b8;">/</li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #1e293b; font-weight: 700;">Community Hub</li>
    </ol>
</nav>

<!-- Hero Section -->
<header class="community-hero">
    <div class="community-hero-bg">
        <i class="fas fa-users-cog community-hero-icon-1" aria-hidden="true"></i>
        <i class="fas fa-hands-helping community-hero-icon-2" aria-hidden="true"></i>
        <div class="community-hero-glow"></div>
    </div>

    <div class="community-hero-content">
        <span class="community-hero-badge">
            <i class="fas fa-globe-americas"></i> Open Learning Ecosystem
        </span>
        <h1 class="community-hero-title">
            Community Resources &amp; Feedback Hub
        </h1>
        <p class="community-hero-subtitle">
            A collaborative repository connecting homeschool families, co-ops, classroom educators, and neurodiversity advocates. Discover shared community networks and directly guide our open platform roadmap.
        </p>

        <!-- Search & Action Strip -->
        <div class="community-search-strip">
            <div class="community-search-box">
                <i class="fas fa-search community-search-icon" aria-hidden="true"></i>
                <input type="text" id="community-search-input" class="community-search-input" 
                       placeholder="Search community groups, co-ops, advocacy, or teaching exchanges..." 
                       aria-label="Search community resources repository">
                <button type="button" id="btn-clear-search" class="community-search-clear" aria-label="Clear search query" style="display: none;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="community-quick-actions">
                <a href="#community-feedback" class="community-hero-btn btn-hero-primary">
                    <i class="fas fa-comment-dots"></i> Give Feedback
                </a>
                <a href="#resources-repo" class="community-hero-btn btn-hero-secondary">
                    <i class="fas fa-book-reader"></i> Explore Directory
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Main Container -->
<main class="community-container" id="main-content">

    <!-- Feedback Submission Alert (PHP or JS) -->
    <?php if ($feedbackSubmitted): ?>
        <div class="community-alert alert-success" role="alert" style="margin-bottom: 2rem;">
            <i class="fas fa-check-circle alert-icon"></i>
            <div>
                <h4 style="margin: 0; font-weight: 800; font-size: 1rem;">Thank you for your feedback!</h4>
                <p style="margin: 0.25rem 0 0 0; font-size: 0.875rem;">Your insight has been received and logged into our product backlog. Together we are building a better learning experience for all.</p>
            </div>
        </div>
    <?php elseif (!empty($feedbackError)): ?>
        <div class="community-alert alert-danger" role="alert" style="margin-bottom: 2rem;">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <div>
                <h4 style="margin: 0; font-weight: 800; font-size: 1rem;">Submission Error</h4>
                <p style="margin: 0.25rem 0 0 0; font-size: 0.875rem;"><?= htmlspecialchars($feedbackError) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <div id="js-feedback-alert" class="community-alert alert-success" style="display: none; margin-bottom: 2rem;" role="alert" aria-live="polite"></div>

    <!-- Section 1: Community Category Filter Navigation -->
    <section id="resources-repo" class="community-section" aria-labelledby="repo-heading">
        <div class="section-header-row">
            <div>
                <span class="section-tag"><i class="fas fa-network-wired"></i> Curated Directory</span>
                <h2 id="repo-heading" class="section-title">Community Resources Repository</h2>
                <p class="section-desc">Hand-picked networks, educator collaboratives, homeschool co-ops, and advocacy coalitions supporting self-directed and inclusive education.</p>
            </div>
            <div class="repo-results-count" id="repo-results-count" aria-live="polite">
                Showing all 13 community resources
            </div>
        </div>

        <!-- Filter Pills Bar -->
        <div class="community-filter-pills" role="tablist" aria-label="Filter resources by community category">
            <button type="button" class="filter-pill active" data-category="all" role="tab" aria-selected="true">
                <i class="fas fa-th-large"></i> All Resources (<span class="pill-count" id="count-all">13</span>)
            </button>
            <button type="button" class="filter-pill" data-category="homeschool" role="tab" aria-selected="false">
                <i class="fas fa-home"></i> Homeschool &amp; Co-ops (<span class="pill-count" id="count-homeschool">3</span>)
            </button>
            <button type="button" class="filter-pill" data-category="teachers" role="tab" aria-selected="false">
                <i class="fas fa-chalkboard-teacher"></i> Educator Exchanges (<span class="pill-count" id="count-teachers">3</span>)
            </button>
            <button type="button" class="filter-pill" data-category="neurodiversity" role="tab" aria-selected="false">
                <i class="fas fa-universal-access"></i> Special Ed &amp; Neurodiversity (<span class="pill-count" id="count-neurodiversity">4</span>)
            </button>
            <button type="button" class="filter-pill" data-category="steam" role="tab" aria-selected="false">
                <i class="fas fa-atom"></i> STEAM &amp; Learning Circles (<span class="pill-count" id="count-steam">3</span>)
            </button>
        </div>

        <!-- Directory Grid -->
        <div class="community-grid" id="community-directory-grid">

            <!-- Card 1: Homeschool Co-op Directory -->
            <article class="community-card" data-category="homeschool" data-keywords="homeschool co-ops groups local meetups curriculum swaps state organizations">
                <div class="card-header">
                    <div class="card-icon-box icon-purple">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="card-badge badge-purple">Homeschool &amp; Co-ops</span>
                </div>
                <h3 class="card-title">Secular Homeschool Community &amp; Co-op Exchange</h3>
                <p class="card-desc">
                    An open nationwide directory connecting families for co-op learning pods, curriculum swaps, local park days, and non-sectarian academic collaborations.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Co-ops</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Field Trips</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Inclusive</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.thehomeschoolmom.com/homeschooling-support-groups/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit Homeschool Support Groups Directory (opens in new tab)">
                        Explore Directory <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 2: HSLDA & State Laws Resource -->
            <article class="community-card" data-category="homeschool" data-keywords="hslda homeschool legal rights state laws regulation compliance portfolio review">
                <div class="card-header">
                    <div class="card-icon-box icon-indigo">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <span class="card-badge badge-indigo">Homeschool &amp; Co-ops</span>
                </div>
                <h3 class="card-title">Homeschool Legal Rights &amp; State Regulations Guide</h3>
                <p class="card-desc">
                    Comprehensive statutory breakdown of compulsory attendance, notice of intent requirements, testing mandates, and portfolio review rules across all 50 states.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> State Laws</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Portfolios</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Compliance</span>
                </div>
                <div class="card-footer">
                    <a href="https://hslda.org/legal" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Explore State Homeschool Laws (opens in new tab)">
                        Review State Laws <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 3: Free Homeschool Deals & Curriculum Swaps -->
            <article class="community-card" data-category="homeschool" data-keywords="free curriculum printables swap library books open textbooks zero cost">
                <div class="card-header">
                    <div class="card-icon-box icon-emerald">
                        <i class="fas fa-gift"></i>
                    </div>
                    <span class="card-badge badge-emerald">Homeschool &amp; Co-ops</span>
                </div>
                <h3 class="card-title">Open Curriculum Swaps &amp; Community Printables</h3>
                <p class="card-desc">
                    Free community repository where homeschool coaches share public domain unit studies, printable morning basket journals, and literacy workbooks.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Free Printables</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Book Swaps</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Unit Studies</span>
                </div>
                <div class="card-footer">
                    <a href="/pages/parents.php#resources" class="card-action-btn" aria-label="Browse Parent Hub Curated Resources">
                        Parent Handouts <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Card 4: OER Commons Educator Network -->
            <article class="community-card" data-category="teachers" data-keywords="oer commons open educational resources lesson plans teacher collaboration rubrics">
                <div class="card-header">
                    <div class="card-icon-box icon-blue">
                        <i class="fas fa-globe"></i>
                    </div>
                    <span class="card-badge badge-blue">Educator Exchanges</span>
                </div>
                <h3 class="card-title">OER Commons Open Educational Network</h3>
                <p class="card-desc">
                    A global public digital library of open educational resources. Educators explore, create, and adapt CCSS-aligned curriculum units, rubrics, and assessments.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> OER</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> CCSS Units</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Open Source</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.oercommons.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit OER Commons (opens in new tab)">
                        Open Library <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 5: Teacher Collaboration & MTSS / Tier-2 Grouping -->
            <article class="community-card" data-category="teachers" data-keywords="mtss rti intervention small group diagnostic pacing differentiated instruction">
                <div class="card-header">
                    <div class="card-icon-box icon-teal">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <span class="card-badge badge-teal">Educator Exchanges</span>
                </div>
                <h3 class="card-title">MTSS &amp; Differentiated Intervention Exchange</h3>
                <p class="card-desc">
                    Pedagogical resource sharing multi-tiered systems of support (MTSS / RTI), diagnostic rubric matrices, and targeted small-group intervention lesson templates.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> MTSS / RTI</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Remediation</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Rubrics</span>
                </div>
                <div class="card-footer">
                    <a href="/pages/teachers.php#roster" class="card-action-btn" aria-label="Open Teacher Roster and Diagnostic Dossier">
                        Educator Suite <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Card 6: Share My Lesson Collaborative -->
            <article class="community-card" data-category="teachers" data-keywords="aft share my lesson classroom educators activities printables science lab">
                <div class="card-header">
                    <div class="card-icon-box icon-sky">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <span class="card-badge badge-sky">Educator Exchanges</span>
                </div>
                <h3 class="card-title">Share My Lesson Peer Teaching Collaborative</h3>
                <p class="card-desc">
                    Community-driven lesson sharing platform founded by educators. Features over 400,000 peer-reviewed lesson plans, graphic organizers, and classroom activities.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Peer Reviewed</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Activities</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Worksheets</span>
                </div>
                <div class="card-footer">
                    <a href="https://sharemylesson.com/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit Share My Lesson (opens in new tab)">
                        Explore Lessons <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 7: Understood.org Learning Differences -->
            <article class="community-card" data-category="neurodiversity" data-keywords="understood org adhd dyslexia executive function 504 iep accommodations">
                <div class="card-header">
                    <div class="card-icon-box icon-rose">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="card-badge badge-rose">Special Ed &amp; Neurodiversity</span>
                </div>
                <h3 class="card-title">Understood.org for Learning &amp; Thinking Differences</h3>
                <p class="card-desc">
                    Leading non-profit supporting individuals with ADHD, dyslexia, and processing differences with free IEP guides, 504 accommodation matrices, and simulation labs.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> ADHD</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Dyslexia</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> IEP / 504</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.understood.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit Understood.org (opens in new tab)">
                        Visit Understood <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 8: International Dyslexia Association -->
            <article class="community-card" data-category="neurodiversity" data-keywords="dyslexia structured literacy orton gillingham decodable phonics reading science">
                <div class="card-header">
                    <div class="card-icon-box icon-amber">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <span class="card-badge badge-amber">Special Ed &amp; Neurodiversity</span>
                </div>
                <h3 class="card-title">International Dyslexia Association &amp; Structured Literacy</h3>
                <p class="card-desc">
                    Authoritative scientific research, explicit phonics frameworks, and family toolkits advancing Orton-Gillingham structured literacy for neurodivergent readers.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Structured Literacy</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Science of Reading</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Phonics</span>
                </div>
                <div class="card-footer">
                    <a href="https://dyslexiaida.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit International Dyslexia Association (opens in new tab)">
                        Structured Literacy <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 9: Dyscalculia & Math Learning Alliances -->
            <article class="community-card" data-category="neurodiversity" data-keywords="dyscalculia math anxiety number line manipulatives subitizing dyscalculia network">
                <div class="card-header">
                    <div class="card-icon-box icon-violet">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <span class="card-badge badge-violet">Special Ed &amp; Neurodiversity</span>
                </div>
                <h3 class="card-title">Dyscalculia &amp; Math Anxiety Support Network</h3>
                <p class="card-desc">
                    Specialized strategies addressing math learning differences using Concrete-Representational-Abstract (CRA) sequences, multi-sensory math, and visual dot math.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Dyscalculia</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Math Manipulatives</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Low Anxiety</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.dyscalculia.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit Dyscalculia Information & Support (opens in new tab)">
                        Math Support <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 10: Cerebral Palsy Guide & Educational Toolkit -->
            <article class="community-card" data-category="neurodiversity" data-keywords="cerebral palsy physical therapy assistive technology mobility iep 504 motor skills special education toolkit levin perconti">
                <div class="card-header">
                    <div class="card-icon-box icon-rose">
                        <i class="fas fa-wheelchair"></i>
                    </div>
                    <span class="card-badge badge-rose">Special Ed &amp; Neurodiversity</span>
                </div>
                <h3 class="card-title">Cerebral Palsy Family Guide &amp; Educational Toolkit</h3>
                <p class="card-desc">
                    A comprehensive community handbook covering developmental milestones, physical and occupational therapy, assistive technology, and Section 504 / IEP school accommodations.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Assistive Tech</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> IEP / 504 Rights</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Motor Differences</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.levinperconti.com/birth-injury/cerebral-palsy/guide-toolkit/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit Cerebral Palsy Family Guide & Toolkit by Levin & Perconti (opens in new tab)">
                        View Guide &amp; Toolkit <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 10: Math Circles & Recreational Problem Solving -->
            <article class="community-card" data-category="steam" data-keywords="math circles problem solving puzzles amc logic olympiad steam hands on">
                <div class="card-header">
                    <div class="card-icon-box icon-teal">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <span class="card-badge badge-teal">STEAM &amp; Learning Circles</span>
                </div>
                <h3 class="card-title">National Association of Math Circles (NAMC)</h3>
                <p class="card-desc">
                    Communities of mathematicians, students, and educators engaging in collaborative problem solving, open mathematical inquiries, and recreational puzzles.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Math Circles</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Inquiry Math</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Logic Puzzles</span>
                </div>
                <div class="card-footer">
                    <a href="https://mathcircles.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Visit National Association of Math Circles (opens in new tab)">
                        Find a Circle <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 11: Maker Spaces & Science Olympiad -->
            <article class="community-card" data-category="steam" data-keywords="maker spaces science olympiad stem robotics experiments engineering lab">
                <div class="card-header">
                    <div class="card-icon-box icon-sky">
                        <i class="fas fa-flask"></i>
                    </div>
                    <span class="card-badge badge-sky">STEAM &amp; Learning Circles</span>
                </div>
                <h3 class="card-title">Community Science &amp; Maker Space Collaboratives</h3>
                <p class="card-desc">
                    Hands-on community discovery labs, Science Olympiad regional leagues, and open robotics clubs fostering inquiry-based STEM projects and team challenges.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Robotics</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Science Olympiad</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Maker Lab</span>
                </div>
                <div class="card-footer">
                    <a href="https://www.soinc.org/" target="_blank" rel="noopener noreferrer" class="card-action-btn" aria-label="Explore Science Olympiad (opens in new tab)">
                        Science Olympiad <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </article>

            <!-- Card 12: Youth Literacy Guilds & Public Library Networks -->
            <article class="community-card" data-category="steam" data-keywords="public library reading challenge creative writing book clubs literacy circles">
                <div class="card-header">
                    <div class="card-icon-box icon-purple">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <span class="card-badge badge-purple">STEAM &amp; Learning Circles</span>
                </div>
                <h3 class="card-title">Public Library Youth Literacy &amp; Creative Writing Guilds</h3>
                <p class="card-desc">
                    Free community book clubs, summer literacy challenge trackers, graphic novel workshops, and creative writing mentorship opportunities for young authors.
                </p>
                <div class="card-tags">
                    <span class="card-tag"><i class="fas fa-tag"></i> Library Guilds</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Creative Writing</span>
                    <span class="card-tag"><i class="fas fa-tag"></i> Free Access</span>
                </div>
                <div class="card-footer">
                    <a href="/library/index.php" class="card-action-btn" aria-label="Browse Digital Literature Library">
                        Digital Library <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- No Results Fallback -->
        <div id="repo-no-results" class="community-empty-state" style="display: none;">
            <div class="empty-icon"><i class="fas fa-search-minus"></i></div>
            <h4 class="empty-title">No matching resources found</h4>
            <p class="empty-desc">We couldn't find any resources matching your search query. Try clearing your filters or suggest a new resource below!</p>
            <button type="button" class="empty-reset-btn" id="btn-reset-filters">
                <i class="fas fa-sync-alt"></i> Reset All Filters
            </button>
        </div>
    </section>

    <!-- Section 2: Interactive Feedback & Ideas Studio -->
    <section id="community-feedback" class="community-section" aria-labelledby="feedback-heading" style="margin-top: 4rem;">
        <div class="section-header-row">
            <div>
                <span class="section-tag"><i class="fas fa-comments"></i> Shape the Platform</span>
                <h2 id="feedback-heading" class="section-title">Community Feedback &amp; Ideas Studio</h2>
                <p class="section-desc">Hesten's Learning is built for and shaped by you. Share your curriculum suggestions, report accessibility barriers, or vote on upcoming community ideas.</p>
            </div>
        </div>

        <div class="feedback-studio-grid">

            <!-- Card A: Direct Feedback Form -->
            <div class="feedback-form-panel">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-icon icon-indigo">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div>
                            <h3 class="panel-title">Submit Community Feedback</h3>
                            <p class="panel-sub">Reviewed by real educators and engineers. Stored locally offline as well.</p>
                        </div>
                    </div>
                </div>

                <form id="communityFeedbackForm" action="/pages/community.php" method="POST" class="community-form">
                    <!-- Bot Honeypot -->
                    <input type="text" name="community_bot_check" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <!-- Category & Role Grid -->
                    <div class="form-row-grid">
                        <div class="form-field-group">
                            <label for="feedback_category" class="form-label">Feedback Category <span class="required">*</span></label>
                            <select id="feedback_category" name="feedback_category" class="form-select" required>
                                <option value="Curriculum Suggestion">Curriculum Suggestion (Math, ELA, Science, Social)</option>
                                <option value="Accessibility Barrier">Accessibility / Assistive Tech Enhancement</option>
                                <option value="New Feature Request">New Tool / Generator Feature Request</option>
                                <option value="Community Resource">Community Resource Recommendation</option>
                                <option value="General Feedback" selected>General Feedback &amp; Words of Encouragement</option>
                            </select>
                        </div>

                        <div class="form-field-group">
                            <label for="feedback_role" class="form-label">Your Learning Role <span class="required">*</span></label>
                            <select id="feedback_role" name="feedback_role" class="form-select" required>
                                <option value="Parent / Homeschool Coach" selected>Parent / Homeschool Learning Coach</option>
                                <option value="Classroom Teacher / Specialist">Classroom Educator / Specialist</option>
                                <option value="Student Scholar">Student Scholar / Self-Directed Learner</option>
                                <option value="Community Advocate">Community Advocate / Co-op Leader</option>
                            </select>
                        </div>
                    </div>

                    <!-- Name & Email (Optional) -->
                    <div class="form-row-grid">
                        <div class="form-field-group">
                            <label for="feedback_name" class="form-label">Your Name <span class="optional">(optional)</span></label>
                            <input type="text" id="feedback_name" name="feedback_name" class="form-input" placeholder="e.g. Sarah M.">
                        </div>

                        <div class="form-field-group">
                            <label for="feedback_email" class="form-label">Contact Email <span class="optional">(optional, for replies)</span></label>
                            <input type="email" id="feedback_email" name="feedback_email" class="form-input" placeholder="you@example.com">
                        </div>
                    </div>

                    <!-- Message Textarea -->
                    <div class="form-field-group">
                        <div class="label-row">
                            <label for="feedback_message" class="form-label">What's on your mind? <span class="required">*</span></label>
                            <span class="char-count" id="feedback-char-count">0 / 1000</span>
                        </div>
                        <textarea id="feedback_message" name="feedback_message" rows="5" class="form-textarea" required 
                                  maxlength="1000" placeholder="Describe your suggestion, resource recommendation, curriculum observation, or accessibility need..."></textarea>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions-row">
                        <button type="submit" class="community-submit-btn" id="btn-submit-feedback">
                            <i class="fas fa-paper-plane"></i> Send Feedback
                        </button>
                        <span class="privacy-note">
                            <i class="fas fa-shield-alt"></i> We respect student and family privacy. Zero tracking.
                        </span>
                    </div>
                </form>

                <!-- Offline Feedback History Viewer Drawer -->
                <div class="feedback-history-block" id="feedback-history-block" style="display: none; margin-top: 1.5rem; border-top: 1px dashed var(--color-border); padding-top: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.825rem; font-weight: 700; color: #475569;">
                            <i class="fas fa-history"></i> Your Recent Submissions On This Device
                        </span>
                        <button type="button" id="btn-clear-feedback-history" style="background: none; border: none; font-size: 0.75rem; color: #e11d48; cursor: pointer; text-decoration: underline;">
                            Clear History
                        </button>
                    </div>
                    <div id="feedback-history-list" class="feedback-history-list"></div>
                </div>
            </div>

            <!-- Card B: Interactive Community Ideas & Upvote Board -->
            <div class="feedback-ideas-panel">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-icon icon-amber">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div>
                            <h3 class="panel-title">Community Roadmap &amp; Feature Upvote</h3>
                            <p class="panel-sub">Vote on community-submitted enhancements to help prioritize development.</p>
                        </div>
                    </div>
                </div>

                <div class="ideas-list" id="community-ideas-list" role="region" aria-label="Community ideas vote board">

                    <!-- Idea 1 -->
                    <div class="idea-item" data-idea-id="idea-science-lab-sheets">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Printable High School Science Lab Worksheets" onclick="window.toggleIdeaUpvote('idea-science-lab-sheets')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-science-lab-sheets">142</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Printable High School Lab Worksheets &amp; Graphing Matrices</h4>
                            <p class="idea-desc">Clean two-column printable lab reports with pre-drawn coordinate grid templates, hypothesis tables, and error analysis checklists.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Science &amp; Labs • High Priority</span>
                        </div>
                    </div>

                    <!-- Idea 2 -->
                    <div class="idea-item" data-idea-id="idea-dyscalculia-abacus">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Interactive Dyscalculia Bead-Bar and Abacus" onclick="window.toggleIdeaUpvote('idea-dyscalculia-abacus')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-dyscalculia-abacus">128</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Dyscalculia Interactive Virtual Abacus &amp; Rekenrek</h4>
                            <p class="idea-desc">Interactive 20-bead and 100-bead rekenrek counter with color-contrasted 5-bead groupings and keyboard arrow nudging for tactile place-value modeling.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Accessibility &amp; Math</span>
                        </div>
                    </div>

                    <!-- Idea 3 -->
                    <div class="idea-item" data-idea-id="idea-multisibling-dashboard">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Multi-Child Homeschool Family Dashboard" onclick="window.toggleIdeaUpvote('idea-multisibling-dashboard')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-multisibling-dashboard">96</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Multi-Child Sibling Profile Switcher for Homeschool Families</h4>
                            <p class="idea-desc">Allow parent coaches to manage multiple children profiles on a shared household laptop with instant 1-click active student switching and independent mastery trackers.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Parent Hub Feature</span>
                        </div>
                    </div>

                    <!-- Idea 4 -->
                    <div class="idea-item" data-idea-id="idea-audio-speed-control">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Read-Aloud Audio Speed Adjuster" onclick="window.toggleIdeaUpvote('idea-audio-speed-control')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-audio-speed-control">89</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Audio Read-Aloud Velocity Selector (0.75x, 1x, 1.25x)</h4>
                            <p class="idea-desc">Give students and teachers fine control over synthesized speech playback velocity directly from the reader and assessment hotbar.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Universal Design for Learning (UDL)</span>
                        </div>
                    </div>

                    <!-- Idea 5 -->
                    <div class="idea-item" data-idea-id="idea-bilingual-phonics">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Spanish-English Bilingual Early Phonics Readers" onclick="window.toggleIdeaUpvote('idea-bilingual-phonics')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-bilingual-phonics">74</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Spanish &amp; English Bilingual Decodable Phonics Readers</h4>
                            <p class="idea-desc">Dual-language illustrated reading stories supporting multilingual English Language Learners (ELL) in early elementary grades.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Library &amp; ELA</span>
                        </div>
                    </div>

                    <!-- Idea 6 -->
                    <div class="idea-item" data-idea-id="idea-latex-flashcards">
                        <button type="button" class="idea-vote-btn" aria-label="Upvote Printable Flashcard Studio with LaTeX Math Support" onclick="window.toggleIdeaUpvote('idea-latex-flashcards')">
                            <i class="fas fa-chevron-up"></i>
                            <span class="vote-count" id="count-idea-latex-flashcards">68</span>
                        </button>
                        <div class="idea-content">
                            <h4 class="idea-title">Printable Custom Flashcard Studio with LaTeX Math Formulas</h4>
                            <p class="idea-desc">Educator flashcard generator outputting double-sided printable study cards with auto-typeset MathJax equations, vocabulary definitions, and diagrams.</p>
                            <span class="idea-meta"><i class="fas fa-tag"></i> Teacher Suite Studio</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Section 3: Community Inclusion Pledge -->
    <section class="community-pledge-card" aria-label="Community Inclusion Pledge" style="margin-top: 4rem;">
        <div class="pledge-grid">
            <div class="pledge-icon-wrap">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div>
                <h3 class="pledge-title">Our Open Educational Platform Pledge</h3>
                <p class="pledge-desc">
                    Hesten's Learning is unconditionally committed to barrier-free educational equity. We do not sell user data, serve commercial advertisements, or lock foundational learning behind paywalls. Every tool, lesson, and assessment is built to comply with WCAG 2.1/2.2 AAA accessibility standards and Universal Design for Learning (UDL) guidelines.
                </p>
                <div class="pledge-actions">
                    <a href="/pages/parents.php" class="pledge-btn btn-parent">
                        <i class="fas fa-users"></i> Explore Parent Hub &amp; IEP Tools
                    </a>
                    <a href="/pages/teachers.php" class="pledge-btn btn-teacher">
                        <i class="fas fa-chalkboard-teacher"></i> Explore Educator Suite &amp; Pacing
                    </a>
                    <a href="/pages/accessibility.php" class="pledge-btn btn-a11y">
                        <i class="fas fa-universal-access"></i> Accessibility Statement
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<script src="/assets/js/pages/community-main.js"></script>

<?php include '../src/footer.php'; ?>

