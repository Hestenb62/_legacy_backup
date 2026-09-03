<?php
// src/layouts/main.php

$manifestPath = __DIR__ . '/../../dist/.vite/manifest.json';
$viteJs = '';
$viteCss = '';

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    if (isset($manifest['index-js'])) {
        $viteJs = '/dist/' . $manifest['index-js']['file'];
    }
    if (isset($manifest['index-css'])) {
        $viteCss = '/dist/' . $manifest['index-css']['file'];
    }
}

if (!isset($pageTitle)) {
    $pageTitle = "Hesten's Learning";
}
?>

<?php include __DIR__ . '/../header.php'; ?>

<!-- Inject Vite CSS to override/supplement the global styles -->
<?php if ($viteCss): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($viteCss); ?>">
<?php endif; ?>

<!-- Main Page Content -->
<?php echo $content ?? ''; ?>

<!-- Inject Vite JS -->
<?php if ($viteJs): ?>
    <script type="module" src="<?php echo htmlspecialchars($viteJs); ?>"></script>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>
