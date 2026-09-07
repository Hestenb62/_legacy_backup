<?php
// src/layouts/lesson-layout.php

// Ensure variables are defined
$pageTitle = $pageTitle ?? "Hesten's Learning";
$pageDescription = $pageDescription ?? "";
$pageAuthor = $pageAuthor ?? "Hesten's Learning Team";

// Render Header
include __DIR__ . '/../header.php';
?>

<!-- Include optional custom CSS for the lesson -->
<?php if (isset($lessonCssUrl)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($lessonCssUrl) ?>">
<?php endif; ?>

<!-- Default Breadcrumbs and Wrapper if standardLayout is true -->
<?php if ($useStandardLayout ?? true): ?>
    <div class="bg-gray-50 dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 py-4 transition-colors">
        <div class="page-content-wrapper" style="padding-left: 2rem; padding-right: 2rem;">
            <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                <a href="../index.php" class="hover:text-rose-600 transition-colors">Home</a>
                <i class="fas fa-chevron-right text-[8px] opacity-30"></i>
                <a href="<?= htmlspecialchars($levelUrl ?? '#') ?>" class="hover:text-rose-600 transition-colors">Level <?= htmlspecialchars(strtoupper($levelId ?? '')) ?></a>
                <i class="fas fa-chevron-right text-[8px] opacity-30"></i>
                <span class="text-gray-900 dark:text-white">Lesson <?= htmlspecialchars($lessonCode ?? '') ?></span>
            </nav>
        </div>
    </div>
<?php endif; ?>

<!-- Render unique lesson content -->
<?= $lessonHtmlContent ?? '' ?>

<?php
// Render Lesson Runner & Footer
include __DIR__ . '/../lesson_runner.php';
include __DIR__ . '/../footer.php';
?>
