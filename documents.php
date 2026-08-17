<?php
$pageTitle = "Documents Hub - Hesten's Learning";
$pageDescription = "Browse and read essential student documents, guides, and reference files.";
$pageKeywords = "documents, hub, resources, reading, study guide";
$pageAuthor = "Hesten's Learning";

include 'src/header.php';

// Manually registered documents database
$documents = [
    'universal-numbering-system' => [
        'id' => 'universal-numbering-system',
        'title' => 'Universal Numbering System Architecture',
        'description' => 'Detailed technical design, structure, and applications of the Universal Numbering System.',
        'category' => 'Reference',
        'type' => 'PDF',
        'url' => '/Universal%20Numbering%20System%20Architecture.pdf',
        'icon' => 'fa-file-pdf',
        'embeddable' => true
    ],
    'curriculum-guide' => [
        'id' => 'curriculum-guide',
        'title' => 'Curriculum Standards Guide',
        'description' => 'Framework, milestones, and academic standards maps designed for student progress.',
        'category' => 'Curriculum',
        'type' => 'Guide',
        'url' => '/curriculum.php',
        'icon' => 'fa-book-open',
        'embeddable' => false
    ],
    'assessment-guide' => [
        'id' => 'assessment-guide',
        'title' => 'Student Self-Assessment Guide',
        'description' => 'Overview of the assessment engine, diagnostic tracking, and reporting tools.',
        'category' => 'Assessment',
        'type' => 'Guide',
        'url' => '/assessment.php',
        'icon' => 'fa-tasks',
        'embeddable' => false
    ],
    'skills-dictionary' => [
        'id' => 'skills-dictionary',
        'title' => 'Skills & Vocabulary Dictionary',
        'description' => 'An interactive dictionary mapping definitions, phonics, and skills categories.',
        'category' => 'Reference',
        'type' => 'Tool',
        'url' => '/skills-dictionary.php',
        'icon' => 'fa-spell-check',
        'embeddable' => false
    ],
    'help-center' => [
        'id' => 'help-center',
        'title' => 'Help Center & PWA Offline Guide',
        'description' => 'Frequently asked questions, accessibility controls, and offline accessibility instructions.',
        'category' => 'Support',
        'type' => 'Guide',
        'url' => '/help-center.php',
        'icon' => 'fa-life-ring',
        'embeddable' => false
    ]
];

// Compute statistics and filters
$categoryCounts = [];
$typeCounts = [];
foreach ($documents as $doc) {
    $cat = $doc['category'];
    $type = $doc['type'];
    $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
    $typeCounts[$type] = ($typeCounts[$type] ?? 0) + 1;
}
ksort($categoryCounts);
ksort($typeCounts);
?>

