/**
 * Global Site Overhaul Announcement Controller
 * Displays a full-screen notification to new visitors regarding active modernization,
 * potential missing/shifting features, and guiding them to Settings Data Sync.
 */
(function() {
    'use strict';

    const OVERHAUL_NOTICE_VERSION = 'v1.0';
    const STORAGE_KEY = 'hl_overhaul_notice_dismissed';

    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('site-overhaul-modal');
        if (!modal) return;

        const backdrop = document.getElementById('overhaul-modal-backdrop');
        const closeBtn = document.getElementById('close-overhaul-modal');
        const ackBtn = document.getElementById('btn-overhaul-acknowledge');
        const settingsBtn = document.getElementById('btn-overhaul-settings');

        let previousActiveElement = null;

        function openOverhaulModal() {
            previousActiveElement = document.activeElement;
            modal.classList.remove('hidden');
            modal.classList.add('visible');
            document.body.classList.add('overhaul-modal-open');

            // Set focus to the primary acknowledge button for immediate keyboard access
            setTimeout(() => {
                if (ackBtn) ackBtn.focus();
            }, 100);
        }

        function closeOverhaulModal(persist = true) {
            modal.classList.add('closing');
            setTimeout(() => {
                modal.classList.remove('visible', 'closing');
                modal.classList.add('hidden');
                document.body.classList.remove('overhaul-modal-open');

                if (persist) {
                    try {
                        localStorage.setItem(STORAGE_KEY, OVERHAUL_NOTICE_VERSION);
                    } catch (e) {}
                }

                // Restore focus
                if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
                    previousActiveElement.focus();
                }
            }, 300);
        }

        // Check if user has already dismissed this version of the notice
        const isDismissed = localStorage.getItem(STORAGE_KEY) === OVERHAUL_NOTICE_VERSION;
        if (!isDismissed) {
            // Slight delay for smooth initial layout render
            setTimeout(openOverhaulModal, 450);
        }

        // Close button handlers
        if (closeBtn) {
            closeBtn.addEventListener('click', () => closeOverhaulModal(true));
        }
        if (ackBtn) {
            ackBtn.addEventListener('click', () => closeOverhaulModal(true));
        }
        if (backdrop) {
            backdrop.addEventListener('click', () => closeOverhaulModal(true));
        }
        if (settingsBtn) {
            settingsBtn.addEventListener('click', () => {
                try {
                    localStorage.setItem(STORAGE_KEY, OVERHAUL_NOTICE_VERSION);
                } catch (e) {}
            });
        }

        // Keyboard Access: Escape key and Focus Trap (WCAG 2.1 Operable)
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('visible') || modal.classList.contains('hidden')) return;

            if (e.key === 'Escape') {
                e.preventDefault();
                closeOverhaulModal(true);
                return;
            }

            if (e.key === 'Tab') {
                const focusable = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                if (focusable.length === 0) return;

                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (e.shiftKey) {
                    if (document.activeElement === first) {
                        e.preventDefault();
                        last.focus();
                    }
                } else {
                    if (document.activeElement === last) {
                        e.preventDefault();
                        first.focus();
                    }
                }
            }
        });

        // Global opener method for testing or reopening via help links
        window.hlShowOverhaulNotice = function() {
            openOverhaulModal();
        };
    });
})();
