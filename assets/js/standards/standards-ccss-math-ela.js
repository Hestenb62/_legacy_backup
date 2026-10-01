/**
 * Common Core State Standards (CCSS) Math & ELA Curriculum Loader
 * Dynamically loads standard data and curriculum outlines from:
 *   - assets/data/standards-ccss-math.json (Common Core Mathematics)
 *   - assets/data/standards-ccss-ela.json  (Common Core English Language Arts)
 *   - assets/data/standards-ngss-science.json (NGSS Science)
 *   - assets/data/standards-c3-social.json (C3 Social Studies)
 *   - assets/data/curriculum-engageny-math.json (EngageNY Mathematics Outline)
 */
(function() {
    window.curriculumData = window.curriculumData || {};
    window.curriculumOutlines = window.curriculumOutlines || {};
    
    function mergeCurriculumData(target, source) {
        for (const key in source) {
            // Skip metadata comments keys (keys starting with _)
            if (key.startsWith('_')) continue;
            
            if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
                if (!target[key]) target[key] = {};
                mergeCurriculumData(target[key], source[key]);
            } else {
                if ((key === 'standards' || key === 'overview') && Array.isArray(source[key])) {
                    target[key] = source[key].join('\n');
                } else {
                    target[key] = source[key];
                }
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
        { name: 'math',          type: 'standards', url: baseDataDir + 'standards-ccss-math.json',       fallback: 'assets/data/standards-ccss-math.json' },
        { name: 'ela',           type: 'standards', url: baseDataDir + 'standards-ccss-ela.json',        fallback: 'assets/data/standards-ccss-ela.json' },
        { name: 'science',       type: 'standards', url: baseDataDir + 'standards-ngss-science.json',    fallback: 'assets/data/standards-ngss-science.json' },
        { name: 'social',        type: 'standards', url: baseDataDir + 'standards-c3-social.json',      fallback: 'assets/data/standards-c3-social.json' },
        { name: 'engagenyMath',  type: 'outline',   url: baseDataDir + 'curriculum-engageny-math.json',  fallback: 'assets/data/curriculum-engageny-math.json' }
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
            .then(text => ({
                name: item.name,
                type: item.type || 'standards',
                data: parseJSONC(text)
            }))
            .catch(err => {
                console.warn(`Failed to load ${item.name} JSON:`, err);
                return { name: item.name, type: item.type || 'standards', data: null };
            });
    }

    // Load standards and curriculum outlines concurrently
    Promise.all(filesToLoad.map(fetchFile))
        .then(results => {
            results.forEach(res => {
                if (!res || !res.data) return;
                if (res.type === 'outline') {
                    const currName = res.data.curriculum || 'engageny';
                    const subj = res.data.subject || 'math';
                    if (!window.curriculumOutlines[currName]) {
                        window.curriculumOutlines[currName] = {};
                    }
                    window.curriculumOutlines[currName][subj] = res.data;
                } else {
                    mergeCurriculumData(window.curriculumData, res.data);
                }
            });
            window.curriculumData.outlines = window.curriculumOutlines;
            window.curriculumDataLoaded = true;
            window.dispatchEvent(new CustomEvent('curriculum-loaded', {
                detail: {
                    standards: window.curriculumData,
                    outlines: window.curriculumOutlines
                }
            }));
            
            // Re-render view if on the standards page
            if (typeof updateView === 'function') {
                updateView();
            }
        })
        .catch(err => {
            console.error('Failed loading CCSS standards or curriculum outline JSON files:', err);
        });
})();

var curriculumData = window.curriculumData;
var curriculumOutlines = window.curriculumOutlines;
