<?php
/**
 * src/partials/sticky-reading-bar.php
 * Reusable, accessible Sticky Compact Reading & Lesson Progress Bar
 */
$barTitle = $pageTitle ?? ($bookTitle ?? 'Reading Document');
$barSubtitle = $chapterTitle ?? ($bookAuthor ?? '');
$barBackUrl = $backUrl ?? (isset($bookId) ? "/library/read/index.php?book=" . urlencode($bookId) : "/library/index.php");
?>
<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/components/sticky-reading-bar.css') : '/assets/css/components/sticky-reading-bar.css' ?>">

<aside id="sticky-reading-bar" class="sticky-reading-bar" aria-label="Reading progress bar" role="region">
    <div class="sticky-bar-inner">
        <!-- Left Title & Info -->
        <div class="sticky-bar-left">
            <a href="<?= htmlspecialchars($barBackUrl) ?>" class="sticky-bar-back-btn" title="Back to table of contents" aria-label="Back to table of contents">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
            </a>
            <div class="sticky-bar-info">
                <span class="sticky-bar-title"><?= htmlspecialchars($barTitle) ?></span>
                <?php if (!empty($barSubtitle)): ?>
                    <span class="sticky-bar-subtitle">
                        <span class="sticky-badge-pill"><i class="fas fa-book-open"></i> <?= htmlspecialchars($barSubtitle) ?></span>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Center Meta -->
        <div class="sticky-bar-meta">
            <div id="sticky-time-left" class="sticky-time-left">
                <i class="far fa-clock" aria-hidden="true"></i> <span>Calculating...</span>
            </div>
            <span id="sticky-pct-badge" class="sticky-pct-badge" aria-label="Scroll percentage">0%</span>
        </div>

        <!-- Right Quick Actions -->
        <div class="sticky-bar-actions">
            <button id="sticky-offline-toggle" class="sticky-action-btn" type="button" title="Save for Offline Station" aria-label="Save this material for offline access">
                <i class="fas fa-arrow-down" aria-hidden="true"></i>
            </button>
            <button id="sticky-zen-toggle" class="sticky-action-btn" type="button" title="Toggle Distraction-Free Zen Mode" aria-label="Toggle Zen Mode" aria-pressed="false">
                <i class="fas fa-expand" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <!-- Micro-Progress Line -->
    <div class="sticky-progress-line" aria-hidden="true">
        <div id="sticky-progress-fill" class="sticky-progress-fill"></div>
    </div>
</aside>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/offline-storage-manager.js') : '/assets/js/offline-storage-manager.js' ?>"></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/sticky-reading-bar.js') : '/assets/js/components/sticky-reading-bar.js' ?>" defer></script>
