const fs = require('fs');
const path = require('path');
const assert = require('assert');

console.log("Starting verification of quiz overlay over text and credit line button...");

// 1. Check library/read/index.php
const indexPath = path.join(__dirname, '../library/read/index.php');
const indexContent = fs.readFileSync(indexPath, 'utf8');

assert(indexContent.includes('$bookCreditsText = \'\';'), "index.php must initialize $bookCreditsText");
assert(indexContent.includes('$bookCreditsText = $clickableCredits;'), "index.php must set $bookCreditsText to clickableCredits");
assert(!indexContent.includes('$contentHtml .= \'<div class="book-credits-container"'), "index.php must not append raw credits container to $contentHtml");
console.log("PASS: library/read/index.php correctly prepares $bookCreditsText");

// 2. Check library/read/reader_template.php
const templatePath = path.join(__dirname, '../library/read/reader_template.php');
const templateContent = fs.readFileSync(templatePath, 'utf8');

assert(templateContent.includes('class="book-credits-container"'), "reader_template.php must contain .book-credits-container");
assert(templateContent.includes('id="chk-launch-btn"'), "reader_template.php must have #chk-launch-btn next to credits");
assert(templateContent.includes('id="chapter-checkpoint"'), "reader_template.php must have #chapter-checkpoint");
assert(templateContent.includes('class="chk-close-btn"'), "reader_template.php must have .chk-close-btn in overlay header");

// Ensure chapter-checkpoint is nested inside the article
const articleCloseIdx = templateContent.indexOf('</article>');
const checkpointIdx = templateContent.indexOf('id="chapter-checkpoint"');
assert(checkpointIdx < articleCloseIdx, "#chapter-checkpoint must be nested INSIDE <article id=\"book-content\"> for zero-page-extension absolute positioning");
console.log("PASS: #chapter-checkpoint is nested inside <article> for absolute overlay positioning");

// Check JavaScript
assert(templateContent.includes('chk-launch-btn'), "reader_template.php JS must reference chk-launch-btn");
assert(templateContent.includes('window.toggleChapterCheckpoint'), "reader_template.php must define toggleChapterCheckpoint");
assert(templateContent.includes('e.key === \'Escape\''), "reader_template.php must support Escape key to close quiz overlay");
console.log("PASS: reader_template.php JS correctly controls overlay and keyboard a11y");

// 3. Check assets/css/reader-main.css
const cssPath = path.join(__dirname, '../assets/css/reader-main.css');
const cssContent = fs.readFileSync(cssPath, 'utf8');

assert(cssContent.includes('.reader-main-content {'), "CSS must style .reader-main-content");
assert(cssContent.includes('position: relative !important;'), "CSS must make .reader-main-content relative for containment");
assert(cssContent.includes('overflow: hidden !important;'), "CSS must make .reader-main-content overflow:hidden");

assert(cssContent.includes('.chapter-comprehension-checkpoint {'), "CSS must style .chapter-comprehension-checkpoint");
assert(cssContent.includes('position: absolute !important;'), "CSS must make .chapter-comprehension-checkpoint position: absolute");
assert(cssContent.includes('bottom: 0 !important;'), "CSS must pin checkpoint overlay to bottom: 0");
assert(cssContent.includes('transform: translateY(105%) !important;'), "CSS must translate checkpoint down when collapsed");
assert(cssContent.includes('.chapter-comprehension-checkpoint.expanded {'), "CSS must style .chapter-comprehension-checkpoint.expanded");
assert(cssContent.includes('transform: translateY(0) !important;'), "CSS must translate checkpoint up when expanded");

assert(cssContent.includes('.chk-launch-btn {'), "CSS must style .chk-launch-btn");
assert(cssContent.includes('.chk-launch-btn.completed {'), "CSS must style .chk-launch-btn.completed");
assert(cssContent.includes('.chk-overlay-header {'), "CSS must style .chk-overlay-header");
assert(cssContent.includes('.chk-close-btn {'), "CSS must style .chk-close-btn");

console.log("PASS: CSS verifies zero page height extension and smooth slide-up over text");

console.log("ALL TESTS PASSED SUCCESSFULLY!");
