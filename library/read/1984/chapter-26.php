<?php
$pageTitle = '1984 Teacher Resources | Hesten\'s Learning';
$pageDescription = 'Teacher Resources of 1984 by George Orwell on Hesten\'s Learning e-library.';
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
        <a href="index.php?book=1984" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Book
        </a>
    </div>

    <article class="cdn-book-reader-container animate-reveal">
        <header class="reader-header">
            <span class="reader-meta-badge"><i class="fas fa-book-open"></i> TEACHER RESOURCES</span>
            <h1 class="reader-title">1984 - Teacher Resources</h1>
            <p class="reader-author">by George Orwell</p>
        </header>

        <div class="cdn-book-reader-content">
          <div class="max-w-4xl mx-auto pb-12">
                    <p class="text-text-secondary text-center mb-10 text-lg">I am only testing this section out with this book. If
                      you like the resources here, please let me know and I will add more to the other books.</p>
          
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                      <!-- Lesson Plans -->
                      <div
                        class="bg-content-bg p-8 rounded-[2rem] border border-accent/20 shadow-2xl transition-all group hover:border-accent">
                        <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                          <i class="fas fa-file-invoice-dollar text-accent text-xl"></i>
                        </div>
                        <h3 class="settings-section-title">Lesson Plans</h3>
                        <ul class="space-y-4">
                          <li
                            class="flex items-center gap-3 text-text-secondary hover:text-primary transition-colors cursor-pointer">
                            <i class="fas fa-file-pdf text-red-500"></i>
                            <span class="font-medium text-sm">Unit Overview: The Architecture of Control</span>
                          </li>
                          <li
                            class="flex items-center gap-3 text-text-secondary hover:text-primary transition-colors cursor-pointer">
                            <i class="fas fa-file-word text-blue-500"></i>
                            <span class="font-medium text-sm">Daily Plan: Psychological Manipulation</span>
                          </li>
                        </ul>
                      </div>
          
                      <!-- Discussion Prompts -->
                      <div
                        class="bg-content-bg p-8 rounded-[2rem] border border-primary/20 shadow-2xl transition-all group hover:border-primary">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-6">
                          <i class="fas fa-comments text-primary text-xl"></i>
                        </div>
                        <h3 class="settings-section-title">Socratic Discussion</h3>
                        <p class="text-text-secondary text-sm mb-6 italic leading-relaxed">"Can a person truly 'think' or 'rebel'
                          if the language for such concepts has been erased?"</p>
                        <div class="flex flex-wrap gap-2">
                          <span
                            class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg uppercase tracking-wider">Critical
                            Thinking</span>
                        </div>
                      </div>
          
                      <!-- Activities -->
                      <div
                        class="bg-content-bg p-8 rounded-[2rem] border border-secondary/20 shadow-2xl transition-all group hover:border-secondary">
                        <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center mb-6">
                          <i class="fas fa-gamepad text-secondary text-xl"></i>
                        </div>
                        <h3 class="settings-section-title">Classroom Activities</h3>
                        <p class="text-text-secondary text-sm leading-relaxed mb-4">Interactive exercises including "The Two
                          Minute Hate" roleplay workshops.</p>
                      </div>
          
                      <!-- Assessments -->
                      <div
                        class="bg-content-bg p-8 rounded-[2rem] border border-emerald-500/20 shadow-2xl transition-all group hover:border-emerald-500">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-6">
                          <i class="fas fa-spell-check text-emerald-500 text-xl"></i>
                        </div>
                        <h3 class="settings-section-title">Assessments</h3>
                        <div class="space-y-3">
                          <div
                            class="flex justify-between items-center p-3 bg-emerald-500/5 rounded-xl border border-emerald-500/10">
                            <span class="text-sm font-semibold text-text-default">Vocabulary Quiz</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          
            </div>
            </article>
            
              </article>
</div>
              <h3 class="settings-section-title">Lesson Plans</h3>
              <ul class="space-y-4">
                <li
                  class="flex items-center gap-3 text-text-secondary hover:text-primary transition-colors cursor-pointer">
                  <i class="fas fa-file-pdf text-red-500"></i>
                  <span class="font-medium text-sm">Unit Overview: The Architecture of Control</span>
                </li>
                <li
                  class="flex items-center gap-3 text-text-secondary hover:text-primary transition-colors cursor-pointer">
                  <i class="fas fa-file-word text-blue-500"></i>
                  <span class="font-medium text-sm">Daily Plan: Psychological Manipulation</span>
                </li>
              </ul>
            </div>

            <!-- Discussion Prompts -->
            <div
              class="bg-content-bg p-8 rounded-[2rem] border border-primary/20 shadow-2xl transition-all group hover:border-primary">
              <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-6">
                <i class="fas fa-comments text-primary text-xl"></i>
              </div>
              <h3 class="settings-section-title">Socratic Discussion</h3>
              <p class="text-text-secondary text-sm mb-6 italic leading-relaxed">"Can a person truly 'think' or 'rebel'
                if the language for such concepts has been erased?"</p>
              <div class="flex flex-wrap gap-2">
                <span
                  class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg uppercase tracking-wider">Critical
                  Thinking</span>
              </div>
            </div>

            <!-- Activities -->
            <div
              class="bg-content-bg p-8 rounded-[2rem] border border-secondary/20 shadow-2xl transition-all group hover:border-secondary">
              <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center mb-6">
                <i class="fas fa-gamepad text-secondary text-xl"></i>
              </div>
              <h3 class="settings-section-title">Classroom Activities</h3>
              <p class="text-text-secondary text-sm leading-relaxed mb-4">Interactive exercises including "The Two
                Minute Hate" roleplay workshops.</p>
            </div>

            <!-- Assessments -->
            <div
              class="bg-content-bg p-8 rounded-[2rem] border border-emerald-500/20 shadow-2xl transition-all group hover:border-emerald-500">
              <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-6">
                <i class="fas fa-spell-check text-emerald-500 text-xl"></i>
              </div>
              <h3 class="settings-section-title">Assessments</h3>
              <div class="space-y-3">
                <div
                  class="flex justify-between items-center p-3 bg-emerald-500/5 rounded-xl border border-emerald-500/10">
                  <span class="text-sm font-semibold text-text-default">Vocabulary Quiz</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        <nav class="reader-chapter-nav" aria-label="Chapter navigation">
        <a href="index.php?book=1984&chapter=chapter-25" class="reader-chapter-nav-btn reader-chapter-nav-prev">
            <i class="fas fa-chevron-left"></i> Chapter 25
        </a>
        <a href="index.php?book=1984" class="reader-chapter-nav-btn" aria-label="Book contents">
            <i class="fas fa-list"></i> All Chapters
        </a>
        <span class="reader-chapter-nav-btn reader-chapter-nav-next disabled" aria-disabled="true">
            End of Book <i class="fas fa-chevron-right"></i>
        </span>
        </nav>
    </article>
</main>

<?php include '../../../src/footer.php'; ?>

