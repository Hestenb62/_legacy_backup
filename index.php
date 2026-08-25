<?php
$verifyFile = __DIR__ . '/assets/verify.php';
$expectedHash = '258bca037e128c7e5e20159d9821df36e68e42cddd91127251214f26a80da6c5';

if (!file_exists($verifyFile) || strtolower(hash_file('sha256', $verifyFile)) !== $expectedHash) {
    http_response_code(403);
    die("Error: Integrity check failed. The verification file is missing or has been modified.");
}

$pageTitle = "Hesten's Learning"; // SEO Title
include 'src/header.php';

// --- DATA: Client-Side Loading Migration ---
// Data is now loaded via <script src="assets/data/global-learningLevels.js"></script> below
?>

<!-- DATA IMPORT -->
<script src="assets/data/global-learningLevels.js"></script>

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
<script src="assets/js/index-main.js?v=1.2"></script>

<?php include __DIR__ . '/src/partials/migration-popup.php'; ?>

<?php include 'src/footer.php'; ?>