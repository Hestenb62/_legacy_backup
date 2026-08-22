<?php
/**
 * library/book_card.php - Modular Book Card Component
 * Renders consistent book cards across Carousel, Grid, and Academic List views.
 */
$bookId = $book['id'] ?? '';
$bookTitle = $book['title'] ?? 'Untitled';
$bookAuthor = $book['author'] ?? 'Unknown Author';
$bookImg = $book['img'] ?? '';
$fallbackImg = $book['fallback-img'] ?? ('https://placehold.co/300x450/1e293b/ffffff?text=' . urlencode($bookTitle));
$bookGrade = $book['grade'] ?? '';
$bookLexile = $book['lexile'] ?? '';
$bookDate = $book['date'] ?? '';
$isCollection = !empty($book['isCollection']);
$hasTeacherResources = !empty($book['hasTeacherResources']);
$curriculum = $book['curriculum'] ?? ($book['grade'] ?? '');
?>
<div class="library-book-card"
     role="button"
     tabindex="0"
     aria-label="View details for <?php echo htmlspecialchars($bookTitle); ?>"
     onclick="openModal(this)"
     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openModal(this);}"
     data-id="<?php echo htmlspecialchars($bookId); ?>"
     data-title="<?php echo htmlspecialchars($bookTitle); ?>"
     data-author="<?php echo htmlspecialchars($bookAuthor); ?>"
     data-isbn="<?php echo htmlspecialchars($book['isbn'] ?? ''); ?>"
     data-date="<?php echo htmlspecialchars($bookDate); ?>"
     data-img="<?php echo htmlspecialchars($bookImg); ?>"
     data-fallback-img="<?php echo htmlspecialchars($fallbackImg); ?>"
     data-description="<?php echo htmlspecialchars($book['description'] ?? ''); ?>"
     data-pdf-link="<?php echo htmlspecialchars($book['pdf-link'] ?? '#'); ?>"
     data-epub-link="<?php echo htmlspecialchars($book['epub-link'] ?? '#'); ?>"
     data-read-online-link="<?php echo htmlspecialchars($book['read-online-link'] ?? '#'); ?>"
     data-txt-link="<?php echo htmlspecialchars($book['txt-link'] ?? '#'); ?>"
     data-mobi-link="<?php echo htmlspecialchars($book['mobi-link'] ?? '#'); ?>"
     data-word-link="<?php echo htmlspecialchars($book['word-link'] ?? '#'); ?>"
     data-lexile="<?php echo htmlspecialchars($bookLexile); ?>"
     data-dewey="<?php echo htmlspecialchars($book['dewey'] ?? ''); ?>"
     data-lc="<?php echo htmlspecialchars($book['lc'] ?? ''); ?>"
     data-grade="<?php echo htmlspecialchars($bookGrade); ?>"
     data-curriculum="<?php echo htmlspecialchars($curriculum); ?>"
     data-disclaimer-key="<?php echo htmlspecialchars($book['disclaimer-key'] ?? ''); ?>"
     data-disclaimer-text="<?php echo htmlspecialchars($book['disclaimer-text'] ?? ''); ?>"
     data-file-source="<?php echo htmlspecialchars($book['file-source'] ?? ''); ?>"
     data-info-source="<?php echo htmlspecialchars($book['info-source'] ?? ''); ?>"
     data-category="<?php echo htmlspecialchars($book['category'] ?? ''); ?>"
     data-section="<?php echo htmlspecialchars($book['section'] ?? ''); ?>"
     data-is-collection="<?php echo $isCollection ? 'true' : 'false'; ?>"
     data-has-teacher="<?php echo $hasTeacherResources ? 'true' : 'false'; ?>"
     data-books="<?php echo isset($book['books']) ? htmlspecialchars(json_encode($book['books']), ENT_QUOTES, 'UTF-8') : ''; ?>">

    <!-- Cover Image Wrapper with hover lifting action -->
    <div class="library-book-cover-wrap">
        <?php if ($bookGrade !== '' && $bookGrade !== '#'): ?>
            <div class="library-book-badge-grade">
                <i class="fas fa-graduation-cap"></i> <span><?php echo htmlspecialchars($bookGrade); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($isCollection): ?>
            <div class="library-book-badge-collection">
                <i class="fas fa-layer-group"></i> <span>Collection</span>
            </div>
        <?php endif; ?>

        <!-- Bookmark / Favorite Quick Button -->
        <button type="button"
                class="library-book-bookmark-btn" 
                onclick="toggleBookmark(event, '<?php echo htmlspecialchars($bookId); ?>')" 
                title="Save to My Reading List" 
                aria-label="Save <?php echo htmlspecialchars($bookTitle); ?> to My Reading List">
            <i class="far fa-star"></i>
        </button>
        
        <img src="<?php echo htmlspecialchars($bookImg); ?>"
             alt="Cover of <?php echo htmlspecialchars($bookTitle); ?>" 
             class="library-book-cover-img"
             loading="lazy"
             onerror="this.onerror=null; this.src='<?php echo htmlspecialchars($fallbackImg); ?>';">

        <!-- Reading Progress Overlay Bar -->
        <div class="book-progress-track hidden" data-progress-id="<?php echo htmlspecialchars($bookId); ?>">
            <div class="book-progress-fill"></div>
        </div>

        <!-- Hover Overlay Info -->
        <div class="library-book-cover-overlay">
            <span class="library-book-overlay-text">
                <i class="fas fa-book-open"></i> <span>View Details</span>
            </span>
        </div>
    </div>

    <!-- Info (Below Card / In List View) -->
    <div class="library-book-info">
        <h3 class="library-book-title">
            <?php echo htmlspecialchars($bookTitle); ?>
        </h3>
        <p class="library-book-author">
            <?php echo htmlspecialchars($bookAuthor); ?>
        </p>

        <!-- List View Extended Metadata (Visible in Academic List / Table View) -->
        <div class="library-book-list-meta">
            <?php if (!empty($bookLexile) && $bookLexile !== '#'): ?>
                <span class="meta-tag lexile-tag" title="Lexile Reading Measure">
                    <i class="fas fa-brain"></i> <?php echo htmlspecialchars($bookLexile); ?>
                </span>
            <?php endif; ?>
            <?php if (!empty($bookDate) && $bookDate !== '#'): ?>
                <span class="meta-tag date-tag" title="Publication Date">
                    <i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($bookDate); ?>
                </span>
            <?php endif; ?>
            <?php if (!empty($bookGrade) && $bookGrade !== '#'): ?>
                <span class="meta-tag grade-tag" title="Target Grade Level">
                    <i class="fas fa-graduation-cap"></i> <?php echo htmlspecialchars($bookGrade); ?>
                </span>
            <?php endif; ?>
            <?php if (!empty($book['dewey'])): ?>
                <span class="meta-tag ddc-tag" title="Dewey Decimal Classification">
                    <i class="fas fa-sitemap"></i> DDC <?php echo htmlspecialchars($book['dewey']); ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
