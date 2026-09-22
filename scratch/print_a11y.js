const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

const marker = '"{\\n  \\"fetchTime\\":';
const idx = content.indexOf(marker);

const rawSlice = content.slice(idx, idx + 967782);
const unescaped = JSON.parse(rawSlice);
const lhr = JSON.parse(unescaped);

const a11yAuditRefs = lhr.categories.accessibility?.auditRefs || [];
console.log('=== FAILED A11Y AUDITS SUMMARY ===');
a11yAuditRefs.forEach(ref => {
    const a = lhr.audits[ref.id];
    if (a && a.score !== null && a.score < 1) {
        console.log(`[${ref.id}] (weight: ${ref.weight}) Score: ${a.score} | ${a.title}`);
        if (a.details?.items) {
            console.log(`  Items (${a.details.items.length}):`);
            a.details.items.forEach(it => {
                console.log(`    - ${it.node?.snippet || it.node?.selector || JSON.stringify(it)}`);
            });
        }
    }
});
