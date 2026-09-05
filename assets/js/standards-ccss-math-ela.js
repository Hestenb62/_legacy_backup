/**
 * Common Core State Standards (CCSS) Math & ELA Curriculum Loader
 * Dynamically loads standard data from:
 *   - assets/data/standards-ccss-math.json (Common Core Mathematics)
 *   - assets/data/standards-ccss-ela.json  (Common Core English Language Arts)
 */
(function() {
    window.curriculumData = window.curriculumData || {};
    
    function mergeCurriculumData(target, source) {
        for (const key in source) {
            // Skip metadata comments keys (keys starting with _)
            if (key.startsWith('_')) continue;
            
            if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
                if (!target[key]) target[key] = {};
                mergeCurriculumData(target[key], source[key]);
            } else {
                target[key] = source[key];
            }
        }
    }

    /**
     * Parses JSON text with support for single-line (//) and multi-line comments
     */
    function parseJSONC(text) {
        const clean = text
            .replace(/\/\*[\s\S]*?\*\//g, '')
            .replace(/^\s*\/\/.*$/gm, '');
        return JSON.parse(clean);
    }

    // Determine base directory for data files
    let baseDataDir = '/assets/data/';
    const currentScript = document.currentScript || document.querySelector('script[src*="standards-ccss-math-ela"]');
    if (currentScript && currentScript.src) {
        try {
            const parsed = new URL(currentScript.src, window.location.href);
            baseDataDir = parsed.pathname.replace(/\/js\/standards-ccss-math-ela\.js$/, '/data/');
        } catch (e) {
            // Keep default
        }
    }

    const filesToLoad = [
        { name: 'math', url: baseDataDir + 'standards-ccss-math.json', fallback: 'assets/data/standards-ccss-math.json' },
        { name: 'ela',  url: baseDataDir + 'standards-ccss-ela.json',  fallback: 'assets/data/standards-ccss-ela.json' }
    ];

    function fetchFile(item) {
        return fetch(item.url)
            .then(res => {
                if (!res.ok && item.fallback) {
                    return fetch(item.fallback);
                }
                return res;
            })
            .then(res => res.text())
            .then(text => parseJSONC(text))
            .catch(err => {
                console.warn(`Failed to load ${item.name} standards JSON:`, err);
                return null;
            });
    }

    // Load both math and ELA standards concurrently
    Promise.all(filesToLoad.map(fetchFile))
        .then(results => {
            results.forEach(data => {
                if (data) {
                    mergeCurriculumData(window.curriculumData, data);
                }
            });
            window.curriculumDataLoaded = true;
            window.dispatchEvent(new CustomEvent('curriculum-loaded', { detail: window.curriculumData }));
            
            // Re-render view if on the standards page
            if (typeof updateView === 'function') {
                updateView();
            }
        })
        .catch(err => {
            console.error('Failed loading CCSS standards JSON files:', err);
        });
})();

var curriculumData = window.curriculumData;
