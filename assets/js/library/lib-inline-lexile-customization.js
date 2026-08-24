    /* ==========================================================================
       10. Inline Lexile Customization
       ========================================================================== */
    function setupLexileEditing() {
        const editBtn = document.getElementById('edit-lexile-btn');
        const saveBtn = document.getElementById('save-lexile-btn');
        const cancelBtn = document.getElementById('cancel-lexile-btn');
        const editCont = document.getElementById('modal-lexile-edit-container');
        const input = document.getElementById('modal-lexile-input');
        const lexileVal = document.getElementById('modal-lexile');

        if (!editBtn || !saveBtn || !cancelBtn || !editCont || !input || !lexileVal) return;

        editBtn.addEventListener('click', () => {
            input.value = lexileVal.textContent.trim();
            editCont.style.display = 'flex';
            editBtn.style.display = 'none';
            input.focus();
        });

        saveBtn.addEventListener('click', () => {
            const newVal = input.value.trim();
            if (newVal && window.currentBookId) {
                lexileVal.textContent = newVal;
                saveLexileOverride(window.currentBookId, newVal);
            }
            editCont.style.display = 'none';
            editBtn.style.display = 'inline-flex';
        });

        cancelBtn.addEventListener('click', () => {
            editCont.style.display = 'none';
            editBtn.style.display = 'inline-flex';
        });
    }

    function saveLexileOverride(bookId, val) {
        try {
            const overrides = JSON.parse(localStorage.getItem('hesten_lexile_overrides') || '{}');
            overrides[bookId] = val;
            localStorage.setItem('hesten_lexile_overrides', JSON.stringify(overrides));
            applyStoredLexileOverrides();
        } catch (e) {}
    }

    function applyStoredLexileOverrides() {
        try {
            const overrides = JSON.parse(localStorage.getItem('hesten_lexile_overrides') || '{}');
            Object.keys(overrides).forEach(id => {
                const cards = document.querySelectorAll(`.library-book-card[data-id="${id}"]`);
                cards.forEach(c => {
                    c.dataset.lexile = overrides[id];
                    const tag = c.querySelector('.lexile-tag');
                    if (tag) tag.innerHTML = `<i class="fas fa-brain"></i> ${overrides[id]}`;
                });
            });
        } catch (e) {}
    }
