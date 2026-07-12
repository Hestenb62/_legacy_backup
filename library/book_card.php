<!-- Book Card based on new design specs -->
<div class="book-card flex-shrink-0 w-48 md:w-56 snap-start group cursor-pointer relative flex flex-col h-full"
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
    <div class="relative aspect-[2/3] rounded-2xl overflow-hidden shadow-lg border border-gray-200 dark:border-white/10 transition-all duration-300 group-hover:shadow-xl group-hover:shadow-indigo-500/20 group-hover:-translate-y-2 will-animate bg-gray-100 dark:bg-gray-800">
        <?php if(isset($book['isCollection']) && $book['isCollection']): ?>
        <div class="absolute top-3 left-3 z-30 bg-indigo-600/90 text-white text-[10px] uppercase font-bold tracking-widest px-2.5 py-1 rounded-md backdrop-blur-md shadow-sm border border-indigo-400/30 flex items-center gap-1.5 ring-1 ring-white/10">
            <i class="fas fa-layer-group"></i> Collection
        </div>
        <?php endif; ?>
        <img src="<?php echo htmlspecialchars($book['img']); ?>"
            alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-full object-cover relative z-10 transition-transform duration-500 group-hover:scale-105"
            loading="lazy"
            onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

        <!-- Hover Overlay Info -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5 z-20">
            <span class="text-white text-[10px] font-bold uppercase tracking-widest mb-1 flex items-center gap-1.5"><i class="fas fa-book-open text-indigo-400"></i> View Details</span>
        </div>
    </div>

    <!-- Info (Below Card) -->
    <div class="mt-5 text-center px-1 flex-grow flex flex-col">
        <h3 class="text-gray-900 dark:text-white font-black text-lg font-outfit leading-tight line-clamp-2 book-title group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
            <?php echo htmlspecialchars($book['title']); ?>
        </h3>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1.5 font-medium book-author truncate">
            <?php echo htmlspecialchars($book['author']); ?>
        </p>
    </div>
</div>
