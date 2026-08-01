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
    
    const localData = {
    'math': {
        'desc': 'Detailed learning paths, state standards alignment, and core competencies for Mathematics.',
        'color': 'indigo',
        'icon': 'fa-calculator',
        'grades': {
            'Pre-K': {
                'teks': {
                    'title': 'Pre-K Math Foundations (Texas TEKS)',
                    'overview': '<p>Early introduction to numbers up to 10 and subitizing objects based on Texas Pre-Kindergarten Guidelines.</p>',
                    'standards': '<div class="curr-standard-item"><h4 class="curr-standard-title">TEKS PK.V.A</h4><p class="curr-standard-desc">Child demonstrates an understanding of numbers and counting up to 10.</p></div>',
                    'competencies': ['Number recognition up to 10', 'Subitizing visual patterns', 'Basic shape comparison'],
                    'level': 'A'
                }
            },
            'Kindergarten': {
                'teks': {
                    'title': 'Kindergarten Math Foundations (Texas TEKS)',
                    'overview': '<p>Focuses on counting, comparing sets, and identifying two-dimensional and three-dimensional shapes based on TEKS math curriculum.</p>',
                    'standards': '<div class="curr-standard-item"><h4 class="curr-standard-title">TEKS K.2.A</h4><p class="curr-standard-desc">Count forward and backward to at least 20 with and without objects.</p></div>',
                    'competencies': ['Count forward/backward to 20', 'Describe 2D & 3D shapes', 'Compare numbers up to 20'],
                    'level': 'B'
                }
            }
        }
    },
    'ela': {
        'desc': 'Literacy development, phonics, and classical literature analysis for every grade level.',
        'color': 'rose',
        'icon': 'fa-book-open',
        'grades': {
            'Pre-K': {
                'teks': {
                    'title': 'Pre-K Literacy & Phonics (Texas TEKS)',
                    'overview': '<p>Phonological awareness and alphabet recognition matching Texas pre-elementary standards.</p>',
                    'standards': '<div class="curr-standard-item"><h4 class="curr-standard-title">TEKS PK.III.A</h4><p class="curr-standard-desc">Child demonstrates phonological awareness skills.</p></div>',
                    'competencies': ['Name letters of alphabet', 'Produce rhyming words', 'Identify initial sounds'],
                }
            }
        }
    }
};
    
    mergeCurriculumData(window.curriculumData, localData);
})();
var curriculumData = window.curriculumData;