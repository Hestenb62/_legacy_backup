<?php
$pageTitle = "Hesten's Learning"; // SEO Title
include 'src/header.php';

// --- DATA: Client-Side Loading Migration ---
// Data is now loaded via <script src="data/learningLevels.js"></script> below
?>

<!-- DATA IMPORT -->
<script src="data/learningLevels.js"></script>

<?php include __DIR__ . '/src/partials/hero.php'; ?>

<!-- MAIN CONTENT -->
<main class="main-content-container" id="main-content" tabindex="-1">

    <?php include __DIR__ . '/src/partials/resume-banner.php'; ?>

    <?php include __DIR__ . '/src/partials/academic-path-header.php'; ?>

    <?php include __DIR__ . '/src/partials/learning-grid.php'; ?>

    <?php include __DIR__ . '/src/partials/no-results.php'; ?>

    <?php include __DIR__ . '/src/partials/doc-modal.php'; ?>

</main>

<!-- PAGE SCRIPT -->
<script src="assets/js/index-page.js"></script>

<?php include 'src/footer.php'; ?>