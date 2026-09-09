<?php
// Set variables required by header.php
$pageTitle = "Adaptive Diagnostic & Growth Assessment - Hesten's Learning";
$pageDescription = "Standard-aligned adaptive diagnostic evaluation to pinpoint learning strengths, scaffold prerequisites, and generate a personalized remediation roadmap.";
$pageAuthor = "Hesten's Learning Team";

// Include header
include '../src/header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/diagnostic.css">

<div class="diagnostic-page-container">
    <!-- Test View -->
    <div id="diag-test-view">
        <div class="diag-header">
            <h1 class="diag-title">
                <i class="fas fa-brain" style="color: var(--color-primary);" aria-hidden="true"></i>
                <span>Adaptive Diagnostic Evaluation</span>
            </h1>
            <p class="diag-subtitle">
                This adaptive assessment tailors its difficulty to your responses in real time to pinpoint mastery levels and build your personalized learning prescription.
            </p>
        </div>

        <!-- Progress Bar -->
        <div class="diag-progress-bar-wrap">
            <div class="diag-progress-header">
                <span id="diag-progress-count">Question 1 of 6</span>
                <span><i class="fas fa-bolt" style="color: #f59e0b;"></i> +100 XP Completion Reward</span>
            </div>
            <div class="diag-progress-track">
                <div id="diag-progress-fill" class="diag-progress-fill" style="width: 0%;"></div>
            </div>
        </div>

        <!-- Question Card -->
        <div id="diag-question-card" class="diag-question-card">
            <!-- Rendered by JS -->
        </div>

        <!-- Navigation Footer -->
        <div class="diag-nav-footer">
            <button type="button" id="diag-next-btn" class="diag-next-btn" disabled>
                <span>Next Question</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <!-- Results & Prescription View -->
    <div id="diag-results-view" style="display: none;">
        <div id="diag-prescription-container">
            <!-- Rendered by JS on completion -->
        </div>
    </div>
</div>

<script src="<?= assetVersion('/assets/js/assessment/adaptive-diagnostic.js') ?>"></script>

<?php
// Include footer
include '../src/footer.php';
?>
