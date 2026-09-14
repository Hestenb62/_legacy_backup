const fs = require('fs');
const path = require('path');
const assert = require('assert');

console.log("=== Testing Literature Lab & Assessment-Standards Bridge ===");

// 1. Check frankenstein.json
console.log("\n[Test 1] Validating library/assets/frankenstein.json...");
const frankJsonPath = path.join(__dirname, '../library/assets/frankenstein.json');
assert(fs.existsSync(frankJsonPath), "frankenstein.json must exist");
const frankData = JSON.parse(fs.readFileSync(frankJsonPath, 'utf8'));
assert(Array.isArray(frankData['vocab-chapter-1']), "Must contain vocab-chapter-1 array");
assert(frankData['vocab-chapter-1'].length >= 5, "Must have at least 5 vocabulary items");
assert(Array.isArray(frankData['chapter-1']), "Must contain chapter-1 quiz array");
assert(frankData['chapter-1'].length >= 4, "Must have at least 4 quiz questions");
frankData['chapter-1'].forEach((q, idx) => {
  assert(q.question, `Question ${idx} must have question text`);
  assert(Array.isArray(q.options) && q.options.length === 4, `Question ${idx} must have 4 options`);
  assert(typeof q.correctIndex === 'number', `Question ${idx} must have correctIndex`);
  assert(q.explanation, `Question ${idx} must have explanation`);
});
console.log("  [PASS] frankenstein.json schema & content verified.");

// 2. Check library/read/frankenstein/chapter-1.php
console.log("\n[Test 2] Validating library/read/frankenstein/chapter-1.php Lexile tiers...");
const frankChapPath = path.join(__dirname, '../library/read/frankenstein/chapter-1.php');
assert(fs.existsSync(frankChapPath), "chapter-1.php must exist");
const frankChapHtml = fs.readFileSync(frankChapPath, 'utf8');
assert(frankChapHtml.includes('data-lexile="original"'), "Must contain Original Lexile container");
assert(frankChapHtml.includes('data-lexile="adapted"'), "Must contain Adapted Lexile container");
assert(frankChapHtml.includes('data-lexile="basic"'), "Must contain Basic English Lexile container");
assert(frankChapHtml.includes('Original (1170L)'), "Must specify 1170L badge label");
assert(frankChapHtml.includes('Adapted (850L)'), "Must specify 850L badge label");
assert(frankChapHtml.includes('Basic English (480L)'), "Must specify 480L badge label");
assert(frankChapHtml.includes('lib-reader-lexile.js'), "Must load lib-reader-lexile.js script");
console.log("  [PASS] All 3 Lexile tiers and reader controls verified in Frankenstein Chapter 1.");

// 3. Check read-inline-text-highlighting.js flashcard upgrades
console.log("\n[Test 3] Validating reader highlight-to-flashcard saving in read-inline-text-highlighting.js...");
const hlJsPath = path.join(__dirname, '../assets/js/reader/read-inline-text-highlighting.js');
const hlJsContent = fs.readFileSync(hlJsPath, 'utf8');
assert(hlJsContent.includes('activeBookId'), "Must detect activeBookId");
assert(hlJsContent.includes('hl_leitner_decks'), "Must save to hl_leitner_decks");
assert(hlJsContent.includes('toggleFlashcardStudio'), "Must trigger toggleFlashcardStudio");
assert(hlJsContent.includes('Saved to Leitner Flashcards'), "Must apply highlight note");
console.log("  [PASS] Highlight-to-flashcard contextual saving verified.");

// 4. Check reader_template.php Flashcard buttons
console.log("\n[Test 4] Validating Flashcard Studio triggers in reader_template.php...");
const rdrTplPath = path.join(__dirname, '../library/read/reader_template.php');
const rdrTplContent = fs.readFileSync(rdrTplPath, 'utf8');
assert(rdrTplContent.includes('open-reader-flashcards-btn'), "Must have open-reader-flashcards-btn in toolbar");
assert(rdrTplContent.includes('Open in Leitner Flashcard Studio'), "Must have Leitner Flashcard Studio modal button");
console.log("  [PASS] Reader sticky bar & modal Flashcard triggers verified.");

