<?php
$pageTitle = "Hesten's Learning"; // SEO Title
include 'src/header.php';

// --- DATA: Client-Side Loading Migration ---
// Data is now loaded via <script src="assets/data/global-learningLevels.js"></script> below
// <script src="assets/js/curriculum-teks.js"></script>
?>

<!-- STYLES -->
<link rel="stylesheet" href="<?= assetVersion('/assets/css/components/learning-launchpad.css') ?>">
<link rel="stylesheet" href="<?= assetVersion('/assets/css/components/welcome-guide.css') ?>">
<link rel="stylesheet" href="<?= assetVersion('/assets/css/components/mastery-modals.css') ?>">

<!-- DATA IMPORT -->
<script src="<?= assetVersion('/assets/data/global-learningLevels.js') ?>"></script>
<script src="<?= assetVersion('/assets/js/standards-ccss-math-ela.js') ?>"></script>

<?php include __DIR__ . '/src/partials/hero.php'; ?>

<!-- MAIN CONTENT -->
<main class="main-content-container" id="main-content" tabindex="-1">

    <?php include __DIR__ . '/src/partials/learning-launchpad.php'; ?>
    <?php include __DIR__ . '/src/partials/resume-banner.php'; ?>
    <?php include __DIR__ . '/src/partials/welcome-guide.php'; ?>

    <?php include __DIR__ . '/src/partials/academic-path-header.php'; ?>

    <?php include __DIR__ . '/src/partials/learning-grid.php'; ?>

    <?php include __DIR__ . '/src/partials/no-results.php'; ?>

    <?php include __DIR__ . '/src/partials/doc-modal.php'; ?>
    <?php include __DIR__ . '/src/partials/mastery-modals.php'; ?>

</main>

<!-- PAGE SCRIPT -->
<script src="<?= assetVersion('/assets/js/index-main.js') ?>"></script>

<?php include 'src/footer.php'; ?>