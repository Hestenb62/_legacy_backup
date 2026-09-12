document.addEventListener('DOMContentLoaded', () => {
    const lexileWraps = document.querySelectorAll('#lexile-switcher-wrap, .lexile-switcher-wrap');
    const lexileSelects = document.querySelectorAll('#lexile-switcher-select, .lexile-switcher-select');
    const lexileVersions = document.querySelectorAll('.lexile-version');

    if (lexileVersions.length === 0 || lexileSelects.length === 0) {
        return; // No lexile versions available for this chapter
    }

    // Extract available versions
    const availableVersions = [];
    lexileVersions.forEach((el) => {
        const value = el.getAttribute('data-lexile');
        const label = el.getAttribute('data-lexile-label') || value;
        if (value) {
            availableVersions.push({ value, label, el });
        }
    });

    if (availableVersions.length === 0) return;

    // Populate dropdowns
    lexileSelects.forEach((select) => {
        select.innerHTML = '';
        availableVersions.forEach((v) => {
            const option = document.createElement('option');
            option.value = v.value;
            option.textContent = v.label;
            select.appendChild(option);
        });
    });

    // Make switchers visible
    lexileWraps.forEach((wrap) => {
        wrap.style.display = 'inline-flex';
    });

    // Determine initial selected version: URL param > localStorage > active element > first version
    const urlParams = new URLSearchParams(window.location.search);
    const paramLexile = urlParams.get('lexile');
    const savedLexile = localStorage.getItem('hl_preferred_lexile');

    let activeLexile = 'original';
    if (paramLexile && availableVersions.some(v => v.value === paramLexile)) {
        activeLexile = paramLexile;
    } else if (savedLexile && availableVersions.some(v => v.value === savedLexile)) {
        activeLexile = savedLexile;
    } else {
        const preActive = Array.from(lexileVersions).find(el => el.classList.contains('active'));
        if (preActive) {
            activeLexile = preActive.getAttribute('data-lexile') || availableVersions[0].value;
        } else {
            activeLexile = availableVersions[0].value;
        }
    }

    const applyLexileVersion = (targetLexile, shouldAnnounce = false) => {
        let activeLabel = targetLexile;
        lexileVersions.forEach((el) => {
            const isMatch = el.getAttribute('data-lexile') === targetLexile;
            if (isMatch) {
                el.style.display = 'block';
                el.classList.add('active');
                activeLabel = el.getAttribute('data-lexile-label') || targetLexile;
            } else {
                el.style.display = 'none';
                el.classList.remove('active');
            }
        });

        // Sync dropdown values
        lexileSelects.forEach((select) => {
            select.value = targetLexile;
        });

        // Save preference
        try {
            localStorage.setItem('hl_preferred_lexile', targetLexile);
        } catch (err) {
            // Ignore quota or private mode restrictions
        }

        // Announce for accessibility
        if (shouldAnnounce) {
            if (typeof window.announceA11y === 'function') {
                window.announceA11y(`Reading level changed to ${activeLabel}`);
            }
        }

        // Notify other components (TTS, reading progress bar, etc.)
        window.dispatchEvent(new CustomEvent('hl:lexile-changed', {
            detail: { lexile: targetLexile, label: activeLabel }
        }));
        window.dispatchEvent(new CustomEvent('hl:content-changed'));
    };

    // Apply initial state
    applyLexileVersion(activeLexile, false);

    // Bind event listeners
    lexileSelects.forEach((select) => {
        select.addEventListener('change', (e) => {
            applyLexileVersion(e.target.value, true);
        });
    });
});

