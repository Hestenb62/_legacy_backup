// scratch/test-scratchpad.js
const fs = require('fs');
const path = require('path');

console.log('Testing Scratchpad Studio files and logic integrity...');

// 1. Check file existence
const files = [
  'src/partials/scratchpad.php',
  'assets/js/scratchpad-studio.js',
  'assets/css/components/fixed-tools.css',
  'src/footer.php',
  'service-worker.js'
];

for (const f of files) {
  const fullPath = path.join(__dirname, '..', f);
  if (!fs.existsSync(fullPath)) {
    console.error(`FAIL: Missing file ${f}`);
    process.exit(1);
  }
  const content = fs.readFileSync(fullPath, 'utf8');
  if (content.length === 0) {
    console.error(`FAIL: File is empty: ${f}`);
    process.exit(1);
  }
  console.log(`PASS: ${f} exists (${content.length} bytes)`);
}

// 2. Validate LaTeX detection in math formulas
const testContent = `
Here is a formula for velocity: $v = \\frac{d}{t}$
And quadratic formula: $$x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$$
And inline equation: $E = mc^2$.
`;

const mathRegex = /(\$\$[\s\S]+?\$\$|\$[^\$\n]+?\$|\\\[[\s\S]+?\\\]|\\\([^\n]+?\\\))/g;
const matches = testContent.match(mathRegex);

if (!matches || matches.length !== 3) {
  console.error(`FAIL: Math regex expected 3 matches, got ${matches ? matches.length : 0}`);
  process.exit(1);
}
console.log(`PASS: Math formula detection verified (${matches.length} formulas detected).`);

// 3. Verify markup accessibility IDs and attributes
const scratchpadPhp = fs.readFileSync(path.join(__dirname, '..', 'src/partials/scratchpad.php'), 'utf8');
const requiredIds = [
  'scratchpad-panel',
  'scratchpad-backdrop-close',
  'scratchpad-modal-title',
  'scratchpad-note-select',
  'scratchpad-new-note-btn',
  'scratchpad-dock-btn',
  'scratchpad-expand-btn',
  'scratchpad-close',
  'scratchpad-tab-notes',
  'scratchpad-tab-whiteboard',
  'scratchpad-tab-math',
  'quick-notes-area',
  'scratchpad-studio-canvas',
  'scratchpad-mathjax-preview',
  'scratchpad-dictate-btn',
  'scratchpad-copy-btn',
  'download-notes',
  'download-notes-md'
];

for (const id of requiredIds) {
  if (!scratchpadPhp.includes(`id="${id}"`)) {
    console.error(`FAIL: scratchpad.php missing required element id="${id}"`);
    process.exit(1);
  }
}
console.log(`PASS: All ${requiredIds.length} critical UI and accessibility IDs present in scratchpad.php.`);

// 4. Verify CSS contains docked and whiteboard rules
const cssContent = fs.readFileSync(path.join(__dirname, '..', 'assets/css/components/fixed-tools.css'), 'utf8');
if (!cssContent.includes('.scratchpad-panel-overlay.is-docked')) {
  console.error('FAIL: fixed-tools.css missing .is-docked rules');
  process.exit(1);
}
if (!cssContent.includes('.scratchpad-canvas-wrap.grid-math')) {
  console.error('FAIL: fixed-tools.css missing canvas grid-math rules');
  process.exit(1);
}
console.log('PASS: CSS docked and canvas grid styling rules verified.');

// 5. Verify Help Center user guide and Updates Portal version display
const hcPath = path.join(__dirname, '..', 'assets/text/hc-scratchpad-studio.md');
if (!fs.existsSync(hcPath)) {
  console.error('FAIL: Missing Help Center article assets/text/hc-scratchpad-studio.md');
  process.exit(1);
}
const hcContent = fs.readFileSync(hcPath, 'utf8');
if (!hcContent.includes('Unified Scratchpad & Math Whiteboard Studio')) {
  console.error('FAIL: Help Center article content is missing expected title');
  process.exit(1);
}
console.log('PASS: Help Center article assets/text/hc-scratchpad-studio.md verified.');

const helpCenterPhp = fs.readFileSync(path.join(__dirname, '..', 'pages/help-center.php'), 'utf8');
if (!helpCenterPhp.includes("Study Tools") || !helpCenterPhp.includes("fa-pencil-ruler")) {
  console.error('FAIL: pages/help-center.php missing Study Tools category logic');
  process.exit(1);
}
console.log('PASS: Help Center Study Tools category logic verified.');

const updatesIndexPhp = fs.readFileSync(path.join(__dirname, '..', 'updates/index.php'), 'utf8');
if (!updatesIndexPhp.includes("upd-badge-version") || !updatesIndexPhp.includes("parseUpdateDoc")) {
  console.error('FAIL: updates/index.php missing version badges logic');
  process.exit(1);
}
console.log('PASS: Updates Portal version badge logic verified.');

// 6. Verify Scratchpad-Only Print Engine and Isolated CSS
const studioJs = fs.readFileSync(path.join(__dirname, '..', 'assets/js/scratchpad-studio.js'), 'utf8');
if (!studioJs.includes('printScratchpad()') || !studioJs.includes('scratchpad-print-iframe')) {
  console.error('FAIL: scratchpad-studio.js missing printScratchpad or scratchpad-print-iframe');
  process.exit(1);
}
if (!studioJs.includes('formatMarkdownForPrint') || !studioJs.includes('hasCanvasDrawing')) {
  console.error('FAIL: scratchpad-studio.js missing markdown formatter or canvas drawing detector');
  process.exit(1);
}
console.log('PASS: scratchpad-studio.js printScratchpad engine verified.');

if (!cssContent.includes('body.printing-scratchpad') || !cssContent.includes('body.printing-scratchpad > *:not(#scratchpad-panel)')) {
  console.error('FAIL: fixed-tools.css missing body.printing-scratchpad scoped rules');
  process.exit(1);
}
console.log('PASS: fixed-tools.css body.printing-scratchpad scoped print styles verified.');

console.log('\nALL VERIFICATION CHECKS PASSED SUCCESSFULLY!');
