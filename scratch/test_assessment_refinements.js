const fs = require('fs');
const path = require('path');
const assert = require('assert');

console.log("Starting Assessment Refinements Verification...\n");

// 1. Verify assessment/index.php
const indexPath = path.join(__dirname, '../assessment/index.php');
const indexContent = fs.readFileSync(indexPath, 'utf8');

// Check 1: 1-4 shortcuts hint is removed
assert.ok(!indexContent.includes('kb-shortcuts-hint'), "FAIL: 'kb-shortcuts-hint' should be removed from assessment/index.php");
assert.ok(!indexContent.includes('1–4 to pick'), "FAIL: '1–4 to pick' text should be removed from assessment/index.php");
console.log("  [PASS] '1-4 to pick' keyboard hint removed from assessment/index.php");

// Check 2: Low-Anxiety mode button is intact
assert.ok(indexContent.includes('id="untimed-mode-btn"'), "FAIL: 'untimed-mode-btn' button must exist in assessment/index.php");
assert.ok(indexContent.includes('window.toggleLowAnxietyExamMode'), "FAIL: Low-Anxiety Mode toggle hook must exist");
console.log("  [PASS] 'Low-Anxiety Mode' button verified in assessment/index.php");

// Check 3: answer-explanation-card is situated on top of the question
const qSectionIdx = indexContent.indexOf('id="question-content-section"');
const expCardIdx = indexContent.indexOf('id="answer-explanation-card"');
const qStandardTagIdx = indexContent.indexOf('id="question-standard-tag"');
const questionHeadingIdx = indexContent.indexOf('id="question"');

assert.ok(qSectionIdx !== -1, "FAIL: question-content-section must exist");
assert.ok(expCardIdx !== -1, "FAIL: answer-explanation-card must exist in assessment/index.php");
assert.ok(expCardIdx > qSectionIdx, "FAIL: answer-explanation-card must be inside question-content-section");
assert.ok(expCardIdx < qStandardTagIdx, "FAIL: answer-explanation-card must be placed above question-standard-tag");
assert.ok(expCardIdx < questionHeadingIdx, "FAIL: answer-explanation-card must be placed above question heading");
console.log("  [PASS] Feedback card situated on top of the question area");

// 2. Verify assets/js/assessment-main.js
const mainJsPath = path.join(__dirname, '../assets/js/assessment-main.js');
const mainJsContent = fs.readFileSync(mainJsPath, 'utf8');

// Check 4: untimedBtn duplicate addEventListener removed
assert.ok(!mainJsContent.includes('untimedBtn.addEventListener("click"'), "FAIL: duplicate untimedBtn addEventListener must be removed to avoid double-toggle");
console.log("  [PASS] Duplicate click listener removed from assessment-main.js (no double-toggle)");

// 3. Verify assets/js/assessment-p-12.js
const p12JsPath = path.join(__dirname, '../assets/js/assessment-p-12.js');
const p12JsContent = fs.readFileSync(p12JsPath, 'utf8');

// Check 5: 5-second auto-dismiss and hover logic
assert.ok(p12JsContent.includes('startExplanationDismissTimer(5000)'), "FAIL: 5000ms dismiss timer must be started");
assert.ok(p12JsContent.includes('explanationCard.onmouseenter'), "FAIL: onmouseenter must be handled to pause dismiss timer");
assert.ok(p12JsContent.includes('explanationCard.onmouseleave'), "FAIL: onmouseleave must be handled to resume dismiss timer");
assert.ok(p12JsContent.includes('feedback-card-dismiss-btn'), "FAIL: feedback-card-dismiss-btn must be present");
assert.ok(p12JsContent.includes('Learning Opportunity: The correct answer is'), "FAIL: learning opportunity message must be present");
assert.ok(p12JsContent.includes('clearExplanationDismissTimer()'), "FAIL: timer must be clearable");
console.log("  [PASS] 5-second auto-dismiss + hover pause/resume verified in assessment-p-12.js");

// 4. Verify assets/css/pages/assessment.css
const cssPath = path.join(__dirname, '../assets/css/pages/assessment.css');
const cssContent = fs.readFileSync(cssPath, 'utf8');

assert.ok(cssContent.includes('.answer-explanation-card'), "FAIL: .answer-explanation-card style must exist in assessment.css");
assert.ok(cssContent.includes('.feedback-progress-track'), "FAIL: .feedback-progress-track style must exist in assessment.css");
assert.ok(cssContent.includes('.feedback-card-dismiss-btn'), "FAIL: .feedback-card-dismiss-btn style must exist in assessment.css");
console.log("  [PASS] Top feedback card styles and animations verified in assessment.css");

console.log("\nALL REFINEMENTS VERIFIED SUCCESSFULLY (0 errors)!");
