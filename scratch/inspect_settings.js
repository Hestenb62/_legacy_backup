const fs = require('fs');

// Check header.css
const headerCss = fs.readFileSync('assets/css/layouts/header.css', 'utf8');
console.log('header.css contains --color-primary:', headerCss.includes('--color-primary'));
const headerMatches = headerCss.match(/#[0-9a-fA-F]{3,6}/g) || [];
console.log('header.css hardcoded colors count:', headerMatches.length);

// Check global-tokens.css
const tokensCss = fs.readFileSync('assets/css/global-tokens.css', 'utf8');
console.log('tokensCss has :root[data-theme="dark"]:', tokensCss.includes(':root[data-theme="dark"]'));

// Check settings.css
const settingsCss = fs.readFileSync('assets/css/pages/settings.css', 'utf8');
console.log('settingsCss has @layer components:', settingsCss.includes('@layer components'));

// Check header.php
const headerPhp = fs.readFileSync('src/header.php', 'utf8');
const headScriptMatch = headerPhp.match(/<script>[\s\S]*?hl_accessibility_settings[\s\S]*?<\/script>/);
console.log('Head script in header.php:', headScriptMatch ? headScriptMatch[0] : 'NOT FOUND');
