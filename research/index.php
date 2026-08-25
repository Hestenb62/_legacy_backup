<?php
// --- Page Configuration ---
$pageTitle = "Research - Hesten's Learning";
$pageDescription = "Explore our peer-reviewed journals on dyslexia, dysgraphia, and other learning disability research.";
$pageKeywords = "research, journals, dyslexia, dysgraphia, learning disabilities, education";
$pageAuthor = "Hesten Allison";

include '../src/header.php';

// Define Journals Data Array
// Load Journals Data from JSON
$jsonString = file_get_contents('../assets/data/research/journals.json');
$journals = json_decode($jsonString, true);

if ($journals === null) {
    $journals = []; // Fallback empty array if decoding fails
}
?>

<!-- Link Dedicated Research Vanilla CSS -->
<link rel="stylesheet" href="/assets/css/research-main.css">

<!-- Hero Section -->
<div class="research-hero">
    <!-- Background Animated Orbs & Icons -->
    <div class="research-hero-bg">
        <i class="fas fa-microscope research-hero-icon microscope"></i>
        <i class="fas fa-brain research-hero-icon brain"></i>
        <i class="fas fa-dna research-hero-icon dna"></i>
        
        <div class="research-orb research-orb-1"></div>
        <div class="research-orb research-orb-2"></div>
        <div class="research-orb research-orb-3"></div>
    </div>

    <div class="research-hero-content">
        <span class="research-hero-badge">
            <i class="fas fa-book-open"></i> Academic Journals
        </span>
        <h1 class="research-hero-title">
            <span class="hero-title-shadow">Explore Our</span> <span class="hero-title-gradient">Research</span>
        </h1>
        <p class="research-hero-desc">
            Discover the latest peer-reviewed findings, methodologies, and advancements in learning disabilities and educational technology.
        </p>
    </div>
</div>

<main class="research-container" id="main-content">

    <!-- Search & Filter Controls -->
    <div class="research-controls-section">
        <!-- Search Bar -->
        <div class="research-search-wrap">
            <i class="fas fa-search research-search-icon"></i>
            <input type="text" 
                   id="journalSearchInput"
                   class="research-search-input" 
                   placeholder="Search journals, authors, or topics...">
        </div>
        
        <!-- Category Pills -->
        <div class="research-category-pills" id="categoryPills">
            <button class="category-pill-btn active" data-filter="all">All</button>
            <button class="category-pill-btn" data-filter="dyslexia">Dyslexia</button>
            <button class="category-pill-btn" data-filter="dysgraphia">Dysgraphia</button>
            <button class="category-pill-btn" data-filter="intervention">Intervention</button>
            <button class="category-pill-btn" data-filter="ai in ed">AI in Ed</button>
        </div>
    </div>

    <!-- Journals Grid -->
    <div class="research-grid" id="journalsGrid">
        <?php foreach ($journals as $journal): ?>
            <a href="<?php echo htmlspecialchars($journal['link']); ?>" 
               class="research-card journal-card"
               data-title="<?php echo htmlspecialchars(strtolower($journal['title'])); ?>"
               data-tags="<?php echo htmlspecialchars(strtolower(implode(',', $journal['tags'] ?? []))); ?>"
               data-author="<?php echo htmlspecialchars(strtolower($journal['author'] ?? '')); ?>"
               data-description="<?php echo htmlspecialchars(strtolower($journal['description'] ?? '')); ?>">
                
                <!-- Card Image & Overlay -->
                <div class="card-image-wrap">
                    <?php if (preg_match('/\.(jpg|jpeg|png|gif|svg|webp)$/i', $journal['cover'])): ?>
                        <img src="<?php echo htmlspecialchars($journal['cover']); ?>" 
                             alt="<?php echo htmlspecialchars($journal['title']); ?> Cover" 
                             onerror="this.onerror=null; this.src='https://placehold.co/400x500/6366F1/FFFFFF?text=Image+Error';">
                        <div class="card-image-overlay"></div>
                    <?php else: ?>
                        <div class="card-placeholder-content">
                            <i class="fas fa-book-open research-journal-icon"></i>
                            <h2 class="card-placeholder-title"><?php echo htmlspecialchars($journal['cover']); ?></h2>
                        </div>
                        <div class="card-image-overlay"></div>
                    <?php endif; ?>
                    
                    <!-- Peer Reviewed Badge -->
                    <?php if (isset($journal['isPeerReviewed']) && $journal['isPeerReviewed']): ?>
                        <div class="peer-reviewed-badge">
                            <i class="fas fa-check-circle"></i> Peer Reviewed
                        </div>
                    <?php endif; ?>

                    <!-- Tags Overlay -->
                    <div class="card-tags-overlay">
                        <?php if(isset($journal['tags'])): ?>
                            <?php foreach ($journal['tags'] as $tag): ?>
                                <span class="tag-chip">
                                    <?php echo htmlspecialchars($tag); ?>
                                </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                    <h3 class="card-title">
                        <?php echo htmlspecialchars($journal['title']); ?>
                    </h3>
                    
                    <!-- Meta info: Author & Date -->
                    <div class="card-meta">
                        <?php if(isset($journal['author'])): ?>
                            <span class="card-meta-item"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($journal['author']); ?></span>
                        <?php endif; ?>
                        <?php if(isset($journal['date'])): ?>
                            <span class="card-meta-item"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($journal['date']); ?></span>
                        <?php endif; ?>
                    </div>

                    <p class="card-desc">
                        <?php echo htmlspecialchars($journal['description']); ?>
                    </p>
                    
                    <!-- Call to Action -->
                    <div class="card-cta-wrap">
                        <span class="card-cta-text">
                            Read Journal
                        </span>
                        <div class="card-cta-icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <!-- Coming Soon Placeholder Card -->
        <div class="coming-soon-card">
            <div class="coming-soon-icon-wrap">
                <div class="coming-soon-ping"></div>
                <div class="coming-soon-icon-inner">
                    <i class="fas fa-flask research-flask-icon"></i>
                </div>
            </div>
            <h3 class="coming-soon-title">Next Publication</h3>
            <p class="coming-soon-desc">We are actively conducting research on AI-assisted learning interventions. Coming Soon.</p>
        </div>
    </div>

</main>

<?php include '../src/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('journalSearchInput');
    const pills = document.querySelectorAll('.category-pill-btn');
    const cards = document.querySelectorAll('.journal-card');

    let currentFilter = 'all';
    let searchQuery = '';

    function filterCards() {
        cards.forEach(card => {
            const title = card.getAttribute('data-title') || '';
            const tags = card.getAttribute('data-tags') || '';
            const author = card.getAttribute('data-author') || '';
            const desc = card.getAttribute('data-description') || '';

            const matchesSearch = title.includes(searchQuery) || 
                                  author.includes(searchQuery) || 
                                  desc.includes(searchQuery) ||
                                  tags.includes(searchQuery);

            const matchesFilter = currentFilter === 'all' || tags.includes(currentFilter);

            if (matchesSearch && matchesFilter) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        filterCards();
    });

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            // Update active state
            pills.forEach(p => p.classList.remove('active'));
            pill.classList.add('active');

            currentFilter = pill.getAttribute('data-filter').toLowerCase();
            filterCards();
        });
    });
});
</script>
