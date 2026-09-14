const fs = require('fs');

for (let c = 1; c <= 12; c++) {
    const raw = fs.readFileSync('library/read/math-facts-repo/chapter-' + c + '.php', 'utf8');
    let cleaned = raw.replace(/<\?(php|=)?[\s\S]*?\?>/gi, '');
    cleaned = cleaned.replace(/<style\b[^>]*>(.*?)<\/style>/gi, '');
    cleaned = cleaned.replace(/<script\b[^>]*\bsrc\b[\s\S]*?<\/script>/gi, '');
    cleaned = cleaned.replace(/<nav\b[^>]*class="[^"]*reader-chapter-nav[^"]*"[^>]*>(.*?)<\/nav>/gi, '');
    cleaned = cleaned.replace(/<nav\b[^>]*id="reader-controls"[^>]*>(.*?)<\/nav>/gi, '');
    
    const hasPrint = cleaned.includes('function printSynopticTables');
    const hasDownload = cleaned.includes('function downloadSynopticMarkdown');
    if (!hasPrint || !hasDownload) {
        console.error(`FAIL on Chapter ${c}: print=${hasPrint}, download=${hasDownload}`);
        process.exit(1);
    }
}
console.log('SUCCESS: All 12 chapters retain printSynopticTables & downloadSynopticMarkdown through index.php clean filter!');
