<?php
/**
 * library/book_card.php - SLiMS-Enhanced Modular Book Card Component
 * Renders consistent book cards across Carousel, Grid, and Academic SLiMS OPAC views.
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
$gmd = $isCollection ? 'Collection' : (stripos($bookTitle, 'audio') !== false ? 'Audiobook' : 'Text / E-Book');

// Resolve or synthesize authentic Library Call Number
$bookCallNumber = $book['call_number'] ?? $book['callNumber'] ?? $book['call-number'] ?? '';
if (empty($bookCallNumber)) {
    if (!empty($book['lc'])) {
        $authorCutter = '.' . strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $bookAuthor ?: 'A'), 0, 1)) . (abs(crc32($bookTitle)) % 89 + 10);
        $year = (!empty($bookDate) && $bookDate !== '#') ? preg_replace('/[^0-9]/', '', substr($bookDate, 0, 4)) : '';
        $bookCallNumber = trim($book['lc'] . ' ' . $authorCutter . ' ' . $year);
    } elseif (!empty($book['dewey'])) {
        $authorCode = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $bookAuthor ?: 'A'), 0, 3));
        $year = (!empty($bookDate) && $bookDate !== '#') ? preg_replace('/[^0-9]/', '', substr($bookDate, 0, 4)) : '';
        $bookCallNumber = trim($book['dewey'] . ' ' . $authorCode . ' ' . $year);
    } else {
        $hashPrefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $bookAuthor ?: $bookTitle), 0, 2) . substr(preg_replace('/[^a-zA-Z]/', '', $bookTitle), 0, 1));
        $hashNum = (abs(crc32($bookId ?: $bookTitle)) % 800) + 100;
        $bookCallNumber = $hashPrefix . '.' . $hashNum;
    }
}
?>
<div class="library-book-card slims-book-card"
     role="button"
     tabindex="0"
     aria-label="View bibliographic details for <?php echo htmlspecialchars($bookTitle); ?>"
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
     data-pdf-vol2-link="<?php echo htmlspecialchars($book['pdf-vol2-link'] ?? ''); ?>"
     data-epub-link="<?php echo htmlspecialchars($book['epub-link'] ?? '#'); ?>"
     data-read-online-link="<?php 
         $rawReadLink = $book['read-online-link'] ?? '#';
         if (strpos($rawReadLink, '/library/') === 0) {
             $rawReadLink = substr($rawReadLink, 9);
         }
         echo htmlspecialchars($rawReadLink); 
     ?>"
     data-read-online-vol1-link="<?php 
         $rawVol1 = $book['read-online-vol1-link'] ?? '';
         if (strpos($rawVol1, '/library/') === 0) {
             $rawVol1 = substr($rawVol1, 9);
         }
         echo htmlspecialchars($rawVol1); 
     ?>"
     data-read-online-vol2-link="<?php 
         $rawVol2 = $book['read-online-vol2-link'] ?? '';
         if (strpos($rawVol2, '/library/') === 0) {
             $rawVol2 = substr($rawVol2, 9);
         }
         echo htmlspecialchars($rawVol2); 
     ?>"
     data-txt-link="<?php echo htmlspecialchars($book['txt-link'] ?? '#'); ?>"
     data-mobi-link="<?php echo htmlspecialchars($book['mobi-link'] ?? '#'); ?>"
     data-word-link="<?php echo htmlspecialchars($book['word-link'] ?? '#'); ?>"
     data-lexile="<?php echo htmlspecialchars($bookLexile); ?>"
     data-dewey="<?php echo htmlspecialchars($book['dewey'] ?? ''); ?>"
     data-lc="<?php echo htmlspecialchars($book['lc'] ?? ''); ?>"
     data-call-number="<?php echo htmlspecialchars($bookCallNumber); ?>"
     data-grade="<?php echo htmlspecialchars($bookGrade); ?>"
     data-curriculum="<?php echo htmlspecialchars($curriculum); ?>"
     data-disclaimer-key="<?php echo htmlspecialchars($book['disclaimer-key'] ?? ''); ?>"
     data-disclaimer-text="<?php echo htmlspecialchars($book['disclaimer-text'] ?? ''); ?>"
     data-file-source="<?php echo htmlspecialchars($book['file-source'] ?? ''); ?>"
     data-info-source="<?php echo htmlspecialchars($book['info-source'] ?? ''); ?>"
     data-category="<?php echo htmlspecialchars($book['category'] ?? ''); ?>"
     data-section="<?php echo htmlspecialchars($book['section'] ?? ''); ?>"
     data-gmd="<?php echo htmlspecialchars($gmd); ?>"
     data-author-bio="<?php echo htmlspecialchars($book['authorBio'] ?? ''); ?>"
     data-intro-why="<?php echo htmlspecialchars($book['introWhy'] ?? ''); ?>"
     data-intro-how="<?php echo htmlspecialchars($book['introHow'] ?? ''); ?>"
     data-intro-what="<?php echo htmlspecialchars($book['introWhat'] ?? ''); ?>"
     data-gutenberg-id="<?php echo htmlspecialchars($book['gutenberg-id'] ?? ''); ?>"
     data-is-collection="<?php echo $isCollection ? 'true' : 'false'; ?>"
     data-has-teacher="<?php echo $hasTeacherResources ? 'true' : 'false'; ?>"
     data-books="<?php echo isset($book['books']) ? htmlspecialchars(json_encode($book['books']), ENT_QUOTES, 'UTF-8') : ''; ?>">

    <!-- Cover Image Wrapper with star bookmark button and on-hover detail button -->
    <div class="library-book-cover-wrap">
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

        <!-- On-Hover Detail Button -->
        <div class="library-book-cover-overlay">
            <span class="library-book-overlay-text">
                <i class="fas fa-circle-info"></i> <span>Detail</span>
            </span>
        </div>
    </div>
</div>

