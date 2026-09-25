<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "About Us - Hesten's Learning";
$pageDescription = "Learn about our mission, founder story, team, and values in empowering neurodiverse students through accessible, personalized education.";
$pageKeywords    = "about us, mission, team, history, education, learning disabilities, personalized learning, UDL, accessibility";
$pageAuthor      = "Hesten Allison";

// Include global header (HTML head, accessibility features, nav, and fixed tools)
include '../src/header.php';
?>

<!-- Dedicated About Page Stylesheet -->
<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/about.css') : '/assets/css/pages/about.css' ?>">

<!-- Hero Section -->
<div class="page-hero">
    <!-- Abstract Background Icons -->
    <div class="about-hero-bg" aria-hidden="true">
        <i class="fas fa-info-circle about-hero-bg-icon-1"></i>
        <i class="fas fa-users about-hero-bg-icon-2"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            <i class="fas fa-seedling"></i> Our Story &amp; Purpose
        </span>
        <h1 class="page-hero-title">
            About Hesten's Learning
        </h1>
        <p class="page-hero-subtitle">
            Empowering every student with personalized, barrier-free, and research-backed education.
        </p>
    </div>
</div>

<main id="main-content" class="about-container">

    <!-- Platform Impact & Metric Highlights -->
    <section class="about-stats-grid" aria-label="Platform Impact Highlights">
        <div class="about-stat-card">
            <div class="about-stat-icon-wrapper" aria-hidden="true">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="about-stat-info">
                <span class="about-stat-value">2025</span>
                <span class="about-stat-label">Founded with Purpose</span>
            </div>
        </div>

        <div class="about-stat-card">
            <div class="about-stat-icon-wrapper secondary" aria-hidden="true">
                <i class="fas fa-universal-access"></i>
            </div>
            <div class="about-stat-info">
                <span class="about-stat-value">100%</span>
                <span class="about-stat-label">WCAG &amp; UDL Aligned</span>
            </div>
        </div>

        <div class="about-stat-card">
            <div class="about-stat-icon-wrapper accent" aria-hidden="true">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="about-stat-info">
                <span class="about-stat-value">K-12+</span>
                <span class="about-stat-label">Multi-Grade Curriculum</span>
            </div>
        </div>

        <div class="about-stat-card">
            <div class="about-stat-icon-wrapper success" aria-hidden="true">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="about-stat-info">
                <span class="about-stat-value">Privacy First</span>
                <span class="about-stat-label">Zero Ads or Tracking</span>
            </div>
        </div>
    </section>

    <!-- Mission & History Split Cards -->
    <div class="about-section-grid">
        <!-- Our Mission -->
        <article class="about-card">
            <div class="about-card-watermark" aria-hidden="true">
                <i class="fas fa-bullseye"></i>
            </div>
            <div>
                <div class="about-card-header">
                    <div class="about-card-icon" aria-hidden="true">
                        <i class="fas fa-compass"></i>
                    </div>
                    <h2 class="about-card-title">Our Mission</h2>
                </div>
                <p class="about-card-text">
                    Our mission is to provide transformative educational tools that ensure every student thrives, regardless of learning differences. We strive to innovate and continuously improve our offerings to meet the evolving needs of diverse learners. Specifically, we focus on <strong>empowering students with learning disabilities</strong> through personalized, multimodal, and research-backed educational experiences.
                </p>
            </div>
            <a href="/pages/mission.php" class="about-card-action">
                <span>Read our full Mission &amp; Vision</span>
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </article>

        <!-- Our History -->
        <article class="about-card">
            <div class="about-card-watermark" aria-hidden="true">
                <i class="fas fa-landmark"></i>
            </div>
            <div>
                <div class="about-card-header">
                    <div class="about-card-icon accent" aria-hidden="true">
                        <i class="fas fa-hourglass-start"></i>
                    </div>
                    <h2 class="about-card-title">Our History</h2>
                </div>
                <p class="about-card-text">
                    Founded in 2025, our journey began with founder Hesten Allison addressing real accessibility barriers faced by neurodiverse students and homeschoolers. What started as an individual initiative has swiftly evolved into an expansive platform offering comprehensive standards-aligned curriculum, dynamic STEM labs, and individualized accommodation engines.
                </p>
            </div>
            <a href="/pages/about-me.php" class="about-card-action">
                <span>Discover the Founder's Journey</span>
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </article>
    </div>

    <!-- Founder Spotlight Section -->
    <section class="about-spotlight-card" aria-labelledby="founder-spotlight-heading">
        <div class="about-spotlight-inner">
            <div class="about-founder-avatar-wrap">
                <img src="/assets/images/profile-photo.jpg" 
                     alt="Hesten Allison, Founder of Hesten's Learning" 
                     class="about-founder-avatar"
                     onerror="this.onerror=null; this.src='https://placehold.co/240x240/4f46e5/FFFFFF?text=HA';">
                <span class="about-founder-badge">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> Founder &amp; Educator
                </span>
            </div>

            <div class="about-spotlight-body">
                <span class="about-spotlight-badge">
                    <i class="fas fa-lightbulb" aria-hidden="true"></i> Leadership Spotlight
                </span>
                <h2 id="founder-spotlight-heading" class="about-spotlight-title">Hesten Allison</h2>
                <div class="about-spotlight-role">Secondary Education Scholar, Developer &amp; Accessibility Advocate</div>
                <p class="about-spotlight-desc">
                    Hesten created Hesten's Learning from a conviction that educational technology should adapt to the student, not the other way around. Drawing from hands-on academic training in secondary education and modern web engineering, every feature is tailored for low cognitive friction, multi-sensory engagement, and measurable student empowerment.
                </p>
                <div class="about-spotlight-actions">
                    <a href="/pages/about-me.php" class="about-btn-primary">
                        <i class="fas fa-user" aria-hidden="true"></i> View Full Bio &amp; Credentials
                    </a>
                    <a href="/pages/mission.php" class="about-btn-secondary">
                        <i class="fas fa-bullseye" aria-hidden="true"></i> Our Pedagogical Pillars
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team & Collaborative Network -->
    <div class="about-section-grid">
        <article class="about-card">
            <div class="about-card-watermark" aria-hidden="true">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="about-card-header">
                    <div class="about-card-icon secondary" aria-hidden="true">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <h2 class="about-card-title">Our Team &amp; Community</h2>
                </div>
                <p class="about-card-text">
                    We have a dedicated group of contributors, educators, and curriculum advisors passionate about inclusive learning. Our team members bring diverse perspectives across pedagogy, software engineering, and assistive technology, uniting behind the shared goal of making learning joyful and equitable for all.
                </p>
            </div>
            <a href="/pages/contact.php" class="about-card-action">
                <span>Connect with Our Team</span>
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </article>

        <!-- Direct Contact & Support -->
        <article class="about-card">
            <div class="about-card-watermark" aria-hidden="true">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div>
                <div class="about-card-header">
                    <div class="about-card-icon accent" aria-hidden="true">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h2 class="about-card-title">Get in Touch</h2>
                </div>
                <p class="about-card-text">
                    Have questions about our curriculum, need accommodations support, or wish to share feedback? We love hearing from students, parents, and educators. Reach out directly via email at <a href="mailto:admin@hestena62.com" class="about-card-action" style="display:inline; padding:0;"><strong>admin@hestena62.com</strong></a> or use our support form.
                </p>
            </div>
            <a href="/pages/contact.php" class="about-card-action">
                <span>Open Contact Form</span>
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </article>
    </div>

    <!-- Core Values Showcase -->
    <section class="about-values-section" aria-labelledby="values-heading">
        <div class="about-section-header">
            <span class="about-section-pill">
                <i class="fas fa-heart" aria-hidden="true"></i> What Drives Us
            </span>
            <h2 id="values-heading" class="about-section-title">Our Guiding Values</h2>
            <p class="about-section-subtitle">
                Integrity, excellence, and learner focus are at the core of everything we build. Our values steer our roadmap and guarantee that students always come first.
            </p>
        </div>

        <div class="about-values-grid">
            <!-- Value 1 -->
            <div class="about-value-card">
                <div class="about-value-icon" aria-hidden="true">
                    <i class="fas fa-universal-access"></i>
                </div>
                <h3 class="about-value-title">Inclusion by Design</h3>
                <p class="about-value-desc">
                    Accessibility is never an afterthought. Every interface, lesson, and interactive element is architected to meet WCAG AAA standards and UDL multimodal criteria.
                </p>
            </div>

            <!-- Value 2 -->
            <div class="about-value-card v-accent">
                <div class="about-value-icon" aria-hidden="true">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="about-value-title">Pedagogical Excellence</h3>
                <p class="about-value-desc">
                    We ground our curriculum in verified educational research, fostering conceptual understanding through step-by-step guidance and cognitive pacing.
                </p>
            </div>

            <!-- Value 3 -->
            <div class="about-value-card v-secondary">
                <div class="about-value-icon" aria-hidden="true">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="about-value-title">Integrity &amp; Privacy</h3>
                <p class="about-value-desc">
                    We protect student privacy unconditionally. We never sell data, display commercial advertisements, or lock essential learning accommodations behind paywalls.
                </p>
            </div>

            <!-- Value 4 -->
            <div class="about-value-card v-success">
                <div class="about-value-icon" aria-hidden="true">
                    <i class="fas fa-sparkles"></i>
                </div>
                <h3 class="about-value-title">Student Empowerment</h3>
                <p class="about-value-desc">
                    We celebrate learner autonomy. By providing custom themes, sensory retreat controls, and self-paced mastery, we help students build confidence in their own abilities.
                </p>
            </div>
        </div>
    </section>

    <!-- Interactive Call to Action Banner -->
    <section class="about-cta-banner" aria-labelledby="cta-heading">
        <div class="about-cta-bg-shape" aria-hidden="true"></div>
        <div class="about-cta-content">
            <h2 id="cta-heading" class="about-cta-title">Join Us on Our Mission</h2>
            <p class="about-cta-text">
                Explore our full curriculum, discover adaptive accommodations, or reach out to see how Hesten's Learning can support your classroom or home.
            </p>
            <div class="about-cta-buttons">
                <a href="/" class="about-btn-light">
                    <i class="fas fa-book-reader" aria-hidden="true"></i> Explore Curriculum
                </a>
                <a href="/pages/contact.php" class="about-btn-outline-white">
                    <i class="fas fa-paper-plane" aria-hidden="true"></i> Contact Us
                </a>
            </div>
        </div>
    </section>

</main>

<?php include '../src/footer.php'; ?>
