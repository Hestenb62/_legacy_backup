// scratch/test-updates-version.js
const fs = require('fs');
const path = require('path');

console.log('Testing /updates/ and updates/docs/ version reflection...');

// 1. Verify CSS rules
const css = fs.readFileSync(path.join(__dirname, '..', 'assets/css/pages/updates.css'), 'utf8');
if (!css.includes('.upd-badge-version')) {
  console.error('FAIL: updates.css is missing .upd-badge-version');
  process.exit(1);
}
console.log('PASS: .upd-badge-version styles verified in updates.css');

// 2. Verify updates/index.php
const indexPhp = fs.readFileSync(path.join(__dirname, '..', 'updates/index.php'), 'utf8');
if (!indexPhp.includes("'version' => ''")) {
  console.error('FAIL: index.php missing version in $meta');
  process.exit(1);
}
if (!indexPhp.includes('upd-badge-version')) {
  console.error('FAIL: index.php missing upd-badge-version in markup');
  process.exit(1);
}
if (!indexPhp.includes('viewer-version')) {
  console.error('FAIL: index.php missing viewer-version');
  process.exit(1);
}
console.log('PASS: updates/index.php has version in parseUpdateDoc, card markup, and viewer topbar');

// 3. Verify updates/feed.php
const feedPhp = fs.readFileSync(path.join(__dirname, '..', 'updates/feed.php'), 'utf8');
if (!feedPhp.includes("'version' => ''") || !feedPhp.includes('domain="version"')) {
  console.error('FAIL: feed.php missing version support');
  process.exit(1);
}
console.log('PASS: updates/feed.php has version in parseFeedDoc, RSS, and JSON feed');

// 4. Verify updates/docs frontmatter
const planMd = fs.readFileSync(path.join(__dirname, '..', 'updates/docs/2026-09-29-unified-super-scratchpad-plan.md'), 'utf8');
const walkMd = fs.readFileSync(path.join(__dirname, '..', 'updates/docs/2026-09-29-unified-super-scratchpad-walkthrough.md'), 'utf8');

if (!planMd.includes('version: "v2.5.0"')) {
  console.error('FAIL: scratchpad plan missing version: "v2.5.0"');
  process.exit(1);
}
if (!walkMd.includes('version: "v2.5.0"')) {
  console.error('FAIL: scratchpad walkthrough missing version: "v2.5.0"');
  process.exit(1);
}
console.log('PASS: updates/docs/ markdown files have version: "v2.5.0" in frontmatter');

console.log('\nALL VERSION INTEGRATION TESTS PASSED!');
