<?php
$pageTitle = '1984 Chapter 9 | Hesten\'s Learning';
$pageDescription = 'Chapter 9 of 1984 by George Orwell on Hesten\'s Learning e-library.';
$pageKeywords = '1984, George Orwell, chapter, ebook, online reader, accessible reading';
$pageAuthor = 'Hesten Allison';

include '../../../src/header.php';
?>

<link rel="stylesheet" href="/library/library.css">

<style>
  .reader-chapter-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin: 2.5rem auto 0 auto;
    max-width: 56rem;
    flex-wrap: wrap;
  }

  .reader-chapter-nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 1.5rem;
    border-radius: 9999px;
    background-color: var(--color-content-bg);
    border: 1px solid var(--color-border);
    color: var(--color-text-default);
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
  }

  .reader-chapter-nav-btn:hover:not(.disabled) {
    background-color: var(--color-primary);
    color: #ffffff;
    border-color: var(--color-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
  }

  .reader-chapter-nav-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .tooltip {
    position: relative;
    display: inline-block;
    cursor: help;
    border-bottom: 2px dotted var(--color-accent);
    color: var(--color-primary);
    font-weight: 600;
  }

  .tooltip .tooltiptext {
    visibility: hidden;
    width: 240px;
    background-color: var(--color-content-bg, #ffffff);
    color: var(--color-text-default);
    border: 1px solid var(--color-text-secondary);
    text-align: center;
    border-radius: 12px;
    padding: 12px;
    position: absolute;
    z-index: 100;
    bottom: 140%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s, transform 0.3s, bottom 0.3s;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    font-weight: 500;
    font-size: 0.95em;
    line-height: 1.4;
    pointer-events: auto;
  }

  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    bottom: 130%;
  }
</style>

<main id="main-content" class="library-main reader-main-layout">
    <div class="reader-back-nav">
        <a href="/library/read/reader.php?book=1984" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Book
        </a>
    </div>

    <article class="cdn-book-reader-container animate-reveal">
        <header class="reader-header">
            <span class="reader-meta-badge"><i class="fas fa-book-open"></i> CHAPTER VIEW</span>
            <h1 class="reader-title">1984 - Chapter 9</h1>
            <p class="reader-author">by George Orwell</p>
        </header>

        <div class="cdn-book-reader-content">
<p class="italic text-text-secondary text-center py-8">Chapter 9 is coming soon.</p>
        </div>

        <nav class="reader-chapter-nav" aria-label="Chapter navigation">
        <a href="/library/read/reader.php?book=1984&chapter=chapter-8" class="reader-chapter-nav-btn reader-chapter-nav-prev">
            <i class="fas fa-chevron-left"></i> Chapter 8
        </a>
        <a href="/library/read/reader.php?book=1984" class="reader-chapter-nav-btn" aria-label="Book contents">
            <i class="fas fa-list"></i> All Chapters
        </a>
        <a href="/library/read/reader.php?book=1984&chapter=chapter-10" class="reader-chapter-nav-btn reader-chapter-nav-next">
            Chapter 10 <i class="fas fa-chevron-right"></i>
        </a>
        </nav>
    </article>
</main>

<?php include '../../../src/footer.php'; ?>
