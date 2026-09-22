const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

const marker = '"{\\n  \\"fetchTime\\":';
const idx = content.indexOf(marker);

for (let i = 967775; i <= 967795; i++) {
    console.log(i, JSON.stringify(content[idx + i]));
}
