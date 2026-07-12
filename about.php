<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "About Us - Hesten's Learning";
$pageDescription = "Learn about our mission, team, and history in empowering students with learning disabilities through personalized education.";
$pageKeywords    = "about us, mission, team, history, education, learning disabilities, personalized learning";
$pageAuthor      = "Hesten Allison";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// the accessibility features, announcement bar, and the main navigation structure.
include 'src/header.php';
?>

<!-- ==================================================================== -->
<!-- MAIN CONTENT SECTION -->
<!-- NOTE: The header.php already handles the opening <body> and <header> -->
<!-- The content below starts the main page wrapper. -->
<!-- ==================================================================== -->

<!-- Hero Section -->
<div class="page-hero">
    <!-- Abstract Background Shapes -->
    <div class="page-hero-bg">
        <i class="fas fa-info-circle bg-icon-1"></i>
        <i class="fas fa-users bg-icon-2"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            Our Story
        </span>
        <h1 class="page-hero-title">
            About Us
        </h1>
        <p class="page-hero-subtitle">
            Empowering students with personalized education.
        </p>
    </div>
</div>

<main class="page-content-wrapper">
    <div class="page-content-inner">

        <section class="content-section">
            <h2 class="section-heading">Our Mission</h2>
            <p class="section-paragraph">Our mission is to provide the best services to our customers and
                ensure their satisfaction. We strive to innovate and continuously improve our offerings to meet the
                evolving needs of our clients. Specifically, we focus on **empowering students with learning
                disabilities** through personalized and research-backed educational experiences. <a href="/mission.php"
                    class="section-link">Read our full Mission & Vision &rsaquo;</a></p>
        </section>

        <section class="content-section">
            <h2 class="section-heading">Our Team</h2>
            <p class="section-paragraph">We have a diverse team of professionals dedicated to achieving
                our mission. Our team members come from various backgrounds and bring a wealth of experience and
                expertise to the table, including educators, technologists, and learning specialists. We believe in
                fostering a collaborative and inclusive work environment where everyone can thrive.</p>
        </section>

        <section class="content-section">
            <h2 class="section-heading">Our History</h2>
            <p class="section-paragraph">Founded in 2023, we have grown rapidly and continue to expand our
                reach. Our journey began with a small group of passionate individuals who shared a common vision for
                accessible education. Over the years, we have achieved numerous milestones and have built a strong
                reputation in the field of inclusive learning.</p>
        </section>

        <section class="content-section">
            <h2 class="section-heading">Our Values</h2>
            <p class="section-paragraph">Integrity, excellence, and customer focus are at the core of
                everything we do. We are committed to upholding the highest standards of professionalism and ethical
                conduct. Our values guide our actions and decisions, ensuring that we always act in the best interests
                of our clients and stakeholders.</p>
        </section>

        <section class="content-section">
            <h2 class="section-heading">Contact Us</h2>
            <p class="section-paragraph">If you have any questions or would like to learn more about our
                services, please do not hesitate to contact us. You can reach us via email at <a
                    href="mailto:admin@hestena62.com"
                    class="section-link">admin@hestena62.com</a>. We look forward to hearing
                from you!</p>
        </section>

    </div>
</main>

<?php
// Include the footer file, which contains the footer element, modals, 
// and the closing </body> and </html> tags.
// It also contains the comprehensive site-wide JavaScript logic.
include 'src/footer.php';
?>