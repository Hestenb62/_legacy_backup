/**
 * EngageNY / CCSS Math Curriculum Loader
 * Dynamically loads standard data from assets/data/curriculum-engageny.json
 */
(function() {
    window.curriculumData = window.curriculumData || {};
    
    function mergeCurriculumData(target, source) {
        for (const key in source) {
            if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
                if (!target[key]) target[key] = {};
                mergeCurriculumData(target[key], source[key]);
            } else {
                target[key] = source[key];
            }
        }
    }

    // Determine target path for the JSON file
    let jsonUrl = '/assets/data/curriculum-engageny.json';
    const currentScript = document.currentScript || document.querySelector('script[src*="curriculum-engageny"]');
    if (currentScript && currentScript.src) {
        try {
            const parsed = new URL(currentScript.src, window.location.href);
            jsonUrl = parsed.pathname.replace(/\/js\/curriculum-engageny\.js$/, '/data/curriculum-engageny.json');
        } catch (e) {
            // fallback to default root-relative path
        }
    }

    // Fetch and populate curriculum standards
    fetch(jsonUrl)
        .then(response => {
            if (!response.ok) {
                // Secondary fallback attempt for relative path
                return fetch('assets/data/curriculum-engageny.json');
            }
            return response;
        })
        .then(res => res.json())
        .then(data => {
            mergeCurriculumData(window.curriculumData, data);
            window.curriculumDataLoaded = true;
            window.dispatchEvent(new CustomEvent('curriculum-loaded', { detail: data }));
            
            // Re-render standards page view if available
            if (typeof updateView === 'function') {
                updateView();
            }
        })
        .catch(err => {
            console.error('Failed to load curriculum-engageny.json:', err);
        });
})();

var curriculumData = window.curriculumData;