<?php
/**
 * reader_template.php - Modular Digital Reader Layout
 * Renders the reading layout with custom controls, themes, progress bar, TTS, and study guides.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(__DIR__)) . '/');
}

// Default fallbacks
if (!isset($bookId)) $bookId = 'default';
if (!isset($bookTitle)) $bookTitle = 'Untitled Book';
if (!isset($bookAuthor)) $bookAuthor = 'Unknown Author';
if (!isset($chapterNum)) $chapterNum = 1;
if (!isset($totalChapters)) $totalChapters = 1;
if (!isset($contentHtml)) $contentHtml = '<p>No content available.</p>';
if (!isset($isTeacherUnlocked)) $isTeacherUnlocked = false;
if (!isset($authError)) $authError = '';
if (!isset($quizQuestions)) $quizQuestions = [];

// Determine next/prev links
$prevChapterNum = $chapterNum - 1;
$nextChapterNum = $chapterNum + 1;
$hasPrev = $prevChapterNum >= 1;
$hasNext = $nextChapterNum <= $totalChapters;

$prevUrl = $hasPrev ? "/library/read/index.php?book=$bookId&chapter=chapter-$prevChapterNum" : "#";
$nextUrl = $hasNext ? "/library/read/index.php?book=$bookId&chapter=chapter-$nextChapterNum" : "#";

// Page Metadata for Header
$pageTitle = "$bookTitle - " . ($chapterNum === $totalChapters && $totalChapters > 1 && $isTeacherUnlocked ? "Teacher Resources" : "Chapter $chapterNum") . " | Hesten's Learning";
$pageDescription = "Read $bookTitle by $bookAuthor online at Hesten's Learning Library.";
$pageKeywords = "reading, ebook, online reader, accessible learning, education";
$pageAuthor = $bookAuthor;

include ABSPATH . 'src/header.php';
?>

<!-- Include Core Library and Reader Stylesheets -->
<link rel="stylesheet" href="/library/library.css">
<link rel="stylesheet" href="/library/read/reader.css">

<!-- Background Aurora Mesh -->
<div class="library-aurora-bg">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<!-- Scroll Progress Bar -->
<div id="progress-bar-container">
  <div id="progress-bar"></div>
</div>

<main id="main-content" class="reader-main-content">
  <div class="container" style="max-width: 800px; margin: 0 auto; padding: 2rem 1rem;">

    <!-- Back Navigation -->
    <div class="reader-back-nav" style="margin-bottom: 2rem;">
        <a href="/library/" class="controls-nav-btn" style="display: inline-flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-arrow-left"></i> Back to Library
        </a>
    </div>

    <!-- Title Header -->
    <header class="reader-page-header animate-reveal" style="text-align: center; margin-bottom: 3rem;">
      <div class="library-hero-badge">
        <span class="library-badge-dot"></span>
        <span class="library-badge-text"><i class="fas fa-book-open"></i> Reader Mode</span>
      </div>
      <h1 class="library-hero-title" style="font-size: clamp(2.5rem, 6vw, 4rem); line-height: 1.1; margin-bottom: 0.5rem; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary), var(--color-accent)); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
        <?php echo htmlspecialchars($bookTitle); ?>
      </h1>
      <p style="font-size: 1.25rem; font-weight: 700; color: var(--color-text-secondary); margin: 0;">by <?php echo htmlspecialchars($bookAuthor); ?></p>
    </header>

    <!-- Controls Bar -->
    <nav id="reader-controls">
      <!-- Left: Navigation (Prev / Chapter Label / Next) -->
      <div class="controls-nav-group">
        <a href="<?php echo $prevUrl; ?>" 
           id="prev-chapter" 
           class="controls-nav-btn <?php echo !$hasPrev ? 'disabled' : ''; ?>" 
           aria-label="Previous Chapter">
          <i class="fas fa-chevron-left"></i> Prev
        </a>
        <span id="current-chapter" style="font-weight: 700; font-size: 0.9rem; padding: 0 0.5rem;">
          <?php echo ($totalChapters > 1 && $chapterNum === $totalChapters) ? 'Teacher' : 'Ch ' . $chapterNum; ?>
        </span>
        <a href="<?php echo $nextUrl; ?>" 
           id="next-chapter" 
           class="controls-nav-btn <?php echo !$hasNext ? 'disabled' : ''; ?>" 
           aria-label="Next Chapter">
          Next <i class="fas fa-chevron-right"></i>
        </a>
      </div>

      <!-- Center: Text to Speech (TTS) Controls -->
      <div class="controls-speech-group">
        <button id="tts-speak-btn" class="speech-btn">
          <i class="fas fa-volume-up"></i> Listen
        </button>
        <button id="tts-stop-btn" class="speech-btn speech-btn-stop hidden">
          <i class="fas fa-stop"></i> Stop
        </button>
      </div>

      <!-- Right: Settings and Study Guides -->
      <div class="controls-tools-group">
        <button id="open-vocab-btn" class="tool-btn tool-btn-vocab" title="Study Guide">
          <i class="fas fa-graduation-cap"></i>
        </button>
        <button id="open-settings-btn" class="tool-btn tool-btn-settings" title="Typography Settings">
          <i class="fas fa-font"></i>
        </button>
        
        <?php if ($totalChapters > 1): ?>
          <button id="open-toc-modal" class="tool-btn tool-btn-toc" title="Table of Chapters">
            <i class="fas fa-list-ol"></i> Chapters
          </button>
        <?php endif; ?>

        <!-- Typography Settings Panel Dropdown -->
        <div id="settings-panel" class="hidden">
            <h4 class="settings-section-title">Font Family</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn active settings-font" data-font="font-sans">Sans</button>
                <button class="settings-row-btn settings-font font-serif" data-font="font-serif">Serif</button>
                <button class="settings-row-btn settings-font" data-font="font-dyslexic" style="font-family: 'OpenDyslexic', sans-serif;">Dyslexic</button>
            </div>
            
            <h4 class="settings-section-title">Text Size</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn settings-size" data-size="prose-base">A-</button>
                <button class="settings-row-btn active settings-size" data-size="prose-lg">Aa</button>
                <button class="settings-row-btn settings-size" data-size="prose-2xl">A+</button>
            </div>

            <h4 class="settings-section-title">Line Spacing</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn active settings-lineheight" data-lineheight="lh-normal">1.5x</button>
                <button class="settings-row-btn settings-lineheight" data-lineheight="lh-wide">1.8x</button>
                <button class="settings-row-btn settings-lineheight" data-lineheight="lh-extra">2.2x</button>
            </div>

            <h4 class="settings-section-title">Letter Spacing</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn active settings-letterspacing" data-letterspacing="ls-normal">Normal</button>
                <button class="settings-row-btn settings-letterspacing" data-letterspacing="ls-wide">Wide</button>
                <button class="settings-row-btn settings-letterspacing" data-letterspacing="ls-extra">Extra</button>
            </div>

            <h4 class="settings-section-title">Theme</h4>
            <div class="theme-dots-row">
                <button class="theme-dot-btn active dot-default settings-theme" data-theme="default" title="Light Theme"></button>
                <button class="theme-dot-btn dot-sepia settings-theme" data-theme="sepia" title="Sepia Theme"></button>
                <button class="theme-dot-btn dot-oled settings-theme" data-theme="dark" title="OLED Dark Theme"></button>
            </div>

            <h4 class="settings-section-title" style="margin-top: 1rem;">Speech Speed</h4>
            <div class="speech-speed-container" style="display: flex; align-items: center; justify-content: space-between; background-color: var(--color-base-bg); padding: 0.5rem 0.75rem; border-radius: 0.75rem; margin-top: 0.5rem;">
                <input type="range" id="tts-speed-slider" class="speech-speed-slider" min="0.5" max="2.0" step="0.1" value="1.0" style="flex: 1; margin-right: 0.75rem; height: 4px; accent-color: var(--color-primary); cursor: pointer;">
                <span id="tts-speed-val" style="font-size: 0.8rem; font-weight: 700; color: var(--color-text-default); min-width: 2.20rem; text-align: right;">1.0x</span>
            </div>
        </div>
      </div>
    </nav>

    <!-- Reading Content Container -->
    <article id="book-content" class="prose prose-lg dark:prose-invert max-w-none text-text-default">
      <?php if ($totalChapters > 1 && $chapterNum === $totalChapters && !$isTeacherUnlocked): ?>
        <!-- Teacher Resources Password Form -->
        <div class="bg-content-bg p-8 rounded-[2rem] border border-accent/20 shadow-2xl max-w-md mx-auto text-center" style="background: var(--color-content-bg); border: 1px solid var(--color-border); box-shadow: var(--shadow-xl);">
          <div class="modal-icon-circle circle-lock mx-auto mb-6" style="margin: 0 auto 1.5rem auto;">
            <i class="fas fa-lock" style="font-size: 1.5rem;"></i>
          </div>
          <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-default);">Authorized Access Only</h3>
          <p style="color: var(--color-text-secondary); font-size: 0.9rem; margin-bottom: 1.5rem;">What is Jenny's number?</p>
          <form method="POST" action="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-<?php echo $chapterNum; ?>">
            <input type="password" name="teacher_password" class="auth-input mb-4" placeholder="•••••••" required autofocus autocomplete="off">
            <?php if (!empty($authError)): ?>
              <p class="auth-error mb-4"><?php echo htmlspecialchars($authError); ?></p>
            <?php endif; ?>
            <div class="auth-actions">
              <a href="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-1" class="auth-btn auth-btn-cancel text-center" style="display:block; line-height:2.2rem; text-decoration:none;">Cancel</a>
              <button type="submit" class="auth-btn auth-btn-submit">Unlock</button>
            </div>
          </form>
        </div>
      <?php else: ?>
        <!-- Output Chapter Header and HTML content -->
        <div class="chapter-title text-3xl font-bold text-center mb-8 text-primary" style="font-size: 2rem; font-weight: 800; color: var(--color-primary); text-align: center; margin-bottom: 2rem;">
          <?php echo ($totalChapters > 1 && $chapterNum === $totalChapters) ? "Teacher Resources" : "Chapter " . $chapterNum; ?>
        </div>



        <?php echo $contentHtml; ?>
      <?php endif; ?>
    </article>

    <!-- Bottom Chapter Navigation -->
    <?php if ($totalChapters > 1): ?>
    <div class="reader-bottom-nav" style="margin-top: 3rem; display: flex; justify-content: space-between; align-items: center; padding-top: 1.5rem; border-top: 1px solid var(--color-border);">
        <a href="<?php echo $prevUrl; ?>" class="controls-nav-btn <?php echo !$hasPrev ? 'disabled' : ''; ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;">
            <i class="fas fa-chevron-left"></i> Previous Chapter
        </a>
        <span style="font-weight: 700; color: var(--color-text-secondary); font-size: 0.95rem;">
            <?php echo $chapterNum === $totalChapters ? 'Teacher Resources' : 'Chapter ' . $chapterNum . ' of ' . $totalChapters; ?>
        </span>
        <a href="<?php echo $nextUrl; ?>" class="controls-nav-btn <?php echo !$hasNext ? 'disabled' : ''; ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;">
            Next Chapter <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <?php endif; ?>

  </div>
</main>

<!-- Floating Highlight Actions Toolbar -->
<div id="highlight-toolbar" class="hidden">
    <button id="hl-btn-mark" class="hl-btn"><i class="fas fa-highlighter text-yellow-400"></i> Mark</button>
    <div class="hl-divider"></div>
    <button id="hl-btn-note" class="hl-btn"><i class="fas fa-sticky-note text-green-400"></i> Add Note</button>
    <div class="hl-divider"></div>
    <button id="hl-btn-copy" class="hl-btn"><i class="fas fa-copy text-blue-400"></i> Copy</button>
</div>

<!-- Back to Top Button -->
<button id="go-to-top-btn" aria-label="Go to top">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Table of Contents Modal Drawer -->
<?php if ($totalChapters > 1): ?>
<div id="toc-modal" role="dialog" aria-labelledby="toc-title">
  <div class="toc-content">
    <div class="toc-header">
      <h2 id="toc-title" style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-weight: 800; font-size: 1.5rem;">Table of Contents</h2>
      <button class="toc-close" id="close-toc-modal" aria-label="Close menu">&times;</button>
    </div>
    <div class="toc-grid">
      <?php for ($i = 1; $i < $totalChapters; $i++): ?>
        <a href="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-<?php echo $i; ?>" 
           class="toc-link <?php echo ($i === $chapterNum) ? 'active' : ''; ?>" 
           data-chapter="<?php echo $i; ?>">CH <?php echo $i; ?></a>
      <?php endfor; ?>
      <a href="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-<?php echo $totalChapters; ?>" 
         class="toc-link toc-teacher-btn <?php echo ($chapterNum === $totalChapters) ? 'active' : ''; ?>" 
         data-chapter="<?php echo $totalChapters; ?>">
        <i class="fas fa-chalkboard-teacher mr-2"></i> TEACHER RESOURCES
      </a>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- License & Sourcing Info Modal -->
<div id="license-modal" class="modal-overlay hidden" role="dialog" aria-labelledby="license-title">
  <div class="modal-card" style="max-width: 500px;">
    <div class="modal-card-header">
      <div class="modal-card-title">
        <div class="modal-icon-circle" style="background: var(--color-primary); color: white; display: flex; align-items: center; justify-content: center; width: 2rem; height: 2rem; border-radius: 50%;">
          <i class="fas fa-info-circle"></i>
        </div>
        <div style="text-align: left;">
          <h3 id="license-title" style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.25rem; font-weight: 800; margin: 0; color: var(--color-text-default);">Book License & Info</h3>
          <p style="color: var(--color-text-secondary); font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; margin: 0.25rem 0 0 0;">Metadata & Sourcing</p>
        </div>
      </div>
      <button id="close-license-modal" class="modal-card-close-btn" aria-label="Close licensing info">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="modal-body" style="padding: 1.5rem; text-align: left; color: var(--color-text-default); max-height: 70vh; overflow-y: auto;">
      <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; align-items: center;">
        <img src="<?php echo htmlspecialchars($book['img'] ?? ''); ?>" alt="<?php echo htmlspecialchars($bookTitle); ?>" style="width: 80px; height: auto; border-radius: 0.5rem; box-shadow: var(--shadow-md);">
        <div>
          <h4 style="margin: 0; font-size: 1.1rem; font-weight: 800;"><?php echo htmlspecialchars($bookTitle); ?></h4>
          <p style="margin: 0.25rem 0 0 0; color: var(--color-text-secondary); font-size: 0.9rem;">by <?php echo htmlspecialchars($bookAuthor); ?></p>
        </div>
      </div>
      
      <div style="margin-bottom: 1.25rem;">
        <strong style="display: block; font-size: 0.8rem; color: var(--color-text-secondary); text-transform: uppercase; margin-bottom: 0.25rem; font-weight: 800;">Source & License</strong>
        <p style="margin: 0; font-size: 0.95rem; line-height: 1.5; color: var(--color-text-default);">
          <?php 
            $discKey = $book['disclaimer-key'] ?? 'default';
            $discText = $book['disclaimer-text'] ?? '';
            
            $disclaimers = json_decode(file_get_contents(ABSPATH . 'library/disclaimers.json'), true) ?: [];
            if (!empty($discText)) {
                echo htmlspecialchars($discText);
            } elseif (isset($disclaimers[$discKey])) {
                echo htmlspecialchars($disclaimers[$discKey]);
            } else {
                echo htmlspecialchars($disclaimers['default'] ?? 'No license information is available for this book.');
            }
          ?>
        </p>
      </div>

      <?php if (!empty($book['isbn']) && $book['isbn'] !== '#'): ?>
      <div style="margin-bottom: 1.25rem;">
        <strong style="display: block; font-size: 0.8rem; color: var(--color-text-secondary); text-transform: uppercase; margin-bottom: 0.25rem; font-weight: 800;">ISBN</strong>
        <p style="margin: 0; font-size: 0.95rem; color: var(--color-text-default);"><?php echo htmlspecialchars($book['isbn']); ?></p>
      </div>
      <?php endif; ?>

      <?php if (!empty($book['date'])): ?>
      <div style="margin-bottom: 1.25rem;">
        <strong style="display: block; font-size: 0.8rem; color: var(--color-text-secondary); text-transform: uppercase; margin-bottom: 0.25rem; font-weight: 800;">Original Release / Publication Date</strong>
        <p style="margin: 0; font-size: 0.95rem; color: var(--color-text-default);"><?php echo htmlspecialchars($book['date']); ?></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Study Guide (Vocab, Flashcards, Quiz) Modal -->
<div id="vocab-modal" class="modal-overlay hidden">
  <div class="modal-card" style="max-width: 600px;">
    <div class="modal-card-header">
      <div class="modal-card-title">
        <div class="modal-icon-circle circle-vocab">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div style="text-align: left;">
          <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.25rem; font-weight: 800; margin: 0; color: var(--color-text-default);">Study Guide</h3>
          <p style="color: var(--color-text-secondary); font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; margin: 0.25rem 0 0 0;">Chapter Interactive tools</p>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <button id="download-vocab-btn" class="tooltip-btn" style="background: var(--color-secondary); padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 700; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.4rem;" title="Download word list as TXT">
          <i class="fas fa-download"></i> Download TXT
        </button>
        <button id="close-vocab-modal" class="modal-card-close-btn">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- Tabs Row -->
    <div class="vocab-tabs-row">
      <button class="vocab-tab-btn active" id="tab-vocab-list">Word List</button>
      <button class="vocab-tab-btn" id="tab-vocab-flash">Flashcards</button>
      <button class="vocab-tab-btn" id="tab-quiz">Quiz</button>
    </div>

    <!-- Word List View -->
    <div id="vocab-list-container" class="vocab-list">
      <!-- Injected by reader.js -->
    </div>

    <!-- Flashcards View -->
    <div id="vocab-flash-container" class="vocab-list" style="text-align: center; display: none; flex-direction: column;">
      <div class="flashcard-wrap">
        <div class="flashcard" id="vocab-flashcard">
          <div class="flashcard-face flashcard-front">
            <h3 id="flashcard-front-word">Word</h3>
            <p><i class="fas fa-sync-alt"></i> Click to flip</p>
          </div>
          <div class="flashcard-face flashcard-back">
            <p id="flashcard-back-definition">Definition goes here...</p>
          </div>
        </div>
      </div>
      <div class="flashcard-nav">
        <button id="flashcard-prev-btn" class="tooltip-btn" style="padding: 0.5rem 1rem;"><i class="fas fa-chevron-left"></i> Prev</button>
        <span id="flashcard-counter" style="font-weight: 700; color: var(--color-text-secondary);">1 of 5</span>
        <button id="flashcard-next-btn" class="tooltip-btn" style="padding: 0.5rem 1rem;">Next <i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
 
    <!-- Quiz View -->
    <div id="quiz-container" class="quiz-container" style="display: none; flex-direction: column;">
      <!-- Injected by reader.js -->
    </div>
  </div>
</div>

<!-- Send metadata to window context -->
<script>
window.BOOK_METADATA = {
    id: <?php echo json_encode($bookId); ?>,
    title: <?php echo json_encode($bookTitle); ?>,
    chapterNum: <?php echo json_encode($chapterNum); ?>
};
window.BOOK_QUIZ_QUESTIONS = <?php echo json_encode($quizQuestions); ?>;
window.BOOK_JSON_VOCAB = <?php echo json_encode($vocabList); ?>;
</script>

<script src="/library/read/reader.js" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>
