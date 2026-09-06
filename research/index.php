<?php
// --- Page Configuration ---
$pageTitle = "Research - Hesten's Learning";
$pageDescription = "Explore our peer-reviewed journals on dyslexia, dysgraphia, and other learning disability research.";
$pageKeywords = "research, journals, dyslexia, dysgraphia, learning disabilities, education, motor skills, phonology";
$pageAuthor = "Hesten Allison";

include '../src/header.php';

// Define Journals Data Array
// Load Journals Data from JSON
$jsonPath = __DIR__ . '/../assets/data/research/journals.json';
$jsonString = file_exists($jsonPath) ? file_get_contents($jsonPath) : false;
$journals = $jsonString ? json_decode($jsonString, true) : [];

if ($journals === null) {
    $journals = []; // Fallback empty array if decoding fails
}

$totalArticles = array_sum(array_column($journals, 'articleCount'));
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
            <i class="fas fa-book-open"></i> Academic Journals &amp; Publications
        </span>
        <h1 class="research-hero-title">
            <span class="hero-title-shadow">Explore Our</span> <span class="hero-title-gradient">Research</span>
        </h1>
        <p class="research-hero-desc">
            Discover peer-reviewed findings, kinematic motor analysis, and evidence-based interventions for dyslexia, dysgraphia, and related neurodevelopmental differences.
        </p>

        <!-- Hub Stats Banner -->
        <div class="research-stats-banner">
            <div class="stat-pill">
                <i class="fas fa-layer-group text-purple-300"></i>
                <span><strong><?php echo count($journals); ?></strong> Academic Journals</span>
            </div>
            <div class="stat-pill">
                <i class="fas fa-file-alt text-teal-300"></i>
                <span><strong><?php echo $totalArticles > 0 ? $totalArticles : 5; ?></strong> Published Papers</span>
            </div>
            <div class="stat-pill">
                <i class="fas fa-unlock-alt text-amber-300"></i>
                <span><strong>100%</strong> Open Access</span>
            </div>
            <div class="stat-pill">
                <i class="fas fa-universal-access text-indigo-300"></i>
                <span>Accessible Audio &amp; Dyslexia Reader</span>
            </div>
        </div>
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
                placeholder="Search journals, authors, topics, or interventions...">
            <button id="clearSearchBtn" class="clear-search-btn hidden" aria-label="Clear Search"><i class="fas fa-times"></i></button>
        </div>

        <!-- Category Pills -->
        <div class="research-category-pills" id="categoryPills">
            <button class="category-pill-btn active" data-filter="all">All Journals</button>
            <button class="category-pill-btn" data-filter="dyslexia">Dyslexia</button>
            <button class="category-pill-btn" data-filter="dysgraphia">Dysgraphia</button>
            <button class="category-pill-btn" data-filter="intervention">Interventions</button>
            <button class="category-pill-btn" data-filter="motor skills">Motor Skills</button>
            <button class="category-pill-btn" data-filter="ai in ed">AI in Ed <span class="badge-upcoming">Soon</span></button>
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
                    <?php if (!empty($journal['cover']) && preg_match('/\.(jpg|jpeg|png|gif|svg|webp)$/i', $journal['cover'])): ?>
                        <img src="<?php echo htmlspecialchars($journal['cover']); ?>"
                            alt="<?php echo htmlspecialchars($journal['title']); ?> Cover"
                            class="journal-cover-img"
                            onerror="this.onerror=null; this.parentElement.classList.add('fallback-cover'); this.style.display='none';">
                        <div class="card-image-overlay"></div>
                    <?php else: ?>
                        <div class="card-placeholder-content">
                            <i class="fas fa-book-open research-journal-icon"></i>
                            <h2 class="card-placeholder-title"><?php echo htmlspecialchars($journal['title']); ?></h2>
                        </div>
                        <div class="card-image-overlay"></div>
                    <?php endif; ?>

                    <!-- Publication / Issue Count Badge -->
                    <?php if (isset($journal['articleCount'])): ?>
                        <div class="journal-volume-badge">
                            <i class="fas fa-file-alt"></i> <?php echo (int)$journal['articleCount']; ?> Articles
                        </div>
                    <?php endif; ?>

                    <!-- Peer Reviewed Badge -->
                    <?php if (isset($journal['isPeerReviewed']) && $journal['isPeerReviewed']): ?>
                        <div class="peer-reviewed-badge">
                            <i class="fas fa-check-circle"></i> Peer Reviewed
                        </div>
                    <?php endif; ?>

                    <!-- Tags Overlay -->
                    <div class="card-tags-overlay">
                        <?php if (isset($journal['tags'])): ?>
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
                        <?php if (isset($journal['author'])): ?>
                            <span class="card-meta-item"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($journal['author']); ?></span>
                        <?php endif; ?>
                        <?php if (isset($journal['date'])): ?>
                            <span class="card-meta-item"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($journal['date']); ?></span>
                        <?php endif; ?>
                    </div>

                    <p class="card-desc">
                        <?php echo htmlspecialchars($journal['description']); ?>
                    </p>

                    <!-- Call to Action -->
                    <div class="card-cta-wrap">
                        <span class="card-cta-text">
                            Explore Journal
                        </span>
                        <div class="card-cta-icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <!-- Coming Soon Placeholder Card -->
        <div class="coming-soon-card journal-card" data-tags="ai in ed,technology" data-title="artificial intelligence in education">
            <div class="coming-soon-icon-wrap">
                <div class="coming-soon-ping"></div>
                <div class="coming-soon-icon-inner">
                    <i class="fas fa-robot research-flask-icon"></i>
                </div>
            </div>
            <h3 class="coming-soon-title">AI in Special Education</h3>
            <p class="coming-soon-desc">Active investigations on adaptive machine learning for speech-to-text accuracy and multimodal learning interventions. Coming Soon.</p>
        </div>
    </div>

    <!-- Empty State for Search / Filtering -->
    <div id="noJournalsFound" class="research-empty-state hidden">
        <div class="empty-state-icon-wrap">
            <i class="fas fa-search text-5xl opacity-40"></i>
        </div>
        <h3 class="text-xl font-bold mt-4 mb-2">No matching journals found</h3>
        <p class="text-sm opacity-80 mb-6">Try searching for different keywords or reset your category filter.</p>
        <button id="resetHubFilterBtn" class="btn-research btn-research-primary">
            <i class="fas fa-sync-alt mr-2"></i> Reset Filters
        </button>
    </div>

