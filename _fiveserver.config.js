const fs = require('fs');

let phpPath = 'php';
if (process.platform === 'win32') {
  if (fs.existsSync('C:\\xampp\\php\\php.exe')) {
    phpPath = 'C:\\xampp\\php\\php.exe';
  }
} else {
  phpPath = '/usr/bin/php';
}

module.exports = {
  php: phpPath
};

