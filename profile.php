<?php
/**
 * profile.php - User Dashboard and Progress Tracker
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

$pageTitle = "My Profile & Progress | Hesten's Learning";
$pageDescription = "View your reading progress, edit your profile, and manage saved bookmarks and highlights.";

include ABSPATH . 'src/header.php';
?>

<!-- Import library and reader CSS for base layouts and typography -->
<link rel="stylesheet" href="/assets/css/library.css">
<link rel="stylesheet" href="/assets/css/reader.css">
<link rel="stylesheet" href="/assets/css/pages/profile.css">

<main id="main-content" class="library-main profile-main-layout">
    <!-- Aurora Mesh Background -->
    <div class="library-aurora-bg">
        <div class="library-aurora-blob" style="top: 10%; left: 10%; background: var(--lib-primary); width: 40vw; height: 40vw; animation-delay: 0s;"></div>
        <div class="library-aurora-blob" style="top: 40%; right: 5%; background: var(--lib-secondary); width: 35vw; height: 35vw; animation-delay: -5s;"></div>
        <div class="library-aurora-blob" style="bottom: 5%; left: 20%; background: var(--lib-accent); width: 45vw; height: 45vw; animation-delay: -10s;"></div>
    </div>

    <div class="library-workspace">
        <header class="reader-hero-header animate-reveal">
            <h1 class="reader-main-title">My Profile</h1>
            <p class="reader-main-author">Manage your identity and track your learning progress.</p>
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
                            <div class="profile-stat-num" id="stat-bookmarks">0</div>
                            <div class="profile-stat-label">Saved Books</div>
                        </div>
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-highlights">0</div>
                            <div class="profile-stat-label">Highlights</div>
                        </div>
                        <div class="profile-stat-box">
                            <div class="profile-stat-num" id="stat-notes">0</div>
                            <div class="profile-stat-label">Study Notes</div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Activity Tabs -->
            <div class="profile-col profile-col-right animate-reveal" style="animation-delay: 0.2s">
                <section class="profile-card profile-activity-card">
                    <div class="profile-tabs-row" role="tablist">
                        <button type="button" class="profile-tab-btn active" id="tab-books" role="tab">My Books</button>
                        <button type="button" class="profile-tab-btn" id="tab-highlights" role="tab">My Highlights</button>
                    </div>
                    
                    <div class="profile-tab-content">
                        <!-- Books Tab -->
                        <div id="content-books" class="profile-tab-pane">
                            <div class="profile-empty-state hidden" id="empty-books">
                                <i class="fas fa-book-open"></i>
                                <p>You haven't saved any books yet.</p>
                                <a href="/library/" class="profile-btn-secondary">Explore Library</a>
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
    </div>
</main>

<script src="/assets/js/profile.js" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>
