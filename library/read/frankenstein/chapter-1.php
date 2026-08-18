<?php
$pageTitle = 'Frankenstein Chapter 1 | Hesten\'s Learning';
$pageDescription = 'Custom chapter page for Frankenstein Chapter 1.';
$pageKeywords = 'frankenstein, chapter 1, custom reader';
$pageAuthor = 'Hesten Allison';

include '../../../src/header.php';
?>

<link rel="stylesheet" href="/library/library.css">

<main id="main-content" class="library-main reader-main-layout">
    <div class="reader-back-nav">
        <a href="/library/read/index.php?book=frankenstein" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Book
        </a>
    </div>

    <article class="cdn-book-reader-container animate-reveal">
        <header class="reader-header">
            <span class="reader-meta-badge"><i class="fas fa-book-open"></i> CHAPTER VIEW</span>
            <h1 class="reader-title">Frankenstein - Chapter 1</h1>
            <p class="reader-author">Custom page scaffold</p>
        </header>

        <div class="cdn-book-reader-content">
            <p>This file is a standalone chapter page scaffold. Replace it with your lesson plan, sight words, discussion prompts, or custom chapter markup.</p>
        </div>
    </article>
</main>

<?php include '../../../src/footer.php'; ?>