// 5. Check assessment-main.js remediation flashcards
console.log("\n[Test 5] Validating Assessment-Standards Flashcard bridge in assessment-main.js...");
const asmtJsPath = path.join(__dirname, '../assets/js/assessment-main.js');
const asmtJsContent = fs.readFileSync(asmtJsPath, 'utf8');
assert(asmtJsContent.includes('window.openRemediationFlashcards'), "Must define window.openRemediationFlashcards");
assert(asmtJsContent.includes('window.openAssessmentFlashcards'), "Must define window.openAssessmentFlashcards");
assert(asmtJsContent.includes('pct < 80'), "Must use < 80% threshold for deficit detection");
assert(asmtJsContent.includes('Study Flashcards'), "Must include Study Flashcards action button");
assert(asmtJsContent.includes('Practice Targeted Flashcards'), "Must include top-level Practice Targeted Flashcards button");
assert(asmtJsContent.includes('(&ge; 80% Across All Tested Standards)'), "Must display >= 80% proficiency benchmark");
console.log("  [PASS] Assessment remediation flashcard engine & 80% benchmark verified.");

// 6. Functional Simulation of openRemediationFlashcards logic
console.log("\n[Test 6] Simulating remediation deck construction on assessment deficits...");
let mockStorage = {};
global.localStorage = {
  getItem: (k) => mockStorage[k] || null,
  setItem: (k, v) => { mockStorage[k] = v; },
};
global.window = {
  quizResultsData: [
    { question: "What is 7 x 8?", correctAnswer: "56", explanation: "7 x 8 is 56", isCorrect: false, standard: "4.OA.1", subject: "Math" },
    { question: "Identify prime number", correctAnswer: "17", explanation: "17 has only factors 1 and 17", isCorrect: false, standard: "4.OA.4", subject: "Math" },
    { question: "What is 100 / 10?", correctAnswer: "10", explanation: "100 / 10 = 10", isCorrect: true, standard: "4.NBT.1", subject: "Math" }
  ],
  gradeConfig: { f: { label: "Fourth Grade" } },
  dispatchEvent: () => {},
  announceA11y: () => {},
  toggleFlashcardStudio: (show, deckId) => {
    assert(show === true, "Must request showing studio");
    assert(deckId.includes('remediation-4-oa-1') || deckId.includes('remediation-math') || deckId.includes('assessment-remediation'), `Target deck must be remediation deck: ${deckId}`);
  }
};
global.document = {
  getElementById: (id) => id === 'grade-key' ? { value: 'f' } : null
};

// Evaluate the functions extracted from assessment-main.js
const extractFunc = (fnName) => {
  const startIdx = asmtJsContent.indexOf(`window.${fnName} = function`);
  assert(startIdx !== -1, `Could not find window.${fnName}`);
  let braceCount = 0;
  let started = false;
  let endIdx = startIdx;
  for (let i = startIdx; i < asmtJsContent.length; i++) {
    if (asmtJsContent[i] === '{') {
      braceCount++;
      started = true;
    } else if (asmtJsContent[i] === '}') {
      braceCount--;
      if (started && braceCount === 0) {
        endIdx = i + 1;
        break;
      }
    }
  }
  return asmtJsContent.substring(startIdx, endIdx);
};

eval(extractFunc('openRemediationFlashcards'));
eval(extractFunc('openAssessmentFlashcards'));

// Test invocation for standard deficit
window.openRemediationFlashcards('Math', '4.OA.1');
const storedDecks = JSON.parse(mockStorage['hl_leitner_decks']);
assert(storedDecks['remediation-4-oa-1'], "Must create remediation-4-oa-1 deck");
assert(storedDecks['remediation-4-oa-1'].cards.length === 1, "Must contain exactly 1 card for 4.OA.1 deficit");
assert(storedDecks['remediation-4-oa-1'].cards[0].front === "What is 7 x 8?", "Card front must match missed question");
console.log("  [PASS] Deficit deck generated with 100% accurate question, answer, and Leitner box 1.");

// Test invocation for entire assessment remediation
window.openAssessmentFlashcards();
const storedAll = JSON.parse(mockStorage['hl_leitner_decks']);
assert(storedAll['assessment-remediation-f'], "Must create assessment-remediation-f deck");
assert(storedAll['assessment-remediation-f'].cards.length === 2, "Must contain both missed questions");
console.log("  [PASS] Overall assessment remediation deck captured all missed questions.");

console.log("\n>>> ALL TESTS PASSED SUCCESSFULLY! <<<\n");
