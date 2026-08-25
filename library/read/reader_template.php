<?php
/**
 * library/read/reader_template.php - Unified Digital Reader Template
 * Implements distraction-free editorial reading, customizable typography,
 * Text-to-Speech narration, chapter TOC drawer, vocabulary flashcards,
 * comprehension quizzes, persistent annotations, and academic citations.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(__DIR__)) . '/');
}

// Default fallbacks
if (!isset($bookId)) $bookId = 'default';
if (!isset($bookTitle)) $bookTitle = 'Untitled Book';
if (!isset($bookAuthor)) $bookAuthor = 'Unknown Author';
if (!isset($chapter)) $chapter = 'chapter-1';
if (!isset($chapterNum)) $chapterNum = 1;
if (!isset($totalChapters)) $totalChapters = 1;
if (!isset($contentHtml)) $contentHtml = '<p>No content available.</p>';
if (!isset($isTeacherUnlocked)) $isTeacherUnlocked = false;
if (!isset($authError)) $authError = '';
if (!isset($quizQuestions)) $quizQuestions = [];
if (!isset($vocabList)) $vocabList = [];
if (!isset($bookToc)) $bookToc = [];
if (!isset($book) || !is_array($book)) $book = [];

// Determine navigation URLs
$prevChapterNum = $chapterNum - 1;
$nextChapterNum = $chapterNum + 1;
$hasPrev = $prevChapterNum >= 1;
$hasNext = $nextChapterNum <= $totalChapters;

$prevUrl = $hasPrev ? "/library/read/index.php?book=" . urlencode($bookId) . "&chapter=chapter-$prevChapterNum" : "#";
$nextUrl = $hasNext ? "/library/read/index.php?book=" . urlencode($bookId) . "&chapter=chapter-$nextChapterNum" : "#";

// Get active chapter title from TOC if available
$currentChapterTitle = "Chapter $chapterNum";
if ($chapter === 'intro') {
    $currentChapterTitle = "Author Introduction";
} elseif (!empty($bookToc) && isset($bookToc[(string)$chapterNum]['title'])) {
    $currentChapterTitle = $bookToc[(string)$chapterNum]['title'];
}

// Page Metadata
$pageTitle = "$bookTitle - " . ($chapter === 'intro' ? "Intro" : ($chapterNum === $totalChapters && $totalChapters > 1 && !empty($book['hasTeacherResources']) ? "Teacher Resources" : "Chapter $chapterNum")) . " | Hesten's Learning Library";
$pageDescription = "Read $bookTitle by $bookAuthor online with audio narration, study guides, and vocabulary flashcards.";

include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="/assets/css/reader-main.css">

<!-- Reading Progress Bar -->
<div id="progress-bar-container" aria-hidden="true">
    <div id="progress-bar"></div>
</div>

<main id="main-content" class="library-main reader-main-layout">

    <!-- Top Navigation Bar -->
    <div class="reader-back-nav">
        <a href="/library/" class="reader-back-btn" title="Return to Digital Library Catalog">
            <i class="fas fa-arrow-left"></i> <span>Catalog</span>
        </a>
        <div class="reader-title-badge">
            <span class="reader-book-name"><?php echo htmlspecialchars($bookTitle); ?></span>
            <span class="reader-sep">&bull;</span>
            <span class="reader-ch-name"><?php echo htmlspecialchars($currentChapterTitle); ?></span>
        </div>
        <button type="button" class="reader-license-btn" onclick="openLicenseModal()" title="View Book License & Sourcing">
            <i class="fas fa-info-circle"></i>
        </button>
    </div>

    <!-- Book Title Header (Displayed on Chapter 1 and Intro) -->
    <?php if ($chapterNum <= 1): ?>
        <header class="reader-hero-header animate-reveal">
            <h1 class="reader-main-title">
                <?php echo htmlspecialchars($bookTitle); ?>
            </h1>
            <p class="reader-main-author">by <?php echo htmlspecialchars($bookAuthor); ?></p>
        </header>
    <?php endif; ?>

    <!-- Author Pre-Read Introduction Card -->
    <?php if ($chapter === 'intro'): ?>
        <section class="author-intro-card animate-reveal">
            <div class="intro-header-row">
                <div class="intro-icon-circle">
                    <i class="fas fa-feather-alt"></i>
                </div>
                <div>
                    <h2 class="intro-card-title">About the Author & Context</h2>
                    <p class="intro-card-author"><?php echo htmlspecialchars($bookAuthor); ?></p>
                </div>
            </div>

            <div class="intro-body-grid">
                <?php if (!empty($book['authorBio'])): ?>
                    <div class="intro-block">
                        <h3><i class="fas fa-user-circle"></i> Author Background</h3>
                        <p><?php echo htmlspecialchars($book['authorBio']); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($book['introWhy'])): ?>
                    <div class="intro-block">
                        <h3><i class="fas fa-lightbulb"></i> Purpose & Historical Context</h3>
                        <p><?php echo htmlspecialchars($book['introWhy']); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($book['introHow'])): ?>
                    <div class="intro-block">
                        <h3><i class="fas fa-pen-nib"></i> Composition & Method</h3>
                        <p><?php echo htmlspecialchars($book['introHow']); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($book['introWhat'])): ?>
                    <div class="intro-block">
                        <h3><i class="fas fa-compass"></i> Themes Explored</h3>
                        <p><?php echo htmlspecialchars($book['introWhat']); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="intro-cta-wrap">
                <a href="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-1" class="intro-start-btn">
                    <span>Start Reading (Chapter 1)</span> <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($chapter !== 'intro'): ?>
        <!-- Reader Controls Bar -->
        <nav id="reader-controls" aria-label="Reading Controls">
            <!-- Left: Navigation (Prev / Chapter Indicator / Next) -->
            <div class="controls-nav-group">
                <a href="<?php echo $prevUrl; ?>" 
                   id="prev-chapter" 
                   class="controls-nav-btn <?php echo !$hasPrev ? 'disabled' : ''; ?>" 
                   aria-label="Previous Chapter"
                   title="Previous Chapter">
                    <i class="fas fa-chevron-left"></i> <span>Prev</span>
                </a>
                
                <span id="current-chapter" class="controls-chapter-label" title="<?php echo htmlspecialchars($currentChapterTitle); ?>">
                    <?php echo ($totalChapters > 1 && $chapterNum === $totalChapters && !empty($book['hasTeacherResources'])) ? 'Teacher Resources' : 'Ch ' . $chapterNum; ?>
                </span>
                
                <a href="<?php echo $nextUrl; ?>" 
                   id="next-chapter" 
                   class="controls-nav-btn <?php echo !$hasNext ? 'disabled' : ''; ?>" 
                   aria-label="Next Chapter"
                   title="Next Chapter">
                    <span>Next</span> <i class="fas fa-chevron-right"></i>
                </a>
            </div>

            <!-- Center: Text to Speech (TTS) Controls -->
            <div class="controls-speech-group">
                <button type="button" id="tts-speak-btn" class="speech-btn" title="Listen Aloud with Voice Narration" aria-label="Listen to chapter">
                    <i class="fas fa-volume-up"></i> <span>Listen</span>
                </button>
                <button type="button" id="tts-stop-btn" class="speech-btn speech-btn-stop hidden" title="Stop Voice Narration" aria-label="Stop narration">
                    <i class="fas fa-stop"></i> <span>Stop</span>
                </button>
            </div>

            <!-- Right: Study Tools & Customization Settings -->
            <div class="controls-tools-group">
                <!-- Book Page Flip / Scroll View Mode Switcher -->
                <button type="button" id="toggle-view-mode-btn" class="tool-btn tool-btn-view-mode" title="Toggle Page Flip / Scroll View" aria-label="Toggle Reading Layout">
                    <i class="fas fa-book-open"></i>
                </button>

                <!-- Citation Generator -->
                <button type="button" id="open-citation-btn" class="tool-btn" title="Generate Academic Citation" onclick="openChapterCitationModal()" aria-label="Generate Citation">
                    <i class="fas fa-quote-right"></i>
                </button>

                <!-- Study Suite (Vocab, Flashcards, Quizzes, Notes) -->
                <button type="button" id="open-vocab-btn" class="tool-btn tool-btn-vocab" title="Study Guide, Flashcards & Comprehension Quizzes" aria-label="Open Study Guide">
                    <i class="fas fa-graduation-cap"></i>
                </button>

                <!-- Typography & Themes Panel Toggle -->
                <button type="button" id="open-settings-btn" class="tool-btn tool-btn-settings" title="Typography, Font & Theme Settings" aria-label="Open Reader Settings">
                    <i class="fas fa-font"></i>
                </button>

                <!-- Table of Contents Modal Trigger -->
                <?php if ($totalChapters > 1): ?>
                    <button type="button" id="open-toc-modal" class="tool-btn tool-btn-toc" title="Table of Contents" aria-label="Open Table of Contents">
                        <i class="fas fa-list-ol"></i> <span>TOC</span>
                    </button>
                <?php endif; ?>

                <!-- Typography Dropdown Panel -->
                <div id="settings-panel" class="settings-dropdown hidden" role="region" aria-label="Reader Customization Panel">
                    <h4 class="settings-section-title">Reading Mode</h4>
                    <div class="settings-btn-row">
                        <button type="button" class="settings-row-btn active settings-mode" data-mode="book"><i class="fas fa-book-open"></i> Page Flip</button>
                        <button type="button" class="settings-row-btn settings-mode" data-mode="scroll"><i class="fas fa-scroll"></i> Scroll</button>
                    </div>

                    <h4 class="settings-section-title">Font Family</h4>
                    <div class="settings-btn-row">
                        <button type="button" class="settings-row-btn active settings-font" data-font="font-sans">Sans</button>
                        <button type="button" class="settings-row-btn settings-font" data-font="font-serif">Serif</button>
                        <button type="button" class="settings-row-btn settings-font" data-font="font-dyslexic" title="OpenDyslexic Font">Dyslexia</button>
                    </div>

                    <h4 class="settings-section-title">Font Size</h4>
                    <div class="settings-btn-row">
                        <button type="button" class="settings-row-btn settings-size" data-size="prose-base">Small</button>
                        <button type="button" class="settings-row-btn active settings-size" data-size="prose-lg">Normal</button>
                        <button type="button" class="settings-row-btn settings-size" data-size="prose-2xl">Large</button>
                    </div>

                    <h4 class="settings-section-title">Line Spacing</h4>
                    <div class="settings-btn-row">
                        <button type="button" class="settings-row-btn settings-lh" data-lh="lh-normal">Tight</button>
                        <button type="button" class="settings-row-btn active settings-lh" data-lh="lh-wide">Relaxed</button>
                        <button type="button" class="settings-row-btn settings-lh" data-lh="lh-extra">Loose</button>
                    </div>

                    <h4 class="settings-section-title">Reading Theme</h4>
                    <div class="settings-btn-row">
                        <button type="button" class="settings-row-btn settings-theme active" data-theme="theme-light">Light</button>
                        <button type="button" class="settings-row-btn settings-theme" data-theme="theme-sepia">Sepia</button>
                        <button type="button" class="settings-row-btn settings-theme" data-theme="theme-dark">Dark</button>
                        <button type="button" class="settings-row-btn settings-theme" data-theme="theme-midnight">Midnight</button>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <!-- Single-Page Book Stage Wrapper -->
    <div id="book-stage" class="single-book-stage">
        <!-- Floating Side Page Turn Buttons -->
        <button type="button" id="book-page-prev-btn" class="book-page-arrow prev-arrow" title="Previous Page (Left Arrow)" aria-label="Previous Page">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button type="button" id="book-page-next-btn" class="book-page-arrow next-arrow" title="Next Page (Right Arrow)" aria-label="Next Page">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Single Book Page Frame -->
        <div id="book-frame" class="single-book-frame">
            <!-- Top Running Book Header -->
            <div class="book-running-header">
                <span class="book-header-title"><?php echo htmlspecialchars($bookTitle); ?></span>
                <span class="book-header-dot">&bull;</span>
                <span class="book-header-chapter"><?php echo htmlspecialchars($currentChapterTitle); ?></span>
            </div>

            <!-- Multi-Column Paginated Content Viewport -->
            <div id="book-page-viewport" class="book-page-viewport">
                <!-- Main Reader Reading Container -->
                <article id="book-content" class="reader-main-content font-sans prose-lg lh-wide">
                    <?php if (!empty($book['hasTeacherResources']) && $chapterNum === $totalChapters && $totalChapters > 1 && !$isTeacherUnlocked): ?>
                        <!-- Protected Teacher Resources Screen -->
                        <div class="teacher-gate-card">
                            <div class="teacher-icon-circle">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h2 class="teacher-gate-title">Teacher Resources Protected</h2>
                            <p class="teacher-gate-desc">This section contains educator answer keys, curriculum alignments, and discussion guides. Please enter the teacher PIN to unlock.</p>
                            
                            <?php if ($authError): ?>
                                <div class="teacher-auth-error">
                                    <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($authError); ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-<?php echo $totalChapters; ?>" class="teacher-auth-form">
                                <input type="password" name="teacher_password" placeholder="Enter Teacher PIN..." class="teacher-pin-input" autofocus required autocomplete="off">
                                <button type="submit" class="teacher-submit-btn">Unlock Resources</button>
                            </form>
                        </div>
                    <?php else: ?>
                        <?php echo $contentHtml; ?>
                    <?php endif; ?>
                </article>
            </div>

            <!-- Bottom Running Book Footer with Page Numbers, Reading Time, and Scrubber -->
            <div class="book-running-footer">
                <div class="book-footer-left">
                    <span id="book-page-indicator" class="book-page-pill"><i class="fas fa-file-alt"></i> Page 1 of 1</span>
                </div>
                <div class="book-footer-center">
                    <div id="book-scrubber-track" class="book-scrubber-track" title="Slide to jump to page">
                        <div id="book-scrubber-fill" class="book-scrubber-fill"></div>
                    </div>
                </div>
                <div class="book-footer-right">
                    <span id="book-reading-time-pill" class="book-reading-time-pill" title="Estimated reading time remaining"><i class="fas fa-clock"></i> ~1 min left</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Pagination Nav -->
    <?php if ($chapter !== 'intro' && $totalChapters > 1): ?>
        <footer class="reader-bottom-nav">
            <?php if ($hasPrev): ?>
                <a href="<?php echo $prevUrl; ?>" class="reader-bottom-nav-btn prev-btn">
                    <i class="fas fa-arrow-left"></i> <span>Previous Chapter</span>
                </a>
            <?php else: ?>
                <div></div>
            <?php endif; ?>

            <?php if ($hasNext): ?>
                <a href="<?php echo $nextUrl; ?>" class="reader-bottom-nav-btn next-btn">
                    <span>Next Chapter</span> <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </footer>
    <?php endif; ?>

</main>

<!-- Inline Highlighting & Annotation Floating Toolbar -->
<div id="highlight-toolbar" class="highlight-toolbar hidden" role="toolbar" aria-label="Text Highlight Tools">
    <div class="hl-colors-group">
        <button type="button" id="hl-color-yellow" class="hl-color-btn hl-yellow" title="Highlight Yellow" aria-label="Highlight Yellow"></button>
        <button type="button" id="hl-color-pink" class="hl-color-btn hl-pink" title="Highlight Pink" aria-label="Highlight Pink"></button>
        <button type="button" id="hl-color-green" class="hl-color-btn hl-green" title="Highlight Green" aria-label="Highlight Green"></button>
    </div>
    <div class="hl-sep"></div>
    <button type="button" id="hl-btn-note" class="hl-action-btn" title="Add Study Note" aria-label="Add Study Note">
        <i class="fas fa-sticky-note"></i> <span>Note</span>
    </button>
    <button type="button" id="hl-btn-copy" class="hl-action-btn" title="Copy Quote" aria-label="Copy Quote">
        <i class="fas fa-copy"></i> <span>Copy</span>
    </button>
</div>

<!-- Study Guide, Flashcards & Quiz Modal Drawer -->
<div id="vocab-modal" class="modal-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="vocab-modal-title">
    <div class="modal-card vocab-modal-card">
        <div class="modal-card-header">
            <div class="modal-card-title">
                <div class="modal-icon-circle">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 id="vocab-modal-title">Study Suite & Exercises</h3>
                    <p class="modal-subtitle">Vocabulary, Flashcards, Notes & Comprehension</p>
                </div>
            </div>
            <button type="button" id="close-vocab-modal" class="modal-card-close-btn" aria-label="Close study suite">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="vocab-tabs-row" role="tablist">
            <button type="button" class="vocab-tab-btn active" id="tab-vocab-list" role="tab">Vocabulary List</button>
            <button type="button" class="vocab-tab-btn" id="tab-vocab-flash" role="tab">Flashcard Drill</button>
            <button type="button" class="vocab-tab-btn" id="tab-quiz" role="tab">Chapter Quiz</button>
            <button type="button" class="vocab-tab-btn" id="tab-highlights" role="tab">My Highlights</button>
        </div>

        <div class="modal-body vocab-modal-body">
            <!-- Vocabulary List Tab View -->
            <div id="vocab-list-container-wrap" class="vocab-list-wrap">
                <div style="text-align: right; margin-bottom: 1rem;">
                    <button type="button" id="download-vocab-txt-btn" class="intro-start-btn" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        <i class="fas fa-file-download mr-1"></i> Download as TXT
                    </button>
                </div>
                <div id="vocab-list-container" class="vocab-list-grid">
                    <!-- Dynamically populated by reader.js -->
                </div>
            </div>

            <!-- Flashcards Tab View -->
            <div id="vocab-flash-container" class="vocab-flash-wrap hidden">
                <div id="vocab-flashcard" class="flashcard-box" role="button" tabindex="0" aria-label="Flashcard - Click to flip">
                    <div class="flashcard-inner">
                        <div class="flashcard-front">
                            <span class="flashcard-badge">WORD</span>
                            <h4 id="flashcard-front-word" class="flashcard-term">Loading...</h4>
                            <p class="flashcard-hint"><i class="fas fa-sync-alt mr-1"></i> Click to reveal definition</p>
                        </div>
                        <div class="flashcard-back">
                            <span class="flashcard-badge">DEFINITION</span>
                            <p id="flashcard-back-definition" class="flashcard-def">Loading...</p>
                        </div>
                    </div>
                </div>

                <div class="flashcard-controls-row">
                    <button type="button" id="flashcard-prev-btn" class="flashcard-nav-btn"><i class="fas fa-chevron-left"></i> Prev</button>
                    <span id="flashcard-counter" class="flashcard-counter-label">1 of 1</span>
                    <button type="button" id="flashcard-next-btn" class="flashcard-nav-btn">Next <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Quiz Tab View -->
            <div id="quiz-container-wrap" class="quiz-container-wrap hidden">
                <div style="text-align: right; margin-bottom: 1rem;">
                    <button type="button" id="download-quiz-txt-btn" class="intro-start-btn hidden" style="padding: 0.5rem 1rem; font-size: 0.85rem; background: var(--color-success); border-color: var(--color-success);">
                        <i class="fas fa-file-download mr-1"></i> Download Results
                    </button>
                </div>
                <div id="quiz-container" class="quiz-container">
                    <!-- Injected by reader.js -->
                </div>
            </div>

            <!-- Highlights & Notes Tab View -->
            <div id="vocab-highlights-container" class="highlights-container hidden">
                <!-- Injected by reader.js -->
            </div>
        </div>
    </div>
</div>

<!-- Table of Contents Slide-Out Modal -->
<?php if ($totalChapters > 1): ?>
    <div id="toc-modal" class="toc-modal-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="toc-title" onclick="closeTocModal()">
        <div class="toc-content" onclick="event.stopPropagation()">
            <div class="toc-header">
                <h2 id="toc-title">Table of Contents</h2>
                <button type="button" class="toc-close" id="close-toc-modal" onclick="closeTocModal()" aria-label="Close Table of Contents">&times;</button>
            </div>
            <div class="toc-grid">
                <?php for ($i = 1; $i <= $totalChapters; $i++): 
                    $isTeacherCh = ($i === $totalChapters && !empty($book['hasTeacherResources']));
                    $chapterLabel = $isTeacherCh ? 'Teacher Resources' : 'Chapter ' . $i;
                    if (!empty($bookToc) && isset($bookToc[(string)$i]['title'])) {
                        $chapterLabel = $bookToc[(string)$i]['title'];
                    }
                ?>
                    <a href="/library/read/index.php?book=<?php echo urlencode($bookId); ?>&chapter=chapter-<?php echo $i; ?>" 
                       class="toc-link <?php echo ($i === $chapterNum) ? 'active' : ''; ?> <?php echo $isTeacherCh ? 'toc-teacher-link' : ''; ?>">
                        <span class="toc-num"><?php echo $isTeacherCh ? '<i class="fas fa-chalkboard-teacher"></i>' : 'CH ' . $i; ?></span>
                        <span class="toc-name"><?php echo htmlspecialchars($chapterLabel); ?></span>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Sourcing & Info Modal -->
<div id="license-modal" class="modal-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="license-title" onclick="closeLicenseModal()">
    <div class="modal-card license-modal-card" onclick="event.stopPropagation()">
        <div class="modal-card-header">
            <div class="modal-card-title">
                <div class="modal-icon-circle">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div>
                    <h3 id="license-title">Book Sourcing & Information</h3>
                    <p class="modal-subtitle">Metadata, License & Primary Sources</p>
                </div>
            </div>
            <button type="button" id="close-license-modal" class="modal-card-close-btn" onclick="closeLicenseModal()" aria-label="Close license info">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body license-modal-body">
            <div class="license-book-preview">
                <img src="<?php echo htmlspecialchars($book['img'] ?? ''); ?>" alt="Cover" class="license-cover" onerror="this.onerror=null; this.src='https://placehold.co/100x150/1e293b/ffffff?text=Book';">
                <div>
                    <h4 class="license-book-title"><?php echo htmlspecialchars($bookTitle); ?></h4>
                    <p class="license-book-author">by <?php echo htmlspecialchars($bookAuthor); ?></p>
                    <span class="license-grade-tag"><i class="fas fa-graduation-cap mr-1"></i> <?php echo htmlspecialchars($book['grade'] ?? 'General Education'); ?></span>
                </div>
            </div>
            <div class="license-text-block">
                <p><strong>Source Provider:</strong> <?php echo htmlspecialchars($book['file-source'] ?? 'Public Domain Archive / Educational Fair Use'); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($book['description'] ?? 'No additional metadata available.'); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Chapter Citation Modal -->
<div id="chapterCitationModal" class="modal-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="chapter-cite-title" onclick="closeChapterCitationModal()">
    <div class="modal-card citation-modal-card" onclick="event.stopPropagation()">
        <div class="modal-card-header">
            <div class="modal-card-title">
                <div class="modal-icon-circle">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div>
                    <h3 id="chapter-cite-title">Cite This Chapter</h3>
                    <p class="modal-subtitle">Academic formats for citations & bibliography</p>
                </div>
            </div>
            <button type="button" id="close-chapter-cite-modal" class="modal-card-close-btn" onclick="closeChapterCitationModal()" aria-label="Close citation modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="citation-format-tabs">
                <button type="button" class="citation-tab-btn active" onclick="switchReaderCitationStyle('mla')">MLA 9</button>
                <button type="button" class="citation-tab-btn" onclick="switchReaderCitationStyle('apa')">APA 7</button>
                <button type="button" class="citation-tab-btn" onclick="switchReaderCitationStyle('chicago')">Chicago 17</button>
                <button type="button" class="citation-tab-btn" onclick="switchReaderCitationStyle('harvard')">Harvard</button>
            </div>
            <div class="citation-preview-box">
                <div id="reader-citation-text" class="citation-text-render"></div>
                <button type="button" id="reader-citation-copy-btn" class="citation-copy-btn" onclick="copyReaderCitationText()">
                    <i class="fas fa-copy"></i> <span>Copy Citation</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Floating Session Resume Alert Banner -->
<div id="resume-toast" class="resume-toast hidden" role="alert">
    <div class="resume-toast-content">
        <i class="fas fa-bookmark resume-toast-icon"></i>
        <div class="resume-toast-text">
            <span class="resume-toast-title">Resume Reading?</span>
            <span class="resume-toast-desc">Pick up from where you left off.</span>
        </div>
        <div class="resume-toast-actions">
            <button type="button" id="resume-toast-dismiss" class="resume-toast-btn btn-secondary">Dismiss</button>
            <button type="button" id="resume-toast-confirm" class="resume-toast-btn btn-primary">Resume</button>
        </div>
    </div>
</div>

<!-- Send metadata to client window context -->
<script>
    window.BOOK_METADATA = {
        id: <?php echo json_encode($bookId); ?>,
        title: <?php echo json_encode($bookTitle); ?>,
        author: <?php echo json_encode($bookAuthor); ?>,
        chapter: <?php echo json_encode($chapter); ?>,
        chapterNum: <?php echo json_encode($chapterNum); ?>,
        totalChapters: <?php echo json_encode($totalChapters); ?>,
        chapterTitle: <?php echo json_encode($currentChapterTitle); ?>,
        grade: <?php echo json_encode($book['grade'] ?? 'Grades 9-12'); ?>
    };
    window.BOOK_QUIZ_QUESTIONS = <?php echo json_encode($quizQuestions); ?>;
    window.BOOK_JSON_VOCAB = <?php echo json_encode($vocabList); ?>;
</script>

<script src="/assets/js/reader/read-typography.js" defer></script>
<script src="/assets/js/reader/read-scroll-progress.js" defer></script>
<script src="/assets/js/reader/read-text.js" defer></script>
<script src="/assets/js/reader/read-study-suite.js" defer></script>
<script src="/assets/js/reader/read-inline-text-highlighting.js" defer></script>
<script src="/assets/js/reader/read-modals.js" defer></script>
<script src="/assets/js/reader/read-chapter-citation-generator.js" defer></script>
<script src="/assets/js/reader/read-single.js" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>