<link rel="stylesheet" href="/assets/css/pages/documents.css">
<style>
    /* Popup Modal Styles */
    .doc-popup-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(8px);
        z-index: 9999;
        display: none; /* Controlled via JS */
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }
    .doc-popup-container {
        background: var(--color-bg-surface);
        border: 1px solid var(--color-border);
        border-radius: 1.5rem;
        width: 100%;
        max-width: 950px;
        height: 90vh;
        max-height: 800px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        box-shadow: var(--shadow-2xl);
        animation: popup-scale-in 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes popup-scale-in {
        from {
            transform: scale(0.95) translateY(12px);
            opacity: 0;
        }
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }
    .doc-popup-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--color-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        background: var(--color-bg-elevated);
    }
    .doc-popup-close {
        font-size: 2rem;
        font-weight: 300;
        color: var(--color-text-muted);
        background: none;
        border: none;
        cursor: pointer;
        line-height: 1;
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-full);
        transition: background-color 0.2s, color 0.2s;
    }
    .doc-popup-close:hover {
        background-color: var(--color-border);
        color: var(--color-text-main);
    }
    .doc-popup-body {
        flex-grow: 1;
        position: relative;
        background: var(--color-bg-base);
    }
    .doc-popup-iframe {
        width: 100%;
        height: 100%;
        border: none;
        display: block;
    }
    .action-panel {
        padding: 2rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    .action-btn-primary {
        background: var(--color-primary);
        color: white !important;
        padding: 0.75rem 2rem;
        border-radius: 9999px;
        font-weight: 800;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .action-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    .badge-pill {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .badge-cat {
        background: rgba(79, 70, 229, 0.1);
        color: var(--color-primary);
        border: 1px solid rgba(79, 70, 229, 0.2);
    }
    .badge-type {
        background: rgba(14, 116, 144, 0.1);
        color: #0f4d62;
        border: 1px solid rgba(14, 116, 144, 0.2);
    }
    .document-card-link {
        cursor: pointer;
    }
</style>

<!-- DIRECTORY VIEW -->
<div class="page-hero">
    <div class="page-hero-bg" style="opacity: 0.1;">
        <i class="fas fa-folder-open" style="position: absolute; top: 2.5rem; left: 2.5rem; font-size: 7rem;"></i>
        <i class="fas fa-file-alt" style="position: absolute; bottom: 3rem; right: 3rem; font-size: 10rem; transform: rotate(10deg);"></i>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">Central Directory</span>
        <h1 class="page-hero-title">Documents Hub</h1>
        <p class="page-hero-subtitle">Browse, search, and open essential documents, guides, and references.</p>
    </div>
</div>

<main class="page-content-wrapper" id="main-content">
    <section class="documents-summary" aria-label="Document summary">
        <div class="documents-stat">
            <span class="documents-stat-number"><?php echo number_format(count($documents)); ?></span>
            <span class="documents-stat-label">Essential Documents</span>
        </div>
        <div class="documents-stat">
            <span class="documents-stat-number"><?php echo number_format(count($categoryCounts)); ?></span>
            <span class="documents-stat-label">Categories</span>
        </div>
        <div class="documents-stat">
            <span class="documents-stat-number"><?php echo number_format(count($typeCounts)); ?></span>
            <span class="documents-stat-label">Formats</span>
        </div>
    </section>

    <section class="documents-controls" aria-label="Filter documents">
        <label for="documents-search" class="sr-only">Search documents</label>
        <input id="documents-search" class="documents-search" type="text" placeholder="Search by title or description..." oninput="filterDocuments()">

        <label for="documents-category" class="sr-only">Filter by category</label>
        <select id="documents-category" class="documents-select" onchange="filterDocuments()">
            <option value="">All categories</option>
            <?php foreach ($categoryCounts as $category => $count): ?>
                <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="documents-type" class="sr-only">Filter by type</label>
        <select id="documents-type" class="documents-select" onchange="filterDocuments()">
            <option value="">All types</option>
            <?php foreach ($typeCounts as $type => $count): ?>
                <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
            <?php endforeach; ?>
        </select>
    </section>

    <section aria-label="All documents">
        <h2 class="section-heading">All Documents</h2>
        <div id="documents-grid" class="documents-grid">
            <?php foreach ($documents as $key => $doc): ?>
                <article class="document-card"
                    data-title="<?php echo htmlspecialchars(strtolower($doc['title'])); ?>"
                    data-desc="<?php echo htmlspecialchars(strtolower($doc['description'])); ?>"
                    data-category="<?php echo htmlspecialchars($doc['category']); ?>"
                    data-type="<?php echo htmlspecialchars($doc['type']); ?>">
                    <div onclick="openDocPopup('<?php echo htmlspecialchars($key); ?>')" class="document-card-link" style="height: 100%; display: flex; flex-direction: column; padding: 1rem; text-decoration: none; color: inherit;">
                        <div class="document-card-top">
                            <h3 class="document-card-title">
                                <i class="fas <?php echo htmlspecialchars($doc['icon']); ?>" style="margin-right: 0.5rem; opacity: 0.8; color: var(--color-primary);"></i>
                                <?php echo htmlspecialchars($doc['title']); ?>
                            </h3>
                            <span class="document-card-type"><?php echo htmlspecialchars($doc['type']); ?></span>
                        </div>
                        <p class="document-card-path" style="margin: 0.75rem 0; flex-grow: 1;"><?php echo htmlspecialchars($doc['description']); ?></p>
                        <div class="document-card-meta">
                            <span class="document-card-category"><?php echo htmlspecialchars($doc['category']); ?></span>
                            <span style="font-weight: 700; color: var(--color-primary); font-size: 0.8rem; display: inline-flex; align-items: center; gap: 0.25rem;">
                                Read Document <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                            </span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <p id="documents-empty" class="documents-empty" style="display: none;">No documents match your current filters.</p>
    </section>
</main>

<!-- DOCUMENT POPUP OVERLAY (Client-Side JS Driven) -->
<div class="doc-popup-backdrop" id="doc-popup" onclick="closePopupOnBackdrop(event)">
    <div class="doc-popup-container">
        <div class="doc-popup-header">
            <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                <div style="display: flex; gap: 0.5rem; align-items: center;">
                    <span id="popup-category" class="badge-pill badge-cat" style="font-size: 0.7rem; padding: 0.15rem 0.55rem;">Category</span>
                    <span id="popup-type" class="badge-pill badge-type" style="font-size: 0.7rem; padding: 0.15rem 0.55rem;">Type</span>
                </div>
                <h2 id="popup-title" class="doc-popup-title" style="margin: 0; font-size: 1.35rem; font-weight: 800; color: var(--color-text-main);">Document Title</h2>
            </div>
            <button class="doc-popup-close" onclick="closeDocPopup()" aria-label="Close document">&times;</button>
        </div>
        <div class="doc-popup-body" id="popup-body-content">
            <!-- Dynamically Injected by JS -->
        </div>
    </div>
</div>

<script>
    const documentsData = <?php echo json_encode($documents); ?>;

    function openDocPopup(id) {
        const doc = documentsData[id];
        if (!doc) return;

        // Update modal header contents
        document.getElementById('popup-category').innerText = doc.category;
        document.getElementById('popup-type').innerText = doc.type;
        document.getElementById('popup-title').innerText = doc.title;

        const bodyContainer = document.getElementById('popup-body-content');
        bodyContainer.innerHTML = ''; // Clear previous contents

        if (doc.type === 'PDF' && doc.embeddable) {
            // Build PDF iframe embed
            const iframe = document.createElement('iframe');
            iframe.src = doc.url;
            iframe.className = 'doc-popup-iframe';
            iframe.title = doc.title;
            bodyContainer.appendChild(iframe);
        } else {
            // Build Redirect Launch panel
            const panel = document.createElement('div');
            panel.className = 'action-panel';
            panel.style.padding = '4rem 2rem';
            panel.innerHTML = `
                <i class="fas ${doc.icon}" style="font-size: 4rem; color: var(--color-primary); margin-bottom: 1.5rem;"></i>
                <h3 style="margin: 0; font-weight: 800; font-size: 1.5rem; color: var(--color-text-main);">Interactive Resource Guide</h3>
                <p style="max-width: 500px; margin: 0.5rem 0 2rem 0; color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.5;">${doc.description}</p>
                <a href="${doc.url}" class="action-btn-primary" style="padding: 0.9rem 2.5rem; font-size: 1.05rem;">
                    Launch Document Guide <i class="fas fa-arrow-right"></i>
                </a>
            `;
            bodyContainer.appendChild(panel);
        }

        // Show the popup overlay
        const modal = document.getElementById('doc-popup');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevent background page scrolling
    }

    function closeDocPopup() {
        const modal = document.getElementById('doc-popup');
        modal.style.display = 'none';
        document.body.style.overflow = ''; // Restore background page scrolling
        
        // Wipe container to stop background loading
        document.getElementById('popup-body-content').innerHTML = '';
    }

    function closePopupOnBackdrop(event) {
        if (event.target === document.getElementById('doc-popup')) {
            closeDocPopup();
        }
    }

    function filterDocuments() {
        const searchInput = document.getElementById('documents-search');
        const categorySelect = document.getElementById('documents-category');
        const typeSelect = document.getElementById('documents-type');
        const cards = document.querySelectorAll('.document-card');
        const emptyState = document.getElementById('documents-empty');

        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedCategory = categorySelect.value;
        const selectedType = typeSelect.value;

        let visibleCount = 0;

        cards.forEach((card) => {
            const title = card.getAttribute('data-title') || '';
            const desc = card.getAttribute('data-desc') || '';
            const category = card.getAttribute('data-category') || '';
            const type = card.getAttribute('data-type') || '';

            const matchesSearch = searchTerm === '' || title.includes(searchTerm) || desc.includes(searchTerm);
            const matchesCategory = selectedCategory === '' || category === selectedCategory;
            const matchesType = selectedType === '' || type === selectedType;

            if (matchesSearch && matchesCategory && matchesType) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }
</script>

<?php include 'src/footer.php'; ?>
