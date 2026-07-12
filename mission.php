<?php
// --- Page Configuration ---
$pageTitle       = "Our Mission & Vision";
$pageDescription = "The story behind Hesten's Learning. Dedicated to accessible, privacy-focused, and personalized education for students with learning disabilities.";
$pageKeywords    = "education mission, non-profit education, accessibility, learning disabilities, inclusive edtech";
$pageAuthor      = "Hesten's Learning";

include 'src/header.php';
?>

<!-- Hero Section -->
<div class="page-hero">
    <!-- Animated Background -->
    <div class="page-hero-bg mission-bg-anim">
        <i class="fas fa-heart mission-icon-1"></i>
        <i class="fas fa-globe-americas mission-icon-2"></i>
        <i class="fas fa-seedling mission-icon-3"></i>
        <div class="mission-glow"></div>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            About Hesten's Learning
        </span>
        <h1 class="page-hero-title">
            Education is a Right, <br />
            <span class="mission-text-gradient">Not a Privilege.</span>
        </h1>
        <p class="page-hero-subtitle">
            We are building a world where learning disabilities are not barriers, but unique pathways to success.
        </p>
    </div>
</div>

<main class="mission-container" id="main-content">

    <!-- Mission & Vision Split -->
    <div class="mission-split-grid">
        <!-- Mission -->
        <section class="mission-card card-primary">
            <div class="mission-card-bg-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2 class="mission-card-title">
                <i class="fas fa-rocket icon-primary"></i> Our Mission
            </h2>
            <p class="mission-card-text">
                To empower students with learning disabilities by providing free, high-quality, and deeply personalized
                educational tools. We bridge the gap between complex curriculum standards and individual learning needs
                through technology that adapts to the student, not the other way around.
            </p>
        </section>

        <!-- Vision -->
        <section class="mission-card card-accent">
            <div class="mission-card-bg-icon">
                <i class="fas fa-eye"></i>
            </div>
            <h2 class="mission-card-title">
                <i class="fas fa-lightbulb icon-accent"></i> Our Vision
            </h2>
            <p class="mission-card-text">
                A future where every classroom is inclusive by design. We envision an educational landscape where
                "accessibility" isn't an afterthought or a special accommodation, but the default standard for how all
                knowledge is shared.
            </p>
        </section>
    </div>

    <!-- Core Values -->
    <div class="mission-values-section">
        <div class="values-header">
            <h2 class="values-title">Our Core Values</h2>
            <div class="values-divider"></div>
        </div>

        <div class="values-grid">
            <!-- Value 1 -->
            <div class="value-card">
                <div class="value-icon-box box-primary">
                    <i class="fas fa-universal-access"></i>
                </div>
                <h3 class="value-card-title">Radical Accessibility</h3>
                <p class="value-card-text">Design for the edges, and you reach everyone. Dyslexia-friendly fonts and screen reader support are our baseline.</p>
            </div>

            <!-- Value 2 -->
            <div class="value-card">
                <div class="value-icon-box box-secondary">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="value-card-title">Privacy First</h3>
                <p class="value-card-text">We believe education shouldn't cost your data. No trackers, no required logins, and no selling student information.</p>
            </div>

            <!-- Value 3 -->
            <div class="value-card">
                <div class="value-icon-box box-accent">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3 class="value-card-title">Always Free</h3>
                <p class="value-card-text">Quality education resources should be open to all, regardless of economic status or school budget.</p>
            </div>

            <!-- Value 4 -->
            <div class="value-card">
                <div class="value-icon-box box-primary">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="value-card-title">Neurodiversity</h3>
                <p class="value-card-text">We celebrate different ways of thinking. Our tools are built to support unique processing styles.</p>
            </div>
        </div>
    </div>

    <!-- The "Why" Story Section -->
    <section class="mission-story-section">
        <div class="story-bg-icon">
            <i class="fas fa-quote-right"></i>
        </div>

        <div class="story-grid">
            <div class="story-content">
                <span class="story-badge">The Origin Story</span>
                <h2 class="story-title">Why Hesten's Learning Exists</h2>
                <div class="story-paragraphs">
                    <p>
                        The traditional education system is built for the "average" student. But averages don't exist in
                        real life. When a student struggles with standard text or rigid timelines, they aren't
                        failing—the system is failing them.
                    </p>
                    <p>
                        I created Hesten's Learning to fill the gap between rigid academic standards and the flexible
                        needs of real students. I wanted a place where a 7th grader could practice 4th-grade math
                        concepts without feeling "behind," and where visual clutter wouldn't get in the way of learning.
                    </p>
                    <p class="story-highlight">
                        This isn't just a website; it's a commitment to every student who has ever felt like they didn't
                        fit the mold.
                    </p>
                </div>
                <div class="story-author">
                    <img src="/assets/images/signature-placeholder.png" alt="Hesten Allison" class="author-signature" onerror="this.style.display='none'">
                    <p class="author-name">Hesten Allison</p>
                    <p class="author-title">Founder & Developer</p>
                </div>
            </div>

            <!-- Visual Element -->
            <div class="story-visual">
                <div class="visual-wrapper">
                    <div class="visual-layer layer-1"></div>
                    <div class="visual-layer layer-2"></div>
                    <div class="visual-card">
                        <i class="fas fa-users visual-icon"></i>
                        <h3 class="visual-title">Community Driven</h3>
                        <p class="visual-text">Built with feedback from real teachers, parents, and students.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <div class="mission-cta">
        <h2 class="cta-title">Ready to start learning?</h2>
        <div class="cta-buttons">
            <a href="/" class="btn-primary-lg">
                Browse Curriculum
            </a>
            <a href="/contact.php" class="btn-outline-lg">
                Get Involved
            </a>
        </div>
    </div>

</main>

<?php include 'src/footer.php'; ?>