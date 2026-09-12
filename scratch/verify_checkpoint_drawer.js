/**
 * scratch/verify_checkpoint_drawer.js
 * Validates the syntax of the embedded scripts and HTML structure in reader_template.php
 */

const fs = require('fs');
const assert = require('assert');

const templatePath = 'library/read/reader_template.php';
const content = fs.readFileSync(templatePath, 'utf8');

console.log("=== Verifying Chapter Checkpoint Slide-Up Drawer ===");

// 1. Check markup structure
assert(content.includes('id="chapter-checkpoint"'), "Section id chapter-checkpoint must exist");
assert(content.includes('class="chapter-comprehension-checkpoint collapsed"'), "Must have collapsed class by default");
assert(content.includes('id="chk-toggle-trigger"'), "Must have toggle trigger");
assert(content.includes('id="chk-collapsible-body"'), "Must have collapsible body");
assert(content.includes('id="chk-done-close-btn"'), "Must have Done & Close button");

// 2. Check JavaScript logic
assert(content.includes('window.toggleChapterCheckpoint = function'), "toggleChapterCheckpoint must be defined");
assert(content.includes('window.chkAutoCloseTimer'), "chkAutoCloseTimer must be defined");
assert(content.includes('section.classList.remove(\'collapsed\')'), "Must support expanding");
assert(content.includes('section.classList.add(\'collapsed\')'), "Must support collapsing");
assert(content.includes('setTimeout(() => {\r\n                window.toggleChapterCheckpoint(false);') || content.includes('window.toggleChapterCheckpoint(false);'), "Must auto-close on success");

// 3. Extract script content and verify JS syntax
const scriptMatches = [...content.matchAll(/<script>([\s\S]*?)<\/script>/gi)];
console.log(`Found ${scriptMatches.length} script blocks.`);

scriptMatches.forEach((match, idx) => {
    let scriptCode = match[1];
    // Strip PHP tags for syntax testing
    scriptCode = scriptCode.replace(/<\?php[\s\S]*?\?>/g, '""').replace(/<\?=[\s\S]*?\?>/g, '""');
    try {
        new Function(scriptCode);
        console.log(`✔ Script block ${idx + 1} syntax valid.`);
    } catch(err) {
        console.error(`Script block ${idx + 1} syntax error:`, err.message);
        throw err;
    }
});

// 4. Verify CSS file contains checkpoint slide-up styles
const cssContent = fs.readFileSync('assets/css/reader-main.css', 'utf8');
assert(cssContent.includes('.chapter-comprehension-checkpoint.expanded .chk-collapsible-body'), "CSS must define expanded body styles");
assert(cssContent.includes('.chk-collapsible-body'), "CSS must define collapsible body styles");
assert(cssContent.includes('.chk-toggle-bar'), "CSS must define toggle bar styles");
console.log("✔ CSS styles for slide-up drawer verified.");

console.log("All checkpoint drawer validations passed!");
