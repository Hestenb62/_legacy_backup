    /* ==========================================================================
       2. View Mode Switcher (Carousel, Grid, List)
       ========================================================================== */
    function initViewSwitcher() {
        const savedMode = localStorage.getItem('hesten_library_view_mode') || 'carousel';
        window.switchLibraryView(savedMode, false);
    }

    window.switchLibraryView = function (mode, save = true) {
        const container = document.getElementById('library-catalog-container');
        if (!container) return;

        container.classList.remove('view-carousel', 'view-grid', 'view-list');
        container.classList.add(`view-${mode}`);

        document.querySelectorAll('.view-switch-btn').forEach(btn => {
            btn.classList.toggle('active', btn.id === `view-mode-${mode}`);
        });

        if (save) {
            try {
                localStorage.setItem('hesten_library_view_mode', mode);
            } catch (err) {}
        }
    };
