<?php
// --- Page Configuration ---
$pageTitle       = "Terms of Use | Hesten's Learning";
$pageDescription = "Read our Terms of Use regarding content sourcing, intellectual property, and academic integrity.";
$pageKeywords    = "terms of use, copyright, academic integrity, disclaimer, education terms";
$pageAuthor      = "Hesten's Learning";

include '../src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/legal.css') : '/assets/css/pages/legal.css' ?>">

<div class="page-hero">
    <div class="page-hero-bg">
        <i class="fas fa-balance-scale page-hero-bg-icon"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            <i class="fas fa-file-contract"></i> Academic Guidelines
        </span>
        <h1 class="page-hero-title">Terms of Use</h1>
        <p class="page-hero-subtitle">
            Ethical standards, content sourcing protocols, and platform usage expectations.
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
                <i class="fas fa-landmark"></i> Educational Fair Use
            </span>
        </div>

        <nav class="legal-switcher-tabs" aria-label="Legal document switcher">
            <a href="/pages/privacy.php" class="legal-switcher-link">
                <i class="fas fa-shield-alt"></i> Privacy Policy
            </a>
            <a href="/pages/terms-of-use.php" class="legal-switcher-link active" aria-current="page">
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
            <a href="#term-1" class="legal-nav-chip">1. Content Sourcing</a>
            <a href="#term-2" class="legal-nav-chip">2. Intellectual Property</a>
            <a href="#term-3" class="legal-nav-chip">3. Disclaimer of Liability</a>
            <a href="#term-4" class="legal-nav-chip">4. Academic Integrity</a>
            <a href="#term-5" class="legal-nav-chip">5. Corrections & Modifications</a>
            <a href="#term-6" class="legal-nav-chip">6. User Agreement</a>
            <a href="#term-7" class="legal-nav-chip">7. Terms Updates</a>
            <a href="#term-8" class="legal-nav-chip">8. Contact Info</a>
        </div>
    </nav>

    <!-- Main Legal Card -->
    <article class="legal-card" style="margin-top: 1.5rem;">
        <!-- Section 1 -->
        <section class="legal-section" id="term-1">
            <div class="legal-section-header">
                <span class="legal-section-num">1</span>
                <h2 class="legal-section-title">Content Sourcing and Usage</h2>
            </div>
            <p class="legal-text">
                Hesten's Learning utilizes a wide array of learning materials and resources, including educational texts, articles, illustrations, diagrams, literature archives, and interactive problem sets. These materials are sourced from reputable open-access academic repositories, public-domain archives, and freely accessible educational initiatives.
            </p>
            <p class="legal-text">
                We make a concerted effort to ensure that all content complies with international copyright frameworks, Creative Commons licenses, and educational fair-use principles. Our pedagogical team conducts routine verification of permissions associated with referenced works.
            </p>
        </section>

        <!-- Section 2 -->
        <section class="legal-section" id="term-2">
            <div class="legal-section-header">
                <span class="legal-section-num">2</span>
                <h2 class="legal-section-title">Intellectual Property and Copyright</h2>
            </div>
            <p class="legal-text">
                While we strive to maintain the highest standards of accuracy and licensing compliance, we acknowledge the potential for unforeseen errors. If you believe any content on Hesten's Learning infringes upon your copyright or intellectual property rights, please contact our administration promptly at <a href="mailto:admin@hestena62.com">admin@hestena62.com</a>.
            </p>
            <p class="legal-text">
                Please include specific details regarding the material in question, its URL location, and verified proof of rights ownership. We will promptly review your submission and take necessary actions, including immediate remediation or appropriate attribution.
            </p>
        </section>

        <!-- Section 3 -->
        <section class="legal-section" id="term-3">
            <div class="legal-section-header">
                <span class="legal-section-num">3</span>
                <h2 class="legal-section-title">Disclaimer of Liability</h2>
            </div>
            <p class="legal-text">
                All educational tools, diagnostic assessments, practice worksheets, and pacing guides provided by Hesten's Learning are intended solely for academic enrichment and instructional support.
            </p>
            <p class="legal-text">
                While we continuously verify curriculum accuracy against Common Core State Standards (CCSS) and Texas Essential Knowledge and Skills (TEKS), the platform is provided on an "as-is" basis. Hesten's Learning, its developers, and contributors shall not be held liable for any direct, indirect, or consequential outcomes resulting from the use or inability to use materials on this platform.
            </p>
        </section>

        <!-- Section 4 -->
        <section class="legal-section" id="term-4">
            <div class="legal-section-header">
                <span class="legal-section-num">4</span>
                <h2 class="legal-section-title">Academic Integrity</h2>
            </div>
            <p class="legal-text">
                Hesten's Learning is dedicated to fostering genuine scholarship, self-efficacy, and ethical behavior. We expect all students, tutors, and educators to adhere to the highest standards of academic honesty. This includes using our integrated citation generator (<a href="#term-8">APA, MLA, and Chicago</a>) to properly credit authors and refraining from plagiarism or unauthorized test assistance.
            </p>
        </section>

        <!-- Section 5 -->
        <section class="legal-section" id="term-5">
            <div class="legal-section-header">
                <span class="legal-section-num">5</span>
                <h2 class="legal-section-title">Corrections and Modifications</h2>
            </div>
            <p class="legal-text">
                In our commitment to providing accurate curriculum content, Hesten's Learning reserves the right to correct, update, or reorganize lesson slides, question stems, and standard alignments at any time. Learners and teachers are encouraged to submit bug reports or pedagogical suggestions via our feedback mechanisms.
            </p>
        </section>

        <!-- Section 6 -->
        <section class="legal-section" id="term-6">
            <div class="legal-section-header">
                <span class="legal-section-num">6</span>
                <h2 class="legal-section-title">User Agreement</h2>
            </div>
            <p class="legal-text">
                By accessing and using Hesten's Learning, you signify your affirmative acceptance of these Terms of Use and our companion Privacy Policy. If you do not agree with any provision herein, you must discontinue platform use.
            </p>
        </section>

        <!-- Section 7 -->
        <section class="legal-section" id="term-7">
            <div class="legal-section-header">
                <span class="legal-section-num">7</span>
                <h2 class="legal-section-title">Changes to Terms of Use</h2>
            </div>
            <p class="legal-text">
                We reserve the right to revise or modify these Terms of Use periodically. Substantive modifications will be indicated by updating the effective date at the top of this document. Continued engagement with the platform following posted updates constitutes acceptance of the modified terms.
            </p>
        </section>

        <!-- Section 8 -->
        <section class="legal-section" id="term-8">
            <div class="legal-section-header">
                <span class="legal-section-num">8</span>
                <h2 class="legal-section-title">Contact Information</h2>
            </div>
            <p class="legal-text">
                For questions, copyright notices, or licensing inquiries regarding these Terms of Use, please reach out directly:
            </p>

            <div class="legal-contact-card">
                <div>
                    <h3 style="font-size: 1rem; font-weight: 700; margin: 0 0 0.25rem 0; color: var(--color-text-main);">Educational & Licensing Support</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-text-muted); margin: 0;">Direct inquiries regarding curriculum licenses or student permissions.</p>
                </div>
                <a href="mailto:admin@hestena62.com" class="legal-contact-btn">
                    <i class="fas fa-envelope"></i> admin@hestena62.com
                </a>
            </div>
        </section>

        <!-- Key Changes Summary -->
        <div class="legal-summary-box">
            <h3 class="legal-summary-title">
                <i class="fas fa-check-circle"></i> Summary of Key Guidelines
            </h3>
            <ul class="legal-summary-list">
                <li class="legal-summary-item">
                    <i class="fas fa-check"></i>
                    <div><strong>Compliance:</strong> We uphold intellectual property rights and immediately review copyright inquiries.</div>
                </li>
                <li class="legal-summary-item">
                    <i class="fas fa-check"></i>
                    <div><strong>Educational Purpose:</strong> Materials and automated scoring are designed for enrichment and practice.</div>
                </li>
                <li class="legal-summary-item">
                    <i class="fas fa-check"></i>
                    <div><strong>Academic Honesty:</strong> Students are expected to cite resources properly and practice authentic learning.</div>
                </li>
                <li class="legal-summary-item">
                    <i class="fas fa-check"></i>
                    <div><strong>Iterative Updates:</strong> We continuously refine content for pedagogical accuracy without disruption.</div>
                </li>
            </ul>
        </div>
    </article>
</main>

<?php include '../src/footer.php'; ?>