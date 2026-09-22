const fs = require('fs');
const files = [
    'index.php',
    'src/header.php',
    'src/partials/hero.php',
    'src/partials/academic-path-header.php',
    'src/partials/learning-launchpad.php',
    'src/partials/resume-banner.php',
    'src/partials/welcome-guide.php',
    'src/partials/learning-grid.php',
    'src/partials/no-results.php',
    'src/partials/doc-modal.php',
    'src/partials/fixed-tools.php',
    'src/partials/a11y-settings.php',
    'src/footer.php'
];

const MATH_DELIM_PATTERN = /\$\$[\s\S]+?\$\$|\$[^$\n]+\$|\\\[[\s\S]+?\\\]|\\\([\s\S]+?\\\)|\begin\{[a-zA-Z*]+\}/;

files.forEach(f => {
    if (fs.existsSync(f)) {
        const txt = fs.readFileSync(f, 'utf8');
        const match = txt.match(MATH_DELIM_PATTERN);
        if (match) {
            console.log(`Matched in ${f}: "${match[0]}"`);
        }
    }
});
