const fs = require('fs');
const path = require('path');

const rootDir = path.resolve(__dirname, '..');
let errors = 0;

function checkFile(relPath, assertions) {
    const fullPath = path.join(rootDir, relPath);
    if (!fs.existsSync(fullPath)) {
        console.error(`❌ File not found: ${relPath}`);
        errors++;
        return;
    }
    const content = fs.readFileSync(fullPath, 'utf8');
    assertions(content, relPath);
}

console.log('--- Verifying Print Architecture ---');

// 1. Certificate Modal
checkFile('src/partials/certificate-modal.php', (content, file) => {
    if (content.includes('body * {') && !content.includes('body.printing-certificate * {') && !content.includes('.printing-certificate')) {
        console.error(`❌ ${file} contains unscoped body * print rule!`);
        errors++;
    } else {
        console.log(`✅ ${file}: No unscoped body * print pollution.`);
    }
});

// 2. Assessment CSS
checkFile('assets/css/pages/assessment.css', (content, file) => {
    if (content.match(/@media\s+print\s*\{\s*body\s*\*\s*\{/)) {
        console.error(`❌ ${file} contains unscoped body * { visibility: hidden } in @media print!`);
        errors++;
    } else {
        console.log(`✅ ${file}: Cleanly scoped print rules without global body * hidden.`);
    }
});

// 3. Profile CSS
checkFile('assets/css/pages/profile.css', (content, file) => {
    if (content.match(/@media\s+print\s*\{\s*body\s*\*\s*\{/)) {
        console.error(`❌ ${file} contains unscoped body * in @media print!`);
        errors++;
    } else {
        console.log(`✅ ${file}: Cleanly scoped print rules.`);
    }
});

// 4. Standards CSS
checkFile('assets/css/pages/standards.css', (content, file) => {
    const printIdx = content.indexOf('@media print');
    if (printIdx !== -1) {
        const printContent = content.slice(printIdx);
        if (printContent.match(/\.curr-card\s*\{[^}]*break-inside:\s*avoid/)) {
            console.error(`❌ ${file} contains break-inside: avoid on .curr-card in @media print!`);
            errors++;
        } else {
            console.log(`✅ ${file}: .curr-card correctly allows natural page breaks.`);
        }
    } else {
        console.log(`✅ ${file}: .curr-card break-inside is safe.`);
    }
});

// 5. Global Print CSS
checkFile('assets/css/layouts/print.css', (content, file) => {
    if (content.match(/article,\s*section\s*\{[^}]*break-inside:\s*avoid/)) {
        console.error(`❌ ${file} contains break-inside: avoid on article/section!`);
        errors++;
    } else {
        console.log(`✅ ${file}: article/section break-inside is set to auto.`);
    }

    if (!content.includes('body.printing-worksheet')) {
        console.error(`❌ ${file} missing body.printing-worksheet handling!`);
        errors++;
    }
    if (!content.includes('body.printing-dossier')) {
        console.error(`❌ ${file} missing body.printing-dossier handling!`);
        errors++;
    }
    if (!content.includes('body.printing-mastery-report')) {
        console.error(`❌ ${file} missing body.printing-mastery-report handling!`);
        errors++;
    }
    if (!content.includes('body.printing-transcript')) {
        console.error(`❌ ${file} missing body.printing-transcript handling!`);
        errors++;
    }
});

if (errors === 0) {
    console.log('\n🎉 ALL PRINT ARCHITECTURE CHECKS PASSED WITH 0 ERRORS!\n');
    process.exit(0);
} else {
    console.error(`\n❌ Found ${errors} print errors.\n`);
    process.exit(1);
}
