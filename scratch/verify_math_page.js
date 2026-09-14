const fs = require('fs');

console.log('=== Verifying pages/math.php & Related Assets ===');

// 1. Check file existences
const files = [
    'pages/math.php',
    'assets/css/pages/math.css',
    'assets/js/pages/math-index.js'
];

files.forEach(f => {
    if (!fs.existsSync(f)) {
        console.error(`[FAIL] Missing file: ${f}`);
        process.exit(1);
    }
    const stat = fs.statSync(f);
    console.log(`[PASS] Exists: ${f} (${stat.size} bytes)`);
});

// 2. Validate JavaScript syntax
const jsContent = fs.readFileSync('assets/js/pages/math-index.js', 'utf8');
try {
    new Function(jsContent);
    console.log('[PASS] assets/js/pages/math-index.js syntax valid');
} catch (e) {
    console.error('[FAIL] JS Syntax Error:', e);
    process.exit(1);
}

// 3. Inspect pages/math.php
const phpContent = fs.readFileSync('pages/math.php', 'utf8');

// Check grade representation 1 through 12
for (let g = 1; g <= 12; g++) {
    const hasGrade = phpContent.includes(`'grade' => ${g}`);
    if (!hasGrade) {
        console.error(`[FAIL] Grade ${g} not found in pages/math.php`);
        process.exit(1);
    }
}
console.log('[PASS] All 12 grades (1 to 12) represented in curricular dataset');

// Check structural components
const requiredHooks = [
    'math-index-hero',
    'math-search-input',
    'math-az-ribbon',
    'math-az-sections-container',
    'math-az-letter-section',
    'math-lexicon-list',
    'math-term-card',
    'math-idx-def-box',
    'math-idx-does-box',
    'math-idx-howto-box',
    'math-idx-example-box',
    'math-codex-link',
    'math-empty-state',
    'math-toast',
    '$requiresMathJax = true'
];

requiredHooks.forEach(hook => {
    if (!phpContent.includes(hook)) {
        console.error(`[FAIL] Missing hook: ${hook}`);
        process.exit(1);
    }
});
console.log('[PASS] All structural hooks and CSS classes present');

// 4. Check HTML tag balances in HTML portion
const htmlOnly = phpContent.replace(/<\?(php|=)?[\s\S]*?\?>/gi, '');
const openDivs = (htmlOnly.match(/<div\b/gi) || []).length;
const closeDivs = (htmlOnly.match(/<\/div>/gi) || []).length;
if (openDivs !== closeDivs) {
    console.error(`[FAIL] Unbalanced div tags: <div ${openDivs} vs </div> ${closeDivs}`);
    process.exit(1);
}
console.log(`[PASS] Balanced div tags: ${openDivs} pairs`);

const openButtons = (htmlOnly.match(/<button\b/gi) || []).length;
const closeButtons = (htmlOnly.match(/<\/button>/gi) || []).length;
if (openButtons !== closeButtons) {
    console.error(`[FAIL] Unbalanced button tags: <button ${openButtons} vs </button> ${closeButtons}`);
    process.exit(1);
}
console.log(`[PASS] Balanced button tags: ${openButtons} pairs`);

console.log('=== All checks passed for pages/math.php! ===');
