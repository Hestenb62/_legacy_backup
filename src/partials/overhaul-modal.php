<!-- Full-Screen Site Overhaul Announcement Modal for New Visitors -->
<div id="site-overhaul-modal" class="overhaul-modal hidden" role="dialog" aria-modal="true" aria-labelledby="overhaul-modal-title" aria-describedby="overhaul-modal-desc">
    <div class="overhaul-modal-backdrop" id="overhaul-modal-backdrop"></div>
    <div class="overhaul-modal-dialog">
        <div class="overhaul-modal-content">
            <!-- Close Button -->
            <button type="button" id="close-overhaul-modal" class="overhaul-modal-close" aria-label="Acknowledge notice and continue to site">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>

            <!-- Modal Header -->
            <div class="overhaul-modal-header">
                <div class="overhaul-icon-badge">
                    <i class="fas fa-tools" aria-hidden="true"></i>
                </div>
                <div class="overhaul-header-text">
                    <span class="overhaul-pill">
                        <i class="fas fa-sparkles text-amber-400" aria-hidden="true"></i> Platform Modernization
                    </span>
                    <h2 id="overhaul-modal-title" class="overhaul-title">Welcome to Hesten's Learning</h2>
                </div>
            </div>

            <!-- Modal Intro Description -->
            <p id="overhaul-modal-desc" class="overhaul-lead">
                Our platform is currently undergoing a comprehensive, site-wide modernization. We are committed to complete transparency regarding active updates:
            </p>

            <!-- 4-Point Notice Grid -->
            <div class="overhaul-grid">
                <!-- Point 1: Overhaul in Progress -->
                <div class="overhaul-card">
                    <div class="overhaul-card-icon icon-amber">
                        <i class="fas fa-hammer" aria-hidden="true"></i>
                    </div>
                    <div class="overhaul-card-body">
                        <h3 class="overhaul-card-title">Active Site Overhaul</h3>
                        <p class="overhaul-card-text">We are continuously refactoring learning modules, study tools, and accessibility engines to deliver a best-in-class educational experience.</p>
                    </div>
                </div>

                <!-- Point 2: Missing / In-Progress Features -->
                <div class="overhaul-card">
                    <div class="overhaul-card-icon icon-rose">
                        <i class="fas fa-puzzle-piece" aria-hidden="true"></i>
                    </div>
                    <div class="overhaul-card-body">
                        <h3 class="overhaul-card-title">Evolving & Missing Features</h3>
                        <p class="overhaul-card-text">Certain interactive exercises or buttons may not function yet or may be temporarily missing while their underlying code is modernized.</p>
                    </div>
                </div>

                <!-- Point 3: Changing Aesthetics & Layouts -->
                <div class="overhaul-card">
                    <div class="overhaul-card-icon icon-indigo">
                        <i class="fas fa-paint-brush" aria-hidden="true"></i>
                    </div>
                    <div class="overhaul-card-body">
                        <h3 class="overhaul-card-title">Dynamic Looks & Layouts</h3>
                        <p class="overhaul-card-text">Visual styles, typography, color palettes, and component placements may change from time to time as updates deploy and pages reload.</p>
                    </div>
                </div>

                <!-- Point 4: Data Sync Feature -->
                <div class="overhaul-card highlight-card">
                    <div class="overhaul-card-icon icon-emerald">
                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                    </div>
                    <div class="overhaul-card-body">
                        <h3 class="overhaul-card-title">Enable Cloud Data Sync</h3>
                        <p class="overhaul-card-text">To keep your student mastery, teacher rosters, and parent accommodations safe and synced across visits, please visit the <strong>Settings page</strong> and turn on <strong>Google Drive Auto-Sync</strong>.</p>
                    </div>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="overhaul-modal-footer">
                <a href="/pages/settings.php" id="btn-overhaul-settings" class="overhaul-btn overhaul-btn-secondary">
                    <i class="fas fa-cog" aria-hidden="true"></i> Go to Settings & Data Sync
                </a>
                <button type="button" id="btn-overhaul-acknowledge" class="overhaul-btn overhaul-btn-primary">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> I Understand & Explore
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/global-overhaul-notice.js') : '/assets/js/global-overhaul-notice.js' ?>"></script>
