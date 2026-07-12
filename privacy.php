<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "Privacy Policy - Hesten's Learning";
$pageDescription = "Privacy Policy for Hesten's Learning Platform.";
$pageKeywords    = "privacy policy, privacy, terms, terms of service";
$pageAuthor      = "Hesten Allison";

// Include the header file
include 'src/header.php';
?>

<!-- Hero Section -->
<div class="page-hero">
    <!-- Abstract Background Shapes -->
    <div class="page-hero-bg" style="opacity: 0.1;">
        <i class="fas fa-shield-alt" style="position: absolute; top: 2.5rem; left: 2.5rem; font-size: 8rem; color: rgba(255, 255, 255, 0.1);"></i>
        <i class="fas fa-lock" style="position: absolute; bottom: 5rem; right: 2.5rem; font-size: 12rem; color: rgba(255, 255, 255, 0.05); transform: rotate(12deg);"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            Legal
        </span>
        <h1 class="page-hero-title">
            Privacy Policy
        </h1>
        <p class="page-hero-subtitle">
            How we protect and handle your personal information.
        </p>
    </div>
</div>

<main class="page-content-wrapper" style="min-height: 70vh;">
    <div class="legal-content" style="padding: 1rem; display: flex; flex-direction: column; gap: 2.5rem;">
        <section>
            <h2 class="legal-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-secondary); border-bottom: 1px solid var(--color-border); padding-bottom: 0.25rem;">1. Information We Collect</h2>
            <p class="legal-text" style="color: var(--color-text-main); line-height: 2;">
                We collect information you provide directly to us when you create an account, update your profile, use the interactive features of our services, participate in assessments, request customer support, or otherwise communicate with us.
            </p>
        </section>

        <section>
            <h2 class="legal-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-secondary); border-bottom: 1px solid var(--color-border); padding-bottom: 0.25rem;">2. How We Use Information</h2>
            <p class="legal-text" style="color: var(--color-text-main); line-height: 2;">
                We use the information we collect to provide, maintain, and improve our services, such as to personalize your educational experience, process transactions, and send you related information including confirmations and support messages.
            </p>
        </section>

        <section>
            <h2 class="legal-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-secondary); border-bottom: 1px solid var(--color-border); padding-bottom: 0.25rem;">3. Information Sharing</h2>
            <p class="legal-text" style="color: var(--color-text-main); line-height: 2;">
                We do not share your personal information with third parties except as described in this privacy policy, such as with vendors, consultants, and other service providers who need access to such information to carry out work on our behalf.
            </p>
        </section>

        <section>
            <h2 class="legal-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-secondary); border-bottom: 1px solid var(--color-border); padding-bottom: 0.25rem;">4. Security</h2>
            <p class="legal-text" style="color: var(--color-text-main); line-height: 2;">
                We take reasonable measures to help protect information about you from loss, theft, misuse, and unauthorized access, disclosure, alteration, and destruction.
            </p>
        </section>

        <section>
            <h2 class="legal-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-secondary); border-bottom: 1px solid var(--color-border); padding-bottom: 0.25rem;">5. Contact Us</h2>
            <p class="legal-text" style="color: var(--color-text-main); line-height: 2;">
                If you have any questions about this Privacy Policy, please contact us at 
                <a href="mailto:admin@hestena62.com" style="color: var(--color-accent); font-weight: 500; text-decoration: none;">admin@hestena62.com</a>.
            </p>
        </section>
    </div>
</main>

<?php
include 'src/footer.php';
?>
