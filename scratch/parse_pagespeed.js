const fs = require('fs');
const https = require('https');

const reportFile = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';

try {
    const raw = fs.readFileSync(reportFile, 'utf8');
    // Search for Lighthouse JSON or audits
    const auditMatch = raw.match(/\"lighthouseResult\"\s*:\s*(\{.+?\})\s*,\s*\"/);
    if (auditMatch) {
        console.log('Found lighthouseResult inside report HTML!');
        const lhr = JSON.parse(auditMatch[1]);
        printSummary(lhr);
        process.exit(0);
    }
} catch (e) {
    console.error('Error reading reportFile:', e.message);
}

// Alternatively, fetch live Google PageSpeed API for hestena62.com mobile
console.log('Querying Google PageSpeed API for https://hestena62.com/ (mobile)...');
const url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=https%3A%2F%2Fhestena62.com%2F&strategy=mobile&category=performance&category=accessibility&category=best-practices&category=seo';

https.get(url, (res) => {
    let data = '';
    res.on('data', chunk => data += chunk);
    res.on('end', () => {
        try {
            const json = JSON.parse(data);
            if (json.lighthouseResult) {
                printSummary(json.lighthouseResult);
            } else {
                console.log('API returned without lighthouseResult:', json.error || data.slice(0, 500));
            }
        } catch (err) {
            console.error('Failed to parse API response:', err.message);
        }
    });
}).on('error', err => {
    console.error('HTTPS error:', err.message);
});

function printSummary(lhr) {
    console.log('\n=== LIGHTHOUSE CATEGORIES ===');
    for (const [k, cat] of Object.entries(lhr.categories || {})) {
        console.log(`${cat.title}: ${Math.round(cat.score * 100)} / 100`);
    }

    console.log('\n=== FAILED / OPPORTUNITY AUDITS ===');
    const audits = lhr.audits || {};
    for (const [id, audit] of Object.entries(audits)) {
        if (audit.score !== null && audit.score < 0.9 && audit.scoreDisplayMode !== 'notApplicable' && audit.scoreDisplayMode !== 'informative') {
            console.log(`\n[-] ${audit.title} (Score: ${Math.round(audit.score * 100)})`);
            if (audit.displayValue) console.log(`    Value: ${audit.displayValue}`);
            if (audit.description) console.log(`    Info: ${audit.description.slice(0, 150)}...`);
            if (audit.details && audit.details.items && audit.details.items.length) {
                const topItems = audit.details.items.slice(0, 5);
                topItems.forEach(item => {
                    const url = item.url || item.node?.snippet || item.source || JSON.stringify(item);
                    const saving = item.wastedMs ? `${item.wastedMs}ms` : (item.wastedBytes ? `${Math.round(item.wastedBytes / 1024)}KB` : '');
                    console.log(`      * ${url.slice(0, 100)} ${saving}`);
                });
            }
        }
    }
}
