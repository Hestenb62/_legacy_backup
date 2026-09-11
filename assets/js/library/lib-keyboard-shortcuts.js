    /* ==========================================================================
       11. Keyboard Shortcuts & Global Handlers
       ========================================================================== */
    function setupKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                window.closeModal();
                window.closeDisclaimerModal();
                window.closeLexileInfoModal();
                window.closeDdcInfoModal();
                window.closeBookCitationModal();
                if (window.closeLibraryGuideModal) window.closeLibraryGuideModal();
            }
            // Press '/' to search catalog
            if (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                const search = document.getElementById('library-search');
                if (search) {
                    e.preventDefault();
                    search.focus();
                }
            }
        });
    }

