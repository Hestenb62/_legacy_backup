<!-- Book Card based on new design specs -->
<div class="library-book-card"
     onclick="openModal(this)" 
     data-title="<?php echo htmlspecialchars($book['title'] ?? ''); ?>"
     data-author="<?php echo htmlspecialchars($book['author'] ?? ''); ?>"
     data-isbn="<?php echo htmlspecialchars($book['isbn'] ?? ''); ?>"
     data-date="<?php echo htmlspecialchars($book['date'] ?? ''); ?>"
     data-img="<?php echo htmlspecialchars($book['img'] ?? ''); ?>"
     data-description="<?php echo htmlspecialchars($book['description'] ?? ''); ?>"
     data-pdf-link="<?php echo htmlspecialchars($book['pdf-link'] ?? '#'); ?>"
     data-epub-link="<?php echo htmlspecialchars($book['epub-link'] ?? '#'); ?>"
     data-read-online-link="<?php echo htmlspecialchars($book['read-online-link'] ?? '#'); ?>"
     data-txt-link="<?php echo htmlspecialchars($book['txt-link'] ?? '#'); ?>"
     data-mobi-link="<?php echo htmlspecialchars($book['mobi-link'] ?? '#'); ?>"
     data-word-link="<?php echo htmlspecialchars($book['word-link'] ?? '#'); ?>"
     data-lexile="<?php echo htmlspecialchars($book['lexile'] ?? ''); ?>"
     data-dewey="<?php echo htmlspecialchars($book['dewey'] ?? ''); ?>"
     data-lc="<?php echo htmlspecialchars($book['lc'] ?? ''); ?>"
     data-grade="<?php echo htmlspecialchars($book['grade'] ?? ''); ?>"
     data-is-collection="<?php echo isset($book['isCollection']) && $book['isCollection'] ? 'true' : 'false'; ?>"
     data-books="<?php echo isset($book['books']) ? htmlspecialchars(json_encode($book['books']), ENT_QUOTES, 'UTF-8') : ''; ?>">

    <!-- Cover Image Wrapper with hover lifting action -->
    <div class="library-book-cover-wrap">
        <?php if(isset($book['grade']) && $book['grade'] !== ''): ?>
            <div class="library-book-badge-grade">
                <i class="fas fa-graduation-cap"></i> <?php echo htmlspecialchars($book['grade']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($book['isCollection']) && $book['isCollection']): ?>
            <div class="library-book-badge-collection">
                <i class="fas fa-layer-group"></i> Collection
            </div>
        <?php endif; ?>
        
        <img src="<?php echo htmlspecialchars($book['img']); ?>"
             alt="<?php echo htmlspecialchars($book['title']); ?>" 
             class="library-book-cover-img"
             loading="lazy"
             onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

        <!-- Hover Overlay Info -->
        <div class="library-book-cover-overlay">
            <span class="library-book-overlay-text">
                <i class="fas fa-book-open"></i> View Details
            </span>
        </div>
    </div>

    <!-- Info (Below Card) -->
    <div class="library-book-info">
        <h3 class="library-book-title">
            <?php echo htmlspecialchars($book['title']); ?>
        </h3>
        <p class="library-book-author">
            <?php echo htmlspecialchars($book['author']); ?>
        </p>
    </div>
</div>
