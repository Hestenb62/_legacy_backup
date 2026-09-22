const re = /\$\$[\s\S]+?\$\$|\\\[[\s\S]+?\\\]|\\\([\s\S]+?\\\)|\\[a-zA-Z]+\{[^}]*\}|\\begin\{[a-zA-Z*]+\}|(?:^|[^\$\w\\])\$(?!\s|\{)(?:[^$\n]*?[^\s$\\])?\$/;

console.log('LaTeX $x$:', re.test('$x$'));
console.log('LaTeX $x + y = z$:', re.test('$x + y = z$'));
console.log('Template ${x}px, ${y}px:', re.test('translate(${x}px, ${y}px)'));
console.log('Template ${completedCount} of ${totalLevels}:', re.test('${completedCount} of ${totalLevels} grade levels completed'));
console.log('Currency $20 and $50:', re.test('$20 and $50'));

const fs = require('fs');
const files = [
  'src/partials/hero.php',
  'src/partials/mastery-modals.php',
  'src/partials/accommodations-modal.php',
  'src/footer.php',
  'index.php'
];

for (const f of files) {
  if (!fs.existsSync(f)) continue;
  const content = fs.readFileSync(f, 'utf8');
  const match = content.match(re);
  console.log('Match in', f, ':', match ? match[0].substring(0, 50) : 'NONE');
}
