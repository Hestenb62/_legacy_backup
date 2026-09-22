const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

const marker = '"{\\n  \\"fetchTime\\":';
const idx = content.indexOf(marker);

const rawSlice = content.slice(idx, idx + 967782);
const unescaped = JSON.parse(rawSlice);
const lhr = JSON.parse(unescaped);

console.log('\n========================================');
console.log('=== LIGHTHOUSE CATEGORIES (MOBILE) ===');
console.log('========================================');
for (const [k, v] of Object.entries(lhr.categories || {})) {
    console.log(`${v.title}: ${Math.round(v.score * 100)} / 100`);
}

console.log('\n=== CORE METRICS ===');
const metrics = [
    'first-contentful-paint',
    'largest-contentful-paint',
    'total-blocking-time',
    'cumulative-layout-shift',
    'speed-index',
    'interactive'
];
metrics.forEach(m => {
    const a = lhr.audits[m];
    if (a) {
        console.log(`${a.title}: ${a.displayValue} (Score: ${Math.round(a.score * 100)})`);
    }
});

console.log('\n=== ALL FAILED / OPPORTUNITY AUDITS (Score < 0.9) ===');
for (const [id, a] of Object.entries(lhr.audits || {})) {
    if (a.score !== null && a.score < 0.9 && a.scoreDisplayMode !== 'notApplicable' && a.scoreDisplayMode !== 'informative') {
        console.log(`\n--------------------------------------------------`);
        console.log(`[${id}] ${a.title}`);
        console.log(`Score: ${Math.round(a.score * 100)} | Value: ${a.displayValue || 'N/A'}`);
        if (a.description) console.log(`Description: ${a.description.replace(/\[Learn more\].*$/i, '').trim()}`);
        if (a.details && a.details.items && a.details.items.length) {
            console.log(`Offending items (${a.details.items.length}):`);
            a.details.items.slice(0, 10).forEach(item => {
                const url = item.url || item.node?.snippet || item.node?.selector || item.source || '';
                const wastedMs = item.wastedMs ? `[wasted: ${item.wastedMs}ms]` : '';
                const wastedBytes = item.wastedBytes ? `[wasted: ${Math.round(item.wastedBytes/1024)}KB]` : '';
                const totalBytes = item.totalBytes ? `[total: ${Math.round(item.totalBytes/1024)}KB]` : '';
                console.log(`  * ${url} ${wastedMs} ${wastedBytes} ${totalBytes}`);
            });
        }
    }
}
