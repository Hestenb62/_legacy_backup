<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "Privacy Policy - Hesten's Learning";
$pageDescription = "Privacy Policy for Hesten's Learning Platform: student data protection, COPPA & FERPA standards.";
$pageKeywords    = "privacy policy, student data privacy, COPPA, FERPA, terms, security";
$pageAuthor      = "Hesten Allison";

// Include the header file
include '../src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/legal.css') : '/assets/css/pages/legal.css' ?>">

<!-- Hero Section -->
<div class="page-hero">
    <div class="page-hero-bg">
        <i class="fas fa-shield-alt page-hero-bg-icon"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            <i class="fas fa-user-shield"></i> Legal & Data Governance
        </span>
        <h1 class="page-hero-title">
            Privacy Policy
        </h1>
        <p class="page-hero-subtitle">
            Transparent commitments to student data privacy, safety, and institutional trust.
        </p>
    </div>
</div>

<main class="legal-page-wrapper" id="main-content">
    <!-- Legal Meta & Switcher Bar -->
    <div class="legal-header-meta">
        <div class="legal-meta-badges">
            <span class="legal-badge">
                <i class="fas fa-clock"></i> Effective: September 2026
            </span>
            <span class="legal-badge legal-badge-secondary">
                <i class="fas fa-lock"></i> Student Data Privacy
            </span>
        </div>

        <nav class="legal-switcher-tabs" aria-label="Legal document switcher">
            <a href="/pages/privacy.php" class="legal-switcher-link active" aria-current="page">
                <i class="fas fa-shield-alt"></i> Privacy Policy
            </a>
            <a href="/pages/terms-of-use.php" class="legal-switcher-link">
                <i class="fas fa-file-contract"></i> Terms of Use
            </a>
        </nav>
    </div>

    <!-- Quick Navigation Chips -->
    <nav class="legal-quick-nav" aria-label="Table of Contents">
        <div class="legal-quick-nav-title">
            <i class="fas fa-list-ol"></i> Table of Contents
        </div>
        <div class="legal-chips-container">
            <a href="#section-1" class="legal-nav-chip">1. Information We Collect</a>
            <a href="#section-2" class="legal-nav-chip">2. How We Use Information</a>
            <a href="#section-3" class="legal-nav-chip">3. Information Sharing & Third Parties</a>
            <a href="#section-4" class="legal-nav-chip">4. Security & Data Protection</a>
            <a href="#section-5" class="legal-nav-chip">5. Student Rights & Inquiries</a>
        </div>
    </nav>

    <!-- Main Legal Card -->
    <article class="legal-card" style="margin-top: 1.5rem;">
        <section class="legal-section" id="section-1">
            <div class="legal-section-header">
                <span class="legal-section-num">1</span>
                <h2 class="legal-section-title">Information We Collect</h2>
            </div>
            <p class="legal-text">
                We collect information provided directly by students, parents, and educators when interacting with our educational platform. This includes optional profile display names, diagnostic assessment responses, reading time logs, and assistive accessibility preferences (such as high-contrast modes, dyslexia typography, and reading mask dimensions).
            </p>
            <p class="legal-text">
                All learning progress, study streaks, and quiz results are stored locally within client-side storage by default. If optional Google Drive auto-sync is enabled, encrypted backup files are mirrored exclusively within the user's private Google Drive storage space.
            </p>
        </section>

        <section class="legal-section" id="section-2">
            <div class="legal-section-header">
                <span class="legal-section-num">2</span>
                <h2 class="legal-section-title">How We Use Information</h2>
            </div>
            <p class="legal-text">
                The information collected is used solely for educational purposes:
            </p>
            <p class="legal-text">
                • Delivering individualized curriculum pathways and diagnostic mastery reports.<br>
                • Preserving student preferences, saved library books, and accessibility accommodations across sessions.<br>
                • Continuously refining academic pacing models and question bank clarity without tracking individuals across third-party websites.
            </p>
        </section>

        <section class="legal-section" id="section-3">
            <div class="legal-section-header">
                <span class="legal-section-num">3</span>
                <h2 class="legal-section-title">Information Sharing & Third Parties</h2>
            </div>
            <p class="legal-text">
                <strong>We do not sell, rent, or monetize student personal data under any circumstances.</strong> We do not serve targeted behavioral advertising.
            </p>
            <p class="legal-text">
                Data is never shared with external third parties except essential technical service providers who assist in operating the platform (such as secure font distribution and client-side math rendering) and who adhere to strict data non-disclosure agreements.
            </p>
        </section>

        <section class="legal-section" id="section-4">
            <div class="legal-section-header">
                <span class="legal-section-num">4</span>
                <h2 class="legal-section-title">Security & Data Protection</h2>
            </div>
            <p class="legal-text">
                We implement industry-standard technical and organizational security safeguards to protect information against loss, theft, unauthorized access, and alteration. All communication channels utilize TLS/HTTPS encryption, strict Content Security Policies, and client-side sanitization to mitigate vulnerabilities.
            </p>
        </section>

        <section class="legal-section" id="section-5">
            <div class="legal-section-header">
                <span class="legal-section-num">5</span>
                <h2 class="legal-section-title">Student Rights & Inquiries</h2>
            </div>
            <p class="legal-text">
                Students and parents have the right to inspect, export, or permanently erase all stored learning metrics at any time using the Data section in <a href="/pages/settings.php">Platform Settings</a>.
            </p>

            <div class="legal-contact-card">
                <div>
                    <h3 style="font-size: 1rem; font-weight: 700; margin: 0 0 0.25rem 0; color: var(--color-text-main);">Have questions regarding your privacy?</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-text-muted); margin: 0;">Our educational specialist team is available to assist parents and school administrators.</p>
                </div>
                <a href="mailto:admin@hestena62.com" class="legal-contact-btn">
                    <i class="fas fa-envelope"></i> Contact Privacy Officer
                </a>
            </div>
        </section>

        <!-- Key Points Summary Box -->
        <div class="legal-summary-box">
            <h3 class="legal-summary-title">
                <i class="fas fa-check-circle"></i> Summary of Key Privacy Commitments
            </h3>
            <ul class="legal-summary-list">
                <li class="legal-summary-item">
                    <i class="fas fa-shield-alt"></i>
                    <div><strong>Zero Advertising:</strong> No student data is ever sold or utilized for commercial ad targeting.</div>
                </li>
                <li class="legal-summary-item">
                    <i class="fas fa-shield-alt"></i>
                    <div><strong>Local-First Control:</strong> Study progress, streaks, and scores are stored on your device and can be wiped instantly.</div>
                </li>
                <li class="legal-summary-item">
                    <i class="fas fa-shield-alt"></i>
                    <div><strong>COPPA & FERPA Minded:</strong> Built specifically to protect underage learners and homeschool records.</div>
                </li>
            </ul>
        </div>
    </article>
</main>

<?php
include '../src/footer.php';
?>
