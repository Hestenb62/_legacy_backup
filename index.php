<?php
$pageTitle = "Hesten's Learning"; // SEO Title
include 'src/header.php';

// --- DATA: Client-Side Loading Migration ---
// Data is now loaded via <script src="assets/data/global-learningLevels.js"></script> below
// <script src="assets/js/curriculum-teks.js"></script>
?>

<!-- DATA IMPORT -->
<script src="<?= assetVersion('/assets/data/global-learningLevels.js') ?>"></script>
<script src="<?= assetVersion('/assets/js/standards-ccss-math-ela.js') ?>"></script>

<?php include __DIR__ . '/src/partials/hero.php'; ?>

<!-- MAIN CONTENT -->
<main class="main-content-container" id="main-content" tabindex="-1">

    <?php include __DIR__ . '/src/partials/resume-banner.php'; ?>
    <?php include __DIR__ . '/src/partials/learning-streak.php'; ?>

    <?php include __DIR__ . '/src/partials/academic-path-header.php'; ?>

    <?php include __DIR__ . '/src/partials/learning-grid.php'; ?>

    <?php include __DIR__ . '/src/partials/no-results.php'; ?>

    <?php include __DIR__ . '/src/partials/doc-modal.php'; ?>

</main>

<!-- PAGE SCRIPT -->
<script src="<?= assetVersion('/assets/js/index-main.js') ?>"></script>

<?php include __DIR__ . '/src/partials/migration-popup.php'; ?>

<?php include 'src/footer.php'; ?>
