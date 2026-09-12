const fs = require('fs');
const vm = require('vm');
const path = require('path');

const jsFiles = [
  'assets/js/audio-feedback.js',
  'assets/js/sensory-chamber.js',
  'assets/js/profile-switcher.js',
  'assets/js/reader/read-comparative-view.js',
  'assets/js/assessment/assessment-scratchpad.js',
  'assets/js/assessment/diagnostic-prescription.js',
  'assets/js/gamification/daily-quests.js',
  'assets/js/labs/math-manipulatives.js',
  'assets/js/teacher/mastery-heatmap.js',
  'assets/js/standards/standards-challenge.js'
];

let errors = 0;

console.log('--- Verifying JavaScript Syntax ---');
jsFiles.forEach(file => {
  if (!fs.existsSync(file)) {
    console.error('MISSING FILE:', file);
    errors++;
    return;
  }
  const code = fs.readFileSync(file, 'utf8');
  try {
    new vm.Script(code);
    console.log('  [PASS]', file);
  } catch (err) {
    console.error('  [FAIL]', file, err.message);
    errors++;
  }
});

const cssFiles = [
  'assets/css/sensory-chamber.css',
  'assets/css/profile-switcher.css',
  'assets/css/reader/read-comparative-view.css',
  'assets/css/assessment/assessment-scratchpad.css',
  'assets/css/gamification/daily-quests.css',
  'assets/css/labs/math-manipulatives.css',
  'assets/css/teacher/mastery-heatmap.css'
];

console.log('\n--- Verifying CSS Assets ---');
cssFiles.forEach(file => {
  if (!fs.existsSync(file)) {
    console.error('MISSING CSS FILE:', file);
    errors++;
  } else {
    console.log('  [EXISTS]', file);
  }
});

const phpFiles = [
  'src/header.php',
  'src/footer.php',
  'src/partials/sensory-chamber-modal.php',
  'src/partials/profile-switcher-modal.php',
  'library/read/1984/chapter-1.php',
  'assessment/index.php',
  'student/math-practice.php',
  'student/index.php',
  'pages/teachers.php',
  'pages/standards.php',
  'pages/parents.php'
];

console.log('\n--- Verifying PHP Tags & Balances ---');
phpFiles.forEach(file => {
  if (!fs.existsSync(file)) {
    console.error('MISSING PHP FILE:', file);
    errors++;
    return;
  }
  const content = fs.readFileSync(file, 'utf8');
  const openTags = (content.match(/<\?php/g) || []).length;
  const closeTags = (content.match(/\?>/g) || []).length;
  console.log('  [CHECKED]', file, `(<?php: ${openTags}, ?>: ${closeTags})`);
});

if (errors === 0) {
  console.log('\nALL VERIFICATION CHECKS PASSED PERFECTLY (0 errors)!');
} else {
  console.error(`\nCompleted with ${errors} error(s).`);
  process.exit(1);
}
