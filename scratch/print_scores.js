const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

const marker = '"{\\n  \\"fetchTime\\":';
const idx = content.indexOf(marker);

const rawSlice = content.slice(idx, idx + 967782);
const unescaped = JSON.parse(rawSlice);
const lhr = JSON.parse(unescaped);

for (const [k, v] of Object.entries(lhr.categories || {})) {
    console.log(`${v.title}: ${Math.round(v.score * 100)} / 100`);
}
console.log('--- METRICS ---');
const metrics = [
    'first-contentful-paint',
    'largest-contentful-paint',
    'total-blocking-time',
    'cumulative-layout-shift',
    'speed-index'
];
metrics.forEach(m => {
    const a = lhr.audits[m];
    if (a) {
        console.log(`${a.title}: ${a.displayValue} (${Math.round(a.score * 100)})`);
    }
});
