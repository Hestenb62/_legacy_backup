const fs = require('fs');
const file = 'C:\\Users\\Heste\\.gemini\\antigravity-ide\\brain\\ea681867-1e7b-4945-aee2-5b18fc10921b\\.system_generated\\steps\\216\\content.md';
const content = fs.readFileSync(file, 'utf8');

console.log('File size in bytes:', content.length);

// Look for data-initial-setup or window.INITIAL_DATA or lighthouse data
const reWiz = /window\.WIZ_global_data\s*=\s*(\{.*?\});/s;
const wizMatch = content.match(reWiz);
if (wizMatch) {
    console.log('Found WIZ_global_data keys:', Object.keys(JSON.parse(wizMatch[1])));
}

// Find all script tags or JSON-like blocks
const scriptMatches = content.match(/<script[^>]*>([\s\S]*?)<\/script>/gi);
console.log('Total script tags:', scriptMatches ? scriptMatches.length : 0);

if (scriptMatches) {
    scriptMatches.forEach((s, i) => {
        if (s.includes('lighthouse') || s.includes('categories') || s.includes('audits') || s.includes('hestena62')) {
            console.log(`Script ${i} mentions keywords, length: ${s.length}`);
            const sample = s.slice(0, 300);
            console.log(`Sample ${i}:`, sample);
        }
    });
}

// Check for plain text keywords in the entire content
const words = ['Eliminate render-blocking', 'Reduce unused JavaScript', 'Reduce unused CSS', 'Properly size images', 'Defer offscreen images', 'Minify CSS', 'Minify JavaScript', 'Largest Contentful Paint', 'Cumulative Layout Shift', 'First Contentful Paint', 'Total Blocking Time', 'Speed Index', 'Tap targets', 'Contrast', 'Document does not have a meta description'];
words.forEach(w => {
    const pos = content.indexOf(w);
    if (pos !== -1) {
        console.log(`Found "${w}" at pos ${pos}:`, content.slice(pos - 50, pos + 100));
    }
});
