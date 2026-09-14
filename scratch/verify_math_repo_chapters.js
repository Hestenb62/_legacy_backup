const fs = require('fs');
const path = require('path');

const repoDir = path.join(__dirname, '../library/read/math-facts-repo');
const files = fs.readdirSync(repoDir).filter(f => f.startsWith('chapter-') && f.endsWith('.php'));

let totalErrors = 0;

console.log('=== Verifying Math Facts Repository Chapters (1 - 12) ===\n');

files.sort((a, b) => {
    const numA = parseInt(a.replace('chapter-', '').replace('.php', ''), 10);
    const numB = parseInt(b.replace('chapter-', '').replace('.php', ''), 10);
    return numA - numB;
});

files.forEach(file => {
    const filePath = path.join(repoDir, file);
    const content = fs.readFileSync(filePath, 'utf8');
    let fileErrors = 0;

    // Check 1: Opening and closing math-reference-content
    const openRef = (content.match(/<div class="math-reference-content">/g) || []).length;
    if (openRef !== 1) {
        console.error(`[FAIL] ${file}: Found ${openRef} '<div class="math-reference-content">' (expected 1)`);
        fileErrors++;
    }

    // Check 2: Sections count
    const sectionsOpen = (content.match(/<section /g) || []).length;
    const sectionsClose = (content.match(/<\/section>/g) || []).length;
    if (sectionsOpen !== sectionsClose) {
        console.error(`[FAIL] ${file}: Section tags mismatch: ${sectionsOpen} open vs ${sectionsClose} close`);
        fileErrors++;
    }

    // Check 3: Div tags count
    const divOpen = (content.match(/<div(\s|>)/g) || []).length;
    const divClose = (content.match(/<\/div>/g) || []).length;
    if (divOpen !== divClose) {
        console.error(`[FAIL] ${file}: Div tags mismatch: ${divOpen} open vs ${divClose} close`);
        fileErrors++;
    }

    // Check 4: Tables count
    const tableOpen = (content.match(/<table(\s|>)/g) || []).length;
    const tableClose = (content.match(/<\/table>/g) || []).length;
    if (tableOpen !== tableClose) {
        console.error(`[FAIL] ${file}: Table tags mismatch: ${tableOpen} open vs ${tableClose} close`);
        fileErrors++;
    }

    // Check 5: Script tag
    const scriptOpen = (content.match(/<script(\s|>)/g) || []).length;
    const scriptClose = (content.match(/<\/script>/g) || []).length;
    if (scriptOpen !== scriptClose) {
        console.error(`[FAIL] ${file}: Script tags mismatch: ${scriptOpen} open vs ${scriptClose} close`);
        fileErrors++;
    }

    // Check 6: Functions present
    const hasPrint = content.includes('function printSynopticTables()');
    const hasDownload = content.includes('function downloadSynopticMarkdown()');
    if (!hasPrint || !hasDownload) {
        console.error(`[FAIL] ${file}: Missing printSynopticTables or downloadSynopticMarkdown`);
        fileErrors++;
    }

    if (fileErrors === 0) {
        console.log(`[PASS] ${file} | Size: ${content.length} chars | Sections: ${sectionsOpen} | Divs: ${divOpen} balanced | Print & Download: OK`);
    } else {
        totalErrors += fileErrors;
    }
});

console.log(`\nVerification finished with ${totalErrors} error(s).`);
if (totalErrors > 0) {
    process.exit(1);
}
