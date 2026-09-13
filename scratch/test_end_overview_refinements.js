const fs = require('fs');
const path = require('path');
const assert = require('assert');

console.log("Testing Assessment End-of-Test Overview & Mid-Test Feedback Removal...\n");

// 1. Check assessment-p-12.js
const p12Path = path.join(__dirname, '../assets/js/assessment-p-12.js');
const p12Content = fs.readFileSync(p12Path, 'utf8');

// Mid-test checkAnswer must not reveal answers
assert.ok(!p12Content.includes("btn.classList.add('bg-green-100', 'border-green-500')"), "FAIL: checkAnswer must not highlight correct answer green mid-test");
assert.ok(!p12Content.includes("btnElement.classList.add('bg-red-100', 'border-red-500')"), "FAIL: checkAnswer must not highlight wrong answer red mid-test");
assert.ok(!p12Content.includes("document.getElementById('feedback').textContent = `Incorrect"), "FAIL: checkAnswer must not set incorrect feedback text mid-test");
assert.ok(p12Content.includes("ring-blue-400"), "FAIL: checkAnswer must mark user selection in neutral blue");
console.log("  [PASS] Mid-test error cards, red/green reveals, and incorrect banners removed");

// finishQuiz summary verification
assert.ok(p12Content.includes("${score} Correct"), "FAIL: finishQuiz must display correct answer count");
assert.ok(p12Content.includes("${missedCount} Missed"), "FAIL: finishQuiz must display missed count");
assert.ok(p12Content.includes("${totalQuestions} Total Questions"), "FAIL: finishQuiz must display total question count");
assert.ok(p12Content.includes("Try Again"), "FAIL: finishQuiz must include Try Again button");
console.log("  [PASS] finishQuiz displays comprehensive score overview chips and Try Again button");

// 2. Check assessment-main.js
const mainJsPath = path.join(__dirname, '../assets/js/assessment-main.js');
const mainJsContent = fs.readFileSync(mainJsPath, 'utf8');

// Audio feedback removed mid-test (checkAnswer must not call playIncorrectSound())
assert.ok(!mainJsContent.includes("playIncorrectSound();"), "FAIL: playIncorrectSound(); should not be invoked on question answer");
console.log("  [PASS] Negative buzzer audio calls removed mid-test");

// All end-of-test buttons present
assert.ok(mainJsContent.includes("Printable Diagnostic Mastery Scorecard"), "FAIL: Printable Diagnostic Mastery Scorecard button missing");
assert.ok(mainJsContent.includes("Review Answers &amp; Explanations"), "FAIL: Review Answers button missing");
assert.ok(mainJsContent.includes("View Report Card"), "FAIL: View Report Card button missing");
assert.ok(mainJsContent.includes("Printable Quiz &amp; Key"), "FAIL: Printable Quiz & Key button missing");
assert.ok(mainJsContent.includes("Download Text"), "FAIL: Download Text button missing");
console.log("  [PASS] All existing end-of-test buttons verified intact");

// buildReviewMode overview matrix
assert.ok(mainJsContent.includes("review-overview-matrix"), "FAIL: review-overview-matrix missing from buildReviewMode");
assert.ok(mainJsContent.includes("review-matrix-chip"), "FAIL: review-matrix-chip missing");
assert.ok(mainJsContent.includes("review-answers-grid"), "FAIL: review-answers-grid missing");
assert.ok(mainJsContent.includes("window.ensureMathJax(reviewContainer)"), "FAIL: MathJax must typeset reviewContainer");
console.log("  [PASS] Question-by-question Right/Wrong overview matrix and cards verified");

console.log("\nALL VERIFICATIONS PASSED (0 errors)!");
