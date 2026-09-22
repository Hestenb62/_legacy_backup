const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

const marker = '"{\\n  \\"fetchTime\\":';
const idx = content.indexOf(marker);

const rawSlice = content.slice(idx, idx + 967782);
const unescaped = JSON.parse(rawSlice);
const lhr = JSON.parse(unescaped);

console.log('=== DETAILED ISSUES BY CATEGORY ===');

// Check Accessibility audits that failed
console.log('\n--- ACCESSIBILITY ISSUES ---');
const a11yAuditRefs = lhr.categories.accessibility?.auditRefs || [];
a11yAuditRefs.forEach(ref => {
    const a = lhr.audits[ref.id];
    if (a && a.score !== null && a.score < 1) {
        console.log(`[${ref.id}] (weight: ${ref.weight}) ${a.title}: ${a.score}`);
        if (a.explanation) console.log(`  Explanation: ${a.explanation}`);
        if (a.details?.items) {
            a.details.items.forEach(it => {
                console.log(`  - snippet: ${it.node?.snippet || ''} | selector: ${it.node?.selector || ''} | explanation: ${it.node?.explanation || ''}`);
            });
        }
    }
});

// Check SEO audits that failed
console.log('\n--- SEO ISSUES ---');
const seoAuditRefs = lhr.categories.seo?.auditRefs || [];
seoAuditRefs.forEach(ref => {
    const a = lhr.audits[ref.id];
    if (a && a.score !== null && a.score < 1) {
        console.log(`[${ref.id}] (weight: ${ref.weight}) ${a.title}: ${a.score}`);
        if (a.explanation) console.log(`  Explanation: ${a.explanation}`);
        if (a.details?.items) {
            a.details.items.forEach(it => {
                console.log(`  - item: ${JSON.stringify(it)}`);
            });
        }
    }
});

// Check Performance issues
console.log('\n--- PERFORMANCE OPPORTUNITIES & DIAGNOSTICS ---');
const perfAuditRefs = lhr.categories.performance?.auditRefs || [];
perfAuditRefs.forEach(ref => {
    const a = lhr.audits[ref.id];
    if (a && a.score !== null && a.score < 0.9 && a.scoreDisplayMode !== 'notApplicable' && a.scoreDisplayMode !== 'informative') {
        console.log(`[${ref.id}] (weight: ${ref.weight}) ${a.title}: ${a.displayValue || a.score}`);
        if (a.details?.items) {
            a.details.items.slice(0, 5).forEach(it => {
                const u = it.url || it.node?.snippet || '';
                const wastedMs = it.wastedMs ? `${it.wastedMs}ms` : '';
                const wastedBytes = it.wastedBytes ? `${Math.round(it.wastedBytes/1024)}KB` : '';
                const totalBytes = it.totalBytes ? `${Math.round(it.totalBytes/1024)}KB` : '';
                console.log(`  - ${u} ${wastedMs} ${wastedBytes} ${totalBytes}`);
            });
        }
    }
});
