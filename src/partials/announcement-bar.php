    <!-- Announcement Bar -->
    <div id="announcement-bar" class="announcement-bar hidden" role="region" aria-label="Important Site Announcements">
        <div class="announcement-container">
            <!-- Navigation Buttons -->
            <button id="prev-announcement" class="announcement-nav-btn btn-prev" aria-label="Previous announcement" type="button">
                <i class="fas fa-chevron-left icon-left"></i>
            </button>
            
            <div id="announcement-content-container" class="announcement-content-wrapper">
                <p id="announcement-content" class="announcement-text">
                    <!-- Content will be injected by JS -->
                </p>
            </div>

            <div class="announcement-actions">
                <button id="info-announcement" class="announcement-nav-btn btn-info" aria-label="View announcement details" type="button" title="View details">
                    <i class="fas fa-info icon-info"></i>
                </button>
                <button id="next-announcement" class="announcement-nav-btn btn-next" aria-label="Next announcement" type="button">
                    <i class="fas fa-chevron-right icon-right"></i>
                </button>
                <div class="announcement-divider"></div>
                <button id="close-announcement" class="announcement-close-btn" aria-label="Close announcement" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- Progress Bar -->
        <div class="announcement-progress-container">
            <div id="announcement-progress" class="announcement-progress-bar"></div>
        </div>
    </div>
    
    <!-- Full-screen Popup Modal -->
    <div id="announcement-modal" class="announcement-modal hidden" role="dialog" aria-modal="true" aria-labelledby="announcement-modal-title">
        <div class="announcement-modal-backdrop" id="announcement-modal-backdrop"></div>
        <div class="announcement-modal-container">
            <div class="announcement-modal-card">
                <button id="close-announcement-modal" class="announcement-modal-close-btn" aria-label="Close details" type="button">
                    <i class="fas fa-times"></i>
                </button>
                <div class="announcement-modal-header">
                    <div class="announcement-modal-icon-container">
                        <i id="announcement-modal-icon" class="fas fa-info-circle"></i>
                    </div>
                    <h2 id="announcement-modal-title" class="announcement-modal-title"></h2>
                </div>
                <div id="announcement-modal-body" class="announcement-modal-body">
                    <!-- Expanded details will be injected here -->
                </div>
                <div class="announcement-modal-footer">
                    <button id="close-announcement-modal-btn" class="announcement-modal-btn" type="button">Got it</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/global-announcements.js"></script>
