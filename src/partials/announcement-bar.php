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

    <script src="/assets/js/announcements.js"></script>
