const fs = require('fs');
const path = require('path');

const indexFile = path.join(__dirname, 'library', 'index.php');
let content = fs.readFileSync(indexFile, 'utf-8');

// The new hero and dashboard HTML
const newHeroHtml = `
            <!-- Modern Cinematic Hero & Academic Dashboard -->
            <section class="library-modern-hero library-animate-reveal">
                <div class="hero-featured-book">
                    <div class="featured-bg-blur"></div>
                    <div class="featured-content">
                        <span class="featured-label"><i class="fas fa-star"></i> Featured Read</span>
                        <h1 class="featured-title">Narrative of the Life of Frederick Douglass</h1>
                        <p class="featured-desc">A profound and gripping autobiographical account of slavery, resilience, and the pursuit of freedom in 19th-century America.</p>
                        <div class="featured-actions">
                            <a href="/library/read/index.php?book=frederick-douglass-narrative" class="btn-primary-glow"><i class="fas fa-book-open"></i> Start Reading</a>
                            <button onclick="openBookModal('frederick-douglass-narrative')" class="btn-secondary-glass"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>

                <!-- Academic Dashboard Stats -->
                <div class="hero-academic-dashboard">
                    <div class="dashboard-greeting">
                        <h2>Welcome back, Scholar</h2>
                        <p>Your digital archive holds <span class="highlight-stat"><?php echo $totalCatalogBooks; ?></span> volumes.</p>
                    </div>
                    <div class="dashboard-stats-grid">
                        <div class="dash-stat-card">
                            <i class="fas fa-bookmark stat-icon" style="color: #6366f1;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-saved-count">0</span>
                                <span class="stat-label">Saved Books</span>
                            </div>
                        </div>
                        <div class="dash-stat-card">
                            <i class="fas fa-highlighter stat-icon" style="color: #ec4899;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-highlights-count">0</span>
                                <span class="stat-label">Highlights</span>
                            </div>
                        </div>
                        <div class="dash-stat-card">
                            <i class="fas fa-sticky-note stat-icon" style="color: #f59e0b;"></i>
                            <div class="stat-info">
                                <span class="stat-value" id="dash-notes-count">0</span>
                                <span class="stat-label">Study Notes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Populate Dashboard Stats
                const bookmarks = JSON.parse(localStorage.getItem('hesten_library_bookmarks')) || [];
                document.getElementById('dash-saved-count').textContent = bookmarks.length;

                let allHighlights = 0;
                let allNotes = 0;
                for (let i = 0; i < localStorage.length; i++) {
                    const key = localStorage.key(i);
                    if (key && key.startsWith('hesten_highlights_')) {
                        try {
                            const hls = JSON.parse(localStorage.getItem(key)) || [];
                            allHighlights += hls.length;
                            hls.forEach(hl => { if (hl.note) allNotes++; });
                        } catch(e) {}
                    }
                }
                document.getElementById('dash-highlights-count').textContent = allHighlights;
                document.getElementById('dash-notes-count').textContent = allNotes;
            });
            </script>
`;

// Regex to replace the old library-hero
const heroRegex = /<section class="library-hero">[\s\S]*?<\/section>/;

if (content.match(heroRegex)) {
    content = content.replace(heroRegex, newHeroHtml + '\n\n            <!-- Real-time Search and Multi-Facet Filters (Moved below hero) -->\n            <section class="library-search-wrapper library-animate-reveal" style="margin-top: 2rem;">' + content.match(/<div class="library-search-wrapper[^>]*>([\s\S]*?)<\/div>\s*<\/section>/)[1] + '</section>');
}

// Change default view to grid (Masonry)
content = content.replace(/class="library-content-container view-carousel"/, 'class="library-content-container view-grid masonry-active"');

fs.writeFileSync(indexFile, content, 'utf-8');
