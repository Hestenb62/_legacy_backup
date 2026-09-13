<?php
/**
 * profile.php - User Dashboard and Progress Tracker
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

$pageTitle = "My Profile & Progress | Hesten's Learning";
$pageDescription = "View your reading progress, edit your profile, and manage saved bookmarks and highlights.";

include ABSPATH . '../src/header.php';
?>

<!-- Import library and reader CSS for base layouts and typography -->
<link rel="stylesheet" href="../assets/css/library-main.css">
<link rel="stylesheet" href="../assets/css/reader-main.css">
<link rel="stylesheet" href="../assets/css/pages/profile.css">

<style>
/* Gamification Badges */
.badges-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
    gap: var(--spacing-4);
    margin-top: var(--spacing-4);
}

.badge-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: var(--spacing-2);
    opacity: 0.4;
    filter: grayscale(100%);
    transition: all 0.3s ease;
}

.badge-item.unlocked {
    opacity: 1;
    filter: grayscale(0%);
}

.badge-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--color-bg-surface);
    border: 2px solid var(--color-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: var(--color-text-muted);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.badge-item.unlocked .badge-icon {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(236, 72, 153, 0.1));
    border-color: var(--color-primary);
    color: var(--color-primary);
    box-shadow: 0 0 15px rgba(79, 70, 229, 0.3);
}

