<?php
// --- Page Configuration ---
$pageTitle       = "Contact Us";
$pageDescription = "Get in touch with Hesten's Learning. We are here to help students, parents, and teachers.";
$pageKeywords    = "contact, support, help, email, education feedback";
$pageAuthor      = "Hesten's Learning";

// --- Form Processing Logic ---
$messageSent = false;
$errorMsg    = "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Simple Anti-Spam (Honey-pot)
    // If the hidden field 'website_check' is filled, it's a bot.
    if (! empty($_POST['website_check'])) {
        die(); // Stop execution silently
    }

    // 2. Sanitize Inputs
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // 3. Validation
    if (empty($name) || empty($email) || empty($message)) {
        $errorMsg = "Please fill in all required fields.";
    } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // 4. Send Email (Simulation)
        // In a real server environment, you would use:
        // mail("admin@hestena62.com", "New Message: $subject", $message, "From: $email");

        // For this demo, we set the success flag
        $messageSent = true;
    }
}

include 'src/header.php';
?>

<!-- Hero Section -->
<div class="page-hero">
    <!-- Animated Background -->
    <div class="page-hero-bg contact-bg-anim">
        <i class="fas fa-paper-plane contact-icon-1"></i>
        <i class="fas fa-envelope-open-text contact-icon-2"></i>
        <div class="contact-glow"></div>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            Get in Touch
        </span>
        <h1 class="page-hero-title">
            We'd Love to Hear from You
        </h1>
        <p class="page-hero-subtitle">
            Have a suggestion, a question about our curriculum, or just want to say hello? Drop us a line below.
        </p>
    </div>
</div>

<main class="contact-container" id="main-content">

    <div class="contact-grid">

        <!-- Contact Information Column -->
        <div class="contact-info-col">
            <div class="contact-info-card">
                <h2 class="contact-heading">Contact Information</h2>
                <p class="contact-paragraph">
                    We are a small, passionate team dedicated to accessible education. We try to respond to all
                    inquiries within 48 hours.
                </p>

                <div class="contact-info-list">
                    <!-- Email -->
                    <div class="contact-info-item">
                        <div class="contact-item-icon icon-email">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="contact-item-title">Email Us</h3>
                            <a href="mailto:admin@hestena62.com" class="contact-item-link">admin@hestena62.com</a>
                            <p class="contact-item-sub">Best for specific curriculum questions.</p>
                        </div>
                    </div>

                    <!-- Location (Generic) -->
                    <div class="contact-info-item">
                        <div class="contact-item-icon icon-location">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="contact-item-title">Location</h3>
                            <p class="contact-item-text">Based in the Cloud ☁️</p>
                            <p class="contact-item-sub">Serving students worldwide.</p>
                        </div>
                    </div>

                    <!-- Socials -->
                    <div class="contact-info-item">
                        <div class="contact-item-icon icon-social">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div>
                            <h3 class="contact-item-title">Follow Us</h3>
                            <div class="contact-social-links">
                                <a href="#" class="social-link" aria-label="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Teaser -->
            <div class="contact-faq-card">
                <h3 class="faq-card-title">Need a quick answer?</h3>
                <p class="faq-card-text">Check our Help Center for guides on accessibility and curriculum.</p>
                <a href="/help-center.php" class="faq-card-btn">
                    Visit Help Center
                </a>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div class="contact-form-col">
            <div class="contact-form-card">

                <?php if ($messageSent) : ?>
                    <!-- Success State -->
                    <div class="form-success-state">
                        <div class="success-icon-box">
                            <i class="fas fa-check"></i>
                        </div>
                        <h2 class="success-title">Message Sent!</h2>
                        <p class="success-text">Thank you for reaching out, <?php echo $name; ?>. We'll get back
                            to you at <strong><?php echo $email; ?></strong> shortly.</p>
                        <a href="/" class="success-home-btn">Return Home</a>
                    </div>
                <?php else : ?>
                    <!-- Form State -->
                    <h2 class="form-heading">Send us a Message</h2>

                    <?php if ($errorMsg) : ?>
                        <div class="form-error-alert" role="alert">
                            <p class="error-title">Oops!</p>
                            <p><?php echo $errorMsg; ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56" method="POST" class="contact-form"
                        novalidate>

                        <!-- Anti-Spam Honey Pot (Hidden) -->
                        <div class="form-hidden">
                            <label for="website_check">Leave this empty</label>
                            <input type="text" id="website_check" name="website_check">
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Your Name</label>
                            <div class="form-input-wrapper">
                                <div class="form-input-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input type="text" id="name" name="name" required class="form-input" placeholder="Jane Doe">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="form-input-wrapper">
                                <div class="form-input-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input type="email" id="email" name="email" required class="form-input" placeholder="jane@example.com">
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <div class="form-input-wrapper">
                                <div class="form-input-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <select id="subject" name="subject" class="form-select">
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Support Request">Support / Technical Issue</option>
                                    <option value="Feedback">Feedback or Suggestion</option>
                                    <option value="Partnership">Partnership Opportunity</option>
                                </select>
                                <div class="form-select-icon">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" rows="5" required class="form-textarea" placeholder="How can we help you today?"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="form-submit-btn">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include 'src/footer.php'; ?>