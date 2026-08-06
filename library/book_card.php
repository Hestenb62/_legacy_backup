<!-- Book Card based on new design specs -->
<div class="book-card"
    onclick="openModal(this)" data-title="<?php echo htmlspecialchars($book['title'] ?? ''); ?>"
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
    data-is-collection="<?php echo isset($book['isCollection']) && $book['isCollection'] ? 'true' : 'false'; ?>"
    data-books="<?php echo isset($book['books']) ? htmlspecialchars(json_encode($book['books']), ENT_QUOTES, 'UTF-8') : ''; ?>">

    <!-- Cover Image Wrapper with hover lifting action -->
    <div class="book-image-wrapper">
        <?php if(isset($book['isCollection']) && $book['isCollection']): ?>
        <div class="collection-badge">
            <i class="fas fa-layer-group"></i> Collection
        </div>
        <?php endif; ?>
        <img src="<?php echo htmlspecialchars($book['img']); ?>"
            alt="<?php echo htmlspecialchars($book['title']); ?>" class="book-cover-img"
            loading="lazy"
            onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

        <!-- Hover Overlay Info -->
        <div class="book-hover-overlay">
            <span class="book-details-tag"><i class="fas fa-book-open"></i> View Details</span>
        </div>
    </div>

    <!-- Info (Below Card) -->
    <div class="book-info">
        <h3 class="book-card-title">
            <?php echo htmlspecialchars($book['title']); ?>
        </h3>
        <p class="book-card-author">
            <?php echo htmlspecialchars($book['author']); ?>
        </p>
    </div>
</div>