.badge-item.unlocked .badge-icon.gold { border-color: #f59e0b; color: #f59e0b; box-shadow: 0 0 15px rgba(245, 158, 11, 0.3); }
.badge-item.unlocked .badge-icon.green { border-color: #10b981; color: #10b981; box-shadow: 0 0 15px rgba(16, 185, 129, 0.3); }

.badge-title {
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--color-text-main);
}
</style>

<main id="main-content" class="library-main profile-main-layout">
    <!-- Aurora Mesh Background -->
    <div class="library-aurora-bg">
        <div class="library-aurora-blob" style="top: 10%; left: 10%; background: var(--lib-primary); width: 40vw; height: 40vw; animation-delay: 0s;"></div>
        <div class="library-aurora-blob" style="top: 40%; right: 5%; background: var(--lib-secondary); width: 35vw; height: 35vw; animation-delay: -5s;"></div>
        <div class="library-aurora-blob" style="bottom: 5%; left: 20%; background: var(--lib-accent); width: 45vw; height: 45vw; animation-delay: -10s;"></div>
    </div>

    <div class="library-workspace">
        <header class="reader-hero-header animate-reveal" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1 class="reader-main-title">My Profile</h1>
                <p class="reader-main-author">Manage your identity and track your learning progress.</p>
            </div>
        </header>

        <!-- Announcement Banner -->
        <div class="profile-announcement-banner animate-reveal" id="profile-announcement-banner">
            <div class="announcement-content">
                <span class="announcement-badge"><i class="fas fa-sync fa-spin"></i> Data Sync Update</span>
                <p class="announcement-text">Updates are being added to have all user data sync across your devices.</p>
            </div>
            <button type="button" class="announcement-close-btn" id="dismiss-announcement-btn" aria-label="Dismiss Announcement">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="profile-grid">
            <!-- Left Column: Identity & Settings -->
            <div class="profile-col profile-col-left">
                <!-- Identity Card -->
                <section class="profile-card animate-reveal">
                    <h2 class="profile-card-title"><i class="fas fa-id-badge"></i> Identity</h2>
                    
                    <div class="profile-identity-wrap">
                        <div class="profile-avatar-container">
                            <img src="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="User Avatar" class="profile-avatar-large" id="profile-avatar-preview">
                            <label for="profile-avatar-upload" class="profile-avatar-upload-btn" title="Upload new picture">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="profile-avatar-upload" accept="image/*" class="hidden">
                        </div>
                        
                        <div class="profile-form-group">
                            <label for="profile-first-name" class="profile-label">First Name</label>
                            <input type="text" id="profile-first-name" class="profile-input" placeholder="Enter your first name...">
                        </div>
                        
                        <button type="button" id="profile-save-btn" class="profile-btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <p id="profile-save-msg" class="profile-msg hidden">Saved successfully!</p>
                    </div>
                </section>
                
                <!-- Progress Stats Card -->
                <section class="profile-card animate-reveal" style="animation-delay: 0.1s">
                    <h2 class="profile-card-title"><i class="fas fa-chart-line"></i> Learning Progress</h2>
                    <div class="profile-stats-grid">
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-streak" style="color: #f59e0b;">1 🔥</div>
                            <div class="profile-stat-label">Daily Streak</div>
                        </div>
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-study-mins" style="color: var(--color-primary);">0m</div>
                            <div class="profile-stat-label">Today's Focus</div>
                        </div>
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-bookmarks">0</div>
                            <div class="profile-stat-label">Saved Items</div>
                        </div>
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-highlights">0</div>
                            <div class="profile-stat-label">Highlights</div>
                        </div>
                    </div>

                    <!-- Daily Goal Widget -->
                    <div class="daily-goal-card">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                            <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-text-main); display: flex; align-items: center; gap: 0.4rem;">
                                <i class="fas fa-bullseye" style="color: var(--color-primary);"></i> Daily Focus Goal (20m)
                            </span>
                            <span id="goal-progress-pct" style="font-size: 0.8rem; font-weight: 800; color: var(--color-primary);">0% (0/20m)</span>
                        </div>
                        <div style="height: 8px; background-color: var(--color-border); border-radius: 9999px; overflow: hidden;">
                            <div id="goal-progress-fill" style="height: 100%; width: 0%; background: linear-gradient(90deg, var(--color-primary), var(--color-secondary)); border-radius: 9999px; transition: width 0.6s ease;"></div>
                        </div>
                    </div>
                </section>
                
                <!-- Achievements Card -->
                <section class="profile-card animate-reveal" style="animation-delay: 0.15s">
                    <h2 class="profile-card-title"><i class="fas fa-medal"></i> Achievements</h2>
                    <div class="badges-grid" id="badges-container">
                        <!-- Populated by JS -->
                    </div>
                </section>
            </div>

            <!-- Right Column: Activity Tabs -->
            <div class="profile-col profile-col-right animate-reveal" style="animation-delay: 0.2s">
                <section class="profile-card profile-activity-card">
                    <div class="profile-tabs-row" role="tablist">
                        <button type="button" class="profile-tab-btn active" id="tab-all-bookmarks" data-category="all" role="tab"><i class="fas fa-bookmark"></i> All Saved</button>
                        <button type="button" class="profile-tab-btn" id="tab-books" data-category="book" role="tab"><i class="fas fa-book"></i> Books</button>
                        <button type="button" class="profile-tab-btn" id="tab-lessons" data-category="lesson" role="tab"><i class="fas fa-graduation-cap"></i> Lessons</button>
                        <button type="button" class="profile-tab-btn" id="tab-highlights" data-category="highlights" role="tab"><i class="fas fa-highlighter"></i> Highlights</button>
                    </div>
                    
                    <div class="profile-tab-content">
                        <!-- Bookmarks Tab Pane -->
                        <div id="content-books" class="profile-tab-pane">
                            <div class="profile-empty-state hidden" id="empty-books">
                                <i class="fas fa-bookmark"></i>
                                <p id="empty-bookmarks-msg">You haven't saved any items yet.</p>
                                <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap; margin-top: 0.75rem;">
                                    <a href="/levels/" class="profile-btn-secondary" style="font-size: 0.8125rem;"><i class="fas fa-layer-group"></i> Browse Levels</a>
                                    <a href="/library/" class="profile-btn-secondary" style="font-size: 0.8125rem;"><i class="fas fa-book-open"></i> Explore Library</a>
                                </div>
                            </div>
                            <div id="list-books" class="profile-list">
                                <!-- Populated by JS -->
                            </div>
                        </div>
                        
                        <!-- Highlights Tab -->
                        <div id="content-highlights" class="profile-tab-pane hidden">
                            <div class="profile-empty-state hidden" id="empty-highlights">
                                <i class="fas fa-highlighter"></i>
                                <p>You haven't made any highlights yet.</p>
                            </div>
                            <div id="list-highlights" class="profile-list">
                                <!-- Populated by JS -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Literary Reading Tracker & Daily Streak Section -->
        <section class="profile-card animate-reveal" style="margin-top: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <h2 class="profile-card-title" style="margin-bottom: 0.25rem;">
                        <i class="fas fa-book-reader" style="color: #f97316;"></i> Literary Reading Streak & Log
                    </h2>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">
                        Track your active digital library reading sessions, daily reading streaks, and literature explored.
                    </p>
                </div>
                <a href="/library/" class="profile-btn-secondary" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; width: auto; padding: 0.5rem 1.25rem; border-radius: 9999px; font-size: 0.8rem;">
                    <i class="fas fa-book-open"></i> Open Library
                </a>
            </div>

            <!-- Reading Metrics Row -->
            <div class="standards-summary-row">
                <div class="std-summary-box">
                    <div class="std-summary-num" id="reading-stat-streak" style="color: #f97316;">0 Days</div>
                    <div class="std-summary-label">Current Reading Streak 🔥</div>
                </div>
                <div class="std-summary-box">
                    <div class="std-summary-num" id="reading-stat-today" style="color: var(--color-primary, #4f46e5);">0 min</div>
                    <div class="std-summary-label">Read Today ⏱️</div>
                </div>
                <div class="std-summary-box">
                    <div class="std-summary-num" id="reading-stat-total" style="color: var(--color-success, #10b981);">0 min</div>
                    <div class="std-summary-label">Total Time in Library 📚</div>
                </div>
                <div class="std-summary-box">
                    <div class="std-summary-num" id="reading-stat-books">0</div>
                    <div class="std-summary-label">Books Explored 📖</div>
                </div>
            </div>
        </section>

        <!-- Standard Mastery Matrix Section -->
        <section class="profile-card animate-reveal" style="margin-top: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <h2 class="profile-card-title" style="margin-bottom: 0.25rem;">
                        <i class="fas fa-certificate" style="color: var(--color-primary);"></i> Standard Mastery Tracker
                    </h2>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">
                        Real-time competency tracking across state & national academic standards (CCSS, NGSS, NCSS, TEKS).
                    </p>
                </div>
                
                <div class="standards-filter-pills" id="standards-subject-filters">
                    <button type="button" class="std-filter-pill active" data-subject="All">All Subjects</button>
                    <button type="button" class="std-filter-pill" data-subject="Math">Math</button>
                    <button type="button" class="std-filter-pill" data-subject="Language Arts">ELA</button>
                    <button type="button" class="std-filter-pill" data-subject="Science">Science</button>
                    <button type="button" class="std-filter-pill" data-subject="Social Studies">Social Studies</button>
                </div>
            </div>

            <!-- Overview Metrics -->
            <div class="standards-summary-row">
                <div class="std-summary-box">
                    <div class="std-summary-num" id="std-stat-tested">0</div>
                    <div class="std-summary-label">Standards Tested</div>
                </div>
                <div class="std-summary-box">
                    <div class="std-summary-num" id="std-stat-mastered" style="color: var(--color-success, #10b981);">0</div>
                    <div class="std-summary-label">Mastered (&ge;80%)</div>
                </div>
                <div class="std-summary-box">
                    <div class="std-summary-num" id="std-stat-avg-score" style="color: var(--color-primary, #4f46e5);">0%</div>
                    <div class="std-summary-label">Average Proficiency</div>
                </div>
            </div>

            <!-- Standards Grid Container -->
            <div id="standards-matrix-grid" class="standards-matrix-grid">
                <!-- Populated dynamically by JS -->
            </div>

            <!-- Empty State if no tests taken yet -->
            <div id="standards-empty-state" class="standards-empty-state" style="display: none;">
                <div style="width: 4rem; height: 4rem; border-radius: 9999px; background: color-mix(in srgb, var(--color-primary, #4f46e5) 12%, transparent); color: var(--color-primary, #4f46e5); display: flex; align-items: center; justify-content: center; font-size: 1.75rem; margin: 0 auto 1rem auto;">
                    <i class="fas fa-award"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--color-text-main);">No Standards Tested Yet</h3>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); max-width: 460px; margin: 0 auto 1.5rem auto; line-height: 1.6;">
                    Take a targeted standard diagnostic or entrance exam to certify your proficiency and build your mastery badge collection!
                </p>
                <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
                    <a href="/pages/standards.php" class="profile-btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; width: auto; padding: 0.75rem 1.75rem; border-radius: 9999px;">
                        <i class="fas fa-book"></i> Browse Standards Guide
                    </a>
                    <a href="/assessment/" class="profile-btn-secondary" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; width: auto; padding: 0.75rem 1.75rem; border-radius: 9999px;">
                        <i class="fas fa-play"></i> Start Assessment
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>

<script src="../assets/js/profile-main.js?v=1.2" defer></script>

<?php include ABSPATH . '../src/footer.php'; ?>
