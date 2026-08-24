    /* ==========================================================================
       4. Horizontal Carousel Scroll Buttons
       ========================================================================== */
    function setupScrollButtons() {
        document.querySelectorAll('.library-row-section').forEach(section => {
            const row = section.querySelector('.library-books-row');
            const leftBtn = section.querySelector('.scroll-left');
            const rightBtn = section.querySelector('.scroll-right');

            if (row && leftBtn && rightBtn) {
                leftBtn.addEventListener('click', () => {
                    row.scrollBy({ left: -400, behavior: 'smooth' });
                });
                rightBtn.addEventListener('click', () => {
                    row.scrollBy({ left: 400, behavior: 'smooth' });
                });
            }
        });
    }
