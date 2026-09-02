document.addEventListener('DOMContentLoaded', () => {
    const lexileSwitcherWrap = document.getElementById('lexile-switcher-wrap');
    const lexileSelect = document.getElementById('lexile-switcher-select');
    const lexileVersions = document.querySelectorAll('.lexile-version');

    if (!lexileSwitcherWrap || !lexileSelect || lexileVersions.length === 0) {
        return; // No lexile versions available for this chapter
    }

    // Populate dropdown with available versions
    lexileVersions.forEach((el) => {
        const value = el.getAttribute('data-lexile');
        const label = el.getAttribute('data-lexile-label') || value;
        const option = document.createElement('option');
        option.value = value;
        option.textContent = label;
        lexileSelect.appendChild(option);
    });

    // Make the switcher visible
    lexileSwitcherWrap.style.display = 'inline-flex';

    // Handle selection change
    lexileSelect.addEventListener('change', (e) => {
        const selectedLexile = e.target.value;
        
        lexileVersions.forEach((el) => {
            if (el.getAttribute('data-lexile') === selectedLexile) {
                el.style.display = 'block';
                el.classList.add('active');
            } else {
                el.style.display = 'none';
                el.classList.remove('active');
            }
        });
    });
});
