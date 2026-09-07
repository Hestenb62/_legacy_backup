<?php
// FILE: about-me.php
// DESCRIPTION: Personal profile and founder bio of Hesten Allison.
// Pure Vanilla CSS architecture with zero TailwindCSS dependencies.

// --- Page-Specific Variables for Header ---
$pageTitle       = "About Me - Hesten's Learning";
$pageDescription = "Learn more about Hesten Allison, the creator of Hesten's Learning, and the mission to make education accessible.";
$pageKeywords    = "about me, hesten allison, education, learning disabilities, homeschool, web developer";
$pageAuthor      = "Hesten Allison";

// Include Global Site Header
include '../src/header.php';
?>

<!-- About Me Page Stylesheet -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/pages/about-me.css') ?>">

<!-- Hero Section -->
<div class="page-hero">
    <div class="page-hero-bg">
        <i class="fas fa-user-graduate about-hero-icon-1"></i>
        <i class="fas fa-code about-hero-icon-2"></i>
    </div>

    <div class="parents-container" style="text-align: center;">
        <span class="page-hero-badge">
            <i class="fas fa-heart"></i> Founder & Educator
        </span>
        <h1 class="page-hero-title">
            About the Creator
        </h1>
        <p class="page-hero-subtitle">
            Hesten Allison • Secondary Education Student, Developer & Accessible Learning Advocate
        </p>
    </div>
</div>

<main id="main-content" class="about-container">
    <div class="about-card">
        <div class="about-layout">

            <!-- Profile Photo & Badges Column -->
            <div class="about-avatar-col">
                <div class="about-avatar-frame">
                    <img src="/assets/images/profile-photo.jpg" alt="Hesten Allison" 
                         class="about-avatar-img"
                         onerror="this.onerror=null; this.src='https://placehold.co/240x240/4f46e5/FFFFFF?text=HA';">
                </div>
                <span class="about-role-pill">
                    <i class="fas fa-graduation-cap"></i> Secondary Ed @ CCV
                </span>
                <span class="about-credential-badge">
                    Founder & Lead Curriculum Developer
                </span>
            </div>

            <!-- Biography & Contact Column -->
            <div class="about-content-col">
                <h2 class="about-heading">Hesten Allison</h2>
                <div class="about-subtitle">Building Accessible, Research-Backed Learning Pathways</div>

                <p class="about-lead-text">
                    I am currently a student at the Community College of Vermont (CCV), working towards my Secondary Education degree. I've always had a voracious appetite for learning and sharing knowledge, which ultimately inspired me to build Hesten's Learning.
                </p>

                <div class="about-mission-box">
                    <p class="about-mission-text">
                        "The primary catalyst for this project was my younger sister, who faces unique learning challenges. I wanted to build a platform that could adapt to her specific needs, making education genuinely accessible, interactive, and joyful."
                    </p>
                </div>

                <p class="about-body-text">
                    I drew early inspiration from platforms like IXL, admiring their interactive approach and comprehensive skill hierarchies. However, I also realized that traditional digital curricula often overlook students with neurodivergent learning profiles, attention differences, and reading challenges.
                </p>

                <p class="about-body-text">
                    I've spent countless hours researching cognitive learning styles, accessibility engineering, and evidence-based pedagogical strategies. I've integrated those findings directly into this platform—from synchronized text-to-speech and dyslexic-friendly typography to interactive practice checks and adaptive mastery tracking.
                </p>

                <!-- Contact Info List -->
                <ul class="about-contact-list">
                    <li class="about-contact-item">
                        <i class="fas fa-envelope about-contact-icon" aria-hidden="true"></i>
                        <a href="mailto:admin@hestena62.com" class="about-contact-link">admin@hestena62.com</a>
                        <span style="color: var(--color-text-muted); font-size: 0.8125rem;">(Support & Inquiries)</span>
                    </li>
                    <li class="about-contact-item">
                        <i class="fas fa-user-circle about-contact-icon" aria-hidden="true"></i>
                        <a href="mailto:hesten@hestena62.com" class="about-contact-link">hesten@hestena62.com</a>
                        <span style="color: var(--color-text-muted); font-size: 0.8125rem;">(Direct Founder Contact)</span>
                    </li>
                    <li class="about-contact-item">
                        <i class="fas fa-globe about-contact-icon" aria-hidden="true"></i>
                        <a href="https://hestena62.com" target="_blank" rel="noopener noreferrer" class="about-contact-link">hestena62.com</a>
                    </li>
                    <li class="about-contact-item">
                        <i class="fas fa-map-marker-alt about-contact-icon" aria-hidden="true"></i>
                        <span>Vermont, United States</span>
                    </li>
                </ul>

                <!-- Action Buttons -->
                <div class="about-actions-row">
                    <a href="https://www.linkedin.com/in/hesten-allison-8b4b2b263/" target="_blank" rel="noopener noreferrer" class="about-btn about-btn-linkedin">
                        <i class="fab fa-linkedin" aria-hidden="true"></i> LinkedIn Profile
                    </a>
                    <a href="mailto:admin@hestena62.com" class="about-btn about-btn-email">
                        <i class="fas fa-envelope" aria-hidden="true"></i> Email Admin
                    </a>
                    <a href="tel:+18024510781" class="about-btn about-btn-phone">
                        <i class="fas fa-phone" aria-hidden="true"></i> Direct Call / Text
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
// Include Global Site Footer
include '../src/footer.php';
?>
