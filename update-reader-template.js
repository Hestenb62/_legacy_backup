const fs = require('fs');
const path = require('path');

const templatePath = path.join(__dirname, 'library', 'read', 'reader_template.php');
let content = fs.readFileSync(templatePath, 'utf-8');

// 1. Remove toggle-view-mode-btn
content = content.replace(/<!-- Book Page Flip \/ Scroll View Mode Switcher -->[\s\S]*?<\/button>\s*/, '');

// 2. Remove Reading Mode from settings panel
content = content.replace(/<h4 class="settings-section-title">Reading Mode<\/h4>[\s\S]*?<\/div>\s*/, '');

// 3. Remove side arrows
content = content.replace(/<!-- Floating Side Page Turn Buttons -->[\s\S]*?<\/button>\s*<\/button>\s*/, '');

// 4. Remove book-running-footer
content = content.replace(/<!-- Bottom Running Book Footer.*?-->[\s\S]*?<div class="book-running-footer">[\s\S]*?<\/div>\s*<\/div>\s*<\/div>/, '</div>');

// 5. Change script inclusion
content = content.replace(/<script src="\.\.\/\.\.\/assets\/js\/reader\/read-single\.js" defer><\/script>/, '<script src="../../assets/js/reader/read-scroll-markers.js" defer></script>');

// Make sure body has mode-scroll if it's applied dynamically elsewhere (Wait, it was on the body tag but reader_template.php doesn't have the body tag, header.php does).
// We can just inject a script to add mode-scroll to body to be safe.
content = content.replace(/<main id="main-content" class="library-main reader-main-layout">/, '<main id="main-content" class="library-main reader-main-layout">\n    <script>document.body.classList.add("mode-scroll");</script>');

fs.writeFileSync(templatePath, content, 'utf-8');
console.log('Template updated successfully.');
