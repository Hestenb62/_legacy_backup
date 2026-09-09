/**
 * assets/js/offline-status.js
 * Site-Wide Offline Connectivity Detection & Accessibility Announcement
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    function initOfflineIndicator() {
        let pill = document.getElementById('hl-offline-indicator');
        if (!pill) {
            pill = document.createElement('div');
            pill.id = 'hl-offline-indicator';
            pill.className = 'hl-offline-pill hidden';
            pill.setAttribute('role', 'status');
            pill.setAttribute('aria-live', 'polite');
            document.body.appendChild(pill);
        }

        let hideTimer = null;

        function showOffline() {
            clearTimeout(hideTimer);
            pill.className = 'hl-offline-pill is-offline';
            pill.innerHTML = '<i class="fas fa-wifi-slash" aria-hidden="true"></i> <span>Offline Mode Active &bull; Cached curriculum, library books, and updates remain accessible</span>';
            
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Internet connection lost. Offline mode active. All cached learning materials remain accessible.');
            }
        }

        function showOnline() {
            clearTimeout(hideTimer);
            pill.className = 'hl-offline-pill is-online';
            pill.innerHTML = '<i class="fas fa-wifi" aria-hidden="true"></i> <span>Back Online &bull; Cloud synchronization restored</span>';
            
            if (typeof window.announceA11y === 'function') {
                window.announceA11y('Internet connection restored.');
            }

            hideTimer = setTimeout(() => {
                pill.className = 'hl-offline-pill hidden';
            }, 3500);
        }

        window.addEventListener('offline', showOffline);
        window.addEventListener('online', showOnline);

        // If initially loaded while offline
        if (!navigator.onLine) {
            showOffline();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOfflineIndicator);
    } else {
        initOfflineIndicator();
    }
})();