</main>

<?php include '../src/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('journalSearchInput');
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        const pills = document.querySelectorAll('.category-pill-btn');
        const cards = document.querySelectorAll('.journal-card');
        const emptyState = document.getElementById('noJournalsFound');
        const resetBtn = document.getElementById('resetHubFilterBtn');

        let currentFilter = 'all';
        let searchQuery = '';

        function filterCards() {
            let visibleCount = 0;
            cards.forEach(card => {
                const title = card.getAttribute('data-title') || '';
                const tags = card.getAttribute('data-tags') || '';
                const author = card.getAttribute('data-author') || '';
                const desc = card.getAttribute('data-description') || '';

                const matchesSearch = !searchQuery || 
                    title.includes(searchQuery) ||
                    author.includes(searchQuery) ||
                    desc.includes(searchQuery) ||
                    tags.includes(searchQuery);

                const matchesFilter = currentFilter === 'all' || tags.includes(currentFilter);

                if (matchesSearch && matchesFilter) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (emptyState) {
                if (visibleCount === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        }

        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value.toLowerCase().trim();
            if (clearSearchBtn) {
                clearSearchBtn.classList.toggle('hidden', searchQuery.length === 0);
            }
            filterCards();
        });

        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', () => {
                searchInput.value = '';
                searchQuery = '';
                clearSearchBtn.classList.add('hidden');
                filterCards();
                searchInput.focus();
            });
        }

        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                searchQuery = '';
                if (clearSearchBtn) clearSearchBtn.classList.add('hidden');
                pills.forEach(p => p.classList.remove('active'));
                const allPill = document.querySelector('.category-pill-btn[data-filter="all"]');
                if (allPill) allPill.classList.add('active');
                currentFilter = 'all';
                filterCards();
            });
        }

        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                pills.forEach(p => p.classList.remove('active'));
                pill.classList.add('active');

                currentFilter = pill.getAttribute('data-filter').toLowerCase();
                filterCards();
            });
        });
    });
</script>